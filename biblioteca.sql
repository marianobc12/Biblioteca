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
  `Id_Cuenta` int(2) NOT NULL AUTO_INCREMENT,
  `Dni` char(8) COLLATE utf8_bin NOT NULL,
  `Nom_Ape` varchar(60) COLLATE utf8_bin NOT NULL,
  `Tipo` varchar(20) COLLATE utf8_bin NOT NULL,
  `Email` varchar(45) COLLATE utf8_bin NOT NULL,
  `Clave` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Id_Cuenta`),
  UNIQUE KEY `Dni` (`Dni`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Datos de las cuentas de acceso';

-- Volcando datos para la tabla biblioteca.cuenta: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` (`Id_Cuenta`, `Dni`, `Nom_Ape`, `Tipo`, `Email`, `Clave`) VALUES
	(1, '40714396', 'Mariano Flores', 'Admin', 'mutantdevs@gmail.com', 'admin'),
	(2, '34376661', 'Martin Comito', 'Admin', 'martincomito2@hotmail.com', 'admin'),
	(3, '40714397', 'Mariano Flores', 'Usuario', 'mariano1@hotmail.com', 'usuario'),
	(4, '34376662', 'Martin Comito', 'Admin', 'martincomito1@hotmail.com', 'usuario');
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.devolucion
DROP TABLE IF EXISTS `devolucion`;
CREATE TABLE IF NOT EXISTS `devolucion` (
  `Id_Devolucion` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Prestamo` int(11) NOT NULL,
  `Fecha_Devolucion` date NOT NULL,
  PRIMARY KEY (`Id_Devolucion`),
  KEY `Id_Prestamo` (`Id_Prestamo`),
  CONSTRAINT `Id_Prestamo` FOREIGN KEY (`Id_Prestamo`) REFERENCES `prestamo` (`Id_Prestamo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Datos de devolucion de libros';

-- Volcando datos para la tabla biblioteca.devolucion: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `devolucion` DISABLE KEYS */;
INSERT INTO `devolucion` (`Id_Devolucion`, `Id_Prestamo`, `Fecha_Devolucion`) VALUES
	(1, 2, '2018-06-24');
/*!40000 ALTER TABLE `devolucion` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.libro
DROP TABLE IF EXISTS `libro`;
CREATE TABLE IF NOT EXISTS `libro` (
  `Id_Libro` int(11) NOT NULL AUTO_INCREMENT,
  `Num_Inventario` int(5) NOT NULL,
  `Fecha_Entrada` date NOT NULL,
  `Autor` varchar(60) COLLATE utf8_bin NOT NULL,
  `Titulo` varchar(100) COLLATE utf8_bin NOT NULL,
  `Editorial` varchar(60) COLLATE utf8_bin NOT NULL,
  `Tipo_Operacion` varchar(8) COLLATE utf8_bin NOT NULL,
  `Genero` varchar(5) COLLATE utf8_bin NOT NULL,
  `Disponibilidad` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Id_Libro`),
  UNIQUE KEY `Num_Inventario` (`Num_Inventario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Datos de los libros';

-- Volcando datos para la tabla biblioteca.libro: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` (`Id_Libro`, `Num_Inventario`, `Fecha_Entrada`, `Autor`, `Titulo`, `Editorial`, `Tipo_Operacion`, `Genero`, `Disponibilidad`) VALUES
	(1, 3121, '2008-06-24', 'Carlo Collodi', 'Pinocho', 'Santillana', 'Donado', '82-32', 'Disponible');
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.prestamo
DROP TABLE IF EXISTS `prestamo`;
CREATE TABLE IF NOT EXISTS `prestamo` (
  `Id_Prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Libro` int(11) NOT NULL,
  `Fecha_Prestamo` date NOT NULL,
  `Observaciones` longtext COLLATE utf8_bin NOT NULL,
  `Activo` varchar(2) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Id_Prestamo`),
  KEY `Id_Usuario` (`Id_Usuario`),
  KEY `Id_Libro` (`Id_Libro`),
  CONSTRAINT `Id_Libro` FOREIGN KEY (`Id_Libro`) REFERENCES `libro` (`Id_Libro`),
  CONSTRAINT `Id_Usuario` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Datos de prestamo';

-- Volcando datos para la tabla biblioteca.prestamo: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `prestamo` DISABLE KEYS */;
INSERT INTO `prestamo` (`Id_Prestamo`, `Id_Usuario`, `Id_Libro`, `Fecha_Prestamo`, `Observaciones`, `Activo`) VALUES
	(2, 1, 1, '2018-06-24', 'Rotura en la tapa frontal', 'Si');
/*!40000 ALTER TABLE `prestamo` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Dni` char(8) COLLATE utf8_bin NOT NULL,
  `Nom_Ape` varchar(60) COLLATE utf8_bin NOT NULL,
  `Fec_Nac` date NOT NULL,
  `Nacionalidad` varchar(50) COLLATE utf8_bin NOT NULL,
  `Telefono` varchar(20) COLLATE utf8_bin NOT NULL,
  `Celular` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Domicilio` varchar(100) COLLATE utf8_bin NOT NULL,
  `Domicilio_Seg` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Fecha_Alta` date NOT NULL,
  PRIMARY KEY (`Id_Usuario`),
  UNIQUE KEY `Dni` (`Dni`)
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Datos de los usuarios';

-- Volcando datos para la tabla biblioteca.usuario: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`Id_Usuario`, `Dni`, `Nom_Ape`, `Fec_Nac`, `Nacionalidad`, `Telefono`, `Celular`, `Domicilio`, `Domicilio_Seg`, `Email`, `Fecha_Alta`) VALUES
	(1, '40714396', 'Mariano Flores', '1997-10-24', 'Argentina', '4253165', '2216779986', '120 y 65', '17 y 65', 'Mariano@gmail.com', '2018-06-22'),
	(202, '31027895', 'Juan Lopez', '2018-07-06', 'Argentina', '4233443', '3', '10 E/ 65 y 66', '3', 'marianoleandro1997@gmail.com', '2018-07-06'),
	(206, '31027891', 'Laura Gonzales', '2018-07-06', 'Argentina', '4233443', '', '10 E/ 65 y 66', '', '', '2018-07-06'),
	(210, '40714392', 'Pepe Muños', '2018-07-18', 'SDFSDF', 'SDFSDF', 'DSFDSF', 'SDFDSF', '3', 'mutantdevs@gmail.com', '2018-07-06'),
	(211, '40714390', 'Jorge Latin', '2018-07-18', 'SDFSDF', 'SDFSDF', 'DSFDSF', 'SDFDSF', '3', 'mutantdevs@gmail.com', '2018-07-06'),
	(212, '34324329', 'Mariano Flores', '2018-07-18', 'Argentina', '4233443', '3', '11 y 25', '3', 'dsadad@sd.c', '2018-07-06'),
	(213, '14758963', 'Mariano Flores', '1996-11-19', 'Argentina', '4235436', '', '11 y 22', '', '', '2018-07-06');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
