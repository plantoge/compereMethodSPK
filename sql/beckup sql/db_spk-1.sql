-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 06:44 AM
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
-- Table structure for table `f1_faktor`
--

CREATE TABLE `f1_faktor` (
  `id_faktor` int(11) NOT NULL,
  `nama_faktor` varchar(50) DEFAULT NULL,
  `inisial` varchar(2) NOT NULL,
  `jenis_faktor` enum('cost','benefit') NOT NULL,
  `nbf` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f1_faktor`
--

INSERT INTO `f1_faktor` (`id_faktor`, `nama_faktor`, `inisial`, `jenis_faktor`, `nbf`) VALUES
(1, 'Rata-rata nilai', 'F1', 'cost', 0.2),
(2, 'Nilai sikap', 'F2', 'cost', 0.3),
(3, 'Absensi', 'F3', 'benefit', 0.15),
(4, 'Penghasilan Orang Tua', 'F4', 'cost', 0.1),
(5, 'Jumlah Kasus', 'F5', 'benefit', 0.25);

-- --------------------------------------------------------

--
-- Table structure for table `f2_evaluasi`
--

CREATE TABLE `f2_evaluasi` (
  `nisn` varchar(9) NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `nilai_f1` float DEFAULT NULL,
  `nilai_f2` float DEFAULT NULL,
  `nilai_f3` float DEFAULT NULL,
  `nilai_f4` float DEFAULT NULL,
  `nilai_f5` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f2_evaluasi`
--

INSERT INTO `f2_evaluasi` (`nisn`, `nama_siswa`, `nilai_f1`, `nilai_f2`, `nilai_f3`, `nilai_f4`, `nilai_f5`) VALUES
('1', '1', 1, 1, 1, 1, 1),
('2', '2', 2, 2, 2, 2, 2),
('3', '3', 3, 3, 3, 3, 3);

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
(1, 'fauzi', '$2y$10$hr9.4IPB89QhgrHXCgjO/eyBB7soPIgNeqxEh6CRc3zDQUsCSeGze', 'admin'),
(2, 'tio', '$2y$10$FHJI1uZ7MJyMsYRNUAZCm.9s15Ftrtz0vHQCuwHYiPC1p5NnYD9te', 'guru'),
(3, 'gege', '$2y$10$fdJq8wVxd4yRRUISNU4Fvu.SOfZ1FMpKdUMqVei/g8iTCnvHP..g6', 'guru'),
(6, 'ripal', '$2y$10$OzGTg9vG.1zwZrSKe6Ks2.N12KVHbEJEIYkfWgVYX2/3gFqgLMihm', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `f1_faktor`
--
ALTER TABLE `f1_faktor`
  ADD PRIMARY KEY (`id_faktor`);

--
-- Indexes for table `f2_evaluasi`
--
ALTER TABLE `f2_evaluasi`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `f1_faktor`
--
ALTER TABLE `f1_faktor`
  MODIFY `id_faktor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
