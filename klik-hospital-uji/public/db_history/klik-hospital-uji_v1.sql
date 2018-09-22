-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 08:55 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klik-hospital-uji`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id` int(10) UNSIGNED NOT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengalaman` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `spesialis_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokter_kliniks`
--

CREATE TABLE `dokter_kliniks` (
  `id` int(10) UNSIGNED NOT NULL,
  `hari_praktek` text COLLATE utf8mb4_unicode_ci,
  `jam_praktek` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL,
  `dokter_id` int(10) UNSIGNED NOT NULL,
  `klinik_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokter_rumah_sakits`
--

CREATE TABLE `dokter_rumah_sakits` (
  `id` int(10) UNSIGNED NOT NULL,
  `hari_praktek` text COLLATE utf8mb4_unicode_ci,
  `jam_praktek` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL,
  `dokter_id` int(10) UNSIGNED NOT NULL,
  `rumahsakit_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kliniks`
--

CREATE TABLE `kliniks` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2018_09_21_180635_create_rumah_sakits_table', 1),
(24, '2018_09_21_181046_create_ruangs_table', 1),
(25, '2018_09_21_182811_create_spesialis_table', 1),
(26, '2018_09_21_183040_create_dokters_table', 1),
(27, '2018_09_21_183539_create_dokter_rumah_sakits_table', 1),
(28, '2018_09_21_183911_create_transaksi_ruangs_table', 1),
(29, '2018_09_21_185209_create_kliniks_table', 1),
(30, '2018_09_21_185344_create_dokter_kliniks_table', 1),
(31, '2018_09_21_185658_create_transaksi_dokters_table', 1);

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
-- Table structure for table `ruangs`
--

CREATE TABLE `ruangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jum_pasien` int(11) NOT NULL,
  `jum_penunggu` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `fasilitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rumahsakit_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rumah_sakits`
--

CREATE TABLE `rumah_sakits` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rumah_sakits`
--

INSERT INTO `rumah_sakits` (`id`, `nama`, `alamat`, `kota`, `negara`, `tipe`, `telepon1`, `telepon2`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'RS1', 'RS-1', 'RS1', 'RS1', 'RS1', 'RS1', 'RS1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spesialis`
--

CREATE TABLE `spesialis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_dokters`
--

CREATE TABLE `transaksi_dokters` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pasien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari_janji` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_janji` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemesan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp_pemesan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pesanan` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_klinik` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dokterrumahsakit_id` int(10) UNSIGNED NOT NULL,
  `dokterklinik_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_ruangs`
--

CREATE TABLE `transaksi_ruangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik_pasien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl_pasien` datetime NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemesan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp_pemesan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pesanan` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dokterrumahsakit_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin` int(11) NOT NULL,
  `wallet` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokters_spesialis_id_foreign` (`spesialis_id`);

--
-- Indexes for table `dokter_kliniks`
--
ALTER TABLE `dokter_kliniks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter_kliniks_dokter_id_foreign` (`dokter_id`),
  ADD KEY `dokter_kliniks_klinik_id_foreign` (`klinik_id`);

--
-- Indexes for table `dokter_rumah_sakits`
--
ALTER TABLE `dokter_rumah_sakits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter_rumah_sakits_dokter_id_foreign` (`dokter_id`),
  ADD KEY `dokter_rumah_sakits_rumahsakit_id_foreign` (`rumahsakit_id`);

--
-- Indexes for table `kliniks`
--
ALTER TABLE `kliniks`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `ruangs`
--
ALTER TABLE `ruangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ruangs_rumahsakit_id_foreign` (`rumahsakit_id`);

--
-- Indexes for table `rumah_sakits`
--
ALTER TABLE `rumah_sakits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spesialis`
--
ALTER TABLE `spesialis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_dokters`
--
ALTER TABLE `transaksi_dokters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_dokters_dokterrumahsakit_id_foreign` (`dokterrumahsakit_id`),
  ADD KEY `transaksi_dokters_dokterklinik_id_foreign` (`dokterklinik_id`);

--
-- Indexes for table `transaksi_ruangs`
--
ALTER TABLE `transaksi_ruangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_ruangs_dokterrumahsakit_id_foreign` (`dokterrumahsakit_id`);

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
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dokter_kliniks`
--
ALTER TABLE `dokter_kliniks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dokter_rumah_sakits`
--
ALTER TABLE `dokter_rumah_sakits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kliniks`
--
ALTER TABLE `kliniks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `ruangs`
--
ALTER TABLE `ruangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rumah_sakits`
--
ALTER TABLE `rumah_sakits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `spesialis`
--
ALTER TABLE `spesialis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_dokters`
--
ALTER TABLE `transaksi_dokters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_ruangs`
--
ALTER TABLE `transaksi_ruangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokters`
--
ALTER TABLE `dokters`
  ADD CONSTRAINT `dokters_spesialis_id_foreign` FOREIGN KEY (`spesialis_id`) REFERENCES `spesialis` (`id`);

--
-- Constraints for table `dokter_kliniks`
--
ALTER TABLE `dokter_kliniks`
  ADD CONSTRAINT `dokter_kliniks_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokters` (`id`),
  ADD CONSTRAINT `dokter_kliniks_klinik_id_foreign` FOREIGN KEY (`klinik_id`) REFERENCES `kliniks` (`id`);

--
-- Constraints for table `dokter_rumah_sakits`
--
ALTER TABLE `dokter_rumah_sakits`
  ADD CONSTRAINT `dokter_rumah_sakits_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokters` (`id`),
  ADD CONSTRAINT `dokter_rumah_sakits_rumahsakit_id_foreign` FOREIGN KEY (`rumahsakit_id`) REFERENCES `rumah_sakits` (`id`);

--
-- Constraints for table `ruangs`
--
ALTER TABLE `ruangs`
  ADD CONSTRAINT `ruangs_rumahsakit_id_foreign` FOREIGN KEY (`rumahsakit_id`) REFERENCES `rumah_sakits` (`id`);

--
-- Constraints for table `transaksi_dokters`
--
ALTER TABLE `transaksi_dokters`
  ADD CONSTRAINT `transaksi_dokters_dokterklinik_id_foreign` FOREIGN KEY (`dokterklinik_id`) REFERENCES `dokter_kliniks` (`id`),
  ADD CONSTRAINT `transaksi_dokters_dokterrumahsakit_id_foreign` FOREIGN KEY (`dokterrumahsakit_id`) REFERENCES `dokter_rumah_sakits` (`id`);

--
-- Constraints for table `transaksi_ruangs`
--
ALTER TABLE `transaksi_ruangs`
  ADD CONSTRAINT `transaksi_ruangs_dokterrumahsakit_id_foreign` FOREIGN KEY (`dokterrumahsakit_id`) REFERENCES `dokter_rumah_sakits` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
