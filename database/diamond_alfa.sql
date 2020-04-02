-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 05:18 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diamond_alfa`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `ktp` text NOT NULL,
  `kk` text NOT NULL,
  `npwp` text NOT NULL,
  `ket_nikah` text NOT NULL,
  `rek_koran` text NOT NULL,
  `ket_lurah` text NOT NULL,
  `pas_foto` text NOT NULL,
  `slip_gaji` text NOT NULL,
  `spt` text NOT NULL,
  `ket_usaha` text NOT NULL,
  `ket_penghasilan` text NOT NULL,
  `situ_siup` text NOT NULL,
  `sk_terakhir` text NOT NULL,
  `surat_kerja_swasta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id`, `id_pelanggan`, `ktp`, `kk`, `npwp`, `ket_nikah`, `rek_koran`, `ket_lurah`, `pas_foto`, `slip_gaji`, `spt`, `ket_usaha`, `ket_penghasilan`, `situ_siup`, `sk_terakhir`, `surat_kerja_swasta`) VALUES
(1, 1, 'assets/upload/berkas_pelanggan/4MVCPDFS_ktp_Screenshot_(8).png', 'assets/upload/berkas_pelanggan/4MVCPDFS_kk_TORONIPA_KE_TAIPA.png', 'assets/upload/berkas_pelanggan/4MVCPDFS_npwp_Screenshot_(12).png', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `interior`
--

CREATE TABLE `interior` (
  `id` int(11) NOT NULL,
  `id_projek` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `jenis_layanan` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `jenis_layanan`, `keterangan`, `foto`) VALUES
(4, 'Perusahaan', 'sada', ''),
(5, 'Swalayan', 'Swalayan menjual aneka ragam bahan sembako', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `referral` varchar(20) NOT NULL,
  `kode_booking` varchar(20) NOT NULL,
  `id_rumah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_berkas` int(11) NOT NULL DEFAULT '0',
  `batas_waktu` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `referral`, `kode_booking`, `id_rumah`, `nama`, `no_hp`, `email`, `pekerjaan`, `status_berkas`, `batas_waktu`, `created_at`) VALUES
(7, '2KZ8RV4', 'A297', 4, 'Raden Abdul Rahman', '082311253860', 'rahman@gmail.com', 'swasta', 5, '0000-00-00', '2020-03-25 16:42:28'),
(8, '2KZ8RV4', '9B8Y', 2, 'Alya', '082311237888', 'aa@gmail.com', 'pns', 1, '0000-00-00', '2020-03-28 06:13:14'),
(9, '2KZ8RV4', 'HD54', 57, 'teswd', '234324324', 'srse@fsdfds', 'swasta', 5, '0000-00-00', '2020-04-02 02:22:31'),
(10, 'B6YRQP7', 'RDVY', 6, 'testrstd', '980997897897', 'fgfh@fgdgf', 'swasta', 5, '0000-00-00', '2020-03-28 01:59:10'),
(11, '2KZ8RV4', 'HVOP', 2, 'Rafi', '80989009', 'asdas@fas', 'Wiraswasta', 1, '2020-03-16', '2020-03-28 10:01:09'),
(12, '2KZ8RV4', '4U2P', 3, 'sadas', '53432432', 'asdas@dsad', 'Wiraswasta', 1, '2020-03-29', '2020-03-28 10:12:04'),
(13, '2KZ8RV4', '29L4', 3, 'fikri', '9809890809', 'firkri@gmail', 'pns', 1, '2020-04-06', '2020-03-30 07:47:48'),
(14, '2KZ8RV4', 'Z5Q1', 1, 'sada', '324234', 'sadas@dsad', 'pns', 1, '2020-04-09', '2020-04-02 02:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id` int(11) NOT NULL,
  `item` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persyaratan`
--

INSERT INTO `persyaratan` (`id`, `item`) VALUES
(1, 'Scan KTP'),
(2, 'Buku Rekening Terakhir');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nama_pt` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama_pt`, `alamat`, `deskripsi`, `kontak`, `foto`) VALUES
(7, 'PT. Diamond Alfa', 'Jln. kljaslkd', 'jashjkda\r\nasdasldk\r\nasdasd', '(0401) 980', 'assets/upload/1584801955_IMG-20200108-WA0011jpg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `projek`
--

CREATE TABLE `projek` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `video` text NOT NULL,
  `foto` text NOT NULL,
  `posting` tinyint(1) NOT NULL DEFAULT '0',
  `slug` text NOT NULL,
  `fee` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projek`
--

