-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 09:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_26_093303_create_tbl_admin_table', 2),
(5, '2024_10_27_045413_create_tbl_category_product', 3),
(6, '2024_10_28_025941_create_tbl_brand_product', 4),
(7, '2024_10_28_135925_create_tbl_product', 5),
(8, '2024_11_10_061621_tbl_customers', 6),
(10, '2024_11_10_071613_tbl_hoadon', 7),
(11, '2024_11_11_144259_tbl_tratien', 7),
(12, '2024_11_11_144342_tbl_dathang', 7),
(13, '2024_11_11_144422_tbl_chitietdathang', 7),
(14, '2024_11_12_132908_tbl_cart_temp', 8),
(15, '2024_11_21_092808_tbl_rating', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4deHtPsiEE70HeT0w87zT4PACG4rGo0rblFZu5Vz', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo5OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo2NjoiaHR0cDovL2xvY2FsaG9zdC91bml0b3BwcHAvdHJhaW5pbmcvaG9jbGFyYXZlbC9zdGFmZi1lZGl0LW9yZGVyLzc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6Ikc1VkJMTElkM1hMcmhROTZYblNSSnI1UGYxdXg5amNyMTJUcjl3aGEiO3M6MTE6ImN1c3RvbWVyX2lkIjtpOjg7czoxMzoiY3VzdG9tZXJfbmFtZSI7czoxMToiTmjDom4gdmnDqm4iO3M6ODoibWFfcXV5ZW4iO2k6MztzOjQ6ImNhcnQiO2E6MDp7fXM6OToiaG9hZG9uX2lkIjtpOjM2O3M6MTA6ImRhdGhhbmdfaWQiO2k6NzY7fQ==', 1734854427);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_name`, `admin_password`, `admin_email`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'Tạ Kim Hương', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', '0327859534', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(4, 'Brazil', 'Đây là một nơi thuộc Châu Mỹ', 0, NULL, NULL),
(5, 'Trung Quốc', 'tt', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_temp`
--

