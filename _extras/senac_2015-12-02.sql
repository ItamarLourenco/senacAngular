# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: senac
# Generation Time: 2015-12-02 06:28:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table noticias
# ------------------------------------------------------------

DROP TABLE IF EXISTS `noticias`;

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_db` date DEFAULT NULL,
  `tipo` char(3) COLLATE utf8_swedish_ci DEFAULT NULL,
  `titulo` tinytext COLLATE utf8_swedish_ci,
  `resumo` mediumtext COLLATE utf8_swedish_ci,
  `texto` longtext COLLATE utf8_swedish_ci,
  `imagem` varchar(30) COLLATE utf8_swedish_ci DEFAULT NULL,
  `destaque` enum('sim','nao') COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;

INSERT INTO `noticias` (`id`, `data_db`, `tipo`, `titulo`, `resumo`, `texto`, `imagem`, `destaque`)
VALUES
	(41,NULL,'2','teste','teste','teste','teste','sim'),
	(42,NULL,'3','2','2','2','2','sim');

/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tipo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tipo`;

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(15) COLLATE utf8_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;

INSERT INTO `tipo` (`id`, `label`)
VALUES
	(1,'Cultura'),
	(2,'Politica 3'),
	(3,'teste'),
	(4,'Teste');

/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
