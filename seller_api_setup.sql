-- ============================================================
-- SELLER API - Schema Changes + Fake Data
-- SAFE TO RE-RUN (won't error if already applied)
-- ============================================================

-- ==========================================
-- 1. ALTER sellers table (add new columns if not exist)
-- ==========================================
SET @dbname = DATABASE();

SELECT COUNT(*) INTO @col_exists FROM information_schema.columns WHERE table_schema = @dbname AND table_name = 'sellers' AND column_name = 'phone';
SET @sql = IF(@col_exists = 0, 'ALTER TABLE `sellers` ADD COLUMN `phone` VARCHAR(255) NULL AFTER `name`', 'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SELECT COUNT(*) INTO @col_exists FROM information_schema.columns WHERE table_schema = @dbname AND table_name = 'sellers' AND column_name = 'shop_name_en';
SET @sql = IF(@col_exists = 0, 'ALTER TABLE `sellers` ADD COLUMN `shop_name_en` VARCHAR(255) NULL AFTER `email`', 'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SELECT COUNT(*) INTO @col_exists FROM information_schema.columns WHERE table_schema = @dbname AND table_name = 'sellers' AND column_name = 'shop_name_ar';
SET @sql = IF(@col_exists = 0, 'ALTER TABLE `sellers` ADD COLUMN `shop_name_ar` VARCHAR(255) NULL AFTER `shop_name_en`', 'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SELECT COUNT(*) INTO @col_exists FROM information_schema.columns WHERE table_schema = @dbname AND table_name = 'sellers' AND column_name = 'banner';
SET @sql = IF(@col_exists = 0, 'ALTER TABLE `sellers` ADD COLUMN `banner` VARCHAR(255) NULL AFTER `img_path`', 'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

-- ==========================================
-- 2. ALTER city_seller table (add delivery columns if not exist)
-- ==========================================
SELECT COUNT(*) INTO @col_exists FROM information_schema.columns WHERE table_schema = @dbname AND table_name = 'city_seller' AND column_name = 'region_id';
SET @sql = IF(@col_exists = 0, 'ALTER TABLE `city_seller` ADD COLUMN `region_id` INT(11) NULL AFTER `city_id`', 'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SELECT COUNT(*) INTO @col_exists FROM information_schema.columns WHERE table_schema = @dbname AND table_name = 'city_seller' AND column_name = 'delivery_price';
SET @sql = IF(@col_exists = 0, 'ALTER TABLE `city_seller` ADD COLUMN `delivery_price` DECIMAL(10,2) NOT NULL DEFAULT 0.00 AFTER `seller_id`', 'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

SELECT COUNT(*) INTO @col_exists FROM information_schema.columns WHERE table_schema = @dbname AND table_name = 'city_seller' AND column_name = 'active';
SET @sql = IF(@col_exists = 0, 'ALTER TABLE `city_seller` ADD COLUMN `active` TINYINT(1) NOT NULL DEFAULT 1 AFTER `delivery_price`', 'SELECT 1');
PREPARE stmt FROM @sql; EXECUTE stmt; DEALLOCATE PREPARE stmt;

-- ==========================================
-- 3. Update existing sellers with phone & shop names
-- ==========================================
UPDATE `sellers` SET `phone` = '96550001111', `shop_name_en` = 'Kuwaiti Company', `shop_name_ar` = 'ط§ظ„ط´ط±ظƒط© ط§ظ„ظƒظˆظٹطھظٹط©', `banner` = 'uploads/banners/banner1.jpg' WHERE `id` = 3;
UPDATE `sellers` SET `phone` = '96550002222', `shop_name_en` = 'Kuwait Meat Co', `shop_name_ar` = 'ط´ط±ظƒط© ط§ظ„ظ„ط­ظˆظ… ط§ظ„ظƒظˆظٹطھظٹط©', `banner` = 'uploads/banners/banner2.jpg' WHERE `id` = 4;
UPDATE `sellers` SET `phone` = '96550003333', `shop_name_en` = 'Seller 3 Shop', `shop_name_ar` = 'ظ…طھط¬ط± ط§ظ„ط¨ط§ط¦ط¹ 3', `banner` = 'uploads/banners/banner3.jpg' WHERE `id` = 5;
UPDATE `sellers` SET `phone` = '96550004444', `shop_name_en` = 'MOI Company', `shop_name_ar` = 'ط´ط±ظƒط© MOI', `banner` = 'uploads/banners/banner4.jpg' WHERE `id` = 6;
UPDATE `sellers` SET `phone` = '96550005555', `shop_name_en` = 'Test Shop', `shop_name_ar` = 'ظ…طھط¬ط± طھط¬ط±ظٹط¨ظٹ', `banner` = 'uploads/banners/banner5.jpg' WHERE `id` = 7;
UPDATE `sellers` SET `phone` = '96550006666', `shop_name_en` = 'Seller 44 Shop', `shop_name_ar` = 'ظ…طھط¬ط± 44', `banner` = 'uploads/banners/banner6.jpg' WHERE `id` = 8;

-- ==========================================
-- 4. Insert NEW fake sellers (password = 'password')
-- ==========================================
INSERT IGNORE INTO `sellers` (`id`, `name`, `phone`, `active`, `email`, `shop_name_en`, `shop_name_ar`, `password`, `img_path`, `banner`, `longitude`, `latitude`, `details`, `created_at`, `updated_at`, `about`) VALUES
(10, 'ط£ط­ظ…ط¯ ظ…ط­ظ…ط¯', '96551110001', 1, 'ahmed@seller.com', 'Ahmed Electronics', 'ط¥ظ„ظƒطھط±ظˆظ†ظٹط§طھ ط£ط­ظ…ط¯', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uploads/profiles/seller10.png', 'uploads/banners/banner10.jpg', 47.97, 29.37, 'Salmiya - Block 3', NOW(), NOW(), 'ظ†ط­ظ† ظ…طھط®طµطµظˆظ† ظپظٹ ط¨ظٹط¹ ط§ظ„ط£ط¬ظ‡ط²ط© ط§ظ„ط¥ظ„ظƒطھط±ظˆظ†ظٹط© ظˆط§ظ„ظ‡ظˆط§طھظپ ط§ظ„ط°ظƒظٹط©'),
(11, 'ظپط§ط·ظ…ط© ط¹ظ„ظٹ', '96551110002', 1, 'fatima@seller.com', 'Fatima Fashion', 'ط£ط²ظٹط§ط، ظپط§ط·ظ…ط©', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uploads/profiles/seller11.png', 'uploads/banners/banner11.jpg', 47.98, 29.38, 'Hawally - Block 1', NOW(), NOW(), 'ط£ط­ط¯ط« طµظٹط­ط§طھ ط§ظ„ظ…ظˆط¶ط© ظˆط§ظ„ط£ط²ظٹط§ط، ط§ظ„ظ†ط³ط§ط¦ظٹط©'),
(12, 'ط®ط§ظ„ط¯ ط³ط¹ط¯', '96551110003', 1, 'khaled@seller.com', 'Khaled Groceries', 'ط¨ظ‚ط§ظ„ط© ط®ط§ظ„ط¯', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uploads/profiles/seller12.png', 'uploads/banners/banner12.jpg', 47.99, 29.36, 'Jabriya - Block 5', NOW(), NOW(), 'ظ…ظ†طھط¬ط§طھ ط؛ط°ط§ط¦ظٹط© ط·ط§ط²ط¬ط© ظٹظˆظ…ظٹط§ظ‹'),
(13, 'ظ†ظˆط±ط© ط­ط³ظٹظ†', '96551110004', 0, 'noura@seller.com', 'Noura Sweets', 'ط­ظ„ظˆظٹط§طھ ظ†ظˆط±ط©', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uploads/profiles/seller13.png', 'uploads/banners/banner13.jpg', 48.00, 29.35, 'Mishref - Block 2', NOW(), NOW(), 'ط­ظ„ظˆظٹط§طھ ط´ط±ظ‚ظٹط© ظˆط؛ط±ط¨ظٹط© ظ…طµظ†ظˆط¹ط© ظٹط¯ظˆظٹط§ظ‹'),
(14, 'ظ…ط­ظ…ط¯ ط¹ط¨ط¯ط§ظ„ظ„ظ‡', '96551110005', 1, 'mohammed@seller.com', 'M Sports', 'ط±ظٹط§ط¶ط© ظ…', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uploads/profiles/seller14.png', 'uploads/banners/banner14.jpg', 47.96, 29.34, 'Farwaniya - Block 4', NOW(), NOW(), 'ظ…ظ„ط§ط¨ط³ ظˆظ…ط¹ط¯ط§طھ ط±ظٹط§ط¶ظٹط© ظ„ط¬ظ…ظٹط¹ ط§ظ„ط£ط¹ظ…ط§ط±');

-- ==========================================
-- 5. Fake category_seller
-- ==========================================
INSERT IGNORE INTO `category_seller` (`id`, `seller_id`, `category_id`, `created_at`, `updated_at`) VALUES
(50, 10, 261, NOW(), NOW()),
(51, 11, 261, NOW(), NOW()),
(52, 12, 261, NOW(), NOW()),
(53, 13, 261, NOW(), NOW()),
(54, 14, 261, NOW(), NOW());

-- ==========================================
-- 6. Update city_seller with delivery prices
-- ==========================================
UPDATE `city_seller` SET `delivery_price` = 1.50, `active` = 1 WHERE `seller_id` = 3 AND `city_id` = 6;
UPDATE `city_seller` SET `delivery_price` = 2.00, `active` = 1 WHERE `seller_id` = 3 AND `city_id` = 14;
UPDATE `city_seller` SET `delivery_price` = 1.00, `active` = 1 WHERE `seller_id` = 5 AND `city_id` = 6;
UPDATE `city_seller` SET `delivery_price` = 2.50, `active` = 1 WHERE `seller_id` = 5 AND `city_id` = 14;

INSERT IGNORE INTO `city_seller` (`id`, `city_id`, `region_id`, `seller_id`, `delivery_price`, `active`, `created_at`, `updated_at`) VALUES
(30, 6, NULL, 10, 1.00, 1, NOW(), NOW()),
(31, 14, NULL, 10, 2.00, 1, NOW(), NOW()),
(32, 6, NULL, 11, 1.50, 1, NOW(), NOW()),
(33, 6, NULL, 12, 0.75, 1, NOW(), NOW()),
(34, 14, NULL, 12, 1.75, 1, NOW(), NOW()),
(35, 6, NULL, 14, 1.25, 1, NOW(), NOW());

-- ==========================================
-- 7. Fake products
-- ==========================================
INSERT IGNORE INTO `products` (`id`, `name_ar`, `name_en`, `title_ar`, `title_en`, `description_ar`, `description_en`, `price`, `old_price`, `quantity`, `seller_id`, `category_id`, `main_image`, `is_available`, `created_at`, `updated_at`) VALUES
(200, 'ط¢ظٹظپظˆظ† 15 ط¨ط±ظˆ', 'iPhone 15 Pro', 'ط¢ظٹظپظˆظ† 15 ط¨ط±ظˆ ظ…ط§ظƒط³', 'iPhone 15 Pro Max', 'ط£ط­ط¯ط« ظ‡ط§طھظپ ظ…ظ† ط£ط¨ظ„ ظ…ط¹ ط´ط±ظٹط­ط© A17 Pro', 'Latest Apple phone with A17 Pro chip', 399.00, 449.00, 50, 10, 261, 'uploads/products/iphone15.jpg', 1, NOW(), NOW()),
(201, 'ط³ط§ظ…ط³ظˆظ†ط¬ S24', 'Samsung S24', 'ط³ط§ظ…ط³ظˆظ†ط¬ ط¬ط§ظ„ط§ظƒط³ظٹ S24 ط§ظ„طھط±ط§', 'Samsung Galaxy S24 Ultra', 'ظ‡ط§طھظپ ط³ط§ظ…ط³ظˆظ†ط¬ ط§ظ„ط±ط§ط¦ط¯ ظ…ط¹ ظ‚ظ„ظ… S Pen', 'Samsung flagship with S Pen', 349.00, 399.00, 30, 10, 261, 'uploads/products/samsung_s24.jpg', 1, NOW(), NOW()),
(202, 'ظپط³طھط§ظ† ط³ظ‡ط±ط©', 'Evening Dress', 'ظپط³طھط§ظ† ط³ظ‡ط±ط© ط£ظ†ظٹظ‚', 'Elegant Evening Dress', 'ظپط³طھط§ظ† ط³ظ‡ط±ط© ظپط§ط®ط± ط¨طھطµظ…ظٹظ… ط¹طµط±ظٹ', 'Luxurious evening dress with modern design', 85.00, 120.00, 15, 11, 261, 'uploads/products/dress1.jpg', 1, NOW(), NOW()),
(203, 'ط­ظ‚ظٹط¨ط© ظٹط¯', 'Handbag', 'ط­ظ‚ظٹط¨ط© ظٹط¯ ط¬ظ„ط¯ظٹط©', 'Leather Handbag', 'ط­ظ‚ظٹط¨ط© ظٹط¯ ظ…ظ† ط§ظ„ط¬ظ„ط¯ ط§ظ„ط·ط¨ظٹط¹ظٹ', 'Genuine leather handbag', 45.00, 65.00, 25, 11, 261, 'uploads/products/handbag1.jpg', 0, NOW(), NOW()),
(204, 'ط£ط±ط² ط¨ط³ظ…طھظٹ', 'Basmati Rice', 'ط£ط±ط² ط¨ط³ظ…طھظٹ ظ‡ظ†ط¯ظٹ', 'Indian Basmati Rice', 'ط£ط±ط² ط¨ط³ظ…طھظٹ ط·ظˆظٹظ„ ط§ظ„ط­ط¨ط© 5 ظƒظٹظ„ظˆ', 'Long grain basmati rice 5kg', 5.50, 7.00, 100, 12, 261, 'uploads/products/rice.jpg', 1, NOW(), NOW()),
(205, 'ط²ظٹطھ ط²ظٹطھظˆظ†', 'Olive Oil', 'ط²ظٹطھ ط²ظٹطھظˆظ† ط¨ظƒط±', 'Extra Virgin Olive Oil', 'ط²ظٹطھ ط²ظٹطھظˆظ† ط¨ظƒط± ظ…ظ…طھط§ط² 1 ظ„طھط±', 'Extra virgin olive oil 1L', 8.00, 10.00, 60, 12, 261, 'uploads/products/olive_oil.jpg', 1, NOW(), NOW()),
(206, 'ط¨ظ‚ظ„ط§ظˆط©', 'Baklava', 'ط¨ظ‚ظ„ط§ظˆط© طھط±ظƒظٹط©', 'Turkish Baklava', 'ط¨ظ‚ظ„ط§ظˆط© طھط±ظƒظٹط© ط£طµظ„ظٹط© ط¨ط§ظ„ظپط³طھظ‚', 'Authentic Turkish baklava with pistachios', 12.00, 15.00, 20, 13, 261, 'uploads/products/baklava.jpg', 0, NOW(), NOW()),
(207, 'ط­ط°ط§ط، ط±ظٹط§ط¶ظٹ', 'Sports Shoes', 'ط­ط°ط§ط، ط±ظٹط§ط¶ظٹ ظ†ط§ظٹظƒظٹ', 'Nike Sports Shoes', 'ط­ط°ط§ط، ط±ظٹط§ط¶ظٹ ظ„ظ„ط¬ط±ظٹ ظ…ط±ظٹط­ ظˆط®ظپظٹظپ', 'Comfortable and lightweight running shoes', 35.00, 50.00, 40, 14, 261, 'uploads/products/shoes.jpg', 1, NOW(), NOW()),
(208, 'طھظٹط´ظٹط±طھ ط±ظٹط§ط¶ظٹ', 'Sports T-Shirt', 'طھظٹط´ظٹط±طھ ط±ظٹط§ط¶ظٹ ط£ط¯ظٹط¯ط§ط³', 'Adidas Sports T-Shirt', 'طھظٹط´ظٹط±طھ ط±ظٹط§ط¶ظٹ ط¨طھظ‚ظ†ظٹط© ط§ظ„طھظ‡ظˆظٹط©', 'Sports t-shirt with ventilation technology', 15.00, 22.00, 70, 14, 261, 'uploads/products/tshirt.jpg', 1, NOW(), NOW());

-- ==========================================
-- 8. Fake product variations
-- ==========================================
INSERT IGNORE INTO `product_variations` (`id`, `product_id`, `price`, `quantity`, `sku`, `created_at`, `updated_at`) VALUES
(10, 200, 399.00, 20, 'IPH15-256GB', NOW(), NOW()),
(11, 200, 449.00, 15, 'IPH15-512GB', NOW(), NOW()),
(12, 200, 499.00, 10, 'IPH15-1TB', NOW(), NOW()),
(13, 202, 85.00, 5, 'DRESS-S', NOW(), NOW()),
(14, 202, 85.00, 5, 'DRESS-M', NOW(), NOW()),
(15, 202, 90.00, 3, 'DRESS-L', NOW(), NOW()),
(16, 207, 35.00, 10, 'SHOE-40', NOW(), NOW()),
(17, 207, 35.00, 10, 'SHOE-42', NOW(), NOW()),
(18, 207, 38.00, 8, 'SHOE-44', NOW(), NOW()),
(19, 208, 15.00, 20, 'TSHIRT-M', NOW(), NOW()),
(20, 208, 15.00, 20, 'TSHIRT-L', NOW(), NOW()),
(21, 208, 18.00, 15, 'TSHIRT-XL', NOW(), NOW());

-- ==========================================
-- 9. Add missing 'Size' attribute
-- ==========================================
INSERT IGNORE INTO `attributes` (`id`, `name_ar`, `name_en`, `type`, `image`, `enable`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'ط§ظ„ظ…ظ‚ط§ط³', 'Size', 'select', NULL, 1, NULL, NOW(), NOW());

-- ==========================================
-- 10. Fake product variation attributes
-- ==========================================
INSERT IGNORE INTO `product_variation_attributes` (`id`, `product_variation_id`, `attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(10, 10, 2, '256GB', NOW(), NOW()),
(11, 11, 2, '512GB', NOW(), NOW()),
(12, 12, 2, '1TB', NOW(), NOW()),
(13, 10, 1, 'Natural Titanium', NOW(), NOW()),
(14, 11, 1, 'Blue Titanium', NOW(), NOW()),
(15, 12, 1, 'Black Titanium', NOW(), NOW()),
(16, 13, 2, 'S', NOW(), NOW()),
(17, 14, 2, 'M', NOW(), NOW()),
(18, 15, 2, 'L', NOW(), NOW()),
(19, 13, 1, 'ط£ط³ظˆط¯', NOW(), NOW()),
(20, 14, 1, 'ط£ط­ظ…ط±', NOW(), NOW()),
(21, 15, 1, 'ط£ط²ط±ظ‚', NOW(), NOW()),
(22, 16, 2, '40', NOW(), NOW()),
(23, 17, 2, '42', NOW(), NOW()),
(24, 18, 2, '44', NOW(), NOW()),
(25, 19, 2, 'M', NOW(), NOW()),
(26, 20, 2, 'L', NOW(), NOW()),
(27, 21, 2, 'XL', NOW(), NOW());

-- ==========================================
-- 11. Fake orders
-- ==========================================
INSERT IGNORE INTO `orders` (`id`, `user_id`, `total_price`, `status`, `order_number`, `payment_type`, `seller_id`, `delivery_fee`, `created_at`, `updated_at`) VALUES
(500, 76, 399.00, 'order_placed', 'ORD-2026-500', 'cash', 10, 1.00, NOW(), NOW()),
(501, 76, 134.00, 'confirmed', 'ORD-2026-501', 'online', 10, 2.00, NOW(), NOW()),
(502, 85, 85.00, 'delivered', 'ORD-2026-502', 'cash', 11, 1.50, DATE_SUB(NOW(), INTERVAL 3 DAY), DATE_SUB(NOW(), INTERVAL 1 DAY)),
(503, 86, 170.00, 'shipped', 'ORD-2026-503', 'online', 11, 1.50, DATE_SUB(NOW(), INTERVAL 2 DAY), NOW()),
(504, 97, 11.00, 'order_placed', 'ORD-2026-504', 'cash', 12, 0.75, NOW(), NOW()),
(505, 94, 24.00, 'confirmed', 'ORD-2026-505', 'cash', 12, 0.75, NOW(), NOW()),
(506, 76, 12.00, 'order_placed', 'ORD-2026-506', 'online', 13, 0.00, NOW(), NOW()),
(507, 85, 35.00, 'out_for_delivery', 'ORD-2026-507', 'cash', 14, 1.25, DATE_SUB(NOW(), INTERVAL 1 DAY), NOW()),
(508, 86, 30.00, 'cancel', 'ORD-2026-508', 'online', 14, 1.25, DATE_SUB(NOW(), INTERVAL 5 DAY), DATE_SUB(NOW(), INTERVAL 4 DAY));

-- ==========================================
-- 12. Fake order details
-- ==========================================
INSERT IGNORE INTO `order_details` (`id`, `order_id`, `product_id`, `product_variation_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(600, 500, 200, 10, 1, 399.00, NOW(), NOW()),
(601, 501, 200, 11, 1, 449.00, NOW(), NOW()),
(602, 502, 202, 13, 1, 85.00, NOW(), NOW()),
(603, 503, 202, 14, 1, 85.00, NOW(), NOW()),
(604, 503, 203, NULL, 1, 85.00, NOW(), NOW()),
(605, 504, 204, NULL, 2, 5.50, NOW(), NOW()),
(606, 505, 205, NULL, 3, 8.00, NOW(), NOW()),
(607, 506, 206, NULL, 1, 12.00, NOW(), NOW()),
(608, 507, 207, 16, 1, 35.00, NOW(), NOW()),
(609, 508, 208, 19, 2, 15.00, NOW(), NOW());

-- ==========================================
-- 13. Fake OTP codes
-- ==========================================
INSERT IGNORE INTO `confirmation_codes` (`id`, `phone`, `code`, `active`, `created_at`, `updated_at`) VALUES
(100, '96551110001', '1234', 1, NOW(), NOW()),
(101, '96551110002', '5678', 1, NOW(), NOW()),
(102, '96551110003', '9999', 1, NOW(), NOW()),
(103, '96551110004', '4321', 1, NOW(), NOW()),
(104, '96551110005', '8765', 1, NOW(), NOW());

-- ==========================================
-- 14. Fake reviews
-- ==========================================
INSERT IGNORE INTO `reviews` (`id`, `user_id`, `seller_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(10, 76, 10, 5, 'ظ…ظ…طھط§ط²! ط®ط¯ظ…ط© ط³ط±ظٹط¹ط© ظˆظ…ظ†طھط¬ط§طھ ط£طµظ„ظٹط©', NOW(), NOW()),
(11, 85, 10, 4, 'Good quality products', NOW(), NOW()),
(12, 86, 11, 5, 'ط£ط²ظٹط§ط، ط±ط§ط¦ط¹ط© ظˆطھظˆطµظٹظ„ ط³ط±ظٹط¹', NOW(), NOW()),
(13, 97, 11, 3, 'OK but delivery was late', NOW(), NOW()),
(14, 76, 12, 5, 'ط£ظپط¶ظ„ ط¨ظ‚ط§ظ„ط© ظپظٹ ط§ظ„ظƒظˆظٹطھ', NOW(), NOW()),
(15, 94, 12, 4, 'Fresh products always', NOW(), NOW()),
(16, 85, 14, 5, 'Great sports gear!', NOW(), NOW()),
(17, 97, 14, 4, 'ط¬ظˆط¯ط© ظ…ظ…طھط§ط²ط©', NOW(), NOW());

-- ==========================================
-- DONE! Test login: phone=96551110001, password=password
-- ==========================================
