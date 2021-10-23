-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 23 2021 г., 12:19
-- Версия сервера: 5.5.62
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ages`
--

CREATE TABLE `ages` (
  `id` int(11) NOT NULL,
  `age` varchar(50) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ages`
--

INSERT INTO `ages` (`id`, `age`, `text`) VALUES
(1, '1 день', 'родился'),
(2, '14 дней', 'открылись ушки'),
(3, '16 дней', 'открылись глазки'),
(4, '4 недели', 'вас узнает'),
(5, '20 день', 'появляются первые зубки'),
(6, '1 месяц', 'уже ест. резцы и клыки уже есть'),
(7, '45 дней', 'актировка, можно продать'),
(8, '1,5 месяца', 'из щенка в молодняк'),
(9, '2 месяца', ''),
(10, '3 месяца', 'соревнования в классе \"Бэби\"'),
(11, '4 месяца', 'соревнования в классе \"Бэби\"'),
(12, '5 месяцев', 'соревнования в классе \"Бэби\"'),
(13, '6 месяцев ', 'соревнования в классе \"Бэби\"/\"Щенки\"'),
(14, '7 месяцев', 'соревнования в классе \"Щенки\" / первая течка'),
(15, '8 месяцев', 'соревнования в классе \"Щенки\"'),
(16, '9 месяцев', 'соревнования в классе \"Щенки\"/\"Юниоры\"'),
(17, '1 год', 'соревнования в классе \"Юниоры\" КОБЕЛЬ может вязаться/2 течка'),
(18, '1 год 3 месяца', 'соревнования в классе \"Юниоры\"/\"Промежуточный№/\"Открытый\" СУКА вяжется до 7.5 лет'),
(19, '1 год 4 месяца', 'соревнования в классе \"Юниоры\"/\"Промежуточный№/\"Открытый\"'),
(20, '1 год 5 месяцев', 'соревнования в классе \"Юниоры\"/\"Промежуточный№/\"Открытый\"'),
(21, '1 год 6 месяцев', 'соревнования в классе \"Юниоры\"/\"Промежуточный№/\"Открытый\"'),
(22, '1 год 9 месяцев', 'соревнования в классе \"Промежуточный№/\"Открытый\"'),
(23, '1 год 10 месяцев', 'соревнования в классе \"Промежуточный№/\"Открытый\"'),
(24, '2 года', 'соревнования в классе \"Промежуточный№/\"Открытый\"'),
(25, '2 года 1 месяц', 'соревнования в классе \"Открытый\"'),
(26, '2 года 2 месяца', 'соревнования в классе \"Открытый\"'),
(27, '2 года 4 месяца', 'соревнования в классе \"Открытый\"'),
(28, '2 года 6 месяцев ', 'соревнования в классе \"Открытый\"'),
(29, '2 года 8 месяцев', 'соревнования в классе \"Открытый\"'),
(30, '2 года 10 месяцев', 'соревнования в классе \"Открытый\"'),
(31, '3 года', 'соревнования в классе \"Открытый\"'),
(32, '3 года 2 месяца', 'соревнования в классе \"Открытый\"'),
(33, '3 года 4 месяца', 'соревнования в классе \"Открытый\"'),
(34, '3 года 6 месяцев', 'соревнования в классе \"Открытый\"'),
(35, '3 года 8 месяцев', 'соревнования в классе \"Открытый\"'),
(36, '3 года 10 месяцев', 'соревнования в классе \"Открытый\"'),
(37, '4 года', 'соревнования в классе \"Открытый\"'),
(38, '4 года 2 месяца', 'соревнования в классе \"Открытый\"'),
(39, '4 года 4 месяца', 'соревнования в классе \"Открытый\"'),
(40, '4 года 6 месяцев', 'соревнования в классе \"Открытый\"'),
(41, '4 года 8 месяцев', 'соревнования в классе \"Открытый\"'),
(42, '4 года 10 месяцев', 'соревнования в классе \"Открытый\"'),
(43, '5 лет', 'соревнования в классе \"Открытый\"'),
(44, '5 лет 2 месяца', 'соревнования в классе \"Открытый\"'),
(45, '5 лет 4 месяца', 'соревнования в классе \"Открытый\"'),
(46, '5 лет 6 месяцев', 'соревнования в классе \"Открытый\"'),
(47, '5 лет 8 месяцев', 'соревнования в классе \"Открытый\"'),
(48, '5 лет 10 месяцев', 'соревнования в классе \"Открытый\"'),
(49, '6 лет', 'соревнования в классе \"Открытый\"'),
(50, '6 лет 2 месяца', 'соревнования в классе \"Открытый\"'),
(51, '6 лет 4 месяца', 'соревнования в классе \"Открытый\"'),
(52, '6 лет 6 месяцев', 'соревнования в классе \"Открытый\"'),
(53, '6 лет 8 месяцев', 'соревнования в классе \"Открытый\"'),
(54, '6 лет 10 месяцев', 'соревнования в классе \"Открытый\"'),
(55, '7 лет', 'соревнования в классе \"Открытый\"'),
(56, '7 лет 2 месяца', 'соревнования в классе \"Открытый\"'),
(57, '7 лет 4 месяца', 'соревнования в классе \"Открытый\"'),
(58, '7 лет 6 месяцев', 'соревнования в классе \"Открытый\" ЗАКРЫТЫ вязки для суки'),
(59, '7 лет 8 месяцев', 'соревнования в классе \"Открытый\"'),
(60, '7 лет 10 месяцев', 'соревнования в классе \"Открытый\"'),
(61, '8 лет', 'соревнования в классе \"Ветераны\"'),
(62, '8 лет 2 месяца', 'соревнования в классе \"Ветераны\"'),
(63, '8 лет 4 месяца', 'соревнования в классе \"Ветераны\"'),
(64, '8 лет 6 месяцев', 'соревнования в классе \"Ветераны\"'),
(65, '8 лет 8 месяцев', 'соревнования в классе \"Ветераны\"'),
(66, '8 лет 10 месяцев', 'соревнования в классе \"Ветераны\"'),
(67, '9 лет', 'соревнования в классе \"Ветераны\"'),
(68, '9 лет 2 месяца', 'соревнования в классе \"Ветераны\"'),
(69, '9 лет 4 месяца', 'соревнования в классе \"Ветераны\"'),
(70, '9 лет 6 месяцев', 'соревнования в классе \"Ветераны\"'),
(71, '9 лет 8 месяцев', 'соревнования в классе \"Ветераны\"'),
(72, '9 лет 10 месяцев', 'соревнования в классе \"Ветераны\"'),
(73, '10 лет', 'соревнования в классе \"Ветераны\"');

