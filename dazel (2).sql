-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Sep 2022 pada 18.19
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dazel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` char(25) NOT NULL,
  `kode_toko` char(10) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `satuan_barang` varchar(50) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `warna` varchar(30) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_catat` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `kode_toko`, `nama_barang`, `satuan_barang`, `jenis_barang`, `keterangan`, `warna`, `stok_barang`, `harga`, `tgl_catat`) VALUES
('RD2934FA', '', 'Hp', 'kardus', 'Smartphone', 'ada', 'PUTIH, HITAM', 18, 300000, '2022-08-22'),
('RD2934FC', '', 'Handuk', 'kardus', 'Kain', 'ready', 'PUTIH', 114, 400000, '2022-08-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `idbrg_keluar` char(25) NOT NULL,
  `kode_barang` char(25) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `jumlah_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`idbrg_keluar`, `kode_barang`, `tanggal`, `jumlah_keluar`) VALUES
('KBR001', 'RD2934FA', '2022-08-22', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `idbrg_masuk` char(25) NOT NULL,
  `kode_barang` char(25) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `suplaier` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`idbrg_masuk`, `kode_barang`, `jumlah_masuk`, `tanggal`, `suplaier`) VALUES
('MSK003', 'RD2934FA', 1, '2022-08-17', 'tono'),
('MSK004', 'RD2934FA', 4, '2022-08-22', 'tono'),
('MSK005', 'RD2934FA', 1, '2022-08-22', 'budi'),
('MSK006', 'RD2934FA', 1, '2022-08-22', 'abi'),
('MSK007', 'RD2934FA', 1, '2022-08-22', 'anton'),
('MSK008', 'RD2934FA', 2, '2022-09-07', 'tono'),
('MSK009', 'RD2934FC', 3, '2022-09-07', 'SUP0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `distribusi`
--

CREATE TABLE `distribusi` (
  `kode_distribusi` char(25) NOT NULL,
  `kode_barang` char(25) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `jumlah` int(11) NOT NULL,
  `nama_toko` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `distribusi`
--

INSERT INTO `distribusi` (`kode_distribusi`, `kode_barang`, `tanggal`, `jumlah`, `nama_toko`) VALUES
('DIS004', '', '2022-08-22', 1, 'AK'),
('DIS007', '', '2022-08-22', 15, 'toto'),
('DIS008', 'RD2934FC', '2022-08-22', 1, 'Kebumne');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `kode_sup` char(10) NOT NULL,
  `nama_sup` varchar(80) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tlp` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`kode_sup`, `nama_sup`, `alamat`, `tlp`) VALUES
('SUP0001', 'Muh Ridho Ws', 'PULOSARI,JAMBON,PONOROGO', '231233');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `kode_toko` char(10) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat_toko` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`kode_toko`, `nama_toko`, `alamat_toko`) VALUES
('TOKO0001', 'Jakal', 'Jl Jakal km 3. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `nip` char(30) NOT NULL,
  `jabatan` varchar(70) NOT NULL,
  `username` varchar(90) NOT NULL,
  `password` varchar(90) NOT NULL,
  `no_tlp` char(12) NOT NULL,
  `foto` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nip`, `jabatan`, `username`, `password`, `no_tlp`, `foto`) VALUES
(1, 'BOSKUHHH', '32255', 'karyawan', 'andika', '1', '09484', 'sad.jpg'),
(2, 'MUH RIDHO WACHID S', '232424', 'admin', 'ridho', '2', '42434', 'a.jpeg'),
(4, 'MUH RIDHO WACHID SOLIKIN', '2937474', 'staf administasi', 'ada', '3', '09847', 'ridho.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
