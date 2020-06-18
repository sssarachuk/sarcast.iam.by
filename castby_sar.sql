-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Хост: mysql5.activeby.net
-- Время создания: Мар 20 2018 г., 11:05
-- Версия сервера: 5.5.30
-- Версия PHP: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `castby_sar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `photos` text NOT NULL,
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  `sort` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `album`
--

INSERT INTO `album` (`id`, `category_id`, `title`, `slug`, `folder`, `photos`, `created_at`, `updated_at`, `sort`) VALUES
(4, 8, 'Фэшн с фруктами', 'fashion-with-fruits', 'Fashion_with_fruits', '10.jpg\r\n11.jpg\r\n12.jpg\r\n13.jpg\r\n14.jpg\r\n15.jpg\r\n16.jpg\r\n17.jpg\r\n18.jpg\r\n19.jpg\r\n20.jpg\r\n21.jpg\r\n22.jpg\r\n23.jpg\r\n24.jpg\r\n25.jpg\r\n26.jpg\r\n27.jpg\r\n28.jpg\r\n29.jpg\r\n30.jpg', 1518585882, 1521455099, 1),
(5, 8, 'Женя и Мария', 'Evgeny-and-Mary', 'evgeny_and_mary', '100.jpg\r\n110.jpg\r\n120.jpg\r\n140.jpg\r\n160.jpg\r\n445.jpg\r\n446.jpg\r\n447.jpg\r\n449.jpg\r\n452.jpg\r\n453.jpg\r\n470.jpg\r\n520.jpg\r\n550.jpg\r\n570.jpg\r\n620.jpg\r\n641.jpg\r\n670.jpg\r\n730.jpg\r\n745.jpg\r\n790.jpg', 1518588153, 1521131290, 0),
(6, 6, 'Иван и Валерия (часть 1)', 'Ivan-and-Valerya-part-1', 'ivan_and_valerya_part_1', '10.jpg\r\n11.jpg\r\n12.jpg\r\n13.jpg\r\n14.jpg\r\n15.jpg\r\n16.jpg\r\n17.jpg\r\n18.jpg\r\n19.jpg\r\n20.jpg\r\n21.jpg\r\n22.jpg\r\n23.jpg\r\n24.jpg\r\n25.jpg\r\n26.jpg\r\n27.jpg\r\n28.jpg\r\n29.jpg\r\n30.jpg', 1518597095, 1521131338, 0),
(7, 6, 'Иван и Валерия (часть 2)', 'Ivan-and-Valerya-part-2', 'ivan_and_valerya_part_2', '51.jpg\r\n52.jpg\r\n53.jpg\r\n54.jpg\r\n55.jpg\r\n56.jpg\r\n57.jpg\r\n58.jpg\r\n59.jpg\r\n60.jpg\r\n61.jpg\r\n62.jpg\r\n63.jpg\r\n64.jpg\r\n65.jpg\r\n66.jpg\r\n67.jpg\r\n68.jpg\r\n69.jpg\r\n70.jpg\r\n71.jpg\r\n72.jpg\r\n73.jpg\r\n74.jpg\r\n75.jpg\r\n76.jpg\r\n77.jpg', 1518597382, 1521131350, 0),
(8, 7, 'Виталий и Ирина', 'Vitaly-and-Irina', 'vitaly_and_irina', '10.jpg\r\n11.jpg\r\n12.jpg\r\n13.jpg\r\n14.jpg\r\n15.jpg\r\n16.jpg\r\n17.jpg\r\n18.jpg\r\n19.jpg\r\n20.jpg\r\n', 1518598068, 1521131360, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `slug`, `title`, `created_at`, `updated_at`) VALUES
(6, 'wedding', 'Свадьбы', 1518535129, 1521131620),
(7, 'love-story', 'love story', 1518535185, 1521131637),
(8, 'workshops', 'Воркшопы', 1518535473, 1521131649);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) NOT NULL DEFAULT '',
  `meta_keywords` varchar(255) NOT NULL DEFAULT '',
  `meta_description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `name`, `text`, `created_at`, `updated_at`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(7, 'about', '<p>\r\n	<span class="span-13" style="box-sizing: border-box; color: rgb(128, 128, 128); font-size: 13px; font-family: verdana, geneva, sans-serif; text-align: justify;">Приветствую! Меня зовут Алиса Пугачёва, живу и работаю в Минске, снимаю по всей территории Беларуси, а так же в Москве и СПБ. Основное направление моей профессиональной деятельности это свадебная фотография. Я очень люблю снимать влюбленных людей, сохранять на фотографиях моменты нежности и их прелестного отношения друг к другу. Я очень люблю свою работу, т.к. с помощью фото я дарю людям светлые и теплые воспоминания о самых радостных моментах в их жизни. Для меня это самый мощный жизненный стимул!&nbsp;</span><br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<span class="span-13-upper" style="box-sizing: border-box; color: rgb(0, 0, 0); font-size: 13px; font-family: verdana, geneva, sans-serif; text-align: justify;">ПРЕДЛАГАЮ СЛЕДУЮЩИЕ УСЛУГИ:&nbsp;</span><br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<span class="span-13" style="box-sizing: border-box; color: rgb(128, 128, 128); font-size: 13px; font-family: verdana, geneva, sans-serif; text-align: justify;">&bull; Свадебная фотосъемка&nbsp;<br style="box-sizing: border-box;" />\r\n	&bull; Венчание&nbsp;<br style="box-sizing: border-box;" />\r\n	&bull; Девичник&nbsp;<br style="box-sizing: border-box;" />\r\n	&bull; Love Story&nbsp;<br style="box-sizing: border-box;" />\r\n	&bull; Семейная&nbsp;<br style="box-sizing: border-box;" />\r\n	&bull; Детская&nbsp;<br style="box-sizing: border-box;" />\r\n	&bull; В ожидании чуда&nbsp;<br style="box-sizing: border-box;" />\r\n	&bull; Индивидуальные фотосессии&nbsp;<br style="box-sizing: border-box;" />\r\n	&bull; Студийная&nbsp;</span><br style="box-sizing: border-box;" />\r\n	<br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<span class="span-13-upper" style="box-sizing: border-box; color: rgb(0, 0, 0); font-size: 13px; font-family: verdana, geneva, sans-serif; text-align: justify;">МОЯ ФОТОТЕХНИКА:&nbsp;</span><br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<span class="span-13" style="box-sizing: border-box; color: rgb(128, 128, 128); font-size: 13px; font-family: verdana, geneva, sans-serif; text-align: justify;">Камера: Canon EOS 5D Mark III&nbsp;<br style="box-sizing: border-box;" />\r\n	Обьективы: Canon 135mm f/2.0L ; Canon 16-35mm f/2.8; Canon 50mm, 85 mm&nbsp;</span><br style="box-sizing: border-box;" />\r\n	<br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<span class="span-13-upper" style="box-sizing: border-box; color: rgb(0, 0, 0); font-size: 13px; font-family: verdana, geneva, sans-serif; text-align: justify;">EMAIL:&nbsp;</span><br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<span class="span-13" style="box-sizing: border-box; color: rgb(128, 128, 128); font-size: 13px; font-family: verdana, geneva, sans-serif; text-align: justify;"><a class="email-gray" href="mailto:Alisa@cast.by" style="box-sizing: border-box; background-color: transparent; color: rgb(128, 128, 128); text-decoration-line: none; outline: none; font-family: Georgia, Times, serif; line-height: 20px; text-align: center;">Alisa@cast.by</a>&nbsp;</span><br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<span class="span-13-upper" style="box-sizing: border-box; color: rgb(0, 0, 0); font-size: 13px; font-family: verdana, geneva, sans-serif; text-align: justify;">ТЕЛЕФОН:&nbsp;</span><br style="box-sizing: border-box; color: rgb(94, 94, 94); font-family: Verdana; font-size: medium; text-align: justify;" />\r\n	<span class="span-13" style="box-sizing: border-box; color: rgb(128, 128, 128); font-size: 13px; font-family: verdana, geneva, sans-serif; text-align: justify;">+375 (29) 331 08 32</span></p>\r\n', 1503588291, 0, '', '', ''),
