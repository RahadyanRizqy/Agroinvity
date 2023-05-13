-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 04:46 PM
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
  `status` int(1) NOT NULL,
  `fk_id_tipe_akun` int(11) NOT NULL,
  `fk_id_rel_akun` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nama_lengkap`, `no_hp`, `email`, `password`, `status`, `fk_id_tipe_akun`, `fk_id_rel_akun`) VALUES
(1, 'Arcueid Brunestud', 6288804897436, 'arcueid@gmail.com', 'brunestud', 1, 2, NULL),
(2, 'Razor Lupical', 6285172131945, 'lupicalrazor@gmail.com', 'razor', 1, 3, 3),
(3, 'Rahadyan', 62888672356345, 'raden@gmail.com', 'raden', 1, 2, NULL),
(4, 'John Smith', 6285112340987, 'johnsmith@gmail.com', 'johnsmith', 1, 3, 1),
(5, 'Albert Einstein', 6288978904321, 'albertgenius@msnet.com', 'albertgenius', 1, 3, 1),
(6, 'Alex Theodor', 6281877187879, 'alextheodor@mail.net', 'alextheodor', 1, 3, 3),
(9, 'Admin CMS', 123456789, 'superadmin@ms.net', 'admin', 1, 1, NULL),
(41, 'RadenRiz', 123142124124, 'radenriz@gmail.com', 'arc2512', 1, 2, NULL),
(42, 'Sultan', 12415251254, 'sultanagung@mail.run', 'arc2512', 1, 2, NULL),
(43, 'Supardi', 151251251251, 'arcu@mail.com', 'arc', 1, 2, NULL),
(44, 'Raden', 2124124124, 'raden@net.com', 'arc9990', 1, 2, NULL),
(45, 'Raden', 2124124124, 'raden@net.comx', 'arc123123123', 1, 2, NULL),
(46, 'Raden', 1241241234, 'arcueidbrune@gmial.com', '12345', 1, 2, NULL),
(47, 'RadenRiz', 14124124124, 'supardi@net.tv', 'supradi', 1, 2, NULL),
(48, 'RadenRiz', 141241254124, 'aradr124124@mail.net', 'cccccc', 1, 2, NULL),
(49, 'Suparman', 14124124124, 'suparman1241241@net.com', 'suparman', 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(2) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `isi_artikel` text NOT NULL,
  `fk_akun` int(11) NOT NULL DEFAULT 1,
  `waktu_input` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `fk_akun`, `waktu_input`) VALUES
(1, 'Tanam Paksa Wow2', 'Cultuurstelsel (harfiah: Sistem Kultivasi atau Sistem Budi Daya), yang oleh sejarawan Indonesia disebut sebagai Sistem Tanam Paksa, adalah peraturan yang dikeluarkan oleh Gubernur Jenderal Johannes van den Bosch pada tahun 1830 yang mewajibkan setiap desa menyisihkan sebagian tanahnya (20%) untuk ditanami komoditas ekspor, khususnya teh, kopi, dan kakao. Hasil tanaman ini akan dijual kepada pemerintah kolonial dengan harga yang sudah dipastikan dan hasil panen diserahkan kepada pemerintah kolonial. Penduduk desa yang tidak memiliki tanah harus bekerja 75 hari dalam setahun (20%) pada kebun-kebun milik pemerintah yang menjadi semacam pajak.\r\n\r\nPada praktiknya peraturan itu dapat dikatakan tidak berarti karena seluruh wilayah pertanian wajib ditanami tanaman laku ekspor dan hasilnya diserahkan kepada pemerintahan Belanda. Wilayah yang digunakan untuk praktik cultuurstelstel pun tetap dikenakan pajak. Warga yang tidak memiliki lahan pertanian wajib bekerja selama setahun penuh di lahan pertanian.                                                                         sS                                                                                                                            ', 1, '2023-05-11 17:01:42.000000'),
(2, 'Sejarah Perkebunan Kopi 3', '                                                Nusantara yang kini dikenal sebagai negara kita tercinta, Indonesia, diberkahi oleh keragaman dan kekayaan alam, budaya, ras, suku, dan kebudayaannya masing-masing. Kekayaan dan keberagaman budaya, memiliki pengaruh yang kuat terhadap keragaman makanan maupun minuman di negara ini. \r\n\r\nMulai dari makanan, minuman, bahkan hingga keberagaman flora dan fauna menghiasi negara Indonesia dengan kecantikannya. Hal ini juga memiliki keterkaitan dengan sejarah dan ragam jenis kopi di Indonesia.\r\n\r\nTapi, tahukah kamu kalau ada berapa ragam jenis kopi di Indonesia? Lalu, bagaimana sih sejarah ditemukannya kopi di Indonesia hingga berkembang seperti sekarang?\r\n\r\nNah, pada dasarnya, kata kopi yang kamu kenal sekarang adalah hasil adopsi dari kata koffie dari bahasa Belanda.\r\n\r\nBelanda ternyata memiliki peran yang penting terhadap perkembangan dunia kopi di Indonesia, lho. Sekarang, Indonesia dikenal sebagai salah satu penghasil kopi terbaik di dunia. Pada artikel ini akan dijelaskan awal mulanya kopi hadir di Indonesia, serta ragam kopi tradisional yang menjadi ciri khas Indonesia.                                        ', 1, '2023-05-11 17:04:53.000000'),
(3, 'Test Article', 'Sebagai petani pintar', 1, '2023-05-11 17:11:41.940133'),
(7, 'asdfasdfa', 'afasasfasf', 1, '2023-05-11 17:12:36.359985'),
(9, 'Sejarah Perkebunan Kopi', '                        Nusantara yang kini dikenal sebagai negara kita tercinta, Indonesia, diberkahi oleh keragaman dan kekayaan alam, budaya, ras, suku, dan kebudayaannya masing-masing. Kekayaan dan keberagaman budaya, memiliki pengaruh yang kuat terhadap keragaman makanan maupun minuman di negara ini. \r\n\r\nMulai dari makanan, minuman, bahkan hingga keberagaman flora dan fauna menghiasi negara Indonesia dengan kecantikannya. Hal ini juga memiliki keterkaitan dengan sejarah dan ragam jenis kopi di Indonesia.\r\n\r\nTapi, tahukah kamu kalau ada berapa ragam jenis kopi di Indonesia? Lalu, bagaimana sih sejarah ditemukannya kopi di Indonesia hingga berkembang seperti sekarang?\r\n\r\nNah, pada dasarnya, kata kopi yang kamu kenal sekarang adalah hasil adopsi dari kata koffie dari bahasa Belanda.\r\n\r\n           Belanda ternyata memiliki peran yang penting terhadap perkembangan dunia kopi di Indonesia, lho. Sekarang, Indonesia dikenal sebagai salah satu penghasil kopi terbaik di dunia. Pada artikel ini akan dijelaskan awal mulanya kopi hadir di Indonesia, serta ragam kopi tradisional yang menjadi ciri khas Indonesia.                    ', 1, '2023-05-12 22:10:27.650848');

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
(1, 'biji kopi 13kg2', 132, 25500, '2023-04-14 18:23:50.000000', 3, 1),
(2, 'pupuk phonska', 1, 50000, '2023-04-20 20:37:33.575623', 1, 1),
(3, 'pupuk bagus', 2, 100000, '2023-04-20 20:37:33.575623', 1, 1),
(4, 'antracol', 4, 55000, '2023-04-20 20:37:33.575623', 1, 1),
(5, 'pestisida marshal 25RR xyz', 121, 25500, '2023-04-27 15:49:17.000000', 3, 1),
(9, 'wajan pro', 2, 1, '2023-05-10 18:54:30.000000', 3, 2),
(21, 'LPG', 2, 55000, '2023-05-02 22:25:39.957208', 1, 2),
(22, 'kopi', 5, 10000, '2023-05-03 14:12:46.638247', 3, 1),
(23, 'gaji', 1, 4000000, '2023-05-03 14:16:08.192557', 3, 2),
(30, 'Sesuatu', 2, 66600, '2023-05-11 10:47:44.414959', 46, 1);

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
(2, 'susu kedelai abc', 15, '2023-05-01 16:52:44', 10, 5, 10000, 3),
(4, 'ppk', 1, '2023-05-02 11:54:43', 1, 1, 1, 9),
(7, 'kopi susu', 6, '2023-05-03 07:22:17', 3, 2, 70000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_kalkulator`
--

