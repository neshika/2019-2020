-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 08 2022 г., 19:02
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

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
  `id` int NOT NULL,
  `age` varchar(50) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'без имени',
  `race` varchar(100) DEFAULT NULL,
  `origin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'происхождение РКФ',
  `breeder` varchar(100) NOT NULL DEFAULT 'Заводчик' COMMENT 'заводчик',
  `owner` varchar(100) NOT NULL DEFAULT 'Владелец' COMMENT 'владелец',
  `kennel` varchar(255) NOT NULL DEFAULT 'Питомник',
  `estrus` int DEFAULT '0' COMMENT 'течка у сук',
  `reg_id` int DEFAULT '0' COMMENT 'ссылка на помет',
  `age_id` int NOT NULL DEFAULT '1' COMMENT 'ссылка на возраст',
  `dna_id` int DEFAULT '0' COMMENT 'ссылка на днк',
  `family_id` int DEFAULT '0' COMMENT 'ссылка на семью',
  `mark_id` int NOT NULL DEFAULT '7' COMMENT 'ссылка на оценку',
  `weight` int DEFAULT NULL COMMENT 'вес собаки',
  `height` int DEFAULT NULL COMMENT 'рост собаки',
  `vitality` int NOT NULL DEFAULT '100' COMMENT 'Энергия',
  `hp` int DEFAULT '100' COMMENT 'Здоровье',
  `joy` int NOT NULL DEFAULT '100' COMMENT 'Счастье',
  `birth` varchar(100) NOT NULL DEFAULT '00.00.0000',
  `now` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `puppy` int NOT NULL DEFAULT '0',
  `litter` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `animals`
--

INSERT INTO `animals` (`id`, `name`, `race`, `origin`, `breeder`, `owner`, `kennel`, `estrus`, `reg_id`, `age_id`, `dna_id`, `family_id`, `mark_id`, `weight`, `height`, `vitality`, `hp`, `joy`, `birth`, `now`, `status`, `puppy`, `litter`) VALUES
(1, 'первая Шоко', 'Китайская хохлатая собака', 1, 'nesh', 'nesh', 'Чарующий соблазн', 35, 0, 34, 11, 1, 2, 3830, 25, 15, 100, 100, '15.09.2017', 1380, 1, 8, 8),
(2, 'Маленькая', 'Китайская хохлатая собака', 1, 'nesh', 'shelter', 'Чарующий соблазн', 24, 0, 22, 12, 2, 2, 3973, 26, 50, 90, 100, '17.09.2017', 0, 1, 3, 3),
(3, '3шоколадкин', 'Китайская хохлатая собака', 0, 'nesh', 'nesh', 'Чарующий соблазн', 0, 0, 17, 13, 3, 2, 4547, 30, 100, 100, 10, '17.09.2017', 0, 1, 6, 6),
(4, '4 кобель', 'Китайская хохлатая собака', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 1, 1, 14, 4, 0, 4547, 30, 100, 100, 20, '17.09.2017', 0, 1, 0, 0),
(5, '5он', 'Китайская хохлатая собака', 0, 'nesh', 'nesh', 'Чарующий соблазн', 0, 0, 14, 15, 5, 0, 4547, 30, 15, 90, 10, '17.09.2017', 0, 1, 1, 1),
(6, 'шестой пух', 'Китайская хохлатая собака', 1, 'nesh', 'shelter', 'Чарующий соблазн', 0, 2, 17, 16, 6, 2, 0, 0, 100, 100, 100, '10.01.2018', 0, 1, 2, 2),
(7, 'Семь', 'Китайская хохлатая собака', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 3, 20, 17, 7, 2, 0, 0, 15, 100, 100, '10.01.2018', 0, 1, 4, 4),
(8, 'Зяма', 'Китайская хохлатая собака', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 4, 21, 18, 9, 0, 0, 0, 15, 100, 100, '22.11.2018', 0, 1, 1, 1),
(9, 'Новый Мальчик', 'Китайская хохлатая собака', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 0, 18, 19, 10, 2, 0, 0, 100, 50, 100, '28.01.2019', 0, 1, 2, 2),
(10, 'Десятый мальчик', 'Китайская хохлатая собака', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 3, 1, 20, 7, 0, 0, 0, 100, 100, 100, '10.01.2019', 0, 1, 0, 0),
(11, '11 девочка (21)', 'Китайская хохлатая собака', 1, 'nesh', 'shelter', 'Чарующий соблазн', 22, 0, 20, 21, 1, 1, 3973, 26, 100, 90, 100, '17.09.2020', 0, 1, 3, 3),
(12, 'Беленькая', 'КХС', 1, 'Бесты-первый лучший', 'Заводчик', 'Пушистики', 14, 0, 10, 27, 12, 1, 0, 0, 10, 50, 99, '00.00.0000', 0, 1, 0, 0),
(13, 'Без имени', 'КХС', 1, 'не известен', 'Черныши', 'Черныши - Блек Джек', 0, 0, 1, 0, 0, 0, 0, 0, 100, 100, 100, '00.00.0000', 0, 1, 0, 0),
(14, 'Грустинка', 'КХС', 1, 'Бесты-первый лучший', 'кто-то', 'Голубые бантики', 14, 0, 10, 32, 14, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0),
(15, 'Без имени', 'КХС', 0, 'Бесты-первый лучший', 'кто-то', 'Голубые бантики', 0, 0, 10, 33, 14, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0),
(16, 'Черная вдова', 'КХС', 1, 'Бесты-первый лучший', 'Елена', 'Лучики', 15, 0, 14, 34, 15, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0),
(17, 'Рыжий бес', 'КХС', 0, 'Бесты-первый лучший', 'Елена', 'Лучики', 0, 0, 10, 35, 15, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0),
(18, 'Без имени', 'КХС', 1, 'Бесты-первый лучший', 'Ольга Тимофеева', 'Звездочки', 6, 0, 10, 36, 16, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0),
(19, 'Без имени', 'КХС', 0, 'Бесты-первый лучший', 'Ольга Тимофеева', 'Звездочки', 0, 0, 14, 37, 17, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0),
(20, 'Рыжа', 'КХС', 1, 'Бесты-первый лучший', 'Дима', 'Чашка', 17, 0, 17, 38, 18, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0),
(21, 'Белый кролик', 'КХС', 0, 'Бесты-первый лучший', 'shelter', 'Чашка', 15, 0, 13, 39, 19, 1, 0, 0, 100, 100, 100, '22.08.2020', 0, 1, 0, 0),
(22, 'Мутация', 'КХС', 1, 'Бесты-первый лучший', 'Заводчик', 'Пушистики', 15, 0, 13, 44, 20, 1, 0, 0, 100, 100, 100, '27.03.2021', 0, 1, 0, 0),
(23, 'БежЖенький', 'КХС', 1, 'Бесты-первый лучший', 'Заводчик', 'Пушистики', 0, 0, 13, 45, 21, 1, 0, 0, 100, 100, 100, '28.03.2021', 0, 1, 0, 0),
(24, 'Верный', 'КХС', 1, 'Бесты-первый лучший', 'Заводчик', 'Пушистики', 0, 0, 13, 46, 22, 1, 0, 0, 100, 100, 100, '28.03.2021', 0, 1, 0, 0),
(25, 'Адельеф', 'КХС', 1, 'Бесты-первый лучший', 'Заводчик', 'Пушистики', 0, 0, 13, 47, 23, 1, 0, 0, 100, 100, 100, '28.03.2021', 0, 1, 0, 0),
(26, 'Белый кролик', 'КХС', 1, 'Бесты-первый лучший', 'nesh', 'Чарующий соблазн', 15, 0, 13, 48, 24, 1, 0, 0, 15, 100, 100, '10.05.2021', 0, 1, 0, 0),
(27, 'Пятныш', 'КХС', 1, 'Бесты-первый лучший', 'nesh', 'Чарующий соблазн', 0, 0, 13, 49, 25, 1, 0, 0, 15, 100, 100, '10.05.2021', 0, 1, 0, 0),
(28, 'Чернуха', 'КХС', 1, 'Бесты-первый лучший', 'Заводчик', 'Пушистики', 3, 0, 13, 50, 26, 1, 0, 0, 100, 100, 100, '29.05.2021', 0, 1, 0, 0),
(29, 'Красавчик29', 'КХС', 1, 'Бесты-первый лучший', 'Дима', 'Чашка', 0, 0, 19, 51, 27, 1, 0, 0, 100, 100, 100, '11.06.2021', 0, 1, 0, 0),
(30, 'Богатырь-30', 'КХС', 1, 'Бесты-первый лучший', 'Дима', 'Чашка', 0, 0, 17, 52, 28, 1, 0, 0, 100, 100, 100, '12.06.2021', 0, 1, 0, 0),
(31, '31Белек', 'КХС', 1, 'Бесты-первый лучший', 'Дима', 'Чашка', 0, 0, 13, 53, 29, 1, 0, 0, 100, 100, 100, '14.06.2021', 0, 1, 0, 0),
(32, '32Милашка', 'КХС', 1, 'Бесты-первый лучший', 'Дима', 'Чашка', 15, 0, 13, 54, 30, 1, 0, 0, 100, 100, 100, '24.06.2021', 0, 1, 0, 0),
(33, '33ШоккингБой', 'КХС', 1, 'Бесты-первый лучший', 'Дима', 'Чашка', 0, 0, 13, 56, 31, 1, 0, 0, 100, 100, 100, '24.06.2021', 0, 1, 0, 0),
(34, 'Мелкая', 'КХС', 1, 'nesh', 'nesh', 'Чарующий соблазн', 17, 0, 17, 57, 32, 1, 0, 0, 100, 100, 10, '14.11.2021', NULL, 1, 6, 6),
(35, 'Kolla', 'КХС', 1, 'nesh', 'nesh', 'Чарующий соблазн', 14, 0, 1, 58, 33, 1, 0, 0, 100, 100, 20, '14.11.2021', NULL, 1, 0, 0),
(36, 'Без имени', 'КХС', 1, 'nesh', 'shelter', 'Чарующий соблазн', 14, 9, 1, 59, 34, 1, NULL, NULL, 100, 100, 100, '04.12.2021', NULL, 1, 0, 0),
(37, 'Снегурка', 'КХС', 1, 'nesh', 'nesh', 'Чарующий соблазн', 14, 10, 1, 60, 35, 1, NULL, NULL, 100, 100, 20, '01.01.2022', NULL, 1, 0, 0),
(38, 'Снежинка', 'КХС', 1, 'nesh', 'nesh', 'Чарующий соблазн', 14, 11, 1, 61, 36, 1, NULL, NULL, 100, 50, 100, '01.01.2022', NULL, 1, 0, 0),
(39, 'Дед Мороз', 'КХС', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 12, 1, 62, 37, 1, NULL, NULL, 100, 50, 100, '01.01.2022', NULL, 1, 0, 0),
(40, 'Шкура', 'КХС', 1, 'nesh', 'nesh', 'Чарующий соблазн', 14, 13, 1, 63, 38, 1, NULL, NULL, 100, 100, 20, '01.01.2022', NULL, 1, 0, 0),
(41, 'неудачка', 'КХС', 1, 'nesh', 'nesh', 'Чарующий соблазн', 14, 14, 1, 64, 39, 1, NULL, NULL, 100, 100, 10, '01.01.2022', NULL, 1, 0, 0),
(42, 'Без имени', 'КХС', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 15, 1, 65, 40, 1, NULL, NULL, 100, 100, 10, '07.01.2022', NULL, 1, 0, 0),
(43, 'Удачный', 'КХС', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 16, 1, 66, 41, 1, NULL, NULL, 100, 50, 100, '07.01.2022', NULL, 1, 0, 0),
(44, 'Без имени', 'КХС', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 17, 1, 67, 42, 1, NULL, NULL, 100, 100, 20, '07.01.2022', NULL, 1, 0, 0),
(45, 'Без имени', 'КХС', 1, 'nesh', 'nesh', 'Чарующий соблазн', 0, 18, 1, 68, 43, 1, NULL, NULL, 100, 100, 20, '07.01.2022', NULL, 1, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id` int UNSIGNED NOT NULL,
  `dogs` int UNSIGNED DEFAULT NULL
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
  `id` int NOT NULL,
  `dog_id` int NOT NULL,
  `charact_ru` varchar(100) NOT NULL COMMENT 'характеристика',
  `charact_en` varchar(100) NOT NULL COMMENT 'характер англ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int NOT NULL COMMENT 'индекс',
  `a` varchar(4) NOT NULL COMMENT 'Локус А',
  `b` varchar(4) NOT NULL COMMENT 'Локус B',
  `c` varchar(4) NOT NULL COMMENT 'Локус C',
  `d` varchar(4) NOT NULL COMMENT 'Локус D',
  `p` varchar(4) NOT NULL COMMENT 'Локус P',
  `m` varchar(4) NOT NULL COMMENT 'Локус M',
  `t` varchar(4) NOT NULL COMMENT 'Локус T',
  `sex` varchar(2) NOT NULL COMMENT 'пол 0сука 1 кобель'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` bigint UNSIGNED NOT NULL,
  `mum` int DEFAULT '0',
  `dad` int NOT NULL DEFAULT '0',
  `g1dad` int NOT NULL DEFAULT '0',
  `g1mum` int NOT NULL DEFAULT '0',
  `g0dad` int NOT NULL DEFAULT '0',
  `g0mum` int NOT NULL DEFAULT '0',
  `gg1dad1` int NOT NULL DEFAULT '0',
  `gg1mum2` int NOT NULL DEFAULT '0',
  `gg1dad3` int NOT NULL DEFAULT '0',
  `gg1mum4` int NOT NULL DEFAULT '0',
  `gg0dad1` int NOT NULL DEFAULT '0',
  `gg0mum2` int NOT NULL DEFAULT '0',
  `gg0dad3` int NOT NULL DEFAULT '0',
  `gg0mum4` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
(31, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 1, 9, 5, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 1, 8, 6, 1, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0),
(38, 34, 9, 5, 2, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 34, 3, 0, 0, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 34, 7, 6, 2, 3, 1, 5, 1, 0, 0, 0, 0, 0, 0),
(41, 34, 7, 6, 2, 3, 1, 5, 1, 0, 0, 0, 0, 0, 0),
(42, 34, 7, 6, 2, 3, 1, 5, 1, 0, 0, 0, 0, 0, 0),
(43, 34, 7, 6, 2, 3, 1, 5, 1, 0, 0, 0, 0, 0, 0),
(44, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `female`
--

CREATE TABLE `female` (
  `wt` int NOT NULL DEFAULT '3830' COMMENT 'вес суки',
  `ht` int NOT NULL DEFAULT '35' COMMENT 'рост суки'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int NOT NULL,
  `name` varchar(25) NOT NULL,
  `icons` varchar(75) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
(9, 'up', '/Pici/up.png'),
(10, 'red', '/pici/red.png'),
(11, 'green', ''),
(12, 'blue', ''),
(13, 'бумага', ''),
(14, 'чернила', ''),
(15, 'кусок 1', ''),
(16, 'кусок 2', ''),
(17, 'кусок 3', ''),
(18, 'кусок 4', ''),
(19, 'кусок 5', ''),
(20, 'кусок 6', ''),
(21, 'кусок 7', ''),
(22, 'кусок 8', '');

-- --------------------------------------------------------

--
-- Структура таблицы `kennels`
--

CREATE TABLE `kennels` (
  `id` int NOT NULL,
  `name_k` varchar(20) NOT NULL,
  `owner_k` varchar(155) NOT NULL,
  `date` varchar(100) NOT NULL DEFAULT '00.00.0000',
  `dogs` int NOT NULL,
  `l_litter` varchar(11) NOT NULL,
  `email` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `kennels`
--

INSERT INTO `kennels` (`id`, `name_k`, `owner_k`, `date`, `dogs`, `l_litter`, `email`) VALUES
(1, 'Бесты-первый лучший', 'Бесты-первый лучший', '01.01.2001', 2000, '', NULL),
(29, 'Чарующий соблазн', 'nesh', '02.09.2017', 17, 'E', 'stepanova@mail.ru'),
(30, 'Тестики', 'test', '03.09.2017', 2, 'A', 'test@test'),
(31, 'НовыйПитомник', 'новый заводчик', '18.11.2020', 2, '', 'test@test2.ru'),
(32, 'Пушистики', 'Заводчик', '19.11.2020', 6, '', 'test1@test.ru'),
(33, 'Черныши - Блек Джек', 'Черныши', '19.11.2020', 2, '', 'black@jack.ru'),
(34, 'Голубые бантики', 'кто-то', '22.11.2020', 2, '', 'blue@gfh.tu'),
(35, 'Лучики', 'Елена', '22.11.2020', 2, '', 'Lena43@gmail.com'),
(36, 'Звездочки', 'Ольга Тимофеева', '22.11.2020', 2, '', 'o.timka@yandex.ru'),
(37, 'Чашка', 'Дима', '22.11.2020', 6, '', 'da/steapnoav@gdjn.com'),
(44, '', '', '00.00.0000', 0, '', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `litters`
--

CREATE TABLE `litters` (
  `id` int NOT NULL,
  `litters` varchar(25) NOT NULL,
  `date` date NOT NULL COMMENT 'дата вязки',
  `stigma` varchar(25) NOT NULL COMMENT 'буква помета',
  `inspecttt` int NOT NULL COMMENT 'осмотренно',
  `cull` int NOT NULL COMMENT 'отбраковано',
  `reexamination` int NOT NULL COMMENT 'пересмотрт',
  `mum` int NOT NULL COMMENT 'мать',
  `dad` int NOT NULL COMMENT 'отец',
  `puppy1` int NOT NULL,
  `puppy2` int NOT NULL,
  `puppy3` int NOT NULL,
  `puppy4` int NOT NULL,
  `puppy5` int NOT NULL,
  `puppy6` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `male`
--

CREATE TABLE `male` (
  `wt` int NOT NULL DEFAULT '4547' COMMENT 'вес кобеля',
  `ht` int NOT NULL DEFAULT '30' COMMENT 'рост кобеля'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int NOT NULL,
  `mark` varchar(35) NOT NULL,
  `namerus` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int NOT NULL,
  `owner_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `count` int DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `owneritems`
