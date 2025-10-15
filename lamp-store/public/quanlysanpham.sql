-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2025 lúc 11:26 AM
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
-- Cơ sở dữ liệu: `quanlysanpham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `sessions_user_id_index` (`user_id`),
  INDEX `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `binhluan` (
  `MaKH` int(10) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `NoiDung` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`MaKH`, `TenKH`, `NoiDung`) VALUES
(1, 'Nguyễn Văn A', ''),
(2, 'Trần Văn B', ''),
(3, 'Trần Văn C', ''),
(4, 'Lê Văn D', ''),
(5, 'Trần Quang G', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `IDSP` int(10) NOT NULL,
  `IDDH` int(10) NOT NULL,
  `DonGia` decimal(10,0) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`IDSP`, `IDDH`, `DonGia`, `SoLuong`) VALUES
(101, 201, 2000000, 1),
(102, 202, 3000000, 2),
(103, 203, 4000000, 3),
(104, 204, 5000000, 4),
(105, 205, 6000000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `Name` varchar(50) NOT NULL,
  `Email` longtext NOT NULL,
  `SDT` int(11) NOT NULL,
  `Content` varchar(100) NOT NULL,
  `TrangThai` varchar(20) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`Name`, `Email`, `SDT`, `Content`, `TrangThai`, `UserID`) VALUES
('Nguyễn Văn A', 'tt@caothang.edu.vn', 123456789, '', '', 123),
('Trần Văn B', 'bb@caothang.edu.vn', 123456788, '', '', 234);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ID` int(10) NOT NULL,
  `TenDM` varchar(50) NOT NULL,
  `TrangThai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`ID`, `TenDM`, `TrangThai`) VALUES
(101, '', ''),
(102, '', ''),
(103, '', ''),
(104, '', ''),
(105, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `IDDonHang` int(10) NOT NULL,
  `UserID` int(10) NOT NULL,
  `TGMua` datetime NOT NULL,
  `UserID_Sale` int(10) NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`IDDonHang`, `UserID`, `TGMua`, `UserID_Sale`, `TrangThai`) VALUES
(1001, 123, '2025-10-12 00:00:00', 1, 'Đang Giao'),
(1002, 234, '2025-06-02 00:00:00', 2, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(10) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `Gia` decimal(10,0) NOT NULL,
  `GiaKhuyenMai` decimal(10,0) NOT NULL,
  `Hinh` longtext NOT NULL,
  `MoTa` varchar(50) NOT NULL,
  `MaDM` int(10) NOT NULL,
  `Tags` varchar(20) NOT NULL,
  `TrangThai` varchar(30) NOT NULL,
  `UserID` int(10) NOT NULL,
  `Loai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Gia`, `GiaKhuyenMai`, `Hinh`, `MoTa`, `MaDM`, `Tags`, `TrangThai`, `UserID`, `Loai`) VALUES
(1, 'Đèn Nội Thất 1', 2000000, 1800000, '', 'Dùng để trang trí ', 10, '', 'Còn hàng', 123, 'Vật dụng gia đình'),
(2, 'Đèn Nội Thất 2', 3000000, 1900000, '', 'Dùng để trang trí ', 20, '', 'Còn hàng', 234, 'Vật dụng gia đình'),
(3, 'Đèn Nội Thất 3', 4000000, 1700000, '', 'Dùng để trang trí ', 30, '', 'Hết hàng', 345, 'Vật dụng gia đình'),
(4, 'Đèn Nội Thất 4', 5000000, 1500000, '', 'Dùng để trang trí ', 40, '', 'Còn hàng', 456, 'Vật dụng gia đình'),
(5, 'Đèn Nội Thất 5', 6000000, 1600000, '', 'Dùng để trang trí ', 50, '', 'Hết hàng', 567, 'Vật dụng gia đình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `UserName` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `SDT` int(11) NOT NULL,
  `Email` longtext NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Role` int(11) NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`UserName`, `Name`, `SDT`, `Email`, `Pass`, `Role`, `TrangThai`) VALUES
('Lê Thị Hạnh', 'Hạnh', 123456785, 'ee@gmail.com', '123456a@', 0, 'Đang hoạt động'),
('Nguyễn Thị Bình', 'Bình', 123456789, 'aa@gmail.com', '123456a@', 0, 'Đang hoạt động'),
('Nguyễn Thị Trinh', 'Trinh', 123456786, 'dd@gmail.com', '123456a@', 0, 'Không hoạt động'),
('Nguyễn Trần Bảo', 'Bảo', 123456787, 'cc@gmail.com', '123456a@', 0, 'Đang hoạt động'),
('Trần Văn Biển', 'Biển', 123456788, 'bb@gmail.com', '123456a@', 0, 'Không hoạt động');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `websitesetting`
--

CREATE TABLE `websitesetting` (
  `LogoWeb` longtext NOT NULL,
  `TenWeb` varchar(30) NOT NULL,
  `MoTa` varchar(100) NOT NULL,
  `FB` varchar(20) NOT NULL,
  `YT` varchar(20) NOT NULL,
  `Linkedin` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `TrangThai` varchar(50) NOT NULL,
  `UserID_Create` int(10) NOT NULL,
  `UserID_Update` int(10) NOT NULL,
  `Map` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `websitesetting`
--

INSERT INTO `websitesetting` (`LogoWeb`, `TenWeb`, `MoTa`, `FB`, `YT`, `Linkedin`, `DiaChi`, `TrangThai`, `UserID_Create`, `UserID_Update`, `Map`) VALUES
('', 'Banhanggiadung', 'Chuyên cung cấp các loại đèn', 'Đồ Gia Dụng', 'Đồ Gia Dụng', '', '123 Cầu Giấy Hà Nội', 'Đang mở cửa', 111, 101, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`IDSP`,`IDDH`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Name`,`UserID`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`IDDonHang`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserName`,`Name`);

--
-- Chỉ mục cho bảng `websitesetting`
--
ALTER TABLE `websitesetting`
  ADD PRIMARY KEY (`TenWeb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
