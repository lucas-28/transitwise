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

# print("Getting airlines")
# airlines = get_airlines()
# print("Done getting airlines")

# def write_airlines():
#     with open('airlines.csv', 'w+') as output:
#         csvpath = '/Users/lucas/Downloads/L_CARRIER_HISTORY.csv'
#         with open(csvpath, newline='') as csvfile:
#             reader = csv.reader(csvfile, delimiter=',', quotechar='"')
#             for row in reader:
#                 if row[0] in airlines.keys():
#                     airlines[row[0]] = row[1]
#             output.write("ALID,airline_name\n")
#             for ID in airlines.keys():
#                 output.write(ID +  "," + airlines[ID] + "\n")

# write_airlines()

# prune_aircraft()

def get_airports():
    csvpath = '/Applications/XAMPP/xamppfiles/htdocs/flights2022.csv'
    with open(csvpath, newline='') as csvfile:
        flight_reader = csv.reader(csvfile, delimiter=',', quotechar='"')
        fields = next(flight_reader)
        print(fields)
        airports = set()
        for row in flight_reader:
            # add the origin and destination airports to the set.
            airports.add(row[4])
            airports.add(row[5])
    csvpath = '/Applications/XAMPP/xamppfiles/htdocs/L_AIRPORT.csv'
    with open(csvpath, newline='') as csvfile:
        reader = csv.reader(csvfile, delimiter=',', quotechar='"')
        fields = next(reader)
        print(fields)
        airport_names = {}
        for row in reader:
            if row[0] in airports:
                airport_names[row[0]] = row[1]
        return airport_names

# print("Getting airports")
# airports = get_airports()

