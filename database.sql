-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for at130958_xdwat
CREATE DATABASE IF NOT EXISTS `at130958_xdwat` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `at130958_xdwat`;

-- Dumping structure for table at130958_xdwat.71_nguyenthactuyen_books
CREATE TABLE IF NOT EXISTS `71_nguyenthactuyen_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `amount` float NOT NULL,
  `price` float NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table at130958_xdwat.71_nguyenthactuyen_books: ~8 rows (approximately)
/*!40000 ALTER TABLE `71_nguyenthactuyen_books` DISABLE KEYS */;
INSERT INTO `71_nguyenthactuyen_books` (`id`, `category_id`, `name`, `author`, `year`, `publisher`, `content`, `amount`, `price`, `image`, `created_at`, `updated_at`) VALUES
	(1, 3, 'Giáo Trình Lập Trình Android112312312', 'Lê Hoàng Sơn, Nguyễn Thọ Thông', '2020', 'NXB Xây Dựng', 'Lập trình Android', 0, 70000, 'assets/images/books/Giáo Trình Lập Trình Android.jpg', '2020-10-23 02:10:49', '2020-10-24 11:51:56'),
	(2, 3, 'Giáo Trình Hệ Thống Viễn Thông', 'Vũ Văn Yêm', '2020', 'NXB Bách khoa Hà Nội', '', 0, 83600, 'assets/images/books/Giáo Trình Hệ Thống Viễn Thông.jpg', '2020-10-23 03:44:44', '2020-10-24 10:58:55'),
	(3, 3, 'Giáo Trình Ngôn Ngữ Lập Trình C', 'Lê Chí Luận (Chủ biên) - Lê Trung Kiên', '2020', 'NXB Khoa học tự nhiên và công nghệ', '', 100, 121550, 'assets/images/books/Giáo Trình Ngôn Ngữ Lập Trình C.jpg', '2020-10-23 09:21:12', '2020-10-23 09:53:05'),
	(6, 7, 'Đọc Và Phân Tích Báo Cáo Tài Chính, Báo Cáo Quyết Toán Đơn Vị Hành Chính, Sự Nghiệp', 'TS. Nguyễn Thị Thanh', '2019', 'NXB Chính trị Quốc gia', '', 10, 59500, 'assets/images/books/Đọc Và Phân Tích Báo Cáo Tài Chính, Báo Cáo Quyết Toán Đơn Vị Hành Chính, Sự Nghiệp.jpg', '2020-10-23 10:07:44', '2020-10-24 10:58:49'),
	(7, 7, 'Đầu Tư Tài Chính', 'BODIE – KANE – MARCUS', '2019', 'NXB Kinh tế TPHCM', '', 50, 593000, 'assets/images/books/Đầu Tư Tài Chính.jpg', '2020-10-23 10:10:11', '2020-10-23 10:10:11'),
	(8, 7, 'Ngày Đòi Nợ - Payback Time', 'Phil Town', '2017', 'NXB Văn Hóa - Văn Nghệ', '', 10, 299000, 'assets/images/books/Ngày Đòi Nợ - Payback Time.jpg', '2020-10-23 10:12:30', '2020-10-24 10:58:44'),
	(9, 5, 'Ngôi Nhà Ở Làng Quê', 'Aleksei Varlamov', '2020', 'NXB Phụ Nữ', '', 10, 80750, 'assets/images/books/Ngôi Nhà Ở Làng Quê.jpg', '2020-10-23 10:26:25', '2020-10-23 10:26:25'),
	(10, 3, 'Thiết Kế Mạng Intranet', 'Phạm Huy Hoàng', '2019', 'NXB Bách khoa Hà Nội', '', 10, 182450, 'assets/images/books/Thiết Kế Mạng Intranet.jpg', '2020-10-23 10:28:54', '2020-10-24 10:58:41'),
	(11, 5, 'Ngày Trở Về', 'Trần Thị Thắng', '2020', 'NXB Thanh Niên', '', 50, 63200, 'assets/images/books/Ngày Trở Về.jpg', '2020-10-23 10:31:15', '2020-10-23 10:31:15'),
	(12, 5, 'Quán Gò Đi Lên', 'Nguyễn Nhật Ánh', '2019', 'NXB Trẻ', '', 0, 63750, 'assets/images/books/Quán Gò Đi Lên.jpg', '2020-10-23 10:33:04', '2020-10-24 10:41:12');
/*!40000 ALTER TABLE `71_nguyenthactuyen_books` ENABLE KEYS */;

-- Dumping structure for table at130958_xdwat.71_nguyenthactuyen_categories
CREATE TABLE IF NOT EXISTS `71_nguyenthactuyen_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table at130958_xdwat.71_nguyenthactuyen_categories: ~4 rows (approximately)
/*!40000 ALTER TABLE `71_nguyenthactuyen_categories` DISABLE KEYS */;
INSERT INTO `71_nguyenthactuyen_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(3, 'Sách Giáo trình', 'qeqeq', '2020-10-21 13:28:28', '2020-10-21 13:28:28'),
	(5, 'Sách Văn học - Tiểu thuyết', 'aqeqeqeqeq', '2020-10-21 13:29:12', '2020-10-23 10:24:19'),
	(7, 'Sách Kinh tế', 'tqtqqtqt', '2020-10-21 13:31:38', '2020-10-23 10:03:35');
/*!40000 ALTER TABLE `71_nguyenthactuyen_categories` ENABLE KEYS */;

-- Dumping structure for table at130958_xdwat.71_nguyenthactuyen_rights
CREATE TABLE IF NOT EXISTS `71_nguyenthactuyen_rights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table at130958_xdwat.71_nguyenthactuyen_rights: ~11 rows (approximately)
/*!40000 ALTER TABLE `71_nguyenthactuyen_rights` DISABLE KEYS */;
INSERT INTO `71_nguyenthactuyen_rights` (`id`, `role_id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 11, 'Thêm mới người dùng', '2020-10-22 13:15:50', '2020-10-22 13:52:03'),
	(11, 11, 'Sửa thông tin người dùng', '2020-10-22 13:49:17', '2020-10-22 13:49:17'),
	(12, 11, 'Xóa người dùng', '2020-10-22 13:49:57', '2020-10-22 13:49:57'),
	(13, 11, 'Thêm quyền người dùng', '2020-10-22 13:50:34', '2020-10-22 14:13:00'),
	(16, 11, 'Xóa quyền người dùng', '2020-10-22 14:11:55', '2020-10-22 14:13:15'),
	(17, 13, 'Thêm mới sách', '2020-10-22 16:37:38', '2020-10-22 16:38:02'),
	(18, 13, 'Sửa thông tin sách', '2020-10-22 16:37:55', '2020-10-22 16:37:55'),
	(19, 13, 'Xóa sách', '2020-10-22 16:38:14', '2020-10-22 16:38:14'),
	(20, 13, 'Thêm mới thể loại sách', '2020-10-22 16:38:33', '2020-10-22 16:38:33'),
	(21, 13, 'Sửa thông tin thể loại sách', '2020-10-22 16:38:50', '2020-10-22 16:38:50'),
	(22, 13, 'Xóa thể loại sách', '2020-10-22 16:39:07', '2020-10-22 16:39:07'),
	(23, 14, 'Mượn sách', '2020-10-22 16:39:52', '2020-10-22 16:39:52'),
	(24, 14, 'Thêm mới phiếu mượn', '2020-10-22 16:40:14', '2020-10-22 16:40:14'),
	(25, 14, 'Xóa phiếu mượn', '2020-10-23 12:25:38', '2020-10-23 12:25:38'),
	(26, 14, 'Sửa phiếu mượn', '2020-10-24 08:40:13', '2020-10-24 08:40:13');
/*!40000 ALTER TABLE `71_nguyenthactuyen_rights` ENABLE KEYS */;

-- Dumping structure for table at130958_xdwat.71_nguyenthactuyen_roles
CREATE TABLE IF NOT EXISTS `71_nguyenthactuyen_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table at130958_xdwat.71_nguyenthactuyen_roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `71_nguyenthactuyen_roles` DISABLE KEYS */;
INSERT INTO `71_nguyenthactuyen_roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(11, 'Quản trị viên', 'Thêm, sửa, xóa người dùng, quyền người dùng', '2020-10-22 10:56:25', '2020-10-22 10:56:25'),
	(13, 'Thủ thư', 'Thêm, sửa, xóa Sách;  Thêm, sửa, xóa Thể loại Sách', '2020-10-22 11:03:33', '2020-10-22 16:36:24'),
	(14, 'Sinh viên, cán bộ, giảng viên', 'Mượn sách, Thêm, sửa, xóa Phiếu mượn', '2020-10-22 11:05:22', '2020-10-22 11:05:22');
/*!40000 ALTER TABLE `71_nguyenthactuyen_roles` ENABLE KEYS */;

-- Dumping structure for table at130958_xdwat.71_nguyenthactuyen_tickets
CREATE TABLE IF NOT EXISTS `71_nguyenthactuyen_tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '-1',
  `borrow_date` datetime DEFAULT NULL,
  `return_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table at130958_xdwat.71_nguyenthactuyen_tickets: ~2 rows (approximately)
/*!40000 ALTER TABLE `71_nguyenthactuyen_tickets` DISABLE KEYS */;
INSERT INTO `71_nguyenthactuyen_tickets` (`id`, `user_id`, `status`, `borrow_date`, `return_date`, `created_at`, `updated_at`) VALUES
	(12, 6, -1, NULL, NULL, '2020-10-23 12:05:16', '2020-10-23 12:05:16');
/*!40000 ALTER TABLE `71_nguyenthactuyen_tickets` ENABLE KEYS */;

-- Dumping structure for table at130958_xdwat.71_nguyenthactuyen_ticket_book
CREATE TABLE IF NOT EXISTS `71_nguyenthactuyen_ticket_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table at130958_xdwat.71_nguyenthactuyen_ticket_book: ~2 rows (approximately)
/*!40000 ALTER TABLE `71_nguyenthactuyen_ticket_book` DISABLE KEYS */;
INSERT INTO `71_nguyenthactuyen_ticket_book` (`id`, `ticket_id`, `book_id`, `created_at`, `updated_at`) VALUES
	(9, 11, 11, '2020-10-24 12:05:43', '2020-10-24 12:05:43'),
	(10, 11, 11, '2020-10-24 12:05:43', '2020-10-24 12:05:43'),
	(11, 11, 11, '2020-10-24 12:05:43', '2020-10-24 12:05:43');
/*!40000 ALTER TABLE `71_nguyenthactuyen_ticket_book` ENABLE KEYS */;

-- Dumping structure for table at130958_xdwat.71_nguyenthactuyen_users
CREATE TABLE IF NOT EXISTS `71_nguyenthactuyen_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table at130958_xdwat.71_nguyenthactuyen_users: ~9 rows (approximately)
/*!40000 ALTER TABLE `71_nguyenthactuyen_users` DISABLE KEYS */;
INSERT INTO `71_nguyenthactuyen_users` (`id`, `role_id`, `username`, `password`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
	(6, 14, 'sinhvien001', '6dd2bb47612c87fa8a1cb5d153d03dad2b83ef4a', 'testsv001kma@gmail.com', '', '', '2020-10-18 22:44:57', '2020-10-23 19:59:22'),
	(9, 14, 'giaovien001', '9816e691b97eda6ed653d71b99afb62b6cf165c7', 'gv001@mail.com', '', 'Nam Định', '2020-10-18 22:47:16', '2020-10-22 16:05:48'),
	(10, 14, 'giaovien002', '1d496885fa27e1adc4aaebf814565659dfc96bff', 'gv002@mail.com', '', '', '2020-10-18 22:47:36', '2020-10-22 16:06:18'),
	(13, 11, 'mod001', '03175cb25b3cee341daa3af763fe465cdc929575', 'mod001@mail.com', '', '', '2020-10-18 23:16:18', '2020-10-22 14:37:38'),
	(20, 13, 'librarian001', '3175293b744500cc51367e2d8f4031bdb82c9aee', 'lib001@mail.com', '0994124114', 'Hà Nội', '2020-10-21 03:01:36', '2020-10-22 16:07:46'),
	(21, 13, 'librarian002', 'd46cbddaef520883ef00d125458f862b9a93e879', 'lib002@mail.com', '0424433424', 'adadadada', '2020-10-21 03:02:31', '2020-10-22 16:07:39'),
	(22, 14, 'sinhvien002', '18ea1e99f9b6400d9f9672d6738fa254f7ed876d', 'sv002@gmail.com', '0465431321', 'ha noi', '2020-10-22 15:12:40', '2020-10-22 15:12:40'),
	(23, 14, 'sinhvien003', 'af41b3afb8028715db8c51f9c61f2f8c0682e0db', 'sv003@mail.com', '', 'ha nam', '2020-10-22 15:41:42', '2020-10-22 15:41:42'),
	(24, 11, 'mod002', '03175cb25b3cee341daa3af763fe465cdc929575', 'mod002@mail.com', '1312313', '', '2020-10-22 17:11:53', '2020-10-22 17:11:53'),
	(25, 14, 'sinhvien004', '70a1f6aaeae8b99e4d31a524be253a34786117c4', 'sv004@mail.com', '', 'ha noi', '2020-10-23 02:42:12', '2020-10-23 02:42:12'),
	(26, 14, 'sinhvien005', 'e80998f468ad84149d58beaeff7cba6d0ff437ba', 'sv005@mail.com', '0123123131', 'Hà Nội', '2020-10-23 19:38:28', '2020-10-23 19:38:28'),
	(27, 14, 'sinhvien006', '990b7b39133c3b78b2270f2c5029ef155d2db3f1', 'sv006@mail.com', '093535353', '', '2020-10-24 11:45:55', '2020-10-24 11:45:55');
/*!40000 ALTER TABLE `71_nguyenthactuyen_users` ENABLE KEYS */;

-- Dumping structure for table at130958_xdwat.71_nguyenthactuyen_user_right
CREATE TABLE IF NOT EXISTS `71_nguyenthactuyen_user_right` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `right_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table at130958_xdwat.71_nguyenthactuyen_user_right: ~14 rows (approximately)
/*!40000 ALTER TABLE `71_nguyenthactuyen_user_right` DISABLE KEYS */;
INSERT INTO `71_nguyenthactuyen_user_right` (`id`, `user_id`, `right_id`, `created_at`, `updated_at`) VALUES
	(1, 13, 1, '2020-10-22 21:56:45', '2020-10-22 21:56:45'),
	(2, 13, 11, '2020-10-22 21:56:51', '2020-10-22 21:56:51'),
	(6, 13, 12, '2020-10-22 23:26:51', '2020-10-22 23:26:51'),
	(7, 13, 13, '2020-10-22 23:26:56', '2020-10-22 23:26:56'),
	(8, 13, 16, '2020-10-22 23:27:00', '2020-10-22 23:27:00'),
	(33, 20, 17, '2020-10-24 09:11:33', '2020-10-24 09:11:33'),
	(34, 20, 18, '2020-10-24 09:11:33', '2020-10-24 09:11:33'),
	(35, 20, 19, '2020-10-24 09:11:33', '2020-10-24 09:11:33'),
	(36, 20, 20, '2020-10-24 09:11:33', '2020-10-24 09:11:33'),
	(37, 20, 21, '2020-10-24 09:11:33', '2020-10-24 09:11:33'),
	(38, 20, 22, '2020-10-24 09:11:33', '2020-10-24 09:11:33'),
	(42, 6, 23, '2020-10-24 10:29:57', '2020-10-24 10:29:57'),
	(43, 6, 24, '2020-10-24 10:29:57', '2020-10-24 10:29:57'),
	(44, 6, 25, '2020-10-24 10:29:57', '2020-10-24 10:29:57'),
	(45, 6, 26, '2020-10-24 10:29:57', '2020-10-24 10:29:57');
/*!40000 ALTER TABLE `71_nguyenthactuyen_user_right` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
