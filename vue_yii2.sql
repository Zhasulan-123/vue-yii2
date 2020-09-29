-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 29 2020 г., 22:56
-- Версия сервера: 5.7.25
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vue_yii2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1601177352),
('m200927_032809_create_user_table', 1601177354),
('m200927_155211_create_product_table', 1601223630);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` int(1) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `desc`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'МФУ Canon PN: MF 3010 Imageclass, A4', '92 000 ', NULL, 1, '2020-09-29 22:25:42', '2020-09-29 22:47:32'),
(2, 'Xiaomi Haylou Solar LS05 Black', '16', NULL, 1, '2020-09-29 22:25:42', '2020-09-29 22:49:30'),
(3, 'Xiaomi Mi Band 5 Black', '16 500', NULL, 1, '2020-09-29 22:25:42', '2020-09-29 22:47:11'),
(4, 'Куплю телефоны, планшеты, Macbook. дорого!', '77', NULL, 1, '2020-09-29 22:25:42', '2020-09-29 22:49:13'),
(5, 'Apple iPhone 11 64Gb все цвета', '28', NULL, 1, '2020-09-29 22:25:42', '2020-09-29 22:49:21'),
(6, 'Профессиональное восстановление данных любой сложности в РК!', '88', NULL, 1, '2020-09-29 22:25:42', '2020-09-29 22:46:35'),
(7, 'Apple iPhone 11 Pro 256Gb Space Gray', '454 570', NULL, 1, '2020-09-29 22:25:42', '2020-09-29 22:46:24'),
(8, 'Apple iPhone 11 Pro Max 256Gb Space Gray', '493 480', NULL, 1, '2020-09-29 22:25:43', '2020-09-29 22:46:15'),
(9, 'Apple iPhone 11 Pro Max 64Gb Midnight Green', '446 990', NULL, 1, '2020-09-29 22:25:43', '2020-09-29 22:46:09'),
(10, 'GoPro HERO8 Black', '163 000', NULL, 1, '2020-09-29 22:25:43', '2020-09-29 22:46:02'),
(11, 'Samsung Galaxy A71 6/128Gb Crush Black', '124', NULL, 1, '2020-09-29 22:25:43', '2020-09-29 22:49:40'),
(12, 'A4Tech, PK-910H, 16Mpx', '10 000', NULL, 1, '2020-09-29 22:25:43', '2020-09-29 22:45:46'),
(13, 'Apple iPad Pro 11 (2018) 256Gb Wi-Fi Space Gray', '310', NULL, 1, '2020-09-29 22:25:43', '2020-09-29 22:49:49'),
(14, 'Samsung Galaxy A51 4/64Gb Prism Green', '94 780', NULL, 1, '2020-09-29 22:25:43', '2020-09-29 22:45:29'),
(15, 'Samsung Galaxy A51 4/64Gb Crush Black', '94', NULL, 1, '2020-09-29 22:25:43', '2020-09-29 22:49:56'),
(16, 'Samsung Galaxy A51 6/128Gb Crush Black', '108', NULL, 1, '2020-09-29 22:25:43', '2020-09-29 22:50:07'),
(17, 'Apple iPad Pro 11', '310 000', 'Описание', 1, '2020-09-29 22:34:55', '2020-09-29 22:55:06');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `email`, `auth_key`) VALUES
(1, 'Жасулан', 'Молдакулов', '$2y$13$EHZy5ZZTvkiDkshv0eSMzu0r751mbH7usod.fmaP/czCa0vZGc5Fe', '87028987788@mail.ru', 'V3-lPt5qtYsidFbQGlsnYUZRdxrp4PeSrB-6cK40lERYQaqlhrwe3X6GVQSWc_I5ZP5XyDJEdg7u7qg4zpqNsXuUsY63eRVWiHLgYmapO_aXhawJaw82VoO0dErCcNZlACcaZpHCH3y_jncm6uCz-Ash_KIz67OXX3LgMWCIqcgEfOMDPYDfj8yZZ3Kuuwzu2DmXMiNGhLYkWpFKmHXqOF6SjuMQBDLJ60t4qgAl5M8Xn1fFerhQSPh2rM0FYpn');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

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
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
