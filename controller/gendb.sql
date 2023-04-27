-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 09:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_agroinvity`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(1) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_hp` bigint(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `fk_id_tipe_akun` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nama_lengkap`, `no_hp`, `email`, `password`, `alamat`, `fk_id_tipe_akun`, `status`) VALUES
(1, 'Arcueid Brunestud', 6288804897436, 'arcueid@gmail.com', 'brunestud', 'Jl. Crimson Moon', 2, 1),
(2, 'Razor Lupical', 6285172131945, 'lupicalrazor@gmail.com', 'razor', 'Jl. Teyvat No 29', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahan_baku`
--

CREATE TABLE `tb_bahan_baku` (
  `id_bahan_baku` int(4) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga` int(10) NOT NULL,
  `waktu_input` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bahan_baku`
--

INSERT INTO `tb_bahan_baku` (`id_bahan_baku`, `nama`, `jumlah`, `harga`, `waktu_input`) VALUES
(2, 'pupuk phonska', 1, 50000, '2023-04-20 20:37:33.575623'),
(3, 'pupuk bagus', 2, 100000, '2023-04-20 20:37:33.575623'),
(4, 'antracol', 4, 55000, '2023-04-20 20:37:33.575623');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipe_akun`
--

CREATE TABLE `tb_tipe_akun` (
  `id_tipe_akun` int(1) NOT NULL,
  `tipe_akun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tipe_akun`
--

INSERT INTO `tb_tipe_akun` (`id_tipe_akun`, `tipe_akun`) VALUES
(1, 'superadmin'),
(2, 'mitra'),
(3, 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `fk_tipe_akun` (`fk_id_tipe_akun`);

--
-- Indexes for table `tb_bahan_baku`
--
ALTER TABLE `tb_bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`);

--
-- Indexes for table `tb_tipe_akun`
--
ALTER TABLE `tb_tipe_akun`
  ADD PRIMARY KEY (`id_tipe_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_bahan_baku`
--
ALTER TABLE `tb_bahan_baku`
  MODIFY `id_bahan_baku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD CONSTRAINT `fk_tipe_akun` FOREIGN KEY (`fk_id_tipe_akun`) REFERENCES `tb_tipe_akun` (`id_tipe_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
