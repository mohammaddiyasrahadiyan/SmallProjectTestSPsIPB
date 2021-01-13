-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2021 pada 10.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kampus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `semester` int(10) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `semester`, `jurusan`) VALUES
('J3D117117', 'Faizal Jarkasih', 2, 'Teknik Komputer'),
('J3D117118', 'Mohammad Diyas Rahadiyan', 5, 'Teknik Komputer'),
('J3D117119', 'Mohammad Diyas', 2, 'Teknik Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_matakuliah` varchar(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `nama_matakuliah` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kode_matakuliah`, `semester`, `nama_matakuliah`, `jurusan`) VALUES
('MKK01', 2, 'Algoritma dan Pemrograman Dasar', 'Teknik Komputer'),
('MKK02', 1, 'Fisika', 'Teknik Komputer'),
('MKK03', 3, 'Matematika', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transkrip`
--

CREATE TABLE `transkrip` (
  `id_transkrip` int(10) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `semester` int(10) NOT NULL,
  `kode_matakuliah` varchar(10) NOT NULL,
  `mutu_matakuliah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transkrip`
--

INSERT INTO `transkrip` (`id_transkrip`, `nim`, `nama_mahasiswa`, `semester`, `kode_matakuliah`, `mutu_matakuliah`) VALUES
(1, 'J3D117118', 'Mohammad Diyas Rahadiyan', 5, 'MKK02', 'B');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_matakuliah`);

--
-- Indeks untuk tabel `transkrip`
--
ALTER TABLE `transkrip`
  ADD PRIMARY KEY (`id_transkrip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
