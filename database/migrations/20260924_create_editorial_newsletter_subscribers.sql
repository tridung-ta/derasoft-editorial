-- Editorial newsletter subscribers. Apply once before deploying newsletter modules.
CREATE TABLE IF NOT EXISTS `dc_editorial_newsletter_subscribers` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `store_id` INT UNSIGNED NOT NULL DEFAULT 1,
  `email` VARCHAR(191) NOT NULL,
  `language` VARCHAR(5) NOT NULL DEFAULT 'vn',
  `status` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=pending,1=active,2=unsubscribed,3=blocked',
  `source` VARCHAR(50) NOT NULL DEFAULT 'footer',
  `confirmation_token_hash` CHAR(64) DEFAULT NULL,
  `unsubscribe_token_hash` CHAR(64) NOT NULL,
  `consented_at` DATETIME DEFAULT NULL,
  `confirmed_at` DATETIME DEFAULT NULL,
  `unsubscribed_at` DATETIME DEFAULT NULL,
  `date_created` DATETIME NOT NULL,
  `date_updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_editorial_newsletter_email` (`store_id`, `email`),
  KEY `idx_editorial_newsletter_status` (`store_id`, `status`, `date_created`),
  KEY `idx_editorial_newsletter_confirmation` (`store_id`, `confirmation_token_hash`),
  KEY `idx_editorial_newsletter_unsubscribe` (`store_id`, `unsubscribe_token_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
