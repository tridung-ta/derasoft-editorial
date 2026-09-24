-- Rollback for 20260924_add_editorial_payment_plan_snapshot.sql.
-- WARNING: removes the purchased-duration snapshot from every payment transaction.
ALTER TABLE `dc_editorial_payment_transactions`
  DROP COLUMN `plan_duration_days`;
