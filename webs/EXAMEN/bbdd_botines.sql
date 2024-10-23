-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 13-05-2024 a las 12:43:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbdd_botines`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `botines`
--

CREATE TABLE `botines` (
  `idBotin` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `precio` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `botines`
--

INSERT INTO `botines` (`idBotin`, `nombre`, `marca`, `precio`) VALUES
(1, 'Nike Mercurial Superfly', 'Nike', 289.99),
(2, 'Adidas Nemeziz Sg Pro', 'Adidas', 109.09),
(3, 'Fila Disruptor II', 'Fila', 137.50),
(4, 'Adidas Rojas Rock', 'Adidas', 200.78),
(5, 'pepe', 'Adidas', 200.78),
(6, 'Fila roja rock', 'Fila', 400.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `botines`
--
ALTER TABLE `botines`
  ADD PRIMARY KEY (`idBotin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `botines`
--
ALTER TABLE `botines`
  MODIFY `idBotin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
