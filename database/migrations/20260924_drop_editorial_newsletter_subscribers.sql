-- Rollback for 20260924_create_editorial_newsletter_subscribers.sql.
-- WARNING: this permanently removes all newsletter consent records.
DROP TABLE IF EXISTS `dc_editorial_newsletter_subscribers`;
