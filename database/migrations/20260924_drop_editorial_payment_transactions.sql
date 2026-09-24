-- Rollback for 20260924_create_editorial_payment_transactions.sql.
-- WARNING: this permanently removes all editorial membership payment history.
DROP TABLE IF EXISTS `dc_editorial_payment_transactions`;
