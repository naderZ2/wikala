-- =============================================
-- Reset Categories & Products
-- Removes all categories and products,
-- then creates 10 categories with 3 products each.
-- =============================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET FOREIGN_KEY_CHECKS = 0;

-- =============================================
-- 1. Delete all existing products and related data
-- =============================================
DELETE FROM `products`;

-- =============================================
-- 2. Delete all existing categories
-- =============================================
DELETE FROM `categories`;

-- =============================================
-- 3. Reset AUTO_INCREMENT
-- =============================================
ALTER TABLE `categories` AUTO_INCREMENT = 1;
ALTER TABLE `products` AUTO_INCREMENT = 1;

-- =============================================
-- 4. Insert 10 Categories (top-level, end_point=1)
-- =============================================
INSERT INTO `categories` (`id`, `rank`, `parent_id`, `name_ar`, `name_en`, `image`, `end_point`, `created_at`, `updated_at`, `order`, `is_free`, `free_ads_limit`) VALUES
(1,  100, NULL, 'إلكترونيات',           'Electronics',            'uploads/categories/1766767291686.png', 1, NOW(), NOW(), 1,  1, 0),
(2,  100, NULL, 'ملابس وأزياء',          'Fashion & Clothing',     'uploads/categories/1766767291686.png', 1, NOW(), NOW(), 2,  1, 0),
(3,  100, NULL, 'سيارات ومركبات',        'Cars & Vehicles',        'uploads/categories/1766767291686.png', 1, NOW(), NOW(), 3,  1, 0),
(4,  100, NULL, 'عقارات',               'Real Estate',            'uploads/categories/1766767291686.png', 1, NOW(), NOW(), 4,  1, 0),
(5,  100, NULL, 'أثاث ومفروشات',         'Furniture',              'uploads/categories/1766767291686.png', 1, NOW(), NOW(), 5,  1, 0),
(6,  100, NULL, 'هواتف وأجهزة ذكية',     'Phones & Smart Devices', 'uploads/categories/1766767291686.png', 1, NOW(), NOW(), 6,  1, 0),
(7,  100, NULL, 'رياضة ولياقة',          'Sports & Fitness',       'uploads/categories/1766767291686.png', 1, NOW(), NOW(), 7,  1, 0),
(8,  100, NULL, 'حيوانات أليفة',         'Pets & Animals',         'uploads/categories/1766767291686.png', 1, NOW(), NOW(), 8,  1, 0),
(9,  100, NULL, 'خدمات منزلية',          'Home Services',          'uploads/categories/1766767291686.png', 1, NOW(), NOW(), 9,  1, 0),
(10, 100, NULL, 'كتب وتعليم',           'Books & Education',      'uploads/categories/1766767291686.png', 1, NOW(), NOW(), 10, 1, 0);

-- =============================================
-- 5. Ensure a seller exists (id=1)
-- =============================================
INSERT IGNORE INTO `sellers` (`id`, `name`, `active`, `email`, `password`, `created_at`, `updated_at`)
VALUES (1, 'Test Seller', 1, 'seller@test.com', '$2y$10$0bvevgXqTgALDghe2lBq5uW1sl5sPpotPuABofVYamrByJNS.1tSu', NOW(), NOW());

-- =============================================
-- 6. Insert 3 Products per Category = 30 total
-- =============================================
INSERT INTO `products` (`id`, `title_ar`, `title_en`, `is_available`, `serving`, `picture`, `seller_id`, `category_id`, `name_ar`, `name_en`, `description_en`, `description_ar`, `main_image`, `quantity`, `price`, `old_price`, `created_at`, `updated_at`, `deleted_at`, `rejection_reason`) VALUES

