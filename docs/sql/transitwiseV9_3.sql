-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 09:12 PM
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
-- Table structure for table `airlines`
--
-- Creation: Oct 20, 2023 at 07:06 PM
--

DROP TABLE IF EXISTS `airlines`;
CREATE TABLE `airlines` (
  `ALID` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `website` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`ALID`, `name`, `website`) VALUES
(1, 'JetBlue', NULL),
(2, 'American Airlines', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--
-- Creation: Oct 20, 2023 at 07:06 PM
--

DROP TABLE IF EXISTS `airports`;
CREATE TABLE `airports` (
  `APID` int(11) NOT NULL,
  `code` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`APID`, `code`, `name`, `city`, `state`, `country`) VALUES
(1, 'AMS', 'Schiphol Amsterdam Airport', 'Amsterdam', 'North Holland', 'Netherlands'),
(2, 'ATL', 'Hartsfield-Jackson Atlanta International Airport', 'Atlanta', 'GA', 'United States'),
(3, 'BER', 'Berlin Brandenburg Airport', 'Berlin', '', 'Germany'),
(4, 'BKK', 'Suvarnabhumi Airport', 'Bangkok', '', 'Thailand'),
(5, 'BOM', 'Chhatrapati Shivaji Maharaj International Airport', 'Mumbai', 'Maharashtra', 'India'),
(6, 'BOS', 'Boston Logan International Airport', 'Boston', 'MA', 'United States'),
(7, 'BWI', 'Baltimore/Washington International Airport', 'Baltimore', 'MD', 'United States'),
(8, 'CAI', 'Cairo International Airport', 'Cairo', '', 'Egypt'),
(9, 'CAN', 'Guangzhou Baiyun International Airport', 'Guangzhou', 'Guangzhou Province', 'China'),
(10, 'CDG', 'Paris Charles de Gaulle Airport', 'Paris', 'Paris Region', 'France'),
(11, 'CLT', 'Charlotte Douglas International Airport', 'Charlotte', 'NC', 'United States'),
(12, 'DCA', 'Ronald Reagan Washington National Airport', 'Arlington', 'VA', 'United States'),
(13, 'DEL', 'Indira Gandhi International Airport', 'New Dehli', 'Dehli', 'India'),
(14, 'DEN', 'Denver International Airport', 'Denver', 'CO', 'United States'),
(15, 'DFW', 'Dallas/Fort Worth International Airport', 'Dallas-Fort Worth', 'TX', 'United States'),
(16, 'DOH', 'Hamad International Airport', 'Doha', '', 'Qatar'),
(17, 'DTW', 'Detroit Metropolitan Wayne County Airport', 'Detroit', 'MI', 'United States'),
(18, 'DXB', 'Dubai International Airport', 'Dubai', 'Emirate of Dubai', 'United Arab Emirates'),
(19, 'EWR', 'Newark Liberty International Airport', 'Newark', 'NJ', 'United States'),
(20, 'EZE', 'Ezeiza International Airport', 'Buenos Aires', '', 'Argentina'),
(21, 'FCO', 'Leonardo da Vinci-Fiumicino Airport', 'Rome', 'Lazio', 'Italy'),
(22, 'FLL', 'Fort Lauderdale-Hollywood International Airport', 'Fort Lauderdale', 'FL', 'United States'),
(23, 'FRA', 'Frankfurt Airport', 'Frankfurt', 'Hesse', 'Germany'),
(24, 'GRU', 'Sao Paulo/Guarulhos International Airport', 'Sao Paulo', 'Sao Paulo', 'Brazil'),
(25, 'HKG', 'Hong Kong International Airport', 'Hong Kong', '', 'China'),
(26, 'HND', 'Haneda Airport', 'Tokyo', 'Tokyo', 'Japan'),
(27, 'HNI', 'Daniel K. Inouye International Airport', 'Honolulu', 'HI', 'United States'),
(28, 'IAD', 'Dulles International Airport', 'Washington', 'DC', 'United States'),
(29, 'IAH', 'George Bush Intercontinental Airport', 'Houston', 'TX', 'United States'),
(30, 'ICN', 'Seoul-Incheon International Airport', 'Incheon', '', 'South Korea'),
(31, 'IST', 'Istanbul Airport', 'Istanbul', '', 'Turkey'),
(32, 'JFK', 'John F. Kennedy International Airport', 'New York', 'NY', 'United States'),
(33, 'LAS', 'Harry Reid International Airport', 'Las Vegas', 'NV', 'United States'),
(34, 'LAX', 'Los Angeles International Airport', 'Los Angeles', 'CA', 'United States'),
(35, 'LGA', 'LaGuardia Airport', 'New York', 'NY', 'United States'),
(36, 'LHR', 'Heathrow Airport', 'London', '', 'United Kingdom'),
(37, 'MAD', 'Madrid-Barajas Airport', 'Madrid', '', 'Spain'),
(38, 'MCO', 'Orlando International Airport', 'Orlando', 'FL', 'United States'),
(39, 'MDW', 'Chicago Midway International Airport', 'Chicago', 'IL', 'United States'),
(40, 'MEX', 'Mexico City International Airport', 'Mexico City', '', 'Mexico'),
(41, 'MIA', 'Miami International Airport', 'Miami', 'FL', 'United States'),
(42, 'MSP', 'Minneapolis-St. Paul International Airport', 'Minneapolis-St. Paul', 'MN', 'United States'),
(43, 'MUC', 'Munich Airport', 'Munich', 'Bavaria', 'Germany'),
(44, 'ORD', 'O\'Hare International Airport', 'Chicago', 'IL', 'United States'),
(45, 'PDX', 'Portland International Airport', 'Portland', 'OR', 'United States'),
(46, 'PHL', 'Philadelphia International Airport', 'Philadelphia', 'PA', 'United States'),
(47, 'PHX', 'Phoenix Sky Harbor International Airport', 'Phoenix', 'AZ', 'United States'),
(48, 'PVG', 'Shanghai Pudong International Airport', 'Shanghai', 'Shanghai', 'China'),
(49, 'SAN', 'San Diego International Airport', 'San Diego', 'CA', 'United States'),
(50, 'SEA', 'Seattle-Tacoma International Airport', 'Seattle-Tacoma', 'WA', 'United States'),
(51, 'SFO', 'San Francisco International Airport', 'San Francisco', 'CA', 'United States'),
(52, 'SIN', 'Changi Airport', 'Singapore', '', 'Singapore'),
(53, 'SJU', 'Luis Munoz Marin International Airport', 'San Juan', 'Puerto Rico', 'United States'),
(54, 'SLC', 'Salt Lake City International Airport', 'Salt Lake City', 'UT', 'United States'),
(55, 'SVO', 'Sheremetyevo International Airport', 'Moscow', '', 'Russia'),
(56, 'TPA', 'Tampa International Airport', 'Tampa', 'FL', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--
-- Creation: Oct 23, 2023 at 07:57 PM
--

DROP TABLE IF EXISTS `daily_report`;
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

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--
-- Creation: Oct 20, 2023 at 07:06 PM
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `EMID` int(11) NOT NULL,
  `ULID` int(11) NOT NULL,
  `UPEID` int(11) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `m_name` varchar(25) NOT NULL,
  `l_name` varchar(25) NOT NULL,
  `position` varchar(25) NOT NULL,
  `hire_date` varchar(10) NOT NULL,
  `salary` double NOT NULL,
  `address1` varchar(25) NOT NULL,
  `address2` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `birth_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--
-- Creation: Nov 17, 2023 at 08:08 PM
-- Last update: Nov 17, 2023 at 08:08 PM
--

DROP TABLE IF EXISTS `flights`;
CREATE TABLE `flights` (
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
  `is_available` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`FDID`, `ALID`, `APID_D`, `APID_A`, `departure_time`, `arrival_time`, `capacity`, `seats_available`, `plane_model`, `flight_number`, `ticket_cost`, `is_available`) VALUES
(1, 2, 1, 2, '2023-10-06 02:52:29', '2023-10-06 02:52:29', 10, 10, 'Boeing 747', '123', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--
-- Creation: Oct 20, 2023 at 07:06 PM
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
-- Table structure for table `monthly_report`
--
-- Creation: Oct 23, 2023 at 05:50 PM
--

DROP TABLE IF EXISTS `monthly_report`;
CREATE TABLE `monthly_report` (
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

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--
-- Creation: Oct 20, 2023 at 07:06 PM
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `RSID` int(11) NOT NULL,
  `UPID` int(11) NOT NULL,
  `FDID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`RSID`, `UPID`, `FDID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status_logs`
--
-- Creation: Oct 20, 2023 at 07:06 PM
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
-- Creation: Oct 20, 2023 at 07:06 PM
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

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`TKID`, `RSID`, `f_name`, `m_name`, `l_name`, `phone_number`) VALUES
(1, 1, 'Lucas', '', 'Pfeifer', '8458676832');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--
-- Creation: Oct 20, 2023 at 07:06 PM
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `TRID` int(11) NOT NULL,
  `UPID` int(11) NOT NULL,
  `amount` double NOT NULL,
  `time_stamp` datetime NOT NULL,
  `is_refund` int(1) NOT NULL,
  `log` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Oct 31, 2023 at 08:51 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `UPID` int(11) NOT NULL,
  `UPEID` int(11) NOT NULL,
  `ULID` int(11) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `m_name` varchar(25) DEFAULT NULL,
  `l_name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `birth_date` varchar(10) NOT NULL,
  `address1` varchar(25) NOT NULL,
  `address2` varchar(25) DEFAULT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UPID`, `UPEID`, `ULID`, `f_name`, `m_name`, `l_name`, `email`, `phone`, `birth_date`, `address1`, `address2`, `city`, `state`, `zip`, `password`) VALUES
