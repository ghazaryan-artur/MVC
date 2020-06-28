-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 28 2020 г., 20:43
-- Версия сервера: 10.4.10-MariaDB
-- Версия PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=458 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `from_id`, `to_id`, `body`, `seen`, `date`) VALUES
(1, 74, 79, 'Hi, John', 0, '2020-06-23 11:05:47'),
(2, 79, 74, 'Hi, Artur', 0, '2020-06-23 09:17:47'),
(3, 74, 79, 'How are you?', 0, '2020-06-23 09:18:41'),
(4, 79, 74, 'Fine, thanks, and you?', 0, '2020-06-23 09:19:12'),
(6, 74, 79, 'Me to)', 0, '2020-06-23 19:08:48'),
(450, 80, 74, '1', 0, '2020-06-28 20:25:22'),
(451, 80, 74, '2', 0, '2020-06-28 20:25:33'),
(452, 80, 74, '3', 0, '2020-06-28 20:25:59'),
(453, 80, 74, '4', 0, '2020-06-28 20:26:06'),
(454, 80, 74, '5', 0, '2020-06-28 20:39:13'),
(455, 80, 74, '111', 0, '2020-06-28 20:39:58'),
(456, 80, 74, '222', 0, '2020-06-28 20:40:17'),
(457, 80, 74, '333', 0, '2020-06-28 20:41:35');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `date`) VALUES
(74, 'Artur', 'cerber1993@rambler.ru', '0.041015001592570945.jpg', '698d51a19d8a121ce581499d7b701668', '2020-06-12 11:30:05'),
(79, 'John', 'Crown_92@mail.ru', '0.538439001592813851.jpg', '698d51a19d8a121ce581499d7b701668', '2020-06-13 11:39:13'),
(80, 'Scarlett', 'scarlet@gmail.com', '0.219862001593372315.jpg', '698d51a19d8a121ce581499d7b701668', '2020-06-22 10:40:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
