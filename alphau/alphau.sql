-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 01:21 PM
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
  `program_name` varchar(255) NOT NULL,
  `automation_episode` varchar(255) NOT NULL,
  `automation_url` varchar(255) NOT NULL,
  `is_visible` varchar(255) NOT NULL,
  `program_directory` varchar(255) NOT NULL,
  `archive_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `automations`
--

INSERT INTO `automations` (`id`, `program_name`, `automation_episode`, `automation_url`, `is_visible`, `program_directory`, `archive_id`, `created_at`, `updated_at`) VALUES
(1, 'morning', '1', 'abcd', 'show', 'morning', 1, '2023-11-13 06:48:27', '2023-11-13 06:48:27'),
(2, 'morning', '2', 'abcd', 'show', 'morning', 1, '2023-11-13 06:49:18', '2023-11-13 06:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `automation_audio_files`
--

CREATE TABLE `automation_audio_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `automation_file` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `automation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `automation_audio_files`
--

INSERT INTO `automation_audio_files` (`id`, `automation_file`, `duration`, `automation_id`, `created_at`, `updated_at`) VALUES
(1, '16998779072.mp3', '1560.9208125', 1, '2023-11-13 06:48:27', '2023-11-13 06:48:27'),
(2, '16998779584.mp3', '10.08325', 2, '2023-11-13 06:49:18', '2023-11-13 06:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `day_archives`
--

CREATE TABLE `day_archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `archive_date` date NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `episode` varchar(255) NOT NULL,
  `is_visible` varchar(255) NOT NULL,
  `program_directory` varchar(255) NOT NULL,
  `archive_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_archives`
--

INSERT INTO `day_archives` (`id`, `archive_date`, `program_name`, `episode`, `is_visible`, `program_directory`, `archive_id`, `created_at`, `updated_at`) VALUES
(1, '2023-11-13', 'morning', '1', 'show', 'morning', 1, '2023-11-13 06:47:49', '2023-11-13 06:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `day_archive_audio_files`
--

CREATE TABLE `day_archive_audio_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_program_file` varchar(255) NOT NULL,
  `day_program_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_archive_audio_files`
--

INSERT INTO `day_archive_audio_files` (`id`, `day_program_file`, `day_program_id`, `created_at`, `updated_at`) VALUES
(1, '16998778694.mp3', 1, '2023-11-13 06:47:49', '2023-11-13 06:47:49'),
(2, '16998778699.mp3', 1, '2023-11-13 06:47:49', '2023-11-13 06:47:49');

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
(5, '2023_11_07_042000_create_program_archives_table', 1),
(6, '2023_11_07_042001_create_programs_table', 1),
(7, '2023_11_07_042002_create_program_audio_files_table', 1),
(8, '2023_11_07_060819_create_day_archives_table', 1),
(9, '2023_11_07_061037_create_day_archive_audio_files_table', 1),
(10, '2023_11_07_062000_create_automations_table', 1),
(11, '2023_11_07_062001_create_automation_audio_files_table', 1),
(12, '2023_11_08_040147_create_schools_table', 1),
(13, '2023_11_13_034059_create_play_toggles_table', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `episode` varchar(255) NOT NULL,
  `episode_date` date NOT NULL,
  `is_visible` varchar(255) NOT NULL,
  `program_directory` varchar(255) NOT NULL,
  `archive_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program_name`, `episode`, `episode_date`, `is_visible`, `program_directory`, `archive_id`, `created_at`, `updated_at`) VALUES
(1, 'morning', '1', '2023-11-13', 'show', 'morning', 1, '2023-11-13 06:47:22', '2023-11-13 06:47:22');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_archives`
--

INSERT INTO `program_archives` (`id`, `program_name`, `program_genre`, `program_directory`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 'morning', 'Entertainment', 'morning', 'show', '2023-11-13 06:46:54', '2023-11-13 06:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `program_audio_files`
--

CREATE TABLE `program_audio_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_file` varchar(255) DEFAULT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_audio_files`
--

INSERT INTO `program_audio_files` (`id`, `program_file`, `program_id`, `created_at`, `updated_at`) VALUES
(1, '16998778428.mp3', 1, '2023-11-13 06:47:22', '2023-11-13 06:47:22'),
(2, '16998778423.mp3', 1, '2023-11-13 06:47:22', '2023-11-13 06:47:22');

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

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `province`, `district`, `school_name`, `school_adddress`, `school_index`, `is_visible`, `created_at`, `updated_at`) VALUES
(1, 'Northern', 'Jaffna', 'Gabriel Campos', 'q', '223344', 'show', '2023-11-13 06:50:40', '2023-11-13 06:50:40');

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
(1, 'AlphaU', 'Radio', 'admin@test.com', 'admin', 'NIE', '00001', 'active', NULL, '$2y$10$ka6//jhg2YHUnys3/SS8UeBu/TJNDlm1AqL6eJ06G1kYbyMwTpnxO', NULL, '2023-11-13 06:45:36', '2023-11-13 06:45:36'),
(2, 'Julian', 'West', 'a@z.com', 'user', 'Gabriel Campos', '12365', 'active', NULL, '$2y$10$pGLy/94uM8iS.cQZ67ykruhWqKrS02KGYmfX9kQVVxzdmeWHKy9Ty', NULL, '2023-11-13 06:51:08', '2023-11-13 06:51:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automations`
--
ALTER TABLE `automations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `automations_archive_id_foreign` (`archive_id`);

--
-- Indexes for table `automation_audio_files`
--
ALTER TABLE `automation_audio_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `automation_audio_files_automation_id_foreign` (`automation_id`);

--
-- Indexes for table `day_archives`
--
ALTER TABLE `day_archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day_archives_archive_id_foreign` (`archive_id`);

--
-- Indexes for table `day_archive_audio_files`
--
ALTER TABLE `day_archive_audio_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day_archive_audio_files_day_program_id_foreign` (`day_program_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `programs_archive_id_foreign` (`archive_id`);

--
-- Indexes for table `program_archives`
--
ALTER TABLE `program_archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_audio_files`
--
ALTER TABLE `program_audio_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_audio_files_program_id_foreign` (`program_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `automation_audio_files`
--
ALTER TABLE `automation_audio_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `day_archives`
--
ALTER TABLE `day_archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `day_archive_audio_files`
--
ALTER TABLE `day_archive_audio_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `play_toggles`
--
ALTER TABLE `play_toggles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program_archives`
--
ALTER TABLE `program_archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program_audio_files`
--
ALTER TABLE `program_audio_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `automations_archive_id_foreign` FOREIGN KEY (`archive_id`) REFERENCES `program_archives` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `automation_audio_files`
--
ALTER TABLE `automation_audio_files`
  ADD CONSTRAINT `automation_audio_files_automation_id_foreign` FOREIGN KEY (`automation_id`) REFERENCES `automations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `day_archives`
--
ALTER TABLE `day_archives`
  ADD CONSTRAINT `day_archives_archive_id_foreign` FOREIGN KEY (`archive_id`) REFERENCES `program_archives` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `day_archive_audio_files`
--
ALTER TABLE `day_archive_audio_files`
  ADD CONSTRAINT `day_archive_audio_files_day_program_id_foreign` FOREIGN KEY (`day_program_id`) REFERENCES `day_archives` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_archive_id_foreign` FOREIGN KEY (`archive_id`) REFERENCES `program_archives` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `program_audio_files`
--
ALTER TABLE `program_audio_files`
  ADD CONSTRAINT `program_audio_files_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
