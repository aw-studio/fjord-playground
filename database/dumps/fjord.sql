-- Created at 16.6.2020 12:30 using David Grudl MySQL Dump Utility
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

INSERT INTO `form_blocks` (`id`, `model_type`, `model_id`, `config_type`, `form_type`, `field_id`, `type`, `value`, `order_column`, `created_at`, `updated_at`) VALUES
(1,	'Fjord\\Crud\\Models\\FormField',	1,	'FjordApp\\Config\\Form\\Pages\\HomeConfig',	NULL,	'cards',	'card',	'{\"icon\":\"<i class=\\\"fas fa-user-circle\\\"><\\/i>\",\"title\":\"Block 1\",\"text\":\"This is a block field.\"}',	0,	NULL,	NULL),
(2,	'Fjord\\Crud\\Models\\FormField',	1,	'FjordApp\\Config\\Form\\Pages\\HomeConfig',	NULL,	'cards',	'card',	'{\"icon\":\"<i class=\\\"far fa-newspaper\\\"><\\/i>\",\"text\":\"This is another block field.\",\"title\":\"Block 2\"}',	1,	NULL,	NULL),
(3,	'Fjord\\Crud\\Models\\FormField',	1,	'FjordApp\\Config\\Form\\Pages\\HomeConfig',	NULL,	'cards',	'card',	'{\"icon\":\"<i class=\\\"fas fa-tachometer-alt\\\"><\\/i>\",\"title\":\"Block 3\",\"text\":\"And another...\"}',	2,	NULL,	NULL),
(5,	'Fjord\\Crud\\Models\\FormField',	1,	'FjordApp\\Config\\Form\\Pages\\HomeConfig',	NULL,	'portfolio_images',	'category',	'[]',	0,	NULL,	NULL),
(6,	'Fjord\\Crud\\Models\\FormField',	1,	'FjordApp\\Config\\Form\\Pages\\HomeConfig',	NULL,	'portfolio_images',	'category',	'[]',	1,	NULL,	NULL),
(7,	'Fjord\\Crud\\Models\\FormField',	1,	'FjordApp\\Config\\Form\\Pages\\HomeConfig',	NULL,	'portfolio_images',	'category',	'[]',	2,	NULL,	NULL),
(8,	'Fjord\\Crud\\Models\\FormField',	3,	'FjordApp\\Config\\Form\\Fields\\BlockConfig',	NULL,	'content',	'text',	'{\"text\":\"Text\"}',	0,	NULL,	NULL);
ALTER TABLE `form_blocks` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `form_field_translations` DISABLE KEYS;

