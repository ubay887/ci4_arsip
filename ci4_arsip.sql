-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Okt 2020 pada 12.08
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
-- Database: `ci4_arsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-10-02-081619', 'App\\Database\\Migrations\\TbDept', 'default', 'App', 1601634310, 1),
(2, '2020-10-02-082109', 'App\\Database\\Migrations\\TbUser', 'default', 'App', 1601634310, 1),
(3, '2020-10-02-082839', 'App\\Database\\Migrations\\TbCategory', 'default', 'App', 1601634311, 1),
(4, '2020-10-02-083040', 'App\\Database\\Migrations\\TbArsip', 'default', 'App', 1601634311, 1),
(5, '2020-10-02-084901', 'App\\Database\\Migrations\\TbSetting', 'default', 'App', 1601634311, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_arsip`
--

CREATE TABLE `tb_arsip` (
  `id_arsip` int(10) UNSIGNED NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_dept` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_arsip` varchar(128) NOT NULL,
  `name_file` varchar(128) NOT NULL,
  `description` text DEFAULT NULL,
  `file` varchar(128) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_arsip`
--

INSERT INTO `tb_arsip` (`id_arsip`, `id_category`, `id_dept`, `id_user`, `no_arsip`, `name_file`, `description`, `file`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2019/2020', 'Proposal Sponsorship v2', 'Proposal', 'PROPOSAL SPONSORSHIP A4 v2.pdf', '2020-10-02 10:16:04', '2020-10-02 10:16:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `id_category` int(10) UNSIGNED NOT NULL,
  `name_category` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`id_category`, `name_category`) VALUES
(1, 'Umum'),
(2, 'Teknologi Informasi'),
(3, 'Pertanian'),
(4, 'Peternakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dept`
--

CREATE TABLE `tb_dept` (
  `id_dept` int(10) UNSIGNED NOT NULL,
  `name_dept` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_dept`
--

INSERT INTO `tb_dept` (`id_dept`, `name_dept`) VALUES
(1, 'Sosial Ekonomi'),
(2, 'Seni Budaya'),
(3, 'Hukum'),
(4, 'Agama'),
(5, 'Pendidikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id_setting` int(1) UNSIGNED NOT NULL,
  `name_web` varchar(128) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `version` varchar(10) DEFAULT NULL,
  `link_web` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_setting`
--

INSERT INTO `tb_setting` (`id_setting`, `name_web`, `description`, `image`, `version`, `link_web`) VALUES
(1, 'E-Arsip', 'Sistem Arsip Online', '1601650858_7b4ce88e5b5af017c1c8.png', '1.0', 'http//acengawahid.my.id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_dept` int(11) NOT NULL,
  `name_user` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `level` enum('1','2','3') NOT NULL DEFAULT '1',
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_dept`, `name_user`, `email`, `password`, `image`, `level`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 0, 'Administrator', 'admin@acengawahid.my.id', '$2y$10$WTPJsQJEYTy6MXxUbN1T9O3WP9wrnMzFVnGvRckvVxneVU.98nUiq', 'default.png', '1', '1', '2020-10-02 05:43:52', '2020-10-02 05:43:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_arsip`
--
ALTER TABLE `tb_arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `tb_dept`
--
ALTER TABLE `tb_dept`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indeks untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_arsip`
--
ALTER TABLE `tb_arsip`
  MODIFY `id_arsip` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_dept`
--
ALTER TABLE `tb_dept`
  MODIFY `id_dept` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id_setting` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
