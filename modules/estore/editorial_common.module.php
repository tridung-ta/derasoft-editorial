<?php
include_once(ROOT_PATH.'classes/dao/uploads.class.php');
include_once(ROOT_PATH.'classes/dao/articles.class.php');
include_once(ROOT_PATH.'classes/dao/articlecategories.class.php');
$uploads=new Uploads($storeId); $articles=new Articles($storeId); $articleCategories=new ArticleCategories($storeId);
$template->assign('uploads',$uploads);
$categoryRows=$db->query("SELECT id,parent_id,slug,name FROM dc_article_categories WHERE store_id IN (0,".(int)$storeId.") AND status=1 ORDER BY position ASC,id ASC") ?: [];
$rootCategory=null;$byParent=[];
foreach($categoryRows as $category){$category['id']=(int)$category['id'];$category['parent_id']=(int)$category['parent_id'];$byParent[$category['parent_id']][]=$category;if($category['slug']===$editorialCategorySlug)$rootCategory=$category;}
$allowedIds=[];
$collectIds=function($parentId) use (&$collectIds,&$allowedIds,$byParent){
    if(empty($byParent[$parentId])) return;
    foreach($byParent[$parentId] as $child){$allowedIds[]=$child['id'];$collectIds($child['id']);}
};
$categoryNav=[];
if($rootCategory){$allowedIds[]=$rootCategory['id'];$collectIds($rootCategory['id']);$categoryNav=$byParent[$rootCategory['id']] ?? [];}
$selectedCategory=$rootCategory; $selectedSlug=$request->element('category');
if($selectedSlug){foreach($categoryRows as $candidate){if($candidate['slug']===$selectedSlug && in_array($candidate['id'],$allowedIds,true)){$selectedCategory=$candidate;break;}}}
$queryIds=($selectedCategory && $rootCategory && $selectedCategory['id'] !== $rootCategory['id'])?[$selectedCategory['id']]:$allowedIds;
$condition=$queryIds?'a.status = 1 AND a.category_id IN ('.implode(',',array_unique($queryIds)).')':'1 = 0';
$result=paginate($request,$articles,$condition,$condition,['COALESCE(a.`publish_at`, a.`date_created`)'=>'DESC'],12);
$templateFile=$editorialTemplateFile ?? 'editorial-list.tpl.html'; $slugActive=$editorialCategorySlug;
$template->assign('slugActive',$slugActive);$template->assign('items',$result['items']);$template->assign('page',$result['page']);$template->assign('totalPages',$result['totalPages']);$template->assign('totalRows',$result['totalRows']);
$template->assign('categoryNav',$categoryNav);$template->assign('selectedCategory',$selectedCategory);$template->assign('editorialTitle',$editorialTitle);$template->assign('editorialIntro',$editorialIntro);$template->assign('editorialRoute',$editorialRoute);
$template->assign('pageTitle',$editorialTitle.' | '.$estore->getName());$template->assign('titlePage',$editorialTitle);$template->assign('pageKeywords',$editorialTitle);$template->assign('pageDescription',$editorialIntro);
$topNav=[['name'=>'Trang chủ','url'=>'/'],['name'=>$editorialTitle,'url'=>$editorialRoute]];$template->assign('topNav',$topNav);$template->assign('breadcrumbJson',buildBreadcrumbSchema($topNav));
