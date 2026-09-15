<?php
/**
 * DeraCMS editorial RSS importer.
 * CLI only. Default is dry-run; pass --commit to create waiting articles.
 */
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}

define('ROOT_PATH', dirname(__DIR__) . '/');
include_once ROOT_PATH . 'includes/constant.inc.php';
include_once ROOT_PATH . 'includes/config.inc.php';
include_once ROOT_PATH . 'includes/functions.inc.php';
include_once ROOT_PATH . 'classes/database/mysql.class.php';
include_once ROOT_PATH . 'classes/dao/articles.class.php';
include_once ROOT_PATH . 'classes/dao/articlecategories.class.php';

date_default_timezone_set(defined('TIME_ZONE') ? TIME_ZONE : 'Asia/Ho_Chi_Minh');
$query_count = 0;
$db = new DB();
$storeId = 1;
$commit = in_array('--commit', $argv, true);
$insecure = in_array('--insecure', $argv, true);
if ($commit && $insecure) {
    fwrite(STDERR, "--insecure is allowed for dry-run only.\n");
    exit(2);
}
$limit = 8;
foreach ($argv as $argument) {
    if (strpos($argument, '--limit=') === 0) {
        $limit = max(1, min(30, (int) substr($argument, 8)));
    }
}

$sources = include __DIR__ . '/editorial-rss-sources.php';
$articles = new Articles($storeId);
$categories = new ArticleCategories($storeId);
$listCategories = in_array('--list-categories', $argv, true);
if ($listCategories) {
    $availableCategories = $categories->getObjects(1, "c.status = '1'", array('id' => 'ASC'), 0);
    if ($availableCategories) {
        foreach ($availableCategories as $availableCategory) {
            echo $availableCategory->getId() . "\t" . $availableCategory->getSlug() . PHP_EOL;
        }
    }
    exit(0);
}
$categoryCache = array();
$stats = array('seen' => 0, 'new' => 0, 'duplicate' => 0, 'filtered' => 0, 'invalid' => 0, 'missing_category' => 0, 'failed' => 0);

function rssFetch($url, $insecure = false)
{
    if (!filter_var($url, FILTER_VALIDATE_URL) || stripos($url, 'https://') !== 0) {
        throw new RuntimeException('Only HTTPS RSS URLs are accepted.');
    }
    $curl = curl_init($url);
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 3,
        CURLOPT_CONNECTTIMEOUT => 8,
        CURLOPT_TIMEOUT => 18,
        CURLOPT_SSL_VERIFYPEER => !$insecure,
        CURLOPT_SSL_VERIFYHOST => $insecure ? 0 : 2,
        CURLOPT_USERAGENT => 'DeraCMS-Editorial-RSS/1.0',
        CURLOPT_PROTOCOLS => CURLPROTO_HTTPS,
    ));
    $body = curl_exec($curl);
    $status = (int) curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $error = curl_error($curl);
    unset($curl);
    if ($body === false || $status < 200 || $status >= 300) {
        throw new RuntimeException('RSS request failed: HTTP ' . $status . ($error ? ' - ' . $error : ''));
    }
    if (strlen($body) > 2097152) {
        throw new RuntimeException('RSS response exceeds 2 MB.');
    }
    return $body;
}

function rssText($value, $maxLength = 0)
{
    $text = html_entity_decode(strip_tags((string) $value), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $text = preg_replace('/\s+/u', ' ', trim($text));
    if ($maxLength > 0 && mb_strlen($text, 'UTF-8') > $maxLength) {
        $text = rtrim(mb_substr($text, 0, $maxLength - 1, 'UTF-8')) . '…';
    }
    return $text;
}

function rssSlug($title, $hash)
{
    $slug = mb_strtolower($title, 'UTF-8');
    $ascii = function_exists('iconv') ? iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $slug) : false;
    if ($ascii !== false) $slug = $ascii;
    $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug);
    $slug = trim($slug, '-');
    if (!$slug) $slug = 'tin-moi';
    return substr($slug, 0, 120) . '-' . substr($hash, 0, 8);
}

function rssCategorySlug($title, $description, $fallback)
{
    $text = mb_strtolower($title . ' ' . $description, 'UTF-8');
    $maps = array(
        'am-nhac' => array('âm nhạc', 'ca sĩ', 'nhạc sĩ', 'concert', 'album'),
        'my-thuat' => array('mỹ thuật', 'hội họa', 'triển lãm', 'điêu khắc', 'nhiếp ảnh'),
        'san-khau-nghe-thuat' => array('sân khấu', 'kịch', 'tuồng', 'chèo', 'cải lương'),
        'tho' => array('thơ', 'thi ca', 'nhà thơ'),
        'van-xuoi' => array('văn học', 'tiểu thuyết', 'truyện ngắn', 'nhà văn', 'tản văn'),
        'van-hoa' => array('văn hóa', 'di sản', 'lễ hội', 'truyền thống'),
    );
    foreach ($maps as $slug => $keywords) {
        foreach ($keywords as $keyword) {
            if (mb_strpos($text, $keyword, 0, 'UTF-8') !== false) return $slug;
        }
    }
    return $fallback;
}