--

INSERT INTO `owneritems` (`id`, `owner_id`, `item_id`, `count`) VALUES
(1, 1, 1, 46618),
(2, 9, 1, 35000),
(3, 4, 1, 150000),
(4, 1, 10, 100),
(5, 1, 11, 3),
(6, 1, 12, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `races`
--

CREATE TABLE `races` (
  `id` int NOT NULL,
  `name_race` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id` int NOT NULL,
  `sex` varchar(10) NOT NULL COMMENT '0-сука/1-кобель',
  `lucky` int NOT NULL COMMENT 'удача',
  `spd` float NOT NULL COMMENT 'скорость',
  `agl` float NOT NULL COMMENT 'уворот',
  `tch` float NOT NULL COMMENT 'обучение',
  `jmp` float NOT NULL COMMENT 'прыжки',
  `nuh` float NOT NULL COMMENT 'обоняние',
  `fnd` float NOT NULL COMMENT 'поиск',
  `mut` int NOT NULL COMMENT 'мутации',
  `type` varchar(25) NOT NULL DEFAULT 'Сангвиник' COMMENT 'тип характера собаки',
  `dna` varchar(255) NOT NULL COMMENT 'генетический код',
  `about` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL COMMENT 'ссылка на собаку',
  `url_puppy` varchar(255) NOT NULL COMMENT 'ссылка на щенка',
  `hr` varchar(191) DEFAULT NULL,
  `ww` varchar(191) DEFAULT NULL,
  `ff` varchar(191) DEFAULT NULL,
  `bb` varchar(191) DEFAULT NULL,
  `tt` varchar(191) DEFAULT NULL,
  `mm` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `randodna`
--

INSERT INTO `randodna` (`id`, `sex`, `lucky`, `spd`, `agl`, `tch`, `jmp`, `nuh`, `fnd`, `mut`, `type`, `dna`, `about`, `url`, `url_puppy`, `hr`, `ww`, `ff`, `bb`, `tt`, `mm`) VALUES
(1, '0', 29, 11, 11, 11, 10, 9, 10, 80, 'Холерик', 'hr0w1f0b1t0m1', 'start', '', '', 'hrhr', 'Ww', 'ff', 'Bb', 'tt', 'Mm'),
(2, '1', 96, 10, 10, 10, 9, 11, 9, 4, 'Сангвиник', 'hr1w0f1b1t0m0', 'start', '', '', 'Hrhr', 'ww', 'Ff', 'Bb', 'tt', 'mm'),
(3, '0', 90, 9, 10, 11, 11, 11, 11, 14, 'Холерик', 'hr1w1f1b1t0m1', 'shop', 'pici/MM/hr1w1f1b1t0m1_03.png', 'pici/puppy/hr1w1_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(4, '0', 5, 10, 11, 10, 10, 9, 11, 16, 'Сангвиник', 'hr0w1f0b0t0m1', 'shop', 'pici/hrhr/hr0w1f0b0t0m0_03.png', 'pici/puppy/hr0w1_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(5, '0', 53, 11, 11, 9, 9, 9, 11, 26, 'Сангвиник', 'hr0w1f1b1t0m1', 'shop', 'pici/hrhr/hr0w1f0b1t0m0_01.png', 'pici/puppy/hr0w1_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(6, '1', 85, 9, 11, 9, 10, 9, 10, 48, 'Меланхолик', 'hr0w1f0b0t0m0', 'puppyPodkinut', 'pici/hrhr/hr0w1f0b0t0m0_04.png', 'pici/puppy/hr0w1_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(7, '1', 89, 10, 10, 9, 11, 9, 11, 20, 'Сангвиник', 'hr0w0f1b0t1m1', 'OldPodkinut', 'pici/hrhr/hr0w0f1b0t0m1_02.png', 'pici/puppy/hr0f1_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '', 0, 0, 0, 0, 0, 0, 0, 0, 'Флегматик', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(9, '', 0, 0, 0, 0, 0, 0, 0, 0, 'Флегматик', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(10, '', 0, 0, 0, 0, 0, 0, 0, 0, 'Меланхолик', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(11, '0', 12, 10, 10, 9, 9, 9, 11, 0, 'Сангвиник', 'hr1w1f0b0t1m0', 'owner', 'pici/TT/hr1w0f0b0t1m0_01.png', 'pici/puppy/hr1b0_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(12, '0', 13, 11, 11, 11, 9, 9, 8, 0, 'Меланхолик', 'hr1w0f1b0t0m0', 'shelter', 'pici/hr1w0f1b0t0m0_04.png', 'pici/puppy/hr1f1_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(13, '1', 15, 11, 11, 11, 11, 11, 9, 0, 'Меланхолик', 'hr1w0f0b0t0m0', 'owner', 'pici/hr1w0f0b0t0m0_05.png', 'pici/puppy/hr1b0_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(14, '1', 12, 11.6, 11.6, 11.6, 9.05, 10.6, 9.05, 1, 'Флегматик', 'hr0w0f0b0t0m0', 'owner', 'pici/hrhr/hr0w0f0b0t0m0_01.png', 'pici/puppy/hr0b0_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(15, '1', 75, 10, 9, 11, 11, 11, 10, 0, 'Сангвиник', 'hr1w0f0b0t0m0', 'owner', 'pici/hr1w0f0b0t0m0_03.png', 'pici/puppy/hr1b0_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(16, '1', 27, 10.55, 10.05, 11.05, 10.05, 10.55, 9.55, 0, 'Флегматик', 'hr0w0f0b0t0m0', 'shelter', 'pici/hrhr/hr0w0f0b0t0m0_04.png', 'pici/puppy/hr0b0_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(17, '1', 13, 10.87, 10.62, 11.12, 9.61, 10.37, 9.36, 1, 'Сангвиник', 'hr1w0f0b0t0m0', 'owner', 'pici/hr1w0f0b0t0m0_05.png', 'pici/puppy/hr1b0_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(18, '1', 74, 10.25, 10, 10, 9.5, 9.75, 10.25, 0, 'Сангвиник', 'hr0w0f0b0t1m0', 'owner', 'pici/hrhr/hr0w0f0b0t0m0_04.png', 'pici/puppy/hr0b0_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(19, '1', 97, 10.42, 9.92, 10.91, 9.92, 9.92, 8.93, 1, 'Холерик', 'hr1w0f1b0t0m0', 'owner', 'pici/hr1w0f1b0t0m0_04.png', 'pici/puppy/hr1f1_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(20, '1', 97, 10.42, 12, 10.91, 9.92, 9.92, 8.93, 1, 'Флегматик', 'hr1w1f1b0t0m0', 'owner', 'pici/hr1w1f1b0t0m0_01.png', 'pici/puppy/hr1b0_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(21, '0', 74, 10.25, 10, 10, 9.5, 12, 12, 0, 'Сангвиник', 'hr0w0f0b0t1m0', 'shelter', 'pici/hr1w0f1b0t0m0_01.png', 'pici/puppy/hr1f1_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(22, '', 0, 0, 0, 0, 0, 0, 0, 0, 'Меланхолик', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(23, '', 0, 0, 0, 0, 0, 0, 0, 0, 'Флегматик', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(24, '', 0, 0, 0, 0, 0, 0, 0, 0, 'Холерик', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(25, '0', 39, 11, 10, 11, 9, 9, 10, 86, 'Сангвиник', 'hr1w0f0b1t1m0', 'start', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(26, '1', 71, 9, 9, 10, 10, 11, 11, 100, 'Сангвиник', 'hr0w0f0b0t0m1', 'start', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(27, '0', 90, 10, 9, 9, 10, 11, 9, 21, 'Холерик', 'hr0w1f0b1t0m1', 'start', 'pici/hrhr/hr0w1f0b1t0m0_02.png', 'pici/puppy/hr0b0_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(28, '0', 71, 11, 11, 10, 11, 10, 10, 63, 'Сангвиник', 'hr1w0f1b1t0m0', 'start', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(29, '0', 71, 11, 11, 10, 11, 10, 10, 63, 'Сангвиник', 'hr1w0f1b1t0m0', 'start', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(30, '0', 69, 10, 11, 9, 9, 10, 11, 86, 'Холерик', 'hr0w1f0b0t0m1', 'start', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(31, '1', 97, 9, 11, 11, 10, 11, 11, 63, 'Сангвиник', 'hr1w0f1b0t1m0', 'start', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(32, '0', 77, 9, 10, 9, 9, 9, 11, 22, 'Флегматик', 'hr1w0f0b0t0m1', 'start', 'pici/hr1w0f0b0t0m1_01.png', 'pici/puppy/hr1b0_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(33, '1', 94, 10, 11, 11, 9, 10, 11, 40, 'Холерик', 'hr1w0f0b0t1m0', 'start', 'pici/TT/hr1w0f0b0t1m0_05.png', 'pici/puppy/hr1b0_04.png', NULL, NULL, NULL, NULL, NULL, NULL),
(34, '0', 2, 9, 10, 9, 11, 11, 9, 33, 'Сангвиник', 'hr0w0f0b1t0m0', 'start', 'pici/hrhr/hr0w0f0b1t0m0_02.png', 'pici/puppy/hr0b1_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(35, '1', 46, 9, 11, 9, 11, 11, 9, 60, 'Сангвиник', 'hr0w0f1b1t0m0', 'start', 'pici/hrhr/hr0w0f1b1t0m0_03.png', 'pici/puppy/hr0f1_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(36, '0', 92, 10, 9, 11, 10, 9, 10, 28, 'Холерик', 'hr1w1f0b0t1m0', 'start', 'pici/TT/hr1w0f0b0t1m0_04.png', 'pici/puppy/hr1w1_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(37, '1', 49, 10, 10, 10, 11, 11, 9, 45, 'Флегматик', 'hr1w0f0b0t0m1', 'start', 'pici/MM/hr1w0f0b0t0m1_03.png', 'pici/puppy/hr1b0_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(38, '0', 48, 10, 9, 10, 11, 10, 9, 98, 'Флегматик', 'hr0w0f1b0t1m1', 'start', 'pici/hrhr/hr0w0f1b0t0m0_03.png', 'pici/puppy/hr0f1_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(39, '1', 98, 11, 10, 11, 10, 9, 10, 95, 'Сангвиник', 'hr0w1f0b0t0m1', 'shelter', 'pici/hrhr/hr0w1f0b0t0m0_03.png', 'pici/puppy/hr0w1_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(40, '0', 21, 11, 11, 10, 10, 9, 10, 4, 'Флегматик', 'hr1w0f0b0t0m0', 'shop', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(41, '1', 75, 10, 9, 10, 11, 11, 9, 74, 'Флегматик', 'hr0w1f0b0t1m0', 'shop', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(42, '1', 82, 11, 11, 11, 9, 10, 10, 10, 'Сангвиник', 'hr1w1f0b0t0m1', 'shop', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(43, '1', 40, 11, 11, 9, 9, 11, 11, 49, 'Холерик', 'hr0w1f1b0t1m0', 'shop', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(44, '0', 12, 10, 10, 10, 9, 11, 10, 10, 'Сангвиник', 'hr1w1f0b0t0m0', 'owner', 'pici/hr1w1f0b0t0m0_03.png', 'pici/puppy/hr1w1_04.png', NULL, NULL, NULL, NULL, NULL, NULL),
(45, '1', 70, 11, 10, 9, 10, 9, 10, 69, 'Флегматик', 'hr0w0f1b1t0m0', 'owner', 'pici/hrhr/hr0w0f1b0t0m0_05.png', 'pici/puppy/hr0f1_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(46, '1', 37, 11, 11, 9, 11, 10, 9, 32, 'Холерик', 'hr0w0f0b0t1m1', 'owner', 'pici/hrhr/hr0w0f0b0t0m1_04.png', 'pici/puppy/hr0b0_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(47, '1', 59, 9, 10, 9, 11, 9, 9, 63, 'Меланхолик', 'hr1w0f1b0t1m1', 'owner', 'pici/TM/hr1w0f0b0t1m1_02.png', 'pici/puppy/hr1w1_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(48, '0', 43, 9, 10, 11, 9, 9, 11, 41, 'Сангвиник', 'hr0w0f0b1t0m1', 'owner', 'pici/hrhr/hr0w0f0b1t0m1_03.png', 'pici/puppy/hr0b1_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(49, '1', 17, 11, 11, 11, 11, 10, 10, 82, 'Сангвиник', 'hr1w0f1b1t0m1', 'owner', 'pici/MM/hr1w0f1b1t0m1_03.png', 'pici/puppy/hr1f1_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(50, '0', 81, 9, 9, 10, 10, 11, 9, 48, 'Меланхолик', 'hr1w0f0b1t0m1', 'owner', 'pici/MM/hr1w0f0b1t0m1_02.png', 'pici/puppy/hr1b1_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(51, '1', 3, 11, 10, 11, 9, 10, 11, 29, 'Флегматик', 'hr1w1f0b1t1m0', 'owner', 'pici/TT/hr1w0f0b1t1m0_03.png', 'pici/puppy/hr1w1_04.png', NULL, NULL, NULL, NULL, NULL, NULL),
(52, '1', 16, 10, 9, 9, 9, 11, 11, 11, 'Флегматик', 'hr1w1f0b0t1m1', 'owner', 'pici/TM/hr1w0f0b0t1m1_01.png', 'pici/puppy/hr1w1_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(53, '1', 92, 11, 11, 9, 11, 10, 11, 93, 'Холерик', 'hr0w1f0b0t1m1', 'owner', 'pici/hrhr/hr0w1f0b0t0m0_05.png', 'pici/puppy/hr0w1_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(54, '0', 42, 10, 10, 11, 9, 10, 9, 75, 'Флегматик', 'hr1w0f1b0t0m0', 'owner', 'pici/hr1w0f1b0t0m0_02.png', 'pici/puppy/hr1f1_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(55, '0', 48, 9, 9, 9, 10, 10, 11, 63, 'Холерик', 'hr1w1f0b0t1m0', 'owner', 'pici/TT/hr1w0f0b0t1m0_02.png', 'pici/puppy/hr1w1_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(56, '1', 80, 11, 9, 9, 10, 11, 10, 94, 'Флегматик', 'hr0w0f0b1t1m1', 'owner', 'pici/hrhr/hr0w0f0b1t0m1_04.png', 'pici/puppy/hr0b1_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(57, '0', 4, 10.5, 10.5, 10.5, 10.5, 10.5, 9.5, 3, 'Меланхолик', 'hr1w1f0b0t1m0', 'owner', 'pici/TT/hr1w0f0b0t1m0_01.png', 'pici/puppy/hr1w1_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(58, '0', 11, 10.45, 10.45, 10.45, 10.45, 10.45, 9.45, 51, 'Флегматик', 'hr0w0f0b0t1m0', 'owner', 'pici/hrhr/hr0w0f0b0t0m0_04.png', 'pici/puppy/hr0b0_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(59, '0', 76, 10.11, 9.87, 10.36, 9.87, 9.87, 9.38, 95, 'Сангвиник', 'hr1w1f1b0t0m0', 'shelter', 'pici/hr1w1f1b0t0m0_01.png', 'pici/puppy/hr1w1_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(60, '0', 33, 10.48, 10.48, 10.48, 10.48, 10.48, 9.48, 22, 'Флегматик', 'hr1w1f0b0t1m0', 'owner', 'pici/TT/hr1w0f0b0t1m0_03.png', 'pici/puppy/hr1w1_03.png', NULL, NULL, NULL, NULL, NULL, NULL),
(61, '0', 84, 10.41, 10.41, 10.41, 10.41, 10.41, 9.41, 90, 'Холерик', 'hr0w1f0b0t1m0', 'owner', 'pici/hrhr/hr0w1f0b0t0m0_03.png', 'pici/puppy/hr0w1_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(62, '1', 9, 10.17, 10.05, 10.05, 9.8, 9.92, 10.17, 49, 'Холерик', 'hr1w1f0b0t1m0', 'owner', 'pici/TT/hr1w0f0b0t1m0_01.png', 'pici/puppy/hr1w1_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(63, '0', 94, 10.41, 10.17, 10.66, 10.17, 10.17, 9.67, 44, 'Флегматик', 'hr1w0f1b0t0m0', 'owner', 'pici/hr1w0f1b0t0m0_01.png', 'pici/puppy/hr1f1_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(64, '0', 17, 10.84, 10.84, 10.84, 10.84, 10.84, 9.83, 82, 'Меланхолик', 'hr1w0f0b0t1m0', 'owner', 'pici/TT/hr1w0f0b0t1m0_01.png', 'pici/puppy/hr1w1_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(65, '1', 45, 10.63, 10.5, 10.75, 10, 10.38, 9.87, 56, 'Меланхолик', 'hr0w1f0b0t1m0', 'owner', 'pici/hrhr/hr0w1f0b0t0m0_05.png', 'pici/puppy/hr0w1_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(66, '1', 87, 10.6, 10.48, 10.73, 9.98, 10.36, 9.85, 76, 'Холерик', 'hr1w1f0b0t0m0', 'owner', 'pici/hr1w1f0b0t0m0_03.png', 'pici/puppy/hr1w1_01.png', NULL, NULL, NULL, NULL, NULL, NULL),
(67, '1', 73, 10.65, 10.52, 10.77, 10.02, 10.4, 9.9, 35, 'Флегматик', 'hr1w1f0b0t0m0', 'owner', 'pici/hr1w1f0b0t0m0_02.png', 'pici/puppy/hr1w1_02.png', NULL, NULL, NULL, NULL, NULL, NULL),
(68, '1', 57, 10.59, 10.47, 10.72, 9.97, 10.34, 9.84, 87, 'Флегматик', 'hr0w0f0b0t1m0', 'owner', 'pici/hrhr/hr0w0f0b0t0m0_01.png', 'pici/puppy/hr0b0_01.png', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `registry`
--

CREATE TABLE `registry` (
  `id` int NOT NULL,
  `lit` varchar(5) NOT NULL DEFAULT 'Я' COMMENT 'Буква помета',
  `date` date NOT NULL COMMENT 'дата вязки',
  `mum` int NOT NULL COMMENT 'id мамы',
  `dad` int NOT NULL COMMENT 'id папы',
  `datebirth` varchar(10) NOT NULL COMMENT 'сколько носила 55-70',
  `count` int NOT NULL DEFAULT '1' COMMENT 'родилось',
  `count45` int NOT NULL COMMENT 'выращено до 45 дней',
  `female` int NOT NULL COMMENT 'кол-во сук',
  `male` int NOT NULL COMMENT 'кол-во кобелей',
  `tatoo` int NOT NULL COMMENT '№ клейма'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `registry`
--

INSERT INTO `registry` (`id`, `lit`, `date`, `mum`, `dad`, `datebirth`, `count`, `count45`, `female`, `male`, `tatoo`) VALUES
(1, 'А', '2017-09-17', 2, 3, '55', 1, 1, 0, 1, 0),
(2, 'Б', '2018-01-10', 1, 5, '60', 1, 1, 0, 1, 0),
(3, 'В', '2018-01-07', 2, 6, '55', 1, 1, 0, 1, 0),
(4, 'Г', '2018-11-22', 1, 6, '57', 1, 1, 0, 1, 0),
(5, 'Д', '0000-00-00', 1, 5, '67', 2, 2, 0, 2, 0),
(6, 'Е', '2019-04-28', 1, 5, '57', 3, 3, 2, 1, 0),
(7, 'Ё', '2021-11-14', 1, 3, '59', 1, 1, 1, 0, 0),
(8, 'Ж', '2021-11-14', 1, 3, '69', 1, 1, 1, 0, 0),
(9, 'З', '2021-12-04', 1, 9, '56', 1, 1, 1, 0, 0),
(10, 'И', '2022-01-01', 1, 3, '63', 1, 1, 1, 0, 0),
(11, 'К', '2022-01-01', 1, 3, '68', 1, 1, 1, 0, 0),
(12, 'Л', '2022-01-01', 1, 8, '56', 1, 1, 0, 1, 0),
(13, 'М', '2022-01-01', 34, 9, '60', 1, 1, 1, 0, 0),
(14, 'Н', '2022-01-01', 34, 3, '55', 1, 1, 1, 0, 0),
(15, 'О', '2022-01-07', 34, 7, '62', 1, 1, 0, 1, 0),
(16, 'П', '2022-01-07', 34, 7, '57', 1, 1, 0, 1, 0),
(17, 'Р', '2022-01-07', 34, 7, '63', 1, 1, 0, 1, 0),
(18, 'С', '2022-01-07', 34, 7, '65', 1, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int NOT NULL,
  `pole1` varchar(255) NOT NULL,
  `pole2` int NOT NULL,
  `pole3` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id` int UNSIGNED NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kennel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'заводчик',
  `f_time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '00.00.0000',
  `l_time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '00.00.0000',
  `online` tinyint(1) DEFAULT NULL,
  `sign` int DEFAULT NULL,
  `visits` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `kennel`, `f_time`, `l_time`, `online`, `sign`, `visits`) VALUES
(1, 'nesh', 'stepanova@mail.ru', '$2y$10$pinvDspcODn0zxHMfyEUoufayxxNfwrQoqHGX2.Ky1I.fB7FnDan.', 'Чарующий соблазн', '03.09.2017', '03.07.2022', 0, 0, 243),
(2, 'test', 'test@test', '$2y$10$Vy0Am7CkZj5SYrzoNR26W.XsiO21HWtuQezqns20CfpcqAqdlm7D.', 'Тестики', '04.09.2017', '10.09.2017', 0, 0, 4),
(3, 'новый заводчик', 'test@test2.ru', '$2y$10$eOSfjXze0C3M1FJgNsR3F.A2gohq8kG/avSzH4VEt1.U9q09wUGu2', 'НовыйПитомник', '18.11.2020', '00.00.0000', 0, 0, 0),
(4, 'Заводчик', 'test1@test.ru', '$2y$10$PsPFKFAR7shobc1ugQ983eppBEsxSnyncfSbwGui4ItBxt5bq6ibG', 'Пушистики', '19.11.2020', '29.05.2021', 0, 0, 47),
(5, 'Черныши', 'black@jack.ru', '$2y$10$MY4yAyenbgoJXUSvdGmzZO7oxBpL3x14wL3XhfzTaLcTg0a8nYTkW', 'Черныши - Блек Джек', '19.11.2020', '22.11.2020', 0, 0, 2),
(6, 'кто-то', 'blue@gfh.tu', '$2y$10$sc7PykhD0GsdjaYMx1ChbuqGqa71RmvLEbsO2S.Sb4kr74UZYu16a', 'Голубые бантики', '22.11.2020', '14.05.2021', 0, 0, 4),
(7, 'Елена', 'Lena43@gmail.com', '$2y$10$SUk/YNyPE9uAdhxr1S8XzON6gtrz6f/eVGJGcOdqzMDVzTex1ztVe', 'Лучики', '22.11.2020', '07.03.2021', 0, 0, 5),
(8, 'Ольга Тимофеева', 'o.timka@yandex.ru', '$2y$10$3B6nNiMKg51z1dZqjyoLse0r038gfWxXNmspF.4e83I1Ln6hq2s7C', 'Звездочки', '22.11.2020', '22.11.2020', 0, 0, 0),
(9, 'Дима', 'da/steapnoav@gdjn.com', '$2y$10$DEN378cVvv4G00vElvZ4Me4YRYG/QzdtIxAOtQHqWL5xssZqDZJ26', 'Чашка', '22.11.2020', '30.06.2021', 1, 0, 23),
(10, 'admin', 'admin@dog.ru', '$2y$10$NWuAFT7lI1D4vPL4Aum4ou2ZLwjikWEvNl36mXfMEZ5c6ca9.16hW', 'заводчик', '05.07.2022', '2022-07-05', 1, 1, 1);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT для таблицы `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `characteristics`
--
ALTER TABLE `characteristics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `dnaagt`
--
ALTER TABLE `dnaagt`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'индекс', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `family`
--
ALTER TABLE `family`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `kennels`
--
ALTER TABLE `kennels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `litters`
--
ALTER TABLE `litters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `owneritems`
--
ALTER TABLE `owneritems`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `randodna`
--
ALTER TABLE `randodna`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `registry`
--
ALTER TABLE `registry`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
