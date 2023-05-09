-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 09, 2023 lúc 03:37 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_mynghe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'manhhieu', 'nguyenhieu27022001@gmail.com', 'hieuadmin', '123456', 0),
(2, 'adminAll', 'admin@hotline.com', 'AdminALL', '123456789', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) UNSIGNED NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(3, 'Làng nghề Vạn Điểm'),
(4, 'Làng nghề Hữu Bằng'),
(5, 'Làng nghề Thượng Mạo'),
(6, 'Làng nghề Châu Phong'),
(7, 'Làng nghề Chanh Thôn'),
(9, 'Làng nghề Đồng Phố'),
(10, 'Làng nghề Hạ Ninh'),
(11, 'Làng nghề Đồng Kị');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`, `stock`) VALUES
(75, 16, 'dde6kfbanljjkrsoummjmllrsi', 'Cặp Lục Bình Gỗ Hương Làng Nghề', '42000000', 1, 'b9094f20a6.jpg', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) UNSIGNED NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Tượng gỗ'),
(3, 'Trường kỉ'),
(5, 'Bàn thờ'),
(6, 'Lục bình'),
(7, 'Tủ rượu'),
(8, 'Hoành phi'),
(9, 'Câu đối'),
(10, 'Ốp trần'),
(11, 'Bàn ghế gỗ'),
(14, 'Tranh khắc gỗ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `binhluan_id` int(11) NOT NULL,
  `tenbinhluan` varchar(255) NOT NULL,
  `binhluan` text NOT NULL,
  `productId` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`binhluan_id`, `tenbinhluan`, `binhluan`, `productId`, `blog_id`, `image`) VALUES
(2, 'Mạnh Hùng', 'Sản phẩm rất chất lượng gỗ tốt nước sơn phủ đều mịn', 17, 0, ''),
(3, 'Lê Quang Linh', 'Sản phẩm hơi đắt so với mặt bằng chung .', 17, 0, ''),
(4, 'Lê Quang Linh', 'Sản phẩm hơi đắt so với mặt bằng chung .', 17, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(1, 0, 2, 'Tượng Quan Công Chống Đao Đứng Đế Đầu Rồng', '11700000', '8a64557092.png'),
(3, 0, 1, ' Tượng phật bà gỗ hương', '4199000', '1ccefc0249.png'),
(4, 4, 17, 'Hoành phi đại tự Đức Lưu Quang gỗ hương', '35000000', 'd65e4b1107.jpg'),
(8, 1, 18, 'Tượng gỗ cá chép hóa long ', '11000000', '3040eb43b9.jpg'),
(9, 1, 11, 'Trần Gỗ Công Nghiệp', '200000', '23ce5be0cb.jpg'),
(10, 1, 12, ' Tượng Quán thế âm Bồ Tát ', '1400000', 'a6d9082013.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `zipcode`, `phone`, `email`, `password`) VALUES
(1, 'Nguyễn Mạnh Hiếu', 'Bắc Sơn-Sóc Sơn-HN', '001201010059', '0335557245', 'nguyenhieu27022@gmail.com', '123456'),
(2, 'Lê Quang Linh', 'Thái Thịnh -Thái Bình', '021201013159', '0955676268', 'linhshadow111@gmail.com', '123456789'),
(3, 'TRỊNH CÔNG ĐỨC', 'Nam Sơn- Bắc Giang', '021884455599', '03586426652', 'congduc01@gmail.com', '123456'),
(4, 'Nguyễn Mạnh Hùng', 'Bắc Sơn-Sóc Sơn-HN', '0244556666514', '0356335742', 'manhhung123@gmail.com', 'hung123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(14, 1, ' Tượng phật bà gỗ hương', 2, 2, '8398000', '1ccefc0249.png', 1, '2023-03-03 09:10:45'),
(15, 2, 'Tượng Quan Công Chống Đao Đứng Đế Đầu Rồng', 2, 1, '11700000', '8a64557092.png', 1, '2023-03-03 09:11:58'),
(21, 19, 'Tượng Đạt Ma Sư Tổ Gỗ Hương Sơn Phủ Bóng', 1, 1, '7900000', '8f645069b0.jpg', 2, '2023-05-05 15:01:12'),
(22, 18, 'Tượng gỗ cá chép hóa long ', 1, 1, '11000000', '3040eb43b9.jpg', 2, '2023-05-05 15:01:12'),
(23, 12, ' Tượng Quán thế âm Bồ Tát ', 1, 1, '1400000', 'a6d9082013.png', 2, '2023-05-05 15:01:13'),
(24, 11, 'Trần Gỗ Công Nghiệp', 1, 1, '200000', '23ce5be0cb.jpg', 1, '2023-05-05 15:08:23'),
(25, 19, 'Tượng Đạt Ma Sư Tổ Gỗ Hương Sơn Phủ Bóng', 1, 1, '7900000', '8f645069b0.jpg', 0, '2023-05-08 17:41:01'),
(26, 22, 'Bàn Ghế Gỗ Salon Hương Đá Chạm Đào Tay', 1, 1, '22700000', 'e4b117c362.jpg', 0, '2023-05-08 17:41:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` tinytext NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `catId` int(11) UNSIGNED NOT NULL,
  `brandId` int(11) UNSIGNED NOT NULL,
  `product_desc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `product_quantity`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`) VALUES
