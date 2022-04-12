-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2022 at 05:11 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`productID`) VALUES
(6),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'featured'),
(2, 'marketplace');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `productCode` varchar(10) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `listPrice` decimal(10,2) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `imagePath` varchar(100) NOT NULL,
  `inCart` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `categoryID`, `productCode`, `productName`, `listPrice`, `stock`, `imagePath`, `inCart`) VALUES
(1, 1, 'book', 'Diary of a Wimpy Kid', '10.00', 0, 'images/diary_of_a_wimpy_kid.png', 0),
(2, 1, 'PH', 'PLACEHOLDER', '100.00', 0, 'images/placeholder.png', 0),
(3, 1, 'PH', 'PLACEHOLDER', '100.00', 0, 'images/placeholder.png', 0),
(4, 1, 'PH', 'PLACEHOLDER', '100.00', 0, 'images/placeholder.png', 0),
(5, 1, 'PH', 'PLACEHOLDER', '100.00', 0, 'images/placeholder.png', 0),
(6, 2, 'PH', 'PLACEHOLDER', '100.00', 0, 'images/placeholder.png', 1),
(7, 2, 'PH', 'PLACEHOLDER', '100.00', 0, 'images/placeholder.png', 1),
(8, 2, 'PH', 'PLACEHOLDER', '100.00', 1, 'images/placeholder.png', 0),
(9, 2, 'PH', 'PLACEHOLDER', '100.00', 1, 'images/placeholder.png', 0),
(10, 2, 'PH', 'PLACEHOLER', '100.00', 1, 'images/placeholder.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `date`, `user_type`) VALUES
(1, 62607, 'testing1234', 'testing', '2022-02-08 16:17:39', 0),
(2, 716324, 'test', '1234', '2021-12-07 02:59:13', 0),
(3, 868857, 'admin', '1234', '2022-03-24 23:44:50', 1),
(4, 93033303477282698, 'nwadike1234', '1234', '2022-03-25 17:55:13', 0),
(5, 61939839636, 'user1234', '1234', '2022-03-25 14:31:10', 0),
(6, 244633750118402467, 'testing123456', '12345', '2022-03-25 18:00:41', 0),
(7, 78385, 'test1234', '1234', '2022-03-25 18:01:25', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
