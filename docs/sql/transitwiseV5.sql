-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 12:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transitwise`
--
DROP DATABASE IF EXISTS `transitwise`;
CREATE DATABASE IF NOT EXISTS `transitwise` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `transitwise`;

-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

DROP TABLE IF EXISTS `airline`;
CREATE TABLE `airline` (
  `ALID` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

DROP TABLE IF EXISTS `airports`;
CREATE TABLE `airports` (
  `APID` int(11) NOT NULL,
  `code` varchar(3) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flight_data`
--

DROP TABLE IF EXISTS `flight_data`;
CREATE TABLE `flight_data` (
  `FDID` int(11) NOT NULL,
  `ALID` int(11) NOT NULL,
  `APID_D` int(11) NOT NULL,
  `APID_A` int(11) NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `capacity` int(4) NOT NULL,
  `seats_available` int(4) NOT NULL,
  `plane_model` varchar(25) NOT NULL,
  `flight_number` varchar(25) NOT NULL,
  `ticket_cost` double NOT NULL,
  `is_available` int(1) NOT NULL,
  `num_of_stops` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

DROP TABLE IF EXISTS `login_logs`;
CREATE TABLE `login_logs` (
  `LLID` int(11) NOT NULL,
  `ULID` int(11) NOT NULL,
  `time_stamp` varchar(25) NOT NULL,
  `status` int(1) NOT NULL,
  `log` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_data`
--

DROP TABLE IF EXISTS `reservation_data`;
CREATE TABLE `reservation_data` (
  `RSID` int(11) NOT NULL,
  `UPID` int(11) NOT NULL,
  `FDID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_logs`
--

DROP TABLE IF EXISTS `status_logs`;
CREATE TABLE `status_logs` (
  `STID` int(11) NOT NULL,
  `UPID` int(11) NOT NULL,
  `time_stamp` varchar(25) NOT NULL,
  `is_error` int(1) NOT NULL,
  `log` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `TKID` int(11) NOT NULL,
  `RSID` int(11) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `m_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `phone_number` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE `user_login` (
  `ULID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

DROP TABLE IF EXISTS `user_permission`;
CREATE TABLE `user_permission` (
  `UPEID` int(11) NOT NULL,
  `ULID` int(11) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_employee` int(1) NOT NULL,
  `is_customer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE `user_profile` (
  `UPID` int(11) NOT NULL,
  `ULID` int(11) NOT NULL,
  `UPEID` int(11) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `m_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `address1` varchar(25) NOT NULL,
  `address2` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`ALID`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`APID`);

--
-- Indexes for table `flight_data`
--
ALTER TABLE `flight_data`
  ADD PRIMARY KEY (`FDID`),
  ADD UNIQUE KEY `ALID` (`ALID`),
  ADD KEY `Arrival` (`APID_A`),
  ADD KEY `departure` (`APID_D`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`LLID`),
  ADD KEY `ULID` (`ULID`);

--
-- Indexes for table `reservation_data`
--
ALTER TABLE `reservation_data`
  ADD PRIMARY KEY (`RSID`),
  ADD KEY `FDID` (`FDID`),
  ADD KEY `UPID` (`UPID`);

--
-- Indexes for table `status_logs`
--
ALTER TABLE `status_logs`
  ADD PRIMARY KEY (`STID`),
  ADD KEY `UPID` (`UPID`) USING BTREE;

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`TKID`),
  ADD KEY `RSID` (`RSID`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`ULID`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`UPEID`),
  ADD KEY `ULID` (`ULID`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`UPID`),
  ADD KEY `ULID` (`ULID`),
  ADD KEY `UPEID` (`UPEID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airline`
--
ALTER TABLE `airline`
  MODIFY `ALID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `APID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flight_data`
--
ALTER TABLE `flight_data`
  MODIFY `FDID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `LLID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation_data`
--
ALTER TABLE `reservation_data`
  MODIFY `RSID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_logs`
--
ALTER TABLE `status_logs`
  MODIFY `STID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `TKID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `ULID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `UPID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight_data`
--
ALTER TABLE `flight_data`
  ADD CONSTRAINT `flight_data_ibfk_1` FOREIGN KEY (`ALID`) REFERENCES `airline` (`ALID`),
  ADD CONSTRAINT `flight_data_ibfk_2` FOREIGN KEY (`APID_D`) REFERENCES `airports` (`APID`),
  ADD CONSTRAINT `flight_data_ibfk_3` FOREIGN KEY (`APID_A`) REFERENCES `airports` (`APID`);

--
-- Constraints for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD CONSTRAINT `login_logs_ibfk_1` FOREIGN KEY (`ULID`) REFERENCES `user_login` (`ULID`);

--
-- Constraints for table `reservation_data`
--
ALTER TABLE `reservation_data`
  ADD CONSTRAINT `reservation_data_ibfk_1` FOREIGN KEY (`FDID`) REFERENCES `flight_data` (`FDID`),
  ADD CONSTRAINT `reservation_data_ibfk_2` FOREIGN KEY (`UPID`) REFERENCES `user_profile` (`UPID`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`RSID`) REFERENCES `reservation_data` (`RSID`);

--
-- Constraints for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD CONSTRAINT `user_permission_ibfk_1` FOREIGN KEY (`ULID`) REFERENCES `user_login` (`ULID`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`UPEID`) REFERENCES `user_permission` (`UPEID`),
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`ULID`) REFERENCES `user_login` (`ULID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
