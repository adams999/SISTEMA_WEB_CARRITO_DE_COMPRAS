-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2017 a las 15:23:39
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
  `id_usuario` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartado`
--

CREATE TABLE `apartado` (
  `numero_apartado` varchar(20) NOT NULL,
  `cedula_usuario` varchar(12) NOT NULL,
  `codigo_producto` varchar(20) NOT NULL,
  `fecha_hora_apartado` datetime(6) NOT NULL,
  `fecha_hora_pago` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `num_comentario` varchar(20) NOT NULL,
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
  `id_usuario` varchar(10) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `direccion_empresa` varchar(200) NOT NULL,
  `telefono_empresa` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `numero_factura` varchar(20) NOT NULL,
  `rif_empresa` varchar(50) NOT NULL,
  `numero_apartado` varchar(20) NOT NULL,
  `iva_factura` varchar(20) NOT NULL,
  `total_factura` varchar(50) NOT NULL,
  `fecha_hora_factura` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `codigo_producto` varchar(20) NOT NULL,
  `id_usuario` varchar(10) NOT NULL,
  `numero_pedido` varchar(20) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` longblob NOT NULL,
  `tipo_unidad` varchar(10) NOT NULL,
  `productos_vendidos` varchar(10) NOT NULL,
  `productos_disponibles` varchar(10) NOT NULL,
  `precio_base` varchar(20) NOT NULL,
  `iva_producto` varchar(20) NOT NULL,
  `pvp` varchar(30) NOT NULL,
  `num_comentario` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `numero_pedido` varchar(20) NOT NULL,
  `id_usuario` varchar(10) NOT NULL,
  `id_proveedor` varchar(30) NOT NULL,
  `codigo_producto` varchar(20) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `cantidad_producto` varchar(10) NOT NULL,
  `precio_costo` varchar(20) NOT NULL,
  `precio_total_pedido` varchar(20) NOT NULL,
  `fecha_pedido` datetime(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` varchar(30) NOT NULL,
  `id_usuario` varchar(10) NOT NULL,
  `nombre_proveedor` varchar(50) NOT NULL,
  `razon_social_proveedor` varchar(100) NOT NULL,
  `direccion_proveedor` varchar(255) NOT NULL,
  `telef_proveedor` varchar(15) NOT NULL,
  `tipo_producto` varchar(100) NOT NULL,
  `correo_proveedor` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedula_usuario` varchar(12) NOT NULL,
  `id_usuario` varchar(10) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `correo_usuario` varchar(50) NOT NULL,
  `contraseña_usuario` varchar(50) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telef_personal` varchar(15) NOT NULL,
  `telef_hog` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_usuario`) KEY_BLOCK_SIZE=1024;

--
-- Indices de la tabla `apartado`
--
ALTER TABLE `apartado`
  ADD PRIMARY KEY (`numero_apartado`) KEY_BLOCK_SIZE=1024;

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
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`numero_factura`) KEY_BLOCK_SIZE=1024;

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`codigo_producto`) KEY_BLOCK_SIZE=1024;

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`numero_pedido`) KEY_BLOCK_SIZE=1024;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
