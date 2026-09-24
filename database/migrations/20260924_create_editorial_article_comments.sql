-- Editorial article comments. Apply once before deploying comment modules.
CREATE TABLE IF NOT EXISTS `dc_editorial_article_comments` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `store_id` INT UNSIGNED NOT NULL DEFAULT 1,
  `article_id` INT UNSIGNED NOT NULL,
  `customer_id` INT UNSIGNED NOT NULL,
  `content` TEXT NOT NULL,
  `status` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=pending,1=approved,2=rejected,3=deleted',
  `date_created` DATETIME NOT NULL,
  `date_updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_editorial_comment_article` (`store_id`, `article_id`, `status`, `date_created`),
  KEY `idx_editorial_comment_customer` (`store_id`, `customer_id`, `date_created`),
  KEY `idx_editorial_comment_moderation` (`store_id`, `status`, `date_created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
