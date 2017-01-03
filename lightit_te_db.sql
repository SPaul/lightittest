-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 03 2017 г., 23:08
-- Версия сервера: 5.7.13
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lightit_te_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(7) unsigned NOT NULL,
  `parent_id` int(7) unsigned NOT NULL,
  `content` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_type` enum('post','comment') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `parent_id`, `content`, `created`, `parent_type`) VALUES
(1, 7, 'Просто комментарий', '2016-12-21 21:01:38', 'post'),
(2, 7, 'Еще один комментарий к какой-то записи', '2016-12-21 21:15:26', 'post'),
(3, 5, 'Супер-пупер комментарий ;)', '2016-12-21 21:21:10', 'post'),
(4, 1, 'my comment)', '2016-12-28 19:29:37', 'comment'),
(5, 3, 'one more my comment', '2016-12-28 19:46:44', 'comment'),
(6, 5, 'xxx', '2016-12-29 21:45:39', 'comment'),
(7, 6, 'yyy', '2016-12-29 21:53:56', 'comment'),
(8, 7, '2nd comment', '2017-01-03 19:58:58', 'comment'),
(9, 7, '3rd comment', '2017-01-03 20:00:01', 'comment'),
(10, 4, 'comment to "пробная запись"', '2017-01-03 20:01:07', 'post'),
(11, 10, 'comment to comment', '2017-01-03 20:01:29', 'comment'),
(12, 11, 'comment to comment to comment', '2017-01-03 20:06:45', 'comment'),
(13, 9, '4th comment', '2017-01-03 20:07:12', 'comment');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(7) unsigned NOT NULL,
  `content` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `content`, `created`) VALUES
(4, 'Пробная запись', '2016-12-21 19:08:55'),
(3, 'Еще какая-то запись', '2016-12-21 19:08:43'),
(5, 'Ура, наметился прогресс: \nНе зная пауз и простоев, \nИдёт модернизации процесс \nВсего порожнего в пустое!', '2016-12-21 19:09:01'),
(6, 'В любой карьере - есть к чему стремиться, \nНо и законы логики шалят: \nНередко очень прыткая синица \nЛегко взлетает выше журавля!', '2016-12-21 19:32:59'),
(7, 'Заметить можно каждый день - \nБез преувеличения: \nЗа всяким правилом, как тень \nШагают исключения!', '2016-12-21 19:33:24');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(7) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(7) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
