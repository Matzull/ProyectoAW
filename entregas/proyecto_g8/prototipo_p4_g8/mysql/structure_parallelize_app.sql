-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2023 a las 17:55:58
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

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

CREATE USER 'parallelize'@'localhost' IDENTIFIED BY 'vus2Aequu7uidieparallelize';
GRANT SELECT, INSERT, UPDATE ON parallelize_app.* TO 'parallelize'@'localhost';
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `user_email` varchar(60) NOT NULL,
  `comment` varchar(1024) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `execution_segments`
--

CREATE TABLE `execution_segments` (
  `user_email` varchar(60) NOT NULL,
  `start_time` time(3) NOT NULL DEFAULT current_timestamp(3),
  `kernel_id` int(11) NOT NULL,
  `results` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `iteration_start` int(11) NOT NULL,
  `iteration_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estructura de tabla para la tabla `kernel_comments`
--

CREATE TABLE `kernel_comments` (
  `user_email` varchar(60) NOT NULL,
  `kernel_id` int(11) NOT NULL,
  `comment` varchar(1024) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `is_report` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estructura Stand-in para la vista `user_ranking`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `user_ranking` (
`user_email` varchar(60)
,`millis_crunched` int(11)
,`ranking` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `user_ranking`
--
DROP TABLE IF EXISTS `user_ranking`;

CREATE ALGORITHM = UNDEFINED DEFINER=`parallelize`@`localhost` SQL SECURITY DEFINER VIEW `user_ranking` AS 
SELECT `users`.`user_email` AS `user_email`, `users`.`millis_crunched` AS `millis_crunched`, 
row_number() OVER (ORDER BY `users`.`millis_crunched` DESC) AS `ranking` 
FROM `users`;

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
-- Indices de la tabla `kernel_comments`
--
ALTER TABLE `kernel_comments`
  ADD PRIMARY KEY (`user_email`,`kernel_id`,`time`),
  ADD KEY `kernel_id` (`kernel_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

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
-- Filtros para la tabla `kernel_comments`
--
ALTER TABLE `kernel_comments`
  ADD CONSTRAINT `kernel_comments_ibfk_1` FOREIGN KEY (`kernel_id`) REFERENCES `kernels` (`id`),
  ADD CONSTRAINT `kernel_comments_ibfk_2` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`);

--
-- Filtros para la tabla `token_transactions`
--
ALTER TABLE `token_transactions`
  ADD CONSTRAINT `email_fk` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;