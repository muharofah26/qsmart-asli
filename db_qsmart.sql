-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2024 pada 16.24
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
-- Database: `db_qsmart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `absensi_id` char(36) NOT NULL,
  `absensi_tanggal` text DEFAULT NULL,
  `absensi_mapel_id` text DEFAULT NULL,
  `absensi_pengajar_id` text DEFAULT NULL,
  `absensi_siswa_id` text DEFAULT NULL,
  `absensi_kelas_nomor` text DEFAULT NULL,
  `absensi_status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` char(36) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL DEFAULT '1',
  `no_telp` text NOT NULL,
  `foto` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `nama`, `email`, `password`, `level`, `no_telp`, `foto`, `created_at`, `updated_at`) VALUES
('be906f17-903e-47dc-bdc5-9d17638e3fac', 'Admin Qsmart 2', 'admin2@gmail.com', '$2y$12$OFuDe/ttbO85OxHHV8rEEe94BFNMaFFaurkOkZgYtcPhxXSEtoGuK', '1', '081234567890', NULL, '2024-07-26 07:33:44', '2024-07-26 07:33:44'),
('fa5c730d-4807-40ba-9d25-ecec217afbbf', 'Admin Qsmart', 'admin@gmail.com', '$2y$12$uPmyU/ke9C/Ylhc39WnSbec/seY91NKblOKdmYZqV.UdPoyvx63YK', '1', '081234567890', NULL, '2024-07-26 07:33:44', '2024-07-26 07:33:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `berita_id` bigint(20) UNSIGNED NOT NULL,
  `judul` text DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `kategori` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`berita_id`, `judul`, `isi`, `foto`, `kategori`, `flag_erase`, `created_at`, `updated_at`) VALUES
(1, 'open reruitment', 'pengajar les matematika dan fisika', 'app/berita/1722082495-lANae.jpg', 'berita', 1, '2024-07-27 05:14:55', '2024-07-27 05:14:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` bigint(20) UNSIGNED NOT NULL,
  `judul` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `judul`, `foto`, `flag_erase`, `created_at`, `updated_at`) VALUES
