-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Mar 2021 pada 01.15
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barang_db`
--
CREATE DATABASE IF NOT EXISTS `barang_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `barang_db`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_access`
--

DROP TABLE IF EXISTS `t_access`;
CREATE TABLE IF NOT EXISTS `t_access` (
  `idAccess` int(11) NOT NULL AUTO_INCREMENT,
  `userLevel` int(11) NOT NULL,
  `accessLevelUser` int(11) NOT NULL,
  PRIMARY KEY (`idAccess`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_access`
--

INSERT INTO `t_access` (`idAccess`, `userLevel`, `accessLevelUser`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 2, 3),
(6, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_agent_user`
--

DROP TABLE IF EXISTS `t_agent_user`;
CREATE TABLE IF NOT EXISTS `t_agent_user` (
  `idAgent` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `tanggal` varchar(200) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `os` varchar(100) DEFAULT NULL,
  `ipAddress` varchar(100) DEFAULT NULL,
  `blokirPengguna` enum('ya','tidak') DEFAULT NULL,
  PRIMARY KEY (`idAgent`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_agent_user`
--

INSERT INTO `t_agent_user` (`idAgent`, `userId`, `tanggal`, `browser`, `os`, `ipAddress`, `blokirPengguna`) VALUES
(61, 1, '1610799321', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(62, 1, '1610799659', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(63, 1, '1610799702', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(64, 1, '1610800012', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(65, 1, '1610809171', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(66, 1, '1610809235', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(67, 1, '1610820096', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(68, 1, '1610821359', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(69, 1, '1610821644', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(70, 1, '1610822488', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(71, 1, '1610833698', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(72, 1, '1610834267', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(73, 1, '1610862077', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(74, 1, '1610862381', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(75, 1, '1611250482', 'Chrome 87.0.4280.141', 'Windows 7', '::1', NULL),
(76, 1, '1611407095', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(77, 1, '1611409453', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(78, 1, '1611409704', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(79, 1, '1611430117', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(80, 1, '1611431384', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(81, 1, '1611432816', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(82, 1, '1611433993', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(83, 1, '1611438978', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(84, 1, '1611439096', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(85, 1, '1611518841', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(86, 1, '1611520950', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(87, 1, '1611587281', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(88, 1, '1611587349', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(89, 1, '1611589872', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(90, 1, '1611592349', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(91, 1, '1611594363', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(92, 1, '1611603295', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(93, 1, '1611663376', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(94, 1, '1611685276', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(95, 1, '1612330276', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(96, 1, '1612330514', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(97, 1, '1612330872', 'Chrome 88.0.4324.104', 'Windows 7', '::1', NULL),
(98, 1, '1615923926', 'Chrome 89.0.4389.82', 'Windows 7', '::1', NULL),
(99, 1, '1616781803', 'Chrome 89.0.4389.90', 'Windows 7', '::1', NULL),
(100, 1, '1616782252', 'Chrome 89.0.4389.90', 'Windows 7', '::1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_barang`
--

DROP TABLE IF EXISTS `t_barang`;
CREATE TABLE IF NOT EXISTS `t_barang` (
  `idBarang` int(11) NOT NULL AUTO_INCREMENT,
  `kodeBarang` varchar(100) NOT NULL,
  `namaBarang` varchar(150) NOT NULL,
  `gambarBarang` varchar(255) NOT NULL,
  `kategoriId` int(11) NOT NULL,
  `suplierId` int(11) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `perLsnOrPcs` int(11) NOT NULL,
  `satuanId` int(11) NOT NULL,
  `isiPerCtn` int(11) NOT NULL,
  `hargaModal` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `hargaBarang` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idBarang`),
  UNIQUE KEY `kodeBarang` (`kodeBarang`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_barang`
--

INSERT INTO `t_barang` (`idBarang`, `kodeBarang`, `namaBarang`, `gambarBarang`, `kategoriId`, `suplierId`, `ukuran`, `perLsnOrPcs`, `satuanId`, `isiPerCtn`, `hargaModal`, `diskon`, `hargaBarang`, `idUser`) VALUES
(22, '8789', 'Sunsilke', 'f96514f948ad9ad9f430554b5df3dc2f.png', 2, 1, '100', 12, 1, 48, 180000, 5, 14250, 1),
(23, '87892', 'Facs', '6d68f55e4b4dc8cf2197b601fe8df7eb.png', 2, 1, '100', 2, 2, 48, 180000, 5, 7125, 1),
(24, '87893', 'Facsa', '195a11bfc5c8a383fb9013539380781a.png', 2, 1, '250', 1, 3, 36, 420000, 10, 10500, 1),
(25, '32432', 'Sadfhjgjh', 'c383800c86d256acc0aa8deb4e786f45.png', 3, 2, '200', 1, 2, 64, 420000, 10, 31500, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_barang_transaksi`
--

DROP TABLE IF EXISTS `t_barang_transaksi`;
CREATE TABLE IF NOT EXISTS `t_barang_transaksi` (
  `idBarangTransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `transaksiKode` varchar(20) NOT NULL,
  `kodeBarang` int(20) NOT NULL,
  `namaBarang` varchar(100) NOT NULL,
  `kategoriId` int(11) NOT NULL,
  `suplierId` int(11) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `jumlahBarang` int(11) NOT NULL,
  `modalHarga` int(11) NOT NULL,
  `barangHarga` int(11) NOT NULL,
  `perBagi` int(11) NOT NULL,
  `diskonBarang` int(11) NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `ket` varchar(100) NOT NULL,
  PRIMARY KEY (`idBarangTransaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kategori_barang`
--

DROP TABLE IF EXISTS `t_kategori_barang`;
CREATE TABLE IF NOT EXISTS `t_kategori_barang` (
  `idKategori` int(11) NOT NULL AUTO_INCREMENT,
  `kodeKategori` varchar(100) NOT NULL,
  `namaKategori` varchar(250) NOT NULL,
  PRIMARY KEY (`idKategori`),
  UNIQUE KEY `kodeKategori` (`kodeKategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kategori_barang`
--

INSERT INTO `t_kategori_barang` (`idKategori`, `kodeKategori`, `namaKategori`) VALUES
(1, 'UN001', 'Facial Foam'),
(2, 'UN002', 'Shampo'),
(3, 'WD001', 'Facial Wash'),
(4, 'WD002', 'Foundation');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_konfigurasi`
--

DROP TABLE IF EXISTS `t_konfigurasi`;
CREATE TABLE IF NOT EXISTS `t_konfigurasi` (
  `idKonfig` int(11) NOT NULL AUTO_INCREMENT,
  `namaWeb` varchar(100) NOT NULL,
  `imgIcon` varchar(250) DEFAULT NULL,
  `metatext` varchar(100) DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `sumber` varchar(100) DEFAULT NULL,
  `tanggalDaftar` varchar(100) DEFAULT NULL,
  `tanggalUpdate` varchar(100) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idKonfig`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_konfigurasi`
--

INSERT INTO `t_konfigurasi` (`idKonfig`, `namaWeb`, `imgIcon`, `metatext`, `keywords`, `description`, `sumber`, `tanggalDaftar`, `tanggalUpdate`, `userId`) VALUES
(1, 'Batra Kosmetik', '75ebfd107a0a64771a7b12ab15115cea.png', 'toko Batra Kosmetik', 'toko, batra, kosmetik', 'Selamat Datang Di toko Batra', 'Toko Batra', '1604858577', '1608657455', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_login`
--

DROP TABLE IF EXISTS `t_login`;
CREATE TABLE IF NOT EXISTS `t_login` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `namaUser` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `emailUser` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenisKelamin` enum('pria','wanita') DEFAULT NULL,
  `noTelp` varchar(16) DEFAULT NULL,
  `alamat` text,
  `tanggalDaftar` varchar(100) DEFAULT NULL,
  `tanggalUpdate` varchar(100) DEFAULT NULL,
  `fotoUser` varchar(255) DEFAULT NULL,
  `levelUser` int(11) DEFAULT NULL,
  `statusUser` enum('aktif','nonaktif') DEFAULT NULL,
  `passwordSalah` int(11) DEFAULT NULL,
  `lastLogin` varchar(100) DEFAULT NULL,
  `blokir` enum('ya','tidak') DEFAULT NULL,
  `randVerifikasi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_login`
--

INSERT INTO `t_login` (`idUser`, `namaUser`, `username`, `emailUser`, `password`, `jenisKelamin`, `noTelp`, `alamat`, `tanggalDaftar`, `tanggalUpdate`, `fotoUser`, `levelUser`, `statusUser`, `passwordSalah`, `lastLogin`, `blokir`, `randVerifikasi`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '1b181a331b6f3a9df46d8778cddef18d3a82e7b10cd170032912173181a54b080739eb64bb9fd6b6dca710e45f530cef8fc87a5e6b60ff2ff7fe7ff6ecada006', 'pria', '026 1688 661', 'Ds. Panjaitan No. 733, Magelang 31141, SumSel', '1607019552', '1608959571', '044d35e19e132b453b0e9235d867409d.png', 1, 'aktif', 0, '1616782252', 'tidak', '0'),
(3, 'operator', 'operator', 'operator@gmail.com', '1b181a331b6f3a9df46d8778cddef18d3a82e7b10cd170032912173181a54b080739eb64bb9fd6b6dca710e45f530cef8fc87a5e6b60ff2ff7fe7ff6ecada006', 'pria', '085588552255', 'kubang laaweh', '1607092219', '1607092297', 'default.jpg', 2, 'aktif', 0, '1607752095', 'tidak', '0'),
(7, 'fajriwilsher', 'fajriw10', 'fajriwilsher30@gmail.com', '1b181a331b6f3a9df46d8778cddef18d3a82e7b10cd170032912173181a54b080739eb64bb9fd6b6dca710e45f530cef8fc87a5e6b60ff2ff7fe7ff6ecada006', NULL, NULL, NULL, '1608658396', '1608658554', '364dbf38eb93d4ff6889b74db3fe7f3b.jpg', 3, 'aktif', 0, '1608658513', 'tidak', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_member`
--

DROP TABLE IF EXISTS `t_member`;
CREATE TABLE IF NOT EXISTS `t_member` (
  `idMember` int(11) NOT NULL AUTO_INCREMENT,
  `member` varchar(122) NOT NULL,
  `ketMember` text NOT NULL,
  PRIMARY KEY (`idMember`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_member`
--

INSERT INTO `t_member` (`idMember`, `member`, `ketMember`) VALUES
(1, 'admin', '<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p><p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>'),
(2, 'operator', '<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p><p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>'),
(3, 'sales', '<p>Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country.</p><p> But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_menu`
--

DROP TABLE IF EXISTS `t_menu`;
CREATE TABLE IF NOT EXISTS `t_menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `namaMenu` varchar(255) DEFAULT NULL,
  `linkDropdown` varchar(100) NOT NULL,
  `iconMenu` varchar(100) NOT NULL,
  `statusMenu` enum('publish','sembunyikan') NOT NULL,
  `urutMenu` int(11) NOT NULL,
  `levelUserAccess` varchar(100) NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_menu`
--

INSERT INTO `t_menu` (`idMenu`, `namaMenu`, `linkDropdown`, `iconMenu`, `statusMenu`, `urutMenu`, `levelUserAccess`) VALUES
(1, 'Gudang', 'barang', 'fas fa-list-alt', 'publish', 1, '3'),
(2, 'Transaksi', 'transaksi', 'fas fa-handshake', 'publish', 2, '3'),
(3, 'Management', 'management', 'fas fa-users-cog', 'publish', 3, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_perusahaan`
--

DROP TABLE IF EXISTS `t_perusahaan`;
CREATE TABLE IF NOT EXISTS `t_perusahaan` (
  `idPerusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `namaPerusahaan` varchar(255) NOT NULL,
  `telpPerusahaan` varchar(14) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `npwpPerusahaan` varchar(20) NOT NULL,
  `alamatPerusahaan` text NOT NULL,
  PRIMARY KEY (`idPerusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_perusahaan`
--

INSERT INTO `t_perusahaan` (`idPerusahaan`, `namaPerusahaan`, `telpPerusahaan`, `fax`, `npwpPerusahaan`, `alamatPerusahaan`) VALUES
(1, 'PT. SUPERITA MITRA JAYA SUKSES', '0752625474', '0', '02.639.384.3-202.000', 'Jl Raya Bukittinggi - Medan Jl Raya Bukittinggi Medan Bypass Surau Gadang(Samping Anatama Swalayan) Bukittinggi-Kel. Koto Selayan Kec. Mandiangin Koto Selayan'),
(2, 'Kljsdkfl', '23214234', '23234', '324234', 'Ksdhkfhdskhgkdfhkgndfkjhjdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_satuan`
--

DROP TABLE IF EXISTS `t_satuan`;
CREATE TABLE IF NOT EXISTS `t_satuan` (
  `idSatuan` int(11) NOT NULL AUTO_INCREMENT,
  `kodeSatuan` varchar(10) NOT NULL,
  `namaSatuan` varchar(255) NOT NULL,
  PRIMARY KEY (`idSatuan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_satuan`
--

INSERT INTO `t_satuan` (`idSatuan`, `kodeSatuan`, `namaSatuan`) VALUES
(1, 'Pcs', 'Pices'),
(2, 'Lsn', 'Lusin'),
(3, 'Ctn', 'Karton'),
(4, 'Rtng', 'Renteng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_submenu`
--

DROP TABLE IF EXISTS `t_submenu`;
CREATE TABLE IF NOT EXISTS `t_submenu` (
  `idSubmenu` int(11) NOT NULL AUTO_INCREMENT,
  `namaSubmenu` varchar(100) NOT NULL,
  `urlSubmenu` varchar(100) NOT NULL,
  `statusSubmenu` enum('publish','sembunyikan') NOT NULL,
  `urutSubmenu` int(11) NOT NULL,
  `menuId` int(11) NOT NULL,
  PRIMARY KEY (`idSubmenu`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_submenu`
--

INSERT INTO `t_submenu` (`idSubmenu`, `namaSubmenu`, `urlSubmenu`, `statusSubmenu`, `urutSubmenu`, `menuId`) VALUES
(1, 'Data Barang', 'barang', 'publish', 1, 1),
(2, 'Kategori Barang', 'kategoriBarang', 'publish', 2, 1),
(3, 'Management konfig', 'managementKonfig', 'publish', 3, 3),
(4, 'Management Users', 'viewUser', 'publish', 1, 3),
(5, 'Management Agent', 'managementAgent', 'publish', 4, 3),
(6, 'Management Menu', 'managementMenu', 'publish', 2, 3),
(7, 'Data Suplier', 'suplier', 'publish', 3, 1),
(8, 'Data Satuan', 'satuan', 'publish', 4, 1),
(9, 'Tambah Transaksi', 'tambahTransaksi', 'publish', 1, 2),
(10, 'Manage Perusahaan', 'dataPerusahaan', 'publish', 5, 1),
(11, 'List Transaksi', 'listTransaksi', 'publish', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_suplier`
--

DROP TABLE IF EXISTS `t_suplier`;
CREATE TABLE IF NOT EXISTS `t_suplier` (
  `idSuplier` int(11) NOT NULL AUTO_INCREMENT,
  `kodeSuplier` varchar(10) NOT NULL,
  `namaSuplier` varchar(200) NOT NULL,
  PRIMARY KEY (`idSuplier`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_suplier`
--

INSERT INTO `t_suplier` (`idSuplier`, `kodeSuplier`, `namaSuplier`) VALUES
(1, 'UNI', 'Unilever'),
(2, 'KAO', 'Kao');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_transaksi`
--

DROP TABLE IF EXISTS `t_transaksi`;
CREATE TABLE IF NOT EXISTS `t_transaksi` (
  `idTransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `kodeOrder` varchar(12) NOT NULL,
  `tanggalOrder` date DEFAULT NULL,
  `kodeTransaksi` varchar(12) NOT NULL,
  `namaSales` varchar(200) NOT NULL,
  `pembayaran` enum('cash','kredit') NOT NULL,
  `perusahaanId` varchar(50) NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `pajak` int(11) NOT NULL,
  `totalSemua` int(11) NOT NULL,
  `ket` text NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`idTransaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_transaksi`
--

INSERT INTO `t_transaksi` (`idTransaksi`, `kodeOrder`, `tanggalOrder`, `kodeTransaksi`, `namaSales`, `pembayaran`, `perusahaanId`, `totalHarga`, `diskon`, `bonus`, `pajak`, `totalSemua`, `ket`, `userId`) VALUES
(4, 'OR1701219692', '2021-01-17', '132423', 'fdsdfsd', 'cash', '2', 1000000, 1000, 0, 10000, 1009000, 'fdgfdgf', 1),
(5, 'OR2401214486', '2021-01-18', '34546rgf', 'far', 'cash', '1', 1000000, 0, 0, 200000, 1200000, 'fdgfh', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
