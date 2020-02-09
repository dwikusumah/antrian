-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 12:20 AM
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
(177, '2020-02-07', 'A002', 0),
(178, '2020-02-07', 'A003', 0),
(179, '2020-02-06', 'A001', 1),
(180, '2020-02-09', 'A001', 1),
(181, '2020-02-09', 'A002', 1),
(182, '2020-02-09', 'A003', 1),
(183, '2020-02-09', 'A004', 1),
(184, '2020-02-09', 'A005', 1),
(185, '2020-02-09', 'A006', 1),
(186, '2020-02-09', 'A007', 1),
(187, '2020-02-09', 'A008', 1),
(188, '2020-02-09', 'A009', 0),
(189, '2020-02-09', 'A010', 0),
(190, '2020-02-09', 'A011', 0),
(191, '2020-02-09', 'A002', 1),
(192, '2020-02-09', 'A002', 1),
(193, '2020-02-09', 'A002', 1),
(194, '2020-02-09', 'A002', 1),
(195, '2020-02-09', 'A002', 1),
(196, '2020-02-09', 'A002', 1),
(197, '2020-02-09', 'A012', 0),
(198, '2020-02-09', 'A013', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(6) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(4) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `harga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `nama_barang`, `stok`, `jenis_barang`, `harga`) VALUES
(123456, 'Kuaci', 16, 'snack', 8000),
(234567, 'Roti Tawar', 6, 'makanan', 10000),
(435435, 'Good Time', 8, 'Snack', 7000),
(546464, 'Coca cola', 24, 'Minuman', 4500),
(565552, 'Nu GreenTea', 193, 'Minuman', 5000);

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
(1, 'Admin', 'Mengatur semua akses', 'ADM'),
(2, 'Kasir', 'Melayani Pelanggan ', 'KSR');

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
(26, '123', '123', '41', '123', '123', 'Laki-Laki', '123', '123', 123),
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
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(20) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `tanggal`, `username`, `total`) VALUES
('TRK00001', '2020-02-07 06:07:44', 'kasir', 30500),
('TRK00002', '2020-02-07 07:27:56', 'kasir', 8000),
('TRK00003', '2020-02-07 07:31:01', 'kasir', 21500),
('TRK00004', '2020-02-07 07:32:38', 'kasir', 18000),
('TRK00005', '2020-02-07 07:45:55', 'kasir', 28000),
('TRK00006', '2020-02-07 07:54:19', 'kasir', 23000),
('TRK00007', '2020-02-07 07:55:13', 'kasir', 17000),
('TRK00008', '2020-02-07 09:35:06', 'kasir', 68000),
('TRK00009', '2020-02-07 09:36:52', 'kasir', 24000),
('TRK00010', '2020-02-07 13:10:41', 'kasir', 18000),
('TRK00011', '2020-02-07 13:16:01', 'kasir', 17000),
('TRK00012', '2020-02-07 13:57:46', 'kasir', 18000),
('TRK00013', '2020-02-07 13:58:29', 'kasir', 29500),
('TRK00014', '2020-02-08 03:13:53', 'kasir', 50500),
('TRK00015', '2020-02-08 03:14:14', 'kasir', 8000),
('TRK00016', '2020-02-08 08:20:28', 'kasir', 26000),
('TRK00017', '2020-02-08 10:49:30', 'kasir', 10000),
('TRK00018', '2020-02-08 11:39:31', 'kasir', 44000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_detail`
--

CREATE TABLE `tbl_transaksi_detail` (
  `id` int(3) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `hargasatuan` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi_detail`
--

INSERT INTO `tbl_transaksi_detail` (`id`, `id_transaksi`, `id_barang`, `jumlah`, `hargasatuan`, `total`) VALUES
(3, 'TRK00001', 123456, 1, 8000, 8000),
(4, 'TRK00001', 546464, 5, 4500, 22500),
(5, 'TRK00002', 123456, 1, 8000, 8000),
(6, 'TRK00003', 234567, 1, 10000, 10000),
(7, 'TRK00003', 435435, 1, 7000, 7000),
(8, 'TRK00003', 546464, 1, 4500, 4500),
(9, 'TRK00004', 123456, 1, 8000, 8000),
(10, 'TRK00004', 234567, 1, 10000, 10000),
(11, 'TRK00005', 123456, 1, 8000, 8000),
(12, 'TRK00005', 234567, 2, 10000, 20000),
(13, 'TRK00006', 123456, 2, 8000, 16000),
(14, 'TRK00006', 435435, 1, 7000, 7000),
(15, 'TRK00007', 234567, 1, 10000, 10000),
(16, 'TRK00007', 435435, 1, 7000, 7000),
(17, 'TRK00008', 435435, 4, 7000, 28000),
(18, 'TRK00008', 234567, 4, 10000, 40000),
(19, 'TRK00009', 123456, 3, 8000, 24000),
(20, 'TRK00010', 123456, 1, 8000, 8000),
(21, 'TRK00010', 234567, 1, 10000, 10000),
(22, 'TRK00011', 234567, 1, 10000, 10000),
(23, 'TRK00011', 435435, 1, 7000, 7000),
(24, 'TRK00012', 123456, 1, 8000, 8000),
(25, 'TRK00012', 234567, 1, 10000, 10000),
(26, 'TRK00013', 123456, 1, 8000, 8000),
(27, 'TRK00013', 234567, 1, 10000, 10000),
(28, 'TRK00013', 435435, 1, 7000, 7000),
(29, 'TRK00013', 546464, 1, 4500, 4500),
(30, 'TRK00014', 234567, 1, 10000, 10000),
(31, 'TRK00014', 123456, 1, 8000, 8000),
(32, 'TRK00014', 435435, 4, 7000, 28000),
(33, 'TRK00014', 546464, 1, 4500, 4500),
(34, 'TRK00015', 123456, 1, 8000, 8000),
(35, 'TRK00016', 234567, 1, 10000, 10000),
(36, 'TRK00016', 435435, 1, 7000, 7000),
(37, 'TRK00016', 546464, 2, 4500, 9000),
(38, 'TRK00017', 234567, 1, 10000, 10000),
(39, 'TRK00018', 565552, 7, 5000, 35000),
(40, 'TRK00018', 546464, 2, 4500, 9000);

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
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin'),
(10, 'vriska54', '81dc9bdb52d04dc20036dbd8313ed055', 'Vriska', 'Kasir'),
(11, 'suryana87', '6777f802749c8b4ea805d0dbb1b88455', 'Suryana M', 'Kasir'),
(13, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Ahmad', 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_antrian`
--
ALTER TABLE `tbl_antrian`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

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
-- AUTO_INCREMENT for table `tbl_transaksi_detail`
--
ALTER TABLE `tbl_transaksi_detail`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
