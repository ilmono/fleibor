-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-10-2013 a las 22:17:39
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `carro_comp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_parent_id` int(11) NOT NULL DEFAULT '-1',
  `cat_name` varchar(252) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_parent_id`, `cat_name`) VALUES
(1, -1, 'Computadoras'),
(2, -1, 'Celulares'),
(3, 1, 'Monitores'),
(4, 1, 'Discos Duros'),
(5, 2, 'Nokia'),
(6, 2, 'Motorola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `clien_id` int(11) NOT NULL AUTO_INCREMENT,
  `clien_nombre` varchar(250) NOT NULL,
  `clien_apellido` varchar(250) NOT NULL,
  `clien_email` varchar(250) NOT NULL,
  `clien_clave` varchar(250) NOT NULL,
  `clien_status` enum('Activo','Bloqueado') NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`clien_id`),
  UNIQUE KEY `clien_email` (`clien_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`clien_id`, `clien_nombre`, `clien_apellido`, `clien_email`, `clien_clave`, `clien_status`) VALUES
(1, 'Nombre Prueba', 'Apellido', 'prueba@unemail.com', '123456', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE IF NOT EXISTS `ordenes` (
  `orden_id` int(11) NOT NULL AUTO_INCREMENT,
  `orden_cliente_id` int(11) NOT NULL,
  `orden_total` decimal(11,2) NOT NULL,
  `orden_session_id` varchar(250) NOT NULL,
  `orden_fecha` date NOT NULL,
  PRIMARY KEY (`orden_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_detalles`
--

CREATE TABLE IF NOT EXISTS `orden_detalles` (
  `detalle_orden_id` int(11) NOT NULL,
  `detalle_producto_id` int(11) NOT NULL,
  `detalle_cant` int(11) NOT NULL,
  `detalle_precio` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_cat_id` int(11) NOT NULL,
  `prod_nombre` varchar(250) NOT NULL,
  `prod_stock` int(11) NOT NULL,
  `prod_descripcion` mediumtext NOT NULL,
  `prod_precio` decimal(11,2) NOT NULL,
  `prod_foto` varchar(250) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prod_id`, `prod_cat_id`, `prod_nombre`, `prod_stock`, `prod_descripcion`, `prod_precio`, `prod_foto`) VALUES
(1, 3, 'Monitor 1', 10, '', '150.00', '1.png'),
(2, 3, 'Monitor 2', 5, '', '170.00', '1.png'),
(3, 3, 'Monitor 4', 20, '', '210.00', '3.png'),
(4, 3, 'Monitor 5', 30, '', '200.00', '2.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
