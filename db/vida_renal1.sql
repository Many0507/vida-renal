-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-10-2019 a las 23:56:20
-- Versión del servidor: 5.7.26
-- Versión de PHP: 5.6.40

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

DROP TABLE IF EXISTS `vr_actividades`;
CREATE TABLE IF NOT EXISTS `vr_actividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `texto` text CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `imagen` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_actividades`
--

INSERT INTO `vr_actividades` (`id`, `titulo`, `texto`, `imagen`) VALUES
(1, 'Actividad 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?é', '/public/img/actividad1.jpg'),
(2, 'actividad 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?', '/public/img/actividad2.jpg'),
(3, 'actividad 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?', '/public/img/actividad3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_blog`
--

DROP TABLE IF EXISTS `vr_blog`;
CREATE TABLE IF NOT EXISTS `vr_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `texto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `texto_corto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `imagen` varchar(120) CHARACTER SET utf32 COLLATE utf32_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_blog`
--

INSERT INTO `vr_blog` (`id`, `titulo`, `texto`, `texto_corto`, `imagen`, `created_at`, `updated_at`) VALUES
(1, '12 Tips para mejorar tu estilo de vida', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas tempora exercitationem quibusdam obcaecati accusantium excepturi laudantium dolorum velit quos autem. Voluptatum, ex perspiciatis iure corrupti tempore maxime itaque debitis provident.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas tempora exercitationem quibusdam obcaecati accusantium excepturi laudantium dolorum velit quos autem. Voluptatum.', '/public/img/blog1.jpg', '2019-10-28 20:07:35', '2019-10-28 20:08:35'),
(2, 'Tu cuerpo, tu salud, tus riñones', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas tempora exercitationem quibusdam obcaecati accusantium excepturi laudantium dolorum velit quos autem. Voluptatum.', '/public/img/blog2.jpg', '2019-10-28 20:07:35', '2019-10-28 20:08:35'),
(3, '¿Que actividades son buenas para mi salud?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam.', '/public/img/blog3.jpg', '2019-10-28 20:07:35', '2019-10-28 20:08:35'),
(4, '¿La importancia de cuidarme si tengo ERC?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam.', '/public/img/blog4.jpg', '2019-10-28 20:07:35', '2019-10-28 20:08:35'),
(7, '¿Como se si tengo ERC?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam.', '/public/img/blog5.jpg', '2019-10-31 21:31:40', '2019-10-31 21:31:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_eventos`
--

DROP TABLE IF EXISTS `vr_eventos`;
CREATE TABLE IF NOT EXISTS `vr_eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `texto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

DROP TABLE IF EXISTS `vr_talleres`;
CREATE TABLE IF NOT EXISTS `vr_talleres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `texto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_talleres`
--

INSERT INTO `vr_talleres` (`id`, `titulo`, `texto`, `imagen`) VALUES
(1, 'Resiliencia', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?', '/public/img/taller1.jpg'),
(2, 'Inteligencia emocional', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?', '/public/img/taller2.jpg'),
(3, 'Tanatoloía', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque dolore inventore nulla blanditiis veritatis. Explicabo fugiat modi accusamus facilis. Animi dolor quo asperiores, voluptatum similique eius amet hic quibusdam ab?', '/public/img/taller3.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
