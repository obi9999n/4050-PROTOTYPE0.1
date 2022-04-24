-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2022 at 10:40 PM
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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderNumber` mediumint(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `in_store` int(11) NOT NULL DEFAULT 0,
  `fulfilled` int(11) NOT NULL DEFAULT 0,
  `address` varchar(255) DEFAULT NULL,
  `datePlaced` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderNumber`, `user_name`, `total`, `in_store`, `fulfilled`, `address`, `datePlaced`) VALUES
(1, 12345, 'user', '25.00', 0, 0, '123 Main St, Athens, GA 30606', '2022-04-22');

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
  `ISBN` text NOT NULL,
  `listPrice` decimal(10,2) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `isBestSeller` int(11) NOT NULL,
  `description` text NOT NULL,
  `imagePath` varchar(100) NOT NULL,
  `inCart` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `categoryID`, `productCode`, `productName`, `author`, `ISBN`, `listPrice`, `stock`, `genre`, `isBestSeller`, `description`, `imagePath`, `inCart`) VALUES
(1, 2, 'ebook', 'Life Flight', 'Lynette Eason', '9780800737337', '12.75', 10, 'Romance', 1, 'EMS helicopter pilot Penny Carlton is used to high stress situations, but being forced to land on a mountain in a raging storm with a critical patient--and a serial killer on the loose--tests her skills and her nerve to the limit. She survives with FBI Special Agent Holt Satterfield\'s help. But she\'s not out of the woods yet.', 'images/lifeflightebook.jpeg', 0),
(2, 2, 'ebook', 'How To Stop Time', 'Matt Haig', '9780525522898', '10.99', 2000, 'Romance', 1, 'How to Stop Time tells a love story across the ages—and for the ages—about a man lost in time, the woman who could save him, and the lifetimes it can take to learn how to live.', 'images/howtostoptimeebook.jpeg', 0),
(3, 2, 'book', 'Freezing Order', 'Bill Browder', '9781982153281', '22.99', 1, 'Nonfiction', 1, 'At once a financial caper, an international adventure, and a passionate plea for justice, Freezing Order is a stirring morality tale about how one man can take on one of the most ruthless villains in the world—and win.', 'images/freezingorderbook.jpeg', 0),
(4, 2, 'ebook', 'Hello, Molly!', 'Molly Shannon', '9780783545042', '27.99', 1, 'Nonfiction', 0, 'Witty, winning, and told with tremendous energy and heart, Hello, Molly!, written with Sean Wilsey, sheds new and revelatory light on the life and work of one of our most talented and free-spirited performers.', 'images/hellomollybook.jpeg', 0),
(5, 2, 'book', 'Against All Odds', 'Alex Kershaw', '9780595387519', '14.99', 10, 'Nonfiction', 1, 'The untold story of four of the most decorated soldiers of World War II—all Medal of Honor recipients—from the beaches of French Morocco to Hitler’s own mountaintop fortress, by the national bestselling author of The First Wave', 'images/againstalloddsbook.jpeg', 0),
(6, 2, 'book', 'Portrait Of A Thief', 'Grace D. Li', '9780593184738', '19.99', 2000, 'Nonfiction', 1, 'Equal parts beautiful, thoughtful, and thrilling, Portrait of a Thief is a cultural heist and an examination of Chinese American identity, as well as a necessary cri­tique of the lingering effects of colonialism.', 'images/portraitofathiefbook.jpeg', 0),
(7, 2, 'book', 'Black Ops', 'Ric Prado', '9780744012736', '15.99', 2, 'Nonfiction', 0, 'A harrowing memoir of life in the shadowy world of assassins, terrorists, spies and revolutionaries, Black Ops is a testament to the courage, creativity and dedication of the Agency’s Special Activities Group and its elite shadow warriors.', 'images/blackopsbook.jpeg', 0),
(8, 2, 'book', 'Life of Pi', 'Yann Martel', '9780770430078', '34.95', 1, 'Fiction', 1, 'Life of Pi is a fantasy adventure novel by Yann Martel published in 2001. The protagonist, Piscine Molitor \"Pi\" Patel, a Tamil boy from Pondicherry, explores issues of spirituality and practicality from an early age. He survives 227 days after a shipwreck while stranded on a boat in the Pacific Ocean with a Bengal tiger named Richard Parker. ', 'images/lifeofpi.jpeg', 0),
(9, 2, 'book', 'Bimboland', 'Erin Taylor', '9781576879917', '14.95', 50, 'Poetry', 0, 'Erin Taylor’s Bimbloland is an astute and confident debut, balancing, in her blistering and tender style, her life as a sex worker and socialist politics. The poems are full of desire and vulnerability, insight and calls to action, both personal and societal. You can get lost in the insatiable pace of her words and the way in which you feel, as she feels, “powerful yet somehow / nothing.”', 'images/bimboland.jpeg', 0),
(10, 2, 'book', 'Finalists', 'Rae Armantrout', '9780819580689', '10.49', 100, 'Poetry', 1, 'What will we call the last generation before the looming end times? With Finalists Rae Armantrout suggests one option. Brilliant and irascible, playful and intense, Armantrout nails the current moment\'s debris fields and super computers, its sizzling malaise and confusion, with an exemplary immensity of heart and a boundless capacity for humor. The poems in this book find (and create) beauty in midst of the ongoing crisis.', 'images/finalists.jpeg', 0),
(11, 2, 'book', 'Kaikeyi: A Novel', 'Vaishnavi Patel', '9780759557338', '21.99', 100, 'Fiction', 1, 'A stunning debut from a powerful new voice, Kaikeyi is a tale of fate, family, courage, and heartbreak—of an extraordinary woman determined to leave her mark in a world where gods and men dictate the shape of things to come.', 'images/kaikeyianovel.jpeg', 0),
(12, 2, 'book', 'Spear', 'Nicola Griffith', '9781250819321', '16.99', 55, 'Fiction', 0, 'The girl knows she has a destiny before she even knows her name. She grows up in the wild, in a cave with her mother, but visions of a faraway lake come to her on the spring breeze, and when she hears a traveler speak of Artos, king of Caer Leon, she knows that her future lies at his court.', 'images/spear.jpeg', 0),
(13, 2, 'book', 'Nettle & Bone', 'T. Kingfisher', '9781250244048', '21.99', 1, 'Fiction', 0, 'After years of seeing her sisters suffer at the hands of an abusive prince, Marra—the shy, convent-raised, third-born daughter—has finally realized that no one is coming to their rescue. No one, except for Marra herself.', 'images/nettleandbone.jpeg', 0),
(14, 2, 'book', 'The Wolf Den', 'Elodie Harper', '9781838933531', '13.49', 90, 'Fiction', 1, 'Sold by her mother. Enslaved in Pompeii\'s brothel. Determined to survive. Her name is Amara. Welcome to the Wolf Den...  Amara was once a beloved daughter, until her father\'s death plunged her family into penury. Now she is a slave in Pompeii\'s infamous brothel, owned by a man she despises. Sharp, clever and resourceful, Amara is forced to hide her talents. For as a she-wolf, her only value lies in the desire she can stir in others.', 'images/thewolfden.jpeg', 0),
(15, 2, 'book', 'Educated', 'Tara Westover', '9780399590504', '15.99', 95, 'Nonfiction', 1, 'Educated is an account of the struggle for self-invention. It is a tale of fierce family loyalty and of the grief that comes with severing the closest of ties. With the acute insight that distinguishes all great writers, Westover has crafted a universal coming-of-age story that gets to the heart of what an education is and what it offers: the perspective to see one\'s life through new eyes and the will to change it.', 'images/educatedamemoir.jpeg', 0),
(16, 2, 'book', 'Night', 'Elie Wiesel', '9780374500016', '10.80', 250, 'Nonfiction', 1, 'Born in the town of Sighet, Transylvania, Elie Wiesel was a teenager when he and his family were taken from their home in 1944 to Auschwitz concentration camp, and then to Buchenwald. Night is the terrifying record of Elie Wiesel\'s memories of the death of his family, the death of his own innocence, and his despair as a deeply observant Jew confronting the absolute evil of man. ', 'images/night.jpeg', 0),
(17, 2, 'book', 'The Maid', 'Nita Prose', '9780593356159', '12.99', 400, 'Mystery', 1, 'A Clue-like, locked-room mystery and a heartwarming journey of the spirit, The Maid explores what it means to be the same as everyone else and yet entirely different—and reveals that all mysteries can be solved through connection to the human heart.', 'images/themaid.jpeg', 0),
(18, 2, 'book', 'Cry Wolf', 'Hans Rosenfeldt', '9781335425713', '13.99', 300, 'Mystery', 1, 'Hannah Wester, a policewoman in the remote northern town of Haparanda, Sweden, finds herself on the precipice of chaos.', 'images/crywolf.jpeg', 0),
(19, 2, 'book', 'The Harbor', 'Katrine Engberg', '9781797136318', '12.99', 100, 'Mystery', 0, 'When fifteen-year-old Oscar Dreyer-Hoff disappears, the police assume he’s simply a runaway—a typically overlooked middle child doing what teenagers do all around the world. But his frantic family is certain that something terrible has happened.', 'images/theharbor.jpeg', 0),
(20, 2, 'book', 'The Family Plot', 'Megan Collins', '9781432893293', '22.99', 150, 'Mystery', 1, 'At twenty-six, Dahlia Lighthouse has a lot to learn when it comes to the real world. Raised in a secluded island mansion deep in the woods and kept isolated by her true crime-obsessed parents, she has spent the last several years living on her own, but unable to move beyond her past—especially the disappearance of her twin brother Andy when they were sixteen.', 'images/thefamilyplot.jpeg', 0),
(21, 2, 'book', 'Dream Work', 'Mary Oliver', '9780871130693', '10.99', 150, 'Poetry', 0, 'Dream Work, a collection of forty-five poems, follows both chronologically and logically Mary Oliver\'s American Primitive, which won for her the Pulitzer Prize for the finest book of poetry published in 1983 by an American poet.', 'images/dreamwork.jpeg', 0),
(22, 2, 'book', 'Sandy Hook', 'Elizabeth Williamson', '9781524746575', '15.99', 75, 'Nonfiction', 0, 'Based on hundreds of hours of research, interviews, and access to exclusive sources and materials, Sandy Hook is Elizabeth Williamson’s landmark investigation of the aftermath of a school shooting, the work of Sandy Hook parents who fought to defend themselves, and the truth of their children’s fate against the frenzied distortions of online deniers and conspiracy theorists.', 'images/sandyhook.jpeg', 0),
(23, 2, 'book', 'Buy Black', 'Aria S. Halliday', '9780252044274', '24.95', 100, 'Nonfiction', 1, 'Buy Black examines the role American Black women play in Black consumption in the US and worldwide, with a focus on their pivotal role in packaging Black feminine identity since the 1960s. Through an exploration of the dolls, princesses, and rags-to-riches stories that represent Black girlhood and womanhood in everything from haircare to Nicki Minaj’s hip-hop, Aria S. Halliday spotlights how the products created by Black women have furthered Black women’s position as the moral compass and arbiter of Black racial progress. ', 'images/buyblack.jpeg', 0),
(24, 2, 'book', '37 Words', 'Sherry Boschert', '9781620975831', '20.99', 15, 'History', 1, 'In the tradition of the acclaimed documentary She\'s Beautiful When She\'s Angry, 37 Words offers a crucial playbook for anyone who wants to understand how we got here and who is horrified by current attacks on women\'s rights.', 'images/37words.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `promoID` int(11) NOT NULL,
  `promocode` varchar(5) NOT NULL,
  `promopercent` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`promoID`, `promocode`, `promopercent`) VALUES
