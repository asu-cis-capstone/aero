-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: www.aeroappstechnology.com    Database: aeroapps
-- ------------------------------------------------------
-- Server version	5.5.41-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `faa`
--

DROP TABLE IF EXISTS `faa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faa` (
  `ls_code` char(6) NOT NULL,
  `descrip` varchar(100) NOT NULL,
  `subj` varchar(30) NOT NULL,
  `topic` varchar(30) NOT NULL,
  `subtop` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faa`
--

LOCK TABLES `faa` WRITE;
/*!40000 ALTER TABLE `faa` DISABLE KEYS */;
INSERT INTO `faa` VALUES ('PLT168','Recall angle of attack - characteristics / forces / principles','Flight Theory','Aerodynamics',''),('PLT236','Recall forces acting on aircraft - airfoil / center of pressure / mean camber line','Flight Theory','Aerodynamics',''),('PLT242','Recall forces acting on aircraft - lift / drag / thrust / weight / stall / limitations','Flight Theory','Aerodynamics',''),('PLT243','Recall forces acting on aircraft - propeller / torque','Flight Theory','Aerodynamics',''),('PLT247','Recall forces acting on aircraft - thrust / drag / weight / lift','Flight Theory','Aerodynamics',''),('PLT248','Recall forces acting on aircraft - turns','Flight Theory','Aerodynamics',''),('PLT112','Recall aircraft controls - proper use / techniques','Flight Theory','Aircraft Controls',''),('PLT346','Recall primary / secondary flight controls - types / purpose / functionality / operation','Flight Theory','Aircraft Controls',''),('PLT473','Recall secondary flight controls - types / purpose / functionality','Flight Theory','Aircraft Controls',''),('PLT519','Recall wing spoilers - purpose / operation','Flight Theory','Aircraft Controls',''),('PLT140','Recall airport operations - LAHSO','Regulations','Airport',''),('PLT435','Recall regulations - operational procedures for an uncontrolled airport','Regulations','Airport',''),('PLT141','Recall airport operations - markings / signs / lighting','Regulations','Airport',''),('PLT377','Recall regulations - airworthiness certificates / requirements / responsibilities','Regulations','Airworthiness','Documents'),('PLT399','Recall regulations - display / inspection of licences and certificates','Regulations','Airworthiness','Documents'),('PLT400','Recall regulations - documents to be carried on aircraft during flight','Regulations','Airworthiness','Documents'),('PLT119','Recall aircraft lighting - anti-collision / landing / navigation','Regulations','Airworthiness','Equipment'),('PLT402','Recall regulations - ELT requirements','Regulations','Airworthiness','Equipment'),('PLT372','Recall regulations - aircraft inspection / records / expiration','Regulations','Airworthiness','Maintenance'),('PLT374','Recall regulations - aircraft owner / operator responsibilities','Regulations','Airworthiness','Maintenance'),('PLT375','Recall regulations - aircraft return to service','Regulations','Airworthiness','Maintenance'),('PLT378','Recall regulations - Airworthiness Directives','Regulations','Airworthiness','Maintenance'),('PLT425','Recall regulations - maintenance reports / records / entries','Regulations','Airworthiness','Maintenance'),('PLT426','Recall regulations - maintenance requirements','Regulations','Airworthiness','Maintenance'),('PLT439','Recall regulations - persons authorized to perform maintenance','Regulations','Airworthiness','Maintenance'),('PLT446','Recall regulations - preventative maintenance','Regulations','Airworthiness','Maintenance'),('PLT371','Recall regulations - Aircraft Category / Class','Regulations','Airworthiness',''),('PLT373','Recall regulations - aircraft operating limitations','Regulations','Airworthiness',''),('PLT077','Interpret information on an Airport Diagram','Navigation','Charts',''),('PLT078','Interpret information in an Airport Facility Directory (AFD)','Navigation','Charts',''),('PLT201','Recall departure procedures - ODP / SID','Navigation','Charts',''),('PLT281','Recall information in an Airport Facility Directory','Navigation','Charts',''),('PLT064','Interpret information on a Sectional Chart','Navigation','Charts',''),('PLT194','Recall collision avoidance - scanning techniques','Special Emphasis Area','Colision Avoidance',''),('PLT200','Recall dead reckoning - calculations / charts','Navigation','Dead Reckoning',''),('PLT320','Recall navigation - true north / magnetic north','Navigation','Dead Reckoning',''),('PLT463','Recall regulations alcohol or drugs','Regulations','Drugs & Alcohol',''),('PLT012','Calculate aircraft performance - time/speed/distance/course/fuel/wind','Performance','E6B',''),('PLT013','Calculate crosswind / headwind components','Performance','E6B',''),('PLT019','Calculate pressure altitude','Performance','E6B',''),('PLT147','Recall airport operations - visual glideslope indicators','Regulations','Airport',''),('PLT485','Recall taxiing / crosswind / techniques','Flight Technique','Airport Operations',NULL),('PLT486','Recall taxiing / takeoff - techniques / procedures','Flight Technique','Airport Operations',''),('PLT370','Recall regulations - Air Traffic Control authorization / clearances','Regulations','Airspace',''),('PLT376','Recall regulations - airspace special use / TFRS','Regulations','Airspace',''),('PLT393','Recall regulations - controlled / restricted airspace - requirements','Regulations','Airspace',''),('PLT040','Interpret airspace classes - charts / diagrams','Regulations','Airspace',''),('PLT161','Recall airspace classes - limits / requirements / restrictions / airspeeds / equipment','Regulations','Airspace',''),('PLT163','Recall airspace requirements - visibility / cloud clearance','Regulations','Airspace','');
/*!40000 ALTER TABLE `faa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `image` mediumblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_answers`
--

DROP TABLE IF EXISTS `test_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_answers` (
  `answer` char(1) NOT NULL,
  `aText` varchar(250) NOT NULL,
  `bText` varchar(250) NOT NULL,
  `cText` varchar(250) NOT NULL,
  `qID` int(4) NOT NULL,
  `exp` varchar(400) DEFAULT NULL,
  `expImg1ID` int(11) DEFAULT NULL,
  `expImg2ID` int(11) DEFAULT NULL,
  `expImg3ID` int(11) DEFAULT NULL,
  `expImg4ID` int(11) DEFAULT NULL,
  `expImg5ID` int(11) DEFAULT NULL,
  KEY `qID` (`qID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_answers`
--

LOCK TABLES `test_answers` WRITE;
/*!40000 ALTER TABLE `test_answers` DISABLE KEYS */;
INSERT INTO `test_answers` VALUES ('A','To enable the pilot to make steeper approaches to a landing without increasing the airspeed .','To relieve the pilot of maintaining continuous pressure on the controls.','To decrease wing area to vary the lift.',4000,NULL,NULL,NULL,NULL,NULL,NULL),('C','decrease the angle of descent without increasing the airspeed','permit a touchdown at a higher indicated airspeed.','increase the angle of descent without increasing the airspeed .',4001,NULL,NULL,NULL,NULL,NULL,NULL),('A','To control yaw.','To control overbanking tendency.','To control roll.',4002,NULL,NULL,NULL,NULL,NULL,NULL),('A','lift, weight, thrust, and drag','lift, weight, gravity, and thrust','lift, gravity, power, and friction',4003,NULL,NULL,NULL,NULL,NULL,NULL),('A','During u naccelerated flight.','When the aircraft is accelerating.','When the aircraft is at rest on the ground.',4004,NULL,NULL,NULL,NULL,NULL,NULL),('A','Frost will disrupt the smooth flow of air over the wing, adversely affecting its lifting capability.','Frost will change the camber of the wing, increasing its lifting capability.','Frost will cause the airplane to become airborne with a higher angle of attack, decreasing the stall speed.',4013,NULL,NULL,NULL,NULL,NULL,NULL),('A','Frost changes the basic aerodynamic ·shape of the airfoils, thereby decreasing lift.','Frost slows the airflow over the airfoils, thereby increasing control effectiveness.','Frost spoils the smooth flow of air over the wings, thereby decreasing lifting capability.',4014,NULL,NULL,NULL,NULL,NULL,NULL),('C','Wingtip vortices increase creating wake turbulence problems for arriving and departing aircraft.','I nduced drag decreases; therefore, any excess speed at the point of flare may cause considerable floating.','A full stall landing will require less up elevator deflection than would a full stall when done free of ground effect.',4017,NULL,NULL,NULL,NULL,NULL,NULL),('B','Settling to the surface abruptly during landing.','Becoming airborne before reaching recommended takeoff speed.','Inability to get airborne even though airspeed is sufficient for normal takeoff needs.',4018,NULL,NULL,NULL,NULL,NULL,NULL),('B','The horizontal component of lift.','The vertical component of lift.','Centrifugal force.',4019,NULL,NULL,NULL,NULL,NULL,NULL),('A','Depart in any direction consistent with safety, after crossing the airport boundary.','Make all turns to the left.','Comply with any FAA traffic pattern established for the airport.',4127,NULL,NULL,NULL,NULL,NULL,NULL),('C','45° to the base leg just below traffic pattern altitude.','to enter 45° at the midpoint of the downwind leg at traffic pattern altitude.','to cross directly over the airport at traffic pattern altitude and join the downwind leg.',4128,NULL,NULL,NULL,NULL,NULL,NULL),('B','a white light signal.','a green light signal.','an amber light signal.',4129,NULL,NULL,NULL,NULL,NULL,NULL),('B','a white light signal.','a green light signal.','an amber light signal.',4130,NULL,NULL,NULL,NULL,NULL,NULL),('C','red light signal.','pink light signal.','green light signal.',4131,NULL,NULL,NULL,NULL,NULL,NULL),('A','above the glide slope.','below the glide slope.','on the glide slope.',4132,NULL,NULL,NULL,NULL,NULL,NULL),('B','off course to the left.','above the glide slope.','below the glide slope.',4133,NULL,NULL,NULL,NULL,NULL,NULL),('B','discontinue the approach,','fly the same traffic pattern and approach again, and land.','exercise extreme caution and abandon the approach, realizing the airport is unsafe for landing.	abandon the approach, circle the airport to the right, and expect a flashing white light when the airport is safe for landing.',4182,NULL,NULL,NULL,NULL,NULL,NULL),('B','is cleared to land.','should give way to other aircraft and continue circling.','should return for landing.',4183,NULL,NULL,NULL,NULL,NULL,NULL),('A','taxi at a faster speed.','taxi only on taxiways and not cross runways.','return to the starting point on the airport.',4184,NULL,NULL,NULL,NULL,NULL,NULL),('C','flashing red.','steady red.','alternating red and green.',4185,NULL,NULL,NULL,NULL,NULL,NULL),('B','Flashing green.','Steady green.','Flashing white.',4186,NULL,NULL,NULL,NULL,NULL,NULL),('A','hold position.','exercise extreme caution.','not land; the airport is unsafe.',4187,NULL,NULL,NULL,NULL,NULL,NULL),('B','Observe the traffic flow, enter the pattern, and look for a light signal from the tower.','Enter a crosswind leg and rock the wings.','Flash the landing lights and cycle the landing gear while circling the airport.',4188,NULL,NULL,NULL,NULL,NULL,NULL),('A','118.0 and 118.8 MHz.','121.5 and 243.0 M Hz.','123.0 and 119.0 MHz.',4189,NULL,NULL,NULL,NULL,NULL,NULL),('B','Turn off the aircraft EL T after landing.','Ask the airport tower if they are receiving an ELT signal.','Monitor 121.5 before engine shutdown.',4190,NULL,NULL,NULL,NULL,NULL,NULL),('C','this airport is designated as an airport of entry.','the Flight Service Station has equipment with which to determine your direction from the station.','this airport has a direct-line phone to the Flights service Station.',4191,NULL,NULL,NULL,NULL,NULL,NULL),('B','VHF transmitter and receiver.','4096-code transponder.','VOR receiver and DME.',4192,NULL,NULL,NULL,NULL,NULL,NULL),('A','a biennial flight review.','an annual flight review.','a semiannual flight review.',4230,NULL,NULL,NULL,NULL,NULL,NULL),('A','90 days.','12 calendar months.','24 calendar months.',4231,NULL,NULL,NULL,NULL,NULL,NULL),('A','1829','1859','1929',4232,NULL,NULL,NULL,NULL,NULL,NULL),('C','make and model.','category and class, but not type.','category, class, and type, if a type rating is required.',4233,NULL,NULL,NULL,NULL,NULL,NULL),('C','200 knots.','230 knots.','250 knots.',4271,NULL,NULL,NULL,NULL,NULL,NULL),('A','200 knots.','230 knots.','250 knots.',4272,NULL,NULL,NULL,NULL,NULL,NULL),('A','An altitude allowing, if a power unit fails, an emergency landing without undue hazard to persons or property on the surface.','An altitude of 500 feet above the surface and no closer than 500 feet to any person, vessel, vehicle, or structure.','An altitude of 500 feet above the highest obstacle within a horizontal radius of 1,000 feet.',4273,NULL,NULL,NULL,NULL,NULL,NULL),('A','An altitude of 1,000 feet above any person, vessel, vehicle, or structure.','An altitude of 500 feet above the highest obstacle within a horizontal radius of 1,000 feet of the aircraft.','An altitude of 1,000 feet above the highest obstacle within a horizontal radius of 2,000 feet of the aircraft.',4274,NULL,NULL,NULL,NULL,NULL,NULL),('C','flight can be conducted 500 feet below the clouds.','airplane is equipped for instrument flight.','flight visibility is at least 3 miles.',4310,NULL,NULL,NULL,NULL,NULL,NULL),('B','The airplane must be under radar surveillance at all times while in Class D airspace.','The airplane must be equipped for IFR with an altitude reporting transponder.','The pilot must be instrument rated, and the airplane must be IFR equipped.',4311,NULL,NULL,NULL,NULL,NULL,NULL),('C','1 mile flight visibility.','1 mile flight visibility and 1,000-foot ceiling.','3 miles flight visibility and 1,000-foot ceiling.',4312,NULL,NULL,NULL,NULL,NULL,NULL),('A','4,500 feet.','5,000 feet.','5,500 feet.',4313,NULL,NULL,NULL,NULL,NULL,NULL),('C','Even thousand.','Even thousand plus 500 feet.','Odd thousand plus 500 feet.',4314,NULL,NULL,NULL,NULL,NULL,NULL),('C','4,000 feet.','4,500 feet.','5,000 feet.',4315,NULL,NULL,NULL,NULL,NULL,NULL),('B','Anytime.','At 15 and 45 minutes past the hour.','During the first 5 minutes after the hour.',4318,NULL,NULL,NULL,NULL,NULL,NULL),('C','Every 24 months.','When 50 percent of their useful life expires.','At the time of each 100-hour or annual inspection.',4319,NULL,NULL,NULL,NULL,NULL,NULL),('B','After one-half the battery\'s useful life.','During each annual and 100-hour inspection.','Every 24 calendar months.',4320,NULL,NULL,NULL,NULL,NULL,NULL),('A','It increases performance.','It decreases performance.','It has no effect on performance.',4356,NULL,NULL,NULL,NULL,NULL,NULL),('B','An increase in barometric pressure.','An increase in ambient temperature.','A decrease in relative humidity.',4357,NULL,NULL,NULL,NULL,NULL,NULL),('B','Efficiency is increased due to less friction on  the propeller blades.','Efficiency is reduced because the propeller exerts less force at high density altitudes than at low density altitudes.','Efficiency is reduced due to the increased  force of the propeller in the thinner air.',4358,NULL,NULL,NULL,NULL,NULL,NULL),('B','It increases engine performance.','It reduces climb performance.','It increases takeoff performance.',4359,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `test_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_questions`
--

DROP TABLE IF EXISTS `test_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_questions` (
  `test` varchar(15) NOT NULL,
  `qID` int(4) NOT NULL,
  `qText` varchar(250) NOT NULL,
  `ls_code` char(6) NOT NULL,
  `qImg1ID` int(11) DEFAULT NULL,
  `qImg2ID` int(11) DEFAULT NULL,
  `qImg3ID` int(11) DEFAULT NULL,
  `qImg4ID` int(11) DEFAULT NULL,
  `qImg5ID` int(11) DEFAULT NULL,
  `refName` varchar(6) NOT NULL,
  `refPincite` varchar(7) NOT NULL,
  PRIMARY KEY (`qID`),
  KEY `ls_code` (`ls_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_questions`
--

LOCK TABLES `test_questions` WRITE;
/*!40000 ALTER TABLE `test_questions` DISABLE KEYS */;
INSERT INTO `test_questions` VALUES ('',4000,'What is one purpose of wing flaps?','PLT473',NULL,NULL,NULL,NULL,NULL,'',''),('',4001,'One of the main functions of flaps during approach and landing is to','PLT473',NULL,NULL,NULL,NULL,NULL,'',''),('',4002,'What is the purpose of the rudder on an airplane?','PLT346',NULL,NULL,NULL,NULL,NULL,'',''),('',4003,'The four forces acting on an airplane in flight are','PLT346',NULL,NULL,NULL,NULL,NULL,'',''),('',4004,'When are the four forces that act on an airplane in equilibrium?','PLT242',NULL,NULL,NULL,NULL,NULL,'',''),('',4013,'How will frost on the wings of an airplane affect takeoff performance?','PLT247',NULL,NULL,NULL,NULL,NULL,'',''),('',4014,'Why is frost considered hazardous to flight?','PLT134',NULL,NULL,NULL,NULL,NULL,'',''),('',4017,'What must a pilot be aware of as a result of ground effect?','PLT128',NULL,NULL,NULL,NULL,NULL,'',''),('',4018,'Ground effect is most likely to result in which problem?','PLT131',NULL,NULL,NULL,NULL,NULL,'',''),('',4019,'What force makes an airplane turn?','PLT131',NULL,NULL,NULL,NULL,NULL,'',''),('',4127,'Which is the correct traffic pattern departure procedure to use at a no controlled airport?','PLT242',NULL,NULL,NULL,NULL,NULL,'',''),('',4128,'The recommended entry position to an airport traffic pattern is','PLT150',NULL,NULL,NULL,NULL,NULL,'',''),('',4129,'An on glide slope indication from a tri-color VASI is','PLT147',NULL,NULL,NULL,NULL,NULL,'',''),('',4130,'An above glide slope indication from a tri-color VASI is','PLT147',NULL,NULL,NULL,NULL,NULL,'',''),('',4131,'A below glide slope indication from a tri-color VASI is a','PLT147',NULL,NULL,NULL,NULL,NULL,'',''),('',4132,'A (Refer to Figure 48.) While on final approach to a runway equipped with a standard 2-bar VASI , the lights appear as shown by illustration D. This means that the aircraft is','PLT147',NULL,NULL,NULL,NULL,NULL,'',''),('',4133,'(Refer to Figure 48.) While on final approach to a runway equipped with a standard 2-bar VASI , the lights appear as shown by illustration D. This means that the aircraft is','PLT147',NULL,NULL,NULL,NULL,NULL,'',''),('',4182,'While on final approach for landing, an alternating green and red light followed by a flashing red light is received from the control tower. Under these circumstances, the pilot should','PLT502',NULL,NULL,NULL,NULL,NULL,'',''),('',4183,'A steady green light signal directed from the control tower to an aircraft in flight is a signal that the pilot','PLT141',NULL,NULL,NULL,NULL,NULL,'',''),('',4184,'A flashing white light signal from the control tower to a taxiing aircraft is an indication to','PLT502',NULL,NULL,NULL,NULL,NULL,'',''),('',4185,'If the control tower uses a light signal to direct a pilot to give way to other aircraft and continue circling, the light will be','PLT502',NULL,NULL,NULL,NULL,NULL,'',''),('',4186,'Which light signal from the control tower clears a pilot to taxi?','PLT502',NULL,NULL,NULL,NULL,NULL,'',''),('',4187,'An alternating red and green light signal directed from the control tower to an aircraft in flight is a signal to','PLT502',NULL,NULL,NULL,NULL,NULL,'',''),('',4188,'If the aircraft\'s radio fails, what is the recommended procedure when landing at a controlled airport?','PLT150',NULL,NULL,NULL,NULL,NULL,'',''),('',4189,'When activated, an emergency locator transmitter(EL T) transmits on','PLT402',NULL,NULL,NULL,NULL,NULL,'',''),('',4190,'Which procedure is recommended to ensure that the emergency locator transmitter(EL T) has not been activated?','PLT402',NULL,NULL,NULL,NULL,NULL,'',''),('',4191,'The letters VHF/DF appearing in the Airport/Facility Directory for a certain airport indicate that','PLT281',NULL,NULL,NULL,NULL,NULL,'',''),('',4192,'To use VHF/DF facilities for assistance in locating an aircraft\'s position, the aircraft must have a','PLT362',NULL,NULL,NULL,NULL,NULL,'',''),('',4230,'Each recreational or private pilot is required to have','PLT442',NULL,NULL,NULL,NULL,NULL,'',''),('',4231,'To act as pilot in command of an aircraft carrying passengers, the pilot must have made at least three takeoffs and three landings in an aircraft of the same category, class, and if a type rating is required, of the same type, within the preceding','PLT411',NULL,NULL,NULL,NULL,NULL,'',''),('',4232,'If recency of experience requirements for night flight are not met and official sunset is 1830, the latest time passengers may be carried is','PLT442',NULL,NULL,NULL,NULL,NULL,'',''),('',4233,'To act as pilot in command of an aircraft carrying passengers, the pilot must have made three takeoffs and three landings within the preceding 90 days in an aircraft of the same','PLT457',NULL,NULL,NULL,NULL,NULL,'',''),('',4271,'When flying in the airspace underlying Class B airspace, the maximum speed authorized is','PLT161',NULL,NULL,NULL,NULL,NULL,'',''),('',4272,'Unless otherwise authorized, the maximum indicated airspeed at which aircraft may be flown when at or below 2,500 feet AGL and within 4 nautical miles of the primary airport of Class C airspace is','PLT393',NULL,NULL,NULL,NULL,NULL,'',''),('',4273,'Except when necessary for takeoff or landing, what is the minimum safe altitude for a pilot to operate an aircraft anywhere?','PLT430',NULL,NULL,NULL,NULL,NULL,'',''),('',4274,'Except when necessary for takeoff or landing, what is the minimum safe altitude required for a pilot to operate an aircraft over congested areas?','PLT430',NULL,NULL,NULL,NULL,NULL,'',''),('',4310,'No person may operate an airplane within Class D airspace at night under special VFR unless the ','PLT467',NULL,NULL,NULL,NULL,NULL,'',''),('',4311,'What are the minimum requirements for airplane operations under special VFR in Class D airspace at night?','PLT161',NULL,NULL,NULL,NULL,NULL,'',''),('',4312,'What is the minimum weather condition required for airplanes operating under special VFR in Class D airspace?','PLT376',NULL,NULL,NULL,NULL,NULL,'',''),('',4313,'Which VFR cruising altitude is acceptable for a flight on a Victor Airway with a magnetic course of 175°? The terrain is less than 1,000 feet.','PLT467',NULL,NULL,NULL,NULL,NULL,'',''),('',4314,'Which cruising altitude is appropriate for a VFR flight on a magnetic course of 135°?','PLT467',NULL,NULL,NULL,NULL,NULL,'',''),('',4315,'Which VFR cruising altitude is appropriate when flying above 3,000 feet AGL on a magnetic course of 185°?','PLT467',NULL,NULL,NULL,NULL,NULL,'',''),('',4318,'When may an emergency locator transmitter(ELT) be tested?','PLT402',NULL,NULL,NULL,NULL,NULL,'',''),('',4319,'When are non-rechargeable batteries of an emergency locator transmitter (ELT) required to be replaced?','PLT402',NULL,NULL,NULL,NULL,NULL,'',''),('',4320,'When must the battery in an emergency locator transmitter(ELT) be replaced(or recharged if the battery is rechargeable)?','PLT402',NULL,NULL,NULL,NULL,NULL,'',''),('',4356,'What effect, if any, does high humidity have on aircraft performance?','PLT124',NULL,NULL,NULL,NULL,NULL,'',''),('',4357,'Which factor would tend to increase the density altitude at a given airport?','PLT206',NULL,NULL,NULL,NULL,NULL,'',''),('',4358,'What effect does high density altitude, as compared to low density altitude, have on propeller efficiency and why?','PLT351',NULL,NULL,NULL,NULL,NULL,'',''),('',4359,'What effect does high density altitude have on aircraft performance?aircraft performance? ','PLT127',NULL,NULL,NULL,NULL,NULL,'','');
/*!40000 ALTER TABLE `test_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `uType` varchar(15) NOT NULL,
  `uName` varchar(50) NOT NULL,
  `uPass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','ethanselin','pass123');
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

-- Dump completed on 2015-03-23 22:22:15
