-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 08:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parallelize_app`
--

CREATE DATABASE IF NOT EXISTS `parallelize_app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `parallelize_app`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `user_email` varchar(60) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `comment` varchar(1024) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `execution_registration`
--

CREATE TABLE `execution_registration` (
  `user_email` varchar(60) NOT NULL,
  `end_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `kernel_id` int(11) NOT NULL,
  `results` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`results`)),
  `iteration_range_start` int(11) NOT NULL,
  `iteration_range_end` int(11) NOT NULL,
  `reward` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kernels`
--

CREATE TABLE `kernels` (
  `name` varchar(30) NOT NULL,
  `run_state` tinyint(1) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `results` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`results`)),
  `id` int(11) NOT NULL,
  `js_code` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `statistics` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`statistics`)),
  `total_reward` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `progress_map` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kernels`
--

INSERT INTO `kernels` (`name`, `run_state`, `user_email`, `results`, `id`, `js_code`, `statistics`, `total_reward`, `description`, `progress_map`) VALUES
('Matrix Multiplication', 0, 'test@test.es', '{}', 1, '//Generate matrices\r\nconst generateMatrices = () => {\r\n const matrices = [[], []]\r\n for (let y = 0; y < 512; y++){\r\n matrices[0].push([])\r\n matrices[1].push([])\r\n for (let x = 0; x < 512; x++){\r\n matrices[0][y].push(Math.random())\r\n matrices[1][y].push(Math.random())\r\n }\r\n }\r\n return matrices\r\n}\r\n\r\n//Calculate kernels\r\nconst gpu = new GPU();\r\nconst multiplyMatrix = gpu.createKernel(function(a, b) {\r\n let sum = 0;\r\n for (let i = 0; i < 512; i++) {\r\n sum += a[this.thread.y][i] * b[i][this.thread.x];\r\n }\r\n return sum;\r\n}).setOutput([512, 512])\r\n\r\n//Call the kernel\r\nconst matrices = generateMatrices()\r\nconst out = multiplyMatrix(matrices[0], matrices[1])\r\n\r\n//Log the output', '{\"description\":\"Este código utiliza la biblioteca GPU.js para realizar la multiplicación de dos matrices de tamaño 512x512 de forma paralela en la GPU.\", \"price\":\"0,02\"}', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `token_transactions`
--

CREATE TABLE `token_transactions` (
  `id` int(11) NOT NULL,
  `transaction_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quantity` double NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `description` varchar(60) NOT NULL DEFAULT 'sin descripcion',
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `token_transactions`
--

INSERT INTO `token_transactions` (`id`, `transaction_timestamp`, `quantity`, `user_email`, `description`, `balance`) VALUES
(15, '2023-03-16 18:28:50', 1, 'test@test.es', 'movimiento bancario', 1),
(16, '2023-03-16 18:28:53', 2, 'test@test.es', 'movimiento bancario', 3),
(17, '2023-03-16 18:28:56', 3, 'test@test.es', 'movimiento bancario', 6),
(18, '2023-03-16 18:28:59', 4, 'test@test.es', 'movimiento bancario', 10),
(19, '2023-03-16 18:29:02', 1, 'test@test.es', 'movimiento bancario', 11),
(20, '2023-03-16 18:29:04', 2, 'test@test.es', 'movimiento bancario', 13),
(21, '2023-03-16 18:29:07', 3, 'test@test.es', 'movimiento bancario', 16),
(22, '2023-03-16 18:29:09', 4, 'test@test.es', 'movimiento bancario', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `millis_crunched` int(11) NOT NULL DEFAULT 0,
  `ranking` int(11) NOT NULL DEFAULT -1,
  `tokens` double NOT NULL DEFAULT 0,
  `last_active` date NOT NULL DEFAULT current_timestamp(),
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `user_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_email`, `user_password`, `millis_crunched`, `ranking`, `tokens`, `last_active`, `blocked`, `user_name`) VALUES
('jaime2@gmail.com', '$2y$10$zyPdsVEjJ7uK.VUq7.t8YeS8PkbeqNthkH5jgJu6dor/o46baf1ru', 0, -1, 0, '2023-02-27', 0, 'jaime'),
('jaime@gmail.com', '$2y$10$8eOlgWYRiwIoQsQhoIJb5uMqzFEw2BqCH3pBgtkAW/E0.bp/ohhz2', 0, -1, 0, '2023-02-27', 0, 'jaime'),
('test@test.es', '$2y$10$CK0lm03ly46CaK8bSNgc9.sGKJ6inhBi8ndaoJm6viKUYKmg8mxMK', 0, -1, 20, '0000-00-00', 0, 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `execution_registration`
--
ALTER TABLE `execution_registration`
  ADD PRIMARY KEY (`kernel_id`,`iteration_range_start`),
  ADD KEY `user_email_fk_ex_reg` (`user_email`);

--
-- Indexes for table `kernels`
--
ALTER TABLE `kernels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email_fk` (`user_email`);

--
-- Indexes for table `token_transactions`
--
ALTER TABLE `token_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_fk` (`user_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kernels`
--
ALTER TABLE `kernels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `token_transactions`
--
ALTER TABLE `token_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `execution_registration`
--
ALTER TABLE `execution_registration`
  ADD CONSTRAINT `user_email_fk_ex_reg` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`);

--
-- Constraints for table `kernels`
--
ALTER TABLE `kernels`
  ADD CONSTRAINT `user_email_fk` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`);

--
-- Constraints for table `token_transactions`
--
ALTER TABLE `token_transactions`
  ADD CONSTRAINT `email_fk` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
