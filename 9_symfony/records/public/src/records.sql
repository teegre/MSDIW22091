-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: records
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
  `artist_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES
(1,'Neil Young','1.jpg'),
(4,'Queens Of The Stone Age','4.jpg'),
(11,'Prince','11.jpeg'),
(12,'Depeche Mode','12.jpeg'),
(14,'The Cure','14.jpeg'),
(15,'Sepultura','15.jpeg'),
(16,'Pink Floyd','16.jpeg'),
(17,'Talking Heads','17.jpg'),
(19,'Brian Eno','19.jpg'),
(21,'Roxy Music','21.jpg'),
(22,'Radiohead','22.jpg'),
(23,'Autechre','23.jpeg'),
(24,'Aphex Twin','24.jpeg'),
(25,'Cocteau Twins','25.png'),
(26,'Pixies','26.jpg'),
(27,'My Bloody Valentine','27.jpeg'),
(28,'Boards Of Canada','28.jpeg'),
(29,'Steely Dan','29.jpeg'),
(30,'The The','30.jpeg'),
(31,'Jim O\'Rourke','31.jpg'),
(32,'Kraftwerk','32.jpeg'),
(33,'Tigerfreq','profile-627f7382c0408.jpg'),
(34,'The House Of Love','the house of lovejpg');
/*!40000 ALTER TABLE `artist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `record_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_year` int(11) NOT NULL,
  `record_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_price` double NOT NULL,
  `artist_id` int(11) NOT NULL,
  PRIMARY KEY (`record_id`),
  KEY `IDX_9B349F91B7970CF8` (`artist_id`),
  CONSTRAINT `record_idfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record`
--

