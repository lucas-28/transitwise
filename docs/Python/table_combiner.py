import csv
import os 

# Path: docs/sql/Flight_Data/L_AIRPORT_ID.csv
# Path: docs/sql/Flight_Data/L_AIRPORT.csv

# write a script to combine the two csv files into one csv file, using the field 'Description' as the key
# the combined csv file should have the following fields:
# ID, Code, Description
# ID is the 'Code' field from L_AIRLINE_ID.csv
# Code is the 'Code' field from L_AIRLINE.csv
# Description is the 'Description' field from L_AIRLINE.csv

def combine_tables():
    with open('/Applications/XAMPP/xamppfiles/htdocs/transitwise/docs/sql/Flight_Data/L_AIRPORT_ID.csv', newline='') as csvfile:
        id_reader = csv.reader(csvfile, delimiter=',', quotechar='"', skipinitialspace=True)
        next(id_reader)
        id_dict = {}
        for row in id_reader:
            id_dict[row[1]] = row[0]
    with open('/Applications/XAMPP/xamppfiles/htdocs/transitwise/docs/sql/Flight_Data/L_AIRPORT.csv', newline='') as csvfile:
        airport_reader = csv.reader(csvfile, delimiter=',', quotechar='"', skipinitialspace=True)
        next(airport_reader)
        with open('/Applications/XAMPP/xamppfiles/htdocs/transitwise/docs/sql/Flight_Data/AIRPORT_COMBINED.csv', 'w', newline='') as combined_csv:
            combined_writer = csv.writer(combined_csv, delimiter=',', quotechar='"', quoting=csv.QUOTE_MINIMAL, skipinitialspace=True)
            combined_writer.writerow(['ID', 'Code', 'Location', 'Name'])
            for row in airport_reader:
                # row[1] is the 'Description' field
                if row[1] in id_dict:
                    # split the 'Description' field into 'Location' and 'Name'
                    if ": " in row[1]:
                        description = row[1].split(': ')
                    else:
                        description = ['', '']
                    combined_writer.writerow([id_dict[row[1]], row[0], description[0], description[1]])
                else:
                    pass

combine_tables()