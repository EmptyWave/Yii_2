-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 08 2019 г., 01:17
-- Версия сервера: 5.6.41
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `frutella`
--

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `responsible_id` int(11) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `name`, `description`, `creator_id`, `responsible_id`, `deadline`, `status_id`, `created`, `modified`) VALUES
(1, 'Знакомство с фреймворком', 'Знакомство с фреймворком', 1, 2, NULL, 1, '2019-04-05 17:36:59', '2019-05-07 09:05:36'),
(2, 'Изучение ORM', 'Изучение ORM', 1, 2, NULL, 1, '2019-05-03 17:36:59', '2019-05-07 09:05:49'),
(3, 'Постичь непостижимое', 'Таск 4', 1, 2, NULL, 1, '2019-03-05 17:36:59', '2019-05-07 21:45:55'),
(5, 'Test task 2', 'Test task 2', 1, 2, '2019-05-31', 1, '2019-03-05 17:36:59', '2019-05-07 21:52:58'),
(6, 'Test task 3', 'Test task 3', 1, 1, '2019-03-31', 1, '2019-05-05 17:36:59', '2019-05-07 21:45:13'),
(8, 'Test task 4', '12344', 1, 1, '2019-05-05', 1, '2019-05-05 17:36:59', NULL),
(16, 'Test task 5', 'Test task 5', 1, 1, '2019-05-05', 1, '2019-03-05 17:36:59', '2019-05-07 21:53:14'),
(18, 'Test task 6', 'Test task 6', 1, 2, '2019-05-25', 1, '2019-05-05 17:36:59', NULL),
(21, 'Test task 7', 'Test task 7', 1, 2, '2019-05-05', 1, '2019-05-05 17:36:59', NULL),
(22, 'Test task 8', 'Test task 8', 1, 2, '2019-05-31', 1, '2019-05-05 17:36:59', NULL),
(23, 'Test task 9', 'Test task 9', 1, 2, '2019-05-05', 1, '2019-04-05 18:02:35', '2019-05-07 09:06:21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_task_statuses` (`status_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_task_statuses` FOREIGN KEY (`status_id`) REFERENCES `task_statuses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
