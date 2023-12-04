-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 05:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_ysx`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_users', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),
(2, 'add_users', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),
(3, 'edit_users', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),
(4, 'delete_users', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),
(5, 'view_roles', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),
(6, 'add_roles', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),
(7, 'edit_roles', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),
(8, 'delete_roles', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),
(9, 'view_permissions', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),
(10, 'add_permissions', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),
(11, 'edit_permissions', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),
(12, 'delete_permissions', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),
(2, 'admin', 'web', '2023-11-05 06:34:37', '2023-11-05 06:34:37'),
(6, 'user', 'web', '2023-11-05 06:34:38', '2023-11-05 06:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `user_code` varchar(50) DEFAULT NULL,
  `person_no` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `user_code`, `person_no`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'Lu So Lay', NULL, 'LSL001', 'w', NULL, NULL, '$2y$10$/Zn8MYZf.qPQguKvnPtXguDScIctsKsNyGuS1wUIjeQd.A6rXZ8hO', NULL, '2023-11-15 05:40:49', '2023-11-16 23:52:00'),
(17, 'Erasmus Whitley', NULL, '007', 'Sed dolor', NULL, NULL, '$2y$10$yyp6rAa25nW.6ubugNe9selNODnJdzBnPDeNUSTv/pJEbUOkMbmXm', NULL, '2023-11-18 16:56:36', '2023-11-18 16:56:36'),
(18, 'Demo', NULL, 'DEMO001', 'w', NULL, NULL, '$2y$10$lGJLb3T3SxYDYM9BQSg4l.tUGSCW1XHS2Mg4cMi3aft/fe28Zm6nK', NULL, '2023-11-20 09:14:00', '2023-11-20 09:14:00'),
(19, 'Mariko Cannon', NULL, 'Aut dolore delectus', 'Aspernatur', NULL, NULL, '$2y$10$xs9DuQx8/ENVxFIXueLyzuxKBOJyds0UDgDPeMoJwWAD66UU2E9xK', NULL, '2023-11-24 03:50:31', '2023-11-24 03:50:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

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
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
