-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Mei 2023 pada 10.07
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apl_pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(15) NOT NULL,
  `nama_pegawai` varchar(150) NOT NULL,
  `jabatan` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_rekrut` date NOT NULL,
  `no_handphone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `data_pegawai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jabatan`, `jenis_kelamin`, `tanggal_rekrut`, `no_handphone`, `email`, `tanggal_lahir`, `data_pegawai`) VALUES
('1234', 'Azka', 'Copywritter', 'L', '2023-05-30', '(0896)-64138264', 'windasna@gmail.com', '2023-05-31', ''),
('456', 'Adam', 'Software Engineer', 'L', '2023-05-30', '(0896)-64138269', 'adamm@gmail.com', '2023-05-30', ''),
('678', 'Ibrahim', 'Finance Engineer', 'L', '2023-05-30', '(0896)-6413829', 'Ibrahim@gmail.com', '2023-05-30', ''),
('6789', 'Hud', 'Hr Manager', 'L', '2023-05-31', '(0896)-64138267', 'Hud@gmail.com', '2023-05-31', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
