<?php
/**
 * Isolated validation smoke test for the editorial payment ledger.
 * Run locally: php cron/editorial-payment-smoke.php
 */
if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit;
}

define('ROOT_PATH', dirname(__DIR__) . '/');
define('DB_PREFIX', 'dc_');
require_once ROOT_PATH . 'classes/dao/editorialpaymenttransactions.class.php';
require_once ROOT_PATH . 'classes/payment/vnpaygateway.class.php';

class EditorialPaymentLedgerFake extends EditorialPaymentTransactions
{
    public $added = array();
    public $updated = array();

    function __construct()
    {
        $this->store_id = 1;
        $this->table = DB_PREFIX . 'editorial_payment_transactions';
    }

    function add($data = '', $pk = 'id', $pkValue = 'NULL')
    {
        $this->added = $data;
        return 42;
    }

    function update($data = '', $condition = '1<0')
    {
        $this->updated = array($data, $condition);
        return 1;
    }
}

$ledger = new EditorialPaymentLedgerFake();
$created = $ledger->createPending(7, 3, 'MEM-TEST', 99000, 'vnd');
if ($created !== 42 || $ledger->added['amount'] !== '99000.00' || $ledger->added['currency'] !== 'VND') {
    fwrite(STDERR, "FAIL: valid pending transaction\n");
    exit(1);
}
if ($ledger->createPending(0, 3, 'BAD', 99000, 'VND') !== 0) {
    fwrite(STDERR, "FAIL: invalid customer accepted\n");
    exit(1);
}
$ledger->updateProviderResult(42, EditorialPaymentTransactions::STATUS_PAID, array(
    'response_code' => '00',
    'ignored' => 'must-not-be-persisted',
));
if (isset($ledger->updated[0]['ignored']) || $ledger->updated[0]['response_code'] !== '00') {
    fwrite(STDERR, "FAIL: provider field allowlist\n");
    exit(1);
}

echo "OK: payment ledger validation and field allowlist\n";

$gateway = new VnPayGateway(
    'TESTCODE',
    'sandbox-secret',
    'https://example.test/thanh-toan/vnpay-return'
);
$createdAt = new DateTimeImmutable('2026-09-24 10:00:00', new DateTimeZone('Asia/Ho_Chi_Minh'));
$paymentUrl = $gateway->buildPaymentUrl('MEM-20260924-1', 99000, 'Thanh toan goi hoi vien', '127.0.0.1', 'vn', $createdAt);
parse_str((string)parse_url($paymentUrl, PHP_URL_QUERY), $signedParams);
if ($paymentUrl === '' || !$gateway->verifySignature($signedParams) || $signedParams['vnp_Amount'] !== '9900000') {
    fwrite(STDERR, "FAIL: VNPay payment signature\n");
    exit(1);
}
$signedParams['vnp_Amount'] = '10000000';
if ($gateway->verifySignature($signedParams)) {
    fwrite(STDERR, "FAIL: tampered VNPay payload accepted\n");
    exit(1);
}
$signedParams['vnp_HashSecret'] = 'must-not-be-saved';
$sanitized = $gateway->sanitizeResponse($signedParams);
if (isset($sanitized['vnp_HashSecret']) || isset($sanitized['vnp_SecureHash'])) {
    fwrite(STDERR, "FAIL: VNPay secret/hash entered response snapshot\n");
    exit(1);
}

echo "OK: VNPay HMAC-SHA512 signing, tamper detection and response filtering\n";
