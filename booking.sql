-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 12 2016 г., 19:57
-- Версия сервера: 5.7.14
-- Версия PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `booking`
--

-- --------------------------------------------------------

--
-- Структура таблицы `apartments`
--

CREATE TABLE `apartments` (
  `id_apartment` int(6) NOT NULL,
  `id_hotel` int(6) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` int(4) NOT NULL,
  `is_top` tinyint(1) NOT NULL DEFAULT '0',
  `size` int(3) NOT NULL,
  `type` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `apartments`
--

INSERT INTO `apartments` (`id_apartment`, `id_hotel`, `title`, `description`, `price`, `is_top`, `size`, `type`, `foto`) VALUES
(1, 1, 'Седьмое небо', 'Комфортный номер люкс предназначенный для 2-х человек.В номере есть холодильник, сейф,кровать с ортопедическим матрасом,фен, предоставляются полотенца и халаты.', 600, 1, 2, 'Люкс', '/upload/images/timt.jpg'),
(2, 1, 'Седьмое небо', 'Оформление номеров уникально: они представляют собой несколько самых известных мировых опер, и выдержаны в разных стилях: русский, итальянский, восточный, египетский, американский. В каждом есть кондиционер, бесплатный интернет по беспроводной технологии, мини-бар. В отдельной ванной комнате полы с подогревом и предоставляются бесплатные косметические средства. Стоимость завтрака «шведский стол» входит в оплату проживания.', 350, 1, 4, 'Полулюкс', '/upload/images/timo.jpg'),
(3, 1, 'Седьмое небо', 'В каждом есть кондиционер, бесплатный интернет по беспроводной технологии, мини-бар. В отдельной ванной комнате полы с подогревом и предоставляются бесплатные косметические средства. Стоимость завтрака «шведский стол» входит в оплату проживания.', 250, 1, 2, 'Стандарт', '/upload/images/timt.jpg'),
(4, 1, 'Седьмое небо', 'Все номера обладают дизайнерским интерьером и мраморными полами, в каждом установлен кондиционер, телевизор и кабельное телевидение. Есть отдельные номера для людей с ограниченными физическими возможностями, проводится ежедневное обслуживание , а рум-сервис включает смену белья и услуги горничной.', 200, 1, 2, 'Классик', '/upload/images/timt1.jpg'),
(5, 2, 'Мезон бланш', 'Все номера обладают дизайнерским интерьером и мраморными полами, в каждом установлен кондиционер, телевизор и кабельное телевидение. Есть отдельные номера для людей с ограниченными физическими возможностями, проводится ежедневное обслуживание , а рум-сервис включает смену белья и услуги горничной.', 300, 1, 3, 'Премиум', '/upload/images/5.jpg'),
(6, 2, 'Мезон бланш', 'Все номера обладают дизайнерским интерьером и мраморными полами, в каждом установлен кондиционер, телевизор и кабельное телевидение. Есть отдельные номера для людей с ограниченными физическими возможностями, проводится ежедневное обслуживание , а рум-сервис включает смену белья и услуги горничной.', 600, 1, 2, 'Романтик', '/upload/images/7.jpg'),
(7, 3, 'Роял гранд', 'Все номера обладают дизайнерским интерьером и мраморными полами, в каждом установлен кондиционер, телевизор и кабельное телевидение. Есть отдельные номера для людей с ограниченными физическими возможностями, проводится ежедневное обслуживание , а рум-сервис включает смену белья и услуги горничной.', 600, 1, 3, 'Люкс', '/upload/images/8.jpg'),
(8, 3, 'Роял гранд', 'Все номера обладают дизайнерским интерьером и мраморными полами, в каждом установлен кондиционер, телевизор и кабельное телевидение. Есть отдельные номера для людей с ограниченными физическими возможностями, проводится ежедневное обслуживание , а рум-сервис включает смену белья и услуги горничной.', 500, 1, 2, 'Стандарт', '/upload/images/9.jpg'),
(9, 3, 'Роял гранд', 'Классный номер', 100, 0, 5, 'Полулюкс', '/upload/images/tim.jpg'),
(11, 35, 'Отельчик', 'Комфортный и уютный номер', 600, 0, 2, 'Люкс', '/upload/timt1.jpg'),
(12, 38, 'Test hotel', 'best', 700, 0, 2, 'lux', '/upload/9.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `appartments_attachments`
--

CREATE TABLE `appartments_attachments` (
  `id_apartment_attachment` int(6) NOT NULL,
  `id_apartment` int(6) NOT NULL,
  `src` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `appartments_attachments`
--

INSERT INTO `appartments_attachments` (`id_apartment_attachment`, `id_apartment`, `src`) VALUES
(1, 1, '/upload/images/tim.jpg'),
(2, 2, '/upload/images/timo.jpg'),
(3, 3, '/upload/images/timt.jpg'),
(4, 4, '/upload/images/timt1.jpg'),
(5, 5, '/upload/images/5.jpg'),
(6, 6, '/upload/images/7.jpg'),
(7, 7, '/upload/images/8.jpg'),
(8, 8, '/upload/images/9.jpg'),
(9, 9, 'jhjkhjhjh'),
(10, 9, 'jhjkhjhjh'),
(11, 1, '/upload/images/12.jpg'),
(12, 1, '/upload/images/14.jpg'),
(13, 1, '/upload/images/16.jpg'),
(14, 1, '/upload/images/17.jpg'),
(15, 1, '/upload/images/18.jpg'),
(16, 1, '/upload/images/timt.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `foto_hotel`
--

CREATE TABLE `foto_hotel` (
  `id_fotohotel` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `src` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `foto_hotel`
--

INSERT INTO `foto_hotel` (`id_fotohotel`, `id_hotel`, `src`) VALUES
(1, 1, '/upload/images/Седьмое небо/1.jpg'),
(2, 1, '/upload/images/Седьмое небо/2.jpg'),
(3, 1, '/upload/images/Седьмое небо/3.jpg'),
(4, 1, '/upload/images/Седьмое небо/4.jpg'),
(5, 1, '/upload/images/Седьмое небо/5.jpg'),
(6, 1, '/upload/images/Седьмое небо/6.jpg'),
(7, 2, '/upload/images/7.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `hotels`
--

CREATE TABLE `hotels` (
  `id_hotel` int(6) NOT NULL,
  `title` text NOT NULL,
  `stars` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hotels`
--

INSERT INTO `hotels` (`id_hotel`, `title`, `stars`, `description`, `image`) VALUES
(2, 'Мезон бланш', '★★★★★', 'Гостиничный комплекс Мезон бланш – современный 5-звездочный отель, расположенный в живописном месте на берегу\r\n                    Самарского залива в 20 мин. езды от центра Днепропетровска. Развитая инфраструктура гостиничного комплекса\r\n                    и высокое качество предлагаемого сервиса позволит вам получить максимум приятных впечатлений,\r\n                    навсегда превратив SunRay в излюбленное место для отдыха.', '\\upload\\images\\hotel.jpg'),
(3, 'Роял гранд', '★★★★✰', 'Гостиничный комплекс Гранд роял – современный 5-звездочный отель, расположенный в живописном месте на берегу\r\n                    Самарского залива в 20 мин. езды от центра Днепропетровска. Развитая инфраструктура гостиничного комплекса\r\n                    и высокое качество предлагаемого сервиса позволит вам получить максимум приятных впечатлений,\r\n                    навсегда превратив SunRay в излюбленное место для отдыха.', '\\upload\\images\\hotel.jpg'),
(4, 'Черное море', '★★★✰✰', 'Гостиничный комплекс Черное море – современный 5-звездочный отель, расположенный в живописном месте на берегу\r\n                    Самарского залива в 20 мин. езды от центра Днепропетровска. Развитая инфраструктура гостиничного комплекса\r\n                    и высокое качество предлагаемого сервиса позволит вам получить максимум приятных впечатлений,\r\n                    навсегда превратив SunRay в излюбленное место для отдыха.', '\\upload\\images\\hotel.jpg'),
(5, 'Отель классик', '★★★✰✰', 'Гостиничный комплекс Отель Классик – современный 5-звездочный отель, расположенный в живописном месте на берегу\r\n                    Самарского залива в 20 мин. езды от центра Днепропетровска. Развитая инфраструктура гостиничного комплекса\r\n                    и высокое качество предлагаемого сервиса позволит вам получить максимум приятных впечатлений,\r\n                    навсегда превратив SunRay в излюбленное место для отдыха.', '\\upload\\images\\hotel.jpg'),
(6, 'Опера', '★★★★✰', 'Гостиничный комплекс Опера – современный 5-звездочный отель, расположенный в живописном месте на берегу\r\n                    Самарского залива в 20 мин. езды от центра Днепропетровска. Развитая инфраструктура гостиничного комплекса\r\n                    и высокое качество предлагаемого сервиса позволит вам получить максимум приятных впечатлений,\r\n                    навсегда превратив SunRay в излюбленное место для отдыха.', '\\upload\\images\\hotel.jpg'),
(7, 'Тиссо', '★★★✰✰', 'Гостиничный комплекс Тиссо – современный 5-звездочный отель, расположенный в живописном месте на берегу\r\n                    Самарского залива в 20 мин. езды от центра Днепропетровска. Развитая инфраструктура гостиничного комплекса\r\n                    и высокое качество предлагаемого сервиса позволит вам получить максимум приятных впечатлений,\r\n                    навсегда превратив SunRay в излюбленное место для отдыха.', '\\upload\\images\\hotel.jpg'),
(8, 'Импресса', '★★★★★', 'Гостиничный комплекс Импресса – современный 5-звездочный отель, расположенный в живописном месте на берегу\r\n                    Самарского залива в 20 мин. езды от центра Днепропетровска. Развитая инфраструктура гостиничного комплекса\r\n                    и высокое качество предлагаемого сервиса позволит вам получить максимум приятных впечатлений,\r\n                    навсегда превратив SunRay в излюбленное место для отдыха.', '\\upload\\images\\hotel.jpg'),
(9, 'Космос', '★★★✰✰', 'Гостиничный комплекс Космос – современный 5-звездочный отель, расположенный в живописном месте на берегу\r\n                    Самарского залива в 20 мин. езды от центра Днепропетровска. Развитая инфраструктура гостиничного комплекса\r\n                    и высокое качество предлагаемого сервиса позволит вам получить максимум приятных впечатлений,\r\n                    навсегда превратив SunRay в излюбленное место для отдыха.', '\\upload\\images\\hotel.jpg'),
(10, 'SunRay', '★★★★★', 'Гостиничный комплекс SunRay – современный 5-звездочный отель, расположенный в живописном месте на берегу\r\n                    Самарского залива в 20 мин. езды от центра Днепропетровска. Развитая инфраструктура гостиничного комплекса\r\n                    и высокое качество предлагаемого сервиса позволит вам получить максимум приятных впечатлений,\r\n                    навсегда превратив SunRay в излюбленное место для отдыха.', '\\upload\\images\\hotel.jpg'),
(11, 'Stars', '★★★✰✰', '', '\\upload\\images\\hotel.jpg'),
(12, 'Sky', '★★★★✰', '', '\\upload\\images\\hotel.jpg'),
(13, 'Гудзон', '★★★★✰', '', '\\upload\\images\\hotel.jpg'),
(14, 'Grand', '★★★★✰', '', '\\upload\\images\\hotel.jpg'),
(15, 'Roshen', '★★★★✰', '', '\\upload\\images\\hotel.jpg'),
(16, 'Likiya', '★★★★✰', '', '\\upload\\images\\hotel.jpg'),
(17, 'Briz', '★★★★✰', '', '\\upload\\images\\hotel.jpg'),
(18, 'ROCK', '★★★✰✰', '', '\\upload\\images\\hotel.jpg'),
(19, 'Richard', '★★★✰✰', '', '\\upload\\images\\hotel.jpg'),
(20, 'Big', '★★★✰✰', '', '\\upload\\images\\hotel.jpg'),
(40, 'hotel Best', '★★★★★', 'hhhhhhhhhhhhhhh', '/upload/images/hotel.jpg'),
(39, 'testik', '★★★★✰', 'dsfdsfsddssssssfsdfsdf', '/upload/images/hotel.jpg'),
(33, 'tretret', '★★★★★', 'retertrewrtert', '/upload/hotel.jpg'),
(32, 'test', '★★★★★', 'test', '/upload/hotelhotel.jpg'),
(34, 'Test hotel', '★★★★★', 'best hotel', '/upload/hotel.jpg'),
(35, 'Отельчик', '★★★★★', 'Супер отельчик', '/upload/hotel.jpg'),
(36, 'Sunray', '★★★★★', 'best', '/upload/hotel.jpg'),
(37, 'test2', '★★★★★', 'lololool', '/upload/images/avka.jpg'),
(38, 'Test hotel', '★★★★★', 'test', '/upload/images/hotel.jpg'),
(44, 'gfggfg', '★★★★★', 'dfgdfgdfg', '/upload/hotel.jpg'),
(42, 'jjjjjj', '★★★★★', 'jjjjjjjjjjjjjjj', '/upload/hotel.jpg'),
(43, 'fdsfsd', '★★★★★', 'sdfsd', '/upload/hotel.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id_request` int(6) NOT NULL,
  `id_apartment` int(6) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `date_arrival` date NOT NULL,
  `date_departure` date NOT NULL,
  `comment` text NOT NULL,
  `date_request` date NOT NULL,
  `is_approved` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id_request`, `id_apartment`, `name`, `email`, `phone`, `date_arrival`, `date_departure`, `comment`, `date_request`, `is_approved`) VALUES
(4, 1, 'home', 'home@gmail.com', 972976479, '2016-11-24', '2016-11-30', 'бронь', '0000-00-00', 0),
(5, 1, 'Vasiliy', 'dom@ro.oo', 969517631, '2016-11-27', '2016-12-02', 'удобные кровати', '0000-00-00', 0),
(10, 2, 'test', 'test@test.mail', 972976479, '2016-12-31', '2017-01-01', 'hello', '0000-00-00', 0),
(12, 3, 'hghgghhg', 'uy@lk.lk', 972976479, '2016-12-31', '2016-12-31', 'poioiiio', '0000-00-00', 0),
(13, 4, 'room222', 'fg@kj.lk', 972976479, '2017-01-01', '2017-01-29', 'test', '0000-00-00', 0),
(14, 2, 'fsdfds', 'ffd@fd.klkj', 972976479, '2016-12-24', '2017-01-01', 'fgdfgdg', '0000-00-00', 0),
(15, 1, 'gfgfg', 'df@fg.lk', 972976479, '2017-01-01', '2017-02-03', 'rtyrtyrty', '0000-00-00', 0),
(17, 5, 'hghgh', 'hf@kt.kj', 972976479, '2017-01-01', '2017-01-01', 'gfgfdgfd', '0000-00-00', 0),
(18, 2, 'Admin', 'gf@jkh.lk', 972976479, '2016-12-31', '2016-12-31', 'uyuyy', '0000-00-00', 0),
(19, 1, 'testik', 'admin@gmail.com', 969517631, '2016-12-31', '2016-12-31', 'testik', '0000-00-00', 0),
(20, 2, 'testik2', 'test@test2.ll', 969517631, '2016-12-31', '2017-01-01', 'hi', '0000-00-00', 0),
(21, 2, 'test vasya', 'Vasiliy@mail.ru', 972976479, '2016-12-30', '2016-12-31', 'ijkljlkjkl', '0000-00-00', 0),
(22, 1, 'Vasiliy', 'admin@gmail.com', 972976479, '2016-12-25', '2017-01-01', 'kjkjkjjk', '0000-00-00', 0),
(23, 11, 'Василий', 'Vasiliy@mail.ru', 972976479, '2016-12-31', '2017-01-01', 'jhjhjkhhjk', '0000-00-00', 0),
(24, 1, 'vaska', 'dd@mm.ll', 972976479, '2016-12-31', '2017-01-01', 'fgdffgfddf', '0000-00-00', 0),
(25, 1, 'ghgfhg', 'fg@gfg.jjjj', 969517631, '2017-01-01', '2017-01-01', 'jhhgj', '0000-00-00', 0),
(26, 1, 'Oksana', 'oxx@mail.ru', 972976479, '2017-01-01', '2017-01-04', 'hotel', '0000-00-00', 0),
(27, 19, 'куврппп', 'ds@kj.lk', 969517631, '2017-01-01', '2017-01-01', 'kjjij', '0000-00-00', 0),
(28, 19, 'куврппп', 'ds@kj.lk', 969517631, '2017-01-01', '2017-01-01', 'kjjij', '0000-00-00', 0),
(29, 19, 'fgfgg', 'df@lk.ll', 969517631, '2017-01-01', '2017-01-01', 'gffgfdgdfgdfgdfgdf', '0000-00-00', 0),
(30, 19, 'jkhjhjhjhjhj', 'jkhkuhjkhjhj', 969517631, '2016-12-31', '2016-12-31', 'hghhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '0000-00-00', 0),
(31, 19, 'fghfggggggdfgdfgfd', 'fgf@gf.lk', 972976479, '2016-12-25', '2017-01-01', 'ghfghfghghgfhghgh', '0000-00-00', 0),
(32, 19, 'order', 'dd@ff.ll', 972976479, '2017-01-01', '2017-01-01', 'ffffffffffffffffffffffffffffffffffffff', '0000-00-00', 0),
(33, 1, 'Admin', 'admin@gmail.com', 969517631, '2016-12-31', '2016-12-31', 'gfdgfgfdfg', '0000-00-00', 0),
(34, 6, 'Admin', 'admin@gmail.com', 972976479, '2016-12-31', '2017-01-01', 'fsdfdfdf', '0000-00-00', 0),
(35, 1, 'ававыа', 'admin@gmail.com', 969517631, '2016-12-31', '2017-01-01', 'ваывавыавы', '0000-00-00', 0),
(36, 2, 'чсмчсмсм', 'admin@gmail.com', 969517631, '2016-12-31', '2017-01-01', 'папавпап', '0000-00-00', 0),
(37, 8, 'Vasiliy', 'admin@gmail.com', 969517631, '2017-01-01', '2017-01-18', 'ghghghghghghghg', '2016-12-08', 0),
(38, 2, 'Vasiliy', 'nastja_kovtun@inbox.ru', 969517631, '2017-01-01', '2017-01-01', 'hghghghghgh', '2016-12-10', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `avatar` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `is_admin`, `avatar`) VALUES
(32, 'admin', 'admin@gmail.com', '$2y$10$CupoNXglLy/RWjF5VQDGduqL0.8X6HnkPYzlRZAypTYcF1emOMZRm', 1, '/upload/36.jpg'),
(138, 'vaska', 'nastja_kovtun@inbox.ru', '$2y$10$kYQ2Ohvz2KP3ifXSVBXSPu8./O3BFtOg6mnmXWkn3Yp5hjkTTn8fa', 0, '/upload/avka.jpg'),
(139, 'Gcvc', 'sushinskaya.89@mail.ru', '$2y$10$HbCIeG3t/HnHVm.jdOxK9OsNbhJ4Dy5uFOwcVKXJIyVRj0mqKVjYC', 0, '/'),
(137, 'jkjj', 'ffd@dff.lkk', '$2y$10$eQTEz/gNU6jNmtfxOS1U6u2fmUQ3Wvid4Se8eIZCg8ZBYKGaL77ZG', 0, '/upload/delphin.jpg'),
(126, 'Vasiliy', 'gf@kj.ii', '$2y$10$fgDLFyL5YbsKh.u.EElFO.vPlX8on5ACmcKhwr23i7X75tXEwYDQK', 0, '/upload/avka.jpg'),
(132, 'vaska555', 'ron2222@mail.ru', '$2y$10$IMwOe1IDdv/NiRwnLzR8CuyOYJb8Ja9J5GarMQDSxHsj2W9Ku91G6', 0, '/upload/avka.jpg'),
(133, 'Oksana2', 'oxx2@mail.ru', '$2y$10$RUuYT/K/tMkKCnMoTsOgC.GxppYdksJorHyJz2MUq73zIlkmdrt2C', 0, '/upload/36.jpg'),
(135, 'Test', 'test@jj.pp', '$2y$10$8IunEVqdlVT5CZu6UguYje5tf1hHYBTFmAYyUz3lmRexUpWBG3w1q', 0, '/upload/36.jpg'),
(129, 'vaska', 'ron@mail.ru', '123456', 0, '/upload/avatar/delphin.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id_apartment`),
  ADD KEY `id_hotel` (`id_hotel`);

--
-- Индексы таблицы `appartments_attachments`
--
ALTER TABLE `appartments_attachments`
  ADD PRIMARY KEY (`id_apartment_attachment`);

--
-- Индексы таблицы `foto_hotel`
--
ALTER TABLE `foto_hotel`
  ADD PRIMARY KEY (`id_fotohotel`);

--
-- Индексы таблицы `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_apartment` (`id_apartment`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id_apartment` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `appartments_attachments`
--
ALTER TABLE `appartments_attachments`
  MODIFY `id_apartment_attachment` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `foto_hotel`
--
ALTER TABLE `foto_hotel`
  MODIFY `id_fotohotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id_hotel` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id_request` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
