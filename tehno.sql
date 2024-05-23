-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 04 2024 г., 12:09
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tehno`
--

-- --------------------------------------------------------

--
-- Структура таблицы `problems`
--

CREATE TABLE `problems` (
  `id` int NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` timestamp NULL DEFAULT NULL,
  `oborud` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `neispravnost` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `opisanie` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fio` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `status` set('в ожидании','в работе','выполнено') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'в ожидании',
  `worker` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `problems`
--

INSERT INTO `problems` (`id`, `date_start`, `date_end`, `oborud`, `neispravnost`, `opisanie`, `fio`, `status`, `worker`) VALUES
(14, '2024-04-04 09:04:07', '2024-04-04 09:04:55', 'ПК', 'поломка', '111', 'Кузьмин Данила Федорович', 'выполнено', 'дядя'),
(15, '2024-04-04 09:04:19', '2024-04-04 09:06:24', 'ПК', '11', '11', 'Кузьмин Данила Федорович', 'выполнено', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `status` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'user2', '7e58d63b60197ceb55a1c487989a3720', 0),
(4, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `problems`
--
ALTER TABLE `problems`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
