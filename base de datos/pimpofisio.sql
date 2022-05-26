-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: pimpofisio
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `id_citas` int(11) NOT NULL AUTO_INCREMENT,
  `cita` varchar(50) NOT NULL,
  `id_dias` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_fisioterapeuta` int(11) NOT NULL,
  PRIMARY KEY (`id_citas`),
  KEY `id_dias` (`id_dias`),
  KEY `id_fisioterapeuta` (`id_fisioterapeuta`),
  CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_dias`) REFERENCES `semana` (`id_dias`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fisioterapeutas`
--

DROP TABLE IF EXISTS `fisioterapeutas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fisioterapeutas` (
  `id_fisioterapeuta` int(11) NOT NULL AUTO_INCREMENT,
  `fisioterapeuta` varchar(50) NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  PRIMARY KEY (`id_fisioterapeuta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fisioterapeutas`
--

LOCK TABLES `fisioterapeutas` WRITE;
/*!40000 ALTER TABLE `fisioterapeutas` DISABLE KEYS */;
INSERT INTO `fisioterapeutas` VALUES (1,'MariJose','Deportiva'),(2,'Pepe','Rehabilitación');
/*!40000 ALTER TABLE `fisioterapeutas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horas`
--

DROP TABLE IF EXISTS `horas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horas` (
  `id_dias` int(11) NOT NULL,
  `libres` time DEFAULT NULL,
  `ocupadas` time DEFAULT NULL,
  `id_horas` int(11) NOT NULL,
  `id_fisioterapeuta` int(11) NOT NULL,
  PRIMARY KEY (`id_horas`),
  KEY `id_dias` (`id_dias`),
  KEY `id_fisioterapeuta` (`id_fisioterapeuta`),
  CONSTRAINT `horas_ibfk_1` FOREIGN KEY (`id_dias`) REFERENCES `semana` (`id_dias`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `horas_ibfk_2` FOREIGN KEY (`id_fisioterapeuta`) REFERENCES `fisioterapeutas` (`id_fisioterapeuta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horas`
--

LOCK TABLES `horas` WRITE;
/*!40000 ALTER TABLE `horas` DISABLE KEYS */;
INSERT INTO `horas` VALUES (1,'09:00:00',NULL,1,1),(1,'10:00:00',NULL,2,1),(1,'11:00:00',NULL,3,1),(1,'12:00:00',NULL,4,1),(2,'09:00:00',NULL,5,2),(2,'10:00:00',NULL,6,2),(2,'11:00:00',NULL,7,2),(2,'12:00:00',NULL,8,2),(3,'11:00:00',NULL,9,1),(3,'12:00:00',NULL,10,1),(3,'13:00:00',NULL,11,1),(4,'09:00:00',NULL,12,2),(4,'11:00:00',NULL,13,2),(5,'09:00:00',NULL,14,2),(5,'12:00:00',NULL,15,2),(5,'13:00:00',NULL,16,2);
/*!40000 ALTER TABLE `horas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informes`
--

DROP TABLE IF EXISTS `informes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informes` (
  `id_informes` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuarios` int(11) NOT NULL,
  `informe` varchar(200) NOT NULL,
  PRIMARY KEY (`id_informes`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informes`
--

LOCK TABLES `informes` WRITE;
/*!40000 ALTER TABLE `informes` DISABLE KEYS */;
/*!40000 ALTER TABLE `informes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semana`
--

DROP TABLE IF EXISTS `semana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semana` (
  `id_dias` int(11) NOT NULL AUTO_INCREMENT,
  `dias` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_dias`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semana`
--

LOCK TABLES `semana` WRITE;
/*!40000 ALTER TABLE `semana` DISABLE KEYS */;
INSERT INTO `semana` VALUES (1,'lunes','2022-08-01'),(2,'martes','2022-08-02'),(3,'miercoles','2022-08-03'),(4,'jueves','2022-08-04'),(5,'viernes','2022-08-05');
/*!40000 ALTER TABLE `semana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'pablo','pablo','e4b0da8a66b7dd2154d92df97da1c6cea8d421519b0a300df2be329e423f9675e39f6240733a7534df30ade501af974fb267e6e6a2768af68e55a3b47a31bf1b'),(2,'admin','admin','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec'),(3,'anabel','anabel','ced690f6f6d42435369b6c01d1458b7b890fa3bef132db5030947ff3edf50c2937e0a8b2192035a7e9d7239d663419f8569ea942ef626f76635aaf9ba0fdfc35'),(4,'123','123','3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-26 19:36:55
