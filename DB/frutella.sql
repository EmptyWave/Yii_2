-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 14 2019 г., 00:11
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
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
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
(3, 'Постичь непостижимое', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eros ipsum, tristique lobortis elementum vel, commodo a magna. In pharetra venenatis ex quis pellentesque. Proin vehicula elementum sapien, et semper elit tempus eu. Sed laoreet orci suscipit velit efficitur, malesuada accumsan felis bibendum. Morbi cursus iaculis lacus et aliquet. Nulla elit magna, mollis vel ipsum et, molestie elementum urna. Praesent enim quam, tincidunt in purus non, maximus sagittis neque. In id ligula nunc. Nullam mollis egestas imperdiet. Vivamus tempus erat id massa consequat porttitor. Fusce id ullamcorper nulla, a sodales odio. Etiam est risus, tempus sed lobortis non, dignissim at nunc. Cras quis sollicitudin lacus.', 1, 2, '2019-06-02', 1, '2019-03-05 17:36:59', '2019-05-08 21:39:59'),
(5, 'Test task 2 (Lorem5)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eros ipsum, tristique lobortis elementum vel, commodo a magna. In pharetra venenatis ex quis pellentesque. Proin vehicula elementum sapien, et semper elit tempus eu. Sed laoreet orci suscipit velit efficitur, malesuada accumsan felis bibendum. Morbi cursus iaculis lacus et aliquet. Nulla elit magna, mollis vel ipsum et, molestie elementum urna. Praesent enim quam, tincidunt in purus non, maximus sagittis neque. In id ligula nunc. Nullam mollis egestas imperdiet. Vivamus tempus erat id massa consequat porttitor. Fusce id ullamcorper nulla, a sodales odio. Etiam est risus, tempus sed lobortis non, dignissim at nunc. Cras quis sollicitudin lacus.\r\n\r\nDonec sed porta risus. Sed eget venenatis ex. Ut ornare massa et ante feugiat, sit amet porttitor tellus finibus. Nam sed tristique mi. Nullam a urna magna. Fusce condimentum luctus suscipit. Nam consequat nunc sit amet dui hendrerit dictum. Cras laoreet felis ac erat malesuada, id pellentesque ex mollis.\r\n\r\nDuis quis ligula et enim scelerisque imperdiet. Sed imperdiet pretium lorem nec luctus. Duis aliquet feugiat fermentum. Praesent ullamcorper ut urna vel fermentum. Nulla rhoncus nisl sed maximus faucibus. Mauris felis est, mollis at leo suscipit, lacinia convallis metus. Donec non dui a mi ultrices maximus at id justo. Ut ut leo vel nisi pellentesque lobortis. Aenean rhoncus est id tempor pellentesque.\r\n\r\nAenean tincidunt, turpis et dignissim venenatis, turpis nisl tempor nunc, quis tincidunt libero massa ac velit. Ut dignissim neque id aliquam convallis. Integer sit amet faucibus lacus, eu egestas eros. Morbi interdum turpis eu turpis vulputate, eget dapibus nulla auctor. Nunc elementum libero elit, eget vehicula ligula placerat sed. Aliquam ultricies a quam vitae feugiat. Suspendisse et accumsan lorem, nec finibus ligula. Nam eget consectetur massa. Sed iaculis venenatis neque, id dapibus nibh rhoncus et. Donec pellentesque, odio quis volutpat dapibus, urna sem eleifend neque, vitae venenatis augue urna vel eros. Donec sed neque augue. In erat lectus, bibendum in euismod quis, cursus eu diam. Curabitur dictum iaculis porta. Suspendisse lobortis ullamcorper risus eget fringilla. Nunc dui orci, iaculis nec lorem at, pretium imperdiet ante. In commodo faucibus felis eget tempor.\r\n\r\nPellentesque sed aliquet quam. Suspendisse laoreet mauris vitae ipsum egestas vestibulum. Nullam eget sodales ipsum, eget tincidunt ipsum. Aenean sed lacus laoreet, porttitor libero vitae, dignissim urna. Maecenas ultrices ipsum libero, non lacinia elit auctor et. Sed in finibus sapien, vitae pretium turpis. Duis sed fermentum nunc, vitae scelerisque lectus.', 1, 2, '2019-05-31', 1, '2019-03-05 17:36:59', '2019-05-08 21:40:51'),
(6, 'Test task 3', 'Test task 3', 1, 1, '2019-03-31', 1, '2019-05-05 17:36:59', '2019-05-07 21:45:13'),
(8, 'Test task 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla luctus turpis non purus vestibulum, porta consequat erat dictum. Sed euismod massa non augue congue commodo. Praesent euismod, magna a consequat egestas, dolor elit laoreet urna, et tristique ', 1, 1, '2019-05-05', 1, '2019-05-05 17:36:59', '2019-05-08 20:59:26'),
(16, 'Test task 5', 'Test task 5', 1, 1, '2019-05-05', 1, '2019-03-05 17:36:59', '2019-05-07 21:53:14'),
(18, 'Test task 6', 'Test task 6', 1, 2, '2019-05-25', 1, '2019-05-05 17:36:59', NULL),
(21, 'Test task 7', 'Test task 7', 1, 2, '2019-05-05', 1, '2019-05-05 17:36:59', NULL),
(22, 'Test task 8', 'Test task 8', 1, 2, '2019-05-31', 1, '2019-05-05 17:36:59', NULL),
(23, 'Test task 9', 'Test task 9', 1, 2, '2019-05-05', 1, '2019-04-05 18:02:35', '2019-05-07 09:06:21');

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
