-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 02:12 AM
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
(1, 'adini', 'cilimus', '0891929102912', 'admin', '12341234', 1),
(2, 'pemilik', 'subang', '089192819281', 'pemilik', 'pemilik', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail_pemesanan` varchar(50) NOT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `id_tiket_keluarga` int(11) DEFAULT NULL,
  `id_pemesanan` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail_pemesanan`, `id_tiket`, `id_tiket_keluarga`, `id_pemesanan`, `qty`) VALUES
('1a4gb', 3, NULL, '20230322ZY3O7BXW', 1),
('BTUwM', 2, NULL, '20230322C4UWO9MG', 1),
('FRZhG', 1, NULL, '20230322ZY3O7BXW', 1),
('k3DIJ', 1, NULL, '20230322STWVDM4N', 3),
('nOfkA', 2, NULL, '20230322STWVDM4N', 0),
('siPZ9', 3, NULL, '20230322TAFWOM98', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id_tiket_keluarga` int(11) NOT NULL,
  `nama_tiket_keluarga` varchar(50) DEFAULT NULL,
  `harga_tiket` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `deskripsi_tiket` text NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id_tiket_keluarga`, `nama_tiket_keluarga`, `harga_tiket`, `jumlah`, `deskripsi_tiket`, `gambar`) VALUES
(1, 'keluarga bahagia ', '12000', 12, 'asasa', 'avatar5.png'),
(2, 'keluarga banyak ', '1230000', 12, 'tiket keluarga', 'avatar.png');

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

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `atas_nama`, `bukti_bayar`, `upload_time`) VALUES
(1, '20230322TAFWOM98', 'andi', 'avatar5.png', NULL);

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
('20230322C4UWO9MG', 1, '2023-03-22', '2023-03-23', '45500', '1', 0, 6, NULL),
('20230322STWVDM4N', 1, '2023-03-22', '2023-03-28', '75000', '2', 0, 3, NULL),
('20230322TAFWOM98', 2, '2023-03-22', '2023-03-24', '120000', '2', 1, 1, NULL),
('20230322ZY3O7BXW', 1, '2023-03-22', '2023-03-31', '145000', '1', 0, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `id_tiket_keluarga` int(11) DEFAULT NULL,
  `tgl_promo` varchar(125) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `range` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `id_tiket`, `id_tiket_keluarga`, `tgl_promo`, `ket`, `range`) VALUES
