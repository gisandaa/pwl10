-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Apr 2021 pada 01.24
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugaskuliah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `penulis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `title`, `content`, `created_at`, `updated_at`, `penulis`, `tanggal`) VALUES
(9, 'POzx3Fzo38GWTxxPuFN9MT821RxHiHWg3uZTSfbi.jpg', 'Berita Pertama', '<p><strong>BERITAHARIAN.COM</strong>&nbsp;- Berikut jadwal perempat final&nbsp;<a href=\"https://www.tribunnews.com/tag/piala-menpora-2021\">Piala Menpora 2021</a>&nbsp;yang menyuguhkan laga big match&nbsp;<a href=\"https://www.tribunnews.com/tag/persib-vs-persebaya\">Persib vs Persebaya</a>.</p>\r\n\r\n<p>Big match perempat final&nbsp;<a href=\"https://www.tribunnews.com/tag/piala-menpora-2021\">Piala Menpora 2021</a>&nbsp;antara Persib Bandung vs Persebaya Surabaya akan berlangsung di Stadion Maguwoharjo, Sleman, Minggu (11/4/2021) pukul 18.15 WIB.</p>\r\n\r\n<p>Ada yang beda dari kondisi lini pertahanan Persib Bandung dan Persebaya Surabaya jelang bentrok di 8 besar Piala Menpora 2021.</p>', '2021-04-08 15:52:24', '2021-04-08 15:52:24', 'Budi', '2021-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(16, 'Mr. User', 'user@gmail.com', '2021-04-06 17:02:10', '$2y$10$Ltr7anQOja5uvMnznVS4zuVXfc1JYkUxWPPnzVVSsARc8tYAtR.n6', '0dlVy8785eNxuSE6IdU5YtHAtZaoAA4PqygxomdmYjCQVDvR2InGDt1Lqc7p', 'user', NULL, NULL),
(62, 'tes', 'tes@gmail.com', NULL, '$2y$10$T3hBPeo9EMsu0nrLgWPv0OS1BKCVz.aqrStmblq8S8E.7zwBEfLzq', NULL, NULL, '2021-04-08 14:25:30', '2021-04-08 14:25:30'),
(63, 'tess', 'tes@gmail.comm', NULL, '$2y$10$GTTq8mcOCurT/48kx2ggIeYBl33gSk8iotnRQJ1i/dcE2Chl6MMUu', NULL, NULL, '2021-04-08 14:26:14', '2021-04-08 14:26:14'),
(64, 'tesss', 'tes@gmail.commm', NULL, '$2y$10$ZoVEca27IIqOAsw8cGyvw.a8y03aoKKcnLG.38siirvoXyz34xspK', NULL, 'user', '2021-04-08 14:28:41', '2021-04-08 14:28:41'),
(65, 'momo', 'momo@gmail.com', NULL, '$2y$10$Pin1FAHayIadKe4HqpwReOeDo//oXZeariWp4oVJqi6v9Hk4j0fgi', NULL, 'user', '2021-04-08 14:29:25', '2021-04-08 14:29:25'),
(66, 'jojo', 'jojo@gmail.com', NULL, '$2y$10$69AdXAmp0AA0.J4R5eDzBeuTbEMvYWuiHSGCqzCIC2GAK00SMLPra', NULL, 'user', '2021-04-08 14:30:15', '2021-04-08 14:30:15'),
(67, 'koko hy', 'kokohy@gmail.com', NULL, '$2y$10$mRgJFkYWiJEcClhaDrvl4OWkg2TMvXqzYKoW2kQYjyubrwjIh8wsu', NULL, 'user', '2021-04-08 14:32:07', '2021-04-08 14:32:07'),
(68, 'gabus', 'lele@gmail.com', NULL, '$2y$10$wjKN/e8CYbClFv5ntqZd5.VH61ExlaNDjR3XZmvqIkLidlNfmXIte', NULL, 'user', '2021-04-08 16:20:17', '2021-04-08 16:20:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
