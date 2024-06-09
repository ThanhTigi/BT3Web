-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 09, 2024 lúc 11:22 AM
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
-- Cơ sở dữ liệu: `bt3web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MaKhachHang` varchar(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `TenKhachHang` varchar(50) NOT NULL,
  `NgaySinh` date NOT NULL,
  `SDT` varchar(50) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`MaKhachHang`, `Username`, `Password`, `TenKhachHang`, `NgaySinh`, `SDT`, `Email`, `role`) VALUES
('KH001', 'admin', '123', 'Đắc Thành', '2000-05-20', '123-456-7890', 'thanhroman36@gmail.com', 1),
('KH002', 'dacthanh', '123', 'Nguyễn Đắc Thành', '2024-04-30', '032', 'thanhroman36@gmail.com', 0),
('KH003', 'thanh', '123', 'Nguyễn Đắc Thành', '2024-05-31', '032', 'ndtcx36@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa_hoc`
--

CREATE TABLE `khoa_hoc` (
  `MaKhoaHoc` varchar(10) NOT NULL,
  `TenKhoaHoc` varchar(50) NOT NULL,
  `GiaTien` int(11) NOT NULL,
  `ThoiLuong` tinyint(4) NOT NULL,
  `SLDaBan` int(11) NOT NULL,
  `LoaiKhoaHoc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa_hoc`
--

INSERT INTO `khoa_hoc` (`MaKhoaHoc`, `TenKhoaHoc`, `GiaTien`, `ThoiLuong`, `SLDaBan`, `LoaiKhoaHoc`) VALUES
('KH001', 'Khóa học PHP', 1000000, 50, 100, 'IT Developer'),
('KH002', 'Khóa học JavaScript', 1500000, 40, 150, 'IT Developer'),
('KH003', 'Khóa học Python', 2000000, 50, 200, 'IT Developer'),
('KH004', 'Khóa học Java', 1200000, 35, 120, 'IT Developer'),
('KH005', 'Khóa học C++', 1100000, 32, 130, 'IT Developer'),
('KH006', 'Khóa học Ruby', 1300000, 37, 110, 'IT Developer'),
('KH007', 'Khóa học Swift', 1400000, 38, 90, 'IT Developer'),
('KH008', 'Khóa học Go', 1600000, 40, 80, 'IT Developer'),
('KH009', 'Khóa học Kotlin', 1700000, 42, 150, 'IT Developer'),
('KH010', 'Khóa học SQL', 1800000, 44, 170, 'IT Developer'),
('KH011', 'Thiết Kế Web Cơ Bản', 900000, 25, 200, 'Thiết Kế Web'),
('KH012', 'Thiết Kế Web Nâng Cao', 1200000, 35, 180, 'Thiết Kế Web'),
('KH013', 'Nhiếp ảnh Cơ Bản', 800000, 20, 90, 'Nhiếp ảnh'),
('KH014', 'Nhiếp ảnh Nâng Cao', 1500000, 45, 60, 'Nhiếp ảnh'),
('KH015', 'Giới thiệu Triết học', 500000, 15, 300, 'Môn học đại cương'),
('KH016', 'Lịch sử Văn minh Thế giới', 700000, 20, 250, 'Môn học đại cương'),
('KH017', 'Photoshop Cơ Bản', 1000000, 30, 220, 'Photoshop'),
('KH018', 'Photoshop Nâng Cao', 1300000, 40, 190, 'Photoshop'),
('KH019', 'Tiền Kỹ Thuật Số 101', 2000000, 50, 140, 'Tiền Kỹ Thuật Số'),
('KH020', 'Đầu tư Tiền Kỹ Thuật Số', 2500000, 60, 120, 'Tiền Kỹ Thuật Số'),
('KH021', 'Khóa học CSS', 800000, 25, 150, 'Thiết Kế Web'),
('KH022', 'Khóa học HTML', 750000, 20, 160, 'Thiết Kế Web'),
('KH023', 'Khóa học Angular', 1800000, 40, 110, 'IT Developer'),
('KH024', 'Khóa học React', 1900000, 42, 100, 'IT Developer'),
('KH025', 'Khóa học Node.js', 1700000, 38, 130, 'IT Developer'),
('KH026', 'Khóa học Machine Learning', 2500000, 60, 90, 'IT Developer'),
('KH027', 'Thiết Kế Logo', 1000000, 30, 80, 'Photoshop'),
('KH028', 'Chỉnh sửa Video với Premiere', 1500000, 40, 70, 'Photoshop'),
('KH029', 'Chụp ảnh chân dung', 1300000, 35, 60, 'Nhiếp ảnh'),
('KH030', 'Chụp ảnh phong cảnh', 1400000, 37, 50, 'Nhiếp ảnh'),
('KH031', 'Môn Toán Đại Cương', 600000, 20, 200, 'Môn học đại cương'),
('KH032', 'Môn Vật Lý Đại Cương', 650000, 22, 180, 'Môn học đại cương'),
('KH033', 'Tạo lập Blockchain', 3000000, 70, 80, 'Tiền Kỹ Thuật Số'),
('KH034', 'Khóa học Solidity', 2700000, 65, 75, 'Tiền Kỹ Thuật Số');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Chỉ mục cho bảng `khoa_hoc`
--
ALTER TABLE `khoa_hoc`
  ADD PRIMARY KEY (`MaKhoaHoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
