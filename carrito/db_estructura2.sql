-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-10-2013 a las 20:25:54
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prod_id`, `prod_cat_id`, `prod_nombre`, `prod_stock`, `prod_descripcion`, `prod_precio`, `prod_foto`) VALUES
(1, 3, 'Monitor 1', 10, 'Los monitores TV de lG son óptimos para el .', '150.00', '1.png'),
(2, 3, 'Monitor 2', 5, 'Los monitores TV de bgh son óptimos para el entretenimiento multimedia, ya sea para jugar, ver películas, ver TV, reproducir imágenes en movimiento y más. Disfrutá de estos productos en tu propia habitación, living o cualquier otra habitación que entretenga tu vida personal.', '170.00', '1.png'),
(3, 3, 'Monitor 4', 20, 'Los monitores TV de lG son óptimos para el entretenimiento multimedia, ya sea para jugar, ver películas, ver TV, reproducir imágenes en movimiento y más. Disfrutá de estos productos en tu propia habitación, living o cualquier otra habitación que entretenga tu vida personal.', '210.00', '3.png'),
(4, 3, 'Monitor 5', 30, 'Los monitores TV de lG son óptimos para el entretenimiento multimedia, ya sea para jugar, ver películas, ver TV, reproducir imágenes en movimiento y más. Disfrutá de estos productos en tu propia habitación, living o cualquier otra habitación que entretenga tu vida personal.', '200.00', '2.png'),
(6, 2, 'Heladera samrt tv', 80, 'esta es una heladera basada en la idea de poder ahorrar mucho en todo el tema de el filtrado de frio para eso se desarrollo el sitema anti hielo ', '8823.00', '6.png'),
(5, 3, 'Iphone', 10, 'El iphone es un teléfono versátil con muchas características que lo hacen muy bueno, no lo dude no lo compre', '1536.00', '4.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
