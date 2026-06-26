-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2026 at 02:21 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_trpl1a_fabianadilarevianza`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mahasiswa`
--

CREATE TABLE `tabel_mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `semester` int NOT NULL,
  `tarif_ukt_nominal` decimal(12,2) NOT NULL,
  `jenis_pembiayaan` enum('Mandiri','Bidikmisi','Prestasi') NOT NULL,
  `golongan_ukt` varchar(10) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `nomor_kip_kuliah` varchar(50) DEFAULT NULL,
  `dana_saku_subsidi` decimal(12,2) DEFAULT NULL,
  `nama_instansi_beasiswa` varchar(100) DEFAULT NULL,
  `minimal_ipk_syarat` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_mahasiswa`
--

INSERT INTO `tabel_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `semester`, `tarif_ukt_nominal`, `jenis_pembiayaan`, `golongan_ukt`, `nama_wali`, `nomor_kip_kuliah`, `dana_saku_subsidi`, `nama_instansi_beasiswa`, `minimal_ipk_syarat`) VALUES
(1, 'Rian Hidayat', '12321001', 3, 7500000.00, 'Mandiri', 'Golongan 5', 'Budi Hidayat', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', '12321002', 5, 6000000.00, 'Mandiri', 'Golongan 4', 'Ahmad Subarjo', NULL, NULL, NULL, NULL),
(3, 'Fajar Nugroho', '12321003', 1, 9000000.00, 'Mandiri', 'Golongan 6', 'Hendra Nugroho', NULL, NULL, NULL, NULL),
(4, 'Dinda Lestari', '12321004', 3, 6000000.00, 'Mandiri', 'Golongan 4', 'Eko Prasetyo', NULL, NULL, NULL, NULL),
(5, 'Aris Munandar', '12321005', 7, 4500000.00, 'Mandiri', 'Golongan 3', 'Supardi', NULL, NULL, NULL, NULL),
(6, 'Budi Santoso', '12321006', 5, 7500000.00, 'Mandiri', 'Golongan 5', 'Mulyono', NULL, NULL, NULL, NULL),
(7, 'Fitriani', '12321007', 1, 6000000.00, 'Mandiri', 'Golongan 4', 'Anwar', NULL, NULL, NULL, NULL),
(8, 'Andi Wijaya', '12321008', 1, 0.00, 'Bidikmisi', NULL, NULL, 'KIPK-2026-9901', 950000.00, NULL, NULL),
(9, 'Citra Dewi', '12321009', 3, 0.00, 'Bidikmisi', NULL, NULL, 'KIPK-2025-4412', 950000.00, NULL, NULL),
(10, 'Gilang Ramadhan', '12321010', 5, 0.00, 'Bidikmisi', NULL, NULL, 'KIPK-2024-1123', 950000.00, NULL, NULL),
(11, 'Hesti Purwanti', '12321011', 3, 0.00, 'Bidikmisi', NULL, NULL, 'KIPK-2025-8831', 950000.00, NULL, NULL),
(12, 'Irfan Hakim', '12321012', 7, 0.00, 'Bidikmisi', NULL, NULL, 'KIPK-2023-0054', 1000000.00, NULL, NULL),
(13, 'Joko Widodo', '12321013', 1, 0.00, 'Bidikmisi', NULL, NULL, 'KIPK-2026-3341', 950000.00, NULL, NULL),
(14, 'Kartika Putri', '12321014', 5, 0.00, 'Bidikmisi', NULL, NULL, 'KIPK-2024-7762', 950000.00, NULL, NULL),
(15, 'Eko Prasetyo', '12321015', 5, 2000000.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', 3.50),
(16, 'Dewi Sartika', '12321016', 7, 0.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Unggulan', 3.75),
(17, 'Laksana Tri', '12321017', 3, 1500000.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Beasiswa BI (Bank Indonesia)', 3.25),
(18, 'Mega Utami', '12321018', 5, 0.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Tanoto Foundation', 3.60),
(19, 'Naufal Abdi', '12321019', 1, 2500000.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Pemprov', 3.00),
(20, 'Putri Rahayu', '12321020', 3, 0.00, 'Prestasi', NULL, NULL, NULL, NULL, 'Beasiswa BCA Finance', 3.50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
