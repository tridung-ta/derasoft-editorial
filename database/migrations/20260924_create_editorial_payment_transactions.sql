-- Editorial membership payment ledger for VNPay sandbox/production callbacks.
-- Additive only: no existing tables or rows are changed.
CREATE TABLE IF NOT EXISTS `dc_editorial_payment_transactions` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `store_id` INT UNSIGNED NOT NULL DEFAULT 1,
  `customer_id` INT UNSIGNED NOT NULL,
  `plan_id` BIGINT UNSIGNED NOT NULL,
  `subscription_id` BIGINT UNSIGNED DEFAULT NULL,
  `provider` VARCHAR(30) NOT NULL DEFAULT 'vnpay',
  `txn_ref` VARCHAR(100) NOT NULL,
  `provider_transaction_no` VARCHAR(100) DEFAULT NULL,
  `amount` DECIMAL(15,2) UNSIGNED NOT NULL,
  `currency` CHAR(3) NOT NULL DEFAULT 'VND',
  `status` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=pending,1=paid,2=failed,3=canceled',
  `response_code` VARCHAR(10) DEFAULT NULL,
  `transaction_status` VARCHAR(10) DEFAULT NULL,
  `bank_code` VARCHAR(30) DEFAULT NULL,
  `pay_date` DATETIME DEFAULT NULL,
  `response_snapshot` TEXT DEFAULT NULL COMMENT 'Filtered non-secret VNPay response fields only',
  `processed_at` DATETIME DEFAULT NULL,
  `date_created` DATETIME NOT NULL,
  `date_updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_editorial_payment_txn_ref` (`store_id`, `provider`, `txn_ref`),
  UNIQUE KEY `uq_editorial_payment_provider_no` (`store_id`, `provider`, `provider_transaction_no`),
  KEY `idx_editorial_payment_customer` (`store_id`, `customer_id`, `status`, `date_created`),
  KEY `idx_editorial_payment_plan` (`store_id`, `plan_id`, `status`),
  KEY `idx_editorial_payment_pending` (`store_id`, `provider`, `status`, `date_created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
