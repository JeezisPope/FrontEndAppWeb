-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2023 a las 21:17:56
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
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` float NOT NULL,
  `product_image` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_image`) VALUES
(1, 'VueJS', 25, './img/1.jpg'),
(2, 'AngularJS', 25, './img/2.jpg'),
(3, 'ReactJS', 25, './img/3.jpg'),
(4, 'Redux', 25, './img/4.jpg'),
(5, 'Node.JS', 25, './img/5.jpg'),
(6, 'Sass', 25, './img/6.jpg'),
(7, 'HTML5', 25, './img/7.jpg'),
(8, 'Github', 25, './img/8.jpg'),
(9, 'Bulma', 25, './img/9.jpg'),
(10, 'Typescript', 25, './img/10.jpg'),
(11, 'Drupal', 25, './img/11.jpg'),
(12, 'Javascript', 25, './img/12.jpg'),
(13, 'GraphQL', 25, './img/13.jpg'),
(14, 'Wordpress', 25, './img/14.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
