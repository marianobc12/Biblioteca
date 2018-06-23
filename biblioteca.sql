-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.8-log - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla biblioteca.cuenta
DROP TABLE IF EXISTS `cuenta`;
CREATE TABLE IF NOT EXISTS `cuenta` (
  `Id_Cuenta` int(2) NOT NULL,
  `Dni` char(8) COLLATE utf8_bin NOT NULL,
  `Nom_Ape` varchar(60) COLLATE utf8_bin NOT NULL,
  `Tipo` varchar(20) COLLATE utf8_bin NOT NULL,
  `Email` varchar(45) COLLATE utf8_bin NOT NULL,
  `Clave` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Id_Cuenta`),
  KEY `Dni` (`Dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Datos de las cuentas de acceso';

-- Volcando datos para la tabla biblioteca.cuenta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Dni` char(8) COLLATE utf8_bin NOT NULL,
  `Nom_Ape` varchar(60) COLLATE utf8_bin NOT NULL,
  `Fec_Nac` date NOT NULL,
  `Nacionalidad` varchar(30) COLLATE utf8_bin NOT NULL,
  `Telefono` varchar(10) COLLATE utf8_bin NOT NULL,
  `Celular` varchar(14) COLLATE utf8_bin DEFAULT 'No tiene',
  `Domicilio` varchar(50) COLLATE utf8_bin NOT NULL,
  `Domicilio_Seg` varchar(50) COLLATE utf8_bin DEFAULT 'No tiene',
  `Email` varchar(45) COLLATE utf8_bin DEFAULT 'No tiene',
  `Fecha_Alta` date NOT NULL,
  PRIMARY KEY (`Id_Usuario`),
  KEY `Dni` (`Dni`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Datos de los usuarios';

-- Volcando datos para la tabla biblioteca.usuario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`Id_Usuario`, `Dni`, `Nom_Ape`, `Fec_Nac`, `Nacionalidad`, `Telefono`, `Celular`, `Domicilio`, `Domicilio_Seg`, `Email`, `Fecha_Alta`) VALUES
	(1, '40714396', 'Mariano Flores', '1997-10-24', 'Argentina', '4253165', 'No tiene', '120 y 65', 'No tiene', 'No tiene', '2018-06-22');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
