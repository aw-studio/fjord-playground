-- Created at 12.5.2020 17:32 using David Grudl MySQL Dump Utility
-- MySQL Server: 5.7.29
-- Database: fjord-playground

SET NAMES utf8;
SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
SET FOREIGN_KEY_CHECKS=0;
SET UNIQUE_CHECKS=0;
SET AUTOCOMMIT=0;
-- --------------------------------------------------------

ALTER TABLE `form_block_translations` DISABLE KEYS;

INSERT INTO `form_block_translations` (`id`, `form_block_id`, `locale`, `value`) VALUES
(1,	5,	'en',	'{\"name\":\"App\"}'),
(2,	5,	'de',	'{\"name\":\"App\"}'),
(3,	5,	'es',	'{\"name\":\"App\"}'),
(4,	6,	'en',	'{\"name\":\"Card\"}'),
(5,	7,	'en',	'{\"name\":\"Web\"}');
ALTER TABLE `form_block_translations` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `form_blocks` DISABLE KEYS;

INSERT INTO `form_blocks` (`id`, `model_type`, `model_id`, `field_id`, `type`, `value`, `order_column`, `created_at`, `updated_at`) VALUES
(1,	'Fjord\\Crud\\Models\\FormField',	1,	'cards',	'card',	'{\"icon\":\"<i class=\\\"fas fa-basketball-ball\\\"><\\/i>\",\"title\":\"Lorem Ipsum\",\"text\":\"Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi\"}',	0,	NULL,	NULL),
(2,	'Fjord\\Crud\\Models\\FormField',	1,	'cards',	'card',	'{\"icon\":\"<i class=\\\"far fa-newspaper\\\"><\\/i>\",\"text\":\"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore\",\"title\":\"Sed ut perspiciatis\"}',	1,	NULL,	NULL),
(3,	'Fjord\\Crud\\Models\\FormField',	1,	'cards',	'card',	'{\"icon\":\"<i class=\\\"fas fa-tachometer-alt\\\"><\\/i>\",\"title\":\"Magni Dolores\",\"text\":\"Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia\"}',	2,	NULL,	NULL),
(4,	'Fjord\\Crud\\Models\\FormField',	1,	'cards',	'card',	'{\"icon\":\"<i class=\\\"far fa-window-maximize\\\"><\\/i>\",\"title\":\"Dele cardo\",\"text\":\"Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur\"}',	3,	NULL,	NULL),
(5,	'Fjord\\Crud\\Models\\FormField',	1,	'portfolio_images',	'category',	'[]',	0,	NULL,	NULL),
(6,	'Fjord\\Crud\\Models\\FormField',	1,	'portfolio_images',	'category',	'[]',	1,	NULL,	NULL),
(7,	'Fjord\\Crud\\Models\\FormField',	1,	'portfolio_images',	'category',	'[]',	2,	NULL,	NULL);
ALTER TABLE `form_blocks` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `form_field_translations` DISABLE KEYS;

INSERT INTO `form_field_translations` (`id`, `form_field_id`, `locale`, `value`) VALUES
(1,	1,	'en',	'{\"portfolio_title\":\"Portfolio\",\"portfolio_text\":\"<p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias<\\/p>\"}'),
(2,	1,	'de',	'{\"portfolio_title\":\"Portfolio\",\"portfolio_text\":\"<p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias<\\/p>\"}'),
(3,	1,	'es',	'{\"portfolio_title\":\"Portafolio\",\"portfolio_text\":\"<p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias<\\/p>\"}');
ALTER TABLE `form_field_translations` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `form_fields` DISABLE KEYS;

INSERT INTO `form_fields` (`id`, `collection`, `form_name`, `value`, `order_column`, `created_at`, `updated_at`) VALUES
(1,	'pages',	'home',	'[]',	NULL,	'2020-05-12 16:30:06',	'2020-05-12 17:03:24');
ALTER TABLE `form_fields` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `form_relations` DISABLE KEYS;

