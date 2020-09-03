-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 03, 2020 at 12:33 AM
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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `track_records`
--

INSERT INTO `track_records` (`id`, `category_id`, `type`, `duration_in_sec`, `file_name`, `visitor_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'page', 0, '', 0, '2020-09-02 03:56:33', '2020-09-02 03:56:33'),
(2, 5, 'page', 141, '', 0, '2020-09-02 07:31:01', '2020-09-02 07:31:01'),
(3, 5, 'page', 51, '', 0, '2020-09-02 07:31:52', '2020-09-02 07:31:52'),
(4, 7, 'page', 87, '', 0, '2020-09-02 07:33:19', '2020-09-02 07:33:19'),
(5, 8, 'page', 25, '', 0, '2020-09-02 07:33:44', '2020-09-02 07:33:44'),
(6, 7, 'page', 41, '', 0, '2020-09-02 07:34:25', '2020-09-02 07:34:25'),
(7, 8, 'page', 44, '', 0, '2020-09-02 07:35:09', '2020-09-02 07:35:09'),
(8, 8, 'pdf', 1, 'Comprehensive_Decorative_Portfolio.pdf', 1, '2020-09-02 09:11:50', '2020-09-02 09:11:50'),
(9, 8, 'page', 32, '', 1, '2020-09-02 09:11:59', '2020-09-02 09:11:59'),
(10, 2, 'page', 18, '', 1, '2020-09-02 09:12:17', '2020-09-02 09:12:17'),
(11, 8, 'page', 4, '', 1, '2020-09-02 09:12:21', '2020-09-02 09:12:21'),
(12, 7, 'page', 12, '', 2, '2020-09-02 09:29:03', '2020-09-02 09:29:03'),
(13, 1, 'page', 55, '', 5, '2020-09-03 03:43:29', '2020-09-03 03:43:29'),
(14, 2, 'page', 89, '', 5, '2020-09-03 03:44:58', '2020-09-03 03:44:58'),
(15, 1, 'page', 14, '', 5, '2020-09-03 03:45:12', '2020-09-03 03:45:12'),
(16, 2, 'page', 11, '', 5, '2020-09-03 03:45:23', '2020-09-03 03:45:23'),
(17, 5, 'page', 20, '', 5, '2020-09-03 03:45:43', '2020-09-03 03:45:43'),
(18, 3, 'page', 116, '', 5, '2020-09-03 03:47:39', '2020-09-03 03:47:39'),
(19, 8, 'page', 117, '', 5, '2020-09-03 03:49:36', '2020-09-03 03:49:36'),
(20, 6, 'page', 58, '', 5, '2020-09-03 03:50:34', '2020-09-03 03:50:34'),
(21, 7, 'page', 358, '', 5, '2020-09-03 03:56:32', '2020-09-03 03:56:32'),
(22, 7, 'video', 71, '4_Time_for_Possibilities.mp4', 5, '2020-09-03 03:57:43', '2020-09-03 03:57:43'),
(23, 1, 'page', 35, '', 5, '2020-09-03 03:58:18', '2020-09-03 03:58:18'),
(24, 1, 'video', 0, 'faster-further-less.mp4', 5, '2020-09-03 03:58:18', '2020-09-03 03:58:18'),
(25, 1, 'video', 1, 'faster-further-less.mp4', 5, '2020-09-03 03:58:19', '2020-09-03 03:58:19'),
(26, 1, 'video', 1, 'faster-further-less.mp4', 5, '2020-09-03 03:58:19', '2020-09-03 03:58:19'),
(27, 1, 'video', 16, 'faster-further-less.mp4', 5, '2020-09-03 03:58:35', '2020-09-03 03:58:35'),
(28, 1, 'video', 52, 'wind-tunnel-experience.mp4', 5, '2020-09-03 03:59:27', '2020-09-03 03:59:27'),
(29, 1, 'video', 33, 'faster-further-less.mp4', 5, '2020-09-03 04:00:00', '2020-09-03 04:00:00'),
(30, 5, 'page', 626, '', 5, '2020-09-03 04:10:26', '2020-09-03 04:10:26'),
(31, 5, 'video', 39, 'Magna_ADAS_IAA19_DigitalRearVision_v016.mp4', 5, '2020-09-03 04:11:05', '2020-09-03 04:11:05'),
(32, 6, 'page', 3, '', 5, '2020-09-03 04:11:08', '2020-09-03 04:11:08'),
(33, 6, 'video', 4, '1_Magna_DHTeco_Logo.mp4', 5, '2020-09-03 04:11:12', '2020-09-03 04:11:12'),
(34, 6, 'video', 2, '2_Magna_eDS_HV_low_CE.mp4', 5, '2020-09-03 04:11:14', '2020-09-03 04:11:14'),
(35, 6, 'video', 7, '3_7dct300_noLogo.mp4', 5, '2020-09-03 04:11:21', '2020-09-03 04:11:21'),
(36, 6, 'video', 8, '4_Magna_3D_eDS_HV_mid_2.5_TV.mp4', 5, '2020-09-03 04:11:29', '2020-09-03 04:11:29'),
(37, 6, 'video', 8, '3_7dct300_noLogo.mp4', 5, '2020-09-03 04:11:37', '2020-09-03 04:11:37'),
(38, 6, 'page', 3, '', 5, '2020-09-03 04:11:40', '2020-09-03 04:11:40'),
(39, 6, 'video', 2, '6_Magna_eDS_HV_mid+HE.mp4', 5, '2020-09-03 04:11:42', '2020-09-03 04:11:42'),
(40, 6, 'video', 1, '5_Magna_3D_eDS_48v.mp4', 5, '2020-09-03 04:11:43', '2020-09-03 04:11:43'),
(41, 6, 'video', 2, '4_Magna_3D_eDS_HV_mid_2.5_TV.mp4', 5, '2020-09-03 04:11:45', '2020-09-03 04:11:45'),
(42, 6, 'video', 1, '3_7dct300_noLogo.mp4', 5, '2020-09-03 04:11:46', '2020-09-03 04:11:46'),
(43, 6, 'video', 2, '2_Magna_eDS_HV_low_CE.mp4', 5, '2020-09-03 04:11:48', '2020-09-03 04:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `relationship`, `country`, `how`, `created_at`, `updated_at`) VALUES
(1, 'Investor', 'AU', 'A friend shared it with me', '2020-09-02 09:11:21', '2020-09-02 09:11:21'),
(2, 'Investor', 'AF', 'I follow Magna on social media', '2020-09-02 09:26:02', '2020-09-02 09:26:02'),
(3, 'Customer', 'AL', 'I follow Magna on social media', '2020-09-02 15:08:23', '2020-09-02 15:08:23'),
(4, 'Journalist', 'DZ', 'I follow Magna on social media', '2020-09-03 03:37:39', '2020-09-03 03:37:39'),
(5, 'Customer', 'US', 'A friend shared it with me', '2020-09-03 03:40:58', '2020-09-03 03:40:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `track_records`
--
ALTER TABLE `track_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `track_records`
--
ALTER TABLE `track_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
