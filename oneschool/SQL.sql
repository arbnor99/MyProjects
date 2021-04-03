-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2021 at 09:33 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oneschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `course_id`, `comment`, `from_name`, `from_email`, `created_at`, `updated_at`, `student_id`) VALUES
(5, 5, 'onasjnasjd nasjk sanj asjk djnasj dasjondj asdk j', 'Arsim Berisha', 'arsim@yahoo.com', '2021-03-17 11:04:37', '2021-03-17 11:04:37', 3);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `nr_students` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `user_id`, `course_name`, `description`, `duration`, `course_image`, `price`, `nr_students`, `created_at`, `updated_at`) VALUES
(4, 1, 'Bootstrap', 'In this course we will teach you how to use Bootstrap to create great WebPages', '3 weeks', 'courses/12MGwP3tLC9Dje8h2StM2cbEn722pIiOgLLIuhVU.png', 170, 1, '2021-01-16 20:52:56', '2021-02-14 13:26:31'),
(5, 1, 'Laravel', 'Learn how to use this amazing PHP framework to build databases.', '6 weeks', 'courses/gO2z6pmGoUaxWP58qycZB4ydhe1TXh8wFF7NnTTF.jpg', 200, 2, '2021-01-16 21:58:06', '2021-02-14 13:26:38'),
(6, 2, 'PHP', 'In this course you will learn how to use PHP basics and OOP PHP.', '5 weeks', 'courses/72csWAk5pVruqdPvi7uSpPWjGD1hWpr6jEJxkzTu.jpg', 210, 2, '2021-01-21 20:26:37', '2021-03-31 06:00:37'),
(8, 3, 'Javascript', 'In this course we will learn everything about Javascript. It is suitable for everyone to join us whether you are a beginner or advanced.', '8 weeks', 'courses/fD9z7UZznPqGrryNx2774UDUzPQ2APtR5YNZl5CB.png', 350, 3, '2021-03-31 05:40:51', '2021-03-31 05:58:33');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_11_220009_create_courses_table', 1),
(5, '2021_01_15_120215_create_comments_table', 1),
(6, '2021_01_15_144433_create_students_table', 1),
(7, '2021_01_15_150801_create_student_requests_table', 1),
(8, '2021_01_15_162559_create_user_requests_table', 1),
(9, '2021_01_23_113111_add_student_id_to_comments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `course_id`, `name`, `email`, `contact`, `photo`, `created_at`, `updated_at`) VALUES
(3, 5, 'Arsim Berisha', 'arsim@yahoo.com', '044189745', 'students/ZTgBAb2tcRgCX6IcrAJLUmdRr4iu41tuSu0LEcW3.jpg', '2021-01-21 21:19:15', '2021-01-21 21:19:15'),
(5, 6, 'Hana Krasniqi', 'rinesa@yahoo.com', '0447781224', 'students/6nZepn7QNK7EksRuMeZ9bM49EZTBwtmt1lXAV8mG.jpg', '2021-01-23 11:28:27', '2021-01-23 11:28:27'),
(7, 5, 'Asdren Kqiku', 'asdren@yahoo.com', '037947289', 'students/46QZ3K87YSODX3IAOdIQgeEaCBcMrK4KFmtcOmIz.jpg', '2021-02-14 13:26:38', '2021-02-14 13:26:38'),
(8, 8, 'Arian Deda', 'arian@gmail.com', '0447781224', 'students/670gcWVQDVTq2DWLU5xEmTjEjIDbSFHADlQPsfVR.jpg', '2021-03-31 05:58:20', '2021-03-31 05:58:20'),
(9, 8, 'Ardita Nuhiu', 'ardita@gmail.com', '84564564', 'students/0NizHwCB2pRLNaw5JHAnEH6EhwTGh16p6ehHkeq1.jpg', '2021-03-31 05:58:26', '2021-03-31 05:58:26'),
(10, 8, 'Berat Nushi', 'berat@gmail.com', '46546556', 'students/CipHm2xKuz0hQnGFSZVkmQxoTv6tXJFiXdnIRl4m.jpg', '2021-03-31 05:58:33', '2021-03-31 05:58:33'),
(11, 6, 'Gent Kuqi', 'gent@gmail.com', '04513238', 'students/kPqfcRvnLdl0MmirfB3bvrBXiUPuNxZCmmxe6TaQ.jpg', '2021-03-31 06:00:32', '2021-03-31 06:00:32'),
(12, 6, 'Uke Jaha', 'uke@yahoo.com', '46546556', 'students/0EzRXjW5ue78eGOtZsRJL2sHuVUJqEncAAGV0Q5v.jpg', '2021-03-31 06:00:37', '2021-03-31 06:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `student_requests`
--

CREATE TABLE `student_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_requests`
--

INSERT INTO `student_requests` (`id`, `course_id`, `name`, `email`, `contact`, `photo`, `created_at`, `updated_at`) VALUES
(4, 6, 'Endrit Gashi', 'endrit@gmail.com', '04513238', 'students/sgNpIBRzYYkFV4s1O7eKbh2grlDVGxJtiEY2Dh2B.jpg', '2021-03-31 05:52:27', '2021-03-31 05:52:27'),
(7, 5, 'Nush Lugaj', 'nush@yahoo.com', '04513238', 'students/bUpdHB7e0goiyYjx31VyU8EmxrdvAjmjLWqVz5Fi.jpg', '2021-03-31 05:59:45', '2021-03-31 05:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'teacher',
  `experience` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `experience`, `email`, `contact`, `email_verified_at`, `password`, `remember_token`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Arbnor Gashi', 'admin', 'I have over 1 year experience in both FrontEnd and BackEnd Web Development.', 'arbnor.gashi99@gmail.com', '045132384', NULL, '$2y$10$oVd7f78BihaKxGQx5aYKXOP4EqQxVsyzjrUYESBD.Q/XJ8BsWH2nW', NULL, 'users/LA0OusRRAywm2V5NWbjvtI8oNUyofRQCkl2PfTjb.jpg', '2021-01-15 15:28:57', '2021-01-15 15:28:57'),
(2, 'Agon Gashnjani', 'teacher', 'Agon has finished successfully training OOP PHP & MySQL.Now he is for the intership as backend in Starlabs company in Prishtina', 'agon@gmail.com', '045132387', NULL, '$2y$10$3acjHQ/Im0HVZaTVu2kxWengREW8U/pnwl5U76FcbdFED02fPVX7u', NULL, 'users/Rmh0r6aaX3ny9QJQzwiDIvRI5YQrXXLjotKU0AWn.jpg', '2021-01-16 20:03:39', '2021-01-16 20:03:39'),
(3, 'Kastriot Qeta', 'teacher', 'I have over than 10 years experience working with Javascript.', 'kastriot@yahoo.com', '04513238', NULL, '$2y$10$/aY52gtbfnnaNVu5vXCvpu8w6eL85MLkood/lhV/KjdcuxuhRhaaC', NULL, 'users/FuiRqF99Q78Hrh4v2YbGt3gt7VQKV0aY6bGwHsQh.jpg', '2021-03-31 05:31:26', '2021-03-31 05:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_requests`
--

CREATE TABLE `user_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_requests`
--

INSERT INTO `user_requests` (`id`, `name`, `role`, `experience`, `email`, `contact`, `email_verified_at`, `password`, `remember_token`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'Ardian Bunjaku', NULL, 'I have teached ReactJS for 7 years. Also have experience with PHP.', 'ardian@gmail', '84564564', NULL, '$2y$10$UEpts5CdwKyWTMTreOmIHuf2D.3xUUltm9k73I.CqzPSXkkpnZ6E6', NULL, 'users/1IXtKhV6vLrLS9XaHNtsnYbVdywqmZ0vaReuoK9s.png', '2021-03-31 05:34:44', '2021-03-31 05:34:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_requests`
--
ALTER TABLE `student_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_requests`
--
ALTER TABLE `user_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_requests_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_requests`
--
ALTER TABLE `student_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_requests`
--
ALTER TABLE `user_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
