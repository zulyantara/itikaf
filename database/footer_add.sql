-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `footer_add`;
CREATE TABLE `footer_add` (
  `fa_id` int(11) NOT NULL AUTO_INCREMENT,
  `fa_ket` varchar(50) NOT NULL,
  `fa_url` varchar(100) NOT NULL,
  PRIMARY KEY (`fa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

TRUNCATE `footer_add`;
INSERT INTO `footer_add` (`fa_id`, `fa_ket`, `fa_url`) VALUES
(2,	'test',	'http://localhost/itikaf/pages/pages-1');

-- 2017-06-03 05:53:51