dict = {'ABE': 'Allentown/Bethlehem/Easton, PA: Lehigh Valley International', 'ABI': 'Abilene, TX: Abilene Regional', 'ABQ': 'Albuquerque, NM: Albuquerque International Sunport', 'ABR': 'Aberdeen, SD: Aberdeen Regional', 'ABY': 'Albany, GA: Southwest Georgia Regional', 'ACK': 'Nantucket, MA: Nantucket Memorial', 'ACT': 'Waco, TX: Waco Regional', 'ACV': 'Arcata/Eureka, CA: California Redwood Coast Humboldt County', 'ACY': 'Atlantic City, NJ: Atlantic City International', 'ADK': 'Adak Island, AK: Adak', 'ADQ': 'Kodiak, AK: Kodiak Airport', 'AEX': 'Alexandria, LA: Alexandria International', 'AGS': 'Augusta, GA: Augusta Regional at Bush Field', 'AKN': 'King Salmon, AK: King Salmon Airport', 'ALB': 'Albany, NY: Albany International', 'ALO': 'Waterloo, IA: Waterloo Regional', 'ALS': 'Alamosa, CO: San Luis Valley Regional/Bergman Field', 'ALW': 'Walla Walla, WA: Walla Walla Regional', 'AMA': 'Amarillo, TX: Rick Husband Amarillo International', 'ANC': 'Anchorage, AK: Ted Stevens Anchorage International', 'APN': 'Alpena, MI: Alpena County Regional', 'ASE': 'Aspen, CO: Aspen Pitkin County Sardy Field', 'ATL': 'Atlanta, GA: Hartsfield-Jackson Atlanta International', 'ATW': 'Appleton, WI: Appleton International', 'ATY': 'Watertown, SD: Watertown Regional', 'AUS': 'Austin, TX: Austin - Bergstrom International', 'AVL': 'Asheville, NC: Asheville Regional', 'AVP': 'Scranton/Wilkes-Barre, PA: Wilkes Barre Scranton International', 'AZA': 'Phoenix, AZ: Phoenix - Mesa Gateway', 'AZO': 'Kalamazoo, MI: Kalamazoo/Battle Creek International', 'BDL': 'Hartford, CT: Bradley International', 'BET': 'Bethel, AK: Bethel Airport', 'BFF': 'Scottsbluff, NE: Western Neb. Regional/William B. Heilig Field', 'BFL': 'Bakersfield, CA: Meadows Field', 'BGM': 'Binghamton, NY: Greater Binghamton/Edwin A. Link Field', 'BGR': 'Bangor, ME: Bangor International', 'BHM': 'Birmingham, AL: Birmingham-Shuttlesworth International', 'BIH': 'Bishop, CA: Bishop Airport', 'BIL': 'Billings, MT: Billings Logan International', 'BIS': 'Bismarck/Mandan, ND: Bismarck Municipal', 'BJI': 'Bemidji, MN: Bemidji Regional', 'BKG': 'Branson, MO: Branson Airport', 'BLI': 'Bellingham, WA: Bellingham International', 'BLV': 'Belleville, IL: Scott AFB MidAmerica St Louis', 'BMI': 'Bloomington/Normal, IL: Central Il Regional Airport at Bloomington', 'BNA': 'Nashville, TN: Nashville International', 'BOI': 'Boise, ID: Boise Air Terminal', 'BOS': 'Boston, MA: Logan International', 'BPT': 'Beaumont/Port Arthur, TX: Jack Brooks Regional', 'BQK': 'Brunswick, GA: Brunswick Golden Isles', 'BQN': 'Aguadilla, PR: Rafael Hernandez', 'BRD': 'Brainerd, MN: Brainerd Lakes Regional', 'BRO': 'Brownsville, TX: Brownsville South Padre Island International', 'BRW': 'Barrow, AK: Wiley Post/Will Rogers Memorial', 'BTM': 'Butte, MT: Bert Mooney', 'BTR': 'Baton Rouge, LA: Baton Rouge Metropolitan/Ryan Field', 'BTV': 'Burlington, VT: Burlington International', 'BUF': 'Buffalo, NY: Buffalo Niagara International', 'BUR': 'Burbank, CA: Bob Hope', 'BWI': 'Baltimore, MD: Baltimore/Washington International Thurgood Marshall', 'BZN': 'Bozeman, MT: Bozeman Yellowstone International', 'CAE': 'Columbia, SC: Columbia Metropolitan', 'CAK': 'Akron, OH: Akron-Canton Regional', 'CDC': 'Cedar City, UT: Cedar City Regional', 'CDV': 'Cordova, AK: Merle K Mudhole Smith', 'CGI': 'Cape Girardeau, MO: Cape Girardeau Regional', 'CHA': 'Chattanooga, TN: Lovell Field', 'CHO': 'Charlottesville, VA: Charlottesville Albemarle', 'CHS': 'Charleston, SC: Charleston AFB/International', 'CID': 'Cedar Rapids/Iowa City, IA: The Eastern Iowa', 'CIU': 'Sault Ste. Marie, MI: Chippewa County International', 'CKB': 'Clarksburg/Fairmont, WV: North Central West Virginia', 'CLE': 'Cleveland, OH: Cleveland-Hopkins International', 'CLL': 'College Station/Bryan, TX: Easterwood Field', 'CLT': 'Charlotte, NC: Charlotte Douglas International', 'CMH': 'Columbus, OH: John Glenn Columbus International', 'CMI': 'Champaign/Urbana, IL: University of Illinois/Willard', 'CMX': 'Hancock/Houghton, MI: Houghton County Memorial', 'CNY': 'Moab, UT: Canyonlands Regional', 'COD': 'Cody, WY: Yellowstone Regional', 'COS': 'Colorado Springs, CO: City of Colorado Springs Municipal', 'COU': 'Columbia, MO: Columbia Regional', 'CPR': 'Casper, WY: Casper/Natrona County International', 'CRP': 'Corpus Christi, TX: Corpus Christi International', 'CRW': 'Charleston/Dunbar, WV: West Virginia International Yeager', 'CSG': 'Columbus, GA: Columbus Airport', 'CVG': 'Cincinnati, OH: Cincinnati/Northern Kentucky International', 'CWA': 'Mosinee, WI: Central Wisconsin', 'CYS': 'Cheyenne, WY: Cheyenne Regional/Jerry Olson Field', 'DAB': 'Daytona Beach, FL: Daytona Beach International', 'DAL': 'Dallas, TX: Dallas Love Field', 'DAY': 'Dayton, OH: James M Cox/Dayton International', 'DBQ': 'Dubuque, IA: Dubuque Regional', 'DCA': 'Washington, DC: Ronald Reagan Washington National', 'DDC': 'Dodge City, KS: Dodge City Regional', 'DEC': 'Decatur, IL: Decatur Airport', 'DEN': 'Denver, CO: Denver International', 'DFW': 'Dallas/Fort Worth, TX: Dallas/Fort Worth International', 'DHN': 'Dothan, AL: Dothan Regional', 'DIK': 'Dickinson, ND: Dickinson - Theodore Roosevelt Regional', 'DLG': 'Dillingham, AK: Dillingham Airport', 'DLH': 'Duluth, MN: Duluth International', 'DRO': 'Durango, CO: Durango La Plata County', 'DRT': 'Del Rio, TX: Del Rio International', 'DSM': 'Des Moines, IA: Des Moines International', 'DTW': 'Detroit, MI: Detroit Metro Wayne County', 'DVL': 'Devils Lake, ND: Devils Lake Regional', 'EAR': 'Kearney, NE: Kearney Regional', 'EAT': 'Wenatchee, WA: Pangborn Memorial', 'EAU': 'Eau Claire, WI: Chippewa Valley Regional', 'ECP': 'Panama City, FL: Northwest Florida Beaches International', 'EGE': 'Eagle, CO: Eagle County Regional', 'EKO': 'Elko, NV: Elko Regional', 'ELM': 'Elmira/Corning, NY: Elmira/Corning Regional', 'ELP': 'El Paso, TX: El Paso International', 'ERI': 'Erie, PA: Erie International/Tom Ridge Field', 'ESC': 'Escanaba, MI: Delta County', 'EUG': 'Eugene, OR: Mahlon Sweet Field', 'EVV': 'Evansville, IN: Evansville Regional', 'EWN': 'New Bern/Morehead/Beaufort, NC: Coastal Carolina Regional', 'EWR': 'Newark, NJ: Newark Liberty International', 'EYW': 'Key West, FL: Key West International', 'FAI': 'Fairbanks, AK: Fairbanks International', 'FAR': 'Fargo, ND: Hector International', 'FAT': 'Fresno, CA: Fresno Yosemite International', 'FAY': 'Fayetteville, NC: Fayetteville Regional/Grannis Field', 'FCA': 'Kalispell, MT: Glacier Park International', 'FLG': 'Flagstaff, AZ: Flagstaff Pulliam', 'FLL': 'Fort Lauderdale, FL: Fort Lauderdale-Hollywood International', 'FLO': 'Florence, SC: Florence Regional', 'FNT': 'Flint, MI: Bishop International', 'FOD': 'Fort Dodge, IA: Fort Dodge Regional', 'FSD': 'Sioux Falls, SD: Joe Foss Field', 'FSM': 'Fort Smith, AR: Fort Smith Regional', 'FWA': 'Fort Wayne, IN: Fort Wayne International', 'GCC': 'Gillette, WY: Northeast Wyoming Regional', 'GCK': 'Garden City, KS: Garden City Regional', 'GEG': 'Spokane, WA: Spokane International', 'GFK': 'Grand Forks, ND: Grand Forks International', 'GGG': 'Longview, TX: East Texas Regional', 'GJT': 'Grand Junction, CO: Grand Junction Regional', 'GNV': 'Gainesville, FL: Gainesville Regional', 'GPT': 'Gulfport/Biloxi, MS: Gulfport-Biloxi International', 'GRB': 'Green Bay, WI: Green Bay Austin Straubel International', 'GRI': 'Grand Island, NE: Central Nebraska Regional', 'GRK': 'Killeen, TX: Robert Gray AAF', 'GRR': 'Grand Rapids, MI: Gerald R. Ford International', 'GSO': 'Greensboro/High Point, NC: Piedmont Triad International', 'GSP': 'Greer, SC: Greenville-Spartanburg International', 'GST': 'Gustavus, AK: Gustavus Airport', 'GTF': 'Great Falls, MT: Great Falls International', 'GTR': 'Columbus, MS: Golden Triangle Regional', 'GUC': 'Gunnison, CO: Gunnison-Crested Butte Regional', 'GUM': 'Guam, TT: Guam International', 'HDN': 'Hayden, CO: Yampa Valley', 'HGR': 'Hagerstown, MD: Hagerstown Regional-Richard A. Henson Field', 'HHH': 'Hilton Head, SC: Hilton Head Airport', 'HIB': 'Hibbing, MN: Range Regional', 'HLN': 'Helena, MT: Helena Regional', 'HNL': 'Honolulu, HI: Daniel K Inouye International', 'HOB': 'Hobbs, NM: Lea County Regional', 'HOU': 'Houston, TX: William P Hobby', 'HPN': 'White Plains, NY: Westchester County', 'HRL': 'Harlingen/San Benito, TX: Valley International', 'HSV': 'Huntsville, AL: Huntsville International-Carl T Jones Field', 'HTS': 'Ashland, WV: Tri-State/Milton J. Ferguson Field', 'HYA': 'Hyannis, MA: Cape Cod Gateway', 'HYS': 'Hays, KS: Hays Regional', 'IAD': 'Washington, DC: Washington Dulles International', 'IAG': 'Niagara Falls, NY: Niagara Falls International', 'IAH': 'Houston, TX: George Bush Intercontinental/Houston', 'ICT': 'Wichita, KS: Wichita Dwight D Eisenhower National', 'IDA': 'Idaho Falls, ID: Idaho Falls Regional', 'IFP': 'Bullhead City, AZ: Laughlin/Bullhead International', 'ILG': 'Wilmington, DE: New Castle', 'ILM': 'Wilmington, NC: Wilmington International', 'IMT': 'Iron Mountain/Kingsfd, MI: Ford', 'IND': 'Indianapolis, IN: Indianapolis International', 'INL': 'International Falls, MN: Falls International Einarson Field', 'ISP': 'Islip, NY: Long Island MacArthur', 'ITH': 'Ithaca/Cortland, NY: Ithaca Tompkins International', 'ITO': 'Hilo, HI: Hilo International', 'JAC': 'Jackson, WY: Jackson Hole', 'JAN': 'Jackson/Vicksburg, MS: Jackson Medgar Wiley Evers International', 'JAX': 'Jacksonville, FL: Jacksonville International', 'JFK': 'New York, NY: John F. Kennedy International', 'JLN': 'Joplin, MO: Joplin Regional', 'JMS': 'Jamestown, ND: Jamestown Regional', 'JNU': 'Juneau, AK: Juneau International', 'JST': 'Johnstown, PA: John Murtha Johnstown-Cambria County', 'KOA': 'Kona, HI: Ellison Onizuka Kona International at Keahole', 'KTN': 'Ketchikan, AK: Ketchikan International', 'LAN': 'Lansing, MI: Capital Region International', 'LAR': 'Laramie, WY: Laramie Regional', 'LAS': 'Las Vegas, NV: Harry Reid International', 'LAW': 'Lawton/Fort Sill, OK: Lawton-Fort Sill Regional', 'LAX': 'Los Angeles, CA: Los Angeles International', 'LBB': 'Lubbock, TX: Lubbock Preston Smith International', 'LBE': 'Latrobe, PA: Arnold Palmer Regional', 'LBF': 'North Platte, NE: North Platte Regional Airport Lee Bird Field', 'LBL': 'Liberal, KS: Liberal Mid-America Regional', 'LCH': 'Lake Charles, LA: Lake Charles Regional', 'LCK': 'Columbus, OH: Rickenbacker International', 'LEX': 'Lexington, KY: Blue Grass', 'LFT': 'Lafayette, LA: Lafayette Regional Paul Fournet Field', 'LGA': 'New York, NY: LaGuardia', 'LGB': 'Long Beach, CA: Long Beach Airport', 'LIH': 'Lihue, HI: Lihue Airport', 'LIT': 'Little Rock, AR: Bill and Hillary Clinton Nat Adams Field', 'LNK': 'Lincoln, NE: Lincoln Airport', 'LRD': 'Laredo, TX: Laredo International', 'LSE': 'La Crosse, WI: La Crosse Regional', 'LWB': 'Lewisburg, WV: Greenbrier Valley', 'LWS': 'Lewiston, ID: Lewiston Nez Perce County', 'LYH': 'Lynchburg, VA: Lynchburg Regional/Preston Glenn Field', 'MAF': 'Midland/Odessa, TX: Midland International Air and Space Port', 'MBS': 'Saginaw/Bay City/Midland, MI: MBS International', 'MCI': 'Kansas City, MO: Kansas City International', 'MCO': 'Orlando, FL: Orlando International', 'MCW': 'Mason City, IA: Mason City Municipal', 'MDT': 'Harrisburg, PA: Harrisburg International', 'MDW': 'Chicago, IL: Chicago Midway International', 'MEI': 'Meridian, MS: Key Field', 'MEM': 'Memphis, TN: Memphis International', 'MFE': 'Mission/McAllen/Edinburg, TX: McAllen International', 'MFR': 'Medford, OR: Rogue Valley International - Medford', 'MGM': 'Montgomery, AL: Montgomery Regional', 'MHK': 'Manhattan/Ft. Riley, KS: Manhattan Regional', 'MHT': 'Manchester, NH: Manchester Boston Regional', 'MIA': 'Miami, FL: Miami International', 'MKE': 'Milwaukee, WI: General Mitchell International', 'MKG': 'Muskegon, MI: Muskegon County', 'MLB': 'Melbourne, FL: Melbourne Orlando International', 'MLI': 'Moline, IL: Quad Cities International', 'MLU': 'Monroe, LA: Monroe Regional', 'MOB': 'Mobile, AL: Mobile Regional', 'MOT': 'Minot, ND: Minot International', 'MQT': 'Marquette, MI: Marquette Sawyer Regional', 'MRY': 'Monterey, CA: Monterey Regional', 'MSN': 'Madison, WI: Dane County Regional-Truax Field', 'MSO': 'Missoula, MT: Missoula Montana', 'MSP': 'Minneapolis, MN: Minneapolis-St Paul International', 'MSY': 'New Orleans, LA: Louis Armstrong New Orleans International', 'MTJ': 'Montrose/Delta, CO: Montrose Regional', 'MVY': "Martha's Vineyard, MA: Martha's Vineyard Airport", 'MYR': 'Myrtle Beach, SC: Myrtle Beach International', 'OAJ': 'Jacksonville/Camp Lejeune, NC: Albert J Ellis', 'OAK': 'Oakland, CA: Metro Oakland International', 'OGD': 'Ogden, UT: Ogden-Hinckley', 'OGG': 'Kahului, HI: Kahului Airport', 'OGS': 'Ogdensburg, NY: Ogdensburg International', 'OKC': 'Oklahoma City, OK: Will Rogers World', 'OMA': 'Omaha, NE: Eppley Airfield', 'OME': 'Nome, AK: Nome Airport', 'ONT': 'Ontario, CA: Ontario International', 'ORD': "Chicago, IL: Chicago O'Hare International", 'ORF': 'Norfolk, VA: Norfolk International', 'ORH': 'Worcester, MA: Worcester Regional', 'OTH': 'North Bend/Coos Bay, OR: Southwest Oregon Regional', 'OTZ': 'Kotzebue, AK: Ralph Wien Memorial', 'OWB': 'Owensboro, KY: Owensboro Daviess County Regional', 'PAE': 'Everett, WA: Snohomish County', 'PAH': 'Paducah, KY: Barkley Regional', 'PBG': 'Plattsburgh, NY: Plattsburgh International', 'PBI': 'West Palm Beach/Palm Beach, FL: Palm Beach International', 'PDX': 'Portland, OR: Portland International', 'PGD': 'Punta Gorda, FL: Punta Gorda Airport', 'PGV': 'Greenville, NC: Pitt Greenville', 'PHF': 'Newport News/Williamsburg, VA: Newport News/Williamsburg International', 'PHL': 'Philadelphia, PA: Philadelphia International', 'PHX': 'Phoenix, AZ: Phoenix Sky Harbor International', 'PIA': 'Peoria, IL: General Downing - Peoria International', 'PIB': 'Hattiesburg/Laurel, MS: Hattiesburg-Laurel Regional', 'PIE': 'St. Petersburg, FL: St Pete Clearwater International', 'PIH': 'Pocatello, ID: Pocatello Regional', 'PIR': 'Pierre, SD: Pierre Regional', 'PIT': 'Pittsburgh, PA: Pittsburgh International', 'PLN': 'Pellston, MI: Pellston Regional Airport of Emmet County', 'PNS': 'Pensacola, FL: Pensacola International', 'PPG': 'Pago Pago, TT: Pago Pago International', 'PRC': 'Prescott, AZ: Prescott Regional Ernest A Love Field', 'PSC': 'Pasco/Kennewick/Richland, WA: Tri Cities', 'PSE': 'Ponce, PR: Mercedita', 'PSG': 'Petersburg, AK: Petersburg James A Johnson', 'PSM': 'Portsmouth, NH: Portsmouth International at Pease', 'PSP': 'Palm Springs, CA: Palm Springs International', 'PUB': 'Pueblo, CO: Pueblo Memorial', 'PUW': 'Pullman, WA: Pullman Moscow Regional', 'PVD': 'Providence, RI: Rhode Island Tf Green International', 'PVU': 'Provo, UT: Provo Municipal', 'PWM': 'Portland, ME: Portland International Jetport', 'RAP': 'Rapid City, SD: Rapid City Regional', 'RDD': 'Redding, CA: Redding Regional', 'RDM': 'Bend/Redmond, OR: Roberts Field', 'RDU': 'Raleigh/Durham, NC: Raleigh-Durham International', 'RFD': 'Rockford, IL: Chicago/Rockford International', 'RHI': 'Rhinelander, WI: Rhinelander/Oneida County', 'RIC': 'Richmond, VA: Richmond International', 'RIW': 'Riverton/Lander, WY: Central Wyoming Regional', 'RKS': 'Rock Springs, WY: Southwest Wyoming Regional', 'RNO': 'Reno, NV: Reno/Tahoe International', 'ROA': 'Roanoke, VA: Roanoke Blacksburg Regional', 'ROC': 'Rochester, NY: Frederick Douglass Grtr Rochester International', 'ROW': 'Roswell, NM: Roswell Air Center', 'RST': 'Rochester, MN: Rochester International', 'RSW': 'Fort Myers, FL: Southwest Florida International', 'SAF': 'Santa Fe, NM: Santa Fe Municipal', 'SAN': 'San Diego, CA: San Diego International', 'SAT': 'San Antonio, TX: San Antonio International', 'SAV': 'Savannah, GA: Savannah/Hilton Head International', 'SBA': 'Santa Barbara, CA: Santa Barbara Municipal', 'SBN': 'South Bend, IN: South Bend International', 'SBP': 'San Luis Obispo, CA: San Luis County Regional', 'SCC': 'Deadhorse, AK: Deadhorse Airport', 'SCE': 'State College, PA: University Park', 'SCK': 'Stockton, CA: Stockton Metro', 'SDF': 'Louisville, KY: Louisville Muhammad Ali International', 'SEA': 'Seattle, WA: Seattle/Tacoma International', 'SFB': 'Sanford, FL: Orlando Sanford International', 'SFO': 'San Francisco, CA: San Francisco International', 'SGF': 'Springfield, MO: Springfield-Branson National', 'SGU': 'St. George, UT: St George Regional', 'SHD': 'Staunton, VA: Shenandoah Valley Regional', 'SHR': 'Sheridan, WY: Sheridan County', 'SHV': 'Shreveport, LA: Shreveport Regional', 'SIT': 'Sitka, AK: Sitka Rocky Gutierrez', 'SJC': 'San Jose, CA: Norman Y. Mineta San Jose International', 'SJT': 'San Angelo, TX: San Angelo Regional/Mathis Field', 'SJU': 'San Juan, PR: Luis Munoz Marin International', 'SLC': 'Salt Lake City, UT: Salt Lake City International', 'SLN': 'Salina, KS: Salina Regional', 'SMF': 'Sacramento, CA: Sacramento International', 'SMX': 'Santa Maria, CA: Santa Maria Public/Capt. G. Allan Hancock Field', 'SNA': 'Santa Ana, CA: John Wayne Airport-Orange County', 'SPI': 'Springfield, IL: Abraham Lincoln Capital', 'SPN': 'Saipan, TT: Francisco C. Ada Saipan International', 'SPS': 'Wichita Falls, TX: Sheppard AFB/Wichita Falls Municipal', 'SRQ': 'Sarasota/Bradenton, FL: Sarasota/Bradenton International', 'STC': 'St. Cloud, MN: St. Cloud Regional', 'STL': 'St. Louis, MO: St Louis Lambert International', 'STS': 'Santa Rosa, CA: Charles M. Schulz - Sonoma County', 'STT': 'Charlotte Amalie, VI: Cyril E King', 'STX': 'Christiansted, VI: Henry E. Rohlsen', 'SUN': 'Sun Valley/Hailey/Ketchum, ID: Friedman Memorial', 'SUX': 'Sioux City, IA: Sioux Gateway Brig Gen Bud Day Field', 'SWF': 'Newburgh/Poughkeepsie, NY: New York Stewart International', 'SWO': 'Stillwater, OK: Stillwater Regional', 'SYR': 'Syracuse, NY: Syracuse Hancock International', 'TBN': 'Fort Leonard Wood, MO: Waynesville-St. Robert Regional Forney Field', 'TLH': 'Tallahassee, FL: Tallahassee International', 'TOL': 'Toledo, OH: Eugene F Kranz Toledo Express', 'TPA': 'Tampa, FL: Tampa International', 'TRI': 'Bristol/Johnson City/Kingsport, TN: Tri Cities', 'TTN': 'Trenton, NJ: Trenton Mercer', 'TUL': 'Tulsa, OK: Tulsa International', 'TUS': 'Tucson, AZ: Tucson International', 'TVC': 'Traverse City, MI: Cherry Capital', 'TWF': 'Twin Falls, ID: Joslin Field - Magic Valley Regional', 'TXK': 'Texarkana, AR: Texarkana Regional-Webb Field', 'TYR': 'Tyler, TX: Tyler Pounds Regional', 'TYS': 'Knoxville, TN: McGhee Tyson', 'USA': 'Concord, NC: Concord Padgett Regional', 'VCT': 'Victoria, TX: Victoria Regional', 'VEL': 'Vernal, UT: Vernal Regional', 'VLD': 'Valdosta, GA: Valdosta Regional', 'VPS': 'Valparaiso, FL: Eglin AFB Destin Fort Walton Beach', 'WRG': 'Wrangell, AK: Wrangell Airport', 'WYS': 'West Yellowstone, MT: Yellowstone', 'XNA': 'Fayetteville, AR: Northwest Arkansas National', 'XWA': 'Williston, ND: Williston Basin International', 'YAK': 'Yakutat, AK: Yakutat Airport', 'YKM': 'Yakima, WA: Yakima Air Terminal/McAllister Field', 'YUM': 'Yuma, AZ: Yuma MCAS/Yuma International'}
for key, value in dict.items():
    if ":" in value:
        values = value.split(":")
        print(key + "," + values[0] + "," + values[1])



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

