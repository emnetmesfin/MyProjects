CREATE DATABASE  IF NOT EXISTS `scholarship` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `scholarship`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: scholarship
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
-- Table structure for table `agent`
--

DROP TABLE IF EXISTS `agent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agent` (
  `AgentName` varchar(45) NOT NULL,
  `AgentLastName` varchar(45) NOT NULL,
  `AgentBirthDate` date NOT NULL,
  `Sex` char(6) NOT NULL,
  `AgentId` varchar(38) NOT NULL,
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`AgentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agent`
--

LOCK TABLES `agent` WRITE;
/*!40000 ALTER TABLE `agent` DISABLE KEYS */;
INSERT INTO `agent` VALUES ('Abel','Tefera','1998-12-23','Male','232323','Abelaboss');
/*!40000 ALTER TABLE `agent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicationform`
--

DROP TABLE IF EXISTS `applicationform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicationform` (
  `Student` varchar(45) NOT NULL,
  `StudentLastName` varchar(45) NOT NULL,
  `Field` text NOT NULL,
  `Education` text NOT NULL,
  `University` text NOT NULL,
  `Scores` text,
  `Explanation` text,
  `Email` varchar(55) NOT NULL,
  `Payment` varchar(45) NOT NULL,
  `Sex` char(6) NOT NULL,
  `PromoterID` varchar(25) NOT NULL,
  `TourGuideID` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicationform`
--

LOCK TABLES `applicationform` WRITE;
/*!40000 ALTER TABLE `applicationform` DISABLE KEYS */;
INSERT INTO `applicationform` VALUES ('Abela','Tefera','MSC','Good Studt','aait studt','1800','Want to get out of Ethiopia','abel18@gamail.com','Self spnosered','MALE','e13444',NULL),('Abraham','Daniel','MSC','i am a top Information Science student at AAU','PRINCTON','','','abrsh@gmail.com','Self spnosered','MALE','e13444',NULL),('Amen','Sime','MSC','Finished','Hong Kong','1800','Want to have PHD','AmenS@outlook.com','','','',''),('Biruktawit','Teklay','BSC','1sd Year','Harvard','2200','I really want to join in','birukti@yahoo.com','','','',''),('Dagmawi','Negussu','M.Sc.','I am a struggling SE student at AAU','Shangai National University','none','I want to broaden my horizon','daginegussu@gmail.com','','','',''),('Dagi','Negussu','msc','se studt','mit','','','dagmawi@hotmail.com','Scholarship','MALE','e13444',NULL),('Desalegn','EmnetLast','msc','SE studt at AAIT','Harvard','2000','i just want to get in','des@yahoo.com','Self spnosered','MALE','e13444',NULL),('Emnet','EmnetLast','msc','SE studt at AAIT','Harvard','2000','i just want to get in','Emn@gmail.com','Self spnosered','FEMALE','e13444','e12233'),('Emnet','EmnetLast','msc','SE studt at AAIT','Harvard','2000','i just want to get in','Emn@yahoo.com','Self spnosered','FEMALE','e13444',NULL),('Rahel','Zelalem','bsc','I have an IT degree','harvard','','','rahel@ygmail.com','Self spnosered','FEMALE','e13444','e12233');
/*!40000 ALTER TABLE `applicationform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `StudentEmail` varchar(55) NOT NULL,
  `EmpID` varchar(25) NOT NULL,
  PRIMARY KEY (`StudentEmail`,`EmpID`),
  KEY `ID_idx` (`EmpID`),
  KEY `EMAIL_idx` (`StudentEmail`),
  CONSTRAINT `EMAIL` FOREIGN KEY (`StudentEmail`) REFERENCES `applicationform` (`Email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ID` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`EmployeeId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependent`
--

DROP TABLE IF EXISTS `dependent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependent` (
  `Name` varchar(23) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `RelationShip` mediumtext NOT NULL,
  `Phone` char(16) NOT NULL,
  `Sex` char(6) DEFAULT NULL,
  `StudentEmail` varchar(55) NOT NULL,
  `Country` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`StudentEmail`),
  CONSTRAINT `Emial` FOREIGN KEY (`StudentEmail`) REFERENCES `applicationform` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependent`
--

LOCK TABLES `dependent` WRITE;
/*!40000 ALTER TABLE `dependent` DISABLE KEYS */;
INSERT INTO `dependent` VALUES ('Tefera','TegeraLast','Parent','+251911145678','MALE','abel18@gamail.com','Ethiopia'),('Almaz','AlmazLast','Parent','+2519112334567','FEMALE','abrsh@gmail.com','Ethiopia'),('Mulugeta','Ayalew','Spouse','0','MALE','rahel@ygmail.com','Ethiopia');
/*!40000 ALTER TABLE `dependent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `EmployeeId` varchar(25) NOT NULL,
  `EmployeName` text,
  `EmployeeLastName` text NOT NULL,
  `ESalary` int(11) DEFAULT NULL,
  `Type` varchar(45) NOT NULL,
  `ESex` char(6) NOT NULL,
  `AgentID` varchar(38) NOT NULL,
  PRIMARY KEY (`EmployeeId`),
  KEY `AgentID_idx` (`AgentID`),
  KEY `_idx` (`AgentID`),
  CONSTRAINT `` FOREIGN KEY (`AgentID`) REFERENCES `agent` (`AgentId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES ('e12233','Emnet','EmnetLast',4000,'Tour Guide','FEMALE','232323'),('e13444','Birukti','Teklayy',2000,'Promoter','FEMALE','232323');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `university`
--

DROP TABLE IF EXISTS `university`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `university` (
  `UniversityName` text NOT NULL,
  `UniversityCountry` text NOT NULL,
  `UniversitState` varchar(45) NOT NULL,
  `UDescruption` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `university`
--

LOCK TABLES `university` WRITE;
/*!40000 ALTER TABLE `university` DISABLE KEYS */;
/*!40000 ALTER TABLE `university` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-04 14:55:36
