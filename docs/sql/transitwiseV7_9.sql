-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2023 at 04:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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

DROP TABLE IF EXISTS `airlines`;
CREATE TABLE `airlines` (
  `ALID` int(11) NOT NULL,
  `AL_name` varchar(25) NOT NULL,
  `website` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`ALID`, `AL_name`, `website`) VALUES
(1, 'JetBlue', NULL),
(2, 'American Airlines', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

DROP TABLE IF EXISTS `airports`;
CREATE TABLE `airports` (
  `APID` char(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`APID`, `name`, `city`, `state`, `country`) VALUES
('AMS', 'Schiphol Amsterdam Airport', 'Amsterdam', 'North Holland', 'Netherlands'),
('ATL', 'Hartsfield-Jackson Atlanta International Airport', 'Atlanta', 'GA', 'United States'),
('BER', 'Berlin Brandenburg Airport', 'Berlin', '', 'Germany'),
('BKK', 'Suvarnabhumi Airport', 'Bangkok', '', 'Thailand'),
('BOM', 'Chhatrapati Shivaji Maharaj International Airport', 'Mumbai', 'Maharashtra', 'India'),
('BOS', 'Boston Logan International Airport', 'Boston', 'MA', 'United States'),
('BWI', 'Baltimore/Washington International Airport', 'Baltimore', 'MD', 'United States'),
('CAI', 'Cairo International Airport', 'Cairo', '', 'Egypt'),
('CAN', 'Guangzhou Baiyun International Airport', 'Guangzhou', 'Guangzhou Province', 'China'),
('CDG', 'Paris Charles de Gaulle Airport', 'Paris', 'Paris Region', 'France'),
('CLT', 'Charlotte Douglas International Airport', 'Charlotte', 'NC', 'United States'),
('DCA', 'Ronald Reagan Washington National Airport', 'Arlington', 'VA', 'United States'),
('DEL', 'Indira Gandhi International Airport', 'New Dehli', 'Dehli', 'India'),
('DEN', 'Denver International Airport', 'Denver', 'CO', 'United States'),
('DFW', 'Dallas/Fort Worth International Airport', 'Dallas-Fort Worth', 'TX', 'United States'),
('DOH', 'Hamad International Airport', 'Doha', '', 'Qatar'),
('DTW', 'Detroit Metropolitan Wayne County Airport', 'Detroit', 'MI', 'United States'),
('DXB', 'Dubai International Airport', 'Dubai', 'Emirate of Dubai', 'United Arab Emirates'),
('EWR', 'Newark Liberty International Airport', 'Newark', 'NJ', 'United States'),
('EZE', 'Ezeiza International Airport', 'Buenos Aires', '', 'Argentina'),
('FCO', 'Leonardo da Vinci-Fiumicino Airport', 'Rome', 'Lazio', 'Italy'),
('FLL', 'Fort Lauderdale-Hollywood International Airport', 'Fort Lauderdale', 'FL', 'United States'),
('FRA', 'Frankfurt Airport', 'Frankfurt', 'Hesse', 'Germany'),
('GRU', 'Sao Paulo/Guarulhos International Airport', 'Sao Paulo', 'Sao Paulo', 'Brazil'),
('HKG', 'Hong Kong International Airport', 'Hong Kong', '', 'China'),
('HND', 'Haneda Airport', 'Tokyo', 'Tokyo', 'Japan'),
('HNI', 'Daniel K. Inouye International Airport', 'Honolulu', 'HI', 'United States'),
('IAD', 'Dulles International Airport', 'Washington', 'DC', 'United States'),
('IAH', 'George Bush Intercontinental Airport', 'Houston', 'TX', 'United States'),
('ICN', 'Seoul-Incheon International Airport', 'Incheon', '', 'South Korea'),
('IST', 'Istanbul Airport', 'Istanbul', '', 'Turkey'),
('JFK', 'John F. Kennedy International Airport', 'New York', 'NY', 'United States'),
('LAS', 'Harry Reid International Airport', 'Las Vegas', 'NV', 'United States'),
('LAX', 'Los Angeles International Airport', 'Los Angeles', 'CA', 'United States'),
('LGA', 'LaGuardia Airport', 'New York', 'NY', 'United States'),
('LHR', 'Heathrow Airport', 'London', '', 'United Kingdom'),
('MAD', 'Madrid-Barajas Airport', 'Madrid', '', 'Spain'),
('MCO', 'Orlando International Airport', 'Orlando', 'FL', 'United States'),
('MDW', 'Chicago Midway International Airport', 'Chicago', 'IL', 'United States'),
('MEX', 'Mexico City International Airport', 'Mexico City', '', 'Mexico'),
('MIA', 'Miami International Airport', 'Miami', 'FL', 'United States'),
('MSP', 'Minneapolis-St. Paul International Airport', 'Minneapolis-St. Paul', 'MN', 'United States'),
('MUC', 'Munich Airport', 'Munich', 'Bavaria', 'Germany'),
('ORD', 'O\'Hare International Airport', 'Chicago', 'IL', 'United States'),
('PDX', 'Portland International Airport', 'Portland', 'OR', 'United States'),
('PHL', 'Philadelphia International Airport', 'Philadelphia', 'PA', 'United States'),
('PHX', 'Phoenix Sky Harbor International Airport', 'Phoenix', 'AZ', 'United States'),
('PVG', 'Shanghai Pudong International Airport', 'Shanghai', 'Shanghai', 'China'),
('SAN', 'San Diego International Airport', 'San Diego', 'CA', 'United States'),
('SEA', 'Seattle-Tacoma International Airport', 'Seattle-Tacoma', 'WA', 'United States'),
('SFO', 'San Francisco International Airport', 'San Francisco', 'CA', 'United States'),
('SIN', 'Changi Airport', 'Singapore', '', 'Singapore'),
('SJU', 'Luis Munoz Marin International Airport', 'San Juan', 'Puerto Rico', 'United States'),
('SLC', 'Salt Lake City International Airport', 'Salt Lake City', 'UT', 'United States'),
('SVO', 'Sheremetyevo International Airport', 'Moscow', '', 'Russia'),
('TPA', 'Tampa International Airport', 'Tampa', 'FL', 'United States');

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
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
CREATE TABLE `flights` (
  `FDID` int(11) NOT NULL,
  `ALID` int(11) NOT NULL,
  `APID_D` char(3) NOT NULL,
  `APID_A` char(3) NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_date` date NOT NULL,
  `arrival_time` time NOT NULL,
  `capacity` int(4) NOT NULL,
  `seats_available` int(4) NOT NULL,
  `plane_model` varchar(25) NOT NULL,
  `flight_number` varchar(25) NOT NULL,
  `ticket_cost` double NOT NULL,
  `is_available` int(1) NOT NULL,
  `num_of_stops` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`FDID`, `ALID`, `APID_D`, `APID_A`, `departure_date`, `departure_time`, `arrival_date`, `arrival_time`, `capacity`, `seats_available`, `plane_model`, `flight_number`, `ticket_cost`, `is_available`, `num_of_stops`) VALUES
(1, 2, 'JFK', 'LAX', '2023-10-14', '12:12:00', '2023-10-15', '16:44:00', 10, 10, 'Boeing 747', '123', 100, 1, 0),
(3, 1, 'JFK', 'LAX', '2023-10-14', '16:11:59', '2023-10-14', '20:54:00', 200, 5, 'Boeing 747', '124', 105, 1, 0);

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
-- Table structure for table `reservations`
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

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`TKID`, `RSID`, `f_name`, `m_name`, `l_name`, `phone_number`) VALUES
(1, 1, 'Lucas', '', 'Pfeifer', '8458676832');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `UPID` int(11) NOT NULL,
  `UPEID` int(11) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `m_name` varchar(25) DEFAULT NULL,
  `l_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
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

INSERT INTO `users` (`UPID`, `UPEID`, `f_name`, `m_name`, `l_name`, `email`, `phone`, `birth_date`, `address1`, `address2`, `city`, `state`, `zip`, `password`) VALUES
(1, 1, 'Lucas', NULL, 'Pfeifer', 'lpfeifer28@gmail.com', '8458676832', '08-28-2001', '355 Milewood Rd', NULL, 'Millbrook', 'NY', '12545', '$2y$10$pQKlDc72uaLieAplmoZP1.OLXmrNv/VVExog6i8qP/wH8kp5K3ZGu'),
(32, 1, 'Lucas', 'Bennet', 'Pfeifer', 'test@gmail.com', '8458676832', '2023-10-14', '355 Milewood Rd', NULL, 'Millbrook', 'NY', '12545', '$2y$10$RRZIzkvCxaNmTmN.QGGjZOwDB4BFEKN5QiaQFXtfvKJ6zJf3g13zC'),
(33, 1, 'Lucas', 'Bennet', 'Pfeifer', 'test2@gmail.com', '8458676832', '2023-10-14', '355 Milewood Rd', NULL, 'Millbrook', 'NY', '12545', '$2y$10$UPDlbnQS3cFBKc.kJhyNrOqUM..vmfjUDm21ZRcNS/aKb.8npkzqi');

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

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`ULID`, `username`, `password`) VALUES
(1, 'lucas', 'password'),
(2, 'lucas.pfeifer', '1234'),
(3, 'lucas.pfeifer', '12345');

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

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`UPEID`, `ULID`, `is_admin`, `is_employee`, `is_customer`) VALUES
(1, 1, 0, 0, 1);

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
  ADD KEY `Departure` (`APID_D`) USING BTREE,
  ADD KEY `Arrival` (`APID_A`) USING BTREE,
  ADD KEY `ALID` (`ALID`) USING BTREE;

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`LLID`),
  ADD KEY `ULID` (`ULID`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UPID`),
  ADD KEY `UPEID` (`UPEID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `ALID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `FDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `ULID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `UPEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`RSID`) REFERENCES `reservations` (`RSID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`UPEID`) REFERENCES `user_permission` (`UPEID`);

--
-- Constraints for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD CONSTRAINT `user_permission_ibfk_1` FOREIGN KEY (`ULID`) REFERENCES `user_login` (`ULID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
