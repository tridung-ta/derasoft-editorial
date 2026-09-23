<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once(ROOT_PATH . "classes/dao/uploads.class.php");
include_once(ROOT_PATH . "classes/dao/uploadalbums.class.php");
include_once(ROOT_PATH . 'classes/dao/static.class.php');
include_once(ROOT_PATH . 'classes/dao/products.class.php');
include_once(ROOT_PATH . 'classes/dao/articles.class.php');
include_once(ROOT_PATH . 'classes/dao/menus.class.php');
include_once(ROOT_PATH . 'classes/dao/productcategories.class.php');
include_once(ROOT_PATH . 'classes/dao/articlecategories.class.php');
include_once(ROOT_PATH . 'classes/dao/users.class.php');
include_once(ROOT_PATH . 'classes/dao/editorialarticleratings.class.php');

$uploadAlbums      = new UploadAlbums($storeId);
$uploads           = new Uploads($storeId);
$template->assign('uploads', $uploads);
$statics           = new StaticPage($storeId);
$products          = new Products($storeId);
$articles          = new Articles($storeId);
$menus             = new Menus($storeId);
$productCategories = new ProductCategories($storeId);
$articleCategories = new ArticleCategories($storeId);
$users             = new Users($storeId);
$editorialRatings  = new EditorialArticleRatings($storeId);

$templateFile = 'news-detail.tpl.html';
$slug = $request->element('slug');

// Lang
$lang = $request->element('lang');
if (empty($lang) || !in_array($lang, ['vn', 'en', 'zh'])) {
    $lang = 'vn';
}
$langCondition = $lang === 'en' ? " AND a.slug_en <> '' AND a.lang LIKE '%en%'" : ($lang === 'zh' ? " AND a.slug_zh <> '' AND a.lang LIKE '%zh%'" : '');

switch ($lang) {
    case 'en':
        $slugField = 'slug_en';
        break;
    case 'zh':
        $slugField = 'slug_zh';
        break;
    default:
        $slugField = 'slug';
        break;
}

$objectInfo = $articles->getObject($slug, $slugField);
$template->assign('objectInfo', $objectInfo);

assignLangUrls($template, $articles, $objectInfo->id, 'article');
if ($lang == 'en') {
    if (!$objectInfo->hasLang('en') || empty($objectInfo->getSlugEn())) {
        $templateFile = '404.tpl.html';
    }
} elseif ($lang == 'zh') {
    if (!$objectInfo->hasLang('zh') ||  empty($objectInfo->getSlugZh())) {
        $templateFile = '404.tpl.html';
    }
}
$categoryObj = $articleCategories->getObject($objectInfo->category_id);

$isCaseStudy = false;
if($categoryObj->getId() == 71){
    $isCaseStudy = true;
}
$template->assign('isCaseStudy', $isCaseStudy);

# Increase viewed
$articleId = $objectInfo->getId();

if (!isset($_SESSION['viewed_articles'])) {
    $_SESSION['viewed_articles'] = [];
}

if (!in_array($articleId, $_SESSION['viewed_articles'])) {
    $articles->increaseViewed($articleId);
    $_SESSION['viewed_articles'][] = $articleId;
}


$slugActive = $categoryObj->getSlug();
$template->assign('slugActive', $slugActive);
    
$type = 'articles';
$template->assign('type', $type);

$isDetail = true;
$template->assign('isDetail', $isDetail);

$userInfo = $users->getObject($objectInfo->poster_id);
$template->assign('userInfo', $userInfo);

$template->assign('lang',        $lang);
$template->assign('slug',        $slug);
$template->assign('objectInfo',     $objectInfo);
$template->assign('categoryObj', $categoryObj);

// Breadcrumb & topNav
$proName = $objectInfo->getTitle($lang);
$template->assign('proName', $proName);

$menuObject = null;

if ($categoryObj) {
    $menuObject = $menus->getObject($categoryObj->getId(), 'route_id');
}

$template->assign('menuObject', $menuObject);

$topNav = [];

if ($lang == 'vn') {
    $topNav[] = [
        'name' => 'Trang chủ',
        'url'  => '/'
    ];
}elseif($lang == 'zh'){
    $topNav[] = [
        'name' => '首页',
        'url'  => '/zh'
    ];
} else {
    $topNav[] = [
        'name' => 'Home',
        'url'  => '/en'
    ];
}

$menuParent = null;
if ($menuObject && $menuObject->getParentId()) {
    $menuParent = $menus->getObject($menuObject->getParentId());
}

$menuGrandParent = null;
if ($menuParent && $menuParent->getParentId()) {
    $menuGrandParent = $menus->getObject($menuParent->getParentId());
}

