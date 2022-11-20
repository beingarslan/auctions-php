-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 10:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-dynamic-fields`
--

-- --------------------------------------------------------

--
-- Table structure for table `f_new`
--

CREATE TABLE `f_new` (
  `Id` int(255) NOT NULL,
  `qty` int(255) DEFAULT NULL,
  `cyls` varchar(255) DEFAULT NULL,
  `hm` varchar(255) DEFAULT NULL,
  `un` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `components` varchar(255) DEFAULT NULL,
  `hzc` varchar(255) DEFAULT NULL,
  `pg` varchar(255) DEFAULT NULL,
  `inhaiation_hz_zone` varchar(255) DEFAULT NULL,
  `lbs_wl_per` varchar(255) DEFAULT NULL,
  `lbs_gross_wt` varchar(255) DEFAULT NULL,
  `pieces` varchar(255) DEFAULT NULL,
  `erg` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `nmfc` varchar(255) DEFAULT NULL,
  `netwgt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_new`
--

INSERT INTO `f_new` (`Id`, `qty`, `cyls`, `hm`, `un`, `description`, `components`, `hzc`, `pg`, `inhaiation_hz_zone`, `lbs_wl_per`, `lbs_gross_wt`, `pieces`, `erg`, `type`, `nmfc`, `netwgt`) VALUES
(3, 200, '2300,8000', 'X,X', NULL, 'desc,desc', NULL, NULL, NULL, NULL, '20 lbs,80 lbs', NULL, NULL, '123,876', 'Cylender,Cylender', NULL, NULL),
(4, 20, '4800,7800', 'X,X', NULL, 'desc,desc', NULL, NULL, NULL, NULL, '90 lbs,100 lbs', NULL, NULL, '145,765', 'Cylender,Cylender', NULL, NULL),
(5, 20, '110,200,110', 'X,X,X', NULL, 'Nulla ipsa ad dolor,Saepe consectetur e,Commodo a quidem fug', NULL, NULL, NULL, NULL, '1800 lbs,1500 lbs,200 lbs', NULL, NULL, '115,117,255', 'Cylender,Cylenderdoloremque s,Cylender laboris pl', '85880,77880,665577', '300 lbs,400 lbs,80 lbs'),
(6, 20, '67868,23456', 'X,X', NULL, 'DEsc,desc', NULL, NULL, NULL, NULL, '100 lbs,900 lbs', NULL, NULL, '123456,3456', 'Cylender,Cylender', '123456,3456', '80 lbs,80 lbs');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'Admin',
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', '12345', 'Admin', 'Active'),
(2, 'User', 'user@gmail.com', '12345', 'User', 'Active'),
(6, 'Whilemina Rocha', 'turagilik@mailinator.com', 'Harum cupiditate qua', 'User', 'Inactive'),
(8, 'Berk Pope', 'jokutib@mailinator.com', 'Pa$$w0rd!', 'Admin', 'Active'),
(10, 'Branden Rowland', 'pybok@mailinator.com', 'Pa$$w0rd!', 'User', 'Active'),
(11, 'Jasper Mcclure', 'hasaf@mailinator.com', 'Pa$$w0rd!', 'User', 'Active'),
(12, 'Wilma Vaughan', 'corimyk@mailinator.com', 'Pa$$w0rd!', 'Admin', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `f_new`
--
ALTER TABLE `f_new`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `f_new`
--
ALTER TABLE `f_new`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