(1, 1, 1, 'Lucas', NULL, 'Pfeifer', 'lpfeifer28@gmail.com', '8458676832', '08-28-2001', '355 Milewood Rd', NULL, 'Millbrook', 'NY', '12545', '$2y$10$pQKlDc72uaLieAplmoZP1.OLXmrNv/VVExog6i8qP/wH8kp5K3ZGu'),
(2, 1, 3, '', 'Bennet', 'Pfeifer', 'lpfeifer228@gmail.com', '8458676832', '', '355 Milewood Rd', NULL, 'Millbrook', 'NY', '12545', '$2y$10$irvG4XdXf.hH0JZZlWF1f.Oh7yDEB8eQ1r08wGLPWcVAf2MmWqILu'),
(3, 5, 5, 'Aidan', 'Patrick', 'Callan', 'apc@gmail.com', '1234567890', '2003-08-08', '12 Road Dr', 'Apt 1A', 'Nyack', 'NY', '10960', '$2y$10$fQga4/N1W9c8ItZbUVWbGOMy.Q536g6Ihi2aKWSvo/Gln7rNx5Jbu');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--
-- Creation: Oct 20, 2023 at 07:06 PM
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE `user_login` (
  `ULID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`ULID`, `username`, `password`) VALUES
(1, 'lucas', 'password'),
(2, 'lucas.pfeifer', '1234'),
(3, 'lucas.pfeifer', '12345'),
(5, 'aidancallan', 'acpassword');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--
-- Creation: Oct 20, 2023 at 07:06 PM
--

DROP TABLE IF EXISTS `user_permission`;
CREATE TABLE `user_permission` (
  `UPEID` int(11) NOT NULL,
  `ULID` int(11) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_employee` int(1) NOT NULL,
  `is_customer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`UPEID`, `ULID`, `is_admin`, `is_employee`, `is_customer`) VALUES
(1, 1, 0, 0, 1),
(2, 2, 0, 0, 1),
(3, 3, 0, 0, 1),
(5, 5, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `weekly_report`
--
-- Creation: Oct 23, 2023 at 07:52 PM
--

DROP TABLE IF EXISTS `weekly_report`;
CREATE TABLE `weekly_report` (
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
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`ALID`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`APID`);

--
-- Indexes for table `daily_report`
--
ALTER TABLE `daily_report`
  ADD PRIMARY KEY (`DRID`),
  ADD KEY `WRID` (`WRID`),
  ADD KEY `MRID` (`MRID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EMID`),
  ADD KEY `ULID` (`ULID`),
  ADD KEY `UPEID` (`UPEID`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
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
-- Indexes for table `monthly_report`
--
ALTER TABLE `monthly_report`
  ADD PRIMARY KEY (`MRID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TRID`),
  ADD KEY `UPID` (`UPID`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UPID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `UPEID` (`UPEID`),
  ADD KEY `ULID` (`ULID`);

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
-- Indexes for table `weekly_report`
--
ALTER TABLE `weekly_report`
  ADD PRIMARY KEY (`WRID`),
  ADD KEY `MRID` (`MRID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `ALID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `APID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `FDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `LLID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `RSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status_logs`
--
ALTER TABLE `status_logs`
  MODIFY `STID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `TKID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TRID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `ULID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `UPEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_report`
--
ALTER TABLE `daily_report`
  ADD CONSTRAINT `daily_report_ibfk_1` FOREIGN KEY (`WRID`) REFERENCES `weekly_report` (`WRID`),
  ADD CONSTRAINT `daily_report_ibfk_2` FOREIGN KEY (`MRID`) REFERENCES `monthly_report` (`MRID`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`ULID`) REFERENCES `login_logs` (`ULID`),
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`UPEID`) REFERENCES `user_permission` (`UPEID`);

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`ALID`) REFERENCES `airlines` (`ALID`),
  ADD CONSTRAINT `flights_ibfk_2` FOREIGN KEY (`APID_D`) REFERENCES `airports` (`APID`),
  ADD CONSTRAINT `flights_ibfk_3` FOREIGN KEY (`APID_A`) REFERENCES `airports` (`APID`);

--
-- Constraints for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD CONSTRAINT `login_logs_ibfk_1` FOREIGN KEY (`ULID`) REFERENCES `user_login` (`ULID`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`FDID`) REFERENCES `flights` (`FDID`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`UPID`) REFERENCES `users` (`UPID`);

--
-- Constraints for table `status_logs`
--
ALTER TABLE `status_logs`
  ADD CONSTRAINT `status_logs_ibfk_1` FOREIGN KEY (`UPID`) REFERENCES `users` (`UPID`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`RSID`) REFERENCES `reservations` (`RSID`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`UPID`) REFERENCES `users` (`UPID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`UPEID`) REFERENCES `user_permission` (`UPEID`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`ULID`) REFERENCES `user_login` (`ULID`);

--
-- Constraints for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD CONSTRAINT `user_permission_ibfk_1` FOREIGN KEY (`ULID`) REFERENCES `user_login` (`ULID`);

--
-- Constraints for table `weekly_report`
--
ALTER TABLE `weekly_report`
  ADD CONSTRAINT `weekly_report_ibfk_1` FOREIGN KEY (`MRID`) REFERENCES `monthly_report` (`MRID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
