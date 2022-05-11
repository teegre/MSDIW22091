DROP DATABASE IF EXISTS records;

CREATE DATABASE records;

USE records;

DROP TABLE IF EXISTS `artist`;
CREATE TABLE `artist` (
  `artist_id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`artist_id`)
);

INSERT INTO `artist` VALUES
(1,'Neil Young'),
(4,'Queens Of The Stone Age'),
(11,'Prince'),
(12,'Depeche Mode'),
(14,'The Cure'),
(15,'Sepultura'),
(16,'Pink Floyd'),
(17,'Talking Heads'),
(19,'Brian Eno'),
(21,'Roxy Music'),
(22,'Radiohead'),
(23,'Autechre'),
(24,'Aphex Twin'),
(25,'Cocteau Twins'),
(26,'Pixies'),
(27,'My Bloody Valentine'),
(28,'Boards Of Canada'),
(29,'Steely Dan'),
(30,'The The'),
(31,'Jim O\'Rourke'),
(32,'Kraftwerk');


DROP TABLE IF EXISTS `record`;

CREATE TABLE `record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `record_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_year` int(11) DEFAULT NULL,
  `record_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_price` decimal(6,2) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`record_id`),
  KEY `artist_id` (`artist_id`),
  CONSTRAINT `record_idfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`)
);

INSERT INTO `record` VALUES
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
(49,'Pretzel Logic',1974,'pretzel_logic-29.jpeg','ABC Records','Jazz-Rock, Pop-Rock, Classic Rock',22.00,29),
(50,'Aja',1977,'aja-29.jpeg','ABC Records','Jazz-Rock, Pop-Rock, Classic Rock',15.00,29),
(51,'Gaucho',1980,'gaucho-29.jpeg','MCA Records','Pop Rock, Jazz-Rock',19.00,29),
(52,'Controversy',1981,'controversy-11.jpeg','Warner Bros. Records','Funk / Soul, Synth-Pop',27.00,11),
(53,'Mind Bomb',1989,'mind_bomb-30.jpeg','Epic / Some Bizarre','Alternative Rock',14.00,30),
(54,'Dusk',1993,'dusk-30.jpeg','Epic','Alternative Rock',99.00,30),
(55,'Simple Songs',2015,'simple_songs-31.jpeg','Drag City','Indie Rock, Experimental, Lounge, Art Rock',19.00,31),
(56,'3-D (The Catalogue)',2017,'3-d_(the_catalogue)-32.jpeg','Kling Klang / Parlophone','Electro, Synth-Pop',200.00,32),
(57,'Computer World',1981,'computer_world-32.jpeg','EMI','Electro, Synth-Pop',21.00,32),
(58,'The Man Machine',1978,'the_man_machine-32.jpeg','Capitol Records','Electro, Synth-Pop',22.00,32);

DROP TABLE IF EXISTS `song`;
CREATE TABLE `song` (
  `record_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL AUTO_INCREMENT,
  `song_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`record_id`, `song_id`),
  KEY `record_id` (`record_id`),
  CONSTRAINT `song_idfk_1` FOREIGN KEY (`record_id`) REFERENCES `record` (`record_id`)
) ENGINE=MyISAM;
