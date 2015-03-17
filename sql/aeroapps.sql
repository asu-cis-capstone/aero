-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
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
/*!40000 ALTER TABLE `faa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(50) DEFAULT NULL,
  `img` blob,
  PRIMARY KEY (`img_id`)
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
  KEY `qID` (`qID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_answers`
--

LOCK TABLES `test_answers` WRITE;
/*!40000 ALTER TABLE `test_answers` DISABLE KEYS */;
INSERT INTO `test_answers` VALUES ('A','To enable the pilot to make steeper approaches to a landing without increasing the airspeed .','To relieve the pilot of maintaining continuous pressure on the controls.','To decrease wing area to vary the lift.',4000),('C','decrease the angle of descent without increasing the airspeed','permit a touchdown at a higher indicated airspeed.','increase the angle of descent without increasing the airspeed .',4001),('A','To control yaw.','To control overbanking tendency.','To control roll.',4002),('A','lift, weight, thrust, and drag','lift, weight, gravity, and thrust','lift, gravity, power, and friction',4003),('A','During u naccelerated flight.','When the aircraft is accelerating.','When the aircraft is at rest on the ground.',4004);
/*!40000 ALTER TABLE `test_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_questions`
--

DROP TABLE IF EXISTS `test_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_questions` (
  `qID` int(4) NOT NULL,
  `qText` varchar(250) NOT NULL,
  `ls_code` char(6) NOT NULL,
  PRIMARY KEY (`qID`),
  KEY `ls_code` (`ls_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_questions`
--

LOCK TABLES `test_questions` WRITE;
/*!40000 ALTER TABLE `test_questions` DISABLE KEYS */;
INSERT INTO `test_questions` VALUES (4000,'What is one purpose of wing flaps?','PLT473'),(4001,'One of the main functions of flaps during approach and landing is to','PLT473'),(4002,'What is the purpose of the rudder on an airplane?','PLT346'),(4003,'The four forces acting on an airplane in flight are','PLT346'),(4004,'When are the four forces that act on an airplane in equilibrium?','PLT242'),(4013,'How will frost on the wings of an airplane affect takeoff performance?','PLT247'),(4014,'Why is frost considered hazardous to flight?','PLT134'),(4017,'What must a pilot be aware of as a result of ground effect?','PLT128'),(4018,'Ground effect is most likely to result in which problem?','PLT131'),(4019,'What force makes an airplane turn?','PLT131'),(4127,'Which is the correct traffic pattern departure procedure to use at a no controlled airport?','PLT242'),(4128,'The recommended entry position to an airport traffic pattern is','PLT150'),(4129,'An on glide slope indication from a tri-color VASI is','PLT147'),(4130,'An above glide slope indication from a tri-color VASI is','PLT147'),(4131,'A below glide slope indication from a tri-color VASI is a','PLT147'),(4132,'A (Refer to Figure 48.) While on final approach to a runway equipped with a standard 2-bar VASI , the lights appear as shown by illustration D. This means that the aircraft is','PLT147'),(4133,'(Refer to Figure 48.) While on final approach to a runway equipped with a standard 2-bar VASI , the lights appear as shown by illustration D. This means that the aircraft is','PLT147'),(4182,'While on final approach for landing, an alternating green and red light followed by a flashing red light is received from the control tower. Under these circumstances, the pilot should','PLT502'),(4183,'A steady green light signal directed from the control tower to an aircraft in flight is a signal that the pilot','PLT141'),(4184,'A flashing white light signal from the control tower to a taxiing aircraft is an indication to','PLT502'),(4185,'If the control tower uses a light signal to direct a pilot to give way to other aircraft and continue circling, the light will be','PLT502'),(4186,'Which light signal from the control tower clears a pilot to taxi?','PLT502'),(4187,'An alternating red and green light signal directed from the control tower to an aircraft in flight is a signal to','PLT502'),(4188,'If the aircraft\'s radio fails, what is the recommended procedure when landing at a controlled airport?','PLT150'),(4189,'When activated, an emergency locator transmitter(EL T) transmits on','PLT402'),(4190,'Which procedure is recommended to ensure that the emergency locator transmitter(EL T) has not been activated?','PLT402'),(4191,'The letters VHF/DF appearing in the Airport/Facility Directory for a certain airport indicate that','PLT281'),(4192,'To use VHF/DF facilities for assistance in locating an aircraft\'s position, the aircraft must have a','PLT362'),(4230,'Each recreational or private pilot is required to have','PLT442'),(4231,'To act as pilot in command of an aircraft carrying passengers, the pilot must have made at least three takeoffs and three landings in an aircraft of the same category, class, and if a type rating is required, of the same type, within the preceding','PLT411'),(4232,'If recency of experience requirements for night flight are not met and official sunset is 1830, the latest time passengers may be carried is','PLT442'),(4233,'To act as pilot in command of an aircraft carrying passengers, the pilot must have made three takeoffs and three landings within the preceding 90 days in an aircraft of the same','PLT457'),(4271,'When flying in the airspace underlying Class B airspace, the maximum speed authorized is','PLT161'),(4272,'Unless otherwise authorized, the maximum indicated airspeed at which aircraft may be flown when at or below 2,500 feet AGL and within 4 nautical miles of the primary airport of Class C airspace is','PLT393'),(4273,'Except when necessary for takeoff or landing, what is the minimum safe altitude for a pilot to operate an aircraft anywhere?','PLT430'),(4274,'Except when necessary for takeoff or landing, what is the minimum safe altitude required for a pilot to operate an aircraft over congested areas?','PLT430'),(4310,'No person may operate an airplane within Class D airspace at night under special VFR unless the ','PLT467'),(4311,'What are the minimum requirements for airplane operations under special VFR in Class D airspace at night?','PLT161'),(4312,'What is the minimum weather condition required for airplanes operating under special VFR in Class D airspace?','PLT376'),(4313,'Which VFR cruising altitude is acceptable for a flight on a Victor Airway with a magnetic course of 175°? The terrain is less than 1,000 feet.','PLT467'),(4314,'Which cruising altitude is appropriate for a VFR flight on a magnetic course of 135°?','PLT467'),(4315,'Which VFR cruising altitude is appropriate when flying above 3,000 feet AGL on a magnetic course of 185°?','PLT467'),(4318,'When may an emergency locator transmitter(ELT) be tested?','PLT402'),(4319,'When are non-rechargeable batteries of an emergency locator transmitter (ELT) required to be replaced?','PLT402'),(4320,'When must the battery in an emergency locator transmitter(ELT) be replaced(or recharged if the battery is rechargeable)?','PLT402'),(4356,'What effect, if any, does high humidity have on aircraft performance?','PLT124'),(4357,'Which factor would tend to increase the density altitude at a given airport?','PLT206'),(4358,'What effect does high density altitude, as compared to low density altitude, have on propeller efficiency and why?','PLT351'),(4359,'What effect does high density altitude have on aircraft performance?aircraft performance? ','PLT127');
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

-- Dump completed on 2015-03-17 10:28:30
