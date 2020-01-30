-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 08:30 PM
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
(3, 'shawon', '018374897239847', '2019-11-15 03:58:37', '2019-12-18 18:31:50'),
(5, 'client1', '01623272833', '2019-11-19 02:51:17', '2019-11-19 02:51:17'),
(6, 'client2', '01623272833', '2019-11-19 02:51:29', '2019-11-19 02:51:29'),
(8, 'client 3', '0167234354', '2019-11-26 22:05:35', '2019-12-18 18:32:02');

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
(1, 'QA department', 20, '2019-12-08 20:35:00', '2019-12-08 20:35:00'),
(24, 'Web app', 5, '2019-11-17 23:57:08', '2019-12-25 07:18:04'),
(26, 'IOS', 19, '2019-11-21 02:21:28', '2019-12-25 07:18:12'),
(27, 'Desktop App', 12, '2019-11-26 22:07:42', '2019-12-25 07:18:21'),
(28, 'Networking', 36, '2019-12-24 19:04:01', '2019-12-25 07:18:42'),
(29, 'IOT', NULL, '2019-12-25 07:18:50', '2019-12-25 07:18:50');

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
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `manager_id`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'web development', 2, 24, '2019-12-07 10:22:12', '2019-12-08 20:04:19'),
(2, 'laravel', 14, 26, '2019-12-07 10:27:56', '2019-12-07 10:27:56'),
(3, 'group 1', 18, 1, '2019-12-08 21:14:55', '2019-12-25 10:43:53'),
(4, 'group 2', NULL, 1, '2019-12-08 21:15:02', '2019-12-08 21:15:02'),
(5, 'freedom fighter', NULL, 1, '2019-12-27 18:26:52', '2019-12-27 18:26:52');

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
(1, 3),
(1, 15),
(3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) NOT NULL,
  `to` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(503, 1, 2, 'go', 1, '2019-12-11 19:53:11', '2019-12-25 09:39:37'),
