-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 06:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_manage_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ac_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_pass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_resdate` datetime NOT NULL DEFAULT current_timestamp(),
  `ac_status` tinyint(1) NOT NULL DEFAULT 0,
  `ac_level` tinyint(1) NOT NULL DEFAULT 0,
  `ac_confirmed` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ac_email`, `ac_pass`, `ac_resdate`, `ac_status`, `ac_level`, `ac_confirmed`) VALUES
('wwducanhtran@gmail.com', '789', '2021-10-28 17:56:23', 0, 0, ''),
('wwhungtranduy@gmail.com', '234', '2021-10-28 17:56:23', 0, 0, ''),
('wwtranminhduc@gmail.com', '468', '2021-10-28 17:56:23', 0, 0, ''),
('wwwhainguyendinh@gmail.com', '267', '2021-10-28 17:56:23', 0, 0, ''),
('wwwvannguyentuan@yahoo.com', '123', '2021-10-28 17:56:23', 0, 0, ''),
('wwwvantuantran@tlu.edu.vn', '456', '2021-10-28 17:56:23', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `cl_id` int(10) NOT NULL,
  `cl_planid` int(10) NOT NULL,
  `cl_start` datetime NOT NULL DEFAULT current_timestamp(),
  `cl_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`cl_id`, `cl_planid`, `cl_start`, `cl_end`) VALUES
(1, 3, '2021-10-28 18:26:37', '2021-10-13 18:26:52'),
(2, 4, '2021-10-28 18:26:37', '2021-12-23 17:24:01'),
(3, 5, '2021-10-28 18:26:37', '2022-05-17 08:26:31'),
(4, 6, '2021-10-28 18:26:37', '2021-04-20 12:14:48'),
(5, 7, '2021-10-28 18:26:37', '2022-03-10 17:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `pl_id` int(10) NOT NULL,
  `pl_userid` int(10) NOT NULL,
  `pl_datestart` date NOT NULL DEFAULT current_timestamp(),
  `pl_deadline` date NOT NULL,
  `pl_contents` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`pl_id`, `pl_userid`, `pl_datestart`, `pl_deadline`, `pl_contents`) VALUES
(2, 2, '2021-10-16', '2021-12-24', 'Thế giới muôn màu'),
(3, 1, '2021-10-28', '2021-07-15', 'Nộp pdf'),
(4, 1, '2021-10-28', '2021-07-30', 'Nộp world'),
(5, 1, '2021-10-28', '2021-12-24', 'Nộp Powerpoint'),
(6, 1, '2021-10-28', '2021-08-04', 'Nộp Exel'),
(7, 1, '2021-10-28', '2022-03-08', 'Nộp Dự án');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `tm_id` int(10) NOT NULL,
  `tm_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tm_memberid` int(10) NOT NULL,
  `tm_managerid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`tm_id`, `tm_name`, `tm_memberid`, `tm_managerid`) VALUES
(1, 'Nhóm IT', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `us_id` int(10) NOT NULL,
  `us_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_resDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`us_id`, `us_name`, `us_email`, `us_phone`, `us_resDate`) VALUES
(1, 'Nguyễn Văn Tuấn', 'wwwvannguyentuan@yahoo.com', '1900651252', '2021-04-14'),
(2, 'Trần Văn Tuấn', 'wwwvantuantran@tlu.edu.vn', '1900650252', '2021-10-27'),
(3, 'Trần Đức Anh', 'wwducanhtran@gmail.com', '943369523', '2021-10-04'),
(4, 'Nguyễn Hải Đình', 'wwwhainguyendinh@gmail.com', '943369523', '2021-09-24'),
(5, 'Trần Minh Đức', 'wwtranminhduc@gmail.com', '943369523', '2021-09-01'),
(6, 'Trần Duy Hưng', 'wwhungtranduy@gmail.com', '943369523', '2021-09-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ac_email`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`cl_id`),
  ADD KEY `cl_planid` (`cl_planid`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pl_id`),
  ADD KEY `pl_userid` (`pl_userid`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`tm_id`),
  ADD KEY `gr_memberid` (`tm_memberid`),
  ADD KEY `gr_managerid` (`tm_managerid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`us_id`),
  ADD KEY `us_email` (`us_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `cl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `pl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `tm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `us_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `calendar_ibfk_1` FOREIGN KEY (`cl_planid`) REFERENCES `plan` (`pl_id`);

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`pl_userid`) REFERENCES `user` (`us_id`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`tm_memberid`) REFERENCES `user` (`us_id`),
  ADD CONSTRAINT `team_ibfk_2` FOREIGN KEY (`tm_managerid`) REFERENCES `user` (`us_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`us_email`) REFERENCES `account` (`ac_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
