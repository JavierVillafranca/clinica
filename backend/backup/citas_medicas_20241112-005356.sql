-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: citas_medicas
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `idv` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `idprcd` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`idv`),
  KEY `user_id` (`user_id`),
  KEY `idprcd` (`idprcd`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idprcd`) REFERENCES `product` (`idprcd`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `idcat` int NOT NULL AUTO_INCREMENT,
  `nomcat` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `state` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (2,'Excipientes','1','2022-10-25 07:19:44'),(3,'Analgésicos','1','2022-10-25 07:28:01'),(4,'Antiinflamatorios','1','2022-10-25 07:19:58'),(5,'Antipiréticos','1','2022-10-25 07:20:04'),(6,'Laxantes','1','2022-10-25 07:27:56'),(7,'Antiinfecciosos','1','2022-10-25 07:20:18'),(8,'Antitusivos','1','2022-10-25 07:20:27'),(11,'Benzodiazepínico','1','2024-02-07 04:56:26'),(12,'Antiviral','1','2024-02-07 05:00:17'),(13,'Antibiótico','1','2024-02-07 05:01:47');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consult`
--

DROP TABLE IF EXISTS `consult`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consult` (
  `idconslt` int NOT NULL AUTO_INCREMENT,
  `mtcl` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `idpa` int NOT NULL,
  `nompa` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `state` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idconslt`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consult`
--

LOCK TABLES `consult` WRITE;
/*!40000 ALTER TABLE `consult` DISABLE KEYS */;
INSERT INTO `consult` VALUES (18,'síntomas (inflamación en la zona T), falta de tratamientos y diagnóstico de acné moderado.',46,'Ricardo','1','2024-02-08 01:41:22');
/*!40000 ALTER TABLE `consult` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctor` (
  `idodc` int NOT NULL AUTO_INCREMENT,
  `ceddoc` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nodoc` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `apdoc` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `direcd` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sexd` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phd` char(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nacd` date NOT NULL,
  `fere` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `numpps` int DEFAULT NULL,
  `state` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `numco` int DEFAULT NULL,
  `userid` int DEFAULT NULL,
  `id_especialidad` int DEFAULT NULL,
  PRIMARY KEY (`idodc`),
  KEY `fkuserid` (`userid`),
  KEY `fk_especialidad` (`id_especialidad`),
  CONSTRAINT `fk_especialidad` FOREIGN KEY (`id_especialidad`) REFERENCES `laboratory` (`idlab`),
  CONSTRAINT `fkuserid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (44,'12456852','Edgar','Millan','urbaneja','Masculino','04164316581','1980-11-26','2024-01-31 01:44:10',454845,'1',564585,47,9),(45,'11031968','Claudio','Cortinez','anaco','Masculino','04268597624','1978-09-16','2024-01-31 01:43:58',789154,'1',654545,46,7),(46,'14264153','Aquiles','Torrealba','Calle Miranda','Masculino','04149674514','1980-08-16','2024-02-07 03:34:24',155452,'1',546523,NULL,2),(47,'11532643','Gregorina','Malave','Caracas','Femenino','04168426523','1982-06-30','2024-02-07 03:36:28',655236,'1',756452,NULL,6),(48,'15820103','Rhonald','Rodriguez','Puerto La Cruz','Masculino','04121403227','1990-01-14','2024-02-07 03:38:44',787413,'1',236569,NULL,5),(49,'9645856','Manuel','Carrasquero','Guanta','Masculino','04163210289','1993-11-02','2024-02-07 03:40:14',241365,'1',564852,NULL,8);
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `document` (
  `iddoc` int NOT NULL AUTO_INCREMENT,
  `nomfi` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `idpa` int NOT NULL,
  `nompa` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `state` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`iddoc`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document`
--

LOCK TABLES `document` WRITE;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` VALUES (1,'radigrafia','764173.jpeg',2,'Manuel Javier','1','2022-10-25 21:35:56'),(2,'otro ejemplo','526177.png',2,'Manuel Javier','1','2022-10-25 21:41:34'),(3,'otro ejemplo','426110.png',2,'Manuel Javier','1','2022-10-25 21:41:54'),(26,'','965785.png',25,'jasd','1','2024-01-21 19:27:54'),(27,'dddd','999264.jpeg',31,'Jose','1','2024-01-29 02:14:50'),(28,'hhhhhhhh','704867.png',31,'Jose','1','2024-01-29 02:15:19'),(29,'','909963.png',33,'Aquiles','1','2024-01-29 02:16:43');
/*!40000 ALTER TABLE `document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `idpa` int NOT NULL,
  `idodc` int NOT NULL,
  `idlab` int NOT NULL,
  `color` char(14) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `state` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fere` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idpa` (`idpa`),
  KEY `idodc` (`idodc`),
  KEY `idlab` (`idlab`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`idpa`) REFERENCES `patients` (`idpa`),
  CONSTRAINT `events_ibfk_2` FOREIGN KEY (`idodc`) REFERENCES `doctor` (`idodc`),
  CONSTRAINT `events_ibfk_3` FOREIGN KEY (`idlab`) REFERENCES `laboratory` (`idlab`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (67,'Epilepsia',37,44,9,'#0000FF','2024-02-08 10:00:00','2024-02-08 11:00:00','1',20.00,'2024-02-07 03:59:20'),(68,'Acidez estomacal',36,45,7,'#8800FF','2024-02-10 09:00:00','2024-02-10 10:00:00','1',25.00,'2024-02-07 04:02:00'),(69,'Taquicardia',35,48,5,'#FF0000','2024-02-20 12:00:00','2024-02-20 12:40:00','1',15.00,'2024-02-07 04:02:51'),(70,'Acné',46,47,6,'#FF0000','2024-02-11 11:00:00','2024-02-11 12:00:00','1',30.00,'2024-02-07 04:05:46'),(71,'Dolores de Cabeza',39,44,9,'#00FF00','2024-02-15 08:00:00','2024-02-15 09:00:00','0',20.00,'2024-02-08 14:46:58'),(72,'Infección',45,46,2,'#FF0000','2024-03-30 07:07:00','2024-03-30 09:00:00','1',15.00,'2024-02-07 04:12:56'),(73,'Insomnio',41,44,9,'#FF0000','2024-02-14 10:00:00','2024-02-14 11:00:00','1',30.00,'2024-02-07 04:14:53'),(74,'Perdida de memoria',43,44,9,'#FF4500','2024-02-14 11:30:00','2024-02-14 12:30:00','1',30.00,'2024-02-07 04:20:20'),(76,'Migraña',44,44,9,'#FF0000','2024-02-14 08:00:00','2024-02-14 09:00:00','1',30.00,'2024-02-08 01:22:55');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genogram`
--

DROP TABLE IF EXISTS `genogram`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genogram` (
  `idge` int NOT NULL AUTO_INCREMENT,
  `detage` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `idpa` int NOT NULL,
  `nompa` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `state` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idge`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genogram`
--

LOCK TABLES `genogram` WRITE;
/*!40000 ALTER TABLE `genogram` DISABLE KEYS */;
INSERT INTO `genogram` VALUES (21,'fiebre',33,'Aquiles','1','2024-01-31 21:04:34'),(22,'Padre: Historial de acné moderado en la adolescencia.\nMadre: Sin antecedentes de acné.\nHermano mayor: Historial de acné severo en la adolescencia, actualmente bajo control.',46,'Ricardo','1','2024-02-08 01:30:55');
/*!40000 ALTER TABLE `genogram` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laboratory`
--

DROP TABLE IF EXISTS `laboratory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laboratory` (
  `idlab` int NOT NULL AUTO_INCREMENT,
  `nomlab` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `state` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idlab`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratory`
--

LOCK TABLES `laboratory` WRITE;
/*!40000 ALTER TABLE `laboratory` DISABLE KEYS */;
INSERT INTO `laboratory` VALUES (2,'Pediatría','1','2022-10-25 06:48:26'),(3,'Rehabilitación','1','2022-10-25 06:48:44'),(4,'Endocrinología','1','2022-10-25 06:48:51'),(5,'Cardiología','1','2022-10-25 07:00:52'),(6,'Dermatología','1','2022-10-25 06:49:11'),(7,'Gastroenterología','1','2022-10-25 06:49:17'),(8,'Psiquiatría','1','2022-10-25 06:49:25'),(9,'Neurología','1','2022-10-25 06:49:37'),(10,'Neumología','1','2022-10-25 06:49:45'),(12,'Hematología','1','2022-10-25 06:49:59'),(23,'Oncología','1','2024-01-24 04:47:40');
/*!40000 ALTER TABLE `laboratory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `idord` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `nomcl` varchar(70) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `method` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `total_products` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `placed_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tipc` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idord`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (31,1,'Jose Perez','Efectivo','ACICLOVIR AMP 250 mg ( 1 )MORFINA COMP LC 30 mg ( 1 )',28.00,'2024-02-07 05:10:53','Aceptado','Boleta'),(32,1,'Martin Rodriguez','Efectivo','OXICODONA COMP 20 mg ( 1 )DOXICICLINA COMP 100mg ( 1 )',29.00,'2024-02-07 05:13:06','Aceptado','Boleta'),(33,47,'Jose Martinez','Efectivo','DIAZEPAM AMP 10mlg/2ml ( 1 )',10.00,'2024-02-07 05:14:46','Aceptado','Boleta'),(34,1,'Laura Ortiz','Efectivo','ACETAMINOFEN COMP 500mg ( 8 )',80.00,'2024-02-07 05:16:47','Aceptado','Boleta'),(35,46,'Raul Hernandez','Efectivo','IBUPROFENO COMP 400MG ( 18 )',180.00,'2024-02-07 05:28:31','Aceptado','Boleta'),(36,47,'jose','Efectivo','OXICODONA COMP 20 mg ( 1 )',19.00,'2024-02-08 14:51:27','Aceptado','Boleta');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patients` (
  `idpa` int NOT NULL AUTO_INCREMENT,
  `numhs` char(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nompa` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `apepa` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `direc` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sex` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `grup` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phon` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cump` date NOT NULL,
  `state` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lugna` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ocup` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idpa`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (35,'28123456','Angel','Anton','Pto la Cruz','Masculino','O+','04121456898','2001-05-12','1','2024-02-07 03:37:04','pto la cruz','Ingeniero de Sistemas'),(36,'28147258','David','Wong','Pto la Cruz','Masculino','A+','04147894564','2000-08-23','1','2024-02-07 03:39:16','Pto la Cruz','Ingeniero de Sistemas'),(37,'26258963','Sara','Zapata','Pto la Cruz','Femenino','O+','04161589874','1997-06-05','1','2024-02-07 03:43:36','Pto la Cruz','Ingeniero de Sistemas'),(38,'28456789','Fernando','Díaz','Pto la Cruz','Masculino','O+','04164567898','2001-12-06','1','2024-02-07 03:45:45','Pto la Cruz','Ingeniero de Sistemas'),(39,'28123589','Anthony','Khoukaz','Pto la Cruz','Masculino','O+','04147896547','2001-06-14','1','2024-02-07 03:47:52','Pto la Cruz','Ingeniero de Sistemas'),(40,'27652310','Oscar','Canache','Puerto la cruz','Masculino','A-','04168623014','1999-10-04','1','2024-02-07 03:49:21','Clinica Anzoategui','Ingeniero'),(41,'27987456','Pablo','Baumgartner','Pto la Cruz','Masculino','O-','04141556879','1999-11-05','1','2024-02-07 03:51:01','Pto la Cruz','Ingeniero de Sistemas'),(42,'27542631','Estefania','Moreno','Calle bolivar','Femenino','AB-','04148230124','2000-02-14','1','2024-02-07 03:51:58','Barcelona','Ingeniero'),(43,'28963852','Vicente','Perez','Pto la Cruz','Masculino','A+','04124589765','2001-10-05','1','2024-02-07 03:52:22','Pto la Cruz','Ingeniero de Sistemas'),(44,'28135042','Juan','Zabala','Barcelona','Masculino','O-','04123651246','1999-10-22','1','2024-02-07 03:53:41','Barcelona','Ingeniero'),(45,'27412456','Andres','Marval','Pto la Cruz','Masculino','O-','04167894567','1999-03-12','1','2024-02-07 03:54:40','Pto la Cruz','Ingeniero de Sistemas'),(46,'28564812','Ricardo','Mardelli','Barcelona','Masculino','O+','04125741236','2001-11-10','1','2024-02-08 14:44:15','Barcelona','Ingeniero');
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `idprcd` int NOT NULL AUTO_INCREMENT,
  `codpro` char(14) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `nompro` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `idcat` int NOT NULL,
  `preprd` decimal(10,2) NOT NULL,
  `stock` char(3) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `state` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idprcd`),
  KEY `idcat` (`idcat`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idcat`) REFERENCES `category` (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (10,'147896325','ACETAMINOFEN COMP 500mg',3,10.00,'139','1','2024-02-07 05:16:47'),(11,'147896523','DIAZEPAM AMP 10mlg/2ml',11,10.00,'106','1','2024-02-07 05:14:46'),(12,'165987460','IBUPROFENO COMP 400MG',4,10.00,'82','1','2024-02-07 05:28:31'),(13,'456484588','ACICLOVIR AMP 250 mg',12,12.00,'119','1','2024-02-07 05:10:53'),(14,'856125277','MORFINA COMP LC 30 mg',3,16.00,'83','1','2024-02-07 05:10:53'),(15,'147852414','DOXICICLINA COMP 100mg',13,10.00,'189','1','2024-02-07 05:13:06'),(16,'024252479','OXICODONA COMP 20 mg',3,19.00,'97','1','2024-09-06 17:47:10');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `idse` int NOT NULL AUTO_INCREMENT,
  `nomem` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idse`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'La Cruz');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treatment`
--

DROP TABLE IF EXISTS `treatment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `treatment` (
  `idtra` int NOT NULL AUTO_INCREMENT,
  `nomtra` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `idpa` int NOT NULL,
  `nompa` varchar(35) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `state` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idtra`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treatment`
--

LOCK TABLES `treatment` WRITE;
/*!40000 ALTER TABLE `treatment` DISABLE KEYS */;
INSERT INTO `treatment` VALUES (18,'Enfoques terapéuticos, como gel tópico de peróxido de benzoilo, limpiador facial suave, sin procedimientos dermatológicos y recomendaciones adicionales (higiene, evitar productos comedogénicos y protección solar).',46,'Ricardo','1','2024-02-08 01:39:24');
/*!40000 ALTER TABLE `treatment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `rol` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','Administrador','b0baee9d279d34fa1dfd71aadb908c3f','1','2024-09-06 17:02:38'),(2,'recepcion','Recepcion','b0baee9d279d34fa1dfd71aadb908c3f','2','2024-09-06 16:44:21'),(46,'medicoclaudio','Claudio Cortinez','b0baee9d279d34fa1dfd71aadb908c3f','3','2024-01-31 01:43:57'),(47,'medicoedgar','Edgar Millan','b0baee9d279d34fa1dfd71aadb908c3f','3','2024-01-31 01:44:10');
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

-- Dump completed on 2024-11-11 19:53:56
