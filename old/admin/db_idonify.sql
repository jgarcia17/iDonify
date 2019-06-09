-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2019 at 11:15 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

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
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `device_type` varchar(100) NOT NULL,
  `household_number` int(20) NOT NULL,
  `household_income` int(20) NOT NULL,
  `document` varchar(255) NOT NULL,
  `request_description` varchar(255) NOT NULL,
  `request_type` varchar(50) NOT NULL,
  `device_serial` varchar(50) NOT NULL,
  `request_date` timestamp NOT NULL,
  `request_status` varchar(50) NOT NULL,
  `requester_email` varchar(100) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `device_type`, `household_number`, `household_income`, `document`, `request_description`, `request_type`, `device_serial`, `request_date`, `request_status`, `requester_email`) VALUES
(4, 'Computer', 1, 5000, '', 'Yearly income entered.', 'device', '', '2019-05-25 07:00:00', 'in progress', 'test@email.com'),
(5, 'Computer', 1, 5000, '', 'Screen broken, need repair.', 'service', '1234567890', '2019-05-30 07:00:00', 'in progress', 'joe@email.com');

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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`, `user_type`, `email_confirmed`, `token`) VALUES
(27, 'user', 'test', 'test@email.com', '$2y$10$b9tHw6naY48Y8XshY5zE.eUpH/BdEhIxW7zcgpoSkRfxFaZICha0W', 'user', 1, ''),
(28, 'user', 'two', 'use@email.com', '$2y$10$rlPIWcS2KGYRFLzrA6kfw.TfCQ/EavZiiqS3xhe9je2k68.0ACamK', 'user', 0, '!5kShY/K)Z'),
(29, 'joe', 'test', 'joe@email.com', '$2y$10$82GBloeloat337jUOjTtneQW3d0Rjrj1w.9aw45DUidjCdsjCx0Fq', 'user', 1, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
