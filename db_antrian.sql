-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 03:15 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_antrian`
--

CREATE TABLE `tbl_antrian` (
  `id_antrian` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `antrian` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_antrian`
--

INSERT INTO `tbl_antrian` (`id_antrian`, `tanggal`, `antrian`, `status`) VALUES
(5, '2018-10-24', 'A002', 0),
(7, '2018-10-26', 'A001', 1),
(8, '2018-10-26', 'A002', 0),
(9, '2018-10-26', 'A003', 1),
(10, '2018-10-26', 'A004', 1),
(11, '2018-10-27', 'A001', 0),
(12, '2018-10-27', 'A002', 0),
(13, '2018-11-07', 'A001', 0),
(14, '2018-11-07', 'A002', 0),
(15, '2018-11-12', 'A001', 0),
(19, '2019-12-05', 'A001', 0),
(20, '2019-12-27', 'A001', 0),
(21, '2019-12-27', 'A002', 0),
(22, '2019-12-27', 'A003', 0),
(23, '2019-12-27', 'A004', 0),
(24, '2019-12-27', 'A005', 0),
(25, '2019-12-27', 'A006', 0),
(26, '2019-12-27', 'A007', 0),
(29, '2020-01-13', 'A002', 0),
(30, '2020-01-13', 'A003', 0),
(32, '2020-01-23', 'A002', 0),
(36, '2020-01-23', 'A006', 0),
(37, '2020-01-23', 'A007', 0),
(38, '2020-01-23', 'A008', 0),
(39, '2020-01-24', 'A001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hubungi`
--

CREATE TABLE `tbl_hubungi` (
  `id_hubungi` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `bagian` varchar(255) DEFAULT NULL,
  `hari_pertama` int(11) DEFAULT NULL,
  `hari_terakhir` int(11) DEFAULT NULL,
  `jam_pertama` time DEFAULT NULL,
  `jam_terakhir` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_staff`, `bagian`, `hari_pertama`, `hari_terakhir`, `jam_pertama`, `jam_terakhir`) VALUES
(5, 1, 'Costumer Service', 1, 5, '10:00:00', '12:00:00'),
(6, 2, 'Teller', 1, 5, '10:00:00', '12:00:00'),
(7, 3, 'Teller', 1, 5, '10:00:00', '12:00:00'),
(8, 8, 'Costumer Service', 1, 5, '12:00:00', '15:00:00'),
(9, 12, 'Costumer Service', 1, 5, '12:00:00', '15:00:00'),
(10, 13, 'Teller', 1, 5, '12:00:00', '15:00:00'),
(11, 14, 'Teller', 1, 5, '12:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jamkes`
--

CREATE TABLE `tbl_jamkes` (
  `id_jamkes` int(11) NOT NULL,
  `singkatan` varchar(255) NOT NULL,
  `nama_jamkes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jamkes`
--

INSERT INTO `tbl_jamkes` (`id_jamkes`, `singkatan`, `nama_jamkes`) VALUES
(1, 'BPJS', 'Badan Penyelenggara Jaminan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_layanan`
--

CREATE TABLE `tbl_layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_layanan` varchar(255) DEFAULT NULL,
  `code_layanan` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_layanan`
--

INSERT INTO `tbl_layanan` (`id_layanan`, `nama`, `jenis_layanan`, `code_layanan`) VALUES
(1, 'Costumer Service', 'Membantu menyelesaikan masalah costumer', 'CS'),
(2, 'Teler', 'Membantu costumer untuk menabung, mengambil uang, mentransfer uang, dll.', 'TL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_daftar` int(11) NOT NULL,
  `username_c` varchar(255) NOT NULL,
  `password_c` varchar(255) NOT NULL,
  `id_antrian` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` varchar(255) DEFAULT NULL,
  `NIK` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id_daftar`, `username_c`, `password_c`, `id_antrian`, `nama`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `NIK`) VALUES
(24, 'test1', 'testaja123', '28', 'sadsadaetet', 'jl kemerdekaa', 'Laki-Laki', 'Bandug', '15-10-2007', 40224),
(26, '123', '123', '39', '123', '123', 'Laki-Laki', '123', '123', 123),
(27, '1234', '1234', '31', '2134', '2134', 'Laki-Laki', '1234', '1234', 1234),
(28, 'qwer', 'qwer', '32', 'qwer', 'qwr', 'Laki-Laki', 'qwr', 'qw', 0),
(29, 'asd', 'asd', '36', 'kajshdj', 'akjdhaksd', 'Laki-Laki', 'ajkshd', 'kajshdkj', 0),
(30, '1234', '1234', '38', 'kjashdkj', 'kjashd', 'Laki-Laki', 'kjashdjk', 'kjashd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `id_staff` int(11) NOT NULL,
  `nama_staff` varchar(200) DEFAULT NULL,
  `tempat_lahir` varchar(200) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `pendidikan_akhir` varchar(255) DEFAULT NULL,
  `id_layanan` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`id_staff`, `nama_staff`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `status`, `pendidikan_akhir`, `id_layanan`) VALUES
(1, 'Adexe', 'Lahirian', '2018-10-05', 'Jalan Sumbreng									', 'male', 'Staff', 'S1', 1),
(2, 'AdexeHola', 'Lhiaraasn', '2018-11-24', 'Dimana Saja												', 'female', 'Staff', 'S1', 2),
(3, 'adexe an ade', 'a12321', '2018-11-29', 'asdasdads																								', 'male', 'Staff', 'S1', 2),
(8, 'asdasd', 'asdasd', '2018-10-23', 'asdasdasd									', 'male', 'Staff', 'S1', 1),
(12, 'Desi', 'Semarang', '2018-12-22', 'Semarang dimana aku gatau', 'female', 'Staff', 'S1', 1),
(13, 'Zakiyya', 'Semarang', '2018-08-15', 'Semarang', 'female', 'Staff', 'S1', 2),
(14, 'Ezron', 'Miniman', '2018-11-08', 'Suaoro', 'male', 'Staff', 'S1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `akses` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `akses`) VALUES
(1, 'adexe', '8d93b7e9ffa0c1549772f7d2082d7b98', 'alifianadexe', 'Admin'),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_antrian`
--
ALTER TABLE `tbl_antrian`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indexes for table `tbl_hubungi`
--
ALTER TABLE `tbl_hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_jamkes`
--
ALTER TABLE `tbl_jamkes`
  ADD PRIMARY KEY (`id_jamkes`);

--
-- Indexes for table `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_antrian`
--
ALTER TABLE `tbl_antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_hubungi`
--
ALTER TABLE `tbl_hubungi`
  MODIFY `id_hubungi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_jamkes`
--
ALTER TABLE `tbl_jamkes`
  MODIFY `id_jamkes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
