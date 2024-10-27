-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-5.7
-- Время создания: Окт 27 2024 г., 23:12
-- Версия сервера: 5.7.44
-- Версия PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `football_pl_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Players_table`
--

CREATE TABLE `Players_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goals` int(11) DEFAULT '0',
  `assists` int(11) DEFAULT '0',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Players_table`
--

INSERT INTO `Players_table` (`id`, `name`, `position`, `goals`, `assists`, `img`, `alt`) VALUES
(1, 'Коломейцев Иван', 'Нападающий', 10, 5, 'Коломейцев.jpg', 'Игрок 1'),
(2, 'Садчиков Вячеслав', 'Защитник', 7, 8, 'Садчиков.jpg', 'Игрок 2'),
(3, 'Старовойтов Кирилл', 'Нападающий', 3, 2, 'Старовойтов.jpg', 'Игрок 3'),
(4, 'Ержанов Куаныш', 'Вратарь', 0, 4, 'Ержанов.jpg', 'Игрок 4'),
(5, 'Сумаре Яя', 'Полузащитник', 3, 2, 'Сумаре.jpg', 'Игрок 5'),
(6, 'Масалу Жозеф', 'Полузащитник', 4, 2, 'Масалу.jpg', 'Игрок 6'),
(7, 'Тчиманга Саломон', 'Нападающий', 5, 2, 'Тчиманга.jpg', 'Игрок 7'),
(8, 'Воробьёв Даниил', 'Защитник', 1, 5, 'Воробьёв.jpg', 'Игрок 8'),
(9, 'Шекерханов Тимур', 'Нападающий', 5, 1, 'Шекерханов.jpg', 'Игрок 9');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Players_table`
--
ALTER TABLE `Players_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Players_table`
--
ALTER TABLE `Players_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
