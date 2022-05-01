-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: record
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB

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
  `artist_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `artist_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES
(1,'Neil Young',NULL),
(4,'Queens of the Stone Age',NULL),
(11,'Prince',NULL),
(12,'Depeche Mode',NULL),
(14,'The Cure',NULL),
(15,'Sepultura',NULL),
(16,'Pink Floyd',NULL),
(17,'Talking Heads',NULL),
(19,'Brian Eno',NULL),
(21,'Roxy Music',NULL),
(22,'Radiohead',NULL),
(23,'Autechre',NULL),
(24,'Aphex Twin',NULL),
(25,'Cocteau Twins',NULL),
(26,'Pixies',NULL),
(27,'My Bloody Valentine',NULL),
(28,'Boards Of Canada',NULL),
(29,'Steely Dan',NULL);
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
  `disc_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc_year` int(11) DEFAULT NULL,
  `disc_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc_genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disc_price` decimal(6,2) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`disc_id`),
  KEY `artist_id` (`artist_id`),
  CONSTRAINT `disc_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disc`
--

LOCK TABLES `disc` WRITE;
/*!40000 ALTER TABLE `disc` DISABLE KEYS */;
INSERT INTO `disc` VALUES
(2,'Songs For The Deaf',2002,'songs_for_the_deaf-4.jpeg','Interscope Records','Rock/Stoner',12.00,4),
(5,'After The Gold Rush',1970,'after_the_gold_rush-1.jpeg',' Reprise Records','Folk Rock, Country Rock',20.00,1),
(16,'Harvest',1972,'harvest-1.jpeg','Reprise Records','Folk Rock, Country Rock',19.00,1),
(19,'Parade',1986,'parade-11.jpeg','Paisley Park','Funk / Soul',19.00,11),
(20,'Sign \'O\' The Times',1987,'sign_\'o\'_the_times-11.jpeg','Paisley Park','Funk / Soul, Pop Rock',24.00,11),
(21,'Seventeen Seconds',1980,'seventeen_seconds-14.jpeg','Fiction Records','New Wave, Post Rock',9.00,14),
(22,'Faith',1981,'faith-14.jpeg','Fiction Records','New Wave, Post Rock',24.00,14),
(23,'Pornography',1982,'pornography-14.jpeg','Fiction Records','New Wave, Post Rock',19.00,14),
(24,'1999',1982,'1999-11.jpeg','Warner Bros. Records','Funk / Soul, Pop',19.00,11),
(25,'Black Celebration',1986,'black_celebration-12.jpeg','Mute','Synth-Pop',19.00,12),
(26,'Music For The Masses',1987,'music_for_the_masses-12.jpeg','Mute','Synth-Pop',19.00,12),
(27,'Violator',1990,'violator-12.jpeg','Mute','Synth-Pop',19.00,12),
(28,'More',1969,'more-16.jpeg','Columbia','Rock, Blues, Soundtrack',9.00,16),
(29,'Meddle',1971,'meddle-16.jpeg','Harvest','Psychedelic Rock',19.00,16),
(30,'The Dark Side Of The Moon',1973,'the_dark_side_of_the_moon-16.jpeg','Harvest','Prog Rock',19.00,16),
(31,'Wish You Were Here',1975,'wish_you_were_here-16.jpeg','Harvest','Psychedelic Rock, Prog Rock',19.00,16),
(32,'Animals',1977,'animals-16.jpeg','Harvest','Psychedelic Rock, Prog Rock',19.00,16),
(33,'Chaos A.D.',1993,'chaos_a.d.-15.jpeg','Roadrunner Records','Thrash Metal',9.00,15),
(34,'Roots',1996,'roots-15.jpeg','Roadrunner Records','Thrash Metal',9.00,15),
(35,'Roxy Music',1972,'roxy_music-21.jpeg','Island Records','Alt Rock, Experimental, Glam',14.00,21),
(36,'Avalon',1982,'avalon-21.jpeg','Warner Bros. Records','Pop Rock, Synth-Pop',9.00,21),
(37,'Garlands',1982,'garlands-25.jpeg','4AD','Post-Punk, Ethereal',9.00,25),
(38,'Head Over Heels',1983,'head_over_heels-25.jpeg','4AD','Art Rock, Experimental, Ethereal',9.00,25),
(39,'Remain In Light',1980,'remain_in_light-17.jpeg','Sire','New Wave, Art Rock',19.00,17),
(40,'Music For Films',1978,'music_for_films-19.jpeg','Polydor','Electronic, Ambient',9.00,19),
(41,'OK Computer',1997,'ok_computer-22.jpeg','Parlophone','Alternative Rock',9.00,22),
(42,'Amber',1994,'amber-23.jpeg','Warp Records','Abstract, IDM, Ambient',74.00,23),
(43,'LP5',1998,'lp5-23.jpeg','Warp Records','Electronic, IDM',59.00,23),
(44,'EP7',1999,'ep7-23.jpeg','Warp Records','Abstract, IDM',49.00,23),
(45,'Bossanova',1990,'bossanova-26.jpeg','4AD','Indie Rock',19.00,26),
(46,'Loveless',1991,'loveless-27.jpeg','Creation Records','Alternative Rock, Shoegaze, Noise',160.00,27),
(47,'Music Has The Right To Children',1998,'music_has_the_right_to_children-28.jpeg','Warp Records','Electronic, IDM, Ambient, Trip Hop',33.00,28),
(48,'Richard D James Album',1996,'richard_d_james_album-24.jpeg','Warp Records','Electronic, Abstract, IDM, Experimental, Acid',30.00,24),
(49,'Pretzel Logic',1974,'pretzel_logic-29.jpeg','ABC Records','Jazz-Rock, Pop-Rock, Classic Rock',5.00,29),
(50,'Aja',1977,'aja-29.jpeg','ABC Records','Jazz-Rock, Pop-Rock, Classic Rock',15.00,29);
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

-- Dump completed on 2022-05-01 14:24:58
