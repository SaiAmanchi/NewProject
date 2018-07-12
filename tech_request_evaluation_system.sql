-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 08:04 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech request evaluation system`
--

-- --------------------------------------------------------

--
-- Table structure for table `committe_members`
--

CREATE TABLE IF NOT EXISTS `committe_members` (
  `id` int(11) NOT NULL,
  `request_no` varchar(50) NOT NULL,
  `committe_member` varchar(50) NOT NULL,
  `Yes` varchar(50) NOT NULL,
  `Yes_with Reservations` varchar(50) NOT NULL,
  `Need More Info` varchar(50) NOT NULL,
  `No` varchar(50) NOT NULL,
  `Comment` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `course` varchar(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `department_id`, `course`, `user_id`, `password`, `status`) VALUES
(1, 2, 'CIS', 700222222, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration_details`
--

CREATE TABLE IF NOT EXISTS `registration_details` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `course` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_details`
--

INSERT INTO `registration_details` (`id`, `department_id`, `user_id`, `first_name`, `last_name`, `email_id`, `course`, `status`) VALUES
(8, 2, 700222222, 'Sai', 'chandra', 'sai@gmail.com', 'CIS', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `request_form`
--

CREATE TABLE IF NOT EXISTS `request_form` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `academic_unit` varchar(50) NOT NULL,
  `item_desc` varchar(500) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `how_it_will_use` varchar(500) NOT NULL,
  `justification` varchar(500) NOT NULL,
  `classes_support` varchar(100) NOT NULL,
  `no_of_students` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `d_chair_approval` varchar(50) NOT NULL,
  `rank` int(11) NOT NULL,
  `c_members_review` varchar(100) NOT NULL,
  `c_members_comment` varchar(500) NOT NULL,
  `c_chair_review` varchar(50) NOT NULL,
  `c_chair_comment` varchar(500) NOT NULL,
  `dean_approval` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `department`) VALUES
(1, 'Dean'),
(2, 'Committee Chair'),
(3, 'Committee Members'),
(4, 'Department Chairs'),
(5, 'Faculty of HCBPS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committe_members`
--
ALTER TABLE `committe_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_details`
--
ALTER TABLE `registration_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `request_form`
--
ALTER TABLE `request_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `committe_members`
--
ALTER TABLE `committe_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `registration_details`
--
ALTER TABLE `registration_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `request_form`
--
ALTER TABLE `request_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