-- Category 1: Electronics
(1,  'شاشة ذكية 55 بوصة',      'Smart TV 55 inch',        1, NULL, 0, 1, 1, 'شاشة ذكية 55 بوصة 4K',                'Smart TV 55 inch 4K',                 'Smart TV 55 inch with 4K UHD resolution, Android system, WiFi, voice remote, 1 year warranty.',                           'شاشة ذكية 55 بوصة بدقة 4K فائقة الوضوح، نظام أندرويد، WiFi، ريموت صوتي، ضمان سنة كاملة.',                               NULL, 10,  '7500',  '8500',  NOW(), NOW(), NULL, NULL),
(2,  'سماعات بلوتوث لاسلكية',   'Wireless Bluetooth Headphones', 1, NULL, 0, 1, 1, 'سماعات بلوتوث احترافية',              'Pro Bluetooth Headphones',            'Wireless Bluetooth headphones with noise cancellation, 30-hour battery life, high-definition sound quality.',              'سماعات بلوتوث لاسلكية مع خاصية إلغاء الضوضاء، بطارية تدوم 30 ساعة، جودة صوت عالية الدقة.',                                NULL, 25,  '3200',  '3800',  NOW(), NOW(), NULL, NULL),
(3,  'لابتوب للألعاب والبرمجة',  'Gaming & Programming Laptop',   1, NULL, 0, 1, 1, 'لابتوب 16GB RAM i7',                  'Laptop 16GB RAM i7',                  'Laptop with powerful i7 12th gen processor, 16GB RAM, dedicated GPU, 15.6 inch Full HD screen.',                           'لابتوب بمعالج قوي i7 الجيل الثاني عشر، 16GB رام، كارت شاشة مخصص، شاشة 15.6 بوصة Full HD.',                                NULL, 5,   '12000', '14000', NOW(), NOW(), NULL, NULL),

-- Category 2: Fashion & Clothing
(4,  'تيشيرت رجالي قطن',       'Men Cotton T-Shirt',      1, NULL, 0, 1, 2, 'تيشيرت رجالي قطن 100%',               'Men 100% Cotton T-Shirt',             'Men t-shirt made of 100% pure cotton, comfortable for daily wear, available in all sizes and colors.',                     'تيشيرت رجالي مصنوع من القطن الخالص، مريح للارتداء اليومي، متوفر بجميع المقاسات والألوان.',                                 NULL, 100, '250',   '300',   NOW(), NOW(), NULL, NULL),
(5,  'فستان نسائي أنيق',       'Elegant Women Dress',     1, NULL, 0, 1, 2, 'فستان نسائي للمناسبات',                'Women Occasion Dress',                'Elegant women dress with modern design, high quality fabrics, suitable for parties and special occasions.',                 'فستان نسائي أنيق بتصميم عصري، خامات عالية الجودة، مناسب للحفلات والمناسبات الخاصة.',                                       NULL, 50,  '450',   '550',   NOW(), NOW(), NULL, NULL),
(6,  'جاكيت شتوي رجالي',       'Men Winter Jacket',       1, NULL, 0, 1, 2, 'جاكيت شتوي مبطن',                     'Padded Winter Jacket',                'Padded winter jacket with water and wind resistant fabric, warm and comfortable, available in several colors and sizes.',   'جاكيت شتوي مبطن بخامة مقاومة للماء والرياح، دافئ ومريح، متوفر بعدة ألوان ومقاسات.',                                       NULL, 30,  '350',   '450',   NOW(), NOW(), NULL, NULL),

