-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 01 2017 г., 14:26
-- Версия сервера: 5.7.16-log
-- Версия PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vp1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Orders`
--

CREATE TABLE `Orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUsers` int(10) UNSIGNED NOT NULL,
  `needChang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callback` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streets` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flat` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floors` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Orders`
--

INSERT INTO `Orders` (`id`, `idUsers`, `needChang`, `callback`, `comments`, `streets`, `house`, `flat`, `floors`, `part`) VALUES
(20, 35, 'Нужна сдача', 'Не перезванивать', 'Доставить до 20:00', 'Зеленая', '16', '221', '5', '0'),
(21, 36, 'Нужна сдача', 'Перезвонить', 'Комментария к заказу нет', 'Садовая', '21', '11', '1', '2'),
(19, 34, 'По карте', 'Перезвонить', 'Позвоните за 30 минут до доставки', 'Карманная', '12', '33', '1', '1'),
(22, 37, 'Нужна сдача', 'Перезвонить', 'Комментария к заказу нет', 'Петровская', '99', '120', '9', '7'),
(23, 36, 'Нужна сдача', 'Перезвонить', 'Комментария к заказу нет', 'Первомайская', '43', '122', '4', '0'),
(24, 37, 'Нужна сдача', 'Перезвонить', 'Комментария к заказу нет', 'Флотская', '12', '2', '1', '33'),
(25, 34, 'Нужна сдача', 'Перезвонить', 'Комментария к заказу нет', 'Шортно-карманная', '22', '87', '12', '1'),
(26, 38, 'По карте', 'Не перезванивать', 'Комментария к заказу нет', 'Правая', '22', '1', '1', '1'),
(27, 39, 'По карте', 'Не перезванивать', 'Доставить', 'Лесная', '12', '3', '3', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `name`, `email`, `phone`) VALUES
(38, 'Мария', 'mariya@me.ru', '+7 (433) 242 43 43'),
(35, 'Виктор', 'victor@trest.ru', '+7 (312) 381 20 93'),
(36, 'Вася', 'vasya@test1.ru', '+7 (237) 148 23 50'),
(37, 'Петя', 'petya@petr.ru', '+7 (989) 875 89 67'),
(34, 'Вассерман', 'Vasserman@test.ru', '+7 (762) 347 23 42'),
(39, 'Дима', 'Dima@mail.ru', '+7 (317) 309 13 91');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
