-- Snapshot the purchased entitlement duration so later plan edits cannot change a pending payment.
ALTER TABLE `dc_editorial_payment_transactions`
  ADD COLUMN `plan_duration_days` SMALLINT UNSIGNED NOT NULL AFTER `plan_id`;
