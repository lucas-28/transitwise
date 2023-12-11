


class Airport {
    // class to store airport information
    constructor(code, city, state, name) {
        this.code = code;
        this.city = city;
        this.state = state;
        this.name = name;
    }
}

const getSearchBoxes = document.getElementsByClassName('airport-input');

for (const input of getSearchBoxes) {

    // create a new list for each input
    console.log(input.parentElement.id);
    const list = document.createElement('ul');
    list.setAttribute('class', 'airport-list');
    list.setAttribute('id', input.parentElement.id + "-list");
    list.style.display = "none";
    input.parentNode.appendChild(list);

    // add event listeners
    input.addEventListener('focus', displayResultsList);
    input.addEventListener('keyup', createResultsList);
    input.addEventListener('blur', hideResultsList);
}

function displayResultsList(event){
    // when the input is focused, display the list
    console.log('displaying');
    const list = event.target.nextElementSibling;
    let itemCount = list.getAttribute('data-item-count');
    if (itemCount > 0) {
        list.style.display = "flex";
    }
}

function hideResultsList(event) {
    // when the input is unfocused, hide the list
    console.log('hiding');
    setTimeout(function() {
        const list = event.target.nextElementSibling;
        // list.childNodes.forEach(child => {
        //     list.removeChild(child);
        // });
        list.style.display = "none";
    }, 500);
}

function selectListItem(event) {
    // when a list item is selected, set the input value to the selected item
    console.log(event.target);
    const list = event.target.parentElement;
    const input = document.getElementById(list.id.split("-")[0] + "-input");
    console.log("The input element is: ");
    console.log(input);
    console.log("The previous input value was %s", input.value);
    
    input.value = event.target.id;
    input.focus();
    list.childNodes.forEach(child => {
        list.removeChild(child);
    });
    list.setAttribute('data-item-count', 0);
    list.style.display = "none";
    console.log("The new input value is %s", input.value);
}

function createResultsList(event) {
    // when the input is typed in, create a list of matching airports
    const list = event.target.nextElementSibling;
    let itemCount = list.getAttribute('data-item-count');
    const searchQuery = event.target.value.toLowerCase().trim();

    // If the search query is greater than 2 chars, display matches
    if (searchQuery.length > 0) {
        airportObjects.forEach(airport => {
            let element = document.getElementById(airport.code);
            // checks to see if airport is already added to list
            if (element)  {
                if (airport.code.toLowerCase().indexOf(searchQuery) == -1 && airport.name.toLowerCase().indexOf(searchQuery) == -1 && airport.city.toLowerCase().indexOf(searchQuery) == -1) {
                    //console.log("removing")
                    element.remove();
                    list.setAttribute('data-item-count', itemCount - 1);
                    itemCount--;
                }
            }
            else if (airport.city.toLowerCase().indexOf(searchQuery) > -1 || airport.name.toLowerCase().indexOf(searchQuery) > -1 || airport.code.toLowerCase().indexOf(searchQuery) > -1) {
                // Create new element: written by copilot with help of mdn web docs
                //console.log("adding")
                const newListItem = document.createElement('li');
                newListItem.textContent = airport.code + " - " + airport.name + " - " + airport.city + ", " + airport.state;
                newListItem.setAttribute('class', 'originListItem');
                newListItem.setAttribute('id', airport.code);
                //currentAirports.push(airport.code);
                list.appendChild(newListItem);
                newListItem.addEventListener('click', selectListItem);
                list.setAttribute('data-item-count', itemCount + 1);
                itemCount++;
            }
            else{ return;}
        });
        console.log(itemCount)
        if (itemCount > 0) {
            console.log("displaying")
            list.style.display = "flex";
        }
        return;
    }
}