-- Category 3: Cars & Vehicles
(7,  'قطع غيار سيارات',        'Car Spare Parts',         1, NULL, 0, 1, 3, 'فرامل سيارات أصلية',                   'Original Car Brakes',                 'Original and guaranteed brakes for all car types, strong performance, long lifespan, worldwide standards.',                 'فرامل أصلية ومضمونة لجميع أنواع السيارات، أداء قوي وعمر افتراضي طويل، مطابقة للمواصفات العالمية.',                         NULL, 40,  '1500',  '1800',  NOW(), NOW(), NULL, NULL),
(8,  'فلاتر سيارات',           'Car Filters',             1, NULL, 0, 1, 3, 'فلاتر سيارات أصلية',                   'Original Car Filters',                'All types of original car filters: oil, air, and fuel filters. Guaranteed quality and reliable performance.',               'جميع أنواع الفلاتر الأصلية للسيارات: فلاتر زيت، هواء، وبنزين. جودة مضمونة وأداء موثوق.',                                   NULL, 60,  '350',   '400',   NOW(), NOW(), NULL, NULL),
(9,  'إطارات سيارات',          'Car Tires',               1, NULL, 0, 1, 3, 'إطارات سيارات جميع المقاسات',           'Car Tires All Sizes',                 'High quality car tires for all sizes, excellent grip, long-lasting, suitable for all road conditions.',                     'إطارات سيارات عالية الجودة لجميع المقاسات، تماسك ممتاز، عمر طويل، مناسبة لجميع ظروف الطرق.',                               NULL, 80,  '2500',  '3000',  NOW(), NOW(), NULL, NULL),

-- Category 4: Real Estate
(10, 'شقة سكنية مدينة نصر',    'Apartment Nasr City',     1, NULL, 0, 1, 4, 'شقة 120 متر سوبر لوكس',               'Apartment 120 sqm Super Lux',         '120 sqm apartment, 3 bedrooms, 2 bathrooms, large reception, super lux finishing, prime location near services.',           'شقة 120 متر مربع، 3 غرف نوم، 2 حمام، ريسبشن كبير، تشطيب سوبر لوكس، موقع مميز بالقرب من الخدمات.',                        NULL, 1,   '1500000','0',    NOW(), NOW(), NULL, NULL),
(11, 'فيلا التجمع الخامس',     'Villa Fifth Settlement',  1, NULL, 0, 1, 4, 'فيلا 250 متر بحديقة',                  'Villa 250 sqm with Garden',           '250 sqm standalone villa, 4 bedrooms, 3 bathrooms, private garden, garage, luxury finishing.',                              'فيلا مستقلة 250 متر مربع، 4 غرف نوم، 3 حمامات، حديقة خاصة، جراج، تشطيب فاخر.',                                           NULL, 1,   '3500000','0',    NOW(), NOW(), NULL, NULL),
(12, 'محل تجاري شارع رئيسي',   'Commercial Shop Main St', 1, NULL, 0, 1, 4, 'محل تجاري 50 متر',                     'Commercial Shop 50 sqm',              '50 sqm commercial shop with wide glass facade, suitable for all commercial activities, prime location.',                   'محل تجاري 50 متر مربع، واجهة زجاجية عريضة، يصلح لجميع الأنشطة التجارية، موقع حيوي.',                                      NULL, 1,   '800000', '0',    NOW(), NOW(), NULL, NULL),

-- Category 5: Furniture
(13, 'غرفة نوم خشب زان',       'Beech Wood Bedroom Set',  1, NULL, 0, 1, 5, 'طقم غرفة نوم كاملة',                   'Complete Bedroom Set',                'Complete bedroom set made of natural beech wood, includes bed, wardrobe, dresser, and nightstand, classic luxury design.',  'غرفة نوم كاملة من خشب الزان الطبيعي، تشمل سرير، دولاب، تسريحة، وكومودينو، تصميم كلاسيكي فاخر.',                           NULL, 5,   '8500',  '10000', NOW(), NOW(), NULL, NULL),
(14, 'كنبة مودرن L',           'Modern L-Shaped Sofa',    1, NULL, 0, 1, 5, 'كنبة على شكل حرف L',                   'L-Shaped Sofa',                       'Modern L-shaped sofa with stain-resistant fabric, trendy colors, comfortable and practical for large living rooms.',        'كنبة مودرن على شكل L، قماش مقاوم للبقع، ألوان عصرية، مريحة وعملية للصالات الكبيرة.',                                       NULL, 8,   '4500',  '5500',  NOW(), NOW(), NULL, NULL),
(15, 'مكتب خشبي عصري',         'Modern Wooden Desk',      1, NULL, 0, 1, 5, 'مكتب عمل مع كرسي',                     'Work Desk with Chair',                'Modern wooden work desk with side drawers and adjustable comfortable chair, suitable for work from home.',                  'مكتب عمل خشبي عصري مع أدراج جانبية وكرسي مريح قابل للتعديل، مناسب للعمل من المنزل.',                                      NULL, 12,  '2800',  '3500',  NOW(), NOW(), NULL, NULL),

