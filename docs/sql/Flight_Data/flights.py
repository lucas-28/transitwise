print("Starting")
import csv
import os
import random

print(os.path.abspath(os.curdir))
os.chdir("docs/sql/Flight_Data")
csvpath = os.path.abspath(os.curdir) + "/flights.csv"
print(os.path.abspath(os.curdir))

end_file = [
    '\n\nCOMMIT;\n',
    '/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\n',
    '/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\n',
    '/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;\n',
]
def insert(num_rows): 
    with open('transitwiseExternalData.sql', 'a') as table:
        with open(csvpath, newline='') as csvfile:
            flight_reader = csv.reader(csvfile, delimiter=',', quotechar='|')
            next(flight_reader) # skip the header
            # FDID is the primary key for the flight table
            FDID = 1
            lines = []
            while FDID <= num_rows:
                # remove the last 6 columns (we don't need them)
                row = next(flight_reader)[:-6] 
                # add the FDID and the opening parenthesis
                line = "\t(" + str(FDID) + ", '"
                # add the rest of the values
                line = line + "', '".join(row) 
                # remove the last single quote and add the closing parenthesis
                line.removesuffix("'")
                line = line + "'),\n"
                # add the line to the list of lines
                lines.append(line)
                # increment the key
                FDID += 1 
        # remove the last comma, write the data, and add the semicolon
        lines[-1] = lines[-1].removesuffix(",\n")
        table.writelines(lines)
        table.write(";")
        table.writelines(end_file)
    

def count_lines():
    with open(csvpath, newline='') as csvfile:
        flight_reader = csv.reader(csvfile, delimiter=',', quotechar='|')
        next(flight_reader) # skip the header
        count = 0
        for row in flight_reader:
            count += 1
        return count

def find_max_length():
    # Find the maximum integer value of the given fields
    # fields is a list of strings
    # returns a list of integers
    # The ith element of the list is the maximum integer value of the ith field
    # in the fields list
    with open(csvpath, newline='') as csvfile:
        flight_reader = csv.reader(csvfile, delimiter=',', quotechar='|')
        fields = next(flight_reader)
        max_values = [0] * len(fields)
        for row in flight_reader:
            for i in range(len(fields)):
                    length = len(row[i])
                    if length > max_values[i]:
                        max_values[i] = length
        # create a variable field_max_values that is a dictionary where fields[i] is the key and max_values[i] is the value
        field_max_values = dict(zip(fields, max_values))

        return field_max_values

# write a function that finds the number of times the given value appears in the given field
def count_values(field, value):
    count = 0
    with open(csvpath, newline='') as csvfile:
        flight_reader = csv.reader(csvfile, delimiter=',', quotechar='|')
        fields = next(flight_reader)
        for row in flight_reader:
            for i in range(len(fields)):
                if fields[i] == field:
                    if row[i] == value:
                        count += 1
        return count

# write a function to sample 10 random rows from the csv file that match the given field and value
def sample(field, value):
    with open(csvpath, newline='') as csvfile:
        flight_reader = csv.reader(csvfile, delimiter=',', quotechar='|')
        fields = next(flight_reader)
        print(fields)
        rows = []
        for row in flight_reader:
            for i in range(len(fields)):
                if fields[i] == field:
                    if row[i] == value:
                        rows.append(row)
        return random.sample(rows, 10)



search_field = ''
search_value = '2475'

# num_rows = count_lines()
# print("Number of rows: " + str(num_rows))

# print("Finding number of times " + search_value + " appears in " + search_field)
# count = count_values(search_field, search_value)
# print("Number of times " + search_value + " appears in " + search_field + ": " + str(count))

print("Sampling 10 random rows where " + search_field + " = " + search_value)
rows = sample(search_field, search_value)
for i in rows:
    print(i)


# print("Finding max value of all fields")
#field_max_values = find_max_length()
#print(field_max_values)

print("Done")

