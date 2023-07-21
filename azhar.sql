-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 07:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azhar`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran_antar`
--

CREATE TABLE `detail_pembayaran_antar` (
  `kd_bayar_antar` varchar(15) NOT NULL,
  `id_ktgr_antar` int(5) NOT NULL,
  `harga_item` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pembayaran_antar`
--

INSERT INTO `detail_pembayaran_antar` (`kd_bayar_antar`, `id_ktgr_antar`, `harga_item`) VALUES
('BYRANTR0001', 3, '420000'),
('BYRANTR0002', 3, '420000'),
('BYRANTR0003', 3, '420000'),
('BYRANTR0004', 3, '420000'),
('BYRANTR0005', 1, '675000'),
('BYRANTR0006', 3, '420000'),
('BYRANTR0007', 3, '420000'),
('BYRANTR0008', 3, '420000'),
('BYRANTR0010', 3, '420000'),
('BYRANTR0011', 3, '495000'),
('BYRANTR0012', 3, '495000'),
('BYRANTR0013', 4, '700000'),
('BYRANTR0014', 4, '700000'),
('BYRANTR0015', 4, '700000'),
('BYRANTR0016', 4, '775000'),
('BYRANTR0017', 4, '775000'),
('BYRANTR0018', 3, '420000'),
('BYRANTR0019', 3, '420000'),
('BYRANTR0020', 3, '495000'),
('BYRANTR0021', 3, '495000'),
('BYRANTR0022', 1, '600000'),
('BYRANTR0023', 1, '600000'),
('BYRANTR0024', 1, '675000'),
('BYRANTR0025', 1, '675000'),
('BYRANTR0026', 1, '600000'),
('BYRANTR0027', 1, '600000'),
('BYRANTR0028', 1, '675000'),
('BYRANTR0029', 1, '675000'),
('BYRANTR0030', 6, '490000'),
('BYRANTR0031', 6, '490000'),
('BYRANTR0032', 6, '565000'),
('BYRANTR0033', 6, '565000'),
('BYRANTR0034', 1, '600000'),
('BYRANTR0035', 3, '420000'),
('BYRANTR0036', 3, '495000'),
('BYRANTR0037', 3, '495000'),
('BYRANTR0038', 1, '600000'),
('BYRANTR0039', 1, '600000'),
('BYRANTR0040', 4, '700000'),
('BYRANTR0041', 4, '700000'),
('BYRANTR0042', 4, '775000'),
('BYRANTR0043', 4, '775000'),
('BYRANTR0044', 3, '420000'),
('BYRANTR0045', 3, '420000'),
('BYRANTR0046', 3, '495000'),
('BYRANTR0047', 3, '495000'),
('BYRANTR0048', 6, '490000'),
('BYRANTR0049', 6, '490000'),
('BYRANTR0050', 6, '490000'),
('BYRANTR0051', 6, '490000'),
('BYRANTR0052', 6, '565000'),
('BYRANTR0053', 6, '565000'),
('BYRANTR0054', 6, '565000'),
('BYRANTR0055', 6, '565000');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran_baju`
--

CREATE TABLE `detail_pembayaran_baju` (
  `kd_bayar_baju` varchar(10) NOT NULL,
  `id_ktgr_baju` int(5) NOT NULL,
  `harga_item` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pembayaran_baju`
--

INSERT INTO `detail_pembayaran_baju` (`kd_bayar_baju`, `id_ktgr_baju`, `harga_item`) VALUES
('BYRBJ0001', 87, '360000'),
('BYRBJ0001', 88, '400000'),
('BYRBJ0001', 90, '300000'),
('BYRBJ0001', 89, '425000'),
('BYRBJ0002', 93, '425000'),
('BYRBJ0002', 94, '300000'),
('BYRBJ0002', 100, '380000'),
('BYRBJ0002', 92, '425000'),
('BYRBJ0003', 109, '425000'),
('BYRBJ0003', 110, '425000'),
('BYRBJ0003', 108, '380000'),
('BYRBJ0003', 111, '300000'),
('BYRBJ0004', 95, '360000'),
('BYRBJ0004', 96, '400000'),
('BYRBJ0004', 97, '425000'),
('BYRBJ0004', 98, '300000'),
('BYRBJ0005', 95, '360000'),
('BYRBJ0005', 96, '400000'),
('BYRBJ0005', 97, '425000'),
('BYRBJ0005', 98, '300000'),
('BYRBJ0006', 95, '360000'),
('BYRBJ0006', 96, '400000'),
('BYRBJ0006', 97, '425000'),
('BYRBJ0006', 98, '300000'),
('BYRBJ0007', 87, '360000'),
('BYRBJ0007', 88, '400000'),
('BYRBJ0007', 89, '425000'),
('BYRBJ0007', 90, '300000'),
('BYRBJ0008', 95, '360000'),
('BYRBJ0008', 96, '400000'),
('BYRBJ0008', 97, '425000'),
('BYRBJ0008', 98, '300000'),
('BYRBJ0009', 104, '360000'),
('BYRBJ0009', 105, '400000'),
('BYRBJ0009', 106, '425000'),
('BYRBJ0009', 107, '300000'),
('BYRBJ0010', 109, '425000'),
('BYRBJ0010', 110, '425000'),
('BYRBJ0010', 111, '300000'),
('BYRBJ0010', 108, '380000'),
('BYRBJ0011', 109, '425000'),
('BYRBJ0011', 110, '425000'),
('BYRBJ0011', 111, '300000'),
('BYRBJ0011', 108, '380000'),
('BYRBJ0012', 93, '425000'),
('BYRBJ0012', 94, '300000'),
('BYRBJ0012', 92, '425000'),
('BYRBJ0012', 100, '380000'),
('BYRBJ0013', 95, '360000'),
('BYRBJ0013', 96, '400000'),
('BYRBJ0013', 97, '425000'),
('BYRBJ0013', 98, '300000'),
('BYRBJ0014', 104, '360000'),
('BYRBJ0014', 106, '425000'),
('BYRBJ0014', 105, '400000'),
('BYRBJ0014', 107, '300000'),
('BYRBJ0015', 104, '360000'),
('BYRBJ0015', 105, '400000'),
('BYRBJ0015', 106, '425000'),
('BYRBJ0015', 107, '300000'),
('BYRBJ0016', 95, '360000'),
('BYRBJ0016', 96, '400000'),
('BYRBJ0016', 97, '425000'),
('BYRBJ0016', 98, '300000'),
('BYRBJ0017', 104, '360000'),
('BYRBJ0017', 105, '400000'),
('BYRBJ0017', 107, '300000'),
('BYRBJ0017', 106, '425000'),
('BYRBJ0018', 87, '360000'),
('BYRBJ0018', 88, '400000'),
('BYRBJ0018', 89, '425000'),
('BYRBJ0018', 90, '300000'),
('BYRBJ0019', 93, '425000'),
('BYRBJ0019', 94, '300000'),
('BYRBJ0019', 100, '380000'),
('BYRBJ0019', 92, '425000'),
('BYRBJ0020', 87, '360000'),
('BYRBJ0020', 89, '425000'),
('BYRBJ0020', 90, '300000'),
('BYRBJ0020', 88, '400000'),
('BYRBJ0021', 79, '360000'),
('BYRBJ0021', 80, '400000'),
('BYRBJ0021', 82, '300000'),
('BYRBJ0021', 81, '425000'),
('BYRBJ0022', 87, '360000'),
('BYRBJ0022', 88, '400000'),
('BYRBJ0022', 90, '300000'),
('BYRBJ0022', 89, '425000'),
('BYRBJ0023', 60, '475000'),
('BYRBJ0023', 61, '480000'),
('BYRBJ0023', 62, '320000'),
('BYRBJ0023', 59, '450000'),
('BYRBJ0024', 60, '475000'),
('BYRBJ0024', 61, '480000'),
('BYRBJ0024', 62, '320000'),
('BYRBJ0024', 59, '450000'),
('BYRBJ0025', 49, '450000'),
('BYRBJ0025', 50, '475000'),
('BYRBJ0025', 51, '480000'),
('BYRBJ0025', 52, '320000'),
('BYRBJ0026', 60, '475000'),
('BYRBJ0026', 61, '480000'),
('BYRBJ0026', 62, '320000'),
('BYRBJ0026', 59, '450000'),
('BYRBJ0027', 46, '450000'),
('BYRBJ0027', 45, '400000'),
('BYRBJ0027', 47, '480000'),
('BYRBJ0027', 52, '320000'),
('BYRBJ0028', 45, '400000'),
('BYRBJ0028', 46, '450000'),
('BYRBJ0028', 48, '320000'),
('BYRBJ0028', 47, '480000'),
('BYRBJ0029', 60, '475000'),
('BYRBJ0029', 61, '480000'),
('BYRBJ0029', 62, '320000'),
('BYRBJ0029', 59, '450000'),
('BYRBJ0030', 55, '400000'),
('BYRBJ0030', 56, '450000'),
('BYRBJ0030', 57, '480000'),
('BYRBJ0030', 58, '320000'),
('BYRBJ0031', 60, '475000'),
('BYRBJ0031', 61, '480000'),
('BYRBJ0031', 62, '320000'),
('BYRBJ0031', 59, '450000'),
('BYRBJ0032', 45, '400000'),
('BYRBJ0032', 46, '450000'),
('BYRBJ0032', 47, '480000'),
('BYRBJ0032', 48, '320000'),
('BYRBJ0033', 45, '400000'),
('BYRBJ0033', 46, '450000'),
('BYRBJ0033', 47, '480000'),
('BYRBJ0033', 48, '320000'),
('BYRBJ0034', 45, '400000'),
('BYRBJ0034', 48, '320000'),
('BYRBJ0034', 46, '450000'),
('BYRBJ0034', 47, '480000');

-- --------------------------------------------------------

--
-- Table structure for table `lib_tajaran`
--

CREATE TABLE `lib_tajaran` (
  `id_tajaran` int(5) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `status` enum('Aktif','Tidak aktif') NOT NULL,
  `semester` enum('genap','ganjil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lib_tajaran`
--

INSERT INTO `lib_tajaran` (`id_tajaran`, `tahun_ajaran`, `status`, `semester`) VALUES
(1, '2022/2023', 'Aktif', 'ganjil'),
(2, '2023/2024', 'Tidak aktif', 'genap'),
(7, '2021/2022', 'Tidak aktif', 'genap'),
(8, '2020/2021', 'Tidak aktif', 'genap');

-- --------------------------------------------------------

--
-- Table structure for table `lib_tingkat`
--

CREATE TABLE `lib_tingkat` (
  `id_tingkat` int(5) NOT NULL,
  `tingkat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lib_tingkat`
--

INSERT INTO `lib_tingkat` (`id_tingkat`, `tingkat`) VALUES
(1, 'TK'),
(2, 'SD'),
(3, 'SMP');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `kunci` varchar(255) DEFAULT NULL,
  `expDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(5) NOT NULL,
  `kd_bayar` varchar(15) NOT NULL,
  `invoice` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id`, `kd_bayar`, `invoice`) VALUES
(1, 'BYRANTR0001', 'AZH-SRW/2023/00001'),
(2, 'BYRANTR0002', 'AZH-SRW/2023/00002'),
(3, 'BYRANTR0003', 'AZH-SRW/2023/00003'),
(4, 'BYRANTR0004', 'AZH-SRW/2023/00004'),
(5, 'BYRANTR0005', 'AZH-SRW/2023/00005'),
(6, 'BYRANTR0006', 'AZH-SRW/2023/00006'),
(7, 'BYRANTR0007', 'AZH-SRW/2023/00007'),
(8, 'BYRANTR0008', 'AZH-SRW/2023/00008'),
(10, 'BYRANTR0010', 'AZH-SRW/2023/00010'),
(11, 'BYRANTR0011', 'AZH-SRW/2023/00011'),
(12, 'BYRANTR0012', 'AZH-SRW/2023/00012'),
(13, 'BYRANTR0013', 'AZH-SRW/2023/00013'),
(14, 'BYRANTR0014', 'AZH-SRW/2023/00014'),
(15, 'BYRANTR0015', 'AZH-SRW/2023/00015'),
(16, 'BYRANTR0016', 'AZH-SRW/2023/00016'),
(17, 'BYRANTR0017', 'AZH-SRW/2023/00017'),
(18, 'BYRANTR0018', 'AZH-SRW/2023/00018'),
(19, 'BYRANTR0019', 'AZH-SRW/2023/00019'),
(20, 'BYRANTR0020', 'AZH-SRW/2023/00020'),
(21, 'BYRANTR0021', 'AZH-SRW/2023/00021'),
(22, 'BYRANTR0022', 'AZH-SRW/2023/00022'),
(23, 'BYRANTR0023', 'AZH-SRW/2023/00023'),
(24, 'BYRANTR0024', 'AZH-SRW/2023/00024'),
(25, 'BYRANTR0025', 'AZH-SRW/2023/00025'),
(26, 'BYRANTR0026', 'AZH-SRW/2023/00026'),
(27, 'BYRANTR0027', 'AZH-SRW/2023/00027'),
(28, 'BYRANTR0028', 'AZH-SRW/2023/00028'),
(29, 'BYRANTR0029', 'AZH-SRW/2023/00029'),
(30, 'BYRANTR0030', 'AZH-SRW/2023/00030'),
(31, 'BYRANTR0031', 'AZH-SRW/2023/00031'),
(32, 'BYRANTR0032', 'AZH-SRW/2023/00032'),
(33, 'BYRANTR0033', 'AZH-SRW/2023/00033'),
(34, 'BYRANTR0034', 'AZH-SRW/2023/00034'),
(35, 'BYRANTR0035', 'AZH-SRW/2023/00035'),
(36, 'BYRANTR0036', 'AZH-SRW/2023/00036'),
(37, 'BYRANTR0037', 'AZH-SRW/2023/00037'),
(38, 'BYRANTR0038', 'AZH-SRW/2023/00038'),
(39, 'BYRANTR0039', 'AZH-SRW/2023/00039'),
(40, 'BYRANTR0040', 'AZH-SRW/2023/00040'),
(41, 'BYRANTR0041', 'AZH-SRW/2023/00041'),
(42, 'BYRANTR0042', 'AZH-SRW/2023/00042'),
(43, 'BYRANTR0043', 'AZH-SRW/2023/00043'),
(44, 'BYRANTR0044', 'AZH-SRW/2023/00044'),
(45, 'BYRANTR0045', 'AZH-SRW/2023/00045'),
(46, 'BYRANTR0046', 'AZH-SRW/2023/00046'),
(47, 'BYRANTR0047', 'AZH-SRW/2023/00047'),
(48, 'BYRANTR0048', 'AZH-SRW/2023/00048'),
(49, 'BYRANTR0049', 'AZH-SRW/2023/00049'),
(50, 'BYRANTR0050', 'AZH-SRW/2023/00050'),
(51, 'BYRANTR0051', 'AZH-SRW/2023/00051'),
(52, 'BYRANTR0052', 'AZH-SRW/2023/00052'),
(53, 'BYRANTR0053', 'AZH-SRW/2023/00053'),
(54, 'BYRANTR0054', 'AZH-SRW/2023/00054'),
(55, 'BYRANTR0055', 'AZH-SRW/2023/00055'),
(56, 'BYRBJ0001', 'AZH-SRW/2023/00056'),
(57, 'BYRBJ0002', 'AZH-SRW/2023/00057'),
(58, 'BYRBJ0003', 'AZH-SRW/2023/00058'),
(59, 'BYRBJ0004', 'AZH-SRW/2023/00059'),
(60, 'BYRBJ0005', 'AZH-SRW/2023/00060'),
(61, 'BYRBJ0006', 'AZH-SRW/2023/00061'),
(62, 'BYRBJ0007', 'AZH-SRW/2023/00062'),
(63, 'BYRBJ0008', 'AZH-SRW/2023/00063'),
(64, 'BYRBJ0009', 'AZH-SRW/2023/00064'),
(65, 'BYRBJ0010', 'AZH-SRW/2023/00065'),
(66, 'BYRBJ0011', 'AZH-SRW/2023/00066'),
(67, 'BYRBJ0012', 'AZH-SRW/2023/00067'),
(68, 'BYRBJ0013', 'AZH-SRW/2023/00068'),
(69, 'BYRBJ0014', 'AZH-SRW/2023/00069'),
(70, 'BYRBJ0015', 'AZH-SRW/2023/00070'),
(71, 'BYRBJ0016', 'AZH-SRW/2023/00071'),
(72, 'BYRBJ0017', 'AZH-SRW/2023/00072'),
(73, 'BYRBJ0018', 'AZH-SRW/2023/00073'),
(74, 'BYRBJ0019', 'AZH-SRW/2023/00074'),
(75, 'BYRBJ0020', 'AZH-SRW/2023/00075'),
(76, 'BYRBJ0021', 'AZH-SRW/2023/00076'),
(77, 'BYRBJ0022', 'AZH-SRW/2023/00077'),
(79, 'BYRBJ0023', 'AZH-SRW/2023/00078'),
(80, 'BYRBJ0024', 'AZH-SRW/2023/00079'),
(81, 'BYRBJ0025', 'AZH-SRW/2023/00080'),
(82, 'BYRBJ0026', 'AZH-SRW/2023/00081'),
(83, 'BYRBJ0027', 'AZH-SRW/2023/00082'),
(84, 'BYRBJ0028', 'AZH-SRW/2023/00083'),
(85, 'BYRBJ0029', 'AZH-SRW/2023/00084'),
(86, 'BYRBJ0030', 'AZH-SRW/2023/00085'),
(87, 'BYRBJ0031', 'AZH-SRW/2023/00086'),
(88, 'BYRBJ0032', 'AZH-SRW/2023/00087'),
(89, 'BYRBJ0033', 'AZH-SRW/2023/00088'),
(90, 'BYRBJ0034', 'AZH-SRW/2023/00089');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(5) NOT NULL,
  `id_tingkat` int(5) NOT NULL,
  `nm_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `id_tingkat`, `nm_kelas`) VALUES
(4, 3, 'VIII'),
(6, 2, 'I'),
(7, 2, 'II'),
(8, 2, 'III'),
(9, 2, 'IV'),
(10, 2, 'V'),
(11, 2, 'VI'),
(12, 3, 'VII'),
(13, 3, 'IX'),
(14, 1, 'TK B'),
(15, 1, 'TK A'),
(16, 1, 'TA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ktgr_antar`
--

CREATE TABLE `tbl_ktgr_antar` (
  `id_ktgr_antar` int(5) NOT NULL,
  `jenis` enum('Pergi','Pulang','Pulang Pergi') NOT NULL,
  `jarak` varchar(20) NOT NULL,
  `id_type_pemb` int(5) NOT NULL,
  `biaya` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ktgr_antar`
--

INSERT INTO `tbl_ktgr_antar` (`id_ktgr_antar`, `jenis`, `jarak`, `id_type_pemb`, `biaya`) VALUES
(1, 'Pulang Pergi', '5', 1, 675000),
(2, 'Pergi', '5', 1, 495000),
(3, 'Pulang', '5', 1, 495000),
(4, 'Pulang Pergi', '10', 1, 775000),
(5, 'Pergi', '10', 1, 565000),
(6, 'Pulang', '10', 1, 565000),
(7, 'Pulang Pergi', '15', 1, 875000),
(8, 'Pergi', '15', 1, 635000),
(9, 'Pulang', '15', 1, 635000),
(10, 'Pulang Pergi', '20', 1, 975000),
(11, 'Pergi', '20', 1, 705000),
(12, 'Pulang', '20', 1, 705000),
(13, 'Pulang Pergi', '25', 1, 1075000),
(14, 'Pergi', '25', 1, 775000),
(15, 'Pulang', '25', 1, 775000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ktgr_baju`
--

CREATE TABLE `tbl_ktgr_baju` (
  `id_ktgr_baju` int(5) NOT NULL,
  `nm_baju` varchar(150) NOT NULL,
  `id_tingkat` int(5) NOT NULL,
  `jenis_seragam` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `uk_baju` varchar(5) NOT NULL,
  `id_type_pemb` int(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ktgr_baju`
--

INSERT INTO `tbl_ktgr_baju` (`id_ktgr_baju`, `nm_baju`, `id_tingkat`, `jenis_seragam`, `jk`, `uk_baju`, `id_type_pemb`, `harga`, `stok`) VALUES
(6, 'SERAGAM PUTIH HIJAU', 3, 'BAJU LENGAN PENDEK + DASI dan CELANA PANJANG', 'L', 'M', 2, 450000, 100),
(7, 'SERAGAM BATIK PUTIH', 3, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'L', 'M', 2, 475000, 100),
(8, 'MUSLIM BIRU', 3, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'M', 2, 450000, 100),
(9, 'OLAHRAGA', 3, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'L', 'M', 2, 425000, 100),
(10, 'SERAGAM PUTIH HIJAU', 3, 'BAJU LENGAN PENDEK + DASI Dan ROK PANJANG', 'P', 'M', 2, 500000, 100),
(11, 'SERAGAM BATIK PUTIH', 3, 'BAJU LENGAN PENDEK Dan ROK PANJANG', 'P', 'M', 2, 525000, 100),
(12, 'MUSLIM BIRU', 3, 'BAJU LENGAN PANJANG Dan ROK PANJANG', 'P', 'M', 2, 500000, 100),
(13, 'OLAHRAGA', 3, 'BAJU LENGAN PENDEK  Dan CELANA PANJANG', 'P', 'M', 2, 425000, 100),
(17, 'SERAGAM PUTIH HIJAU', 3, 'BAJU LENGAN PENDEK + DASI Dan CELANA PANJANG', 'L', 'S', 2, 450000, 100),
(18, 'SERAGAM BATIK PUTIH', 3, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'L', 'S', 2, 475000, 100),
(19, 'MUSLIM BIRU', 3, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'S', 2, 450000, 100),
(20, 'OLAHRAGA', 3, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'S', 2, 425000, 100),
(22, 'SERAGAM BATIK PUTIH', 3, 'BAJU LENGAN PANJANG Dan ROK PANJANG', 'P', 'S', 2, 525000, 100),
(23, 'SERAGAM PUTIH HIJAU', 3, 'BAJU LENGAN PANJANG + DASI Dan ROK PANJANG', 'P', 'S', 2, 500000, 100),
(24, 'MUSLIM BIRU', 3, 'BAJU LENGAN PANJANG Dan ROK PANJANG', 'P', 'S', 2, 500000, 100),
(25, 'OLAHRAGA', 3, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'S', 2, 425000, 100),
(26, 'SERAGAM PUTIH HIJAU', 3, 'BAJU LENGAN PENDEK + DASI Dan CELANA PANJANG', 'L', 'L', 2, 450000, 100),
(27, 'SERAGAM BATIK PUTIH', 3, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'L', 'L', 2, 475000, 100),
(28, 'MUSLIM BIRU', 3, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'L', 2, 450000, 100),
(29, 'OLAHRAGA', 3, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'L', 1, 425000, 100),
(30, 'SERAGAM PUTIH HIJAU', 3, 'BAJU LENGAN PANJANG + DASI Dan ROK PANJANG', 'P', 'L', 2, 500000, 100),
(31, 'SERAGAM BATIK HIJAU', 3, 'BAJU LENGAN PANJANG Dan ROK PANJANG', 'P', 'L', 2, 525000, 100),
(32, 'MUSLIM BIRU', 3, 'BAJU LENGAN PANJANG Dan ROK PANJANG', 'P', 'L', 2, 500000, 100),
(33, 'OLAHRAGA', 3, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'L', 2, 425000, 100),
(34, 'SERAGAM PUTIH HIJAU', 3, 'BAJU LENGAN PENDEK + DASI Dan CELANA PANJANG', 'L', 'XL', 2, 450000, 100),
(35, 'SERAGAM BATIK HIJAU', 3, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'L', 'XL', 2, 475000, 100),
(36, 'MUSLIM BIRU', 3, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'XL', 2, 450000, 100),
(37, 'OLAHRAGA', 3, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'XL', 2, 425000, 100),
(38, 'SERAGAM PUTIH HIJAU', 3, 'BAJU LENGAN PANJANG + DASI Dan ROK PANJANG', 'P', 'XL', 2, 500000, 100),
(39, 'SERAGAM BATIK PUTIH', 3, 'BAJU LENGAN PANJANG Dan ROK PANJANG', 'P', 'XL', 2, 525000, 100),
(40, 'MUSLIM BIRU', 3, 'BAJU LENGAN PANJANG Dan ROK PANJANG', 'P', 'XL', 2, 500000, 100),
(41, 'OLAHRAGA', 3, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'XL', 2, 425000, 100),
(42, 'JILBAB', 3, 'PUTIH AL - AZHAR', 'P', '-', 2, 65000, 100),
(43, 'JILBAB', 3, 'COKLAT AL AZHAR', 'P', '-', 2, 65000, 100),
(44, 'JILBAB', 3, 'BIRU AL - AZHAR', 'P', '-', 2, 65000, 100),
(45, 'SERAGAM PUTIH HIJAU', 2, 'BAJU LENGAN PENDEK + DASI Dan CELANA PANJANG', 'L', 'S', 2, 400000, 95),
(46, 'SERAGAM BATIK HIJAU', 2, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'L', 'S', 2, 450000, 95),
(47, 'MUSLIM MERAH', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'S', 2, 480000, 95),
(48, 'OLAHRAGA', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'S', 2, 320000, 96),
(49, 'SERAGAM PUTIH HIJAU', 2, 'BAJU LENGAN PANJANG + DASI Dan TERUSAN PANJANG', 'P', 'S', 2, 450000, 99),
(50, 'SERAGAM BATIK HIJAU', 2, 'BAJU LENGAN PANJANG Dan ROK PANJANG', 'P', 'S', 2, 475000, 99),
(51, 'MUSLIM MERAH', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'S', 2, 480000, 99),
(52, 'OLAHRAGA', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'S', 2, 320000, 98),
(55, 'SERAGAM PUTIH HIJAU', 2, 'BAJU LENGAN PENDEK + DASI Dan CELANA PANJANG', 'L', 'M', 2, 400000, 99),
(56, 'SERAGAM BATIK HIJAU', 2, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'L', 'M', 2, 450000, 99),
(57, 'MUSLIM MERAH', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'M', 2, 480000, 99),
(58, 'OLAHRAGA', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'M', 2, 320000, 99),
(59, 'SERAGAM PUTIH HIJAU', 2, 'BAJU LENGAN PANJANG + DASI Dan TERUSAN PANJANG', 'P', 'M', 2, 450000, 94),
(60, 'SERAGAM BATIK HIJAU', 2, 'BAJU LENGAN PANJANG Dan ROK PANJANG', 'P', 'M', 2, 475000, 94),
(61, 'MUSLIM MERAH', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'M', 2, 480000, 94),
(62, 'OLAHRAGA', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'M', 2, 320000, 95),
(63, 'SERAGAM PUTIH HIJAU', 2, 'BAJU LENGAN PENDEK + DASI Dan CELANA PANJANG', 'L', 'L', 2, 400000, 100),
(64, 'SERAGAM BATIK HIJAU', 2, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'L', 'L', 2, 450000, 100),
(65, 'MUSLIM MERAH', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'L', 2, 480000, 100),
(66, 'OLAHRAGA', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'L', 2, 320000, 100),
(67, 'SERAGAM PUTIH HIJAU', 2, 'BAJU LENGAN PANJANG + DASI Dan TERUSAN PANJANG', 'P', 'L', 2, 450000, 100),
(68, 'SERAGAM BATIK HIJAU', 2, 'BAJU LENGAN PANJANG Dan ROK PANJANG', 'P', 'L', 2, 475000, 100),
(69, 'MUSLIM MERAH', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'L', 2, 480000, 100),
(70, 'OLAHRAGA', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'L', 2, 320000, 100),
(71, 'SERAGAM PUTIH HIJAU', 2, 'BAJU LENGAN PENDEK + DASI Dan CELANA PANJANG', 'L', 'XL', 2, 400000, 100),
(72, 'SERAGAM BATIK HIJAU', 2, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'L', 'XL', 2, 450000, 100),
(73, 'OLAHRAGA', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'XL', 2, 320000, 100),
(74, 'MUSLIM MERAH', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'XL', 2, 480000, 100),
(75, 'SERAGAM PUTIH HIJAU', 2, 'BAJU LENGAN PANJANG + DASI Dan TERUSAN PANJANG', 'P', 'XL', 2, 450000, 100),
(76, 'SERAGAM BATIK HIJAU', 2, 'BAJU LENGAN PANJANG Dan ROK PANJANG', 'P', 'XL', 2, 475000, 100),
(77, 'MUSLIM MERAH', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'XL', 2, 480000, 100),
(78, 'OLAHRAGA', 2, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'XL', 2, 320000, 100),
(79, 'SERAGAM PUTIH HIJAU', 1, 'BAJU LENGAN PENDEK + DASI Dan CELANA PENDEK', 'L', 'S', 2, 360000, 99),
(80, 'SERAGAM BATIK HIJAU', 1, 'BAJU LENGAN PENDEK Dan CELANA PENDEK', 'L', 'S', 2, 400000, 99),
(81, 'MUSLIM MERAH', 1, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'S', 2, 425000, 99),
(82, 'OLAHRAGA', 1, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'L', 'S', 2, 300000, 99),
(83, 'SERAGAM PUTIH HIJAU', 1, 'BAJU LENGAN PENDEK + DASI Dan TERUSAN PENDEK', 'P', 'S', 2, 380000, 100),
(84, 'SERAGAM BATIK HIJAU', 1, 'BAJU LENGAN PENDEK Dan ROK PENDEK', 'P', 'S', 2, 425000, 100),
(85, 'MUSLIM MERAH', 1, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'S', 2, 425000, 100),
(86, 'OLAHRAGA', 1, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'P', 'S', 2, 300000, 100),
(87, 'SERAGAM PUTIH HIJAU', 1, 'BAJU LENGAN PENDEK + DASI Dan CELANA PENDEK', 'L', 'M', 2, 360000, 95),
(88, 'SERAGAM BATIK HIJAU', 1, 'BAJU LENGAN PENDEK Dan CELANA PENDEK', 'L', 'M', 2, 400000, 95),
(89, 'MUSLIM MERAH', 1, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'M', 2, 425000, 95),
(90, 'OLAHRAGA', 1, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'L', 'M', 2, 300000, 95),
(92, 'SERAGAM BATIK HIJAU', 1, 'BAJU LENGAN PENDEK Dan ROK PENDEK', 'P', 'M', 2, 425000, 97),
(93, 'MUSLIM MERAH', 1, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'M', 2, 425000, 97),
(94, 'OLAHRAGA', 1, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'P', 'M', 2, 300000, 96),
(95, 'SERAGAM PUTIH HIJAU', 1, 'BAJU LENGAN PENDEK + DASI Dan CELANA PENDEK', 'L', 'L', 2, 360000, 94),
(96, 'SERAGAM BATIK HIJAU', 1, 'BAJU LENGAN PENDEK Dan CELANA PENDEK', 'L', 'L', 2, 400000, 94),
(97, 'MUSLIM MERAH', 1, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'L', 2, 425000, 94),
(98, 'OLAHRAGA', 1, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'L', 'L', 2, 300000, 94),
(99, 'SERAGAM PUTIH HIJAU', 1, 'BAJU LENGAN PENDEK + DASI Dan TERUSAN PENDEK', 'P', 'XL', 2, 380000, 100),
(100, 'SERAGAM PUTIH HIJAU', 1, 'BAJU LENGAN PENDEK + DASI Dan TERUSAN PENDEK', 'P', 'M', 2, 380000, 97),
(101, 'SERAGAM BATIK HIJAU', 1, 'BAJU LENGAN PENDEK Dan ROK PENDEK', 'P', 'XL', 2, 425000, 100),
(102, 'MUSLIM MERAH', 1, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'XL', 2, 425000, 100),
(103, 'OLAHRAGA', 1, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'P', 'XL', 2, 300000, 100),
(104, 'SERAGAM PUTIH HIJAU', 1, 'BAJU LENGAN PENDEK + DASI Dan CELANA PENDEK', 'L', 'XL', 2, 360000, 96),
(105, 'SERAGAM BATIK HIJAU', 1, 'BAJU LENGAN PENDEK Dan CELANA PENDEK', 'L', 'XL', 2, 400000, 96),
(106, 'MUSLIM MERAH', 1, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'L', 'XL', 2, 425000, 96),
(107, 'OLAHRAGA', 1, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'L', 'XL', 2, 300000, 96),
(108, 'SERAGAM PUTIH HIJAU', 1, 'BAJU LENGAN PENDEK + DASI Dan TERUSAN PENDEK', 'P', 'L', 2, 380000, 97),
(109, 'SERAGAM BATIK HIJAU', 1, 'BAJU LENGAN PENDEK Dan ROK PENDEK', 'P', 'L', 2, 425000, 97),
(110, 'MUSLIM MERAH', 1, 'BAJU LENGAN PANJANG Dan CELANA PANJANG', 'P', 'L', 2, 425000, 97),
(111, 'OLAHRAGA', 1, 'BAJU LENGAN PENDEK Dan CELANA PANJANG', 'P', 'L', 2, 300000, 97);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelunasan`
--

CREATE TABLE `tbl_pelunasan` (
  `id` bigint(20) NOT NULL,
  `id_bayar` varchar(11) NOT NULL,
  `kd_bayar` varchar(225) NOT NULL,
  `jml_bayar_lunas` int(20) DEFAULT NULL,
  `metode` varchar(20) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `id_tahun` varchar(11) DEFAULT NULL,
  `b_bayar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran_antar`
--

CREATE TABLE `tbl_pembayaran_antar` (
  `id_bayar_antar` int(11) NOT NULL,
  `kd_bayar_antar` varchar(15) NOT NULL,
  `id_siswa` int(5) NOT NULL,
  `masa_bulan` varchar(20) NOT NULL,
  `masa_tahun` year(4) NOT NULL,
  `jml_bayar` int(20) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `detail` text NOT NULL,
  `metode_bayar` varchar(255) NOT NULL,
  `ket` varchar(250) NOT NULL,
  `jml_dibyarkan` int(20) DEFAULT NULL,
  `b_bayar` varchar(255) DEFAULT NULL,
  `id_tahun` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembayaran_antar`
--

INSERT INTO `tbl_pembayaran_antar` (`id_bayar_antar`, `kd_bayar_antar`, `id_siswa`, `masa_bulan`, `masa_tahun`, `jml_bayar`, `tgl_bayar`, `detail`, `metode_bayar`, `ket`, `jml_dibyarkan`, `b_bayar`, `id_tahun`) VALUES
(2, 'BYRANTR0001', 311, 'Februari', 2022, 420000, '2022-02-02', '', 'Transfer', 'Lunas', NULL, 'd0b65b8a1d6918ffe689bc4c25146e9b.jpeg', 1),
(3, 'BYRANTR0002', 311, 'Maret', 2022, 420000, '2022-03-02', '', 'Transfer', 'Lunas', NULL, '5be83407327cea8aa41c35b1ddf20cdb.jpeg', 1),
(4, 'BYRANTR0003', 311, 'April', 2022, 420000, '2022-04-04', '', 'Transfer', 'Lunas', NULL, '9c260990bd4b467fcbd8dfa50213b37c.jpeg', 1),
(5, 'BYRANTR0004', 311, 'Mei', 2022, 420000, '2022-05-10', '', 'Transfer', 'Lunas', NULL, 'f83cf1d9256aee8485d3dce7f253059e.jpeg', 1),
(6, 'BYRANTR0005', 311, 'Juni', 2023, 675000, '2022-06-02', '', 'Transfer', 'Lunas', NULL, 'ba9fca7613d10afbd88fb5568ac32b4d.jpeg', 1),
(7, 'BYRANTR0006', 311, 'Juli', 2022, 420000, '2022-07-03', '', 'Transfer', 'Lunas', NULL, 'ad19c23aac7b730fb004c5bf43eb7932.jpeg', 1),
(8, 'BYRANTR0007', 311, 'Agustus', 2022, 420000, '2022-08-05', '', 'Transfer', 'Lunas', NULL, '281283bc8cc0fd94b8a6c1f548616697.jpeg', 1),
(9, 'BYRANTR0008', 311, 'September', 2022, 420000, '2022-09-03', '', 'Transfer', '', 0, 'ad9c90e84a186d47dced8027784bb92d.jpeg', 1),
(11, 'BYRANTR0010', 311, 'September', 2022, 420000, '2022-09-03', '', 'Transfer', 'Lunas', NULL, 'ac71faac75786543e3661e483454f213.jpeg', 1),
(12, 'BYRANTR0011', 311, 'Oktober', 2022, 495000, '2022-10-03', '', 'Transfer', 'Lunas', NULL, '1acbc19abbbd97cd64aeb12b79aab7f5.jpeg', 1),
(13, 'BYRANTR0012', 311, 'November', 2022, 495000, '2022-11-04', '', 'Transfer', 'Lunas', NULL, 'a4600bc02b8d769aa237f6eba94825f7.jpeg', 1),
(14, 'BYRANTR0013', 224, 'Juli', 2022, 700000, '2022-07-19', '', 'Transfer', 'Lunas', NULL, '4f69a15356f12164d537d2d1edeaf115.jpeg', 1),
(15, 'BYRANTR0014', 224, 'Agustus', 2022, 700000, '2022-08-02', '', 'Tunai', 'Lunas', NULL, NULL, 1),
(16, 'BYRANTR0015', 224, 'September', 2022, 700000, '2022-09-05', '', 'Tunai', 'Lunas', NULL, NULL, 1),
(17, 'BYRANTR0016', 224, 'Oktober', 2022, 775000, '2022-10-03', '', 'Tunai', 'Lunas', NULL, NULL, 1),
(18, 'BYRANTR0017', 224, 'November', 2022, 775000, '2022-11-05', '', 'Tunai', 'Lunas', NULL, NULL, 1),
(19, 'BYRANTR0018', 42, 'Juli', 2022, 420000, '2022-07-19', '', 'Transfer', 'Lunas', NULL, '58ed6312afb939db91214262ff3152e7.jpeg', 1),
(20, 'BYRANTR0019', 42, 'Agustus', 2022, 420000, '2022-08-18', '', 'Transfer', 'Lunas', NULL, 'cb9ae5f375c60b2ccecc3bd2b8e2c361.jpeg', 1),
(21, 'BYRANTR0020', 42, 'Oktober', 2022, 495000, '2022-10-03', '', 'Transfer', 'Lunas', NULL, '44c72549d122d27ce5d73bdba4a15886.jpeg', 1),
(22, 'BYRANTR0021', 42, 'November', 2022, 495000, '2022-11-05', '', 'Transfer', 'Lunas', NULL, '09c8bf6d5a0934e2e5adf321cb94c75d.jpeg', 1),
(23, 'BYRANTR0022', 149, 'Agustus', 2022, 600000, '2022-07-29', '', 'Transfer', 'Lunas', NULL, '1c437a5bfc2d3d65df52a1bce0d4737d.jpeg', 1),
(24, 'BYRANTR0023', 149, 'September', 2022, 600000, '2022-09-03', '', 'Transfer', 'Lunas', NULL, '57b177e020a560655cbdbcae7294ba7d.jpeg', 1),
(25, 'BYRANTR0024', 149, 'Oktober', 2022, 675000, '2022-10-03', '', 'Transfer', 'Lunas', NULL, '6e3ea451c146625073923241b25a4c4e.jpeg', 1),
(26, 'BYRANTR0025', 149, 'November', 2022, 675000, '2022-11-02', '', 'Transfer', 'Lunas', NULL, 'a4200f4faf8cc5ff15b57f73dd2c1136.jpeg', 1),
(27, 'BYRANTR0026', 142, 'Agustus', 2022, 600000, '2022-07-29', '', 'Tunai', 'Lunas', NULL, NULL, 1),
(28, 'BYRANTR0027', 142, 'September', 2022, 600000, '2022-09-03', '', 'Tunai', 'Lunas', NULL, NULL, 1),
(29, 'BYRANTR0028', 142, 'Oktober', 2022, 675000, '2022-10-05', '', 'Tunai', 'Lunas', NULL, NULL, 1),
(30, 'BYRANTR0029', 142, 'November', 2022, 675000, '2022-11-10', '', 'Transfer', 'Lunas', NULL, '482b519b5759615316c0f37fe4f18b7d.jpeg', 1),
(31, 'BYRANTR0030', 144, 'Agustus', 2022, 490000, '2022-07-30', '', 'Transfer', 'Lunas', NULL, '81982adf9b09d4bd45582ff01c83dd0b.jpeg', 1),
(32, 'BYRANTR0031', 144, 'September', 2022, 490000, '2022-09-02', '', 'Transfer', 'Lunas', NULL, '3ffd3a7c08f6d5624ef482b6f4f39a38.jpeg', 1),
(33, 'BYRANTR0032', 144, 'Oktober', 2022, 565000, '2022-10-03', '', 'Tunai', 'Lunas', NULL, NULL, 1),
(34, 'BYRANTR0033', 144, 'November', 2022, 565000, '2022-11-04', '', 'Tunai', 'Lunas', NULL, NULL, 1),
(35, 'BYRANTR0034', 152, 'Agustus', 2022, 600000, '2022-07-29', '', 'Transfer', 'Lunas', NULL, '24498a032c2f672bc96873bbc46ff1ba.jpeg', 1),
(36, 'BYRANTR0035', 152, 'September', 2022, 420000, '2022-08-30', '', 'Transfer', 'Lunas', NULL, '709f7926071dfc0cd21c0a6eea583aea.jpeg', 1),
(37, 'BYRANTR0036', 152, 'Oktober', 2022, 495000, '2022-10-03', '', 'Transfer', 'Lunas', NULL, '7b5dffcf486002bfe7cadea1a026eecc.jpeg', 1),
(38, 'BYRANTR0037', 152, 'November', 2022, 495000, '2022-10-31', '', 'Transfer', 'Lunas', NULL, '62a7ad805c2c1f99f03696b585cca42b.jpeg', 1),
(39, 'BYRANTR0038', 188, 'Agustus', 2022, 600000, '2022-08-01', '', 'Transfer', 'Lunas', NULL, 'd0a2698a3b54d8bc5b5ac69c1d13ead0.jpeg', 1),
(40, 'BYRANTR0039', 188, 'September', 2022, 600000, '2022-09-02', '', 'Tunai', 'Lunas', NULL, NULL, 1),
(41, 'BYRANTR0040', 312, 'Agustus', 2022, 700000, '2022-07-29', '', 'Transfer', 'Lunas', NULL, '1ba412ddb966935ba714d37ae16a8ca6.jpeg', 1),
(42, 'BYRANTR0041', 312, 'September', 2022, 700000, '2022-09-03', '', 'Transfer', 'Lunas', NULL, '105b1b0c393defd2223a4dfa7312bce4.jpeg', 1),
(43, 'BYRANTR0042', 312, 'Oktober', 2022, 775000, '2022-10-02', '', 'Transfer', 'Lunas', NULL, '18bacceb60111f643a6dd232023bbf0d.jpeg', 1),
(44, 'BYRANTR0043', 312, 'November', 2022, 775000, '2022-11-05', '', 'Transfer', 'Lunas', NULL, '90d1be890d8f731a9dbef12bc5c41acf.jpeg', 1),
(45, 'BYRANTR0044', 126, 'Agustus', 2022, 420000, '2022-08-01', '', 'Transfer', 'Lunas', NULL, '4f8b395aa023bcda51646e291405a513.jpeg', 1),
(46, 'BYRANTR0045', 126, 'September', 2022, 420000, '2022-09-03', '', 'Tunai', 'Lunas', NULL, NULL, 1),
(47, 'BYRANTR0046', 126, 'Oktober', 2022, 495000, '2022-10-03', '', 'Tunai', 'Lunas', NULL, NULL, 1),
(48, 'BYRANTR0047', 126, 'November', 2022, 495000, '2022-11-03', '', 'Tunai', 'Lunas', NULL, NULL, 1),
(49, 'BYRANTR0048', 313, 'Agustus', 2022, 490000, '2022-08-12', '', 'Transfer', 'Lunas', NULL, '8f69d29a7a6dc52aa0fa8573ab7e1bd3.jpeg', 1),
(50, 'BYRANTR0049', 314, 'Agustus', 2022, 490000, '2022-08-12', '', 'Transfer', 'Lunas', NULL, '69ad4478b67e2245c0fc47be8c270527.jpeg', 1),
(51, 'BYRANTR0050', 313, 'September', 2022, 490000, '2022-09-04', '', 'Transfer', 'Lunas', NULL, '1bc3f1822de304c816690f22b89b1216.jpeg', 1),
(52, 'BYRANTR0051', 314, 'September', 2022, 490000, '2022-09-04', '', 'Transfer', 'Lunas', NULL, '3a6c3944e91d9f621d1c5adf8da52082.jpeg', 1),
(53, 'BYRANTR0052', 313, 'Oktober', 2022, 565000, '2022-10-05', '', 'Transfer', 'Lunas', NULL, '4a3844ce5b08a9b3f337251c5707a987.jpeg', 1),
(54, 'BYRANTR0053', 314, 'Oktober', 2022, 565000, '2022-10-05', '', 'Transfer', 'Lunas', NULL, '85e58ff48126f6d3feeaf33bca8ad745.jpeg', 1),
(55, 'BYRANTR0054', 313, 'November', 2022, 565000, '2022-11-05', '', 'Transfer', 'Lunas', NULL, '3050dba6649ccf964a97e5cb601c0a13.jpeg', 1),
(56, 'BYRANTR0055', 314, 'November', 2022, 565000, '2022-11-05', '', 'Transfer', 'Lunas', NULL, 'ccb95c44abcb4ebc93af88f7b715f485.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran_baju`
--

CREATE TABLE `tbl_pembayaran_baju` (
  `id_bayar_baju` int(5) NOT NULL,
  `kd_bayar_baju` varchar(10) NOT NULL,
  `id_siswa` int(5) NOT NULL,
  `jumlah_byr` int(20) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `metode_bayar` varchar(255) NOT NULL,
  `ket` varchar(250) NOT NULL,
  `b_bayar` varchar(255) DEFAULT NULL,
  `jml_dibyarkan` int(12) DEFAULT NULL,
  `id_tahun` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembayaran_baju`
--

INSERT INTO `tbl_pembayaran_baju` (`id_bayar_baju`, `kd_bayar_baju`, `id_siswa`, `jumlah_byr`, `tgl_bayar`, `metode_bayar`, `ket`, `b_bayar`, `jml_dibyarkan`, `id_tahun`) VALUES
(1, 'BYRBJ0001', 35, 1485000, '2022-03-09', 'Tunai', 'Lunas', NULL, NULL, 1),
(2, 'BYRBJ0002', 37, 1530000, '2022-05-11', 'Transfer', 'Lunas', 'f8fbcdf0cf45a95c1b825d3e66bf7e94.jpeg', NULL, 1),
(3, 'BYRBJ0003', 38, 1530000, '2022-05-25', 'Transfer', 'Lunas', '411827444f958cf0fb2313ff806ad38f.jpeg', NULL, 1),
(4, 'BYRBJ0004', 39, 1485000, '2022-05-25', 'Transfer', 'Lunas', 'c41eac23186677d4e43387448754ac1b.jpeg', NULL, 1),
(5, 'BYRBJ0005', 40, 1485000, '2022-05-29', 'Transfer', 'Lunas', '1cc02d6fd5a1648363ad3c98d5cf0cf8.jpeg', NULL, 1),
(6, 'BYRBJ0006', 41, 1485000, '2022-06-08', 'Transfer', 'Lunas', '5bdce07e64134d275aeee14b1ab0390a.jpeg', NULL, 1),
(7, 'BYRBJ0007', 42, 1485000, '2022-04-12', 'Transfer', 'Lunas', '8c8e4862795b23ba3aa585d129936421.jpeg', NULL, 1),
(8, 'BYRBJ0008', 43, 1485000, '2022-06-13', 'Transfer', 'Lunas', 'ce737fe057e160c9e406197fa04ed386.jpeg', NULL, 1),
(9, 'BYRBJ0009', 44, 1485000, '2022-06-09', 'Transfer', 'Lunas', '36ff18fbd7c73d9bc250a8bb77ecb31b.jpeg', NULL, 1),
(10, 'BYRBJ0010', 45, 1530000, '2022-06-17', 'Tunai', 'Lunas', NULL, NULL, 1),
(11, 'BYRBJ0011', 46, 1530000, '2022-06-17', 'Tunai', 'Lunas', NULL, NULL, 1),
(12, 'BYRBJ0012', 47, 1530000, '2022-06-06', 'Transfer', 'Lunas', '9378cea43650a56204871ce360c5db3d.jpeg', NULL, 1),
(13, 'BYRBJ0013', 48, 1485000, '2022-06-21', 'Transfer', 'Lunas', '7ac2eb8ca2301178f9cc2b495b65b4bc.jpeg', NULL, 1),
(14, 'BYRBJ0014', 49, 1485000, '2022-03-25', 'Transfer', 'Lunas', '35dc2b7b06048c66a01c757b9956befe.jpeg', NULL, 1),
(15, 'BYRBJ0015', 50, 1485000, '2022-06-21', 'Transfer', 'Lunas', '72030c7bd2d6ea8feb44e655b78601d5.jpeg', NULL, 1),
(16, 'BYRBJ0016', 51, 1485000, '2022-06-22', 'Transfer', 'Lunas', 'f8d4414caca1df2874aa56c97008e31d.jpeg', NULL, 1),
(17, 'BYRBJ0017', 52, 1485000, '2022-06-23', 'Transfer', 'Lunas', '52e3aa5862e1c47c984d196783e0624f.jpeg', NULL, 1),
(18, 'BYRBJ0018', 53, 1485000, '2022-06-25', 'Transfer', 'Lunas', 'be03b6f02dbbd72e1c6e014eb0310083.jpeg', NULL, 1),
(19, 'BYRBJ0019', 54, 1530000, '2022-06-24', 'Transfer', 'Lunas', '2a519854f5abaf3813fd2629b3eb1299.jpeg', NULL, 1),
(20, 'BYRBJ0020', 55, 1485000, '2022-07-18', 'Tunai', 'Lunas', NULL, NULL, 1),
(21, 'BYRBJ0021', 56, 1485000, '2022-07-18', 'Tunai', 'Lunas', NULL, NULL, 1),
(22, 'BYRBJ0022', 57, 1485000, '2022-07-22', 'Tunai', 'Lunas', NULL, NULL, 1),
(24, 'BYRBJ0023', 168, 1725000, '2021-10-06', 'Tunai', 'Lunas', NULL, NULL, 1),
(25, 'BYRBJ0024', 173, 1725000, '2021-11-12', 'Tunai', 'Lunas', NULL, NULL, 1),
(26, 'BYRBJ0025', 160, 1725000, '2022-01-25', 'Transfer', 'Lunas', '4f278a0af45daba5ed4b7702f2486a0f.jpeg', NULL, 1),
(27, 'BYRBJ0026', 180, 1725000, '2022-01-04', 'Transfer', 'Lunas', '005f0b7e83e544c9e77be6d8b8f0a68a.jpeg', NULL, 1),
(28, 'BYRBJ0027', 177, 1650000, '2022-01-05', 'Transfer', 'Lunas', 'ea6610da946cf16fb25e5fcdcb410ce2.jpeg', NULL, 1),
(29, 'BYRBJ0028', 174, 1650000, '2021-12-29', 'Transfer', 'Lunas', '1ed58992e626580a4cc7b8413a1c0ac2.jpeg', NULL, 1),
(30, 'BYRBJ0029', 140, 1725000, '2022-02-13', 'Transfer', 'Lunas', 'e78fdf8dd90babc247c26e061287b103.jpeg', NULL, 1),
(31, 'BYRBJ0030', 139, 1650000, '2022-02-17', 'Tunai', 'Lunas', NULL, NULL, 1),
(32, 'BYRBJ0031', 164, 1725000, '2022-02-17', 'Tunai', 'Lunas', NULL, NULL, 1),
(33, 'BYRBJ0032', 149, 1650000, '2022-03-01', 'Transfer', 'Lunas', '6fdbe6a2aa5c4802facaa97867e97658.jpeg', NULL, 1),
(34, 'BYRBJ0033', 144, 1650000, '2022-03-02', 'Transfer', 'Lunas', '064adedc2c647a8cf4c993b3ce4d63fc.jpeg', NULL, 1),
(35, 'BYRBJ0034', 113, 1650000, '2022-06-08', 'Tunai', 'Lunas', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rombel`
--

CREATE TABLE `tbl_rombel` (
  `id_rombel` int(5) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `nm_rombel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rombel`
--

INSERT INTO `tbl_rombel` (`id_rombel`, `id_kelas`, `nm_rombel`) VALUES
(1, 14, 'TK B'),
(2, 15, 'TK A'),
(4, 6, 'I A'),
(5, 6, 'I B'),
(6, 7, 'II A'),
(7, 7, 'II B'),
(8, 8, 'III A'),
(9, 8, 'III B'),
(10, 9, 'IV A'),
(11, 9, 'IV B'),
(12, 10, 'V A'),
(13, 11, 'VI A'),
(14, 11, 'VI B'),
(15, 12, 'VII A'),
(16, 12, 'VII B'),
(17, 4, 'VIII A'),
(18, 4, 'VIII B'),
(19, 13, 'IX A'),
(20, 13, 'IX B'),
(23, 10, 'V B'),
(24, 16, 'TA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(5) NOT NULL,
  `nisn` int(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `tmpt_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nama_wali` char(50) NOT NULL,
  `id_rombel` int(5) NOT NULL,
  `alamat` text NOT NULL,
  `id_tajaran` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nisn`, `nama_siswa`, `jenkel`, `tmpt_lahir`, `tgl_lahir`, `nama_wali`, `id_rombel`, `alamat`, `id_tajaran`) VALUES
(1, 2020148, 'Zazkia Rahma', 'P', 'Palembang', '2017-08-01', 'Aminudin Hasan', 24, 'Komplek Komperta Lrg. Ragun Plaju\r\n', 8),
(2, 2020147, 'Nina Agustina', 'P', 'Palembang', '2017-12-12', 'Khalid Khairullah', 24, 'Jl. Tembok Baru Lr. Anyar Palju \r\n', 8),
(3, 2020151, 'Mimtahul Jannah', 'P', 'Palembang', '2016-06-20', 'M. Mukmin', 2, 'Jl. Ahmad Yani  Lr Silaberanti \r\n', 8),
(4, 2020150, 'Candra Adi', 'L', 'Palembang', '2016-10-16', 'Ahmad Zainuri', 2, 'Jl. Tegal Binangun Kom. Sasana Patra\r\n', 8),
(5, 2020149, 'Rayya Cantika', 'P', 'Palembang', '2016-12-24', 'Sasmika Ridwan', 2, 'Komp. OPI V No. 4\r\n', 8),
(6, 2020153, 'AISYAH NAMIA', 'P', 'Palembang', '2015-04-19', 'AMRULLAH', 1, 'JLN. SILABERANTI LRG AUR GADING NO 54\r\n', 8),
(7, 2020154, 'ANDINI KEISHA ZAHRA', 'P', 'Palembang', '2015-08-12', 'KOMARUDDIN AHMAD KHOIR', 1, 'JL. KI MAROGAN NO 1120 Kertapati\r\n', 8),
(8, 2020155, 'ZAFRAN', 'L', 'Palembang', '2015-06-25', 'SYAMSUDIN', 1, 'JL. KAPT ABDULLAH LR. AMAN PALEMBANG\r\n', 8),
(9, 2020156, 'ZALIKA', 'P', 'Palembang', '2015-06-25', 'SYAMSUDIN', 1, 'JL. KAPT ABDULLAH LR. AMAN PALEMBANG\r\n', 8),
(10, 2020157, 'ZAFIRA', 'P', 'Palembang', '2015-06-25', 'SYAMSUDIN', 1, 'JL. KAPT ABDULLAH LR. AMAN PALEMBANG\r\n', 8),
(11, 2020158, 'ABYAN REYNAND ARASY', 'L', 'Palembang', '2015-09-30', 'MITRA CHANDRA', 1, 'KOMP. TAMAN OGAN PERMAI BLOK DD.44\r\n', 8),
(12, 2020152, 'REI AL RAZQA K.A', 'L', 'Palembang', '2015-09-05', 'ASTAMAN', 1, 'JL. PANCA USAHA RT. 052 RW. 014\r\n', 8),
(13, 2021156, 'Afika Fadhila', 'P', 'Palembang', '2016-01-27', 'KEMAS AGUNG', 1, 'GRIYA GERBANG EMAS BLOK G8\r\n', 7),
(14, 2021157, 'Achmad Nizam', 'L', 'Palembang', '2016-11-24', 'NOPAL LOSKON', 1, 'JL. PENDIDIKAN KOMP. TOWN HOUSE POP  BLOK B \r\n', 7),
(15, 2021158, 'Nessa Nur . A', 'P', 'Palembang', '2016-06-30', 'ARDI PRATAMA', 1, 'JL. AIPTU A. WAHAB NO.72 RT.27 RW.01\r\n', 7),
(16, 2021159, 'Nevin Nur . A', 'L', 'Palembang', '2016-06-30', 'ARDI PRATAMA', 1, 'JL. AIPTU A. WAHAB NO.72 RT.27 RW.01\r\n', 7),
(17, 2021160, 'Az Zaki Zikrullah', 'L', 'Palembang', '2016-12-25', 'ONGKI', 1, 'KOMP. GRIYA MUSI BLOK N11\r\n', 7),
(18, 2021161, 'Raisya Almeera', 'P', 'Palembang', '2016-02-28', 'BOBY HANDOKO', 1, 'OPI REGENCY II TOPAZ RESIDENCE BLOK B II\r\n', 7),
(19, 2021162, 'Nabila Shaliha Az Zahra', 'P', 'Palembang', '2016-10-13', 'BAGASKARA PRTAMA', 0, 'PERUM OPI BLOK I LRG CENDRAWASI V NO 28\r\n', 7),
(20, 2021163, 'M. Alwi Al Fathian', 'L', 'Palembang', '2016-08-22', 'SOBRI HERIYANTO', 1, 'JLN KH AZHARI RT 006 RW 002 12 ULU PALEMBANG \r\n', 7),
(21, 2021164, 'Achmad  Faith Arkan', 'L', 'Palembang', '2016-07-18', 'MARDENI SUHENDRA', 1, 'JL. GUB . H. BASTARI KOMP JAKA PERMAI BLOK F NO. 10\r\n', 7),
(22, 2021165, 'Rayyan At Hallah', 'L', 'Palembang', '2016-10-06', 'ALI AHMAD FAJRI', 1, 'JL.KOPRAL URIP NO 55 Plaju \r\n', 7),
(23, 2021166, 'Athariz Akargya', 'L', 'Palembang', '2016-09-21', 'BANI ABDULLAH AZIZ', 1, 'PERUM OPI BLOK II LRG CENDRAWASI VI NO 11\r\n', 7),
(24, 2021167, 'Altara', 'L', 'Palembang', '2016-05-25', 'KHUSEN SAPUTRA', 1, 'JL. TALANG PETAI NO. 2311 PLAJU\r\n', 7),
(25, 2021173, 'M.KAYSAN ALFAEYZA', 'L', 'Palembang', '2017-09-11', 'NOPAN', 2, 'Perum TOP Amen Mulya\r\n', 7),
(26, 2021174, 'AISYAH PUTRI NANDINIE', 'P', 'Palembang', '2017-07-04', 'HERI YANTO', 2, 'Jl. Panca Usaha No 301\r\n', 7),
(27, 2021175, 'AJENG MUGNI FELICIA', 'L', 'Palembang', '2017-04-26', 'PRATAMA YADI', 2, 'Jl. Tegal Binangun\r\n', 7),
(28, 2021176, 'M. AQSA ALFARIZI', 'L', 'Palembang', '2017-02-16', 'SURYANTO', 2, 'Perumahan Sasana Patra \r\n', 7),
(29, 2021177, 'M. ALFAQIH DHAFIR', 'L', 'Palembang', '2017-12-09', 'ARIA', 2, 'Jl. OPI 5 Perum OPI Jakabaring \r\n', 7),
(30, 2021168, 'Syifa Annisa Putri', 'P', 'Palembang', '2018-04-15', 'EKO PRAKOSO', 24, 'Komplek Komperta Plaju \r\n', 7),
(31, 2021169, 'Sheza Nalayeka T', 'P', 'Palembang', '2018-11-07', 'HERMAWAN', 24, 'JL TEGAL BINANGUN Perum Regency No. 25\r\n', 7),
(32, 2021170, 'Azka Raditya', 'L', 'Palembang', '2018-09-25', 'ERWAN SAPUTRA', 24, 'OPI REGENCY 2 Jakabaring\r\n', 7),
(33, 2021171, 'Kafka Akhtarrafisay', 'L', 'Palembang', '2018-10-10', 'DIRHAM ABUNG', 24, 'PERUM OPI LR. JATI I BLOK M No. 2', 7),
(34, 2021172, 'Azalea Cinta Dirgajaya', 'P', 'Palembang', '2018-06-20', 'RAMADHON PUTRA WIJAYA', 24, 'PERUM GRIYA LEMATANG INDAH BLOK C NO 10\r\n', 7),
(35, 2021173, 'M.KAYSAN ALFAEYZA', 'L', 'Palembang', '2017-09-11', 'NOPAN', 1, 'Perum TOP Amen Mulya\r\n', 1),
(36, 2021174, 'AISYAH PUTRI NANDINIE', 'P', 'Palembang', '2017-07-04', 'HERI YANTO', 0, 'Jl. Panca Usaha No 301\r\n', 1),
(37, 20211744, 'AISYAH PUTRI NANDINIE', 'P', 'Palembang', '2017-07-04', 'HERI YANTO', 1, 'Jl. Panca Usaha No 301\r\n', 1),
(38, 2021175, 'AJENG MUGNI FELICIA', 'P', 'Palembang', '2017-04-26', 'PRATAMA YADI', 1, 'Jl. Tegal Binangun\r\n', 1),
(39, 2021176, 'M. AQSA ALFARIZI', 'L', 'Palembang', '2017-02-16', 'SURYANTO', 1, 'Perumahan Sasana Patra \r\n', 1),
(40, 2021177, 'M. ALFAQIH DHAFIR', 'L', 'Palembang', '2017-12-09', 'ARIA', 1, 'Jl. OPI 5 Perum OPI Jakabaring \r\n', 1),
(41, 2022178, 'M.AZZELFIN HABIBIE', 'L', 'Palembang', '2017-10-01', 'TOMAS HADI', 1, 'Perum Sikam Indah J03\r\n', 1),
(42, 2022179, 'M.ABIDZAR&#039;ARTA JAYA', 'L', 'Palembang', '2017-07-24', 'YUSUF AKBAR', 1, 'Jl Ahmad Yani Lrg Tembok Baru \r\n', 1),
(43, 2022180, 'ARRAYYAN USMAN AGUNG', 'L', 'Palembang', '2017-05-16', 'HERU YANTO', 1, 'Jl. Nusa Tenggara IV \r\n', 1),
(44, 2022181, 'KENZO RAFFASHA WIJAYA', 'L', 'Palembang', '2017-03-08', 'RIWEN SETIAWAN', 1, 'Jl. Yaktapena  1 Barat\r\n', 1),
(45, 2022182, 'AZIZA MALIKA ALEYAUDIA', 'P', 'Palembang', '2017-12-29', 'DENI KURNIAWAN', 1, 'Jl. Putri Kembang Dadar No. 17\r\n', 1),
(46, 2022183, 'AFIFA MALIKA ALEYAUDIA', 'P', 'Palembang', '2017-12-29', 'DENI KURNIAWAN', 1, 'Jl. Putri Kembang Dadar No. 17\r\n', 1),
(47, 2022184, 'AISYAH HURIYAH', 'P', 'Palembang', '2017-08-13', 'DEDI AGUSTIADI', 1, 'Jl. Tegal Binangun Lrg Pipa\r\n', 1),
(48, 2022185, 'M. ZHAFRAN GHAZANI', 'L', 'Palembang', '2017-06-05', 'AGUNG SAPDA', 1, 'Jl. Cendana II Blok FF 10\r\n', 1),
(49, 2022186, 'ALVARO DORY ROOKYANA', 'L', 'Palembang', '2018-04-17', 'RIZKY PRASATIYO', 2, 'Jl. Mataram 1 Lrg Pajajaran \r\n', 1),
(50, 2022187, 'AKIO MAUZA HAMID', 'L', 'Palembang', '2018-03-18', 'AGUNG SURDAWONO', 2, 'Jl. Bunggaran II No.200\r\n', 1),
(51, 2022188, 'HIBRATUL ROBBY ABQORY', 'L', 'Palembang', '2018-11-29', 'HENGKI KURNIAWAN', 2, 'Perum Amin Mulya Jl. Palem I\r\n', 1),
(52, 2022189, 'M. FAIZ AKBAR', 'L', 'Palembang', '2018-01-10', 'FRENGKI SAPUTRA', 2, 'Jl. Tangga Takat Lrg. AlAmin\r\n', 1),
(53, 2022190, 'IBRAHIM AVARIZ A', 'L', 'Palembang', '2017-06-24', 'YUDIS AGISTIRA', 2, 'OPI VI Bougenvil Blok A12\r\n', 1),
(54, 2022191, 'ROSALIA ARSYILA FARZANA', 'P', 'Palembang', '2018-04-23', 'ADE TARUNA', 2, 'Lrg. Ketandean No. 115\r\n', 1),
(55, 2022192, 'M. ZAFRAN NUGRAHA', 'L', 'Palembang', '2018-06-01', 'IMAM KURNIAWAN', 2, 'Jl. A. Yani Lrg Gumai No. 75\r\n', 1),
(56, 2022193, 'M. SALMAN HADI', 'L', 'Palembang', '2019-10-10', 'RIDUAN PRATAMA', 24, 'Komp. Sangkuriang Blok P05\r\n', 1),
(57, 2022194, 'ALFIERZA WONGSO', 'L', 'Palembang', '2019-07-01', 'AJI SAPUTRA', 24, 'Komp. Jakabaring Blok F No 03\r\n', 1),
(58, 2020244, 'Adeeva Reza Myesha', 'P', 'Palembang', '2014-03-31', 'Muhammad Reza', 4, 'JL. Talang Petai No. 1016 A Plaju\r\n', 8),
(59, 2020249, 'Ahmad Thariq Al - Ayyubi', 'L', 'Palembang', '2014-01-16', 'Yudi Adi Ratna', 4, 'Jl. Makrayu NO.1001-311\r\n', 8),
(60, 2020238, 'Atilaindra Far&#039;ad', 'L', 'Palembang', '2014-06-17', 'Muhammad Indra', 4, 'JLN Bungaran III\r\n', 8),
(61, 2020262, 'AYMAN AL-HASYIM ANSORI', 'L', 'Palembang', '2014-10-29', 'ROBIE ISYA ANSORI', 4, 'Perum Atlit TOP Type 100 Jln Nusa Bakti Blok A7 No 55-56 RT 062 RW 017 Kec Sebra\r\n', 8),
(62, 2020248, 'Danish Maulana Firdaus', 'L', 'PATI', '2014-10-25', 'Aroef Hukmanan Rais', 4, 'DSN Botok\r\n', 8),
(63, 2020258, 'Gayatri Aulia Putri Afian', 'P', 'Palembang', '2013-09-11', 'Baruto Lucky Afian', 4, 'Jl. Gub . H. Bastari Komp Jaka Permai Blok D No. 9\r\n', 8),
(64, 2020252, 'Kemas Muhammad Alfaruqy', 'L', 'Palembang', '2014-07-15', 'Kemas Achmad Fahmi', 4, 'Perumahan OPI JL. Bangau 1 Blok A No 17\r\n', 8),
(65, 2020253, 'KHANZA ARUNINDA FAHLESI', 'P', 'Palembang', '2014-10-12', 'DANANG WAHYU FAHLESI', 4, 'PERUM OPI BLOK I LRG CENDRAWASI V NO 41\r\n', 8),
(66, 2020246, 'MUHAMMAD AFIF ANDRIAN', 'L', 'Palembang', '2014-09-19', 'FEMI ANDRIAN', 4, 'JL. Soak LR. Sejahtera No. 148\r\n', 8),
(67, 2020242, 'MUHAMMAD HABIBI AL BUKHORI', 'L', 'KAYU AGUNG', '2013-10-21', 'MUHAMMAD YUSUF', 4, 'JLN.BERINGIN RAYA BLOK HH NO 24\r\n', 8),
(68, 2020239, 'MUHAMMAD HARITS AL AYYUBI', 'L', 'TANGGERANG SELATAN', '2013-12-24', 'RIKA ANUARIANSYAH', 4, 'JLN. GUB. H. BASTARI\r\n', 8),
(69, 2020266, 'MUHAMMAD KAAFI MUBAROK ZULKIFLI', 'L', 'Palembang', '2014-06-06', 'ZULKIFLI', 4, 'Jln KH Azhari RT 005 RW 001 12 Ulu Palembang \r\n', 8),
(70, 2020241, 'Muhammad Naufal', 'L', 'Palembang', '2014-09-27', 'Muhammad Taufik', 4, 'Jln Opi 6 Komplek Bougenville 2 Blok K No 07\r\n', 8),
(71, 2020245, 'Muhammad Nauval Afkar', 'L', 'Palembang', '2014-06-23', 'Pebrian Yudistira', 4, 'Lrg Satria No 05\r\n', 8),
(72, 2020257, 'NAILA RAMADHANI REANZA', 'P', 'Bogor', '2014-06-26', 'ANDREAN', 4, 'PERUM PESONA LAGUNA II BLOK J2 NO 43 \r\n', 8),
(73, 2020263, 'NAJWA ELVERA RAMADHIANTO', 'P', 'Palembang', '2014-06-13', 'ANGGHI PRABU RAMADHIANTO', 4, 'JL. Bungaran 5 No. 425\r\n', 8),
(74, 2020268, 'Naura Khalisa Humaira', 'P', 'Palembang', '2014-07-07', 'Jauhari', 4, 'Griya Bangun Sejahtera Jl. Tenam\r\n', 8),
(75, 2020267, 'Naura Zahra Kamila', 'P', 'Palembang', '2014-01-16', 'Insan Kamil', 4, 'DS Sungai Pasir Pati\r\n', 8),
(76, 2020265, 'RAHAYU WIGO SUKARNO', 'P', 'Palembang', '2013-11-29', 'WIGO ADHA', 4, 'JL.KOPRAL URIP NO 67\r\n', 8),
(77, 2020255, 'RAISA KHANSA QUINOVA', 'P', 'Palembang', '2014-12-05', 'ARIANZAH KURNIAWAN', 4, 'Jln Sapta Marga LR. Rambutan No 38 RT 040 RW 008 Bukit Sangkal Palembang \r\n', 8),
(78, 2020240, 'Rasya Pramudya', 'L', 'Palembang', '2014-05-14', 'Alman Lutfi', 4, 'Perum OPI Lr. Cendrawasih 8 Blok J No 42\r\n', 8),
(79, 2020254, 'RUSSIALEYNA FIORENZHA RACHMAN', 'P', 'Palembang', '2014-06-29', 'M. RIZA RACHMAN', 4, 'JL. A.Yani LR. KH. Umar\r\n', 8),
(80, 2020251, 'SABIYA RAFIFAH AQILAH', 'P', 'Palembang', '2014-10-17', 'GUSTOMO', 4, 'Jln. Tembok Baru Lorong Veteran RT 003 RW 001 9-10 Ulu Palembang\r\n', 8),
(81, 2020264, 'Vidi Alvino Umar', 'L', 'Palembang', '2014-05-16', 'Dedi Supriadi', 4, 'JL ABIKUSNO CS\r\n', 8),
(82, 2020259, 'AHMAD ABDURROZAQ', 'L', 'Palembang', '2013-08-14', 'FAHRURROZI', 5, 'Jl. Batam Perumahan Haura Prabu Blok B No 2 RT 007/ RW 003 Kel Gunung Ibul Kec P\r\n', 8),
(83, 2020247, 'ANELA KALILA ARASY', 'P', 'Palembang', '2014-03-22', 'YOKKI FIRMANSYAH', 5, 'Jl. Cempaka II Blok H8 No 8 Sektor 1.4\r\n', 8),
(84, 2020250, 'DZAKY ALMER JAMAIL', 'L', 'Palembang', '2014-07-04', 'ADE TOMMY PAHLEVI', 5, 'JL.LUNJUK JAYA NO 21\r\n', 8),
(85, 2020261, 'M. AL - FATHIR', 'L', 'Palembang', '2014-07-04', 'FIRMANSYAH HAKIM', 5, 'Jln Opi 1 Cempaka 2 B 9 RT 065 RW 011 Jakabaring \r\n', 8),
(86, 2020256, 'Muhammad Raihan Hamdani', 'L', 'Palembang', '2014-08-20', 'YUDA TRIJAYA', 5, 'PERUM ATLIT BLOK BB 18\r\n', 8),
(87, 2020243, 'Mutiara Adeffa Hira', 'P', 'Palembang', '2014-06-14', 'Royhan Al Faisal', 5, 'Perum Amin Mulya Jl. Cendana Blok FF No.72\r\n', 8),
(88, 2020260, 'NIZAM AL FADHIL WIBOWO', 'L', 'Palembang', '2014-09-09', 'KURNIA ADHE WIBOWO', 5, 'JL.GUB.H.A.BASTARI KOMP.BKN\r\n', 8),
(89, 2020237, 'Syifa As-Syafiyah', 'P', 'Palembang', '2014-02-27', 'Sopian', 5, 'Jl. OPI VI\r\n', 8),
(90, 2019206, 'AHMAD RIZKI ILOFA', 'L', 'Palembang', '2013-03-07', 'CHAIRUL ANSOR', 6, 'JLN. CENDANA II BLOK FF 50 PERUM TOP JAKABARING\r\n', 8),
(91, 2019201, 'Afifah Khairah Azzahra', 'P', 'Palembang', '2014-09-19', 'Apri Maikel Jekson', 7, 'Jl Tangga Takat Lr Amilin No.999 A\r\n', 8),
(92, 2018170, 'Afifa Aisyah Almahera', 'P', 'Palembang', '2012-06-30', 'Ruslan', 8, 'Perum TOP Jln. Cemara II Blok II No.02\r\n', 8),
(93, 2017113, 'ALYLAH PUTRI NASYIRAH', 'P', 'Palembang', '2010-07-25', 'Agustri Irawan', 10, 'JL. SRIJAYA LR PANCA KARYA NO 588\r\n', 8),
(94, 2017136, 'AHMAD ALFI MUBAROK', 'L', 'Palembang', '2011-10-06', 'EDY THAMRIN', 11, 'JL. PAK. ABDURROHIM NO. 833\r\n', 8),
(95, 2016105, 'ALISYA NURUL SAFINA', 'P', 'Palembang', '2011-01-24', 'UMBAR RIANTO', 12, 'JL. PALEM RAYA PERUM TOP ATLIT AMIN MULYA BLOK AA NO.14\r\n', 8),
(96, 2015052, 'AMIRAH ADZKIYA', 'P', 'Palembang', '2009-06-17', 'DAFID', 13, 'JL. OPI 1 BANGAU 5 BLOK C 25 Perum OPI Jakabaring\r\n', 8),
(97, 2021283, 'ADIBA QUEENARA MYESSHA', 'P', 'Palembang', '2015-10-25', 'FERDINANO', 4, 'KOMPLEK GRAND CITY BLOK  G 09 NO.22\r\n', 7),
(98, 2021286, 'ADIVA KANYA AGUNG', 'P', 'JAKARTA', '2015-04-04', 'AGUNG NOPRIANSYAH', 4, 'JL. JEND. B. UTOYO LR. SUMUR TINGGI 2 NO. 1161\r\n', 7),
(99, 2021300, 'AFIFAH FATIYAH', 'P', 'Palembang', '2014-09-07', 'DECKY', 4, 'JL. PIPA SUNGAI LAIS PERUMAHAN SAPPIRE RESIDENCE BLOK C, NO. 36\r\n', 7),
(100, 2021302, 'AISYAH DZAKIYA RIKZATUNNISA', 'P', 'Palembang', '2015-05-14', 'NORMAN FATHONI', 4, 'KOM. AURORA RESIDEN A.6 TEGAL BINANGUN\r\n', 7),
(101, 2021287, 'AKEMI NADENDKA ZWEENA ARIF', 'P', 'Palembang', '2015-08-11', 'Arif Budiman', 4, 'PERUM OPI CLUSTER ALMOND BLOK B NO 11 RT 067 RW 019 PALEMBANG \r\n', 7),
(102, 2021281, 'FARIZ AZ ZAHIR SUWANDHI', 'L', 'Palembang', '2015-02-14', 'TEDY SUWANDHI', 4, 'GRIYA GERBANG EMAS BLOK F3\r\n', 7),
(103, 2021298, 'JIBRIL ABRISAM ABDUL JABAR', 'L', 'Palembang', '2014-07-17', 'HAKIM', 4, 'JL PALEM RAYA KOMP. AMIN MULYA BLOK D 11-12\r\n', 7),
(104, 2021304, 'KAISA ASSHAFA ZAHRA', 'P', 'Palembang', '2015-11-22', 'BUDI SETIAWAN', 4, 'PERUMAHAN TOP DEKRANASDA BLOK HH24\r\n', 7),
(105, 2021309, 'KETRIN CLARETTA ANJLIKA', 'P', 'Palembang', '2015-05-06', 'ANJAR FAHMI HIDAYAT', 4, 'JL. A.YANI LR. KH.UMAR 9-10 ULU SEBERANG ULU 1\r\n', 7),
(106, 2022311, 'KINANTYA ADKHILNA SHIDQYA', 'P', 'Palembang', '2015-08-22', 'M. IQBAL ANDY KURNIAWAN', 4, 'JL. GUB. H.A BASTARI LORONG MERPATI RT 022 RW 005 NO 18\r\n', 7),
(107, 2021284, 'M. ADLAN AL THAQIF', 'L', 'Palembang', '2015-07-08', 'WAHYUDI', 4, 'JL. PENDIDIKAN KOMP. TOWN HOUSE POP  BLOK B NO. 3\r\n', 7),
(108, 2021279, 'M.GHALY EL REYHAN', 'L', 'Palembang', '2015-08-04', 'M. REZA FAHLEVI', 4, 'JL. SIMPANG 4 BAKARAN NO.55 PLAJU\r\n', 7),
(109, 2021280, 'M. GILANG ALFINDO', 'L', 'Palembang', '2015-10-11', 'FIRMAN NANDO', 4, 'JL. AIPTU A. WAHAB NO.99 RT.27 RW.01\r\n', 7),
(110, 2021291, 'MUHAMMAD DARVA SAHAR', 'L', 'Palembang', '2015-08-30', 'MOH. SOLICHIN', 4, 'PERUMAHAN OPI CENDRAWASIH 4 BLOK 1 NO.20\r\n', 7),
(111, 2021290, 'M. RAZIQ HANAN RAHMAN', 'L', 'Palembang', '2015-02-15', 'ABDURRAHMAN', 4, 'JL. HAMZAH KUNCIT NO. 184\r\n', 7),
(112, 2021289, 'MUHAMMAD HAIKAL', 'L', 'Palembang', '2014-06-19', 'MARINI', 4, 'PERUM TOP AMIN MULYA JL. BERINGIN II BLOK F 27\r\n', 7),
(113, 2021303, 'NAFIZ ARIZKY', 'L', 'Palembang', '2015-03-21', 'NOPAN ARIS', 4, 'PERUM OPI. JLN. OPI IV LRG. MARKISA I BLOK D NOMOR 26\r\n', 7),
(114, 2021299, 'NATHAN PRANAFIFO ABIGAIL', 'L', 'OKU TIMUR', '2014-09-12', 'DENI PERDANA', 4, 'TANAH MERAH BELITANG MADANG RAYA\r\n', 7),
(115, 2021307, 'NURHALIZA PUTRI WIGO SOEKARNO', 'P', 'Palembang', '2014-09-17', 'WIGO ADHA SUKARNO', 4, 'JALAN KOPRAL URIP NO. 67PLAJU ILIR PALEMBANG\r\n', 7),
(116, 2021278, 'RAZQA SHAQIL ALEKI', 'L', 'Palembang', '2015-09-05', 'ASTAMAN', 4, 'JL. PANCA USAHA RT. 052 RW. 014\r\n', 7),
(117, 2021282, 'REI AL RAZQA KUSUMA ARASY', 'L', 'Palembang', '2015-04-19', 'REZA TEJA KUSUMA', 4, 'JL. PDAM TIRTA MUSI NO 821\r\n', 7),
(118, 2021285, 'THANIA PUTRI AHMADI', 'P', 'Palembang', '2015-05-08', 'FERRY AHMADI', 4, 'JLN. OPI 1 PERUMAHAN ANGGREK\r\n', 7),
(119, 2021277, 'AFIFAH FATIYAH SYAKIRA', 'P', 'KAYU AGUNG', '2014-09-30', 'MUHAMMAD YUSUF', 5, 'BERINGIN RAYA BLOK HH NO. 24\r\n', 7),
(120, 2021306, 'AHMAD FAIQ GHIFARI', 'L', 'Palembang', '2015-06-09', 'ENDRIA BERMANSYAH', 5, 'KOMP. GRIYA MUSI BLOK N. NO.11\r\n', 7),
(121, 2021294, 'BASO NURHAN AFKAR', 'L', 'Palembang', '2015-05-02', 'TANAWIR', 5, 'KOMPLEK CENDANA BLOK A 1 NO.1 OPI JAKABARING\r\n', 7),
(122, 2021305, 'CHERYELLE ZALNIE AZZAHRA', 'P', 'Palembang', '2015-04-06', 'AFRIZAL EFFENDY', 5, 'JL. KH WAHID HASYIM KEL TUAN KENTANG NO.1260\r\n', 7),
(123, 2022, 'ENZY ELFAAZ KURNIAWAN', 'L', 'BALI', '2015-06-25', 'ANDRI K', 5, 'JL TUKAD BADUMG XI B NO A3 RENON DENPASAR\r\n', 7),
(124, 2021301, 'HEART KHAYLILLA ZIDNI PERDANA', 'P', 'SURAKARTA', '2015-02-09', 'GILANG PERDANA', 5, 'JL. TAMBORA TIMUR 14\r\n', 7),
(125, 2021288, 'M. ALFATHI BAYHAQI PRATAMA', 'L', 'Palembang', '2015-01-17', 'RIZKI PRATAMA SAPUTRA', 5, 'KOMPLEK TOP JL. BERINGIN 1 BLOK J NO. 18\r\n', 7),
(126, 2021292, 'M. KEANU ALIFA RIZKI', 'L', 'Palembang', '2015-04-15', 'EVO JULIANTO', 5, 'OPI REGENCY II TOPAZ RESIDENCE BLOK E II\r\n', 7),
(127, 2021293, 'VARISHA RAIKA ALMIRA', 'P', 'Palembang', '2015-08-01', 'RAHMAT NOVA', 5, 'JLN. NUSA TENGGARA IV NO. AQ7 OPI JAKABARING\r\n', 7),
(128, 2020244, 'Adeeva Reza Myesha', 'P', 'Palembang', '2014-03-31', 'MUHAMMAD REZA', 6, 'JL. TALANG PETAI NO. 1016 A PLAJU\r\n', 7),
(129, 2020259, 'AHMAD ABDURROZAQ', 'L', 'Palembang', '2013-08-14', 'FAHRURROZI', 7, 'JL. BATAM PERUMAHAN HAURA PRABU BLOK B NO 2 RT 007/ RW 003 KEL GUNUNG IBUL KEC P\r\n', 7),
(130, 2019206, 'AHMAD RIZKI ILOFA', 'L', 'Palembang', '2013-03-07', 'CHAIRUL ANSOR', 8, 'JLN. CENDANA II BLOK FF 50 PERUM TOP JAKABARING\r\n', 7),
(131, 2019201, 'AFIFAH KHAIRAH AZZAHRA', 'P', 'Palembang', '2013-09-19', 'APRI MAIKEL JEKSON', 9, 'JL TANGGA TAKAT LR AMILIN NO.999 A\r\n', 7),
(132, 2018170, 'AFIFA AISYAH ALMAHERA', 'P', 'Palembang', '2012-06-30', 'RUSLAN', 10, 'PERUM TOP JLN. CEMARA II BLOK II NO.02\r\n', 7),
(133, 2017113, 'ALYLAH PUTRI NASYIRAH', 'P', 'Palembang', '2010-07-25', 'Agustri Irawan', 12, 'JL. SRIJAYA LR PANCA KARYA NO 588\r\n', 7),
(134, 2017136, 'AHMAD ALFI MUBAROK', 'L', 'Palembang', '2011-10-06', 'EDY THAMRIN', 23, 'JL. PAK. ABDURROHIM NO. 833\r\n', 7),
(135, 2016105, 'ALISYA NURUL SAFINA', 'P', 'Palembang', '2010-01-24', 'UMBAR RIANTO', 13, 'JL. PALEM RAYA PERUM TOP ATLIT AMIN MULYA BLOK AA NO.14\r\n', 7),
(136, 2022343, 'A  HIDZFAR FAYYASY', 'L', 'Palembang', '2015-10-06', 'Ahmad Sundoko', 4, 'Jl. Tegal Binangun Lr. Karang Anyar No.1247\r\n', 1),
(137, 2022340, 'ABDURAHMAN ALKAUSAR', 'L', 'Bogor', '2016-04-11', 'Insan Kamil', 4, 'Jln. Tegal Binangun Komp.Royal Ressort RG29\r\n', 1),
(138, 2022332, 'ACHMAD ALARIC VERREL', 'L', 'Palembang', '2016-01-26', 'Wahyu Hidayat', 4, 'Jln. Palem Raya Blok FF No.29\r\n', 1),
(139, 2022321, 'ACHMAD NIZAM', 'L', 'Palembang', '2016-04-18', 'Febri Saputra', 4, 'Lrg. Mutiara IV No.1154\r\n', 1),
(140, 2022350, 'ADIFA JANNAH SYAUQIAH', 'P', 'Palembang', '2016-11-01', 'Febriansyah', 4, 'Jl. Opi V Blok F 48\r\n', 1),
(141, 2022351, 'ADEEVA AFSHEEN WIYONO', 'P', 'Sidoarjo', '2016-02-17', 'Teguh Wiyono', 4, 'Jl. Ketarpati \r\n', 1),
(142, 2022355, 'AISYAH AYUDIA INARA', 'P', 'Palembang', '2016-10-27', 'Iwan Setiawan', 4, 'Perum OPI Jl. Krakatau Blok AD No.16\r\n', 1),
(143, 2022349, 'ALIKA NAILA PUTRI', 'P', 'Palembang', '2015-12-30', 'Agus Saputra', 4, 'Lorong Halim Rt 49 Rw 10 Kel.5 Ulu \r\n', 1),
(144, 2022344, 'ALRAFAEYZA ADSKHAN ALVARO', 'L', 'Palembang', '2015-12-14', 'Rendra Anggriawan', 4, 'Jl. D.J. Panjaitan Lrg. Sinar Ladang 1 No.09\r\n', 1),
(145, 2022338, 'ANINDITA AQILA ZAHRA', 'P', 'Palembang', '2016-03-03', 'Leo Jupiter', 4, 'Jl. H. Hamzah Kuncit Gang Jawa\r\n', 1),
(146, 2022358, 'ANISA RIZKI RAMADHANI', 'P', 'Palembang', '2015-07-09', 'Hendry Pabean', 4, 'Jl. Kimerogan Lr. Amal Kemasrino Kertapati Palembang\r\n', 1),
(147, 2022334, 'AQIL  AL ZAFRAN YUSUF', 'L', 'Palembang', '2016-08-17', 'Ade Nugraha', 4, 'Jln. Pendidikan Perumahan Saphire Residence Blok G1\r\n', 1),
(148, 20223344, 'AQIL  AL ZAFRAN YUSUF', 'L', 'Palembang', '2016-08-17', 'Ade Nugraha', 4, 'Jln. Pendidikan Perumahan Saphire Residence Blok G1\r\n', 1),
(149, 2022346, 'CAKRAWALA REIZO ZAMSYAR', 'L', 'Tokyo-jepang', '2016-08-15', 'Zamsyar Giendhra Fas', 4, 'Opi Regency 2, Komplek TOPAZ 1 Blok B No. 11, Jakabaring\r\n', 1),
(150, 2022345, 'HARITS MUHAMMAD AL FATIH', 'L', 'Palembang', '2016-01-03', 'Amrianto', 4, 'Jln. Pangeran Ratu Perum Amin Mulya\r\n', 1),
(151, 2022363, 'INAYA AZMI ATHIFA', '', 'Tanggerang', '2015-10-08', 'Muhammad Ilham', 4, 'OPI 1 Anggrek Recident Blok AB 08\r\n', 1),
(152, 2022359, 'KHALIQA RAFANDA YOVASIANA', 'P', 'Garut', '2016-09-05', 'Susi Yuliana', 4, 'Royal Resort Residence, Jalan Tegal Binangun Blok Rj 01\r\n', 1),
(153, 2022353, 'M BRAMANTYO FATIH JOETHIEN', 'L', 'Palembang', '2015-05-09', 'Dodi Sutejo', 4, 'Jl. Sulawesi Blok AC 07 Komp. Perum OPI PNS\r\n', 1),
(154, 2022352, 'M. GIBRAN ATHALLAH', 'L', 'Palembang', '2015-12-10', 'Vherry Andora', 4, 'Perum GGA OPI Jakabaring\r\n', 1),
(155, 2022335, 'M. SULTAN NABHAN', 'L', 'Palembang', '2016-08-24', 'M. Firdaus', 4, 'Jl. Pendidikan Kom. Sapphire Residence C21\r\n', 1),
(156, 2022348, 'MUHAMMAD ATHARIQ ALFARIZQY', 'L', 'Palembang', '2016-04-02', 'Juliansyah', 4, 'Jln. Panca Usaha Lrg. Kenangan II\r\n', 1),
(157, 2022347, 'MUHAMMAD YUKA SANDROGI', 'L', 'Palembang', '2015-11-17', 'Yudhy Setiady', 4, 'Jln. Kh. Azhari Lrg. Pratu Musa No.535 Rt.15 Rw 004\r\n', 1),
(158, 2022337, 'NESSA NUR AQILAH', 'P', 'Palembang', '2016-09-04', 'Arif Kurniawan', 4, 'Lavender Residence No E8 Tegal Binangun\r\n', 1),
(159, 2022336, 'NEVIN NUR ALFATAH', 'L', 'Palembang', '2016-09-04', 'Arif Kurniawan', 4, 'Lavender Residence No E8 Tegal Binangun\r\n', 1),
(160, 2022342, 'QUINSHA  ZAKYA RAMADHANI', 'P', 'Palembang', '2016-06-15', 'Joko', 4, 'Jl. Opi 2 Komp. Cempaka 2 No. B15\r\n', 1),
(161, 2022362, 'ABIZA NAJWAN ARRAMI', 'L', 'Palembang', '2016-04-25', 'Nazori', 5, 'Perum Top Jl. Gub.H.A. Bastari Blok E2 No.25\r\n', 1),
(162, 2022331, 'ABYAN REYNAND ARASY', 'L', 'Palembang', '2015-09-01', 'Yokki Firmansyah', 5, 'Jl. Cempaka 2 Blok H8 No.8\r\n', 1),
(163, 2022317, 'ACHMAD FA&#039;ITH ARKAN', 'L', 'Palembang', '2016-03-06', 'Jailani Rahman', 5, 'Jl. HM. Mayjen Ryacudu Samping Pamor \r\n', 1),
(164, 2022322, 'AFIKA NADILLA', 'P', 'Palembang', '2015-01-24', 'Neko Robiansyah', 5, 'Lrg. Mutiara IV No.1154\r\n', 1),
(165, 2022315, 'AFIYAH FATIMAH AZZAHRA', 'P', 'Palembang', '2016-04-15', 'Apri Makel Jakson', 5, 'Jalan Tangga Takat Lrg Amilin No 99 A\r\n', 1),
(166, 2022319, 'ATHARIZZ ANARGYA PUTRANTO', 'L', 'Batam', '2016-10-26', 'Eriyanto', 5, 'Opi Regency 2 Topaz Residence Blok L 12, Jakabaring\r\n', 1),
(167, 2022314, 'AQUINA QAIREEN AZZAHRA K', 'P', 'Bandung', '2016-07-06', 'Kamaladin', 5, 'Jl. Mayjen HM, Lr. Garuda II\r\n', 1),
(168, 2022312, 'CARISSA SALSABILLA', 'P', 'Palembang', '2016-09-08', 'M. Reza Fahlevi', 5, 'Jl. Simpang 4 Bakaran No. 55\r\n', 1),
(169, 2022326, 'DZAKIRA HANNA ASSYIFA', 'P', 'Palembang', '2016-03-30', 'Rustam Efendi', 5, 'Aiptu.A. Wahab No 398\r\n', 1),
(170, 2022327, 'DILFANISSA ANANTAVIRYA', 'P', 'Palembang', '2016-02-04', 'Dio Septa Pratama', 5, 'Jl. Demang Lebar Daun Gg. Gembira No.17\r\n', 1),
(171, 2022357, 'ISTAFA AKHTAR MAHARAJA', 'L', 'Palembang', '2016-01-12', 'Febrianysah', 5, 'Jalan Kemang Manis Nomor 611\r\n', 1),
(172, 20223577, 'KEMAS JALALUDIN KAMIL', 'L', 'Palembang', '2015-04-04', 'Muhammad Teguh', 5, 'Jl. Gubernur H. Bastari\r\n', 1),
(173, 2022316, 'KIRANA KHAULATUNNISA', 'P', 'Palembang', '2016-03-25', 'Mahmudi', 5, 'Jl. H.A. BASTARI OPI Regency 2 TOPAZ 1 Blok K8\r\n', 1),
(174, 2022320, 'M. RAUFA ALFARIZI', 'L', 'Palembang', '2015-08-01', 'Willy Virdian', 5, 'Jln. Opi II Komplek Cempaka Blok A.3 OPI\r\n', 1),
(175, 2022356, 'MUHAMMAD FAUZI', 'L', 'Palembang', '2015-12-31', 'Abdullah', 5, 'Pangeran Ratu Lorong Anggrek 2\r\n', 1),
(176, 2022354, 'MUHAMMAD RAFA ATHALLAH', 'L', 'Palembang', '2016-07-07', 'Muzzakir', 5, 'Jl. KH. Balqi Komplek Permata Hijau Blok C3. No.4\r\n', 1),
(177, 2022330, 'MUHAMMAD ZAFRAN FULKARI', 'L', 'Palembang', '2015-12-31', 'Muhammad Reza', 5, 'Jl Tegal Binangun Lorong Talang Petai\r\n', 1),
(178, 2022323, 'MUHAMMAD ZHAFRAN ALFARISQY', 'L', 'Palembang', '2015-09-11', 'Dwi Kurniawan', 5, 'Jln. Mayor Salim Batubara Lorong Muslimin No.67 Sekip\r\n', 1),
(179, 2022328, 'SYAKIRAH ALFATUNNISSA', 'P', 'Lubuk Linggau', '2016-04-13', 'Myzari Mawan', 5, 'Jl. Cendana II\r\n', 1),
(180, 2022318, 'SYIFA ANNISA PUTRI', 'P', 'Palembang', '2016-08-01', 'Yuda Trijaya', 5, 'Perum TOP Amen Mulya Jln. Cemara 2 Blok Ii No.3\r\n', 1),
(181, 2022341, 'RASYDAN EL SAKHA KUSUMA', 'L', 'Palembang', '2016-08-17', 'Yanto Afriansyah', 5, 'Lorong Semeru Opi Jakabaring\r\n', 1),
(182, 2022325, 'RAYYAN ATHALLAH ELRIZKY', 'L', 'Palembang', '2016-05-28', 'Erwin Arityadi', 5, 'Perum Top Blok E8 No.1\r\n', 1),
(183, 2022360, 'SULTAN RUNAKO ADAM MUHAMMAD', 'L', 'Palembang', '2015-11-01', 'Ian Andriansyah', 5, 'Jln. Wijaya Kesuma No. 80 Demang Lebar Daun\r\n', 1),
(184, 2021283, 'ADIBA QUEENARA MYESSHA', 'P', 'Palembang', '2015-10-28', 'FERDINANO', 6, 'KOMPLEK GRAND CITY BLOK  G 09 NO.22\r\n', 1),
(185, 2021285, 'ADIVA KANYA AGUNG', 'P', 'JAKARTA', '2015-03-04', 'AGUNG NOPRIANSYAH', 6, 'JL. JEND. B. UTOYO LR. SUMUR TINGGI 2 NO. 1161\r\n', 1),
(186, 2021277, 'AFIFAH FATIYAH SYAKIRA', 'P', 'KAYU AGUNG', '2014-09-30', 'MUHAMMAD YUSUF', 7, 'BERINGIN RAYA BLOK HH NO. 24\r\n', 1),
(187, 2020244, 'ADEEVA REZA MYESHA', 'P', 'Palembang', '2014-03-31', 'MUHAMMAD REZA', 8, 'JL. TALANG PETAI NO. 1016 A PLAJU\r\n', 1),
(188, 2020259, 'AHMAD ABDURROZAQ', 'L', 'Palembang', '2013-08-14', 'FAHRURROZI', 9, 'JL. BATAM PERUMAHAN HAURA PRABU BLOK B NO 2 RT 007/ RW 003 KEL GUNUNG IBUL KEC P\r\n', 1),
(189, 2019206, 'AHMAD RIZKI ILOFA', 'L', 'Palembang', '2013-03-07', 'CHAIRUL ANSOR', 10, 'JLN. CENDANA II BLOK FF 50 PERUM TOP JAKABARING\r\n', 1),
(190, 2019201, 'AFIFAH KHAIRAH AZZAHRA', 'P', 'Palembang', '2013-09-19', 'APRI MAIKEL JEKSON', 11, 'JL TANGGA TAKAT LR AMILIN NO.999 A\r\n', 1),
(191, 2018170, 'AFIFA AISYAH ALMAHERA', 'P', 'Palembang', '2012-06-30', 'RUSLAN', 12, 'PERUM TOP JLN. CEMARA II BLOK II NO.02\r\n', 1),
(192, 2017113, 'ALYLAH PUTRI NASYIRAH', 'P', 'Palembang', '2010-07-25', 'Agustri Irawan', 13, 'JL. SRIJAYA LR PANCA KARYA NO 588\r\n', 1),
(193, 2017136, 'AHMAD ALFI MUBAROK', 'L', 'Palembang', '2011-10-06', 'EDY THAMRIN', 14, 'JL. PAK. ABDURROHIM NO. 833\r\n', 1),
(195, 40021, 'AL HAFISH RAFAEL SYAPWAN', 'L', 'Palembang', '2011-01-24', 'EDY SYAPWAN', 15, 'JL. PAK. ABDURROHIM \r\n', 1),
(196, 400220, 'AQILA PUTRI NAJLA', 'P', 'Palembang', '2010-10-26', 'NURSYAMSI', 15, 'PERUM OPI LR. JATI III BLOK F 04\r\n', 1),
(197, 400221, 'AZ ZAHRA AULIYA PRAFITO', 'P', 'TANGGERANG SELATAN', '2010-07-26', 'ONGKI PRAFITO', 15, 'JL. SAPTA MARGA LR RAMBUTAN \r\n', 1),
(198, 400222, 'MUHAMMAD CAHAYA AZAM', 'L', 'Palembang', '2010-09-25', 'MUHAMMAD SAMSUL', 15, 'JL TEGAL BINANGUN NO. 092\r\n', 1),
(199, 400223, 'DAFA SURYA PRATAMA', 'L', 'Palembang', '2010-07-04', 'FERRY KUSNADI', 15, 'JL. TANJUNG INDAH NO 37\r\n', 1),
(200, 400224, 'DEGAS RAJA PRATAMA', 'L', 'JAKARTA', '2010-05-01', 'HERIANSYAH', 15, 'JL. PALEM II BLOK AB 02\r\n', 1),
(201, 400225, 'ERSA AYU LESTARI', 'P', 'Palembang', '2010-09-30', 'EDY SANTOSO', 15, 'PERUM TOP NO 11-12\r\n', 1),
(202, 400226, 'FARRAS ADELFIO', 'L', 'Palembang', '2010-05-17', 'MUSLICH, S.H., M. H.', 15, 'INDRA GIRI JAYA TEGAL\r\n', 1),
(203, 400227, 'KHAIRUL FAHRI', 'L', 'Palembang', '2010-10-08', 'EDI', 15, 'PERUM GRIYA LEMATANG INDAH II BLOK M NO 24\r\n', 1),
(204, 400228, 'M. ATHA HARYO BIMO', 'L', 'Palembang', '2010-10-29', 'DEWI ARIYANTI', 15, 'JL. HALIM GG IV NO. 1574\r\n', 1),
(205, 400229, 'MUHAMMAD AZIZ PASHA', 'L', 'Palembang', '2010-06-11', 'H. HABIBULLAH', 15, 'PERUM OPI JL. CENDRAWASIH 4 BLOK. III NO. 54\r\n', 1),
(206, 400230, 'MUHAMMAD FIKRI PEBRIANSYAH', 'L', 'Palembang', '2011-02-06', 'MUHAMMAD TAN', 15, 'JL KAPT ABDULLAH LR AMAN SENTOSA\r\n', 1),
(207, 400231, 'M. KILAT PRAYOGA', 'L', 'Palembang', '2010-04-10', 'GUNTUR ISWAHYUDI, SH', 15, 'PERUM LIVERPOOL 2 BLOK F NO.59\r\n', 1),
(208, 400232, 'M. NABIL ABBAS YUSUF', 'L', 'Palembang', '2010-07-11', 'M. SYAFEI RAHMAN', 15, 'JLN. PENDIDIKAN PERUM TOPAS \r\n', 1),
(209, 400233, 'MUHAMMAD RAFFA JAYA WARDHANA', 'L', 'Palembang', '2011-01-12', 'HARRYO HUSNI JAYA WARDHANA', 15, 'JALAN OPI 1 ANGGREK RECIDENT BLOK AC 73\r\n', 1),
(210, 400234, 'M. RAFFA NOVRIANSYAH', 'L', 'Palembang', '2010-11-03', 'AGUS HERIYANTO', 15, 'OPI REGENCY 2\r\n', 1),
(211, 400235, 'M. RAMADHAN RAFI PUTRA', 'L', 'Palembang', '2010-09-02', 'FARLIANSYAH', 16, 'JL. SRIJAYA LR PANCA KARYA \r\n', 1),
(212, 400236, 'MUHAMMAD REYHAN ABQARIN DICO', 'L', 'Palembang', '2009-11-09', 'JUNAIDI', 16, 'JLN. Jakabaring LRG. Habibi \r\n', 1),
(213, 400237, 'MUHAMMAD TAUFAN ABDULLAH', 'L', 'Palembang', '2010-04-20', 'ABDUL RONI', 16, 'Perum OPI LRG. Cendrawasih V Blok II NO 10\r\n', 1),
(214, 400238, 'MUHAMMAD ZAMIR ALTHAF', 'L', 'Palembang', '2011-02-19', 'ANTONIO', 16, 'JL. TANAH MERAH LR. CENDANA I\r\n', 1),
(215, 400239, 'M. ZEID ABDILLAH', 'L', 'Palembang', '2010-08-29', 'ALI MURTADO', 16, 'Perum OPI Cluster Almond \r\n', 1),
(216, 400240, 'MUHAMMAD IKRAM', 'L', 'Palembang', '2010-01-10', 'ABDUL RAHMAN', 16, 'JL. KH. Balqi Komplek Permata Hijau \r\n', 1),
(217, 400241, 'NAJAH AQILAH AMALIA', 'P', 'Palembang', '2010-10-22', 'ERWIN', 16, 'JLN. KI Merogan NO. 1973\r\n', 1),
(218, 400242, 'OKA', 'L', 'HARAPAN JAYA', '2008-12-18', 'APALA', 16, 'Perum TOP Amin Mulya FF NO 05\r\n', 1),
(219, 400243, 'PUTRI FIRRA MARETA', 'P', 'Palembang', '2011-03-18', 'M. FIRDAUS, SH, MH', 16, 'JL. KH. Wahid NO 1237\r\n', 1),
(220, 400244, 'RADEN FATIH ATHAYA RIZKIANSYAH', 'L', 'Palembang', '2010-04-05', 'ROY FAJAR RIZKIANSYAH', 16, 'PERUM TOP JL. GH Bastari Blok A3 NO. 56\r\n', 1),
(221, 400245, 'RAFA FAEYZA', 'L', 'Palembang', '2010-11-29', 'YOJA KANCANA', 16, 'JLN. Tembok Baru Lrg Veteran \r\n', 1),
(222, 400246, 'RAFFA IBNI SELIAN', 'L', 'Palembang', '2010-08-30', 'UMAR DANI', 16, 'Jln. Sumatera BC 23 Perum OPI\r\n', 1),
(223, 400247, 'RIFKI MAULIDIN', 'L', 'Palembang', '2010-02-17', 'ABDUL MAJID', 16, 'KOMP. JAKAPERMAI BLOK J NO 44 JLN GUB HA BASTARI\r\n', 1),
(224, 400248, 'RUMAISA SHAQUILLA', 'P', 'Palembang', '2011-03-26', 'ANGGORO YUDHO PRASONGKO', 16, 'Komplek Kedamaian Permai Jl.Tapir \r\n', 1),
(225, 400249, 'SHOFIYYAH SALSABILA', 'P', 'Palembang', '2010-01-02', 'YUDA TRIJAYA', 16, 'JL. KH. Wahid Hasyim \r\n', 1),
(226, 400250, 'RAFA PRADITA', 'L', 'Palembang', '2009-12-04', 'OKSI MERIANDI, SH., MH.', 16, 'JL. Gotong Royong No 4012\r\n', 1),
(227, 400185, 'AFRAH FANNY ABDILLAH', 'P', 'Batam', '2009-10-12', 'M. IQBAL P.', 17, 'LORONG SUNGAI SEMASJID \r\n', 1),
(228, 400201, 'MUHAMMAD ABDUL AZIZ', 'L', 'Palembang', '2009-12-28', 'NOVI IRAWAN', 18, 'JL. YAKTAPENA 3 BARAT \r\n', 1),
(229, 400141, 'ABDAN SYAKUR', 'L', 'Palembang', '2008-12-03', 'HARIANSYAH', 19, 'JL. TALANG PETAI PLAJU\r\n', 1),
(230, 400163, 'M. NABIL NATA', 'L', 'Palembang', '2009-01-08', 'NATSIR', 20, 'JL ABIKUSNO CS\r\n', 1),
(231, 400185, 'AFRAH FANNY ABDILLAH', 'P', 'Batam', '2009-10-12', 'M. IQBAL P.', 15, 'LORONG SUNGAI SEMASJID \r\n', 7),
(232, 400186, 'AMIRAH ZAHRA RAMADHYANTI', 'P', 'TANGGERANG SELATAN', '2009-09-16', 'RIKA ANVARIANSYAH', 15, 'PERUM OPI KUTILANG V\r\n', 7),
(233, 400187, 'ANDRA AFFANDI RA&#039;FI', 'L', 'Palembang', '2009-04-28', 'EDI ISKANDAR', 15, 'JLN AIPTU A WAHAB \r\n', 7),
(234, 400188, 'ARIEF SUGINOTO', 'L', 'Palembang', '2009-10-25', 'SUGIMAN', 15, 'JLN NUSA TENGGARA IV PERUM PNS OPI JAKABARING \r\n', 7),
(235, 400189, 'BALQIS MAYSHAROH PUTRI', 'P', 'Palembang', '2009-04-30', 'DEDY HARYANTO', 15, 'JL. CAMAR  PERUM TIGA GAJAH INDAH\r\n', 7),
(236, 400190, 'FAEIYZAH AULIYA SHAFA&#039;AH', 'P', 'Palembang', '2009-09-27', 'AHMAD FERIYANTO', 15, 'JL. CENDANA II  PERUMAHAN TOP AMEN MULYA\r\n', 7),
(237, 400191, 'FEILLISYA PUTRI ANJANI', 'P', 'Palembang', '2009-09-01', 'ERWAN SYAPUTRA', 15, 'JL.MATARAM 1 LRG PAJAJARAN \r\n', 7),
(238, 400192, 'KHALLILAH AUREL SYAPWAN', 'P', 'Palembang', '2010-06-30', 'EDY SYAPWAN', 15, 'LK-1\r\n', 7),
(239, 400193, 'KHALISHAH AFIFAH', 'P', 'Palembang', '2009-04-28', 'WAHYUDI', 15, 'JL. KH. WAHID NO 1345\r\n', 7),
(240, 400194, 'M. ABYAN ALDY ALFATIH', 'L', 'Palembang', '2009-04-17', 'AFRINAL PADMA', 15, 'JL. PUTRI KEMBANG DADAR \r\n', 7),
(241, 400195, 'M. DAFFA AL DZIKRO', 'P', 'PANGKAL PINANG', '2009-04-06', 'AGUS MUSLIM HAYAT', 15, 'JL.OPI 3 CENDRAWASI 2 \r\n', 7),
(242, 400196, 'M. FADHLAN ALKINDI', 'L', 'Palembang', '2009-04-28', 'YUDI ISKANDAR', 15, 'PERUMAHAN OPI CLUSTER ANGGREK  JAKABARING PALEMBANG\r\n', 7),
(243, 400197, 'M. FARHAN', 'L', 'Palembang', '2009-05-17', 'AKHMAD ZAKIR', 15, 'JLN. CENDANA II  PERUM TOP JAKABARING\r\n', 7),
(244, 400198, 'M. RASYA AKBAR', 'L', 'Palembang', '2009-06-15', 'ENDRIYANTO', 0, 'JL. TEGAL BINANGUN LR.PIPA NO 12\r\n', 7),
(245, 4001988, 'M. RASYA AKBAR', 'L', 'SEMARANG', '2009-06-15', 'ENDRIYANTO', 15, 'JL. TEGAL BINANGUN LR.PIPA NO 12\r\n', 7),
(246, 400199, 'M. SYAHILAN', 'L', 'Palembang', '2009-01-29', 'SARNUBI', 15, 'PERUM TOP AMEN JAKABARING\r\n', 7),
(247, 400200, 'MAZAYA KALEELA DAREN', 'P', 'Palembang', '2009-01-04', 'HENDRI', 15, 'PLAJU UJUNG \r\n', 7),
(248, 400201, 'MUHAMMAD ABDUL AZIZ', 'L', 'Palembang', '2009-12-28', 'NOVI IRAWAN', 16, 'JL. YAKTAPENA 3 BARAT \r\n', 7),
(249, 400202, 'MUHAMMAD ADLAN FA&#039;IZ', 'L', 'Palembang', '2009-11-08', 'ISKANDAR', 16, 'JL. JEND. B.UTOYO LR. SUMUR TINGGI \r\n', 7),
(250, 400203, 'NAYLA ADZAKIAH', 'P', 'Palembang', '2009-11-09', 'DIAN SETIADI', 16, 'JL TANGGA TAKAT LR AMILIN \r\n', 7),
(251, 400204, 'QUINSYA ZIRCARINTHA', 'P', 'LAHAT', '2009-10-30', 'ADI MUKHLOSIN', 16, 'PERUM OPI LRG JATI II BLOK M NO 76\r\n', 7),
(252, 400205, 'RUQAYAH KHAIRUNNISA AFIRNA', 'P', 'Palembang', '2008-12-20', 'FIRMANSYAH', 16, 'JL. INSP. MARZUKI LR MUSI INDAH\r\n', 7),
(253, 400206, 'SADIRA KAMILA', 'P', 'Palembang', '2009-04-04', 'HASRUDDIN', 16, 'JL. A.YANI LORONG GUMAI \r\n', 7),
(254, 400207, 'SELMA PUTRI ATHAYA', 'P', 'Palembang', '2009-05-15', 'M. WILLY VIRDIAN', 16, 'JL.PANCA USAHA\r\n', 7),
(255, 400208, 'SYAFA ALVINO OKTARIO', 'L', 'MUARA DUA', '2009-10-26', 'WAWAN SUPRANDI', 16, 'JL. TANJUNG INDAH\r\n', 7),
(256, 400209, 'SYARIFAH HUBAIBAH RUQAYYAH', 'P', 'Palembang', '2009-04-19', 'AHMAD MIZAR SHAHAB', 16, 'KOMP. SANGKURIANG BLOK P \r\n', 7),
(257, 400210, 'ZALFA ATHIRA KHAIRUNNISA', 'P', 'Palembang', '2009-03-20', 'NOPRIANTO', 16, 'KOMP. SANGKURIANG \r\n', 7),
(258, 400211, 'CAUSA MARCHEL ARVIO', 'L', 'Palembang', '2009-03-01', 'BAGUS NOVIANTO', 16, 'JL. PANGERAN TIRTAYASA GRIYA BUKIT KENCANA BLOK II CAMPANG RAYA\r\n', 7),
(259, 400213, 'TSURAYA SALSABIYLA', 'P', 'Palembang', '2009-09-26', 'MUHAMMAD BADARUDDIN', 16, 'JL OPI 1 KOMPLEK ANGGREK RESIDENCE\r\n', 7),
(260, 400215, 'MUZAFFAR AZZAM SETIAWAN', 'P', 'Palembang', '2009-10-06', 'POLIM SETIAWAN', 16, 'PERUM AMIN MULYA JL PALEM I\r\n', 7),
(261, 400216, 'BEBBY RANIAH ARASY', 'P', 'Palembang', '2009-05-01', 'MARTIYANSAH PUTERA, SE.', 16, 'KOMPLEK TOP 70 AMEN MULYA JL. CENDANA BLOK GG 56\r\n', 7),
(262, 400217, 'AHMAD ALFI BAROKAH', 'P', 'Palembang', '2009-04-27', 'MUHAMMAD DAVID', 16, 'OPI VI Bogenvil Blok K-32\r\n', 7),
(263, 400218, 'RAFIKA NATASYAH IRAWAN', 'P', 'Palembang', '2009-07-13', 'IRAWAN', 16, 'JLN BUNGARAN I\r\n', 7),
(264, 400141, 'ABDAN SYAKUR', 'L', 'Palembang', '2008-12-03', 'HARIANSYAH', 17, 'JL. TALANG PETAI PLAJU\r\n', 7),
(265, 400163, 'M. NABIL NATA', 'L', 'Palembang', '2009-01-08', 'NATSIR', 18, 'JL ABIKUSNO CS\r\n', 7),
(266, 400108, 'MUHAMMAD &#039;ADLI SHABRAN MULYA', 'L', 'BENGKULU', '2006-12-10', 'Abdi Sabran', 19, 'Jl. Perum TOP Blok A9 No. 1 RT. 062 RW   017 15 ULU Jakabaring\r\n', 7),
(267, 400123, 'M. YASEER SHIDDIQ', 'L', 'JAMBI', '2007-08-01', 'Asep Dermawan', 20, 'Jln. Maluku 4 Blok B9 OPI PNS Jkabaring\r\n', 7),
(268, 400141, 'ABDAN SYAKUR', 'L', 'Palembang', '2008-04-28', 'HARIANSYAH', 15, 'JL. TALANG PETAI PLAJU\r\n', 8),
(269, 400142, 'ABDUL FATIR AKBAR', 'L', 'Palembang', '2009-11-05', 'M. AZHARI', 15, 'JL. MAKRAYU \r\n', 8),
(270, 400143, 'ABID AL FATAH', 'L', 'Palembang', '2008-08-25', 'K. ISKANDAR, SE', 15, 'JLN BUNGARAN III\r\n', 8),
(271, 400144, 'AFLAH RAYHAN JAYA', 'L', 'Palembang', '2008-12-12', 'HARRYO HUSNI JW', 15, 'JALAN OPI 1 ANGGREK RECIDENT BLOK AC 73\r\n', 8),
(272, 400145, 'AZ ZAHRA SHASYA FADIHILA', 'P', 'Palembang', '2008-05-17', 'DECKY', 15, 'PERUM OPI PNS JAKABARING\r\n', 8),
(273, 400147, 'CAMILLA AZAHRA', 'P', 'Palembang', '2008-03-23', 'SUPRIADI', 15, 'JL. GUB . H. BASTARI KOMP JAKA PERMAI \r\n', 8),
(274, 400149, 'DERU AL GHAZALI', 'L', 'Palembang', '2008-10-16', 'EDWIN YULIUS, S. KM', 15, 'PERUMAHAN OPI JL. BANGAU 1 \r\n', 8),
(275, 400148, 'DEVANDRA HURAIRAH TREEZAHEL', 'L', 'Palembang', '2008-09-04', 'PIKES', 15, 'PERUM OPI BLOK I LRG CENDRAWASI V NO 49\r\n', 8),
(276, 400151, 'FEBRI', 'L', 'Palembang', '2009-02-28', 'JOKO', 15, 'JL. SOAK LR. SEJAHTERA NO. 124\r\n', 8),
(277, 400152, 'FILDZAH SITI SALSYALIYAH', 'P', 'Palembang', '2008-11-07', 'MUHAMMAD NUR TEGUH', 15, 'JLN.BERINGIN RAYA BLOK HI NO 02\r\n', 8),
(278, 400153, 'INNAKA PUTRI ANGELIA LEGA', 'P', 'Palembang', '2008-01-10', 'NASRUL GANDI ARSAN', 15, 'JLN. GUB. H. BASTARI\r\n', 8),
(279, 400154, 'M. AHNAFIANSYAH', 'L', 'Palembang', '2009-06-26', 'FIRLI HIDAYAH', 15, 'JLN KH AZHARI RT 005 RW 001 12 ULU PALEMBANG \r\n', 8),
(280, 400155, 'M. ALVIAN', 'L', 'Palembang', '2008-07-17', 'HAMBALI DUNGCIK', 15, 'JL. BUNGARAN 5 \r\n', 8),
(281, 400157, 'M. DAFI ALMUZAKY', 'L', 'Palembang', '2008-07-24', 'MIZAN', 15, 'JALAN KERTAPATI\r\n', 8),
(282, 400158, 'M. FAKHRI ABDILLAH', 'L', 'Palembang', '2009-07-05', 'ALBU KALAM', 15, 'JL.KOPRAL URIP NO 231\r\n', 8),
(283, 400159, 'M. HABIBULLAH', 'L', 'Palembang', '2008-08-06', 'HERMAN', 15, 'JLN SAPTA MARGA LR. RAMBUTAN  BUKIT SANGKAL PALEMBANG \r\n', 8),
(284, 400160, 'M. HARIST', 'L', 'Palembang', '2008-08-19', 'AKHMAD SUWARMAN', 15, 'PERUM OPI LR. CENDRAWASIH \r\n', 8),
(285, 400161, 'M. KHANS PRAWIRA NEGARA', 'L', 'Palembang', '2008-12-13', 'HARRY FERDIAN', 15, 'JL. A.YANI LR. KH. UMAR\r\n', 8),
(286, 400162, 'M. NABHAN MAHIR', 'L', 'Palembang', '2008-07-13', 'SUDIRMAN', 15, 'JLN. TEMBOK BARU LORONG VETERAN PALEMBANG\r\n', 8),
(287, 400163, 'M. NABIL NATA', 'L', 'Palembang', '2009-01-08', 'NATSIR', 16, 'JL ABIKUSNO CS\r\n', 8),
(288, 400167, 'M. RAFLY', 'L', 'Palembang', '2008-08-08', 'ABDUL HALIM', 16, 'JL. CEMPAKA II\r\n', 8),
(289, 400164, 'M. RIDHO SURYANA', 'L', 'Palembang', '2009-01-03', 'USEP SURYANA', 16, 'JL.LUNJUK JAYA NO 76\r\n', 8),
(290, 400165, 'M. RIFKI FADILLAH', 'L', 'Palembang', '2008-10-24', 'ALBERT HARYADI', 16, 'JLN OPI 1 CEMPAKA 2  RT 065 RW 011 JAKABARING PALEMBANG\r\n', 8),
(291, 400166, 'M. ROFIF ANDRIAWAN', 'L', 'Palembang', '2008-03-15', 'IWAN SETIAWAN', 16, 'PERUM ATLIT BLOK BC 51\r\n', 8),
(292, 400168, 'MARSYA APRILIA PUTRI', 'P', 'Palembang', '2008-04-05', 'ANDI', 16, 'PERUM AMIN MULYA JL. CENDANA \r\n', 8),
(293, 400169, 'MHOZA AROFAH', 'P', 'Palembang', '2008-10-10', 'INDRA BUDI SANTIKA', 16, 'JL.GUB.H.A.BASTARI KOMP.BKN\r\n', 8),
(294, 400170, 'MOHAMMAD MOZA KAHARDANI', 'L', 'KUALA LUMPUR', '2008-02-21', 'MOH. ZALMI KAHARDANI', 16, 'Perum TOP Mulya Jl.Beringin II Blok F-32 Jakabaring\r\n', 8),
(295, 400171, 'NAJLA WILDAD', 'P', 'Palembang', '2008-12-14', 'AHMAD SYUKRI', 16, 'JL TEGAL BINANGUN \r\n', 8),
(296, 400172, 'NAJWA RAMANIA', 'P', 'Palembang', '2009-02-03', 'ATHO ILLAH', 16, 'JALAN ANGGREK UJUNG \r\n', 8),
(297, 400175, 'NIKEISHA GRACE SAFITRI', 'P', 'Palembang', '2008-07-25', 'HUSIN,SH', 16, 'JL. MATARAM I LR PEJAJARAN \r\n', 8),
(298, 400176, 'RAFFA RADITYA PUTRA', 'L', 'Palembang', '2009-03-26', 'ERWIN', 16, 'JLN. MOJOPAHIT \r\n', 8),
(299, 400177, 'RAFI ARIF PRATAMA', 'L', 'Cilacap', '2008-03-13', 'ENDRIYANTO, ST', 16, 'PERUM ATLIT TOP TIPE 100 BLOK A7 \r\n', 8),
(300, 400178, 'RAIHAN AL HAFIDZ', 'L', 'Palembang', '2008-11-06', 'GUNTUR ISWAHYUDI', 16, 'PERUM OPI BAUGENVILLE BLOK K.12\r\n', 8),
(301, 400180, 'SITI KHANSA ALIFA', 'P', 'Palembang', '2009-04-01', 'BOBBY ARYADI', 16, 'JL. PENDIDIKAN PERUMAHAN  TAMAN ANGGREK RESIDENCE \r\n', 8),
(302, 400181, 'SYIFA AQILA', 'P', 'Palembang', '2006-01-02', 'HARDI JANSA', 16, 'JLN PANCA USAHA LRG USAHA 3\r\n', 8),
(303, 400182, 'TEGAR DWI MARLINO', 'L', 'Palembang', '2009-03-26', 'WILLY WIDYA PA', 16, 'JL. BLPT  SEKIP UJUNG\r\n', 8),
(304, 400183, 'YUSUF AKBAR', 'L', 'Palembang', '2007-11-01', 'ABDUL KADIR', 16, 'JLN. SILABERANTI LRG AUR GADING \r\n', 8),
(305, 400184, 'IZZA AMALIA HUMAIRAH', 'P', 'Batam', '2008-01-28', 'MUHAMMAD YUSUF ABDI', 16, 'JL. SAPTA MARGA LR RAMBUTAN \r\n', 8),
(306, 400214, 'MUHAMMAD HANIF ABDILLAH', 'L', 'JAKARTA', '2007-12-27', 'AINUNNISYAH', 16, 'JL TEGAL BINANGUN \r\n', 8),
(307, 400108, 'MUHAMMAD &#039;ADLI SHABRAN MULYA', 'L', 'BENGKULU', '2006-12-10', 'Abdi Sabran', 17, 'Jl. Perum TOP Blok A9 No. 1 RT. 062 RW   017 15 ULU Jakabaring\r\n', 8),
(308, 400123, 'M. YASEER SHIDDIQ', 'L', 'Palembang', '2007-08-01', 'Asep Dermawan', 18, 'Jln. Maluku 4 Blok B9 OPI PNS Jkabaring\r\n', 8),
(309, 400046, 'M. AKBAR BUDI PRAKOSO', 'L', 'Palembang', '2005-09-21', 'Maruk Yulianto', 19, 'Perum PNS OPI Jl. Kalimantan', 8),
(310, 400058, 'MUHAMMAD  ZIDANE ALFARIZI', 'L', 'Palembang', '2005-06-22', 'Ahmad Subandi', 20, 'Jl. Pipa Lr. Cempaka No. 163', 8),
(311, 400196, 'M. FADHLAN ALKINDI', 'L', 'Palembang', '2009-04-28', 'YUDI ISKANDAR', 17, 'PERUMAHAN OPI CLUSTER ANGGREK  JAKABARING PALEMBANG\r\n', 1),
(312, 2019210, 'AVANGARD REFINO ILHAM RISAKOTTA', 'L', 'Palembang', '2013-06-21', 'ALFRINNO RISAKOTTA', 10, 'JL. YAKTAPENA 1 BARAT \r\n', 1),
(313, 2019217, 'MUHAMMAD RAIHAN AR- RAFI', 'L', 'Palembang', '2013-08-02', 'HARISMAN', 10, 'JL.MATARAM 1 LRG PAJAJARAN NO.329\r\n', 1),
(314, 2018163, 'HANNY AISY ATHA ZULAIKHA', 'P', 'Palembang', '2012-06-18', 'HARISMAN', 12, 'JL. MATARAM I LR PEJAJARAN NO. 329\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type_pembayaran`
--

CREATE TABLE `tbl_type_pembayaran` (
  `id_type_pemb` int(5) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_type_pembayaran`
--

INSERT INTO `tbl_type_pembayaran` (`id_type_pemb`, `type`) VALUES
(1, 'Periodik'),
(2, 'Non Periodik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `level` varchar(30) NOT NULL,
  `sessions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `email`, `username`, `pass`, `level`, `sessions`) VALUES
(1, 'Admin', 'ikesapitri1@gmail.com', 'ike', '934bb0aee993a664482a704014a70659f29024c0', 'admin', 'm14st9egvl2cggma20sitmq8ig'),
(2, 'Kepala Yayasan', 'rizqyreus11@gmail.com', 'yayasan', '23349438310fbf6efb8579094440db66533a9dfc', 'eksekutif', 'q0glokitnr12h1lhi24e6k3hdk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lib_tajaran`
--
ALTER TABLE `lib_tajaran`
  ADD PRIMARY KEY (`id_tajaran`);

--
-- Indexes for table `lib_tingkat`
--
ALTER TABLE `lib_tingkat`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- Indexes for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_ktgr_antar`
--
ALTER TABLE `tbl_ktgr_antar`
  ADD PRIMARY KEY (`id_ktgr_antar`);

--
-- Indexes for table `tbl_ktgr_baju`
--
ALTER TABLE `tbl_ktgr_baju`
  ADD PRIMARY KEY (`id_ktgr_baju`);

--
-- Indexes for table `tbl_pelunasan`
--
ALTER TABLE `tbl_pelunasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembayaran_antar`
--
ALTER TABLE `tbl_pembayaran_antar`
  ADD PRIMARY KEY (`id_bayar_antar`);

--
-- Indexes for table `tbl_pembayaran_baju`
--
ALTER TABLE `tbl_pembayaran_baju`
  ADD PRIMARY KEY (`id_bayar_baju`);

--
-- Indexes for table `tbl_rombel`
--
ALTER TABLE `tbl_rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tbl_type_pembayaran`
--
ALTER TABLE `tbl_type_pembayaran`
  ADD PRIMARY KEY (`id_type_pemb`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lib_tajaran`
--
ALTER TABLE `lib_tajaran`
  MODIFY `id_tajaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lib_tingkat`
--
ALTER TABLE `lib_tingkat`
  MODIFY `id_tingkat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_ktgr_antar`
--
ALTER TABLE `tbl_ktgr_antar`
  MODIFY `id_ktgr_antar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_ktgr_baju`
--
ALTER TABLE `tbl_ktgr_baju`
  MODIFY `id_ktgr_baju` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tbl_pelunasan`
--
ALTER TABLE `tbl_pelunasan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pembayaran_antar`
--
ALTER TABLE `tbl_pembayaran_antar`
  MODIFY `id_bayar_antar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_pembayaran_baju`
--
ALTER TABLE `tbl_pembayaran_baju`
  MODIFY `id_bayar_baju` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_rombel`
--
ALTER TABLE `tbl_rombel`
  MODIFY `id_rombel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `tbl_type_pembayaran`
--
ALTER TABLE `tbl_type_pembayaran`
  MODIFY `id_type_pemb` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
