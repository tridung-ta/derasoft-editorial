<?php

// New editorial Video function. Legacy implementation remains below for rollback.
$editorialCategorySlug='video';
$editorialTitle='Video';
$editorialIntro='Video, phỏng vấn và đối thoại về văn học, nghệ thuật và văn hóa.';
$editorialRoute='/video';
$editorialTemplateFile='editorial-video.tpl.html';
include ROOT_PATH.'modules/estore/editorial_common.module.php';
return;

$templateFile = 'video.tpl.html';
$slugActive = 'video';
$template->assign('slugActive', $slugActive);

$lang = $template->getTemplateVars('lang') ?: 'vn';
$template->assign('lang', $lang);
$template->assign('slug', 'video');

$topNav = [
    ['name' => $lang === 'en' ? 'Home' : 'Trang chủ', 'url' => $lang === 'en' ? '/en' : '/'],
    ['name' => 'Video', 'url' => $lang === 'en' ? '/en/video' : '/video'],
];
$template->assign('topNav', $topNav);
$template->assign('breadcrumbJson', buildBreadcrumbSchema($topNav));
$template->assign('pageTitle', 'Video | ' . $estore->getName());
$template->assign('titlePage', 'Video');
$template->assign('pageKeywords', 'video, văn học, nghệ thuật, văn hóa');
$template->assign('pageDescription', 'Video, đối thoại và tư liệu về văn học, nghệ thuật và văn hóa.');

$template->assign('videoCards', [
    ['image' => 'video-1.jpg', 'title' => 'Đối thoại về văn học và trách nhiệm ngòi bút'],
    ['image' => 'video-2.jpg', 'title' => 'Vang vọng hồn quê trong thơ ca Việt Nam'],
    ['image' => 'video-3.jpg', 'title' => 'Hành trình gìn giữ các giá trị văn hóa'],
    ['image' => 'video-4.jpg', 'title' => 'Góc nhìn nghệ thuật trong đời sống đương đại'],
]);
