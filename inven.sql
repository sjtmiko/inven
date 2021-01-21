-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 08:57 AM
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
-- Database: `inven`
--

-- --------------------------------------------------------

--
-- Table structure for table `out_barang`
--

CREATE TABLE `out_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `out_barang`
--

INSERT INTO `out_barang` (`id`, `nama_barang`, `merk`, `port`, `kode_produk`, `tgl_keluar`, `keterangan`) VALUES
(1, 'Router', 'Mikrotik', '24 Gigabite', 'ASN221', '2020-10-10', 'Ke Dinas Pendidikan'),
(2, 'Hub', 'TP-LINK', '15', 'APSS2233', '2020-10-09', 'ke kecamantan asoy');

-- --------------------------------------------------------

--
-- Table structure for table `stk_barang`
--

CREATE TABLE `stk_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stk_barang`
--

INSERT INTO `stk_barang` (`id`, `nama_barang`, `merk`, `port`, `kode_produk`, `tgl_masuk`, `keterangan`, `qr_code`) VALUES
(4, 'Hub', 'TP-LINK', '16', 'APSS2233', '2020-10-07', 'Barang Masuk lengkap', ''),
(5, 'Printer', 'Canon', '-', 'CN2911', '2020-10-06', 'Printer baru kantor A', ''),
(6, 'Router', 'TP-LINK', '4', 'GGHN10999', '2020-10-08', 'Barang Masuk lengkap', ''),
(7, 'Router', 'Cisco', '24 Gigabite', 'ADN90011', '2020-09-11', 'Citra Web', ''),
(8, 'Hub', 'TP-LINK', '4', 'HB1222', '2020-10-14', 'Citra Web', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `out_barang`
--
ALTER TABLE `out_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stk_barang`
--
ALTER TABLE `stk_barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `out_barang`
--
ALTER TABLE `out_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stk_barang`
--
ALTER TABLE `stk_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
