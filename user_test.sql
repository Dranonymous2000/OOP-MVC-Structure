-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 05:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`id`, `name`, `phone`, `email`, `dob`, `address`, `upload`, `password`) VALUES
(3, 'temi', '+2347061358465', 'temi@gmail.com', '2023-12-06', 'Airport road', 'user1702185910.pdf', '$2y$10$ULaWo3IRAMnGCnWMUa8tZOHeechSltZA//uEgAXD0ZZNlGnbYGfte'),
(4, 'olad', '0901234432', 'olad@gmail.cm', '2023-12-11', 'ikeja', 'user1702210887.pdf', '$2y$10$cN5sZQPLObxqoodmmV/QJubx6TX3U05FTKSyvLdg07O7J8dcfu9py'),
(10, 'temi', '12345678', 'yusuf@gmail.com', '0000-00-00', 'ikeja', 'yusuf.pdf', '$2y$10$GIeW8zRxrBwNkVJcPCJ2yueGNP2UkstYXG38YV/yezsYnnOq4gQgy'),
(12, 'Oropo', '09891111111', 'ff@gmail.com', '1995-12-06', 'agege', 'opebi.doc', ''),
(13, 'akoko', '09891111111', 'akoko@gmail.com', '1995-12-06', 'agege', 'akoko.doc', '$2y$10$cCkbk6LnpXVZ7RkF0lYSG.zm5FNMFaCP.IDA8pPGhZdwvuVQt3yFG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_blocked` int(255) NOT NULL,
  `user_createAt` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tes`
--
ALTER TABLE `tes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
