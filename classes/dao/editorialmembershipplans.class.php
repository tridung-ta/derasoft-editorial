<?php
include_once(ROOT_PATH . 'classes/database/model.class.php');

class EditorialMembershipPlans extends Model
{
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;

    var $table;
    var $_db;
    var $store_id;

    function __construct($store_id = 1, $database = '')
    {
        if (!$database) {
            global $db;
            $this->_db = $db;
        } else {
            $this->_db = $database;
        }
        $this->table = DB_PREFIX . 'editorial_membership_plans';
        $this->store_id = max(1, (int)$store_id);
    }

    function getById($id)
    {
        $id = (int)$id;
        if ($id < 1) return 0;
        $rows = $this->select('*', '`store_id` = ' . $this->store_id . ' AND `id` = ' . $id, array(), 0, 1);
        return $rows ? $rows[0] : 0;
    }

    function getActivePlans()
    {
        return $this->select(
            '*',
            '`store_id` = ' . $this->store_id . ' AND `status` = ' . self::STATUS_ACTIVE,
            array('position' => 'ASC', 'id' => 'ASC')
        ) ?: array();
    }

    function getAdminItems()
    {
        return $this->select('*', '`store_id` = ' . $this->store_id, array('position' => 'ASC', 'id' => 'ASC')) ?: array();
    }

    function savePlan($id, $fields)
    {
        $id = (int)$id;
        $code = strtolower(trim((string)($fields['code'] ?? '')));
        $code = preg_replace('/[^a-z0-9_-]/', '', $code);
        $name = trim((string)($fields['name'] ?? ''));
        $durationDays = (int)($fields['duration_days'] ?? 0);
        $price = round(max(0, (float)($fields['price'] ?? 0)), 2);
        $currency = strtoupper(trim((string)($fields['currency'] ?? 'VND')));
        if ($code === '' || strlen($code) > 50 || $name === '' || mb_strlen($name) > 191) return 0;
        if ($durationDays < 1 || $durationDays > 3650 || !preg_match('/^[A-Z]{3}$/', $currency)) return 0;
        $now = date('Y-m-d H:i:s');
        $data = array(
            'code' => $code,
            'name' => $name,
            'description' => trim((string)($fields['description'] ?? '')),
            'price' => number_format($price, 2, '.', ''),
            'currency' => $currency,
            'duration_days' => $durationDays,
            'status' => (int)($fields['status'] ?? self::STATUS_DISABLED) === self::STATUS_ACTIVE ? self::STATUS_ACTIVE : self::STATUS_DISABLED,
            'position' => max(0, min(65535, (int)($fields['position'] ?? 0))),
            'date_updated' => $now,
        );
        if ($id > 0) return $this->update($data, '`store_id` = ' . $this->store_id . ' AND `id` = ' . $id);
        $data['store_id'] = $this->store_id;
        $data['date_created'] = $now;
        return $this->add($data);
    }

    function changeStatus($id, $status)
    {
        $id = (int)$id;
        $status = (int)$status;
        if ($id < 1 || !in_array($status, array(self::STATUS_DISABLED, self::STATUS_ACTIVE), true)) return 0;
        return $this->update(
            array('status' => $status, 'date_updated' => date('Y-m-d H:i:s')),
            '`store_id` = ' . $this->store_id . ' AND `id` = ' . $id
        );
    }
}
?>
