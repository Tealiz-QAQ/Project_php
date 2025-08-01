-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2025 at 05:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `motasanpham` varchar(500) NOT NULL,
  `soluong` int(5) NOT NULL,
  `price` int(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `motasanpham`, `soluong`, `price`, `image`, `brand`) VALUES
(1, 'Cân điện tử SF400', 'Cân điện tử SF400 với độ chính xác cao, tiện lợi cho làm bánh và nấu ăn.', 20, 97000, 'sf400.jpg', 'dungcu'),
(2, 'Bàn xoay', 'Bàn xoay giúp trang trí bánh dễ dàng và chuyên nghiệp hơn.', 37, 250000, 'banxoay.jpg', 'dungcu'),
(3, 'Bột làm bánh', 'Bột làm bánh chất lượng cao, phù hợp cho nhiều loại bánh khác nhau.', 56, 350000, 'botlambanh.jpg', 'nguyenlieu'),
(18, 'Bột mì đa dụng', 'Bột mì đa dụng thích hợp cho cả bánh ngọt và bánh mì.', 65, 50000, 'botmi.jpg', 'nguyenlieu'),
(19, 'Đường kính', 'Đường kính trắng tinh khiết dùng để làm bánh, nấu ăn.', 79, 30000, 'duongkinh.jpg', 'nguyenlieu'),
(20, 'Bơ nhạt', 'Bơ nhạt dùng để tạo độ béo và thơm cho món bánh.', 49, 60000, 'bonhat.jpg', 'nguyenlieu'),
(21, 'Sữa tươi', 'Sữa tươi nguyên chất, tạo độ mềm và thơm ngon cho bánh.', 98, 20000, 'suatươi.jpg', 'phache'),
(22, 'Trứng gà', 'Trứng gà tươi, thành phần không thể thiếu trong làm bánh.', 85, 15000, 'trunggà.jpg', 'nguyenlieu'),
(23, 'Bột nở', 'Bột nở giúp bánh nở đều và xốp hơn khi nướng.', 75, 20000, 'botno.jpg', 'nguyenlieu'),
(24, 'Vanilla', 'Hương Vanilla tạo mùi thơm đặc trưng cho các món bánh.', 45, 25000, 'vanilla.jpg', 'phache'),
(25, 'Socola đen', 'Socola đen nguyên chất, phù hợp để làm bánh hoặc ăn trực tiếp.', 29, 70000, 'socola_den.jpg', 'phache'),
(26, 'Hạnh nhân', 'Hạnh nhân lát hoặc nguyên hạt, tăng vị béo giòn cho bánh.', 60, 80000, 'hanhnhan.jpg', 'nguyenlieu'),
(27, 'Nho khô', 'Nho khô không hạt, thêm vị ngọt tự nhiên cho bánh.', 55, 35000, 'nhokho.jpg', 'phache'),
(28, 'Khuôn bánh tròn', 'Khuôn bánh tròn chống dính, dễ dàng lấy bánh sau khi nướng.', 20, 120000, 'kuon_banh.jpg', 'dungcu'),
(29, 'Cân điện tử', 'Cân điện tử nhỏ gọn, phù hợp đo lường nguyên liệu chính xác.', 30, 80000, 'can_dientu.jpg', 'dungcu'),
(30, 'Bàn xoay', 'Bàn xoay chuyên dụng, hỗ trợ trang trí bánh kem nhanh chóng.', 25, 250000, 'ban_xoay.jpg', 'dungcu'),
(31, 'Phới lồng', 'Phới lồng dùng để trộn bột, đánh trứng hiệu quả.', 80, 15000, 'phoilong.jpg', 'dungcu'),
(32, 'Máy đánh trứng', 'Máy đánh trứng đa năng, tiết kiệm thời gian và công sức.', 15, 500000, 'may_danh_trung.jpg', 'dungcu'),
(33, 'Thìa đong', 'Thìa đong định lượng nguyên liệu chính xác.', 60, 10000, 'thiadong.jpg', 'dungcu'),
(34, 'Dao cắt bánh', 'Dao cắt bánh sắc bén, tạo lát cắt đều và đẹp.', 70, 30000, 'dao_cat_banh.jpg', 'dungcu'),
(35, 'Khay nướng', 'Khay nướng kim loại chất lượng cao, dẫn nhiệt đều.', 45, 70000, 'khay_nuong.jpg', 'dungcu'),
(36, 'Bộ dụng cụ trang trí bánh', 'Bộ dụng cụ trang trí bánh gồm túi và đầu bắt kem.', 10, 200000, 'dungcu_trangtri.jpg', 'trangtri'),
(37, 'Nhiệt kế lò nướng', 'Nhiệt kế đo chính xác nhiệt độ lò nướng để kiểm soát quá trình nướng.', 35, 60000, 'nhietke.jpg', 'dungcu'),
(38, 'Kem tươi', 'Kem tươi dạng lỏng, dùng làm topping hoặc nguyên liệu.', 85, 40000, 'kem_tươi.jpg', 'phache'),
(39, 'Socola trang trí', 'Socola trang trí đẹp mắt, làm tăng sự hấp dẫn cho bánh.', 65, 50000, 'socola_trangtri.jpg', 'trangtri'),
(40, 'Đường bột', 'Đường bột mịn dùng để rắc lên mặt bánh hoặc làm kem.', 50, 20000, 'duong_bot.jpg', 'nguyenlieu'),
(41, 'Trái cây tươi', 'Trái cây tươi dùng để trang trí hoặc pha chế', 40, 30000, 'traicay.jpg', 'nguyenlieu'),
(42, 'Hạt dẻ cười', 'Hạt dẻ cười là nguyên liệu ăn kèm hoặc trang trí món ăn', 30, 60000, 'hat_de_cuoi.jpg', 'nguyenlieu'),
(43, 'Kẹo màu', 'Kẹo màu dùng để trang trí bánh hoặc món tráng miệng', 55, 15000, 'keo_mau.jpg', 'nguyenlieu'),
(44, 'Bột màu thực phẩm', 'Bột màu thực phẩm dùng để tạo màu cho bánh và đồ ăn', 35, 25000, 'bot_mau.jpg', 'nguyenlieu'),
(45, 'Nến sinh nhật', 'Nến sinh nhật nhiều màu sắc để trang trí bánh sinh nhật', 90, 10000, 'nen_sinhnhat.jpg', 'trangtri'),
(46, 'Giấy ăn trang trí', 'Giấy ăn in hoa văn đẹp mắt dùng trang trí bàn tiệc', 20, 20000, 'giay_an.jpg', 'trangtri'),
(47, 'Ruy băng', 'Ruy băng màu dùng để trang trí hộp quà hoặc bánh', 25, 30000, 'ruy_bang.jpg', 'trangtri'),
(48, 'Máy xay sinh tố', 'Máy xay sinh tố công suất lớn dùng để xay nguyên liệu', 10, 300000, 'may_xay.jpg', 'dungcu'),
(49, 'Bình đong', 'Bình đong đo lường nguyên liệu lỏng hoặc bột', 45, 15000, 'binh_dong.jpg', 'dungcu'),
(50, 'Thìa khuấy', 'Thìa khuấy dùng để trộn nguyên liệu trong pha chế hoặc nấu ăn', 80, 10000, 'thia_khuay.jpg', 'dungcu'),
(51, 'Cốc đo', 'Cốc đo có vạch chia dùng để đo lường nguyên liệu chính xác', 85, 20000, 'coc_do.jpg', 'dungcu'),
(52, 'Bát trộn', 'Bát trộn dung tích lớn để trộn bột hoặc nguyên liệu khác', 60, 25000, 'bat_tron.jpg', 'dungcu'),
(53, 'Máy trộn bột', 'Máy trộn bột đa năng dùng cho làm bánh và nhà hàng', 12, 600000, 'may_tron_bot.jpg', 'dungcu'),
(54, 'Mũi khoan trộn', 'Mũi khoan trộn hỗ trợ khuấy đều nguyên liệu dạng lỏng hoặc bột', 18, 30000, 'mui_khoan.jpg', 'dungcu'),
(55, 'Cây cán bột', 'Cây cán bột bằng gỗ hoặc inox dùng trong làm bánh', 50, 20000, 'cay_can.jpg', 'dungcu'),
(56, 'Bộ lọc bột', 'Bộ lọc bột giúp rây bột mịn đều trước khi trộn', 40, 15000, 'bo_loc_bot.jpg', 'dungcu'),
(57, 'Bộ ly đo lường', 'Bộ ly đo lường có nhiều kích thước để đo nguyên liệu chính xác', 70, 25000, 'ly_do.jpg', 'dungcu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `registration_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email_id`, `first_name`, `last_name`, `phone`, `address`, `registration_time`, `username`, `password`, `role`) VALUES
(67, '1@GMAIL.COM', 'Sham', 'das', '0123456789', 'Hà Nội, Việt Nam', '2025-08-01 07:37:32', 'admin', '1', 'admin'),
(68, 'trunghttq1@gmail.com', 'Trung', 'Nguyễn Bảo', '0912345678', 'TP.HCM, Việt Nam', '2025-08-01 07:37:43', 'trung', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
(69, '2@gmail.com', '2', '2', '0987654321', 'Đà Nẵng, Việt Nam', '2025-08-01 07:37:53', 'user1', 'c81e728d9d4c2f636f067f89cc14862c', 'user'),
(70, '3@gmail.com', '1', '1', '0900000000', 'Cần Thơ, Việt Nam', '2025-08-01 07:38:01', 'user3', 'c4ca4238a0b923820dcc509a6f75849b', 'admin'),
(71, 'tra@gmail.com', 'Nguyễn', 'Trà', '0333333333', 'Hải Phòng, Việt Nam', '2025-08-01 10:17:34', 'tra', 'cfac4e0dc47d98414cf373a2f09d28a1', 'admin'),
(72, '', 'Trà', 'Nguyễn', '0904062055', 'Cẩm Phả, Quảng Ninh', '2025-08-01 14:28:25', '(⁠◕⁠ᴗ⁠◕⁠✿⁠)', 'cfac4e0dc47d98414cf373a2f09d28a1', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users_products`
--

CREATE TABLE `users_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `status` enum('Added To Cart','Confirmed') NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_products`
--
ALTER TABLE `users_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users_products`
--
ALTER TABLE `users_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_products`
--
ALTER TABLE `users_products`
  ADD CONSTRAINT `users_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_products_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