(504, 1, 2, 'i am here', 1, '2019-12-11 19:53:27', '2019-12-25 09:39:37'),
(505, 1, 2, 'hi', 1, '2019-12-11 20:11:36', '2019-12-25 09:39:37'),
(506, 1, 2, 'hi', 1, '2019-12-11 20:13:56', '2019-12-25 09:39:37'),
(507, 1, 2, 'fdgfdg', 1, '2019-12-11 20:18:09', '2019-12-25 09:39:37'),
(508, 2, 1, 'how can i help yo', 1, '2019-12-11 20:30:52', '2019-12-27 16:05:21'),
(509, 1, 2, 'oh no', 1, '2019-12-11 20:31:33', '2019-12-25 09:39:37'),
(510, 1, 2, 'yes', 1, '2019-12-11 20:31:50', '2019-12-25 09:39:37'),
(511, 1, 2, 'hi', 1, '2019-12-11 20:38:44', '2019-12-25 09:39:37'),
(512, 1, 2, 'then', 1, '2019-12-11 21:01:27', '2019-12-25 09:39:37'),
(513, 1, 2, 'hello', 1, '2019-12-11 21:06:07', '2019-12-25 09:39:37'),
(514, 1, 3, 'hi', 1, '2019-12-11 21:06:16', '2019-12-25 09:39:07'),
(515, 1, 2, 'hello', 1, '2019-12-11 21:06:31', '2019-12-25 09:39:37'),
(516, 1, 2, 'hi', 1, '2019-12-11 21:06:34', '2019-12-25 09:39:37'),
(517, 1, 2, 'then', 1, '2019-12-11 21:06:43', '2019-12-25 09:39:37'),
(518, 1, 3, 'go to hell', 1, '2019-12-11 21:09:49', '2019-12-25 09:39:07'),
(519, 2, 1, 'do  your job', 1, '2019-12-11 21:35:15', '2019-12-27 16:05:21'),
(520, 2, 1, 'hi', 1, '2019-12-11 21:35:21', '2019-12-27 16:05:21'),
(521, 2, 3, 'hi he', 1, '2019-12-11 21:36:01', '2019-12-25 09:39:07'),
(522, 2, 3, 'hellow', 1, '2019-12-11 21:36:06', '2019-12-25 09:39:07'),
(523, 3, 2, 'ok good night', 1, '2019-12-11 21:44:59', '2019-12-12 09:38:00'),
(524, 3, 2, 'the are not good', 1, '2019-12-11 21:51:30', '2019-12-12 09:38:00'),
(525, 3, 2, 'they are bad', 1, '2019-12-11 21:52:08', '2019-12-12 09:38:00'),
(526, 5, 2, 'hi', 1, '2019-12-11 21:55:06', '2019-12-12 09:37:59'),
(527, 1, 3, 'hi', 1, '2019-12-12 08:14:15', '2019-12-25 09:39:07'),
(528, 1, 2, 'ok', 1, '2019-12-16 11:46:38', '2019-12-25 09:39:37'),
(529, 1, 3, 'best of luck', 1, '2019-12-18 18:24:45', '2019-12-25 09:39:07'),
(530, 1, 2, 'thats right', 1, '2019-12-24 09:36:05', '2019-12-25 09:39:37'),
(531, 5, 1, 'hi', 1, '2019-12-24 17:29:26', '2019-12-27 16:05:19'),
(532, 5, 1, 'hellow', 1, '2019-12-24 17:41:37', '2019-12-27 16:05:19'),
(533, 5, 1, 'go', 1, '2019-12-24 17:42:08', '2019-12-27 16:05:19'),
(534, 5, 1, 'hi', 1, '2019-12-24 17:42:34', '2019-12-27 16:05:19'),
(535, 5, 1, 'then', 1, '2019-12-24 17:42:56', '2019-12-27 16:05:19'),
(536, 5, 1, 'i', 1, '2019-12-24 17:43:05', '2019-12-27 16:05:19'),
(537, 2, 1, 'great', 1, '2019-12-25 09:39:36', '2019-12-27 16:05:21');

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
(32, '2019_11_16_090119_create_divisions_table', 6),
(33, '2019_11_01_140652_create_role_user_table', 3),
(51, '2019_11_21_081802_create_groups_table', 11),
(52, '2019_11_21_085446_create_group_user_table', 11),
(56, '2019_12_07_164956_add_profile_to_users_table', 14),
(57, '2019_12_11_184914_create_messages_table', 15),
(60, '2019_11_11_111100_create_projects_table', 16),
(64, '2019_12_25_150003_create_submittasks_table', 18),
(66, '2019_11_25_125141_create_tasks_table', 19),
(67, '2019_11_19_133715_create_modules_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_notify` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `submission` date DEFAULT NULL,
  `qa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('shawonkhan260@gmail.com', '$2y$10$.fn8lPt8J3BCpkzjAircheomKluOTvOqj56LibWIikoZBHU3uneuK', '2019-12-13 20:28:31');

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
  `submission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_notify` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, 3),
(2, 5),
(2, 12),
(3, 14),
(4, 16),
(4, 17),
(3, 18),
(2, 19),
(2, 20),
(1, 37),
(2, 36),
(4, 38),
(4, 39),
(4, 15),
(4, 40),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `submittasks`
--

CREATE TABLE `submittasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_notify` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submission` date DEFAULT NULL,
  `module_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public/pictures/1.png',
  `skill` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `picture`, `skill`) VALUES
(1, 'admin shawon khan', 'admin@gmail.com', NULL, '$2y$10$SIopVEkqnmYsESSdSzRiZeOT7.p.a.no6KpY2DMjBoTMUwqyWTuaq', '8BnDK5dxy3idrJgjfhvHOEZwwo2n9r7LhuLDk7DlWxVX6GmILETL9pXvxVzf', '2019-11-01 08:32:49', '2019-12-11 08:42:18', 'public/pictures/HD6GjHaVB0LFniLQqu04j1VJDKuOA88rfLX5TkmY.jpeg', 'Laravel developer'),
(2, 'manager shawon', 'manager@gmail.com', NULL, '$2y$10$TlZh6/zNr.6YgF0O4aIEAuyzp65gl6ZDdVrtOuLmKN/lyey6/Plzu', 'Gxm1hPg2Or3MXBSzIgOUSciTi7lDfp6GlH2JtSWKqA9uDDC8hnULJpGd66Dh', '2019-11-01 08:33:53', '2019-12-11 08:01:43', 'public/pictures/nxtkhuIeWVc6dUwgUw8bfTGbYrenyhSRJ8Zw0grl.jpeg', NULL),
(3, 'employee tufail', 'employee@gmail.com', NULL, '$2y$10$zg5sWblRpA6mJNV2EFbgD.ulCrL6pfTtkTWv.oLOMwMcX5GyaKxiq', 'q5Ash3NMZcRIPxPEvOKq3InTYvGDS9RRyhLXDKCXQhtckURYqFpF77PTqIWY', '2019-11-01 08:33:24', '2019-11-01 08:33:24', 'public/pictures/1.png', NULL),
(5, 'head shawon', 'head@gmail.com', NULL, '$2y$10$NVsemj0STZngxoSvXh4TPe/sKq3vSUFy2pjOUoB66huWo4eKr8wV.', NULL, '2019-11-16 02:24:46', '2019-12-10 22:33:11', 'public/pictures/39Bgiq2o7qoL9BpVVcNTOcCRFrACvBUa2VhPpVdr.jpeg', NULL),
(12, 'head3', 'head3@gmail.com', NULL, '$2y$10$Fuzjqj2B6iJGyO1sIWjx2OzbvJuFp2i4p3MH3ci2UGvYu8zs2PxMq', NULL, '2019-11-18 01:51:14', '2019-11-18 01:51:14', 'public/pictures/1.png', NULL),
(14, 'manager1', 'manager1@gmail.com', NULL, '$2y$10$pSnqpA9NsuCFDTHPKe7V0.Wp7fFaroElHEsp3d2FJK4XRSYCYHl9e', NULL, '2019-11-19 12:21:32', '2019-11-19 12:21:32', 'public/pictures/1.png', NULL),
(15, 'employee1', 'employee1@gmail.com', NULL, '$2y$10$Hz4k0SjOcYjDo68PKy.6eeMZCn6Q98f/QIL7.bXSjnaqEjFAf1CKC', NULL, '2019-11-25 03:58:15', '2019-11-25 03:58:15', 'public/pictures/1.png', NULL),
(16, 'employee2', 'employee2@gmail.com', NULL, '$2y$10$ORjbgisE0Y9.bDRlxL/Y4ueBxEYaXwzbPixdtdFWr1q2BnikcPcXO', NULL, '2019-11-25 03:59:19', '2019-11-25 03:59:19', 'public/pictures/1.png', NULL),
(17, 'employee3', 'employee3@gmail.com', NULL, '$2y$10$1E7uWeS67JaBSzzsOGGHpOGBtPw9DKGA5fN9KpyJxwW/vQEoAbAay', NULL, '2019-11-25 04:00:04', '2019-11-25 04:00:04', 'public/pictures/1.png', NULL),
(18, 'manager2', 'manager2@gmail.com', NULL, '$2y$10$0HHmmMh8jtxQSUHLswOeK.mARnKUVHp7QREH5br0SYiNMLdlPXQty', NULL, '2019-11-25 05:46:36', '2019-11-25 05:46:36', 'public/pictures/1.png', NULL),
(19, 'head1', 'head1@gmail.com', NULL, '$2y$10$F.nggEt3m9gIPA9PeA6dLOQMMN/r/I4KazxyQzV703gLV6ZRFpjI6', NULL, '2019-11-26 22:08:47', '2019-11-26 22:08:47', 'public/pictures/1.png', NULL),
(20, 'head2', 'head2@gmail.com', NULL, '$2y$10$tsfNGRQgISV9X4oFJ3ieaevZ3Xu5VQsScQkgLf5t06NOnpd8zx4hK', NULL, '2019-11-26 22:12:25', '2019-11-26 22:12:25', 'public/pictures/1.png', NULL),
(36, 'newuser', 'newuser@gmail.com', NULL, '$2y$10$GdSp7WmM.IC0XwJQmUQ32.LCCTNNNuLGvJWNyq.l9Jt9xX9usrxMG', NULL, '2019-12-24 10:36:07', '2019-12-24 10:36:07', 'public/pictures/1.png', NULL),
(37, 'admin2', 'admin2@gmail.com', NULL, '$2y$10$QRPGHKyFd3c9S4Giq3xCLuGlZT0g2Gg02VU5jHMZ3MMBZp090einS', NULL, '2019-12-24 21:56:10', '2019-12-24 21:56:10', 'public/pictures/1.png', 'java'),
(38, 'Employee4', 'employee4@gmail.com', NULL, '$2y$10$6AClEUTGbUiz4Qn8Dw3aSOKXH1qs5IzHG.ggcCAzoyGDOZS4O6i5W', NULL, '2019-12-25 07:21:46', '2019-12-25 07:21:46', 'public/pictures/1.png', 'web designer'),
(39, 'Employee5', 'employee5@gmail.com', NULL, '$2y$10$mSKe/L/kcdYHa/lfe/h/ZOFt.PCpTrLzgNpfL5ipIdOZRmovGTxY6', NULL, '2019-12-25 07:22:38', '2019-12-25 07:22:38', 'public/pictures/1.png', 'php developer'),
(40, 'Employee6', 'employee6@gmail.com', NULL, '$2y$10$POtawR3qs8AH2TsfOFMJ4.FnV1l8gATztG7u1x.kvgd18jsCcpb8q', NULL, '2019-12-25 07:24:47', '2019-12-25 07:24:47', 'public/pictures/1.png', 'java developer');

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
  ADD KEY `groups_manager_id_foreign` (`manager_id`),
  ADD KEY `groups_division_id_foreign` (`division_id`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD KEY `group_user_group_id_foreign` (`group_id`),
  ADD KEY `group_user_user_id_foreign` (`user_id`);

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
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modules_project_id_foreign` (`project_id`),
  ADD KEY `modules_group_id_foreign` (`group_id`);

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
-- Indexes for table `submittasks`
--
ALTER TABLE `submittasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submittasks_task_id_foreign` (`task_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=538;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `submittasks`
--
ALTER TABLE `submittasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  ADD CONSTRAINT `groups_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
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
  ADD CONSTRAINT `modules_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `modules_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submittasks`
--
ALTER TABLE `submittasks`
  ADD CONSTRAINT `submittasks_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;

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
