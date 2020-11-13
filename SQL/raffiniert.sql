-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2020 a las 21:27:10
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `raffiniert`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idgenero` int(11) NOT NULL,
  `nombre_genero` varchar(45) DEFAULT NULL,
  `estado_genero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idgenero`, `nombre_genero`, `estado_genero`) VALUES
(1, 'Hombre', 1),
(2, 'Mujer', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `nombre_marca` varchar(45) DEFAULT NULL,
  `estado_marca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idmarca`, `nombre_marca`, `estado_marca`) VALUES
(1, 'Adidas', 1),
(2, 'Nike', 1),
(3, 'Puma', 1),
(5, 'New balance', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproductos` int(11) NOT NULL,
  `nombre_producto` varchar(45) DEFAULT NULL,
  `descripcion_producto` varchar(60) DEFAULT NULL,
  `precio_producto` int(11) DEFAULT NULL,
  `cantidad_producto` int(11) DEFAULT NULL,
  `img_producto` varchar(85) DEFAULT NULL,
  `estado_producto` int(11) DEFAULT NULL,
  `marca_idmarca` int(11) NOT NULL,
  `genero_idgenero` int(11) NOT NULL,
  `proveedor_idproveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproductos`, `nombre_producto`, `descripcion_producto`, `precio_producto`, `cantidad_producto`, `img_producto`, `estado_producto`, `marca_idmarca`, `genero_idgenero`, `proveedor_idproveedor`) VALUES
(1, 'Adidas x', 'Tenis zapatillas adidas X Para Hombre', 70000, 4, 'Adidas(1).jpg', 1, 1, 1, 1),
(2, 'Nike ', 'Tenis zapatiilas nike para mujer', 70000, 10, 'Nike(2).jpg', 1, 2, 2, 1),
(3, 'Adidas', 'Tenis zapatillas adidas para mujer', 70000, 4, 'Adidas(2).jpg', 1, 1, 2, 1),
(5, 'Nike', 'Tenis zapatillas nike para mujer', 70000, 0, 'Nike(1).jpg', 1, 2, 2, 1),
(6, 'Nike', 'Tenis zapatillas nike para Hombre', 70000, 9, 'catalogo(3).jpg', 1, 2, 1, 1),
(34, 'Puma california', 'Tenis puma para mujer', 70000, 3, '1604730823IMG-20200911-WA0019.jpg', 1, 3, 2, 1),
(35, 'Nike', 'Tenis nike para hombre', 70000, 6, '1604775555IMG-20200911-WA0030.jpg', 1, 2, 1, 1),
(36, 'Adidas', 'Tenis adidas para hombre', 130000, 0, '1604968143Screenshot_2020-10-01-13-55-05-1.png', 1, 1, 1, 2),
(37, 'puma', 'Tenis puma para hombre', 75000, 6, '1605280771IMG-20200911-WA0111.jpg', 0, 3, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(45) DEFAULT NULL,
  `direccion_proveedor` varchar(45) DEFAULT NULL,
  `correo_proveedor` varchar(45) DEFAULT NULL,
  `ciudad_proveedor` varchar(45) DEFAULT NULL,
  `telefono_proveedor` varchar(45) DEFAULT NULL,
  `estado_proveedor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `nombre_proveedor`, `direccion_proveedor`, `correo_proveedor`, `ciudad_proveedor`, `telefono_proveedor`, `estado_proveedor`) VALUES
(1, 'Bodega Montecarlo', 'Carrera 5 # 86', 'ventas@BodegaMontecarlo.com', 'Cali', '3143478280', '1'),
(2, 'zshop colombia', 'Carrera 12 # 97-80', 'support@zshopp.com', 'Bogota', '3017089628', '1'),
(5, 'zshop', 'calle 34#09-34', 'zshop@gmail.com', 'Cali', '3183893947', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol_descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol_descripcion`) VALUES
(1, 'Usuario'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `apellido_usuario` varchar(45) DEFAULT NULL,
  `direccion_usuario` varchar(45) DEFAULT NULL,
  `telefono_usuario` varchar(45) DEFAULT NULL,
  `ciudad_usuario` varchar(45) DEFAULT NULL,
  `correo_usuario` varchar(45) DEFAULT NULL,
  `contrasenia_usuario` varchar(45) DEFAULT NULL,
  `estado_usuario` int(11) DEFAULT NULL,
  `rol_idrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre_usuario`, `apellido_usuario`, `direccion_usuario`, `telefono_usuario`, `ciudad_usuario`, `correo_usuario`, `contrasenia_usuario`, `estado_usuario`, `rol_idrol`) VALUES
(1, 'Valentina', ' Sanclemente', 'Calle 57#25-03', '3173903067', 'Palmira', 'valentina@gmail.com', '0810', 1, 1),
(2, 'Juan David', 'Naranjo', 'calle 57#25-03', '3173903067', 'cali', 'juandavidnaranjo75@gmail.com', '0709', 1, 2),
(7, 'john', 'Rivera', 'calle57#25-03', '3187109048', 'Cali', 'jonh@gmail.com', '123', 1, 1),
(9, 'John Edward', 'Rivera', 'calle57#25-03', '3167064670', 'Cali', 'johnedwardriveranaranjo@gmail.com', '0207', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventas` int(11) NOT NULL,
  `fecha_venta` varchar(45) DEFAULT NULL,
  `cantidad_venta` int(11) DEFAULT NULL,
  `valor_venta` int(20) DEFAULT NULL,
  `venta_talla` int(11) DEFAULT NULL,
  `estado_venta` int(11) DEFAULT NULL,
  `productos_idproductos` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventas`, `fecha_venta`, `cantidad_venta`, `valor_venta`, `venta_talla`, `estado_venta`, `productos_idproductos`, `usuario_idusuario`) VALUES
(1, '01-10-2020', 1, 75000, 25, 1, 1, 1),
(3, '09-10-2020', 1, 75000, 37, 1, 1, 1),
(16, '01-10-2020', 1, 75000, 42, 1, 1, 2),
(28, '09-11-2020', 1, 70000, 36, 1, 5, 1),
(30, '17-11-2020', 1, 70000, 25, 1, 6, 2),
(31, '10-11-2020', 1, 130000, 42, 1, 36, 9),
(32, '10-11-2020', 1, 70000, 42, 1, 6, 9),
(33, '10-11-2020', 1, 70000, 25, 1, 34, 9),
(34, '10-11-2020', 1, 130000, 25, 1, 36, 2),
(35, '10-11-2020', 1, 70000, 25, 1, 3, 9),
(36, '10-11-2020', 1, 70000, 25, 1, 2, 9),
(37, '10-11-2020', 1, 70000, 25, 1, 1, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idgenero`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproductos`),
  ADD KEY `fk_productos_marca1_idx` (`marca_idmarca`),
  ADD KEY `fk_productos_genero1_idx` (`genero_idgenero`),
  ADD KEY `fk_productos_proveedor1_idx` (`proveedor_idproveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_rol_idx` (`rol_idrol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventas`),
  ADD KEY `fk_ventas_productos1_idx` (`productos_idproductos`),
  ADD KEY `fk_ventas_usuario1_idx` (`usuario_idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idgenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_genero1` FOREIGN KEY (`genero_idgenero`) REFERENCES `genero` (`idgenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_marca1` FOREIGN KEY (`marca_idmarca`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_proveedor1` FOREIGN KEY (`proveedor_idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_productos1` FOREIGN KEY (`productos_idproductos`) REFERENCES `productos` (`idproductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