CREATE TABLE `tb_riwayat_kalkulator` (
  `id_riwayat_kalkulator` int(11) NOT NULL,
  `value_riwayat` varchar(255) NOT NULL,
  `fk_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_pengeluaran`
--

CREATE TABLE `tb_riwayat_pengeluaran` (
  `id_riwayat_pengeluaran` int(11) NOT NULL,
  `riwayat_nama` varchar(255) NOT NULL,
  `riwayat_harga` int(2) NOT NULL,
  `riwayat_jumlah` int(2) NOT NULL,
  `fk_pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat_produksi`
--

CREATE TABLE `tb_riwayat_produksi` (
  `id_riwayat_produksi` int(11) NOT NULL,
  `value_a` int(11) NOT NULL,
  `value_b` int(11) NOT NULL,
  `value_c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

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
-- Indexes for table `tb_riwayat_kalkulator`
--
ALTER TABLE `tb_riwayat_kalkulator`
  ADD PRIMARY KEY (`id_riwayat_kalkulator`);

--
-- Indexes for table `tb_riwayat_pengeluaran`
--
ALTER TABLE `tb_riwayat_pengeluaran`
  ADD PRIMARY KEY (`id_riwayat_pengeluaran`);

--
-- Indexes for table `tb_riwayat_produksi`
--
ALTER TABLE `tb_riwayat_produksi`
  ADD PRIMARY KEY (`id_riwayat_produksi`);

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
  MODIFY `id_akun` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  MODIFY `id_pengeluaran` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_produksi`
--
ALTER TABLE `tb_produksi`
  MODIFY `id_produksi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_riwayat_kalkulator`
--
ALTER TABLE `tb_riwayat_kalkulator`
  MODIFY `id_riwayat_kalkulator` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_riwayat_pengeluaran`
--
ALTER TABLE `tb_riwayat_pengeluaran`
  MODIFY `id_riwayat_pengeluaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_riwayat_produksi`
--
ALTER TABLE `tb_riwayat_produksi`
  MODIFY `id_riwayat_produksi` int(11) NOT NULL AUTO_INCREMENT;

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
