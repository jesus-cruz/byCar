-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2017 a las 09:11:28
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bycardb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idViaje` int(11) NOT NULL,
  `idComen` int(11) NOT NULL,
  `comentario` varchar(140) CHARACTER SET latin1 NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `conductor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idViaje`, `idComen`, `comentario`, `puntuacion`, `conductor`) VALUES
(115, 1, ' Eres muy buen conductor', 4, 10),
(115, 2, ' Viaje excelente!', 5, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `origen` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `contenido` varchar(140) CHARACTER SET latin1 NOT NULL,
  `idMensaje` varchar(60) CHARACTER SET latin1 NOT NULL,
  `horaMensaje` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`origen`, `destino`, `contenido`, `idMensaje`, `horaMensaje`) VALUES
(3, 3, 'LOOOL', '346dcfa4174420e716fee969f9ffc4fb20620f99', '2017-06-12 23:14:35'),
(3, 3, 'Eso es raro', '5e47a008081dce877c876a65cbed14ac49f68fb6', '2017-06-12 23:14:26'),
(3, 3, 'Hola', '818936f513df936e08529334b45f12c182228e4d', '2017-06-12 23:14:21'),
(3, 3, 'Hola sara', '97165458bd9be7d01934660782c82d92f546e45a', '2017-06-13 00:57:26'),
(3, 10, 'Hola conductor', '445634464523hgref45e', '2017-06-14 09:28:35'),
(3, 10, 'Me llevas al parque?', '5cc26c3ab25659f9547bda41f8824cd24a884864', '2017-06-13 00:58:15'),
(3, 15, 'Hola luis!', '9e5ac879a49233f7ad96e624b8abbe5fd74c16c9', '2017-06-13 00:01:57'),
(10, 3, 'sdfasdf', '57b234d513929c886112029a551c0532c2b25f09', '2017-06-12 12:31:43'),
(10, 3, 'sdfasdf', '716a7cb05789a7e48961ff2f5bc6e8eff0d8be53', '2017-06-12 12:31:22'),
(10, 3, 'Hola usuario 3, Como estas?', 'f2f92387a2ec5de9bd0f8c326148305bf551c8a0', '2017-06-12 12:33:52'),
(15, 3, 'hola sara', '6b2b990b5ca285cb8f4c2ad89dea6013704c1ede', '2017-06-13 00:01:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paradas`
--

CREATE TABLE `paradas` (
  `idViaje` int(11) NOT NULL,
  `ciudadParada` varchar(100) CHARACTER SET latin1 NOT NULL,
  `fechaPaso` datetime NOT NULL,
  `precioParada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajerosviaje`
--

CREATE TABLE `pasajerosviaje` (
  `idViaje` int(11) NOT NULL,
  `idPasajero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pasajerosviaje`
--

INSERT INTO `pasajerosviaje` (`idViaje`, `idPasajero`) VALUES
(115, 3),
(119, 3),
(120, 3),
(120, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  `nombreUsuario` varchar(25) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `telefono` varchar(15) CHARACTER SET latin1 NOT NULL,
  `dni` varchar(12) CHARACTER SET latin1 NOT NULL,
  `fotoPath` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `flag`, `nombreUsuario`, `email`, `password`, `telefono`, `dni`, `fotoPath`) VALUES
(3, 0, 'sara', 'sara@gmail.com', 'sara', '12345677', '13123213123', '0'),
(10, 1, 'jesus', 'jesus@mail.com', 'jesus', '1231231', '12312321', '0'),
(14, 2, 'admin', 'adminadmin', 'admin', '00000000', '00000000', '0'),
(15, 0, 'Luis', 'luis@luis.com', 'luis', '677687543', '76545687A', ''),
(16, 0, 'asdfas', 'asdas', 'adfa', 'adfasefd', 'afcszdfc', ''),
(17, 0, 'alba', 'alba@alba', '5647845', '678909876', '67875904J', ''),
(18, 0, 'alba0', 'alba0@alba', 'tyjyrjbyujb', '678909876', '67875904J', ''),
(19, 0, 'jose', 'jose', 'jose', '8957374', '8473839H', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id` int(11) NOT NULL,
  `horaSalida` datetime NOT NULL,
  `horaLlegada` datetime NOT NULL,
  `conductorID` int(11) NOT NULL,
  `nPlazas` int(11) NOT NULL,
  `origen` varchar(100) CHARACTER SET latin1 NOT NULL,
  `destino` varchar(100) CHARACTER SET latin1 NOT NULL,
  `precio` int(11) NOT NULL,
  `cancelado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`id`, `horaSalida`, `horaLlegada`, `conductorID`, `nPlazas`, `origen`, `destino`, `precio`, `cancelado`) VALUES
(115, '2017-06-09 12:00:00', '0000-00-00 00:00:00', 10, 4, 'Leon', 'Cuenca', 25, 0),
(119, '2017-06-08 12:00:00', '2017-06-08 00:00:00', 10, 5, 'Leon', 'Barcelona', 34, 1),
(120, '2017-06-14 12:00:00', '2017-06-15 01:00:00', 10, 4, 'Roma', 'Napoles', 5, 0),
(121, '2017-06-16 17:00:00', '2017-06-16 05:00:00', 10, 3, 'Alfa', 'Beta', 100, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComen`),
  ADD KEY `idViaje` (`idViaje`),
  ADD KEY `conductor` (`conductor`);

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
  MODIFY `idComen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`conductor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `Mensajes_ibfk_1` FOREIGN KEY (`origen`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Mensajes_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paradas`
--
ALTER TABLE `paradas`
  ADD CONSTRAINT `Paradas_ibfk_1` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`);

--
-- Filtros para la tabla `pasajerosviaje`
--
ALTER TABLE `pasajerosviaje`
  ADD CONSTRAINT `PasajerosViaje_ibfk_1` FOREIGN KEY (`idPasajero`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PasajerosViaje_ibfk_2` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `Viajes_ibfk_1` FOREIGN KEY (`conductorID`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
