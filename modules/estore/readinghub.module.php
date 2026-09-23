<?php
$templateFile='reading-hub.tpl.html';
if(session_status()===PHP_SESSION_NONE)session_start();
$readingHubPath=$lang==='en'?'/en/reading-space':($lang==='zh'?'/zh/reading-space':'/khong-gian-doc');
if(empty($_SESSION['store_customerId'])){ $loginPath=$lang==='en'?'/en/login':($lang==='zh'?'/zh/login':'/dang-nhap'); header('Location: '.$loginPath.'?next='.rawurlencode($readingHubPath)); exit; }
include_once(ROOT_PATH.'classes/dao/editorialuserlibrary.class.php');
$library=new EditorialUserLibrary($storeId);
function decodeLibraryRows($rows,$withResume=false){foreach($rows as &$row){$data=json_decode($row['payload'],true);$row['data']=is_array($data)?$data:array();if($withResume&&!empty($row['data']['url'])){$progress=max(0,min(100,(int)$row['progress']));$separator=strpos($row['data']['url'],'?')===false?'?':'&';if($progress>=2&&$progress<=97)$row['data']['url'].=$separator.'resume='.$progress;}}unset($row);return $rows;}
$template->assign('savedItems',decodeLibraryRows($library->getItems($_SESSION['store_customerId'],'saved',100)));
$template->assign('historyItems',decodeLibraryRows($library->getItems($_SESSION['store_customerId'],'history',100),true));
$template->assign('watchLaterItems',decodeLibraryRows($library->getItems($_SESSION['store_customerId'],'watch_later',100)));
$template->assign('slugActive','reading-space'); $template->assign('readingHubPath',$readingHubPath);
$title=$lang==='en'?'Reading Space':($lang==='zh'?'阅读空间':'Không gian đọc');
$template->assign('pageTitle',$title.' | '.$estore->getName()); $template->assign('pageDescription',$title); $template->assign('titlePage',$title);