(1, 'kegiatan belajar', 'app/galeri/1722082077-jxN0K.jpg', 1, '2024-07-27 05:07:57', '2024-07-27 05:07:57'),
(2, 'kegiatan belajar', 'app/galeri/1722082118-UlX1L.jpg', 1, '2024-07-27 05:08:38', '2024-07-27 05:08:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `jawaban_id` bigint(20) UNSIGNED NOT NULL,
  `jawaban` text DEFAULT NULL,
  `jawaban_master_id` text DEFAULT NULL,
  `jawaban_soal_id` text DEFAULT NULL,
  `jawaban_user_id` text DEFAULT NULL,
  `jawaban_soal_master_id` text DEFAULT NULL,
  `jawaban_mapel_id` text DEFAULT NULL,
  `jawaban_pengajar_id` text DEFAULT NULL,
  `jawaban_kelas_nomor` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_master`
--

CREATE TABLE `jawaban_master` (
  `jawaban_master_id` bigint(20) UNSIGNED NOT NULL,
  `soal_master_id` text DEFAULT NULL,
  `siswa_id` text DEFAULT NULL,
  `pengajar_id` text DEFAULT NULL,
  `mapel_id` text DEFAULT NULL,
  `kelas` text DEFAULT NULL,
  `nilai` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` char(36) NOT NULL,
  `kelas_nomor` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_nomor`, `flag_erase`, `created_at`, `updated_at`) VALUES
('06502488-72ca-4591-9ddf-e0726d7ebbeb', '6', 1, '2024-07-26 07:33:45', '2024-07-26 07:33:45'),
('097acb40-ebeb-4e30-9f1d-5cf8120aa0ce', '7', 1, '2024-07-26 07:33:45', '2024-07-26 07:33:45'),
('12ffba1d-57d3-4c25-b7e3-a2883edf1cad', '5', 1, '2024-07-26 07:33:45', '2024-07-26 07:33:45'),
('3897e96f-6d55-4575-b31c-2be53e7bb36d', '11', 1, '2024-07-26 07:33:45', '2024-07-26 07:33:45'),
('8574fc10-bc98-4de0-a051-01f0dba75e97', '12', 1, '2024-07-26 07:33:45', '2024-07-26 07:33:45'),
('88218b3f-5001-4b93-9333-364f5fd77436', '2', 1, '2024-07-26 07:33:44', '2024-07-26 07:33:44'),
('945fabf0-ecd3-41f9-9380-e1d2786099c3', '3', 1, '2024-07-26 07:33:45', '2024-07-26 07:33:45'),
('960aa4d5-b686-4143-8289-6d60ae8159d1', '8', 1, '2024-07-26 07:33:45', '2024-07-26 07:33:45'),
('bb5bd035-ceb7-4c79-ad1c-1b6e42c5d406', '4', 1, '2024-07-26 07:33:45', '2024-07-26 07:33:45'),
('d4f2c202-2613-495f-86f9-8fb641075955', '1', 1, '2024-07-26 07:33:44', '2024-07-26 07:33:44'),
('e8873844-2a12-4ada-a185-3dbaedf955ff', '9', 1, '2024-07-26 07:33:45', '2024-07-26 07:33:45'),
('e9ef9fde-6a8e-4df0-b276-4893f2904276', '10', 1, '2024-07-26 07:33:45', '2024-07-26 07:33:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_materi`
--

CREATE TABLE `kelas_materi` (
  `kelas_materi_id` char(36) NOT NULL,
  `kelas_id` text DEFAULT NULL,
  `kelas_nomor` text DEFAULT NULL,
  `pengajar_id` text DEFAULT NULL,
  `materi_nama` text DEFAULT NULL,
  `materi_icon` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas_materi`
--

INSERT INTO `kelas_materi` (`kelas_materi_id`, `kelas_id`, `kelas_nomor`, `pengajar_id`, `materi_nama`, `materi_icon`, `flag_erase`, `created_at`, `updated_at`) VALUES
('0c596fd8-1320-46a2-af02-6d9b830c464c', 'd4f2c202-2613-495f-86f9-8fb641075955', '1', '6aca1d51-6dab-4aca-8592-f8475bd9e913', 'tematik', NULL, 0, '2024-07-27 23:43:59', '2024-07-28 02:51:07'),
('1538f737-3b84-40e6-ac49-388b688f7785', 'd4f2c202-2613-495f-86f9-8fb641075955', '1', 'ac7b9de8-0f3f-43fb-85b6-7c0ada62e840', 'matematika', NULL, 0, '2024-07-27 06:30:21', '2024-07-27 23:43:47'),
('52aad4cc-1ede-47be-88cc-9ee5d047f86d', 'd4f2c202-2613-495f-86f9-8fb641075955', '1', 'ac7b9de8-0f3f-43fb-85b6-7c0ada62e840', 'tematik', NULL, 1, '2024-07-28 07:33:57', '2024-07-28 07:33:57'),
('6ade7e8e-e6f1-4b64-945e-5a9afab5ee1f', 'd4f2c202-2613-495f-86f9-8fb641075955', '1', 'ac7b9de8-0f3f-43fb-85b6-7c0ada62e840', 'tematik', NULL, 0, '2024-07-28 07:32:08', '2024-07-28 07:32:45'),
('a07652fd-be87-4e1b-976a-23af8f8c4456', 'd4f2c202-2613-495f-86f9-8fb641075955', '1', 'ac7b9de8-0f3f-43fb-85b6-7c0ada62e840', 'tematik', NULL, 0, '2024-07-28 07:19:32', '2024-07-28 07:29:29'),
('d54de56b-a204-40f9-bfb7-5f8ab22130fb', '88218b3f-5001-4b93-9333-364f5fd77436', '2', '6aca1d51-6dab-4aca-8592-f8475bd9e913', 'tematik', NULL, 1, '2024-07-27 23:43:30', '2024-07-27 23:43:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_02_151322_create_kelas_table', 1),
(5, '2024_04_02_151331_create_kelas_materi_table', 1),
(6, '2024_04_02_151347_create_siswa_table', 1),
(7, '2024_04_02_151354_create_admin_table', 1),
(8, '2024_04_02_151408_create_pengajar_table', 1),
(9, '2024_04_17_195632_create_pembayarans_table', 1),
(10, '2024_05_05_065528_create_paket_pembelajaran_table', 1),
(11, '2024_05_05_065536_create_paket_pembelajaran_detail_table', 1),
(12, '2024_05_08_193453_create_absensi_table', 1),
(13, '2024_05_09_110404_create_soal_table', 1),
(14, '2024_05_09_110422_create_soal_pilihan_table', 1),
(15, '2024_05_09_113257_create_soal_master_table', 1),
(16, '2024_05_12_062453_create_pengaturan_pembelajara_table', 1),
(17, '2024_05_12_111605_create_jawaban_table', 1),
(18, '2024_07_17_161331_create_jawaban_master_table', 1),
(19, '2024_07_21_034940_create_website_table', 1),
(20, '2024_07_21_040445_create_berita_table', 1),
(21, '2024_07_21_054301_create_galeri_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_pembelajaran`
--

CREATE TABLE `paket_pembelajaran` (
  `paket_id` char(36) NOT NULL,
  `paket_nama` text DEFAULT NULL,
  `paket_deskripsi` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paket_pembelajaran`
--

INSERT INTO `paket_pembelajaran` (`paket_id`, `paket_nama`, `paket_deskripsi`, `flag_erase`, `created_at`, `updated_at`) VALUES
('bd8aac13-2bed-4c42-b389-dbbce7a91505', 'reguler', NULL, 1, '2024-07-26 10:21:18', '2024-07-26 10:21:18'),
('eb9d0a13-5b44-4645-b6e5-505c65703860', 'reguler', NULL, 1, '2024-07-28 03:22:46', '2024-07-28 03:22:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_pembelajaran_detail`
--

CREATE TABLE `paket_pembelajaran_detail` (
  `paket_detail_id` char(36) NOT NULL,
  `paket_id` text DEFAULT NULL,
  `paket_kelas` text DEFAULT NULL,
  `paket_biaya_daftar` text DEFAULT NULL,
  `paket_spp_bulan` text DEFAULT NULL,
  `paket_spp_semester` text DEFAULT NULL,
  `paket_spp_tahun` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paket_pembelajaran_detail`
--

INSERT INTO `paket_pembelajaran_detail` (`paket_detail_id`, `paket_id`, `paket_kelas`, `paket_biaya_daftar`, `paket_spp_bulan`, `paket_spp_semester`, `paket_spp_tahun`, `flag_erase`, `created_at`, `updated_at`) VALUES
('5cafe778-ff4b-46d8-9c12-c097f2f63223', 'bd8aac13-2bed-4c42-b389-dbbce7a91505', '10', '100000', '1000000', '100000', '100000', 1, '2024-07-26 10:21:18', '2024-07-26 10:21:18'),
('81d29886-80fb-4df9-933b-1a9d7fcd6033', 'eb9d0a13-5b44-4645-b6e5-505c65703860', '1', '12', '1313', '3121', '12', 1, '2024-07-28 03:22:46', '2024-07-28 03:22:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` char(36) NOT NULL,
  `pembayaran_nama` text DEFAULT NULL,
  `pembayaran_nomor` text DEFAULT NULL,
  `pembayaran_penerima` text DEFAULT NULL,
  `pembayaran_status` text NOT NULL DEFAULT '1',
  `pembayaran_icon` text DEFAULT NULL,
  `flag_erase` text NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `pembayaran_nama`, `pembayaran_nomor`, `pembayaran_penerima`, `pembayaran_status`, `pembayaran_icon`, `flag_erase`, `created_at`, `updated_at`) VALUES
('521af571-350d-4cf5-a272-44189340a7e2', 'Dana', '081234567890', 'Qsmart Pay', '1', NULL, '0', '2024-07-26 07:33:43', '2024-07-27 23:44:28'),
('f8460d8d-25d3-4c37-9c23-7035c0b152c2', 'dana', '0895704204619', 'qsmart', '1', 'app/pembayaran-icon/1722149086-XSRD8.jpg', '1', '2024-07-27 23:44:46', '2024-07-27 23:44:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `pengajar_id` char(36) NOT NULL,
  `pengajar_nama` text DEFAULT NULL,
  `pengajar_tanggal_lahir` text DEFAULT NULL,
  `pengajar_pendidikan_akhir` text DEFAULT NULL,
  `pengajar_kampus` text DEFAULT NULL,
  `pengajar_foto` text DEFAULT NULL,
  `pengajar_notlp` text DEFAULT NULL,
  `pengajar_alamat` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`pengajar_id`, `pengajar_nama`, `pengajar_tanggal_lahir`, `pengajar_pendidikan_akhir`, `pengajar_kampus`, `pengajar_foto`, `pengajar_notlp`, `pengajar_alamat`, `email`, `password`, `flag_erase`, `created_at`, `updated_at`) VALUES
('6aca1d51-6dab-4aca-8592-f8475bd9e913', 'Jefry', '1998-08-10', 's1', 'ui', 'app/pengajar/1722148944-SprxQ.jpg', NULL, 'jl. sisimangaraja', 'pengajar2@gmail.com', '$2y$12$TXqaV7Mjwz8Z2tokvDQeRevSDWIcdbBcwWhzeLUYexjg4ggDO6rtG', 0, '2024-07-27 23:42:25', '2024-07-28 01:58:53'),
('9b5c2e4a-b288-46ef-b267-601ac48b1175', 'Puji', '2024-07-27', 'S1', 'Untan', 'app/pengajar/1722163682-LiPIN.jpg', '0897777', 'Jl Agus Salim', 'Pengajar@gmail.com', '$2y$12$rwykSQyWbBgtcSeNBv0raeHV7wSzX3rynBAr5RbmfSOPYKH8r..ne', 0, '2024-07-26 10:13:38', '2024-07-28 03:48:02'),
('ac7b9de8-0f3f-43fb-85b6-7c0ada62e840', 'Puji', '2024-07-27', 'S1', 'Untan', 'app/pengajar/1722148601-PXEDu.jpg', '089765345211', 'Jl Agus Salim', NULL, '$2y$12$d9YmUtY0U0zkPY1KImYSY.5Sr1KqWuf0duPDq5IjEuKkIX7tHGqvi', 1, '2024-07-26 10:13:39', '2024-07-27 23:36:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan_pembelajaran`
--

CREATE TABLE `pengaturan_pembelajaran` (
  `pengaturan_id` bigint(20) UNSIGNED NOT NULL,
  `semester_nama` text DEFAULT NULL,
  `semester_kode` text DEFAULT NULL,
  `flag_erase` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaturan_pembelajaran`
--

INSERT INTO `pengaturan_pembelajaran` (`pengaturan_id`, `semester_nama`, `semester_kode`, `flag_erase`, `created_at`, `updated_at`) VALUES
(1, '1', '202401', NULL, '2024-07-26 07:33:46', '2024-07-26 07:33:46'),
(2, '2', '202402', NULL, '2024-07-26 07:33:46', '2024-07-26 07:33:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('iZzX7H9K6FMsgGGTHHvY6KN9PSei4RigtpcnUL2P', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidFgzRTlhWmhWWUtYcHBqMm96b3p3OTRDU240YkJXUmtMWkh2TlN4YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9sb2NhbGhvc3QvcXNtYXJ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1722259121),
('kQxAuoqK8YyGKgCtFXqPJR6bWXssnGl6wT4ABIYz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2djU3ZZM2pibk45UXZZaFJXY21xS21KcTRsVEs1TG5SRDJhOEN3SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9sb2NhbGhvc3QvcXNtYXJ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1722259121),
('v6GpOJYkykEBiSyLPAaFnRNSCe4Hn0luHx0epLeA', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGw1cjNOMlBvT1NpV25vUDZBVkozSUtFbnhuOGRLdVZ2cFh4WURNNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3QvcXNtYXJ0LWFzbGkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1722262945),
('YmLHFWOyIyo7u0Guype3GcbaX9G5H9UXKL4VXca9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTVRblBETkFYNHNIRFE3RzZ5R1VYekswUGF2VzZXcWdFRkxxWlI3MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9sb2NhbGhvc3QvcXNtYXJ0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1722259121);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` char(36) NOT NULL,
  `siswa_kode` text DEFAULT NULL,
  `siswa_nama` text DEFAULT NULL,
  `siswa_alamat` text DEFAULT NULL,
  `siswa_jenis_kelamin` text DEFAULT NULL,
  `siswa_kelas` text DEFAULT NULL,
  `siswa_tanggal_lahir` text DEFAULT NULL,
  `siswa_tempat_lahir` text DEFAULT NULL,
  `siswa_asal_sekolah` text DEFAULT NULL,
  `siswa_notlp` text DEFAULT NULL,
  `siswa_instagram` text DEFAULT NULL,
  `siswa_jurusan` text DEFAULT NULL,
  `siswa_rangking` text DEFAULT NULL,
  `siswa_raport` text DEFAULT NULL,
  `siswa_ayah` text DEFAULT NULL,
  `siswa_ibu` text DEFAULT NULL,
  `siswa_alamat_ortu` text DEFAULT NULL,
  `siswa_ortu_notlp` text DEFAULT NULL,
  `siswa_semester_awal_id` text DEFAULT NULL,
  `siswa_foto` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `siswa_metode_bayar` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `siswa_paket_les_id` text DEFAULT NULL,
  `siswa_status_bayar` int(11) NOT NULL DEFAULT 0,
  `siswa_status_aktif` int(11) NOT NULL DEFAULT 1,
  `bukti_bayar_pendaftaran` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `siswa_kode`, `siswa_nama`, `siswa_alamat`, `siswa_jenis_kelamin`, `siswa_kelas`, `siswa_tanggal_lahir`, `siswa_tempat_lahir`, `siswa_asal_sekolah`, `siswa_notlp`, `siswa_instagram`, `siswa_jurusan`, `siswa_rangking`, `siswa_raport`, `siswa_ayah`, `siswa_ibu`, `siswa_alamat_ortu`, `siswa_ortu_notlp`, `siswa_semester_awal_id`, `siswa_foto`, `email`, `siswa_metode_bayar`, `password`, `flag_erase`, `siswa_paket_les_id`, `siswa_status_bayar`, `siswa_status_aktif`, `bukti_bayar_pendaftaran`, `created_at`, `updated_at`) VALUES
('186df692-4f09-4f21-afba-1169fece0ceb', '44775', 'JENNI', 'p bandala', 'perempuan', '10', '2024-07-27', 'ketapang', 'MTS', '645353', NULL, 'IPS', '3', 'app/raport/1722014410-Zerxk.png', 'MATSURI', 'HANIFAH', 'p bandala', '4343', '1', 'app/siswa/1722014410-bkqg8.png', 'siswa@gmail.com', NULL, '$2y$12$6V61iQUcMEHr./HCWXCqzO2b34yywlY2cWqqF.d4rXwC4MA7RI/rq', 0, NULL, 1, 2, 1, '2024-07-26 10:20:10', '2024-07-26 10:54:32'),
('5bcc6354-2e78-4d2b-9a18-cb7819fa10bd', '802925', 'muhar', 'p bandala', 'laki-laki', '1', '2024-08-08', 'ketapang', 'MAN', '9009', NULL, 'IPS', '3', 'app/raport/1722162096-Edb79.jpg', 'RANO', 'RINA', 'p bandala', '08778', '1', 'app/siswa/1722162096-rcwEy.jpg', 'siswa2@gmail.com', 'f8460d8d-25d3-4c37-9c23-7035c0b152c2', '$2y$12$TZEqUrBRmLmwCSJEIOOj2.ZKHEhvzo9cEK/YDqUYF7f/kD7om5vei', 1, '81d29886-80fb-4df9-933b-1a9d7fcd6033', 1, 2, 1, '2024-07-28 03:21:36', '2024-07-28 03:25:21'),
('962c1f01-27cd-4999-b9c3-898f00fd5017', '346098', 'JENNI', 'P Bandala', 'perempuan', '10', '2024-07-27', 'Ketapang', 'MTS', '1111112', NULL, 'IPS', '2', 'app/raport/1722014576-hT38b.png', 'MATSURI', 'HANIFAH', 'P Bandala', '54353', '1', 'app/siswa/1722148676-DPFy9.jpg', 'Siswa@gmail.com', '521af571-350d-4cf5-a272-44189340a7e2', '$2y$12$LPx6RCUo/Bi1mE90knoBiOOhM4UzYf.DGwgoUEjERGfL0LeTaMO3.', 1, NULL, 0, 1, 1, '2024-07-26 10:22:56', '2024-07-27 23:37:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `soal_id` bigint(20) UNSIGNED NOT NULL,
  `soal_master_id` text DEFAULT NULL,
  `soal_mapel_id` text DEFAULT NULL,
  `soal_pengajar_id` text DEFAULT NULL,
  `soal_kelas_nomor` text DEFAULT NULL,
  `soal_pertanyaan` text DEFAULT NULL,
  `soal_type` text DEFAULT NULL,
  `flag_erase` text NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_master`
--

CREATE TABLE `soal_master` (
  `soal_master_id` bigint(20) UNSIGNED NOT NULL,
  `soal_mapel_id` text DEFAULT NULL,
  `soal_pengajar_id` text DEFAULT NULL,
  `soal_kelas_nomor` text DEFAULT NULL,
  `soal_tanggal_mulai` text DEFAULT NULL,
  `soal_tanggal_selesai` text DEFAULT NULL,
  `flag_erase` text NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_pilihan`
--

CREATE TABLE `soal_pilihan` (
  `soal_pilihan_id` bigint(20) UNSIGNED NOT NULL,
  `soal_id` text DEFAULT NULL,
  `soal_master_id` text DEFAULT NULL,
  `pilihan` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `website`
--

CREATE TABLE `website` (
  `website_id` bigint(20) UNSIGNED NOT NULL,
  `tentang` text DEFAULT NULL,
  `gambar_utama` text DEFAULT NULL,
  `maps` text DEFAULT NULL,
  `kontak` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `website`
--

INSERT INTO `website` (`website_id`, `tentang`, `gambar_utama`, `maps`, `kontak`, `alamat`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Rumbel Qsmart Ketapang merupakan salah satu lembaga bimbingan belajar nonformal, untuk pelajar yang menawarkan berbagai program pembelajar siswa SD, SMP, dan SMA, dengan fokus pada peningkatan prestasi akademik dan menciptakan lingkungan belajar yang nyaman dan mendukung perkembangan siswa agar dapat mengembangkan potensi setiap siswa secara optimal', 'app/profil/1722082035-t9sRm.jpg', NULL, '085345939709', 'Jl. H. Agus Salim, Sampit, Kec. Delta Pawan, Kabupaten Ketapang, Kalimantan Barat 78811', 'muharofah7@gmail.com', '2024-07-26 07:33:46', '2024-07-27 05:07:16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`absensi_id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`jawaban_id`);

--
-- Indeks untuk tabel `jawaban_master`
--
ALTER TABLE `jawaban_master`
  ADD PRIMARY KEY (`jawaban_master_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indeks untuk tabel `kelas_materi`
--
ALTER TABLE `kelas_materi`
  ADD PRIMARY KEY (`kelas_materi_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket_pembelajaran`
--
ALTER TABLE `paket_pembelajaran`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indeks untuk tabel `paket_pembelajaran_detail`
--
ALTER TABLE `paket_pembelajaran_detail`
  ADD PRIMARY KEY (`paket_detail_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indeks untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`pengajar_id`);

--
-- Indeks untuk tabel `pengaturan_pembelajaran`
--
ALTER TABLE `pengaturan_pembelajaran`
  ADD PRIMARY KEY (`pengaturan_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`(768)),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`soal_id`);

--
-- Indeks untuk tabel `soal_master`
--
ALTER TABLE `soal_master`
  ADD PRIMARY KEY (`soal_master_id`);

--
-- Indeks untuk tabel `soal_pilihan`
--
ALTER TABLE `soal_pilihan`
  ADD PRIMARY KEY (`soal_pilihan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`website_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `berita_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `galeri_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `jawaban_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jawaban_master`
--
ALTER TABLE `jawaban_master`
  MODIFY `jawaban_master_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pengaturan_pembelajaran`
--
ALTER TABLE `pengaturan_pembelajaran`
  MODIFY `pengaturan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `soal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `soal_master`
--
ALTER TABLE `soal_master`
  MODIFY `soal_master_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `soal_pilihan`
--
ALTER TABLE `soal_pilihan`
  MODIFY `soal_pilihan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `website`
--
ALTER TABLE `website`
  MODIFY `website_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
