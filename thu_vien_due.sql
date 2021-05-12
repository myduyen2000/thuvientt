-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2021 lúc 04:37 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thu_vien_due`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id_danhmuc` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `ten_danhmuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `soluong_danhmuc` int(11) NOT NULL,
  `mota_danhmuc` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id_danhmuc`, `ten_danhmuc`, `soluong_danhmuc`, `mota_danhmuc`) VALUES
('DM001', 'Sách ', 1000, ''),
('DM002', 'Giáo trình ', 1000, ''),
('DM003', 'Tạp chí ', 1000, ''),
('DM004', 'Truyện, kịch ', 1000, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doc_gia`
--

CREATE TABLE `doc_gia` (
  `id_docgia` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `ten_docgia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `donvi_docgia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngaylamthe_docgia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doc_gia`
--

INSERT INTO `doc_gia` (`id_docgia`, `pass`, `ten_docgia`, `donvi_docgia`, `ngaylamthe_docgia`) VALUES
('11111', '12345', '12345', 'thong ke ', '2021-05-04'),
('12345', '11111', '12345', 'tai chinh ', '2021-05-04'),
('181121521201', '123456', 'Đỗ Đức Anh ', 'Thống kê - tin học ', '2021-05-01'),
('181121521202', '12345', 'Lê Dương Phương Anh', 'Thống kê - tin học ', '2021-02-12'),
('181121521207', '12345', 'Trần Mỹ Duyên ', 'Thống kê - tin học ', '2020-07-08'),
('181121521217', '12345', 'Dương Thị Huyền', 'Thống kê - tin học ', '2019-05-08'),
('181121521223', '12345', 'Bùi Thị Hoàng Nhi', 'Thống kê - tin học ', '2019-11-14'),
('181121521231', '12345', 'Nguyễn Thị Thảo Thảo', 'Thống kê - tin học ', '2021-04-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_sach` int(11) NOT NULL,
  `ten_sach` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_docgia` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `ngay_muon` int(11) NOT NULL,
  `hinhanh` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muon`
--

CREATE TABLE `muon` (
  `id_muon` int(11) NOT NULL,
  `id_sach` int(11) NOT NULL,
  `id_docgia` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ngaymuon_muon` date NOT NULL,
  `ngaytra_muon` date NOT NULL,
  `tinhtrang_muon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soluong_muon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `muon`
--

INSERT INTO `muon` (`id_muon`, `id_sach`, `id_docgia`, `ngaymuon_muon`, `ngaytra_muon`, `tinhtrang_muon`, `soluong_muon`) VALUES
(38, 13, '181121521201', '2021-05-12', '2021-05-12', '1', 1),
(39, 15, '181121521201', '2021-05-12', '2021-05-12', '2', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `tennhanvien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `sdt` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `password`, `tennhanvien`, `gioitinh`, `ngaysinh`, `sdt`, `diachi`) VALUES
('nv01', '1111', 'minh', NULL, NULL, NULL, NULL),
('nv02', '1111', 'Nhóm 06', 'nam', '2021-05-04', '0385538336', 'viet nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `id_sach` int(11) NOT NULL,
  `tensach` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_danhmuc` char(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sotrang_sach` int(11) DEFAULT NULL,
  `tentacgia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigianduocmuon` int(11) DEFAULT NULL,
  `thoigianxuatban` date DEFAULT NULL,
  `hinhanh` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`id_sach`, `tensach`, `id_danhmuc`, `sotrang_sach`, `tentacgia`, `thoigianduocmuon`, `thoigianxuatban`, `hinhanh`) VALUES
(13, 'Tiếng hàn ', 'DM002', 90, 'minh', 34, '2021-05-14', 'http://localhost/MVC_ThuVien/File_upload/TiengHan.jpg'),
(14, 'html', 'DM002', 90, 'minh', 34, '2021-05-14', 'http://localhost/MVC_ThuVien/File_upload/html.jpg'),
(15, 'c#', 'DM002', 90, 'minh', 34, '2021-05-14', 'http://localhost/MVC_ThuVien/File_upload/CSharp.jpg'),
(19, 'Kinh doanh quốc tế', 'DM003', 90, 'minh', 34, '2021-05-14', 'http://localhost/MVC_ThuVien/File_upload/KDQT.jpg'),
(53, 'Hành vi tổ chức', 'DM002', 90, 'minh', 34, '2021-05-14', 'http://localhost/MVC_ThuVien/File_upload/hanhvitochuc.png'),
(54, 'Luật', 'DM002', 90, 'minh', 34, '2021-05-14', 'http://localhost/MVC_ThuVien/File_upload/Luat.jpg'),
(55, 'python', 'DM002', 90, 'minh', 34, '2021-05-14', 'http://localhost/MVC_ThuVien/File_upload/python.jpg'),
(56, 'Kinh tế vi mô', 'DM004', 90, 'minh', 34, '2021-05-14', 'http://localhost/MVC_ThuVien/File_upload/sach.PNG'),
(57, 'nhóm 06', 'DM002', 90, 'chưa rõ', 90, '2021-05-02', 'http://localhost/MVC_ThuVien/File_upload/CSharp.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `doc_gia`
--
ALTER TABLE `doc_gia`
  ADD PRIMARY KEY (`id_docgia`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id_sach`);

--
-- Chỉ mục cho bảng `muon`
--
ALTER TABLE `muon`
  ADD PRIMARY KEY (`id_muon`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id_sach`),
  ADD KEY `fk_sach` (`id_danhmuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `muon`
--
ALTER TABLE `muon`
  MODIFY `id_muon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `id_sach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `fk_sach` FOREIGN KEY (`id_danhmuc`) REFERENCES `danh_muc` (`id_danhmuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