(8, 'contacts', '<p>\r\n	Контакты</p>\r\n', 1503588306, 0, '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photos` text NOT NULL,
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `title`, `name`, `date`, `description`, `photos`, `created_at`, `updated_at`) VALUES
(13, ')))', 'Оксана и Николай', '25 июля', 'Сергей, спасибо большое за прекрасные фото, есть достаточно не обычные и прикольные фото)))', 'user-1-46x46.jpg', 1521367519, 1521481501),
(40, ')))', 'Екатерина и Андрей', '14 февраля', 'Огромное спасибо за фотографии, они просто шикарные)\r\nНи разу не пожалели, что выбрали вас)', 'W9xDpdt6vlI.jpg', 1521368684, 1521481490),
(41, ')))', 'Вероника и Сергей', '20 августа', 'Благодаря тебе у нас есть прекрасная память о нашем дне! Твой неоспоримый талант, внимательность к деталям и индивидуальный подход позволяет достичь самых лучших результатов в работе! Прошло 2 недели- и мы смогли насладиться прекрасными снимками! Спасибо огромное! Успехов и классных идей!)))', 'web2017_08_05_142257.jpg', 1521368709, 1521481479),
(42, ')))', 'Валерия и Иван', '4 января', 'Сергей, хочется выразить тебе огромное спасибо за твой профессионализм! Как ни странно, больше всего советов по поводу нашей свадьбы мы получили от тебя, и речь шла не только о фотосъемке, а обо всем.\r\n\r\nТы настолько простой, открытый и добрый человек, что сразу к себе располагаешь, поэтому с тобой было очень приятно и легко работать.\r\n\r\nЕще раз спасибо за отличные фотографии, которые понравились не только нам, но и всем родственникам и друзьям!!! Благодаря им мы всегда сможем вспомнить наш день.', 'web2017_09_02_152330.jpg', 1521398339, 1521481467);

