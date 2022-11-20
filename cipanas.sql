-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 07:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cipanas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(125) DEFAULT NULL,
  `alamat_admin` text DEFAULT NULL,
  `no_tlpn_admin` varchar(15) DEFAULT NULL,
  `username_admin` varchar(50) DEFAULT NULL,
  `password_admin` varchar(50) DEFAULT NULL,
  `level_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat_admin`, `no_tlpn_admin`, `username_admin`, `password_admin`, `level_admin`) VALUES
(1, 'adini', 'cilimus', '0891929102912', 'adini', '12341234', 1),
(2, 'pemilik', 'subang', '089192819281', 'pemilik', 'pemilik', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail_pemesanan` varchar(50) NOT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `id_pemesanan` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail_pemesanan`, `id_tiket`, `id_pemesanan`, `qty`) VALUES
('AyirH', 2, '20221120DJBSELF1', 1),
('BWSj7', 1, '20221120DJBSELF1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` varchar(50) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `upload_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(50) NOT NULL,
  `id_wisatawan` int(11) DEFAULT NULL,
  `tgl_pemesanan` varchar(15) DEFAULT NULL,
  `tgl_booking` varchar(15) DEFAULT NULL,
  `total` varchar(15) DEFAULT NULL,
  `metode_bayar` varchar(11) DEFAULT NULL,
  `status_pembayaran` int(11) DEFAULT NULL,
  `status_pemesanan` int(11) DEFAULT NULL,
  `create_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_wisatawan`, `tgl_pemesanan`, `tgl_booking`, `total`, `metode_bayar`, `status_pembayaran`, `status_pemesanan`, `create_update`) VALUES
('20221120DJBSELF1', 1, '2022-11-20', '2022-11-24', '40000', '2', 0, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `tgl_promo` varchar(125) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `range` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `id_tiket`, `tgl_promo`, `ket`, `range`) VALUES
(1, 1, '2022-11-11', '0', 0),
(2, 2, '2022-11-11', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `nama_tiket` varchar(125) DEFAULT NULL,
  `deskripsi_tiket` text DEFAULT NULL,
  `harga_tiket` varchar(15) DEFAULT NULL,
  `tipe_tiket` varchar(5) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `nama_tiket`, `deskripsi_tiket`, `harga_tiket`, `tipe_tiket`, `gambar`) VALUES
(1, 'tiket bundling', 'tiket  bundling dengan kekasih', '15000', '3', 'indonesia.png'),
(2, 'tiket get one free one', 'tiket beli satu depat  satu', '25000', '3', 'kathmandu.png');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `id_detail_pemesanan` varchar(50) DEFAULT NULL,
  `tgl_ulasan` date DEFAULT NULL,
  `isi_ulasan` text DEFAULT NULL,
  `rating` varchar(125) DEFAULT NULL,
  `time_ulasan` timestamp NULL DEFAULT current_timestamp(),
  `status_ulasan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_tiket`, `id_detail_pemesanan`, `tgl_ulasan`, `isi_ulasan`, `rating`, `time_ulasan`, `status_ulasan`) VALUES
(1, 2, 'AyirH', '2022-11-20', 'bagus', '3', '0000-00-00 00:00:00', 1),
(2, 1, 'BWSj7', '2022-11-20', 'sip', '5', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wisatawan`
--

CREATE TABLE `wisatawan` (
  `id_wisatawan` int(11) NOT NULL,
  `nama_wisatawan` varchar(50) DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `ttl` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kab_kota` varchar(50) DEFAULT NULL,
  `alamat_detail` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wisatawan`
--

INSERT INTO `wisatawan` (`id_wisatawan`, `nama_wisatawan`, `jk`, `ttl`, `provinsi`, `kab_kota`, `alamat_detail`, `no_hp`, `username`, `password`) VALUES
(1, 'andi', 'perempuan', 'kuningan, 17-01-1021', 'jawabarat', 'kuningan', 'selajambe kuningan', '089192819281', 'andi', '12341234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail_pemesanan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indexes for table `wisatawan`
--
ALTER TABLE `wisatawan`
  ADD PRIMARY KEY (`id_wisatawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wisatawan`
--
ALTER TABLE `wisatawan`
  MODIFY `id_wisatawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
