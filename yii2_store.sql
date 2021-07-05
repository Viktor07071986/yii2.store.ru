-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 04 2021 г., 23:44
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2.store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `title`, `description`, `keywords`) VALUES
(1, 0, 'Branded Foods', 'Branded Foods description', 'Branded Foods keywords'),
(2, 0, 'Households', 'Households description', 'Households keywords'),
(3, 0, 'Veggies & Fruits', 'Veggies & Fruits description', 'Veggies & Fruits keywords'),
(4, 3, 'Vegetables', 'Vegetables description', 'Vegetables keywords'),
(5, 3, 'Fruits', 'Fruits description', 'Fruits keywords'),
(6, 0, 'Kitchen', NULL, NULL),
(8, 0, 'Beverages', NULL, NULL),
(9, 8, 'Soft Drinks', NULL, NULL),
(10, 8, 'Juices', NULL, NULL),
(11, 0, 'Pet Food', NULL, NULL),
(12, 0, 'Frozen Foods', NULL, NULL),
(13, 12, 'Frozen Snacks', NULL, NULL),
(14, 12, 'Frozen Nonveg', NULL, NULL),
(15, 0, 'Bread & Bakery', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` tinyint UNSIGNED NOT NULL,
  `total` decimal(6,2) NOT NULL DEFAULT '0.00',
  `status` tinyint NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `qty`, `total`, `status`, `name`, `email`, `phone`, `address`, `note`) VALUES
(1, '2021-06-16 12:01:07', '2021-07-04 20:48:53', 1, '3.00', 0, 'test', 'test@test.ru', '111', '222', '333'),
(2, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 0, 'test', 'test@test.ru', '111', '222', '333'),
(3, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 1, 'test', 'test@test.ru', '111', '222', '333'),
(4, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 0, 'test', 'test@test.ru', '111', '222', '333'),
(5, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 0, 'test', 'test@test.ru', '111', '222', '333'),
(6, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 0, 'test', 'test@test.ru', '111', '222', '333'),
(7, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 1, 'test', 'test@test.ru', '111', '222', '333'),
(8, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 0, 'test', 'test@test.ru', '111', '222', '333'),
(9, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 1, 'test', 'test@test.ru', '111', '222', '333'),
(10, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 0, 'test', 'test@test.ru', '111', '222', '333'),
(11, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 0, 'test', 'test@test.ru', '111', '222', '333'),
(12, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 0, 'test', 'test@test.ru', '111', '222', '333'),
(13, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 0, 'test', 'test@test.ru', '111', '222', '333'),
(14, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 0, 'test', 'test@test.ru', '111', '222', '333'),
(15, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 0, 'test', 'test@test.ru', '111', '222', '333'),
(16, '2021-06-16 12:01:07', '2021-06-16 12:01:07', 1, '3.00', 0, 'test', 'test@test.ru', '111', '222', '333');

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `qty` tinyint NOT NULL,
  `total` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `title`, `price`, `qty`, `total`) VALUES
(1, 1, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(2, 2, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(3, 3, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(4, 4, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(5, 5, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(6, 6, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(7, 7, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(8, 8, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(9, 9, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(10, 10, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(11, 11, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(12, 12, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(13, 13, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(14, 14, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(15, 15, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00'),
(16, 16, 1, 'knorr instant soup (100 gm)', '3.00', 1, '3.00');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int UNSIGNED NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `old_price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `is_offer` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `content`, `price`, `old_price`, `description`, `keywords`, `img`, `is_offer`) VALUES
(1, 1, 'knorr instant soup (100 gm)', '<p>Excepteur sint occaecat cupidatat non proident, <strong>sunt </strong>in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n', '3.00', '0.00', '', '', 'products/2021-06-17/60ca75e8c1842_4.png', 1),
(2, 1, 'chings noodles (75 gm)', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n', '5.00', '8.00', '', '', 'products/no-image.png', 1),
(3, 1, 'lahsun sev (150 gm)', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<img alt=\"\" src=\"/upload/files/1.jpg\" style=\"float:right; height:67px; width:100px\" /></p>\r\n', '3.00', '5.00', '', '', 'products/no-image.png', 1),
(4, 1, 'premium bake rusk (300 gm)', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n', '5.00', '7.00', '', '', 'products/no-image.png', 1),
(5, 1, 'fresh spinach (palak)', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n', '2.00', '3.00', '', '', 'products/2021-07-04/60e21d582ba36_19.png', 1),
(6, 5, 'fresh mango dasheri (1 kg)', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n', '5.00', '8.00', '', '', 'products/2021-07-04/60e20ac042132_10.png', 1),
(7, 5, 'fresh apple red (1 kg)', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n', '6.00', '8.00', '', '', 'products/2021-07-04/60e20ad045a4b_11.png', 1),
(8, 4, 'fresh broccoli (500 gm)', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n', '4.00', '6.00', '', '', 'products/2021-07-04/60e20a38a7daf_12.png', 1),
(9, 10, 'mixed fruit juice (1 ltr)', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n', '3.00', '0.00', '', '', 'products/2021-07-04/60e20819ecf02_25.png', 1),
(10, 10, 'prune juice - sunsweet (1 ltr)', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n', '4.00', '0.00', '', '', 'products/2021-07-04/60e20aa169dff_13.png', 1),
(11, 9, 'coco cola zero can (330 ml)', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n', '3.00', '0.00', '', '', 'products/2021-07-04/60e20a6144c69_15.png', 1),
(12, 9, 'sprite bottle (2 ltr)', '<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n', '3.00', '0.00', '', '', 'products/2021-07-04/60e20a80e55d2_16.png', 1),
(13, 1, 'тест', '<p>тест</p>\r\n', '12.00', '10.00', '', '', 'products/2021-06-17/60ca71e7b3bf1_1.png', 0),
(14, 1, 'тест123', '<p>тест1</p>\r\n', '12.00', '10.00', '', '', 'products/2021-06-17/60ca7bb56bd61_24.png', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `auth_key`) VALUES
(1, 'admin', '$2y$13$FItuAVhKVr7REUwxjf0J2eVdt2eIXbGwOdkztzSyqwcfDcr9wZe3a', '8D-zPczL7FJwUP3waVUQcavpSrqutTTI');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
