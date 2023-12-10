USE transitwise;
LOAD DATA INFILE '/Applications/XAMPP/xamppfiles/var/mysql/flights2022.csv' INTO TABLE external_flights FIELDS TERMINATED BY ',' IGNORE 1 LINES;