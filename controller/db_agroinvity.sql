-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 06:19 PM
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
  `id_akun` int(2) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_hp` bigint(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `fk_id_tipe_akun` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `fk_id_rel_akun` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nama_lengkap`, `no_hp`, `email`, `password`, `alamat`, `fk_id_tipe_akun`, `status`, `fk_id_rel_akun`) VALUES
(1, 'Arcueid Brunestud', 6288804897436, 'arcueid@gmail.com', 'brunestud', 'Jl. Crimson Moon', 2, 1, NULL),
(2, 'Razor Lupical', 6285172131945, 'lupicalrazor@gmail.com', 'razor', 'Jl. Teyvat No 29', 3, 1, 3),
(3, 'Rahadyan', 62888672356345, 'raden@gmail.com', 'raden', 'Jl. Batu Raden 99', 2, 1, NULL),
(4, 'John Smith', 6285112340987, 'johnsmith@gmail.com', 'johnsmith', 'Jl. Kenangan Indah No. 17', 3, 1, 1),
(5, 'Albert Einstein', 6288978904321, 'albertgenius@msnet.com', 'albertgenius', 'Jl. Berlin Wall No. 10', 3, 1, 1),
(6, 'Alex Theodor', 6281877187879, 'alextheodor@mail.net', 'alextheodor', 'Jl. Rajakala No. 911', 3, 1, 3),
(9, 'Admin CMS', 123456789, 'superadmin@ms.net', 'admin', 'Jl. Kenangan Indah', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` int(4) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga` int(10) NOT NULL,
  `waktu_input` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `fk_user` int(2) NOT NULL,
  `fk_pengeluaran` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `nama`, `jumlah`, `harga`, `waktu_input`, `fk_user`, `fk_pengeluaran`) VALUES
(1, 'biji kopi 13kg', 13, 25500, '2023-04-14 18:23:50.000000', 3, 1),
(2, 'pupuk phonska', 1, 50000, '2023-04-20 20:37:33.575623', 1, 1),
(3, 'pupuk bagus', 2, 100000, '2023-04-20 20:37:33.575623', 1, 1),
(4, 'antracol', 4, 55000, '2023-04-20 20:37:33.575623', 1, 1),
(5, 'pestisida marshal 25RR', 121, 25000, '2023-04-27 15:49:17.000000', 3, 1),
(7, 'jamur booster 500g', 2, 60000, '2023-04-14 18:26:31.000000', 3, 1),
(8, 'ssk', 12, 12, '2023-05-04 00:05:36.000000', 1, 2),
(9, 'wajan', 1, 1, '2023-05-10 18:54:30.000000', 3, 2),
(10, 'ccca', 1, 1, '2023-05-10 18:54:30.000000', 1, 2),
(12, 'ccca', 1, 1, '2023-05-10 18:54:30.000000', 1, 2),
(20, 'biji kopi', 25, 5, '2023-05-02 22:25:31.512536', 1, 1),
(21, 'LPG', 2, 55, '2023-05-02 22:25:39.957208', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produksi`
--

CREATE TABLE `tb_produksi` (
  `id_produksi` int(2) NOT NULL,
  `nama_produksi` varchar(255) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `produk_terjual` int(2) NOT NULL,
  `produk_tak_terjual` int(2) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `fk_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produksi`
--

INSERT INTO `tb_produksi` (`id_produksi`, `nama_produksi`, `jumlah`, `waktu`, `produk_terjual`, `produk_tak_terjual`, `harga_jual`, `fk_user`) VALUES
(1, 'tahu', 15, '2023-05-17 16:47:22', 15, 0, 25000, 1),
(2, 'susu kedelai', 15, '2023-05-01 16:52:44', 10, 5, 10000, 3),
(4, 'ppk', 1, '2023-05-02 11:54:43', 1, 1, 1, 9),
(5, 'bawang bombay coy coy', 2, '2023-05-02 12:25:30', 24, 15, 1, 1),
(6, 's', 11, '2023-05-02 15:35:37', 1, 1, 1, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipe_pengeluaran`
--

CREATE TABLE `tb_tipe_pengeluaran` (
  `id_tipe` int(2) NOT NULL,
  `nama_tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tipe_pengeluaran`
--

INSERT INTO `tb_tipe_pengeluaran` (`id_tipe`, `nama_tipe`) VALUES
(1, 'bahan baku'),
(2, 'operasional');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `fk_tipe_akun` (`fk_id_tipe_akun`),
  ADD KEY `rel_akun` (`fk_id_rel_akun`);

--
-- Indexes for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `fk_id_user_pengeluaran` (`fk_user`),
  ADD KEY `fk_id_pengeluaran` (`fk_pengeluaran`);

--
-- Indexes for table `tb_produksi`
--
ALTER TABLE `tb_produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `fk_id_user_produksi` (`fk_user`);

--
-- Indexes for table `tb_tipe_akun`
--
ALTER TABLE `tb_tipe_akun`
  ADD PRIMARY KEY (`id_tipe_akun`);

--
-- Indexes for table `tb_tipe_pengeluaran`
--
ALTER TABLE `tb_tipe_pengeluaran`
  ADD PRIMARY KEY (`id_tipe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  MODIFY `id_pengeluaran` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_produksi`
--
ALTER TABLE `tb_produksi`
  MODIFY `id_produksi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_tipe_pengeluaran`
--
ALTER TABLE `tb_tipe_pengeluaran`
  MODIFY `id_tipe` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD CONSTRAINT `fk_tipe_akun` FOREIGN KEY (`fk_id_tipe_akun`) REFERENCES `tb_tipe_akun` (`id_tipe_akun`),
  ADD CONSTRAINT `rel_akun` FOREIGN KEY (`fk_id_rel_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Constraints for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD CONSTRAINT `fk_id_pengeluaran` FOREIGN KEY (`fk_pengeluaran`) REFERENCES `tb_tipe_pengeluaran` (`id_tipe`),
  ADD CONSTRAINT `fk_id_user_pengeluaran` FOREIGN KEY (`fk_user`) REFERENCES `tb_akun` (`id_akun`);

--
-- Constraints for table `tb_produksi`
--
ALTER TABLE `tb_produksi`
  ADD CONSTRAINT `fk_id_user_produksi` FOREIGN KEY (`fk_user`) REFERENCES `tb_akun` (`id_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
