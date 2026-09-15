<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$templateFile = 'signin.tpl.html';

# breadcrumb
$topNav = [
    ["name" => "Trang chủ", "url" => "/"],
    ["name" => "Đăng ký", "url" => "/dang-ky"],
];
$template->assign('topNav', $topNav);

