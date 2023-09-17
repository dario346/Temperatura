-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 09:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temperatura`
--

-- --------------------------------------------------------

--
-- Table structure for table `linkovi`
--

CREATE TABLE `linkovi` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `linkovi`
--

INSERT INTO `linkovi` (`id`, `url`, `description`) VALUES
(1, 'http://localhost/Temp/?page=read&method=get&date=2023-09-17', 'Get endpoint by Date\r\nMust define page=read&method=get as example above and set date to value you want to search'),
(2, 'http://localhost/Temp/?page=read&method=get&city=Split', 'Get endpoint by City\r\nMust define page=read&method=get as example above and set Ctiy to value you want to search'),
(3, 'http://localhost/Temp/?page=read&method=get&city=Split&date=2023-09-18', 'Get endpoint Get by City and Date \r\nMust define page=read&method=get as example above and set date and city to value you want to search'),
(4, 'http://localhost/Temp/?page=create&method=post&city=Split&date=2023-09-23&temperature=20', 'Post endpoint Post temperature by City and Date \r\nMust define page=create&method=post as example above and set temperature,date and city to value you want to search\r\nIf Temperature for said day already exists, you will not be able to create new record');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `temperature` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `city`, `temperature`, `date`) VALUES
(1, 'Split', 24, '2023-09-17'),
(2, 'Split', 25, '2023-09-17'),
(3, 'Split', 24, '2023-09-18'),
(4, 'Split', 45, '2023-09-18'),
(5, 'Zagreb', 17, '2023-09-18'),
(6, 'Zagreb', 22, '2023-09-18'),
(11, 'Split', 20, '2023-09-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `linkovi`
--
ALTER TABLE `linkovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `linkovi`
--
ALTER TABLE `linkovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