INSERT INTO `form_field_translations` (`id`, `form_field_id`, `locale`, `value`) VALUES
(1,	1,	'en',	'{\"portfolio_title\":\"Portfolio\",\"portfolio_text\":\"<p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias<\\/p>\",\"header\":\"Fjord Admin\",\"text\":\"Fjord is a package for building and maintaining the data of your Laravel applications.\"}'),
(2,	1,	'de',	'{\"portfolio_title\":\"Portfolio\",\"portfolio_text\":\"<p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias<\\/p>\",\"header\":\"Fjord Admin\",\"text\":\"Fjord ist ein Paket zum Aufbau und zur Pflege der Daten Ihrer Laravel-Anwendungen.\"}'),
(3,	1,	'es',	'{\"portfolio_title\":\"Portafolio\",\"portfolio_text\":\"<p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias<\\/p>\",\"header\":\"Fjord Admin\",\"text\":\"Fjord es un paquete para construir y mantener los datos de sus aplicaciones Laravel.\"}'),
(4,	10,	'en',	'{\"text\":\"<h2>Fjord<\\/h2><p>A true <strong><span style=\\\"color: #4951f2\\\">fjord<\\/span><\\/strong> is form<strong>ed when a glacier cuts <\\/strong>a U-shaped valley by ice segregation and abrasion of the surrounding bedrock. According to the standard model, glaciers formed in pre-glacial valleys with a gently sloping valley floor. <a href=\\\"http:\\/\\/www.englisj.com\\\" target=\\\"_blank\\\">The work <\\/a>of the glacier then left an overdeepened U-shaped valley that ends abruptly at a valley or trough end. Such valleys are fjords when flooded by the ocean. Thresholds above sea level create freshwater lakes. Glacial melting is accompanied by the rebounding of Earth\'s crust as the ice load and eroded sediment is removed (also called isostasy or glacial rebound). In some cases this rebound is faster than sea level rise. Most fjords are deeper than the adjacent sea; Sognefjord, Norway, reaches as much as 1,300 m (4,265 ft) below sea level.<\\/p><ul><li><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Faroe_Islands\\\" target=\\\"_blank\\\">Faroe Islands<\\/a><\\/p><\\/li><li><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Westfjords\\\" target=\\\"_blank\\\">Westfjords<\\/a><span>&nbsp;<\\/span>of Iceland<\\/p><\\/li><li><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Eastern_Region_(Iceland)\\\" target=\\\"_blank\\\">Eastern Region<\\/a><span>&nbsp;<\\/span>of Iceland<\\/p><\\/li><li><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/West_Highlands\\\" target=\\\"_blank\\\">West Highlands<\\/a><span>&nbsp;<\\/span>of Scotland<\\/p><\\/li><li><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Norway\\\" target=\\\"_blank\\\">Norway<\\/a>, the whole coast including<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Svalbard\\\" target=\\\"_blank\\\">Svalbard<\\/a><\\/p><\\/li><li><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Kola_Peninsula\\\" target=\\\"_blank\\\">Kola Peninsula<\\/a><span>&nbsp;<\\/span>in Russia<\\/p><\\/li><\\/ul><p><\\/p><p><a href=\\\"https:\\/\\/en.wikipedia.org\\/wiki\\/Fjord\\\" target=\\\"_self\\\">https:\\/\\/en.wikipedia.org\\/wiki\\/Fjord<\\/a><\\/p>\"}'),
(5,	10,	'de',	'{\"text\":\"<p><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">Ein<\\/span><span>&nbsp;<\\/span><strong>Fjord<\\/strong><span>&nbsp;<\\/span>(<a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Altnordische_Sprache\\\">altnordisch<\\/a><span>&nbsp;<\\/span><em><span style=\\\"font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI Symbol&quot;, Quivira, Junicode; color: rgb(32, 33, 34); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\\\">fj\\u01ebr\\u00f0r<\\/span><\\/em><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">,<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Norwegische_Sprache\\\"><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\\\">norwegisch<\\/span><\\/a><span>&nbsp;<\\/span><em><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; font-style: italic;\\\">fjord<\\/span><\\/em><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">, gesprochen<\\/span><span>&nbsp;<\\/span><em>fjuur<\\/em><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">) ist ein weit ins Festland hineinreichender, durch einen seew\\u00e4rts wandernden Talgletscher entstandener Meeresarm. Desselben<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Etymologie\\\">etymologischen<\\/a><span>&nbsp;<\\/span>Ursprungs sind das deutsche Wort<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/F%C3%B6rde\\\">F\\u00f6rde<\\/a><span>&nbsp;<\\/span>und das englische<span>&nbsp;<\\/span><em>Firth<\\/em><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">. W\\u00e4hrend es sich jedoch bei den<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Schottland\\\">schottischen<\\/a><span>&nbsp;<\\/span>Firths tats\\u00e4chlich um echte Fjorde handelt, entstanden die F\\u00f6rden an der Ostseek\\u00fcste durch<span>&nbsp;<\\/span><em>landw\\u00e4rts<span>&nbsp;<\\/span><\\/em><span style=\\\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\\">wandernde Zungen eines<\\/span><span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Kaltzeit\\\">glazialen<\\/a><span>&nbsp;<\\/span>Eispanzers, womit F\\u00f6rden nicht unter die<span>&nbsp;<\\/span><a href=\\\"https:\\/\\/de.wikipedia.org\\/wiki\\/Geologie\\\">geologische<\\/a><span>&nbsp;<\\/span>Definition eines Fjords fallen.<\\/p>\"}');
ALTER TABLE `form_field_translations` ENABLE KEYS;



-- --------------------------------------------------------

ALTER TABLE `form_fields` DISABLE KEYS;

