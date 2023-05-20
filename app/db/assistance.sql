-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2019 a las 18:54:08
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `assistance`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acumulacion`
--

CREATE TABLE `acumulacion` (
  `IdAcum` int(10) NOT NULL,
  `IdUsua` int(10) NOT NULL,
  `FallasAcum` int(10) NOT NULL,
  `RetardosAcum` int(10) NOT NULL,
  `PuntosAcum` int(10) NOT NULL,
  `Eviden` varbinary(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `IdAsis` int(10) NOT NULL,
  `IdUsua` int(10) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(10) NOT NULL,
  `DesRol` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRol`, `DesRol`) VALUES
(1, 'Instructor'),
(2, 'Aprendiz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `IdUser` int(10) NOT NULL,
  `Nom` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contra` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IdUsua` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`IdUser`, `Nom`, `Contra`, `IdUsua`) VALUES
(3, 'Marco', '098765', 12345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_roles`
--

CREATE TABLE `users_roles` (
  `IdUser` int(10) NOT NULL,
  `IdRol` int(10) NOT NULL,
  `FechaAsig` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_roles`
--

INSERT INTO `users_roles` (`IdUser`, `IdRol`, `FechaAsig`) VALUES
(3, 1, '2019-07-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `DocUsua` int(10) NOT NULL,
  `NomUsua` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ApeUsua` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TelUsua` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Correo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`DocUsua`, `NomUsua`, `ApeUsua`, `TelUsua`, `Correo`) VALUES
(12345, 'Marco', 'Solis', '4326587', 'marco45@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acumulacion`
--
ALTER TABLE `acumulacion`
  ADD PRIMARY KEY (`IdAcum`),
  ADD KEY `IdUsua` (`IdUsua`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`IdAsis`),
  ADD KEY `IdUsua` (`IdUsua`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUser`),
  ADD KEY `IdUsua` (`IdUsua`);

--
-- Indices de la tabla `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`IdUser`,`IdRol`),
  ADD KEY `users_roles_ibfk_1` (`IdRol`),
  ADD KEY `IdUser` (`IdUser`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`DocUsua`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acumulacion`
--
ALTER TABLE `acumulacion`
  MODIFY `IdAcum` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `IdAsis` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acumulacion`
--
ALTER TABLE `acumulacion`
  ADD CONSTRAINT `acumulacion_ibfk_1` FOREIGN KEY (`IdUsua`) REFERENCES `usuarios` (`DocUsua`);

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`IdUsua`) REFERENCES `usuarios` (`DocUsua`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`IdUsua`) REFERENCES `usuarios` (`DocUsua`);

--
-- Filtros para la tabla `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_ibfk_1` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`IdRol`),
  ADD CONSTRAINT `users_roles_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `users` (`IdUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
