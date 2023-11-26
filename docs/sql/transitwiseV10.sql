-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2023 at 04:39 PM
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
-- Table structure for table `aircraft_models`
--

DROP TABLE IF EXISTS `aircraft_models`;
CREATE TABLE `aircraft_models` (
  `model_number` char(7) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `model` varchar(25) NOT NULL,
  `seats` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aircraft_models`
--

INSERT INTO `aircraft_models` (`model_number`, `manufacturer`, `model`, `seats`) VALUES
('05628NI', 'BOEING', '787-8', 260),
('1380108', 'BOEING', 'A75', 2),
('1383700', 'BOEING', '717-200', 100),
('1384404', 'BOEING', '737-7H4', 140),
('138440A', 'BOEING', '737-8H4', 140),
('138440F', 'BOEING', '737-832', 189),
('1384413', 'BOEING', '737-700', 149),
('1384414', 'BOEING', '737-800', 189),
('1384418', 'BOEING', '737-7Q8', 149),
('138447E', 'BOEING', '737-7K9', 149),
('13844BY', 'BOEING', '737-724', 149),
('13844BZ', 'BOEING', '737-824', 149),
('13844C3', 'BOEING', '737-752', 149),
('13844CA', 'BOEING', '737-71Q', 149),
('13844CB', 'BOEING', '737-823', 162),
('13844CF', 'BOEING', '737-832', 189),
('13844CH', 'BOEING', '737-76N', 149),
('13844CN', 'BOEING', '737-790', 151),
('13844CS', 'BOEING', '737-705', 149),
('13844CV', 'BOEING', '737-7L9', 149),
('13844D1', 'BOEING', '737-7V3', 149),
('13844FH', 'BOEING', '737-71B', 149),
('13844FN', 'BOEING', '737-9GPER', 191),
('13844FZ', 'BOEING', '737-8', 185),
('13844JA', 'BOEING', '737-79P', 149),
('13844LA', 'BOEING', '737-79L', 149),
('13844NA', 'BOEING', '737-8FH', 149),
('13844NE', 'BOEING', '737-7CT', 149),
('13844ZQ', 'BOEING', '737-8EH', 189),
('1384502', 'BOEING', '737-7AD', 128),
('1384511', 'BOEING', '737-7BD', 149),
('1384518', 'BOEING', '737-7K5', 151),
('1384526', 'BOEING', '737-990', 149),
('1384527', 'BOEING', '737-890', 149),
('1384540', 'BOEING', '737-73V', 149),
('13845AA', 'BOEING', '737-76Q', 149),
('1384600', 'BOEING', '737-7BK', 149),
('138469A', 'BOEING', '737-9', 48),
('138488H', 'BOEING', '737-900ER', 222),
('138488K', 'BOEING', '737-932ER', 222),
('13848A1', 'BOEING', '737-924', 191),
('13848A3', 'BOEING', '737-924ER', 191),
('13848CE', 'BOEING', '737-990ER', 222),
('1384907', 'BOEING', '757-26D', 178),
('1384908', 'BOEING', '757-231', 178),
('1384930', 'BOEING', '757-324', 275),
('1384931', 'BOEING', '757-33N', 275),
('1384958', 'BOEING', '757-224', 178),
('1384965', 'BOEING', '757-232', 178),
('1384970', 'BOEING', '757-251', 178),
('1384972', 'BOEING', '757-2Q8', 178),
('1384991', 'BOEING', '757-351', 275),
('1385101', 'BOEING', '767-332', 330),
('1385134', 'BOEING', '767-432ER', 300),
('1385187', 'BOEING', '767-3CB', 300),
('1385200', 'BOEING', '767-322', 330),
('1385203', 'BOEING', '767-324', 269),
('1385213', 'BOEING', '777-223', 440),
('1385219', 'BOEING', '777-222', 400),
('1385225', 'BOEING', '777-224', 400),
('1385256', 'BOEING', '777-300ER', 552),
('1385270', 'BOEING', '767-424ER', 292),
('1385324', 'BOEING', '777-323ER', 563),
('1385609', 'BOEING', '787-9', 422),
('1386010', 'BOEING', '787-10', 120),
('1388002', 'BOEING', '787-8', 260),
('1390008', 'BOMBARDIER INC', 'CL-600-2B19', 55),
('1390015', 'BOMBARDIER INC', 'CL-600-2C10', 80),
('1390016', 'BOMBARDIER INC', 'CL-600-2D24', 95),
('1390042', 'BOMBARDIER INC', 'DHC-8-402', 70),
('1400010', 'AIRBUS CANADA LTD PTNRSP', 'BD-500-1A10', 133),
('1400012', 'C SERIES AIRCRAFT LTD PTNRSP', 'BD-500-1A10', 133),
('1400015', 'AIRBUS CANADA LP', 'BD-500-1A11', 153),
('3260121', 'EMBRAER-EMPRESA BRASILEIRA DE', 'ERJ 170-200 LR', 80),
('3260210', 'EMBRAER', 'EMB-145', 55),
('3260212', 'EMBRAER', 'EMB-145LR', 55),
('3260403', 'EMBRAER', 'ERJ 170-100SU', 70),
('3260406', 'EMBRAER', 'ERJ 170-100 SE', 70),
('3260408', 'EMBRAER', 'ERJ 190-100 IGW', 20),
('326040B', 'EMBRAER', 'ERJ 170-100 LR', 70),
('3260410', 'EMBRAER', 'ERJ 170-200 LR', 88),
('3260415', 'EMBRAER S A', 'ERJ 170-200 LR', 88),
('3260416', 'EMBRAER', 'ERJ 170-100 STD', 80),
('326041A', 'EMBRAER S A', 'ERJ 170-200 LL', 88),
('3260499', 'EMPRESA BRASILEIRA DE AERO S A', 'ERJ 170-100 STD', 80),
('3260979', 'YABORA INDUSTRIA AERONAUTICA S', 'ERJ 170-200 LL', 70),
('3260988', 'YABORA INDUSTRIA AERONAUTICA S', 'ERJ 170-200 LR', 88),
('3930316', 'AIRBUS INDUSTRIE', 'A320-214', 182),
('3930317', 'AIRBUS INDUSTRIE', 'A319-131', 179),
('3930320', 'AIRBUS INDUSTRIE', 'A320-211', 182),
('3930322', 'AIRBUS INDUSTRIE', 'A320-212', 182),
('3930323', 'AIRBUS INDUSTRIE', 'A319-112', 179),
('3930326', 'AIRBUS INDUSTRIE', 'A320-232', 200),
('3930340', 'AIRBUS INDUSTRIE', 'A319-132', 179),
('3930350', 'AIRBUS INDUSTRIE', 'A319-114', 145),
('3930370', 'AIRBUS INDUSTRIE', 'A321-211', 199),
('3930374', 'AIRBUS INDUSTRIE', 'A330-223', 379),
('3930402', 'AIRBUS INDUSTRIE', 'A321-231', 379),
('3930910', 'AIRBUS', 'A321-271N', 222),
('3930915', 'AIRBUS', 'A321-271NX', 246),
('3940001', 'AIRBUS', 'A319-131', 179),
('3940002', 'AIRBUS', 'A319-114', 145),
('3940004', 'AIRBUS', 'A320-232', 200),
('3940005', 'AIRBUS', 'A321-211', 199),
('3940006', 'AIRBUS', 'A320-214', 182),
('3940009', 'AIRBUS', 'A319-112', 100),
('3940010', 'AIRBUS', 'A320-212', 182),
('3940015', 'AIRBUS', 'A319-132', 179),
('3940018', 'AIRBUS', 'A330-243', 377),
('3940025', 'AIRBUS', 'A320-211', 182),
('3940028', 'AIRBUS SAS', 'A321-213', 199),
('3940030', 'AIRBUS', 'A330-323', 379),
('3940031', 'AIRBUS', 'A330-223', 379),
('3940032', 'AIRBUS', 'A321-231', 379),
('3940034', 'AIRBUS', 'A319-115', 147),
('3940045', 'AIRBUS', 'A321-253N', 222),
('3940050', 'AIRBUS', 'A350-941', 442),
('3940051', 'AIRBUS', 'A321-253NX', 222),
('3940070', 'AIRBUS', 'A330-302', 451),
('3940098', 'AIRBUS', 'A330-941', 442),
('3940305', 'AIRBUS SAS', 'A321-211', 222),
('3940307', 'AIRBUS SAS', 'A320-271N', 190),
('3940310', 'AIRBUS SAS', 'A320-251N', 181),
('3940314', 'AIRBUS SAS', 'A330-941', 440),
('3940315', 'AIRBUS SAS', 'A350-941', 442),
('3940320', 'AIRBUS', 'A320-271N', 190),
('3940325', 'AIRBUS', 'A320-251N', 190);

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

DROP TABLE IF EXISTS `airlines`;
CREATE TABLE `airlines` (
  `AL_code` char(3) NOT NULL,
  `AL_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`AL_code`, `AL_name`) VALUES
