-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-5.7
-- Время создания: Окт 27 2024 г., 23:13
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
-- Структура таблицы `Teams_table`
--

CREATE TABLE `Teams_table` (
  `id` int(2) NOT NULL,
  `Команда` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Игры` int(2) NOT NULL,
  `Победы` int(2) NOT NULL,
  `Ничьи` int(2) NOT NULL,
  `Поражения` int(2) NOT NULL,
  `Очки` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Teams_table`
--

INSERT INTO `Teams_table` (`id`, `Команда`, `Игры`, `Победы`, `Ничьи`, `Поражения`, `Очки`) VALUES
(1, 'Авиатор', 18, 16, 0, 2, 48),
(2, 'Гиссар', 18, 14, 2, 2, 44),
(3, 'Urban Team', 18, 12, 2, 4, 38),
(4, 'Беруний', 18, 10, 3, 5, 33),
(5, 'Dolce Vittoria', 18, 8, 1, 9, 25),
(6, 'South-Western Front', 18, 6, 3, 9, 21),
(7, 'Корвусы', 18, 6, 1, 11, 19),
(8, 'Дружба народов', 18, 5, 3, 10, 18),
(9, 'Солнцево парк', 18, 3, 1, 14, 10),
(10, 'ФК Неважно', 18, 7, 0, 5, 21),
(22, 'Огонёк', 0, 0, 0, 0, 0),
(23, 'Ronaldo', 7, 7, 7, 7, 7),
(24, 'Москва', 0, 5, 5, 5, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Teams_table`
--
ALTER TABLE `Teams_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Teams_table`
--
ALTER TABLE `Teams_table`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
