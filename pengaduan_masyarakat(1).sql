-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 08:58 AM
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
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(17) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('012', 'Muhammad Dicky', 'Dicky', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0898'),
('1234', 'Muhammad Dicky', 'dicky', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `Tgl_pengaduan` date DEFAULT NULL,
  `nik` char(17) DEFAULT NULL,
  `isi_laporan` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('Belum Ada Tanggapan','proses','selesai','ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `Tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(78, '2024-10-04', '012', 'ada biawak masuk rumah', '86230126_p5.jpg', 'selesai'),
(79, '2024-10-04', '012', 'ada ular', 'Print2.jpg', 'selesai'),
(80, '2024-10-04', '012', 'ada monyet', 'question-sign.png', 'ditolak'),
(81, '2024-10-04', '012', 'banjir di jalan sunggal', 'pexels-superphoto-9554335.jpg', 'selesai'),
(83, '2024-10-08', '1234', 'AMAKAKAKAKAK', 'Logo-Minuman.png', 'Belum Ada Tanggapan');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `level` enum('petugas','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(3, 'dicky', '123', '123', '123', 'admin'),
(4, 'dapok', '1234', '1234', '1234', 'petugas'),
(9, 'dicky', 'diky', '123', '123', 'admin'),
(10, 'dapok', 'dapo', '1234', '1234', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) DEFAULT NULL,
  `Tgl_tanggapan` date DEFAULT NULL,
  `tanggapan` text DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `Tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(35, 20, '2024-09-13', 'halo - Status: proses', NULL),
(36, 20, '2024-09-13', 'selesai', NULL),
(37, 21, '2024-09-13', 'hahahahahaha - Status: proses', NULL),
(38, 21, '2024-09-13', 'selesai', NULL),
(39, 22, '2024-09-13', '1111 - Status: proses', NULL),
(40, 22, '2024-09-13', 'selesai', NULL),
(41, 23, '2024-09-13', 'shessh - Status: proses', NULL),
(42, 24, '2024-09-13', 'aamamama - Status: proses', NULL),
(43, 25, '2024-09-13', 'akaka - Status: proses', NULL),
(44, 25, '2024-09-13', 'selesai', NULL),
(45, 26, '2024-09-13', 'paddd - Status: proses', NULL),
(46, 26, '2024-09-13', 'selesai', NULL),
(47, 26, '2024-09-13', 'selesai', NULL),
(48, 26, '2024-09-13', 'selesai', NULL),
(49, 27, '2024-09-13', 'www - Status: proses', NULL),
(50, 27, '2024-09-13', 'selesai', NULL),
(51, 28, '2024-09-13', 'ses - Status: proses', NULL),
(52, 28, '2024-09-13', 'selesai', NULL),
(53, 31, '2024-09-30', 'wwwwww - Status: proses', NULL),
(54, 31, '2024-09-30', 'selesai', NULL),
(55, 32, '2024-09-30', 'hahahahha - Status: proses', NULL),
(56, 32, '2024-09-30', 'selesai', NULL),
(57, 34, '2024-09-30', 'sudah kami tindak lanjuti - Status: proses', NULL),
(58, 35, '2024-09-30', 'hhhhhh - Status: proses', NULL),
(59, 36, '2024-09-30', 'selesai', NULL),
(60, 37, '2024-09-30', 'bodoh - Status: proses', NULL),
(61, 38, '2024-09-30', '23333 - Status: proses', NULL),
(62, 39, '2024-09-30', 'apalah - Status: proses', NULL),
(63, 40, '2024-09-30', 'meh - Status: proses', NULL),
(64, 41, '2024-09-30', 'selesai', NULL),
(65, 42, '2024-09-30', 'aadadadad - Status: proses', NULL),
(66, 43, '2024-09-30', 'selesai', NULL),
(67, 44, '2024-09-30', 'selesai', NULL),
(68, 45, '2024-09-30', 'selesai', NULL),
(69, 46, '2024-09-30', 'selesai', NULL),
(70, 47, '2024-09-30', '47', NULL),
(71, 48, '2024-09-30', '', NULL),
(72, 49, '2024-09-30', 'tanggapan', NULL),
(73, 50, '2024-09-30', '', NULL),
(74, 51, '2024-09-30', '', NULL),
(75, 52, '2024-09-30', 'wow - Status: proses', NULL),
(76, 53, '2024-09-30', 'okey - Status: proses', NULL),
(77, 54, '2024-09-30', '', NULL),
(78, 55, '2024-09-30', '', NULL),
(79, 56, '2024-09-30', 'tanggapan_laporan', NULL),
(80, 57, '2024-09-30', '', NULL),
(81, 58, '2024-09-30', 'apala - Status: proses', NULL),
(82, 59, '2024-09-30', 'selesai', NULL),
(83, 61, '2024-10-01', 'mantap - Status: proses', NULL),
(84, 62, '2024-10-01', 'selesai', NULL),
(85, 63, '2024-10-01', 'masuk - Status: proses', NULL),
(86, 64, '2024-10-01', 'okey - Status: proses', NULL),
(87, 65, '2024-10-01', ' - Status: selesai', NULL),
(88, 66, '2024-10-01', ' - Status: selesai', NULL),
(89, 67, '2024-10-01', '', NULL),
(90, 68, '2024-10-01', '$', NULL),
(91, 69, '2024-10-01', 'Array - Status: selesai', NULL),
(92, 70, '2024-10-01', ' - Status: selesai', NULL),
(93, 71, '2024-10-01', 'yes - Status: selesai', NULL),
(94, 72, '2024-10-01', 'APACOBA - Status: proses - Status: selesai', NULL),
(95, 73, '2024-10-01', 'uwwe - - Status: selesai', NULL),
(96, 74, '2024-10-04', 'lalabombom - - Status: selesai', NULL),
(97, 75, '2024-10-04', 'waaaa - Status: proses', NULL),
(98, 78, '2024-10-04', 'baik akan kami urus - - Status: selesai', NULL),
(99, 81, '2024-10-04', 'ok - - Status: selesai', NULL),
(100, 79, '2024-10-04', 'ok - - Status: selesai', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`);

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`),
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
