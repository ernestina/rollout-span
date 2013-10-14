-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2013 at 03:15 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dasbor`
--

-- --------------------------------------------------------

--
-- Table structure for table `d_apk`
--

CREATE TABLE IF NOT EXISTS `d_apk` (
  `kd_d_apk` int(11) NOT NULL AUTO_INCREMENT,
  `kd_d_user` int(11) NOT NULL,
  `kd_d_tgl` date NOT NULL,
  `kd_d_akun` int(11) DEFAULT NULL,
  `kd_d_pel` int(11) DEFAULT NULL,
  `kd_d_masalah` varchar(1023) DEFAULT NULL,
  PRIMARY KEY (`kd_d_apk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `d_apk`
--

INSERT INTO `d_apk` (`kd_d_apk`, `kd_d_user`, `kd_d_tgl`, `kd_d_akun`, `kd_d_pel`, `kd_d_masalah`) VALUES
(1, 1, '2013-10-08', 32234234, 34234234, 'joijoikmfokwmdvomerovmeor'),
(2, 3, '2013-10-17', 343, 3, 'FVSDFVSDF');

-- --------------------------------------------------------

--
-- Table structure for table `d_ba`
--

CREATE TABLE IF NOT EXISTS `d_ba` (
  `kd_d_ba` int(11) NOT NULL AUTO_INCREMENT,
  `kd_d_user` int(11) NOT NULL,
  `kd_d_user_ba` int(11) DEFAULT NULL,
  `kd_d_tgl` date DEFAULT NULL,
  `kd_d_spm` int(11) DEFAULT NULL,
  `kd_d_spm_gagal` int(11) DEFAULT NULL,
  `kd_d_rekon` int(11) DEFAULT NULL,
  `kd_d_rekon_gagal` int(11) DEFAULT NULL,
  `kd_d_kontrak` int(11) DEFAULT NULL,
  `kd_d_kontrak_gagal` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_d_ba`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `d_ba`
--

INSERT INTO `d_ba` (`kd_d_ba`, `kd_d_user`, `kd_d_user_ba`, `kd_d_tgl`, `kd_d_spm`, `kd_d_spm_gagal`, `kd_d_rekon`, `kd_d_rekon_gagal`, `kd_d_kontrak`, `kd_d_kontrak_gagal`) VALUES
(8, 99999, 1, '2013-10-13', 1, 1211, 1, 1207, 1, 3411),
(9, 99999, 2, '2013-10-13', 12345, 234, 2345, 23, 2345, 23),
(10, 99999, 1, '2013-10-14', 123456, 123, 23456, 23, 12345, 123),
(11, 99999, 4, '2013-10-14', 2345, 234, 23456, 234, 2345, 234),
(12, 99999, 1, '2013-10-16', 232, 23, 23, 2, 232, 2);

-- --------------------------------------------------------

--
-- Table structure for table `d_bobot`
--

CREATE TABLE IF NOT EXISTS `d_bobot` (
  `konversi` int(11) DEFAULT NULL,
  `sp2d` int(11) DEFAULT NULL,
  `lhp` int(11) DEFAULT NULL,
  `rekon` int(11) DEFAULT NULL,
  `spm_ba` int(11) DEFAULT NULL,
  `rekon_ba` int(11) DEFAULT NULL,
  `kontrak_ba` int(11) DEFAULT NULL,
  `sp2d_pkn` int(11) DEFAULT NULL,
  `spt_pkn` int(11) DEFAULT NULL,
  `kppn` int(11) DEFAULT NULL,
  `ba` int(11) DEFAULT NULL,
  `pkn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_bobot`
--

INSERT INTO `d_bobot` (`konversi`, `sp2d`, `lhp`, `rekon`, `spm_ba`, `rekon_ba`, `kontrak_ba`, `sp2d_pkn`, `spt_pkn`, `kppn`, `ba`, `pkn`) VALUES
(25, 20, 30, 25, 40, 30, 30, 70, 30, 50, 20, 30);

-- --------------------------------------------------------

--
-- Table structure for table `d_djpu`
--

CREATE TABLE IF NOT EXISTS `d_djpu` (
  `kd_d_djpu` int(11) NOT NULL AUTO_INCREMENT,
  `kd_d_user` int(11) NOT NULL,
  `kd_d_tgl` date NOT NULL,
  `kd_d_node` int(11) DEFAULT NULL,
  `kd_d_masalah` varchar(1023) DEFAULT NULL,
  PRIMARY KEY (`kd_d_djpu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `d_kanwil`
--

CREATE TABLE IF NOT EXISTS `d_kanwil` (
  `kd_d_kanwil` int(11) NOT NULL AUTO_INCREMENT,
  `kd_d_user` int(11) NOT NULL,
  `kd_d_tgl` date NOT NULL,
  `kd_d_rekon` int(11) DEFAULT NULL,
  `kd_d_jaringan` varchar(1023) DEFAULT NULL,
  `kd_d_masalah` varchar(1023) DEFAULT NULL,
  PRIMARY KEY (`kd_d_kanwil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `d_kanwil`
--

INSERT INTO `d_kanwil` (`kd_d_kanwil`, `kd_d_user`, `kd_d_tgl`, `kd_d_rekon`, `kd_d_jaringan`, `kd_d_masalah`) VALUES
(1, 1000, '2013-10-08', 2, '1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890', '1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890'),
(3, 4000, '2013-10-15', 23, 'knkk65789', 'hkhk657890'),
(4, 2000, '2013-10-16', 1, '2d', 'dvcsdfvdfv');

-- --------------------------------------------------------

--
-- Table structure for table `d_kppn`
--

CREATE TABLE IF NOT EXISTS `d_kppn` (
  `kd_d_kppn` int(11) NOT NULL AUTO_INCREMENT,
  `kd_d_user` int(11) NOT NULL,
  `kd_d_tgl` date DEFAULT NULL,
  `kd_d_konversi` int(11) DEFAULT NULL,
  `kd_d_konversi_gagal` int(11) DEFAULT NULL,
  `kd_d_sp2d` int(11) DEFAULT NULL,
  `kd_d_sp2d_gagal` int(11) DEFAULT NULL,
  `kd_d_lhp` int(11) DEFAULT NULL,
  `kd_d_lhp_gagal` int(11) DEFAULT NULL,
  `kd_d_rekon` int(11) DEFAULT NULL,
  `kd_d_rekon_gagal` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_d_kppn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `d_kppn`
--

INSERT INTO `d_kppn` (`kd_d_kppn`, `kd_d_user`, `kd_d_tgl`, `kd_d_konversi`, `kd_d_konversi_gagal`, `kd_d_sp2d`, `kd_d_sp2d_gagal`, `kd_d_lhp`, `kd_d_lhp_gagal`, `kd_d_rekon`, `kd_d_rekon_gagal`) VALUES
(1, 10002, '2013-10-02', 442, 54, 926, 785, 680, 513, 593, 351),
(2, 10006, '2013-10-02', 159, 635, 404, 960, 610, 608, 318, 543),
(3, 10002, '2013-10-03', 95, 41, 177, 695, 847, 891, 401, 617),
(4, 10006, '2013-10-03', 316, 731, 117, 692, 915, 15, 19, 605),
(5, 10002, '2013-10-04', 244, 86, 43, 189, 689, 432, 39, 564),
(6, 10006, '2013-10-04', 291, 404, 85, 500, 975, 982, 994, 430),
(7, 10002, '2013-10-05', 384, 384, 605, 950, 10, 157, 696, 648),
(8, 10006, '2013-10-05', 297, 952, 937, 868, 88, 556, 329, 626),
(9, 10002, '2013-10-06', 386, 248, 537, 883, 457, 784, 598, 929),
(10, 10006, '2013-10-06', 845, 224, 314, 183, 294, 549, 831, 109),
(11, 10002, '2013-10-07', 864, 538, 841, 898, 239, 698, 587, 967),
(12, 10006, '2013-10-07', 20, 262, 966, 218, 987, 899, 397, 602),
(13, 10002, '2013-10-08', 114, 792, 629, 173, 895, 16, 787, 770),
(14, 10006, '2013-10-08', 225, 927, 207, 655, 675, 798, 947, 125),
(15, 10002, '2013-11-02', 442, 138, 727, 5, 461, 113, 837, 349),
(16, 10006, '2013-11-02', 62, 202, 929, 97, 539, 376, 230, 815),
(17, 10002, '2013-11-03', 432, 238, 674, 361, 372, 770, 574, 303),
(18, 10006, '2013-11-03', 14, 72, 647, 483, 619, 811, 541, 585),
(19, 10002, '2013-11-04', 632, 182, 714, 330, 296, 750, 559, 879),
(20, 10006, '2013-11-04', 465, 836, 932, 711, 454, 978, 767, 283),
(21, 10002, '2013-11-05', 808, 646, 702, 345, 869, 64, 526, 695),
(22, 10006, '2013-11-05', 610, 819, 933, 692, 937, 845, 750, 584),
(23, 10002, '2013-11-06', 30, 941, 931, 741, 885, 631, 589, 192),
(24, 10006, '2013-11-06', 136, 895, 270, 982, 343, 216, 715, 567),
(25, 10002, '2013-11-07', 949, 483, 57, 129, 32, 282, 831, 724),
(26, 10006, '2013-11-07', 131, 416, 794, 877, 526, 417, 116, 223),
(27, 10002, '2013-11-08', 277, 345, 355, 250, 222, 880, 485, 500),
(28, 10006, '2013-11-08', 530, 405, 844, 742, 52, 732, 281, 671),
(29, 10002, '2013-12-02', 511, 408, 808, 53, 616, 575, 209, 432),
(30, 10006, '2013-12-02', 298, 722, 31, 285, 879, 250, 400, 549),
(31, 10002, '2013-12-03', 366, 242, 850, 79, 522, 448, 416, 649),
(32, 10006, '2013-12-03', 741, 114, 642, 551, 539, 168, 683, 276),
(33, 10002, '2013-12-04', 316, 314, 327, 181, 651, 619, 327, 650),
(34, 10006, '2013-12-04', 491, 152, 769, 145, 835, 614, 727, 853),
(35, 10002, '2013-12-05', 379, 643, 268, 610, 389, 716, 914, 579),
(36, 10006, '2013-12-05', 697, 705, 43, 453, 782, 345, 238, 226),
(37, 10002, '2013-12-06', 232, 983, 368, 371, 166, 602, 648, 954),
(38, 10006, '2013-12-06', 309, 147, 684, 4, 612, 800, 21, 985),
(39, 10002, '2013-12-07', 146, 233, 724, 88, 198, 927, 799, 231),
(40, 10006, '2013-12-07', 504, 877, 450, 3, 861, 466, 211, 73),
(41, 10002, '2013-12-08', 231, 801, 18, 135, 993, 766, 848, 700);

-- --------------------------------------------------------

--
-- Table structure for table `d_pkn`
--

CREATE TABLE IF NOT EXISTS `d_pkn` (
  `kd_d_pkn` int(11) NOT NULL AUTO_INCREMENT,
  `kd_d_user` int(11) NOT NULL,
  `kd_d_tgl` date NOT NULL,
  `kd_d_sp2d` int(11) DEFAULT NULL,
  `kd_d_sp2d_gagal` int(11) DEFAULT NULL,
  `kd_d_spt` int(11) DEFAULT NULL,
  `kd_d_spt_gagal` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_d_pkn`),
  KEY `kd_d_pkn` (`kd_d_pkn`),
  KEY `kd_d_pkn_2` (`kd_d_pkn`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `d_pkn`
--

INSERT INTO `d_pkn` (`kd_d_pkn`, `kd_d_user`, `kd_d_tgl`, `kd_d_sp2d`, `kd_d_sp2d_gagal`, `kd_d_spt`, `kd_d_spt_gagal`) VALUES
(1, 1, '2013-10-08', 21, 23, 121, 34),
(2, 2, '2013-09-09', 232, 232, 232, 23),
(4, 1, '2013-10-08', 21, 23, 121, 23),
(5, 2, '2013-09-09', 232, 232, 232, 23),
(7, 10006, '2013-10-15', 2, 2, 2, 234),
(8, 88888, '2013-10-15', 12, 12, 12, 12),
(9, 88888, '2013-10-17', 123, 12, 12, 123);

-- --------------------------------------------------------

--
-- Table structure for table `d_smi`
--

CREATE TABLE IF NOT EXISTS `d_smi` (
  `kd_d_smi` int(11) NOT NULL AUTO_INCREMENT,
  `kd_d_user` int(11) NOT NULL,
  `kd_d_tgl` date NOT NULL,
  `kd_d_akun` int(11) DEFAULT NULL,
  `kd_d_pel` int(11) DEFAULT NULL,
  `kd_d_masalah` varchar(1023) DEFAULT NULL,
  PRIMARY KEY (`kd_d_smi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `d_smi`
--

INSERT INTO `d_smi` (`kd_d_smi`, `kd_d_user`, `kd_d_tgl`, `kd_d_akun`, `kd_d_pel`, `kd_d_masalah`) VALUES
(1, 1, '2013-10-08', 32234234, 34234234, 'joijoikmfokwmdvomerovmeor'),
(2, 4, '2013-10-16', 4, 4, 'aaaaaaaaaaaaaaaaaaa'),
(3, 2, '2013-10-10', 3423, 234, 'gwrggwerg'),
(4, 1, '2013-10-04', 0, 2, 'wdcdcqedcwdecwd');

-- --------------------------------------------------------

--
-- Table structure for table `d_tetap`
--

CREATE TABLE IF NOT EXISTS `d_tetap` (
  `kd_d_tetap` int(11) NOT NULL AUTO_INCREMENT,
  `kd_r_unit` varchar(50) NOT NULL,
  `d_tetap_fo1` varchar(255) DEFAULT NULL,
  `d_tetap_fo1_nip` varchar(50) DEFAULT NULL,
  `d_tetap_trainer` varchar(255) DEFAULT NULL,
  `d_tetap_trainer_nip` varchar(50) DEFAULT NULL,
  `d_tetap_trainer_2` varchar(255) DEFAULT NULL,
  `d_tetap_trainer_2_nip` varchar(50) DEFAULT NULL,
  `d_tetap_trainer_3` varchar(255) DEFAULT NULL,
  `d_tetap_trainer_3_nip` varchar(50) DEFAULT NULL,
  `d_tetap_pendamping` varchar(255) DEFAULT NULL,
  `d_tetap_pendamping_nip` varchar(50) DEFAULT NULL,
  `d_tetap_dsu` varchar(255) DEFAULT NULL,
  `d_tetap_dsu_nip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_d_tetap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27011 ;

--
-- Dumping data for table `d_tetap`
--

INSERT INTO `d_tetap` (`kd_d_tetap`, `kd_r_unit`, `d_tetap_fo1`, `d_tetap_fo1_nip`, `d_tetap_trainer`, `d_tetap_trainer_nip`, `d_tetap_trainer_2`, `d_tetap_trainer_2_nip`, `d_tetap_trainer_3`, `d_tetap_trainer_3_nip`, `d_tetap_pendamping`, `d_tetap_pendamping_nip`, `d_tetap_dsu`, `d_tetap_dsu_nip`) VALUES
(1000, 'KANWIL DJPBN PROV. ACEH', '', '', 'Samsul Bahri', '19661010 199903 1 001', '', '', '', '', '', '', 'SAMSUL BAHRI', '196610101999031000'),
(1001, 'KPPN BANDA ACEH', '', '', 'Tyo Widayanto', '19790210 200012 1 002', 'Sukron Saddat', '19770812 199903 1 001', 'Musthofa Amin Khusaini', '', '', '19830602 200312 1 004', 'TYO WIDAYANTO', '197902102000121000'),
(1002, 'KPPN LHOKSEUMAWE', '', '', 'Aryo Dipo Murti', '19851205 201012 1 004', 'Ibnu Masu''d', '19811211 200212 1 001', 'Rizki Pratama', '', '', '19890611 201012 1 001', 'RIZKI PRATAMA', '198906112010121000'),
(1003, 'KPPN MEULABOH', '', '', 'Ishak', '19740802 199402 1 001', 'Muhammad Sigit Mikail', '19861104 201012 1 004', 'Andi Triyanto', '', '', '19821204 200212 1 001', 'AGUNG ANGGA SOMANTRI', '198611042010121000'),
(1004, 'KPPN TAPAKTUAN', '', '', 'Thomy Aribima', '19840528 200312 1 003', 'Arifin Indarto', '19890428 201012 1 004', 'Gigih Alfrian Pratama Putra', '', '', '19880422 201012 1 002', '', ''),
(1005, 'KPPN LANGSA', '', '', 'Subandi', '19870516 201012 1 005', 'Popy Ardiansyah', '19840124 200212 1 003', 'Donny Saputra', '', '', '19890427 201210 1 001', '', ''),
(1006, 'KPPN KUTACANE ', '', '', 'Buhari', '19651107 198503 1 003', 'Ferhad Akbar', '19831107 200212 1 001', 'Badri Rohman', '', '', '19820512 200212 1 001', '', ''),
(1007, 'KPPN TAKENGON', '', '', 'Dicky Muhamad Sidik', '19781217 199903 1 002', 'Dodi Susanto', '19840627 200312 1 004', 'Bagus Septiawan', '', '', '19890904 201012 1 002', '', ''),
(2000, 'KANWIL DJPBN PROV. SUMUT', '', '', 'Muhadi', '19821015 200412 1 001', '', '', '', '', '', '', '', ''),
(2001, 'KPPN MEDAN I', '', '', 'Yusmar Gea', '19591015 198503 1 002', 'Sri Wahyu Ningsih', '19760308 199602 2 001', 'Supardi', '', '', '19820904 200312 1 003', '', ''),
(2002, 'KPPN MEDAN II', '', '', 'Elisa', '19760101 199603 2 001', 'Kukuh Setyo Widodo', '19760724 199602 1 001', 'Mulyono', '', '', '19760719 199903 1 002', '', ''),
(2003, 'KPPN TEBING TINGGI', '', '', 'Candra Julian', '19840705200312 1 009', 'Nancy Tiurmauli Manullang', '19820812 200112 2 002', 'Setya Twiono', '', '', '19821104 200212 1 004', '', ''),
(2004, 'KPPN PEMATANG SIANTAR', '', '', 'Hadiono Kurniawan', '19820917 200412 1 001', 'Sugandha Jhoan Marpaung', '19860127 201012 1 003', 'Nurhawati Tampubolon', '', '', '19740123 199603 2 001', '', ''),
(2005, 'KPPN PADANG SIDEMPUAN', '', '', 'Yudi Dani Agung Habibi', '19840828 201012 1 005', 'Windhu Setiandanu', '19840420 201012 1 044', 'Parlindungan Manurung', '', '', '19821008 200212 1 002', '', ''),
(2006, 'KPPN GUNUNG SITOLI', '', '', 'Ilham Daeli', '19610921 198310 1 001', 'Harsya Saputra', '19890603 201012 1 001', 'Ilham Akbar', '', '', '19910126 201210 1 003', '', ''),
(2007, 'KPPN TANJUNG BALAI ', '', '', 'Pendi Syahputra', '19830318 200212 1 005', 'Etty Sri Muliati', '19650815 198503 2 001', 'Abdul Wahid', '', '', '19630315 198503 1 003', '', ''),
(2008, 'KPPN SIBOLGA', '', '', 'Dedy Elisa Limbong', '19870506 201012 1 002', 'Septian Dwi Arya Nugraha', '19900915 201210 1 001', 'Denny Satriyawan', '', '', '19900813 201210 1 002', '', ''),
(2009, 'KPPN SIDIKALANG', '', '', 'Iswanto', '19810922 200312 1 002', 'Ando Simbolon', '19841026 200602 1 002', 'Saut E. Siahaan', '', '', '19900307 201212 1 003', '', ''),
(2010, 'KPPN BALIGE', '', '', 'Sapril Wanto Manik', '19890427 201012 1 007', 'Nur Syamsudin', '19870412 201012 1 001', 'Hamzah', '', '', '19650905 198503 1 004', '', ''),
(2011, 'KPPN RANTAU PRAPAT', '', '', 'Firstha Greacean', '19900418 201012 2 001', 'Sofia Evlina', '19680617 200501 2 001', 'Efi Herawati', '', '', '19631113 198503 2 001', '', ''),
(3000, 'KANWIL DJPBN PROV. SUMBAR ', '', '', 'Nasri Efendi', '19670417 199603 1 001', '', '', '', '', '', '', '', ''),
(3001, 'KPPN PADANG', '', '', 'Andi Tikno Saputro', '19830617 200212 1 001', 'Tri Sutopo', '19760411 199903 1 001', 'Erys Al Fauzi Minhando', '', '', '19831019 200312 1 002', '', ''),
(3002, 'KPPN PAINAN', '', '', 'Josep Damanik', '19760928 199903 1 003', 'Werdha Candratrilaksita', '19830305 200710 1 001', 'Dasril', '', '', '19731231 199903 1 001', '', ''),
(3003, 'KPPN BUKITTINGGI ', '', '', 'Rina Syafri', '19740920 200501 2 001', 'Rizki Wulandari', '19890816 201012 2 001', 'Estu Pamuji', '', '', '19830904 200212 1 003', '', ''),
(3004, 'KPPN SOLOK ', '', '', 'Afrizon Jani', '19610417 198203 1 002', 'Aries Munandar', '19840818 200602 1 004', 'Surjan', '', '', '19600812 198210 1 001', '', ''),
(3005, 'KPPN SIJUNJUNG', '', '', 'Sudiyanto', '19720718 199301 1 001', 'Pito Secha Maulia', '19890331 201012 2 001', 'Singgih Tri Widodo', '', '', '19841015 200312 1 005', '', ''),
(3006, 'KPPN LUBUK SIKAPING', '', '', 'Firdaus', '19670902 199903 1 001', 'Alfasrizal', '19720708 199903 1 002', 'Oktavarianti', '', '', '19601001 198203 2 001', '', ''),
(4000, 'KANWIL DJPBN PROV. RIAU ', '', '', 'Jossy Chandra', '19840612 200412 1 001', '', '', '', '', '', '', '', ''),
(4001, 'KPPN PEKANBARU', '', '', 'Mastrianto', '19830119 200412 1 001', 'Donny Irwanto', '19750122 199511 1 001', 'Handoko', '', '', '19830511 200212 1 004', '', ''),
(4002, 'KPPN RENGAT', '', '', 'Rusdi Z', '19781218 200501 1 002', 'Zindi Willy Arya Katamsi', '19881205 201012 1 001', 'Aulia Arif', '', '', '19900225 201212 1 001', '', ''),
(4003, 'KPPN DUMAI', '', '', 'Wulan Purna Deviana', '19881222 201012 2 002', 'Aryo Setiaji', '19890627 201212 1 001', 'Elimar Sinaga', '', '', '19890130 201012 2 002', '', ''),
(4004, 'KPPN TANJUNG PINANG', '', '', 'Anang Surya Widayanto', '19850526 200710 1 001', 'Sapta Winanda', '19821121 200312 1 005', 'Paryanto', '', '', '19811231 200112 1 001', '', ''),
(4005, 'KPPN BATAM', '', '', 'Herawan Wijaya', '19830115 200412 1 001', 'Rahmat Saleh', '19800929 200012 1 004', 'Ira Istiqamah', '', '', '19860516 200602 2 002', '', ''),
(4006, 'KANWIL DJPBN PROV. JAMBI', '', '', 'Kirana Sena', '19650703 198503 1 001', '', '', '', '', '', '', '', ''),
(4007, 'KPPN JAMBI ', '', '', 'Benny Eko Supriyanto', '19790203 200012 1 007', 'Sulistyo Permono', '19840329 200602 1 003', 'Erwin Eka Septya Budi', '', '', '19850930 200602 1 003', '', ''),
(4008, 'KPPN KUALA TUNGKAL', '', '', 'Faris Anwar Kusraharjo', '19891211 201012 1 001', 'Andi Muchadir', '19720823 199301 1 001', 'Athur Waga Ilhamsyah', '', '', '19840302 200710 1 001', '', ''),
(4009, 'KPPN SUNGAI PENUH', '', '', 'Agus Triono', '19761005 199602 1 002', 'Vero Rafizaliko', '19900506 201210 1 002', 'Jaka Utama', '', '', '19990514 201210 1 004', '', ''),
(4010, 'KPPN MUARA BUNGO', '', '', 'Ojad Sudrajat', '19750805 200501 1 001', 'Mohamad Jaya Makmuri R.', '19840824 200312 1 002', 'Edi  ', '', '', '19621231 198509 1 002', '', ''),
(4011, 'KPPN BANGKO **)', '', '', 'Elfirman Yusuf Sebayang', '19820615 200212 1 002', 'Slamet Hidayat ', '60105396', 'Andri', '', '', '19830103 200212 1 002', '', ''),
(5000, 'KANWIL DJPBN PROV. SUMSEL ', '', '', 'Amin Leomena', '19730801 199603 1 001', ' ', ' ', ' ', '', '', ' ', '', ''),
(5001, 'KPPN PALEMBANG', '', '', 'Husaini', '19850427 200602 1 006', 'Eko Tjahyono', '19770718 199903 1 002', 'Budi Apriansyah', '', '', '19850427 200602 1 007', '', ''),
(5002, 'KPPN SEKAYU', '', '', 'Kurnia Kusuma Wijayanti', '19911031 201210 2 001', 'Judhistira Adi Noegraha', '19790901 200012 1 001', 'Ruben Fabian Posma', '', '', '19861007 200602 1 002', '', ''),
(5003, 'KPPN BATURAJA', '', '', 'Wilda Aldama', '19890306 201210 2 001', 'Yulinda Ardianti Praselia', '19900710 201210 2 002', 'Edwar Suryadi', '', '', '19741104 200501 1 001', '', ''),
(5004, 'KPPN LUBUK LINGGAU', '', '', 'R.Muchamad Kaneko PD', '19900728 201210 1 006', 'Fitri Widiana', '19890520 201012 2 001', 'Wiwik Pratiwi', '', '', '19890520 201012 2 001', '', ''),
(5005, 'KPPN LAHAT', '', '', 'Wahyuningsih', '19881008 201012 2 001', 'Dedik Erwanto', '19871010 201212 1 001', 'Sweetta Wulandari', '', '', '19890429 201012 2 002', '', ''),
(6000, 'KANWIL DJPBN PROV. LAMPUNG', '', '', 'Hendra Gunawan', '19730811 199603 1 001', ' ', ' ', ' ', '', '', ' ', '', ''),
(6001, 'KPPN BANDAR LAMPUNG', '', '', 'Adi Yoanto', '19800904 200212 1 003', 'Gigih Nanang Kurniawan', '19770211 199903 1 003', 'Andi Wahyudhianto', '', '', '19820901 200312 1 003', '', ''),
(6002, 'KPPN METRO ', '', '', 'Sumarsono', '19810301 200112 1 001', 'Andry Maurens', '19770527 199903 1 001', 'Imam subekhi', '', '', '19810310 200012 1 001', '', ''),
(6003, 'KPPN KOTABUMI', '', '', 'Alief Tri Soesanto', '19790902 200012 1 002', 'Muslimin', '19730829 200501 1 001', 'Herwan Agus Jatmiko', '', '', '19740817 199602 1 002', '', ''),
(6004, 'KPPN LIWA', '', '', 'Didhik Susilo Otomo', '19760222 199903 1 001', 'Wahyu Bagus N.', '19870815 201012 1 001', 'Rd. Ricky Firmansyah', '', '', '19840818 200312 1 003', '', ''),
(7000, 'KANWIL DJPBN PROV. BENGKULU', '', '', 'Anggit Gunawan Wibisono', '19731010 199402 1 002', ' ', ' ', ' ', '', '', ' ', '', ''),
(7001, 'KPPN BENGKULU ', '', '', 'Pande Gede Yogiarsa', '19771103 200001 1 001', 'Nerson', '19751117 200501 1 001', 'Prasetiyo Luhur Widodo', '', '', '19851210 200602 1 002', '', ''),
(7002, 'KPPN CURUP', '', '', 'Sintong Sibuea', '19640315 198503 1 006', 'Ratna Yulia Dewi', '19900731 201210 2 001', 'Risa Ayu Restuning Gusti', '', '', '19891207 201210 2 002', '', ''),
(7003, 'KPPN MANNA', '', '', 'Ponco Widodo', '19850510 200602 1 003', 'Dedi Setiadi', '19730503 199402 1 004', 'Grace RM Hasibuan', '', '', '19890610 201012 2 001', '', ''),
(7004, 'KPPN MUKO-MUKO', '', '', 'Ahmad Labib', '19750710 199903 1 001', 'A.M.Yuqbal Sanusi', '19891109 201012 1 002', 'Saeful Azis', '', '', '19880906 201012 1 007', '', ''),
(8000, 'KANWIL DJPBN PROV. BABEL ', '', '', 'Kamidi', '19751003 199602 1 001', ' ', ' ', ' ', '', '', ' ', '', ''),
(8001, 'KPPN PANGKALPINANG', '', '', 'Adhi Kusuma Widyanto', '19860319 200602 1 001', 'Irfan Budi  Purnomo', '19840111 200602 1 002', 'Eka Purnama', '', '', '19850204 200602 1 004', '', ''),
(8002, 'KPPN TANJUNG PANDAN', '', '', 'Kusnan Hadi Ashari', '19810430 200312 1 001', 'Novita Ratna Dewi', '19901227 201210 2 001', 'Mulyanto', '', '', '19710501 198301 1 001', '', ''),
(9000, 'KANWIL DJPBN PROV. BANTEN', '', '', 'Suranto', '19750119 199603 1 001', ' ', ' ', ' ', '', '', ' ', '', ''),
(9001, 'KPPN SERANG', '', '', 'Gandung Wahyudi', '19860324 200602 1 003', 'Azinar Ismail', '19820826 200112 1 001', 'Sumiyati', '', '', '19750404 199602 2 001', '', ''),
(9002, 'KPPN RANGKASBITUNG ', '', '', 'Chandra Julihandono SJ', '19780722 200012 1 002', 'Dagri Meifardo', '19690524 199012 1 002', 'Prasetyo Wibowo', '', '', '19730314 199402 1 001', '', ''),
(9003, 'KPPN TANGERANG', '', '', 'Nilawati', '19730904 199602 2 001', 'Noeroel Fajri M.', '19710716 199203 2 001', 'Aang Ahmad Fithoni', '', '', '19810913 200312 1 001', '', ''),
(10000, 'KANWIL DJPBN PROV. DKI JAKARTA', '', '', 'Juwanto', '19731004 199402 1 001', ' ', ' ', ' ', '', '', ' ', '', ''),
(10001, 'KPPN JAKARTA I ', '', '', 'Leila Rizky Niwanda', '19850127 200602 2 004', 'Indri Astuti Wibowo', '19740222 199402 2 001', 'Yuniawan Hari Raharjo', '', '', '19830625 200602 1 002', '', ''),
(10002, 'KPPN JAKARTA II ', '', '', 'Teguh Bayu Aji Wibowo', '19840722 200602 1 004', 'Arep Warsino', '19840202 200412 1 001', 'Tumpak Harapan', '', '', '19840211 200412 1 001', '', ''),
(10003, 'KPPN JAKARTA III ', '', '', 'Febie Saputra', '19830223 200112 1 001', 'Ronald Kamolan', '19820912 200212 1 002', 'Joko Sumarsono', '', '', '19811114 200112 1 001', '', ''),
(10004, 'KPPN JAKARTA IV ', '', '', 'Julian Alhaj', '19840723 200312 1 004', 'Ahmad Fuad Zain', '19850821 200602 1 003', 'Ade Hidayat', '', '', '19830208 200312 1 002', '', ''),
(10005, 'KPPN JAKARTA V ', '', '', 'Jimmy Ariyanto', '19830101 200212 1 001', 'Titik Purwaningsih', '19840207 200312 2 001', 'Widiastuti', '', '', '19820703 200412 2 001', '', ''),
(10006, 'KPPN JAKARTA VI (KHUSUS) ', '', '', 'Kusrini', '19671008 199202 2 001', 'Rohaniah', '19631231 1984002 2 001', 'Mulyadah', '', '', '19690717 198912 2 001', '', ''),
(11000, 'KANWIL DJPBN PROV. JABAR', '', '', 'Tuti Ambarsari', '19711105 199202 2 001', ' ', ' ', ' ', '', '', ' ', '', ''),
(11001, 'KPPN BANDUNG I ', '', '', 'Sukarman', '19810204 200112 1 001', 'Muhammad Zainal Mustain', '19860119 200602 1 004', 'Fauzi Kurniawan', '', '', '19850125 200602 1 003', '', ''),
(11002, 'KPPN BANDUNG II', '', '', 'Rega Prasetya amrullah', '19830622 200312 1 001', 'Misbachudin', '19820612 200212 1 001', 'Ruslan Baehaqi', '', '', '19850305 200602 1 004', '', ''),
(11003, 'KPPN BEKASI', '', '', 'Lerifardiyan', '19821121 200412 1 001', 'Subiyanti', '19690515 199012 2 001', 'Wiwik Septi Yudiningsih', '', '', '19760918 199602 2 001', '', ''),
(11004, 'KPPN KARAWANG', '', '', 'Teguh Hadi Wibowo', '19840908 200602 1 003', 'Rusminingsih', '19660418 198503 2 001', 'Diyah Sri Astuti', '', '', '19730412 199402 2 001', '', ''),
(11005, 'KPPN BOGOR ', '', '', 'Wardoyo', '19770813 200012 1 001', 'Mas Nursanto', '19611202 198403 1 002', 'Sri Mulyani', '', '', '19740716 199402 2 001', '', ''),
(11006, 'KPPN PURWAKARTA', '', '', 'Sony Prianto', '19821225 200212 1 002', 'Sri Sulvianti Syam', '19790311 199903 2 001', 'Edi Prayitno', '', '', '19840203 200312 1 001', '', ''),
(11007, 'KPPN SUKABUMI', '', '', 'Veronica Kemala', '19730410 199402 2 001', 'Darsini', '19730405 199403 2 001', 'Rosyid', '', '', '19850331 200602 1 001', '', ''),
(11008, 'KPPN GARUT', '', '', 'Ery Purwanti', '19750208 199602 2 011', 'Nining Yuningsih', '19650504 198503 2 002', 'Sri Suwarti', '', '', '19650913 198510 2 001', '', ''),
(11009, 'KPPN CIREBON', '', '', 'Aneka Rahayu', '19730819 199403 2 001', 'Yayah Sorayah', '19730707 199403 2 001', 'Kholid Abidin', '', '', '19630507 198503 1 002', '', ''),
(11010, 'KPPN KUNINGAN', '', '', 'Daryat', '19620914 198503 1 003', 'Lasmi Ariyanti', '19840404 200602 2 001', 'Lusi Istanti', '', '', '19820301 200312 2 001', '', ''),
(11011, 'KPPN TASIKMALAYA ', '', '', 'Rani Muryani', '19750521 199402 2 001', 'Wildan Garnida', '19820808 200212 1 001', 'Agus Irawan', '', '', '19650816 198503 1 001', '', ''),
(11012, 'KPPN SUMEDANG', '', '', 'Suryanto', '19620822 198503 1 003', 'Ondi Juhana', '19630523 198503 1 001', 'Basyar Ilyas', '', '', '19640712 198503 1 004', '', ''),
(12000, 'KANWIL DJPBN PROV. JATENG', '', '', 'Wahyu Indah Anggraini', '19720316 199201 2 001', ' ', ' ', ' ', '', '', ' ', '', ''),
(12001, 'KPPN SEMARANG I', '', '', 'Siam Budi Winarti', '19820715 200212 2 001', 'Didi Afandi', '19840427 200312 1 006', 'Tri Nurhidayah', '', '', '19850111 200901 2 010', '', ''),
(12002, 'KPPN SEMARANG II ', '', '', 'Iswanto', '19790815 200112 1 001', 'Zulhani Angguntoro', '19830930 200212 1 002', 'Ginanjar Rah Widodo', '', '', '19850120 200710 1 001', '', ''),
(12003, 'KPPN SURAKARTA', '', '', 'Irmina Cris Sulistyowati', '19721223 199301 2 001', 'Siti Zulaikah', '19731117 199602 2 001', 'Endah Setyoningrum', '', '', '19821228 200312 2 003', '', ''),
(12004, 'KPPN SRAGEN', '', '', 'Edy Suwignyo', '19840405 200602 1 001', 'Tri Budadmo', '19650105 198503 1 001', 'Edy Nasrudin', '', '', '19830412 200602 1 001', '', ''),
(12005, 'KPPN KLATEN', '', '', 'Isrini', '19740330 199402 2 001', 'Ismiyati', '19780810 199903 2 004', 'Sri Winarti', '', '', '19731117 199402 2 002', '', ''),
(12006, 'KPPN PATI', '', '', 'Sufa"ati', '19741010 199403 2 001', 'Endang Werdiningsih', '19720920 199402 2 001', 'Mujahidah Aristiati', '', '', '19740110 199402 2 001', '', ''),
(12007, 'KPPN PURWODADI', '', '', 'Gunarso Wibowo', '19650310 198503 1 001', 'Surya Wirawan', '19641709 198503 1 003', 'Khusnul Fuad', '', '', '19831207 200602 1 001', '', ''),
(12008, 'KPPN KUDUS', '', '', 'Lathu Sjamsidi', '19690619 198912 1 001', 'Fitri Syamsiani', '19770919 200001 2 001', 'Untung Subagyo', '', '', '19590411 198108 1 001', '', ''),
(12009, 'KPPN PEKALONGAN', '', '', 'Hepi Sekar Pamungkas', '19780101 200212 2 001', 'Mohammad Isrizal', '19651020 198503 1 002', 'Lies Dini Arifiani', '', '', '19670622 198803 2 001', '', ''),
(12010, 'KPPN TEGAL', '', '', 'Tri Widodo', '19650605 198503 1 001', 'Atika Susiana', '19740101 199402 2 001', 'Umul Faroh', '', '', '19731220 199402 2 001', '', ''),
(12011, 'KPPN PURWOREJO', '', '', 'Rudi Lelono', '19811130 200112 1 001', 'Dyah Rintorukmi', '19591130 198503 2 002', 'Sri Gandini', '', '', '19660313 198503 2 001', '', ''),
(12012, 'KPPN PURWOKERTO ', '', '', 'Ety Setyati', '19601204 198311 2 001', 'Witarti', '19630722 198503 2 001', 'Lucfiantara', '', '', '19621002 198310 1 002', '', ''),
(12013, 'KPPN BANJARNEGARA', '', '', 'Suroyo', '19600813 198503 1 001', 'R. Hardono', '19820515 200212 1 003', 'Titih Sukoco', '', '', '19640626 198503 1 001', '', ''),
(12014, 'KPPN CILACAP ', '', '', 'FX Suharyono', '19700902 199012 1 002', 'Y. Purwanto', '19590715 198003 1 002', 'Ramli', '', '', '19610805 198703 1 001', '', ''),
(12015, 'KPPN MAGELANG', '', '', 'Sabilal Muhtadi', '19850919 200710 1 001', 'Muh Sholeh', '19761110 199602 1 002', 'Ellya Roza', '', '', '19631015 198311 2 001', '', ''),
(13000, 'KANWIL DJPBN PROV. DIY', '', '', 'Gatot Prasetyo', '19830923 200212 1 002', ' ', ' ', ' ', '', '', ' ', '', ''),
(13001, 'KPPN YOGYAKARTA ', '', '', 'Sri Sumarni', '19750916 199602 2 001', 'Taufiq Perdana', '19830607 200212 1 004', 'Suranto', '', '', '19821019 200212 1 001', '', ''),
(13002, 'KPPN WATES ', '', '', 'Samija', '19640320 198503 1 002', 'Andreas Radyanto', '19710908 199301 1 001', 'Kristya Arindra Hercipta', '', '', '19840126 200602 1 005', '', ''),
(13003, 'KPPN WONOSARI ', '', '', 'Sri Pamungkas', '19840405 200312 2 001', 'Faried Astia Rachman', '19830512 200602 1 002', 'Muhamad Solikhin', '', '', '19810816 200212 1 002', '', ''),
(14000, 'KANWIL DJPBN PROV. JATIM', '', '', 'Sentot Rusdwyantara', '19640603 198503 1 001', ' ', ' ', ' ', '', '', ' ', '', ''),
(14001, 'KPPN SURABAYA I', '', '', 'Sudarwiyanto', '19650626 198503 1 001', 'Albertus Eddi Priyanggodo', '19770706 200001 1 001', 'Ronny Tri Mulyono', '', '', '19810226 200012 1 002', '', ''),
(14002, 'KPPN SURABAYA II', '', '', 'Dona Junianto', '19820629 200412 1 002', 'Mochamad Wahyudi', '19840122 200710 1 001', 'Siti Hajrah', '', '', '60107114', '', ''),
(14003, 'KPPN SIDOARJO', '', '', 'Eni Tri Sutiwi', '19730409 199301 2 001', 'Titiek Kustiningsih', '19651106 198503 2 002', 'Nor Rosita', '', '', '19830721 200312 2 002', '', ''),
(14004, 'KPPN MALANG', '', '', 'Koen Setyorini', '19651111 198503 2 001', 'Indah Sofwati', '19680103 198802 2 001', 'Windi Meiliana', '', '', '19750514 199603 2 001', '', ''),
(14005, 'KPPN PAMEKASAN', '', '', 'Fandi', '19630402 198503 1 002', 'Andy Priyambodo', '19770705 200112 1 003', 'Krismiwati', '', '', '19631225 198503 2 008', '', ''),
(14006, 'KPPN MOJOKERTO', '', '', 'Harini Tri Agustin Musa', '19650803 198503 2 003', 'Wakhidah Zuhriyah', '19820819 200312 2 001', 'Nurul Hidayah', '', '', '60088953', '', ''),
(14007, 'KPPN BANYUWANGI', '', '', 'Hadi Sulistiono', '19811226 200212 1 001', 'Sri Sarbini', '19720202 199402 2 001', 'Umi Muhazarroh', '', '', '19760115 199602 2 002', '', ''),
(14008, 'KPPN JEMBER ', '', '', 'Susiadi', '19610709 198503 1 003', 'Bagus Prasetyo Wibowo', '19830725 200412 1 001', 'Suryadi', '', '', '19700507 199903 1 010', '', ''),
(14009, 'KPPN BONDOWOSO ', '', '', 'Choireally', '19860907 200602 1 003', 'Djoepriyanto', '19611212 198601 1 001', 'Mamiek Utami', '', '', '19651025 198503 2 001', '', ''),
(14010, 'KPPN MADIUN', '', '', 'Ari Sulastri', '19731229199403 2 001', 'Suwarsono', '19640323 198503 1 001', 'Rini Parwita Sari', '', '', '19751011 199602 2 001', '', ''),
(14011, 'KPPN KEDIRI', '', '', 'Suharsih', '19750714 199903 2 001', 'Atik Rahmawati P.', '19750615 199511 2 001', 'Siti Nurfaidah', '', '', '19760524 199903 2 001', '', ''),
(14012, 'KPPN BLITAR', '', '', 'Lilis Kustanti', '19641210 198503 2 001', 'Bambang Siswanto', '19651118 198503 1 003', 'Kholiq', '', '', '19631209 198503 1 002', '', ''),
(14013, 'KPPN BOJONEGORO', '', '', 'Sri Murti', '19730619 199403 2 002', 'Wahono ', '19840507 200602 1 003', 'Pandu Esmana RHP', '', '', '19840805 200602 1 003', '', ''),
(14014, 'KPPN TUBAN', '', '', 'Jawawi', '19630716 198503 1 002', 'Wahyu Priya Setiawan', '19840424 200602 1 002', 'Sudi Harnowo', '', '', '19820213 200112 1 001', '', ''),
(14015, 'KPPN PACITAN', '', '', 'Suwarno', '19590516 198203 1 003', 'Nurhadi', '19821013 200212 1 003', 'Endang Sumiati', '', '', '19840325 200412 2 001', '', ''),
(15000, 'KANWIL DJPBN PROV. KALBAR', '', '', 'Mochamad Sahirul Alim', '19821113 200212 1 002', ' ', ' ', ' ', '', '', ' ', '', ''),
(15001, 'KPPN PONTIANAK', '', '', 'Kiswan Purwanto', '19811015 200602 1 001', 'Eko Yuli P', '19850814 200412 1 001', 'Fahmy Chairil Ridho', '', '', '19830424 200212 1 002', '', ''),
(15002, 'KPPN SANGGAU', '', '', 'Ever Yared Ivan Kedoh', '19850307 200412 1 001', 'Firman Adi Prabowo', '19840527 200312 1 004', 'Suyuti Nafik', '', '', '19840527 200312 1 004', '', ''),
(15003, 'KPPN SINGKAWANG', '', '', 'Nur Fitriana Wati', '19890514 201212 2 003', 'Meyfira Intan Harlistiana', '19880508 201012 2 002', 'Des Dhoni Wiastanto', '', '', '19891210 201012 1 002', '', ''),
(15004, 'KPPN KETAPANG', '', '', 'Ismanto', '19780710 200012 1 002', 'Hademan', '19700201 200501 1 002', 'Edy Loddy', '', '', '19610719 198210 1 001', '', ''),
(15005, 'KPPN SINTANG', '', '', 'Petrus Matheus', '19590630 198108 1 001', 'Akhyar Habib', '19830107 200312 1 004', 'Kasiran', '', '', '19620818 198110 1 001', '', ''),
(15006, 'KPPN PUTUSSIBAU', '', '', 'Andhra Dewantha', '19900521 201210 1 004', 'Fachri Munandar', '19900118 201210 1 001', 'Mochammad Habiby Al Asify', '', '', '19891218 201210 1 003', '', ''),
(16000, 'KANWIL DJPBN PROV.KALTENG', '', '', 'Daru Sigit Sulistyanto', '19720315 199402 1 001', ' ', ' ', ' ', '', '', ' ', '', ''),
(16001, 'KPPN PALANGKARAYA', '', '', 'Heronimus Arruanlinggi', '19811208 200212 1 001', 'Agus Susilo', '19860828 200602 1 002', 'Novie Shol Abdillah', '', '', '19831110 200312 1 002', '', ''),
(16002, 'KPPN BUNTOK', '', '', 'Dika Andryawan', '19850527 200412 1 001', 'Yusro', '19790327 200012 1 005', 'Deky Baleanus Kadja', '', '', '19841209 200412 1 001', '', ''),
(16003, 'KPPN SAMPIT', '', '', 'Teddy Tajudin', '19800730 200112 1 002', 'Rifqi Akmal Syarif', '19890810 201012 1 002', 'Yovi Irawan', '', '', '19900123 201012 1 002', '', ''),
(16004, 'KPPN PANGKALAN BUN', '', '', 'Ahmad Zulfikar', '19890626 201012 1 001', 'Hotmanuel Suniman T.', '19831215 200312 1 002', 'Herbert Irfan Simanjuntak', '', '', '19881109 201012 1 001', '', ''),
(17000, 'KANWIL DJPBN PROV. KALSEL ', '', '', 'Setyawan', '19721118 199301 1 001', ' ', ' ', ' ', '', '', ' ', '', ''),
(17001, 'KPPN BANJARMASIN', '', '', 'Muchammad Syafar', '19831115 200312 1 004', 'Abdul Rosyid', '19830727 200602 1 001', 'Hairuddin', '', '', '19840317 200312 1 005', '', ''),
(17002, 'KPPN PELAIHARI', '', '', 'Mahbub Ulhaq', '19840927 200602 1 003', 'Panji Laksono', '19811006 200412 1 001', 'Andika Rohman Prasetia', '', '', '19890623 201012 1 002', '', ''),
(17003, 'KPPN BARABAI', '', '', 'Prasetyo Utomo', '19850301 200312 1 002', 'Fachriza Prima Putra', '600106581', 'Amran Sakiran', '', '', '19800808 200012 1 002', '', ''),
(17004, 'KPPN KOTABARU', '', '', 'Rogo Aji Sukmono', '19880509 201210 1 001', 'Haryanto Sahar', '19840302 200312 1 004', 'Hermawan GM', '', '', '19731016 199903 1 003', '', ''),
(17005, 'KPPN TANJUNG', '', '', 'M. Faizal Zulmi', '19901106 201210 1 002', 'M.Zikri Eka Pratama', '19890628 201012 1 001', 'Mahardika Argha Mariska', '', '', '19900106 201210 1 003', '', ''),
(18000, 'KANWIL DJPBN PROV. KALTIM', '', '', 'Sofhian Darsono', '19760327 199903 1 002', ' ', ' ', ' ', '', '', ' ', '', ''),
(18001, 'KPPN SAMARINDA', '', '', 'Hari Prakoso', '19840305 200312 1 002', 'Wahyudi', '19840503 200602 1 004', 'Muhamad Syahrul', '', '', '19830803 200312 1 006', '', ''),
(18002, 'KPPN BALIKPAPAN', '', '', 'Kundayati', '19630415 198402 2 001', 'Rudianto', '19820716 200612 1 002', 'Indra Pornama', '', '', '19820526 200212 1 003', '', ''),
(18003, 'KPPN TARAKAN', '', '', 'Yuni Asih', '19901209 201210 2 001', 'Rizky Purnamasari', '19880926 201212 2 002', 'Zulkifli Putra Hamanku', '', '', '19790906200012 1  002', '', ''),
(18004, 'KPPN NUNUKAN', '', '', 'Andri Ridwan', '19870622 200710 1 001', 'Rahmat Abu rais', '19871108 201012 1 001', 'Nugraha Purna Putra I.', '', '', '19900604 201210 1 005', '', ''),
(18005, 'KPPN TANJUNG REDEB', '', '', 'Al Udin', '19831214 200901 1 012', 'Rosandi', '19831228 200312 1 004', 'Sintong Arfiansyah', '', '', '19881208 201012 1 001', '', ''),
(19000, 'KANWIL DJPBN PROV. BALI ', '', '', 'Gusti Putu Arjana', '19640920 198503 1 001', ' ', ' ', ' ', '', '', ' ', '', ''),
(19001, 'KPPN DENPASAR', '', '', 'Giovanny Putrarama Siagian', '19820610 200212 1 002', 'Harpananda Eka S.', '19840428 200602 1 006', 'Nugroho Adi Wiyoso', '', '', '19840617 200312 1 003', '', ''),
(19002, 'KPPN SINGARAJA', '', '', 'Nyoman Wirta', '19640621 198503 1 002', 'Nugroho Adi Wiyoso', '19840617 200312 1 003', 'I Made Hartana', '', '', '19851017 200710 1 001', '', ''),
(19003, 'KPPN AMLAPURA', '', '', 'Jusman', '19820525 200312 1 004', 'Lukman Asmargandhy', '19850201 200710 1 001', 'I Nyoman Sudarma', '', '', '19851210 200602 1 004', '', ''),
(20000, 'KANWIL DJPBN PROV. NTB', '', '', 'Tri Sujatmiko', '19841211 200312 1 003', ' ', ' ', ' ', '', '', ' ', '', ''),
(20001, 'KPPN MATARAM', '', '', 'Maryanto', '19831008 200312 1 003', 'Asep Burhanudin', '19840605 200312 1 005', 'Suswanto', '', '', '19840415 200312 1 003', '', ''),
(20002, 'KPPN SELONG', '', '', 'Mohamad Guntur', '19640905 198503 1 001', 'Dian Widi Krisanto', '19821017 200112 1 001', 'Indra Mouluddin', '', '', '19821217 200112 1 001', '', ''),
(20003, 'KPPN BIMA', '', '', 'Franika Vidy Arif Prasetyo', '19840229 200312 1 001', 'Lukman Lantowa', '19850810 200710 1 001', 'Ifan Danny Mokoginta', '', '', '19871209 200710 1 001', '', ''),
(20004, 'KPPN SUMBAWA BESAR', '', '', 'Pringadi Abdi Surya', '19880818 201012 1 002', 'Taufiqurrokhman', '19840320 200312 1 002', 'Slamet Raharjo', '', '', '19830104 200312 1 002', '', ''),
(21000, 'KANWIL DJPBN PROV. NTT', '', '', 'Andang Prihasnowo', '19720906 199303 1 003', ' ', ' ', ' ', '', '', ' ', '', ''),
(21001, 'KPPN KUPANG', '', '', 'Martono Yuda Prasetyo', '19851225 200602 1 006', 'Kiki Kirmani', '19770724 200001 1 002', 'Susan Natalia Max', '', '', '19851217 200412 2 001', '', ''),
(21002, 'KPPN ATAMBUA', '', '', 'David Z. Bely', '19641207 199903 1 001', 'Roland Fernando', '19890218 201012 1 001', 'Peniel Koroh', '', '', '19850719 200412 1 001', '', ''),
(21003, 'KPPN LARANTUKA', '', '', 'Markus Epu', '19641231 198503 1 014', 'Kharly Oktaperdana', '19891011 201012 1 001', 'Ishak Ludjikana', '', '', '19601004 198011 1 001', '', ''),
(21004, 'KPPN ENDE', '', '', 'Diwinanto', '19741011 199602 1 001', 'Laras Anindita Andarini', '19890802 201012 2 001', 'S.Salim Thalib', '', '', '19880817 201012 1 001', '', ''),
(21005, 'KPPN RUTENG', '', '', 'Kun Budi Hendarto', '19760103 199903 1 002', 'David Surya Pratama', '19890216 201012 1 001', 'Depi Farizzal', '', '', '19891203 201012 1 001', '', ''),
(21006, 'KPPN WAINGAPU', '', '', 'Yuliana Iki', '19600722 198010 2 001', 'Supomo Mahatmanto Hanasti', '19901125 201210 1 003', 'Wahyu Hadi Cahyono', '', '', '19890727 201012 1 001', '', ''),
(22000, 'KANWIL DJPBN PROV. SULSEL ', '', '', 'Mustamin Mustafa', '19681110 199603 1 002', ' ', ' ', ' ', '', '', ' ', '', ''),
(22001, 'KPPN MAKASSAR I', '', '', 'Edi Yuliana Putra', '19790707 200012 1 004', 'Yopiter Agung Putra A.', '19761219 199903 1 001', 'Zaki Romadona', '', '', '19770819 199903 1 001', '', ''),
(22002, 'KPPN MAKASSAR II', '', '', 'Imam Abdurrahman Mursalin', '19840524 200602 1 003', 'Dory Sukma Wahyu Prabowo', '19840808 200312 1 004', 'Jarir Al Amjad', '', '', '19850410 200602 1 002', '', ''),
(22003, 'KPPN PARE-PARE', '', '', 'Ilham Yunus', '19640114 198503 1 002', 'Firman Usman', '19811228 200212 1 001', 'Kasman', '', '', '19710729 199602 1 002', '', ''),
(22004, 'KPPN BENTENG', '', '', 'A.Putra Raga Pratama', '19870129 200602 1 004', 'Muhammad Fahmy', '19860823 200602 1 004', 'Heri Santosa', '', '', '19790828 200012 1 003', '', ''),
(22005, 'KPPN BANTAENG', '', '', 'Kartini', '19841030 200602 2 001', 'Khotibul Umam Isnanto', '19890206 201012 1 001', 'Arham', '', '', '19780801 199903 1 002', '', ''),
(22006, 'KPPN SINJAI', '', '', 'Amin Lestariyanto', '19841020 200412 1 001', 'Tomi Hartanto', '19840611 200312 1 003', 'Irmadanah Surahman', '', '', '19890524 201012 2 001', '', ''),
(22007, 'KPPN PALOPO', '', '', 'Jaelani Sulthan', '19731130 200501 1 001', 'Imam Budiman', '19850324 200602 1 003', 'Adi Setiawan', '', '', '19840109 200312 1 004', '', ''),
(22008, 'KPPN WATAMPONE', '', '', 'Yophie Ziske Andriyan', '19840620 200312 1 006', 'Wahyuniati', '19760528 199602 2 001', 'Nur Laela', '', '', '19890529 201012 2 002', '', ''),
(22009, 'KPPN MAKALE', '', '', 'Aditya Purwantoro', '19881127 201012 1 001', 'Ilham Abdi', '19841113 200312 1 001', 'Andi Ramlang Petta Lili', '', '', '19880503 201012 1 001', '', ''),
(22010, 'KPPN MAMUJU', '', '', 'Muh. Yusuf Hamka', '19810724 200212 1 003', 'Eko Handoyo', '19850726 200710 1 001', 'Wisnu Sri Baroto', '', '', '19780819 200001 1 001', '', ''),
(22011, 'KPPN MAJENE', '', '', 'Asy"ari Nurdin', '19860228 200602 1 001', 'I Kadek Dedy Indraprayana', '19891224 201012 1 001', 'Rudy Marfar', '', '', '19821027 200312 1 001', '', ''),
(23000, 'KANWIL DJPBN PROV. SULTENG', '', '', 'Lukas Desie Palintong', '19811203 200012 1 001', ' ', ' ', ' ', '', '', ' ', '', ''),
(23001, 'KPPN PALU ', '', '', 'Herza Febrian', '19840211 200901 1 006', 'Muhammad Saiful Bahri', '19840824 200602 1 001', 'Hardin', '', '', '19820116 200312 1 002', '', ''),
(23002, 'KPPN POSO ', '', '', 'Dwi Fika Septian Nur A.', '19880905 201012 1 001', 'Nurrohmat Tri Prabowo', '19890705 201012 1 001', 'Hamdan Adhymaz Pratama', '', '', '19901009 201210 1 004', '', ''),
(23003, 'KPPN LUWUK ', '', '', 'Gwen Adhitya Amalkhan', '19890515 201012 1 002', 'Andre Olvijanto Palohon', '19851012 200602 1 002', 'Ramli', '', '', '19740202 199602 1 001', '', ''),
(23004, 'KPPN TOLI - TOLI ', '', '', 'I Wayan Deka Wijaya Saputra', '19891118 201012 1 002', 'Riskiansyah R.', '19900208 201012 1 001', 'Timor Diliantoro', '', '', '19770712 199903 1 002', '', ''),
(23005, 'KANWIL DJPBN PROV. SULTRA', '', '', 'Wan Aznawi Nst', '19830814 200312 1 004', ' ', ' ', ' ', '', '', ' ', '', ''),
(23006, 'KPPN KENDARI ', '', '', 'Samsudin', '19741214 199903 1 001', 'Hasan Ibrahim', '19870606 200602 1 001', 'Miftahul Ulum', '', '', '19780516 199903 1 001', '', ''),
(23007, 'KPPN BAU - BAU ', '', '', 'Mukrimah H.S.', '19900429 201210 2 002', 'Purnamasari Kurnia', '19890520 201210 2 002', 'Bandung Sapardi', '', '', '19720405 199402 1 001', '', ''),
(23008, 'KPPN RAHA ', '', '', 'M.Lukman Syatir', '19861031 200602 1 002', 'Alfian Taufiqurizqi', '19880610 201012 1 001', 'Saifan Abdulloh Muqimuddin', '', '', '19910502 201210 1 003', '', ''),
(23009, 'KPPN KOLAKA ', '', '', 'Muh. Amin Hidayatullah', '19741004 199602 1 001', 'Gading Bagaskoro', '19890621 201012 1 001', 'Raden Bagus Dedy Rozardy', '', '', '19820822 200312 1 002', '', ''),
(24000, 'KANWIL DJPBN PROV. GORONTALO', '', '', 'Sigit Pamungkas', '19840731 200602 1 003', ' ', ' ', ' ', '', '', ' ', '', ''),
(24001, 'KPPN GORONTALO ', '', '', 'Erwinsyah', '19790504 199903 1 001', 'Ma''ruf Firdaus', '19840722 200312 1 003', 'Muhammad Fajri Natsir', '', '', '19820905 200312 1 004', '', ''),
(24002, 'KPPN MARISA ', '', '', 'Ilham Alwi', '19781004 199903 1 001', 'Mahfud', '19830102 200112 1 002', 'Anggit jati Permana', '', '', '19900707 201210 1 004', '', ''),
(24003, 'KANWIL DJPBN PROV. SULUT', '', '', 'Johannes Simanullang', '19830517 200412 1 003', ' ', ' ', ' ', '', '', ' ', '', ''),
(24004, 'KPPN MANADO', '', '', 'Alfons Masie', '19850406 200602 1 002', 'Ricky M. Tisnajaya', '19840312 200312 1 001', 'Samsul Hadi', '', '', '19820325 200412 1 001', '', ''),
(24005, 'KPPN BITUNG', '', '', 'Sarifudin Mustafa', '19791229 200212 1 001', 'Deni Adityana', '19821210 200412 1 001', 'Roby Nugroho', '', '', '19900709 201012 1 001', '', ''),
(24006, 'KPPN KOTAMOBAGU', '', '', 'Yogi Arif Saputro', '19880816 201012 1 001', 'Jan Jack Jolly Rasubala', '19710105 199903 1 002', 'Victor Steven Munaiseche', '', '', '19860904 200602 1 002', '', ''),
(24007, 'KPPN TAHUNA', '', '', 'Bethoven Saul', '19861030 200602 1 003', 'Yandris Mangarip', '19850101 200710 1 001', 'Rio Andy Aryansyah', '', '', '19860913 200602 1 002', '', ''),
(25000, 'KANWIL DJPBN PROV. MALUT', '', '', 'Halmizan Alfani', '19830516 200212 1 002', ' ', ' ', ' ', '', '', ' ', '', ''),
(25001, 'KPPN TERNATE', '', '', 'Abdul Halim', '19860628 200602 1 005', 'Kondrado Karono Thomas', '19830719 200412 1 001', 'Rudi Irwanto', '', '', '19831027 200312 1 003', '', ''),
(25002, 'KPPN TOBELO', '', '', 'Mulyanto Syawal', '19850406 200602 1 003', 'Muhammad Khoirul Jihad', '19881225 201012 1 001', 'Bless Paultje Tangkere', '', '', '19870123 200710 1 001', '', ''),
(26000, 'KANWIL DJPBN PROV. MALUKU', '', '', 'Indra Gunadi', '19840509 200312 1 004', ' ', ' ', ' ', '', '', ' ', '', ''),
(26001, 'KPPN AMBON', '', '', 'Cristofel Heski Wurangian', '19871225 200710 1 001', 'Clief Bramy Pangemanan', '19861115 200602 1 005', 'Abd. Gafur', '', '', '19850429 200312 1 001', '', ''),
(26002, 'KPPN MASOHI', '', '', 'Marshalino Luhukay', '19870405 200602 1 002', 'Ahmad Zaky Mubarok', '19890624 201210 1 001', 'Taufan Maulana Harits', '', '', '19891010 201210 1 001', '', ''),
(26003, 'KPPN TUAL', '', '', 'Reza Hadi Utomo', '19890315 201012 1 001', 'Denny Fordatkosu', '19630323  198203 2 001', 'Natalia Jamremav', '', '', '19601226 198503 2 001', '', ''),
(26004, 'KPPN SAUMLAKI', '', '', 'Fernando Oktario Situmorang', '19891003 201012 1 001', 'Daniel Th.S.Melmambessy', '19621027 198210 1 001', 'Eko Bintoro Aji', '', '', '19890830 201012 1 002', '', ''),
(27000, 'KANWIL DJPBN PROV. PAPUA', '', '', 'Micky Ardyanto Putra Lukman', '19801027 201012 1 001', ' ', ' ', ' ', '', '', ' ', '', ''),
(27001, 'KPPN JAYAPURA', '', '', 'Lady Diana Capelle', '19810919 200012 2 001', 'Ersya Roy K.Usman', '19880317 200710 1 001', 'Arief Pratama Lahati ', '', '', '19860303 200602 1 002', '', ''),
(27002, 'KPPN BIAK', '', '', 'Jhon Rafles Sihotang', '19890311 201012 1 002', 'Steven', '19900914 201210 1 002', 'Marsel Rame Hau', '', '', '19840306 200412 1 001', '', ''),
(27003, 'KPPN SERUI', '', '', 'Michael Orsted Satahi', '19901218 201210 1 003', 'Aldy Philips', '19871009 200710 1 001', 'Fandi Zainudinsyah', '', '', '19850421 201012 1 003', '', ''),
(27004, 'KPPN MERAUKE', '', '', 'M.Insan Salampessy', '19720715 199803 1 002', 'Bayu Candra Setiawan', '19900225 201210 1 002', 'Didik Prasetiyo', '', '', '19871130 201012 1 001', '', ''),
(27005, 'KPPN WAMENA', '', '', 'Puji Linggaswara', '19830112 200412 1 001', 'Sofyan Wijaya Julianto', '19900718 201210 1 003', 'Rycko Charles Plaikol', '', '', '19850916 200412 1 001', '', ''),
(27006, 'KPPN NABIRE ', '', '', 'Arius Vitra', '19751006 199503 1 001', 'Yuda Gustama', '19871004 201012 1 001', 'Wamafma Frederik', '', '', '19610101 198108 1 001', '', ''),
(27007, 'KPPN TIMIKA', '', '', 'Untung Priyono', '19631030 198503 1 005', 'Gunawan Wiyogo S.', '19890504 201210 1 001', 'Cahya Bagus Mandalukita', '', '', '19900107 201210 1 001', '', ''),
(27008, 'KPPN MANOKWARI', '', '', 'Benny ', '19820419 200212 1 002', 'Sapto Meindartono', '19790511 200012 1 002', 'Yulius Soleman F.Padama', '', '', '19850701 200412 1 001', '', ''),
(27009, 'KPPN SORONG', '', '', 'Luqman Elhakim', '19870502 201012 1 002', 'Sudar', '19661207 199903 1 002', 'Apolos Tuther', '', '', '19671204 199903 1 001', '', ''),
(27010, 'KPPN FAK-FAK', '', '', 'Muhammad Reza Alfarisi', '19891013 201012 1 001', 'Dian Setyo Cahyono', '19840524 200312 1 005', 'Eki Mahipal', '', '', '19891223 201012 1 001', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `d_user`
--

CREATE TABLE IF NOT EXISTS `d_user` (
  `kd_d_user` int(11) NOT NULL AUTO_INCREMENT,
  `kd_r_jenis` int(11) NOT NULL,
  `kd_r_unit` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `pass_user` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_d_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100000 ;

--
-- Dumping data for table `d_user`
--

INSERT INTO `d_user` (`kd_d_user`, `kd_r_jenis`, `kd_r_unit`, `nama_user`, `pass_user`) VALUES
(1000, 3, 1000, 'KANWIL DJPBN PROV. ACEH', '8877901658'),
(1001, 2, 1001, 'KPPN BANDA ACEH', '4270661034'),
(1002, 2, 1002, 'KPPN LHOKSEUMAWE', '6614782800'),
(1003, 2, 1003, 'KPPN MEULABOH', '4467673647'),
(1004, 2, 1004, 'KPPN TAPAKTUAN', '2785138145'),
(1005, 2, 1005, 'KPPN LANGSA', '9517233435'),
(1006, 2, 1006, 'KPPN KUTACANE ', '8229537732'),
(1007, 2, 1007, 'KPPN TAKENGON', '5212824480'),
(2000, 3, 2000, 'KANWIL DJPBN PROV. SUMUT', '7706691502'),
(2001, 2, 2001, 'KPPN MEDAN I', '5258537672'),
(2002, 2, 2002, 'KPPN MEDAN II', '3416676442'),
(2003, 2, 2003, 'KPPN TEBING TINGGI', '5723357311'),
(2004, 2, 2004, 'KPPN PEMATANG SIANTAR', '8688894586'),
(2005, 2, 2005, 'KPPN PADANG SIDEMPUAN', '6039031137'),
(2006, 2, 2006, 'KPPN GUNUNG SITOLI', '2711841821'),
(2007, 2, 2007, 'KPPN TANJUNG BALAI ', '6956880357'),
(2008, 2, 2008, 'KPPN SIBOLGA', '6258112322'),
(2009, 2, 2009, 'KPPN SIDIKALANG', '4503493671'),
(2010, 2, 2010, 'KPPN BALIGE', '3559015076'),
(2011, 2, 2011, 'KPPN RANTAU PRAPAT', '3639984897'),
(3000, 3, 3000, 'KANWIL DJPBN PROV. SUMBAR ', '1774989979'),
(3001, 2, 3001, 'KPPN PADANG', '4217737992'),
(3002, 2, 3002, 'KPPN PAINAN', '8242558375'),
(3003, 2, 3003, 'KPPN BUKITTINGGI ', '6064867777'),
(3004, 2, 3004, 'KPPN SOLOK ', '3919839605'),
(3005, 2, 3005, 'KPPN SIJUNJUNG', '6895550915'),
(3006, 2, 3006, 'KPPN LUBUK SIKAPING', '8401668995'),
(4000, 3, 4000, 'KANWIL DJPBN PROV. RIAU ', '1756647051'),
(4001, 2, 4001, 'KPPN PEKANBARU', '7562957997'),
(4002, 2, 4002, 'KPPN RENGAT', '4820558787'),
(4003, 2, 4003, 'KPPN DUMAI', '9396749886'),
(4004, 2, 4004, 'KPPN TANJUNG PINANG', '9011322156'),
(4005, 2, 4005, 'KPPN BATAM', '1190253033'),
(4006, 2, 4006, 'KANWIL DJPBN PROV. JAMBI', '6223635042'),
(4007, 2, 4007, 'KPPN JAMBI ', '4082343181'),
(4008, 2, 4008, 'KPPN KUALA TUNGKAL', '5116761795'),
(4009, 2, 4009, 'KPPN SUNGAI PENUH', '9084514644'),
(4010, 2, 4010, 'KPPN MUARA BUNGO', '3469340483'),
(4011, 2, 4011, 'KPPN BANGKO **)', '5040199376'),
(5000, 3, 5000, 'KANWIL DJPBN PROV. SUMSEL ', '4551904647'),
(5001, 2, 5001, 'KPPN PALEMBANG', '7096089864'),
(5002, 2, 5002, 'KPPN SEKAYU', '3425849739'),
(5003, 2, 5003, 'KPPN BATURAJA', '3832245988'),
(5004, 2, 5004, 'KPPN LUBUK LINGGAU', '9802863908'),
(5005, 2, 5005, 'KPPN LAHAT', '3486332110'),
(6000, 3, 6000, 'KANWIL DJPBN PROV. LAMPUNG', '8322125062'),
(6001, 2, 6001, 'KPPN BANDAR LAMPUNG', '6029025470'),
(6002, 2, 6002, 'KPPN METRO ', '8452459400'),
(6003, 2, 6003, 'KPPN KOTABUMI', '7037203564'),
(6004, 2, 6004, 'KPPN LIWA', '8938813806'),
(7000, 3, 7000, 'KANWIL DJPBN PROV. BENGKULU', '5805213951'),
(7001, 2, 7001, 'KPPN BENGKULU ', '2677686035'),
(7002, 2, 7002, 'KPPN CURUP', '9617533939'),
(7003, 2, 7003, 'KPPN MANNA', '3023562998'),
(7004, 2, 7004, 'KPPN MUKO-MUKO', '4359300195'),
(8000, 3, 8000, 'KANWIL DJPBN PROV. BABEL ', '3745309842'),
(8001, 2, 8001, 'KPPN PANGKALPINANG', '5588237194'),
(8002, 2, 8002, 'KPPN TANJUNG PANDAN', '5685080726'),
(9000, 3, 9000, 'KANWIL DJPBN PROV. BANTEN', '4924008584'),
(9001, 2, 9001, 'KPPN SERANG', '6135810600'),
(9002, 2, 9002, 'KPPN RANGKASBITUNG ', '4416638144'),
(9003, 2, 9003, 'KPPN TANGERANG', '2010090930'),
(10000, 3, 10000, 'KANWIL DJPBN PROV. DKI JAKARTA', '6941267372'),
(10001, 2, 10001, 'KPPN JAKARTA I ', '2836487974'),
(10002, 2, 10002, 'KPPN JAKARTA II ', '4536424550'),
(10003, 2, 10003, 'KPPN JAKARTA III ', '4401179424'),
(10004, 2, 10004, 'KPPN JAKARTA IV ', '9655436678'),
(10005, 2, 10005, 'KPPN JAKARTA V ', '6017305413'),
(10006, 2, 10006, 'KPPN JAKARTA VI (KHUSUS) ', '4467405983'),
(11000, 3, 11000, 'KANWIL DJPBN PROV. JABAR', '1182574126'),
(11001, 2, 11001, 'KPPN BANDUNG I ', '5290573106'),
(11002, 2, 11002, 'KPPN BANDUNG II', '8456756233'),
(11003, 2, 11003, 'KPPN BEKASI', '9467767380'),
(11004, 2, 11004, 'KPPN KARAWANG', '9294171046'),
(11005, 2, 11005, 'KPPN BOGOR ', '4200400793'),
(11006, 2, 11006, 'KPPN PURWAKARTA', '8322399037'),
(11007, 2, 11007, 'KPPN SUKABUMI', '9846680356'),
(11008, 2, 11008, 'KPPN GARUT', '3071530255'),
(11009, 2, 11009, 'KPPN CIREBON', '7524751249'),
(11010, 2, 11010, 'KPPN KUNINGAN', '7786593534'),
(11011, 2, 11011, 'KPPN TASIKMALAYA ', '5245157166'),
(11012, 2, 11012, 'KPPN SUMEDANG', '6400808839'),
(12000, 3, 12000, 'KANWIL DJPBN PROV. JATENG', '5682160496'),
(12001, 2, 12001, 'KPPN SEMARANG I', '5305897040'),
(12002, 2, 12002, 'KPPN SEMARANG II ', '8586998925'),
(12003, 2, 12003, 'KPPN SURAKARTA', '5651105861'),
(12004, 2, 12004, 'KPPN SRAGEN', '1176273173'),
(12005, 2, 12005, 'KPPN KLATEN', '4933296138'),
(12006, 2, 12006, 'KPPN PATI', '6930977099'),
(12007, 2, 12007, 'KPPN PURWODADI', '5732413343'),
(12008, 2, 12008, 'KPPN KUDUS', '8034899874'),
(12009, 2, 12009, 'KPPN PEKALONGAN', '1989877753'),
(12010, 2, 12010, 'KPPN TEGAL', '1715982732'),
(12011, 2, 12011, 'KPPN PURWOREJO', '2431011405'),
(12012, 2, 12012, 'KPPN PURWOKERTO ', '2072914895'),
(12013, 2, 12013, 'KPPN BANJARNEGARA', '9672475946'),
(12014, 2, 12014, 'KPPN CILACAP ', '8392225700'),
(12015, 2, 12015, 'KPPN MAGELANG', '2877290074'),
(13000, 3, 13000, 'KANWIL DJPBN PROV. DIY', '7055683932'),
(13001, 2, 13001, 'KPPN YOGYAKARTA ', '2696799796'),
(13002, 2, 13002, 'KPPN WATES ', '3079764936'),
(13003, 2, 13003, 'KPPN WONOSARI ', '9809293985'),
(14000, 3, 14000, 'KANWIL DJPBN PROV. JATIM', '8358772285'),
(14001, 2, 14001, 'KPPN SURABAYA I', '5320336768'),
(14002, 2, 14002, 'KPPN SURABAYA II', '4951840743'),
(14003, 2, 14003, 'KPPN SIDOARJO', '5894140034'),
(14004, 2, 14004, 'KPPN MALANG', '4187461249'),
(14005, 2, 14005, 'KPPN PAMEKASAN', '3952881847'),
(14006, 2, 14006, 'KPPN MOJOKERTO', '1336318861'),
(14007, 2, 14007, 'KPPN BANYUWANGI', '6886705366'),
(14008, 2, 14008, 'KPPN JEMBER ', '6554820406'),
(14009, 2, 14009, 'KPPN BONDOWOSO ', '8342460301'),
(14010, 2, 14010, 'KPPN MADIUN', '4141170706'),
(14011, 2, 14011, 'KPPN KEDIRI', '9251978087'),
(14012, 2, 14012, 'KPPN BLITAR', '5059372388'),
(14013, 2, 14013, 'KPPN BOJONEGORO', '3215397898'),
(14014, 2, 14014, 'KPPN TUBAN', '5293198048'),
(14015, 2, 14015, 'KPPN PACITAN', '4853572052'),
(15000, 3, 15000, 'KANWIL DJPBN PROV. KALBAR', '8156072259'),
(15001, 2, 15001, 'KPPN PONTIANAK', '4862651729'),
(15002, 2, 15002, 'KPPN SANGGAU', '4848822193'),
(15003, 2, 15003, 'KPPN SINGKAWANG', '2393969854'),
(15004, 2, 15004, 'KPPN KETAPANG', '5110859595'),
(15005, 2, 15005, 'KPPN SINTANG', '2225246521'),
(15006, 2, 15006, 'KPPN PUTUSSIBAU', '3302446694'),
(16000, 3, 16000, 'KANWIL DJPBN PROV.KALTENG', '2519532984'),
(16001, 2, 16001, 'KPPN PALANGKARAYA', '3912706744'),
(16002, 2, 16002, 'KPPN BUNTOK', '3501081176'),
(16003, 2, 16003, 'KPPN SAMPIT', '8464468882'),
(16004, 2, 16004, 'KPPN PANGKALAN BUN', '3329701632'),
(17000, 3, 17000, 'KANWIL DJPBN PROV. KALSEL ', '3142368860'),
(17001, 2, 17001, 'KPPN BANJARMASIN', '3670765056'),
(17002, 2, 17002, 'KPPN PELAIHARI', '5330175634'),
(17003, 2, 17003, 'KPPN BARABAI', '9701810759'),
(17004, 2, 17004, 'KPPN KOTABARU', '4454882242'),
(17005, 2, 17005, 'KPPN TANJUNG', '3846215111'),
(18000, 3, 18000, 'KANWIL DJPBN PROV. KALTIM', '9966495163'),
(18001, 2, 18001, 'KPPN SAMARINDA', '2409218857'),
(18002, 2, 18002, 'KPPN BALIKPAPAN', '4079278805'),
(18003, 2, 18003, 'KPPN TARAKAN', '6761920500'),
(18004, 2, 18004, 'KPPN NUNUKAN', '5114111857'),
(18005, 2, 18005, 'KPPN TANJUNG REDEB', '9342644047'),
(19000, 3, 19000, 'KANWIL DJPBN PROV. BALI ', '3992183389'),
(19001, 2, 19001, 'KPPN DENPASAR', '6147911251'),
(19002, 2, 19002, 'KPPN SINGARAJA', '9864120231'),
(19003, 2, 19003, 'KPPN AMLAPURA', '6482862447'),
(20000, 3, 20000, 'KANWIL DJPBN PROV. NTB', '6589872532'),
(20001, 2, 20001, 'KPPN MATARAM', '2872775217'),
(20002, 2, 20002, 'KPPN SELONG', '6439782339'),
(20003, 2, 20003, 'KPPN BIMA', '2435365436'),
(20004, 2, 20004, 'KPPN SUMBAWA BESAR', '7200372931'),
(21000, 3, 21000, 'KANWIL DJPBN PROV. NTT', '8082823703'),
(21001, 2, 21001, 'KPPN KUPANG', '2087321007'),
(21002, 2, 21002, 'KPPN ATAMBUA', '3589651799'),
(21003, 2, 21003, 'KPPN LARANTUKA', '8692798095'),
(21004, 2, 21004, 'KPPN ENDE', '8107432163'),
(21005, 2, 21005, 'KPPN RUTENG', '5249278611'),
(21006, 2, 21006, 'KPPN WAINGAPU', '4796804074'),
(22000, 3, 22000, 'KANWIL DJPBN PROV. SULSEL ', '1703857744'),
(22001, 2, 22001, 'KPPN MAKASSAR I', '9608860031'),
(22002, 2, 22002, 'KPPN MAKASSAR II', '8115675787'),
(22003, 2, 22003, 'KPPN PARE-PARE', '6302508401'),
(22004, 2, 22004, 'KPPN BENTENG', '3983369392'),
(22005, 2, 22005, 'KPPN BANTAENG', '5215908722'),
(22006, 2, 22006, 'KPPN SINJAI', '5238036223'),
(22007, 2, 22007, 'KPPN PALOPO', '6790578620'),
(22008, 2, 22008, 'KPPN WATAMPONE', '1804724750'),
(22009, 2, 22009, 'KPPN MAKALE', '5342251436'),
(22010, 2, 22010, 'KPPN MAMUJU', '7321401947'),
(22011, 2, 22011, 'KPPN MAJENE', '7021692261'),
(23000, 3, 23000, 'KANWIL DJPBN PROV. SULTENG', '4510656665'),
(23001, 2, 23001, 'KPPN PALU ', '1109451344'),
(23002, 2, 23002, 'KPPN POSO ', '3786392835'),
(23003, 2, 23003, 'KPPN LUWUK ', '2269883622'),
(23004, 2, 23004, 'KPPN TOLI - TOLI ', '5635920155'),
(23005, 2, 23005, 'KANWIL DJPBN PROV. SULTRA', '2244551867'),
(23006, 2, 23006, 'KPPN KENDARI ', '6029162340'),
(23007, 2, 23007, 'KPPN BAU - BAU ', '9533093481'),
(23008, 2, 23008, 'KPPN RAHA ', '3366274072'),
(23009, 2, 23009, 'KPPN KOLAKA ', '3463034747'),
(24000, 3, 24000, 'KANWIL DJPBN PROV. GORONTALO', '7420295820'),
(24001, 2, 24001, 'KPPN GORONTALO ', '4808038033'),
(24002, 2, 24002, 'KPPN MARISA ', '9684421433'),
(24003, 2, 24003, 'KANWIL DJPBN PROV. SULUT', '3991373059'),
(24004, 2, 24004, 'KPPN MANADO', '7015556868'),
(24005, 2, 24005, 'KPPN BITUNG', '8775180401'),
(24006, 2, 24006, 'KPPN KOTAMOBAGU', '7270835226'),
(24007, 2, 24007, 'KPPN TAHUNA', '5274036158'),
(25000, 3, 25000, 'KANWIL DJPBN PROV. MALUT', '9223007990'),
(25001, 2, 25001, 'KPPN TERNATE', '4169169671'),
(25002, 2, 25002, 'KPPN TOBELO', '1966118359'),
(26000, 3, 26000, 'KANWIL DJPBN PROV. MALUKU', '3856340178'),
(26001, 2, 26001, 'KPPN AMBON', '4669276755'),
(26002, 2, 26002, 'KPPN MASOHI', '6337249114'),
(26003, 2, 26003, 'KPPN TUAL', '5423947052'),
(26004, 2, 26004, 'KPPN SAUMLAKI', '7596186386'),
(27000, 3, 27000, 'KANWIL DJPBN PROV. PAPUA', '6776382248'),
(27001, 2, 27001, 'KPPN JAYAPURA', '1004408575'),
(27002, 2, 27002, 'KPPN BIAK', '6580681337'),
(27003, 2, 27003, 'KPPN SERUI', '1183447300'),
(27004, 2, 27004, 'KPPN MERAUKE', '2775668201'),
(27005, 2, 27005, 'KPPN WAMENA', '8430608681'),
(27006, 2, 27006, 'KPPN NABIRE ', '9951010148'),
(27007, 2, 27007, 'KPPN TIMIKA', '1441875492'),
(27008, 2, 27008, 'KPPN MANOKWARI', '7689188477'),
(27009, 2, 27009, 'KPPN SORONG', '9015165545'),
(27010, 2, 27010, 'KPPN FAK-FAK', '2413767936'),
(88888, 5, 88888, 'PKN', '1234567890'),
(99999, 4, 99999, 'BA.999', '1234567890');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
