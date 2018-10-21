-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 03:32 PM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `airplanes`
--

CREATE TABLE `airplanes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `airplane_message_transactions`
--

CREATE TABLE `airplane_message_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `isiPesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusPenjawab` int(11) NOT NULL,
  `isSelesai` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `airplaneTransaction_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `airplane_transactions`
--

CREATE TABLE `airplane_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `totalBiaya` int(11) NOT NULL,
  `tglPenerbangan` date NOT NULL,
  `statusTransaksi` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `airplane_id` int(10) UNSIGNED NOT NULL,
  `hospital1_id` int(10) UNSIGNED NOT NULL,
  `hospital2_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `promotion_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `province_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `nama`, `isActive`, `province_id`, `created_at`, `updated_at`) VALUES
(1, 'Surabaya', 1, 1, '2018-10-20 23:13:20', '2018-10-20 23:13:20'),
(2, 'Jakarta', 1, 2, '2018-10-20 23:13:20', '2018-10-20 23:13:20'),
(3, 'Malang', 1, 1, '2018-10-20 23:13:20', '2018-10-20 23:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isOpen` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`id`, `nama`, `alamat`, `telepon_1`, `telepon_2`, `isOpen`, `isActive`, `city_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Clinic1', 'Jalan Clinic 1', '031123456', '031678901', 1, 1, 1, 1, '2018-10-20 23:13:23', '2018-10-20 23:13:23'),
(2, 'Clinic2', 'Jalan Clinic 2', '031123456', '031678901', 1, 1, 2, 2, '2018-10-20 23:13:23', '2018-10-20 23:13:23'),
(3, 'Clinic3', 'Jalan Clinic 3', '031123456', '031678901', 1, 1, 1, 3, '2018-10-20 23:13:23', '2018-10-20 23:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_message_transactions`
--

CREATE TABLE `clinic_message_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `isiPesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusPenjawab` int(11) NOT NULL,
  `isSelesai` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clinicTransactions_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinic_transactions`
--

CREATE TABLE `clinic_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `hari_praktek` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_praktek` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noAntrian` int(11) DEFAULT NULL,
  `totalBiaya` int(11) DEFAULT NULL,
  `alasan_kunjungan` text COLLATE utf8mb4_unicode_ci,
  `statusTransaksi` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctorclinic_id` int(10) UNSIGNED NOT NULL,
  `pasien_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `promotion_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinic_transactions`
--

INSERT INTO `clinic_transactions` (`id`, `hari_praktek`, `jam_praktek`, `noAntrian`, `totalBiaya`, `alasan_kunjungan`, `statusTransaksi`, `isActive`, `created_at`, `updated_at`, `doctorclinic_id`, `pasien_id`, `user_id`, `payment_id`, `promotion_id`) VALUES
(1, 'Senin', '13.00-15.00', NULL, NULL, 'Uji Data Baru', 0, 1, '2018-10-21 04:21:16', '2018-10-21 04:21:16', 2, 2, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengalaman` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `spesialist_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `nid`, `nama`, `profil`, `pendidikan`, `pengalaman`, `isActive`, `spesialist_id`, `created_at`, `updated_at`) VALUES
(1, '1122233', 'Dokter 1', 'Dokter 1 adalah abc', 'SMA,S1,S2,S3', 'RS Ketintang,RS 1,RS 2', 1, 1, '2018-10-20 23:13:22', '2018-10-20 23:13:22'),
(2, '1122233', 'Dokter 3', 'Dokter 3 adalah abc', 'SMA,S1,S2,S3', 'RS 1,RS 2', 1, 1, '2018-10-20 23:13:22', '2018-10-20 23:13:22'),
(3, '1122233', 'Dokter 3', 'Dokter 3 adalah abc', 'SMA,S1,S2,S3', 'RS 2', 1, 2, '2018-10-20 23:13:22', '2018-10-20 23:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_clinics`
--

