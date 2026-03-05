-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Mar 2026 pada 08.07
-- Versi server: 8.0.45-0ubuntu0.24.04.1
-- Versi PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipaki`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:2;', 1772126014),
('laravel-cache-da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1772126014;', 1772126014),
('laravel-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6', 'i:1;', 1772695926),
('laravel-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer', 'i:1772695926;', 1772695926),
('laravel-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:55:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:12:\"ViewAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:9:\"View:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"Create:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"Update:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:11:\"Delete:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:12:\"Restore:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:16:\"ForceDelete:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:19:\"ForceDeleteAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:15:\"RestoreAny:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:14:\"Replicate:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:12:\"Reorder:Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:22:\"ViewAny:Classification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:19:\"View:Classification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:21:\"Create:Classification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:21:\"Update:Classification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:21:\"Delete:Classification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:22:\"Restore:Classification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:26:\"ForceDelete:Classification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:29:\"ForceDeleteAny:Classification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:25:\"RestoreAny:Classification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:24:\"Replicate:Classification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:22:\"Reorder:Classification\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:16:\"ViewAny:Evidence\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:13:\"View:Evidence\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:15:\"Create:Evidence\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:15:\"Update:Evidence\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:15:\"Delete:Evidence\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:16:\"Restore:Evidence\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:20:\"ForceDelete:Evidence\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:23:\"ForceDeleteAny:Evidence\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:19:\"RestoreAny:Evidence\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:18:\"Replicate:Evidence\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:16:\"Reorder:Evidence\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:14:\"ViewAny:Report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:11:\"View:Report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:13:\"Create:Report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:13:\"Update:Report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:13:\"Delete:Report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:14:\"Restore:Report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:18:\"ForceDelete:Report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:21:\"ForceDeleteAny:Report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:17:\"RestoreAny:Report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:16:\"Replicate:Report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:14:\"Reorder:Report\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:12:\"ViewAny:Unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:9:\"View:Unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:11:\"Create:Unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:11:\"Update:Unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:11:\"Delete:Unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:12:\"Restore:Unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:16:\"ForceDelete:Unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:19:\"ForceDeleteAny:Unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:15:\"RestoreAny:Unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:14:\"Replicate:Unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:12:\"Reorder:Unit\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super_admin\";s:1:\"c\";s:3:\"web\";}}}', 1772782268);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `classifications`
--

CREATE TABLE `classifications` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `classifications`
--

INSERT INTO `classifications` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Melaksasnakan tugas lain yang diberikan oleh Atasan', '2026-02-19 07:15:08', '2026-02-19 07:15:08'),
(2, 'Melaksanakan kegiatan pengecekan dan pemeliharaan pressure pipa, pengantaran mobil tangki dan bantuan mobil tangki, Get valev, Wo, Jembatan pipa, Air Valev, reservoir distribusi,GIS, dan booster pump dengan menerapkan K3LH', '2026-02-19 07:15:21', '2026-02-19 07:15:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `evidence`
--

CREATE TABLE `evidence` (
  `id` bigint UNSIGNED NOT NULL,
  `report_id` bigint UNSIGNED NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `evidence`
--

INSERT INTO `evidence` (`id`, `report_id`, `file_path`, `created_at`, `updated_at`, `user_id`) VALUES
(8, 22, 'images/No2XizawtURnKp57p1LJBYE7Lc5XXIJhgJft9Gig.jpg', '2026-02-21 21:51:33', '2026-02-21 21:51:33', NULL),
(9, 22, 'images/TCuui3xZH07ZKNNLeFfnjIWHIznsBRKPhDbEzfXQ.jpg', '2026-02-21 21:51:43', '2026-02-21 21:51:43', NULL),
(12, 24, 'images/J4SAHqIA6P2YLbNwGwQhZ2FZQ2VZamqrt17apdFJ.jpg', '2026-02-21 22:00:50', '2026-02-21 22:00:50', NULL),
(13, 24, 'images/YWj8Wtk03wTVaPYDscyYdkdA4VSsfw49AR9qnIaK.jpg', '2026-02-21 22:00:56', '2026-02-21 22:00:56', NULL),
(15, 25, 'images/CRpH6xCJdKH6r1HjUX63PaUI0PPcZBxAQyJ0FgDu.png', '2026-02-25 09:26:35', '2026-02-25 09:26:35', NULL),
(16, 34, 'images/djj5Duza3katsWzLdLdIeossm56u4xn4vVhniRI1.jpg', '2026-02-25 10:08:08', '2026-02-25 10:08:08', NULL),
(17, 35, 'images/NInJJw0tH69MK91ADdNJX101rZqIahOuoaVUkdk3.png', '2026-02-28 05:27:53', '2026-02-28 05:27:53', NULL),
(18, 35, 'images/beAXeQbI6aZEAJXJLkguSYw6VvXQbQf3IzIqdKug.jpg', '2026-02-28 05:28:02', '2026-02-28 05:28:02', NULL),
(19, 35, 'images/Zk7nHsCzkVfyBT6dRIwK2bzH2poDEuaUP6XoKip2.png', '2026-02-28 05:28:10', '2026-02-28 05:28:10', NULL),
(21, 68, 'images/9q9DqtMQ1OHg5EjgIzrNtJq76TyU9p32M6G69vC6.png', '2026-03-01 19:37:18', '2026-03-01 19:37:18', NULL),
(22, 68, 'images/NL6cAq0AwXGE3pmmnwV7XG9YP0h3nhZZU44XmgmY.jpg', '2026-03-01 19:37:32', '2026-03-01 19:37:32', NULL),
(23, 68, 'images/HeWzJkBIKsfl5Z6EYoQJuoXzbQAR40h8kJUIpX5l.jpg', '2026-03-01 19:37:38', '2026-03-01 19:37:38', NULL),
(24, 69, 'images/lqdzx3ZrI0DW719cSTvWyCRoJmJ8VCvJWW420kVy.jpg', '2026-03-02 01:28:44', '2026-03-02 01:28:44', NULL),
(25, 69, 'images/Hn0JKSDkdJuVRmyPNpJeqhJi4q5E42A21wBxom7S.jpg', '2026-03-02 01:29:11', '2026-03-02 01:29:11', NULL),
(26, 69, 'images/MUcKKVqFWCS4ZC8aIeR4HlbxpR7idqMlUTOn4DvD.jpg', '2026-03-02 01:29:44', '2026-03-02 01:29:44', NULL),
(27, 70, 'images/C98QjRKXFI9I87tFeuz6BQGGaCIncxp7zDpivl32.jpg', '2026-03-02 01:32:24', '2026-03-02 01:32:24', NULL),
(28, 69, 'images/kL7hAros2VJfJ1rJCQykbdg8rsSTauIg7JvAQTRP.jpg', '2026-03-02 03:06:03', '2026-03-02 03:06:03', NULL),
(29, 71, 'images/GducWJNRlia4fDkp6ORGMJJ5IkHHTF0Znb1bk09r.jpg', '2026-03-04 23:51:07', '2026-03-04 23:51:07', NULL),
(30, 71, 'images/fFkG47mq8NMWkKv5KjavNx65btodsX7ALjYXaDyG.jpg', '2026-03-04 23:51:27', '2026-03-04 23:51:27', NULL),
(31, 71, 'images/9zQqCKs9E6pxCIzOQ1Q74gU1KxzJZAHJRfOnOmI5.jpg', '2026-03-04 23:51:56', '2026-03-04 23:51:56', NULL),
(32, 72, 'images/xtov21ljmfd2p64OKzUZNO0j5oyWjEFKQTHTqrTw.jpg', '2026-03-04 23:54:28', '2026-03-04 23:54:28', NULL),
(33, 72, 'images/T1bjhEuvh3Sn9yKJwhWaXoQODLmfkzW5ZaAmXEtw.jpg', '2026-03-04 23:55:03', '2026-03-04 23:55:03', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_23_173743_create_classifications_table', 1),
(5, '2026_01_23_174637_create_units_table', 1),
(6, '2026_01_23_174658_create_reports_table', 1),
(7, '2026_01_23_175433_create_evidence_table', 1),
(8, '2026_02_09_145339_create_personal_access_tokens_table', 1),
(9, '2026_02_19_145848_add_user_id_to_reports_table', 1),
(10, '2026_02_19_145918_add_user_id_to_evidence_table', 1),
(11, '2026_02_21_000000_create_roles_table', 2),
(12, '2026_02_22_062727_add_profile_fields_to_users_table', 3),
(13, '2026_02_26_170050_create_permission_tables', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ViewAny:Role', 'web', '2026-02-26 09:00:59', '2026-02-26 09:00:59'),
(2, 'View:Role', 'web', '2026-02-26 09:00:59', '2026-02-26 09:00:59'),
(3, 'Create:Role', 'web', '2026-02-26 09:00:59', '2026-02-26 09:00:59'),
(4, 'Update:Role', 'web', '2026-02-26 09:00:59', '2026-02-26 09:00:59'),
(5, 'Delete:Role', 'web', '2026-02-26 09:00:59', '2026-02-26 09:00:59'),
(6, 'Restore:Role', 'web', '2026-02-26 09:00:59', '2026-02-26 09:00:59'),
(7, 'ForceDelete:Role', 'web', '2026-02-26 09:00:59', '2026-02-26 09:00:59'),
(8, 'ForceDeleteAny:Role', 'web', '2026-02-26 09:00:59', '2026-02-26 09:00:59'),
(9, 'RestoreAny:Role', 'web', '2026-02-26 09:00:59', '2026-02-26 09:00:59'),
(10, 'Replicate:Role', 'web', '2026-02-26 09:00:59', '2026-02-26 09:00:59'),
(11, 'Reorder:Role', 'web', '2026-02-26 09:00:59', '2026-02-26 09:00:59'),
(12, 'ViewAny:Classification', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(13, 'View:Classification', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(14, 'Create:Classification', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(15, 'Update:Classification', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(16, 'Delete:Classification', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(17, 'Restore:Classification', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(18, 'ForceDelete:Classification', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(19, 'ForceDeleteAny:Classification', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(20, 'RestoreAny:Classification', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(21, 'Replicate:Classification', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(22, 'Reorder:Classification', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(23, 'ViewAny:Evidence', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(24, 'View:Evidence', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(25, 'Create:Evidence', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(26, 'Update:Evidence', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(27, 'Delete:Evidence', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(28, 'Restore:Evidence', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(29, 'ForceDelete:Evidence', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(30, 'ForceDeleteAny:Evidence', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(31, 'RestoreAny:Evidence', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(32, 'Replicate:Evidence', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(33, 'Reorder:Evidence', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(34, 'ViewAny:Report', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(35, 'View:Report', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(36, 'Create:Report', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(37, 'Update:Report', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(38, 'Delete:Report', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(39, 'Restore:Report', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(40, 'ForceDelete:Report', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(41, 'ForceDeleteAny:Report', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(42, 'RestoreAny:Report', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(43, 'Replicate:Report', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(44, 'Reorder:Report', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(45, 'ViewAny:Unit', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(46, 'View:Unit', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(47, 'Create:Unit', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(48, 'Update:Unit', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(49, 'Delete:Unit', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(50, 'Restore:Unit', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(51, 'ForceDelete:Unit', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(52, 'ForceDeleteAny:Unit', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(53, 'RestoreAny:Unit', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(54, 'Replicate:Unit', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04'),
(55, 'Reorder:Unit', 'web', '2026-02-26 09:01:04', '2026-02-26 09:01:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(40, 'App\\Models\\User', 1, 'supernya-AuthToken', 'b2cbe89722ab40567bc47b59fbee6840996a67261c7de92dfc4d8e7f19742e35', '[\"*\"]', '2026-02-26 09:13:34', NULL, '2026-02-25 09:40:15', '2026-02-26 09:13:34'),
(63, 'App\\Models\\User', 2, 'IRWAN-AuthToken', 'afd53580615027b9f7ec5bfca622ca2496971ae567be44c55df2eab80431ba12', '[\"*\"]', '2026-03-02 03:06:30', NULL, '2026-03-02 03:03:11', '2026-03-02 03:06:30'),
(64, 'App\\Models\\User', 2, 'IRWAN-AuthToken', '0d75939ff82d3a83e627c8c5bb33d8853151a600a947e53e544feabeae0e5518', '[\"*\"]', '2026-03-04 23:30:49', NULL, '2026-03-04 23:30:47', '2026-03-04 23:30:49'),
(65, 'App\\Models\\User', 2, 'IRWAN-AuthToken', 'c59817e2c273440d46ab644085bbd25764eaf98d3696c8f7a5e3eb8ec9540f0a', '[\"*\"]', '2026-03-04 23:32:08', NULL, '2026-03-04 23:32:07', '2026-03-04 23:32:08'),
(66, 'App\\Models\\User', 2, 'IRWAN-AuthToken', '8effda1b1e70f1247dbe58c45ce3bb7859f8cea5ccb57e7748d2fb9ad1c3b6f9', '[\"*\"]', '2026-03-04 23:33:08', NULL, '2026-03-04 23:32:53', '2026-03-04 23:33:08'),
(67, 'App\\Models\\User', 2, 'IRWAN-AuthToken', 'f15cf68bb1135b9d2a34854a1cb0cd18f4acceb0e27825f255797170358da6c5', '[\"*\"]', '2026-03-04 23:55:29', NULL, '2026-03-04 23:33:50', '2026-03-04 23:55:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reports`
--

