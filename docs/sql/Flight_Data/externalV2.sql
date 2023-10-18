-- MySQL dump 10.13  Distrib 8.0.34, for macos13 (arm64)
--
-- Host: 127.0.0.1    
-- Database: transitwise
-- ------------------------------------------------------
-- Server version	8.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP DATABASE IF EXISTS `transitwise`;
CREATE DATABASE IF NOT EXISTS `transitwise` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `transitwise`;

--
-- Table structure for table `airlines`
--

DROP TABLE IF EXISTS `airlines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `airlines` (
  `ALID` int NOT NULL AUTO_INCREMENT,
  `AL_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `website` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ALID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airlines`
--

LOCK TABLES `airlines` WRITE;
/*!40000 ALTER TABLE `airlines` DISABLE KEYS */;
INSERT INTO `airlines` VALUES (1,'JetBlue',NULL),(2,'American Airlines',NULL);
/*!40000 ALTER TABLE `airlines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `airports`
--

DROP TABLE IF EXISTS `airports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `airports` (
  `APID` char(3) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`APID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airports`
--

LOCK TABLES `airports` WRITE;
/*!40000 ALTER TABLE `airports` DISABLE KEYS */;
INSERT INTO `airports` VALUES ('AMS','Schiphol Amsterdam Airport','Amsterdam','North Holland','Netherlands'),('ATL','Hartsfield-Jackson Atlanta International Airport','Atlanta','GA','United States'),('BER','Berlin Brandenburg Airport','Berlin','','Germany'),('BKK','Suvarnabhumi Airport','Bangkok','','Thailand'),('BOM','Chhatrapati Shivaji Maharaj International Airport','Mumbai','Maharashtra','India'),('BOS','Boston Logan International Airport','Boston','MA','United States'),('BWI','Baltimore/Washington International Airport','Baltimore','MD','United States'),('CAI','Cairo International Airport','Cairo','','Egypt'),('CAN','Guangzhou Baiyun International Airport','Guangzhou','Guangzhou Province','China'),('CDG','Paris Charles de Gaulle Airport','Paris','Paris Region','France'),('CLT','Charlotte Douglas International Airport','Charlotte','NC','United States'),('DCA','Ronald Reagan Washington National Airport','Arlington','VA','United States'),('DEL','Indira Gandhi International Airport','New Dehli','Dehli','India'),('DEN','Denver International Airport','Denver','CO','United States'),('DFW','Dallas/Fort Worth International Airport','Dallas-Fort Worth','TX','United States'),('DOH','Hamad International Airport','Doha','','Qatar'),('DTW','Detroit Metropolitan Wayne County Airport','Detroit','MI','United States'),('DXB','Dubai International Airport','Dubai','Emirate of Dubai','United Arab Emirates'),('EWR','Newark Liberty International Airport','Newark','NJ','United States'),('EZE','Ezeiza International Airport','Buenos Aires','','Argentina'),('FCO','Leonardo da Vinci-Fiumicino Airport','Rome','Lazio','Italy'),('FLL','Fort Lauderdale-Hollywood International Airport','Fort Lauderdale','FL','United States'),('FRA','Frankfurt Airport','Frankfurt','Hesse','Germany'),('GRU','Sao Paulo/Guarulhos International Airport','Sao Paulo','Sao Paulo','Brazil'),('HKG','Hong Kong International Airport','Hong Kong','','China'),('HND','Haneda Airport','Tokyo','Tokyo','Japan'),('HNI','Daniel K. Inouye International Airport','Honolulu','HI','United States'),('IAD','Dulles International Airport','Washington','DC','United States'),('IAH','George Bush Intercontinental Airport','Houston','TX','United States'),('ICN','Seoul-Incheon International Airport','Incheon','','South Korea'),('IST','Istanbul Airport','Istanbul','','Turkey'),('JFK','John F. Kennedy International Airport','New York','NY','United States'),('LAS','Harry Reid International Airport','Las Vegas','NV','United States'),('LAX','Los Angeles International Airport','Los Angeles','CA','United States'),('LGA','LaGuardia Airport','New York','NY','United States'),('LHR','Heathrow Airport','London','','United Kingdom'),('MAD','Madrid-Barajas Airport','Madrid','','Spain'),('MCO','Orlando International Airport','Orlando','FL','United States'),('MDW','Chicago Midway International Airport','Chicago','IL','United States'),('MEX','Mexico City International Airport','Mexico City','','Mexico'),('MIA','Miami International Airport','Miami','FL','United States'),('MSP','Minneapolis-St. Paul International Airport','Minneapolis-St. Paul','MN','United States'),('MUC','Munich Airport','Munich','Bavaria','Germany'),('ORD','O\'Hare International Airport','Chicago','IL','United States'),('PDX','Portland International Airport','Portland','OR','United States'),('PHL','Philadelphia International Airport','Philadelphia','PA','United States'),('PHX','Phoenix Sky Harbor International Airport','Phoenix','AZ','United States'),('PVG','Shanghai Pudong International Airport','Shanghai','Shanghai','China'),('SAN','San Diego International Airport','San Diego','CA','United States'),('SEA','Seattle-Tacoma International Airport','Seattle-Tacoma','WA','United States'),('SFO','San Francisco International Airport','San Francisco','CA','United States'),('SIN','Changi Airport','Singapore','','Singapore'),('SJU','Luis Munoz Marin International Airport','San Juan','Puerto Rico','United States'),('SLC','Salt Lake City International Airport','Salt Lake City','UT','United States'),('SVO','Sheremetyevo International Airport','Moscow','','Russia'),('TPA','Tampa International Airport','Tampa','FL','United States');
/*!40000 ALTER TABLE `airports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `EMID` int NOT NULL,
  `ULID` int NOT NULL,
  `UPEID` int NOT NULL,
  `f_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `m_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `l_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `hire_date` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `salary` double NOT NULL,
  `address1` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `address2` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `zip` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `birth_date` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`EMID`),
  KEY `ULID` (`ULID`),
  KEY `UPEID` (`UPEID`),
  CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`ULID`) REFERENCES `login_logs` (`ULID`),
  CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`UPEID`) REFERENCES `user_permission` (`UPEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `external_flights`