CREATE TABLE `doctor_clinics` (
  `id` int(10) UNSIGNED NOT NULL,
  `hari_praktek` text COLLATE utf8mb4_unicode_ci,
  `jam_praktek` text COLLATE utf8mb4_unicode_ci,
  `isOpen` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `clinic_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_clinics`
--

INSERT INTO `doctor_clinics` (`id`, `hari_praktek`, `jam_praktek`, `isOpen`, `isActive`, `doctor_id`, `clinic_id`, `created_at`, `updated_at`) VALUES
(1, 'Senin,Rabu,Jumat', '13.00-15.00, 18.00-20.00', 1, 1, 1, 1, '2018-10-20 23:13:23', '2018-10-20 23:13:23'),
(2, 'Senin,Rabu,Jumat', '13.00-15.00, 18.00-20.00', 1, 1, 2, 2, '2018-10-20 23:13:23', '2018-10-20 23:13:23'),
(3, 'Senin,Rabu,Jumat', '13.00-15.00, 18.00-20.00', 1, 1, 3, 1, '2018-10-20 23:13:23', '2018-10-20 23:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_hospitals`
--

CREATE TABLE `doctor_hospitals` (
  `id` int(10) UNSIGNED NOT NULL,
  `hari_praktek` text COLLATE utf8mb4_unicode_ci,
  `jam_praktek` text COLLATE utf8mb4_unicode_ci,
  `isOpen` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_hospitals`
--

INSERT INTO `doctor_hospitals` (`id`, `hari_praktek`, `jam_praktek`, `isOpen`, `isActive`, `doctor_id`, `hospital_id`, `created_at`, `updated_at`) VALUES
(1, 'Senin,Rabu,Jumat', '13.00-15.00, 18.00-20.00', 1, 1, 1, 1, '2018-10-20 23:13:22', '2018-10-20 23:13:22'),
(2, 'Selasa,Kamis', '18.00-20.00', 1, 1, 2, 1, '2018-10-20 23:13:22', '2018-10-20 23:13:22'),
(3, 'Senin', '15.00-19.00', 1, 1, 3, 1, '2018-10-20 23:13:22', '2018-10-20 23:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(10) UNSIGNED NOT NULL,
  `namaObat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hargaObat` int(11) NOT NULL,
  `satuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isReady` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pharmacy_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drug_pharmacy_transactions`
--

CREATE TABLE `drug_pharmacy_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pharmacyTransaction_id` int(10) UNSIGNED NOT NULL,
  `drug_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isOpen` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `nama`, `alamat`, `telepon_1`, `telepon_2`, `isOpen`, `isActive`, `city_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'RS 1 Siloam', 'Jalan1', '031-333111', '031-333222', 1, 1, 1, 1, '2018-10-20 23:13:21', '2018-10-20 23:13:21'),
(2, 'RS 2 Siloam', 'Jalan1', '031-333111', '031-333222', 1, 1, 1, 2, '2018-10-20 23:13:21', '2018-10-20 23:13:21'),
(3, 'RS Malang', 'Jalan1', '031-333111', '031-333222', 1, 1, 3, 3, '2018-10-20 23:13:21', '2018-10-20 23:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_clinic_message_transactions`
--

CREATE TABLE `hospital_clinic_message_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `isiPesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusPenjawab` int(11) NOT NULL,
  `isSelesai` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hCTrans_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_clinic_transactions`
--

CREATE TABLE `hospital_clinic_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `hari_praktek` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_praktek` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `noAntrian` int(11) DEFAULT NULL,
  `totalBiaya` int(11) DEFAULT NULL,
  `alasan_kunjungan` text COLLATE utf8mb4_unicode_ci,
  `statusTransaksi` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctorhospital_id` int(10) UNSIGNED NOT NULL,
  `pasien_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `promotion_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital_clinic_transactions`
--

INSERT INTO `hospital_clinic_transactions` (`id`, `hari_praktek`, `jam_praktek`, `noAntrian`, `totalBiaya`, `alasan_kunjungan`, `statusTransaksi`, `isActive`, `created_at`, `updated_at`, `doctorhospital_id`, `pasien_id`, `user_id`, `payment_id`, `promotion_id`) VALUES
(1, 'Senin', '13.00-15.00', NULL, NULL, 'sakit perut', 0, 1, '2018-10-21 04:13:07', '2018-10-21 04:13:07', 1, NULL, 4, NULL, NULL),
(2, 'Selasa', '18.00-20.00', NULL, NULL, 'ujicoba', 0, 1, '2018-10-21 05:30:36', '2018-10-21 05:30:36', 2, NULL, 4, NULL, NULL);

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
(151, '2014_10_12_000000_create_users_table', 1),
(152, '2014_10_12_100000_create_password_resets_table', 1),
(153, '2018_09_29_091928_create_provinces_table', 1),
(154, '2018_09_29_092142_create_cities_table', 1),
(155, '2018_09_29_092818_create_clinics_table', 1),
(156, '2018_09_29_093056_create_hospitals_table', 1),
(157, '2018_09_29_093217_create_pharmacies_table', 1),
(158, '2018_09_29_093334_create_airplanes_table', 1),
(159, '2018_09_29_093833_create_admins_table', 1),
(160, '2018_09_29_093848_create_blogs_table', 1),
(161, '2018_09_29_094223_create_rooms_table', 1),
(162, '2018_09_29_094234_create_specialists_table', 1),
(163, '2018_09_29_094243_create_doctors_table', 1),
(164, '2018_09_29_094259_create_doctor_clinics_table', 1),
(165, '2018_09_29_094311_create_doctor_hospitals_table', 1),
(166, '2018_09_29_122445_create_pasiens_table', 1),
(167, '2018_09_29_123150_create_promotions_table', 1),
(168, '2018_09_29_123151_create_payments_table', 1),
(169, '2018_09_29_123152_create_clinic_transactions_table', 1),
(170, '2018_09_29_124536_create_room_transactions_table', 1),
(171, '2018_09_29_125452_create_drugs_table', 1),
(172, '2018_09_29_125813_create_pharmacy_transactions_table', 1),
(173, '2018_09_29_130848_create_hospital_clinic_transactions_table', 1),
(174, '2018_09_29_131128_create_airplane_transactions_table', 1),
(175, '2018_09_29_131543_create_drug_pharmacy_transactions_table', 1),
(176, '2018_09_29_131931_create_clinic_message_transactions_table', 1),
(177, '2018_09_29_144943_create_room_message_transactions_table', 1),
(178, '2018_09_29_145225_create_hospital_clinic_message_transactions_table', 1),
(179, '2018_09_29_145449_create_pharmacy_message_transactions_table', 1),
(180, '2018_09_29_145551_create_airplane_message_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `isActive` tinyint(1) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `nama`, `no_telepon`, `tgl_lahir`, `alamat`, `isActive`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Pasine123', '0882223344', '2018-10-02', 'Testing User', 1, NULL, '2018-10-20 23:20:28', '2018-10-20 23:20:28'),
(2, 'Pasien ABC', '0123456', '2018-10-03', 'Penjaringan Malam', 1, NULL, '2018-10-21 04:21:16', '2018-10-21 04:21:16');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacies`
--

CREATE TABLE `pharmacies` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isOpen` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_message_transactions`
--

CREATE TABLE `pharmacy_message_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `isiPesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusPenjawab` int(11) NOT NULL,
  `isSelesai` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pharmacyTransactions_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_transactions`
--

CREATE TABLE `pharmacy_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `totalBiaya` int(11) NOT NULL,
  `statusPesanan` int(11) NOT NULL,
  `isResep` int(11) NOT NULL,
  `gambarResep` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pharmacy_id` int(10) UNSIGNED DEFAULT NULL,
  `pasien_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `promotion_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `nama`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Jawa Timur', 1, '2018-10-20 23:13:20', '2018-10-20 23:13:20'),
(2, 'Jakarta', 1, '2018-10-20 23:13:20', '2018-10-20 23:13:20'),
(3, 'Jawa Tengah', 1, '2018-10-20 23:13:20', '2018-10-20 23:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jum_pasien` int(11) NOT NULL,
  `jum_penunggu` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `fasilitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `isFull` tinyint(1) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `nama`, `jum_pasien`, `jum_penunggu`, `harga`, `rating`, `fasilitas`, `isFull`, `isActive`, `hospital_id`, `created_at`, `updated_at`) VALUES
(1, 'Kelas 1', 3, 3, 1000, 5, 'ac,tv,kulkas,ranjang', 0, 1, 1, '2018-10-20 23:13:21', '2018-10-20 23:13:21'),
(2, 'Kelas 2', 2, 2, 1050, 4, 'ac,tv,kulkas', 0, 1, 1, '2018-10-20 23:13:21', '2018-10-20 23:13:21'),
(3, 'Kelas 3', 1, 1, 1200, 3, 'ac,tv,ranjang', 0, 1, 1, '2018-10-20 23:13:21', '2018-10-20 23:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `room_message_transactions`
--

CREATE TABLE `room_message_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `isiPesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusPenjawab` int(11) NOT NULL,
  `isSelesai` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roomTransactions_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_transactions`
--

CREATE TABLE `room_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `lamaInap` int(11) NOT NULL,
  `totalBiaya` int(11) NOT NULL,
  `statusTransaksi` int(11) NOT NULL,
  `alasan_kunjungan` text COLLATE utf8mb4_unicode_ci,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `doctorHospital_id` int(10) UNSIGNED DEFAULT NULL,
  `pasien_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `promotion_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_transactions`
--

INSERT INTO `room_transactions` (`id`, `lamaInap`, `totalBiaya`, `statusTransaksi`, `alasan_kunjungan`, `isActive`, `created_at`, `updated_at`, `room_id`, `doctorHospital_id`, `pasien_id`, `user_id`, `payment_id`, `promotion_id`) VALUES
(1, 2, 2000, 0, 'testing', 1, '2018-10-20 23:17:16', '2018-10-20 23:17:16', 1, NULL, NULL, 4, NULL, NULL),
(2, 1, 1000, 0, 'Go Go', 1, '2018-10-20 23:20:28', '2018-10-20 23:20:28', 1, NULL, 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

CREATE TABLE `specialists` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialists`
--

INSERT INTO `specialists` (`id`, `nama`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'Specialist 1', 1, '2018-10-20 23:13:22', '2018-10-20 23:13:22'),
(2, 'Specialist 2', 1, '2018-10-20 23:13:22', '2018-10-20 23:13:22'),
(3, 'Specialist 3', 1, '2018-10-20 23:13:22', '2018-10-20 23:13:22');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `nama`, `alamat`, `kota`, `provinsi`, `negara`, `telepon`, `poin`, `wallet`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user1@email.com', NULL, '$2y$10$iYyLqW4hXxEi8vHvgxvH7ueDpJcl2i/RpQmChUtPoFjhWw6.pm84a', 'user1', 'mulyosari', 'sub', 'jatim', 'id', '081222222', 100, 53000, 1, NULL, '2018-10-20 23:13:19', '2018-10-20 23:13:19'),
(2, 'user2@email.com', NULL, '$2y$10$HxHynCktiWTDuqn9NIfGD.ZfNagJZpbni2wULVEaA80p7vl0Xb1PK', 'user2', 'mulyosari1', 'sub', 'jatim', 'id', '081222222', 150, 54000, 1, NULL, '2018-10-20 23:13:19', '2018-10-20 23:13:19'),
(3, 'user3@email.com', NULL, '$2y$10$8J8KoVIyghjvAt0//GjXDOLfE0nqmQXD2RqosYSbiJFzKocziqzHm', 'user3', 'mulyosari2', 'sub', 'jatim', 'id', '081222222', 150, 54000, 1, NULL, '2018-10-20 23:13:20', '2018-10-20 23:13:20'),
(4, 'user4@email.com', NULL, '$2y$10$SBjjBJRb5tmk/yvbIrCTEO3viHKsjgk3yVtjVMO2CKBaLag1tmG2K', 'User Ujicoba', 'mulyosari2', 'sub', 'jatim', 'id', '081222222', 150, 54000, 1, NULL, '2018-10-20 23:13:20', '2018-10-20 23:13:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Indexes for table `airplanes`
--
ALTER TABLE `airplanes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airplanes_city_id_foreign` (`city_id`),
  ADD KEY `airplanes_user_id_foreign` (`user_id`);

--
-- Indexes for table `airplane_message_transactions`
--
ALTER TABLE `airplane_message_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airplane_message_transactions_airplanetransaction_id_foreign` (`airplaneTransaction_id`),
  ADD KEY `airplane_message_transactions_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `airplane_transactions`
--
ALTER TABLE `airplane_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airplane_transactions_airplane_id_foreign` (`airplane_id`),
  ADD KEY `airplane_transactions_hospital1_id_foreign` (`hospital1_id`),
  ADD KEY `airplane_transactions_hospital2_id_foreign` (`hospital2_id`),
  ADD KEY `airplane_transactions_user_id_foreign` (`user_id`),
  ADD KEY `airplane_transactions_payment_id_foreign` (`payment_id`),
  ADD KEY `airplane_transactions_promotion_id_foreign` (`promotion_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_province_id_foreign` (`province_id`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinics_city_id_foreign` (`city_id`),
  ADD KEY `clinics_user_id_foreign` (`user_id`);

--
-- Indexes for table `clinic_message_transactions`
--
ALTER TABLE `clinic_message_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinic_message_transactions_clinictransactions_id_foreign` (`clinicTransactions_id`),
  ADD KEY `clinic_message_transactions_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `clinic_transactions`
--
ALTER TABLE `clinic_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinic_transactions_doctorclinic_id_foreign` (`doctorclinic_id`),
  ADD KEY `clinic_transactions_pasien_id_foreign` (`pasien_id`),
  ADD KEY `clinic_transactions_user_id_foreign` (`user_id`),
  ADD KEY `clinic_transactions_payment_id_foreign` (`payment_id`),
  ADD KEY `clinic_transactions_promotion_id_foreign` (`promotion_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_spesialist_id_foreign` (`spesialist_id`);

--
-- Indexes for table `doctor_clinics`
--
ALTER TABLE `doctor_clinics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_clinics_doctor_id_foreign` (`doctor_id`),
  ADD KEY `doctor_clinics_clinic_id_foreign` (`clinic_id`);

--
-- Indexes for table `doctor_hospitals`
--
ALTER TABLE `doctor_hospitals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_hospitals_doctor_id_foreign` (`doctor_id`),
  ADD KEY `doctor_hospitals_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drugs_pharmacy_id_foreign` (`pharmacy_id`);

--
-- Indexes for table `drug_pharmacy_transactions`
--
ALTER TABLE `drug_pharmacy_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drug_pharmacy_transactions_pharmacytransaction_id_foreign` (`pharmacyTransaction_id`),
  ADD KEY `drug_pharmacy_transactions_drug_id_foreign` (`drug_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospitals_city_id_foreign` (`city_id`),
  ADD KEY `hospitals_user_id_foreign` (`user_id`);

--
-- Indexes for table `hospital_clinic_message_transactions`
--
ALTER TABLE `hospital_clinic_message_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_clinic_message_transactions_hctrans_id_foreign` (`hCTrans_id`),
  ADD KEY `hospital_clinic_message_transactions_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `hospital_clinic_transactions`
--
ALTER TABLE `hospital_clinic_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospital_clinic_transactions_doctorhospital_id_foreign` (`doctorhospital_id`),
  ADD KEY `hospital_clinic_transactions_pasien_id_foreign` (`pasien_id`),
  ADD KEY `hospital_clinic_transactions_user_id_foreign` (`user_id`),
  ADD KEY `hospital_clinic_transactions_payment_id_foreign` (`payment_id`),
  ADD KEY `hospital_clinic_transactions_promotion_id_foreign` (`promotion_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasiens_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pharmacies_city_id_foreign` (`city_id`),
  ADD KEY `pharmacies_user_id_foreign` (`user_id`);

--
-- Indexes for table `pharmacy_message_transactions`
--
ALTER TABLE `pharmacy_message_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pharmacy_message_transactions_pharmacytransactions_id_foreign` (`pharmacyTransactions_id`),
  ADD KEY `pharmacy_message_transactions_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `pharmacy_transactions`
--
ALTER TABLE `pharmacy_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pharmacy_transactions_pharmacy_id_foreign` (`pharmacy_id`),
  ADD KEY `pharmacy_transactions_pasien_id_foreign` (`pasien_id`),
  ADD KEY `pharmacy_transactions_user_id_foreign` (`user_id`),
  ADD KEY `pharmacy_transactions_payment_id_foreign` (`payment_id`),
  ADD KEY `pharmacy_transactions_promotion_id_foreign` (`promotion_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_hospital_id_foreign` (`hospital_id`);

--
-- Indexes for table `room_message_transactions`
--
ALTER TABLE `room_message_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_message_transactions_roomtransactions_id_foreign` (`roomTransactions_id`),
  ADD KEY `room_message_transactions_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `room_transactions`
--
ALTER TABLE `room_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_transactions_room_id_foreign` (`room_id`),
  ADD KEY `room_transactions_doctorhospital_id_foreign` (`doctorHospital_id`),
  ADD KEY `room_transactions_pasien_id_foreign` (`pasien_id`),
  ADD KEY `room_transactions_user_id_foreign` (`user_id`),
  ADD KEY `room_transactions_payment_id_foreign` (`payment_id`),
  ADD KEY `room_transactions_promotion_id_foreign` (`promotion_id`);

--
-- Indexes for table `specialists`
--
ALTER TABLE `specialists`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `airplanes`
--
ALTER TABLE `airplanes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `airplane_message_transactions`
--
ALTER TABLE `airplane_message_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `airplane_transactions`
--
ALTER TABLE `airplane_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `clinic_message_transactions`
--
ALTER TABLE `clinic_message_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clinic_transactions`
--
ALTER TABLE `clinic_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `doctor_clinics`
--
ALTER TABLE `doctor_clinics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `doctor_hospitals`
--
ALTER TABLE `doctor_hospitals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drug_pharmacy_transactions`
--
ALTER TABLE `drug_pharmacy_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hospital_clinic_message_transactions`
--
ALTER TABLE `hospital_clinic_message_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hospital_clinic_transactions`
--
ALTER TABLE `hospital_clinic_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacies`
--
ALTER TABLE `pharmacies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy_message_transactions`
--
ALTER TABLE `pharmacy_message_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy_transactions`
--
ALTER TABLE `pharmacy_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room_message_transactions`
--
ALTER TABLE `room_message_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room_transactions`
--
ALTER TABLE `room_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `airplanes`
--
ALTER TABLE `airplanes`
  ADD CONSTRAINT `airplanes_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `airplanes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `airplane_message_transactions`
--
ALTER TABLE `airplane_message_transactions`
  ADD CONSTRAINT `airplane_message_transactions_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `airplane_message_transactions_airplanetransaction_id_foreign` FOREIGN KEY (`airplaneTransaction_id`) REFERENCES `airplane_transactions` (`id`);

--
-- Constraints for table `airplane_transactions`
--
ALTER TABLE `airplane_transactions`
  ADD CONSTRAINT `airplane_transactions_airplane_id_foreign` FOREIGN KEY (`airplane_id`) REFERENCES `airplanes` (`id`),
  ADD CONSTRAINT `airplane_transactions_hospital1_id_foreign` FOREIGN KEY (`hospital1_id`) REFERENCES `hospitals` (`id`),
  ADD CONSTRAINT `airplane_transactions_hospital2_id_foreign` FOREIGN KEY (`hospital2_id`) REFERENCES `hospitals` (`id`),
  ADD CONSTRAINT `airplane_transactions_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `airplane_transactions_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`),
  ADD CONSTRAINT `airplane_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `clinics`
--
ALTER TABLE `clinics`
  ADD CONSTRAINT `clinics_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `clinics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `clinic_message_transactions`
--
ALTER TABLE `clinic_message_transactions`
  ADD CONSTRAINT `clinic_message_transactions_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `clinic_message_transactions_clinictransactions_id_foreign` FOREIGN KEY (`clinicTransactions_id`) REFERENCES `clinic_transactions` (`id`);

--
-- Constraints for table `clinic_transactions`
--
ALTER TABLE `clinic_transactions`
  ADD CONSTRAINT `clinic_transactions_doctorclinic_id_foreign` FOREIGN KEY (`doctorclinic_id`) REFERENCES `doctor_clinics` (`id`),
  ADD CONSTRAINT `clinic_transactions_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`),
  ADD CONSTRAINT `clinic_transactions_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `clinic_transactions_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`),
  ADD CONSTRAINT `clinic_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_spesialist_id_foreign` FOREIGN KEY (`spesialist_id`) REFERENCES `specialists` (`id`);

--
-- Constraints for table `doctor_clinics`
--
ALTER TABLE `doctor_clinics`
  ADD CONSTRAINT `doctor_clinics_clinic_id_foreign` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`),
  ADD CONSTRAINT `doctor_clinics_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `doctor_hospitals`
--
ALTER TABLE `doctor_hospitals`
  ADD CONSTRAINT `doctor_hospitals_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `doctor_hospitals_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`);

--
-- Constraints for table `drugs`
--
ALTER TABLE `drugs`
  ADD CONSTRAINT `drugs_pharmacy_id_foreign` FOREIGN KEY (`pharmacy_id`) REFERENCES `pharmacies` (`id`);

--
-- Constraints for table `drug_pharmacy_transactions`
--
ALTER TABLE `drug_pharmacy_transactions`
  ADD CONSTRAINT `drug_pharmacy_transactions_drug_id_foreign` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`id`),
  ADD CONSTRAINT `drug_pharmacy_transactions_pharmacytransaction_id_foreign` FOREIGN KEY (`pharmacyTransaction_id`) REFERENCES `pharmacy_transactions` (`id`);

