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
	(1, '40714396', 'Mariano Flores', 'Admin', 'marianobc12@hotmail.com', 'admin'),
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
  CONSTRAINT `Id_Prestamo` FOREIGN KEY (`Id_Prestamo`) REFERENCES `prestamo` (`Id_Prestamo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Datos de devolucion de libros';

-- Volcando datos para la tabla biblioteca.devolucion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `devolucion` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=309 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Datos de los libros';

-- Volcando datos para la tabla biblioteca.libro: ~107 rows (aproximadamente)
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` (`Id_Libro`, `Num_Inventario`, `Fecha_Entrada`, `Autor`, `Titulo`, `Editorial`, `Tipo_Operacion`, `Genero`, `Disponibilidad`) VALUES
	(1, 3121, '2018-06-14', 'Carlo  Andez', 'Pinocho', 'Santillana', 'Donado', '82-36', 'Disponible'),
	(3, 4332, '2018-07-31', 'Jorge Luis Borges', 'Duende', 'Santillana', 'Donado', '82-36', 'Disponible'),
	(4, 4323, '2018-07-23', 'Jorge Luis Borges', 'Duende', 'Santillana', 'Comprado', '82-32', 'Disponible'),
	(5, 2312, '2018-07-24', 'Jorge Luis Borges', 'El Aleph', 'Mundo Azul', 'Comprado', '82-32', 'Disponible'),
	(6, 3212, '2018-07-24', 'Luis Ven', 'Seguridad Informatica', 'Microsoft', 'Donado', '82-36', 'Disponible'),
	(7, 3214, '2018-07-27', 'Marquez', 'El almohadon de plumas', 'Santillana', 'Donado', '82-36', 'Disponible'),
	(8, 2323, '2018-07-28', 'Jorge Luis Borges', 'Cenicienta', 'Santillana', 'Comprado', '82-36', 'Disponible'),
	(209, 4000, '2013-04-18', 'Kevin Roberts', 'Microsoft', 'Volutpat Nulla Facilisis Consulting', '', '', 'Disponible'),
	(210, 8300, '2006-05-19', 'Graham Underwood', 'Cakewalk', 'Rutrum Urna Incorporated', '', '', 'Disponible'),
	(211, 12600, '2004-09-18', 'Vladimir Pruitt', 'Apple Systems', 'Nec Industries', '', '', 'Disponible'),
	(212, 16900, '2026-06-18', 'Carl Acosta', 'Altavista', 'Tempor Bibendum Donec PC', '', '', 'Disponible'),
	(213, 21200, '2018-05-18', 'Camden Bauer', 'Adobe', 'Donec Sollicitudin Adipiscing Limited', '', '', 'Disponible'),
	(214, 25500, '2014-10-18', 'Gary Anthony', 'Macromedia', 'At Corporation', '', '', 'Disponible'),
	(215, 29800, '2029-08-18', 'Yuli Lee', 'Borland', 'Dapibus Rutrum Justo PC', '', '', 'Disponible'),
	(216, 34100, '2005-03-19', 'Colby Booth', 'Yahoo', 'Dictum Corporation', '', '', 'Disponible'),
	(217, 38400, '2026-01-18', 'Ulysses Wynn', 'Lavasoft', 'In Hendrerit Foundation', '', '', 'Disponible'),
	(218, 42700, '2024-04-18', 'Buckminster Duran', 'Apple Systems', 'Senectus Foundation', '', '', 'Disponible'),
	(219, 47000, '2005-09-17', 'Wylie Carrillo', 'Google', 'Vestibulum Foundation', '', '', 'Disponible'),
	(220, 51300, '2002-04-18', 'Elmo Bennett', 'Yahoo', 'Netus Et Malesuada Company', '', '', 'Disponible'),
	(221, 55600, '2021-07-19', 'Linus Oneill', 'Adobe', 'Ac LLP', '', '', 'Disponible'),
	(222, 59900, '2005-09-18', 'Alan Kemp', 'Adobe', 'Lorem Ut Aliquam Institute', '', '', 'Disponible'),
	(223, 64200, '2029-04-18', 'Louis Curtis', 'Google', 'Scelerisque Sed Associates', '', '', 'Disponible'),
	(224, 68500, '2014-06-18', 'Hu Dominguez', 'Finale', 'Elit Industries', '', '', 'Disponible'),
	(225, 72800, '2019-06-19', 'Otto Leblanc', 'Sibelius', 'Ipsum Dolor Associates', '', '', 'Disponible'),
	(226, 77100, '2012-06-18', 'Drake Brennan', 'Apple Systems', 'Magna Corp.', '', '', 'Disponible'),
	(227, 81400, '2017-08-18', 'Colt Dean', 'Microsoft', 'Fermentum Consulting', '', '', 'Disponible'),
	(228, 85700, '2014-09-18', 'Bert Garrison', 'Apple Systems', 'Fringilla Institute', '', '', 'Disponible'),
	(229, 90000, '2010-12-18', 'Sebastian Yates', 'Yahoo', 'Integer Urna Vivamus Ltd', '', '', 'Disponible'),
	(230, 94300, '2003-05-19', 'Cedric Riddle', 'Lavasoft', 'At Corp.', '', '', 'Disponible'),
	(231, 98600, '2024-05-18', 'Hayes Russell', 'Lavasoft', 'Quam A Associates', '', '', 'Disponible'),
	(232, 102900, '2016-02-19', 'Lee Simon', 'Lycos', 'Phasellus Elit Foundation', '', '', 'Disponible'),
	(233, 107200, '2030-12-17', 'Walter Blackburn', 'Altavista', 'Nulla Consulting', '', '', 'Disponible'),
	(234, 111500, '2031-01-18', 'Hector Weeks', 'Lavasoft', 'Placerat Company', '', '', 'Disponible'),
	(235, 115800, '2024-12-17', 'Palmer Landry', 'Cakewalk', 'Convallis PC', '', '', 'Disponible'),
	(236, 120100, '2028-04-18', 'Jeremy Fuller', 'Lavasoft', 'Consectetuer Limited', '', '', 'Disponible'),
	(237, 124400, '2010-06-18', 'Dean Deleon', 'Borland', 'Ullamcorper Eu Foundation', '', '', 'Disponible'),
	(238, 128700, '2025-11-17', 'Addison Hawkins', 'Microsoft', 'Amet Consulting', '', '', 'Disponible'),
	(239, 133000, '2010-04-18', 'Hasad Stewart', 'Altavista', 'Et Corp.', '', '', 'Disponible'),
	(240, 137300, '2022-03-19', 'Philip Buchanan', 'Lycos', 'Quam Elementum At LLP', '', '', 'Disponible'),
	(241, 141600, '2006-12-18', 'Cole Moon', 'Lavasoft', 'Urna Nullam Associates', '', '', 'Disponible'),
	(242, 145900, '2009-03-18', 'Seth Heath', 'Yahoo', 'Lorem Fringilla Limited', '', '', 'Disponible'),
	(243, 150200, '2023-12-18', 'Francis Love', 'Lycos', 'Ipsum Primis Foundation', '', '', 'Disponible'),
	(244, 154500, '2010-10-18', 'Gareth Taylor', 'Yahoo', 'Ornare Libero LLC', '', '', 'Disponible'),
	(245, 158800, '2015-08-17', 'Lamar Guerrero', 'Finale', 'Neque Nullam Associates', '', '', 'Disponible'),
	(246, 163100, '2004-12-17', 'Carl Carney', 'Macromedia', 'Quisque Company', '', '', 'Disponible'),
	(247, 167400, '2012-11-18', 'Hedley Webster', 'Adobe', 'Aliquet Magna A LLP', '', '', 'Disponible'),
	(248, 171700, '2016-10-18', 'Kenyon Hicks', 'Altavista', 'Rutrum Eu Ultrices Foundation', '', '', 'Disponible'),
	(249, 176000, '2024-08-17', 'Trevor Mosley', 'Borland', 'Enim Incorporated', '', '', 'Disponible'),
	(250, 180300, '2005-02-19', 'Reese Fletcher', 'Chami', 'Mus Donec Dignissim Limited', '', '', 'Disponible'),
	(251, 184600, '2031-08-18', 'Leonard Hartman', 'Lavasoft', 'Mattis Associates', '', '', 'Disponible'),
	(252, 188900, '2012-05-18', 'Jarrod Powell', 'Microsoft', 'Risus Duis A Ltd', '', '', 'Disponible'),
	(253, 193200, '2016-11-17', 'Warren Brock', 'Macromedia', 'Amet Lorem Semper Industries', '', '', 'Disponible'),
	(254, 197500, '2003-12-17', 'Mark Delaney', 'Finale', 'Mattis Company', '', '', 'Disponible'),
	(255, 201800, '2018-10-17', 'Plato Barrera', 'Borland', 'Euismod Ac Associates', '', '', 'Disponible'),
	(256, 206100, '2002-12-17', 'Jakeem Wood', 'Lavasoft', 'Orci Lacus LLP', '', '', 'Disponible'),
	(257, 210400, '2025-10-18', 'Coby Hodges', 'Macromedia', 'Dapibus Company', '', '', 'Disponible'),
	(258, 214700, '2013-07-18', 'Jelani Price', 'Lavasoft', 'Non LLP', '', '', 'Disponible'),
	(259, 219000, '2014-10-17', 'Kane Horton', 'Borland', 'Mauris Rhoncus Id Corporation', '', '', 'Disponible'),
	(260, 223300, '2019-12-17', 'Vincent Oneill', 'Microsoft', 'Nisi Aenean Institute', '', '', 'Disponible'),
	(261, 227600, '2001-03-19', 'Ethan Lucas', 'Apple Systems', 'Laoreet Institute', '', '', 'Disponible'),
	(262, 231900, '2018-03-18', 'David Greene', 'Microsoft', 'Quisque LLC', '', '', 'Disponible'),
	(263, 236200, '2021-07-19', 'Simon Hodges', 'Finale', 'Congue Turpis Associates', '', '', 'Disponible'),
	(264, 240500, '2009-04-19', 'Bernard Bond', 'Altavista', 'Cum Sociis Natoque Ltd', '', '', 'Disponible'),
	(265, 244800, '2010-03-19', 'Hu Mclaughlin', 'Lycos', 'Enim Suspendisse Aliquet LLP', '', '', 'Disponible'),
	(266, 249100, '2012-06-18', 'Buckminster Lester', 'Yahoo', 'Convallis In Industries', '', '', 'Disponible'),
	(267, 253400, '2010-07-18', 'Bruno Chandler', 'Yahoo', 'Rhoncus Industries', '', '', 'Disponible'),
	(268, 257700, '2022-04-19', 'Lester Wyatt', 'Borland', 'Mollis Dui In PC', '', '', 'Disponible'),
	(269, 262000, '2009-10-18', 'Cyrus Moss', 'Finale', 'Velit Dui Associates', '', '', 'Disponible'),
	(270, 266300, '2001-10-18', 'Dean Ramsey', 'Lycos', 'Dui Consulting', '', '', 'Disponible'),
	(271, 270600, '2010-07-18', 'Matthew Dickerson', 'Adobe', 'Sem Vitae LLP', '', '', 'Disponible'),
	(272, 274900, '2010-07-19', 'Brennan Wallace', 'Finale', 'Dolor Nulla Semper Institute', '', '', 'Disponible'),
	(273, 279200, '2003-12-18', 'Jin Ball', 'Finale', 'Nam Porttitor Ltd', '', '', 'Disponible'),
	(274, 283500, '2002-05-18', 'Lewis Robbins', 'Lycos', 'Odio Institute', '', '', 'Disponible'),
	(275, 287800, '2008-06-19', 'Lee Gallagher', 'Sibelius', 'Enim Sit Amet Corp.', '', '', 'Disponible'),
	(276, 292100, '2018-03-19', 'Jarrod Gibson', 'Finale', 'Aenean Eget Inc.', '', '', 'Disponible'),
	(277, 296400, '2025-06-18', 'Elijah Sears', 'Borland', 'At Ltd', '', '', 'Disponible'),
	(278, 300700, '2015-11-17', 'Bevis Elliott', 'Finale', 'Metus Facilisis Lorem Industries', '', '', 'Disponible'),
	(279, 305000, '2027-05-19', 'Michael Shaw', 'Sibelius', 'Aliquam Tincidunt Company', '', '', 'Disponible'),
	(280, 309300, '2020-03-18', 'Barrett Frazier', 'Apple Systems', 'Nascetur Ridiculus Mus Corporation', '', '', 'Disponible'),
	(281, 313600, '2023-07-19', 'Tyler Cote', 'Altavista', 'Placerat Orci Institute', '', '', 'Disponible'),
	(282, 317900, '2030-04-19', 'Ciaran Vaughn', 'Lavasoft', 'Nam Tempor PC', '', '', 'Disponible'),
	(283, 322200, '2007-03-18', 'Devin Hutchinson', 'Lycos', 'Urna Limited', '', '', 'Disponible'),
	(284, 326500, '2012-12-17', 'Stuart Vinson', 'Chami', 'Fringilla Limited', '', '', 'Disponible'),
	(285, 330800, '2009-01-18', 'Chase Reynolds', 'Chami', 'Arcu Aliquam Consulting', '', '', 'Disponible'),
	(286, 335100, '2010-02-19', 'Flynn Buchanan', 'Sibelius', 'Lacinia Limited', '', '', 'Disponible'),
	(287, 339400, '2019-11-18', 'Akeem Jarvis', 'Sibelius', 'Lacinia Company', '', '', 'Disponible'),
	(288, 343700, '2023-08-17', 'Keefe Curry', 'Sibelius', 'Aliquam Erat Volutpat Corporation', '', '', 'Disponible'),
	(289, 348000, '2023-03-18', 'Vance Arnold', 'Chami', 'Nec Tempus Scelerisque Ltd', '', '', 'Disponible'),
	(290, 352300, '2019-09-17', 'Sean Arnold', 'Borland', 'Integer Mollis Integer LLP', '', '', 'Disponible'),
	(291, 356600, '2004-05-19', 'Lucian Fischer', 'Microsoft', 'Senectus Et PC', '', '', 'Disponible'),
	(292, 360900, '2023-01-18', 'Todd Sharpe', 'Macromedia', 'In Tempus Company', '', '', 'Disponible'),
	(293, 365200, '2019-07-18', 'Steven Miles', 'Lycos', 'Orci Sem Eget Ltd', '', '', 'Disponible'),
	(294, 369500, '2004-01-19', 'Finn Roman', 'Apple Systems', 'Ullamcorper Velit Corporation', '', '', 'Disponible'),
	(295, 373800, '2017-09-18', 'Isaiah Sanford', 'Adobe', 'Tellus Consulting', '', '', 'Disponible'),
	(296, 378100, '2018-05-18', 'Grant Nguyen', 'Apple Systems', 'Urna Limited', '', '', 'Disponible'),
	(297, 382400, '2003-04-19', 'Leo Tanner', 'Cakewalk', 'Ut Industries', '', '', 'Disponible'),
	(298, 386700, '2028-03-19', 'Kasper Carlson', 'Altavista', 'Est Limited', '', '', 'Disponible'),
	(299, 391000, '2001-11-18', 'Cyrus Vang', 'Finale', 'Diam Luctus Lobortis Institute', '', '', 'Disponible'),
	(300, 395300, '2030-07-18', 'Otto Garza', 'Borland', 'Neque Sed Dictum Incorporated', '', '', 'Disponible'),
	(301, 399600, '2021-09-18', 'Ross Justice', 'Apple Systems', 'Egestas Company', '', '', 'Disponible'),
	(302, 403900, '2023-11-18', 'Kenneth Richard', 'Lavasoft', 'Congue Elit Sed Company', '', '', 'Disponible'),
	(303, 408200, '2016-12-18', 'Octavius Pace', 'Microsoft', 'Tincidunt Neque Institute', '', '', 'Disponible'),
	(304, 412500, '2025-07-19', 'Clark Santana', 'Macromedia', 'Interdum Industries', '', '', 'Disponible'),
	(305, 416800, '2010-03-19', 'Hilel Ewing', 'Borland', 'Sapien Molestie Limited', '', '', 'Disponible'),
	(306, 421100, '2029-10-18', 'Marvin Best', 'Macromedia', 'Mauris Consulting', '', '', 'Disponible'),
	(307, 425400, '2007-06-19', 'Jasper Bond', 'Lycos', 'Neque PC', '', '', 'Disponible'),
	(308, 429700, '2001-09-17', 'Driscoll Mccormick', 'Altavista', 'Tempor Consulting', '', '', 'Disponible');
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;

-- Volcando estructura para tabla biblioteca.prestamo
DROP TABLE IF EXISTS `prestamo`;
CREATE TABLE IF NOT EXISTS `prestamo` (
  `Id_Prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Libro` int(11) NOT NULL,
  `Fecha_Prestamo` date NOT NULL,
  `Fecha_Fin_Prestamo` date NOT NULL,
  `Activo` varchar(2) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Id_Prestamo`),
  KEY `Id_Usuario` (`Id_Usuario`),
  KEY `Id_Libro` (`Id_Libro`),
  CONSTRAINT `Id_Libro` FOREIGN KEY (`Id_Libro`) REFERENCES `libro` (`Id_Libro`) ON DELETE CASCADE,
  CONSTRAINT `Id_Usuario` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Datos de prestamo';

-- Volcando datos para la tabla biblioteca.prestamo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prestamo` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=320 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Datos de los usuarios';

-- Volcando datos para la tabla biblioteca.usuario: ~102 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`Id_Usuario`, `Dni`, `Nom_Ape`, `Fec_Nac`, `Nacionalidad`, `Telefono`, `Celular`, `Domicilio`, `Domicilio_Seg`, `Email`, `Fecha_Alta`) VALUES
	(206, '31027891', 'Laura Gonzales', '2018-07-06', 'Argentina', '4233443', '', '10 E/ 65 y 66', '', '', '2018-07-06'),
	(211, '40714390', 'Jorge Lati', '2018-07-18', 'Chile', '4233443', '2215465577', '11 y 25', '4 y 66', 'jorg@hotmail.com', '2018-07-06'),
	(219, '40714396', 'Mariano Flores', '1997-10-24', 'Argentina', '4253165', '2216779983', '12 y 65', '', 'mariano@hotmail.com', '2018-08-03'),
	(220, '25957510', 'Merritt Rivers', '2031-05-19', 'Falkland Islands', '(869) 161-8928', '(299) 765-6330', '370-1181 Erat, Ctra.', '263-6921 Cras Avenida', 'cursus.Integer.mollis@FuscemollisDuis.ca', '2023-01-18'),
	(221, '38915525', 'Bruno Rutledge', '2016-03-19', 'Solomon Islands', '(756) 481-9221', '(784) 306-2246', 'Apdo.:212-874 Mi C/', '810-9410 Ligula ', 'molestie.in@nectellus.net', '2001-06-19'),
	(222, '25169964', 'Dalton Anthony', '2029-01-19', 'Aruba', '(825) 791-3039', '(882) 831-2194', '9242 Sociis Carretera', 'Apartado núm.: 853, 8833 Pretium Av.', 'lorem@Suspendisse.com', '2009-04-18'),
	(223, '49674547', 'Gannon Black', '2030-08-17', 'Peru', '(403) 602-6989', '(172) 119-7805', 'Apartado núm.: 925, 7383 Ipsum Ctra.', 'Apdo.:281-2065 Libero Avda.', 'odio.vel.est@interdumlibero.com', '2029-08-17'),
	(224, '30596707', 'Ferris Cruz', '2021-10-17', 'Aruba', '(348) 777-1988', '(692) 370-3321', '299 Justo Carretera', 'Apartado núm.: 456, 9250 Rutrum. Av.', 'vulputate@viverraDonec.co.uk', '2006-11-18'),
	(225, '47781611', 'Harlan Hendrix', '2002-08-19', 'Turkmenistan', '(390) 418-5504', '(807) 831-5667', '446-6717 Lorem C.', '3743 Et C.', 'vitae.semper@ligula.org', '2018-07-18'),
	(226, '37043502', 'Kamal Franks', '2014-03-18', 'Vanuatu', '(328) 216-4691', '(788) 444-9067', 'Apartado núm.: 587, 128 Curabitur C/', '680-8039 Lorem, Av.', 'massa.Quisque@pharetrasedhendrerit.ca', '2009-11-17'),
	(227, '23029674', 'Moses Cervantes', '2011-09-17', 'Belarus', '(206) 921-2354', '(427) 212-7337', 'Apartado núm.: 335, 1301 Ligula. Calle', 'Apdo.:331-8033 Sagittis Carretera', 'senectus.et.netus@liberoat.co.uk', '2030-06-18'),
	(228, '40661017', 'Derek Best', '2017-02-19', 'Mauritius', '(940) 783-8720', '(835) 663-9138', 'Apdo.:205-4064 Adipiscing C/', 'Apdo.:552-4832 Sem, C.', 'ante.Vivamus@tellusimperdiet.com', '2006-12-18'),
	(229, '21343847', 'Ralph Hays', '2031-01-19', 'Isle of Man', '(348) 145-6848', '(293) 384-6587', '9760 Sed C.', '486-8432 Mauris Carretera', 'aliquet@ut.com', '2001-10-18'),
	(230, '20203317', 'Mark Martin', '2003-09-18', 'Barbados', '(183) 374-7982', '(208) 672-0602', 'Apdo.:515-701 Ligula Avenida', 'Apdo.:227-5509 Eget Carretera', 'diam@pedeac.net', '2020-12-17'),
	(231, '11051959', 'Xavier Foreman', '2018-06-19', 'Barbados', '(610) 688-5699', '(520) 214-0904', '906-1204 Arcu. C/', 'Apdo.:479-8328 Magna. C.', 'Proin.sed@mollisvitaeposuere.ca', '2019-05-18'),
	(232, '20177208', 'Yasir Shaffer', '2007-01-18', 'Japan', '(992) 376-4016', '(453) 245-6101', '6560 Vestibulum Avda.', '6183 Blandit Calle', 'semper@cursus.org', '2017-01-18'),
	(233, '7789812', 'Seth Barrett', '2006-11-17', 'Belgium', '(872) 590-6402', '(119) 268-4632', 'Apdo.:766-1740 Magna, ', 'Apdo.:327-5280 Ante ', 'cursus.et@orcisem.ca', '2019-09-17'),
	(234, '40354216', 'Reese Christensen', '2006-01-19', 'Slovenia', '(341) 165-5611', '(636) 993-0820', '648-6998 Fusce Avenida', 'Apdo.:101-7686 At, Avda.', 'commodo.at.libero@inconsequat.ca', '2026-05-19'),
	(235, '30965962', 'Igor Frazier', '2022-06-18', 'New Zealand', '(469) 486-9050', '(619) 638-0643', 'Apartado núm.: 310, 5603 Nec Av.', 'Apdo.:927-539 Cursus Av.', 'mus@uterosnon.edu', '2019-04-18'),
	(236, '28550228', 'Avram Buck', '2008-04-19', 'Rwanda', '(193) 805-0490', '(269) 913-9297', '507-5988 Metus Carretera', 'Apartado núm.: 424, 9872 Eget Carretera', 'a.facilisis.non@sit.co.uk', '2008-10-17'),
	(237, '29006035', 'Solomon Hendricks', '2028-09-18', 'Saudi Arabia', '(451) 109-4532', '(199) 715-2662', 'Apdo.:251-1539 Eu Av.', '463-5237 Senectus Av.', 'massa.Mauris.vestibulum@nasceturridiculusmus.co.uk', '2008-09-17'),
	(238, '43599405', 'Judah Sellers', '2015-03-19', 'Portugal', '(602) 326-7522', '(658) 497-7547', '3979 Urna Av.', 'Apartado núm.: 926, 7935 Aliquet C/', 'aliquam.iaculis.lacus@DonecestNunc.net', '2027-09-18'),
	(239, '50328408', 'Oliver Randall', '2029-10-17', 'French Polynesia', '(822) 794-1919', '(668) 558-4559', '705-8806 Curabitur Carretera', '5661 Nam Calle', 'id@sedliberoProin.edu', '2017-08-18'),
	(240, '14244957', 'Kevin Blevins', '2010-11-17', 'Ghana', '(114) 308-7171', '(544) 491-5465', 'Apdo.:177-6028 Metus Avenida', '796-2286 Dictum Calle', 'Pellentesque.habitant.morbi@dictummagnaUt.edu', '2021-05-19'),
	(241, '20654688', 'Brent Armstrong', '2005-04-19', 'Sudan', '(553) 680-3969', '(618) 122-2800', 'Apdo.:485-9042 Suspendisse C.', 'Apartado núm.: 799, 3512 Velit. Calle', 'auctor.velit.Aliquam@sit.ca', '2011-05-18'),
	(242, '39865125', 'Amir Hardin', '2016-08-17', 'Saudi Arabia', '(200) 149-4452', '(780) 649-2035', '343-5742 Augue Calle', '8508 Sapien, ', 'eu.ultrices.sit@dictum.edu', '2001-10-18'),
	(243, '42066101', 'Elvis Guy', '2012-02-18', 'Brazil', '(644) 996-4515', '(488) 630-9872', '676-7356 Morbi C.', 'Apartado núm.: 176, 1373 Vel Calle', 'Nam.porttitor.scelerisque@mitempor.ca', '2009-08-17'),
	(244, '32369717', 'Stuart Richardson', '2021-07-18', 'Israel', '(890) 509-2902', '(106) 978-3309', '2402 Orci Ctra.', '4064 Nisi Ctra.', 'eleifend.nunc.risus@facilisisfacilisismagna.co.uk', '2014-06-18'),
	(245, '11690675', 'Dieter Nolan', '2007-10-18', 'Korea, North', '(198) 209-6703', '(396) 781-5806', 'Apartado núm.: 935, 2924 At Ctra.', '360-8840 Vel Avda.', 'velit.Sed@molestie.org', '2019-01-18'),
	(246, '46721021', 'Cain Ramirez', '2013-10-17', 'Dominican Republic', '(292) 669-6681', '(920) 847-7345', '941-6862 Lobortis Av.', 'Apartado núm.: 893, 8038 Massa Avenida', 'dignissim.pharetra.Nam@malesuada.edu', '2021-07-19'),
	(247, '23673321', 'Kasimir Mclean', '2021-06-19', 'Wallis and Futuna', '(830) 664-4763', '(485) 908-2355', 'Apdo.:969-4857 Nunc, ', '5233 At, Avda.', 'euismod@molestiein.org', '2026-01-18'),
	(248, '23558721', 'Jerry Padilla', '2015-02-19', 'Benin', '(514) 681-0953', '(170) 812-7673', 'Apartado núm.: 688, 935 Interdum Avenida', '7554 Blandit ', 'pede.ultrices.a@convallis.com', '2005-01-19'),
	(249, '12113428', 'Phelan Reeves', '2013-01-18', 'Iran', '(459) 696-9581', '(674) 485-0916', '674-5313 Amet Calle', 'Apdo.:912-5055 Sagittis Ctra.', 'dignissim@Sedidrisus.net', '2006-10-18'),
	(250, '22442557', 'Griffith Bass', '2019-06-19', 'Uzbekistan', '(289) 383-1761', '(631) 374-6194', '382-6760 Neque Avda.', 'Apdo.:984-5004 Nullam C.', 'turpis.Nulla.aliquet@nostraper.co.uk', '2024-05-19'),
	(251, '49950294', 'Zachery Lancaster', '2028-05-18', 'Macao', '(859) 983-0788', '(896) 905-1660', '2732 Aliquam Ctra.', '9334 Parturient Avda.', 'interdum.feugiat@augue.com', '2015-01-18'),
	(252, '27544612', 'Jacob Adkins', '2020-06-19', 'United States Minor Outlying Islands', '(299) 431-1076', '(846) 162-8777', '671-8148 Lorem Ctra.', '145 Purus, Calle', 'pede.Praesent.eu@Duisrisusodio.co.uk', '2013-02-18'),
	(253, '25246709', 'Cruz Conner', '2025-03-18', 'Djibouti', '(445) 969-9411', '(730) 692-3289', 'Apdo.:162-8054 Urna Ctra.', '9967 At Ctra.', 'mollis.lectus.pede@ipsum.net', '2025-11-18'),
	(254, '12017390', 'Hoyt Yates', '2026-08-17', 'Canada', '(546) 528-1045', '(722) 127-8290', '8324 Quis C.', 'Apartado núm.: 653, 1412 Convallis Avenida', 'felis.orci@sit.net', '2013-04-18'),
	(255, '43491084', 'Herrod Robertson', '2020-09-18', 'Åland Islands', '(754) 344-9328', '(953) 633-9007', '305-4781 Penatibus Avda.', 'Apartado núm.: 733, 5697 Vel, C.', 'sociosqu.ad@lectusconvallisest.net', '2002-05-18'),
	(257, '44509003', 'Richard Lane', '2025-06-18', 'South Africa', '(575) 542-4184', '(127) 389-6311', 'Apdo.:451-2285 Ac Carretera', '8015 Et, Calle', 'Donec.nibh.enim@acfacilisis.edu', '2022-07-18'),
	(258, '29740114', 'Sawyer Santos', '2018-09-17', 'Guyana', '(315) 207-6090', '(226) 218-2860', 'Apdo.:831-499 Placerat. Avda.', '6346 Eget Ctra.', 'luctus@aliquet.org', '2015-04-18'),
	(259, '5030703', 'Armand Crawford', '2011-06-18', 'New Caledonia', '(944) 448-4369', '(887) 906-0964', 'Apartado núm.: 864, 5505 Maecenas Carretera', 'Apdo.:428-1700 Odio. Avda.', 'a.aliquet@facilisiSedneque.net', '2027-01-18'),
	(260, '5842137', 'Ciaran Melendez', '2015-05-18', 'Martinique', '(830) 671-2708', '(868) 284-5087', 'Apdo.:168-505 Vulputate Ctra.', 'Apdo.:655-4024 Diam Avda.', 'purus@anteipsum.com', '2024-10-17'),
	(261, '7356169', 'Holmes Osborn', '2011-12-18', 'Malaysia', '(413) 854-8674', '(959) 115-1169', '8903 Nulla C.', 'Apartado núm.: 720, 5464 In, Av.', 'auctor.odio.a@metusIn.ca', '2019-10-18'),
	(262, '35008791', 'Holmes Love', '2003-03-18', 'Afghanistan', '(871) 924-6044', '(437) 588-7324', '4249 Tellus C/', '6805 Lorem Ctra.', 'ante.dictum@sedfacilisisvitae.com', '2017-01-18'),
	(263, '16201025', 'Palmer Ellison', '2019-01-18', 'South Sudan', '(421) 630-9885', '(381) 751-6420', 'Apartado núm.: 950, 1890 Accumsan Carretera', 'Apdo.:661-3656 At Carretera', 'sollicitudin@vel.co.uk', '2017-03-19'),
	(264, '22767748', 'Rogan Johnson', '2024-05-19', 'Palestine, State of', '(235) 633-1455', '(595) 365-3378', 'Apartado núm.: 663, 7697 Quis Av.', '4574 Hendrerit C/', 'metus@metusInlorem.ca', '2014-04-19'),
	(265, '43325929', 'Mufutau Holcomb', '2024-11-17', 'Suriname', '(811) 969-5999', '(118) 480-9372', 'Apartado núm.: 892, 5581 Lorem C/', '512-8710 At, C/', 'luctus.sit@tellusimperdietnon.org', '2021-10-17'),
	(266, '44666296', 'Eric Lancaster', '2024-07-19', 'Oman', '(210) 553-0679', '(185) 340-9861', 'Apdo.:834-593 Nunc Av.', 'Apdo.:708-7997 Fusce Av.', 'eget@tellusidnunc.org', '2013-04-19'),
	(267, '33244565', 'Griffin Morales', '2025-05-19', 'Central African Republic', '(630) 860-7756', '(306) 630-1683', 'Apdo.:794-7505 Dolor C/', '3893 Pharetra. Av.', 'eu@Donec.net', '2021-08-18'),
	(268, '19912853', 'Fletcher Hunter', '2007-09-18', 'Guam', '(876) 170-5827', '(782) 469-1821', 'Apdo.:683-9954 Blandit Avda.', 'Apdo.:409-9739 Ut, Calle', 'lorem@tinciduntcongue.co.uk', '2028-02-18'),
	(269, '41881419', 'Fritz Mcgowan', '2003-08-19', 'Israel', '(586) 430-1887', '(964) 437-4191', '9919 Ligula. Calle', 'Apartado núm.: 517, 2637 Orci Ctra.', 'id@montes.ca', '2026-07-19'),
	(270, '18877692', 'David Raymond', '2002-04-18', 'Aruba', '(156) 542-3355', '(822) 515-9957', 'Apdo.:451-2118 Egestas Calle', '484-6672 Lorem, Calle', 'Sed@elit.ca', '2020-09-17'),
	(271, '45078069', 'Brandon Flores', '2021-10-17', 'Benin', '(911) 870-5830', '(878) 531-0020', '2111 Ut C/', '451-9626 Ultrices Calle', 'amet.risus.Donec@Mauris.ca', '2028-05-19'),
	(272, '43396656', 'Sawyer Moon', '2001-08-18', 'Saint Kitts and Nevis', '(977) 501-6492', '(422) 279-5186', 'Apartado núm.: 796, 3929 Suspendisse C/', '972-8107 Elit Avenida', 'Nunc.ullamcorper.velit@ac.com', '2009-02-18'),
	(273, '49709591', 'Tyler Clayton', '2026-05-18', 'Armenia', '(811) 268-2482', '(861) 146-8634', 'Apartado núm.: 602, 6366 Pede, Ctra.', '251-5434 Eu Carretera', 'Mauris.nulla@Nam.co.uk', '2008-07-18'),
	(274, '11846871', 'Leroy Massey', '2031-07-19', 'Mali', '(471) 823-0582', '(796) 899-1002', '645 Ac C/', 'Apartado núm.: 906, 4134 Imperdiet Avda.', 'et.lacinia.vitae@Mauris.org', '2025-07-19'),
	(275, '46631478', 'Raymond Horton', '2018-03-19', 'Uruguay', '(514) 775-0505', '(113) 334-9058', '702 Consequat Calle', '296-1754 Senectus C/', 'ac@fermentumconvallis.ca', '2021-03-19'),
	(276, '18663437', 'Chester Reid', '2026-09-17', 'Tajikistan', '(221) 821-2873', '(380) 257-3132', '965-2792 Interdum. Carretera', '1928 Quis Avenida', 'ultricies.ornare.elit@sociis.net', '2027-01-19'),
	(277, '9747719', 'Logan Adkins', '2010-08-18', 'Dominican Republic', '(499) 991-3457', '(441) 607-7083', '544-1131 Parturient C/', '7656 Fusce C.', 'enim.Nunc@auctor.edu', '2010-06-19'),
	(278, '14405290', 'Grady Petersen', '2020-03-18', 'American Samoa', '(504) 530-3248', '(927) 266-6031', '250-6205 In, Carretera', 'Apartado núm.: 691, 850 Sed ', 'venenatis.lacus.Etiam@orciluctus.edu', '2021-08-17'),
	(279, '26796681', 'Cain Joyner', '2003-01-18', 'Svalbard and Jan Mayen Islands', '(132) 181-5091', '(309) 791-8045', '226-8080 Erat. Avda.', 'Apdo.:482-2925 Ut ', 'Aliquam.rutrum@sedpede.ca', '2005-05-18'),
	(280, '40559898', 'Wesley Sanders', '2019-07-19', 'Bouvet Island', '(248) 870-8188', '(332) 973-6910', '6529 Nibh Ctra.', 'Apdo.:386-8572 Mauris, C.', 'non@temporlorem.edu', '2019-01-18'),
	(281, '48142445', 'Keegan Sargent', '2029-12-18', 'Puerto Rico', '(881) 509-8984', '(319) 508-8016', 'Apdo.:342-2521 Dapibus Carretera', '149-8165 Lorem Calle', 'diam@pedePraesenteu.net', '2026-06-18'),
	(282, '14392012', 'Kennan Sanders', '2005-06-19', 'Afghanistan', '(840) 970-4330', '(202) 596-7515', 'Apdo.:595-8326 Enim, C.', 'Apdo.:598-5507 Ut ', 'porttitor.vulputate@utpharetra.net', '2002-12-17'),
	(283, '25073561', 'Griffin Duran', '2030-05-18', 'Malta', '(108) 866-4309', '(461) 389-8914', '2767 Montes, ', 'Apartado núm.: 266, 8084 Pharetra Calle', 'Sed.eu@suscipitestac.ca', '2005-03-18'),
	(284, '19977635', 'Hayes Becker', '2015-06-18', 'Nepal', '(950) 896-1510', '(965) 961-7977', 'Apdo.:178-122 Fringilla C/', 'Apartado núm.: 450, 9676 Vestibulum Avda.', 'auctor@orci.net', '2004-05-18'),
	(285, '44653306', 'Cullen Morrison', '2001-04-18', 'Saudi Arabia', '(241) 615-9872', '(735) 156-1402', 'Apdo.:917-2875 Tempus C.', 'Apartado núm.: 150, 2450 Nullam Carretera', 'vitae@molestie.com', '2009-03-19'),
	(286, '12978505', 'Trevor Preston', '2020-06-19', 'Saudi Arabia', '(641) 367-8660', '(264) 154-7727', '263-3342 Suscipit C/', '991 Nulla Avenida', 'Fusce@facilisis.org', '2020-07-19'),
	(287, '32301350', 'Jacob Dudley', '2013-02-19', 'Equatorial Guinea', '(807) 607-0826', '(622) 200-8105', 'Apartado núm.: 343, 4892 Aenean Calle', 'Apartado núm.: 234, 3119 Non, Avda.', 'ornare@Morbi.edu', '2004-08-18'),
	(288, '27044172', 'Jared Wyatt', '2021-03-19', 'Paraguay', '(521) 401-7942', '(991) 930-9467', 'Apdo.:537-6692 Urna Calle', 'Apartado núm.: 948, 950 Eget ', 'nec.tempus.mauris@dui.org', '2003-06-19'),
	(289, '14422943', 'Axel Ferguson', '2006-04-19', 'Guyana', '(934) 478-3173', '(308) 944-9856', 'Apdo.:550-1881 Orci Avda.', '8136 Nunc ', 'consectetuer.adipiscing@diamPellentesque.org', '2027-06-18'),
	(290, '15885753', 'George Bean', '2001-05-18', 'China', '(299) 992-0627', '(356) 181-2850', 'Apdo.:693-8182 Erat. C.', 'Apdo.:985-1384 Orci Av.', 'non.lacinia.at@dui.com', '2016-09-18'),
	(291, '7507100', 'Magee Jennings', '2019-12-17', 'Netherlands', '(569) 965-5222', '(629) 328-6005', 'Apartado núm.: 863, 4060 Magnis Ctra.', '966-6326 Torquent C.', 'Nunc.mauris@inceptoshymenaeosMauris.edu', '2004-09-17'),
	(292, '6594123', 'Colby Fry', '2029-01-18', 'Tonga', '(549) 791-9090', '(728) 690-9924', '327-6497 Vulputate, Avda.', '8303 Turpis. Carretera', 'eleifend.Cras@elit.net', '2026-07-19'),
	(293, '27807675', 'Bruno Townsend', '2012-04-19', 'Isle of Man', '(450) 805-9875', '(734) 672-4092', 'Apdo.:708-6937 Metus C.', '9981 Ante. Avenida', 'id.risus@nuncestmollis.org', '2006-07-18'),
	(294, '18803885', 'Gray Middleton', '2014-07-18', 'Tuvalu', '(484) 867-0945', '(286) 555-7102', 'Apdo.:333-9085 Sed Calle', 'Apartado núm.: 471, 9658 Arcu. Avda.', 'libero.est@dignissimtempor.co.uk', '2005-08-19'),
	(295, '34272580', 'Kelly Mcclain', '2003-08-18', 'Cyprus', '(280) 396-4490', '(563) 509-6866', 'Apartado núm.: 349, 9072 Pellentesque, C/', '559-8451 Tincidunt. Avda.', 'egestas.ligula.Nullam@pharetraut.ca', '2013-09-17'),
	(296, '30421169', 'Isaac Peck', '2012-05-19', 'Ecuador', '(637) 792-3877', '(955) 781-4726', 'Apdo.:100-1736 Mollis. Av.', '7572 Libero. C/', 'enim.Suspendisse.aliquet@eget.ca', '2027-05-19'),
	(297, '28171850', 'Carter York', '2017-08-18', 'Barbados', '(154) 615-2643', '(522) 384-1441', 'Apartado núm.: 861, 9749 Dui Calle', 'Apartado núm.: 386, 6249 Aenean Ctra.', 'auctor.ullamcorper@pulvinar.org', '2018-06-18'),
	(298, '40791736', 'Knox Cantrell', '2024-02-19', 'Saint Pierre and Miquelon', '(339) 331-5129', '(468) 507-5775', '867-4115 Auctor, ', '988-6888 Dictum ', 'penatibus.et@velit.co.uk', '2030-08-18'),
	(299, '24709752', 'Ahmed Alston', '2002-09-17', 'Solomon Islands', '(509) 360-7354', '(292) 936-8349', 'Apartado núm.: 616, 7371 Malesuada C/', 'Apdo.:474-2158 Nec, Avda.', 'Duis@Integereu.net', '2012-03-19'),
	(300, '7103792', 'Camden Hanson', '2013-11-18', 'Yemen', '(338) 671-2706', '(317) 356-3316', '444-5693 Mi, Ctra.', 'Apdo.:574-1014 Risus. Calle', 'lobortis.quis.pede@Donec.co.uk', '2002-04-19'),
	(301, '33112776', 'Graiden Dean', '2011-12-17', 'Gambia', '(767) 677-4761', '(310) 938-4272', 'Apdo.:475-9196 Quisque Carretera', 'Apartado núm.: 547, 3479 Ut Carretera', 'Etiam.ligula.tortor@quisarcuvel.ca', '2012-10-18'),
	(302, '31069348', 'Coby Merrill', '2019-05-18', 'Hungary', '(133) 689-4393', '(708) 376-2253', '5853 Pharetra, C.', 'Apartado núm.: 499, 7835 Suspendisse Carretera', 'mus.Proin.vel@natoque.com', '2002-05-18'),
	(303, '30320673', 'Luke Moss', '2022-02-18', 'Lesotho', '(981) 851-4156', '(907) 250-1636', 'Apartado núm.: 873, 2980 Aenean Ctra.', 'Apdo.:516-7680 Mauris C.', 'eu.arcu@nibhdolornonummy.edu', '2012-09-18'),
	(304, '18861050', 'Jasper Bonner', '2026-07-19', 'Svalbard and Jan Mayen Islands', '(798) 266-0278', '(397) 309-0098', 'Apdo.:509-3421 Mus. Av.', '1476 In Av.', 'Nulla.eu@velit.ca', '2025-03-18'),
	(305, '36289300', 'Hashim Bradshaw', '2004-11-17', 'Bahamas', '(400) 956-4640', '(492) 370-4512', '811-7978 Enim Calle', 'Apartado núm.: 910, 9568 At C/', 'ullamcorper@semmagna.com', '2005-08-18'),
	(306, '33538616', 'Vaughan Osborne', '2007-05-18', 'India', '(523) 392-7642', '(485) 283-7804', '1653 Et, ', 'Apartado núm.: 795, 2089 Dictum Calle', 'mus.Proin@fringillaornareplacerat.ca', '2004-09-18'),
	(307, '15492012', 'Alan Mayer', '2015-01-18', 'Afghanistan', '(220) 242-1208', '(626) 521-1412', '583-9273 Faucibus C.', '5716 Ultrices C/', 'Aenean.sed.pede@scelerisquelorem.co.uk', '2010-08-17'),
	(308, '5111532', 'Leroy Donovan', '2023-10-18', 'Saint Martin', '(185) 180-6056', '(642) 623-0566', 'Apdo.:330-9071 Quam. Carretera', '7870 Donec ', 'dignissim.tempor.arcu@acrisusMorbi.co.uk', '2025-06-19'),
	(309, '27010469', 'Abraham Campos', '2007-07-18', 'Bhutan', '(746) 847-8916', '(655) 545-1529', 'Apdo.:836-9418 Magna. Calle', 'Apartado núm.: 186, 7577 Ultrices C.', 'adipiscing.elit@Nullatemporaugue.com', '2008-06-18'),
	(310, '46081840', 'Gil Herring', '2030-08-17', 'Guam', '(307) 108-5065', '(890) 203-1307', 'Apdo.:987-6276 Pharetra C.', 'Apdo.:651-3505 Curabitur Av.', 'et@blandit.com', '2023-03-19'),
	(311, '17738079', 'Armand Buckley', '2024-12-17', 'Poland', '(156) 370-9013', '(321) 665-2273', '646 Adipiscing Av.', 'Apdo.:939-3737 Sed, Avda.', 'dolor.Quisque@turpisegestasAliquam.co.uk', '2009-07-18'),
	(312, '22183408', 'Ralph Compton', '2005-01-19', 'Mali', '(883) 703-0833', '(923) 144-7275', '414-4271 Nunc Calle', 'Apdo.:792-2607 Enim. Ctra.', 'imperdiet@Curabiturvellectus.co.uk', '2005-09-17'),
	(313, '10747267', 'Austin Dennis', '2021-10-18', 'Burundi', '(660) 437-1717', '(599) 249-1458', 'Apartado núm.: 496, 4631 Dictum Avenida', '372-448 Congue. Av.', 'placerat.velit@faucibusorci.edu', '2021-04-19'),
	(314, '28738104', 'Jermaine Carrillo', '2018-11-18', 'Oman', '(817) 505-5044', '(258) 117-1015', '215-6128 Aenean Carretera', 'Apdo.:377-9937 Fermentum ', 'ultrices.Duis.volutpat@netuset.co.uk', '2023-07-18'),
	(315, '45053414', 'Coby Moss', '2008-04-19', 'Iraq', '(420) 939-9126', '(244) 389-2503', 'Apartado núm.: 123, 4893 Dapibus Calle', 'Apdo.:354-9317 Nec, Ctra.', 'elit@egetlaoreet.co.uk', '2024-11-18'),
	(316, '33353559', 'Brock Terry', '2018-12-18', 'Barbados', '(153) 843-9200', '(188) 248-6959', '927-2246 Lorem. Avenida', '5483 Aliquet C/', 'varius.Nam.porttitor@nisl.com', '2014-05-19'),
	(317, '33616235', 'Owen Montgomery', '2019-12-17', 'Eritrea', '(584) 899-7425', '(747) 808-6980', 'Apdo.:169-5796 Lectus C.', '995-3144 Neque ', 'dolor.sit@sociisnatoque.net', '2019-12-17'),
	(318, '11138580', 'Perry Wyatt', '2026-08-18', 'Pakistan', '(248) 950-7844', '(992) 588-4638', '345-755 Sit C/', '136-6751 Consectetuer Avda.', 'scelerisque.neque@etmagnis.com', '2011-03-18'),
	(319, '9300037', 'Kato Mooney', '2028-07-18', 'Svalbard and Jan Mayen Islands', '(198) 194-2209', '(764) 969-6277', '8870 At ', 'Apdo.:954-4529 Faucibus Carretera', 'vel@faucibusorciluctus.org', '2011-03-18');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
