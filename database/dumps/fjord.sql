-- Created at 11.6.2020 9:39 using David Grudl MySQL Dump Utility
-- MySQL Server: 5.7.28
-- Database: fjord-master

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
(1,	'Fjord\\Crud\\Models\\FormField',	1,	'cards',	'card',	'{\"icon\":\"<i class=\\\"fas fa-user-circle\\\"><\\/i>\",\"title\":\"Block 1\",\"text\":\"This is a block field.\"}',	0,	NULL,	NULL),
(2,	'Fjord\\Crud\\Models\\FormField',	1,	'cards',	'card',	'{\"icon\":\"<i class=\\\"far fa-newspaper\\\"><\\/i>\",\"text\":\"This is another block field.\",\"title\":\"Block 2\"}',	1,	NULL,	NULL),
(3,	'Fjord\\Crud\\Models\\FormField',	1,	'cards',	'card',	'{\"icon\":\"<i class=\\\"fas fa-tachometer-alt\\\"><\\/i>\",\"title\":\"Block 3\",\"text\":\"And another...\"}',	2,	NULL,	NULL),
(5,	'Fjord\\Crud\\Models\\FormField',	1,	'portfolio_images',	'category',	'[]',	0,	NULL,	NULL),
(6,	'Fjord\\Crud\\Models\\FormField',	1,	'portfolio_images',	'category',	'[]',	1,	NULL,	NULL),
(7,	'Fjord\\Crud\\Models\\FormField',	1,	'portfolio_images',	'category',	'[]',	2,	NULL,	NULL),
(8,	'Fjord\\Crud\\Models\\FormField',	3,	'content',	'text',	'{\"text\":\"Text\"}',	0,	NULL,	NULL);
ALTER TABLE `form_blocks` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `form_field_translations` DISABLE KEYS;

INSERT INTO `form_field_translations` (`id`, `form_field_id`, `locale`, `value`) VALUES
(1,	1,	'en',	'{\"portfolio_title\":\"Portfolio\",\"portfolio_text\":\"<p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias<\\/p>\",\"header\":\"Fjord Admin\",\"text\":\"Fjord is a package for building and maintaining the data of your Laravel applications.\"}'),
(2,	1,	'de',	'{\"portfolio_title\":\"Portfolio\",\"portfolio_text\":\"<p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias<\\/p>\",\"header\":\"Fjord Admin\",\"text\":\"Fjord ist ein Paket zum Aufbau und zur Pflege der Daten Ihrer Laravel-Anwendungen.\"}'),
(3,	1,	'es',	'{\"portfolio_title\":\"Portafolio\",\"portfolio_text\":\"<p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias<\\/p>\",\"header\":\"Fjord Admin\",\"text\":\"Fjord es un paquete para construir y mantener los datos de sus aplicaciones Laravel.\"}'),
(4,	10,	'en',	'{\"text\":\"<h2>Fjord<\\/h2><p>A true <strong><span style=\\\"color: #4951f2\\\">fjord<\\/span><\\/strong> is formed when a glacier cuts a U-shaped valley by ice segregation and abrasion of the surrounding bedrock. According to the standard model, glaciers formed in pre-glacial valleys with a gently sloping valley floor. The work of the glacier then left an overdeepened U-shaped valley that ends abruptly at a valley or trough end. Such valleys are fjords when flooded by the ocean. Thresholds above sea level create freshwater lakes. Glacial melting is accompanied by the rebounding of Earth\'s crust as the ice load and eroded sediment is removed (also called isostasy or glacial rebound). In some cases this rebound is faster than sea level rise. Most fjords are deeper than the adjacent sea; Sognefjord, Norway, reaches as much as 1,300 m (4,265 ft) below sea level.<\\/p><ul><li><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Faroe_Islands\\\" target=\\\"_blank\\\">Faroe Islands<\\/a><\\/p><\\/li><li><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Westfjords\\\" target=\\\"_blank\\\">Westfjords<\\/a><span>&nbsp;<\\/span>of Iceland<\\/p><\\/li><li><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Eastern_Region_(Iceland)\\\" target=\\\"_blank\\\">Eastern Region<\\/a><span>&nbsp;<\\/span>of Iceland<\\/p><\\/li><li><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/West_Highlands\\\" target=\\\"_blank\\\">West Highlands<\\/a><span>&nbsp;<\\/span>of Scotland<\\/p><\\/li><li><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Norway\\\" target=\\\"_blank\\\">Norway<\\/a>, the whole coast including<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Svalbard\\\" target=\\\"_blank\\\">Svalbard<\\/a><\\/p><\\/li><li><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Kola_Peninsula\\\" target=\\\"_blank\\\">Kola Peninsula<\\/a><span>&nbsp;<\\/span>in Russia<\\/p><\\/li><\\/ul><p><\\/p><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Fjord\\\" target=\\\"_blank\\\">https:\\/\\/en.wikipedia.org\\/wiki\\/Fjord<\\/a><\\/p>\"}');
ALTER TABLE `form_field_translations` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `form_fields` DISABLE KEYS;

