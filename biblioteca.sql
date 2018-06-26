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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Datos de las cuentas de acceso';

-- Volcando datos para la tabla biblioteca.cuenta: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` (`Id_Cuenta`, `Dni`, `Nom_Ape`, `Tipo`, `Email`, `Clave`) VALUES
	(1, '40714396', 'Mariano Flores', 'Admin', 'mariano2@hotmail.com', 'admin'),
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
  `Celular` varchar(20) COLLATE utf8_bin DEFAULT 'No tiene',
  `Domicilio` varchar(100) COLLATE utf8_bin NOT NULL,
  `Domicilio_Seg` varchar(100) COLLATE utf8_bin DEFAULT 'No tiene',
  `Email` varchar(100) COLLATE utf8_bin DEFAULT 'No tiene',
  `Fecha_Alta` date NOT NULL,
  PRIMARY KEY (`Id_Usuario`),
  KEY `Dni` (`Dni`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Datos de los usuarios';

-- Volcando datos para la tabla biblioteca.usuario: ~101 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`Id_Usuario`, `Dni`, `Nom_Ape`, `Fec_Nac`, `Nacionalidad`, `Telefono`, `Celular`, `Domicilio`, `Domicilio_Seg`, `Email`, `Fecha_Alta`) VALUES
	(1, '40714396', 'Mariano Flores', '1997-10-24', 'Argentina', '4253165', '2216779986', '120 y 65', '17 y 65', 'Mariano@gmail.com', '2018-06-22'),
	(102, '42821031', 'Haley, John U.', '2017-10-05', 'Puerto Rico', '1675052834599', '1629091105699', 'Apdo.:257-8250 Nisl. Av.', '644-5550 Phasellus Carretera', 'leo.in@Phasellus.org', '2018-01-06'),
	(103, '47831127', 'Vargas, Jesse A.', '2019-01-27', 'Samoa', '1631061548399', '1637030328899', '9899 Sed Avda.', 'Apartado núm.: 589, 1716 Pede, ', 'euismod@utpellentesque.ca', '2018-07-26'),
	(104, '40113883', 'Serrano, Driscoll E.', '2018-06-21', 'Guinea-Bissau', '1684042019999', '1690070386799', 'Apartado núm.: 156, 9415 Auctor, Av.', '303 Elit ', 'Nunc.ut@quisturpisvitae.edu', '2018-06-13'),
	(105, '50722402', 'Russo, Gail M.', '2018-11-02', 'Singapore', '1668072546499', '1611082083599', 'Apdo.:971-1170 Enim Carretera', 'Apdo.:165-7253 Nam C.', 'erat.vitae@nullaatsem.edu', '2017-06-24'),
	(106, '21843523', 'Gray, Hedy V.', '2018-11-30', 'Portugal', '1631011058899', '1639082615099', 'Apartado núm.: 776, 4611 Ultrices Avenida', '1676 Scelerisque Calle', 'dignissim.tempor.arcu@purusNullamscelerisque.co.uk', '2017-09-01'),
	(107, '19495637', 'Good, Ignatius W.', '2018-09-30', 'Mozambique', '1662081834499', '1641022386699', '6771 Orci Avenida', 'Apdo.:118-5346 Arcu. Av.', 'risus@massaMaurisvestibulum.edu', '2018-12-04'),
	(108, '49645144', 'Mcneil, Hadassah K.', '2019-06-04', 'Poland', '1618092082299', '1649112491799', 'Apdo.:555-6655 Dignissim Avda.', '2429 In ', 'iaculis.aliquet@lacinia.net', '2018-10-09'),
	(109, '28290612', 'Browning, Cyrus J.', '2018-05-03', 'Slovakia', '1602021339699', '1682040353099', 'Apartado núm.: 316, 9828 Scelerisque Calle', '6275 Lobortis Ctra.', 'magna.Nam@Proinvelnisl.ca', '2017-12-29'),
	(110, '16005120', 'Cameron, Amethyst M.', '2018-10-12', 'Costa Rica', '1685111779899', '1664060553299', '9484 Placerat, Avenida', 'Apdo.:797-611 Metus. Av.', 'sit.amet.consectetuer@Aenean.net', '2019-04-08'),
	(111, '44154975', 'Noble, Kelsey V.', '2018-12-18', 'Namibia', '1656062707699', '1666101095999', '4204 Porta Calle', 'Apdo.:572-4265 Proin Ctra.', 'sem@eleifendnuncrisus.net', '2017-10-23'),
	(112, '35479408', 'Lawson, Karly R.', '2018-02-28', 'Congo (Brazzaville)', '1656052867799', '1695080220199', '793-8539 Sit Ctra.', 'Apartado núm.: 631, 3568 Nullam Avda.', 'vitae.orci.Phasellus@ridiculusmusProin.ca', '2019-03-12'),
	(113, '50046209', 'Cline, Amelia Y.', '2017-06-27', 'Kenya', '1634012451299', '1689012558299', 'Apartado núm.: 373, 3385 Malesuada ', 'Apdo.:708-4693 In, Carretera', 'Integer@Fusce.co.uk', '2017-07-30'),
	(114, '26136988', 'Mccullough, Mark O.', '2018-03-11', 'Ethiopia', '1619051133999', '1605012883399', 'Apdo.:495-4010 Donec Ctra.', '380-270 Tempor Avda.', 'non.massa.non@fermentumarcu.net', '2019-02-25'),
	(115, '36354113', 'Rocha, Porter I.', '2018-01-23', 'Macao', '1664052564999', '1690041689699', 'Apdo.:578-6938 Massa Calle', 'Apdo.:786-7043 Sem ', 'enim@feugiat.co.uk', '2017-10-18'),
	(116, '37507853', 'Nguyen, Axel T.', '2017-11-23', 'Mauritius', '1640090202799', '1665111151599', 'Apdo.:635-6203 Risus Avda.', '8426 Suscipit Carretera', 'Aenean.sed.pede@fames.com', '2018-05-16'),
	(117, '28193497', 'Terry, Camden W.', '2018-01-06', 'New Zealand', '1614010438599', '1657071651299', '3403 Ultrices Ctra.', '5732 Enim Avenida', 'odio.a@enim.ca', '2018-10-06'),
	(118, '21861550', 'Chen, Paul Z.', '2017-10-20', 'Iraq', '1671050421899', '1691060936399', 'Apdo.:483-6278 Sit Carretera', '258-2230 Interdum. C/', 'consectetuer@quislectusNullam.co.uk', '2018-01-30'),
	(119, '31262278', 'Morrison, Curran J.', '2018-10-20', 'Ukraine', '1628011553499', '1637082989899', '448-7868 Dolor. C.', 'Apartado núm.: 288, 2927 Pellentesque C/', 'non.magna@Pellentesquetincidunt.edu', '2017-09-05'),
	(120, '22215962', 'Contreras, Denton R.', '2018-08-20', 'Uruguay', '1632020935599', '1648012311999', '7888 Aliquam, Av.', '809-1772 Mattis. Avda.', 'sagittis.felis.Donec@Proin.edu', '2018-10-20'),
	(121, '44542511', 'Downs, Alisa M.', '2017-12-26', 'Palestine, State of', '1666112252599', '1642082004599', '252-8982 Auctor ', '836 Donec Calle', 'venenatis.a.magna@elitfermentum.com', '2018-07-09'),
	(122, '48682644', 'Cooper, Ora O.', '2019-03-14', 'Kyrgyzstan', '1652040594799', '1608091840699', 'Apartado núm.: 736, 9097 Duis C.', '994-2583 Feugiat. Avda.', 'dolor.Fusce.feugiat@mauris.co.uk', '2018-09-06'),
	(123, '48994728', 'Dickerson, Zenaida K.', '2018-08-04', 'Slovenia', '1639120795099', '1693031296799', 'Apdo.:353-374 In Avenida', 'Apartado núm.: 907, 3248 Cursus Av.', 'orci@liberoProinsed.com', '2019-01-02'),
	(124, '35456942', 'Livingston, Cameron P.', '2018-06-16', 'Cook Islands', '1626111713199', '1624042759299', 'Apdo.:764-113 Sociis Avda.', '822-3433 Auctor C/', 'ac@consectetueradipiscingelit.net', '2017-09-29'),
	(125, '32341726', 'Grimes, Charity M.', '2017-09-29', 'Cayman Islands', '1674012640099', '1666052532399', 'Apdo.:307-5464 Quis Carretera', '2513 Duis Calle', 'sollicitudin.commodo@tristique.co.uk', '2018-06-17'),
	(126, '37608092', 'Silva, Pascale M.', '2019-03-15', 'Tanzania', '1615082518299', '1643061146999', 'Apdo.:575-3042 Purus Av.', '9786 Non, Av.', 'vulputate.posuere.vulputate@id.ca', '2017-12-02'),
	(127, '32158366', 'Dominguez, Jasper O.', '2018-05-12', 'South Africa', '1656062925299', '1651030387599', 'Apartado núm.: 288, 3260 Mus. C/', '530-1905 Ut, Av.', 'Fusce@elitdictumeu.edu', '2018-04-18'),
	(128, '24203564', 'Simon, Keiko C.', '2017-07-01', 'Laos', '1698012514499', '1613080445299', '183-2610 Est C/', '723-9013 Arcu. Calle', 'nonummy.ipsum@Nullaegetmetus.org', '2018-04-06'),
	(129, '13484573', 'Nielsen, Jamal I.', '2018-09-29', 'Virgin Islands, United States', '1640080313799', '1660120885299', '552-7480 Duis C/', '5173 Nascetur C/', 'blandit.Nam@arcuCurabitur.org', '2019-01-08'),
	(130, '31919167', 'Pope, Malik R.', '2018-11-11', 'India', '1619091020799', '1638012240699', '330-6045 Integer Ctra.', 'Apdo.:550-6248 Maecenas Calle', 'hendrerit.consectetuer@magna.ca', '2017-09-16'),
	(131, '16924612', 'Clay, Clayton H.', '2017-12-20', 'Turks and Caicos Islands', '1647011610499', '1656070903499', '627-8921 Augue. Calle', 'Apartado núm.: 645, 3311 At Avenida', 'metus@euturpis.co.uk', '2018-12-13'),
	(132, '43305073', 'Tucker, Kiona K.', '2017-12-22', 'French Southern Territories', '1658031560599', '1660081316899', '284-1350 Tortor, Avda.', '656-8237 Mus. ', 'Cras.pellentesque.Sed@primisin.org', '2018-03-20'),
	(133, '36480805', 'Sanders, Gannon R.', '2019-03-31', 'Malta', '1650090247199', '1689122151699', 'Apartado núm.: 350, 7459 Accumsan ', '563-3322 Sed C.', 'amet.lorem.semper@Sedcongue.edu', '2017-09-06'),
	(134, '15945359', 'Andrews, Ayanna C.', '2019-04-25', 'Iraq', '1674043086599', '1679101378999', 'Apartado núm.: 571, 1461 Est, Avda.', 'Apdo.:287-3282 Facilisis Avenida', 'Quisque.ornare.tortor@Etiam.co.uk', '2017-12-11'),
	(135, '46730417', 'Rogers, Ria S.', '2017-12-18', 'Lesotho', '1612062889899', '1643080471399', 'Apartado núm.: 641, 5524 Erat, Av.', 'Apartado núm.: 322, 7346 Nonummy Avda.', 'Nam.nulla.magna@facilisis.ca', '2019-03-09'),
	(136, '45625873', 'Bentley, Kelsie Q.', '2018-12-31', 'Nigeria', '1620112177599', '1654020759099', '700-3506 Magna. Avda.', 'Apartado núm.: 446, 6268 Interdum C/', 'ornare.egestas.ligula@euodio.com', '2018-07-30'),
	(137, '49821307', 'Hester, Alika X.', '2018-09-07', 'Lebanon', '1628111026799', '1611042244499', '7196 Nonummy Carretera', '5177 Libero Calle', 'in.tempus.eu@Phasellusin.ca', '2019-05-08'),
	(138, '18607024', 'Benton, Vladimir G.', '2018-05-26', 'Côte D\'Ivoire (Ivory Coast)', '1660071988199', '1658031288499', '2143 Erat Carretera', '139-7814 Elit ', 'ornare@arcuVestibulum.org', '2019-01-27'),
	(139, '37884192', 'Langley, Grady Q.', '2018-10-27', 'Romania', '1657040433299', '1611010428599', 'Apdo.:484-3047 Nunc Carretera', 'Apdo.:305-4912 Tincidunt C.', 'mollis.lectus.pede@luctusfelispurus.co.uk', '2017-07-29'),
	(140, '5828540', 'Knight, Chandler A.', '2018-03-25', 'Botswana', '1678052376699', '1615110338599', '392 Neque C/', '5849 Accumsan Ctra.', 'varius.ultrices@adipiscing.ca', '2017-08-21'),
	(141, '42369529', 'Witt, Cadman X.', '2017-12-19', 'Togo', '1678061362399', '1692081514499', 'Apartado núm.: 407, 4436 Blandit Av.', 'Apartado núm.: 838, 8422 Id, Avenida', 'vestibulum.massa@elitsedconsequat.edu', '2017-10-18'),
	(142, '32188445', 'Foreman, Neil P.', '2017-10-11', 'Tokelau', '1635090293199', '1683112123699', 'Apdo.:258-4534 Semper, C/', '2509 Mollis Calle', 'ac@ullamcorpernisl.net', '2018-04-03'),
	(143, '46128995', 'Frank, Cooper L.', '2018-06-07', 'New Caledonia', '1640112759199', '1629100327599', '606-7398 Conubia Carretera', 'Apdo.:972-1607 Curae; Calle', 'lacinia.orci@faucibusleo.edu', '2019-04-02'),
	(144, '9804691', 'Preston, Kyla Y.', '2018-10-09', 'Vanuatu', '1630100427899', '1670011729599', '707-5683 Eu Av.', '122-9942 Libero. Avenida', 'dolor.dapibus@Cras.ca', '2019-04-05'),
	(145, '43530038', 'Roberts, Deborah T.', '2018-11-16', 'Aruba', '1696020455399', '1663102909699', '7588 Purus Calle', 'Apdo.:185-5293 Eget, C/', 'Suspendisse@Praesentinterdum.edu', '2018-07-16'),
	(146, '43439616', 'Sears, Hu G.', '2018-05-21', 'Ghana', '1657081694999', '1688102137499', 'Apartado núm.: 703, 6842 Sed ', 'Apartado núm.: 852, 2535 Volutpat C.', 'mi@elit.com', '2017-09-28'),
	(147, '43475756', 'Sheppard, Mari G.', '2018-06-15', 'Norway', '1622071562499', '1666042819299', '891-3971 Nulla ', '417-2947 Libero. Calle', 'Nunc@cursuspurusNullam.ca', '2019-05-31'),
	(148, '5597570', 'Phillips, Kibo A.', '2019-03-04', 'Brunei', '1653101014799', '1667010628899', 'Apartado núm.: 880, 376 Ligula. Ctra.', 'Apdo.:131-9860 Aliquam C/', 'lectus.a.sollicitudin@augueid.co.uk', '2018-12-09'),
	(149, '37004971', 'Newman, Leandra W.', '2017-10-20', 'Gibraltar', '1667120454999', '1683022094499', 'Apartado núm.: 121, 623 Taciti Avenida', '945-7879 Etiam ', 'purus@odioAliquamvulputate.ca', '2019-04-07'),
	(150, '17683538', 'Bright, Jarrod W.', '2017-08-03', 'Liechtenstein', '1601021382099', '1674120459399', '915-4777 Ornare. Avda.', 'Apartado núm.: 958, 7383 Maecenas C.', 'eu.dolor.egestas@est.com', '2018-05-22'),
	(151, '34722001', 'Diaz, Xaviera Z.', '2018-07-28', 'Papua New Guinea', '1650120793399', '1633021790099', '679-240 Quam Ctra.', 'Apartado núm.: 154, 8548 Erat. Carretera', 'lectus.pede.ultrices@odio.net', '2019-05-31'),
	(152, '32873164', 'Ferrell, Melyssa Q.', '2018-12-30', 'Germany', '1663052835799', '1655100228899', '1713 Magna, ', '227-3580 Maecenas ', 'eget.tincidunt.dui@Integeraliquamadipiscing.org', '2017-12-25'),
	(153, '27538217', 'Horne, Macy H.', '2017-12-30', 'Puerto Rico', '1662082416799', '1689061341299', 'Apdo.:578-4264 Est. C.', '342-4206 Donec C.', 'Ut@magnaDuisdignissim.co.uk', '2018-02-12'),
	(154, '49213865', 'Spears, Allegra I.', '2017-07-21', 'Saint Martin', '1680021003099', '1665030883699', 'Apartado núm.: 165, 2523 Vulputate ', '854-2056 Lectus C/', 'Proin.vel.nisl@Curabitur.org', '2019-05-04'),
	(155, '46089525', 'Sullivan, Ava K.', '2017-11-07', 'Zambia', '1625031164999', '1692050505399', '447-6129 Phasellus Av.', 'Apartado núm.: 918, 7683 Morbi C.', 'non.justo.Proin@etmagnis.net', '2018-02-02'),
	(156, '38574091', 'Webb, Olympia Q.', '2017-12-05', 'Panama', '1674080958999', '1663090974099', 'Apartado núm.: 410, 5570 Elit, C.', 'Apartado núm.: 206, 2961 Suspendisse C.', 'eros.Nam@odiosagittissemper.org', '2017-09-13'),
	(157, '20034203', 'Jordan, Savannah M.', '2018-08-29', 'Venezuela', '1666100692299', '1611021116199', 'Apdo.:687-5430 Duis Calle', '7060 Purus Avenida', 'rutrum.non.hendrerit@orciPhasellus.net', '2019-06-11'),
	(158, '16480332', 'Mack, Craig D.', '2019-01-18', 'Indonesia', '1644020814599', '1628082872299', '279-1873 Turpis Av.', 'Apdo.:567-9072 Et Ctra.', 'imperdiet.non@eutellus.edu', '2018-05-27'),
	(159, '5664087', 'Mcdowell, Edward V.', '2018-07-02', 'Mauritania', '1612011362199', '1604081943199', 'Apartado núm.: 811, 7634 Aenean ', 'Apartado núm.: 577, 9244 Urna C.', 'litora.torquent@lectusNullamsuscipit.com', '2018-03-18'),
	(160, '8010266', 'Buckley, Phyllis O.', '2018-06-28', 'Guadeloupe', '1665022243299', '1686072043499', 'Apdo.:883-6198 Vestibulum C.', 'Apdo.:389-7133 Felis. Ctra.', 'viverra@odioAliquam.net', '2018-10-26'),
	(161, '24992066', 'Moon, Amir Y.', '2018-12-27', 'Mongolia', '1693111423299', '1620021051899', 'Apdo.:217-3361 Et Avda.', 'Apdo.:924-6461 Pellentesque. Avenida', 'et.ipsum@variusNam.com', '2018-07-16'),
	(162, '21273166', 'Carlson, TaShya L.', '2017-07-15', 'Sint Maarten', '1601011403299', '1661081508499', 'Apdo.:578-3334 Elementum C.', 'Apdo.:579-4772 Massa Av.', 'Quisque@lacus.ca', '2018-01-20'),
	(163, '7515142', 'Hendrix, Melodie C.', '2017-07-10', 'Senegal', '1625052154599', '1679090499999', '833-8034 Volutpat. Av.', '725-1849 Nec, Av.', 'odio.Phasellus@Seddictum.com', '2018-02-11'),
	(164, '28542206', 'Erickson, Porter H.', '2018-04-27', 'Iraq', '1617110120799', '1663081780999', '958-370 Neque Avda.', 'Apartado núm.: 387, 3586 Imperdiet Avda.', 'Phasellus.ornare@vestibulum.co.uk', '2018-07-31'),
	(165, '29495001', 'Holman, Louis L.', '2018-11-26', 'Czech Republic', '1671032786699', '1682062655099', 'Apartado núm.: 122, 8866 Convallis C/', '610-8926 Vitae, C/', 'Aliquam@Donec.com', '2017-11-05'),
	(166, '29679555', 'Pope, Joelle D.', '2018-08-21', 'Aruba', '1670040141799', '1643040352699', '9563 Commodo Carretera', '8071 Nascetur Av.', 'tempus.lorem.fringilla@Crasdolordolor.ca', '2017-09-30'),
	(167, '11254593', 'Sweet, Phillip G.', '2018-07-15', 'United Arab Emirates', '1653042274099', '1672051830699', '452-3578 Sit ', 'Apartado núm.: 259, 8986 Gravida. Ctra.', 'nibh@Crasdolordolor.ca', '2018-10-06'),
	(168, '45130962', 'Shepard, Regan G.', '2018-08-11', 'Cocos (Keeling) Islands', '1632082765599', '1669101762299', '9431 Donec Av.', '381-7918 Nullam C/', 'feugiat.Lorem.ipsum@fringillaeuismod.com', '2019-01-07'),
	(169, '9244333', 'Jackson, Meghan P.', '2017-09-30', 'Georgia', '1604032919599', '1648042326299', 'Apdo.:188-6159 Nec Calle', 'Apdo.:955-7304 Metus Calle', 'libero.et@ac.ca', '2018-09-30'),
	(170, '16769807', 'Pacheco, Yetta L.', '2017-07-08', 'Åland Islands', '1632030644399', '1611102922399', 'Apdo.:822-9315 Tempor Ctra.', 'Apartado núm.: 579, 1174 Pede. Ctra.', 'In@molestiesodales.co.uk', '2018-12-10'),
	(171, '15511123', 'Wilkinson, Kendall A.', '2017-07-09', 'Saint Barthélemy', '1621011237799', '1687011917599', 'Apdo.:608-5515 Tempor C.', '7714 Proin Ctra.', 'Sed@velitCras.org', '2019-05-20'),
	(172, '30300382', 'Moss, Amelia W.', '2017-10-29', 'Peru', '1624111319699', '1640012864199', '778-2574 Sed Avenida', 'Apdo.:859-3613 Et, Avenida', 'lacus.Nulla.tincidunt@Vivamus.net', '2018-07-29'),
	(173, '17740349', 'Pate, Sierra E.', '2018-11-05', 'Antarctica', '1657071904499', '1694102530199', 'Apartado núm.: 230, 3045 Sapien. Calle', 'Apartado núm.: 825, 9571 A, C/', 'egestas.hendrerit.neque@imperdiet.edu', '2018-04-15'),
	(174, '20007264', 'Gentry, Ali D.', '2018-01-25', 'Chad', '1675012456299', '1677082640299', '200-4007 Mi Avda.', 'Apdo.:330-4894 Quisque Calle', 'egestas@anequeNullam.org', '2018-07-18'),
	(175, '26920260', 'Miles, Ferris J.', '2018-02-27', 'Spain', '1665101938599', '1661052173599', 'Apartado núm.: 334, 9298 Ipsum. Av.', '244-5215 Ligula. Avenida', 'nec@luctus.co.uk', '2018-01-06'),
	(176, '22297903', 'Velasquez, Calista U.', '2018-05-18', 'Chad', '1606010215799', '1682072433299', 'Apartado núm.: 395, 751 Mattis C/', 'Apartado núm.: 886, 404 Gravida ', 'magna@Nulla.co.uk', '2019-04-24'),
	(177, '12615112', 'Dorsey, Inga K.', '2018-07-03', 'Dominican Republic', '1672121655499', '1607020461499', 'Apartado núm.: 986, 2583 Nam Calle', '8480 Lobortis C/', 'a.feugiat@suscipit.net', '2017-11-03'),
	(178, '42025887', 'Ochoa, Phoebe S.', '2018-01-13', 'Guinea', '1663110650199', '1640030847499', '994-1541 Auctor Calle', 'Apartado núm.: 241, 3898 Vitae Ctra.', 'rhoncus@elitpharetraut.co.uk', '2018-01-15'),
	(179, '13711528', 'Smith, Wanda C.', '2017-07-13', 'Malawi', '1604082531599', '1643112443499', 'Apartado núm.: 376, 5222 Penatibus Avenida', '7268 Sollicitudin C.', 'commodo.at.libero@Curabitur.co.uk', '2018-09-15'),
	(180, '19024275', 'Bryan, Theodore D.', '2018-10-03', 'Egypt', '1662050830199', '1685022947399', '559-4887 Et Calle', 'Apartado núm.: 980, 4099 Pellentesque Calle', 'eleifend@elit.org', '2017-07-02'),
	(181, '32953153', 'Gomez, Helen P.', '2018-08-11', 'Panama', '1681092207799', '1694101521199', 'Apartado núm.: 802, 8236 Tincidunt, Carretera', 'Apdo.:158-1591 Ligula. Calle', 'gravida.sit.amet@pharetrafelis.ca', '2019-05-29'),
	(182, '25820871', 'Morris, Kiayada W.', '2017-11-20', 'Gambia', '1619083033099', '1637061050299', '991 Aliquet. Carretera', 'Apartado núm.: 137, 6627 Ut Carretera', 'porttitor.vulputate.posuere@adipiscingMauris.com', '2018-06-06'),
	(183, '11546881', 'Mclean, Priscilla W.', '2017-08-24', 'Israel', '1617110755599', '1626121977799', '693-965 Ante. Av.', 'Apartado núm.: 152, 3838 Sociis Av.', 'vehicula.risus.Nulla@ipsumac.ca', '2017-09-16'),
	(184, '43062161', 'Gallagher, Madonna H.', '2018-06-08', 'South Sudan', '1630091813499', '1651040407299', 'Apartado núm.: 805, 9662 Vulputate, C/', 'Apdo.:864-5386 Risus. Avda.', 'enim@Curabitursedtortor.ca', '2018-07-22'),
	(185, '48509804', 'Wood, Cailin P.', '2017-09-24', 'Serbia', '1694070254799', '1684092150999', '782 Libero. Avda.', '9580 Eleifend Av.', 'Proin.dolor@vitaepurus.co.uk', '2018-06-19'),
	(186, '12367292', 'Mcmahon, Levi N.', '2017-11-08', 'Azerbaijan', '1699070142699', '1630121388999', 'Apdo.:512-9897 Neque C/', 'Apdo.:910-3514 Sollicitudin Avenida', 'inceptos.hymenaeos.Mauris@idsapienCras.org', '2018-08-24'),
	(187, '40746058', 'Norton, Lee V.', '2018-10-19', 'French Southern Territories', '1607052759199', '1672022235799', '432-218 A, Avenida', 'Apdo.:939-7167 Pede, Avenida', 'nec@anteNunc.co.uk', '2018-09-17'),
	(188, '14408464', 'Guy, Amanda J.', '2017-10-20', 'Greenland', '1632022103599', '1635010844899', '984-6097 Nunc. Carretera', '7399 Curabitur C.', 'Vestibulum@euenimEtiam.edu', '2019-06-18'),
	(189, '50187339', 'Jacobson, Carlos D.', '2018-04-30', 'El Salvador', '1614102560999', '1667070939599', '988-8474 Rutrum Calle', 'Apdo.:393-1883 Fusce ', 'luctus@a.edu', '2018-10-07'),
	(190, '46918214', 'Juarez, Fallon Z.', '2017-06-27', 'Malaysia', '1629042795699', '1634111461099', 'Apdo.:498-5548 Pharetra ', 'Apdo.:434-205 Aliquet Ctra.', 'Quisque.ornare.tortor@sed.org', '2018-09-05'),
	(191, '34057655', 'Martinez, Lacey G.', '2019-02-26', 'Montenegro', '1660080344399', '1631041883799', '1843 In Carretera', '8379 Iaculis Avda.', 'parturient.montes.nascetur@orcilobortisaugue.net', '2017-11-05'),
	(192, '27757088', 'Kerr, Kibo G.', '2018-07-26', 'Bahrain', '1676062036899', '1626062825199', '523-5160 Ante. Ctra.', 'Apartado núm.: 116, 679 Ac C/', 'Donec@egestasurna.edu', '2017-07-01'),
	(193, '21036035', 'Brennan, Idona I.', '2017-07-04', 'Jamaica', '1645060475999', '1690012164799', 'Apdo.:804-8952 Augue Avenida', 'Apartado núm.: 650, 7495 Duis Av.', 'vel@quamafelis.net', '2018-08-11'),
	(194, '27857774', 'Dickerson, Chadwick B.', '2019-02-08', 'Montserrat', '1640090520299', '1691122711699', '151-7521 Condimentum. ', '6565 Praesent ', 'viverra.Maecenas.iaculis@Mauris.org', '2019-05-29'),
	(195, '39951294', 'Malone, Jeanette V.', '2018-10-09', 'Barbados', '1617010799299', '1643032181199', '501-7952 Nisi Avenida', '657-3498 Aenean Av.', 'lobortis.risus.In@arcuVestibulum.co.uk', '2019-04-02'),
	(196, '24906074', 'Burnett, Clarke E.', '2019-05-21', 'Micronesia', '1660110804299', '1677031902199', 'Apdo.:355-8215 Commodo Calle', '631-960 Dictum. ', 'Donec.feugiat@velit.edu', '2017-10-20'),
	(197, '28960927', 'Pugh, Simone Q.', '2018-01-24', 'Denmark', '1601052876799', '1631102010699', 'Apartado núm.: 924, 2906 Nullam Avda.', 'Apdo.:519-4981 Turpis Av.', 'dui.Cum@etmalesuadafames.edu', '2018-11-05'),
	(198, '43065413', 'Roach, Dalton M.', '2018-09-18', 'Israel', '1609122285899', '1632101393199', 'Apdo.:924-4984 Facilisi. Carretera', 'Apartado núm.: 715, 4387 Est, Av.', 'nisi.sem@vel.org', '2017-11-08'),
	(199, '15644838', 'Franklin, Harrison S.', '2018-11-02', 'Gambia', '1679030178799', '1601060999099', '8574 Etiam Ctra.', '448-6464 Eu Av.', 'natoque@cursus.org', '2019-05-15'),
	(200, '22419529', 'Maynard, Rylee K.', '2018-10-21', 'French Southern Territories', '1655072416899', '1601112648099', 'Apdo.:794-1328 Donec C.', '855-535 Elit. Carretera', 'elit.fermentum.risus@nonummyFuscefermentum.org', '2017-12-14'),
	(201, '45399006', 'Boyer, Dante Q.', '2018-05-21', 'Macedonia', '1663091372899', '1620040398199', '953-952 Elit Calle', '308 Magna. C.', 'ac.turpis.egestas@nequeNullamnisl.edu', '2018-08-15');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