INSERT INTO `projek` (`id`, `id_user`, `lokasi`, `deskripsi`, `video`, `foto`, `posting`, `slug`, `fee`, `created_at`) VALUES
(4, 4, 'Kendari Anduonohu', '', 'assets/upload/video/1585578468_1575858008_video.mp4', 'assets/upload/siteplan/1582950241_site_gub_1_001.png', 0, 'kendari-anduonohu', 5000000, '2020-03-30 14:27:48'),
(9, 4, 'Nanga - Nanga', '', 'assets/upload/video/1585578984_1582629674_SOLVED_!!_Virtualbox_Failed_to_open_a_session_for_the_virtual_machine_video.MP4', 'assets/upload/siteplan/1585193190_explore.jpg', 0, 'nanga---nanga', 2000000, '2020-03-30 14:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `rumah`
--

CREATE TABLE `rumah` (
  `id` int(11) NOT NULL,
  `id_projek` int(11) NOT NULL,
  `no_rumah` varchar(20) NOT NULL,
  `status_rumah` int(5) NOT NULL DEFAULT '0',
  `klaim` double NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rumah`
--

INSERT INTO `rumah` (`id`, `id_projek`, `no_rumah`, `status_rumah`, `klaim`, `created_at`) VALUES
(1, 4, '1', 1, 0, '2020-04-02 02:26:42'),
(2, 4, '2', 1, 0, '2020-03-28 06:13:14'),
(3, 4, '3', 1, 0, '2020-03-28 10:12:05'),
(4, 4, '4', 3, 0, '2020-03-28 09:57:50'),
(5, 4, '5', 0, 0, '2020-03-21 12:58:47'),
(6, 4, '6', 3, 1, '2020-03-28 09:51:31'),
(7, 4, '7', 0, 0, '2020-03-21 12:58:47'),
(8, 4, '8', 0, 0, '2020-03-21 12:58:47'),
(9, 4, '9', 0, 0, '2020-03-21 12:58:48'),
(10, 4, '10', 0, 0, '2020-03-21 12:58:48'),
(21, 4, '11', 0, 0, '2020-03-21 13:01:30'),
(22, 4, '12', 0, 0, '2020-03-21 13:01:30'),
(23, 4, '13', 0, 0, '2020-03-21 13:01:30'),
(24, 4, '14', 0, 0, '2020-03-21 13:01:30'),
(25, 4, '15', 0, 0, '2020-03-21 13:01:30'),
(26, 4, '16', 0, 0, '2020-03-21 13:01:30'),
(27, 4, '17', 0, 0, '2020-03-21 13:01:30'),
(28, 4, '18', 0, 0, '2020-03-21 13:01:30'),
(29, 4, '19', 0, 0, '2020-03-21 13:01:31'),
(30, 4, '20', 0, 0, '2020-03-21 13:01:31'),
(31, 9, '1', 0, 0, '2020-03-26 03:28:22'),
(32, 9, '2', 0, 0, '2020-03-26 03:28:22'),
(33, 9, '3', 0, 0, '2020-03-26 03:28:23'),
(34, 9, '4', 0, 0, '2020-03-26 03:28:23'),
(35, 9, '5', 0, 0, '2020-03-26 03:28:23'),
(36, 9, '6', 0, 0, '2020-03-26 03:28:23'),
(37, 9, '7', 0, 0, '2020-03-26 03:28:23'),
(38, 9, '8', 0, 0, '2020-03-26 03:28:23'),
(39, 9, '9', 0, 0, '2020-03-26 03:28:23'),
(40, 9, '10', 0, 0, '2020-03-26 03:28:23'),
(41, 9, '11', 0, 0, '2020-03-26 03:28:23'),
(42, 9, '12', 0, 0, '2020-03-26 03:28:23'),
(43, 9, '13', 0, 0, '2020-03-26 03:28:23'),
(44, 9, '14', 0, 0, '2020-03-26 03:28:24'),
(45, 9, '15', 0, 0, '2020-03-26 03:28:24'),
(46, 9, '16', 0, 0, '2020-03-26 03:28:24'),
(47, 9, '17', 0, 0, '2020-03-26 03:28:24'),
(48, 9, '18', 0, 0, '2020-03-26 03:28:24'),
(49, 9, '19', 0, 0, '2020-03-26 03:28:24'),
(50, 9, '20', 0, 0, '2020-03-26 03:28:24'),
(51, 9, '21', 0, 0, '2020-03-26 03:28:24'),
(52, 9, '22', 0, 0, '2020-03-26 03:28:24'),
(53, 9, '23', 0, 0, '2020-03-26 03:28:24'),
(54, 9, '24', 0, 0, '2020-03-26 03:28:24'),
(55, 9, '25', 0, 0, '2020-03-26 03:28:24'),
(56, 9, '26', 0, 0, '2020-03-26 03:28:24'),
(57, 9, '27', 3, 0, '2020-04-02 02:22:31'),
(58, 9, '28', 0, 0, '2020-03-26 03:28:24'),
(59, 9, '29', 0, 0, '2020-03-26 03:28:24'),
(60, 9, '30', 0, 0, '2020-03-26 03:28:24'),
(61, 9, '31', 0, 0, '2020-03-26 03:28:24'),
(62, 9, '32', 0, 0, '2020-03-26 03:28:24'),
(63, 9, '33', 0, 0, '2020-03-26 03:28:25'),
(64, 9, '34', 0, 0, '2020-03-26 03:28:25'),
(65, 9, '35', 0, 0, '2020-03-26 03:28:25'),
(66, 9, '36', 0, 0, '2020-03-26 03:28:25'),
(67, 9, '37', 0, 0, '2020-03-26 03:28:25'),
(68, 9, '38', 0, 0, '2020-03-26 03:28:25'),
(69, 9, '39', 0, 0, '2020-03-26 03:28:25'),
(70, 9, '40', 0, 0, '2020-03-26 03:28:25'),
(71, 9, '41', 0, 0, '2020-03-26 03:28:25'),
(72, 9, '42', 0, 0, '2020-03-26 03:28:25'),
(73, 9, '43', 0, 0, '2020-03-26 03:28:25'),
(74, 9, '44', 0, 0, '2020-03-26 03:28:25'),
(75, 9, '45', 0, 0, '2020-03-26 03:28:25'),
(76, 9, '46', 0, 0, '2020-03-26 03:28:25'),
(77, 9, '47', 0, 0, '2020-03-26 03:28:25'),
(78, 9, '48', 0, 0, '2020-03-26 03:28:25'),
(79, 9, '49', 0, 0, '2020-03-26 03:28:25'),
(80, 9, '50', 0, 0, '2020-03-26 03:28:25'),
(81, 9, '51', 0, 0, '2020-03-26 03:28:26'),
(82, 9, '52', 0, 0, '2020-03-26 03:28:26'),
(83, 9, '53', 0, 0, '2020-03-26 03:28:26'),
(84, 9, '54', 0, 0, '2020-03-26 03:28:26'),
(85, 9, '55', 0, 0, '2020-03-26 03:28:26'),
(86, 9, '56', 0, 0, '2020-03-26 03:28:26'),
(87, 9, '57', 0, 0, '2020-03-26 03:28:26'),
(88, 9, '58', 0, 0, '2020-03-26 03:28:26'),
(89, 9, '59', 0, 0, '2020-03-26 03:28:26'),
(90, 9, '60', 0, 0, '2020-03-26 03:28:26'),
(91, 9, '61', 0, 0, '2020-03-26 03:28:26'),
(92, 9, '62', 0, 0, '2020-03-26 03:28:26'),
(93, 9, '63', 0, 0, '2020-03-26 03:28:26'),
(94, 9, '64', 0, 0, '2020-03-26 03:28:26'),
(95, 9, '65', 0, 0, '2020-03-26 03:28:26'),
(96, 9, '66', 0, 0, '2020-03-26 03:28:26'),
(97, 9, '67', 0, 0, '2020-03-26 03:28:26'),
(98, 9, '68', 0, 0, '2020-03-26 03:28:26'),
(99, 9, '69', 0, 0, '2020-03-26 03:28:26'),
(100, 9, '70', 0, 0, '2020-03-26 03:28:26'),
(101, 9, '71', 0, 0, '2020-03-26 03:28:26'),
(102, 9, '72', 0, 0, '2020-03-26 03:28:26'),
(103, 9, '73', 0, 0, '2020-03-26 03:28:26'),
(104, 9, '74', 0, 0, '2020-03-26 03:28:26'),
(105, 9, '75', 0, 0, '2020-03-26 03:28:27'),
(106, 9, '76', 0, 0, '2020-03-26 03:28:27'),
(107, 9, '77', 0, 0, '2020-03-26 03:28:27'),
(108, 9, '78', 0, 0, '2020-03-26 03:28:27'),
(109, 9, '79', 0, 0, '2020-03-26 03:28:27'),
(110, 9, '80', 0, 0, '2020-03-26 03:28:27'),
(111, 9, '81', 0, 0, '2020-03-26 03:28:27'),
(112, 9, '82', 0, 0, '2020-03-26 03:28:27'),
(113, 9, '83', 0, 0, '2020-03-26 03:28:27'),
(114, 9, '84', 0, 0, '2020-03-26 03:28:27'),
(115, 9, '85', 0, 0, '2020-03-26 03:28:27'),
(116, 9, '86', 0, 0, '2020-03-26 03:28:27'),
(117, 9, '87', 0, 0, '2020-03-26 03:28:27'),
(118, 9, '88', 0, 0, '2020-03-26 03:28:27'),
(119, 9, '89', 0, 0, '2020-03-26 03:28:27'),
(120, 9, '90', 0, 0, '2020-03-26 03:28:27'),
(121, 9, '91', 0, 0, '2020-03-26 03:28:27'),
(122, 9, '92', 0, 0, '2020-03-26 03:28:27'),
(123, 9, '93', 0, 0, '2020-03-26 03:28:27'),
(124, 9, '94', 0, 0, '2020-03-26 03:28:27'),
(125, 9, '95', 0, 0, '2020-03-26 03:28:27'),
(126, 9, '96', 0, 0, '2020-03-26 03:28:27'),
(127, 9, '97', 0, 0, '2020-03-26 03:28:27'),
(128, 9, '98', 0, 0, '2020-03-26 03:28:28'),
(129, 9, '99', 0, 0, '2020-03-26 03:28:28'),
(130, 9, '100', 0, 0, '2020-03-26 03:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `judul`, `keterangan`, `foto`) VALUES
(1, 'Selamat Datang ok', 'Di Halaman Paling Komplit tentang Perumahan', 'assets/upload/1582795184_peta_sultra(1)jpg.jpg'),
(2, 'Telusuri Website Kami', 'Ketahuilah lebih bnyak tempat tinggal bersama Kami', 'assets/upload/1582796739_peta_sultra(2)jpg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `spektek`
--

CREATE TABLE `spektek` (
  `id` int(11) NOT NULL,
  `id_projek` int(11) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `bahan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spektek`
--

INSERT INTO `spektek` (`id`, `id_projek`, `pekerjaan`, `bahan`, `created_at`) VALUES
(1, 4, 'pondasi', 'batu belah 1:5', '2020-03-22 04:45:07'),
(2, 9, 'Pondasi', 'Batu Belah 1:6', '2020-03-26 03:28:48'),
(3, 9, 'Tiang', 'Beton', '2020-03-26 03:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id`, `foto`, `nama`, `jabatan`) VALUES
(7, 'assets/upload/1585701336_2jpg.jpg', 'rahman', 'ketua'),
(8, 'assets/upload/1585701739_1jpg.jpg', 'irfan', 'anggpta'),
(9, 'assets/upload/1585701750_4jpg.jpg', 'rafi', 'anggpta'),
(10, '', 'tes', 'sada');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(10) NOT NULL DEFAULT '2',
  `referral` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `alamat` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `no_rek` text NOT NULL,
  `bank` text NOT NULL,
  `an_rek` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `referral`, `status`, `alamat`, `foto`, `no_hp`, `no_rek`, `bank`, `an_rek`, `created_at`) VALUES
