-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

TRUNCATE `menu`;
INSERT INTO `menu` (`menu_id`, `menu_ket`, `menu_parent`, `menu_url`, `menu_order`) VALUES
(1,	'dashboard',	0,	'cpanels',	1),
(2,	'master',	0,	'#',	2),
(8,	'menu',	2,	'cpanel_menu',	1),
(13,	'sumber informasi',	0,	'cpanel_sumber_informasi',	5),
(14,	'role',	2,	'cpanel_user_role',	2),
(15,	'user',	2,	'cpanel_user',	3),
(16,	'kartu identitas',	0,	'cpanel_kartu_identitas',	3),
(18,	'konsumsi',	0,	'cpanel_konsumsi',	4),
(19,	'kota',	0,	'cpanel_kota',	6),
(20,	'aktivasi peserta',	0,	'cpanel_aktivasi',	7),
(23,	'peserta i\'itikaf aktiv',	0,	'cpanel_peserta',	8),
(24,	'slider',	2,	'cpanel_slider',	4),
(26,	'footer header',	2,	'cpanel_fheader',	6),
(27,	'footer link',	2,	'cpanel_flink',	7),
(28,	'logo',	2,	'cpanel_logo',	5),
(29,	'profil',	0,	'cpanel_profile',	9),
(30,	'menu top',	2,	'cpanel_tm',	8);

-- 2017-05-31 10:42:19