INSERT INTO `form_fields` (`id`, `config_type`, `form_type`, `collection`, `form_name`, `value`, `order_column`, `created_at`, `updated_at`) VALUES
(1,	'FjordApp\\Config\\Form\\Pages\\HomeConfig',	'show',	'pages',	'home',	'[]',	NULL,	'2020-05-12 16:30:06',	'2020-05-12 17:03:24'),
(2,	'FjordApp\\Config\\Form\\Collections\\SettingsConfig',	'show',	'collections',	'settings',	'{\"mobilephone\":\"01234567891\",\"phone\":\"01234567891\",\"title\":\"Fjord Playground\",\"company\":\"\\/\\/* Alle Wetter\"}',	NULL,	'2020-05-15 09:35:08',	'2020-05-15 11:12:45'),
(3,	'FjordApp\\Config\\Form\\Fields\\BlockConfig',	'show',	'fields',	'block',	NULL,	NULL,	'2020-06-09 13:37:37',	'2020-06-09 13:37:37'),
(4,	'FjordApp\\Config\\Form\\Fields\\CodeConfig',	'show',	'fields',	'code',	'{\"code\":\"<html>\\n  <head>\\n    <title>Hello World!<\\/title>\\n  <\\/head>\\n  <body>\\n    <h1>Hello World!<\\/h1>\\n  <\\/body>\\n<\\/html>\",\"js_code\":\"function speak(words) {\\n  console.log(words)\\n}\\n\\nspeak(\'Hello World\');\",\"js_code_theme\":\"function speak(words) {\\n  console.log(words)\\n}\\n\\nspeak(\'Hello World\');\"}',	NULL,	'2020-06-09 13:37:40',	'2020-06-09 13:39:12'),
(5,	'FjordApp\\Config\\Form\\Fields\\ModalConfig',	'show',	'fields',	'modal',	'{\"text\":\"<p>Dummy text.<\\/p>\",\"email\":\"admin@admin.com\"}',	NULL,	'2020-06-09 13:42:41',	'2020-06-09 13:42:57'),
(6,	'FjordApp\\Config\\Form\\Fields\\BooleanConfig',	'show',	'fields',	'boolean',	'{\"active\":true}',	NULL,	'2020-06-09 13:44:22',	'2020-06-09 13:50:47'),
(7,	'FjordApp\\Config\\Form\\Fields\\DatetimeConfig',	'show',	'fields',	'datetime',	NULL,	NULL,	'2020-06-09 13:45:39',	'2020-06-09 13:45:39'),
(8,	'FjordApp\\Config\\Form\\Fields\\IconConfig',	'show',	'fields',	'icon',	NULL,	NULL,	'2020-06-09 13:46:20',	'2020-06-09 13:46:20'),
(9,	'FjordApp\\Config\\Form\\Fields\\CheckboxesConfig',	'show',	'fields',	'checkboxes',	'{\"fruits\":[\"apple\"]}',	NULL,	'2020-06-09 13:47:24',	'2020-06-09 13:50:35'),
(10,	'FjordApp\\Config\\Form\\Fields\\WysiwygConfig',	'show',	'fields',	'wysiwyg',	'[]',	NULL,	'2020-06-09 13:53:14',	'2020-06-09 13:53:34'),
(11,	'FjordApp\\Config\\Form\\Fields\\TextareaConfig',	'show',	'fields',	'textarea',	NULL,	NULL,	'2020-06-09 13:53:57',	'2020-06-09 13:53:57'),
(12,	'FjordApp\\Config\\Form\\Fields\\PasswordConfig',	'show',	'fields',	'password',	NULL,	NULL,	'2020-06-09 13:54:03',	'2020-06-09 13:54:03'),
(13,	'FjordApp\\Config\\Form\\Fields\\RangeConfig',	'show',	'fields',	'range',	'{\"range\":\"8\"}',	NULL,	'2020-06-09 13:54:04',	'2020-06-09 13:54:06'),
(14,	'FjordApp\\Config\\Form\\Fields\\SelectConfig',	'show',	'fields',	'select',	'{\"article_type\":\"1\"}',	NULL,	'2020-06-09 13:54:08',	'2020-06-09 13:54:15'),
(15,	'FjordApp\\Config\\Form\\Fields\\ImageConfig',	'show',	'fields',	'image',	NULL,	NULL,	'2020-06-09 13:54:22',	'2020-06-09 13:54:22'),
(16,	'FjordApp\\Config\\Form\\Fields\\InputConfig',	'show',	'fields',	'input',	NULL,	NULL,	'2020-06-09 13:54:24',	'2020-06-09 13:54:24'),
(17,	'FjordApp\\Config\\Form\\Relations\\OneRelationConfig',	'show',	'relations',	'one_relation',	NULL,	NULL,	'2020-06-09 13:57:33',	'2020-06-09 13:57:33'),
(18,	'FjordApp\\Config\\Form\\Relations\\ManyRelationConfig',	'show',	'relations',	'many_relation',	NULL,	NULL,	'2020-06-09 13:59:16',	'2020-06-09 13:59:16'),
(19,	'FjordApp\\Config\\Form\\Charts\\AreaConfig',	'show',	'charts',	'area',	NULL,	NULL,	'2020-06-16 11:27:52',	'2020-06-16 11:27:52'),
(20,	'FjordApp\\Config\\Form\\Charts\\DonutConfig',	'show',	'charts',	'donut',	NULL,	NULL,	'2020-06-16 11:41:58',	'2020-06-16 11:41:58'),
(21,	'FjordApp\\Config\\Form\\Dashboard\\MainDashboardConfig',	'show',	'dashboard',	'main_dashboard',	NULL,	NULL,	'2020-06-16 11:46:51',	'2020-06-16 11:46:51'),
(22,	'FjordApp\\Config\\Form\\Dashboards\\MainDashboardConfig',	'show',	'dashboards',	'main_dashboard',	NULL,	NULL,	'2020-06-16 11:51:47',	'2020-06-16 11:51:47');
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
