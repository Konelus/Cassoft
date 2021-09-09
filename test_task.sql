-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 09 2021 г., 18:30
-- Версия сервера: 5.6.38-log
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'Зарегистрированный пользователь', ''),
(2, 'Пользователь имеющий право писать сообщения', '');

-- --------------------------------------------------------

--
-- Структура таблицы `groups_compare`
--

CREATE TABLE `groups_compare` (
  `id` int(11) NOT NULL,
  `groups` int(11) NOT NULL,
  `users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups_compare`
--

INSERT INTO `groups_compare` (`id`, `groups`, `users`) VALUES
(1, 2, 2),
(2, 2, 1),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `title` text NOT NULL,
  `created` datetime NOT NULL,
  `author` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `text`, `title`, `created`, `author`, `recipient`, `section`, `status`) VALUES
(1, 'text123', 'Заголовок 1', '2021-09-05 03:00:00', 3, 1, 4, 0),
(2, 'text321', 'Заголовок 2', '2021-09-06 03:00:00', 2, 1, 6, 1),
(3, 'text321', 'Заголовок 3', '2021-09-06 03:00:00', 2, 1, 8, 1),
(23, 'test123', 'test task', '2021-09-07 21:43:32', 3, 1, 7, 0),
(38, 'Кого я обманываю... все знают, что это развод, так что сразу добавлю в папку спам =(', 'Вы выйграли АВТОМОБИЛЬ!', '2021-09-08 23:50:55', 2, 1, 3, 0),
(39, 'This is the letter', 'the letter', '2021-09-09 13:53:55', 2, 3, 4, 0),
(40, 'houihlj;lk;k;lk', 'the other letter', '2021-09-09 13:54:11', 2, 1, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `color` text NOT NULL,
  `created` datetime NOT NULL,
  `creator` int(11) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sections`
--

INSERT INTO `sections` (`id`, `name`, `color`, `created`, `creator`, `parent`) VALUES
(1, 'Основные', 'brown', '2021-09-06 00:00:00', 1, 0),
(2, 'Оповещения', 'green', '2021-09-06 00:00:00', 1, 0),
(3, 'Спам', 'lightblue', '2021-09-06 00:00:00', 1, 0),
(4, 'по работе', 'grey', '2021-09-06 00:00:00', 1, 1),
(5, 'личные', 'lightgrey', '2021-09-06 00:00:00', 1, 1),
(6, 'форумы', 'pink', '2021-09-06 00:00:00', 1, 2),
(7, 'магазины', 'lightgreen', '2021-09-06 00:00:00', 1, 2),
(8, 'подписки', 'gold', '2021-09-06 00:00:00', 1, 2),
(9, 'Лена из бухгалтерии', 'red', '2021-09-06 00:00:00', 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `fio` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL,
  `notify` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `status`, `fio`, `email`, `phone`, `password`, `notify`) VALUES
(1, 1, 'user 1', 'user1@test_task.org', '+49 1234 5678901', 'user1', 1),
(2, 0, 'user 2', '', '+1111', '123', 0),
(3, 1, 'user 3', '1', '1', '1', 0),
(13, 0, '6', '6', '6', '6', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `groups_compare`
--
ALTER TABLE `groups_compare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups` (`groups`),
  ADD KEY `users` (`users`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sections`
--
ALTER TABLE `sections`
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
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `groups_compare`
--
ALTER TABLE `groups_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
