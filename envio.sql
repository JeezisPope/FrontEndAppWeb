-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2023 a las 21:17:34
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `frontend1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `id` int(11) NOT NULL,
  `street` varchar(128) COLLATE utf16_spanish_ci NOT NULL,
  `city` varchar(128) COLLATE utf16_spanish_ci NOT NULL,
  `district` varchar(128) COLLATE utf16_spanish_ci NOT NULL,
  `numbero` varchar(15) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`id`, `street`, `city`, `district`, `numbero`) VALUES
(33, 'Av Molina', 'Lima', 'San Borja', '185'),
(34, 'Juan', 'Lima', 'La Molina', '752'),
(35, 'Juan', 'Lima', 'La Molina', '159'),
(36, 'Molina', 'Lima', 'La Molina', '189'),
(37, 'Prolongación Primavera 2390', 'Lima', 'Miraflores', '9'),
(38, 'Perro', 'Lima', 'San Borja', '198'),
(39, 'Yuzu', 'Lima', 'Baranco', '189'),
(40, 'Pedro', 'Lima', 'Baranco', '185'),
(41, 'Calle zarate', 'Lima', 'La Molina', '179'),
(42, 'Av La Molina', 'Lima', 'Miraflores', '150'),
(43, 'Av Pedro', 'Lima', 'Chorrillos', '895');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
