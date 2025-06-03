-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2025 at 12:49 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda_files`
--

CREATE TABLE `agenda_files` (
  `id` int NOT NULL,
  `agenda_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `filename` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `agenda_files`
--

INSERT INTO `agenda_files` (`id`, `agenda_id`, `name`, `filename`) VALUES
(4, 3, 'doc-db.jpeg', '1748865727_bb87c0db2131afcdcc71.jpeg'),
(5, 4, 'contoh-doc.jpeg', '1748873651_273137c408c1c07c345e.jpeg'),
(6, 6, 'test-db.jpeg', '1748873897_26a114db7cc64872987e.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `asset_types`
--

CREATE TABLE `asset_types` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `asset_types`
--

INSERT INTO `asset_types` (`id`, `name`) VALUES
(1, 'Tanah'),
(2, 'Bangunan'),
(3, 'Tanah & Bangunan'),
(4, 'Gedung Bertingkat'),
(5, 'Rumah Negara'),
(6, 'Aset Properti Komersial'),
(7, 'Kendaraan Bermotor'),
(8, 'Inventaris Kantor'),
(9, 'Aset Tak Berwujud (misal hak cipta, hak sewa, atau lisensi)'),
(10, 'Infrastruktur (jalan, jembatan, saluran, dsb)'),
(11, 'Aset Produktif (seperti hotel, SPBU, ruko yang disewakan)'),
(12, 'Aset Tidak Bergerak Lainnya'),
(13, 'Aset Bergerak Lainnya'),
(14, 'Aset Sengketa');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int NOT NULL,
  `case_number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `case_type_id` int DEFAULT NULL,
  `province_id` int DEFAULT NULL,
  `court_id` int DEFAULT NULL,
  `court_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `case_date` date DEFAULT NULL,
  `case_description` text,
  `case_subject_id` int DEFAULT NULL,
  `case_summary` text,
  `compensation_claim` tinyint(1) DEFAULT '0',
  `pic` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `case_number`, `case_type_id`, `province_id`, `court_id`, `court_name`, `case_date`, `case_description`, `case_subject_id`, `case_summary`, `compensation_claim`, `pic`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, '78/Pdt.G/2025/PN.Sby', 3, 16, 1, 'PN Surabaya', '2025-05-08', 'Sengketa Kepemilikian Aset Kelolaan LMAN yang terletak di jalan Basuki Rahmat No.49-51, Kel. Embong Kaliasin, Kec. Genteng Kota Surabaya', 1, 'Sengketa Kepemilikian Aset Kelolaan LMAN yang terletak di jalan Basuki Rahmat No.49-51, Kel. Embong Kaliasin, Kec. Genteng Kota Surabaya\n\nGugatan diajukan oleh PT. Hotel Embong Woengoe yang diwakili oleh Harijanto Gondokusumo Dirut yang dikuasakan kepada Office  Akhmad Zaini & Partners', 1, 2, '2025-05-07 18:06:04', '2025-05-12 17:59:15', NULL),
