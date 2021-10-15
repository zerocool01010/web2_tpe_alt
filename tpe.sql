-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2021 a las 01:28:50
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id_recurso` int(11) NOT NULL,
  `recurso` varchar(45) NOT NULL,
  `germinacion` varchar(45) DEFAULT NULL,
  `id_zona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id_recurso`, `recurso`, `germinacion`, `id_zona`) VALUES
(7, 'Campanilla de invierno', 'Invierno', 6),
(8, 'Cono de pino', 'Perenne', 2),
(11, 'Romero', 'Otoño', 5),
(13, 'Manzanilla', 'Verano', 7),
(18, 'Margarita', 'Verano', 7),
(19, 'Laurel', 'Invierno', 2),
(20, 'Pétalos de rosa', 'Primavera', 7),
(23, 'Lagrima ceniza', 'Otoño', 3),
(24, 'Lagrima gris', 'Otoño', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `email`, `pass`) VALUES
(1, 'kohaku_kun@gmail.com', 'zeoQsYW0zXncI'),
(2, 'hideyoshi_soga@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$eUlJRE04NTFxQlVFQVhvRg$8vN4P00ve6GROVQhmgNTT/0XtEedwaI0lXgRK9tvEXU'),
(3, 'takeda_minamoto@gmail.com', '$2y$10$mxfNfse4dJLFDJX6xp1KDurGSGpmFHKzVoB.C3LfhhOLik9H/2crS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id_zona` int(11) NOT NULL,
  `zona` varchar(50) NOT NULL,
  `prefectura` varchar(45) NOT NULL,
  `ciudad_cercana` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id_zona`, `zona`, `prefectura`, `ciudad_cercana`) VALUES
(2, 'Bosque Sagano', 'Kioto', 'Nara'),
(3, 'Cascada Nachi', 'Wakayama', 'Higashimuro'),
(5, 'Monte Koya', 'Wakayama', 'Osaka'),
(6, 'Monte Tokachi', 'Hokkaido', 'Daisetsuzan'),
(7, 'Prado Kenrokuen', 'Ishikawa', 'Kanazawa'),
(11, 'Volcán Aogashime', 'Izu', 'Aogashima');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recurso`),
  ADD KEY `index` (`id_zona`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id_zona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id_zona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `recursos_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `zonas` (`id_zona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