if ($menuGrandParent) {
    $topNav[] = [
        'name' => $menuGrandParent->getNameByLang($lang),
        'url'  => $menuGrandParent->getUrlByLang($lang)
    ];
}

if ($menuParent) {
    $topNav[] = [
        'name' => $menuParent->getNameByLang($lang),
        'url'  => $menuParent->getUrlByLang($lang)
    ];
}

if ($menuObject) {
    $topNav[] = [
        'name' => $menuObject->getNameByLang($lang),
        'url'  => $menuObject->getUrlByLang($lang)
    ];
}

// Bài viết
$topNav[] = [
    'name' => $proName,
    'url'  => $objectInfo->getUrl($lang),
];

$template->assign('topNav', $topNav);
$template->assign('breadcrumbJson', buildBreadcrumbSchema($topNav));
   
$childCate = $menus->getObjects(1, "parent_id = 3 AND `status` = '1'", [], 999); 
$template->assign('childCate', $childCate);

// Bài viết nhiều lượt xem nhất
$recentArticles = $articles->getObjects(1, "a.`status` = '1' AND a.`id` != '" . $objectInfo->getId() . "'" . $langCondition, ['a.`viewed`' => 'DESC'], 4);
$template->assign('recentArticles', $recentArticles);

// Dịch vụ phổ biến
// $listPopularServices = $products->getObjects(1,"p.`status` = '1' AND p.properties LIKE '" . buildSerializedLike('custom_is_popular', '1') . "'",['p.`id`' => 'DESC'],4);
// $template->assign('listPopularServices', $listPopularServices);

// Bài viết CaseStudy mới nhất
$recentCaseStudies = $articles->getObjects(1, "a.`status` = '1' AND a.`id` != '" . $objectInfo->getId() . "' AND a.`category_id` IN (71, 77, 78)" . $langCondition, ['COALESCE(a.`publish_at`, a.`date_created`)' => 'DESC'], 4);
$template->assign('recentCaseStudies', $recentCaseStudies);

// Keep member ratings isolated from legacy product/comment rating data.
$editorialRatingSummary = $editorialRatings->getSummary($objectInfo->getId());
$editorialMemberRating = !empty($_SESSION['store_customerId'])
    ? $editorialRatings->getMemberRating($objectInfo->getId(), (int)$_SESSION['store_customerId'])
    : 0;
$template->assign('editorialRatingSummary', $editorialRatingSummary);
$template->assign('editorialMemberRating', $editorialMemberRating);

# meta avatar
if ($objectInfo->getAvatarImage($uploads) != null) {
    $avatarObject = $objectInfo->getAvatarImage($uploads);
    $logoimg1 = PROTOCOL . DOMAIN .'/'.$avatarObject->getPath().'/'.$avatarObject->getUrlL();
    $template->assign('logoimg1', $logoimg1);
}

#related articles
$recentArticlesBlock = $articles->getObjects(1, "a.`status` = '1' AND a.id != " . $objectInfo->getId() . " AND a.category_id = " . $objectInfo->getCategoryId() . $langCondition, ['COALESCE(a.`publish_at`, a.`date_created`)' => 'DESC'], 10);
$template->assign('recentArticlesBlock', $recentArticlesBlock);

//Schema
$descriptionSchema = html_entity_decode($objectInfo->getDescription($lang),ENT_QUOTES | ENT_HTML5,'UTF-8');
$template->assign('descriptionSchema', $descriptionSchema);

// SEO
if ($lang === 'en') {
    $pageTitle       = $objectInfo->getProperty('custom_en_titleSeo')     ?: $objectInfo->getProperty('custom_titleSeo')    ?: $objectInfo->title;
    $pageKeywords    = $objectInfo->getProperty('custom_en_meta_keyword') ?: $objectInfo->getProperty('custom_meta_keyword');
    $pageDescription = $objectInfo->getProperty('custom_en_captionSeo')        ?: $objectInfo->getProperty('custom_captionSeo');
} elseif ($lang === 'zh') {
    $pageTitle       = $objectInfo->getProperty('custom_zh_titleSeo') ?: $objectInfo->getTitle('zh');
    $pageKeywords    = $objectInfo->getProperty('custom_zh_meta_keyword');
    $pageDescription = $objectInfo->getProperty('custom_zh_captionSeo') ?: $objectInfo->getDescription('zh');
} else {
    $pageTitle       = $objectInfo->getProperty('custom_titleSeo') ?: $objectInfo->title;
    $pageKeywords    = $objectInfo->getProperty('custom_meta_keyword');
    $pageDescription = $objectInfo->getProperty('custom_captionSeo');
}

$template->assign('pageTitle',       $pageTitle);
$template->assign('titlePage',       $pageTitle);
$template->assign('pageKeywords',    $pageKeywords);
$template->assign('pageDescription', $pageDescription);
