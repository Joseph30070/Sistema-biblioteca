-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2025 a las 17:05:50
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
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `Id` int(11) NOT NULL,
  `Titulo` varchar(80) NOT NULL,
  `Autor` varchar(80) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Stock` int(20) NOT NULL,
  `Categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`Id`, `Titulo`, `Autor`, `Precio`, `Stock`, `Categoria`) VALUES
(1, 'La guerra de los mundos', 'H.G Wells', 19.50, 40, 'ciencia ficcion'),
(2, 'Harry Potter Y La piedra Filosofal', 'J.K. Rolling', 14.50, 12, 'magia,ficcion'),
(4, 'La ciudad y los perros', 'Mario Vargas llosa', 20.00, 20, 'Ficcion,Drama'),
(8, 'El señor de los anillos', 'J.R.R Tolkien', 20.70, 20, 'Fantasía, Aventura, Drama'),
(10, 'El principito', 'Antonio de Saint', 16.50, 20, 'Fabula, Literatura infantil'),
(11, 'La guerra de los mundos', 'H.G Wells', 25.90, 60, 'ciencia ficcion'),
(18, 'Metamorphosis', 'Franz Kafka', 17.60, 24, 'Literatura Fantastica'),
(19, 'Cien años de soledad', 'Gabriel Garcia Marquez', 20.99, 15, 'Novela'),
(22, 'El señor de los anillos', 'Mario Vargas llosa', 5.00, 20, 'ciencia ficcion');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
