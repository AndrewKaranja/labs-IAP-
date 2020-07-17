-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 02:58 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btc3205`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `api_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `units` int(11) DEFAULT NULL,
  `unit_price` double(3,2) DEFAULT NULL,
  `orer_status` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `city_name` varchar(32) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `city_name`, `username`, `password`, `image_name`) VALUES
(1, 'John', 'Juma', 'Nairobi', '', '', 'person.png'),
(2, 'John', 'Juma', 'Nairobi', '', '', 'person.png'),
(3, 'John', 'Juma', 'Nairobi', '', '', 'person.png'),
(4, 'John', 'Juma', 'Nairobi', '', '', 'person.png'),
(5, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', ''),
(6, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', ''),
(7, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', ''),
(8, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', ''),
(9, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', ''),
(10, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', ''),
(11, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', ''),
(12, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', ''),
(13, 'John', 'Juma', 'Nairobi', 'gh', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c0', ''),
(14, 'qwe', 'ewq', 'Nairobi', 'qweewq', '489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3', ''),
(15, 'John', 'Videll', 'Nairobi', 'mgweshi', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12', ''),
(16, 'David', 'hg', 'Nairobi', 'dhg', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e99', ''),
(17, 'James ', 'Njenga', 'Kakamega', 'jamoj1', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD CONSTRAINT `api_keys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
