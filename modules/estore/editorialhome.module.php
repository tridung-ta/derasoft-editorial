<?php
include_once(ROOT_PATH . 'classes/dao/uploads.class.php');
include_once(ROOT_PATH . 'classes/dao/articles.class.php');
include_once(ROOT_PATH . 'classes/dao/articlecategories.class.php');

$uploads = new Uploads($storeId);
$articles = new Articles($storeId);
$articleCategories = new ArticleCategories($storeId);
$template->assign('uploads', $uploads);

$categoryRows = $db->query(
    "SELECT id, parent_id, slug FROM dc_article_categories " .
    "WHERE store_id IN (0," . (int) $storeId . ") AND status = 1 " .
    "ORDER BY position ASC, id ASC"
) ?: array();

$byParent = array();
$bySlug = array();
foreach ($categoryRows as $category) {
    $category['id'] = (int) $category['id'];
    $category['parent_id'] = (int) $category['parent_id'];
    $byParent[$category['parent_id']][] = $category;
    $bySlug[$category['slug']] = $category;
}

$editorialCategoryIds = array();
foreach (array('tho', 'van-xuoi', 'am-nhac', 'my-thuat', 'san-khau-nghe-thuat', 'van-hoa', 'tin-tuc-moi', 'video') as $editorialSlug) {
    if (!empty($bySlug[$editorialSlug])) $editorialCategoryIds[] = (int) $bySlug[$editorialSlug]['id'];
}
$editorialCategoryIds = array_values(array_unique($editorialCategoryIds));
$condition = $editorialCategoryIds
    ? 'a.status = 1 AND a.category_id IN (' . implode(',', $editorialCategoryIds) . ')'
    : '1 = 0';
if ($lang === 'en') $condition .= " AND a.slug_en <> '' AND a.lang LIKE '%en%'";
if ($lang === 'zh') $condition .= " AND a.slug_zh <> '' AND a.lang LIKE '%zh%'";

$orderedArticles = $articles->getObjects(
    1,
    $condition,
    array('COALESCE(a.`publish_at`, a.`date_created`)' => 'DESC', 'a.id' => 'DESC'),
    13
) ?: array();

$template->assign('homeLatest', array_slice($orderedArticles, 0, 7));
$template->assign('homeEarlier', array_slice($orderedArticles, 7, 6));
$templateFile = 'editorial-home.tpl.html';
$slugActive = '';
$template->assign('slugActive', $slugActive);
$template->assign('pageTitle', $estore->getName());
$template->assign('titlePage', $estore->getName());
$template->assign('pageKeywords', 'văn thơ, nghệ thuật, tin tức, video');
$template->assign('pageDescription', 'Không gian văn học, nghệ thuật và văn hóa.');