('9E', 'Pinnacle Airlines'),
('AA', 'American Airlines'),
('AS', 'Alaska Airlines'),
('B6', 'JetBlue Airways'),
('DL', 'Delta Air Lines'),
('F9', 'Frontier Airlines'),
('G4', 'Allegiant Air'),
('HA', 'Hawaiian Airlines'),
('MQ', 'American Eagle Airlines'),
('NK', 'Spirit Air Lines'),
('OH', 'PSA Airlines Inc'),
('OO', 'SkyWest Airlines Inc'),
('QX', 'Horizon Air'),
('UA', 'United Air Lines'),
('WN', 'Southwest Airlines'),
('YV', 'Mesa Airlines'),
('YX', 'Republic Airlines');

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

DROP TABLE IF EXISTS `airports`;
CREATE TABLE `airports` (
  `AP_code` char(3) NOT NULL,
  `AP_city` varchar(50) DEFAULT NULL,
  `AP_state` char(3) DEFAULT NULL,
  `AP_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`AP_code`, `AP_city`, `AP_state`, `AP_name`) VALUES
('ABE', 'Allentown/Bethlehem/Easton', ' PA', ' Lehigh Valley International'),
('ABI', 'Abilene', ' TX', ' Abilene Regional'),
('ABQ', 'Albuquerque', ' NM', ' Albuquerque International Sunport'),
('ABR', 'Aberdeen', ' SD', ' Aberdeen Regional'),
('ABY', 'Albany', ' GA', ' Southwest Georgia Regional'),
('ACK', 'Nantucket', ' MA', ' Nantucket Memorial'),
('ACT', 'Waco', ' TX', ' Waco Regional'),
('ACV', 'Arcata/Eureka', ' CA', ' California Redwood Coast Humboldt County'),
('ACY', 'Atlantic City', ' NJ', ' Atlantic City International'),
('ADK', 'Adak Island', ' AK', ' Adak'),
('ADQ', 'Kodiak', ' AK', ' Kodiak Airport'),
('AEX', 'Alexandria', ' LA', ' Alexandria International'),
('AGS', 'Augusta', ' GA', ' Augusta Regional at Bush Field'),
('AKN', 'King Salmon', ' AK', ' King Salmon Airport'),
('ALB', 'Albany', ' NY', ' Albany International'),
('ALO', 'Waterloo', ' IA', ' Waterloo Regional'),
('ALS', 'Alamosa', ' CO', ' San Luis Valley Regional/Bergman Field'),
('ALW', 'Walla Walla', ' WA', ' Walla Walla Regional'),
('AMA', 'Amarillo', ' TX', ' Rick Husband Amarillo International'),
('ANC', 'Anchorage', ' AK', ' Ted Stevens Anchorage International'),
('APN', 'Alpena', ' MI', ' Alpena County Regional'),
('ASE', 'Aspen', ' CO', ' Aspen Pitkin County Sardy Field'),
('ATL', 'Atlanta', ' GA', ' Hartsfield-Jackson Atlanta International'),
('ATW', 'Appleton', ' WI', ' Appleton International'),
('ATY', 'Watertown', ' SD', ' Watertown Regional'),
('AUS', 'Austin', ' TX', ' Austin - Bergstrom International'),
('AVL', 'Asheville', ' NC', ' Asheville Regional'),
('AVP', 'Scranton/Wilkes-Barre', ' PA', ' Wilkes Barre Scranton International'),
('AZA', 'Phoenix', ' AZ', ' Phoenix - Mesa Gateway'),
('AZO', 'Kalamazoo', ' MI', ' Kalamazoo/Battle Creek International'),
('BDL', 'Hartford', ' CT', ' Bradley International'),
('BET', 'Bethel', ' AK', ' Bethel Airport'),
('BFF', 'Scottsbluff', ' NE', ' Western Neb. Regional/William B. Heilig Field'),
('BFL', 'Bakersfield', ' CA', ' Meadows Field'),
('BGM', 'Binghamton', ' NY', ' Greater Binghamton/Edwin A. Link Field'),
('BGR', 'Bangor', ' ME', ' Bangor International'),
('BHM', 'Birmingham', ' AL', ' Birmingham-Shuttlesworth International'),
('BIH', 'Bishop', ' CA', ' Bishop Airport'),
('BIL', 'Billings', ' MT', ' Billings Logan International'),
('BIS', 'Bismarck/Mandan', ' ND', ' Bismarck Municipal'),
('BJI', 'Bemidji', ' MN', ' Bemidji Regional'),
('BKG', 'Branson', ' MO', ' Branson Airport'),
('BLI', 'Bellingham', ' WA', ' Bellingham International'),
('BLV', 'Belleville', ' IL', ' Scott AFB MidAmerica St Louis'),
('BMI', 'Bloomington/Normal', ' IL', ' Central Il Regional Airport at Bloomington'),
('BNA', 'Nashville', ' TN', ' Nashville International'),
('BOI', 'Boise', ' ID', ' Boise Air Terminal'),
('BOS', 'Boston', ' MA', ' Logan International'),
('BPT', 'Beaumont/Port Arthur', ' TX', ' Jack Brooks Regional'),
('BQK', 'Brunswick', ' GA', ' Brunswick Golden Isles'),
('BQN', 'Aguadilla', ' PR', ' Rafael Hernandez'),
('BRD', 'Brainerd', ' MN', ' Brainerd Lakes Regional'),
('BRO', 'Brownsville', ' TX', ' Brownsville South Padre Island International'),
('BRW', 'Barrow', ' AK', ' Wiley Post/Will Rogers Memorial'),
('BTM', 'Butte', ' MT', ' Bert Mooney'),
('BTR', 'Baton Rouge', ' LA', ' Baton Rouge Metropolitan/Ryan Field'),
('BTV', 'Burlington', ' VT', ' Burlington International'),
('BUF', 'Buffalo', ' NY', ' Buffalo Niagara International'),
('BUR', 'Burbank', ' CA', ' Bob Hope'),
('BWI', 'Baltimore', ' MD', ' Baltimore/Washington International Thurgood Marshall'),
('BZN', 'Bozeman', ' MT', ' Bozeman Yellowstone International'),
('CAE', 'Columbia', ' SC', ' Columbia Metropolitan'),
('CAK', 'Akron', ' OH', ' Akron-Canton Regional'),
('CDC', 'Cedar City', ' UT', ' Cedar City Regional'),
('CDV', 'Cordova', ' AK', ' Merle K Mudhole Smith'),
('CGI', 'Cape Girardeau', ' MO', ' Cape Girardeau Regional'),
('CHA', 'Chattanooga', ' TN', ' Lovell Field'),
('CHO', 'Charlottesville', ' VA', ' Charlottesville Albemarle'),
('CHS', 'Charleston', ' SC', ' Charleston AFB/International'),
('CID', 'Cedar Rapids/Iowa City', ' IA', ' The Eastern Iowa'),
('CIU', 'Sault Ste. Marie', ' MI', ' Chippewa County International'),
('CKB', 'Clarksburg/Fairmont', ' WV', ' North Central West Virginia'),
('CLE', 'Cleveland', ' OH', ' Cleveland-Hopkins International'),
('CLL', 'College Station/Bryan', ' TX', ' Easterwood Field'),
('CLT', 'Charlotte', ' NC', ' Charlotte Douglas International'),
('CMH', 'Columbus', ' OH', ' John Glenn Columbus International'),
('CMI', 'Champaign/Urbana', ' IL', ' University of Illinois/Willard'),
('CMX', 'Hancock/Houghton', ' MI', ' Houghton County Memorial'),
('CNY', 'Moab', ' UT', ' Canyonlands Regional'),
('COD', 'Cody', ' WY', ' Yellowstone Regional'),
('COS', 'Colorado Springs', ' CO', ' City of Colorado Springs Municipal'),
('COU', 'Columbia', ' MO', ' Columbia Regional'),
('CPR', 'Casper', ' WY', ' Casper/Natrona County International'),
('CRP', 'Corpus Christi', ' TX', ' Corpus Christi International'),
('CRW', 'Charleston/Dunbar', ' WV', ' West Virginia International Yeager'),
('CSG', 'Columbus', ' GA', ' Columbus Airport'),
('CVG', 'Cincinnati', ' OH', ' Cincinnati/Northern Kentucky International'),
('CWA', 'Mosinee', ' WI', ' Central Wisconsin'),
('CYS', 'Cheyenne', ' WY', ' Cheyenne Regional/Jerry Olson Field'),
('DAB', 'Daytona Beach', ' FL', ' Daytona Beach International'),
('DAL', 'Dallas', ' TX', ' Dallas Love Field'),
('DAY', 'Dayton', ' OH', ' James M Cox/Dayton International'),
('DBQ', 'Dubuque', ' IA', ' Dubuque Regional'),
('DCA', 'Washington', ' DC', ' Ronald Reagan Washington National'),
('DDC', 'Dodge City', ' KS', ' Dodge City Regional'),
('DEC', 'Decatur', ' IL', ' Decatur Airport'),
('DEN', 'Denver', ' CO', ' Denver International'),
('DFW', 'Dallas/Fort Worth', ' TX', ' Dallas/Fort Worth International'),
('DHN', 'Dothan', ' AL', ' Dothan Regional'),
('DIK', 'Dickinson', ' ND', ' Dickinson - Theodore Roosevelt Regional'),
('DLG', 'Dillingham', ' AK', ' Dillingham Airport'),
('DLH', 'Duluth', ' MN', ' Duluth International'),
('DRO', 'Durango', ' CO', ' Durango La Plata County'),
('DRT', 'Del Rio', ' TX', ' Del Rio International'),
('DSM', 'Des Moines', ' IA', ' Des Moines International'),
('DTW', 'Detroit', ' MI', ' Detroit Metro Wayne County'),
('DVL', 'Devils Lake', ' ND', ' Devils Lake Regional'),
('EAR', 'Kearney', ' NE', ' Kearney Regional'),
('EAT', 'Wenatchee', ' WA', ' Pangborn Memorial'),
('EAU', 'Eau Claire', ' WI', ' Chippewa Valley Regional'),
('ECP', 'Panama City', ' FL', ' Northwest Florida Beaches International'),
('EGE', 'Eagle', ' CO', ' Eagle County Regional'),
('EKO', 'Elko', ' NV', ' Elko Regional'),
('ELM', 'Elmira/Corning', ' NY', ' Elmira/Corning Regional'),
('ELP', 'El Paso', ' TX', ' El Paso International'),
('ERI', 'Erie', ' PA', ' Erie International/Tom Ridge Field'),
('ESC', 'Escanaba', ' MI', ' Delta County'),
('EUG', 'Eugene', ' OR', ' Mahlon Sweet Field'),
('EVV', 'Evansville', ' IN', ' Evansville Regional'),
('EWN', 'New Bern/Morehead/Beaufort', ' NC', ' Coastal Carolina Regional'),
('EWR', 'Newark', ' NJ', ' Newark Liberty International'),
('EYW', 'Key West', ' FL', ' Key West International'),
('FAI', 'Fairbanks', ' AK', ' Fairbanks International'),
('FAR', 'Fargo', ' ND', ' Hector International'),
('FAT', 'Fresno', ' CA', ' Fresno Yosemite International'),
('FAY', 'Fayetteville', ' NC', ' Fayetteville Regional/Grannis Field'),
('FCA', 'Kalispell', ' MT', ' Glacier Park International'),
('FLG', 'Flagstaff', ' AZ', ' Flagstaff Pulliam'),
('FLL', 'Fort Lauderdale', ' FL', ' Fort Lauderdale-Hollywood International'),
('FLO', 'Florence', ' SC', ' Florence Regional'),
('FNT', 'Flint', ' MI', ' Bishop International'),
('FOD', 'Fort Dodge', ' IA', ' Fort Dodge Regional'),
('FSD', 'Sioux Falls', ' SD', ' Joe Foss Field'),
('FSM', 'Fort Smith', ' AR', ' Fort Smith Regional'),
('FWA', 'Fort Wayne', ' IN', ' Fort Wayne International'),
('GCC', 'Gillette', ' WY', ' Northeast Wyoming Regional'),
('GCK', 'Garden City', ' KS', ' Garden City Regional'),
('GEG', 'Spokane', ' WA', ' Spokane International'),
('GFK', 'Grand Forks', ' ND', ' Grand Forks International'),
('GGG', 'Longview', ' TX', ' East Texas Regional'),
('GJT', 'Grand Junction', ' CO', ' Grand Junction Regional'),
('GNV', 'Gainesville', ' FL', ' Gainesville Regional'),
('GPT', 'Gulfport/Biloxi', ' MS', ' Gulfport-Biloxi International'),
('GRB', 'Green Bay', ' WI', ' Green Bay Austin Straubel International'),
('GRI', 'Grand Island', ' NE', ' Central Nebraska Regional'),
('GRK', 'Killeen', ' TX', ' Robert Gray AAF'),
('GRR', 'Grand Rapids', ' MI', ' Gerald R. Ford International'),
('GSO', 'Greensboro/High Point', ' NC', ' Piedmont Triad International'),
('GSP', 'Greer', ' SC', ' Greenville-Spartanburg International'),
('GST', 'Gustavus', ' AK', ' Gustavus Airport'),
('GTF', 'Great Falls', ' MT', ' Great Falls International'),
('GTR', 'Columbus', ' MS', ' Golden Triangle Regional'),
('GUC', 'Gunnison', ' CO', ' Gunnison-Crested Butte Regional'),
('GUM', 'Guam', ' TT', ' Guam International'),
('HDN', 'Hayden', ' CO', ' Yampa Valley'),
('HGR', 'Hagerstown', ' MD', ' Hagerstown Regional-Richard A. Henson Field'),
('HHH', 'Hilton Head', ' SC', ' Hilton Head Airport'),
('HIB', 'Hibbing', ' MN', ' Range Regional'),
('HLN', 'Helena', ' MT', ' Helena Regional'),
('HNL', 'Honolulu', ' HI', ' Daniel K Inouye International'),
('HOB', 'Hobbs', ' NM', ' Lea County Regional'),
('HOU', 'Houston', ' TX', ' William P Hobby'),
('HPN', 'White Plains', ' NY', ' Westchester County'),
('HRL', 'Harlingen/San Benito', ' TX', ' Valley International'),
('HSV', 'Huntsville', ' AL', ' Huntsville International-Carl T Jones Field'),
('HTS', 'Ashland', ' WV', ' Tri-State/Milton J. Ferguson Field'),
('HYA', 'Hyannis', ' MA', ' Cape Cod Gateway'),
('HYS', 'Hays', ' KS', ' Hays Regional'),
('IAD', 'Washington', ' DC', ' Washington Dulles International'),
('IAG', 'Niagara Falls', ' NY', ' Niagara Falls International'),
('IAH', 'Houston', ' TX', ' George Bush Intercontinental/Houston'),
('ICT', 'Wichita', ' KS', ' Wichita Dwight D Eisenhower National'),
('IDA', 'Idaho Falls', ' ID', ' Idaho Falls Regional'),
('IFP', 'Bullhead City', ' AZ', ' Laughlin/Bullhead International'),
('ILG', 'Wilmington', ' DE', ' New Castle'),
('ILM', 'Wilmington', ' NC', ' Wilmington International'),
('IMT', 'Iron Mountain/Kingsfd', ' MI', ' Ford'),
('IND', 'Indianapolis', ' IN', ' Indianapolis International'),
('INL', 'International Falls', ' MN', ' Falls International Einarson Field'),
('ISP', 'Islip', ' NY', ' Long Island MacArthur'),
('ITH', 'Ithaca/Cortland', ' NY', ' Ithaca Tompkins International'),
('ITO', 'Hilo', ' HI', ' Hilo International'),
('JAC', 'Jackson', ' WY', ' Jackson Hole'),
('JAN', 'Jackson/Vicksburg', ' MS', ' Jackson Medgar Wiley Evers International'),
('JAX', 'Jacksonville', ' FL', ' Jacksonville International'),
('JFK', 'New York', ' NY', ' John F. Kennedy International'),
('JLN', 'Joplin', ' MO', ' Joplin Regional'),
('JMS', 'Jamestown', ' ND', ' Jamestown Regional'),
('JNU', 'Juneau', ' AK', ' Juneau International'),
('JST', 'Johnstown', ' PA', ' John Murtha Johnstown-Cambria County'),
('KOA', 'Kona', ' HI', ' Ellison Onizuka Kona International at Keahole'),
('KTN', 'Ketchikan', ' AK', ' Ketchikan International'),
('LAN', 'Lansing', ' MI', ' Capital Region International'),
('LAR', 'Laramie', ' WY', ' Laramie Regional'),
('LAS', 'Las Vegas', ' NV', ' Harry Reid International'),
('LAW', 'Lawton/Fort Sill', ' OK', ' Lawton-Fort Sill Regional'),
('LAX', 'Los Angeles', ' CA', ' Los Angeles International'),
('LBB', 'Lubbock', ' TX', ' Lubbock Preston Smith International'),
('LBE', 'Latrobe', ' PA', ' Arnold Palmer Regional'),
('LBF', 'North Platte', ' NE', ' North Platte Regional Airport Lee Bird Field'),
('LBL', 'Liberal', ' KS', ' Liberal Mid-America Regional'),
('LCH', 'Lake Charles', ' LA', ' Lake Charles Regional'),
('LCK', 'Columbus', ' OH', ' Rickenbacker International'),
('LEX', 'Lexington', ' KY', ' Blue Grass'),
('LFT', 'Lafayette', ' LA', ' Lafayette Regional Paul Fournet Field'),
('LGA', 'New York', ' NY', ' LaGuardia'),
('LGB', 'Long Beach', ' CA', ' Long Beach Airport'),
('LIH', 'Lihue', ' HI', ' Lihue Airport'),
('LIT', 'Little Rock', ' AR', ' Bill and Hillary Clinton Nat Adams Field'),
('LNK', 'Lincoln', ' NE', ' Lincoln Airport'),
('LRD', 'Laredo', ' TX', ' Laredo International'),
('LSE', 'La Crosse', ' WI', ' La Crosse Regional'),
('LWB', 'Lewisburg', ' WV', ' Greenbrier Valley'),
('LWS', 'Lewiston', ' ID', ' Lewiston Nez Perce County'),
('LYH', 'Lynchburg', ' VA', ' Lynchburg Regional/Preston Glenn Field'),
('MAF', 'Midland/Odessa', ' TX', ' Midland International Air and Space Port'),
('MBS', 'Saginaw/Bay City/Midland', ' MI', ' MBS International'),
('MCI', 'Kansas City', ' MO', ' Kansas City International'),
('MCO', 'Orlando', ' FL', ' Orlando International'),
('MCW', 'Mason City', ' IA', ' Mason City Municipal'),
('MDT', 'Harrisburg', ' PA', ' Harrisburg International'),
('MDW', 'Chicago', ' IL', ' Chicago Midway International'),
('MEI', 'Meridian', ' MS', ' Key Field'),
('MEM', 'Memphis', ' TN', ' Memphis International'),
('MFE', 'Mission/McAllen/Edinburg', ' TX', ' McAllen International'),
('MFR', 'Medford', ' OR', ' Rogue Valley International - Medford'),
('MGM', 'Montgomery', ' AL', ' Montgomery Regional'),
('MHK', 'Manhattan/Ft. Riley', ' KS', ' Manhattan Regional'),
('MHT', 'Manchester', ' NH', ' Manchester Boston Regional'),
('MIA', 'Miami', ' FL', ' Miami International'),
('MKE', 'Milwaukee', ' WI', ' General Mitchell International'),
('MKG', 'Muskegon', ' MI', ' Muskegon County'),
('MLB', 'Melbourne', ' FL', ' Melbourne Orlando International'),
('MLI', 'Moline', ' IL', ' Quad Cities International'),
('MLU', 'Monroe', ' LA', ' Monroe Regional'),
('MOB', 'Mobile', ' AL', ' Mobile Regional'),
('MOT', 'Minot', ' ND', ' Minot International'),
('MQT', 'Marquette', ' MI', ' Marquette Sawyer Regional'),
('MRY', 'Monterey', ' CA', ' Monterey Regional'),
('MSN', 'Madison', ' WI', ' Dane County Regional-Truax Field'),
('MSO', 'Missoula', ' MT', ' Missoula Montana'),
('MSP', 'Minneapolis', ' MN', ' Minneapolis-St Paul International'),
('MSY', 'New Orleans', ' LA', ' Louis Armstrong New Orleans International'),
('MTJ', 'Montrose/Delta', ' CO', ' Montrose Regional'),
('MVY', 'Martha\'s Vineyard', ' MA', ' Martha\'s Vineyard Airport'),
('MYR', 'Myrtle Beach', ' SC', ' Myrtle Beach International'),
('OAJ', 'Jacksonville/Camp Lejeune', ' NC', ' Albert J Ellis'),
('OAK', 'Oakland', ' CA', ' Metro Oakland International'),
('OGD', 'Ogden', ' UT', ' Ogden-Hinckley'),
('OGG', 'Kahului', ' HI', ' Kahului Airport'),
('OGS', 'Ogdensburg', ' NY', ' Ogdensburg International'),
('OKC', 'Oklahoma City', ' OK', ' Will Rogers World'),
('OMA', 'Omaha', ' NE', ' Eppley Airfield'),
('OME', 'Nome', ' AK', ' Nome Airport'),
('ONT', 'Ontario', ' CA', ' Ontario International'),
('ORD', 'Chicago', ' IL', ' Chicago O\'Hare International'),
('ORF', 'Norfolk', ' VA', ' Norfolk International'),
('ORH', 'Worcester', ' MA', ' Worcester Regional'),
('OTH', 'North Bend/Coos Bay', ' OR', ' Southwest Oregon Regional'),
('OTZ', 'Kotzebue', ' AK', ' Ralph Wien Memorial'),
('OWB', 'Owensboro', ' KY', ' Owensboro Daviess County Regional'),
('PAE', 'Everett', ' WA', ' Snohomish County'),
('PAH', 'Paducah', ' KY', ' Barkley Regional'),
('PBG', 'Plattsburgh', ' NY', ' Plattsburgh International'),
('PBI', 'West Palm Beach/Palm Beach', ' FL', ' Palm Beach International'),
('PDX', 'Portland', ' OR', ' Portland International'),
('PGD', 'Punta Gorda', ' FL', ' Punta Gorda Airport'),
('PGV', 'Greenville', ' NC', ' Pitt Greenville'),
('PHF', 'Newport News/Williamsburg', ' VA', ' Newport News/Williamsburg International'),
('PHL', 'Philadelphia', ' PA', ' Philadelphia International'),
('PHX', 'Phoenix', ' AZ', ' Phoenix Sky Harbor International'),
('PIA', 'Peoria', ' IL', ' General Downing - Peoria International'),
('PIB', 'Hattiesburg/Laurel', ' MS', ' Hattiesburg-Laurel Regional'),
('PIE', 'St. Petersburg', ' FL', ' St Pete Clearwater International'),
('PIH', 'Pocatello', ' ID', ' Pocatello Regional'),
('PIR', 'Pierre', ' SD', ' Pierre Regional'),
('PIT', 'Pittsburgh', ' PA', ' Pittsburgh International'),
('PLN', 'Pellston', ' MI', ' Pellston Regional Airport of Emmet County'),
('PNS', 'Pensacola', ' FL', ' Pensacola International'),
('PPG', 'Pago Pago', ' TT', ' Pago Pago International'),
('PRC', 'Prescott', ' AZ', ' Prescott Regional Ernest A Love Field'),
('PSC', 'Pasco/Kennewick/Richland', ' WA', ' Tri Cities'),
('PSE', 'Ponce', ' PR', ' Mercedita'),
('PSG', 'Petersburg', ' AK', ' Petersburg James A Johnson'),
('PSM', 'Portsmouth', ' NH', ' Portsmouth International at Pease'),
('PSP', 'Palm Springs', ' CA', ' Palm Springs International'),
('PUB', 'Pueblo', ' CO', ' Pueblo Memorial'),
('PUW', 'Pullman', ' WA', ' Pullman Moscow Regional'),
('PVD', 'Providence', ' RI', ' Rhode Island Tf Green International'),
('PVU', 'Provo', ' UT', ' Provo Municipal'),
('PWM', 'Portland', ' ME', ' Portland International Jetport'),
('RAP', 'Rapid City', ' SD', ' Rapid City Regional'),
('RDD', 'Redding', ' CA', ' Redding Regional'),
('RDM', 'Bend/Redmond', ' OR', ' Roberts Field'),
('RDU', 'Raleigh/Durham', ' NC', ' Raleigh-Durham International'),
('RFD', 'Rockford', ' IL', ' Chicago/Rockford International'),
('RHI', 'Rhinelander', ' WI', ' Rhinelander/Oneida County'),
('RIC', 'Richmond', ' VA', ' Richmond International'),
('RIW', 'Riverton/Lander', ' WY', ' Central Wyoming Regional'),
('RKS', 'Rock Springs', ' WY', ' Southwest Wyoming Regional'),
('RNO', 'Reno', ' NV', ' Reno/Tahoe International'),
('ROA', 'Roanoke', ' VA', ' Roanoke Blacksburg Regional'),
('ROC', 'Rochester', ' NY', ' Frederick Douglass Grtr Rochester International'),
('ROW', 'Roswell', ' NM', ' Roswell Air Center'),
('RST', 'Rochester', ' MN', ' Rochester International'),
('RSW', 'Fort Myers', ' FL', ' Southwest Florida International'),
('SAF', 'Santa Fe', ' NM', ' Santa Fe Municipal'),
('SAN', 'San Diego', ' CA', ' San Diego International'),
('SAT', 'San Antonio', ' TX', ' San Antonio International'),
('SAV', 'Savannah', ' GA', ' Savannah/Hilton Head International'),
('SBA', 'Santa Barbara', ' CA', ' Santa Barbara Municipal'),
('SBN', 'South Bend', ' IN', ' South Bend International'),
('SBP', 'San Luis Obispo', ' CA', ' San Luis County Regional'),
('SCC', 'Deadhorse', ' AK', ' Deadhorse Airport'),
('SCE', 'State College', ' PA', ' University Park'),
('SCK', 'Stockton', ' CA', ' Stockton Metro'),
('SDF', 'Louisville', ' KY', ' Louisville Muhammad Ali International'),
('SEA', 'Seattle', ' WA', ' Seattle/Tacoma International'),
('SFB', 'Sanford', ' FL', ' Orlando Sanford International'),
('SFO', 'San Francisco', ' CA', ' San Francisco International'),
('SGF', 'Springfield', ' MO', ' Springfield-Branson National'),
('SGU', 'St. George', ' UT', ' St George Regional'),
('SHD', 'Staunton', ' VA', ' Shenandoah Valley Regional'),
('SHR', 'Sheridan', ' WY', ' Sheridan County'),
('SHV', 'Shreveport', ' LA', ' Shreveport Regional'),
('SIT', 'Sitka', ' AK', ' Sitka Rocky Gutierrez'),
('SJC', 'San Jose', ' CA', ' Norman Y. Mineta San Jose International'),
('SJT', 'San Angelo', ' TX', ' San Angelo Regional/Mathis Field'),
('SJU', 'San Juan', ' PR', ' Luis Munoz Marin International'),
('SLC', 'Salt Lake City', ' UT', ' Salt Lake City International'),
('SLN', 'Salina', ' KS', ' Salina Regional'),
('SMF', 'Sacramento', ' CA', ' Sacramento International'),
('SMX', 'Santa Maria', ' CA', ' Santa Maria Public/Capt. G. Allan Hancock Field'),
('SNA', 'Santa Ana', ' CA', ' John Wayne Airport-Orange County'),
('SPI', 'Springfield', ' IL', ' Abraham Lincoln Capital'),
('SPN', 'Saipan', ' TT', ' Francisco C. Ada Saipan International'),
('SPS', 'Wichita Falls', ' TX', ' Sheppard AFB/Wichita Falls Municipal'),
('SRQ', 'Sarasota/Bradenton', ' FL', ' Sarasota/Bradenton International'),
('STC', 'St. Cloud', ' MN', ' St. Cloud Regional'),
('STL', 'St. Louis', ' MO', ' St Louis Lambert International'),
('STS', 'Santa Rosa', ' CA', ' Charles M. Schulz - Sonoma County'),
('STT', 'Charlotte Amalie', ' VI', ' Cyril E King'),
('STX', 'Christiansted', ' VI', ' Henry E. Rohlsen'),
('SUN', 'Sun Valley/Hailey/Ketchum', ' ID', ' Friedman Memorial'),
('SUX', 'Sioux City', ' IA', ' Sioux Gateway Brig Gen Bud Day Field'),
('SWF', 'Newburgh/Poughkeepsie', ' NY', ' New York Stewart International'),
('SWO', 'Stillwater', ' OK', ' Stillwater Regional'),
('SYR', 'Syracuse', ' NY', ' Syracuse Hancock International'),
('TBN', 'Fort Leonard Wood', ' MO', ' Waynesville-St. Robert Regional Forney Field'),
('TLH', 'Tallahassee', ' FL', ' Tallahassee International'),
('TOL', 'Toledo', ' OH', ' Eugene F Kranz Toledo Express'),
('TPA', 'Tampa', ' FL', ' Tampa International'),
('TRI', 'Bristol/Johnson City/Kingsport', ' TN', ' Tri Cities'),
('TTN', 'Trenton', ' NJ', ' Trenton Mercer'),
('TUL', 'Tulsa', ' OK', ' Tulsa International'),
('TUS', 'Tucson', ' AZ', ' Tucson International'),
('TVC', 'Traverse City', ' MI', ' Cherry Capital'),
('TWF', 'Twin Falls', ' ID', ' Joslin Field - Magic Valley Regional'),
('TXK', 'Texarkana', ' AR', ' Texarkana Regional-Webb Field'),
('TYR', 'Tyler', ' TX', ' Tyler Pounds Regional'),
('TYS', 'Knoxville', ' TN', ' McGhee Tyson'),
('USA', 'Concord', ' NC', ' Concord Padgett Regional'),
('VCT', 'Victoria', ' TX', ' Victoria Regional'),
('VEL', 'Vernal', ' UT', ' Vernal Regional'),
('VLD', 'Valdosta', ' GA', ' Valdosta Regional'),
('VPS', 'Valparaiso', ' FL', ' Eglin AFB Destin Fort Walton Beach'),
('WRG', 'Wrangell', ' AK', ' Wrangell Airport'),
('WYS', 'West Yellowstone', ' MT', ' Yellowstone'),
('XNA', 'Fayetteville', ' AR', ' Northwest Arkansas National'),
('XWA', 'Williston', ' ND', ' Williston Basin International'),
('YAK', 'Yakutat', ' AK', ' Yakutat Airport'),
('YKM', 'Yakima', ' WA', ' Yakima Air Terminal/McAllister Field'),
('YUM', 'Yuma', ' AZ', ' Yuma MCAS/Yuma International');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `EMID` int(11) NOT NULL,
  `UPEID` int(11) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `m_name` varchar(25) DEFAULT NULL,
  `l_name` varchar(25) NOT NULL,
  `position` varchar(25) DEFAULT NULL,
  `hire_date` varchar(10) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `address1` varchar(25) NOT NULL,
  `address2` varchar(25) DEFAULT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `birth_date` varchar(10) DEFAULT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EMID`, `UPEID`, `f_name`, `m_name`, `l_name`, `position`, `hire_date`, `salary`, `address1`, `address2`, `city`, `state`, `zip`, `phone`, `birth_date`, `password`) VALUES
