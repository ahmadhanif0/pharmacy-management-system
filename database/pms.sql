-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2025 at 11:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Medicine', '2025-04-17 01:40:28', '2025-04-17 01:40:28'),
(2, 'Herbal', '2025-04-17 01:40:47', '2025-04-17 01:40:47'),
(3, 'Controlled Drugs', '2025-04-29 01:20:31', '2025-04-29 01:20:31');

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
(35, '2014_10_00_000000_create_settings_table', 1),
(36, '2014_10_00_000001_add_group_column_on_settings_table', 1),
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(39, '2019_08_19_000000_create_failed_jobs_table', 1),
(40, '2021_06_11_190256_create_categories_table', 1),
(41, '2021_06_12_145702_create_suppliers_table', 1),
(42, '2021_06_13_153320_create_purchases_table', 1),
(43, '2021_06_14_092817_add_avatar_to_users_table', 1),
(44, '2021_06_14_112444_create_notifications_table', 1),
(45, '2021_06_15_013016_create_products_table', 1),
(46, '2021_06_15_022108_create_sales_table', 1),
(47, '2021_06_15_022848_give_discount_default_value_in_products_table', 1),
(48, '2021_06_15_024351_make_discount_decimal', 1),
(49, '2021_06_15_125136_add_total_price_and_purchase_id_to_sales_table', 1),
(50, '2021_06_15_141725_create_permission_tables', 1),
(51, '2021_06_25_190936_change_product_price_data_typ', 1),
(52, '2021_06_25_191107_change_purchase_price_data_typ', 1),
(53, '2021_07_26_143623_change_purchase_name', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0446aedd-f5a5-4d0c-a062-4cb4f8273f5d', 'App\\Notifications\\StockAlert', 'App\\Models\\User', 2, '{\"product_name\":\"Risek 40\",\"quantity\":\"0\",\"image\":null}', '2025-04-29 01:34:55', '2025-04-29 01:34:02', '2025-04-29 01:34:55'),
('97670b4e-647c-4e93-b3d0-4c7299080938', 'App\\Notifications\\StockAlert', 'App\\Models\\User', 3, '{\"product_name\":\"Risek 40\",\"quantity\":\"0\",\"image\":null}', NULL, '2025-04-29 01:34:02', '2025-04-29 01:34:02'),
('bd487b4e-01b1-4461-a881-35fb9d963cab', 'App\\Notifications\\StockAlert', 'App\\Models\\User', 1, '{\"product_name\":\"Risek 40\",\"quantity\":\"0\",\"image\":null}', NULL, '2025-04-29 01:33:58', '2025-04-29 01:33:58');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view-sales', 'web', '2025-04-17 01:27:47', '2025-04-17 01:27:47'),
(2, 'create-sales', 'web', '2025-04-17 01:27:47', '2025-04-17 01:27:47'),
(3, 'destroy-sale', 'web', '2025-04-17 01:27:48', '2025-04-17 01:27:48'),
(4, 'update-sales', 'web', '2025-04-17 01:27:48', '2025-04-17 01:27:48'),
(5, 'view-reports', 'web', '2025-04-17 01:27:48', '2025-04-17 01:27:48'),
(6, 'view-category', 'web', '2025-04-17 01:27:48', '2025-04-17 01:27:48'),
(7, 'create-category', 'web', '2025-04-17 01:27:48', '2025-04-17 01:27:48'),
(8, 'destroy-category', 'web', '2025-04-17 01:27:48', '2025-04-17 01:27:48'),
(9, 'update-category', 'web', '2025-04-17 01:27:48', '2025-04-17 01:27:48'),
(10, 'view-products', 'web', '2025-04-17 01:27:48', '2025-04-17 01:27:48'),
(11, 'create-product', 'web', '2025-04-17 01:27:49', '2025-04-17 01:27:49'),
(12, 'update-product', 'web', '2025-04-17 01:27:49', '2025-04-17 01:27:49'),
(13, 'destroy-product', 'web', '2025-04-17 01:27:49', '2025-04-17 01:27:49'),
(14, 'view-purchase', 'web', '2025-04-17 01:27:49', '2025-04-17 01:27:49'),
(15, 'create-purchase', 'web', '2025-04-17 01:27:49', '2025-04-17 01:27:49'),
(16, 'update-purchase', 'web', '2025-04-17 01:27:49', '2025-04-17 01:27:49'),
(17, 'destroy-purchase', 'web', '2025-04-17 01:27:49', '2025-04-17 01:27:49'),
(18, 'view-supplier', 'web', '2025-04-17 01:27:49', '2025-04-17 01:27:49'),
(19, 'create-supplier', 'web', '2025-04-17 01:27:49', '2025-04-17 01:27:49'),
(20, 'update-supplier', 'web', '2025-04-17 01:27:50', '2025-04-17 01:27:50'),
(21, 'destroy-supplier', 'web', '2025-04-17 01:27:50', '2025-04-17 01:27:50'),
(22, 'view-users', 'web', '2025-04-17 01:27:50', '2025-04-17 01:27:50'),
(23, 'create-user', 'web', '2025-04-17 01:27:50', '2025-04-17 01:27:50'),
(24, 'update-user', 'web', '2025-04-17 01:27:50', '2025-04-17 01:27:50'),
(25, 'destroy-user', 'web', '2025-04-17 01:27:50', '2025-04-17 01:27:50'),
(26, 'view-access-control', 'web', '2025-04-17 01:27:51', '2025-04-17 01:27:51'),
(27, 'view-role', 'web', '2025-04-17 01:27:51', '2025-04-17 01:27:51'),
(28, 'update-role', 'web', '2025-04-17 01:27:51', '2025-04-17 01:27:51'),
(29, 'destroy-role', 'web', '2025-04-17 01:27:51', '2025-04-17 01:27:51'),
(30, 'create-role', 'web', '2025-04-17 01:27:52', '2025-04-17 01:27:52'),
(31, 'view-permission', 'web', '2025-04-17 01:27:52', '2025-04-17 01:27:52'),
(32, 'create-permission', 'web', '2025-04-17 01:27:52', '2025-04-17 01:27:52'),
(33, 'update-permission', 'web', '2025-04-17 01:27:52', '2025-04-17 01:27:52'),
(34, 'destroy-permission', 'web', '2025-04-17 01:27:52', '2025-04-17 01:27:52'),
(35, 'view-expired-products', 'web', '2025-04-17 01:27:52', '2025-04-17 01:27:52'),
(36, 'view-outstock-products', 'web', '2025-04-17 01:27:52', '2025-04-17 01:27:52'),
(37, 'backup-app', 'web', '2025-04-17 01:27:52', '2025-04-17 01:27:52'),
(38, 'backup-db', 'web', '2025-04-17 01:27:52', '2025-04-17 01:27:52'),
(39, 'view-settings', 'web', '2025-04-17 01:27:53', '2025-04-17 01:27:53'),
(40, 'Fugiat cupidatat do', 'web', '2025-04-29 00:56:09', '2025-04-29 00:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(15,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `discount` decimal(15,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `purchase_id`, `price`, `discount`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 295.25, 10.00, 'Thanks', NULL, '2025-04-17 01:47:51', '2025-04-22 10:18:29'),
(2, 1, 269.50, 30.00, 'Sample Pieces', NULL, '2025-04-21 03:00:40', '2025-04-22 10:20:49'),
(3, 2, 58.00, 0.00, 'Dolor distinctio Id', NULL, '2025-04-22 10:19:18', '2025-04-22 10:19:18'),
(4, 2, 212.00, 0.00, 'Eum dolor minus laud', NULL, '2025-04-22 10:19:57', '2025-04-22 10:19:57'),
(5, 4, 570.00, 5.00, 'Cac Plus 1000', NULL, '2025-04-23 02:02:08', '2025-04-23 02:02:08'),
(6, 6, 291.00, 3.00, 'Darvin from Ahmad Bhatti', NULL, '2025-04-29 01:28:48', '2025-04-29 01:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(15,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `quantity` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `name`, `category_id`, `supplier_id`, `price`, `quantity`, `expiry_date`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Panadol Extra', 1, 1, 325.00, '10', '2025-04-23', NULL, NULL, '2025-04-17 01:46:29', '2025-04-22 14:08:39'),
(2, 'Risek 40', 1, 1, 250.00, '0', '2023-09-09', NULL, NULL, '2025-04-21 03:02:25', '2025-04-22 02:49:20'),
(3, 'Sharon England', 1, 3, 395.00, '281', '2026-10-22', NULL, NULL, '2025-04-22 00:44:52', '2025-04-22 14:03:05'),
(4, 'Cac Plus', 1, 4, 550.00, '76', '2026-06-01', NULL, NULL, '2025-04-23 02:00:28', '2025-04-23 02:09:00'),
(5, 'Sharbat Folaad', 2, 4, 290.00, '50', '2026-09-01', NULL, NULL, '2025-04-23 02:07:51', '2025-04-23 02:07:51'),
(6, 'Darvin', 3, 5, 250.00, '0', '2026-12-24', '1745908076.jpg', NULL, '2025-04-29 01:27:56', '2025-04-29 01:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'sales-person', 'web', '2025-04-17 01:27:53', '2025-04-17 01:27:53'),
(2, 'super-admin', 'web', '2025-04-17 01:27:55', '2025-04-17 01:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `quantity`, `total_price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4500, '2025-04-17 06:29:21', '2025-04-17 01:54:22', '2025-04-17 06:29:21'),
(2, 1, 2, 810, NULL, '2025-04-17 06:28:48', '2025-04-17 06:28:48'),
(3, 1, 2, 810, NULL, '2025-04-21 03:03:49', '2025-04-21 03:03:49'),
(4, 2, 1, 385, NULL, '2025-04-22 01:57:51', '2025-04-22 01:57:51'),
(5, 2, 1, 269.5, NULL, '2025-04-22 14:08:39', '2025-04-22 14:08:39'),
(6, 5, 12, 6840, NULL, '2025-04-23 02:03:23', '2025-04-23 02:03:23'),
(7, 5, 12, 6840, NULL, '2025-04-23 02:09:00', '2025-04-23 02:09:00'),
(8, 6, 12, 3492, NULL, '2025-04-29 01:32:16', '2025-04-29 01:32:16'),
(9, 6, 28, 8148, NULL, '2025-04-29 01:34:28', '2025-04-29 01:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `val` text DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'default',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `val`, `group`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'Heal Ledger', 'default', '2025-04-17 06:30:35', '2025-04-22 10:15:20'),
(2, 'app_currency', 'Rs', 'default', '2025-04-17 06:30:35', '2025-04-17 06:30:35'),
(3, 'from_email', 'muneeb@gmail.com', 'default', '2025-04-17 06:30:35', '2025-04-22 10:13:29'),
(4, 'from_name', 'Muneeb', 'default', '2025-04-17 06:30:36', '2025-04-22 10:13:29'),
(5, 'favicon', NULL, 'default', '2025-04-21 03:34:30', '2025-04-21 03:55:02'),
(6, 'logo', NULL, 'default', '2025-04-21 03:54:44', '2025-04-21 03:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `company` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `company`, `address`, `product`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Muneeb', 'muneeb@sons.com.pk', '03147383282', 'Muneeb & Sons Co.', 'Multan', 'Panadol', 'Nothing', NULL, '2025-04-17 01:43:11', '2025-04-17 01:43:11'),
(2, 'Sopoline Vaughn', 'mufugezo@mailinator.com', '03128393838', 'Dean Mullins Trading', 'Ut sit ipsum laudan', 'Non eius nemo pariat', 'At aspernatur ab vol', NULL, '2025-04-17 01:44:04', '2025-04-17 01:44:04'),
(3, 'Hyacinth Hays', 'tuhah@mailinator.com', '03147383282', 'Robertson Moran Co', 'Perferendis id totam', 'Sequi minim totam ap', 'Sapiente laudantium', NULL, '2025-04-21 02:59:13', '2025-04-21 02:59:13'),
(4, 'Haider Corporation', 'haider12@gmail.com', '03034356777', 'GSK Co.', 'Factory Area #23, Multan', 'Cac Plus', NULL, NULL, '2025-04-23 01:58:56', '2025-04-23 01:58:56'),
(5, 'Ahmad Bhatti', 'ahmad@fgmail.com', '+92504042232', 'Philip And Muler', 'keewffweffefefeef Multan', 'Darvin', 'This is controlled drug used for specific results.', NULL, '2025-04-29 01:23:10', '2025-04-29 01:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muneeb', 'muneeb@gmail.com', NULL, '$2y$10$FwgA7sDVAxRnk/x9I8SAqOb2sr86T.l/thMl9UhSLc768TRKHAPb.', '1745310487.png', NULL, '2025-04-17 01:28:02', '2025-04-22 03:28:07'),
(2, 'Ahmad', 'ahmad@gmail.com', NULL, '$2y$10$vyZNQnri8dTpTHraHsoL3.zT2mEoUd53HbrAlVuq6T8klD2nBKwVm', '1745311645.png', NULL, '2025-04-17 01:36:56', '2025-04-22 03:47:25'),
(3, 'Ali', 'ali@gmail.com', NULL, '$2y$10$haWAwT7BBaoCUOJUiGTFw.EUVWFR7yzBlKwolo7l7E6C6qSiR63Su', '1745354729.png', NULL, '2025-04-22 15:44:23', '2025-04-22 15:45:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchases_name_unique` (`name`),
  ADD KEY `purchases_category_id_foreign` (`category_id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_name_unique` (`name`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
