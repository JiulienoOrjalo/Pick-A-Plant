-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 08:18 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pick_a_plant`
--

-- --------------------------------------------------------

--
-- Table structure for table `dictionary`
--

CREATE TABLE `dictionary` (
  `id` int(255) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `scientific_name` varchar(255) NOT NULL,
  `common_name` varchar(255) NOT NULL,
  `plant_type` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `trivia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dictionary`
--

INSERT INTO `dictionary` (`id`, `photo`, `scientific_name`, `common_name`, `plant_type`, `family`, `region`, `description`, `trivia`) VALUES
(40, 'images/Mussaenda Philippica A. Rich. var. aurora Sulit.jpg', 'Mussaenda Philippica ', 'DoÃ±a Aurora', 'Shrub', 'Rubiaceae', 'Philippines, New Guinea', 'DoÃ±a Aurora is a shrub or small tree, 3 to 5 meters high. Leaves are opposite, broad-ovate, with short-pointed tips, dark green and glossy.                                             ', 'Plant is used for dysentery and snake bites.');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `status`) VALUES
(10, 174796615, 194029688, 'Test message Notification Count ', 0),
(11, 194029688, 174796615, 'upon clicking message icon notification count must be reset to 0 and redirect in this page', 0),
(12, 174796615, 194029688, 'test message', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buy`
--

