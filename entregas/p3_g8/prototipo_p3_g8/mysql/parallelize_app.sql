-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2023 a las 11:24:08
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parallelize_app`
--
CREATE DATABASE IF NOT EXISTS `parallelize_app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `parallelize_app`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `user_email` varchar(60) NOT NULL,
  `comment` varchar(1024) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`user_email`, `comment`) VALUES
('diego@email.com', 'buah, una web genial, 10/10'),
('diego@email.com', 'pues ya no me gusta, todo mal'),
('jaime@email.com', 'kfhkfhjkfk'),
('jaime@email.com', 'hola,lugo,fjdsaf,asdfads'),
('jaime@email.com', '1,2,3,4,5,6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `execution_segments`
--

CREATE TABLE `execution_segments` (
  `user_email` varchar(60) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `kernel_id` int(11) NOT NULL,
  `results` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `iteration_start` int(11) NOT NULL,
  `iteration_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `execution_segments`
--

INSERT INTO `execution_segments` (`user_email`, `start_time`, `kernel_id`, `results`, `iteration_start`, `iteration_end`) VALUES
('diego@email.com', '2023-04-08 11:40:08', 3, '3.158519983291626,3.1618800163269043,3.146239995956421,3.1557199954986572,3.157639980316162,3.150439977645874,3.1510000228881836,3.1449599266052246,3.155479907989502,3.147239923477173,3.151479959487915', 0, 11),
('diego@email.com', '2023-04-08 11:40:09', 3, '3.160799980163574,3.152439832687378,3.155759811401367,3.159359931945801,3.150399923324585,3.155479907989502,3.163679838180542,3.154599905014038,3.1547999382019043,3.1531598567962646,3.1608798503875732', 11, 22),
('diego@email.com', '2023-04-08 11:40:09', 3, '3.142439842224121,3.1468799114227295,3.1582000255584717,3.149439811706543,3.1409599781036377,3.158639907836914,3.1491198539733887,3.148319959640503,3.1477198600769043,3.1507599353790283,3.1531198024749756', 22, 33),
('diego@email.com', '2023-04-08 11:40:09', 3, '3.149479866027832,3.1476399898529053,3.1507198810577393,3.159359931945801,3.146639823913574,3.1551198959350586,3.157719850540161,3.1578400135040283,3.1528799533843994,3.148439884185791,3.1501998901367188', 33, 44),
('diego@email.com', '2023-04-08 11:40:09', 3, '3.1589198112487793,3.1469199657440186,3.1488399505615234,3.1469199657440186,3.1552398204803467,3.1439998149871826,3.151279926300049,3.157599925994873,3.1476798057556152,3.15559983253479,3.152439832687378', 44, 55),
('diego@email.com', '2023-04-08 11:40:09', 3, '3.148439884185791,3.149519920349121,3.1486799716949463,3.153479814529419,3.1467998027801514,3.146279811859131,3.1539998054504395,3.1608798503875732,3.1431198120117188,3.170959949493408,3.1528799533843994', 55, 66),
('diego@email.com', '2023-04-08 11:40:09', 3, '3.1439199447631836,3.159799814224243,3.1480000019073486,3.152240037918091,3.148279905319214,3.1471199989318848,3.1389198303222656,3.161520004272461,3.1468799114227295,3.1488800048828125,3.152559995651245', 66, 77),
('diego@email.com', '2023-04-08 11:40:10', 3, '3.1506400108337402,3.1510398387908936,3.1579198837280273,3.156359910964966,3.1469998359680176,3.1437599658966064,3.1510000228881836,3.1489598751068115,3.1407599449157715,3.151719808578491,3.150359869003296', 77, 88),
('diego@email.com', '2023-04-08 11:40:10', 3, '3.15447998046875,3.1447999477386475,3.1461198329925537,3.152559995651245,3.1558399200439453,3.146559953689575,3.156559944152832,3.148599863052368,3.1527998447418213,3.1629998683929443,3.142119884490967', 88, 99),
('diego@email.com', '2023-04-08 11:40:10', 3, '3.149319887161255', 99, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kernels`
--

CREATE TABLE `kernels` (
  `name` varchar(30) NOT NULL,
  `is_finished` tinyint(1) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `id` int(11) NOT NULL,
  `js_code` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `reward_per_line` double NOT NULL,
  `total_reward` double NOT NULL,
  `description` longtext NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `iteration_count` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `kernels`
--

INSERT INTO `kernels` (`name`, `is_finished`, `user_email`, `id`, `js_code`, `reward_per_line`, `total_reward`, `description`, `upload_time`, `iteration_count`) VALUES
('deveres de FAL', 0, 'jaime@email.com', 2, 'return i;', 0.71428571428571, 100, 'buah, pues si yo te contara lo que hace, te quedabas cuajao', '2023-04-06 14:53:50', 2000),
('calcular pi', 1, 'diego@email.com', 3, 'function is_inside_circle(x,y){\n 	return x*x+y*y &lt; 1 ? 1 : 0;         \n}\n\nlet res = 0;\n\nfor(let t = 0; t &lt; 100000; t++){\n   	res += is_inside_circle(Math.random(),Math.random());\n}\n\nreturn res / 25000;', 0.0047619047619048, 10, 'calcula pi con montecarlo', '2023-04-08 11:28:45', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token_transactions`
--

CREATE TABLE `token_transactions` (
  `id` int(11) NOT NULL,
  `transaction_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quantity` double NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `description` varchar(60) NOT NULL DEFAULT 'sin descripcion',
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `millis_crunched` int(11) NOT NULL DEFAULT 0,
  `ranking` int(11) NOT NULL DEFAULT -1,
  `tokens` double NOT NULL DEFAULT 0,
  `last_active` date NOT NULL DEFAULT current_timestamp(),
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `user_name` varchar(20) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_email`, `user_password`, `millis_crunched`, `ranking`, `tokens`, `last_active`, `blocked`, `user_name`, `is_admin`) VALUES
('admin@parallelize.com', '$2y$10$zQ06ag.N33pYnOk9Q.SVpOe90sKAjviDXIf5ZBT5zzJpXgtcYr2Mi', 0, -1, 0, '2023-04-12', 0, 'admin', 1),
('borjal@ucm.es', '$2y$10$Grc.4A8YQQFlmf6.xsPSsulr9KnJG8Iuu4UlGs0Wd21AGeSBqtuFy', 0, -1, 0, '2023-04-12', 0, 'Borja Lopez', 0),
('diego@email.com', '$2y$10$3TxN6531suwgIbfla70l3ujKv5XAgCSuNkBq7fJDGoecWGClaL4ZW', 0, -1, 0, '2023-04-06', 0, 'Diego Quiroga', 0),
('jaime@email.com', '$2y$10$rlrTSZHZoeyQrnQuxfrWSeoBaV8jmvcKvq4bxuLKD0xCJ/NKRSHjC', 0, -1, 0, '2023-04-06', 0, 'Jaime Gonzalez', 0),
('jaimev@ucm.es', '$2y$10$8lC/xKDpJeoiZs/oheFy.e.722qgLOZdvCVGU5rUslHvJvgWwasxe', 0, -1, 0, '2023-04-12', 0, 'Jaime Vazquez', 0),
('juan@email.com', '$2y$10$NvppguKXJyqI929HtOftLuPucBoS9LJL9ueMrbBarJL1QmpnipJm2', 0, -1, 0, '2023-04-06', 0, 'Juan Jerez', 0),
('juant@ucm.es', '$2y$10$o6wNhE2oqQnVxi9DRXefKe6sqk7SxggktnItTRmDasCO9TprmTYry', 0, -1, 0, '2023-04-12', 0, 'Juan Trillo', 0),
('laurar@ucm.es', '$2y$10$DIBDqzkXUj8/XtGqF1uWK.HfP8Qog7yKI7V5KwdK3jp3qIVPAnE/y', 0, -1, 0, '2023-04-12', 0, 'Laura Rodriguez', 0),
('luciam@ucm.es', '$2y$10$AbN5QqbgRYi42fKchanoGOmWLhVVANjSkFWRhrqu9BHkMylxml4qG', 0, -1, 0, '2023-04-12', 0, 'Lucia Marquez', 0),
('luz@ucm.es', '$2y$10$mBDcnGZMXDN0en/9v0wPhO8x/n64OWvMoFHgvjDQgoq2GuCku7vSO', 0, -1, 0, '2023-04-12', 0, 'Luz Rojas', 0),
('marcoj@ucm.es', '$2y$10$KJV3RNKeCnfTfEo.Rx7V5Ox6Pi8jn61d4jCxj6VAVZtzhmQLTGXMy', 0, -1, 0, '2023-04-12', 0, 'Marco Jim&eacute;nez', 0),
('marcos@email.com', '$2y$10$Yi.nxQT0Boj3jWbMjgd66.bSm3hZzpmbfxP1gHQKUerUKQ0ZLYFd2', 0, -1, 0, '2023-04-06', 0, 'Marcos Alonso', 0),
('martas@ucm.es', '$2y$10$VgRlv21OqmXycOsHIqehpuZIyp0aY2okfmrC168INEof1edOoR7YO', 0, -1, 0, '2023-04-12', 0, 'Marta Sillero', 0),
('pablop@ucm.es', '$2y$10$6VKBzixsytnVpbBqldfWlOmjHU8wVszs4oMwTaKRh5.Os7zuczphC', 0, -1, 0, '2023-04-12', 0, 'Pablo Perez', 0),
('susanao@ucm.es', '$2y$10$DYmCcgDDD.4opmwWHnqeCeDzT6yvwdIjCrgvZoae3qoaru.gh1pWq', 0, -1, 0, '2023-04-12', 0, 'Susana Bueno', 0),
('victorm@ucm.es', '$2y$10$AN67M/.Z0zwh6ZZpGPR69u4iwyo5K4BAKOrB4SSRWkHNyTbKY4QRe', 0, -1, 0, '2023-04-12', 0, 'Victor Martin', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD KEY `user_email` (`user_email`);

--
-- Indices de la tabla `execution_segments`
--
ALTER TABLE `execution_segments`
  ADD PRIMARY KEY (`kernel_id`,`iteration_start`),
  ADD KEY `user_email_fk_ex_reg` (`user_email`);

--
-- Indices de la tabla `kernels`
--
ALTER TABLE `kernels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email_fk` (`user_email`);

--
-- Indices de la tabla `token_transactions`
--
ALTER TABLE `token_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_fk` (`user_email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `kernels`
--
ALTER TABLE `kernels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `token_transactions`
--
ALTER TABLE `token_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `execution_segments`
--
ALTER TABLE `execution_segments`
  ADD CONSTRAINT `kernel_id_fk_ex_seg` FOREIGN KEY (`kernel_id`) REFERENCES `kernels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_email_fk_ex_seg` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `kernels`
--
ALTER TABLE `kernels`
  ADD CONSTRAINT `user_email_fk` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `token_transactions`
--
ALTER TABLE `token_transactions`
  ADD CONSTRAINT `email_fk` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `kernels` CHANGE `is_finished` `is_finished` TINYINT(1) NOT NULL DEFAULT '0'; 
