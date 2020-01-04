-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2020 at 06:54 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirent2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_petugas` char(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(30) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_petugas`, `username`, `password`, `foto`) VALUES
('12345', 'Sutrisno', 'plampang', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `costumer`
--

CREATE TABLE `costumer` (
  `No_Ktp` varchar(50) NOT NULL,
  `No_telp` char(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `E-mail` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costumer`
--

INSERT INTO `costumer` (`No_Ktp`, `No_telp`, `nama`, `alamat`, `E-mail`, `password`, `gambar`) VALUES
('12345678908721', '081909090100', 'sulis', 'PLAMPANG', 'sulis032@gmail.com', '$2y$10$9yKPk8QFYKCnjXcHHIZ0ke4PRi2f0mqF2RYLtLvItJMbkc..Tvu..', ''),
('12736263426', '087863865444', 'sulis tiani', 'Plampang', 'sulis032@gmail.com', '$2y$10$YWgw5ep01syutWDDJQwEae9pqin2qEsdiXiKnF38cNdPvvgS7LGbi', ''),
('23456787654', '085338994864', 'sutrisno', 'Plampang', 'sutris032@gmail.com', '$2y$10$IBq8Bo3CBPoktdAZwiJtpuvByYlm1WOdwM9sqxzHZF1F7L3lEP19i', ''),
('9271372632e', '081909090100', 'ke', 'jsa', 'rmb032@gmail.com', '$2y$10$qy0X4bzy3n915Q59RX4m4OIKEPLTO4tLo1BMzZdnBROmx8flFPMQO', '5df6f5e74b3e9.psd');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` char(25) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `No_telp` char(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `Nama`, `Alamat`, `No_telp`, `email`, `img`) VALUES
('212240', 'Mataram Rent', 'Mataram', '087650999872', 'mtr@gmail.com', ''),
('21335', 'Jaya Rent', 'Kekalik Jaya', '987667898', 'jy_rent@gmail.com', ''),
('21336', 'Sima Rent', 'Mataram', '087865430999', 'simarent@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `no_pol` char(10) NOT NULL,
  `id_mitra` char(30) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `gambar` text DEFAULT NULL,
  `kapasitas` int(11) NOT NULL,
  `fasilitas` varchar(12) NOT NULL,
  `tarif` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`no_pol`, `id_mitra`, `merk`, `tipe`, `gambar`, `kapasitas`, `fasilitas`, `tarif`, `stok`) VALUES
('EA 3241 EA', '212240', 'Honda Jazz', 'Sedan', '5dfa584d3b1a9.jpg', 3, 'Sopir', 60000, 2),
('EA 3243 EA', '212240', 'Toyota Agya', 'Sedan', '', 3, 'Sopir', 500000, 3),
('EA 3245 EA', '21335', 'New Senia', 'Sedan', '', 4, 'Sopir', 300000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `Id_kembali` char(20) NOT NULL,
  `Id_transaksi` varchar(30) NOT NULL,
  `no_pol` char(20) NOT NULL,
  `tgl_kembali` varchar(10) NOT NULL,
  `lama_pengembalian` int(3) NOT NULL,
  `denda` double NOT NULL,
  `Total_bayar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_transaksi` varchar(30) NOT NULL,
  `No_ktp` varchar(50) NOT NULL,
  `tanggal_pinjam` varchar(10) NOT NULL,
  `durasi` int(11) NOT NULL,
  `id_petugas` char(20) NOT NULL,
  `no_pol` char(20) NOT NULL,
  `biaya` double NOT NULL,
  `paid` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id_transaksi`, `No_ktp`, `tanggal_pinjam`, `durasi`, `id_petugas`, `no_pol`, `biaya`, `paid`) VALUES
('SR5E039BCD84496', '12345678908721', '12/26/2019', 2, '12345', 'EA 3241 EA', 120000, 'pired'),
('SR5E0418DBADF7D', '12345678908721', '12/26/2019', 2, '12345', 'EA 3241 EA', 120000, 'pired'),
('SR5E0419542A3D0', '12345678908721', '12/26/2019', 2, '12345', 'EA 3241 EA', 120000, 'pired'),
('SR5E0559E140441', '12345678908721', '12/27/2019', 1, '12345', 'EA 3243 EA', 500000, 'pired'),
('SR5E06025FD2EA4', '12345678908721', '12/27/2019', 3, '12345', 'EA 3245 EA', 900000, 'pired');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`No_Ktp`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`no_pol`),
  ADD KEY `id_mitra` (`id_mitra`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`Id_kembali`),
  ADD KEY `Id_transaksi` (`Id_transaksi`),
  ADD KEY `no_pol` (`no_pol`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `no_pol` (`no_pol`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `No_ktp` (`No_ktp`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `mobil_ibfk_1` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id_mitra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`Id_transaksi`) REFERENCES `penyewaan` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_ibfk_1` FOREIGN KEY (`No_ktp`) REFERENCES `costumer` (`No_Ktp`),
  ADD CONSTRAINT `penyewaan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `admin` (`id_petugas`),
  ADD CONSTRAINT `penyewaan_ibfk_3` FOREIGN KEY (`no_pol`) REFERENCES `mobil` (`no_pol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
