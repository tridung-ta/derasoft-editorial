<?php
$templateFile = 'login.tpl.html';

$topNav = [
    ["name" => "Trang chủ", "url" => "/"],
    ["name" => "Đăng nhập", "url" => "/dang-nhap"],
];
if ($topNav) $template->assign('topNav', $topNav);

if (!empty($_SESSION["Normal_customerId"])) {
    header("Location: /");
    exit;
}




