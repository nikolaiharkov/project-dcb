-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 10:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdcb`
--

-- --------------------------------------------------------

--
-- Table structure for table `datacoldstorage`
--

CREATE TABLE `datacoldstorage` (
  `id` int(10) NOT NULL,
  `tanggalwaktu` varchar(30) NOT NULL,
  `importir` varchar(30) NOT NULL,
  `merek` varchar(30) NOT NULL,
  `jenisdaging` varchar(30) NOT NULL,
  `qty` float NOT NULL,
  `hargadasar` float NOT NULL,
  `hargaaset` float NOT NULL,
  `operator` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dataimportir`
--

CREATE TABLE `dataimportir` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `datajenisdaging`
--

CREATE TABLE `datajenisdaging` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `datamerek`
--

CREATE TABLE `datamerek` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `freezerkeluar`
--

CREATE TABLE `freezerkeluar` (
  `id` int(11) NOT NULL,
  `tanggalwaktu` varchar(30) NOT NULL,
  `jenisproduksi` varchar(30) NOT NULL,
  `berat` float NOT NULL,
  `operator` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `modal` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `freezerstorage`
--

CREATE TABLE `freezerstorage` (
  `id` int(11) NOT NULL,
  `jenisproduksi` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `berat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenisproduksi`
--

CREATE TABLE `jenisproduksi` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sisa`
--

CREATE TABLE `sisa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlahsisa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tempcoldstorage`
--

CREATE TABLE `tempcoldstorage` (
  `id` int(10) NOT NULL,
  `tanggalwaktu` varchar(30) NOT NULL,
  `importir` varchar(30) NOT NULL,
  `merek` varchar(30) NOT NULL,
  `jenisdaging` varchar(30) NOT NULL,
  `qty` float NOT NULL,
  `hargadasar` float NOT NULL,
  `hargaaset` float NOT NULL,
  `operator` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` int(3) NOT NULL,
  `jenisproduksi` varchar(100) NOT NULL,
  `qtyhasil` varchar(100) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `totalassetfreezer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temphasilproduksi`
--

CREATE TABLE `temphasilproduksi` (
  `id` int(11) NOT NULL,
  `jenisproduksi` varchar(50) NOT NULL,
  `qty` int(30) NOT NULL,
  `berat` float NOT NULL,
  `totalberat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `userpegawai`
--

CREATE TABLE `userpegawai` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userpegawai`
--

INSERT INTO `userpegawai` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datacoldstorage`
--
ALTER TABLE `datacoldstorage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dataimportir`
--
ALTER TABLE `dataimportir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datajenisdaging`
--
ALTER TABLE `datajenisdaging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datamerek`
--
ALTER TABLE `datamerek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freezerkeluar`
--
ALTER TABLE `freezerkeluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freezerstorage`
--
ALTER TABLE `freezerstorage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenisproduksi`
--
ALTER TABLE `jenisproduksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sisa`
--
ALTER TABLE `sisa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempcoldstorage`
--
ALTER TABLE `tempcoldstorage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temphasilproduksi`
--
ALTER TABLE `temphasilproduksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userpegawai`
--
ALTER TABLE `userpegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datacoldstorage`
--
ALTER TABLE `datacoldstorage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dataimportir`
--
ALTER TABLE `dataimportir`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datajenisdaging`
--
ALTER TABLE `datajenisdaging`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datamerek`
--
ALTER TABLE `datamerek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freezerkeluar`
--
ALTER TABLE `freezerkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freezerstorage`
--
ALTER TABLE `freezerstorage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenisproduksi`
--
ALTER TABLE `jenisproduksi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sisa`
--
ALTER TABLE `sisa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempcoldstorage`
--
ALTER TABLE `tempcoldstorage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temphasilproduksi`
--
ALTER TABLE `temphasilproduksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userpegawai`
--
ALTER TABLE `userpegawai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