--

DROP TABLE IF EXISTS `external_flights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `external_flights` (
  `FDID` int NOT NULL,
  `YEAR` int NOT NULL,
  `MONTH` int NOT NULL,
  `DAY` int NOT NULL,
  `DAY_OF_WEEK` int NOT NULL,
  `AIRLINE` char(2) COLLATE utf8mb4_general_ci NOT NULL,
  `FLIGHT_NUMBER` int NOT NULL,
  `TAIL_NUMBER` char(6) COLLATE utf8mb4_general_ci NOT NULL,
  `ORIGIN_AIRPORT` char(3) COLLATE utf8mb4_general_ci NOT NULL,
  `DESTINATION_AIRPORT` char(3) COLLATE utf8mb4_general_ci NOT NULL,
  `SCHEDULED_DEPARTURE` int NOT NULL,
  `DEPARTURE_TIME` int NOT NULL,
  `DEPARTURE_DELAY` int NOT NULL,
  `TAXI_OUT` int NOT NULL,
  `WHEELS_OFF` int NOT NULL,
  `SCHEDULED_TIME` int NOT NULL,
  `ELAPSED_TIME` int NOT NULL,
  `AIR_TIME` int NOT NULL,
  `DISTANCE` int NOT NULL,
  `WHEELS_ON` int NOT NULL,
  `TAXI_IN` int NOT NULL,
  `SCHEDULED_ARRIVAL` int NOT NULL,
  `ARRIVAL_TIME` int NOT NULL,
  `ARRIVAL_DELAY` int NOT NULL,
  `DIVERTED` int NOT NULL,
  `CANCELLED` int NOT NULL,
  PRIMARY KEY (`FDID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `external_flights`
--

