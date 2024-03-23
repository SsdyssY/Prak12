-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 25 2024 г., 21:48
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Net`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Statements`
--

CREATE TABLE `Statements` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `car_number` varchar(20) NOT NULL,
  `violation_description` text NOT NULL,
  `status` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Statements`
--

INSERT INTO `Statements` (`id`, `user_id`, `car_number`, `violation_description`, `status`) VALUES
(1, 6, '14', 'Авария в центре', 'Рассмотрено'),
(2, 1, '77', 'Превышение должностных полномочий', 'Рассматривается'),
(3, 6, '993', 'Оставил тс на переходе', 'На проверке');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `admin` int DEFAULT '0',
  `tel` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `name`, `surname`, `patronymic`, `admin`, `tel`, `email`, `login`, `password`) VALUES
(1, 'Дмитрий', 'Дк', 'Дк', 1, '777777', 'dk@gmail.com', 'dk', 'dk'),
(6, 'plz', 'plz', 'plz', 0, 'plz', 'plz@gmail.com', 'plz', 'plz');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Statements`
--
ALTER TABLE `Statements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Statements`
--
ALTER TABLE `Statements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Statements`
--
ALTER TABLE `Statements`
  ADD CONSTRAINT `statements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
