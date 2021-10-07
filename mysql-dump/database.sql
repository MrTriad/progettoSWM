-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: trainingSWM
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `SQLi1`
--

DROP TABLE IF EXISTS `SQLi1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `SQLi1` (
  `Username` char(100) NOT NULL,
  `Password` char(100) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SQLi1`
--

LOCK TABLES `SQLi1` WRITE;
/*!40000 ALTER TABLE `SQLi1` DISABLE KEYS */;
INSERT INTO `SQLi1` (`Username`, `Password`) VALUES ('admin','secret');
/*!40000 ALTER TABLE `SQLi1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SQLi2_Credential`
--

DROP TABLE IF EXISTS `SQLi2_Credential`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `SQLi2_Credential` (
  `Username` char(100) NOT NULL,
  `Password` char(100) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SQLi2_Credential`
--

LOCK TABLES `SQLi2_Credential` WRITE;
/*!40000 ALTER TABLE `SQLi2_Credential` DISABLE KEYS */;
INSERT INTO `SQLi2_Credential` (`Username`, `Password`) VALUES ('BadGuy1','secret'),('BadGuy2','badguybadguy'),('BigBadGuy','password123');
/*!40000 ALTER TABLE `SQLi2_Credential` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SQLi2_Items`
--

DROP TABLE IF EXISTS `SQLi2_Items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `SQLi2_Items` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Name` char(100) NOT NULL,
  `NSold` int NOT NULL,
  `Description` blob NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SQLi2_Items`
--

LOCK TABLES `SQLi2_Items` WRITE;
/*!40000 ALTER TABLE `SQLi2_Items` DISABLE KEYS */;
INSERT INTO `SQLi2_Items` (`ID`, `Name`, `NSold`, `Description`) VALUES (1,'R4n$om4r3',42,_binary 'Infect, encrypt, ask for payback. As simple as it sounds with our product.'),(2,'AnnoyingWorm',3,_binary 'Simple program that keeps replicating till a pc gets slow and a disk gets full. Perfect to annoy your flatmates.'),(3,'TrojanRootKit',50,_binary 'Why would we sell malware without a great way to spread em? Send this to your victim, and he\'ll open a backdoor for our friends.'),(4,'PoliceSpyware',5,_binary 'Every breath you take, and every move you make. Every bond you break, every step you take, I\'ll be watching you'),(5,'Adware',15,_binary 'Fill programs with ads and enjoy some black hat cash. Don\'t worry, we also disable the adblock.');
/*!40000 ALTER TABLE `SQLi2_Items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SQLi3_Credential`
--

DROP TABLE IF EXISTS `SQLi3_Credential`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `SQLi3_Credential` (
  `Username` char(100) NOT NULL,
  `Password` char(100) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SQLi3_Credential`
--

LOCK TABLES `SQLi3_Credential` WRITE;
/*!40000 ALTER TABLE `SQLi3_Credential` DISABLE KEYS */;
INSERT INTO `SQLi3_Credential` (`Username`, `Password`) VALUES ('BadGuy1','040ccafb8f855f0f92e0ebba1deb5f3b'),('BadGuy2','5d41402abc4b2a76b9719d911017c592'),('BigBadGuy','ed1c3f709dc3b5cb5e75336213ed1268');
/*!40000 ALTER TABLE `SQLi3_Credential` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `XSS2_Post`
--

DROP TABLE IF EXISTS `XSS2_Post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `XSS2_Post` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Username` char(100) NOT NULL,
  `Post` blob NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `XSS2_Post_XSS2_User_Username_fk` (`Username`),
  CONSTRAINT `XSS2_Post_XSS2_User_Username_fk` FOREIGN KEY (`Username`) REFERENCES `XSS2_User` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `XSS2_Post`
--

LOCK TABLES `XSS2_Post` WRITE;
/*!40000 ALTER TABLE `XSS2_Post` DISABLE KEYS */;
INSERT INTO `XSS2_Post` (`ID`, `Username`, `Post`) VALUES (1,'Creator',_binary 'Welcome to my chatroom. It\'s pretty basic, so please be good users'),(2,'GoodUser',_binary 'Of course bud!');
/*!40000 ALTER TABLE `XSS2_Post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `XSS2_User`
--

DROP TABLE IF EXISTS `XSS2_User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `XSS2_User` (
  `Username` char(100) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `XSS2_User`
--

LOCK TABLES `XSS2_User` WRITE;
/*!40000 ALTER TABLE `XSS2_User` DISABLE KEYS */;
INSERT INTO `XSS2_User` (`Username`) VALUES ('Alice'),('Creator'),('Eve'),('GoodUser');
/*!40000 ALTER TABLE `XSS2_User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-07 12:24:53
