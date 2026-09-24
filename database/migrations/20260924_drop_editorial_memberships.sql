-- Rollback for 20260924_create_editorial_memberships.sql.
-- WARNING: this permanently removes all editorial subscription and membership plan records.
DROP TABLE IF EXISTS `dc_editorial_subscriptions`;
DROP TABLE IF EXISTS `dc_editorial_membership_plans`;
