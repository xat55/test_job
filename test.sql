-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 04 2020 г., 21:26
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `name`, `password`) VALUES
(2, 'laven2', 'laven2@ya.ru', 'Sidorov', '$2y$10$ertBktUXhgOlf/4R17AQCOUiE0UDOaRBVow2eFVyDSScaoibaBzSu'),
(5, 'laven1', 'laven1@ya.ru', 'Ivanov', '$2y$10$idvTjnMJ4HbszXAuO/es4eIJKgqAYJofeZJz5j5UGPi1UqE7/ff9O'),
(6, 'laven3', 'laven3@ya.ru', 'Dudin', '$2y$10$rUAwyMgUcgmcZKDHgEFE3u1T3zfvjuU65sLDkedeKKdaknriSs3VS'),
(7, 'laven4', 'laven4@ya.ru', 'Sanin', '$2y$10$xf8xUDu4zCzocA7vs7vTkulvmmDtV/7RW.8tyCdPICOc/dsIYBkB6'),
(8, 'laven5', 'laven5@ya.ru', 'Loskin', '$2y$10$.9hJ0.F5aWQWMzRbWS4BluJyjNyyKWt7J.4VzGwAUyrFk.UTwiW4m'),
(9, 'laven6', 'laven6@ya.ru', 'Kolin', '$2y$10$Ui8ID5mJJGjDjxpn5h81ne8aJBkzGDyag/7hpr07PJSwa3e5h3cKG'),
(10, 'laven7', 'laven7@ya.ru', 'Siskin', '$2y$10$.UJtZmYuDo8H4vwJJ5n9AO528Vs1bc3eHwX6YHJc4ToPxVtJoD.B6'),
(11, 'laven8', 'laven8@ya.ru', 'Duckov', '$2y$10$sjucXqvPRRRNOjOto8c4PO1blesZVqbbl5eyGmUSX7aENvwdzoume');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
