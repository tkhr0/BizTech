-- MySQL dump 10.13  Distrib 5.5.39, for Linux (x86_64)
--
-- Host: localhost    Database: sukima
-- ------------------------------------------------------
-- Server version	5.5.39

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
-- Table structure for table `containers`
--

DROP TABLE IF EXISTS `containers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `containers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `goal_id` int(11) NOT NULL,
  `cheered` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `containers`
--

LOCK TABLES `containers` WRITE;
/*!40000 ALTER TABLE `containers` DISABLE KEYS */;
INSERT INTO `containers` VALUES (1,'2014-09-18 03:54:04','2014-09-19 07:37:44',1,65,4),(2,'2014-09-18 03:54:07','2014-09-19 08:02:44',1,16,1),(3,'2014-09-18 03:54:10','2014-09-17 18:54:10',1,0,3),(4,'2014-09-18 03:54:13','2014-09-19 08:03:23',1,6,2),(5,'2014-09-18 03:54:20','2014-09-18 14:59:23',2,20,2),(6,'2014-09-18 03:54:28','2014-09-17 18:54:28',3,0,4),(7,'2014-09-18 14:22:19','2014-09-18 14:59:26',1,12,3),(8,'2014-09-18 14:22:19','2014-09-18 05:22:19',2,0,3),(9,'2014-09-18 14:22:19','2014-09-18 05:22:19',3,0,3),(10,'2014-09-18 14:22:19','2014-09-18 05:22:19',2,0,1),(11,'2014-09-18 14:22:19','2014-09-18 05:22:19',4,0,3),(12,'2014-09-18 14:22:19','2014-09-18 05:22:19',7,0,3),(13,'2014-09-18 14:22:19','2014-09-18 05:22:19',7,0,1),(14,'2014-09-18 14:22:19','2014-09-18 05:22:19',7,0,2),(15,'2014-09-18 14:22:19','2014-09-18 05:22:19',7,0,4),(16,'2014-09-18 14:22:19','2014-09-18 05:22:19',5,0,3),(17,'2014-09-18 14:22:19','2014-09-18 05:22:19',6,0,3),(18,'2014-09-18 14:22:19','2014-09-18 05:22:19',8,0,3),(19,'2014-09-18 14:22:19','2014-09-18 05:22:19',9,0,3),(20,'0000-00-00 00:00:00','2014-09-18 18:54:23',2,0,1),(21,'0000-00-00 00:00:00','2014-09-18 18:54:58',2,0,1),(22,'0000-00-00 00:00:00','2014-09-18 18:55:36',2,0,1),(23,'0000-00-00 00:00:00','2014-09-18 18:55:40',2,0,1),(24,'0000-00-00 00:00:00','2014-09-18 18:55:40',2,0,1),(25,'0000-00-00 00:00:00','2014-09-18 18:55:40',2,0,1),(26,'0000-00-00 00:00:00','2014-09-18 18:55:41',2,0,1),(27,'0000-00-00 00:00:00','2014-09-18 18:56:33',2,0,1),(28,'0000-00-00 00:00:00','2014-09-18 18:57:03',2,0,1),(29,'0000-00-00 00:00:00','2014-09-18 18:58:32',2,0,1),(30,'0000-00-00 00:00:00','2014-09-18 18:58:34',2,0,1),(31,'0000-00-00 00:00:00','2014-09-18 18:58:35',2,0,1);
/*!40000 ALTER TABLE `containers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (1,1,2),(2,1,3),(3,2,1),(4,2,3),(5,3,1),(6,3,2);
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goals`
--

DROP TABLE IF EXISTS `goals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `achieve` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `cheered` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `finished_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goals`
--

LOCK TABLES `goals` WRITE;
/*!40000 ALTER TABLE `goals` DISABLE KEYS */;
INSERT INTO `goals` VALUES (1,'????',1,0,0,30,NULL,'2014-09-18 02:39:23',NULL),(2,'????',1,0,1,25,NULL,'2014-09-18 02:39:23',NULL),(3,'???????',1,0,0,8,NULL,'2014-09-18 02:39:23',NULL),(4,'???????',2,0,0,15,NULL,'2014-09-18 02:39:23',NULL),(5,'?????',2,0,0,40,NULL,'2014-09-18 02:39:23',NULL),(6,'?????',2,0,0,32,NULL,'2014-09-18 02:39:23',NULL),(7,'?????????',3,1,0,20,NULL,'2014-09-18 02:39:23',NULL),(8,'????????',3,0,0,10,NULL,'2014-09-18 02:39:23',NULL),(9,'????',3,0,0,30,NULL,'2014-09-18 02:39:23',NULL);
/*!40000 ALTER TABLE `goals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `markcheers`
--

DROP TABLE IF EXISTS `markcheers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markcheers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `markcheers`
--

LOCK TABLES `markcheers` WRITE;
/*!40000 ALTER TABLE `markcheers` DISABLE KEYS */;
INSERT INTO `markcheers` VALUES (1,'2014-09-19 02:13:02','2014-09-18 17:13:02',1,1,1),(2,'2014-09-19 02:13:35','2014-09-18 17:13:35',1,1,1),(3,'2014-09-19 02:13:49','2014-09-18 17:13:49',1,1,1),(4,'2014-09-19 02:14:23','2014-09-18 17:14:23',1,1,1),(5,'2014-09-19 02:14:37','2014-09-18 17:14:37',1,1,1),(6,'2014-09-19 02:14:41','2014-09-18 17:14:41',1,1,1),(7,'2014-09-19 02:14:41','2014-09-18 17:14:41',1,1,1);
/*!40000 ALTER TABLE `markcheers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `twitter_id` varchar(8) NOT NULL,
  `name` varchar(10) NOT NULL,
  `thumbnail_path` varchar(255) NOT NULL,
  `cheered` int(11) NOT NULL DEFAULT '0',
  `cheering` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `twitter_id` (`twitter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'yas0506','yas0506@??','http://foo',63,67,NULL,'2014-09-18 14:59:11'),(2,'morico','morico','http://bar',87,6,NULL,'2014-09-18 14:59:26'),(3,'nanami','???','http://hoge',60,61,NULL,'2014-09-18 14:53:30');
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

-- Dump completed on 2014-09-19 18:21:55
