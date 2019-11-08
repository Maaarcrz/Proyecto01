-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 06:11 PM
-- Server version: 8.0.13
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_reservas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_incidencia`
--

CREATE TABLE `tbl_incidencia` (
  `id_incidencia` int(11) NOT NULL,
  `id_reserva` int(11) DEFAULT NULL,
  `id_tipo_incidencia` int(11) DEFAULT NULL,
  `descripcion` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recurso`
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
-- Dumping data for table `tbl_recurso`
--

INSERT INTO `tbl_recurso` (`id_recurso`, `nombre_recurso`, `estado`, `id_tipo_recurso`, `Descripcion`, `Imagen`) VALUES
(19, 'Sala de informatica 1', 'disponible', 4, 'Sala de informatica equipada con 20 ordenadores sobremesa, monitores de 21 pulgadas, teclado y raton.', 'salainformatica.jpg'),
(20, 'Taller de cocina', 'disponible', 5, 'Taller equipado con 2 vitroceramicas y 2 fogones. Multiples armarios para vajilla. Nevera amplia y congelador industrial. ', 'tallercocina.jpg'),
(24, 'Sala de informatica 2', 'disponible', 4, 'Sala 2', ''),
(25, 'Sala multidisciplinar 1', 'disponible', 3, NULL, ''),
(26, 'Sala multidisciplinar 2', 'disponible', 3, NULL, ''),
(28, 'Sala multidisciplinar 3', 'disponible', 3, NULL, ''),
(29, 'Sala multidisciplinar 4', 'disponible', 3, NULL, ''),
(30, 'Despacho para entrevistas 1', 'disponible', 5, NULL, ''),
(31, 'Despacho para entrevistas 2', 'disponible', 5, NULL, ''),
(32, 'Salón de actos', 'disponible', 5, NULL, ''),
(33, 'Sala de reuniones', 'disponible', 5, NULL, ''),
(34, 'Proyector 1', 'disponible', 6, NULL, ''),
(35, 'Proyector 2', 'disponible', 6, NULL, ''),
(36, 'Portátil 1', 'disponible', 7, NULL, ''),
(37, 'Portátil 2', 'disponible', 7, NULL, ''),
(38, 'Portátil 3', 'disponible', 7, NULL, ''),
(39, 'Móvil 1', 'disponible', 8, NULL, ''),
(40, 'Móvil 2', 'disponible', 8, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_ini` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_ini` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `incidencia` int(11) DEFAULT NULL,
  `descripcion` varchar(100) NOT NULL,
  `Finalizado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_reserva`
--

INSERT INTO `tbl_reserva` (`id_reserva`, `id_recurso`, `id_usuario`, `fecha_ini`, `fecha_fin`, `hora_ini`, `hora_fin`, `incidencia`, `descripcion`, `Finalizado`) VALUES
(52, 31, 1, '2019-11-20', '0000-00-00', NULL, '04:11:23', NULL, '', 1),
(53, 36, 1, '2019-11-08', '2019-11-08', '04:11:58', '06:11:08', NULL, 'asasa', 1),
(54, 38, 21, '2019-11-08', '2019-11-08', '04:11:04', '05:11:55', NULL, 'saed', 1),
(55, 26, 21, '2019-11-08', '2019-11-08', '04:11:12', '05:11:42', NULL, 'aa', 1),
(56, 32, 21, '2019-11-08', '2019-11-08', '05:11:07', '05:11:00', NULL, 'asdsa', 1),
(57, 25, 1, '2019-11-08', '2019-11-08', '05:11:08', '05:11:03', NULL, 'desc', 1),
(58, 29, 1, '2019-11-08', '2019-11-08', '05:11:32', '06:11:31', NULL, 'eqweq', 1),
(59, 30, 1, '2019-11-08', '2019-11-08', '06:11:50', '06:11:06', NULL, 'ha', 1),
(60, 34, 1, '2019-11-08', '2019-11-08', '06:11:32', '06:11:48', NULL, 'a', 1),
(61, 35, 1, '2019-11-08', '2019-11-08', '06:11:38', '06:11:45', NULL, '', 1),
(62, 26, 1, '2019-11-08', '2019-11-08', '06:11:41', '06:11:46', NULL, 'desc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipus_incidencia`
--

CREATE TABLE `tbl_tipus_incidencia` (
  `id_tipo_incidencia` int(11) NOT NULL,
  `nombre_tipus_incidencias` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipus_recurso`
--

CREATE TABLE `tbl_tipus_recurso` (
  `id_tipo_recurso` int(11) NOT NULL,
  `nombre_tipus_recurso` char(30) DEFAULT NULL,
  `imagen_tipo_recurso` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tipus_recurso`
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
-- Table structure for table `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `user` char(30) DEFAULT NULL,
  `pass` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `user`, `pass`) VALUES
(1, 'ripley', '81dc9bdb52d04dc20036dbd8313ed055'),
(21, 'ripley2', 'd93591bdf7860e1e4ee2fca799911215');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_tipo_incidencia` (`id_tipo_incidencia`);

--
-- Indexes for table `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  ADD PRIMARY KEY (`id_recurso`),
  ADD KEY `id_tipo_recurso` (`id_tipo_recurso`);

--
-- Indexes for table `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_recurso` (`id_recurso`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `tbl_tipus_incidencia`
--
ALTER TABLE `tbl_tipus_incidencia`
  ADD PRIMARY KEY (`id_tipo_incidencia`);

--
-- Indexes for table `tbl_tipus_recurso`
--
ALTER TABLE `tbl_tipus_recurso`
  ADD PRIMARY KEY (`id_tipo_recurso`);

--
-- Indexes for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_tipus_incidencia`
--
ALTER TABLE `tbl_tipus_incidencia`
  MODIFY `id_tipo_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tipus_recurso`
--
ALTER TABLE `tbl_tipus_recurso`
  MODIFY `id_tipo_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD CONSTRAINT `tbl_incidencia_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `tbl_reserva` (`id_reserva`),
  ADD CONSTRAINT `tbl_incidencia_ibfk_2` FOREIGN KEY (`id_tipo_incidencia`) REFERENCES `tbl_tipus_incidencia` (`id_tipo_incidencia`);

--
-- Constraints for table `tbl_recurso`
--
ALTER TABLE `tbl_recurso`
  ADD CONSTRAINT `tbl_recurso_ibfk_1` FOREIGN KEY (`id_tipo_recurso`) REFERENCES `tbl_tipus_recurso` (`id_tipo_recurso`);

--
-- Constraints for table `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `tbl_reserva_ibfk_1` FOREIGN KEY (`id_recurso`) REFERENCES `tbl_recurso` (`id_recurso`),
  ADD CONSTRAINT `tbl_reserva_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
