USE transitwise;
CREATE TABLE `external_flights` (
  `date` int DEFAULT NULL,
  `airline` char(2) CHARACTER SET utf8mb4 DEFAULT NULL,
  `tail_number` char(6) CHARACTER SET utf8mb4 DEFAULT NULL,
  `flight_number` int DEFAULT NULL,
  `origin` char(3) CHARACTER SET utf8mb4 DEFAULT NULL,
  `destination` char(3) CHARACTER SET utf8mb4 DEFAULT NULL,
  `dep_time` int DEFAULT NULL,
  `delay` int DEFAULT NULL,
  `arr_time` int DEFAULT NULL,
  `cancelled` int DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `distance` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
