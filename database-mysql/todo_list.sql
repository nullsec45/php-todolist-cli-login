-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tbl_todolist`;
CREATE TABLE `tbl_todolist` (
  `id` int(11) DEFAULT NULL,
  `todo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_todolist` (`id`, `todo`) VALUES
(1,	'Belajar PHP'),
(2,	'Belajar Python'),
(3,	'belajar node js'),
(4,	'belajar golang');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_users` (`id`, `username`, `password`, `created_at`) VALUES
(1,	'fajar',	'f14bfc3957cc08992e42f28e0167ffc65bac0633c69f1aaf0d378dcacfdd9114',	'2022-09-06 07:36:23');

-- 2022-09-06 07:37:13
