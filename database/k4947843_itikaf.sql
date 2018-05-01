-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2018 at 04:10 AM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k4947843_itikaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `footer_add`
--

CREATE TABLE `footer_add` (
  `fa_id` int(11) NOT NULL,
  `fa_ket` varchar(50) NOT NULL,
  `fa_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer_add`
--

INSERT INTO `footer_add` (`fa_id`, `fa_ket`, `fa_url`) VALUES
(1, 'Kebijakan Privasi', 'https://www.mutan.or.id/pages/kebijakan-privasi'),
(3, 'Syarat & Ketentuan', 'https://www.mutan.or.id/pages/syarat-ketentuan');

-- --------------------------------------------------------

--
-- Table structure for table `footer_header_link`
--

CREATE TABLE `footer_header_link` (
  `fhl_id` int(11) NOT NULL,
  `fhl_header` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer_header_link`
--

INSERT INTO `footer_header_link` (`fhl_id`, `fhl_header`) VALUES
(1, 'SYARI\'AT I\'TIKAF'),
(2, 'PANDUAN I\'TKAF'),
(3, 'INFO I\'TIKAF 2017'),
(4, 'KONTAK KAMI');

-- --------------------------------------------------------

--
-- Table structure for table `footer_link`
--

CREATE TABLE `footer_link` (
  `fl_id` int(11) NOT NULL,
  `fl_fhl` int(11) NOT NULL,
  `fl_ket` varchar(100) NOT NULL,
  `fl_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer_link`
--

INSERT INTO `footer_link` (`fl_id`, `fl_fhl`, `fl_ket`, `fl_link`) VALUES
(9, 2, 'Sifat I\'tikaf Nabi', 'https://www.mutan.or.id/pages/sifat-Itikaf-nabi'),
(10, 2, 'I\'tikaf 10 Hari Akhir', 'https://www.mutan.or.id/pages/Itikaf-10-Hari-Akhir'),
(11, 2, 'Adab Masjid', 'https://www.mutan.or.id/pages/Adab-Masjid'),
(12, 2, 'Adab Masjid Khusus Wanita', 'https://www.mutan.or.id/pages/Adab-Masjid-Khusus-Wanita'),
(15, 3, 'Masa Pendaftaran', 'https://www.mutan.or.id/pages/Masa-Pendaftaran'),
(16, 3, 'Fasilitas Peserta', 'https://www.mutan.or.id/pages/Fasilitas-Peserta'),
(17, 3, 'Kuota Peserta', 'https://www.mutan.or.id/pages/Kuota-Peserta'),
(19, 3, 'Agenda Harian', 'https://www.mutan.or.id/pages/Agenda-Harian'),
(20, 3, 'Jadwal Kajian Dhuha', 'https://www.mutan.or.id/pages/Kajian-Dhuha'),
(29, 1, 'Kedudukan Dalil', 'https://www.mutan.or.id/pages/Kedudukan-Dalil'),
(30, 1, 'I\'tikaf di Masjid', 'https://www.mutan.or.id/pages/Itikaf-di-Masjid'),
(31, 1, 'Wanita Beri\'tikaf', 'https://www.mutan.or.id/pages/Wanita-Ber-Itikaf'),
(32, 1, 'Lama I\'tikaf', 'https://www.mutan.or.id/pages/Lama-Itikaf'),
(33, 1, 'Pembatal I\'tikaf', 'https://www.mutan.or.id/pages/Pembatal-Itikaf'),
(34, 2, 'Adab I\'tikaf', 'https://www.mutan.or.id/pages/Adab-Itikaf'),
(35, 4, 'Kontak Email', 'mailto:me@mutan.or.id'),
(36, 4, 'Kontak WhatsApp', 'http://bit.ly/OrderDong'),
(37, 4, 'Facebook Page', 'https://www.facebook.com/mutanofficialpage'),
(38, 4, 'Twitter Page', 'https://twitter.com/mutanorid'),
(39, 4, 'Live Streaming', '#');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `ha_id` int(11) NOT NULL,
  `ha_menu` int(11) NOT NULL,
  `ha_ur` int(11) NOT NULL,
  `ha_view` int(11) DEFAULT '0',
  `ha_insert` int(11) DEFAULT '0',
  `ha_update` int(11) DEFAULT '0',
  `ha_delete` int(11) DEFAULT '0',
  `ha_proses` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`ha_id`, `ha_menu`, `ha_ur`, `ha_view`, `ha_insert`, `ha_update`, `ha_delete`, `ha_proses`) VALUES
(2, 2, 1, 1, 1, 1, 1, 0),
(10, 8, 1, 1, 1, 1, 1, 0),
(20, 13, 1, 1, 1, 1, 1, 0),
(22, 14, 1, 1, 1, 1, 1, 0),
(24, 15, 1, 1, 1, 1, 1, 0),
(26, 16, 1, 1, 1, 1, 1, 0),
(30, 18, 1, 1, 1, 1, 1, 0),
(32, 19, 1, 1, 1, 1, 1, 0),
(35, 20, 1, 1, 0, 1, 0, 0),
(41, 23, 1, 1, 1, 1, 1, 0),
(43, 24, 1, 1, 1, 1, 1, 0),
(47, 26, 1, 1, 1, 1, 1, 0),
(49, 27, 1, 1, 1, 1, 1, 0),
(51, 28, 1, 1, 1, 1, 1, 0),
(53, 29, 1, 1, 0, 1, 0, 0),
(55, 30, 1, 1, 1, 1, 1, 0),
(57, 32, 1, 1, 1, 1, 1, 0),
(58, 33, 1, 1, 1, 1, 1, 0),
(60, 34, 1, 1, 1, 1, 1, 0),
(61, 34, 0, 0, 0, 0, 0, 0),
(62, 34, 0, 0, 0, 0, 0, 0),
(63, 35, 1, 1, 0, 0, 0, 0),
(64, 35, 0, 0, 0, 0, 0, 0),
(65, 35, 0, 0, 0, 0, 0, 0),
(66, 35, 5, 1, 0, 0, 0, 0),
(67, 35, 4, 1, 0, 0, 0, 0),
(68, 29, 5, 0, 0, 0, 0, 0),
(69, 29, 4, 1, 0, 1, 0, 0),
(70, 36, 1, 1, 0, 0, 0, 0),
(71, 36, 0, 0, 0, 0, 0, 0),
(72, 36, 0, 0, 0, 0, 0, 0),
(73, 36, 5, 1, 0, 0, 0, 0),
(74, 36, 4, 1, 0, 0, 0, 0),
(75, 37, 1, 1, 1, 1, 1, 0),
(76, 37, 5, 0, 0, 0, 0, 0),
(77, 37, 4, 0, 0, 0, 0, 0),
(78, 16, 5, 0, 0, 0, 0, 0),
(79, 16, 4, 0, 0, 0, 0, 0),
(80, 18, 5, 0, 0, 0, 0, 0),
(81, 18, 4, 0, 0, 0, 0, 0),
(82, 19, 5, 0, 0, 0, 0, 0),
(83, 19, 4, 0, 0, 0, 0, 0),
(84, 13, 5, 0, 0, 0, 0, 0),
(85, 13, 4, 0, 0, 0, 0, 0),
(86, 32, 5, 0, 0, 0, 0, 0),
(87, 32, 4, 0, 0, 0, 0, 0),
(88, 33, 5, 0, 0, 0, 0, 0),
(89, 33, 4, 0, 0, 0, 0, 0),
(90, 20, 5, 0, 0, 0, 0, 0),
(91, 20, 4, 0, 0, 0, 0, 0),
(92, 23, 5, 0, 0, 0, 0, 0),
(93, 23, 4, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `itikaf`
--

CREATE TABLE `itikaf` (
  `itikaf_id` int(11) NOT NULL,
  `itikaf_peserta` int(11) NOT NULL,
  `itikaf_tahun` char(4) NOT NULL,
  `itikaf_mulai` char(2) NOT NULL,
  `itikaf_konsumsi` int(11) NOT NULL,
  `itikaf_sumber_informasi` int(11) NOT NULL,
  `itikaf_status` int(11) NOT NULL,
  `itikaf_insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itikaf`
--

INSERT INTO `itikaf` (`itikaf_id`, `itikaf_peserta`, `itikaf_tahun`, `itikaf_mulai`, `itikaf_konsumsi`, `itikaf_sumber_informasi`, `itikaf_status`, `itikaf_insert_date`) VALUES
(16, 24, '2017', '20', 2, 1, 1, '2017-06-05 17:35:52'),
(17, 26, '2017', '22', 2, 1, 1, '2017-06-10 06:36:25'),
(26, 35, '2017', '21', 2, 1, 1, '2017-06-11 14:46:58'),
(27, 36, '2017', '20', 1, 1, 1, '2017-06-12 02:14:00'),
(28, 37, '2017', '21', 2, 1, 1, '2017-06-12 02:14:01'),
(30, 39, '2017', '24', 2, 1, 1, '2017-06-12 02:14:03'),
(31, 40, '2017', '20', 2, 1, 1, '2017-06-12 02:14:05'),
(33, 42, '2017', '20', 2, 4, 1, '2017-06-12 06:28:14'),
(34, 43, '2017', '20', 1, 4, 1, '2017-06-12 21:43:42'),
(40, 49, '2017', '20', 2, 4, 1, '2017-06-13 04:31:44'),
(41, 50, '2017', '20', 2, 1, 1, '2017-06-13 06:31:26'),
(43, 52, '2017', '20', 1, 3, 1, '2017-06-14 23:41:11'),
(44, 53, '2017', '20', 2, 1, 1, '2017-06-14 06:19:51'),
(45, 54, '2017', '26', 2, 4, 1, '2017-06-14 23:41:14'),
(46, 55, '2017', '27', 2, 1, 1, '2017-06-14 23:41:17'),
(47, 56, '2017', '20', 2, 1, 1, '2017-06-14 23:41:20'),
(49, 58, '2017', '20', 2, 1, 1, '2017-06-15 09:12:36'),
(50, 59, '2017', '20', 2, 4, 1, '2017-06-15 09:12:41'),
(51, 60, '2017', '20', 0, 0, 1, '2017-06-16 14:40:02'),
(52, 61, '2017', '20', 1, 1, 1, '2017-06-16 03:11:57'),
(53, 62, '2017', '21', 2, 1, 1, '2017-06-16 03:12:04'),
(54, 63, '2017', '21', 2, 1, 1, '2017-06-16 14:40:11'),
(55, 64, '2017', '20', 1, 0, 1, '2017-06-16 14:40:28'),
(56, 65, '2017', '21', 2, 4, 1, '2017-06-16 03:12:14'),
(57, 66, '2017', '20', 2, 0, 1, '2017-06-16 14:41:47'),
(58, 67, '2017', '20', 2, 1, 1, '2017-06-16 14:41:53'),
(59, 68, '2017', '21', 2, 4, 1, '2017-06-16 14:41:59'),
(60, 69, '2017', '20', 0, 0, 1, '2017-06-16 14:42:06'),
(61, 70, '2017', '20', 0, 0, 1, '2017-06-16 14:42:22'),
(62, 71, '2017', '20', 0, 0, 1, '2017-06-16 03:18:03'),
(63, 72, '2017', '20', 0, 0, 1, '2017-06-16 14:42:31'),
(64, 73, '2017', '20', 2, 4, 1, '2017-06-16 14:42:40'),
(65, 74, '2017', '21', 2, 1, 1, '2017-06-16 14:42:48'),
(66, 75, '2017', '20', 0, 3, 1, '2017-06-16 14:42:54'),
(67, 76, '2017', '20', 0, 0, 1, '2017-06-16 14:42:59'),
(68, 77, '2017', '25', 2, 3, 1, '2017-06-16 14:43:04'),
(69, 78, '2017', '22', 1, 1, 1, '2017-06-16 14:43:10'),
(70, 79, '2017', '21', 2, 1, 1, '2017-06-16 14:43:25'),
(71, 80, '2017', '21', 2, 1, 1, '2017-06-16 14:43:32'),
(73, 82, '2017', '23', 2, 4, 1, '2017-06-17 01:26:35'),
(74, 83, '2017', '26', 2, 1, 1, '2017-06-17 06:40:35'),
(75, 84, '2017', '26', 2, 1, 1, '2017-06-17 06:40:42'),
(76, 85, '2017', '26', 2, 1, 1, '2017-06-17 06:40:47'),
(77, 86, '2017', '26', 2, 1, 1, '2017-06-17 06:40:52'),
(78, 87, '2017', '23', 2, 1, 1, '2017-06-17 08:08:45'),
(79, 88, '2017', '22', 2, 1, 1, '2017-06-17 08:08:51'),
(80, 89, '2017', '23', 2, 1, 1, '2017-06-17 08:08:59'),
(81, 90, '2017', '21', 1, 1, 1, '2017-06-17 15:37:21'),
(82, 91, '2017', '23', 2, 1, 1, '2017-06-17 15:37:06'),
(83, 92, '2017', '23', 2, 1, 1, '2017-06-17 16:18:29'),
(85, 94, '2017', '20', 0, 0, 1, '2017-06-17 16:18:33'),
(86, 95, '2017', '23', 1, 4, 1, '2017-06-17 16:18:13'),
(87, 96, '2017', '23', 1, 1, 1, '2017-06-17 16:18:22'),
(88, 97, '2017', '23', 2, 4, 1, '2017-06-18 09:24:57'),
(89, 98, '2017', '25', 2, 4, 1, '2017-06-18 13:50:40'),
(90, 99, '2017', '26', 1, 1, 1, '2017-06-18 13:50:34'),
(91, 100, '2017', '24', 1, 1, 1, '2017-06-21 05:18:51'),
(92, 101, '2017', '24', 1, 1, 1, '2017-06-21 05:19:02'),
(93, 102, '2017', '27', 2, 4, 1, '2017-06-23 04:36:03'),
(94, 103, '2017', '25', 2, 1, 1, '2017-06-19 06:56:06'),
(95, 104, '2017', '24', 1, 1, 1, '2017-06-19 14:40:55'),
(96, 105, '2017', '25', 2, 1, 1, '2017-06-19 14:41:28'),
(97, 106, '2017', '25', 2, 1, 1, '2017-06-19 14:41:03'),
(98, 107, '2017', '25', 2, 4, 1, '2017-06-19 14:41:08'),
(99, 108, '2017', '27', 2, 4, 1, '2017-06-23 04:36:09'),
(100, 109, '2017', '27', 2, 4, 1, '2017-06-22 10:14:46'),
(101, 110, '2017', '27', 2, 4, 1, '2017-06-22 15:35:50'),
(102, 111, '2017', '28', 2, 4, 1, '2017-06-23 04:42:20'),
(103, 112, '2017', '27', 2, 4, 1, '2017-06-23 04:38:04'),
(104, 113, '2017', '25', 2, 4, 1, '2017-06-19 14:40:47'),
(105, 114, '2017', '25', 2, 4, 1, '2017-06-20 10:13:40'),
(106, 115, '2017', '25', 2, 4, 1, '2017-06-21 13:58:53'),
(107, 116, '2017', '26', 2, 1, 1, '2017-06-21 02:24:25'),
(108, 117, '2017', '27', 0, 1, 1, '2017-06-21 12:38:11'),
(109, 118, '2017', '27', 2, 1, 1, '2017-06-21 13:58:48'),
(110, 119, '2017', '27', 2, 1, 1, '2017-06-21 13:58:38'),
(111, 120, '2017', '26', 1, 1, 1, '2017-06-21 18:48:01'),
(112, 121, '2017', '27', 1, 1, 1, '2017-06-22 07:39:15'),
(113, 122, '2017', '27', 2, 4, 1, '2017-06-22 10:24:14'),
(114, 123, '2017', '28', 1, 1, 1, '2017-06-22 10:37:08'),
(115, 124, '2017', '28', 2, 1, 1, '2017-06-22 10:37:17'),
(116, 125, '2017', '29', 2, 4, 1, '2017-06-22 13:57:41'),
(117, 126, '2017', '28', 1, 1, 1, '2017-06-22 19:11:41'),
(118, 127, '2017', '28', 1, 4, 1, '2017-06-23 13:37:47'),
(119, 128, '2017', '28', 1, 1, 1, '2017-06-23 13:38:02'),
(120, 129, '2017', '29', 1, 1, 1, '2017-06-23 13:38:06'),
(121, 130, '2017', '29', 1, 1, 1, '2017-06-23 13:38:10'),
(122, 131, '2017', '29', 1, 4, 1, '2017-06-23 16:05:45'),
(123, 132, '2017', '29', 1, 4, 1, '2017-06-23 16:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_identitas`
--

CREATE TABLE `kartu_identitas` (
  `ki_id` int(11) NOT NULL,
  `ki_ket` varchar(100) NOT NULL,
  `ki_insert_date` timestamp NULL DEFAULT NULL,
  `ki_insert_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu_identitas`
--

INSERT INTO `kartu_identitas` (`ki_id`, `ki_ket`, `ki_insert_date`, `ki_insert_user`) VALUES
(2, 'SIM', '2017-05-08 11:29:34', 1),
(4, 'Kartu Pelajar', '2017-05-08 11:36:16', 1),
(5, 'KTP', '2017-05-27 13:52:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `konsumsi`
--

CREATE TABLE `konsumsi` (
  `konsumsi_id` int(11) NOT NULL,
  `konsumsi_ket` varchar(100) NOT NULL,
  `konsumsi_insert_date` timestamp NULL DEFAULT NULL,
  `konsumsi_insert_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumsi`
--

INSERT INTO `konsumsi` (`konsumsi_id`, `konsumsi_ket`, `konsumsi_insert_date`, `konsumsi_insert_user`) VALUES
(1, 'Sendiri', '2017-05-08 11:40:43', 1),
(2, 'Kolektif', '2017-05-08 11:40:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `kota_id` int(11) NOT NULL,
  `kota_ket` varchar(100) NOT NULL,
  `kota_insert_date` timestamp NULL DEFAULT NULL,
  `kota_insert_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`kota_id`, `kota_ket`, `kota_insert_date`, `kota_insert_user`) VALUES
(16, 'Jakarta', '2017-06-01 08:09:16', 1),
(17, 'Bogor', '2017-06-01 08:09:21', 1),
(18, 'Depok', '2017-06-01 08:09:25', 1),
(19, 'Tangerang', '2017-06-01 08:09:32', 1),
(20, 'Bekasi', '2017-06-01 08:09:36', 1),
(21, 'Bandung', '2017-06-01 08:09:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logo_id` int(11) NOT NULL,
  `logo_ket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logo_id`, `logo_ket`) VALUES
(1, 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ket` varchar(50) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ket`, `menu_parent`, `menu_url`, `menu_order`) VALUES
(2, 'master', 0, '#', 2),
(8, 'menu', 2, 'cpanel_menu', 1),
(13, 'sumber informasi', 37, 'cpanel_sumber_informasi', 6),
(14, 'role', 2, 'cpanel_user_role', 2),
(15, 'user', 2, 'cpanel_user', 3),
(16, 'kartu identitas', 37, 'cpanel_kartu_identitas', 4),
(18, 'konsumsi', 37, 'cpanel_konsumsi', 5),
(19, 'kota', 37, 'cpanel_kota', 6),
(20, 'aktivasi peserta', 0, 'cpanel_aktivasi', 6),
(23, 'peserta aktif', 0, 'cpanel_peserta_aktif', 7),
(24, 'slider', 2, 'cpanel_slider', 5),
(26, 'footer header', 2, 'cpanel_fheader', 6),
(27, 'footer menu', 2, 'cpanel_flink', 7),
(28, 'logo', 2, 'cpanel_logo', 5),
(29, 'profile', 0, 'cpanel_profile', 8),
(30, 'top menu', 2, 'cpanel_tm', 8),
(32, 'pages', 0, 'cpanel_pages', 4),
(33, 'peserta', 0, 'cpanel_peserta', 5),
(34, 'additional footer', 2, 'cpanel_fa', 9),
(35, 'dashboard', 0, 'cpanels', 1),
(36, 'logout', 0, '/auth/logout', 9),
(37, 'listing', 0, '#', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pages_id` int(11) NOT NULL,
  `pages_title` varchar(225) NOT NULL,
  `pages_slug` varchar(225) NOT NULL,
  `pages_content` text NOT NULL,
  `pages_insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `pages_title`, `pages_slug`, `pages_content`, `pages_insert_date`) VALUES
(2, 'Siapa Kami', 'Siapa-Kami', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;SIAPA KAMI?&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Berawal dari sebutan &lt;strong&gt;PITA&lt;/strong&gt; &lt;em&gt;(Paguyuban I&amp;rsquo;tikaf Atta&amp;rsquo;awun) &lt;/em&gt;yang didirikan oleh Zakaria Rachmat, Abu Bakar dan Jerry Hadi sebagai sebuah komunitas kecil pada tahun 2001.&lt;/p&gt;\r\n\r\n&lt;p&gt;4 tahun kemudian komunitas ini makin membesar dengan diawalinya pergantian nama dengan sebutan &lt;strong&gt;MUTAN&lt;/strong&gt; &lt;em&gt;(Mu&amp;rsquo;takifin Atta&amp;rsquo;awun) &lt;/em&gt;yang diusulkan oleh Denny Rachmat Mustofa dan Laut Amal Seto hingga saat ini.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;MUTAN bukanlah kepanitiaan i&amp;rsquo;tikaf,&lt;/strong&gt; melainkan komunitas yang ditunjuk oleh Panitia Ramadhan dalam&amp;nbsp;Struktur Resmi DKM Masjid Atta&amp;#39;awun. MUTAN&amp;nbsp;membantu memakmurkan masjid dengan salah satu rangkaian kegiatan I&amp;rsquo;tikaf yang telah menjadi program rutin Masjid Atta&amp;rsquo;awun setiap tahunnya. MUTAN membantu mengkoordinir data dan kegiatan jamaah selama I&amp;rsquo;tikaf 10 hari terakhir di bulan Ramadhan.&lt;/p&gt;\r\n\r\n&lt;p&gt;Sebagai sebuah komunitas besar, MUTAN memiliki Misi untuk mengenalkan lebih dekat ibadah I&amp;rsquo;tikaf 10 hari terakhir Ramadhan kepada umat berdasarkan ajaran Rasulullah Shalallahu Alaih Wassalam. Misi pertama MUTAN adalah membangun umat yang berpegang teguh pada&amp;nbsp;seluruh ajaran Islam seutuhnya baik yang bersifat pribadi, bermasyarakat maupun bernegara. Misi MUTAN yang kedua adalah membangun umat yang mampu menjadi motor dakwah di tengah&amp;nbsp;masyarakat dengan menyebarkan&amp;nbsp;pemahaman ajaran Islam yang telah dimiliki dan diamalkannya.&lt;/p&gt;\r\n\r\n&lt;p&gt;Aset dan kekuatan terbesar MUTAN adalah &lt;em&gt;Ukhuwah Islamiyah&lt;/em&gt; yang ada pada orang-orang yang terlibat dalam setiap kegiatan yang diselenggarakan setiap tahunnya pada 10 hari terakhir di bulan Ramadhan dengan khusyuk dan berjama&amp;rsquo;ah.&lt;/p&gt;\r\n\r\n&lt;p&gt;Tanpa memandang lagi&amp;nbsp;perbedaan yang ada, MUTAN mampu mengakomodir&amp;nbsp;berbagai perbedaan pemahaman Fiqh yang diakui, perbedaaan organisasi kemasyarakatan dan gerakan dakwah menjadi satu kesatuan jama&amp;rsquo;ah dibawah Liwa Rasulillah Shalallahu &amp;lsquo;Alaihi Wassalam berdasarkan Aqidah Islamiyah.&lt;/p&gt;\r\n\r\n&lt;p&gt;Pada akhirnya, hanya kepada Allah Ta&amp;rsquo;ala lah kita akan kembali, begitupun amal dan ibadah kita semua. Sehingga menggapai Ridha Allah Ta&amp;rsquo;ala adalah kunci kesuksesan di atas segala-galanya.&lt;/p&gt;\r\n', '2017-06-11 06:48:27'),
(9, 'FAQ', 'FAQ', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n', '2017-06-06 07:54:35'),
(10, 'Donasi', 'Donasi', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n', '2017-06-06 07:54:26'),
(11, 'Publikasi', 'Publikasi', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n', '2017-06-06 07:54:17'),
(12, 'Program', 'Program', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lorem Ipsum&lt;/strong&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;\r\n', '2017-06-06 07:54:08'),
(13, 'Kebijakan Privasi', 'Kebijakan-Privasi', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Persetujuan Atas Pengumpulan, Penggunaan dan Penyingkapan Informasi Pribadi&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Penggunaan Anda atas situs kami dan/atau pendaftaran Anda atas produk dan jasa kami merupakan persetujuan Anda pada ketentuan &amp;ldquo;&lt;a href=&quot;https://www.mutan.or.id/pages/kebijakan-privasi/&quot;&gt;Kebijakan Privasi&lt;/a&gt;&amp;rdquo; ini. Jadi apabila Anda tidak menyetujui ketentuan &amp;ldquo;Kebijakan Privasi&amp;rdquo; ini, mohon tidak menggunakan situs kami. Kami akan memperbarui &amp;ldquo;Kebijakan Privasi&amp;rdquo; ini pada saat dibutuhkan. Jika terdapat pembaruan, kami akan menandainaya dengan memperbarui tanggal pada halaman atas &amp;ldquo;Kebijakan Privasi&amp;rdquo;.Kami tidak akan menginformasikan dan meminta persetujuan dari pelanggan untuk setiap kondisi yang berhubungan dengan investigasi terhadap pelanggan karena pelanggaran hukum, keadaan darurat dimana hidup, kesehatan atau keamanan seorang individu terancam, penagihan utang atau untuk memenuhi permintaan badan penegak hukum atau perintah dari pengadilan.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Pertanggungjawaban&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Kami mengumpulkan &amp;ldquo;informasi pribadi&amp;rdquo; (informasi yang secara pribadi mengidentifikasi Anda) pada saat Anda melakukan pendaftaran dan berlangganan di website kami. Informasi pribadi ini termasuk -tapi tidak terbatas- pada nama Anda, alamat email, alamat rumah dan kantor, nomor telepon dan informasi tentang perangkat keras dan lunak komputer Anda (seperti alamat Internet Protocol, sistem pengoperasian, jenis browser, nama domain, URL, waktu akses dan alamat web site penghubung).Kami menerapkan &amp;ldquo;Kebijakan Privasi&amp;rdquo; ini untuk melindungi informasi pribadi yang diterima dari pelanggannya. &amp;ldquo;Kebijakan Privasi&amp;rdquo; ini juga menyatakan bahwa kami akan menggunakan perjanjian ini dengan sepantasnya guna melindungi informasi pribadi yang dikirim untuk suatu pemrosesan data oleh pihak ketiga atas nama kami.Kami melalui Privacy Officer-nya akan mempertanggungjawabkan informasi pribadi Anda untuk memastikan pemenuhan prinsip-prinsip &amp;ldquo;Kebijakan Privasi&amp;rdquo; ini. Karyawan kami lainnya bisa didelegasikan untuk melakukan tugas tersebut atas nama Privacy Officer.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Tujuan-tujuan Pengumpulan Data Pribadi&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Pengumpulan data pribadi Anda oleh kami akan dipergunakan untuk kepentingan-kepentingan di bawah ini:&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Memenuhi kebutuhan pelanggan yang berkaitan dengan jasa kami.&lt;/li&gt;\r\n	&lt;li&gt;Membangun dan pemeliharaan website, produk dan jasa kami untuk meningkatkan pelayanan kami kepada pelanggan.&lt;/li&gt;\r\n	&lt;li&gt;Memenuhi kebutuhan Anda terhadap produk, jasa dan informasi.&lt;/li&gt;\r\n	&lt;li&gt;Berkomunikasi dengan pelanggan dan pengunjung situs ketika diperlukan. Selain itu juga untuk menginformasikan kepada pelanggan mengenai upgrade, produk dan jasa lainnya yang tersedia dalam website kami, para affiliate-nya dan pihak ketiga.&lt;/li&gt;\r\n	&lt;li&gt;Guna mempersonalisasi beberapa jasa dan produk kami untuk Anda. Selain itu juga untuk mengirim iklan yang tertarget serta penawaran dari kami dan pihak ketiga.&lt;/li&gt;\r\n	&lt;li&gt;Mematuhi hukum yang berlaku, peraturan, proses legal dan permintaan pemerintah.&lt;/li&gt;\r\n	&lt;li&gt;Merespon klaim legitimasi, atau untuk mengirimkan teguran jika kami percaya telah terjadi pelanggaran yang dilakukan oleh Anda terhadap hak-hak pihak ketiga manapun atau perjanjian manapun atau kebijakan yang menentukan penggunaan Anda atas situs, produk dan jasa kami.&lt;/li&gt;\r\n	&lt;li&gt;Melindungi jasa, produk dan hak-hak kami, termasuk -tanpa terbatas- pada keamanan atau integritas situs kami.&lt;/li&gt;\r\n	&lt;li&gt;Untuk mengindentifikasi dan memecahkan masalah teknis yang berkaitan dengan situs, produk dan jasa kami. Kami juga menggunakan informasi-informasi pribadi dari sejumlah form tersebut untuk analisa bisnis, operasional, pemasaran dan tujuan promosi lainnya.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Selain itu, kami menggunakan informasi-informasi pribadi tersebut untuk keperluan dengan tujuan yang teridentifikasi pada saat kami menyewa jasa perusahaan lain yang berhubungan dengan produk dan jasa kami.&lt;/p&gt;\r\n\r\n&lt;p&gt;Namun, kami akan membatasi hak mereka dalam menggunakan dan menyingkapkan informasi pribadi Anda lebih jauh. Informasi tersebut digunakan hanya sebagai bagian dari tujuan pekerjaan mereka untuk kami.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Pembatasan Pengumpulan Informasi Pribadi&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Kami membatasi pengumpulan informasi pribadi hanya pada informasi dengan tujuan terindentifikasi seperlunya.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Penyingkapan, Pemrosesan dan Penyimpanan Informasi Pribadi&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Kami tidak menjual, menyewakan atau menyingkapkan informasi pribadi Anda pada orang lain, kecuali:&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Pada orang yang Anda rencanakan bertindak sebagai agen/wakil Anda,untuk satu atau lebih tujuan yang teridentifikasi (lihat bagian nomor 2 di atas).&lt;/li&gt;\r\n	&lt;li&gt;Pada karyawan kami, kontraktor independen, cabang, affiliates, konsultan, rekan bisnis, penyedia jasa, suppliers dan agen, yang bertindak atas nama kami untuk tujuan yang teridentifikasi.&lt;/li&gt;\r\n	&lt;li&gt;Dalam keperluan tertentu jika kami memiliki alasan yang dipercayanya bahwa diperlukan penyingkapan informasi untuk mengidentifikasi, mengontak dan melaksanakan tindakan hukum terhadap seseorang yang mungkin bisa menyebabkan celaka atau gangguan (baik sengaja atau tidak sengaja) terhadap hak atau kepemilikan kami, pengguna website kami lainnya, produk atau jasa kami, atau orang lain yang bisa membahayakan dikarenakan aktivitas-aktivitas tersebut.&lt;/li&gt;\r\n	&lt;li&gt;Untuk merespon proses hukum dan menyediakan informasi bagi penegakan hukum atau dalam hubungannya dengan penyelidikan yang berhubungan dengan keamanan publik, yang telah diijinkan atau disyaratkan oleh badan hukum.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Sebagai tambahan, sejalan dengan pembangunan bisnis kami, kami bisa saja menjual atau membeli bisnis lainnya atau bergabung dengan perusahaan lain. Dalam transaksi tersebut, informasi pribadi mungkin salah satu yang menjadi aset bisnis yang ditransfer. Juga dalam peristiwa dimana kami atau semua asetnya diperoleh secara substansi, dalam hal ini informasi pribadi Anda mungkin menjadi salah satu aset yang ditransfer.&lt;/p&gt;\r\n\r\n&lt;p&gt;Informasi Anda mungkin disimpan dan diproses di Indonesia, atau di negara lain dimana kami atau affiliate-nya, cabang atau agennya memelihara fasilitasnya. Dengan menggunakan website ini, Anda menyetujui untuk setiap transfer informasi tersebut ke luar negara yang ditinggali saat ini.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Akurasi Informasi Pribadi&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Kami akan selalu berusaha untuk menjaga keakuratan informasi untuk tujuan terindentifikasi, dan untuk meminimalisir kemungkinan terjadinya keputusan pelanggan yang tidak selayaknya berdasarkan informasi tersebut.Pelanggan bertanggung jawab untuk menginformasikan perubahan informasi pribadi mereka kepada kami. Caranya dengan mengirimkan email melalui kami. kami akan menggunakan informasi pribadi yang baru atau yang telah diperbarui untuk memperbarui catatannya.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Perlindungan Keamanan&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Kami akan berusaha keras dengan alasan yang kuat untuk melindungi informasi pribadi para pelanggan.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Akses Pada Informasi Pribadi&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Kami akan memberikan kesempatan pada Anda untuk meninjau kembali informasi pribadi dalam file Anda dengan dasar alasan yang kuat. Jika Anda menghendakinya, silakan menghubungi kami melalui email melalui kami.&lt;/p&gt;\r\n\r\n&lt;p&gt;Jika kami menyatakan ketidaksanggupan atas akses beberapa aspek informasi pribadi tersebut, hal tersebut dikarenakan beberapa alasan berikut ini: bahwa dengan melakukannya akan mengungkapkan informasi pribadi pihak ketiga, atau informasi yang merupakan rahasia bisnis, atau komunikasi rahasia/hak istimewa pengacara-klien, atau informasi tersebut berhubungan dengan pelanggaran terhadap suatu perjanjian atau pelanggaran hukum, atau bahwa penyingkapan tersebut dapat dianggap mengancam hidup atau keamanan orang lain.&lt;/p&gt;\r\n\r\n&lt;p&gt;Pelanggan memiliki hak untuk meminta informasi yang tidak akurat atau tidak lengkap untuk diubah sebagaimana layaknya, dengan menghubungi kami atau Privacy Officer kami seperti yang telah dijelaskan di atas. Begitu pelanggan memperbaruinya, Kami akan segera memperbaiki informasi pribadi tersebut.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Google Remarketing&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Kami menggunakan pihak ketiga dalam program pemasaran remarketing. Dengan mengunjungi website kami, pihak ketiga untuk pemasaran kami mungkin menampilkan iklan kami di internet. Kami juga menggunakan cookies pihak ketiga untuk menyajikan iklan berdasarkan sejarah anda mengunjungi website kami.Apabila anda ingin keluar / opt-out dari penggunaan cookies dari kami, anda bisa mengunjungi&amp;nbsp;&lt;em&gt;&lt;a href=&quot;https://www.google.com/ads/preferences/&quot; target=&quot;_blank&quot;&gt;Ads Preferences Manager&lt;/a&gt;.&lt;/em&gt;&lt;/p&gt;\r\n', '2017-06-06 07:53:56'),
(15, 'Syarat & Ketentuan', 'Syarat-Ketentuan', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;SYARAT&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Mengisi form&amp;nbsp;&lt;a href=&quot;https://www.mutan.or.id/pendaftaran&quot;&gt;Registrasi Online&lt;/a&gt;&lt;/li&gt;\r\n	&lt;li&gt;Membawa KTP&lt;/li&gt;\r\n	&lt;li&gt;Muslim/Muslimat&lt;/li&gt;\r\n	&lt;li&gt;Sehat Jasmani dan Rohani&lt;/li&gt;\r\n	&lt;li&gt;Memahami ilmu disyari&amp;#39;atkannya i&amp;#39;tikaf&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;KETENTUAN&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Membayar Biaya Kebersihan.&lt;/li&gt;\r\n	&lt;li&gt;Membayar Biaya Konsumsi&amp;nbsp;&lt;em&gt;(jika pilihannya dikoordinir)&lt;/em&gt;&lt;/li&gt;\r\n	&lt;li&gt;Mematuhi segala peraturan baku organisasi MUTAN dan DKM at-Ta&amp;#39;awun&lt;/li&gt;\r\n	&lt;li&gt;Saling menghormati dan menghargai terhadap segala macam perbedaan pendapat Fiqih dan Madzhab yang &lt;em&gt;diakui.&lt;/em&gt;&lt;/li&gt;\r\n	&lt;li&gt;Tidak membawa atribut kepartaian / organisasi diluar atribut MUTAN dan DKM at-Ta&amp;#39;awun demi terjaganya Ukhuwah Islamiyah.&lt;/li&gt;\r\n	&lt;li&gt;Bersedia membangun sinergi dan kerjasama dengan organisasi MUTAN dan DKM at-Ta&amp;#39;awun demi terjaganya kekhusyukan selama i&amp;#39;tikaf.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;SYARAT dan KETENTUAN di atas memungkinkan untuk dikoreksi baik dikurangi maupun ditambah pada kemudian hari tanpa pemberitahuan.&lt;/em&gt;&lt;/p&gt;\r\n', '2017-06-14 03:42:27'),
(16, 'Kedudukan Dalil', 'Kedudukan-Dalil', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;PENGERTIAN&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;I&amp;rsquo;tikaf secara bahasa berarti menetap pada sesuatu. Sedangkan secara syar&amp;rsquo;i, i&amp;rsquo;tikaf berarti menetap di masjid dengan tata cara yang khusus disertai dengan niat. - Al Mawsu&amp;rsquo;ah Al Fiqhiyah, 2/1699.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;DALIL DISYARI&amp;rsquo;ATKANNYA I&amp;rsquo;TIKAF&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Ibnul Mundzir mengatakan, &amp;ldquo;Para ulama sepakat bahwa i&amp;rsquo;tikaf itu sunnah, bukan wajib kecuali jika seseorang mewajibkan bagi dirinya bernadzar untuk melaksanakan i&amp;rsquo;tikaf.&amp;rdquo; - Al Mughni, 4/456&lt;/p&gt;\r\n\r\n&lt;p&gt;Dari Abu Hurairah, ia berkata,&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;ldquo;&lt;em&gt;Nabi shallallahu &amp;lsquo;alaihi wa sallam biasa beri&amp;rsquo;tikaf pada bulan Ramadhan selama sepuluh hari. Namun pada tahun wafatnya, Beliau beri&amp;rsquo;tikaf selama dua puluh hari&lt;/em&gt;&amp;rdquo;. - HR. Bukhari no. 2044.&lt;br /&gt;\r\n&lt;br /&gt;\r\nWaktu i&amp;rsquo;tikaf yang lebih afdhol adalah di akhir-akhir ramadhan (10 hari terakhir bulan Ramadhan) sebagaimana hadits &amp;lsquo;Aisyah, ia berkata,&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;ldquo;&lt;em&gt;Nabi shallallahu &amp;lsquo;alaihi wa sallam beri&amp;rsquo;tikaf pada sepuluh hari yang akhir dari Ramadhan hingga wafatnya kemudian isteri-isteri beliau pun beri&amp;rsquo;tikaf setelah kepergian beliau&lt;/em&gt;.&amp;rdquo; - HR. Bukhari no. 2026 dan&amp;nbsp; Muslim no. 1172&lt;/p&gt;\r\n\r\n&lt;p&gt;Nabi&amp;nbsp;&lt;em&gt;shallallahu &amp;lsquo;alaihi wa sallam&amp;nbsp;&lt;/em&gt;beri&amp;rsquo;tikaf pada sepuluh hari terakhir dengan tujuan untuk mendapatkan malam lailatul qadar, untuk menghilangkan dari segala kesibukan dunia, sehingga mudah bermunajat dengan Rabbnya, banyak berdo&amp;rsquo;a dan banyak berdzikir ketika itu. - &lt;em&gt;Latho-if Al Ma&amp;rsquo;arif&lt;/em&gt;, hal. 338&lt;/p&gt;\r\n', '2017-06-06 07:53:27'),
(17, 'I\'tikaf di Masjid', 'Itikaf-di-Masjid', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;I&amp;rsquo;TIKAF HARUS DILAKUKAN DI MASJID&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Hal ini berdasarkan firman Allah&amp;nbsp;&lt;em&gt;Ta&amp;rsquo;ala&lt;/em&gt;,&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;ldquo;&lt;em&gt;(Tetapi) janganlah kamu campuri mereka sedang kamu beri&amp;rsquo;tikaf dalam masjid&lt;/em&gt;&amp;rdquo;(QS. Al Baqarah: 187).&lt;/p&gt;\r\n\r\n&lt;p&gt;Demikian juga dikarenakan Rasulullah&amp;nbsp;&lt;em&gt;shallallahu &amp;lsquo;alaihi wa sallam&lt;/em&gt;&amp;nbsp;begitu juga istri-istri beliau melakukannya di masjid, dan tidak pernah di rumah sama sekali. Ibnu Hajar&amp;nbsp;&lt;em&gt;rahimahullah&amp;nbsp;&lt;/em&gt;berkata, &amp;ldquo;Para ulama sepakat bahwa disyaratkan melakukan i&amp;rsquo;tikaf di masjid.&amp;rdquo; - Fathul Bari, 4/271&lt;/p&gt;\r\n\r\n&lt;p&gt;Termasuk wanita, ia boleh melakukan i&amp;rsquo;tikaf sebagaimana laki-laki, tidak sah jika dilakukan selain di masjid - Al Mawsu&amp;rsquo;ah Al Fiqhiyah, 2/13775.&lt;br /&gt;\r\n&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;I&amp;rsquo;TIKAF BOLEH DILAKUKAN DI MASJID MANA SAJA&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Menurut mayoritas ulama, i&amp;rsquo;tikaf disyari&amp;rsquo;atkan di semua masjid karena keumuman firman Allah di atas (yang artinya)&lt;em&gt;&amp;nbsp;&amp;ldquo;Sedang kamu beri&amp;rsquo;tikaf dalam masjid&amp;rdquo;&lt;/em&gt;.&amp;nbsp;&lt;a href=&quot;https://rumaysho.com/1150-panduan-itikaf-ramadhan.html#_ftn8&quot;&gt;-&lt;/a&gt; Lihat Shahih Fiqh Sunnah, 2/151.&lt;/p&gt;\r\n\r\n&lt;p&gt;Imam Bukhari membawakan Bab dalam kitab Shahihnya, &amp;ldquo;I&amp;rsquo;tikaf pada 10 hari terakhir bulan Ramdhan dan i&amp;rsquo;tikaf di seluruh masjid.&amp;rdquo; Ibnu Hajar menyatakan, &amp;ldquo;Ayat tersebut (surat Al Baqarah ayat 187) menyebutkan disyaratkannya masjid, tanpa dikhususkan masjid tertentu&amp;rdquo; - Fathul Bari, 4/271.&lt;/p&gt;\r\n\r\n&lt;p&gt;Adapun hadits marfu&amp;rsquo; dari Hudzaifah yang mengatakan, &amp;rdquo;Tidak ada i&amp;rsquo;tikaf kecuali pada tiga masjid yaitu masjidil harom, masjid nabawi dan masjidil aqsho&amp;rdquo;; perlu diketahui, hadits ini masih diperselisihkan statusnya, apakah marfu&amp;rsquo; (sabda Nabi) atau mauquf (perkataan sahabat). (Lihat Shahih Fiqh Sunnah, 2/151). Jika melihat perkataan Ibnu Hajar Al Asqolani rahimahullah, beliau lebih memilih bahwa hadits tersebut hanyalah perkataan Hudzaifah ibnul Yaman. - Fathul Bari, 4/272.&lt;/p&gt;\r\n\r\n&lt;p&gt;Para ulama selanjutnya berselisih pendapat masjid apakah yang dimaksud. Apakah masjid biasa di mana dijalankan shalat jama&amp;rsquo;ah lima waktu ataukah masjid jaami&amp;rsquo; yang diadakan juga shalat jum&amp;rsquo;at di sana?&lt;/p&gt;\r\n\r\n&lt;p&gt;Imam Malik mengatakan bahwa i&amp;rsquo;tikaf boleh dilakukan di masjid mana saja (asal ditegakkan shalat lima waktu di sana, pen) karena keumuman firman Allah&amp;nbsp;&lt;em&gt;Ta&amp;rsquo;ala&lt;/em&gt;, - Al Mawsu&amp;rsquo;ah Al Fiqhiyah, 2/13754&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;ldquo;&lt;em&gt;Sedang kamu beri&amp;rsquo;tikaf dalam masjid&lt;/em&gt;&amp;rdquo;(QS. Al Baqarah: 187).&lt;/p&gt;\r\n\r\n&lt;p&gt;Ini juga menjadi pendapat Imam Asy Syafi&amp;rsquo;i. Namun Imam Asy Syafi&amp;rsquo;i&amp;nbsp;&lt;em&gt;rahimahullah&amp;nbsp;&lt;/em&gt;menambahkan syarat, yaitu masjid tersebut diadakan juga shalat Jum&amp;rsquo;at.- Al Mughni, 4/462.&lt;br /&gt;\r\n&lt;br /&gt;\r\nTujuannya di sini adalah agar ketika pelaksanaan shalat Jum&amp;rsquo;at, orang yang beri&amp;rsquo;tikaf tidak perlu keluar dari masjid.&lt;/p&gt;\r\n\r\n&lt;p&gt;Kenapa disyaratkan di masjid yang ditegakkan shalat jama&amp;rsquo;ah? Ibnu Qudamah katakan, &amp;ldquo;Shalat jama&amp;rsquo;ah itu wajib (bagi laki-laki). Jika seorang laki-laki yang hendak melaksanakan i&amp;rsquo;tikaf tidak berdiam di masjid yang tidak ditegakkan shalat jama&amp;rsquo;ah, maka bisa terjadi dua dampak negatif:&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Meninggalkan shalat jama&amp;rsquo;ah yang hukumnya wajib, dan&lt;/li&gt;\r\n	&lt;li&gt;Terus menerus keluar dari tempat i&amp;rsquo;tikaf padahal seperti ini bisa saja dihindari. Jika semacam ini yang terjadi, maka ini sama saja tidak i&amp;rsquo;tikaf. Padahal maksud i&amp;rsquo;tikaf adalah untuk menetap dalam rangka melaksanakan ibadah pada Allah.&amp;rdquo; - Al Mugni, 4/461.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n', '2017-06-06 07:53:18');
INSERT INTO `pages` (`pages_id`, `pages_title`, `pages_slug`, `pages_content`, `pages_insert_date`) VALUES
(18, 'Wanita Ber-I\'tikaf', 'Wanita-Ber-Itikaf', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;WANITA BOLEH BERI&amp;rsquo;TIKAF&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Sebagaimana Nabi&amp;nbsp;&lt;em&gt;shallallahu &amp;lsquo;alaihi wa sallam&lt;/em&gt;&amp;nbsp;mengizinkan istri beliau untuk beri&amp;rsquo;tikaf.&amp;nbsp; &amp;lsquo;Aisyah&amp;nbsp;&lt;em&gt;radhiyallahu &amp;lsquo;anha&lt;/em&gt;&amp;nbsp;berkata,&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;ldquo;&lt;em&gt;Rasulullah shallallahu &amp;lsquo;alaihi wasallam biasa beri&amp;rsquo;tikaf pada bulan Ramadhan. Apabila selesai dari shalat shubuh, beliau masuk ke tempat khusus i&amp;rsquo;tikaf beliau. Dia (Yahya bin Sa&amp;rsquo;id) berkata: Kemudian &amp;lsquo;Aisyah radhiyallahu &amp;lsquo;anha meminta izin untuk bisa beri&amp;rsquo;tikaf bersama beliau, maka beliau mengizinkannya&lt;/em&gt;.&amp;rdquo;- HR. Bukhari no. 2041.&lt;/p&gt;\r\n\r\n&lt;p&gt;Dari &amp;lsquo;Aisyah, ia berkata,&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;ldquo;&lt;em&gt;Nabi shallallahu &amp;lsquo;alaihi wa sallam beri&amp;rsquo;tikaf pada sepuluh hari yang akhir dari Ramadhan hingga wafatnya kemudian isteri-isteri beliau pun beri&amp;rsquo;tikaf setelah kepergian beliau&lt;/em&gt;.&amp;rdquo;- HR. Bukhari no. 2026 dan&amp;nbsp; Muslim no. 1172.&lt;/p&gt;\r\n\r\n&lt;p&gt;Namun wanita boleh beri&amp;rsquo;tikaf di masjid asalkan memenuhi 2 syarat:&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Meminta izin suami dan&lt;/li&gt;\r\n	&lt;li&gt;Tidak menimbulkan fitnah (godaan bagi laki-laki) sehingga wanita yang i&amp;rsquo;tikaf harus benar-benar menutup aurat dengan sempurna dan juga tidak memakai wewangian.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Shahih Fiqh Sunnah, 2/151-152.&lt;/p&gt;\r\n', '2017-06-06 07:53:07'),
(19, 'Lama I\'tikaf', 'Lama-Itikaf', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;LAMA WAKTU BERDIAM DI MASJID&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Para ulama sepakat bahwa i&amp;rsquo;tikaf tidak ada batasan waktu maksimalnya. Namun mereka berselisih pendapat berapa waktu minimal untuk dikatakan sudah beri&amp;rsquo;tikaf.&amp;nbsp;- Fathul Bari, 4/272.&lt;/p&gt;\r\n\r\n&lt;p&gt;Bagi ulama yang mensyaratkan i&amp;rsquo;tikaf harus disertai dengan puasa, maka waktu minimalnya adalah sehari. Ulama lainnya mengatakan dibolehkan kurang dari sehari, namun tetap disyaratkan puasa. Imam Malik mensyaratkan minimal sepuluh hari. Imam Malik&amp;nbsp; juga memiliki pendapat lainnya, minimal satu atau dua hari. Sedangkan bagi ulama yang tidak mensyaratkan puasa, maka waktu minimal dikatakan telah beri&amp;rsquo;tikaf adalah selama ia sudah berdiam di masjid dan di sini tanpa dipersyaratkan harus duduk. - Fathul Bari, 4/272.&lt;/p&gt;\r\n\r\n&lt;p&gt;Yang tepat dalam masalah ini, i&amp;rsquo;tikaf tidak dipersyaratkan untuk puasa, hanya disunnahkan - Shahih Fiqh Sunnah, 2/153.&lt;/p&gt;\r\n\r\n&lt;p&gt;Menurut mayoritas ulama, i&amp;rsquo;tikaf tidak ada batasan waktu minimalnya, artinya boleh cuma sesaat di malam atau di siang hari. - Shahih Fiqh Sunnah, 2/154.&lt;/p&gt;\r\n\r\n&lt;p&gt;Al Mardawi&amp;nbsp;&lt;em&gt;rahimahullah&amp;nbsp;&lt;/em&gt;mengatakan, &amp;ldquo;Waktu minimal dikatakan i&amp;rsquo;tikaf pada i&amp;rsquo;tikaf yang sunnah atau i&amp;rsquo;tikaf yang mutlak - I&amp;rsquo;tikaf mutlak, maksudnya adalah i&amp;rsquo;tikaf tanpa disebutkan syarat berapa lama.&lt;/p&gt;\r\n\r\n&lt;p&gt;Adalah selama disebut berdiam di masjid (walaupun hanya sesaat).&amp;rdquo; - Al Inshof, 6/17.&lt;/p&gt;\r\n', '2017-06-06 07:52:56'),
(20, 'Pembatal I\'tikaf', 'Pembatal-Itikaf', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;YANG MEMBATALKAN I&amp;rsquo;TIKAF&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Keluar masjid tanpa alasan syar&amp;rsquo;i dan tanpa ada kebutuhan yang mubah yang mendesak.&lt;/p&gt;\r\n\r\n&lt;p&gt;Jima&amp;rsquo; (bersetubuh) dengan istri berdasarkan Surat Al Baqarah ayat 187. Ibnul Mundzir telah menukil adanya ijma&amp;rsquo; (kesepakatan ulama) bahwa yang dimaksud mubasyaroh dalam surat Al Baqarah ayat 187 adalah jima&amp;rsquo; (hubungan intim) - Fathul Bari, 4/272.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;YANG DIBOLEHKAN KETIKA I&amp;rsquo;TIKAF&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Keluar masjid disebabkan ada hajat yang mesti ditunaikan seperti keluar untuk makan, minum, dan hajat lain yang tidak bisa dilakukan di dalam masjid.&lt;/li&gt;\r\n	&lt;li&gt;Melakukan hal-hal mubah seperti mengantarkan orang yang mengunjunginya sampai pintu masjid atau bercakap-cakap dengan orang lain.&lt;/li&gt;\r\n	&lt;li&gt;Istri mengunjungi suami yang beri&amp;rsquo;tikaf dan berdua-duaan dengannya.&lt;/li&gt;\r\n	&lt;li&gt;Mandi dan berwudhu di masjid.&lt;/li&gt;\r\n	&lt;li&gt;Membawa kasur untuk tidur di masjid.&lt;/li&gt;\r\n	&lt;li&gt;Mulai Masuk dan Keluar Masjid&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Jika ingin beri&amp;rsquo;tikaf selama 10 hari terakhir bulan Ramadhan, maka seorang yang beri&amp;rsquo;tikaf mulai memasuki masjid setelah shalat Shubuh pada hari ke-21 dan keluar setelah shalat shubuh pada hari &amp;lsquo;Idul Fithri menuju lapangan. Hal ini sebagaimana terdapat dalam hadits &amp;lsquo;Aisyah, ia berkata,&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;ldquo;&lt;em&gt;Rasulullah shallallahu &amp;lsquo;alaihi wasallam biasa beri&amp;rsquo;tikaf pada bulan Ramadhan. Apabila selesai dari shalat shubuh, beliau masuk ke tempat khusus i&amp;rsquo;tikaf beliau. Dia (Yahya bin Sa&amp;rsquo;id) berkata: Kemudian &amp;lsquo;Aisyah radhiyallahu &amp;lsquo;anha meminta izin untuk bisa beri&amp;rsquo;tikaf bersama beliau, maka beliau mengizinkannya&lt;/em&gt;.&amp;rdquo; - HR. Bukhari no. 2041.&lt;/p&gt;\r\n\r\n&lt;p&gt;Namun para ulama madzhab menganjurkan untuk memasuki masjid menjelang matahari tenggelam pada hari ke-20 Ramadhan. Mereka mengatakan bahwa yang namanya 10 hari yang dimaksudkan adalah jumlah bilangan malam sehingga seharusnya dimulai dari awal malam.&lt;/p&gt;\r\n', '2017-06-06 07:52:46'),
(21, 'Adab I\'tikaf', 'Adab-Itikaf', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;ADAB I&amp;rsquo;TIKAF&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Hendaknya ketika beri&amp;rsquo;tikaf, seseorang menyibukkan diri dengan melakukan ketaatan seperti berdo&amp;rsquo;a, dzikir, bershalawat pada Nabi, mengkaji Al Qur&amp;rsquo;an dan mengkaji hadits. Dan dimakruhkan menyibukkan diri dengan perkataan dan perbuatan yang tidak bermanfaat. - I&amp;rsquo;tikaf di Shahih Fiqh Sunnah, 2/150-158.&lt;/p&gt;\r\n\r\n&lt;p&gt;Maka di antara adab-adab beri&amp;rsquo;tikaf yang perlu diperhatikan dan dilaksanakan adalah:&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Menghadirkan niat yang sholih, dan mengharap ganjaran dari Allah SWT.&lt;/li&gt;\r\n	&lt;li&gt;Merasakan hikmah dari i&amp;rsquo;tikaf, yaitu ia berputus sementara dari segala keduniaan untuk beribadah.&lt;/li&gt;\r\n	&lt;li&gt;Seorang yang i&amp;rsquo;tikaf tidak keluar dari masjid, kecuali hanya untuk memenuhi hajat yang mesti ia laksanakan.&lt;/li&gt;\r\n	&lt;li&gt;Tetap menjaga amaliyah ibadah pagi dan sore, seperti zikir pagi dan sore, sholat sunat dhuha, sunat rawatib, sholat qiyamullail, sholat sunat wudhu, zikir setelah sholat dan juga menjawab azan.&lt;/li&gt;\r\n	&lt;li&gt;Berupaya sungguh-sungguh untuk dapat bangun sebelum waktu sholat dengan waktu yang cukup untuk mempersiapkan sholat, sehingga dapat melaksanakan sholat lima waktu dengan khusyuk dan tenang, bukan justru malah terlambat, apalagi ia sudah beri&amp;rsquo;tikaf di masjid.&lt;/li&gt;\r\n	&lt;li&gt;Memperbanyak amalan sunat dengan melakukan berbagaimacam ibadah seperti membaca Al-Quran, membaca tasbih, memperbanyak membaca tahlil, tahmid, takbir, istighfar, membaca sholawat kepada baginda Rosulullah, mentadaburi Al-Quran, membaca terjemahannya, membaca hadits-hadits nabi dan membaca sirohnya. Sehingga waktu yang ada tidak membuat bosan hanya dengan tidur dan bersenda gurau dengan sesama saudara yang sedang beri&amp;rsquo;tikaf.&lt;/li&gt;\r\n	&lt;li&gt;Sedikit makan, minum dan tidur dengan tujuan untuk melembutkan hati dan melatih kekhusyuan hati serta tidak membuang waktu sia-sia.&lt;br /&gt;\r\n	Kedepalan: Selalu menjaga kebersihan dan kesucian diri dan tempat i&amp;rsquo;tikaf dengan selalu menjaga wudhu. Saling menasehati dalam kebenaran dan kesabaran. Secara ringkasnya adalah menerapkan sunah dalam kehidupan sehari-hari.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;HAL-HAL YANG PERLU DIHINDARI KETIKA I&amp;rsquo;TIKAF&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Banyak membuang waktu dengan hal-hal yang sia-sia bahkan tidak ada hubungannya dengan ibadah i&amp;rsquo;tikaf, seperti banyak bersenda gurau, bercerita dan sebagainya.&lt;/li&gt;\r\n	&lt;li&gt;Berlebihan dalam makan dan minum ketika i&amp;rsquo;tikaf. Karena i&amp;rsquo;tikaf adalah sarana untuk melatih hati dan diri untuk khusyu&amp;rsquo; beribadah, maka makan dan minum yang berlebihan akan membuat berat beribadah dan bahkan menjadi malas ibadah, dan masjid hanya menjadi tempat pindah makan belaka.&lt;/li&gt;\r\n	&lt;li&gt;Tidur berlebihan, bahkan memarahi orang yang membangunkannya untuk sholat dan tilawah Al-Quran. Ini perlu menjadi perhatian, kerena waktu yang sepuluh hari sangatlah sedikit jika hanya digunakan untuk tempat pindah tidur, padahal dengan mengikuti i&amp;rsquo;tikaf adalah melatih diri untuk menggunakan waktu di masjid dengan ibadah.&lt;/li&gt;\r\n	&lt;li&gt;Sebagian kaum muslimin mengajak anak-anak mereka untuk juga beri&amp;rsquo;tikaf, namun perlu memperhatikan agar anak-anak tidak mengganggu ketenangan dan kekhusyu&amp;rsquo;an peserta i&amp;rsquo;tikaf lainya.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n', '2017-06-06 08:02:57'),
(22, 'Sifat I\'tikaf Nabi', 'Sifat-Itikaf-Nabi', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;SIFAT I&amp;#39;TIKAF NABI&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Sudahkah anda berniat untuk tidak melewatkan kesempatan emas 10 hari terakhir di bulan Ramdhan dengan menyampaikan seluruh pengharapan dan doa (bermunajat)&amp;nbsp; dan ibadah sepenuh hati&amp;nbsp; ber-i&amp;rsquo;tikaf di masjid.&amp;nbsp; Sebelum ber&amp;rsquo;itikaf mari kita simak kembali beberapa penjelasan dari &amp;nbsp;Kitab Bulughul Maram oleh Al Hafizh IBn Hajar Al Asqalany dan syarahnya oeleh Syaikh Shafiyyurahman Al Mubarakfurry&lt;/p&gt;\r\n\r\n&lt;p&gt;*Diriwayatkan Abu Hurairah r.a. bahwa Rasulullah SAW bersabda :&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&lt;em&gt;&amp;ldquo;Barangsiapa melaksanakan Qiyam Ramadhan dengan dasar keimanan dan hanya mengharapkan pahala dari Allah, niscaya diampuni dosanya yang telah lalu&lt;/em&gt;&amp;nbsp;&lt;/strong&gt;(Muttafaq Alaihi)&lt;/p&gt;\r\n\r\n&lt;p&gt;Menurut bahasa, I&amp;rsquo;tikaaf ialah menahan, berdiam dan menetap. Sedangkan menurut syariat, I&amp;rsquo;tikaaf ialah berdiamnya seseorang di masjid dengan sifat tertentu. Sementara yang dimaksud dengan qiyam Ramadhan ibadah pada malam harinya, baik shalat maupun membaca Al Qur&amp;rsquo;an. Qiyam Ramadhan pada umumnya dipergunakan untuk menyebut shalat Tarawih.&amp;nbsp; Sabdanya,&amp;nbsp;&lt;strong&gt;karena iman&lt;/strong&gt;&amp;nbsp;yakni membenarkan janji Allah berupa pahala, bermakna bahwa ia beribadah karena keimanannya. Yakni keimanannyalah yang mendorongnya untuk melakukan qiyam, bukan sesuatu yang lain. Ini mengisyaratkan keikhlasan niatnya dari kotoran riya. &amp;ldquo; dan&amp;nbsp;&lt;strong&gt;ihtisab&lt;/strong&gt;&amp;rdquo; yakni mencari wajah Allah dan pahalanya.&lt;/p&gt;\r\n\r\n&lt;p&gt;Diriwayatkan dari Aisyah r.a. , ia berkata,&amp;rdquo;&amp;nbsp;&lt;em&gt;Apabila telah masuk hari kesepuluh, yakni sepuluh hari terakhir dari bulan Ramadhan, Rasulullah SAW mengencangkan kain sarungnya dan menghidupkan malam-malam tersebut serta membangunkan istri-istrinya (Muttafaq Alaihi)&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Sabdanya&amp;nbsp;&lt;strong&gt;mengencangkan kain sarungnya&lt;/strong&gt;, ini adalah kinayah tentang tekun beribadah, mencurahkan waktu untuknya dan bersungguh-sungguh di dalamya. Ada yang berpendapat, yang dimaksud dengannya ialah menjauhi wanita untuk menyibukkan diri dengan peribadatan. &amp;ldquo;&lt;strong&gt;&amp;nbsp;Menghidupkan malamnya&amp;rdquo;&lt;/strong&gt;&amp;nbsp;yakni menghidupkan seluruh malam dengan begadang untuk melakukan shalat dan selainnya, atau menghidupkan sebagian besarnya&amp;rdquo;&amp;nbsp;&lt;strong&gt;dan membangunkan keluarganya&lt;/strong&gt;&amp;rdquo; yakni membangunkan mereka dari tidur untuk beribadah dan shalat.&lt;/p&gt;\r\n\r\n&lt;p&gt;*Diriwayatkan dari Aisyah r.a. , ia berkata,&amp;rdquo;&lt;strong&gt;&amp;nbsp;&lt;em&gt;Jika Nabi SAW ingin melakukan I&amp;rsquo;tikaf, beliau mengerjakan shalat Shubuh, baru kemudian masuk ke tempat I&amp;rsquo;tikafnya&lt;/em&gt;&lt;/strong&gt;&lt;em&gt;&amp;nbsp;(Muttafaq Alaihi)&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Pernyataannya, &amp;ldquo;shalat Shubuh&amp;rdquo; yakni pada pagi 21 Ramadhan. Maksudnya beliau terfokus dan menyepi di dalamnya setekah shalat shubuh. Bukan berarti bahwa itu dimulainya waktu I&amp;rsquo;tikaf. Bahkan waktu I&amp;rsquo;tikaf dimulai sebelum maghrib pada&amp;nbsp;Malam ke 21 dalam keadan beri&amp;rsquo;tikaf lagi berdiam di masjid secara umum. Ketika setelah selesai shalat Subuh beliau menyendiri. Hal ini sebagaimana dikatakan oleh Imam An Nawawi. Takwil ini harus dilakukan untuk mengkompromikan antara hadits ini dengan hadits-hadits yang menunjukkan bahwa Nabi beri&amp;rsquo;tikaf pada sepuluh malam terakhir bulan Ramadhan, sebagaimana hadits ini.&lt;/p&gt;\r\n\r\n&lt;p&gt;*Diriwayatkan dari Aisyah r.a. , ia berkata,&lt;strong&gt;&amp;rdquo;&lt;em&gt;&amp;nbsp;Rasulullah saw pernah memasukkan kepalanya ke kamarku dan aku menyisir rambutnya. Dan jika sedang I&amp;rsquo;tikaf beliau tidak masuk rumah kecuali jika ada keperluan.&amp;rdquo;&amp;nbsp;&lt;/em&gt;&lt;/strong&gt;(muttafaq Alaihi)&lt;/p&gt;\r\n\r\n&lt;p&gt;Maksudnya menggunakan sisir di rambut kepala, maksudnya aku menyisirnya dan meminyakinya. Di dalamnya terdapat dalil bahwa mengeluarkan sebagian tubuh orang yang beri&amp;rsquo;tikaf di Masjid itu tidak membatalkan I&amp;rsquo;tikaf , dan hadits ini juga terdapat dalil tentang bolehnya laki-laki menjadikan istri sebagai pelayannya. &amp;ldquo;kecuali jika ada keperluan&amp;rdquo; seperti kencing, buang air besar , muntah, mandi jinabat, buang ingus dan selainnya yang tidak mungkin dilakukan di masjid.&lt;/p&gt;\r\n\r\n&lt;p&gt;*Diriwayatkan beliau pula , ia berkata,&lt;strong&gt;&lt;em&gt;&amp;rdquo; Sunnah bagi orang yang ber-I&amp;rsquo;tikaf untuk tidak menjenguk orang sakit, tidak menyaksikan jenazah, tidak menyentuh wanita dan tidak mencumbunya . Tidak keluar untuk suatu kepentingan kecuali jika memang harus . Tidak sah I&amp;rsquo;tikaf kecuali jika dibarengi dengan puasa dan tidak sah I&amp;rsquo;tikaf kecuali didalam masjid Jami.&amp;rdquo;&lt;/em&gt;&lt;/strong&gt;&lt;em&gt;&amp;nbsp;&lt;/em&gt;(Hr Abu Dawud, Perawi-perawinya bAik, hanya saja yang kuat bahwa perkataan yang terakhir hukumnya mauquf)&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;ldquo;&lt;em&gt;Dan tidak sah I&amp;rsquo;tikaf kecuali dibarengi dengan puasa&lt;/em&gt;.&amp;rdquo; Mengenai hal ini terdapat perselisihan yang besar, dan dalil-dalil menunjukkan bahwa itu tidak disyaratkan.&amp;nbsp;&lt;em&gt;&amp;ldquo;Masjid jami&lt;/em&gt;&amp;nbsp;&amp;lsquo; yaitu masjid yang diselenggarakan di dalamnya shalat-shalat. &amp;ldquo;hanya saja pendapat yang kuat bahwa bahwa perkataan yang terakhir hukumnya mauquf,&amp;rdquo;yakni dari ucapannya &amp;ldquo; dan tidak sah I&amp;rsquo;tikaf kecuali dibarengi dengan puasa.&amp;rdquo; Ad daruquthni menegaskan bahwa kadar hadits Aisyah adalah sampai lafadz &amp;ldquo; Dan tidak keluar untuk suatu kepentingan&amp;rdquo; sementara selain lafadz itu adalah dari perawi lain.&amp;rdquo; Demkian dari Fathul Bari&lt;/p&gt;\r\n\r\n&lt;p&gt;*Diriwayatkan dari Ibnu Umar bahwa r.a. bahwa &amp;nbsp;beberapa orang shahabat Nabi &amp;nbsp;SAW bermimpi melihat malam Lailatul qadr pada tujuh hari terakhir. Maka Rasulullah SAW bersabda,&amp;rdquo;&lt;strong&gt;&lt;em&gt;&amp;nbsp;Menurut dugaanku, kalian bermimpi pada tujuh hari terakhir. Barang siapa ingin mencari malam tersebut, maka carilah pada tujuh malam terakhir&lt;/em&gt;&lt;/strong&gt;&amp;nbsp;(Muttafaq Alaihi)&lt;/p&gt;\r\n\r\n&lt;p&gt;Pernyataannya, &amp;ldquo;pada tujuh malam yang terakhir&amp;rdquo; yakni pada&amp;nbsp; tujuh malam yang tersisa dari akhir Ramadhan. Dengan demikian permulaannya adalah malam 23.Para ulama berbeda pendapat dalam menentukan malam tersebut&amp;hellip;&amp;rdquo; dan pendapat yang paling sahih dan paling kuat dalilnya bahwa ia terdapat pada bilangan ganjil dari sepuluh malam yang terakhir dan berpindah-pindah. Terkadang pada malam 21, terkadang pada malam 23, terkadang malam 25, terkadang malam 27 dan terkadang malam 27. Adapun riwayat yang menyebutkan penentuan sebagian malam secara pasti, dan sebagaimana dalam hadits-hadits lainnya bahwa ia &amp;nbsp;adalah malam 21 atau malam 23, maka ini memang demikian pada tahun tertentu.&amp;nbsp; Bukan berarti bahwa ia demikian seterusnya hingga akhir masa . Tetapi ada yang menyangka bahwa ia memang demikian hingga selamanya, sehingga terjadilah perselisihan yang tajam karenanya.&lt;/p&gt;\r\n\r\n&lt;p&gt;*Diriwayatkan dari Aisyah r.a. , ia berkata :&lt;em&gt;&amp;nbsp;&lt;strong&gt;Aku katakan wahai Rasulullah, apa yang harus aku ucapkan jika aku mengetahui malam lailatul Qadr itu? Beliau menjawab,&amp;rdquo; Ucapkanlah Allahuma innaka afuwwun tuhibbul Afwa fa&amp;rsquo;fu annii&lt;/strong&gt;&lt;/em&gt;&lt;strong&gt;&amp;nbsp;(Ya Allah sensungguhnya Engkau Maha pemaaf ,&amp;nbsp; suka memaafkan maka&amp;nbsp; maafkanlah aku&amp;nbsp;&lt;/strong&gt;). Hadits diriwayatkan oleh lima imam selain Abu Dawud dam dishahihkan oleh At Tirmidzi dan Al Hakim&lt;/p&gt;\r\n', '2017-06-07 04:16:10'),
(23, 'I\'tikaf 10 Hari Akhir', 'Itikaf-10-Hari-Akhir', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;I&amp;#39;TIKAF 10 HARI AKHIR RAMADHAN&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Ibadah i&amp;rsquo;tikaf bertujuan mulia yaitu untuk menggapai malam lailatul qadar yang punya keutamaan ibadah yang dilakukan lebih baik daripada 1000 bulan. Di antara tujuan i&amp;rsquo;tikaf adalah untuk menggapai malam tersebut. Dan yang paling utama bila i&amp;rsquo;tikaf dilakukan di sepuluh hari terakhir dari bulan Ramadhan. Mudah-mudahan kita diberikan jalan untuk melakukan ibadah i&amp;rsquo;tikaf tersebut demi mencontoh sunnah Nabi kita &amp;ndash;&lt;em&gt;shallallahu &amp;lsquo;alaihi wa sallam&lt;/em&gt;-.&lt;/p&gt;\r\n\r\n&lt;p&gt;Ada hadits yang disebutkan oleh Ibnu Hajar Al Asqolani dalam kitab beliau Bulughul Marom, yaitu hadits no. 699 tentang permasalahan i&amp;rsquo;tikaf.&lt;/p&gt;\r\n\r\n&lt;p&gt;Dari &amp;lsquo;Aisyah&amp;nbsp;&lt;em&gt;radhiyallahu &amp;lsquo;anha&lt;/em&gt;, ia berkata bahwasanya Nabi&amp;nbsp;&lt;em&gt;shallallahu &amp;lsquo;alaihi wa sallam&lt;/em&gt;&amp;nbsp;biasa beri&amp;rsquo;tikaf di sepuluh hari terakhir dari bulan Ramadhan hingga beliau diwafatkan oleh Allah. Lalu istri-istri beliau beri&amp;rsquo;tikaf setelah beliau wafat.&amp;nbsp;&lt;em&gt;Muttafaqun &amp;lsquo;alaih.&lt;/em&gt;&amp;nbsp;(HR. Bukhari no. 2026 dan Muslim no. 1172).&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Beberapa faedah dari hadits di atas:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Hadits di atas sebagai dalil mengenai anjuran i&amp;rsquo;tikaf di sepuluh hari terakhir dari bulan Ramadhan. Nabi&amp;nbsp;&lt;em&gt;shallallahu &amp;lsquo;alaihi wa sallam&lt;/em&gt;&amp;nbsp;terus merutinkan hal itu hingga beliau meninggal dunia.&lt;/li&gt;\r\n	&lt;li&gt;Hikmah dikhususkan sepuluh hari terakhir dengan i&amp;rsquo;tikaf dapat dilihat pada hadits Abu Sa&amp;rsquo;id Al Khudri di mana Nabi&amp;nbsp;&lt;em&gt;shallallahu &amp;lsquo;alaihi wa sallam&lt;/em&gt;&amp;nbsp;bersabda, &amp;ldquo;&lt;em&gt;Aku pernah melakukan i&amp;rsquo;tikaf pada sepuluh hari Ramadhan yang pertama. Aku berkeinginan mencari malam lailatul qadar pada malam tersebut. Kemudian aku beri&amp;rsquo;tikaf di pertengahan bulan, aku datang dan ada yang mengatakan padaku bahwa lailatul qadar itu di sepuluh hari yang terakhir. Siapa saja yang ingin beri&amp;rsquo;tikaf di antara kalian, maka beri&amp;rsquo;tikaflah&lt;/em&gt;.&amp;rdquo; Lalu di antara para sahabat ada yang beri&amp;rsquo;tikaf bersama beliau. (HR. Bukhari no. 2018 dan Muslim no. 1167).&lt;/li&gt;\r\n	&lt;li&gt;Jadi, beliau &amp;ndash;&lt;em&gt;shallallahu &amp;lsquo;alaihi wa sallam&lt;/em&gt;&amp;ndash; melakukan i&amp;rsquo;tikaf supaya mudah mendapatkan malam lailatul qadar.&lt;/li&gt;\r\n	&lt;li&gt;I&amp;rsquo;tikaf itu disyari&amp;rsquo;atkan setiap waktu, namun lebih ditekankan lagi di bulan Ramadhan, lebih-lebih lagi di sepuluh hari terakhir dari bulan suci tersebut.&lt;/li&gt;\r\n	&lt;li&gt;Hukum i&amp;rsquo;tikaf masih tetap berlaku dan tidak terhapus, juga bukan khusus untuk Nabi&amp;nbsp;&lt;em&gt;shallallahu &amp;lsquo;alaihi wa sallam&lt;/em&gt;. Karena istri-istri beliau pun beri&amp;rsquo;tikaf setelah beliau &amp;ndash;&lt;em&gt;shallallahu &amp;lsquo;alaihi wa sallam&lt;/em&gt;&amp;ndash; wafat.&lt;/li&gt;\r\n	&lt;li&gt;Dibolehkannya i&amp;rsquo;tikaf bagi wanita. Jumhur atau mayoritas ulama mengatakan bahwa disunnahkan bagi para wanita untuk beri&amp;rsquo;tikaf sebagaimana kaum pria. Namun dengan syarat, (1) i&amp;rsquo;tikaf tersebut dilakukan dalam keadaan suci -bagi ulama yang mensyaratkan masuk masjid harus suci dari haidh-, (2) harus bebas dari menimbulkan fitnah (godaan bagi pria), dan (3) diizinkan oleh suami.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Kenapa harus diizinkan oleh suami? Karena Nabi&amp;nbsp;&lt;em&gt;shallallahu &amp;lsquo;alaihi wa sallam&lt;/em&gt;&amp;nbsp;bersabda,&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;ldquo;&lt;em&gt;Tidak boleh seorang wanita berpuasa sedangkan suaminya ketika itu ada kecuali dengan izinnya&lt;/em&gt;&amp;rdquo; (HR. Bukhari no. 5195). I&amp;rsquo;tikaf lebih dari pada itu,&amp;nbsp;&lt;em&gt;wallahu a&amp;rsquo;lam&lt;/em&gt;.&lt;/p&gt;\r\n\r\n&lt;p&gt;Semoga Allah memberi taufik pada kita untuk menghidupkan hari-hari terakhir bulan Ramadhan dengan ibadah i&amp;rsquo;tikaf.&amp;nbsp;&lt;em&gt;Hanya Allah yang memberi taufik dan petunjuk&lt;/em&gt;.&lt;/p&gt;\r\n\r\n&lt;p&gt;Referensi:&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;em&gt;Minhatul &amp;lsquo;Allam fii Syarh Bulughil Marom&lt;/em&gt;, Syaikh &amp;lsquo;Abdullah bin Sholih Al Fauzan, terbitan Dar Ibnul Jauzi, cetakan ketiga, tahun 1432 H, 5: 129-130.&lt;/p&gt;\r\n', '2017-06-07 04:13:29'),
(24, 'Adab Masjid', 'Adab-Masjid', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;ADAB KETIKA DI MASJID&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&lt;strong&gt;Keutamaan membangun masjid&lt;/strong&gt; adalah Allah akan membangun sebuah rumah di surga bagi orang yang membangun masjid.&lt;/li&gt;\r\n	&lt;li&gt;Para ulama mengatakan tentang &lt;strong&gt;batasan masjid&lt;/strong&gt;, yaitu tempat yang ada di dalam tembok masjid dan pintu mesjid bagian dalam adalah masjid.&lt;/li&gt;\r\n	&lt;li&gt;Dikatakan bahwa firman Allah yang mengatakan:&amp;nbsp;Dan &amp;nbsp;sesungguhnya &amp;nbsp;masjid-masjid &amp;nbsp;itu &amp;nbsp;adalah &amp;nbsp;kepunyaan &amp;nbsp;Allah. &lt;strong&gt;Maka janganlah kamu menyembah seseorangpun di dalamnya di samping (menyembah) Allah&amp;quot;&lt;/strong&gt;.(QS. Al-Jin:18) -&amp;nbsp;Maka &amp;nbsp;tidak &amp;nbsp;boleh menisbatkan masjid kepada seseorang mahluk dengan nisbat kepemilikan dan kekhususan, adapun penisbatan&amp;nbsp;masjid dengan nama agar dikenal, maka hal itu tidak apa-apa dan tidak termasuk dalam larangan tersebut; Nabi menisbatkan mesjidnya kepada dirinya, seperti yang diterangkan&amp;nbsp;di dalam sebuah&amp;nbsp;sabdanya : &amp;quot;(masjidku ini), begitu juga beliau menisbatkan masjid quba&amp;#39; kepadanya, yaitu quba&amp;#39;, dan masjid baitul maqdis dinisbatkan kepada Iliya&amp;#39;, apa yang telah disebutkan adalah penisbatan nama mesjid kepada selain Allah agar mudah dikenal, semua ini tidak termasuk di dalam larangan di atas -&amp;nbsp;Fathl Bari, Ibnu Rajab (2/261).&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Orang yang makan bawang putih dan merah harus menjauhi mesjid,&lt;/strong&gt; berdasarkan hadits Jabir radhiallahu anhu bahwa Nabi bersabda : &amp;#39;Barangsiapa yang makan bawang putih atau bawang merah maka hendaklah menjauhi kita&amp;quot; Atau bersabda &amp;quot;Maka&amp;nbsp;hendaklah dia menjauhi masjid kami dan hendaklah dia duduk di rumahnya&amp;quot; - HR.Bukhari no:855.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Dikiaskan kepada bawang merah atau bawang putih segala sesuatu yang berbau busuk&lt;/strong&gt; yang bisa menyakiti orang yang shalat, namun jika seseorang memakai sesuatu yang bisa mencegah bau yang tidak sedap tersebut dari dirinya seperti memakai pasta gigi dan lainnya, maka tidak ada larangan baginya setelah itu untuk menghadiri mesjid.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Dianjurkan agar segera bergegas menuju masjid&lt;/strong&gt;, berdasarkan sabda Rasulullah: &amp;quot;Seandainya mereka mengetahui&amp;nbsp;keutamaan&amp;nbsp;shaf&amp;nbsp;pertama, niscaya akan diadakan undian untuk mendapatkannya&amp;quot;. -&amp;nbsp;HR. Bukahri no :615. Muslim no:437&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Dianjurkan berjalan menuju shalat dengan khusyu&amp;#39;, tenang dan tentram&lt;/strong&gt;. Nabi telah melarang umatnya berjalan menuju shalat secara tergesa-gesa walaupun shalat sudah didirikan. Abi Qotadah radhiallahu anhu berkata: Pada saat kami sedang shalat bersama Nabi tiba-tiba beliau mendengar suara kegaduhan beberapa orang. Sesudah menunaikan shalat beliau mengingatkan:&amp;nbsp;&amp;quot;Apa yang terjadi pada kalian?&amp;quot;. Mereka menjawab: &amp;quot;Kami tergesa- gesa menuju shalat&amp;quot;. Rasulullah menegur mereka: &amp;quot;Janganlah kalian lakukan, apabila kalian mendatangi shalat maka hendaklah berjalan dengan tenang, dan rekaat yang kalian dapatkan shalatlah padanya!, dan rekaat yang terlewat sempurnakanlah!&amp;quot; -&amp;nbsp;HR. Bukhari no: 635 dan Muslim no: 437.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Saat berjalan menuju shalat hendaklah berdo&amp;#39;a dengan mengucapkan:&amp;nbsp;&lt;/strong&gt;&amp;quot;Ya Allah, jadikanlah di dalam hatiku cahaya, dan jadikanlah di dalam lisanku cahaya, dan jadikanlah pada pendengaranku cahaya, dan jadikanlah pada penglihatanku cahaya, dan jadikanlah di sebelah belakangku cahaya dan di hadapanku cahaya, dan jadikanlah di atasku cahaya dan di bawahku cahaya. Ya Allah, agungkanlah cahayaku!&amp;quot; -&amp;nbsp;HR. Muslim no: 763.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Memasuki masjid dengan mendahulukan kaki kanan&lt;/strong&gt; dan berdo&amp;#39;a dengan&amp;nbsp;mengucapkan&amp;nbsp;&amp;nbsp;&amp;quot;Ya Allah curahkanlah shalawat dan salam kepada Muhammad dan keluarga Muhammad. Ya Allah bukakanlah pintu rahmatmu bagiku&amp;quot;.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Mendahulukan &amp;nbsp;kaki &amp;nbsp;kiri &amp;nbsp;saat &amp;nbsp;keluar &amp;nbsp;dari &amp;nbsp;mesjid &amp;nbsp;&lt;/strong&gt;dan &amp;nbsp;berdo&amp;#39;a dengan mengucapkan:&amp;nbsp;&amp;quot;Ya Allah curahkanlah shalawat dan salam kepada Muhammad dan keluarga Muhammad. Ya Allah limpahkanlah karuniaMu kepadaku&amp;quot;.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Menunaikan shalat tahiyatul masjid saat memasuki sebuah mesjid&lt;/strong&gt;. Berdasarkan hadits riwayat Abi Qotadah Al-Sulami bahwa Rasulullah bersabda:&amp;nbsp;&amp;quot;Apabila salah seorang di antara kalian memasuki masjid maka hendaklah dia shalat dua rekakat sebelum duduk&amp;quot; -&amp;nbsp;HR. Bukhari no: 444. Muslim no: 714.&amp;nbsp;Dan di antara kesalahan yang sering terjadi adalah ditinggalkannya shalat tahiyyatul masjid hanya karena waktu tersebut adalah waktu dilarang mengerjakan shalat sunnah.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Terdapat keutamaan yang besar bagi seorang yang duduk-duduk di masjid untuk menunggu shalat&lt;/strong&gt;, berdasarkan sabda Rasulullah Apabila seseorang memasuki masjid, maka dia dihitung berada dalam shalat selama shalat tersebut yang menahannya (di dalam masjid), dan para malaikat berdo&amp;#39;a kepada salah seorang di antara kalian selama dia berada pada tempat shalatnya, Mereka mengatakan: &amp;quot;Ya Allah, curahkanlah rahmat kepadanya, ya Allah ampunilah dirinya selama dia tidak menyakiti orang lain dan tidak berhadats&amp;quot; -&amp;nbsp;HR. Bukhari no:176, Muslim no: 649.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Terdapat larangan melingkar di dalam masjid (untuk berkumpul) demi kepantingan dunia semata.&lt;/strong&gt; Rasulullah bersabda:&amp;nbsp;&amp;quot;Akan datang suatu masa kepada sekelompok orang, di mana mereka melingkar di dalam mesjid untuk berkumpul dan mereka tidak mempunyai kepentingan kecuali dunia dan tidak ada bagi kepentingan apapun pada mereka maka janganlah duduk bersama mereka&amp;quot;.-&amp;nbsp;HR. Al-Hakim dalam kitab AL-Mustadrok 4/359&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Disunnahkan untuk menjaga masjid dari kegaduhan&lt;/strong&gt; dan memperbanyak pembicaraan yang sia-sia serta mengangkat suara dengan sesuatu yang dibenci -&amp;nbsp;Al-Adabus Syar&amp;#39;iyah 3/376.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Dibolehkan berbaring di mesjid.&lt;/strong&gt; Dari Abdullah bin Zaid radhiallahu anhu bahwa dia melihat Rasulullah berbaring di mesjid sambil meletakkan salah satu kaki beliau di atas yang lainnya.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Dibolehkan menjulurkan kaki ke arah kiblat,&lt;/strong&gt; dan menghindari untuk mejulurkan kaki ke arah mushaf demi meghormati kalam Allah dan untuk mengagungkannya -&amp;nbsp;Fatawa lajnah daimah lil buhutsil ilmiyah wal ifta&amp;#39; no: 5795.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Diperbolehkan tidur di mesjid,&lt;/strong&gt; seperti yang dilakukan oleh Ahlis Shuffah di mana mereka tidur di mesjid12, dan apabila bermimpi sampai keluar mani maka dia harus segera keluar mesjid untuk mandi janabah13dan Ibnu Umar pada masa dirinya masih muda dan membujang tanpa keluarga, dia tidur di masjid di masjid Rasulullah -&amp;nbsp;HR. Bukahri&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Larangan berjual beli di mesjid &lt;/strong&gt;berdasarkan sabda Rasulullah ;&amp;nbsp;&amp;quot;Jika kalian melihat orang yang berjual beli di mesjid maka ucapkanlah: Semoga Allah tidak memberikan laba bagi jual belimu&amp;quot; - HR. Turmudzi no: 1321 Dan di antara kesalahan yang sering terjadi adalah menaruh iklan jual beli di dalam mesjid.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Dilarang mengumumkan barang yang hilang di mesjid&lt;/strong&gt;, berdasarkan sabda Rasulullah :&amp;nbsp;&amp;quot;Barangsiapa mendengar seseorang &amp;nbsp;yang &amp;nbsp;mengumumkan barangnya yang hilang di mesjid maka katakanlah kepadanya: Semoga Allah tidak mengembalikannya kepadamu karena sesungguhnya mesjid itu tidak dibangun untuk kepentingan ini&amp;quot; -&amp;nbsp;HR. Muslim no: 568.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Boleh mengangkat suara di dalam mesjid &lt;/strong&gt;untuk kepentingan ilmu dan kebaikan adapun mengangkat suara untuk membuat suasana menjadi gaduh atau yang lainnya tidak diperbolehkan.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Dibolehkan meminta-minta&lt;/strong&gt; jika dibutuhkan.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Dilarang memasukkan antara jari-jari saat keluar menuju masjid sebelum melaksanakan shalat&lt;/strong&gt;, diriwayatkan dari Ka&amp;#39;ab bin Ajroh bahwa Rasulullah bersabda:&amp;nbsp;&amp;quot;Apabila salah seorang di antara kalian berwudhu&amp;#39; dan menyempurnakan wudhu&amp;#39;nya kemudian dia keluar menuju shalat secara sengaja maka janganlah dia memasukkan antara jari- jarinya sebab dia sedang berada dalam kondisi shalat&amp;quot; -&amp;nbsp;HR. Abu Dawud no: 526&amp;nbsp; Dan boleh memasukkan jari-jari tangan sesudah melaksanakan shalat.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Boleh makan dan minum di mesjid&lt;/strong&gt;, berdasarkan hadits Abdullah bin Al-Harits bin Juz&amp;#39;u Al-Zubaidi, dia menceritakan bahwa kami makan pada masa Rasulullah ;&amp;#39;I roti dan daging di dalam mesjid -&amp;nbsp;HR. Ibnu Majah no 2300&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Boleh menyenandungkan puisi yang diperbolehkan di dalam mesjid&lt;/strong&gt;, sesungguhnya Hassan bin Tsabit radhiallahu anhu menyenandungkan puisi di mesjid di hadapan Rasulullah -&amp;nbsp;HR. Bukhari no: 3212&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Boleh main tombak atau sejenisnya di mesjid&lt;/strong&gt;, dari Aisyah radhiallahu anha berkata: &amp;quot;Suatu hari aku melihat Rasulullah berdiri di pintu kamarku sementara orang-orang Habsy bermain- main di mesjid dan Rasulullah menutupi aku dengan selendangnya saat aku menyaksikan permainan mereka&amp;quot; -&amp;nbsp;HR. Bukahri no: 455&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Dilarang keluar dari mesjid setelah dikumandangkannya adzan kecuali karena udzur, &lt;/strong&gt;berdasarkan hadits riwayat Abi Sya&amp;#39;tsa&amp;#39; bahwa dia berkata: &amp;quot;Kami sedang duduk-duduk dengan Abu Hurairah radhiallahu anhu di dalam mesjid lalu seorang mu&amp;#39;adzin mengumandangkan adzan lalu seorang lelaki bangkit keluar dari mesjid, maka Abu Hurairah radhiallahu anhu mengatakan: &amp;quot;Adapun orang ini maka ia telah menyalahi tuntunan Abul Qosim&amp;quot; -&amp;nbsp;HR. Muslim no:655&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Di antara kesalahan yang terjadi di mesjid adalah menghiasi mesjid dan memahatnya&lt;/strong&gt;, berdasarkan hadist Rasulullah &amp;quot;Apabila kalian telah memperindah mesjid kalian dan menghiasi mushaf-mushafmu maka kehancuran telah menimpa kalian&amp;quot;. Dalam riwayat lain disebutkan Rasulullah bersabda: &amp;quot;Tidak akan terjadi hari kiamat sampai manusia berlomba-lomba di dalam (memperindah) mesjid&amp;quot; -&amp;nbsp;Shahih Abu Dawud no: 475&lt;/li&gt;\r\n	&lt;li&gt;Di antara kesalahan yang sering terjadi&amp;nbsp;adalah&amp;nbsp;shalat di atas hamparan yang diperindah.&lt;/li&gt;\r\n	&lt;li&gt;Di antara kesalahan yang juga sering terjadi adalah &lt;strong&gt;menjadikan mesjid sebagai jalanan untuk lewat,&lt;/strong&gt; berdasarkan sabda Rasulullah&amp;nbsp;&amp;quot;Janganlah engkau menjadikan mesjid sebagai jalan untuk lewat kecuali untuk berdzikir dan menunaikan shalat&amp;quot; -&amp;nbsp;Al-Silsilah Al-Shahihah no: 1001&lt;/li&gt;\r\n	&lt;li&gt;Di antara kesalahan yang terjadi adalah &lt;strong&gt;menjadikan suara jam (di dalam mesjid) seperti suara lonceng&lt;/strong&gt; yang selalu berbunyi secara teratur seperti bunyi lonceng orang-orang Nashrani.&lt;/li&gt;\r\n	&lt;li&gt;Di antara kesalahan yang sering terjadi, &lt;strong&gt;membaca ayat secara nyaring di masjid &lt;/strong&gt;sehingga mengganggu shalat dan bacaan orang lain.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Sungguh Rasulullah telah melarang orang-orang yang melingkar dalam berkumpu&lt;/strong&gt;l untuk membuat kelompok di dalam masjid karena mereka juga akan keluar dari masjid dengan berkelompok-kelompok mereka masing-masing. Dari Jabir bin Samuroh, dia berkata: Rasulullah memasuki masjid pada saat adanya kelompok-kelompok sedang berkumpul di dalam mesjid. Lalu Rasulullah ;&amp;#39;Imenegur mereka: &amp;quot;Kenapa saya melihat kalian berkelompok-kelompok?&amp;quot; -&amp;nbsp;HR. Muslim no: 407.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Di antara pelanggaran yang sering terjadi meludah di mesjid. &lt;/strong&gt;Rasulullah berdasarkan sabda:&amp;nbsp;&amp;quot;Meludah di mesjid adalah kesalahan dan penghapusnya adalah dengan cara menimbunnya&amp;quot; -&amp;nbsp;Muttafaq Alaihi&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Termasuk sunnah shalat dengan memakai sandal di mesjid.&lt;/strong&gt; Anas bin Malik pernah ditanya: Apakah Rasulullah shalat dengan&amp;nbsp;memakai kedua sandalnya?. Dia menjawab: &amp;quot;Ya&amp;quot; -&amp;nbsp;HR. Bukhari no: 386, Muslim no:255.&amp;nbsp;Dan apabila seseorang memasuki mesjid lalu melepas kedua sandalnya dan tidak shalat dengan memakai keduanya maka hendaklah dia menjadikannya di sebelah kirinya jika dia sendiri di dalam shaf, namun jika dirinya bersama jama&amp;#39;ah lain dalam shalat berjama&amp;#39;ah maka hendaklah dia meletakkannya di antara kedua kakinya berdasarkan hadits:&amp;nbsp;&amp;quot;Apabila salah seorang di antara kalian shalat maka janganlah dia meletakkan sandalnya di sebelah kanannya dan jangan pula disebelah kirinya sehingga bertempat di sebelah kanan jama&amp;#39;ah yang lainnya kecuali jika tidak ada seorangpun di sebelah kirinya. Hendaklah dia meletakannya di antara kedua kakinya&amp;quot; -&amp;nbsp;HR. Abu Dawud no: 609 (Sangat sulit bagi seseorang untuk memasuki mesjid dengan kedua sendalnya lalu shalat dengan keduanya pada zaman ini)&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Tidak lewat di hadapan orang yang sedang shalat&lt;/strong&gt;, berdasarkan sabda Nabi :&amp;nbsp;&amp;quot;Seandainya seorang yang lewat di hadapan orang yang sedang shalat mengetahui besar akibat yang harus ditanggunganya, niscaya berhenti selama empat puluh lebih baik baginya dari pada berjalan di hadapannya&amp;quot; -&amp;nbsp;HR. Abu Dawud no: 649&amp;nbsp;Dianjurkan bagi orang yang shalat untuk menjadikan sutrah (pembatas) bagi dirinya,&amp;nbsp;berdasarkan hadits:&amp;nbsp;&amp;quot;Apabila salah seorang di antara kalian shalat maka hendaklah melaksanakannya di hadapan sutroh dan mendekatlah dengannya&amp;quot; -&amp;nbsp;HR. Abu Dawud no: 646&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Membersihkan mesjid adalah perbuatan yang utama,&lt;/strong&gt; dan Nabi menganggap berludah di mesjid sebagai kesalahan dan penebus dosanya adalah menimbunnya - HR. Bukhari no: 415, Muslim no:552&amp;nbsp;dan hadits yang menerangkan bahwa mahar bidadari adalah membersihkan mesjid adalah hadits yang lemah.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Tidak boleh bagi orang kafir memasuki salah satu al-haromaini sekalipun dengan idzin seorang muslim,&lt;/strong&gt; dan diperbolehkan bagi Al-Zimmi (Orang kafir yang terikat perjanjian dengan orang muslim) jika orang tersebut diupah untuk membangun keduanya selama tidak ada orang muslim yang bisa mengerjakan pekerjaan tersebut.&lt;/li&gt;\r\n	&lt;li&gt;Ibnu Muflih rahimahullah berkata: Dan para guru kami berkata: &lt;strong&gt;Tidak mengapa dengan apa yang terjadi pada zaman kita, yaitu menutup mesjid di luar waktu-waktu shalat,&lt;/strong&gt; karena &amp;nbsp;khawatir akan terjadinya pencurian terhadap barang-barang milik mesjid -&amp;nbsp;Al-Adabus Syar&amp;#39;iyah 3/384.&lt;/li&gt;\r\n	&lt;li&gt;Sesungguhnya mesjid-mesjid yang terdapat di dalam rumah (ruang-ruang yang dipergunakan untuk shalat) tidak berlaku padanya hukum mesjid, menurut jumhur ulama oleh karenanya tidak mencegah orang yang junub dan wanita haid untuk masuk di dalamnya -&amp;nbsp;Fathul Bari, Ibnu Rajab 1/551.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n', '2017-06-07 04:12:59'),
(25, 'Adab Masjid Khusus Wanita', 'Adab-Masjid-Khusus-Wanita', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;ADAB MASJID KHUSUS WANITA&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&lt;strong&gt;Tidak memakai wangi-wangian atau berhias&lt;/strong&gt; sehingga bisa mengundang fitnah.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Tidak diperbolehkan bagi wanita yang sedang haid dan nifas untuk tinggal di mesjid,&lt;/strong&gt; dan boleh bagi wanita yang istihadhah untuk memasuki&amp;nbsp;mesjid bahkan beri&amp;#39;tikaf padanya, namun harus tetap menjaga agar mesjid tidak tercemar dengan najis.&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;Mereka bershaf di belakang shaf jama&amp;#39;ah pria, &lt;/strong&gt;dan apabila para wanita berada di tempat shalat yang berbeda maka sebaik-baik shaf mereka adalah yang terdepan.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n', '2017-06-07 04:12:27'),
(26, 'Masa Pendaftaran', 'Masa-Pendaftaran', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;MASA PENDAFTARAN PESERTA I&amp;#39;TIKAF&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Kegiatan i&amp;rsquo;tikaf Ramadhan tahun ini akan dimulai pada hari &lt;strong&gt;Kamis, 15 Juni&amp;nbsp;2017&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Pendaftaran peserta i&amp;#39;tikaf Ramadhan tahun ini dimulai pada hari &lt;strong&gt;Sabtu, 10 Juni 2017.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;MEDIA PENDAFTARAN&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Agar tidak ada data peserta yang tercecer&amp;nbsp;dan database tersimpan dengan baik, pendaftaran seluruh peserta hanya melalui Form Online yang telah disediakan dengan link berikut &amp;lt;&lt;a href=&quot;https://www.mutan.or.id/pendaftaran&quot;&gt;https://www.mutan.or.id/pendaftaran&lt;/a&gt;&amp;gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Bagi peserta yang tahun ini sudah melakukan pendaftaran online, tahun berikutnya tidak perlu lagi mengisi Form Online, cukup Login dengan memasukkan Username dan Password, kemudian pilih &amp;quot;Pendaftaran Ulang&amp;quot;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;BIAYA PENDAFTARAN&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;Biaya&amp;nbsp;kebersihan, kesejahteraan DKM dan kas tahunan, Rp 5.000,- / peserta / hari&lt;/li&gt;\r\n	&lt;li&gt;Biaya konsumsi tahun ini ditetapkan oleh penyedia sebesar Rp 13.000,- / bungkus&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Silahkan sesuaikan bekal Anda selama menjalani masa I&amp;#39;tikaf 10 Hari Akhir Ramadhan di Masjid Atta&amp;#39;awun.&lt;/p&gt;\r\n', '2017-06-11 06:51:04'),
(27, 'Fasilitas Peserta', 'Fasilitas-Peserta', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;FASILITAS PESERTA&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Masjid Atta&amp;#39;awun memiliki luas bangunan 300m2 dengan daya tampung&lt;strong&gt; jama&amp;#39;ah shalat &lt;/strong&gt;sekitar 700 orang.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Adapun untuk kegiatan i&amp;#39;tikaf Ramadhan yang khusyuk, &lt;strong&gt;Masjid Atta&amp;#39;awun hanya bisa menampung jamaah maksimal 200 orang. dengan prosentase 150 orang ikhwan dan 50 orang akhawat.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Untuk ruangan i&amp;#39;tikaf bisa menggunakan ruangan yang termasuk bagian dalam masjid yang ada ;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&lt;strong&gt;BAGI IKHWAN &lt;/strong&gt;: Ruang utama masjid lantai 1 dan Aula lantai 2&lt;/li&gt;\r\n	&lt;li&gt;&lt;strong&gt;BAGI AKHAWAT&lt;/strong&gt; : Ruang utama masjid lantai 2 dan Aula lantai 3&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;Selain ruangan dan kondisi lingkungan yang sejuk, Masjid Atta&amp;#39;awun dilengkapi dengan 10 Toilet/Kamar Mandi bagi Ikhwan dan 10 Toilet/Kamar mandi bagi Akhawat.&lt;/p&gt;\r\n', '2017-06-07 03:36:55'),
(28, 'Kuota Peserta', 'Kuota-Peserta', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;KUOTA PESERTA&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Untuk kegiatan i&amp;#39;tikaf 10 hari akhir Ramadhan yang khusyuk,&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Masjid Atta&amp;#39;awun hanya bisa menampung peserta maksimal &lt;strong&gt;200 orang,&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Dengan prosentase 150 orang ikhwan dan 50 orang akhawat.&lt;/strong&gt;&lt;/p&gt;\r\n', '2017-06-07 03:44:11'),
(29, 'Agenda Harian', 'Agenda-Harian', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;AGENDA HARIAN&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Pada dasarnya kegiatan i&amp;#39;tikaf adalah kegiatan fardhiyah, akan tetapi untuk mengarahkan peserta agar selalu mengisi waktu i&amp;#39;tikaf dengan kegiatan yang bermanfaat dan jauh dari sia-sia, MUTAN memberikan arahan dengan&amp;nbsp;agenda harian yang bisa diikuti oleh seluruh peserta.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Agenda harian berikut bisa saja berubah sewaktu-waktu.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;| 02.00 &amp;ndash; 03.50 | Qiyamullail &lt;em&gt;(Pribadi / Berjama&amp;#39;ah)&lt;/em&gt; dan Perbanyak Doa dan Istighfar&lt;/p&gt;\r\n\r\n&lt;p&gt;| 03.50 &amp;ndash; 04.30 | Sahur &lt;em&gt;(Diakhirkan)&lt;/em&gt;, Perbanyak Doa dan Istighfar&lt;/p&gt;\r\n\r\n&lt;p&gt;| 04.30 &amp;ndash; 05.00 | Shalat Sunnah Fajar, Shalat Shubuh&lt;/p&gt;\r\n\r\n&lt;p&gt;| 05.00 &amp;ndash; 06.30 | Kultum Shubuh, Dzikir Pagi, Tilawah 1 Juz, Shalat Syuruq &lt;em&gt;(Tidak beranjak dari tempat duduk)&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;| 06.30&amp;nbsp;&amp;ndash; 08.00 | Agenda pribadi &lt;em&gt;(Olahraga ringan, Mandi, dsb)&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;| 08.00&amp;nbsp;&amp;ndash; 10.00 | Shalat Dhuha&lt;/p&gt;\r\n\r\n&lt;p&gt;| 10.00 &amp;ndash; 11.45 | Kajian Dhuha&lt;/p&gt;\r\n\r\n&lt;p&gt;| 11.45 &amp;ndash; 12.30 | Shalat Sunnah Qabliyah, Shalat Dhuhur, Shalat Sunnah Ba&amp;#39;diyah, Tilawah 1 Juz, Qailulah&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;| 12.30 &amp;ndash; 15.00 | Agenda pribadi &lt;em&gt;(Membaca buku bermanfaat / Istirahat)&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;| 15.00&amp;nbsp;&amp;ndash; 17.45 | Shalat Sunnah Qabliyah, Shalat Ashr, Tilawah 1 Juz, Dzikir Petang&lt;/p&gt;\r\n\r\n&lt;p&gt;| 17.45 &amp;ndash; 19.00 | Ifthor Berjama&amp;#39;ah, Shalat Sunnah Qabliyah, Shalat Maghrib, Shalat Sunnah Ba&amp;#39;diyyah, Makan Besar,&amp;nbsp;Tilawah 1 Juz&lt;/p&gt;\r\n\r\n&lt;p&gt;| 19.00 &amp;ndash; 20.30 | Shalat Sunnah Qobliyah, Shalat Isya, Shalat Sunnah Ba&amp;#39;diyah, Shalat Tarawih (11 / 23 Raka&amp;#39;at)&lt;/p&gt;\r\n\r\n&lt;p&gt;| 20.30 &amp;ndash; 22.00 | Tilawah 1 Juz, Membaca buku bermanfaat&lt;/p&gt;\r\n\r\n&lt;p&gt;| 22.00&amp;nbsp;&amp;ndash; 02.00 | Istirahat&lt;em&gt; (Lampu ruangan dimatikan)&lt;/em&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;INFORMASI KAJIAN DHUHA&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Kajian Dhuha yang diselenggarakan insya Allah bersifat ilmiah, disajikan dalam bentuk &lt;em&gt;Slide PPT&lt;/em&gt;. &lt;br&gt;Untuk informasi lebih lanjut mengenai nama-nama pemateri, silahkan buka halaman &lt;a href=&quot;https://www.mutan.or.id/pages/Kajian-Dhuha&quot;&gt;Kajian Dhuha.&lt;/a&gt;&lt;/p&gt;\r\n', '2017-06-14 00:24:22');
INSERT INTO `pages` (`pages_id`, `pages_title`, `pages_slug`, `pages_content`, `pages_insert_date`) VALUES
(30, 'Kajian Dhuha', 'Kajian-Dhuha', '&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;https://www.mutan.or.id/logo/header.png&quot; class=&quot;img-responsive&quot; style=&quot;height:200px; width:1108px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;JADWAL KAJIAN DHUHA&lt;br /&gt;\r\nI&amp;#39;TIKAF RAMADHAN 1438H / 2017M&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;---&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;| Jumat 16/6/2017&amp;nbsp;| &lt;/strong&gt;Ustadz Akrom, Lc&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;| Sabtu 17/6/2017&amp;nbsp;| &lt;/strong&gt;Ustadz&amp;nbsp;Iskandar Riyadi Hasibuan, S.Th.I, Lc&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;| Minggu 18/6/2017&amp;nbsp;|&lt;/strong&gt; Ustadz Agus Salim, Lc&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;| Senin 19/6/2017&amp;nbsp;| &lt;/strong&gt;Ustadz Abu Muhtadi, Lc&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;| Selasa 20/6/2017&amp;nbsp;|&lt;/strong&gt; Ustadz Muhsin Suadi, Lc, MA&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;| Rabu 21/6/2017&amp;nbsp;| &lt;/strong&gt;Ustadz Beben Mubarok, Lc&lt;/p&gt;\r\n\r\n&lt;p&gt;---&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;DURASI : &lt;/strong&gt;2 jam (sampai menjelang Adzan Dzuhr)&lt;br /&gt;\r\n&lt;strong&gt;MATERI :&lt;/strong&gt; Disajikan dalam bentuk Slide PPT&lt;br /&gt;\r\n&lt;strong&gt;SUSUNAN :&lt;/strong&gt; Penyampaian materi dilanjutkan tanya jawab 30 menit (sampai menjelang Adzan Dzuhr)&lt;br /&gt;\r\n&lt;strong&gt;INFO :&lt;/strong&gt; Ustadz Makmun, Lc berhalangan &lt;em&gt;(Itikaf di Masjidil Haram)&lt;/em&gt;, Ustadz Zamroni Ahmad berhalangan&lt;em&gt; (I&amp;#39;tikaf di Masjid Yogyakarta)&lt;/em&gt;&lt;/p&gt;\r\n', '2017-06-13 09:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `peserta_id` int(11) NOT NULL,
  `peserta_nama` varchar(50) NOT NULL,
  `peserta_sex` char(1) NOT NULL,
  `peserta_tempat_lahir` varchar(50) NOT NULL,
  `peserta_tanggal_lahir` date NOT NULL,
  `peserta_status_pernikahan` int(11) NOT NULL,
  `peserta_alamat` varchar(255) NOT NULL,
  `peserta_kota` int(11) NOT NULL,
  `peserta_kartu_identitas` int(11) NOT NULL,
  `peserta_no_kartu_identitas` varchar(50) NOT NULL,
  `peserta_email` varchar(255) DEFAULT NULL,
  `peserta_telepon` varchar(15) DEFAULT NULL,
  `peserta_hp` varchar(15) NOT NULL,
  `peserta_pendidikan` varchar(255) DEFAULT NULL,
  `peserta_jurusan` varchar(255) DEFAULT NULL,
  `peserta_organisasi` varchar(255) DEFAULT NULL,
  `peserta_posisi` varchar(255) DEFAULT NULL,
  `peserta_foto` varchar(255) DEFAULT NULL,
  `peserta_ktp` varchar(255) DEFAULT NULL,
  `peserta_insert_date` timestamp NULL DEFAULT NULL,
  `peserta_update_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`peserta_id`, `peserta_nama`, `peserta_sex`, `peserta_tempat_lahir`, `peserta_tanggal_lahir`, `peserta_status_pernikahan`, `peserta_alamat`, `peserta_kota`, `peserta_kartu_identitas`, `peserta_no_kartu_identitas`, `peserta_email`, `peserta_telepon`, `peserta_hp`, `peserta_pendidikan`, `peserta_jurusan`, `peserta_organisasi`, `peserta_posisi`, `peserta_foto`, `peserta_ktp`, `peserta_insert_date`, `peserta_update_date`) VALUES
(37, 'Jerry Hadi', 'l', 'Jakarta', '1978-06-12', 1, 'Jl. WR Supratman, Gang Buntu No.83, RT 005 RW 015, Kelurahan Cempaka Putih, Kecamatan Ciputat Timur, Tangerang Selatan 15412', 19, 5, '3174101206780007', 'jerry@hvit.biz', '', '081316808117', 'Universitad Indonesia', 'Fisika', '', '', 'photo_37.JPG', 'photo_37.jpg', '2017-06-11 14:31:11', NULL),
(35, 'Nova Romadhona', 'l', 'Bogor', '1981-07-05', 1, 'Jl. Pesantren Kedung Halang, Bogor Utara', 17, 5, '3271050507810021', 'romadhona@bintangpelajar.com', '-', '085718082795', 'STAI YAPERI', 'PAI', '-', '-', 'photo_35.jpg', 'photo_351.jpg', '2017-06-11 10:35:05', NULL),
(26, 'Kusnawan', 'l', 'Sukabumi', '1985-02-18', 1, 'Perum Taman Griya Kencana Blok A16 No. 21 RT 04 RW 08 Kel. Kencana Kec. Tanah Sareal Bogor', 17, 5, '3202381802850001', 'kusnaone.smi@gmail.com', '-', '089638821448', 'BSI', 'Manajemen Informatika', 'HTI', 'Pelajar', 'photo_26.jpg', 'photo_261.jpg', '2017-06-10 02:11:22', NULL),
(36, 'Sutan Lutfi Abdillah', 'l', 'Jakarta', '1985-01-04', 1, 'Jl. Surya kencana Bogor', 17, 2, '1221170300555', 'ayahnya.calysta@gmail.com', '', '085781504007', 'SMU', 'IPS', '', '', 'photo_36.jpg', 'photo_361.jpg', '2017-06-11 13:56:31', NULL),
(24, 'Denny Rachmat Mustofa', 'l', 'Bogor', '1984-04-12', 1, 'Jl.Bhayangkara 2 Gg.Selakopi 2 Sindangbarang Bogor Barat', 17, 5, '3201131204840019', 'me@almushthafa.com', '087770700207', '087770700207', 'UIKA BOGOR', 'IT', 'HIZBUT TAHRIR', 'ANGGOTA', 'photo_24.jpg', 'photo_241.jpg', '2017-06-05 16:26:19', NULL),
(39, 'Adam Irham', 'l', 'Jakarta', '1947-01-01', 1, 'Jln ciherang raya blok A4 No 7 komp kopassus pelita 2 Depok Jawa Barat', 18, 5, '3175020203850013', 'adamirham85@gmail.com', '021-87741615', '081280785590', 'IISIP', 'Hubungan Internasional', '', '', 'photo_39.jpg', 'photo_391.jpg', '2017-06-11 20:24:49', NULL),
(40, 'Muhlis Prasetiyo', 'l', 'Bogor', '1983-11-28', 1, 'Jl. Palupuh I No. 26 Perumnas Bantarjati', 17, 5, '3271022811830002', 'sureukis.283@gmail.com', '02518340420', '081382160170', 'AMIK BSI', 'Manajemen Informatika', 'Hizbut Tahrir Indonesia', 'Anggota', 'photo_40.jpg', 'photo_401.jpg', '2017-06-12 01:11:45', NULL),
(42, 'Rudi Hermanto', 'l', 'Jakarta', '1981-12-10', 1, 'Blok dukuh Cibubur RT10/10 No.23\r\nCiracas Jakarta Timur', 16, 2, '8112120512627', 'hermanto_rudi@yahoo.com', '0214258579', '081380425372', '', '', '', '', 'photo_42.jpg', 'photo_421.jpg', '2017-06-12 05:17:43', NULL),
(43, 'Mai Warman', 'l', 'Jakarta', '1985-05-16', 0, 'Jl. Kelapa Dua Rt:15/RW :003, Kel. cilincing, Kec.Cilincing, Jakarta Utara', 16, 5, '3172041605850014', 'maiwarman@gmail.com', '', '082237821520', 'UGM', 'Geografi Lingkungan', 'Scientist Speleological Club', 'Pendiri', 'photo_43.jpg', 'photo_431.jpg', '2017-06-12 07:45:15', NULL),
(50, 'afriansyah', 'l', 'jakarta', '1985-04-26', 1, 'Villa Mutiara Bogor Blok F 5 / 47 Tanah sareal', 17, 2, '3271062604850016', 'punyafri@gmail.com', '08561552219', '08561552219', 'Nusa Mandiri', 'Teknik Informatika', '', '', 'photo_50.jpg', 'photo_501.jpg', '2017-06-13 05:11:39', '2017-06-13 07:12:22'),
(49, 'Yota Mutia', 'p', 'Palembang', '1985-05-05', 1, 'Jl.Bhayangkara 2 Gg.Selakopi 2 Sindangbarang Bogor Barat', 17, 5, '3201131204840019', 'mutia@almushthafa.com', '087770700207', '087770700207', 'UNISBA Bandung', 'Psikologi', 'HIZBUT TAHRIR', 'ANGGOTA', 'photo_49.jpg', 'photo_491.jpg', '2017-06-13 03:26:56', '2017-06-15 03:14:46'),
(52, 'Siti Aisyah', 'p', 'Pontianak', '1986-04-24', 0, 'Jl. Pasir Angin 3 Rt/Rw 02/03 Megamendung Cipayung', 17, 5, '3174066404860006', 'ishfiqalby@gmail.com', '', '085216663358', 'Universitas', 'Bahasa Arab', '', '', NULL, NULL, '2017-06-13 12:47:31', NULL),
(53, 'muhammad subasman', 'l', 'jakarta', '1966-04-18', 1, 'Perumnas 3 Tangerang', 19, 2, '660412192205', 'basman2000_2000@yahoo.com', '', '089674704429', 'universitas', 'ekonomi', 'pks', '', 'photo_53.png', 'photo_53.jpg', '2017-06-14 05:02:34', '2017-06-14 05:05:42'),
(54, 'Muhamad Nurul Hizbi Mubarok', 'l', 'Bogor', '1996-12-14', 0, 'Jalan Abdul Fatah KM  09 Desa Cinangneng RT 008 RW 001 Kecamatan Tenjolaya', 17, 2, '961213250493', 'mn.hizbi@gmail.com', '', '085714452499', 'SMK Adi Sanggoro', 'Survey Dan Pemetaan', 'Remaja Islam SMK Adi Sanggoro (REISAS)', 'Anggota', 'photo_541.jpg', NULL, '2017-06-14 06:17:03', NULL),
(55, 'Zainu Rochim', 'l', 'Tangerang', '1996-08-22', 0, 'Ciomas bukit asri block c 20 no 10', 17, 2, '3201292308860004', 'rochimeiji96@gmail.com', '085770296139', '085770296139', 'UNPAM', 'IT', '', '', NULL, NULL, '2017-06-14 07:01:47', NULL),
(56, 'Ahmad Nuryani', 'l', 'Bogor', '1986-07-06', 1, 'Bukit Asri Blok D9 No. 6', 17, 5, '3201290607860003', 'azfadrive@gmail.com', '', '087873720149', 'Elrahma', 'Bahasa Inggris', '', '', NULL, NULL, '2017-06-14 08:06:30', NULL),
(58, 'Lutfi RS', 'l', 'Bogor', '1987-06-20', 0, 'Kbn manggis, paledang, bogor tengah', 17, 5, '3271032006870005', '', '', '085711673456', 'Unas Pasim', 'Manajemen', '', '', NULL, NULL, '2017-06-15 05:46:13', NULL),
(59, 'Ayep Sugiana', 'l', 'Bojonggede', '1970-09-07', 1, 'Jalan Kebembem Raya No,15c Kel.Abadijaya Kec.Sukmajaya', 18, 5, '3201130709700006', 'ayep501@gmail.com', '', '085959923141', 'Universitas Gunadarma', 'Akuntansi', '', '', NULL, NULL, '2017-06-15 06:05:24', NULL),
(60, 'syafaat', 'l', 'depok', '1975-12-25', 1, 'jl.karya bakti rt.02 rw 04 no.52A TANAH BARU BEJI DEPOK', 18, 5, '32760625112750003', 'cenol_75@yahoo.com', '0817740119', '0817740119', 'app', '', '', '', NULL, NULL, '2017-06-15 15:12:21', NULL),
(61, 'Dimas agung', 'l', 'Jakarta', '1987-05-13', 1, 'Jl.  Bangau 9 rt 02/023 no.  40', 20, 5, '32750313038570017', 'dimasalghifari@gmail.com', '', '085310934565', 'LP3i', 'Management bisnis', '', '', 'photo_612.jpg', 'photo_613.jpg', '2017-06-15 15:17:55', '2017-06-15 16:10:50'),
(62, 'Irman Sudirman', 'l', 'Cianjur', '1989-05-15', 1, 'Jl. Hanjawar - Pacet Ko. Geduk RT. 02/07 Ds.Palasari', 0, 5, '32032815058590010', 'irman.sudirman89@gmail.com', '', '+6281905181568', '', '', '', '', 'photo_62.jpg', 'photo_621.jpg', '2017-06-15 16:03:10', '2017-06-15 22:55:42'),
(63, 'Marissa Savista', 'p', 'Tangerang', '1988-03-07', 1, 'Jl. WR Supratman, Gang Buntu No.83, RT 005 RW 015, Cempaka Putih, Ciputat Timur, Tangerang Selatan 15412', 19, 2, '8803122250111', 'Marissa.savista@gmail.com', '', '081295231303', 'Universitas Pamulang', 'Akuntansi', '', '', NULL, NULL, '2017-06-15 17:52:00', NULL),
(64, 'El Arise Rassinai BJ', 'l', 'Jakarta', '1980-01-19', 1, 'Kav. Harapan Kita\r\nJl. Bango 9 no 53\r\nBekasi utara', 20, 5, '32750319000180', 'elarisemahmud2@gmail.com', '', '082110195045', 'SMU', '', 'Lazis Darul Ihsan', 'Ketua', NULL, NULL, '2017-06-15 21:12:52', NULL),
(65, 'Waris', 'l', 'Bekasi', '1988-06-15', 1, 'Kp. Cinyosog RT. 03/05 DS. Burangkeng', 20, 5, '3216131506880022', 'warishidayatullah@gmail.com', '', '085814084891', 'STMIK CIKARANG', 'TI', '', '', 'photo_65.jpg', 'photo_651.jpg', '2017-06-15 22:43:46', '2017-06-15 22:48:15'),
(66, 'Herru Heriyanto', 'l', 'Jakarta', '1961-06-17', 1, 'Jl.Kebon Bawang 3 No.42 Tg.Priok Jakarta Utara.', 16, 5, '3172021707610002', 'heruh171@gmail.com', '', '08128077861', 'Institut', 'Teknik Sipil', '', '', NULL, NULL, '2017-06-15 23:06:07', NULL),
(67, 'Farhan Kurniawan', 'l', 'Bogor', '1998-03-20', 0, 'BDB 1 Blok MF 05 RT 01/20', 17, 5, '-', 'farhan.D.alan@gmail.com', '089515381317', '089515381317', 'IPB', 'FMIPA', '-', '-', NULL, NULL, '2017-06-16 01:35:02', NULL),
(68, 'Aji abdul majid', 'l', 'Bogor', '1999-10-26', 0, 'Perum BDB 1 blok MV4 bojong gede - bogor', 17, 4, '111207008', 'ajiabdulmajid26@gmail.com', '085882133500', '085882133500', 'MA.jamiyatul falah', 'Ips', 'Marawis hadrah gambus', 'Pemain inti', NULL, NULL, '2017-06-16 01:38:07', NULL),
(69, 'Widodo', 'l', 'Jakarta', '1966-11-12', 1, 'Blok MF 5', 17, 5, '', '', '', '0812', 'Univ. Negeri Jambi', 'Ekonomi', '', '', NULL, NULL, '2017-06-16 01:38:37', NULL),
(70, 'hilman robbany arham', 'l', 'Bogor', '2000-08-11', 0, 'Perum bdb 1 blok mn 3 cibinong kab. bogor', 17, 4, '', 'hilmanrobbany@yahoo.com', '', '', 'SMA AL ISLAM Cirebon', 'IPA', '', '', NULL, NULL, '2017-06-16 01:39:29', NULL),
(71, '', 'l', '', '1947-01-01', 1, '', 0, 0, '', '', '', '', '', '', '', '', NULL, NULL, '2017-06-16 01:41:00', NULL),
(72, 'Ridwan Abdul Halim', 'l', 'Jakarta', '2001-08-23', 0, 'Bojong Depok baru 1 blok mi 11 rw20/02', 17, 0, '-', '', '', '', '', '', '', '', NULL, NULL, '2017-06-16 01:43:01', NULL),
(73, 'Maulana farhan gianmoko', 'l', 'Bogor', '2002-06-07', 0, 'Perum BDB 1 blok MF no4, bojong gede', 17, 4, '0025239951', 'maulanafarhan@gmail.com', '081299111217', '081299111217', 'Pesantren ar ridho', '', 'Pramuka', 'Pratama, wakil pratama', NULL, NULL, '2017-06-16 01:48:20', NULL),
(74, 'Wahyu Ikhsan Perdana', 'l', 'Jakarta', '1999-10-17', 1, 'Bojong Depok baru blok mo2a', 17, 5, '-', 'wahyuikhsanperdana12@gmail.com', '081380158129', '081380158129', 'Smk', 'Multimedia', '-', '-', NULL, NULL, '2017-06-16 01:53:36', NULL),
(75, 'Muhamad Fahmi Ibrahim', 'l', 'Bogor', '2000-02-03', 0, 'Jln Dramaga Loceng No.32 RT 03/RW 04', 17, 5, '3271040302000012', 'ibrahimfahmi33@gmail.com', '', '085892329118', 'SMK Adi Sanggoro', 'Geologi Pertambangan', '', '', NULL, NULL, '2017-06-16 04:34:02', NULL),
(76, 'Muzammil(Moch fauzi)', 'l', 'Surabaya', '1979-04-12', 1, 'Jl pajak raya no 7B Cipadu jaya tangsel', 19, 5, '3173051204790007', 'rizkymuzammil07@gmail.com', '08179332871', '', '', '', '', '', NULL, NULL, '2017-06-16 04:45:42', NULL),
(77, 'Jufri Anthony', 'l', 'Purwakarta', '1968-01-26', 1, 'Kemang IFI Graha jl. Jakarta blok A9/8A Jatiasih', 20, 2, '6801120510567', 'tanyajufri@gmail.com', '', '08888668585', 'Univ.', 'Humas', '', '', NULL, NULL, '2017-06-16 07:28:06', NULL),
(78, 'Roestom Harka', 'l', 'Karawang', '1972-09-27', 1, 'Bukit Rivaria, Sawangan Depok', 18, 5, '', 'tomharka@gmail.com', '', '08159-38927', '', '', '', '', NULL, NULL, '2017-06-16 09:05:20', NULL),
(79, 'Hanityo Adi N', 'l', 'semarang', '1991-12-07', 0, 'Jl.Tamtama barat VI no.153, semarang', 21, 5, '3374110712910001', 'hanityonugroho@gmail.com', '085712477719', '085712477719', 'undip', 'kelautan', '', '', NULL, NULL, '2017-06-16 10:26:29', NULL),
(80, 'Muhammad taupik', 'l', 'Panyabungan', '1988-02-07', 1, 'Perum citayam sejahtera blok I no. 7 bojong baru bojonggede', 17, 2, '880213240420', 'taupik.siliwangi43@gmail.com', '', '081293451141', 'Institut Pertanian Bogor', 'Manajemen Agribisnis', '', '', 'photo_80.jpg', NULL, '2017-06-16 11:03:43', NULL),
(83, 'Maudiawan Mubarok', 'l', 'Bogor', '1995-09-27', 0, 'Kp. Ciaruteun Lebak RT 03 RW 04 Kecamatan Cibungbulang Kabupaten Bogor', 17, 2, '950913250271', 'maudiawansukses27@gmail.com', '', '08561164827', 'Universitas Ibnu Khaldun Bogor', 'Teknik Sipil', 'Lembaga Dakwah Kampus (LDK) Al-Intisyar', 'Sekertaris', 'photo_83.jpg', NULL, '2017-06-17 00:53:03', NULL),
(82, 'Desy Januarrifianto', 'l', 'Jakarta', '1979-12-29', 1, 'Metland menteng blok D4/13 ujung menteng cakung jaktim', 16, 5, '', 'drdesyjanuarrifianto@yahoo.com', '081348484618', '081348484618', 'UI', 'Kedokteran', '-', '-', NULL, NULL, '2017-06-16 22:13:29', NULL),
(84, 'Fikri Ramli', 'l', 'Bogor', '1996-07-03', 0, 'Kp. Carang Pulang RT 01 RW 04 Kecamatan Dramaga', 17, 2, '960713255128', 'fikriramli05@gmail.com', '', '089638787635', 'SMK Adi Sanggoro', 'Rekayasa Perangkat Lunak', 'Bina Latih', 'Anggota', NULL, NULL, '2017-06-17 01:39:48', NULL),
(85, 'Dian Lutfi', 'l', 'Tasikmalaya', '1994-10-11', 0, 'Kp. Lebak Sirna Sari RT 003 RW 005 Kec. Leuwiliang', 17, 5, '3201141110940002', 'dianlutfi11@gmail.com', '', '081315501378', 'SMK Adi Sanggoro', 'Geologi Pertambangan', 'Remaja Islam SMK Adi Sanggoro', 'Anggota', 'photo_85.jpg', NULL, '2017-06-17 02:30:37', NULL),
(86, 'Ridwan Fadly', 'l', 'Bogor', '1997-08-15', 0, 'Kp. Cemplang RT 004 RW 001 Kecamatan Cibungbulang', 17, 5, '3201161508970003', 'ridwanfadly2@gmail.com', '', '085817342712', 'Institut Teknologi Budi Utomo', 'Teknik Sipil', 'Remaja Islam SMK Adi Sanggoro', 'Pembina', 'photo_86.jpg', NULL, '2017-06-17 02:49:01', NULL),
(87, 'Deka siswan daya', 'l', 'Malang', '1975-12-07', 1, 'Limus pratama regency. Jl.cendana VI F16 no 38. Cileungsi - bogor', 17, 5, '3201070712750005', 'deka.siswandaya07@gmail.com', '', '081250091090', 'Stie adhie niaga', 'Ekonomi', '-', '-', NULL, NULL, '2017-06-17 06:34:49', NULL),
(88, 'Abdul Aziz', 'l', 'Jakarta', '1988-11-03', 1, 'Jl Nurul Insan RT 004/3 Jagakarsa Jakarta Selatan', 16, 5, '3174040311880003', 'akhaziz47@gmail.com', '', '087778267599', 'Univ, Pamulang', 'Akuntansi', '', '', 'photo_88.JPG', 'photo_881.JPG', '2017-06-17 06:43:12', '2017-06-17 06:51:30'),
(89, 'Nur aisyah', 'p', 'Tanjung Enim', '1977-08-02', 1, 'Limus pratama regency jl.cendana VI F16.cileungsi - bogor', 17, 5, '3201074208770005', 'dekasiswandaya@yahoo.com', '', '085656585760', 'Sma', '-', '-', '-', NULL, NULL, '2017-06-17 06:44:12', NULL),
(90, 'Rizaz', 'l', 'Cairo', '1987-02-10', 1, 'Jl ciliwung raya no5', 18, 5, '3175071002870004', 'rizaz_cairo@yahoo.co.id', '', '085781102472', 'Uin', 'Sistem informasi', '', '', NULL, NULL, '2017-06-17 08:14:45', NULL),
(91, 'aryo saputro', 'l', 'jakarta', '1982-03-06', 1, 'Jl. Perintis kemerdekaan no. 30C  rt/rw: 004/003 kel. Kebon kelapa bogor tengah', 17, 5, '3271030603820007', 'saputro37.as@gmail.com', '', '081210395742', 'IPB', 'THT peternakan', '', '', 'photo_91.jpg', 'photo_911.jpg', '2017-06-17 12:33:32', '2017-06-17 12:38:52'),
(92, 'Adhitya Pradana', 'l', 'Jakarta', '1990-01-03', 0, 'Pamulang permai 2, jl. Benda timur 6 blok E 64 no.39, RT 005 RW 015, Benda Baru, Pamulang, Tangerang Selatan 15416', 19, 5, '3674060301900007', 'adhityapradana3@gmail.com', '', '082114404944', 'Universitas Pamulang', 'Akuntansi', '', '', NULL, NULL, '2017-06-17 14:41:47', NULL),
(97, 'Mia salmiah', 'p', 'Bogor', '1985-03-03', 1, 'Bukit asri', 17, 5, '326600303858974', 'mia_salmiah@live.com', '085710933492', '085710933492', 'Eldina', 'PGTK', 'HTI', '-', 'photo_97.jpg', NULL, '2017-06-18 01:07:26', NULL),
(94, 'Iya', 'l', '', '1947-01-01', 1, '', 0, 0, '', '', '', '', '', '', '', '', NULL, NULL, '2017-06-17 14:47:14', NULL),
(95, 'Sofuan', 'p', 'Tanjung karang', '1975-12-02', 1, 'Kavling sawah indah', 20, 5, '3275030212750017', 'commodortirta02@gmail.com', '081283973978', '081283973978', 'Akademi maritim indonesia', 'Tata lakssna', '-', '-', NULL, NULL, '2017-06-17 14:52:12', NULL),
(96, 'Dewi Nawangwulan', 'p', 'Karawang', '1966-05-03', 1, 'Komplek DDN No.16 RT.12 RW.08 Pondok Kelapa Duren Sawit', 20, 5, '3175074305660001', 'anonime@mutan.or.id', '087809740066', '087809740066', 'S2', 'SDM', '-', '-', NULL, NULL, '2017-06-17 15:12:19', NULL),
(98, 'Muhammad Adyan Rohutomo', 'l', 'Jakarta', '1995-04-30', 0, 'JL. H.M. ALIF NO. 42 RT 03/RW 05 KUKUSAN, BEJI', 18, 5, '3276063004950007', 'madyanr@gmail.com', '085716774972', '085716774972', 'Universitas MH Thamrin', 'Manajemen', '', '', NULL, NULL, '2017-06-18 09:26:19', NULL),
(99, 'Zainu Rochman', 'l', 'TANGERANG', '1996-08-22', 0, 'Bukit Asri Block C 20 No.10', 17, 5, '', 'rochman.ryeka@gmail.com', '', '085779243895', 'SMK Adi Sanggoro', 'Survey dan pemetaan', 'Rohis', 'Infokom', NULL, NULL, '2017-06-18 10:38:58', NULL),
(100, 'H budhi priyambodo', 'l', 'Jakarta', '1980-05-16', 1, 'Vila nusa indah bb7 no28 bojong kulur gunung putri', 17, 0, '', 'jepang175@gmail.com', '089627095224', '089627095224', 'STM', 'Mesin', '-', '-', NULL, NULL, '2017-06-18 13:15:51', NULL),
(101, 'Ismail Alif', 'l', 'Jakarta', '1964-06-23', 1, 'Kav UI No.50 A RT.03 RW.02 Tanah Baru Beji Depok', 18, 5, '3276062366640002', 'alifu64@gmail.com', '081317369566', '081317369566', 'MAGISTER MANAJEMEN', 'Komunikasi', '-', '-', NULL, NULL, '2017-06-18 13:21:53', NULL),
(102, 'annisa nur syahidah', 'p', 'jakarta', '2000-06-20', 0, 'jl.poncol rt 08 rw 10 kelurahan tugu kecamatan cimanggis no.79', 18, 4, '1044101315090002', 'annisans20.ans@gmail.com', '081281055224', '083897573520', 'smkn 26 pembangunan jakarta', 'teknik gambar bangunan', 'nihon club', 'humas', NULL, NULL, '2017-06-19 05:46:12', NULL),
(103, 'Akhmad Taufiqqurrahman', 'l', 'Palembang', '1977-03-23', 1, 'Jl. Akasia No. 306', 16, 5, '', 'adzkia_mubarak@yahoo.co.id', '', '08117100934', 'Universitas', 'Teknik Kimia', '', '', NULL, NULL, '2017-06-19 05:52:17', NULL),
(104, 'KOLIK', 'l', 'LAMPUNG', '1966-12-07', 1, 'JL.MUSHOLLA II NO.44 RT.03 RW.08 JATIMURNI PONDOK MELATI', 20, 5, '3275120712660001', 'kholik.198@gmail.com', '081388387041', '081388387041', 'S2', 'BAHASA INDONESIA', '-', '-', NULL, NULL, '2017-06-19 07:20:03', NULL),
(105, 'Rudi Setiawan', 'l', 'Cianjur', '1994-10-05', 1, 'Kp sampay kaler rt/005 rw/001 cimacan cipanas cianjur', 0, 5, '3203280510940008', 'rudger.arvigio@gmail.com', '083817342063', '', 'SMK', 'Hotel', '-', '-', NULL, NULL, '2017-06-19 10:21:31', NULL),
(106, 'Ikhwansyah', 'l', 'Jakarta', '1980-11-27', 1, 'Pondok kelapa', 16, 2, '3174042711800003', 'ikhwansyah@gmail.com', '', '081225702570', 'Universitas Jayabaya', 'T sipil', '', '', 'photo_106.jpg', 'photo_1061.jpg', '2017-06-19 10:40:00', '2017-06-19 10:57:38'),
(107, 'SAEPPUDIN', 'l', 'Bogor', '1984-06-28', 1, 'Jl Kamboja 7 No.5 RT 003/010 Kel. Kebonpala kec. Makasar', 16, 5, '3175082806840011', 'saeppudin@gmail.com', '', '081219728479', 'STTI Jakarta', 'Elektronika Komunikasi', '', '', 'photo_1073.jpg', 'photo_1074.jpg', '2017-06-19 10:42:28', '2017-06-19 13:32:16'),
(108, 'heri prasetiyo', 'l', 'jakarta', '1969-08-05', 1, 'jl.poncol rt 08 rw 10 kecamatan cimanggis kelurahan tugu no.79', 18, 5, '317 510 050869 0013', 'heriprasetiyok@gmail.com', '081281055224', '081283650059', '', '', '', '', NULL, NULL, '2017-06-19 12:20:46', NULL),
(109, 'fathonah januwiyati', 'p', 'jakarta', '1969-01-23', 1, 'jl.poncol rt 08 rw 10 kecamatan cimanggis kelurahan tugu no.79', 18, 5, '3175106301690002', 'fath.yati@gmail.com', '081281055224', '081281055224', '', '', '', '', NULL, NULL, '2017-06-19 12:29:51', NULL),
(110, 'hanifah nur syahidah', 'p', 'jakarta', '1995-11-01', 0, 'jl.poncol rt 08 rw 10 kecamatan cimanggis kelurahan tugu no.79', 18, 5, '3175104111950002', 'haniaida95@gmail.com', '081281055224', '082257052747', 'unj', 'bahasa arab', 'bem ldk', 'sekertaris', NULL, NULL, '2017-06-19 12:40:36', NULL),
(111, 'ammar ibrahim', 'l', 'jakarta', '1997-08-19', 0, 'jl.poncol rt 08 rw 10 kecamatan cimanggis kelurahan tugu no.79', 18, 5, '3175101908970003', 'ammar.smkn26@gmail.com', '081281055224', '083894683577', '', '', '', '', NULL, NULL, '2017-06-19 12:52:22', NULL),
(112, 'salma nur syahidah', 'p', 'jakarta', '2001-07-02', 0, 'jl.poncol rt 08 rw 10 kecamatan cimanggis kelurahan tugu no.79', 18, 4, '0013053096', 'syahidahsalma@gmail.com', '081281055224', '088809917717', 'sman 48 jakarta', 'mipa', '', '', NULL, NULL, '2017-06-19 12:58:25', NULL),
(113, 'Han Pandu', 'l', 'Purwokerto', '1992-02-28', 0, 'Cibubur, Jakarta Timur', 16, 5, '3175092802920008', 'Han.pandu@gmail.com', '', '08999822925', 'Universitas Padjadjaran', 'Hubungan Internasional', 'BEM FISIP Unpad', 'Wakil Kepala Departemen', NULL, NULL, '2017-06-19 13:13:29', NULL),
(114, 'agung siswahyu', 'l', 'jogkakarta', '1978-05-15', 1, 'perum aster f3 no 22 kota tangerang', 19, 5, '', 'agung.siswahyu@gmail.com', '', '085313237247', 'universitas', 'teknik kimia', '', '', NULL, NULL, '2017-06-20 08:04:28', NULL),
(115, 'Fahri Awaludin', 'l', 'BOGOR', '1991-07-20', 0, 'Villa Tajur Blok C02 No 09', 17, 5, '3672052007910005', 'orangjugakok@yahoo.com', '', '087880868503', 'Universitas Gunadarma', 'SISTEM INFORMASI BISNIS', '', '', NULL, NULL, '2017-06-20 09:09:45', NULL),
(116, 'Aceng Sambas', 'l', 'Cianjur', '1982-01-04', 1, 'Kp. Panumbangan rt.004 rw.001\r\nCugenang - Cianjur', 17, 5, '3203110401820009', 'asambas4@gmail.com', '0', '085798511333', 'Universitas', 'Managemen SDM', '', '', NULL, NULL, '2017-06-21 01:02:52', NULL),
(117, 'Sumarno', 'l', 'Sragen', '1965-01-01', 1, 'Perumnas suradita jl kenanga  4 no 7 desa suradita kec Cisauk kab tangerang', 19, 5, '3603230101650052', 'sumarno111965@gmail.com', '081283177225', '0812283177225', '', '', '', '', 'photo_117.jpg', 'photo_1171.jpg', '2017-06-21 09:23:43', '2017-06-21 09:26:58'),
(118, 'Asih Subagyo', 'l', '', '1972-01-02', 1, 'Jl. Jemiih I/RT 01/05 Kalimulya Cilodong', 18, 0, '', 'masbagyo@gmail.com', '', '08567386008', '', '', '', '', NULL, NULL, '2017-06-21 12:24:27', NULL),
(119, 'DICKY DJUNAEDI', 'l', 'PADANG', '1969-11-26', 1, 'JL.SDN 01 RT.06 RW.02 NO.17', 20, 5, '3175042611690008', 'dickydj.alazka@gmail.com', '08129687981', '08129687981', 'S1', 'MATEMATIKA', '-', '-', NULL, NULL, '2017-06-21 12:58:10', NULL),
(120, 'Ahmad Nurohim', 'l', 'Jakarta', '1994-06-20', 0, 'Gandaria Utara, Kebayoran Baru', 16, 5, '', 'rohimamat@gmail.com', '', '+6283873855160', 'Politeknik LP3I Jakarta', 'Hubungan Masyarakat', 'Badan Eksekutif Mahasiswa', 'Sekretaris', NULL, NULL, '2017-06-21 17:42:37', NULL),
(121, 'AWWAB AL UBADI', 'l', 'Bogor', '1996-06-07', 0, 'Kp. Pintu Air RT 04/07 Pabuaran', 17, 2, '1221160900288', 'awwabelubbadi@gmail.com', '087786306840', '087786306840', 'Pondok Pesantren Daarussa\'adah', 'Bahasa', '', '', 'photo_121.jpg', NULL, '2017-06-21 21:26:45', NULL),
(122, 'Abdul latief fikry', 'l', 'Jakarta', '1992-05-27', 0, 'Jatikramat 2, kav 52f, jatiasih, bekasi', 20, 5, '3175032705920002', 'latief.aranca@gmail.com', '', '089637345838', 'Universitas muhammadiyah jakarta', 'Teknik sipil', '', '', 'photo_1221.jpg', NULL, '2017-06-22 08:09:19', NULL),
(123, 'muhammad sahrudin', 'l', 'bogor', '1999-10-18', 0, 'Ciawi bogor', 17, 4, '151610038/0009559218', 'ayoengsahrul@yahoo.co.id', '', '085884986761', 'ponpes fathan mubina', 'bahasa tahfidz', '', '', NULL, NULL, '2017-06-22 09:26:49', NULL),
(124, 'Muhammad Roozika Sunandila', 'l', 'Bogor', '2000-08-21', 0, 'Gadog, ciawi', 17, 4, '151610038/0009559217', 'sunandilaroozika@gmail.com', '082210077017', '082210077017', 'Pondok pesantren', 'Agama, bahasa', '', '', NULL, NULL, '2017-06-22 09:27:58', NULL),
(125, 'Fadiel Hidayat', 'l', 'Jakarta', '1999-10-11', 0, 'Jl. Jatikramat 2 kav 52 F, jatikramat, Jati Asih Kota Bekasi', 20, 4, '', 'fadielhidayat@gmail.com', '', '082122355627', 'SMAN 100Jakarta', 'Ips', '', '', NULL, NULL, '2017-06-22 09:40:10', NULL),
(126, 'Dwi Prabowo Sigit Yudiantoro', 'l', 'Purwokerto', '1974-09-27', 1, 'Villa melati mas blok H9/24 RT 01/06', 19, 5, '3674022709740003', 'dwi_prab@yahoo.co.id', '', '0817896156', '', '', '', '', NULL, NULL, '2017-06-22 14:49:55', NULL),
(127, 'Dedi Marwanto', 'l', 'Jakarta', '1984-03-23', 1, '', 16, 5, '3174042303840010', 'dedi.march@yahoo.com', '', '081286254638', '', '', '', '', NULL, NULL, '2017-06-23 07:44:30', NULL),
(128, 'Fauziah Oktovani', 'p', 'Padang', '1989-10-19', 1, 'Jalan Tiang no 3 kampung Ambon kelurahan Kayu Putih Jakarta Timur', 16, 0, '', 'fauziah.oktovani.fo@gmail.com', '', '085355641038', 'STKIP PGRI SUMBAR', 'PMIPA', '', '', NULL, NULL, '2017-06-23 08:47:51', NULL),
(129, 'Neng munasari', 'p', 'Cianjur', '1985-06-26', 0, 'Kp. Gombong rt.02 rw.02\r\nDs.  Songgom\r\nGekbrong-cianjur', 17, 5, '3203276606950002', 'ukhtynengmunasari@gmail.com', '', '089679725782', 'Universitas Terbuka', 'Ilmu Pemerintahan', '', '', NULL, NULL, '2017-06-23 09:36:43', NULL),
(130, 'ADINDA SILVANA', 'p', 'Cianjur', '1996-09-07', 0, 'Kp. Bangbayang, Ds.Bangbayang, Kec. Gekbrong, Kab. Cianjur', 17, 5, '3203274709960006', 'adindasilvana96@gmail.com', '087720431818', '087720431818', 'SMAN 1 WARUNGKONDANG', 'Staff perpustakaan', '', '', 'photo_130.png', 'photo_130.jpg', '2017-06-23 09:38:25', '2017-06-23 09:41:29'),
(131, 'Muhammad farhan ferdiansyah', 'l', 'Depok', '1999-02-20', 0, 'Perum sasak panjang permai blok C5/03 tajurhalang bogor', 17, 2, '1221160500480', 'farishanurmaulida@gmail.com', '', '082297757220', 'Smk kesehatan logos', 'Farmasi', '', '', NULL, NULL, '2017-06-23 13:26:22', NULL),
(132, 'Agus setiawan', 'l', 'Bogor', '1999-08-19', 0, 'Bojonggede indah blok MH 23 RT 02 RW 20 kec Bojong gede', 17, 4, '9993478219', 'agusjelek0896@gmail.com', '', '085865444613', 'SMK mekanik cibibong', 'Multimedia', '', '', NULL, NULL, '2017-06-23 13:27:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_src` varchar(20) NOT NULL,
  `slider_alt` varchar(100) NOT NULL,
  `slider_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_src`, `slider_alt`, `slider_active`) VALUES
(1, 'slider_0.png', 'muhasabah', 1),
(2, 'slider_1.png', 'malam qadr', 0),
(3, 'slider_2.png', 'tafakkur', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sumber_informasi`
--

CREATE TABLE `sumber_informasi` (
  `si_id` int(11) NOT NULL,
  `si_ket` varchar(255) NOT NULL,
  `si_insert_date` timestamp NULL DEFAULT NULL,
  `si_insert_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumber_informasi`
--

INSERT INTO `sumber_informasi` (`si_id`, `si_ket`, `si_insert_date`, `si_insert_user`) VALUES
(1, 'teman', '2017-05-08 11:56:25', 1),
(3, 'media elektronik', '2017-05-08 11:56:46', 1),
(4, 'internet', '2017-05-08 11:56:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `top_menu`
--

CREATE TABLE `top_menu` (
  `tm_id` int(11) NOT NULL,
  `tm_ket` varchar(50) NOT NULL,
  `tm_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `top_menu`
--

INSERT INTO `top_menu` (`tm_id`, `tm_ket`, `tm_url`) VALUES
(5, 'SIAPA KAMI', 'https://www.mutan.or.id/pages/Siapa-Kami'),
(7, 'FAQ', 'https://www.almushthafa.com/underconstruction.html'),
(8, 'DONASI', 'https://bit.ly/OrderDong'),
(9, 'PUBLIKASI', 'https://www.almushthafa.com/underconstruction.html'),
(10, 'PROGRAM', 'https://www.almushthafa.com/underconstruction.html');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_peserta` int(11) NOT NULL,
  `user_ur` int(11) NOT NULL,
  `user_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_peserta`, `user_ur`, `user_active`) VALUES
(1, 'admin', '$2y$12$kof95rzoHFcnICJlWwnpRuBURUmzYblb4S4b7KEwAOsYE5Iq611le', 0, 1, 1),
(2, 'almushthafa', '$2y$10$Q6NM.XwmwzQgkcIF9jGhcuBuiKR0bXO/02HcAs6XbbmVrysCrtKIy', 24, 4, 1),
(3, 'kusnaone.smi@gmail.com', '$2y$10$HlqzFFADWjM.iGRCYNyMweoY2o5jRzkdN/TLdPuRBwr2DB6xa32Dy', 26, 4, 1),
(12, 'avonta', '$2y$10$DCQJ7/3x8v9.uiFlB4N8fezq852fkStDkJO6/xHYFqOQv6Dsjfp2a', 35, 4, 1),
(13, 'Sutan', '$2y$10$3q2NtrsbX5cjHUuhMD967e4XB3gfUymAa6Cd4A0Bzqi7BYpORSzmS', 36, 4, 1),
(14, 'Jerry', '$2y$10$sPJ0Xo7OMv1e5cnMk01X1OeyVCuDyKtt2W2Pc7oGZouvgGtnv/kXi', 37, 4, 1),
(16, 'Adamirham', '$2y$10$50m9Pv6psS4cXKOIRdGFH.MF4eBMlfQ13WHXSCg.uUCctR6fpOVDO', 39, 4, 1),
(17, 'sureukis', '$2y$10$/BQvdllt88nG0GqRiD7wZuv/8PLejvfL3IG2bZuESlEeBi0YP91IO', 40, 4, 1),
(19, 'hermanto_rudi', '$2y$10$O8xtctnH9sFxoMPc0GaImO6QQycP./LbjfV/Ko81M36ff8vgAvjeu', 42, 4, 1),
(20, 'maiwarman', '$2y$10$g6dmLVA9wgBhnuykp2ap7ur97uA/pMxxeodL0.E00PXAkQ2lzC8GW', 43, 4, 1),
(26, 'mutia', '$2y$10$LGAEAXiHbCgPZFTviyiZK.Xl77GSsdPuIxzKL6oNbmVm9fTcWacnm', 49, 4, 1),
(27, 'bangafri', '$2y$10$bOiyyNtNl4teY9xh0yjGSu43owVSn3JNIhH2qM36YsJSq7Nr4149y', 50, 4, 1),
(29, 'Aisyah', '$2y$10$FIx5E..HfO0E2dD8zPYHBOtxpiRCPoiT.ITmAav50HL9WvBQrOJQu', 52, 4, 1),
(30, 'basman', '$2y$10$E9xrNJwaUUL9q.iJeJ2loeLKzgUa4dbhorDqekOC6hrO7/7vSr2di', 53, 4, 1),
(31, 'mn.hizbi@gmail.com', '$2y$10$1gt.eFfed.k9kDBhf0fmH.9aIGBVW5dlqVYe0t4kepbZzzqi6KFve', 54, 4, 1),
(32, 'rochimeiji', '$2y$10$gSjLBNTmWAxALjsdtmGz8uDrx8o3sRhevU3ORGi1qOj4.fyb0kuwq', 55, 4, 1),
(33, 'ahmadsyamil', '$2y$10$qzDwGAPDGOPsXMXtDGjJc.wI/Chr4gzs00DVwvaa.km4ORhi9x6H6', 56, 4, 1),
(35, 'lutfi', '$2y$10$eMKKXQFD8/NaXRFdBlT2h.sNZV.ZhUTw.Ky4Vm/KViMiAjU9rRxAK', 58, 4, 1),
(36, 'Ayep', '$2y$10$W19OQ7j1KB7qE.SZyPX7au0jdZRim6A75D.LgZdw6g37XAKjpCoeS', 59, 4, 1),
(37, '', '$2y$10$hnGySzHQgdniHocBT/i53OQ8k8tiO42ZQ0O94eWTYx0IQY0169gPy', 60, 4, 1),
(38, 'Dimas', '$2y$10$0D8hKuNAWusMTfNkT4p5ousNz4wtPTd6PTYL1ZdVbzUPqTZxMheRS', 61, 4, 1),
(39, 'irman', '$2y$10$g9EPVtty/kcaIy6zrzKaiOG9k573I1/slppi/5MI5eTSqbWKrvz..', 62, 4, 1),
(40, 'marissasavista', '$2y$10$i.aSjHhfX8TBUdcx5wplu.FmfjNWof9OPhPhQY6NYvl2AH/F7K/j6', 63, 4, 1),
(41, 'Elarisemahmud2@gmail.com', '$2y$10$KyShGGtUqSfKn3M4PQgvF.ER.WRokaG6R4qZCpXxJCeaUiyA/lWFW', 64, 4, 1),
(42, 'waris', '$2y$10$LvRXt7hhbC/29Q5QVX9qX.YB6NZsNjhAU2wJ.nM.HUK6w560y/HFO', 65, 4, 1),
(43, 'heruh171', '$2y$10$tFvFn9yc4B1X.4kgG7DI4uUyoGCa2JMX.SeUxFF9hMMI6McBU4niu', 66, 4, 1),
(44, 'farhan_avicena', '$2y$10$jgbl0Trl0kjc3cF3sO0lfe8tdDOHond9pabT/HCUugBxmdmsoZmaW', 67, 4, 1),
(45, '', '$2y$10$L4R7SBKWcNqQKnKD8y8JHepaX4tll0osal48LSFnIRuOHIFey3XSy', 68, 4, 1),
(46, '', '$2y$10$Ff7afuv5q5ROTZM2K6QqbuTBiG4ZXZSguq3XEirpOGX3kAN3SRHxe', 69, 4, 1),
(47, 'hilmanrobbany', '$2y$10$G6wDYfV7PE2vH.HZPuF5OuHjc6qRuAhVXzHnFrHW6juAJM84QhCny', 70, 4, 1),
(48, '', '$2y$10$EDuYS23nbH51TZNSRp8usu7XTd8UIn3kGcP4CYa.xu3fNHXxtJdLm', 71, 4, 1),
(49, '', '$2y$10$uhrK3StHUDcmUZwyEQhIcOsKhnjRm8Ay3NMwgHdDo4azAZWrJoqki', 72, 4, 1),
(50, 'Maulana', '$2y$10$4CtpQkkuvvfkbPG9TcsXTeW.K2vXXJWXv9c4b3ztOHMnXB7fXZ.ka', 73, 4, 1),
(51, 'Wahyu ikhsan perdana', '$2y$10$ahBGSa55/kVdl5ZlQg.CYOjUMO3VR0lbCFvbta6tatUukGHewc7pa', 74, 4, 1),
(52, 'Fahmiibrahim', '$2y$10$YBBDor.ciQJY8EgABWid2e6hZ0VXbWlLRHlNuGxB.9Po/hWHil5Gu', 75, 4, 1),
(53, 'Rizkymuzammil', '$2y$10$80R33QbQcnocEMgLU1w0AOYUNwQyoXyNaDR54pdZFCAH0FpF0wf..', 76, 4, 1),
(54, 'Jufri', '$2y$10$76eX7ZsSpXRBz623rcmFo.bTmAckGfF7z.iEwTeJzexkQThIKiSya', 77, 4, 1),
(55, 'Tomharka', '$2y$10$Lt2dd/HJ86kR8cP9lJNE2eIHhvUOTTplkJ7NcHaHNty3ziGO81PTS', 78, 4, 1),
(56, 'tioadin', '$2y$10$SUGeJlW18ykq9AYA8BvRiupjDaVVVvUF3h2B1q7su93ONFUy/OTTG', 79, 4, 1),
(57, 'Taupik', '$2y$10$RKvNSzfLR1Oun.WoWfDs5Od.gDGks7iC2qWVVuyWJ2.ycI.2ihYma', 80, 4, 1),
(59, 'drdesyjanuarrifianto@yahoo.com', '$2y$10$75gCIEXptldlCRUZj98h3uh8dII1vCDjzIkZts7ryuqtfDVgX11Mq', 82, 4, 1),
(60, 'maudiawansukses27@gmail.com', '$2y$10$qJyLloO0hwH8HQykv17j5OLqAnqYAQMpHCvdNJ3zU172sb0wZ...G', 83, 4, 1),
(61, 'fikriramli05@gmail.com', '$2y$10$dY9NACRKwX26aJbnrTCoiuJgbkvFKPleKX3DQNs9kyzBGWn6X7Ie2', 84, 4, 1),
(62, 'dianlutfi11@gmail.com', '$2y$10$tIxbQHFEkqib.V2.Kf.5ZuXemOzjws6ceRJZ3K6e8VuVdPWuDS10.', 85, 4, 1),
(63, 'ridwanfadly2@gmail.com', '$2y$10$cibdqE5cpUfjmSkeKDzmeeq8ey2fcLo4bjDYJzdKYHTFF3BaCucnu', 86, 4, 1),
(64, 'Deka siswan daya', '$2y$10$sr6y/AGh7alhCReii.sv7ORv/sKoWcdvSc7zK4v85V0iju1iB2wkO', 87, 4, 1),
(65, 'akhaziz', '$2y$10$uLVdlhVWZKDF5sciSO1nBOWqbV0jdAAEZ2c14FOfC8a.gZWPy6FCe', 88, 4, 1),
(66, 'Nur aisyah', '$2y$10$791vYZA6fdYWFqhofWEY3eHf6kCorDno98caoiyy1mezsNB8UXfCO', 89, 4, 1),
(67, 'Rizaz', '$2y$10$mQqRTv/f7AAkBlNYNlfhCu/Z8x6pCEsUsqIzroK4vvKrtauuSwzPK', 90, 4, 1),
(68, 'orayx', '$2y$10$jS/wdu59Ql7Iil9KIY7NOejObvyrjC7wt2cfRfTgBlYTUKwNIW0nC', 91, 4, 1),
(69, 'Adhityapradana', '$2y$10$AZv5p4u59Q2b50I87y1T6eTaK.RjXGZMbyQmvkKX52zE2pRgOGx/2', 92, 4, 1),
(71, '', '$2y$10$L.wsszKTMD03g8uva2SduupottxYzl1/L6BEf8rQhlanZrqf0EXg2', 94, 4, 1),
(72, 'Bonga', '$2y$10$faR4FapmS.09ZfGKsHsShuC3bPhth1XjMQZwsVSqe.F3WGvs7AWI6', 95, 4, 1),
(73, 'nawangwulan', '$2y$10$KCHmQWrkuA8zqfKSi6u.HuSy8f6p4o3AOyXbsLfPC8cHmhDMPf4qK', 96, 4, 1),
(74, 'miasalmiah', '$2y$10$/ToNO4Gas0T7mKqTuio4O.ChOx1MUbNH3osnd7aCPGLJnVQsEjPty', 97, 4, 1),
(75, 'muhadyan', '$2y$10$nN77/Ri6vaG/nMqbOlbmqOLX1tRutfgKpxUk9cvfLk9/h/q3HfNra', 98, 4, 1),
(76, '', '$2y$10$f0CjR3TSQ2wQ.vYcT/2EbOPcfFv7ereGMamnabK9.1VNOmiI44kG2', 99, 4, 1),
(77, 'Budhi', '$2y$10$JTtxBG89uzguGs1edQv6tuh8xGhpmeuPzuQRV.AcXa0Tp7L3pqn62', 100, 4, 1),
(78, 'alifu', '$2y$10$Ctu3mlKKIamvz2a9C0o43eHL00OlN4gyIf4U3puQBHkOaFuqu4HxS', 101, 4, 1),
(79, 'annisans20', '$2y$10$KtZQCZRgBsG54BXEBCZpl.58ClI0UBTwNqgFled8BLPjiHdSFIhUS', 102, 4, 1),
(80, 'Taufiq', '$2y$10$YyWFDoUxi6Iupp0UAGng/e77KQK1grXZ.FY9wxob8wwNO32m.9vgu', 103, 4, 1),
(81, 'kolik', '$2y$10$rNPc6S1QQaRJzp4rr57hd.iOC1MsH1zUjWHqFjDDyiEt4DrYkeBcK', 104, 4, 1),
(82, 'rudi', '$2y$10$yFsYJQXbCbCZW2mc90IT.OYvqvT8s9TzYVJcZrFnIzTslX7pCmXiu', 105, 4, 1),
(83, 'Ikhwansyah', '$2y$10$oV5V4Uasf/kaHV5b9W7ZfuKqJWw23tpfQba5QS0In13OXT5d1NJeC', 106, 4, 1),
(84, 'kang.adin', '$2y$10$NWMCJIQ31QAJsz9PQ023m.dGj2r/H.Eu/ePIDSC18CUCvKA3g/wcm', 107, 4, 1),
(85, 'papatiyo', '$2y$10$ltHO7S7uoqX4y4AHxar1..FvcpMGhRktCUhcjzNjp6dm44YcY0T4S', 108, 4, 1),
(86, 'fath.yati', '$2y$10$3V1XnSebnU8X01MKThaZ2.onqxsYI7KDbkF7Jccrho/WhVe2pQT.K', 109, 4, 1),
(87, 'haniaiko', '$2y$10$nWPzxQhu7EbBKhqO79LyqeiIIeNUOKg2dqHmSdhLLFPjRp.IG3mEy', 110, 4, 1),
(88, 'ibrammar', '$2y$10$Tpj9hDNHFwD4Imx12hIvie2P/OkQzmBCjHI0wGT4xFPyVCQ84uc3S', 111, 4, 1),
(89, 'syahidahsalma', '$2y$10$OJbFA7TZWysLdm1HnbeO5ulysEOwFaMuF6DhCVhP7cAwhPXGPe/Vq', 112, 4, 1),
(90, 'Hanpandu', '$2y$10$YfJ8queE2GRo.zJjkjQB3uQyP.1cxG0AS8JCvjNCK5/Rlg0LAimei', 113, 4, 1),
(91, 'adzhuma', '$2y$10$eqrlfPfOb3cfIY3aadWTj.zDE5GSR6JHiSCndsh6DR6IH8toR9PEa', 114, 4, 1),
(92, 'cupl', '$2y$10$u/Lvg2H19gR4opndUMxWneOvzHFpB7tqSY3poJ27xHL/WAVugYmiK', 115, 4, 1),
(93, 'Asambas', '$2y$10$fJmLRsNQc8BQOnP0sWcQCuHPRquqQezFg/05rei5ksIZdj1IscScC', 116, 4, 1),
(94, 'Ibnusuwito', '$2y$10$CS/HbJzhq43BN5qCnu2XkOwOTi1ZHgYaRyJ0sOCCRnW/hBuKvnwW2', 117, 4, 1),
(95, 'masbagyo', '$2y$10$dfOMihH5WXoUFrYrxH1N1O7NUL4taz7L29SP8fhxBDAl1LggD7lrG', 118, 4, 1),
(96, 'dicky', '$2y$10$nuCC.XWsG1ZEL1CUpSMc5uCwfW6gPKDJ5qXYR528Az1ZidFEmFP/W', 119, 4, 1),
(97, 'rohimamat', '$2y$10$DKjPU/iPBYHBpBV09tmEA.HRRS.TsOJl3LoNgPdUYK/dCJo9uQ.3W', 120, 4, 1),
(98, 'awwab al ubbadi', '$2y$10$53x1xZFYbrqOorc8yhyy9ebsSbRFNWM3HVJOWGf2wMzp3hdpOwHZm', 121, 4, 1),
(99, 'latiefikry', '$2y$10$jRGKxzQhOE1nCkbZmDm.FOnWozN.lDJmldqo5/mnmyblItgG767QG', 122, 4, 1),
(100, 'sahrudin', '$2y$10$8E5xe61oJ1xGfENI8tYR5uimqveYbhAK7roQ/97Fr6.NmVoW7Jqny', 123, 4, 1),
(101, 'roozika', '$2y$10$wND.AJLHWfM4ylxdwFJwGO7vG7/HuK40l6HUw5p4NByiWfQ.ySVjO', 124, 4, 1),
(102, 'fadielhdyt', '$2y$10$S74FlrvWvRD58nFoUtOk5ORMXGtIWbmWGzlbTQATbZi.il3d92iuu', 125, 4, 1),
(103, 'dwiprabowo', '$2y$10$lSAzvEqkXtXAWCNv85SJsOdMSZ5lD/tPtdhcrIhDwssNLfcPn0FGq', 126, 4, 1),
(104, 'dedimr', '$2y$10$suCakI4nYxeATC1HL7iSfuvNvGueAPd06wE6qQ04hojVBIeXnRJ8.', 127, 4, 1),
(105, 'fauziah', '$2y$10$C7C2PPQMl0zJOONEiSLy3OnEohHAuoz0IZaT8MTIIvi5FuLvYXKo.', 128, 4, 1),
(106, 'neng munasari', '$2y$10$3Gg1kUMtfzTK2dE2HwPIk.NH6DWVFTzAKiy6uoOv3cJxY258wrAte', 129, 4, 1),
(107, 'adinda silvana', '$2y$10$Y/e/Ry/hoakFOWC/5mvGtu//F0JB.ay2drQtzqnwSsEDBCTtr8jsq', 130, 4, 1),
(108, 'farhan', '$2y$10$JicVLSx0k7oGM/3VlKOXvOVQvzt7oX0SoKQN/ZOAJKjHGNxQx7/ze', 131, 4, 1),
(109, 'agusgoogle0896', '$2y$10$PY5M/qa.myEeRmwHdylnLeR91rJ6lWiY.4SjUa8mXwia2GJF03lCK', 132, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `ur_id` int(11) NOT NULL,
  `ur_ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`ur_id`, `ur_ket`) VALUES
(1, 'administrator'),
(5, 'fasilitator'),
(4, 'peserta');

-- --------------------------------------------------------

--
-- Table structure for table `users_sessions`
--

CREATE TABLE `users_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_sessions`
--

INSERT INTO `users_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0a8rhfga90escvp9os1op3bsp15uklkk', '172.68.253.217', 1525150561, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353135303536303b),
('0t4kpk8cupfhfldfrtfm83tfqfogavpt', '172.68.65.74', 1525040692, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303639323b),
('16u2dg5q34s7eu8ncs3bo831ap2ht2nf', '172.68.253.175', 1525059609, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353035393630393b),
('1n81sjuj08caonbi8of3po16g7m4jor7', '172.68.253.217', 1525093535, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353039333439313b),
('2g6d2qiim3fau6e5btcvonhd1d91ud4g', '172.69.70.19', 1525041026, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034313032363b),
('2k5j5snv7csg05rne2scfrk40k80sike', '172.68.65.110', 1525040701, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303730313b),
('36asjsammc8sdk307lgiq9ls8fnvjtqa', '108.162.229.174', 1525055946, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353035353934363b),
('3tbu01n3tgfptv5g1aro0hi6lcbrhmur', '162.158.146.90', 1525112874, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353131323837343b),
('40qmfost9jbi92nvgol7bhrjp69df2q2', '108.162.221.167', 1524984441, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343938343434313b),
('426q4bto61h84enhctc0o28io7kni40u', '162.158.59.54', 1524977809, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343937373830393b),
('43kgo9d7rekac17e7k6fd6egguckom6s', '162.158.79.217', 1525040690, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303639303b),
('4tm26j9mmh4uekvs40ft4tu211pjba4h', '162.158.179.84', 1525060551, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353036303535313b),
('5nnq66jahiqslnrptmled2ss2e77cs73', '162.158.78.228', 1524958289, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343935383238393b),
('6jec2lbn0u11gq2av6umia1cvscjd1ps', '162.158.78.54', 1525040688, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303638383b),
('7eu9keo0onh4ruvrondl1p7evn6d5n36', '172.69.62.24', 1525040702, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303730323b),
('7fdbdqlpn72ecdgp2jnvk6mipg25blb7', '162.158.106.20', 1525040674, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303637343b),
('808kvjom0glnmprh86ht9urm9ipacqln', '172.69.69.228', 1525027575, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353032373537353b),
('8a2afeaiqvh6g6d810tfvvg2cap1c28k', '162.158.79.97', 1525040703, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303730333b),
('8hl5hfocujsl8nfjqi61kd1c77sn9upd', '162.158.179.84', 1525059555, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353035393436373b7573657249647c733a313a2231223b757365724e616d657c733a353a2261646d696e223b7573657255727c733a313a2231223b75724b65747c733a31333a2261646d696e6973747261746f72223b757365724e616d617c733a31333a2241646d696e6973747261746f72223b75736572456d61696c7c4e3b7065736572746149647c4e3b70657365727461466f746f7c4e3b706573657274614b74707c4e3b706573657274614372656174657c733a31303a22417072696c2032303138223b69735f6c6f676765645f696e7c623a313b),
('8m3gpm0ikq32gi6v2k1d3lo24la11lq1', '162.158.146.156', 1525112876, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353131323837363b),
('8rcbasmeithmvjf3h9h9e7jotbe4g8tu', '172.69.70.19', 1525010256, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353031303235363b),
('9jr09t6olafjf8qv7v4pk5v8s7b61ro8', '108.162.221.167', 1525042844, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034323834343b),
('9v501uobqhkfrcbao6dnvra5pspa7o17', '162.158.78.228', 1525040469, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303436393b),
('ag45p5nf1o59bt42ftjnnrfugit8mghn', '162.158.78.132', 1525040684, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303638343b),
('bi3skgsuhgrf8e24bahfllmvenen0m7i', '162.158.79.67', 1525040697, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303639373b),
('bpi6ljjchngfsnebeuioddiiaplitj0m', '141.101.77.238', 1525055679, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353035353637393b),
('cqijimelr5ac7tkeg1eejnu5begak5o9', '162.158.79.133', 1525040700, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303730303b),
('e7uv1tekk8hsglmtu0621aqd7k5fh5kl', '172.69.69.228', 1525061185, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353036313138353b),
('ef0j4j1l1vfrulpcab8kf2c2atp8idnd', '162.158.59.144', 1525071009, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353037313030393b),
('el075q5qnfk48rrhdmi3kksacq352gmp', '172.69.69.96', 1525054753, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353035343735333b),
('f1r7v5r828fem97c9vccu7g7k5i3ahf2', '162.158.78.30', 1525040675, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303637353b),
('ff1r8iavvge8s3q64hn1oblsafl6qejk', '172.68.11.73', 1525097555, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353039373535353b),
('ffqoa832t944vna7se505oa7kraikno6', '173.245.54.9', 1525040686, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303638363b),
('go1iejbt01md68mfdrb6qels5l28lfak', '162.158.78.168', 1525040706, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303730363b),
('gsu27vmo83hrho1q8lm579eh52k9v3v0', '162.158.78.72', 1525040689, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303638393b),
('he4v3dmoj732echlme35bj4a463ne4hi', '172.69.62.120', 1525040685, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303638353b),
('hgmegc9b9o34gvujt1ciodkkirkpoj1m', '172.69.62.102', 1525040705, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303730353b),
('iu5trfknhshg8klqn37uhktc423jh2ie', '172.68.189.195', 1525040468, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303436383b),
('jb7q4fqg0q6sifsmhiummgr3rbuomhb0', '141.101.105.98', 1524953974, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343935333937343b),
('jfji39ov2cd96g3iudo6e7m755puj5ef', '162.158.79.121', 1524984837, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343938343833373b),
('lhvpk4fns7ke2p136apf7kqjc0t0gm1c', '162.158.78.30', 1524988865, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343938383836353b),
('mcfvuk0sr7p69o6r6uiaokqgrrjcmqh5', '162.158.78.36', 1525040691, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303639313b),
('mdqt57uhhtuvrc9cbeqp7ep869d5i92g', '172.68.244.176', 1525097553, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353039373535333b),
('mnpf6k2hlacklilmpab8vk6scl8cpbno', '172.68.65.68', 1525040699, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303639393b),
('o4av093r4c3gb3laujvqvplofcrgbutc', '162.158.78.114', 1525040696, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303639363b),
('oi7q26qr8oulmhk5d9laherkbk2hmkr3', '172.69.62.102', 1525040698, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303639383b),
('pbjasf20g9880sq1bo3vs11r2r0pev7o', '108.162.246.13', 1525040450, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303435303b),
('q7r6r69di8d8ae0b4dusu0f3h3s27bou', '172.68.65.248', 1525040704, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303730343b),
('r10mdgh4v1a3ph8j8gmjqq9rbmarvi81', '173.245.54.33', 1525040687, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303638373b),
('rk0rbpnfr585p0h9aql2f1810amhg55j', '162.158.78.30', 1524935616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343933353631353b),
('s0m83kou8j84g63b2bgd1lo9ino2lm6u', '162.158.59.54', 1525150560, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353135303536303b),
('sb2bdmtme2l8t3bhg94ju494neet8bq1', '162.158.59.54', 1525064160, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353036343136303b),
('te2p2dkmfm6gpkstsggc1lpskdbnml33', '172.69.62.162', 1525040681, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532353034303638313b),
('ttlhqg2h0jrm4k6kk3nnl4cqruob9j2v', '162.158.78.132', 1524937459, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532343933373435383b);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `footer_add`
--
ALTER TABLE `footer_add`
  ADD PRIMARY KEY (`fa_id`);

--
-- Indexes for table `footer_header_link`
--
ALTER TABLE `footer_header_link`
  ADD PRIMARY KEY (`fhl_id`);

--
-- Indexes for table `footer_link`
--
ALTER TABLE `footer_link`
  ADD PRIMARY KEY (`fl_id`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`ha_id`),
  ADD KEY `ha_menu` (`ha_menu`),
  ADD KEY `ha_ur` (`ha_ur`);

--
-- Indexes for table `itikaf`
--
ALTER TABLE `itikaf`
  ADD PRIMARY KEY (`itikaf_id`);

--
-- Indexes for table `kartu_identitas`
--
ALTER TABLE `kartu_identitas`
  ADD PRIMARY KEY (`ki_id`);

--
-- Indexes for table `konsumsi`
--
ALTER TABLE `konsumsi`
  ADD PRIMARY KEY (`konsumsi_id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `menu_parent` (`menu_parent`),
  ADD KEY `menu_ket` (`menu_ket`) USING BTREE,
  ADD KEY `menu_url` (`menu_url`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`peserta_id`),
  ADD KEY `peserta_nama` (`peserta_nama`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `sumber_informasi`
--
ALTER TABLE `sumber_informasi`
  ADD PRIMARY KEY (`si_id`);

--
-- Indexes for table `top_menu`
--
ALTER TABLE `top_menu`
  ADD PRIMARY KEY (`tm_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_username` (`user_username`),
  ADD KEY `user_nama` (`user_peserta`),
  ADD KEY `user_ur` (`user_ur`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`ur_id`),
  ADD KEY `ur_ket` (`ur_ket`);

--
-- Indexes for table `users_sessions`
--
ALTER TABLE `users_sessions`
  ADD PRIMARY KEY (`id`,`ip_address`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `footer_add`
--
ALTER TABLE `footer_add`
  MODIFY `fa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `footer_header_link`
--
ALTER TABLE `footer_header_link`
  MODIFY `fhl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `footer_link`
--
ALTER TABLE `footer_link`
  MODIFY `fl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `ha_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `itikaf`
--
ALTER TABLE `itikaf`
  MODIFY `itikaf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `kartu_identitas`
--
ALTER TABLE `kartu_identitas`
  MODIFY `ki_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konsumsi`
--
ALTER TABLE `konsumsi`
  MODIFY `konsumsi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `kota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `peserta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sumber_informasi`
--
ALTER TABLE `sumber_informasi`
  MODIFY `si_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `top_menu`
--
ALTER TABLE `top_menu`
  MODIFY `tm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `ur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
