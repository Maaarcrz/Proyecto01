-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2019 a las 16:55:42
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
-- Estructura de tabla para la tabla `tbl_disponible`
--

CREATE TABLE `tbl_disponible` (
  `id_disponible` int(3) NOT NULL,
  `nombre_disponible` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `nombre_recurso` char(30) DEFAULT NULL,
  `disponible` int(3) DEFAULT NULL,
  `id_tipo_recurso` int(11) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `incidencia` int(11) DEFAULT NULL
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
  `nombre_tipus_recurso` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_disponible`
--
ALTER TABLE `tbl_disponible`
  ADD PRIMARY KEY (`id_disponible`);

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
  ADD KEY `id_tipo_recurso` (`id_tipo_recurso`),
  ADD KEY `fk_disponible` (`disponible`);

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
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id_tipo_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `fk_disponible` FOREIGN KEY (`disponible`) REFERENCES `tbl_disponible` (`id_disponible`),
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
