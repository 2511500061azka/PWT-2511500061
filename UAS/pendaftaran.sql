-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2026 at 02:09 AM
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
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_pendaftaran` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL DEFAULT 'Laki-laki',
  `umur` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `poli` varchar(100) NOT NULL,
  `dokter` varchar(100) NOT NULL,
  `jam_konsul` time NOT NULL,
  `tanggal_daftar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_pendaftaran`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `umur`, `alamat`, `poli`, `dokter`, `jam_konsul`, `tanggal_daftar`) VALUES
(1, 'Argya', '2006-08-18', 'Laki-laki', 19, 'gabek', 'poli gigi', 'dokter herman', '09:00:00', '2026-06-09'),
(4, 'azka', '2001-05-18', 'Laki-laki', 25, 'muntok', 'Mata', 'dokter susanto', '21:00:00', '2026-06-21'),
(5, 'marcel', '2002-01-11', 'Laki-laki', 24, 'gabek', 'Umum', 'dokter susanto', '21:00:00', '2026-06-21'),
(6, 'ayani', '2006-06-16', 'Laki-laki', 20, 'alun alun', 'Gigi', 'dokter ali', '18:00:00', '2026-06-21'),
(7, 'ciaa', '2005-05-15', 'Perempuan', 25, 'selindung', 'Poli Umum', 'dokter herman', '20:00:00', '2026-06-21'),
(9, 'gya', '2010-11-11', 'Laki-laki', 20, 'selindung', 'Poli Gigi', 'dokter susanto', '11:10:00', '2026-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `medical_checkup`
--

CREATE TABLE `medical_checkup` (
  `id_checkup` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jam_checkup` time NOT NULL,
  `tanggal_daftar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_checkup`
--

INSERT INTO `medical_checkup` (`id_checkup`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_hp`, `jam_checkup`, `tanggal_daftar`) VALUES
(1, 'azka', '2005-06-16', 'Laki-laki', 'muntok', '0812345678', '20:30:00', '2026-06-03'),
(3, 'naya', '2001-01-17', 'Laki-laki', 'selindung', '0812131411', '19:00:00', '2026-06-05'),
(4, 'gilang', '2005-05-15', 'Laki-laki', 'dealova', '08624136134', '10:00:00', '2026-06-10'),
(6, 'ailia', '2010-10-14', 'Perempuan', 'kampak', '0812143141', '15:00:00', '2026-06-21'),
(7, 'aya', '2002-07-17', 'Perempuan', 'kampung asem', '0815243613', '16:00:00', '2026-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `username`, `password`) VALUES
(1, 'pasien', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL DEFAULT 'Laki-laki',
  `umur` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `poli` varchar(100) NOT NULL,
  `dokter` varchar(100) NOT NULL,
  `jam_perawatan` time NOT NULL,
  `tanggal_daftar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`id_perawatan`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `umur`, `alamat`, `poli`, `dokter`, `jam_perawatan`, `tanggal_daftar`) VALUES
(1, 'jaha', '2026-06-02', 'Laki-laki', 5, 'gabek', 'poli umum', 'dokter sugeng', '21:30:00', '2026-04-15'),
(3, 'jihan', '2005-05-15', 'Laki-laki', 21, 'selindung', 'Bedah', 'dokter sugeng', '20:00:00', '2026-06-21'),
(4, 'yaya', '2001-01-01', 'Laki-laki', 26, 'dealova', 'Mata', 'dokter sugeng', '19:00:00', '2026-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas','dokter','pasien') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'argya', '1234', 'admin'),
(2, 'azka', '12345', 'pasien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `medical_checkup`
--
ALTER TABLE `medical_checkup`
  ADD PRIMARY KEY (`id_checkup`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medical_checkup`
--
ALTER TABLE `medical_checkup`
  MODIFY `id_checkup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
