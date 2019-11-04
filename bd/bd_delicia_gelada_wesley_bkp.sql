CREATE DATABASE  IF NOT EXISTS `db_delicia_gelada_wesley` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_delicia_gelada_wesley`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: db_delicia_gelada_wesley
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_faleconosco`
--

DROP TABLE IF EXISTS `tbl_faleconosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_faleconosco` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `homepage` varchar(100) DEFAULT NULL,
  `linkfacebook` varchar(100) DEFAULT NULL,
  `profissao` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `opcaomensagem` varchar(45) NOT NULL,
  `mensagem` text NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_faleconosco`
--

LOCK TABLES `tbl_faleconosco` WRITE;
/*!40000 ALTER TABLE `tbl_faleconosco` DISABLE KEYS */;
INSERT INTO `tbl_faleconosco` VALUES (1,'wesley','','(11) 11111-1111','wesley@gmail.com','','','Ti','M','critica','asas'),(2,'wesley','','(11) 11111-1111','wesley@gmail.com','','','Ti','M','critica','zxdasda'),(3,'Wesley Meneghini','(11) 1111-1111','(11) 11111-1111','wesley.meneghini@gmail.com','','','Desenvolvimento','M','critica','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nAenean nec lorem. In porttitor. Donec laoreet nonummy augue.\r\nSuspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.\r\n'),(4,'fernando','(33) 3333-3333','(22) 22222-2222','fernando@gmail.com','','','Redes','M','sugestao','Teste');
/*!40000 ALTER TABLE `tbl_faleconosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_niveis`
--

DROP TABLE IF EXISTS `tbl_niveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_niveis` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `adm_conteudo` tinyint(4) DEFAULT NULL,
  `adm_faleconosco` tinyint(4) DEFAULT NULL,
  `adm_usuarios` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_niveis`
--

LOCK TABLES `tbl_niveis` WRITE;
/*!40000 ALTER TABLE `tbl_niveis` DISABLE KEYS */;
INSERT INTO `tbl_niveis` VALUES (1,'administrador',1,1,1),(2,'Operador de Conteúdo',0,1,0),(3,'Relacionamento com o Cliente',0,0,1),(4,'Estagiário',0,0,0),(5,'teste',0,1,1),(6,'teste02',1,1,0),(7,'teste03',0,1,0);
/*!40000 ALTER TABLE `tbl_niveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_delicia_gelada_wesley'
--

--
-- Dumping routines for database 'db_delicia_gelada_wesley'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-04 11:03:57
