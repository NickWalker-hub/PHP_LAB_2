-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 18 2023 г., 09:52
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `autoshopcard_4`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `engine_capacity` varchar(255) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `year_of_drop` date DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `brand`, `engine_capacity`, `price`, `year_of_drop`, `description`) VALUES
(2, 'Toyota', '2241 cm2', 4500000, '2023-02-09', 'Хороший Выбор!'),
(3, 'Cadillac', '5342 cm2', 12000000, '2012-04-20', 'Вечная классика'),
(4, 'Запорожец', '4:20 cm2', 20000, '1967-04-25', 'Поддержи отечественного производителя'),
(5, 'Такси максим', '777', 600, '2023-05-31', 'Зато не пешком!'),
(8, 'Тачанка', '00456 dox', 4536345, '2023-05-30', 'МегаХарош'),
(17, '14134134', 'пукпупер', 434, '2023-06-01', '141414134');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_user` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_user`, `id`, `id_order`) VALUES
(33, 2, 32),
(33, 5, 33),
(35, 3, 42),
(35, 8, 43);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `full_name`, `login`, `email`, `password`, `avatar`, `status`) VALUES
(11, 'kkk', 'kkk', 'abrams55@gmail.com', 123, 'uploads/16758263893f0a4121f97ad15f2dd5ad5ad565fd522e02ea4ee1c6a3e313973a22e175a49e.jpg', 1),
(12, 'qqq', 'qqq', 'abrams55@gmail.com', 123, 'uploads/16758313883f0a4121f97ad15f2dd5ad5ad565fd522e02ea4ee1c6a3e313973a22e175a49e.jpg', 0),
(13, 'nick', 'gg', 'abrams55@gmail.com', 123, 'uploads/16759107923f0a4121f97ad15f2dd5ad5ad565fd522e02ea4ee1c6a3e313973a22e175a49e.jpg', 1),
(32, 'sfgvfdg', 'kkk', 'abrams55@gmail.com', 123, 'uploads/1676000153', 0),
(33, 'выа', 'kkk2', 'abrams55@gmail.com', 123, 'uploads/1676000276', 0),
(35, 'ops', 'qqq2', 'abrams55@gmail.com', 123, 'uploads/1676008159', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
