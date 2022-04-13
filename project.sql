-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2022 at 05:55 PM
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
  `author` varchar(100) NOT NULL,
  `ISBN` int(13) NOT NULL,
  `listPrice` decimal(10,2) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `isBestSeller` int(11) NOT NULL,
  `imagePath` varchar(100) NOT NULL,
  `inCart` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `categoryID`, `productCode`, `productName`, `author`, `ISBN`, `listPrice`, `stock`, `genre`, `isBestSeller`, `imagePath`, `inCart`) VALUES
(1, 2, 'ebook', 'Life Flight', 'Lynette Eason', 0, '12.75', 0, 'Romantic', 0, 'images/lifeflightebook.jpeg', 0),
(2, 2, 'ebook', 'How To Stop Time', 'Matt Haig', 0, '10.99', 2000, 'Romantic', 0, 'images/howtostoptimeebook.jpeg', 0),
(3, 2, 'book', 'Freezing Order', 'Bill Browder', 0, '22.99', 1, 'Nonfiction', 0, 'images/freezingorderbook.jpeg', 0),
(4, 2, 'ebook', 'Hello Molly', 'Molly Shannon', 0, '27.99', 1, 'Nonfiction', 0, 'images/hellomollybook.jpeg', 0),
(5, 2, 'book', 'Against All Odds', 'Alex Kershaw', 0, '14.99', 10, 'Nonfiction', 0, 'images/againstalloddsbook.jpeg', 0),
(6, 2, 'book', 'Portrait Of A Thief', 'Grace D. Li', 0, '19.99', 2000, 'Nonfiction', 0, 'images/portraitofathiefbook.jpeg', 0),
(7, 2, 'book', 'Black Ops', 'Ric Prado', 0, '15.99', 1, 'Nonfiction', 0, 'images/blackopsbook.jpeg', 0),
(8, 2, 'PH', 'PLACEHOLDER2', '', 0, '100.00', 1, 'PH', 0, 'images/placeholder.png', 0),
(9, 2, 'PH', 'PLACEHOLDER3', '', 0, '100.00', 1, 'PH', 0, 'images/placeholder.png', 0),
(10, 2, 'PH', 'PLACEHOLDER4', '', 0, '100.00', 1, 'PH', 0, 'images/placeholder.png', 0),
(11, 2, 'book', 'Kaikeyi: A Novel', 'Vaishnavi Patel', 0, '21.99', 100, 'Fiction', 1, 'images/kaikeyianovel.jpeg', 0),
(12, 2, 'book', 'Spear', 'Nicola Griffith', 0, '16.99', 55, 'Fiction', 0, 'images/spear.jpeg', 0),
(13, 2, 'book', 'Nettle & Bone', 'T. Kingfisher', 0, '21.99', 55, 'Fiction', 0, 'images/nettleandbone.jpeg', 0),
(14, 2, 'book', 'The Wolf Den', 'Elodie Harper', 0, '13.49', 90, 'Fiction', 1, 'images/thewolfden.jpeg', 0),
(15, 2, 'book', 'Educated', 'Tara Westover', 0, '15.99', 95, 'Nonfiction', 1, 'images/educatedamemoir.jpeg', 0),
(16, 2, 'book', 'Night', 'Elie Wiesel', 0, '10.80', 250, 'Nonfiction', 1, 'images/night.jpeg', 0),
(17, 2, 'book', 'The Maid', 'Nita Prose', 0, '12.99', 400, 'Mystery', 1, 'images/themaid.jpeg', 0),
(18, 2, 'book', 'Cry Wolf', 'Hans Rosenfeldt', 0, '13.99', 300, 'Mystery', 1, 'images/crywolf.jpeg', 0),
(19, 2, 'book', 'The Harbor', 'Katrine Engberg', 0, '12.99', 100, 'Mystery', 0, 'images/theharbor.jpeg', 0),
(20, 2, 'book', 'The Family Plot', 'Megan Collins', 0, '22.99', 150, 'Mystery', 1, 'images/thefamilyplot.jpeg', 0);

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
(7, 78385, 'test1234', '1234', '2022-03-25 18:01:25', 0),
(8, 19424, 'testing12345', '12345', '2022-04-12 19:05:43', 0);

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
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
