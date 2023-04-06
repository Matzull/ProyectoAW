-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 06:14 PM
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
  `comment` varchar(1024) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`user_email`, `comment`) VALUES
('diego@email.com', 'buah, una web genial, 10/10'),
('diego@email.com', 'pues ya no me gusta, todo mal');

-- --------------------------------------------------------

--
-- Table structure for table `execution_segments`
--

CREATE TABLE `execution_segments` (
  `user_email` varchar(60) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `kernel_id` int(11) NOT NULL,
  `results` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `iteration_start` int(11) NOT NULL,
  `iteration_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kernels`
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
-- Dumping data for table `kernels`
--

INSERT INTO `kernels` (`name`, `is_finished`, `user_email`, `id`, `js_code`, `reward_per_line`, `total_reward`, `description`, `upload_time`, `iteration_count`) VALUES
('deveres de FAL', 0, 'jaime@email.com', 2, 'const very_hard = require(&quot;complicated&quot;) \r\nfunction stuf(){\r\n	going = on(&quot;here&quot;)\r\n}', 0.71428571428571, 100, 'buah, pues si yo te contara lo que hace, te quedabas cuajao', '2023-04-06 14:53:50', 20);

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
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('diego@email.com', '$2y$10$3TxN6531suwgIbfla70l3ujKv5XAgCSuNkBq7fJDGoecWGClaL4ZW', 0, -1, 0, '2023-04-06', 0, 'diego'),
('jaime@email.com', '$2y$10$rlrTSZHZoeyQrnQuxfrWSeoBaV8jmvcKvq4bxuLKD0xCJ/NKRSHjC', 0, -1, 0, '2023-04-06', 0, 'jaime'),
('juan@email.com', '$2y$10$NvppguKXJyqI929HtOftLuPucBoS9LJL9ueMrbBarJL1QmpnipJm2', 0, -1, 0, '2023-04-06', 0, 'juan'),
('marcos@email.com', '$2y$10$Yi.nxQT0Boj3jWbMjgd66.bSm3hZzpmbfxP1gHQKUerUKQ0ZLYFd2', 0, -1, 0, '2023-04-06', 0, 'marcos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `execution_segments`
--
ALTER TABLE `execution_segments`
  ADD PRIMARY KEY (`kernel_id`,`iteration_start`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `execution_segments`
--
ALTER TABLE `execution_segments`
  ADD CONSTRAINT `kernel_id_fk_ex_seg` FOREIGN KEY (`kernel_id`) REFERENCES `kernels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_email_fk_ex_seg` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kernels`
--
ALTER TABLE `kernels`
  ADD CONSTRAINT `user_email_fk` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `token_transactions`
--
ALTER TABLE `token_transactions`
  ADD CONSTRAINT `email_fk` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