INSERT INTO `form_fields` (`id`, `collection`, `form_name`, `value`, `order_column`, `created_at`, `updated_at`) VALUES
(1,	'pages',	'home',	'[]',	NULL,	'2020-05-12 16:30:06',	'2020-05-12 17:03:24'),
(2,	'collections',	'settings',	'{\"mobilephone\":\"01234567891\",\"phone\":\"01234567891\",\"title\":\"Fjord Playground\",\"company\":\"\\/\\/* Alle Wetter\"}',	NULL,	'2020-05-15 09:35:08',	'2020-05-15 11:12:45'),
(3,	'fields',	'block',	NULL,	NULL,	'2020-06-09 13:37:37',	'2020-06-09 13:37:37'),
(4,	'fields',	'code',	'{\"code\":\"<html>\\n  <head>\\n    <title>Hello World!<\\/title>\\n  <\\/head>\\n  <body>\\n    <h1>Hello World!<\\/h1>\\n  <\\/body>\\n<\\/html>\",\"js_code\":\"function speak(words) {\\n  console.log(words)\\n}\\n\\nspeak(\'Hello World\');\",\"js_code_theme\":\"function speak(words) {\\n  console.log(words)\\n}\\n\\nspeak(\'Hello World\');\"}',	NULL,	'2020-06-09 13:37:40',	'2020-06-09 13:39:12'),
(5,	'fields',	'modal',	'{\"text\":\"<p>Dummy text.<\\/p>\",\"email\":\"admin@admin.com\"}',	NULL,	'2020-06-09 13:42:41',	'2020-06-09 13:42:57'),
(6,	'fields',	'boolean',	'{\"active\":false}',	NULL,	'2020-06-09 13:44:22',	'2020-06-11 08:55:48'),
(7,	'fields',	'datetime',	NULL,	NULL,	'2020-06-09 13:45:39',	'2020-06-09 13:45:39'),
(8,	'fields',	'icon',	'{\"icon\":\"<i class=\\\"fas fa-address-card\\\"><\\/i>\"}',	NULL,	'2020-06-09 13:46:20',	'2020-06-11 09:04:13'),
(9,	'fields',	'checkboxes',	'{\"fruits\":[\"apple\"]}',	NULL,	'2020-06-09 13:47:24',	'2020-06-09 13:50:35'),
(10,	'fields',	'wysiwyg',	'[]',	NULL,	'2020-06-09 13:53:14',	'2020-06-09 13:53:34'),
(11,	'fields',	'textarea',	NULL,	NULL,	'2020-06-09 13:53:57',	'2020-06-09 13:53:57'),
(12,	'fields',	'password',	NULL,	NULL,	'2020-06-09 13:54:03',	'2020-06-09 13:54:03'),
(13,	'fields',	'range',	'{\"range\":\"8\"}',	NULL,	'2020-06-09 13:54:04',	'2020-06-09 13:54:06'),
(14,	'fields',	'select',	'{\"article_type\":\"1\"}',	NULL,	'2020-06-09 13:54:08',	'2020-06-09 13:54:15'),
(15,	'fields',	'image',	NULL,	NULL,	'2020-06-09 13:54:22',	'2020-06-09 13:54:22'),
(16,	'fields',	'input',	NULL,	NULL,	'2020-06-09 13:54:24',	'2020-06-09 13:54:24'),
(17,	'relations',	'one_relation',	NULL,	NULL,	'2020-06-09 13:57:33',	'2020-06-09 13:57:33'),
(18,	'relations',	'many_relation',	NULL,	NULL,	'2020-06-09 13:59:16',	'2020-06-09 13:59:16');
ALTER TABLE `form_fields` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `form_relations` DISABLE KEYS;

INSERT INTO `form_relations` (`id`, `from_model_type`, `from_model_id`, `to_model_type`, `to_model_id`, `field_id`, `order_column`) VALUES
(1,	'Fjord\\Crud\\Models\\FormField',	17,	'App\\Models\\Employee',	12,	'employees',	NULL),
(2,	'Fjord\\Crud\\Models\\FormField',	18,	'App\\Models\\Employee',	11,	'employees',	0),
(3,	'Fjord\\Crud\\Models\\FormField',	18,	'App\\Models\\Employee',	12,	'employees',	1),
(4,	'Fjord\\Crud\\Models\\FormField',	17,	'App\\Models\\Employee',	12,	'employee',	NULL);
ALTER TABLE `form_relations` ENABLE KEYS;



COMMIT;
-- THE END
