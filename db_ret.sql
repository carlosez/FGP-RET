-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-07-2014 a las 05:35:56
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_ret`
--
CREATE DATABASE IF NOT EXISTS `db_ret` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_ret`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento_menu`
--

CREATE TABLE IF NOT EXISTS `alimento_menu` (
  `ID_ALI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CATE` int(11) DEFAULT NULL,
  `NOMBRE_ALI` varchar(150) DEFAULT NULL,
  `DESCRIPCION_ALI` varchar(500) DEFAULT NULL,
  `IMG_URL` varchar(500) DEFAULT NULL,
  `PRECIO` double DEFAULT NULL,
  `TIEMPO_PREPARACION` time DEFAULT NULL,
  `ESTADO_ALI` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`ID_ALI`),
  KEY `FK_RELATIONSHIP_10` (`ID_CATE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `alimento_menu`
--

INSERT INTO `alimento_menu` (`ID_ALI`, `ID_CATE`, `NOMBRE_ALI`, `DESCRIPCION_ALI`, `IMG_URL`, `PRECIO`, `TIEMPO_PREPARACION`, `ESTADO_ALI`) VALUES
(1, 1, 'Sopa de Frijoles', 'Sopa de Frijoles preparada con Huevos, Aguacate y Crema', 'sopa_frijoles', 2.5, '00:12:00', 'T'),
(2, 2, 'Hamburguesa', 'Hamburguesa con Lechuga, Carne, Tocino y Papas', 'hamburguesa', 4.5, '00:15:00', 'T'),
(3, 2, 'Pizza', 'Pizza de Jamon y Queso ', 'pizza', 10, '00:30:00', 'T'),
(4, 5, 'galleta', 'deliciosa galleta salada ', 'cookies', 1.5, '00:05:00', 'T'),
(5, 1, 'Ensalada', 'Plato frío con hortalizas mezcladas, cortadas en trozos y aderezadas, fundamentalmente con sal, jugo de limón, aceite de oliva, y vinagre.', 'ensalada', 5, '00:10:00', 'T'),
(6, 1, 'Pan con ajo', 'El pan de ajo consiste típicamente en pan cubierto con ajo y aceite de oliva. Se usa a menudo como acompañamiento simple para la pasta y otros platos italianos. Se suele tostar u hornear. ', 'pan_con_ajo', 3, '00:15:00', 'T'),
(7, 1, 'Palitroques', 'Deliciosos palitos de pan tostado con su salsa de tomate a lado', 'palitroques', 5, '00:15:00', 'T'),
(8, 2, 'Costilla Barbacoa', 'Costillas asadas en el horno y con salsa barbacoa, de chuparse los dedos.', 'costilla_barbacoa', 25, '00:20:00', 'T'),
(9, 2, 'Carne de Res', 'Carne, hongos y cebollas', 'plato_gourmet', 25, '00:20:00', 'T'),
(10, 2, 'Pescado', ' pescado asado con un salsa de limón y cilantro', 'pescado', 25, '00:20:00', 'T'),
(11, 6, 'Soda', ' Coca cola, Pepsi, etc', 'soda', 5, '00:02:00', 'T'),
(12, 6, 'Cerveza', 'Pilsener, Corona, Brava, etc', 'Cerveza', 5, '00:02:00', 'T'),
(13, 6, 'Te', '', 'te', 5, '00:02:00', 'T'),
(14, 6, 'Frozen de Fruta', 'Sandia, melon, mango, etc', 'frozen_de_fruta', 5, '00:02:00', 'T'),
(15, 6, 'Frozen de Cafe', '', 'fronzen_de_cafe', 5, '00:02:00', 'T'),
(16, 5, 'Flan', 'vainilla', 'flan', 5, '00:05:00', 'T'),
(17, 5, 'Sorbete', '', 'sorbete', 5, '00:10:00', 'T'),
(18, 5, 'Cheese Cake', '', 'cheesse_cake', 5, '00:05:00', 'T'),
(19, 5, 'Tartaleta', 'fresa, chocolate, mango, etc', 'tartaleta', 5, '00:05:00', 'T'),
(20, 7, 'Promocion 1', '', 'promocion1', 20, '00:20:00', 'T'),
(21, 7, 'Promocion 2', '', 'promocion2', 4, '00:20:00', 'T'),
(22, 8, 'Combo Pollon', '', 'combo-1', 18.95, '00:20:00', 'T'),
(23, 8, 'combo mexicano', '', 'mexico', 6.49, '00:20:00', 'T'),
(24, 10, 'pancake', '', 'panqueques', 1, '00:15:00', 'T'),
(25, 11, 'niños 1', 'combo de rica pizza personal', 'combo-infantil', 5, '00:05:00', 'T'),
(26, 11, '4', '4', 'combo-infantil', 8, '00:08:00', 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento_variante`
--

CREATE TABLE IF NOT EXISTS `alimento_variante` (
  `ID_ALI_VARI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ALI` int(11) DEFAULT NULL,
  `ID_VARI` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ALI_VARI`),
  KEY `FK_RELATIONSHIP_6` (`ID_ALI`),
  KEY `FK_RELATIONSHIP_7` (`ID_VARI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `alimento_variante`
--

INSERT INTO `alimento_variante` (`ID_ALI_VARI`, `ID_ALI`, `ID_VARI`) VALUES
(1, 1, 3),
(2, 1, 2),
(3, 2, 3),
(5, 2, 2),
(6, 2, 4),
(7, 3, 4),
(8, 2, 1),
(9, 2, 2),
(10, 2, 3),
(11, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `ID_CATE` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CATE` varchar(300) DEFAULT NULL,
  `ESTADO_CATE` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`ID_CATE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_CATE`, `NOMBRE_CATE`, `ESTADO_CATE`) VALUES
