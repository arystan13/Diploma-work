-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 17 2020 г., 09:39
-- Версия сервера: 5.7.20
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `department_dbase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `componenttype`
--

CREATE TABLE `componenttype` (
  `id` int(11) NOT NULL,
  `component_type_title` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `componenttype`
--

INSERT INTO `componenttype` (`id`, `component_type_title`) VALUES
(1, 'Обязательный компонент'),
(2, 'Компонент по выбору');

-- --------------------------------------------------------

--
-- Структура таблицы `degree`
--

CREATE TABLE `degree` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `degree`
--

INSERT INTO `degree` (`id`, `title`, `year`) VALUES
(1, 'Бакалавр', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `direction`
--

CREATE TABLE `direction` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `direction`
--

INSERT INTO `direction` (`id`, `title`) VALUES
(1, 'Образование'),
(2, 'Технические науки и технологий');

-- --------------------------------------------------------

--
-- Структура таблицы `discipline`
--

CREATE TABLE `discipline` (
  `id` int(11) NOT NULL,
  `component_type_id` int(11) DEFAULT NULL,
  `discipline_type_id` int(11) DEFAULT NULL,
  `discipline_code` varchar(16) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `module_number` varchar(24) DEFAULT NULL,
  `discipline_name` varchar(191) DEFAULT NULL,
  `practice` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `discipline`
--

INSERT INTO `discipline` (`id`, `component_type_id`, `discipline_type_id`, `discipline_code`, `module_id`, `language_id`, `module_number`, `discipline_name`, `practice`) VALUES
(47, 1, 1, 'SIK 1101', 5, 2, 'ОМ 1(Г)', 'Современная история Казахстана ', NULL),
(48, 1, 1, 'Fil 2102', 5, 2, 'ОМ 1(Г)', 'Философия ', NULL),
(49, 2, 1, 'SP 2106', 6, 2, 'ОМ 2(Г)', 'Социология и политология', NULL),
(50, 2, 1, 'PPPRK 2106', 6, 2, 'ОМ 2(Г)', 'Политические процессы и партии в Республике Казахстан', NULL),
(51, 2, 1, 'OE 1107', 6, 2, 'ОМ 2(Г)', 'Основы экономики', NULL),
(52, 2, 1, 'OP 1107', 6, 2, 'ОМ 2(Г)', 'Основы права', NULL),
(53, 2, 1, 'OBZh 3108', 6, 2, 'ОМ 2(Г)', 'Основы безопасности жизнедеятельности', NULL),
(54, 2, 1, 'EUR 3108', 6, 2, 'ОМ 2(Г)', 'Экология и устойчивое развитие', NULL),
(55, 2, 1, 'APMOS 2209', 6, 2, 'ОМ 2(Г)', 'Актуальные проблемы и модернизация общественного сознания', NULL),
(56, 2, 1, 'Aba 2209', 6, 2, 'ОМ 2(Г)', 'Абаеведение', NULL),
(57, 1, 1, 'IYa 1103', 7, 2, 'ДМВРК 1(Г)', 'Иностранный язык', NULL),
(58, 1, 1, 'K(R)Ya 1104', 7, 2, 'ДМВРК 1(Г)', 'Казахский (Русский) язык', NULL),
(59, 1, 2, 'РK(R)Ya 2201', 7, 2, 'ДМВРК 1(Г)', 'Профессиональный казахский (русский) язык', NULL),
(60, 1, 2, 'POIYa 3202', 7, 2, 'ДМВРК 1(Г)', 'Профессионально-ориентированный иностранный язык', NULL),
(61, 1, 1, 'IKT 1105', 7, 2, 'ДМВРК 1(Г)', 'Информационно-коммуникационные технологии', NULL),
(62, 2, 2, 'TOI 1210', 7, 2, 'ДМВРК 1(Г)', 'Теоретические основы информатики', NULL),
(63, 2, 2, 'TI 1210', 7, 2, 'ДМВРК 1(Г)', 'Теоретическая информатика', NULL),
(64, 1, 2, 'Mat 1204', 8, 2, 'ММ 1(Г)', 'Математика', NULL),
(65, 2, 2, 'DM 2211', 8, 2, 'ММ 1(Г)', 'Дискретная математика', NULL),
(66, 2, 2, 'TG 2211', 8, 2, 'ММ 1(Г)', 'Теория графов', NULL),
(67, 1, 2, 'Fiz 1203', 8, 2, 'ММ 1(Г)', 'Физика', NULL),
(68, 2, 2, 'FizII 2212', 8, 2, 'ММ 1(Г)', 'Физика II', NULL),
(69, 2, 2, 'FTT 2212', 8, 2, 'ММ 1(Г)', 'Физика твердых тел', NULL),
(70, 2, 2, 'TVMS 2213', 8, 2, 'ММ 1(Г)', 'Теория вероятностей и математическая статистика', NULL),
(71, 2, 2, 'PMS 2213', 8, 2, 'ММ 1(Г)', 'Прикладная математическая статистика', NULL),
(72, 2, 2, 'ML 2214', 8, 2, 'ММ 1(Г)', 'Математическая логика ', NULL),
(73, 2, 2, 'ModL 2214', 8, 2, 'ММ 1(Г)', 'Модальная логика', NULL),
(74, 1, 2, 'AP 1208', 9, 2, 'МС 1(Г)', 'Алгоритмизация и программирования', NULL),
(75, 2, 2, 'VP 1215', 9, 2, 'МС 1(Г)', 'Введение в программирование ', NULL),
(76, 2, 2, 'IOPYa 1215', 9, 2, 'МС 1(Г)', 'Интегрированное обучение предмета и языка', NULL),
(77, 2, 2, 'TP 1216', 9, 2, 'МС 1(Г)', 'Технология программирования ', NULL),
(78, 2, 2, 'ОTP 1216', 9, 2, 'МС 1(Г)', 'Основы технологии программирования ', NULL),
(80, 1, 3, 'SP 2301', 10, 2, 'МС 2(В)', 'Системное программирование', NULL),
(81, 1, 3, 'ISRP 3302', 10, 2, 'МС 2(В)', 'Инструментальные средства разработки программ', NULL),
(82, 2, 2, 'OTU 4217', 11, 2, 'МС 3(Г)', 'Основы теории управления', NULL),
(83, 2, 2, 'MMU 4217', 11, 2, 'МС 3(Г)', 'Модели и методы управления', NULL),
(84, 2, 2, 'MO 3218', 11, 2, 'МС 3(Г)', 'Методы оптимизации', NULL),
(85, 2, 2, 'OTIIO 3218', 11, 2, 'МС 3(Г)', 'Основы теории игр и исследование операций', NULL),
(86, 2, 3, 'EOP 4303', 11, 2, 'МС 3(Г)', 'Экономика и организация производства', NULL),
(87, 2, 3, 'Pre 4303', 11, 2, 'МС 3(Г)', 'Предпринимательство', NULL),
(88, 2, 2, 'Pre 4303', 12, 2, 'МС 4(Г)', 'Основы информационной безопасности', NULL),
(89, 2, 2, 'SK 3219', 12, 2, 'МС 4(Г)', 'Современная криптография', NULL),
(90, 2, 2, 'TI 2220', 12, 2, 'МС 4(Г)', 'Теория информации', NULL),
(91, 2, 2, 'TK 2220', 12, 2, 'МС 4(Г)', 'Теория кодирования', NULL),
(92, 1, 2, 'El 2205', 13, 2, 'МС 5(Г)', 'Электроника', NULL),
(93, 1, 2, 'ZS 3206', 13, 2, 'МС 5(Г)', 'Цифровая схематехника', NULL),
(94, 1, 2, 'AOCS 2207', 13, 2, 'МС 5(Г)', 'Архитектура и организация компьютерных систем', NULL),
(95, 2, 3, 'KS 4304', 13, 2, 'МС 5(Г)', 'Компьютерные сети', NULL),
(96, 2, 3, 'ST 4304', 13, 2, 'МС 5(Г)', 'Сети телекоммуникации', NULL),
(97, 2, 2, 'SSOI 2221', 13, 2, 'МС 5(Г)', 'Современные системы обработки информации', NULL),
(98, 2, 2, 'SPO 2221', 13, 2, 'МС 5(Г)', 'Специальное программное обеспечение', NULL),
(100, 2, 2, 'MMOVP 3222', 14, 2, 'МС 6(Г)', 'Математическое моделирование и организация вычислительных процессов', NULL),
(101, 2, 3, 'ZhM 3222', 14, 2, 'МС 6(Г)', 'Численные методы', NULL),
(102, 2, 3, 'SUBD 3305 ', 14, 2, 'МС 6(Г)', 'Системы управления базами данных', NULL),
(103, 2, 3, 'ORBD 3305', 14, 2, 'МС 6(Г)', 'Основы разработки баз данных', NULL),
(105, 2, 2, 'LP 3223', 15, 3, 'МС 1.1 (Г)', 'Логическое программирование ', NULL),
(106, 2, 2, 'PSC++B 3224', 15, 3, 'МС 1.1 (Г)', 'Программирование в среде С++ Builder ', NULL),
(107, 2, 3, 'YaPJ 3306', 15, 2, 'МС 1.1 (Г)', 'Языки программирования Java', NULL),
(108, 2, 3, 'ORO 3307', 16, 2, 'МС 1.2 (Г)', 'Основы распознования образов', NULL),
(109, 2, 3, 'IT 4308', 16, 3, 'МС 1.2 (Г)', 'Интернет-технологии', NULL),
(110, 2, 3, 'IKS 3309', 16, 2, 'МС 1.2 (Г)', 'Интерфейсы компьютерных систем', NULL),
(111, 2, 3, 'OR 4310', 17, 1, 'МС 1.3 (В)', 'Основы робототехники', NULL),
(112, 2, 3, 'TRPO 4311', 17, 2, 'МС 1.3 (В)', 'Технологии разработки программного обеспечения', NULL),
(114, 2, 2, 'YaPVP 3223', 18, 3, 'МС 2.1 (Г)', 'Язык программирования Visual Prolog', NULL),
(115, 2, 2, 'YaPC# 3224', 18, 1, 'МС 2.1 (Г)', 'Язык программирования C#', NULL),
(117, 2, 3, 'OOP 3306 ', 18, 2, 'МС 2.1 (Г)', 'Объектно-ориентированное программирование', NULL),
(118, 2, 3, 'KG 3307', 19, 1, 'МС 2.2 (Г)', 'Компьютерная графика ', NULL),
(119, 2, 3, 'ORWP 4308', 19, 3, 'МС 2.2 (Г)', 'Основы разработки web-приложений', NULL),
(120, 2, 3, 'IVP 3309', 19, 2, 'МС 2.2 (Г)', 'Интерфейсы взаимодействия приложений ', NULL),
(121, 2, 3, 'OIS 4310', 20, 1, 'МС 2.3 (В)', 'Основы интеллектуальных систем', NULL),
(122, 0, 5, '', 22, 0, 'PP', 'Учебная практика ', 1),
(123, 0, 5, '', 22, 0, 'PP', 'Производственная практика I', 1),
(124, 0, 5, '', 22, 0, 'PP', 'Производственная практика II', 1),
(125, 0, 5, '', 22, 0, 'PP', 'Производственная практика III', 1),
(128, 0, 5, '', 22, 0, 'PP', 'Преддипломная практика', 1),
(130, 0, 5, '', 23, 0, 'GES', 'Государственный экзамен по специальности ', 1),
(131, 0, 5, '', 23, 0, 'NZDR', 'Написание и защита дипломной работы (проекта) или сдача  государственных экзаменов по двум ПД', 1),
(132, 2, 3, 'PPO 4311', 20, 2, 'МС 2.3 (В)', 'Прикладное программное обеспечение', NULL),
(133, 0, 4, 'FK 1(2)401	', 24, 0, 'ДВО 401', 'Физическая культура	', NULL),
(134, 0, 5, '123', 22, 0, 'prof', 'Практика', 1),
(135, 2, 2, 'OOT 1211', 0, 2, '', 'Самопознания', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `disciplinetype`
--

CREATE TABLE `disciplinetype` (
  `id` int(11) NOT NULL,
  `discipline_type_title` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `disciplinetype`
--

INSERT INTO `disciplinetype` (`id`, `discipline_type_title`) VALUES
(1, 'Общеобязательные дисциплины'),
(2, 'Базовые дисциплины'),
(3, 'Профилирующие дисциплины'),
(4, 'Дополнительные виды обучения'),
(5, 'Профессиональная практика'),
(6, 'Итоговая аттестация');

-- --------------------------------------------------------

--
-- Структура таблицы `edtypes`
--

CREATE TABLE `edtypes` (
  `id` int(11) NOT NULL,
  `ed_type` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `edtypes`
--

INSERT INTO `edtypes` (`id`, `ed_type`) VALUES
(1, 'Лек'),
(2, 'Пр'),
(3, 'Лаб');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `degree_id` int(11) DEFAULT NULL,
  `mode_id` int(11) DEFAULT NULL,
  `enter_year` int(11) NOT NULL,
  `spec_id` int(11) UNSIGNED DEFAULT NULL,
  `rup_id` int(11) NOT NULL,
  `ball` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `language_id`, `degree_id`, `mode_id`, `enter_year`, `spec_id`, `rup_id`, `ball`) VALUES
(20, 'ИП-14-6р', 2, 1, 1, 2017, 1, 79, NULL),
(21, 'ИП-18-6а', 3, 1, 1, 2018, 1, 79, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `title` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`id`, `title`) VALUES
(1, 'kaz'),
(2, 'rus'),
(3, 'eng');

-- --------------------------------------------------------

--
-- Структура таблицы `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(191) DEFAULT NULL,
  `stepen_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `head` tinyint(1) DEFAULT NULL,
  `pps` tinyint(1) DEFAULT NULL,
  `stepen_plus` varchar(255) DEFAULT NULL,
  `state` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lecturers`
