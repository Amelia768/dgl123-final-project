-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2021 at 01:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpsons_archives`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `voiced_by` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`first_name`, `last_name`, `age`, `occupation`, `voiced_by`, `image_url`, `status`) VALUES
('Homer', 'Simpson', 40, 'Nuclear Safety Inspector', 'Dan Castellaneta', 'images/homer.png', 'unselected'),
('Marge', 'Homer', 40, 'Homemaker', 'Julie Kavner', 'images/marge.png', 'unselected'),
('Bart', 'Simpson', 10, 'Student', 'Nancy Cartwright', 'images/bart.png', 'unselected'),
('Lisa', 'Simpson', 8, 'Student', 'Yeardley Smith', 'images/lisa.png', 'unselected'),
('Maggie', 'Simpson', 8, '', '', 'images/maggie.png', 'unselected'),
('Moe', 'Szyslak', 55, 'Bartender', '', 'images/moe.png', 'unselected');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
