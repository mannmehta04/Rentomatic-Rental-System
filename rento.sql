-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2023 at 02:02 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rento`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'admin1@gmail.com', 'admin01');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `totalDays` int(11) NOT NULL,
  `totalCost` float NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `place_id` (`place_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(6) NOT NULL AUTO_INCREMENT,
  `email` varchar(25) NOT NULL,
  `star_count` int(2) NOT NULL,
  `review` varchar(255) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `email`, `star_count`, `review`) VALUES
(4, 'ankuracharya96@gmail.com', 4, 'Good Houses, Nice Facilities');

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

DROP TABLE IF EXISTS `host`;
CREATE TABLE IF NOT EXISTS `host` (
  `host_id` int(6) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`host_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`host_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Mann', 'Mehta', 'mann@gmail.com', 'test01'),
(2, 'Akshar', 'Patel', 'akpatel@gmail.com', 'test01');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
CREATE TABLE IF NOT EXISTS `place` (
  `place_id` int(6) NOT NULL AUTO_INCREMENT,
  `host_id` int(20) NOT NULL,
  `traveler_id` varchar(25) NOT NULL,
  `placeName` varchar(20) NOT NULL,
  `placeType` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` int(6) NOT NULL,
  `maxGuest` int(2) NOT NULL,
  `bedCount` int(2) NOT NULL,
  `bedroomCount` int(2) NOT NULL,
  `bathroomCount` int(2) NOT NULL,
  `price` float NOT NULL,
  `startingDate` date NOT NULL,
  `lastDate` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `isListed` tinyint(1) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`place_id`),
  KEY `host_id` (`host_id`),
  KEY `traveler` (`traveler_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`place_id`, `host_id`, `traveler_id`, `placeName`, `placeType`, `address`, `city`, `state`, `pincode`, `maxGuest`, `bedCount`, `bedroomCount`, `bathroomCount`, `price`, `startingDate`, `lastDate`, `description`, `isListed`, `image`) VALUES
(33, 1, '0', 'Tulsi Villa', 'Villa', 'Sardar Patel Society, Karamsad Road', 'Vallabh Vidhynagar', 'Gujarat', 388120, 4, 4, 2, 2, 200, '2023-04-22', '2023-04-26', 'Amazing Villa with garden nearby', 1, 'house_(5).jpg'),
(34, 2, '0', 'Kailash', 'Bungalows', '302, 5th Lane, Akshar Road', 'Vallabh Vidhyanagar', 'Gujarat', 388120, 2, 2, 1, 1, 140, '2023-04-23', '2023-04-25', 'Small, Cozy and Budget Bungalows', 1, 'house_(31).jpg'),
(35, 1, '0', 'Shree Hari', 'Bungalows', 'Abmbawadi, Ketiwadi, near Shri AuroBindo Marg', 'Vallabh Vidhyanagar', 'Gujarat', 388120, 3, 2, 1, 1, 180, '2023-04-28', '2023-05-04', 'Peaceful residency with best facilities', 1, 'house_(20).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `traveler`
--

DROP TABLE IF EXISTS `traveler`;
CREATE TABLE IF NOT EXISTS `traveler` (
  `traveler_id` int(10) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `bDate` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  PRIMARY KEY (`traveler_id`),
  KEY `place_id` (`place_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traveler`
--

INSERT INTO `traveler` (`traveler_id`, `place_id`, `email`, `pass`, `first_name`, `last_name`, `gender`, `bDate`, `address`, `city`, `state`, `pincode`) VALUES
(1, 0, 'test@gmail.com', 'test01', 'Mann', 'Mehta', 'Male', '2004-03-04', 'vvn', 'vvn', 'gujarat', 388120),
(39, 0, 'ankuracharya96@gmail.com', 'Man1234@', 'Ankur', 'Acharya', 'Male', '2004-12-22', 'zoo', 'Bhatiya', 'Gujarat', 361325);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
