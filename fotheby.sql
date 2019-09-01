-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 11:55 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fotheby`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `role` varchar(10) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `firstname`, `lastname`, `gender`, `dob`, `contact`, `email`, `role`, `username`, `password`) VALUES
(4, 'testing', 'tester', 'F', '2004-05-27', '9817181728', 'testing@gmail.com', 'N', 'testing', '$2y$10$Mr/PZgmBOwfrC.nYEptM0eDm0NP6qSXxyt98DXmlrb2ZPzudHNVmW'),
(5, 'Pawan', 'Pokherel', 'M', '1987-03-27', '98172873128', 'pawan@gmail.com', 'P', 'pawan', '$2y$10$goAfT939f6lda7Oi5xQQsOwG0c0JzcADCWKr11DBV/athk58hEmZa');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bid_id` int(11) NOT NULL,
  `lot_number` int(8) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid_minimum` int(15) NOT NULL,
  `bid_maximum` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`bid_id`, `lot_number`, `user_id`, `bid_minimum`, `bid_maximum`) VALUES
(7, 10000020, 26, 130000, 140000),
(8, 10000016, 26, 150000, 190000),
(17, 10000014, 26, 11000, 11500),
(18, 10000021, 26, 14000, 14500);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category_name`) VALUES
(2, 'Drawings'),
(3, 'Paintings'),
(4, 'Photographic Images'),
(5, 'Sculptures'),
(6, 'Carvings');

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE `classifications` (
  `classif_id` int(11) NOT NULL,
  `classification_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classifications`
--

INSERT INTO `classifications` (`classif_id`, `classification_name`) VALUES
(1, 'Landscape'),
(2, 'Seascape'),
(3, 'Portrait'),
(4, 'Figure'),
(5, 'Still Life'),
(6, 'Nudes'),
(7, 'Animals'),
(8, 'Abstract');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(999) NOT NULL,
  `lot_number` int(8) NOT NULL,
  `event_time` time NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `lot_number`, `event_time`, `event_location`, `from_date`, `to_date`) VALUES
(5, 'Wave exhibition', 10000018, '03:35:00', 'Jorpati, Kathmandu', '2019-06-07', '0000-00-00'),
(6, 'Love Palette Exhibition', 10000020, '01:38:00', 'Gausala, Kathmandu', '2019-04-05', '2019-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `item_id` int(8) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `item_id`, `image_name`) VALUES
(7, 10000014, 'elephant.jpg'),
(8, 10000016, 'radha_krishna.jpg'),
(9, 10000017, 'tom.jpg'),
(10, 10000018, 'wave.jpg'),
(11, 10000019, 'artwork.jpg'),
(12, 10000020, 'LOVE_PALETTE.jpg'),
(13, 10000021, 'wolf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `lot_number` int(8) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `classif_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `description` varchar(9999) NOT NULL,
  `produced_year` date NOT NULL,
  `auction_date` date NOT NULL,
  `price` int(15) NOT NULL,
  `medium` varchar(255) DEFAULT NULL,
  `frame` varchar(5) DEFAULT NULL,
  `dimension` varchar(255) DEFAULT NULL,
  `image_type` varchar(10) DEFAULT NULL,
  `material` int(255) DEFAULT NULL,
  `weight` varchar(15) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`lot_number`, `cat_id`, `classif_id`, `item_name`, `artist`, `description`, `produced_year`, `auction_date`, `price`, `medium`, `frame`, `dimension`, `image_type`, `material`, `weight`, `status`) VALUES
(10000014, 2, 1, 'Elephant', 'Nabin Shrestha', 'Elephant drawing ', '2017-06-07', '2019-06-07', 11000, 'charcoal', 'Y', '300x200', '', 0, '', 'Sold'),
(10000016, 3, 2, 'Radha-Krishna', 'Rupak Shrestha', 'Radha Krishna Painting', '2017-06-07', '2019-06-05', 150000, 'ink', 'Y', '200x250', '', 0, '', 'Pending'),
(10000017, 6, 3, 'Tom', 'Nabin Shrestha', 'tom   ', '2016-05-05', '2019-08-07', 12000, '', 'Y', '500x400', '', 0, '500', 'Pending'),
(10000018, 3, 1, 'Wave', 'Nabin Shrestha', 'Wave Painting', '2016-10-22', '2019-07-07', 140000, 'ink', 'Y', '400x300', '', 0, '', 'Pending'),
(10000019, 5, 3, 'Dancing girl', 'Rupak Shrestha', 'Sculpture of Dancing Girl ', '2017-02-02', '2019-09-08', 160000, '', 'Y', '400x500', '', 0, '900', 'Sold'),
(10000020, 3, 8, 'Love Palette', 'Rupak Shrestha', 'Love Palette Painting ', '2014-06-05', '2020-02-07', 130000, 'ink', 'Y', '500x600', '', 0, '', 'Pending'),
(10000021, 2, 1, 'new item 1', 'santosh', 'new item from santosh ', '2016-06-11', '2019-06-11', 14000, 'charcoal', 'Y', '190x180', '', 0, '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `requested_users`
--

CREATE TABLE `requested_users` (
  `req_id` int(11) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `status` varchar(15) NOT NULL,
  `bank_account` varchar(150) NOT NULL,
  `bank_code` int(20) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requested_users`
--

INSERT INTO `requested_users` (`req_id`, `firstname`, `surname`, `gender`, `dob`, `contact`, `email`, `status`, `bank_account`, `bank_code`, `username`, `password`) VALUES
(1, 'Ganesh', 'Khadka', 'M', '1996-06-13', '9817161716', 'ganehkhadka@gmail.com', 'Buyer', '7671781718171862', 1234, 'ganesh', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `bank_account` varchar(150) NOT NULL,
  `bank_code` int(20) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `gender`, `dob`, `contact`, `email`, `status`, `bank_account`, `bank_code`, `username`, `password`) VALUES
(26, 'user1', 'using1', 'F', '1997-05-25', '187238190812', 'user1@user.com', 'Seller', '871319210923810', 1234, 'user1', '$2y$10$4r/ttj3MsCexvQsoKXDljOIHz69Hs5.h3yV.G2t3VSFc1LDjBo1wq'),
(27, 'Nabin', 'Shrestha', 'M', '1997-06-07', '98123819721', 'nabin@gmail.com', 'Buyer', '2018201720192017', 9876, 'nabin', '$2y$10$ypXaUcV7oXk6IulUfJEJEet6VkdSRwTy2rIycC41.grQ93ArfIKiG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `lot_number` (`lot_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`classif_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `lot_number` (`lot_number`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`lot_number`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `classif_id` (`classif_id`);

--
-- Indexes for table `requested_users`
--
ALTER TABLE `requested_users`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `classif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `lot_number` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000022;

--
-- AUTO_INCREMENT for table `requested_users`
--
ALTER TABLE `requested_users`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`lot_number`) REFERENCES `items` (`lot_number`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`lot_number`) REFERENCES `items` (`lot_number`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`classif_id`) REFERENCES `classifications` (`classif_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
