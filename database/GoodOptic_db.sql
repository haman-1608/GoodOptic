-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- Host: localhost
-- Generation Time: May 23, 2025 at 12:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Dumping data for table `categories` (bảng danh mục sản phẩm)
--
INSERT INTO `categories` (`category_id`, `category_name`, `slug`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Kính Râm', 'kinh-ram', 'Active', NULL, NULL),
(2, 'Tròng Kính', 'trong-kinh', 'Active', NULL, NULL),
(3, 'Kính Cận', 'kinh-can', 'Active', NULL, NULL);
--
-- Indexes for table `categories` (bảng danh mục sản phẩm)
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);
--
-- AUTO_INCREMENT for table `categories` (bảng danh mục sản phẩm)
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
-- --------------------------------------------------------------
--
-- Table structure for table `target` (bảng đối tượng)
--
CREATE TABLE `targets` (
  `target_id` bigint(20) UNSIGNED NOT NULL,
  `target_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `target` (bảng đối tượng)
--

INSERT INTO `targets` (`target_id`, `target_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Trẻ em', 'tre-em', 'Active', NULL, NULL),
(2, 'Người lớn', 'nguoi-lon', 'Active', NULL, NULL);

--
-- Indexes for table `target` (bảng đối tượng)
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`target_id`),
  ADD UNIQUE KEY `target_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for table `target` (bảng đối tượng)
--
ALTER TABLE `targets`
  MODIFY `target_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- --------------------------------------------------------

--
-- Table structure for table `UV` (bảng UV)
--
CREATE TABLE `UV` (
  `uv_id` bigint(20) UNSIGNED NOT NULL,
  `uv_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `UV` (bảng UV)
--

INSERT INTO `UV` (`uv_id`, `uv_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'UV 400', 'uv-400', 'Active', NULL, NULL),
(2, 'UV 380', 'uv-380', 'Active', NULL, NULL),
(3, 'UV 100%', 'uv-100%', 'Active', NULL, NULL),
(4, 'UV A/B', 'uv-a-b', 'Active', NULL, NULL);

--
-- Indexes for table `UV` (bảng UV)
--
ALTER TABLE `UV`
  ADD PRIMARY KEY (`uv_id`),
  ADD UNIQUE KEY `UV_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for table `UV` (bảng UV)
--
ALTER TABLE `UV`
  MODIFY `uv_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- --------------------------------------------------------------

