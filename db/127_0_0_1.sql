-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 25, 2020 at 07:49 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvsoftdemo`
--
CREATE DATABASE IF NOT EXISTS `mvsoftdemo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mvsoftdemo`;

-- --------------------------------------------------------

--
-- Table structure for table `engineers`
--

DROP TABLE IF EXISTS `engineers`;
CREATE TABLE IF NOT EXISTS `engineers` (
  `username` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `PRC_no` varchar(20) NOT NULL,
  `PTR_no` varchar(20) NOT NULL,
  `issued_at` date NOT NULL,
  `validity` int(11) NOT NULL,
  `date_issued` date NOT NULL,
  `TIN` varchar(20) NOT NULL,
  `attach_license` varchar(50) NOT NULL,
  `attach_tin` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `PRC_no` (`PRC_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `engineers`
--

INSERT INTO `engineers` (`username`, `address`, `PRC_no`, `PTR_no`, `issued_at`, `validity`, `date_issued`, `TIN`, `attach_license`, `attach_tin`, `status`) VALUES
('engr1', 'engr1', 'engr1', 'engr1', '2020-09-17', 3, '2020-09-17', 'engr1', '/uploads/engr1-attach_license.png', '/uploads/engr1-attach_tin.png', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `m_applications`
--

DROP TABLE IF EXISTS `m_applications`;
CREATE TABLE IF NOT EXISTS `m_applications` (
  `app_no` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `building_permit_no` varchar(20) DEFAULT NULL,
  `mp_no` varchar(20) DEFAULT NULL,
  `bp_no` varchar(20) DEFAULT NULL,
  `lname` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mi` varchar(1) NOT NULL,
  `tin_no` varchar(20) NOT NULL,
  `fco` varchar(50) NOT NULL,
  `form_ownership` varchar(50) NOT NULL,
  `lis_char_occup` varchar(50) NOT NULL,
  `add_house_no` varchar(20) NOT NULL,
  `add_street` varchar(20) NOT NULL,
  `add_brgy` varchar(20) NOT NULL,
  `add_city` varchar(20) NOT NULL,
  `add_zip` varchar(5) NOT NULL,
  `tel_no` varchar(20) NOT NULL,
  `loc_lot_no` varchar(10) NOT NULL,
  `loc_block_no` varchar(10) NOT NULL,
  `loc_tct_no` varchar(20) NOT NULL,
  `loc_taxdec_no` varchar(20) NOT NULL,
  `loc_street` varchar(20) NOT NULL,
  `loc_brgy` varchar(20) NOT NULL,
  `loc_city` varchar(20) NOT NULL,
  `scope` tinytext NOT NULL,
  `others` varchar(20) NOT NULL,
  `permit_type` varchar(20) NOT NULL DEFAULT 'mechanical permit',
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `checked_by` varchar(20) DEFAULT NULL,
  `iao` varchar(50) DEFAULT NULL,
  `other_iao` varchar(50) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`app_no`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_applications`
--

INSERT INTO `m_applications` (`app_no`, `user`, `building_permit_no`, `mp_no`, `bp_no`, `lname`, `fname`, `mi`, `tin_no`, `fco`, `form_ownership`, `lis_char_occup`, `add_house_no`, `add_street`, `add_brgy`, `add_city`, `add_zip`, `tel_no`, `loc_lot_no`, `loc_block_no`, `loc_tct_no`, `loc_taxdec_no`, `loc_street`, `loc_brgy`, `loc_city`, `scope`, `others`, `permit_type`, `status`, `checked_by`, `iao`, `other_iao`, `cost`) VALUES
(1, 'user1', '45678', NULL, NULL, 'Dalawampu', 'Warren', 'L', '345678', 'dhasda', 'sdassda', 'sadas', '43', 'sdasda', '237823728', 'shdas', '3423', '45678', '123', '231', '1362', '2312', 'sjadhs', 'sdfks', 'dsfnjl', 'conversion', '', 'mechanical permit', 'payment done', 'engr1', 'freight_elevator', '', '1000000.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `usertype` varchar(10) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `username`, `password`, `usertype`) VALUES
('admin Warren Dalawampu ', 'war', '7815696ecbf1c96e6894b779456d330e', 'admin'),
('user warren', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user'),
('engr 1', 'engr1', '85ef8af1b870a19e31c903a03f95457a', 'engineer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
