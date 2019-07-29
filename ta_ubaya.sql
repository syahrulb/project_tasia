-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2019 at 09:21 AM
-- Server version: 5.7.26-0ubuntu0.18.10.1
-- PHP Version: 7.0.33-6+ubuntu18.10.1+deb.sury.org+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_ubaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `akuns`
--

CREATE TABLE `akuns` (
  `id_akun` int(10) UNSIGNED NOT NULL,
  `nama_akun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_akun` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akuns`
--

INSERT INTO `akuns` (`id_akun`, `nama_akun`, `saldo_akun`, `created_at`, `updated_at`) VALUES
(101, 'Kas', 1, '2018-11-11 15:00:00', '2019-05-01 16:40:21'),
(102, 'Rekening Bank ABC', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(103, 'Piutang', -1, '2018-11-11 15:00:00', '2019-05-01 16:23:16'),
(104, 'Perlengkapan Habis Pakai', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(105, 'Tanah Dan Bangunan', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(106, 'Kendaraan', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(107, 'Akumulasi Penyusutan Kendaraan', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(108, 'Asuransi Dibayar Dimuka', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(109, 'Sewa Dibayar Dimuka', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(201, 'Hutang Usaha', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(202, 'Hutang Pada Bank XYZ', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(203, 'Sewa Diterima Dimuka', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(204, 'Hutang Gaji', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(301, 'Modal Usaha', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(302, 'Prive', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(401, 'Pendapatan Sewa Ruang', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(402, 'Pendapatan Sewa Gudang', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(403, 'Pendapatan Bunga', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(501, 'Biaya Sewa', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(502, 'Biaya Gaji', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(503, 'Biaya Perlengkapan Habis Pakai', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(504, 'Biaya Utiliti', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(505, 'Biaya Transportasi', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(506, 'Biaya Penyusutan Kendaraan', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(507, 'Biaya Penyusutan Kendaraan', 0, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(508, 'Biaya Asuransi', 0, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(509, 'Biaya Lain Lain', 0, '2018-11-11 15:00:00', '2018-11-11 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `akun_has_laporans`
--

CREATE TABLE `akun_has_laporans` (
  `akun_id_akun` int(11) NOT NULL,
  `laporan_id_laporan` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `keterangan` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `akun_has_pengelompokans`
--

CREATE TABLE `akun_has_pengelompokans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_akun` int(10) UNSIGNED DEFAULT NULL,
  `id_kelompok` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun_has_pengelompokans`
--

INSERT INTO `akun_has_pengelompokans` (`id`, `id_akun`, `id_kelompok`, `created_at`, `updated_at`) VALUES
(29, 101, 3, NULL, NULL),
(36, 102, 3, NULL, NULL),
(37, 103, 3, NULL, NULL),
(38, 101, 4, NULL, NULL),
(39, 102, 4, NULL, NULL),
(40, 103, 4, NULL, NULL),
(41, 104, 4, NULL, NULL),
(42, 106, 4, NULL, NULL),
(43, 301, 4, NULL, NULL),
(44, 101, 1, NULL, NULL),
(45, 102, 1, NULL, NULL),
(46, 103, 1, NULL, NULL),
(47, 104, 1, NULL, NULL),
(48, 105, 1, NULL, NULL),
(49, 106, 1, NULL, NULL),
(50, 108, 1, NULL, NULL),
(51, 109, 1, NULL, NULL),
(52, 203, 1, NULL, NULL),
(53, 301, 1, NULL, NULL),
(54, 302, 1, NULL, NULL),
(55, 401, 1, NULL, NULL),
(56, 402, 1, NULL, NULL),
(57, 403, 1, NULL, NULL),
(58, 105, 2, NULL, NULL),
(59, 106, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id_appointment` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_jenis_komponen_jasa` int(10) UNSIGNED NOT NULL,
  `judul_appointment` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_appointment` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang_pendukungs`
--

CREATE TABLE `barang_pendukungs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_jenis_komponen_jasa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info_perusahaans`
--

CREATE TABLE `info_perusahaans` (
  `id_info_perusahaan` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_perusahaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai_data` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_komponen_jasas`
--

CREATE TABLE `jenis_komponen_jasas` (
  `id_jenis_komponen_jasa` int(10) UNSIGNED NOT NULL,
  `jenis_jasa_sewa` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_jasa_sewa` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_rasios`
--

CREATE TABLE `jenis_rasios` (
  `id_jenis_rasio` int(10) UNSIGNED NOT NULL,
  `jenis_rasio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_diagram` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_rasios`
--

INSERT INTO `jenis_rasios` (`id_jenis_rasio`, `jenis_rasio`, `master_diagram`, `created_at`, `updated_at`) VALUES
(1, 'Rasio Solvabilitas', 2, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(2, 'Rasio Profitabilitas', 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jurnals`
--

CREATE TABLE `jurnals` (
  `id` int(10) UNSIGNED NOT NULL,
  `nota_jasa_nomor_bukti` int(10) UNSIGNED NOT NULL,
  `id_periode` int(10) UNSIGNED NOT NULL,
  `tanggal_jurnal` date NOT NULL,
  `jenis` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kontraks`
--

CREATE TABLE `laporan_kontraks` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_surat_kontrak` int(10) UNSIGNED NOT NULL,
  `id_periode` int(10) UNSIGNED NOT NULL,
  `judul_laporan` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `pendapatan_kotor` double NOT NULL,
  `pendapatan_bersih` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_diagrams`
--

CREATE TABLE `master_diagrams` (
  `id_master_diagram` int(10) UNSIGNED NOT NULL,
  `bentuk_diagram` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_diagrams`
--

INSERT INTO `master_diagrams` (`id_master_diagram`, `bentuk_diagram`, `created_at`, `updated_at`) VALUES
(1, 'Batang', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(2, 'Grafik', '2018-11-11 15:00:00', '2018-11-11 15:00:00');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_22_141014_create_periodes_table', 1),
(4, '2018_09_22_141651_create_akuns_table', 1),
(5, '2018_09_22_142003_create_info_perusahaans_table', 1),
(6, '2018_09_22_142628_create_jenis_komponen_jasas_table', 1),
(7, '2018_09_22_142802_create_barang_pendukungs_table', 1),
(8, '2018_09_22_142945_create_appointments_table', 1),
(9, '2018_09_22_143211_create_pembayarans_table', 1),
(10, '2018_09_22_143532_create_nota_jasas_table', 1),
(11, '2018_09_22_143858_create_surat_kontraks_table', 1),
(12, '2018_09_22_144413_create_laporan_kontraks_table', 1),
(13, '2018_09_22_144739_create_jurnals_table', 1),
(14, '2018_09_22_145119_create_periode_has_akuns_table', 1),
(15, '2018_09_22_145434_create_pembayaran_jasas_table', 1),
(16, '2018_11_13_094135_create_pengelompokans_table', 1),
(17, '2018_11_13_094303_create_master_diagrams_table', 1),
(18, '2018_11_13_094519_create_jenis_rasios_table', 1),
(19, '2018_11_13_094822_create_rasios_table', 1),
(20, '2018_11_13_095710_create_rasio_has_pengelompokans_table', 1),
(21, '2018_11_13_095841_create_akun_has_pengelompokans_table', 1),
(22, '2018_11_13_095944_create_tipe_visualisasis_table', 1),
(23, '2019_04_02_152533_create_akun_has_laporan_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nota_jasas`
--

CREATE TABLE `nota_jasas` (
  `nomor_bukti` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_sekarang` date NOT NULL,
  `harga_sewa` double NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengambilan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `pembayarans`
--

CREATE TABLE `pembayarans` (
  `nomor_pembayaran` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama_item` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pembayaran` enum('dp','termin','tunai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_jasas`
--

CREATE TABLE `pembayaran_jasas` (
  `id_jenis_komponen_jasa` int(10) UNSIGNED NOT NULL,
  `nomor_pembayaran` int(10) UNSIGNED NOT NULL,
  `total_pembayaran` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengelompokans`
--

CREATE TABLE `pengelompokans` (
  `id_kelompok` int(10) UNSIGNED NOT NULL,
  `kegunaan_akun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengelompokans`
--

INSERT INTO `pengelompokans` (`id_kelompok`, `kegunaan_akun`, `created_at`, `updated_at`) VALUES
(1, 'Aktiva', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(2, 'Aktiva Tetap', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(3, 'Aktiva Operasi', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(4, 'Modal Sendiri', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(5, 'Hutang Jangka Panjang', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(6, 'Hutang', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(7, 'Laba Usaha', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(8, 'Aktiva Usaha', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(9, 'Laba Kotor', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(10, 'Penjualan', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(11, 'Laba Bersih', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(12, 'HPP', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(13, 'Biaya Operasi', '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(14, 'Laba Bersih', '2018-11-11 15:00:00', '2018-11-11 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `periodes`
--

CREATE TABLE `periodes` (
  `id_periode` int(10) UNSIGNED NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periodes`
--

INSERT INTO `periodes` (`id_periode`, `tanggal_awal`, `tanggal_akhir`, `created_at`, `updated_at`) VALUES
(1, '2019-04-01', '2019-04-16', '2019-04-24 09:34:16', '2019-05-01 14:17:23'),
(3, '2019-03-01', '2019-03-30', NULL, '2019-05-01 14:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `periode_has_akuns`
--

CREATE TABLE `periode_has_akuns` (
  `id` int(11) NOT NULL,
  `id_periode` int(10) UNSIGNED NOT NULL,
  `id_akun` int(10) UNSIGNED NOT NULL,
  `nama_akun` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_awal` double NOT NULL,
  `saldo_akhir` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periode_has_akuns`
--

INSERT INTO `periode_has_akuns` (`id`, `id_periode`, `id_akun`, `nama_akun`, `saldo_awal`, `saldo_akhir`, `created_at`, `updated_at`) VALUES
(1, 3, 101, '', 120, 120000, NULL, '2019-05-01 14:13:43'),
(2, 3, 102, '', 130, 130000, NULL, '2019-05-01 14:13:43'),
(4, 3, 104, '', 555, 4444444, NULL, '2019-05-01 14:13:44'),
(5, 1, 101, '', 10000, 1000000, NULL, '2019-05-01 14:17:23'),
(6, 1, 102, '', 10000, 1200000, NULL, '2019-05-01 14:17:23'),
(7, 3, 105, '', 100000, 200000, NULL, NULL),
(8, 3, 106, '', 50000, 100000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rasios`
--

CREATE TABLE `rasios` (
  `id_rasio` int(10) UNSIGNED NOT NULL,
  `nama_rasio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operator` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_batas` double NOT NULL,
  `jenis_rasio` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rasios`
--

INSERT INTO `rasios` (`id_rasio`, `nama_rasio`, `operator`, `nilai_batas`, `jenis_rasio`, `created_at`, `updated_at`) VALUES
(1, 'Rasio Modal Sendiri terhadap Total Aktiva', '>', 2, 1, '2018-11-11 15:00:00', '2019-04-29 07:54:04'),
(2, 'Rasio Modal Sendiri dengan Aktiva Tetap', '<', 2, 1, '2018-11-11 15:00:00', '2019-05-01 14:11:07'),
(3, 'Rasio Aktiva Tetap dengan Hutang Jangka Panjang', '<', 2, 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(4, 'Rasio Total Hutang terhadap Total Aktiva', '<', 2, 1, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(5, 'Rasio Laba Usaha dengan Aktiva Usaha', '<', 2, 2, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(6, 'Perputaran Aktiva Usaha', '<', 2, 2, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(7, 'Rasio Laba Kotor atas Penjualan', '<', 2, 2, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(8, 'Rasio Laba Usaha atas Penjualan', '<', 2, 2, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(9, 'Rasio Laba Bersih atas Penjualan', '<', 2, 2, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(10, 'Rasio Operasi', '<', 2, 2, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(11, 'Rasio Tingkat Pengembalian Investasi', '<', 2, 2, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(12, 'Rasio Tingkat Pengembalian Aset', '<', 2, 2, '2018-11-11 15:00:00', '2018-11-11 15:00:00'),
(26, 'huhjh', '', 0, 2, NULL, '2019-04-25 17:39:11'),
(29, 'test', '', 0, 2, NULL, '2019-04-27 17:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `rasio_has_kriteria`
--

CREATE TABLE `rasio_has_kriteria` (
  `id` int(12) NOT NULL,
  `id_rasio` int(12) NOT NULL,
  `operator` varchar(255) NOT NULL,
  `nilai_batas` double NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rasio_has_kriteria`
--

INSERT INTO `rasio_has_kriteria` (`id`, `id_rasio`, `operator`, `nilai_batas`, `kriteria`, `updated_at`) VALUES
(1, 1, '<', 12, 'sadas', '2019-04-29 07:54:04'),
(12, 29, '>', 1212, 'saadasd', '2019-04-27 17:23:43'),
(13, 2, '<', 2, 'Bagus', '2019-05-01 14:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `rasio_has_pengelompokans`
--

CREATE TABLE `rasio_has_pengelompokans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_rasio` int(10) UNSIGNED DEFAULT NULL,
  `id_kelompok` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rasio_has_pengelompokans`
--

INSERT INTO `rasio_has_pengelompokans` (`id`, `id_rasio`, `id_kelompok`, `created_at`, `updated_at`) VALUES
(3, 26, 1, NULL, '2019-04-25 17:39:11'),
(4, 26, 6, NULL, '2019-04-25 17:39:11'),
(9, 29, 3, NULL, '2019-04-27 17:23:43'),
(10, 29, 5, NULL, '2019-04-27 17:23:43'),
(11, 1, 4, NULL, NULL),
(12, 1, 1, NULL, NULL),
(13, 2, 4, NULL, NULL),
(14, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat_kontraks`
--

CREATE TABLE `surat_kontraks` (
  `id_surat_kontrak` int(10) UNSIGNED NOT NULL,
  `pihak_1` int(10) UNSIGNED NOT NULL,
  `pihak_2` int(10) UNSIGNED NOT NULL,
  `nota_jasa_nomor_bukti` int(10) UNSIGNED NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_visualisasis`
--

CREATE TABLE `tipe_visualisasis` (
  `id_visualisasi` int(10) UNSIGNED NOT NULL,
  `jenis_visualisasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_pegawai` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `kode_pegawai`, `name`, `email`, `email_verified_at`, `username`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Aqshal', 'aqshalfajarputra0226@gmail.com', NULL, 'aqshal', '$2y$10$NcL8IZVxZX319ZyDeWb9eum.9ctsx4MTPUcJ74SfQsAVdyTrRsoga', 'aktif', NULL, '2019-04-24 03:24:59', '2019-04-24 03:24:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akuns`
--
ALTER TABLE `akuns`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `akun_has_pengelompokans`
--
ALTER TABLE `akun_has_pengelompokans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akun_has_pengelompokans_id_akun_foreign` (`id_akun`),
  ADD KEY `akun_has_pengelompokans_id_kelompok_foreign` (`id_kelompok`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id_appointment`),
  ADD KEY `appointments_id_user_foreign` (`id_user`),
  ADD KEY `appointments_id_jenis_komponen_jasa_foreign` (`id_jenis_komponen_jasa`);

--
-- Indexes for table `barang_pendukungs`
--
ALTER TABLE `barang_pendukungs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_pendukungs_id_jenis_komponen_jasa_foreign` (`id_jenis_komponen_jasa`);

--
-- Indexes for table `info_perusahaans`
--
ALTER TABLE `info_perusahaans`
  ADD PRIMARY KEY (`id_info_perusahaan`),
  ADD UNIQUE KEY `info_perusahaans_email_unique` (`email`),
  ADD KEY `info_perusahaans_id_user_foreign` (`id_user`);

--
-- Indexes for table `jenis_komponen_jasas`
--
ALTER TABLE `jenis_komponen_jasas`
  ADD PRIMARY KEY (`id_jenis_komponen_jasa`);

--
-- Indexes for table `jenis_rasios`
--
ALTER TABLE `jenis_rasios`
  ADD PRIMARY KEY (`id_jenis_rasio`),
  ADD KEY `jenis_rasios_master_diagram_foreign` (`master_diagram`);

--
-- Indexes for table `jurnals`
--
ALTER TABLE `jurnals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnals_nota_jasa_nomor_bukti_foreign` (`nota_jasa_nomor_bukti`),
  ADD KEY `jurnals_id_periode_foreign` (`id_periode`);

--
-- Indexes for table `laporan_kontraks`
--
ALTER TABLE `laporan_kontraks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_kontraks_id_surat_kontrak_foreign` (`id_surat_kontrak`),
  ADD KEY `laporan_kontraks_id_periode_foreign` (`id_periode`);

--
-- Indexes for table `master_diagrams`
--
ALTER TABLE `master_diagrams`
  ADD PRIMARY KEY (`id_master_diagram`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota_jasas`
--
ALTER TABLE `nota_jasas`
  ADD PRIMARY KEY (`nomor_bukti`),
  ADD KEY `nota_jasas_id_user_foreign` (`id_user`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`nomor_pembayaran`),
  ADD KEY `pembayarans_id_user_foreign` (`id_user`);

--
-- Indexes for table `pembayaran_jasas`
--
ALTER TABLE `pembayaran_jasas`
  ADD KEY `pembayaran_jasas_id_jenis_komponen_jasa_foreign` (`id_jenis_komponen_jasa`),
  ADD KEY `pembayaran_jasas_nomor_pembayaran_foreign` (`nomor_pembayaran`);

--
-- Indexes for table `pengelompokans`
--
ALTER TABLE `pengelompokans`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `periode_has_akuns`
--
ALTER TABLE `periode_has_akuns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periode_has_akuns_id_periode_foreign` (`id_periode`),
  ADD KEY `periode_has_akuns_id_akun_foreign` (`id_akun`);

--
-- Indexes for table `rasios`
--
ALTER TABLE `rasios`
  ADD PRIMARY KEY (`id_rasio`),
  ADD KEY `rasios_jenis_rasio_foreign` (`jenis_rasio`);

--
-- Indexes for table `rasio_has_kriteria`
--
ALTER TABLE `rasio_has_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rasio_has_pengelompokans`
--
ALTER TABLE `rasio_has_pengelompokans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rasio_has_pengelompokans_id_rasio_foreign` (`id_rasio`),
  ADD KEY `rasio_has_pengelompokans_id_kelompok_foreign` (`id_kelompok`);

--
-- Indexes for table `surat_kontraks`
--
ALTER TABLE `surat_kontraks`
  ADD PRIMARY KEY (`id_surat_kontrak`),
  ADD KEY `surat_kontraks_pihak_1_foreign` (`pihak_1`),
  ADD KEY `surat_kontraks_pihak_2_foreign` (`pihak_2`),
  ADD KEY `surat_kontraks_nota_jasa_nomor_bukti_foreign` (`nota_jasa_nomor_bukti`);

--
-- Indexes for table `tipe_visualisasis`
--
ALTER TABLE `tipe_visualisasis`
  ADD PRIMARY KEY (`id_visualisasi`);

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
-- AUTO_INCREMENT for table `akuns`
--
ALTER TABLE `akuns`
  MODIFY `id_akun` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=510;
--
-- AUTO_INCREMENT for table `akun_has_pengelompokans`
--
ALTER TABLE `akun_has_pengelompokans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id_appointment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barang_pendukungs`
--
ALTER TABLE `barang_pendukungs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `info_perusahaans`
--
ALTER TABLE `info_perusahaans`
  MODIFY `id_info_perusahaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis_komponen_jasas`
--
ALTER TABLE `jenis_komponen_jasas`
  MODIFY `id_jenis_komponen_jasa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis_rasios`
--
ALTER TABLE `jenis_rasios`
  MODIFY `id_jenis_rasio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jurnals`
--
ALTER TABLE `jurnals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laporan_kontraks`
--
ALTER TABLE `laporan_kontraks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_diagrams`
--
ALTER TABLE `master_diagrams`
  MODIFY `id_master_diagram` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `nota_jasas`
--
ALTER TABLE `nota_jasas`
  MODIFY `nomor_bukti` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `nomor_pembayaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengelompokans`
--
ALTER TABLE `pengelompokans`
  MODIFY `id_kelompok` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id_periode` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `periode_has_akuns`
--
ALTER TABLE `periode_has_akuns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rasios`
--
ALTER TABLE `rasios`
  MODIFY `id_rasio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `rasio_has_kriteria`
--
ALTER TABLE `rasio_has_kriteria`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rasio_has_pengelompokans`
--
ALTER TABLE `rasio_has_pengelompokans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `surat_kontraks`
--
ALTER TABLE `surat_kontraks`
  MODIFY `id_surat_kontrak` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipe_visualisasis`
--
ALTER TABLE `tipe_visualisasis`
  MODIFY `id_visualisasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun_has_pengelompokans`
--
ALTER TABLE `akun_has_pengelompokans`
  ADD CONSTRAINT `akun_has_pengelompokans_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akuns` (`id_akun`) ON DELETE CASCADE,
  ADD CONSTRAINT `akun_has_pengelompokans_id_kelompok_foreign` FOREIGN KEY (`id_kelompok`) REFERENCES `pengelompokans` (`id_kelompok`) ON DELETE CASCADE;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_id_jenis_komponen_jasa_foreign` FOREIGN KEY (`id_jenis_komponen_jasa`) REFERENCES `jenis_komponen_jasas` (`id_jenis_komponen_jasa`),
  ADD CONSTRAINT `appointments_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `barang_pendukungs`
--
ALTER TABLE `barang_pendukungs`
  ADD CONSTRAINT `barang_pendukungs_id_jenis_komponen_jasa_foreign` FOREIGN KEY (`id_jenis_komponen_jasa`) REFERENCES `jenis_komponen_jasas` (`id_jenis_komponen_jasa`);

--
-- Constraints for table `info_perusahaans`
--
ALTER TABLE `info_perusahaans`
  ADD CONSTRAINT `info_perusahaans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `jenis_rasios`
--
ALTER TABLE `jenis_rasios`
  ADD CONSTRAINT `jenis_rasios_master_diagram_foreign` FOREIGN KEY (`master_diagram`) REFERENCES `master_diagrams` (`id_master_diagram`) ON DELETE CASCADE;

--
-- Constraints for table `jurnals`
--
ALTER TABLE `jurnals`
  ADD CONSTRAINT `jurnals_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periodes` (`id_periode`),
  ADD CONSTRAINT `jurnals_nota_jasa_nomor_bukti_foreign` FOREIGN KEY (`nota_jasa_nomor_bukti`) REFERENCES `nota_jasas` (`nomor_bukti`);

--
-- Constraints for table `laporan_kontraks`
--
ALTER TABLE `laporan_kontraks`
  ADD CONSTRAINT `laporan_kontraks_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periodes` (`id_periode`),
  ADD CONSTRAINT `laporan_kontraks_id_surat_kontrak_foreign` FOREIGN KEY (`id_surat_kontrak`) REFERENCES `surat_kontraks` (`id_surat_kontrak`);

--
-- Constraints for table `nota_jasas`
--
ALTER TABLE `nota_jasas`
  ADD CONSTRAINT `nota_jasas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `pembayaran_jasas`
--
ALTER TABLE `pembayaran_jasas`
  ADD CONSTRAINT `pembayaran_jasas_id_jenis_komponen_jasa_foreign` FOREIGN KEY (`id_jenis_komponen_jasa`) REFERENCES `jenis_komponen_jasas` (`id_jenis_komponen_jasa`),
  ADD CONSTRAINT `pembayaran_jasas_nomor_pembayaran_foreign` FOREIGN KEY (`nomor_pembayaran`) REFERENCES `pembayarans` (`nomor_pembayaran`);

--
-- Constraints for table `periode_has_akuns`
--
ALTER TABLE `periode_has_akuns`
  ADD CONSTRAINT `periode_has_akuns_id_akun_foreign` FOREIGN KEY (`id_akun`) REFERENCES `akuns` (`id_akun`),
  ADD CONSTRAINT `periode_has_akuns_id_periode_foreign` FOREIGN KEY (`id_periode`) REFERENCES `periodes` (`id_periode`);

--
-- Constraints for table `rasios`
--
ALTER TABLE `rasios`
  ADD CONSTRAINT `rasios_jenis_rasio_foreign` FOREIGN KEY (`jenis_rasio`) REFERENCES `jenis_rasios` (`id_jenis_rasio`) ON DELETE CASCADE;

--
-- Constraints for table `rasio_has_pengelompokans`
--
ALTER TABLE `rasio_has_pengelompokans`
  ADD CONSTRAINT `rasio_has_pengelompokans_id_kelompok_foreign` FOREIGN KEY (`id_kelompok`) REFERENCES `pengelompokans` (`id_kelompok`) ON DELETE CASCADE,
  ADD CONSTRAINT `rasio_has_pengelompokans_id_rasio_foreign` FOREIGN KEY (`id_rasio`) REFERENCES `rasios` (`id_rasio`) ON DELETE CASCADE;

--
-- Constraints for table `surat_kontraks`
--
ALTER TABLE `surat_kontraks`
  ADD CONSTRAINT `surat_kontraks_nota_jasa_nomor_bukti_foreign` FOREIGN KEY (`nota_jasa_nomor_bukti`) REFERENCES `nota_jasas` (`nomor_bukti`),
  ADD CONSTRAINT `surat_kontraks_pihak_1_foreign` FOREIGN KEY (`pihak_1`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `surat_kontraks_pihak_2_foreign` FOREIGN KEY (`pihak_2`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
