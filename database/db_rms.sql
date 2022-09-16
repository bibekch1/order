-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 06:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `admin_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`, `image_name`, `admin_type`) VALUES
(16, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'avatar.png', 'super admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `name`, `description`, `price`, `image_name`, `active`) VALUES
(14, 'momo', 'mitho momo with mitho achar', '100', 'menu_food_705.jpg', 'yes'),
(16, 'roti', 'nepali sukharoti for sugar patient.', '125', 'menu_food_415.jpg', 'no'),
(18, 'pie', 'applepie', '225', 'menu_food_107.jpg', 'yes'),
(19, 'mushroom soup', 'delicious wild mushroom', '225', 'menu_food_605.jpg', 'yes'),
(25, 'Burger', 'ham burger', '125', 'menu_food_844.jpg', 'yes'),
(26, 'choumin', 'chicken choumin', '100', 'menu_food_639.jpg', 'yes'),
(27, 'khana set', 'delicious khana set', '250', 'menu_food_814.png', 'yes'),
(28, 'sandwitch', 'with amul cheese', '100', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer`
--

CREATE TABLE `tbl_offer` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_offer`
--

INSERT INTO `tbl_offer` (`id`, `title`, `description`, `active`) VALUES
(3, 'sunday', 'at special price this item is available', 'yes'),
(6, 'NEW YEAR OFFER', 'From chitra 01 to baisakh15  we are offering 10% discount on combo pack (pizza, burger, coke, momo, choumin)', 'yes'),
(7, 'Enjoy!!15%OFF on food menu', 'Between 11 am to 2pm \r\noffer valid during lockdown period', 'yes'),
(8, 'Hot weekend offer', 'From friday to sunday at Rs 500 (one khajaset,Roti,pie)', 'yes'),
(9, 'Monday majja', 'special discount on monday for selected meal.', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food1` varchar(100) NOT NULL,
  `price1` decimal(10,0) NOT NULL,
  `quantity1` int(11) NOT NULL,
  `food2` varchar(150) NOT NULL,
  `price2` decimal(10,0) NOT NULL,
  `quantity2` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_number` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food1`, `price1`, `quantity1`, `food2`, `price2`, `quantity2`, `total`, `order_date`, `status`, `customer_name`, `customer_number`, `customer_email`, `customer_address`, `message`) VALUES
(1, 'vat', '225', 1, 'momo', '100', 1, '325', '2022-01-25 07:43:21', 'delivered', 'someone', '1234567890', 'takitalh@gmail.com', 'gaighat', 'make extra spicy.'),
(6, 'roti', '125', 3, 'momo', '100', 3, '675', '2022-01-25 07:50:54', 'on delivery', 'someone', '9845678457', 'someone@realtest.com', 'esrfdghj', 'asdfghjk'),
(9, 'vat', '225', 1, 'momo', '100', 1, '325', '2022-01-28 02:12:39', 'ordered', 'bibek', '9845678457', 'bbktalh@gmail.com', 'jaljale', ''),
(10, 'mushroom soup', '225', 12, 'burger', '125', 1, '2825', '2022-02-02 12:51:05', 'ordered', 'someone', '12', 'someone@realtest.com', 'jaljale', 'xitto'),
(11, 'burger', '125', 1, '', '0', 1, '125', '2022-02-02 01:14:14', 'ordered', 'bibek chaudhary', '9845678457', 'bbktalh@gmail.com', 'asfgh', ''),
(12, 'burger', '125', 2, '', '0', 1, '250', '2022-02-04 03:44:04', 'ordered', 'bibek', '9845678457', 'bbktalh@gmail.com', 'ga', ''),
(13, 'burger', '125', 1, 'momo', '100', 1, '225', '2022-02-25 03:42:20', 'ordered', 'bibek', '9845678457', 'bbktalh@gmail.com', 'gaighat', 'gaighat'),
(14, 'Burger', '125', 2, 'mushroom soup', '225', 1, '475', '2022-03-03 10:47:16', 'on delivery', 'someone', '9845678457', 'bbktalh@gmail.com', 'asdfghjk', 'asdfghjkl'),
(15, 'momo', '100', 1, '', '0', 1, '100', '2022-03-06 03:52:59', 'ordered', 'bibek', '9845678457', 'bbktalh@gmail.com', 'asf', ''),
(16, 'momo', '100', 1, '', '0', 1, '100', '2022-04-02 08:58:24', 'ordered', 'someone', '9845678457', 'someone@realtest.com', 'khjh', ''),
(17, 'momo', '100', 1, '', '0', 1, '100', '2022-04-02 09:15:48', 'ordered', 'bibek chaudhary', '9845678457', 'bbktalh@gmail.com', 'gaighat', ''),
(18, 'Burger', '125', 2, '', '0', 1, '250', '2022-07-17 12:57:15', 'ordered', 'bibek chaudhary', '9845678457', 'someone@realtest.com', 'gaighat', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `id` int(10) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `people` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_number` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`id`, `customer_name`, `people`, `date`, `time`, `status`, `customer_number`, `customer_email`, `message`) VALUES
(1, 'bibek', 4, '2022-02-17', '11:21:00', 'cancelled', '9845678457', 'takitalh@gmail.com', 'special'),
(2, 'bibek chaudhary', 3, '2022-04-07', '19:09:00', 'reserved', '9845678457', 'someone@realtest.com', ''),
(3, 'bibek chaudhary', 3, '2022-04-07', '19:09:00', 'reserved', '9845678457', 'someone@realtest.com', ''),
(4, 'bibek chaudhary', 3, '2022-04-07', '19:09:00', 'reserved', '9845678457', 'someone@realtest.com', ''),
(5, 'bibek chaudhary', 3, '2022-04-07', '19:09:00', 'reserved', '9845678457', 'someone@realtest.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `review` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`id`, `customer_name`, `review`, `active`, `image_name`) VALUES
(25, 'bibek chaudhary', 'something nice about restaurant and its services.', 'yes', 'avatar.png'),
(26, 'someone', 'some thing nice about restaurant.', 'yes', 'customer_846.jpg'),
(32, 'Aneela', 'I enjoyed every meal I had in this restaurant. They have excellent service with hygienic food. I highly recommend this restaurant to everyone.', 'yes', 'customer_910.jpg'),
(40, 'bibek', 'thid restaurat is good.', 'yes', 'avatar.png'),
(41, 'v', 'sdfghj', 'no', 'avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