LOCK TABLES `record` WRITE;
/*!40000 ALTER TABLE `record` DISABLE KEYS */;
INSERT INTO `record` VALUES
(2,'Songs For The Deaf',2002,'songs_for_the_deaf-4.jpeg','Interscope Records','Rock/Stoner',12,4),
(5,'After The Gold Rush',1970,'after_the_gold_rush-1.jpeg',' Reprise Records','Folk Rock, Country Rock',20,1),
(16,'Harvest',1972,'harvest-1.jpeg','Reprise Records','Folk Rock, Country Rock',19,1),
(19,'Parade',1986,'parade-11.jpeg','Paisley Park','Funk / Soul',19,11),
(20,'Sign \'O\' The Times',1987,'sign_\'o\'_the_times-11.jpeg','Paisley Park','Funk / Soul, Pop Rock',24,11),
(21,'Seventeen Seconds',1980,'seventeen_seconds-14.jpeg','Fiction Records','New Wave, Post Rock',9,14),
(22,'Faith',1981,'faith-14.jpeg','Fiction Records','New Wave, Post Rock',24,14),
(23,'Pornography',1982,'pornography-14.jpeg','Fiction Records','New Wave, Post Rock',19,14),
(24,'1999',1982,'1999-11.jpeg','Warner Bros. Records','Funk / Soul, Pop',19,11),
(25,'Black Celebration',1986,'black_celebration-12.jpeg','Mute','Synth-Pop',19,12),
(26,'Music For The Masses',1987,'music_for_the_masses-12.jpeg','Mute','Synth-Pop',19,12),
(27,'Violator',1990,'violator-12.jpeg','Mute','Synth-Pop',19,12),
(28,'More',1969,'more-16.jpeg','Columbia','Rock, Blues, Soundtrack',9,16),
(29,'Meddle',1971,'meddle-16.jpeg','Harvest','Psychedelic Rock',19,16),
(30,'The Dark Side Of The Moon',1973,'the_dark_side_of_the_moon-16.jpeg','Harvest','Prog Rock',19,16),
(31,'Wish You Were Here',1975,'wish_you_were_here-16.jpeg','Harvest','Psychedelic Rock, Prog Rock',19,16),
(32,'Animals',1977,'animals-16.jpeg','Harvest','Psychedelic Rock, Prog Rock',19,16),
(33,'Chaos A.D.',1993,'chaos_a.d.-15.jpeg','Roadrunner Records','Thrash Metal',9,15),
(34,'Roots',1996,'roots-15.jpeg','Roadrunner Records','Thrash Metal',9,15),
(35,'Roxy Music',1972,'roxy_music-21.jpeg','Island Records','Alt Rock, Experimental, Glam',14,21),
(36,'Avalon',1982,'avalon-21.jpeg','Warner Bros. Records','Pop Rock, Synth-Pop',9,21),
(37,'Garlands',1982,'garlands-25.jpeg','4AD','Post-Punk, Ethereal',9,25),
(38,'Head Over Heels',1983,'head_over_heels-25.jpeg','4AD','Art Rock, Experimental, Ethereal',9,25),
(39,'Remain In Light',1980,'remain_in_light-17.jpeg','Sire','New Wave, Art Rock',19,17),
(40,'Music For Films',1978,'music_for_films-19.jpeg','Polydor','Electronic, Ambient',9,19),
(41,'OK Computer',1997,'ok_computer-22.jpeg','Parlophone','Alternative Rock',9,22),
(42,'Amber',1994,'amber-23.jpeg','Warp Records','Abstract, IDM, Ambient',74,23),
(43,'LP5',1998,'lp5-23.jpeg','Warp Records','Electronic, IDM',59,23),
(44,'EP7',1999,'ep7-23.jpeg','Warp Records','Abstract, IDM',49,23),
(45,'Bossanova',1990,'bossanova-26.jpeg','4AD','Indie Rock',19,26),
(46,'Loveless',1991,'loveless-27.jpeg','Creation Records','Alternative Rock, Shoegaze, Noise',160,27),
(47,'Music Has The Right To Children',1998,'music_has_the_right_to_children-28.jpeg','Warp Records','Electronic, IDM, Ambient, Trip Hop',33,28),
(48,'Richard D James Album',1996,'richard_d_james_album-24.jpeg','Warp Records','Electronic, Abstract, IDM, Experimental, Acid',30,24),
(49,'Pretzel Logic',1974,'pretzel_logic-29.jpeg','ABC Records','Jazz-Rock, Pop-Rock, Classic Rock',22,29),
(50,'Aja',1977,'aja-29.jpeg','ABC Records','Jazz-Rock, Pop-Rock, Classic Rock',15,29),
(51,'Gaucho',1980,'gaucho-29.jpeg','MCA Records','Pop Rock, Jazz-Rock',19,29),
(52,'Controversy',1981,'controversy-11.jpeg','Warner Bros. Records','Funk / Soul, Synth-Pop',27,11),
(53,'Mind Bomb',1989,'mind_bomb-30.jpeg','Epic / Some Bizarre','Alternative Rock',14,30),
(54,'Dusk',1993,'dusk-30.jpeg','Epic','Alternative Rock',99,30),
(55,'Simple Songs',2015,'simple_songs-31.jpeg','Drag City','Indie Rock, Experimental, Lounge, Art Rock',19,31),
(56,'3-D (The Catalogue)',2017,'3-d_(the_catalogue)-32.jpeg','Kling Klang / Parlophone','Electro, Synth-Pop',200,32),
(57,'Computer World',1981,'computer_world-32.jpeg','EMI','Electro, Synth-Pop',21,32),
(58,'The Man Machine',1978,'the_man_machine-32.jpeg','Capitol Records','Electro, Synth-Pop',22,32),
(59,'I Care Because You Do...',1995,'i_care_because_you_do.jpeg','Warp Records','Electronic, IDM, Abstract, Techno, Downtempo',9.99,24),
(60,'Chiastic slide',1997,'R-19628-1533223423-8931-627e1c00b35bc.jpg','Warp Records','Electronic, Abstract, IDM',66.5,23),
(61,'Trans Canada Highway',2006,'R-694551-1301387402-627e1e2aa5d30.jpg','Warp Records','Electronic, IDM, Downtempo, Ambient',34.99,28),
(62,'In A Beautiful Place Out In The Country',2000,'R-11777-1201436908-627e25f093778.jpg','Warp Records','Electronic, IDM, Ambient',25.99,28),
(63,'Can\'t Buy A Thrill',1972,'cover-627f471918670.jpg','Probe','Classic Rock',29.99,29),
(64,'Astres',2018,'cover-627f75997a688.jpg','None','Electronic, Ambient',570.83,33),
(65,'The House Of Love',1990,'the house of lovejpg','Fontana','Rock, Indie Rock',24.99,34);
/*!40000 ALTER TABLE `record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `song`
--

DROP TABLE IF EXISTS `song`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `song` (
  `record_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL AUTO_INCREMENT,
  `song_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`record_id`,`song_id`),
  KEY `record_id` (`record_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `song`
--

LOCK TABLES `song` WRITE;
/*!40000 ALTER TABLE `song` DISABLE KEYS */;
INSERT INTO `song` VALUES
(19,1,'Christopher Tracy\'s Parade'),
(19,2,'New Position'),
(19,3,'I Wonder U'),
(19,4,'Under The Cherry Moon'),
(19,5,'Girls & Boys'),
(19,6,'Life Can Be So Nice'),
(19,7,'Venus De Milo'),
(19,8,'Mountains'),
(19,9,'Do U Lie?'),
(19,10,'Kiss'),
(19,11,'Anotherloverholenyohead'),
(19,12,'Sometimes It Snows In April'),
(55,1,'Friends With Benefits'),
(55,2,'That Weekend'),
(55,3,'Half Life Crisis'),
(55,4,'Hotel Blue'),
(55,5,'These Hands'),
(55,6,'Last Year'),
(55,7,'End Of The Road'),
(55,8,'All Your Love'),
(46,1,'Only Shallow'),
(46,2,'Loomer'),
(46,3,'Touch'),
(46,4,'To Here Knows When'),
(46,5,'When You Sleep'),
(46,6,'I Only Said'),
(46,7,'Come In Alone'),
(46,8,'Sometimes'),
(46,9,'Blown A Wish'),
(46,10,'What You Want'),
(46,11,'Soon'),
(27,1,'World In My Eyes'),
(27,2,'Sweetest Perfection'),
(27,3,'Personal Jesus'),
(27,4,'Halo'),
(27,5,'Waiting For The Night'),
(27,6,'Enjoy The Silene'),
(27,7,'Policy Of Truth'),
(27,8,'Blue Dress'),
(27,9,'Clean'),
(50,4,'Peg'),
(50,3,'Deacon Blues'),
(50,2,'Aja'),
(50,1,'Black Cow'),
(50,5,'Home At Last'),
(50,6,'I Got The News'),
(50,7,'Josie'),
(64,1,'Part I'),
(64,2,'Part II'),
(64,3,'Part III'),
(64,4,'Part IIII'),
(64,5,'Part V'),
(64,6,'Part VI'),
(64,7,'Part VII');
/*!40000 ALTER TABLE `song` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-15 10:08:27
