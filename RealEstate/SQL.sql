-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 05:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `rooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `title`, `description`, `category`, `rooms`, `bathrooms`, `created_at`, `images`, `price`) VALUES
(1, NULL, 'Banese me qira', 'Banese me qira ne Ulpiane', 'Rent', 5, 2, '2020-09-02', NULL, '30000.00'),
(2, 10, 'Banese', 'Banese ne shitje', 'Sale', 4, 2, '2020-09-03', NULL, '40000.00'),
(3, NULL, 'Shtepi', 'Shtepia ne shitje', 'Sale', 6, 2, '2020-08-11', NULL, '90000.00'),
(4, 13, 'Banes', 'Banes me qira', 'Rent', 3, 1, '2020-07-16', NULL, '25000.00'),
(5, NULL, 'Shtepi', 'Shtepi me qira', 'Rent', 4, 1, '2020-08-27', NULL, '85000.00'),
(6, 12, 'Banes', 'Banes ne shitje', 'Sale', 4, 2, '2020-08-28', NULL, '45000.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`) VALUES
(10, 'Kastriot', 'Berisha', 'kast@yahoo.com', 'kastriot', '$2y$10$5XKCH3Gs4qw2KIg/zuXUJ.13LpY8FpqGQBVUG6vaRg54l6qU3EPxO'),
(12, 'Filan', 'Fisteku', 'filan@yahoo.com', 'Filan', '$2y$10$1oKAKGQ/7KLBpctFI2.VYetscP0KTmEw.S88JiKO/vYhApQ4pQPo.'),
(13, 'Ana', 'Kabashi', 'ana@yahoo.com', 'Ana', '$2y$10$muMDy./BgRRnYjuQk.7e2OjR4VvFfF5X/ZjBZnPgTqqfKN931Mqum'),
(16, 'Arbnor', 'Gashi', 'arbnor.gashi99@gmail.com', 'Arbnor', '$2y$10$E53Tj7KSMCJVo9rOlHPziurori1L/PpbuAhjoMamKsXIrNZKlUL0i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
