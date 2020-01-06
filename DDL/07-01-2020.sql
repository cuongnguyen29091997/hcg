-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2020 lúc 12:30 AM
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
(7, 'VIÊM PHỔI', '<p><a href=\"https://pasteur.com.vn/bai-viet/benh-viem-phoi\">Chi tiết vi&ecirc;m phổi</a></p>\r\n', '<p>- Cho kh&aacute;ng sinh th&iacute;ch hợp với vi&ecirc;m phổi<br />\r\ntrong 3 ng&agrave;y **</p>\r\n\r\n<p>-&nbsp; Nếu trẻ kh&ograve; kh&egrave;, sử dụng thuốc gi&atilde;n phế<br />\r\nquản dạng kh&iacute; dung trong 5 ng&agrave;y ***</p>\r\n\r\n<p>-&nbsp;L&agrave;m giảm ho bằng c&aacute;c thuốc an to&agrave;n</p>\r\n\r\n<p>- Nếu ho tr&ecirc;n 14 ng&agrave;y hoặc kh&ograve; kh&egrave; t&aacute;i<br />\r\nph&aacute;t chuyển trẻ để kiểm tra lao hoặc hen phế quản</p>\r\n\r\n<p>- Dặn b&agrave; mẹ khi n&agrave;o cần đa trẻ đến kh&aacute;m<br />\r\nngay</p>\r\n\r\n<p>- Kh&aacute;m lại sau 2 ng&agrave;y</p>\r\n'),
(8, 'Mất nước nặng', '<p><strong>Mất nước&nbsp;nặng </strong>l&agrave; sự thiếu hụt lớn tổng lượng&nbsp;<a href=\"https://vi.wikipedia.org/wiki/N%C6%B0%E1%BB%9Bc\" title=\"Nước\">nước</a>&nbsp;trong&nbsp;<a href=\"https://vi.wikipedia.org/wiki/C%C6%A1_th%E1%BB%83_s%E1%BB%91ng\" title=\"Cơ thể sống\">cơ thể</a>,&nbsp;l&agrave;m gi&aacute;n đoạn qu&aacute; tr&igrave;nh&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Trao_%C4%91%E1%BB%95i_ch%E1%BA%A5t\" title=\"Trao đổi chất\">trao đổi chất</a>. Xảy ra khi lượng mất nước tự nhi&ecirc;n vượt qu&aacute; lượng nước tự do, thường l&agrave; do tập thể dục, bệnh tật, hoặc nhiệt độ m&ocirc;i trường cao.&nbsp;T&igrave;nh trạng mất nước nhẹ cũng c&oacute; thể g&acirc;y ra bởi&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Hi%E1%BB%87n_t%C6%B0%E1%BB%A3ng_bu%E1%BB%93n_ti%E1%BB%83u_d%C6%B0%E1%BB%9Bi_n%C6%B0%E1%BB%9Bc&amp;action=edit&amp;redlink=1\" title=\"Hiện tượng buồn tiểu dưới nước (trang chưa được viết)\">hiện tượng buồn tiểu dưới nước</a>, c&oacute; thể l&agrave;m tăng nguy cơ bị&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=B%E1%BB%87nh_kh%C3%AD_%C3%A9p&amp;action=edit&amp;redlink=1\" title=\"Bệnh khí ép (trang chưa được viết)\">bệnh kh&iacute; &eacute;p</a>&nbsp;ở thợ lặn.</p>\r\n', '<p>*Nếu trẻ c&oacute; c&aacute;c ph&acirc;n loại bệnh nặng<br />\r\nkh&aacute;c:<br />\r\n- Chuyển gấp đi bệnh viện. Nhắc b&agrave; mẹ cho uống li&ecirc;n tục từng th&igrave;a ORS tr&ecirc;n đường đi v&agrave; tiếp tục cho b&uacute;.<br />\r\n Nếu trẻ kh&ocirc;ng c&oacute; c&aacute;c ph&acirc;n loại bệnh nặng kh&aacute;c:<br />\r\n- B&ugrave; dịch đối với mất nước nặng&nbsp;</p>\r\n\r\n<p>*Nếu trẻ 2 tuổi hoặc lớn hơn v&agrave; đang c&oacute;<br />\r\ndịch tả tại địa phương, cho một liều kh&aacute;ng<br />\r\nsinh tả.</p>\r\n'),
(9, 'Có mất nước (nhẹ)', '<p><strong>Mất nước</strong>&nbsp;xảy ra khi bị&nbsp;<strong>mất</strong>&nbsp;nhiều chất lỏng hơn đi v&agrave;o, v&agrave; cơ thể kh&ocirc;ng c&oacute; đủ&nbsp;<strong>nước</strong>&nbsp;v&agrave; c&aacute;c chất lỏng kh&aacute;c để thực hiện chức năng b&igrave;nh thường của n&oacute;. ... Trong thời tiết n&oacute;ng, bệnh tật hoặc tập thể dục v&agrave; uống chất lỏng đủ để thay thế những&nbsp;<strong>g&igrave; mất</strong>.&nbsp;<strong>Mất nước nhẹ</strong>&nbsp;đến vừa phải c&oacute; thể g&acirc;y ra: - Kh&ocirc;, d&iacute;nh miệng</p>\r\n', '<p>Nếu trẻ c&oacute; một ph&acirc;n loại nặng kh&aacute;c:<br />\r\n- Chuyển gấp đi bệnh viện. Nhắc b&agrave; mẹcho uống li&ecirc;n tục từng th&igrave;a ORS tr&ecirc;n đường đi v&agrave; tiếp tục cho b&uacute;.<br />\r\n B&ugrave; dịch, bổ sung kẽm v&agrave; cho ăn theo ph&aacute;cđồ B<br />\r\n Dặn b&agrave; mẹ khi n&agrave;o cần đưa trẻ đến kh&aacute;mngay.<br />\r\n Kh&aacute;m lại sau 5 ng&agrave;y nếu kh&ocirc;ng tiến triểntốt</p>\r\n'),
(10, 'Tiêu chảy - không  mất nước', '<p>Bệnh ti&ecirc;u chảy nhẹ</p>\r\n', '<p>Uống th&ecirc;m dịch, bổ sung kẽm v&agrave; cho ăntheo ph&aacute;c đồ A<br />\r\n Dặn b&agrave; mẹ khi n&agrave;o cần đưa trẻ đến kh&aacute;mngay.<br />\r\n Kh&aacute;m lại sau 5 ng&agrave;y nếu kh&ocirc;ng tiến triểntốt.</p>\r\n'),
(11, 'TIÊU CHẢY KÉO DÀI NẶNG', '<p><em>Ti&ecirc;u chảy nặng&nbsp;k&eacute;o d&agrave;i</em>&nbsp;tiềm ẩn nhiều vấn đề m&agrave; người bệnh cần lưu &yacute; để ... th&ocirc;ng qua c&acirc;n&nbsp;<em>nặng</em>, th&acirc;n nhiệt, lượng ăn v&agrave;o, số lần&nbsp;<em>ti&ecirc;u chảy</em></p>\r\n', '<p>- Điều trị mất nước trước khi chuyển trừ trường hợp c&oacute; ph&acirc;n loại nặng kh&aacute;c</p>\r\n\r\n<p>- Chuyển đi bệnh viện</p>\r\n'),
(12, 'TIÊU CHẢY KÉO DÀI', '<p><em>Ti&ecirc;u chảy k&eacute;o d&agrave;i</em>&nbsp; l&agrave; t&igrave;nh trạng rối loạn ti&ecirc;u h&oacute;a c&oacute; thể gặp ở bất kỳ ai, ... Nghi&ecirc;m trọng hơn,&nbsp;<em>ti&ecirc;u chảy k&eacute;o d&agrave;i</em>&nbsp;c&oacute; thể dẫn tới nhiều bi</p>\r\n', '<p>Khuy&ecirc;n b&agrave; mẹ c&aacute;ch nu&ocirc;i dưỡng trẻ bị ti&ecirc;u chảy k&eacute;o d&agrave;i</p>\r\n\r\n<p>Cho multivitamin v&agrave; kho&aacute;ng chất (bao gồm cả kẽm) trong 14 ng&agrave;y</p>\r\n\r\n<p>Kh&aacute;m lại sau 5 ng&agrave;y</p>\r\n'),
(13, 'Lỵ', '<p><strong>Lỵ</strong>&nbsp;hay kiết&nbsp;<strong>lỵ l&agrave;</strong>&nbsp;một bệnh đường ti&ecirc;u h&oacute;a g&acirc;y ra ti&ecirc;u chảy c&oacute; m&aacute;u. Một số triệu chứng kh&aacute;c bao gồm sốt, đau bụng, v&agrave; cảm gi&aacute;c đi ti&ecirc;u kh&ocirc;ng hết. ...&nbsp;<strong>Lỵ</strong>&nbsp;thường được g&acirc;y ra do nhiễm tr&ugrave;ng bởi vi khuẩn, động vật nguy&ecirc;n sinh, k&yacute; sinh tr&ugrave;ng, virus hay một số chất k&iacute;ch th&iacute;ch h&oacute;a học.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Cho Cefixime trong 3 ng&agrave;y<br />\r\nKh&aacute;m lại sau 3 ng&agrave;y</p>\r\n'),
(14, 'Ho hoặc cảm lạnh', '<p><strong>Cảm lạnh</strong>&nbsp;(c&ograve;n được gọi l&agrave;&nbsp;<strong>cảm</strong>, vi&ecirc;m mũi họng, sổ mũi cấp) l&agrave; một bệnh truyền nhiễm do virus g&acirc;y ra ở đường&nbsp;<strong>h&ocirc;</strong>&nbsp;hấp tr&ecirc;n nhưng chủ yếu ảnh hưởng mũi. C&aacute;c triệu chứng gồm&nbsp;<strong>ho</strong>, đau họng, sổ mũi, hắt hơi v&agrave; sốt thường tự hết trong v&ograve;ng 7 đến 10 ng&agrave;y, cũng c&oacute; thể triệu chứng k&eacute;o d&agrave;i đến hết tuần thứ 3.</p>\r\n\r\n<p><em>Ho</em>&nbsp;l&agrave; một phản xạ c&oacute; điều kiện xuất hiện đột ngột v&agrave; thường lặp đi lặp lại, n&oacute; c&oacute; t&aacute;c dụng gi&uacute;p loại bỏ c&aacute;c chất b&agrave;i tiết, chất c&oacute; thể g&acirc;y k&iacute;ch th&iacute;ch, c&aacute;c hạt ở m&ocirc;i&nbsp;</p>\r\n', '<p>Nếu kh&ograve; kh&egrave;, sử dụng thuốc gi&atilde;n phế<br />\r\nquản dạng kh&iacute; dung trong 5 ng&agrave;y<br />\r\n L&agrave;m giảm ho bằng c&aacute;c thuốc an to&agrave;n<br />\r\n Nếu ho tr&ecirc;n 14 ng&agrave;y hoặc kh&ograve; kh&egrave; t&aacute;i<br />\r\nph&aacute;t chuyển trẻ để kiểm tra lao hoặc hen<br />\r\nphế quản<br />\r\n Dặn b&agrave; mẹ khi n&agrave;o cần đa trẻ đến kh&aacute;m<br />\r\nngay<br />\r\n Kh&aacute;m lại sau 5 ng&agrave;y, nếu kh&ocirc;ng tiến triển<br />\r\ntốt</p>\r\n');

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
(10, 'Trẻ rút lõm lồng ngực', '<p>Th&ocirc;ng thường, khi trẻ h&iacute;t v&agrave;o, kh&ocirc;ng kh&iacute; đi v&agrave;o phổi sẽ l&agrave;m lồng ngực căng l&ecirc;n v&agrave; phồng ra. Dấu hiệu trẻ<strong>&nbsp;thở r&uacute;t l&otilde;m ngực</strong>&nbsp;l&agrave; khi trẻ h&iacute;t v&agrave;o thấy phần dưới lồng ngực (vị tr&iacute; tiếp gi&aacute;p giữa bụng với ngực) bị l&otilde;m bất thường. Điều n&agrave;y chứng tỏ, trẻ đang bị kh&oacute; thở. Dấu hiệu r&uacute;t l&otilde;m lồng ngực ở trẻ sẽ dễ d&agrave;ng quan s&aacute;t hơn khi trẻ ở trạng th&aacute;i y&ecirc;n tĩnh. Nếu nghi ngờ trẻ bị r&uacute;t l&otilde;m lồng ngực, cha mẹ n&ecirc;n để trẻ nằm y&ecirc;n, kh&ocirc;ng cử động, v&eacute;n &aacute;o trẻ l&ecirc;n, quan s&aacute;t kĩ to&agrave;n bộ lồng ngực của trẻ trong v&ograve;ng v&agrave;i ph&uacute;t.</p>\r\n\r\n<p>Một số trường hợp trẻ c&oacute; dấu hiệu co r&uacute;t ở vị tr&iacute; khe li&ecirc;n sườn hoặc phần tr&ecirc;n xương đ&ograve;n th&igrave; đ&oacute; kh&ocirc;ng phải l&agrave;&nbsp;<strong>dấu hiệu r&uacute;t l&otilde;m lồng ngực</strong>.</p>\r\n\r\n<p>Với trẻ sơ sinh dưới 2 th&aacute;ng tuổi, th&agrave;nh ngực c&ograve;n non nớt n&ecirc;n t&igrave;nh trạng thấy phần ngực của trẻ bị l&otilde;m lại khi thở l&agrave; biểu hiện b&igrave;nh thường. Nếu thấy lồng ngực l&otilde;m s&acirc;u, k&egrave;m theo c&aacute;c biểu hiện bất thường, kh&oacute; thở ở trẻ th&igrave; mới x&aacute;c định đ&oacute; l&agrave; r&uacute;t l&otilde;m lồng ngực ở trẻ bị vi&ecirc;m phổi hoặc c&oacute; thể l&agrave; dấu hiệu của bệnh&nbsp;<strong>l&otilde;m lồng ngực bẩm sinh</strong>.</p>\r\n'),
(11, 'Trẻ có tiêu chảy', '<p><strong>Ti&ecirc;u chảy</strong>, (bắt nguồn từ phương ngữ tiếng Việt miền Nam), c&ograve;n gọi&nbsp;<strong>l&agrave;</strong>&nbsp;ỉa&nbsp;<strong>chảy</strong>, tiếng Anh: Diarrhea&nbsp;<strong>l&agrave;</strong>&nbsp;t&igrave;nh trạng đi ngo&agrave;i ph&acirc;n lỏng ba lần hoặc nhiều hơn mỗi ng&agrave;y.</p>\r\n'),
(12, 'Có máu trong phân trẻ', '<p>Ph&acirc;n trẻ sơ sinh c&oacute; m&aacute;u xuất hiện dưới nhiều h&igrave;nh thức kh&aacute;c nhau:</p>\r\n\r\n<ul>\r\n	<li>Một v&agrave;i vết m&aacute;u đỏ lẫn ở trong ph&acirc;n</li>\r\n	<li>Nếu b&eacute; bị dị ứng hoặc nhiễm tr&ugrave;ng trong dạ d&agrave;y, m&aacute;u sẽ c&oacute; m&agrave;u đen.</li>\r\n</ul>\r\n'),
(13, 'Trẻ ngủ li lì hoặc khó đánh thức', '<p><img alt=\"Trẻ sơ sinh ngủ li bì khó đánh thức là bệnh gì? Dấu hiệu trẻ bị viêm màng não\" src=\"https://gonhub.com/wp-content/uploads/bigvn/uploads/2018/08/tre-so-sinh-ngu-li-bi-kho-danh-thuc-la-benh-gi-dau-hieu-tre-bi-viem-mang-nao-20180807-08-2018-233642.jpg\" /></p>\r\n'),
(14, 'Mắt trẻ bị trũng', '<p><img alt=\"Kết quả hình ảnh cho Mắt trẻ bị trũng\" src=\"https://yeutre.vn/cdn/medias/uploads/17/17892-em-be-tham-quang.jpg\" /></p>\r\n'),
(15, 'Trẻ không uống được nước hoặc uống kém', '<p><img alt=\"Kết quả hình ảnh cho Trẻ không uống được nước hoặc uống kém là gì\" src=\"https://media.baosuckhoecongdong.vn/mediav2/files/ban_doc/Tre-so-sinh-bi-cum-nguyen-nhan-dau-hieu-va-cach-dieu-tri-tai-nha_2.jpg\" /></p>\r\n'),
(16, 'Nếp véo da trẻ mất rất chậm', '<p><img alt=\"Kết quả hình ảnh cho Trẻ không uống được nước hoặc uống kém là gì\" src=\"https://vinmec-prod.s3.amazonaws.com/images/20190809_115531_333759_tre-em.max-800x800.jpg\" /></p>\r\n'),
(17, 'Trẻ có hiện tượng vật vả, kích thích', '<p><img alt=\"Kết quả hình ảnh cho Trẻ có hiện tượng vật vả, kích thích\" src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQE-TwTbEKJkkT3hs0o9DCXx7_txBXyUlHfiyz3ltOOhRpHMcjZwQ&amp;s\" /></p>\r\n'),
(18, 'Trẻ uống háo hức, khát', '<p><img alt=\"Kết quả hình ảnh cho Trẻ uống háo hức, khát\" src=\"http://hanoimoi.com.vn/Uploads/anhthu/2012/10/3/uongsua.jpg\" /></p>\r\n'),
(19, 'Không có các dấu hiệu trên  ', ''),
(20, 'Trẻ không thể uống hoặc bú mẹ', '<p><img alt=\"Kết quả hình ảnh cho Trẻ không thể uống hoặc bú mẹ\" src=\"https://mabio.vn/wp-content/uploads/2018/03/tre-khong-chiu-bu-me-4-600x400.jpg\" /></p>\r\n'),
(21, 'Trẻ nôn tất cả mọi thứ', '<p><img alt=\"Kết quả hình ảnh cho trẻ non tất cả mọi thứ\" src=\"https://vinmec-prod.s3.amazonaws.com/images/20190722_025835_585684_tre-em-bi-non.max-800x800.jpg\" /></p>\r\n'),
(22, 'Trẻ có bị co giật trong đợt bệnh này', '<p><img alt=\"Kết quả hình ảnh cho Trẻ có bị co giật trong đợt bệnh này\" src=\"https://vinmec-prod.s3.amazonaws.com/images/20191121_031311_125022_tre-quay-khoc.max-1800x1800.jpg\" /></p>\r\n'),
(23, 'Hiện tại trẻ có co giật', '<p><em>co giật trẻ c&oacute;</em>&nbsp;thể&nbsp;<em>c&oacute;</em>&nbsp;th&ecirc;m c&aacute;c biểu&nbsp;<em>hiện</em>&nbsp;n&ocirc;n &oacute;i, s&ugrave;i bọt m&eacute;p, đồng tử lộn l&ecirc;n tr&ecirc;n l&agrave;m mắt trắng d&atilde;. C&aacute;c cơn&nbsp;<em>co giật n&agrave;y</em>&nbsp;thường l&agrave; c&aacute;c cơn&nbsp;...</p>\r\n'),
(24, 'Không có dấu hiệu', '<p>ho nhẹ, cảm lạnh</p>\r\n');

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
(8, '8', 10),
(10, '11', 12),
(11, '11', 13),
(12, '10', 14),
(13, '11', 15),
(14, '11', 16),
(15, '11', 17),
(16, '11', 18),
(17, '11', 19),
(18, '5', 23),
(19, '5', 22),
(20, '5', 21),
(21, '5', 20),
(22, '5', 13),
(23, '8', 24);

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
(5, '10', 6),
(6, '13;14', 8),
(7, '13;15', 8),
(8, '13;16', 8),
(9, '14;15', 8),
(10, '14;16', 8),
(11, '15;16', 8),
(12, '19', 10),
(13, '12', 13),
(14, '23', 5),
(15, '22', 5),
(16, '21', 5),
(17, '20', 5),
(18, '13', 5),
(19, '24', 14);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `symptom`
--
ALTER TABLE `symptom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `symptom_query`
--
ALTER TABLE `symptom_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `symptom_sickness`
--
ALTER TABLE `symptom_sickness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
