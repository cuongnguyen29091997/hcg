-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2020 lúc 11:36 AM
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
-- Cơ sở dữ liệu: `es_diagnostic`
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
(1, 'cuongnguyen', 'admin123', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sickness`
--

CREATE TABLE `sickness` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `solution` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sickness`
--

INSERT INTO `sickness` (`id`, `name`, `des`, `solution`) VALUES
(5, 'BỆNH RẤT NẶNG', '<p>chi tiết bệnh</p>\r\n', '<p>- Sử dụng <a href=\"https://hellobacsi.com/thuoc-va-thao-duoc-a-z/thuoc/phenobarbital/\">Phenobarbital </a>nếu trẻ đang co giật</p>\r\n\r\n<p>- Nhanh ch&oacute;ng ho&agrave;n th&agrave;nh đ&aacute;nh gi&aacute;</p>\r\n\r\n<p>- Điều trị cấp cứu trước khi chuyển viện</p>\r\n\r\n<p>- Điều trị ph&ograve;ng hạ đường huyết</p>\r\n\r\n<p>- Giữ ấm cho trẻ</p>\r\n\r\n<p>- Chuyển GấP đi bệnh viện.*</p>\r\n'),
(6, 'VIÊM PHỔI NẶNG HOẶC BỆNH RẤT NẶNG', '<p><a href=\"https://www.vinmec.com/vi/tin-tuc/thong-tin-suc-khoe/dau-hieu-viem-phoi-nang-o-tre-nho/?link_type=related_posts\">Chi tiết vi&ecirc;m phổi</a></p>\r\n', '<p>- Cho <a href=\"http://canhgiacduoc.org.vn/SiteData/3/UserFiles/2018%20CK1%20Tran%20Ngoc%20Hoang(1).pdf\">liều kh&aacute;ng sin</a>h th&iacute;ch hợp với vi&ecirc;m<br />\r\nphổi nặng hoặc bệnh rất nặng</p>\r\n\r\n<p>- Chuyển gấp đi bệnh viện</p>\r\n'),
(7, 'VIÊM PHỔI', '<p><a href=\"https://pasteur.com.vn/bai-viet/benh-viem-phoi\">Chi tiết vi&ecirc;m phổi</a></p>\r\n', '<p>- Cho kh&aacute;ng sinh th&iacute;ch hợp với vi&ecirc;m phổi<br />\r\ntrong 3 ng&agrave;y **</p>\r\n\r\n<p>-&nbsp; Nếu trẻ kh&ograve; kh&egrave;, sử dụng thuốc gi&atilde;n phế<br />\r\nquản dạng kh&iacute; dung trong 5 ng&agrave;y ***</p>\r\n\r\n<p>-&nbsp;L&agrave;m giảm ho bằng c&aacute;c thuốc an to&agrave;n</p>\r\n\r\n<p>- Nếu ho tr&ecirc;n 14 ng&agrave;y hoặc kh&ograve; kh&egrave; t&aacute;i<br />\r\nph&aacute;t chuyển trẻ để kiểm tra lao hoặc hen phế quản</p>\r\n\r\n<p>- Dặn b&agrave; mẹ khi n&agrave;o cần đa trẻ đến kh&aacute;m<br />\r\nngay</p>\r\n\r\n<p>- Kh&aacute;m lại sau 2 ng&agrave;y</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `symptom`
--

CREATE TABLE `symptom` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `symptom`
--

INSERT INTO `symptom` (`id`, `name`, `des`) VALUES
(5, 'Trẻ có dấu hiệu toàn thân', '<p>N&ocirc;n mữa hoặc l&agrave; kh&ocirc;ng thể b&uacute; sữa mẹ. C&oacute; c&aacute;c dấu hiệu ảnh hưởng đến to&agrave;n th&acirc;n của trẻ</p>\r\n'),
(6, 'Trẻ có ho', '<p><a href=\"https://news.zing.vn/dau-hieu-khi-ho-canh-bao-benh-nguy-hiem-o-tre-post791076.html\">Trẻ c&oacute; ho</a></p>\r\n'),
(7, 'Trẻ khó thở', ''),
(8, 'Trẻ có ho hoặc khó thở', '<p>Trẻ kh&oacute; thở hoặc l&agrave; trẻ c&oacute; ho</p>\r\n'),
(9, 'Trẻ thở rít khi nằm ngang', '<p><a href=\"https://suckhoedoisong.vn/kho-khe-tho-rit-bao-hieu-benh-gi-n151848.html\">Trẻ thở r&iacute;t</a></p>\r\n'),
(10, 'Trẻ rút lõm lồng ngực', '<p>Th&ocirc;ng thường, khi trẻ h&iacute;t v&agrave;o, kh&ocirc;ng kh&iacute; đi v&agrave;o phổi sẽ l&agrave;m lồng ngực căng l&ecirc;n v&agrave; phồng ra. Dấu hiệu trẻ<strong>&nbsp;thở r&uacute;t l&otilde;m ngực</strong>&nbsp;l&agrave; khi trẻ h&iacute;t v&agrave;o thấy phần dưới lồng ngực (vị tr&iacute; tiếp gi&aacute;p giữa bụng với ngực) bị l&otilde;m bất thường. Điều n&agrave;y chứng tỏ, trẻ đang bị kh&oacute; thở. Dấu hiệu r&uacute;t l&otilde;m lồng ngực ở trẻ sẽ dễ d&agrave;ng quan s&aacute;t hơn khi trẻ ở trạng th&aacute;i y&ecirc;n tĩnh. Nếu nghi ngờ trẻ bị r&uacute;t l&otilde;m lồng ngực, cha mẹ n&ecirc;n để trẻ nằm y&ecirc;n, kh&ocirc;ng cử động, v&eacute;n &aacute;o trẻ l&ecirc;n, quan s&aacute;t kĩ to&agrave;n bộ lồng ngực của trẻ trong v&ograve;ng v&agrave;i ph&uacute;t.</p>\r\n\r\n<p>Một số trường hợp trẻ c&oacute; dấu hiệu co r&uacute;t ở vị tr&iacute; khe li&ecirc;n sườn hoặc phần tr&ecirc;n xương đ&ograve;n th&igrave; đ&oacute; kh&ocirc;ng phải l&agrave;&nbsp;<strong>dấu hiệu r&uacute;t l&otilde;m lồng ngực</strong>.</p>\r\n\r\n<p>Với trẻ sơ sinh dưới 2 th&aacute;ng tuổi, th&agrave;nh ngực c&ograve;n non nớt n&ecirc;n t&igrave;nh trạng thấy phần ngực của trẻ bị l&otilde;m lại khi thở l&agrave; biểu hiện b&igrave;nh thường. Nếu thấy lồng ngực l&otilde;m s&acirc;u, k&egrave;m theo c&aacute;c biểu hiện bất thường, kh&oacute; thở ở trẻ th&igrave; mới x&aacute;c định đ&oacute; l&agrave; r&uacute;t l&otilde;m lồng ngực ở trẻ bị vi&ecirc;m phổi hoặc c&oacute; thể l&agrave; dấu hiệu của bệnh&nbsp;<strong>l&otilde;m lồng ngực bẩm sinh</strong>.</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `symptom_query`
--

CREATE TABLE `symptom_query` (
  `id` int(11) NOT NULL,
  `conditions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `query` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `symptom_query`
--

INSERT INTO `symptom_query` (`id`, `conditions`, `query`) VALUES
(5, '8', 6),
(6, '8', 7),
(7, '8', 9),
(8, '8', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `symptom_sickness`
--

CREATE TABLE `symptom_sickness` (
  `id` int(11) NOT NULL,
  `conditions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `symptom_sickness`
--

INSERT INTO `symptom_sickness` (`id`, `conditions`, `result`) VALUES
(4, '9', 6),
(5, '10', 6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `sickness`
--
ALTER TABLE `sickness`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `symptom`
--
ALTER TABLE `symptom`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `symptom_query`
--
ALTER TABLE `symptom_query`
  ADD PRIMARY KEY (`id`),
  ADD KEY `query` (`query`);

--
-- Chỉ mục cho bảng `symptom_sickness`
--
ALTER TABLE `symptom_sickness`
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
-- AUTO_INCREMENT cho bảng `sickness`
--
ALTER TABLE `sickness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `symptom`
--
ALTER TABLE `symptom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `symptom_query`
--
ALTER TABLE `symptom_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `symptom_sickness`
--
ALTER TABLE `symptom_sickness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `symptom_query`
--
ALTER TABLE `symptom_query`
  ADD CONSTRAINT `symptom_query_ibfk_1` FOREIGN KEY (`query`) REFERENCES `symptom` (`id`);

--
-- Các ràng buộc cho bảng `symptom_sickness`
--
ALTER TABLE `symptom_sickness`
  ADD CONSTRAINT `symptom_sickness_ibfk_1` FOREIGN KEY (`result`) REFERENCES `sickness` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
