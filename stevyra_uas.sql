-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Jun 2025 pada 05.48
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stevyra_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `specialist` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `specialist`) VALUES
(1, 'Anggi Anggatama', 'Penyakit Dalam'),
(2, 'Faryan Ronggang', 'Obgyn'),
(3, 'Eun Ji Eun', 'Kulit'),
(4, 'Gyun Ta Rou', 'Bedah'),
(5, 'Ins Toraja', 'Mata'),
(6, 'Tangku Hika Termien', 'THT'),
(7, 'Jakurai Jinguji', 'Jantung'),
(8, 'Giselle Gilbert', 'Gigi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `keluhan` text NOT NULL,
  `tgl_kunjungan` date NOT NULL,
  `jam_kunjungan` time NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('disetujui','ditolak','dalam proses') NOT NULL DEFAULT 'dalam proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `id`, `nama`, `tgl_lahir`, `alamat`, `no_telpon`, `id_dokter`, `keluhan`, `tgl_kunjungan`, `jam_kunjungan`, `create_at`, `status`) VALUES
(2, 3, 'Bintang Gonzales', '2010-04-01', 'Jalan Masa Depan Blok 35 No 55', '089655434522', 3, 'Kesulitan melihat masa depan bersama dia', '2025-06-09', '11:40:00', '2025-06-07 15:43:57', 'ditolak'),
(4, 1, 'Bintang Hahahihihaha', '2006-01-09', 'Jalan Kenangan Bersama Dia', '089655434522', 7, 'Terasa Nyeri ketika melihat dia bersama yang lain', '2025-06-09', '08:50:00', '2025-06-08 01:50:40', 'disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `create_at`) VALUES
(1, 'Admin', '$2y$10$uqaULNaHRxZm/OjCIQYKJui4SEq0XH/p1zHhjwALXK6Xxui/wkqL.', 'admin', '2025-06-06 14:24:13'),
(2, 'pasien', '$2y$10$6EdvnpVew2HbPYwSEpcqRuu4m3i.R4.6X.8SE652RWRU2r5u.5AFS', 'user', '2025-06-07 02:11:30'),
(3, 'pasien1', '$2y$10$uiF7pMAc1O295Q/FUfSEhetp5RJcyJFUXgcpV0ctKyauQOZ3PBSyG', 'user', '2025-06-07 15:40:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `fk_pasien_dokter` (`id_dokter`),
  ADD KEY `fk_pasien_users` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `fk_pasien_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pasien_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