CREATE TABLE `reports` (
  `id` bigint UNSIGNED NOT NULL,
  `classification_id` bigint UNSIGNED NOT NULL,
  `unit_id` bigint UNSIGNED NOT NULL,
  `report_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievement` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reports`
--

INSERT INTO `reports` (`id`, `classification_id`, `unit_id`, `report_date`, `description`, `target`, `realization`, `achievement`, `created_at`, `updated_at`, `user_id`) VALUES
(22, 2, 1, '2026-02-23', 'Testinggg Update', '10', '9', 0.9, '2026-02-21 21:51:21', '2026-02-25 10:11:58', 2),
(24, 2, 1, '2026-02-22', 'Ini Deskripsi Test Test Partial', '10', '10', 1, '2026-02-21 22:00:44', '2026-02-25 10:12:05', 2),
(25, 2, 1, '2026-02-25', 'sdadasda', '10', '10', 1, '2026-02-25 09:26:22', '2026-02-25 10:12:11', 2),
(34, 1, 1, '2026-02-25', 'Melaksanakan Adalah', '30', '29', 0.96666666666667, '2026-02-25 10:08:00', '2026-02-27 04:35:26', 2),
(35, 2, 1, '2026-02-28', 'Pengecekan mobil tangki', '1', '1', 1, '2026-02-28 05:27:30', '2026-02-28 05:27:30', 5),
(37, 1, 1, '2026-01-15', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:01:09', '2026-03-01 02:01:09', 2),
(38, 1, 1, '2026-01-16', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:01:13', '2026-03-01 02:01:13', 2),
(39, 1, 1, '2026-01-17', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:01:16', '2026-03-01 02:01:16', 2),
(40, 1, 1, '2026-01-18', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:01:22', '2026-03-01 02:01:22', 2),
(41, 1, 1, '2026-01-19', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:01:26', '2026-03-01 02:01:26', 2),
(42, 1, 1, '2026-01-20', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:01:30', '2026-03-01 02:01:30', 2),
(43, 1, 1, '2026-01-21', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:01:36', '2026-03-01 02:01:36', 2),
(44, 1, 1, '2026-01-22', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:01:39', '2026-03-01 02:01:39', 2),
(45, 1, 1, '2026-01-23', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:01:42', '2026-03-01 02:01:42', 2),
(46, 1, 1, '2026-01-24', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:01:46', '2026-03-01 02:01:46', 2),
(47, 1, 1, '2026-01-25', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:01:49', '2026-03-01 02:01:49', 2),
(48, 1, 1, '2026-01-26', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:01:52', '2026-03-01 02:01:52', 2),
(49, 1, 1, '2026-01-27', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:01:55', '2026-03-01 02:01:55', 2),
(50, 1, 1, '2026-01-28', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:02:01', '2026-03-01 02:02:01', 2),
(51, 1, 1, '2026-01-29', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:02:05', '2026-03-01 02:02:05', 2),
(61, 1, 1, '2026-02-09', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:02:43', '2026-03-01 02:02:43', 2),
(62, 1, 1, '2026-02-10', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:02:46', '2026-03-01 02:02:46', 2),
(63, 1, 1, '2026-02-11', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:02:51', '2026-03-01 02:02:51', 2),
(64, 1, 1, '2026-02-12', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:02:53', '2026-03-01 02:02:53', 2),
(65, 1, 1, '2026-02-13', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:02:56', '2026-03-01 02:02:56', 2),
(66, 1, 1, '2026-02-14', 'Ini Deskripsi 4', '35', '35', 1, '2026-03-01 02:03:00', '2026-03-01 02:03:00', 2),
(68, 1, 1, '2026-02-15', 'Ini Deskripsi 4', '35', '30', 0.85714285714286, '2026-03-01 17:55:34', '2026-03-01 19:32:18', 2),
(69, 2, 1, '2026-03-02', 'Pengecekkan 2 Unit Mobil Tangki dan Wash Out', '4', '4', 1, '2026-03-02 01:28:06', '2026-03-02 01:28:06', 2),
(70, 1, 1, '2026-03-02', 'Pengantaran 1 unit air bersih untuk wudhu di kp.4 acara buka bersama', '1', '1', 1, '2026-03-02 01:31:46', '2026-03-02 01:31:46', 2),
(71, 2, 1, '2026-03-04', 'Pengecekkan Gate Valve', '6', '6', 1, '2026-03-04 23:49:30', '2026-03-04 23:49:30', 2),
(72, 2, 1, '2026-02-18', 'Pengecekkan Jembatan Pipa & Air Valve', '4', '4', 1, '2026-03-04 23:53:35', '2026-03-04 23:53:35', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2026-02-26 09:00:59', '2026-02-26 09:00:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8gwf3jsQ9SFTpN0q5tJeLfm2yfzFqBqY0WKJvM5i', 2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiQlNUU3VxVEtpVGUxbFdDMFV2V3d3WWhCeVB2eExtUGJNYmh4MlBabyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9zaXBha2kuZGV2aGl2ZXBkYW0ubXkuaWQvYWRtaW4vdXNlcnMiO3M6NToicm91dGUiO3M6MzY6ImZpbGFtZW50LmFkbWluLnJlc291cmNlcy51c2Vycy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjY0OiI4N2M3N2ViZWZjMGRmYjQ2ZTMxMzllMGUyY2Q2N2YxZGU3ODc2ZjU2NGZiNWZkODI1YTdkYTg4Y2RkNmVhNWRkIjtzOjY6InRhYmxlcyI7YToxOntzOjQwOiI3ZWI4M2QxMmQ1NGU5MzNjODY3YjdlMGRiOTMzNzk3OF9jb2x1bW5zIjthOjk6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJuYW1lIjtzOjU6ImxhYmVsIjtzOjQ6Ik5hbWUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6ImVtYWlsIjtzOjU6ImxhYmVsIjtzOjU6IkVtYWlsIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo3OiJqYWJhdGFuIjtzOjU6ImxhYmVsIjtzOjg6IlBvc2l0aW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo2OiJiYWdpYW4iO3M6NToibGFiZWwiO3M6MTA6IkRlcGFydG1lbnQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEzOiJyZXBvcnRzX2NvdW50IjtzOjU6ImxhYmVsIjtzOjEzOiJUb3RhbCBSZXBvcnRzIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxODoicmVwb3J0c19zdW1fdGFyZ2V0IjtzOjU6ImxhYmVsIjtzOjEyOiJUb3RhbCBUYXJnZXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo2O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjIzOiJyZXBvcnRzX3N1bV9yZWFsaXphdGlvbiI7czo1OiJsYWJlbCI7czoxNzoiVG90YWwgUmVhbGl6YXRpb24iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo3O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjIzOiJyZXBvcnRzX2F2Z19hY2hpZXZlbWVudCI7czo1OiJsYWJlbCI7czoxOToiQXZnIEFjaGlldmVtZW50ICglKSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjg7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IkNyZWF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO319fX0=', 1772697249),
('AFhj3jdO5aFbqt5mkAYzXQe4lwHWvq0DIsSTVYWy', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYmttbTZJU3NlVUJJeGp5UEFKbjBqVjRyUzh4aUJ4cWFzWXRXQ0tkVCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovL3NpcGFraS5kZXZoaXZlcGRhbS5teS5pZC9hZG1pbiI7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vc2lwYWtpLmRldmhpdmVwZGFtLm15LmlkL2FkbWluL2xvZ2luIjtzOjU6InJvdXRlIjtzOjI1OiJmaWxhbWVudC5hZG1pbi5hdXRoLmxvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772420640),
('Cg5HTBTtP9SJTX7RUqgN7YsAYzPcRPzFPuBaN62X', NULL, '127.0.0.1', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzlxVGNKbWRSbzZYTzVaY3VRQzBtbHdPVDM3UGVadjZRWWVmVE9EUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9zaXBha2kuZGV2aGl2ZXBkYW0ubXkuaWQiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1772436027),
('mmdiZ6rw2LCB69urvMZFPGYUbDuax4RenzYOCEIX', 2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoieU1xeW5GTTZFd3lMOWo2TmxDVFB4QjZ2NE90SHB0MlVPTGJZb0pmbCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjQ1OiJodHRwOi8vc2lwYWtpLmRldmhpdmVwZGFtLm15LmlkL2FkbWluL3VzZXJzLzIiO3M6NToicm91dGUiO3M6MzU6ImZpbGFtZW50LmFkbWluLnJlc291cmNlcy51c2Vycy52aWV3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2NDoiODdjNzdlYmVmYzBkZmI0NmUzMTM5ZTBlMmNkNjdmMWRlNzg3NmY1NjRmYjVmZDgyNWE3ZGE4OGNkZDZlYTVkZCI7czo2OiJ0YWJsZXMiO2E6Mjp7czo0MDoiN2ViODNkMTJkNTRlOTMzYzg2N2I3ZTBkYjkzMzc5NzhfY29sdW1ucyI7YTo5OntpOjA7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NDoibmFtZSI7czo1OiJsYWJlbCI7czo0OiJOYW1lIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo1OiJlbWFpbCI7czo1OiJsYWJlbCI7czo1OiJFbWFpbCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NzoiamFiYXRhbiI7czo1OiJsYWJlbCI7czo4OiJQb3NpdGlvbiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NjoiYmFnaWFuIjtzOjU6ImxhYmVsIjtzOjEwOiJEZXBhcnRtZW50IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMzoicmVwb3J0c19jb3VudCI7czo1OiJsYWJlbCI7czoxMzoiVG90YWwgUmVwb3J0cyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjU7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTg6InJlcG9ydHNfc3VtX3RhcmdldCI7czo1OiJsYWJlbCI7czoxMjoiVG90YWwgVGFyZ2V0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoyMzoicmVwb3J0c19zdW1fcmVhbGl6YXRpb24iO3M6NToibGFiZWwiO3M6MTc6IlRvdGFsIFJlYWxpemF0aW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoyMzoicmVwb3J0c19hdmdfYWNoaWV2ZW1lbnQiO3M6NToibGFiZWwiO3M6MTk6IkF2ZyBBY2hpZXZlbWVudCAoJSkiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo4O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJjcmVhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJDcmVhdGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fXM6NDA6IjVlNzk2YzI2ZmZmMGE2MzYyMDVjYTllM2RjYjE2MWJhX2NvbHVtbnMiO2E6ODp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjExOiJyZXBvcnRfZGF0ZSI7czo1OiJsYWJlbCI7czoxMToiUmVwb3J0IERhdGUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjE5OiJjbGFzc2lmaWNhdGlvbi5uYW1lIjtzOjU6ImxhYmVsIjtzOjE0OiJDbGFzc2lmaWNhdGlvbiI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6OToidW5pdC5uYW1lIjtzOjU6ImxhYmVsIjtzOjQ6IlVuaXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTozO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjExOiJkZXNjcmlwdGlvbiI7czo1OiJsYWJlbCI7czoxMToiRGVzY3JpcHRpb24iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjY6InRhcmdldCI7czo1OiJsYWJlbCI7czo2OiJUYXJnZXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjExOiJyZWFsaXphdGlvbiI7czo1OiJsYWJlbCI7czoxMToiUmVhbGl6YXRpb24iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo2O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjExOiJhY2hpZXZlbWVudCI7czo1OiJsYWJlbCI7czoxNToiQWNoaWV2ZW1lbnQgKCUpIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxNDoiZXZpZGVuY2VfY291bnQiO3M6NToibGFiZWwiO3M6ODoiRXZpZGVuY2UiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9fX19', 1772444429),
('P5NTFxGNVOUNMbcTFkOUkhsOOzTVCjlXrxeRvtaU', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOFlPdTdNVElPY1hTTnpZTUNXaFA3c1Bmck94aUx1MWNoMUNxNkhpcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772417445),
('xSMHuQqhrccWptYa3f5OPn60qkElR6t7VBkPnGnY', 2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiQXRGaXFPdFhJVkZ6S2syR2l6eUhZblEwNUdzU2RVeW1lT3phSXROZCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vc2lwYWtpLmRldmhpdmVwZGFtLm15LmlkL2FkbWluL3VzZXJzIjtzOjU6InJvdXRlIjtzOjM2OiJmaWxhbWVudC5hZG1pbi5yZXNvdXJjZXMudXNlcnMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjY0OiI4N2M3N2ViZWZjMGRmYjQ2ZTMxMzllMGUyY2Q2N2YxZGU3ODc2ZjU2NGZiNWZkODI1YTdkYTg4Y2RkNmVhNWRkIjtzOjY6InRhYmxlcyI7YToyOntzOjQwOiI1ZTc5NmMyNmZmZjBhNjM2MjA1Y2E5ZTNkY2IxNjFiYV9jb2x1bW5zIjthOjg6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMToicmVwb3J0X2RhdGUiO3M6NToibGFiZWwiO3M6MTE6IlJlcG9ydCBEYXRlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxOToiY2xhc3NpZmljYXRpb24ubmFtZSI7czo1OiJsYWJlbCI7czoxNDoiQ2xhc3NpZmljYXRpb24iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToyO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjk6InVuaXQubmFtZSI7czo1OiJsYWJlbCI7czo0OiJVbml0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMToiZGVzY3JpcHRpb24iO3M6NToibGFiZWwiO3M6MTE6IkRlc2NyaXB0aW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo2OiJ0YXJnZXQiO3M6NToibGFiZWwiO3M6NjoiVGFyZ2V0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMToicmVhbGl6YXRpb24iO3M6NToibGFiZWwiO3M6MTE6IlJlYWxpemF0aW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMToiYWNoaWV2ZW1lbnQiO3M6NToibGFiZWwiO3M6MTU6IkFjaGlldmVtZW50ICglKSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjc7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTQ6ImV2aWRlbmNlX2NvdW50IjtzOjU6ImxhYmVsIjtzOjg6IkV2aWRlbmNlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fX1zOjQwOiI3ZWI4M2QxMmQ1NGU5MzNjODY3YjdlMGRiOTMzNzk3OF9jb2x1bW5zIjthOjk6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJuYW1lIjtzOjU6ImxhYmVsIjtzOjQ6Ik5hbWUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6ImVtYWlsIjtzOjU6ImxhYmVsIjtzOjU6IkVtYWlsIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo3OiJqYWJhdGFuIjtzOjU6ImxhYmVsIjtzOjg6IlBvc2l0aW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo2OiJiYWdpYW4iO3M6NToibGFiZWwiO3M6MTA6IkRlcGFydG1lbnQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEzOiJyZXBvcnRzX2NvdW50IjtzOjU6ImxhYmVsIjtzOjEzOiJUb3RhbCBSZXBvcnRzIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxODoicmVwb3J0c19zdW1fdGFyZ2V0IjtzOjU6ImxhYmVsIjtzOjEyOiJUb3RhbCBUYXJnZXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo2O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjIzOiJyZXBvcnRzX3N1bV9yZWFsaXphdGlvbiI7czo1OiJsYWJlbCI7czoxNzoiVG90YWwgUmVhbGl6YXRpb24iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo3O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjIzOiJyZXBvcnRzX2F2Z19hY2hpZXZlbWVudCI7czo1OiJsYWJlbCI7czoxOToiQXZnIEFjaGlldmVtZW50ICglKSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjg7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IkNyZWF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO319fX0=', 1772453806);

-- --------------------------------------------------------

--
-- Struktur dari tabel `units`
--

CREATE TABLE `units` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'dokumen', '2026-02-19 07:15:42', '2026-02-19 07:15:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bagian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo_profile`, `nik`, `jabatan`, `bagian`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'IRWAN', 'irwan@gmail.com', 'profiles/TsacgqpH3lqUMMWVM2U8uVkw7TSWqkDmQV0GhDBd.png', '16216143', 'STAF PELAKSANA PENGALIRAN DAN JARINGAN', 'DISTRIBUSI', NULL, '$2y$12$lBY4LTURCQVq9oHZ70dT/uOoOYbrJT9dzqEXH8Ipbd4zdb9IgCfZO', 'HxIocQrzNTQkyCLigYXriuM8y45LFObzhV7IcjTihA4yOJn9yB3RWC9SyW3a', '2026-02-19 08:57:35', '2026-02-26 09:23:17'),
(5, 'Irwan', 'irwan123@gmail.com', 'profiles/Iy3ghv7LhehINi6Qqjk1fuKgYyOR7U1X9j7jYogv.png', '16216143', 'STAF PELAKSANA PENGALIRAN DAN JARINGAN', 'DISTRIBUSI', NULL, '$2y$12$DdECKzeX2nrUJuY4GRfvAuIg3PVcU084OgQhUDUIvOB1W0Jlhsmpy', NULL, '2026-02-28 05:25:25', '2026-02-28 05:26:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `evidence`
--
ALTER TABLE `evidence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evidence_report_id_foreign` (`report_id`),
  ADD KEY `evidence_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indeks untuk tabel `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_classification_id_foreign` (`classification_id`),
  ADD KEY `reports_unit_id_foreign` (`unit_id`),
  ADD KEY `reports_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_user_role_id_user_id_unique` (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT untuk tabel `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `evidence`
--
ALTER TABLE `evidence`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `evidence`
--
ALTER TABLE `evidence`
  ADD CONSTRAINT `evidence_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evidence_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_classification_id_foreign` FOREIGN KEY (`classification_id`) REFERENCES `classifications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
