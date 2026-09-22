-- V48 - Editorial Control Center
-- Run this file once in phpMyAdmin before opening the V48 admin screen.

CREATE TABLE IF NOT EXISTS `dc_editorial_features` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL DEFAULT 0,
  `article_id` bigint(20) NOT NULL DEFAULT 0,
  `external_key` varchar(100) DEFAULT NULL,
  `feature_type` enum('cover','featured','trending_override','video_featured','editor_pick') NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `start_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_editorial_feature` (`store_id`,`article_id`,`feature_type`,`external_key`),
  KEY `idx_editorial_feature_active` (`store_id`,`feature_type`,`status`,`start_at`,`end_at`,`position`),
  KEY `idx_editorial_feature_article` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `dc_article_view_daily` (
  `store_id` int(11) NOT NULL DEFAULT 0,
  `article_id` bigint(20) NOT NULL,
  `view_date` date NOT NULL,
  `views` bigint(20) unsigned NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`store_id`,`article_id`,`view_date`),
  KEY `idx_article_view_daily_date` (`store_id`,`view_date`,`views`),
  KEY `idx_article_view_daily_article` (`article_id`,`view_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
