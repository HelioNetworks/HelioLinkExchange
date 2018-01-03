-- Wap PhpMyAdmin 211
-- http://master-land.net/phpmyadmin 
-- Generation Time: 2018-01-02 05:59
-- MySQL Server Version: 5.6.35
-- PHP Version: 5.6.32

-- Database: `mrj_test`


-- --------------------------------------------------------
-- 
-- Table structure for table `ips`
-- 

CREATE TABLE `ips` (
  `id` bigint(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) NOT NULL,
  `ip2` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- 
-- Table structure for table `topsite`
-- 

CREATE TABLE `topsite` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `url` varchar(255) NOT NULL,
  `clicks` bigint(20) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
