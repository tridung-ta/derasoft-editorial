
<?php

include_once(ROOT_PATH . 'classes/dao/customers.class.php');
$customers = new Customers(1);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Xóa toàn bộ session
$_SESSION = [];

// Hủy session
session_destroy();

// redirect về trang chủ
header("Location: /");
exit;