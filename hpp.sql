-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2018 at 10:22 PM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 5.6.36-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_bahanbaku` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id`, `kode_bahanbaku`, `nama`, `satuan`, `created_at`, `updated_at`) VALUES
(3, 'BB07071800002', 'Wortel', 'Kg', '2018-07-06 20:10:04', '2018-07-06 20:11:06'),
(4, 'BB07071800003', 'Garam', 'Kg', '2018-07-07 02:38:09', '2018-07-07 02:38:09'),
(5, 'BB07071800004', 'Gula', 'Kg', '2018-07-07 02:38:21', '2018-07-07 02:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `bop`
--

CREATE TABLE `bop` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_bop` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bop` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bop`
--

INSERT INTO `bop` (`id`, `kode_bop`, `bop`, `created_at`, `updated_at`) VALUES
(2, 'BOP07071800001', 'Gas', '2018-07-06 20:19:22', '2018-07-06 20:19:22'),
(3, 'BOP07071800002', 'Listrik', '2018-07-06 20:19:28', '2018-07-06 20:19:28'),
(4, 'BOP07071800003', 'Air', '2018-07-06 20:19:42', '2018-07-06 20:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `btkl`
--

CREATE TABLE `btkl` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_btkl` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btkl` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `btkl`
--

INSERT INTO `btkl` (`id`, `kode_btkl`, `btkl`, `created_at`, `updated_at`) VALUES
(4, 'BTKL07071800001', 'Upah Buruh', '2018-07-07 02:47:38', '2018-07-07 02:47:38'),
(5, 'BTKL08071880001', 'Upah Supir', '2018-07-07 17:36:20', '2018-07-07 17:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_bahan`
--

CREATE TABLE `detail_transaksi_bahan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_bahan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaksi_bahan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi_bahan`
--

INSERT INTO `detail_transaksi_bahan` (`id`, `nama_bahan`, `satuan`, `harga`, `jumlah`, `total`, `transaksi_bahan_id`, `created_at`, `updated_at`) VALUES
(7, 'Wortel', 'Kg', '20000', '5', '100000', 4, NULL, NULL),
(8, 'Garam', 'Kg', '20000', '2', '40000', 4, NULL, NULL),
(9, 'Wortel', 'Kg', '20000', '3', '60000', 5, NULL, NULL),
(10, 'Gula', 'Kg', '20000', '2', '40000', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_bktl`
--

CREATE TABLE `detail_transaksi_bktl` (
  `id` int(10) UNSIGNED NOT NULL,
  `bktl` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaksi_bktl_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi_bktl`
--

INSERT INTO `detail_transaksi_bktl` (`id`, `bktl`, `harga`, `orang`, `total`, `transaksi_bktl_id`, `created_at`, `updated_at`) VALUES
(6, 'Upah Buruh', '200000', '6', '1200000', 5, NULL, NULL),
(7, 'Upah Buruh', '400000', '2', '800000', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_bop`
--

CREATE TABLE `detail_transaksi_bop` (
  `id` int(10) UNSIGNED NOT NULL,
  `bop` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaksi_bop_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi_bop`
--

INSERT INTO `detail_transaksi_bop` (`id`, `bop`, `harga`, `jumlah`, `total`, `transaksi_bop_id`, `created_at`, `updated_at`) VALUES
(5, 'Gas', '15000', '6', '90000', 3, NULL, NULL),
(6, 'Listrik', '200000', '1', '200000', 3, NULL, NULL),
(7, 'Listrik', '20000', '4', '80000', 4, NULL, NULL),
(8, 'Gas', '20000', '2', '40000', 4, NULL, NULL);

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
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_07_07_011205_create_table_bahan_baku2', 2),
(6, '2018_07_07_011330_create_table_bahan_btkl', 2),
(7, '2018_07_07_011407_create_table_bahan_bop', 2),
(8, '2018_07_07_042249_create_table_produksi', 3),
(9, '2018_07_07_050949_create_table_transaksi_baku', 4),
(10, '2018_07_07_051107_create_table_detail_transaksi_bahan', 4),
(11, '2018_07_07_053025_create_table_temp_detail_transaksi_bahan', 5),
(12, '2018_07_08_004515_create_table_transaksi_bktl', 6),
(13, '2018_07_08_004545_create_table_detail_transaksi_bktl', 6),
(14, '2018_07_08_004607_create_table_temp_detail_transaksi_bktl', 6),
(18, '2018_07_08_033754_create_table_transaksi_bop', 7),
(19, '2018_07_08_033815_create_table_detail_transaksi_bop', 7),
(20, '2018_07_08_033846_create_table_temp_detail_transaksi_bop', 7);

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
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_produksi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produksi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id`, `kode_produksi`, `nama_produksi`, `created_at`, `updated_at`) VALUES
(4, 'PRO08071800001', 'Produksi Dodol Wortel', '2018-07-07 21:13:55', '2018-07-07 21:13:55'),
(5, 'PRO16071800002', 'Produksi Dodol Coklat', '2018-07-16 05:19:37', '2018-07-16 05:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `temp_detail_transaksi_bahan`
--

CREATE TABLE `temp_detail_transaksi_bahan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_bahan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_detail_transaksi_bktl`
--

CREATE TABLE `temp_detail_transaksi_bktl` (
  `id` int(10) UNSIGNED NOT NULL,
  `bktl` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_detail_transaksi_bop`
--

CREATE TABLE `temp_detail_transaksi_bop` (
  `id` int(10) UNSIGNED NOT NULL,
  `bop` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_bahan`
--

CREATE TABLE `transaksi_bahan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_transaksi_bahan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produksi_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_bahan`
--

INSERT INTO `transaksi_bahan` (`id`, `kode_transaksi_bahan`, `grand_total`, `produksi_id`, `created_at`, `updated_at`) VALUES
(4, 'TBB08071800001', '140000', 4, '2018-07-08 00:21:15', '2018-07-08 00:21:15'),
(5, 'TBB16071800002', '100000', 5, '2018-07-16 05:20:14', '2018-07-16 05:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_bktl`
--

CREATE TABLE `transaksi_bktl` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_transaksi_bktl` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produksi_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_bktl`
--

INSERT INTO `transaksi_bktl` (`id`, `kode_transaksi_bktl`, `grand_total`, `produksi_id`, `created_at`, `updated_at`) VALUES
(5, 'TTBKTL08071800001', '1200000', 4, '2018-07-08 00:23:48', '2018-07-08 00:23:48'),
(6, 'TTBKTL16071871801', '800000', 5, '2018-07-16 05:20:41', '2018-07-16 05:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_bop`
--

CREATE TABLE `transaksi_bop` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_transaksi_bop` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produksi_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_bop`
--

INSERT INTO `transaksi_bop` (`id`, `kode_transaksi_bop`, `grand_total`, `produksi_id`, `created_at`, `updated_at`) VALUES
(3, 'TBOP08071800001', '290000', 4, '2018-07-08 00:24:38', '2018-07-08 00:24:38'),
(4, 'TBOP16071880001', '120000', 5, '2018-07-16 05:21:12', '2018-07-16 05:21:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'unna', 'unna', 'mr.luqman14@gmail.com', '$2y$10$ZwuWiywjYVrrIwV4TUShfONEF9rdKFmpaYno9ozOvci4pWdkgdx.u', 'keMKuQ8u9dLYm8JdSKTucdQxEkNmWBXXISyOFqRXHuKaDPsgg97UKE2SVswt', '2018-07-06 16:24:51', '2018-07-06 16:24:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bop`
--
ALTER TABLE `bop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `btkl`
--
ALTER TABLE `btkl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi_bahan`
--
ALTER TABLE `detail_transaksi_bahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksi_bahan_transaksi_bahan_id_foreign` (`transaksi_bahan_id`);

--
-- Indexes for table `detail_transaksi_bktl`
--
ALTER TABLE `detail_transaksi_bktl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksi_bktl_transaksi_bktl_id_foreign` (`transaksi_bktl_id`);

--
-- Indexes for table `detail_transaksi_bop`
--
ALTER TABLE `detail_transaksi_bop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksi_bop_transaksi_bop_id_foreign` (`transaksi_bop_id`);

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
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_detail_transaksi_bahan`
--
ALTER TABLE `temp_detail_transaksi_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_detail_transaksi_bktl`
--
ALTER TABLE `temp_detail_transaksi_bktl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_detail_transaksi_bop`
--
ALTER TABLE `temp_detail_transaksi_bop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_bahan`
--
ALTER TABLE `transaksi_bahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_bahan_produksi_id_foreign` (`produksi_id`);

--
-- Indexes for table `transaksi_bktl`
--
ALTER TABLE `transaksi_bktl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_bktl_produksi_id_foreign` (`produksi_id`);

--
-- Indexes for table `transaksi_bop`
--
ALTER TABLE `transaksi_bop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_bop_produksi_id_foreign` (`produksi_id`);

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
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bop`
--
ALTER TABLE `bop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `btkl`
--
ALTER TABLE `btkl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detail_transaksi_bahan`
--
ALTER TABLE `detail_transaksi_bahan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `detail_transaksi_bktl`
--
ALTER TABLE `detail_transaksi_bktl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detail_transaksi_bop`
--
ALTER TABLE `detail_transaksi_bop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `temp_detail_transaksi_bahan`
--
ALTER TABLE `temp_detail_transaksi_bahan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_detail_transaksi_bktl`
--
ALTER TABLE `temp_detail_transaksi_bktl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `temp_detail_transaksi_bop`
--
ALTER TABLE `temp_detail_transaksi_bop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_bahan`
--
ALTER TABLE `transaksi_bahan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transaksi_bktl`
--
ALTER TABLE `transaksi_bktl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaksi_bop`
--
ALTER TABLE `transaksi_bop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi_bahan`
--
ALTER TABLE `detail_transaksi_bahan`
  ADD CONSTRAINT `detail_transaksi_bahan_transaksi_bahan_id_foreign` FOREIGN KEY (`transaksi_bahan_id`) REFERENCES `transaksi_bahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi_bktl`
--
ALTER TABLE `detail_transaksi_bktl`
  ADD CONSTRAINT `detail_transaksi_bktl_transaksi_bktl_id_foreign` FOREIGN KEY (`transaksi_bktl_id`) REFERENCES `transaksi_bktl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi_bop`
--
ALTER TABLE `detail_transaksi_bop`
  ADD CONSTRAINT `detail_transaksi_bop_transaksi_bop_id_foreign` FOREIGN KEY (`transaksi_bop_id`) REFERENCES `transaksi_bop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_bahan`
--
ALTER TABLE `transaksi_bahan`
  ADD CONSTRAINT `transaksi_bahan_produksi_id_foreign` FOREIGN KEY (`produksi_id`) REFERENCES `produksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_bktl`
--
ALTER TABLE `transaksi_bktl`
  ADD CONSTRAINT `transaksi_bktl_produksi_id_foreign` FOREIGN KEY (`produksi_id`) REFERENCES `produksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_bop`
--
ALTER TABLE `transaksi_bop`
  ADD CONSTRAINT `transaksi_bop_produksi_id_foreign` FOREIGN KEY (`produksi_id`) REFERENCES `produksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
