-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 06:21 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alphau`
--

-- --------------------------------------------------------

--
-- Table structure for table `automations`
--

CREATE TABLE `automations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_visible` varchar(255) NOT NULL,
  `automation_file` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day_archives`
--

CREATE TABLE `day_archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `archive_date` date NOT NULL,
  `archive_time` time NOT NULL,
  `is_visible` varchar(255) NOT NULL,
  `program_file` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre` varchar(255) NOT NULL,
  `is_visible` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 'entertainment', 'show', '2023-12-06 22:16:54', '2023-12-06 22:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `episode` varchar(255) NOT NULL,
  `episode_date` date NOT NULL,
  `episode_time` time NOT NULL,
  `is_visible` varchar(255) NOT NULL,
  `program_directory` varchar(255) NOT NULL,
  `program_file` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `archive_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_06_025910_create_genres_table', 1),
(6, '2023_11_07_042000_create_program_archives_table', 1),
(7, '2023_11_07_042001_create_programs_table', 1),
(8, '2023_11_07_042003_create_libraries_table', 1),
(9, '2023_11_07_060819_create_day_archives_table', 1),
(10, '2023_11_07_062000_create_automations_table', 1),
(11, '2023_11_08_040147_create_schools_table', 1),
(12, '2023_11_13_034059_create_play_toggles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `play_toggles`
--

CREATE TABLE `play_toggles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `current_status` varchar(255) NOT NULL DEFAULT 'Online',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `play_toggles`
--

INSERT INTO `play_toggles` (`id`, `current_status`, `created_at`, `updated_at`) VALUES
(1, 'AUTOMATION', NULL, '2023-12-06 23:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `episode` varchar(255) NOT NULL,
  `episode_date` date NOT NULL,
  `episode_time` time NOT NULL,
  `is_visible` varchar(255) NOT NULL,
  `program_directory` varchar(255) NOT NULL,
  `program_file` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `archive_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program_name`, `episode`, `episode_date`, `episode_time`, `is_visible`, `program_directory`, `program_file`, `duration`, `archive_id`, `created_at`, `updated_at`) VALUES
(1, 'testprogram1', '1', '2023-12-07', '09:17:00', 'show', 'testprogram1', 'resources/programs/testprogram1/testprogram1_1.mp3', '26.219101041667', 1, '2023-12-06 22:18:13', '2023-12-06 22:18:13'),
(2, 'testprogram1', '2', '2023-12-07', '13:11:00', 'show', 'testprogram1', 'resources/programs/testprogram1/testprogram1_2.mp3', '26.219101041667', 1, '2023-12-06 22:41:42', '2023-12-06 22:41:42'),
(3, 'testprogram2', '1', '2023-12-07', '09:00:00', 'show', 'testprogram2', 'resources/programs/testprogram2/testprogram2_1.mp3', '0.16805416666667', 2, '2023-12-06 22:55:57', '2023-12-06 22:55:57'),
(4, 'testprogram2', '2', '2023-12-07', '09:58:00', 'show', 'testprogram2', 'resources/programs/testprogram2/testprogram2_2.mp3', '0.16805416666667', 2, '2023-12-06 22:56:22', '2023-12-06 22:56:22'),
(5, 'testprogram3', '1', '2023-12-07', '09:57:00', 'show', 'testprogram3', 'resources/programs/testprogram3/testprogram3_1.mp3', '0.16805416666667', 3, '2023-12-06 22:56:41', '2023-12-06 22:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `program_archives`
--

CREATE TABLE `program_archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `program_genre` varchar(255) NOT NULL,
  `program_directory` varchar(255) NOT NULL,
  `is_visible` varchar(255) NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_archives`
--

INSERT INTO `program_archives` (`id`, `program_name`, `program_genre`, `program_directory`, `is_visible`, `genre_id`, `created_at`, `updated_at`) VALUES
(1, 'testprogram1', 'entertainment', 'testprogram1', 'show', 1, '2023-12-06 22:17:31', '2023-12-06 22:17:31'),
(2, 'testprogram2', 'entertainment', 'testprogram2', 'show', 1, '2023-12-06 22:53:56', '2023-12-06 22:53:56'),
(3, 'testprogram3', 'entertainment', 'testprogram3', 'show', 1, '2023-12-06 22:54:11', '2023-12-06 22:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_adddress` varchar(255) NOT NULL,
  `school_index` varchar(255) NOT NULL,
  `is_visible` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `student_index` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `role`, `school`, `student_index`, `is_active`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AlphaU', 'Radio', 'admin@test.com', 'admin', 'NIE', '00001', 'active', NULL, '$2y$10$JOgnxsQCMyB5vqVzFAcgZu5AwLTPHaLqIeLW2YJoXh1SaM7Nvln/O', NULL, '2023-12-06 05:44:10', '2023-12-06 05:44:10'),
(2, 'Jade', 'Laurel', 'student@test.com', 'user', 'abc', '789654', 'active', NULL, '$2y$10$/5E4tYEIOYRR5VYeUIF8RekW9uFDn0lljuwLGMtwTtquT9EpSPMk2', NULL, '2023-12-06 21:45:44', '2023-12-06 21:45:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automations`
--
ALTER TABLE `automations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `automations_program_id_foreign` (`program_id`);

--
-- Indexes for table `day_archives`
--
ALTER TABLE `day_archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day_archives_program_id_foreign` (`program_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `play_toggles`
--
ALTER TABLE `play_toggles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_archives`
--
ALTER TABLE `program_archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_archives_genre_id_foreign` (`genre_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `automations`
--
ALTER TABLE `automations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day_archives`
--
ALTER TABLE `day_archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `play_toggles`
--
ALTER TABLE `play_toggles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `program_archives`
--
ALTER TABLE `program_archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `automations`
--
ALTER TABLE `automations`
  ADD CONSTRAINT `automations_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `day_archives`
--
ALTER TABLE `day_archives`
  ADD CONSTRAINT `day_archives_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_archives`
--
ALTER TABLE `program_archives`
  ADD CONSTRAINT `program_archives_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
