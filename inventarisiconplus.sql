-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2017 at 06:50 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventarisiconplus`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `NIP` varchar(20) NOT NULL,
  `Nama_Dpn` varchar(60) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Divisi` varchar(30) NOT NULL,
  `ID` int(2) NOT NULL,
  `Nama_Blkg` varchar(30) NOT NULL,
  `Email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`NIP`, `Nama_Dpn`, `Password`, `Divisi`, `ID`, `Nama_Blkg`, `Email`) VALUES
('1234567', 'Sendi', 'sendicon', 'IT Internal', 1, 'Rachmat', 'Warsyto@admin.com'),
('72344CN', 'Josua', 'josuaico', 'IT Helpdesk', 2, 'Chan', 'josua.chan@mail.com'),
('82345678', 'Sejo Rando', 'devorak', 'IT Internal', 3, 'Mardilah', 'sejoli@email.com'),
('91100CN', 'Iqbal', 'siapasaya', 'IT Helpdesk', 4, 'Maulana Wicaksana', 'iqbalanaw@mymail.com'),
('987123456', 'Sendi', 'sendisendi', 'IT Helpdesk', 5, 'Sendi', 'sendisendi@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `SerialNumber` varchar(15) NOT NULL,
  `Divisi` char(15) NOT NULL,
  `TipeBarang` varchar(31) NOT NULL,
  `NamaBarang` varchar(64) NOT NULL,
  `Lokasi1` char(8) NOT NULL,
  `Status` varchar(8) NOT NULL,
  `TanggalBuat` datetime NOT NULL,
  `LastUpdate` varchar(24) NOT NULL,
  `Lokasi2` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`SerialNumber`, `Divisi`, `TipeBarang`, `NamaBarang`, `Lokasi1`, `Status`, `TanggalBuat`, `LastUpdate`, `Lokasi2`) VALUES
('12121212121212', 'IT Helpdesk', 'CD', 'AAAAAAAA', 'Gudang 1', 'Tersedia', '2017-10-06 10:41:41', '2017-11-07 08:38:05', 'Gudang 1'),
('289E781T88GA', 'IT Helpdesk', 'CD', 'CDKUY', 'Gudang 4', 'Terpakai', '2017-08-21 04:21:37', '2017-11-07 08:37:59', 'Gudang 1'),
('51452616Q12V', 'IT Internal', 'KABEL LAN', 'KABEL 665A', 'Gudang 1', 'Tersedia', '2017-08-21 04:11:51', '2017-08-21 09:56:01', 'Gudang 3'),
('LASN1270', 'IT Helpdesk', 'KABEL LAN', 'LAN GO', 'Gudang 2', 'Tersedia', '2017-08-18 11:26:50', '2017-08-24 06:17:09', 'Gudang 1'),
('LOG12120983A', 'IT Helpdesk', 'KEYBOARD', 'LOGITECH AB3', 'Gudang 4', 'Tersedia', '2017-08-16 04:06:22', '2017-08-24 06:17:22', 'Gudang 1'),
('MDAWEIJF9892', 'IT Helpdesk', 'CD', 'DVD E3RI3P', 'Gudang 1', 'Terpakai', '2017-08-18 11:23:30', '2017-08-18 11:24:03', 'Gudang 3'),
('MSIEIJLEO783262', 'IT Helpdesk', 'MOUSE', 'LOGITECH 12X', 'Gudang 3', 'Tersedia', '2017-08-16 04:11:32', '2017-08-16 04:11:32', 'Gudang 3'),
('PRIJND819YEBD', 'IT Helpdesk', 'PRINTER & SCANNER', 'EPSON SUPER JET', 'Gudang 2', 'Tersedia', '2017-08-16 04:09:07', '2017-08-16 04:09:07', 'Gudang 2'),
('XPXKAO9271', 'IT Helpdesk', 'PRINTER & SCANNER', 'EPSON SUPER JET', 'Gudang 2', 'Terpakai', '2017-08-16 04:10:24', '2017-08-16 04:10:24', 'Gudang 2');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `ID` int(5) NOT NULL,
  `SerialNumber` varchar(15) NOT NULL,
  `Path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`ID`, `SerialNumber`, `Path`) VALUES
(53, '51452616Q12V', '2014-03-Windows-Xp-Bliss-wallpaper.jpg'),
(3, '289E781T88GA', '2014-03-Windows-Xp-Bliss-wallpaper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kirim`
--

CREATE TABLE `kirim` (
  `ID` int(4) NOT NULL,
  `SerialNumber` varchar(15) NOT NULL,
  `TipeBarang` varchar(31) NOT NULL,
  `NamaBarang` varchar(64) NOT NULL,
  `Divisi` varchar(15) NOT NULL,
  `TanggalKirim` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Pengirim` varchar(31) NOT NULL,
  `Penerima` varchar(31) NOT NULL,
  `Lokasi1` char(8) NOT NULL,
  `Lokasi2` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kirim`
--

INSERT INTO `kirim` (`ID`, `SerialNumber`, `TipeBarang`, `NamaBarang`, `Divisi`, `TanggalKirim`, `Pengirim`, `Penerima`, `Lokasi1`, `Lokasi2`) VALUES
(9823, 'LOG12120983A', 'KEYBOARD', 'LOGITECH AB3', 'IT Helpdesk', '2017-08-22 01:33:07', 'CONTOH', 'COBA', 'Gudang 4', 'Gudang 1'),
(2632, '289E781T88GA', 'CD', 'CDKUY', 'IT Helpdesk', '2017-08-22 01:47:39', 'CONTOH', 'COBA', 'Gudang 1', 'Gudang 4'),
(3444, 'LASN1270', 'KABEL LAN', 'LAN GO', 'IT Helpdesk', '2017-08-22 01:49:37', 'SSSSS', 'AAAAA', 'Gudang 2', 'Gudang 3');

-- --------------------------------------------------------

--
-- Table structure for table `ready`
--

CREATE TABLE `ready` (
  `TipeBarang` varchar(20) NOT NULL,
  `Ready` int(4) NOT NULL,
  `ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ready`
--

INSERT INTO `ready` (`TipeBarang`, `Ready`, `ID`) VALUES
('KEYBOARD', 1, 0),
('KEYBOARD', 2, 3),
('MOUSE', 1, 7),
('KABEL LAN', 2, 9),
('CD', 1, 14),
('CD', 1, 17),
('KEYBOARD', 1, 21),
('KEYBOARD', 2, 23),
('CD', 1, 32),
('KEYBOARD', 2, 42),
('KEYBOARD', 1, 53),
('CD', 1, 57),
('CD', 2, 60),
('CD', 1, 66),
('KABEL LAN', 2, 98),
('PRINTER & SCANNER', 1, 7617);

-- --------------------------------------------------------

--
-- Table structure for table `used`
--

CREATE TABLE `used` (
  `TipeBarang` varchar(20) NOT NULL,
  `Used` int(4) NOT NULL,
  `ID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `used`
--

INSERT INTO `used` (`TipeBarang`, `Used`, `ID`) VALUES
('KEYBOARD', 1, 0),
('KEYBOARD', 1, 36),
('CD', 1, 53),
('PRINTER & SCANNER', 1, 2786);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`SerialNumber`);

--
-- Indexes for table `ready`
--
ALTER TABLE `ready`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `used`
--
ALTER TABLE `used`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
