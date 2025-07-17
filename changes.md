ALTER TABLE `categories_attributes`
ADD COLUMN `enable` TINYINT(1) DEFAULT 0;




ALTER TABLE about_us
ADD COLUMN ads_time_user INT,
ADD COLUMN ads_time_business INT,
ADD COLUMN free_ads_user INT,
ADD COLUMN free_ads_business INT;


CREATE TABLE favorite_ads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    ad_id INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    
);

CREATE TABLE saved_ads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    ad_id INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    
);


CREATE TABLE ads_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ad_id INT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    
);

CREATE TABLE recently_view_ads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    ad_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE ads_attributes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ad_id INT NOT NULL,
    attribute_id INT NOT NULL,
    attribute_value VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



CREATE TABLE ads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    user_id INT NOT NULL,
    type_id INT NOT NULL,
    rejected_id INT NULL,
    
    ad_number VARCHAR(100) UNIQUE NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,

    contact_method ENUM('phone', 'chat', 'email') NULL,
    negotiable BOOLEAN DEFAULT TRUE,
    
    status ENUM('under_review', 'accepted', 'rejected') DEFAULT 'under_review',
    start_date DATETIME NULL,
    end_date DATETIME NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP


);          


CREATE TABLE ads_type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    enable BOOLEAN DEFAULT TRUE,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);




ALTER TABLE ads
ADD COLUMN city_id INaT AFTER type_id,
ADD COLUMN region_id INT AFTER city_id;



CREATE TABLE chats (
    id int AUTO_INCREMENT PRIMARY KEY,
    sender_id int NOT NULL,
    receiver_id int NOT NULL,
    message TEXT NOT NULL,
    message_type ENUM('text', 'file') NOT NULL DEFAULT 'text',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX idx_sender (sender_id),
    INDEX idx_receiver (receiver_id),
    INDEX idx_sender_receiver (sender_id, receiver_id),
    INDEX idx_receiver_sender (receiver_id, sender_id)
);


ALTER TABLE chats
MODIFY COLUMN message_type ENUM('text', 'file', 'audio') NOT NULL DEFAULT 'text';



CREATE TABLE websockets_statistics_entries (
    id bigint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
    app_id VARCHAR(255) NOT NULL,
    peak_connection_count INT NOT NULL,
    websocket_message_count INT NOT NULL,
    api_message_count INT NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);









ALTER TABLE `websockets_statistics_entries`
  ADD INDEX `index_websockets_statistics_entries_app_id` (`app_id`),
  ADD INDEX `index_websockets_statistics_entries_created_at` (`created_at`);





ALTER TABLE `ads`
  ADD INDEX `index_ads_user_id` (`user_id`),  
  ADD INDEX `index_ads_status` (`status`),  
  ADD INDEX `index_ads_created_at` (`created_at`), 
  ADD INDEX `index_ads_updated_at` (`updated_at`);  


ALTER TABLE `ads_attributes`
  ADD INDEX `index_ads_attributes_ad_id` (`ad_id`);



ALTER TABLE `ads_images`
  ADD INDEX `index_ads_images_ad_id` (`ad_id`),  -- Index on ad_id for linking images to ads
  ADD INDEX `index_ads_images_created_at` (`created_at`);  -- Index on created_at for sorting images by date


ALTER TABLE `ads_type`
  ADD INDEX `index_ads_type_name` (`name`);  -- Index on ad type name for quick lookup by name


ALTER TABLE `recently_view_ads`
  ADD INDEX `index_recently_view_ads_user_id` (`user_id`),  -- Index on user_id for filtering by user
  ADD INDEX `index_recently_view_ads_ad_id` (`ad_id`);  -- Index on viewed_at for sorting views by date



ALTER TABLE `saved_ads`
  ADD INDEX `index_saved_ads_user_id` (`user_id`),  -- Index on user_id for filtering saved ads by user
  ADD INDEX `index_saved_ads_ad_id` (`ad_id`),  -- Index on ad_id for filtering saved ads by ad
  ADD INDEX `index_saved_ads_created_at` (`created_at`);  -- Index on created_at for sorting saved ads by date



ALTER TABLE `favorite_ads`
  ADD INDEX `index_saved_ads_user_id` (`user_id`),  -- Index on user_id for filtering saved ads by user
  ADD INDEX `index_saved_ads_ad_id` (`ad_id`),  -- Index on ad_id for filtering saved ads by ad
  ADD INDEX `index_saved_ads_created_at` (`created_at`);  -- Index on created_at for sorting saved ads by date






CREATE TABLE followers (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,  -- User who is following
    follower_id BIGINT UNSIGNED NOT NULL,  -- User being followed
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (follower_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE (user_id, follower_id) 
);


CREATE INDEX idx_user_id ON followers (user_id);
CREATE INDEX idx_follower_id ON followers (follower_id);
CREATE UNIQUE INDEX idx_user_follower ON followers (user_id, follower_id);



CREATE TABLE `report_options` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title_ar` VARCHAR(255) NOT NULL,
  `title_en` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL
)


CREATE TABLE `reports` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `reporter_id` BIGINT UNSIGNED NOT NULL,
  `reportable_id` BIGINT UNSIGNED NOT NULL, 
  `reportable_type` ENUM('ad', 'user') NOT NULL, 
  `report_option_id` BIGINT UNSIGNED NOT NULL,
  `additional_notes` TEXT DEFAULT NULL, 
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  

  CONSTRAINT `fk_reports_reporter_id` FOREIGN KEY (`reporter_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_reports_option_id` FOREIGN KEY (`report_option_id`) REFERENCES `report_options`(`id`) ON DELETE CASCADE
) 




CREATE TABLE `deleted_users` (
  `id` BIGINT UNSIGNED PRIMARY KEY,
  `deleted_date` TIMESTAMP NULL,
  `name` VARCHAR(255),
  `email` VARCHAR(255),
  `bio` TEXT,
  `date_of_birth` DATE,
  `phone` VARCHAR(20),
  `password` VARCHAR(255),
  `image` VARCHAR(255),
  `device_id` VARCHAR(255),
  `provider_id` VARCHAR(255),
  `provider_name` VARCHAR(255),
  `lang` VARCHAR(10),
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `followers_count` INT DEFAULT 0
);





CREATE TABLE hidden_ads (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    ad_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    INDEX idx_user_id (user_id)
    
);






UPDATE `ads` SET `status`='accepted' WHERE 1

ALTER TABLE `ads_type` ADD COLUMN `name_ar` VARCHAR(100) NULL AFTER `id`, ADD COLUMN `name_en` VARCHAR(100) NULL AFTER `name_ar`;






CREATE TABLE home_page_category (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_id BIGINT UNSIGNED NOT NULL,
    name_ar VARCHAR(255) NOT NULL,
    name_en VARCHAR(255) NOT NULL,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,

    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);



CREATE TABLE Auction (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    ad_id INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);










ALTER TABLE `ads`
ADD COLUMN `price` DECIMAL(10,2) UNSIGNED NOT NULL DEFAULT 0.00 AFTER `views_count`;






ALTER TABLE users
ADD COLUMN type ENUM('user', 'business') NOT NULL DEFAULT 'user';


ALTER TABLE users
ADD COLUMN limit_ad INT DEFAULT 0;


ALTER TABLE ads
ADD COLUMN is_commercial BOOLEAN DEFAULT FALSE AFTER price;

