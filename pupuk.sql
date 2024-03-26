-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 12:46 PM
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
-- Database: `pupuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event` varchar(255) NOT NULL,
  `auditable_type` varchar(255) NOT NULL,
  `auditable_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` text DEFAULT NULL,
  `new_values` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(1023) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `com_codes`
--

CREATE TABLE `com_codes` (
  `code_cd` varchar(255) NOT NULL,
  `code_nm` varchar(255) NOT NULL,
  `code_group` varchar(255) NOT NULL,
  `code_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `com_codes`
--

INSERT INTO `com_codes` (`code_cd`, `code_nm`, `code_group`, `code_value`, `created_at`, `updated_at`) VALUES
('GAJI_01', 'Bulan', 'STATUS_GAJI', '', '2024-01-19 04:45:10', '2024-01-19 04:45:10'),
('GAJI_02', 'Harian', 'STATUS_GAJI', '', '2024-01-19 04:45:10', '2024-01-19 04:45:10'),
('STATUS_AGENT_01', 'Agent Tetap', 'STATUS_AGENT', '', '2024-01-19 04:45:10', '2024-01-19 04:45:10'),
('STATUS_AGENT_02', 'Agent Tidak Tetap', 'STATUS_AGENT', '', '2024-01-19 04:45:10', '2024-01-19 04:45:10'),
('STATUS_KARYAWAN_01', 'Karyawan Tetap', 'STATUS_KARYAWAN', '', '2024-01-19 04:45:10', '2024-01-19 04:45:10'),
('STATUS_KARYAWAN_02', 'Karyawan Tidak Tetap', 'STATUS_KARYAWAN', '', '2024-01-19 04:45:10', '2024-01-19 04:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_belis`
--

CREATE TABLE `detail_transaksi_belis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_beli_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `gajis`
--

CREATE TABLE `gajis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `gaji` int(11) DEFAULT NULL,
  `bonus` int(11) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hutang_agents`
--

CREATE TABLE `hutang_agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_jual_sore_id` bigint(20) UNSIGNED NOT NULL,
  `awal` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hutang_agent_details`
--

CREATE TABLE `hutang_agent_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hutang_agent_id` bigint(20) UNSIGNED NOT NULL,
  `bayar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hutang_vendors`
--

CREATE TABLE `hutang_vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_beli_id` bigint(20) UNSIGNED NOT NULL,
  `awal` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hutang_vendor_details`
--

CREATE TABLE `hutang_vendor_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hutang_vendor_id` bigint(20) UNSIGNED NOT NULL,
  `bayar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_27_074753_create_sessions_table', 1),
(7, '2023_11_27_144351_create_permission_tables', 1),
(8, '2023_11_27_162712_create_audits_table', 1),
(9, '2024_01_03_111721_create_karyawans_table', 1),
(10, '2024_01_03_121628_create_com_codes_table', 1),
(11, '2024_01_03_130355_create_settings_table', 1),
(12, '2024_01_03_154221_create_gajis_table', 1),
(13, '2024_01_04_113806_create_products_table', 1),
(14, '2024_01_04_142247_create_vendors_table', 1),
(15, '2024_01_04_142308_create_agents_table', 1),
(16, '2024_01_04_152309_create_operasionals_table', 1),
(17, '2024_01_05_074213_create_transaksi_belis_table', 1),
(18, '2024_01_05_075518_create_detail_transaksi_belis_table', 1),
(19, '2024_01_06_105730_create_transaksi_jual_pagis_table', 1),
(20, '2024_01_06_105953_create_transaksi_jual_pagi_details_table', 1),
(21, '2024_01_06_151342_create_transaksi_jual_sores_table', 1),
(22, '2024_01_06_151554_create_transaksi_jual_sore_details_table', 1),
(23, '2024_01_07_032201_create_hutang_vendors_table', 1),
(24, '2024_01_07_033542_create_hutang_vendor_details_table', 1),
(25, '2024_01_07_083544_create_hutang_agents_table', 1),
(26, '2024_01_07_083759_create_hutang_agent_details_table', 1);

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
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operasionals`
--

CREATE TABLE `operasionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
(1, 'dashboard', 'web', '2024-01-19 04:45:06', '2024-01-19 04:45:06'),
(2, 'master', 'web', '2024-01-19 04:45:06', '2024-01-19 04:45:06'),
(3, 'home', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(4, 'dataproduct', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(5, 'harga_beli', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(6, 'agent', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(7, 'vendor', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(8, 'operasional', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(9, 'beli', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(10, 'jualpagi', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(11, 'jualsore', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(12, 'datahutangvendor', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(13, 'datahutangagent', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(14, 'karyawan', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(15, 'gaji', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(16, 'laporan', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(17, 'user', 'web', '2024-01-19 04:45:07', '2024-01-19 04:45:07'),
(18, 'role', 'web', '2024-01-19 04:45:08', '2024-01-19 04:45:08'),
(19, 'permission', 'web', '2024-01-19 04:45:08', '2024-01-19 04:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT 0,
  `harga_beli` int(11) DEFAULT 0,
  `harga_jual` int(11) DEFAULT 0,
  `total` int(11) DEFAULT 0,
  `satuan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'karyawan', 'web', '2024-01-19 04:45:08', '2024-01-19 04:45:08'),
(2, 'admin', 'web', '2024-01-19 04:45:08', '2024-01-19 04:45:08');

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
(1, 2),
(2, 2),
(3, 2),
(4, 1),
(4, 2),
(5, 2),
(6, 1),
(6, 2),
(7, 2),
(8, 1),
(8, 2),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 2),
(13, 1),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ViHKzicLUAN1g8OT1Bvqyvz4oWCtaMjYM6K22TZX', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoic25FaDMyVnBzTHJjdHQyZnU4QWdFYUNuSnZGenlXV0FTNjJOZkNVMCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vbG9jYWxob3N0L3B1cHVrL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkMXhCQzExQm9wSDg4blhLZm5IRlVwdThmQUZXSS83bzNpS0k0YW9FZDZGRlJMeG55NzQuSXUiO30=', 1705664733);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `deskripsi_situs` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `slogan`, `deskripsi_situs`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, NULL, NULL, '2024-01-19 04:45:10', '2024-01-19 04:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_belis`
--

CREATE TABLE `transaksi_belis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jual_pagis`
--

CREATE TABLE `transaksi_jual_pagis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jual_pagi_details`
--

CREATE TABLE `transaksi_jual_pagi_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_jual_pagi_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jual_sores`
--

CREATE TABLE `transaksi_jual_sores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_jual_pagi_id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jual_sore_details`
--

CREATE TABLE `transaksi_jual_sore_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_jual_sore_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `qty_asal` int(11) NOT NULL,
  `qty_keluar` int(11) NOT NULL,
  `qty_sisa` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `wa` varchar(255) DEFAULT NULL,
  `wa_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `status`, `email`, `wa`, `wa_verified_at`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 'admin@app.com', '0851', '2024-01-19 04:45:09', '2024-01-19 04:45:09', '$2y$12$1xBC11BopH88nXKfnHFUpu8fAFWI/7o3iKI4aoEd6FFRLxny74.Iu', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 04:45:09', '2024-01-19 04:45:09'),
(2, 'user', 1, 'user@app.com', '08512', '2024-01-19 04:45:09', '2024-01-19 04:45:09', '$2y$12$QWwP0YEgKCJpEjyWcwRzfO2W07MSqwmNKpAAjXU2PjwfWjf1gnKGG', NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-19 04:45:09', '2024-01-19 04:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  ADD KEY `audits_user_id_user_type_index` (`user_id`,`user_type`);

--
-- Indexes for table `com_codes`
--
ALTER TABLE `com_codes`
  ADD PRIMARY KEY (`code_cd`);

--
-- Indexes for table `detail_transaksi_belis`
--
ALTER TABLE `detail_transaksi_belis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksi_belis_transaksi_beli_id_foreign` (`transaksi_beli_id`),
  ADD KEY `detail_transaksi_belis_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gajis`
--
ALTER TABLE `gajis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gajis_karyawan_id_foreign` (`karyawan_id`);

--
-- Indexes for table `hutang_agents`
--
ALTER TABLE `hutang_agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hutang_agents_agent_id_foreign` (`agent_id`),
  ADD KEY `hutang_agents_transaksi_jual_sore_id_foreign` (`transaksi_jual_sore_id`);

--
-- Indexes for table `hutang_agent_details`
--
ALTER TABLE `hutang_agent_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hutang_agent_details_hutang_agent_id_foreign` (`hutang_agent_id`);

--
-- Indexes for table `hutang_vendors`
--
ALTER TABLE `hutang_vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hutang_vendors_vendor_id_foreign` (`vendor_id`),
  ADD KEY `hutang_vendors_transaksi_beli_id_foreign` (`transaksi_beli_id`);

--
-- Indexes for table `hutang_vendor_details`
--
ALTER TABLE `hutang_vendor_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hutang_vendor_details_hutang_vendor_id_foreign` (`hutang_vendor_id`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `operasionals`
--
ALTER TABLE `operasionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_belis`
--
ALTER TABLE `transaksi_belis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_belis_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `transaksi_jual_pagis`
--
ALTER TABLE `transaksi_jual_pagis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_jual_pagis_agent_id_foreign` (`agent_id`);

--
-- Indexes for table `transaksi_jual_pagi_details`
--
ALTER TABLE `transaksi_jual_pagi_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_jual_pagi_details_transaksi_jual_pagi_id_foreign` (`transaksi_jual_pagi_id`),
  ADD KEY `transaksi_jual_pagi_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `transaksi_jual_sores`
--
ALTER TABLE `transaksi_jual_sores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_jual_sores_transaksi_jual_pagi_id_foreign` (`transaksi_jual_pagi_id`),
  ADD KEY `transaksi_jual_sores_agent_id_foreign` (`agent_id`);

--
-- Indexes for table `transaksi_jual_sore_details`
--
ALTER TABLE `transaksi_jual_sore_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_jual_sore_details_transaksi_jual_sore_id_foreign` (`transaksi_jual_sore_id`),
  ADD KEY `transaksi_jual_sore_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_transaksi_belis`
--
ALTER TABLE `detail_transaksi_belis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gajis`
--
ALTER TABLE `gajis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hutang_agents`
--
ALTER TABLE `hutang_agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hutang_agent_details`
--
ALTER TABLE `hutang_agent_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hutang_vendors`
--
ALTER TABLE `hutang_vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hutang_vendor_details`
--
ALTER TABLE `hutang_vendor_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `operasionals`
--
ALTER TABLE `operasionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi_belis`
--
ALTER TABLE `transaksi_belis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_jual_pagis`
--
ALTER TABLE `transaksi_jual_pagis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_jual_pagi_details`
--
ALTER TABLE `transaksi_jual_pagi_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_jual_sores`
--
ALTER TABLE `transaksi_jual_sores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_jual_sore_details`
--
ALTER TABLE `transaksi_jual_sore_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi_belis`
--
ALTER TABLE `detail_transaksi_belis`
  ADD CONSTRAINT `detail_transaksi_belis_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `detail_transaksi_belis_transaksi_beli_id_foreign` FOREIGN KEY (`transaksi_beli_id`) REFERENCES `transaksi_belis` (`id`);

--
-- Constraints for table `gajis`
--
ALTER TABLE `gajis`
  ADD CONSTRAINT `gajis_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`);

--
-- Constraints for table `hutang_agents`
--
ALTER TABLE `hutang_agents`
  ADD CONSTRAINT `hutang_agents_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  ADD CONSTRAINT `hutang_agents_transaksi_jual_sore_id_foreign` FOREIGN KEY (`transaksi_jual_sore_id`) REFERENCES `transaksi_jual_sores` (`id`);

--
-- Constraints for table `hutang_agent_details`
--
ALTER TABLE `hutang_agent_details`
  ADD CONSTRAINT `hutang_agent_details_hutang_agent_id_foreign` FOREIGN KEY (`hutang_agent_id`) REFERENCES `hutang_agents` (`id`);

--
-- Constraints for table `hutang_vendors`
--
ALTER TABLE `hutang_vendors`
  ADD CONSTRAINT `hutang_vendors_transaksi_beli_id_foreign` FOREIGN KEY (`transaksi_beli_id`) REFERENCES `transaksi_belis` (`id`),
  ADD CONSTRAINT `hutang_vendors_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `hutang_vendor_details`
--
ALTER TABLE `hutang_vendor_details`
  ADD CONSTRAINT `hutang_vendor_details_hutang_vendor_id_foreign` FOREIGN KEY (`hutang_vendor_id`) REFERENCES `hutang_vendors` (`id`);

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_belis`
--
ALTER TABLE `transaksi_belis`
  ADD CONSTRAINT `transaksi_belis_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

--
-- Constraints for table `transaksi_jual_pagis`
--
ALTER TABLE `transaksi_jual_pagis`
  ADD CONSTRAINT `transaksi_jual_pagis_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`);

--
-- Constraints for table `transaksi_jual_pagi_details`
--
ALTER TABLE `transaksi_jual_pagi_details`
  ADD CONSTRAINT `transaksi_jual_pagi_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transaksi_jual_pagi_details_transaksi_jual_pagi_id_foreign` FOREIGN KEY (`transaksi_jual_pagi_id`) REFERENCES `transaksi_jual_pagis` (`id`);

--
-- Constraints for table `transaksi_jual_sores`
--
ALTER TABLE `transaksi_jual_sores`
  ADD CONSTRAINT `transaksi_jual_sores_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`),
  ADD CONSTRAINT `transaksi_jual_sores_transaksi_jual_pagi_id_foreign` FOREIGN KEY (`transaksi_jual_pagi_id`) REFERENCES `transaksi_jual_pagis` (`id`);

--
-- Constraints for table `transaksi_jual_sore_details`
--
ALTER TABLE `transaksi_jual_sore_details`
  ADD CONSTRAINT `transaksi_jual_sore_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transaksi_jual_sore_details_transaksi_jual_sore_id_foreign` FOREIGN KEY (`transaksi_jual_sore_id`) REFERENCES `transaksi_jual_sores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
