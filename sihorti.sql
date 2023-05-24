-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2023 at 03:23 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sihorti`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int NOT NULL,
  `id_level` int NOT NULL,
  `id_pegawai` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `id_level`, `id_pegawai`, `nama`, `nip`, `foto`, `username`, `password`) VALUES
(1, 1, 1, 'Haywood Mertinab', '804962809', '', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 2, 3, 'Korella Playle', '9286397968', '', 'korella', 'f2223e647a4e3f96b4d176befaa3ece5'),
(3, 3, 4, 'Caitrin Brotherwood', '9559118013', '', 'caitrin', '1bb5247f2775346c8a9f6c8e2f0a3bef'),
(4, 4, 5, 'Colly Ilyushkin', '4902803917', '', 'colly', '186533be596c4016bec487d98a6ed213');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` int NOT NULL,
  `harga_produsen` int NOT NULL,
  `harga_grosir` int NOT NULL,
  `harga_eceran` int NOT NULL,
  `id_komoditas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `harga_produsen`, `harga_grosir`, `harga_eceran`, `id_komoditas`) VALUES
(2, 18000, 20000, 25000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `harga_mingguan`
--

CREATE TABLE `harga_mingguan` (
  `id_harga_mingguan` int NOT NULL,
  `id_kategori` int NOT NULL,
  `id_komoditas` int NOT NULL,
  `id_harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Sayur');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `marker` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama`, `latitude`, `longitude`, `marker`) VALUES
(630102, 'Binuang', '-3.1169048570257702', '115.05106482230144', 'binuang.png'),
(630502, 'Tapin Selatan', '-2.987462607985986', '115.14716915958073', ''),
(630503, 'Tapin Tengah', '-2.8937764133820156', '115.0538061946745', ''),
(630504, 'Tapin Utara', '-2.910867392627011', '115.15082188683336', ''),
(630505, 'Candi Laras Selatan', '-2.8501805686926556', '115.00244295315545', ''),
(630506, 'Candi Laras Utara', '-2.8501805686926556', '115.00244295315545', ''),
(630507, 'Bakarangan', '-2.900793716383624', '115.11981164010216', ''),
(630508, 'Piani', '-2.959176027887351', '115.27795636250369', ''),
(630509, 'Bungur', '-2.972385949735965', '115.14653084898667', ''),
(630510, 'Lokpaikat', '-2.926218178389669', '115.17739219167134', ''),
(630511, 'Salam Babaris', '-3.078176278942407', '115.17842241263631', ''),
(630512, 'Hatungun', '-3.1344668589106837', '115.20728517934917', '');

-- --------------------------------------------------------

--
-- Table structure for table `komoditas`
--