LOCK TABLES `external_flights` WRITE;
/*!40000 ALTER TABLE `external_flights` DISABLE KEYS */;
/*!40000 ALTER TABLE `external_flights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flights`
--

DROP TABLE IF EXISTS `flights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `flights` (
  `FDID` int NOT NULL AUTO_INCREMENT,
  `ALID` int NOT NULL,
  `APID_D` char(3) COLLATE utf8mb4_general_ci NOT NULL,
  `APID_A` char(3) COLLATE utf8mb4_general_ci NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_date` date NOT NULL,
  `arrival_time` time NOT NULL,
  `capacity` int NOT NULL,
  `seats_available` int NOT NULL,
  `plane_model` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `flight_number` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `ticket_cost` double NOT NULL,
  `is_available` int NOT NULL,
  `num_of_stops` int NOT NULL,
  PRIMARY KEY (`FDID`),
  KEY `Departure` (`APID_D`) USING BTREE,
  KEY `Arrival` (`APID_A`) USING BTREE,
  KEY `ALID` (`ALID`) USING BTREE,
  CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`ALID`) REFERENCES `airlines` (`ALID`),
  CONSTRAINT `flights_ibfk_2` FOREIGN KEY (`APID_D`) REFERENCES `airports` (`APID`),
  CONSTRAINT `flights_ibfk_3` FOREIGN KEY (`APID_A`) REFERENCES `airports` (`APID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flights`
--

LOCK TABLES `flights` WRITE;
/*!40000 ALTER TABLE `flights` DISABLE KEYS */;
INSERT INTO `flights` VALUES (1,2,'JFK','LAX','2023-10-14','12:12:00','2023-10-15','16:44:00',10,10,'Boeing 747','123',100,1,0),(3,1,'JFK','LAX','2023-10-14','16:11:59','2023-10-14','20:54:00',200,5,'Boeing 747','124',105,1,0);
/*!40000 ALTER TABLE `flights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_logs`
--

DROP TABLE IF EXISTS `login_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login_logs` (
  `LLID` int NOT NULL AUTO_INCREMENT,
  `ULID` int NOT NULL,
  `time_stamp` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `log` blob NOT NULL,
  PRIMARY KEY (`LLID`),
  KEY `ULID` (`ULID`),
  CONSTRAINT `login_logs_ibfk_1` FOREIGN KEY (`ULID`) REFERENCES `user_login` (`ULID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_logs`
--

LOCK TABLES `login_logs` WRITE;
/*!40000 ALTER TABLE `login_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `RSID` int NOT NULL AUTO_INCREMENT,
  `UPID` int NOT NULL,
  `FDID` int NOT NULL,
  PRIMARY KEY (`RSID`),
  KEY `FDID` (`FDID`),
  KEY `UPID` (`UPID`),
  CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`FDID`) REFERENCES `flights` (`FDID`),
  CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`UPID`) REFERENCES `users` (`UPID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,1,1);
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_logs`
--

DROP TABLE IF EXISTS `status_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_logs` (
  `STID` int NOT NULL AUTO_INCREMENT,
  `UPID` int NOT NULL,
  `time_stamp` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `is_error` int NOT NULL,
  `log` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`STID`),
  KEY `UPID` (`UPID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_logs`
--

LOCK TABLES `status_logs` WRITE;
/*!40000 ALTER TABLE `status_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `TKID` int NOT NULL AUTO_INCREMENT,
  `RSID` int NOT NULL,
  `f_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `m_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `l_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`TKID`),
  KEY `RSID` (`RSID`),
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`RSID`) REFERENCES `reservations` (`RSID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,1,'Lucas','','Pfeifer','8458676832');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_login`
--

DROP TABLE IF EXISTS `user_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_login` (
  `ULID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ULID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_login`
--

LOCK TABLES `user_login` WRITE;
/*!40000 ALTER TABLE `user_login` DISABLE KEYS */;
INSERT INTO `user_login` VALUES (1,'lucas','password'),(2,'lucas.pfeifer','1234'),(3,'lucas.pfeifer','12345');
/*!40000 ALTER TABLE `user_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_permission`
--

DROP TABLE IF EXISTS `user_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_permission` (
  `UPEID` int NOT NULL AUTO_INCREMENT,
  `ULID` int NOT NULL,
  `is_admin` int NOT NULL,
  `is_employee` int NOT NULL,
  `is_customer` int NOT NULL,
  PRIMARY KEY (`UPEID`),
  KEY `ULID` (`ULID`),
  CONSTRAINT `user_permission_ibfk_1` FOREIGN KEY (`ULID`) REFERENCES `user_login` (`ULID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permission`
--

LOCK TABLES `user_permission` WRITE;
/*!40000 ALTER TABLE `user_permission` DISABLE KEYS */;
INSERT INTO `user_permission` VALUES (1,1,0,0,1);
/*!40000 ALTER TABLE `user_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `UPID` int NOT NULL AUTO_INCREMENT,
  `UPEID` int NOT NULL,
  `f_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `m_name` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `l_name` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birth_date` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `address1` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `address2` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `zip` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`UPID`),
  KEY `UPEID` (`UPEID`),
  CONSTRAINT `users_ibfk_3` FOREIGN KEY (`UPEID`) REFERENCES `user_permission` (`UPEID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Lucas',NULL,'Pfeifer','lpfeifer28@gmail.com','8458676832','08-28-2001','355 Milewood Rd',NULL,'Millbrook','NY','12545','$2y$10$pQKlDc72uaLieAplmoZP1.OLXmrNv/VVExog6i8qP/wH8kp5K3ZGu'),(32,1,'Lucas','Bennet','Pfeifer','test@gmail.com','8458676832','2023-10-14','355 Milewood Rd',NULL,'Millbrook','NY','12545','$2y$10$RRZIzkvCxaNmTmN.QGGjZOwDB4BFEKN5QiaQFXtfvKJ6zJf3g13zC'),(33,1,'Lucas','Bennet','Pfeifer','test2@gmail.com','8458676832','2023-10-14','355 Milewood Rd',NULL,'Millbrook','NY','12545','$2y$10$UPDlbnQS3cFBKc.kJhyNrOqUM..vmfjUDm21ZRcNS/aKb.8npkzqi');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-16  2:06:27
