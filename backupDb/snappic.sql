-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 15, 2023 lúc 07:52 AM
-- Phiên bản máy phục vụ: 10.3.38-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `snappic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(70) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$h6u0Id09mYANwcwY7Y9dvegCpf7UFHeakGx/yNokYUU3Ad8bt4l8.', 0, '2023-12-01 10:18:13', '2023-06-13 07:36:10', '2023-12-01 10:18:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `albums`
--

INSERT INTO `albums` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, '5', '5', '/upload/images/Mongolian-ger-tourist-camp-DiscoverMongolia-3.jpg', 1, '2023-06-17 00:35:17', '2023-06-17 07:35:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cat_notices`
--

CREATE TABLE `cat_notices` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `parent` tinyint(4) NOT NULL DEFAULT 0,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cat_notices`
--

INSERT INTO `cat_notices` (`id`, `name`, `description`, `slug`, `parent`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Review du lịch', 'Review du lịch', 'review-du-lich', 0, NULL, NULL, NULL, '2023-12-01 02:34:42', '2023-12-01 09:34:42', '/upload/images/collum3.jpg'),
(2, 'Kinh nghiệm đi phượt Hà Giang', NULL, 'kinh-nghiem-di-phuot-ha-giang', 1, NULL, NULL, NULL, '2023-11-29 21:13:02', '2023-11-30 04:13:02', NULL),
(3, 'Kinh nghiệm đi phượt Sa Pa', NULL, 'kinh-nghiem-di-phuot-sa-pa', 1, NULL, NULL, NULL, '2023-11-29 21:12:48', '2023-11-30 04:12:48', NULL),
(4, 'Kinh nghiệm đi phượt Mộc Châu', NULL, 'kinh-nghiem-di-phuot-moc-chau', 1, NULL, NULL, NULL, '2023-11-30 04:14:05', '2023-11-30 04:14:05', NULL),
(5, 'Lịch xe khách', 'Lịch xe khách', 'lich-xe-khach', 0, NULL, NULL, NULL, '2023-12-01 02:34:31', '2023-12-01 09:34:31', '/upload/images/collum2.jpg'),
(6, 'Xe khách tuyến Nam Định - Hà Nội', NULL, 'xe-khach-tuyen-nam-dinh-ha-noi', 5, NULL, NULL, NULL, '2023-11-29 21:15:05', '2023-11-30 04:15:05', NULL),
(7, 'Xe khách tuyến Ninh Bình - Hà Nội', NULL, 'xe-khach-tuyen-ninh-binh-ha-noi', 5, NULL, NULL, NULL, '2023-11-30 04:15:22', '2023-11-30 04:15:22', NULL),
(8, 'Xe khách tuyến Thái Bình - Hà Nội', NULL, 'xe-khach-tuyen-thai-binh-ha-noi', 5, NULL, NULL, NULL, '2023-11-29 21:15:46', '2023-11-30 04:15:46', NULL),
(9, 'Review xe hơi', 'Review xe hơi Review xe hơi Review xe hơi', 'review-xe-hoi', 0, NULL, NULL, NULL, '2023-12-01 02:30:55', '2023-12-01 09:30:55', '/upload/images/collum1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cat_notice_notice`
--

