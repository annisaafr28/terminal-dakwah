-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Feb 2022 pada 10.39
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

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
-- Struktur dari tabel `jadwal_kajian`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `kajian`
--

CREATE TABLE `kajian` (
  `id_kajian` int(11) NOT NULL,
  `judul_kajian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kajian`
--

INSERT INTO `kajian` (`id_kajian`, `judul_kajian`) VALUES
(1, 'tadabbur quran'),
(2, 'riyadhus shalihin'),
(3, 'adabul mufrad'),
(4, 'fawaiddul al fawwaid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masjid`
--

CREATE TABLE `masjid` (
  `id_masjid` int(11) NOT NULL,
  `nama_masjid` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `url_maps` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `no_telp`, `email`, `role`) VALUES
(1, 'annisa123', '12345678', '081762538743', 'annisa@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ustad`
--

CREATE TABLE `ustad` (
  `id_ustad` int(11) NOT NULL,
  `nama_ustad` varchar(255) DEFAULT NULL,
  `alamat_ustad` varchar(255) DEFAULT NULL,
  `no_hp` int(255) DEFAULT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ustad`
--

INSERT INTO `ustad` (`id_ustad`, `nama_ustad`, `alamat_ustad`, `no_hp`, `foto`) VALUES
(1, 'Ustad Teguh Ismanto', 'Malang', 2147483647, 'profile1.png'),
(2, 'Ustad Imam Malik', 'Malang', 2147483647, 'bootstrap-logo8.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_kajian`
--
ALTER TABLE `jadwal_kajian`
  ADD PRIMARY KEY (`id_jadwal_kajian`),
  ADD KEY `masjid` (`id_masjid`),
  ADD KEY `ustad` (`id_ustad`),
  ADD KEY `kajian` (`id_kajian`);

--
-- Indeks untuk tabel `kajian`
--
ALTER TABLE `kajian`
  ADD PRIMARY KEY (`id_kajian`);

--
-- Indeks untuk tabel `masjid`
--
ALTER TABLE `masjid`
  ADD PRIMARY KEY (`id_masjid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `ustad`
--
ALTER TABLE `ustad`
  ADD PRIMARY KEY (`id_ustad`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_kajian`
--
ALTER TABLE `jadwal_kajian`
  MODIFY `id_jadwal_kajian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kajian`
--
ALTER TABLE `kajian`
  MODIFY `id_kajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `masjid`
--
ALTER TABLE `masjid`
  MODIFY `id_masjid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ustad`
--
ALTER TABLE `ustad`
  MODIFY `id_ustad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_kajian`
--
ALTER TABLE `jadwal_kajian`
  ADD CONSTRAINT `jadwal_kajian_ibfk_1` FOREIGN KEY (`id_kajian`) REFERENCES `kajian` (`id_kajian`),
  ADD CONSTRAINT `jadwal_kajian_ibfk_2` FOREIGN KEY (`id_ustad`) REFERENCES `ustad` (`id_ustad`),
  ADD CONSTRAINT `jadwal_kajian_ibfk_3` FOREIGN KEY (`id_masjid`) REFERENCES `masjid` (`id_masjid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
