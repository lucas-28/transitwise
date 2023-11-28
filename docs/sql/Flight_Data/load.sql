USE transitwise;
LOAD DATA LOCAL INFILE '/Applications/XAMPP/xamppfiles/var/mysql/flights1.csv' INTO TABLE external_flights IGNORE 1 LINES;