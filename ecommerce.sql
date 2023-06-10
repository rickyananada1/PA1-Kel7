-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 01:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`, `updated_at`) VALUES
(26, '11', '1', '3', '2023-06-07 20:26:27', '2023-06-07 20:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descrip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `selling_price`, `qty`, `status`, `popular`, `image`, `meta_title`, `meta_descrip`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Kemiri Bulat', 'Kemiri Bulat', 'Kemiri Bulat', '38000', '89992', 1, 0, '1686198893.jpg', 'Kemiri', 'Kemiri', 'Kemiri', '2023-05-01 18:10:51', '2023-06-10 04:42:56'),
(2, 'Kacang merah', 'Kacang merah', 'Kacang merah', '35000', '89997', 1, 0, '1686397061.jpg', 'Kacang merah', 'Kacang merah', 'Kacang merah', '2023-05-01 23:55:38', '2023-06-10 04:37:41'),
(7, 'Kemiri Keping', 'Kemiri keping', 'Kemiri Keping', '25000', '9999', 1, 0, '1686396789.jpg', NULL, NULL, NULL, '2023-06-10 04:32:29', '2023-06-10 04:33:09'),
(8, 'Cangkang Kemiri', 'Cangkang Kemiri', 'Cangkang Kemiri', '8500', '9999', 1, 0, '1686396864.jpg', NULL, NULL, NULL, '2023-06-10 04:34:24', '2023-06-10 04:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_13_071732_create_categories_table', 2),
(6, '2023_04_19_134557_create_categories_table', 3),
(7, '2023_04_21_055224_create_carts_table', 4),
(8, '2023_04_27_134800_create_orders_table', 5),
(9, '2023_04_27_143032_create_order_items_table', 6),
(10, '2023_04_27_143432_create_order_items_table', 7),
(11, '2023_05_22_034352_create_ratings_table', 8),
(13, '2023_05_27_132206_create_reviews_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address`, `city`, `total_price`, `status`, `message`, `tracking_no`, `time`, `created_at`, `updated_at`) VALUES
(1, '2', 'Miracle', 'Caliesta', 'poirot056@gmail.com', '087728455891', 'Toba', 'Porsea', '30000', '1', NULL, 'miracle7634', '2023-06-09 09:55:12', '2023-05-27 07:52:35', '2023-05-30 03:00:47'),
(2, '9', 'Jelita', 'Sirait', 'jelita@gmail.com', '087728455891', 'Toba', 'Porsea', '30000', '1', NULL, 'miracle2250', '2023-06-09 09:55:12', '2023-05-29 21:52:28', '2023-06-07 20:38:05'),
(3, '2', 'Miracle', 'Caliesta', 'poirot056@gmail.com', '087728455891', 'Toba', 'Porsea', '150000000', '0', NULL, 'miracle1129', '2023-06-09 09:55:12', '2023-05-30 06:57:37', '2023-05-30 06:57:37'),
(4, '10', 'Jhon', 'panjaitan', 'christianpanjaitan789@gmail.com', '081272048610', 'Jl Sitorang Kecamatan Silaen Kabupaten Toba', 'sitorang', '15000', '1', NULL, 'miracle8070', '2023-06-09 09:55:12', '2023-06-05 19:30:36', '2023-06-05 19:32:48'),
(5, '10', 'Jhon', 'panjaitan', 'christianpanjaitan789@gmail.com', '081272048610', 'Jl Sitorang Kecamatan Silaen Kabupaten Toba', 'sitorang', '40000', '0', NULL, 'miracle9563', '2023-06-09 09:55:12', '2023-06-07 20:20:04', '2023-06-07 20:20:04'),
(6, '10', 'Jhon', 'panjaitan', 'christianpanjaitan789@gmail.com', '081272048610', 'Jl Sitorang Kecamatan Silaen Kabupaten Toba', 'sitorang', '45000', '0', NULL, 'miracle1340', '2023-06-09 09:55:12', '2023-06-07 21:38:48', '2023-06-07 21:38:48'),
(7, '10', 'Jhon', 'panjaitan', 'christianpanjaitan789@gmail.com', '081272048610', 'Jl Sitorang Kecamatan Silaen Kabupaten Toba', 'sitorang', '15000', '0', NULL, 'miracle3400', '2023-06-09 09:55:12', '2023-06-08 19:29:45', '2023-06-08 19:29:45'),
(8, '10', 'Jhon', 'panjaitan', 'christianpanjaitan789@gmail.com', '081272048610', 'Jl Sitorang Kecamatan Silaen Kabupaten Toba', 'sitorang', '15000', '0', NULL, 'miracle4409', '2023-06-09 09:55:12', '2023-06-08 19:46:24', '2023-06-08 19:46:24'),
(9, '12', 'carlo', 'sembiring', 'carlo@gmail.com', '12345678', 'yayayaya', 'medan', '15000', '0', NULL, 'miracle4213', '2023-06-09 09:55:12', '2023-06-08 19:53:43', '2023-06-08 19:53:43'),
(10, '12', 'carlo', 'sembiring', 'carlo@gmail.com', '12345678', 'yayayaya', 'medan', '200000000', '0', NULL, 'miracle7296', '2023-06-09 09:57:22', '2023-06-08 19:57:22', '2023-06-08 19:57:22'),
(11, '10', 'Jhon', 'panjaitan', 'christianpanjaitan789@gmail.com', '081272048610', 'Jl Sitorang Kecamatan Silaen Kabupaten Toba', 'sitorang', '400000', '1', NULL, 'miracle8751', '2023-06-09 13:05:59', '2023-06-08 23:05:59', '2023-06-08 23:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2', '15000', '0', '2023-05-27 07:52:35', '2023-05-27 07:52:35'),
(2, '2', '1', '2', '15000', '0', '2023-05-29 21:52:28', '2023-05-29 21:52:28'),
(3, '3', '1', '10000', '15000', '0', '2023-05-30 06:57:37', '2023-05-30 06:57:37'),
(4, '4', '1', '1', '15000', '0', '2023-06-05 19:30:36', '2023-06-05 19:30:36'),
(5, '5', '2', '2', '20000', '0', '2023-06-07 20:20:04', '2023-06-07 20:20:04'),
(6, '6', '1', '3', '15000', '0', '2023-06-07 21:38:48', '2023-06-07 21:38:48'),
(7, '7', '1', '1', '15000', '0', '2023-06-08 19:29:45', '2023-06-08 19:29:45'),
(8, '8', '1', '1', '15000', '0', '2023-06-08 19:46:24', '2023-06-08 19:46:24'),
(9, '9', '1', '1', '15000', '0', '2023-06-08 19:53:43', '2023-06-08 19:53:43'),
(10, '10', '2', '10000', '20000', '0', '2023-06-08 19:57:22', '2023-06-08 19:57:22'),
(11, '11', '5', '8', '50000', '0', '2023-06-08 23:05:59', '2023-06-08 23:05:59');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stars_rated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `prod_id`, `stars_rated`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '1', '2023-05-30 03:01:45', '2023-05-30 03:01:45'),
(2, '10', '1', '3', '2023-06-05 19:33:45', '2023-06-07 20:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_review` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `prod_id`, `user_review`, `created_at`, `updated_at`) VALUES
(1, '2', '1', 'tes', '2023-05-30 03:01:39', '2023-05-30 03:01:39'),
(2, '10', '1', 'bagus ya', '2023-06-05 19:34:00', '2023-06-05 19:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `lname`, `phone`, `address`, `city`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Carlos Marpaung', 'calmrp1412@gmail.com', NULL, '$2y$10$LSdomp3LmYy9mAyfu1MdC.k4owO1urdFX2F5/c3RAdhP4s0U6ipOK', NULL, NULL, NULL, NULL, 1, NULL, '2023-05-01 23:52:16', '2023-05-01 23:52:16'),
(2, 'Miracle', 'poirot056@gmail.com', NULL, '$2y$10$TfJghJaw941cpUyxxYVz1.8K5ro.7vspi0.ZWz6.dq5VDvSWZlpqW', 'Caliesta', '087728455891', 'Toba', 'Porsea', 0, NULL, '2023-04-12 22:44:51', '2023-04-27 08:31:59'),
(9, 'Jelita', 'jelita@gmail.com', NULL, '$2y$10$XcRmLi4A.3gXM54QNhDQPe4PPVQ3XE2mclPJTxqAvZHaPbBWFbXuG', 'Sirait', '087728455891', 'Toba', 'Porsea', 0, NULL, '2023-05-29 21:49:56', '2023-05-29 21:52:28'),
(10, 'Jhon', 'christianpanjaitan789@gmail.com', NULL, '$2y$10$e8NFPvXl6rQkC2zD0g3yYe2yLON4AHtHxEqUA.4zlaUj6T21lBY/i', 'panjaitan', '081272048610', 'Jl Sitorang Kecamatan Silaen Kabupaten Toba', 'sitorang', 0, NULL, '2023-05-30 19:57:09', '2023-06-05 19:30:36'),
(11, 'pranata', 'christianpanjaitan789@gmail', NULL, '$2y$10$gU./2hRmqoqlD49lUtAx1e0WQqIbUlAtw.jba8qb0g52U4G8yA8le', NULL, NULL, NULL, NULL, 0, NULL, '2023-06-07 19:14:00', '2023-06-07 19:14:00'),
(12, 'carlo', 'carlo@gmail.com', NULL, '$2y$10$x8u8SZxV.VZcq3TujG5xMOSP4.SLN2ljki/cm8.REn9sayGLGbyP.', 'sembiring', '12345678', 'yayayaya', 'medan', 0, NULL, '2023-06-08 19:49:38', '2023-06-08 19:53:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
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
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