-- --------------------------------------------------------

--
-- Структура таблицы `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photos` text NOT NULL,
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  `pretitle` varchar(255) NOT NULL DEFAULT '',
  `notes` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `service`
--

INSERT INTO `service` (`id`, `title`, `slug`, `price`, `description`, `photos`, `created_at`, `updated_at`, `pretitle`, `notes`) VALUES
(5, '"Минимум"', 'svadby', '260 бел.руб (130 $)', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px;">- съёмка одним фотографом до 3 часов;&nbsp;</span><br style="color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px;" />\r\n	<span style="color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px;">- количество фотографий не менее 100 шт;&nbsp;</span><br />\r\n	<span style="color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px;">- быстрая обработка всех фото в срок до 1 месяца;&nbsp;<br />\r\n	- выборочная ретушь отдельных фотографий;&nbsp;<br />\r\n	- дополнительное время 60 бел.руб./час.</span></p>\r\n', 'service-1-585x433.jpg', 1521369969, 1521399943, 'Свадьбы', ''),
(6, '"Стандарт"', 'svadby-1', '590 бел.руб (295 $)', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px;">- съёмка одним фотографом до 12 часов;&nbsp;</span><br style="color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px;" />\r\n	<span style="color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px;">- количество фотографий не менее 300 шт;&nbsp;</span><br />\r\n	<span style="color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px;">- быстрая обработка всех фото в срок до 1 месяца;&nbsp;<br />\r\n	- выборочная ретушь отдельных фотографий;&nbsp;<br />\r\n	- дополнительное время 60 бел.руб./час;&nbsp;<br />\r\n	- мини-серия лучших фотографий в срок до 7 дней.</span></p>\r\n', 'service-1-585x433.jpg', 1521370299, 1521399937, '"Стандарт"', ''),
(7, '"Максимум"', 'svadbyy', '990 бел.руб (495 $)', '<p>\r\n	<span style="color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px;">- съёмка одним фотографом с ассистентом до 14 часов;&nbsp;</span><br style="color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px;" />\r\n	<span style="color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px;">- количество фотографий не менее 400 шт;&nbsp;</span><br />\r\n	<span style="color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, sans-serif; font-size: 13px;">- быстрая приоритетная обработка всех фото в срок до 1 месяца;&nbsp;<br />\r\n	- выборочная ретушь отдельных фотографий;&nbsp;<br />\r\n	- мини-серия лучших фотографий в срок до 7 дней;&nbsp;<br />\r\n	- BONUS: мобильная фотостудия;&nbsp;<br />\r\n	- BONUS: предсвадебная съемка.</span></p>\r\n', 'service-1-585x433.jpg', 1521370318, 1521400497, '"Максимум"', '');

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `photos` text NOT NULL,
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `title`, `photos`, `created_at`, `updated_at`) VALUES
(4, 'slide1', '10.jpg', 1518599601, 1518625422),
(5, 'slide2', '11.jpg', 1518599649, 0),
(6, 'slide3', '12.jpg', 1518599675, 0),
(7, 'slide4', '13.jpg', 1518599690, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `surname` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `city` varchar(255) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT '',
  `created_at` int(10) NOT NULL DEFAULT '0',
  `updated_at` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `name`, `surname`, `phone`, `city`, `address`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2bb60a75d3efa37b99c32b63ea9921a2a5e9962e', 0, '', '', '', '', '', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
