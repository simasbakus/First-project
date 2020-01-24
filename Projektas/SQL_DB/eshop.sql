-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2020 at 05:37 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `main_cat_name` varchar(40) NOT NULL,
  `sub_cat_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `main_cat_name`, `sub_cat_name`) VALUES
(1, 'Men', 'Pants'),
(2, 'Men', 'Shirts'),
(3, 'Men', 'Jackets'),
(4, 'Men', 'Hoodies'),
(5, 'Women', 'Pants'),
(6, 'Women', 'Shirts'),
(7, 'Women', 'Jackets'),
(8, 'Women', 'Hoodies'),
(9, 'Women', 'Skirts'),
(10, 'Women', 'Dresses'),
(11, 'Children', 'Pants'),
(12, 'Children', 'Shirts'),
(13, 'Children', 'Jackets'),
(14, 'Children', 'Hoodies'),
(15, 'Accessories', 'Hats'),
(16, 'Accessories', 'Sunglasses'),
(17, 'Accessories', 'Handbags'),
(18, 'Accessories', 'Backpacks'),
(19, 'Accessories', 'Wallets'),
(20, 'Accessories', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img_name` varchar(40) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img_name`, `position`, `item_id`) VALUES
(1, 'jeans1.jpg', 1, 1),
(2, 'pants-women.jpg', 2, 1),
(3, 'shirt.jpg', 1, 2),
(4, 'header.jpg', 2, 2),
(5, 'jacket.jpg', 1, 3),
(6, 'header.jpg', 2, 3),
(7, 'wallet.jpg', 1, 4),
(8, 'header.jpg', 2, 4),
(9, 'accessories.jpg', 3, 4),
(10, 'hoodie1.jpg', 1, 5),
(11, 'header.jpg', 2, 5),
(12, 'jeans2.jpg', 3, 1),
(13, 'jeans3.jpg', 4, 1),
(14, 'jeans4.jpg', 1, 6),
(15, 'jeans1.jpg', 2, 6),
(16, 'jeans3.jpg', 3, 6),
(17, 'jeans4.jpg', 2, 7),
(18, 'jeans3.jpg', 1, 7),
(19, 'jeans1.jpg', 3, 7),
(20, 'jeans1.jpg', 1, 8),
(21, 'jeans3.jpg', 2, 8),
(22, 'jeans4.jpg', 1, 9),
(23, 'pants-women.jpg', 2, 9),
(24, 'jeans3.jpg', 1, 10),
(25, 'jeans1.jpg', 2, 10),
(26, 'hoodie2.jpg', 3, 5),
(27, 'hoodie2.jpg', 1, 11),
(28, 'hoodie1.jpg', 2, 11),
(29, 'header.jpg', 1, 12),
(30, 'men.jpg', 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `about` varchar(500) NOT NULL,
  `maker` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `about`, `maker`, `price`, `quantity`) VALUES
(1, 'Kelnės', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Unnamed', 70, 300),
(2, 'Marškinėliai', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Unnamed', 52, 50),
(3, 'Švarkas', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Unnamed', 100, 100),
(4, 'Piniginė', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Unnamed', 10, 20),
(5, 'Džempas', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Unnamed', 40, 100),
(6, 'Kelnės', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Unnamed', 70, 300),
(7, 'Kelnės', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Unnamed', 70, 300),
(8, 'Kelnės', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Unnamed', 70, 300),
(9, 'Kelnės', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Unnamed', 70, 300),
(10, 'Kelnės', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Unnamed', 70, 300),
(11, 'Džempas', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Unnamed', 40, 100),
(12, 'Maike', 'Nieko nezinau cia tik bandymas', 'Nezinomas', 70, 200);

-- --------------------------------------------------------

--
-- Table structure for table `items_in_categories`
--

CREATE TABLE `items_in_categories` (
  `item_id` int(11) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_in_categories`
--

INSERT INTO `items_in_categories` (`item_id`, `categorie_id`) VALUES
(1, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(2, 6),
(3, 3),
(4, 19),
(5, 4),
(11, 4),
(12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `post_code` varchar(40) NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `lname`, `email`, `adress`, `post_code`, `total_price`, `user_id`, `order_date`) VALUES
(1, 'Simas', 'Bakus', 'si@d.com', 'jdddod', '34234', 10, 1, '2020-01-18 12:14:46'),
(2, 'Simas', 'Bakus', 'si@d.com', 'jdddod', '34234', 300, 1, '2020-01-18 12:17:10'),
(3, 'Antanas', 'Antanaitis', 'lalala@mail.com', 'LAisves alk', 'LT-22990', 50, 0, '2020-01-18 13:23:37'),
(4, 'Petras', 'Patricijus', 'petpa@petras.lt', 'Vilniaus g. 12, Kaunas', 'LT-29991', 280, 17, '2020-01-18 14:02:54'),
(5, 'Jonas', 'Jonauskas', 'jonas@mail.com', 'Jono g. 23, Kaunas', 'LT-11987', 220, 24, '2020-01-19 11:31:34'),
(6, 'Kazys', 'Kaziukas', 'kaz@mail.com', 'gatve', '1234', 30, 25, '2020-01-19 12:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `item_id`, `quantity`) VALUES
(1, 1, 4, 1),
(2, 2, 1, 1),
(3, 2, 7, 1),
(4, 2, 11, 1),
(5, 2, 5, 3),
(6, 3, 4, 5),
(7, 4, 11, 1),
(8, 4, 3, 1),
(9, 4, 6, 2),
(10, 5, 6, 1),
(11, 5, 7, 1),
(12, 5, 11, 2),
(13, 6, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `post_code` varchar(40) NOT NULL,
  `privilliges` tinyint(1) DEFAULT NULL,
  `last_log_in` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `pass`, `name`, `lname`, `email`, `adress`, `post_code`, `privilliges`, `last_log_in`) VALUES
(23, 'admin', '$2y$10$OJPxo/KJn..ftA9XUSikVette.PRCiRZaVDltevqeJ3Asdo1pnssO', 'Admin', 'Admin', 'simas.bakus@gmail.com', 'nereikia', 'nera', 1, '2020-01-20 19:12:32'),
(24, 'jonasj', '$2y$10$jJawU3ooo.vsB3n0.37z1er7f0eOMQI1pBPGXJOPx8F09YcovNSN.', 'Jonas', 'Jonauskas', 'jonas@mail.com', 'Jono g. 23, Kaunas', 'LT-11987', 0, '2020-01-20 18:28:18'),
(25, 'kazkaz', '$2y$10$dsSDCvRQcLtjtsXgXKQGweIqNiJs1FZ/xosd9G1X1HVmj8D3a0bm.', 'Kazys', 'Kaziukas', 'kaz@mail.com', 'gatve', '1234', 0, '2020-01-20 19:13:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
