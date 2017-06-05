-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `footer_header_link`;
CREATE TABLE `footer_header_link` (
  `fhl_id` int(11) NOT NULL AUTO_INCREMENT,
  `fhl_header` varchar(100) NOT NULL,
  PRIMARY KEY (`fhl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `footer_header_link`;

DROP TABLE IF EXISTS `footer_link`;
CREATE TABLE `footer_link` (
  `fl_id` int(11) NOT NULL AUTO_INCREMENT,
  `fl_fhl` int(11) NOT NULL,
  `fl_ket` varchar(100) NOT NULL,
  `fl_link` varchar(255) NOT NULL,
  PRIMARY KEY (`fl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `footer_link`;

DROP TABLE IF EXISTS `hak_akses`;
CREATE TABLE `hak_akses` (
  `ha_id` int(11) NOT NULL AUTO_INCREMENT,
  `ha_menu` int(11) NOT NULL,
  `ha_ur` int(11) NOT NULL,
  `ha_view` int(11) DEFAULT '0',
  `ha_insert` int(11) DEFAULT '0',
  `ha_update` int(11) DEFAULT '0',
  `ha_delete` int(11) DEFAULT '0',
  `ha_proses` int(11) DEFAULT '0',
  PRIMARY KEY (`ha_id`),
  KEY `ha_menu` (`ha_menu`),
  KEY `ha_ur` (`ha_ur`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

TRUNCATE `hak_akses`;
INSERT INTO `hak_akses` (`ha_id`, `ha_menu`, `ha_ur`, `ha_view`, `ha_insert`, `ha_update`, `ha_delete`, `ha_proses`) VALUES
(1,	1,	1,	1,	1,	1,	1,	1),
(2,	2,	1,	1,	1,	1,	1,	0),
(10,	8,	1,	1,	1,	1,	1,	0),
(11,	8,	2,	0,	0,	0,	0,	0),
(20,	13,	1,	1,	1,	1,	1,	0),
(21,	13,	2,	0,	0,	0,	0,	0),
(22,	14,	1,	1,	1,	1,	1,	0),
(23,	14,	2,	0,	0,	0,	0,	0),
(24,	15,	1,	1,	1,	1,	1,	0),
(25,	15,	2,	0,	0,	0,	0,	0),
(26,	16,	1,	1,	1,	1,	1,	0),
(27,	16,	2,	0,	0,	0,	0,	0),
(30,	18,	1,	1,	1,	1,	1,	0),
(31,	18,	2,	0,	0,	0,	0,	0),
(32,	19,	1,	1,	1,	1,	1,	0),
(33,	19,	2,	0,	0,	0,	0,	0),
(34,	1,	2,	1,	0,	0,	0,	0),
(35,	20,	1,	1,	0,	1,	0,	0),
(36,	20,	2,	0,	0,	0,	0,	0),
(37,	21,	1,	1,	0,	0,	0,	0),
(38,	21,	2,	0,	0,	0,	0,	0),
(39,	22,	1,	1,	0,	0,	0,	0),
(40,	22,	2,	0,	0,	0,	0,	0),
(41,	23,	1,	1,	1,	1,	1,	0),
(42,	23,	2,	1,	0,	0,	0,	0),
(43,	24,	1,	1,	1,	1,	1,	0),
(44,	24,	2,	0,	0,	0,	0,	0),
(45,	25,	1,	1,	0,	0,	0,	0),
(46,	25,	2,	0,	0,	0,	0,	0),
(47,	26,	1,	1,	1,	1,	1,	0),
(48,	26,	2,	0,	0,	0,	0,	0),
(49,	27,	1,	1,	1,	1,	1,	0),
(50,	27,	2,	0,	0,	0,	0,	0);

DROP TABLE IF EXISTS `itikaf`;
CREATE TABLE `itikaf` (
  `itikaf_id` int(11) NOT NULL AUTO_INCREMENT,
  `itikaf_peserta` int(11) NOT NULL,
  `itikaf_tahun` char(4) NOT NULL,
  `itikaf_mulai` char(2) NOT NULL,
  `itikaf_jml_rombongan` int(11) NOT NULL,
  `itikaf_konsumsi` int(11) NOT NULL,
  `itikaf_sumber_informasi` int(11) NOT NULL,
  `itikaf_status` int(11) NOT NULL,
  `itikaf_insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`itikaf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

TRUNCATE `itikaf`;
INSERT INTO `itikaf` (`itikaf_id`, `itikaf_peserta`, `itikaf_tahun`, `itikaf_mulai`, `itikaf_jml_rombongan`, `itikaf_konsumsi`, `itikaf_sumber_informasi`, `itikaf_status`, `itikaf_insert_date`) VALUES
(1,	1,	'2017',	'20',	0,	3,	1,	1,	'2017-05-09 17:58:24'),
(2,	2,	'2017',	'20',	0,	3,	1,	1,	'2017-05-10 04:53:37');

DROP TABLE IF EXISTS `kartu_identitas`;
CREATE TABLE `kartu_identitas` (
  `ki_id` int(11) NOT NULL AUTO_INCREMENT,
  `ki_ket` varchar(100) NOT NULL,
  `ki_insert_date` timestamp NULL DEFAULT NULL,
  `ki_insert_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`ki_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

TRUNCATE `kartu_identitas`;
INSERT INTO `kartu_identitas` (`ki_id`, `ki_ket`, `ki_insert_date`, `ki_insert_user`) VALUES
(1,	'ktp',	'2017-05-08 11:29:10',	1),
(2,	'sim',	'2017-05-08 11:29:34',	1),
(3,	'ktm',	'2017-05-08 11:36:06',	1),
(4,	'kartu pelajar',	'2017-05-08 11:36:16',	1);

DROP TABLE IF EXISTS `konsumsi`;
CREATE TABLE `konsumsi` (
  `konsumsi_id` int(11) NOT NULL AUTO_INCREMENT,
  `konsumsi_ket` varchar(100) NOT NULL,
  `konsumsi_insert_date` timestamp NULL DEFAULT NULL,
  `konsumsi_insert_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`konsumsi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

TRUNCATE `konsumsi`;
INSERT INTO `konsumsi` (`konsumsi_id`, `konsumsi_ket`, `konsumsi_insert_date`, `konsumsi_insert_user`) VALUES
(1,	'sendiri',	'2017-05-08 11:40:43',	1),
(2,	'kolektif',	'2017-05-08 11:40:56',	1),
(3,	'diserahkan kepada panitia',	'2017-05-08 11:41:11',	1);

DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota` (
  `kota_id` int(11) NOT NULL AUTO_INCREMENT,
  `kota_ket` varchar(100) NOT NULL,
  `kota_insert_date` timestamp NULL DEFAULT NULL,
  `kota_insert_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`kota_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

TRUNCATE `kota`;
INSERT INTO `kota` (`kota_id`, `kota_ket`, `kota_insert_date`, `kota_insert_user`) VALUES
(2,	'bogor',	'2017-05-08 11:48:30',	1),
(3,	'jakarta',	'2017-05-08 11:48:36',	1),
(4,	'depok',	'2017-05-08 11:48:42',	1),
(5,	'bandung',	'2017-05-08 11:48:49',	1),
(6,	'bekasi',	'2017-05-08 11:49:07',	1),
(7,	'tangerang',	'2017-05-08 11:49:12',	1);

DROP TABLE IF EXISTS `logo`;
CREATE TABLE `logo` (
  `logo_id` int(11) NOT NULL AUTO_INCREMENT,
  `logo_ket` varchar(10) NOT NULL,
  PRIMARY KEY (`logo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `logo`;

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_ket` varchar(50) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_order` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `menu_parent` (`menu_parent`),
  KEY `menu_ket` (`menu_ket`) USING BTREE,
  KEY `menu_url` (`menu_url`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

TRUNCATE `menu`;
INSERT INTO `menu` (`menu_id`, `menu_ket`, `menu_parent`, `menu_url`, `menu_order`) VALUES
(1,	'dashboard',	0,	'cpanels',	1),
(2,	'master',	0,	'#',	2),
(8,	'menu',	2,	'cpanel_menu',	1),
(13,	'sumber informasi',	0,	'cpanel_sumber_informasi',	6),
(14,	'role',	2,	'cpanel_user_role',	2),
(15,	'user',	2,	'cpanel_user',	3),
(16,	'kartu identitas',	0,	'cpanel_kartu_identitas',	4),
(18,	'konsumsi',	0,	'cpanel_konsumsi',	5),
(19,	'kota',	0,	'cpanel_kota',	6),
(20,	'aktivasi peserta',	0,	'cpanel_aktivasi',	8),
(21,	'divider',	0,	'#',	3),
(22,	'divider',	0,	'#',	7),
(23,	'peserta i\'itikaf aktiv',	0,	'cpanel_peserta',	10),
(24,	'slider',	2,	'cpanel_slider',	4),
(25,	'divider',	2,	'#',	5),
(26,	'footer header',	2,	'cpanel_fheader',	6),
(27,	'footer link',	2,	'cpanel_flink',	7);

DROP TABLE IF EXISTS `peserta`;
CREATE TABLE `peserta` (
  `peserta_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `peserta_website` varchar(255) DEFAULT NULL,
  `peserta_telepon` varchar(15) DEFAULT NULL,
  `peserta_hp` varchar(15) NOT NULL,
  `peserta_pendidikan` varchar(255) DEFAULT NULL,
  `peserta_jurusan` varchar(255) DEFAULT NULL,
  `peserta_organisasi` varchar(255) DEFAULT NULL,
  `peserta_posisi` varchar(255) DEFAULT NULL,
  `peserta_foto` varchar(255) DEFAULT NULL,
  `peserta_ktp` varchar(255) DEFAULT NULL,
  `peserta_insert_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `peserta_update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`peserta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

TRUNCATE `peserta`;
INSERT INTO `peserta` (`peserta_id`, `peserta_nama`, `peserta_sex`, `peserta_tempat_lahir`, `peserta_tanggal_lahir`, `peserta_status_pernikahan`, `peserta_alamat`, `peserta_kota`, `peserta_kartu_identitas`, `peserta_no_kartu_identitas`, `peserta_email`, `peserta_website`, `peserta_telepon`, `peserta_hp`, `peserta_pendidikan`, `peserta_jurusan`, `peserta_organisasi`, `peserta_posisi`, `peserta_foto`, `peserta_ktp`, `peserta_insert_date`, `peserta_update_date`) VALUES
(1,	'zulyantara',	'l',	'bengkulu',	'1983-08-25',	1,	'Bogor',	2,	1,	'1234',	'zulyantara@gmail.com',	'',	'',	'081290141995',	'STMIK Bina Insani',	'Manajemen Administrasi Sistem Informasi',	'',	'',	NULL,	NULL,	'2017-05-10 04:45:43',	'2017-05-09 23:45:43'),
(2,	'eny kurniawati',	'p',	'jakarta',	'1987-05-22',	1,	'test',	2,	1,	'2345',	'ekwa65@gmail.com',	'',	'',	'081290141995',	'',	'',	'',	'',	NULL,	NULL,	'2017-05-08 13:37:21',	NULL);

DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_src` varchar(20) NOT NULL,
  `slider_alt` varchar(100) NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

TRUNCATE `slider`;
INSERT INTO `slider` (`slider_id`, `slider_src`, `slider_alt`) VALUES
(1,	'slider_0.jpg',	'test 1'),
(2,	'slider_1.jpg',	'teste 2'),
(3,	'slider_2.jpg',	'test 3');

DROP TABLE IF EXISTS `sumber_informasi`;
CREATE TABLE `sumber_informasi` (
  `si_id` int(11) NOT NULL AUTO_INCREMENT,
  `si_ket` varchar(255) NOT NULL,
  `si_insert_date` timestamp NULL DEFAULT NULL,
  `si_insert_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`si_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

TRUNCATE `sumber_informasi`;
INSERT INTO `sumber_informasi` (`si_id`, `si_ket`, `si_insert_date`, `si_insert_user`) VALUES
(1,	'teman',	'2017-05-08 11:56:25',	1),
(2,	'media cetak',	'2017-05-08 11:56:36',	1),
(3,	'media elektronik',	'2017-05-08 11:56:46',	1),
(4,	'internet',	'2017-05-08 11:56:55',	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_ur` int(11) NOT NULL,
  `user_active` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_username` (`user_username`),
  KEY `user_nama` (`user_nama`),
  KEY `user_email` (`user_email`),
  KEY `user_ur` (`user_ur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

TRUNCATE `users`;
INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_email`, `user_ur`, `user_active`) VALUES
(1,	'admin',	'$2y$12$kof95rzoHFcnICJlWwnpRuBURUmzYblb4S4b7KEwAOsYE5Iq611le',	'administrator',	'admin@localhost.com',	1,	1),
(3,	'zulyantara',	'$2y$10$MtdSNnkhMvu8tANxUne0IeqlpYUShqtXGAgoe1uYNCcxknHGJicUm',	'zulyantara',	'zulyantra@gmail.com',	2,	0),
(4,	'eny',	'$2y$10$soXkgHgZo1MfMVqzA4Vulu1vQoO.//DQ.m75xHcQ/eQfkNQv9tyGi',	'eny kurniawati',	'ekwa65@gmail.com',	2,	0);

DROP TABLE IF EXISTS `users_role`;
CREATE TABLE `users_role` (
  `ur_id` int(11) NOT NULL AUTO_INCREMENT,
  `ur_ket` varchar(50) NOT NULL,
  PRIMARY KEY (`ur_id`),
  KEY `ur_ket` (`ur_ket`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

TRUNCATE `users_role`;
INSERT INTO `users_role` (`ur_id`, `ur_ket`) VALUES
(1,	'administrator'),
(2,	'peserta');

DROP TABLE IF EXISTS `users_sessions`;
CREATE TABLE `users_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`,`ip_address`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE `users_sessions`;
INSERT INTO `users_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('10g617sgp4uhihcgdgl6bi81r4nhb44q',	'::1',	1494413198,	'__ci_last_regenerate|i:1494413198;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('5hoi50urlb647tkuqpgge9khefbh7ejl',	'::1',	1494350553,	'__ci_last_regenerate|i:1494350553;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('6h9k56huohcshv4ufpfegfi0leqsa29v',	'::1',	1494396797,	'__ci_last_regenerate|i:1494396713;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('6l2shnfiafqe6si4i74pvms17j0ujpke',	'::1',	1494392237,	'__ci_last_regenerate|i:1494392237;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('705316d3okgqn5uuudebflridkfrtjv4',	'::1',	1494410711,	'__ci_last_regenerate|i:1494410711;'),
('7t4sh40g9tifl0kr20sggof0cbbtghn4',	'::1',	1494391519,	'__ci_last_regenerate|i:1494391519;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('85gnepfq8cgq6kf67c32qk9d2grp7r8v',	'::1',	1494390851,	'__ci_last_regenerate|i:1494390851;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('8mi6p51k20i02gqtqh3ueckgl22hmnro',	'::1',	1494303769,	'__ci_last_regenerate|i:1494303769;'),
('b5bmtl5b15ihsivn835oat3tnshg5d2g',	'::1',	1494412768,	'__ci_last_regenerate|i:1494412768;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('b72snc392jfv9261amm6o6ulpe1qcocs',	'::1',	1494353024,	'__ci_last_regenerate|i:1494353024;'),
('b7dte7mbok9r8dj08avh3aua37a9ifca',	'::1',	1494348642,	'__ci_last_regenerate|i:1494348642;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('bbiuoiibov70i79f4l9i2lnvvgoeqr71',	'::1',	1494392837,	'__ci_last_regenerate|i:1494392837;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('bd72n4ufn6be9fukqu9nuv19ekrnd57s',	'::1',	1494394827,	'__ci_last_regenerate|i:1494394827;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('bgrefvl4ooo5b4tppqp71c7bj5j53fe4',	'127.0.0.1',	1495787825,	'__ci_last_regenerate|i:1495787825;'),
('cargil3vgpashr8h12c2h427sfncc3jp',	'127.0.0.1',	1495771285,	'__ci_last_regenerate|i:1495771001;'),
('dhmno25dh316rv7udbjtr3rns17nv4lm',	'::1',	1494352042,	'__ci_last_regenerate|i:1494352042;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('dobqupfgprjfaph9mlsiiftj2ph0u97t',	'::1',	1494351260,	'__ci_last_regenerate|i:1494351260;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('gkn7lee423387k1bnr7d63g084556sqj',	'::1',	1494391930,	'__ci_last_regenerate|i:1494391930;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('gpmnkg4uco0umhqv78qa8lhp3ubvfejp',	'::1',	1494396713,	'__ci_last_regenerate|i:1494396713;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('gs725aqknd13aa9dvqiuhvotri8d5144',	'::1',	1494387831,	'__ci_last_regenerate|i:1494387831;'),
('hctbpl0md5ksf5obn052ma47qirjr8rb',	'127.0.0.1',	1495795219,	'__ci_last_regenerate|i:1495795051;'),
('i66f56trgd303hlsgk794pql2gv9e62b',	'::1',	1494411485,	'__ci_last_regenerate|i:1494411485;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('j066ao7srn488du0dgq4odjsap0jnpch',	'::1',	1494391178,	'__ci_last_regenerate|i:1494391178;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('k080ofcfopm5ps8rdpgnnodn8lap9616',	'::1',	1494394479,	'__ci_last_regenerate|i:1494394479;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('kmqg585mr2c2fdntt497a062to5spi83',	'::1',	1494350184,	'__ci_last_regenerate|i:1494350184;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('lgmf78d56n1l8pqh4pedovoc0skn2f0h',	'::1',	1494413560,	'__ci_last_regenerate|i:1494413560;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('n5s9nb6gpaqeb9sd5voju75oougmsdbe',	'::1',	1494352704,	'__ci_last_regenerate|i:1494352704;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('nlvfev71v55p2uovuk6figtju7ir3kbo',	'::1',	1494396364,	'__ci_last_regenerate|i:1494396364;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('opmdbu12cd507m49aq7lctaklt8gde8b',	'::1',	1494352395,	'__ci_last_regenerate|i:1494352395;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('p2jbt25olehvk3a87dujov5dqnm9vp9n',	'127.0.0.1',	1495770614,	'__ci_last_regenerate|i:1495770614;'),
('pnq0421pqr60o3q0snh8hbb1bk86s8ls',	'127.0.0.1',	1495787872,	'__ci_last_regenerate|i:1495787825;'),
('ppngj34dlasb6hr8dh58k0tlts0u82lf',	'::1',	1494395542,	'__ci_last_regenerate|i:1494395542;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('r93pjsgb54u96sm17lpkbavugm1isq90',	'127.0.0.1',	1495771001,	'__ci_last_regenerate|i:1495771001;'),
('scfqknhjj9h3lt9j008cdd1if1494gnm',	'::1',	1494273875,	'__ci_last_regenerate|i:1494273875;'),
('sctr149f7ola1du0s7kr94egd2ilks4j',	'::1',	1494350925,	'__ci_last_regenerate|i:1494350925;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('to3vs0h1t9nk17j73ttcn5k48hdqprh0',	'::1',	1494353024,	'__ci_last_regenerate|i:1494353024;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;'),
('vj1e7sj2bvbcbvpcinck1j6bg7sisoch',	'::1',	1494413771,	'__ci_last_regenerate|i:1494413560;userId|s:1:\"1\";userName|s:5:\"admin\";userUr|s:1:\"1\";urKet|s:13:\"administrator\";userNama|s:13:\"administrator\";userEmail|s:19:\"admin@localhost.com\";is_logged_in|b:1;');

-- 2017-05-26 14:21:01
