-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 12:58 PM
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
  `hargaaset` double NOT NULL,
  `operator` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dataimportir`
--

CREATE TABLE `dataimportir` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dataimportir`
--

INSERT INTO `dataimportir` (`id`, `nama`) VALUES
(1, 'Facebook'),
(4, 'Instagram');

-- --------------------------------------------------------

--
-- Table structure for table `datajenisdaging`
--

CREATE TABLE `datajenisdaging` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datajenisdaging`
--

INSERT INTO `datajenisdaging` (`id`, `nama`) VALUES
(3, 'Rendang');

-- --------------------------------------------------------

--
-- Table structure for table `datamerek`
--

CREATE TABLE `datamerek` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datamerek`
--

INSERT INTO `datamerek` (`id`, `nama`) VALUES
(1, 'nikooo'),
(4, 'untaa');

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
(3, 'daffa', '135a4e22cda0e0a68499e6d6e2a861aa'),
(4, 'fathur', '9da619bf8541126a58db0e6185e046e1');

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
(5, 'daffa', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'niko', '8e6c71cfc9bbd41e1cac7c01d2482517'),
(7, 'alvan', 'bde3460376497b0d502eb8d2191db422');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `datajenisdaging`
--
ALTER TABLE `datajenisdaging`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `datamerek`
--
ALTER TABLE `datamerek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userpegawai`
--
ALTER TABLE `userpegawai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
