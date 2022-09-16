-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Sep 2022 pada 22.23
-- Versi server: 5.7.33
-- Versi PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buku_judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buku_kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buku_kodekategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buku_penerbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buku_penulis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buku_tahunterbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buku_jumlahhalaman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buku_support_rekomendasi` int(11) DEFAULT '1',
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `buku_judul`, `buku_kode`, `buku_kodekategori`, `buku_penerbit`, `buku_penulis`, `buku_tahunterbit`, `buku_jumlahhalaman`, `buku_support_rekomendasi`, `kategori_id`, `created_at`, `updated_at`) VALUES
(2, 'officia ut commodi', 'V4GNB-0F6I4', '716.292', 'UD Padmasari (Persero) Tbk', 'Lanang Pangestu', '2019', '761', 91, 2, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(3, 'tenetur et vel rerum', 'V4GNB-0F6I4', '653.105', 'UD Prasetya Tbk', 'Kartika Michelle Yuliarti M.Pd', '2013', '17', 79, 8, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(4, 'iure nulla maiores totam', 'V4GNB-0F6I4', '864.20', 'Perum Sihotang Dongoran (Persero) Tbk', 'Titi Handayani', '2018', '996', 61, 4, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(5, 'repellat deleniti inventore', 'V4GNB-0F6I4', '811.260', 'Perum Iswahyudi', 'Jaeman Jarwadi Nugroho', '2018', '248', 50, 8, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(6, 'iusto at repellendus voluptate sit molestias nemo alias quo', 'V4GNB-0F6I4', '261.927', 'PT Purwanti (Persero) Tbk', 'Cager Saptono', '2015', '438', 87, 7, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(7, 'sit distinctio', 'V4GNB-0F6I4', '351.368', 'PT Melani Tbk', 'Victoria Usada', '2012', '845', 35, 8, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(8, 'nemo aut illum dolorem pariatur recusandae voluptatem', 'V4GNB-0F6I4', '119.956', 'Perum Nababan', 'Indra Najmudin', '2019', '403', 6, 5, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(9, 'pariatur id aliquid aut laboriosam laborum quidem doloremque repellendus', 'V4GNB-0F6I4', '498.796', 'PD Nainggolan (Persero) Tbk', 'Padma Nasyidah', '2014', '459', 69, 10, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(10, 'aliquam', 'V4GNB-0F6I4', '562.609', 'PD Haryanti Purwanti Tbk', 'Raharja Mansur S.Gz', '2010', '661', 46, 1, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(11, 'cumque repellat cupiditate molestiae facilis assumenda', 'V4GNB-0F6I4', '765.579', 'CV Prabowo (Persero) Tbk', 'Patricia Laksmiwati', '2015', '280', 7, 4, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(12, 'sit totam optio illo', 'V4GNB-0F6I4', '255.827', 'UD Laksmiwati Yuliarti Tbk', 'Candrakanta Siregar', '2013', '26', 84, 8, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(13, 'eos qui sunt nobis aliquam qui et inventore', 'V4GNB-0F6I4', '428.486', 'PD Laksita Rajasa (Persero) Tbk', 'Hana Nurdiyanti', '2011', '957', 79, 4, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(14, 'natus cumque ab vel non', 'V4GNB-0F6I4', '133.186', 'CV Pangestu', 'Garang Wacana S.Pt', '2018', '676', 4, 10, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(15, 'mollitia officiis expedita consequatur', 'V4GNB-0F6I4', '715.672', 'CV Suwarno Natsir', 'Zalindra Uyainah', '2016', '968', 24, 8, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(16, 'aperiam vero sint aperiam corrupti voluptates', 'V4GNB-0F6I4', '980.803', 'PD Budiyanto Suartini Tbk', 'Eli Kusmawati', '2012', '990', 22, 1, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(17, 'omnis asperiores', 'V4GNB-0F6I4', '254.651', 'Perum Pertiwi Tbk', 'Cindy Puspasari', '2015', '261', 20, 4, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(18, 'et ut architecto explicabo fugit quod mollitia', 'V4GNB-0F6I4', '286.927', 'UD Nurdiyanti (Persero) Tbk', 'Gatot Salahudin', '2016', '317', 72, 1, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(19, 'placeat', 'V4GNB-0F6I4', '332.655', 'UD Waluyo Kuswandari', 'Carla Hasanah', '2015', '874', 26, 10, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(20, 'quia ut', 'V4GNB-0F6I4', '401.719', 'PT Tamba Wijaya Tbk', 'Zalindra Kania Handayani M.M.', '2010', '345', 6, 6, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(21, 'quae vel aut molestiae voluptatem', 'V4GNB-0F6I4', '903.647', 'CV Halim Aryani', 'Mutia Hassanah', '2015', '483', 68, 4, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(22, 'ea quam dolorem id quia et', 'V4GNB-0F6I4', '636.857', 'Perum Saputra Gunarto (Persero) Tbk', 'Salwa Pertiwi M.Kom.', '2014', '221', 80, 6, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(23, 'recusandae ipsam qui numquam voluptatem aliquid ullam ut illo', 'V4GNB-0F6I4', '26.33', 'PD Halim Yulianti', 'Marwata Tarihoran S.Farm', '2012', '317', 63, 4, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(24, 'natus neque', 'V4GNB-0F6I4', '290.522', 'PD Sihombing', 'Warsa Siregar', '2016', '44', 13, 7, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(25, 'sunt ut rerum sit ipsam', 'V4GNB-0F6I4', '243.152', 'PD Hardiansyah (Persero) Tbk', 'Julia Suryatmi', '2013', '36', 77, 10, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(26, 'dolore alias qui voluptatum', 'V4GNB-0F6I4', '261.614', 'Perum Hasanah Mulyani (Persero) Tbk', 'Zaenab Farida', '2018', '952', 87, 8, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(27, 'corporis vitae amet aut iusto delectus consectetur molestiae numquam', 'V4GNB-0F6I4', '569.835', 'UD Marbun Halimah Tbk', 'Balapati Siregar', '2014', '422', 70, 8, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(28, 'molestiae ullam atque qui', 'V4GNB-0F6I4', '307.982', 'Perum Rahayu Budiyanto', 'Danuja Panji Rajata S.Psi', '2017', '802', 68, 8, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(29, 'atque expedita soluta', 'V4GNB-0F6I4', '500.341', 'CV Winarsih Hasanah Tbk', 'Melinda Kusmawati M.Farm', '2013', '356', 17, 2, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(30, 'autem modi soluta reprehenderit', 'V4GNB-0F6I4', '851.45', 'Perum Andriani Dabukke Tbk', 'Zaenab Kusmawati', '2012', '860', 25, 8, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(31, 'exercitationem et est totam placeat nihil quos iste', 'V4GNB-0F6I4', '639.83', 'CV Safitri', 'Gatot Mandala', '2013', '280', 92, 5, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(32, 'libero alias atque velit sit cupiditate itaque', 'V4GNB-0F6I4', '535.490', 'Perum Wahyudin Tbk', 'Karsana Sinaga M.Ak', '2019', '213', 49, 5, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(33, 'ea quo in cumque', 'V4GNB-0F6I4', '821.46', 'PD Lailasari Hartati', 'Kani Widiastuti', '2014', '159', 67, 1, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(34, 'vero cumque pariatur incidunt ut', 'V4GNB-0F6I4', '727.467', 'PT Halim (Persero) Tbk', 'Umi Riyanti S.Pd', '2017', '638', 24, 4, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(35, 'aut', 'V4GNB-0F6I4', '941.311', 'PT Yuliarti Prakasa', 'Cecep Prasetya', '2012', '321', 61, 10, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(36, 'culpa nam dolorem qui nisi incidunt nostrum deleniti sunt', 'V4GNB-0F6I4', '440.336', 'PD Gunawan', 'Dipa Rajata S.Farm', '2014', '256', 80, 8, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(37, 'nulla ut culpa', 'V4GNB-0F6I4', '359.479', 'PT Laksmiwati (Persero) Tbk', 'Legawa Narpati', '2016', '353', 38, 1, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(38, 'ut corporis iure', 'V4GNB-0F6I4', '351.70', 'PT Farida Prayoga (Persero) Tbk', 'Niyaga Saputra', '2018', '718', 52, 1, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(39, 'perferendis magnam doloremque ut', 'V4GNB-0F6I4', '71.865', 'Perum Gunawan Suryatmi', 'Waluyo Wacana S.Pt', '2019', '221', 52, 10, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(40, 'praesentium iste qui quam', 'V4GNB-0F6I4', '483.666', 'PD Zulaika Mustofa', 'Prayitna Saragih', '2018', '308', 81, 1, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(41, 'eum ut', 'V4GNB-0F6I4', '375.799', 'CV Kuswandari (Persero) Tbk', 'Ciaobella Hariyah S.IP', '2014', '708', 74, 5, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(42, 'deserunt', 'V4GNB-0F6I4', '345.466', 'Perum Rahimah Hassanah Tbk', 'Vino Cecep Prasasta', '2010', '900', 68, 7, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(43, 'et vel enim et ut', 'V4GNB-0F6I4', '886.107', 'PD Kuswandari Mayasari Tbk', 'Sakti Napitupulu', '2014', '896', 32, 6, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(44, 'consequuntur eaque exercitationem', 'V4GNB-0F6I4', '498.195', 'PD Rahimah Uyainah (Persero) Tbk', 'Citra Widiastuti', '2011', '894', 57, 1, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(45, 'aut eligendi', 'V4GNB-0F6I4', '939.778', 'PT Anggraini Tamba Tbk', 'Icha Nuraini', '2013', '756', 33, 4, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(46, 'molestiae laudantium rerum', 'V4GNB-0F6I4', '23.366', 'UD Prastuti Wijayanti (Persero) Tbk', 'Garda Saragih', '2015', '707', 59, 1, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(47, 'impedit', 'V4GNB-0F6I4', '96.836', 'UD Tampubolon (Persero) Tbk', 'Cemani Rajata', '2011', '445', 54, 1, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(48, 'ut natus incidunt veniam aspernatur qui eveniet libero', 'V4GNB-0F6I4', '27.797', 'UD Rahayu Situmorang (Persero) Tbk', 'Dagel Manullang', '2012', '896', 12, 6, '2022-09-17 05:10:02', '2022-09-17 05:10:02'),
(49, 'dolore earum earum nisi consequatur', 'V4GNB-0F6I4', '117.820', 'CV Suartini Tbk', 'Bakiman Tedi Narpati', '2016', '787', 35, 8, '2022-09-17 05:10:02', '2022-09-17 05:10:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_pinjaman`
--

