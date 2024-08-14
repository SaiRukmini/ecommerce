-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 08:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(12, 7, 2, '2024-08-13 07:43:39', '2024-08-13 07:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Men', '2024-08-09 05:09:35', '2024-08-09 05:09:35'),
(2, 'Women', '2024-08-09 05:10:14', '2024-08-09 05:10:14'),
(3, 'Books', '2024-08-09 06:49:17', '2024-08-09 06:49:17'),
(4, 'Footwear', '2024-08-09 06:49:34', '2024-08-12 00:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rec_address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'in progress',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'cash on delivery',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `rec_address`, `phone`, `status`, `user_id`, `product_id`, `payment_status`, `created_at`, `updated_at`) VALUES
(4, 'user', 'India', '123456', 'Delivered', 1, 3, 'cash on delivery', '2024-08-13 02:07:48', '2024-08-13 03:01:56'),
(5, 'user', 'India', '123456', 'On the way', 1, 9, 'cash on delivery', '2024-08-13 02:07:48', '2024-08-13 03:05:33'),
(6, 'Romeo', 'Germany', '2325436546757', 'in progress', 3, 2, 'cash on delivery', '2024-08-13 02:11:35', '2024-08-13 02:11:35'),
(7, 'Romeo', 'Germany', '2325436546757', 'in progress', 3, 3, 'cash on delivery', '2024-08-13 02:11:35', '2024-08-13 02:11:35'),
(8, 'user', 'India', '123456', 'in progress', 1, 2, 'cash on delivery', '2024-08-13 05:11:58', '2024-08-13 05:11:58'),
(9, 'user', 'India', '123456', 'in progress', 1, 3, 'cash on delivery', '2024-08-13 05:37:25', '2024-08-13 05:37:25'),
(10, 'Shitzu', 'India', '123456', 'in progress', 7, 7, 'cash on delivery', '2024-08-13 07:15:48', '2024-08-13 07:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `category`, `quantity`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'White tshirt', 'White shirt is good looking.You have to wear it', '1723459282.jpg', '545', 'Men', '12', 'shirt', '2024-08-12 02:00:08', '2024-08-13 23:41:53'),
(3, 'Novel', 'Read books and improve knowledge', '1723449160.jpg', '432', 'Books', '6', 'book', '2024-08-12 02:22:40', '2024-08-12 05:14:53'),
(7, 'Nike shoes', 'rgvcvgbhbnjmk,l,mkmjhnh', '1723449291.jpg', '1000', 'Footwear', '12', 'shoe', '2024-08-12 02:24:51', '2024-08-12 02:24:51'),
(8, 'Sandals', 'efcrg6th6yt nyjumjn  jmkkiukluimk', '1723449322.jpg', '800', 'Footwear', '9', 'footwear', '2024-08-12 02:25:22', '2024-08-12 02:25:22'),
(9, 'Footwear', 'uqwertyuiopasdfghjkl; zxcvbnm', '1723449352.jpg', '500', 'Footwear', '6', 'footwear', '2024-08-12 02:25:52', '2024-08-12 02:25:52'),
(11, 'My test product', 'dygjcfbjefvwhcf ge wfycew gyfgrvqfwg', '1723613040.png', '22', 'Men', '11', 'my-test-product', '2024-08-13 23:54:00', '2024-08-13 23:54:00'),
(12, 'pweuriejf', 'hfvnclsdjvhbdnkvfhsdfljvkhsfkhbh jhfjkb', '1723613222.png', '43', 'Women', '21', 'pweuriejf', '2024-08-13 23:57:02', '2024-08-13 23:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', 'user', '123456', 'India', NULL, '$2y$12$C2R.NFczVGU58gsHlpR8me/pzbdkXeRQ60aG7aKx.CJCsywuXUqyi', NULL, '2024-08-09 00:57:13', '2024-08-09 00:57:13'),
(2, 'admin', 'admin@gmail.com', 'admin', '4534234235', 'USA', NULL, '$2y$12$f.pFOy1YWF755O9oRx0gue51jDdWm8anzidmE/RToCZqJrz2aJCLa', NULL, '2024-08-09 00:58:15', '2024-08-09 00:58:15'),
(3, 'lia', 'lia@gmail.com', 'user', '2325436546757', 'Germany', NULL, '$2y$12$Vspu1DH.ljyLiExwAg4aAedsguTQFYQpKL4j4TL7x6ZPQ2nLbGiTO', NULL, '2024-08-12 06:59:52', '2024-08-12 06:59:52'),
(7, 'Shitzu', 'experimentwork11@gmail.com', 'user', '123456', 'India', '2024-08-13 06:58:35', '$2y$12$3SMWwHxBTofRWmkDpd4Rw.wdV2KXSPLxz86qnW.L7vEjtmKTq8s8q', NULL, '2024-08-13 06:58:21', '2024-08-13 06:58:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
