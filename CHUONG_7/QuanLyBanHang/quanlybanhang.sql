-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 05, 2024 lúc 04:43 PM
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
-- Cơ sở dữ liệu: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MaHang` varchar(4) NOT NULL COMMENT 'Mã hàng',
  `TenHang` varchar(40) NOT NULL COMMENT 'Tên hàng',
  `MaNSX` varchar(2) NOT NULL COMMENT 'Mã nhà SX',
  `NamSX` int(11) NOT NULL COMMENT 'Năm SX',
  `Gia` int(11) NOT NULL COMMENT 'Giá bán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MaHang`, `TenHang`, `MaNSX`, `NamSX`, `Gia`) VALUES
('AS01', 'ASUS V', 'AS', 2017, 750000),
('AS02', 'ASUS D', 'AS', 2012, 200000),
('DE01', 'DEV V', 'DE', 2015, 650000),
('DE02', 'DEV I', 'DE', 2015, 550000),
('LE01', 'Lenovo', 'LE', 2019, 500000),
('LE02', 'LENOVO 2D', 'LE', 2012, 300000),
('TO01', 'Toshiba', 'TO', 2015, 650000),
('TO02', 'TOSHIBA HAHA', 'TO', 2012, 300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` varchar(3) NOT NULL,
  `MaKH` varchar(4) NOT NULL,
  `MaHang` varchar(4) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaKH`, `MaHang`, `SoLuong`, `ThanhTien`) VALUES
('001', 'K001', 'DE01', 3, 0),
('001', 'K001', 'DE02', 1, 0),
('001', 'K001', 'DE02', 1, 0),
('002', 'K002', 'TO01', 5, 0),
('003', 'K003', 'LE01', 3, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` varchar(4) NOT NULL,
  `TenKH` varchar(40) NOT NULL,
  `NamSinh` int(11) NOT NULL,
  `DienThoai` varchar(10) NOT NULL,
  `DiaChi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `NamSinh`, `DienThoai`, `DiaChi`) VALUES
('K00', 'Nguyễn Lan', 1985, '0352267771', 'Bạc liêu'),
('K001', 'Nguyễn Lan', 1985, '0352267771', 'Bạc liêu'),
('K002', 'Nguyễn Lâm', 1965, '0352267771', 'Cần Thơ'),
('K003', 'Ngô Minh Lan', 1995, '0352267771', 'Bạc liêu'),
('K004', 'Dương Thu Thủy', 2000, '0352267771', 'Bạc liêu'),
('K005', 'Nguyễn Lan', 2003, '0352267771', 'Bạc liêu'),
('K006', 'Nguyễn Lan', 1985, '0352267771', 'Bạc liêu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('lam', 'a');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `MaNSX` varchar(2) NOT NULL,
  `TenNSX` varchar(40) NOT NULL,
  `QuocGia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`MaNSX`, `TenNSX`, `QuocGia`) VALUES
('AS', 'ASUS', 'Hàn quốc'),
('DE', 'DELL', 'Mỹ'),
('LE', 'LENOVO', 'Trung quốc'),
('TO', 'TOSHIBA', 'Nhật bản');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MaHang`),
  ADD KEY `MaNSX` (`MaNSX`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD KEY `MaHang` (`MaHang`),
  ADD KEY `MaKH` (`MaKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`MaNSX`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaNSX`) REFERENCES `nhasanxuat` (`MaNSX`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaHang`) REFERENCES `hanghoa` (`MaHang`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
