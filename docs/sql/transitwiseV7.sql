-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 09:37 PM
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
-- Table structure for table `employees`
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
  `birth_date` varchar(10) NOT NULL,
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
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EMID`),
  ADD KEY `ULID` (`ULID`),
  ADD KEY `UPEID` (`UPEID`);

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
  MODIFY `APID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
