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


def prune_aircraft():
    csvpath = '/Applications/XAMPP/xamppfiles/htdocs/flights2022.csv'
    with open(csvpath, newline='') as csvfile:
        flight_reader = csv.reader(csvfile, delimiter=',', quotechar='|')
        fields = next(flight_reader)
        print(fields)
        n_numbers = []

        for row in flight_reader:
            n_number = row[2]
            n_numbers.append(n_number[1:])
        n_numbers = list(set(n_numbers))
        # print(n_numbers)

    csvpath ='/Users/lucas/Downloads/ReleasableAircraft-2/MASTER.csv'
    with open(csvpath, newline='') as csvfile:
        reader = csv.reader(csvfile, delimiter=',', quotechar='|')
        fields = next(reader)
        print(fields)
        model_numbers = {}
        with open('tail_model_lookup.csv', 'w+') as output:
            header = ['tail_number', 'model_number']
            writer = csv.DictWriter(output, fieldnames=header)
            output.write("tail_number,model_number\n")
            for row in reader:
                if str(row[0]) in n_numbers:
                    model_numbers[row[2]] = "N" + row[0] 
            for key, value in model_numbers.items():
                writer.writerow({'tail_number': value, 'model_number': key})

    # csvpath = '/Users/lucas/Downloads/ReleasableAircraft-2/ACFTREF.csv'
    # with open(csvpath, newline='') as csvfile:

    #     reader = csv.reader(csvfile, delimiter=',', quotechar='|')
    #     fields = next(reader)
    #     print(fields)
    #     models = []
    #     for row in reader:
    #         if str(row[0]) in model_numbers:
    #             line = [row[0], row[1], row[2], row[8]]
    #             models.append(",".join(i.strip() for i in line))
    #     models = list(set(models))
    #     models.sort()
    #     with open('aircraft.csv', 'w+') as aircraft:
    #         aircraft.writelines("\n".join(models))
    #         aircraft.write("\n")
        
def get_airlines():
    csvpath = '/Applications/XAMPP/xamppfiles/htdocs/flights2022.csv'
    with open(csvpath, newline='') as csvfile:
        flight_reader = csv.reader(csvfile, delimiter=',', quotechar='|')
        fields = next(flight_reader)
        print(fields)
        airlines = {}
        for row in flight_reader:
            if row[1] not in airlines:
                airlines[row[1]] = ""
        print(airlines)
        return airlines

print("Getting airlines")
airlines = get_airlines()
print("Done getting airlines")

def write_airlines():
    with open('airlines.csv', 'w+') as output:
        csvpath = '/Users/lucas/Downloads/L_CARRIER_HISTORY.csv'
        with open(csvpath, newline='') as csvfile:
            reader = csv.reader(csvfile, delimiter=',', quotechar='"')
            for row in reader:
                if row[0] in airlines.keys():
                    airlines[row[0]] = row[1]
            output.write("ALID,airline_name\n")
            for ID in airlines.keys():
                output.write(ID +  "," + airlines[ID] + "\n")

write_airlines()

# prune_aircraft()





search_field = ''
search_value = '2475'

# num_rows = count_lines()
# print("Number of rows: " + str(num_rows))

# print("Finding number of times " + search_value + " appears in " + search_field)
# count = count_values(search_field, search_value)
# print("Number of times " + search_value + " appears in " + search_field + ": " + str(count))

# print("Sampling 10 random rows where " + search_field + " = " + search_value)
# rows = sample(search_field, search_value)
# for i in rows:
#     print(i)


# print("Finding max value of all fields")
#field_max_values = find_max_length()
#print(field_max_values)

print("Done")