const airports = 
"ABE,Allentown/Bethlehem/Easton, PA, Lehigh Valley International\n"
+ "ABI,Abilene, TX, Abilene Regional\n"
+ "ABQ,Albuquerque, NM, Albuquerque International Sunport\n"
+ "ABR,Aberdeen, SD, Aberdeen Regional\n"
+ "ABY,Albany, GA, Southwest Georgia Regional\n"
+ "ACK,Nantucket, MA, Nantucket Memorial\n"
+ "ACT,Waco, TX, Waco Regional\n"
+ "ACV,Arcata/Eureka, CA, California Redwood Coast Humboldt County\n"
+ "ACY,Atlantic City, NJ, Atlantic City International\n"
+ "ADK,Adak Island, AK, Adak\n"
+ "ADQ,Kodiak, AK, Kodiak Airport\n"
+ "AEX,Alexandria, LA, Alexandria International\n"
+ "AGS,Augusta, GA, Augusta Regional at Bush Field\n"
+ "AKN,King Salmon, AK, King Salmon Airport\n"
+ "ALB,Albany, NY, Albany International\n"
+ "ALO,Waterloo, IA, Waterloo Regional\n"
+ "ALS,Alamosa, CO, San Luis Valley Regional/Bergman Field\n"
+ "ALW,Walla Walla, WA, Walla Walla Regional\n"
+ "AMA,Amarillo, TX, Rick Husband Amarillo International\n"
+ "ANC,Anchorage, AK, Ted Stevens Anchorage International\n"
+ "APN,Alpena, MI, Alpena County Regional\n"
+ "ASE,Aspen, CO, Aspen Pitkin County Sardy Field\n"
+ "ATL,Atlanta, GA, Hartsfield-Jackson Atlanta International\n"
+ "ATW,Appleton, WI, Appleton International\n"
+ "ATY,Watertown, SD, Watertown Regional\n"
+ "AUS,Austin, TX, Austin - Bergstrom International\n"
+ "AVL,Asheville, NC, Asheville Regional\n"
+ "AVP,Scranton/Wilkes-Barre, PA, Wilkes Barre Scranton International\n"
+ "AZA,Phoenix, AZ, Phoenix - Mesa Gateway\n"
+ "AZO,Kalamazoo, MI, Kalamazoo/Battle Creek International\n"
+ "BDL,Hartford, CT, Bradley International\n"
+ "BET,Bethel, AK, Bethel Airport\n"
+ "BFF,Scottsbluff, NE, Western Neb. Regional/William B. Heilig Field\n"
+ "BFL,Bakersfield, CA, Meadows Field\n"
+ "BGM,Binghamton, NY, Greater Binghamton/Edwin A. Link Field\n"
+ "BGR,Bangor, ME, Bangor International\n"
+ "BHM,Birmingham, AL, Birmingham-Shuttlesworth International\n"
+ "BIH,Bishop, CA, Bishop Airport\n"
+ "BIL,Billings, MT, Billings Logan International\n"
+ "BIS,Bismarck/Mandan, ND, Bismarck Municipal\n"
+ "BJI,Bemidji, MN, Bemidji Regional\n"
+ "BKG,Branson, MO, Branson Airport\n"
+ "BLI,Bellingham, WA, Bellingham International\n"
+ "BLV,Belleville, IL, Scott AFB MidAmerica St Louis\n"
+ "BMI,Bloomington/Normal, IL, Central Il Regional Airport at Bloomington\n"
+ "BNA,Nashville, TN, Nashville International\n"
+ "BOI,Boise, ID, Boise Air Terminal\n"
+ "BOS,Boston, MA, Logan International\n"
+ "BPT,Beaumont/Port Arthur, TX, Jack Brooks Regional\n"
+ "BQK,Brunswick, GA, Brunswick Golden Isles\n"
+ "BQN,Aguadilla, PR, Rafael Hernandez\n"
+ "BRD,Brainerd, MN, Brainerd Lakes Regional\n"
+ "BRO,Brownsville, TX, Brownsville South Padre Island International\n"
+ "BRW,Barrow, AK, Wiley Post/Will Rogers Memorial\n"
+ "BTM,Butte, MT, Bert Mooney\n"
+ "BTR,Baton Rouge, LA, Baton Rouge Metropolitan/Ryan Field\n"
+ "BTV,Burlington, VT, Burlington International\n"
+ "BUF,Buffalo, NY, Buffalo Niagara International\n"
+ "BUR,Burbank, CA, Bob Hope\n"
+ "BWI,Baltimore, MD, Baltimore/Washington International Thurgood Marshall\n"
+ "BZN,Bozeman, MT, Bozeman Yellowstone International\n"
+ "CAE,Columbia, SC, Columbia Metropolitan\n"
+ "CAK,Akron, OH, Akron-Canton Regional\n"
+ "CDC,Cedar City, UT, Cedar City Regional\n"
+ "CDV,Cordova, AK, Merle K Mudhole Smith\n"
+ "CGI,Cape Girardeau, MO, Cape Girardeau Regional\n"
+ "CHA,Chattanooga, TN, Lovell Field\n"
+ "CHO,Charlottesville, VA, Charlottesville Albemarle\n"
+ "CHS,Charleston, SC, Charleston AFB/International\n"
+ "CID,Cedar Rapids/Iowa City, IA, The Eastern Iowa\n"
+ "CIU,Sault Ste. Marie, MI, Chippewa County International\n"
+ "CKB,Clarksburg/Fairmont, WV, North Central West Virginia\n"
+ "CLE,Cleveland, OH, Cleveland-Hopkins International\n"
+ "CLL,College Station/Bryan, TX, Easterwood Field\n"
+ "CLT,Charlotte, NC, Charlotte Douglas International\n"
+ "CMH,Columbus, OH, John Glenn Columbus International\n"
+ "CMI,Champaign/Urbana, IL, University of Illinois/Willard\n"
+ "CMX,Hancock/Houghton, MI, Houghton County Memorial\n"
+ "CNY,Moab, UT, Canyonlands Regional\n"
+ "COD,Cody, WY, Yellowstone Regional\n"
+ "COS,Colorado Springs, CO, City of Colorado Springs Municipal\n"
+ "COU,Columbia, MO, Columbia Regional\n"
+ "CPR,Casper, WY, Casper/Natrona County International\n"
+ "CRP,Corpus Christi, TX, Corpus Christi International\n"
+ "CRW,Charleston/Dunbar, WV, West Virginia International Yeager\n"
+ "CSG,Columbus, GA, Columbus Airport\n"
+ "CVG,Cincinnati, OH, Cincinnati/Northern Kentucky International\n"
+ "CWA,Mosinee, WI, Central Wisconsin\n"
+ "CYS,Cheyenne, WY, Cheyenne Regional/Jerry Olson Field\n"
+ "DAB,Daytona Beach, FL, Daytona Beach International\n"
+ "DAL,Dallas, TX, Dallas Love Field\n"
+ "DAY,Dayton, OH, James M Cox/Dayton International\n"
+ "DBQ,Dubuque, IA, Dubuque Regional\n"
+ "DCA,Washington, DC, Ronald Reagan Washington National\n"
+ "DDC,Dodge City, KS, Dodge City Regional\n"
+ "DEC,Decatur, IL, Decatur Airport\n"
+ "DEN,Denver, CO, Denver International\n"
+ "DFW,Dallas/Fort Worth, TX, Dallas/Fort Worth International\n"
+ "DHN,Dothan, AL, Dothan Regional\n"
+ "DIK,Dickinson, ND, Dickinson - Theodore Roosevelt Regional\n"
+ "DLG,Dillingham, AK, Dillingham Airport\n"
+ "DLH,Duluth, MN, Duluth International\n"
+ "DRO,Durango, CO, Durango La Plata County\n"
+ "DRT,Del Rio, TX, Del Rio International\n"
+ "DSM,Des Moines, IA, Des Moines International\n"
+ "DTW,Detroit, MI, Detroit Metro Wayne County\n"
+ "DVL,Devils Lake, ND, Devils Lake Regional\n"
+ "EAR,Kearney, NE, Kearney Regional\n"
+ "EAT,Wenatchee, WA, Pangborn Memorial\n"
+ "EAU,Eau Claire, WI, Chippewa Valley Regional\n"
+ "ECP,Panama City, FL, Northwest Florida Beaches International\n"
+ "EGE,Eagle, CO, Eagle County Regional\n"
+ "EKO,Elko, NV, Elko Regional\n"
+ "ELM,Elmira/Corning, NY, Elmira/Corning Regional\n"
+ "ELP,El Paso, TX, El Paso International\n"
+ "ERI,Erie, PA, Erie International/Tom Ridge Field\n"
+ "ESC,Escanaba, MI, Delta County\n"
+ "EUG,Eugene, OR, Mahlon Sweet Field\n"
+ "EVV,Evansville, IN, Evansville Regional\n"
+ "EWN,New Bern/Morehead/Beaufort, NC, Coastal Carolina Regional\n"
+ "EWR,Newark, NJ, Newark Liberty International\n"
+ "EYW,Key West, FL, Key West International\n"
+ "FAI,Fairbanks, AK, Fairbanks International\n"
+ "FAR,Fargo, ND, Hector International\n"
+ "FAT,Fresno, CA, Fresno Yosemite International\n"
+ "FAY,Fayetteville, NC, Fayetteville Regional/Grannis Field\n"
+ "FCA,Kalispell, MT, Glacier Park International\n"
+ "FLG,Flagstaff, AZ, Flagstaff Pulliam\n"
+ "FLL,Fort Lauderdale, FL, Fort Lauderdale-Hollywood International\n"
+ "FLO,Florence, SC, Florence Regional\n"
+ "FNT,Flint, MI, Bishop International\n"
+ "FOD,Fort Dodge, IA, Fort Dodge Regional\n"
+ "FSD,Sioux Falls, SD, Joe Foss Field\n"
+ "FSM,Fort Smith, AR, Fort Smith Regional\n"
+ "FWA,Fort Wayne, IN, Fort Wayne International\n"
+ "GCC,Gillette, WY, Northeast Wyoming Regional\n"
+ "GCK,Garden City, KS, Garden City Regional\n"
+ "GEG,Spokane, WA, Spokane International\n"
+ "GFK,Grand Forks, ND, Grand Forks International\n"
+ "GGG,Longview, TX, East Texas Regional\n"
+ "GJT,Grand Junction, CO, Grand Junction Regional\n"
+ "GNV,Gainesville, FL, Gainesville Regional\n"
+ "GPT,Gulfport/Biloxi, MS, Gulfport-Biloxi International\n"
+ "GRB,Green Bay, WI, Green Bay Austin Straubel International\n"
+ "GRI,Grand Island, NE, Central Nebraska Regional\n"
+ "GRK,Killeen, TX, Robert Gray AAF\n"
+ "GRR,Grand Rapids, MI, Gerald R. Ford International\n"
+ "GSO,Greensboro/High Point, NC, Piedmont Triad International\n"
+ "GSP,Greer, SC, Greenville-Spartanburg International\n"
+ "GST,Gustavus, AK, Gustavus Airport\n"
+ "GTF,Great Falls, MT, Great Falls International\n"
+ "GTR,Columbus, MS, Golden Triangle Regional\n"
+ "GUC,Gunnison, CO, Gunnison-Crested Butte Regional\n"
+ "GUM,Guam, TT, Guam International\n"
+ "HDN,Hayden, CO, Yampa Valley\n"
+ "HGR,Hagerstown, MD, Hagerstown Regional-Richard A. Henson Field\n"
+ "HHH,Hilton Head, SC, Hilton Head Airport\n"
+ "HIB,Hibbing, MN, Range Regional\n"
+ "HLN,Helena, MT, Helena Regional\n"
+ "HNL,Honolulu, HI, Daniel K Inouye International\n"
+ "HOB,Hobbs, NM, Lea County Regional\n"
+ "HOU,Houston, TX, William P Hobby\n"
+ "HPN,White Plains, NY, Westchester County\n"
+ "HRL,Harlingen/San Benito, TX, Valley International\n"
+ "HSV,Huntsville, AL, Huntsville International-Carl T Jones Field\n"
+ "HTS,Ashland, WV, Tri-State/Milton J. Ferguson Field\n"
+ "HYA,Hyannis, MA, Cape Cod Gateway\n"
+ "HYS,Hays, KS, Hays Regional\n"
+ "IAD,Washington, DC, Washington Dulles International\n"
+ "IAG,Niagara Falls, NY, Niagara Falls International\n"
+ "IAH,Houston, TX, George Bush Intercontinental/Houston\n"
+ "ICT,Wichita, KS, Wichita Dwight D Eisenhower National\n"
+ "IDA,Idaho Falls, ID, Idaho Falls Regional\n"
+ "IFP,Bullhead City, AZ, Laughlin/Bullhead International\n"
+ "ILG,Wilmington, DE, New Castle\n"
+ "ILM,Wilmington, NC, Wilmington International\n"
+ "IMT,Iron Mountain/Kingsfd, MI, Ford\n"
+ "IND,Indianapolis, IN, Indianapolis International\n"
+ "INL,International Falls, MN, Falls International Einarson Field\n"
+ "ISP,Islip, NY, Long Island MacArthur\n"
+ "ITH,Ithaca/Cortland, NY, Ithaca Tompkins International\n"
+ "ITO,Hilo, HI, Hilo International\n"
+ "JAC,Jackson, WY, Jackson Hole\n"
+ "JAN,Jackson/Vicksburg, MS, Jackson Medgar Wiley Evers International\n"
+ "JAX,Jacksonville, FL, Jacksonville International\n"
+ "JFK,New York, NY, John F. Kennedy International\n"
+ "JLN,Joplin, MO, Joplin Regional\n"
+ "JMS,Jamestown, ND, Jamestown Regional\n"
+ "JNU,Juneau, AK, Juneau International\n"
+ "JST,Johnstown, PA, John Murtha Johnstown-Cambria County\n"
+ "KOA,Kona, HI, Ellison Onizuka Kona International at Keahole\n"
+ "KTN,Ketchikan, AK, Ketchikan International\n"
+ "LAN,Lansing, MI, Capital Region International\n"
+ "LAR,Laramie, WY, Laramie Regional\n"
+ "LAS,Las Vegas, NV, Harry Reid International\n"
+ "LAW,Lawton/Fort Sill, OK, Lawton-Fort Sill Regional\n"
+ "LAX,Los Angeles, CA, Los Angeles International\n"
+ "LBB,Lubbock, TX, Lubbock Preston Smith International\n"
+ "LBE,Latrobe, PA, Arnold Palmer Regional\n"
+ "LBF,North Platte, NE, North Platte Regional Airport Lee Bird Field\n"
+ "LBL,Liberal, KS, Liberal Mid-America Regional\n"
+ "LCH,Lake Charles, LA, Lake Charles Regional\n"
+ "LCK,Columbus, OH, Rickenbacker International\n"
+ "LEX,Lexington, KY, Blue Grass\n"
+ "LFT,Lafayette, LA, Lafayette Regional Paul Fournet Field\n"
+ "LGA,New York, NY, LaGuardia\n"
+ "LGB,Long Beach, CA, Long Beach Airport\n"
+ "LIH,Lihue, HI, Lihue Airport\n"
+ "LIT,Little Rock, AR, Bill and Hillary Clinton Nat Adams Field\n"
+ "LNK,Lincoln, NE, Lincoln Airport\n"
+ "LRD,Laredo, TX, Laredo International\n"
+ "LSE,La Crosse, WI, La Crosse Regional\n"
+ "LWB,Lewisburg, WV, Greenbrier Valley\n"
+ "LWS,Lewiston, ID, Lewiston Nez Perce County\n"
+ "LYH,Lynchburg, VA, Lynchburg Regional/Preston Glenn Field\n"
+ "MAF,Midland/Odessa, TX, Midland International Air and Space Port\n"
+ "MBS,Saginaw/Bay City/Midland, MI, MBS International\n"
+ "MCI,Kansas City, MO, Kansas City International\n"
+ "MCO,Orlando, FL, Orlando International\n"
+ "MCW,Mason City, IA, Mason City Municipal\n"
+ "MDT,Harrisburg, PA, Harrisburg International\n"
+ "MDW,Chicago, IL, Chicago Midway International\n"
+ "MEI,Meridian, MS, Key Field\n"
+ "MEM,Memphis, TN, Memphis International\n"
+ "MFE,Mission/McAllen/Edinburg, TX, McAllen International\n"
+ "MFR,Medford, OR, Rogue Valley International - Medford\n"
+ "MGM,Montgomery, AL, Montgomery Regional\n"
+ "MHK,Manhattan/Ft. Riley, KS, Manhattan Regional\n"
+ "MHT,Manchester, NH, Manchester Boston Regional\n"
+ "MIA,Miami, FL, Miami International\n"
+ "MKE,Milwaukee, WI, General Mitchell International\n"
+ "MKG,Muskegon, MI, Muskegon County\n"
+ "MLB,Melbourne, FL, Melbourne Orlando International\n"
+ "MLI,Moline, IL, Quad Cities International\n"
+ "MLU,Monroe, LA, Monroe Regional\n"
+ "MOB,Mobile, AL, Mobile Regional\n"
+ "MOT,Minot, ND, Minot International\n"
+ "MQT,Marquette, MI, Marquette Sawyer Regional\n"
+ "MRY,Monterey, CA, Monterey Regional\n"
+ "MSN,Madison, WI, Dane County Regional-Truax Field\n"
+ "MSO,Missoula, MT, Missoula Montana\n"
+ "MSP,Minneapolis, MN, Minneapolis-St Paul International\n"
+ "MSY,New Orleans, LA, Louis Armstrong New Orleans International\n"
+ "MTJ,Montrose/Delta, CO, Montrose Regional\n"
+ "MVY,Martha's Vineyard, MA, Martha's Vineyard Airport\n"
+ "MYR,Myrtle Beach, SC, Myrtle Beach International\n"
+ "OAJ,Jacksonville/Camp Lejeune, NC, Albert J Ellis\n"
+ "OAK,Oakland, CA, Metro Oakland International\n"
+ "OGD,Ogden, UT, Ogden-Hinckley\n"
+ "OGG,Kahului, HI, Kahului Airport\n"
+ "OGS,Ogdensburg, NY, Ogdensburg International\n"
+ "OKC,Oklahoma City, OK, Will Rogers World\n"
+ "OMA,Omaha, NE, Eppley Airfield\n"
+ "OME,Nome, AK, Nome Airport\n"
+ "ONT,Ontario, CA, Ontario International\n"
+ "ORD,Chicago, IL, Chicago O'Hare International\n"
+ "ORF,Norfolk, VA, Norfolk International\n"
+ "ORH,Worcester, MA, Worcester Regional\n"
+ "OTH,North Bend/Coos Bay, OR, Southwest Oregon Regional\n"
+ "OTZ,Kotzebue, AK, Ralph Wien Memorial\n"
+ "OWB,Owensboro, KY, Owensboro Daviess County Regional\n"
+ "PAE,Everett, WA, Snohomish County\n"
+ "PAH,Paducah, KY, Barkley Regional\n"
+ "PBG,Plattsburgh, NY, Plattsburgh International\n"
+ "PBI,West Palm Beach/Palm Beach, FL, Palm Beach International\n"
+ "PDX,Portland, OR, Portland International\n"
+ "PGD,Punta Gorda, FL, Punta Gorda Airport\n"
+ "PGV,Greenville, NC, Pitt Greenville\n"
+ "PHF,Newport News/Williamsburg, VA, Newport News/Williamsburg International\n"
+ "PHL,Philadelphia, PA, Philadelphia International\n"
+ "PHX,Phoenix, AZ, Phoenix Sky Harbor International\n"
+ "PIA,Peoria, IL, General Downing - Peoria International\n"
+ "PIB,Hattiesburg/Laurel, MS, Hattiesburg-Laurel Regional\n"
+ "PIE,St. Petersburg, FL, St Pete Clearwater International\n"
+ "PIH,Pocatello, ID, Pocatello Regional\n"
+ "PIR,Pierre, SD, Pierre Regional\n"
+ "PIT,Pittsburgh, PA, Pittsburgh International\n"
+ "PLN,Pellston, MI, Pellston Regional Airport of Emmet County\n"
+ "PNS,Pensacola, FL, Pensacola International\n"
+ "PPG,Pago Pago, TT, Pago Pago International\n"
+ "PRC,Prescott, AZ, Prescott Regional Ernest A Love Field\n"
+ "PSC,Pasco/Kennewick/Richland, WA, Tri Cities\n"
+ "PSE,Ponce, PR, Mercedita\n"
+ "PSG,Petersburg, AK, Petersburg James A Johnson\n"
+ "PSM,Portsmouth, NH, Portsmouth International at Pease\n"
+ "PSP,Palm Springs, CA, Palm Springs International\n"
+ "PUB,Pueblo, CO, Pueblo Memorial\n"
+ "PUW,Pullman, WA, Pullman Moscow Regional\n"
+ "PVD,Providence, RI, Rhode Island Tf Green International\n"
+ "PVU,Provo, UT, Provo Municipal\n"
+ "PWM,Portland, ME, Portland International Jetport\n"
+ "RAP,Rapid City, SD, Rapid City Regional\n"
+ "RDD,Redding, CA, Redding Regional\n"
+ "RDM,Bend/Redmond, OR, Roberts Field\n"
+ "RDU,Raleigh/Durham, NC, Raleigh-Durham International\n"
+ "RFD,Rockford, IL, Chicago/Rockford International\n"
+ "RHI,Rhinelander, WI, Rhinelander/Oneida County\n"
+ "RIC,Richmond, VA, Richmond International\n"
+ "RIW,Riverton/Lander, WY, Central Wyoming Regional\n"
+ "RKS,Rock Springs, WY, Southwest Wyoming Regional\n"
+ "RNO,Reno, NV, Reno/Tahoe International\n"
+ "ROA,Roanoke, VA, Roanoke Blacksburg Regional\n"
+ "ROC,Rochester, NY, Frederick Douglass Grtr Rochester International\n"
+ "ROW,Roswell, NM, Roswell Air Center\n"
+ "RST,Rochester, MN, Rochester International\n"
+ "RSW,Fort Myers, FL, Southwest Florida International\n"
+ "SAF,Santa Fe, NM, Santa Fe Municipal\n"
+ "SAN,San Diego, CA, San Diego International\n"
+ "SAT,San Antonio, TX, San Antonio International\n"
+ "SAV,Savannah, GA, Savannah/Hilton Head International\n"
+ "SBA,Santa Barbara, CA, Santa Barbara Municipal\n"
+ "SBN,South Bend, IN, South Bend International\n"
+ "SBP,San Luis Obispo, CA, San Luis County Regional\n"
+ "SCC,Deadhorse, AK, Deadhorse Airport\n"
+ "SCE,State College, PA, University Park\n"
+ "SCK,Stockton, CA, Stockton Metro\n"
+ "SDF,Louisville, KY, Louisville Muhammad Ali International\n"
+ "SEA,Seattle, WA, Seattle/Tacoma International\n"
+ "SFB,Sanford, FL, Orlando Sanford International\n"
+ "SFO,San Francisco, CA, San Francisco International\n"
+ "SGF,Springfield, MO, Springfield-Branson National\n"
+ "SGU,St. George, UT, St George Regional\n"
+ "SHD,Staunton, VA, Shenandoah Valley Regional\n"
+ "SHR,Sheridan, WY, Sheridan County\n"
+ "SHV,Shreveport, LA, Shreveport Regional\n"
+ "SIT,Sitka, AK, Sitka Rocky Gutierrez\n"
+ "SJC,San Jose, CA, Norman Y. Mineta San Jose International\n"
+ "SJT,San Angelo, TX, San Angelo Regional/Mathis Field\n"
+ "SJU,San Juan, PR, Luis Munoz Marin International\n"
+ "SLC,Salt Lake City, UT, Salt Lake City International\n"
+ "SLN,Salina, KS, Salina Regional\n"
+ "SMF,Sacramento, CA, Sacramento International\n"
+ "SMX,Santa Maria, CA, Santa Maria Public/Capt. G. Allan Hancock Field\n"
+ "SNA,Santa Ana, CA, John Wayne Airport-Orange County\n"
+ "SPI,Springfield, IL, Abraham Lincoln Capital\n"
+ "SPN,Saipan, TT, Francisco C. Ada Saipan International\n"
+ "SPS,Wichita Falls, TX, Sheppard AFB/Wichita Falls Municipal\n"
+ "SRQ,Sarasota/Bradenton, FL, Sarasota/Bradenton International\n"
+ "STC,St. Cloud, MN, St. Cloud Regional\n"
+ "STL,St. Louis, MO, St Louis Lambert International\n"
+ "STS,Santa Rosa, CA, Charles M. Schulz - Sonoma County\n"
+ "STT,Charlotte Amalie, VI, Cyril E King\n"
+ "STX,Christiansted, VI, Henry E. Rohlsen\n"
+ "SUN,Sun Valley/Hailey/Ketchum, ID, Friedman Memorial\n"
+ "SUX,Sioux City, IA, Sioux Gateway Brig Gen Bud Day Field\n"
+ "SWF,Newburgh/Poughkeepsie, NY, New York Stewart International\n"
+ "SWO,Stillwater, OK, Stillwater Regional\n"
+ "SYR,Syracuse, NY, Syracuse Hancock International\n"
+ "TBN,Fort Leonard Wood, MO, Waynesville-St. Robert Regional Forney Field\n"
+ "TLH,Tallahassee, FL, Tallahassee International\n"
+ "TOL,Toledo, OH, Eugene F Kranz Toledo Express\n"
+ "TPA,Tampa, FL, Tampa International\n"
+ "TRI,Bristol/Johnson City/Kingsport, TN, Tri Cities\n"
+ "TTN,Trenton, NJ, Trenton Mercer\n"
+ "TUL,Tulsa, OK, Tulsa International\n"
+ "TUS,Tucson, AZ, Tucson International\n"
+ "TVC,Traverse City, MI, Cherry Capital\n"
+ "TWF,Twin Falls, ID, Joslin Field - Magic Valley Regional\n"
+ "TXK,Texarkana, AR, Texarkana Regional-Webb Field\n"
+ "TYR,Tyler, TX, Tyler Pounds Regional\n"
+ "TYS,Knoxville, TN, McGhee Tyson\n"
+ "USA,Concord, NC, Concord Padgett Regional\n"
+ "VCT,Victoria, TX, Victoria Regional\n"
+ "VEL,Vernal, UT, Vernal Regional\n"
+ "VLD,Valdosta, GA, Valdosta Regional\n"
+ "VPS,Valparaiso, FL, Eglin AFB Destin Fort Walton Beach\n"
+ "WRG,Wrangell, AK, Wrangell Airport\n"
+ "WYS,West Yellowstone, MT, Yellowstone\n"
+ "XNA,Fayetteville, AR, Northwest Arkansas National\n"
+ "XWA,Williston, ND, Williston Basin International\n"
+ "YAK,Yakutat, AK, Yakutat Airport\n"
+ "YKM,Yakima, WA, Yakima Air Terminal/McAllister Field\n"
+ "YUM,Yuma, AZ, Yuma MCAS/Yuma International\n"

// Split each row into parts and then make an airport object for each row
const airportArray = airports.split("\n");
const airportObjects = [];
for (var i = 0; i < airportArray.length; i++) {
    var airport = airportArray[i].split(",");
    //console.log(airport);
    if (airport.length != 4) {
        continue;
    }
    airportObjects.push(new Airport(airport[0], airport[1], airport[2], airport[3]));
    //console.log(airportObjects[i].code);
}