(1, ' Tượng phật bà gỗ hương', 22, 1, 5, '<p><span>K&iacute;ch thước: cao 15 cm, rộng 9 cm.&nbsp;</span>Chất liệu: gỗ Hương .&nbsp;Mi&ecirc;u Tả: sản phẩm được l&agrave;m từ loại gỗ cao cấp v&agrave; qu&yacute; hiếm ( gỗ Hương). tượng phật được trạm khắc cực k&igrave; sắc xảo v&agrave; tỉ mỉ. n&eacute;t mặt tượng c&oacute; thần th&aacute;i. sản phẩm được phủ một lớp pu b&oacute;ng để chống ẩm mốc. độ bền sản phẩm tr&ecirc;n 100 năm</p>', 1, '4199000', '1ccefc0249.png'),
(2, 'Tượng Quan Công Chống Đao Đứng Đế Đầu Rồng', 17, 1, 6, '<p style=\"text-align: left;\"><span style=\"font-size: small;\">Quan C&ocirc;ng&nbsp;hay c&ograve;n được gọi l&agrave;&nbsp;Quan V&acirc;n Trương,&nbsp;Quan Vũ l&agrave; một vị tướng trong ngũ hổ tướng của nước Thục thời tam quốc.&nbsp;Quan&nbsp;C&ocirc;ng hay Quan V&acirc;n Trường lu&ocirc;n xuất hiện với h&igrave;nh ảnh kh&iacute; kh&aacute;i m&atilde;nh liệt, gương mặt cương quyết c&oacute; phần dữ dằn, mặt đỏ v&agrave; d&acirc;u d&agrave;i, tr&ecirc;n tay lu&ocirc;n cầm long đao trong tư thế sẵn s&agrave;ng. Người ta&nbsp;quan&nbsp;niệm rằng&nbsp;Tượng Quan C&ocirc;ng&nbsp;c&oacute; gương mặt c&agrave;ng dữ th&igrave; hiệu quả bảo vệ c&agrave;ng mạnh.&nbsp; Đặt Quan C&ocirc;ng tr&ecirc;n cao để Canh giữ cửa trước.&nbsp;</span></p>', 1, '11700000', '8a64557092.png'),
(5, 'Tranh khắc chữ Tâm gỗ Phúc vàng', 40, 14, 4, '<p><span style=\"font-size: small;\">Chữ &ldquo;T&acirc;m&rdquo; đại diện cho một tr&aacute;i tim lương thiện, đức độ. Biết y&ecirc;u thương con người, biết ph&acirc;n biệt thiện &aacute;c. Một t&acirc;m hồn t&iacute;ch cực, hướng đến những gi&aacute; trị vĩnh hằng. Đ&oacute; l&agrave; những phẩm chất đ&aacute;ng tr&acirc;n qu&yacute; của con người.&nbsp;</span><span style=\"font-size: small;\">Chữ &ldquo; T&acirc;m&rdquo; nhắc nhở con người phải sống ngay thẳng, thật th&agrave;. C&oacute; tấm l&ograve;ng bao dung v&agrave; thấu hiểu cho nỗi khổ của người kh&aacute;c. T&acirc;m trong s&aacute;ng th&igrave; con người mới cảm thấy thanh thản v&agrave; tĩnh tại. Nếu t&acirc;m gian dối, xấu xa th&igrave; l&ograve;ng người sẽ bất an, nặng nhọc.&nbsp;</span><span style=\"font-size: small;\">Trong kinh doanh chữ &ldquo;T&acirc;m&rdquo; c&ograve;n c&oacute; nghĩa l&agrave; l&agrave;m ăn trong s&aacute;ng. Kh&ocirc;ng v&igrave; lợi &iacute;ch c&aacute;c nh&acirc;n m&agrave; d&ugrave;ng thủ đoạn bất ch&iacute;nh h&atilde;m hại người kh&aacute;c. C&aacute;i t&acirc;m sẽ gi&uacute;p cho bạn được x&atilde; hội t&ocirc;n trọng, c&ocirc;ng việc ng&agrave;y c&agrave;ng th&agrave;nh c&ocirc;ng.</span></p>', 0, '699000', '6d3af44078.jpg'),
(8, 'Bàn ghế góc mặt liền gỗ sồi ', 15, 11, 5, '<p style=\"text-align: justify;\"><span>Mẫu sofa g&oacute;c ch&acirc;n quỳ gỗ sồi c&oacute; thiết kế đơn giản nhưng vẫn đảm bảo sự sang trọng v&agrave; thoải m&aacute;i cho người d&ugrave;ng. Ghế gồm c&oacute; 1 văng d&agrave;i, 1 b&agrave;n tr&agrave; v&agrave; 1 ghế con. Điểm đặc biệt của mẫu ghế n&agrave;y l&agrave; thiết kế kiểu ch&acirc;n quỳ độc đ&aacute;o v&agrave; chắc chắn. C&ugrave;ng với đ&oacute; l&agrave; ch&acirc;n chắc chắn với những đường bo xung quanh sau văng v&agrave; cục g&oacute;c rất ấn tượng v&agrave; vững ch&atilde;i.</span></p>', 0, '15000000', 'ca41e047c8.jpg'),
(9, ' Bộ Bàn Ghế Vách Tứ Quý Gỗ Gõ ', 5, 11, 9, '<p><span><span><span>Chất li&ecirc;u : Gỗ G&otilde; đỏ.&nbsp;</span></span></span>Gồm :&nbsp;1&nbsp;ghế d&agrave;i,&nbsp;1&nbsp;b&agrave;n,&nbsp;2&nbsp;ghế đơn,&nbsp;2&nbsp;đ&ocirc;n .Đ&aacute;ng ch&uacute; &yacute; của bộ ghế tất cả mặt bộ ghế g&otilde; đỏ điều d&agrave;y 2 ph&acirc;n rưỡi nguy&ecirc;n khối&nbsp;sang trọng h&agrave;ng l&agrave;m kỹ từ kh&acirc;u th&ocirc; đến ho&agrave;ng thiện&nbsp;đẹp m&ecirc; ly. Bộ b&agrave;n gh&ecirc;&nbsp;được l&agrave;m từ g&otilde; Pachi. Điều đầu ti&ecirc;n bạn củng đả nắm rỏ nguồn gốc chất lượng nhưng để l&agrave;m một bộ ghế độ bền đẹp l&acirc;u d&agrave;i theo thời gian &nbsp;th&igrave; l&agrave; điều kh&ocirc;ng hề dể d&agrave;ng, phải chọn lọc gỗ đẹp kh&ocirc;ng s&acirc;u thối, chọn c&acirc;y gỗ gi&agrave; cứng l&acirc;u năm phần mặt ghế d&agrave;i, b&agrave;n, ghế đơn, 2 đ&ocirc;n điều l&agrave;m mặt nguy&ecirc;n khối d&agrave;y 2 ph&acirc;n rưỡi&nbsp;chống cong v&ecirc;nh.&nbsp; Ch&acirc;n v&aacute;ch yếm điều l&agrave;m gi&agrave;y dặn hơn so với thị trường h&agrave;ng b&ecirc;n em đ&oacute;ng l&agrave;m rất kỹ c&agrave;ng ,được đội ngủ nh&acirc;n vi&ecirc;n kinh nghiệm chinh chiến l&acirc;u năm l&agrave;m ra những bộ b&agrave;n ghế đệp</p>', 0, '45000000', '9e90ee380a.jpg'),
(10, 'Ốp trần gỗ tự nhiên sang trọng kiểu Âu', 20, 10, 10, '<p>Chất liệu : g&otilde; xoan. Chi ph&iacute; thi c&ocirc;ng : 350.000đ/ 1m2. Do được l&agrave;m từ chất liệu tự nhi&ecirc;n n&ecirc;n trần gỗ tự nhi&ecirc;n tuyệt đối an to&agrave;n cho sức khỏe con người. Th&ecirc;m v&agrave;o đ&oacute;, gỗ tự nhi&ecirc;n được chọn l&agrave;m trần nh&agrave; đều l&agrave; loại chống mối mọt, chống ẩm v&agrave; mốc kh&aacute; tốt. Ch&iacute;nh v&igrave; vậy, ch&uacute;ng c&oacute; độ bền cơ học cao, khả năng chịu lực cũng tốt nhất trong tất cả c&aacute;c loại vật liệu.Một trong những ưu điểm kh&ocirc;ng thể bỏ qua ch&iacute;nh l&agrave; t&iacute;nh thẩm mĩ của gỗ tự nhi&ecirc;n. D&ugrave; bạn c&oacute; những vật liệu giả gỗ tốt đến thế n&agrave;o, sự tự nhi&ecirc;n trong những v&acirc;n gỗ l&agrave; kh&ocirc;ng thể thay thế ho&agrave;n to&agrave;n. Những thớ gỗ tự nhi&ecirc;n đem đến cảm gi&aacute;c ch&acirc;n thật, h&agrave;i h&ograve;a v&agrave; rất đặc biệt.</p>', 2, '300000', '0f99e17d3c.jpg'),
(11, 'Trần Gỗ Công Nghiệp', 30, 10, 6, '<p>Chi ph&iacute; thi c&ocirc;ng : 200.000đ/ 1m2.Trần gỗ c&ocirc;ng nghiệp gi&uacute;p bạn tiết kiệm kh&aacute; nhiều chi ph&iacute; khi thu mua. Mức gi&aacute; mua ph&ugrave; hợp với điều kiện kinh tế của đại đa số gia đ&igrave;nh Việt Nam. Bạn ho&agrave;n to&agrave;n c&oacute; thể sở hữu một tấm trần gỗ với mức gi&aacute; rẻ m&agrave; kh&ocirc;ng phải bỏ ra nhiều chi ph&iacute; như trần gỗ tự nhi&ecirc;n.B&ecirc;n cạnh đ&oacute;, th&agrave;nh phần tự nhi&ecirc;n cũng rất an to&agrave;n đối với con người. Trần gỗ c&ocirc;ng nghiệp hiện nay được sản xuất đa dạng mẫu m&atilde;, chủng loại, cho bạn c&oacute; nhiều lựa chọn hơn.D&ugrave; độ bền, khả năng chống chịu lực kh&ocirc;ng được đ&aacute;nh gi&aacute; cao như gỗ tự nhi&ecirc;n, nhưng vẫn đảm bảo an to&agrave;n nhất cho ng&ocirc;i nh&agrave; của bạn. Qu&aacute; tr&igrave;nh thi c&ocirc;ng trần cũng rất đơn giản, dễ d&agrave;ng, kh&ocirc;ng tốn k&eacute;m qu&aacute; nhiều chi ph&iacute;.</p>', 0, '200000', '23ce5be0cb.jpg'),
(12, ' Tượng Quán thế âm Bồ Tát ', 12, 1, 7, '<p>Quan &Acirc;m Bồ T&aacute;t l&agrave; một h&igrave;nh ảnh đẹp cho đức t&iacute;nh từ bi, đức độ v&agrave; những điều tốt l&agrave;nh. Do đ&oacute;, trong việc chơi tượng gỗ trong nh&agrave;, nhiều người kh&ocirc;ng chỉ thờ c&uacute;ng&nbsp;tượng gỗ Quan &Acirc;m&nbsp;m&agrave; c&ograve;n xem đ&acirc;y l&agrave; một qu&agrave; tặng phong thủy mang &yacute; nghĩa t&acirc;m linh tốt đẹp d&agrave;nh cho người th&acirc;n v&agrave; bạn b&egrave;.Cũng như những mẫu&nbsp;tượng gỗ phong thủy&nbsp;đẹp kh&aacute;c, tượng Phật B&agrave; Quan &Acirc;m bằng gỗ mang &yacute; nghĩa phong thủy may mắn v&agrave; tốt l&agrave;nh. Trưng b&agrave;y tượng Phật Quan &Acirc;m bằng gỗ trong nh&agrave; đ&uacute;ng c&aacute;ch sẽ mang đến t&aacute;c dụng h&oacute;a giải nạn tai, mang đến b&igrave;nh an cho gia chủ. Ngo&agrave;i ra, c&aacute;c chuy&ecirc;n gia phong thủy c&ograve;n cho rằng, thờ tượng Phật Quan &Acirc;m Bồ T&aacute;t tại gia sẽ mang đến y&ecirc;n vui cho gia đạo v&agrave; gi&uacute;p c&aacute;c th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh gặp may mắn tr&ecirc;n đường c&ocirc;ng danh, sự nghiệp.</p>\r\n<p>Chất liệu : gỗ hương</p>', 2, '1400000', 'a6d9082013.png'),
(15, 'Bộ hoành phi câu đối chữ hán son vàng', 10, 9, 7, '<p>Bộ ho&agrave;nh phi c&acirc;u đối hay chữ h&aacute;n c&oacute; phi&ecirc;n &acirc;m, dật v&agrave;ng ta 9999 đẹp nhất.Họa tiết: T&ugrave;ng ch&uacute;c c&uacute;c mai, bầu rượu t&uacute;i thơ, thượng cầm hạ th&uacute;,&hellip;Chất liệu gỗ: 100% gỗ l&otilde;i theo y&ecirc;u cầu được chọn lựa kỹ c&agrave;ng c&oacute; độ bền cao h&agrave;ng trăm năm v&agrave; đẹp theo thời gian (Chất liệu gỗ cơ sở c&oacute; thể l&agrave;m theo y&ecirc;u cầu ).K&iacute;ch thước: T&ugrave;y theo kh&ocirc;ng gian thờ c&uacute;ng v&agrave; c&aacute;c cung trong thước Lỗ Ban m&agrave; chọn sao cho ph&ugrave; hợp với phong thủy v&agrave; mỹ phẩm..</p>', 1, '8000000', 'be7ad2acaa.jpg'),
(16, 'Cặp Lục Bình Gỗ Hương Làng Nghề', 12, 6, 6, '<p style=\"text-align: left;\"><span style=\"font-size: large; font-family: \'times new roman\', times;\">Trong Phong Thủy&nbsp;Lục B&igrave;nh&nbsp;c&oacute; t&aacute;c dụng rất lớn l&agrave; vật phẩm kh&ocirc;ng thể thiếu trong những gia đ&igrave;nh đam m&ecirc; đồ gỗ. Lục b&igrave;nh vừa c&oacute; t&aacute;c dụng phong thuỷ gi&uacute;p trấn trạch v&agrave; thu giữ t&agrave;i lộc rất tốt. vừa c&oacute; t&aacute;c dụng trang tr&iacute; tuyệt vời. Về mặt phong thuỷ, miệng Lục B&igrave;nh loe ra thu h&uacute;t vượng kh&iacute; v&agrave; t&agrave;i lộc cho gia chủ sử dụng ;Th&acirc;n b&igrave;nh ph&igrave;nh ra để chứa đựng t&agrave;i sản của cải, kh&iacute; tốt v&agrave; miệng thắ lại để bảo vệ t&agrave;i sản, may mắn v&agrave; T&agrave;i lộc cho gia chủ.K&iacute;ch thước : cao 2 m đường k&iacute;nh 60 cm.Chất liệu : gỗ hương nguy&ecirc;n khối.</span></p>', 0, '42000000', 'b9094f20a6.jpg'),
(18, 'Tượng gỗ cá chép hóa long ', 10, 1, 4, '<p><span style=\"font-size: large; font-family: \'times new roman\', times;\">H&igrave;nh ảnh c&aacute; ch&eacute;p h&oacute;a rồng được xuất hiện rất nhiều trong d&acirc;n gian việt nam qua c&aacute;c loại h&igrave;nh như tượng gỗ, tượng đ&aacute;, tranh, ảnh. Ngo&agrave;i những gi&aacute; trị thẩm mỹ, b&ecirc;n trong h&igrave;nh ảnh n&agrave;y c&ograve;n h&agrave;m chứa những &yacute; nghĩa v&agrave; gi&aacute; trị phong thủy v&ocirc; c&ugrave;ng gi&aacute; trị. Biểu tượng c&aacute; ch&eacute;p h&oacute;a long ( hay c&ograve;n gọi l&agrave; c&aacute; ch&eacute;p h&oacute;a rồng ) như một sự nhắc nhở mọi người lu&ocirc;n biết cố gắng phấn đấu, ki&ecirc;n tr&igrave; đến c&ugrave;ng để đạt được những th&agrave;nh c&ocirc;ng. Trưng b&agrave;y tượng c&aacute; ch&eacute;p h&oacute;a rồng rất hữu dụng cho học sinh, sinh vi&ecirc;n khi sắp trải qua kỳ thi hoặc những người đang phải chuẩn bị cho những việc quan trọng.</span></p>', 0, '11000000', '3040eb43b9.jpg'),
(19, 'Tượng Đạt Ma Sư Tổ Gỗ Hương Sơn Phủ Bóng', 21, 1, 11, '<p><span style=\"font-family: \'times new roman\', times; font-size: large;\">Sư Tổ Đạt Ma&nbsp;(hay c&ograve;n gọi l&agrave;&nbsp;Bổ Đề Đạt Ma) l&agrave; Đức Phật thứ 28 của nh&agrave; Phật. Tương truyền ng&agrave;i c&oacute; c&ocirc;ng rất lớn trong việc truyền thụ c&aacute;c gi&aacute;o l&yacute; của nh&agrave; phật tới c&aacute;c ch&uacute;ng sinh tr&ecirc;n thế giới, nhất l&agrave; tại Trung Quốc. Trong văn h&oacute;a t&acirc;m linh của Việt Nam th&igrave; nhiều người cũng thờ tự hoặc đặt tượng Đạt Ma Sư Tổ v&agrave; c&aacute;c bức tượng gỗ của ng&agrave;i thường được khắc họa dựa tr&ecirc;n c&aacute;c sự t&iacute;ch tr&ecirc;n con đường truyền gi&aacute;o.</span></p>', 1, '7900000', '8f645069b0.jpg'),
(22, 'Bàn Ghế Gỗ Salon Hương Đá Chạm Đào Tay', 17, 11, 7, '<p style=\"text-align: justify;\" dir=\"ltr\"><span style=\"font-family: \'times new roman\', times; font-size: large;\">Đầu ti&ecirc;n,&nbsp;bộ b&agrave;n ghế gỗ gi&aacute; rẻ&nbsp;n&agrave;y được ho&agrave;n thiện từ gỗ hương đ&aacute; tự nhi&ecirc;n l&acirc;u năm. Từng khối gỗ sẽ được cắt xẻ, đục chạm v&agrave; m&agrave;i nhẵn, sau đ&oacute; được gh&eacute;p nối với nhau để tạo n&ecirc;n một tổng thể ho&agrave;n chỉnh. Từng chi tiết được ho&agrave;n thiện một c&aacute;ch tỉ mỉ, kỹ lưỡng nhất với đ&ocirc;i tay đầy t&agrave;i hoa kh&eacute;o l&eacute;o đội ngũ thợ thủ c&ocirc;ng đ&atilde; ho&agrave;n thiện thẩm mỹ sản phẩm đến mức cao nhất. Chất lượng v&agrave; gi&aacute; trị đến từng chi tiết.&nbsp;Gỗ hương đ&aacute;&nbsp;đem đến cho bộ b&agrave;n ghế vẻ đẹp độc đ&aacute;o v&agrave; mới lạ m&agrave; hiếm sản phẩm n&agrave;o c&oacute; được. T&ocirc;ng m&agrave;u v&agrave;ng n&acirc;u hiện diện mặt gỗ được m&agrave;i nhẵn, xen lẫn từng đường v&acirc;n gỗ gợn s&oacute;ng uốn lượn tự nhi&ecirc;n như v&acirc;n đ&aacute; qu&yacute; sắc n&eacute;t. M&agrave;u sắc trang nh&atilde;, ấm &aacute;p vừa mộc mạc theo lối xưa, lại v&ocirc; c&ugrave;ng sang chảnh l&ocirc;i cuốn sự ch&uacute; &yacute; của kh&aacute;ch h&agrave;ng. Từng hoa văn được chăm ch&uacute;t kỳ c&ocirc;ng đến từng đường n&eacute;t, từng g&oacute;c cạnh nhỏ nhất. Những đường n&eacute;t thanh tho&aacute;t uyển chuyển được t&ocirc; điểm bằng c&aacute;c chi tiết đi&ecirc;u khắc chạm nổi tạo n&ecirc;n c&aacute;c điểm nhấn nổi bật mang chuẩn mực của phong c&aacute;ch cổ điển.&nbsp;&nbsp;Đỉnh ghế được chạm trổ họa tiết đ&agrave;o ti&ecirc;n, lưng ghế chạm tứ qu&yacute;: t&ugrave;ng - mai - c&uacute;c - tr&uacute;c v&agrave; hoa sen. Mỗi loại c&acirc;y cỏ hoa l&aacute; lại được t&ocirc; điểm bằng c&aacute;c lo&agrave;i chim ch&oacute;c kh&aacute;c nhau vẽ ra một bức tranh sinh động về c&aacute;c m&ugrave;a trong năm mang theo &yacute; nghĩa ch&uacute;c ph&uacute;c cho sự an l&agrave;nh, may mắn v&agrave; t&agrave;i vận cho gia chủ trong suốt cả năm.&nbsp;</span></p>\r\n<p style=\"text-align: justify;\" dir=\"ltr\"><span style=\"font-family: \'times new roman\', times; font-size: large;\">Ở giữa c&aacute;c bức tranh thi&ecirc;n nhi&ecirc;n ấy l&agrave; biểu tượng tam t&agrave;i. Tiền xu tam t&agrave;i đại diện cho thi&ecirc;n thời - địa lợi - nh&acirc;n h&ograve;a như một lời ch&uacute;c về con đường c&ocirc;ng danh, t&agrave;i lộc sẽ lu&ocirc;n được su&ocirc;n sẻ, thuận lợi.&nbsp;</span></p>', 2, '22700000', 'e4b117c362.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_image`, `type`) VALUES
(1, 'slider 1', '547b0ef180.png', 1),
(2, 'slider 2', '350d6db643.png', 1),
(3, 'slider 3', '898ab2f9fc.png', 1),
(4, 'slider 4', '4921267bf1.jpg', 0),
(6, 'slider 6', '883220845b.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(5, 1, 18, 'Tượng gỗ cá chép hóa long ', '11000000', '3040eb43b9.jpg'),
(6, 1, 11, 'Trần Gỗ Công Nghiệp', '200000', '23ce5be0cb.jpg'),
(7, 1, 16, 'Cặp Lục Bình Gỗ Hương Làng Nghề', '42000000', 'b9094f20a6.jpg'),
(8, 1, 22, 'Bàn Ghế Gỗ Salon Hương Đá Chạm Đào Tay', '22700000', 'e4b117c362.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `productId` (`productId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`binhluan_id`),
  ADD UNIQUE KEY `binhluan_id` (`binhluan_id`);

--
-- Chỉ mục cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`,`productId`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `catId` (`catId`,`brandId`),
  ADD KEY `brandId` (`brandId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `productId_2` (`productId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Chỉ mục cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`,`productId`),
  ADD KEY `productId` (`productId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `binhluan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `tbl_category` (`catId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`brandId`) REFERENCES `tbl_brand` (`brandId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD CONSTRAINT `tbl_wishlist_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`),
  ADD CONSTRAINT `tbl_wishlist_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
