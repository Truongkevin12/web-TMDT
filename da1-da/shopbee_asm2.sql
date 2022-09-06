-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 26, 2021 lúc 12:21 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopbee`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bai_viet`
--

CREATE TABLE `bai_viet` (
  `id` int(11) NOT NULL,
  `tieu_de` text NOT NULL,
  `ma_loai_bai` int(11) NOT NULL,
  `noi_dung_tin` longtext NOT NULL,
  `hinh_anh` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ngay_dang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` varchar(250) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ngay_bl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `CThoaDon`
--

CREATE TABLE `CThoaDon` (
  `stt` int(11) NOT NULL,
  `so_hoa_don` varchar(30) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `CThoaDon`
--

INSERT INTO `CThoaDon` (`stt`, `so_hoa_don`, `ma_sp`, `so_luong`, `don_gia`) VALUES
(64, '20211126180633', 23, 2, 4),
(65, '20211126180633', 22, 2, 50000000),
(66, '20211126181305', 23, 2, 4),
(67, '20211126181305', 22, 2, 50000000),
(68, '20211126181437', 23, 2, 4),
(69, '20211126181437', 22, 2, 50000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(11) NOT NULL,
  `ten_hh` varchar(50) NOT NULL,
  `don_gia` float NOT NULL,
  `giam_gia` float DEFAULT NULL,
  `hinh` varchar(50) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `mo_ta` varchar(2000) NOT NULL,
  `so_luot_xem` int(11) NOT NULL DEFAULT 0,
  `ma_loai` int(11) NOT NULL,
  `ma_hang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `so_luot_xem`, `ma_loai`, `ma_hang`) VALUES
(22, 'iPhone 12 Pro Max', 25000000, 0, 'iphone-12-pro-max-xam-new-600x600-200x200.jpeg', '2021-11-22', 'Máy mới 100%, đầy đủ phụ kiện từ nhà sản xuất. Sản phẩm có mã SA/A (được Apple Việt Nam phân phối chính thức).', 130, 50, 1),
(23, 'iphone 11', 2, 0, 'iphone-12-pro-max-xam-new-600x600-200x200.jpeg', '2021-11-24', 'Mới, đầy đủ phụ kiện từ nhà sản xuất', 65, 50, 1),
(24, 'iPad pro 2020', 2, 2, 'iphone-12-pro-max-xam-new-600x600-200x200.jpeg', '2021-11-24', '133', 9, 49, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_sx`
--

CREATE TABLE `hang_sx` (
  `id` int(11) NOT NULL,
  `ten_hang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hang_sx`
--

INSERT INTO `hang_sx` (`id`, `ten_hang`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Xiaomi'),
(4, 'LG'),
(5, 'ASUS'),
(6, 'LENOVO'),
(7, 'Khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `so_hoa_don` varchar(30) NOT NULL,
  `ngay_mua` date NOT NULL,
  `thanh_tien` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`so_hoa_don`, `ngay_mua`, `thanh_tien`, `ma_kh`, `trang_thai`) VALUES
('20211126180633', '2021-11-26', 50000004, 59, 0),
('20211126181305', '2021-11-26', 50000004, 59, 1),
('20211126181437', '2021-11-26', 50000004, 59, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(11) NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `sdt` int(11) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `kich_hoat` bit(1) NOT NULL DEFAULT b'0',
  `hinh` varchar(50) DEFAULT 'avt.png',
  `email` varchar(50) NOT NULL,
  `vai_tro` float NOT NULL DEFAULT 0,
  `active` float NOT NULL DEFAULT 1,
  `randomkey` varchar(50) NOT NULL,
  `idgroup` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ten_dang_nhap`, `mat_khau`, `ho_ten`, `sdt`, `dia_chi`, `kich_hoat`, `hinh`, `email`, `vai_tro`, `active`, `randomkey`, `idgroup`) VALUES
