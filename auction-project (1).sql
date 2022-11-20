-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 10:50 PM
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
-- Database: `auction-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `price` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_time` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auctions`
--

INSERT INTO `auctions` (`id`, `name`, `product_id`, `user_id`, `price`, `start_time`, `end_time`, `updated_at`) VALUES
(1, 'Peter Herring', 2, 1, 501, '2022-11-20 21:09:01', '2016-04-21 17:29:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Dorian Davidson 1', 'Vel soluta pariatur', '2022-11-20 12:02:16', '2022-11-20 08:02:16'),
(5, 'Dominic Britt', 'Voluptatem non dolor', '2022-11-20 11:40:16', NULL),
(6, 'Amal Noble', 'Sunt occaecat autem ', '2022-11-20 11:40:25', NULL),
(7, 'Melvin Hudson', 'Maxime fugit volupt', '2022-11-20 11:40:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 1,
  `is_auction` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `user_id`, `is_auction`, `created_at`, `updated_at`) VALUES
(2, 'Hedwig Kramer', 'Sunt eiusmod volupta', 400, 6, 1, 1, '2022-11-20 20:34:21', '2022-11-20 08:13:02'),
(5, 'Todd Talley', 'Est corporis nesciun', 773, 5, 1, 0, '2022-11-20 19:37:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Admin',
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `role`, `status`, `created_at`) VALUES
(1, 'Abubakar', '1234567890', 'abubakarisofficial@gmail.com', 'Admin', 'Active', '2022-11-20 09:57:06'),
(3, 'shoaib', '1234567890', 'shoaib@gmail.com', 'User', 'Active', '2022-11-20 13:27:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `description` (`description`),
  ADD KEY `price` (`price`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `password` (`password`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
