-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
-- Host: localhost
-- Generation Time: May 23, 2025 at 12:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
-- --------------------------------------------------------------
--
-- Table structure for table `admins` (bảng quản trị viên)
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
-- Dumping data for table `admins` (bảng quản trị viên)
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `address`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Quan Ly', 'Admin@gmail.com', '2025-05-23 05:02:40', 'Admin123456', '123456123456123456123456', '0909090909', 'TP.HCM', 'Active', 'Admin', NULL, NULL),
(2, 'Nhan Vien', 'Staff@gmail.com', '2025-05-23 05:02:40', 'Admin123456', '123456123456123456123456', '0909090909', 'TP.HCM', 'Active', 'Staff', NULL, NULL);

--
-- Indexes for table `admins` (bảng quản trị viên)
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- --------------------------------------------------------------
--
-- Table structure for table `categories` (bảng danh mục sản phẩm)
--
CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Dumping data for table `categories` (bảng danh mục sản phẩm)
--
INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kính Râm', 'kinh-ram', 'Active', NULL, NULL),
(2, 'Tròng Kính', 'trong-kinh', 'Active', NULL, NULL),
(3, 'Kính Cận', 'kinh-can', 'Active', NULL, NULL);
--
-- Indexes for table `categories` (bảng danh mục sản phẩm)
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);
--
-- AUTO_INCREMENT for table `categories` (bảng danh mục sản phẩm)
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
-- --------------------------------------------------------------
--
-- Table structure for table `target` (bảng đối tượng)
--
CREATE TABLE `target` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `target` (bảng đối tượng)
--

INSERT INTO `target` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Trẻ em', 'tre-em', 'Active', NULL, NULL),
(2, 'Người lớn', 'nguoi-lon', 'Active', NULL, NULL);

--
-- Indexes for table `target` (bảng đối tượng)
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `target_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for table `target` (bảng đối tượng)
--
ALTER TABLE `target`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- --------------------------------------------------------

--
-- Table structure for table `UV` (bảng UV)
--
CREATE TABLE `UV` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `UV` (bảng UV)
--

INSERT INTO `UV` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'UV 400', 'UV-400', 'Active', NULL, NULL),
(2, 'UV 380', 'UV-380', 'Active', NULL, NULL),
(3, 'UV 100%', 'UV-100%', 'Active', NULL, NULL),
(4, 'UV A/B', 'UV-A/B', 'Active', NULL, NULL);

--
-- Indexes for table `UV` (bảng UV)
--
ALTER TABLE `UV`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UV_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for table `UV` (bảng UV)
--
ALTER TABLE `UV`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- --------------------------------------------------------------

--
-- Table structure for table `Material` (bảng chất liệu)
--
CREATE TABLE `Material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Material` (bảng chất liệu)
--

INSERT INTO `Material` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nhựa cứng', 'nhua-cung', 'Active', NULL, NULL),
(2, 'Nhựa dẻo', 'nhua-deo', 'Active', NULL, NULL);

--
-- Indexes for table `Material` (bảng chất liệu)
--
ALTER TABLE `Material`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Material_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for table `Material` (bảng chất liệu)
--
ALTER TABLE `Material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- --------------------------------------------------------------


--
-- Table structure for table `brands` (bảng thương hiệu)
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands` (bảng thương hiệu)
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ray-Ban', 'ray-ban', 'Active', NOW(), NOW()),
(2, 'Oakley', 'oakley', 'Active', NOW(), NOW()),
(3, 'Gucci', 'gucci', 'Inactive', NOW(), NOW()),
(4, 'Prada', 'prada', 'Active', NOW(), NOW()),
(5, 'Versace', 'versace', 'Inactive', NOW(), NOW()),
(6, 'Burberry', 'burberry', 'Active', NOW(), NOW());

--
-- Indexes for table `brands` (bảng thương hiệu)
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for table `brands` (bảng thương hiệu)
--

ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- --------------------------------------------------------------


--
-- Table structure for table `Refractive` (bảng khúc xạ)
--

CREATE TABLE `Refractive` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Refractive` (bảng khúc xạ)
--

INSERT INTO `Refractive` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cận thị', 'can-thi', 'Active', NOW(), NOW()),
(2, 'Viễn thị', 'vien-thi', 'Active', NOW(), NOW()),
(3, 'Loạn thị', 'loan-thi', 'Inactive', NOW(), NOW()),
(4, 'Lão thị', 'lao-thi', 'Active', NOW(), NOW()),
(5, 'Khúc xạ hỗn hợp', 'khuc-xa-hon-hop', 'Inactive', NOW(), NOW()),
(6, 'Mắt bình thường', 'mat-binh-thuong', 'Active', NOW(), NOW());

--
-- Indexes for table `Refractive` (bảng khúc xạ)
--
ALTER TABLE `Refractive`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Refractive_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for table `Refractive` (bảng khúc xạ)
--

ALTER TABLE `Refractive`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
-- --------------------------------------------------------------

--
-- Table structure for table `customers` (bảng khách hàng)
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers` (bảng khách hàng)
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'Nguyen Van A', 'Abc@gmail.com', '0909090909', 'TP.HCM'),
(2, 'Nguyen Van B', 'Adasd@gmail.com', '09090432429', 'TP.HCM');

--
-- Indexes for table `customers` (bảng khách hàng)
--

ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- AUTO_INCREMENT for table `customers` (bảng khách hàng)
--

ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- --------------------------------------------------------

--
-- Table structure for table `discount` (bảng giảm giá)
--

CREATE TABLE `discount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount` double NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------


--
-- Table structure for table `products` (bảng sản phẩm)
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `target_id` bigint(20) UNSIGNED NOT NULL,
  `UV_id` bigint(20) UNSIGNED NOT NULL,
  `Refractive_id` bigint(20) UNSIGNED NOT NULL,
  `Material_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products` (bảng sản phẩm)
--

--
-- Indexes for table `products` (bảng sản phẩm)
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_target_id_foreign` (`target_id`),
  ADD KEY `products_UV_id_foreign` (`UV_id`);
--
-- AUTO_INCREMENT for table `products` (bảng sản phẩm)
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for table `products` (bảng sản phẩm)
--

ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_target_id_foreign` FOREIGN KEY (`target_id`) REFERENCES `target` (`id`),
  ADD CONSTRAINT `products_UV_id_foreign` FOREIGN KEY (`UV_id`) REFERENCES `UV` (`id`);


--
-- Table structure for table `orders` (bảng đơn hàng)
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customers_id` bigint(20) UNSIGNED DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Processing','Confirmed','Shipping','Delivered','Cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders` (bảng đơn hàng)
--

--
-- Indexes for table `orders` (bảng đơn hàng)
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`customers_id`);

--
-- AUTO_INCREMENT for table `orders` (bảng đơn hàng)
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

-- --------------------------------------------------------

--
-- Table structure for table `orders_details` (bảng chi tiết đơn hàng)
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `qty` tinyint(4) NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details` (bảng chi tiết đơn hàng)
--

--
-- Indexes for table `order_details` (bảng chi tiết đơn hàng)
--

ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for table `order_details` (bảng chi tiết đơn hàng)
--

ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for table `order_details` (bảng chi tiết đơn hàng)
--

ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

-- -------------------------------------------------------
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;