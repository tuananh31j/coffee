-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 04, 2023 lúc 05:21 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `da1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `page` tinyint(1) DEFAULT NULL COMMENT '1home\r\n2shop\r\n3product\r\n4contact\r\n5aboutUs',
  `product_id` int(10) DEFAULT NULL,
  `banner_url` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '0 đã xóa\r\n1 active',
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`banner_id`, `name`, `page`, `product_id`, `banner_url`, `status`, `create_at`, `update_at`) VALUES
(1, 'bn sản phẩm cà phê h', 1, 160, 'hatRe_bn.jpg', 1, '2023-08-26 13:21:35', '2023-09-02'),
(2, 'shop', 2, 138, 'aboutUsPaga.jpg', 1, '2023-08-26 16:31:15', '2023-09-01'),
(3, 'bn trang sản phẩm', 3, 144, 'bn.jpg', 1, '2023-08-26 16:31:15', '2023-09-01'),
(4, 'lien he', 4, 146, 'contactPage.jpg', 1, '2023-08-26 16:31:15', '2023-09-01'),
(5, 'fdf', 5, 134, 'bannerpro.jpg', 1, '2023-08-26 16:50:46', '2023-08-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1' COMMENT '0 không hoạt động\r\n1 đang hoạt động',
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `name`, `status`, `create_at`, `update_at`) VALUES
(14, 'Trà', b'1', '2023-07-30 01:07:20', NULL),
(15, 'Cà phê', b'1', '2023-07-30 01:07:28', NULL),
(16, 'Cacao', b'1', '2023-07-30 01:07:41', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `cmt_id` int(10) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `product_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`cmt_id`, `content`, `create_at`, `product_id`, `customer_id`, `update_at`) VALUES
(3, 'có ngon không v?', '2023-07-31 12:27:19', 135, 2, NULL),
(4, 'không ngon đâu', '2023-07-31 12:45:26', 133, 1, NULL),
(6, 'hahah', '2023-08-04 12:23:15', 137, 1, NULL),
(7, 'hahahaha', '2023-08-04 12:23:20', 137, 1, NULL),
(8, 'uhm', '2023-08-04 12:23:24', 137, 1, NULL),
(9, 'ngon', '2023-08-04 12:23:29', 137, 1, NULL),
(10, 'ng', '2023-08-04 12:23:45', 137, 1, NULL),
(11, 'bần', '2023-08-04 12:23:50', 137, 1, NULL),
(12, 'hôi', '2023-08-04 12:23:54', 137, 1, NULL),
(13, 'có ngon không v?', '2023-08-04 12:24:03', 137, 1, NULL),
(14, 'v', '2023-08-04 12:24:09', 137, 1, NULL),
(16, '!!!!!!!!!!', '2023-08-04 12:24:16', 137, 1, NULL),
(17, 'có ngon không v?', '2023-08-04 12:24:22', 137, 1, NULL),
(18, 'có ngon không v?', '2023-08-07 14:50:55', 141, 1, NULL),
(19, 'ok', '2023-09-01 20:30:50', 137, 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0 là chưa xử lý\r\n1 là đã xử lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `phone`, `content`, `create_at`, `update_at`, `status`) VALUES
(2, 'lơi', 'loi@gmail.com', '909090', 'tôi muốn xem trạng thái đơn hàng của mình', '2023-07-19 00:00:00', '2023-07-27', 1),
(6, 'sfasd', '8765432', 'nhom7@gmail', 'èdgcv', '2023-07-29 02:34:06', NULL, 0),
(7, 'sfasd', '8765432', 'nhom7@gmail', 'èdgcv', '2023-07-29 02:35:57', NULL, 0),
(8, 'trà đào', '87654', 'nhom7@gmail', 'dfbd', '2023-07-29 02:36:10', NULL, 0),
(9, 'trà đào', '87654', 'nhom7@gmail', 'dfbd', '2023-07-29 02:40:21', NULL, 0),
(10, 'trà đào', '87654', 'nhom7@gmail', 'dfbd', '2023-07-29 02:41:53', NULL, 0),
(11, 'trà đào', '87654', 'nhom7@gmail', 'dfbd', '2023-07-29 02:43:04', NULL, 0),
(12, 'trà đào', '87654', 'nhom7@gmail', 'dfbd', '2023-07-29 02:43:28', '2023-08-25', 1),
(13, 'sfasd', '8765432', 'nhom7@gmail', 'fgf', '2023-07-29 02:43:32', '2023-08-01', 1),
(14, 'sfasd', '8765432', 'nhom7@gmail', 'dfbd', '2023-07-29 10:50:07', NULL, 0),
(15, 'sfasd', '8765432', 'nhom7@gmail', 'dfbd', '2023-07-29 10:50:57', NULL, 0),
(16, 'sfasd', '8765432', 'nhom7@gmail', 'dfbd', '2023-07-29 10:51:16', NULL, 0),
(17, 'sfasd', '8765432', 'nhom7@gmail', 'dfbd', '2023-07-29 10:51:52', '2023-08-01', 1),
(18, 'sfasd', '8765432', 'nhom7@gmail', 'dfbd', '2023-07-29 10:52:54', '2023-08-03', 1),
(19, 'sfasd', '8765432', 'nhom7@gmail', 'Cách đăng ký?', '2023-07-29 10:52:58', '2023-09-01', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `status` bit(1) DEFAULT b'1' COMMENT '0 là off\r\n1 là on',
  `address` varchar(50) DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` date DEFAULT NULL,
  `image_url` varchar(50) DEFAULT NULL,
  `role` tinyint(1) DEFAULT 0 COMMENT '0 là khách hàng\r\n1 là admin',
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `phone`, `email`, `status`, `address`, `create_at`, `update_at`, `image_url`, `role`, `pass`) VALUES
(1, 'Nhóm7', '0000000777', 'nhom7@gmail.com', b'1', 'Sài gòn', '2023-07-05 00:00:00', '2023-08-04', 'mm.png', 1, 'nhom7'),
(2, 'Nguyễn Tuấn Anh', '1099999922', 'tuananh@gmail.com', b'1', '', '0000-00-00 00:00:00', '2023-09-02', 'user.jpg', 0, '11111'),
(3, 'huan', '1212323123', 'test@gmail.com', b'0', 'hà nội', '2023-07-25 00:00:00', '2023-07-25', '/forest-nature-scenery-4k-wallpaper-uhdpaper.com-5', 1, '11111'),
(4, '', '', '', b'0', '', '2023-07-25 00:00:00', '2023-07-25', '/', 1, ''),
(5, 'sdfasdf', 'ádfasdf', 'sadf', b'0', 'fasdf', '2023-07-25 00:00:00', '2023-07-25', 'tinywow_change_bg_photo_28399585.png', 1, 'fasdfasdf'),
(7, '', '', 'fgegf', b'0', '', '2023-07-25 00:00:00', '2023-07-25', '', 1, ''),
(8, 'tuan', '999999999', 'Tun@gmail.com', b'1', NULL, '2023-07-25 00:00:00', '2023-07-25', 'z4470170365776_255e5c3c2c59edb8ad9b9ecd79e50d48.jp', 0, '11111'),
(9, 'lai', '99999', 'tt@gmail.com', b'1', NULL, '2023-07-25 00:00:00', '2023-07-25', 'z4470170455228_552015f7c679464287bf165bfe0386e5.jp', 0, '11111'),
(11, 'dfasdf', '21212121', 't@gmail.com', b'1', NULL, '2023-07-25 00:00:00', '2023-07-25', 'Web capture_16-7-2023_23231_settings.jpeg', 0, '11111'),
(12, 'fdfw', '2523423', 'gsg@gmail.com', b'1', NULL, '2023-07-25 00:00:00', '2023-07-25', 'default.png', 0, '666666'),
(13, '6rwedf', '66666', 'h@gmail.com', b'1', NULL, '2023-07-25 00:00:00', '2023-07-25', 'default.png', 0, '55555'),
(16, 'dfsd', '222', 'ss2@gmail.com', b'1', NULL, '2023-07-25 00:00:00', '2023-07-25', 'default.png', 0, '111'),
(17, 'nguyen nguyen', '090090', 'tuananh31j@gmail.com', b'1', NULL, '2023-07-29 19:30:57', NULL, 'anhcuaban.png', 1, 'mak'),
(19, 'sfasd', '8765432', 'nhomdfd7@gmail.com', b'1', NULL, '2023-07-29 19:33:43', NULL, 'anhcuaban.png', 1, 'dfdfd'),
(21, 'sfasd', '8765432', 'nhom7sfdbsdfg@gmail.', b'1', NULL, '2023-07-29 20:32:35', NULL, 'anhcuaban.png', 1, 'dfgdfg'),
(23, 'con mèo', '3454', 'conmeo@gmail.com', b'1', NULL, '2023-08-05 09:30:40', '2023-09-02', 'cat.jpg', 0, '1122'),
(24, 'naruto', '0123232', 'naruto@gmail.com', b'1', NULL, '2023-09-02 15:00:51', '2023-09-02', 'default.png', 1, '1122'),
(25, 'Nguyễn Anh', '0987654', 'tuanansh@gmail.com', b'1', NULL, '2023-09-02 23:27:12', '2023-09-02', 'anhcuaban.png', 0, '11111');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) NOT NULL,
  `star` int(1) DEFAULT NULL COMMENT '<=5',
  `content` text DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` date DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `star`, `content`, `create_at`, `update_at`, `product_id`, `customer_id`) VALUES