ALTER TABLE `form_relations` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `media` DISABLE KEYS;

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1,	'Fjord\\Crud\\Models\\FormBlock',	5,	'images',	'portfolio-1',	'portfolio-1.jpg',	'image/png',	'public',	346479,	'[]',	'{\"alt\": null, \"title\": null, \"generated_conversions\": {\"lg\": true, \"md\": true, \"sm\": true, \"xl\": true}}',	'[]',	1,	'2020-05-12 17:29:49',	'2020-05-12 17:29:51'),
(2,	'Fjord\\Crud\\Models\\FormBlock',	5,	'images',	'portfolio-2',	'portfolio-2.jpg',	'image/png',	'public',	916272,	'[]',	'{\"alt\": null, \"title\": null, \"generated_conversions\": {\"lg\": true, \"md\": true, \"sm\": true, \"xl\": true}}',	'[]',	2,	'2020-05-12 17:29:57',	'2020-05-12 17:29:58'),
(3,	'Fjord\\Crud\\Models\\FormBlock',	5,	'images',	'portfolio-3',	'portfolio-3.jpg',	'image/png',	'public',	554987,	'[]',	'{\"alt\": null, \"title\": null, \"generated_conversions\": {\"lg\": true, \"md\": true, \"sm\": true, \"xl\": true}}',	'[]',	3,	'2020-05-12 17:30:34',	'2020-05-12 17:30:35'),
(4,	'Fjord\\Crud\\Models\\FormBlock',	6,	'images',	'portfolio-4',	'portfolio-4.jpg',	'image/png',	'public',	221831,	'[]',	'{\"alt\": null, \"title\": null, \"generated_conversions\": {\"lg\": true, \"md\": true, \"sm\": true, \"xl\": true}}',	'[]',	4,	'2020-05-12 17:30:47',	'2020-05-12 17:30:48'),
(5,	'Fjord\\Crud\\Models\\FormBlock',	6,	'images',	'portfolio-5',	'portfolio-5.jpg',	'image/png',	'public',	364227,	'[]',	'{\"alt\": null, \"title\": null, \"generated_conversions\": {\"lg\": true, \"md\": true, \"sm\": true, \"xl\": true}}',	'[]',	5,	'2020-05-12 17:30:56',	'2020-05-12 17:30:57'),
(6,	'Fjord\\Crud\\Models\\FormBlock',	6,	'images',	'portfolio-6',	'portfolio-6.jpg',	'image/png',	'public',	401842,	'[]',	'{\"alt\": null, \"title\": null, \"generated_conversions\": {\"lg\": true, \"md\": true, \"sm\": true, \"xl\": true}}',	'[]',	6,	'2020-05-12 17:31:26',	'2020-05-12 17:31:27'),
(7,	'Fjord\\Crud\\Models\\FormBlock',	7,	'images',	'portfolio-7',	'portfolio-7.jpg',	'image/png',	'public',	827779,	'[]',	'{\"alt\": null, \"title\": null, \"generated_conversions\": {\"lg\": true, \"md\": true, \"sm\": true, \"xl\": true}}',	'[]',	7,	'2020-05-12 17:31:40',	'2020-05-12 17:31:42'),
(8,	'Fjord\\Crud\\Models\\FormBlock',	7,	'images',	'portfolio-8',	'portfolio-8.jpg',	'image/png',	'public',	703317,	'[]',	'{\"alt\": null, \"title\": null, \"generated_conversions\": {\"lg\": true, \"md\": true, \"sm\": true, \"xl\": true}}',	'[]',	8,	'2020-05-12 17:31:55',	'2020-05-12 17:31:56'),
(9,	'Fjord\\Crud\\Models\\FormBlock',	7,	'images',	'portfolio-9',	'portfolio-9.jpg',	'image/png',	'public',	293537,	'[]',	'{\"alt\": null, \"title\": null, \"generated_conversions\": {\"lg\": true, \"md\": true, \"sm\": true, \"xl\": true}}',	'[]',	9,	'2020-05-12 17:32:20',	'2020-05-12 17:32:21');
ALTER TABLE `media` ENABLE KEYS;



COMMIT;
-- THE END
