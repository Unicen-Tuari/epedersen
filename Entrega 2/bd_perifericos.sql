-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2018 a las 15:01:18
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_perifericos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periferico`
--

CREATE TABLE `periferico` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periferico`
--

INSERT INTO `periferico` (`id`, `titulo`, `descripcion`, `marca`, `id_tipo`) VALUES
(2, 'G213', 'Teclado económico de Logitech', 'Logitech', 2),
(3, 'Basilisk', 'Mouse para shooters de Razer', 'Razer', 1),
(4, 'Mekano', 'Teclado de gama media de Sentey', 'Sentey', 2),
(6, 'Void Pro', 'Últimos auriculares de Corsair', 'Corsair', 3),
(7, 'ROG Swift PG348Q', 'Monitor wide y curvo de Asus', 'Asus', 4),
(9, 'Blackwidow V.2', 'Teclado vanguardia de Razer', 'Razer', 2),
(10, 'Nommo', 'Nuevos parlantes de Razer', 'Razer', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`) VALUES
(1, 'Mouse'),
(2, 'Teclado'),
(3, 'Auriculares'),
(4, 'Monitor'),
(5, 'Parlante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `password`, `admin`) VALUES
(1, 'erik_gz@live.com', '$2y$10$3f4qMe0fHuIVBn9Bi.1FG.UipwFqcXbiBuecO.kG1JCXsRN45Y5Wq', 1),
(2, 'usuario@gmail.com', '$2y$10$G0v/AoSzoFeelqsvX6r59ue3CStJEgRGSmodlACJXDNO8oeJMWUGq', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `periferico`
--
ALTER TABLE `periferico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `periferico`
--
ALTER TABLE `periferico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `periferico`
--
ALTER TABLE `periferico`
  ADD CONSTRAINT `periferico_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
