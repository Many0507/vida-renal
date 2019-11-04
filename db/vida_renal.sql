-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2019 a las 04:49:22
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
  `imagen` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_actividades`
--

INSERT INTO `vr_actividades` (`id`, `titulo`, `texto`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Actividad 1', 'Texto de actividad', '585ba1da96bc3103.jpg', '2019-11-04 08:20:35', '2019-11-04 08:20:35'),
(2, 'Actividad 2', 'Texto de actividad', '2d72e1e5a7fcf84e.jpg', '2019-11-04 08:21:00', '2019-11-04 08:21:00'),
(3, 'Actividad 3', 'Texto de actividad', 'a6d47834b9bdfbc7.jpg', '2019-11-04 08:21:20', '2019-11-04 08:21:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_blog`
--

CREATE TABLE `vr_blog` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `texto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `texto_corto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `autor` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(120) CHARACTER SET utf32 COLLATE utf32_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_blog`
--

INSERT INTO `vr_blog` (`id`, `titulo`, `texto`, `texto_corto`, `autor`, `imagen`, `created_at`, `updated_at`) VALUES
(1, '12 Tips para mejorar tu estilo de vida', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas tempora exercitationem quibusdam obcaecati accusantium excepturi laudantium dolorum velit quos autem. Voluptatum, ex perspiciatis iure corrupti tempore maxime itaque debitis provident.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas tempora exercitationem quibusdam obcaecati accusantium excepturi laudantium dolorum velit quos autem. Voluptatum.', 'Fundacion S&C', '/public/img/blog1.jpg', '2019-10-28 20:07:35', '2019-10-28 20:08:35'),
(2, 'Tu cuerpo, tu salud, tus riñones', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas tempora exercitationem quibusdam obcaecati accusantium excepturi laudantium dolorum velit quos autem. Voluptatum.', 'Fundacion S&C', '/public/img/blog2.jpg', '2019-10-28 20:07:35', '2019-10-28 20:08:35'),
(3, '¿Que actividades son buenas para mi salud?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam.', 'Fundacion S&C', '/public/img/blog3.jpg', '2019-10-28 20:07:35', '2019-10-28 20:08:35'),
(4, '¿La importancia de cuidarme si tengo ERC?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam.', 'Fundacion S&C', '/public/img/blog4.jpg', '2019-10-28 20:07:35', '2019-10-28 20:08:35'),
(7, '¿Como se si tengo ERC?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam.', 'Fundacion S&C', '/public/img/blog5.jpg', '2019-10-31 21:31:40', '2019-10-31 21:31:40');

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
(1, 'evento 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?', '/public/img/evento1.jpg'),
(2, 'evento 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?', '/public/img/evento2.jpg'),
(3, 'evento 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?', '/public/img/evento3.jpg');

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
(1, 'Resiliencia', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?', '/public/img/taller1.jpg'),
(2, 'Inteligencia emocional', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?', '/public/img/taller2.jpg'),
(3, 'Tanatoloía', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?', '/public/img/taller3.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vr_actividades`
--
ALTER TABLE `vr_actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vr_blog`
--
ALTER TABLE `vr_blog`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `vr_blog`
--
ALTER TABLE `vr_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
