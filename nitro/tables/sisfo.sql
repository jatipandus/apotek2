-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2017 at 06:23 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sisfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `fullname`, `gambar`) VALUES
(9, 'admin', 'admin', 'Admin SISPEN', 'gambar_admin/ii.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_kelahiran`
--

CREATE TABLE IF NOT EXISTS `data_kelahiran` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `no_akte` varchar(20) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ayah` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `ibu` varchar(50) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `agama` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `data_kelahiran`
--

INSERT INTO `data_kelahiran` (`id`, `no_akte`, `nik`, `nama`, `ayah`, `alamat`, `ibu`, `ttl`, `jk`, `agama`) VALUES
(4, '', '4343434', 'Onani Yasu', '', '', '', 'Bogor, 30 Maret 2013', 'L', 'Islam'),
(5, '', '14000181112', 'Alex', '', '', '', 'KP, 29 Oktober 1996', 'L', 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `data_kematian`
--

CREATE TABLE IF NOT EXISTS `data_kematian` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nik` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_kematian` varchar(20) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `nik_pelapor` int(50) NOT NULL,
  `hub_pelapor` varchar(35) NOT NULL,
  `sebab` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `data_kematian`
--

INSERT INTO `data_kematian` (`id`, `nik`, `nama`, `tanggal_kematian`, `tempat`, `nik_pelapor`, `hub_pelapor`, `sebab`) VALUES
(1, 2147483647, 'Agus Jose', '23/Maret/2016', 'di Kasur', 2147483647, 'Kerabat', 'Kecelakaan lalu lintas'),
(3, 2147483647, 'Kasim Ihsan', '30/Agustus/2017', 'Solo', 13213219, 'Saudara Kandung', 'Minum Alcohol');

-- --------------------------------------------------------

--
-- Table structure for table `data_kk`
--

CREATE TABLE IF NOT EXISTS `data_kk` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `no_kk` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `rtrw` varchar(10) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `no_pindah` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `data_kk`
--

INSERT INTO `data_kk` (`id`, `no_kk`, `nama`, `alamat`, `rtrw`, `desa`, `kecamatan`, `no_pindah`) VALUES
(1, '14020049900', 'Bagus Mantap', 'Jl. Kuningan', '09/08', 'Kotabaru', 'Umbulharjo IV', '92929');

-- --------------------------------------------------------

--
-- Table structure for table `data_migrasi`
--

CREATE TABLE IF NOT EXISTS `data_migrasi` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_pendatang` varchar(50) NOT NULL,
  `tgl_datang` varchar(20) NOT NULL,
  `alamat_asal` varchar(200) NOT NULL,
  `rtrw` varchar(10) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `data_migrasi`
--

INSERT INTO `data_migrasi` (`id`, `nik`, `nama`, `no_pendatang`, `tgl_datang`, `alamat_asal`, `rtrw`, `desa`, `kecamatan`, `keterangan`) VALUES
(1, '4343254652', 'Agus Jose', '688799', '14/04/2011', 'JL. Depokan', '19/08', 'Depok', 'Kotagede 2', '-');

-- --------------------------------------------------------

--
-- Table structure for table `data_mutasi`
--

CREATE TABLE IF NOT EXISTS `data_mutasi` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_pindah` varchar(50) NOT NULL,
  `tgl_pindah` varchar(20) NOT NULL,
  `alamat_pindah` varchar(200) NOT NULL,
  `rtrw` varchar(10) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `data_mutasi`
--

INSERT INTO `data_mutasi` (`id`, `nik`, `nama`, `no_pindah`, `tgl_pindah`, `alamat_pindah`, `rtrw`, `desa`, `kecamatan`, `keterangan`) VALUES
(1, '4343254444', 'Agung Julisman', '', '13/06/2013', 'JL. Kusumanegara', '02/12', 'Muja Muju', 'Umbulharjo IV', '-');

-- --------------------------------------------------------

--
-- Table structure for table `data_penduduk`
--

CREATE TABLE IF NOT EXISTS `data_penduduk` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nik` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `rtrw` varchar(10) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `agama` varchar(35) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(35) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `data_penduduk`
--

INSERT INTO `data_penduduk` (`id`, `nik`, `nama`, `ttl`, `jk`, `alamat`, `rtrw`, `desa`, `kecamatan`, `agama`, `pekerjaan`, `kewarganegaraan`, `status`, `foto`) VALUES
(1, 2147483647, 'M. Iqbal Mulyadi', 'Jambi, 30 Mei 1996', 'L', 'JL. Suka Sari Perum. Beringin Indah Blok.B No.16', '039/00', 'The Hok', 'Jambi Selatan', 'Islam', 'Mahasiswa', 'WNI', 'Kawin', ''),
(2, 1400018111, 'Panggah Widiandana', 'Curup, 26 Oktober 1995', 'L', 'Jl. Tamrin', '03/02', 'Pandowan/Pandowan', 'Galur', 'Islam', 'Mahasiswa', 'WNI', 'Beluim Kawin', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
