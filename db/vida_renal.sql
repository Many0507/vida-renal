-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2019 a las 06:01:32
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vida_renal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_actividades`
--

CREATE TABLE `vr_actividades` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `texto` text CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `imagen` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_actividades`
--

INSERT INTO `vr_actividades` (`id`, `titulo`, `texto`, `imagen`) VALUES
(1, 'Actividad 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?é', '/public/icons/img.jpg'),
(2, 'actividad 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?', '/public/icons/img.jpg'),
(3, 'actividad 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?', '/public/icons/img.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_eventos`
--

CREATE TABLE `vr_eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `texto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_eventos`
--

INSERT INTO `vr_eventos` (`id`, `titulo`, `texto`, `imagen`) VALUES
(1, 'evento 1', 'texto del evento', '/public/icons/img.jpg'),
(2, 'evento 2', 'texto del evento', '/public/icons/img.jpg'),
(3, 'evento 3', 'texto del evento', '/public/icons/img.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_talleres`
--

CREATE TABLE `vr_talleres` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `texto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_talleres`
--

INSERT INTO `vr_talleres` (`id`, `titulo`, `texto`, `imagen`) VALUES
(1, 'Taller 1', 'Texto del taller', '/public/icons/img.jpg'),
(2, 'Taller 2', 'Texto del taller', '/public/icons/img.jpg'),
(3, 'Taller 3', 'Texto del taller', '/public/icons/img.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vr_actividades`
--
ALTER TABLE `vr_actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vr_eventos`
--
ALTER TABLE `vr_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vr_talleres`
--
ALTER TABLE `vr_talleres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vr_actividades`
--
ALTER TABLE `vr_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vr_eventos`
--
ALTER TABLE `vr_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vr_talleres`
--
ALTER TABLE `vr_talleres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
