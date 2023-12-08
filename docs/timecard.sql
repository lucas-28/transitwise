-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 11:52 PM
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
-- Table structure for table `timecard`
--

CREATE TABLE `timecard` (
  `TCID` int(11) NOT NULL,
  `EMID` int(11) NOT NULL,
  `date` varchar(25) NOT NULL,
  `start_time` varchar(25) NOT NULL,
  `end_time` varchar(25) DEFAULT NULL,
  `hours` double DEFAULT NULL,
  `hour_type` varchar(25) DEFAULT NULL,
  `wage` decimal(10,2) DEFAULT NULL,
  `is_clockin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timecard`
--

INSERT INTO `timecard` (`TCID`, `EMID`, `date`, `start_time`, `end_time`, `hours`, `hour_type`, `wage`, `is_clockin`) VALUES
(1, 3, '2023-12-07', '2023-12-07 07:05:07', NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timecard`
--
ALTER TABLE `timecard`
  ADD PRIMARY KEY (`TCID`),
  ADD KEY `EMID` (`EMID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timecard`
--
ALTER TABLE `timecard`
  MODIFY `TCID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `timecard`
--
ALTER TABLE `timecard`
  ADD CONSTRAINT `timecard_ibfk_1` FOREIGN KEY (`EMID`) REFERENCES `employees` (`EMID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
