-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2020 lúc 07:33 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `es_illness`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`) VALUES
(1, 'cuongdeptrai', 'admin123', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_prerequsite` tinyint(1) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `answers`
--

INSERT INTO `answers` (`id`, `summary`, `is_prerequsite`, `parent_id`) VALUES
(69, 'Trẻ có dấu hiệu nguy hiểm toàn thân như : không thể bú,  nôn mữa, co giật, ngủ li bì,...', 0, NULL),
(70, 'Trẻ không thể uống  hoặc bú sữa mẹ', 0, 69),
(71, 'Trẻ nôn tất cả mọi thứ', 0, 69),
(72, 'Trẻ ngủ li bì hoặc khó đánh thức', 0, 69),
(73, 'Trẻ có ho hoặc khó thở', 0, 81),
(74, 'Trẻ thở rít khi nằm ngang', 0, 73),
(75, 'Trẻ bị rút lõm lồng ngực', 0, 73),
(76, 'Trẻ từ 2 đến 12 tháng tuổi', 0, 73),
(77, 'Trẻ từ 12 tháng tuổi đến 15 tuổi', 0, 73),
(78, 'Trẻ có nhịp thở > 50 nhịp / phút', 0, 76),
(79, 'Trẻ có nhịp thở > 40 nhịp/phút', 0, 77),
(80, 'Trẻ thở nhanh', 0, 73),
(81, 'Không có dấu hiệu toàn thân nào', 0, 69);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `illness`
--

CREATE TABLE `illness` (
  `id` int(8) NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `illness`
--

INSERT INTO `illness` (`id`, `summary`, `alias`, `solution`) VALUES
(28, 'Bệnh rất nặng', 'benh-rat-nang', '<p>* Sử dụng phenolbarbital nếu trẻ đang co giật</p>\r\n\r\n<p>* Nhanh ch&oacute;ng ho&agrave;n th&agrave;nh đ&aacute;nh gi&aacute;</p>\r\n\r\n<p>* Điều trị cấp cứu trước khi chuyển viện</p>\r\n\r\n<p>* Điều trị ph&ograve;ng<a href=\"http://es.illness.com:8000/benh/show/benh-rat-nang\"> hạ đường huyết</a></p>\r\n\r\n<p>* Giữ ấm cho trẻ</p>\r\n\r\n<p>* Chuyển trẻ đi viện gấp</p>\r\n'),
(29, 'Viêm phổi nặng hoặc bệnh rất nặng', 'Viem-phoi-nang', '<p>* Cho liềm kh&aacute;ng sinh th&iacute;ch hợp với vi&ecirc;m phổi nặng hoặc rất nặng</p>\r\n\r\n<p>* Chuyển gấp trẻ đi viện</p>\r\n'),
(30, 'Viêm phổi', 'viem-phoi', '<p>* Cho kh&aacute;ng sinh th&iacute;ch hợp với vi&ecirc;m phổi trong 3 ng&agrave;y</p>\r\n\r\n<p>* Nếu trẻ kh&ograve; kh&egrave;, sử dụng thuốc gi&atilde;n phế quản dạng kh&iacute; d&ugrave;ng trong 5 ng&agrave;y</p>\r\n\r\n<p>* L&agrave;m giảm ho bằng c&aacute;c thuốc an to&agrave;n</p>\r\n\r\n<p>* Nếu trẻ ho tr&ecirc;n 14 ng&agrave;y hoặc kh&ograve; kh&egrave; t&aacute;i ph&aacute;t th&igrave; chuyển trẻ đi kiểm tra lao hoặc hen</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `condition` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rules`
--

INSERT INTO `rules` (`id`, `condition`, `result`) VALUES
(31, '70', 28),
(32, '71', 28),
(33, '72', 28),
(34, '74', 29),
(35, '75', 29),
(36, '76;78', 30),
(37, '79;77', 30),
(38, '80', 30);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Chỉ mục cho bảng `illness`
--
ALTER TABLE `illness`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Chỉ mục cho bảng `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result` (`result`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `illness`
--
ALTER TABLE `illness`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `answers` (`id`);

--
-- Các ràng buộc cho bảng `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_ibfk_1` FOREIGN KEY (`result`) REFERENCES `illness` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
