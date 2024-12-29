-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-12-2024 a las 23:12:12
-- Versión del servidor: 10.11.10-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u484054490_edp32`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoluz`
--

CREATE TABLE `estadoluz` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estadoluz`
--

INSERT INTO `estadoluz` (`id`, `descripcion`) VALUES
(1, 'Encendido '),
(2, 'Apagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `luces`
--

CREATE TABLE `luces` (
  `codluz` varchar(50) NOT NULL,
  `nombreluz` varchar(100) DEFAULT NULL,
  `descripcionluz` varchar(150) DEFAULT NULL,
  `estadoluz` int(11) DEFAULT NULL,
  `fechaestadoluz` date DEFAULT NULL,
  `horaestadoluz` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `luces`
--

INSERT INTO `luces` (`codluz`, `nombreluz`, `descripcionluz`, `estadoluz`, `fechaestadoluz`, `horaestadoluz`) VALUES
('l1', 'luz navidad', 'null', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrosluces`
--

CREATE TABLE `registrosluces` (
  `id` int(11) NOT NULL,
  `codluz` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecharegistro` date DEFAULT NULL,
  `horaregistro` varchar(30) DEFAULT NULL,
  `ipregistro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `token`
--

INSERT INTO `token` (`id`, `token`, `estado`) VALUES
(1, '7WK5T79u5mIzjIXXi2oI9Fglmgivv7RAJ7izyj9tUyQ', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estadoluz`
--
ALTER TABLE `estadoluz`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `luces`
--
ALTER TABLE `luces`
  ADD PRIMARY KEY (`codluz`),
  ADD KEY `estadoluz` (`estadoluz`);

--
-- Indices de la tabla `registrosluces`
--
ALTER TABLE `registrosluces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codluz` (`codluz`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registrosluces`
--
ALTER TABLE `registrosluces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `luces`
--
ALTER TABLE `luces`
  ADD CONSTRAINT `luces_ibfk_1` FOREIGN KEY (`estadoluz`) REFERENCES `estadoluz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registrosluces`
--
ALTER TABLE `registrosluces`
  ADD CONSTRAINT `registrosluces_ibfk_1` FOREIGN KEY (`codluz`) REFERENCES `luces` (`codluz`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registrosluces_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estadoluz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
