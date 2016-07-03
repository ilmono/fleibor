-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2016 a las 08:09:40
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fleibor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'administrador'),
(2, 'planta'),
(3, 'facturacion'),
(4, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_permiso`
--

CREATE TABLE IF NOT EXISTS `categoria_permiso` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `categoria_id` tinyint(4) NOT NULL,
  `permiso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE IF NOT EXISTS `colores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `nombre`, `codigo`) VALUES
(1, 'MARRON B', '#FEEAC9'),
(2, 'MARRON Y', '#FBEACC'),
(3, 'MARRON C', '#CE7104'),
(4, 'NARANJA', '#F5A748'),
(5, 'NARANJA P', '#FDD7A3'),
(6, 'NARANJA B', '#FDE2CA'),
(7, 'NARANJA S', '#F8C2A1'),
(8, 'NEGRO', '#000000'),
(9, 'BLANCO', '#FFFFFF'),
(10, 'PLATEADO', '#B1B3B4'),
(11, 'ROJO R', '#E32119'),
(12, 'ROJO M', '#C3004A'),
(13, 'ROJO B', '#A40044'),
(14, 'ROSA', '#E54890'),
(15, 'ROSA B', '#F9D0D3'),
(16, 'ROSA N', '#F5B6C9'),
(17, 'ROSA C', '#EF8567'),
(18, 'ROSA X', '#F0C0D7'),
(19, 'VERDE', '#17A345'),
(20, 'VERDE H', '#97BF0D'),
(21, 'VERDE A', '#ADCB57'),
(22, 'VERDE N', '#AEDAD6'),
(23, 'VERDE Y', '#006633'),
(24, 'VERDE M', '#8A8000'),
(25, 'VERDE W', '#DDEDDF'),
(26, 'VIOLETA', '#7E64A4'),
(27, 'VIOLETA B', '#BB9EC7'),
(28, 'VIOLETA L', '#AF007C'),
(29, 'VIOLETA N', '#A6A4CE'),
(30, 'MARRON O', '#6f4400'),
(31, 'MARRON P', '#812f0b'),
(32, 'MARRON CH', '#6a3e02'),
(33, 'AMARILLO', '#f8f200'),
(34, 'AMARILLO H', '#f5c320'),
(35, 'AMARILLO L', '#e1ea06'),
(36, 'AZUL', '#362981'),
(37, 'AZUL F', '#29509d'),
(38, 'AZUL M', '#004c80'),
(39, 'AZUL T', '#006b8c'),
(40, 'CELESTE', '#2fb8e4'),
(41, 'CELESTE B', '#bee1f0'),
(42, 'CELESTE N', '#abd9de'),
(43, 'CELESTE C', '#53b4e7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envases`
--

CREATE TABLE IF NOT EXISTS `envases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `envases`
--

INSERT INTO `envases` (`id`, `nombre`) VALUES
(2, 'Botellas'),
(3, 'Potes'),
(4, 'Frascos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envase_medidas`
--

CREATE TABLE IF NOT EXISTS `envase_medidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_envase` int(11) NOT NULL,
  `id_medida` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `envase_medidas`
--

INSERT INTO `envase_medidas` (`id`, `id_envase`, `id_medida`) VALUES
(1, 3, 1),
(2, 3, 3),
(3, 3, 4),
(4, 3, 11),
(5, 3, 12),
(6, 3, 17),
(7, 3, 18),
(12, 2, 5),
(13, 2, 6),
(14, 2, 7),
(15, 2, 8),
(16, 2, 9),
(17, 2, 10),
(18, 4, 5),
(19, 4, 7),
(20, 4, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE IF NOT EXISTS `medidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id`, `cantidad`) VALUES
(1, '15 Gr'),
(3, '5 Gr'),
(4, '250 Gr'),
(5, '30 CC'),
(6, '110 CC'),
(7, '250 CC'),
(8, '1 L'),
(9, '2 L'),
(10, '5 L'),
(11, '60 Gr'),
(12, '500 Gr'),
(13, '1 Kg'),
(14, '5 Kg'),
(15, '100 Gr'),
(16, '60 CC'),
(17, '2 Gr'),
(18, '3 Gr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medida_unidades`
--

CREATE TABLE IF NOT EXISTS `medida_unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_medida` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `medida_unidades`
--

INSERT INTO `medida_unidades` (`id`, `id_medida`, `id_unidad`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 4, 3),
(4, 3, 1),
(5, 6, 2),
(6, 6, 8),
(7, 17, 1),
(8, 18, 1),
(9, 7, 7),
(10, 7, 2),
(11, 5, 1),
(12, 5, 4),
(14, 8, 2),
(15, 9, 5),
(16, 10, 6),
(17, 11, 7),
(18, 11, 2),
(19, 12, 9),
(21, 16, 1),
(22, 16, 10),
(23, 13, 3),
(24, 14, 3),
(25, 15, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`) VALUES
(0000000001, 'Menu de Usuario'),
(0000000002, 'Menu de Admin'),
(0000000003, 'Menu de Facturacion'),
(0000000004, 'Menu de Planta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `envase` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `img` varchar(250) NOT NULL,
  `subtitulo` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `envase`, `nombre`, `img`, `subtitulo`) VALUES
(1, 3, 'Colorantes en Pastas', '', ''),
(2, 3, 'Polvo para Petalos', '', ''),
(5, 3, 'Polvo para Petalos Fluor', '', 'uso exclusivo para porcelana fria'),
(6, 3, 'Colorantes en polvo liposolubles', '', ''),
(7, 4, 'Colorante para Aerografos', '', ''),
(8, 2, 'Colorantes Liquidos', '', ''),
(9, 3, 'Brillos', '', ''),
(10, 3, 'Iluminadores', '', ''),
(11, 3, 'Fulgor Magico', '', 'Maximo brillo. Otorga el brillo indicado sin tapar el color de la superficie donde se aplica'),
(12, 3, 'Fulgorados', '', 'Todo el color de los polvos para petalos combinado con el brillo del fulgor. Este producto colorea la superficie donde se aplica'),
(13, 3, 'Estracto de Malta', '', ''),
(14, 4, 'Glicerina', '', ''),
(15, 4, 'Blanqueador de Glase', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_colores`
--

CREATE TABLE IF NOT EXISTS `producto_colores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Volcado de datos para la tabla `producto_colores`
--

INSERT INTO `producto_colores` (`id`, `id_producto`, `id_color`) VALUES
(87, 1, 33),
(88, 1, 34),
(89, 1, 35),
(90, 1, 36),
(91, 1, 37),
(92, 1, 38),
(93, 1, 39),
(94, 1, 9),
(95, 1, 40),
(96, 1, 41),
(97, 1, 43),
(98, 1, 42),
(99, 1, 1),
(100, 1, 3),
(101, 1, 32),
(102, 1, 30),
(103, 1, 31),
(104, 1, 2),
(105, 1, 4),
(106, 1, 6),
(107, 1, 5),
(108, 1, 7),
(109, 1, 8),
(110, 1, 10),
(111, 1, 13),
(112, 1, 12),
(113, 1, 11),
(114, 1, 14),
(115, 1, 15),
(116, 1, 17),
(117, 1, 16),
(118, 1, 18),
(119, 1, 19),
(120, 1, 21),
(121, 1, 20),
(122, 1, 24),
(123, 1, 22),
(124, 1, 25),
(125, 1, 23),
(126, 1, 26),
(127, 1, 27),
(128, 1, 28),
(129, 1, 29),
(130, 2, 33),
(131, 2, 35),
(132, 2, 36),
(133, 2, 37),
(134, 2, 9),
(135, 2, 40),
(136, 2, 43),
(137, 2, 4),
(138, 2, 7),
(139, 2, 8),
(140, 2, 10),
(141, 2, 11),
(142, 2, 14),
(143, 2, 17),
(144, 2, 19),
(145, 2, 21),
(146, 2, 20),
(147, 2, 26),
(148, 3, 33),
(149, 3, 35),
(150, 3, 36),
(151, 3, 37),
(152, 3, 9),
(153, 3, 40),
(154, 3, 43),
(155, 3, 4),
(156, 3, 7),
(157, 3, 8),
(158, 3, 10),
(159, 3, 11),
(160, 3, 14),
(161, 3, 17),
(162, 3, 19),
(163, 3, 21),
(164, 3, 20),
(165, 3, 26),
(168, 5, 33),
(169, 5, 36),
(170, 5, 4),
(171, 5, 14),
(172, 5, 26),
(173, 6, 33),
(174, 6, 36),
(175, 6, 14),
(176, 6, 19),
(177, 7, 33),
(178, 7, 36),
(179, 7, 4),
(180, 7, 8),
(181, 7, 14),
(182, 7, 19),
(183, 7, 26),
(184, 8, 33),
(185, 8, 36),
(186, 8, 40),
(187, 8, 4),
(188, 8, 14),
(189, 8, 19),
(190, 8, 26),
(191, 9, 36),
(192, 9, 10),
(193, 9, 19),
(194, 10, 36),
(195, 10, 19),
(196, 10, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE IF NOT EXISTS `unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id`, `cantidad`) VALUES
(1, '04 Unidades'),
(2, '12 Unidades'),
(3, '01 Unidad'),
(4, '25 Unidades'),
(5, '08 Unidades'),
(6, '03 Unidades'),
(7, '06 Unidades'),
(8, '24 Unidades'),
(9, '20 Unidades'),
(10, '16 Unidades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `categoria` tinyint(4) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `domicilio` varchar(250) NOT NULL,
  `localidad` varchar(250) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=352 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `codigo`, `categoria`, `nombre`, `domicilio`, `localidad`, `telefono`, `mail`, `user`, `pass`) VALUES
(2, 'AAS001', 4, 'ARTE Y AZUCAR S.R.L', 'EVA PERON 598', 'VILLA CONSTITUCION', '03461-463452', 'lagosjorgel@hotmail.com', 'arteyazucarsrl', '9276be775c604914a96e8671a62c4c7d'),
(3, 'ABC001', 4, 'LUIS ABUD', 'SANTA ROSA 54', 'CORDOBA', '0', 'gabrielrigo@gabrielrigo.com.ar', 'luisabud', 'ac1ed7d1f9c2fb8455ca0f5160ce0036'),
(4, 'ABC002', 4, 'GUILLERMO Y ALEJANDRO BETHER', 'LOPE DE VEGA 2061', 'CAPITAL FEDERAL', '4567-0973', '0', 'guillermoyalejandrobether', '3d254d85417da81ced2c4dd98b1701b8'),
(6, 'ACB001', 4, 'ANDREU CAMILO', 'SAENZ PEÃ‘A 766', 'SAN ANTONIO DE PADUA', '0220 4832106', 'dist_andreu@hotmail.com', 'andreucamilo', '11989a4c0c9138566981139c213af74e'),
(7, 'ACM001', 4, 'ANDES DE CUYO SA.', 'PRES. ILLIA 3042 (EX SOLIS)', 'RAFAEL CALZADA', '4219-3089', 'suralimenticio@gmail.com', 'andesdecuyosa', 'e3b7c604ee8a672cbbf48c7e8318ca1e'),
(8, 'AGB003', 4, 'AGROMENTA S.R.L.', 'JUAN DE GARAY (91) 554', 'VILLA LYNCH', '4755-0764', 'agromenta@yahoo.com.ar', 'agromentasrl', '1ff7be76b72783e901d76924efb50f1a'),
(9, 'ALB002', 4, 'ALEIXO CLAUDIA', 'PABLO GUIDELLO 1995', 'SANTOS LUGARES', '0', '0', 'aleixoclaudia', '1b60e48faebb04c13498bf92691844ae'),
(10, 'ALE001', 4, 'HUGO SEBASTIAN ALMARA', 'GUALEGUAYCHU 8', 'PARANA', '0343-4233739', 'pezcampero@yahoo.com.ar', 'hugosebastianalmara', 'a01ce25c9c1d4e20a7598a93f4fe6677'),
(11, 'AMC001', 4, 'AMUI S.A.C.I.F.I.', 'AV. CORRIENTES 2561', 'CAPITAL FEDEDERAL', '4952-5918/8606/3145', 'consultas@donaclara.com.ar', 'amuisacifi', 'ef1df7746a0a24dfe6ffc7fc8308b410'),
(12, 'ANB002', 4, 'ANDANZAS S.A.', 'HIPOLITO YRIGOYEN 1570', 'JOSE C. PAZ', '4461-3062', 'administracion@cotymania.com', 'andanzassa', '303be414000e04846f86b422f1607497'),
(13, 'ANB003', 4, 'ANAGUA WILLY', 'COLON 1432', 'SAN FERNANDO', '4746-5437', '0', 'anaguawilly', '9ac6a4ecaed4dd9f25760734e24ba01f'),
(14, 'ANB004', 4, 'NESTOR JORGE ANGELINI', 'GODOY CRUZ 1386', 'BAHIA BLANCA', '0291-4810831', 'donrufino@ar.inter.net', 'nestorjorgeangelini', '9dabffb0a87f4ae9d7671569b70f977f'),
(15, 'ANB005', 4, 'ANDREU SERGIO A.', 'CHICLANA 1070', 'MERLO', '0', '0', 'andreusergioa', '8571c41dd4a40ae47213d3f1ba81f908'),
(16, 'ANC001', 4, 'ANALBA S.A.', '12 DE OCTUBRE 948', 'VILLA BOSCH', '4840-1122', 'info@analba.com', 'analbasa', '076f59c138ee1b5cf6d1168438a22d09'),
(17, 'ANS001', 4, 'ANSOL S.R.L.', 'IRIONDO 1917', 'ROSARIO', '0341-4323138', 'andressollima@hotmail.com', 'ansolsrl', 'aaa9f1cddb46e2362ae2f0807df2d455'),
(18, 'APS001', 4, 'M. ALEJANDRA G. DE PEROTTI', 'JOSE M. ARAGON 716', 'RAFAELA', '03492-501977', 'aleperotti22@gmail.com', 'malejandragdeperotti', '6d89069c828ee83fa027d1fda9307f34'),
(19, 'ARB001', 4, 'ARIENTI GABRIEL Y SERGIO S.H.', 'CONCEJAL TRIBULATO 1159', 'SAN MIGUEL', '4664-9615', 'cotillondisparates@gmail.com', 'arientigabrielysergiosh', '5be749c233321521de422798e6be9ea7'),
(20, 'ARC001', 4, 'ANDREA ROLDAN/ARTISTICA RAINERO', 'GRAL. PAZ 519', 'RIO CUARTO', '0358 4628195', 'artistica_rainero@yahoo.com.ar', 'andrearoldanartisticarainero', '3ec82903cc001a9b130d33fb8b49e2e3'),
(21, 'ARC002', 4, 'ARCO IRIS GROUP S.R.L.', 'ENTRE RIOS 232', 'CORDOBA', '0351-4235735', 'administracion@cotillonarcoiris.com', 'arcoirisgroupsrl', '2180494953f4d81a356e9988970b744a'),
(22, 'ARM001', 4, 'NILDA ARCE', 'CARLOS PELLEGRINI 1145', 'GENERAL ALVEAR', '02625-425859', 'losprimostodosueltoalvear@hotmail.com', 'nildaarce', '7e29948136e93456377c01745b1a519c'),
(23, 'ARS001', 4, 'ARTE RUSTICO S.H.', 'AV. DEL LIBERTADOR 1172', 'EL CALAFATE', '0', '0', 'arterusticosh', '4ba1a2ced40b727dd6f6965ed0c20bb1'),
(24, 'ASC001', 4, 'ASTUTTI - DALTON - FORLANI S.H.', 'PEDRO LOZANO 3009 PISO 3 D 14', 'CAPITAL FEDERAL', '4585-0272', 'cotizaciones@sodapasta.com', 'astuttidaltonforlanish', 'c2fef134f5ba0c105923e5798780bdd3'),
(25, 'ATS001', 4, 'ATRIA S.R.L.', 'HIPOLITO YRIGOYEN 321', 'RAFAELA', '03492-570049', 'rafaela@cosmosushuaia.com.ar', 'atriasrl', '62262453b0a985d2c82fc73ff4a0ce96'),
(26, 'AZC001', 4, 'AZUCAR MORENO S.A./LA REPOSTERITA', 'ONCATIVO 101', 'CORDOBA', '0351 157605512', 'hector@lareposterita.com.ar', 'azucarmorenosalareposterita', '5ca64b67148669f49faa2248a9c3fab4'),
(27, 'BAB001', 4, 'BATTOLLA Y CAPURRO S.H.', 'BOULOGNE SUR MER 1298', 'TAPIALES', '4442-4834', 'elgran-nogal@hotmail.com.ar', 'battollaycapurrosh', 'a32dda79685219dd1468e13bd12e5b88'),
(28, 'BAB002', 4, 'BARBIERI AGUSTINA ANTONIA', 'AV. MITRE 6324', 'WILDE', '0', 'todofiestacotillon@yahoo.com.ar', 'barbieriagustinaantonia', 'eef2043968f1a92536cd7c6f8e154c22'),
(29, 'BAB003', 4, 'BALLESTEROS ALICIA SUSANA', 'ILLIA 2419', 'SAN JUSTO', '4441-2830', 'cotillonandrea@gmail.com', 'ballesterosaliciasusana', '83051f2a7dce1d3a1cc81697e83e713e'),
(30, 'BAB006', 4, 'VIRGINIA B. BALGAC', 'RIVADAVIA 320', 'QUILMES', '0', 'todofiestacotillon@yahoo.com.ar', 'virginiabbalgac', 'e136312f93b2a2683e830b417494f868'),
(31, 'BAS001', 4, 'BRUNO ALEJANDRO CESAR', 'PJE. SANTOS DUMONT 1229', 'ROSARIO', '0', 'distribuidorabruno@hotmail.com.ar', 'brunoalejandrocesar', 'a97794a78341525adc91946238a37e0e'),
(32, 'BCC001', 4, 'BAZAR CHEF S.R.L.', 'AV. JUJUY 1228', 'CAPITAL FEDERAL', '4308-4679', 'sistemas@bazarchef.com', 'bazarchefsrl', 'f8eddaec70d8cf970222cad34b3589b1'),
(33, 'BEB001', 4, 'GUILLERMO BERSELLI', 'HIPOLITO YRIGOYEN 1650', 'JOSE C. PAZ', '02320-425997', '0', 'guillermoberselli', '0499eb9bf91988e5a1f1e0c42bf5c862'),
(34, 'BEB002', 4, 'BELLINI ALBERTO MARCOS', 'BARILOCHE 5168', 'GONZALEZ CATAN', '15-24255246', '0', 'bellinialbertomarcos', '50043c3d1ce8b319322f09db1e199e85'),
(35, 'BEB003', 4, 'BELLINI PARRA LUCIANO N.', 'ACHUPALLAS 6399', 'GONZALEZ CATAN', '02202-454727', 'lucianobellini2@gmail.com', 'belliniparralucianon', '38d7e8e801e5a4afdad30eafa0ded228'),
(36, 'BER001', 4, 'BELANTI MARIEL ELIZABET', 'SAN LORENZO 6286', 'ROSARIO', '0', 'rosario.comercial@hotmail.com', 'belantimarielelizabet', 'b81082bdadcffc9717727dc471555102'),
(37, 'BES001', 4, 'FERMIN BECCACECE', 'MITRE 1023', 'ROSARIO', '0341-4211702', 'la_portena_rosario@hotmail.com', 'ferminbeccacece', '63913e49857173869bc551930c35e067'),
(38, 'BES004', 4, 'BENAVIDEZ MARTIN Y CAVALLO GISELA', 'GENERAL LOPEZ ESQ. BELGRANO 0', 'SAN GUILLERMO', '03562-468396', 'plastidul-c@hotmail.com', 'benavidezmartinycavallogisela', '7f7999884dc91e3476687928188bd080'),
(39, 'BIC001', 4, 'BIANCO LEONARDO', 'AV. JUAN DE GARAY 3865', 'CABA', '4921-8139', 'info@biancoycia.com.ar', 'biancoleonardo', '1d45bdb515d17ba2d47370ea05ea9c78'),
(40, 'BNC001', 4, 'BAUMANN NANCY SUSANA', 'SALTA 259', 'VILLA MARIA', '0353-4528768', 'nancy_bau@hotmail.com', 'baumannnancysusana', '0264c46e56fb7c01b52687341c603508'),
(41, 'BOB002', 4, 'BOLOGNA ADRIANA PAOLA', 'CALLE 6 NÂº 1390 ENTRE 60 Y 61', 'LA PLATA', '0221-4601683', 'adrianabologna@hotmail.com', 'bolognaadrianapaola', '2aa14627f399c6adbab343ba6dbea69c'),
(42, 'BOC002', 4, 'IRIS BOSCACCI', 'J. B. JUSTO 748', 'SAN FRANCISCO', '0', 'mundodulce1157@hotmail.com', 'irisboscacci', '94f29515e1c2c88f37d3bd6c6f49f15d'),
(43, 'BOT001', 4, 'NATALIA BOSIO', 'MAGALLANES 2385', 'USHUAIA', '0', 'ventas@cosmosushuaia.com.ar', 'nataliabosio', 'cf70d16d6354a259591697e92addba7b'),
(44, 'BRB002', 4, 'BRUNI E HIJOS S. H.', 'CNO. GRAL. BELGRANO 3298', 'BERAZATEGUI', '4391-1004', 'info@brunismaderas.com.ar', 'bruniehijossh', '5fbc5b28e481c96b8e72a2c6f7224898'),
(45, 'BRC001', 4, 'NORBERTO BRUNO', 'SAN MARTIN 515', 'CORDOBA', '0351-4248857', 'gabrielrigo@gabrielrigo.com.ar', 'norbertobruno', '0e163efd1cf097e91ce7aa22da6b9e30'),
(46, 'BRC002', 4, 'BRONIA S.A.', 'MAIPU 464 PISO 4 DTO 92', 'CAPITAL FEDERAL', '4954-4433', 'compras@ticoral.com', 'broniasa', 'e99d4180d011523d8250b2f4fc5ebac5'),
(47, 'BTR001', 4, 'BISCHOF Y TOLEDO S.H.', 'DON BOSCO 1342', 'CIPOLLETTI', '0299-4772470', 'proveedores@toledodist.com.ar', 'bischofytoledosh', '69c381e78936295d858f590772a7fd51'),
(48, 'CAB002', 4, 'CAPURRO Y VAZQUEZ S. H.', 'AV. CROVARA 665', 'TABLADA', '4454-3027', 'pucho22@hotmail.com.ar', 'capurroyvazquezsh', 'a0f7bb254b3956df065db7cf5b6f4396'),
(49, 'CAB003', 4, 'CAVAGNERO VIVIANA LAURA', 'FAMATINA 1799 ESQ. AV. RATTI', 'ITUZAINGO', '15-3785604', 'payser@hotmail.com.ar', 'cavagnerovivianalaura', 'd98bec662dbb438925a4cd02722c6f82'),
(50, 'CAB004', 4, 'CAPITAN DEL ESPACIO S.A.', 'GRAN CANARIA 350', 'QUILMES', '4253-5224', 'capitandelespacio@speedy.com.ar', 'capitandelespaciosa', '576ab9401ec7592259cd447dec2907e2'),
(51, 'CAB008', 4, 'CLAUDIA CAPODAGLIO', 'ACEVEDO 15', 'LOMAS DE ZAMORA', '4244-1916', 'naty_solla@hotmail.com', 'claudiacapodaglio', '7673f5ce61d4a1243581dcc906a51f20'),
(52, 'CAC002', 4, 'CAMPISANO ADRIAN MARCELO', 'PUMACAHUA 1289', 'CAPITAL FEDERAL', '2046-5713', 'ericayadrianc.cakes@hotmail.com', 'campisanoadrianmarcelo', '7230c25a3d37d34ef26322a60a10bda2'),
(53, 'CAC003', 4, 'JORGELINA CAMARDA', 'PIO ANGULO 629', 'BELL VILLE', '0', 'jorgelinacamarda@hotmail.com', 'jorgelinacamarda', '3088840f843cdad50eb3db825c57ca29'),
(54, 'CAC004', 4, 'GABRIEL CALIGARIS', 'ZAVALA 3402', 'CAPITAL FEDERAL', '4554-2857', 'info@lescroquants.com.ar', 'gabrielcaligaris', 'b7d3f4b7ed1a204eaa6c448e4f5097ff'),
(55, 'CAC005', 4, 'LILIANA CAMPI', 'AV. CABILDO 1306', 'CAPITAL FEDERAL', '4784-8605', 'lilicotillon@hotmail.com', 'lilianacampi', '24c35d2277e43358d21170fbab4b5f24'),
(56, 'CAC006', 4, 'DANIEL CAVILLA', 'AV. BRASIL 2699', 'CAPITAL FEDERAL', '4941-7862/4941-9517', 'danielcavilla@hotmail.com', 'danielcavilla', 'e22b45a56f0be1c149d57540cdf26355'),
(57, 'CAC008', 4, 'CARVALLO MATIAS ALEJANDRO', 'LARREA 1050 7Âº D', 'CAPITAL FEDERAL', '0', '0', 'carvallomatiasalejandro', '37c78e7505cb196622cb0b8b2fc0a194'),
(58, 'CAM001', 4, 'RUBEN CANO', 'RECONQUISTA 1350', 'GODOY CRUZ', '0261 4283735', 'rubencanomayorista@gmail.com', 'rubencano', 'f83eaaf26c2cc10afb6e448883379a3b'),
(59, 'CAM002', 4, 'ELISABETH E. CARAM', 'ENTRE RIOS 345', 'MENDOZA', '0261-4264706', 'elisabethcaram5@hotmail.com', 'elisabethecaram', '3f91e3cb97d3975f78bda1efa3f4d113'),
(60, 'CAS001', 4, 'JULIO CATTANEO', 'ITUZAINGO 452', 'SALTA', '0', 'marucotillon@hotmail.com', 'juliocattaneo', 'fa8be732577fbf0f230f5b1a1c3f85ab'),
(61, 'CAS002', 4, 'CARISOL COTILLON S.R.L.', 'URQUIZA 766', 'SALTA', '03874-314085', 'carisolcotillon@fibertel.com.ar', 'carisolcotillonsrl', '4395a552f133904082b6b801efc63d98'),
(62, 'CAS003', 4, 'CARNAVAL S.R.L.', 'EMILIO ZOLA 2179', 'VILLA GDOR. GALVEZ', '02320-446656', 'distribuidoraprovincial@yahoo.com.ar', 'carnavalsrl', '32295b03fee5e820afb8ff22e541b6a9'),
(63, 'CDB001', 4, 'COOK DULCERIA S.A.', 'ESMERALDA 4851', 'MUNRO', '4760-1038', 'administracion@cookdulceria.com', 'cookdulceriasa', '7c30d2770bc78a540ca7bae10b6ee202'),
(64, 'CET001', 4, 'JOSE R. CEBALLOS Y CIA. SRL', 'LAS PIEDRAS 1749', 'SAN MIGUEL DE TUCUMA', '0', 'joseceballosycia@hotmail.com', 'joserceballosyciasrl', 'd24c68c03c5f94067243d7bff617d4ae'),
(65, 'CFS001', 4, 'COTILLON FIESTA S.R.L.', 'GRAL. PAZ 5359', 'SANTA FE', '0342-4604613', 'cotillonfiesta@hotmail.com', 'cotillonfiestasrl', 'f2486fa0aeed4b15114b5a9e4fd8d28a'),
(66, 'CHC001', 4, 'CHIALVO S.R.L.', 'BUENOS AIRES 390', 'CORDOBA', '0', 'chialvosrl@live.com.ar', 'chialvosrl', '255fc140af4bb0eed5a9d9309acc2fd1'),
(67, 'CHC003', 4, 'COTILLON CHIALVO SRL', 'BUENOS AIRES 356', 'CORDOBA', '0', 'silvina@cotillonchialvo.com', 'cotillonchialvosrl', '4f32c6076b670518f636147130ffc504'),
(68, 'CHJ001', 4, 'PABLO CHANI', 'MARIANO MORENO 503', 'PERICO', '0', 'gabrielrigo@gabrielrigo.com.ar', 'pablochani', 'c0ed85204d5c1e3d159a4317a2660718'),
(69, 'CHS004', 4, 'CHOCOLATE DE R. GONZALEZ', 'MUNSTER 136', 'RIO GALLEGOS', '02966-436319', 'chocolate1@speedy.com.ar', 'chocolatedergonzalez', '18bd3ce7bcc93bb53380b9b791256a10'),
(70, 'CIB002', 4, 'COTILLON INTEGRAL SRL', 'AYACUCHO 2767', 'SAN ANDRES', '4752-3440/4755-8833(INTERIOR)', 'gerardo@cotilloncasaalberto.com.ar', 'cotillonintegralsrl', 'ebd6af7c53d0f23803a04ed64a189a10'),
(71, 'CIC001', 4, 'CIOTTI S.A.C.I.F.I.A.', 'DORREGO 588', 'CAPITAL FEDERAL', '4855-8111/4856-5556', 'info@ciotti.com.ar', 'ciottisacifia', '13e0b182da4550cab690b46f155eacfe'),
(72, 'CIC003', 4, 'ESTEBAN CISTERNA', 'LASCANO 6590', 'CABA', '4643-0136/1551426504', '0', 'estebancisterna', '4fc81542e2e0134402db01afbf858569'),
(73, 'CIC004', 4, 'CIENCIAS PARA TODOS SRL', 'JOSE LEON CABEZON 2478 PB', 'CAPITAL FEDERAL', '4571-1888', 'administracion@cienciaparatodos.com.ar', 'cienciasparatodossrl', '513dee9a21a923491274b629c2b57474'),
(74, 'CIC005', 4, 'CIENFUEGOS S.A.', 'AV. TRIUNVIRATO 3063', 'CABA', '02226-49-1202', 'fabricacanuelas@cienfuegos.com.ar', 'cienfuegossa', 'edf2e57656c5444d98f5176712bac6e0'),
(75, 'CMC001', 4, 'CARBALLO MARIA JOSEFA', 'ZUVIRIA 2591', 'CAPITAL FEDERAL', '4631-8835/4633-8946', '0', 'carballomariajosefa', 'fa1e6a6c77fbd19dcc6c8867318fdefe'),
(76, 'CME001', 4, 'COT. MAKUKO''S DE M. RIOS', 'AV. P. ZANNI 1402 ESQ. MEDUS', 'PARANA', '0343-4364900', 'miguel@cotillonmakukos.com.ar', 'cotmakuko''sdemrios', 'cfde634e64526820fe3e2f5dcf1aa88f'),
(77, 'CNR001', 4, 'CASA NESTOR SA', 'CERRITO 4205', 'ROSARIO', '0341-4320830', 'adm@casanestormayorista.com.ar', 'casanestorsa', '11da2364866647a050e14baa6a3dec7f'),
(78, 'COB001', 4, 'GRANERO NESTOR JORGE', 'ALMIRANTE BROWN 658', 'MORON', '4627-8344', 'coti_express@hotmail.com', 'graneronestorjorge', '4d1dc0e9ce05df1b70fe6d779ea044ba'),
(79, 'COB002', 4, 'COMASA S.A.', 'GRAL. M. BELGRANO 2658', 'EL TALAR', '4726-3600', 'dbenitez@comasa-sa.com', 'comasasa', '924f6f49072c889504d7721c8f93c83c'),
(80, 'COB003', 4, 'COTIMAX BAHIA S.A.', 'PALAU 25', 'BAHIA BLANCA', '0291-4565352', 'administracion@cotillonamorosi.com', 'cotimaxbahiasa', 'e8e7d621575ad41f72b64573ea2baaaa'),
(81, 'COB004', 4, 'CODELAND S.A.', 'ALICIA M. DE JUSTO 1266', 'SAN MARTIN', '4755-7820', 'proveedores@chocolatescodeland.com.ar', 'codelandsa', 'b396351a5a7c2d1e5a86e5d4d2f4d052'),
(82, 'COB005', 4, 'COMER MART BOL S.R.L', 'AV. LURO 3990', 'MAR DEL PLATA', '0', 'todoresuelto@speedy.com.ar', 'comermartbolsrl', '28645aecc4b29a95e9ab086a9e2b952a'),
(83, 'COB006', 4, 'COOP. COT. SANDRA LIM.', 'CRISOLOGO LARRALDE 848', 'MORON', '0', '0', 'coopcotsandralim', '191ee786b37a8d0905a0deafbdc2eed0'),
(84, 'COM001', 4, 'CLAUDIA A. CONTE', 'PASO DE LOS ANDES 2106', 'GODOY CRUZ', '02616568308/4282428', 'contejuan@live.com.ar', 'claudiaaconte', '59fde3bc4e267fd3a63b5eabbcc36de2'),
(85, 'COS001', 4, 'LAURA COLUSSI', 'CASEY E ITURRASPE', 'VENADO TUERTO', '03462-437348', 'lauracolussi@hotmail.com', 'lauracolussi', '200c38bf562a69bdd40b3bc09cf55ee0'),
(86, 'COS002', 4, 'HORACIO CORTOPASSI', 'SAN GERONIMO 2460', 'SANTA FE', '0342-4522924/4531581', 'cortopassi@arnetbiz.com.ar', 'horaciocortopassi', '1a4c4577b478f876d6780159b61f2a76'),
(87, 'COT001', 4, 'COTISHOW S.R.L', '24 DE SETIEMBRE 360', 'SAN MIGUEL DE TUC.', '0', 'frutifull@yahoo.com.ar', 'cotishowsrl', '54b37c8faf7bae9ac9acf3b2c4b9ec01'),
(88, 'CPB002', 4, 'CORONEL PABLO GUILLERMO', 'ROCA 699', 'TRENQUE LAUQUEN', '02392-15624290', 'valerianeira@hotmail.com', 'coronelpabloguillermo', '0d8804b08d5c9caae53b79d04bb84984'),
(89, 'CRB001', 4, 'COTILLON Y RESPOSTERIA RULITO', 'LA ROCHE 827', 'MORON', '0', 'proveedores@cotillonrulito.com', 'cotillonyresposteriarulito', 'ac71ce7937707cb7db654cc1fb43f3df'),
(90, 'CSB001', 4, 'COTILLON SANDRA S.A.', 'BARTOLOME MITRE 1499', 'MORON', '4627-2273', '0', 'cotillonsandrasa', '5e95baa3562a887c57131c29f30818d3'),
(91, 'CSL001', 4, 'COT. DE SAN LUIS MR. S.R.L', 'AV. EDISON 333', 'MAR DEL PLATA', '0223-4895531/4807559', 'cotillon_elpuntano@hotmail.com', 'cotdesanluismrsrl', 'adc365fd552404af0faef710337d6098'),
(92, 'CVC001', 4, 'COOP. TRABAJO VIEYTES LTDA', 'AV. VIEYTES 1743', 'CAPITAL FEDERAL', '4302-0812/2888/0794', 'andresghelco@hotmail.com', 'cooptrabajovieytesltda', '0a784f3fe6f5f75e6933dd7e90c3b8e5'),
(93, 'DDB001', 4, 'DISTRIB. DULCE HARINA', 'AV. SAVIO 428', 'SAN NICOLAS', '03364-428040', 'hmelina25@yahoo.com.ar', 'distribdulceharina', 'ccd2dfbf93fb922e022d93d85850f08c'),
(94, 'DEB001', 4, 'DELI FOOD ARG. S.R.L', '9 (8 Y 10 ) B1 RPI . P. INDUST', 'PILAR', '0', 'esanchez@deli-arts.com.ar', 'delifoodargsrl', 'b68a5fbca5e167e2fda01d7a5cd66918'),
(95, 'DEB002', 4, 'DEGAS PLUS S.H.', 'CHASCOMUS 24', 'VILLA DOMINICO', '4227-1279', 'degasplus@hotmail.com', 'degasplussh', 'df86d3d11530d4cdf701ae29daa8f1ac'),
(96, 'DEC003', 4, 'DECIMO ARTE S.R.L', 'ACOYTE 1565', 'CAPITAL FEDERAL', '4856-7022', 'info@decimoarte.com.ar', 'decimoartesrl', 'f7c998a3b9d12e6d01cc697f58f449d1'),
(97, 'DFJ001', 4, 'GOMEZ MARTA', 'BELGRANO 892', 'SAN SALV. DE JUJUY', '0388-4232911', 'martagomez_df@hotmail.com', 'gomezmarta', 'ae84804f260eaeec32e8bc5dd3c2c740'),
(98, 'DIB002', 4, 'LILIANA DIEGUEZ', 'CROVARA 3094', 'TABLADA', '4453-8659', '0', 'lilianadieguez', '172c2795aa28846ba21c0920d441844f'),
(99, 'DIB004', 4, 'DISTRASIL S.A', 'BV. ROCHA 140', 'PERGAMINO', '02477-444005', '0', 'distrasilsa', '4bb50afa8725097adffc7a6d77822179'),
(100, 'DIB005', 4, 'DIVERFIESTAS S.A.', 'SALTA 2', 'MORON', '0', 'facturacion@cotymania.com', 'diverfiestassa', 'f5e31e8b991290f409a61cfc97616bf0'),
(101, 'DIC002', 4, 'DIMAR S.H.', 'MARIANO MORENO 657', 'PTE. R. SAENZ PEÃ‘A', '0364-4425475', 'cayetanocodutti@arnet.com.ar', 'dimarsh', '640be464d0d5e234ec5c392d6a43962d'),
(102, 'DJB002', 4, 'DE JESUS YESICA A.', 'ALVARADO 217', 'RAMOS MEJIA', '4654-7847', 'info@alldiet.com.ar', 'dejesusyesicaa', 'd085887125c8e40a32878f5ae8a5a9ca'),
(103, 'DLC001', 4, 'LA CASA DE DON LUCAS S.R.L.', 'IGUALDAD 61', 'CORDOBA', '0351-4263939', 'alejandrobarroni@hotmail.com', 'lacasadedonlucassrl', '3f3df867d564e7f4d071df432fe6d4d6'),
(104, 'DLC002', 4, 'DE LAS NUBES S.A.', 'CHARCAS 4518 4Âº D', 'CAPITAL FEDERAL', '4662-1128', 'info@suarezdelcerro.com.ar', 'delasnubessa', 'f331c97353f395199221829a061cc091'),
(105, 'DMB002', 4, 'DI MARTINO Y ALVAREZ S.H.', 'EIZAGUIRRE 2473', 'SAN JUSTO', '4484-1886', 'compushop@telecentro.com.ar', 'dimartinoyalvarezsh', 'c3b59ca3780b2fc2446be7a9f08b2a9f'),
(106, 'DMB003', 4, 'DISTRIB. CARLOS MULLER S.R.L.', 'RIVADAVIA 2345', 'LOS POLVORINES', '4664-0374/4663-0139', 'calsadmuller@yahoo.com.ar', 'distribcarlosmullersrl', 'c5f294001afebef1a4b1c409837d73ba'),
(107, 'DRB001', 4, 'DISTRIBUIDORA RALIME S.R.L.', 'ANGEL DE ASTRADA 2121', 'LA REJA - MORENO', '0', 'ventas@ralime.com.ar', 'distribuidoraralimesrl', '5c284fc289a958123702584b513ca0e2'),
(108, 'DSB002', 4, 'DE SOUZA PIRES MARTA', 'AV. RIVADAVIA 18283', 'MORON', '4628-0400', 'josemendespereira@hotmail.com', 'desouzapiresmarta', 'c642f0b4673b735747491332e0677299'),
(109, 'DSS001', 4, 'DISTRIBUIDORA SAN ROQUE S.R.L.', 'JUNIN 3444', 'SANTA FE', '0342-4552280/4557298', 'javierbottazzi@hotmail.com', 'distribuidorasanroquesrl', '62da489f02dcaaa95bc67cd80e8ad0ac'),
(110, 'DSS002', 4, 'DISTRIBUIDORA SUAREZ S.R.L.', 'BV. RONDEAU 4191', 'ROSARIO', '0', 'gustavo@suarezmayorista.com.ar', 'distribuidorasuarezsrl', '24c5b6611c7cdc0045e6b4289e8e40b1'),
(111, 'DTB001', 4, 'DISTRIB. TABLADA/KARINA SEMINARA', 'FINLANDIA 5119', 'TABLADA', '46529800', 'distribuidoratablada@gmail.com', 'distribtabladakarinaseminara', '6ead4d0c718455569b882b33b6cab9bd'),
(112, 'DUB002', 4, 'RUBEN DURANTE', 'ACEVEDO 2724', 'REMEDIOS DE ESCALADA', '4202-9052', 'dserubendurante@gmail.com', 'rubendurante', '578b3094152604ab21bcc33c09a2db38'),
(113, 'DVB001', 4, 'DE VINCENZO IDA', 'AV. CROVARA 856', 'CIUDAD MADERO', '4634-1872', 'dieteticamila@gmail.com', 'devincenzoida', '2afcc2192dd00fc841a7e280b576d23f'),
(114, 'EAL001', 4, 'EL ALMACEN DE LA ALEGRIA', 'S. NICOLAS DE BARI (O) 215', 'LA RIOJA', '0380-4435196', 'elalmacendelaalegria1@yahoo.com.ar', 'elalmacendelaalegria', 'e9649bc2867f115f4b6cf939cd737129'),
(115, 'EHC001', 4, 'EL HELADO CUBANO S.A.', 'ARAOZ 1978', 'CABA', '1540245851', 'heladosbuffala@gmail.com', 'elheladocubanosa', 'e1ff7eaead17651f15827b326e71d075'),
(116, 'ELS001', 4, 'EL RELOJ S.R.L.', 'ALCORTA 54', 'RIO GALLEGOS', '02966-430178', 'elreloj@speedy.com.ar', 'elrelojsrl', 'b8a11bcbe54d9a201e0168ebacd81040'),
(117, 'EMACHI', 4, 'MANO DULCE LIMITADA', 'CAMINO BUIN MAIPO 2815 PAR 18', 'SANTIAGO DE CHILE', '0', 'cortezmatta@hotmail.com', 'manodulcelimitada', '8fddd36063558dda4a74c2e4b67764b4'),
(118, 'ENC001', 4, 'EL NUEVO EMPORIO S.A.', 'COCHABAMBA 2577/79', 'CAPITAL FEDERAL', '4941-6722/4942-6644', 'losfuentes4@gmail.com', 'elnuevoemporiosa', '2c248fec955e5507a6e14e8afb9ae51f'),
(119, 'ENC002', 4, 'ENDEMOL ARG. S.A.', 'JOSE A. CABRERA 5870', 'CAPITAL FEDERAL', '0', '0', 'endemolargsa', '916d223021146f1862753c9701e8eeec'),
(120, 'ENM001', 4, 'ENCINAS G. L. Y OT. SH', 'GOB. GABRIELLI 3304', 'LUZURIAGA-MAIPU', '0291-4930325/4933286', 'eencinas@panhel.com', 'encinasglyotsh', '585146b092a18e3429ff23fb6efa4f7c'),
(121, 'EPB002', 4, 'COT. EL PRINCIPITO S.R.L.', 'JOSE HERNANDEZ 3269', 'GREG. DE LAFERRERE', '4626-3141 / 4457-2637', 'elprincipito_2005@yahoo.com.ar', 'cotelprincipitosrl', 'baff4b3dc330a363d71574f6fa5748fc'),
(122, 'EPM001', 4, 'EL PORTEÃ‘ITO S.A.', 'AV. ESPAÃ‘A 1531', 'MENDOZA', '0261-4380780', 'elportenitocotillon@yahoo.com.ar', 'elporteã‘itosa', 'fd183e05791a378694e948355c4c8927'),
(123, 'ETM002', 4, 'EL TUPINAMBA/F. PORQUERES', 'AV. SAN MARTIN 542', 'LUJAN DE CUYO', '0261-4981241', 'el_tupinamba@yahoo.com.ar', 'eltupinambafporqueres', 'eb15846dc4bd70fd7815a75d4e14bd44'),
(124, 'EUC001', 4, 'PLATA Y PLATA ICSA.', 'ZEPITA 3137/39', 'CAPITAL FEDERAL', '4301-6152/4303-1211', 'cabraladrianagabriela@gmail.com', 'platayplataicsa', '009b87393a5b1b3690ea242f8a03347b'),
(125, 'EZAURU', 4, 'ZANETTI S.A.', 'COLONIA 917', 'MONTEVIDEO', '59829030470', 'roberto@zanetti.com.uy', 'zanettisa', '22381fa1071587f9510502fc8b32a528'),
(126, 'FCIARA', 4, 'FERNANDO D. CIARAMELLA', '0', '0', '0', '0', 'fernandodciaramella', '8eb06d30af3b7e06e37cdaf89d5a8f6e'),
(127, 'FEB001', 4, 'ALBERTO J. FERNANDEZ Y CIA.', 'MORENO 1111', 'QUILMES', '4253-2315', 'ajfycia@gmail.com', 'albertojfernandezycia', '2c40cd510d813aa2154acc9dc957076c'),
(128, 'FEB002', 4, 'FERNANDEZ JOSE LUIS', 'MONTES DE OCA 2281', 'CASTELAR', '0', 'medinia12@hotmail.com', 'fernandezjoseluis', '9b4f80d6f1a56b179979f27058872fa9'),
(129, 'FEB004', 4, 'L. FERNANDEZ DE MEIER/ODIN VIEDMA', 'ALVARO BARROS 268', 'VIEDMA', '02920-428170', 'odinviedma@gmail.com', 'lfernandezdemeierodinviedma', 'f2b511cd280647fcec3986aa3a5ac12a'),
(130, 'FEC001', 4, 'RAUL ALEJANDRO FERREYRA', 'RIVERA INDARTE 225', 'CORDOBA BO. CENTRO N', '0', 'gabrielrigo@gabrielrigo.com.ar', 'raulalejandroferreyra', 'f9167284a0e49c3c241d78c3d2e79e5c'),
(131, 'FEC002', 4, 'FEYLO S. R. L.', 'AV. CORRIENTES 2076', 'CAPITAL FEDERAL', '4951-0036', 'ventas@feylo.com', 'feylosrl', '2995ced0997e2f3875b943fbc6aea592'),
(132, 'FEC004', 4, 'DANIELA FERRETTI', 'HUMBERTO 1Âº 20', 'CORDOBA', '0351-4241867', 'danielaferrettis@yahoo.com.ar', 'danielaferretti', '544dc8e5aa77e741234d5a69f67e4f8a'),
(133, 'FEM001', 4, 'LUIS FERRANDO', 'AV. ESPAÃ‘A 93', 'SAN MARTIN', '0263-425045', 'luisferrafa@outlook.com', 'luisferrando', 'c5bd7d355a22ef7d2441c0aa3ab06663'),
(134, 'FES001', 4, 'FENOGLIO EDA - M. Y F. S.H.', 'LAVALLE 668', 'RAFAELA', '03492-435997', 'fenogliorepresentaciones@gmail.com', 'fenoglioedamyfsh', '2701e199fc3d0b231480c150bbaabeac'),
(135, 'FIB001', 4, 'FINOCCHIO RUBEN DARIO', 'PALACIOS 660', 'LOMAS DE ZAMORA', 'HORACIO( CORREDOR) 4701-5590', '0', 'finocchiorubendario', '339d054681381d8fbd781c12ab5d19f0'),
(136, 'FRC001', 4, 'EDUARDO FRANCO', 'SAN GERONIMO 2263', 'CORDOBA', '0351-4557490', 'compras.cotillon.cordoba@gmail.com', 'eduardofranco', 'b9a35c46ee0e0491315c6a40bcef2f64'),
(137, 'GAB001', 4, 'PEDRO GARCIA E HIJOS SA', 'AV. CROVARA 641', 'LOMAS DEL MIRADOR', '4652-9406', 'pgarciaehsa@yahoo.com.ar', 'pedrogarciaehijossa', '080a554273fe4c6684e3b13a0a1f0251'),
(138, 'GAC001', 4, 'GARCIA CARLOS GUSTAVO', 'GUAMINI 5369', 'CABA', '0', 'garzot@gmail.com', 'garciacarlosgustavo', 'e52100df75361c0db14a2eb7687b3826'),
(139, 'GAS004', 4, 'GARCIA IVANA EDITH', 'GRAL. ACHA (SUR) 30', 'SAN JUAN', '0', '0', 'garciaivanaedith', 'f957831c87a6597f155fdc611b517f17'),
(140, 'GCS001', 4, 'GONZALEZ CLAUDIO RUBEN', 'ALSINA 885', 'ROSARIO', '0341-4376441', 'ventas@mileidistribuciones.com', 'gonzalezclaudioruben', 'e7a9e7b646b9c4d188879631b5eed979'),
(141, 'GEB002', 4, 'GELI & CO. S.A.I.C.A.', 'LUIS MARIA CAMPOS 511', 'MORON', '4627-2630', 'geli@gelico.com.ar', 'geli&cosaica', 'fe13f70791fa54b9c289655dd6de182b'),
(142, 'GIS001', 4, 'GIORGINI BRUNO MANUEL', 'URQUIZA 1470', 'TOTORAS', '03476-461774', 'papelerasuper@hotmail.com', 'giorginibrunomanuel', '758b1c7554bc0d8debd9200197b1f753'),
(143, 'GKB001', 4, 'GABRIEL ADRIAN KALMAN', 'PIEDRABUENA 6125', 'GREGORIO DE LAFERRER', '0', '0', 'gabrieladriankalman', '8ebbcd96ce36d82e215206d7b45c93c4'),
(144, 'GLB002', 4, 'GIROTTI ANDRES EDUARDO', 'PIEDRABUENA 6176', 'GREGORIO DE LAFERRER', '4626-7472', 'girotti1994@gmail.com', 'girottiandreseduardo', '2e26ef076dea8cef51657d3e4b0ded0b'),
(145, 'GOB002', 4, 'RAMON ALBERTO GONZALEZ', 'RUTA 3 KM. 34.700', 'VIRREY DEL PINO', '02202-494610/447056', 'pycalberto@hotmail.com', 'ramonalbertogonzalez', '918a8c332885f3e3a5658813a951052e'),
(146, 'GOB003', 4, 'RICARDO GONZALEZ (RENE)', 'B.G.J.M. DE ROSAS 14876', 'GONZALEZ CATAN', '02202-453679', '0', 'ricardogonzalez(rene)', '9c19da8f69411805a1967df494402e68'),
(147, 'GOB004', 4, 'GODOY CARLOS DANIEL', 'CRAVIOTTO 3770', 'QUILMES OESTE', '42003752', 'distribuidoralaflorida@gmail.com', 'godoycarlosdaniel', '23a0f1d67f0681843d0cb4c26db01c53'),
(148, 'GON001', 4, 'GOMEZ RUBEN JESUS', 'PERITO MORENO 12', 'NEUQUEN', '0299-4424440/4483081', 'rubengomez12pm@gmail.com', 'gomezrubenjesus', '889d1ef62df23fb257f50266b1ffc0b7'),
(149, 'GOS001', 4, 'GOMEZ ZULEMA BEATRIZ', 'SAN LORENZO 6286', 'ROSARIO NORTE', '0341-4587004', '0', 'gomezzulemabeatriz', 'a30a2795d136cccfd7c25ff49804350b'),
(150, 'GRB001', 4, 'GRANERO RODRIGO HERNAN', 'EIZAGUIRRRE 2525', 'SAN JUSTO', '4482-6443', 'proveedores@pantanito.com.ar', 'granerorodrigohernan', '17bc2289bfcfd21064f2127d7476b6df'),
(151, 'GRM001', 4, 'MARIANO S. GRUNBLATT', 'ENTRE RIOS 73', 'MENDOZA CIUDAD', '0261-4254242', 'info@almacendelartesano.com.ar', 'marianosgrunblatt', '5049ce86e26bb9c7e60b0b446b4cc4ba'),
(152, 'GRS001', 4, 'GROSSI OSCAR A.', 'BV. RONDEAU 760', 'ROSARIO NORTE', '0341-4549507', 'contacto@plastipel.com.ar', 'grossioscara', 'e927a3ee3daf9d3139ec4ffe89dfdc63'),
(153, 'GUB001', 4, 'MICAELA GUALTIERI GUTIERREZ', 'VENEZUELA 6049', 'WILDE', '0', '0', 'micaelagualtierigutierrez', 'b2f892e2f9f74e4546d11345092fca88'),
(154, 'GUB003', 4, 'GUSCELMEHER S.A', 'AVELLANEDA 3671', 'MAR DEL PLATA', '0223-4728526/4729075', 'info@lacasadelarepostera.com.ar', 'guscelmehersa', 'a59d7644f63a07c1c4909e396ccd3e45'),
(155, 'GUB004', 4, 'EVANGELINA GUERRERO', 'AV. CAZON 1255', 'TIGRE', '4731-3397', 'cotymasexpress@hotmail.com', 'evangelinaguerrero', '0c4cee093779d45da970b0fc00105a89'),
(156, 'GUC001', 4, 'GUELFI OMAR ALCIDES', 'AV. DE LA SEMILLERIA 1495', 'BARRIO AMPL. YAPEYU', '0', 'oguelfi@live.com.ar', 'guelfiomaralcides', '9e93a443f3909fb962297a2428f79502'),
(157, 'GUC002', 4, 'GUERINI HNOS Y M. LANA', 'JOSE LEON SUAREZ 120', 'CAPITAL FEDERAL', '4642-3475', 'jorgeguerini@gmail.com', 'guerinihnosymlana', '164128dec6a2cbc90bee369b307f05c4'),
(158, 'HAB001', 4, 'HELADOS ARTI S.A.', 'CALLE 839 NRO. 2460', 'SAN FRANCISCO SOLANO', '4212-6542', 'administracion@utilidades.com.ar', 'heladosartisa', 'efcd94e7017ff5cee85cd1141ce7e265'),
(159, 'HBC001', 4, 'HAPPY BIRTHDAY S.R.L', 'AV. SANTA FE 719', 'CORDOBA', '0', '0', 'happybirthdaysrl', 'dc2114dace17abae38eb964db72d7835'),
(160, 'HEB002', 4, 'HEBRASOL S.R.L', 'HIPOLITO YRIGOYEN 15490', 'BURZACO', '4238-4934', 'hebrasolsrl@gmail.com', 'hebrasolsrl', '0c4c2df6e9730bc7e292847996062290'),
(161, 'HEC002', 4, 'CRISTIAN L. HERRERA', 'AV. RIVADAVIA 9866', 'CAPITAL FEDERAL', '4682-1121', 'info@elmundodelartesano.com.ar', 'cristianlherrera', 'a42f5131322816dbf46a1d9db52c224a'),
(162, 'HOB001', 4, 'HERBOESTE S.A.', 'BRUSELOTTI 187', 'VILLA TESEI', '4450-8690', 'info@herboeste.com.ar', 'herboestesa', 'dd08b9f8dbb204c1165a601e00e9e2fb'),
(163, 'HUS001', 4, 'OMAR HUSAIN HALLAR', 'ALBERDI 254', 'RIO GALLEGOS', '02966-420757', 'adminsitracion@zoco.com.ar', 'omarhusainhallar', '974a115adf07719d55ab04f1112f9e1f'),
(164, 'JAS001', 4, 'ROBERTO L. JAIME', 'TUCUMAN 659 (SUR)', 'SAN JUAN', '0264-4225966', 'administracionrj@r-jaime.com.ar', 'robertoljaime', '0f13cbc13cd20a617ec970fba5ffd33b'),
(165, 'JAS002', 4, 'ROBERTO JAIME E HIJOS SRL EF', 'ACCESO ESTE Y GUEMES S/N', 'STA. LUCIA-SAN JUAN', '0264-4225966', 'administracionrj@r-jaime.com.ar', 'robertojaimeehijossrlef', '9c13fc285a1e02de7ff5ccd970dc06a8'),
(166, 'JBB001', 4, 'J.B. DISTRIBUIDORA S.R.L.', 'PRIMERA JUNTA 979', 'SAN MIGUEL', '4451-1439', '0', 'jbdistribuidorasrl', '2ca0ae0f5152e9c835694fb826c3e80c'),
(167, 'JUT002', 4, 'JUEGOS Y COLORES S.R.L.', 'JUNIN 285', 'SAN MIGUEL DE TUCUMA', '0381-4219291', '0', 'juegosycoloressrl', 'd1b904a2ecd0394bf614c03e27ea876c'),
(168, 'KAB001', 4, 'KALMAN PABLO DANIEL', 'CONSTITUCION 461', 'PINAMAR', 'NEXTEL 276* 511', 'pablokalman@hotmail.com', 'kalmanpablodaniel', 'b9b087f3c3c7611623f64a1a8189715d'),
(169, 'KAT001', 4, 'KAYROS S.A.', 'ISLA SOLEDAD 1721', 'USHUAIA', '02901-423492', 'ventas@cosmosushuaia.com.ar', 'kayrossa', 'ed5ae702684be97aa2bd936cf72cb7fe'),
(170, 'KET001', 4, 'KENA S.R.L.', 'CORDOBA 778', 'SAN MIGUEL DE TUCUMA', '0381-4306084', 'lareposteratuc@hotmail.com', 'kenasrl', 'dbaa966b364e8d7ba696d74c1a7690ec'),
(171, 'KIC002', 4, 'KIBYSZ ENRIQUE FERNANDO', 'BV. LOS GRANADEROS 2431', 'B.SAN MARTIN CORDOBA', '0351-4762570', 'myriamcotilandia@hotmail.com', 'kibyszenriquefernando', '0aea5917a0a4546610a994f6c4cfbbfb'),
(172, 'KUB001', 4, 'KUCHEN SRL', 'AV. EDISON 444', 'MAR DEL PLATA', '0', 'reposteriaexpress@outlook.com.ar', 'kuchensrl', '502c789c758e9283dc949b86b0589519'),
(173, 'LAC003', 4, 'NATALIA LA ROCCA', 'REP. DE ISRAEL 91', 'CORDOBA', '0', '0', 'natalialarocca', '1ab833ee160c9c01bca4a008ff83167a'),
(174, 'LAC004', 4, 'LA CASA DEL COMERCIO S.R.L.', 'ENTRE RIOS 1155', 'VILLA MARIA', '0', 'corderoalb@infovia.com.ar', 'lacasadelcomerciosrl', '2d6947a45cc61e2946d1b194593738e0'),
(175, 'LAJ001', 4, 'SUSANA LARA', 'ALBERDI 262', 'SAN PEDRO', '03884-425743', 'susanaelenalara14@hotmail.com', 'susanalara', '64a5086d05d75c9e9c69a03d5cc097f4'),
(176, 'LEM001', 4, 'LEIDA S.A.', 'LEIDA S.A.', 'GODOY CRUZ 76', '0261-4233230', 'leidasa@gmail.com', 'leidasa', '83fb5216b18a4b56618d312185e503c9'),
(177, 'LET001', 4, 'LENCINA ROBERTO EDUARDO', 'AV. SOLANO VERA 267', 'SAN MIGUEL DE TUCUMA', '0', 'robertoeduardo.lencina@yahoo.com', 'lencinarobertoeduardo', 'f449990b1fdbb3f8299fd6a75ef131da'),
(178, 'LOB001', 4, 'LOPEZ R Y LOPEZ LJ SH', 'MARIO BRAVO 269', 'AVELLANEDA', '4208-2044', '0', 'lopezrylopezljsh', 'c114f0816cc5852f2964da174c8d1c37'),
(179, 'LOB002', 4, 'LOPEZ CECILIA Y LOPEZ PAULA', 'PTE. PERON EX GAONA 4554', 'BUENOS AIRES', '4483-1085', 'info@cotillonmayoristaalegria.com', 'lopezceciliaylopezpaula', '370a7bf63d935f56f310acdb4a239948'),
(180, 'LOB005', 4, 'PEDRO IGNACIO LOPEZ', 'AV. LURO 5863', 'G. DE LAFERRERE', '4231-4453', 'puntarojapop@hotmail.com.ar', 'pedroignaciolopez', '25a1ab5ecba5008593ae4d56ce358e48'),
(181, 'LON001', 4, 'NILDA BEATRIZ LOPEZ', 'ELENA DE LA VEGA 440', 'ZAPALA', '02942-424119', 'jose.sandoval@speedy.com.ar', 'nildabeatrizlopez', '8cfe9b25216030ecfdc95f8d3529b3df'),
(182, 'LRT001', 4, 'LA REPOSTERA DEL NOA SRL', 'ALVAREZ CONDARCO 55', 'VILLA CONSTITUCION', '0', '0', 'lareposteradelnoasrl', 'ad53c0edd9f59c67b802c51aa40f4677'),
(183, 'LUB001', 4, 'LUCERO LEANDRO SEBASTIAN', 'NECOCHEA 4138', 'BAHIA BLANCA', '0291-154745909', 'espaciodecocineros@outlook.com', 'luceroleandrosebastian', 'd8005f56619305c1e877ff83fd41e393'),
(184, 'MAB003', 4, 'MARTINEZ MARIA CLERIA', 'CALLE 15 NÂº 4711', 'BERAZATEGUI', '4259-7657', 'todofiestacotillon@yahoo.com.ar', 'martinezmariacleria', '9743b346ae4c81ebf348fbb90a4a54e6'),
(185, 'MAB004', 4, 'MARINUCCI FEDERICA', 'ALVEAR 402', 'MARTINEZ', '0', '0', 'marinuccifederica', '8f00ec5f4f54ed84660cc47a35d4b262'),
(186, 'MAB007', 4, 'MARIA LAURA TRONCOSO', 'CALLE 163 NÂº 553', 'BERNAL', '0', '0', 'marialauratroncoso', 'e2b1ca8541f15019732b54815ef5df4d'),
(187, 'MAB010', 4, 'ROBERTO MAZZUCCHELLI', 'SUIPACHA 640', 'MERLO', '0', '0', 'robertomazzucchelli', '47b2abe93f6e99223976168f9bba3f40'),
(188, 'MAC001', 4, 'MACIA HNOS. Y CIA. S.R.L.', 'CULPINA 744', 'CAPITAL FEDERAL', '4612-6365', 'maciaalberto69@hotmail.com', 'maciahnosyciasrl', 'bbf92d61b7e021e4d1cdb8b6e4340f6c'),
(189, 'MAC002', 4, 'MOSTO ADRIAN', 'LISANDRO DE LA TORRE 3663', 'CAPITAL FEDERAL', '4602-8218', '0', 'mostoadrian', '02fdcc604c3d630f99fa6830d7d20f3c'),
(190, 'MAC003', 4, 'JORGE GUSTAVO MARTINELLI', 'PTE. PERON 2875', 'CAPITAL FEDERAL', '4864-4875', '0', 'jorgegustavomartinelli', '2702e66f3641778f18a9af71cdf9512a'),
(191, 'MAC004', 4, 'MARTINEZ MAXIMILIANO', 'AV. PATRICIOS 1028', 'COMODORO RIVADAVIA', '0', 'lareposteria@yahoo.com.ar', 'martinezmaximiliano', '88f3868b28ad63e16340614b595bcbe5'),
(192, 'MAC005', 4, 'MARINI LASTENIA RENE', 'RIVERA INDARTE 225', 'CORDOBA', '0', '0', 'marinilasteniarene', '960ef88d2ce88a7f21bc92a41f32aba9'),
(193, 'MAC009', 4, 'MARANA S.R.L.', 'AV. SABATTINI 245', 'VILLA MARIA', '0353-4536305', 'emepe@arnetbiz.com.ar', 'maranasrl', 'fad52dfaea253fd0f22fe2c7acd0f293'),
(194, 'MAE001', 4, 'MALABA S.R.L.', 'CONCEJAL VEIGA 1386', 'CONCORDIA', '0345-4210309', 'distribuidorajlc2012@gmail.com', 'malabasrl', '6d8e0f73c729f19e100f70619a283f2c'),
(195, 'MAM001', 4, 'MAYORGA Y BONAFEDE S. H.', 'MAZA 2451', 'GUTIERREZ', '0261-4979416', 'noguelinsumos@gmail.com', 'mayorgaybonafedesh', 'dd237653aba418fa472e97894a1ba402'),
(196, 'MAR001', 4, 'MAMUSCHKA S.R.L.', 'MITRE 298', 'S. C. BARILOCHE', '0294-4423294 INT. 103', 'proveedores@mamuschka.com', 'mamuschkasrl', 'a9d1c0db83e615834a6d2f096067e346'),
(197, 'MAS001', 4, 'MARINO S.R.L.', 'BV. 27 DE FEBRERO 3272/86', 'ROSARIO', '0341-4311314', 'administracion@marinosrl.com.ar', 'marinosrl', '0f0c0a79c1c50429332dddcb9e77cb6b'),
(198, 'MAS002', 4, 'MARINELLI VIVIANA G.', 'GRAL. C. ALVEAR 4402', 'SANTA FE', '0342-4562604', 'vivig_marinelli@yahoo.com.ar', 'marinellivivianag', '2c11042d292d253d870fd5373f967eb2'),
(199, 'MAT001', 4, 'MARTINEZ MARIA BEATRIZ', 'ALVAREZ CONDARCO 55', 'S. MIGUEL DE TUCUMAN', '0', 'lareposteradelnoa@yahoo.com.ar', 'martinezmariabeatriz', '4937783a0b868a1259602d1665d7953d'),
(200, 'MBA001', 4, 'MB AUTOS S.A.', 'AV. JUAN B. ALBERDI 5024-1Âº P', 'CABA', '4684-0656', 'ventas@mbservicios.com.ar', 'mbautossa', '46bd5f60d4ce3f1ef0729266e0baeb08'),
(201, 'MEC001', 4, 'MENDES NUNES GABRIEL F.', 'SARMIENTO 1541', 'COMODORO RIVADAVIA', '0297-4064157', 'mendesnunesg@hotmail.com', 'mendesnunesgabrielf', '33a4d43a5cb020cb21e549ff2ec8a671'),
(202, 'MEC003', 4, 'MENDES NUNES ANDREA', 'SAN MARTIN 681', 'COMODORO RIVADAVIA', '0', 'lacalesita2@hotmail.com', 'mendesnunesandrea', '7cf6ee427d9ec68bc7ec1656490f7f63'),
(203, 'MIB002', 4, 'EDUARDO H. MILA', 'VARELA 1133', 'CAPITAL FEDERAL', '4634-1872', 'ruta6club@gmail.com', 'eduardohmila', '88e10e8c2554dd29481a51fb97039c29'),
(204, 'MIC001', 4, 'MAURICIO MIORI', 'SAN JERONIMO 2498', 'CORDOBA', '0', '0', 'mauriciomiori', '07d7315f6aab0e9c547998f89a4fe927'),
(205, 'MMB001', 4, 'MARIANELA MAS', 'HIPOLITO YRIGOYEN 830', 'PACHECO', '4726-3000', 'cotymasexpress@hotmail.com', 'marianelamas', '139a745e899d1fe64479aa2fb1a31057'),
(206, 'MMB002', 4, 'MERINO MARTIN LUCAS', 'DE LOS INMIGRANTES 435', 'MAR DEL PLATA', '0223-4103755', '0', 'merinomartinlucas', '89dae354594acc09f03d5e129db49de7'),
(207, 'MNC001', 4, 'MONICA PAROLINI', 'EMILIO LAMARCA 2634', 'CABA', '0', '0', 'monicaparolini', '8bfbbf4b4c6ccdd41ea569e02e116c42'),
(208, 'MNJ001', 4, 'MAZALA NILDA - COT. FRANQUITO', 'REP. DEL LIBANO 378', 'PERICO', '0', 'nildamazala@hotmail.com', 'mazalanildacotfranquito', 'f918ae04019c11262c37d566c5e14577'),
(209, 'MOB001', 4, 'CHRISTIAN MOYA', 'AV. 3 Y PASEO 130 2995', 'VILLA GESELL', '15-53434382', 'moyasur@hotmail.com', 'christianmoya', '3340a5244434436e486a7da2bc650324'),
(210, 'MOB002', 4, 'MORETTO ADRIANA BEATRIZ', 'ALBARELLOS 1310', 'MARTINEZ', '4792-4032', 'cotillon-alas@hotmail.com', 'morettoadrianabeatriz', 'f264818af32b58a5fff00c7ca050dad2'),
(211, 'MOC001', 4, 'HASNE DE MORANDI ANA M.', 'DOMINGA CULLEN 357', 'SAN FRANCISCO', '0', 'morpack@hotmail.com.ar', 'hasnedemorandianam', '838282373ed254d833adb86c6d69807f'),
(212, 'MOC002', 4, 'MONUMENTAL DEL PLATA S.A.', 'AV. SCALABRINI ORTIZ 119', 'CAPITAL FEDERAL', '4855-9023/8152', 'silvia@monumentaldelplata.com.ar', 'monumentaldelplatasa', '0bea1ca58a3d38ad71332e97981a127d'),
(213, 'MOC003', 4, 'MORENO CLAUDIA ANDREA', 'SAN MARTIN 515', 'CORDOBA', '0351-4248857/4284230', 'norbertobruno@hotmail.com', 'morenoclaudiaandrea', '9a9c764a4c45a324c3a38f2a56e006a2'),
(214, 'MOC004', 4, 'ALICIA GONEL DE MONTOYA', 'COLON 387', 'RIO CUARTO', '0358-4625637', 'imperpack_ali@hotmail.com', 'aliciagoneldemontoya', '83517ce2843132ce4c8fd9348362ba6e'),
(215, 'MOC005', 4, 'MONTI PABLO SIMON', 'RODRIGUEZ PEÃ‘A 675', 'CURUZU CUATIA', '0', 'hectormonti@curuzu.net', 'montipablosimon', 'bd19b2d49bb5024fa9d4b96ec8321e8f'),
(216, 'MPB002', 4, 'MATPRI S.R.L.', 'AV. SAN MARTIN 2491', 'FLORIDA', '4837-9136', 'hoc@materia-prima.com.ar', 'matprisrl', '2ee4f121a6d0e48c1cbe390c85cf511c'),
(217, 'MPC001', 4, 'MORONI PABLO', 'REP. DE ISRAEL 77', 'CORDOBA', '0', 'macacotillon@gmail.com', 'moronipablo', 'a7021365d2fc1caed2b51c2b515cbd61'),
(218, 'MUB001', 4, 'MUNDO PASTEL-C. RESTUCCI', 'CALLE 44 NÂº 1088', 'LA PLATA', '0221-4821505', 'cristinarestucci@yahoo.com.ar', 'mundopastelcrestucci', 'd037b55667c49e9656077804f8ce8c1b'),
(219, 'MUB003', 4, 'CARLOS NICOLAS MULLER', 'RIVADAVIA 2345', 'LOS POLVORINES', '4664-0374/4663-0139', '0', 'carlosnicolasmuller', '28c5ba59b60ca553bc0653ee5b76caaa'),
(220, 'NAS001', 4, 'NAGEL DIEGO ELIAS', 'GABOTO 6847', 'SANTA FE', '0', 'cotillon.lodemartinez@gmail.com', 'nageldiegoelias', 'ef5c846b60b6254dc3eb5c64f08557e6'),
(221, 'NEB001', 4, 'NEZONI S.A.', 'AV. LURO 3934', 'MAR DEL PLATA', '0', 'todoresuelto@infovia.com.ar', 'nezonisa', '9bd59f283698e830727b8f84a338ee36'),
(222, 'NEB002', 4, 'NEW COT ARGENTINA S.A.', 'LAVALLE 618', 'QILMES', '0', '0', 'newcotargentinasa', '1c885276af6c2e6a0ce8bae5e63637e2'),
(223, 'NOB001', 4, 'NOVOA HECTOR ANDRES', '25 DE MAYO 25', 'MORON', '0', '0', 'novoahectorandres', '90575680afd33c71a50003217f3887b0'),
(224, 'NOB002', 4, 'HERMIDA NORBERTO', 'PILCOMAYO 779', 'ALDO BONZI', '0', '0', 'hermidanorberto', '69286fec5077db4abb1a1f5ed8435e19'),
(225, 'OBB001', 4, 'OBLEAS S.R.L. (KAAS)', 'FRIAS 2890', 'BANFIELD', '4231-9101', 'obleas@gmail.com', 'obleassrl(kaas)', '288447f1dd06f8fcbec64758e4080cc0'),
(226, 'OGB001', 4, 'OUTON G. - P. Y M. S. H.', 'CACHI 212', 'CAPITAL FEDERAL', '4911-8686/9586', 'gustavo.outon@dgmweb.com.ar', 'outongpymsh', '74996a680fd459af416998af2136a499'),
(227, 'ONC001', 4, 'ONROVIL S. A.', 'ESMERALDA 776', 'CAPITAL FEDERAL', '4322-7754/7652', 'brocolino.oficina@gmail.com', 'onrovilsa', '2214427d499e0ce00c41e24914aaedaf'),
(228, 'OPB001', 4, 'ORIENTAL PARTY S.R.L.', 'TUCUMAN 2224 PISO 2Âº A', 'VILLA LIBERTAD', '4713-3872', 'gerardo@cotilloncasaalberto.com.ar', 'orientalpartysrl', '9d985b726618c9b04abeefab0a001e7e'),
(229, 'ORC001', 4, 'LEONARDO ORZAN', 'ITUZAINGO 363', 'CORDOBA', '0', 'cotillon.todofiesta@hotmail.com', 'leonardoorzan', '3611d0875eec702639291b9e98c88f5b'),
(230, 'ORC002', 4, 'ORBEGOZO MARIA MONICA J.', 'THAMES 2189', 'CAPITAL FEDERAL', '4774-2979', '0', 'orbegozomariamonicaj', '5c8f46866f8bedb42dde2b043ea94d1a'),
(231, 'ORT002', 4, 'MIGUEL ORTEGA', 'MENDOZA 775', 'S. MIGUEL DE TUCUMAN', '0', 'gabrielrigo@gabrielrigo.com.ar', 'miguelortega', '6fc7b7d0c3c5415a4d50a027d707ac9e'),
(232, 'OSB001', 4, 'COTILLON OSITO PANDA SH', 'ESTOMBA 262', 'BAHIA BLANCA', '0291-4565020', 'ositopandaconsultas@gmail.com', 'cotillonositopandash', '18169ae5cdb7890293b11f9ecbb865d8'),
(233, 'OTM001', 4, 'OTTERO MABEL L-COTIDIET', 'MOLDES 1023 LOCAL 33', 'GUAYMALLEN', '0261-4059183', 'cotidiet@yahoo.com.ar', 'otteromabellcotidiet', '464e1b788861295788f88f847d181696'),
(234, 'PAB001', 4, 'PAEZ ALFREDO ORLANDO', 'RAFAELA 3287 PISO:PB DPTO:B', 'CIUDADELA', '0', '0', 'paezalfredoorlando', 'f6124352e91c16e7c210d8348d4ed47d'),
(235, 'PAB005', 4, 'SONIA M. PAEZ', 'D''ONOFRIO 176', 'CIUDADELA', '0', '0', 'soniampaez', '408153787479017bbf5d20674e13c512'),
(236, 'PAB006', 4, 'PATAY S. R. L.', 'BARTOLOME MITRE 189', 'JUNIN', '0236-4420828', 'fernanda@pataysrl.com.ar', 'pataysrl', 'ec45fc1db1ed7a667c3f6c741c68c5aa'),
(237, 'PAB007', 4, 'PAZ OLGA ARGEMINA', 'SIMON PEREZ 4535', 'GONZALEZ CATAN', '0', '0', 'pazolgaargemina', '4846f9283ea48c3db8a07137fe03c33c'),
(238, 'PAC002', 4, 'ADRIAN PALERMO', 'ANGEL GALLARDO 231', 'CAPITAL FEDERAL', '4857-5863', 'adrianpalermo@gmail.com', 'adrianpalermo', '208ab11e4b1822b44feed85b9c5165df'),
(239, 'PAC003', 4, 'PACK EXPRESS S.R.L.', 'AV. BOEDO 452', 'CAPITAL FEDERAL', '4931-5123/0670/0607', 'santiago@packexpress.com.ar', 'packexpresssrl', '111ab4de6e4dbf622dfd888d0131bda6'),
(240, 'PAM002', 4, 'PADILLA JORGE RAUL', 'PAROISSIEN 532', 'SAN JOSE', '0261-4454095', '0', 'padillajorgeraul', '714794651a372267c7f571a998e2df75'),
(241, 'PEB001', 4, 'PETERS HNOS. C.C.I.S.A.', 'JUAN BAUTISTA ALBERDI 5364', 'CASEROS', '4811-9302/4716-1293', 'sramirez@peters.com.ar', 'petershnosccisa', 'd49b4310da83bc634818cc177874fa3b'),
(242, 'PEB002', 4, 'PRODUCTOS EDULI S.R.L.', 'AV. SAN MARTIN 5446', 'CIUDAD MADERO', '4652-1499/6006', 'compras@eduli.com.ar', 'productosedulisrl', '1d0836c46613868094ca108dfc06a518'),
(243, 'PEB003', 4, 'RUSSO GISELA CARINA', 'DEL VALLE IBARLUCEA 3046', 'GERLI', '4241-1955', '0', 'russogiselacarina', '934a259743133ff8e341003406ba38e4'),
(244, 'PEB005', 4, 'PEREZ ANDREA VALERIA', 'BOULOGNE SUR MER 1371', 'TAPIALES', '4442-5271', '0', 'perezandreavaleria', '073f0b2788a81f1f4a1fbd026b4ba3d3'),
(245, 'PEC001', 4, 'GUILLERMO PELLEGRINI', 'VELEZ SARSFIELD 130', 'RIO CUARTO', '0', 'mipayasocotillon@mipayasocotillon.com', 'guillermopellegrini', 'edcc5216abd1cae70ee03e7fc4b34017'),
(246, 'PEC002', 4, 'PEREZ CONTRERAS OLGA M.', 'BELISARIO ROLDAN 299', 'ALTA GRACIA', '03547-427999', 'haigolosinas@gmail.com', 'perezcontrerasolgam', '74f88b89c2661cccf26e02167d36258b'),
(247, 'PES002', 4, 'PEREZ FEDERICO PABLO', 'MORENO 2724', 'ROSARIO', '0341-4824225', 'fpinsumos@yahoo.com.ar', 'perezfedericopablo', '728ac72f541a5a2d0a24c2396c335c00'),
(248, 'PGB001', 4, 'PALLANTE GERALDINA', 'DR. IGNACIO ARIETA 1296', 'VILLA LUZURIAGA', '4461-2621', 'geraldina_pallante@yahoo.com.ar', 'pallantegeraldina', 'd75bb7de5e620dfb61c7afe03bef88c3'),
(249, 'PIB001', 4, 'MARIA ROSARIO PIETRANTUONO', 'PIROVANO 1017', 'MONTE CHINGOLO', '4246-2377', 'distribuidora.heidi@gmail.com', 'mariarosariopietrantuono', '2c41679b64099eb72eecf5b1f6a6f905'),
(250, 'PIB002', 4, 'FERNANDO PITRELLA', 'EISTEIN 99', 'JOSE C. PAZ', '02320-446656', 'distribuidoraprovincial@yahoo.com.ar', 'fernandopitrella', '450224cdc1417e3d91a2bc2435e19a52'),
(251, 'PIB003', 4, 'PICCIOLA ALEJANDRO', 'AV. 44 NÂº 2201 ESQ. 139', 'LA PLATA', '0221-4701171', 'cotillonvictoria@hotmail.com', 'picciolaalejandro', '3fb81da2f6b9a100a9694370b8654608'),
(252, 'PJB001', 4, 'PEREZ JORGE Y PEREZ EMILIANO SH', 'RIO NEGRO 737', 'BAHIA BLANCA', '0291-4555814', 'administracion@distribuidoralapaz.com.ar', 'perezjorgeyperezemilianosh', '45722e26eb4e8ac2bd51ddd244a4faa7'),
(253, 'PJJ001', 4, 'POLONIA JAIN', 'JUAN B. ALBERDI 251', 'PERICO', '0', 'csaikita@hotmail.com', 'poloniajain', '2217e14577db29ac82d0109ee0d33e2a'),
(254, 'PLC002', 4, 'PROCOPIO LAURA VERONICA', 'MANUELA PEDRAZA 5347', 'CAPITAL FEDERAL', '6698-6839', 'davismercado2010@hotmail.com', 'procopiolauraveronica', '1d01b7755cefede43448b8352ebec900'),
(255, 'PRB004', 4, 'NORMA PROVENZANO', 'AV. LURO 7660', 'MAR DEL PLATA', '0223-4773410', 'info@reposteriachocolate.com.ar', 'normaprovenzano', '2c2e1c752037ab91b73b46d5dc4a34f2'),
(256, 'PUC001', 4, 'PUERTO ALEGRIA S.R.L.', 'BUENOS AIRES 376', 'CORDOBA', '0', '0', 'puertoalegriasrl', 'bdeac6bed0e3790aeaf7d0279f31aa48'),
(257, 'QUB002', 4, 'VIVIANA DE LA QUINTANA', '9 DE JULIO 1320', 'LANUS ESTE', '4249-1025', '0', 'vivianadelaquintana', '704377944a5a5fdc1af959f43c0174b1'),
(258, 'RAB001', 4, 'REPOSTERIA ARTESANAL S.R.L.', 'AYACUCHO 2767', 'SAN ANDRES', '4713-3614/3872', 'gerardo@cotilloncasaalberto.com.ar', 'reposteriaartesanalsrl', '4b275d93d25283e478fa12e39311fbe0'),
(259, 'RAC002', 4, 'RANTI S.R.L.', 'AMENABAR 1202', 'CAPITAL FEDERAL', '4783-0975', '0', 'rantisrl', '1cc107a8c907524d582db6e019cdf16b'),
(260, 'RBB001', 4, 'RANIERI BEATRIZ YOLANDA', 'JUAN. M. DE ROSAS 3261', 'CASEROS', '0', '0', 'ranieribeatrizyolanda', '94236b32d979ab13760ec7693a912654'),
(261, 'RCB001', 4, 'ROBERTO ANTONIO COSTA', 'ALTOLAGUIRRE 330', 'TAPIALES', '4622-3120', 'confiteriariviera@gmail.com', 'robertoantoniocosta', '85f8a14e8d35235db636bff2267882f5'),
(262, 'RDB001', 4, 'RATTO Y DARMAN S.R.L.', 'GORRITI 48', 'LA TABLADA', '4454-6539', '0', 'rattoydarmansrl', '502a40cebd192e12b43d857e4c5446d2'),
(263, 'REB001', 4, 'FABIAN E. REQUENA', 'RIVADAVIA 3285', 'MAR DEL PLATA', '0', '0', 'fabianerequena', 'ecaf8e5a1c44da3d81abcccfe016c226'),
(264, 'REC001', 4, 'RECOR S.R.L.', 'AV. 25 DE MAYO 963', 'RESISTENCIA', '03624-423203/424201', 'recorsrl@arnetbiz.com.ar', 'recorsrl', '7b3ab1360bf59d351bf652103551f10e'),
(265, 'REC002', 4, 'RECOR S.R.L.', 'AV. PEDRO FERRE 1949', 'CORRIENTES', '0', 'compras_recorsrl@arnetbiz.com.ar', 'recorsrl', '9ed0938da84efec47c6980ef4d0b60ee'),
(266, 'REC005', 4, 'RETAMOZO JESICA MARIA', 'FOURNIER 2950', 'CABA', '4918-4331', 'jmrtortasdecoradas@gmail.com', 'retamozojesicamaria', 'ccbd2f54a601b934b01fc620caf3720f'),
(267, 'REM001', 4, 'RECOR S.R.L.', 'PEDRO MENDEZ 2294', 'POSADAS', '03764-435273/426251', 'compras_recorsrl@arnetbiz.com.ar', 'recorsrl', 'f6d29601eb6ac375c0fb68860ee7e5b9'),
(268, 'RHB001', 4, 'RECIEN HORNEADO S.A.', 'L. DE LA TORRE 1609', 'LA TABLADA', '4454-0066', 'andrea@quijotelunch.com.ar', 'recienhorneadosa', 'eded1a16ff109a06df1120b7ecf7c73d'),
(269, 'RIB002', 4, 'JORGE RIVADENEIRA', 'SARMIENTO 836', 'MORON', '4483-3039', '0', 'jorgerivadeneira', 'e49833625c940e821046bd6a0adbf76f'),
(270, 'RIC001', 4, 'RIESTRA SILVIA BEATRIZ', '25 DE MAYO 321', 'PUERTO MADRYN', '0', 'regaleria@speedy.com.ar', 'riestrasilviabeatriz', 'ff66a74a911f3bba7b4a3f1d788437bd'),
(271, 'RIC002', 4, 'RICALDONE S. A.', 'ESMERALDA 776', 'CAPITAL FEDERAL', '4322-7754', '0', 'ricaldonesa', '8f4c519c3092a385f6d8c400e50b52af'),
(272, 'RIE001', 4, 'RIOS MARIA NELIDA', 'SAN MARTIN 1120', 'PARANÃ', '0', 'jmk_pna@hotmail.com', 'riosmarianelida', 'c341128df5fbae942150ef809c3edbb9'),
(273, 'RIM001', 4, 'RINCA S.A.', 'AV. ESPAÃ‘A 1544', 'MENDOZA', '0261-4292648', 'eltupinamba@hotmail.com', 'rincasa', '1b3d9045609078519ae287d2cec4819c'),
(274, 'RJB001', 4, 'RUIZ JUAN CLAUDIO', 'VICENTE LOPEZ 2402', 'BAHIA BLANCA', '0291-4883846', 'fliaruizurban@gmail.com', 'ruizjuanclaudio', 'bdbb9672ac909b2c583722435eeb3d31'),
(275, 'RJC001', 4, 'DISTR. RJ DE LANFRANCO R Y LANFRANCO J', 'CHICLANA 73', 'TRELEW', '0280-4428787', 'distribuidora-rj@outlook.com', 'distrrjdelanfrancorylanfrancoj', '126032c9c42254c821998ba7558e3537'),
(276, 'RLJ001', 4, 'ROSENBLUTH LUCIANA', 'J. M. GORRITI 927', 'S. SALVADOR DE JUJUY', '0', 'gabrielrigo@gabrielrigo.com.ar', 'rosenbluthluciana', '46926dbfc8ee7c28e123fc1ed7afc9a5'),
(277, 'ROB001', 4, 'ROLDAN SILVIA DEL VALLE', 'JULIO VERNE 4558', 'NUEVE DE ABRIL', '0', '0', 'roldansilviadelvalle', 'f73a3bd35614a72847d67f0a0fa3563f'),
(278, 'ROC004', 4, 'RODRIGUEZ PAULO ALBERTO', 'SANTA ROSA 396', 'CORDOBA', '0351-4243302', '0', 'rodriguezpauloalberto', '292514c97e8fec63408cda8aa1f51c5a'),
(279, 'ROT001', 4, 'DANIEL ROMERO', 'DON BOSCO 1622', 'S. MIGUEL DE TUCUMAN', '0341-4321819', 'clowncotillon@arnet.com.ar', 'danielromero', 'cc40cc8b183673dc297d26944b420f0b'),
(280, 'RUN001', 4, 'RULITO''S S.A.', 'SARMIENTO 574', 'NEUQUEN', '0299-4432319/4429670', 'alicia@cotillonrulitonqn.com.ar', 'rulito''ssa', 'fb69d66d0fa2f39d5a7f320913606e26'),
(281, 'SAB001', 4, 'SALECIANO S.R.L.', 'GOBERNADOR UGARTE 3650', 'REMEDIOS DE ESCALADA', '4267-3985/5100', 'clamor@speedy.com.ar', 'salecianosrl', '29c8686155bdb7c4cb39ac52ebcbbb1a'),
(282, 'SAB004', 4, 'SAMARCO S. R. L.', 'AV. EVA PERON 1341', 'GRAND BOURG', '02320-412806', '0', 'samarcosrl', 'b776b6752db43f88d2af97422e81870d'),
(283, 'SAJ002', 4, 'SAIQUITA LUCIANA M.', 'VILLAFAÃ‘E 443', 'PERICO', '0', 'magsaiquita@hotmail.com', 'saiquitalucianam', '6af40eeee43bca4839d9d08b9d83f15a'),
(284, 'SCB001', 4, 'NOEMI E. SCIANCA', 'CALLE 13 NÂº 260', 'LA PLATA', '0221-4229025', 'nscianca@hotmail.com', 'noemiescianca', '7bca4d3e151ef8fab3836b9351954eda'),
(285, 'SCB002', 4, 'SCALETZKY IRENE BEATRIZ', 'AV. NAZCA 1758', 'CAPITAL FEDERAL', '4581-2048', 'info@la-repostera.com.ar', 'scaletzkyirenebeatriz', '84c9feadf7f77b7b3bcd139c5cd8306d'),
(286, 'SCB003', 4, 'SCHAVLOVSKY JUAN CARLOS', 'AV. HIPOLITO YRIGOYEN 10421', 'TEMPERLEY', '4231-7994', 'juanschlavo@yahoo.com.ar', 'schavlovskyjuancarlos', '645a422d45344d0b0d8fe00df5823df7'),
(287, 'SCB005', 4, 'JUAN CARLOS SCIGLITANO', 'LOPEZ MAY 3132', 'G. DE LAFERRERE', '4467-7248', '0', 'juancarlossciglitano', 'fc9f584b56b9cff5d9fa3ff5e50a15e4'),
(288, 'SEB001', 4, 'JORGE SENRA', 'AV. VELEZ SARFIELD 928', 'CIUDAD MADERO', '4622-3874', '0', 'jorgesenra', '2dc4d86acc1eeefea619623aa6f36e11'),
(289, 'SFS001', 4, 'SBROCCO FRANCO AUGUSTO', 'ABSALON ROJAS 208', 'SANTIAGO DEL ESTERO', '0', 'gabrielrigo@gabrielrigo.com.ar', 'sbroccofrancoaugusto', '1364b6e9aca94c5d0bfc8a6aca91f6a1'),
(290, 'SGB001', 4, 'SAEZ MARIO GUSTAVO', 'JOSE ALICO 1195', 'ALDO BONZI', '4442-7566', '0', 'saezmariogustavo', 'cf407da496cbb15b267ebd4d323bb5a7'),
(291, 'SGB002', 4, 'SGALIPPA MIRTA ELENA', 'AV. CARLOS ARROYO 115', 'CARLOS CASARES', '02395-453453', 'cotillontf@hotmail.com', 'sgalippamirtaelena', '06d89320e16013052ecbe9b7e029d7e5'),
(292, 'SGC001', 4, 'SONZINI GLORIA MERCEDES', 'CARLOS PELLEGRINI 935', 'COMODORO RIVADAVIA', '0297-4060000', 'cotillondelcentro@gmail.com', 'sonzinigloriamercedes', 'f40ffeedec02ce579a5ef49b84a3f51b'),
(293, 'SIB001', 4, 'VICTOR SILVA', 'LA PINTURA 11035', 'MORENO', '02320-450886', 'mandyrs87@gmail.com', 'victorsilva', 'e35c529fa0369386b16afcb20bb27dc0'),
(294, 'SIS002', 4, 'SIGLO XXI S.R.L.', 'SALTA 68', 'SANTIAGO DEL ESTERO', '0385-4222299', 'negromoya@gmail.com', 'sigloxxisrl', 'b6b3d0bddf8a5516e17d355a2b6d6005');
INSERT INTO `usuarios` (`id`, `codigo`, `categoria`, `nombre`, `domicilio`, `localidad`, `telefono`, `mail`, `user`, `pass`) VALUES
(295, 'SIS003', 4, 'SILVA MARINA Y SILVA NATALIA S.H.', 'ARTIGAS 641', 'SAN LORENZO', '03476-422123', 'compras@elnuevorepostero.com.ar', 'silvamarinaysilvanataliash', 'b9b7d6ac13dd437e659ca88d75997ac0'),
(296, 'SMC001', 4, 'SMILE S.R.L.', 'ESQUIU 473', 'CORDOBA', '0', 'gabrielrigo@gabrielrigo.com.ar', 'smilesrl', 'eafb898ca36c722a697d27393a08b71a'),
(297, 'SMN001', 4, 'SANDRA AGUSTINA MARTIN', 'PASTEUR 780', 'NEUQUEN', '0299-4435766', 'sandramartinnqn@hotmail.com', 'sandraagustinamartin', '4e0a1eade173a105c8f8d18eb748b765'),
(298, 'SOB002', 4, 'SOLE MARTIN IGNACIO', 'CALLE 26 NÂº 4374', 'CITY BELL', '0', '0', 'solemartinignacio', '2e246a4e9a581516beacf05abe70c2aa'),
(299, 'SOB003', 4, 'SOTO ALICIA', 'LAVALLOL 1044', 'HAEDO', '4659-9156', 'elchanguitosoto@hotmail.com', 'sotoalicia', 'dd1f60611f5f0276de32cf3b238b360d'),
(300, 'SOS001', 4, 'MARTIN ROBERTO SORIA', 'GABOTO 1881', 'SANTO TOME', '0342-4744944', 'lacasadelasgalletitassrl@yahoo.com.ar', 'martinrobertosoria', 'd96414472460bfd083dd9ee25665ac32'),
(301, 'SSC001', 4, 'SUGAR & SPICE S.R.L.', 'GUATEMALA 5415', 'CAPITAL FEDERAL', '4777-5423', 'fabiana@sugarandspice.com.ar', 'sugar&spicesrl', '224d0f78a879e238c28b9c79c7708cde'),
(302, 'STB001', 4, 'ALDO STAFFOLANI', 'RIVADAVIA 1659', 'LINCOLN', '02355-423561', 'aldo@cotillonpibes.com.ar', 'aldostaffolani', '5aa54fad8f1b0141cd21affd4d65c341'),
(303, 'STB002', 4, 'GUSTAVO N. STAFFOLANI', 'BENITO DE MIGUEL 482', 'JUNIN', '0236-434365', 'gustavo@cotillonpibes.com.ar', 'gustavonstaffolani', 'e16de1b488ec12a716b39c0a8f3cf636'),
(304, 'STB004', 4, 'STATEX S.A.C.I.F.', 'DIAZ VELEZ 4268', 'MUNRO', '4762-4819', '0', 'statexsacif', '317f93153e53e515fcbbcd45879b3e33'),
(305, 'SUB002', 4, 'CARLOS ROMUALDO SUELDO', 'SARMIENTO 787', 'MORON', '4627-6196', '0', 'carlosromualdosueldo', '500e24f04411143913926fc005287bc4'),
(306, 'SUC001', 4, 'SUAREZ DEL CERRO MARGARITA', 'DEL BARCO CENTENERA 295', 'CAPITAL FEDERAL', '4902-5917', 'caballito@suarezdelcerro.com.ar', 'suarezdelcerromargarita', 'e0f61d4a75b3aac307b2dab9c3d64fae'),
(307, 'SUS001', 4, 'SUAREZ EMILSE ELIDA', '25 DE MAYO BIS 649', 'ROSARIO', '0341-4510251/4510086', 'gustavo@suarezmayorista.com.ar', 'suarezemilseelida', 'f5814c6336cb85f10e5aa76d8357cbbd'),
(308, 'SUS002', 4, 'SUC. DE PERVERSI HUGO R.', 'ESPAÃ‘A ESQ. RIVADAVIA', 'LA BANDA', '0', 'cieloperversi@hotmail.com', 'sucdeperversihugor', 'b3d011fffb4f89e457c40982c623cc6c'),
(309, 'TES001', 4, 'TETUAN S.A.', 'EJERCITO DE LOS ANDES 823', 'SAN LUIS', '0266-4432036', 'comprasvalentino@gmail.com', 'tetuansa', '62492ca1394d44d1e6c9e2f8783843cf'),
(310, 'TFB001', 4, 'TODO FIESTA S.R.L.', 'AV. LOS QUILMES 69', 'BERNAL OESTE', '0', '0', 'todofiestasrl', 'd911e955214fb106ada18e682d97afa2'),
(311, 'TIC001', 4, 'TICORAL S.R.L.', 'LAVALLE 2318', 'CAPITAL FEDERAL', '4954-4433', 'noemi@ticoral.com', 'ticoralsrl', 'aa1553ef21b2701045a008e90b4faee3'),
(312, 'TMB001', 4, 'TORTAS MARIA RENEE', 'DELLA PAOLERA 952', 'MAR DEL PLATA', '0223-4792894/7887', 'info@mariarenee.com', 'tortasmariarenee', '42c6f399725ac7e321a7601ebff67656'),
(313, 'TOL001', 4, 'TODO COTILLON S.A.', 'AV. PEÃ‘ALOZA 1880', 'LA RIOJA', '0380-4438483', 'todocotillonsa@hotmail.com', 'todocotillonsa', '5edfb24c15e56473b6c4c8f6cb3e333c'),
(314, 'TPB001', 4, 'TODO PARA LA GASTRONOMIA SA', 'JUAN B. JUSTO 5978', 'MAR DEL PLATA', '0223-1833311', 'compras@tpgastronomia.com.ar', 'todoparalagastronomiasa', 'fe4cad3f1f0a5da324887ee83730d5ce'),
(315, 'TRB001', 4, 'NANCY F. P. DE TROVATO', 'BALCARCE 2957', 'OLAVARRIA', '02284-444977', 'nancysucasa@hotmail.com', 'nancyfpdetrovato', 'ee59f2fe39efa77ecfbfad719c0a6972'),
(316, 'TRB002', 4, 'TRIAGEN S.A.', 'VIRREY LORETO 2435', 'MUNRO', '4509-6696', 'triagensa@gmail.com', 'triagensa', '3900f3a3f9a939ed2cb4b1b7b69d4afc'),
(317, 'TRB004', 4, 'DANIEL TREVES', 'INDEPENDENCIA 1795', 'LUIS GUILLON', '4296-3656', '0', 'danieltreves', '4bc3f1c6d81c606ad4d9ab6ac35a59b9'),
(318, 'TRR001', 4, 'TRONADOR S. C. A.', 'MITRE 202', 'S.CARLOS DE BARILOCH', '02944-433999', 'fabrica@chocolatesrapanui.com.ar', 'tronadorsca', '7f205c896cced907bdd2d9983a9094b5'),
(319, 'TRT001', 4, 'TUCUMAN REPOSTERIA S.H.', 'PJE. PADILLA 63', 'SAN MIGUEL DE TUCUMA', '0381-4224395', 'papelshop@gmail.com', 'tucumanreposteriash', '68f751eb1b03377064c738d95c0171c2'),
(320, 'URB001', 4, 'GRISELDA UREÃ‘A', 'ARGENTINA 4924', 'LA TABLADA', '4694-0880', 'edu_millo@live.com.ar', 'griseldaureã‘a', '7d9827512ed46f5c3704a06b7863cfeb'),
(321, 'VAB001', 4, 'CELESTINO VAZQUEZ', 'BARTOLOME MITRE 1977', 'LUJAN', '02323-434587', '0', 'celestinovazquez', '260b136e597f0437303318fd26bc468d'),
(322, 'VAB002', 4, 'ARNALDO Y DANTE VALLEJOS', 'NECOCHEA 4244', 'LA TABLADA', '4454-2336', 'aldevash@speedy.com.ar', 'arnaldoydantevallejos', '68e49863c5a390e0f8796bf25ccf5a25'),
(323, 'VAB003', 4, 'VARANO ENRIQUE PEDRO', 'SANTA MARIA M. 3221', 'SAN JUSTO', '4651-4906', '0', 'varanoenriquepedro', '8c4ef36d7de821fa67acc57ca0c50a4e'),
(324, 'VAM001', 4, 'MARCELO VALDEZ', 'B.DITRA MZ D CASA 14', 'GUAYMALLEN', '0261-4266218', 'cotiva2011@hotmail.com', 'marcelovaldez', '967e1667ca6243f1f502cbba2c0e7d89'),
(325, 'VEB001', 4, 'CRISTINA E. VEGA', 'H. YRIGOYEN 1787', 'JOSE C. PAZ', '02320-425997', 'guillermoberselli@yahoo.com.ar', 'cristinaevega', 'f342e33336d4c1d1a287b2f98b168e91'),
(326, 'VEC001', 4, 'VETDIET S.A.', 'ROJAS 12', 'CABA', '4247-2800', 'dieteticalanus@outlook.com', 'vetdietsa', '005eaab67ae0f96328ad5e196eb5bf51'),
(327, 'VEC002', 4, 'VEGA JORGE GABRIEL', 'SARMIENTO 447', 'BARRIO CENTRO NORTE', '0351-4284536', 'productos_paz@hotmail.com', 'vegajorgegabriel', '6aaf822a9c98fbea621a67aa773cbb94'),
(328, 'VES001', 4, 'FABIAN VENTICINQUE', 'SAN JUAN 1096', 'ROSARIO', '0341-4326733/4114677', 'venticinquefabian@hotmail.com', 'fabianventicinque', '7e40bc2a27ee0872cc2d3f45195fc8af'),
(329, 'VHC001', 4, 'VALERIA HOFFMAN', 'HONDURAS 5874', '0', '15-5619-4491', 'info@caramelosartesanos.com.ar', 'valeriahoffman', '6d495c3ff186be83831d8364046a4649'),
(330, 'VHC002', 4, 'HECTOR VERDU', 'CORDOBA 265', 'CORRAL DE BUSTOS', '0', 'gabrielrigo@gabrielrigo.com.ar', 'hectorverdu', '524d639b7a64127c27d990ae28753fb4'),
(331, 'VIB001', 4, 'MARTIN R. VISCARDI', 'AV. PTE PERON 3930', 'MORON', '0', 'administracion@cotymania.com', 'martinrviscardi', '292a8b6995ba336758a2839cde2fc106'),
(332, 'VIB002', 4, 'VICENTE VICARIO', 'PRIMERA JUNTA 53', 'TAPIALES', '0', '0', 'vicentevicario', 'b813a0b87399d7060fb5a3123a2df500'),
(333, 'VIC002', 4, 'VICENTE MARIA BELEN', 'AV. STORNI 215 LOCAL 2', 'BARRIO PARQUE LICEO', '0351-4922741', '0', 'vicentemariabelen', '2e7f3f9c543b186ba1ddd1897d9efe11'),
(334, 'ZECATH', 4, 'CATHERINE PAVEZ', 'VALLE CENTRAL 1381 PUERTO ALTO', 'SANTIAGO DE CHILE', '0', '0', 'catherinepavez', 'b42a4a77774bb150df8244d4fb189563'),
(335, 'ZKATIE', 4, 'KAYROS S.A.', 'ISLA SOLEDAD 1721', 'USHUAIA', '0', 'ventas@cosmosushuaia.com.ar', 'kayrossa', '7fe84ea28aaf21d3d176b9b4af8ed697'),
(336, 'ZOB001', 4, 'ZODIAC S.H.', 'CHARCAS 421', 'RAMOS MEJIA', '4657-4683', 'cotillonmayoristadulces@hotmail.com', 'zodiacsh', 'fbd58bfd9da16802612ea6622138b469'),
(337, 'ZOE001', 4, 'ZORRAQUIN-CASSANO HECTOR', 'VELEZ SARSFIELD 27', 'CONCORDIA', '0345-4224765', 'distribuidorazorraquin@hotmail.com', 'zorraquincassanohector', '28a0c51cefbc1aef37b09402ceaa9c76'),
(338, 'ZUM002', 4, 'ZUIN S.R.L.', 'COBOS 1008', 'CNEL. DORREGO', '0', 'marielazuin@yahoo.com.ar', 'zuinsrl', '471f1bad47838c3bc7b17439e49962af'),
(351, '0000', 1, 'ADMIN', 'ADMIN', 'ADMIN', '32132121', 'admin@fleibor.com.ar', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `values`
--

CREATE TABLE IF NOT EXISTS `values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `values` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `values`
--

INSERT INTO `values` (`id`, `id_producto`, `type`, `values`) VALUES
(1, 1, 'envase', '{"1":["1","2"],"4":["3"]}'),
(2, 2, '"envase"', '{"3":["1"],"4":["3"]}'),
(3, 3, '"envase"', '{"3":["1"],"4":["3"]}'),
(4, 4, '"envase"', '{"5":["1"]}'),
(5, 5, '"envase"', '{"3":["1"]}'),
(6, 6, '"envase"', '{"3":["1"],"4":["3"]}'),
(7, 7, '"envase"', '{"5":["1"]}'),
(8, 8, '"envase"', '{"5":["1","4"]}'),
(9, 9, '"envase"', '{"17":["1"]}'),
(10, 10, '"envase"', '{"17":["1"]}'),
(11, 11, '"envase"', '{"17":["1"]}'),
(12, 12, '"envase"', '{"18":["1"]}'),
(13, 13, '"envase"', '{"11":["7","2"],"12":["9"]}'),
(14, 14, 'envase', '{"7":["2"],"16":["1","10"]}'),
(15, 0, '"envase"', 'null'),
(16, 15, '"envase"', '{"5":["1"]}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
