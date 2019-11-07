-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2019 a las 16:08:57
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_reservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencia`
--

CREATE TABLE `tbl_incidencia` (
  `id_incidencia` int(11) NOT NULL,
  `id_reserva` int(11) DEFAULT NULL,
  `id_tipo_incidencia` int(11) DEFAULT NULL,
  `descripcion` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recurso`
--

CREATE TABLE `tbl_recurso` (
  `id_recurso` int(11) NOT NULL,
  `nombre_recurso` char(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` varchar(10) NOT NULL,
  `id_tipo_recurso` int(11) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_recurso`
--

INSERT INTO `tbl_recurso` (`id_recurso`, `nombre_recurso`, `estado`, `id_tipo_recurso`, `Descripcion`, `Imagen`) VALUES
(19, 'Sala de informatica', 'disponible', 4, 'Sala de informatica equipada con 20 ordenadores sobremesa, monitores de 21 pulgadas, teclado y raton.', 'salainformatica.jpg'),
(20, 'Taller de cocina', 'reservado', 5, 'Taller equipado con 2 vitroceramicas y 2 fogones. Multiples armarios para vajilla. Nevera amplia y congelador industrial. ', 'tallercocina.jpg'),
(21, 'test1', 'disponible', 7, 'descripcion', ''),
(22, 'test 2', 'disponible', 6, 'descripcion\r\n', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_ini` time NOT NULL,
  `hora_fin` time NOT NULL,
  `incidencia` int(11) DEFAULT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipus_incidencia`
--

CREATE TABLE `tbl_tipus_incidencia` (
  `id_tipo_incidencia` int(11) NOT NULL,
  `nombre_tipus_incidencias` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipus_recurso`
--

CREATE TABLE `tbl_tipus_recurso` (
  `id_tipo_recurso` int(11) NOT NULL,
  `nombre_tipus_recurso` char(30) DEFAULT NULL,
  `imagen_tipo_recurso` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipus_recurso`
--

INSERT INTO `tbl_tipus_recurso` (`id_tipo_recurso`, `nombre_tipus_recurso`, `imagen_tipo_recurso`, `descripcion`) VALUES
(3, 'Sala multidisciplinar', 'salamultidisciplinar.jpg', ''),
(4, 'Sala de informatica', 'salainformatica.jpg', ''),
(5, 'Otras salas', 'otrassalas.png', ''),
(6, 'Proyector', 'proyector.jpg', ''),
(7, 'Portatil', 'portatil.jpg', ''),
(8, 'Movil', 'movil.jpg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `user` char(30) DEFAULT NULL,
  `pass` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `user`, `pass`) VALUES
(1, 'ripley', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_tipo_incidencia` (`id_tipo_incidencia`);

--
-- Indices de la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  ADD PRIMARY KEY (`id_recurso`),
  ADD KEY `id_tipo_recurso` (`id_tipo_recurso`);

--
-- Indices de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_recurso` (`id_recurso`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_tipus_incidencia`
--
ALTER TABLE `tbl_tipus_incidencia`
  ADD PRIMARY KEY (`id_tipo_incidencia`);

--
-- Indices de la tabla `tbl_tipus_recurso`
--
ALTER TABLE `tbl_tipus_recurso`
  ADD PRIMARY KEY (`id_tipo_recurso`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tbl_tipus_incidencia`
--
ALTER TABLE `tbl_tipus_incidencia`
  MODIFY `id_tipo_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_tipus_recurso`
--
ALTER TABLE `tbl_tipus_recurso`
  MODIFY `id_tipo_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD CONSTRAINT `tbl_incidencia_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `tbl_reserva` (`id_reserva`),
  ADD CONSTRAINT `tbl_incidencia_ibfk_2` FOREIGN KEY (`id_tipo_incidencia`) REFERENCES `tbl_tipus_incidencia` (`id_tipo_incidencia`);

--
-- Filtros para la tabla `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  ADD CONSTRAINT `tbl_recurso_ibfk_1` FOREIGN KEY (`id_tipo_recurso`) REFERENCES `tbl_tipus_recurso` (`id_tipo_recurso`);

--
-- Filtros para la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `tbl_reserva_ibfk_1` FOREIGN KEY (`id_recurso`) REFERENCES `tbl_recurso` (`id_recurso`),
  ADD CONSTRAINT `tbl_reserva_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
