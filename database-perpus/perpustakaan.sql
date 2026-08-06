-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2026 pada 15.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(1, 'admin', 'admin', 'Administrator Perpustakaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kelas` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nis`, `nama_anggota`, `username`, `password`, `kelas`) VALUES
(4, '1234', 'Nazada', 'Naza', '0808', 'XII RPL'),
(6, '1111', 'baim', 'baim', '8888', 'XII RPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `status` enum('tersedia','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `status`) VALUES
(1, 'Emotional Intelligent', 'Daniel Goleman', 'Gramedia.com', '1983', 'tersedia'),
(3, 'Psychology of Money', 'Morgan Housel', 'New York Times', '2016', 'tersedia'),
(4, 'Logika Keilmuan', 'Rizem Aizid', 'IRCiSoD', '2024', 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_kembali` datetime NOT NULL DEFAULT current_timestamp(),
  `status_transaksi` enum('Peminjaman','Pengembalian') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status_transaksi`) VALUES
(1, 1, 1, '2026-07-07 09:44:00', '2026-08-04 09:58:35', 'Pengembalian'),
(2, 3, 3, '2026-08-05 12:05:54', '2026-08-05 08:52:58', 'Pengembalian'),
(3, 3, 1, '2026-08-05 08:51:06', '2026-08-05 08:56:21', 'Pengembalian'),
(4, 3, 3, '2026-08-05 08:56:29', '2026-08-05 08:56:51', 'Pengembalian'),
(5, 3, 1, '2026-08-05 08:56:37', '2026-08-05 08:56:45', 'Pengembalian'),
(6, 3, 3, '2026-08-05 08:59:08', '2026-08-05 08:59:22', 'Pengembalian'),
(7, 3, 3, '2026-08-05 09:01:08', '2026-08-05 09:01:29', 'Pengembalian'),
(8, 3, 3, '2026-08-06 03:06:19', '2026-08-06 03:07:20', 'Pengembalian'),
(9, 3, 1, '2026-08-06 03:09:15', '2026-08-06 03:13:43', 'Pengembalian'),
(10, 3, 3, '2026-08-06 03:14:03', '2026-08-06 15:18:42', 'Pengembalian'),
(11, 3, 1, '2026-08-06 15:19:24', '2026-08-06 15:19:24', 'Peminjaman'),
(12, 4, 1, '2026-08-06 20:22:33', '2026-08-06 20:22:49', 'Pengembalian');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
