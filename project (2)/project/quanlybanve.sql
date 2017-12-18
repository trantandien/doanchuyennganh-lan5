-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2017 lúc 05:50 AM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybanve`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiettaixe`
--

CREATE TABLE `chitiettaixe` (
  `id` int(11) NOT NULL,
  `VitriTX` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiettaixe`
--

INSERT INTO `chitiettaixe` (`id`, `VitriTX`) VALUES
(1, 'Tài Xế'),
(2, 'Phụ Xe'),
(3, 'Lơ Xe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenxe`
--

CREATE TABLE `chuyenxe` (
  `id` int(11) NOT NULL,
  `Giodi` time NOT NULL,
  `Gioden` time NOT NULL,
  `Diemdi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Diemden` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ngaydi` date NOT NULL,
  `Ngayve` date NOT NULL,
  `Giave` int(11) NOT NULL,
  `Chotrong` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '40',
  `id_lotrinh` int(11) NOT NULL,
  `id_taixe` int(11) NOT NULL,
  `id_xe` int(11) NOT NULL,
  `id_vexe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyenxe`
--

INSERT INTO `chuyenxe` (`id`, `Giodi`, `Gioden`, `Diemdi`, `Diemden`, `Ngaydi`, `Ngayve`, `Giave`, `Chotrong`, `id_lotrinh`, `id_taixe`, `id_xe`, `id_vexe`) VALUES
(1, '04:00:00', '21:00:00', 'Bến xe Miền Đông', 'Bến Xe Pleiku', '2017-12-15', '2017-12-16', 200000, '40', 5, 1, 1, 1),
(2, '03:00:00', '20:00:00', 'Bến Xe Miền Đông', 'Bến Xe Hà Nội', '2017-12-10', '2017-12-11', 350000, '40', 2, 2, 2, 2),
(21, '18:00:00', '05:00:00', 'Bến Xe Gia Lai', 'Bến Xe Miền Đông', '2017-12-12', '2017-12-13', 240000, '40', 3, 3, 3, 3),
(34, '05:00:00', '11:00:00', 'Bến Xe Miền Đông', 'Bến Xe Đắk Nông', '2017-12-15', '2017-12-16', 220000, '40', 5, 10, 4, 3),
(35, '07:00:00', '10:00:00', 'Bến Xe Miền Đông', 'Bến Xe An Khê', '2017-12-16', '2017-12-17', 280000, '40', 7, 7, 4, 3),
(36, '10:00:00', '12:00:00', 'Bến Xe Miền Đông', 'Bến Xe Bình Định', '2017-12-18', '2017-12-19', 280000, '40', 7, 7, 5, 3),
(38, '06:00:00', '07:00:00', 'Bến Xe Miền Đông', 'Bến Xe Tuy Hòa- Phú Yên', '2017-12-12', '2017-12-13', 280000, '40', 1, 12, 3, 3),
(40, '06:00:00', '03:00:00', 'Bến Xe Miền Đông', 'Bến Xe Buôn Mê Thuột', '2017-12-12', '2017-12-13', 200000, '40', 6, 2, 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachghe`
--

CREATE TABLE `danhsachghe` (
  `id` int(11) NOT NULL,
  `ten_ghe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(20) NOT NULL,
  `Username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenHanhKhach` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` int(20) NOT NULL,
  `Email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Soluong` int(2) NOT NULL DEFAULT '1',
  `Diemdi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Giodi` time NOT NULL,
  `Diemden` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gioden` time NOT NULL,
  `Giave` int(20) NOT NULL,
  `Vitri` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lotrinh`
--

CREATE TABLE `lotrinh` (
  `id` int(11) NOT NULL,
  `Diemdi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Diemden` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lotrinh`
--

INSERT INTO `lotrinh` (`id`, `Diemdi`, `Diemden`) VALUES
(1, 'Hồ Chí Minh', 'Đà Nẵng'),
(2, 'Hồ Chí Minh', 'Hà Nội'),
(3, 'Gia Lai', 'Hồ Chí Minh'),
(5, 'Hồ Chí Minh', 'Gia Lai'),
(6, 'Hồ Chí Minh', 'Buôn Mê Thuột'),
(7, 'Hồ Chí Minh', 'Bình Định');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taixe`
--

CREATE TABLE `taixe` (
  `id` int(11) NOT NULL,
  `TenTX` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SDT` int(11) NOT NULL,
  `id_PLTX` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taixe`
--

INSERT INTO `taixe` (`id`, `TenTX`, `SDT`, `id_PLTX`) VALUES
(1, 'Nguyễn Anh Tuấn', 90317894, 1),
(2, 'Nguyễn Văn Cừ', 906332231, 2),
(3, 'Nguyễn Tri Phương', 1657002257, 3),
(7, 'Trần Văn Be', 12312312, 3),
(10, 'Uyển Uyển', 909987666, 1),
(12, 'Nguyễn Thị Kỳ Duyên', 1657002257, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(11) NOT NULL,
  `Username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '1',
  `TenTV` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Diachi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `Username`, `Password`, `level`, `TenTV`, `Phone`, `Email`, `Diachi`) VALUES
(1, 'admin', '1234', 0, 'Nguyễn Thị Kỳ Duyên', 1657002257, 'duyenit.nguyen21296@gmail.com', 'Thôn 3- Chư Á- Pleiku- Gia Lai'),
(2, 'member', '12345', 1, 'Trần Thành Viên', 909977888, 'thanhvien@gmail.com', 'Cao Lổ- Quận 8'),
(10, 'duyenit.nguyen96@gmail.com', 'zxcv', 1, 'Nguyễn Thị Kỳ Duyên', 1657002257, 'duyenit.nguyen96@gmail.com', '180 Cao Lỗ, Phường 4, Quận 8, Tp Hồ Chí Minh'),
(11, 'cobelylom12@gmail.com', 'asdf', 1, 'Nguyễn Cao Kỳ Duyên', 1657002257, 'cobelylom12@gmail.com', '180 Cao Lỗ, Phường 4, Quận 8, Tp Hồ Chí Minh'),
(12, 'zip24t@gmail.com', '123', 1, 'zip', 123, 'zip24t@gmail.com', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vexe`
--

CREATE TABLE `vexe` (
  `id` int(11) NOT NULL,
  `GiaveLB` int(11) NOT NULL,
  `Giodi` time NOT NULL,
  `Ngaydi` date NOT NULL,
  `Soghe` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_thanhvien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vexe`
--

INSERT INTO `vexe` (`id`, `GiaveLB`, `Giodi`, `Ngaydi`, `Soghe`, `id_thanhvien`) VALUES
(1, 200000, '04:00:00', '2017-11-30', '8', 1),
(2, 350000, '03:00:00', '2017-11-30', '16', 1),
(3, 240000, '18:00:00', '2017-12-02', '32', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `id` int(11) NOT NULL,
  `Tenxe` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Soxe` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Soluongghe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `xe`
--

INSERT INTO `xe` (`id`, `Tenxe`, `Soxe`, `Soluongghe`) VALUES
(1, 'Limo', '59D2-303.59', 40),
(2, 'BMW', '59D2-303.58', 40),
(3, 'Việt Tân Phát', '59M1-123.45', 40),
(4, 'Phương Trang', '59M4-234.56', 40),
(5, 'Phượng Hoàng', '59M3 123.89', 40);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiettaixe`
--
ALTER TABLE `chitiettaixe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chuyenxe`
--
ALTER TABLE `chuyenxe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lotrinh` (`id_lotrinh`),
  ADD KEY `id_taixe` (`id_taixe`),
  ADD KEY `id_xe` (`id_xe`),
  ADD KEY `id_vexe` (`id_vexe`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lotrinh`
--
ALTER TABLE `lotrinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taixe`
--
ALTER TABLE `taixe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_PLTX` (`id_PLTX`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vexe`
--
ALTER TABLE `vexe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_thanhvien` (`id_thanhvien`);

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiettaixe`
--
ALTER TABLE `chitiettaixe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `chuyenxe`
--
ALTER TABLE `chuyenxe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT cho bảng `lotrinh`
--
ALTER TABLE `lotrinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `taixe`
--
ALTER TABLE `taixe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `vexe`
--
ALTER TABLE `vexe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `xe`
--
ALTER TABLE `xe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chuyenxe`
--
ALTER TABLE `chuyenxe`
  ADD CONSTRAINT `chuyenxe_ibfk_1` FOREIGN KEY (`id_lotrinh`) REFERENCES `lotrinh` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chuyenxe_ibfk_2` FOREIGN KEY (`id_taixe`) REFERENCES `taixe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chuyenxe_ibfk_3` FOREIGN KEY (`id_xe`) REFERENCES `xe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chuyenxe_ibfk_4` FOREIGN KEY (`id_vexe`) REFERENCES `vexe` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `taixe`
--
ALTER TABLE `taixe`
  ADD CONSTRAINT `taixe_ibfk_1` FOREIGN KEY (`id_PLTX`) REFERENCES `taixe` (`id`);

--
-- Các ràng buộc cho bảng `vexe`
--
ALTER TABLE `vexe`
  ADD CONSTRAINT `vexe_ibfk_1` FOREIGN KEY (`id_thanhvien`) REFERENCES `thanhvien` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