(1, 'ABCDE', 20),
(2, 'ASDFG', 25);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zipCode` text NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_type` int(11) NOT NULL,
  `profile_pic` text NOT NULL,
  `verified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `firstName`, `lastName`, `email`, `address`, `city`, `state`, `zipCode`, `user_name`, `password`, `birthday`, `date`, `user_type`, `profile_pic`, `verified`) VALUES
(1, 62607, '', '', '', '', '', '', '', 'testing1234', 'testing', '0000-00-00', '2022-04-24 16:29:36', 0, 'images/default.jpeg', 0),
(2, 716324, '', '', '', '', '', '', '', 'test', '1234', '0000-00-00', '2022-04-24 16:29:37', 0, 'images/default.jpeg', 0),
(3, 868857, '', '', '', '', '', '', '', 'admin', '12345', '0000-00-00', '2022-04-24 16:31:37', 1, 'images/default.jpeg', 0),
(4, 93033303477282698, '', '', '', '', '', '', '', 'nwadike1234', '1234', '0000-00-00', '2022-04-24 16:29:38', 0, 'images/default.jpeg', 0),
(5, 61939839636, '', '', '', '', '', '', '', 'user1234', '1234', '0000-00-00', '2022-04-24 16:29:39', 0, 'images/default.jpeg', 0),
(6, 244633750118402467, '', '', '', '', '', '', '', 'testing123456', '12345', '0000-00-00', '2022-04-24 16:29:40', 0, 'images/default.jpeg', 0),
(7, 78385, '', '', '', '', '', '', '', 'test12345', '1234', '0000-00-00', '2022-04-24 16:29:41', 0, 'images/default.jpeg', 0),
(8, 19424, '', '', '', '', '', '', '', 'testing12345', '12345', '0000-00-00', '2022-04-24 16:29:41', 0, 'images/default.jpeg', 0),
(9, 3334561613138, '', '', '', '', '', '', '', 'vendor1', 'vendor1', '0000-00-00', '2022-04-24 16:29:43', 2, 'images/default.jpeg', 0),
(14, 22066799727, 'Darius', 'Nwadike', 'dariusnwadike@gmail.com', '3056 Lawson Drive Southwest', 'Marietta', 'GA', '30064', 'nwadike12345', 'testing', '2001-11-01', '2022-04-24 16:29:44', 0, 'images/default.jpeg', 0),
(15, 824336, 'Darius', 'Nwadike', 'dariusnwadike@gmail.com', '3056 Lawson Drive Southwest', 'Marietta', 'GA', '30064', 'dariusnwadike1', 'testing', '2001-11-01', '2022-04-24 16:29:45', 0, 'images/default.jpeg', 0),
(16, 2863214414, 'Darius', 'Nwadike', 'dariusnwadike@gmail.com', '3056 Lawson Drive Southwest', 'Marietta', 'GA', '30064', 'dariusnwadike1234', '1234', '2022-04-22', '2022-04-24 16:29:46', 0, 'images/default.jpeg', 0),
(17, 670322749, 'Darius', 'Nwadike', 'dariusnwadike@gmail.com', '3056 Lawson Drive Southwest', 'Marietta', 'GA', '30064', 'darius12345', '12345', '2022-04-22', '2022-04-24 16:29:47', 0, 'images/default.jpeg', 0),
(18, 81198163917613, 'Darius', 'Nwadike', 'dariusnwadike@gmail.com', '3056 Lawson Drive Southwest', 'Marietta', 'GA', '30064', 'darius2', '2', '2022-04-22', '2022-04-24 16:29:48', 0, 'images/default.jpeg', 0),
(19, 90133, 'Darius', 'Nwadike', 'larmensah@gmail.com', '3056 Lawson Drive Southwest', 'Marietta', 'GA', '30064', 'darius3', '3', '2022-04-22', '2022-04-24 16:29:50', 0, 'images/default.jpeg', 0),
(20, 2810035898912106, 'Darius', 'Nwadike', 'dariusnwadike@gmail.com', '3056 Lawson Drive Southwest', 'Marietta', 'GA', '30064', 'darius4', '4', '2022-04-24', '2022-04-24 16:34:26', 0, 'images/default.jpeg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