(14, '80/Pdt.G/2025/PN.Sby', 3, 16, 1, 'PN Surabaya', '2025-05-09', 'Sengketa Kepemilikian Aset Kelolaan LMAN yang terletak di jalan Basuki Rahmat No.49-51, Kel. Embong Kaliasin, Kec. Genteng Kota Surabaya', 2, 'Sengketa Kepemilikian Aset Kelolaan LMAN yang terletak di jalan Basuki Rahmat No.49-51, Kel. Embong Kaliasin, Kec. Genteng Kota Surabaya\n\nGugatan diajukan oleh PT. Hotel Embong Woengoe yang diwakili oleh Harijanto Gondokusumo Dirut yang dikuasakan kepada Office  Akhmad Zaini & Partners', 1, 2, '2025-05-09 15:44:37', '2025-05-09 15:44:37', NULL),
(15, 'PK-25/05/11/PN.025', 1, 16, 1, 'PN Surabaya', '2025-05-11', '-', 1, '-', 0, 2, '2025-05-10 18:45:34', '2025-05-10 18:45:34', NULL),
(16, '81/Pdt.G/2025/PN.Sby', 2, 16, 1, 'PN Surabaya', '2025-05-11', '-', 2, '-', 0, 2, '2025-05-10 18:50:49', '2025-05-10 18:50:49', NULL),
(17, '82/Pdt.G/2025/PN.Sby', 4, 16, 1, 'PN Surabaya', '2025-05-15', '-', 1, '-', 0, 2, '2025-05-10 18:52:48', '2025-05-10 18:52:48', NULL),
(19, '1', 1, 1, 1, 'PN Surabaya', '2025-06-02', '-', 1, '-', 0, 2, '2025-06-02 14:55:31', '2025-06-02 14:55:31', NULL),
(20, '2', 2, 11, NULL, 'PN Jakarta', '2025-06-03', '-', 2, '-', 0, 2, '2025-06-02 15:06:04', '2025-06-02 15:06:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `case_agendas`
--

CREATE TABLE `case_agendas` (
  `id` int NOT NULL,
  `case_id` int NOT NULL,
  `position_id` int NOT NULL,
  `level` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `officer` varchar(100) DEFAULT NULL,
  `outcome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `case_agendas`
--

INSERT INTO `case_agendas` (`id`, `case_id`, `position_id`, `level`, `date`, `officer`, `outcome`) VALUES
(3, 10, 1, 'PN', '2025-06-02', 'Hakim', '-'),
(4, 10, 2, 'PN', '2025-06-03', 'Pengawas', '-'),
(6, 10, 8, 'PN', '2025-06-05', 'Agus', '-');

-- --------------------------------------------------------

--
-- Table structure for table `case_claims`
--

CREATE TABLE `case_claims` (
  `id` int NOT NULL,
  `case_id` int NOT NULL,
  `currency_id` int NOT NULL,
  `amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `case_claims`
--

INSERT INTO `case_claims` (`id`, `case_id`, `currency_id`, `amount`) VALUES
(1, 14, 1, 50000000),
(2, 14, 1, 10000000),
(6, 10, 1, 20000000);

-- --------------------------------------------------------

--
-- Table structure for table `case_data`
--

CREATE TABLE `case_data` (
  `id` int NOT NULL,
  `case_id` int NOT NULL,
  `asset_type` varchar(100) DEFAULT NULL,
  `asset_location` varchar(255) DEFAULT NULL,
  `asset_owner` varchar(100) DEFAULT NULL,
  `ownership_proof` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `case_data`
--

INSERT INTO `case_data` (`id`, `case_id`, `asset_type`, `asset_location`, `asset_owner`, `ownership_proof`) VALUES
(6, 10, 'Bangunan', 'Surabaya', 'Pemilik', 'Surat Izin Bangunan');

-- --------------------------------------------------------

--
-- Table structure for table `case_objects`
--

CREATE TABLE `case_objects` (
  `id` int NOT NULL,
  `case_id` int NOT NULL,
  `asset_type_id` int DEFAULT NULL,
  `area` int DEFAULT NULL,
  `doc_type_id` int DEFAULT NULL,
  `owner` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `summary` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `case_objects`
--

INSERT INTO `case_objects` (`id`, `case_id`, `asset_type_id`, `area`, `doc_type_id`, `owner`, `location`, `summary`) VALUES
(5, 10, 1, 125, 1, 'Makelar', 'Surabaya', '-');

-- --------------------------------------------------------

--
-- Table structure for table `case_parties`
--

CREATE TABLE `case_parties` (
  `id` int NOT NULL,
  `case_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `unit_id` int DEFAULT NULL,
  `position` enum('Penggugat','Tergugat','Saksi','') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` text,
  `order` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `case_parties`
--

INSERT INTO `case_parties` (`id`, `case_id`, `name`, `unit_id`, `position`, `address`, `order`) VALUES
(3, 10, 'Pihak 1', 1, 'Penggugat', '-', 1),
(4, 10, 'Pihak 2', 1, 'Tergugat', '-', 2);

-- --------------------------------------------------------

--
-- Table structure for table `case_positions`
--

CREATE TABLE `case_positions` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `case_positions`
--

INSERT INTO `case_positions` (`id`, `name`) VALUES
(1, 'Panggilan Awal'),
(2, 'Pemeriksaan Para Pihak'),
(3, 'Mediasi'),
(4, 'Pembacaan Gugatan'),
(5, 'Jawaban'),
(6, 'Putusan Sela'),
(7, 'Replik'),
(8, 'Duplik'),
(9, 'Bukti Penggugat / Bukti Tergugat'),
(10, 'Saksi Penggugat');

-- --------------------------------------------------------

--
-- Table structure for table `case_subjects`
--

CREATE TABLE `case_subjects` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `case_subjects`
--

INSERT INTO `case_subjects` (`id`, `name`) VALUES
(1, 'PSN (Proyek Strategis Negara)'),
(2, 'Aset');

-- --------------------------------------------------------

--
-- Table structure for table `case_types`
--

CREATE TABLE `case_types` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `case_types`
--

INSERT INTO `case_types` (`id`, `name`) VALUES
(1, 'Badan Arbitrase'),
(2, 'Syariah'),
(3, 'Perdata'),
(4, 'TUN'),
(5, 'Niaga'),
(6, 'PHI'),
(7, 'Komisi Informasi'),
(8, 'Pengadilan Agama (PA)');

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE `courts` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`id`, `name`) VALUES
(1, 'PN Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int NOT NULL,
  `code` varchar(3) NOT NULL,
  `symbol` varchar(3) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `symbol`, `name`) VALUES
(1, 'IDR', 'Rp', 'Rupiah (IDR)'),
(2, 'USD', '$', 'Dolar Amerika Serikat (USD)');

-- --------------------------------------------------------

--
-- Table structure for table `doc_types`
--

CREATE TABLE `doc_types` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doc_types`
--

INSERT INTO `doc_types` (`id`, `name`) VALUES
(1, 'SHM'),
(2, 'SHGB'),
(3, 'SHGU'),
(4, 'AJB'),
(5, 'SPPT'),
(6, 'Girik'),
(7, 'Sertifikat atas Nama Pihak Ketiga'),
(8, 'Sertifikat atas Nama Instansi Pemerintah Lain'),
(9, 'Sertifikat dalam Sengketa Hukum'),
(10, 'Sudah Terdaftar di BMN/DJA DJKN'),
(11, 'Belum Terdaftar di BMN'),
(12, 'Belum Bersertifikat'),
(13, 'Sertifikat Hilang / Duplikat / Rusak / Tidak Lengkap');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-05-05-155811', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1746461558, 1);

-- --------------------------------------------------------

--
-- Table structure for table `party_units`
--

CREATE TABLE `party_units` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `party_units`
--

INSERT INTO `party_units` (`id`, `name`) VALUES
(1, 'Eksternal'),
(2, 'Kantor Pusat DJKN'),
(3, 'Kantor Wilayah DJKN'),
(4, 'KPKNL (Kantor Pelayanan Kekayaan Negara dan Lelang)'),
(5, 'Satuan Kerja Kementerian/Lembaga'),
(6, 'Unit Eselon I Kemenkeu'),
(7, 'Unit Regional/Perwakilan Instansi Pemerintah');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(1, 'Aceh'),
(2, 'Sumatera Utara'),
(3, 'Sumatera Barat'),
(4, 'Riau'),
(5, 'Kepulauan Riau'),
(6, 'Jambi'),
(7, 'Sumatera Selatan'),
(8, 'Bangka Belitung'),
(9, 'Bengkulu'),
(10, 'Lampung'),
(11, 'DKI Jakarta'),
(12, 'Banten'),
(13, 'Jawa Barat'),
(14, 'Jawa Tengah'),
(15, 'DI Yogyakarta'),
(16, 'Jawa Timur'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Tengah'),
(22, 'Kalimantan Selatan'),
(23, 'Kalimantan Timur'),
(24, 'Kalimantan Utara'),
(25, 'Sulawesi Utara'),
(26, 'Gorontalo'),
(27, 'Sulawesi Tengah'),
(28, 'Sulawesi Barat'),
(29, 'Sulawesi Selatan'),
(30, 'Sulawesi Tenggara'),
(31, 'Maluku'),
(32, 'Maluku Utara'),
(33, 'Papua'),
(34, 'Papua Barat');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','operator') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'operator',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin', '$2y$12$q5kFpCgi69k4Adxt0FcHB..NKkIDxwS/ukW6pe.54ibU0aub2IVo.', 'admin', '2025-05-05 16:14:40', NULL, NULL),
(2, 'Operator', 'operator', '$2y$12$qAo1ZrT2znXjf5QfctJzaOcC.U9uGvCoDIJ3Ivo.B3E8Ijb66tRx.', 'operator', '2025-05-05 16:14:40', '2025-05-18 07:40:33', NULL),
(3, NULL, 'op', '$2y$12$8mRxi40O5zyYhw/u0r34ueYjhzObZ.JZCT3mMVXenUFMCLJ5MI8ku', 'operator', '2025-05-15 15:57:52', '2025-05-15 15:57:52', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda_files`
--
ALTER TABLE `agenda_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_types`
--
ALTER TABLE `asset_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_agendas`
--
ALTER TABLE `case_agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_claims`
--
ALTER TABLE `case_claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_data`
--
ALTER TABLE `case_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_objects`
--
ALTER TABLE `case_objects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_parties`
--
ALTER TABLE `case_parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_positions`
--
ALTER TABLE `case_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_subjects`
--
ALTER TABLE `case_subjects`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `case_types`
--
ALTER TABLE `case_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_types`
--
ALTER TABLE `doc_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_units`
--
ALTER TABLE `party_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda_files`
--
ALTER TABLE `agenda_files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `asset_types`
--
ALTER TABLE `asset_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `case_agendas`
--
ALTER TABLE `case_agendas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `case_claims`
--
ALTER TABLE `case_claims`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `case_data`
--
ALTER TABLE `case_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `case_objects`
--
ALTER TABLE `case_objects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `case_parties`
--
ALTER TABLE `case_parties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `case_positions`
--
ALTER TABLE `case_positions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `case_subjects`
--
ALTER TABLE `case_subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `case_types`
--
ALTER TABLE `case_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courts`
--
ALTER TABLE `courts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doc_types`
--
ALTER TABLE `doc_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `party_units`
--
ALTER TABLE `party_units`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