-- --------------------------------------------------------

--
-- Структура таблицы `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'без имени',
  `race` varchar(100) DEFAULT NULL,
  `origin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'происхождение РКФ',
  `breeder` varchar(100) NOT NULL DEFAULT 'Заводчик' COMMENT 'заводчик',
  `owner` varchar(100) NOT NULL DEFAULT 'Владелец' COMMENT 'владелец',
  `kennel` varchar(255) NOT NULL DEFAULT 'Питомник',
  `estrus` int(10) DEFAULT NULL COMMENT 'течка у сук',
  `reg_id` int(11) DEFAULT NULL COMMENT 'ссылка на помет',
  `age_id` int(50) NOT NULL DEFAULT '1' COMMENT 'ссылка на возраст',
  `dna_id` int(11) DEFAULT NULL COMMENT 'ссылка на днк',
  `family_id` int(11) DEFAULT NULL COMMENT 'ссылка на семью',
  `mark_id` int(11) NOT NULL DEFAULT '7' COMMENT 'ссылка на оценку',
  `weight` int(11) DEFAULT NULL COMMENT 'вес собаки',
  `height` int(11) DEFAULT NULL COMMENT 'рост собаки',
  `vitality` int(11) NOT NULL DEFAULT '100',
  `hp` int(11) DEFAULT '100',
  `joy` int(11) NOT NULL DEFAULT '100',
  `birth` varchar(100) NOT NULL DEFAULT '00.00.0000',
  `now` int(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `puppy` int(11) NOT NULL DEFAULT '0',
  `litter` int(11) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL COMMENT 'не работает',
  `url_puppy` varchar(255) DEFAULT NULL COMMENT 'не работает'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `animals`
--

INSERT INTO `animals` (`id`, `name`, `race`, `origin`, `breeder`, `owner`, `kennel`, `estrus`, `reg_id`, `age_id`, `dna_id`, `family_id`, `mark_id`, `weight`, `height`, `vitality`, `hp`, `joy`, `birth`, `now`, `status`, `puppy`, `litter`, `url`, `url_puppy`) VALUES
(1, 'первая Шоко', 'Китайская хохлатая собака', 1, 'nesh', 'nesh', 'Чарующий соблазн', 32, 0, 6, 11, 1, 2, 3830, 25, 100, 1, 4, '15.09.2017', 1380, 1, 2, 2, 'pici/TT/hr1w0f0b0t1m0_01.png', 'pici/puppy/hr1b0_02.png'),
(2, 'Маленькая', 'Китайская хохлатая собака', 1, 'nesh', 'shelter', 'Чарующий соблазн', 24, 0, 22, 12, 2, 2, 3973, 26, 50, 90, 100, '17.09.2017', 0, 1, 3, 3, 'pici/hr1w0f1b0t0m0_04.png', 'pici/puppy/hr1f1_01.png'),
(3, '3шоколадкин', 'Китайская хохлатая собака', 0, 'nesh', 'nesh', 'Чарующий соблазн', 0, 0, 17, 13, 3, 2, 4547, 30, 100, 100, 100, '17.09.2017', 0, 1, 1, 1, 'pici/hr1w0f0b0t0m0_05.png', 'pici/puppy/hr1b0_01.png'),
(4, '4 кобель', 'Китайская хохлатая собака', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 1, 1, 14, 4, 0, 4547, 30, 100, 100, 100, '17.09.2017', 0, 1, 0, 0, 'pici/hrhr/hr0w0f0b0t0m0_01.png', 'pici/puppy/hr0b0_01.png'),
(5, '5он', 'Китайская хохлатая собака', 0, 'nesh', 'nesh', 'Чарующий соблазн', 0, 0, 14, 15, 5, 0, 4547, 30, 30, 90, 10, '17.09.2017', 0, 1, 1, 1, 'pici/hr1w0f0b0t0m0_03.png', 'pici/puppy/hr1b0_02.png'),
(6, 'шестой пух', 'Китайская хохлатая собака', 1, 'nesh', 'shelter', 'Чарующий соблазн', 0, 2, 17, 16, 6, 2, 0, 0, 100, 100, 100, '10.01.2018', 0, 1, 2, 2, 'pici/hrhr/hr0w0f0b0t0m0_04.png', 'pici/puppy/hr0b0_03.png'),
(7, 'Семь', 'Китайская хохлатая собака', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 3, 3, 17, 7, 0, 0, 0, 100, 100, 100, '10.01.2018', 0, 1, 0, 0, 'pici/hr1w0f0b0t0m0_05.png', 'pici/puppy/hr1b0_01.png'),
(8, 'Зяма', 'Китайская хохлатая собака', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 4, 21, 18, 9, 0, 0, 0, 100, 100, 100, '22.11.2018', 0, 1, 0, 0, 'pici/hrhr/hr0w0f0b0t0m0_04.png', 'pici/puppy/hr0b0_03.png'),
(9, 'Новый Мальчик', 'Китайская хохлатая собака', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 0, 18, 19, 10, 2, 0, 0, 100, 100, 100, '28.01.2019', 0, 1, 0, 0, 'pici/hr1w0f1b0t0m0_04.png', 'pici/puppy/hr1f1_03.png'),
(10, 'Десятый мальчик', 'Китайская хохлатая собака', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 3, 1, 20, 7, 0, 0, 0, 100, 100, 100, '10.01.2019', 0, 1, 0, 0, 'pici/hr1w1f1b0t0m0_01.png', 'pici/puppy/hr1b0_02.png'),
(11, '11 девочка (21)', 'Китайская хохлатая собака', 1, 'nesh', 'shelter', 'Чарующий соблазн', 22, 0, 20, 21, 1, 1, 3973, 26, 100, 90, 100, '17.09.2020', 0, 1, 3, 3, 'pici/hr1w0f1b0t0m0_01.png', 'pici/puppy/hr1f1_03.png'),
(12, 'Беленькая', 'КХС', 1, 'Бесты-первый лучший', 'Заводчик', 'Пушистики', 14, 0, 10, 27, 12, 1, 0, 0, 10, 50, 99, '00.00.0000', 0, 1, 0, 0, 'pici/hrhr/hr0w1f0b1t0m0_02.png', 'pici/puppy/hr0w1_01.png'),
(13, 'Без имени', 'КХС', 1, 'не известен', 'Черныши', 'Черныши - Блек Джек', 0, 0, 1, 0, 0, 0, 0, 0, 100, 100, 100, '00.00.0000', 0, 1, 0, 0, '', ''),
(14, 'Без имени', 'КХС', 1, 'Бесты-первый лучший', 'кто-то', 'Голубые бантики', 14, 0, 10, 32, 14, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0, '', ''),
(15, 'Без имени', 'КХС', 0, 'Бесты-первый лучший', 'кто-то', 'Голубые бантики', 0, 0, 10, 33, 14, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0, '', ''),
(16, 'Черная вдова', 'КХС', 1, 'Бесты-первый лучший', 'Елена', 'Лучики', 15, 0, 14, 34, 15, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0, 'pici/hrhr/hr0w0f0b1t0m0_02.png', 'pici/puppy/hr0b1_03.png'),
(17, 'Рыжий бес', 'КХС', 0, 'Бесты-первый лучший', 'Елена', 'Лучики', 0, 0, 10, 35, 15, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0, 'pici/hrhr/hr0w0f1b1t0m0_03.png', 'pici/puppy/hr0f1_01.png'),
(18, 'Без имени', 'КХС', 1, 'Бесты-первый лучший', 'Ольга Тимофеева', 'Звездочки', 6, 0, 10, 36, 16, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0, 'pici/TT/hr1w0f0b0t1m0_04.png', 'pici/puppy/hr1w1_02.png'),
(19, 'Без имени', 'КХС', 0, 'Бесты-первый лучший', 'Ольга Тимофеева', 'Звездочки', 0, 0, 14, 37, 17, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0, 'pici/MM/hr1w0f0b0t0m1_03.png', 'pici/puppy/hr1b0_01.png'),
(20, 'Рыжа', 'КХС', 1, 'Бесты-первый лучший', 'Дима', 'Чашка', 17, 0, 17, 38, 18, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0, '', ''),
(21, 'Белый кролик', 'КХС', 0, 'Бесты-первый лучший', 'shelter', 'Чашка', 15, 0, 13, 39, 19, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0, 'pici/hrhr/hr0w1f0b0t0m0_01.png', 'pici/puppy/hr0w1_01.png'),
(22, 'Мутация', 'КХС', 1, 'Бесты-первый лучший', 'Заводчик', 'Пушистики', 15, 0, 13, 44, 20, 1, 0, 0, 100, 100, 100, '27.03.2021', 0, 1, 0, 0, '', ''),
(23, 'БежЖенький', 'КХС', 1, 'Бесты-первый лучший', 'Заводчик', 'Пушистики', 0, 0, 13, 45, 21, 1, 0, 0, 100, 100, 100, '28.03.2021', 0, 1, 0, 0, '', ''),
(24, 'Верный', 'КХС', 1, 'Бесты-первый лучший', 'Заводчик', 'Пушистики', 0, 0, 13, 46, 22, 1, 0, 0, 100, 100, 100, '28.03.2021', 0, 1, 0, 0, '', ''),
(25, 'Адельеф', 'КХС', 1, 'Бесты-первый лучший', 'Заводчик', 'Пушистики', 0, 0, 13, 47, 23, 1, 0, 0, 100, 100, 100, '28.03.2021', 0, 1, 0, 0, '', ''),
(26, 'Белый кролик', 'КХС', 1, 'Бесты-первый лучший', 'nesh', 'Чарующий соблазн', 15, 0, 13, 48, 24, 1, 0, 0, 100, 100, 100, '10.05.2021', 0, 1, 0, 0, '', ''),
(27, 'Пятныш', 'КХС', 1, 'Бесты-первый лучший', 'nesh', 'Чарующий соблазн', 0, 0, 13, 49, 25, 1, 0, 0, 100, 100, 100, '10.05.2021', 0, 1, 0, 0, '', ''),
(28, 'Чернуха', 'КХС', 1, 'Бесты-первый лучший', 'Заводчик', 'Пушистики', 3, 0, 13, 50, 26, 1, 0, 0, 100, 100, 100, '29.05.2021', 0, 1, 0, 0, '', ''),
(29, 'Красавчик29', 'КХС', 1, 'Бесты-первый лучший', 'Дима', 'Чашка', 0, 0, 19, 51, 27, 1, 0, 0, 100, 100, 100, '11.06.2021', 0, 1, 0, 0, '', ''),
(30, 'Богатырь-30', 'КХС', 1, 'Бесты-первый лучший', 'Дима', 'Чашка', 0, 0, 17, 52, 28, 1, 0, 0, 100, 100, 100, '12.06.2021', 0, 1, 0, 0, '', ''),
(31, '31Белек', 'КХС', 1, 'Бесты-первый лучший', 'Дима', 'Чашка', 0, 0, 13, 53, 29, 1, 0, 0, 100, 100, 100, '14.06.2021', 0, 1, 0, 0, '', ''),
(32, '32Милашка', 'КХС', 1, 'Бесты-первый лучший', 'Дима', 'Чашка', 15, 0, 13, 54, 30, 1, 0, 0, 100, 100, 100, '24.06.2021', 0, 1, 0, 0, '', ''),
(33, '33ШоккингБой', 'КХС', 1, 'Бесты-первый лучший', 'Дима', 'Чашка', 0, 0, 13, 56, 31, 1, 0, 0, 100, 100, 100, '24.06.2021', 0, 1, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id` int(11) UNSIGNED NOT NULL,
  `dogs` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `dogs`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `characteristics`
--

CREATE TABLE `characteristics` (
  `id` int(11) NOT NULL,
  `dog_id` int(11) NOT NULL,
  `charact_ru` varchar(100) NOT NULL COMMENT 'характеристика',
  `charact_en` varchar(100) NOT NULL COMMENT 'характер англ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `characteristics`
--

INSERT INTO `characteristics` (`id`, `dog_id`, `charact_ru`, `charact_en`) VALUES
(1, 0, 'веселый', 'happy'),
(2, 0, 'обжора', 'gluttonous'),
(3, 0, 'ласковый', 'tender'),
(4, 0, 'лежебока', 'lazy');

-- --------------------------------------------------------

--
-- Структура таблицы `dnaagt`
--

CREATE TABLE `dnaagt` (
  `id` int(11) NOT NULL COMMENT 'индекс',
  `a` varchar(4) NOT NULL COMMENT 'Локус А',
  `b` varchar(4) NOT NULL COMMENT 'Локус B',
  `c` varchar(4) NOT NULL COMMENT 'Локус C',
  `d` varchar(4) NOT NULL COMMENT 'Локус D',
  `p` varchar(4) NOT NULL COMMENT 'Локус P',
  `m` varchar(4) NOT NULL COMMENT 'Локус M',
  `t` varchar(4) NOT NULL COMMENT 'Локус T',
  `sex` varchar(2) NOT NULL COMMENT 'пол 0сука 1 кобель'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dnaagt`
--

INSERT INTO `dnaagt` (`id`, `a`, `b`, `c`, `d`, `p`, `m`, `t`, `sex`) VALUES
(1, 'Aa', 'Bb', 'CC', 'Dd', 'pp', 'mm', 'tt', '0'),
(2, 'Aa', 'bb', 'CC', 'Dd', 'pp', 'mm', 'tt', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `family`
--

CREATE TABLE `family` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mum` int(11) DEFAULT '0',
  `dad` int(11) NOT NULL DEFAULT '0',
  `g1dad` int(11) NOT NULL DEFAULT '0',
  `g1mum` int(11) NOT NULL DEFAULT '0',
  `g0dad` int(11) NOT NULL DEFAULT '0',
  `g0mum` int(11) NOT NULL DEFAULT '0',
  `gg1dad1` int(11) NOT NULL DEFAULT '0',
  `gg1mum2` int(11) NOT NULL DEFAULT '0',
  `gg1dad3` int(11) NOT NULL DEFAULT '0',
  `gg1mum4` int(11) NOT NULL DEFAULT '0',
  `gg0dad1` int(11) NOT NULL DEFAULT '0',
  `gg0mum2` int(11) NOT NULL DEFAULT '0',
  `gg0dad3` int(11) NOT NULL DEFAULT '0',
  `gg0mum4` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `family`
--

INSERT INTO `family` (`id`, `mum`, `dad`, `g1dad`, `g1mum`, `g0dad`, `g0mum`, `gg1dad1`, `gg1mum2`, `gg1dad3`, `gg1mum4`, `gg0dad1`, `gg0mum2`, `gg0dad3`, `gg0mum4`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 2, 6, 5, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 1, 6, 5, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 2, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `female`
--

CREATE TABLE `female` (
  `wt` int(11) NOT NULL DEFAULT '3830' COMMENT 'вес суки',
  `ht` int(11) NOT NULL DEFAULT '35' COMMENT 'рост суки'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `female`
--

INSERT INTO `female` (`wt`, `ht`) VALUES
(3544, 23),
(3687, 24),
(3830, 25),
(3973, 26),
(4116, 27),
(4259, 28),
(4402, 29),
(4545, 30);

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `icons` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `icons`) VALUES
(1, 'coins', '/pici/coins_mini.png'),
(2, 'logo', '/Pici/logo_mini.png'),
(3, 'food', '/Pici/food_mini.png'),
(4, 'water', '/Pici/water.png'),
(5, 'badd', '/Pici/badd_mini.png\r\n'),
(6, 'comp', '/Pici/comp.png'),
(7, 'walk', '/Pici/walk.png'),
(8, 'zzz', '/Pici/zzz.png'),
(9, 'up', '/Pici/up.png');

-- --------------------------------------------------------

--
-- Структура таблицы `kennels`
--

CREATE TABLE `kennels` (
  `id` int(11) NOT NULL,
  `name_k` varchar(20) NOT NULL,
  `owner_k` varchar(155) NOT NULL,
  `date` varchar(100) NOT NULL DEFAULT '00.00.0000',
  `dogs` int(11) NOT NULL,
  `l_litter` varchar(11) NOT NULL,
  `email` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `kennels`
--

INSERT INTO `kennels` (`id`, `name_k`, `owner_k`, `date`, `dogs`, `l_litter`, `email`) VALUES
(1, 'Бесты-первый лучший', 'Бесты-первый лучший', '01.01.2001', 2000, '', NULL),
(29, 'Чарующий соблазн', 'nesh', '02.09.2017', 10, 'E', 'stepanova@mail.ru'),
(30, 'Тестики', 'test', '03.09.2017', 2, 'A', 'test@test'),
(31, 'НовыйПитомник', 'новый заводчик', '18.11.2020', 2, '', 'test@test2.ru'),
(32, 'Пушистики', 'Заводчик', '19.11.2020', 6, '', 'test1@test.ru'),
(33, 'Черныши - Блек Джек', 'Черныши', '19.11.2020', 2, '', 'black@jack.ru'),
(34, 'Голубые бантики', 'кто-то', '22.11.2020', 2, '', 'blue@gfh.tu'),
(35, 'Лучики', 'Елена', '22.11.2020', 2, '', 'Lena43@gmail.com'),
(36, 'Звездочки', 'Ольга Тимофеева', '22.11.2020', 2, '', 'o.timka@yandex.ru'),
(37, 'Чашка', 'Дима', '22.11.2020', 6, '', 'da/steapnoav@gdjn.com');

-- --------------------------------------------------------

--
-- Структура таблицы `litters`
--

CREATE TABLE `litters` (
  `id` int(11) NOT NULL,
  `litters` varchar(25) NOT NULL,
  `date` date NOT NULL COMMENT 'дата вязки',
  `stigma` varchar(25) NOT NULL COMMENT 'буква помета',
  `inspecttt` int(11) NOT NULL COMMENT 'осмотренно',
  `cull` int(11) NOT NULL COMMENT 'отбраковано',
  `reexamination` int(11) NOT NULL COMMENT 'пересмотрт',
  `mum` int(11) NOT NULL COMMENT 'мать',
  `dad` int(11) NOT NULL COMMENT 'отец',
  `puppy1` int(11) NOT NULL,
  `puppy2` int(11) NOT NULL,
  `puppy3` int(11) NOT NULL,
  `puppy4` int(11) NOT NULL,
  `puppy5` int(11) NOT NULL,
  `puppy6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `male`
--

CREATE TABLE `male` (
  `wt` int(11) NOT NULL DEFAULT '4547' COMMENT 'вес кобеля',
  `ht` int(11) NOT NULL DEFAULT '30' COMMENT 'рост кобеля'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `male`
--

INSERT INTO `male` (`wt`, `ht`) VALUES
(4245, 28),
(4396, 29),
(4547, 30),
(4698, 31),
(4849, 32),
(5000, 33);

-- --------------------------------------------------------

--
-- Структура таблицы `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `mark` varchar(35) NOT NULL,
  `namerus` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `marks`
--

INSERT INTO `marks` (`id`, `mark`, `namerus`) VALUES
(1, 'excellent', 'отлично '),
(2, 'very good', 'очень хорошо'),
(3, 'good', 'хорошо'),
(4, 'satisfactory', 'удовлетворительно '),
(5, 'out of the ring', 'снят с ринга '),
(6, 'disqualification', 'дисквалифицирующий порок '),
(7, 'No Rang', 'нет оценки');

-- --------------------------------------------------------

--
-- Структура таблицы `owneritems`
--

CREATE TABLE `owneritems` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `count` int(20) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `owneritems`
--

INSERT INTO `owneritems` (`id`, `owner_id`, `item_id`, `count`) VALUES
(1, 1, 1, 30760),
(2, 9, 1, 35000),
(3, 4, 1, 150000);

-- --------------------------------------------------------

--
-- Структура таблицы `races`
--

CREATE TABLE `races` (
  `id` int(20) NOT NULL,
  `name_race` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `races`
--

INSERT INTO `races` (`id`, `name_race`) VALUES
(0, 'АГТ'),
(4, 'дог'),
(1, 'КХС'),
(3, 'пудель'),
(2, 'шпиц');

-- --------------------------------------------------------

--
-- Структура таблицы `randodna`
--

CREATE TABLE `randodna` (
  `id` int(11) NOT NULL,
  `hr` varchar(4) DEFAULT NULL COMMENT 'гол/пух',
  `ww` varchar(3) DEFAULT NULL COMMENT 'белый',
  `ff` varchar(3) DEFAULT NULL COMMENT 'рыжий',
  `bb` varchar(3) DEFAULT NULL COMMENT 'черн/шоко',
  `tt` varchar(3) DEFAULT NULL COMMENT 'крап',
  `mm` varchar(3) DEFAULT NULL COMMENT 'пятна',
  `sex` varchar(10) NOT NULL COMMENT '0-сука/1-кобель',
  `lucky` int(11) NOT NULL COMMENT 'удача',
  `spd` float NOT NULL COMMENT 'скорость',
  `agl` float NOT NULL COMMENT 'уворот',
  `tch` float NOT NULL COMMENT 'обучение',
  `jmp` float NOT NULL COMMENT 'прыжки',
  `nuh` float NOT NULL COMMENT 'обоняние',
  `fnd` float NOT NULL COMMENT 'поиск',
  `mut` int(11) NOT NULL COMMENT 'мутации',
  `dna` varchar(255) NOT NULL COMMENT 'генетический код',
  `about` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL COMMENT 'ссылка на собаку',
  `url_puppy` varchar(255) NOT NULL COMMENT 'ссылка на щенка'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `randodna`
--

INSERT INTO `randodna` (`id`, `hr`, `ww`, `ff`, `bb`, `tt`, `mm`, `sex`, `lucky`, `spd`, `agl`, `tch`, `jmp`, `nuh`, `fnd`, `mut`, `dna`, `about`, `url`, `url_puppy`) VALUES
(1, 'hrhr', 'ww', 'ff', 'bb', 'Tt', 'mm', '0', 20, 9, 9, 11, 9, 11, 11, 47, 'hr0w0f0b0t1m0', 'start', '', ''),
(2, 'hrhr', 'ww', 'Ff', 'bb', 'tt', 'mm', '1', 48, 11, 11, 10, 10, 11, 10, 43, 'hr0w0f1b0t0m0', 'start', '', ''),
(3, 'hrhr', 'ww', 'ff', 'Bb', 'Tt', 'mm', '1', 80, 11, 9, 9, 10, 11, 10, 94, 'hr0w0f0b1t1m1', 'shop', 'pici/hrhr/hr0w0f0b1t0m1_04.png', 'pici/puppy/hr0b1_02.png'),
(4, 'Hrhr', 'ww', 'ff', 'bb', 'tt', 'mm', '0', 6, 11, 9, 11, 10, 9, 9, 78, 'hr0w1f0b1t0m1', 'shop', 'pici/hrhr/hr0w1f0b1t0m0_03.png', 'pici/puppy/hr0w1_02.png'),
(5, 'hrhr', 'ww', 'Ff', 'bb', 'Tt', 'mm', '0', 65, 9, 9, 10, 10, 10, 11, 52, 'hr0w0f1b1t1m1', 'shop', 'pici/hrhr/hr0w0f1b0t0m1_05.png', 'pici/puppy/hr0f1_04.png'),
(6, 'hrhr', 'Ww', 'ff', 'bb', 'tt', 'mm', '0', 43, 10, 11, 10, 9, 11, 10, 47, 'hr0w1f0b0t0m0', 'shop', '', ''),
(7, '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(8, '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(9, '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(10, '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(11, 'Hrhr', 'ww', 'ff', 'bb', 'Tt', 'mm', '0', 12, 10, 10, 9, 9, 9, 11, 0, 'hr1w1f0b0t1m0', 'owner', 'pici/TT/hr1w0f0b0t1m0_01.png', 'pici/puppy/hr1b0_02.png'),
(12, 'Hrhr', 'ww', 'Ff', 'bb', 'tt', 'mm', '0', 13, 11, 11, 11, 9, 9, 8, 0, 'hr1w0f1b0t0m0', 'shelter', 'pici/hr1w0f1b0t0m0_04.png', 'pici/puppy/hr1f1_01.png'),
(13, 'Hrhr', 'ww', 'ff', 'bb', 'tt', 'mm', '1', 15, 11, 11, 11, 11, 11, 9, 0, 'hr1w0f0b0t0m0', 'owner', 'pici/hr1w0f0b0t0m0_05.png', 'pici/puppy/hr1b0_01.png'),
(14, 'hrhr', 'ww', 'ff', 'bb', 'tt', 'mm', '1', 12, 11.6, 11.6, 11.6, 9.05, 10.6, 9.05, 1, 'hr0w0f0b0t0m0', 'owner', 'pici/hrhr/hr0w0f0b0t0m0_01.png', 'pici/puppy/hr0b0_01.png'),
(15, 'Hrhr', 'ww', 'ff', 'bb', 'tt', 'mm', '1', 75, 10, 9, 11, 11, 11, 10, 0, 'hr1w0f0b0t0m0', 'owner', 'pici/hr1w0f0b0t0m0_03.png', 'pici/puppy/hr1b0_02.png'),
(16, 'hrhr', 'ww', 'ff', 'bb', 'tt', 'mm', '1', 27, 10.55, 10.05, 11.05, 10.05, 10.55, 9.55, 0, 'hr0w0f0b0t0m0', 'shelter', 'pici/hrhr/hr0w0f0b0t0m0_04.png', 'pici/puppy/hr0b0_03.png'),
(17, 'Hrhr', 'ww', 'ff', 'bb', 'tt', 'mm', '1', 13, 10.87, 10.62, 11.12, 9.61, 10.37, 9.36, 1, 'hr1w0f0b0t0m0', 'owner', 'pici/hr1w0f0b0t0m0_05.png', 'pici/puppy/hr1b0_01.png'),
(18, 'hrhr', 'ww', 'ff', 'bb', 'Tt', 'mm', '1', 74, 10.25, 10, 10, 9.5, 9.75, 10.25, 0, 'hr0w0f0b0t1m0', 'owner', 'pici/hrhr/hr0w0f0b0t0m0_04.png', 'pici/puppy/hr0b0_03.png'),
(19, 'Hrhr', 'ww', 'Ff', 'bb', 'tt', 'mm', '1', 97, 10.42, 9.92, 10.91, 9.92, 9.92, 8.93, 1, 'hr1w0f1b0t0m0', 'owner', 'pici/hr1w0f1b0t0m0_04.png', 'pici/puppy/hr1f1_03.png'),
(20, 'Hrhr', 'Ww', 'Ff', 'bb', 'tt', 'mm', '1', 97, 10.42, 12, 10.91, 9.92, 9.92, 8.93, 1, 'hr1w1f1b0t0m0', 'owner', 'pici/hr1w1f1b0t0m0_01.png', 'pici/puppy/hr1b0_02.png'),
(21, 'hrhr', 'ww', 'ff', 'bb', 'Tt', 'mm', '0', 74, 10.25, 10, 10, 9.5, 12, 12, 0, 'hr0w0f0b0t1m0', 'shelter', 'pici/hr1w0f1b0t0m0_01.png', 'pici/puppy/hr1f1_03.png'),
(22, 'Hrhr', 'ww', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(23, 'hrhr', 'ww', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(24, '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', ''),
(25, 'Hrhr', 'ww', 'ff', 'Bb', 'Tt', 'mm', '0', 39, 11, 10, 11, 9, 9, 10, 86, 'hr1w0f0b1t1m0', 'start', '', ''),
(26, 'hrhr', 'ww', 'ff', 'bb', 'tt', 'Mm', '1', 71, 9, 9, 10, 10, 11, 11, 100, 'hr0w0f0b0t0m1', 'start', '', ''),
(27, 'hrhr', 'Ww', 'ff', 'Bb', 'tt', 'Mm', '0', 90, 10, 9, 9, 10, 11, 9, 21, 'hr0w1f0b1t0m1', 'start', 'pici/hrhr/hr0w1f0b1t0m0_02.png', 'pici/puppy/hr0b0_03.png'),
(28, 'Hrhr', 'ww', 'Ff', 'Bb', 'tt', 'mm', '0', 71, 11, 11, 10, 11, 10, 10, 63, 'hr1w0f1b1t0m0', 'start', '', ''),
(29, 'Hrhr', 'ww', 'Ff', 'Bb', 'tt', 'mm', '0', 71, 11, 11, 10, 11, 10, 10, 63, 'hr1w0f1b1t0m0', 'start', '', ''),
(30, 'hrhr', 'Ww', 'ff', 'bb', 'tt', 'Mm', '0', 69, 10, 11, 9, 9, 10, 11, 86, 'hr0w1f0b0t0m1', 'start', '', ''),
(31, 'Hrhr', 'ww', 'Ff', 'bb', 'Tt', 'mm', '1', 97, 9, 11, 11, 10, 11, 11, 63, 'hr1w0f1b0t1m0', 'start', '', ''),
(32, 'Hrhr', 'ww', 'ff', 'bb', 'tt', 'Mm', '0', 77, 9, 10, 9, 9, 9, 11, 22, 'hr1w0f0b0t0m1', 'start', 'pici/hr1w0f0b0t0m1_01.png', 'pici/puppy/hr1b0_03.png'),
(33, 'hrhr', 'ww', 'ff', 'bb', 'Tt', 'Mm', '1', 94, 10, 11, 11, 9, 10, 11, 40, 'hr1w0f0b0t1m0', 'start', 'pici/TT/hr1w0f0b0t1m0_05.png', 'pici/puppy/hr1b0_04.png'),
(34, 'hrhr', 'ww', 'ff', 'Bb', 'tt', 'mm', '0', 2, 9, 10, 9, 11, 11, 9, 33, 'hr0w0f0b1t0m0', 'start', 'pici/hrhr/hr0w0f0b1t0m0_02.png', 'pici/puppy/hr0b1_03.png'),
(35, 'hrhr', 'ww', 'Ff', 'Bb', 'tt', 'mm', '1', 46, 9, 11, 9, 11, 11, 9, 60, 'hr0w0f1b1t0m0', 'start', 'pici/hrhr/hr0w0f1b1t0m0_03.png', 'pici/puppy/hr0f1_01.png'),
(36, 'Hrhr', 'Ww', 'ff', 'bb', 'Tt', 'mm', '0', 92, 10, 9, 11, 10, 9, 10, 28, 'hr1w1f0b0t1m0', 'start', 'pici/TT/hr1w0f0b0t1m0_04.png', 'pici/puppy/hr1w1_02.png'),
(37, 'Hrhr', 'ww', 'ff', 'bb', 'tt', 'Mm', '1', 49, 10, 10, 10, 11, 11, 9, 45, 'hr1w0f0b0t0m1', 'start', 'pici/MM/hr1w0f0b0t0m1_03.png', 'pici/puppy/hr1b0_01.png'),
(38, 'hrhr', 'ww', 'Ff', 'bb', 'Tt', 'Mm', '0', 48, 10, 9, 10, 11, 10, 9, 98, 'hr0w0f1b0t1m1', 'start', 'pici/hrhr/hr0w0f1b0t0m0_03.png', 'pici/puppy/hr0f1_02.png'),
(39, 'hrhr', 'Ww', 'ff', 'bb', 'tt', 'Mm', '1', 98, 11, 10, 11, 10, 9, 10, 95, 'hr0w1f0b0t0m1', 'shelter', 'pici/hrhr/hr0w1f0b0t0m0_03.png', 'pici/puppy/hr0w1_03.png'),
(40, 'Hrhr', 'ww', 'ff', 'bb', 'tt', 'mm', '0', 21, 11, 11, 10, 10, 9, 10, 4, 'hr1w0f0b0t0m0', 'shop', '', ''),
(41, 'hrhr', 'Ww', 'ff', 'bb', 'Tt', 'mm', '1', 75, 10, 9, 10, 11, 11, 9, 74, 'hr0w1f0b0t1m0', 'shop', '', ''),
(42, 'Hrhr', 'Ww', 'ff', 'bb', 'tt', 'Mm', '1', 82, 11, 11, 11, 9, 10, 10, 10, 'hr1w1f0b0t0m1', 'shop', '', ''),
(43, '', '', '', '', '', '', '1', 40, 11, 11, 9, 9, 11, 11, 49, 'hr0w1f1b0t1m0', 'shop', '', ''),
(44, '', '', '', '', '', '', '0', 12, 10, 10, 10, 9, 11, 10, 10, 'hr1w1f0b0t0m0', 'owner', 'pici/hr1w1f0b0t0m0_03.png', 'pici/puppy/hr1w1_04.png'),
(45, '', '', '', '', '', '', '1', 70, 11, 10, 9, 10, 9, 10, 69, 'hr0w0f1b1t0m0', 'owner', 'pici/hrhr/hr0w0f1b0t0m0_05.png', 'pici/puppy/hr0f1_03.png'),
(46, '', '', '', '', '', '', '1', 37, 11, 11, 9, 11, 10, 9, 32, 'hr0w0f0b0t1m1', 'owner', 'pici/hrhr/hr0w0f0b0t0m1_04.png', 'pici/puppy/hr0b0_01.png'),
(47, '', '', '', '', '', '', '1', 59, 9, 10, 9, 11, 9, 9, 63, 'hr1w0f1b0t1m1', 'owner', 'pici/TM/hr1w0f0b0t1m1_02.png', 'pici/puppy/hr1w1_03.png'),
(48, '', '', '', '', '', '', '0', 43, 9, 10, 11, 9, 9, 11, 41, 'hr0w0f0b1t0m1', 'owner', 'pici/hrhr/hr0w0f0b1t0m1_03.png', 'pici/puppy/hr0b1_01.png'),
(49, '', '', '', '', '', '', '1', 17, 11, 11, 11, 11, 10, 10, 82, 'hr1w0f1b1t0m1', 'owner', 'pici/MM/hr1w0f1b1t0m1_03.png', 'pici/puppy/hr1f1_03.png'),
(50, '', '', '', '', '', '', '0', 81, 9, 9, 10, 10, 11, 9, 48, 'hr1w0f0b1t0m1', 'owner', 'pici/MM/hr1w0f0b1t0m1_02.png', 'pici/puppy/hr1b1_03.png'),
(51, '', '', '', '', '', '', '1', 3, 11, 10, 11, 9, 10, 11, 29, 'hr1w1f0b1t1m0', 'owner', 'pici/TT/hr1w0f0b1t1m0_03.png', 'pici/puppy/hr1w1_04.png'),
(52, '', '', '', '', '', '', '1', 16, 10, 9, 9, 9, 11, 11, 11, 'hr1w1f0b0t1m1', 'owner', 'pici/TM/hr1w0f0b0t1m1_01.png', 'pici/puppy/hr1w1_02.png'),
(53, '', '', '', '', '', '', '1', 92, 11, 11, 9, 11, 10, 11, 93, 'hr0w1f0b0t1m1', 'owner', 'pici/hrhr/hr0w1f0b0t0m0_05.png', 'pici/puppy/hr0w1_03.png'),
(54, '', '', '', '', '', '', '0', 42, 10, 10, 11, 9, 10, 9, 75, 'hr1w0f1b0t0m0', 'owner', 'pici/hr1w0f1b0t0m0_02.png', 'pici/puppy/hr1f1_03.png'),
(55, NULL, NULL, NULL, NULL, NULL, NULL, '0', 48, 9, 9, 9, 10, 10, 11, 63, 'hr1w1f0b0t1m0', 'owner', 'pici/TT/hr1w0f0b0t1m0_02.png', 'pici/puppy/hr1w1_01.png'),
(56, NULL, NULL, NULL, NULL, NULL, NULL, '1', 80, 11, 9, 9, 10, 11, 10, 94, 'hr0w0f0b1t1m1', 'owner', 'pici/hrhr/hr0w0f0b1t0m1_04.png', 'pici/puppy/hr0b1_02.png');

-- --------------------------------------------------------

--
-- Структура таблицы `registry`
--

CREATE TABLE `registry` (
  `id` int(11) NOT NULL,
  `lit` varchar(5) NOT NULL COMMENT 'Буква помета',
  `date` date NOT NULL COMMENT 'дата вязки',
  `mum` int(11) NOT NULL COMMENT 'id мамы',
  `dad` int(11) NOT NULL COMMENT 'id папы',
  `datebirth` varchar(10) NOT NULL COMMENT 'сколько носила 55-70',
  `count` int(11) NOT NULL DEFAULT '1' COMMENT 'родилось',
  `count45` int(11) NOT NULL COMMENT 'выращено до 45 дней',
  `female` int(11) NOT NULL COMMENT 'кол-во сук',
  `male` int(11) NOT NULL COMMENT 'кол-во кобелей',
  `tatoo` int(11) NOT NULL COMMENT '№ клейма'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `registry`
--

INSERT INTO `registry` (`id`, `lit`, `date`, `mum`, `dad`, `datebirth`, `count`, `count45`, `female`, `male`, `tatoo`) VALUES
(1, 'a', '2017-09-17', 2, 3, '55', 1, 1, 0, 1, 0),
(2, 'b', '2018-01-10', 1, 5, '60', 1, 1, 0, 1, 0),
(3, 'c', '2018-01-07', 2, 6, '55', 1, 1, 0, 1, 0),
(4, 'd', '2018-11-22', 1, 6, '57', 1, 1, 0, 1, 0),
(5, 'e', '0000-00-00', 1, 5, '67', 2, 2, 0, 2, 0),
(6, 'f', '2019-04-28', 1, 5, '57', 3, 3, 2, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `pole1` varchar(255) NOT NULL,
  `pole2` int(11) NOT NULL,
  `pole3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `pole1`, `pole2`, `pole3`) VALUES
(1, 'test tekst', 12, 33),
(4, 'test tekst4', 22, 44),
(5, 'test tekst', 12, 33),
(6, 'test tekst', 12, 33),
(7, 'test tekst', 12, 33),
(8, 'test tekst4', 22, 44);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kennel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '00.00.0000',
  `l_time` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '00.00.0000',
  `online` tinyint(1) DEFAULT NULL,
  `sign` int(6) NOT NULL,
  `visits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `kennel`, `f_time`, `l_time`, `online`, `sign`, `visits`) VALUES
(1, 'nesh', 'stepanova@mail.ru', '$2y$10$pinvDspcODn0zxHMfyEUoufayxxNfwrQoqHGX2.Ky1I.fB7FnDan.', 'Чарующий соблазн', '03.09.2017', '23.10.2021', 1, 0, 205),
(2, 'test', 'test@test', '$2y$10$Vy0Am7CkZj5SYrzoNR26W.XsiO21HWtuQezqns20CfpcqAqdlm7D.', 'Тестики', '04.09.2017', '10.09.2017', 0, 0, 4),
(3, 'новый заводчик', 'test@test2.ru', '$2y$10$eOSfjXze0C3M1FJgNsR3F.A2gohq8kG/avSzH4VEt1.U9q09wUGu2', 'НовыйПитомник', '18.11.2020', '00.00.0000', 0, 0, 0),
(4, 'Заводчик', 'test1@test.ru', '$2y$10$PsPFKFAR7shobc1ugQ983eppBEsxSnyncfSbwGui4ItBxt5bq6ibG', 'Пушистики', '19.11.2020', '29.05.2021', 0, 0, 47),
(5, 'Черныши', 'black@jack.ru', '$2y$10$MY4yAyenbgoJXUSvdGmzZO7oxBpL3x14wL3XhfzTaLcTg0a8nYTkW', 'Черныши - Блек Джек', '19.11.2020', '22.11.2020', 0, 0, 2),
(6, 'кто-то', 'blue@gfh.tu', '$2y$10$sc7PykhD0GsdjaYMx1ChbuqGqa71RmvLEbsO2S.Sb4kr74UZYu16a', 'Голубые бантики', '22.11.2020', '14.05.2021', 0, 0, 4),
(7, 'Елена', 'Lena43@gmail.com', '$2y$10$SUk/YNyPE9uAdhxr1S8XzON6gtrz6f/eVGJGcOdqzMDVzTex1ztVe', 'Лучики', '22.11.2020', '07.03.2021', 0, 0, 5),
(8, 'Ольга Тимофеева', 'o.timka@yandex.ru', '$2y$10$3B6nNiMKg51z1dZqjyoLse0r038gfWxXNmspF.4e83I1Ln6hq2s7C', 'Звездочки', '22.11.2020', '22.11.2020', 0, 0, 0),
(9, 'Дима', 'da/steapnoav@gdjn.com', '$2y$10$DEN378cVvv4G00vElvZ4Me4YRYG/QzdtIxAOtQHqWL5xssZqDZJ26', 'Чашка', '22.11.2020', '30.06.2021', 1, 0, 23);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ages`
--
ALTER TABLE `ages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `race` (`race`),
  ADD KEY `breeder` (`breeder`),
  ADD KEY `owner` (`owner`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `characteristics`
--
ALTER TABLE `characteristics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dnaagt`
--
ALTER TABLE `dnaagt`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `family`
--
ALTER TABLE `family`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kennels`
--
ALTER TABLE `kennels`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `litters`
--
ALTER TABLE `litters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `owneritems`
--
ALTER TABLE `owneritems`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `name_race` (`name_race`);

--
-- Индексы таблицы `randodna`
--
ALTER TABLE `randodna`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `registry`
--
ALTER TABLE `registry`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ages`
--
ALTER TABLE `ages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT для таблицы `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `characteristics`
--
ALTER TABLE `characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `dnaagt`
--
ALTER TABLE `dnaagt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'индекс', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `family`
--
ALTER TABLE `family`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `kennels`
--
ALTER TABLE `kennels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `litters`
--
ALTER TABLE `litters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `owneritems`
--
ALTER TABLE `owneritems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `randodna`
--
ALTER TABLE `randodna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `registry`
--
ALTER TABLE `registry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
