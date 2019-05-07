-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 06 2019 г., 00:09
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
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1555792963),
('m190420_193433_create_task_table', 1555792972),
('m190420_193531_create_users_table', 1555792973),
('m190505_162434_create_task_statuses_table', 1557077819),
('m190505_165135_add_column_to_task_table', 1557077820);

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
(1, 'Знакомство с фреймворком', 'Знакомство с фреймворком', 1, 2, NULL, 1, '2019-05-05 17:36:59', NULL),
(2, 'Изучение ORM', 'Изучение ORM', 1, 2, NULL, 1, '2019-05-05 17:36:59', NULL),
(3, 'Постичь непостижимое', 'Таск 4', 1, 2, NULL, 1, '2019-05-05 17:36:59', NULL),
(5, 'Test task 2', 'Test task 2', 1, 2, '2019-05-31', 1, '2019-05-05 17:36:59', NULL),
(6, 'Test task 3', 'Test task 3', 1, 1, '2019-05-31', 1, '2019-05-05 17:36:59', NULL),
(8, 'Test task 4', '12344', 1, 1, '2019-05-05', 1, '2019-05-05 17:36:59', NULL),
(16, 'Test task 5', 'Test task 5', 1, 1, '2019-05-05', 1, '2019-05-05 17:36:59', NULL),
(18, 'Test task 6', 'Test task 6', 1, 2, '2019-05-25', 1, '2019-05-05 17:36:59', NULL),
(21, 'Test task 7', 'Test task 7', 1, 2, '2019-05-05', 1, '2019-05-05 17:36:59', NULL),
(22, 'Test task 8', 'Test task 8', 1, 2, '2019-05-31', 1, '2019-05-05 17:36:59', NULL),
(23, 'Test task 9', 'Test task 9', 1, 2, '2019-05-05', 1, '0000-00-00 00:00:00', '2019-05-05 18:02:35');

-- --------------------------------------------------------

--
-- Структура таблицы `task_statuses`
--

CREATE TABLE `task_statuses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `task_statuses`
--

INSERT INTO `task_statuses` (`id`, `title`, `description`) VALUES
(1, 'Новая', ''),
(2, 'В работе', ''),
(3, 'Выполнена', ''),
(4, 'Закрыта', ''),
(5, 'Тестирование', ''),
(6, 'На доработке', ''),
(7, 'На модерации', ''),
(8, 'Редактируется', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `passwordHash` varchar(60) NOT NULL,
  `authKey` varchar(255) NOT NULL,
  `accessToken` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `userType_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `passwordHash`, `authKey`, `accessToken`, `email`, `phone`, `userType_id`) VALUES
(1, 'admin', '$2y$13$E5u6.FFZ2XmGhk1GpyarIe.5bzavRH18mASAtGWdZ/rewriqYmtlK', 'test100key', '100-token', 'admin@gmail.com', '+7(999)999-99-99', 9),
(2, 'demo', '$2y$13$teOAILNJrfroJ9zqNKBiKOyVGiY7IH4TyGH5FTktOvKHu/1ZpyRPu', 'test101key', '101-token', 'demo@gmail.com', '+7(999)999-99-98', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_task_statuses` (`status_id`);

--
-- Индексы таблицы `task_statuses`
--
ALTER TABLE `task_statuses`
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
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `task_statuses`
--
ALTER TABLE `task_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