-- Category 6: Phones & Smart Devices
(16, 'آيفون 15 برو ماكس',      'iPhone 15 Pro Max',       1, NULL, 0, 1, 6, 'iPhone 15 Pro Max 256GB',              'iPhone 15 Pro Max 256GB',             'iPhone 15 Pro Max, 256GB storage, Blue Titanium, excellent battery, very clean device with box.',                           'آيفون 15 برو ماكس، ذاكرة 256 جيجا، لون أزرق تيتانيوم، بطارية ممتازة، الجهاز نظيف جداً مع العلبة.',                        NULL, 3,   '28000', '32000', NOW(), NOW(), NULL, NULL),
(17, 'سامسونج جالكسي S24',     'Samsung Galaxy S24 Ultra',1, NULL, 0, 1, 6, 'Galaxy S24 Ultra 512GB',               'Galaxy S24 Ultra 512GB',              'Samsung Galaxy S24 Ultra, 512GB storage, 200MP camera, S Pen included, excellent condition.',                               'سامسونج جالكسي S24 Ultra، ذاكرة 512 جيجا، كاميرا 200 ميجابكسل، قلم S Pen، حالة ممتازة.',                                   NULL, 4,   '18000', '22000', NOW(), NOW(), NULL, NULL),
(18, 'ساعة أبل ووتش',          'Apple Watch Series 9',    1, NULL, 0, 1, 6, 'Apple Watch Series 9 45mm',            'Apple Watch Series 9 45mm',           'Apple Watch Series 9, 45mm, Retina display, water resistant, fitness and health tracking.',                                 'ساعة ذكية Apple Watch Series 9، مقاس 45mm، شاشة ريتينا، مقاومة للماء، تتبع اللياقة والصحة.',                               NULL, 7,   '3500',  '4200',  NOW(), NOW(), NULL, NULL),

-- Category 7: Sports & Fitness
(19, 'جهاز مشي كهربائي',       'Electric Treadmill',      1, NULL, 0, 1, 7, 'جهاز مشي سرعات متعددة',               'Multi-Speed Treadmill',               'Electric treadmill with digital display, multiple speeds, foldable, supports up to 120 kg.',                                'جهاز مشي كهربائي مع شاشة ديجيتال، سرعات متعددة، قابل للطي، يتحمل وزن حتى 120 كجم.',                                      NULL, 6,   '5500',  '6500',  NOW(), NOW(), NULL, NULL),
(20, 'دراجة هوائية جبلية',     'Mountain Bike',           1, NULL, 0, 1, 7, 'دراجة جبلية 26 بوصة',                  'Mountain Bike 26 inch',               'Mountain bike 26 inch, lightweight aluminum frame, 21 speeds, disc brakes, suitable for rough roads.',                      'دراجة هوائية جبلية 26 بوصة، هيكل ألومنيوم خفيف، 21 سرعة، فرامل ديسك، مناسبة للطرق الوعرة.',                                NULL, 10,  '850',   '1100',  NOW(), NOW(), NULL, NULL),
(21, 'طقم أوزان حديد',         'Iron Weights Set',        1, NULL, 0, 1, 7, 'أوزان حديد 50 كجم مع بار',             'Iron Weights 50kg with Bar',          '50 kg complete iron weights set with straight bar and curved bar, rubber coated to protect flooring.',                      'طقم أوزان حديد كامل 50 كجم مع بار مستقيم وبار منحني، مغلف بالمطاط لحماية الأرضية.',                                       NULL, 15,  '1200',  '1500',  NOW(), NOW(), NULL, NULL),

