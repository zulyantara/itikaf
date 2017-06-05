-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `top_menu`;
CREATE TABLE `top_menu` (
  `tm_id` int(11) NOT NULL AUTO_INCREMENT,
  `tm_ket` varchar(50) NOT NULL,
  `tm_url` varchar(100) NOT NULL,
  PRIMARY KEY (`tm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

TRUNCATE `top_menu`;
INSERT INTO `top_menu` (`tm_id`, `tm_ket`, `tm_url`) VALUES
(1,	'pendaftaran',	'pendaftaran');

-- 2017-05-31 10:42:35
