-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2026 pada 16.37
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_kue`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `created_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$98vbxh4xT65X0Rnc9/L33eWkPdxz8VL4hbvd338D7IILqDOqYj4e6', '2026-09-27 13:56:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT '0',
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `kategori`, `deskripsi`, `harga`, `stok`, `gambar`, `created_at`) VALUES
(1, 'Brownies Coklat', 'Brownies', 'Brownies coklat lembut dengan topping coklat premium.', '45000.00', 20, 'brownies.jpg', '2026-09-27 13:32:53'),
(2, 'Cheese Cake', 'Cake', 'Cheese cake lembut dengan rasa keju yang creamy.', '65000.00', 15, 'cheesecake.jpg', '2026-09-27 13:32:53'),
(3, 'Donat Coklat', 'Donat', 'Donat lembut dari bahan kentang asli dengan topping coklat yang masnis.', '30000.00', 25, 'donat.jpg', '2026-09-27 13:32:53'),
(4, 'Bitcoin (BTC)', 'Crypto', 'Aset kripto peer-to-peer yang diperkenalkan pada 2009. Pasokan maksimum protokolnya dibatasi 21 juta BTC. Nilai pasar dapat berubah tajam.', '0.00', 0, NULL, CURRENT_TIMESTAMP),
(5, 'Ethereum (ETH)', 'Crypto', 'Aset asli jaringan Ethereum, yang mendukung smart contract dan aplikasi terdesentralisasi. ETH juga digunakan untuk biaya transaksi jaringan.', '0.00', 0, NULL, CURRENT_TIMESTAMP),
(6, 'Solana (SOL)', 'Crypto', 'Aset asli jaringan Solana yang digunakan untuk biaya transaksi dan partisipasi jaringan. Ketersediaan layanan jaringan dapat berubah.', '0.00', 0, NULL, CURRENT_TIMESTAMP),
(7, 'BNB (BNB)', 'Crypto', 'Aset ekosistem BNB Chain dengan beragam kegunaan jaringan. Pastikan jaringan dan alamat tujuan sesuai sebelum transaksi.', '0.00', 0, NULL, CURRENT_TIMESTAMP),
(8, 'XRP (XRP)', 'Crypto', 'Aset digital yang digunakan pada XRP Ledger, sebuah jaringan terbuka untuk pemindahan nilai. Transfer bergantung pada jaringan dan penyedia.', '0.00', 0, NULL, CURRENT_TIMESTAMP),
(9, 'Cardano (ADA)', 'Crypto', 'Aset asli jaringan Cardano yang digunakan dalam operasi jaringan dan mekanisme staking. Imbal hasil staking tidak dijamin.', '0.00', 0, NULL, CURRENT_TIMESTAMP),
(10, 'Dogecoin (DOGE)', 'Crypto', 'Aset kripto dengan asal-usul komunitas dan jaringan proof-of-work. Harga dan likuiditas dapat berfluktuasi secara signifikan.', '0.00', 0, NULL, CURRENT_TIMESTAMP),
(11, 'Tether (USDT)', 'Crypto', 'Stablecoin yang dirancang untuk mengikuti nilai dolar AS. Patokan nilai, penerbit, jaringan, dan risiko pihak ketiga perlu dipahami.', '0.00', 0, NULL, CURRENT_TIMESTAMP),
(12, 'USD Coin (USDC)', 'Crypto', 'Stablecoin yang dirancang untuk mengikuti nilai dolar AS dan diterbitkan oleh Circle. Nilainya tidak dijamin dan dapat menyimpang dari patokan.', '0.00', 0, NULL, CURRENT_TIMESTAMP),
(13, 'Polkadot (DOT)', 'Crypto', 'Aset asli jaringan Polkadot yang digunakan untuk tata kelola, staking, dan fungsi jaringan. Mekanisme serta risiko dapat berubah.', '0.00', 0, NULL, CURRENT_TIMESTAMP);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
