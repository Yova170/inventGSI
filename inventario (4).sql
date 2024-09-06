-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2024 a las 23:33:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `iditems` int(20) NOT NULL,
  `item` int(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `serie` varchar(2000) NOT NULL,
  `activo` varchar(20) NOT NULL,
  `sucursal` varchar(50) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`iditems`, `item`, `nombre`, `marca`, `serie`, `activo`, `sucursal`, `detalle`, `estado`, `date`, `user`) VALUES
(1, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'K895227501', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(2, 1, 'Cámara de Vigilancia HIK Vision Vu', 'HIK Vision', 'G77609978', '0', 'GPC', '', 'Nuevo', '', ''),
(3, 1, 'Cámara de Vigilancia HIK Vision Vu', 'HIK Vision', 'G77609605', '0', 'GPC', '', 'Nuevo', '', ''),
(4, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'K89527735', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(5, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'L14666151', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(6, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'L14666124', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(7, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'K89527424', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(8, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'L14666259', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(9, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'L14666301', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(10, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'K89527747', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(11, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'L14666162', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(12, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'L14666090', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(13, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'F63807376', '2361', 'GPC', 'Bodega Blanca', 'Usado', '', ''),
(14, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'F63807416', '0', 'GPC', 'Bodega Blanca', 'Usado', '', ''),
(15, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'F63807249', '2361', 'GPC', 'Bodega Blanca', 'Usado', '', ''),
(16, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'F63807375', '2358', 'GPC', 'Bodega Blanca', 'Usado', '', ''),
(17, 4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'J91784853', '2518', 'GPC', 'Bodega Blanca', 'Usado', '', ''),
(18, 5, 'Reguladores de Camara', 'Generico', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(19, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(20, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(21, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(22, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(23, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(24, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(25, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(26, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(27, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(28, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(29, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(30, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(31, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(32, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(33, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(34, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(35, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(36, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(37, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(38, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(39, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(40, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(41, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(42, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(43, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(44, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(45, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(46, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(47, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(48, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(49, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(50, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(51, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(52, 5, 'Reguladores de Camara', 'Generico', '00000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(53, 6, 'Cables de Camara', 'Generico', '0000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(54, 6, 'Cables de Camara', 'Generico', '0000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(55, 6, 'Cables de Camara', 'Generico', '0000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(56, 6, 'Cables de Camara', 'Generico', '0000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(57, 6, 'Cables de Camara', 'Generico', '0000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(58, 6, 'Cables de Camara', 'Generico', '0000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(59, 6, 'Cables de Camara', 'Generico', '0000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(60, 6, 'Cables de Camara', 'Generico', '0000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(61, 6, 'Cables de Camara', 'Generico', '0000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(62, 6, 'Cables de Camara', 'Generico', '0000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(63, 6, 'Cables de Camara', 'Generico', '0000', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(68, 7, 'Tripodes Tablets', 'Varios', '09090', '21212', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(72, 9, 'Samsung Galaxy TAB A9', 'SAMSUNG', 'R9T2B081QDV', '3059', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(73, 10, 'Audífonos Q20', 'SOUNDCORE', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(74, 10, 'Audífonos Q20', 'SOUNDCORE', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(75, 10, 'Audífonos Q20', 'SOUNDCORE', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(76, 12, 'Mini Desktop', 'HP', '8CC25001BT8', '2814', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(77, 12, 'Mini Desktop', 'HP', '8CC25001BTQ', '2815', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(78, 13, 'WebCam BRIO', 'LOGITECH', '2329LV01CW39', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(79, 13, 'WebCam BRIO', 'LOGITECH', '2329LV01D099', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(80, 14, 'Cable HDMI', 'OTROS', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(81, 15, 'Teclado', 'HP', '7CL224700AN', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(82, 16, 'Cargador de Pared', 'SAMSUNG', 'RF7X34HOLG1DKB', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(83, 17, 'Soporte Simulador', 'Otros', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(84, 17, 'Soporte Simulador', 'Otros', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(86, 19, 'Lector de Tarjetas', 'Varios', '19196010500272', '0', 'GPC', 'Bodega Blanca', 'Usado', '', ''),
(88, 7, 'Tripodes Tablets', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(90, 8, 'Batería ', 'Generico', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(91, 11, 'Almohadillas Audífonos', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(92, 11, 'Almohadillas Audífonos', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(93, 11, 'Almohadillas Audífonos', 'Varios', '', '0', 'GPC', '', 'Nuevo', '', ''),
(94, 18, 'Tripode WebCam', 'Generico', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(95, 20, 'Adaptador HDMI a VGA', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(96, 20, 'Adaptador HDMI a VGA', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(97, 20, 'Adaptador HDMI a VGA', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(98, 21, 'Adaptador DP a HDMI', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(99, 22, 'Candados para Laptops con Llave', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(100, 22, 'Candados para Laptops con Llave', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(101, 22, 'Candados para Laptops con Llave', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(102, 22, 'Candados para Laptops con Llave', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(103, 22, 'Candados para Laptops con Llave', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(104, 22, 'Candados para Laptops con Llave', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(105, 22, 'Candados para Laptops con Llave', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(106, 22, 'Candados para Laptops con Llave', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(107, 22, 'Candados para Laptops con Llave', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(108, 22, 'Candados para Laptops con Llave', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(109, 23, 'Mochilas', 'Varios', '900824185', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(110, 23, 'Mochilas', 'Varios', 'AC0134', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(111, 10, 'Audífonos Q20', 'SOUNDCORE', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(112, 10, 'Audífonos Q20', 'SOUNDCORE', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(113, 18, 'Tripode WebCam', 'Generico', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(114, 18, 'Tripode WebCam', 'Generico', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(115, 2, 'Tablet ', ' Media Pad ', '865101041536954', '2100', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(116, 24, 'Adaptador Bluetooth', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(117, 24, 'Adaptador Bluetooth', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(118, 24, 'Adaptador Bluetooth', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(119, 24, 'Adaptador Bluetooth', 'Varios', '', '0', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(120, 26, 'Samsung Galaxy TAB A6', 'SAMSUNG', 'R52J31MBAT', '2316', 'GPC', 'Bodega Blanca', 'Usado', '', ''),
(121, 26, 'Samsung Galaxy TAB A6', 'SAMSUNG', '', '417', 'GPC', 'Bodega Blanca', 'Usado', '', ''),
(122, 27, 'Laptop ProBook 460', 'HP', 'SCD9240Y1K', '1983', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(123, 27, 'Laptop ProBook 460', 'HP', 'SCD9240XYW', '1982', 'GPC', 'Bodega Blanca', 'Nuevo', '', ''),
(149, 1, 'Cámara de Vigilancia HIK Vision Vu', 'HIK Vision', '12', '12', 'GPC', 'prueba1', 'Nuevo', '04-09-2024 19:23:21', 'admin'),
(150, 1, 'Cámara de Vigilancia HIK Vision Vu', 'HIK Vision', '12', '12', 'GPC', 'prueba2', 'Usado', '04-09-2024 19:23:21', 'admin'),
(151, 9, 'Samsung GALAXY TAB A9', 'SAMSUNG', 'R9TX10B8S5F', '3104', 'GPC', 'Bodega blanca', 'Nuevo', '06-09-2024 13:00:13', 'Bryan M.'),
(152, 9, 'Samsung GALAXY TAB A9', 'SAMSUNG', 'R9TX10A94CR', '3105', 'GPC', 'Bodega blanca', 'Nuevo', '06-09-2024 13:00:13', 'Bryan M.'),
(153, 9, 'Samsung GALAXY TAB A9', 'SAMSUNG', 'R9TX10A91KH', '3106', 'GPC', 'Bodega blanca (Penonome)', 'Nuevo', '06-09-2024 13:00:13', 'Bryan M.'),
(154, 9, 'Samsung GALAXY TAB A9', 'SAMSUNG', 'R9TX10A93CF', '3107', 'GPC', 'Bodega blanca (Penonome)', 'Nuevo', '06-09-2024 13:00:13', 'Bryan M.'),
(155, 9, 'Samsung GALAXY TAB A9', 'SAMSUNG', 'R9TX10A8WWA', '3108', 'GPC', 'Bodega blanca (Penonome)', 'Nuevo', '06-09-2024 13:00:13', 'Bryan M.'),
(156, 9, 'Samsung GALAXY TAB A9', 'SAMSUNG', 'R9TX10A93ZV', '3109', 'GPC', 'Bodega blanca (Colon)', 'Nuevo', '06-09-2024 13:00:13', 'Bryan M.'),
(157, 9, 'Samsung GALAXY TAB A9', 'SAMSUNG', 'R9TX10A8XMM', '3110', 'GPC', 'Bodega blanca (Colon)', 'Nuevo', '06-09-2024 13:00:13', 'Bryan M.'),
(158, 9, 'Samsung GALAXY TAB A9', 'SAMSUNG', 'R9TX10A93GW', '3111', 'GPC', 'Bodega blanca (Colon)', 'Nuevo', '06-09-2024 13:00:13', 'Bryan M.'),
(159, 9, 'Samsung GALAXY TAB A9', 'SAMSUNG', 'R9TX10A92GM', '3112', 'GPC', 'Bodega blanca (Colon)', 'Nuevo', '06-09-2024 13:00:13', 'Bryan M.'),
(160, 9, 'Samsung GALAXY TAB A9', 'SAMSUNG', 'R9TX10A93WL', '3113', 'GPC', 'Bodega blanca (Colon)', 'Nuevo', '06-09-2024 13:00:13', 'Bryan M.'),
(161, 9, 'Samsung GALAXY TAB A9', 'SAMSUNG', 'R9TX10B8PDL', '3114', 'GPC', 'Bodega blanca (Colon)', 'Nuevo', '06-09-2024 13:00:13', 'Bryan M.'),
(162, 9, 'Samsung GALAXY TAB A9', 'SAMSUNG', 'R9TX10A91GJ', '3115', 'GPC', 'Bodega blanca (Colon)', 'Nuevo', '06-09-2024 13:00:13', 'Bryan M.'),
(163, 99, '99', '99', '99', '0023', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `iditem` int(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`iditem`, `descripcion`, `marca`, `categoria`) VALUES
(1, 'Cámara de Vigilancia HIK Vision Vu', 'HIK Vision', 'Cámara de Seguridad'),
(4, 'Camara de vigilancia HIK Vision Dual Light Audio Fixed Camera', 'HIK Vision', 'Cámara de Seguridad'),
(5, 'Reguladores de Camara', 'Generico', 'Cámara de Seguridad'),
(6, 'Cables de Camara', 'Generico', 'Cámara de Seguridad'),
(7, 'Tripodes Tablets', 'Varios', 'Perifericos'),
(8, 'Batería ', 'Generico', 'Simulador'),
(9, 'Samsung Galaxy TAB A9', 'SAMSUNG', 'Tablets'),
(10, 'Audífonos Q20', 'SOUNDCORE', 'Perifericos'),
(11, 'Almohadillas Audífonos', 'Varios', 'Otros'),
(12, 'Mini Desktop', 'HP', 'PC'),
(13, 'WebCam BRIO', 'LOGITECH', 'Perifericos'),
(14, 'Cable HDMI', 'OTROS', 'Otros'),
(15, 'Teclado', 'HP', 'Perifericos'),
(16, 'Cargador de Pared', 'SAMSUNG', 'Otros'),
(17, 'Soporte Simulador', 'Otros', 'Simulador'),
(18, 'Tripode WebCam', 'Generico', 'Accesorios'),
(19, 'Lector de Tarjetas', 'Varios', 'Otros'),
(20, 'Adaptador HDMI a VGA', 'Varios', 'Otros'),
(21, 'Adaptador DP a HDMI', 'Varios', 'Otros'),
(22, 'Candados para Laptops con Llave', 'Varios', 'Otros'),
(23, 'Mochilas', 'Varios', 'Otros'),
(24, 'Adaptador Bluetooth', 'Varios', 'Otros'),
(25, 'Tablet ', ' Media Pad ', 'Tablets'),
(26, 'Samsung Galaxy TAB A6', 'SAMSUNG', 'Tablets'),
(27, 'Laptop ProBook 460', 'HP', 'PC'),
(28, 'Taza de CAfe', 'fes', 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_move`
--

CREATE TABLE `log_move` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombre` varchar(20) NOT NULL,
  `tipo_evento` varchar(50) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `serie` varchar(50) DEFAULT NULL,
  `activo` varchar(50) DEFAULT NULL,
  `sucursal` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `detalle` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `iduser` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`iduser`, `user`, `name`, `pass`, `email`, `cargo`) VALUES
(1, 'bmartinez', 'Bryan Martinez', 'Pass123', 'bmartinez@sertracen.net', 'Soporte'),
(2, 'admin', 'admin', 'admin', 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`iditems`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`iditem`);

--
-- Indices de la tabla `log_move`
--
ALTER TABLE `log_move`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `iditems` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `iditem` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `log_move`
--
ALTER TABLE `log_move`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
