-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 06:34 PM
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
  `ac_id` int(10) NOT NULL,
  `ac_userid` int(10) NOT NULL,
  `ac_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_pass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ac_resdate` datetime NOT NULL DEFAULT current_timestamp(),
  `ac_status` tinyint(1) NOT NULL DEFAULT 0,
  `ac_level` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `gr_id` int(10) NOT NULL,
  `gr_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gr_memberid` int(10) NOT NULL,
  `gr_managerid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 2, '2021-10-16', '2021-12-24', 'Thế giới muôn màu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `us_id` int(10) NOT NULL,
  `us_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `us_resDate` date NOT NULL DEFAULT current_timestamp(),
  `us_status` tinyint(1) NOT NULL DEFAULT 0,
  `us_level` tinyint(1) NOT NULL DEFAULT 0,
  `us_confirm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`us_id`, `us_name`, `us_email`, `us_phone`, `us_resDate`, `us_status`, `us_level`, `us_confirm`) VALUES
(1, 'Nguyễn Văn Tuấn', 'wwwvannguyentuan@yahoo.com', '1900651252', '0000-00-00', 0, 0, ''),
(2, 'Trần Văn Tuấn', 'wwwvantuantran@tlu.edu.vn', '1900650252', '2021-10-27', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ac_id`),
  ADD KEY `ac_userid` (`ac_userid`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`gr_id`),
  ADD KEY `gr_memberid` (`gr_memberid`),
  ADD KEY `gr_managerid` (`gr_managerid`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`pl_id`),
  ADD KEY `pl_userid` (`pl_userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ac_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `gr_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `pl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `us_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`ac_userid`) REFERENCES `user` (`us_id`);

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`gr_memberid`) REFERENCES `user` (`us_id`),
  ADD CONSTRAINT `group_ibfk_2` FOREIGN KEY (`gr_managerid`) REFERENCES `user` (`us_id`);

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`pl_userid`) REFERENCES `user` (`us_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
