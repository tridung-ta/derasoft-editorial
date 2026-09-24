-- Editorial membership foundation. Apply before deploying membership DAOs or paywall enforcement.
-- Additive only: no existing tables or rows are changed.
CREATE TABLE IF NOT EXISTS `dc_editorial_membership_plans` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `store_id` INT UNSIGNED NOT NULL DEFAULT 1,
  `code` VARCHAR(50) NOT NULL,
  `name` VARCHAR(191) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `price` DECIMAL(15,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `currency` CHAR(3) NOT NULL DEFAULT 'VND',
  `duration_days` SMALLINT UNSIGNED NOT NULL,
  `status` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=disabled,1=active',
  `position` SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  `date_created` DATETIME NOT NULL,
  `date_updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_editorial_membership_plan_code` (`store_id`, `code`),
  KEY `idx_editorial_membership_plan_status` (`store_id`, `status`, `position`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `dc_editorial_subscriptions` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `store_id` INT UNSIGNED NOT NULL DEFAULT 1,
  `customer_id` INT UNSIGNED NOT NULL,
  `plan_id` BIGINT UNSIGNED NOT NULL,
  `status` TINYINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=pending,1=active,2=expired,3=canceled,4=revoked',
  `source` VARCHAR(30) NOT NULL DEFAULT 'manual',
  `starts_at` DATETIME NOT NULL,
  `ends_at` DATETIME NOT NULL,
  `granted_by` INT UNSIGNED DEFAULT NULL,
  `note` VARCHAR(500) DEFAULT NULL,
  `date_created` DATETIME NOT NULL,
  `date_updated` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_editorial_subscription_entitlement` (`store_id`, `customer_id`, `status`, `starts_at`, `ends_at`),
  KEY `idx_editorial_subscription_plan` (`store_id`, `plan_id`, `status`),
  KEY `idx_editorial_subscription_expiry` (`store_id`, `status`, `ends_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
