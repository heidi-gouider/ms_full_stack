-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: record
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist` (
  `artist_id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(255) DEFAULT NULL,
  `artist_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES (1,'Neil Young',NULL),(2,'YES',NULL),(3,'Rolling Stones',NULL),(4,'Queens of the Stone Age',NULL),(5,'Serge Gainsbourg',NULL),(6,'AC/DC',NULL),(7,'Marillion',NULL),(8,'Bob Dylan',NULL),(9,'Fleshtones',NULL),(10,'The Clash',NULL);
/*!40000 ALTER TABLE `artist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disc`
--

DROP TABLE IF EXISTS `disc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disc` (
  `disc_id` int(11) NOT NULL AUTO_INCREMENT,
  `disc_title` varchar(255) DEFAULT NULL,
  `disc_year` int(11) DEFAULT NULL,
  `disc_picture` varchar(255) DEFAULT NULL,
  `disc_label` varchar(255) DEFAULT NULL,
  `disc_genre` varchar(255) DEFAULT NULL,
  `disc_price` decimal(6,2) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`disc_id`),
  KEY `artist_id` (`artist_id`),
  CONSTRAINT `disc_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disc`
--

LOCK TABLES `disc` WRITE;
/*!40000 ALTER TABLE `disc` DISABLE KEYS */;
INSERT INTO `disc` VALUES (1,'Fugazi',1984,'Fugazi.jpeg','EMI','Prog',14.99,7),(2,'Songs for the Deaf',2002,'Songs for the Deaf.jpeg','Interscope Records','Rock/Stoner',12.99,4),(3,'Harvest Moon',1992,'Harvest Moon.jpeg','Reprise Records','Rock',4.20,1),(4,'Initials BB',1968,'Initials BB.jpeg','Philips',' Chanson, Pop Rock',12.99,5),(5,'After the Gold Rush',1970,'After the Gold Rush.jpeg',' Reprise Records','Country Rock',20.00,1),(6,'Broken Arrow',1996,'Broken Arrow.jpeg','Reprise Records',' Country Rock, Classic Rock',15.00,1),(7,'Highway To Hell',1979,'Highway To Hell.jpeg','Atlantic','Hard Rock',15.00,6),(8,'Drama',1980,'Drama.jpeg','Atlantic','Prog',15.00,2),(9,'Year of the Horse',1997,'Year of the Horse.jpeg','Reprise Records','Country Rock, Classic Rock',7.50,1),(10,'Ragged Glory',1990,'Ragged Glory.jpeg','Reprise Records','Country Rock, Grunge',11.00,1),(11,'Rust Never Sleeps',1979,'Rust Never Sleeps.jpeg','Reprise Records','Classic Rock, Arena Rock',15.00,1),(12,'Exile on main street',1972,'Exile on main street.jpeg','Rolling Stones Records','Blues Rock, Classic Rock',33.00,1),(13,'London Calling',1971,'London Calling.jpeg','CBS','Punk, New Wave',33.00,10),(14,'Beggars Banquet',1968,'Beggars Banquet.jpeg','Rolling Stones Records','Blues Rock, Classic Rock',33.00,1),(15,'Laboratory of sound',1995,'Laboratory of sound.jpeg','Rebel Rec.','Rock',33.00,9);
/*!40000 ALTER TABLE `disc` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-07 16:09:33
