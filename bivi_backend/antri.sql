-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2017 at 10:46 AM
-- Server version: 5.5.55-0+deb8u1
-- PHP Version: 7.0.20-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `antri`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `nama_admin` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'David Noya', 'davidnoya', '24d4a06b98d00cc5ab503b081c9e3ee9'),
(2, 'Edgar Pontoh', 'edgar', '7f7d47f1ff6bf26a221b21ae3bde1074'),
(3, 'Boby', 'bnajoan', '62232168cd10631e11dc76d0f004e4d2');

-- --------------------------------------------------------

--
-- Table structure for table `antri`
--

CREATE TABLE IF NOT EXISTS `antri` (
`id_antri` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `waktu` datetime NOT NULL,
  `ket_user` varchar(45) DEFAULT NULL,
  `id_tujuan` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `antri`
--

INSERT INTO `antri` (`id_antri`, `nama`, `waktu`, `ket_user`, `id_tujuan`) VALUES
(101, 'Bijig', '2017-07-19 08:00:00', NULL, 1),
(102, 'Edgar', '2017-07-19 08:14:00', NULL, 1),
(103, 'Noya', '2017-07-19 08:28:00', NULL, 4),
(104, 'Boby', '2017-07-19 08:42:00', NULL, 1),
(105, 'test', '2017-07-19 08:56:00', NULL, 3),
(106, 'bob', '2017-07-19 09:10:00', NULL, 3),
(107, 'yumi', '2017-07-19 09:24:00', NULL, 7),
(108, 'YUNI', '2017-07-19 09:38:00', NULL, 7),
(109, 'YAAAA NDA JD', '2017-07-19 09:52:00', NULL, 9),
(110, 'Edgar', '2017-07-19 10:06:00', NULL, 1),
(111, 'Bijon', '2017-07-19 10:20:00', NULL, 1),
(112, 'Test', '2017-07-20 08:00:00', NULL, 8),
(113, 'bnajoan', '2017-07-20 08:14:00', NULL, 1),
(114, 'ajag', '2017-07-20 08:28:00', NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `antrian_selesai`
--

CREATE TABLE IF NOT EXISTS `antrian_selesai` (
`id_antrian_selesai` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `ket_user` varchar(45) DEFAULT NULL,
  `ket_admin` varchar(45) DEFAULT NULL,
  `tujuan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `antrian_selesai`
--

INSERT INTO `antrian_selesai` (`id_antrian_selesai`, `nama`, `waktu`, `ket_user`, `ket_admin`, `tujuan`) VALUES
(2, 'Anton', '2017-07-17 08:00:00', NULL, NULL, 'Urus tanah'),
(5, 'David Noya', '2017-07-16 08:30:00', NULL, NULL, 'Urus orang pe rumah tangga'),
(6, 'Jeremy', '2017-07-17 08:15:00', NULL, NULL, 'Urus tanah'),
(7, 'ajag', '2017-07-16 08:45:00', NULL, NULL, 'Urus orang pe rumah tangga'),
(25, 'David', '2017-07-18 08:00:00', NULL, NULL, 'Urus tanah'),
(50, 'ajag', '2017-07-18 09:15:00', NULL, NULL, 'Urus tanah'),
(51, 'terlalu', '2017-07-18 09:30:00', NULL, NULL, 'Urus tanah'),
(52, NULL, NULL, NULL, NULL, NULL),
(53, NULL, NULL, NULL, NULL, NULL),
(54, 'David', '2017-07-18 08:00:00', NULL, NULL, 'Mengurus KTP'),
(55, 'Agus', '2017-07-18 08:00:00', NULL, NULL, 'Urus tanah'),
(56, 'Agus', '2017-07-18 08:00:00', NULL, NULL, 'Mengurus Kartu Keluarga'),
(57, 'Agus', '2017-07-18 08:12:00', NULL, NULL, 'Urus tanah'),
(58, 'Edgar', '2017-07-18 08:00:00', NULL, NULL, 'Mengurus KTP'),
(59, 'Jeremy', '2017-07-18 08:00:00', NULL, NULL, 'Mengurus KTP'),
(60, 'Bijon', '2017-07-18 08:14:00', NULL, '', 'Mengurus Kartu Keluarga'),
(61, 'Boby', '2017-07-18 08:28:00', NULL, '5 menit selesai', 'Memboikot Pemerintah'),
(62, 'Edgar', '2017-07-18 08:00:00', NULL, 'QQQQ', 'Urus tanah');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_antri` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `ket_admin` varchar(45) DEFAULT NULL,
  `keterangan` enum('Tidak Datang','Selesai') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `toleransi` int(11) NOT NULL,
  `penanganan` int(11) NOT NULL,
  `jam_mulai` int(11) NOT NULL,
  `jam_tutup` int(11) NOT NULL,
  `jam_istirahat_mulai` int(11) NOT NULL,
  `jam_istirahat_selesai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`toleransi`, `penanganan`, `jam_mulai`, `jam_tutup`, `jam_istirahat_mulai`, `jam_istirahat_selesai`) VALUES
(120, 720, 28800, 61200, 39600, 46800);

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE IF NOT EXISTS `tujuan` (
`id_tujuan` int(11) NOT NULL,
  `tujuan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `tujuan`) VALUES
(1, 'Urus tanah'),
(3, 'Mengurus KTP'),
(4, 'Mengurus Kartu Keluarga'),
(7, 'AKTA KELAHIRAN'),
(8, 'AKTA KEMATIAN'),
(9, 'AKTA PERKAWINAN'),
(10, 'SURAT KETERANGAN PINDAH DATANG WNI'),
(11, 'AKTA PERCERAIAN'),
(12, 'PENGAKUAN ANAK'),
(13, 'PENGESAHAN ANAK'),
(14, 'PENCATATAN PENGANGKATAN ANAK'),
(15, 'KUTIPAN KEDUA AKTA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `antri`
--
ALTER TABLE `antri`
 ADD PRIMARY KEY (`id_antri`), ADD KEY `fk_antri_tujuan_idx` (`id_tujuan`);

--
-- Indexes for table `antrian_selesai`
--
ALTER TABLE `antrian_selesai`
 ADD PRIMARY KEY (`id_antrian_selesai`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
 ADD KEY `fk_log_antri1_idx` (`id_antri`), ADD KEY `fk_log_admin1_idx` (`id_admin`);

--
-- Indexes for table `option`
--
ALTER TABLE `option`
 ADD PRIMARY KEY (`toleransi`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
 ADD PRIMARY KEY (`id_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `antri`
--
ALTER TABLE `antri`
MODIFY `id_antri` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `antrian_selesai`
--
ALTER TABLE `antrian_selesai`
MODIFY `id_antrian_selesai` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
MODIFY `id_tujuan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `antri`
--
ALTER TABLE `antri`
ADD CONSTRAINT `fk_antri_tujuan` FOREIGN KEY (`id_tujuan`) REFERENCES `tujuan` (`id_tujuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
ADD CONSTRAINT `fk_log_admin1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_log_antri1` FOREIGN KEY (`id_antri`) REFERENCES `antri` (`id_antri`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
