-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2023 at 03:26 PM
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
-- Database: `bicycle4share`
--

-- --------------------------------------------------------

--
-- Table structure for table `bicycles`
--

CREATE TABLE `bicycles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bicycleID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bicycleImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bicycleBorrowDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bicycleReturnDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bicycles`
--

INSERT INTO `bicycles` (`id`, `bicycleID`, `bicycleImage`, `brand`, `model`, `color`, `status`, `matricid`, `bicycleBorrowDate`, `bicycleReturnDate`, `created_at`, `updated_at`) VALUES
(8, 'B0001', NULL, NULL, 'Hiking Bike', 'Green', 'Available', '--Select Student ID--', NULL, NULL, '2023-12-26 02:47:35', '2023-12-26 02:47:35'),
(9, 'B0009', NULL, NULL, 'BMX', 'Black', 'Owner', '--Select Student ID--', NULL, NULL, '2023-12-27 21:36:47', '2023-12-27 21:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PenaltyID` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`PenaltyID`)),
  `bicycleID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userID` bigint(20) NOT NULL,
  `complaintID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currentDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currentTime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `PenaltyID`, `bicycleID`, `userID`, `complaintID`, `currentDate`, `currentTime`, `phoneNum`, `complaint`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(3, '\"P0001\"', 'B0001', 3, 'C0006', '2023-12-16', '12:38', '01132426165', 'ahhahhah', 'status', 'sdasdasdasd', '2023-12-15 20:38:29', '2023-12-26 00:07:20'),
(4, '\"P0001\"', 'B0001', 3, 'C0006', '2023-12-21', '14:23', '01132426165', 'yuh', 'status', NULL, '2023-12-21 01:20:39', '2023-12-26 00:05:08'),
(5, '\"P0001\"', 'B0001', 3, 'C0005', '2023-12-26', '14:03', 'dasdasad', 'asdasdasd', 'Processing', NULL, '2023-12-25 22:59:38', '2023-12-25 22:59:38'),
(6, '\"P0003\"', 'B0001', 3, 'C0006', '2023-12-30', '18:07', 'dasda', 'asdasda', 'Processing', NULL, '2023-12-30 02:03:46', '2023-12-30 02:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(24, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(25, '2019_08_19_000000_create_failed_jobs_table', 1),
(26, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(27, '2023_11_04_064018_create_sessions_table', 1),
(54, '2023_12_13_081949_create_notifications_table', 9),
(58, '2023_12_11_032602_create_penalties_table', 12),
(59, '2023_12_07_080319_create_complaints_table', 13),
(61, '2023_11_16_072618_create_bicycles_table', 14),
(62, '2023_12_16_035724_create_reports_table', 15),
(63, '2023_12_31_033127_create_notification_message_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NotifID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StaffID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StudentID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NotifMessage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NotifDate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NotifTime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `NotifID`, `StaffID`, `StudentID`, `NotifMessage`, `NotifDate`, `NotifTime`, `created_at`, `updated_at`) VALUES
(4, 'N0004', 'grewhuhwek', 'th4567', 'dwdw', '2023-12-14', '08:19:09', '2023-12-14 00:19:09', '2023-12-14 00:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `notifications_messages`
--

CREATE TABLE `notifications_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NotifID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NotifMessage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StudentID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StaffID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications_messages`
--

INSERT INTO `notifications_messages` (`id`, `NotifID`, `NotifMessage`, `StudentID`, `StaffID`, `created_at`, `updated_at`) VALUES
(16, 'N0004', 'asdad', NULL, 'grewhuhwek', '2023-12-30 22:15:33', '2023-12-30 22:15:33'),
(17, 'N0004', 'sdsd', NULL, 'grewhuhwek', '2023-12-30 22:15:53', '2023-12-30 22:15:53'),
(18, 'N0004', 'asdad', NULL, 'grewhuhwek', '2023-12-30 22:16:50', '2023-12-30 22:16:50'),
(19, 'N0004', 'asda', NULL, 'grewhuhwek', '2023-12-30 22:17:50', '2023-12-30 22:17:50'),
(20, 'N0004', 'sdsd', NULL, 'grewhuhwek', '2023-12-30 22:17:53', '2023-12-30 22:17:53'),
(21, 'N0004', 'kk', NULL, 'grewhuhwek', '2023-12-30 22:17:56', '2023-12-30 22:17:56'),
(22, 'N0004', 'asdsad', NULL, 'grewhuhwek', '2023-12-30 22:19:38', '2023-12-30 22:19:38'),
(23, 'N0004', 'asdawd', 'th4567', NULL, '2023-12-30 22:32:10', '2023-12-30 22:32:10'),
(24, 'N0004', 'asd', 'th4567', NULL, '2023-12-30 22:32:12', '2023-12-30 22:32:12'),
(25, 'N0004', 'sdad', NULL, 'grewhuhwek', '2023-12-31 06:21:06', '2023-12-31 06:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penalties`
--

CREATE TABLE `penalties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NotifID` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`NotifID`)),
  `PenaltyID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currentDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currentTime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PenaltyAmount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PenaltyDescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PenaltyStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'In Process',
  `PenaltyAccount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PenaltyReceiptFile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penalties`
--

INSERT INTO `penalties` (`id`, `NotifID`, `PenaltyID`, `currentDate`, `currentTime`, `PenaltyAmount`, `PenaltyDescription`, `PenaltyStatus`, `PenaltyAccount`, `PenaltyReceiptFile`, `created_at`, `updated_at`) VALUES
(2, NULL, 'P0001', '2023-12-26', '16:43', '7', 'huhu', 'In Process', NULL, NULL, '2023-12-26 00:43:55', '2023-12-26 00:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0NBmwKexZqGBKJRCTA6tSPqIRyHMPkEYhzoe6trW', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTzFqbnhadW5td2U2TGpPeGw1SWZZQkxyVHZJOGhiWVNNRjkzMHRwUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5hZ2VSZXBvcnQ/dHlwZT13ZWVrbHkiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJHpQam5rcG95MklxRVZnR2M0ZWNESnU1ZzI1UTY1Z01WVFFFVVhDbzZCSWFtVXpodWUvbHVxIjt9', 1704021023),
('eehvASjMvIVahnTMXkpIEE4DY1X8nGRQn6Re8c24', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS2pVcHJUNmVuU1ZVRkN2bGNoU1VYeWswVjRUMEtVUVo3SFdVTHRtUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5hZ2VSZXBvcnQ/dHlwZT13ZWVrbHkmeWVhcj0yMDIzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiR6UGpua3BveTJJcUVWZ0djNGVjREp1NWcyNVE2NWdNVlRRRVVYQ282QklhbVV6aHVlL2x1cSI7fQ==', 1704032488);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resident` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `idnumber`, `resident`, `year`, `phonenum`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(2, 'najwa', 'najwa@gmail.com', 'student', NULL, '$2y$12$zPjnkpoy2IqEVgGc4ecDJu5g25Q65gMVTQEUXCo6BIamUzhue/luq', NULL, NULL, NULL, NULL, 'th4567', '3', '3', '790', NULL, NULL, '2023-11-18 23:53:48', '2023-11-19 19:42:48'),
(3, 'shahira', 'shahira.najwa158@gmail.com', 'admin', NULL, '$2y$12$zPjnkpoy2IqEVgGc4ecDJu5g25Q65gMVTQEUXCo6BIamUzhue/luq', NULL, NULL, NULL, NULL, 'grewhuhwek', NULL, NULL, NULL, NULL, NULL, '2023-11-19 00:37:30', '2023-11-19 00:37:30'),
(12, 'nafiz', 'nafiz@gmail.com', 'student', NULL, '$2y$12$zPjnkpoy2IqEVgGc4ecDJu5g25Q65gMVTQEUXCo6BIamUzhue/luq', NULL, NULL, NULL, NULL, 'dasda', NULL, NULL, NULL, NULL, NULL, '2023-12-21 00:21:15', '2023-12-21 00:21:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bicycles`
--
ALTER TABLE `bicycles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications_messages`
--
ALTER TABLE `notifications_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penalties`
--
ALTER TABLE `penalties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bicycles`
--
ALTER TABLE `bicycles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications_messages`
--
ALTER TABLE `notifications_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `penalties`
--
ALTER TABLE `penalties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
