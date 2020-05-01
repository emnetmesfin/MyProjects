-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car` (
  `ID` char(11) NOT NULL,
  `Model` varchar(20) DEFAULT NULL,
  `Chassis` varchar(20) NOT NULL,
  `Plate` varchar(20) NOT NULL,
  `Owner_Id` char(11) NOT NULL,
  `Year_of_man` char(4) NOT NULL,
  `Valid` varchar(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_payment`
--

DROP TABLE IF EXISTS `car_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_payment` (
  `ID` char(10) NOT NULL,
  `Owner_Id` char(11) NOT NULL,
  `Date_of_Insurance` date NOT NULL,
  `Gross` float NOT NULL,
  `Retention` float NOT NULL,
  `loading` float NOT NULL,
  `Car_Type` time NOT NULL,
  `Car_Id` char(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_payment`
--

LOCK TABLES `car_payment` WRITE;
/*!40000 ALTER TABLE `car_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `ID` char(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `FName` varchar(20) NOT NULL,
  `GFName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Bank_Account` varchar(13) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES ('CLI/1234/00','Dagmawi','Nigussu','Something','123456','1000181231234'),('CLI/2297/18','Dagmawit ','Alemayehu','Habtegebriel','123456','1000181232203'),('CLI/4063/18','Bereket','Yohannes','Wijore','123456','1000181231235'),('CLI/9812/18','Emnet','Mesfin','Regassa','123456','1000181232345');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `ID` char(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `FName` varchar(20) NOT NULL,
  `GFName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Salary` varchar(10) NOT NULL,
  `Job_Type` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES ('EMP/0000/00','Abdulmenan','Kedir','a','123456','10000','Technician');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending_car`
--

DROP TABLE IF EXISTS `pending_car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pending_car` (
  `ID` varchar(11) NOT NULL,
  `Owner_Id` varchar(11) NOT NULL,
  `Car_Type` varchar(12) NOT NULL,
  `Year_of_man` char(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending_car`
--

LOCK TABLES `pending_car` WRITE;
/*!40000 ALTER TABLE `pending_car` DISABLE KEYS */;
INSERT INTO `pending_car` VALUES ('CAR/0000/00','CLI/0000/00','general','2018'),('CAR/0001/00','CLI/0000/00','general','2018'),('CAR/0002/00','CLI/0000/00','general','2018'),('CAR/0003/00','CLI/0000/00','General','2018'),('CAR/0004/00','CLI/0000/00','General','2018'),('CAR/0005/00','CLI/0000/00','General','2018');
/*!40000 ALTER TABLE `pending_car` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-30 10:19:50
