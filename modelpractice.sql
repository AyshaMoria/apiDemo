-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 09:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modelpractice`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `city` varchar(30) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `city`, `updated_at`, `created_at`) VALUES
(57, 'Roosevelt Kertzmann', 'West Mallorystad', '2023-12-15 02:52:32', '2023-12-15 02:52:32'),
(58, 'Elisa Brekke PhD', 'Hermistonstad', '2023-12-15 02:52:32', '2023-12-15 02:52:32'),
(59, 'Prof. Khalid Gutmann', 'North Grant', '2023-12-15 02:52:32', '2023-12-15 02:52:32'),
(60, 'Viola Davis IV', 'New Simeonland', '2023-12-15 02:52:32', '2023-12-15 02:52:32'),
(61, 'Dr. Ora Russel IV', 'Steveburgh', '2023-12-15 02:52:32', '2023-12-15 02:52:32'),
(62, 'Miss Shaina Stracke I', 'Buckridgestad', '2023-12-15 02:52:32', '2023-12-15 02:52:32'),
(63, 'Jacinthe Kuhlman DDS', 'South Wayneville', '2023-12-15 02:52:32', '2023-12-15 02:52:32'),
(64, 'Charley Spinka', 'East Santinofurt', '2023-12-15 02:52:32', '2023-12-15 02:52:32'),
(65, 'Damaris Cummings DVM', 'West Cindyville', '2023-12-15 02:52:32', '2023-12-15 02:52:32'),
(66, 'Mrs. Mayra Pollich', 'Darrionmouth', '2023-12-15 02:52:32', '2023-12-15 02:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_12_12_083200_create_students_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(57, 'updated1', 'updated', '2023-12-18 09:46:36', '2023-12-20 02:57:11'),
(58, 'aysha1', 'surat1', '2023-12-18 09:46:36', '2023-12-18 09:46:36'),
(59, 'aysha', 'surat', '2023-12-18 09:46:44', '2023-12-18 09:46:44'),
(60, 'aysha1', 'surat1', '2023-12-18 09:46:44', '2023-12-18 09:46:44'),
(61, 'aysha', 'surat', '2023-12-19 02:16:00', '2023-12-19 02:16:00'),
(62, 'aysha2', 'surat12', '2023-12-19 02:16:00', '2023-12-19 02:16:00'),
(63, 'aysha', 'surat', '2023-12-19 02:18:49', '2023-12-19 02:18:49'),
(64, 'aysha2', 'surat12', '2023-12-19 02:18:49', '2023-12-19 02:18:49'),
(65, 'Doe1', 'surat', '2023-12-20 03:50:57', '2023-12-20 03:50:57'),
(66, 'Doe2', 'surat', '2023-12-20 03:50:57', '2023-12-20 03:50:57'),
(67, 'Doe3', 'surat', '2023-12-20 03:50:57', '2023-12-20 03:50:57'),
(68, 'Doe1', 'surat', '2023-12-20 03:51:02', '2023-12-20 03:51:02'),
(69, 'Doe2', 'surat', '2023-12-20 03:51:02', '2023-12-20 03:51:02'),
(70, 'Doe3', 'surat', '2023-12-20 03:51:02', '2023-12-20 03:51:02'),
(71, 'Doe1', 'surat', '2023-12-20 03:51:06', '2023-12-20 03:51:06'),
(72, 'Doe2', 'surat', '2023-12-20 03:51:06', '2023-12-20 03:51:06'),
(73, 'Doe3', 'surat', '2023-12-20 03:51:06', '2023-12-20 03:51:06'),
(74, 'Doe1', 'surat', '2023-12-20 03:51:10', '2023-12-20 03:51:10'),
(75, 'Doe2', 'surat', '2023-12-20 03:51:10', '2023-12-20 03:51:10'),
(76, 'Doe3', 'surat', '2023-12-20 03:51:10', '2023-12-20 03:51:10'),
(77, 'Doe1', 'surat', '2023-12-20 03:53:01', '2023-12-20 03:53:01'),
(78, 'Doe2', 'surat', '2023-12-20 03:53:01', '2023-12-20 03:53:01'),
(79, 'Doe3', 'surat', '2023-12-20 03:53:01', '2023-12-20 03:53:01'),
(80, 'Doe1', 'surat', '2023-12-20 03:53:15', '2023-12-20 03:53:15'),
(81, 'Doe2', 'surat', '2023-12-20 03:53:15', '2023-12-20 03:53:15'),
(82, 'Doe3', 'surat', '2023-12-20 03:53:15', '2023-12-20 03:53:15'),
(83, 'Doe1', 'surat', '2023-12-20 03:55:49', '2023-12-20 03:55:49'),
(84, 'Doe2', 'surat', '2023-12-20 03:55:49', '2023-12-20 03:55:49'),
(85, 'Doe3', 'surat', '2023-12-20 03:55:49', '2023-12-20 03:55:49'),
(86, 'Doe1', 'surat1', '2023-12-20 03:57:27', '2023-12-20 03:57:27'),
(87, 'Doe2', 'surat2', '2023-12-20 03:57:27', '2023-12-20 03:57:27'),
(88, 'Doe3', 'sura3t', '2023-12-20 03:57:27', '2023-12-20 03:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `testings`
--

CREATE TABLE `testings` (
  `id` int(11) NOT NULL,
  `sid` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testings`
--

INSERT INTO `testings` (`id`, `sid`, `name`, `address`, `created_at`, `updated_at`) VALUES
(244, 1, 'Aysha Moria', 'rander', '2023-12-28 03:55:35', '2023-12-28 04:34:53'),
(264, 2, 'Aysha Moria', 'df', '2024-01-10 04:19:00', '2024-01-10 04:19:00'),
(265, 2, 'kunjan', 'c', '2024-01-10 04:19:04', '2024-01-20 07:41:15'),
(266, 20, 'bilkis', 'surat', '2024-01-10 04:19:21', '2024-01-20 07:41:06'),
(267, 200, 'Aysha Moria', 'rander', '2024-01-10 04:19:23', '2024-01-20 07:40:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testings`
--
ALTER TABLE `testings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `testings`
--
ALTER TABLE `testings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
