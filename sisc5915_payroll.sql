-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2021 at 11:06 AM
-- Server version: 10.3.31-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisc5915_payroll`
--
CREATE DATABASE IF NOT EXISTS `sisc5915_payroll` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sisc5915_payroll`;

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id` int(11) NOT NULL,
  `id_aset_kategori` tinyint(4) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(5000) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id`, `id_aset_kategori`, `serial_number`, `nama`, `keterangan`, `status`) VALUES
(1, 1, '13DAEAWEAD', 'Asus Vivobook T13', 'Komplit no minus', 1),
(2, 1, 'ADAD123123123', 'HP Pavilio MMM2', 'Kondisi 90%', 1),
(3, 2, 'ASDAE', 'Honda Beat Street', 'Untuk kendaraan kantor', 1),
(4, 1, '1020390912931', 'ASUS ROG', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `aset_kategori`
--

CREATE TABLE `aset_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aset_kategori`
--

INSERT INTO `aset_kategori` (`id`, `nama`, `status`) VALUES
(1, 'Laptop', 1),
(2, 'Kendaraan Roda 2', 1),
(3, 'Jaket Motor', 1),
(4, 'Kendaraan Roda 4', 1),
(5, 'Roda 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `benefit`
--

CREATE TABLE `benefit` (
  `id` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `berlaku_awal` date NOT NULL,
  `berlaku_akhir` date NOT NULL,
  `keterangan` varchar(5000) NOT NULL,
  `nominal_cover` decimal(20,2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benefit`
--

INSERT INTO `benefit` (`id`, `nama`, `berlaku_awal`, `berlaku_akhir`, `keterangan`, `nominal_cover`, `status`) VALUES
(1, 'Asuransi Phising', '2021-01-02', '2021-12-30', 'asdADASDASDEDIT', 2500000.00, 0),
(2, 'Asuransi Kesehatan Jiwa', '2021-01-01', '2022-01-01', 'Bebas keluar masuk RSJ', 7000000.00, 1),
(3, 'Asuransi BPJS', '2021-07-16', '2022-07-16', 'Asuransi Jiwa', 1000000.00, 0),
(4, 'Asuransi BPJS', '2021-07-16', '2022-07-16', 'Asuransi Jiwa', 1000000.00, 0),
(5, 'Asuransi Prudential', '2021-07-24', '2022-01-01', 'Asuransi Kesehatan', 1000000.00, 1),
(6, '', '2021-08-13', '2021-08-13', '', 0.00, 0),
(7, '', '2021-08-13', '2021-08-13', '', 0.00, 0),
(8, 'Asuransi Sinarmas', '2021-08-13', '2022-08-13', 'Menerima Claim Asuransi Barang', 100000000.00, 1),
(9, 'Asuransi BPJS', '2021-08-13', '2021-08-13', 'Asuransi Tipe Kesehatan', 20000000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(5000) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `nama`, `alamat`, `kota`, `kode_pos`, `status`) VALUES
(1, 'Office Center', 'Jalan Center', 'Surabaya', '51231', 1),
(2, 'MHS Waru', 'Waru No. 1 Sidoarjo', 'Sidoarjo', '21312', 1),
(3, 'Pakuwon Mall', 'Pakuwon Mall Kuda', 'Surabaya Cuy', '616161231231', 1);

-- --------------------------------------------------------

--
-- Table structure for table `histori_pajak_pegawai`
--

CREATE TABLE `histori_pajak_pegawai` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `total_pajak` decimal(20,2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histori_pajak_pegawai`
--

INSERT INTO `histori_pajak_pegawai` (`id`, `id_pegawai`, `tahun`, `total_pajak`, `status`) VALUES
(1, 2, 2021, 0.00, 1),
(2, 3, 2021, 0.00, 1),
(3, 6, 2021, 0.00, 1),
(4, 7, 2021, 213178.00, 1),
(5, 9, 2021, 825440.00, 1),
(6, 10, 2021, 0.00, 1),
(7, 12, 2021, 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `histori_thr_pegawai`
--

CREATE TABLE `histori_thr_pegawai` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `total_komponen` decimal(20,2) NOT NULL,
  `total_pajak` decimal(20,2) NOT NULL,
  `total_diterima` decimal(20,2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histori_thr_pegawai`
--

INSERT INTO `histori_thr_pegawai` (`id`, `id_pegawai`, `tahun`, `total_komponen`, `total_pajak`, `total_diterima`, `status`) VALUES
(1, 2, 2021, 6000000.00, 0.00, 6000000.00, 1),
(2, 3, 2021, 5000000.00, 0.00, 5000000.00, 1),
(3, 6, 2021, 4500000.00, 0.00, 4500000.00, 1),
(4, 7, 2021, 12500000.00, 0.00, 12500000.00, 1),
(5, 9, 2021, 15000000.00, 0.00, 15000000.00, 1),
(6, 10, 2021, 6000000.00, 0.00, 6000000.00, 1),
(7, 12, 2021, 4300000.00, 0.00, 4300000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `histori_upah_pegawai`
--

CREATE TABLE `histori_upah_pegawai` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `bulantahun` varchar(10) NOT NULL,
  `total_komponen` decimal(20,2) NOT NULL,
  `total_pinjaman` decimal(20,2) NOT NULL,
  `total_kehadiran` decimal(20,2) NOT NULL,
  `total_pajak` decimal(20,2) NOT NULL,
  `total_diterima` decimal(20,2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histori_upah_pegawai`
--

INSERT INTO `histori_upah_pegawai` (`id`, `id_pegawai`, `bulantahun`, `total_komponen`, `total_pinjaman`, `total_kehadiran`, `total_pajak`, `total_diterima`, `status`) VALUES
(1, 2, '2021-08', 5850000.00, 0.00, 4807020.00, 0.00, 1042980.00, 1),
(2, 3, '2021-08', 4150000.00, 0.00, 5200000.00, 0.00, -1050000.00, 1),
(3, 6, '2021-08', 5350000.00, 0.00, 5133840.00, 0.00, 216160.00, 1),
(4, 7, '2021-08', 13550000.00, 0.00, 5986440.00, 0.00, 7563560.00, 1),
(5, 9, '2021-08', 16000000.00, 0.00, 1294400.00, 0.00, 14705600.00, 1),
(6, 10, '2021-08', 6050000.00, 522500.00, 5200000.00, 0.00, 327500.00, 1),
(7, 12, '2021-08', 4085000.00, 0.00, 5200000.00, 0.00, -1115000.00, 1),
(8, 2, '2021-01', 5850000.00, 0.00, 5400000.00, 0.00, 450000.00, 1),
(9, 3, '2021-01', 5100000.00, 0.00, 5400000.00, 0.00, -300000.00, 1),
(10, 6, '2021-01', 5350000.00, 0.00, 5400000.00, 0.00, -50000.00, 1),
(11, 7, '2021-01', 13550000.00, 0.00, 5400000.00, 0.00, 8150000.00, 1),
(12, 9, '2021-01', 16000000.00, 0.00, 5400000.00, 0.00, 10600000.00, 1),
(13, 10, '2021-01', 6050000.00, 522500.00, 5400000.00, 0.00, 127500.00, 1),
(14, 12, '2021-01', 4085000.00, 0.00, 5400000.00, 0.00, -1315000.00, 1),
(15, 2, '2021-02', 5850000.00, 0.00, 5200000.00, 0.00, 650000.00, 1),
(16, 3, '2021-02', 5100000.00, 0.00, 5200000.00, 0.00, -100000.00, 1),
(17, 6, '2021-02', 5350000.00, 0.00, 5200000.00, 0.00, 150000.00, 1),
(18, 7, '2021-02', 13550000.00, 0.00, 5200000.00, 0.00, 8350000.00, 1),
(19, 9, '2021-02', 16000000.00, 0.00, 5200000.00, 0.00, 10800000.00, 1),
(20, 10, '2021-02', 6050000.00, 522500.00, 5200000.00, 0.00, 327500.00, 1),
(21, 12, '2021-02', 4085000.00, 0.00, 5200000.00, 0.00, -1115000.00, 1),
(22, 2, '2021-03', 5850000.00, 0.00, 4800000.00, 0.00, 1050000.00, 1),
(23, 3, '2021-03', 5100000.00, 0.00, 4800000.00, 0.00, 300000.00, 1),
(24, 6, '2021-03', 5350000.00, 0.00, 4800000.00, 0.00, 550000.00, 1),
(25, 7, '2021-03', 13550000.00, 0.00, 4800000.00, 0.00, 8750000.00, 1),
(26, 9, '2021-03', 16000000.00, 0.00, 4800000.00, 0.00, 11200000.00, 1),
(27, 10, '2021-03', 6050000.00, 522500.00, 4800000.00, 0.00, 727500.00, 1),
(28, 12, '2021-03', 4085000.00, 0.00, 4800000.00, 0.00, -715000.00, 1),
(29, 2, '2021-04', 5850000.00, 0.00, 5400000.00, 0.00, 450000.00, 1),
(30, 3, '2021-04', 5100000.00, 0.00, 5400000.00, 0.00, -300000.00, 1),
(31, 6, '2021-04', 5350000.00, 0.00, 5400000.00, 0.00, -50000.00, 1),
(32, 7, '2021-04', 13550000.00, 0.00, 5400000.00, 0.00, 8150000.00, 1),
(33, 9, '2021-04', 16000000.00, 0.00, 5400000.00, 0.00, 10600000.00, 1),
(34, 10, '2021-04', 6050000.00, 522500.00, 5400000.00, 0.00, 127500.00, 1),
(35, 12, '2021-04', 4085000.00, 0.00, 5400000.00, 0.00, -1315000.00, 1),
(36, 2, '2021-07', 5850000.00, 0.00, 5200000.00, 0.00, 650000.00, 1),
(37, 3, '2021-07', 5100000.00, 0.00, 5200000.00, 0.00, -100000.00, 1),
(38, 6, '2021-07', 5350000.00, 0.00, 5200000.00, 0.00, 150000.00, 1),
(39, 7, '2021-07', 13550000.00, 0.00, 5200000.00, 0.00, 8350000.00, 1),
(40, 9, '2021-07', 16000000.00, 0.00, 5200000.00, 0.00, 10800000.00, 1),
(41, 10, '2021-07', 6050000.00, 522500.00, 5200000.00, 0.00, 327500.00, 1),
(42, 12, '2021-07', 4085000.00, 0.00, 5200000.00, 0.00, -1115000.00, 1),
(43, 2, '2021-09', 5850000.00, 0.00, 8752400.00, 0.00, -2902400.00, 1),
(44, 3, '2021-09', 4150000.00, 0.00, 4600000.00, 0.00, -450000.00, 1),
(45, 6, '2021-09', 5350000.00, 0.00, 4600000.00, 0.00, 750000.00, 1),
(46, 7, '2021-09', 13550000.00, 0.00, 4600000.00, 0.00, 8950000.00, 1),
(47, 9, '2021-09', 15650000.00, 0.00, 8296850.00, 0.00, 7353150.00, 1),
(48, 10, '2021-09', 6050000.00, 0.00, 4600000.00, 0.00, 1450000.00, 1),
(49, 12, '2021-09', 4085000.00, 0.00, 4600000.00, 0.00, -515000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ijin`
--

CREATE TABLE `ijin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `durasi` int(11) NOT NULL,
  `tipe` varchar(25) NOT NULL COMMENT 'IJIN/CUTI',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ijin`
--

INSERT INTO `ijin` (`id`, `nama`, `durasi`, `tipe`, `status`) VALUES
(1, 'Sakit', 6, 'Ijin', 1),
(2, 'Lain-lain', 6, 'Ijin', 1),
(3, 'Melahirkan', 60, 'Cuti', 1),
(4, 'Kecelakaan Rawat Jalan', 12, 'Ijin', 1),
(5, 'Idul Adha', 1, 'Cuti', 0),
(6, 'Operasi', 10, 'Ijin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kerja`
--

CREATE TABLE `jadwal_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hari` tinyint(1) NOT NULL COMMENT '1=minggu,7=sabtu',
  `masuk` varchar(10) NOT NULL,
  `pulang` varchar(10) NOT NULL,
  `istirahat_keluar` varchar(10) NOT NULL,
  `istirahat_masuk` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_kerja`
--

INSERT INTO `jadwal_kerja` (`id`, `nama`, `hari`, `masuk`, `pulang`, `istirahat_keluar`, `istirahat_masuk`, `status`) VALUES
(1, 'Senin', 2, '07:00', '17:00', '12:00', '13:00', 1),
(2, 'Selasa', 3, '09:00', '17:00', '12:00', '13:00', 1),
(3, 'Rabu', 4, '09:00', '17:00', '12:00', '13:00', 1),
(4, 'Kamis', 5, '09:00', '17:00', '12:00', '13:00', 1),
(5, 'Jumat', 6, '09:00', '17:00', '12:00', '13:00', 1),
(9, 'Sabtu', 7, '09:00', '13:00', '11:00', '12:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_libur`
--

CREATE TABLE `jadwal_libur` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_libur`
--

INSERT INTO `jadwal_libur` (`id`, `keterangan`, `tanggal`, `status`) VALUES
(1, 'Idul Adha', '2021-07-21', 1),
(2, 'Hari Ayah', '2021-08-01', 1),
(4, 'Muharram', '2021-08-11', 1),
(5, 'Hari Kemerdekaan', '2021-08-17', 1),
(6, 'Hari Pancasila', '2021-11-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `komponen_thr`
--

CREATE TABLE `komponen_thr` (
  `id` int(11) NOT NULL,
  `id_komponen_upah` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komponen_thr`
--

INSERT INTO `komponen_thr` (`id`, `id_komponen_upah`, `status`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komponen_upah`
--

CREATE TABLE `komponen_upah` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` tinyint(1) NOT NULL COMMENT '1=allowance,2=deductions',
  `termasuk_pajak` tinyint(1) NOT NULL COMMENT '0=tidak,1=ya',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komponen_upah`
--

INSERT INTO `komponen_upah` (`id`, `nama`, `tipe`, `termasuk_pajak`, `status`) VALUES
(1, 'Gaji Pokok', 1, 1, 1),
(2, 'Tunjangan Jabatan', 1, 1, 1),
(3, 'Tunjangan Keluarga', 1, 1, 1),
(4, 'Potongan Arisan', 2, 0, 1),
(5, 'Potongan Hari Tua', 2, 0, 1),
(7, 'Biaya Jabatan', 2, 1, 1),
(8, 'Uang Makan', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `judul` varchar(255) NOT NULL,
  `isi` varchar(5000) NOT NULL,
  `tipe` varchar(15) NOT NULL COMMENT 'KARYAWAN/ADMIN/SEMUA',
  `untuk_pegawai` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `id_pegawai`, `tanggal`, `judul`, `isi`, `tipe`, `untuk_pegawai`, `status`) VALUES
(1, 2, '2021-08-04 15:43:54', 'Coba', 'Test test', 'ADMIN', 0, 2),
(2, 2, '2021-08-04 15:43:54', 'Test', 'coba coba 2', 'KARYAWAN', 2, 2),
(3, 2, '2021-08-04 16:08:05', 'Test', 'Test 3 bro.. ', 'KARYAWAN', 2, 2),
(4, 3, '2021-08-04 16:46:53', 'Reimburse berhasil ditambahkan!', 'Selamat! Pengajuan reimburse 250000 anda berhasil disimpan.', 'KARYAWAN', 3, 2),
(5, 3, '2021-08-04 16:47:58', 'Pengajuan reimburse!', 'Terdapat pengajuan reimburse dengan nominal 250000 atas nama boy.', 'ADMIN', 0, 2),
(6, 3, '2021-08-04 16:50:48', 'Reimburse berhasil ditambahkan!', 'Selamat! Pengajuan reimburse 500000 anda berhasil disimpan.', 'KARYAWAN', 3, 2),
(7, 3, '2021-08-04 16:50:58', 'Pengajuan reimburse!', 'Terdapat pengajuan reimburse dengan nominal 500000 atas nama boy.', 'ADMIN', 0, 2),
(8, 2, '2021-08-04 16:58:36', 'Reimburse diubah status!', 'Pengajuan reimburse anda telah diubah oleh admin.', 'KARYAWAN', 3, 2),
(9, 2, '2021-08-04 17:03:30', 'Pengajuan kas advance diubah status!', 'Pengajuan kas advance anda dengan nominal 250000.00 telah diubah oleh admin.', 'KARYAWAN', 3, 2),
(10, 2, '2021-08-04 17:11:58', 'Pengajuan pinjaman diubah status!', 'Pengajuan pinjaman anda dengan nominal 300000.00 telah diubah oleh admin.', 'KARYAWAN', 3, 2),
(11, 3, '2021-08-04 17:35:31', 'Profil pegawai telah diubah!', 'Profil pegawai dengan nama boy telah diubah.', 'ADMIN', 0, 2),
(12, 3, '2021-08-06 13:42:19', 'Benefit berhasil ditambahkan!', 'Selamat! Pengajuan benefit Asuransi Kesehatan Jiwa anda berhasil disimpan.', 'KARYAWAN', 3, 2),
(13, 3, '2021-08-06 13:38:43', 'Pengajuan benefit!', 'Selamat! Pengajuan benefit Asuransi Kesehatan Jiwa atas nama boy.', 'ADMIN', 0, 2),
(14, 2, '2021-08-10 17:56:26', 'Pembuatan akun berhasil!', 'Selamat! Akun hendra berhasil ditambahkan.', 'ADMIN', 0, 2),
(15, 2, '2021-08-13 05:48:28', 'Benefit berhasil ditambahkan!', 'Selamat! Pengajuan benefit Asuransi Kesehatan Jiwa anda berhasil disimpan.', 'KARYAWAN', 2, 2),
(16, 2, '2021-08-10 17:56:26', 'Pengajuan benefit!', 'Selamat! Pengajuan benefit Asuransi Kesehatan Jiwa atas nama Edi Sejati.', 'ADMIN', 0, 2),
(17, 8, '2021-08-10 17:56:26', 'Profil pegawai telah diubah!', 'Profil pegawai dengan nama Hendra Wijaya telah diubah.', 'ADMIN', 0, 2),
(18, 8, '2021-08-10 17:56:26', 'Data keluarga ditambahkan!', 'Data keluarga pegawai dengan nama Hendra Wijaya telah ditambahkan.', 'ADMIN', 0, 2),
(19, 8, '2021-08-10 17:56:26', 'Data pendidikan ditambahkan!', 'Data pendidikan pegawai dengan nama Hendra Wijaya telah ditambahkan.', 'ADMIN', 0, 2),
(20, 8, '2021-08-10 17:56:26', 'Data pengalaman kerja ditambahkan!', 'Data pengalaman kerja pegawai dengan nama Hendra Wijaya telah ditambahkan.', 'ADMIN', 0, 2),
(21, 8, '2021-08-13 05:48:28', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 6654375.', 'KARYAWAN', 2, 2),
(22, 8, '2021-08-13 07:22:13', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 5250000.', 'KARYAWAN', 3, 2),
(23, 8, '2021-08-10 17:46:07', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 3900000.', 'KARYAWAN', 5, 1),
(24, 8, '2021-08-10 17:46:07', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 5000000.', 'KARYAWAN', 6, 1),
(25, 8, '2021-08-10 17:46:07', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 12453541.666667.', 'KARYAWAN', 7, 1),
(26, 8, '2021-08-10 17:56:26', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 5200000.', 'KARYAWAN', 8, 2),
(27, 8, '2021-08-10 17:56:26', 'Pekerjaan berhasil ditambahkan!', 'Selamat! Anda berhasil ditambahkan kepada pekerjaan dengan nomor pegawai PEG2021008 berhasil ditambahkan.', 'KARYAWAN', 8, 2),
(28, 8, '2021-08-10 17:56:26', 'Reimburse berhasil ditambahkan!', 'Selamat! Pengajuan reimburse 100000 anda berhasil disimpan.', 'KARYAWAN', 8, 2),
(29, 8, '2021-08-10 17:56:26', 'Pengajuan reimburse!', 'Terdapat pengajuan reimburse dengan nominal 100000 atas nama Hendra Wijaya.', 'ADMIN', 0, 2),
(30, 8, '2021-08-13 05:48:28', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210715QJLFXMGZNV dan dibayarkan dengan nominal 113333.33333333 berhasil disimpan.', 'KARYAWAN', 2, 2),
(31, 8, '2021-08-13 05:48:28', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 6500946.6666667.', 'KARYAWAN', 2, 2),
(32, 8, '2021-08-13 07:22:13', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210805BENKBFQMDJ dan dibayarkan dengan nominal 54500 berhasil disimpan.', 'KARYAWAN', 3, 2),
(33, 8, '2021-08-13 07:22:13', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4915500.', 'KARYAWAN', 3, 2),
(34, 8, '2021-08-10 17:53:08', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 3770000.', 'KARYAWAN', 5, 1),
(35, 8, '2021-08-10 17:53:08', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210724BYM4AIODD5 dan dibayarkan dengan nominal 181666.66666667 berhasil disimpan.', 'KARYAWAN', 6, 1),
(36, 8, '2021-08-10 17:53:08', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4714493.3333333.', 'KARYAWAN', 6, 1),
(37, 8, '2021-08-10 17:53:08', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210724MKFYODBI8Q dan dibayarkan dengan nominal 76633.333333333 berhasil disimpan.', 'KARYAWAN', 7, 1),
(38, 8, '2021-08-10 17:53:08', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 11522718.333333.', 'KARYAWAN', 7, 1),
(39, 8, '2021-08-10 17:56:26', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 5070000.', 'KARYAWAN', 8, 2),
(40, 8, '2021-08-13 05:48:28', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 250000.00 telah diubah oleh admin.', 'KARYAWAN', 2, 2),
(41, 8, '2021-08-13 05:48:28', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 250000.00 telah diubah oleh admin.', 'KARYAWAN', 2, 2),
(42, 8, '2021-08-13 07:22:13', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 3000000.00 telah diubah oleh admin.', 'KARYAWAN', 3, 2),
(43, 8, '2021-08-13 07:22:13', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 15000000.00 telah diubah oleh admin.', 'KARYAWAN', 3, 2),
(44, 8, '2021-08-13 07:22:13', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 4500000.00 telah diubah oleh admin.', 'KARYAWAN', 3, 2),
(45, 8, '2021-08-13 07:22:13', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 500000.00 telah diubah oleh admin.', 'KARYAWAN', 3, 2),
(46, 8, '2021-08-13 05:48:28', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 500000.00 telah diubah oleh admin.', 'KARYAWAN', 2, 2),
(47, 8, '2021-08-10 17:55:21', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 450000.00 telah diubah oleh admin.', 'KARYAWAN', 7, 1),
(48, 8, '2021-08-10 17:55:25', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 150000.00 telah diubah oleh admin.', 'KARYAWAN', 7, 1),
(49, 8, '2021-08-10 17:55:29', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 100000.00 telah diubah oleh admin.', 'KARYAWAN', 7, 1),
(50, 8, '2021-08-13 07:22:13', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 250000.00 telah diubah oleh admin.', 'KARYAWAN', 3, 2),
(51, 8, '2021-08-13 07:22:13', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 500000.00 telah diubah oleh admin.', 'KARYAWAN', 3, 2),
(52, 8, '2021-08-10 17:56:26', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 100000.00 telah diubah oleh admin.', 'KARYAWAN', 8, 2),
(53, 8, '2021-08-10 17:56:56', 'Pengajuan pinjaman!', 'Terdapat pengajuan pinjaman dengan nominal 2000000 atas nama Hendra Wijaya.', 'ADMIN', 0, 2),
(54, 8, '2021-08-13 05:48:28', 'Pengajuan pinjaman diubah status!', 'Pengajuan pinjaman anda dengan nominal 2000000.00 telah diubah oleh admin.', 'KARYAWAN', 2, 2),
(55, 8, '2021-08-13 05:48:28', 'Pengajuan pinjaman diubah status!', 'Pengajuan pinjaman anda dengan nominal 250000.00 telah diubah oleh admin.', 'KARYAWAN', 2, 2),
(56, 8, '2021-08-10 17:58:06', 'Pengajuan pinjaman diubah status!', 'Pengajuan pinjaman anda dengan nominal 1000000.00 telah diubah oleh admin.', 'KARYAWAN', 6, 1),
(57, 8, '2021-08-10 17:58:09', 'Pengajuan pinjaman diubah status!', 'Pengajuan pinjaman anda dengan nominal 200000.00 telah diubah oleh admin.', 'KARYAWAN', 6, 1),
(58, 8, '2021-08-10 17:58:13', 'Pengajuan pinjaman diubah status!', 'Pengajuan pinjaman anda dengan nominal 220000.00 telah diubah oleh admin.', 'KARYAWAN', 7, 1),
(59, 8, '2021-08-13 07:22:13', 'Pengajuan pinjaman diubah status!', 'Pengajuan pinjaman anda dengan nominal 300000.00 telah diubah oleh admin.', 'KARYAWAN', 3, 2),
(60, 8, '2021-08-10 17:58:50', 'Pengajuan pinjaman diubah status!', 'Pengajuan pinjaman anda dengan nominal 2000000.00 telah diubah oleh admin.', 'KARYAWAN', 8, 1),
(61, 8, '2021-08-10 18:00:07', 'Benefit berhasil ditambahkan!', 'Selamat! Pengajuan benefit Asuransi Prudential anda berhasil disimpan.', 'KARYAWAN', 8, 1),
(62, 8, '2021-08-13 05:48:28', 'Pengajuan benefit!', 'Selamat! Pengajuan benefit Asuransi Prudential atas nama Hendra Wijaya.', 'ADMIN', 0, 2),
(63, 8, '2021-08-13 05:48:28', 'Pengajuan kas advance!', 'Terdapat pengajuan kas advance dengan nominal 700000 atas nama Hendra Wijaya.', 'ADMIN', 0, 2),
(64, 8, '2021-08-10 18:02:36', 'Pengajuan kas advance diubah status!', 'Pengajuan kas advance anda dengan nominal 700000.00 telah diubah oleh admin.', 'KARYAWAN', 8, 1),
(65, 8, '2021-08-13 05:48:28', 'Pengajuan lembur!', 'Terdapat pengajuan lembur pada tanggal 2021-08-11 atas nama Hendra Wijaya.', 'ADMIN', 0, 2),
(66, 8, '2021-08-10 18:03:55', 'Pengajuan lembur diubah status!', 'Pengajuan lembur anda pada tanggal 2021-08-11 telah diubah oleh admin.', 'KARYAWAN', 8, 1),
(67, 2, '2021-08-13 05:48:28', 'Reimburse berhasil ditambahkan!', 'Selamat! Pengajuan reimburse 100000 anda berhasil disimpan.', 'KARYAWAN', 2, 2),
(68, 2, '2021-08-13 05:48:28', 'Pengajuan reimburse!', 'Terdapat pengajuan reimburse dengan nominal 100000 atas nama Edi Sejati.', 'ADMIN', 0, 2),
(69, 2, '2021-08-13 05:51:51', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal 100000.00 telah diubah oleh admin.', 'KARYAWAN', 2, 2),
(70, 2, '2021-08-13 05:51:51', 'Reimburse berhasil ditambahkan!', 'Selamat! Pengajuan reimburse 100000 anda berhasil disimpan.', 'KARYAWAN', 2, 2),
(71, 2, '2021-08-13 05:51:51', 'Pengajuan reimburse!', 'Terdapat pengajuan reimburse dengan nominal 100000 atas nama Edi Sejati.', 'ADMIN', 0, 2),
(72, 2, '2021-08-13 06:08:35', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 6614280.', 'KARYAWAN', 2, 2),
(73, 2, '2021-08-13 07:22:13', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4970000.', 'KARYAWAN', 3, 2),
(74, 2, '2021-08-13 05:53:24', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 3770000.', 'KARYAWAN', 5, 1),
(75, 2, '2021-08-13 05:53:24', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4896160.', 'KARYAWAN', 6, 1),
(76, 2, '2021-08-13 05:53:25', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 11599351.666667.', 'KARYAWAN', 7, 1),
(77, 2, '2021-08-13 05:53:25', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210811AFCVILR7BY dan dibayarkan dengan nominal 696666.66666667 berhasil disimpan.', 'KARYAWAN', 8, 1),
(78, 2, '2021-08-13 05:53:25', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4373333.3333333.', 'KARYAWAN', 8, 1),
(79, 2, '2021-08-13 06:08:35', 'Pembuatan akun berhasil!', 'Selamat! Akun novem berhasil ditambahkan.', 'ADMIN', 0, 2),
(80, 2, '2021-08-13 06:08:35', 'Benefit berhasil ditambahkan!', 'Selamat! Pengajuan benefit Asuransi Prudential anda berhasil disimpan.', 'KARYAWAN', 2, 2),
(81, 2, '2021-08-13 06:08:35', 'Pengajuan benefit!', 'Selamat! Pengajuan benefit Asuransi Prudential atas nama Edi Sejati.', 'ADMIN', 0, 2),
(82, 9, '2021-08-13 06:08:35', 'Profil pegawai telah diubah!', 'Profil pegawai dengan nama Novem Iryani telah diubah.', 'ADMIN', 0, 2),
(83, 9, '2021-08-13 06:08:35', 'Data keluarga ditambahkan!', 'Data keluarga pegawai dengan nama Novem Iryani telah ditambahkan.', 'ADMIN', 0, 2),
(84, 9, '2021-08-13 06:08:35', 'Data pendidikan ditambahkan!', 'Data pendidikan pegawai dengan nama Novem Iryani telah ditambahkan.', 'ADMIN', 0, 2),
(85, 9, '2021-08-13 06:08:35', 'Data pengalaman kerja ditambahkan!', 'Data pengalaman kerja pegawai dengan nama Novem Iryani telah ditambahkan.', 'ADMIN', 0, 2),
(86, 9, '2021-09-11 07:43:43', 'Pekerjaan berhasil ditambahkan!', 'Selamat! Anda berhasil ditambahkan kepada pekerjaan dengan nomor pegawai PEG2021009 berhasil ditambahkan.', 'KARYAWAN', 9, 2),
(87, 9, '2021-08-13 06:08:35', 'Benefit berhasil ditambahkan!', 'Selamat! Anda berhasil menambahkan ', 'ADMIN', 0, 2),
(88, 9, '2021-08-13 06:08:35', 'Benefit berhasil ditambahkan!', 'Selamat! Anda berhasil menambahkan ', 'ADMIN', 0, 2),
(89, 9, '2021-08-13 06:08:35', 'Benefit berhasil ditambahkan!', 'Selamat! Anda berhasil menambahkan Asuransi Sinarmas', 'ADMIN', 0, 2),
(90, 9, '2021-09-11 07:43:43', 'Benefit berhasil ditambahkan!', 'Selamat! Pengajuan benefit Asuransi Sinarmas anda berhasil disimpan.', 'KARYAWAN', 9, 2),
(91, 9, '2021-08-13 06:08:35', 'Pengajuan benefit!', 'Selamat! Pengajuan benefit Asuransi Sinarmas atas nama Novem Iryani.', 'ADMIN', 0, 2),
(92, 9, '2021-08-13 07:23:56', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 6614280.', 'KARYAWAN', 2, 2),
(93, 9, '2021-08-13 07:22:13', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4970000.', 'KARYAWAN', 3, 2),
(94, 9, '2021-08-13 06:18:41', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 3770000.', 'KARYAWAN', 5, 1),
(95, 9, '2021-08-13 06:18:41', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4896160.', 'KARYAWAN', 6, 1),
(96, 9, '2021-08-13 06:18:41', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 11599351.666667.', 'KARYAWAN', 7, 1),
(97, 9, '2021-08-13 06:18:41', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210811AFCVILR7BY dan dibayarkan dengan nominal 696666.66666667 berhasil disimpan.', 'KARYAWAN', 8, 1),
(98, 9, '2021-08-13 06:18:41', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4373333.3333333.', 'KARYAWAN', 8, 1),
(99, 9, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4870000.', 'KARYAWAN', 9, 2),
(100, 9, '2021-08-13 07:23:56', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 6654375.', 'KARYAWAN', 2, 2),
(101, 9, '2021-08-13 07:22:13', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 5250000.', 'KARYAWAN', 3, 2),
(102, 9, '2021-08-13 06:25:49', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 3900000.', 'KARYAWAN', 5, 1),
(103, 9, '2021-08-13 06:25:49', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 5000000.', 'KARYAWAN', 6, 1),
(104, 9, '2021-08-13 06:25:49', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 12453541.666667.', 'KARYAWAN', 7, 1),
(105, 9, '2021-08-13 06:25:49', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 5200000.', 'KARYAWAN', 8, 1),
(106, 9, '2021-09-11 07:43:43', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 5000000.', 'KARYAWAN', 9, 2),
(107, 9, '2021-08-13 07:23:56', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 6614280.', 'KARYAWAN', 2, 2),
(108, 9, '2021-08-13 07:22:13', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4970000.', 'KARYAWAN', 3, 2),
(109, 9, '2021-08-13 06:27:24', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 3770000.', 'KARYAWAN', 5, 1),
(110, 9, '2021-08-13 06:27:24', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4896160.', 'KARYAWAN', 6, 1),
(111, 9, '2021-08-13 06:27:24', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 11599351.666667.', 'KARYAWAN', 7, 1),
(112, 9, '2021-08-13 06:27:24', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210811AFCVILR7BY dan dibayarkan dengan nominal 696666.66666667 berhasil disimpan.', 'KARYAWAN', 8, 1),
(113, 9, '2021-08-13 06:27:24', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4373333.3333333.', 'KARYAWAN', 8, 1),
(114, 9, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4870000.', 'KARYAWAN', 9, 2),
(115, 9, '2021-08-13 07:23:56', 'Pengajuan file upload!', 'Terdapat pengajuan file upload dengan judul Informasi 17 Agustus atas nama Novem Iryani.', 'ADMIN', 0, 2),
(116, 9, '2021-09-11 07:43:43', 'Pengajuan upload file diubah status!', 'Pengajuan upload file anda dengan judul Informasi 17 Agustus telah diubah oleh admin.', 'KARYAWAN', 9, 2),
(117, 9, '2021-08-13 07:23:56', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 6614280.', 'KARYAWAN', 2, 2),
(118, 9, '2021-08-13 07:22:13', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4970000.', 'KARYAWAN', 3, 2),
(119, 9, '2021-08-13 06:45:14', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 3770000.', 'KARYAWAN', 5, 1),
(120, 9, '2021-08-13 06:45:14', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4896160.', 'KARYAWAN', 6, 1),
(121, 9, '2021-08-13 06:45:14', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 11599351.666667.', 'KARYAWAN', 7, 1),
(122, 9, '2021-08-13 06:45:15', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210811AFCVILR7BY dan dibayarkan dengan nominal 696666.66666667 berhasil disimpan.', 'KARYAWAN', 8, 1),
(123, 9, '2021-08-13 06:45:15', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4320253.3333333.', 'KARYAWAN', 8, 1),
(124, 9, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4883000.', 'KARYAWAN', 9, 2),
(125, 9, '2021-08-13 07:15:17', 'Pengajuan kas advance diubah status!', 'Pengajuan kas advance anda dengan nominal 700000.00 telah diubah oleh admin.', 'KARYAWAN', 8, 1),
(126, 9, '2021-08-13 07:23:56', 'Pengajuan lembur!', 'Terdapat pengajuan lembur pada tanggal 2021-08-13 atas nama Novem Iryani.', 'ADMIN', 0, 2),
(127, 9, '2021-09-11 07:43:43', 'Pengajuan lembur diubah status!', 'Pengajuan lembur anda pada tanggal 2021-08-13 telah diubah oleh admin.', 'KARYAWAN', 9, 2),
(128, 9, '2021-08-13 07:23:56', 'Pengajuan peminjaman aset!', 'Terdapat pengajuan peminjaman aset baru atas nama Novem Iryani.', 'ADMIN', 0, 2),
(129, 9, '2021-09-11 07:43:43', 'Pengajuan peminjaman aset diubah status!', 'Pengajuan peminjaman aset anda pada tanggal 2021-08-13 14:17:04 telah diubah oleh admin.', 'KARYAWAN', 9, 2),
(130, 9, '2021-08-13 07:23:56', 'Benefit berhasil ditambahkan!', 'Selamat! Anda berhasil menambahkan Asuransi BPJS', 'ADMIN', 0, 2),
(131, 9, '2021-08-13 07:23:56', 'Benefit berhasil ditambahkan!', 'Selamat! Anda berhasil menambahkan Asuransi BPJS', 'ADMIN', 0, 2),
(132, 9, '2021-09-11 07:43:43', 'Benefit berhasil ditambahkan!', 'Selamat! Pengajuan benefit Asuransi BPJS anda berhasil disimpan.', 'KARYAWAN', 9, 2),
(133, 9, '2021-08-13 07:23:56', 'Pengajuan benefit!', 'Selamat! Pengajuan benefit Asuransi BPJS atas nama Novem Iryani.', 'ADMIN', 0, 2),
(134, 2, '2021-08-27 07:22:33', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 6614280.', 'KARYAWAN', 2, 2),
(135, 2, '2021-09-04 06:31:39', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4970000.', 'KARYAWAN', 3, 2),
(136, 2, '2021-08-24 14:01:26', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 3770000.', 'KARYAWAN', 5, 1),
(137, 2, '2021-08-24 14:01:26', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4896160.', 'KARYAWAN', 6, 1),
(138, 2, '2021-08-24 14:01:26', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 11599351.666667.', 'KARYAWAN', 7, 1),
(139, 2, '2021-08-24 14:01:26', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210811AFCVILR7BY dan dibayarkan dengan nominal 696666.66666667 berhasil disimpan.', 'KARYAWAN', 8, 1),
(140, 2, '2021-08-24 14:01:26', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4320253.3333333.', 'KARYAWAN', 8, 1),
(141, 2, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal 4883000.', 'KARYAWAN', 9, 2),
(142, 2, '2021-09-01 08:36:27', 'Pembuatan akun berhasil!', 'Selamat! Akun alex berhasil ditambahkan.', 'ADMIN', 0, 2),
(143, 2, '2021-09-03 10:07:08', 'Profil pegawai telah diubah!', 'Profil pegawai dengan nama Edi Sejati telah diubah.', 'ADMIN', 0, 2),
(144, 9, '2021-09-04 06:15:37', 'Pengajuan lembur diubah status!', 'Pengajuan lembur anda pada tanggal 2021-09-08 telah diubah oleh admin.', 'KARYAWAN', 2, 2),
(145, 9, '2021-09-04 06:15:37', 'Pengajuan lembur diubah status!', 'Pengajuan lembur anda pada tanggal 2021-10-01 telah diubah oleh admin.', 'KARYAWAN', 2, 2),
(146, 10, '2021-09-04 06:15:37', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1323220.', 'KARYAWAN', 2, 2),
(147, 10, '2021-09-04 06:31:39', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 500000.', 'KARYAWAN', 3, 2),
(148, 10, '2021-09-03 10:03:18', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 750000.', 'KARYAWAN', 6, 1),
(149, 10, '2021-09-03 10:03:18', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 8110791.6666667.', 'KARYAWAN', 7, 1),
(150, 10, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1301200.', 'KARYAWAN', 9, 2),
(151, 10, '2021-09-03 10:07:08', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1358750.', 'KARYAWAN', 10, 2),
(152, 10, '2021-09-04 06:15:37', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1323220.', 'KARYAWAN', 2, 2),
(153, 10, '2021-09-04 06:31:39', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 500000.', 'KARYAWAN', 3, 2),
(154, 10, '2021-09-03 10:07:56', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 750000.', 'KARYAWAN', 6, 1),
(155, 10, '2021-09-03 10:07:57', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 8110791.6666667.', 'KARYAWAN', 7, 1),
(156, 10, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1301200.', 'KARYAWAN', 9, 2),
(157, 10, '2021-09-07 08:14:07', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1358750.', 'KARYAWAN', 10, 2),
(158, 10, '2021-09-04 06:15:37', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1323220.', 'KARYAWAN', 2, 2),
(159, 10, '2021-09-04 06:31:39', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 500000.', 'KARYAWAN', 3, 2),
(160, 10, '2021-09-03 10:08:40', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 750000.', 'KARYAWAN', 6, 1),
(161, 10, '2021-09-03 10:08:40', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 8110791.6666667.', 'KARYAWAN', 7, 1),
(162, 10, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1301200.', 'KARYAWAN', 9, 2),
(163, 10, '2021-09-07 08:14:07', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1358750.', 'KARYAWAN', 10, 2),
(164, 10, '2021-09-04 06:15:37', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1323220.', 'KARYAWAN', 2, 2),
(165, 10, '2021-09-04 06:31:39', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 500000.', 'KARYAWAN', 3, 2),
(166, 10, '2021-09-03 10:08:58', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 750000.', 'KARYAWAN', 6, 1),
(167, 10, '2021-09-03 10:08:58', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 8110791.6666667.', 'KARYAWAN', 7, 1),
(168, 10, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1301200.', 'KARYAWAN', 9, 2),
(169, 10, '2021-09-07 08:14:07', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1358750.', 'KARYAWAN', 10, 2),
(170, 10, '2021-09-04 06:15:37', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1323220.', 'KARYAWAN', 2, 2),
(171, 10, '2021-09-04 06:31:39', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 500000.', 'KARYAWAN', 3, 2),
(172, 10, '2021-09-03 10:11:01', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 750000.', 'KARYAWAN', 6, 1),
(173, 10, '2021-09-03 10:11:01', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 8110791.6666667.', 'KARYAWAN', 7, 1),
(174, 10, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 10803200.', 'KARYAWAN', 9, 2),
(175, 10, '2021-09-07 08:14:07', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal 1358750.', 'KARYAWAN', 10, 2),
(176, 10, '2021-09-04 06:15:37', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 6654375.', 'KARYAWAN', 2, 2),
(177, 10, '2021-09-04 06:31:39', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 5250000.', 'KARYAWAN', 3, 2),
(178, 10, '2021-09-03 10:12:34', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 5000000.', 'KARYAWAN', 6, 1),
(179, 10, '2021-09-03 10:12:34', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 12453541.666667.', 'KARYAWAN', 7, 1),
(180, 10, '2021-09-11 07:43:43', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 15000000.', 'KARYAWAN', 9, 2),
(181, 10, '2021-09-07 08:14:07', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal 5958750.', 'KARYAWAN', 10, 2),
(182, 3, '2021-09-04 06:31:39', 'Reimburse berhasil ditambahkan!', 'Selamat! Pengajuan reimburse Rp 150.000 anda berhasil disimpan.', 'KARYAWAN', 3, 2),
(183, 3, '2021-09-04 06:30:23', 'Pengajuan reimburse!', 'Terdapat pengajuan reimburse dengan nominal Rp 150.000 atas nama boy.', 'ADMIN', 0, 2),
(184, 2, '2021-09-04 06:31:39', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal Rp 150.000 telah diubah oleh admin.', 'KARYAWAN', 3, 2),
(185, 10, '2021-09-04 12:06:30', 'Pengajuan peminjaman aset!', 'Terdapat pengajuan peminjaman aset baru atas nama Alexander.', 'ADMIN', 0, 2),
(186, 3, '2021-09-05 10:22:34', 'Profil pegawai telah diubah!', 'Profil pegawai dengan nama boy telah diubah.', 'ADMIN', 0, 2),
(187, 3, '2021-09-05 10:22:34', 'Profil pegawai telah diubah!', 'Profil pegawai dengan nama boy telah diubah.', 'ADMIN', 0, 2),
(188, 3, '2021-09-05 10:22:34', 'Profil pegawai telah diubah!', 'Profil pegawai dengan nama boy telah diubah.', 'ADMIN', 0, 2),
(189, 2, '2021-09-06 12:53:04', 'Pengajuan pinjaman!', 'Terdapat pengajuan pinjaman dengan nominal Rp 500 atas nama Edi Sejati.', 'ADMIN', 0, 2),
(190, 2, '2021-09-06 12:56:17', 'Pengajuan pinjaman!', 'Terdapat pengajuan pinjaman dengan nominal Rp 500.000 atas nama Edi Sejati.', 'ADMIN', 0, 2),
(191, 2, '2021-09-07 02:25:13', 'Profil pegawai telah diubah!', 'Profil pegawai dengan nama Edi Sejati telah diubah.', 'ADMIN', 0, 2),
(192, 2, '2021-09-07 02:25:13', 'Benefit berhasil ditambahkan!', 'Selamat! Pengajuan benefit Asuransi Sinarmas anda berhasil disimpan.', 'KARYAWAN', 2, 2),
(193, 2, '2021-09-07 02:25:13', 'Pengajuan benefit!', 'Selamat! Pengajuan benefit Asuransi Sinarmas atas nama Edi Sejati.', 'ADMIN', 0, 2),
(194, 2, '2021-09-07 08:11:58', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 579.520.', 'KARYAWAN', 2, 2),
(195, 2, '2021-09-07 07:50:45', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 500.000.', 'KARYAWAN', 3, 1),
(196, 2, '2021-09-07 07:50:45', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 750.000.', 'KARYAWAN', 6, 1),
(197, 2, '2021-09-07 07:50:45', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 8.950.000.', 'KARYAWAN', 7, 1),
(198, 2, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 10.803.200.', 'KARYAWAN', 9, 2),
(199, 2, '2021-09-07 08:14:07', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 1.400.000.', 'KARYAWAN', 10, 2),
(200, 2, '2021-09-07 08:11:58', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 579.520.', 'KARYAWAN', 2, 2),
(201, 2, '2021-09-07 07:53:30', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 500.000.', 'KARYAWAN', 3, 1),
(202, 2, '2021-09-07 07:53:30', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 750.000.', 'KARYAWAN', 6, 1),
(203, 2, '2021-09-07 07:53:30', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 8.950.000.', 'KARYAWAN', 7, 1),
(204, 2, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 10.803.200.', 'KARYAWAN', 9, 2),
(205, 2, '2021-09-07 08:14:07', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 1.400.000.', 'KARYAWAN', 10, 2),
(206, 2, '2021-09-07 08:19:35', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 2, 2),
(207, 2, '2021-09-07 08:18:04', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 3, 1),
(208, 2, '2021-09-07 08:18:04', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 6, 1),
(209, 2, '2021-09-07 08:18:04', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 7, 1),
(210, 2, '2021-09-11 07:43:43', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 9, 2),
(211, 2, '2021-09-08 05:44:20', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 10, 2),
(212, 2, '2021-09-10 05:33:44', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal Rp 6.750.000.', 'KARYAWAN', 2, 2),
(213, 2, '2021-09-07 10:44:01', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal Rp 5.250.000.', 'KARYAWAN', 3, 1),
(214, 2, '2021-09-07 10:44:01', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal Rp 5.000.000.', 'KARYAWAN', 6, 1),
(215, 2, '2021-09-07 10:44:01', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal Rp 13.250.000.', 'KARYAWAN', 7, 1),
(216, 2, '2021-09-11 07:43:43', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal Rp 15.000.000.', 'KARYAWAN', 9, 2),
(217, 2, '2021-09-08 05:44:20', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal Rp 6.000.000.', 'KARYAWAN', 10, 2),
(218, 10, '2021-09-10 05:33:44', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal Rp 10.000.000 telah diubah oleh admin.', 'KARYAWAN', 2, 2),
(219, 10, '2021-09-10 05:33:44', 'Pengajuan pinjaman!', 'Terdapat pengajuan pinjaman dengan nominal Rp 1.500.000 atas nama Alexander.', 'ADMIN', 0, 2),
(220, 10, '2021-09-08 05:55:03', 'Pengajuan pinjaman diubah status!', 'Pengajuan pinjaman anda dengan nominal Rp 1.500.000 telah diubah oleh admin.', 'KARYAWAN', 10, 1),
(221, 10, '2021-09-08 06:01:03', 'Benefit berhasil ditambahkan!', 'Selamat! Pengajuan benefit Asuransi Kesehatan Jiwa anda berhasil disimpan.', 'KARYAWAN', 10, 1),
(222, 10, '2021-09-10 05:33:44', 'Pengajuan benefit!', 'Selamat! Pengajuan benefit Asuransi Kesehatan Jiwa atas nama Alexander.', 'ADMIN', 0, 2),
(223, 10, '2021-09-08 06:05:33', 'Reimburse berhasil ditambahkan!', 'Selamat! Pengajuan reimburse Rp 100.000 anda berhasil disimpan.', 'KARYAWAN', 10, 1),
(224, 10, '2021-09-10 05:33:44', 'Pengajuan reimburse!', 'Terdapat pengajuan reimburse dengan nominal Rp 100.000 atas nama Alexander.', 'ADMIN', 0, 2),
(225, 10, '2021-09-08 06:29:09', 'Reimburse berhasil ditambahkan!', 'Selamat! Pengajuan reimburse Rp 200.000 anda berhasil disimpan.', 'KARYAWAN', 10, 1),
(226, 10, '2021-09-10 05:33:44', 'Pengajuan reimburse!', 'Terdapat pengajuan reimburse dengan nominal Rp 200.000 atas nama Alexander.', 'ADMIN', 0, 2),
(227, 10, '2021-09-08 06:40:08', 'Reimburse berhasil ditambahkan!', 'Selamat! Pengajuan reimburse Rp  anda berhasil disimpan.', 'KARYAWAN', 10, 1),
(228, 10, '2021-09-10 05:33:44', 'Pengajuan reimburse!', 'Terdapat pengajuan reimburse dengan nominal Rp  atas nama Alexander.', 'ADMIN', 0, 2),
(229, 10, '2021-09-08 06:40:11', 'Reimburse berhasil ditambahkan!', 'Selamat! Pengajuan reimburse Rp  anda berhasil disimpan.', 'KARYAWAN', 10, 1),
(230, 10, '2021-09-10 05:33:44', 'Pengajuan reimburse!', 'Terdapat pengajuan reimburse dengan nominal Rp  atas nama Alexander.', 'ADMIN', 0, 2),
(231, 10, '2021-09-08 06:40:11', 'Reimburse berhasil ditambahkan!', 'Selamat! Pengajuan reimburse Rp  anda berhasil disimpan.', 'KARYAWAN', 10, 1),
(232, 10, '2021-09-10 05:33:44', 'Pengajuan reimburse!', 'Terdapat pengajuan reimburse dengan nominal Rp  atas nama Alexander.', 'ADMIN', 0, 2),
(233, 10, '2021-09-08 06:40:12', 'Reimburse berhasil ditambahkan!', 'Selamat! Pengajuan reimburse Rp  anda berhasil disimpan.', 'KARYAWAN', 10, 1),
(234, 10, '2021-09-10 05:33:44', 'Pengajuan reimburse!', 'Terdapat pengajuan reimburse dengan nominal Rp  atas nama Alexander.', 'ADMIN', 0, 2),
(235, 10, '2021-09-08 07:05:40', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal Rp 10.000.000 telah diubah oleh admin.', 'KARYAWAN', 10, 1),
(236, 10, '2021-09-08 07:05:45', 'Reimburse diubah status!', 'Pengajuan reimburse anda dengan nominal Rp 20.000.000 telah diubah oleh admin.', 'KARYAWAN', 10, 1),
(237, 10, '2021-09-10 05:33:44', 'Pengajuan kas advance!', 'Terdapat pengajuan kas advance dengan nominal Rp 1.000.000 atas nama Alexander.', 'ADMIN', 0, 2),
(238, 10, '2021-09-10 05:33:44', 'Pengajuan kas advance!', 'Terdapat pengajuan kas advance dengan nominal Rp 1.500.000 atas nama Alexander.', 'ADMIN', 0, 2),
(239, 10, '2021-09-10 05:33:44', 'Pengajuan kas advance!', 'Terdapat pengajuan kas advance dengan nominal Rp 1.500.000 atas nama Alexander.', 'ADMIN', 0, 2),
(240, 10, '2021-09-10 05:33:44', 'Pengajuan kas advance!', 'Terdapat pengajuan kas advance dengan nominal Rp 3.500.000 atas nama Alexander.', 'ADMIN', 0, 2),
(241, 10, '2021-09-08 07:51:55', 'Pengajuan kas advance diubah status!', 'Pengajuan kas advance anda dengan nominal Rp 3.500.000 telah diubah oleh admin.', 'KARYAWAN', 10, 1),
(242, 10, '2021-09-08 07:51:59', 'Pengajuan kas advance diubah status!', 'Pengajuan kas advance anda dengan nominal Rp 1.500.000 telah diubah oleh admin.', 'KARYAWAN', 10, 1),
(243, 10, '2021-09-10 05:33:44', 'Pengajuan pinjaman!', 'Terdapat pengajuan pinjaman dengan nominal Rp  atas nama Alexander.', 'ADMIN', 0, 2),
(244, 10, '2021-09-10 05:33:44', 'Pembuatan akun berhasil!', 'Selamat! Akun wanto berhasil ditambahkan.', 'ADMIN', 0, 2),
(245, 10, '2021-09-10 05:33:44', 'Pembuatan akun berhasil!', 'Selamat! Akun wanto1 berhasil ditambahkan.', 'ADMIN', 0, 2),
(246, 10, '2021-09-11 05:11:48', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 2, 2),
(247, 10, '2021-09-10 08:21:53', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 3, 1),
(248, 10, '2021-09-10 08:21:53', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 6, 1),
(249, 10, '2021-09-10 08:21:53', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 7, 1),
(250, 10, '2021-09-11 07:43:43', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 9, 2),
(251, 10, '2021-09-10 08:21:53', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 10, 1),
(252, 10, '2021-09-10 08:21:53', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 12, 1),
(253, 10, '2021-09-11 05:11:48', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 2, 2),
(254, 10, '2021-09-10 08:25:46', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 3, 1),
(255, 10, '2021-09-10 08:25:46', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 6, 1),
(256, 10, '2021-09-10 08:25:46', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 7, 1),
(257, 10, '2021-09-11 07:43:43', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 9, 2),
(258, 10, '2021-09-10 08:25:46', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 10, 1),
(259, 10, '2021-09-10 08:25:46', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 12, 1),
(260, 10, '2021-09-11 05:11:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 579.520.', 'KARYAWAN', 2, 2),
(261, 10, '2021-09-10 08:54:09', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 500.000.', 'KARYAWAN', 3, 1),
(262, 10, '2021-09-10 08:54:09', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 750.000.', 'KARYAWAN', 6, 1),
(263, 10, '2021-09-10 08:54:09', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 8.950.000.', 'KARYAWAN', 7, 1),
(264, 10, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 10.803.200.', 'KARYAWAN', 9, 2),
(265, 10, '2021-09-10 08:54:09', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210908SA0MPDKGXW dan dibayarkan dengan nominal Rp 522.500 berhasil disimpan.', 'KARYAWAN', 10, 1),
(266, 10, '2021-09-10 08:54:09', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 927.500.', 'KARYAWAN', 10, 1),
(267, 10, '2021-09-10 08:54:09', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp -515.000.', 'KARYAWAN', 12, 1),
(268, 10, '2021-09-11 05:11:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 579.520.', 'KARYAWAN', 2, 2),
(269, 10, '2021-09-10 08:54:21', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 500.000.', 'KARYAWAN', 3, 1),
(270, 10, '2021-09-10 08:54:21', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 750.000.', 'KARYAWAN', 6, 1),
(271, 10, '2021-09-10 08:54:22', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 8.950.000.', 'KARYAWAN', 7, 1),
(272, 10, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 10.803.200.', 'KARYAWAN', 9, 2),
(273, 10, '2021-09-10 08:54:22', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210908SA0MPDKGXW dan dibayarkan dengan nominal Rp 522.500 berhasil disimpan.', 'KARYAWAN', 10, 1),
(274, 10, '2021-09-10 08:54:22', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 927.500.', 'KARYAWAN', 10, 1),
(275, 10, '2021-09-10 08:54:22', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp -515.000.', 'KARYAWAN', 12, 1),
(276, 10, '2021-09-11 05:11:48', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 2, 2),
(277, 10, '2021-09-10 09:23:07', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 3, 1),
(278, 10, '2021-09-10 09:23:07', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 6, 1),
(279, 10, '2021-09-10 09:23:07', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 7, 1),
(280, 10, '2021-09-11 07:43:43', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 9, 2),
(281, 10, '2021-09-10 09:23:08', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 10, 1),
(282, 10, '2021-09-10 09:23:08', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 12, 1),
(283, 2, '2021-09-11 05:11:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 579.520.', 'KARYAWAN', 2, 2),
(284, 2, '2021-09-10 12:06:14', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 500.000.', 'KARYAWAN', 3, 1),
(285, 2, '2021-09-10 12:06:14', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 750.000.', 'KARYAWAN', 6, 1),
(286, 2, '2021-09-10 12:06:14', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 8.950.000.', 'KARYAWAN', 7, 1),
(287, 2, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 10.803.200.', 'KARYAWAN', 9, 2),
(288, 2, '2021-09-10 12:06:14', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210908SA0MPDKGXW dan dibayarkan dengan nominal Rp 522.500 berhasil disimpan.', 'KARYAWAN', 10, 1),
(289, 2, '2021-09-10 12:06:14', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 927.500.', 'KARYAWAN', 10, 1),
(290, 2, '2021-09-10 12:06:14', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp -515.000.', 'KARYAWAN', 12, 1),
(291, 2, '2021-09-11 05:11:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 450.000.', 'KARYAWAN', 2, 2),
(292, 2, '2021-09-10 12:34:47', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp -300.000.', 'KARYAWAN', 3, 1),
(293, 2, '2021-09-10 12:34:47', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp -50.000.', 'KARYAWAN', 6, 1),
(294, 2, '2021-09-10 12:34:47', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 8.150.000.', 'KARYAWAN', 7, 1),
(295, 2, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 10.600.000.', 'KARYAWAN', 9, 2),
(296, 2, '2021-09-10 12:34:47', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210908SA0MPDKGXW dan dibayarkan dengan nominal Rp 522.500 berhasil disimpan.', 'KARYAWAN', 10, 1),
(297, 2, '2021-09-10 12:34:47', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 127.500.', 'KARYAWAN', 10, 1),
(298, 2, '2021-09-10 12:34:47', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp -1.315.000.', 'KARYAWAN', 12, 1),
(299, 2, '2021-09-11 05:11:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 650.000.', 'KARYAWAN', 2, 2),
(300, 2, '2021-09-10 12:35:16', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp -100.000.', 'KARYAWAN', 3, 1),
(301, 2, '2021-09-10 12:35:16', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 150.000.', 'KARYAWAN', 6, 1),
(302, 2, '2021-09-10 12:35:16', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 8.350.000.', 'KARYAWAN', 7, 1),
(303, 2, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 10.800.000.', 'KARYAWAN', 9, 2),
(304, 2, '2021-09-10 12:35:16', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210908SA0MPDKGXW dan dibayarkan dengan nominal Rp 522.500 berhasil disimpan.', 'KARYAWAN', 10, 1),
(305, 2, '2021-09-10 12:35:16', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 327.500.', 'KARYAWAN', 10, 1),
(306, 2, '2021-09-10 12:35:16', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp -1.115.000.', 'KARYAWAN', 12, 1),
(307, 2, '2021-09-11 05:11:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-01 telah dibayarkan dengan nominal Rp 450.000.', 'KARYAWAN', 2, 2),
(308, 2, '2021-09-10 12:44:03', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-01 telah dibayarkan dengan nominal Rp -300.000.', 'KARYAWAN', 3, 1),
(309, 2, '2021-09-10 12:44:03', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-01 telah dibayarkan dengan nominal Rp -50.000.', 'KARYAWAN', 6, 1),
(310, 2, '2021-09-10 12:44:03', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-01 telah dibayarkan dengan nominal Rp 8.150.000.', 'KARYAWAN', 7, 1),
(311, 2, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-01 telah dibayarkan dengan nominal Rp 10.600.000.', 'KARYAWAN', 9, 2),
(312, 2, '2021-09-10 12:44:03', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210908SA0MPDKGXW dan dibayarkan dengan nominal Rp 522.500 berhasil disimpan.', 'KARYAWAN', 10, 1),
(313, 2, '2021-09-10 12:44:03', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-01 telah dibayarkan dengan nominal Rp 127.500.', 'KARYAWAN', 10, 1),
(314, 2, '2021-09-10 12:44:03', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-01 telah dibayarkan dengan nominal Rp -1.315.000.', 'KARYAWAN', 12, 1),
(315, 2, '2021-09-11 05:11:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-02 telah dibayarkan dengan nominal Rp 650.000.', 'KARYAWAN', 2, 2);
INSERT INTO `notifikasi` (`id`, `id_pegawai`, `tanggal`, `judul`, `isi`, `tipe`, `untuk_pegawai`, `status`) VALUES
(316, 2, '2021-09-10 12:44:19', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-02 telah dibayarkan dengan nominal Rp -100.000.', 'KARYAWAN', 3, 1),
(317, 2, '2021-09-10 12:44:19', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-02 telah dibayarkan dengan nominal Rp 150.000.', 'KARYAWAN', 6, 1),
(318, 2, '2021-09-10 12:44:19', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-02 telah dibayarkan dengan nominal Rp 8.350.000.', 'KARYAWAN', 7, 1),
(319, 2, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-02 telah dibayarkan dengan nominal Rp 10.800.000.', 'KARYAWAN', 9, 2),
(320, 2, '2021-09-10 12:44:19', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210908SA0MPDKGXW dan dibayarkan dengan nominal Rp 522.500 berhasil disimpan.', 'KARYAWAN', 10, 1),
(321, 2, '2021-09-10 12:44:19', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-02 telah dibayarkan dengan nominal Rp 327.500.', 'KARYAWAN', 10, 1),
(322, 2, '2021-09-10 12:44:19', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-02 telah dibayarkan dengan nominal Rp -1.115.000.', 'KARYAWAN', 12, 1),
(323, 2, '2021-09-11 05:11:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-03 telah dibayarkan dengan nominal Rp 1.050.000.', 'KARYAWAN', 2, 2),
(324, 2, '2021-09-10 12:44:29', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-03 telah dibayarkan dengan nominal Rp 300.000.', 'KARYAWAN', 3, 1),
(325, 2, '2021-09-10 12:44:29', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-03 telah dibayarkan dengan nominal Rp 550.000.', 'KARYAWAN', 6, 1),
(326, 2, '2021-09-10 12:44:29', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-03 telah dibayarkan dengan nominal Rp 8.750.000.', 'KARYAWAN', 7, 1),
(327, 2, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-03 telah dibayarkan dengan nominal Rp 11.200.000.', 'KARYAWAN', 9, 2),
(328, 2, '2021-09-10 12:44:30', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210908SA0MPDKGXW dan dibayarkan dengan nominal Rp 522.500 berhasil disimpan.', 'KARYAWAN', 10, 1),
(329, 2, '2021-09-10 12:44:30', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-03 telah dibayarkan dengan nominal Rp 727.500.', 'KARYAWAN', 10, 1),
(330, 2, '2021-09-10 12:44:30', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-03 telah dibayarkan dengan nominal Rp -715.000.', 'KARYAWAN', 12, 1),
(331, 2, '2021-09-11 05:11:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-04 telah dibayarkan dengan nominal Rp 450.000.', 'KARYAWAN', 2, 2),
(332, 2, '2021-09-10 12:44:34', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-04 telah dibayarkan dengan nominal Rp -300.000.', 'KARYAWAN', 3, 1),
(333, 2, '2021-09-10 12:44:34', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-04 telah dibayarkan dengan nominal Rp -50.000.', 'KARYAWAN', 6, 1),
(334, 2, '2021-09-10 12:44:34', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-04 telah dibayarkan dengan nominal Rp 8.150.000.', 'KARYAWAN', 7, 1),
(335, 2, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-04 telah dibayarkan dengan nominal Rp 10.600.000.', 'KARYAWAN', 9, 2),
(336, 2, '2021-09-10 12:44:35', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210908SA0MPDKGXW dan dibayarkan dengan nominal Rp 522.500 berhasil disimpan.', 'KARYAWAN', 10, 1),
(337, 2, '2021-09-10 12:44:35', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-04 telah dibayarkan dengan nominal Rp 127.500.', 'KARYAWAN', 10, 1),
(338, 2, '2021-09-10 12:44:35', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-04 telah dibayarkan dengan nominal Rp -1.315.000.', 'KARYAWAN', 12, 1),
(339, 2, '2021-09-11 05:11:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal Rp 650.000.', 'KARYAWAN', 2, 2),
(340, 2, '2021-09-10 12:44:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal Rp -100.000.', 'KARYAWAN', 3, 1),
(341, 2, '2021-09-10 12:44:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal Rp 150.000.', 'KARYAWAN', 6, 1),
(342, 2, '2021-09-10 12:44:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal Rp 8.350.000.', 'KARYAWAN', 7, 1),
(343, 2, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal Rp 10.800.000.', 'KARYAWAN', 9, 2),
(344, 2, '2021-09-10 12:44:48', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210908SA0MPDKGXW dan dibayarkan dengan nominal Rp 522.500 berhasil disimpan.', 'KARYAWAN', 10, 1),
(345, 2, '2021-09-10 12:44:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal Rp 327.500.', 'KARYAWAN', 10, 1),
(346, 2, '2021-09-10 12:44:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-07 telah dibayarkan dengan nominal Rp -1.115.000.', 'KARYAWAN', 12, 1),
(347, 2, '2021-09-11 05:11:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 1.042.980.', 'KARYAWAN', 2, 2),
(348, 2, '2021-09-10 12:44:54', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp -100.000.', 'KARYAWAN', 3, 1),
(349, 2, '2021-09-10 12:44:54', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 216.160.', 'KARYAWAN', 6, 1),
(350, 2, '2021-09-10 12:44:54', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 7.563.560.', 'KARYAWAN', 7, 1),
(351, 2, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 14.705.600.', 'KARYAWAN', 9, 2),
(352, 2, '2021-09-10 12:44:54', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210908SA0MPDKGXW dan dibayarkan dengan nominal Rp 522.500 berhasil disimpan.', 'KARYAWAN', 10, 1),
(353, 2, '2021-09-10 12:44:54', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 327.500.', 'KARYAWAN', 10, 1),
(354, 2, '2021-09-10 12:44:54', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp -1.115.000.', 'KARYAWAN', 12, 1),
(355, 2, '2021-09-11 05:11:48', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 579.520.', 'KARYAWAN', 2, 2),
(356, 2, '2021-09-10 12:45:01', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 500.000.', 'KARYAWAN', 3, 1),
(357, 2, '2021-09-10 12:45:01', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 750.000.', 'KARYAWAN', 6, 1),
(358, 2, '2021-09-10 12:45:01', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 8.950.000.', 'KARYAWAN', 7, 1),
(359, 2, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 10.803.200.', 'KARYAWAN', 9, 2),
(360, 2, '2021-09-10 12:45:02', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210908SA0MPDKGXW dan dibayarkan dengan nominal Rp 522.500 berhasil disimpan.', 'KARYAWAN', 10, 1),
(361, 2, '2021-09-10 12:45:02', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 927.500.', 'KARYAWAN', 10, 1),
(362, 2, '2021-09-10 12:45:02', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -515.000.', 'KARYAWAN', 12, 1),
(363, 10, '2021-09-11 05:11:48', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal Rp 6.000.000.', 'KARYAWAN', 2, 2),
(364, 10, '2021-09-11 05:07:22', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal Rp 5.000.000.', 'KARYAWAN', 3, 1),
(365, 10, '2021-09-11 05:07:22', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal Rp 4.500.000.', 'KARYAWAN', 6, 1),
(366, 10, '2021-09-11 05:07:22', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal Rp 12.500.000.', 'KARYAWAN', 7, 1),
(367, 10, '2021-09-11 07:43:43', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal Rp 15.000.000.', 'KARYAWAN', 9, 2),
(368, 10, '2021-09-11 05:07:22', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal Rp 6.000.000.', 'KARYAWAN', 10, 1),
(369, 10, '2021-09-11 05:07:22', 'Pembayaran THR berhasil!', 'Pembayaran THR anda tahun 2021 telah dibayarkan dengan nominal Rp 4.300.000.', 'KARYAWAN', 12, 1),
(370, 10, '2021-09-12 09:55:02', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 579.520.', 'KARYAWAN', 2, 2),
(371, 10, '2021-09-11 05:12:19', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -450.000.', 'KARYAWAN', 3, 1),
(372, 10, '2021-09-11 05:12:19', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 750.000.', 'KARYAWAN', 6, 1),
(373, 10, '2021-09-11 05:12:19', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 8.950.000.', 'KARYAWAN', 7, 1),
(374, 10, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 10.803.200.', 'KARYAWAN', 9, 2),
(375, 10, '2021-09-11 05:12:19', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210908SA0MPDKGXW dan dibayarkan dengan nominal Rp 522.500 berhasil disimpan.', 'KARYAWAN', 10, 1),
(376, 10, '2021-09-11 05:12:19', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 927.500.', 'KARYAWAN', 10, 1),
(377, 10, '2021-09-11 05:12:19', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -515.000.', 'KARYAWAN', 12, 1),
(378, 10, '2021-09-12 09:55:02', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 1.042.980.', 'KARYAWAN', 2, 2),
(379, 10, '2021-09-11 06:12:18', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp -1.050.000.', 'KARYAWAN', 3, 1),
(380, 10, '2021-09-11 06:12:18', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 216.160.', 'KARYAWAN', 6, 1),
(381, 10, '2021-09-11 06:12:18', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 7.563.560.', 'KARYAWAN', 7, 1),
(382, 10, '2021-09-11 07:43:43', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 14.705.600.', 'KARYAWAN', 9, 2),
(383, 10, '2021-09-11 06:12:19', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp 327.500.', 'KARYAWAN', 10, 1),
(384, 10, '2021-09-11 06:12:19', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-08 telah dibayarkan dengan nominal Rp -1.115.000.', 'KARYAWAN', 12, 1),
(385, 10, '2021-09-11 07:43:43', 'Pengajuan ijin!', 'Terdapat pengajuan ijin pada tanggal 2021-09-11 atas nama Alexander.', 'ADMIN', 0, 2),
(386, 10, '2021-09-11 07:19:56', 'Pengajuan ijin diubah status!', 'Pengajuan ijin anda pada tanggal 2021-09-10 telah diubah oleh admin.', 'KARYAWAN', 10, 1),
(387, 9, '2021-09-11 07:43:43', 'Edit akun berhasil!', 'Selamat! Akun Novem Iryani berhasil diedit.', 'ADMIN', 0, 2),
(388, 9, '2021-09-12 09:55:02', 'Pengajuan file upload!', 'Terdapat pengajuan file upload dengan judul  atas nama Novem Iryani.', 'ADMIN', 0, 2),
(389, 9, '2021-09-12 09:55:02', 'Pengajuan peminjaman aset diubah status!', 'Pengajuan peminjaman aset anda pada tanggal 2021-07-25 21:32:37 telah diubah oleh admin.', 'KARYAWAN', 2, 2),
(390, 9, '2021-09-11 08:35:50', 'Pengajuan peminjaman aset diubah status!', 'Pengajuan peminjaman aset anda pada tanggal 2021-09-04 13:55:45 telah diubah oleh admin.', 'KARYAWAN', 10, 1),
(391, 9, '2021-09-11 08:35:57', 'Pengajuan peminjaman aset diubah status!', 'Pengajuan peminjaman aset anda pada tanggal 2021-07-25 23:07:20 telah diubah oleh admin.', 'KARYAWAN', 3, 1),
(392, 9, '2021-09-11 08:36:02', 'Pengajuan peminjaman aset diubah status!', 'Pengajuan peminjaman aset anda pada tanggal 2021-08-01 13:57:09 telah diubah oleh admin.', 'KARYAWAN', 7, 1),
(393, 10, '2021-09-12 09:55:02', 'Profil pegawai telah diubah!', 'Profil pegawai dengan nama Alexander telah diubah.', 'ADMIN', 0, 2),
(394, 9, '2021-09-12 09:55:02', 'Pengajuan ijin!', 'Terdapat pengajuan ijin pada tanggal 2021-09-11 atas nama Novem Iryani.', 'ADMIN', 0, 2),
(395, 9, '2021-09-11 09:46:28', 'Pengajuan ijin diubah status!', 'Pengajuan ijin anda pada tanggal 2021-09-11 telah diubah oleh admin.', 'KARYAWAN', 9, 1),
(396, 9, '2021-09-11 10:01:03', 'Pekerjaan berhasil ditambahkan!', 'Selamat! Anda berhasil ditambahkan kepada pekerjaan dengan nomor pegawai PEG2021010 berhasil ditambahkan.', 'KARYAWAN', 3, 1),
(397, 9, '2021-09-12 08:13:48', 'Reimburse berhasil ditambahkan!', 'Selamat! Pengajuan reimburse Rp 497.000 anda berhasil disimpan.', 'KARYAWAN', 9, 1),
(398, 9, '2021-09-12 09:55:02', 'Pengajuan reimburse!', 'Terdapat pengajuan reimburse dengan nominal Rp 497.000 atas nama Novem Iryani.', 'ADMIN', 0, 2),
(399, 9, '2021-09-12 09:55:02', 'Pengajuan pinjaman!', 'Terdapat pengajuan pinjaman dengan nominal Rp 1.000.000 atas nama Novem Iryani.', 'ADMIN', 0, 2),
(400, 9, '2021-09-12 08:42:44', 'Pengajuan pinjaman diubah status!', 'Pengajuan pinjaman anda dengan nominal Rp 1.000.000 telah diubah oleh admin.', 'KARYAWAN', 9, 1),
(401, 9, '2021-09-12 08:44:19', 'Pengajuan pinjaman diubah status!', 'Pengajuan pinjaman anda dengan nominal Rp 3.000.000 telah diubah oleh admin.', 'KARYAWAN', 10, 1),
(402, 2, '2021-09-12 09:55:02', 'Profil pegawai telah diubah!', 'Profil pegawai dengan nama Edi Sejati telah diubah.', 'ADMIN', 0, 2),
(403, 9, '2021-09-12 11:35:57', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 2, 1),
(404, 9, '2021-09-12 11:35:58', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 3, 1),
(405, 9, '2021-09-12 11:35:58', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 6, 1),
(406, 9, '2021-09-12 11:35:58', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 213.178.', 'KARYAWAN', 7, 1),
(407, 9, '2021-09-12 11:35:58', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 825.440.', 'KARYAWAN', 9, 1),
(408, 9, '2021-09-12 11:35:58', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 10, 1),
(409, 9, '2021-09-12 11:35:58', 'Pembayaran Pajak berhasil!', 'Pembayaran Pajak anda tahun 2021 telah dibayarkan/ditanggung dengan nominal Rp 0.', 'KARYAWAN', 12, 1),
(410, 9, '2021-09-12 11:43:13', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -7.254.800.', 'KARYAWAN', 2, 1),
(411, 9, '2021-09-12 11:43:13', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -450.000.', 'KARYAWAN', 3, 1),
(412, 9, '2021-09-12 11:43:13', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 750.000.', 'KARYAWAN', 6, 1),
(413, 9, '2021-09-12 11:43:13', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 8.950.000.', 'KARYAWAN', 7, 1),
(414, 9, '2021-09-12 11:43:13', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210912W2PCY67EVG dan dibayarkan dengan nominal Rp 348.333 berhasil disimpan.', 'KARYAWAN', 9, 1),
(415, 9, '2021-09-12 11:43:13', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 3.283.667.', 'KARYAWAN', 9, 1),
(416, 9, '2021-09-12 11:43:13', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 1.450.000.', 'KARYAWAN', 10, 1),
(417, 9, '2021-09-12 11:43:14', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -515.000.', 'KARYAWAN', 12, 1),
(418, 9, '2021-09-12 11:44:11', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -7.254.800.', 'KARYAWAN', 2, 1),
(419, 9, '2021-09-12 11:44:11', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -450.000.', 'KARYAWAN', 3, 1),
(420, 9, '2021-09-12 11:44:12', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 750.000.', 'KARYAWAN', 6, 1),
(421, 9, '2021-09-12 11:44:12', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 8.950.000.', 'KARYAWAN', 7, 1),
(422, 9, '2021-09-12 11:44:12', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210912W2PCY67EVG dan dibayarkan dengan nominal Rp 348.333 berhasil disimpan.', 'KARYAWAN', 9, 1),
(423, 9, '2021-09-12 11:44:12', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 3.107.967.', 'KARYAWAN', 9, 1),
(424, 9, '2021-09-12 11:44:12', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 1.450.000.', 'KARYAWAN', 10, 1),
(425, 9, '2021-09-12 11:44:12', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -515.000.', 'KARYAWAN', 12, 1),
(426, 9, '2021-09-12 11:49:42', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 1.450.000.', 'KARYAWAN', 2, 1),
(427, 9, '2021-09-12 11:49:42', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -450.000.', 'KARYAWAN', 3, 1),
(428, 9, '2021-09-12 11:49:42', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 750.000.', 'KARYAWAN', 6, 1),
(429, 9, '2021-09-12 11:49:42', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 8.950.000.', 'KARYAWAN', 7, 1),
(430, 9, '2021-09-12 11:49:42', 'Pembayaran peminjaman berhasil ditambahkan!', 'Pembayaran pinjaman dengan nomor transaksi 210912W2PCY67EVG dan dibayarkan dengan nominal Rp 348.333 berhasil disimpan.', 'KARYAWAN', 9, 1),
(431, 9, '2021-09-12 11:49:42', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 10.901.667.', 'KARYAWAN', 9, 1),
(432, 9, '2021-09-12 11:49:42', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 1.450.000.', 'KARYAWAN', 10, 1),
(433, 9, '2021-09-12 11:49:42', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -515.000.', 'KARYAWAN', 12, 1),
(434, 9, '2021-09-12 11:57:08', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -2.902.400.', 'KARYAWAN', 2, 1),
(435, 9, '2021-09-12 11:57:08', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -450.000.', 'KARYAWAN', 3, 1),
(436, 9, '2021-09-12 11:57:08', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 750.000.', 'KARYAWAN', 6, 1),
(437, 9, '2021-09-12 11:57:08', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 8.950.000.', 'KARYAWAN', 7, 1),
(438, 9, '2021-09-12 11:57:08', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 7.353.150.', 'KARYAWAN', 9, 1),
(439, 9, '2021-09-12 11:57:08', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp 1.450.000.', 'KARYAWAN', 10, 1),
(440, 9, '2021-09-12 11:57:08', 'Pembayaran gaji berhasil!', 'Pembayaran gaji anda bulan 2021-09 telah dibayarkan dengan nominal Rp -515.000.', 'KARYAWAN', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`id`, `nama`, `status`) VALUES
(1, 'BOD', 1),
(2, 'HRD & GA', 1),
(3, 'Finance', 1),
(4, 'IT Division', 1),
(5, 'Production', 1),
(6, 'Education', 1),
(7, 'Recycle', 1),
(8, 'Music', 0),
(9, 'Teknisi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `hak_akses` varchar(25) NOT NULL,
  `nama_lengkap` varchar(500) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(1) NOT NULL,
  `status_kawin` varchar(20) NOT NULL,
  `golongan_darah` varchar(2) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `tipe_id` varchar(25) NOT NULL,
  `no_id` varchar(50) NOT NULL,
  `kode_pos` varchar(15) NOT NULL,
  `alamat_id` varchar(5000) NOT NULL,
  `alamat_domisili` varchar(5000) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `foto_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `uname`, `pass`, `hak_akses`, `nama_lengkap`, `hp`, `email`, `phone`, `tempat_lahir`, `tanggal_lahir`, `jk`, `status_kawin`, `golongan_darah`, `agama`, `tipe_id`, `no_id`, `kode_pos`, `alamat_id`, `alamat_domisili`, `aktif`, `status`, `foto_profil`) VALUES
(2, 'edi', '$2y$10$NubFZpQ7kN9yFmVGNnD1YeYFbi5Pk344sJrwqxfgP8QwD7BHYfP2W', 'ADMIN', 'Edi Sejati', '081321309000', 'boywilliamxyz@gmail.com', '031123123', 'Malang', '1990-12-12', 'L', 'BELUM MENIKAH', 'A', 'ISLAM', 'KTP', '123213123123131', '13123', 'Alamat asal', 'Alamat domisili', 1, 1, 'UWOTCQ14A80ZZINU7JB5.jpg'),
(3, 'boy', '$2y$10$4pZZl9CJMG01pLkCM18OTOyGb8a4nTdl67i7I/lyItTJ1L8sKXgKS', 'KARYAWAN', 'boy', '089510048880', 'boywicak1@gmail.com', '089510048880', 'Surabaya', '1998-03-21', 'L', 'BELUM MENIKAH', 'B+', 'ISLAM', 'KTP', '12345678', '61088', 'Donowati', 'Donowati', 1, 1, 'BVIC4U8NPYVBTFYPL6ZW.jpg'),
(4, 'condro', '$2y$10$/rOD7h6phzCiK99kT6885Ojt2WSsLeYtnl6lsXLlNIl8U5Ffy4oFy', 'KARYAWAN', 'Condro Prawira B. W.', '0853123123', 'pcmpaapp1@gmail.com', '', 'Malang', '1999-03-01', 'L', 'BELUM MENIKAH', 'A', 'BUDHA', 'KTP', '215319272727', '61088', 'Jl. Bungur Asih no.2', 'Jl, Bungur Asih no. 2', 0, 0, ''),
(5, 'condrobw', '$2y$10$VA/bRLeDtUVkdgN5tFlDgOId8pef9LAKoXHua.svLYKuMKlWN0Mru', 'KARYAWAN', 'Condro Prawira B. W.', '0853123123', 'pcmpaapp2@gmail.com', '', 'Malang', '1999-03-01', 'L', 'BELUM MENIKAH', 'A', 'BUDHA', 'KTP', '215319272727', '61088', 'Jl. Bungur Asih no.2', 'Jl, Bungur Asih no. 2', 1, 0, ''),
(6, 'budi', '$2y$10$YwGZKRSwVO1rl1NGPMLssuq9X/zcT5FRveRB21vp4iFcf5GY9cR2O', 'ADMIN', 'Budi Setio', '08951004888', 'windotwindy6@gmail.com', '0317342424', 'surabaya', '2021-07-24', 'L', 'BELUM MENIKAH', 'A+', 'KATOLIK', 'KTP', '543100290001', '61233', 'Jl. Selat Sunda no. 8', 'Jl. Selat Sunda no. 8', 0, 1, ''),
(7, 'rizky', '$2y$10$yE9Klg0IWqqo/qXbsLNx..YBkfvR/LaGsS6cG0jZ/ipwyWlm6j.r6', 'ADMIN', 'Rizky Yulius Kristantow', '08572100215', 'info@sistempayroll.xyz', '031753123', 'surabaya', '1997-03-05', 'L', 'BELUM MENIKAH', 'B', 'KRISTEN', 'KTP', '789010230004', '61334', 'Jl. Jetis no. 8', 'Jl. Jetis no. 8', 1, 1, ''),
(8, 'hendra', '$2y$10$NsBeS5QmoBmVnYMTXjZDNOybjkfB2Cq1Sb.0.BHL0gn747FuLlkjG', 'ADMIN', 'Hendra Wijaya', '08123867421', 'yuliusrizky96@gmail.com', '03175689', 'Malang', '1997-02-12', 'L', 'BELUM MENIKAH', 'B+', 'ISLAM', 'KTP', '1234567890', '61334', 'Jl. Donowati No. 10', 'Jl. Dowati No. 10', 0, 0, 'GSMPK53BNGYTTFBO42ZZ.png'),
(9, 'novem', '$2y$10$TXLOc8g6TYEzRxVAe6BEN.SIctbbq0FEr2EYUKYXxjVD.HrQrsbLG', 'ADMIN', 'Novem Iryani', '08942123123', 'novemiryani@gmail.com', '031321321', 'Mojokerto', '1996-11-07', 'P', 'BELUM MENIKAH', 'A', 'ISLAM', 'KTP', '12345671', '61319', 'Jl Gedongan Gang 1 Nomer 28', 'Jl Gedongan Gang 1 Nomer 28', 1, 1, 'MTB2E5KWSU7VAGCZWKV3.jpg'),
(10, 'alex', '$2y$10$VqSvz2C/DcXXc4NvlBKbdOCNYQz.03qOEAsgQjSU4.HXAv14QbMcG', 'ADMIN', 'Alexander', '08573121280', 'toyoyoytiyoyoyo@gmail.com', '-', 'Surabaya', '1995-04-12', 'L', 'BELUM MENIKAH', 'A', 'ISLAM', 'KTP', '21312341928487', '61088', 'Jl. Banyu Urip No. 34', 'Jl. Banyu Urip No. 34', 0, 1, 'ZDUS2TUGFK0MSLIK8TEQ.png'),
(11, 'wanto', '$2y$10$36qtavFDXNAodHMhYFI7kePnvsjtLjr2vg5oRmlFxrLA2JEyfEVzm', 'KARYAWAN', 'Wanto Wantono', '123', 'dimatuy36@gmail.com', '123', 'Bandung', '1996-01-04', 'L', 'BELUM MENIKAH', 'A', 'ISLAM', 'KTP', '12345678789', '61123', 'Jl. Wakanda no. 45', 'Jl. Wakanda no. 45', 0, 0, ''),
(12, 'wanto1', '$2y$10$QV/Aj0xo8nI38/NuaulfLuOosGc/muFgzhldtyTk4Zf23s.l97Hsu', 'KARYAWAN', 'Wanto Wantono', '123', 'dimatuy36@gmail.com', '123', 'Bandung', '1996-01-04', 'L', 'BELUM MENIKAH', 'A', 'ISLAM', 'KTP', '12345678789', '61123', 'Jl. Wakanda no. 45', 'Jl. Wakanda no. 45', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_absensi`
--

CREATE TABLE `pegawai_absensi` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` timestamp NULL DEFAULT NULL,
  `keterangan_masuk` varchar(500) NOT NULL,
  `jam_pulang` timestamp NULL DEFAULT NULL,
  `keterangan_pulang` varchar(500) NOT NULL,
  `istirahat_keluar` timestamp NULL DEFAULT NULL,
  `keterangan_istirahat_keluar` varchar(500) NOT NULL,
  `istirahat_masuk` timestamp NULL DEFAULT NULL,
  `keterangan_istirahat_masuk` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_absensi`
--

INSERT INTO `pegawai_absensi` (`id`, `id_pegawai`, `tanggal`, `jam_masuk`, `keterangan_masuk`, `jam_pulang`, `keterangan_pulang`, `istirahat_keluar`, `keterangan_istirahat_keluar`, `istirahat_masuk`, `keterangan_istirahat_masuk`, `status`) VALUES
(2, 2, '2021-07-19', '2021-07-19 02:54:06', '', '2021-07-19 10:06:04', '', NULL, '', NULL, '', 1),
(3, 2, '2021-07-20', '2021-07-20 02:06:26', 'Masuk', '2021-07-20 02:07:15', 'Pulang', '2021-07-20 02:06:33', 'Jos', '2021-07-20 02:07:05', 'Nothing', 1),
(4, 6, '2021-07-24', '2021-07-24 07:12:22', '', '2021-07-24 07:13:23', '', '2021-07-24 07:13:03', '', '2021-07-24 07:13:16', '', 1),
(5, 7, '2021-07-24', '2021-07-24 08:04:13', '', '2021-07-24 08:04:58', '', '2021-07-24 08:04:28', '', '2021-07-24 08:04:42', '', 1),
(6, 2, '2021-08-06', '2021-08-06 14:24:36', '', NULL, '', NULL, '', NULL, '', 1),
(7, 9, '2021-08-13', '2021-08-13 06:09:00', '', '2021-08-13 06:09:13', '', '2021-08-13 06:09:05', '', '2021-08-13 06:09:09', '', 1),
(8, 0, '0000-00-00', '0000-00-00 00:00:00', 'keterangan_masuk', '0000-00-00 00:00:00', 'keterangan_pulang', '0000-00-00 00:00:00', 'keterangan_istirahat_keluar', '0000-00-00 00:00:00', 'keterangan_istirahat_masuk', 0),
(9, 9, '2021-07-01', '2021-07-01 01:32:59', 'Masuk', '2021-07-01 10:02:59', 'Pulang', '2021-07-01 05:02:59', 'Jos', '2021-07-01 06:02:59', 'Nothing', 1),
(10, 9, '2021-07-02', '2021-07-02 01:32:59', 'Masuk', '2021-07-02 10:02:59', 'Pulang', '2021-07-02 05:02:59', 'Jos', '2021-07-02 06:02:59', 'Nothing', 1),
(11, 9, '2021-07-03', '2021-07-03 01:32:59', 'Masuk', '2021-07-03 10:02:59', 'Pulang', '2021-07-03 05:02:59', 'Jos', '2021-07-03 06:02:59', 'Nothing', 1),
(12, 9, '2021-07-04', '2021-07-04 01:32:59', 'Masuk', '2021-07-04 10:02:59', 'Pulang', '2021-07-04 05:02:59', 'Jos', '2021-07-04 06:02:59', 'Nothing', 1),
(13, 9, '2021-07-05', '2021-07-05 01:32:59', 'Masuk', '2021-07-05 10:02:59', 'Pulang', '2021-07-05 05:02:59', 'Jos', '2021-07-05 06:02:59', 'Nothing', 1),
(14, 9, '2021-07-06', '2021-07-06 01:32:59', 'Masuk', '2021-07-06 10:02:59', 'Pulang', '2021-07-06 05:02:59', 'Jos', '2021-07-06 06:02:59', 'Nothing', 1),
(15, 9, '2021-07-07', '2021-07-07 01:32:59', 'Masuk', '2021-07-07 10:02:59', 'Pulang', '2021-07-07 05:02:59', 'Jos', '2021-07-07 06:02:59', 'Nothing', 1),
(16, 9, '2021-07-08', '2021-07-08 01:32:59', 'Masuk', '2021-07-08 10:02:59', 'Pulang', '2021-07-08 05:02:59', 'Jos', '2021-07-08 06:02:59', 'Nothing', 1),
(17, 9, '2021-07-09', '2021-07-09 01:32:59', 'Masuk', '2021-07-09 10:02:59', 'Pulang', '2021-07-09 05:02:59', 'Jos', '2021-07-09 06:02:59', 'Nothing', 1),
(18, 9, '2021-07-10', '2021-07-10 01:32:59', 'Masuk', '2021-07-10 10:02:59', 'Pulang', '2021-07-10 05:02:59', 'Jos', '2021-07-10 06:02:59', 'Nothing', 1),
(19, 9, '2021-07-11', '2021-07-11 01:32:59', 'Masuk', '2021-07-11 10:02:59', 'Pulang', '2021-07-11 05:02:59', 'Jos', '2021-07-11 06:02:59', 'Nothing', 1),
(20, 9, '2021-07-12', '2021-07-12 01:32:59', 'Masuk', '2021-07-12 10:02:59', 'Pulang', '2021-07-12 05:02:59', 'Jos', '2021-07-12 06:02:59', 'Nothing', 1),
(21, 9, '2021-07-13', '2021-07-13 01:32:59', 'Masuk', '2021-07-13 10:02:59', 'Pulang', '2021-07-13 05:02:59', 'Jos', '2021-07-13 06:02:59', 'Nothing', 1),
(22, 9, '2021-07-14', '2021-07-14 01:32:59', 'Masuk', '2021-07-14 10:02:59', 'Pulang', '2021-07-14 05:02:59', 'Jos', '2021-07-14 06:02:59', 'Nothing', 1),
(23, 9, '2021-07-15', '2021-07-15 01:32:59', 'Masuk', '2021-07-15 10:02:59', 'Pulang', '2021-07-15 05:02:59', 'Jos', '2021-07-15 06:02:59', 'Nothing', 1),
(24, 9, '2021-07-16', '2021-07-16 01:32:59', 'Masuk', '2021-07-16 10:02:59', 'Pulang', '2021-07-16 05:02:59', 'Jos', '2021-07-16 06:02:59', 'Nothing', 1),
(25, 9, '2021-07-17', '2021-07-17 01:32:59', 'Masuk', '2021-07-17 10:02:59', 'Pulang', '2021-07-17 05:02:59', 'Jos', '2021-07-17 06:02:59', 'Nothing', 1),
(26, 9, '2021-07-18', '2021-07-18 01:32:59', 'Masuk', '2021-07-18 10:02:59', 'Pulang', '2021-07-18 05:02:59', 'Jos', '2021-07-18 06:02:59', 'Nothing', 1),
(27, 9, '2021-07-19', '2021-07-19 01:32:59', 'Masuk', '2021-07-19 10:02:59', 'Pulang', '2021-07-19 05:02:59', 'Jos', '2021-07-19 06:02:59', 'Nothing', 1),
(28, 9, '2021-07-20', '2021-07-20 01:32:59', 'Masuk', '2021-07-20 10:02:59', 'Pulang', '2021-07-20 05:02:59', 'Jos', '2021-07-20 06:02:59', 'Nothing', 1),
(29, 9, '2021-07-21', '2021-07-21 01:32:59', 'Masuk', '2021-07-21 10:02:59', 'Pulang', '2021-07-21 05:02:59', 'Jos', '2021-07-21 06:02:59', 'Nothing', 1),
(30, 9, '2021-07-22', '2021-07-22 01:32:59', 'Masuk', '2021-07-22 10:02:59', 'Pulang', '2021-07-22 05:02:59', 'Jos', '2021-07-22 06:02:59', 'Nothing', 1),
(31, 9, '2021-07-23', '2021-07-23 01:32:59', 'Masuk', '2021-07-23 10:02:59', 'Pulang', '2021-07-23 05:02:59', 'Jos', '2021-07-23 06:02:59', 'Nothing', 1),
(32, 9, '2021-07-24', '2021-07-24 01:32:59', 'Masuk', '2021-07-24 10:02:59', 'Pulang', '2021-07-24 05:02:59', 'Jos', '2021-07-24 06:02:59', 'Nothing', 1),
(33, 9, '2021-07-25', '2021-07-25 01:32:59', 'Masuk', '2021-07-25 10:02:59', 'Pulang', '2021-07-25 05:02:59', 'Jos', '2021-07-25 06:02:59', 'Nothing', 1),
(34, 9, '2021-07-26', '2021-07-26 01:32:59', 'Masuk', '2021-07-26 10:02:59', 'Pulang', '2021-07-26 05:02:59', 'Jos', '2021-07-26 06:02:59', 'Nothing', 1),
(35, 8, '2021-07-01', '2021-07-01 02:32:59', 'Masuk', '2021-07-01 10:02:59', 'Pulang', '2021-07-01 05:05:59', 'Jos', '2021-07-01 06:22:59', 'Nothing', 1),
(36, 8, '2021-07-02', '2021-07-02 02:32:59', 'Masuk', '2021-07-02 09:02:59', 'Pulang', '2021-07-02 04:05:59', 'Jos', '2021-07-02 06:22:59', 'Nothing', 1),
(37, 8, '2021-07-03', '2021-07-03 02:32:59', 'Masuk', '2021-07-03 09:02:59', 'Pulang', '2021-07-03 05:05:59', 'Jos', '2021-07-03 06:22:59', 'Nothing', 1),
(38, 8, '2021-07-04', '2021-07-04 02:32:59', 'Masuk', '2021-07-04 09:02:59', 'Pulang', '2021-07-04 04:05:59', 'Jos', '2021-07-04 06:22:59', 'Nothing', 1),
(39, 8, '2021-07-05', '2021-07-05 02:32:59', 'Masuk', '2021-07-05 09:05:59', 'Pulang', '2021-07-05 05:05:59', 'Jos', '2021-07-05 06:22:59', 'Nothing', 1),
(40, 8, '2021-07-06', '2021-07-06 02:32:59', 'Masuk', '2021-07-06 09:05:59', 'Pulang', '2021-07-06 04:05:59', 'Jos', '2021-07-06 06:22:59', 'Nothing', 1),
(41, 8, '2021-07-07', '2021-07-07 02:32:59', 'Masuk', '2021-07-07 09:05:59', 'Pulang', '2021-07-07 05:05:59', 'Jos', '2021-07-07 06:22:59', 'Nothing', 1),
(42, 8, '2021-07-08', '2021-07-08 02:32:59', 'Masuk', '2021-07-08 09:05:59', 'Pulang', '2021-07-08 04:05:59', 'Jos', '2021-07-08 06:22:59', 'Nothing', 1),
(43, 8, '2021-07-09', '2021-07-09 02:32:59', 'Masuk', '2021-07-09 09:05:59', 'Pulang', '2021-07-09 05:05:59', 'Jos', '2021-07-09 06:22:59', 'Nothing', 1),
(44, 8, '2021-07-10', '2021-07-10 02:32:59', 'Masuk', '2021-07-10 09:05:59', 'Pulang', '2021-07-10 04:05:59', 'Jos', '2021-07-10 06:22:59', 'Nothing', 1),
(45, 8, '2021-07-11', '2021-07-11 02:32:59', 'Masuk', '2021-07-11 09:05:59', 'Pulang', '2021-07-11 05:05:59', 'Jos', '2021-07-11 06:22:59', 'Nothing', 1),
(46, 8, '2021-07-12', '2021-07-12 02:32:59', 'Masuk', '2021-07-12 09:05:59', 'Pulang', '2021-07-12 04:05:59', 'Jos', '2021-07-12 06:22:59', 'Nothing', 1),
(47, 8, '2021-07-13', '2021-07-13 02:32:59', 'Masuk', '2021-07-13 09:05:59', 'Pulang', '2021-07-13 05:05:59', 'Jos', '2021-07-13 06:22:59', 'Nothing', 1),
(48, 8, '2021-07-14', '2021-07-14 02:32:59', 'Masuk', '2021-07-14 09:05:59', 'Pulang', '2021-07-14 04:05:59', 'Jos', '2021-07-14 06:22:59', 'Nothing', 1),
(49, 8, '2021-07-15', '2021-07-15 02:32:59', 'Masuk', '2021-07-15 09:05:59', 'Pulang', '2021-07-15 05:05:59', 'Jos', '2021-07-15 06:22:59', 'Nothing', 1),
(50, 8, '2021-07-16', '2021-07-16 02:32:59', 'Masuk', '2021-07-16 09:05:59', 'Pulang', '2021-07-16 04:05:59', 'Jos', '2021-07-16 06:22:59', 'Nothing', 1),
(51, 8, '2021-07-17', '2021-07-17 02:32:59', 'Masuk', '2021-07-17 09:05:59', 'Pulang', '2021-07-17 05:05:59', 'Jos', '2021-07-17 06:22:59', 'Nothing', 1),
(52, 8, '2021-07-18', '2021-07-18 02:32:59', 'Masuk', '2021-07-18 09:05:59', 'Pulang', '2021-07-18 04:05:59', 'Jos', '2021-07-18 06:22:59', 'Nothing', 1),
(53, 8, '2021-07-19', '2021-07-19 02:32:59', 'Masuk', '2021-07-19 09:05:59', 'Pulang', '2021-07-19 05:05:59', 'Jos', '2021-07-19 06:22:59', 'Nothing', 1),
(54, 8, '2021-07-20', '2021-07-20 02:32:59', 'Masuk', '2021-07-20 09:05:59', 'Pulang', '2021-07-20 04:05:59', 'Jos', '2021-07-20 06:22:59', 'Nothing', 1),
(55, 8, '2021-07-21', '2021-07-21 02:32:59', 'Masuk', '2021-07-21 09:05:59', 'Pulang', '2021-07-21 05:05:59', 'Jos', '2021-07-21 06:22:59', 'Nothing', 1),
(56, 8, '2021-07-22', '2021-07-22 02:32:59', 'Masuk', '2021-07-22 09:05:59', 'Pulang', '2021-07-22 04:05:59', 'Jos', '2021-07-22 06:22:59', 'Nothing', 1),
(57, 8, '2021-07-23', '2021-07-23 02:32:59', 'Masuk', '2021-07-23 09:05:59', 'Pulang', '2021-07-23 05:05:59', 'Jos', '2021-07-23 06:22:59', 'Nothing', 1),
(58, 8, '2021-07-24', '2021-07-24 02:32:59', 'Masuk', '2021-07-24 09:05:59', 'Pulang', '2021-07-24 04:05:59', 'Jos', '2021-07-24 06:22:59', 'Nothing', 1),
(59, 8, '2021-07-25', '2021-07-25 02:32:59', 'Masuk', '2021-07-25 09:05:59', 'Pulang', '2021-07-25 05:05:59', 'Jos', '2021-07-25 06:22:59', 'Nothing', 1),
(60, 8, '2021-07-26', '2021-07-26 02:32:59', 'Masuk', '2021-07-26 09:05:59', 'Pulang', '2021-07-26 04:05:59', 'Jos', '2021-07-26 06:22:59', 'Nothing', 1),
(61, 10, '2021-09-11', '2021-09-11 05:24:57', '', '2021-09-11 06:49:07', '', '2021-09-11 06:48:46', '', '2021-09-11 06:48:56', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_aset`
--

CREATE TABLE `pegawai_aset` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `tanggal_pinjam` timestamp NOT NULL DEFAULT current_timestamp(),
  `tanggal_kembali` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_aset`
--

INSERT INTO `pegawai_aset` (`id`, `id_pegawai`, `id_aset`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
(1, 2, 1, '2021-07-25 14:32:37', '2021-07-25 16:05:35', 3),
(2, 2, 2, '2021-07-25 14:18:40', '2021-09-11 08:34:00', 3),
(3, 2, 1, '2021-07-25 14:32:42', NULL, 0),
(4, 3, 1, '2021-07-25 16:07:20', '2021-09-11 08:34:10', 3),
(5, 7, 1, '2021-08-01 06:57:09', '2021-09-11 08:34:14', 3),
(6, 9, 1, '2021-08-13 07:17:04', '2021-09-11 08:34:24', 3),
(7, 10, 1, '2021-09-04 06:55:45', '2021-09-11 08:35:39', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_benefit`
--

CREATE TABLE `pegawai_benefit` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_benefit` int(11) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `bukti` varchar(255) NOT NULL,
  `keterangan` varchar(5000) NOT NULL,
  `nominal` decimal(20,2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai_benefit`
--

INSERT INTO `pegawai_benefit` (`id`, `id_pegawai`, `id_benefit`, `tanggal_request`, `bukti`, `keterangan`, `nominal`, `status`) VALUES
(1, 2, 2, '2021-08-03 06:03:30', 'DKZVKOTZY87BGEWAXUL3.png', 'Keterangan', 1500000.00, 3),
(2, 2, 5, '2021-08-03 06:32:09', 'S4M6RP9XJBTNRLC0DXQ2.jfif', 'Butuh bangat', 500000.00, 1),
(3, 3, 2, '2021-08-06 13:38:29', '', 'UNtuk beriobat', 500000.00, 3),
(4, 2, 2, '2021-08-10 17:20:38', 'OGFI2DT9X58AORBHJEWK.jpg', 'Tidak Ada', 2000000.00, 3),
(5, 8, 5, '2021-08-10 18:00:07', 'GZ2KVGESZIYBXWCU4RMV.jpg', '-', 3000000.00, 3),
(6, 2, 5, '2021-08-13 05:57:26', 'BP7RMJEOV5QIC1AMJFYV.jfif', 'Klaim Asuransi Di Rumah Sakit Dr. Soetomo', 1500000.00, 3),
(7, 9, 8, '2021-08-13 06:08:14', 'R5DUWKBTOINH0BQXSLZA.jfif', 'Klaim Kerusakan Barang Proyektor', 5000000.00, 3),
(8, 9, 9, '2021-08-13 07:20:45', 'UJRAT5SHMBW80AEUYKCG.jpg', 'Sakit Kecelakaan', 1000000.00, 3),
(9, 2, 8, '2021-09-07 02:25:06', '', 'Untuk obat mama', 50000000.00, 1),
(10, 10, 2, '2021-09-08 06:01:03', '', '-', 3000000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_file`
--

CREATE TABLE `pegawai_file` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp(),
  `judul` varchar(255) NOT NULL,
  `keterangan` varchar(5000) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `hak_akses` varchar(25) NOT NULL COMMENT 'PERSONAL/UMUM',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_file`
--

INSERT INTO `pegawai_file` (`id`, `id_pegawai`, `tanggal_upload`, `judul`, `keterangan`, `nama_file`, `hak_akses`, `status`) VALUES
(1, 6, '2021-07-24 05:23:58', 'Entahlah Edit edit 2', 'Untuk pribadi edit edit 2', 'AMWACHJGVLPBNN359YJ7.pdf', 'UMUM', 0),
(2, 2, '2021-07-24 05:50:17', 'Km tidak bisa melihat ya', 'INi rahasia ku', '4GCDCXNRAIR2SYMNEFUB.pdf', 'PERSONAL', 0),
(3, 6, '2021-07-24 07:43:44', 'Work From Home ', 'PPKM', 'NLI8JRIWA6GM4TZDHSU5.pdf', 'UMUM', 3),
(4, 9, '2021-08-13 06:29:14', 'Informasi 17 Agustus', 'Menggunakan Baju Pahlawan', 'JIBZQIC4E1NS9L2MHTXT.pdf', 'UMUM', 3),
(5, 9, '2021-09-11 08:08:05', '', '', '', 'PERSONAL', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_ijin`
--

CREATE TABLE `pegawai_ijin` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_ijin` int(11) NOT NULL,
  `keterangan` varchar(5000) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_tambah` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bukti` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_ijin`
--

INSERT INTO `pegawai_ijin` (`id`, `id_pegawai`, `id_ijin`, `keterangan`, `tanggal`, `tanggal_tambah`, `bukti`, `status`) VALUES
(1, 2, 1, 'Nothing', '2021-07-22', '2021-07-24 07:29:27', '', 0),
(2, 2, 2, 'Males bangun', '2021-07-21', '2021-07-24 07:29:33', 'KYH7UQQL0CWM9KPDHDZM.jpg', 0),
(3, 2, 1, 'Moh tangi', '2021-07-23', '2021-07-24 07:29:39', '6SOW0FYAMZVWI4VS5GBY.jpg', 0),
(4, 2, 1, 'adasdad', '2021-07-26', '2021-07-24 07:29:45', '', 0),
(5, 2, 1, 'SAKIT SAKITAN', '2021-07-27', '2021-07-24 07:29:51', 'RY2XZKPAJNKOWFMBBLSE.jpg', 0),
(6, 2, 3, 'dadad', '2021-09-30', '2021-07-24 07:29:56', 'R67PGDTYVKB5HIEXILQ8.jpeg', 0),
(7, 2, 1, 'adasdad', '2021-08-18', '2021-07-24 07:30:02', 'QANK8OVWZIKBMD5S7EFX.png', 0),
(8, 6, 4, 'Kecelakaan Rawat Jalan', '2021-07-24', '2021-07-24 07:22:35', 'O749S2C8XWPARBWNVZ3B.jpg', 3),
(9, 6, 5, 'Kurban', '2021-07-25', '2021-07-24 07:31:09', 'R8GF5RMK1YJGVUC4MASQ.jpg', 1),
(10, 7, 1, 'Batuk Berdarah', '2021-07-25', '2021-07-24 08:07:32', 'YUQ6MVMXCHIAFTOJD9S0.jpg', 3),
(11, 10, 1, 'Kecelakaan', '2021-09-10', '2021-09-11 07:19:56', 'EYANS9QGVXV2SQYOCWXG.jfif', 3),
(12, 9, 1, '-', '2021-09-11', '2021-09-11 09:46:28', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_kas`
--

CREATE TABLE `pegawai_kas` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal_request` timestamp NULL DEFAULT current_timestamp(),
  `untuk_tanggal` date NOT NULL,
  `keterangan` varchar(5000) NOT NULL,
  `nominal_total` decimal(20,2) NOT NULL,
  `tanggal_kembali` timestamp NULL DEFAULT NULL,
  `nominal_terpakai` decimal(20,2) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_kas`
--

INSERT INTO `pegawai_kas` (`id`, `id_pegawai`, `tanggal_request`, `untuk_tanggal`, `keterangan`, `nominal_total`, `tanggal_kembali`, `nominal_terpakai`, `bukti`, `status`) VALUES
(1, 2, '2021-07-15 05:20:14', '2021-07-31', 'Untuk membeli karung bekas', 500000.00, '2021-07-15 11:39:54', 250000.00, 'YXQ2QK76S9CLLTOUIPEO.jpeg', 3),
(2, 2, '2021-07-15 05:20:14', '2021-07-31', 'Untuk servis sepeda motor', 650000.00, '2021-07-24 02:40:45', 0.00, '', 2),
(3, 2, '2021-07-15 07:26:35', '2021-07-31', 'Untuk perjalanan ke Papua Kuy', 35000000.00, '2021-07-15 10:36:43', 30000000.00, '8SM6P0BTGIYGNORJKTXJ.jpeg', 1),
(4, 2, '2021-07-16 14:33:23', '2021-07-16', 'Membeli Kulkas Kantor', 4000000.00, '2021-07-16 14:34:24', 3800000.00, 'WLBS9R6XENWQSQYDOJKJ.jpg', 1),
(5, 7, '2021-07-24 10:01:47', '2021-07-25', 'Uang Kas Kantor', 100000.00, NULL, 0.00, '', 1),
(6, 7, '2021-07-24 10:07:00', '2021-07-25', 'Pembelian TV 41 inc', 3000000.00, '2021-07-24 10:06:36', 2000000.00, 'Q4L3DFG95MS2Z78KRWDJ.jpg', 1),
(7, 3, '2021-08-04 17:01:47', '2021-08-05', 'Buat sewa mobil', 250000.00, NULL, 0.00, '', 3),
(8, 8, '2021-08-10 18:01:53', '2021-08-11', '\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nBeli Cilok', 700000.00, '2021-08-10 18:02:22', 700000.00, 'ALMOTE2J8J3YIVPFKBUD.jpg', 0),
(9, 10, '2021-09-08 07:48:41', '2021-09-09', 'untuk membeli kepentingan pribadi', 1000000.00, NULL, 0.00, '', 0),
(10, 10, '2021-09-08 07:51:16', '2021-09-08', 'Untuk Pergi Ke Hotel Shangrilla Meeting', 1500000.00, '2021-09-08 09:54:14', 1500000.00, '', 3),
(11, 10, '2021-09-08 07:51:16', '2021-09-08', 'Untuk Pergi Ke Hotel Shangrilla Meeting', 1500000.00, NULL, 0.00, '', 0),
(12, 10, '2021-09-08 07:51:46', '2021-09-08', 'Untuk Pergi Ke Singapura', 3500000.00, NULL, 0.00, '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_keluarga`
--

CREATE TABLE `pegawai_keluarga` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_lengkap` varchar(500) NOT NULL,
  `id_relasi` int(11) NOT NULL,
  `kontak_darurat` varchar(25) NOT NULL,
  `alamat` varchar(5000) NOT NULL,
  `no_id` varchar(50) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(25) NOT NULL,
  `status_kawin` varchar(20) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_keluarga`
--

INSERT INTO `pegawai_keluarga` (`id`, `id_pegawai`, `nama_lengkap`, `id_relasi`, `kontak_darurat`, `alamat`, `no_id`, `jk`, `tanggal_lahir`, `agama`, `status_kawin`, `pekerjaan`, `status`) VALUES
(1, 2, 'Suci A.', 9, '081231313123', 'Alamat', '123413101', 'P', '1990-08-31', 'ISLAM', 'MENIKAH', 'Ibu rumah tangga', 1),
(2, 8, 'Susi', 2, '08573133808080', 'Jl. Sukomanunggal no. 3', '123124123123', 'L', '1989-08-31', 'ISLAM', 'BELUM MENIKAH', 'Wirausaha', 1),
(3, 9, 'Suyono', 1, '081234561', 'Jl Gedongan Gang 1 Nomer 28', '123456789', 'L', '1987-03-04', 'ISLAM', 'MENIKAH', 'Wirausaha', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_komponen_upah`
--

CREATE TABLE `pegawai_komponen_upah` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_komponen_upah` int(11) NOT NULL,
  `nominal` decimal(20,2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_komponen_upah`
--

INSERT INTO `pegawai_komponen_upah` (`id`, `id_pegawai`, `id_komponen_upah`, `nominal`, `status`) VALUES
(1, 2, 1, 6000000.00, 1),
(2, 2, 2, 750000.00, 1),
(4, 3, 1, 3500000.00, 1),
(7, 2, 3, 250000.00, 1),
(8, 2, 4, 150000.00, 1),
(9, 6, 1, 4500000.00, 1),
(10, 6, 2, 500000.00, 1),
(11, 6, 3, 350000.00, 1),
(13, 5, 1, 3500000.00, 1),
(14, 5, 2, 400000.00, 1),
(19, 7, 1, 12500000.00, 1),
(20, 7, 2, 750000.00, 1),
(21, 7, 3, 300000.00, 1),
(22, 8, 1, 5000000.00, 1),
(23, 8, 2, 200000.00, 1),
(24, 9, 1, 15000000.00, 1),
(25, 9, 3, 1000000.00, 1),
(27, 10, 1, 6000000.00, 1),
(28, 2, 7, 1000000.00, 1),
(29, 10, 7, 300000.00, 1),
(30, 10, 2, 350000.00, 1),
(31, 12, 1, 4300000.00, 1),
(32, 12, 7, 215000.00, 1),
(33, 3, 8, 650000.00, 1),
(34, 9, 7, 350000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_overtime`
--

CREATE TABLE `pegawai_overtime` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `alasan` varchar(5000) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_overtime`
--

INSERT INTO `pegawai_overtime` (`id`, `id_pegawai`, `tanggal`, `nilai`, `alasan`, `bukti`, `status`) VALUES
(1, 2, '2021-07-19', '00:58', 'Ada lembur proyek PT.CKS ASD', 'Q6BVNQU5XYZPALFRSRFO.jpg', 0),
(2, 2, '2021-07-20', '01:10', 'Ada lemburan joks', '', 0),
(3, 2, '2021-06-01', '00:30', 'Nothing 1', '', 0),
(4, 2, '2021-06-30', '01:30', 'Lembur bikin kopi', 'URAJYOI9HARPVZMN1FF4.jpg', 0),
(5, 2, '2020-11-23', '00:55', 'Tarawa kecupt', '', 0),
(6, 3, '2021-07-22', '02:08', '', '', 1),
(7, 2, '2021-07-29', '00:30', 'asdasdasdas', 'KUOQ2HCNGBZ8RAXFCJ17.jpg', 0),
(8, 2, '2021-09-08', '02:00', 'aewaeawe', 'ZBIWKACHELYJMZNKU7FG.jpg', 0),
(9, 2, '2021-10-01', '02:15', 'asdasd', 'KCZ3HSBK5RQRNGCXUWIE.jpeg', 0),
(10, 2, '2021-11-19', '00:10', 'aeaeaweaw', 'YKERBSE7LDZG3TT0PDFA.png', 1),
(11, 2, '2021-07-01', '00:03', 'aeaeae', 'TYUKICEDAR2POJGVSKBX.jpeg', 3),
(12, 2, '2021-07-02', '00:05', 'aeaeawe', '8RF4CGHUM1WYJAKOD9LP.png', 2),
(13, 6, '2021-07-24', '03:00', 'Input Data Tambahan', 'J8IT35NLQV2YD1POTKZM.jpg', 3),
(14, 7, '2021-07-24', '04:00', 'Input Data Admin', 'AEOXW7R4VTSIYKBTFOLP.jpg', 3),
(15, 8, '2021-08-11', '04:00', 'Input Data', 'ZFHDGEW2DEAOMY5LTZMX.png', 3),
(16, 9, '2021-08-13', '03:00', 'Input Data', 'H0MLBU7SX3GREPWCJO6N.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_pekerjaan`
--

CREATE TABLE `pegawai_pekerjaan` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `no_pegawai` varchar(50) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `id_posisi_pekerjaan` int(11) NOT NULL,
  `id_posisi_level` int(11) NOT NULL,
  `status_pekerja` varchar(25) NOT NULL COMMENT 'KONTRAK,TETAP,PERCOBAAN',
  `id_cabang` int(11) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_pekerjaan`
--

INSERT INTO `pegawai_pekerjaan` (`id`, `id_pegawai`, `no_pegawai`, `id_organisasi`, `id_posisi_pekerjaan`, `id_posisi_level`, `status_pekerja`, `id_cabang`, `tanggal_mulai`, `tanggal_selesai`, `tanggal_update`, `status`) VALUES
(1, 2, 'PEG2021001', 1, 1, 1, 'TETAP', 1, '2021-07-10', '2024-01-31', '2021-07-10 15:21:09', 1),
(2, 2, 'PEG2021002', 3, 4, 3, 'PERCOBAAN', 2, '2021-07-31', '2021-07-31', '2021-07-10 16:42:56', 0),
(3, 3, 'PEG2021003', 2, 2, 3, 'TETAP', 1, '2021-07-11', '2021-08-11', '2021-07-16 04:28:25', 1),
(4, 2, 'PEG2021004', 4, 4, 4, 'TETAP', 1, '2021-07-16', '2021-07-16', '2021-07-16 14:13:57', 0),
(5, 5, 'PEG2021005', 4, 4, 4, 'TETAP', 1, '2021-07-16', '2021-07-16', '2021-07-16 14:14:32', 1),
(6, 6, 'PEG2021006', 5, 1, 1, 'KONTRAK', 1, '2021-07-01', '2022-08-31', '2021-08-02 15:26:14', 1),
(7, 7, 'PEG2021007', 1, 1, 1, 'KONTRAK', 1, '2021-08-01', '2021-09-30', '2021-08-02 15:26:37', 1),
(8, 8, 'PEG2021008', 5, 4, 4, 'TETAP', 2, '2021-08-11', '2021-08-11', '2021-08-10 17:51:05', 1),
(9, 9, 'PEG2021009', 5, 3, 4, 'TETAP', 1, '2021-08-13', '2021-08-13', '2021-08-13 06:02:27', 1),
(10, 3, 'PEG2021010', 1, 1, 4, 'KONTRAK', 1, '2021-09-11', '2021-09-11', '2021-09-11 10:01:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_pendidikan`
--

CREATE TABLE `pegawai_pendidikan` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `nama_institusi` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `nilai` decimal(10,2) NOT NULL,
  `tahun_mulai` year(4) NOT NULL,
  `tahun_selesai` year(4) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_pendidikan`
--

INSERT INTO `pegawai_pendidikan` (`id`, `id_pegawai`, `id_pendidikan`, `nama_institusi`, `jurusan`, `nilai`, `tahun_mulai`, `tahun_selesai`, `status`) VALUES
(1, 2, 2, 'SMP Bunga Asem 1 Edited', 'Sosiologi', 88.00, 2000, 2002, 1),
(2, 8, 9, 'iSTTS', 'Teknik Informatika', 3.00, 2015, 2021, 1),
(3, 9, 9, 'UPN', 'Ilmu Komunikasi', 3.00, 2015, 2019, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_pengalaman_kerja`
--

CREATE TABLE `pegawai_pengalaman_kerja` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_perusahaan` varchar(200) NOT NULL,
  `posisi` varchar(200) NOT NULL,
  `mulai` varchar(7) NOT NULL,
  `selesai` varchar(7) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_pengalaman_kerja`
--

INSERT INTO `pegawai_pengalaman_kerja` (`id`, `id_pegawai`, `nama_perusahaan`, `posisi`, `mulai`, `selesai`, `status`) VALUES
(1, 2, 'PT. Adi Jasa Surabaya Edited', 'Marketing Peti Jenazah', '2016-03', '2021-01', 1),
(2, 8, 'PT Semen Gresik', 'Kuli Bangunan', '2019-03', '2020-03', 1),
(3, 9, 'Unicharm', 'Operator Produksi', '2020-03', '2021-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_pengembalian`
--

CREATE TABLE `pegawai_pengembalian` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tgl_efektif` date NOT NULL,
  `bukti` varchar(50) NOT NULL,
  `keterangan` varchar(5000) NOT NULL,
  `nominal` decimal(20,2) NOT NULL,
  `id_pengembalian` int(11) NOT NULL,
  `id_approval` int(11) NOT NULL,
  `tgl_request` timestamp NULL DEFAULT NULL,
  `tgl_approval` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_pengembalian`
--

INSERT INTO `pegawai_pengembalian` (`id`, `id_pegawai`, `tgl_efektif`, `bukti`, `keterangan`, `nominal`, `id_pengembalian`, `id_approval`, `tgl_request`, `tgl_approval`, `status`) VALUES
(1, 2, '2021-07-31', 'UUDJTPLWAE2NNBKRGD0S.png', 'Keterangan Indah Cargo', 12500000.00, 2, 0, '2021-07-13 16:38:05', NULL, 0),
(2, 2, '2021-07-25', 'APVFFQB9RECSIHZMXYI3.png', 'Sicepat keluar kota', 2500000.00, 1, 0, '2021-07-13 16:38:54', NULL, 0),
(3, 2, '2021-07-14', 'PJLGNHUGXMVSB3MEUFJP.jpg', 'Nothing', 250000.00, 1, 0, '2021-07-14 08:14:41', NULL, 0),
(4, 2, '2021-07-14', 'SCVYZX3KI5LVKOMYXODD.jpeg', 'lkjlkjkl', 250000.00, 1, 0, '2021-07-14 13:55:09', NULL, 0),
(8, 3, '2021-07-31', 'QNO9CYE7SDIAK3MDWWFE.jpg', 'Uang jajan ku', 3000000.00, 1, 0, '2021-07-16 16:26:59', NULL, 0),
(9, 3, '2021-07-16', 'UHL75TMLHJ8DEXIK0ERI.png', 'Untuk jajan mainan', 15000000.00, 2, 0, '2021-07-16 16:47:39', NULL, 0),
(10, 3, '2021-07-31', 'QD5GL4HHNCUPTS1R2AEA.png', 'ADawewa Kuy', 4500000.00, 2, 0, '2021-07-16 16:48:07', NULL, 0),
(11, 3, '2021-07-16', 'DJVKA9FPUSWWHODP43UI.jpg', 'DAeaeae 3123123', 500000.00, 2, 0, '2021-07-16 16:48:50', NULL, 0),
(12, 2, '2021-07-24', '6WGBMDLCIY92HLZFH0AT.png', 'Butuh buat bertahan di pandemi ini.', 500000.00, 2, 0, '2021-07-24 02:57:37', NULL, 0),
(13, 7, '2021-07-25', '5KAZOCHEW4F0LF12GMRN.jpg', 'Claim Uang Transport 1 bulan', 450000.00, 1, 0, '2021-07-24 08:11:17', NULL, 0),
(14, 7, '2021-07-25', 'GJHOXK0I5RF7A83YBLTM.jpg', 'Bukti Transaksi Transportasi Surabaya Malang', 150000.00, 1, 0, '2021-07-24 09:36:29', NULL, 0),
(15, 7, '2021-07-25', '2RQYKFMWXDG7HIC4NMJ8.jpg', 'Uang transport dari surabaya ke malang', 150000.00, 1, 0, '2021-07-24 09:59:43', NULL, 0),
(16, 7, '2021-07-25', 'T6LTD0ZAGOBIXHYQVPCK.jpg', 'Uang Transport Surabaya Malang', 100000.00, 1, 0, '2021-07-24 10:04:19', NULL, 0),
(17, 3, '2021-08-04', 'Y1T67BIQPGFCASQ5TZOW.jpg', 'Buat beli sepatu', 250000.00, 1, 0, '2021-08-04 16:46:45', NULL, 0),
(18, 3, '2021-08-04', '', 'Parkir mobil bulan Juli 2021', 500000.00, 3, 0, '2021-08-04 16:50:18', NULL, 0),
(19, 8, '2021-08-11', 'AB7C1RSDPJQETQDY0E5F.jpeg', 'Uang Transport', 100000.00, 1, 0, '2021-08-10 17:52:54', NULL, 3),
(20, 2, '2021-08-15', 'EJHKWKZJXBNP12CFRYDO.jfif', 'Bukti Karcis Parkir 20x', 100000.00, 3, 0, '2021-08-13 05:47:58', NULL, 3),
(21, 2, '2021-08-13', '', 'aweawew', 100000.00, 1, 0, '2021-09-05 10:22:29', NULL, 3),
(22, 3, '2021-09-04', '', 'Untuk makan', 150000.00, 5, 0, '2021-09-04 06:30:12', NULL, 3),
(23, 10, '2021-09-08', '', '-', 100000.00, 1, 0, '2021-09-08 06:05:33', NULL, 3),
(24, 10, '2021-09-08', '', '-', 200000.00, 3, 0, '2021-09-08 06:29:09', NULL, 3),
(25, 10, '2021-09-08', '', '', 0.00, 1, 0, '2021-09-08 06:40:08', NULL, 0),
(26, 10, '2021-09-08', '', '', 0.00, 1, 0, '2021-09-08 06:40:11', NULL, 0),
(27, 10, '2021-09-08', '', '', 0.00, 1, 0, '2021-09-08 06:40:11', NULL, 0),
(28, 10, '2021-09-08', '', '', 0.00, 1, 0, '2021-09-08 06:40:12', NULL, 0),
(29, 9, '2021-09-12', '', 'a', 497000.00, 3, 0, '2021-09-12 08:13:48', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_pinjaman`
--

CREATE TABLE `pegawai_pinjaman` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(25) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nominal_total` decimal(20,2) NOT NULL,
  `tenor` int(11) NOT NULL,
  `bunga` float NOT NULL,
  `terhitung_tanggal` date NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai_pinjaman`
--

INSERT INTO `pegawai_pinjaman` (`id`, `no_transaksi`, `id_pegawai`, `nominal_total`, `tenor`, `bunga`, `terhitung_tanggal`, `keterangan`, `status`) VALUES
(1, '210715QJLFXMGZNV', 2, 2000000.00, 24, 1.5, '2021-07-15', 'Untuk nikah', 0),
(2, '2107168D4BOMZPYU', 2, 250000.00, 6, 1.5, '2021-07-16', 'Untuk beli rokok', 0),
(3, '210724BYM4AIODD5', 6, 1000000.00, 6, 1.5, '2021-07-24', 'Cicilan HP', 0),
(4, '210724J3NKPDDLIN', 6, 200000.00, 3, 1.5, '2021-07-24', 'Kebutuhan Keluarga', 0),
(5, '210724MKFYODBI8Q', 7, 220000.00, 3, 1.5, '2021-07-24', 'Untuk Keperluan Keluarga', 0),
(6, '210805BENKBFQMDJ', 3, 300000.00, 6, 1.5, '2021-08-05', 'Kebutuhan sehari-hari', 0),
(7, '210811AFCVILR7BY', 8, 2000000.00, 3, 1.5, '2021-08-11', '-', 3),
(8, '2109066H4KWOVEBI', 2, 500000.00, 3, 1.5, '2021-09-06', 'Nothing', 0),
(9, '210906FOHNLA6XDB', 2, 500000.00, 3, 1.5, '2021-09-06', 'Nothing', 1),
(10, '210908SA0MPDKGXW', 10, 1500000.00, 3, 1.5, '2021-09-08', 'membeli hp', 3),
(11, '210908GJA0AURIOK', 10, 3000000.00, 0, 1.5, '2021-09-08', '', 0),
(12, '210912W2PCY67EVG', 9, 1000000.00, 3, 1.5, '2021-09-12', '-', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_thr`
--

CREATE TABLE `pegawai_thr` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nominal` decimal(20,2) NOT NULL,
  `tanggal_thr` date NOT NULL,
  `tanggal_proses` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai_upah`
--

CREATE TABLE `pegawai_upah` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `ispkp` tinyint(1) NOT NULL,
  `tipe_ptkp` varchar(15) NOT NULL,
  `tipe_perhitungan` tinyint(1) NOT NULL,
  `tipe_waktu_gaji` tinyint(1) NOT NULL,
  `rekening_no` varchar(50) NOT NULL,
  `rekening_bank` varchar(255) NOT NULL,
  `rekening_atas_nama` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai_upah`
--

INSERT INTO `pegawai_upah` (`id`, `id_pegawai`, `ispkp`, `tipe_ptkp`, `tipe_perhitungan`, `tipe_waktu_gaji`, `rekening_no`, `rekening_bank`, `rekening_atas_nama`, `tanggal_update`, `status`) VALUES
(1, 2, 1, 'TK0', 1, 1, '1234', 'Bank BCA', 'Windot', '2021-07-27 17:03:24', 1),
(2, 7, 1, 'TK0', 1, 1, '12345678', 'BCO', 'Budi Budiman', '2021-08-01 07:17:59', 1),
(3, 6, 1, 'TK0', 2, 1, '12312', '123123', '13123123', '2021-08-02 13:37:10', 1),
(4, 3, 1, 'TK0', 2, 1, '12313123', 'aeaweaweaewae', '12313133123', '2021-08-02 13:40:33', 1),
(5, 5, 1, 'K0', 2, 1, '8881231', 'Baekawek', 'Condro B.W', '2021-08-02 15:35:13', 1),
(6, 8, 1, 'TK2', 2, 1, '254922020', 'BNI', 'Hendra Wijaya', '2021-08-10 17:30:25', 1),
(7, 9, 1, 'TK2', 3, 1, '084757271', 'BCA', 'Novem Iryani', '2021-09-01 16:01:22', 1),
(8, 10, 1, 'TK1', 1, 1, '6785959', 'BRI', 'Alexander', '2021-09-03 09:43:43', 1),
(9, 12, 1, 'TK0', 1, 1, '123456789', 'BNI', 'wanto wantono', '2021-09-08 11:05:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_pinjaman`
--

CREATE TABLE `pembayaran_pinjaman` (
  `id` int(11) NOT NULL,
  `id_pegawai_pinjaman` int(11) NOT NULL,
  `nominal` decimal(20,2) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `bukti` varchar(5000) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran_pinjaman`
--

INSERT INTO `pembayaran_pinjaman` (`id`, `id_pegawai_pinjaman`, `nominal`, `tanggal`, `bukti`, `status`) VALUES
(1, 1, 113333.33, '2021-08-02 15:39:56', 'Dipotong dari gaji bulanan.', 1),
(2, 3, 181666.67, '2021-08-02 15:39:57', 'Dipotong dari gaji bulanan.', 1),
(3, 5, 76633.33, '2021-08-02 15:39:57', 'Dipotong dari gaji bulanan.', 1),
(4, 1, 113333.33, '2021-08-10 17:53:08', 'Dipotong dari gaji bulanan.', 1),
(5, 6, 54500.00, '2021-08-10 17:53:08', 'Dipotong dari gaji bulanan.', 1),
(6, 3, 181666.67, '2021-08-10 17:53:08', 'Dipotong dari gaji bulanan.', 1),
(7, 5, 76633.33, '2021-08-10 17:53:08', 'Dipotong dari gaji bulanan.', 1),
(8, 7, 696666.67, '2021-08-13 05:53:25', 'Dipotong dari gaji bulanan.', 1),
(9, 7, 696666.67, '2021-08-13 06:18:41', 'Dipotong dari gaji bulanan.', 1),
(10, 7, 696666.67, '2021-08-13 06:27:24', 'Dipotong dari gaji bulanan.', 1),
(13, 10, 522500.00, '2021-09-10 08:54:09', 'Dipotong dari gaji bulanan.', 1),
(14, 10, 522500.00, '2021-09-10 08:54:22', 'Dipotong dari gaji bulanan.', 1),
(15, 10, 522500.00, '2021-09-10 12:06:14', 'Dipotong dari gaji bulanan.', 1),
(26, 12, 348333.33, '2021-09-12 11:43:13', 'Dipotong dari gaji bulanan.', 1),
(27, 12, 348333.33, '2021-09-12 11:44:12', 'Dipotong dari gaji bulanan.', 1),
(28, 12, 348333.33, '2021-09-12 11:49:42', 'Dipotong dari gaji bulanan.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nama`, `status`) VALUES
(1, 'SD', 1),
(2, 'SMP', 1),
(3, 'SMA', 1),
(4, 'SMK', 1),
(5, 'D1', 1),
(6, 'D2', 1),
(7, 'D3', 1),
(8, 'D4', 1),
(9, 'S1', 1),
(10, 'S2', 1),
(11, 'S3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `plafon` decimal(20,2) NOT NULL,
  `keterangan` varchar(5000) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `nama`, `plafon`, `keterangan`, `status`) VALUES
(1, 'Uang Transport', 3600000.00, 'Nothing', 1),
(2, 'Uang Jajan', 20000000.00, 'Tidak ada', 0),
(3, 'Uang Parkir', 900000.00, '-', 1),
(4, 'Uang Parkir Mobil', 1000000.00, 'tidak ada', 1),
(5, 'Uang Makan', 150000.00, 'Uang Makan harian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `logo` varchar(50) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `umr` decimal(20,2) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `ttd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`logo`, `nama`, `alamat`, `kota`, `provinsi`, `umr`, `telepon`, `hp`, `email`, `npwp`, `ttd`) VALUES
('6H15FMFRWDBGJS4PXLUK.png', 'PT. XYZ', 'Jl. Donowati no. 11-a', 'Surabaya', 'Jawa Timur', 4500000.00, '031-7452321', '08541238459', 'whywhywhy@gmail.com', '123123141213', 'OMKKWSQYNJQBPIEU6ANM.png');

-- --------------------------------------------------------

--
-- Table structure for table `poin`
--

CREATE TABLE `poin` (
  `id` int(11) NOT NULL,
  `menit` int(11) NOT NULL,
  `poin` int(11) NOT NULL,
  `potongan` decimal(20,2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poin`
--

INSERT INTO `poin` (`id`, `menit`, `poin`, `potongan`, `status`) VALUES
(1, 10, 1, 0.50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posisi_level`
--

CREATE TABLE `posisi_level` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posisi_level`
--

INSERT INTO `posisi_level` (`id`, `nama`, `status`) VALUES
(1, 'CEO', 1),
(2, 'Manajer', 1),
(3, 'Supervisor', 1),
(4, 'Staff', 1),
(5, 'OB', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posisi_pekerjaan`
--

CREATE TABLE `posisi_pekerjaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posisi_pekerjaan`
--

INSERT INTO `posisi_pekerjaan` (`id`, `nama`, `status`) VALUES
(1, 'CEO', 1),
(2, 'Manajer HR & GA', 1),
(3, 'Supervisor Accounting', 0),
(4, 'Staff IT', 1),
(5, 'Driver', 0),
(6, 'Produksi', 1),
(7, 'Accounting', 1);

-- --------------------------------------------------------

--
-- Table structure for table `relasi_keluarga`
--

CREATE TABLE `relasi_keluarga` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relasi_keluarga`
--

INSERT INTO `relasi_keluarga` (`id`, `nama`, `status`) VALUES
(1, 'Ayah', 1),
(2, 'Ibu', 1),
(3, 'Anak', 1),
(4, 'Kakek', 1),
(5, 'Nenek', 1),
(6, 'Paman', 1),
(7, 'Bibi', 1),
(8, 'Suami', 1),
(9, 'Istri', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aset_kategori`
--
ALTER TABLE `aset_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit`
--
ALTER TABLE `benefit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histori_pajak_pegawai`
--
ALTER TABLE `histori_pajak_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histori_thr_pegawai`
--
ALTER TABLE `histori_thr_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histori_upah_pegawai`
--
ALTER TABLE `histori_upah_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ijin`
--
ALTER TABLE `ijin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_kerja`
--
ALTER TABLE `jadwal_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_libur`
--
ALTER TABLE `jadwal_libur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komponen_thr`
--
ALTER TABLE `komponen_thr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komponen_upah`
--
ALTER TABLE `komponen_upah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_absensi`
--
ALTER TABLE `pegawai_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_aset`
--
ALTER TABLE `pegawai_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_benefit`
--
ALTER TABLE `pegawai_benefit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_file`
--
ALTER TABLE `pegawai_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_ijin`
--
ALTER TABLE `pegawai_ijin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_kas`
--
ALTER TABLE `pegawai_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_keluarga`
--
ALTER TABLE `pegawai_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_komponen_upah`
--
ALTER TABLE `pegawai_komponen_upah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_overtime`
--
ALTER TABLE `pegawai_overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_pekerjaan`
--
ALTER TABLE `pegawai_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_pendidikan`
--
ALTER TABLE `pegawai_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_pengalaman_kerja`
--
ALTER TABLE `pegawai_pengalaman_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_pengembalian`
--
ALTER TABLE `pegawai_pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_pinjaman`
--
ALTER TABLE `pegawai_pinjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_thr`
--
ALTER TABLE `pegawai_thr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai_upah`
--
ALTER TABLE `pegawai_upah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran_pinjaman`
--
ALTER TABLE `pembayaran_pinjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posisi_level`
--
ALTER TABLE `posisi_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posisi_pekerjaan`
--
ALTER TABLE `posisi_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relasi_keluarga`
--
ALTER TABLE `relasi_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `aset_kategori`
--
ALTER TABLE `aset_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `benefit`
--
ALTER TABLE `benefit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `histori_pajak_pegawai`
--
ALTER TABLE `histori_pajak_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `histori_thr_pegawai`
--
ALTER TABLE `histori_thr_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `histori_upah_pegawai`
--
ALTER TABLE `histori_upah_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `ijin`
--
ALTER TABLE `ijin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_kerja`
--
ALTER TABLE `jadwal_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jadwal_libur`
--
ALTER TABLE `jadwal_libur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komponen_thr`
--
ALTER TABLE `komponen_thr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komponen_upah`
--
ALTER TABLE `komponen_upah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pegawai_absensi`
--
ALTER TABLE `pegawai_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `pegawai_aset`
--
ALTER TABLE `pegawai_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pegawai_benefit`
--
ALTER TABLE `pegawai_benefit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pegawai_file`
--
ALTER TABLE `pegawai_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pegawai_ijin`
--
ALTER TABLE `pegawai_ijin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pegawai_kas`
--
ALTER TABLE `pegawai_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pegawai_keluarga`
--
ALTER TABLE `pegawai_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai_komponen_upah`
--
ALTER TABLE `pegawai_komponen_upah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pegawai_overtime`
--
ALTER TABLE `pegawai_overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pegawai_pekerjaan`
--
ALTER TABLE `pegawai_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pegawai_pendidikan`
--
ALTER TABLE `pegawai_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai_pengalaman_kerja`
--
ALTER TABLE `pegawai_pengalaman_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai_pengembalian`
--
ALTER TABLE `pegawai_pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pegawai_pinjaman`
--
ALTER TABLE `pegawai_pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pegawai_thr`
--
ALTER TABLE `pegawai_thr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai_upah`
--
ALTER TABLE `pegawai_upah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembayaran_pinjaman`
--
ALTER TABLE `pembayaran_pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `poin`
--
ALTER TABLE `poin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posisi_level`
--
ALTER TABLE `posisi_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posisi_pekerjaan`
--
ALTER TABLE `posisi_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `relasi_keluarga`
--
ALTER TABLE `relasi_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
