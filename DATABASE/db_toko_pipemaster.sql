-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 05:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_pipemaster`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `foto_barang` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `id_kategori`, `unit`, `foto_barang`) VALUES
(1, 'ASTM D2846/NSF SE8225 22.8 bar', 16, 'Meter', '611-image001.png'),
(2, 'ASTM F441 SCH40', 16, 'Meter', '661-image001.png'),
(3, 'ASTM F441 SCH80', 16, 'Meter', '763-image001.png'),
(4, 'Elbow 90°', 17, 'Inc', 'image003.jpg'),
(6, 'Flowguard Solvent Cement (one step)', 18, 'Qty', 'image049.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bukti`
--

CREATE TABLE `tb_bukti` (
  `id_bukti` int(11) NOT NULL,
  `tanggal_bukti` date NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `foto_bukti` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bukti`
--

INSERT INTO `tb_bukti` (`id_bukti`, `tanggal_bukti`, `id_transaksi`, `foto_bukti`) VALUES
(1, '2021-11-04', 1, 'Screenshot (22).png'),
(2, '2021-11-04', 2, 'Screenshot (16).png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_harga`
--

CREATE TABLE `tb_harga` (
  `id_harga` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `harga` int(225) NOT NULL,
  `stok` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_harga`
--

INSERT INTO `tb_harga` (`id_harga`, `id_ukuran`, `harga`, `stok`) VALUES
(1, 1, 21500, 100),
(3, 2, 36000, 100),
(4, 3, 60000, 100),
(5, 4, 88000, 95),
(6, 5, 123000, 100),
(7, 7, 210000, 98),
(8, 8, 386000, 96),
(9, 9, 509000, 100),
(10, 10, 720000, 100),
(12, 11, 2060000, 97),
(13, 12, 510000, 100),
(14, 13, 682000, 92),
(16, 14, 999000, 98),
(17, 15, 3230000, 100),
(18, 16, 9800, 100),
(19, 17, 11000, 100),
(20, 18, 22700, 100),
(21, 19, 49200, 100),
(22, 20, 92500, 100),
(23, 21, 190800, 100),
(24, 22, 338600, 100),
(25, 23, 499600, 100),
(26, 24, 820600, 98),
(27, 25, 2507300, 100),
(29, 27, 235000, 97);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `foto_kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `foto_kategori`) VALUES
(16, 'PLUMBING & CHILLER PIPE', 'image001.png'),
(17, 'FITTINGS as per ASTM D2846', 'image003.jpg'),
(18, 'FLOWGUARD SOLVENT CEMENT', 'image049.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `total` int(111) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `id_user`, `id_barang`, `id_ukuran`, `jumlah`, `total`, `id_transaksi`) VALUES
(1, 9, 6, 27, 2, 470000, 1),
(2, 9, 3, 14, 2, 1998000, 2),
(3, 9, 4, 25, 39, 97784700, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kurir`
--

CREATE TABLE `tb_kurir` (
  `id_kurir` int(11) NOT NULL,
  `kurir` enum('Delivery by pipe master','Pick up by customer') NOT NULL,
  `ongkir` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kurir`
--

INSERT INTO `tb_kurir` (`id_kurir`, `kurir`, `ongkir`) VALUES
(1, 'Delivery by pipe master', 500000),
(2, 'Pick up by customer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `invoice` varchar(300) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `telp` int(30) NOT NULL,
  `provinsi` varchar(225) NOT NULL,
  `kota` varchar(225) NOT NULL,
  `kecamatan` varchar(225) NOT NULL,
  `kelurahan` varchar(225) NOT NULL,
  `kode_pos` int(30) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `total` int(100) NOT NULL,
  `ongkir` int(100) NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `id_bukti` int(11) NOT NULL,
  `status` enum('1','2','3','4','5','6') NOT NULL COMMENT '1 = blm dibayar, 2 = menunggu konfirmasi, 3 = diproses, 4 = dikirim, 5 = diterima, 6 = ditolak',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `invoice`, `tanggal_transaksi`, `id_user`, `nama_penerima`, `telp`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `kode_pos`, `alamat`, `total`, `ongkir`, `id_kurir`, `id_bukti`, `status`, `keterangan`) VALUES
(1, 'PM20211104045228', '2021-11-04', 9, 'akmal', 2147483647, 'jauh', 'Tangerang Selatan', 'menegah ', 'dasd', 123, 'aa', 970000, 500000, 1, 1, '5', ''),
(2, 'PM20211104050538', '2021-11-04', 9, 'akmal', 2147483647, '', '', '', '', 0, '', 1998000, 0, 2, 2, '5', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ukuran`
--

CREATE TABLE `tb_ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `ukuran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ukuran`
--

INSERT INTO `tb_ukuran` (`id_ukuran`, `id_barang`, `ukuran`) VALUES
(1, 1, '1/2'),
(2, 1, '3/4'),
(3, 1, '1'),
(4, 1, '1 1/4'),
(5, 1, '1 1/2'),
(7, 1, '2'),
(8, 2, '2 1/2'),
(9, 2, '3'),
(10, 2, '4'),
(11, 2, '6'),
(12, 3, '2 1/2'),
(13, 3, '3'),
(14, 3, '4'),
(15, 3, '6'),
(16, 4, '1/2'),
(17, 4, '3/4'),
(18, 4, '1'),
(19, 4, '1 1/4'),
(20, 4, '1 1/2'),
(21, 4, '2'),
(22, 4, '2 1/2 Sch40'),
(23, 4, '3 Sch40'),
(24, 4, '4 Sch40'),
(25, 4, '6 Sch40'),
(27, 6, '1 Pint (473ml)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(225) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `id_level` int(11) NOT NULL COMMENT '1 = admin, 2 = user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `telp`, `password`, `id_level`) VALUES
(6, 'Hibatul Akmall', 'akmalhibatul1@gmail.com', '821231222', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(9, 'Hibatul Akmal', 'akmalhibatul2@gmail.com', '12345678910', '202cb962ac59075b964b07152d234b70', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_bukti`
--
ALTER TABLE `tb_bukti`
  ADD PRIMARY KEY (`id_bukti`);

--
-- Indexes for table `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD PRIMARY KEY (`id_harga`),
  ADD KEY `id_ukuran` (`id_ukuran`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tb_kurir`
--
ALTER TABLE `tb_kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  ADD PRIMARY KEY (`id_ukuran`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_bukti`
--
ALTER TABLE `tb_bukti`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_harga`
--
ALTER TABLE `tb_harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kurir`
--
ALTER TABLE `tb_kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD CONSTRAINT `tb_harga_ibfk_1` FOREIGN KEY (`id_ukuran`) REFERENCES `tb_ukuran` (`id_ukuran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  ADD CONSTRAINT `tb_ukuran_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
