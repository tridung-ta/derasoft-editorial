<?php
include_once(ROOT_PATH.'classes/dao/uploads.class.php');
include_once(ROOT_PATH.'classes/dao/articles.class.php');
include_once(ROOT_PATH.'classes/dao/articlecategories.class.php');
$uploads=new Uploads($storeId);$articles=new Articles($storeId);$articleCategories=new ArticleCategories($storeId);
$template->assign('uploads',$uploads);
$categoryRows=$db->query("SELECT id,parent_id,slug FROM dc_article_categories WHERE store_id IN (0,".(int)$storeId.") AND status=1 ORDER BY position ASC,id ASC") ?: [];
$byParent=[];$bySlug=[];foreach($categoryRows as $category){$category['id']=(int)$category['id'];$category['parent_id']=(int)$category['parent_id'];$byParent[$category['parent_id']][]=$category;$bySlug[$category['slug']]=$category;}
$getSection=function($slug,$limit=6) use($articles,$byParent,$bySlug){
    if(empty($bySlug[$slug]))return [];$root=$bySlug[$slug];
    $ids=[$root['id']];$walk=function($parentId) use (&$walk,&$ids,$byParent){if(empty($byParent[$parentId]))return;foreach($byParent[$parentId] as $child){$ids[]=$child['id'];$walk($child['id']);}};$walk($root['id']);
    return $articles->getObjects(1,'a.status = 1 AND a.category_id IN ('.implode(',',array_unique($ids)).')',['COALESCE(a.`publish_at`, a.`date_created`)'=>'DESC'],$limit) ?: [];
};
$template->assign('homeLiterature',$getSection('van-tho',6));
$template->assign('homeArt',$getSection('nghe-thuat',6));
$template->assign('homeNews',$getSection('tin-tuc-moi',4));
$template->assign('homeVideos',$getSection('video',4));
$templateFile='editorial-home.tpl.html';$slugActive='';$template->assign('slugActive',$slugActive);
$template->assign('pageTitle',$estore->getName());$template->assign('titlePage',$estore->getName());$template->assign('pageKeywords','văn thơ, nghệ thuật, tin tức, video');$template->assign('pageDescription','Không gian văn học, nghệ thuật và văn hóa.');
