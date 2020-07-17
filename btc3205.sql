-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 04:03 PM
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
  `user_city` varchar(32) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `offset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_city`, `username`, `password`, `image_name`, `created_time`, `offset`) VALUES
(5, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', '', '2020-07-17 13:40:46', 0),
(6, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', '', '2020-07-17 13:40:46', 0),
(7, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', '', '2020-07-17 13:40:46', 0),
(8, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', '', '2020-07-17 13:40:46', 0),
(9, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', '', '2020-07-17 13:40:46', 0),
(10, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', '', '2020-07-17 13:40:46', 0),
(11, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', '', '2020-07-17 13:40:46', 0),
(12, 'John', 'Juma', 'Nairobi', 'gh', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', '', '2020-07-17 13:40:46', 0),
(13, 'John', 'Juma', 'Nairobi', 'gh', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c0', '', '2020-07-17 13:40:46', 0),
(14, 'qwe', 'ewq', 'Nairobi', 'qweewq', '489cd5dbc708c7e541de4d7cd91ce6d0f1613573b7fc5b40d3', '', '2020-07-17 13:40:46', 0),
(15, 'John', 'Videll', 'Nairobi', 'mgweshi', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12', '', '2020-07-17 13:40:46', 0),
(16, 'David', 'hg', 'Nairobi', 'dhg', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e99', '', '2020-07-17 13:40:46', 0),
(17, 'James ', 'Njenga', 'Kakamega', 'jamoj1', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12', '', '2020-07-17 13:40:46', 0),
(18, 'zx', 'zx', 'zx', 'zx', '$2y$10$B4zEnIGTWEEsYSKym8.UtukWgUMy6SFGPuVM8Xh2D5D', '', '0000-00-00 00:00:00', -180),
(19, 'as', 'as', 'as', 'as', '$2y$10$GCRdqmcqOBw/k08TBDNFJuwIEsccwEVGifig6dm/33r', '', '0000-00-00 00:00:00', -180),
(20, 'df', 'df', 'df', 'df', '$2y$10$piP..S/31If5T3tGcOyeEedGGF0oHV.BYjx3KcrdrRn', 'LogoMakr_9tpCj5_enhanced_textures_moderate.jpg', '0000-00-00 00:00:00', -180);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