(10, 'admin', '12', 'admin', 325435, '2343t5gfgfd', b'1', 'avt.png', '110200442233020@gmail.com', 1, 1, '', b'1'),
(35, 'huyvipfro12', 'huy12345678', 'hin đức quang huy', 0, '', b'0', '', 'quanghuylkbh147@gmail.com', 0, 0, 'f3180a6f53f600106738', b'0'),
(52, 'khiemdga', '23', 'khiem dẹp trai', 3, 'f', b'0', NULL, 'tien@tqkpro.net', 0, 1, 'ff63d5c2a8762344e119', b'0'),
(58, 'user', 'khiempro123', 'khiem', NULL, NULL, b'1', 'avt.png', 'ing@tqkpro.net', 0, 1, 'a8d2c45b0c8059874f77', b'0'),
(59, 'user123', 'khiempro123', 'Trần QUang Khiêm', NULL, NULL, b'1', 'avt.png', 'khien@tqkpro.net', 0, 1, '182476e35a1a07ef4e88', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lien_he`
--

CREATE TABLE `lien_he` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lien_he`
--

INSERT INTO `lien_he` (`id`, `email`, `tieu_de`, `noi_dung`) VALUES
(1, 'quanghuylkbh147@gmail.com', '4r5y7uh', '4tuireiouhre'),
(2, 'quangtruong011020022020@gmail.com', 'rgt4rehg', 'regthjuyrtg'),
(3, 'quanghuylkbh147@gmail.com', 'fhyjkul', 'wdfghtgjhy['),
(4, 'quanghuylkbh147@gmail.com', 'fhyjkul', 'wdfghtgjhy['),
(5, 'quanghuylkbh147@gmail.com', 'fhyjkul', 'wdfghtgjhy['),
(6, 'quanghuylkbh147@gmail.com', 'wrdjymu', 'huy ngu chis'),
(7, 'quanghuylkbh147@gmail.com', 'huy ngu chois', 'huy bro'),
(8, 'quanghuylkbh147@gmail.com', 'tieue deef ne', 'tin nhan ne'),
(9, 'quanghuylkbh147@gmail.com', 'tieue deef ne', 'tin nhan ne'),
(10, 'quanghuylkbh147@gmail.com', 'tieue deef ne', 'tin nhan ne'),
(11, 'quanghuylkbh123@gmail.com', 'Các sản phẩm sẽ ra mắt tháng 12', 'cần bt thêm chi tiết'),
(12, 'quanghuylkbh147@gmail.com', 'Các sản phẩm sẽ ra mắt tháng 12', 'asdgegwegwegew');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_bai`
--

CREATE TABLE `loai_bai` (
  `ma_loai_bai` int(11) NOT NULL,
  `ten_loai_bai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_hang`
--

CREATE TABLE `loai_hang` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai_hang`
--

INSERT INTO `loai_hang` (`ma_loai`, `ten_loai`) VALUES
(46, 'Laptop'),
(47, 'Điện Thoại'),
(48, 'TV'),
(49, 'iPad'),
(50, 'iPhone');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `ma_voucher` int(11) NOT NULL,
  `ten_sp` varchar(50) NOT NULL,
  `giam_gia` int(11) NOT NULL,
  `ma_code` varchar(50) NOT NULL,
  `ngay_ap_dung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_loai_bai` (`ma_loai_bai`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `CThoaDon`
--
ALTER TABLE `CThoaDon`
  ADD PRIMARY KEY (`stt`),
  ADD KEY `ma_sp` (`ma_sp`),
  ADD KEY `so_hoa_don` (`so_hoa_don`);

--
-- Chỉ mục cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `ma_loai` (`ma_loai`),
  ADD KEY `ma_hang` (`ma_hang`);

--
-- Chỉ mục cho bảng `hang_sx`
--
ALTER TABLE `hang_sx`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`so_hoa_don`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `loai_bai`
--
ALTER TABLE `loai_bai`
  ADD PRIMARY KEY (`ma_loai_bai`);

--
-- Chỉ mục cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`ma_voucher`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bai_viet`
--
ALTER TABLE `bai_viet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `CThoaDon`
--
ALTER TABLE `CThoaDon`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `hang_sx`
--
ALTER TABLE `hang_sx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `loai_bai`
--
ALTER TABLE `loai_bai`
  MODIFY `ma_loai_bai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `ma_voucher` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bai_viet`
--
ALTER TABLE `bai_viet`
  ADD CONSTRAINT `bai_viet_ibfk_1` FOREIGN KEY (`ma_loai_bai`) REFERENCES `loai_bai` (`ma_loai_bai`),
  ADD CONSTRAINT `bai_viet_ibfk_2` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `CThoaDon`
--
ALTER TABLE `CThoaDon`
  ADD CONSTRAINT `cthoadon_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cthoadon_ibfk_2` FOREIGN KEY (`so_hoa_don`) REFERENCES `hoadon` (`so_hoa_don`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hang_hoa_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai_hang` (`ma_loai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hang_hoa_ibfk_2` FOREIGN KEY (`ma_hang`) REFERENCES `hang_sx` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
