-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2019 at 02:02 PM
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `psw` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `psw`, `password`, `admin_type`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0),
(2, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0),
(27, 'jose', 'jose@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 0),
(28, 'kirkland', 'kirland@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 0),
(29, 'water', 'water@water.com', 'water', '9460370bb0ca1c98a779b1bcc6861c2c', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `donation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
-- Table structure for table `device_request_submission`
--

DROP TABLE IF EXISTS `device_request_submission`;
CREATE TABLE IF NOT EXISTS `device_request_submission` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `f_name` text,
  `l_name` text,
  `email` text,
  `occupation` text,
  `phone` text,
  `annualIncome` text,
  `additionalDetails` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_request_submission`
--

INSERT INTO `device_request_submission` (`id`, `f_name`, `l_name`, `email`, `occupation`, `phone`, `annualIncome`, `additionalDetails`) VALUES
(1, 'test', 'test2', 'test@test.com', 'sadsadsad', 'sdadsadsadsad', '2312321321', '123456'),
(4, 'sad', 'sadsad', 'sad@sad.com', 'test', 'sadasdddddd', '12321', '12213'),
(5, 'sad', 'sadsad', 'sad@sad.com', 'test', 'sadasdddddd', '12321', '12213');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
CREATE TABLE IF NOT EXISTS `donations` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_type` varchar(50) NOT NULL,
  `donation_qty` int(10) NOT NULL,
  `donation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `donation_description` longtext NOT NULL,
  `donor_email` varchar(100) NOT NULL,
  PRIMARY KEY (`donation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donation_id`, `donation_type`, `donation_qty`, `donation_date`, `donation_description`, `donor_email`) VALUES
(8, 'Macbook Pro', 1, '2019-05-20 07:00:00', 'Do not have use for it.', 'login@login.com');

-- --------------------------------------------------------

--
-- Table structure for table `monetary_donations`
--

DROP TABLE IF EXISTS `monetary_donations`;
CREATE TABLE IF NOT EXISTS `monetary_donations` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_amount` int(10) NOT NULL,
  `donation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `donation_description` longtext NOT NULL,
  `donor_email` varchar(100) NOT NULL,
  PRIMARY KEY (`donation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monetary_donations`
--

INSERT INTO `monetary_donations` (`donation_id`, `donation_amount`, `donation_date`, `donation_description`, `donor_email`) VALUES
(1, 100, '2019-05-09 07:00:00', 'Supporting money donation.', 'brown@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `psw` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `psw`, `password`, `user_type`) VALUES
(19, 'login', 'login@login.com', 'login', 'd56b699830e77ba53855679cb1d252da', '0'),
(20, 'water', 'water@water.com', 'water', '$2y$10$A/fqTCxuooKmCJysuFVeXeVaotgXRteD8oBIo8nnX99ipZB2.EVoK', '0'),
(21, 'user', 'user@user.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '0'),
(22, 'peanut', 'peanut@peanut.com', 'peanut', '4652b19e09ced75df510bf5a263a2bfe', '0'),
(23, 'pretzel', 'pretzel@pretzel.com', 'pretzel', '49f8dc01880c32d19ef8ba16cb22d8c0', '0'),
(24, 'cup', 'cup@cup.com', 'cup', 'f3f58ee455ae41da2ad5de06bf55e8de', '0'),
(25, 'test123', 'test123@test.com', 'test123', 'cc03e747a6afbbcbf8be7668acfebee5', '0');

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
  `user_role` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`, `user_role`) VALUES
(1, 'Joe', 'Brown', 'brown@email.com', '$2y$10$ZwQ.Y1Tvf5QsIevLVv4/2OYLTAWQ1l5o1NKSZ1ZyTkJHqzisOZY5W', 'user'),
(2, 'user1', 'last1', 'user1@email.com', '$2y$10$QPBjvhHJrN8qImNts6TOK.ShyREL2J5ouCfSMY0tvBn.JUwkErzzW', 'user'),
(3, 'user2', 'last2', 'user2@email.com', '$2y$10$p02S1Uek9hjx.HALmfd.BOjB75C7m1ra4qgGZguqXeM.xVUGbV.Ha', 'user'),
(4, 'user', 'last', 'user@email.com', '$2y$10$H/0FncUDsbL/ITp1/C/X3u7ed/4mgKnWQHCQrOU7p8s5CgVg.AOWm', 'user'),
(5, 'admin', 'admin', 'admin@email.com', '$2y$10$6ELNoF4/H3SiEUT8PsPVKebVxs5lvqup6B/A.9tcKdOOTypLLoTiW', 'admin'),
(15, 'new', 'user', 'newuser@email.com', '$2y$10$mGX92kCWsup7u7yDq1Tt/OzgURq.X3LRNW1fM/Lj.oMm5h62NMIx2', 'user'),
(16, 'new', 'user', 'newuser@email.com', '$2y$10$UqekQ5xXsMHhrLJg/nyzw.Qji6Hwr692Bn/4hfb56E56npUxnXwHa', 'user'),
(17, 'other', 'user@email.com', 'otheruser@email.com', '$2y$10$W8CRSBiS4cGoW02erLeOKeR/BRO6fE10i9Q5XEGEnTu9f9RKbPtJ6', 'user'),
(18, 'new', 'new', 'new@email.com', '$2y$10$sibuqWHCpnlbHd2QXExk4.9IIgMYZvhrJDvofKqSle0Z/Wmwd62Sa', 'user'),
(19, 'Jon', 'Brown', 'brown@email.com', '$2y$10$JSF4SmPBbiKe1NIOau2rkOQFgVc8f0JaFKBN3xwdeCpjuytKQzK5i', 'user'),
(20, 'juan', 'brown', 'brown@email.com', '$2y$10$ObNZd4QRn3uyh4YcZmPZdONuG9zKTErEm/C1/oRLFpZfR0qQDSOM.', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_form`
--

DROP TABLE IF EXISTS `volunteer_form`;
CREATE TABLE IF NOT EXISTS `volunteer_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` text,
  `l_name` text,
  `email` text,
  `phone` text,
  `q_phone` text,
  `q_repair_devices` text,
  `q_entering_data` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer_form`
--

INSERT INTO `volunteer_form` (`id`, `f_name`, `l_name`, `email`, `phone`, `q_phone`, `q_repair_devices`, `q_entering_data`) VALUES
(1, 'test', 'test', 'test@test.com', '12312321321', 'No', 'Yes', 'Yes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