CREATE TABLE `tbl_buy` (
  `id` int(255) NOT NULL,
  `seller_id` int(100) NOT NULL,
  `buyer_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `product_number` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `stocks` varchar(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `order_time` varchar(100) NOT NULL,
  `address_deliver` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(1000) NOT NULL,
  `status` int(100) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `reason2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_buy`
--

INSERT INTO `tbl_buy` (`id`, `seller_id`, `buyer_id`, `product_id`, `product_number`, `order_id`, `category`, `photo`, `name`, `description`, `location`, `price`, `quantity`, `stocks`, `total_price`, `seller_name`, `buyer_name`, `order_time`, `address_deliver`, `address`, `phone_number`, `status`, `reason`, `reason2`) VALUES
(296, 82, 81, 142, 'Prod 44863', 'Order 8923', 'Plants', 'images/plant_3.jpg', 'Snake Plant ', 'Sansevieria are evergreen perennials that can grow anywhere from eight inches to 12 feet high. Their', 'Dagupan City', '150', '1', '0', '150', 'jiujiu', 'jimsserrano', '             \r\n              04:29:21 am 05/21/2021\r\n\r\n              ', '623 San Gabriel Bonuan Boquig', '623 San Gabriel Bonuan Boquig', '09297918711', 3, '', ''),
(297, 82, 81, 144, 'Prod 10657', 'Order 3190', 'Gardening Tools', 'images/BDS8088_1.jpg', 'Shovel ', 'is a tool for digging, lifting, and moving bulk materials, such as soil, coal, gravel, snow, sand, o', 'Labrador', '330', '1', '5', '330', 'jiujiu', 'jimsserrano', '             \r\n              04:08:03 pm 05/25/2021\r\n\r\n              ', '623 San Gabriel Bonuan Boquig', '623 San Gabriel Bonuan Boquig', '09297918711', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cancel`
--

CREATE TABLE `tbl_cancel` (
  `id` int(255) NOT NULL,
  `seller_id` int(100) NOT NULL,
  `buyer_id` int(100) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `order_time` varchar(100) NOT NULL,
  `address_deliver` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category`) VALUES
(3, 'Plants'),
(4, 'Gardening Tools'),
(6, 'Fertilizer'),
(7, 'Seeds');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_check`
--

CREATE TABLE `tbl_check` (
  `id` int(11) NOT NULL,
  `product_id` int(100) NOT NULL,
  `buyer_id` int(100) NOT NULL,
  `seller_id` int(100) NOT NULL,
  `product_number` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `stocks` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_price` int(100) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `deliv_address` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `buyer_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_check`
--

INSERT INTO `tbl_check` (`id`, `product_id`, `buyer_id`, `seller_id`, `product_number`, `order_id`, `category`, `photo`, `name`, `description`, `location`, `quantity`, `stocks`, `price`, `total_price`, `seller_name`, `phone_number`, `deliv_address`, `address`, `buyer_name`) VALUES
(160, 142, 81, 82, 'Prod 44863', 'Order 8894', 'Plants', 'images/plant_3.jpg', 'Snake Plant', 'Sansevieria are evergreen perennials that can grow anywhere from eight inches to 12 feet high. Their', 'Dagupan City', 1, '5', 150, 150, 'jiujiu', '09297918711', '623 San Gabriel Bonuan Boquig', '623 San Gabriel Bonuan Boquig', 'jimsserrano'),
(161, 144, 81, 82, 'Prod 10657', 'Order 7117', 'Gardening Tools', 'images/BDS8088_1.jpg', 'Shovel', 'is a tool for digging, lifting, and moving bulk materials, such as soil, coal, gravel, snow, sand, o', 'Labrador', 1, '5', 330, 330, 'jiujiu', '09297918711', '623 San Gabriel Bonuan Boquig', '623 San Gabriel Bonuan Boquig', 'jimsserrano');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `ratings` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_time` varchar(100) NOT NULL,
  `one` int(100) NOT NULL,
  `two` int(100) NOT NULL,
  `three` int(100) NOT NULL,
  `four` int(100) NOT NULL,
  `five` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `product_id`, `name`, `profile`, `plant`, `ratings`, `comment`, `comment_time`, `one`, `two`, `three`, `four`, `five`) VALUES
(68, 142, 'jims', '', 'Snake Plant', '5', 'asdada', '              05:54:57 pm 05/23/2021       ', 0, 0, 0, 0, 1),
(69, 143, 'jims', '', 'Welcome Plant', '0.8', 'asdasda', '              06:12:20 pm 05/23/2021       ', 1, 0, 0, 0, 0),
(70, 144, 'jims', '', 'Shovel', '2.8', 'sasda', '              06:14:28 pm 05/23/2021       ', 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reported_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(255) NOT NULL,
  `seller_id` int(100) NOT NULL,
  `product_number` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `family` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `sale` varchar(100) NOT NULL,
  `price` varchar(255) NOT NULL,
  `new_price` varchar(100) NOT NULL,
  `stocks` int(100) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `status` int(100) NOT NULL,
  `ratings` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `seller_id`, `product_number`, `category`, `photo`, `name`, `description`, `location`, `family`, `origin`, `sale`, `price`, `new_price`, `stocks`, `seller_name`, `status`, `ratings`) VALUES
(142, 82, 'Prod 44863', 'Plants', 'images/plant_3.jpg', 'Snake Plant', 'Sansevieria are evergreen perennials that can grow anywhere from eight inches to 12 feet high. Their sword-like leaves are approximately two feet long. The foliage is stiff, broad, and upright, in a dark green color variegated with white and yellow stripi', 'Dagupan City', '', '', '50', '300', '150', 4, 'jiujiu', 0, '5'),
(143, 82, 'Prod 28398', 'Plants', 'images/p2.jpg', 'Welcome Plant', 'is a herbaceous plant growing to 45–60 cm tall, from a stout underground, succulent rhizome. It is normally evergreen, but becomes deciduous during drought, surviving drought due to the large potato-like rhizome that stores water until rainfall resumes.', 'Labrador', '', '', '50', '350', '175', 5, 'jiujiu', 0, '0.8'),
(144, 82, 'Prod 10657', 'Gardening Tools', 'images/BDS8088_1.jpg', 'Shovel', 'is a tool for digging, lifting, and moving bulk materials, such as soil, coal, gravel, snow, sand, or ore. Most shovels are hand tools consisting of a broad blade fixed to a medium-length handle. Shovel blades are usually made of sheet steel or hard plast', 'Labrador', '', '', '45', '600', '330', 5, 'jiujiu', 0, '2.8'),
(145, 82, 'Prod 27804', 'Fertilizer', 'images/unnamed.jpg', 'Organic fertilizer', 'Dried cow manure for plants', 'Labrador', '', '', '50', '250', '125', 5, 'jiujiu', 0, ''),
(146, 82, 'Prod 96204', 'Seeds', 'images/1420696676627.jpeg', 'Sunflower Seeds', 'Grow your own Sunflower at home', 'Labrador', '', '', '5', '250', '237.5', 5, 'jiujiu', 0, ''),
(150, 82, 'Prod 95058', 'Gardening Tools', 'images/graduated-bucket-without-buttom-s-steel-10l.jpg', 'Stainless bucket', 'a bucket', 'Labrador', '', '', '', '350', '350', 5, 'jiujiu', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ratebuyer`
--

CREATE TABLE `tbl_ratebuyer` (
  `id` int(255) NOT NULL,
  `buyer_id` int(255) NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `ratings` varchar(255) NOT NULL,
  `one` int(100) NOT NULL,
  `two` int(100) NOT NULL,
  `three` int(100) NOT NULL,
  `four` int(100) NOT NULL,
  `five` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ratebuyer`
--

INSERT INTO `tbl_ratebuyer` (`id`, `buyer_id`, `buyer_name`, `ratings`, `one`, `two`, `three`, `four`, `five`) VALUES
(1, 81, 'jimsserrano', '4', 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id` int(255) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` varchar(100) NOT NULL,
  `delivaddress` varchar(100) NOT NULL,
  `u_type` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `status` int(100) NOT NULL,
  `status2` varchar(255) NOT NULL,
  `status3` int(255) NOT NULL,
  `reset_link_token` varchar(255) NOT NULL,
  `exp_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id`, `unique_id`, `profile`, `firstname`, `lastname`, `username`, `address`, `email`, `phoneno`, `delivaddress`, `u_type`, `password`, `status`, `status2`, `status3`, `reset_link_token`, `exp_date`) VALUES
(81, 174796615, '184409464_315376483435061_8445211756313085971_n.jpg', 'James joseph', 'Serrano', 'jimsserrano', '623 San Gabriel Bonuan Boquig', 'jims.serrano2@gmail.com', '09297918711', '623 San Gabriel Bonuan Boquig', 'Buyer', '$2y$10$K.5LxIl75Qd.uMpAV6yLlet8/5hEI.i.2sw7h7oL0Wu5LeePT4Qo.', 0, 'Active now', 0, '', ''),
(82, 194029688, '184409464_315376483435061_8445211756313085971_n.jpg', 'Jiulieno', 'Orjalo', 'jiujiu', 'Labrador', 'jiu.orjalo@gmail.com', '2026971000', '', 'Seller', '$2y$10$MkKAog48RcMXEcmoMCDOt.dCI3UUrXNuRAdyB8EbrehcAeYY6nVYm', 0, 'Active now', 0, '', ''),
(84, 869444590, '', 'Joseph ', 'Serrano', 'joseph', 'san gabriel', 'joseph@gmail.com', '09297918711', '', 'Seller', '$2y$10$FBqqr54gAlbk4fsRE/77TuOpFFvdNQ/9SWSRUDUcgGQAbvrH8RzUa', 0, 'Active Now', 0, '', ''),
(86, 408463535, '', 'James', 'Serrano', 'jims', 'San Gabriel St. bonuan boquig', 'jims.serrano2@gmail.com', '09297918711', '', 'Buyer', '$2y$10$f0/kpcGvRwjropxxOzzFg.rhF.Rwk2DW1aWUhElZ/lI1L87Ujmf7m', 0, 'Active now', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reply`
--

CREATE TABLE `tbl_reply` (
  `id` int(255) NOT NULL,
  `comment_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `reply_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `id` int(100) NOT NULL,
  `seller_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `reported_time` varchar(100) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`id`, `seller_id`, `name`, `seller_name`, `reason`, `reported_time`, `status`) VALUES
(211, 82, 'jimsserrano', 'jiujiu', 'Prohibited Items', '                07:22:04 pm 05/17/2021                  \r\n                ', 0),
(212, 82, 'jimsserrano', 'jiujiu', 'Offensive Chat Messages/Images', '                04:40:41 pm 05/19/2021                  \r\n  \r\n                ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reportbuyer`
--

CREATE TABLE `tbl_reportbuyer` (
  `id` int(255) NOT NULL,
  `buyer_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_reportbuyer`
--

INSERT INTO `tbl_reportbuyer` (`id`, `buyer_id`, `name`, `buyer_name`, `reason`) VALUES
(2, 81, 'jiujiu', 'jimsserrano', 'Directing transaction outside Pick-a-Plant');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stars`
--

CREATE TABLE `tbl_stars` (
  `id` int(255) NOT NULL,
  `product_id` int(100) NOT NULL,
  `plant` varchar(255) NOT NULL,
  `stars` varchar(100) NOT NULL,
  `one` varchar(100) NOT NULL,
  `two` varchar(100) NOT NULL,
  `three` varchar(100) NOT NULL,
  `four` varchar(100) NOT NULL,
  `five` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_superadmin`
--

CREATE TABLE `tbl_superadmin` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `u_type` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_superadmin`
--

INSERT INTO `tbl_superadmin` (`id`, `name`, `username`, `u_type`, `password`) VALUES
(10, 'Johnn', 'norway', 'Super Admin', '$2y$10$USEGqtxEbKg6.ed6cWuJWOWQkJGvuRNFMGqp8fpj8dgZP.QhsgDGu'),
(11, 'Jiulieno', 'luis', 'Super Admin', '$2y$10$AgA.Kp9R0wEerT91K52XduuQ19lTHCblraKAGaQq56at/q/WeEf5a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dictionary`
--
ALTER TABLE `dictionary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `tbl_buy`
--
ALTER TABLE `tbl_buy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `address` (`address`),
  ADD KEY `product_number` (`product_number`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_cancel`
--
ALTER TABLE `tbl_cancel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_check`
--
ALTER TABLE `tbl_check`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `tbl_ratebuyer`
--
ALTER TABLE `tbl_ratebuyer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reply`
--
ALTER TABLE `tbl_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `tbl_reportbuyer`
--
ALTER TABLE `tbl_reportbuyer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyer_id` (`buyer_id`),
  ADD KEY `buyer_id_2` (`buyer_id`);

--
-- Indexes for table `tbl_stars`
--
ALTER TABLE `tbl_stars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_superadmin`
--
ALTER TABLE `tbl_superadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dictionary`
--
ALTER TABLE `dictionary`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_buy`
--
ALTER TABLE `tbl_buy`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `tbl_cancel`
--
ALTER TABLE `tbl_cancel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_check`
--
ALTER TABLE `tbl_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tbl_ratebuyer`
--
ALTER TABLE `tbl_ratebuyer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_reply`
--
ALTER TABLE `tbl_reply`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `tbl_reportbuyer`
--
ALTER TABLE `tbl_reportbuyer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stars`
--
ALTER TABLE `tbl_stars`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_superadmin`
--
ALTER TABLE `tbl_superadmin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_buy`
--
ALTER TABLE `tbl_buy`
  ADD CONSTRAINT `tbl_buy_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `tbl_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_buy_ibfk_2` FOREIGN KEY (`buyer_id`) REFERENCES `tbl_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_buy_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_check`
--
ALTER TABLE `tbl_check`
  ADD CONSTRAINT `tbl_check_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `tbl_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_check_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `tbl_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_ratebuyer`
--
ALTER TABLE `tbl_ratebuyer`
  ADD CONSTRAINT `tbl_ratebuyer_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `tbl_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD CONSTRAINT `tbl_report_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `tbl_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_reportbuyer`
--
ALTER TABLE `tbl_reportbuyer`
  ADD CONSTRAINT `tbl_reportbuyer_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `tbl_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_stars`
--
ALTER TABLE `tbl_stars`
  ADD CONSTRAINT `tbl_stars_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
