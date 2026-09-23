<?php
header('Content-Type: application/json; charset=utf-8');
ini_set('display_errors', '0');
error_reporting(0);
if (session_status() === PHP_SESSION_NONE) session_start();

include_once(ROOT_PATH . 'classes/dao/articles.class.php');
include_once(ROOT_PATH . 'classes/dao/editorialarticleratings.class.php');

function editorialRatingResponse($success, $data = array(), $status = 200)
{
    http_response_code($status);
    echo json_encode(array_merge(array('success' => (bool)$success), $data), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

$customerId = (int)($_SESSION['store_customerId'] ?? 0);
if ($customerId < 1) editorialRatingResponse(false, array('message' => 'Bạn cần đăng nhập để đánh giá bài viết.'), 401);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') editorialRatingResponse(false, array('message' => 'Yêu cầu không hợp lệ.'), 405);
if (empty($_SESSION['csrf_token']) || !hash_equals((string)$_SESSION['csrf_token'], (string)($_POST['csrf_token'] ?? ''))) {
    editorialRatingResponse(false, array('message' => 'Phiên làm việc đã hết hạn. Vui lòng tải lại trang.'), 403);
}

$articleId = (int)($_POST['article_id'] ?? 0);
$rating = (int)($_POST['rating'] ?? 0);
if ($articleId < 1 || $rating < 1 || $rating > 5) {
    editorialRatingResponse(false, array('message' => 'Mức đánh giá phải từ 1 đến 5 sao.'), 422);
}

$now = time();
$rateKey = 'editorial_rating_' . $customerId;
$attempts = isset($_SESSION[$rateKey]) && is_array($_SESSION[$rateKey]) ? $_SESSION[$rateKey] : array();
$attempts = array_values(array_filter($attempts, function ($timestamp) use ($now) { return ($now - (int)$timestamp) < 300; }));
if (count($attempts) >= 10) editorialRatingResponse(false, array('message' => 'Bạn thao tác quá nhanh. Vui lòng thử lại sau ít phút.'), 429);
$attempts[] = $now;
$_SESSION[$rateKey] = $attempts;

$storeId = 1;
$articles = new Articles($storeId);
$article = $articles->getObject($articleId, 'id', "a.`status` = '1'");
if (!$article) editorialRatingResponse(false, array('message' => 'Bài viết không tồn tại hoặc chưa được xuất bản.'), 404);

$ratings = new EditorialArticleRatings($storeId);
if (!$ratings->saveMemberRating($articleId, $customerId, $rating)) {
    editorialRatingResponse(false, array('message' => 'Chưa thể lưu đánh giá. Vui lòng thử lại.'), 500);
}
$summary = $ratings->getSummary($articleId);
editorialRatingResponse(true, array(
    'message' => 'Cảm ơn bạn đã đánh giá bài viết.',
    'rating' => $rating,
    'average' => $summary['average'],
    'count' => $summary['count'],
));