(1, 1, NULL, '2022-12-13', '0', 0),
(2, 2, NULL, '2022-12-22', 'okok', 9),
(3, 3, NULL, '2023-03-21', '0', 0),
(4, NULL, 1, '2023-03-21', '0', 0),
(5, NULL, 2, '2023-03-21', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rinci_langsung`
--

CREATE TABLE `rinci_langsung` (
  `id_rinci_langsung` int(11) NOT NULL,
  `no_jual` varchar(50) DEFAULT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `tgl_jual` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rinci_langsung`
--

INSERT INTO `rinci_langsung` (`id_rinci_langsung`, `no_jual`, `id_tiket`, `qty`, `tgl_jual`) VALUES
(1, '202212143128', 1, 1, '2022-12-14'),
(2, '202302215717', 2, 2, '2023-02-21'),
(3, '202302284842', 2, 1, '2023-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `nama_tiket` varchar(125) DEFAULT NULL,
  `deskripsi_tiket` text DEFAULT NULL,
  `harga_tiket` varchar(15) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tipe_tiket` varchar(5) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `nama_tiket`, `deskripsi_tiket`, `harga_tiket`, `jumlah`, `tipe_tiket`, `gambar`) VALUES
(1, 'Beli satu gratis satu', 'tiket untuk berudua', '25000', 0, '2', 'tiket4.jpg'),
(2, 'keluarga bahagia ', 'Paket tiket keluarga', '50000', 12, '1', 'tiket5.jpg'),
(3, 'satu tiket', 'tiket biasa', '120000', 0, '2', 'avatar04.png');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_langsung`
--

CREATE TABLE `transaksi_langsung` (
  `id_pesan` int(11) NOT NULL,
  `no_jual` varchar(50) DEFAULT NULL,
  `tgl_beli` date DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `status_beli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_langsung`
--

INSERT INTO `transaksi_langsung` (`id_pesan`, `no_jual`, `tgl_beli`, `total_harga`, `jumlah_bayar`, `status_beli`) VALUES
(1, '202212143128', '2022-12-14', 25000, 25000, 1),
(2, '202302215717', '2023-02-21', 100000, 1000000, 1),
(3, '202302284842', '2023-02-28', 50000, 11111111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `id_detail_pemesanan` varchar(50) DEFAULT NULL,
  `id_tiket_keluarga` int(11) DEFAULT NULL,
  `tgl_ulasan` date DEFAULT NULL,
  `isi_ulasan` text DEFAULT NULL,
  `rating` varchar(125) DEFAULT NULL,
  `time_ulasan` timestamp NULL DEFAULT current_timestamp(),
  `status_ulasan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_tiket`, `id_detail_pemesanan`, `id_tiket_keluarga`, `tgl_ulasan`, `isi_ulasan`, `rating`, `time_ulasan`, `status_ulasan`) VALUES
(1, 1, 'GA6F4', NULL, '2022-12-13', 'bagus', '3', '2022-12-13 08:25:01', 1),
(2, 1, 'lGwer', NULL, '0000-00-00', '0', '0', '2023-01-11 07:12:06', 0),
(3, 2, 'Yjb9m', NULL, '0000-00-00', '0', '0', '2023-01-11 07:12:29', 0),
(4, 1, 'R5vIl', NULL, '0000-00-00', '0', '0', '2023-02-11 08:37:23', 0),
(5, 2, 'ZB1rs', NULL, '0000-00-00', '0', '0', '2023-02-11 08:56:49', 0),
(6, 1, 'tsN2C', NULL, '0000-00-00', '0', '0', '2023-02-28 03:06:04', 0),
(7, 2, 'vs4o6', NULL, '0000-00-00', '0', '0', '2023-03-15 03:07:24', 0),
(8, 2, 'Djic1', NULL, '0000-00-00', '0', '0', '2023-03-21 07:38:25', 0),
(9, 1, 'Ssnh1', NULL, '0000-00-00', '0', '0', '2023-03-21 07:38:25', 0),
(10, 2, 'BTUwM', NULL, '0000-00-00', '0', '0', '2023-03-22 00:40:16', 0),
(11, 3, 'siPZ9', NULL, '0000-00-00', '0', '0', '2023-03-22 00:40:33', 0),
(12, 1, 'FRZhG', NULL, '0000-00-00', '0', '0', '2023-03-22 00:40:54', 0),
(13, 3, '1a4gb', NULL, '0000-00-00', '0', '0', '2023-03-22 00:40:54', 0),
(14, 2, 'nOfkA', NULL, '0000-00-00', '0', '0', '2023-03-22 00:41:25', 0),
(15, 1, 'k3DIJ', NULL, '0000-00-00', '0', '0', '2023-03-22 00:41:25', 0);

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
  `password` varchar(50) DEFAULT NULL,
  `gratis_tiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wisatawan`
--

INSERT INTO `wisatawan` (`id_wisatawan`, `nama_wisatawan`, `jk`, `ttl`, `provinsi`, `kab_kota`, `alamat_detail`, `no_hp`, `username`, `password`, `gratis_tiket`) VALUES
(1, 'andi', 'laki-laki', 'kuningan, 17-01-1021', 'jawabarat', 'kuningan', 'selajambe kuningan', '089192819281', 'andi', '12341234', 3),
(2, 'adis', 'perempuan', 'kuningan, 17-01-1021', 'jawabarat', 'kuningan', 'selajambe kuningan', '089192819281', 'adis', '12341234', 0),
(3, 'ruhaeti', 'perempuan', 'kuningan, 17-01-1021', 'jawabarat', 'kuningan', 'selajambe kuningan', '089192819281', 'ruhaeti', '12341234', 0);

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
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id_tiket_keluarga`);

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
-- Indexes for table `rinci_langsung`
--
ALTER TABLE `rinci_langsung`
  ADD PRIMARY KEY (`id_rinci_langsung`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `transaksi_langsung`
--
ALTER TABLE `transaksi_langsung`
  ADD PRIMARY KEY (`id_pesan`);

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
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id_tiket_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rinci_langsung`
--
ALTER TABLE `rinci_langsung`
  MODIFY `id_rinci_langsung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_langsung`
--
ALTER TABLE `transaksi_langsung`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wisatawan`
--
ALTER TABLE `wisatawan`
  MODIFY `id_wisatawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