--

INSERT INTO `lecturers` (`id`, `full_name`, `stepen_id`, `position_id`, `head`, `pps`, `stepen_plus`, `state`) VALUES
(7, 'Даушеева Нұржамал Нұртөлеевна', 2, 3, NULL, 1, 'технических наук', 1.5),
(8, 'Стив Джобс', 3, 2, NULL, 1, 'технических наук', NULL),
(9, 'Билл Гейтс', 3, 2, NULL, 1, 'технических наук', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `mode`
--

CREATE TABLE `mode` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mode`
--

INSERT INTO `mode` (`id`, `title`) VALUES
(1, 'Дневная'),
(2, 'Дневная Сокращенная'),
(3, 'Вечерняя');

-- --------------------------------------------------------

--
-- Структура таблицы `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `module_name_id` int(10) NOT NULL,
  `module_number` varchar(24) NOT NULL,
  `module_name` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `modulename`
--

CREATE TABLE `modulename` (
  `id` int(11) NOT NULL,
  `module_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `modulename`
--

INSERT INTO `modulename` (`id`, `module_name`) VALUES
(5, 'Основы общественных наук\r\n\r\n'),
(6, 'Основы социальных наук\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(7, 'Модуль коммуникативной мобильности\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(8, 'Математические и естественно-научные основы'),
(9, 'Основы программирования'),
(10, 'Модуль инструментов интеграции приложений'),
(11, 'Теория управления и экономическая эффективность'),
(12, 'Основы теории информации'),
(13, 'Программно - аппаратное обеспечение вычислительной системы'),
(14, 'Управление базами данных'),
(15, 'Инструменты программирования'),
(16, 'Мультимедийные технологии'),
(17, 'Программная инженерия'),
(18, 'Инструменты разработки программ'),
(19, 'Web - технологии'),
(20, 'Soft - инжиниринг'),
(21, 'Модуль итоговой аттестации'),
(22, 'Научно-исследовательские навыки в профессиональной деятельности'),
(23, 'Государственная аттестация'),
(24, 'Формирования здорового образа жизни');

-- --------------------------------------------------------

--
-- Структура таблицы `pednagruzka`
--

CREATE TABLE `pednagruzka` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `rupdiscipline_id` int(11) NOT NULL,
  `practice` int(11) NOT NULL,
  `course_work` int(11) NOT NULL,
  `exam` float NOT NULL,
  `block` float NOT NULL,
  `year` int(11) NOT NULL,
  `tutor_connection` int(11) DEFAULT NULL,
  `diploma_leader` int(11) DEFAULT NULL,
  `lec` tinyint(1) DEFAULT NULL,
  `prac` tinyint(1) DEFAULT NULL,
  `lab` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pednagruzka`
--

INSERT INTO `pednagruzka` (`id`, `group_id`, `lecturer_id`, `rupdiscipline_id`, `practice`, `course_work`, `exam`, `block`, `year`, `tutor_connection`, `diploma_leader`, `lec`, `prac`, `lab`) VALUES
(13, 17, 5, 25, 1, 1, 1, 1, 2018, 1, 1, 1, NULL, NULL),
(14, 17, 6, 25, 1, 1, 1, 1, 2018, 1, 1, NULL, 1, NULL),
(15, 17, 7, 25, 1, 1, 1, 1, 2018, 1, 1, NULL, NULL, 1),
(16, 16, 5, 24, 4, 4, 4, 1, 2018, 1, 1, 1, NULL, NULL),
(17, 16, 6, 24, 4, 4, 4, 1, 2018, 1, 1, NULL, 1, NULL),
(18, 16, 6, 24, 4, 4, 4, 1, 2018, 1, 1, NULL, NULL, 1),
(19, 16, 6, 25, 1, 1, 1, 2, 2018, 2, 3, 1, NULL, NULL),
(20, 16, 7, 25, 1, 1, 1, 2, 2018, 2, 3, NULL, 1, NULL),
(22, 16, 5, 29, 1, 1, 123, 1, 2018, 1, 1, 1, NULL, NULL),
(23, 16, 8, 29, 1, 1, 123, 1, 2018, 1, 1, NULL, 1, NULL),
(24, 16, 9, 29, 1, 1, 123, 1, 2018, 1, 1, NULL, NULL, 1),
(25, 20, 7, 77, 0, 1, 1, 4, 2020, 6, 0, 1, NULL, NULL),
(26, 20, 7, 77, 0, 1, 1, 4, 2020, 6, 0, NULL, 1, NULL),
(27, 20, 7, 77, 0, 1, 1, 4, 2020, 6, 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `position`
--

INSERT INTO `position` (`id`, `title`) VALUES
(1, 'профессор'),
(2, 'доцент'),
(3, 'стр. преподаватель'),
(4, 'преподаватель'),
(5, 'магистр'),
(6, 'лаборант'),
(7, 'методист');

-- --------------------------------------------------------

--
-- Структура таблицы `practicecredits`
--

CREATE TABLE `practicecredits` (
  `id` int(11) NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `rupdiscipline_id` int(11) DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `ects` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `practicecredits`
--

INSERT INTO `practicecredits` (`id`, `semester`, `rupdiscipline_id`, `week`, `credits`, `ects`) VALUES
(3, 4, 104, 4, 1, 1),
(4, 4, 105, 2, 2, 2),
(5, 2, 106, 10, 2, 1),
(6, 4, 107, 4, 1, 1),
(7, 6, 108, 4, 1, 1),
(8, 7, 109, 4, 2, 1),
(9, 8, 110, 10, 4, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `ready`
--

CREATE TABLE `ready` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ready`
--

INSERT INTO `ready` (`id`, `title`) VALUES
(1, 'Высшее техническое образование'),
(2, 'Высшее профессиональное образование');

-- --------------------------------------------------------

--
-- Структура таблицы `rup`
--

CREATE TABLE `rup` (
  `id` int(11) NOT NULL,
  `spec_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `degree_id` int(11) UNSIGNED DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `mode_id` int(11) NOT NULL,
  `direction_id` int(11) DEFAULT NULL,
  `ready_id` int(11) DEFAULT NULL,
  `direction` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rup`
--

INSERT INTO `rup` (`id`, `spec_id`, `language_id`, `degree_id`, `year`, `mode_id`, `direction_id`, `ready_id`, `direction`) VALUES
(79, 1, 2, 1, 2017, 1, 2, 1, NULL),
(82, 1, 2, 1, 2018, 2, 1, 2, NULL),
(83, 1, 2, 1, 2018, 3, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `rupdiscipline`
--

CREATE TABLE `rupdiscipline` (
  `id` int(11) NOT NULL,
  `rup_id` int(11) NOT NULL,
  `discipline_title_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rupdiscipline`
--

INSERT INTO `rupdiscipline` (`id`, `rup_id`, `discipline_title_id`) VALUES
(1, 1, 31),
(2, 63, 41),
(3, 67, 41),
(4, 63, 41),
(5, 63, 41),
(6, 72, 43),
(7, 73, 42),
(16, 74, 46),
(18, 71, 42),
(19, 67, 45),
(20, 67, 42),
(21, 69, 43),
(22, 66, 43),
(23, 66, 46),
(24, 75, 46),
(25, 75, 45),
(27, 75, 43),
(28, 75, 42),
(29, 75, 45),
(30, 77, 46),
(31, 77, 44),
(32, 75, 46),
(33, 77, 45),
(34, 77, 42),
(35, 77, 46),
(37, 77, 44),
(39, 77, 42),
(40, 77, 43),
(41, 77, 43),
(42, 79, 47),
(43, 79, 48),
(44, 79, 49),
(45, 79, 51),
(46, 79, 53),
(47, 79, 55),
(49, 79, 57),
(50, 79, 57),
(51, 79, 58),
(52, 79, 58),
(53, 79, 59),
(54, 79, 60),
(55, 79, 61),
(56, 79, 62),
(57, 79, 64),
(58, 79, 65),
(59, 79, 67),
(60, 79, 68),
(61, 79, 70),
(62, 79, 72),
(63, 79, 74),
(64, 79, 75),
(65, 79, 77),
(67, 79, 80),
(68, 79, 81),
(69, 79, 82),
(70, 79, 84),
(71, 79, 86),
(72, 79, 88),
(73, 79, 90),
(74, 79, 92),
(75, 79, 93),
(76, 79, 94),
(77, 79, 95),
(78, 79, 97),
(79, 79, 100),
(80, 79, 102),
(81, 79, 105),
(82, 79, 106),
(83, 79, 107),
(84, 79, 108),
(85, 79, 109),
(86, 79, 110),
(87, 79, 111),
(88, 79, 112),
(89, 79, 114),
(90, 79, 115),
(91, 79, 117),
(92, 79, 118),
(93, 79, 119),
(94, 79, 120),
(95, 79, 121),
(96, 79, 132),
(106, 79, 122),
(107, 79, 123),
(108, 79, 124),
(109, 79, 125),
(110, 79, 128),
(111, 79, 133),
(112, 79, 133),
(113, 79, 133),
(114, 79, 133),
(115, 79, 135);

-- --------------------------------------------------------

--
-- Структура таблицы `spec`
--

CREATE TABLE `spec` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `spec`
--

INSERT INTO `spec` (`id`, `title`) VALUES
(1, '5B070400 Вычислительная техника и программное обеспечение');

-- --------------------------------------------------------

--
-- Структура таблицы `stepen`
--

CREATE TABLE `stepen` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stepen`
--

INSERT INTO `stepen` (`id`, `title`) VALUES
(1, 'Доктор '),
(2, 'Кандидат'),
(3, 'PhD Доктор');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `iin` varchar(255) DEFAULT NULL,
  `parents_tel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `full_name`, `group_id`, `tel`, `iin`, `parents_tel`) VALUES
(7, 'Раушан Амирова', 20, '+77056900360', '960713301047', '+77712505401'),
(8, 'Жайлауова Айгерим', 20, '+123', '123', '+123'),
(9, 'Бен Стиллер', 20, '+7777777', '123456789', '+666666'),
(10, 'Маржан Кайратқызы', 21, '+77056900360', '2001064912345', '+77056900360');

-- --------------------------------------------------------

--
-- Структура таблицы `subjectscredits`
--

CREATE TABLE `subjectscredits` (
  `id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `lek_credits` int(11) DEFAULT NULL,
  `pr_credits` int(11) DEFAULT NULL,
  `lab_credits` int(11) DEFAULT NULL,
  `rupdiscipline_id` int(11) UNSIGNED DEFAULT NULL,
  `course_work` tinyint(1) DEFAULT NULL,
  `gos` tinyint(1) DEFAULT '0',
  `exam` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subjectscredits`
--

INSERT INTO `subjectscredits` (`id`, `semester`, `lek_credits`, `pr_credits`, `lab_credits`, `rupdiscipline_id`, `course_work`, `gos`, `exam`) VALUES
(45, 2, 1, 1, 1, 24, NULL, 0, 1),
(46, 1, 2, 2, 2, 25, NULL, 0, 1),
(47, 4, 1, 1, 4, 26, NULL, 0, 1),
(48, 8, 4, 4, 4, 27, NULL, 0, 1),
(49, 5, 1, 2, 3, 28, NULL, NULL, 1),
(50, 2, 1, 4, 4, 29, NULL, 0, 1),
(51, 2, 3, 3, 3, 30, NULL, 0, 1),
(52, 2, 2, 1, 1, 31, NULL, 0, 1),
(53, 3, 1, 4, 4, 32, NULL, 0, 1),
(54, 3, 1, 2, 3, 33, NULL, 0, 1),
(55, 4, 1, 2, 3, 34, NULL, 0, 1),
(56, 5, 1, 4, 4, 38, NULL, 0, 1),
(57, 2, 4, 2, 3, 39, NULL, 0, 1),
(58, 2, 1, 1, 1, 41, NULL, 0, 1),
(59, 2, 1, 2, 0, 42, NULL, 0, 1),
(60, 4, 1, 2, 0, 43, NULL, 0, 1),
(61, 3, 1, 2, 0, 44, NULL, 0, 1),
(62, 1, 1, 2, 0, 45, NULL, 0, 1),
(63, 6, 1, 1, 0, 46, NULL, 0, 1),
(64, 4, 1, 1, 0, 47, NULL, 0, 1),
(65, 2, 0, 3, 0, 49, NULL, 0, 1),
(66, 1, 0, 3, 0, 50, NULL, NULL, 1),
(67, 1, 0, 3, 0, 51, NULL, NULL, 1),
(68, 2, 0, 3, 0, 52, NULL, NULL, 1),
(69, 3, 0, 2, 0, 53, NULL, NULL, 1),
(70, 5, 0, 2, 0, 54, NULL, NULL, 1),
(71, 1, 2, 0, 1, 55, NULL, NULL, 1),
(72, 1, 2, 0, 1, 56, NULL, NULL, 1),
(73, 1, 1, 2, 0, 57, NULL, NULL, 1),
(74, 3, 2, 2, 0, 58, NULL, NULL, 1),
(75, 2, 2, 1, 0, 59, NULL, NULL, 1),
(76, 3, 2, 0, 1, 60, NULL, NULL, 1),
(77, 3, 1, 2, 0, 61, NULL, NULL, 1),
(78, 4, 2, 1, 0, 62, NULL, NULL, 1),
(79, 1, 2, 0, 1, 63, NULL, NULL, 1),
(80, 2, 3, 0, 0, 64, NULL, NULL, 1),
(81, 2, 2, 0, 1, 65, NULL, NULL, 1),
(82, 0, 0, 0, 0, 66, NULL, NULL, 1),
(83, 4, 2, 0, 1, 67, NULL, NULL, 1),
(84, 5, 1, 0, 1, 68, NULL, NULL, 1),
(85, 7, 2, 0, 1, 69, 1, NULL, 1),
(86, 6, 2, 0, 1, 70, NULL, NULL, 1),
(87, 7, 2, 1, 0, 71, NULL, NULL, 1),
(88, 0, 2, 0, 1, 72, NULL, NULL, 1),
(89, 3, 2, 0, 1, 73, NULL, NULL, 1),
(90, 4, 1, 0, 1, 74, NULL, NULL, 1),
(91, 5, 1, 0, 1, 75, NULL, NULL, 1),
(92, 4, 2, 0, 1, 76, NULL, NULL, 1),
(93, 7, 2, 0, 1, 77, NULL, NULL, 1),
(94, 4, 2, 0, 1, 78, NULL, NULL, 1),
(95, 5, 2, 0, 1, 79, NULL, NULL, 1),
(96, 6, 2, 0, 1, 80, 1, NULL, 1),
(97, 5, 2, 0, 1, 81, NULL, NULL, 1),
(98, 6, 2, 0, 2, 82, NULL, NULL, 1),
(99, 6, 2, 0, 1, 83, NULL, NULL, 1),
(100, 5, 2, 0, 1, 84, NULL, NULL, 1),
(101, 7, 2, 0, 1, 85, NULL, NULL, 1),
(102, 5, 2, 0, 1, 86, NULL, NULL, 1),
(103, 7, 2, 0, 1, 87, NULL, NULL, 1),
(104, 7, 2, 0, 1, 88, NULL, NULL, 1),
(105, 5, 2, 0, 1, 89, NULL, NULL, 1),
(106, 6, 2, 0, 2, 90, NULL, NULL, 1),
(107, 6, 2, 0, 1, 91, NULL, NULL, 1),
(108, 5, 2, 0, 1, 92, NULL, NULL, 1),
(109, 7, 2, 0, 1, 93, 1, NULL, 1),
(110, 5, 2, 0, 1, 94, NULL, NULL, 1),
(111, 7, 2, 0, 1, 95, NULL, NULL, 1),
(112, 7, 2, 0, 1, 96, NULL, NULL, 1),
(115, 1, 0, 2, 0, 111, NULL, NULL, NULL),
(116, 2, 0, 2, 0, 112, NULL, NULL, 1),
(117, 3, 0, 2, 0, 113, NULL, NULL, NULL),
(118, 4, 0, 2, 0, 114, NULL, NULL, 1),
(119, 2, 1, 1, 0, 115, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'zhandos', 123);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `componenttype`
--
ALTER TABLE `componenttype`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `direction`
--
ALTER TABLE `direction`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `disciplinetype`
--
ALTER TABLE `disciplinetype`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `edtypes`
--
ALTER TABLE `edtypes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mode`
--
ALTER TABLE `mode`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modulename`
--
ALTER TABLE `modulename`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pednagruzka`
--
ALTER TABLE `pednagruzka`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `practicecredits`
--
ALTER TABLE `practicecredits`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ready`
--
ALTER TABLE `ready`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rup`
--
ALTER TABLE `rup`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rupdiscipline`
--
ALTER TABLE `rupdiscipline`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `spec`
--
ALTER TABLE `spec`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stepen`
--
ALTER TABLE `stepen`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subjectscredits`
--
ALTER TABLE `subjectscredits`
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
-- AUTO_INCREMENT для таблицы `componenttype`
--
ALTER TABLE `componenttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `degree`
--
ALTER TABLE `degree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `direction`
--
ALTER TABLE `direction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT для таблицы `disciplinetype`
--
ALTER TABLE `disciplinetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `edtypes`
--
ALTER TABLE `edtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `mode`
--
ALTER TABLE `mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `modulename`
--
ALTER TABLE `modulename`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `pednagruzka`
--
ALTER TABLE `pednagruzka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `practicecredits`
--
ALTER TABLE `practicecredits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `ready`
--
ALTER TABLE `ready`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `rup`
--
ALTER TABLE `rup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `rupdiscipline`
--
ALTER TABLE `rupdiscipline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT для таблицы `spec`
--
ALTER TABLE `spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `stepen`
--
ALTER TABLE `stepen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `subjectscredits`
--
ALTER TABLE `subjectscredits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
