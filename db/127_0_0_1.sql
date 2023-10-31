-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2023 pada 02.22
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disaster_edukasi`
--
CREATE DATABASE IF NOT EXISTS `disaster_edukasi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `disaster_edukasi`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(100) NOT NULL,
  `nama_admin` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp_admin` bigint(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username`, `password`, `no_hp_admin`, `email_admin`) VALUES
(89, 'Priyoga Rizki', 'priyog', 'priyog123', 8892823103, 'priyog.com'),
(90, 'Maulana', 'maul', 'maul123', 6856735345222222, 'maul.com'),
(91, 'Tifaniyah adifatul tamara', 'titut', 'titut123', 8892823103, 'sandi2501.ss@gmail.com'),
(95, 'Intan Khoirul nisa', 'intan', 'intan123', 8892823103, 'sandi2501.ss@gmail.com'),
(109, 'Zaskia Aliana', 'alin', 'alin123', 12412341308977777, 'alin.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(50) NOT NULL,
  `judul` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kategori` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `teks` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `view` bigint(10) NOT NULL,
  `author` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `post_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `terbit` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul`, `isi`, `kategori`, `gambar`, `teks`, `tanggal`, `view`, `author`, `post_type`, `terbit`) VALUES
(8, 'Diterjang Banjir Bandang, New York Umumkan Keadaan Darurat ', '<p>Banjir merendam sejumlah sistem kereta api bawah tanah dan jalan raya, sementara setidaknya satu terminal di Bandara LaGuardia ditutup pada hari Jumat waktu setempat. \"Terminal A di Bandara La Guardia ditutup karena banjir,\" kata pihak berwenang. Penumpang disarankan untuk memeriksa maskapai penerbangan mereka sebelum melakukan perjalanan. Ramalan cuaca menyebut curah hujan mencapai 20 cm di beberapa bagian kota, dan beberapa cm lagi diperkirakan akan terjadi pada Jumat malam. “Ini adalah badai yang berbahaya dan mengancam jiwa,” kata Gubernur Kathy Hochul. “Saya mengumumkan keadaan darurat di seluruh Kota New York, Long Island, dan Lembah Hudson karena curah hujan ekstrem yang kita lihat di seluruh wilayah,” kata Gubernur Hochul di X, yang sebelumnya dikenal sebagai Twitter, seperti dikutip dari BBC, Sabtu (30/9/2023).</p>', 'internasional', 'berita 3.webp', 'banjir', '2023-10-31 03:47:15', 0, 'TITUT', 'berita', '1'),
(10, 'Hampir 100 Orang Tewas dan Hilang di Meksiko Akibat Badai ', '<p>Jumlah orang yang tewas dan hilang akibat Badai Otis, badai Kategori 5 yang melanda kota resor Acapulco di Pasifik Meksiko pekan lalu, telah meningkat hingga mendekati 100 orang. Hal itu diungkapkan pihak berwenang di negara bagian Guerrero pada Senin (30/10/2023). Badai Otis menghantam Acapulco dengan kecepatan angin 266 km per jam pada Rabu pekan lalu, membanjiri kota, merobek atap rumah, hotel dan tempat usaha lainnya, menenggelamkan kendaraan, dan memutus komunikasi serta sambungan jalan dan udara. Penjarahan terjadi ketika populasi kota yang berjumlah hampir 900.000 jiwa semakin putus asa terhadap makanan dan air. Evelyn Salgado, gubernur negara bagian Guerrero, asal Acapulco, mengatakan 45 orang dipastikan tewas dan 47 lainnya hilang, mengutip angka dari jaksa penuntut negara. Pada Minggu pagi kemarin, Salgado mengatakan jumlah korban tewas mencapai 43 orang. Pada Minggu sore, otoritas perlindungan sipil federal Meksiko mengatakan ada 48 orang tewas, terdiri dari 43 orang di Acapulco dan lima di dekat Coyuca de Benitez.</p><p>Jumlah orang yang tewas dan hilang akibat Badai Otis, badai Kategori 5 yang melanda kota resor Acapulco di Pasifik Meksiko pekan lalu, telah meningkat hingga mendekati 100 orang. Hal itu diungkapkan pihak berwenang di negara bagian Guerrero pada Senin (30/10/2023). Badai Otis menghantam Acapulco dengan kecepatan angin 266 km per jam pada Rabu pekan lalu, membanjiri kota, merobek atap rumah, hotel dan tempat usaha lainnya, menenggelamkan kendaraan, dan memutus komunikasi serta sambungan jalan dan udara. Penjarahan terjadi ketika populasi kota yang berjumlah hampir 900.000 jiwa semakin putus asa terhadap makanan dan air. Evelyn Salgado, gubernur negara bagian Guerrero, asal Acapulco, mengatakan 45 orang dipastikan tewas dan 47 lainnya hilang, mengutip angka dari jaksa penuntut negara. Pada Minggu pagi kemarin, Salgado mengatakan jumlah korban tewas mencapai 43 orang. Pada Minggu sore, otoritas perlindungan sipil federal Meksiko mengatakan ada 48 orang tewas, terdiri dari 43 orang di Acapulco dan lima di dekat Coyuca de Benitez.</p><p>Jumlah orang yang tewas dan hilang akibat Badai Otis, badai Kategori 5 yang melanda kota resor Acapulco di Pasifik Meksiko pekan lalu, telah meningkat hingga mendekati 100 orang. Hal itu diungkapkan pihak berwenang di negara bagian Guerrero pada Senin (30/10/2023). Badai Otis menghantam Acapulco dengan kecepatan angin 266 km per jam pada Rabu pekan lalu, membanjiri kota, merobek atap rumah, hotel dan tempat usaha lainnya, menenggelamkan kendaraan, dan memutus komunikasi serta sambungan jalan dan udara. Penjarahan terjadi ketika populasi kota yang berjumlah hampir 900.000 jiwa semakin putus asa terhadap makanan dan air. Evelyn Salgado, gubernur negara bagian Guerrero, asal Acapulco, mengatakan 45 orang dipastikan tewas dan 47 lainnya hilang, mengutip angka dari jaksa penuntut negara. Pada Minggu pagi kemarin, Salgado mengatakan jumlah korban tewas mencapai 43 orang. Pada Minggu sore, otoritas perlindungan sipil federal Meksiko mengatakan ada 48 orang tewas, terdiri dari 43 orang di Acapulco dan lima di dekat Coyuca de Benitez.</p>', 'internasional', 'berita 1.webp', 'badai', '2023-10-31 03:45:25', 0, 'TITUT', 'berita', '1'),
(11, 'Waspadai Potensi Tanah Longsor di 11 Kecamatan Wilayah Jakarta', '<p>testing aja aasdasd<strong>asdasdasda</strong>asdasdasd gfjfgjfg Peringatan tersebut disampaikan BPBD melalui akun media sosial resmi Instagram bpbddkijakarta Senin (2/10/2023), dengan tema ‘Info Prakiraan Wilayah Potensi Terjadi Tanah Longsor di Wilayah DKI Jakarta bulan Oktober 2023’</p><p>testing aja aasdasd<strong>asdasdasda</strong>asdasdasd gfjfgjfg Peringatan tersebut disampaikan BPBD melalui akun media sosial resmi Instagram bpbddkijakarta Senin (2/10/2023), dengan tema ‘Info Prakiraan Wilayah Potensi Terjadi Tanah Longsor di Wilayah DKI Jakarta bulan Oktober 2023’</p><p>testing aja aasdasd<strong>asdasdasda</strong>asdasdasd gfjfgjfg Peringatan tersebut disampaikan BPBD melalui akun media sosial resmi Instagram bpbddkijakarta Senin (2/10/2023), dengan tema ‘Info Prakiraan Wilayah Potensi Terjadi Tanah Longsor di Wilayah DKI Jakarta bulan Oktober 2023’</p><p>testing aja aasdasd<strong>asdasdasda</strong>asdasdasd gfjfgjfg Peringatan tersebut disampaikan BPBD melalui akun media sosial resmi Instagram bpbddkijakarta Senin (2/10/2023), dengan tema ‘Info Prakiraan Wilayah Potensi Terjadi Tanah Longsor di Wilayah DKI Jakarta bulan Oktober 2023’</p>', 'nsl', 'berita 2.webp', 'longsot', '2023-10-31 03:45:38', 0, 'TITUT', 'berita', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(10) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `terbit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `alias`, `terbit`) VALUES
(12, 'Lokal', 'lcl', '1'),
(13, 'internasional', 'internasional', '1'),
(14, 'nasional', 'nsl', '1'),
(15, 'negeri', 'negeri', '1'),
(30, 'desa', 'desa', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konfigurasi`
--

CREATE TABLE `tb_konfigurasi` (
  `id_konfi` int(20) NOT NULL,
  `nama_konfi` varchar(200) NOT NULL,
  `tax` varchar(200) NOT NULL,
  `isi_konfi` text NOT NULL,
  `link` varchar(200) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_konfigurasi`
--

INSERT INTO `tb_konfigurasi` (`id_konfi`, `nama_konfi`, `tax`, `isi_konfi`, `link`, `tipe`) VALUES
(8, 'email', 'email', 'sandi2501.ss@gmail.com', '', 'konfigurasi'),
(9, 'alamt', 'alamat', 'Jl Kenanga', 'maps', 'konfigurasi'),
(11, 'kontak', 'no hp', '082', 'waweb', 'konfigurasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  ADD PRIMARY KEY (`id_konfi`),
  ADD KEY `id_konfi` (`id_konfi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  MODIFY `id_konfi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
