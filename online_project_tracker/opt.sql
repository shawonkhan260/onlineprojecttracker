-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 08:25 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opt`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(3, 'shawon', 'dhaka', '2019-11-15 03:58:37', '2019-11-15 03:58:37'),
(4, 'shawon khan', '0123', '2019-11-15 04:00:28', '2019-11-15 04:00:28'),
(5, 'client1', '01623272833', '2019-11-19 02:51:17', '2019-11-19 02:51:17'),
(6, 'client2', '01623272833', '2019-11-19 02:51:29', '2019-11-19 02:51:29'),
(8, 'client 3', '0167', '2019-11-26 22:05:35', '2019-11-26 22:05:35'),
(9, 'naim', '-dffdkjsl', '2019-11-27 10:28:31', '2019-11-27 10:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(24, 'laravel', 5, '2019-11-17 23:57:08', '2019-11-21 06:49:26'),
(25, 'google', 12, '2019-11-18 01:35:10', '2019-11-21 06:37:44'),
(26, 'software', 19, '2019-11-21 02:21:28', '2019-11-27 10:30:49'),
(27, 'ui design', NULL, '2019-11-26 22:07:42', '2019-11-26 22:07:42');

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `manager_id`, `created_at`, `updated_at`) VALUES
(3, 'go to hell with me', 14, '2019-11-21 05:47:18', '2019-11-21 07:01:27'),
(4, 'sdkjfl', 2, '2019-11-25 03:12:05', '2019-11-25 03:12:05'),
(5, 'skdjfklj', 18, '2019-11-25 03:14:11', '2019-11-25 06:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`group_id`, `user_id`) VALUES
(4, 16),
(4, 17),
(3, 3),
(3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_01_140137_create_roles_table', 2),
(14, '2019_11_04_131428_create_clients_table', 4),
(28, '2019_11_11_111100_create_projects_table', 5),
(32, '2019_11_16_090119_create_divisions_table', 6),
(33, '2019_11_01_140652_create_role_user_table', 3),
(37, '2019_11_19_133715_create_modules_table', 7),
(45, '2019_11_21_081802_create_groups_table', 8),
(46, '2019_11_21_085446_create_group_user_table', 8),
(48, '2019_11_25_125141_create_tasks_table', 9),
(50, '2019_11_27_043434_add_file_to_tasks_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submission` date DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `details`, `submission`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'go to hell', 'be good', '2019-11-28', 5, 14, '2019-11-19 09:38:32', '2019-11-27 10:34:12'),
(7, 'cdsf', 'sdf', '2019-11-30', 5, 14, '2019-11-19 09:38:38', '2019-11-25 06:14:44'),
(8, 'facebook', 'go', NULL, 5, 2, '2019-11-19 09:41:24', '2019-11-21 01:12:13'),
(9, 'google', 'create google searchbar', '2019-11-28', 5, 14, '2019-11-19 09:41:37', '2019-11-21 01:05:49'),
(10, 'university', 'class', NULL, 5, 2, '2019-11-19 11:15:30', '2019-11-21 01:12:25'),
(12, 'log in page', 'create log in page with 3 field', NULL, 16, NULL, '2019-11-21 00:48:30', '2019-11-21 00:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `details`, `client_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 'log in', 'log in gooo', 4, 5, NULL, '2019-11-15 02:08:11', '2019-11-21 04:04:29'),
(16, 'facebook', 'tanjil', 4, 5, NULL, '2019-11-15 12:02:04', '2019-11-15 12:02:04'),
(27, 'fdgg', 'dfggf', 4, 5, NULL, '2019-11-18 01:34:19', '2019-11-18 01:34:19'),
(29, 'fdsdfg', 'fggf', NULL, NULL, NULL, '2019-11-18 01:45:19', '2019-11-18 01:45:19'),
(31, 'djsfksfd', 'sdfsdf', 4, NULL, NULL, '2019-11-19 02:45:43', '2019-11-19 02:45:43'),
(32, 'dsfdfs', 'sdfdf', NULL, NULL, NULL, '2019-11-19 02:45:49', '2019-11-19 02:45:49'),
(33, 'df', 'dfdf', NULL, 5, NULL, '2019-11-19 02:45:53', '2019-11-26 22:07:12'),
(34, 'go to hell with me', 'skdfjlksdjf', 9, NULL, NULL, '2019-11-27 10:29:29', '2019-11-27 10:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'head', NULL, NULL),
(3, 'manager', NULL, NULL),
(4, 'employee', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(3, 2),
(4, 3),
(2, 5),
(2, 12),
(3, 14),
(4, 15),
(4, 16),
(4, 17),
(3, 18),
(2, 19),
(2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submission` date DEFAULT NULL,
  `module_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `details`, `status`, `submission`, `module_id`, `user_id`, `created_at`, `updated_at`, `file`) VALUES
(2, '20', 'sdfgd', NULL, '2019-11-30', 6, 16, '2019-11-25 08:07:28', '2019-11-26 23:15:40', 'public/file/9woUvc5uzWxJVqQ0SG42b8mwYw5HffBaBnTsvMZ5.txt'),
(3, 'sdfkl', 'sdffds', NULL, '2019-11-28', 6, 16, '2019-11-25 09:34:26', '2019-11-25 09:34:36', NULL),
(4, '30', 'dsfdfs', NULL, '2019-11-30', 6, 17, '2019-11-25 09:36:54', '2019-11-25 09:39:14', NULL),
(5, 'got', 'sdffds', NULL, '2019-11-30', 6, 17, '2019-11-25 09:40:49', '2019-11-25 09:42:24', NULL),
(7, 'sdkjflksdjafklj', 'asdlf;kl;sdakf;lk', NULL, '2019-11-30', 8, 16, '2019-11-25 09:58:46', '2019-11-25 09:58:55', NULL),
(8, 'dsffsd', 'dsff', NULL, NULL, 8, 16, '2019-11-27 10:37:14', '2019-11-27 10:37:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin shawon', 'admin@gmail.com', NULL, '$2y$10$TlZh6/zNr.6YgF0O4aIEAuyzp65gl6ZDdVrtOuLmKN/lyey6/Plzu', '4xusBWmIiSHgFyQtSjpFdcaDQruVCI2WbxwlzXWl0vjSzqzUEXJpr6yhdRmB', '2019-11-01 08:32:49', '2019-11-01 08:32:49'),
(2, 'manager shawon', 'manager@gmail.com', NULL, '$2y$10$TlZh6/zNr.6YgF0O4aIEAuyzp65gl6ZDdVrtOuLmKN/lyey6/Plzu', 'UXGHxN1nSiHx3gvpQlQx0uOt9Uxo3KV0DcyvWmiIk3EfrU3LRwFgZ41cyU8m', '2019-11-01 08:33:53', '2019-11-01 08:33:53'),
(3, 'employee tufail', 'employee@gmail.com', NULL, '$2y$10$zg5sWblRpA6mJNV2EFbgD.ulCrL6pfTtkTWv.oLOMwMcX5GyaKxiq', 'XPwLQnZe7Me3TqISjSguu3dqmrIA6xWdUIDfLuvqLmdZt2mDa16G7waY36tY', '2019-11-01 08:33:24', '2019-11-01 08:33:24'),
(5, 'head shawon', 'head@gmail.com', NULL, '$2y$10$NVsemj0STZngxoSvXh4TPe/sKq3vSUFy2pjOUoB66huWo4eKr8wV.', NULL, '2019-11-16 02:24:46', '2019-11-16 02:24:46'),
(12, 'head3', 'head3@gmail.com', NULL, '$2y$10$Fuzjqj2B6iJGyO1sIWjx2OzbvJuFp2i4p3MH3ci2UGvYu8zs2PxMq', NULL, '2019-11-18 01:51:14', '2019-11-18 01:51:14'),
(14, 'manager1', 'manager1@gmail.com', NULL, '$2y$10$pSnqpA9NsuCFDTHPKe7V0.Wp7fFaroElHEsp3d2FJK4XRSYCYHl9e', NULL, '2019-11-19 12:21:32', '2019-11-19 12:21:32'),
(15, 'employee1', 'employee1@gmail.com', NULL, '$2y$10$Hz4k0SjOcYjDo68PKy.6eeMZCn6Q98f/QIL7.bXSjnaqEjFAf1CKC', NULL, '2019-11-25 03:58:15', '2019-11-25 03:58:15'),
(16, 'employee2', 'employee2@gmail.com', NULL, '$2y$10$ORjbgisE0Y9.bDRlxL/Y4ueBxEYaXwzbPixdtdFWr1q2BnikcPcXO', NULL, '2019-11-25 03:59:19', '2019-11-25 03:59:19'),
(17, 'employee3', 'employee3@gmail.com', NULL, '$2y$10$1E7uWeS67JaBSzzsOGGHpOGBtPw9DKGA5fN9KpyJxwW/vQEoAbAay', NULL, '2019-11-25 04:00:04', '2019-11-25 04:00:04'),
(18, 'manager2', 'manager2@gmail.com', NULL, '$2y$10$0HHmmMh8jtxQSUHLswOeK.mARnKUVHp7QREH5br0SYiNMLdlPXQty', NULL, '2019-11-25 05:46:36', '2019-11-25 05:46:36'),
(19, 'head1', 'head1@gmail.com', NULL, '$2y$10$F.nggEt3m9gIPA9PeA6dLOQMMN/r/I4KazxyQzV703gLV6ZRFpjI6', NULL, '2019-11-26 22:08:47', '2019-11-26 22:08:47'),
(20, 'head2', 'head2@gmail.com', NULL, '$2y$10$tsfNGRQgISV9X4oFJ3ieaevZ3Xu5VQsScQkgLf5t06NOnpd8zx4hK', NULL, '2019-11-26 22:12:25', '2019-11-26 22:12:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `divisions_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_manager_id_foreign` (`manager_id`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD KEY `group_user_group_id_foreign` (`group_id`),
  ADD KEY `group_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modules_project_id_foreign` (`project_id`),
  ADD KEY `modules_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_client_id_foreign` (`client_id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_module_id_foreign` (`module_id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `divisions`
--
ALTER TABLE `divisions`
  ADD CONSTRAINT `divisions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_user_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `modules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