function rssMatchesSourceFilters($title, $description, $source)
{
    if (empty($source['include_keywords'])) return true;
    $text = mb_strtolower($title . ' ' . $description, 'UTF-8');
    foreach ($source['include_keywords'] as $keyword) {
        if (mb_strpos($text, mb_strtolower($keyword, 'UTF-8'), 0, 'UTF-8') !== false) return true;
    }
    return false;
}

function rssCategoryId($slug, $categories, &$cache)
{
    if (isset($cache[$slug])) return $cache[$slug];
    $category = $categories->getObject($slug, 'slug', "c.status = '1'");
    if (!$category && $slug === 'tin-tuc-moi') {
        $category = $categories->getObject('tin-tuc', 'slug', "c.status = '1'");
    }
    $cache[$slug] = $category ? (int) $category->getId() : 0;
    return $cache[$slug];
}

foreach ($sources as $source) {
    if (empty($source['enabled'])) continue;
    try {
        $xmlBody = rssFetch($source['url'], $insecure);
        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($xmlBody, 'SimpleXMLElement', LIBXML_NONET | LIBXML_NOCDATA);
        if (!$xml || empty($xml->channel->item)) throw new RuntimeException('Invalid or empty RSS document.');
        $processed = 0;
        foreach ($xml->channel->item as $item) {
            if ($processed >= $limit) break;
            $stats['seen']++;
            $title = rssText($item->title, 220);
            $description = rssText($item->description, 500);
            $sourceUrl = trim((string) $item->link);
            if (!$title || !filter_var($sourceUrl, FILTER_VALIDATE_URL)) {
                $stats['invalid']++;
                $stats['failed']++;
                continue;
            }
            if (!rssMatchesSourceFilters($title, $description, $source)) {
                $stats['filtered']++;
                continue;
            }
            $hash = hash('sha256', $sourceUrl);
            $duplicate = $articles->getObjects(1, "a.properties LIKE '%editorial_source_hash%' AND a.properties LIKE '%" . $hash . "%'", array(), 1);
            if ($duplicate) {
                $stats['duplicate']++;
                continue;
            }
            $categorySlug = rssCategorySlug($title, $description, $source['default_category']);
            $categoryId = rssCategoryId($categorySlug, $categories, $categoryCache);
            if (!$categoryId) $categoryId = rssCategoryId($source['default_category'], $categories, $categoryCache);
            if (!$categoryId) {
                $stats['missing_category']++;
                $stats['failed']++;
                continue;
            }
            $published = strtotime((string) $item->pubDate);
            $publishAt = $published ? date('Y-m-d H:i:s', $published) : date('Y-m-d H:i:s');
            $properties = array(
                'editorial_imported' => 1,
                'editorial_source_name' => $source['name'],
                'editorial_source_url' => $sourceUrl,
                'editorial_source_hash' => $hash,
            );
            $detail = '<p>' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '</p>'
                . '<p><strong>Nguồn:</strong> ' . htmlspecialchars($source['name'], ENT_QUOTES, 'UTF-8') . '.</p>'
                . '<p><a href="' . htmlspecialchars($sourceUrl, ENT_QUOTES, 'UTF-8') . '" target="_blank" rel="noopener noreferrer nofollow">Đọc bài gốc tại nguồn</a></p>';
            $data = array(
                'store_id' => $storeId,
                'category_id' => $categoryId,
                'slug' => rssSlug($title, $hash),
                'slug_en' => '',
                'slug_zh' => '',
                'title' => $title,
                'keyword' => '',
                'description' => $description,
                'detail' => $detail,
                'lang' => 'vn',
                'viewed' => 0,
                'star' => 0,
                'article_group_ids' => '',
                'date_created' => date('Y-m-d H:i:s'),
                'date_updated' => date('Y-m-d H:i:s'),
                'properties' => serialize($properties),
                'position' => 1,
                'status' => defined('S_WAITING') ? S_WAITING : 3,
                'home' => 0,
                'publish_at' => $publishAt,
            );
            if ($commit && !$articles->addData($data)) {
                $stats['failed']++;
                continue;
            }
            $stats['new']++;
            $processed++;
            echo ($commit ? '[IMPORTED] ' : '[DRY-RUN] ') . $title . ' -> ' . $categorySlug . PHP_EOL;
        }
    } catch (Throwable $error) {
        $stats['failed']++;
        fwrite(STDERR, '[' . $source['name'] . '] ' . $error->getMessage() . PHP_EOL);
    }
}

echo sprintf("Done: seen=%d new=%d duplicate=%d filtered=%d invalid=%d missing_category=%d failed=%d mode=%s\n", $stats['seen'], $stats['new'], $stats['duplicate'], $stats['filtered'], $stats['invalid'], $stats['missing_category'], $stats['failed'], $commit ? 'commit' : 'dry-run');
exit($stats['failed'] ? 1 : 0);
