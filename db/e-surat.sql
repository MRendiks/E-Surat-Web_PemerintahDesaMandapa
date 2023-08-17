-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2023 pada 16.22
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `no_telp`) VALUES
(1, 'administrator', 'admin', 'admin', '08123456789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_desa`
--

CREATE TABLE `info_desa` (
  `id_info` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `judul_info` varchar(1000) NOT NULL,
  `informasi` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `info_desa`
--

INSERT INTO `info_desa` (`id_info`, `id_admin`, `judul_info`, `informasi`) VALUES
(1, 1, 'Covid-19', 'Sekarang didaerah ini ada 5000 orang terkena');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_admin`, `nama_kategori`) VALUES
(470, 1, 'Surat Keterangan Domisili'),
(473, 1, 'Surat Keterangan Kerja Diluar Daerah'),
(474, 1, 'Surat Keterangan Kelahiran'),
(475, 1, 'Surat Pengantar Keterangan Berkelakuan Baik'),
(476, 1, 'Surat Keterangan Tidak Mampu'),
(479, 1, 'Surat Keterangan Usaha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain`
--

CREATE TABLE `komplain` (
  `id_komplain` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `isi_komplain` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komplain`
--

INSERT INTO `komplain` (`id_komplain`, `id_penduduk`, `isi_komplain`) VALUES
(1, 3, 'Hai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `no_kk` int(20) NOT NULL,
  `NIK` int(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(500) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status_perkawinan` enum('Kawin','Belum Kawin') NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` varchar(255) NOT NULL,
  `pekerjaan` varchar(1000) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `nama_ayah` varchar(300) NOT NULL,
  `nama_ibu` varchar(300) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `id_admin`, `no_kk`, `NIK`, `nama`, `tempat_lahir`, `tanggal_lahir`, `status_perkawinan`, `jenis_kelamin`, `agama`, `pekerjaan`, `pendidikan`, `alamat`, `nama_ayah`, `nama_ibu`, `username`, `password`) VALUES
(3, 1, 12345, 0, 'Rendi', 'Sidoarjo', '2023-03-30', 'Kawin', 'Laki-laki', 'Islam', 'IT', 'SMK', 'Sidoarjo', 'irwanto', 'IT', '', ''),
(6, 1, 12345, 12345, 'Elsa', 'Majalengka', '2001-02-02', 'Belum Kawin', 'Perempuan', 'Islam', 'Mahasiswa', 'SMA', 'Trini', 'Fatur', 'Isna', '12345', 'Elsa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `nomor_surat` int(11) NOT NULL,
  `nama_surat` varchar(200) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` enum('Selesai','Belum Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `info_desa`
--
ALTER TABLE `info_desa`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id_komplain`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `info_desa`
--
ALTER TABLE `info_desa`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;

--
-- AUTO_INCREMENT untuk tabel `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id_komplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `info_desa`
--
ALTER TABLE `info_desa`
  ADD CONSTRAINT `info_desa_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `komplain`
--
ALTER TABLE `komplain`
  ADD CONSTRAINT `komplain_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id_penduduk`);

--
-- Ketidakleluasaan untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `penduduk_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `surat_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `surat_ibfk_3` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id_penduduk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
