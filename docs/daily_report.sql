-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 11:53 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--

CREATE TABLE `daily_report` (
  `DRID` int(11) NOT NULL,
  `WRID` int(11) NOT NULL,
  `MRID` int(11) NOT NULL,
  `in_progress` int(1) NOT NULL,
  `total_sales_pre_tax` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `total_sales_post_tax` decimal(10,2) NOT NULL,
  `debit_sales` decimal(10,2) NOT NULL,
  `credit_sales` decimal(10,2) NOT NULL,
  `refunds` decimal(10,2) NOT NULL,
  `roundtrip_sales` decimal(10,2) NOT NULL,
  `one_way_sales` decimal(10,2) NOT NULL,
  `expenses` decimal(10,2) NOT NULL,
  `profit_loss` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_report`
--
ALTER TABLE `daily_report`
  ADD PRIMARY KEY (`DRID`),
  ADD KEY `WRID` (`WRID`),
  ADD KEY `MRID` (`MRID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_report`
--
ALTER TABLE `daily_report`
  ADD CONSTRAINT `daily_report_ibfk_1` FOREIGN KEY (`WRID`) REFERENCES `weekly_report` (`WRID`),
  ADD CONSTRAINT `daily_report_ibfk_2` FOREIGN KEY (`MRID`) REFERENCES `monthly_report` (`MRID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