(8, 3, '', '2023-07-30 18:22:06', NULL, 135, 1),
(10, 3, 'Ngon!!!!!!!!', '2023-07-30 18:42:01', NULL, 143, 1),
(11, 5, 'Cũng ngon!', '2023-07-31 11:03:26', NULL, 143, 2),
(12, 2, 'Không hợp khẩu vị', '2023-07-31 11:03:26', NULL, 143, 3),
(13, 3, 'bình thường', '2023-07-31 11:42:39', NULL, 133, 2),
(14, 5, NULL, '2023-07-31 11:44:10', NULL, 133, 1),
(15, 4, 'Not bad!?', '2023-08-26 00:11:55', NULL, 145, 2),
(16, 2, 'Như shit!!!!!!!!!!!!!!!!!!!!', '2023-08-26 00:12:23', NULL, 140, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `address_id` int(10) DEFAULT NULL COMMENT 'địa chỉ của cửa hàng',
  `customer_id` int(10) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0 đang chờ admin xác nhận\r\n1 xã xác nhận\r\n2 đang giao hàng\r\n3 giao hàng thành công',
  `phone` varchar(11) DEFAULT NULL,
  `customer_name` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `address_id`, `customer_id`, `status`, `phone`, `customer_name`, `email`, `address`, `note`, `update_at`, `create_at`) VALUES