CREATE TABLE `komoditas` (
  `id_komoditas` int NOT NULL,
  `id_kategori` int NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komoditas`
--

INSERT INTO `komoditas` (`id_komoditas`, `id_kategori`, `kode`, `nama`) VALUES
(1, 1, '69256298', 'pisanga');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'Admin'),
(2, 'Kepala Dinas'),
(3, 'Kepala Bidang'),
(4, 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_komoditas`
--

CREATE TABLE `lokasi_komoditas` (
  `id_lokasi` int NOT NULL,
  `id_kecamatan` int NOT NULL,
  `id_komoditas` int NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lokasi_komoditas`
--

INSERT INTO `lokasi_komoditas` (`id_lokasi`, `id_kecamatan`, `id_komoditas`, `latitude`, `longitude`) VALUES
(2, 630102, 1, '-3.03699015885687', '115.07607379366448');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int NOT NULL,
  `nama_pegawai` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nip_pegawai` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip_pegawai`, `tanggal_lahir`, `tempat_lahir`, `foto`, `jenis_kelamin`) VALUES
(1, 'Haywood Mertinab', '804962809', '2022-04-06', 'General Pinedo', '', 'pria'),
(2, 'Haywood Mertina12', '12312457689708', '2023-04-07', 'Karawaci', '', 'pria'),
(3, 'Korella Playle', '9286397968	', '2023-04-20', 'Ravne na Koroškem', NULL, 'wanita\r\n'),
(4, 'Caitrin Brotherwood', '9559118013', '2023-04-22', 'High River', NULL, 'wanita'),
(5, 'Colly Ilyushkin', '4902803917', '2023-04-30', 'Alcaria', NULL, 'pria');

-- --------------------------------------------------------

--
-- Table structure for table `rekapitulasi`
--

CREATE TABLE `rekapitulasi` (
  `id_rekapitulasi` int NOT NULL,
  `kode` int NOT NULL,
  `id_komoditas` int NOT NULL,
  `hasil_produksi` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `luas_tanaman` int NOT NULL,
  `luas_panen_habis` int NOT NULL,
  `luas_panen_sisa` int NOT NULL,
  `luas_rusak` int NOT NULL,
  `luas_tambah_tanam` int NOT NULL,
  `luas_laporan` int NOT NULL,
  `produksi_habis` int NOT NULL,
  `produksi_sisa` int NOT NULL,
  `harga_jual` int NOT NULL,
  `keterangan` int NOT NULL,
  `id_kategori` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekapitulasi`
--

INSERT INTO `rekapitulasi` (`id_rekapitulasi`, `kode`, `id_komoditas`, `hasil_produksi`, `luas_tanaman`, `luas_panen_habis`, `luas_panen_sisa`, `luas_rusak`, `luas_tambah_tanam`, `luas_laporan`, `produksi_habis`, `produksi_sisa`, `harga_jual`, `keterangan`, `id_kategori`) VALUES
(3, 10221, 1, 'jifwfjwjfa', 642649239, 2147483647, 295729, 462934792, 46293492, 4, 7014701, 4698892, 47827320, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`),
  ADD KEY `fk_harga_komoditas` (`id_komoditas`);

--
-- Indexes for table `harga_mingguan`
--
ALTER TABLE `harga_mingguan`
  ADD PRIMARY KEY (`id_harga_mingguan`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_komoditas` (`id_komoditas`),
  ADD KEY `id_harga` (`id_harga`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `komoditas`
--
ALTER TABLE `komoditas`
  ADD PRIMARY KEY (`id_komoditas`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `lokasi_komoditas`
--
ALTER TABLE `lokasi_komoditas`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_komoditas` (`id_komoditas`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  ADD PRIMARY KEY (`id_rekapitulasi`),
  ADD KEY `id_komoditas` (`id_komoditas`),
  ADD KEY `fk_id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `harga_mingguan`
--
ALTER TABLE `harga_mingguan`
  MODIFY `id_harga_mingguan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komoditas`
--
ALTER TABLE `komoditas`
  MODIFY `id_komoditas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lokasi_komoditas`
--
ALTER TABLE `lokasi_komoditas`
  MODIFY `id_lokasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  MODIFY `id_rekapitulasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `akun_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `harga`
--
ALTER TABLE `harga`
  ADD CONSTRAINT `fk_harga_komoditas` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id_komoditas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `harga_mingguan`
--
ALTER TABLE `harga_mingguan`
  ADD CONSTRAINT `harga_mingguan_ibfk_1` FOREIGN KEY (`id_harga`) REFERENCES `harga` (`id_harga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `harga_mingguan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `harga_mingguan_ibfk_3` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id_komoditas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komoditas`
--
ALTER TABLE `komoditas`
  ADD CONSTRAINT `komoditas_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lokasi_komoditas`
--
ALTER TABLE `lokasi_komoditas`
  ADD CONSTRAINT `lokasi_komoditas_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lokasi_komoditas_ibfk_2` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id_komoditas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekapitulasi`
--
ALTER TABLE `rekapitulasi`
  ADD CONSTRAINT `fk_id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekapitulasi_ibfk_1` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id_komoditas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
