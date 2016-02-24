-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-01-2014 a las 17:19:49
-- Versión del servidor: 5.5.33-1
-- Versión de PHP: 5.5.8-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e_clientes`
--

CREATE TABLE IF NOT EXISTS `e_clientes` (
  `i_idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `v_nombre` varchar(20) NOT NULL,
  `v_apellido` varchar(20) NOT NULL,
  `v_email` varchar(20) NOT NULL,
  `v_cedula` varchar(15) NOT NULL,
  `v_direccion` text NOT NULL,
  `v_telefono` varchar(20) NOT NULL,
  `v_ciudad` varchar(20) NOT NULL,
  PRIMARY KEY (`i_idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `e_clientes`
--

INSERT INTO `e_clientes` (`i_idcliente`, `v_nombre`, `v_apellido`, `v_email`, `v_cedula`, `v_direccion`, `v_telefono`, `v_ciudad`) VALUES
(1, 'Cliente1', 'Clienteuno', 'cliente1@dom.com', '12345678', 'Av. 1 calle 2 casa 3', '555-54321', 'Ciudad1'),
(2, 'Cliente2', 'Clientedos', 'cliente2@dom.com', '8754321', 'Av. 2 calle 3 casa 4', '555-321789', 'Ciudad2'),
(3, 'Cliente3', 'clientetres', 'cliente3@dom.com', '13455678', 'Av. 3 calle 4 casa 5', '555-2132456', 'Ciudad3'),
(4, 'Cliente4', 'Clientecuatro', 'cliente4@dom.com', '9456123', 'Av. 4 calle 5 casa 6', '555-789456', 'Ciudad4'),
(5, 'Cliente5', 'Clientecinco', 'cliente5@dom.com', '14567890', 'Av. 5 calle 6 casa 7', '555-123456', 'Ciudad5'),
(6, 'Cliente6', 'Clienteseis', 'cliente6@dom.com', '6123487', 'Av. 6 calle 7 casa 8', '555-321789', 'Ciudad6'),
(16, 'dasdsad', 'dsadasdsa', 'das@dsa.ad', 'dsadsadsa', 'dsadasdasdas', 'dasdasda', 'dasdasda'),
(17, 'Accsa', 'Casas', 'cas@aad.com', '1231564156', 'cascacsacsa ascsaca asc sac acsas', '132115845', 'casaca'),
(20, 'Pedro', 'Perez', 'pedro@dom.com', '2158133', 'Urb. La rosa Casa 5', '52315823', 'Caracas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e_usuarios`
--

CREATE TABLE IF NOT EXISTS `e_usuarios` (
  `i_idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `v_usuario` varchar(20) NOT NULL,
  `v_clave` varchar(100) NOT NULL,
  PRIMARY KEY (`i_idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `e_usuarios`
--

INSERT INTO `e_usuarios` (`i_idusuario`, `v_usuario`, `v_clave`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `e_vendedores`
--

CREATE TABLE IF NOT EXISTS `e_vendedores` (
  `i_idvendedor` int(11) NOT NULL AUTO_INCREMENT,
  `v_nombre` varchar(20) NOT NULL,
  `v_apellido` varchar(20) NOT NULL,
  `v_cedula` varchar(20) NOT NULL,
  `v_telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`i_idvendedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `e_vendedores`
--

INSERT INTO `e_vendedores` (`i_idvendedor`, `v_nombre`, `v_apellido`, `v_cedula`, `v_telefono`) VALUES
(1, 'Vendedor1', 'vendedoruno', '45613213', '5631287'),
(2, 'Vendedor2', 'Vendedordos', '5632123', '551532123'),
(3, 'Vendedor3', 'Vendedortres', '47845435', '2154645'),
(4, 'Vendedor5', 'Vendedorcinco', '56636823', '555321586'),
(5, 'Vendedor6', 'Vendedorseis', '8453212', '5255315');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_cliente_vendedor`
--

CREATE TABLE IF NOT EXISTS `r_cliente_vendedor` (
  `i_idrelacion` int(11) NOT NULL AUTO_INCREMENT,
  `i_idcliente` int(11) NOT NULL,
  `i_idvendedor` int(11) NOT NULL,
  PRIMARY KEY (`i_idrelacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `r_cliente_vendedor`
--

INSERT INTO `r_cliente_vendedor` (`i_idrelacion`, `i_idcliente`, `i_idvendedor`) VALUES
(1, 1, 2),
(2, 3, 1),
(3, 1, 1),
(4, 2, 3),
(7, 17, 1),
(9, 20, 2),
(30, 16, 1),
(31, 16, 3),
(32, 16, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
