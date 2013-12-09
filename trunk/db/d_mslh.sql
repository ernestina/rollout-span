-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2013 at 06:16 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dasbor`
--

-- --------------------------------------------------------

--
-- Table structure for table `d_mslh`
--

CREATE TABLE IF NOT EXISTS `d_mslh` (
  `kd_d_mslh` int(11) NOT NULL AUTO_INCREMENT,
  `kd_d_user` int(11) NOT NULL,
  `tgl_mslh` date NOT NULL,
  `masalah` text NOT NULL,
  PRIMARY KEY (`kd_d_mslh`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `d_mslh`
--

INSERT INTO `d_mslh` (`kd_d_mslh`, `kd_d_user`, `tgl_mslh`, `masalah`) VALUES
(1, 1, '2013-12-06', 'wwwwww'),
(7, 88888, '2013-12-18', 'rrrrrrrrrr');