CREATE TABLE `tbl_cart_temp` (
  `cart_temp_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(4, 'Phụ kiện vệ sinh', 'Dùng để vệ sinh cho các loại cún cưng', 0, NULL, NULL),
(6, 'Các loại cún cưng', 'Danh sách các cún cưng được bán tại cửa hàng', 0, NULL, NULL),
(8, 'Thức ăn', 'Thức ăn cho thú cưng', 0, NULL, NULL),
(14, 'Phụ kiện di chuyển', 'Dây dắt chó: Có thể là dây cố định hoặc dây kéo tự động, giúp kiểm soát chó khi ra ngoài.\r\nVòng cổ hoặc dây đeo ngực: Gắn kèm thẻ tên hoặc thông tin liên lạc trong trường hợp chó bị lạc.\r\nBa lô hoặc túi vận chuyển: Đặc biệt hữu ích khi cần di chuyển xa, như đi du lịch hoặc đến bác sĩ thú y.', 0, NULL, NULL),
(15, 'Phụ kiện sức khỏe', 'Bàn chải và kem đánh răng dành cho chó: Giữ vệ sinh răng miệng, ngăn ngừa mảng bám.\r\nThuốc trị bọ chét và ve: Đảm bảo chó không bị ký sinh trùng tấn công.\r\nBộ sơ cứu cơ bản: Chuẩn bị bông gạc, dung dịch sát trùng và các vật dụng y tế cần thiết.', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietdathang`
--

CREATE TABLE `tbl_chitietdathang` (
  `chitietdathang_id` int(10) UNSIGNED NOT NULL,
  `dathang_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(50) NOT NULL,
  `so_luong_san_pham` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_chitietdathang`
--

INSERT INTO `tbl_chitietdathang` (`chitietdathang_id`, `dathang_id`, `product_id`, `product_name`, `product_price`, `so_luong_san_pham`, `created_at`, `updated_at`) VALUES
(69, 62, 20, 'Cát vệ sinh', 100000, 5, NULL, NULL),
(85, 71, 10, 'Chó Husky', 9000000, 1, NULL, NULL),
(86, 71, 50, 'CHÓ BẮC HÀ', 7500000, 1, NULL, NULL),
(87, 71, 51, 'CHÓ COCKER', 6000000, 1, NULL, NULL),
(88, 71, 38, 'BÁNH THƯỞNG CHO CHÓ BÁNH COOKIE MINIBALL BOWBOW 150G', 80000, 2, NULL, NULL),
(89, 71, 40, 'BÁNH THƯỞNG CHO CHÓ THỊT CUỘN KHOAI LANG NATURAL CORE', 85000, 1, NULL, NULL),
(90, 71, 47, 'GĂNG TAY KHỬ MÙI HÔI CHO CHÓ MÈO WEI LIAN PADDY', 30000, 1, NULL, NULL),
(97, 73, 49, 'CHÓ PHÚ QUỐC', 5000000, 1, NULL, NULL),
(98, 73, 36, 'LỒNG VẬN CHUYỂN HÀNG KHÔNG CHÓ MÈO JET VALI', 375000, 1, NULL, NULL),
(99, 73, 41, 'HẠT CHO CHÓ EQUILIBRIO BỔ SUNG DINH DƯỠNG', 345000, 1, NULL, NULL),
(100, 74, 12, 'CHÓ SHIBA', 6000000, 3, NULL, NULL),
(101, 75, 11, 'CHÓ BULLDOG', 8000000, 1, NULL, NULL),
(102, 76, 30, 'VITAMIN TỔNG HỢP SPIRIT', 150000, 2, NULL, NULL),
(103, 76, 23, 'XỊT NẤM, GHẺ, RẬN ALKIN 50ML', 120000, 2, NULL, NULL),
(104, 76, 32, 'NHỎ MẮT ALKIN OMNIX CHO CHÓ', 105000, 1, NULL, NULL),
(105, 76, 33, 'VÒNG CỔ GIẢM STRESS CHO CHÓ', 232000, 2, NULL, NULL),
(106, 76, 36, 'LỒNG VẬN CHUYỂN HÀNG KHÔNG CHÓ MÈO JET VALI', 375000, 2, NULL, NULL),
(107, 76, 35, 'CHUỐNG CHÓ MÈO VẬN CHUYỂN HÀNG KHÔNG PADDY', 320000, 2, NULL, NULL),
(108, 76, 43, 'HẠT CHO CHÓ TRƯỞNG THÀNH SMARTHEART GOLD CAO CẤP VỊ CỪU VÀ GẠO', 100000, 5, NULL, NULL),
(109, 76, 41, 'HẠT CHO CHÓ EQUILIBRIO BỔ SUNG DINH DƯỠNG', 345000, 1, NULL, NULL),
(110, 76, 14, 'CHÓ PITBULL', 9000000, 1, NULL, NULL),
(111, 76, 25, 'CÂY LĂN LÔNG CHÓ MÈO DẠNG KEO SIÊU DÍNH PADDY', 40000, 1, NULL, NULL),
(112, 76, 21, 'KỀM CẮT MÓNG TAY CHO CHÓ MÈO SIÊU CUTE DỄ THƯƠNG', 45000, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_name_login` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `ma_quyen` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_name_login`, `customer_password`, `customer_phone`, `ma_quyen`, `created_at`, `updated_at`) VALUES
(8, 'Nhân viên', 'huongtk.23itb@vku.udn.vn', 'staff', 'e10adc3949ba59abbe56e057f20f883e', '0877128454', 3, NULL, NULL),
(9, 'Thùy Linh', 'nguoiyeutung2707@gmail.com.vn', 'linhh', '892da3d819056410c05bca7747d22735', '0327859534', 2, NULL, NULL),
(10, 'Quản trị viên', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '0235454674', 1, NULL, NULL),
(13, 'Nguyễn Thị Diễm Quỳnh', 'huongtk.23itb@vku.udn.vn', 'quynh', 'ae1b00fe93502e9cd47a01d86514a976', '0877128454', 2, NULL, NULL),
(14, 'Nguyễn Thị Thu Huyền', 'huongtk.23itb@vku.udn.vn', 'huyen', 'd856125d827ac297307baf299a8ee1f1', '0877128454', 2, NULL, NULL),
(15, 'Ngọc Huyền', 'huongtk.23itb@vku.udn.vn', 'ngochuyen', '1fa8efd096656998737cde7f5575b1c4', '0877128454', 2, NULL, NULL),
(16, 'vcvv', 'admin@gmail.com', 'vcvcv', '26ea8c14d2273c837bdbe91c17023754', '0877128454', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dathang`
--

CREATE TABLE `tbl_dathang` (
  `dathang_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `hoadon_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `tong_tien` int(50) NOT NULL,
  `dathang_status` varchar(50) NOT NULL,
  `ngay_dat` timestamp NULL DEFAULT NULL,
  `ngay_duyet` timestamp NULL DEFAULT NULL,
  `ma_quyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_dathang`
--

INSERT INTO `tbl_dathang` (`dathang_id`, `customer_id`, `hoadon_id`, `payment_id`, `tong_tien`, `dathang_status`, `ngay_dat`, `ngay_duyet`, `ma_quyen`) VALUES
(62, 8, 26, 63, 500000, 'Đã duyệt đơn hàng', '2024-12-19 21:01:29', '2024-12-22 00:27:29', 1),
(71, 13, 32, 72, 22775000, 'Đã duyệt đơn hàng', '2024-12-21 22:21:24', '2024-12-21 23:55:23', 3),
(73, 15, 34, 74, 5720000, 'Đã duyệt đơn hàng', '2024-12-21 23:18:46', '2024-12-21 23:53:00', 1),
(74, 13, 35, 75, 18000000, 'Đã duyệt đơn hàng', '2024-12-22 00:25:28', '2024-12-22 00:58:06', 3),
(75, 10, 35, 76, 8000000, 'Đã duyệt đơn hàng', '2024-12-22 00:43:07', '2024-12-22 00:59:55', 3),
(76, 13, 36, 77, 12474000, 'Đã duyệt đơn hàng', '2024-12-22 00:56:58', '2024-12-22 00:59:22', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hoandon`
--

CREATE TABLE `tbl_hoandon` (
  `hoadon_id` int(10) UNSIGNED NOT NULL,
  `hoadon_name` varchar(255) NOT NULL,
  `hoadon_address` varchar(255) NOT NULL,
  `hoadon_phone` varchar(255) NOT NULL,
  `hoadon_email` varchar(255) NOT NULL,
  `hoadon_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_hoandon`
--

INSERT INTO `tbl_hoandon` (`hoadon_id`, `hoadon_name`, `hoadon_address`, `hoadon_phone`, `hoadon_email`, `hoadon_note`, `created_at`, `updated_at`) VALUES
(24, 'Tạ Kim Hương', 'Hai Thai, Gio Linh, Quang Tri', '0327859534', 'huongtk.23itb@vku.udn.vn', 'nhìu tiền quá', NULL, NULL),
(25, 'Tạ Kim Hương', 'Ngũ Hành Sơn, Đà Nẵng', '0327859534', 'huongtk.23itb@vku.udn.vn', 'dkjfkw', NULL, NULL),
(26, 'Thùy Linh', 'Hai Thai, Gio Linh, Quang Tri', '0327859534', 'huongtk.23itb@vku.udn.vn', 'Hương', NULL, NULL),
(27, 'diễm quỳnh', 'trường VKU', '0327859534', 'huongtk.23itb@vku.udn.vn', 'jdhj', NULL, NULL),
(28, 'Ta Thi Thuy Linh', 'trường VKU', '0374265879', 'huongtk.23itb@vku.udn.vn', 'hghgj', NULL, NULL),
(29, 'Tạ Thị Thùy Linh', 'Quảng Trị', '0327859534', 'huongtk.23itb@vku.udn.vn', 'hjkhk', NULL, NULL),
(30, 'Nguyễn Thị Thu Huyền', 'Gio Linh, Quảng Trị', '0327859534', 'huongtk.23itb@vku.udn.vn', 'Note', NULL, NULL),
(31, 'Tạ Kim Hương', 'Gio Linh, Quảng Trị', '0327859534', 'huongtk.23itb@vku.udn.vn', 'bvb', NULL, NULL),
(32, 'Tạ Thị Thùy Linh', 'Gio Linh, Quảng Trị', '0374265879', 'huongtk.23itb@vku.udn.vn', 'Thùy Linh', NULL, NULL),
(33, 'Ngọc Huyền', 'Quảng Trị', '0327859534', 'huongtk.23itb@vku.udn.vn', 'hgjhgj', NULL, NULL),
(34, 'Tạ Kim Hương', 'Gio Linh, Quảng Trị', '0327859534', 'huongtk.23itb@vku.udn.vn', 'bfbff', NULL, NULL),
(35, 'Tạ Kim Hương', 'Ngũ Hành Sơn, Đà Nẵng', '0374265879', 'huongtk.23itb@vku.udn.vn', '.,.', NULL, NULL),
(36, 'Tạ Kim Hương', 'Gio Linh, Quảng Trị', '0327859534', 'huongtk.23itb@vku.udn.vn', 'sản phẩm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_magiamgia`
--

CREATE TABLE `tbl_magiamgia` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(100) NOT NULL,
  `coupon_time` int(50) NOT NULL,
  `coupon_condition` int(11) NOT NULL,
  `coupon_number` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_magiamgia`
--

INSERT INTO `tbl_magiamgia` (`coupon_id`, `coupon_name`, `coupon_time`, `coupon_condition`, `coupon_number`, `coupon_code`) VALUES
(2, 'Giảm ngày 11/11', 50, 1, 10, 'C11'),
(4, 'Giảm ngày 11/11', 9, 2, 10000, 'A1'),
(5, 'Giảm 50%', 10, 1, 50, '50%');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phanquyen`
--

CREATE TABLE `tbl_phanquyen` (
  `ma_quyen` int(11) NOT NULL,
  `ten_quyen` varchar(100) NOT NULL,
  `chi_tiet_ten_quyen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_phanquyen`
--

INSERT INTO `tbl_phanquyen` (`ma_quyen`, `ten_quyen`, `chi_tiet_ten_quyen`) VALUES
(1, 'Admin', 'Quản trị viên'),
(2, 'Customer', 'Khách hàng'),
(3, 'Staff', 'Nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_content` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_feature` varchar(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_name`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `product_feature`, `created_at`, `updated_at`) VALUES
(10, 6, 'CHÓ HUSKY', '<p><img alt=\"Cách nuôi chó Husky con và trưởng thành chi tiết từ A-Z\" src=\"https://huanluyenchohungcuong.vn/wp-content/uploads/2022/05/cach-nuoi-cho-husky.jpg\" /></p>\r\n\r\n<p><strong>Ch&oacute; Husky &ndash; Sự lựa chọn d&agrave;nh cho người y&ecirc;u th&iacute;ch động vật năng động</strong></p>\r\n\r\n<p>Ch&oacute; Husky l&agrave; giống ch&oacute; nổi tiếng với vẻ ngo&agrave;i đẹp mắt, thường được v&iacute; như &ldquo;ch&oacute; s&oacute;i tuyết&rdquo; nhờ bộ l&ocirc;ng d&agrave;y hai lớp mềm mượt, đ&ocirc;i tai dựng đứng, v&agrave; &aacute;nh mắt cuốn h&uacute;t (c&oacute; thể l&agrave; m&agrave;u xanh, n&acirc;u hoặc hai m&agrave;u độc đ&aacute;o). Đ&acirc;y l&agrave; giống ch&oacute; k&eacute;o xe c&oacute; nguồn gốc từ Siberia, Nga, được biết đến với sức bền, tốc độ v&agrave; khả năng chịu lạnh tốt.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Husky rất th&acirc;n thiện, h&ograve;a đồng, v&agrave; th&ocirc;ng minh. Ch&uacute;ng y&ecirc;u th&iacute;ch vận động, chơi đ&ugrave;a v&agrave; c&oacute; bản t&iacute;nh trung th&agrave;nh. Tuy nhi&ecirc;n, Husky kh&aacute; bướng bỉnh, độc lập v&agrave; cần được huấn luyện nghi&ecirc;m t&uacute;c từ nhỏ.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Husky ph&ugrave; hợp với những người y&ecirc;u th&iacute;ch sự năng động, c&oacute; nhiều thời gian để chơi v&agrave; tập luyện c&ugrave;ng ch&uacute;ng. Nếu bạn sống trong kh&ocirc;ng gian rộng r&atilde;i v&agrave; y&ecirc;u th&iacute;ch c&aacute;c hoạt động ngo&agrave;i trời, Husky sẽ l&agrave; người bạn đồng h&agrave;nh tuyệt vời.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>: Husky cần chế độ chăm s&oacute;c đặc biệt như:</p>\r\n\r\n<ol>\r\n	<li><strong>Kh&ocirc;ng gian</strong>: Ch&uacute;ng kh&ocirc;ng th&iacute;ch hợp với kh&ocirc;ng gian nhỏ hoặc việc bị nhốt l&acirc;u.</li>\r\n	<li><strong>Vận động</strong>: Husky cần tập luyện h&agrave;ng ng&agrave;y để giải tỏa năng lượng, tr&aacute;nh t&igrave;nh trạng ph&aacute; ph&aacute;ch.</li>\r\n	<li><strong>Chăm s&oacute;c l&ocirc;ng</strong>: Bộ l&ocirc;ng d&agrave;y rụng nhiều n&ecirc;n cần chải thường xuy&ecirc;n.</li>\r\n	<li><strong>Dinh dưỡng</strong>: Chế độ ăn cần gi&agrave;u protein v&agrave; chất dinh dưỡng để giữ sức khỏe.</li>\r\n</ol>', '<p><img alt=\"Cẩm nang chó Husky: Nguồn gốc, đặc điểm, cách nuôi, giá bán\" src=\"https://cdn.tgdd.vn/Files/2021/04/16/1343917/tim-hieu-ve-giong-cho-husky-nguon-goc-dac-diem-cach-nuoi-bang-gia-202104161558421820.jpg\" />&nbsp;</p>\r\n\r\n<p><strong>Ch&oacute; Husky &ndash; Sự lựa chọn d&agrave;nh cho người y&ecirc;u th&iacute;ch động vật năng động</strong></p>\r\n\r\n<p>Ch&oacute; Husky l&agrave; giống ch&oacute; nổi tiếng với vẻ ngo&agrave;i đẹp mắt, thường được v&iacute; như &ldquo;ch&oacute; s&oacute;i tuyết&rdquo; nhờ bộ l&ocirc;ng d&agrave;y hai lớp mềm mượt, đ&ocirc;i tai dựng đứng, v&agrave; &aacute;nh mắt cuốn h&uacute;t (c&oacute; thể l&agrave; m&agrave;u xanh, n&acirc;u hoặc hai m&agrave;u độc đ&aacute;o). Đ&acirc;y l&agrave; giống ch&oacute; k&eacute;o xe c&oacute; nguồn gốc từ Siberia, Nga, được biết đến với sức bền, tốc độ v&agrave; khả năng chịu lạnh tốt.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Husky rất th&acirc;n thiện, h&ograve;a đồng, v&agrave; th&ocirc;ng minh. Ch&uacute;ng y&ecirc;u th&iacute;ch vận động, chơi đ&ugrave;a v&agrave; c&oacute; bản t&iacute;nh trung th&agrave;nh. Tuy nhi&ecirc;n, Husky kh&aacute; bướng bỉnh, độc lập v&agrave; cần được huấn luyện nghi&ecirc;m t&uacute;c từ nhỏ.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Husky ph&ugrave; hợp với những người y&ecirc;u th&iacute;ch sự năng động, c&oacute; nhiều thời gian để chơi v&agrave; tập luyện c&ugrave;ng ch&uacute;ng. Nếu bạn sống trong kh&ocirc;ng gian rộng r&atilde;i v&agrave; y&ecirc;u th&iacute;ch c&aacute;c hoạt động ngo&agrave;i trời, Husky sẽ l&agrave; người bạn đồng h&agrave;nh tuyệt vời.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>: Husky cần chế độ chăm s&oacute;c đặc biệt như:</p>\r\n\r\n<ol>\r\n	<li><strong>Kh&ocirc;ng gian</strong>: Ch&uacute;ng kh&ocirc;ng th&iacute;ch hợp với kh&ocirc;ng gian nhỏ hoặc việc bị nhốt l&acirc;u.</li>\r\n	<li><strong>Vận động</strong>: Husky cần tập luyện h&agrave;ng ng&agrave;y để giải tỏa năng lượng, tr&aacute;nh t&igrave;nh trạng ph&aacute; ph&aacute;ch.</li>\r\n	<li><strong>Chăm s&oacute;c l&ocirc;ng</strong>: Bộ l&ocirc;ng d&agrave;y rụng nhiều n&ecirc;n cần chải thường xuy&ecirc;n.</li>\r\n	<li><strong>Dinh dưỡng</strong>: Chế độ ăn cần gi&agrave;u protein v&agrave; chất dinh dưỡng để giữ sức khỏe.</li>\r\n</ol>', 9000000, 'cho-husky-43.jpg', 0, NULL, NULL, NULL),
(11, 6, 'CHÓ BULLDOG', '<p><img alt=\"Chó Bull Pháp - Pet House - Cửa hàng thú cưng và phụ kiện\" src=\"https://pethouse.com.vn/wp-content/uploads/2022/12/anh-cho-bull-phap-101020220.jpg\" style=\"height:577px; width:700px\" /></p>\r\n\r\n<p><strong>Ch&oacute; Bulldog &ndash; Người bạn đ&aacute;ng y&ecirc;u với t&iacute;nh c&aacute;ch điềm tĩnh</strong></p>\r\n\r\n<p>Ch&oacute; Bulldog l&agrave; giống ch&oacute; nổi bật với vẻ ngo&agrave;i đặc trưng: th&acirc;n h&igrave;nh chắc khỏe, đầu lớn, mặt nhăn nheo, v&agrave; chiếc mũi ngắn xinh xắn. Nguồn gốc của ch&uacute;ng l&agrave; từ Anh Quốc, nơi ch&uacute;ng từng được nu&ocirc;i để tham gia c&aacute;c cuộc đấu b&ograve;, nhưng ng&agrave;y nay, ch&uacute;ng đ&atilde; trở th&agrave;nh th&uacute; cưng th&acirc;n thiện v&agrave; dễ thương trong gia đ&igrave;nh.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Bulldog rất điềm tĩnh, trung th&agrave;nh, v&agrave; gi&agrave;u t&igrave;nh cảm. Ch&uacute;ng h&ograve;a đồng với trẻ em v&agrave; c&aacute;c vật nu&ocirc;i kh&aacute;c, l&agrave; người bạn l&yacute; tưởng cho những gia đ&igrave;nh cần một ch&uacute; ch&oacute; đ&aacute;ng tin cậy. Tuy nhi&ecirc;n, Bulldog cũng kh&aacute; bướng bỉnh, v&igrave; vậy cần sự ki&ecirc;n nhẫn khi huấn luyện.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Bulldog ph&ugrave; hợp với những người sống trong kh&ocirc;ng gian nhỏ như căn hộ hoặc nh&agrave; phố, v&igrave; ch&uacute;ng kh&ocirc;ng cần vận động qu&aacute; nhiều. Đ&acirc;y l&agrave; giống ch&oacute; l&yacute; tưởng cho những ai th&iacute;ch cuộc sống y&ecirc;n tĩnh nhưng vẫn muốn c&oacute; một người bạn trung th&agrave;nh.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>: Bulldog cần được chăm s&oacute;c đặc biệt do một số đặc điểm cơ thể:</p>\r\n\r\n<ol>\r\n	<li><strong>Thể trạng</strong>: Bulldog nhạy cảm với nhiệt độ cao v&agrave; dễ bị sốc nhiệt, cần giữ ch&uacute;ng trong m&ocirc;i trường m&aacute;t mẻ.</li>\r\n	<li><strong>Vận động</strong>: D&ugrave; kh&ocirc;ng cần tập luyện nhiều, ch&uacute;ng vẫn cần những buổi đi dạo nhẹ nh&agrave;ng để giữ sức khỏe.</li>\r\n	<li><strong>Chăm s&oacute;c sức khỏe</strong>: V&igrave; mũi ngắn, ch&uacute;ng dễ gặp vấn đề về h&ocirc; hấp. Ngo&agrave;i ra, cần vệ sinh nếp nhăn tr&ecirc;n mặt thường xuy&ecirc;n để tr&aacute;nh nhiễm tr&ugrave;ng.</li>\r\n	<li><strong>Dinh dưỡng</strong>: Bulldog dễ tăng c&acirc;n n&ecirc;n cần chế độ ăn kiểm so&aacute;t để tr&aacute;nh b&eacute;o ph&igrave;.</li>\r\n</ol>', '<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Nguồn gốc của chó Bull\" src=\"https://cdn.tgdd.vn/Files/2021/04/17/1344019/tim-hieu-ve-giong-cho-bull-nguon-goc-dac-diem-cach-nuoi-bang-gia-202202141135485075.jpg\" /></p>\r\n\r\n<p><strong>Ch&oacute; Bulldog &ndash; Người bạn đ&aacute;ng y&ecirc;u với t&iacute;nh c&aacute;ch điềm tĩnh</strong></p>\r\n\r\n<p>Ch&oacute; Bulldog l&agrave; giống ch&oacute; nổi bật với vẻ ngo&agrave;i đặc trưng: th&acirc;n h&igrave;nh chắc khỏe, đầu lớn, mặt nhăn nheo, v&agrave; chiếc mũi ngắn xinh xắn. Nguồn gốc của ch&uacute;ng l&agrave; từ Anh Quốc, nơi ch&uacute;ng từng được nu&ocirc;i để tham gia c&aacute;c cuộc đấu b&ograve;, nhưng ng&agrave;y nay, ch&uacute;ng đ&atilde; trở th&agrave;nh th&uacute; cưng th&acirc;n thiện v&agrave; dễ thương trong gia đ&igrave;nh.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Bulldog rất điềm tĩnh, trung th&agrave;nh, v&agrave; gi&agrave;u t&igrave;nh cảm. Ch&uacute;ng h&ograve;a đồng với trẻ em v&agrave; c&aacute;c vật nu&ocirc;i kh&aacute;c, l&agrave; người bạn l&yacute; tưởng cho những gia đ&igrave;nh cần một ch&uacute; ch&oacute; đ&aacute;ng tin cậy. Tuy nhi&ecirc;n, Bulldog cũng kh&aacute; bướng bỉnh, v&igrave; vậy cần sự ki&ecirc;n nhẫn khi huấn luyện.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Bulldog ph&ugrave; hợp với những người sống trong kh&ocirc;ng gian nhỏ như căn hộ hoặc nh&agrave; phố, v&igrave; ch&uacute;ng kh&ocirc;ng cần vận động qu&aacute; nhiều. Đ&acirc;y l&agrave; giống ch&oacute; l&yacute; tưởng cho những ai th&iacute;ch cuộc sống y&ecirc;n tĩnh nhưng vẫn muốn c&oacute; một người bạn trung th&agrave;nh.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>: Bulldog cần được chăm s&oacute;c đặc biệt do một số đặc điểm cơ thể:</p>\r\n\r\n<ol>\r\n	<li><strong>Thể trạng</strong>: Bulldog nhạy cảm với nhiệt độ cao v&agrave; dễ bị sốc nhiệt, cần giữ ch&uacute;ng trong m&ocirc;i trường m&aacute;t mẻ.</li>\r\n	<li><strong>Vận động</strong>: D&ugrave; kh&ocirc;ng cần tập luyện nhiều, ch&uacute;ng vẫn cần những buổi đi dạo nhẹ nh&agrave;ng để giữ sức khỏe.</li>\r\n	<li><strong>Chăm s&oacute;c sức khỏe</strong>: V&igrave; mũi ngắn, ch&uacute;ng dễ gặp vấn đề về h&ocirc; hấp. Ngo&agrave;i ra, cần vệ sinh nếp nhăn tr&ecirc;n mặt thường xuy&ecirc;n để tr&aacute;nh nhiễm tr&ugrave;ng.</li>\r\n	<li><strong>Dinh dưỡng</strong>: Bulldog dễ tăng c&acirc;n n&ecirc;n cần chế độ ăn kiểm so&aacute;t để tr&aacute;nh b&eacute;o ph&igrave;.</li>\r\n</ol>', 8000000, 'bulldog56.jpg', 0, NULL, NULL, NULL),
(12, 6, 'CHÓ SHIBA', '<p><img alt=\"Cẩm nang chó Shiba: Nguồn gốc, đặc điểm, cách nuôi, giá bán\" src=\"https://cdn.tgdd.vn/Files/2021/04/16/1343844/tim-hieu-ve-giong-cho-shiba-nguon-goc-dac-diem-cach-nuoi-bang-gia-202203281503364263.jpg\" /></p>\r\n\r\n<p><strong>Ch&oacute; Shiba Inu &ndash; Người bạn nhỏ th&ocirc;ng minh v&agrave; độc lập</strong></p>\r\n\r\n<p>Ch&oacute; Shiba Inu l&agrave; giống ch&oacute; nổi tiếng từ Nhật Bản, được xem l&agrave; một trong những biểu tượng quốc gia của đất nước n&agrave;y. Với v&oacute;c d&aacute;ng nhỏ gọn, bộ l&ocirc;ng d&agrave;y mềm mại, v&agrave; đ&ocirc;i tai dựng, Shiba Inu c&oacute; vẻ ngo&agrave;i dễ thương nhưng lại to&aacute;t l&ecirc;n sự lanh lợi v&agrave; tinh tế.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Shiba Inu th&ocirc;ng minh, độc lập, v&agrave; rất cảnh gi&aacute;c. Ch&uacute;ng thường trung th&agrave;nh với chủ nhưng c&oacute; xu hướng d&egrave; dặt với người lạ. Đ&acirc;y l&agrave; giống ch&oacute; năng động, th&iacute;ch kh&aacute;m ph&aacute; v&agrave; kh&aacute; bướng bỉnh, n&ecirc;n cần huấn luyện từ nhỏ để kiểm so&aacute;t h&agrave;nh vi.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Shiba Inu ph&ugrave; hợp với người sống trong cả kh&ocirc;ng gian nhỏ (như căn hộ) hoặc rộng (như nh&agrave; c&oacute; s&acirc;n vườn), miễn l&agrave; được tập luyện v&agrave; vận động đầy đủ. Ch&uacute;ng th&iacute;ch hợp cho những người năng động, y&ecirc;u th&iacute;ch sự th&ocirc;ng minh v&agrave; c&aacute; t&iacute;nh độc lập của ch&oacute;.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Vận động</strong>: Shiba Inu c&oacute; nhiều năng lượng v&agrave; cần được đi dạo, chơi đ&ugrave;a h&agrave;ng ng&agrave;y để giải tỏa năng lượng.</li>\r\n	<li><strong>Huấn luyện</strong>: V&igrave; t&iacute;nh c&aacute;ch độc lập v&agrave; bướng bỉnh, Shiba cần sự ki&ecirc;n nhẫn v&agrave; kỷ luật trong huấn luyện, đặc biệt khi c&ograve;n nhỏ.</li>\r\n	<li><strong>Chăm s&oacute;c l&ocirc;ng</strong>: Bộ l&ocirc;ng Shiba rụng theo m&ugrave;a, cần chải l&ocirc;ng thường xuy&ecirc;n để giữ vẻ ngo&agrave;i sạch đẹp.</li>\r\n	<li><strong>Tương t&aacute;c x&atilde; hội</strong>: N&ecirc;n cho Shiba l&agrave;m quen với m&ocirc;i trường v&agrave; người xung quanh từ sớm để tr&aacute;nh nh&uacute;t nh&aacute;t hoặc hung hăng.</li>\r\n	<li><strong>Sức khỏe</strong>: Ch&uacute;ng l&agrave; giống ch&oacute; khỏe mạnh, nhưng c&oacute; thể gặp một số vấn đề về xương khớp hoặc mắt, cần theo d&otilde;i sức khỏe định kỳ.</li>\r\n</ol>', '<p><img alt=\"Những Đặc Điểm Cần Lưu Ý Khi Chăm Sóc Giống Chó Shiba Inu – PetHealth\" src=\"https://file.hstatic.net/200000731893/file/pikaso_texttoimage_shiba-inu_bfc8897d2b874b70adbe5a90a9f1ce54_grande.jpeg\" /></p>\r\n\r\n<p><strong>Ch&oacute; Shiba Inu &ndash; Người bạn nhỏ th&ocirc;ng minh v&agrave; độc lập</strong></p>\r\n\r\n<p>Ch&oacute; Shiba Inu l&agrave; giống ch&oacute; nổi tiếng từ Nhật Bản, được xem l&agrave; một trong những biểu tượng quốc gia của đất nước n&agrave;y. Với v&oacute;c d&aacute;ng nhỏ gọn, bộ l&ocirc;ng d&agrave;y mềm mại, v&agrave; đ&ocirc;i tai dựng, Shiba Inu c&oacute; vẻ ngo&agrave;i dễ thương nhưng lại to&aacute;t l&ecirc;n sự lanh lợi v&agrave; tinh tế.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Shiba Inu th&ocirc;ng minh, độc lập, v&agrave; rất cảnh gi&aacute;c. Ch&uacute;ng thường trung th&agrave;nh với chủ nhưng c&oacute; xu hướng d&egrave; dặt với người lạ. Đ&acirc;y l&agrave; giống ch&oacute; năng động, th&iacute;ch kh&aacute;m ph&aacute; v&agrave; kh&aacute; bướng bỉnh, n&ecirc;n cần huấn luyện từ nhỏ để kiểm so&aacute;t h&agrave;nh vi.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Shiba Inu ph&ugrave; hợp với người sống trong cả kh&ocirc;ng gian nhỏ (như căn hộ) hoặc rộng (như nh&agrave; c&oacute; s&acirc;n vườn), miễn l&agrave; được tập luyện v&agrave; vận động đầy đủ. Ch&uacute;ng th&iacute;ch hợp cho những người năng động, y&ecirc;u th&iacute;ch sự th&ocirc;ng minh v&agrave; c&aacute; t&iacute;nh độc lập của ch&oacute;.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Vận động</strong>: Shiba Inu c&oacute; nhiều năng lượng v&agrave; cần được đi dạo, chơi đ&ugrave;a h&agrave;ng ng&agrave;y để giải tỏa năng lượng.</li>\r\n	<li><strong>Huấn luyện</strong>: V&igrave; t&iacute;nh c&aacute;ch độc lập v&agrave; bướng bỉnh, Shiba cần sự ki&ecirc;n nhẫn v&agrave; kỷ luật trong huấn luyện, đặc biệt khi c&ograve;n nhỏ.</li>\r\n	<li><strong>Chăm s&oacute;c l&ocirc;ng</strong>: Bộ l&ocirc;ng Shiba rụng theo m&ugrave;a, cần chải l&ocirc;ng thường xuy&ecirc;n để giữ vẻ ngo&agrave;i sạch đẹp.</li>\r\n	<li><strong>Tương t&aacute;c x&atilde; hội</strong>: N&ecirc;n cho Shiba l&agrave;m quen với m&ocirc;i trường v&agrave; người xung quanh từ sớm để tr&aacute;nh nh&uacute;t nh&aacute;t hoặc hung hăng.</li>\r\n	<li><strong>Sức khỏe</strong>: Ch&uacute;ng l&agrave; giống ch&oacute; khỏe mạnh, nhưng c&oacute; thể gặp một số vấn đề về xương khớp hoặc mắt, cần theo d&otilde;i sức khỏe định kỳ.</li>\r\n</ol>', 6000000, 'shiba7.jpg', 0, NULL, NULL, NULL),
(13, 6, 'CHÓ ALASKA', '<p><img alt=\"Chó Alaska - Tổng hợp thông tin từ A đến Z - Huấn luyện chó thành tài\" src=\"https://huanluyenchothanhtai.com/wp-content/uploads/2019/07/alaska-yeu-tre-em.jpg\" style=\"height:394px; width:700px\" /></p>\r\n\r\n<p><strong>Ch&oacute; Alaska &ndash; Người bạn khổng lồ đ&aacute;ng y&ecirc;u v&agrave; mạnh mẽ</strong></p>\r\n\r\n<p>Ch&oacute; Alaska (Alaskan Malamute) l&agrave; một trong những giống ch&oacute; k&eacute;o xe lớn nhất thế giới, c&oacute; nguồn gốc từ Alaska, Mỹ. Ban đầu, ch&uacute;ng được nu&ocirc;i để k&eacute;o xe trượt tuyết v&agrave; vận chuyển h&agrave;ng h&oacute;a trong điều kiện băng tuyết khắc nghiệt. Với vẻ ngo&agrave;i giống ch&oacute; s&oacute;i nhưng t&iacute;nh c&aacute;ch hiền l&agrave;nh, Alaska l&agrave; sự lựa chọn tuyệt vời cho những gia đ&igrave;nh y&ecirc;u động vật.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Alaska rất th&acirc;n thiện, trung th&agrave;nh, v&agrave; y&ecirc;u thương chủ nh&acirc;n. Ch&uacute;ng th&iacute;ch sự tương t&aacute;c v&agrave; lu&ocirc;n vui vẻ, đặc biệt ph&ugrave; hợp với trẻ em. Tuy nhi&ecirc;n, Alaska cũng kh&aacute; độc lập v&agrave; đ&ocirc;i khi bướng bỉnh, v&igrave; vậy cần huấn luyện sớm v&agrave; ki&ecirc;n nhẫn.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Alaska ph&ugrave; hợp với những gia đ&igrave;nh hoặc người nu&ocirc;i c&oacute; kh&ocirc;ng gian rộng r&atilde;i, y&ecirc;u th&iacute;ch vận động v&agrave; c&oacute; thời gian chăm s&oacute;c ch&uacute;ng.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Kh&ocirc;ng gian sống</strong>: Alaska cần kh&ocirc;ng gian lớn để chạy nhảy v&agrave; vận động. Ch&uacute;ng kh&ocirc;ng ph&ugrave; hợp với kh&ocirc;ng gian chật hẹp như căn hộ nhỏ.</li>\r\n	<li><strong>Vận động</strong>: L&agrave; giống ch&oacute; k&eacute;o xe, Alaska cần vận động h&agrave;ng ng&agrave;y để tr&aacute;nh b&eacute;o ph&igrave; v&agrave; buồn ch&aacute;n, c&oacute; thể dẫn đến h&agrave;nh vi ph&aacute; ph&aacute;ch.</li>\r\n	<li><strong>Chăm s&oacute;c l&ocirc;ng</strong>: Bộ l&ocirc;ng d&agrave;y hai lớp của ch&uacute;ng cần được chải thường xuy&ecirc;n để tr&aacute;nh rụng l&ocirc;ng nhiều v&agrave; giữ vẻ đẹp tự nhi&ecirc;n.</li>\r\n	<li><strong>Kh&iacute; hậu</strong>: Alaska th&iacute;ch hợp với kh&iacute; hậu m&aacute;t mẻ hoặc lạnh. Nếu sống ở v&ugrave;ng n&oacute;ng, cần giữ ch&uacute;ng trong m&ocirc;i trường điều h&ograve;a hoặc tr&aacute;nh nhiệt độ cao.</li>\r\n	<li><strong>Dinh dưỡng</strong>: Alaska ăn kh&aacute; nhiều, cần cung cấp chế độ ăn gi&agrave;u protein v&agrave; đầy đủ dinh dưỡng để đảm bảo sức khỏe.</li>\r\n</ol>\r\n\r\n<p>Với sự chăm s&oacute;c chu đ&aacute;o, Alaska kh&ocirc;ng chỉ l&agrave; một ch&uacute; ch&oacute; cưng m&agrave; c&ograve;n l&agrave; người bạn to lớn, hiền h&ograve;a, lu&ocirc;n sẵn s&agrave;ng mang lại niềm vui v&agrave; sự y&ecirc;u thương cho gia đ&igrave;nh bạn!</p>', '<p><img alt=\"5 lý do thú vị khiến bạn muốn sở hữu ngay những chú chó tuyết Alaska\" src=\"https://media-cdn-v2.laodong.vn/Storage/NewsPortal/2020/5/1/802529/5-Ly-Do-Thu-Vi-Khien-01.jpg\" style=\"height:551px; width:700px\" /></p>\r\n\r\n<p><strong>Ch&oacute; Alaska &ndash; Người bạn khổng lồ đ&aacute;ng y&ecirc;u v&agrave; mạnh mẽ</strong></p>\r\n\r\n<p>Ch&oacute; Alaska (Alaskan Malamute) l&agrave; một trong những giống ch&oacute; k&eacute;o xe lớn nhất thế giới, c&oacute; nguồn gốc từ Alaska, Mỹ. Ban đầu, ch&uacute;ng được nu&ocirc;i để k&eacute;o xe trượt tuyết v&agrave; vận chuyển h&agrave;ng h&oacute;a trong điều kiện băng tuyết khắc nghiệt. Với vẻ ngo&agrave;i giống ch&oacute; s&oacute;i nhưng t&iacute;nh c&aacute;ch hiền l&agrave;nh, Alaska l&agrave; sự lựa chọn tuyệt vời cho những gia đ&igrave;nh y&ecirc;u động vật.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Alaska rất th&acirc;n thiện, trung th&agrave;nh, v&agrave; y&ecirc;u thương chủ nh&acirc;n. Ch&uacute;ng th&iacute;ch sự tương t&aacute;c v&agrave; lu&ocirc;n vui vẻ, đặc biệt ph&ugrave; hợp với trẻ em. Tuy nhi&ecirc;n, Alaska cũng kh&aacute; độc lập v&agrave; đ&ocirc;i khi bướng bỉnh, v&igrave; vậy cần huấn luyện sớm v&agrave; ki&ecirc;n nhẫn.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Alaska ph&ugrave; hợp với những gia đ&igrave;nh hoặc người nu&ocirc;i c&oacute; kh&ocirc;ng gian rộng r&atilde;i, y&ecirc;u th&iacute;ch vận động v&agrave; c&oacute; thời gian chăm s&oacute;c ch&uacute;ng.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Kh&ocirc;ng gian sống</strong>: Alaska cần kh&ocirc;ng gian lớn để chạy nhảy v&agrave; vận động. Ch&uacute;ng kh&ocirc;ng ph&ugrave; hợp với kh&ocirc;ng gian chật hẹp như căn hộ nhỏ.</li>\r\n	<li><strong>Vận động</strong>: L&agrave; giống ch&oacute; k&eacute;o xe, Alaska cần vận động h&agrave;ng ng&agrave;y để tr&aacute;nh b&eacute;o ph&igrave; v&agrave; buồn ch&aacute;n, c&oacute; thể dẫn đến h&agrave;nh vi ph&aacute; ph&aacute;ch.</li>\r\n	<li><strong>Chăm s&oacute;c l&ocirc;ng</strong>: Bộ l&ocirc;ng d&agrave;y hai lớp của ch&uacute;ng cần được chải thường xuy&ecirc;n để tr&aacute;nh rụng l&ocirc;ng nhiều v&agrave; giữ vẻ đẹp tự nhi&ecirc;n.</li>\r\n	<li><strong>Kh&iacute; hậu</strong>: Alaska th&iacute;ch hợp với kh&iacute; hậu m&aacute;t mẻ hoặc lạnh. Nếu sống ở v&ugrave;ng n&oacute;ng, cần giữ ch&uacute;ng trong m&ocirc;i trường điều h&ograve;a hoặc tr&aacute;nh nhiệt độ cao.</li>\r\n	<li><strong>Dinh dưỡng</strong>: Alaska ăn kh&aacute; nhiều, cần cung cấp chế độ ăn gi&agrave;u protein v&agrave; đầy đủ dinh dưỡng để đảm bảo sức khỏe.</li>\r\n</ol>\r\n\r\n<p>Với sự chăm s&oacute;c chu đ&aacute;o, Alaska kh&ocirc;ng chỉ l&agrave; một ch&uacute; ch&oacute; cưng m&agrave; c&ograve;n l&agrave; người bạn to lớn, hiền h&ograve;a, lu&ocirc;n sẵn s&agrave;ng mang lại niềm vui v&agrave; sự y&ecirc;u thương cho gia đ&igrave;nh bạn!</p>', 7000000, 'alaska98.jpg', 0, 'x', NULL, NULL),
(14, 6, 'CHÓ PITBULL', '<p><img alt=\"Huấn luyện chó Pitbull\" src=\"https://huanluyenchosaigon.com.vn/wp-content/uploads/2020/07/huan-luyen-cho-pitbull-2-1280x800.jpg\" style=\"height:438px; width:700px\" /></p>\r\n\r\n<p><strong>Ch&oacute; Pitbull &ndash; Chiến binh mạnh mẽ v&agrave; người bạn trung th&agrave;nh</strong></p>\r\n\r\n<p>Ch&oacute; Pitbull l&agrave; một giống ch&oacute; nổi tiếng với sức mạnh cơ bắp, sự nhanh nhẹn v&agrave; l&ograve;ng trung th&agrave;nh tuyệt đối. Nguồn gốc của ch&uacute;ng l&agrave; từ Mỹ, được lai tạo từ giống ch&oacute; Bulldog v&agrave; Terrier. Ban đầu, Pitbull được nu&ocirc;i để hỗ trợ trong c&ocirc;ng việc đồng &aacute;ng v&agrave; sau đ&oacute; l&agrave; tham gia v&agrave;o c&aacute;c m&ocirc;n thể thao đối kh&aacute;ng. Tuy nhi&ecirc;n, ng&agrave;y nay ch&uacute;ng đ&atilde; trở th&agrave;nh th&uacute; cưng được y&ecirc;u th&iacute;ch trong nhiều gia đ&igrave;nh.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: D&ugrave; c&oacute; vẻ ngo&agrave;i mạnh mẽ v&agrave; đ&ocirc;i khi bị hiểu nhầm l&agrave; hung dữ, Pitbull thực sự rất t&igrave;nh cảm, trung th&agrave;nh v&agrave; th&acirc;n thiện với gia đ&igrave;nh. Ch&uacute;ng đặc biệt y&ecirc;u trẻ nhỏ v&agrave; thường được gọi l&agrave; &quot;nanny dog&quot; (ch&oacute; giữ trẻ). Tuy nhi&ecirc;n, Pitbull cũng c&oacute; bản năng bảo vệ mạnh mẽ, cần được x&atilde; hội h&oacute;a v&agrave; huấn luyện từ nhỏ để kiểm so&aacute;t h&agrave;nh vi.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Pitbull ph&ugrave; hợp với những người y&ecirc;u th&iacute;ch vận động, c&oacute; thời gian huấn luyện v&agrave; chăm s&oacute;c. Ch&uacute;ng đặc biệt th&iacute;ch hợp với chủ nh&acirc;n cứng rắn, ki&ecirc;n nhẫn v&agrave; c&oacute; kinh nghiệm nu&ocirc;i ch&oacute;.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Huấn luyện</strong>: Pitbull cần được huấn luyện b&agrave;i bản v&agrave; l&agrave;m quen với x&atilde; hội từ nhỏ để ph&aacute;t triển t&iacute;nh c&aacute;ch th&acirc;n thiện, ngoan ngo&atilde;n.</li>\r\n	<li><strong>Vận động</strong>: Đ&acirc;y l&agrave; giống ch&oacute; năng động, cần tập luyện thường xuy&ecirc;n như đi dạo, chạy bộ hoặc tham gia c&aacute;c tr&ograve; chơi để giải tỏa năng lượng.</li>\r\n	<li><strong>Kh&ocirc;ng gian sống</strong>: Pitbull c&oacute; thể sống trong nh&agrave; hoặc căn hộ, miễn l&agrave; được vận động đủ. Tuy nhi&ecirc;n, ch&uacute;ng th&iacute;ch kh&ocirc;ng gian rộng để chạy nhảy hơn.</li>\r\n	<li><strong>T&iacute;nh kỷ luật</strong>: Pitbull cần một người chủ cứng rắn nhưng y&ecirc;u thương, biết c&aacute;ch thiết lập vai tr&ograve; dẫn đầu để ch&uacute;ng kh&ocirc;ng trở n&ecirc;n bướng bỉnh.</li>\r\n	<li><strong>Sức khỏe</strong>: Ch&uacute;ng l&agrave; giống ch&oacute; khỏe mạnh nhưng cần kiểm tra định kỳ để tr&aacute;nh c&aacute;c bệnh như loạn sản xương h&ocirc;ng hoặc dị ứng da.</li>\r\n</ol>\r\n\r\n<p>Với sự huấn luyện v&agrave; chăm s&oacute;c đ&uacute;ng c&aacute;ch, Pitbull kh&ocirc;ng chỉ l&agrave; một ch&uacute; ch&oacute; mạnh mẽ m&agrave; c&ograve;n l&agrave; người bạn đồng h&agrave;nh trung th&agrave;nh, đầy y&ecirc;u thương v&agrave; đ&aacute;ng tin cậy!</p>', '<p><img alt=\"Pitbull - Dòng Chó Chiến Mạnh Mẽ Số 1 Thế Giới | Siêu Pet\" src=\"https://sieupet.com/sites/default/files/field/image/mua-ban-pitbull.jpg\" style=\"height:525px; width:700px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Ch&oacute; Pitbull &ndash; Chiến binh mạnh mẽ v&agrave; người bạn trung th&agrave;nh</strong></p>\r\n\r\n<p>Ch&oacute; Pitbull l&agrave; một giống ch&oacute; nổi tiếng với sức mạnh cơ bắp, sự nhanh nhẹn v&agrave; l&ograve;ng trung th&agrave;nh tuyệt đối. Nguồn gốc của ch&uacute;ng l&agrave; từ Mỹ, được lai tạo từ giống ch&oacute; Bulldog v&agrave; Terrier. Ban đầu, Pitbull được nu&ocirc;i để hỗ trợ trong c&ocirc;ng việc đồng &aacute;ng v&agrave; sau đ&oacute; l&agrave; tham gia v&agrave;o c&aacute;c m&ocirc;n thể thao đối kh&aacute;ng. Tuy nhi&ecirc;n, ng&agrave;y nay ch&uacute;ng đ&atilde; trở th&agrave;nh th&uacute; cưng được y&ecirc;u th&iacute;ch trong nhiều gia đ&igrave;nh.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: D&ugrave; c&oacute; vẻ ngo&agrave;i mạnh mẽ v&agrave; đ&ocirc;i khi bị hiểu nhầm l&agrave; hung dữ, Pitbull thực sự rất t&igrave;nh cảm, trung th&agrave;nh v&agrave; th&acirc;n thiện với gia đ&igrave;nh. Ch&uacute;ng đặc biệt y&ecirc;u trẻ nhỏ v&agrave; thường được gọi l&agrave; &quot;nanny dog&quot; (ch&oacute; giữ trẻ). Tuy nhi&ecirc;n, Pitbull cũng c&oacute; bản năng bảo vệ mạnh mẽ, cần được x&atilde; hội h&oacute;a v&agrave; huấn luyện từ nhỏ để kiểm so&aacute;t h&agrave;nh vi.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Pitbull ph&ugrave; hợp với những người y&ecirc;u th&iacute;ch vận động, c&oacute; thời gian huấn luyện v&agrave; chăm s&oacute;c. Ch&uacute;ng đặc biệt th&iacute;ch hợp với chủ nh&acirc;n cứng rắn, ki&ecirc;n nhẫn v&agrave; c&oacute; kinh nghiệm nu&ocirc;i ch&oacute;.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Huấn luyện</strong>: Pitbull cần được huấn luyện b&agrave;i bản v&agrave; l&agrave;m quen với x&atilde; hội từ nhỏ để ph&aacute;t triển t&iacute;nh c&aacute;ch th&acirc;n thiện, ngoan ngo&atilde;n.</li>\r\n	<li><strong>Vận động</strong>: Đ&acirc;y l&agrave; giống ch&oacute; năng động, cần tập luyện thường xuy&ecirc;n như đi dạo, chạy bộ hoặc tham gia c&aacute;c tr&ograve; chơi để giải tỏa năng lượng.</li>\r\n	<li><strong>Kh&ocirc;ng gian sống</strong>: Pitbull c&oacute; thể sống trong nh&agrave; hoặc căn hộ, miễn l&agrave; được vận động đủ. Tuy nhi&ecirc;n, ch&uacute;ng th&iacute;ch kh&ocirc;ng gian rộng để chạy nhảy hơn.</li>\r\n	<li><strong>T&iacute;nh kỷ luật</strong>: Pitbull cần một người chủ cứng rắn nhưng y&ecirc;u thương, biết c&aacute;ch thiết lập vai tr&ograve; dẫn đầu để ch&uacute;ng kh&ocirc;ng trở n&ecirc;n bướng bỉnh.</li>\r\n	<li><strong>Sức khỏe</strong>: Ch&uacute;ng l&agrave; giống ch&oacute; khỏe mạnh nhưng cần kiểm tra định kỳ để tr&aacute;nh c&aacute;c bệnh như loạn sản xương h&ocirc;ng hoặc dị ứng da.</li>\r\n</ol>\r\n\r\n<p>Với sự huấn luyện v&agrave; chăm s&oacute;c đ&uacute;ng c&aacute;ch, Pitbull kh&ocirc;ng chỉ l&agrave; một ch&uacute; ch&oacute; mạnh mẽ m&agrave; c&ograve;n l&agrave; người bạn đồng h&agrave;nh trung th&agrave;nh, đầy y&ecirc;u thương v&agrave; đ&aacute;ng tin cậy!</p>', 9000000, 'pitbull83.jpg', 0, 'x', NULL, NULL),
(15, 6, 'CHÓ CHIHUAHUA', '<p><img alt=\"Chó Chihuahua: Những Sự Thật Đáng Ngạc Nhiên – PetHealth\" src=\"https://product.hstatic.net/200000731893/product/cho-chihuahua-long-ngan_c0a35db61228496e9cd6abae9ea2d811.png\" /></p>\r\n\r\n<p><strong>Ch&oacute; Chihuahua &ndash; Người bạn nhỏ nhắn nhưng đầy c&aacute; t&iacute;nh</strong></p>\r\n\r\n<p>Ch&oacute; Chihuahua l&agrave; giống ch&oacute; nhỏ nhất thế giới, c&oacute; nguồn gốc từ Mexico. Mặc d&ugrave; nhỏ b&eacute;, ch&uacute;ng lại c&oacute; t&iacute;nh c&aacute;ch mạnh mẽ, tự tin v&agrave; rất đ&aacute;ng y&ecirc;u. Chihuahua rất phổ biến như th&uacute; cưng gia đ&igrave;nh nhờ v&agrave;o k&iacute;ch thước nhỏ gọn v&agrave; dễ d&agrave;ng chăm s&oacute;c.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Chihuahua thường rất trung th&agrave;nh với chủ, y&ecirc;u thương v&agrave; bảo vệ gia đ&igrave;nh. Ch&uacute;ng c&oacute; t&iacute;nh c&aacute;ch mạnh mẽ, tự lập, nhưng cũng c&oacute; thể kh&aacute; nh&uacute;t nh&aacute;t v&agrave; dễ sợ h&atilde;i nếu kh&ocirc;ng được x&atilde; hội h&oacute;a đ&uacute;ng c&aacute;ch. Với bản t&iacute;nh cảnh gi&aacute;c, ch&uacute;ng l&agrave; những &quot;người bảo vệ&quot; tuyệt vời, thường xuy&ecirc;n sủa để cảnh b&aacute;o về những điều bất thường.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Chihuahua ph&ugrave; hợp với những người sống trong kh&ocirc;ng gian nhỏ như căn hộ hoặc nh&agrave; phố, đặc biệt l&agrave; những người t&igrave;m kiếm một người bạn đồng h&agrave;nh nhỏ nhắn v&agrave; dễ d&agrave;ng chăm s&oacute;c. Ch&uacute;ng cũng th&iacute;ch hợp với những gia đ&igrave;nh kh&ocirc;ng c&oacute; trẻ em qu&aacute; nhỏ v&igrave; ch&uacute;ng dễ bị tổn thương nếu kh&ocirc;ng được xử l&yacute; cẩn thận.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Chế độ chăm s&oacute;c</strong>: Chihuahua cần sự chăm s&oacute;c tỉ mỉ về dinh dưỡng v&agrave; sức khỏe. V&igrave; c&oacute; k&iacute;ch thước nhỏ, ch&uacute;ng dễ gặp phải c&aacute;c vấn đề về răng miệng hoặc xương khớp.</li>\r\n	<li><strong>Vận động</strong>: D&ugrave; nhỏ, ch&uacute;ng vẫn cần những buổi đi dạo v&agrave; chơi đ&ugrave;a để duy tr&igrave; sức khỏe. Tuy nhi&ecirc;n, do k&iacute;ch thước nhỏ, nhu cầu vận động của ch&uacute;ng kh&ocirc;ng qu&aacute; lớn.</li>\r\n	<li><strong>Sức khỏe</strong>: Chihuahua c&oacute; thể dễ bị c&aacute;c vấn đề sức khỏe như tim mạch, răng miệng v&agrave; nhạy cảm với nhiệt độ lạnh. V&igrave; vậy, bạn cần giữ ch&uacute;ng trong m&ocirc;i trường ấm &aacute;p v&agrave; kiểm tra sức khỏe định kỳ.</li>\r\n	<li><strong>T&iacute;nh c&aacute;ch</strong>: Chihuahua dễ bạo vệ v&agrave; sủa qu&aacute; nhiều nếu kh&ocirc;ng được huấn luyện x&atilde; hội h&oacute;a đ&uacute;ng c&aacute;ch, v&igrave; vậy cần dạy ch&uacute;ng c&aacute;ch giao tiếp v&agrave; kiểm so&aacute;t h&agrave;nh vi từ nhỏ.</li>\r\n</ol>\r\n\r\n<p>Chihuahua l&agrave; giống ch&oacute; tuyệt vời cho những ai muốn một người bạn đồng h&agrave;nh nhỏ nhắn, dễ thương v&agrave; đầy t&igrave;nh cảm. Với sự chăm s&oacute;c v&agrave; y&ecirc;u thương, Chihuahua sẽ l&agrave; một phần kh&ocirc;ng thể thiếu trong gia đ&igrave;nh bạn!</p>', '<p><img alt=\"Chó Chihuahua - Giống chó nhỏ nhưng rất tinh nhanh, đáng yêu\" src=\"https://cdn.eva.vn/upload/4-2020/images/2020-10-13/image10-1602571101-484-width640height500.jpg\" /></p>\r\n\r\n<p><strong>Ch&oacute; Chihuahua &ndash; Người bạn nhỏ nhắn nhưng đầy c&aacute; t&iacute;nh</strong></p>\r\n\r\n<p>Ch&oacute; Chihuahua l&agrave; giống ch&oacute; nhỏ nhất thế giới, c&oacute; nguồn gốc từ Mexico. Mặc d&ugrave; nhỏ b&eacute;, ch&uacute;ng lại c&oacute; t&iacute;nh c&aacute;ch mạnh mẽ, tự tin v&agrave; rất đ&aacute;ng y&ecirc;u. Chihuahua rất phổ biến như th&uacute; cưng gia đ&igrave;nh nhờ v&agrave;o k&iacute;ch thước nhỏ gọn v&agrave; dễ d&agrave;ng chăm s&oacute;c.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Chihuahua thường rất trung th&agrave;nh với chủ, y&ecirc;u thương v&agrave; bảo vệ gia đ&igrave;nh. Ch&uacute;ng c&oacute; t&iacute;nh c&aacute;ch mạnh mẽ, tự lập, nhưng cũng c&oacute; thể kh&aacute; nh&uacute;t nh&aacute;t v&agrave; dễ sợ h&atilde;i nếu kh&ocirc;ng được x&atilde; hội h&oacute;a đ&uacute;ng c&aacute;ch. Với bản t&iacute;nh cảnh gi&aacute;c, ch&uacute;ng l&agrave; những &quot;người bảo vệ&quot; tuyệt vời, thường xuy&ecirc;n sủa để cảnh b&aacute;o về những điều bất thường.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Chihuahua ph&ugrave; hợp với những người sống trong kh&ocirc;ng gian nhỏ như căn hộ hoặc nh&agrave; phố, đặc biệt l&agrave; những người t&igrave;m kiếm một người bạn đồng h&agrave;nh nhỏ nhắn v&agrave; dễ d&agrave;ng chăm s&oacute;c. Ch&uacute;ng cũng th&iacute;ch hợp với những gia đ&igrave;nh kh&ocirc;ng c&oacute; trẻ em qu&aacute; nhỏ v&igrave; ch&uacute;ng dễ bị tổn thương nếu kh&ocirc;ng được xử l&yacute; cẩn thận.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Chế độ chăm s&oacute;c</strong>: Chihuahua cần sự chăm s&oacute;c tỉ mỉ về dinh dưỡng v&agrave; sức khỏe. V&igrave; c&oacute; k&iacute;ch thước nhỏ, ch&uacute;ng dễ gặp phải c&aacute;c vấn đề về răng miệng hoặc xương khớp.</li>\r\n	<li><strong>Vận động</strong>: D&ugrave; nhỏ, ch&uacute;ng vẫn cần những buổi đi dạo v&agrave; chơi đ&ugrave;a để duy tr&igrave; sức khỏe. Tuy nhi&ecirc;n, do k&iacute;ch thước nhỏ, nhu cầu vận động của ch&uacute;ng kh&ocirc;ng qu&aacute; lớn.</li>\r\n	<li><strong>Sức khỏe</strong>: Chihuahua c&oacute; thể dễ bị c&aacute;c vấn đề sức khỏe như tim mạch, răng miệng v&agrave; nhạy cảm với nhiệt độ lạnh. V&igrave; vậy, bạn cần giữ ch&uacute;ng trong m&ocirc;i trường ấm &aacute;p v&agrave; kiểm tra sức khỏe định kỳ.</li>\r\n	<li><strong>T&iacute;nh c&aacute;ch</strong>: Chihuahua dễ bạo vệ v&agrave; sủa qu&aacute; nhiều nếu kh&ocirc;ng được huấn luyện x&atilde; hội h&oacute;a đ&uacute;ng c&aacute;ch, v&igrave; vậy cần dạy ch&uacute;ng c&aacute;ch giao tiếp v&agrave; kiểm so&aacute;t h&agrave;nh vi từ nhỏ.</li>\r\n</ol>\r\n\r\n<p>Chihuahua l&agrave; giống ch&oacute; tuyệt vời cho những ai muốn một người bạn đồng h&agrave;nh nhỏ nhắn, dễ thương v&agrave; đầy t&igrave;nh cảm. Với sự chăm s&oacute;c v&agrave; y&ecirc;u thương, Chihuahua sẽ l&agrave; một phần kh&ocirc;ng thể thiếu trong gia đ&igrave;nh bạn!</p>\r\n\r\n<p>&nbsp;</p>', 6000000, 'chihuahua87.jpg', 0, 'x', NULL, NULL),
(16, 8, 'HẠT CHO CHÓ NATURAL LAB CARE HỖ TRỢ SỨC KHỎE 2KG', '<p><img src=\"https://paddy.vn/cdn/shop/files/hat-cho-cho-natural-lab-care-ho-tro-suc-khoe-2kg_4.webp?v=1713770682\" style=\"height:300px; width:300px\" />&nbsp;&nbsp;<img src=\"https://paddy.vn/cdn/shop/files/hat-cho-cho-natural-lab-care-ho-tro-suc-khoe-2kg_5.webp?v=1713770682\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Xương Khớp V&agrave; Mắt (Joint &amp; Eye): Vịt, B&ograve;, C&aacute; hồi</p>\r\n\r\n<p>Vi&ecirc;m Da V&agrave; Dị Ứng (Skin &amp; Allergy):&nbsp;C&aacute; hồi, Hải sản</p>\r\n\r\n<p>Ti&ecirc;u H&oacute;a V&agrave; Gan (Digest &amp; Liver): C&aacute; hồi, Hải sản</p>\r\n\r\n<p>Giảm C&acirc;n V&agrave; Hệ Miễn Dịch (Diet &amp; Immunity): B&ograve;, Hải sản</p>', '<p><img src=\"https://paddy.vn/cdn/shop/files/hat-cho-cho-natural-lab-care-ho-tro-suc-khoe-2kg_3.webp?v=1713770682\" /></p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Xương Khớp V&agrave; Mắt (Joint &amp; Eye):&nbsp;Bổ sung xương khớp v&agrave; mắt - Tăng cường miễn dịch - Cải thiện ti&ecirc;u h&oacute;a</p>\r\n\r\n<p>Vi&ecirc;m Da V&agrave; Dị Ứng (Skin &amp; Allergy):&nbsp;Hỗ trợ ch&oacute; bị dị ứng thức ăn &ndash; Ăn ki&ecirc;ng - Tăng cường miễn dịch - Cải thiện ti&ecirc;u h&oacute;a</p>\r\n\r\n<p>Ti&ecirc;u H&oacute;a V&agrave; Gan (Digest &amp; Liver): Cải thiện ti&ecirc;u h&oacute;a - &Iacute;t dị ứng - Tăng cường miễn dịch - Cung cấp dinh dưỡng, tăng cảm gi&aacute;c ngon miệng</p>\r\n\r\n<p>Giảm C&acirc;n V&agrave; Hệ Miễn Dịch (Diet &amp; Immunity): Kh&ocirc;ng g&acirc;y dị ứng - Cung cấp dinh dưỡng - Tăng cảm gi&aacute;c ngon miệng.- Tăng cường miễn dịch - Cải thiện ti&ecirc;u h&oacute;a</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Xương Khớp V&agrave; Mắt (Joint &amp; Eye): Vịt, B&ograve;, C&aacute; hồi</p>\r\n\r\n<p>Vi&ecirc;m Da V&agrave; Dị Ứng (Skin &amp; Allergy):&nbsp;C&aacute; hồi, Hải sản</p>\r\n\r\n<p>Ti&ecirc;u H&oacute;a V&agrave; Gan (Digest &amp; Liver): C&aacute; hồi, Hải sản</p>\r\n\r\n<p>Giảm C&acirc;n V&agrave; Hệ Miễn Dịch (Diet &amp; Immunity): B&ograve;, Hải sản</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>Chọn loại thức ăn hạt ph&ugrave; hợp với tuổi, nhu cầu dinh dưỡng v&agrave; t&igrave;nh trạng sức khỏe của ch&oacute;.</p>\r\n\r\n<p>Để thức ăn hạt ở nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.</p>\r\n\r\n<p>Cho ch&oacute; ăn thức ăn hạt theo lượng khuyến nghị tr&ecirc;n bao b&igrave;.</p>\r\n\r\n<p>Lu&ocirc;n c&oacute; sẵn nước sạch cho ch&oacute; uống.</p>\r\n\r\n<p>Vệ sinh khay ăn của ch&oacute; thường xuy&ecirc;n.</p>', 470000, 'hat-cho-cho-natural-lab-care-ho-tro-suc-khoe-2kg35.webp', 0, NULL, NULL, NULL),
(20, 4, 'KEM TẨY Ố VÙNG MẮT CHO CHÓ MÈO TROPICLEAN TEAR STAIN 236ML', '<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Sản phẩm tẩy vết ố mắt Tropiclean cho ch&oacute; m&egrave;o c&oacute; bọt nhẹ, kh&ocirc;ng l&agrave;m cay mắt, gi&uacute;p l&agrave;m dịu v&agrave; c&acirc;n bằng da</p>\r\n\r\n<p>Gi&uacute;p loại bỏ bụi bẩn v&agrave; tẩy ố l&ocirc;ng ch&oacute; m&egrave;o v&ugrave;ng mắt v&agrave; v&ugrave;ng miệng một c&aacute;ch hiệu quả</p>\r\n\r\n<p>Kh&ocirc;ng g&acirc;y k&iacute;ch ứng cho mắt</p>\r\n\r\n<p>Th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n - an to&agrave;n cho sức khỏe</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Nước tinh khiết,&nbsp;Chất l&agrave;m sạch từ dừa,&nbsp;Vani,&nbsp;Thanh d&acirc;u,&nbsp;Kiwi,&nbsp;Yến mạch,&nbsp;Bạch tr&agrave;,&nbsp;Gừng.&nbsp;</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>Lắc đều chai trước khi sử dụng.</p>\r\n\r\n<p>L&agrave;m ướt l&ocirc;ng v&agrave; cho sữa rửa mặt vừa đủ l&ecirc;n v&ugrave;ng bị ố v&agrave;ng (hạn chế d&acirc;y v&agrave;o mắt th&uacute; cưng), sau đ&oacute; ch&agrave; nhẹ để trong 2-3 ph&uacute;t, rồi rửa lại bằng nước.</p>\r\n\r\n<p>C&aacute;c v&ugrave;ng bị ố v&agrave;ng nặng c&oacute; thể sử dụng h&agrave;ng ng&agrave;y đến khi vết bẩn được loại bỏ.</p>\r\n\r\n<p>Sử dụng h&agrave;ng tuần để ngăn ngừa vết bẩn.</p>\r\n\r\n<p>Lưu &yacute;:</p>\r\n\r\n<p>Để xa tầm tay trẻ em.</p>\r\n\r\n<p>Tr&aacute;nh tiếp x&uacute;c với mắt v&agrave; miệng.</p>', '<p><img alt=\"Kem Tẩy Ố Vùng Mắt Chó Mèo Tropiclean Tear Stain Remover 236ml (Mỹ) - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/kem-tay-o-vung-mat-cho-meo-tropiclean-tear-stain-remover-236ml-my-paddy-3.png?v=1701686408\" style=\"height:700px; width:700px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Sản phẩm tẩy vết ố mắt Tropiclean cho ch&oacute; m&egrave;o c&oacute; bọt nhẹ, kh&ocirc;ng l&agrave;m cay mắt, gi&uacute;p l&agrave;m dịu v&agrave; c&acirc;n bằng da</p>\r\n\r\n<p>Gi&uacute;p loại bỏ bụi bẩn v&agrave; tẩy ố l&ocirc;ng ch&oacute; m&egrave;o v&ugrave;ng mắt v&agrave; v&ugrave;ng miệng một c&aacute;ch hiệu quả</p>\r\n\r\n<p>Kh&ocirc;ng g&acirc;y k&iacute;ch ứng cho mắt</p>\r\n\r\n<p>Th&agrave;nh phần từ thi&ecirc;n nhi&ecirc;n - an to&agrave;n cho sức khỏe</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Nước tinh khiết,&nbsp;Chất l&agrave;m sạch từ dừa,&nbsp;Vani,&nbsp;Thanh d&acirc;u,&nbsp;Kiwi,&nbsp;Yến mạch,&nbsp;Bạch tr&agrave;,&nbsp;Gừng.&nbsp;</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>Lắc đều chai trước khi sử dụng.</p>\r\n\r\n<p>L&agrave;m ướt l&ocirc;ng v&agrave; cho sữa rửa mặt vừa đủ l&ecirc;n v&ugrave;ng bị ố v&agrave;ng (hạn chế d&acirc;y v&agrave;o mắt th&uacute; cưng), sau đ&oacute; ch&agrave; nhẹ để trong 2-3 ph&uacute;t, rồi rửa lại bằng nước.</p>\r\n\r\n<p>C&aacute;c v&ugrave;ng bị ố v&agrave;ng nặng c&oacute; thể sử dụng h&agrave;ng ng&agrave;y đến khi vết bẩn được loại bỏ.</p>\r\n\r\n<p>Sử dụng h&agrave;ng tuần để ngăn ngừa vết bẩn.</p>\r\n\r\n<p>Lưu &yacute;:</p>\r\n\r\n<p>Để xa tầm tay trẻ em.</p>\r\n\r\n<p>Tr&aacute;nh tiếp x&uacute;c với mắt v&agrave; miệng.</p>', 125000, 'kem-tay-o-vung-mat-cho-meo-tropiclean-tear-stain-remover-236ml92.webp', 0, NULL, NULL, NULL),
(21, 4, 'KỀM CẮT MÓNG TAY CHO CHÓ MÈO SIÊU CUTE DỄ THƯƠNG', '<p>Kềm Bấm Cắt M&oacute;ng An To&agrave;n Cho Ch&oacute; M&egrave;o<br />\r\n<br />\r\nCh&uacute;ng ta hay lo nghĩ về m&oacute;ng của c&uacute;n y&ecirc;u sẽ c&agrave;o v&agrave;o bạn khi chơi đ&ugrave;a với ch&uacute;ng, hay những ch&uacute; c&uacute;n kh&ocirc;ng tự biết m&agrave;i m&oacute;ng, v&igrave; vậy bạn h&atilde;y y&ecirc;n t&acirc;m v&agrave; sử dụng ngay kiềm cắt m&oacute;ng, để bạn c&oacute; thể chơi đ&ugrave;a thoải m&aacute;i m&agrave; kh&ocirc;ng lo bị m&oacute;ng của c&uacute;n c&agrave;o v&agrave;o người bạn. Khi cắt m&oacute;ng cho c&uacute;n y&ecirc;u, bạn phải ch&uacute; &yacute; cắt cẩn thận để kh&ocirc;ng l&agrave;m ch&uacute;ng chảy m&aacute;u v&igrave; cắt qu&aacute; s&acirc;u v&agrave;o tủy. sau khi cắt xong, bạn d&ugrave;ng dũa để dũa cho m&oacute;ng &ecirc;m v&agrave; mịn đầu m&oacute;ng.<br />\r\n<br />\r\n- Th&iacute;ch hợp cho ch&oacute; v&agrave; m&egrave;o ở tất cả độ tuổi, kể cả ch&oacute; m&egrave;o con.<br />\r\n- Bảo vệ sức khỏe cho th&uacute; y&ecirc;u v&agrave; cho con người khỏi sợ m&oacute;ng th&uacute; cưng c&agrave;o v&agrave;o người.<br />\r\n- Cắt được cho tất cả c&aacute;c loại m&oacute;ng của ch&oacute; m&egrave;o lớn v&agrave; nhỏ.<br />\r\n- Lưỡi k&igrave;m b&eacute;n gi&uacute;p dễ d&agrave;ng cắt m&oacute;ng cho c&uacute;n cưng của bạn.<br />\r\n- Chất liệu: Th&eacute;p v&agrave; nhựa cao cấp, kh&ocirc;ng gỉ s&eacute;t, kh&ocirc;ng chứa độc hại, đảm bảo an to&agrave;n cho th&uacute; cưng của bạn.<br />\r\n- Quy c&aacute;ch đ&oacute;ng g&oacute;i: 1 kềm bấm m&oacute;ng<br />\r\n<br />\r\nHƯỚNG DẪN CẮT M&Oacute;NG<br />\r\n- Kiểm tra m&oacute;ng vuốt của Boss. Theo thời gian, vật cưng sẽ cho ph&eacute;p bạn ấn nhẹ b&agrave;n ch&acirc;n (&eacute;p l&ecirc;n mu b&agrave;n ch&acirc;n) để đẩy m&oacute;ng ra ngo&agrave;i m&agrave; kh&ocirc;ng l&agrave;m ch&uacute;ng kh&oacute; chịu.<br />\r\n- Khi bộ m&oacute;ng lộ ra ngo&agrave;i, bạn sẽ thấy phần d&agrave;y nhất của m&oacute;ng, v&agrave; hướng về m&oacute;ng ch&acirc;n l&agrave; phần m&agrave;u hồng nằm b&ecirc;n trong m&oacute;ng, gọi l&agrave; đệm thịt.<br />\r\n- Đệm thịt l&agrave; phần sống của m&oacute;ng v&agrave; bao gồm mạch m&aacute;u cũng như d&acirc;y thần kinh, v&igrave; thế việc cắt s&aacute;t đệm thịt sẽ g&acirc;y đau. Bạn kh&ocirc;ng n&ecirc;n cắt qu&aacute; gần hoặc v&ocirc; t&igrave;nh cắt phải m&oacute;ng ch&acirc;n m&agrave; chỉ n&ecirc;n cắt phần sắc nhọn của m&oacute;ng<br />\r\n- Kiểm tra cẩn thận vị tr&iacute; v&agrave; độ lớn của đệm thịt. Khi nh&igrave;n qua phần m&oacute;ng trong suốt, đệm thịt l&agrave; phần c&oacute; h&igrave;nh tam gi&aacute;c nhỏ m&agrave;u hồng. Tất cả m&oacute;ng vuốt của ch&oacute; m&egrave;o đều giống nhau, v&igrave; thế nếu c&oacute; m&oacute;ng đen, bạn chỉ cần t&igrave;m m&oacute;ng s&aacute;ng hơn để l&agrave;m điểm đối chiếu cho những m&oacute;ng kh&aacute;c.<br />\r\n<br />\r\nLƯU &Yacute;<br />\r\n- Kh&ocirc;ng d&ugrave;ng k&egrave;m cắt m&oacute;ng hoặc k&eacute;o d&agrave;nh cho người. Loại dụng cụ n&agrave;y c&oacute; thể l&agrave;m nứt m&oacute;ng của Boss.<br />\r\n- Kh&ocirc;ng cắt qu&aacute; s&acirc;u v&agrave; đụng v&agrave;o đệm thịt sẽ l&agrave;m Boss đau<br />\r\n- Kh&ocirc;ng n&ecirc;n cắt trụi m&oacute;ng v&igrave; sẽ l&agrave;m tổn thương d&acirc;y thần kinh cũng như khiến Boss bị tổn thương t&acirc;m l&yacute;. Thay v&agrave;o đ&oacute;, bạn n&ecirc;n cắt m&oacute;ng cho th&uacute; cưng v&agrave;i tuần một lần v&agrave; chuẩn bị trụ hoặc thảm m&agrave;i vuốt cho ch&uacute;ng.</p>', '<p><img alt=\"Kềm cắt móng chó mèo - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/kem-cat-mong-cho-meo-paddy-2.jpg?v=1662946395\" style=\"height:650px; width:650px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kềm Bấm Cắt M&oacute;ng An To&agrave;n Cho Ch&oacute; M&egrave;o<br />\r\n<br />\r\nCh&uacute;ng ta hay lo nghĩ về m&oacute;ng của c&uacute;n y&ecirc;u sẽ c&agrave;o v&agrave;o bạn khi chơi đ&ugrave;a với ch&uacute;ng, hay những ch&uacute; c&uacute;n kh&ocirc;ng tự biết m&agrave;i m&oacute;ng, v&igrave; vậy bạn h&atilde;y y&ecirc;n t&acirc;m v&agrave; sử dụng ngay kiềm cắt m&oacute;ng, để bạn c&oacute; thể chơi đ&ugrave;a thoải m&aacute;i m&agrave; kh&ocirc;ng lo bị m&oacute;ng của c&uacute;n c&agrave;o v&agrave;o người bạn. Khi cắt m&oacute;ng cho c&uacute;n y&ecirc;u, bạn phải ch&uacute; &yacute; cắt cẩn thận để kh&ocirc;ng l&agrave;m ch&uacute;ng chảy m&aacute;u v&igrave; cắt qu&aacute; s&acirc;u v&agrave;o tủy. sau khi cắt xong, bạn d&ugrave;ng dũa để dũa cho m&oacute;ng &ecirc;m v&agrave; mịn đầu m&oacute;ng.<br />\r\n<br />\r\n- Th&iacute;ch hợp cho ch&oacute; v&agrave; m&egrave;o ở tất cả độ tuổi, kể cả ch&oacute; m&egrave;o con.<br />\r\n- Bảo vệ sức khỏe cho th&uacute; y&ecirc;u v&agrave; cho con người khỏi sợ m&oacute;ng th&uacute; cưng c&agrave;o v&agrave;o người.<br />\r\n- Cắt được cho tất cả c&aacute;c loại m&oacute;ng của ch&oacute; m&egrave;o lớn v&agrave; nhỏ.<br />\r\n- Lưỡi k&igrave;m b&eacute;n gi&uacute;p dễ d&agrave;ng cắt m&oacute;ng cho c&uacute;n cưng của bạn.<br />\r\n- Chất liệu: Th&eacute;p v&agrave; nhựa cao cấp, kh&ocirc;ng gỉ s&eacute;t, kh&ocirc;ng chứa độc hại, đảm bảo an to&agrave;n cho th&uacute; cưng của bạn.<br />\r\n- Quy c&aacute;ch đ&oacute;ng g&oacute;i: 1 kềm bấm m&oacute;ng<br />\r\n<br />\r\nHƯỚNG DẪN CẮT M&Oacute;NG<br />\r\n- Kiểm tra m&oacute;ng vuốt của Boss. Theo thời gian, vật cưng sẽ cho ph&eacute;p bạn ấn nhẹ b&agrave;n ch&acirc;n (&eacute;p l&ecirc;n mu b&agrave;n ch&acirc;n) để đẩy m&oacute;ng ra ngo&agrave;i m&agrave; kh&ocirc;ng l&agrave;m ch&uacute;ng kh&oacute; chịu.<br />\r\n- Khi bộ m&oacute;ng lộ ra ngo&agrave;i, bạn sẽ thấy phần d&agrave;y nhất của m&oacute;ng, v&agrave; hướng về m&oacute;ng ch&acirc;n l&agrave; phần m&agrave;u hồng nằm b&ecirc;n trong m&oacute;ng, gọi l&agrave; đệm thịt.<br />\r\n- Đệm thịt l&agrave; phần sống của m&oacute;ng v&agrave; bao gồm mạch m&aacute;u cũng như d&acirc;y thần kinh, v&igrave; thế việc cắt s&aacute;t đệm thịt sẽ g&acirc;y đau. Bạn kh&ocirc;ng n&ecirc;n cắt qu&aacute; gần hoặc v&ocirc; t&igrave;nh cắt phải m&oacute;ng ch&acirc;n m&agrave; chỉ n&ecirc;n cắt phần sắc nhọn của m&oacute;ng<br />\r\n- Kiểm tra cẩn thận vị tr&iacute; v&agrave; độ lớn của đệm thịt. Khi nh&igrave;n qua phần m&oacute;ng trong suốt, đệm thịt l&agrave; phần c&oacute; h&igrave;nh tam gi&aacute;c nhỏ m&agrave;u hồng. Tất cả m&oacute;ng vuốt của ch&oacute; m&egrave;o đều giống nhau, v&igrave; thế nếu c&oacute; m&oacute;ng đen, bạn chỉ cần t&igrave;m m&oacute;ng s&aacute;ng hơn để l&agrave;m điểm đối chiếu cho những m&oacute;ng kh&aacute;c.<br />\r\n<br />\r\nLƯU &Yacute;<br />\r\n- Kh&ocirc;ng d&ugrave;ng k&egrave;m cắt m&oacute;ng hoặc k&eacute;o d&agrave;nh cho người. Loại dụng cụ n&agrave;y c&oacute; thể l&agrave;m nứt m&oacute;ng của Boss.<br />\r\n- Kh&ocirc;ng cắt qu&aacute; s&acirc;u v&agrave; đụng v&agrave;o đệm thịt sẽ l&agrave;m Boss đau<br />\r\n- Kh&ocirc;ng n&ecirc;n cắt trụi m&oacute;ng v&igrave; sẽ l&agrave;m tổn thương d&acirc;y thần kinh cũng như khiến Boss bị tổn thương t&acirc;m l&yacute;. Thay v&agrave;o đ&oacute;, bạn n&ecirc;n cắt m&oacute;ng cho th&uacute; cưng v&agrave;i tuần một lần v&agrave; chuẩn bị trụ hoặc thảm m&agrave;i vuốt cho ch&uacute;ng.</p>', 45000, 'kem-cat-mong-cho-meo-paddy-147.webp', 0, NULL, NULL, NULL);
INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_name`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `product_feature`, `created_at`, `updated_at`) VALUES
(22, 14, 'NỆM VUÔNG CHO CHÓ MÈO DOGGYMAN VẢI LẠNH HẠ NHIỆT', '<p>Nệm vu&ocirc;ng cao cấp cho ch&oacute; m&egrave;o DoggyMan - Nhập khẩu Nhật Bản<br />\r\n<br />\r\nC&oacute; 2 m&agrave;u cho Boss y&ecirc;u lựa chọn:<br />\r\n- M&agrave;u xanh dương họa tiết gấu trắng<br />\r\n- M&agrave;u hồng họa tiết chim c&aacute;nh cụt<br />\r\n<br />\r\nT&iacute;nh năng sản phẩm:<br />\r\n- Nệm vu&ocirc;ng chần b&ocirc;ng &ecirc;m &aacute;i cho th&uacute; cưng.<br />\r\n- Sử dụng vải lạnh cao cấp, hạ nhiệt m&ugrave;a h&egrave; cho th&uacute; cưng.<br />\r\n- C&oacute; hoa văn đ&aacute;ng y&ecirc;u.<br />\r\n<br />\r\nChất liệu: Polyester, cotton.<br />\r\n<br />\r\nTh&ocirc;ng số sản phẩm:<br />\r\n- K&iacute;ch thước sản phẩm (mm):<br />\r\n+ Size S - W450 x D380 x H120: d&agrave;nh cho c&aacute;c b&eacute; dưới 7kg<br />\r\n+ Size M - W550 x D450 x H130: d&agrave;nh cho c&aacute;c b&eacute; dưới 12kg<br />\r\n<br />\r\n- Trọng lượng sản phẩm (g): 390<br />\r\n<br />\r\nHƯỚNG DẪN VỆ SINH<br />\r\nC&oacute; thể dễ d&agrave;ng vệ sinh nệm bằng m&aacute;y giặt v&agrave; lau ch&ugrave;i thường xuy&ecirc;n bằng khăn ẩm.</p>', '<p><img alt=\"Nệm Vuông Cho Chó Mèo DoggyMan Vải Lạnh Hạ Nhiệt - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/nem-vuong-vai-lanh-ha-nhiet-cho-cho-meo-doggyman-paddy-4.jpg?v=1702010880\" style=\"height:300px; width:300px\" />&nbsp; &nbsp;<img src=\"https://paddy.vn/cdn/shop/products/nem-vuong-vai-lanh-ha-nhiet-cho-cho-meo-doggyman-paddy-5.jpg?v=1702010880\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>Nệm vu&ocirc;ng cao cấp cho ch&oacute; m&egrave;o DoggyMan - Nhập khẩu Nhật Bản<br />\r\n<br />\r\nC&oacute; 2 m&agrave;u cho Boss y&ecirc;u lựa chọn:<br />\r\n- M&agrave;u xanh dương họa tiết gấu trắng<br />\r\n- M&agrave;u hồng họa tiết chim c&aacute;nh cụt<br />\r\n<br />\r\nT&iacute;nh năng sản phẩm:<br />\r\n- Nệm vu&ocirc;ng chần b&ocirc;ng &ecirc;m &aacute;i cho th&uacute; cưng.<br />\r\n- Sử dụng vải lạnh cao cấp, hạ nhiệt m&ugrave;a h&egrave; cho th&uacute; cưng.<br />\r\n- C&oacute; hoa văn đ&aacute;ng y&ecirc;u.<br />\r\n<br />\r\nChất liệu: Polyester, cotton.<br />\r\n<br />\r\nTh&ocirc;ng số sản phẩm:<br />\r\n- K&iacute;ch thước sản phẩm (mm):<br />\r\n+ Size S - W450 x D380 x H120: d&agrave;nh cho c&aacute;c b&eacute; dưới 7kg<br />\r\n+ Size M - W550 x D450 x H130: d&agrave;nh cho c&aacute;c b&eacute; dưới 12kg<br />\r\n<br />\r\n- Trọng lượng sản phẩm (g): 390<br />\r\n<br />\r\nHƯỚNG DẪN VỆ SINH<br />\r\nC&oacute; thể dễ d&agrave;ng vệ sinh nệm bằng m&aacute;y giặt v&agrave; lau ch&ugrave;i thường xuy&ecirc;n bằng khăn ẩm.</p>', 170000, 'nem-vuong-cho-cho-meo-doggyman-vai-lanh-ha-nhiet51.webp', 0, NULL, NULL, NULL),
(23, 15, 'XỊT NẤM, GHẺ, RẬN ALKIN 50ML', '<p>Alkin Mitecyn trị ghẻ nấm 50ml cho ch&oacute; m&egrave;o</p>\r\n\r\n<p>Chuy&ecirc;n d&agrave;nh cho c&aacute;c b&eacute; bị nấm - N&ecirc;n kết hợp cắt tỉa l&ocirc;ng + phơi nắng cho c&aacute;c b&eacute;<br />\r\nChỉ định: Đặc trị c&aacute;c bệnh ngo&agrave;i da của ch&oacute; m&egrave;o do vi khuẩn, c&aacute;c bệnh thường gặp như: ghẻ mite, ghẻ demodex... v&agrave; c&aacute;c loại ghẻ nấm kh&aacute;c &aacute;p dụng cho th&uacute; cưng.<br />\r\nĐối tượng &aacute;p dụng: cho tất cả c&aacute;c giống ch&oacute; v&agrave; m&egrave;o từ 12 tuần tuổi trở l&ecirc;n.<br />\r\nC&aacute;ch sử dụng: Nếu c&oacute; thể h&atilde;y cạo l&ocirc;ng khu vực bị ảnh hưởng bởi vi khuẩn ngo&agrave;i da. Xịt v&agrave;o c&aacute;c khu vực xung quanh cho th&uacute; cưng với liều lượng đồng đều khắp khu vực cần điều trị. Nếu bị xịt v&agrave;o mắt th&uacute; cưng hoặc c&aacute;c khu vực nhạy cảm kh&aacute;c cần lấy khăn b&ocirc;ng ướt để lau sạch lại ngay sau khi xịt. Trong trường hợp vết thương nhiễm tr&ugrave;ng nặng cần phải sử dụng thuốc dưới sự tư vấn v&agrave; gi&aacute;m s&aacute;t của b&aacute;c sĩ th&uacute; y.<br />\r\n- Chỉ d&ugrave;ng ngo&agrave;i da, kh&ocirc;ng xịt v&agrave;o miệng th&uacute;<br />\r\nLiều lượng: N&ecirc;n sử dụng c&aacute;ch ng&agrave;y</p>', '<p><img alt=\"Xịt Nấm Ghẻ, Viêm Da, Ve Rận Alkinlab Mitecyn 50ml - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/5_a75460bc-7b63-46ce-9b89-7ecd79341a47.jpg?v=1692815674\" style=\"height:300px; width:300px\" />&nbsp;&nbsp;&nbsp;<img alt=\"Xịt Nấm Ghẻ, Viêm Da, Ve Rận Alkinlab Mitecyn 50ml - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/xit-nam-ghe-viem-da-ve-ran-alkinlab-mitecyn-50ml-paddy.jpg?v=1692815674\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>Alkin Mitecyn trị ghẻ nấm 50ml cho ch&oacute; m&egrave;o</p>\r\n\r\n<p>Chuy&ecirc;n d&agrave;nh cho c&aacute;c b&eacute; bị nấm - N&ecirc;n kết hợp cắt tỉa l&ocirc;ng + phơi nắng cho c&aacute;c b&eacute;<br />\r\nChỉ định: Đặc trị c&aacute;c bệnh ngo&agrave;i da của ch&oacute; m&egrave;o do vi khuẩn, c&aacute;c bệnh thường gặp như: ghẻ mite, ghẻ demodex... v&agrave; c&aacute;c loại ghẻ nấm kh&aacute;c &aacute;p dụng cho th&uacute; cưng.<br />\r\nĐối tượng &aacute;p dụng: cho tất cả c&aacute;c giống ch&oacute; v&agrave; m&egrave;o từ 12 tuần tuổi trở l&ecirc;n.<br />\r\nC&aacute;ch sử dụng: Nếu c&oacute; thể h&atilde;y cạo l&ocirc;ng khu vực bị ảnh hưởng bởi vi khuẩn ngo&agrave;i da. Xịt v&agrave;o c&aacute;c khu vực xung quanh cho th&uacute; cưng với liều lượng đồng đều khắp khu vực cần điều trị. Nếu bị xịt v&agrave;o mắt th&uacute; cưng hoặc c&aacute;c khu vực nhạy cảm kh&aacute;c cần lấy khăn b&ocirc;ng ướt để lau sạch lại ngay sau khi xịt. Trong trường hợp vết thương nhiễm tr&ugrave;ng nặng cần phải sử dụng thuốc dưới sự tư vấn v&agrave; gi&aacute;m s&aacute;t của b&aacute;c sĩ th&uacute; y.<br />\r\n- Chỉ d&ugrave;ng ngo&agrave;i da, kh&ocirc;ng xịt v&agrave;o miệng th&uacute;<br />\r\nLiều lượng: N&ecirc;n sử dụng c&aacute;ch ng&agrave;y</p>', 120000, 'xit-nam-ghe-viem-da-ve-ran-alkinlab-mitecyn-50ml1.webp', 0, NULL, NULL, NULL),
(25, 4, 'CÂY LĂN LÔNG CHÓ MÈO DẠNG KEO SIÊU DÍNH PADDY', '<p><img alt=\"Cây Lăn Lông Chó Mèo Dạng Keo Siêu Dính - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/cay-lan-long-cho-meo-keo-dinh.jpg?v=1690721006\" /></p>\r\n\r\n<p>- Dụng cụ lăn d&iacute;nh bụi bẩn, t&oacute;c, l&ocirc;ng th&uacute; cưng dạng con lăn, gi&aacute; rẻ v&agrave; dễ sử dụng.</p>\r\n\r\n<p>- Loại bỏ 99% bụi, t&oacute;c, mảnh vụn chỉ với một v&agrave;i đường lăn.</p>\r\n\r\n<p>- Băng d&iacute;nh an to&agrave;n v&agrave; th&acirc;n thiện với m&ocirc;i trường sẽ kh&ocirc;n l&agrave;m hỏng quần &aacute;o, ghế sofa, ga trải giường v&agrave; mền của bạn.</p>\r\n\r\n<p>- L&otilde;i giấy c&oacute; thể được thay thế, v&agrave; rẻ hơn khi mua kết hợp.</p>\r\n\r\n<p>- C&oacute; 60 lớp giấy d&iacute;nh trong một l&otilde;i</p>', '<p><img alt=\"Cây Lăn Lông Chó Mèo Dạng Keo Siêu Dính - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/6_661dc8bc-9725-4aa6-94af-226455fff219.jpg?v=1690721016\" style=\"height:300px; width:300px\" />&nbsp;&nbsp;<img alt=\"Cây Lăn Lông Chó Mèo Dạng Keo Siêu Dính - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/7_bae2b948-9b29-4413-9f88-f1121fb62cae.jpg?v=1690721018\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>- Dụng cụ lăn d&iacute;nh bụi bẩn, t&oacute;c, l&ocirc;ng th&uacute; cưng dạng con lăn, gi&aacute; rẻ v&agrave; dễ sử dụng.</p>\r\n\r\n<p>- Loại bỏ 99% bụi, t&oacute;c, mảnh vụn chỉ với một v&agrave;i đường lăn.</p>\r\n\r\n<p>- Băng d&iacute;nh an to&agrave;n v&agrave; th&acirc;n thiện với m&ocirc;i trường sẽ kh&ocirc;n l&agrave;m hỏng quần &aacute;o, ghế sofa, ga trải giường v&agrave; mền của bạn.</p>\r\n\r\n<p>- L&otilde;i giấy c&oacute; thể được thay thế, v&agrave; rẻ hơn khi mua kết hợp.</p>\r\n\r\n<p>- C&oacute; 60 lớp giấy d&iacute;nh trong một l&otilde;i</p>', 40000, '3_66ff872d-6f7e-43c4-84e0-3327c556c47240.webp', 0, NULL, NULL, NULL),
(29, 6, 'CHÓ POODLE', '<p><img alt=\"Bảng giá chó Poodle mới nhất 2023 | Poodlefamily\" src=\"https://poodlefamily.com/wp-content/uploads/2020/11/tiny-poodle-600x800-1.png\" /></p>\r\n\r\n<p><strong>Ch&oacute; Poodle &ndash; Người bạn th&ocirc;ng minh v&agrave; dễ huấn luyện</strong></p>\r\n\r\n<p>Ch&oacute; Poodle (hay c&ograve;n gọi l&agrave; Poodle, Pudel) l&agrave; một giống ch&oacute; nổi bật với vẻ ngo&agrave;i thanh lịch v&agrave; tr&iacute; th&ocirc;ng minh vượt trội. Nguồn gốc của Poodle l&agrave; từ Đức, nơi ch&uacute;ng được nu&ocirc;i để l&agrave;m ch&oacute; săn, đặc biệt l&agrave; săn chim nước. Hiện nay, Poodle l&agrave; một trong những giống ch&oacute; được ưa chuộng nhất tr&ecirc;n thế giới nhờ v&agrave;o t&iacute;nh c&aacute;ch th&acirc;n thiện, th&ocirc;ng minh v&agrave; dễ d&agrave;ng huấn luyện.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Poodle l&agrave; giống ch&oacute; cực kỳ th&ocirc;ng minh, nhanh nhẹn v&agrave; dễ huấn luyện. Ch&uacute;ng rất t&igrave;nh cảm, gắn b&oacute; với chủ v&agrave; c&oacute; xu hướng t&igrave;m kiếm sự ch&uacute; &yacute;. Poodle cũng nổi bật với khả năng học hỏi nhanh, v&igrave; vậy ch&uacute;ng thường tham gia c&aacute;c hoạt động thể thao ch&oacute; như agility (chạy vượt chướng ngại vật) hoặc c&aacute;c cuộc thi biểu diễn. Ch&uacute;ng l&agrave; những người bạn đồng h&agrave;nh tuyệt vời trong gia đ&igrave;nh.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Poodle l&agrave; giống ch&oacute; l&yacute; tưởng cho c&aacute;c gia đ&igrave;nh c&oacute; kh&ocirc;ng gian sống rộng r&atilde;i hoặc căn hộ. Ch&uacute;ng cũng th&iacute;ch hợp với những người y&ecirc;u th&iacute;ch c&aacute;c hoạt động tr&iacute; tuệ, huấn luyện v&agrave; c&aacute;c tr&ograve; chơi tương t&aacute;c.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Chăm s&oacute;c l&ocirc;ng</strong>: Bộ l&ocirc;ng xoăn đặc trưng của Poodle cần được chăm s&oacute;c thường xuy&ecirc;n, chải l&ocirc;ng v&agrave; cắt tỉa để tr&aacute;nh rối v&agrave; giữ cho ch&uacute;ng sạch sẽ.</li>\r\n	<li><strong>Vận động</strong>: Poodle cần được vận động đều đặn, tham gia c&aacute;c tr&ograve; chơi hoặc đi dạo h&agrave;ng ng&agrave;y để duy tr&igrave; sức khỏe v&agrave; tinh thần vui vẻ.</li>\r\n	<li><strong>Sức khỏe</strong>: Poodle l&agrave; giống ch&oacute; khỏe mạnh nhưng c&oacute; thể gặp phải một số vấn đề về xương khớp, mắt hoặc tim mạch, v&igrave; vậy cần kiểm tra sức khỏe định kỳ.</li>\r\n	<li><strong>T&iacute;nh c&aacute;ch</strong>: D&ugrave; rất t&igrave;nh cảm, Poodle c&oacute; thể kh&aacute; nhạy cảm v&agrave; dễ bị lo lắng nếu thiếu sự quan t&acirc;m hoặc bị bỏ rơi. Ch&uacute;ng cần sự tương t&aacute;c v&agrave; t&igrave;nh y&ecirc;u thương từ chủ nh&acirc;n để tr&aacute;nh cảm gi&aacute;c c&ocirc; đơn.</li>\r\n</ol>\r\n\r\n<p>Với sự th&ocirc;ng minh, t&igrave;nh cảm v&agrave; khả năng th&iacute;ch nghi tốt, Poodle sẽ l&agrave; một người bạn trung th&agrave;nh v&agrave; đ&aacute;ng y&ecirc;u cho gia đ&igrave;nh bạn!</p>', '<p><img alt=\"Bảng giá chó Poodle mới nhất 2023 | Poodlefamily\" src=\"https://poodlefamily.com/wp-content/uploads/2020/11/tiny-poodle-600x800-1.png\" /></p>\r\n\r\n<p><strong>Ch&oacute; Poodle l&agrave; giống ch&oacute; săn vịt, rất giỏi trong việc bơi lội.</strong>&nbsp;T&ecirc;n gọi&nbsp;<strong>&ldquo;Poodle&rdquo; xuất ph&aacute;t từ chữ &ldquo;Pudel&rdquo; trong tiếng Đức</strong>, dịch ra c&oacute; nghĩa<strong>&nbsp;l&agrave; &ldquo;thợ lặn&rdquo; hay &ldquo;ch&oacute; nước&rdquo;.</strong></p>\r\n\r\n<p>Lo&agrave;i ch&oacute; n&agrave;y l&agrave; &ldquo;hậu duệ&rdquo; của c&aacute;c giống ch&oacute; French Water dog, Hungarian Water Hound v&agrave; Barbet. Hiện nay,&nbsp;<strong>ch&uacute;ng được lai tạo lại v&agrave; trở th&agrave;nh giống ch&oacute; cảnh với bộ l&ocirc;ng xoăn t&iacute;t v&agrave; d&aacute;ng người nhỏ nhắn.</strong></p>\r\n\r\n<p>Từ khoảng 400 trước, giống ch&oacute; n&agrave;y đ&atilde; được nu&ocirc;i phổ biến tại c&aacute;c nước T&acirc;y &Acirc;u. Tuy nhi&ecirc;n đến nay, nguồn gốc của ch&oacute; Poodle vẫn chưa x&aacute;c định r&otilde; v&agrave; được tranh c&atilde;i rằng ch&uacute;ng c&oacute; xuất xứ từ Đức, Ph&aacute;p hay Đan Mạch&hellip;</p>', 10000000, 'poodle79.jpg', 0, NULL, NULL, NULL),
(30, 15, 'VITAMIN TỔNG HỢP SPIRIT', '<p><strong>VI&Ecirc;N SPIRIT BỔ SUNG CANXI CHO CH&Oacute;:</strong></p>\r\n\r\n<p>- N&ecirc;n d&ugrave;ng v&agrave;o buổi s&aacute;ng sớm, kết hợp phơi nắng trước 8h s&aacute;ng gi&uacute;p c&uacute;n chắc khỏe xương, ph&ograve;ng ngừa c&aacute;c bệnh về da. Canxi cần kết hợp với Vitamin D từ &aacute;nh s&aacute;ng mặt trời mới gi&uacute;p hấp thụ tốt v&agrave;o cơ thể.</p>\r\n\r\n<p>- Ph&ograve;ng ngừa thiếu hụt canxi, hạ b&agrave;n, bại liệt, ch&acirc;n yếu ở ch&oacute;...</p>\r\n\r\n<p><strong>VI&Ecirc;N SPIRIT BỔ SUNG KHO&Aacute;NG CHẤT</strong></p>\r\n\r\n<p>- Bổ sung chất kho&aacute;ng cần thiết cho cơ thể c&aacute;c b&eacute; c&uacute;n. - Những b&eacute; c&uacute;n thiếu kho&aacute;ng thường c&oacute; biểu hiện ăn cỏ, ăn đất, ăn ph&acirc;n, ăn v&ocirc;i tường... cần bổ sung th&ecirc;m vi&ecirc;n vitamin v&agrave; vi&ecirc;n kho&aacute;ng chất cho c&uacute;n.</p>\r\n\r\n<p><strong>VI&Ecirc;N SPIRIT DƯỠNG L&Ocirc;NG, L&Agrave;M ĐẸP DA V&Agrave; L&Ocirc;NG</strong></p>\r\n\r\n<p>- K&iacute;ch th&iacute;ch mọc l&ocirc;ng, mượt l&ocirc;ng, giảm thiểu rụng v&agrave; xơ l&ocirc;ng.</p>\r\n\r\n<p>- C&aacute;c b&eacute; c&uacute;n l&ocirc;ng nhiều như Pom, Poodle, Maltese, Bichon... rất cần thiết cho việc chăm s&oacute;c bộ l&ocirc;ng d&agrave;y v&agrave; chắc khỏe.</p>\r\n\r\n<p>- Những b&eacute; đang cạo l&ocirc;ng cần bổ sung vi&ecirc;n dưỡng l&ocirc;ng để l&ocirc;ng nhanh ch&oacute;ng mọc d&agrave;i v&agrave; d&agrave;y dặn, mượt m&agrave; v&agrave; kh&ocirc;ng bị thưa l&ocirc;ng xơ x&aacute;c nh&eacute;.</p>\r\n\r\n<p><strong>VI&Ecirc;N SPIRIT BỔ SUNG VITAMIN</strong></p>\r\n\r\n<p>- C&aacute;c b&eacute; c&uacute;n cũng như người, cần đầy đủ vitamin kho&aacute;ng chất để cơ thể ph&aacute;t triển khỏe mạnh, tăng sức đề kh&aacute;ng, giảm thiểu c&aacute;c nguy cơ thiếu hụt vitamin l&agrave; t&aacute;c nh&acirc;n khiến c&aacute;c b&eacute; ốm yếu, c&ograve;i cọc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>SỬ DỤNG</strong></p>\r\n\r\n<p>- Dưới 5kg: 2 vi&ecirc;n/ng&agrave;y.</p>\r\n\r\n<p>- Từ 10-25kg: 3-4 vi&ecirc;n/ng&agrave;y.</p>\r\n\r\n<p>- Từ 25-35kg: 5-6 vi&ecirc;n/ng&agrave;y.</p>\r\n\r\n<p>- Tr&ecirc;n 35kg: 8-10 vi&ecirc;n/ng&agrave;y.</p>', '<p><img alt=\"vitamin-cho-cho-vien-spirit\" src=\"https://cdn.shopify.com/s/files/1/0624/1746/9697/products/ScreenShot2023-01-01at13.27.16_600x600.png?v=1673424008\" /></p>\r\n\r\n<p>Vi&ecirc;n Vitamin Spirit&nbsp;được kh&aacute; nhiều sen ưu &aacute;i trong&nbsp;top 5 loại Vitamin d&agrave;nh cho ch&oacute; tốt nhất. N&oacute; c&oacute; 4 loại: Bổ sung canxi; bổ sung vitamin; dưỡng l&ocirc;ng Hair Beauty; chất kho&aacute;ng Micro. Với Spirit bổ sung canxi gi&uacute;p xương chắc khỏe. Kh&ocirc;ng chỉ vậy, n&oacute; c&ograve;n gi&uacute;p ph&ograve;ng c&aacute;c bệnh về da. Với loại Spirit bổ sung vitamin, gi&uacute;p hạn chế t&igrave;nh trạng ốm yếu, c&ograve;i cọc v&agrave; gi&uacute;p tăng đề kh&aacute;ng. Dưỡng l&ocirc;ng Hair Beauty d&agrave;nh cho những b&eacute; ch&oacute; c&oacute; l&ocirc;ng d&agrave;y v&agrave; d&agrave;i như poodle, pom, bichon,... Loại n&agrave;y gi&uacute;p c&uacute;n hạn chế rụng l&ocirc;ng, rối l&ocirc;ng v&agrave; k&iacute;ch th&iacute;ch mọc l&ocirc;ng.. Với Spirit bổ sung chất kho&aacute;ng, c&oacute; c&ocirc;ng dụng l&agrave; cải thiện t&igrave;nh trạng biếng ăn, k&eacute;n ăn ở ch&oacute;, gi&uacute;p ch&oacute; tăng đề kh&aacute;ng, miễn dịch.</p>', 150000, 'vien-bo-xung-vitamin-cho-cho-spirit-vitamin-tablets-lo-160g579.webp', 0, NULL, NULL, NULL),
(31, 14, 'BALO PHI HÀNH GIA TRONG SUỐT VẬN CHUYỂN CHÓ MÈO', '<p>Balo phi h&agrave;nh gia cho th&uacute; cưng, balo phi h&agrave;nh gia trong suốt vận chuyển ch&oacute; m&egrave;o</p>\r\n\r\n<p>- Chất liệu: Nhựa cao cấp PVC<br />\r\n- K&iacute;ch thước: 43*33*28cm<br />\r\n- Th&iacute;ch hợp với th&uacute; cưng dưới 7kg</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>Balo đựng ch&oacute; m&egrave;o phi h&agrave;nh gia&nbsp;<a href=\"https://www.petmart.vn/thuong-hieu/loffe\">LOFFE</a>&nbsp;Bubble Bag l&agrave; sản phẩm t&uacute;i vũ trụ d&ugrave;ng để vận chuyển, mang, đựng c&aacute;c giống th&uacute; cưng như ch&oacute;, m&egrave;o, thỏ, hamster cỡ vừa v&agrave; nhỏ.</p>\r\n\r\n<p>Balo đựng ch&oacute; m&egrave;o phi h&agrave;nh gia LOFFE Bubble Bag được thiết kế nhiều lỗ th&ocirc;ng kh&iacute; gi&uacute;p cho th&uacute; cưng một kh&ocirc;ng gian thoải m&aacute;i. Sản phẩm c&oacute; nhiều m&agrave;u sắc để lựa chọn.</p>\r\n\r\n<p><img alt=\"Balo đựng chó mèo phi hành gia LOFFE Bubble Bag | Pet Mart Cửa Hàng Thú Cưng\" src=\"https://www.petmart.vn/wp-content/uploads/2021/08/balo-dung-cho-meo-phi-hanh-gia-loffe-bubble-bag4.jpg\" style=\"height:500px; width:500px\" /></p>', 200000, 'balo-dung-cho-meo-phi-hanh-gia-loffe-bubble-bag415.jpg', 0, NULL, NULL, NULL),
(32, 15, 'NHỎ MẮT ALKIN OMNIX CHO CHÓ', '<p><img alt=\"Nhỏ Mắt và Phòng Đau Mắt Alkin Omnix Cho Chó Mèo - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/nho-mat-va-phong-djau-mat-alkin-omnix-cho-cho-meo-paddy-2.jpg?v=1692815555\" style=\"height:500px; width:500px\" /></p>', '<p><img alt=\"Nhỏ Mắt và Phòng Đau Mắt Alkin Omnix Cho Chó Mèo - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/nho-mat-va-phong-djau-mat-alkin-omnix-cho-cho-meo-paddy-2.jpg?v=1692815555\" style=\"height:500px; width:500px\" /></p>\r\n\r\n<p>* Điều trị c&aacute;c bệnh truyền nhiễm về mắt, như vi&ecirc;m gi&aacute;c mạc, vi&ecirc;m kết mạc, vi&ecirc;m bờ mi&hellip;</p>\r\n\r\n<p>* Điều trị c&aacute;c chứng vi&ecirc;m, chảy nước mắt, ngứa, sưng đỏ, gh&egrave;n mắt, kh&ocirc; mắt, c&oacute; chất tiết bất thường&hellip;</p>\r\n\r\n<p>* An to&agrave;n cho ch&oacute; m&egrave;o từ 7 tuần tuổi trở l&ecirc;n.</p>\r\n\r\n<p>Th&agrave;nh phần</p>\r\n\r\n<p>Anti-inlammatory&hellip;&hellip;&hellip;.&hellip;&hellip;&hellip;,8%</p>\r\n\r\n<p>Synergistis ingredients&hellip;&hellip;&hellip;&hellip;,5%</p>\r\n\r\n<p>Other ingredients&hellip;&hellip;&hellip;&hellip;&hellip;&hellip; 86,7%</p>\r\n\r\n<p>Total&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;,0%</p>\r\n\r\n<p>Hướng dẫn sử dụng</p>\r\n\r\n<p>- D&ugrave;ng để điều trị: nhỏ 5-10 giọt/ lần/ mắt, 2 lần/ ng&agrave;y (buổi s&aacute;ng v&agrave; tối), li&ecirc;n tục trong 1 tuần. Sau khi chữa khỏi, cần nhỏ tiếp tục 3-5 giọt/ mắt/ lần; 2 ng&agrave;y/ lần; li&ecirc;n tục trong 1 tuần.</p>\r\n\r\n<p>- D&ugrave;ng để chăm s&oacute;c: nhỏ 3-5 giọt/ mắt/ lần.</p>\r\n\r\n<p>Quy c&aacute;ch đ&oacute;ng g&oacute;i: chai 10ml</p>', 105000, 'nho-mat-va-phong-dau-mat-alkin-omnix-cho-cho-meo90.webp', 0, NULL, NULL, NULL),
(33, 15, 'VÒNG CỔ GIẢM STRESS CHO CHÓ', '<p>- V&ograve;ng cổ thư gi&atilde;n Beaphar gi&uacute;p giảm c&aacute;c h&agrave;nh vi tinh nghịch do ch&uacute; ch&oacute; của bạn g&acirc;y ra khi ch&uacute;ng gặp căng thẳng, c&oacute; thể sử dụng cho mọi giống ch&oacute;, k&iacute;ch cỡ v&agrave; độ tuổi.</p>\r\n\r\n<p>- C&aacute;c loại tinh dầu chiết xuất từ thi&ecirc;n nhi&ecirc;n c&oacute; trong v&ograve;ng cổ sẽ được giải ph&oacute;ng từ từ trong v&ograve;ng 4-5 tuần để gi&uacute;p ch&uacute; ch&oacute; của bạn cảm thấy thư gi&atilde;n, b&igrave;nh tĩnh hơn, từ đ&oacute; giảm c&aacute;c h&agrave;nh vi ph&aacute; hoại.</p>\r\n\r\n<p>- Đối với những ch&uacute; ch&oacute; vừa về nh&agrave; mới, việc thay đổi m&ocirc;i trường sống c&oacute; thể khiến ch&uacute;ng cảm thấy căng thẳng. Sử dụng v&ograve;ng cổ thư gi&atilde;n Beaphar để gi&uacute;p ch&uacute; ch&oacute; của bạn nhanh ch&oacute;ng h&ograve;a nhập với m&ocirc;i trường mới v&agrave; cảm thấy an to&agrave;n để thoải m&aacute;i mở l&ograve;ng trở th&agrave;nh một người bạn đồng h&agrave;nh đ&iacute;ch thực trong gia đ&igrave;nh.</p>\r\n\r\n<p>- Ngo&agrave;i ra khi sử dụng sản phẩm cho c&aacute;c ch&uacute; ch&oacute; c&oacute; biểu hiện của Hội chứng sợ ph&acirc;n ly, sẽ l&agrave;m giảm sự lo &acirc;u căng thẳng, ngăn ngừa được việc sủa qu&aacute; mức, gặm cắn đồ đạc v&agrave; đi vệ sinh kh&ocirc;ng đ&uacute;ng chỗ.</p>\r\n\r\n<p><img alt=\"Vòng Cổ Giảm Stress Cho CHÓ Thư Giãn Beaphar Calming - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/vong-co-giam-stress-cho-cho-thu-gian-beaphar-calming-paddy-5.jpg?v=1692815946\" style=\"height:600px; width:600px\" /><img alt=\"Vòng Cổ Giảm Stress Cho CHÓ Thư Giãn Beaphar Calming - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/vong-co-giam-stress-cho-cho-thu-gian-beaphar-calming-paddy-2.jpg?v=1692815946\" style=\"height:600px; width:600px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p>- V&ograve;ng cổ thư gi&atilde;n Beaphar gi&uacute;p giảm c&aacute;c h&agrave;nh vi tinh nghịch do ch&uacute; ch&oacute; của bạn g&acirc;y ra khi ch&uacute;ng gặp căng thẳng, c&oacute; thể sử dụng cho mọi giống ch&oacute;, k&iacute;ch cỡ v&agrave; độ tuổi.</p>\r\n\r\n<p>- C&aacute;c loại tinh dầu chiết xuất từ thi&ecirc;n nhi&ecirc;n c&oacute; trong v&ograve;ng cổ sẽ được giải ph&oacute;ng từ từ trong v&ograve;ng 4-5 tuần để gi&uacute;p ch&uacute; ch&oacute; của bạn cảm thấy thư gi&atilde;n, b&igrave;nh tĩnh hơn, từ đ&oacute; giảm c&aacute;c h&agrave;nh vi ph&aacute; hoại.</p>\r\n\r\n<p>- Đối với những ch&uacute; ch&oacute; vừa về nh&agrave; mới, việc thay đổi m&ocirc;i trường sống c&oacute; thể khiến ch&uacute;ng cảm thấy căng thẳng. Sử dụng v&ograve;ng cổ thư gi&atilde;n Beaphar để gi&uacute;p ch&uacute; ch&oacute; của bạn nhanh ch&oacute;ng h&ograve;a nhập với m&ocirc;i trường mới v&agrave; cảm thấy an to&agrave;n để thoải m&aacute;i mở l&ograve;ng trở th&agrave;nh một người bạn đồng h&agrave;nh đ&iacute;ch thực trong gia đ&igrave;nh.</p>\r\n\r\n<p>- Ngo&agrave;i ra khi sử dụng sản phẩm cho c&aacute;c ch&uacute; ch&oacute; c&oacute; biểu hiện của Hội chứng sợ ph&acirc;n ly, sẽ l&agrave;m giảm sự lo &acirc;u căng thẳng, ngăn ngừa được việc sủa qu&aacute; mức, gặm cắn đồ đạc v&agrave; đi vệ sinh kh&ocirc;ng đ&uacute;ng chỗ.</p>\r\n\r\n<p><img alt=\"Vòng Cổ Giảm Stress Cho CHÓ Thư Giãn Beaphar Calming - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/vong-co-giam-stress-cho-cho-thu-gian-beaphar-calming-paddy-5.jpg?v=1692815946\" style=\"height:600px; width:600px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', 232000, 'vong-co-giam-stress-cho-thu-gian-beaphar-calming40.webp', 0, NULL, NULL, NULL),
(35, 14, 'CHUỐNG CHÓ MÈO VẬN CHUYỂN HÀNG KHÔNG PADDY', '<p><img alt=\"Chuồng Chó Mèo Vận Chuyển Hàng Không - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/long-hang-khong-long-van-chuyen-cho-meo-paddy-2.jpg?v=1710142321\" style=\"height:300px; width:300px\" />&nbsp; <img alt=\"Chuồng Chó Mèo Vận Chuyển Hàng Không - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/long-hang-khong-long-van-chuyen-cho-meo-paddy-8.jpg?v=1710142321\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p><strong>Th&ocirc;ng tin chung:&nbsp;</strong></p>\r\n\r\n<p>Thương hiệu: Paddy</p>\r\n\r\n<p>Ph&ugrave; hợp cho: Ch&oacute;/m&egrave;o mọi lứa tuổi</p>\r\n\r\n<p>Chuồng ch&oacute; m&egrave;o&nbsp;vận chuyển h&agrave;ng kh&ocirc;ng l&agrave; một sản phẩm được thiết kế đặc biệt để đảm bảo an to&agrave;n v&agrave; thoải m&aacute;i cho ch&oacute; m&egrave;o khi đi du lịch hoặc di chuyển bằng m&aacute;y bay. Tương tự như c&aacute;c&nbsp;balo th&uacute; cưng, Chuồng được l&agrave;m bằng vật liệu nhẹ nhưng chắc chắn, c&oacute; c&aacute;c lỗ th&ocirc;ng gi&oacute; để đảm bảo hơi thở tốt cho ch&uacute;ng.</p>\r\n\r\n<p>Chuồng c&oacute; nhiều k&iacute;ch cỡ kh&aacute;c nhau để ph&ugrave; hợp với k&iacute;ch thước của từng loại ch&oacute; m&egrave;o như&nbsp;Poodle,&nbsp;m&egrave;o anh l&ocirc;ng ngắn&hellip; Nếu bạn di chuyển bằng m&aacute;y bay c&ugrave;ng với ch&uacute; m&egrave;o của m&igrave;nh, thay v&igrave; sử dụng&nbsp;balo m&egrave;o, chuồng ch&oacute; m&egrave;o vận chuyển h&agrave;ng kh&ocirc;ng sẽ l&agrave; một sản phẩm cần thiết để đảm bảo cho ch&uacute;ng an to&agrave;n v&agrave; thoải m&aacute;i.</p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Thiết kế ph&ugrave; hợp với ti&ecirc;u chuẩn k&yacute; gửi th&uacute; cưng trong c&aacute;c chuyến h&agrave;ng kh&ocirc;ng nội địa, t&agrave;u hoả, &ocirc; t&ocirc;.</p>\r\n\r\n<p>Dễ d&agrave;ng r&agrave;ng sau xe m&aacute;y, hoặc cốp &ocirc; t&ocirc; gia đ&igrave;nh.</p>\r\n\r\n<p>Chất liệu nhựa PP si&ecirc;u bền, m&oacute;c th&eacute;p kh&ocirc;ng gỉ chắc chắn.</p>\r\n\r\n<p>Thiết kế với nhiều lỗ tho&aacute;ng kh&iacute;, gi&uacute;p th&uacute; cưng lu&ocirc;n thoải m&aacute;i khi đi xa.</p>\r\n\r\n<p>Lồng chắc chắn, chịu được va đập mạnh, bảo vệ an to&agrave;n cho th&uacute; cưng của bạn</p>\r\n\r\n<p>Dễ d&agrave;ng th&aacute;o rời v&agrave; lắp đặt, vệ sinh v&agrave; bảo quản.</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Chất liệu: Nhựa PP v&agrave; th&eacute;p kh&ocirc;ng gỉ</p>\r\n\r\n<p>M&agrave;u sắc: Giao ngẫu nhi&ecirc;n hoặc inbox với Paddy để chọn m&agrave;u</p>\r\n\r\n<p>K&iacute;ch thước của từng size:</p>\r\n\r\n<p>+Size 48CM: 48x32x30cm, nặng 1.3kg, ph&ugrave; hợp cho th&uacute; cưng dưới 6kg</p>\r\n\r\n<p>+Size 58CM: 58x37x35cm, nặng 2.35kg, ph&ugrave; hợp cho th&uacute; cưng dưới 10kg</p>\r\n\r\n<p>+Size 66CM: 66x46x46cm, nặng 3.8kg, ph&ugrave; hợp cho th&uacute; cưng dưới 20kg</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>Chọn k&iacute;ch thước chuồng ph&ugrave; hợp cho ch&oacute; hoặc m&egrave;o của bạn.</p>\r\n\r\n<p>Đặt chiếc chuồng tr&ecirc;n mặt phẳng bằng v&agrave; cho th&uacute; cưng của bạn v&agrave;o b&ecirc;n trong.</p>\r\n\r\n<p>Đảm bảo rằng c&aacute;c kh&oacute;a an to&agrave;n được k&iacute;ch hoạt để th&uacute; cưng của bạn kh&ocirc;ng trốn tho&aacute;t trong qu&aacute; tr&igrave;nh vận chuyển.</p>', '<p><img alt=\"Chuồng Chó Mèo Vận Chuyển Hàng Không - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/long-hang-khong-long-van-chuyen-cho-meo-paddy-2.jpg?v=1710142321\" style=\"height:300px; width:300px\" />&nbsp;&nbsp;<img alt=\"Chuồng Chó Mèo Vận Chuyển Hàng Không - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/long-hang-khong-long-van-chuyen-cho-meo-paddy-8.jpg?v=1710142321\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p><strong>Th&ocirc;ng tin chung:&nbsp;</strong></p>\r\n\r\n<p>Thương hiệu: Paddy</p>\r\n\r\n<p>Ph&ugrave; hợp cho: Ch&oacute;/m&egrave;o mọi lứa tuổi</p>\r\n\r\n<p>Chuồng ch&oacute; m&egrave;o&nbsp;vận chuyển h&agrave;ng kh&ocirc;ng l&agrave; một sản phẩm được thiết kế đặc biệt để đảm bảo an to&agrave;n v&agrave; thoải m&aacute;i cho ch&oacute; m&egrave;o khi đi du lịch hoặc di chuyển bằng m&aacute;y bay. Tương tự như c&aacute;c&nbsp;balo th&uacute; cưng, Chuồng được l&agrave;m bằng vật liệu nhẹ nhưng chắc chắn, c&oacute; c&aacute;c lỗ th&ocirc;ng gi&oacute; để đảm bảo hơi thở tốt cho ch&uacute;ng.</p>\r\n\r\n<p>Chuồng c&oacute; nhiều k&iacute;ch cỡ kh&aacute;c nhau để ph&ugrave; hợp với k&iacute;ch thước của từng loại ch&oacute; m&egrave;o như&nbsp;Poodle,&nbsp;m&egrave;o anh l&ocirc;ng ngắn&hellip; Nếu bạn di chuyển bằng m&aacute;y bay c&ugrave;ng với ch&uacute; m&egrave;o của m&igrave;nh, thay v&igrave; sử dụng&nbsp;balo m&egrave;o, chuồng ch&oacute; m&egrave;o vận chuyển h&agrave;ng kh&ocirc;ng sẽ l&agrave; một sản phẩm cần thiết để đảm bảo cho ch&uacute;ng an to&agrave;n v&agrave; thoải m&aacute;i.</p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Thiết kế ph&ugrave; hợp với ti&ecirc;u chuẩn k&yacute; gửi th&uacute; cưng trong c&aacute;c chuyến h&agrave;ng kh&ocirc;ng nội địa, t&agrave;u hoả, &ocirc; t&ocirc;.</p>\r\n\r\n<p>Dễ d&agrave;ng r&agrave;ng sau xe m&aacute;y, hoặc cốp &ocirc; t&ocirc; gia đ&igrave;nh.</p>\r\n\r\n<p>Chất liệu nhựa PP si&ecirc;u bền, m&oacute;c th&eacute;p kh&ocirc;ng gỉ chắc chắn.</p>\r\n\r\n<p>Thiết kế với nhiều lỗ tho&aacute;ng kh&iacute;, gi&uacute;p th&uacute; cưng lu&ocirc;n thoải m&aacute;i khi đi xa.</p>\r\n\r\n<p>Lồng chắc chắn, chịu được va đập mạnh, bảo vệ an to&agrave;n cho th&uacute; cưng của bạn</p>\r\n\r\n<p>Dễ d&agrave;ng th&aacute;o rời v&agrave; lắp đặt, vệ sinh v&agrave; bảo quản.</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Chất liệu: Nhựa PP v&agrave; th&eacute;p kh&ocirc;ng gỉ</p>\r\n\r\n<p>M&agrave;u sắc: Giao ngẫu nhi&ecirc;n hoặc inbox với Paddy để chọn m&agrave;u</p>\r\n\r\n<p>K&iacute;ch thước của từng size:</p>\r\n\r\n<p>+Size 48CM: 48x32x30cm, nặng 1.3kg, ph&ugrave; hợp cho th&uacute; cưng dưới 6kg</p>\r\n\r\n<p>+Size 58CM: 58x37x35cm, nặng 2.35kg, ph&ugrave; hợp cho th&uacute; cưng dưới 10kg</p>\r\n\r\n<p>+Size 66CM: 66x46x46cm, nặng 3.8kg, ph&ugrave; hợp cho th&uacute; cưng dưới 20kg</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>Chọn k&iacute;ch thước chuồng ph&ugrave; hợp cho ch&oacute; hoặc m&egrave;o của bạn.</p>\r\n\r\n<p>Đặt chiếc chuồng tr&ecirc;n mặt phẳng bằng v&agrave; cho th&uacute; cưng của bạn v&agrave;o b&ecirc;n trong.</p>\r\n\r\n<p>Đảm bảo rằng c&aacute;c kh&oacute;a an to&agrave;n được k&iacute;ch hoạt để th&uacute; cưng của bạn kh&ocirc;ng trốn tho&aacute;t trong qu&aacute; tr&igrave;nh vận chuyển.</p>', 320000, 'long-hang-khong-long-van-chuyen-cho-meo-paddy-480.webp', 0, NULL, NULL, NULL),
(36, 14, 'LỒNG VẬN CHUYỂN HÀNG KHÔNG CHÓ MÈO JET VALI', '<p>&nbsp;</p>\r\n\r\n<p>ĐẶC ĐIỂM:<br />\r\n- Lồng l&agrave;m bằng chất liệu nhựa cao cấp, bền chắc, kh&ocirc;ng c&oacute; m&ugrave;i lạ, chuy&ecirc;n d&ugrave;ng để vận chuyển ch&oacute; m&egrave;o bằng đường h&agrave;ng kh&ocirc;ng.<br />\r\n- Cửa lồng bằng nhựa chuy&ecirc;n dụng. Kh&ocirc;ng g&acirc;y ảnh hưởng cho pet cưng của bạn.<br />\r\n- Kh&oacute;a c&agrave;i chắc chắn, đảm bảo cho Pet của bạn an to&agrave;n b&ecirc;n trong lồng.<br />\r\n- Bề mặt chống trầy xước, đảm bảo lồng của bạn lu&ocirc;n bền với thời gian.<br />\r\n- M&agrave;u sắc ấn tượng, t&ocirc;ng m&agrave;u h&agrave;i h&ograve;a . Lồng vận chuyển c&oacute; m&agrave;u sắc s&aacute;ng đẹp, thiết kế tinh tế với m&agrave;u sắc ấn tượng sẽ l&agrave; điểm nhấn nổi bật cho những ch&uacute; ch&oacute; hay m&egrave;o khi đi du lịch c&ugrave;ng bạn.<br />\r\n- Thiết kế mặt th&ocirc;ng hơi, tho&aacute;ng kh&iacute; gi&uacute;p c&aacute;c b&eacute; thoải m&aacute;i trong qu&aacute; tr&igrave;nh vận chuyển.<br />\r\n- Dễ d&agrave;ng th&aacute;o lắp để vệ sinh lồng v&agrave; gấp gọn khi kh&ocirc;ng sử dụng tới<br />\r\n- Ph&ugrave; hợp với vận chuyển h&agrave;ng kh&ocirc;ng m&aacute;y bay, t&agrave;u hoả, &ocirc; t&ocirc;,...</p>', '<p><img alt=\"Lồng Vận Chuyển Hàng Không Chó Mèo Jet Vali - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/long-van-chuyen-cho-meo-jet-vali-paddy-3.jpg?v=1710141204\" style=\"height:300px; width:300px\" />&nbsp; &nbsp;<img alt=\"Lồng Vận Chuyển Hàng Không Chó Mèo Jet Vali - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/long-van-chuyen-cho-meo-jet-vali-paddy-2.jpg?v=1710141204\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>Lồng Vận Chuyển Ch&oacute; M&egrave;o Jet Vali<br />\r\n<br />\r\n- Lồng vận chuyển h&agrave;ng kh&ocirc;ng cho ch&oacute;, m&egrave;o được thiết kế đặc biệt đ&aacute;p ứng được nhu cầu của th&uacute; cưng cũng như của c&aacute;c h&atilde;ng h&agrave;ng kh&ocirc;ng. Khi ch&oacute; được vận chuyển trong khoang h&agrave;nh kh&aacute;ch th&igrave; những ch&uacute; ch&oacute;, m&egrave;o sẽ được đặt trong chiếc lồng n&agrave;y v&agrave; đặt b&ecirc;n dưới ghế c&ugrave;ng với chủ đi c&ugrave;ng. C&ograve;n với những ch&uacute; ch&oacute;, m&egrave;o m&agrave; được vận chuyển theo h&igrave;nh thức k&yacute; gửi h&agrave;ng h&oacute;a, th&igrave; chiếc lồng n&agrave;y vẫn đảm bảo chắc chắn, chốt cửa cẩn thận cũng như độ th&ocirc;ng tho&aacute;ng cần thiết để ch&oacute; h&iacute;t thở, n&ecirc;n bạn kh&ocirc;ng phải lo lắng đến khả năng ch&oacute; của m&igrave;nh bị xổng ra ngo&agrave;i trong chuyến bay nh&eacute;.<br />\r\n<br />\r\n- Chiếc lồng được tạo n&ecirc;n bởi 2 nửa ri&ecirc;ng biệt, li&ecirc;n kết với nhau bởi chốt cao su n&ecirc;n bạn c&oacute; thể dễ d&agrave;ng th&aacute;o lắp, vệ sinh nhanh ch&oacute;ng, đơn giản. Phần cửa chuồng được l&agrave;m bằng nhựa cao cấp, độ bền cao.<br />\r\n<br />\r\n- Chiếc lồng cho ch&oacute; m&egrave;o d&ugrave;ng được tr&ecirc;n m&aacute;y bay n&agrave;y c&oacute; 2 m&agrave;u sắc chốt kh&aacute;c nhau l&agrave; m&agrave;u hồng, m&agrave;u cam (như h&igrave;nh). Lồng được thiết kế mang t&iacute;nh thẩm mỹ cao, gi&uacute;p tạo ấn tượng cho c&uacute;n v&agrave; miu của bạn, n&oacute; sẽ cảm thấy th&iacute;ch th&uacute; trong &ldquo;ng&ocirc;i nh&agrave;&rdquo; n&agrave;y.</p>', 375000, 'long-van-chuyen-cho-meo-jet-vali5.webp', 0, NULL, NULL, NULL),
(37, 14, 'NHÀ NỆM CHO CHÓ MÈO HÌNH LỀU CẮM TRẠI ZEZE', '<p><img alt=\"Nhà Nệm Cho Chó Mèo Hình Lều Cắm Trại ZEZE - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/0_1.webp?v=1697452539\" style=\"height:300px; width:300px\" />&nbsp; &nbsp;<img alt=\"Nhà Nệm Cho Chó Mèo Hình Lều Cắm Trại ZEZE - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/5_cd100c52-bb43-4ce6-a5bc-f9cbafac7a8c.webp?v=1697452549\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>Thương hiệu: ZEZE</p>\r\n\r\n<p>Ph&ugrave; hợp cho: Ch&oacute;/ M&egrave;o mọi độ tuổi</p>\r\n\r\n<p>Nh&agrave; Nệm H&igrave;nh Lều Cắm Trại ZEZE l&agrave; một sản phẩm tuyệt vời cho những ch&uacute; ch&oacute; m&egrave;o y&ecirc;u th&iacute;ch sự thoải m&aacute;i v&agrave; ri&ecirc;ng tư. Nh&agrave; nệm ZEZE được l&agrave;m bằng vải mềm mại v&agrave; tho&aacute;ng kh&iacute;, c&oacute; cửa ra v&agrave;o rộng r&atilde;i, gi&uacute;p ch&oacute; m&egrave;o dễ d&agrave;ng hoạt động. Lều cắm trại cho ch&oacute; m&egrave;o ZEZE với thiết kế rất đ&aacute;ng y&ecirc;u v&agrave; hợp thời trang cho b&eacute; cưng được h&ograve;a m&igrave;nh v&agrave;o thi&ecirc;n nhi&ecirc;n.</p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Khung lều vững chắc, cấu tr&uacute;c v&ograve;ng cung 3 chiều, dễ lắp đặt</p>\r\n\r\n<p>Kh&ocirc;ng gian rộng r&atilde;i, thoải m&aacute;i cho th&uacute; cưng</p>\r\n\r\n<p>Miếng nệm ở trong c&oacute; thể thay thế linh hoạt theo m&ugrave;a, thuận tiện lấy ra để vệ sinh</p>\r\n\r\n<p>Lều c&oacute; kh&oacute;a k&eacute;o v&agrave; 2 qu&aacute; b&oacute;ng d&acirc;y treo thu h&uacute;t th&uacute; cưng vui chơi</p>\r\n\r\n<p>Nệm l&agrave;m từ l&ocirc;ng nhung mềm mịn, &ecirc;m ả tốt cho cột sống của b&eacute;</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Chất liệu:&nbsp;Vải bạt, vải nhung, d&acirc;y gai v&agrave; sợi thủy tinh</p>\r\n\r\n<p>K&iacute;ch thước: 75 x 66 x 50cm</p>\r\n\r\n<p>Hướng dẫn sử dụng</p>\r\n\r\n<p>D&ugrave;ng m&aacute;y h&uacute;t bụi để l&agrave;m sạch hoặc lau nhẹ c&aacute;c vết bẩn bằng khăn ấm</p>\r\n\r\n<p>Thay thế sản phẩm khi c&oacute; dấu hiệu bị hư hỏng</p>\r\n\r\n<p><strong>Lưu &yacute;: </strong>Tr&aacute;nh phơi trực tiếp dưới &aacute;nh nắng mặt trời hoặc để trong m&ocirc;i trường ẩm ướt, sẽ l&agrave;m giảm tuổi thọ của sản phẩm.</p>', '<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Nhà Nệm Cho Chó Mèo Hình Lều Cắm Trại ZEZE - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/0_1.webp?v=1697452539\" style=\"height:300px; width:300px\" />&nbsp;&nbsp;<img alt=\"Nhà Nệm Cho Chó Mèo Hình Lều Cắm Trại ZEZE - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/5_cd100c52-bb43-4ce6-a5bc-f9cbafac7a8c.webp?v=1697452549\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>Thương hiệu: ZEZE</p>\r\n\r\n<p>Ph&ugrave; hợp cho: Ch&oacute;/ M&egrave;o mọi độ tuổi</p>\r\n\r\n<p>Nh&agrave; Nệm H&igrave;nh Lều Cắm Trại ZEZE l&agrave; một sản phẩm tuyệt vời cho những ch&uacute; ch&oacute; m&egrave;o y&ecirc;u th&iacute;ch sự thoải m&aacute;i v&agrave; ri&ecirc;ng tư. Nh&agrave; nệm ZEZE được l&agrave;m bằng vải mềm mại v&agrave; tho&aacute;ng kh&iacute;, c&oacute; cửa ra v&agrave;o rộng r&atilde;i, gi&uacute;p ch&oacute; m&egrave;o dễ d&agrave;ng hoạt động. Lều cắm trại cho ch&oacute; m&egrave;o ZEZE với thiết kế rất đ&aacute;ng y&ecirc;u v&agrave; hợp thời trang cho b&eacute; cưng được h&ograve;a m&igrave;nh v&agrave;o thi&ecirc;n nhi&ecirc;n.</p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Khung lều vững chắc, cấu tr&uacute;c v&ograve;ng cung 3 chiều, dễ lắp đặt</p>\r\n\r\n<p>Kh&ocirc;ng gian rộng r&atilde;i, thoải m&aacute;i cho th&uacute; cưng</p>\r\n\r\n<p>Miếng nệm ở trong c&oacute; thể thay thế linh hoạt theo m&ugrave;a, thuận tiện lấy ra để vệ sinh</p>\r\n\r\n<p>Lều c&oacute; kh&oacute;a k&eacute;o v&agrave; 2 qu&aacute; b&oacute;ng d&acirc;y treo thu h&uacute;t th&uacute; cưng vui chơi</p>\r\n\r\n<p>Nệm l&agrave;m từ l&ocirc;ng nhung mềm mịn, &ecirc;m ả tốt cho cột sống của b&eacute;</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Chất liệu:&nbsp;Vải bạt, vải nhung, d&acirc;y gai v&agrave; sợi thủy tinh</p>\r\n\r\n<p>K&iacute;ch thước: 75 x 66 x 50cm</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>D&ugrave;ng m&aacute;y h&uacute;t bụi để l&agrave;m sạch hoặc lau nhẹ c&aacute;c vết bẩn bằng khăn ấm</p>\r\n\r\n<p>Thay thế sản phẩm khi c&oacute; dấu hiệu bị hư hỏng</p>\r\n\r\n<p><strong>Lưu &yacute;</strong>: Tr&aacute;nh phơi trực tiếp dưới &aacute;nh nắng mặt trời hoặc để trong m&ocirc;i trường ẩm ướt, sẽ l&agrave;m giảm tuổi thọ của sản phẩm.</p>', 930000, 'nha-nem-cho-cho-meo-hinh-leu-cam-trai-zeze_273.jpg', 0, NULL, NULL, NULL),
(38, 8, 'BÁNH THƯỞNG CHO CHÓ BÁNH COOKIE MINIBALL BOWBOW 150G', '<p>B&Aacute;NH COOKIE HỖN HỢP CHO CH&Oacute; BOWWOW MINIBALL COOKIES COMBO<br />\r\n🍕 Cung cấp dưỡng chất đ&aacute;ng kể m&agrave; trong khẩu phần ăn h&agrave;ng ng&agrave;y c&oacute; thể thiếu.<br />\r\n🍕 Giảm m&ugrave;i h&ocirc;i cơ thể v&agrave; m&ugrave;i ph&acirc;n.<br />\r\n🍕 Đa dạng m&ugrave;i vị:<br />\r\nSữa gi&uacute;p tăng khả năng hấp thu dưỡng chất.<br />\r\nKhoai lang gi&agrave;u collagen, th&agrave;nh phần v&agrave;ng l&agrave;m đẹp da, mượt l&ocirc;ng.<br />\r\nViệt quất gi&agrave;u chất như sắt, canxi, magi&ecirc;, kẽm v&agrave; vitamin K gi&uacute;p cho xương lu&ocirc;n được chắc khỏe.</p>\r\n\r\n<p>+ B&aacute;nh cookies hỗn hợp Bowwow l&agrave; m&oacute;n ăn nhẹ kho&aacute;i khẩu của c&aacute;c ch&uacute; ch&oacute;, th&iacute;ch hợp để bổ sung dưỡng chất v&agrave; d&ugrave;ng trong huấn luyện.<br />\r\n+ D&agrave;nh cho mọi giống ch&oacute; thuộc mọi lứa tuổi, c&acirc;n nặng<br />\r\n+ Th&agrave;nh phần: sữa, khoai lang, việt quất<br />\r\n+ Cung cấp dưỡng chất đ&aacute;ng kể m&agrave; trong khẩu phần ăn h&agrave;ng ng&agrave;y c&oacute; thể thiếu<br />\r\n+ Giảm m&ugrave;i h&ocirc;i cơ thể v&agrave; m&ugrave;i ph&acirc;n<br />\r\n+ D&ugrave;ng để bổ sung năng lượng v&agrave; khen thưởng trong huấn luyện<br />\r\n+ Kh&ocirc;ng chứa m&agrave;u nh&acirc;n tạo, kh&ocirc;ng chứa c&aacute;c chất bảo quản<br />\r\n<br />\r\nTh&agrave;nh phần tươi sạch, th&iacute;ch hợp với mọi giống ch&oacute;, lứa tuổi, c&acirc;n nặng<br />\r\nB&aacute;nh cookies hỗn hợp được chế biến theo d&acirc;y chuyền sản xuất kh&eacute;p k&iacute;n của Bowwow, đ&aacute;p ứng c&aacute;c quy định về vệ sinh an to&agrave;n thực phẩm, từ những nguy&ecirc;n liệu ho&agrave;n to&agrave;n tự nhi&ecirc;n gi&agrave;u dinh dưỡng.<br />\r\n<br />\r\nBổ sung dinh dưỡng, gi&uacute;p th&uacute; cưng hạnh ph&uacute;c v&agrave; dễ huấn luyện hơn<br />\r\nVới khoai lang, việt quất, sản phẩm bổ sung chất xơ gi&uacute;p c&aacute;c cơ quan của ch&oacute; hoạt động nhịp nh&agrave;ng. K&iacute;ch thước b&aacute;nh nhỏ th&iacute;ch hợp để d&ugrave;ng trong huấn luyện, kh&iacute;ch lệ tinh thần cho những ch&uacute; ch&oacute;.<br />\r\n<br />\r\nTốt cho sức khỏe ch&uacute; ch&oacute;, ph&ograve;ng ngừa bệnh tật, k&eacute;o d&agrave;i tuổi thọ<br />\r\nB&aacute;nh cookies hỗn hợp bổ sung dưỡng chất, k&iacute;ch th&iacute;ch c&uacute;n ăn ngon miệng hơn. H&agrave;m lượng gia vị thấp, kh&ocirc;ng chứa chất bảo quản v&agrave; m&agrave;u thực phẩm n&ecirc;n th&iacute;ch hợp để th&uacute; cưng ăn thường xuy&ecirc;n v&agrave; l&acirc;u d&agrave;i m&agrave; kh&ocirc;ng lo hại sức khỏe.</p>', '<p><img alt=\"Bánh Thưởng Cho Chó Bánh Cookie Miniball BowWow 150g - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/banh-cookie-miniball-bowwow-snack-cho-cho-150g-paddy-2.jpg?v=1692816287\" style=\"height:300px; width:300px\" />&nbsp; &nbsp;<img alt=\"Bánh Thưởng Cho Chó Bánh Cookie Miniball BowWow 150g - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/banh-cookie-miniball-bowwow-snack-cho-cho-150g-paddy-3.jpg?v=1692816287\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>B&Aacute;NH COOKIE HỖN HỢP CHO CH&Oacute; BOWWOW MINIBALL COOKIES COMBO<br />\r\n🍕 Cung cấp dưỡng chất đ&aacute;ng kể m&agrave; trong khẩu phần ăn h&agrave;ng ng&agrave;y c&oacute; thể thiếu.<br />\r\n🍕 Giảm m&ugrave;i h&ocirc;i cơ thể v&agrave; m&ugrave;i ph&acirc;n.<br />\r\n🍕 Đa dạng m&ugrave;i vị:<br />\r\nSữa gi&uacute;p tăng khả năng hấp thu dưỡng chất.<br />\r\nKhoai lang gi&agrave;u collagen, th&agrave;nh phần v&agrave;ng l&agrave;m đẹp da, mượt l&ocirc;ng.<br />\r\nViệt quất gi&agrave;u chất như sắt, canxi, magi&ecirc;, kẽm v&agrave; vitamin K gi&uacute;p cho xương lu&ocirc;n được chắc khỏe.</p>\r\n\r\n<p>+ B&aacute;nh cookies hỗn hợp Bowwow l&agrave; m&oacute;n ăn nhẹ kho&aacute;i khẩu của c&aacute;c ch&uacute; ch&oacute;, th&iacute;ch hợp để bổ sung dưỡng chất v&agrave; d&ugrave;ng trong huấn luyện.<br />\r\n+ D&agrave;nh cho mọi giống ch&oacute; thuộc mọi lứa tuổi, c&acirc;n nặng<br />\r\n+ Th&agrave;nh phần: sữa, khoai lang, việt quất<br />\r\n+ Cung cấp dưỡng chất đ&aacute;ng kể m&agrave; trong khẩu phần ăn h&agrave;ng ng&agrave;y c&oacute; thể thiếu<br />\r\n+ Giảm m&ugrave;i h&ocirc;i cơ thể v&agrave; m&ugrave;i ph&acirc;n<br />\r\n+ D&ugrave;ng để bổ sung năng lượng v&agrave; khen thưởng trong huấn luyện<br />\r\n+ Kh&ocirc;ng chứa m&agrave;u nh&acirc;n tạo, kh&ocirc;ng chứa c&aacute;c chất bảo quản<br />\r\n<br />\r\nTh&agrave;nh phần tươi sạch, th&iacute;ch hợp với mọi giống ch&oacute;, lứa tuổi, c&acirc;n nặng<br />\r\nB&aacute;nh cookies hỗn hợp được chế biến theo d&acirc;y chuyền sản xuất kh&eacute;p k&iacute;n của Bowwow, đ&aacute;p ứng c&aacute;c quy định về vệ sinh an to&agrave;n thực phẩm, từ những nguy&ecirc;n liệu ho&agrave;n to&agrave;n tự nhi&ecirc;n gi&agrave;u dinh dưỡng.<br />\r\n<br />\r\nBổ sung dinh dưỡng, gi&uacute;p th&uacute; cưng hạnh ph&uacute;c v&agrave; dễ huấn luyện hơn<br />\r\nVới khoai lang, việt quất, sản phẩm bổ sung chất xơ gi&uacute;p c&aacute;c cơ quan của ch&oacute; hoạt động nhịp nh&agrave;ng. K&iacute;ch thước b&aacute;nh nhỏ th&iacute;ch hợp để d&ugrave;ng trong huấn luyện, kh&iacute;ch lệ tinh thần cho những ch&uacute; ch&oacute;.<br />\r\n<br />\r\nTốt cho sức khỏe ch&uacute; ch&oacute;, ph&ograve;ng ngừa bệnh tật, k&eacute;o d&agrave;i tuổi thọ<br />\r\nB&aacute;nh cookies hỗn hợp bổ sung dưỡng chất, k&iacute;ch th&iacute;ch c&uacute;n ăn ngon miệng hơn. H&agrave;m lượng gia vị thấp, kh&ocirc;ng chứa chất bảo quản v&agrave; m&agrave;u thực phẩm n&ecirc;n th&iacute;ch hợp để th&uacute; cưng ăn thường xuy&ecirc;n v&agrave; l&acirc;u d&agrave;i m&agrave; kh&ocirc;ng lo hại sức khỏe.</p>', 80000, 'banh-cookie-miniball-bowwow-snack-cho-cho-150g22.webp', 0, NULL, NULL, NULL),
(39, 8, 'BÁNH THƯỞNG CHO CHÓ MÈO THỊT SẤY VIÊN JOY PET', '<p><img src=\"https://paddy.vn/cdn/shop/files/banh-thuong-cho-cho-meo-thit-say-vien-joy-pet_8.jpg?v=1722844943\" style=\"height:300px; width:300px\" />&nbsp;&nbsp;<img src=\"https://paddy.vn/cdn/shop/files/banh-thuong-cho-cho-meo-thit-say-vien-joy-pet_7.jpg?v=1722844943\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>Thương hiệu:<strong>&nbsp;Joy Pet</strong></p>\r\n\r\n<p>Ph&ugrave; hợp cho: Ch&oacute;/m&egrave;o (từ 3 th&aacute;ng tuổi trở l&ecirc;n)</p>\r\n\r\n<p><a href=\"https://paddy.vn/collections/banh-thuong-cho-cho\" target=\"_blank\"><strong>B&aacute;nh thưởng cho ch&oacute;</strong></a>&nbsp;m&egrave;o Thịt Sấy Vi&ecirc;n Joy Pet&nbsp;được l&agrave;m từ thịt sấy chất lượng cao, cung cấp nguồn protein dồi d&agrave;o cho ch&oacute; m&egrave;o. Sản phẩm l&agrave; phần thưởng tuyệt vời cho th&uacute; cưng trong qu&aacute; tr&igrave;nh huấn luyện.</p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Cung cấp nguồn protein chất lượng cao từ thịt sấy</p>\r\n\r\n<p>Gi&uacute;p duy tr&igrave; sức khỏe răng miệng v&agrave; giảm m&ugrave;i h&ocirc;i miệng</p>\r\n\r\n<p>Hỗ trợ hệ ti&ecirc;u h&oacute;a khỏe mạnh</p>\r\n\r\n<p>L&agrave; một phần thưởng tuyệt vời cho ch&oacute; v&agrave; m&egrave;o trong qu&aacute; tr&igrave;nh huấn luyện</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Thịt vịt, thịt g&agrave;, dầu thực vật, vitamin v&agrave; kho&aacute;ng chất</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>C&oacute; thể cho th&uacute; cưng ăn trực tiếp như một m&oacute;n ăn vặt hoặc sử dụng để huấn luyện.</p>\r\n\r\n<p>Tr&aacute;nh &aacute;nh nắng trực tiếp hoặc nơi c&oacute; nhiệt độ v&agrave; độ ẩm cao.</p>\r\n\r\n<p>Sau khi mở g&oacute;i n&ecirc;n sử dụng ngay v&agrave; bảo quản trong tủ lạnh.</p>', '<p><img src=\"https://paddy.vn/cdn/shop/files/banh-thuong-cho-cho-meo-thit-say-vien-joy-pet.jpg?v=1722844943\" style=\"height:300px; width:300px\" />&nbsp;&nbsp;&nbsp;<img src=\"https://paddy.vn/cdn/shop/files/banh-thuong-cho-cho-meo-thit-say-vien-joy-pet_5.jpg?v=1722844942\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thương hiệu:<strong>&nbsp;Joy Pet</strong></p>\r\n\r\n<p>Ph&ugrave; hợp cho: Ch&oacute;/m&egrave;o (từ 3 th&aacute;ng tuổi trở l&ecirc;n)</p>\r\n\r\n<p><a href=\"https://paddy.vn/collections/banh-thuong-cho-cho\" target=\"_blank\"><strong>B&aacute;nh thưởng cho ch&oacute;</strong></a>&nbsp;m&egrave;o Thịt Sấy Vi&ecirc;n Joy Pet&nbsp;được l&agrave;m từ thịt sấy chất lượng cao, cung cấp nguồn protein dồi d&agrave;o cho ch&oacute; m&egrave;o. Sản phẩm l&agrave; phần thưởng tuyệt vời cho th&uacute; cưng trong qu&aacute; tr&igrave;nh huấn luyện.</p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Cung cấp nguồn protein chất lượng cao từ thịt sấy</p>\r\n\r\n<p>Gi&uacute;p duy tr&igrave; sức khỏe răng miệng v&agrave; giảm m&ugrave;i h&ocirc;i miệng</p>\r\n\r\n<p>Hỗ trợ hệ ti&ecirc;u h&oacute;a khỏe mạnh</p>\r\n\r\n<p>L&agrave; một phần thưởng tuyệt vời cho ch&oacute; v&agrave; m&egrave;o trong qu&aacute; tr&igrave;nh huấn luyện</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Thịt vịt, thịt g&agrave;, dầu thực vật, vitamin v&agrave; kho&aacute;ng chất</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>C&oacute; thể cho th&uacute; cưng ăn trực tiếp như một m&oacute;n ăn vặt hoặc sử dụng để huấn luyện.</p>\r\n\r\n<p>Tr&aacute;nh &aacute;nh nắng trực tiếp hoặc nơi c&oacute; nhiệt độ v&agrave; độ ẩm cao.</p>\r\n\r\n<p>Sau khi mở g&oacute;i n&ecirc;n sử dụng ngay v&agrave; bảo quản trong tủ lạnh.</p>', 235000, 'banh-thuong-cho-cho-meo-thit-say-vien-joy-pet_853.webp', 0, NULL, NULL, NULL);
INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_name`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `product_feature`, `created_at`, `updated_at`) VALUES
(40, 8, 'BÁNH THƯỞNG CHO CHÓ THỊT CUỘN KHOAI LANG NATURAL CORE', '<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://paddy.vn/cdn/shop/files/banh-thuong-cho-cho-thit-cuon-khoai-lang-natural-core_2.png?v=1718189875\" style=\"height:300px; width:300px\" />&nbsp; <img src=\"https://paddy.vn/cdn/shop/files/banh-thuong-cho-cho-thit-cuon-khoai-lang-natural-core_3.png?v=1718189875\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>Thương hiệu:&nbsp;<strong><a href=\"https://paddy.vn/collections/thuc-an-hat-natural-core\" target=\"_blank\">Natural Core</a></strong></p>\r\n\r\n<p>Ph&ugrave; hợp cho: Ch&oacute; mọi lứa tuổi</p>\r\n\r\n<p><strong><a href=\"https://paddy.vn/collections/snack-treat-banh-thuong-cho\" target=\"_blank\">B&aacute;nh thưởng&nbsp;cho ch&oacute;</a></strong>&nbsp;Thịt Cuộn Khoai Lang Natural Core&nbsp;l&agrave; m&oacute;n ăn vặt hấp dẫn d&agrave;nh cho ch&oacute; cưng ở mọi lứa tuổi, được l&agrave;m từ nguy&ecirc;n liệu cao cấp, đảm bảo an to&agrave;n v&agrave; cung cấp nhiều lợi &iacute;ch cho sức khỏe. Đ&acirc;y l&agrave; lựa chọn ho&agrave;n hảo để bạn thưởng cho ch&uacute; ch&oacute; cưng của m&igrave;nh, gi&uacute;p ch&oacute; vui vẻ, khỏe mạnh v&agrave; tr&agrave;n đầy năng lượng.</p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Sử dụng 100% thịt chất lượng cao, đạt ti&ecirc;u chuẩn Human Grade.&nbsp;</p>\r\n\r\n<p>Thịt g&agrave; gi&agrave;u Protein v&agrave; &iacute;t chất b&eacute;o, dễ ti&ecirc;u ho&aacute;, ph&ugrave; hợp cho ch&oacute; ở mọi lứa tuổi.</p>\r\n\r\n<p>Thịt vịt gi&agrave;u Protein v&agrave; axit b&eacute;o kh&ocirc;ng b&atilde;o ho&agrave;, gi&uacute;p hỗ trợ ph&aacute;t triển da l&ocirc;ng v&agrave; phục hồi năng lượng.</p>\r\n\r\n<p>Khoai lang gi&agrave;u chất xơ, gi&uacute;p hỗ trợ hệ ti&ecirc;u ho&aacute; v&agrave; tăng cường chức năng đường ruột.</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Thịt g&agrave;, thịt vịt, khoai lang</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>C&oacute; thể cho ch&oacute; ăn trực tiếp như một m&oacute;n ăn vặt hoặc sử dụng để huấn luyện ch&oacute;.</p>\r\n\r\n<p>Điều chỉnh lượng b&aacute;nh thưởng ph&ugrave; hợp với độ tuổi,&nbsp;k&iacute;ch thước v&agrave; mức độ hoạt động của th&uacute; cưng.</p>\r\n\r\n<p>Bảo quản nơi kh&ocirc; r&aacute;o,&nbsp;tho&aacute;ng m&aacute;t,&nbsp;tr&aacute;nh &aacute;nh nắng trực tiếp.</p>', '<p><img src=\"https://paddy.vn/cdn/shop/files/banh-thuong-cho-cho-thit-cuon-khoai-lang-natural-core_2.png?v=1718189875\" style=\"height:300px; width:300px\" />&nbsp;&nbsp;<img src=\"https://paddy.vn/cdn/shop/files/banh-thuong-cho-cho-thit-cuon-khoai-lang-natural-core_3.png?v=1718189875\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>Thương hiệu:&nbsp;<strong><a href=\"https://paddy.vn/collections/thuc-an-hat-natural-core\" target=\"_blank\">Natural Core</a></strong></p>\r\n\r\n<p>Ph&ugrave; hợp cho: Ch&oacute; mọi lứa tuổi</p>\r\n\r\n<p><strong><a href=\"https://paddy.vn/collections/snack-treat-banh-thuong-cho\" target=\"_blank\">B&aacute;nh thưởng&nbsp;cho ch&oacute;</a></strong>&nbsp;Thịt Cuộn Khoai Lang Natural Core&nbsp;l&agrave; m&oacute;n ăn vặt hấp dẫn d&agrave;nh cho ch&oacute; cưng ở mọi lứa tuổi, được l&agrave;m từ nguy&ecirc;n liệu cao cấp, đảm bảo an to&agrave;n v&agrave; cung cấp nhiều lợi &iacute;ch cho sức khỏe. Đ&acirc;y l&agrave; lựa chọn ho&agrave;n hảo để bạn thưởng cho ch&uacute; ch&oacute; cưng của m&igrave;nh, gi&uacute;p ch&oacute; vui vẻ, khỏe mạnh v&agrave; tr&agrave;n đầy năng lượng.</p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Sử dụng 100% thịt chất lượng cao, đạt ti&ecirc;u chuẩn Human Grade.&nbsp;</p>\r\n\r\n<p>Thịt g&agrave; gi&agrave;u Protein v&agrave; &iacute;t chất b&eacute;o, dễ ti&ecirc;u ho&aacute;, ph&ugrave; hợp cho ch&oacute; ở mọi lứa tuổi.</p>\r\n\r\n<p>Thịt vịt gi&agrave;u Protein v&agrave; axit b&eacute;o kh&ocirc;ng b&atilde;o ho&agrave;, gi&uacute;p hỗ trợ ph&aacute;t triển da l&ocirc;ng v&agrave; phục hồi năng lượng.</p>\r\n\r\n<p>Khoai lang gi&agrave;u chất xơ, gi&uacute;p hỗ trợ hệ ti&ecirc;u ho&aacute; v&agrave; tăng cường chức năng đường ruột.</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Thịt g&agrave;, thịt vịt, khoai lang</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>C&oacute; thể cho ch&oacute; ăn trực tiếp như một m&oacute;n ăn vặt hoặc sử dụng để huấn luyện ch&oacute;.</p>\r\n\r\n<p>Điều chỉnh lượng b&aacute;nh thưởng ph&ugrave; hợp với độ tuổi,&nbsp;k&iacute;ch thước v&agrave; mức độ hoạt động của th&uacute; cưng.</p>\r\n\r\n<p>Bảo quản nơi kh&ocirc; r&aacute;o,&nbsp;tho&aacute;ng m&aacute;t,&nbsp;tr&aacute;nh &aacute;nh nắng trực tiếp.</p>', 85000, 'banh-thuong-cho-cho-thit-cuon-khoai-lang-natural-core2.webp', 0, NULL, NULL, NULL),
(41, 8, 'HẠT CHO CHÓ EQUILIBRIO BỔ SUNG DINH DƯỠNG', '<p><img alt=\"Hạt Cho Chó Equilibrio Bổ Sung Dinh Dưỡng 2Kg - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/vn-11134207-7qukw-li3ussuwkyj658.jpg?v=1698999624\" style=\"height:300px; width:300px\" />&nbsp;&nbsp;<img alt=\"Hạt Cho Chó Equilibrio Bổ Sung Dinh Dưỡng 2Kg - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/vn-11134207-7qukw-li3ussuwmd3m3a.jpg?v=1698999624\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Thịt t&aacute;ch khỏi thịt g&agrave;, Bột l&ograve;ng g&agrave;, Bột c&aacute;, Gạo hạt vừa, Ng&ocirc; nguy&ecirc;n hạt, C&aacute;m gluten ng&ocirc; 60, Mỡ g&agrave;, Dầu c&aacute; tinh luyện, Men kh&ocirc; của nh&agrave; sản xuất bia, Hạt lanh , Kali clorua, Choline clorua, Natri hexametaphosphate, Bột củ cải đường, Chiết xuất Yucca schidigera, Probiotic, Inulin, Dicalcium phosphate, Canxi propionate, Hydrolyzate thịt g&agrave;, Bổ sung vitamin, Bổ sung vi kho&aacute;ng transchelated.</p>', '<p><img alt=\"Hạt Cho Chó Equilibrio Bổ Sung Dinh Dưỡng 2Kg - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/thuc-an-cho-cho-equilibrio-2kg_1.webp?v=1704522540\" style=\"height:500px; width:500px\" /></p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Cung cấp đầy đủ c&aacute;c chất dinh dưỡng cần thiết cho ch&oacute; ở c&aacute;c độ tuổi, giống lo&agrave;i v&agrave; t&igrave;nh trạng sức khỏe kh&aacute;c nhau.</p>\r\n\r\n<p>Gi&uacute;p ch&oacute; ph&aacute;t triển khỏe mạnh, duy tr&igrave; v&oacute;c d&aacute;ng c&acirc;n đối.</p>\r\n\r\n<p>Tăng cường sức khỏe v&agrave; hệ miễn dịch cho ch&oacute;.</p>\r\n\r\n<p>Giảm thiểu nguy cơ dị ứng ở ch&oacute; nhạy cảm.</p>\r\n\r\n<p>Hỗ trợ ti&ecirc;u h&oacute;a, giảm m&ugrave;i h&ocirc;i ph&acirc;n.</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Thịt t&aacute;ch khỏi thịt g&agrave;, Bột l&ograve;ng g&agrave;, Bột c&aacute;, Gạo hạt vừa, Ng&ocirc; nguy&ecirc;n hạt, C&aacute;m gluten ng&ocirc; 60, Mỡ g&agrave;, Dầu c&aacute; tinh luyện, Men kh&ocirc; của nh&agrave; sản xuất bia, Hạt lanh , Kali clorua, Choline clorua, Natri hexametaphosphate, Bột củ cải đường, Chiết xuất Yucca schidigera, Probiotic, Inulin, Dicalcium phosphate, Canxi propionate, Hydrolyzate thịt g&agrave;, Bổ sung vitamin, Bổ sung vi kho&aacute;ng transchelated.</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>Chọn loại thức ăn hạt ph&ugrave; hợp với tuổi, nhu cầu dinh dưỡng v&agrave; t&igrave;nh trạng sức khỏe của ch&oacute;.</p>\r\n\r\n<p>Để thức ăn hạt ở nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.</p>\r\n\r\n<p>Cho ch&oacute; ăn thức ăn hạt theo lượng khuyến nghị tr&ecirc;n bao b&igrave;.</p>\r\n\r\n<p>Lu&ocirc;n c&oacute; sẵn nước sạch cho ch&oacute; uống.</p>\r\n\r\n<p>Vệ sinh khay ăn của ch&oacute; thường xuy&ecirc;n.</p>', 345000, 'thuc-an-cho-cho-equilibrio-2kg_1277.jpg', 0, NULL, NULL, NULL),
(42, 8, 'HẠT CHO CHÓ LEMO VỊ GÀ MIX TOPPING BỔ DƯỠNG 1.5KG', '<p><strong>Lợi &iacute;ch:&nbsp;</strong></p>\r\n\r\n<p>Gan g&agrave; đ&ocirc;ng kh&ocirc; gi&agrave;u vitamin A gi&uacute;p cải thiện tầm nh&igrave;n, l&ograve;ng đỏ trứng đ&ocirc;ng kh&ocirc; gi&agrave;u lecithin l&agrave;m đẹp l&ocirc;ng v&agrave; nu&ocirc;i dưỡng da, c&ograve;n kh&ocirc; g&agrave; gi&agrave;u đạm để bồi bổ sinh lực.</p>\r\n\r\n<p>Thịt Vịt gi&agrave;u vitamin B v&agrave; vitamin E, dễ ti&ecirc;u ho&aacute;.</p>\r\n\r\n<p>Giải quyết vấn đề l&ocirc;ng chắc khoẻ với 4 loại chiết xuất thực vật: Hoa vĩnh cửu (t&aacute;i tạo tế b&agrave;o da), Hoa mật (chống đ&agrave;n hồi protease), L&aacute; tằm (chống hyaluronidase), Di&ecirc;m mạch (chống Collagenase &amp; Matrix Metalloproteinase).</p>\r\n\r\n<p>Gi&uacute;p giảm m&ugrave;i h&ocirc;i kh&oacute; chịu từ chất thải của ch&oacute; cưng.</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Xương g&agrave; tươi 50%, bột thịt vịt 20%, tinh bột khoai t&acirc;y, bột khoai lang, tinh bột sắn, bột c&aacute;, bột trứng, dầu lecithin đậu n&agrave;nh, dầu g&agrave;, dầu c&aacute; 2%, thịt g&agrave; đ&ocirc;ng kh&ocirc; 1%, đ&ocirc;ng lạnh l&ograve;ng đỏ trứng kh&ocirc; 1%, gan g&agrave; đ&ocirc;ng kh&ocirc; 1%, dầu hạt lanh 0,5%, bột c&agrave; rốt, b&iacute; đỏ, bột men bia, hạt cỏ linh lăng, bột gan g&agrave;, bột tảo bẹ, ...</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>Chọn loại thức ăn hạt ph&ugrave; hợp với tuổi, nhu cầu dinh dưỡng v&agrave; t&igrave;nh trạng sức khỏe của ch&oacute;.</p>\r\n\r\n<p>Để thức ăn hạt ở nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.</p>\r\n\r\n<p>Cho ch&oacute; ăn thức ăn hạt theo lượng khuyến nghị tr&ecirc;n bao b&igrave;.</p>\r\n\r\n<p>Lu&ocirc;n c&oacute; sẵn nước sạch cho ch&oacute; uống.</p>\r\n\r\n<p>Vệ sinh khay ăn của ch&oacute; thường xuy&ecirc;n.</p>', '<p><img alt=\"Hạt Cho Chó Lemo Vị Gà Mix Topping 1.5kg - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/hat-cho-cho-lemo-vi-ga-mix-topping-1-5kg_6.webp?v=1704522955\" style=\"height:300px; width:300px\" />&nbsp;&nbsp;<img alt=\"Hạt Cho Chó Lemo Vị Gà Mix Topping 1.5kg - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/hat-cho-cho-lemo-vi-ga-mix-topping-1-5kg_7.webp?v=1704522957\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lợi &iacute;ch:&nbsp;</strong></p>\r\n\r\n<p>Gan g&agrave; đ&ocirc;ng kh&ocirc; gi&agrave;u vitamin A gi&uacute;p cải thiện tầm nh&igrave;n, l&ograve;ng đỏ trứng đ&ocirc;ng kh&ocirc; gi&agrave;u lecithin l&agrave;m đẹp l&ocirc;ng v&agrave; nu&ocirc;i dưỡng da, c&ograve;n kh&ocirc; g&agrave; gi&agrave;u đạm để bồi bổ sinh lực.</p>\r\n\r\n<p>Thịt Vịt gi&agrave;u vitamin B v&agrave; vitamin E, dễ ti&ecirc;u ho&aacute;.</p>\r\n\r\n<p>Giải quyết vấn đề l&ocirc;ng chắc khoẻ với 4 loại chiết xuất thực vật: Hoa vĩnh cửu (t&aacute;i tạo tế b&agrave;o da), Hoa mật (chống đ&agrave;n hồi protease), L&aacute; tằm (chống hyaluronidase), Di&ecirc;m mạch (chống Collagenase &amp; Matrix Metalloproteinase).</p>\r\n\r\n<p>Gi&uacute;p giảm m&ugrave;i h&ocirc;i kh&oacute; chịu từ chất thải của ch&oacute; cưng.</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Xương g&agrave; tươi 50%, bột thịt vịt 20%, tinh bột khoai t&acirc;y, bột khoai lang, tinh bột sắn, bột c&aacute;, bột trứng, dầu lecithin đậu n&agrave;nh, dầu g&agrave;, dầu c&aacute; 2%, thịt g&agrave; đ&ocirc;ng kh&ocirc; 1%, đ&ocirc;ng lạnh l&ograve;ng đỏ trứng kh&ocirc; 1%, gan g&agrave; đ&ocirc;ng kh&ocirc; 1%, dầu hạt lanh 0,5%, bột c&agrave; rốt, b&iacute; đỏ, bột men bia, hạt cỏ linh lăng, bột gan g&agrave;, bột tảo bẹ, ...</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>Chọn loại thức ăn hạt ph&ugrave; hợp với tuổi, nhu cầu dinh dưỡng v&agrave; t&igrave;nh trạng sức khỏe của ch&oacute;.</p>\r\n\r\n<p>Để thức ăn hạt ở nơi kh&ocirc; r&aacute;o, tho&aacute;ng m&aacute;t.</p>\r\n\r\n<p>Cho ch&oacute; ăn thức ăn hạt theo lượng khuyến nghị tr&ecirc;n bao b&igrave;.</p>\r\n\r\n<p>Lu&ocirc;n c&oacute; sẵn nước sạch cho ch&oacute; uống.</p>\r\n\r\n<p>Vệ sinh khay ăn của ch&oacute; thường xuy&ecirc;n.</p>', 410000, 'hat-cho-cho-lemo-vi-ga-mix-topping-1-5kg_846.jpg', 0, NULL, NULL, NULL),
(43, 8, 'HẠT CHO CHÓ TRƯỞNG THÀNH SMARTHEART GOLD CAO CẤP VỊ CỪU VÀ GẠO', '<p><img alt=\"Hạt Cho Chó Trưởng Thành SmartHeart Gold Cao Cấp Vị Cừu &amp; Gạo - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/hat-smartheart-gold-cao-cap-cho-cho-truong-thanh-vi-cuu-and-gao-paddy-4.jpg?v=1691553076\" style=\"height:300px; width:300px\" />&nbsp;<img alt=\"Hạt Cho Chó Trưởng Thành SmartHeart Gold Cao Cấp Vị Cừu &amp; Gạo - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/hat-smartheart-gold-cao-cap-cho-cho-truong-thanh-vi-cuu-and-gao-paddy-7.jpg?v=1691553076\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>Nguy&ecirc;n liệu bột cừu cao cấp được nhập khẩu trực tiếp từ New Zealand d&agrave;nh ri&ecirc;ng cho C&uacute;n dễ bị dị ứng với thức ăn, đặc biệt l&agrave; thịt b&ograve;, thịt g&agrave;. Ngo&agrave;i ra c&ograve;n c&oacute; rất nhiều th&agrave;nh phần dinh dưỡng tốt cho Lu:<br />\r\n🔸 Gạo: cung cấp năng lượng.<br />\r\n🔸 Hỗ trợ khớp &amp; sụn.<br />\r\n🔸 DHA &ndash; dầu c&aacute; hỗ trợ thần kinh.<br />\r\n🔸 Bột củ cải đường tăng cường sức khỏe đường ruột.<br />\r\n🔸 Da &amp; l&ocirc;ng &oacute;ng mượt .<br />\r\n🔸 Calci &amp; phospho gi&uacute;p răng &amp; xương chắc khỏe.<br />\r\n🔸 Yucca giảm m&ugrave;i h&ocirc;i ph&acirc;n.<br />\r\n🔸 Dinh dưỡng c&acirc;n bằng.<br />\r\n🔸 Chống oxy h&oacute;a.</p>', '<p><img alt=\"Hạt Cho Chó Trưởng Thành SmartHeart Gold Cao Cấp Vị Cừu &amp; Gạo - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/hat-smartheart-gold-cao-cap-cho-cho-truong-thanh-vi-cuu-and-gao-paddy-4.jpg?v=1691553076\" style=\"height:300px; width:300px\" />&nbsp;&nbsp;<img alt=\"Hạt Cho Chó Trưởng Thành SmartHeart Gold Cao Cấp Vị Cừu &amp; Gạo - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/hat-smartheart-gold-cao-cap-cho-cho-truong-thanh-vi-cuu-and-gao-paddy-7.jpg?v=1691553076\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>Nguy&ecirc;n liệu bột cừu cao cấp được nhập khẩu trực tiếp từ New Zealand d&agrave;nh ri&ecirc;ng cho C&uacute;n dễ bị dị ứng với thức ăn, đặc biệt l&agrave; thịt b&ograve;, thịt g&agrave;. Ngo&agrave;i ra c&ograve;n c&oacute; rất nhiều th&agrave;nh phần dinh dưỡng tốt cho Lu:<br />\r\n🔸 Gạo: cung cấp năng lượng.<br />\r\n🔸 Hỗ trợ khớp &amp; sụn.<br />\r\n🔸 DHA &ndash; dầu c&aacute; hỗ trợ thần kinh.<br />\r\n🔸 Bột củ cải đường tăng cường sức khỏe đường ruột.<br />\r\n🔸 Da &amp; l&ocirc;ng &oacute;ng mượt .<br />\r\n🔸 Calci &amp; phospho gi&uacute;p răng &amp; xương chắc khỏe.<br />\r\n🔸 Yucca giảm m&ugrave;i h&ocirc;i ph&acirc;n.<br />\r\n🔸 Dinh dưỡng c&acirc;n bằng.<br />\r\n🔸 Chống oxy h&oacute;a.</p>', 100000, 'hat-smartheart-gold-cao-cap-cho-cho-truong-thanh-vi-cuu-and-gao-paddy-287.webp', 0, NULL, NULL, NULL),
(44, 4, 'DẦU XẢ NHA ĐAM MỀM MƯỢT LÔNG CHÓ MÈO RINSE 750ML', '<p><img alt=\"Dầu Xả Nha Đam Mềm Mượt Lông Chó Mèo Forcans Aloe Rinse 750ml - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/dau-xa-nha-djam-mem-muot-long-cho-meo-forcans-aloe-rinse-750ml-paddy-5.jpg?v=1662875564\" style=\"height:650px; width:650px\" /></p>\r\n\r\n<p>DẦU XẢ MỀM L&Ocirc;NG FORCANS NHA ĐAM CHO CH&Oacute; V&Agrave; M&Egrave;O</p>\r\n\r\n<p>1. C&ocirc;ng dụng v&agrave; lợi &iacute;ch</p>\r\n\r\n<p>Dầu xả l&agrave;m mềm l&ocirc;ng Hương Nha Đam #FORCANS gi&uacute;p l&agrave;m tăng sự mềm mại tự nhi&ecirc;n của l&ocirc;ng v&agrave; nu&ocirc;i dưỡng bộ l&ocirc;ng th&uacute; cưng một c&aacute;ch ho&agrave;n hảo nhất, duy tr&igrave; độ ẩm v&agrave; PH, gi&uacute;p ngăn ngừa c&aacute;c vấn đề rối l&ocirc;ng.</p>\r\n\r\n<p>2. Hướng dẫn sử dụng</p>\r\n\r\n<p>Chải l&ocirc;ng trước khi tắm v&agrave; sau khi tắm sạch bọt x&agrave; b&ocirc;ng tắm th&igrave; b&ocirc;i một lượng dầu xả vừa phải l&ecirc;n to&agrave;n bộ l&ocirc;ng, xoa đều v&agrave; massage trong 5 ph&uacute;t. Cuối c&ugrave;ng d&ugrave;ng nước ấm tắm lại thật sạch cho th&uacute; cưng.</p>\r\n\r\n<p>3. Đối tượng sử dụng</p>\r\n\r\n<p>Sử dụng được cho cả Ch&oacute; v&agrave; M&egrave;o đang gặp c&aacute;c vấn đề về l&ocirc;ng như: rối l&ocirc;ng, l&ocirc;ng bị xỉn m&agrave;u, c&oacute; m&ugrave;i h&ocirc;i.</p>\r\n\r\n<p>4. Th&ocirc;ng tin sản phẩm</p>\r\n\r\n<p>Dung t&iacute;ch sản phẩm : 750ml</p>\r\n\r\n<p>Xuất xứ: H&agrave;n Quốc</p>\r\n\r\n<p>Hạn sử dụng: 03 năm kể từ ng&agrave;y sản xuất</p>', '<p><img alt=\"Dầu Xả Nha Đam Mềm Mượt Lông Chó Mèo Forcans Aloe Rinse 750ml - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/dau-xa-nha-djam-mem-muot-long-cho-meo-forcans-aloe-rinse-750ml-paddy-2.jpg?v=1662875557\" style=\"height:300px; width:300px\" />&nbsp;&nbsp;<img alt=\"Dầu Xả Nha Đam Mềm Mượt Lông Chó Mèo Forcans Aloe Rinse 750ml - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/dau-xa-nha-djam-mem-muot-long-cho-meo-forcans-aloe-rinse-750ml-paddy-3.jpg?v=1662875559\" style=\"height:500px; width:300px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>DẦU XẢ MỀM L&Ocirc;NG FORCANS NHA ĐAM CHO CH&Oacute; V&Agrave; M&Egrave;O</p>\r\n\r\n<p>1. C&ocirc;ng dụng v&agrave; lợi &iacute;ch</p>\r\n\r\n<p>Dầu xả l&agrave;m mềm l&ocirc;ng Hương Nha Đam #FORCANS gi&uacute;p l&agrave;m tăng sự mềm mại tự nhi&ecirc;n của l&ocirc;ng v&agrave; nu&ocirc;i dưỡng bộ l&ocirc;ng th&uacute; cưng một c&aacute;ch ho&agrave;n hảo nhất, duy tr&igrave; độ ẩm v&agrave; PH, gi&uacute;p ngăn ngừa c&aacute;c vấn đề rối l&ocirc;ng.</p>\r\n\r\n<p>2. Hướng dẫn sử dụng</p>\r\n\r\n<p>Chải l&ocirc;ng trước khi tắm v&agrave; sau khi tắm sạch bọt x&agrave; b&ocirc;ng tắm th&igrave; b&ocirc;i một lượng dầu xả vừa phải l&ecirc;n to&agrave;n bộ l&ocirc;ng, xoa đều v&agrave; massage trong 5 ph&uacute;t. Cuối c&ugrave;ng d&ugrave;ng nước ấm tắm lại thật sạch cho th&uacute; cưng.</p>\r\n\r\n<p>3. Đối tượng sử dụng</p>\r\n\r\n<p>Sử dụng được cho cả Ch&oacute; v&agrave; M&egrave;o đang gặp c&aacute;c vấn đề về l&ocirc;ng như: rối l&ocirc;ng, l&ocirc;ng bị xỉn m&agrave;u, c&oacute; m&ugrave;i h&ocirc;i.</p>\r\n\r\n<p>4. Th&ocirc;ng tin sản phẩm</p>\r\n\r\n<p>Dung t&iacute;ch sản phẩm : 750ml</p>\r\n\r\n<p>Xuất xứ: H&agrave;n Quốc</p>\r\n\r\n<p>Hạn sử dụng: 03 năm kể từ ng&agrave;y sản xuất</p>', 220000, 'dau-xa-nha-djam-mem-muot-long-cho-meo-forcans-aloe-rinse-750ml-paddy-195.jpg', 0, NULL, NULL, NULL),
(45, 4, 'SỮA TẮM CHO CHÓ MÈO YU LIGHT THẢO DƯỢC 250ML', '<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://paddy.vn/cdn/shop/files/sua-tam-cho-cho-meo-yu-light-thao-duoc-250ml_8.jpg?v=1719996834\" style=\"height:600px; width:600px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<p>Chải l&ocirc;ng cho ch&oacute; trước khi tắm để loại bỏ bụi bẩn, l&ocirc;ng rụng.</p>\r\n\r\n<p>L&agrave;m ướt l&ocirc;ng ch&oacute; bằng nước ấm.</p>\r\n\r\n<p>B&ocirc;i một lượng sữa tắm vừa đủ l&ecirc;n l&ocirc;ng ch&oacute;, massage nhẹ nh&agrave;ng để tạo bọt.</p>\r\n\r\n<p>Xả sạch sữa tắm bằng nước ấm.</p>\r\n\r\n<p>Lau kh&ocirc; l&ocirc;ng ch&oacute; bằng khăn mềm.</p>', '<p><img src=\"https://paddy.vn/cdn/shop/files/sua-tam-cho-cho-meo-yu-light-thao-duoc-250ml_6.jpg?v=1719996834\" style=\"height:550px; width:550px\" /></p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>L&agrave;m sạch da v&agrave; l&ocirc;ng của ch&oacute; m&egrave;o một c&aacute;ch nhẹ nh&agrave;ng,&nbsp;loại bỏ bụi bẩn,&nbsp;vi khuẩn v&agrave; m&ugrave;i h&ocirc;i.</p>\r\n\r\n<p>Gi&uacute;p dưỡng ẩm cho da,&nbsp;giữ cho da mềm mại v&agrave; mịn m&agrave;ng.</p>\r\n\r\n<p>Gi&uacute;p l&ocirc;ng mềm mượt,&nbsp;&oacute;ng ả v&agrave; dễ gỡ rối.</p>\r\n\r\n<p>Mang lại hương thơm dịu nhẹ,&nbsp;dễ chịu cho ch&oacute; m&egrave;o.</p>\r\n\r\n<p><strong>Th&agrave;nh phần</strong></p>\r\n\r\n<p>Đậu n&agrave;nh l&ecirc;n men, vỏ c&acirc;y liễu, vỏ quế cassia, rau sam, ho&agrave;ng cầm, rau kinh giới, chamaecyparis obtusa</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<p>Chải l&ocirc;ng cho ch&oacute; trước khi tắm để loại bỏ bụi bẩn, l&ocirc;ng rụng.</p>\r\n\r\n<p>L&agrave;m ướt l&ocirc;ng ch&oacute; bằng nước ấm.</p>\r\n\r\n<p>B&ocirc;i một lượng sữa tắm vừa đủ l&ecirc;n l&ocirc;ng ch&oacute;, massage nhẹ nh&agrave;ng để tạo bọt.</p>\r\n\r\n<p>Xả sạch sữa tắm bằng nước ấm.</p>\r\n\r\n<p>Lau kh&ocirc; l&ocirc;ng ch&oacute; bằng khăn mềm.</p>', 280000, 'sua-tam-cho-cho-meo-yu-light-thao-duoc-250ml0.webp', 0, NULL, NULL, NULL),
(46, 4, 'BỘT VỆ SINH RĂNG MIỆNG CHÓ MÈO TRỘN THỨC ĂN', '<p><img alt=\"Bột Vệ Sinh Răng Miệng Chó Mèo Trộn Thức Ăn Cature Rollon Oral Care - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/bot-tron-thuc-an-ve-sinh-rang-mieng-cho-meo-cature-rollon-oral-care-paddy-8.jpg?v=1703569834\" style=\"height:600px; width:600px\" /></p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Vệ sinh răng miệng, khử m&ugrave;i h&ocirc;i miệng cho ch&oacute; m&egrave;o, kh&ocirc;ng cần d&ugrave;ng đến b&agrave;n chải đ&aacute;nh răng</p>\r\n\r\n<p>Gi&uacute;p kiểm so&aacute;t ngăn ngừa mảng b&aacute;m v&agrave; cao răng</p>\r\n\r\n<p>C&ocirc;ng thức tự nhi&ecirc;n, an to&agrave;n</p>\r\n\r\n<p>Giảm thiểu nguy cơ mắc c&aacute;c bệnh về răng miệng như vi&ecirc;m nha chu, s&acirc;u răng, h&ocirc;i miệng.</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong></p>\r\n\r\n<p>Chiết xuất quả hồng, chiết suất hoa c&uacute;c, nước d&ugrave;ng l&ecirc;n men mật ong, allantoin, chiết xuất hương thảo, nước tinh khiết, v.v.</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>Bột trộn chung với thức ăn (hạt, pate &amp; snack)</p>\r\n\r\n<p>D&ugrave;ng cho ch&oacute; m&egrave;o tr&ecirc;n 2 th&aacute;ng tuổi</p>\r\n\r\n<p>+ Ch&oacute; m&egrave;o dưới 10kg: 1 g&oacute;i/1 ng&agrave;y</p>\r\n\r\n<p>+ Ch&oacute; 10-25kg: 1-2 g&oacute;i/1 ng&agrave;y</p>\r\n\r\n<p>+ Ch&oacute; tr&ecirc;n 25kg trở l&ecirc;n: 2-3 g&oacute;i/ 1 ng&agrave;y</p>', '<p><img alt=\"Bột Vệ Sinh Răng Miệng Chó Mèo Trộn Thức Ăn Cature Rollon Oral Care - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/bot-tron-thuc-an-ve-sinh-rang-mieng-cho-meo-cature-rollon-oral-care-paddy-6.jpg?v=1703569834\" style=\"height:300px; width:300px\" />&nbsp;&nbsp;<img alt=\"Bột Vệ Sinh Răng Miệng Chó Mèo Trộn Thức Ăn Cature Rollon Oral Care - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/bot-tron-thuc-an-ve-sinh-rang-mieng-cho-meo-cature-rollon-oral-care-paddy-7.jpg?v=1703569834\" style=\"height:300px; width:300px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Lợi &iacute;ch:</strong></p>\r\n\r\n<p>Vệ sinh răng miệng, khử m&ugrave;i h&ocirc;i miệng cho ch&oacute; m&egrave;o, kh&ocirc;ng cần d&ugrave;ng đến b&agrave;n chải đ&aacute;nh răng</p>\r\n\r\n<p>Gi&uacute;p kiểm so&aacute;t ngăn ngừa mảng b&aacute;m v&agrave; cao răng</p>\r\n\r\n<p>C&ocirc;ng thức tự nhi&ecirc;n, an to&agrave;n</p>\r\n\r\n<p>Giảm thiểu nguy cơ mắc c&aacute;c bệnh về răng miệng như vi&ecirc;m nha chu, s&acirc;u răng, h&ocirc;i miệng.</p>\r\n\r\n<p><strong>Th&agrave;nh phần:</strong></p>\r\n\r\n<p>Chiết xuất quả hồng, chiết suất hoa c&uacute;c, nước d&ugrave;ng l&ecirc;n men mật ong, allantoin, chiết xuất hương thảo, nước tinh khiết, v.v.</p>\r\n\r\n<p><strong>Hướng dẫn sử dụng</strong></p>\r\n\r\n<p>Bột trộn chung với thức ăn (hạt, pate &amp; snack)</p>\r\n\r\n<p>D&ugrave;ng cho ch&oacute; m&egrave;o tr&ecirc;n 2 th&aacute;ng tuổi</p>\r\n\r\n<p>+ Ch&oacute; m&egrave;o dưới 10kg: 1 g&oacute;i/1 ng&agrave;y</p>\r\n\r\n<p>+ Ch&oacute; 10-25kg: 1-2 g&oacute;i/1 ng&agrave;y</p>\r\n\r\n<p>+ Ch&oacute; tr&ecirc;n 25kg trở l&ecirc;n: 2-3 g&oacute;i/ 1 ng&agrave;y</p>', 5000, 'bot-tron-thuc-an-ve-sinh-rang-mieng-cho-meo-cature-rollon-oral-care-paddy-473.webp', 0, NULL, NULL, NULL),
(47, 4, 'GĂNG TAY KHỬ MÙI HÔI CHO CHÓ MÈO WEI LIAN PADDY', '<h2>Găng Tay Tắm Kh&ocirc;, Khử M&ugrave;i, Vệ Sinh Cho Th&uacute; Cưng (T&uacute;i 6 Chiếc)</h2>\r\n\r\n<p>Đ&ocirc;i khi việc tắm cho c&aacute;c Boss kh&aacute; bất tiện nếu b&eacute; &quot;nhanh dơ&quot; hoặc đối với c&aacute;c b&eacute; c&ograve;n qu&aacute; nhỏ hoặc qu&aacute; gi&agrave; để tắm thường xuy&ecirc;n, nếu tắm nhiều sẽ dễ g&acirc;y bệnh, nhất l&agrave; khi l&agrave; khi chuyển v&agrave;o m&ugrave;a lạnh. Bao tay Khăn ướt gi&uacute;p Sen đỡ phải tắm Boss nhiều lần, m&agrave; vẫn l&agrave;m sạch bụi bẩn, l&ocirc;ng rụng tr&ecirc;n người Boss. Size bao tay to, rộng th&iacute;ch hợp với nhiều k&iacute;ch cỡ tay của c&aacute;c Sen, ngo&agrave;i ra b&ecirc;n trong c&ograve;n c&oacute; th&ecirc;m lớp l&oacute;t gi&uacute;p Sen kh&ocirc;ng lo dơ tay khi lau cho Boss đ&acirc;u n&egrave;. Đặc biệt l&agrave; Bao tay c&oacute; thể sử dụng cả 2 mặt trước v&agrave; sau, vừa tiết kiệm vừa ti&ecirc;n dụng phải kh&ocirc;ng Sen ơi.</p>\r\n\r\n<p>C&ocirc;ng dụng ch&iacute;nh</p>\r\n\r\n<p>* L&agrave; một chiếc khăn giấy ướt được tạo h&igrave;nh th&agrave;nh một chiếc bao tay, c&oacute; thể lau sạch c&aacute;c vết bẩn nhỏ hoặc ở những vị tr&iacute; kh&oacute; lau (tai, kẽ c&aacute;c ng&oacute;n ch&acirc;n, l&ograve;ng b&agrave;n ch&acirc;n, cằm, n&aacute;ch, bẹn,&hellip;).</p>\r\n\r\n<p>* Khuyến kh&iacute;ch d&ugrave;ng cho ch&oacute; con v&agrave; ch&oacute; gi&agrave; khi kh&ocirc;ng thể tắm gội: chấn thương, bị bệnh,&hellip;</p>\r\n\r\n<p>* D&ugrave;ng vuốt ve, để th&uacute; cưng kh&ocirc;ng cảm thấy kh&oacute; chịu, giảm bớt căng thẳng.</p>\r\n\r\n<p>* An to&agrave;n khi th&uacute; cưng liếm phải Hướng dẫn sử dụng:</p>\r\n\r\n<p>* Mở nắp r&uacute;t từng chiếc sử dụng v&agrave; đậy nắp ngay sau đ&oacute; để giữ ẩm v&agrave; tr&aacute;nh vấy bẩn.</p>\r\n\r\n<p>* D&ugrave;ng được cả 2 mặt trước sau.</p>\r\n\r\n<p>Th&agrave;nh phần: vải kh&ocirc;ng dệt, nước, chất bảo quản, tinh dầu bưởi, axit citric, tinh dầu hướng dương.</p>\r\n\r\n<p>1 T&uacute;i: 6 Găng tay loại d&ugrave;ng 1 lần</p>', '<p><img alt=\"Găng Tay Khử Mùi Hôi Cho Chó Mèo Wei Lian - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/files/shopify_a8615cc9-3d4a-450d-a4f8-e27ca5d1958f.jpg?v=1692495914\" style=\"height:600px; width:600px\" /></p>\r\n\r\n<h2>Găng Tay Tắm Kh&ocirc;, Khử M&ugrave;i, Vệ Sinh Cho Th&uacute; Cưng (T&uacute;i 6 Chiếc)</h2>\r\n\r\n<p>Đ&ocirc;i khi việc tắm cho c&aacute;c Boss kh&aacute; bất tiện nếu b&eacute; &quot;nhanh dơ&quot; hoặc đối với c&aacute;c b&eacute; c&ograve;n qu&aacute; nhỏ hoặc qu&aacute; gi&agrave; để tắm thường xuy&ecirc;n, nếu tắm nhiều sẽ dễ g&acirc;y bệnh, nhất l&agrave; khi l&agrave; khi chuyển v&agrave;o m&ugrave;a lạnh. Bao tay Khăn ướt gi&uacute;p Sen đỡ phải tắm Boss nhiều lần, m&agrave; vẫn l&agrave;m sạch bụi bẩn, l&ocirc;ng rụng tr&ecirc;n người Boss. Size bao tay to, rộng th&iacute;ch hợp với nhiều k&iacute;ch cỡ tay của c&aacute;c Sen, ngo&agrave;i ra b&ecirc;n trong c&ograve;n c&oacute; th&ecirc;m lớp l&oacute;t gi&uacute;p Sen kh&ocirc;ng lo dơ tay khi lau cho Boss đ&acirc;u n&egrave;. Đặc biệt l&agrave; Bao tay c&oacute; thể sử dụng cả 2 mặt trước v&agrave; sau, vừa tiết kiệm vừa ti&ecirc;n dụng phải kh&ocirc;ng Sen ơi.</p>\r\n\r\n<p>C&ocirc;ng dụng ch&iacute;nh</p>\r\n\r\n<p>* L&agrave; một chiếc khăn giấy ướt được tạo h&igrave;nh th&agrave;nh một chiếc bao tay, c&oacute; thể lau sạch c&aacute;c vết bẩn nhỏ hoặc ở những vị tr&iacute; kh&oacute; lau (tai, kẽ c&aacute;c ng&oacute;n ch&acirc;n, l&ograve;ng b&agrave;n ch&acirc;n, cằm, n&aacute;ch, bẹn,&hellip;).</p>\r\n\r\n<p>* Khuyến kh&iacute;ch d&ugrave;ng cho ch&oacute; con v&agrave; ch&oacute; gi&agrave; khi kh&ocirc;ng thể tắm gội: chấn thương, bị bệnh,&hellip;</p>\r\n\r\n<p>* D&ugrave;ng vuốt ve, để th&uacute; cưng kh&ocirc;ng cảm thấy kh&oacute; chịu, giảm bớt căng thẳng.</p>\r\n\r\n<p>* An to&agrave;n khi th&uacute; cưng liếm phải Hướng dẫn sử dụng:</p>\r\n\r\n<p>* Mở nắp r&uacute;t từng chiếc sử dụng v&agrave; đậy nắp ngay sau đ&oacute; để giữ ẩm v&agrave; tr&aacute;nh vấy bẩn.</p>\r\n\r\n<p>* D&ugrave;ng được cả 2 mặt trước sau.</p>\r\n\r\n<p>Th&agrave;nh phần: vải kh&ocirc;ng dệt, nước, chất bảo quản, tinh dầu bưởi, axit citric, tinh dầu hướng dương.</p>\r\n\r\n<p>1 T&uacute;i: 6 Găng tay loại d&ugrave;ng 1 lần</p>', 30000, 'shopify_a8615cc9-3d4a-450d-a4f8-e27ca5d1958f85.webp', 0, NULL, NULL, NULL),
(48, 4, 'KEM ĐÁNH RĂNG HƯƠNG DÂU CHO CHÓ MÈO TOOTHPASTE 100ML', '<p><img alt=\"Kem Đánh Răng Hương Dâu Cho Chó Mèo Forcans Toothpaste 100ml - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/kem-djanh-rang-huong-dau-cho-cho-meo-forcans-toothpaste-100ml-paddy.jpg?v=1712921257\" style=\"height:650px; width:650px\" /></p>\r\n\r\n<p>- Kem đ&aacute;nh răng dạng ăn được, sau khi đ&aacute;nh răng kh&ocirc;ng cần nhổ ra m&agrave; c&oacute; thể nuốt v&agrave;o.<br />\r\n- Việc đ&aacute;nh răng đ&uacute;ng quy tắc gi&uacute;p duy tr&igrave; sức khỏe răng, v&agrave; hỗ trợ ph&ograve;ng ngừa c&aacute;c chứng vi&ecirc;m răng miệng, ngừa mảng b&aacute;m v&agrave; cao răng.<br />\r\n- Hương vị thơm ngon, được th&uacute; cưng y&ecirc;u th&iacute;ch.<br />\r\n- C&oacute; thể bơm kem đ&aacute;nh răng ra cho th&uacute; cưng liếm hoặc trộn chung với thức ăn.</p>', '<p><img alt=\"Kem Đánh Răng Hương Dâu Cho Chó Mèo Forcans Toothpaste 100ml - Paddy Pet Shop\" src=\"https://paddy.vn/cdn/shop/products/kem-djanh-rang-huong-dau-cho-cho-meo-forcans-toothpaste-100ml-paddy.jpg?v=1712921257\" style=\"height:650px; width:650px\" /></p>\r\n\r\n<p>- Kem đ&aacute;nh răng dạng ăn được, sau khi đ&aacute;nh răng kh&ocirc;ng cần nhổ ra m&agrave; c&oacute; thể nuốt v&agrave;o.<br />\r\n- Việc đ&aacute;nh răng đ&uacute;ng quy tắc gi&uacute;p duy tr&igrave; sức khỏe răng, v&agrave; hỗ trợ ph&ograve;ng ngừa c&aacute;c chứng vi&ecirc;m răng miệng, ngừa mảng b&aacute;m v&agrave; cao răng.<br />\r\n- Hương vị thơm ngon, được th&uacute; cưng y&ecirc;u th&iacute;ch.<br />\r\n- C&oacute; thể bơm kem đ&aacute;nh răng ra cho th&uacute; cưng liếm hoặc trộn chung với thức ăn.</p>', 138000, 'kem-danh-rang-cho-meo-forcans-dental-clean-toothpaste98.webp', 0, NULL, NULL, NULL),
(49, 6, 'CHÓ PHÚ QUỐC', '<p><img alt=\"Mua bán chó Phú Quốc lai và thuần chủng - Dịch Vụ Huấn Luyện Chó\" src=\"https://dichvuhuanluyencho.com/wp-content/uploads/2021/01/cho_phu_quoc-1-1024x1024-compressed-800x800.jpg\" style=\"height:700px; width:700px\" /></p>\r\n\r\n<p><strong>Ch&oacute; Ph&uacute; Quốc &ndash; Người bạn trung th&agrave;nh với nguồn gốc Việt Nam</strong></p>\r\n\r\n<p>Ch&oacute; Ph&uacute; Quốc l&agrave; giống ch&oacute; nổi tiếng của Việt Nam, đặc biệt l&agrave; từ đảo Ph&uacute; Quốc. Ch&uacute;ng được biết đến với sự th&ocirc;ng minh, lanh lợi v&agrave; khả năng bơi lội tuyệt vời. Ch&oacute; Ph&uacute; Quốc l&agrave; giống ch&oacute; săn, đ&atilde; được nu&ocirc;i để t&igrave;m v&agrave; săn bắt th&uacute; rừng, đặc biệt l&agrave; trong điều kiện m&ocirc;i trường khắc nghiệt.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Ch&oacute; Ph&uacute; Quốc rất th&ocirc;ng minh, độc lập, v&agrave; c&oacute; bản năng bảo vệ mạnh mẽ. Ch&uacute;ng rất trung th&agrave;nh với chủ v&agrave; th&iacute;ch hợp l&agrave;m ch&oacute; giữ nh&agrave;. D&ugrave; mạnh mẽ v&agrave; c&oacute; thể hơi hoang d&atilde;, ch&uacute;ng rất y&ecirc;u thương gia đ&igrave;nh, đặc biệt l&agrave; khi được huấn luyện v&agrave; giao tiếp đ&uacute;ng c&aacute;ch. Ch&oacute; Ph&uacute; Quốc c&oacute; khả năng l&agrave;m quen với c&aacute;c vật nu&ocirc;i v&agrave; người lạ, nhưng đ&ocirc;i khi ch&uacute;ng c&oacute; thể cảnh gi&aacute;c v&agrave; cần thời gian để l&agrave;m quen.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Ch&oacute; Ph&uacute; Quốc ph&ugrave; hợp với những gia đ&igrave;nh hoặc người y&ecirc;u động vật c&oacute; kh&ocirc;ng gian rộng r&atilde;i. Với t&iacute;nh c&aacute;ch năng động v&agrave; dũng cảm, ch&uacute;ng th&iacute;ch hợp với chủ nh&acirc;n c&oacute; thời gian huấn luyện v&agrave; cho ch&uacute;ng tham gia c&aacute;c hoạt động ngo&agrave;i trời như đi dạo hoặc chạy.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Vận động</strong>: Ch&oacute; Ph&uacute; Quốc rất năng động v&agrave; cần vận động thường xuy&ecirc;n để giải tỏa năng lượng. V&igrave; vậy, nếu bạn sống trong kh&ocirc;ng gian nhỏ, cần đảm bảo c&oacute; đủ thời gian cho ch&uacute;ng ra ngo&agrave;i chạy nhảy hoặc chơi đ&ugrave;a.</li>\r\n	<li><strong>Chăm s&oacute;c l&ocirc;ng</strong>: Bộ l&ocirc;ng của Ph&uacute; Quốc ngắn v&agrave; dễ chăm s&oacute;c, nhưng ch&uacute;ng c&oacute; thể rụng l&ocirc;ng theo m&ugrave;a, cần ch&uacute; &yacute; vệ sinh thường xuy&ecirc;n.</li>\r\n	<li><strong>Kh&iacute; hậu</strong>: Giống ch&oacute; n&agrave;y chịu được kh&iacute; hậu nhiệt đới v&agrave; n&oacute;ng ẩm rất tốt, nhưng vẫn cần c&oacute; sự chăm s&oacute;c hợp l&yacute; trong những ng&agrave;y n&oacute;ng để tr&aacute;nh mệt mỏi.</li>\r\n	<li><strong>T&iacute;nh c&aacute;ch</strong>: Ch&oacute; Ph&uacute; Quốc kh&aacute; độc lập v&agrave; c&oacute; xu hướng l&agrave;m theo bản năng của m&igrave;nh, v&igrave; vậy cần huấn luyện ki&ecirc;n nhẫn từ nhỏ để ch&uacute;ng trở n&ecirc;n ngoan ngo&atilde;n v&agrave; v&acirc;ng lời.</li>\r\n</ol>\r\n\r\n<p>Ch&oacute; Ph&uacute; Quốc l&agrave; giống ch&oacute; trung th&agrave;nh, dũng cảm v&agrave; rất ph&ugrave; hợp với những người y&ecirc;u th&iacute;ch động vật, c&oacute; kh&ocirc;ng gian sống rộng v&agrave; sẵn s&agrave;ng d&agrave;nh thời gian chăm s&oacute;c, huấn luyện ch&uacute;ng. Ch&uacute;ng sẽ l&agrave; người bạn tuyệt vời cho gia đ&igrave;nh bạn!</p>', '<p><img alt=\"Chó Phú Quốc giá bao nhiêu? Nguồn gốc, đặc điểm, cách nuôi\" src=\"https://laputafarm.com/wp-content/uploads/2023/06/Dac-diem-ngoai-hinh-cua-cho-xoay-Phu-Quoc.jpg\" style=\"height:699px; width:700px\" /></p>\r\n\r\n<p><strong>Ch&oacute; Ph&uacute; Quốc &ndash; Người bạn trung th&agrave;nh với nguồn gốc Việt Nam</strong></p>\r\n\r\n<p>Ch&oacute; Ph&uacute; Quốc l&agrave; giống ch&oacute; nổi tiếng của Việt Nam, đặc biệt l&agrave; từ đảo Ph&uacute; Quốc. Ch&uacute;ng được biết đến với sự th&ocirc;ng minh, lanh lợi v&agrave; khả năng bơi lội tuyệt vời. Ch&oacute; Ph&uacute; Quốc l&agrave; giống ch&oacute; săn, đ&atilde; được nu&ocirc;i để t&igrave;m v&agrave; săn bắt th&uacute; rừng, đặc biệt l&agrave; trong điều kiện m&ocirc;i trường khắc nghiệt.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Ch&oacute; Ph&uacute; Quốc rất th&ocirc;ng minh, độc lập, v&agrave; c&oacute; bản năng bảo vệ mạnh mẽ. Ch&uacute;ng rất trung th&agrave;nh với chủ v&agrave; th&iacute;ch hợp l&agrave;m ch&oacute; giữ nh&agrave;. D&ugrave; mạnh mẽ v&agrave; c&oacute; thể hơi hoang d&atilde;, ch&uacute;ng rất y&ecirc;u thương gia đ&igrave;nh, đặc biệt l&agrave; khi được huấn luyện v&agrave; giao tiếp đ&uacute;ng c&aacute;ch. Ch&oacute; Ph&uacute; Quốc c&oacute; khả năng l&agrave;m quen với c&aacute;c vật nu&ocirc;i v&agrave; người lạ, nhưng đ&ocirc;i khi ch&uacute;ng c&oacute; thể cảnh gi&aacute;c v&agrave; cần thời gian để l&agrave;m quen.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Ch&oacute; Ph&uacute; Quốc ph&ugrave; hợp với những gia đ&igrave;nh hoặc người y&ecirc;u động vật c&oacute; kh&ocirc;ng gian rộng r&atilde;i. Với t&iacute;nh c&aacute;ch năng động v&agrave; dũng cảm, ch&uacute;ng th&iacute;ch hợp với chủ nh&acirc;n c&oacute; thời gian huấn luyện v&agrave; cho ch&uacute;ng tham gia c&aacute;c hoạt động ngo&agrave;i trời như đi dạo hoặc chạy.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Vận động</strong>: Ch&oacute; Ph&uacute; Quốc rất năng động v&agrave; cần vận động thường xuy&ecirc;n để giải tỏa năng lượng. V&igrave; vậy, nếu bạn sống trong kh&ocirc;ng gian nhỏ, cần đảm bảo c&oacute; đủ thời gian cho ch&uacute;ng ra ngo&agrave;i chạy nhảy hoặc chơi đ&ugrave;a.</li>\r\n	<li><strong>Chăm s&oacute;c l&ocirc;ng</strong>: Bộ l&ocirc;ng của Ph&uacute; Quốc ngắn v&agrave; dễ chăm s&oacute;c, nhưng ch&uacute;ng c&oacute; thể rụng l&ocirc;ng theo m&ugrave;a, cần ch&uacute; &yacute; vệ sinh thường xuy&ecirc;n.</li>\r\n	<li><strong>Kh&iacute; hậu</strong>: Giống ch&oacute; n&agrave;y chịu được kh&iacute; hậu nhiệt đới v&agrave; n&oacute;ng ẩm rất tốt, nhưng vẫn cần c&oacute; sự chăm s&oacute;c hợp l&yacute; trong những ng&agrave;y n&oacute;ng để tr&aacute;nh mệt mỏi.</li>\r\n	<li><strong>T&iacute;nh c&aacute;ch</strong>: Ch&oacute; Ph&uacute; Quốc kh&aacute; độc lập v&agrave; c&oacute; xu hướng l&agrave;m theo bản năng của m&igrave;nh, v&igrave; vậy cần huấn luyện ki&ecirc;n nhẫn từ nhỏ để ch&uacute;ng trở n&ecirc;n ngoan ngo&atilde;n v&agrave; v&acirc;ng lời.</li>\r\n</ol>\r\n\r\n<p>Ch&oacute; Ph&uacute; Quốc l&agrave; giống ch&oacute; trung th&agrave;nh, dũng cảm v&agrave; rất ph&ugrave; hợp với những người y&ecirc;u th&iacute;ch động vật, c&oacute; kh&ocirc;ng gian sống rộng v&agrave; sẵn s&agrave;ng d&agrave;nh thời gian chăm s&oacute;c, huấn luyện ch&uacute;ng. Ch&uacute;ng sẽ l&agrave; người bạn tuyệt vời cho gia đ&igrave;nh bạn!</p>', 5000000, 'phu-quoc6.jpg', 0, NULL, NULL, NULL),
(50, 6, 'CHÓ BẮC HÀ', '<p><img alt=\"Chó Bắc Hà - Quốc khuyển lông xù dũng mãnh của Việt Nam\" src=\"https://lh6.googleusercontent.com/3ugJgFzlkWJkUXW8URO7KM2qOcqdHfskz59W_XuXx4CQ7cRs04Idx9O58gMB78kyd9x7z-_JNp7yToWgejGHhlBDnvZDmeHAQT6C3vDdzSc_jk2dMzMPvDlnqeusCfhZhn_gzRl6\" style=\"height:510px; width:700px\" /></p>\r\n\r\n<p>Ch&oacute; Chobacha (hay c&ograve;n gọi l&agrave; Chobaka) l&agrave; giống ch&oacute; lai giữa ch&oacute; Shiba Inu v&agrave; ch&oacute; Poodle, sở hữu những đặc điểm nổi bật của cả hai giống ch&oacute; n&agrave;y. Đ&acirc;y l&agrave; giống ch&oacute; nhỏ nhắn, th&ocirc;ng minh v&agrave; c&oacute; t&iacute;nh c&aacute;ch vui tươi, rất ph&ugrave; hợp l&agrave;m bạn đồng h&agrave;nh cho gia đ&igrave;nh.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Chobacha l&agrave; giống ch&oacute; năng động, dễ thương v&agrave; rất gắn b&oacute; với chủ. Ch&uacute;ng c&oacute; t&iacute;nh c&aacute;ch th&acirc;n thiện, dễ gần v&agrave; lu&ocirc;n mang đến kh&ocirc;ng kh&iacute; vui vẻ. Với sự th&ocirc;ng minh của Poodle v&agrave; t&iacute;nh c&aacute;ch độc lập của Shiba Inu, Chobacha thường rất dễ huấn luyện, nhưng cũng cần sự ki&ecirc;n nhẫn v&agrave; kỷ luật. Ch&uacute;ng rất h&ograve;a đồng với trẻ em v&agrave; c&aacute;c vật nu&ocirc;i kh&aacute;c trong gia đ&igrave;nh.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Chobacha th&iacute;ch hợp với những gia đ&igrave;nh sống trong kh&ocirc;ng gian vừa phải hoặc căn hộ, v&igrave; ch&uacute;ng kh&ocirc;ng qu&aacute; cần nhiều kh&ocirc;ng gian rộng lớn. Tuy nhi&ecirc;n, ch&uacute;ng cần được vận động v&agrave; tham gia c&aacute;c hoạt động ngo&agrave;i trời để giữ tinh thần v&agrave; thể chất khỏe mạnh.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Vận động</strong>: Chobacha cần được vận động h&agrave;ng ng&agrave;y để tr&aacute;nh nh&agrave;m ch&aacute;n v&agrave; duy tr&igrave; sức khỏe. Ch&uacute;ng th&iacute;ch chơi đ&ugrave;a, đi dạo v&agrave; tham gia c&aacute;c tr&ograve; chơi tương t&aacute;c.</li>\r\n	<li><strong>Chăm s&oacute;c l&ocirc;ng</strong>: Chobacha c&oacute; bộ l&ocirc;ng mềm mại v&agrave; xoăn nhẹ, cần chải l&ocirc;ng thường xuy&ecirc;n để tr&aacute;nh rối v&agrave; giữ vệ sinh.</li>\r\n	<li><strong>Sức khỏe</strong>: Chobacha l&agrave; giống ch&oacute; khỏe mạnh, nhưng vẫn cần kiểm tra định kỳ sức khỏe, đặc biệt l&agrave; c&aacute;c vấn đề li&ecirc;n quan đến răng miệng v&agrave; xương khớp.</li>\r\n	<li><strong>Huấn luyện</strong>: Chobacha rất th&ocirc;ng minh nhưng đ&ocirc;i khi c&oacute; thể bướng bỉnh, v&igrave; vậy cần c&oacute; sự ki&ecirc;n nhẫn v&agrave; kỷ luật khi huấn luyện từ nhỏ.</li>\r\n</ol>\r\n\r\n<p>Ch&oacute; Chobacha l&agrave; lựa chọn tuyệt vời cho những ai t&igrave;m kiếm một ch&uacute; ch&oacute; nhỏ, đ&aacute;ng y&ecirc;u v&agrave; th&ocirc;ng minh. Với t&igrave;nh cảm v&agrave; sự chăm s&oacute;c đ&uacute;ng c&aacute;ch, ch&uacute;ng sẽ l&agrave; người bạn đồng h&agrave;nh tuyệt vời trong gia đ&igrave;nh bạn!</p>', '<p><img alt=\"Chó Bắc Hà - Đặc Điểm, Bảng Giá &amp; Địa Chỉ Mua Bán Uy Tín\" src=\"https://sieupet.com/sites/default/files/bac_ha6.jpg\" style=\"height:525px; width:700px\" /></p>\r\n\r\n<p>Ch&oacute; Chobacha (hay c&ograve;n gọi l&agrave; Chobaka) l&agrave; giống ch&oacute; lai giữa ch&oacute; Shiba Inu v&agrave; ch&oacute; Poodle, sở hữu những đặc điểm nổi bật của cả hai giống ch&oacute; n&agrave;y. Đ&acirc;y l&agrave; giống ch&oacute; nhỏ nhắn, th&ocirc;ng minh v&agrave; c&oacute; t&iacute;nh c&aacute;ch vui tươi, rất ph&ugrave; hợp l&agrave;m bạn đồng h&agrave;nh cho gia đ&igrave;nh.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Chobacha l&agrave; giống ch&oacute; năng động, dễ thương v&agrave; rất gắn b&oacute; với chủ. Ch&uacute;ng c&oacute; t&iacute;nh c&aacute;ch th&acirc;n thiện, dễ gần v&agrave; lu&ocirc;n mang đến kh&ocirc;ng kh&iacute; vui vẻ. Với sự th&ocirc;ng minh của Poodle v&agrave; t&iacute;nh c&aacute;ch độc lập của Shiba Inu, Chobacha thường rất dễ huấn luyện, nhưng cũng cần sự ki&ecirc;n nhẫn v&agrave; kỷ luật. Ch&uacute;ng rất h&ograve;a đồng với trẻ em v&agrave; c&aacute;c vật nu&ocirc;i kh&aacute;c trong gia đ&igrave;nh.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Chobacha th&iacute;ch hợp với những gia đ&igrave;nh sống trong kh&ocirc;ng gian vừa phải hoặc căn hộ, v&igrave; ch&uacute;ng kh&ocirc;ng qu&aacute; cần nhiều kh&ocirc;ng gian rộng lớn. Tuy nhi&ecirc;n, ch&uacute;ng cần được vận động v&agrave; tham gia c&aacute;c hoạt động ngo&agrave;i trời để giữ tinh thần v&agrave; thể chất khỏe mạnh.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Vận động</strong>: Chobacha cần được vận động h&agrave;ng ng&agrave;y để tr&aacute;nh nh&agrave;m ch&aacute;n v&agrave; duy tr&igrave; sức khỏe. Ch&uacute;ng th&iacute;ch chơi đ&ugrave;a, đi dạo v&agrave; tham gia c&aacute;c tr&ograve; chơi tương t&aacute;c.</li>\r\n	<li><strong>Chăm s&oacute;c l&ocirc;ng</strong>: Chobacha c&oacute; bộ l&ocirc;ng mềm mại v&agrave; xoăn nhẹ, cần chải l&ocirc;ng thường xuy&ecirc;n để tr&aacute;nh rối v&agrave; giữ vệ sinh.</li>\r\n	<li><strong>Sức khỏe</strong>: Chobacha l&agrave; giống ch&oacute; khỏe mạnh, nhưng vẫn cần kiểm tra định kỳ sức khỏe, đặc biệt l&agrave; c&aacute;c vấn đề li&ecirc;n quan đến răng miệng v&agrave; xương khớp.</li>\r\n	<li><strong>Huấn luyện</strong>: Chobacha rất th&ocirc;ng minh nhưng đ&ocirc;i khi c&oacute; thể bướng bỉnh, v&igrave; vậy cần c&oacute; sự ki&ecirc;n nhẫn v&agrave; kỷ luật khi huấn luyện từ nhỏ.</li>\r\n</ol>\r\n\r\n<p>Ch&oacute; Chobacha l&agrave; lựa chọn tuyệt vời cho những ai t&igrave;m kiếm một ch&uacute; ch&oacute; nhỏ, đ&aacute;ng y&ecirc;u v&agrave; th&ocirc;ng minh. Với t&igrave;nh cảm v&agrave; sự chăm s&oacute;c đ&uacute;ng c&aacute;ch, ch&uacute;ng sẽ l&agrave; người bạn đồng h&agrave;nh tuyệt vời trong gia đ&igrave;nh bạn!</p>', 7500000, 'labardo83.jpg', 0, NULL, NULL, NULL),
(51, 6, 'CHÓ COCKER', '<p><img alt=\"CHÍNH XÁC NHÂT] Chó Cocker Tây Ban Nha giá bao nhiêu?\" src=\"https://kimipet.vn/wp-content/uploads/2021/07/cocker-dep-khong-.jpg\" /></p>\r\n\r\n<p><strong>Ch&oacute; Cocker Spaniel &ndash; Người bạn trung th&agrave;nh v&agrave; vui tươi</strong></p>\r\n\r\n<p>Ch&oacute; Cocker Spaniel l&agrave; một trong những giống ch&oacute; phổ biến nhất, được y&ecirc;u th&iacute;ch v&igrave; t&iacute;nh c&aacute;ch dễ chịu v&agrave; ngoại h&igrave;nh dễ thương. C&oacute; nguồn gốc từ Anh v&agrave; Mỹ, Cocker Spaniel được nu&ocirc;i để l&agrave;m ch&oacute; săn, đặc biệt l&agrave; săn chim. Với bộ l&ocirc;ng d&agrave;i mượt v&agrave; đ&ocirc;i tai mềm mại, Cocker Spaniel kh&ocirc;ng chỉ thu h&uacute;t bởi vẻ ngo&agrave;i m&agrave; c&ograve;n bởi sự đ&aacute;ng y&ecirc;u v&agrave; th&acirc;n thiện.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Cocker Spaniel l&agrave; giống ch&oacute; rất vui tươi, năng động v&agrave; trung th&agrave;nh. Ch&uacute;ng y&ecirc;u th&iacute;ch sự tương t&aacute;c v&agrave; lu&ocirc;n muốn được ch&uacute; &yacute;. Cocker rất th&iacute;ch chơi đ&ugrave;a v&agrave; gần gũi với gia đ&igrave;nh, đặc biệt l&agrave; trẻ em. Tuy nhi&ecirc;n, ch&uacute;ng cũng kh&aacute; nhạy cảm v&agrave; c&oacute; thể cảm thấy lo lắng nếu kh&ocirc;ng được chăm s&oacute;c hoặc giao tiếp đ&uacute;ng c&aacute;ch.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Cocker Spaniel ph&ugrave; hợp với gia đ&igrave;nh c&oacute; kh&ocirc;ng gian rộng r&atilde;i hoặc căn hộ với đủ kh&ocirc;ng gian để ch&uacute;ng vận động. Ch&uacute;ng th&iacute;ch hợp với chủ nh&acirc;n c&oacute; thời gian d&agrave;nh cho việc chăm s&oacute;c v&agrave; chơi đ&ugrave;a với ch&uacute;ng.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Vận động</strong>: Cocker Spaniel cần được vận động h&agrave;ng ng&agrave;y, bao gồm đi dạo v&agrave; c&aacute;c tr&ograve; chơi để giải tỏa năng lượng. Nếu kh&ocirc;ng được vận động đủ, ch&uacute;ng c&oacute; thể trở n&ecirc;n buồn ch&aacute;n hoặc ph&aacute; ph&aacute;ch.</li>\r\n	<li><strong>Chăm s&oacute;c l&ocirc;ng</strong>: Bộ l&ocirc;ng d&agrave;i v&agrave; d&agrave;y của Cocker cần được chải tỉ mỉ để tr&aacute;nh rối v&agrave; duy tr&igrave; độ b&oacute;ng mượt. Ch&uacute;ng cũng cần được cắt tỉa thường xuy&ecirc;n.</li>\r\n	<li><strong>Sức khỏe</strong>: Cocker Spaniel l&agrave; giống ch&oacute; khỏe mạnh, nhưng c&oacute; thể gặp phải c&aacute;c vấn đề về mắt v&agrave; tai. Do đ&oacute;, cần kiểm tra sức khỏe định kỳ, đặc biệt l&agrave; l&agrave;m sạch tai để tr&aacute;nh nhiễm tr&ugrave;ng.</li>\r\n	<li><strong>T&iacute;nh c&aacute;ch</strong>: Cocker Spaniel đ&ocirc;i khi c&oacute; thể nhạy cảm v&agrave; dễ bị lo lắng nếu kh&ocirc;ng được huấn luyện v&agrave; chăm s&oacute;c đ&uacute;ng c&aacute;ch. Việc huấn luyện x&atilde; hội h&oacute;a từ sớm rất quan trọng để ch&uacute;ng trở n&ecirc;n ngoan ngo&atilde;n v&agrave; v&acirc;ng lời.</li>\r\n</ol>\r\n\r\n<p>Cocker Spaniel l&agrave; giống ch&oacute; tuyệt vời cho những gia đ&igrave;nh muốn một người bạn đồng h&agrave;nh năng động, trung th&agrave;nh v&agrave; dễ thương. Với sự chăm s&oacute;c v&agrave; t&igrave;nh y&ecirc;u thương, ch&uacute;ng sẽ l&agrave; một phần kh&ocirc;ng thể thiếu trong gia đ&igrave;nh bạn!</p>', '<p><img alt=\"Chó Cocker Spaniel Anh: Nguồn gốc, đặc điểm, giá bán 2024\" src=\"https://laputafarm.com/wp-content/uploads/2024/06/Cho-Cocker-Spaniel-Anh-2.jpg\" style=\"height:516px; width:700px\" /></p>\r\n\r\n<p><strong>Ch&oacute; Cocker Spaniel &ndash; Người bạn trung th&agrave;nh v&agrave; vui tươi</strong></p>\r\n\r\n<p>Ch&oacute; Cocker Spaniel l&agrave; một trong những giống ch&oacute; phổ biến nhất, được y&ecirc;u th&iacute;ch v&igrave; t&iacute;nh c&aacute;ch dễ chịu v&agrave; ngoại h&igrave;nh dễ thương. C&oacute; nguồn gốc từ Anh v&agrave; Mỹ, Cocker Spaniel được nu&ocirc;i để l&agrave;m ch&oacute; săn, đặc biệt l&agrave; săn chim. Với bộ l&ocirc;ng d&agrave;i mượt v&agrave; đ&ocirc;i tai mềm mại, Cocker Spaniel kh&ocirc;ng chỉ thu h&uacute;t bởi vẻ ngo&agrave;i m&agrave; c&ograve;n bởi sự đ&aacute;ng y&ecirc;u v&agrave; th&acirc;n thiện.</p>\r\n\r\n<p><strong>T&iacute;nh c&aacute;ch</strong>: Cocker Spaniel l&agrave; giống ch&oacute; rất vui tươi, năng động v&agrave; trung th&agrave;nh. Ch&uacute;ng y&ecirc;u th&iacute;ch sự tương t&aacute;c v&agrave; lu&ocirc;n muốn được ch&uacute; &yacute;. Cocker rất th&iacute;ch chơi đ&ugrave;a v&agrave; gần gũi với gia đ&igrave;nh, đặc biệt l&agrave; trẻ em. Tuy nhi&ecirc;n, ch&uacute;ng cũng kh&aacute; nhạy cảm v&agrave; c&oacute; thể cảm thấy lo lắng nếu kh&ocirc;ng được chăm s&oacute;c hoặc giao tiếp đ&uacute;ng c&aacute;ch.</p>\r\n\r\n<p><strong>Đối tượng ph&ugrave; hợp</strong>: Cocker Spaniel ph&ugrave; hợp với gia đ&igrave;nh c&oacute; kh&ocirc;ng gian rộng r&atilde;i hoặc căn hộ với đủ kh&ocirc;ng gian để ch&uacute;ng vận động. Ch&uacute;ng th&iacute;ch hợp với chủ nh&acirc;n c&oacute; thời gian d&agrave;nh cho việc chăm s&oacute;c v&agrave; chơi đ&ugrave;a với ch&uacute;ng.</p>\r\n\r\n<p><strong>Lưu &yacute; trước khi mua</strong>:</p>\r\n\r\n<ol>\r\n	<li><strong>Vận động</strong>: Cocker Spaniel cần được vận động h&agrave;ng ng&agrave;y, bao gồm đi dạo v&agrave; c&aacute;c tr&ograve; chơi để giải tỏa năng lượng. Nếu kh&ocirc;ng được vận động đủ, ch&uacute;ng c&oacute; thể trở n&ecirc;n buồn ch&aacute;n hoặc ph&aacute; ph&aacute;ch.</li>\r\n	<li><strong>Chăm s&oacute;c l&ocirc;ng</strong>: Bộ l&ocirc;ng d&agrave;i v&agrave; d&agrave;y của Cocker cần được chải tỉ mỉ để tr&aacute;nh rối v&agrave; duy tr&igrave; độ b&oacute;ng mượt. Ch&uacute;ng cũng cần được cắt tỉa thường xuy&ecirc;n.</li>\r\n	<li><strong>Sức khỏe</strong>: Cocker Spaniel l&agrave; giống ch&oacute; khỏe mạnh, nhưng c&oacute; thể gặp phải c&aacute;c vấn đề về mắt v&agrave; tai. Do đ&oacute;, cần kiểm tra sức khỏe định kỳ, đặc biệt l&agrave; l&agrave;m sạch tai để tr&aacute;nh nhiễm tr&ugrave;ng.</li>\r\n	<li><strong>T&iacute;nh c&aacute;ch</strong>: Cocker Spaniel đ&ocirc;i khi c&oacute; thể nhạy cảm v&agrave; dễ bị lo lắng nếu kh&ocirc;ng được huấn luyện v&agrave; chăm s&oacute;c đ&uacute;ng c&aacute;ch. Việc huấn luyện x&atilde; hội h&oacute;a từ sớm rất quan trọng để ch&uacute;ng trở n&ecirc;n ngoan ngo&atilde;n v&agrave; v&acirc;ng lời.</li>\r\n</ol>\r\n\r\n<p>Cocker Spaniel l&agrave; giống ch&oacute; tuyệt vời cho những gia đ&igrave;nh muốn một người bạn đồng h&agrave;nh năng động, trung th&agrave;nh v&agrave; dễ thương. Với sự chăm s&oacute;c v&agrave; t&igrave;nh y&ecirc;u thương, ch&uacute;ng sẽ l&agrave; một phần kh&ocirc;ng thể thiếu trong gia đ&igrave;nh bạn!</p>', 6000000, 'cocker18.png', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `rating_comment` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `customer_id`, `product_id`, `rating`, `rating_comment`, `created_at`, `updated_at`) VALUES
(15, 9, 28, 5, 'h', '2024-11-21', NULL),
(17, 9, 10, 5, 'hoa', '2024-11-21', NULL),
(19, 7, 25, 1, 'tệ', '2024-11-21', NULL),
(20, 7, 16, 1, NULL, '2024-11-21', NULL),
(21, 9, 29, 1, '.,.', '2024-11-22', NULL),
(22, 8, 13, 1, 'tệ', '2024-11-27', NULL),
(23, 8, 10, 3, NULL, '2024-11-27', NULL),
(24, 8, 28, 1, 'capybara', '2024-12-01', NULL),
(25, 8, 22, 1, '.', '2024-12-19', NULL),
(26, 8, 23, 1, '2', '2024-12-19', NULL),
(27, 8, 23, 2, 'e', '2024-12-19', NULL),
(28, 8, 21, 5, NULL, '2024-12-19', NULL),
(29, 8, 13, 5, NULL, '2024-12-20', NULL),
(30, 8, 20, 5, NULL, '2024-12-20', NULL),
(31, 8, 15, 5, NULL, '2024-12-20', NULL),
(32, 13, 14, 4, NULL, '2024-12-20', NULL),
(33, 13, 10, 5, NULL, '2024-12-21', NULL),
(34, 10, 31, 5, NULL, '2024-12-22', NULL),
(35, 9, 48, 4, NULL, '2024-12-22', NULL),
(36, 9, 16, 5, NULL, '2024-12-22', NULL),
(37, 8, 38, 5, NULL, '2024-12-22', NULL),
(38, 10, 11, 3, NULL, '2024-12-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tratien`
--

CREATE TABLE `tbl_tratien` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `payment_method` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tratien`
--

INSERT INTO `tbl_tratien` (`payment_id`, `payment_status`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 'Đang chờ xử lý', 1, NULL, NULL),
(14, 'Đang chờ xử lý', 2, NULL, NULL),
(16, 'Đang chờ xử lý', 2, NULL, NULL),
(17, 'Đang chờ xử lý', 2, NULL, NULL),
(18, 'Đang chờ xử lý', 2, NULL, NULL),
(19, 'Đang chờ xử lý', 2, NULL, NULL),
(25, 'Đang chờ xử lý', 2, NULL, NULL),
(26, 'Đang chờ xử lý', 2, NULL, NULL),
(27, 'Đang chờ xử lý', 2, NULL, NULL),
(28, 'Đang chờ xử lý', 2, NULL, NULL),
(29, 'Đang chờ xử lý', 2, NULL, NULL),
(30, 'Đang chờ xử lý', 2, NULL, NULL),
(31, 'Đang chờ xử lý', 2, NULL, NULL),
(32, 'Đang chờ xử lý', 2, NULL, NULL),
(33, 'Đang chờ xử lý', 2, NULL, NULL),
(34, 'Đang chờ xử lý', 2, NULL, NULL),
(35, 'Đang chờ xử lý', 2, NULL, NULL),
(36, 'Đang chờ xử lý', 2, NULL, NULL),
(37, 'Đang chờ xử lý', 2, NULL, NULL),
(38, 'Đang chờ xử lý', 2, NULL, NULL),
(42, 'Đang chờ xử lý', 2, NULL, NULL),
(43, 'Đang chờ xử lý', 2, NULL, NULL),
(44, 'Đang chờ xử lý', 2, NULL, NULL),
(45, 'Đang chờ xử lý', 2, NULL, NULL),
(46, 'Đang chờ xử lý', 2, NULL, NULL),
(47, 'Đang chờ xử lý', 2, NULL, NULL),
(54, 'Đang chờ xử lý', 2, NULL, NULL),
(55, 'Đang chờ xử lý', 2, NULL, NULL),
(56, 'Đang chờ xử lý', 2, NULL, NULL),
(57, 'Đang chờ xử lý', 2, NULL, NULL),
(63, 'Đang chờ xử lý', 2, NULL, NULL),
(68, 'Đang chờ xử lý', 2, NULL, NULL),
(72, 'Đang chờ xử lý', 2, NULL, NULL),
(74, 'Đang chờ xử lý', 2, NULL, NULL),
(75, 'Đang chờ xử lý', 2, NULL, NULL),
(76, 'Đang chờ xử lý', 2, NULL, NULL),
(77, 'Đang chờ xử lý', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cart_temp`
--
ALTER TABLE `tbl_cart_temp`
  ADD PRIMARY KEY (`cart_temp_id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_chitietdathang`
--
ALTER TABLE `tbl_chitietdathang`
  ADD PRIMARY KEY (`chitietdathang_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_dathang`
--
ALTER TABLE `tbl_dathang`
  ADD PRIMARY KEY (`dathang_id`);

--
-- Indexes for table `tbl_hoandon`
--
ALTER TABLE `tbl_hoandon`
  ADD PRIMARY KEY (`hoadon_id`);

--
-- Indexes for table `tbl_magiamgia`
--
ALTER TABLE `tbl_magiamgia`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `tbl_phanquyen`
--
ALTER TABLE `tbl_phanquyen`
  ADD PRIMARY KEY (`ma_quyen`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_tratien`
--
ALTER TABLE `tbl_tratien`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart_temp`
--
ALTER TABLE `tbl_cart_temp`
  MODIFY `cart_temp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_chitietdathang`
--
ALTER TABLE `tbl_chitietdathang`
  MODIFY `chitietdathang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_dathang`
--
ALTER TABLE `tbl_dathang`
  MODIFY `dathang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_hoandon`
--
ALTER TABLE `tbl_hoandon`
  MODIFY `hoadon_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_magiamgia`
--
ALTER TABLE `tbl_magiamgia`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_phanquyen`
--
ALTER TABLE `tbl_phanquyen`
  MODIFY `ma_quyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_tratien`
--
ALTER TABLE `tbl_tratien`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