CREATE TABLE `cat_notice_notice` (
  `id` int(11) NOT NULL,
  `cat_notice_id` int(11) NOT NULL,
  `notice_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cat_notice_notice`
--

INSERT INTO `cat_notice_notice` (`id`, `cat_notice_id`, `notice_id`, `created_at`, `updated_at`) VALUES
(10, 1, 1, '2023-06-17 06:43:41', '2023-06-17 06:43:41'),
(11, 9, 7, '2023-11-30 04:55:22', '2023-11-30 04:55:22'),
(12, 5, 7, '2023-11-30 04:55:22', '2023-11-30 04:55:22'),
(13, 7, 7, '2023-11-30 04:55:22', '2023-11-30 04:55:22'),
(14, 8, 7, '2023-11-30 04:55:22', '2023-11-30 04:55:22'),
(15, 6, 7, '2023-11-30 04:55:22', '2023-11-30 04:55:22'),
(16, 1, 7, '2023-11-30 04:55:22', '2023-11-30 04:55:22'),
(17, 4, 7, '2023-11-30 04:55:22', '2023-11-30 04:55:22'),
(18, 2, 7, '2023-11-30 04:55:22', '2023-11-30 04:55:22'),
(19, 3, 7, '2023-11-30 04:55:22', '2023-11-30 04:55:22'),
(56, 1, 8, '2023-12-01 10:18:31', '2023-12-01 10:18:31'),
(57, 4, 8, '2023-12-01 10:18:31', '2023-12-01 10:18:31'),
(58, 2, 8, '2023-12-01 10:18:31', '2023-12-01 10:18:31'),
(59, 3, 8, '2023-12-01 10:18:31', '2023-12-01 10:18:31'),
(60, 5, 8, '2023-12-01 10:18:31', '2023-12-01 10:18:31'),
(61, 7, 8, '2023-12-01 10:18:31', '2023-12-01 10:18:31'),
(62, 8, 8, '2023-12-01 10:18:31', '2023-12-01 10:18:31'),
(63, 6, 8, '2023-12-01 10:18:31', '2023-12-01 10:18:31'),
(64, 9, 8, '2023-12-01 10:18:31', '2023-12-01 10:18:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `configs`
--

CREATE TABLE `configs` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `configs`
--

INSERT INTO `configs` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(48, 'LOGO', '/upload/images/logo-adonisblue.png', NULL, NULL),
(49, 'SLIDE_INDEX', '5', NULL, NULL),
(50, 'SLOGAN_IMAGE_1_INDEX', '/upload/images/KLT-Icon_Tan%20tam%201.png', NULL, NULL),
(51, 'SLOGAN_TITLE_1_INDEX', 'TẬN TÂM', NULL, NULL),
(52, 'SLOGAN_DESCRIPTION_1_INDEX', 'Kim Liên luôn lắng nghe mọi mong muốn của bạn và không ngừng nâng cao trải nghiệm trên mỗi chuyến đi', NULL, NULL),
(53, 'SLOGAN_IMAGE_2_INDEX', '/upload/images/KLT-Icon_Tiet%20kiem%201.png', NULL, NULL),
(54, 'SLOGAN_TITLE_2_INDEX', 'TIẾT KIỆM', NULL, NULL),
(55, 'SLOGAN_DESCRIPTION_2_INDEX', 'Kim Liên Travel luôn đặt lợi ích của khách hàng lên trên hết, luôn cam kết chất lượng đi đầu và giá cạnh tranh nhất thị trường', NULL, NULL),
(56, 'SLOGAN_IMAGE_3_INDEX', '/upload/images/KLT-Icon_Tin%20cay%201.png', NULL, NULL),
(57, 'SLOGAN_TITLE_3_INDEX', 'TIN CẬY', NULL, NULL),
(58, 'SLOGAN_DESCRIPTION_3_INDEX', 'Thương hiệu hơn 20 năm hoạt động trong ngành du lịch và đạt danh hiệu Top 10 hãng lữ hành inbound tốt nhất', NULL, NULL),
(59, 'CAT_PACKAGE_1_INDEX', '1', NULL, NULL),
(60, 'CAT_PACKAGE_2_INDEX', '4', NULL, NULL),
(61, 'CAT_NOTICE_INDEX', '21', NULL, NULL),
(62, 'CAT_PARTNER_INDEX', '6', NULL, NULL),
(63, 'DESCRIPTION_COMPANY_FOOTER', '<span style=\"font-size:14px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Төлөөлөгч: NGUYEN VAN QUYNH<br />\r\nТатварын код/​​Бизнесийн лиценз: 0110287348<br />\r\nОлон улсын аялал жуулчлалын лиценз: 01-2278/2023/TCDL-GP LHQT<br />\r\nТөв оффисын хаяг: 14-15A, 7-р давхар, Charmvit Tower, No.119 Tran Duy Hung гудамж, Cau Giay Дүүрэг, Ха Ной, Вьетнам<br />\r\nУтас: (+84) 868688990<br />\r\nИмэйл: info@adonisblue.vn</span></span>', NULL, NULL),
(64, 'LINK_INTRODUCE_FOOTER', '', NULL, NULL),
(65, 'LINK_POLICY_FOOTER', '/news/chinh-sach-va-quy-dinh', NULL, NULL),
(66, 'LINK_BOOKING_RULE_FOOTER', '/news/quyen-rieng-tu', NULL, NULL),
(67, 'LINK_FACBOOK_FOOTER', 'https://www.facebook.com/adonisblue.vn', NULL, NULL),
(68, 'LINK_GOOGLE_FOOTER', '#', NULL, NULL),
(69, 'LINK_TWITTER_FOOTER', '#', NULL, NULL),
(70, 'LINK_YOUTUBE_FOOTER', '#', NULL, NULL),
(71, 'LINK_FANPAGE_FACEBOOK', 'https://www.facebook.com/tranghong1989', NULL, NULL),
(72, 'TITLE_INTRODUCE', 'ВЬЕТНАМД БҮРЭН АМЬДАРЦГААЯ', NULL, NULL),
(73, 'CONTENT_INTRODUCE', 'Гайхамшигтай байгаль. Онцгой хоол. Соёлын олон талт байдал. Маш сайн үйлчилгээ.<br />\r\n<br />\r\nВьетнам улс Ковид-19 хязгаарлалтгүйгээр олон улсын аялал жуулчлалыг бүрэн нээж, Ковид-19-ийн өмнөх шиг визний бодлого, цагаачлалын журмыг сэргээлээ.<br />\r\n<br />\r\nОдоо та шохойн чулуун уулс, ногоон дэнжтэй будааны талбай, цагаан элсэрхэг наран шарлагын газар зэрэг төрөл бүрийн зэрлэг байгалийн газруудыг олж, таашаал авах боломжтой.<br />\r\n<br />\r\nШинэ үзэмж, дуу чимээ, амтыг аваарай. Үнэхээр мартагдашгүй туршлагыг сайхан өнгөрүүлнэ шүү.<br />\r\nСудалж, амарч, тоглоцгооё. Вьетнамд бүрэн амьдарцгаая.', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `full_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `position` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `full_name`, `position`, `content`, `avatar`, `created_at`, `updated_at`) VALUES
(12, '1', '1', '1', '/upload/images/image-20230511-031811.png', '2023-06-17 08:14:14', '2023-06-17 08:14:14'),
(13, '2', '2', '2', '/upload/images/Mongolian-ger-tourist-camp-DiscoverMongolia-3.jpg', '2023-06-17 01:14:51', '2023-06-17 08:14:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_albums`
--

CREATE TABLE `images_albums` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `album_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images_albums`
--

INSERT INTO `images_albums` (`id`, `image`, `title`, `description`, `album_id`, `created_at`, `updated_at`) VALUES
(34, '/upload/images/bamboo%20airway.png', '', '', 6, NULL, NULL),
(36, '/upload/images/Vietjet%20air%20logo.png', '', '', 6, NULL, NULL),
(37, '/upload/images/Vietnam%20airlines%20logo.png', '', '', 6, NULL, NULL),
(43, '/upload/files/314492081_627165252535688_3642476748117593847_n.jpg', '', '', 6, NULL, NULL),
(44, '/upload/files/Airmarket%20holiday.png', '', '', 6, NULL, NULL),
(45, '/upload/files/TMS%20Hotel.png', '', '', 6, NULL, NULL),
(46, '/upload/files/Radisson.jpeg', '', '', 6, NULL, NULL),
(47, '/upload/files/Daewoo%20hotel.png', '', '', 6, NULL, NULL),
(52, '/upload/images/Mongolian-ger-tourist-camp-DiscoverMongolia-3.jpg', 'Ảnh 1', '/', 5, '2023-12-01 07:53:26', '2023-12-01 07:53:26'),
(53, '/upload/images/home-cover-2-gobi-desert.jpg', 'Ảnh 2', '/', 5, '2023-12-01 07:53:42', '2023-12-01 07:53:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 999,
  `url` text DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `sort`, `url`, `parent`, `created_at`, `updated_at`) VALUES
(71, 'Review du lịch', 3, '/category/review-du-lich', 0, '2023-11-30 04:46:54', '2023-11-30 04:46:54'),
(69, 'Review xe hơi', 1, '/category/review-xe-hoi', 0, '2023-11-30 04:46:25', '2023-11-30 04:46:25'),
(70, 'Lịch xe khách', 2, '/category/lich-xe-khach', 0, '2023-11-30 04:46:42', '2023-11-30 04:46:42'),
(72, 'Xe khách tuyến Ninh Bình - Hà Nội', 1, '/category/xe-khach-tuyen-ninh-binh-ha-noi', 70, '2023-11-30 04:47:14', '2023-11-30 04:47:14'),
(73, 'Xe khách tuyến Thái Bình - Hà Nội', 2, '/category/xe-khach-tuyen-thai-binh-ha-noi', 70, '2023-11-30 04:47:27', '2023-11-30 04:47:27'),
(74, 'Xe khách tuyến Nam Định - Hà Nội', 3, '/category/xe-khach-tuyen-nam-dinh-ha-noi', 70, '2023-11-30 04:47:42', '2023-11-30 04:47:42'),
(75, 'Kinh nghiệm đi phượt Mộc Châu', 1, '/category/kinh-nghiem-di-phuot-moc-chau', 71, '2023-11-30 04:47:58', '2023-11-30 04:47:58'),
(76, 'Kinh nghiệm đi phượt Hà Giang', 2, '/category/kinh-nghiem-di-phuot-ha-giang', 71, '2023-11-30 04:48:10', '2023-11-30 04:48:10'),
(77, 'Kinh nghiệm đi phượt Sa Pa', 3, '/category/kinh-nghiem-di-phuot-sa-pa', 71, '2023-11-30 04:48:19', '2023-11-30 04:48:19'),
(78, 'Hợp tác', 4, '/news/hop-tac-cung-chung-toi', 0, '2023-12-01 07:21:15', '2023-12-01 07:21:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `is_hot` int(11) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(125) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notices`
--

INSERT INTO `notices` (`id`, `title`, `status`, `is_hot`, `slug`, `image`, `author`, `content`, `description`, `views`, `seo_title`, `seo_description`, `seo_keywords`, `tags`, `created_at`, `updated_at`) VALUES
(7, 'Tìm hiểu ngay về  Ranger Raptor thế hệ mới', 1, 1, 'tim-hieu-ngay-ve-ranger-raptor-the-he-moi', '/upload/images/home-cover-2-gobi-desert.jpg', 'Admin', '<p>T&igrave;m hiểu th&ocirc;ng tin về c&aacute;c phi&ecirc;n bản xe tại đ&acirc;y.</p>', 'Tìm hiểu thông tin về các phiên bản xe tại đây', 5, 'Tìm hiểu ngay về  Ranger Raptor thế hệ mới', 'Tìm hiểu thông tin về các phiên bản xe tại đây.', 'Ranger,Raptor', '[review-xe],[ranger]', '2023-11-30 04:55:22', '2023-12-01 10:25:18'),
(8, 'Tìm hiểu ngay về  Ranger Raptor thế hệ mới', 1, 1, 'tim-hieu-ngay-ve-ranger-raptor-the-he-moi', '/upload/images/Mongolian-ger-tourist-camp-DiscoverMongolia-3.jpg', 'Admin', '<p>T&igrave;m hiểu th&ocirc;ng tin về c&aacute;c phi&ecirc;n bản xe tại đ&acirc;y.</p>', 'Tìm hiểu thông tin về các phiên bản xe tại đây', 0, 'Tìm hiểu ngay về  Ranger Raptor thế hệ mới', 'Tìm hiểu thông tin về các phiên bản xe tại đây.', 'Ranger,Raptor', '[review-xe],[ranger]', '2023-11-30 07:32:51', '2023-12-01 10:18:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notice_statics`
--

CREATE TABLE `notice_statics` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notice_statics`
--

INSERT INTO `notice_statics` (`id`, `title`, `slug`, `image`, `content`, `description`, `views`, `seo_title`, `seo_description`, `seo_keywords`, `created_at`, `updated_at`) VALUES
(12, 'Ghi chú và cách tính giá tour', 'ghi-chu-va-cach-tinh-gia-tour', '', '', '', 5, NULL, NULL, NULL, '2022-10-10 07:49:33', '2022-10-10 00:49:33'),
(14, 'Nhật ký tour', 'nhat-ky-tour', '', '', '', 0, NULL, NULL, NULL, '2022-12-15 07:47:35', '2022-12-15 00:47:35'),
(15, 'Cơ hội nghề nghiệp', 'co-hoi-nghe-nghiep', '', '', '', 1, NULL, NULL, NULL, '2022-12-15 07:47:48', '2022-12-15 00:47:48'),
(16, 'Hợp tác cùng chúng tôi', 'hop-tac-cung-chung-toi', '', '', '', 4, NULL, NULL, NULL, '2022-12-15 07:48:20', '2022-12-15 00:48:20'),
(17, 'Điều khoản sử dụng', 'dieu-khoan-su-dung', '', '', '', 6, NULL, NULL, NULL, '2022-12-15 07:48:35', '2022-12-15 00:48:35'),
(18, 'Quyền riêng tư', 'quyen-rieng-tu', '', '<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">АЯЛАЛ ЗАХИАЛАХ ДҮРЭМ</span></span><br />\r\n<br />\r\n<br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">I. Аялалд бүртгүүлэх</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">1. Үйлчлүүлэгчид аялалын хөтөлбөрт шууд онлайн дэмжлэг, шууд утас, утсаар бүртгүүлэх, оффис дээр эсвэл цахим шуудангаар бүртгүүлэх, факсыг компанийн төв оффис руу шууд илгээх ADONIS BLUE Аялал жуулчлалын оффис, компанийн салбарууд.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">2. Аялал жуулчлалын бүртгэлийг дунджаар 10 хоногийн өмнө (бүлгийн зочид) болон 5-1 хоногийн хооронд (хувь хүний ​​зочдыг хослуулан) хийх шаардлагатай. Ялангуяа онгоцоор зорчиж буй аялалын хувьд үйлчлүүлэгчид онгоцны тийзээ хадгалахын тулд эрт бүртгүүлэх ёстой. Олон улсын нислэгийн хуваарьтай аялалууд нь виз мэдүүлэх шаардлагатай тул явах цаг нь виз мэдүүлэхэд хангалттай эсэхийг тодорхойлохын тулд харилцагчийн үйлчилгээтэй холбоотой мэдээллийг шалгана уу.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">3. Ялангуяа амралт, шинэ жил, оргил үе буюу зуны саруудад үйлчлүүлэгчид аялах гэж байгаа цагаасаа эрт бүртгүүлэх шаардлагатай бөгөөд ингэснээр аялалын бэлтгэл бүрэн хангагдана.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">4. ADONIS BLUE нь үйлчлүүлэгчийн бүртгэлийн хөтөлбөрийг гэрээ, цахим шуудан, факсаар тусгай хөтөлбөрт хавсаргасан бичгээр баталгаажуулж, хэрэглэгчийн хэрэгцээнд нийцүүлэн техникийн дэлгэрэнгүй мэдээллийг зааж өгч, ямар шаардлагыг биелүүлэх боломжгүйг тодорхой зааж өгнө. Аялал жуулчлалын тасалбар/үйлчилгээний эрхийн бичгийг (хувь хүн) хүлээн авсан эсвэл эцсийн зохион байгуулалтын хөтөлбөртэй (бүлгийн зочид) гэрээ байгуулах хүсэлт гаргасан үйлчлүүлэгчид хоёр талын тохиролцоонд хүрсэн үүрэг гэж үзнэ.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">5. Жуулчны мэдээллийн бүх зөвлөгөө үнэ төлбөргүй.</span></span><br />\r\n<br />\r\n<br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">II. Аялал жуулчлалын хөтөлбөрийн үнэ</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">1. Аялал жуулчлалын хөтөлбөрийн үнийг VND болон ам.доллараар (гадаадын зочид) тооцно.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">2. Аялал жуулчлалын үнийг хөтөлбөр бүрийн үнийн жагсаалтад тодорхой заасан бөгөөд тодорхой хугацаанд хүчинтэй байна.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">3. Аялал жуулчлалын хөтөлбөрт гарах өдрийн өмнөхөн болон аяллын үеэр зочны хүсэлтээр гарсан өөрчлөлтийг захиалагч болон ажилтнуудын хооронд байгуулсан гэрээ, хэлэлцээрийн үндсэн дээр хүлээн авч, үнийг дахин зарлаж болно.худалдах аялал.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">4. Аялал жуулчлалын үнэд багтсан болон хасагдсан зүйлсийг хөтөлбөрийн хуудас (бие даасан зочид) болон гэрээ (бүлэг) дээр үйлчлүүлэгчдэд тодорхой мэдээлнэ.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">5. Аялал жуулчлалын үнэ амралт, тэтийн хэмнэлээр 10% - 20% хүртэл нэмэгдэнэ. Эдгээр оргил үед үнийг шинэ, үнэн зөв, хамгийн хурдан хугацаанд хэрэглэгчдэд хүргэх болно.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">III. Хүүхдийн гишүүнчлэлийн дүрэм</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">1. Аялалд оролцох 12-оос доош насны хүүхдүүд явахдаа насанд хүрсэн хүн дагалдуулна.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">2. Хүүхдэд зориулсан үнэ нь тухайн аялалын хөтөлбөрөөс хамаарна. Гэхдээ ихэвчлэн:</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; 2 хүртэлх насны хүүхэд: үнэ төлбөргүй</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; 2-6 насны хүүхэд: Үйлчилгээний үнийн дүнгийн 10% -30%</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; 6-12 насны хүүхдүүд: Насанд хүрэгчдийн тарифын 50-70% (насанд хүрэгчидтэй унтах, тусдаа хоол)</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; 12-оос дээш насны хүүхдүүд: Төлбөр нь насанд хүрэгчдийнхтэй адил.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">3. Вэбсайт дээр тодорхой үнэ тогтоогдоогүй аялалын талаар Kim Lien Travel компанийн харилцагчийн үйлчилгээний хэлтсээс лавлана уу.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">4. Хүүхэдтэй үйлчлүүлэгч та төөрөхгүйн тулд ууланд авирах, усанд сэлэх, дарвуулт завиар зугаалахдаа анхаарал болгоомжтой байх, тоглохдоо дагаж мөрдөхийг анхаарна уу.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">IV. Цуцлах бодлого, цуцлалтын хураамж, аялал</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">A. ADONIS BLUE компанийн улмаас аялал цуцлагдсан тохиолдолд</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Хэрэв ADONIS BLUE Аялал жуулчлалын компани аялалаа хийж чадаагүй бол Ким Лиен Аялал жуулчлалын компани нь үйлчлүүлэгчид нэн даруй мэдэгдэж, төлбөрөө цуцалсан тухай мэдэгдснээс хойш 3 хоногийн дотор төлбөрөө төлсөн үйлчлүүлэгчид мөнгөө бэлнээр эсвэл шилжүүлгээр буцаан олгоно.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; ADONIS BLUE аялал жуулчлалын компани нь тус группт захиалсан зочид буудлын үйлчилгээний барьцаа, ресторан, тээврийн хэрэгсэл, завь... зэрэг үйлчилгээний бүх зардлыг хариуцна.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">B. Үйлчлүүлэгчийн улмаас аялал цуцлагдсан тохиолдолд</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Явах өдрөөс өмнө үйлчлүүлэгчийн төлөөлөгчдийн нэг гишүүн ямар нэг шалтгаанаар аялалд оролцох боломжгүй бол үйлчлүүлэгч ADONIS BLUE аялалын компанид нэн даруй мэдэгдэж, цуцлалтын зардлыг дараахь байдлаар хариуцна.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; 7 хоногийн өмнө цуцлах: Аяллын хөтөлбөрийн нийт үнийн дүнгийн 30% -50%</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; 2-6 хоног хүртэл цуцлах: Аяллын хөтөлбөрийн нийт үнийн дүнгийн 70%.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; 24 цагийн дотор цуцлах: Аяллын хөтөлбөрийн нийт үнийн дүнгийн 100%.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Аялал цуцлагдсан тухай мэдэгдлийг Ким Лиен Аялал компанид цахим шуудан эсвэл факсаар шууд мэдэгдэх ёстой бөгөөд Ким Лиен Аялал компани баталгаажуулсан байх ёстой. Утсаар цуцлагдсан тохиолдолд мессежийг хүлээн авахгүй.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">C. Аялал жуулчлалын хөтөлбөрөөс дундуур нь завсардсан үйлчлүүлэгчид төлбөрийг буцаан олгохгүй.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">D. Давагдашгүй хүчин зүйлийн үед (террорист, байгалийн гамшиг, тахал, гал түймэр, үндэсний бодлогын улмаас, цуцлах хугацааг хойшлуулсан, тээврийн үйлчилгээ үзүүлэгчийн улмаас аяллыг өөрчлөх ...) Ким Лиен Трэйвэл буцаан олголтыг хариуцахгүй. Харин дээрх хэргүүдийн зардлын талаар хоёр тал тодорхой тохиролцоонд хүрнэ.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">V. Хувийн баримт бичиг</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">1. Хүмүүсийн иргэний үнэмлэх.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">2. Паспорт (гадаадад байгаа вьетнам эсвэл гадаадын зочид).</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">3. Хүүхдийн төрсний гэрчилгээ (эсвэл асран хамгаалагчийн гэрчилгээ)</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">4. Паспорт ашиглан програмын хамт хоёр зураг (3&times;4).</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Учир нь. Ачаа тээш</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">1. Хөнгөн, авсаархан ачаа тээш.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">2. Аялал жуулчлалын үеэр үйлчлүүлэгчид хувийн эд зүйл, ачаа тээшээ өөрөө хадгалдаг.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">3. Ким Лиен аялал жуулчлалын компани нь зочдын ачаа тээш, хувийн эд зүйл алдагдсан, гэмтсэн тохиолдолд хариуцлага хүлээхгүй.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">VII. Аяллын үеэр тусгай хүсэлт</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">1. Бүртгүүлэхдээ таны тусгай хүсэлтийг Kim Lien Travel-д урьдчилан мэдэгдэх ёстой бөгөөд компани нь өөрийн чадавхийн хүрээнд шаардлагыг биелүүлэхийг хичээх боловч тээвэрлэгч, зочид буудал, ресторан зэрэг үйлчилгээ үзүүлэхээс татгалзсан тохиолдолд хариуцлага хүлээхгүй. болон бусад бие даасан үйлчилгээ үзүүлэгчид.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">2. Үйлчлүүлэгчид хөтөлбөрөөс гадуур аялал, маршрут, үзвэр үйлчилгээний бүх зардал, тусгай хүсэлтийг төлөх ёстой.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">VIII. Аяллын дараа үйлчилгээний санал хүсэлт</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">1. Аялалаас буцаж ирснийхээ дараа үйлчлүүлэгчид үзүүлж буй үйлчилгээтэй холбоотой мэдээлэлд хариу өгөхийг хүсвэл аялал дууссанаас хойш 30 хоногийн дотор Kim Lien Travel компанид хариу илгээнэ үү. Kim Lien Travel компанид цаг тухайд нь үзэхэд тусална уу.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">2. Шуурхай санал хүсэлтийг авахын тулд Ким Лиен Аялал компаниас үйлчлүүлэгчдэдээ илгээдэг үйлчилгээний чанарын үнэлгээний маягтыг бөглөж, аялал дуусахаас өмнө &quot;Аялалын хөтөч&quot; рүү шилжүүлж, Ким Лиен Аялал компани руу буцаан илгээнэ үү.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">IX. Хариуцлагын тухай журам</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">1. Компанийн талд:</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Аялал жуулчлалын хөтөлбөрт үйлчлүүлэгчдэд үзүүлэх бүх үйлчилгээг, үүнд зочдын тусгай хүсэлтийг (хэрэв байгаа бол) бэлтгэх.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Борлуулахаар санал болгож буй аялалын хөтөлбөрийг дагаж мөрдөнө.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">2. Хэрэглэгчийн талд:</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Шаардлагатай бол мөнгөө цаг тухайд нь төлөх, шилжүүлэх</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Аялал жуулчлалын үеэр зочдод дур зоргоороо бүлгийг салгах биш, хөтөлбөрийг дагаж мөрдөх ёстой. Өөрчлөлт хийх хүсэлт байвал төлөөлөгчдийн ахлагч болон ADONIS BLUE компанийн хөтөчид мэдэгдэх ёстой. Бүлгийн ахлагчийн зөвшилцөл, баталгаатай үед л шинэ хөтөч хийгдэнэ.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">3. ADONIS BLUE Аялал жуулчлалын компани нь үйлчлүүлэгчдийн тав тух, аюулгүй байдлыг хангах үүднээс Ким Лиен Аялал жуулчлалын компани шаардлагатай гэж үзсэн хэдийд ч маршрутаа өөрчлөх, аяллыг цуцлах эрхтэй.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">4. Гэрээг гүйцэтгэх явцад маргаан гарвал хоёр тал харилцан тохиролцсоны үндсэн дээр бүгдийг шийдвэрлэнэ. Хэлэлцээр үр дүнд хүрэхгүй бол одоогийн хуулийн дагуу бүх зүйлийг эдийн засгийн шүүхэд өгнө. Холбогдох бүх зардлыг ялагдсан тал хариуцна.</span></span><br />\r\n&nbsp;', '', 8, '', '', '', '2022-12-15 07:48:48', '2023-06-08 09:27:20'),
(19, 'chinh-sach-va-quy-dinh', 'chinh-sach-va-quy-dinh', '', '<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">1/ Төлбөр ба гүйлгээний аюулгүй байдал</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Таны бүх гүйлгээ ONEPAY системийн SSL-ээр хамгаалагдах болно.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; ADONIS BLUE нь ONEPAY төлбөрийн гарц, Visa/Mastercard/JCB... болон дотоодын банкны АТМ-уудаар дамжуулан таны картын бүх мэдээллийг найдвартай хамгаална.</span></span><br />\r\n<br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">2/ Нууцлалын бодлого</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">2.1 Бид ямар мэдээлэл цуглуулж болох вэ?</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Таны нэр, хүйс, төрсөн огноо, хаяг, имэйл, утасны дугаар, сонирхол гэх мэт ...</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">2.2 Бид цуглуулсан мэдээллээр юу хийдэг вэ?</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">Ялангуяа дараах шалтгааны улмаас таны хэрэгцээг ойлгож, танд илүү сайн үйлчилгээ үзүүлэхийн тулд бид энэ мэдээллийг шаардаж байна.</span></span><br />\r\n<br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Аялал, үйлчилгээний бүртгэл, захиалгаа дуусгах.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Бүтээгдэхүүн, үйлчилгээгээ сайжруулах.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Боломжтой бол урамшууллын оноо, улирлын урамшуулал эсвэл тусгай урамшуулал илгээх. Та бүртгүүлэх эсвэл хүсэлт гаргахдаа цахим харилцаа холбоог зөвшөөрсөнд тооцогдоно. Хэрэв та биднээс цаашид сурталчилгааны имэйл хүлээн авахыг хүсэхгүй байгаа бол манай вэб сайт дээр өөрийн сонголтоо өөрчилж, манай &quot;бүртгэлээс хасах&quot; хэрэгслийг ашиглах эсвэл бидэнтэй холбогдож болно.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Хуульд заасан тохиолдолд бид таны хувийн мэдээллийг зөвхөн эрх бүхий байгууллага эсвэл мөрдөн байцаах байгууллагуудтай хуваалцах, задруулах үүрэгтэй; эсвэл таны болон бусад үйлчлүүлэгчдийн эрхийг хамгаалахын тулд гэмт хэргээс урьдчилан сэргийлэх, илрүүлэх, хуулийн хариуцлага хүлээлгэх шаардлагатай.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Онлайн бүртгэлд <em><span style=\"color:#0070c0\">adonisblue.vn</span></em> сайтыг сонгосонд тань бид талархаж байна. Тиймээс бид таны хувийн мэдээллийн нууцлал, аюулгүй байдлыг дээд зэргээр хариуцаж, хамгаалах болно.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">3/ Хувийн мэдээллийн нууцлалын бодлого</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Хэрэв та бичгээр зөвшөөрөл аваагүй эсвэл хуульд заагаагүй бол бид таны хувийн мэдээллийг бусад гуравдагч этгээдэд худалдах, тараахгүй, түрээслэхгүй байх үүрэгтэй.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Хэрэв та бидний эзэмшиж буй таны талаарх мэдээллийг зарим талаар буруу эсвэл бүрэн бус гэж үзэж байгаа бол бидэнд бичгээр мэдэгдэх эсвэл ADONIS BLUE-ийн төв оффисын хаягаар аль болох хурдан имэйл илгээнэ үү. Буруу мэдээлэл байвал бид нэн даруй засварлах болно</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">4/ Мэдээллийн аюулгүй байдлыг хангах үүрэг хариуцлага</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Бид таны мэдээллийг нууцлах болно гэдгийг амлаж байна. Таны бидэнд өгсөн хувийн мэдээллийг хамгаалахын тулд бид зохих удирдлагын систем, журмыг хэрэгжүүлж, ашигласан.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Цаашилбал, бид хувийн мэдээлэлд нэвтрэх, ашиглахад аюулгүй байдлын журам, физик болон техникийн хязгаарлалтыг хэрэгжүүлж, ашигласан. Зөвхөн эрх бүхий ажилтнууд манай үйлчилгээтэй холбоотой үүргээ биелүүлэхийн тулд хувийн мэдээлэлд хандах эрхтэй.</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">5/ Холбоос</span></span><br />\r\n<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">&bull; Манай вэбсайтууд эсвэл имэйлүүд нь бусад вэбсайтуудын холбоосыг агуулж болно (ялангуяа аялал жуулчлалын мэдээллийн сайтууд). Эдгээр холбоосууд дээр дарахад та өөр вэбсайт руу зочилсон байна. Тиймээс бид бусад вэбсайтад зочлох үед таны өгсөн аливаа мэдээллийн нууцлалын хамгаалалтыг хариуцахгүй бөгөөд эдгээр вэбсайтууд нь Нууцлалын бодлогод захирагддаггүй. Энэ дөрөв дэх. Нууцлалын бодлого нь манайхаас ялгаатай байж болзошгүй тул та тэдний Нууцлалын бодлогыг анхааралтай уншиж, хянан үзэх хэрэгтэй.</span></span>', '<span style=\"font-size:12pt\"><span style=\"font-family:Calibri,sans-serif\">ADONIS BLUE аялал жуулчлалын вэбсайтын мэдээллийн нууцлалын бодлого</span></span>', 12, 'chinh-sach-va-quy-dinh', 'Chính sách và quy định', 'adonisblue', '2022-12-15 07:49:00', '2023-06-08 09:16:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price_type` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(125) NOT NULL,
  `status` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `rate_point` int(11) NOT NULL DEFAULT 0,
  `rate_comment` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `package_attributes`
--

CREATE TABLE `package_attributes` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `detail_json` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `package_categories`
--

CREATE TABLE `package_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `image` varchar(125) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `package_category_tags`
--

CREATE TABLE `package_category_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `package_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `package_images`
--

CREATE TABLE `package_images` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `url` varchar(125) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `package_orders`
--

CREATE TABLE `package_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `people_number` int(11) NOT NULL,
  `price_type` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `data_request_json` varchar(255) NOT NULL,
  `order_datetime` datetime NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_send_mail` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `package_rates`
--

CREATE TABLE `package_rates` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `website` varchar(70) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `domain` varchar(70) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  `hotline` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `website`, `company`, `domain`, `address`, `email`, `phone`, `seo_title`, `seo_description`, `seo_keywords`, `hotline`, `created_at`, `updated_at`) VALUES
(2, '1', '5', '3', '7', '2', '4', '9', '10', '8', '6', '2023-06-16 08:21:01', '2023-06-17 02:37:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subscribes`
--

CREATE TABLE `subscribes` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'josvuduong@gmail.com', NULL, '2022-12-16 09:59:25', '2022-12-16 02:59:25'),
(2, 'tmrs-cls@site.com', '0365634341', '2023-05-01 09:31:49', '2023-05-01 02:31:49'),
(3, 'josvuduong@gmail.com', '0465645451', '2023-05-05 04:53:29', '2023-05-04 21:53:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tranfer_money_histories`
--

CREATE TABLE `tranfer_money_histories` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `money_before` int(11) NOT NULL,
  `money_after` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(125) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 0,
  `user_status` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `time_open` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `avatar` varchar(125) NOT NULL,
  `rate_point` float NOT NULL,
  `rate_comment` int(11) NOT NULL DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_number` varchar(25) DEFAULT NULL,
  `bank_account` varchar(25) DEFAULT NULL,
  `money` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `status` (`status`);

--
-- Chỉ mục cho bảng `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`),
  ADD KEY `status` (`status`);

--
-- Chỉ mục cho bảng `cat_notices`
--
ALTER TABLE `cat_notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `parent` (`parent`);

--
-- Chỉ mục cho bảng `cat_notice_notice`
--
ALTER TABLE `cat_notice_notice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_notice_id` (`cat_notice_id`,`notice_id`);

--
-- Chỉ mục cho bảng `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images_albums`
--
ALTER TABLE `images_albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `parent` (`parent`),
  ADD KEY `sort` (`sort`);

--
-- Chỉ mục cho bảng `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `status` (`status`);

--
-- Chỉ mục cho bảng `notice_statics`
--
ALTER TABLE `notice_statics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `slug` (`slug`(191));

--
-- Chỉ mục cho bảng `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `package_attributes`
--
ALTER TABLE `package_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `package_categories`
--
ALTER TABLE `package_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `package_category_tags`
--
ALTER TABLE `package_category_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `package_images`
--
ALTER TABLE `package_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `package_orders`
--
ALTER TABLE `package_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `package_rates`
--
ALTER TABLE `package_rates`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tranfer_money_histories`
--
ALTER TABLE `tranfer_money_histories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `cat_notices`
--
ALTER TABLE `cat_notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `cat_notice_notice`
--
ALTER TABLE `cat_notice_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `images_albums`
--
ALTER TABLE `images_albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `notice_statics`
--
ALTER TABLE `notice_statics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `package_attributes`
--
ALTER TABLE `package_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `package_categories`
--
ALTER TABLE `package_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `package_category_tags`
--
ALTER TABLE `package_category_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `package_images`
--
ALTER TABLE `package_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `package_orders`
--
ALTER TABLE `package_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `package_rates`
--
ALTER TABLE `package_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tranfer_money_histories`
--
ALTER TABLE `tranfer_money_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
