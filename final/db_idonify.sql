-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg37.eigbox.net
-- Generation Time: Jun 22, 2019 at 01:46 AM
-- Server version: 5.6.41
-- PHP Version: 4.4.9
-- 
-- Database: `db_idonify`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `psw` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` VALUES (1, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0);
INSERT INTO `admin` VALUES (2, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0);
INSERT INTO `admin` VALUES (27, 'jose', 'jose@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 0);
INSERT INTO `admin` VALUES (28, 'kirkland', 'kirland@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 0);
INSERT INTO `admin` VALUES (29, 'water', 'water@water.com', 'water', '9460370bb0ca1c98a779b1bcc6861c2c', 0);
INSERT INTO `admin` VALUES (30, 'grace', 'grace@grace.com', 'grace', '15e5c87b18c1289d45bb4a72961b58e8', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `comments`
-- 

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `comments`
-- 

INSERT INTO `comments` VALUES (1, 'grace', 'Testing\r\n\r\n                ');
INSERT INTO `comments` VALUES (2, 'grace', '                    \r\nThis is a tet comment.\r\n\r\n                ');

-- --------------------------------------------------------

-- 
-- Table structure for table `contact`
-- 

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `contact`
-- 

INSERT INTO `contact` VALUES (1, 'Grace', 'Alvarez', 'ga.grace.ga@gmail.com', 2147483647, 'Test from Contact Us Form / contact.php', '2019-06-16 00:27:23');
INSERT INTO `contact` VALUES (2, 'Grace', 'Alvarez', 'ga.grace.ga@gmail.com', 2147483647, 'Test from Contact Us Form / contact.php', '2019-06-16 00:30:11');
INSERT INTO `contact` VALUES (3, 'Grace', 'Alvarez', 'ga.grace.ga@gmail.com', 2147483647, 'Test from Contact Us Form / contact.php', '2019-06-16 00:35:38');
INSERT INTO `contact` VALUES (4, 'Grace', 'Alvarez', 'ga.grace.ga@gmail.com', 2147483647, 'Test from Contact Us Form / contact.php', '2019-06-16 00:35:48');
INSERT INTO `contact` VALUES (5, 'Blue', 'Blue', 'blue@blue.com', 1234561234, 'Test from Contact.php', '2019-06-16 01:50:00');
INSERT INTO `contact` VALUES (6, 'test', 'test', 'test123@email.com', 2147483647, 'Test logged in contact us  6-15-19', '2019-06-16 01:59:51');
INSERT INTO `contact` VALUES (7, 'Red', 'Red', 'red@red.com', 1112223333, 'Test from contact.php from Logged in user.', '2019-06-16 02:00:20');

-- --------------------------------------------------------

-- 
-- Table structure for table `device_donations`
-- 

CREATE TABLE `device_donations` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `device_type` varchar(50) NOT NULL,
  `device_serial` varchar(50) NOT NULL,
  `device_qty` int(10) NOT NULL,
  `donation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `donation_description` longtext NOT NULL,
  `donor_email` varchar(100) NOT NULL,
  PRIMARY KEY (`donation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `device_donations`
-- 

INSERT INTO `device_donations` VALUES (1, 'cellphone', '123456789', 1, '2019-05-09 03:00:00', 'Good condition.', 'brown@email.com');

-- --------------------------------------------------------

-- 
-- Table structure for table `device_request_submission`
-- 

CREATE TABLE `device_request_submission` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `f_name` text,
  `l_name` text,
  `email` text,
  `occupation` text,
  `phone` text,
  `annualIncome` text,
  `additionalDetails` varchar(1000) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- 
-- Dumping data for table `device_request_submission`
-- 

INSERT INTO `device_request_submission` VALUES (1, 'test', 'test2', 'test@test.com', 'sadsadsad', 'sdadsadsadsad', '2312321321', '123456', '');
INSERT INTO `device_request_submission` VALUES (4, 'sad', 'sadsad', 'sad@sad.com', 'test', 'sadasdddddd', '12321', '12213', '');
INSERT INTO `device_request_submission` VALUES (5, 'sad', 'sadsad', 'sad@sad.com', 'test', 'sadasdddddd', '12321', '12213', '');
INSERT INTO `device_request_submission` VALUES (6, 'joe', 'brown', 'j_garcia_17@hotmail.com', 'student', 'Household size 1', '1234567890', '7000', '');
INSERT INTO `device_request_submission` VALUES (7, 'Grace', 'Alvarez', 'ga.grace.ga@gmail.com', 'Job', 'Test from Grace', '555-555-5555', '10,000', '');
INSERT INTO `device_request_submission` VALUES (8, 'new', 'test', 'newtest@email.com', 'student', 'Household size 2', '1231231234', '5000', '');
INSERT INTO `device_request_submission` VALUES (9, 'Peter', 'Garcia', 'garciapeter777@gmail.com', 'Cashier', 'Need a computer for my school related assignments.', '706-529-0002', '$10000', '');
INSERT INTO `device_request_submission` VALUES (10, 'Adriana', 'Estrada', 'adri97@hotmail.com', 'Student', 'Need a laptop that I can use for school.', '831-613-2680', '0', '');
INSERT INTO `device_request_submission` VALUES (11, 'Juan', 'Garcia', 'garciajuan@gmail.com', 'Field worker', 'Need a computer.', '831-674-1477', '10000', '');
INSERT INTO `device_request_submission` VALUES (12, 'Grace', 'Grace', 'grace@grace.com', 'job', 'Testing the device request form.', '555-555-5555', '10,000', '');
INSERT INTO `device_request_submission` VALUES (13, 'test', 'test', 'test123@email.com', 'student', 'Test request device 123', '8311122334', '1000', '');
INSERT INTO `device_request_submission` VALUES (14, 'grace', 'grace', 'grace@grace.com', 'job', 'Test from device_form.php request a device', '1231231234', '55555', '');
INSERT INTO `device_request_submission` VALUES (15, 'water', 'water', 'ga.grace.ga@gmail.com', 'water job', 'I am a student that is in need of a low cost device. I can provide proof of being low-income. Please let me know what I need to do to get a device.', '1234561234', '15000', '');
INSERT INTO `device_request_submission` VALUES (16, 'water', 'water', 'ga.grace.ga@gmail.com', 'Blue job', 'In need of a low cost device as I am a struggling student.', '1112223333', '22222', '');
INSERT INTO `device_request_submission` VALUES (17, 'water', 'water', 'ga.grace.ga@gmai.com', 'water job', 'Test 3', '5554445555', '12000', '');
INSERT INTO `device_request_submission` VALUES (18, 'grace', 'grace', 'ga.grace.ga@gmail.com', 'grace job', 'Test 4', '1112223333', '12000', '');
INSERT INTO `device_request_submission` VALUES (19, 'grace', 'grace', 'ga.grace.ga@gmail.com', 'grace job', 'Test 5', '1112223333', '12000', '');
INSERT INTO `device_request_submission` VALUES (20, 'grace', 'grace', 'ga.grace.ga@gmail.com', 'grace job', 'Test 6', '1112223333', '11223', '');
INSERT INTO `device_request_submission` VALUES (21, 'grace', 'grace', 'ga.grace.ga@gmail.com', 'grace job', 'Test 6', '1112223333', '11223', '');
INSERT INTO `device_request_submission` VALUES (22, '', 'grace', 'ga.grace.ga@gmail.com', 'grace job', 'Test 7', '1112223333', '10000', '');
INSERT INTO `device_request_submission` VALUES (23, '', '', '', '', '', '', '', 'grace');
INSERT INTO `device_request_submission` VALUES (24, 'grace', 'grace', 'ga.grace.ga@gmail.com', 'grace job', '1112223333', '10000', 'Test 8', 'grace');
INSERT INTO `device_request_submission` VALUES (25, 'gray', 'gray', 'ga.grace.ga@gmail.com', 'grace job three thousand', '4445554444', '12000', 'Test 10', 'grace');
INSERT INTO `device_request_submission` VALUES (26, 'greg', 'greg', 'ga.grace.ga@gmail.com', 'carpenter', '1112223333', '20000', 'This is the additional details field', 'grace');
INSERT INTO `device_request_submission` VALUES (27, 'test', 'test', 'user@email.com', 'tester', '8317771111', '9000', 'Device requests form test 6-16-19 8:53', 'user');
INSERT INTO `device_request_submission` VALUES (28, 'Jose', 'Garcia', 'j_garcia_17@hotmail.com', 'Student', '8316741234', '7000', 'Need a computer to do my homework.', 'joseg');

-- --------------------------------------------------------

-- 
-- Table structure for table `donations`
-- 

CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_type` varchar(50) NOT NULL,
  `donation_qty` int(10) NOT NULL,
  `donation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `donation_description` longtext NOT NULL,
  `donor_email` varchar(100) NOT NULL,
  `donor_username` varchar(100) NOT NULL,
  PRIMARY KEY (`donation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- 
-- Dumping data for table `donations`
-- 

INSERT INTO `donations` VALUES (8, 'Macbook Pro', 1, '2019-05-20 03:00:00', 'Do not have use for it.', 'login@login.com', '');
INSERT INTO `donations` VALUES (9, 'desktop computer', 1, '2019-06-10 00:00:00', 'Computer with monitor, keyboard and mouse.', 'j_garcia_17@hotmail.com', '');
INSERT INTO `donations` VALUES (10, '1', 1, '2019-06-15 00:00:00', '1', 'ga@ga.com', '');
INSERT INTO `donations` VALUES (12, '2', 2, '2019-06-05 00:00:00', '2', 'ga.ga@ga.com', '');
INSERT INTO `donations` VALUES (13, 'computer', 1, '2019-06-16 00:00:00', 'Device donation test 6-16-19', 'user@user.com', 'user');
INSERT INTO `donations` VALUES (14, 'Macbook', 1, '2018-09-06 00:00:00', 'Battery is the only issue with it. Can still use on power.', 'ga.grace.ga@gmail.com', 'grace');
INSERT INTO `donations` VALUES (16, 'Dell', 1, '2019-06-16 00:00:00', 'Want to give it a good home. It still runs and is about 5 years old.', 'ga.grace.ga@gmail.com', 'water');
INSERT INTO `donations` VALUES (17, 'Acer Laptop', 1, '2019-05-25 00:00:00', 'Donating one laptop', 'ga.grace.ga@gmail.com', 'grace');
INSERT INTO `donations` VALUES (18, 'Tablet', 1, '2019-06-18 02:31:30', 'Tablet fully functional with charger included.', 'j_garcia_17@hotmail.com', 'joseg');

-- --------------------------------------------------------

-- 
-- Table structure for table `monetary_donations`
-- 

CREATE TABLE `monetary_donations` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `donation_amount` int(10) NOT NULL,
  `donation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `donation_description` longtext NOT NULL,
  `donor_email` varchar(100) NOT NULL,
  PRIMARY KEY (`donation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `monetary_donations`
-- 

INSERT INTO `monetary_donations` VALUES (1, 100, '2019-05-09 03:00:00', 'Supporting money donation.', 'brown@email.com');

-- --------------------------------------------------------

-- 
-- Table structure for table `requests`
-- 

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `device_type` varchar(100) NOT NULL,
  `household_number` int(20) NOT NULL,
  `household_income` int(20) NOT NULL,
  `document` blob NOT NULL,
  `document_name` varchar(100) NOT NULL,
  `request_description` varchar(255) NOT NULL,
  `request_type` varchar(50) NOT NULL,
  `device_serial` varchar(50) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `request_status` varchar(50) NOT NULL,
  `requester_email` varchar(100) NOT NULL,
  `requester_username` varchar(100) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `requests`
-- 

INSERT INTO `requests` VALUES (4, 'Computer', 1, 5000, '', '', 'Yearly income entered.', 'device', '', '2019-05-25 03:00:00', 'in progress', 'test@email.com', '');
INSERT INTO `requests` VALUES (5, 'Computer', 1, 5000, '', '', 'Screen broken, need repair.', 'service', '1234567890', '2019-05-30 03:00:00', 'in progress', 'joe@email.com', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `psw` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` VALUES (19, 'login', 'login@login.com', 'login', 'd56b699830e77ba53855679cb1d252da', '0');
INSERT INTO `user` VALUES (20, 'water', 'water@water.com', 'water', '$2y$10$A/fqTCxuooKmCJysuFVeXeVaotgXRteD8oBIo8nnX99ipZB2.EVoK', '0');
INSERT INTO `user` VALUES (21, 'user', 'user@user.com', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '0');
INSERT INTO `user` VALUES (22, 'peanut', 'peanut@peanut.com', 'peanut', '4652b19e09ced75df510bf5a263a2bfe', '0');
INSERT INTO `user` VALUES (23, 'pretzel', 'pretzel@pretzel.com', 'pretzel', '49f8dc01880c32d19ef8ba16cb22d8c0', '0');
INSERT INTO `user` VALUES (24, 'cup', 'cup@cup.com', 'cup', 'f3f58ee455ae41da2ad5de06bf55e8de', '0');
INSERT INTO `user` VALUES (26, 'grace', 'grace@grace.com', 'grace', '15e5c87b18c1289d45bb4a72961b58e8', '0');
INSERT INTO `user` VALUES (30, 'newtest', 'j_garcia_17@hotmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', '0');
INSERT INTO `user` VALUES (32, 'Rex', 'garciapeter777@gmail.com', '1234567Pg', '664889351aa705c3756d7ed04a2aa6a6', '0');
INSERT INTO `user` VALUES (33, 'adri97', 'adri97@hotmail.com', 'Cat123', 'caf2f2e56f37ffc4adc6a401f991a72c', '0');
INSERT INTO `user` VALUES (34, 'juan706', 'garciajuan@gmail.com', 'Duck20', '88fae3046312a366e5a443eb1068744c', '0');
INSERT INTO `user` VALUES (35, 'grace', 'grace@grace.com', 'grace', '15e5c87b18c1289d45bb4a72961b58e8', '0');
INSERT INTO `user` VALUES (36, 'grace', 'grace@grace.com', 'grace', '15e5c87b18c1289d45bb4a72961b58e8', '0');
INSERT INTO `user` VALUES (38, 'joseg', 'j_garcia_17@hotmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(25) NOT NULL,
  `user_lname` varchar(25) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (1, 'Joe', 'Brown', 'brown@email.com', '$2y$10$ZwQ.Y1Tvf5QsIevLVv4/2OYLTAWQ1l5o1NKSZ1ZyTkJHqzisOZY5W', 'user');
INSERT INTO `users` VALUES (2, 'user1', 'last1', 'user1@email.com', '$2y$10$QPBjvhHJrN8qImNts6TOK.ShyREL2J5ouCfSMY0tvBn.JUwkErzzW', 'user');
INSERT INTO `users` VALUES (3, 'user2', 'last2', 'user2@email.com', '$2y$10$p02S1Uek9hjx.HALmfd.BOjB75C7m1ra4qgGZguqXeM.xVUGbV.Ha', 'user');
INSERT INTO `users` VALUES (4, 'user', 'last', 'user@email.com', '$2y$10$H/0FncUDsbL/ITp1/C/X3u7ed/4mgKnWQHCQrOU7p8s5CgVg.AOWm', 'user');
INSERT INTO `users` VALUES (5, 'admin', 'admin', 'admin@email.com', '$2y$10$6ELNoF4/H3SiEUT8PsPVKebVxs5lvqup6B/A.9tcKdOOTypLLoTiW', 'admin');
INSERT INTO `users` VALUES (15, 'new', 'user', 'newuser@email.com', '$2y$10$mGX92kCWsup7u7yDq1Tt/OzgURq.X3LRNW1fM/Lj.oMm5h62NMIx2', 'user');
INSERT INTO `users` VALUES (16, 'new', 'user', 'newuser@email.com', '$2y$10$UqekQ5xXsMHhrLJg/nyzw.Qji6Hwr692Bn/4hfb56E56npUxnXwHa', 'user');
INSERT INTO `users` VALUES (17, 'other', 'user@email.com', 'otheruser@email.com', '$2y$10$W8CRSBiS4cGoW02erLeOKeR/BRO6fE10i9Q5XEGEnTu9f9RKbPtJ6', 'user');
INSERT INTO `users` VALUES (18, 'new', 'new', 'new@email.com', '$2y$10$sibuqWHCpnlbHd2QXExk4.9IIgMYZvhrJDvofKqSle0Z/Wmwd62Sa', 'user');
INSERT INTO `users` VALUES (19, 'Jon', 'Brown', 'brown@email.com', '$2y$10$JSF4SmPBbiKe1NIOau2rkOQFgVc8f0JaFKBN3xwdeCpjuytKQzK5i', 'user');
INSERT INTO `users` VALUES (20, 'juan', 'brown', 'brown@email.com', '$2y$10$ObNZd4QRn3uyh4YcZmPZdONuG9zKTErEm/C1/oRLFpZfR0qQDSOM.', 'user');

-- --------------------------------------------------------

-- 
-- Table structure for table `volunteer_form`
-- 

CREATE TABLE `volunteer_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` text,
  `l_name` text,
  `email` text,
  `phone` text,
  `q_phone` text,
  `q_repair_devices` text,
  `q_entering_data` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `volunteer_form`
-- 

INSERT INTO `volunteer_form` VALUES (1, 'test', 'test', 'test@test.com', '12312321321', 'No', 'Yes', 'Yes');
INSERT INTO `volunteer_form` VALUES (2, 'Juan', 'garcia', 'garciajuan@gmail.com', '8316741477', 'Yes', 'No', 'No');
INSERT INTO `volunteer_form` VALUES (3, 'Adriana', 'Estrada', 'adri97@hotmail.com', '8316132680', 'No', 'No', 'Yes');
INSERT INTO `volunteer_form` VALUES (6, 'Jose', 'Garcia', 'j_garcia_17@hotmail.com', '8311234567', 'No', 'Yes', 'No');
INSERT INTO `volunteer_form` VALUES (4, 'Peter', 'Garcia', 'garciapeter777@gmail.com', '706-529-0002', 'No', 'Yes', 'No');
