-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 14, 2023 lúc 09:54 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ismart.com`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categors`
--

CREATE TABLE `categors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categors`
--

INSERT INTO `categors` (`id`, `name`, `slug`, `parent_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'dien-thoai', 0, 11, '2023-07-11 02:18:34', '2023-07-11 02:18:34'),
(5, 'Máy tính', 'may-tinh', 0, 11, '2023-07-11 23:03:09', '2023-07-11 23:03:09'),
(6, 'Thiết bị điện tử', 'thiet-bi-dien-tu', 0, 11, '2023-07-11 23:04:54', '2023-07-11 23:04:54'),
(8, 'Phụ kiện', 'phu-kien', 0, 11, '2023-07-11 23:05:48', '2023-07-11 23:05:48'),
(9, 'Samsung', 'samsung', 1, 11, '2023-07-11 23:06:10', '2023-07-11 23:08:37'),
(10, 'Iphone', 'iphone', 1, 11, '2023-07-11 23:08:53', '2023-07-11 23:08:53'),
(11, 'Oppo', 'oppo', 1, 11, '2023-07-11 23:09:00', '2023-07-11 23:09:00'),
(12, 'Tai nghe', 'tai-nghe', 6, 11, '2023-07-11 23:09:12', '2023-07-11 23:09:12'),
(13, 'Chuột máy tính', 'chuot-may-tinh', 6, 11, '2023-07-11 23:09:34', '2023-07-11 23:09:34'),
(14, 'Loa', 'loa', 6, 11, '2023-07-11 23:09:41', '2023-07-11 23:09:41'),
(15, 'Không dây', 'khong-day', 12, 11, '2023-07-11 23:09:49', '2023-07-11 23:09:49'),
(16, 'Có dây', 'co-day', 12, 11, '2023-07-11 23:09:58', '2023-07-11 23:09:58'),
(17, 'Ốp điện thoại', 'op-dien-thoai', 8, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cat_posts`
--

CREATE TABLE `cat_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cat_posts`
--

INSERT INTO `cat_posts` (`id`, `name`, `slug`, `parent_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 'Trang chủ', '/', 0, 11, '2023-07-25 20:45:03', '2023-07-25 20:45:03'),
(9, 'Tin Tức', 'tin-tuc.html', 0, 11, '2023-07-25 20:45:59', '2023-07-25 20:45:59'),
(12, 'Giới thiệu', 'gioi-thieu.html', 0, 11, '2023-07-25 21:32:01', '2023-07-25 21:32:01'),
(13, 'Quốc tế', 'quoc-te', 9, 11, '2023-07-25 22:01:06', '2023-07-27 06:26:37'),
(14, 'Kinh Doanh', 'kinh-doanh', 9, 11, '2023-07-27 06:26:15', '2023-07-27 06:26:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2023_07_06_141255_add_softdelete_to_users_table', 2),
(26, '2023_07_11_085440_create_categors_table', 2),
(27, '2023_07_11_085839_create_products_table', 2),
(29, '2023_07_12_133649_add_code_to_products_table', 3),
(30, '2023_07_19_125439_create_orders_table', 4),
(31, '2023_07_19_131241_create_order_details_table', 5),
(32, '2023_07_25_112523_create_cat_posts_table', 6),
(34, '2023_07_26_014001_create_pages_table', 7),
(35, '2023_07_26_064404_create_posts_table', 8),
(37, '2023_07_28_055008_create_sliders_table', 9),
(38, '2023_07_30_080531_create_permissions_table', 10),
(39, '2023_07_30_080908_create_roles_table', 11),
(41, '2023_07_30_081237_create_role_permission', 12),
(42, '2023_07_30_081626_create_user_role', 12),
(43, '2023_08_01_133923_add_featured_to_products_table', 13),
(44, '2023_08_11_023740_add_total_product_to_products_table', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_account` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_account`, `code`, `total_price`, `address`, `phone`, `note`, `status`, `created_at`, `updated_at`) VALUES
(12, 11, 'DH#168986539627', 12990000, 'Thạch Lỗi(trường mầm non Thanh Xuân)', '0965142001', NULL, 0, '2023-07-20 08:03:16', '2023-07-31 20:55:40'),
(22, 24, 'DH#169087154353', 81687000, 'Sóc Sơn - Hà Nội', '0961924960', NULL, 2, '2023-07-31 23:32:23', '2023-07-31 23:46:07'),
(23, 24, 'DH#169087156959', 45497000, 'Sóc Sơn - Hà Nội', '0961924960', NULL, 1, '2023-07-31 23:32:49', '2023-07-31 23:34:26'),
(24, 24, 'DH#169087162710', 6990000, 'Sóc Sơn - Hà Nội', '0961924960', NULL, 3, '2023-07-31 23:33:47', '2023-07-31 23:34:46'),
(25, 25, 'DH#16908719311', 8999000, 'Long Biên - Hà Nội', '0966999988', NULL, 0, '2023-07-31 23:38:51', '2023-07-31 23:38:51'),
(26, 25, 'DH#169087194143', 12990000, 'Long Biên - Hà Nội', '0966999988', NULL, 4, '2023-07-31 23:39:01', '2023-07-31 23:46:15'),
(27, 25, 'DH#169087195092', 7499000, 'Long Biên - Hà Nội', '0966999988', NULL, 0, '2023-07-31 23:39:10', '2023-07-31 23:39:10'),
(28, 25, 'DH#169087196486', 39897000, 'Long Biên - Hà Nội', '0966999988', NULL, 0, '2023-07-31 23:39:24', '2023-07-31 23:39:24'),
(29, 26, 'DH#169087210972', 13998000, 'Bắc Từ Liêm - Hà Nội', '0329350063', NULL, 0, '2023-07-31 23:41:49', '2023-07-31 23:41:49'),
(30, 26, 'DH#169087213157', 53499000, 'Bắc Từ Liêm - Hà Nội', '0329350063', NULL, 0, '2023-07-31 23:42:11', '2023-07-31 23:42:11'),
(32, 26, 'DH#169087215027', 109200000, 'Bắc Từ Liêm - Hà Nội', '0329350063', NULL, 3, '2023-07-31 23:42:30', '2023-07-31 23:46:41'),
(63, 27, 'DH#169106491599', 15900000, 'Thanh Xuân -Hà Nội', '0988776655', NULL, 0, '2023-08-03 05:15:15', '2023-08-03 05:15:15'),
(65, 27, 'DH#169106512972', 7499000, 'Thanh Xuân -Hà Nội', '0988776655', NULL, 0, '2023-08-03 05:18:49', '2023-08-03 05:18:49'),
(66, 27, 'DH#169106532298', 33479000, 'Thanh Xuân -Hà Nội', '0988776655', NULL, 0, '2023-08-03 05:22:02', '2023-08-03 05:22:02'),
(67, 27, 'DH#169106564865', 12498000, 'Thanh Xuân -Hà Nội', '0988776655', NULL, 0, '2023-08-03 05:27:28', '2023-08-03 05:27:28'),
(68, 27, 'DH#16910659261', 37494000, 'Thanh Xuân -Hà Nội', '0988776655', NULL, 0, '2023-08-03 05:32:06', '2023-08-03 05:32:06'),
(72, 27, 'DH#169106707585', 22497000, 'Thanh Xuân -Hà Nội', '0988776655', NULL, 0, '2023-08-03 05:51:15', '2023-08-03 05:51:15'),
(73, 26, 'DH#169191263246', 6999000, 'Bắc Từ Liêm - Hà Nội', '0329350063', NULL, 0, '2023-08-13 00:43:52', '2023-08-13 00:43:52'),
(74, 26, 'DH#169191347491', 29996000, 'Bắc Từ Liêm - Hà Nội', '0329350063', NULL, 0, '2023-08-13 00:57:54', '2023-08-13 00:57:54'),
(75, 26, 'DH#169191353441', 35996000, 'Bắc Từ Liêm - Hà Nội', '0329350063', NULL, 0, '2023-08-13 00:58:54', '2023-08-13 00:58:54'),
(76, 26, 'DH#169191365012', 6999000, 'Bắc Từ Liêm - Hà Nội', '0329350063', NULL, 0, '2023-08-13 01:00:50', '2023-08-13 01:00:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `id_order`, `id_product`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(13, 12, 17, 12990000, 1, '2023-07-20 08:03:16', '2023-07-20 08:03:16'),
(28, 22, 13, 6999000, 3, '2023-07-31 23:32:23', '2023-07-31 23:32:23'),
(29, 22, 17, 12990000, 1, '2023-07-31 23:32:23', '2023-07-31 23:32:23'),
(30, 22, 8, 15900000, 3, '2023-07-31 23:32:23', '2023-07-31 23:32:23'),
(31, 23, 5, 7499000, 3, '2023-07-31 23:32:49', '2023-07-31 23:32:49'),
(32, 23, 9, 23000000, 1, '2023-07-31 23:32:49', '2023-07-31 23:32:49'),
(34, 25, 14, 4999000, 1, '2023-07-31 23:38:51', '2023-07-31 23:38:51'),
(35, 25, 15, 2000000, 2, '2023-07-31 23:38:51', '2023-07-31 23:38:51'),
(36, 26, 17, 12990000, 1, '2023-07-31 23:39:01', '2023-07-31 23:39:01'),
(37, 27, 5, 7499000, 1, '2023-07-31 23:39:10', '2023-07-31 23:39:10'),
(38, 28, 8, 15900000, 1, '2023-07-31 23:39:24', '2023-07-31 23:39:24'),
(39, 28, 6, 7999000, 3, '2023-07-31 23:39:24', '2023-07-31 23:39:24'),
(40, 29, 13, 6999000, 2, '2023-07-31 23:41:49', '2023-07-31 23:41:49'),
(41, 30, 5, 7499000, 1, '2023-07-31 23:42:11', '2023-07-31 23:42:11'),
(42, 30, 9, 23000000, 2, '2023-07-31 23:42:11', '2023-07-31 23:42:11'),
(68, 63, 8, 15900000, 1, '2023-08-03 05:15:15', '2023-08-03 05:15:15'),
(70, 65, 5, 7499000, 1, '2023-08-03 05:18:49', '2023-08-03 05:18:49'),
(71, 66, 5, 7499000, 1, '2023-08-03 05:22:02', '2023-08-03 05:22:02'),
(72, 66, 17, 12990000, 2, '2023-08-03 05:22:02', '2023-08-03 05:22:02'),
(73, 67, 5, 7499000, 1, '2023-08-03 05:27:28', '2023-08-03 05:27:28'),
(74, 67, 14, 4999000, 1, '2023-08-03 05:27:28', '2023-08-03 05:27:28'),
(75, 68, 5, 7499000, 3, '2023-08-03 05:32:06', '2023-08-03 05:32:06'),
(76, 68, 14, 4999000, 3, '2023-08-03 05:32:06', '2023-08-03 05:32:06'),
(80, 72, 5, 7499000, 3, '2023-08-03 05:51:15', '2023-08-03 05:51:15'),
(81, 73, 13, 6999000, 1, '2023-08-13 00:43:52', '2023-08-13 00:43:52'),
(82, 74, 5, 7499000, 4, '2023-08-13 00:57:54', '2023-08-13 00:57:54'),
(83, 75, 13, 6999000, 4, '2023-08-13 00:58:54', '2023-08-13 00:58:54'),
(84, 75, 15, 2000000, 4, '2023-08-13 00:58:54', '2023-08-13 00:58:54'),
(85, 76, 13, 6999000, 1, '2023-08-13 01:00:50', '2023-08-13 01:00:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'add post', 'post.add', NULL, '2023-07-30 19:14:29', '2023-07-30 19:14:29'),
(2, 'add product', 'product.add', NULL, '2023-07-30 19:15:04', '2023-07-30 19:15:04'),
(3, 'Delete Product', 'product.delete', NULL, '2023-07-30 19:15:56', '2023-07-31 18:44:34'),
(4, 'edit post', 'post.edit', 'sửa bài viết', '2023-07-30 19:32:39', '2023-07-30 20:11:13'),
(5, 'delete post', 'post.delete', NULL, '2023-07-30 19:37:16', '2023-07-30 20:11:44'),
(6, 'list product', 'product.list', NULL, '2023-07-30 19:39:12', '2023-07-30 19:39:12'),
(8, 'list post', 'post.list', NULL, '2023-07-30 20:13:14', '2023-07-30 20:13:28'),
(9, 'list slider', 'slider.list', NULL, '2023-07-30 20:52:08', '2023-07-30 20:52:08'),
(10, 'edit slider', 'slider.edit', NULL, '2023-07-30 20:52:28', '2023-07-30 20:52:28'),
(11, 'edit product', 'product.edit', NULL, '2023-07-31 18:45:07', '2023-07-31 18:45:07'),
(12, 'add slider', 'slider.add', NULL, '2023-07-31 18:45:33', '2023-07-31 18:45:33'),
(13, 'delete slider', 'slider.delete', NULL, '2023-07-31 18:45:43', '2023-07-31 18:45:43'),
(14, 'list order', 'order.list', NULL, '2023-07-31 18:47:36', '2023-07-31 18:47:36'),
(15, 'edit order', 'order.edit', NULL, '2023-07-31 18:48:02', '2023-07-31 18:49:20'),
(16, 'delete order', 'order.delete', NULL, '2023-07-31 18:48:19', '2023-07-31 18:48:19'),
(17, 'add user', 'user.add', NULL, '2023-07-31 18:49:12', '2023-07-31 18:49:12'),
(18, 'list user', 'user.list', NULL, '2023-07-31 18:49:30', '2023-07-31 18:49:30'),
(19, 'edit user', 'user.edit', NULL, '2023-07-31 18:49:43', '2023-07-31 18:49:43'),
(20, 'delete user', 'user.delete', NULL, '2023-07-31 18:49:59', '2023-07-31 18:49:59'),
(21, 'add permission', 'permission.add', NULL, '2023-07-31 18:50:58', '2023-07-31 18:50:58'),
(22, 'edit permission', 'permission.edit', NULL, '2023-07-31 18:51:34', '2023-07-31 18:51:34'),
(23, 'delete permission', 'permission.delete', NULL, '2023-07-31 18:52:07', '2023-07-31 18:52:07'),
(24, 'list role', 'role.list', NULL, '2023-07-31 18:53:16', '2023-07-31 18:53:16'),
(25, 'edit role', 'role.edit', NULL, '2023-07-31 18:53:26', '2023-07-31 18:53:26'),
(26, 'add role', 'role.add', NULL, '2023-07-31 18:53:36', '2023-07-31 18:53:36'),
(27, 'delete role', 'role.delete', NULL, '2023-07-31 18:54:04', '2023-07-31 18:54:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cat_post_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `cat_post_id`, `title`, `slug`, `detail`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 13, '3 cách để bạn có một bộ não khỏe mạnh', '3-cach-de-ban-co-mot-bo-nao-khoe-manh', '<p><strong>1.Ngủ đủ:&nbsp;</strong></p>\r\n<p>Lu&ocirc;n thực hiện vệ sinh thần kinh, ngủ từ 6 đến 8 giờ mỗi đ&ecirc;m l&agrave; một trong những việc tốt nhất bạn c&oacute; thể l&agrave;m cho bộ n&atilde;o của m&igrave;nh - Gi&aacute;o sư Jason Shepherd ở Trường đại học Utah cho biết.</p>\r\n<p>Giấc ngủ gi&uacute;p cho n&atilde;o xử l&yacute; th&ocirc;ng tin, h&igrave;nh th&agrave;nh tr&iacute; nhớ, củng cố c&aacute;c kh&aacute;i niệm v&agrave; &yacute; tưởng mới, v&agrave; loại bỏ sự t&iacute;ch tụ độc hại của c&aacute;c protein amyloid, l&agrave; những protein thường t&iacute;ch tụ trong n&atilde;o của người mắc bệnh Alzheimer.</p>\r\n<p>Giấc ngủ cũng gi&uacute;p tăng cường t&iacute;nh linh hoạt của n&atilde;o, khả năng th&iacute;ch ứng với c&aacute;c t&igrave;nh huống v&agrave; trải nghiệm mới. Bộ n&atilde;o c&agrave;ng c&oacute; khả năng th&iacute;ch ứng với những thử th&aacute;ch mới th&igrave; bạn c&agrave;ng c&oacute; thể cải thiện v&agrave; duy tr&igrave; chức năng nhận thức khi gi&agrave; đi.</p>\r\n<p><strong>2. Tập thể dục cho tim</strong></p>\r\n<p>Gi&aacute;o sư Shepherd cho biết &ocirc;ng cũng tập thể dục đều đặn h&agrave;ng ng&agrave;y, bởi v&igrave; c&aacute;c b&agrave;i tập thường xuy&ecirc;n gi&uacute;p tăng lưu lượng m&aacute;u l&ecirc;n n&atilde;o v&agrave; một tr&aacute;i tim khỏe mạnh mới c&oacute; thể bơm đủ m&aacute;u cho n&atilde;o để n&atilde;o hoạt động được tối ưu.</p>\r\n<p>Nghi&ecirc;n cứu cho thấy những người tập thể dục thường xuy&ecirc;n th&igrave; &iacute;t khả năng mắc bệnh Alzheimer hơn, đồng thời tập thể dục cũng l&agrave;m chậm qu&aacute; tr&igrave;nh suy giảm nhận thức ở người gi&agrave;.</p>\r\n<p>Trung t&acirc;m Kiểm so&aacute;t v&agrave; Ph&ograve;ng ngừa bệnh của Mỹ ch&iacute;nh thức khuyến nghị mọi người n&ecirc;n d&agrave;nh 150 ph&uacute;t mỗi tuần để tập c&aacute;c b&agrave;i thể dục mức độ trung b&igrave;nh, nhưng gi&aacute;o sư Shepherd khuy&ecirc;n rằng bất cứ l&uacute;c n&agrave;o bạn c&oacute; thể vận động cơ thể th&igrave; đều tốt hơn l&agrave; kh&ocirc;ng l&agrave;m g&igrave;.</p>\r\n<p>Đối với &ocirc;ng, việc đ&oacute; c&oacute; thể l&agrave; dắt ch&oacute; đi dạo v&agrave;i km một hoặc hai lần mỗi ng&agrave;y v&agrave; chơi b&oacute;ng n&eacute;m v&agrave;o c&aacute;c cuối tuần.</p>\r\n<p><strong>3. Đi ăn trưa với bạn b&egrave;</strong></p>\r\n<p>Sự c&ocirc; đơn c&oacute; thể l&agrave;m hại&nbsp;<a href=\"https://dantri.com.vn/suc-khoe.htm\" data-auto-link-id=\"613281f9fb044100119a146d\" data-track-content=\"\" data-content-name=\"article-content-autolink\" data-content-piece=\"article-content-autolink_613281f9fb044100119a146d\" data-content-target=\"/suc-khoe/5-cach-de-ban-co-mot-bo-nao-khoe-manh-20230720090727185.htm\">sức khỏe</a>&nbsp;t&acirc;m thần, sức khỏe cảm x&uacute;c v&agrave; cả bộ n&atilde;o. V&igrave; thế việc kết nối với mọi người l&agrave; v&ocirc; c&ugrave;ng quan trọng - Gi&aacute;o sư Talia Lerner ở Trường đại học Northwestern cho biết.</p>\r\n<p>Nh&igrave;n chung, những người c&oacute; mối quan hệ x&atilde; hội đa dạng v&agrave; l&agrave;nh mạnh c&oacute; xu hướng sống l&acirc;u hơn. D&agrave;nh thời gian b&ecirc;n những người kh&aacute;c rất tốt cho đời sống cảm x&uacute;c, điều n&agrave;y rất c&oacute; lợi cho bộ n&atilde;o.</p>\r\n<p>Nghi&ecirc;n cứu cho thấy những mối kết giao x&atilde; hội bền vững c&ograve;n c&oacute; thể gi&uacute;p giảm nguy cơ trầm cảm v&agrave; gi&uacute;p mọi người xử l&yacute; tốt hơn khi gặp kh&oacute; khăn.</p>\r\n<p>Nhưng giữ kết nối với người kh&aacute;c cũng c&oacute; thể l&agrave; một thử th&aacute;ch, nhất l&agrave; khi bạn nhiều tuổi. Với nhiều người bạn ở khắp nơi tr&ecirc;n nước Mỹ, gi&aacute;o sư Lerner sử dụng mạng x&atilde; hội v&agrave; ứng dụng tin nhắn để gi&uacute;p b&agrave; lu&ocirc;n giữ li&ecirc;n lạc với họ.</p>\r\n<p>B&agrave; cũng thường xuy&ecirc;n t&igrave;nh nguyện tham gia c&aacute;c hoạt động ở trường của c&aacute;c con như một c&aacute;ch gặp gỡ c&aacute;c phụ huynh kh&aacute;c trong cộng đồng. B&agrave; n&oacute;i rằng \"thậm ch&iacute; nếu bạn kh&ocirc;ng c&oacute; con, c&aacute;c hoạt động t&igrave;nh nguyện cũng rất c&oacute; &iacute;ch v&agrave; tốt cho bạn\".</p>', 'uploads/chay-bo-edited-1689818460152.jpg', 1, '2023-07-26 02:00:41', '2023-08-01 21:12:04'),
(3, 11, 14, 'Quảng cáo trực tuyến giúp Meta tăng doanh thu', 'quang-cao-truc-tuyen-giup-meta-tang-doanh-thu', '<p class=\"description\">Meta Platforms - c&ocirc;ng ty mẹ Facebook ghi nhận doanh thu tăng qu&yacute; thứ hai li&ecirc;n tiếp, nhờ mảng quảng c&aacute;o khởi sắc sau nhiều th&aacute;ng im ắng.</p>\r\n<article class=\"fck_detail \">\r\n<p class=\"Normal\">Meta Platforms h&ocirc;m 26/7 c&ocirc;ng bố doanh thu qu&yacute; II đạt 32 tỷ USD, tăng 11% so với c&ugrave;ng kỳ năm ngo&aacute;i v&agrave; cao hơn dự b&aacute;o của giới ph&acirc;n t&iacute;ch. Đ&acirc;y l&agrave; qu&yacute; thứ hai li&ecirc;n tiếp c&ocirc;ng ty mẹ Facebook ghi nhận doanh thu tăng, sau năm 2022 ảm đạm.</p>\r\n<p class=\"Normal\">Lợi nhuận qu&yacute; trước đạt 7,8 tỷ USD, tăng 16% so với c&ugrave;ng kỳ năm ngo&aacute;i. Con số n&agrave;y cũng cao hơn dự b&aacute;o.</p>\r\n<p class=\"Normal\">Kết quả n&agrave;y l&agrave; nhờ mảng quảng c&aacute;o trực tuyến tăng tốc trở lại sau v&agrave;i th&aacute;ng im ắng, với 12% qu&yacute; trước. B&ecirc;n cạnh đ&oacute;, nh&agrave; đầu tư cũng h&agrave;o hứng với AI, gi&uacute;p lĩnh vực c&ocirc;ng nghệ khởi sắc v&agrave;i th&aacute;ng qua. Trước Meta, Alphabet h&ocirc;m 25/7 cũng ghi nhận mảng quảng c&aacute;o trực tuyến khởi sắc.</p>\r\n<p class=\"Normal\"><img src=\"/Laravel/unitop.vn/public/storage/photos/post/meta-reuters-7318-1690428249.jpg\" alt=\"\" width=\"846\" height=\"546\" /></p>\r\n<p class=\"Normal\">Gi&aacute;m đốc T&agrave;i ch&iacute;nh Meta Susan Li h&ocirc;m qua cho biết doanh thu quảng c&aacute;o tăng một phần nhờ sức chi của c&aacute;c h&atilde;ng b&aacute;n lẻ trực tuyến v&agrave; c&aacute;c doanh nghiệp Trung Quốc. Xu hướng n&agrave;y đ&atilde; bắt đầu từ qu&yacute; trước.</p>\r\n<p class=\"Normal\">Li cũng cho biết c&aacute;c kh&aacute;ch h&agrave;ng quảng c&aacute;o đ&atilde; d&ugrave;ng dịch vụ Advantage+ của Meta. Giới ph&acirc;n t&iacute;ch cho rằng dịch vụ n&agrave;y sẽ gi&uacute;p c&ocirc;ng ty cải thiện hiệu quả của hệ thống quảng c&aacute;o, sau khi hệ điều h&agrave;nh iOS thay đổi quyền ri&ecirc;ng tư. \"Ch&uacute;ng t&ocirc;i đ&atilde; thấy m&ocirc; h&igrave;nh n&agrave;y c&oacute; hiệu quả với kh&aacute;ch h&agrave;ng, khi tăng trưởng trong qu&yacute; II vẫn mạnh\", Li cho biết.</p>\r\n<p class=\"Normal\">B&aacute;o c&aacute;o n&agrave;y được c&ocirc;ng bố chỉ v&agrave;i tuần sau khi Meta ra mắt Threads &ndash; đối thủ của Twitter. Ứng dụng n&agrave;y đ&atilde; c&oacute; 100 triệu lượt người đăng k&yacute; chỉ trong gần một tuần. Meta đang li&ecirc;n tục bổ sung t&iacute;nh năng để giữ ch&acirc;n người d&ugrave;ng.</p>\r\n<p class=\"Normal\">C&aacute;c th&ocirc;ng tin t&iacute;ch cực tr&ecirc;n gi&uacute;p cổ phiếu Meta tăng 7% trong phi&ecirc;n giao dịch ngo&agrave;i giờ. Từ đầu năm, m&atilde; n&agrave;y đ&atilde; tăng hơn 160%.</p>\r\n<p class=\"Normal\">\"Ch&uacute;ng t&ocirc;i đ&atilde; c&oacute; một qu&yacute; tốt đẹp. C&aacute;c ứng dụng đều ghi nhận sức tăng trưởng mạnh. Ch&uacute;ng t&ocirc;i rất h&agrave;o hứng với lộ tr&igrave;nh của Llama 2, Threads, Reels v&agrave; c&aacute;c sản phẩm t&iacute;ch hợp AI mới\", CEO Meta Mark Zuckerberg cho biết trong th&ocirc;ng b&aacute;o. Sắp tới, họ c&ograve;n ra mắt k&iacute;nh th&ocirc;ng minh Quest 3.</p>\r\n</article>', 'uploads/meta-reuters-1690428115-2264-1690428249.jpg', 1, '2023-07-27 06:24:47', '2023-07-27 20:20:31'),
(4, 11, 12, 'VN-Index mất mốc 1.200 điểm', 'vn-index-mat-moc-1200-diem', '<p class=\"description\">&Aacute;p lực chốt lời xuất hiện từ cuối buổi s&aacute;ng đẩy nhiều cổ phiếu trụ rớt gi&aacute;, VN-Index nhanh ch&oacute;ng l&ugrave;i về dưới 1.200 điểm chỉ sau một phi&ecirc;n.</p>\r\n<article class=\"fck_detail \">\r\n<p class=\"Normal\">Phi&ecirc;n ATO mở cửa kh&aacute; triển vọng cho thị trường khi hầu hết lệnh được khớp đều phủ sắc xanh. Sau đ&oacute;, lực b&aacute;n xuất hiện k&eacute;o chỉ số n&agrave;y về tham chiếu, c&oacute; thời điểm giảm nhẹ, nhưng sau đ&oacute; d&ograve;ng tiền đổ v&agrave;o gi&uacute;p thị trường c&acirc;n bằng hơn.</p>\r\n<p class=\"Normal\">Từ khoảng 10h30, nh&agrave; đầu tư li&ecirc;n tục chốt lời cổ phiếu, nhất l&agrave; ở rổ VN30, đẩy&nbsp;<a href=\"https://vnexpress.net/kinh-doanh/vn-index-vn30-index-va-cach-tinh-toan-4297351.html\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-KinhDoanh_ChungKhoan-4634720&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-VnIndex&amp;vn_term=Desktop&amp;vn_thumb=0&amp;vn_test=A\" data-itm-added=\"1\">VN-Index</a>&nbsp;giảm một mạch xuống dưới 1.200 điểm. Sắc đỏ k&eacute;o d&agrave;i đến chiều. Cuối phi&ecirc;n, lực cầu xuất hiện gi&uacute;p chỉ số đại diện s&agrave;n TP HCM cải thiện điểm số nhưng vẫn đ&oacute;ng cửa ở 1.197,3 điểm, giảm hơn 3,5 điểm so với phi&ecirc;n h&ocirc;m qua.</p>\r\n<div id=\"admbackground\" data-set=\"dfp\">&nbsp;</div>\r\n<p class=\"Normal\"><a href=\"https://vnexpress.net/kinh-doanh/vn-index-vuot-1-200-diem-4634282.html\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-KinhDoanh_ChungKhoan-4634720&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-Moc1200Diem&amp;vn_term=Desktop&amp;vn_thumb=0&amp;vn_test=A\" data-itm-added=\"1\">Mốc 1.200 điểm</a>&nbsp;được c&aacute;c b&ecirc;n quan s&aacute;t cho l&agrave; v&ugrave;ng kh&aacute;ng cự mạnh trong ngắn hạn của thị trường. Do đ&oacute;, x&aacute;c suất điều chỉnh theo t&acirc;m l&yacute; chốt lời l&agrave; kịch bản đ&atilde; được nhiều c&ocirc;ng ty chứng kho&aacute;n lưu &yacute; trước. Ngo&agrave;i ra, rạng s&aacute;ng nay, Cục Dự trữ li&ecirc;n bang Mỹ (Fed)&nbsp;<a href=\"https://vnexpress.net/kinh-doanh/fed-tang-lai-suat-len-cao-nhat-22-nam-4634412.html\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-KinhDoanh_ChungKhoan-4634720&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-NangLai&amp;vn_term=Desktop&amp;vn_thumb=0&amp;vn_test=A\" data-itm-added=\"1\">n&acirc;ng l&atilde;i</a>&nbsp;trở lại, th&ecirc;m 25 điểm cơ bản (0,25%) v&agrave; ra t&iacute;n hiệu thắt chặt th&ecirc;m lần nữa trong năm nay. V&igrave; thế, diễn biến thị trường chứng kho&aacute;n cũng chịu t&aacute;c động.</p>\r\n<p class=\"Normal\">To&agrave;n s&agrave;n HoSE c&oacute; 262 cổ phiếu giảm, cao hơn số lượng 193 cổ phiếu tăng. Ri&ecirc;ng rổ VN30 c&oacute; 17 m&atilde; giảm. Nh&igrave;n chung thị trường mất điểm do diễn biến của nh&oacute;m ng&acirc;n h&agrave;ng, dịch vụ t&agrave;i ch&iacute;nh v&agrave; nguy&ecirc;n vật liệu. Ở chiều ngược lại, c&ocirc;ng nghiệp v&agrave; bất động sản g&oacute;p mức tăng lớn. D&ograve;ng tiền vẫn chuộng t&igrave;m đến những cổ phiếu c&oacute; c&acirc;u chuyện ri&ecirc;ng. Điều n&agrave;y tương tự như xu hướng giao dịch ở những phi&ecirc;n trước đ&oacute;.</p>\r\n<p class=\"Normal\">M&atilde; chứng kho&aacute;n của&nbsp;<a href=\"https://vnexpress.net/chu-de/novaland-2009\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-KinhDoanh_ChungKhoan-4634720&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-Novaland&amp;vn_term=Desktop&amp;vn_thumb=0&amp;vn_test=A\" data-itm-added=\"1\">Novaland</a>&nbsp;h&ocirc;m nay ghi nhận gi&aacute; trị giao dịch vượt 1.250 tỷ đồng (tương đương hơn 71 triệu đơn vị), cao nhất s&agrave;n HoSE. Thị gi&aacute; tăng 3,8% so với tham chiếu, đạt 17.850 đồng - v&ugrave;ng gi&aacute; cũ hồi th&aacute;ng 12/2022. Những phi&ecirc;n gần đ&acirc;y, NVL lu&ocirc;n được nền tảng theo d&otilde;i thị trường Investing xếp v&agrave;o cổ phiếu c&oacute; khối lượng giao dịch bất thường, khi c&oacute; lượng khớp lệnh cao gấp 4,8 lần so với trung b&igrave;nh 3 th&aacute;ng gần đ&acirc;y.</p>\r\n<p class=\"Normal\">Cũng c&oacute; thanh khoản ngh&igrave;n tỷ, DIG sang tay gần 1.200 tỷ đồng trong h&ocirc;m nay với mức tăng 2,2%. Đ&acirc;y l&agrave; cổ phiếu c&oacute; gi&aacute; trị giao dịch cao thứ hai thị trường. Theo sau l&agrave; DXG với hơn 770 tỷ đồng. M&atilde; n&agrave;y tăng trần 6,8% l&ecirc;n mức 18.050 đồng một cổ phiếu.</p>\r\n<p class=\"Normal\">Nh&igrave;n chung s&agrave;n HoSE, thanh khoản tăng mạnh 26% l&ecirc;n mức gần 22.700 tỷ đồng, cao nhất gần hai th&aacute;ng. Nh&agrave; đầu tư nước ngo&agrave;i c&oacute; t&acirc;m l&yacute; thận trọng hơn khi gi&aacute; trị giao dịch cả hai chiều đều giảm so với h&ocirc;m qua. Nh&oacute;m n&agrave;y vẫn giữ trạng th&aacute;i mua r&ograve;ng khoảng 330 tỷ đồng, chủ yếu l&agrave; m&atilde; VNM, VHM v&agrave; HDB.</p>\r\n</article>', 'uploads/cg2a9353-1690445987-6212-1690446007.jpg', 1, '2023-07-27 06:30:32', '2023-07-27 20:20:35'),
(5, 11, 13, 'Dân số Nhật Bản lần đầu giảm trên toàn quốc', 'dan-so-nhat-ban-lan-dau-giam-tren-toan-quoc', '<p class=\"description\">D&acirc;n số Nhật Bản sụt giảm trong năm thứ 14 li&ecirc;n tiếp với tốc độ nhanh nhất lịch sử v&agrave; lần đầu ti&ecirc;n giảm tr&ecirc;n to&agrave;n bộ 47 tỉnh.</p>\r\n<article class=\"fck_detail \">\r\n<p class=\"Normal\">Bộ Nội vụ v&agrave; Truyền th&ocirc;ng Nhật Bản ng&agrave;y 26/7 c&ocirc;ng bố dữ liệu đăng k&yacute; c&ocirc;ng d&acirc;n t&iacute;nh đến ng&agrave;y 1/1, cho thấy số người mang quốc tịch Nhật l&agrave; 122,42 triệu, giảm 800.000 người so với năm ngo&aacute;i.</p>\r\n<p class=\"Normal\">Đ&acirc;y l&agrave; năm thứ 14 li&ecirc;n tiếp d&acirc;n số Nhật Bản suy giảm, nhưng l&agrave; lần đầu ti&ecirc;n giảm tr&ecirc;n tất cả c&aacute;c tỉnh th&agrave;nh to&agrave;n quốc kể từ khi dữ liệu bắt đầu được ghi nhận năm 1968.</p>\r\n<p class=\"Normal\">Tỉnh Okinawa lần đầu bị sụt giảm d&acirc;n số kể từ năm 1973. Tổng d&acirc;n số Nhật Bản, bao gồm người nước ngo&agrave;i, cũng giảm 511.000 người, xuống 125,4 triệu.</p>\r\n<p class=\"Normal\"><img src=\"/Laravel/unitop.vn/public/storage/photos/post/JJTHVIBEIBI3JD7KQWEZ5VL6SI-5851-1690422460.jpg\" alt=\"\" width=\"562\" height=\"562\" /></p>\r\n<p class=\"Normal\">Trong khi đ&oacute;, lượng người nước ngo&agrave;i sinh sống tại nước n&agrave;y đạt 2,99 triệu, tăng 289.000 người so với năm ngo&aacute;i. Đ&acirc;y l&agrave; mức tăng lớn nhất từ trước tới nay v&agrave; cũng l&agrave; lần đầu ti&ecirc;n người nước ngo&agrave;i ở Nhật tăng sau ba năm ảnh hưởng từ đại dịch Covid-19.</p>\r\n<p class=\"Normal\">Theo&nbsp;<em>Reuters</em>, kết quả n&agrave;y cho thấy x&atilde; hội Nhật Bản đang gi&agrave; đi tr&ecirc;n to&agrave;n quốc v&agrave; nh&oacute;m c&ocirc;ng d&acirc;n nước ngo&agrave;i đang đ&oacute;ng vai tr&ograve; \"lớn hơn bao giờ hết\" trong nỗ lực b&ugrave; đắp những ảnh hưởng do d&acirc;n số sụt giảm. Viện Nghi&ecirc;n cứu An sinh X&atilde; hội v&agrave; D&acirc;n số Nhật Bản (IPSS) ước t&iacute;nh c&ocirc;ng d&acirc;n nước ngo&agrave;i sẽ chiếm 10% d&acirc;n số nước n&agrave;y v&agrave;o năm 2070.</p>\r\n<p class=\"Normal\">Kể từ khi đạt đỉnh năm 2008 với 128 triệu người, d&acirc;n số Nhật Bản giảm dần theo từng năm, khi tỷ lệ sinh thấp tới mức kỷ lục v&agrave;o năm ngo&aacute;i. Tỷ lệ người 65 tuổi trở l&ecirc;n ở nước n&agrave;y tăng l&ecirc;n hơn 29% trong năm 2022.</p>\r\n<p class=\"Normal\">Trong b&agrave;i ph&aacute;t biểu về ch&iacute;nh s&aacute;ch hồi th&aacute;ng 1, Thủ tướng Fumio Kishida cho biết tỷ lệ sinh thấp v&agrave; d&acirc;n số gi&agrave; của&nbsp;<a href=\"https://vnexpress.net/chu-de/nhat-ban-709\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-TheGioi_CuocSongDoDay-4634466&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-NhatBan&amp;vn_term=Desktop&amp;vn_thumb=0&amp;vn_test=A\" data-itm-added=\"1\">Nhật Bản</a>&nbsp;g&acirc;y ra rủi ro cấp b&aacute;ch cho x&atilde; hội. Theo thượng nghị sĩ Masako Mori, cố vấn của &ocirc;ng Kishida, Nhật Bản c&oacute; nguy cơ \"biến mất\" nếu kh&ocirc;ng h&agrave;nh động.</p>\r\n</article>', 'uploads/jjthvibeibi3jd7kqwez5vl6si-169-8929-5999-1690422460.jpg', 1, '2023-07-27 06:34:07', '2023-07-27 20:20:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categor_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text DEFAULT NULL,
  `dess` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `featured` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_product` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `categor_id`, `code`, `name`, `detail`, `dess`, `price`, `sale_price`, `thumbnail`, `featured`, `status`, `created_at`, `updated_at`, `total_product`) VALUES
(5, 5, 'LT#02', 'LAPTOP ASUS X441', '<p>Đồ họa bộ xử l&yacute;<br />Intel&reg; HD Graphics<br />Hệ điều h&agrave;nh<br />Windows 10 Home<br />Ổ cứng<br />HDD: 1 TB SATA3<br />Bộ nhớ RAM<br />4 GB, DDR4 (1 khe), 2133 MHz<br />Trọng lượng<br />1.7 kg</p>', '<p>M&aacute;y t&iacute;nh x&aacute;ch tay LAPTOP ASUS X441MA-GA024T, PQC N5000 l&agrave; d&ograve;ng m&aacute;y t&iacute;nh x&aacute;ch tay th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ, m&aacute;y t&iacute;nh x&aacute;ch tay HP Probook 440 G2 c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 7499000, NULL, 'uploads/img-pro-18.png', 1, 1, '2023-07-12 06:52:16', '2023-08-13 00:57:54', 6),
(6, 5, 'LT#03', 'ACER ASPIRE 1 A114', '<p>Bộ vi xử l&yacute;<br />Intel Pentium, N5000, 1.10 GHz up to 2.7 GHz 2133 MHz<br />K&iacute;ch thước m&agrave;n h&igrave;nh<br />14 inch, HD (1366 x 768)<br />Đồ họa bộ xử l&yacute;<br />Intel&reg; HD Graphics<br />Hệ điều h&agrave;nh<br />Windows 10 Home<br />Ổ cứng<br />HDD: 1 TB SATA3<br />Bộ nhớ RAM<br />4 GB, DDR4 (1 khe), 2133 MHz<br />Trọng lượng<br />1.7 kg</p>', '<p>&nbsp; &nbsp;M&aacute;y t&iacute;nh x&aacute;ch tay Acer Aspire 1 A114 l&agrave; d&ograve;ng m&aacute;y t&iacute;nh x&aacute;ch tay th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ, m&aacute;y t&iacute;nh x&aacute;ch tay HP Probook 440 G2 c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 9990000, 7999000, 'uploads/img-pro-20.png', 0, 1, '2023-07-12 06:55:42', '2023-07-13 18:43:19', 12),
(7, 5, 'LT#04', 'LAPTOP DELL INSPIRON 3576', '<p>Bộ vi xử l&yacute;<br />Intel Pentium, N5000, 1.10 GHz up to 2.7 GHz 2133 MHz<br />K&iacute;ch thước m&agrave;n h&igrave;nh<br />14 inch, HD (1366 x 768)<br />Đồ họa bộ xử l&yacute;<br />Intel&reg; HD Graphics<br />Hệ điều h&agrave;nh<br />Windows 10 Home<br />Ổ cứng<br />HDD: 1 TB SATA3<br />Bộ nhớ RAM<br />4 GB, DDR4 (1 khe), 2133 MHz<br />Trọng lượng<br />1.7 kg</p>', '<p>&nbsp; &nbsp; M&aacute;y t&iacute;nh x&aacute;ch tay HP Probook 440 G2 l&agrave; d&ograve;ng m&aacute;y t&iacute;nh x&aacute;ch tay th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ, m&aacute;y t&iacute;nh x&aacute;ch tay HP Probook 440 G2 c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 13000000, 9999000, 'uploads/img-pro-21.png', 0, 1, '2023-07-12 06:56:50', '2023-08-10 20:39:44', 6),
(8, 5, 'LT#05', 'HP PAVILION 15-AU100', '<p>Bộ vi xử l&yacute;<br />Intel Pentium, N5000, 1.10 GHz up to 2.7 GHz 2133 MHz<br />K&iacute;ch thước m&agrave;n h&igrave;nh<br />14 inch, HD (1366 x 768)<br />Đồ họa bộ xử l&yacute;<br />Intel&reg; HD Graphics<br />Hệ điều h&agrave;nh<br />Windows 10 Home<br />Ổ cứng<br />HDD: 1 TB SATA3<br />Bộ nhớ RAM<br />4 GB, DDR4 (1 khe), 2133 MHz<br />Trọng lượng<br />1.7 kg</p>', '<p>M&aacute;y t&iacute;nh x&aacute;ch tay HP Pavilion 15-au100 Series l&agrave; d&ograve;ng m&aacute;y t&iacute;nh x&aacute;ch tay th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ, m&aacute;y t&iacute;nh x&aacute;ch tay HP Probook 440 G2 c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 15900000, NULL, 'uploads/img-pro-22.png', 1, 1, '2023-07-12 06:57:55', '2023-08-01 06:52:04', 5),
(9, 5, 'LT#06', 'ASUS R540SA-XX616', '<p>Bộ vi xử l&yacute; :Intel Core i505200U 2.2 GHz (3MB L3)</p>\r\n<p>Cache upto 2.7 GHz</p>\r\n<p>Bộ nhớ RAM :4 GB (DDR3 Bus 1600 MHz)</p>\r\n<p>Đồ họa :Intel HD Graphics</p>\r\n<p>Ổ đĩa cứng :500 GB (HDD)</p>', '<p>M&aacute;y t&iacute;nh x&aacute;ch tay Asus R540SA-XX616 l&agrave; d&ograve;ng m&aacute;y t&iacute;nh x&aacute;ch tay th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ, m&aacute;y t&iacute;nh x&aacute;ch tay HP Probook 440 G2 c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 23000000, NULL, 'uploads/img-pro-23.png', 0, 1, '2023-07-12 06:58:53', '2023-07-13 18:43:36', 7),
(11, 5, 'LT#08', 'LENOVO IDEAPAD 1 (11)', '<p>Bộ vi xử l&yacute;<br />Intel Pentium, N5000, 1.10 GHz up to 2.7 GHz 2133 MHz<br />K&iacute;ch thước m&agrave;n h&igrave;nh<br />14 inch, HD (1366 x 768)<br />Đồ họa bộ xử l&yacute;<br />Intel&reg; HD Graphics<br />Hệ điều h&agrave;nh<br />Windows 10 Home<br />Ổ cứng<br />HDD: 1 TB SATA3<br />Bộ nhớ RAM<br />4 GB, DDR4 (1 khe), 2133 MHz<br />Trọng lượng<br />1.7 kg</p>', '<p>M&aacute;y t&iacute;nh x&aacute;ch tay Lenovo IdeaPad 1 (11) l&agrave; d&ograve;ng m&aacute;y t&iacute;nh x&aacute;ch tay th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ, m&aacute;y t&iacute;nh x&aacute;ch tay HP Probook 440 G2 c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 15500000, NULL, 'uploads/img-pro-05.png', 1, 1, '2023-07-12 07:09:45', '2023-08-01 06:52:27', 50),
(12, 5, 'LT#09', 'ASUS EEEBOOK E402', '<p>Bộ vi xử l&yacute; :Intel Core i505200U 2.2 GHz (3MB L3)</p>\r\n<p>Cache upto 2.7 GHz</p>\r\n<p>Bộ nhớ RAM :4 GB (DDR3 Bus 1600 MHz)</p>\r\n<p>Đồ họa :Intel HD Graphics</p>\r\n<p>Ổ đĩa cứng :500 GB (HDD)</p>', '<p>M&aacute;y t&iacute;nh x&aacute;ch tay Asus EeeBook E402l&agrave; d&ograve;ng m&aacute;y t&iacute;nh x&aacute;ch tay th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ, m&aacute;y t&iacute;nh x&aacute;ch tay HP Probook 440 G2 c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 4300000, NULL, 'uploads/img-pro-06.png', 0, 1, '2023-07-12 07:10:43', '2023-07-13 18:43:47', 0),
(13, 9, 'DT#01', 'SAMSUNG GALAXY S8+', '<p>&nbsp;dung lượng pin 3000mAh, m&agrave;n h&igrave;nh 5.8\", độ ph&acirc;n giải 1440 x 2960pixels,</p>\r\n<p>mật độ điểm ảnh l&ecirc;n đến 570ppi, camera selfie 8MP + 12MP camera ch&iacute;nh,</p>\r\n<p>RAM 4GB v&agrave; bộ nhớ trong 64GB.</p>', '<p>Điện thoại HP Probook 440 G2 l&agrave; d&ograve;ng điện thoại th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ,chiếc điện thoại n&agrave;y c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 8000000, 6999000, 'uploads/img-pro-08.png', 1, 1, '2023-07-12 07:12:33', '2023-08-13 01:00:50', 7),
(14, 10, 'DT#02', 'APPLE IPHONE 7', '<p>M&agrave;n h&igrave;nh 5.5\", FHD, IPS LCD, 1080 x 1920 Pixel<br />Camera sau&nbsp;&nbsp; &nbsp;12.0 MP + 12.0 MP<br />Camera Selfie&nbsp;&nbsp; &nbsp;7.0 MP<br />RAM &nbsp;&nbsp; &nbsp;3 GB<br />Bộ nhớ trong&nbsp;&nbsp; &nbsp;128 GB<br />Dung lượng pin&nbsp;&nbsp; &nbsp;2900 mAh<br />Hệ điều h&agrave;nh&nbsp;&nbsp; &nbsp;iOS 13<br />Thời gian ra mắt&nbsp;&nbsp; &nbsp;11/2016</p>', '<p>Điện thoại Apple iPhone 7 l&agrave; d&ograve;ng điện thoại th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ,chiếc điện thoại n&agrave;y c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 4999000, NULL, 'uploads/img-pro-09.png', 0, 1, '2023-07-12 07:13:26', '2023-07-13 18:44:42', 0),
(15, 11, 'DT#03', 'SONY XPERIA XZ PREMIUM', '<p>M&agrave;n h&igrave;nh 5.5\", FHD, IPS LCD, 1080 x 1920 Pixel<br />Camera sau&nbsp;&nbsp; &nbsp;12.0 MP + 12.0 MP<br />Camera Selfie&nbsp;&nbsp; &nbsp;7.0 MP<br />RAM &nbsp;&nbsp; &nbsp;3 GB<br />Bộ nhớ trong&nbsp;&nbsp; &nbsp;128 GB<br />Dung lượng pin&nbsp;&nbsp; &nbsp;2900 mAh<br />Hệ điều h&agrave;nh&nbsp;&nbsp; &nbsp;iOS 13<br />Thời gian ra mắt&nbsp;&nbsp; &nbsp;11/2016</p>', '<p>Điện thoại Sony Xperia XZ Premium l&agrave; d&ograve;ng điện thoại th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ,chiếc điện thoại n&agrave;y c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 2499000, 2000000, 'uploads/img-pro-10.png', 1, 1, '2023-07-12 07:14:29', '2023-08-13 00:58:54', 5),
(16, 11, 'DT#04', 'HTC U11', '<p>M&agrave;n h&igrave;nh 5.5\", FHD, IPS LCD, 1080 x 1920 Pixel<br />Camera sau&nbsp;&nbsp; &nbsp;12.0 MP + 12.0 MP<br />Camera Selfie&nbsp;&nbsp; &nbsp;7.0 MP<br />RAM &nbsp;&nbsp; &nbsp;3 GB<br />Bộ nhớ trong&nbsp;&nbsp; &nbsp;128 GB<br />Dung lượng pin&nbsp;&nbsp; &nbsp;2900 mAh<br />Hệ điều h&agrave;nh&nbsp;&nbsp; &nbsp;iOS 13<br />Thời gian ra mắt&nbsp;&nbsp; &nbsp;11/2016</p>', '<p>Điện thoại HP Probook 440 G2 l&agrave; d&ograve;ng điện thoại th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ,chiếc điện thoại n&agrave;y c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 9990000, NULL, 'uploads/img-pro-11.png', 0, 1, '2023-07-12 07:15:29', '2023-07-13 18:45:01', 80),
(17, 11, 'DT#05', 'NOKIA 8', '<p>M&agrave;n h&igrave;nh 5.5\", FHD, IPS LCD, 1080 x 1920 Pixel<br />Camera sau&nbsp;&nbsp; &nbsp;12.0 MP + 12.0 MP<br />Camera Selfie&nbsp;&nbsp; &nbsp;7.0 MP<br />RAM &nbsp;&nbsp; &nbsp;3 GB<br />Bộ nhớ trong&nbsp;&nbsp; &nbsp;128 GB<br />Dung lượng pin&nbsp;&nbsp; &nbsp;2900 mAh<br />Hệ điều h&agrave;nh&nbsp;&nbsp; &nbsp;iOS 13<br />Thời gian ra mắt&nbsp;&nbsp; &nbsp;11/2016</p>', '<p>Điện thoại HP Probook 440 G2 l&agrave; d&ograve;ng điện thoại th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ,chiếc điện thoại n&agrave;y c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 12990000, NULL, 'uploads/img-pro-12.png', 0, 1, '2023-07-12 07:16:25', '2023-07-13 18:45:13', 17),
(19, 11, 'DT#07', 'SONY XPERIA X', '<p>M&agrave;n h&igrave;nh 5.5\", FHD, IPS LCD, 1080 x 1920 Pixel<br />Camera sau&nbsp;&nbsp; &nbsp;12.0 MP + 12.0 MP<br />Camera Selfie&nbsp;&nbsp; &nbsp;7.0 MP<br />RAM &nbsp;&nbsp; &nbsp;3 GB<br />Bộ nhớ trong&nbsp;&nbsp; &nbsp;128 GB<br />Dung lượng pin&nbsp;&nbsp; &nbsp;2900 mAh<br />Hệ điều h&agrave;nh&nbsp;&nbsp; &nbsp;iOS 13<br />Thời gian ra mắt&nbsp;&nbsp; &nbsp;11/2016</p>', '<p>Điện thoại HP Probook 440 G2 l&agrave; d&ograve;ng điện thoại th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ,chiếc điện thoại n&agrave;y c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 10900000, NULL, 'uploads/img-pro-14.png', 0, 1, '2023-07-12 07:18:13', '2023-07-13 18:45:45', 23),
(20, 9, 'DT#08', 'SAMSUNG GALAXY A5 2017', '<p>M&agrave;n h&igrave;nh 5.5\", FHD, IPS LCD, 1080 x 1920 Pixel<br />Camera sau&nbsp;&nbsp; &nbsp;12.0 MP + 12.0 MP<br />Camera Selfie&nbsp;&nbsp; &nbsp;7.0 MP<br />RAM &nbsp;&nbsp; &nbsp;3 GB<br />Bộ nhớ trong&nbsp;&nbsp; &nbsp;128 GB<br />Dung lượng pin&nbsp;&nbsp; &nbsp;2900 mAh<br />Hệ điều h&agrave;nh&nbsp;&nbsp; &nbsp;iOS 13<br />Thời gian ra mắt&nbsp;&nbsp; &nbsp;11/2016</p>', '<p>Điện thoại HP Probook 440 G2 l&agrave; d&ograve;ng điện thoại th&iacute;ch hợp cho doanh nghiệp v&agrave; những người l&agrave;m văn ph&ograve;ng. Do đ&oacute;, ngo&agrave;i cấu h&igrave;nh tốt, thiết kế bền bỉ,chiếc điện thoại n&agrave;y c&ograve;n c&oacute; khả năng bảo mật to&agrave;n diện gi&uacute;p bạn lu&ocirc;n y&ecirc;n t&acirc;m về dữ liệu của m&igrave;nh.</p>', 2100000, NULL, 'uploads/img-pro-15.png', 0, 1, '2023-07-12 07:18:50', '2023-07-13 18:45:38', 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Quản lý toàn bộ website', '2023-07-30 21:25:08', '2023-07-30 21:25:08'),
(3, 'Content Manager', 'Quản lý nội dung bài viết', '2023-07-31 00:13:56', '2023-07-31 19:17:34'),
(4, 'Product Manager', 'Quản lý sản phẩm', '2023-07-31 18:57:35', '2023-07-31 19:17:42'),
(5, 'Slider Manager', 'Quản lý Slider', '2023-07-31 18:58:01', '2023-07-31 19:17:50'),
(6, 'Sales Manager', 'Quản lý bán hàng', '2023-07-31 18:58:48', '2023-07-31 19:17:58'),
(7, 'User Manager', 'Quản lý người dùng', '2023-07-31 18:59:35', '2023-07-31 19:18:06'),
(8, 'Role Manager', 'Quản lý vai trò', '2023-07-31 19:00:23', '2023-07-31 19:18:14'),
(9, 'Permission Manager', 'Quản lý quyền', '2023-07-31 19:01:04', '2023-07-31 19:18:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(2, 1, 4, NULL, NULL),
(3, 1, 5, NULL, NULL),
(4, 1, 8, NULL, NULL),
(8, 1, 9, NULL, NULL),
(9, 1, 10, NULL, NULL),
(17, 3, 1, NULL, NULL),
(18, 3, 4, NULL, NULL),
(19, 3, 5, NULL, NULL),
(20, 3, 8, NULL, NULL),
(21, 1, 1, NULL, NULL),
(22, 1, 2, NULL, NULL),
(23, 1, 3, NULL, NULL),
(24, 1, 6, NULL, NULL),
(25, 1, 14, NULL, NULL),
(26, 1, 15, NULL, NULL),
(27, 1, 16, NULL, NULL),
(28, 1, 17, NULL, NULL),
(29, 1, 18, NULL, NULL),
(30, 1, 19, NULL, NULL),
(31, 1, 20, NULL, NULL),
(32, 1, 21, NULL, NULL),
(33, 1, 22, NULL, NULL),
(34, 1, 23, NULL, NULL),
(35, 1, 24, NULL, NULL),
(36, 1, 25, NULL, NULL),
(37, 1, 26, NULL, NULL),
(38, 1, 27, NULL, NULL),
(39, 4, 2, NULL, NULL),
(40, 4, 3, NULL, NULL),
(41, 4, 6, NULL, NULL),
(42, 4, 11, NULL, NULL),
(43, 5, 9, NULL, NULL),
(44, 5, 10, NULL, NULL),
(45, 5, 12, NULL, NULL),
(46, 5, 13, NULL, NULL),
(47, 6, 14, NULL, NULL),
(48, 6, 15, NULL, NULL),
(49, 6, 16, NULL, NULL),
(50, 7, 17, NULL, NULL),
(51, 7, 18, NULL, NULL),
(52, 7, 19, NULL, NULL),
(53, 7, 20, NULL, NULL),
(54, 8, 24, NULL, NULL),
(55, 8, 25, NULL, NULL),
(56, 8, 26, NULL, NULL),
(57, 8, 27, NULL, NULL),
(58, 9, 21, NULL, NULL),
(59, 9, 22, NULL, NULL),
(60, 9, 23, NULL, NULL),
(61, 1, 12, NULL, NULL),
(62, 1, 13, NULL, NULL),
(63, 1, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ordinal_number` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `ordinal_number`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung Addwash', 1, 'uploads/slider-01.png', 1, '2023-07-28 01:30:06', '2023-07-28 21:58:15'),
(2, 'Oppo F5', 3, 'uploads/slider-02.png', 1, '2023-07-28 01:31:04', '2023-08-01 21:03:36'),
(4, 'Trả góp', 2, 'uploads/slider-03.png', 1, '2023-07-28 22:00:52', '2023-08-01 21:03:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `active_token` varchar(255) DEFAULT NULL,
  `pass_token` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `active_token`, `pass_token`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'Nguyễn Văn Nam', 'nguyenvannam041001@gmail.com', '$2y$10$prkP9E4UBA4fFnlRFEgsFuxbZYfzMO3CGH5vw5kfjmxjhtXV2Mdxe', NULL, NULL, '9823b3c6a0fb61847a08f343bdf3370a', NULL, 1, '2023-07-05 20:40:20', '2023-07-05 20:40:40', NULL),
(19, 'Nguyễn Huệ', 'nguyenhue@gmail.com', '$2y$10$kPQVujl0qaCEIWqT0KrC5Oh8yaqckCC1IMKcomH5RXbBSuVK24Ac.', NULL, NULL, NULL, NULL, 1, '2023-07-10 08:01:45', '2023-07-31 19:05:31', NULL),
(20, 'Nguyễn Huy', 'vananh@gmail.com', '$2y$10$mNA9M7cdUhVyOj15jxWPGOzp5YyFFF/by/am4BMaVWQoSKrot1x7W', NULL, NULL, NULL, NULL, 1, '2023-07-31 03:53:00', '2023-07-31 03:53:00', NULL),
(21, 'Nguyễn Hiếu', 'nguyenhieu@gmail.com', '$2y$10$Z7SBj87wnMcmREatJRP.Pu36gk/QalUUoNTa46ksulYoNdvz4UR4W', NULL, NULL, NULL, NULL, 1, '2023-07-31 03:54:15', '2023-08-01 19:25:36', NULL),
(23, 'Ngọc Sơn', 'ngocson@gmail.com', '$2y$10$zXXybSJtyS.GD/b090yU4uEZEgahp3dG7AeyUzJ7tQ2jryxVHP8hW', NULL, NULL, NULL, NULL, 1, '2023-07-31 19:21:37', '2023-07-31 19:21:37', NULL),
(24, 'Nguyễn Nam', 'namnguyen@gmail.com', '$2y$10$2vSjB8mFMSW4jKWKlbRN..qmVCtQGb/hdM1/BQ0n4Cb/oEC7OJq4S', 'Sóc Sơn - Hà Nội', '0961924960', NULL, NULL, 1, '2023-07-31 06:14:20', '2023-07-31 23:33:47', NULL),
(25, 'Diệu Nhi', 'dieunhi@gmail.com', '$2y$10$N/hTZ5w.bf0BEkTnC8Iucuokb0HEMLy3J7unOe9cmevYSQvWFKyhK', 'Long Biên - Hà Nội', '0966999988', NULL, NULL, 1, '2023-07-31 23:36:06', '2023-08-01 00:09:16', NULL),
(26, 'Việt Cường', 'vietcuong@gmail.com', '$2y$10$S8BKfFfUdnTI4PZgLvKR8eG980JZAIiR6EVVOvaYuGBZfJTr0qXXC', 'Bắc Từ Liêm - Hà Nội', '0329350063', NULL, NULL, 1, '2023-07-31 23:37:10', '2023-08-13 01:00:50', NULL),
(27, 'Nguyễn Văn Nam HUmg', 'namdaica0410@gmail.com', '$2y$10$o8s7RefYWpeT9T4ZzR9jSu0ygqvEOj6DdveBHfUOSGJ0JJUOWw.ja', 'Thanh Xuân -Hà Nội', '0988776655', NULL, NULL, 1, '2023-08-03 00:03:27', '2023-08-03 05:51:15', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_role`
--

INSERT INTO `user_role` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 11, NULL, NULL),
(6, 3, 19, NULL, NULL),
(9, 4, 19, NULL, NULL),
(10, 5, 20, NULL, NULL),
(12, 8, 21, NULL, NULL),
(14, 7, 20, NULL, NULL),
(15, 9, 21, NULL, NULL),
(16, 6, 23, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categors`
--
ALTER TABLE `categors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categors_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `cat_posts`
--
ALTER TABLE `cat_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_posts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_account_foreign` (`id_account`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_id_order_foreign` (`id_order`),
  ADD KEY `order_details_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_cat_post_id_foreign` (`cat_post_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categor_id_foreign` (`categor_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_role_id_foreign` (`role_id`),
  ADD KEY `role_permission_permission_id_foreign` (`permission_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_role_id_foreign` (`role_id`),
  ADD KEY `user_role_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categors`
--
ALTER TABLE `categors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `cat_posts`
--
ALTER TABLE `cat_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categors`
--
ALTER TABLE `categors`
  ADD CONSTRAINT `categors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cat_posts`
--
ALTER TABLE `cat_posts`
  ADD CONSTRAINT `cat_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_account_foreign` FOREIGN KEY (`id_account`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_cat_post_id_foreign` FOREIGN KEY (`cat_post_id`) REFERENCES `cat_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categor_id_foreign` FOREIGN KEY (`categor_id`) REFERENCES `categors` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