(1, 'Entradas', 'T'),
(2, 'Plato Fuerte', 'T'),
(5, 'Postre', 'T'),
(6, 'Bebidas', 'T'),
(7, 'Promoción', 'T'),
(8, 'Combo', 'T'),
(10, 'desayunos', 'T'),
(11, 'niños', 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_alimento`
--

CREATE TABLE IF NOT EXISTS `comentario_alimento` (
  `ID_COMEN_ALI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ALI` int(11) DEFAULT NULL,
  `COMENTARIO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_COMEN_ALI`),
  KEY `FK_RELATIONSHIP_9` (`ID_ALI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `comentario_alimento`
--

INSERT INTO `comentario_alimento` (`ID_COMEN_ALI`, `ID_ALI`, `COMENTARIO`) VALUES
(1, 1, 5),
(2, 2, 5),
(3, 1, 1),
(4, 2, 1),
(5, 2, 3),
(6, 4, 3),
(7, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_venta`
--

CREATE TABLE IF NOT EXISTS `control_venta` (
  `ID_VENTA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ALI` int(11) DEFAULT NULL,
  `ID_ORDEN` int(11) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `ESTADO_SERVIDO` varchar(1) DEFAULT NULL,
  `ESTADO_PREVENTA` varchar(1) DEFAULT NULL,
  `ESTADO_VENTA` varchar(1) DEFAULT NULL,
  `MENSAJE` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`ID_VENTA`),
  KEY `FK_RELATIONSHIP_3` (`ID_ORDEN`),
  KEY `FK_RELATIONSHIP_5` (`ID_ALI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=162 ;

--
-- Volcado de datos para la tabla `control_venta`
--

INSERT INTO `control_venta` (`ID_VENTA`, `ID_ALI`, `ID_ORDEN`, `CANTIDAD`, `ESTADO_SERVIDO`, `ESTADO_PREVENTA`, `ESTADO_VENTA`, `MENSAJE`) VALUES
(1, 2, 1, 2, 'T', 'T', 'T', 'T'),
(2, 3, 2, 2, 'T', 'T', 'T', 'T'),
(3, 3, 48, 2, 'T', 'T', 'T', 'T'),
(4, 1, 38, 2, 'T', 'T', 'T', 'F'),
(5, 2, 38, 2, 'T', 'T', 'T', 'F'),
(22, 1, 40, 2, 'T', 'T', 'T', 'F'),
(58, 1, 41, 2, 'T', 'T', 'T', 'T'),
(80, 1, 41, 2, 'T', 'T', 'T', 'F'),
(81, 1, 41, 2, 'T', 'T', 'T', 'F'),
(82, 1, 41, 2, 'T', 'T', 'T', 'F'),
(83, 1, 41, 2, 'T', 'T', 'T', 'F'),
(84, 1, 41, 2, 'T', 'T', 'T', 'F'),
(85, 1, 41, 2, 'T', 'T', 'T', 'F'),
(86, 1, 41, 2, 'T', 'T', 'T', 'F'),
(87, 1, 41, 2, 'T', 'T', 'T', 'F'),
(88, 1, 41, 2, 'T', 'T', 'T', 'F'),
(89, 1, 41, 2, 'T', 'T', 'T', 'F'),
(90, 1, 41, 2, 'T', 'T', 'T', 'F'),
(91, 2, 41, 2, 'T', 'T', 'T', 'F'),
(92, 1, 41, 2, 'T', 'T', 'T', 'F'),
(93, 1, 41, 2, 'T', 'T', 'T', 'F'),
(94, 1, 41, 2, 'T', 'T', 'T', 'F'),
(95, 1, 45, 2, 'T', 'T', 'T', 'F'),
(96, 2, 45, 2, 'T', 'T', 'T', 'F'),
(97, 1, 46, 2, 'T', 'T', 'T', 'F'),
(98, 2, 46, 2, 'T', 'T', 'T', 'F'),
(99, 1, 48, 9, 'T', 'T', 'T', 'F'),
(101, 2, 48, 1, 'T', 'T', 'T', 'F'),
(106, 3, 48, 1, 'T', 'T', 'T', 'F'),
(107, 1, 48, 2, 'T', 'T', 'T', 'F'),
(108, 1, 48, 1, 'T', 'T', 'T', 'F'),
(110, 4, 48, 5, 'T', 'T', 'T', 'T'),
(111, 3, 48, 3, 'T', 'T', 'T', 'T'),
(112, 2, 48, 1, 'T', 'T', 'T', 'T'),
(113, 2, 48, 1, 'T', 'T', 'T', 'T'),
(114, 2, 48, 2, 'T', 'T', 'T', 'F'),
(115, 4, 48, 2, 'T', 'T', 'T', 'T'),
(116, 1, 48, 1, 'T', 'T', 'T', 'T'),
(117, 3, 48, 3, 'T', 'T', 'T', 'T'),
(118, 2, 49, 1, 'T', 'T', 'T', 'T'),
(119, 4, 49, 1, 'T', 'T', 'T', 'T'),
(120, 3, 49, 1, 'T', 'T', 'T', 'T'),
(121, 2, 50, 1, 'T', 'T', 'T', 'F'),
(122, 4, 58, 1, 'T', 'T', 'T', 'F'),
(123, 1, 59, 1, 'T', 'T', 'T', 'F'),
(124, 1, 60, 1, 'T', 'T', 'T', 'T'),
(125, 1, 61, 8, 'T', 'T', 'T', 'F'),
(126, 1, 61, 2, 'T', 'T', 'T', 'F'),
(127, 1, 61, 3, 'T', 'T', 'T', 'F'),
(128, 2, 62, 1, 'F', 'F', 'F', 'F'),
(129, 1, 62, 1, 'F', 'F', 'F', 'F'),
(130, 1, 62, 1, 'F', 'F', 'F', 'F'),
(131, 2, 62, 1, 'F', 'F', 'F', 'F'),
(132, 3, 62, 2, 'T', 'T', 'T', 'F'),
(133, 2, 62, 1, 'T', 'T', 'T', 'F'),
(134, 2, 62, 1, 'T', 'T', 'T', 'F'),
(135, 3, 62, 1, 'T', 'T', 'T', 'F'),
(136, 2, 62, 1, 'T', 'T', 'T', 'F'),
(137, 2, 62, 3, 'T', 'T', 'T', 'F'),
(138, 3, 62, 3, 'T', 'T', 'T', 'F'),
(139, 2, 62, 2, 'T', 'T', 'T', 'F'),
(140, 1, 62, 1, 'T', 'T', 'T', 'F'),
(141, 1, 62, 1, 'T', 'T', 'T', 'F'),
(142, 2, 62, 1, 'T', 'T', 'T', 'F'),
(143, 3, 62, 1, 'T', 'T', 'T', 'F'),
(144, 1, 63, 1, 'T', 'T', 'T', 'F'),
(145, 1, 64, 1, 'T', 'T', 'T', 'F'),
(146, 1, 65, 1, 'T', 'T', 'T', 'F'),
(147, 1, 66, 1, 'F', 'T', 'T', 'F'),
(148, 5, 66, 1, 'T', 'T', 'T', 'F'),
(149, 2, 66, 2, 'F', 'T', 'T', 'F'),
(150, 1, 66, 1, 'F', 'F', 'F', 'F'),
(151, 6, 66, 2, 'F', 'T', 'T', 'F'),
(152, 1, 67, 2, 'T', 'T', 'T', 'F'),
(153, 1, 67, 3, 'F', 'T', 'T', 'F'),
(154, 5, 67, 1, 'F', 'T', 'T', 'F'),
(155, 6, 67, 1, 'F', 'T', 'T', 'F'),
(156, 1, 70, 1, 'F', 'T', 'T', 'F'),
(157, 5, 70, 1, 'F', 'T', 'T', 'F'),
(158, 6, 70, 1, 'F', 'T', 'T', 'F'),
(159, 7, 70, 1, 'F', 'T', 'T', 'F'),
(160, 25, 78, 1, 'F', 'T', 'F', 'F'),
(161, 26, 78, 1, 'F', 'T', 'F', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iniciar_orden`
--

CREATE TABLE IF NOT EXISTS `iniciar_orden` (
  `ID_ORDEN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_ORDEN`),
  KEY `FK_RELATIONSHIP_2` (`ID_USUARIO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Volcado de datos para la tabla `iniciar_orden`
--

INSERT INTO `iniciar_orden` (`ID_ORDEN`, `ID_USUARIO`) VALUES
(1, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(58, 3),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 3),
(71, 3),
(72, 3),
(73, 3),
(74, 3),
(75, 3),
(76, 3),
(77, 3),
(78, 3),
(42, 6),
(50, 6),
(51, 6),
(2, 7),
(52, 7),
(53, 7),
(54, 7),
(55, 7),
(56, 7),
(57, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_variante`
--

CREATE TABLE IF NOT EXISTS `menu_variante` (
  `ID_VARI` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIP_VARI` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ID_VARI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `menu_variante`
--

INSERT INTO `menu_variante` (`ID_VARI`, `DESCRIP_VARI`) VALUES
(1, 'Sin Jamón'),
(2, 'Sin Queso'),
(3, 'Sin Frijoles'),
(4, 'Sin Tomate'),
(5, 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `ID_TIPO` int(11) NOT NULL AUTO_INCREMENT,
  `TIPO` varchar(100) DEFAULT NULL,
  `DESCRIPCION` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`ID_TIPO`, `TIPO`, `DESCRIPCION`) VALUES
(1, 'Administrador', NULL),
(2, 'Mesa', NULL),
(3, 'Cocinero', NULL),
(4, 'Mesero', NULL),
(5, 'recepcionista', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIPO` int(11) DEFAULT NULL,
  `NOMBRE` varchar(150) DEFAULT NULL,
  `NICKNAME` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(300) DEFAULT NULL,
  `ESTADO_ACTIVO` varchar(1) DEFAULT NULL,
  `ESTADO_ORDEN` varchar(1) DEFAULT NULL,
  `ESTADO_MESA` varchar(1) DEFAULT NULL,
  `CAPACIDAD_PERSONA_MESA` int(11) DEFAULT NULL,
  `POS_X` double DEFAULT NULL,
  `POS_Y` double DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `FK_RELATIONSHIP_1` (`ID_TIPO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `ID_TIPO`, `NOMBRE`, `NICKNAME`, `PASSWORD`, `ESTADO_ACTIVO`, `ESTADO_ORDEN`, `ESTADO_MESA`, `CAPACIDAD_PERSONA_MESA`, `POS_X`, `POS_Y`) VALUES
(2, 1, 'José Pérez', 'admín', 'fbc71ce36cc20790f2eeed2197898e71', 'T', 'F', 'F', NULL, NULL, NULL),
(3, 2, 'Mesa 1', 'm1', 'fbc71ce36cc20790f2eeed2197898e71', 'T', 'T', 'T', 5, NULL, NULL),
(4, 3, 'Abelardo Ponce', 'cocinero', 'fbc71ce36cc20790f2eeed2197898e71', 'T', 'F', 'F', NULL, NULL, NULL),
(5, 4, 'Angela Nuñez', 'mesero', 'fbc71ce36cc20790f2eeed2197898e71', 'T', 'F', 'F', NULL, NULL, NULL),
(6, 2, 'Mesa 2', 'm2', 'fbc71ce36cc20790f2eeed2197898e71', 'T', 'F', 'T', 10, NULL, NULL),
(7, 2, 'Mesa 3', 'm3', 'fbc71ce36cc20790f2eeed2197898e71', 'T', 'F', 'T', 5, NULL, NULL),
(8, 5, 'recepcionista', 'recep', 'fbc71ce36cc20790f2eeed2197898e71', 'T', 'F', 'F', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variante_realizada`
--

CREATE TABLE IF NOT EXISTS `variante_realizada` (
  `ID_VA_REA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_VARI` int(11) DEFAULT NULL,
  `ID_VENTA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_VA_REA`),
  KEY `FK_RELATIONSHIP_4` (`ID_VENTA`),
  KEY `FK_RELATIONSHIP_8` (`ID_VARI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `variante_realizada`
--

INSERT INTO `variante_realizada` (`ID_VA_REA`, `ID_VARI`, `ID_VENTA`) VALUES
(1, 2, 1),
(2, 4, 2),
(3, 4, 3),
(4, 5, 58);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alimento_menu`
--
ALTER TABLE `alimento_menu`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_CATE`) REFERENCES `categoria` (`ID_CATE`);

--
-- Filtros para la tabla `alimento_variante`
--
ALTER TABLE `alimento_variante`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_ALI`) REFERENCES `alimento_menu` (`ID_ALI`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_VARI`) REFERENCES `menu_variante` (`ID_VARI`);

--
-- Filtros para la tabla `comentario_alimento`
--
ALTER TABLE `comentario_alimento`
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_ALI`) REFERENCES `alimento_menu` (`ID_ALI`);

--
-- Filtros para la tabla `control_venta`
--
ALTER TABLE `control_venta`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_ORDEN`) REFERENCES `iniciar_orden` (`ID_ORDEN`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_ALI`) REFERENCES `alimento_menu` (`ID_ALI`);

--
-- Filtros para la tabla `iniciar_orden`
--
ALTER TABLE `iniciar_orden`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_TIPO`) REFERENCES `tipo_usuario` (`ID_TIPO`);

--
-- Filtros para la tabla `variante_realizada`
--
ALTER TABLE `variante_realizada`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_VENTA`) REFERENCES `control_venta` (`ID_VENTA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_VARI`) REFERENCES `menu_variante` (`ID_VARI`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