-- Category 8: Pets & Animals
(22, 'كلب جولدن ريتريفر',      'Golden Retriever Dog',    1, NULL, 0, 1, 8, 'جولدن ريتريفر 4 شهور',                 'Golden Retriever 4 months',           'Purebred Golden Retriever dog, 4 months old, fully vaccinated, very friendly and loves children.',                          'كلب جولدن ريتريفر أصيل، عمره 4 شهور، مطعّم بالكامل، ودود جداً ويحب الأطفال.',                                             NULL, 2,   '3000',  '0',     NOW(), NOW(), NULL, NULL),
(23, 'قطة شيرازي بيور',        'Pure Shirazi Cat',        1, NULL, 0, 1, 8, 'قطة شيرازي أبيض 3 شهور',               'White Shirazi Cat 3 months',          'Pure white Shirazi cat, 3 months old, vaccinated, litter box trained, calm and lovely.',                                    'قطة شيرازي بيور لون أبيض، عمرها 3 شهور، مطعّمة، معتادة على الليتر بوكس، هادئة ولطيفة.',                                    NULL, 3,   '1500',  '0',     NOW(), NOW(), NULL, NULL),
(24, 'عصافير بادجي مع قفص',    'Budgie Birds with Cage',  1, NULL, 0, 1, 8, 'زوج بادجي مع قفص كامل',                'Budgie Pair with Full Cage',          'Beautiful colored budgie pair with large cage, food and complete supplies.',                                                 'زوج عصافير بادجي ألوان جميلة مع قفص كبير وأكل ومستلزمات كاملة.',                                                           NULL, 5,   '500',   '0',     NOW(), NOW(), NULL, NULL),

-- Category 9: Home Services
(25, 'صيانة تكييفات',          'AC Maintenance',          1, NULL, 0, 1, 9, 'غسيل وشحن فريون تكييفات',              'AC Wash & Freon Charge',              'Comprehensive AC maintenance: interior and exterior washing, Freon charge, full device inspection, service warranty.',      'خدمة صيانة تكييفات شاملة: غسيل داخلي وخارجي، شحن فريون، فحص كامل للجهاز، ضمان على الخدمة.',                                NULL, 999, '500',   '0',     NOW(), NOW(), NULL, NULL),
(26, 'سباكة منزلية',           'Home Plumbing',           1, NULL, 0, 1, 9, 'إصلاح وتركيب سباكة',                   'Plumbing Repair & Installation',      'Comprehensive home plumbing: leak repair, mixer and faucet installation, heater maintenance, fast service.',                'خدمة سباكة منزلية شاملة: إصلاح تسريبات، تركيب خلاطات وحنفيات، صيانة سخانات، خدمة سريعة.',                                  NULL, 999, '300',   '0',     NOW(), NOW(), NULL, NULL),
(27, 'كهرباء منزلية',          'Home Electrical',         1, NULL, 0, 1, 9, 'تأسيس وصيانة كهرباء',                  'Electrical Setup & Maintenance',      'Home and commercial electrical services: wiring setup, panel installation, fault repair, specialist technician.',            'خدمة كهرباء منزلية وتجارية: تأسيس كهرباء، تركيب لوحات، إصلاح أعطال، فني متخصص وخبرة طويلة.',                               NULL, 999, '400',   '0',     NOW(), NOW(), NULL, NULL),

-- Category 10: Books & Education
(28, 'كتب تطوير الذات',        'Self Development Books',  1, NULL, 0, 1, 10, 'مجموعة 5 كتب تطوير ذات',               'Set of 5 Self Development Books',     'Collection of 5 self-development and personal success books, translated, in excellent condition.',                           'مجموعة من 5 كتب في تطوير الذات والنجاح الشخصي، كتب مترجمة بحالة ممتازة.',                                                   NULL, 20,  '150',   '200',   NOW(), NOW(), NULL, NULL),
(29, 'كورس إنجليزي متقدم',     'Advanced English Course', 1, NULL, 0, 1, 10, 'كورس لغة انجليزية متقدم',              'Advanced English Language Course',    'Advanced English language course including books, video clips, and interactive exercises.',                                  'كورس تعليم اللغة الإنجليزية مستوى متقدم، يشمل كتب ومقاطع فيديو وتمارين تفاعلية.',                                          NULL, 15,  '200',   '250',   NOW(), NOW(), NULL, NULL),
(30, 'كتب برمجة وحاسب',        'Programming Books',       1, NULL, 0, 1, 10, 'مجموعة كتب برمجة',                     'Programming Books Set',               'Specialized books in programming and computer science, includes Python, JavaScript, and databases.',                        'مجموعة كتب متخصصة في البرمجة وعلوم الحاسب، تشمل Python، JavaScript، وقواعد البيانات.',                                      NULL, 10,  '350',   '400',   NOW(), NOW(), NULL, NULL);