--
-- Table structure for table `Material` (bảng chất liệu)
--
CREATE TABLE `Material` (
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `material_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Material` (bảng chất liệu)
--

INSERT INTO `Material` (`material_id`, `material_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nhựa cứng', 'nhua-cung', 'Active', NULL, NULL),
(2, 'Nhựa dẻo', 'nhua-deo', 'Active', NULL, NULL),
(3, 'Kim loại', 'kim-loai', 'Active', NULL, NULL);
--
-- Indexes for table `Material` (bảng chất liệu)
--
ALTER TABLE `Material`
  ADD PRIMARY KEY (`material_id`),
  ADD UNIQUE KEY `Material_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for table `Material` (bảng chất liệu)
--
ALTER TABLE `Material`
  MODIFY `material_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- --------------------------------------------------------------


--
-- Table structure for table `brands` (bảng thương hiệu)
--

CREATE TABLE `brands` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands` (bảng thương hiệu)
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
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
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for table `brands` (bảng thương hiệu)
--

ALTER TABLE `brands`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- --------------------------------------------------------------


--
-- Table structure for table `Refractive` (bảng khúc xạ)
--

CREATE TABLE `Refractive` (
  `refractive_id` bigint(20) UNSIGNED NOT NULL,
  `refractive_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Refractive` (bảng khúc xạ)
--

INSERT INTO `Refractive` (`refractive_id`, `refractive_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
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
  ADD PRIMARY KEY (`refractive_id`),
  ADD UNIQUE KEY `Refractive_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for table `Refractive` (bảng khúc xạ)
--

ALTER TABLE `Refractive`
  MODIFY `refractive_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
-- --------------------------------------------------------------

--
-- Table structure for table `customers` (bảng khách hàng)
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers` (bảng khách hàng)
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `email`, `phone`, `address`) VALUES
(1, 'Nguyen Van A', 'Abc@gmail.com', '0909090909', 'TP.HCM'),
(2, 'Nguyen Van B', 'Adasd@gmail.com', '09090432429', 'TP.HCM'),
(3, 'Nguyen Van C', 'Asza@gmail.com', '0123123123', 'TP.HCM');

--
-- Indexes for table `customers` (bảng khách hàng)
--

ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- AUTO_INCREMENT for table `customers` (bảng khách hàng)
--

ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- --------------------------------------------------------
--
-- Table structure for table `products` (bảng sản phẩm)
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `disscounted_price` double NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `target_id` bigint(20) UNSIGNED NOT NULL,
  `UV_id` bigint(20) UNSIGNED NOT NULL,
  `Refractive_id` bigint(20) UNSIGNED NOT NULL,
  `Material_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products` (bảng sản phẩm)
--
INSERT INTO `products` (`product_id`, `product_name`, `slug`, `desc`, `unit`, `price`, `disscounted_price`, `images`, `category_id`, `brand_id`, `target_id`, `UV_id`, `Refractive_id`, `Material_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kính Ray-Ban RB2132', 'kinh-ray-ban-rb2132', 'Kính Ray-Ban RB2132 là một trong những mẫu kính nổi tiếng của thương hiệu Ray-Ban, với thiết kế hiện đại và chất lượng cao.', 'cái', 1350000, 1200000, '../../../gongKinhKimLoaiChongUVPradaUnisex.webp', 1, 1, 1, 1, 1, 1, 'Active', NULL, NULL),
(2, 'Kính Oakley OO9208', 'kinh-oakley-oo9208', 'Kính Oakley OO9208 là một mẫu kính thể thao với thiết kế năng động và chất lượng vượt trội.', 'cái', 1700000, 1500000, '["image3.jpg","image4.jpg"]', 1, 2, 2, 2, 2, 1, 'Active', NULL, NULL),
(3, 'Kính Maui Jim MJ429', 'kinh-maui-jim-mj429', 'Kính Maui Jim MJ429 mang đến sự kết hợp hoàn hảo giữa phong cách và bảo vệ mắt khỏi tia UV.', 'cái', 2375000, 2200000, '["image5.jpg","image6.jpg"]', 2, 3, 1, 3, 3, 2, 'Active', NULL, NULL);
--
-- Indexes for table `products` (bảng sản phẩm)
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_target_id_foreign` (`target_id`),
  ADD KEY `products_UV_id_foreign` (`UV_id`);
--
-- AUTO_INCREMENT for table `products` (bảng sản phẩm)
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for table `products` (bảng sản phẩm)
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_target_id_foreign` FOREIGN KEY (`target_id`) REFERENCES `targets` (`target_id`),
  ADD CONSTRAINT `products_UV_id_foreign` FOREIGN KEY (`UV_id`) REFERENCES `UV` (`uv_id`),
  ADD CONSTRAINT `products_Refractive_id_foreign` FOREIGN KEY (`Refractive_id`) REFERENCES `Refractive` (`refractive_id`),
  ADD CONSTRAINT `products_Material_id_foreign` FOREIGN KEY (`Material_id`) REFERENCES `Material` (`material_id`),
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
-- --------------------------------------------------------

--
-- Table structure for table `orders` (bảng đơn hàng)
-- 

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders` (bảng đơn hàng)
--
INSERT INTO `orders` (`order_id`, `customer_id`, `customer_name`, `address`, `phone`, `email`,`pay_method`, `pay_status`,`order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nguyen Van A', 'TP.HCM', '0909090909', 'Abc@gmail.com', 'Chuyển khoản', 0, 0, '2025-05-23 05:02:40', NOW()),
(2, 2, 'Nguyen Van B', 'TP.HCM', '09090432429', 'Adasd@gmail.com', 'Tiền mặt', 1, 0, '2025-05-23 05:02:40', NOW()),
(3, 3, 'Nguyen Van C', 'TP.HCM', '0123123123', 'Asza@gmail.com', 'Chuyển khoản', 0, 1, '2025-05-23 05:02:40', NOW());
--
-- Indexes for table `orders` (bảng đơn hàng)
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);
--
-- AUTO_INCREMENT for table `orders` (bảng đơn hàng)
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for table `orders` (bảng đơn hàng)

ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);
-- --------------------------------------------------------

--
-- Table structure for table `orders_details` (bảng chi tiết đơn hàng)
--
CREATE TABLE `order_details` (
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `total` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details` (bảng chi tiết đơn hàng)
--
INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1350000, 2, 2700000, NULL, NULL),
(2, 1, 2, 1700000, 1, 1700000, NULL, NULL),
(3, 2, 3, 2375000, 1, 2375000, NULL, NULL),
(4, 3, 1, 1350000, 1, 1350000, NULL, NULL);

--
-- Indexes for table `order_details` (bảng chi tiết đơn hàng)
--

ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for table `order_details` (bảng chi tiết đơn hàng)
--

ALTER TABLE `order_details`
  MODIFY `order_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for table `order_details` (bảng chi tiết đơn hàng)
--

ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

-- --------------------------------------------------------
--
-- Table structure for table `cart` (bảng giỏ hàng)
--
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Indexes for table `cart`--
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_customer_id_foreign` (`customer_id`);
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);
-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;