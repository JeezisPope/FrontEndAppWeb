-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2023 a las 21:17:45
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
-- Estructura de tabla para la tabla `metodopago`
--

CREATE TABLE `metodopago` (
  `id` int(11) NOT NULL,
  `cardholder` varchar(16) COLLATE utf16_spanish_ci NOT NULL,
  `cardnumber` varchar(16) COLLATE utf16_spanish_ci NOT NULL,
  `cvv` varchar(3) COLLATE utf16_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `metodopago`
--

INSERT INTO `metodopago` (`id`, `cardholder`, `cardnumber`, `cvv`, `fecha`) VALUES
(35, 'Carro', '1234567898765432', '159', '2022-12-15'),
(36, 'Juan', '1234567898765432', '789', '2022-12-08'),
(37, 'Juan', '1234567898765432', '789', '2022-12-08'),
(38, 'Perito', '1234567898765432', '189', '2022-11-23'),
(39, 'Carro', '1234567898765432', '186', '2022-12-14'),
(40, 'askjhd', '1234567898765432', '158', '2022-12-21'),
(41, 'Pedro', '1234567898765432', '189', '2022-12-08'),
(42, 'perro', '1234567898765432', '846', '2022-12-01'),
(43, 'Carlos', '1234567898765432', '158', '2022-11-25'),
(44, 'Carlos Zelada', '1234567898765432', '178', '2022-12-17'),
(45, 'Carlos Zelada', '1234567898765432', '189', '2022-12-06'),
(46, 'Pedro', '1234567898765432', '256', '2023-04-14'),
(47, 'Renzo', '1234567898765432', '158', '2023-03-17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `metodopago`
--
ALTER TABLE `metodopago`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `metodopago`
--
ALTER TABLE `metodopago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
