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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (28,1,1,'MANTIXA 2.5 MG X 30 COMPRIMIDOS',153.60,1),(29,1,2,'Pomada Antiinflamatoria Lymphdiaral x 40 gr',45.00,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (2,'Excipientes','1','2022-10-25 07:19:44'),(3,'Analgésicos','1','2022-10-25 07:28:01'),(4,'Antiinflamatorios','1','2022-10-25 07:19:58'),(5,'Antipiréticos','1','2022-10-25 07:20:04'),(6,'Laxantes','1','2022-10-25 07:27:56'),(7,'Antiinfecciosos','1','2022-10-25 07:20:18'),(8,'Antitusivos','1','2022-10-25 07:20:27');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consult`
--

LOCK TABLES `consult` WRITE;
/*!40000 ALTER TABLE `consult` DISABLE KEYS */;
INSERT INTO `consult` VALUES (1,'enfermo\n',2,'Manuel Javier','1','2024-01-09 03:50:58'),(2,'huhuihiuhi',2,'Manuel Alexander','1','2024-01-12 05:17:54'),(3,'sgfs',24,'ale','1','2024-01-18 02:28:36'),(4,'sgfs',24,'ale','1','2024-01-18 02:28:36'),(5,'scfsfsd',24,'ale','1','2024-01-18 02:28:51');
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
  `state` char(1) COLLATE utf8mb3_unicode_ci NOT NULL,
  `numco` int DEFAULT NULL,
  `userid` int DEFAULT NULL,
  `id_especialidad` int DEFAULT NULL,
  PRIMARY KEY (`idodc`),
  KEY `fkuserid` (`userid`),
  KEY `fk_especialidad` (`id_especialidad`),
  CONSTRAINT `fk_especialidad` FOREIGN KEY (`id_especialidad`) REFERENCES `laboratory` (`idlab`),
  CONSTRAINT `fkuserid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (34,'234234','fsdfsfsf','dsffsf','dfsfssfd','Masculino','2423432','2000-05-22','2024-01-19 01:06:15',256455,'1',564555,NULL,2),(35,'44242','fdsdff','esfsfsd','fgsgfd','Masculino','3242342','2000-01-20','2024-01-19 01:39:52',342432,'1',333424,NULL,12);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document`
--

LOCK TABLES `document` WRITE;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` VALUES (1,'radigrafia','764173.jpeg',2,'Manuel Javier','1','2022-10-25 21:35:56'),(2,'otro ejemplo','526177.png',2,'Manuel Javier','1','2022-10-25 21:41:34'),(3,'otro ejemplo','426110.png',2,'Manuel Javier','1','2022-10-25 21:41:54'),(4,'','346768.png',1,'Javier','1','2024-01-09 21:17:33'),(5,'fue hoy','103826.png',2,'Manuel','1','2024-01-09 21:23:09');
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (51,'cita2',25,34,2,'#CD5C5C','3333-03-23 03:03:00','5555-05-05 05:05:00','1',323.00,'2024-01-19 05:39:53');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genogram`
--

LOCK TABLES `genogram` WRITE;
/*!40000 ALTER TABLE `genogram` DISABLE KEYS */;
INSERT INTO `genogram` VALUES (1,'ñs,aÑ',2,'Manuel Javier','1','2024-01-02 19:02:56'),(2,'ñs,aÑ',2,'Manuel Javier','1','2024-01-02 19:03:00'),(3,'ñs,aÑSAC',2,'Manuel Javier','1','2024-01-02 19:03:07'),(4,'asdasdsa',2,'Manuel Javier','1','2024-01-09 03:51:13'),(5,'asdasdsa',2,'Manuel Javier','1','2024-01-09 03:51:21'),(6,'knlklk',2,'Manuel Alexander','1','2024-01-12 05:18:17'),(7,'sdsfsf',24,'ale','1','2024-01-18 02:29:30');
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratory`
--

LOCK TABLES `laboratory` WRITE;
/*!40000 ALTER TABLE `laboratory` DISABLE KEYS */;
INSERT INTO `laboratory` VALUES (2,'Pediatría','1','2022-10-25 06:48:26'),(3,'Rehabilitación','1','2022-10-25 06:48:44'),(4,'Endocrinología','1','2022-10-25 06:48:51'),(5,'Cardiología','1','2022-10-25 07:00:52'),(6,'Dermatología','1','2022-10-25 06:49:11'),(7,'Gastroenterología','1','2022-10-25 06:49:17'),(8,'Psiquiatría','1','2022-10-25 06:49:25'),(9,'Neurología','1','2022-10-25 06:49:37'),(10,'Neumología','1','2022-10-25 06:49:45'),(12,'Hematología','1','2022-10-25 06:49:59'),(13,'Oncología','1','2022-10-25 06:50:06');
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
  `placed_on` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `payment_status` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tipc` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idord`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'Yuliana Sosa','Contado',', MANTIXA 2.5 MG X 30 COMPRIMIDOS ( 2 )',307.20,'28-Oct-2022','Aceptado','Boleta'),(2,1,'jesus','Contado',', MANTIXA 2.5 MG X 30 COMPRIMIDOS ( 1 ), Pomada Antiinflamatoria Lymphdiaral x 40 gr ( 1 ), Atamel ( 10 )',243.60,'07-Jan-2024','Aceptado','Boleta'),(3,1,'Javier','Tarjeta',', MANTIXA 2.5 MG X 30 COMPRIMIDOS ( 6 )',921.60,'08-Jan-2024','Aceptado','Boleta'),(4,1,'Javier','Contado',', Pomada Antiinflamatoria Lymphdiaral x 40 gr ( 1 ), Atamel ( 1 )',49.50,'08-Jan-2024','Aceptado','Boleta'),(5,1,'hgfghhg','Contado',', MANTIXA 2.5 MG X 30 COMPRIMIDOS ( 1 ), Pomada Antiinflamatoria Lymphdiaral x 40 gr ( 1 )',198.60,'08-Jan-2024','Aceptado','Boleta');
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
  `phon` varchar(15) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cump` date NOT NULL,
  `state` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fere` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lugna` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ocup` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idpa`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (25,'2323232','jasd','das','dfs','Masculino','B-','064646','2323-03-23','1','2024-01-19 01:07:14','fds','ing'),(26,'4324','dasda','dasdd','sdffsdfsd','Masculino','B+','34234','2001-02-20','1','2024-01-19 05:29:14','efessdfe','fsdsfd'),(27,'3232','fdssd','dfsdf','gdgfdfd','Masculino','A-','34232','2000-02-20','1','2024-01-19 05:35:30','fdgffd','gfgsgd'),(29,'335435','rerdf','gdfgd','werewre','Masculino','A-','ewrwe','2000-02-20','1','2024-01-19 05:49:15','werwer','ewrew');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'AMF774FFBFBDBF','MANTIXA 2.5 MG X 30 COMPRIMIDOS',5,153.60,'90','1','2022-10-25 18:40:09'),(2,'SKU: 09434','Pomada Antiinflamatoria Lymphdiaral x 40 gr',7,45.00,'49','1','2024-01-07 18:49:25'),(4,'4652153','Atamel',4,4.50,'15','1','2024-01-16 21:19:50');
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
  `foto` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idse`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'La Cruz','145583.');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treatment`
--

LOCK TABLES `treatment` WRITE;
/*!40000 ALTER TABLE `treatment` DISABLE KEYS */;
INSERT INTO `treatment` VALUES (1,'jjfafa\n',2,'Manuel Alexander','1','2024-01-12 04:49:56'),(2,'jjfafa\n',2,'Manuel Alexander','1','2024-01-12 04:50:01'),(3,'ijoijoj\n',2,'Manuel Alexander','1','2024-01-12 05:18:05'),(4,'ijoijoj\n',2,'Manuel Alexander','1','2024-01-12 05:18:34'),(5,',l,l,l,',2,'Manuel Alexander','1','2024-01-16 23:29:29'),(6,',l,l,l,',2,'Manuel Alexander','1','2024-01-16 23:29:32'),(7,',l,l,l,',2,'Manuel Alexander','1','2024-01-16 23:29:34'),(8,',l,l,l,',2,'Manuel Alexander','1','2024-01-16 23:29:34'),(9,',l,l,l,',2,'Manuel Alexander','1','2024-01-16 23:29:35'),(10,'ewd',24,'ale','1','2024-01-18 19:57:49');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','Administrador','b0baee9d279d34fa1dfd71aadb908c3f','1','2024-01-20 22:13:34'),(2,'recepcion','Recepcion','e10adc3949ba59abbe56e057f20f883e','2','2024-01-19 06:37:35'),(3,'medico1','ramon','e10adc3949ba59abbe56e057f20f883e','3','2024-01-19 06:38:31'),(7,'medico2','fsdfsfsf dsffsf','b0baee9d279d34fa1dfd71aadb908c3f','3','2024-01-20 22:05:46');
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

-- Dump completed on 2024-01-20 18:35:51
