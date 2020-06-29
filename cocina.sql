-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2020 a las 22:16:56
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cocina`
--
CREATE DATABASE IF NOT EXISTS `cocina` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `cocina`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `contrasenia` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `administrador`:
--

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `usuario`, `nombre`, `correo`, `contrasenia`) VALUES
(1, 'Alejandra', 'Alejandra cardenas', 'Alejandra@gmail.com', '7894569513'),
(2, 'juan4568', 'Juan gonzalez', 'juangonzales@outlook.com', '456987'),
(3, 'juanita', 'juana ramirez', 'juanita@hotmail.com', '789456'),
(24, 'milena456', 'milena Ramirez', 'milena@hotmail.com', '45678989'),
(26, '20192578020', 'Maria la bonita', 'Manuela.Saenz@hotmail.com', 'hola123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despensa`
--

CREATE TABLE `despensa` (
  `id_despensa` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `despensa`:
--

--
-- Volcado de datos para la tabla `despensa`
--

INSERT INTO `despensa` (`id_despensa`, `nombre`, `ciudad`) VALUES
(1, 'la cocina de Christian', 'bogota'),
(4, 'LA COCINA ', 'Medellin'),
(8, 'cocina de aleja', 'choco'),
(12, 'Mercatodo juanita', 'choco'),
(13, 'Cocinando con juan', 'villavicencio'),
(14, 'despensa verduras', 'medellin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor`
--

CREATE TABLE `distribuidor` (
  `id_distribuidor` int(11) NOT NULL,
  `id_despensa` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombredistribuidor` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ciudaddistribuidor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correodistribuidor` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `distribuidor`:
--   `id_despensa`
--       `despensa` -> `id_despensa`
--   `id_producto`
--       `producto1` -> `id_producto`
--

--
-- Volcado de datos para la tabla `distribuidor`
--

INSERT INTO `distribuidor` (`id_distribuidor`, `id_despensa`, `id_producto`, `nombredistribuidor`, `ciudaddistribuidor`, `correodistribuidor`) VALUES
(29, 1, 2, 'Juan Lozano', 'medellin', 'Michael.Lorenz@hotmail.com'),
(33, 12, 8, 'Carbuidratos', 'villavicencio', 'alpinito@hotmail.com'),
(50, 4, 3, 'Juan solorzano', 'meta', 'alpinito@hoymail.com'),
(55, 4, 2, 'Carlos', 'Medellin', 'Michael.Lorenz@hotmail.com'),
(56, 12, 3, 'Tomatera la fortaleza', 'Medellin', 'miguel@hola.com'),
(58, 1, 2, 'Camilo', 'Medellin', 'miguel@hola.com'),
(60, 12, 4, 'Bananera san carlos', 'bogota', 'sancarlos@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlace_ad`
--

CREATE TABLE `enlace_ad` (
  `id_administrador` int(11) DEFAULT NULL,
  `id_despensa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `enlace_ad`:
--   `id_administrador`
--       `administrador` -> `id_administrador`
--   `id_despensa`
--       `despensa` -> `id_despensa`
--

--
-- Volcado de datos para la tabla `enlace_ad`
--

INSERT INTO `enlace_ad` (`id_administrador`, `id_despensa`) VALUES
(4, 1),
(1, 8),
(2, 1),
(24, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enlace_dp`
--

CREATE TABLE `enlace_dp` (
  `id_distribuidor` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `enlace_dp`:
--   `id_distribuidor`
--       `distribuidor` -> `id_distribuidor`
--   `id_producto`
--       `producto1` -> `id_producto`
--

--
-- Volcado de datos para la tabla `enlace_dp`
--

INSERT INTO `enlace_dp` (`id_distribuidor`, `id_producto`) VALUES
(29, 2),
(29, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto1`
--

CREATE TABLE `producto1` (
  `id_producto` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `nombre_producto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `unidad_medida` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `precio_compra` double NOT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `producto1`:
--   `id_tipo`
--       `tipoproducto` -> `id_tipo`
--

--
-- Volcado de datos para la tabla `producto1`
--

INSERT INTO `producto1` (`id_producto`, `id_tipo`, `nombre_producto`, `unidad_medida`, `cantidad`, `peso`, `precio_compra`, `fecha_compra`, `fecha_vencimiento`) VALUES
(1, 1, 'yogurt de melocoton', 'litros', 0, 25, 75000, '2020-03-29', '2020-04-15'),
(2, 2, 'huevos de codorniz', 'unidades', 100, 0, 60000, '2020-06-01', '2020-07-16'),
(3, 4, 'Tomate', 'unidades', 100, 0, 25000, '2020-06-17', '2020-07-11'),
(4, 4, 'Bananos', 'kilos', 0, 20, 80000, '2020-06-17', '2020-07-11'),
(8, 4, 'zanahorias', 'kilos', 0, 100, 500000, '2020-05-31', '2020-07-11'),
(9, 4, 'zanahorias', 'kilos', 0, 100, 500000, '2020-05-31', '2020-07-11'),
(10, 4, 'limones', 'libras', 0, 2, 25000, '2020-05-31', '2020-07-11'),
(11, 4, 'zandias', 'unidades', 50, 0, 500000, '2020-05-31', '2020-07-09'),
(12, 4, 'Tomate', 'toneladas', 0, 100, 1000000, '2020-05-31', '2020-07-11'),
(16, 6, 'cebolla larga', 'libras', 0, 25, 25, '2020-06-01', '2020-07-18'),
(17, 4, 'Tomate', 'libras', 0, 15, 450000, '2020-06-11', '2020-07-10'),
(18, 7, 'lomo', 'kilos', 1, 100, 0, '0000-00-00', '0000-00-00'),
(19, 4, 'zanahorias', 'libras', 2, 5, 0, '0000-00-00', '0000-00-00'),
(20, 3, 'papa criolla', 'libras', 2, 10, 50000, '2020-05-31', '2020-07-01'),
(21, 6, 'cebolla cabezona', 'unidades', 1000, 0, 1000000, '2020-05-31', '2020-07-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `tipoproducto` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `es_refrigerable` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `tiene_vencimiento` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- RELACIONES PARA LA TABLA `tipoproducto`:
--

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`id_tipo`, `nombre`, `es_refrigerable`, `tiene_vencimiento`) VALUES
(1, 'Lacteos', 'si', 'si'),
(2, 'Huevos', 'si', 'si'),
(3, 'patatas', 'no', 'si'),
(4, 'frutas', 'si/no', 'si'),
(5, 'Carne de res', 'si', 'si'),
(6, 'verduras', 'si', 'si'),
(7, 'Carne de cerdo', 'si', 'si'),
(8, 'pescado', 'si', 'si'),
(9, 'Legumbres', 'si', 'si');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `despensa`
--
ALTER TABLE `despensa`
  ADD PRIMARY KEY (`id_despensa`);

--
-- Indices de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD PRIMARY KEY (`id_distribuidor`),
  ADD KEY `id_despensa` (`id_despensa`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `enlace_ad`
--
ALTER TABLE `enlace_ad`
  ADD KEY `id_administrador` (`id_administrador`) USING BTREE,
  ADD KEY `id_despensa` (`id_despensa`);

--
-- Indices de la tabla `enlace_dp`
--
ALTER TABLE `enlace_dp`
  ADD KEY `id_distribuidor` (`id_distribuidor`) USING BTREE,
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto1`
--
ALTER TABLE `producto1`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `despensa`
--
ALTER TABLE `despensa`
  MODIFY `id_despensa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  MODIFY `id_distribuidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `producto1`
--
ALTER TABLE `producto1`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD CONSTRAINT `distribuidor_despensa` FOREIGN KEY (`id_despensa`) REFERENCES `despensa` (`id_despensa`),
  ADD CONSTRAINT `distribuidor_producto1` FOREIGN KEY (`id_producto`) REFERENCES `producto1` (`id_producto`);

--
-- Filtros para la tabla `enlace_ad`
--
ALTER TABLE `enlace_ad`
  ADD CONSTRAINT `enlace_administrador` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`),
  ADD CONSTRAINT `enlace_despensa` FOREIGN KEY (`id_despensa`) REFERENCES `despensa` (`id_despensa`);

--
-- Filtros para la tabla `enlace_dp`
--
ALTER TABLE `enlace_dp`
  ADD CONSTRAINT `enlace_distribuidor` FOREIGN KEY (`id_distribuidor`) REFERENCES `distribuidor` (`id_distribuidor`),
  ADD CONSTRAINT `enlace_producto1` FOREIGN KEY (`id_producto`) REFERENCES `producto1` (`id_producto`);

--
-- Filtros para la tabla `producto1`
--
ALTER TABLE `producto1`
  ADD CONSTRAINT `producto1_tipoproducto` FOREIGN KEY (`id_tipo`) REFERENCES `tipoproducto` (`id_tipo`);


--
-- Metadatos
--
USE `phpmyadmin`;

--
-- Metadatos para la tabla administrador
--

--
-- Metadatos para la tabla despensa
--

--
-- Metadatos para la tabla distribuidor
--

--
-- Metadatos para la tabla enlace_ad
--

--
-- Metadatos para la tabla enlace_dp
--

--
-- Metadatos para la tabla producto1
--

--
-- Metadatos para la tabla tipoproducto
--

--
-- Metadatos para la base de datos cocina
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
