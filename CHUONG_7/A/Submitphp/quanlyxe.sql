-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 29, 2024 lúc 11:49 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyxe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaixe`
--

CREATE TABLE `loaixe` (
  `malx` varchar(5) NOT NULL,
  `tenlx` varchar(20) NOT NULL,
  `thongtin` varchar(20) NOT NULL,
  `soluong` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaixe`
--

INSERT INTO `loaixe` (`malx`, `tenlx`, `thongtin`, `soluong`) VALUES
('LX001', 'otoo', 'abcxyz', 8),
('LX001', 'otoo', 'abcxyz', 8),
('LX001', 'otoo', 'abcxyz', 8),
('LX001', 'otoo', 'abcxyz', 8),
('LX001', 'otoo', 'abcxyz', 8),
('LX001', 'otoo', 'abcxyz', 8),
('LX001', 'otoo', 'abcxyz', 8),
('LX001', 'otoo', 'abcxyz', 8),
('LX001', 'otoo', 'abcxyz', 8),
('LX002', 'otoo', 'abcxyz', 8),
('LX003', 'otoo', 'abcxyz', 8),
('LX004', 'otoo', 'abcxyz', 8),
('LX005', 'otoo', 'abcxyz', 8),
('LX006', 'otoo', 'abcxyz', 8),
('LX007', 'otoo', 'abcxyz', 8),
('LX008', 'otoo', 'abcxyz', 8),
('LX001', 'otoo', 'abcxyz', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('lam', 'a');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `MaXe` varchar(20) NOT NULL,
  `TenXe` varchar(50) NOT NULL,
  `CapSo` varchar(20) NOT NULL,
  `MaLX` varchar(20) NOT NULL,
  `HangSX` varchar(50) NOT NULL,
  `ThongTinXe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`MaXe`, `TenXe`, `CapSo`, `MaLX`, `HangSX`, `ThongTinXe`) VALUES
('', '', 'sosang', 'LX001', '', ''),
('X001', 'exciter', 'Tự động', 'srth', 'srth', 'srth'),
('X002', 'hgfd', 'shrt', 'srth', 'srth', 'srth'),
('X003', 'Xe Giường nằm', 'Tự động', 'LX002', 'HonDa', 'KKK'),
('X004', '2 banh', '555', 'hh', 'hondas', 'ằeefweaf'),
('X007', 'ô tô', 'Tự động', 'agdr', 'rgsd', 'gsriodhtnjg'),
('X008', 'sh', 'Tự động', 'LX007', 'hondas', 'rsdgh'),
('X009', 'ô tô', 'on', 'àiush', 'gsaerjn', 'gsriodhtnjg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`MaXe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
