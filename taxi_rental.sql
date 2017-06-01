-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2017 at 09:57 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxi_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `care_detail`
--

CREATE TABLE `care_detail` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(10) NOT NULL,
  `c_number` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `c_type` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `care_detail`
--

INSERT INTO `care_detail` (`c_id`, `c_name`, `c_number`, `status`, `c_type`) VALUES
(1, 'Maruti', 'WB/6758', 0, 'M'),
(2, 'Maruti', 'WB/6753', 0, 'S'),
(3, 'Roller', 'OR4564', 0, 'P'),
(4, 'Roller', 'OR4564', 0, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `driver_detail`
--

CREATE TABLE `driver_detail` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(30) NOT NULL,
  `d_mail` varchar(20) NOT NULL,
  `d_number` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_detail`
--

INSERT INTO `driver_detail` (`d_id`, `d_name`, `d_mail`, `d_number`, `status`) VALUES
(1, 'Swaroop Acharjee', 'meet.ripon@gmail.com', '9674507568', 1),
(2, 'Debanjana Ghosh', 'debu@gmail.com', '9231366575', 1),
(3, 'Swaroop Hen', 'meet.rin@gmail.com', '9674503368', 1),
(4, 'Debanjana Potpt', 'dehhu@gmail.com', '92313634275', 1),
(5, 'Kaushik Dey', 'kaushiky@gmail.com', '838937228', 1),
(6, 'Kaushik Peyye', 'kauhehhiky@gmail.com', '83ehhe7228', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ride_details`
--

CREATE TABLE `ride_details` (
  `r_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `dep_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ride_details`
--

INSERT INTO `ride_details` (`r_id`, `u_id`, `d_id`, `c_id`, `booking_date`, `dep_date`) VALUES
(25, 1, 4, 4, '2017-08-05', '2017-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(40) NOT NULL,
  `u_pass` varchar(10) NOT NULL,
  `u_mail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`u_id`, `u_name`, `u_pass`, `u_mail`) VALUES
(1, 'abcd', '123', 'ab@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `care_detail`
--
ALTER TABLE `care_detail`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `driver_detail`
--
ALTER TABLE `driver_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `ride_details`
--
ALTER TABLE `ride_details`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `care_detail`
--
ALTER TABLE `care_detail`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `driver_detail`
--
ALTER TABLE `driver_detail`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ride_details`
--
ALTER TABLE `ride_details`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
