

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
-- --------------------------------------------------------------
--
-- Table structure for table `admins`
--
CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `type` enum('Admin','Staff') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Staff',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `address`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cong Thanh', 'bcthanh@gmail.com', '2023-11-23 05:02:40', '123456', '123456123456123456123456', '0909090909', 'Quảng Ngãi', 'Active', 'Admin', NULL, NULL),
(2, 'Nhan Vien', 'nv1@gmail.com', '2023-11-23 05:02:40', '123456', '123456123456123456123456', '0909090909', 'Quảng Ngãi', 'Active', 'Staff', NULL, NULL);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);