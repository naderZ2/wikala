-- Add type and video columns to sliders table
ALTER TABLE `sliders` ADD COLUMN `type` VARCHAR(255) NOT NULL DEFAULT 'image' AFTER `name`;
ALTER TABLE `sliders` ADD COLUMN `video` VARCHAR(255) NULL AFTER `type`;