--
-- Constraints for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD CONSTRAINT `hospitals_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `hospitals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `hospital_clinic_message_transactions`
--
ALTER TABLE `hospital_clinic_message_transactions`
  ADD CONSTRAINT `hospital_clinic_message_transactions_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `hospital_clinic_message_transactions_hctrans_id_foreign` FOREIGN KEY (`hCTrans_id`) REFERENCES `hospital_clinic_transactions` (`id`);

--
-- Constraints for table `hospital_clinic_transactions`
--
ALTER TABLE `hospital_clinic_transactions`
  ADD CONSTRAINT `hospital_clinic_transactions_doctorhospital_id_foreign` FOREIGN KEY (`doctorhospital_id`) REFERENCES `doctor_hospitals` (`id`),
  ADD CONSTRAINT `hospital_clinic_transactions_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`),
  ADD CONSTRAINT `hospital_clinic_transactions_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `hospital_clinic_transactions_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`),
  ADD CONSTRAINT `hospital_clinic_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pasiens`
--
ALTER TABLE `pasiens`
  ADD CONSTRAINT `pasiens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD CONSTRAINT `pharmacies_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `pharmacies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pharmacy_message_transactions`
--
ALTER TABLE `pharmacy_message_transactions`
  ADD CONSTRAINT `pharmacy_message_transactions_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `pharmacy_message_transactions_pharmacytransactions_id_foreign` FOREIGN KEY (`pharmacyTransactions_id`) REFERENCES `pharmacy_transactions` (`id`);

--
-- Constraints for table `pharmacy_transactions`
--
ALTER TABLE `pharmacy_transactions`
  ADD CONSTRAINT `pharmacy_transactions_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`),
  ADD CONSTRAINT `pharmacy_transactions_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `pharmacy_transactions_pharmacy_id_foreign` FOREIGN KEY (`pharmacy_id`) REFERENCES `pharmacies` (`id`),
  ADD CONSTRAINT `pharmacy_transactions_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`),
  ADD CONSTRAINT `pharmacy_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`);

--
-- Constraints for table `room_message_transactions`
--
ALTER TABLE `room_message_transactions`
  ADD CONSTRAINT `room_message_transactions_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `room_message_transactions_roomtransactions_id_foreign` FOREIGN KEY (`roomTransactions_id`) REFERENCES `room_transactions` (`id`);

--
-- Constraints for table `room_transactions`
--
ALTER TABLE `room_transactions`
  ADD CONSTRAINT `room_transactions_doctorhospital_id_foreign` FOREIGN KEY (`doctorHospital_id`) REFERENCES `doctor_hospitals` (`id`),
  ADD CONSTRAINT `room_transactions_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`),
  ADD CONSTRAINT `room_transactions_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `room_transactions_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`),
  ADD CONSTRAINT `room_transactions_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `room_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
