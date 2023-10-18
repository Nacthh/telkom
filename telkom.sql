-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2023 pada 06.23
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telkom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar`
--

CREATE TABLE `daftar` (
  `id_tamu` int(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `surat` varchar(100) NOT NULL,
  `tamu` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar`
--

INSERT INTO `daftar` (`id_tamu`, `nama`, `keperluan`, `instansi`, `surat`, `tamu`, `keterangan`, `tanggal`) VALUES
(14, 'a', 's', 'd', 'bank-bni-logo-737EE0F32C-seeklogo.com.png', 'bank-bri-logo-8DC31E9AEF-seeklogo.com.png', 'Diterima', '2023-08-03'),
(15, 'q', 'w', 'e', 'bca-bank-logo-1E89320DC2-seeklogo.com.png', 'alfamart-logo-13EE0761D0-seeklogo.com.png', 'Diterima', '2023-08-04'),
(16, 'r', 't', 'y', 'alfamart-logo-13EE0761D0-seeklogo.com.png', 'bank-bni-logo-737EE0F32C-seeklogo.com.png', 'Ditolak', '2023-08-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_admin`
--

INSERT INTO `data_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indeks untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id_tamu` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
