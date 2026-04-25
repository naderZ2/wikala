-- Add seller_id column to roles table to allow multi-tenant roles
ALTER TABLE `roles` ADD COLUMN `seller_id` BIGINT UNSIGNED NULL AFTER `guard_name`;

-- Insert default permissions for the seller-api guard
INSERT IGNORE INTO `permissions` (`name`, `guard_name`, `created_at`, `updated_at`) VALUES 
('manage-products', 'seller-api', NOW(), NOW()),
('manage-orders', 'seller-api', NOW(), NOW()),
('manage-settings', 'seller-api', NOW(), NOW()),
('manage-employees', 'seller-api', NOW(), NOW());
