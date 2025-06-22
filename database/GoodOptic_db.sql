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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins` (bảng quản trị viên)
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone`, `address`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Quan Ly', 'Admin@gmail.com', '2025-05-23 05:02:40', 'Admin123456', '123456123456123456123456', '0909090909', 'TP.HCM', 'Active', 'Admin', NULL, NULL),
(2, 'Nhan Vien', 'Staff@gmail.com', '2025-05-23 05:02:40', 'Admin1234', '123456123456123456123456', '0909090909', 'TP.HCM', 'Active', 'Staff', NULL, NULL);

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
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `products` (`product_id`, `product_name`, `slug`, `description`, `unit`, `price`, `disscounted_price`, `images`, `category_id`, `brand_id`, `target_id`, `UV_id`, `Refractive_id`, `Material_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kính râm RB2132', 'kinh-ray-ban-rb2132', 'Kính Ray-Ban RB2132 là một trong những mẫu kính nổi tiếng của thương hiệu Ray-Ban, với thiết kế hiện đại và chất lượng cao.', 'cái', 1350000, 1200000, 'ram1.jpg', 1, 1, 1, 1, 1, 1, 'Active', NULL, NULL),
(2, 'Kính râm OO9208', 'kinh-oakley-oo9208', 'Kính Oakley OO9208 là một mẫu kính thể thao với thiết kế năng động và chất lượng vượt trội.', 'cái', 1700000, 1500000, 'ram2.jpg', 1, 2, 2, 2, 2, 1, 'Active', NULL, NULL),
(3, 'Kính râm Jim MJ429', 'kinh-maui-jim-mj429', 'Kính Maui Jim MJ429 mang đến sự kết hợp hoàn hảo giữa phong cách và bảo vệ mắt khỏi tia UV.', 'cái', 2375000, 2200000, 'ram3.jpg', 2, 3, 2, 3, 3, 2, 'Active', NULL, NULL),
(4, 'Kính râm Unisex Style', 'kinh-ram-unisex-style', 'Gọng nhẹ, tròng đổi màu theo ánh sáng.', 'cái', 1200000, 1050000, 'ram4.jpg', 1, 1, 2, 2, 1, 2, 'Active', NULL, NULL),
(5, 'Kính râm chống lóa', 'kinh-ram-chong-loa', 'Tròng phân cực, giảm chói khi lái xe.', 'cái', 1100000, 950000, 'ram5.jpg', 1, 2, 2, 1, 2, 1, 'Active', NULL, NULL),
(6, 'Kính thời trang nữ TRN1', 'kinh-thoi-trang-nu-trn1', 'Thiết kế thời trang dành cho nữ, chống tia UV.', 'cái', 1400000, 1250000, 'ram6.jpg', 1, 3, 2, 1, 3, 2, 'Active', NULL, NULL),
(7, 'Kính nam năng động KNN1', 'kinh-nam-nang-dong-knn1', 'Thích hợp cho các hoạt động ngoài trời.', 'cái', 1550000, 1380000, 'ram7.jpg', 1, 1, 2, 2, 2, 1, 'Active', NULL, NULL),
(8, 'Kính râm cao cấp Limited', 'kinh-ram-cao-cap-limited', 'Phiên bản giới hạn với thiết kế sang trọng.', 'cái', 2000000, 1850000, 'ram8.jpg', 1, 2, 2, 3, 2, 2, 'Active', NULL, NULL),
(9, 'Kính râm trẻ em TE1', 'kinh-ram-tre-em-te1', 'Kích thước nhỏ gọn, chống UV.', 'cái', 800000, 700000, 'ram9.jpg', 1, 3, 1, 1, 1, 2, 'Active', NULL, NULL),
(10, 'Kính đi biển DIB1', 'kinh-di-bien-dib1', 'Phù hợp đi du lịch, bảo vệ mắt toàn diện.', 'cái', 1250000, 1100000, 'ram10.jpg', 1, 1, 2, 2, 3, 1, 'Active', NULL, NULL),
(11, 'Kính phân cực phân giải cao', 'kinh-phan-cuc-pgh', 'Giảm chói, tăng độ rõ khi nhìn xa.', 'cái', 1300000, 1180000, 'ram11.jpg', 1, 2, 2, 1, 2, 1, 'Active', NULL, NULL),
(12, 'Kính chống bụi', 'kinh-chong-bui', 'Chống bụi và gió hiệu quả.', 'cái', 1150000, 980000, 'ram12.jpg', 1, 3, 2, 1, 1, 2, 'Active', NULL, NULL),
(13, 'Kính thời trang Hàn Quốc', 'kinh-thoi-trang-hq', 'Phong cách Hàn, phù hợp giới trẻ.', 'cái', 1250000, 1100000, 'ram13.jpg', 1, 1, 2, 2, 2, 1, 'Active', NULL, NULL),
(14, 'Kính gọng tròn retro', 'kinh-gong-tron-retro', 'Mang phong cách cổ điển.', 'cái', 1000000, 870000, 'ram14.jpg', 1, 2, 2, 3, 3, 1, 'Active', NULL, NULL),
(15, 'Kính râm chống UV', 'kinh-ram-chong-uv', 'Sử dụng khi bơi, bảo vệ mắt.', 'cái', 750000, 650000, 'ram15.jpg', 1, 3, 2, 1, 2, 2, 'Active', NULL, NULL),
(16, 'Kính râm PRO', 'kinh-ram-pro', 'Chống gió bụi và ánh sáng mạnh.', 'cái', 1450000, 1300000, 'ram16.jpg', 1, 2, 2, 3, 3, 1, 'Active', NULL, NULL),
(17, 'Kính chống loá ban đêm', 'kinh-ban-dem', 'Tăng tầm nhìn ban đêm.', 'cái', 980000, 870000, 'ram17.jpg', 1, 1, 2, 2, 1, 2, 'Active', NULL, NULL),
(18, 'Kính aviator cổ điển', 'kinh-aviator', 'Phong cách phi công, mạnh mẽ.', 'cái', 1650000, 1480000, 'ram18.jpg', 1, 2, 2, 1, 1, 1, 'Active', NULL, NULL),
(19, 'Kính cat eye nữ tính', 'kinh-cat-eye', 'Thiết kế mắt mèo dành cho nữ.', 'cái', 1380000, 1250000, 'ram19.jpg', 1, 3, 2, 2, 2, 2, 'Active', NULL, NULL),
(20, 'Kính râm unisex basic', 'kinh-unisex-basic', 'Phù hợp cho mọi đối tượng.', 'cái', 1100000, 990000, 'ram20.jpg', 1, 1, 2, 3, 3, 1, 'Active', NULL, NULL),
(21, 'Tròng kính đổi màu Xám', 'trong-kinh-xam', 'Đổi màu theo ánh sáng, chống UV.', 'cái', 650000, 590000, 'trong1.jpg', 2, 1, 2, 1, 2, 1, 'Active', NULL, NULL),
(22, 'Tròng kính chống ánh sáng xanh', 'trong-chong-anh-sang-xanh', 'Bảo vệ mắt khi dùng máy tính, điện thoại.', 'cái', 600000, 520000, 'trong2.jpg', 2, 2, 2, 2, 2, 2, 'Active', NULL, NULL),
(23, 'Tròng kính mỏng nhẹ', 'trong-mong-nhe', 'Chất liệu polycarbonate nhẹ, bền.', 'cái', 700000, 620000, 'trong3.jpg', 2, 3, 2, 1, 1, 1, 'Active', NULL, NULL),
(24, 'Tròng kính siêu mỏng 1.74', 'trong-kinh-1-74', 'Giảm độ dày tròng cho người cận nặng.', 'cái', 950000, 870000, 'trong4.jpg', 2, 1, 2, 1, 3, 2, 'Active', NULL, NULL),
(25, 'Tròng kính chống chói Crizal', 'trong-chong-choi-crizal', 'Chống loá, chống vân tay.', 'cái', 800000, 710000, 'trong5.jpg', 2, 2, 2, 2, 2, 1, 'Active', NULL, NULL),
(26, 'Tròng kính chống tia UV++', 'trong-chong-uv-plus', 'Cản tia UV đến 99.9%.', 'cái', 720000, 630000, 'trong6.jpg', 2, 3, 2, 3, 2, 2, 'Active', NULL, NULL),
(27, 'Tròng đổi màu trà', 'trong-doi-mau-tra', 'Màu trà nhẹ nhàng, đổi màu nhanh.', 'cái', 750000, 670000, 'trong7.jpg', 2, 1, 2, 2, 1, 2, 'Active', NULL, NULL),
(28, 'Tròng kính cận mỏng HMC', 'trong-can-hmc', 'Tròng có lớp phủ HMC chống nước.', 'cái', 680000, 610000, 'trong8.jpg', 2, 2, 2, 1, 2, 1, 'Active', NULL, NULL),
(29, 'Tròng kính trẻ em bền nhẹ', 'trong-tre-em-ben-nhe', 'Không vỡ, an toàn cho trẻ.', 'cái', 550000, 490000, 'trong9.jpg', 2, 3, 1, 2, 1, 2, 'Active', NULL, NULL),
(30, 'Tròng chống trầy xước', 'trong-chong-tray', 'Bề mặt siêu cứng, chống trầy.', 'cái', 780000, 690000, 'trong10.jpg', 2, 1, 2, 1, 2, 2, 'Active', NULL, NULL),
(31, 'Tròng cận vi tính', 'trong-can-vi-tinh', 'Giảm mỏi mắt khi làm việc máy tính.', 'cái', 650000, 580000, 'trong11.jpg', 2, 2, 2, 2, 2, 1, 'Active', NULL, NULL),
(32, 'Tròng viễn hai tròng', 'trong-vien-hai-trong', 'Giúp nhìn rõ gần và xa.', 'cái', 1000000, 870000, 'trong12.jpg', 2, 3, 2, 1, 3, 2, 'Active', NULL, NULL),
(33, 'Tròng chống tia xanh cao cấp', 'trong-chong-tia-xanh-cc', 'Lọc tia HEV gây hại.', 'cái', 820000, 750000, 'trong13.jpg', 2, 1, 2, 2, 3, 2, 'Active', NULL, NULL),
(34, 'Tròng kính đổi màu tự động', 'trong-doi-mau-auto', 'Tự động đổi màu nhanh và đều.', 'cái', 970000, 880000, 'trong14.jpg', 2, 2, 2, 3, 2, 2, 'Active', NULL, NULL),
(35, 'Tròng polycarbonate chống va đập', 'trong-polycarbonate', 'Siêu bền, an toàn thể thao.', 'cái', 780000, 700000, 'trong15.jpg', 2, 3, 2, 1, 1, 1, 'Active', NULL, NULL),
(36, 'Tròng mỏng chống lóa', 'trong-mong-chong-loa', 'Lớp phủ chống lóa đa lớp.', 'cái', 840000, 750000, 'trong16.jpg', 2, 1, 2, 2, 3, 2, 'Active', NULL, NULL),

(41, 'Gọng kính kim loại GO-101', 'gong-kinh-kim-loai-go-101', 'Chất liệu kim loại bền đẹp.', 'cái', 850000, 750000, 'gong1.jpg', 3, 1, 2, 1, 1, 3, 'Active', NULL, NULL),
(42, 'Gọng kính nhựa cao cấp GO-102', 'gong-kinh-nhua-go-102', 'Gọng nhẹ, nhiều màu sắc.', 'cái', 600000, 520000, 'gong2.jpg', 3, 2, 2, 2, 2, 2, 'Active', NULL, NULL),
(43, 'Gọng kính pha kim GO-103', 'gong-pha-kim-go-103', 'Sự kết hợp giữa kim loại và nhựa.', 'cái', 900000, 790000, 'gong3.jpg', 3, 3, 2, 3, 3, 3, 'Active', NULL, NULL),
(44, 'Gọng kính dẻo GO-104', 'gong-deo-go-104', 'Gọng siêu dẻo, khó gãy.', 'cái', 700000, 620000, 'gong4.jpg', 3, 1, 2, 1, 1, 2, 'Active', NULL, NULL),
(45, 'Gọng kính nữ thời trang GO-105', 'gong-nu-thoi-trang-go-105', 'Thiết kế thanh mảnh, nữ tính.', 'cái', 750000, 670000, 'gong5.jpg', 3, 2, 2, 2, 2, 3, 'Active', NULL, NULL),
(46, 'Gọng kính unisex GO-106', 'gong-unisex-go-106', 'Dễ phối đồ, hợp cả nam và nữ.', 'cái', 800000, 730000, 'gong6.jpg', 3, 3, 2, 3, 1, 1, 'Active', NULL, NULL),
(47, 'Gọng kính tròn cổ điển GO-107', 'gong-co-dien-go-107', 'Phong cách học sinh cổ điển.', 'cái', 670000, 600000, 'gong7.jpg', 3, 1, 2, 1, 3, 1, 'Active', NULL, NULL),
(48, 'Gọng kính siêu nhẹ GO-108', 'gong-sieu-nhe-go-108', 'Chất liệu siêu nhẹ, không tạo vết mũi.', 'cái', 880000, 790000, 'gong8.jpg', 3, 2, 2, 2, 2, 2, 'Active', NULL, NULL),
(49, 'Gọng kính vuông GO-109', 'gong-vuong-go-109', 'Thiết kế góc cạnh hiện đại.', 'cái', 820000, 740000, 'gong9.jpg', 3, 3, 2, 3, 3, 2, 'Active', NULL, NULL),
(50, 'Gọng kính trẻ em GO-110', 'gong-tre-em-go-110', 'Bền, nhẹ, an toàn cho trẻ.', 'cái', 500000, 450000, 'gong10.jpg', 3, 1, 2, 1, 1, 2, 'Active', NULL, NULL),
(51, 'Gọng kính không viền GO-111', 'gong-khong-vien-go-111', 'Tối giản, nhẹ nhàng.', 'cái', 930000, 850000, 'gong11.jpg', 3, 2, 2, 2, 2, 1, 'Active', NULL, NULL),
(52, 'Gọng kính titan GO-112', 'gong-titan-go-112', 'Khung titan cao cấp.', 'cái', 1100000, 990000, 'gong12.jpg', 3, 3, 2, 3, 3, 3, 'Active', NULL, NULL),
(53, 'Gọng kính basic GO-113', 'gong-basic-go-113', 'Thiết kế đơn giản, dễ đeo.', 'cái', 600000, 530000, 'gong13.jpg', 3, 1, 2, 1, 2, 1, 'Active', NULL, NULL),
(54, 'Gọng kính Nhật GO-114', 'gong-nhat-go-114', 'Sản xuất công nghệ Nhật, chuẩn chất lượng.', 'cái', 1050000, 950000, 'gong14.jpg', 3, 2, 2, 2, 3, 2, 'Active', NULL, NULL),
(55, 'Gọng kính bán gọng GO-115', 'gong-ban-gong-go-115', 'Thiết kế nửa gọng nhẹ nhàng.', 'cái', 720000, 640000, 'gong15.jpg', 3, 3, 2, 1, 2, 1, 'Active', NULL, NULL),
(56, 'Gọng kính fashion GO-116', 'gong-fashion-go-116', 'Thời trang cho giới trẻ.', 'cái', 850000, 750000, 'gong16.jpg', 3, 1, 2, 2, 2, 2, 'Active', NULL, NULL),
(57, 'Gọng kính thanh mảnh GO-117', 'gong-thanh-manh-go-117', 'Dành cho mặt nhỏ.', 'cái', 690000, 610000, 'gong17.jpg', 3, 2, 2, 1, 3, 3, 'Active', NULL, NULL),
(58, 'Gọng kính clip-on GO-118', 'gong-clip-on-go-118', 'Gọng kèm mắt kính râm từ tính.', 'cái', 980000, 870000, 'gong18.jpg', 3, 3, 2, 3, 2, 2, 'Active', NULL, NULL),
(59, 'Gọng kính siêu bền GO-119', 'gong-sieu-ben-go-119', 'Chịu lực tốt, không biến dạng.', 'cái', 870000, 790000, 'gong19.jpg', 3, 1, 2, 2, 3, 1, 'Active', NULL, NULL),
(60, 'Gọng kính classic GO-120', 'gong-classic-go-120', 'Phong cách cổ điển, lịch lãm.', 'cái', 920000, 820000, 'gong20.jpg', 3, 2, 2, 1, 1, 2, 'Active', NULL, NULL);
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