-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 11:34 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `buku_available`
-- (See below for the actual view)
--
CREATE TABLE `buku_available` (
`id_buku` char(6)
,`judul_buku` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rekap_belum_kembali`
-- (See below for the actual view)
--
CREATE TABLE `rekap_belum_kembali` (
`id_pinjam` int(10) unsigned
,`id_buku` char(6)
,`id_member` char(11)
,`tgl_pinjam` datetime
,`tgl_batas` date
,`tgl_kembali` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` char(6) NOT NULL,
  `judul_buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`) VALUES
('AL-000', 'ALGORITMA PEMROGRAMAN DASAR'),
('AL-001', 'ALGORITMA PEMROGRAMAN DASAR'),
('AR-000', 'ARTIFICIAL INTELLEGENCE 1'),
('EL-002', 'ELEKTROMAGNET'),
('EL-001', 'ELEKTRONIKA DIGITAL'),
('EL-000', 'ELEKTRONIKA MEDIKA'),
('KO-001', 'KONTROL CERDAS 2'),
('KO-000', 'KONTROL CERDAS I'),
('MA-000', 'MATEMATIKA DASAR'),
('ME-000', 'METODE NUMERIK'),
('PI-000', 'PIRANTI ELEKTRONIKA'),
('RA-000', 'RANGKAIAN ELEKTRONIKA'),
('RO-000', 'ROBOTIKA'),
('VI-000', 'VIRTUAL ODOMETRY'),
('WA-000', 'WAWASAN KEBANGSAAN: PANCASILA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` char(11) NOT NULL,
  `nama_member` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama_member`) VALUES
('2007011100', 'AULYA HIKMAH ANUGRAHENI'),
('1999031700', 'DIKA ADNACREBHUSM'),
('1999081700', 'KELVIN GNOLIZORP'),
('2007070700', 'LAILA ZAHRA'),
('2007011101', 'NAYLA HIKMAH'),
('1999052101', 'RICKY VINCENT'),
('1999052100', 'SAMMY NUBASECNAL'),
('1995072500', 'YUDI ALEGNAORP');

-- --------------------------------------------------------

--
-- Table structure for table `trans_pinjam`
--

CREATE TABLE `trans_pinjam` (
  `id_pinjam` int(10) UNSIGNED NOT NULL,
  `tgl_pinjam` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_batas` date NOT NULL,
  `id_member` char(11) NOT NULL,
  `id_buku` char(6) NOT NULL,
  `tgl_kembali` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_pinjam`
--

INSERT INTO `trans_pinjam` (`id_pinjam`, `tgl_pinjam`, `tgl_batas`, `id_member`, `id_buku`, `tgl_kembali`) VALUES
(12, '2021-05-28 00:00:00', '2021-06-03', '2007011100', 'AL-000', '2021-05-28 03:53:24'),
(13, '2021-05-28 00:00:00', '2021-06-04', '2007011100', 'AR-000', '2021-05-28 03:53:49'),
(14, '2021-05-28 00:00:00', '2021-06-04', '2007011100', 'EL-002', NULL),
(15, '2021-05-28 00:00:00', '2021-06-05', '1999031700', 'AL-001', NULL),
(16, '2021-05-28 00:00:00', '2021-06-04', '1999031700', 'PI-000', NULL),
(17, '2021-05-28 00:00:00', '2021-06-04', '1999052101', 'RO-000', NULL),
(18, '2021-05-28 00:00:00', '2021-06-04', '1999031700', 'EL-001', NULL),
(19, '2021-05-28 19:57:59', '2021-06-04', '1999081700', 'EL-000', NULL);

-- --------------------------------------------------------

--
-- Structure for view `buku_available`
--
DROP TABLE IF EXISTS `buku_available`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `buku_available`  AS SELECT `b`.`id_buku` AS `id_buku`, `b`.`judul_buku` AS `judul_buku` FROM (`tb_buku` `b` left join `rekap_belum_kembali` `rbk` on(`rbk`.`id_buku` = `b`.`id_buku`)) WHERE `rbk`.`id_pinjam` is null ORDER BY `b`.`id_buku` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `rekap_belum_kembali`
--
DROP TABLE IF EXISTS `rekap_belum_kembali`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rekap_belum_kembali`  AS SELECT `tp`.`id_pinjam` AS `id_pinjam`, `tp`.`id_buku` AS `id_buku`, `tp`.`id_member` AS `id_member`, `tp`.`tgl_pinjam` AS `tgl_pinjam`, `tp`.`tgl_batas` AS `tgl_batas`, `tp`.`tgl_kembali` AS `tgl_kembali` FROM ((`trans_pinjam` `tp` join `tb_member` `m`) join `tb_buku` `b`) WHERE `tp`.`id_member` = `m`.`id_member` AND `tp`.`id_buku` = `b`.`id_buku` AND `tp`.`tgl_kembali` is null ORDER BY `tp`.`tgl_pinjam` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `judul_buku` (`judul_buku`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `nama_member` (`nama_member`);

--
-- Indexes for table `trans_pinjam`
--
ALTER TABLE `trans_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `tgl_pinjam` (`tgl_batas`,`id_member`,`id_buku`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `tgl_kembali` (`tgl_kembali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_pinjam`
--
ALTER TABLE `trans_pinjam`
  MODIFY `id_pinjam` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trans_pinjam`
--
ALTER TABLE `trans_pinjam`
  ADD CONSTRAINT `trans_pinjam_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trans_pinjam_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
