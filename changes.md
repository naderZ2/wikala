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
