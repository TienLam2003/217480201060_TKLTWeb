-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 29, 2024 lúc 11:09 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlysinhvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `student_id` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthdate` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `major` varchar(50) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`student_id`, `name`, `birthdate`, `user_id`, `major`, `gender`) VALUES
('', '', '0000-00-00 00:00:00', 1, '', ''),
('K001', 'Nguyễn Văn A', '0000-00-00 00:00:00', 2, 'CNTT', NULL),
('K002', 'Lê Khánh D', '0000-00-00 00:00:00', 2, 'CNTT', NULL),
('K003', 'Đăng', '2024-05-09 00:00:00', 1, 'GD', 'Nữ'),
('K004', 'Minh', '2024-06-07 00:00:00', 1, 'CNTT', 'Nam'),
('K005', 'Nhờ', '2024-06-07 00:00:00', 1, 'CNTT', 'Nam'),
('K006', 'Lâm', '2024-06-06 00:00:00', 2, 'CNTT', 'Nữ'),
('K007', 'Phong', '2024-06-07 00:00:00', 2, 'GD', 'Nữ'),
('K008', 'Hiếu', '2024-05-31 00:00:00', 2, 'CNTT', 'Nam'),
('K09', 'Hiếu', '2024-05-30 00:00:00', 2, 'GD', 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'user1', 'password1', 'user1@example.com'),
(2, 'user2', 'password2', 'user2@example.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
