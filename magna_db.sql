-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 03, 2020 at 03:16 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magna_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Active Aerodynamics', 'active-aerodynamics', 1, '2020-09-01 19:15:51', '2020-09-01 19:15:51'),
(2, 'Advanced Driver', 'advanced-driver', 1, '2020-09-01 19:16:22', '2020-09-01 19:16:22'),
(3, 'Body Exteriors', 'body-exteriors', 1, '2020-09-01 19:17:24', '2020-09-01 19:17:24'),
(4, 'Complete Vehicles', 'complete-vehicles', 1, '2020-09-01 19:17:24', '2020-09-01 19:17:24'),
(5, 'Mechatronics', 'mechatronics', 1, '2020-09-01 19:18:13', '2020-09-01 19:18:13'),
(6, 'Scalable Electrification', 'scalable-electrification', 1, '2020-09-01 19:18:13', '2020-09-01 19:18:13'),
(7, 'Seat of the Future', 'seat-of-the-future', 1, '2020-09-01 19:18:40', '2020-09-01 19:18:40'),
(8, 'Intelligent Lighting', 'intelligent-lighting', 1, '2020-09-01 19:21:14', '2020-09-01 19:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `track_records`
--

CREATE TABLE `track_records` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `duration_in_sec` int(11) NOT NULL DEFAULT '0',
  `file_name` varchar(100) COLLATE utf8mb4_bin DEFAULT '',
  `visitor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `relationship` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `country` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `how` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_records`
--
ALTER TABLE `track_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `track_records`
--
ALTER TABLE `track_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
