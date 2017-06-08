-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2017 a las 12:54:39
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idViaje` int(11) NOT NULL,
  `idComen` int(11) NOT NULL,
  `comentario` varchar(140) NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `origen` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `contenido` varchar(140) NOT NULL,
  `idMensaje` varchar(60) NOT NULL,
  `horaMensaje` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`origen`, `destino`, `contenido`, `idMensaje`, `horaMensaje`) VALUES
(2, 1, 'Que tal', '035d5cf84acb8444e4e46ce3451e7c8e7872206c', '2017-06-08 12:40:33'),
(2, 1, '2', '12307f9c07f05f1d4d62a19373be1135b832cfa2', '2017-06-08 12:41:17'),
(2, 1, '1', '132ab6ee7e19dba979264f91b202d83e7596f350', '2017-06-08 12:41:16'),
(2, 1, 'k', '17541b7e4b24a2afdaa9422a60b079ac1432bd0f', '2017-06-08 12:41:01'),
(2, 1, 'l', '1c5a595ba39176e6c8591cde9f3419f3e80a8d84', '2017-06-08 12:41:04'),
(2, 1, 'b', '1c60d51bf541a07714fb404af81f83824c838798', '2017-06-08 12:40:37'),
(2, 1, 'm', '2b753db8784e3420c47f0d5881275f0df841fe67', '2017-06-08 12:41:05'),
(2, 1, 'd', '3e3afb2c4c811f56fa82fafcf801e5af2c7640a5', '2017-06-08 12:40:41'),
(2, 1, '3', '5323628f113b129f6eb2ff31d51713ce01ea1192', '2017-06-08 12:41:26'),
(2, 1, 'c', '579cd36dd07636881c2e4c8b331afb51f0c7414c', '2017-06-08 12:40:38'),
(2, 1, 'a', '8218804e3b09d4a947431e971fd598c14cc766d4', '2017-06-08 12:40:36'),
(2, 1, 'f', '822ef2e0b2a704a0c907d1d16df089f770d8a7ee', '2017-06-08 12:40:43'),
(2, 1, 'i', 'c80569ceaa7cf9921fe063218cc3b5487f6482da', '2017-06-08 12:40:54'),
(2, 1, '4', 'd721b27a9f7917c164539cbbe06e2032b8845814', '2017-06-08 12:41:26'),
(2, 1, 'g', 'd893be63079dcbd17d8d3e7bfb536e6ac39cd89c', '2017-06-08 12:40:44'),
(2, 1, 'j', 'ded587161af01e495af811bd05e137a8003c2f91', '2017-06-08 12:40:58'),
(2, 1, 'h', 'e87c5c63a7d0d8ca6628599b8b19fd0cf3949e0b', '2017-06-08 12:40:50'),
(2, 1, 'Hola', 'ebee5bb3419a617a15a1a444815b1e0e2ea5abc5', '2017-06-08 12:40:30'),
(2, 1, 'e', 'ff5d3b73be1047b3be733a20d9f41c4b4bf1220e', '2017-06-08 12:40:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paradas`
--

CREATE TABLE `paradas` (
  `idViaje` int(11) NOT NULL,
  `ciudadParada` varchar(100) NOT NULL,
  `fechaPaso` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajerosviaje`
--

CREATE TABLE `pasajerosviaje` (
  `idViaje` int(11) NOT NULL,
  `idPasajero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  `nombreUsuario` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `dni` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `flag`, `nombreUsuario`, `email`, `password`, `telefono`, `dni`) VALUES
(1, 0, 'pikachu', 'pikaìka@pokemail.com', 'aasdasd', '0000000', '00000000'),
(2, 0, 'trump', 'POTUS@pokemail.com', 'adasdasd', '0000044', '00000044');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id` int(11) NOT NULL,
  `horaSalida` datetime NOT NULL,
  `precio` float NOT NULL,
  `conductorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComen`),
  ADD KEY `idViaje` (`idViaje`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`origen`,`destino`,`idMensaje`),
  ADD KEY `destino` (`destino`);

--
-- Indices de la tabla `paradas`
--
ALTER TABLE `paradas`
  ADD PRIMARY KEY (`idViaje`,`ciudadParada`);

--
-- Indices de la tabla `pasajerosviaje`
--
ALTER TABLE `pasajerosviaje`
  ADD PRIMARY KEY (`idViaje`,`idPasajero`),
  ADD KEY `idPasajero` (`idPasajero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conductorID` (`conductorID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `Comentarios_ibfk_1` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `Mensajes_ibfk_1` FOREIGN KEY (`origen`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `Mensajes_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `paradas`
--
ALTER TABLE `paradas`
  ADD CONSTRAINT `Paradas_ibfk_1` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`);

--
-- Filtros para la tabla `pasajerosviaje`
--
ALTER TABLE `pasajerosviaje`
  ADD CONSTRAINT `PasajerosViaje_ibfk_1` FOREIGN KEY (`idPasajero`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `PasajerosViaje_ibfk_2` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`);

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `Viajes_ibfk_1` FOREIGN KEY (`conductorID`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