-- =============================================
-- 7. Ensure attributes exist (Color, Size, Material)
-- =============================================
DELETE FROM `product_variation_attributes`;
DELETE FROM `product_variations`;
DELETE FROM `attributes`;
ALTER TABLE `attributes` AUTO_INCREMENT = 1;
ALTER TABLE `product_variations` AUTO_INCREMENT = 1;
ALTER TABLE `product_variation_attributes` AUTO_INCREMENT = 1;

INSERT INTO `attributes` (`id`, `name_ar`, `name_en`, `type`, `image`, `enable`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'اللون',    'Color',    'select', NULL, 1, NULL, NOW(), NOW()),
(2, 'المقاس',   'Size',     'select', NULL, 1, NULL, NOW(), NOW()),
(3, 'الخامة',   'Material', 'select', NULL, 1, NULL, NOW(), NOW());

-- =============================================
-- 8. Insert 2 Variations per Product (60 total)
-- =============================================
INSERT INTO `product_variations` (`id`, `product_id`, `price`, `quantity`, `sku`, `created_at`, `updated_at`) VALUES
-- Product 1
(1, 1, 7500.00, 5, 'TV55-BLK', NOW(), NOW()),
(2, 1, 7800.00, 5, 'TV55-SLV', NOW(), NOW()),
-- Product 2
(3, 2, 3200.00, 12, 'HP-BLK', NOW(), NOW()),
(4, 2, 3200.00, 13, 'HP-WHT', NOW(), NOW()),
-- Product 3
(5, 3, 12000.00, 3, 'LPT-GRY', NOW(), NOW()),
(6, 3, 13000.00, 2, 'LPT-BLK', NOW(), NOW()),
-- Product 4
(7, 4, 250.00, 50, 'TS-M-BLK', NOW(), NOW()),
(8, 4, 250.00, 50, 'TS-L-WHT', NOW(), NOW()),
-- Product 5
(9, 5, 450.00, 25, 'DR-S-RED', NOW(), NOW()),
(10, 5, 480.00, 25, 'DR-M-BLU', NOW(), NOW()),
-- Product 6
(11, 6, 350.00, 15, 'JK-L-BLK', NOW(), NOW()),
(12, 6, 350.00, 15, 'JK-XL-NVY', NOW(), NOW()),
-- Product 7
(13, 7, 1500.00, 20, 'BRK-FRN', NOW(), NOW()),
(14, 7, 1600.00, 20, 'BRK-RER', NOW(), NOW()),
-- Product 8
(15, 8, 350.00, 30, 'FLT-OIL', NOW(), NOW()),
(16, 8, 320.00, 30, 'FLT-AIR', NOW(), NOW()),
-- Product 9
(17, 9, 2500.00, 40, 'TIR-16', NOW(), NOW()),
(18, 9, 2800.00, 40, 'TIR-17', NOW(), NOW()),
-- Product 10
(19, 10, 1500000.00, 1, 'APT-3R', NOW(), NOW()),
(20, 10, 1600000.00, 1, 'APT-3RF', NOW(), NOW()),
-- Product 11
(21, 11, 3500000.00, 1, 'VIL-4R', NOW(), NOW()),
(22, 11, 3800000.00, 1, 'VIL-5R', NOW(), NOW()),
-- Product 12
(23, 12, 800000.00, 1, 'SHP-50', NOW(), NOW()),
(24, 12, 900000.00, 1, 'SHP-60', NOW(), NOW()),
-- Product 13
(25, 13, 8500.00, 3, 'BED-OAK', NOW(), NOW()),
(26, 13, 9500.00, 2, 'BED-WAL', NOW(), NOW()),
-- Product 14
(27, 14, 4500.00, 4, 'SFA-GRY', NOW(), NOW()),
(28, 14, 4800.00, 4, 'SFA-BEG', NOW(), NOW()),
-- Product 15
(29, 15, 2800.00, 6, 'DSK-BRN', NOW(), NOW()),
(30, 15, 3000.00, 6, 'DSK-BLK', NOW(), NOW()),
-- Product 16
(31, 16, 28000.00, 2, 'IP15-BLU', NOW(), NOW()),
(32, 16, 28000.00, 1, 'IP15-BLK', NOW(), NOW()),
-- Product 17
(33, 17, 18000.00, 2, 'S24-BLK', NOW(), NOW()),
(34, 17, 18500.00, 2, 'S24-GRN', NOW(), NOW()),
-- Product 18
(35, 18, 3500.00, 4, 'AW9-BLK', NOW(), NOW()),
(36, 18, 3500.00, 3, 'AW9-WHT', NOW(), NOW()),
-- Product 19
(37, 19, 5500.00, 3, 'TRD-BLK', NOW(), NOW()),
(38, 19, 5800.00, 3, 'TRD-GRY', NOW(), NOW()),
-- Product 20
(39, 20, 850.00, 5, 'BIK-RED', NOW(), NOW()),
(40, 20, 900.00, 5, 'BIK-BLU', NOW(), NOW()),
-- Product 21
(41, 21, 1200.00, 8, 'WGT-50', NOW(), NOW()),
(42, 21, 1500.00, 7, 'WGT-70', NOW(), NOW()),
-- Product 22
(43, 22, 3000.00, 1, 'GLD-M', NOW(), NOW()),
(44, 22, 3500.00, 1, 'GLD-F', NOW(), NOW()),
-- Product 23
(45, 23, 1500.00, 2, 'CAT-WHT', NOW(), NOW()),
(46, 23, 1800.00, 1, 'CAT-GRY', NOW(), NOW()),
-- Product 24
(47, 24, 500.00, 3, 'BDG-GRN', NOW(), NOW()),
(48, 24, 550.00, 2, 'BDG-BLU', NOW(), NOW()),
-- Product 25
(49, 25, 500.00, 999, 'AC-WSH', NOW(), NOW()),
(50, 25, 700.00, 999, 'AC-FUL', NOW(), NOW()),
-- Product 26
(51, 26, 300.00, 999, 'PLB-BSC', NOW(), NOW()),
(52, 26, 500.00, 999, 'PLB-PRO', NOW(), NOW()),
-- Product 27
(53, 27, 400.00, 999, 'ELC-BSC', NOW(), NOW()),
(54, 27, 650.00, 999, 'ELC-PRO', NOW(), NOW()),
-- Product 28
(55, 28, 150.00, 10, 'BK-AR', NOW(), NOW()),
(56, 28, 180.00, 10, 'BK-EN', NOW(), NOW()),
-- Product 29
(57, 29, 200.00, 8, 'CRS-ONL', NOW(), NOW()),
(58, 29, 350.00, 7, 'CRS-DVD', NOW(), NOW()),
-- Product 30
(59, 30, 350.00, 5, 'PRG-AR', NOW(), NOW()),
(60, 30, 400.00, 5, 'PRG-EN', NOW(), NOW());

