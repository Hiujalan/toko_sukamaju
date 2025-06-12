-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2025 pada 15.12
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sukamaju`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `auth_id` int(11) NOT NULL,
  `auth_idx` varchar(40) NOT NULL,
  `auth_username` varchar(100) NOT NULL,
  `auth_secret` text NOT NULL,
  `auth_access` tinyint(1) NOT NULL,
  `auth_name` varchar(150) DEFAULT NULL,
  `auth_email` varchar(100) DEFAULT NULL,
  `auth_telp` varchar(14) DEFAULT NULL,
  `auth_image` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`auth_id`, `auth_idx`, `auth_username`, `auth_secret`, `auth_access`, `auth_name`, `auth_email`, `auth_telp`, `auth_image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '1', 'admin', '$2y$10$iNNbZmrCQ8mK6uECtcQZZe69RYuvSJIcBBQ2QEw9kCWnuAcq1nIvu', 1, 'admin', 'admin@gmail.com', '089520040070', '684647712e639_download.png', 1, '2025-06-01 12:45:17', '2025-06-09 02:31:13'),
(5, '274f5e17-da30-43f5-9487-4df676bd4c33', 'alan', '$2y$10$DgAxYfuxQnmOgU8TzWpXNu/OZyLQIM8r4Vs8ycd1CoGI1T737ttaC', 2, 'alan', 'alanherva@gmail.com', '089520040070', '684ae984e9298_download.png', 1, '2025-06-12 14:51:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_access`
--

CREATE TABLE `auth_access` (
  `auth_access_id` int(11) NOT NULL,
  `auth_access` varchar(100) NOT NULL,
  `auth_access_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `auth_access`
--

INSERT INTO `auth_access` (`auth_access_id`, `auth_access`, `auth_access_name`) VALUES
(1, 'Admin', 'Admin'),
(2, 'Operator', 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_idx` varchar(40) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_variant` varchar(100) NOT NULL,
  `product_series` varchar(100) NOT NULL,
  `product_price` float NOT NULL,
  `suplier_idx` varchar(40) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_spec` text NOT NULL,
  `product_image` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_idx`, `product_code`, `product_name`, `product_variant`, `product_series`, `product_price`, `suplier_idx`, `product_type`, `product_spec`, `product_image`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 'c1866a21-679c-4b2e-9b5f-b75b9f50689f', 'HPXIAMO878500', 'Redmi Note 11', '6 + 2 Ram 128GB', '5G', 3000000, '55500d3c-16ef-47b4-8848-2627c88b813b', 'Handphone', 'PGZpZ3VyZSBjbGFzcz0idGFibGUiPjx0YWJsZT48dGJvZHk+PHRyPjx0aD5OZXR3b3JrPC90aD48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL25ldHdvcmstYmFuZHMucGhwMyI+VGVjaG5vbG9neTwvYT48L3RkPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20veGlhb21pX3JlZG1pX25vdGVfMTEtMTEzMzYucGhwIyI+R1NNIC8gSFNQQSAvIExURTwvYT48L3RkPjwvdHI+PC90Ym9keT48L3RhYmxlPjwvZmlndXJlPjxmaWd1cmUgY2xhc3M9InRhYmxlIj48dGFibGU+PHRib2R5Pjx0cj48dGQgcm93c3Bhbj0iMiI+TGF1bmNoPC90ZD48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL2dsb3NzYXJ5LnBocDM/dGVybT1waG9uZS1saWZlLWN5Y2xlIj5Bbm5vdW5jZWQ8L2E+PC90ZD48dGQ+MjAyMiwgSmFudWFyeSAyNjwvdGQ+PC90cj48dHI+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS9nbG9zc2FyeS5waHAzP3Rlcm09cGhvbmUtbGlmZS1jeWNsZSI+U3RhdHVzPC9hPjwvdGQ+PHRkPkF2YWlsYWJsZS4gUmVsZWFzZWQgMjAyMiwgRmVicnVhcnkgMDk8L3RkPjwvdHI+PC90Ym9keT48L3RhYmxlPjwvZmlndXJlPjxmaWd1cmUgY2xhc3M9InRhYmxlIj48dGFibGU+PHRib2R5Pjx0cj48dGQgcm93c3Bhbj0iNCI+Qm9keTwvdGQ+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS94aWFvbWlfcmVkbWlfbm90ZV8xMS0xMTMzNi5waHAjIj5EaW1lbnNpb25zPC9hPjwvdGQ+PHRkPjE1OS45IHggNzMuOSB4IDguMSBtbSAoNi4zMCB4IDIuOTEgeCAwLjMyIGluKTwvdGQ+PC90cj48dHI+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS94aWFvbWlfcmVkbWlfbm90ZV8xMS0xMTMzNi5waHAjIj5XZWlnaHQ8L2E+PC90ZD48dGQ+MTc5IGcgKDYuMzEgb3opPC90ZD48L3RyPjx0cj48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL2dsb3NzYXJ5LnBocDM/dGVybT1zaW0iPlNJTTwvYT48L3RkPjx0ZD5OYW5vLVNJTSArIE5hbm8tU0lNPC90ZD48L3RyPjx0cj48dGQ+Jm5ic3A7PC90ZD48dGQ+SVA1MyBkdXN0IHByb3RlY3RlZCBhbmQgd2F0ZXIgcmVzaXN0YW50PGJyPih2ZXJ0aWNhbCB3YXRlciBzcHJheXMpPC90ZD48L3RyPjwvdGJvZHk+PC90YWJsZT48L2ZpZ3VyZT48ZmlndXJlIGNsYXNzPSJ0YWJsZSI+PHRhYmxlPjx0Ym9keT48dHI+PHRkIHJvd3NwYW49IjQiPkRpc3BsYXk8L3RkPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ2xvc3NhcnkucGhwMz90ZXJtPWRpc3BsYXktdHlwZSI+VHlwZTwvYT48L3RkPjx0ZD5BTU9MRUQsIDkwSHosIDcwMCBuaXRzLCAxMDAwIG5pdHMgKHBlYWspPC90ZD48L3RyPjx0cj48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL3hpYW9taV9yZWRtaV9ub3RlXzExLTExMzM2LnBocCMiPlNpemU8L2E+PC90ZD48dGQ+Ni40MyBpbmNoZXMsIDk5LjggY20yICh+ODQuNSUgc2NyZWVuLXRvLWJvZHkgcmF0aW8pPC90ZD48L3RyPjx0cj48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL2dsb3NzYXJ5LnBocDM/dGVybT1yZXNvbHV0aW9uIj5SZXNvbHV0aW9uPC9hPjwvdGQ+PHRkPjEwODAgeCAyNDAwIHBpeGVscywgMjA6OSByYXRpbyAofjQwOSBwcGkgZGVuc2l0eSk8L3RkPjwvdHI+PHRyPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ2xvc3NhcnkucGhwMz90ZXJtPXNjcmVlbi1wcm90ZWN0aW9uIj5Qcm90ZWN0aW9uPC9hPjwvdGQ+PHRkPkNvcm5pbmcgR29yaWxsYSBHbGFzcyAzPC90ZD48L3RyPjwvdGJvZHk+PC90YWJsZT48L2ZpZ3VyZT48ZmlndXJlIGNsYXNzPSJ0YWJsZSI+PHRhYmxlPjx0Ym9keT48dHI+PHRkIHJvd3NwYW49IjQiPlBsYXRmb3JtPC90ZD48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL2dsb3NzYXJ5LnBocDM/dGVybT1vcyI+T1M8L2E+PC90ZD48dGQ+QW5kcm9pZCAxMSwgdXBncmFkYWJsZSB0byBBbmRyb2lkIDEzLCBNSVVJIDE0PC90ZD48L3RyPjx0cj48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL2dsb3NzYXJ5LnBocDM/dGVybT1jaGlwc2V0Ij5DaGlwc2V0PC9hPjwvdGQ+PHRkPlF1YWxjb21tIFNNNjIyNSBTbmFwZHJhZ29uIDY4MCA0RyAoNiBubSk8L3RkPjwvdHI+PHRyPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ2xvc3NhcnkucGhwMz90ZXJtPWNwdSI+Q1BVPC9hPjwvdGQ+PHRkPk9jdGEtY29yZSAoNHgyLjQgR0h6IEtyeW8gMjY1IEdvbGQgJmFtcDsgNHgxLjkgR0h6IEtyeW8gMjY1IFNpbHZlcik8L3RkPjwvdHI+PHRyPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ2xvc3NhcnkucGhwMz90ZXJtPWdwdSI+R1BVPC9hPjwvdGQ+PHRkPkFkcmVubyA2MTA8L3RkPjwvdHI+PC90Ym9keT48L3RhYmxlPjwvZmlndXJlPjxmaWd1cmUgY2xhc3M9InRhYmxlIj48dGFibGU+PHRib2R5Pjx0cj48dGQgcm93c3Bhbj0iMyI+TWVtb3J5PC90ZD48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL2dsb3NzYXJ5LnBocDM/dGVybT1tZW1vcnktY2FyZC1zbG90Ij5DYXJkIHNsb3Q8L2E+PC90ZD48dGQ+bWljcm9TRFhDIChkZWRpY2F0ZWQgc2xvdCk8L3RkPjwvdHI+PHRyPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ2xvc3NhcnkucGhwMz90ZXJtPWR5bmFtaWMtbWVtb3J5Ij5JbnRlcm5hbDwvYT48L3RkPjx0ZD42NEdCIDRHQiBSQU0sIDY0R0IgNkdCIFJBTSwgMTI4R0IgNEdCIFJBTSwgMTI4R0IgNkdCIFJBTTwvdGQ+PC90cj48dHI+PHRkPiZuYnNwOzwvdGQ+PHRkPlVGUyAyLjI8L3RkPjwvdHI+PC90Ym9keT48L3RhYmxlPjwvZmlndXJlPjxmaWd1cmUgY2xhc3M9InRhYmxlIj48dGFibGU+PHRib2R5Pjx0cj48dGQgcm93c3Bhbj0iMyI+TWFpbiBDYW1lcmE8L3RkPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ2xvc3NhcnkucGhwMz90ZXJtPWNhbWVyYSI+UXVhZDwvYT48L3RkPjx0ZD41MCBNUCwgZi8xLjgsIDI2bW0gKHdpZGUpLCAxLzIuNzYiLCAwLjY0wrVtLCBQREFGPGJyPjggTVAsIGYvMi4yLCAxMTjLmiAodWx0cmF3aWRlKSwgMS80LjAiLCAxLjEywrVtPGJyPjIgTVAsIGYvMi40LCAobWFjcm8pPGJyPjIgTVAsIGYvMi40LCAoZGVwdGgpPC90ZD48L3RyPjx0cj48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL2dsb3NzYXJ5LnBocDM/dGVybT1jYW1lcmEiPkZlYXR1cmVzPC9hPjwvdGQ+PHRkPkxFRCBmbGFzaCwgSERSLCBwYW5vcmFtYTwvdGQ+PC90cj48dHI+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS9nbG9zc2FyeS5waHAzP3Rlcm09Y2FtZXJhIj5WaWRlbzwvYT48L3RkPjx0ZD4xMDgwcEAzMGZwczwvdGQ+PC90cj48L3Rib2R5PjwvdGFibGU+PC9maWd1cmU+PGZpZ3VyZSBjbGFzcz0idGFibGUiPjx0YWJsZT48dGJvZHk+PHRyPjx0ZCByb3dzcGFuPSIyIj5TZWxmaWUgY2FtZXJhPC90ZD48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL2dsb3NzYXJ5LnBocDM/dGVybT1zZWNvbmRhcnktY2FtZXJhIj5TaW5nbGU8L2E+PC90ZD48dGQ+MTMgTVAsIGYvMi40LCAod2lkZSksIDEvMy4xIiwgMS4xMsK1bTwvdGQ+PC90cj48dHI+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS9nbG9zc2FyeS5waHAzP3Rlcm09c2Vjb25kYXJ5LWNhbWVyYSI+VmlkZW88L2E+PC90ZD48dGQ+MTA4MHBAMzBmcHM8L3RkPjwvdHI+PC90Ym9keT48L3RhYmxlPjwvZmlndXJlPjxmaWd1cmUgY2xhc3M9InRhYmxlIj48dGFibGU+PHRib2R5Pjx0cj48dGQgcm93c3Bhbj0iMyI+U291bmQ8L3RkPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ2xvc3NhcnkucGhwMz90ZXJtPWxvdWRzcGVha2VyIj5Mb3Vkc3BlYWtlcjwvYT48L3RkPjx0ZD5ZZXMsIHdpdGggc3RlcmVvIHNwZWFrZXJzPC90ZD48L3RyPjx0cj48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL2dsb3NzYXJ5LnBocDM/dGVybT1hdWRpby1qYWNrIj4zLjVtbSBqYWNrPC9hPjwvdGQ+PHRkPlllczwvdGQ+PC90cj48dHI+PHRkPiZuYnNwOzwvdGQ+PHRkPjI0LWJpdC8xOTJrSHogSGktUmVzIGF1ZGlvPC90ZD48L3RyPjwvdGJvZHk+PC90YWJsZT48L2ZpZ3VyZT48ZmlndXJlIGNsYXNzPSJ0YWJsZSI+PHRhYmxlPjx0Ym9keT48dHI+PHRkIHJvd3NwYW49IjciPkNvbW1zPC90ZD48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL2dsb3NzYXJ5LnBocDM/dGVybT13aS1maSI+V0xBTjwvYT48L3RkPjx0ZD5XaS1GaSA4MDIuMTEgYS9iL2cvbi9hYywgZHVhbC1iYW5kLCBXaS1GaSBEaXJlY3Q8L3RkPjwvdHI+PHRyPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ2xvc3NhcnkucGhwMz90ZXJtPWJsdWV0b290aCI+Qmx1ZXRvb3RoPC9hPjwvdGQ+PHRkPjUuMCwgQTJEUCwgTEU8L3RkPjwvdHI+PHRyPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ2xvc3NhcnkucGhwMz90ZXJtPWduc3MiPlBvc2l0aW9uaW5nPC9hPjwvdGQ+PHRkPkdQUywgR0xPTkFTUywgQkRTLCBHQUxJTEVPPC90ZD48L3RyPjx0cj48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL2dsb3NzYXJ5LnBocDM/dGVybT1uZmMiPk5GQzwvYT48L3RkPjx0ZD5ZZXMgKG1hcmtldC9yZWdpb24gZGVwZW5kZW50KTwvdGQ+PC90cj48dHI+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS9nbG9zc2FyeS5waHAzP3Rlcm09aXJkYSI+SW5mcmFyZWQgcG9ydDwvYT48L3RkPjx0ZD5ZZXM8L3RkPjwvdHI+PHRyPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ2xvc3NhcnkucGhwMz90ZXJtPWZtLXJhZGlvIj5SYWRpbzwvYT48L3RkPjx0ZD5GTSByYWRpbzwvdGQ+PC90cj48dHI+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS9nbG9zc2FyeS5waHAzP3Rlcm09dXNiIj5VU0I8L2E+PC90ZD48dGQ+VVNCIFR5cGUtQyAyLjAsIE9URzwvdGQ+PC90cj48L3Rib2R5PjwvdGFibGU+PC9maWd1cmU+PGZpZ3VyZSBjbGFzcz0idGFibGUiPjx0YWJsZT48dGJvZHk+PHRyPjx0ZCByb3dzcGFuPSIyIj5GZWF0dXJlczwvdGQ+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS9nbG9zc2FyeS5waHAzP3Rlcm09c2Vuc29ycyI+U2Vuc29yczwvYT48L3RkPjx0ZD5GaW5nZXJwcmludCAoc2lkZS1tb3VudGVkKSwgYWNjZWxlcm9tZXRlciwgZ3lybywgY29tcGFzczwvdGQ+PC90cj48dHI+PHRkPiZuYnNwOzwvdGQ+PHRkPlZpcnR1YWwgcHJveGltaXR5IHNlbnNpbmc8L3RkPjwvdHI+PC90Ym9keT48L3RhYmxlPjwvZmlndXJlPjxmaWd1cmUgY2xhc3M9InRhYmxlIj48dGFibGU+PHRib2R5Pjx0cj48dGQgcm93c3Bhbj0iMiI+QmF0dGVyeTwvdGQ+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS9nbG9zc2FyeS5waHAzP3Rlcm09cmVjaGFyZ2VhYmxlLWJhdHRlcnktdHlwZXMiPlR5cGU8L2E+PC90ZD48dGQ+TGktUG8gNTAwMCBtQWg8L3RkPjwvdHI+PHRyPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ2xvc3NhcnkucGhwMz90ZXJtPWJhdHRlcnktY2hhcmdpbmciPkNoYXJnaW5nPC9hPjwvdGQ+PHRkPjMzVyB3aXJlZCwgUEQzLjAsIFFDMywgMTAwJSBpbiA2MCBtaW48L3RkPjwvdHI+PC90Ym9keT48L3RhYmxlPjwvZmlndXJlPjxmaWd1cmUgY2xhc3M9InRhYmxlIj48dGFibGU+PHRib2R5Pjx0cj48dGQgcm93c3Bhbj0iNSI+TWlzYzwvdGQ+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS9nbG9zc2FyeS5waHAzP3Rlcm09YnVpbGQiPkNvbG9yczwvYT48L3RkPjx0ZD5HcmFwaGl0ZSBHcmF5LCBUd2lsaWdodCBCbHVlLCBTdGFyIEJsdWU8L3RkPjwvdHI+PHRyPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ2xvc3NhcnkucGhwMz90ZXJtPW1vZGVscyI+TW9kZWxzPC9hPjwvdGQ+PHRkPjIyMDExMTdURywgMjIwMTExN1RJLCAyMjAxMTE3VFksIDIyMDExMTdUTDwvdGQ+PC90cj48dHI+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS9nbG9zc2FyeS5waHAzP3Rlcm09c2FyIj5TQVI8L2E+PC90ZD48dGQ+MC45NyBXL2tnIChoZWFkKSAmbmJzcDsgJm5ic3A7IDAuOTMgVy9rZyAoYm9keSkgJm5ic3A7ICZuYnNwOzwvdGQ+PC90cj48dHI+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS9nbG9zc2FyeS5waHAzP3Rlcm09c2FyIj5TQVIgRVU8L2E+PC90ZD48dGQ+MC42MCBXL2tnIChoZWFkKSAmbmJzcDsgJm5ic3A7IDAuOTkgVy9rZyAoYm9keSkgJm5ic3A7ICZuYnNwOzwvdGQ+PC90cj48dHI+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS9nbG9zc2FyeS5waHAzP3Rlcm09cHJpY2UiPlByaWNlPC9hPjwvdGQ+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS94aWFvbWlfcmVkbWlfbm90ZV8xMS1wcmljZS0xMTMzNi5waHAiPiTigIkxNTcuOTggLyDigqzigIk5NS4wMCAvIMKj4oCJMTEwLjAwIC8g4oK54oCJMTIsOTk5PC9hPjwvdGQ+PC90cj48L3Rib2R5PjwvdGFibGU+PC9maWd1cmU+PGZpZ3VyZSBjbGFzcz0idGFibGUiPjx0YWJsZT48dGJvZHk+PHRyPjx0ZCByb3dzcGFuPSI2Ij5UZXN0czwvdGQ+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS9nbG9zc2FyeS5waHAzP3Rlcm09YmVuY2htYXJraW5nIj5QZXJmb3JtYW5jZTwvYT48L3RkPjx0ZD5BblR1VHU6IDIyODA0NCAodjgpLCAyNDQ1MjYgKHY5KTxicj5HZWVrQmVuY2g6IDE2NjIgKHY1LjEpPGJyPkdGWEJlbmNoOiA2LjhmcHMgKEVTIDMuMSBvbnNjcmVlbik8L3RkPjwvdHI+PHRyPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ3NtYXJlbmFfbGFiX3Rlc3RzLXJldmlldy03NTFwMi5waHAiPkRpc3BsYXk8L2E+PC90ZD48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL3hpYW9taV8xMi1yZXZpZXctMjM5NHAzLnBocCNkdCI+NzM2IG5pdHMgbWF4IGJyaWdodG5lc3MgKG1lYXN1cmVkKTwvYT48L3RkPjwvdHI+PHRyPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ3NtYXJlbmFfbGFiX3Rlc3RzLXJldmlldy03NTFwNS5waHAiPkNhbWVyYTwvYT48L3RkPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vcGljY21wLnBocDM/aWRUeXBlPTQmYW1wO2lkUGhvbmUxPTExMzM2JmFtcDtuU3VnZ2VzdD0xIj5QaG90bzwvYT4gLyA8YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vdmlkY21wLnBocDM/aWRUeXBlPTQmYW1wO2lkUGhvbmUxPTExMzM2JmFtcDtuU3VnZ2VzdD0xIj5WaWRlbzwvYT48L3RkPjwvdHI+PHRyPjx0ZD48YSBocmVmPSJodHRwczovL3d3dy5nc21hcmVuYS5jb20vZ3NtYXJlbmFfbGFiX3Rlc3RzLXJldmlldy03NTFwNy5waHAiPkxvdWRzcGVha2VyPC9hPjwvdGQ+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS94aWFvbWlfMTItcmV2aWV3LTIzOTRwMy5waHAjbHQiPi0yNS44IExVRlMgKFZlcnkgZ29vZCk8L2E+PC90ZD48L3RyPjx0cj48dGQ+PGEgaHJlZj0iaHR0cHM6Ly93d3cuZ3NtYXJlbmEuY29tL2dzbWFyZW5hX2xhYl90ZXN0cy1yZXZpZXctNzUxcDYucGhwIj5CYXR0ZXJ5IChvbGQpPC9hPjwvdGQ+PHRkPjxhIGhyZWY9Imh0dHBzOi8vd3d3LmdzbWFyZW5hLmNvbS94aWFvbWlfcmVkbWlfbm90ZV8xMS0xMTMzNi5waHAjIj5FbmR1cmFuY2UgcmF0aW5nIDEyNmg8L2E+PC90ZD48L3RyPjx0cj48dGQ+Jm5ic3A7PC90ZD48dGQ+Jm5ic3A7PC90ZD48L3RyPjwvdGJvZHk+PC90YWJsZT48L2ZpZ3VyZT48cD48c3Ryb25nPkRpc2NsYWltZXIuPC9zdHJvbmc+IFdlIGNhbiBub3QgZ3VhcmFudGVlIHRoYXQgdGhlIGluZm9ybWF0aW9uIG9uIHRoaXMgcGFnZSBpcyAxMDAlIGNvcnJlY3QuPC9wPg==', '6845934400929_xiaomi-redmi-note-11-global.jpg', 1, '2025-06-08 13:41:24', '2025-06-08 13:42:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(11) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_code` varchar(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type`, `product_code`, `created_at`, `updated_at`) VALUES
(2, 'Tablet', 'TAB', '2025-06-07 11:29:58', NULL),
(3, 'Handphone', 'HP', '2025-06-07 11:30:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `suplier_id` int(11) NOT NULL,
  `suplier_idx` varchar(40) NOT NULL,
  `suplier_code` varchar(10) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_telp` varchar(14) NOT NULL,
  `suplier_email` varchar(100) NOT NULL,
  `suplier_brand` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`suplier_id`, `suplier_idx`, `suplier_code`, `suplier_name`, `suplier_telp`, `suplier_email`, `suplier_brand`, `is_active`, `created_at`, `updated_at`) VALUES
(2, '55500d3c-16ef-47b4-8848-2627c88b813b', 'XIAMO', 'Alan Herva', '089520040070', 'alanherva@gmail.com', 'Xiamo', 1, '2025-06-06 15:29:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_idx` varchar(40) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_price` float NOT NULL,
  `transaction_qty` int(3) NOT NULL,
  `transaction_tax` float DEFAULT NULL,
  `transaction_net_price` float DEFAULT NULL,
  `transaction_employees` varchar(40) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `transaction_idx`, `transaction_date`, `transaction_price`, `transaction_qty`, `transaction_tax`, `transaction_net_price`, `transaction_employees`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'f5e25d63-3a71-45c2-8885-dcf75f5afa35', '2025-06-12 14:54:57', 3000000, 1, NULL, NULL, '274f5e17-da30-43f5-9487-4df676bd4c33', 1, '2025-06-12 14:54:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_product`
--

CREATE TABLE `transaction_product` (
  `transaction_product_id` int(11) NOT NULL,
  `transaction_idx` varchar(40) NOT NULL,
  `product_idx` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction_product`
--

INSERT INTO `transaction_product` (`transaction_product_id`, `transaction_idx`, `product_idx`) VALUES
(3, 'f5e25d63-3a71-45c2-8885-dcf75f5afa35', 'c1866a21-679c-4b2e-9b5f-b75b9f50689f');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indeks untuk tabel `auth_access`
--
ALTER TABLE `auth_access`
  ADD PRIMARY KEY (`auth_access_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indeks untuk tabel `transaction_product`
--
ALTER TABLE `transaction_product`
  ADD PRIMARY KEY (`transaction_product_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `auth_access`
--
ALTER TABLE `auth_access`
  MODIFY `auth_access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaction_product`
--
ALTER TABLE `transaction_product`
  MODIFY `transaction_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