(97, 2, 1, 3, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-05', '2023-06-30 16:57:42'),
(98, 3, 1, 4, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-05', '2023-06-20 16:57:55'),
(99, 3, 1, 4, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-05', '2023-06-28 16:58:16'),
(100, 2, 1, 3, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-05', '2023-05-24 16:58:34'),
(101, 3, 1, 3, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-05', '2023-06-27 17:00:11'),
(102, 1, 1, 4, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-05', '2023-06-25 17:00:26'),
(103, 3, 1, 3, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-05', '2023-03-20 18:56:33'),
(104, 2, 1, 4, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-05', '2023-03-27 18:56:56'),
(105, 2, 1, 3, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-05', '2023-04-18 18:57:12'),
(106, 3, 1, 4, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-05', '2023-05-15 18:58:27'),
(107, 1, 1, 3, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-05', '2023-08-05 20:09:00'),
(108, 3, 1, 4, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-05', '2023-08-05 20:09:30'),
(109, 2, 1, 3, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-05', '2023-08-05 20:09:44'),
(110, 2, 1, 3, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-24', '2023-08-07 15:30:13'),
(111, 1, 1, 2, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', '2023-08-24', '2023-08-24 21:18:25'),
(112, 2, 2, 4, '1099999922', 'Nguyễn Tuấn Anh', 'tuananh@gmail.com', 'Nam Định', '', '2023-08-24', '2023-08-24 23:12:18'),
(113, 1, 2, 0, '1099999922', 'Nguyễn Tuấn Anh', 'tuananh@gmail.com', 'Tô cô', '', NULL, '2023-08-24 23:37:35'),
(114, 1, 1, 0, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', NULL, '2023-08-25 00:15:50'),
(115, 2, 1, 0, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', NULL, '2023-08-25 12:19:44'),
(116, 1, 2, 3, '1099999922', 'Nguyễn Tuấn Anh', 'tuananh@gmail.com', 'Bình Phước', '', '2023-08-25', '2023-08-26 00:00:40'),
(117, 1, 2, 3, '1099999922', 'Nguyễn Tuấn Anh', 'tuananh@gmail.com', 'Lào Cai', '', '2023-08-25', '2023-08-26 00:01:01'),
(118, 1, 1, 0, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', NULL, '2023-08-26 20:16:52'),
(119, 2, 2, 0, '1099999922', 'Nguyễn Tuấn Anh', 'tuananh@gmail.com', 'Phú Quốc', '', NULL, '2023-08-27 01:05:31'),
(120, 2, NULL, 0, '8765432', 'sfasd', 'nhom7@gmail.com', 'hà nội', '', NULL, '2023-09-01 15:34:21'),
(121, 2, NULL, 4, '1212323123', 'huan', 'test@gmail.com', 'hà nội, quốc oai, tân hòa', '', '2023-09-02', '2023-09-01 15:35:22'),
(122, 2, NULL, 3, '09045345', 'Sasuke', 'sasuke@gmail.com', 'hà nội, quốc oai, tân hòa', 'nhanh nhanh!!!!!!!!', '2023-09-02', '2023-09-02 15:14:00'),
(123, 2, 1, 0, '0000000777', 'Nhóm7', 'nhom7@gmail.com', 'Sài gòn', '', NULL, '2023-09-02 22:27:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `size_id` int(10) NOT NULL,
  `quantity` int(2) DEFAULT NULL,
  `price_cur` decimal(10,0) DEFAULT NULL,
  `total_price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `size_id`, `quantity`, `price_cur`, `total_price`) VALUES
(49, 97, 141, 2, 1, 52800, 52800),
(50, 98, 144, 1, 1, 62400, 62400),
(51, 99, 141, 2, 1, 52800, 52800),
(52, 99, 138, 1, 2, 43680, 87360),
(53, 100, 134, 2, 2, 52000, 104000),
(54, 101, 144, 2, 3, 70200, 210600),
(55, 102, 144, 2, 5, 70200, 351000),
(56, 103, 133, 2, 2, 57850, 115700),
(57, 104, 143, 2, 3, 110500, 331500),
(58, 105, 143, 3, 3, 119000, 357000),
(59, 106, 137, 3, 2, 58740, 117480),
(60, 107, 133, 3, 1, 66750, 66750),
(61, 108, 139, 2, 3, 70400, 211200),
(62, 109, 139, 2, 3, 70400, 211200),
(63, 110, 136, 2, 2, 55000, 110000),
(64, 111, 138, 2, 4, 46020, 46020),
(65, 111, 135, 1, 1, 40000, 40000),
(66, 111, 141, 1, 1, 39600, 39600),
(67, 111, 141, 1, 1, 39600, 39600),
(68, 112, 139, 2, 1, 70400, 70400),
(69, 113, 142, 1, 1, 29920, 29920),
(70, 114, 139, 1, 1, 61600, 61600),
(71, 114, 146, 1, 1, 130000, 130000),
(72, 115, 141, 1, 1, 39600, 39600),
(73, 115, 146, 3, 4, 180000, 360000),
(74, 115, 134, 2, 7, 52000, 364000),
(75, 116, 140, 3, 2, 105600, 211200),
(76, 117, 145, 3, 4, 160000, 640000),
(77, 118, 141, 2, 2, 52800, 105600),
(78, 119, 141, 1, 1, 39600, 39600),
(79, 119, 142, 1, 1, 29920, 29920),
(80, 119, 139, 1, 1, 61600, 61600),
(81, 120, 137, 1, 1, 39160, 39160),
(82, 121, 143, 1, 2, 102000, 204000),
(83, 122, 143, 3, 1, 119000, 119000),
(84, 122, 139, 3, 3, 88000, 264000),
(85, 123, 137, 2, 3, 49840, 149520),
(86, 123, 142, 3, 1, 52800, 52800);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `des` text DEFAULT NULL,
  `sale` int(3) DEFAULT 0,
  `status` bit(1) DEFAULT b'1' COMMENT '0 là không hoạt động\r\n1 là hoạt động',
  `view` int(11) DEFAULT 0,
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `image_url`, `name`, `des`, `sale`, `status`, `view`, `create_at`, `update_at`) VALUES
(133, 15, 'suada.jpg', 'PHIN SỮA ĐÁ', 'Hương vị cà phê Việt Nam đích thực! Từng hạt cà phê hảo hạng được chọn bằng tay, phối trộn độc đáo giữa hạt Robusta từ cao nguyên Việt Nam, thêm Arabica thơm lừng. Cà phê được pha từ Phin truyền thống, hoà cùng sữa đặc sánh và thêm vào chút đá tạo nên ly Phin Sữa Đá – Đậm Đà Chất Phin.', 11, b'1', 15, '2023-07-30 01:21:27', NULL),
(134, 15, 'denda.jpg', 'PHIN ĐEN ĐÁ', 'Dành cho những tín đồ cà phê đích thực! Hương vị cà phê truyền thống được phối trộn độc đáo tại Highlands. Cà phê đậm đà pha hoàn toàn từ Phin, cho thêm 1 thìa đường, một ít đá viên mát lạnh, tạo nên Phin Đen Đá mang vị cà phê đậm đà chất Phin.', 20, b'1', 15, '2023-07-30 01:22:35', NULL),
(135, 15, 'bacxiuda.jpg', 'BẠC XỈU ĐÁ', 'BẠC XỈU ĐÁ', 0, b'1', 25, '2023-07-30 01:23:24', '2023-08-02'),
(136, 14, 'tradaothach.jpg', 'TRÀ THẠCH ĐÀO', 'Vị trà đậm đà kết hợp cùng những miếng đào thơm ngon mọng nước cùng thạch đào giòn dai. Thêm vào ít sữa để gia tăng vị béo.', 0, b'1', 8, '2023-07-30 01:24:18', '2023-08-04'),
(137, 14, 'trasen.jpg', 'TRÀ SEN VÀNG (SEN)', 'Thức uống chinh phục những thực khách khó tính! Sự kết hợp độc đáo giữa trà Ô long, hạt sen thơm bùi và củ năng giòn tan. Thêm vào chút sữa sẽ để vị thêm ngọt ngào.', 11, b'1', 15, '2023-07-30 01:25:21', NULL),
(138, 16, 'socolacoffe.jpg', 'FREEZE SÔ-CÔ-LA', 'Thiên đường đá xay sô cô la! Từ những thanh sô cô la Việt Nam chất lượng được đem xay với đá cho đến khi mềm mịn, sau đó thêm vào thạch sô cô la dai giòn, ở trên được phủ một lớp kem whip beo béo và sốt sô cô la ngọt ngào. Tạo thành Freeze Sô-cô-la ngon mê mẩn chinh phục bất kì ai!', 22, b'1', 7, '2023-07-30 01:26:30', NULL),
(139, 15, 'coffekem.jpg', 'COOKIES & CREAM', 'COOKIES & CREAM', 12, b'1', 21, '2023-07-30 01:27:20', NULL),
(140, 16, 'coffekemsocola.jpg', 'PHINDI KEM SỮA', 'PhinDi Kem Sữa - Cà phê Phin thế hệ mới với chất Phin êm hơn, kết hợp cùng Kem Sữa béo ngậy mang đến hương vị mới lạ, không thể hấp dẫn hơn!', 12, b'1', 4, '2023-07-30 01:28:02', NULL),
(141, 14, 'tradaudo.jpg', 'TRÀ XANH ĐẬU ĐỎ', 'Vị trà đậm đà kết hợp cùng những miếng đào thơm ngon mọng nước cùng thạch đào giòn dai. Thêm vào ít sữa để gia tăng vị béo.', 12, b'1', 18, '2023-07-30 01:28:54', '2023-08-04'),
(142, 14, 'tradao.jpg', 'TRÀ THANH ĐÀO', 'Một trải nghiệm thú vị khác! Sự hài hòa giữa vị trà cao cấp, vị sả thanh mát và những miếng đào thơm ngon mọng nước sẽ mang đến cho bạn một thức uống tuyệt vời.', 12, b'1', 7, '2023-07-30 01:29:37', '2023-08-04'),
(143, 14, 'travai.jpg', 'TRÀ THẠCH VẢI', 'Một sự kết hợp thú vị giữa trà đen, những quả vải thơm ngon và thạch giòn khó cưỡng, mang đến thức uống tuyệt hảo!', 15, b'1', 8, '2023-07-30 01:30:26', '2023-08-04'),
(144, 14, 'trasenvang.jpg', 'TRÀ SEN VÀNG (CỦ NĂNG)', 'Thức uống chinh phục những thực khách khó tính! Sự kết hợp độc đáo giữa trà Ô long, hạt sen thơm bùi và củ năng giòn tan. Thêm vào chút sữa sẽ để vị thêm ngọt ngào.', 22, b'1', 8, '2023-07-30 01:31:23', '2023-08-04'),
(145, 14, 'traxanhkemlanh.jpg', 'FREEZE TRÀ XANH', 'Thức uống rất được ưa chuộng! Trà xanh thượng hạng từ cao nguyên Việt Nam, kết hợp cùng đá xay, thạch trà dai dai, thơm ngon và một lớp kem dày phủ lên trên vô cùng hấp dẫn. Freeze Trà Xanh thơm ngon, mát lạnh, chinh phục bất cứ ai!', 0, b'1', 7, '2023-07-30 01:33:51', '2023-08-04'),
(146, 15, 'coffelanh.jpg', 'CARAMEL PHIN FREEZE', 'Thơm ngon khó cưỡng! Được kết hợp từ cà phê truyền thống chỉ có tại Highlands Coffee, cùng với caramel, thạch cà phê và đá xay mát lạnh. Trên cùng là lớp kem tươi thơm béo và caramel ngọt ngào. Món nước phù hợp trong những cuộc gặp gỡ bạn bè, bởi sự ngọt ngào thường mang mọi người xích lại gần nhau.', 0, b'1', 27, '2023-07-30 01:34:54', '2023-08-26'),
(160, 15, 'item_hatRe.jpg', 'PHINDI HẠT DẺ CƯỜI', 'PhinDi Hạt Dẻ Cười - Cà phê Phin thế hệ mới với chất Phin êm hơn, kết hợp sốt phistiachio mang đến hương vị mới lạ, không thể hấp dẫn hơn!', 0, b'1', 4, '2023-09-02 04:00:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `size_id` int(10) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_id`, `size_id`, `price`, `create_at`, `update_at`) VALUES
(137, 133, 1, 55000, '2023-07-30 01:21:27', NULL),
(138, 133, 2, 65000, '2023-07-30 01:21:27', NULL),
(139, 133, 3, 75000, '2023-07-30 01:21:27', NULL),
(140, 134, 1, 60000, '2023-07-30 01:22:35', NULL),
(141, 134, 2, 65000, '2023-07-30 01:22:36', NULL),
(142, 134, 3, 72000, '2023-07-30 01:22:36', NULL),
(143, 135, 1, 40000, '2023-07-30 01:23:24', '2023-08-02'),
(144, 135, 2, 46000, '2023-07-30 01:23:24', '2023-08-02'),
(145, 135, 3, 55000, '2023-07-30 01:23:24', '2023-08-02'),
(146, 136, 1, 43000, '2023-07-30 01:24:18', '2023-08-04'),
(147, 136, 2, 55000, '2023-07-30 01:24:18', '2023-08-04'),
(148, 136, 3, 60000, '2023-07-30 01:24:18', '2023-08-04'),
(149, 137, 1, 44000, '2023-07-30 01:25:21', NULL),
(150, 137, 2, 56000, '2023-07-30 01:25:21', NULL),
(151, 137, 3, 66000, '2023-07-30 01:25:22', NULL),
(152, 138, 1, 56000, '2023-07-30 01:26:30', NULL),
(153, 138, 2, 59000, '2023-07-30 01:26:30', NULL),
(154, 138, 3, 65000, '2023-07-30 01:26:31', NULL),
(155, 139, 1, 70000, '2023-07-30 01:27:20', NULL),
(156, 139, 2, 80000, '2023-07-30 01:27:20', NULL),
(157, 139, 3, 100000, '2023-07-30 01:27:20', NULL),
(158, 140, 1, 80000, '2023-07-30 01:28:02', NULL),
(159, 140, 2, 90000, '2023-07-30 01:28:02', NULL),
(160, 140, 3, 120000, '2023-07-30 01:28:02', NULL),
(161, 141, 1, 45000, '2023-07-30 01:28:54', '2023-08-04'),
(162, 141, 2, 60000, '2023-07-30 01:28:54', '2023-08-04'),
(163, 141, 3, 70000, '2023-07-30 01:28:54', '2023-08-04'),
(164, 142, 1, 34000, '2023-07-30 01:29:37', '2023-08-04'),
(165, 142, 2, 45000, '2023-07-30 01:29:37', '2023-08-04'),
(166, 142, 3, 60000, '2023-07-30 01:29:37', '2023-08-04'),
(167, 143, 1, 120000, '2023-07-30 01:30:26', '2023-08-04'),
(168, 143, 2, 130000, '2023-07-30 01:30:26', '2023-08-04'),
(169, 143, 3, 140000, '2023-07-30 01:30:27', '2023-08-04'),
(170, 144, 1, 80000, '2023-07-30 01:31:23', '2023-08-04'),
(171, 144, 2, 90000, '2023-07-30 01:31:23', '2023-08-04'),
(172, 144, 3, 100000, '2023-07-30 01:31:23', '2023-08-04'),
(173, 145, 1, 100000, '2023-07-30 01:33:51', '2023-08-04'),
(174, 145, 2, 140000, '2023-07-30 01:33:51', '2023-08-04'),
(175, 145, 3, 160000, '2023-07-30 01:33:51', '2023-08-04'),
(176, 146, 1, 130000, '2023-07-30 01:34:54', '2023-08-26'),
(177, 146, 2, 140000, '2023-07-30 01:34:55', '2023-08-26'),
(178, 146, 3, 160000, '2023-07-30 01:34:55', '2023-08-26'),
(194, 160, 1, 55000, '2023-09-02 04:00:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_address`
--

CREATE TABLE `shop_address` (
  `address_id` int(10) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `link` varchar(400) DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `shop_address`
--

INSERT INTO `shop_address` (`address_id`, `address`, `phone`, `link`, `create_at`, `update_at`) VALUES
(1, 'Trịnh Văn Bô, Phương Canh, Nam Từ Liêm,HN', '0124234234', 'https://www.google.com/maps/dir//Tr%C6%B0%E1%BB%9Dng+Cao+%C4%91%E1%BA%B3ng+FPT+Polytechnic/@21.0361769,105.748177,18z/data=!4m8!4m7!1m0!1m5!1m1!1s0x313455f097562a6f:0xc1df36ba25eab7e0!2m2!1d105.7494557!2d21.0364367?hl=vi-VN&entry=ttu', '2023-07-17 00:00:00', NULL),
(2, 'Vân Côn, Hoài Đức, Hà Nội', '435456456', 'https://www.google.com/maps/dir//V%C3%A2n+C%C3%B4n,+Ho%C3%A0i+%C4%90%E1%BB%A9c,+H%C3%A0+N%E1%BB%99i/@20.9917167,105.5969761,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3134516503b7cb6f:0xbaa8dde87a398cee!2m2!1d105.6793792!2d20.9917365?hl=vi-VN&entry=ttu', '2023-07-15 00:00:00', '2023-08-05'),
(3, 'Dồng Mai, Hà Đông, Hà Nội', '334234234', 'https://www.google.com/maps/dir//20.9358822,105.7473054/@20.9395238,105.7467428,16z?hl=vi-VN&entry=ttu', '2023-08-04 23:00:49', '2023-08-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `size_id` int(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` date DEFAULT NULL,
  `status` bit(1) DEFAULT b'1' COMMENT '0 là off\r\n1 là on',
  `dfdf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`size_id`, `name`, `create_at`, `update_at`, `status`, `dfdf`) VALUES
(1, 'S', NULL, NULL, b'1', NULL),
(2, 'M', NULL, NULL, b'1', NULL),
(3, 'L', NULL, NULL, b'1', NULL),
(4, 'XX', '2023-08-24 23:05:17', NULL, b'1', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`),
  ADD KEY `fk_bn_pr` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `fk_cus` (`customer_id`),
  ADD KEY `fk_cmt_pro` (`product_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_fb_pro` (`product_id`),
  ADD KEY `fk_fb_cus` (`customer_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order-ad` (`address_id`),
  ADD KEY `fk_order_cus` (`customer_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `fk_order_detail_pro` (`product_id`),
  ADD KEY `fk_order_detail` (`order_id`),
  ADD KEY `fk_sizeid` (`size_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pro` (`product_id`),
  ADD KEY `fk_size` (`size_id`);

--
-- Chỉ mục cho bảng `shop_address`
--
ALTER TABLE `shop_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT cho bảng `shop_address`
--
ALTER TABLE `shop_address`
  MODIFY `address_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `fk_bn_pr` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_cmt_pro` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `fk_cus` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_fb_cus` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `fk_fb_pro` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_ad` FOREIGN KEY (`address_id`) REFERENCES `shop_address` (`address_id`),
  ADD CONSTRAINT `fk_order_cus` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_order_detail` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `fk_order_detail_pro` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `fk_sizeid` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Các ràng buộc cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `fk_pro` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `fk_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