(1, 2, 'Lucas', NULL, 'Pfeifer', NULL, NULL, NULL, '355 Milewood Rd', NULL, 'Millbrook', 'NY', NULL, NULL, NULL, '$2y$10$wAz4pGGU96PN9pexHDvxu.fzV614LiHiiSsE1HticJ6QokJJEmSCa');

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
-- Table structure for table `model_lookup`
--

DROP TABLE IF EXISTS `model_lookup`;
CREATE TABLE `model_lookup` (
  `tail_number` char(6) NOT NULL,
  `model_number` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model_lookup`
--

INSERT INTO `model_lookup` (`tail_number`, `model_number`) VALUES
('N723FR', '3940005'),
('N114DU', '1400012'),
('N614CZ', '3260121'),
('N935JB', '3930402'),
('N999JQ', '3940032'),
('N124US', '3930316'),
('N93305', '3260415'),
('N89349', '3260410'),
('N87531', '13844BZ'),
('N395DZ', '3940305'),
('N145DQ', '1400010'),
('N91007', '1386010'),
('N199DN', '1385101'),
('N93003', '3940034'),
('N67134', '1384958'),
('N855VA', '3940006'),
('N7888A', '1384413'),
('N959LR', '1390016'),
('N54711', '13844BY'),
('N841AN', '1385609'),
('N17752', '13844CA'),
('N192UW', '3930370'),
('N8821S', '13844FZ'),
('N979AK', '138469A'),
('N17753', '13844D1'),
('N778XF', '3940009'),
('N375JB', '3260408'),
('N834JB', '3940004'),
('N603FR', '3930915'),
('N998NN', '1384414'),
('N969WN', '1384404'),
('N230HA', '3930910'),
('N799UA', '1385219'),
('N986SW', '1390008'),
('N881BK', '1388002'),
('N2846U', '1385256'),
('N930DZ', '138488H'),
('N495AS', '13848CE'),
('N625UX', '326041A'),
('N79011', '1385225'),
('N271LV', '13844CS'),
('N81449', '13848A3'),
('N519SY', '3260988'),
('N313DU', '1400015'),
('N364DX', '3940028'),
('N395FR', '3940325'),
('N337NB', '3930350'),
('N323AS', '1384526'),
('N89362', '3260979'),
('N79402', '13848A1'),
('N333NW', '3930320'),
('N872DC', '1390015'),
('N374NW', '3930322'),
('N371NB', '3940002'),
('N352FR', '3940310'),
('N399HA', '3940018'),
('N399DA', '13844CF'),
('N376NW', '3940010'),
('N3773D', '138440F'),
('N776DE', '13844ZQ'),
('N378NW', '3940025'),
('N394DL', '1385203'),
('N463AA', '3940051'),
('N453QX', '1390042'),
('N418DX', '3940098'),
('N667AW', '3930326'),
('N419DX', '3940314'),
('N998AT', '1383700'),
('N899UA', '3940015'),
('N8699A', '138440A'),
('N576DZ', '3940315'),
('N515DN', '3940050'),
('N597AS', '1384527'),
('N832AW', '3930340'),
('N557NW', '1384970'),
('N549AS', '13844NA'),
('N7883A', '13845AA'),
('N7752B', '1384511'),
('N644AS', '13844CN'),
('N7842A', '1384540'),
('N7887A', '13844C3'),
('N7881A', '13844NE'),
('N75858', '1384930'),
('N78866', '1384931'),
('N596NW', '1384991'),
('N78060', '1385270'),
('N942LL', '3260212'),
('N613AE', '3260210'),
('N712TW', '1384972'),
('N979RP', '3260406'),
('N677UA', '1385200'),
('N699DL', '1384965'),
('N686UA', '1385187'),
('N770UW', '3930323'),
('N727TW', '1384908'),
('N736AT', '1385324'),
('N725FR', '1380108'),
('N799AN', '1385213'),
('N764JD', '3260416'),
('N882RW', '326040B'),
('N766JM', '3260499'),
('N7885A', '13844CH'),
('N7879A', '138447E'),
('N7841A', '13844CV'),
('N7877H', '1384418'),
('N7869A', '13844JA'),
('N7824A', '1384600'),
('N7854B', '13844FH'),
('N7880D', '1384518'),
('N7889A', '13844LA'),
('N798SW', '1384502'),
('N997NN', '13844CB'),
('N865DN', '138488K'),
('N821NW', '3940030'),
('N850UA', '3930317'),
('N872RW', '3260403'),
('N900PC', '1384907'),
('N831NW', '3940070'),
('N845MH', '1385134'),
('N851NW', '3930374'),
('N855UA', '3940001'),
('N861NW', '3940031'),
('N877BF', '05628NI'),
('N969NK', '3940320'),
('N930VA', '3940045'),
('N970NK', '3940307'),
('N951DX', '13844FN');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `UPEID` int(11) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_employee` int(1) NOT NULL,
  `is_customer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`UPEID`, `is_admin`, `is_employee`, `is_customer`) VALUES
(1, 0, 0, 1),
(2, 1, 1, 1);

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
-- Table structure for table `seats`
--

DROP TABLE IF EXISTS `seats`;
CREATE TABLE `seats` (
  `seatID` int(11) NOT NULL,
  `flightID` int(7) NOT NULL,
  `seat_number` char(3) NOT NULL,
  `availability` int(1) NOT NULL,
  `class` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `primkey` int(3) NOT NULL,
  `test1` int(2) NOT NULL,
  `test2` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`primkey`, `test1`, `test2`) VALUES
(1, 12, 23),
(2, 12, 23),
(3, 12, 23),
(4, 23, 34);

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
(33, 1, 'Lucas', 'Bennet', 'Pfeifer', 'test2@gmail.com', '8458676832', '2023-10-14', '355 Milewood Rd', NULL, 'Millbrook', 'NY', '12545', '$2y$10$UPDlbnQS3cFBKc.kJhyNrOqUM..vmfjUDm21ZRcNS/aKb.8npkzqi'),
(34, 1, 'Lucas', NULL, 'Pfeifer', 'lpfeifer2829834@gmail.com', '', '', '123 road road', NULL, 'millbrook', 'ny', '12545', '$2y$10$CyrJ.TzNXriWvVqzBIhQS.b26rAIAwoUHg0/cnxMXxHSlssy1eKM.'),
(35, 1, 'Lucas', 'Bennet', 'Pfeifer', 'lpfeifer22342348@gmail.com', '8458676832', '0001-02-22', '355 Milewood Rd', NULL, 'Millbrook', 'NY', '12545', '$2y$10$GuOn5mkrsReUsv/Y1xIM9.wJPbmC3n.s7pbPL8aY.5IOgXssNd67S');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`AL_code`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`AP_code`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EMID`),
  ADD KEY `UPEID` (`UPEID`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`LLID`),
  ADD KEY `ULID` (`ULID`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`UPEID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`RSID`),
  ADD KEY `FDID` (`FDID`),
  ADD KEY `UPID` (`UPID`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seatID`),
  ADD KEY `FDID` (`flightID`),
  ADD KEY `class` (`class`);

--
-- Indexes for table `status_logs`
--
ALTER TABLE `status_logs`
  ADD PRIMARY KEY (`STID`),
  ADD KEY `UPID` (`UPID`) USING BTREE;

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`primkey`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `LLID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `UPEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `RSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `seatID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_logs`
--
ALTER TABLE `status_logs`
  MODIFY `STID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `primkey` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `TKID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `ULID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`UPEID`) REFERENCES `permissions` (`UPEID`);

--
-- Constraints for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD CONSTRAINT `login_logs_ibfk_1` FOREIGN KEY (`ULID`) REFERENCES `user_login` (`ULID`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
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
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`UPEID`) REFERENCES `permissions` (`UPEID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
