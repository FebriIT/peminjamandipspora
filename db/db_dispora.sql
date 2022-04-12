-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2022 at 12:02 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dispora`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(10) UNSIGNED NOT NULL,
  `kodebarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namabarang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlahbarang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tglpembelian` date DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `cover` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kodebarang`, `namabarang`, `merek`, `jumlahbarang`, `tglpembelian`, `deskripsi`, `cover`, `created_at`, `updated_at`) VALUES
(21, '231231', 'dwadwawa', 'dddd', '22', '2022-03-19', 'dwadwa', 'images.png.1648727616.png', '2022-03-31 04:53:36', '2022-03-31 04:53:36'),
(22, '213123', 'fefefe', 'dwpakdapwok', '22', '2022-03-21', 'dwadwa', 'images.png.1648739108.png', '2022-03-31 08:05:08', '2022-03-31 08:05:08'),
(23, '311', 'Bola Kaki', 'Adidas', '5', '2022-04-01', 'Bola Baru', 'images.png.1648799336.png', '2022-04-01 00:48:56', '2022-04-01 00:48:56');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `sendto` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `transaksi_id`, `user_id`, `barang_id`, `sendto`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 132, 21, 1, 0, '2022-04-04 10:17:31', '2022-04-04 03:17:31'),
(2, 1, 132, 21, 132, 0, '2022-04-04 10:17:31', '2022-04-04 03:17:31'),
(3, 2, 134, 23, 1, 0, '2022-04-04 10:17:31', '2022-04-04 03:17:31'),
(4, 2, 134, 23, 134, 0, '2022-04-04 10:17:31', '2022-04-04 03:17:31'),
(5, 3, 135, 22, 1, 0, '2022-04-04 10:22:15', '2022-04-04 03:22:15'),
(6, 3, 135, 22, 135, 0, '2022-04-04 10:22:15', '2022-04-04 03:22:15');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `barang_id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `barang_id`, `tgl_pinjam`, `tgl_kembali`, `status`, `created_at`, `updated_at`) VALUES
(1, 132, 21, '2022-04-01', '2022-04-21', 'Dikembalikan', '2022-04-01 00:11:31', '2022-04-01 00:12:20'),
(2, 134, 23, '2022-04-01', '2022-04-19', 'Dikembalikan', '2022-04-01 00:49:28', '2022-04-01 00:49:37'),
(3, 135, 22, '2022-04-04', '2022-04-05', 'Dipinjam', '2022-04-04 03:22:04', '2022-04-04 03:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_anggota` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `no_anggota`, `name`, `jk`, `nohp`, `username`, `role`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Admins', 'Perempuan', '081366520353', 'admin', 'admin', 'admin@admin.com', NULL, '$2y$10$e.rRYSuR51DjSlO/DuU0Uuq8vJtJY5QdPnGG1vyLVfplbE9styoOe', '0c0139ec3530077a8342a18064de0267.jpg', NULL, '2021-10-16 23:34:06', '2022-02-27 23:14:46'),
(131, 1, 'dsadasd', 'Laki-Laki', '085266222211', 'febru', 'user', 'febri@gmail.com', NULL, '$2y$10$mVS7X/u8T6rZ/iVR2sjs9uRJDjmOxyfex4tQnNBoYGnk95XgEN5sS', NULL, NULL, '2022-03-30 07:10:56', '2022-03-30 07:10:56'),
(132, 2, 'febr', 'Perempuan', '2131231', 'adwadwa', 'user', 'wd@gmail.com', NULL, '$2y$10$jh6KxE3bcVk45/TnQXlhnOu8ddbGq.LZTsBZTiad0.rOwi6DjAZg2', NULL, NULL, '2022-03-31 08:03:52', '2022-03-31 08:03:52'),
(134, 3, 'budi', 'Laki-Laki', '085262251251', 'budi', 'user', 'budi@gmail.com', NULL, '$2y$10$sb.Tc..xoUj7ZkuiKGd7m.I5kg4f1QCK3u.lT.KVVs/eueqpreJ2O', NULL, NULL, '2022-04-01 00:48:09', '2022-04-01 00:48:09'),
(135, 4, 'user', 'Laki-Laki', '12312323112', 'user', 'user', 'user@user.com', NULL, '$2y$10$2s8tWmVCgMSJi0CipzHKaO36p48sh32fkEYsQCCwUUVp8IZ.RdQIK', NULL, NULL, '2022-04-04 03:12:09', '2022-04-04 03:12:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
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
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
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
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
