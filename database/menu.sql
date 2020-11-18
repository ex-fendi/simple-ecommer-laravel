-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 06:26 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `final_dermaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `nomer` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_menu` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_menu` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_header` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `induk` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_controller` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_admin` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nomer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`nomer`, `id_menu`, `nama_menu`, `is_header`, `induk`, `nama_controller`, `urutan`, `level_admin`) VALUES
(1, 'pj', 'Penjual', 'y', '0', '-', '1', '3'),
(2, 'dtpj', 'Data Penjual', 'n', 'pj', 'penjual.home', '1', '3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
