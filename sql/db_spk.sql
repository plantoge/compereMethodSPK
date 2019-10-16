-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2018 at 07:09 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `f1_kfaktor`
--

CREATE TABLE `f1_kfaktor` (
  `inisial` varchar(2) NOT NULL,
  `nama_kfaktor` varchar(50) DEFAULT NULL,
  `atribut_kfaktor` enum('C','B') DEFAULT NULL,
  `nbf` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f1_kfaktor`
--

INSERT INTO `f1_kfaktor` (`inisial`, `nama_kfaktor`, `atribut_kfaktor`, `nbf`) VALUES
('F1', 'Rata-rata nilai', 'C', 0.2),
('F2', 'Nilai Sikap', 'C', 0.3),
('F3', 'Absensi', 'B', 0.15),
('F4', 'Penghasilan Orang Tua', 'C', 0.1),
('F5', 'jumlah kasus', 'B', 0.25);

-- --------------------------------------------------------

--
-- Table structure for table `f2_evaluasi`
--

CREATE TABLE `f2_evaluasi` (
  `nisn` varchar(9) NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `hasil_mfep` float NOT NULL,
  `hasil_saw` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f2_evaluasi`
--

INSERT INTO `f2_evaluasi` (`nisn`, `nama_siswa`, `hasil_mfep`, `hasil_saw`) VALUES
('1612827', 'Ahmad Fajar Afif', 3.11, 0.51),
('1612829', 'Anisah Putri Dasli', 2.88, 0.3),
('1612832', 'Danil Pratama', 7.23, 0.83),
('1612842', 'M. Fikri', 2.33, 0.49),
('1612847', 'Rama Yudi', 4.89, 0.72),
('1612854', 'Surya Hakiki', 2.37, 0.51),
('1612856', 'Thio Harjum', 2.3, 0.67),
('1612857', 'Tio Calimado', 5.65, 0.73);

-- --------------------------------------------------------

--
-- Table structure for table `f3_rank_mfep`
--

CREATE TABLE `f3_rank_mfep` (
  `id_hmfep` int(11) NOT NULL,
  `nisn` varchar(9) NOT NULL,
  `inisial` varchar(2) NOT NULL,
  `nilai_rank` float DEFAULT NULL,
  `nbe` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f3_rank_mfep`
--

INSERT INTO `f3_rank_mfep` (`id_hmfep`, `nisn`, `inisial`, `nilai_rank`, `nbe`) VALUES
(1, '1612847', 'F1', 7.7, 1.54),
(2, '1612847', 'F2', 2, 0.6),
(3, '1612847', 'F3', 11, 1.65),
(4, '1612847', 'F4', 1, 0.1),
(5, '1612847', 'F5', 4, 1),
(6, '1612842', 'F1', 7.4, 1.48),
(7, '1612842', 'F2', 2, 0.6),
(8, '1612842', 'F3', 1, 0.15),
(9, '1612842', 'F4', 1, 0.1),
(10, '1612842', 'F5', 0, 0),
(11, '1612857', 'F1', 7.5, 1.5),
(12, '1612857', 'F2', 2, 0.6),
(13, '1612857', 'F3', 14, 2.1),
(14, '1612857', 'F4', 2, 0.2),
(15, '1612857', 'F5', 5, 1.25),
(16, '1612832', 'F1', 7.4, 1.48),
(17, '1612832', 'F2', 2, 0.6),
(18, '1612832', 'F3', 23, 3.45),
(19, '1612832', 'F4', 2, 0.2),
(20, '1612832', 'F5', 6, 1.5),
(21, '1612854', 'F1', 4.6, 0.92),
(22, '1612854', 'F2', 2, 0.6),
(23, '1612854', 'F3', 2, 0.3),
(24, '1612854', 'F4', 3, 0.3),
(25, '1612854', 'F5', 1, 0.25),
(26, '1612827', 'F1', 4.3, 0.86),
(27, '1612827', 'F2', 3, 0.9),
(28, '1612827', 'F3', 2, 0.3),
(29, '1612827', 'F4', 3, 0.3),
(30, '1612827', 'F5', 3, 0.75),
(31, '1612856', 'F1', 3, 0.6),
(32, '1612856', 'F2', 2, 0.6),
(33, '1612856', 'F3', 5, 0.75),
(34, '1612856', 'F4', 1, 0.1),
(35, '1612856', 'F5', 1, 0.25),
(36, '1612829', 'F1', 8.4, 1.68),
(37, '1612829', 'F2', 3, 0.9),
(38, '1612829', 'F3', 0, 0),
(39, '1612829', 'F4', 3, 0.3),
(40, '1612829', 'F5', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `f4_rank_saw`
--

CREATE TABLE `f4_rank_saw` (
  `id_hsaw` int(11) NOT NULL,
  `nisn` varchar(9) NOT NULL,
  `inisial` varchar(2) NOT NULL,
  `nilai_rank` float DEFAULT NULL,
  `normalisasi` float DEFAULT NULL,
  `bbt_nor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f4_rank_saw`
--

INSERT INTO `f4_rank_saw` (`id_hsaw`, `nisn`, `inisial`, `nilai_rank`, `normalisasi`, `bbt_nor`) VALUES
(1, '1612847', 'F1', 7.7, 0.39, 0.08),
(2, '1612847', 'F2', 2, 1, 0.3),
(3, '1612847', 'F3', 11, 0.48, 0.07),
(4, '1612847', 'F4', 1, 1, 0.1),
(5, '1612847', 'F5', 4, 0.67, 0.17),
(6, '1612842', 'F1', 7.4, 0.41, 0.08),
(7, '1612842', 'F2', 2, 1, 0.3),
(8, '1612842', 'F3', 1, 0.04, 0.01),
(9, '1612842', 'F4', 1, 1, 0.1),
(10, '1612842', 'F5', 0, 0, 0),
(11, '1612857', 'F1', 7.5, 0.4, 0.08),
(12, '1612857', 'F2', 2, 1, 0.3),
(13, '1612857', 'F3', 14, 0.61, 0.09),
(14, '1612857', 'F4', 2, 0.5, 0.05),
(15, '1612857', 'F5', 5, 0.83, 0.21),
(16, '1612832', 'F1', 7.4, 0.41, 0.08),
(17, '1612832', 'F2', 2, 1, 0.3),
(18, '1612832', 'F3', 23, 1, 0.15),
(19, '1612832', 'F4', 2, 0.5, 0.05),
(20, '1612832', 'F5', 6, 1, 0.25),
(21, '1612854', 'F1', 4.6, 0.65, 0.13),
(22, '1612854', 'F2', 2, 1, 0.3),
(23, '1612854', 'F3', 2, 0.09, 0.01),
(24, '1612854', 'F4', 3, 0.33, 0.03),
(25, '1612854', 'F5', 1, 0.17, 0.04),
(26, '1612827', 'F1', 4.3, 0.7, 0.14),
(27, '1612827', 'F2', 3, 0.67, 0.2),
(28, '1612827', 'F3', 2, 0.09, 0.01),
(29, '1612827', 'F4', 3, 0.33, 0.03),
(30, '1612827', 'F5', 3, 0.5, 0.13),
(31, '1612856', 'F1', 3, 1, 0.2),
(32, '1612856', 'F2', 2, 1, 0.3),
(33, '1612856', 'F3', 5, 0.22, 0.03),
(34, '1612856', 'F4', 1, 1, 0.1),
(35, '1612856', 'F5', 1, 0.17, 0.04),
(36, '1612829', 'F1', 8.4, 0.36, 0.07),
(37, '1612829', 'F2', 3, 0.67, 0.2),
(38, '1612829', 'F3', 0, 0, 0),
(39, '1612829', 'F4', 3, 0.33, 0.03),
(40, '1612829', 'F5', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `level` enum('guru','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'fauzi', '$2y$10$z6bRVe.YBl1btI.QPbhugOHSzpkrpWsz0ul90ycwYZizPr.9mABUq', 'admin'),
(3, 'rifda', '$2y$10$ep.5JfOkw1u7QOP0E83Gb.b2cWNRxOmm9MlTZJ6VXWc3ffHbuod8a', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `f1_kfaktor`
--
ALTER TABLE `f1_kfaktor`
  ADD PRIMARY KEY (`inisial`);

--
-- Indexes for table `f2_evaluasi`
--
ALTER TABLE `f2_evaluasi`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `f3_rank_mfep`
--
ALTER TABLE `f3_rank_mfep`
  ADD PRIMARY KEY (`id_hmfep`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `inisial` (`inisial`);

--
-- Indexes for table `f4_rank_saw`
--
ALTER TABLE `f4_rank_saw`
  ADD PRIMARY KEY (`id_hsaw`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `inisial` (`inisial`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `f3_rank_mfep`
--
ALTER TABLE `f3_rank_mfep`
  MODIFY `id_hmfep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `f4_rank_saw`
--
ALTER TABLE `f4_rank_saw`
  MODIFY `id_hsaw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `f3_rank_mfep`
--
ALTER TABLE `f3_rank_mfep`
  ADD CONSTRAINT `f3_rank_mfep_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `f2_evaluasi` (`nisn`),
  ADD CONSTRAINT `f3_rank_mfep_ibfk_2` FOREIGN KEY (`inisial`) REFERENCES `f1_kfaktor` (`inisial`);

--
-- Constraints for table `f4_rank_saw`
--
ALTER TABLE `f4_rank_saw`
  ADD CONSTRAINT `f4_rank_saw_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `f2_evaluasi` (`nisn`),
  ADD CONSTRAINT `f4_rank_saw_ibfk_2` FOREIGN KEY (`inisial`) REFERENCES `f1_kfaktor` (`inisial`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
