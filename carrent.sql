-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 01:11 PM
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
-- Database: `carrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `daily_rent_price` decimal(10,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Toyota Corolla X', 'Toyota', 'Corolla X', 2020, 'Sedan', 150.00, 1, 'uploads/1747124227.jpg', '2025-05-13 02:17:07', '2025-05-13 02:17:07'),
(3, 'BMW 7 Series M Sport', 'BMW', '7 Series M Sport', 2025, 'Sedan', 1000.00, 1, 'uploads/1747124672.jpg', '2025-05-13 02:24:32', '2025-05-13 02:24:32'),
(4, 'Portofino M', 'Ferrari', 'Portofino M', 2023, 'Convertible', 980.00, 1, 'uploads/1747124724.jpg', '2025-05-13 02:25:24', '2025-05-13 02:25:24'),
(5, '812 Superfast', 'Ferrari', '812 Superfast', 2021, 'Coupe', 150.00, 1, 'uploads/1747124871.jpg', '2025-05-13 02:27:51', '2025-05-13 02:27:51'),
(6, 'X6 M Competition', 'BMW', 'X6 M Competition', 2022, 'SUV', 780.00, 1, 'uploads/1747124944.jpg', '2025-05-13 02:29:04', '2025-05-13 02:29:04'),
(7, 'i8 Roadster', 'BMW', 'i8 Roadster', 2020, 'Convertible', 987.00, 1, 'uploads/1747124997.jpg', '2025-05-13 02:29:57', '2025-05-13 02:29:57'),
(8, 'Mitsubishi Pajero Sport', 'Mitsubishi', 'Pajero Sport', 2021, 'SUB', 987.00, 1, 'uploads/1747125065.jpg', '2025-05-13 02:31:05', '2025-05-13 02:31:05'),
(9, 'CX-5', 'Mazda', 'CX-5', 2023, 'SUV', 890.00, 1, 'uploads/1747125595.jpg', '2025-05-13 02:39:55', '2025-05-13 02:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_05_044308_create_cars_table', 1),
(5, '2025_05_15_190017_create_rentals_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `created_at`, `updated_at`) VALUES
(1, 2, 4, '2025-05-24', '2025-05-29', 5880.00, '2025-05-17 00:59:44', '2025-05-17 00:59:44'),
(2, 2, 4, '2025-05-31', '2025-06-07', 7840.00, '2025-05-17 01:01:13', '2025-05-17 01:01:13'),
(3, 2, 7, '2025-05-23', '2025-05-30', 7896.00, '2025-05-17 01:08:28', '2025-05-17 01:08:28'),
(4, 2, 5, '2025-06-11', '2025-07-11', 4650.00, '2025-05-17 01:15:06', '2025-05-17 01:15:06'),
(5, 2, 5, '2025-05-19', '2025-05-22', 600.00, '2025-05-17 01:16:21', '2025-05-17 01:16:21'),
(6, 2, 5, '2025-07-23', '2025-08-13', 3300.00, '2025-05-17 01:23:34', '2025-05-17 01:23:34'),
(7, 2, 9, '2025-05-17', '2025-05-20', 3560.00, '2025-05-17 01:25:44', '2025-05-17 01:25:44'),
(8, 2, 9, '2025-08-05', '2025-10-08', 57850.00, '2025-05-17 01:29:30', '2025-05-17 01:29:30'),
(9, 2, 1, '2025-10-08', '2025-10-09', 300.00, '2025-05-17 01:33:16', '2025-05-17 01:33:16'),
(10, 2, 1, '2025-07-15', '2025-07-16', 300.00, '2025-05-17 01:34:47', '2025-05-17 01:34:47'),
(11, 2, 3, '2028-01-05', '2028-01-21', 17000.00, '2025-05-17 01:47:22', '2025-05-17 01:47:22'),
(12, 1, 5, '2025-05-18', '2025-05-21', 240.00, '2025-05-18 03:36:35', '2025-05-18 03:36:35'),
(13, 3, 9, '2025-05-19', '2025-05-20', 120.00, '2025-05-18 03:37:11', '2025-05-18 03:37:11'),
(14, 1, 1, '2025-05-18', '2025-05-20', 180.00, '2025-05-18 05:22:26', '2025-05-18 05:22:26'),
(15, 6, 6, '2026-02-01', '2025-05-18', 1560.00, '2025-05-18 05:23:20', '2025-05-18 06:20:51'),
(16, 8, 5, '2028-06-28', '2028-06-30', 450.00, '2025-05-18 07:12:50', '2025-05-18 07:12:50'),
(17, 8, 4, '2027-12-26', '2027-12-27', 1960.00, '2025-05-18 07:16:20', '2025-05-18 07:16:20'),
(18, 8, 3, '2027-08-31', '2027-09-02', 3000.00, '2025-05-18 07:20:37', '2025-05-18 07:20:37'),
(19, 8, 4, '2029-04-04', '2029-04-30', 26460.00, '2025-05-18 07:27:14', '2025-05-18 07:27:14'),
(20, 9, 1, '2026-08-11', '2026-08-19', 1350.00, '2025-05-18 07:57:24', '2025-05-18 07:57:24'),
(21, 6, 4, '2025-05-19', '2025-05-19', 1960.00, '2025-05-18 23:21:49', '2025-05-19 04:47:46'),
(22, 6, 9, '2025-05-21', '2025-05-22', 1780.00, '2025-05-19 05:01:32', '2025-05-19 05:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1m5aMcNYJ86n76xSP5Okk921i06nutZa8A8jVR2S', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTlB2ZnpPSWZMZnNmNng1VVljSUZxTU1OZnpTZExYRFJ1UE1VbDlWWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teS1yZW50YWxzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1747652530),
('BwsEoEmTrF1VtdxT8i6wrlHbjMAEJw9wqPdn5PX2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWJpbk92eDhxZUdVeHU3WUhYWlYzMkp1b21SRjhYZFZGQ0ljZGxpUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1747631471),
('fKr0uqATky3NhHnFmxbNawmmEN1ghjuUfYNPbWoi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiN2dndU1nMnVSVDJrSTNRRzMwaWVXWkpjMDBQd3JuZWJkcXdDajh0YiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1747631478),
('ms5tM1crP4uCh6mzmCIIYn7kpkEO4bRHfkzP7IFE', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYzFEbHZvYWlweTBOaTduU2RlSkNBNkpVa0c4aFpINzZMbnVTSmZuViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teS1yZW50YWxzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1747633471);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Briar Cannon', 'reduvuzo@mailinator.com', '$2y$12$XWeesMxkWY0My7V2emsdTeCociH5Aa7tV1Cj9NTS0WjPzZDmq2H7G', 'admin', '2025-05-13 02:08:46', '2025-05-13 02:08:46'),
(2, 'Cameron Moore', 'tufebax@mailinator.com', '$2y$12$N71y18OiAIopqOx5wYLK6..Faqtax31wwuVThnwjzhaVFJW1eO18a', 'admin', '2025-05-13 02:08:57', '2025-05-13 02:08:57'),
(3, 'Karen Hunter', 'damazamepu@mailinator.com', '$2y$12$qX.kcmVCnVoUAngoFNP5g.iQng.gvwER5qofkw55owRwf89zFu5V2', 'customer', '2025-05-16 23:36:41', '2025-05-16 23:36:41'),
(4, 'Upton Mcmillan', 'patevofix@mailinator.com', '$2y$12$7evrrBwixFvhIVVH9CYE8eSk6hiTtYNEifv5aVN66VDmebDn0kcea', 'customer', '2025-05-16 23:36:47', '2025-05-16 23:36:47'),
(5, 'Imani Noel', 'xygeni@mailinator.com', '$2y$12$n4Yjv7NirWXEb7eze0N9g.50EwPoM9Q8DzDqsBdvZRC140yaCPvGm', 'customer', '2025-05-16 23:36:54', '2025-05-16 23:36:54'),
(6, 'Mr. Admin', 'admin@admin.com', '$2y$12$xqyOYVjbMVjvOAPFhs5QEOiYz58wJOVtejKaYNjmM5yU4vYaJTG0.', 'admin', '2025-05-18 01:39:39', '2025-05-18 01:39:39'),
(7, 'Mr. Customer', 'customer@customer.com', '$2y$12$Rj1fxMWlBPV43PwUAIuS3.VTC8jo1EgVLBxSb70WdjVodYg/OCTyC', 'customer', '2025-05-18 01:45:47', '2025-05-18 01:45:47'),
(8, 'Muzakkir', 'sayed04syl@gmail.com', '$2y$12$nMBe60uJpoTlAMDVPnte8.a9BOzFArfu5ScrZImKSelV9aXLXUHNe', 'customer', '2025-05-18 07:11:56', '2025-05-18 07:11:56'),
(9, 'Mr New Customer', 'mdmohsenmy@gmail.com', '$2y$12$VPgrJtk8RUCLJ2AaP4BDVueIVIZbDZgcn87WQgHavWrKNkj.z.XFm', 'customer', '2025-05-18 07:56:55', '2025-05-18 07:56:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
