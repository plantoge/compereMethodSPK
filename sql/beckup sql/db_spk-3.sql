-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 07:32 PM
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
('F1', 'Rata-rata Nilai', 'C', 0.2),
('F2', 'Nilai Sikap', 'C', 0.3),
('F3', 'Absensi', 'B', 0.15),
('F4', 'Penghasilan Orang Tua', 'C', 0.1),
('F5', 'Jumlah Kasus', 'B', 0.25);

-- --------------------------------------------------------

--
-- Table structure for table `f2_evaluasi`
--

CREATE TABLE `f2_evaluasi` (
  `nisn` varchar(9) NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f2_evaluasi`
--

INSERT INTO `f2_evaluasi` (`nisn`, `nama_siswa`) VALUES
('140751', 'fauzi'),
('140752', 'Cici'),
('140753', 'Deni'),
('140754', 'Surya');

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
(1, '140751', 'F1', 7.7, 1.54),
(2, '140751', 'F2', 2, 0.6),
(3, '140751', 'F3', 11, 1.65),
(4, '140751', 'F4', 1, 0.1),
(5, '140751', 'F5', 1, 0.25);

-- --------------------------------------------------------

--
-- Table structure for table `f4_rank_saw`
--

CREATE TABLE `f4_rank_saw` (
  `id_hsaw` int(11) NOT NULL,
  `nisn` varchar(9) NOT NULL,
  `inisial` varchar(2) NOT NULL,
  `nilai_rank` float DEFAULT NULL,
  `normalisasi` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f4_rank_saw`
--

INSERT INTO `f4_rank_saw` (`id_hsaw`, `nisn`, `inisial`, `nilai_rank`, `normalisasi`) VALUES
(1, '140751', 'F1', 7.7, 0.12987),
(2, '140751', 'F2', 2, 0.5),
(3, '140751', 'F3', 11, 1),
(4, '140751', 'F4', 1, 1),
(5, '140751', 'F5', 1, 0.0909091);

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
(2, 'tio', '$2y$10$FHJI1uZ7MJyMsYRNUAZCm.9s15Ftrtz0vHQCuwHYiPC1p5NnYD9te', 'guru'),
(3, 'gege', '$2y$10$fdJq8wVxd4yRRUISNU4Fvu.SOfZ1FMpKdUMqVei/g8iTCnvHP..g6', 'guru');

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
  MODIFY `id_hmfep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `f4_rank_saw`
--
ALTER TABLE `f4_rank_saw`
  MODIFY `id_hsaw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
