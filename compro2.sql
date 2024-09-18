-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 08:53 AM
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
-- Database: `compro2`
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('kodokzuma@gmail.com|127.0.0.1', 'i:1;', 1724292931),
('kodokzuma@gmail.com|127.0.0.1:timer', 'i:1724292931;', 1724292931);

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
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_profile` bigint(20) UNSIGNED DEFAULT NULL,
  `judul` varchar(55) NOT NULL,
  `sub_judul` varchar(55) NOT NULL,
  `deskripsi` text NOT NULL,
  `awal_kerja` date NOT NULL,
  `akhir_kerja` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `id_profile`, `judul`, `sub_judul`, `deskripsi`, `awal_kerja`, `akhir_kerja`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 6, 'Web Developers', 'I am the web developer', 'i work with any language programming like php, javascript, python, etc\"', '2024-07-22', '2024-08-22', '2024-08-21 19:56:21', '2024-09-11 00:24:44', '2024-09-11 00:24:44'),
(13, 6, 'Web Design', 'I am Web Designer', 'i am designing the web', '2024-08-01', '2024-08-22', '2024-08-21 20:00:26', '2024-08-21 20:00:26', NULL),
(14, 6, 'Web UI/UX', 'i am the web ui / ux', 'i am working make user interface and user experience', '2024-08-04', '2024-08-11', '2024-08-21 20:02:08', '2024-08-21 20:47:34', NULL),
(15, 8, 'Mobile Development', 'i am mobile developer', 'saya bekerja membangun mobile apps', '2024-08-08', '2024-08-17', '2024-08-21 20:03:34', '2024-08-21 20:03:34', NULL),
(16, 8, 'Mobile Apps', 'I am Mobile Applicant', 'Saya seorang developer mobile apps', '2024-08-01', '2024-08-02', '2024-08-21 20:05:00', '2024-08-21 20:05:00', NULL),
(17, 7, 'Ai Developer', 'i am the next ai developer', 'Saya bekerja di machine learning dan membuat ai', '2024-08-15', '2024-08-17', '2024-08-21 20:06:33', '2024-08-21 20:06:33', NULL);

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
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `nama_level`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

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
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_01_035419_create_levels_table', 1),
(6, '0001_01_01_000000_create_users_table', 2),
(7, '2024_08_08_033239_create_profiles_table', 3),
(8, '2024_08_08_041244_add_picture_to_profiles', 4),
(9, '2024_08_14_020047_add_status_to_profiles', 5),
(10, '2024_08_14_081722_create_experiences_table', 6),
(11, '2024_08_14_084024_add_deleted_at_to_experiences', 7),
(12, '2024_08_15_005148_add_deleted_at_to_profiles_table', 8),
(14, '2024_08_15_060245_add_id_profile_to_experiences_table', 9);

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `picture` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(55) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `no_telpon` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `facebook` varchar(180) NOT NULL,
  `instagram` varchar(180) NOT NULL,
  `twitter` varchar(180) NOT NULL,
  `linkedin` varchar(180) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `status`, `picture`, `nama_lengkap`, `alamat`, `no_telpon`, `email`, `facebook`, `instagram`, `twitter`, `linkedin`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 1, '00wqNaEdFnZ61eRdtriwXwACidVFueUKoyx58c7K.jpg', 'Rf Online Indonesia', 'Jakarta, Indonesia', 12345678, 'rf-online@gmail.com', 'https://rf-online.com', 'https://rf-online.com', 'https://rf-online.com', 'https://rf-online.com', 'Game Rf Online, MMORPG', '2024-08-21 19:35:23', '2024-08-21 20:51:46', NULL),
(7, 0, 'DGdcKsza63qnQXZxpGEVcAiykqyZUiErHG6pe2zb.jpg', 'Rf Next', 'Seoul, Korea Selatan', 87654321, 'Rf-Next@gmail.com', 'https://rf-next.com', 'https://rf-next.com', 'https://rf-next.com', 'https://rf-next.com', 'The Next of Rf Online', '2024-08-21 19:38:31', '2024-08-21 20:51:46', NULL),
(8, 0, '4ApJhqgXW85vgAZZ0kO3SDtYf3HAZKISjG22PJvA.jpg', 'Rf-Mobile', 'Bekasi, Jawa Barat, Indonesia', 8571234, 'rf-mobile@gmail.com', 'https://rf-mobile.com', 'https://rf-mobile.com', 'https://rf-mobile.com', 'https://rf-mobile.com', 'The Next Of Rf Mobile', '2024-08-21 19:41:48', '2024-08-21 20:51:46', NULL),
(9, 0, 'JUNB6fyQmTn0h6cgddtxhMVHQuEfzphD1dL45t7Y.jpg', 'Ether', 'Es Ether', 12345, 'ether@gmail.com', 'https://ether.com', 'https://ether.com', 'https://ether.com', 'https://ether.com', 'Ether Plate', '2024-08-21 19:46:23', '2024-08-21 20:51:46', NULL);

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
('JaY92CfKZ5D8STLm6jLJlFB5O8StM8V8GbYGS2yf', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSXVQQUJXcEFiTG5ubWRaUFRSblNHeWY1QVBIaUJYMG9zUWx1UkJvTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1726039722);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_level` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_level`, `nama_lengkap`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nawa Sapta', 'nawa@gmail.com', NULL, '$2y$12$Q1YdMoMoVeZ6NnXSt7Ht0ebBHX0Jr7w0I9PajF/5F/LaI/c7I0WXu', NULL, '2024-08-01 01:08:22', '2024-08-01 01:08:22'),
(2, 2, 'Meidhika', 'meidhika@gmail.com', NULL, '$2y$12$UjIADq4MPVYB3j128sfZO.Kp5lPVHZhY9nWDuSiDYriw/FWd8WdAy', NULL, '2024-08-01 01:08:50', '2024-08-01 01:08:50');

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
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiences_id_profile_foreign` (`id_profile`);

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
-- Indexes for table `levels`
--
ALTER TABLE `levels`
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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_email_unique` (`email`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_level_foreign` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_id_profile_foreign` FOREIGN KEY (`id_profile`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