(4, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '2KZ8RV4', 1, 'admin', '', '9809809809', '353453453', '', 'admin', '2020-03-27 12:24:21'),
(5, 'rizqo', 'rizqo', '3847f1aab04ae574b6400fbef9bd1ed7', '2', 'EZ5XOV5', 0, 'jln. Bambu', '', '90809809', '345345345', '', 'rizqo', '2020-03-28 09:50:13'),
(6, 'rahman', 'rahman', 'e9b74cd3c4c1600ee591fd56360b89db', '2', '', 1, 'wisada', 'assets/upload/berkas_marketing/1585253122_site_gub_1_001.png', '098098098', '9787987', '', 'rahman', '2020-03-28 09:57:07'),
(7, 'raden abdul rahman', 'rahman2', 'e9b74cd3c4c1600ee591fd56360b89db', '2', 'B6YRQP7', 1, 'wdweasea', 'assets/upload/berkas_marketing/1585357134_IMG-20200203-WA0015.jpg', '2432432423', '98766666789', 'SYARIAH MANDIRI (BSM) (451)', 'raden abdul rahman', '2020-03-30 13:11:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interior`
--
ALTER TABLE `interior`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_projek` (`id_projek`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referral` (`referral`),
  ADD KEY `id_rumah` (`id_rumah`);

--
-- Indexes for table `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projek`
--
ALTER TABLE `projek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `rumah`
--
ALTER TABLE `rumah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_informasi` (`id_projek`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spektek`
--
ALTER TABLE `spektek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_projek`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referral` (`referral`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `interior`
--
ALTER TABLE `interior`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `projek`
--
ALTER TABLE `projek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rumah`
--
ALTER TABLE `rumah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `spektek`
--
ALTER TABLE `spektek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `interior`
--
ALTER TABLE `interior`
  ADD CONSTRAINT `interior_ibfk_1` FOREIGN KEY (`id_projek`) REFERENCES `projek` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rumah`
--
ALTER TABLE `rumah`
  ADD CONSTRAINT `rumah_ibfk_1` FOREIGN KEY (`id_projek`) REFERENCES `projek` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `spektek`
--
ALTER TABLE `spektek`
  ADD CONSTRAINT `spektek_ibfk_1` FOREIGN KEY (`id_projek`) REFERENCES `projek` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
