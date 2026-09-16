<?php
$curatedVideos = array(
    array('id' => 'Q8ucXj2pDbo', 'title' => 'Không gian văn hóa nghệ thuật: Bảo tàng Mỹ thuật Việt Nam', 'title_en' => 'Vietnam Fine Arts Museum: An artistic and cultural space', 'title_zh' => '越南美术博物馆：艺术与文化空间', 'description' => 'Khám phá không gian lưu giữ và giới thiệu những giá trị tiêu biểu của mỹ thuật Việt Nam.', 'source' => 'Bảo tàng Mỹ thuật Việt Nam'),
    array('id' => 'q-r5WwQukik', 'title' => 'Phim tài liệu 60 năm Bảo tàng Mỹ thuật Việt Nam', 'title_en' => 'Documentary: 60 years of the Vietnam Fine Arts Museum', 'title_zh' => '纪录片：越南美术博物馆六十年', 'description' => 'Hành trình hình thành, phát triển và gìn giữ di sản mỹ thuật qua nhiều thế hệ.', 'source' => 'Bảo tàng Mỹ thuật Việt Nam'),
    array('id' => 'vx54SQs3A1M', 'title' => 'Trải nghiệm mỹ thuật với ứng dụng iMuseum VFA', 'title_en' => 'Experiencing art with the iMuseum VFA application', 'title_zh' => '通过 iMuseum VFA 应用体验艺术', 'description' => 'Một cách tiếp cận mới giúp công chúng tìm hiểu tác phẩm và không gian trưng bày.', 'source' => 'Bảo tàng Mỹ thuật Việt Nam'),
    array('id' => 'tJTkPdk3Mks', 'title' => 'Không gian mỹ thuật đương đại tại Bảo tàng Mỹ thuật Việt Nam', 'title_en' => 'Contemporary art at the Vietnam Fine Arts Museum', 'title_zh' => '越南美术博物馆的当代艺术空间', 'description' => 'Góc nhìn về thực hành sáng tạo và những chuyển động của mỹ thuật đương đại.', 'source' => 'Bảo tàng Mỹ thuật Việt Nam'),
);
$template->assign('curatedVideos', $curatedVideos);
$editorialCategorySlug = 'video';
$editorialTitle = 'Video';
$editorialIntro = 'Video, phỏng vấn và đối thoại về văn học, nghệ thuật và văn hóa.';
$editorialRoute = '/video';
$editorialTemplateFile = 'editorial-video.tpl.html';
include ROOT_PATH . 'modules/estore/editorial_common.module.php';
return;

