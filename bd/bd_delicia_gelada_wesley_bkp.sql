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
-- Table structure for table `tbl_curiosidades`
--

DROP TABLE IF EXISTS `tbl_curiosidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_curiosidades` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `conteudo` text NOT NULL,
  `imagem` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_curiosidades`
--

LOCK TABLES `tbl_curiosidades` WRITE;
/*!40000 ALTER TABLE `tbl_curiosidades` DISABLE KEYS */;
INSERT INTO `tbl_curiosidades` VALUES (1,'asas','asasa','26d9e9a626f0226009a4f347929ae3af.jpg'),(2,'asas','asasa','4517275beaa1d3e9b2c3d45397bbb29c.jpg'),(3,'asasasas','asasaasasasasa','581edadb0c5dcdcf72ae610695b3e855.jpg'),(4,'wesley','duhaghdh','990ccc1784a38ccfa5c897b847b57a21.jpg'),(5,'Benefícios de fazer um suco natural ao invés de consumir os industrializados','A vida agitada, muitas vezes, nos obriga a optar por uma alimentação mais rápida em nosso dia a dia. Por esse motivo, tendemos a fazer escolhas não tão corretas quanto à nossa alimentação.\r\nNo entanto, empreender um pouco mais de tempo no preparo de uma alimentação saudável, pode nos render futuro e saúde melhores.\r\nSucos naturais de frutas, por exemplo, são fontes de diversos nutrientes importantes para o nosso corpo. Além de fornecer a energia necessária para “encararmos” mais um dia agitado, ainda ajudam nosso sistema a assimilar os valiosos nutrientes encontrados nos alimentos.','9f2e0003898dd959511454fffe1cab46.jpg'),(6,'Php','Se o parâmetro needle não é uma string, é convertido para um inteiro e aplicado o valor do caractere.\r\nO parâmetro opcional offset permite a você definir a partir de qual caractere em haystack iniciar a busca.\r\nA posição retorna ainda é relativa ao inicio de haystack.','f02c2256b9e53d7a34aceb692d64c9c5.jpg'),(7,'Suco de caju','o suco de caju, assim como o de limão, é ótimo para lidar com aquela ressaca que nunca é bem vinda. Ele vem com caju, água, açúcar, suco de limão e gelo. É bom peneirar depois de pronto para ele não ficar com uma consistência muito espessa. Fica delicioso e é bem fácil de ser feito.','86e476a04607b23e4f4ae8c62f9bf54f.jpg');
/*!40000 ALTER TABLE `tbl_curiosidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_empresa`
--

DROP TABLE IF EXISTS `tbl_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_empresa` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `conteudo` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_empresa`
--

LOCK TABLES `tbl_empresa` WRITE;
/*!40000 ALTER TABLE `tbl_empresa` DISABLE KEYS */;
INSERT INTO `tbl_empresa` VALUES (1,'adadad','aadadadihuhi\r\nÇÇKKOSKKAOSKOAK',1),(2,'Php Teste','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.',1);
/*!40000 ALTER TABLE `tbl_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_empresa_card`
--

DROP TABLE IF EXISTS `tbl_empresa_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_empresa_card` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `conteudo` text NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_empresa_card`
--

LOCK TABLES `tbl_empresa_card` WRITE;
/*!40000 ALTER TABLE `tbl_empresa_card` DISABLE KEYS */;
INSERT INTO `tbl_empresa_card` VALUES (1,'Teste','teste 01','5f9c56a7665407942a89f2131726c7c4.jpg',1),(2,'Missão','“Contribuir para um país mais forte por meio de empresas mais fortes”.','65b5522e791a9cdb137494f4d334bc56.png',1);
/*!40000 ALTER TABLE `tbl_empresa_card` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_niveis`
--

LOCK TABLES `tbl_niveis` WRITE;
/*!40000 ALTER TABLE `tbl_niveis` DISABLE KEYS */;
INSERT INTO `tbl_niveis` VALUES (1,'administrador',1,1,1),(2,'Operador de Conteúdo',0,1,0),(3,'Relacionamento com o Cliente',0,0,1),(4,'Estagiário',0,0,0),(5,'teste',0,1,1),(6,'teste02',1,1,0),(7,'teste03',0,1,0),(8,'Administrador supremo',0,1,0);
/*!40000 ALTER TABLE `tbl_niveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_usuarios` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `fk_nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_nivel_idx` (`fk_nivel`),
  CONSTRAINT `fk_nivel` FOREIGN KEY (`fk_nivel`) REFERENCES `tbl_niveis` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuarios`
--

LOCK TABLES `tbl_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_usuarios` VALUES (1,'juliana','juliana@gmail.com','juliana','123',4),(2,'juliana','juliana@gmail.com','juliana','123',4),(3,'pedro','pedro@gmail.com','pedro','123',5),(4,'Tux','tux@gmail.com','tux','123',1),(5,'sabrina','sabrina@gmail.com','sabrina','123',6),(6,'Melissa','melissa@gmail.com','melissa','123',8),(7,'melissa','melissa@gmail.com','melissa123','1234',1);
/*!40000 ALTER TABLE `tbl_usuarios` ENABLE KEYS */;
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

-- Dump completed on 2019-11-12 11:38:34