CREATE TABLE `buku_pinjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pinjaman_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori_nama`, `kategori_kode`, `created_at`, `updated_at`) VALUES
(1, 'Karya Umum', '100', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(2, 'Filsafat', '101', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(3, 'Agama', '102', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(4, 'Ilmu-ilmu Sosial', '103', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(5, 'Sastra', '104', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(6, 'Sastra Indonesia', '105', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(7, 'Sastra Inggris', '106', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(8, 'Ilmu-ilmu Murni', '107', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(9, 'Ilmu-ilmu Terapan', '108', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(10, 'Kesenian, Hiburan dan Olahraga', '109', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(11, 'Kesusastraan', '110', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(12, 'Geografi dan Sejarah', '111', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(13, 'Jurnal (Teori & Praktik)', '112', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(14, 'Bahasa Pemrograman', '113', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(15, 'Penanganan Ternak', '114', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(16, 'Informasi dan Teknologi', '115', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(17, 'Ensiklopedia', '116', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(18, 'Bisnis', '117', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(19, 'Humor', '118', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(20, 'Pertanian', '119', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(21, 'Budidaya Ternak', '120', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(22, 'Kebidanan', '121', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(23, 'Politik', '122', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(24, 'Moral', '123', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(25, 'Biologi', '124', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(26, 'Psikologi', '125', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(27, 'Akuntansi', '126', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(28, 'Pendidikan Anak Usia Dini', '127', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(29, 'Kesehatan', '128', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(30, 'Ekonomi', '129', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(31, 'Flora', '130', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(32, 'Fauna', '131', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(33, 'Matematika', '132', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(34, 'Teknik', '133', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(35, 'Mesin', '134', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(36, 'Ilmu Astronomi', '135', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(37, 'Ternak', '136', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(38, 'Statistik', '137', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(39, 'Sains', '138', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(40, 'Manajemen', '139', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(41, 'Ilmu Sejarah', '140', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(42, 'RPUL', '141', '2022-09-17 05:09:55', '2022-09-17 05:09:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `login_nama`, `login_username`, `login_password`, `login_email`, `login_telepon`, `login_token`, `login_level`, `login_status`, `created_at`, `updated_at`) VALUES
(1, 'FathurWalkers', 'fathurwalkers', '$2y$12$jDn7tKuNHQ8SSgtveYRPuOI2cxKC9aa82Jb4UbUAfAjR3F7tDAWbu', 'fathurwalkers44@gmail.com', '085342072185', '$2y$12$RQC2PaUGvxrG.8maOK5yHenQY5HLIscuC8g6K.Me4Uiyym/9Go0Um', 'admin', 'verified', '2022-09-17 05:09:53', '2022-09-17 05:09:53'),
(2, 'Yuyun', 'yuyun', '$2y$12$MzptDJNfZVvvGzAtJ3W7ieFP9IerNaQMEnnedVhLP.cNuvL/xyIx6', 'yuyun@gmail.com', '085342072185', '$2y$12$EiE7pOlIStHL/VD7TyujJenRXbOQV4.SSPaN5SpX5K7FIAAhmEUvG', 'admin', 'verified', '2022-09-17 05:09:53', '2022-09-17 05:09:53'),
(3, 'Petugas 1', 'petugas', '$2y$12$7XxfeMUExHlFJr8SXEOkJe7YfqJ8jQqZhWFSJD//kApFaY81lvpiy', 'petugas@gmail.com', '085342072185', '$2y$12$a1b/i3kkvwfHuLerffsJw.0hXFwm0Sg30cKopDyNPn2hRcYkLA.zW', 'petugas', 'verified', '2022-09-17 05:09:54', '2022-09-17 05:09:54'),
(4, 'User 1', 'user1', '$2y$12$tn40L7Wl9aSVjoeHjSYXCeJwB9nBGi8lGVoz/0YKExdXdBj5JLD4q', 'user1@gmail.com', '085342072185', '$2y$12$oOcypgJXa69uRVbSKNyCp.cWnRRkkxbuV3SoDiGutgUdmiZCi49RS', 'user', 'verified', '2022-09-17 05:09:55', '2022-09-17 05:09:55'),
(5, 'User 2', 'user2', '$2y$12$AWaJNg.PM/ZSP1PenAGjP.9DfiUBd3Ds99TV34H.0THWNukYxi3EK', 'user2@gmail.com', '085342072185', '$2y$12$CLhiKPXAuF6D23AxvITLDOBbwhp/44GL3xPNOIMb68E0ddO9DIdQa', 'user', 'verified', '2022-09-17 05:09:55', '2022-09-17 05:09:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_03_015857_create_logins_table', 1),
(6, '2021_11_04_015110_create_kategoris_table', 1),
(7, '2021_11_04_021529_create_pinjamen_table', 1),
(8, '2021_11_06_131132_create_bukus_table', 1),
(9, '2021_11_06_131210_create_pinjaman_bukus_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pinjaman_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinjaman_pengguna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinjaman_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pinjam` datetime DEFAULT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `login_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `buku_pinjaman`
--
ALTER TABLE `buku_pinjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_pinjaman_buku_id_foreign` (`buku_id`),
  ADD KEY `buku_pinjaman_pinjaman_id_foreign` (`pinjaman_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_login_username_unique` (`login_username`),
  ADD UNIQUE KEY `login_login_email_unique` (`login_email`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pinjaman_login_id_foreign` (`login_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `buku_pinjaman`
--
ALTER TABLE `buku_pinjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `buku_pinjaman`
--
ALTER TABLE `buku_pinjaman`
  ADD CONSTRAINT `buku_pinjaman_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `buku_pinjaman_pinjaman_id_foreign` FOREIGN KEY (`pinjaman_id`) REFERENCES `pinjaman` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_login_id_foreign` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
