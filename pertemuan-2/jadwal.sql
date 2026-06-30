-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2026 at 03:00 PM
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
-- Database: `jadwal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id_admin` int(11) NOT NULL,
  `Nama_lengkap` varchar(50) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id_admin`, `Nama_lengkap`, `Username`, `Password`) VALUES
(2, 'Delpiah Wahyuningsih', 'admin', 12345),
(3, 'Muhammad Azka Nazhan', 'siswa', 12345),
(4, 'Udin Bengkel', 'guru', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `detail_jadwal`
--

CREATE TABLE `detail_jadwal` (
  `Kd_jadwal` varchar(5) NOT NULL,
  `Kd_mapel` varchar(5) NOT NULL,
  `Hari` varchar(15) NOT NULL,
  `Jam` varchar(20) NOT NULL,
  `Kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jadwal`
--

INSERT INTO `detail_jadwal` (`Kd_jadwal`, `Kd_mapel`, `Hari`, `Jam`, `Kelas`) VALUES
('J-001', 'M-019', 'Sabtu', '12.30-14.00', 'XII A'),
('J-002', 'M-018', 'Senin', '08.00-10.00', 'XII A'),
('J-002', 'M-018', 'Selasa', '08.00-09.30', 'XII B'),
('J-002', 'M-018', 'Rabu', '10.30-12.00', 'XII A'),
('J-002', 'M-018', 'Kamis', '12.30-14.00', 'XII C'),
('J-002', 'M-018', 'Jumat', '10.30-12.00', 'XII B'),
('J-002', 'M-018', 'Sabtu', '08.00-10.00', 'XII C');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kelas`
--

