-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 07, 2023 lúc 02:09 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `housewares`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `andress` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `data_order` text COLLATE utf8_unicode_ci NOT NULL,
  `total_bill` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `fullname`, `andress`, `phone`, `date_order`, `data_order`, `total_bill`, `username`, `id_status`) VALUES
(3, 'Nguyen B', 'TN', 21353, '2023-02-09', '{\"1\":{\"cart_data\":{\"id_product\":\"3\",\"title\":\"Bát gỗ\",\"price\":\"60000\",\"img\":\"chen-go-10cm-4-mekoong-1.jpg\",\"quantity\":7,\"total_price\":420000}},\"2\":{\"cart_data\":{\"id_product\":\"1\",\"title\":\"Ấm đun siêu tốc Lock&Lock 1.5L\",\"price\":\"1250000\",\"img\":\"am.png\",\"quantity\":\"1\",\"total_price\":1250000}}}', 1670000, 'user', 3),
(4, 'Nguyen B', 'TN', 21353, '2023-02-15', '[{\"cart_data\":{\"id_product\":\"3\",\"title\":\"Bát gỗ\",\"price\":\"60000\",\"img\":\"chen-go-10cm-4-mekoong-1.jpg\",\"quantity\":\"2\",\"total_price\":120000}}]', 120000, 'user', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cart_detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `cart_detail`, `username`) VALUES
(14, '[{\"cart_data\":{\"id_product\":\"3\",\"title\":\"Bát gỗ\",\"price\":\"60000\",\"img\":\"chen-go-10cm-4-mekoong-1.jpg\",\"quantity\":\"1\",\"total_price\":60000}}]', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Đồ gỗ gia dụng'),
(2, 'Đồ thủy tinh'),
(3, 'Đồ Inox gia dụng'),
(4, 'Đồ điện gia dụng'),
(6, 'Đồ dùng gia đình'),
(7, 'Đồ gia dụng thông minh'),
(8, 'Đồ nhựa gia dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descrip` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `descrip`, `img`, `price`, `id_category`) VALUES
(1, 'Ấm đun siêu tốc Lock&Lock 1.5L', 'Ấm đun siêu tốc Lock&Lock 1.5L là sản phẩm điện tử gia dụng trong gian bếp không thể thiếu ở mỗi gia đình ngày nay . Với hiệu quả đun nước nhanh, tiết kiệm điện năng, an toàn sức khỏe thì ấm siêu tốc Lock and lock luôn được người dùng tìm kiếm và sở hữu phổ biến. Đến tại Siêu Thị Mekoong có trưng bày các sản phẩm Ấm đun siêu tốc Lock&Lock 1.5L – Màu bạc – EJK115SLV cùng nhiều đồ gia dụng giá rẻ được nhiều khách hàng mua sắm hoặc đặt ngay trên website Mekoong.com với nhiều mặt hàng sản phầm dành cho gia đình – doanh nghiệp.', '[\"am.png\",\"am1.jpg\"]', 1250000, 4),
(3, 'Bát gỗ', '', '[\"chen-go-10cm-4-mekoong-1.jpg\",\"chen-kieu-loai-nho-3-mekoong-1.jpg\"]', 60000, 1),
(6, 'Lò vi sóng điện tử Sharp', 'Lò vi sóng điện tử Sharp R-25D1(S)VN 22 lít là sản phẩm đồ điện gia dụng được nhiều khách hàng lựa chọn cho việc nấu nướng cho gia đình, nhà hàng trở nên nhanh chóng. Với Lò vi sóng điện tử Sharp R-25D1(S)VN 22 lít này, bạn có thể nấu, nướng và hâm nóng nhiều món ăn khác nhau chỉ trong vài phút, đây là đồ bếp cực kỳ ưu việt được mọi người tin dùng. Bạn có thể mua các sản phẩm Thiết Bị Bếp và nhiều sản phẩm đồ gia dụng tại cửa hàng đại lý, siêu thị mini của Mekoong không chỉ là sản phẩm tn1} mà còn nhiều các loại lò microwave khác bởi nhiều thương hiệu nổi tiếng khác năm trong bộ sưu tập lò vi sóng cảm ứng được mekoong cung cấp trên toàn quốc.', '[\"lovisong1.jpg\",\"lovisong2.jpg\"]', 8000000, 4),
(7, 'Muỗng Gỗ Beech Búp Sen Nhỏ', 'Mua ngay Muỗng Gỗ Beech Búp Sen Nhỏ tại các hệ thống siêu thị, cửa hàng, đại lý uy quyền của Mekoong với các sản phẩm đồ gia dụng chất lượng chính hãng giá tốt.', '[\"muong.jpg\",\"muong2.jpg\"]', 18000, 1),
(8, 'Thớt chữ nhật có tay cầm loại nhỏ', 'Mua ngay Thớt chữ nhật có tay cầm loại nhỏ tại các hệ thống siêu thị, cửa hàng, đại lý uy quyền của Mekoong với các sản phẩm đồ gia dụng chất lượng chính hãng giá tốt.', '[\"thot1.jpg\",\"thot2.jpg\"]', 70000, 1),
(9, 'Thớt gỗ chữ nhật lớn có rãnh', '', '[\"thotvuong.jpg\",\"thotvuong2.jpg\"]', 170000, 1),
(10, 'Lò vi sóng điện tử có nướng Sharp', 'Lò vi sóng điện tử có nướng Sharp R-G272VN-S 20 lít là sản phẩm đồ điện gia dụng được nhiều khách hàng lựa chọn cho việc nấu nướng cho gia đình, nhà hàng trở nên nhanh chóng', '[\"lovi1.jpg\",\"lovi2.jpg\"]', 3500000, 4),
(11, 'Máy Vắt Cam Thương Hiệu', 'Máy Vắt Cam Thương Hiệu Lock&Lock -700ml được làm bằng nhựa PP, ABS bền đẹp, chắc chắn. Chất liệu nhựa nhẹ, dễ vệ sinh sau khi sử dụng. Máy có công suất 40W cho khả năng hoạt động ổn định, êm ái và không tốn nhiều điện năng.', '[\"vat1.jpg\",\"vat2.jpg\"]', 350000, 4),
(12, 'Nồi chiên không dầu Lock and Lock', 'Nồi chiên không dầu Lock&Lock 3.0L Màu đen – EJF276 sở hữu kiểu dáng hiện đại, màu sắc phối kết hợp tinh tế. Phù hợp sử dụng trong mọi không gian nội thất nhà bếp. Điều khiển cơ bền bỉ, có vỏ ngoài được làm từ chất liệu nhựa bền đẹp. Chịu nhiệt tốt và dễ dàng lau chùi khi bị bám bẩn.', '[\"chien1.jpg\",\"chien2.jpg\"]', 4000000, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `content_reviews` text COLLATE utf8_unicode_ci NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `date_review` date DEFAULT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `rate`, `content_reviews`, `username`, `date_review`, `id_product`) VALUES
(5, 3, 'test', 'user', '2023-03-02', 7),
(7, 4, 'Test Comment San pham', 'user', '2023-03-02', 7),
(9, 4, 'Test Review product', 'user', '2023-03-02', 7),
(10, 4, 'Sản phẩm ok', 'tet', '2023-03-03', 8),
(11, 5, 'Rất tuyệt vời', 'tet', '2023-03-03', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `title`) VALUES
(1, 'Quản lí'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_bill`
--

CREATE TABLE `status_bill` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status_bill`
--

INSERT INTO `status_bill` (`id`, `title`) VALUES
(1, 'Chờ xử lý'),
(2, 'Đang xử lý'),
(3, 'Hoàn thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `pass` text COLLATE utf8_unicode_ci NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `andress` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `fullname`, `andress`, `phone`, `id_role`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, 1),
(2, 'user', '123456789', 'Nguyen B', 'TN', 21353, 2),
(3, 'test12', '123456789', NULL, NULL, NULL, 2),
(4, 'tet', '12345678', 'Nguyen AS', 'test', 2342545, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_bill`
--
ALTER TABLE `status_bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `status_bill`
--
ALTER TABLE `status_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
