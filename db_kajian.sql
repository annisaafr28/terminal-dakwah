-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2022 at 04:04 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(150) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('na8v58s7u1h4qncjrvjl3sig6ummfbh1', '::1', 1648267395, 0x5f5f63695f6c6173745f726567656e65726174657c693a313634383236373134353b726f6c657c733a353a2261646d696e223b6e6f5f74656c707c733a31323a22303831373632353338373433223b656d61696c7c733a31363a22616e6e69736140676d61696c2e636f6d223b757365726e616d657c733a393a22616e6e697361313233223b666f746f7c4e3b);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kajian`
--

CREATE TABLE `jadwal_kajian` (
  `id_jadwal_kajian` int(11) NOT NULL,
  `id_masjid` int(11) NOT NULL,
  `id_ustad` int(11) NOT NULL,
  `id_kajian` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `keterangan` varchar(255) NOT NULL,
  `flyer_kajian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_kajian`
--

INSERT INTO `jadwal_kajian` (`id_jadwal_kajian`, `id_masjid`, `id_ustad`, `id_kajian`, `tanggal`, `waktu`, `keterangan`, `flyer_kajian`) VALUES
(1, 1, 1, 2, '2022-02-25', '12:00:00', 'Harap datang tepat waktu', 'masjid5.jpg'),
(2, 1, 2, 1, '2022-03-04', '16:00:00', 'Harap datang tepat waktu', 'masjid6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kajian`
--

CREATE TABLE `kajian` (
  `id_kajian` int(11) NOT NULL,
  `judul_kajian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kajian`
--

INSERT INTO `kajian` (`id_kajian`, `judul_kajian`) VALUES
(1, 'tadabbur quran'),
(2, 'riyadhus shalihin'),
(3, 'adabul mufrad'),
(4, 'fawaiddul al fawwaid');

-- --------------------------------------------------------

--
-- Table structure for table `masjid`
--

CREATE TABLE `masjid` (
  `id_masjid` int(11) NOT NULL,
  `nama_masjid` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `url_maps` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masjid`
--

INSERT INTO `masjid` (`id_masjid`, `nama_masjid`, `alamat`, `url_maps`, `foto`) VALUES
(1, 'Baitul Masjid', 'Demak, Surabaya', 'map.com', 'masjid4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('admin','pegawai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `no_telp`, `email`, `role`) VALUES
(1, 'annisa123', '12345678', '081762538743', 'annisa@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ustad`
--

CREATE TABLE `ustad` (
  `id_ustad` int(11) NOT NULL,
  `nama_ustad` varchar(255) DEFAULT NULL,
  `alamat_ustad` varchar(255) DEFAULT NULL,
  `no_hp` int(255) DEFAULT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ustad`
--

INSERT INTO `ustad` (`id_ustad`, `nama_ustad`, `alamat_ustad`, `no_hp`, `foto`) VALUES
(1, 'Ustad Teguh Ismanto', 'Malang', 2147483647, 'profile1.png'),
(2, 'Ustad Imam Malik', 'Malang', 2147483647, 'bootstrap-logo8.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_kajian`
--
ALTER TABLE `jadwal_kajian`
  ADD PRIMARY KEY (`id_jadwal_kajian`),
  ADD KEY `masjid` (`id_masjid`),
  ADD KEY `ustad` (`id_ustad`),
  ADD KEY `kajian` (`id_kajian`);

--
-- Indexes for table `kajian`
--
ALTER TABLE `kajian`
  ADD PRIMARY KEY (`id_kajian`);

--
-- Indexes for table `masjid`
--
ALTER TABLE `masjid`
  ADD PRIMARY KEY (`id_masjid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `ustad`
--
ALTER TABLE `ustad`
  ADD PRIMARY KEY (`id_ustad`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_kajian`
--
ALTER TABLE `jadwal_kajian`
  MODIFY `id_jadwal_kajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kajian`
--
ALTER TABLE `kajian`
  MODIFY `id_kajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masjid`
--
ALTER TABLE `masjid`
  MODIFY `id_masjid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ustad`
--
ALTER TABLE `ustad`
  MODIFY `id_ustad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_kajian`
--
ALTER TABLE `jadwal_kajian`
  ADD CONSTRAINT `jadwal_kajian_ibfk_1` FOREIGN KEY (`id_kajian`) REFERENCES `kajian` (`id_kajian`),
  ADD CONSTRAINT `jadwal_kajian_ibfk_2` FOREIGN KEY (`id_ustad`) REFERENCES `ustad` (`id_ustad`),
  ADD CONSTRAINT `jadwal_kajian_ibfk_3` FOREIGN KEY (`id_masjid`) REFERENCES `masjid` (`id_masjid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
