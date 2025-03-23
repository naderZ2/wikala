Cf make_floor_no_sometime_null

    ALTER TABLE `address_user`
    MODIFY `floor_no` varchar(30) DEFAULT NULL;


Cf make_familyName_and_city_sometime_null
    ALTER TABLE `daliy_events`
    MODIFY `city_id` INT DEFAULT NULL,
    MODIFY `family_name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL;



Nf make_table_user_notification_and_model

    CREATE TABLE `user_notification` (
    `id` BIGINT AUTO_INCREMENT PRIMARY KEY,
    `user_id` BIGINT UNSIGNED DEFAULT NULL,
    `notification_id` BIGINT UNSIGNED DEFAULT NULL,
    `is_seen` BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`notification_id`) REFERENCES `notifications`(`id`) ON DELETE SET NULL
);



event_categories


ALTER TABLE event_categories ADD COLUMN `order` INT NOT NULL DEFAULT 0;



ALTER TABLE categories ADD COLUMN `order` INT NOT NULL DEFAULT 0;




ALTER TABLE about_us
ADD COLUMN access_token VARCHAR(255),
ADD COLUMN instance_id VARCHAR(255);






ALTER TABLE about_us 
ADD COLUMN delivery_fee INT NOT NULL AFTER privacy;




ALTER TABLE orders 
ADD COLUMN delivery_fee INT NOT NULL;
