-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 03:04 PM
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
-- Database: `inventaris_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(7) NOT NULL,
  `nomorbarang` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `status` enum('baik','rusak ringan','dipinjam','rusak berat') NOT NULL,
  `spesifik_lain` varchar(50) NOT NULL,
  `idkategori` int(7) NOT NULL,
  `namakategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `nomorbarang`, `nama`, `jumlah`, `warna`, `status`, `spesifik_lain`, `idkategori`, `namakategori`) VALUES
(1, 'NB0033', 'atom', 30, 'hitam', 'rusak ringan', '', 1, '1-Lab RPL Baru'),
(2, 'NB0538', 'palu', 40, 'merah', 'rusak ringan', '', 2, '2-Lab DKV Baru'),
(3, 'NB092909', 'atom', 100, 'HITAM', 'baik', '', 1, '1-Lab RPL Baru'),
(4, '9', 'yoittt', 79, 'y', 'rusak ringan', 'apasi', 1, '1-Lab RPL Baru');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(7) NOT NULL,
  `ruang` varchar(50) NOT NULL,
  `pengurus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `ruang`, `pengurus`) VALUES
(1, 'Lab RPL Baru', 'orang TI'),
(2, 'Lab DKV Baru', 'orang DKV');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman2`
--

CREATE TABLE `peminjaman2` (
  `idpinjam` int(7) NOT NULL,
  `nama_peminjam` varchar(30) NOT NULL,
  `status` enum('dipinjam','dikembalikan') NOT NULL,
  `idbarang` int(7) DEFAULT NULL,
  `jumlah` int(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `tanggal_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman2`
--

INSERT INTO `peminjaman2` (`idpinjam`, `nama_peminjam`, `status`, `idbarang`, `jumlah`, `nama_barang`, `tanggal_pinjam`) VALUES
(1, 'manusia', 'dikembalikan', 4, 10, '4-yoittt', '2024-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE `pengelola` (
  `id` int(7) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nohp` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jenis` enum('laki-laki','perempuan') NOT NULL,
  `status` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`id`, `nama`, `nohp`, `username`, `password`, `jenis`, `status`) VALUES
(1, 'haliq', '0843784638', 'admin', '1234', 'laki-laki', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `idkembali` int(7) NOT NULL,
  `idpinjam` int(7) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `nama_peminjam` varchar(30) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`idkembali`, `idpinjam`, `nama_barang`, `nama_peminjam`, `jumlah`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(1, 1, '4-yoittt', 'manusia', 10, '2024-12-12', '2024-12-12'),
(2, 1, '4-yoittt', 'manusia', 10, '2024-12-12', '2024-12-12'),
(3, 1, '4-yoittt', 'manusia', 10, '2024-12-12', '2024-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(7) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `jenis` enum('laki-laki','perempuan') NOT NULL,
  `status` enum('siswa','guru') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `kelas`, `jenis`, `status`) VALUES
(1, 'haliqksp', 'haliq', '1234', 'XI RPL 1', 'laki-laki', 'siswa'),
(3, 'rezi', 'rezyy', '1234', 'XI RPL 2', 'laki-laki', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `fk_idkategori` (`idkategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `peminjaman2`
--
ALTER TABLE `peminjaman2`
  ADD PRIMARY KEY (`idpinjam`),
  ADD KEY `fk_idbarang` (`idbarang`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`idkembali`),
  ADD KEY `fk_idpinjam` (`idpinjam`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjaman2`
--
ALTER TABLE `peminjaman2`
  MODIFY `idpinjam` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `idkembali` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_idkategori` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman2`
--
ALTER TABLE `peminjaman2`
  ADD CONSTRAINT `fk_idbarang` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `fk_idpinjam` FOREIGN KEY (`idpinjam`) REFERENCES `peminjaman2` (`idpinjam`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
