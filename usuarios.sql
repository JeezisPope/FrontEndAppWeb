-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2023 a las 21:18:03
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) COLLATE utf16_spanish_ci NOT NULL,
  `apellido` varchar(128) COLLATE utf16_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf16_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf16_spanish_ci NOT NULL,
  `clave_hash` varchar(255) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `email`, `clave_hash`) VALUES
(42, 'Carlos', 'Zelada', '123456789', 'perro@gmail.com', '$2y$10$aFUrd.T.kwrA38LoQiSli.Z9fF7yQAe0Tb9J8DTon670EHBqNCX8a'),
(43, 'Padilla', 'Zelada', '123456789', 'hola@gmail.com', '$2y$10$B2k40sextMLmTurDumcyQOaDQwkGKYKhslgVmi98KTNMobZpbw272'),
(49, 'Padilla', 'Zelada', '989523510', 'sdfsfsf@gmail.com', '$2y$10$QSKPyaBzgbu5sXxfsuWTWOb0xkgdlyEGBMMmGUBu3wMOXfCOY6A9q'),
(50, 'Carlos', 'Zelada', '989523510', 'juan@gmail.com', '$2y$10$Gz7nQpsXlpvxaBxcEh8.9ucnptb2rZ3aBXhai8PrnRCCAkgM1ujta'),
(51, 'Renzo', 'Lavao', '989523510', 'Renzo@gmail.com', '$2y$10$SiCLbxpJ51UuYKG5qxBMpetTpdlCpiKB8Y1iNU2IzqSS9qYOyXVE2'),
(52, 'Carlos', 'Zelada', '989523510', 'juanito@gmail.com', '$2y$10$c/beJPNjdzuDABHwRPC3ou7/4IyilqdfzrnqarfiZ5ZW6rS1P86L6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
