-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2017 at 11:10 AM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fish`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE IF NOT EXISTS `buyers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_name` varchar(255) DEFAULT NULL,
  `buyer_tel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `buyer_name`, `buyer_tel`) VALUES
(1, 'Madhawa Priyashantha', '252525252');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` varchar(255) DEFAULT NULL,
  `fish_type_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fish_type_id` (`fish_type_id`),
  KEY `buyer_id` (`buyer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `quantity`, `fish_type_id`, `buyer_id`) VALUES
(1, '23', 1, NULL),
(2, '23', 1, NULL),
(3, '234', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fish_types`
--

CREATE TABLE IF NOT EXISTS `fish_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fish_type` varchar(255) DEFAULT NULL,
  `fish_type_buying_price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fish_types`
--

INSERT INTO `fish_types` (`id`, `fish_type`, `fish_type_buying_price`) VALUES
(1, 'Salmons', '200'),
(2, 'shark', '23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`fish_type_id`) REFERENCES `fish_types` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