-- =============================================
-- 9. Insert Variation Attributes (1 attribute per variation)
-- =============================================
INSERT INTO `product_variation_attributes` (`id`, `product_variation_id`, `attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'أسود', NOW(), NOW()),
(2, 2, 1, 'فضي', NOW(), NOW()),
(3, 3, 1, 'أسود', NOW(), NOW()),
(4, 4, 1, 'أبيض', NOW(), NOW()),
(5, 5, 1, 'رمادي', NOW(), NOW()),
(6, 6, 1, 'أسود', NOW(), NOW()),
(7, 7, 2, 'M', NOW(), NOW()),
(8, 8, 2, 'L', NOW(), NOW()),
(9, 9, 2, 'S', NOW(), NOW()),
(10, 10, 2, 'M', NOW(), NOW()),
(11, 11, 2, 'L', NOW(), NOW()),
(12, 12, 2, 'XL', NOW(), NOW()),
(13, 13, 3, 'أمامي', NOW(), NOW()),
(14, 14, 3, 'خلفي', NOW(), NOW()),
(15, 15, 3, 'زيت', NOW(), NOW()),
(16, 16, 3, 'هواء', NOW(), NOW()),
(17, 17, 2, '16 بوصة', NOW(), NOW()),
(18, 18, 2, '17 بوصة', NOW(), NOW()),
(19, 19, 2, '120 متر', NOW(), NOW()),
(20, 20, 2, '120 متر مع تشطيب', NOW(), NOW()),
(21, 21, 2, '4 غرف', NOW(), NOW()),
(22, 22, 2, '5 غرف', NOW(), NOW()),
(23, 23, 2, '50 متر', NOW(), NOW()),
(24, 24, 2, '60 متر', NOW(), NOW()),
(25, 25, 3, 'خشب زان', NOW(), NOW()),
(26, 26, 3, 'خشب جوز', NOW(), NOW()),
(27, 27, 1, 'رمادي', NOW(), NOW()),
(28, 28, 1, 'بيج', NOW(), NOW()),
(29, 29, 1, 'بني', NOW(), NOW()),
(30, 30, 1, 'أسود', NOW(), NOW()),
(31, 31, 1, 'أزرق تيتانيوم', NOW(), NOW()),
(32, 32, 1, 'أسود تيتانيوم', NOW(), NOW()),
(33, 33, 1, 'أسود', NOW(), NOW()),
(34, 34, 1, 'أخضر', NOW(), NOW()),
(35, 35, 1, 'أسود', NOW(), NOW()),
(36, 36, 1, 'أبيض', NOW(), NOW()),
(37, 37, 1, 'أسود', NOW(), NOW()),
(38, 38, 1, 'رمادي', NOW(), NOW()),
(39, 39, 1, 'أحمر', NOW(), NOW()),
(40, 40, 1, 'أزرق', NOW(), NOW()),
(41, 41, 2, '50 كجم', NOW(), NOW()),
(42, 42, 2, '70 كجم', NOW(), NOW()),
(43, 43, 2, 'ذكر', NOW(), NOW()),
(44, 44, 2, 'أنثى', NOW(), NOW()),
(45, 45, 1, 'أبيض', NOW(), NOW()),
(46, 46, 1, 'رمادي', NOW(), NOW()),
(47, 47, 1, 'أخضر', NOW(), NOW()),
(48, 48, 1, 'أزرق', NOW(), NOW()),
(49, 49, 2, 'غسيل فقط', NOW(), NOW()),
(50, 50, 2, 'غسيل + فريون', NOW(), NOW()),
(51, 51, 2, 'أساسي', NOW(), NOW()),
(52, 52, 2, 'شامل', NOW(), NOW()),
(53, 53, 2, 'أساسي', NOW(), NOW()),
(54, 54, 2, 'شامل', NOW(), NOW()),
(55, 55, 3, 'عربي', NOW(), NOW()),
(56, 56, 3, 'إنجليزي', NOW(), NOW()),
(57, 57, 3, 'أونلاين', NOW(), NOW()),
(58, 58, 3, 'DVD', NOW(), NOW()),
(59, 59, 3, 'عربي', NOW(), NOW()),
(60, 60, 3, 'إنجليزي', NOW(), NOW());

SET FOREIGN_KEY_CHECKS = 1;
COMMIT;
