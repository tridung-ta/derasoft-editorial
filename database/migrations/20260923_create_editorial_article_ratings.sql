-- Editorial article ratings. Apply once before deploying the rating endpoint.
CREATE TABLE IF NOT EXISTS `dc_editorial_article_ratings` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `store_id` INT UNSIGNED NOT NULL DEFAULT 1,
  `article_id` INT UNSIGNED NOT NULL,
  `customer_id` INT UNSIGNED NOT NULL,
  `rating` TINYINT UNSIGNED NOT NULL,
  `date_created` DATETIME NOT NULL,
  `date_updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_editorial_rating_member` (`store_id`, `article_id`, `customer_id`),
  KEY `idx_editorial_rating_summary` (`store_id`, `article_id`, `rating`),
  KEY `idx_editorial_rating_customer` (`store_id`, `customer_id`, `date_updated`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
