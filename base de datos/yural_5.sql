-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2017 a las 01:06:43
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yural`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `correo_usuario` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`correo_usuario`, `nombre`, `clave`) VALUES
('adams@yural.com', 'Adams Contreras', 'yuraladams');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartado`
--

CREATE TABLE `apartado` (
  `numero_apartado` int(20) NOT NULL,
  `cedula_usuario` varchar(12) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `codigo_productoV` varchar(50) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `cantidad_apartada` varchar(10) NOT NULL,
  `precio_prod_total` varchar(100) NOT NULL,
  `fecha_hora_apartado` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `apartado`
--

INSERT INTO `apartado` (`numero_apartado`, `cedula_usuario`, `nombre_usuario`, `codigo_productoV`, `imagen`, `nombre_producto`, `cantidad_apartada`, `precio_prod_total`, `fecha_hora_apartado`) VALUES
(1, '248191811', 'adams contreras', 'ACC1872', '../imagenesRepuestos/1463851894542 - copia - copia.jpg', 'Casco EK Semi - Integral', '2', '250.880,00', '2017-02-23 20:00'),
(2, '248191811', 'adams contreras', 'ACC18976', '../imagenesRepuestos/1463853141448 - copia - copia.jpg', 'Casco Bera', '2', '156.800,00', '2017/02/23 00:57'),
(4, '248191811', 'adams contreras', 'ACC18976', '../imagenesRepuestos/1463853141448 - copia - copia.jpg', 'Casco Bera', '1', '78.400,00', '2017/02/23 01:11'),
(5, '248191811', 'adams contreras', 'ACC1872', '../imagenesRepuestos/1463851894542 - copia - copia.jpg', 'Casco EK Semi - Integral', '3', '376.320,00', '2017/02/23 15:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_venta`
--

CREATE TABLE `catalogo_venta` (
  `codigo_productoV` varchar(20) NOT NULL,
  `nombre_productoV` varchar(255) NOT NULL,
  `id_usuarioA` varchar(50) NOT NULL,
  `categoria` varchar(35) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `tipo_unidad` varchar(10) NOT NULL,
  `productos_vendidos` varchar(10) NOT NULL,
  `productos_disponibles` varchar(10) NOT NULL,
  `precio_base` varchar(20) NOT NULL,
  `iva_producto` varchar(20) NOT NULL,
  `pvp` varchar(30) NOT NULL,
  `num_comentario` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catalogo_venta`
--

INSERT INTO `catalogo_venta` (`codigo_productoV`, `nombre_productoV`, `id_usuarioA`, `categoria`, `marca`, `descripcion`, `imagen`, `tipo_unidad`, `productos_vendidos`, `productos_disponibles`, `precio_base`, `iva_producto`, `pvp`, `num_comentario`) VALUES
('ACC18976', 'Casco Bera', 'Adams Contreras', 'Accesorios para Motociclistas', 'Bera', 'Casco Bera Colores Blanco Gris Vinotinto Talla L y Talla m. Unsex Semi-Integral', '../imagenesRepuestos/1463853141448 - copia - copia.jpg', 'Unico', '0', '4', '70.000,00', '8.400,00', '78.400,00', ''),
('ACC1872', 'Casco EK Semi - Integral', 'Adams Contreras', 'Accesorios para Motociclistas', 'Bera', 'Casco Empire Keeway Colores Blanco y Gris Talla L y Talla m. Unsex Semi-Integral', '../imagenesRepuestos/1463851894542 - copia - copia.jpg', 'Unico', '0', '3', '112.000,00', '13.440,00', '125.440,00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `num_comentario` varchar(20) NOT NULL,
  `cedula_usuario` varchar(12) NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `fecha_hora_pregunta` datetime(6) NOT NULL,
  `respuesta` varchar(255) NOT NULL,
  `fecha_hora_respuesta` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `rif_empresa` varchar(50) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `direccion_empresa` varchar(200) NOT NULL,
  `telefono_empresa` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`rif_empresa`, `nombre_empresa`, `direccion_empresa`, `telefono_empresa`) VALUES
('J-40740403-2', 'Repuestos Yural C.A.', 'Venezuela Estado - Táchira. San Cristóbal Sector la Concordia Av. Lucio Oquendo Calle 3 Qta. Aleluya', '0276-3489493');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_de_entrega`
--

CREATE TABLE `nota_de_entrega` (
  `numero_factura` varchar(20) NOT NULL,
  `rif_empresa` varchar(50) NOT NULL,
  `numero_apartado` varchar(20) NOT NULL,
  `iva_factura` varchar(20) NOT NULL,
  `total_factura` varchar(50) NOT NULL,
  `fecha_hora_factura` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `numero_pedido` varchar(20) NOT NULL,
  `id_usuarioA` varchar(50) NOT NULL,
  `id_proveedor` varchar(30) NOT NULL,
  `codigo_producto` varchar(20) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `cantidad_producto` varchar(10) NOT NULL,
  `precio_costo` varchar(20) NOT NULL,
  `fecha_pedido` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `numero_pedido`, `id_usuarioA`, `id_proveedor`, `codigo_producto`, `nombre_producto`, `cantidad_producto`, `precio_costo`, `fecha_pedido`) VALUES
(11, '1', 'Adams Contreras', '1', '12FGKT5', 'Bujias para motos 150', '30', '3.500,00', '2017-02-23'),
(10, '1', 'Adams Contreras', '1', '24juy26', 'Bonbillo HID', '90', '4.000,00', '2017-02-23'),
(8, '1', 'Adams Contreras', '1', '32gjtw', 'Casco Bera', '5', '50.000,00', '2015-02-20'),
(9, '1', 'Adams Contreras', '1', '3gjtw', 'Casco EK Semi - Integral', '5', '80.000,00', '2015-02-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` varchar(30) NOT NULL,
  `id_usuarioA` varchar(50) NOT NULL,
  `nombre_proveedor` varchar(50) NOT NULL,
  `razon_social_proveedor` varchar(100) NOT NULL,
  `direccion_proveedor` varchar(255) NOT NULL,
  `telef_proveedor` varchar(15) NOT NULL,
  `tipo_producto` varchar(100) NOT NULL,
  `correo_proveedor` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `id_usuarioA`, `nombre_proveedor`, `razon_social_proveedor`, `direccion_proveedor`, `telef_proveedor`, `tipo_producto`, `correo_proveedor`) VALUES
('111111', '', 'assss', 'j-23032-3', 'ssddddd', '3343434', 'Baterias', 'ad1ams_ra22mirez@gmail.com'),
('1212', '', 'adams', 'distribuidora adams', 'sdadasdaddas', '23123123', 'Repuestos', 'adams_raw222mirez@gmail.com'),
('555', '', 'assss', 'j-2304932-3', 'ssddddd', '3343434', 'Baterias', 'adams_ra22mirez@gmail.com'),
('1', 'adams', 'Distribuidora Contreras', 'J-3239842-4', 'Centro de La Ciudad San Cristobal', '04160456892', 'Repuestos', 'contreras@correo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedula_usuario` varchar(12) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `correo_usuario` varchar(50) NOT NULL,
  `contra_usuario` varchar(50) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telef_personal` varchar(15) NOT NULL,
  `telef_hog` varchar(15) NOT NULL,
  `pregunta_seguridad` varchar(100) NOT NULL,
  `respuesta_seguridad` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula_usuario`, `nombre_usuario`, `apellido_usuario`, `correo_usuario`, `contra_usuario`, `estado`, `ciudad`, `direccion`, `telef_personal`, `telef_hog`, `pregunta_seguridad`, `respuesta_seguridad`) VALUES
('248191811', 'adams', 'contreras', 'adamspurry@gmail.com', 'adams', 'Monagas', 'CaÃ±o Colorado', 'centro', '04160769179', '02763414294', 'Lugar de nacimiento de la Madre?', 'barinas'),
('10874894', 'omaira', 'contreras', 'oma_cont72@hotmail.com', 'juhantonny', 'Barinas', 'Ciudad Bolivia', 'centro san crisotobal', '04161710767', '02763414294', 'Donde Nacistes?', 'Barinas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`correo_usuario`) KEY_BLOCK_SIZE=2048;

--
-- Indices de la tabla `apartado`
--
ALTER TABLE `apartado`
  ADD PRIMARY KEY (`numero_apartado`) KEY_BLOCK_SIZE=1024;

--
-- Indices de la tabla `catalogo_venta`
--
ALTER TABLE `catalogo_venta`
  ADD PRIMARY KEY (`codigo_productoV`) KEY_BLOCK_SIZE=1024;

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`num_comentario`) KEY_BLOCK_SIZE=1024;

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`rif_empresa`) KEY_BLOCK_SIZE=1024;

--
-- Indices de la tabla `nota_de_entrega`
--
ALTER TABLE `nota_de_entrega`
  ADD PRIMARY KEY (`numero_factura`) KEY_BLOCK_SIZE=1024;

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`) KEY_BLOCK_SIZE=1024;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula_usuario`) KEY_BLOCK_SIZE=1024;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apartado`
--
ALTER TABLE `apartado`
  MODIFY `numero_apartado` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
