-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2025 a las 01:02:25
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreriamanga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `Id_Autor` int(11) NOT NULL,
  `Nombre` varchar(35) NOT NULL,
  `Nacionalidad` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`Id_Autor`, `Nombre`, `Nacionalidad`) VALUES
(9001, 'Isayama Ajime', 'Japon'),
(9002, 'Kodama Yuuki', 'Japon'),
(9003, 'Kusaka Hidenori', 'Korea'),
(9004, 'Osamu Tezuka', 'Japon'),
(9005, 'Mashima Hiro ', 'Japon'),
(9006, 'Okamoto Lynn', 'Korea'),
(9007, 'Ishida Sui', 'Japon'),
(9008, 'Akira Toriyama', 'Japon'),
(9009, 'Chugong', 'Korea'),
(9010, 'Togashi Yoshihiro', 'Japon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `Nit_Editorial` int(11) NOT NULL,
  `NomEditorial` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`Nit_Editorial`, `NomEditorial`) VALUES
(1006824400, 'Shounen Jump'),
(1006825600, 'Young Jump'),
(1006825678, 'Shogakukan'),
(1006825699, 'Panini'),
(1006828418, 'Norma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `Id_Libro` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `FechaPublicacion` date DEFAULT NULL,
  `Paginas` int(11) DEFAULT NULL,
  `Idioma` varchar(30) DEFAULT NULL,
  `Nit_Editorial` int(11) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Id_Autor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`Id_Libro`, `Titulo`, `FechaPublicacion`, `Paginas`, `Idioma`, `Nit_Editorial`, `Precio`, `Id_Autor`) VALUES
(67911534, 'Blood Lad Tomo1', '2013-05-20', 190, 'Español', 1006828418, 80000.00, 9002),
(67943504, 'Ataque a los titanes Tomo 31', '2023-05-05', 188, 'Español', 1006828418, 65000.00, 9001),
(91493316, 'Pocket Monsters Special Tomo 1', '1997-06-19', 199, 'Ingles', 1006825678, 77850.00, 9003),
(91493320, 'The Legend of Zelda Twilight Princess Tomo 1', '2001-05-20', 192, 'Español', 1006828418, 44100.00, 9003),
(91493389, 'Hunter x Hunter Tomo 1', '1998-06-23', 197, 'Español', 1006824400, 89500.00, 9010),
(92378943, 'Solo leveling Tomo 9', '2010-05-07', 200, 'Español', 1006828418, 80500.00, 9009);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `Id_Prestamo` int(11) NOT NULL,
  `Id_Libro` int(11) DEFAULT NULL,
  `Id_Usuario` int(11) DEFAULT NULL,
  `FechaPrestamo` date NOT NULL,
  `FechaDevolucion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`Id_Prestamo`, `Id_Libro`, `Id_Usuario`, `FechaPrestamo`, `FechaDevolucion`) VALUES
(100001, 67911534, 1236548979, '2025-05-01', '2025-05-30'),
(100002, 91493316, 1036626549, '2025-05-04', '2025-05-31'),
(100003, 67943504, 1036626549, '2025-05-01', '2025-05-31'),
(100004, 91493316, 1036625898, '2025-03-04', '2025-05-31'),
(100006, 67911534, 92326548, '2025-05-23', '2025-06-20'),
(100007, 67911534, 1036626549, '2025-05-23', '2025-06-27'),
(100008, 91493316, 1036625898, '2025-05-23', '2025-07-17'),
(100009, 67911534, 1036625898, '2025-05-23', '2025-06-26'),
(100010, 67943504, 1036626549, '2025-05-23', '2025-06-24'),
(100011, 67943504, 1036626580, '2025-05-25', '2025-07-10'),
(100012, 67911534, 1036626549, '2025-05-21', '2025-05-31'),
(100013, 67943504, 96545654, '2025-05-02', '2025-05-30'),
(100014, 91493316, 96545654, '2025-05-08', '2025-05-31'),
(100015, 67911534, 1036626549, '2025-05-25', '2025-05-29'),
(100016, 67911534, 1036626549, '2025-05-22', '2025-05-13'),
(100017, 67943504, 96545654, '2025-05-07', '2025-05-29'),
(100018, 67911534, 1036626580, '2025-05-09', '2025-05-08'),
(100019, 67943504, 1036626549, '2025-05-06', '2025-05-16'),
(100020, 91493389, 1036625100, '2025-05-13', '2025-05-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_Usuario` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `CorreoUsuario` varchar(50) DEFAULT NULL,
  `FechaRegistro` date DEFAULT curdate(),
  `Telefono` int(11) DEFAULT NULL,
  `Observaciones` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_Usuario`, `Nombre`, `CorreoUsuario`, `FechaRegistro`, `Telefono`, `Observaciones`) VALUES
(92326548, 'Luisa Maria', 'marilu@gmail.com', '2022-05-21', 300564128, 'Buena Cliente muy formal'),
(96545654, 'Esteban Zuluaga', 'zuluaga@hotmail.com', '2022-05-22', 301258789, 'Le gusta mucho el Romance Comico'),
(1036625100, 'Rosana Acevedo', 'rosaac@hotmail.es', '2025-05-14', 2147483647, 'Niña Otaku'),
(1036625898, 'Angie Marin', 'mary@gmail.com', '2024-05-19', 301258795, 'Siempre compra De accion'),
(1036626525, 'David David', 'david@hto.com', '2025-05-14', 2147483647, 'Es una persona muy'),
(1036626549, 'Kevin Padre', 'kevi@hotmail.com', '2023-10-28', 305258798, 'Solo Comedia Romantica'),
(1036626580, 'Santiago Andrey', 'santu@gmail.com', '2020-07-25', 2147483647, 'Usuario Antiguo'),
(1236548979, 'Walter Morales', 'wal@hotmail.es', '2022-04-23', 305898785, 'Loco por la Mecha');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`Id_Autor`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`Nit_Editorial`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`Id_Libro`),
  ADD KEY `Id_Autor` (`Id_Autor`),
  ADD KEY `Nit_Editorial` (`Nit_Editorial`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`Id_Prestamo`),
  ADD KEY `Id_Libro` (`Id_Libro`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD UNIQUE KEY `CorreoUsuario` (`CorreoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `Id_Autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9012;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `Nit_Editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006828419;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `Id_Libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92378946;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `Id_Prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1236548980;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`Id_Autor`) REFERENCES `autores` (`Id_Autor`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`Nit_Editorial`) REFERENCES `editorial` (`Nit_Editorial`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`Id_Libro`) REFERENCES `libros` (`Id_Libro`),
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuarios` (`Id_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