CREATE TABLE `detail_kelas` (
  `Id_jadwal` varchar(20) NOT NULL,
  `Kd_mapel` varchar(5) NOT NULL,
  `Kd_guru` varchar(5) NOT NULL,
  `Hari` varchar(15) NOT NULL,
  `Jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kelas`
--

INSERT INTO `detail_kelas` (`Id_jadwal`, `Kd_mapel`, `Kd_guru`, `Hari`, `Jam`) VALUES
('001', 'M-019', 'K-006', 'Selasa', '08.00-10.00'),
('002', 'M-018', 'K-004', 'Senin', '08.00-10.00'),
('002', 'M-014', 'K-006', 'Senin', '10.30-12.00');

-- --------------------------------------------------------

--
-- Table structure for table `ekstra_2511500057`
--

CREATE TABLE `ekstra_2511500057` (
  `id_ekstra057` varchar(5) NOT NULL,
  `nama_ekstra057` varchar(50) NOT NULL,
  `ket057` varchar(20) NOT NULL,
  `semester057` int(5) NOT NULL,
  `thn_ajaran057` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra_2511500057`
--

INSERT INTO `ekstra_2511500057` (`id_ekstra057`, `nama_ekstra057`, `ket057`, `semester057`, `thn_ajaran057`) VALUES
('E-002', 'basket', 'Hadir', 2, 2025);

-- --------------------------------------------------------

--
-- Table structure for table `ekstra_2511500061`
--

CREATE TABLE `ekstra_2511500061` (
  `id_ekstra061` varchar(5) NOT NULL,
  `nama_ekstra061` varchar(50) NOT NULL,
  `ket061` varchar(20) NOT NULL,
  `semester061` int(5) NOT NULL,
  `thn_ajaran061` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra_2511500061`
--

INSERT INTO `ekstra_2511500061` (`id_ekstra061`, `nama_ekstra061`, `ket061`, `semester061`, `thn_ajaran061`) VALUES
('E-001', 'karate', 'hadir', 3, 2026);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `Kd_guru` varchar(5) NOT NULL,
  `Nm_guru` varchar(50) NOT NULL,
  `Jenkel` varchar(10) NOT NULL,
  `Pend_terakhir` varchar(20) NOT NULL,
  `Hp` varchar(13) NOT NULL,
  `Alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`Kd_guru`, `Nm_guru`, `Jenkel`, `Pend_terakhir`, `Hp`, `Alamat`) VALUES
('K-002', 'Sinta', 'fmsofao', 'S1', '087457523954', 'Selindung'),
('K-003', 'eko', 'fmsofao', 'S3', '0004503495034', 'Gabek keren'),
('K-004', 'Budi', 'fklfsdlf', 'S1', '0800323449443', 'Sungailiat'),
('K-005', 'eko', 'bfjhfbajd', 'S1', '0438348545', 'mentok'),
('K-006', 'loren', 'dsslffk', 'S2', '5834545853405', 'apapun'),
('K-007', 'Marcel', 'fmsofao', 'S1', '5834545853405', 'Gabek keren');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `Kd_jadwal` varchar(5) NOT NULL,
  `Kd_guru` varchar(5) NOT NULL,
  `Semester` enum('Ganjil','Genap') NOT NULL,
  `Tahun_ajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`Kd_jadwal`, `Kd_guru`, `Semester`, `Tahun_ajaran`) VALUES
('J-001', 'K-002', 'Ganjil', '2024-2025'),
('J-002', 'K-004', 'Ganjil', '2025-2026');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kelas`
--

CREATE TABLE `jadwal_kelas` (
  `Id_jadwal` varchar(20) NOT NULL,
  `Id_kelas` int(11) NOT NULL,
  `Thn_ajaran` varchar(20) NOT NULL,
  `Semester` enum('Ganjil','Genap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_kelas`
--

INSERT INTO `jadwal_kelas` (`Id_jadwal`, `Id_kelas`, `Thn_ajaran`, `Semester`) VALUES
('001', 126, '2025-2026', 'Ganjil'),
('002', 126, '2025-2026', 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `Id_kelas` int(11) NOT NULL,
  `Nm_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`Id_kelas`, `Nm_kelas`) VALUES
(126, 'XII A'),
(127, 'XII B'),
(128, 'XII C');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `Kd_mapel` varchar(5) NOT NULL,
  `Nm_mapel` varchar(35) NOT NULL,
  `Kkm` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`Kd_mapel`, `Nm_mapel`, `Kkm`) VALUES
('M-014', 'Bahasa Inggris', 75),
('M-015', 'Bahasa Indonesia', 75),
('M-016', 'PJOK', 75),
('M-017', 'Agama', 80),
('M-018', 'MATEMATIKA', 65),
('M-019', 'PPKN', 70);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `Nis` varchar(10) NOT NULL,
  `Nm_siswa` varchar(50) NOT NULL,
  `Jenkel` varchar(10) NOT NULL,
  `Hp` varchar(13) NOT NULL,
  `Id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`Nis`, `Nm_siswa`, `Jenkel`, `Hp`, `Id_kelas`) VALUES
('S-001', 'Rizki', 'XII', '087457523954', 128);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','guru','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'Dephiah Wahyuningsih', '1234', 'admin'),
(2, 'azka', '12345', 'guru'),
(3, 'Marcel', '1234', 'siswa'),
(4, 'Budi', '12345', 'guru'),
(5, 'eko', '12345', 'guru'),
(6, 'loren', '12345', 'guru'),
(7, '25177343843', '12345', 'guru'),
(9, '2511500061', '1234', 'admin'),
(11, 'eko', '1234', 'guru'),
(12, '2511500057', '1234', 'admin'),
(13, 'Rizki', '1234', 'siswa'),
(14, 'Sinta', '1234', 'guru'),
(15, 'ces', '1234', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indexes for table `ekstra_2511500057`
--
ALTER TABLE `ekstra_2511500057`
  ADD PRIMARY KEY (`id_ekstra057`);

--
-- Indexes for table `ekstra_2511500061`
--
ALTER TABLE `ekstra_2511500061`
  ADD PRIMARY KEY (`id_ekstra061`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`Kd_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`Kd_jadwal`);

--
-- Indexes for table `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  ADD PRIMARY KEY (`Id_jadwal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`Id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`Kd_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`Nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
