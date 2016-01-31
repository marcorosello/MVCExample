-- MySQL dump 10.13  Distrib 5.6.27, for Linux (x86_64)
--
-- Host: localhost    Database: sales
-- ------------------------------------------------------
-- Server version	5.6.27

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
-- Table structure for table `Customers`
--

DROP TABLE IF EXISTS `Customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL DEFAULT '',
  `last_name` varchar(100) DEFAULT '',
  `email` varchar(100) DEFAULT '',
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Customers`
--

LOCK TABLES `Customers` WRITE;
/*!40000 ALTER TABLE `Customers` DISABLE KEYS */;
INSERT INTO `Customers` VALUES (1,'marco','rosello','marco@marco.coom','2016-01-06'),(2,'markas','rosellas','markas@markas.com','2016-01-07'),(3,'marius','rosas','marius@marius.com','2016-01-08'),(4,'darius','darenas','darius@darius.com','2016-01-10'),(5,'polo','pololo','polo@polo.com','2016-01-10'),(6,'somo','sololo','somo@somo.com','2016-01-06'),(7,'robo','roberto','robo@robo.com','2016-01-06'),(8,'pako','pakito','pako@paco.com','2016-01-06'),(9,'lego','legolend','lego@lego.com','2016-01-06'),(10,'bebo','bebebo','bebo@bebo.com','2016-01-01'),(11,'blanca','blanquita','blanca@blanca.com','2015-11-06'),(12,'ser','seras','ser@ser.com','2015-11-06'),(13,'taco','tacolo','taco@taco.com','2015-11-06'),(14,'awa','awawa','awa@awa.com','2015-11-07'),(15,'cos','cosas','cos@cos.com','2015-11-09'),(16,'juan','pastor','juan@juan.com','2015-11-09'),(17,'jon','jonas','jon@jon.com','2015-11-05'),(18,'edgaras','jasikevicius','ed@gmail.com','2016-01-16');
/*!40000 ALTER TABLE `Customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OrderItems`
--

DROP TABLE IF EXISTS `OrderItems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OrderItems` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ean` varchar(13) NOT NULL DEFAULT '',
  `quantity` int(11) DEFAULT '0',
  `price` decimal(9,2) DEFAULT '0.00',
  `order_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OrderItems`
--

LOCK TABLES `OrderItems` WRITE;
/*!40000 ALTER TABLE `OrderItems` DISABLE KEYS */;
INSERT INTO `OrderItems` VALUES (1,'2112345678900',5,300.00,1),(2,'780672318863',1,400.04,1),(3,'780672318865',4,200.03,2),(4,'780672318866',1,100.00,4),(5,'780572318866',1,3.23,5),(6,'480572318866',1,24.95,6),(7,'580672318836',3,33.00,6),(8,'58067231883',1,12.00,2),(9,'58067231883',3,36.00,3),(10,'58067231883',1,12.00,7),(11,'58067231883',1,12.00,8),(12,'58067231883',2,24.00,9),(13,'58067231883',1,12.00,10),(14,'58067231883',1,12.00,11);
/*!40000 ALTER TABLE `OrderItems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_date` date NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orders`
--

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;
INSERT INTO `Orders` VALUES (1,'2015-11-02','spain','mobile',1),(2,'2016-01-01','lithuania','desktop',4),(3,'2016-01-06','spain','desktop',1),(4,'2015-11-29','lithuania','desktop',4),(5,'2016-01-03','italy','tablet',13),(6,'2015-12-12','france','mobile',3),(7,'2015-12-24','england','desktop',2),(8,'2015-12-12','france','mobile',3),(9,'2015-12-24','norway','mobile',4),(10,'2015-12-24','portugal','mobile',5),(11,'2016-11-24','sweden','desktop',6),(12,'2016-01-30','sweeden','mobile',7),(13,'2016-01-22','sweeden','desktop',8),(14,'2016-01-01','england','mobile',9),(15,'2016-01-10','england','desktop',10);
/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-31 20:28:54
