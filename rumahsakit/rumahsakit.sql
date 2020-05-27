-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2019 at 05:40 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `IDdokter` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(13) NOT NULL,
  `email` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`IDdokter`, `nama`, `alamat`, `hp`, `email`, `foto`) VALUES
(1, 'Elmira akmala', 'Jl. melati 5 , jakarta barat', '081299002340', 'elmira@gmail.com', NULL),
(2, 'Hana', 'Jl. mawar 3 no 04', '083456789021', 'hana@gmail.com', NULL),
(3, 'Rey', 'Jl. white 4 no 08', '081963542314', 'rey@gmail.com', NULL),
(4, 'zakia', 'alamay', '0871896543221', 'indy@gmail.com', 'elmira.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `IDpasien` int(11) NOT NULL,
  `namapasien` varchar(45) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `umur` float NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(13) NOT NULL,
  `wali` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`IDpasien`, `namapasien`, `gender`, `umur`, `alamat`, `hp`, `wali`, `foto`) VALUES
(1, 'Alamsyah', 'L', 70, 'jl. anggrek 10 , cikarang', '085678903688', 'Reynaldi', 'elmira.jpg'),
(3, 'Uzumaki Naruto', 'L', 17, 'Konohagakure', '081475963240', 'Namikaze Minato', 'elmira.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `IDdokter` int(11) NOT NULL,
  `IDpasien` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` text NOT NULL,
  `keputusan` enum('Rawat Inap','Rawat Jalan') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`id`, `tanggal`, `IDdokter`, `IDpasien`, `keluhan`, `diagnosa`, `keputusan`, `keterangan`) VALUES
(1, '2019-12-06 22:50:50', 3, 3, 'sakit kepala,pilek,batuk,badan panas.', 'Influenza', 'Rawat Jalan', 'tidak ada'),
(2, '2019-12-10 01:10:34', 2, 1, 'Demam Tinggi,Sakit kepala,batuk,ruam,diare.', 'Demam tifoid', 'Rawat Inap', 'harus d rawat selama 2 hari');

-- --------------------------------------------------------

--
-- Table structure for table `rawat`
--

CREATE TABLE `rawat` (
  `IDrawat` int(11) NOT NULL,
  `IDpasien` int(11) NOT NULL,
  `IDpemeriksaan` int(11) DEFAULT NULL,
  `namagedung` varchar(45) NOT NULL,
  `namaruangan` varchar(45) NOT NULL,
  `nokamar` int(11) NOT NULL,
  `telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rawat`
--

INSERT INTO `rawat` (`IDrawat`, `IDpasien`, `IDpemeriksaan`, `namagedung`, `namaruangan`, `nokamar`, `telp`) VALUES
(1, 1, 2, 'A', 'melati', 10, '012345678');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` enum('admin','dokter','pasien') NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `email`, `role`, `foto`) VALUES
(1, 'Elmira', 'elmira', '451aa2bd825c6a943911ba79ac24b82235bb33ea', 'elmira@gmail.com', 'dokter', 'elmira.jpg'),
(2, 'Ariani Susanti', 'santi', '8cb2237d0679ca88db6464eac60da96345513964', 'santi@gmail.com', '', 'woman.png'),
(3, 'Camila', 'camila', 'c5c8066d458ef32d2d9d6c641cd90b1f5259ebed', 'camila@gmail.com', '', 'girl.png'),
(4, 'Niall Horan', 'niall', '1e7ddefa1d9538022c310319373a9b59efc294d3', 'niall@gmail.com', 'pasien', 'man.png'),
(6, 'lyla', 'lyla', '85b3e4f292c8f323da255aa1e8dae9f950600064', 'lyla@gmail.cm', 'admin', 'elmira.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`IDdokter`),
  ADD UNIQUE KEY `hp_UNIQUE` (`hp`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`IDpasien`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dokter_has_pasien_dokter1` (`IDdokter`),
  ADD KEY `fk_dokter_has_pasien_pasien1` (`IDpasien`);

--
-- Indexes for table `rawat`
--
ALTER TABLE `rawat`
  ADD PRIMARY KEY (`IDrawat`),
  ADD KEY `fk_ruangan_pemeriksaan1` (`IDpemeriksaan`),
  ADD KEY `pasien` (`IDpasien`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `IDdokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `IDpasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rawat`
--
ALTER TABLE `rawat`
  MODIFY `IDrawat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD CONSTRAINT `fk_dokter_has_pasien_dokter1` FOREIGN KEY (`IDdokter`) REFERENCES `dokter` (`IDdokter`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dokter_has_pasien_pasien1` FOREIGN KEY (`IDpasien`) REFERENCES `pasien` (`IDpasien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rawat`
--
ALTER TABLE `rawat`
  ADD CONSTRAINT `fk_ruangan_pemeriksaan1` FOREIGN KEY (`IDpemeriksaan`) REFERENCES `pemeriksaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pasien` FOREIGN KEY (`IDpasien`) REFERENCES `pasien` (`IDpasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
