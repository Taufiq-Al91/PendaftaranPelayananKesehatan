-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Mar 2023 pada 03.08
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_admin`
--

CREATE TABLE `master_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authKey` varchar(255) NOT NULL,
  `accessToken` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'admin',
  `time_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `master_admin`
--

INSERT INTO `master_admin` (`id`, `username`, `password`, `authKey`, `accessToken`, `role`, `time_create`) VALUES
(2, 'Taufiq Al Azhar', '$2y$13$d.UDJXz.MJC2pleGyeZk2eZm9lYWHjeVCOwDexxgTXsGH7rbnbjFy', 'HQYPQlN-h_MxMmLVLrAZe8YdKMeHh47V', 'HQYPQlN-h_MxMmLVLrAZe8YdKMeHh47V', 'admin', '2023-02-23 08:44:07'),
(4, 'M Fikri', '$2y$13$bVT8koxWvEjzuVJ7WNeyWuQCpCSHY7b0TjipvekDpGqzdw2avcelW', 'PNXysRBnCrP8D7dYUDRgyW3WEy94Y3OL', 'PNXysRBnCrP8D7dYUDRgyW3WEy94Y3OL', 'admin', '2023-02-23 09:08:05'),
(5, 'Taufiq Al Azhar2', '$2y$13$fns5fs1LraE7MCrpr3LFzeLhdTddDCWi7IIMbbl7sNYVhQCC/pai2', 'PKzubQTEetBSpgZTG3VQhxHi2YJXu5PJ', 'H1Dmkb2QaZbveNMkGjw9btRFw0NdF4WZ', 'admin', '2023-02-23 09:47:17'),
(6, 'Felly', '$2y$13$h2b57C/LfX5L4Qq7nhlWFeCOQZFo2onX1A8Fos1ATyMPXW.HH1GBe', 'nLsHfeaMyRdXGg7rwcSr8osXjj9RxvxJ', 'DFC4yFfMS1-oLxcb_8B-dyuZugLDkzs7', 'admin', '2023-03-01 03:48:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_layanan`
--

CREATE TABLE `master_layanan` (
  `id_layanan` int(11) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL,
  `time_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `master_layanan`
--

INSERT INTO `master_layanan` (`id_layanan`, `jenis_layanan`, `time_create`) VALUES
(1, 'Poliklinik Umum', '2023-02-22 08:24:22'),
(2, 'Poliklinik Gigi', '2023-02-22 08:24:34'),
(3, 'Poliklinik Obgyn', '2023-02-22 08:24:52'),
(4, 'UGD', '2023-02-22 08:25:17'),
(5, 'Kelas 1', '2023-02-22 08:25:31'),
(6, 'Poliklinik Mata', '2023-02-22 08:25:48'),
(7, 'Kelas 2', '2023-02-22 08:26:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_registrasi`
--

CREATE TABLE `trx_registrasi` (
  `id` int(11) NOT NULL,
  `no_registrasi` int(11) DEFAULT NULL,
  `nama_pasien` varchar(80) NOT NULL,
  `jenis_kelamin` varchar(80) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_registrasi` varchar(80) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `jenis_pembayaran` varchar(80) NOT NULL,
  `status_registrasi` varchar(80) NOT NULL,
  `waktu_mulai_pelayanan` datetime NOT NULL,
  `waktu_selesai_pelayanan` datetime NOT NULL,
  `time_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `petugas_pendaftaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trx_registrasi`
--

INSERT INTO `trx_registrasi` (`id`, `no_registrasi`, `nama_pasien`, `jenis_kelamin`, `tanggal_lahir`, `jenis_registrasi`, `id_layanan`, `jenis_pembayaran`, `status_registrasi`, `waktu_mulai_pelayanan`, `waktu_selesai_pelayanan`, `time_create`, `petugas_pendaftaran`) VALUES
(2, 1, 'Taufiq Al Azhar', 'Laki - Laki', '2023-02-07', 'Rawat Jalan', 2, 'Mandiri Inhealth', 'Tutup Kunjungan', '2023-02-23 11:25:28', '2023-02-23 11:55:35', '2023-03-01 03:45:24', 2),
(3, 2, 'M Fikri', 'Laki - Laki', '2023-06-07', 'Rawat Jalan', 4, 'BPJS Kesehatan', 'Tutup Kunjungan', '2023-01-31 05:25:54', '2023-01-31 05:25:54', '2023-02-27 04:01:23', 4),
(4, 3, 'Rasyid', 'Laki - Laki', '2023-02-01', 'UGD', 2, 'BPJS Kesehatan', 'Tutup Kunjungan', '2023-02-01 05:30:36', '2023-02-03 05:30:36', '2023-02-28 10:33:26', 4),
(5, 4, 'Taufiq Al Azhar', 'Laki - Laki', '2023-03-01', 'Rawat Jalan', 1, 'Umum', 'Tutup Kunjungan', '2023-03-01 09:20:52', '2023-03-08 13:25:52', '2023-03-12 06:21:52', 6);

--
-- Trigger `trx_registrasi`
--
DELIMITER $$
CREATE TRIGGER `tambah_no_registrasi` BEFORE INSERT ON `trx_registrasi` FOR EACH ROW BEGIN
    DECLARE last_no_registrasi INT;
    SELECT no_registrasi INTO last_no_registrasi FROM trx_registrasi ORDER BY no_registrasi DESC LIMIT 1;
    IF last_no_registrasi IS NULL THEN
        SET NEW.no_registrasi = 1;
    ELSE
        SET NEW.no_registrasi = last_no_registrasi + 1;
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `master_layanan`
--
ALTER TABLE `master_layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `trx_registrasi`
--
ALTER TABLE `trx_registrasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layanan_fk` (`id_layanan`),
  ADD KEY `petugas_fk` (`petugas_pendaftaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `master_layanan`
--
ALTER TABLE `master_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `trx_registrasi`
--
ALTER TABLE `trx_registrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `trx_registrasi`
--
ALTER TABLE `trx_registrasi`
  ADD CONSTRAINT `layanan_fk` FOREIGN KEY (`id_layanan`) REFERENCES `master_layanan` (`id_layanan`),
  ADD CONSTRAINT `petugas_fk` FOREIGN KEY (`petugas_pendaftaran`) REFERENCES `master_admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
