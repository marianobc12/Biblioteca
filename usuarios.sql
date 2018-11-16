-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.17 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para biblioteca
CREATE DATABASE IF NOT EXISTS `biblioteca` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `biblioteca`;

-- Volcando estructura para tabla biblioteca.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Dni` char(8) CHARACTER SET utf8 NOT NULL,
  `Nom_Ape` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Fec_Nac` date NOT NULL,
  `Nacionalidad` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Telefono` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Celular` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `Domicilio` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Domicilio_Seg` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Fecha_Alta` date NOT NULL,
  PRIMARY KEY (`Id_Usuario`),
  UNIQUE KEY `Dni` (`Dni`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Datos de los usuarios';

-- Volcando datos para la tabla biblioteca.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`Id_Usuario`, `Dni`, `Nom_Ape`, `Fec_Nac`, `Nacionalidad`, `Telefono`, `Celular`, `Domicilio`, `Domicilio_Seg`, `Email`, `Fecha_Alta`) VALUES
	(1, '22630340', 'Gervasi, Sandra Elizabeth', '0272-12-11', 'Argentina', '2215754887', '', '3 N° 1311', 'Lola , Bojanovich ( Destreza)', '', '2018-09-15'),
	(2, '29084738', 'Sadousky, Débora', '0081-12-17', 'Argentina', '221- 6610835', '', '9 N° 634 5° B', 'Margarita ( Destreza )', '', '2018-09-15'),
	(3, '94956633', 'Boudeville , Aline', '0084-07-31', 'francesa', '221-5034374', '', '42 N° 377', 'Alianza Francesa ( MamÃ¡ de Ian y TimotÃ© Valetti) BÃ¡squet)', '', '2018-09-15'),
	(4, '22855626', 'Gorriz, Patricia', '0073-06-17', 'Argentina', '221-5238178', '', '37 N° 433 Dto. 10', '', '', '2018-09-15'),
	(5, '20908264', 'Verzini, Paula C.', '0069-08-10', 'Argentina', '421-2329', '', '11 N° 430', '', '', '2018-09-15'),
	(6, '23788717', 'Rey Grimau, Guillermo Daniel', '0064-09-28', 'Argentina', '4837849', '221-4389284', '4 N° 333 Dto. 7.', 'Escuela Secundaria NÂ°19', '', '2018-09-15'),
	(7, '25570149', 'Gonzalez, Natalia', '0076-09-08', 'Argentina', '544- 9988', '', '530 N° 835', 'Hija M. Paz ( Destreza)', '', '2018-09-15'),
	(8, '22532697', 'Martínez, Lorena Alejandra', '0072-05-04', 'Argentina', '2215118936', '', '50 N° 1437 8° B', '', '', '2018-09-15'),
	(9, '21446470', 'Oroz, M. Verónica', '0070-03-14', 'Argentina', '424- 1399', '', '4  esq. 38 Farmacia', '', '', '2018-09-15'),
	(10, '42363225', 'Deluca, Iván', '0009-01-20', 'Argentina', '427- 2804', '221-5966863', '33 N° 1037', '', '', '2018-09-15'),
	(11, '14187526', 'Díaz, María Regina', '0061-04-27', 'Argentina', '471- 0179', '221-4405260', '505 N° 1573', '', '', '2018-09-15'),
	(12, '39097470', 'Castrosán, Juan Pedro', '0095-06-13', 'Argentina', 'Madre ( 471- 4378)', '', '511 bis N° 2826 ( 23 y 23 bis)Ringuelet', '', '', '2018-09-15'),
	(13, '17637310', 'Passeri, Gloria ( esposa de Eugenio)', '0066-04-20', 'Argentina', '422-1697 ', '2215609384 ( Eugenio', '16 N° 171 P.B. 2 ( 35 y 36 )', '', '', '2018-09-15'),
	(14, '28142104', 'Boffi, Daniela', '0080-09-15', 'Argentina', '221- 5724872', '', '39 N° 879 ( 12 y 13) 1Â° B', '', '', '2018-09-15'),
	(15, '05792698', 'Dottori, Edith Gloria', '0048-03-27', 'Argentina', '489- 1907', '', '37 N° 534 ( 5 y 6 )', '', '', '2018-09-15'),
	(16, '92551543', 'Cayo, Mabel Inés', '0095-04-18', 'Argentina', '2216260251', '', '38 ( 4 y 5 verdu. ) 19 ( 527 Y 528)', '', '', '2018-09-15'),
	(17, '10502575', 'Gabbai, Silvia Liliana', '0052-11-24', 'Argentina', '422- 6487', '', '4 N° 46 ( 32 y 33 )', '', '', '2018-09-16'),
	(18, '21120677', 'Dawson,Sonia', '0069-12-02', 'Argentina', '221-5310108', '', '5 N° 327', '', '', '2018-09-16'),
	(19, '24256383', 'Toto de Handula, Marina', '0075-02-06', 'Argentina', '483-9804', '', '57 N° 810', '', '', '2018-09-16'),
	(20, '12530298', 'Müller, Raúl', '0058-12-09', 'Argentina', '483- 5789 (madre)', '', '39 N° 520 ( 5 y 6) madre', '', '', '2018-09-16'),
	(21, '21442186', 'Lenoier, Daniela', '0070-02-04', 'Argentina', '482- 5705', '', '6 N° 262 ( 37 y 38)', '', '', '2018-09-16'),
	(22, '17784905', 'Columbraro, Gabriela', '0065-12-25', 'Argentina', '221-5795110', '', '44 N° 140 ( 121 y 122)', '', '', '2018-09-16'),
	(23, '02737529', 'Pileggi, María Teresa', '0035-02-17', 'Argentina', '221- 5974856', '', '4 N° 333 Dto. 7.', '', '', '2018-09-16'),
	(24, '16964131', 'Caimmi, Elba', '0064-09-17', 'Argentina', '423-5546', '', '34 N° 265', '', '', '2018-09-16'),
	(25, '26250028', 'Garaventa, Marianela', '0018-09-06', 'Argentina', '221- 4288028', '', '43 N° 828 P.B.', '', '', '2018-10-01'),
	(27, '26058069', 'Ruiz, Sergio', '0077-07-11', 'Argentina', '221-058069', '', '511 N° 1913', '', '', '2018-10-16'),
	(28, '24771719', 'Agostini, Gisela', '0075-10-01', 'Argentina', '424- 1772', '221- 5316210', '33 N° 214', 'Destreza, Maite Arzuaga', '', '2018-10-16'),
	(29, '24040933', 'Ogas Soler, Diego', '0074-07-07', 'Argentina', '489- 7888', '', '40 N° 380 Dto. 6', 'Hipodromo de La Plata', 'ogasd@hotmai.com', '2018-10-16'),
	(30, '27266160', 'Andrada, Natalia', '0079-08-14', 'Argentina', '221- 3183832', '', '27 N° 2876', 'Ministerio de Seguridad.', 'mandrada@hotmail.com', '2018-10-16'),
	(31, '18808633', 'Bejarano Peterson, Camila', '0076-08-22', 'Argentina', '011-15- 31884114', '', '116 N° 805 esq. 524', 'Fac. Bellas Artes', '', '2018-10-16'),
	(32, '42827443', 'Argüero, María Milagros', '0001-09-27', 'Argentina', '422- 9245', '221-4084088', '529 N° 1231', 'Milagros y Eugenia ( Destreza)', '', '2018-10-28'),
	(33, '22830632', 'Arreyes, Gabriela', '0072-11-04', 'Argentina', '221- 4228481', '', '41 N° 670', 'Docente. Colombier, Julia ( Destreza)', '', '2018-10-28'),
	(34, '21463226', 'Arca, María Luz', '0069-12-26', 'Argentina', '2215549202', '', '49 N° 1016  P. 1°', 'Albertengo, Azul ( Destreza)', '', '2018-10-28'),
	(35, '25869439', 'Avico, Ana Julia', '0077-04-08', 'Argentina', '484-6230', '', '17 N° 2458', 'Hospital de NiÃ±os.', '', '2018-10-28'),
	(36, '35608915', 'Alsina, Martín', '0090-06-13', 'Argentina', '221- 5977981', '', '119 N° 141 ( 35 y Boulevard 83)', '', 'tincho136_la22@hotmail.com', '2018-10-28'),
	(37, '17169504', 'Alarcón, Marcelo Gabriel', '0065-08-31', 'Argentina', '482- 2918', '', '4 N° 277 Dto. 1 ( 37 y 38)', '', 'marceloalarcon0308@hotmail.com', '2018-10-28'),
	(38, '18350893', 'Aguilera, Mariana', '0067-10-07', 'Argentina', '2215451903', '', '37 N° 287 ( 1 y 115 )', '', '', '2018-10-28'),
	(39, '24891677', 'Amieva, Mariana', '0076-01-12', 'Argentina', '221- 3050910', '', '17 N° 96', 'Profesora de Lengua', '', '2018-10-28'),
	(40, '25952422', 'Aspilcueta, María Eugenia', '0077-05-12', 'Argentina', '471-1435', '', '509 N° 2322', 'Consultorio', '', '2018-10-28'),
	(41, '24999778', 'Areso, María Eugenia', '0076-06-21', 'Argentina', '483- 4162', '', '35 N°578', 'Docente', '', '2018-10-28'),
	(42, '24041458', 'Algeri, Diego', '0079-10-27', 'Argentina', '2216277990', '', '125 N° 70', 'Ministerio de Salud.', '', '2018-10-28'),
	(43, '26598177', 'Bonatto, Virginia', '0078-03-30', 'Argentina', '221- 4597930', '', '33 N° 374  Dto. 1', 'Fac. de Humanidades. Prof. de Lengua', 'virginabonatto@gmail.com', '2018-10-29'),
	(44, '34951225', 'Bianchi, Sofía', '0090-04-19', 'Argentina', '2213056533', '', '51 N° 1182     1Â° C', 'Ayudante de Dany, destreza.', '', '2018-10-29'),
	(45, '24421623', 'Baliño, Verónica', '0075-03-27', 'Argentina', '489- 1507', '2215571547', '5 N° 276 - 3° B ( 37 y 38)', 'Contadora PÃºblica.', '', '2018-10-29'),
	(46, '11377518', 'Barilache, Mirta del Valle', '0054-10-23', 'Argentina', '471- 0201', '221- 4181496', '11 N° 2148 ( 510 y 511)', '', '', '2018-10-29'),
	(47, '29764562', 'Baranthol, Alejandro', '0082-12-05', 'Argentina', '221- 5540309', '', '25 N° 1172 dTO. 4° A', 'Normal 1.', '', '2018-10-29'),
	(48, '27122291', 'Botteri, Cristian', '0079-02-18', 'Argentina', '221-5348598', '', '528 N° 41', 'Empleado.', '', '2018-10-29'),
	(49, '22765358', 'Bruschini, Miriam Marcela', '0072-08-30', 'Argentina', '421- 9585', '221-5564310', '3 N° 181   2° B', '', '', '2018-10-29'),
	(50, '24835477', 'Boschi, Paula Valeria', '0075-09-15', 'Argentina', '425-0721', '', '14 N° 212', 'Esc. Italiana', '', '2018-10-29'),
	(51, '21140968', 'Balzamo, Martín', '0069-10-28', 'Argentina', '421- 9665', '', '36 N° 497', 'AEROLÃ NEAS ARGENTINAS', 'martin.balzamo@gmail.com', '2018-10-29'),
	(52, '32312798', 'Burtre, María Rosa', '0086-04-12', 'Argentina', '221-6374327', '', '35 N° 319 Dto. D', '', '', '2018-10-29'),
	(53, '14191491', 'Bonfanti, Sara Isabel', '0061-04-30', 'Argentina', '428- 0071', '', '7 N° 335 2Â° B', '', '', '2018-10-29'),
	(54, '30937391', 'Banfi, Carlos Daniel', '0084-09-16', 'Argentina', '221- 6371644', '', '8 N° 165', 'Ministerio Agroindustria', '', '2018-10-29'),
	(55, '23730857', 'Moreira, Marcelino', '0074-04-09', 'Argentina', '221- 6566651', '', '38 ( 127 y 128 ) s/ n', '', '', '2018-11-03'),
	(56, '04631751', 'Mariño, Alberto José', '0043-11-03', 'Argentina', '422- 0212', '', '35 N°255', 'Jubilado', '', '2018-11-03'),
	(57, '23756466', 'Canepa, Rubén Darío', '0074-10-04', 'Argentina', '424-9786', '2216023939', '4 N° 277 Dto. 2', 'IPS 47 ( 5 y 6 )', '', '2018-11-03'),
	(58, '18708018', 'Canova Sarango, Oscar Raúl', '0063-06-27', 'Argentina', '221- 4240904', '', '126 N° 51 ( 531 y 532)', 'Estudio JurÃ­dico', '', '2018-11-03'),
	(59, '10908406', 'Cabello, Marta Noemí', '0053-07-13', 'Argentina', '424-8459', '', '39 N° 483 ( 4 y 5 )', 'Docente', '', '2018-11-03'),
	(60, '27619769', 'Campos, Yanina', '0079-11-20', 'Argentina', '221- 6067771', '', '123 N° 351  esq. 39', 'Farmacia Oroz.', '', '2018-11-03'),
	(61, '26350682', 'Balbuena, María Fernanda', '0077-11-03', 'Argentina', '470-9533 ', '221-5661303', '529 N° 3180', '', '', '2018-11-04'),
	(62, '35406322', 'Cisnero, María Fernanda', '0086-04-24', 'Argentina', '221- 4547576', '', 'Plaza Italia N° 163, 14 C.', 'Facultad de PsicologÃ­a. Hijo en BÃ¡squet.', '', '2018-11-04'),
	(63, '01051839', 'Ciccocioppo, Zulema', '0038-03-14', 'Argentina', '422- 0641', '221- 5601165', '39 N° 491  y 1/2. 4Â° B', '', '', '2018-11-04'),
	(64, '04507902', 'Cardoso, María Susana', '0043-02-01', 'Argentina', '483-6601', '', '5 N° 221', '', '', '2018-11-04'),
	(65, '17375903', 'Castillo, Miriam', '0064-09-08', 'Argentina', '482-6931', '221- 5647667', '5 N° 1063', 'Salud- Penitenciaria', '', '2018-11-04'),
	(66, '17188748', 'Castrosín, Sergio', '0065-01-12', 'Argentina', '479-8900', '', '43 N° 2573', 'Esc. TÃ©cnica Albert Thomas', '', '2018-11-04'),
	(67, '18360069', 'Coria, María Laura', '0067-08-07', 'Argentina', '483-5988', '221- 5900130', '8 N° 187', '', '', '2018-11-04'),
	(68, '12991178', 'Colavita Ofelia', '0059-03-09', 'Argentina', '421-6559', '221-4594209', '116 N° 383', 'Gob. de la Ciudad Dir. Ed.Especial', 'ocolavita@bue.edu.ar', '2018-11-04'),
	(69, '31531666', 'Castro, Santiago', '0085-04-01', 'Argentina', '422- 5116', '', '36 N°  571 y 1/2', 'Hijo Castro, TomÃ¡s', '', '2018-11-04'),
	(70, '20375606', 'Caceres, Alejandra', '0068-08-24', 'Argentina', '423-2097', '', '35 bis N° 263 ( 123 y 124)', '', '', '2018-11-04'),
	(71, '21589772', 'Castillo, Patricia', '0070-07-27', 'Argentina', '221-5375680', '', '46 N° 1710', '', '', '2018-11-04'),
	(72, '28769902', 'Castro, Gabriela Noelia', '0081-03-24', 'Argentina', '221- 4940849', '', '38 N° 104', 'Julieta MÃ¡rquez ( Destreza)', '', '2018-11-04'),
	(73, '25916707', 'Velez, Carolina', '0077-05-25', 'Argentina', '423-8159', '221-6144867', '39 N° 425 ( 3 y 4 ) Dto. 3', 'Docente', '', '2018-11-04'),
	(74, '22596538', 'Militello, Laura', '0072-03-14', 'Argentina', '466-0960', '221- 6739257', '5 N° 5733', '', '', '2018-11-04'),
	(75, '27313774', 'Ivancich, Ana', '0079-05-26', 'Argentina', '425-0598', '', '5 N° 225', '', '', '2018-11-04'),
	(76, '20035208', 'Ghio, Milagros', '0068-12-22', 'Argentina', '221-5360035', '', '7 N° 560 7° B', 'Ministerio de EconomÃ­a.', '', '2018-11-04'),
	(77, '18448929', 'Feliú, Ricardo Sebastián', '0067-08-28', 'Argentina', '221- 4829856', '', '37 N° 816', '', '', '2018-11-04'),
	(78, '17875789', 'Pastorino, Claudia Gladys', '0066-09-05', 'Argentina', '421-5012', '', '2 N° 165 ( 35 y 36 )', 'JardÃ­n N Â° 929', '', '2018-11-04'),
	(79, '36778157', 'Zucconi, Matías', '0092-05-08', 'Argentina', '588-8557', '221-6192769', '522 N° 1571 ( 10 y 11)', 'Lic. en FilosofÃ­a.', '', '2018-11-04'),
	(80, '06406841', 'Valledor, Marta Aida', '0050-09-14', 'Argentina', '421-3194', '221-4888612', '5 N° 260', 'Jubilada, Docente', '', '2018-11-04'),
	(81, '13789502', 'Gonzalez, Mónica Isabel', '0059-09-24', 'Argentina', '424-8055', '221-5340580', '35 N° 435 ( 3 y 4 )', 'Docente', '', '2018-11-04'),
	(82, '20440718', 'Lareschi, Sandra', '0068-11-05', 'Argentina', '482-2658', '', '5 N° 208', 'Esc. Italiana', '', '2018-11-04'),
	(83, '18528592', 'Valente, Gastón', '0067-09-13', 'Argentina', '471-8737', '221-6471448', '11 N° 554', 'Arquitecto', '', '2018-11-04'),
	(84, '30876566', 'Casanueva de Sbarra, Justina', '0084-04-03', 'Argentina', '221- 5041816', '', '42 N° 480', 'Hijo Renato, Sbarra ( BÃ¡squet )', '', '2018-11-05'),
	(85, '28519811', 'Cappanini, Mariel Betina', '0080-12-17', 'Argentina', '427-6339', '', '10 N° 211 Dto. 2', '', '', '2018-11-05'),
	(86, '25312781', 'Delendati, Martín', '0077-04-19', 'Argentina', '489- 5693', '', '39 N° 523 2° A', 'Franchesca Delendati', '', '2018-11-05'),
	(87, '24363225', 'DeLuca , Iván', '0009-01-20', 'Argentina', '427-2804', '', '33 N° 1037', '', '', '2018-11-05'),
	(88, '12530170', 'Dangelosanto, Marta Graciela', '0056-09-08', 'Argentina', '421-1413', '', '38 N° 541 ( 5 y 6 )', 'Docente Jubilada', '', '2018-11-05'),
	(89, '05630314', 'Defelippe, María del Carmen', '0047-10-01', 'Argentina', '221- 5995467', '', '38 N° 525 ( 5 y 6 )', '', '', '2018-11-05'),
	(90, '26250068', 'Chitussi, Mariana', '0077-09-01', 'Argentina', '425-7613', '', '37 N° 1332 y 1/2 Dto. 10', '', '', '2018-11-05'),
	(91, '12466993', 'De Luca, María del Carmen', '0056-06-21', 'Argentina', '221- 6249840', '', '5 N° 246 ( 36 y 37 )', '', '', '2018-11-05'),
	(92, '24550454', 'Gavernet Luciana', '0075-10-11', 'Argentina', '221- 5362940', '', '3 N° 279 1Â° A', 'Fac. Cs. Exactas', '', '2018-11-06'),
	(93, '32609510', 'Maldini, Natalia', '0086-09-24', 'Argentina', '221-440428', '', '143 N° 1384', 'Esciela de Danzas', '', '2018-11-06'),
	(94, '12159098', 'Ríos, Luis Roberto', '0056-06-11', 'Argentina', '423-3319', '221- 5082488', '6 N° 222 ( 36 y 37 )', 'Jubilado', '', '2018-11-06'),
	(95, '03904967', 'Nielsen, María Elena', '0040-09-15', 'Argentina', '425- 1738', '', '44 N° 375 Dto. 1', '', '', '2018-11-06'),
	(96, '24254418', 'Paoletti, Verónica', '0074-12-16', 'Argentina', '02355-446438', '', '36 N° 141', 'Mazzenzio, Agustina ( Destreza)', '', '2018-11-06'),
	(97, '24269852', 'Campopiano, Felipe', '0074-12-31', 'Argentina', '417-6833', '', '16 N° 1681 Dto : 3', 'Juzgado Federal NÂ° 1.( Destreza, M. Victoria)', '', '2018-11-06'),
	(98, '30555630', 'Córdoba, María Cinthia', '0076-07-14', 'Argentina', '421-6474', '221-5703614', '121 N° 105', '', '', '2018-11-06'),
	(99, '39831245', 'Cecchini, Ivan Plos', '0096-08-01', 'Argentina', '221- 5762403', '', '116 N° 80 Dto. 5 (33 y 34)', '', '', '2018-11-06'),
	(100, '38017724', 'Garbino, Nicolás', '0094-01-10', 'Argentina', '421-3253', '', '8 N° 225 Dto. 11', '', '', '2018-11-06'),
	(101, '23673233', 'Pelúz, Natalia Irupé', '0074-03-04', 'Argentina', '221-5063241', '', '233 N° 1580 ( Abasto)', 'Konsenkowski, SofÃ­a (Destreza)', '', '2018-11-06'),
	(102, '25476650', 'Jurado, María Laura', '0076-10-05', 'Argentina', '425-5105', '', '50 N° 402 ( 124 y 125)', 'Mosqueira Jurado, Felipe (BÃ¡squet)', '', '2018-11-06'),
	(103, '13672881', 'Llinaz, Silvia Mónica', '0060-12-07', 'Argentina', '483-8001', '', '8 N° 229', '', '', '2018-11-06'),
	(104, '20184669', 'Pérez de Vargas, Mariana', '0068-12-13', 'Argentina', '427-4998', '', '4 N° 258 ( 37 y 38 )', '', '', '2018-11-06'),
	(105, '05606314', 'Gonzalez, María', '0047-09-14', 'Argentina', '421-8686', '', '116 N° 248 Dto. 9', '', '', '2018-11-06'),
	(106, '23208235', 'Suárez, Mariana', '0073-01-24', 'Argentina', '221-6122818', '', '4 N° 267  5° A.', '', '', '2018-11-06'),
	(107, '22132147', 'Sangalli Dattoli, Mabel', '0071-04-23', 'Argentina', '483-7806', '', '37 N° 347', 'Docente', '', '2018-11-06'),
	(108, '20343635', 'Murga, Walter', '0069-09-09', 'Argentina', '422-7456', '', '37 N° 326', 'Ministerio de Desarrollo', '', '2018-11-06'),
	(109, '28409872', 'Guzzo, Héctor Daniel', '0080-10-02', 'Argentina', '423-6451', '', '123 ( 62 y 63)', 'Prof. Club Mayo Karate', '', '2018-11-06'),
	(110, '29230157', 'Szymanowski, María Josefina', '0081-12-30', 'Argentina', '421-7802', '', '37 N° 130', '', '', '2018-11-06'),
	(111, '18333911', 'Sánchez, María Laura', '0067-09-08', 'Argentina', '423-5769', '221- 4361571', '120 N° 242', 'Docente', '', '2018-11-06'),
	(112, '05161782', 'Larronde, Ana María', '0046-05-13', 'Argentina', '421-0493', '', '37 N° 508', 'Jubilada', '', '2018-11-06');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
