-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 07:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Quaid ahmed', 'admin@gmail.com', NULL, '$2y$10$bU/aPKp13Z98yf9J6fRxru5YtT0wM.C9SFPPFAuZYKKtpyd2fmjc.', NULL, NULL, NULL, NULL, '2022-10-23 04:10:20', '2022-10-23 04:10:20'),
(3, ' ahmed', 'inoxent5050@gmail.com', NULL, '$2y$10$Z.KV7nAHPHxBBozDcYtdbeFzhiPhu7LrcLgS0rgz6PVbrrOvaLiCO', 'eyJpdiI6InY1bGFMc0w4aDVSVFEyd0cxeElRdUE9PSIsInZhbHVlIjoicHQwQ3JhcVl6Vi8xRFlRRzR5UHJoY2hES3BERW4xc21kUzJQMWJFTXROVT0iLCJtYWMiOiJhNmE0ODRhNGI3YzBmZTUxNjFjMmE1N2RhMDg2YjMwNDk1ZDI1ZmM4NmQ0MmM0ZmI3NDY1MjYzZDMxN2JlMzUxIiwidGFnIjoiIn0=', 'eyJpdiI6IjErYngyVW5FVC9wNUJuZFZ4dU5JU0E9PSIsInZhbHVlIjoiZmQ1YUVOM2IvUVA0SFF6T204MWpuRHZFWkZ3bUgveEs4bjkwaHd3MEJXRDN5aHNaWmRPNmplZitaSmJLeldqM3NTcVdVOW5GQ29YN0pxUkNZVzJzQlN2U0xDRUxRUEZrT2lPcmFtZTc4SEhBOXpOQXI4WDhpemRHSXpwRzloRlJ4c0VCWjVkZzZrd2JQZkhuRHNUOGFKc3VidnJZdjFHbXVuV3RjMk1Gc2M4MDRxR1hJaytGTUg4QzVQSHF4TWhaaUdSUWZITXRaaUROajc4UjQ3WXRKTlFYYUdVMU1yWjdOVjBRQzM4OWRGVXBkRnVUYVNxVEtBVnRxU2ZLZThVczZhSStJZWxKS1cxWnFqUkFMQnBVM3c9PSIsIm1hYyI6IjZkOTkzODE4MmNkYTIxYWFiZTkzNmJiZmY5N2YwNWQzNjQyMTI0YzA2NjE3YzE0MzVhOTllNjQ4ZDUyYTNiYjgiLCJ0YWciOiIifQ==', NULL, 'Y75vDvcansSWbw9XIToaiEQoKLa9GLOuS8uctaqbSGfyim8Rpvv4Do9wYRLX', '2022-10-25 10:12:42', '2022-10-25 10:17:29'),
(4, 'ali', 'quaid@gmail.com', NULL, '12345678', NULL, NULL, NULL, NULL, '2022-12-24 04:43:04', '2022-12-24 04:43:04'),
(5, 'khan Ahmed', 'khan@gmail.com', NULL, '12345678', NULL, NULL, NULL, NULL, '2022-12-24 05:59:56', '2022-12-24 05:59:56'),
(7, 'Quaid ahmed', 'quaidahmed01@gmail.com', NULL, '$2y$10$UOM2vbwFX0H4eOKiX9p1pufXE3A5RMayw7au9/vUq7aZlrNCaQQVq', NULL, NULL, NULL, NULL, '2022-12-24 12:40:38', '2022-12-24 12:40:38');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
