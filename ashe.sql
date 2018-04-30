-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: login_info
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

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
-- Current Database: `login_info`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `login_info` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `login_info`;

--
-- Table structure for table `codes`
--

DROP TABLE IF EXISTS `codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `codes` (
  `code` varchar(10) DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `uses` int(5) unsigned DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codes`
--

LOCK TABLES `codes` WRITE;
/*!40000 ALTER TABLE `codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tier` varchar(10) DEFAULT NULL,
  `subgroup` varchar(15) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'test','user','Mentor','admin','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c488165f5b7c1c28f90/5a6bed05652dea30bda00afe/1517022531160/Headshot+Template+H.jpg'),(2,'admin','password','Mentor','admin','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c488165f5b7c1c28f90/5a6bed05652dea30bda00afe/1517022531160/Headshot+Template+H.jpg'),(3,'scouting','540','Lead','Strategy','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f82/5a5e4cafec212d675afa474b/1516129491839/Wu%2C+Daniel.jpg'),(4,'Marc','baguette','Second','Programming','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f5a/5a6beaa6c83025f9ba49e16d/1517021930170/Headshot+Template+Marc.jpg'),(5,'Henry','cheesyPoofs','Veteran','Programming','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f5a/5a6bad9571c10bdcc1e2daae/1517006535017/Ge%2C+Henry.jpg'),(6,'Cassidy','autoCode','Veteran','Programming','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f5a/5a6baebd8165f5b04ad5adfc/1517021905610/Coates%2C+Cassidy.jpg'),(7,'Harrison','123456','Veteran','Programming','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f5a/5a6beabd9140b70ed908a9d6/1517021944829/Schultz%2C+Harrison.jpg'),(8,'Shrinidhi','tenticles','Rookie','Programming','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f5a/5a6bea00f9619a15b6af0bad/1517021914625/Headshot+Template+Shrinidi.jpg'),(9,'Zach','gingerBoi123','Rookie','Programming','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f5a/5a6beb0053450a171865a6d3/1517022020908/Weiss%2C+Zachary.jpg'),(10,'ChunFaye','toofast4u','Veteran','Programming','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f5a/5a6beb5d8165f5ccc75e5fcb/1517022083216/Wu%2C+ChunFaye.jpg'),(11,'Ojas','orangeJuice','Lead','Outreach','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28efe/5a6bebbbe4966b35d9c536ad/1517022209542/Headshot+Template+Ojas.jpg'),(12,'Naren','seizeProduction','Lead','Programming','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f5a/5a6bea6624a694fb931db738/1517021899569/Headshot+Template+Naren.jpg'),(13,'Pooja','foodIsGood','Veteran','Strategy','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f82/5a6baf99085229a94b1622f3/1517006791440/Patel%2CPooja.jpg'),(14,'Chamanthi','vanillaIsNice','Veteran','PR','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f70/5a6b9fdbf9619ad6b36936c5/1517003066530/Konidala%2C+Chamanthi.jpg'),(15,'Daniel','muscleCow','Lead','Strategy','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f82/5a5e4cafec212d675afa474b/1516129491839/Wu%2C+Daniel.jpg'),(16,'Amanda','chamooo','Rookie','Strategy','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f82/5a6baf83ec212d551ad0de24/1517006781721/He%2CAmanda+jpg.jpg'),(17,'Amisha','insecure','Veteran','CAD','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f0a/5a6ba52dc83025b44f38623b/1517004281477/Gandhi%2C+Amisha.jpg'),(18,'Jason','yellowRanger','Lead','PR','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f70/5a5e4c0cc830259d460765b0/1516129417129/Lin%2CJason.jpg'),(19,'Brock','htmlCSS','Veteran','Strategy','https://static1.squarespace.com/static/52ff7172e4b09e6f5ea6546b/5a5a4c478165f5b7c1c28f82/5a6bafb70d9297f24bc63543/1517006802824/Wohlnick%2C+Brock.jpg');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `times`
--

DROP TABLE IF EXISTS `times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `times` (
  `user` varchar(999) DEFAULT NULL,
  `inTime` datetime DEFAULT NULL,
  `outTime` datetime DEFAULT NULL,
  `diffTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `times`
--

LOCK TABLES `times` WRITE;
/*!40000 ALTER TABLE `times` DISABLE KEYS */;
INSERT INTO `times` VALUES ('admin','2018-03-01 12:40:08','2018-03-01 12:40:19','00:00:11'),('admin','2018-03-01 12:40:32','2018-03-01 12:40:43','00:00:11'),('admin','2018-03-01 12:41:01','2018-03-01 12:41:05','00:00:04'),('admin','2018-03-01 12:41:18','2018-03-05 11:56:48','95:15:30');
/*!40000 ALTER TABLE `times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `scouting_data`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `scouting_data` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `scouting_data`;

--
-- Table structure for table `avg_data`
--

DROP TABLE IF EXISTS `avg_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avg_data` (
  `team_num` int(4) unsigned NOT NULL,
  `autoline` varchar(10) DEFAULT NULL,
  `auto_scale` int(2) NOT NULL,
  `auto_switch` int(2) NOT NULL,
  `cubes_drobbed` int(2) unsigned DEFAULT NULL,
  `team_switch` int(2) unsigned DEFAULT NULL,
  `enemy_switch` int(2) unsigned DEFAULT NULL,
  `scale` int(2) unsigned DEFAULT NULL,
  `vault` int(2) unsigned DEFAULT NULL,
  `defense` varchar(5) DEFAULT NULL,
  `climbing` varchar(10) DEFAULT NULL,
  `support` int(1) unsigned DEFAULT NULL,
  `compScore` int(3) DEFAULT NULL,
  PRIMARY KEY (`team_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avg_data`
--

LOCK TABLES `avg_data` WRITE;
/*!40000 ALTER TABLE `avg_data` DISABLE KEYS */;
INSERT INTO `avg_data` VALUES (346,'Crossed',0,1,2,0,1,3,0,'No','Climbed',0,54),(384,'Crossed',0,0,0,1,1,4,0,'No','None',0,31),(401,'Crossed',0,1,1,0,0,2,3,'No','None',0,18),(539,'Crossed',0,0,1,1,0,0,1,'No','None',0,2),(540,'Crossed',0,0,0,1,0,0,5,'No','None',0,14),(619,'Crossed',0,0,1,0,0,2,1,'No','None',0,14),(977,'Crossed',0,0,1,0,0,2,1,'No','None',0,14),(1080,'Crossed',0,0,1,1,0,3,1,'No','None',0,25),(1086,'Crossed',0,1,1,0,0,2,1,'No','None',0,24),(1123,'Crossed',0,0,0,1,0,0,1,'No','None',0,8),(1262,'Crossed',0,1,1,1,0,3,0,'No','Climbed',0,45),(1413,'Crossed',0,0,1,1,0,2,5,'No','None',0,34),(1598,'Crossed',0,0,1,0,0,0,0,'No','None',0,0),(1599,'Crossed',0,1,1,0,1,2,0,'No','Climbed',0,39),(2106,'Crossed',0,0,1,1,0,2,2,'No','Climbed',0,35),(2534,'Crossed',0,1,1,0,1,3,0,'No','Climbed',0,46),(2890,'Crossed',0,1,1,1,0,1,1,'No','None',0,21),(3136,'Crossed',0,1,1,0,2,1,1,'No','Climbed',0,42),(3258,'Crossed',0,0,1,1,0,3,0,'No','Climbed',0,35),(3274,'Crossed',0,0,1,1,0,2,2,'No','None',0,20),(3359,'Crossed',0,0,1,1,1,1,3,'No','None',0,30),(3361,'Crossed',0,0,1,1,0,0,1,'No','None',0,2),(3455,'Crossed',0,0,0,0,0,2,3,'No','None',0,21),(3939,'Crossed',0,0,1,0,0,2,0,'No','None',0,9),(4466,'Crossed',0,0,1,1,0,0,5,'No','None',0,8),(4505,'Crossed',0,0,0,1,0,1,5,'No','None',0,20),(5274,'Crossed',0,0,2,0,0,2,0,'No','Tried',0,11),(5279,'Crossed',0,0,1,0,0,1,1,'No','Climbed',0,20),(5724,'Crossed',0,0,1,0,0,1,3,'No','None',0,9),(6194,'Crossed',0,0,0,0,0,0,5,'No','None',0,11),(6543,'Crossed',0,0,0,0,0,0,3,'No','None',0,9),(6802,'Crossed',0,0,2,0,0,3,0,'No','None',0,24);
/*!40000 ALTER TABLE `avg_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `raw_data`
--

DROP TABLE IF EXISTS `raw_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `raw_data` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `qual_num` int(3) DEFAULT NULL,
  `team_num` int(4) unsigned DEFAULT NULL,
  `autoline` varchar(10) DEFAULT NULL,
  `auto_scale` int(3) DEFAULT NULL,
  `auto_switch` int(3) DEFAULT NULL,
  `cubes_drobbed` int(2) unsigned DEFAULT NULL,
  `team_switch` int(2) unsigned DEFAULT NULL,
  `enemy_switch` int(2) unsigned DEFAULT NULL,
  `scale` int(2) unsigned DEFAULT NULL,
  `vault` int(2) unsigned DEFAULT NULL,
  `defense` varchar(5) DEFAULT NULL,
  `climbing` varchar(10) DEFAULT NULL,
  `support` int(1) unsigned DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=339 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raw_data`
--

LOCK TABLES `raw_data` WRITE;
/*!40000 ALTER TABLE `raw_data` DISABLE KEYS */;
INSERT INTO `raw_data` VALUES (1,1,3274,'Crossed',0,0,1,0,0,3,0,'No','None',0,''),(2,1,3361,'Crossed',0,0,0,0,0,0,0,'No','None',0,'Moved very slowly'),(3,1,2106,'Crossed',0,0,0,2,0,0,0,'No','None',0,''),(4,1,619,'Crossed',0,1,0,0,0,4,0,'No','None',0,''),(5,1,5724,'Crossed',0,0,0,0,0,0,7,'No','Tried',0,'Played vault the whole time'),(6,1,1086,'Crossed',0,0,0,0,2,1,0,'No','Tried',0,''),(7,2,384,'Crossed',0,1,0,0,0,4,0,'No','None',0,'Very good at getting high points on the scale'),(8,2,3455,'Crossed',0,0,0,0,0,0,7,'No','None',0,'Not particularly incredible performance'),(9,2,540,'Crossed',0,0,0,0,1,0,9,'No','None',0,'Fast, filled vault then did switch.'),(10,2,5279,'Crossed',0,0,2,0,0,1,0,'No','Tried',0,'Spend much of the match not moving'),(11,2,1599,'Crossed',0,1,1,0,0,4,0,'No','None',0,''),(12,2,3939,'Crossed',0,1,0,0,0,2,1,'No','Climbed',0,'Had trouble picking up cubes but knew what to do'),(13,3,1413,'Crossed',0,0,4,0,0,2,0,'No','None',0,''),(14,3,2534,'Crossed',0,0,3,0,0,3,0,'No','Climbed',0,''),(15,3,1080,'Crossed',0,0,0,1,0,4,0,'No','None',0,'Generally good and played strategically '),(16,3,3359,'Crossed',0,1,0,1,0,0,6,'Yes','None',0,'The back shooting and the front collecting waa great'),(17,3,539,'Crossed',0,0,2,0,1,0,0,'No','None',0,''),(18,3,6194,'Crossed',0,0,0,2,0,0,2,'No','None',0,'Placed a cube in opponent side of alliance switch.'),(19,4,3258,'Crossed',0,0,1,0,0,3,0,'No','None',0,''),(20,4,977,'Crossed',0,0,2,0,0,1,0,'No','None',0,''),(21,4,4505,'Crossed',0,0,0,0,0,3,0,'No','None',0,'Slow movement; slow elevator but consistent; caused a robot to fall in endgame'),(22,4,2890,'Crossed',0,1,0,1,0,0,4,'No','None',0,''),(23,4,4466,'Crossed',0,0,3,0,0,0,6,'No','None',0,'After the first cube it did well getting them into the vault'),(24,4,346,'Crossed',0,1,2,0,2,2,0,'No','Climbed',0,'Played strategically and used opponents switch'),(25,5,401,'Crossed',0,1,2,0,0,2,3,'No','Tried',0,''),(26,5,6543,'Crossed',0,0,0,0,0,0,3,'No','None',0,'Intake is very poor'),(27,5,1598,'Failed',0,0,3,0,0,0,0,'No','None',0,'Just kind of meandered around the field and kept dropping the cubes. Good job getting to the pad at the end though'),(28,4,1123,'Crossed',0,0,1,0,0,0,0,'Yes','None',0,''),(29,5,1262,'Crossed',0,1,0,0,0,4,0,'No','None',0,'Out played defense '),(30,4,6802,'Crossed',0,0,3,0,0,3,0,'No','None',0,''),(31,6,3136,'Crossed',0,1,0,0,1,0,3,'No','Climbed',0,''),(32,6,4505,'Crossed',0,0,0,0,0,0,0,'No','None',0,''),(33,6,1599,'Crossed',0,0,2,0,1,2,0,'No','Climbed',0,'Got side climb'),(34,6,1080,'Crossed',0,0,0,1,0,2,0,'No','None',0,'Had trouble picking up cubes but knew what to do'),(35,6,3939,'Crossed',0,1,0,0,0,2,4,'No','Tried',0,''),(36,6,346,'Crossed',0,1,3,0,0,4,0,'No','None',0,''),(37,7,3455,'Crossed',0,0,1,0,0,2,0,'No','None',0,'Got stuck and promptly fell on Judges board with a minute remaining'),(38,7,3361,'Crossed',0,0,1,1,0,0,3,'No','None',0,''),(39,7,977,'Crossed',0,0,1,0,0,3,0,'No','None',0,'Fouled a little bit with holding the scale up '),(40,7,6802,'Crossed',0,1,1,0,0,5,0,'No','Climbed',0,''),(41,7,6194,'Failed',0,0,0,0,0,0,7,'No','None',0,'Played strategically and used vault effectively '),(42,7,6543,'Crossed',0,0,1,0,0,0,2,'No','None',0,''),(43,8,3274,'Crossed',0,0,0,1,0,1,5,'Yes','None',0,'Very good all around robot'),(44,8,539,'Crossed',0,0,1,1,0,0,0,'No','None',0,'Generally poor and slow'),(45,8,3136,'Crossed',0,0,1,1,1,0,0,'No','Climbed',0,'Spent 30 seconds attempting to Intake a cube, and eventually gave up '),(46,8,401,'Crossed',1,0,1,0,0,1,0,'No','None',0,''),(47,8,384,'Crossed',0,1,1,0,0,5,0,'No','None',0,'Disconnected midmatch and then reconected and scored alot more'),(48,8,3258,'Crossed',0,1,2,0,0,2,1,'No','Tried',0,''),(49,9,1598,'Crossed',0,0,1,0,0,0,0,'Yes','None',0,'Failed to score switch, cannot pick up from ground'),(50,9,2890,'Crossed',0,1,0,0,0,0,6,'Yes','None',0,'Good at vault'),(51,9,2106,'Crossed',0,1,0,1,1,2,0,'Yes','Climbed',0,'Overall solid performance'),(52,9,1413,'Crossed',0,0,0,3,0,4,6,'No','None',0,''),(53,9,540,'Crossed',0,0,2,0,1,0,0,'Yes','None',0,'Had trouble picking up cubes but knew what to do'),(54,10,5279,'Crossed',0,0,1,0,0,1,0,'No','Climbed',0,'Good climb'),(55,10,5724,'Crossed',0,0,1,0,0,0,9,'No','None',0,'Played strategically and used vault effectively '),(56,10,619,'Crossed',0,0,2,0,0,0,0,'No','None',0,'Not a very potent scorer'),(57,10,1086,'Crossed',0,0,1,1,0,5,0,'No','None',0,'Fairly steady performance'),(58,10,4466,'Crossed',0,0,3,0,0,0,6,'No','None',0,''),(59,10,1262,'Crossed',0,1,0,0,0,3,0,'No','Tried',0,''),(60,11,346,'Crossed',0,0,2,0,1,1,0,'No','Climbed',0,'The shooting mechanism is cool'),(61,11,2534,'Crossed',0,0,0,0,0,0,0,'No','None',0,'Lost comms in front of the vault'),(62,11,3359,'Crossed',0,0,0,1,0,0,6,'No','None',0,''),(63,11,6802,'Crossed',0,0,3,0,0,1,0,'No','Climbed',0,''),(64,11,1599,'Crossed',0,1,3,1,0,1,0,'No','Climbed',0,'Dropped alot of cubes, but played strategically '),(65,11,384,'Crossed',0,1,0,1,0,5,0,'No','None',0,''),(66,12,2890,'Crossed',0,1,1,0,0,1,0,'No','None',0,''),(67,12,5279,'Crossed',0,0,0,0,0,0,6,'No','Climbed',0,''),(68,12,3455,'Crossed',0,1,2,0,1,1,0,'No','None',0,''),(69,12,1123,'Crossed',0,0,0,0,0,0,0,'No','None',0,'Very poor, did near nothing'),(70,12,619,'Crossed',0,0,1,1,0,5,1,'No','None',0,''),(71,12,3136,'Failed',0,0,2,0,1,2,0,'No','Climbed',0,'Had trouble picking up cubes but knew what to do'),(72,13,6543,'Crossed',0,0,0,0,0,0,3,'No','None',0,''),(73,13,4466,'Crossed',0,0,2,1,2,0,0,'Yes','None',0,'Some trouble intaking'),(74,13,6194,'Crossed',0,0,0,0,0,0,1,'No','None',0,''),(75,13,1413,'Crossed',0,0,1,0,0,3,4,'No','None',0,'Generally good and played strategically '),(76,13,3939,'Crossed',0,1,1,2,0,0,0,'No','None',0,'Struggled to intake cubes'),(77,13,4505,'Crossed',0,0,3,0,0,1,0,'No','None',0,''),(78,14,401,'Crossed',0,1,0,0,0,3,5,'No','None',0,''),(79,14,2106,'Crossed',0,1,0,0,2,2,0,'Yes','Climbed',0,'Solid performance'),(80,14,1262,'Crossed',0,1,2,0,0,4,0,'No','Climbed',0,'Not the best scale positioning; struggled to get 4th cube onto scale'),(81,14,3359,'Crossed',0,0,1,2,0,0,6,'No','None',0,''),(82,14,977,'Crossed',0,0,0,0,0,0,5,'No','None',0,'Played strategically and used vault effectively '),(83,14,540,'Crossed',0,0,1,2,0,0,6,'No','None',0,''),(84,15,1080,'Crossed',0,0,1,2,0,3,1,'Yes','None',0,''),(85,15,5724,'Crossed',0,0,0,1,0,1,5,'No','Climbed',0,''),(86,15,3258,'Crossed',0,0,3,0,0,4,0,'No','Climbed',0,'Good scale placement, left room for 4th cube'),(87,15,1086,'Crossed',0,1,3,0,0,0,3,'No','None',0,''),(88,15,539,'Crossed',0,0,0,0,0,0,0,'Yes','None',0,'Intake broke early'),(89,15,2534,'Crossed',0,0,0,1,3,0,0,'No','None',0,''),(90,16,3361,'Crossed',0,0,0,0,0,0,0,'No','None',0,'Disabled for loss of bumper'),(91,16,346,'Crossed',0,1,1,0,2,3,1,'No','None',0,'Good at offense'),(92,16,2106,'Crossed',0,1,0,1,0,2,0,'No','Climbed',0,''),(93,16,1598,'Crossed',0,0,0,0,0,0,0,'No','None',0,''),(94,16,619,'Crossed',0,0,0,1,0,2,1,'No','None',0,'They struggle to drive effectively and score quickly: they cannot intake cubes quickly and they do not score very often'),(95,16,3274,'Crossed',0,0,2,0,2,1,0,'No','None',0,''),(96,17,1413,'Crossed',0,0,0,0,0,1,0,'No','None',0,''),(97,17,1123,'Crossed',0,0,0,0,0,0,0,'No','None',0,''),(98,17,3136,'Crossed',0,1,0,0,0,2,0,'No','None',0,''),(99,17,401,'Crossed',0,1,1,0,0,4,0,'No','Tried',0,'Very good scale placement'),(100,17,4466,'Crossed',0,0,0,0,0,0,6,'No','None',0,''),(101,17,5724,'Crossed',0,1,0,0,0,2,0,'No','Tried',0,'Was continuously trying to dodge defense'),(102,18,1598,'Crossed',0,0,2,0,0,0,0,'Yes','None',0,'Doesnâ€™t have an intake'),(103,18,3258,'Failed',0,0,0,2,0,5,0,'No','Climbed',0,''),(104,18,540,'Crossed',0,0,0,0,2,0,5,'No','Tried',0,'Good for a bad alliance'),(105,18,3274,'Crossed',0,0,0,4,0,0,6,'No','Climbed',0,''),(106,18,3939,'Crossed',0,1,1,0,0,3,0,'No','Tried',0,'Generally good and played strategically '),(107,18,6543,'Crossed',0,0,0,0,0,0,1,'No','None',0,''),(108,19,6802,'Crossed',0,0,1,1,1,0,0,'Yes','Climbed',0,''),(109,19,1262,'Crossed',1,0,0,0,0,2,0,'No','None',0,''),(110,19,6194,'Crossed',0,0,0,0,0,0,3,'No','None',0,'Poor performance overall'),(111,19,3455,'Crossed',0,0,0,0,0,2,9,'No','Climbed',0,''),(112,19,2890,'Crossed',0,1,2,4,0,0,0,'No','None',0,''),(113,19,1080,'Crossed',1,0,0,0,0,1,4,'Yes','None',0,'Played strategically and used vault effectively '),(114,20,1086,'Crossed',0,1,2,1,2,0,0,'Yes','None',0,''),(115,20,4505,'Crossed',0,1,0,0,3,0,0,'No','None',0,''),(116,20,384,'Crossed',0,0,0,0,0,1,3,'No','None',0,'Stalled partway'),(117,20,1599,'Crossed',0,1,0,0,0,1,0,'No','Climbed',0,'Intake broke early'),(118,20,3359,'Crossed',0,0,3,0,0,2,0,'No','None',0,'Struggled with getting their launcher to shoot high enough'),(119,20,3361,'Crossed',0,0,1,3,0,0,1,'No','None',0,''),(120,21,539,'Crossed',0,0,0,1,0,0,1,'Yes','None',0,''),(121,21,3274,'Crossed',0,0,0,3,0,0,7,'No','None',0,''),(122,21,977,'Crossed',0,1,2,0,1,1,0,'No','None',0,''),(123,21,1598,'Crossed',0,0,0,0,2,0,0,'No','None',0,'Portal only, generally poor'),(124,21,5279,'Crossed',0,0,1,1,2,1,1,'No','Climbed',0,''),(125,21,2534,'Crossed',0,1,0,0,0,5,0,'No','Climbed',0,'Generally good and played strategically also fell when trying to climb '),(126,22,619,'Crossed',0,0,3,1,0,2,0,'No','None',0,''),(127,22,4505,'Crossed',0,0,1,2,0,0,7,'Yes','None',0,''),(128,22,3258,'Crossed',0,0,1,0,0,3,0,'No','None',0,''),(129,22,2106,'Crossed',0,0,2,1,0,2,0,'No','Climbed',0,'Generally good and played strategically '),(130,22,1599,'Failed',0,0,0,1,1,2,0,'No','None',0,''),(131,22,401,'Crossed',0,0,0,0,0,2,5,'No','None',0,''),(132,23,6194,'Crossed',0,0,0,0,0,0,5,'No','None',0,''),(133,23,1262,'Crossed',0,1,1,0,0,3,0,'No','Climbed',0,''),(134,23,1080,'Crossed',0,0,3,1,0,2,0,'No','None',0,''),(135,23,6543,'Crossed',0,0,0,0,0,0,4,'No','None',0,''),(136,23,3939,'Crossed',0,0,1,0,0,2,0,'No','None',0,''),(137,23,5724,'Crossed',1,0,1,1,0,1,4,'No','None',0,'Generally good and played strategically '),(138,24,540,'Crossed',0,0,1,1,0,0,7,'No','None',0,''),(139,24,2890,'Crossed',0,1,0,0,0,1,0,'No','Climbed',0,''),(140,24,6802,'Crossed',0,1,1,0,0,4,0,'No','Tried',0,'Generally good and played strategically '),(141,24,1086,'Crossed',0,0,0,0,0,2,0,'No','Climbed',0,''),(142,24,3455,'Crossed',0,0,1,0,0,3,0,'No','None',0,''),(143,24,539,'Crossed',0,1,2,2,0,0,0,'No','None',0,''),(144,25,3359,'Crossed',0,0,1,0,2,0,0,'Yes','None',0,'Stopped moving ~2 minutes in'),(145,25,4466,'Failed',0,0,2,0,0,0,4,'Yes','Tried',0,''),(146,25,3361,'Crossed',0,0,1,2,0,0,0,'No','None',0,''),(147,25,384,'Crossed',0,1,0,0,3,2,0,'No','None',0,''),(148,25,1123,'Crossed',0,0,0,1,0,0,2,'No','None',0,'Had trouble picking up cubes but knew what to do'),(149,25,977,'Crossed',0,0,0,0,0,1,4,'No','None',0,''),(150,26,1262,'Crossed',0,0,2,1,0,3,0,'No','Climbed',0,''),(151,26,5279,'Crossed',0,0,0,0,0,0,3,'No','None',0,''),(152,26,346,'Crossed',1,0,1,0,2,3,0,'Yes','Tried',0,'Tried for 2 cube scale auto, dropped first cube'),(153,26,2534,'Crossed',0,0,2,2,1,1,0,'No','None',0,''),(154,26,1413,'Crossed',0,0,1,1,0,0,9,'No','None',0,''),(155,26,3136,'Crossed',0,0,0,1,1,0,1,'No','None',0,'Generally good and played strategically '),(156,27,2106,'Crossed',0,0,1,3,0,0,2,'Yes','Climbed',0,''),(157,27,384,'Crossed',0,0,0,2,3,2,0,'Yes','None',0,'Poor strategy, disregarded scale for too long'),(158,27,4466,'Crossed',0,0,0,0,3,0,0,'No','None',0,''),(159,27,6802,'Crossed',0,0,0,3,0,2,0,'No','None',0,'Generally good and played strategically '),(160,27,619,'Crossed',0,0,0,0,0,2,0,'No','None',0,'Stalled partway'),(161,27,540,'Crossed',0,0,0,0,0,0,4,'No','Climbed',0,''),(162,28,539,'Crossed',0,0,2,1,0,0,1,'Yes','None',0,''),(163,28,977,'Crossed',0,0,0,0,0,3,0,'No','Tried',0,''),(164,28,6194,'Crossed',0,0,0,0,0,0,6,'No','None',0,''),(165,28,3359,'Crossed',0,0,0,2,3,0,0,'No','None',0,''),(166,28,1599,'Crossed',0,0,1,0,0,4,0,'No','None',0,''),(167,29,3258,'Crossed',0,0,3,0,0,3,0,'No','Climbed',0,''),(168,29,3939,'Crossed',0,0,1,0,0,4,0,'No','Climbed',0,''),(169,29,3361,'Crossed',0,0,0,0,0,1,0,'No','None',0,''),(170,29,5724,'Crossed',0,1,1,0,0,1,2,'No','None',0,''),(171,29,1413,'Crossed',0,1,0,1,0,0,9,'No','None',0,'Played strategically and used vault effectively '),(172,30,401,'Crossed',0,1,0,0,0,0,9,'No','None',0,''),(173,30,346,'Crossed',1,0,3,0,0,4,0,'No','Climbed',0,''),(174,30,3455,'Crossed',0,0,0,1,0,2,3,'No','None',0,''),(175,30,3136,'Crossed',0,0,2,2,0,3,0,'No','Climbed',0,''),(176,30,1598,'Crossed',0,0,1,0,1,0,0,'No','None',0,'No ground pick up and slow'),(177,31,1080,'Crossed',0,1,0,1,0,2,1,'No','None',0,''),(178,31,4505,'Crossed',0,0,0,0,0,0,9,'Yes','None',0,'Stellar performance'),(179,31,3274,'Crossed',0,0,1,0,1,6,0,'Yes','None',0,''),(180,31,1086,'Crossed',0,1,0,0,0,2,0,'No','None',0,'Generally good and played strategically '),(181,31,5279,'Crossed',0,0,1,0,0,2,2,'No','Climbed',0,''),(182,31,1123,'Crossed',0,0,0,3,0,0,1,'No','None',0,''),(183,32,540,'Failed',0,0,0,5,0,0,6,'Yes','Tried',0,'Did well with baiting the human player'),(184,32,6802,'Crossed',0,0,2,0,0,3,2,'No','None',0,''),(185,32,3939,'Crossed',0,0,0,0,0,2,0,'No','None',0,''),(186,32,1413,'Crossed',0,0,0,0,0,0,7,'No','None',0,''),(187,32,619,'Crossed',0,0,2,0,0,2,0,'No','None',0,'Bad at driving their robot'),(188,32,1599,'Crossed',0,0,1,0,2,1,0,'No','Climbed',0,''),(189,33,1123,'Failed',0,0,1,0,0,0,1,'No','None',0,''),(190,33,1598,'Crossed',0,0,2,0,0,0,0,'No','None',0,'Scored on themselves in auto. Lost their bumper.'),(191,33,1262,'Crossed',0,1,0,0,1,1,0,'No','Climbed',0,''),(192,33,3258,'Crossed',0,0,1,3,0,1,0,'No','Climbed',0,'Generally good and played strategically '),(193,33,4505,'Crossed',0,0,0,0,0,0,8,'No','None',0,''),(194,33,1086,'Crossed',0,1,1,0,1,1,4,'No','None',0,''),(195,34,346,'Crossed',0,0,1,0,3,3,0,'No','Climbed',0,''),(196,34,384,'Crossed',0,0,1,1,3,4,0,'Yes','None',0,'Well driven and high scoring'),(197,34,3455,'Crossed',0,1,0,1,0,4,3,'Yes','None',0,''),(198,34,2106,'Crossed',0,1,0,1,0,3,5,'No','None',0,''),(199,34,6194,'Crossed',0,0,0,0,0,0,5,'No','None',0,''),(200,34,539,'Crossed',0,0,0,0,0,0,4,'No','None',0,'Intake broke midmatch '),(201,35,3359,'Crossed',1,0,0,0,0,0,7,'No','None',0,''),(202,35,4466,'Crossed',0,0,0,0,0,0,6,'No','None',0,''),(203,35,3274,'Crossed',0,0,1,0,0,3,0,'No','None',0,'Generally good and played strategically '),(204,35,1080,'Crossed',1,0,1,0,0,3,0,'No','None',0,''),(205,35,5279,'Crossed',0,0,1,2,0,1,0,'No','Climbed',0,''),(206,35,401,'Crossed',0,1,1,0,0,3,0,'No','Climbed',0,''),(207,36,2534,'Crossed',0,1,2,0,2,2,0,'Yes','Climbed',0,''),(208,36,977,'Crossed',0,1,1,0,0,2,0,'No','None',0,''),(209,36,6543,'Crossed',0,0,0,0,0,0,8,'No','None',0,''),(210,36,2890,'Crossed',0,1,0,1,0,2,0,'No','Climbed',0,''),(211,36,3361,'Crossed',0,0,1,1,0,2,0,'No','None',0,''),(212,36,5724,'Crossed',0,0,0,0,0,0,6,'No','None',0,'Disconnected midmatch and then reconected and placed in vault'),(213,38,6194,'Crossed',0,0,0,0,0,0,5,'No','None',0,''),(214,37,1123,'Crossed',0,0,1,0,0,0,1,'No','None',0,''),(215,37,6802,'Crossed',0,1,2,0,0,3,0,'No','None',0,''),(216,37,3136,'Crossed',0,1,2,0,4,0,0,'No','None',0,''),(217,37,3359,'Failed',0,0,1,1,0,4,0,'No','None',0,''),(218,37,3258,'Crossed',0,0,2,3,0,1,0,'No','Climbed',0,'Generally good and played strategically '),(219,38,1599,'Crossed',0,0,1,0,0,4,0,'No','Climbed',0,'Pushed a cube off the scale but got it back on'),(220,38,1413,'Crossed',0,0,1,3,0,0,6,'No','None',0,''),(221,38,2534,'Crossed',0,0,1,0,2,4,0,'No','Climbed',0,'Generally good and played strategically '),(222,38,2890,'Crossed',0,0,0,0,0,0,3,'No','None',0,''),(223,38,401,'Crossed',0,1,0,1,1,4,0,'No','None',0,''),(224,38,1080,'Crossed',0,0,0,0,0,5,0,'No','None',0,''),(225,39,6543,'Crossed',0,0,0,0,0,0,0,'No','None',0,''),(226,39,5724,'Crossed',0,1,1,0,0,0,1,'Yes','Tried',0,''),(227,39,1598,'Crossed',0,0,1,0,0,0,0,'No','None',0,''),(228,39,3455,'Crossed',0,0,1,0,0,5,0,'No','None',0,'Generally good and played strategically '),(229,39,540,'Failed',0,0,1,0,0,0,5,'No','Climbed',0,''),(230,39,346,'Crossed',0,1,1,0,1,4,0,'No','None',0,''),(231,40,3136,'Crossed',0,1,1,0,3,0,0,'Yes','Climbed',0,''),(232,40,4466,'Crossed',0,0,0,0,0,0,7,'No','None',0,''),(233,40,619,'Crossed',0,0,0,1,0,5,0,'No','None',0,'Generally good and played strategically '),(234,40,977,'Crossed',0,0,0,0,0,2,0,'No','None',0,''),(235,40,1086,'Crossed',0,1,0,1,0,0,4,'No','Tried',0,''),(236,40,3939,'Crossed',0,0,0,0,1,2,0,'No','None',0,''),(237,41,4505,'Failed',0,0,0,1,0,0,2,'No','None',0,'Battery fell out mid match'),(238,41,3274,'Crossed',0,0,1,1,0,5,0,'No','None',0,''),(239,41,1262,'Crossed',0,1,1,8,3,2,0,'No','Climbed',0,'Generally good and played strategically '),(240,41,539,'Crossed',0,0,1,1,0,0,0,'No','None',0,''),(241,41,384,'Crossed',0,0,1,0,0,5,0,'No','None',0,''),(242,41,3361,'Crossed',0,0,1,1,0,2,0,'No','None',0,''),(243,42,1123,'Crossed',0,0,0,1,0,0,2,'Yes','None',0,''),(244,42,2534,'Crossed',0,1,3,0,0,4,0,'No','Tried',0,''),(245,42,1599,'Crossed',0,1,0,0,1,2,0,'No','Climbed',0,'Double climbed'),(246,42,2106,'Crossed',0,0,0,1,0,4,8,'No','Climbed',0,'Generally good and played strategically '),(247,42,5279,'Crossed',0,0,1,0,3,0,0,'No','None',0,''),(248,41,6194,'Crossed',0,0,0,1,0,0,6,'No','None',0,''),(249,43,1080,'Crossed',0,0,0,0,1,4,0,'Yes','None',0,''),(250,43,4505,'Crossed',0,0,0,1,0,0,9,'No','None',0,'Played strategically and used vault effectively '),(251,43,4466,'Crossed',0,0,0,0,0,0,5,'No','None',0,''),(252,43,1598,'Crossed',0,0,1,0,0,0,0,'No','None',0,''),(253,43,540,'Crossed',0,0,0,0,1,0,1,'Yes','Climbed',0,''),(254,43,3455,'Failed',0,1,0,0,0,3,0,'No','None',0,''),(255,44,384,'Failed',0,0,1,2,0,4,1,'No','None',0,''),(256,44,5279,'Crossed',0,0,0,0,0,3,0,'No','Climbed',0,'Slow lift but good play'),(257,44,3361,'Crossed',0,0,0,1,0,0,3,'No','None',0,''),(258,44,6802,'Crossed',0,1,1,0,0,2,0,'No','Tried',0,''),(259,45,1413,'Crossed',0,0,0,1,0,0,9,'No','None',0,'Got all 9 in vault at 60 seconds left'),(260,45,1086,'Crossed',0,1,1,0,0,1,0,'No','None',0,''),(261,45,2890,'Crossed',0,1,3,0,0,1,0,'No','Climbed',0,'Had trouble picking up cubes but knew what to do'),(262,45,3274,'Crossed',0,0,0,0,0,4,0,'No','None',0,''),(263,45,6543,'Crossed',0,0,0,0,0,0,3,'No','None',0,''),(264,45,2106,'Crossed',0,0,2,0,0,2,0,'No','None',0,''),(265,46,619,'Crossed',0,0,0,1,0,2,0,'No','None',0,'Seems to have stopped working, but it didnâ€™t lose connection'),(266,46,5724,'Crossed',1,0,0,0,0,1,1,'No','Climbed',0,''),(267,46,539,'Crossed',0,0,0,0,0,0,3,'No','None',0,''),(268,46,3939,'Crossed',0,1,0,0,0,2,0,'No','None',0,''),(269,46,3359,'Crossed',0,0,0,1,0,0,4,'No','None',0,'Played strategically and used vault effectively '),(270,46,1262,'Crossed',0,1,0,0,0,4,0,'No','None',0,''),(271,47,346,'Crossed',0,1,1,0,0,4,0,'No','Climbed',0,'Focused on scale, faced defense in the beginning'),(272,47,401,'Failed',0,0,0,0,0,0,9,'No','None',0,'Rlly good w vaults'),(273,47,5279,'Crossed',0,0,1,1,0,2,0,'No','None',0,'Fell near end but played well'),(274,47,977,'Crossed',0,0,0,0,0,1,4,'No','None',0,'Had trouble with intake, and slow bot'),(275,47,6543,'Crossed',0,0,0,0,0,0,0,'No','None',0,'Was trying to get a cube but failed. Weak intake'),(276,47,3258,'Crossed',0,0,1,4,0,0,0,'No','Climbed',0,'Jerky, reliable climber, cannot pick up cubes that are touching the side of the switch. Can only pick cubes that are parallel to intake.'),(277,48,1086,'Crossed',0,1,2,0,0,2,0,'No','None',0,''),(278,48,3136,'Crossed',0,1,1,0,0,0,3,'No','Climbed',0,'Had some intake troubles'),(279,48,1598,'Crossed',0,0,2,1,0,0,0,'No','None',0,'slow bot, had a foul for going in opponents null territory'),(280,48,3455,'Crossed',0,0,0,0,0,1,9,'No','None',0,'Played strategically and used vault effectively '),(281,48,1080,'Crossed',0,0,1,0,0,4,0,'No','None',0,'Has a low accuracy on scale'),(282,49,977,'Crossed',0,0,0,0,0,4,0,'No','None',0,''),(283,49,1123,'Crossed',0,0,0,1,0,0,1,'No','None',0,''),(284,49,401,'Crossed',0,1,1,0,0,3,0,'No','None',0,'Fast intake and elevator, can put cubes on scale when tilted against them'),(285,49,5274,'Crossed',0,0,2,0,0,2,0,'No','Tried',0,'Missed scale auto, had trouble placing cubes on a cube-filled scale'),(286,49,3361,'Crossed',0,0,1,0,0,0,6,'No','None',0,'Although it focuses on only vault, it is almost half the speed of 540. '),(287,49,3939,'Crossed',0,0,8,1,0,2,0,'No','Climbed',0,'Played to their strengths strategically '),(288,50,3258,'Crossed',0,0,0,0,0,4,0,'No','Climbed',0,''),(289,50,540,'Crossed',0,0,0,1,0,0,2,'Yes','None',0,''),(290,50,4505,'Crossed',0,0,0,1,0,3,8,'No','None',0,'Scale and vault primarily, its vault is on the same level as 540. '),(291,50,6194,'Crossed',0,0,0,0,0,0,9,'No','None',0,'Played strategically and used vault effectively '),(292,50,6802,'Crossed',0,0,1,0,0,1,0,'No','Climbed',0,'ran into cubes in auto, had trouble w intake'),(293,51,619,'Crossed',0,0,0,0,0,0,6,'No','None',0,'Very fast bot, good with vault, sponsor sign falling off'),(294,51,3359,'Crossed',0,1,0,1,1,0,0,'No','None',0,''),(295,51,2890,'Crossed',0,1,1,0,2,0,1,'No','None',0,'Intake troubles at the end'),(296,51,1262,'Crossed',0,1,0,0,0,0,5,'No','None',0,''),(297,51,384,'Crossed',0,0,1,3,0,3,0,'No','Climbed',0,'Fast scale mechanism. Fast climbing msgs'),(298,51,1413,'Crossed',0,0,1,0,0,1,4,'No','None',0,'Played strategically with their alliance'),(299,52,1599,'Crossed',0,1,0,0,2,1,0,'No','Climbed',0,''),(300,52,1123,'Crossed',0,0,2,1,0,0,2,'No','None',0,'Ineffective intake'),(301,52,4466,'Failed',0,0,0,0,0,0,9,'No','None',0,'Played strategically and used vault effectively '),(302,52,3939,'Crossed',0,0,0,2,0,2,0,'No','None',0,''),(303,52,2534,'Crossed',0,1,1,1,0,4,0,'No','Climbed',0,'Okay auto, but good scale.'),(304,52,3274,'Crossed',0,0,0,2,1,2,2,'No','None',0,'Very fast, good strategy to go for opponent switch, took cubes from opposite'),(305,53,1598,'Crossed',0,0,1,1,0,0,0,'No','None',0,'Intake is not working well.'),(306,53,3258,'Crossed',0,0,2,1,0,3,0,'Yes','Climbed',0,'Solid bot overall, placed cube in middle of switch'),(307,53,5279,'Crossed',0,0,0,0,0,2,0,'No','Climbed',0,''),(308,53,6802,'Crossed',0,1,3,0,0,5,0,'No','None',0,'Generally good and played strategically '),(309,53,619,'Crossed',0,0,1,0,0,0,4,'No','None',0,'Fast Mecanum. Okay with scale. Froze for last 45 seconds of match.'),(310,53,1080,'Crossed',0,1,2,0,0,2,0,'Yes','None',0,'Not consistent w scale'),(311,54,3359,'Crossed',0,1,0,0,0,3,0,'No','None',0,'bit of trouble w intake'),(312,54,2534,'Crossed',0,1,2,0,1,3,0,'No','Climbed',0,'Good at scale but very tipsy.'),(313,54,3361,'Crossed',0,0,0,0,2,0,0,'No','None',0,'Rlly slow'),(314,54,3455,'Crossed',0,0,0,0,0,2,7,'No','None',0,'Played strategically and used vault effectively '),(315,54,539,'Crossed',0,0,1,1,0,0,0,'No','None',0,'Major intake problems'),(316,54,4466,'Crossed',0,0,0,8,0,0,8,'No','None',0,'Inaccurate vault placement. Jerky and hard to control.'),(317,55,1413,'Crossed',0,1,0,0,0,6,0,'No','None',0,'CRAZY Scale activity'),(318,55,384,'Crossed',0,0,0,0,1,4,0,'No','None',0,'Generally good and played strategically '),(319,55,6194,'Failed',0,0,0,1,1,0,1,'No','None',0,''),(320,55,540,'Crossed',0,0,0,0,0,0,7,'No','Climbed',0,'Fast vault.'),(321,55,1086,'Crossed',0,1,1,0,0,2,0,'No','Tried',0,'confused w beginning strategy'),(322,55,401,'Crossed',0,0,0,1,0,4,0,'No','Climbed',0,''),(323,56,5724,'Crossed',0,0,3,1,0,0,0,'No','Climbed',0,'Bay bad'),(324,56,1599,'Crossed',0,1,2,0,2,0,0,'No','Tried',0,'Had problems getting cubes on the scale'),(325,56,6543,'Crossed',0,0,1,0,0,0,5,'No','None',0,'disconnected in front of the exchange in the beginning'),(326,56,346,'Crossed',1,0,0,0,0,3,0,'No','Climbed',0,'rlly good w scale and climbing'),(327,56,1262,'Crossed',0,1,0,0,0,4,0,'No','Climbed',0,'Generally good and played strategically '),(328,56,3274,'Crossed',0,0,0,2,0,0,3,'No','None',0,''),(329,57,1080,'Crossed',0,0,1,0,0,4,0,'No','None',0,''),(330,57,4505,'Crossed',0,0,1,1,0,2,8,'No','None',0,'Very high cube activity'),(331,57,2890,'Crossed',0,1,0,3,0,0,0,'No','None',0,''),(332,57,2106,'Crossed',0,0,0,1,0,3,0,'No','Climbed',0,'Generally good and played strategically '),(333,57,977,'Crossed',0,0,2,0,0,4,0,'No','None',0,'Wobbly when doing scale.'),(334,57,3136,'Crossed',0,1,1,0,4,0,0,'Yes','Climbed',0,'went for enemy switch - good strategy'),(335,58,540,'Crossed',0,0,0,1,0,0,6,'No','Tried',0,'Good vault bot'),(336,58,5724,'Crossed',0,0,1,0,0,3,0,'No','None',0,'tried scale auto'),(337,58,1086,'Crossed',0,1,0,0,0,2,0,'No','None',0,'Generally good and played strategically '),(338,58,1123,'Crossed',0,0,0,1,0,0,2,'No','None',0,'Slow, poorly designed intake.');
/*!40000 ALTER TABLE `raw_data` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-25 15:30:23
