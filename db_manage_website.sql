-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2021 lúc 05:08 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_manage_website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `ac_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_regdate` datetime NOT NULL DEFAULT current_timestamp(),
  `ac_status` tinyint(1) NOT NULL DEFAULT 0,
  `ac_level` tinyint(1) NOT NULL DEFAULT 0,
  `ac_confirmed` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`ac_email`, `ac_pass`, `ac_regdate`, `ac_status`, `ac_level`, `ac_confirmed`) VALUES
('dinhnguyenhai6@gmail.com', '$2y$10$wLQkgNeMCWWA0iPn8nNlwORUhdfyowDEUh1KLS0eeOOpSPF1TQA16', '2021-11-04 15:27:30', 1, 1, '786c22f48b7ee8763e87776740a80500'),
('lethiquang44@gmail.com', '$2y$10$eF7jGM0f5xtAXfUUFMoyVOV7GIuCCiFJZdK5BClz0Pact/sLY/Sh6', '2021-11-03 19:51:22', 1, 0, '157512c3244802a9489c7432d9e3e076'),
('wwducanhtran@gmail.com', '789', '2021-10-28 17:56:23', 0, 0, ''),
('wwhungtranduy@gmail.com', '234', '2021-10-28 17:56:23', 0, 0, ''),
('wwtranminhduc@gmail.com', '468', '2021-10-28 17:56:23', 0, 0, ''),
('wwwhainguyendinh@gmail.com', '267', '2021-10-28 17:56:23', 0, 0, ''),
('wwwvannguyentuan@yahoo.com', '123', '2021-10-28 17:56:23', 0, 0, ''),
('wwwvantuantran@tlu.edu.vn', '456', '2021-10-28 17:56:23', 0, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `calendar`
--

CREATE TABLE `calendar` (
  `cl_id` int(10) NOT NULL,
  `cl_planid` int(10) NOT NULL,
  `cl_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cl_contents` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cl_start` datetime NOT NULL DEFAULT current_timestamp(),
  `cl_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `calendar`
--

INSERT INTO `calendar` (`cl_id`, `cl_planid`, `cl_name`, `cl_contents`, `cl_start`, `cl_end`) VALUES
(1, 3, '', '', '2021-10-28 18:26:37', '2021-10-13 18:26:52'),
(2, 4, '', '', '2021-10-28 18:26:37', '2021-12-23 17:24:01'),
(3, 5, '', '', '2021-10-28 18:26:37', '2022-05-17 08:26:31'),
(4, 6, '', '', '2021-10-28 18:26:37', '2021-04-20 12:14:48'),
(5, 7, '', '', '2021-10-28 18:26:37', '2022-03-10 17:38:03'),
(6, 8, 'đi mua giấy', 'căn tin', '2021-11-04 12:38:00', '2021-11-04 13:38:00'),
(9, 9, 'đi kiếm tiền', 'đi cướp', '2021-11-05 23:17:00', '2021-11-05 23:17:00'),
(10, 9, 'đi cướp ngân hàng', 'đi cướp ngân hàng\r\n', '2021-11-06 11:02:00', '2021-11-06 12:01:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `mb_teamid` int(10) NOT NULL,
  `mb_userid` int(10) NOT NULL,
  `mb_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`mb_teamid`, `mb_userid`, `mb_status`) VALUES
(1, 2, 1),
(1, 4, 0),
(1, 8, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `plan`
--

CREATE TABLE `plan` (
  `pl_id` int(10) NOT NULL,
  `pl_userid` int(10) NOT NULL,
  `pl_datestart` date NOT NULL DEFAULT current_timestamp(),
  `pl_deadline` date NOT NULL,
  `pl_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pl_contents` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `plan`
--

INSERT INTO `plan` (`pl_id`, `pl_userid`, `pl_datestart`, `pl_deadline`, `pl_name`, `pl_contents`) VALUES
(2, 2, '2021-10-16', '2021-12-24', '', 'Thế giới muôn màu'),
(3, 1, '2021-10-28', '2021-07-15', '', 'Nộp pdf'),
(4, 1, '2021-10-28', '2021-07-30', '', 'Nộp world'),
(5, 1, '2021-10-28', '2021-12-24', '', 'Nộp Powerpoint'),
(6, 1, '2021-10-28', '2021-08-04', '', 'Nộp Exel'),
(7, 1, '2021-10-28', '2022-03-08', '', 'Nộp Dự án'),
(8, 8, '2021-11-03', '2021-11-29', 'Đi thi', 'Đi thi môn CNW'),
(9, 8, '2021-11-04', '2021-11-29', 'Đi mua siêu nhân', 'Đi đến tiệm đồ chơi mua siêu nhân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `team`
--

CREATE TABLE `team` (
  `tm_id` int(10) NOT NULL,
  `tm_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tm_managerid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `team`
--

INSERT INTO `team` (`tm_id`, `tm_name`, `tm_managerid`) VALUES
(1, 'Nhóm 2', 4),
(4, 'Tuấn Lao công', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `us_id` int(10) NOT NULL,
  `us_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_regdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`us_id`, `us_name`, `us_email`, `us_phone`, `us_regdate`) VALUES
(1, 'Nguyễn Văn Tuấn', 'wwwvannguyentuan@yahoo.com', '1900651252', '2021-04-14'),
(2, 'Trần Văn Tuấn', 'wwwvantuantran@tlu.edu.vn', '1900650252', '2021-10-27'),
(3, 'Trần Đức Anh', 'wwducanhtran@gmail.com', '943369523', '2021-10-04'),
(4, 'Nguyễn Hải Đình', 'wwwhainguyendinh@gmail.com', '943369523', '2021-09-24'),
(5, 'Trần Minh Đức', 'wwtranminhduc@gmail.com', '943369523', '2021-09-01'),
(6, 'Trần Duy Hưng', 'wwhungtranduy@gmail.com', '943369523', '2021-09-16'),
(8, 'Nguyễn Hải Đình', 'lethiquang44@gmail.com', '0124501457', '2021-11-03'),
(9, 'Trần Đực Anh', 'dinhnguyenhai6@gmail.com', '0124501457', '2021-11-04'),
(12, 'kiena222', 'dinhnguyenhai6@gmail.com', '0123456789', '2021-11-06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ac_email`);

--
-- Chỉ mục cho bảng `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`cl_id`),
  ADD KEY `cl_planid` (`cl_planid`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mb_teamid`,`mb_userid`),
  ADD KEY `mb_userid` (`mb_userid`);

--
-- Chỉ mục cho bảng `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pl_id`),
  ADD KEY `pl_userid` (`pl_userid`);

--
-- Chỉ mục cho bảng `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`tm_id`),
  ADD KEY `gr_managerid` (`tm_managerid`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`us_id`),
  ADD KEY `us_email` (`us_email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `calendar`
--
ALTER TABLE `calendar`
  MODIFY `cl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `plan`
--
ALTER TABLE `plan`
  MODIFY `pl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `team`
--
ALTER TABLE `team`
  MODIFY `tm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `us_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`cl_planid`) REFERENCES `plan` (`pl_id`);

--
-- Các ràng buộc cho bảng `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`mb_teamid`) REFERENCES `team` (`tm_id`),
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`mb_userid`) REFERENCES `user` (`us_id`),
  ADD CONSTRAINT `member_ibfk_3` FOREIGN KEY (`mb_teamid`) REFERENCES `team` (`tm_id`);

--
-- Các ràng buộc cho bảng `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`pl_userid`) REFERENCES `user` (`us_id`);

--
-- Các ràng buộc cho bảng `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`tm_managerid`) REFERENCES `user` (`us_id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`us_email`) REFERENCES `account` (`ac_email`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`us_email`) REFERENCES `account` (`ac_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
