-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 21, 2019 at 04:15 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_idonify`
--

-- --------------------------------------------------------

--
-- Table structure for table `device_donations`
--

DROP TABLE IF EXISTS `device_donations`;
CREATE TABLE IF NOT EXISTS `device_donations` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `device_type` varchar(50) NOT NULL,
  `device_serial` varchar(50) NOT NULL,
  `device_qty` int(10) NOT NULL,
  `donation_date` timestamp NOT NULL,
  `donation_description` longtext NOT NULL,
  `donor_email` varchar(100) NOT NULL,
  PRIMARY KEY (`donation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_donations`
--

INSERT INTO `device_donations` (`donation_id`, `device_type`, `device_serial`, `device_qty`, `donation_date`, `donation_description`, `donor_email`) VALUES
(1, 'cellphone', '123456789', 1, '2019-05-09 07:00:00', 'Good condition.', 'brown@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
CREATE TABLE IF NOT EXISTS `donations` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_type` varchar(50) NOT NULL,
  `donation_qty` int(10) NOT NULL,
  `donation_date` timestamp NOT NULL,
  `donation_description` longtext NOT NULL,
  `donor_email` varchar(100) NOT NULL,
  PRIMARY KEY (`donation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donation_id`, `donation_type`, `donation_qty`, `donation_date`, `donation_description`, `donor_email`) VALUES
(1, 'cellphone', 1, '2019-05-08 07:00:00', 'The cellphone is fully functional', 'user@email.com'),
(4, 'laptop', 1, '2019-05-08 07:00:00', 'The laptop is used but is in good condition. Ready to be used.', 'brown@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(25) NOT NULL,
  `user_lname` varchar(25) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `email_confirmed` tinyint(4) NOT NULL,
  `token` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`, `user_type`, `email_confirmed`, `token`) VALUES
(27, 'user', 'test', 'test@email.com', '$2y$10$b9tHw6naY48Y8XshY5zE.eUpH/BdEhIxW7zcgpoSkRfxFaZICha0W', 'user', 1, ''),
(28, 'user', 'two', 'use@email.com', '$2y$10$rlPIWcS2KGYRFLzrA6kfw.TfCQ/EavZiiqS3xhe9je2k68.0ACamK', 'user', 0, '!5kShY/K)Z');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
