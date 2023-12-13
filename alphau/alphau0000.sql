-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 02:45 AM
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
(1, 'entertainment', 'show', '2023-12-11 04:11:48', '2023-12-11 04:11:48'),
(2, 'science', 'show', '2023-12-11 04:11:55', '2023-12-11 04:11:55'),
(3, 'drama', 'show', '2023-12-11 04:12:02', '2023-12-11 04:12:02');

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reply` varchar(255) DEFAULT NULL,
  `message_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `student_id`, `student_name`, `message`, `reply`, `message_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Buffy', 'test msg', 'zxfzfd', 'seen', '2023-12-11 19:15:47', '2023-12-12 01:08:11'),
(2, 2, 'Buffy', 'test msg', 'reply 2', 'seen', '2023-12-11 19:17:50', '2023-12-12 01:13:07'),
(3, 2, 'Buffy', 'test 3', NULL, 'sent', '2023-12-12 01:29:18', '2023-12-12 01:29:18'),
(4, 2, 'Buffy', 'test 4', NULL, 'sent', '2023-12-12 01:29:24', '2023-12-12 01:29:24'),
(5, 2, 'Buffy', 'test 5', NULL, 'sent', '2023-12-12 01:29:35', '2023-12-12 01:29:35'),
(6, 2, 'Buffy', 'zzzzz', NULL, 'sent', '2023-12-12 02:07:46', '2023-12-12 02:07:46'),
(7, 2, 'Buffy', 'xxxddd', NULL, 'sent', '2023-12-12 02:11:10', '2023-12-12 02:11:10');

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
(12, '2023_11_13_034059_create_play_toggles_table', 1),
(14, '2023_12_11_231640_create_messages_table', 2);

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
(1, 'AUTOMATION', NULL, NULL);

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
  `program_genre` varchar(255) NOT NULL,
  `program_thumbanail` varchar(255) NOT NULL,
  `program_file` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `archive_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program_name`, `episode`, `episode_date`, `episode_time`, `is_visible`, `program_directory`, `program_genre`, `program_thumbanail`, `program_file`, `duration`, `archive_id`, `created_at`, `updated_at`) VALUES
(1, 'testprogram1', '1', '2023-12-11', '15:21:00', 'show', 'testprogram1', 'entertainment', 'resources/thumbnails/1702287770.jpg', 'resources/programs/testprogram1/testprogram1_1.mp3', '26.93', 1, '2023-12-11 04:20:01', '2023-12-11 04:20:01'),
(2, 'testprogram2', '1', '2023-12-11', '15:24:00', 'show', 'testprogram2', 'science', 'resources/thumbnails/1702287795.jpg', 'resources/programs/testprogram2/testprogram2_1.mp3', '19.93', 2, '2023-12-11 04:20:42', '2023-12-11 04:20:42'),
(3, 'testprogram3', '1', '2023-12-11', '15:23:00', 'show', 'testprogram3', 'drama', 'resources/thumbnails/1702287816.jpg', 'resources/programs/testprogram3/testprogram3_1.mp3', '26.22', 3, '2023-12-11 04:22:16', '2023-12-11 04:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `program_archives`
--

CREATE TABLE `program_archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_thumbanail` varchar(255) DEFAULT NULL,
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

INSERT INTO `program_archives` (`id`, `program_thumbanail`, `program_name`, `program_genre`, `program_directory`, `is_visible`, `genre_id`, `created_at`, `updated_at`) VALUES
(1, 'resources/thumbnails/1702287770.jpg', 'testprogram1', 'entertainment', 'testprogram1', 'show', 1, '2023-12-11 04:12:50', '2023-12-11 04:12:50'),
(2, 'resources/thumbnails/1702287795.jpg', 'testprogram2', 'science', 'testprogram2', 'show', 2, '2023-12-11 04:13:15', '2023-12-11 04:13:15'),
(3, 'resources/thumbnails/1702287816.jpg', 'testprogram3', 'drama', 'testprogram3', 'show', 3, '2023-12-11 04:13:36', '2023-12-11 04:13:36');

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
(1, 'AlphaU', 'Radio', 'admin@test.com', 'admin', 'NIE', '00001', 'active', NULL, '$2y$10$sY.5QwGznKX9uZ322LRdpOSTw0uiTYaeFR8H0u5rzRucS0dF8AKda', NULL, '2023-12-11 04:07:21', '2023-12-11 04:07:21'),
(2, 'Buffy', 'Carney', 'xuvyxicim@z.com', 'user', 'Alias ab qui hic dol', 'Aut et quia ut archi', 'active', NULL, '$2y$10$20eXjI.EF3p4MyH3LbDevOoxKKzXOV5G/2RQoKTVIj8tQzBOgjKHK', NULL, '2023-12-11 19:14:59', '2023-12-11 19:14:59');

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
