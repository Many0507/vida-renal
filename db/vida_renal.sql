-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-12-2019 a las 23:03:57
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_actividades`
--

INSERT INTO `vr_actividades` (`id`, `titulo`, `texto`, `imagen`, `created_at`, `updated_at`) VALUES
(36, 'Actividad 1', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.', '4a0c9a3eb30df233.jpg', '2019-11-25 10:20:25', '2019-11-25 10:20:25'),
(37, 'Actividad 2', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.', '2ed4bf4e9680b686.jpg', '2019-11-25 10:20:54', '2019-11-25 10:20:54'),
(38, 'Actividad 3', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.', 'f61610e195bb1c31.jpg', '2019-11-25 10:21:17', '2019-11-25 10:21:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_admin`
--

DROP TABLE IF EXISTS `vr_admin`;
CREATE TABLE IF NOT EXISTS `vr_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Volcado de datos para la tabla `vr_admin`
--

INSERT INTO `vr_admin` (`id`, `user`, `pass`, `created_at`, `updated_at`) VALUES
(1, 'admin01', '$2y$10$rgz2VY3vg1YI9wq4guFjuuEml59yaJ5pOtqDH81CrU./xStOlLKdW', '2019-11-18 01:27:16', '2019-11-18 01:27:16');

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
  `autor` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(120) CHARACTER SET utf32 COLLATE utf32_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_blog`
--

INSERT INTO `vr_blog` (`id`, `titulo`, `texto`, `texto_corto`, `autor`, `imagen`, `created_at`, `updated_at`) VALUES
(1, '12 Tips para mejorar tu estilo de vida', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas tempora exercitationem quibusdam obcaecati accusantium excepturi laudantium dolorum velit quos autem. Voluptatum, ex perspiciatis iure corrupti tempore maxime itaque debitis provident.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas tempora exercitationem quibusdam obcaecati accusantium excepturi laudantium dolorum velit quos autem. Voluptatum.', 'Fundacion S&C', '/public/img/blog1.jpg', '2019-10-28 20:07:35', '2019-10-28 20:08:35'),
(2, 'Tu cuerpo, tu salud, tus riñones', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas tempora exercitationem quibusdam obcaecati accusantium excepturi laudantium dolorum velit quos autem. Voluptatum.', 'Fundacion S&C', '/public/img/blog2.jpg', '2019-10-28 20:07:35', '2019-10-28 20:08:35'),
(3, '¿Que actividades son buenas para mi salud?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam.', 'Fundacion S&C', '/public/img/blog3.jpg', '2019-10-28 20:07:35', '2019-10-28 20:08:35'),
(4, '¿La importancia de cuidarme si tengo ERC?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam.', 'Fundacion S&C', '/public/img/blog4.jpg', '2019-10-28 20:07:35', '2019-10-28 20:08:35'),
(7, '¿Como se si tengo ERC?', '<p><br data-cke-filler=\"true\"></p><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?</p><p><br data-cke-filler=\"true\"></p>', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?', 'Fundacion S&C', '/public/img/blog5.jpg', '2019-10-31 21:31:40', '2019-11-25 09:37:24');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_eventos`
--

INSERT INTO `vr_eventos` (`id`, `titulo`, `texto`, `imagen`, `created_at`, `updated_at`) VALUES
(8, 'Evento 1', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.', '5499728bb485d03a.jpg', '2019-11-25 10:22:08', '2019-12-03 04:05:15'),
(9, 'Evento 2', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.', '58b5b79073e4dcd5.jpg', '2019-11-25 10:22:40', '2019-11-25 10:22:40'),
(10, 'Evento 3', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.\r\n			', '6c1cededdbfa8c23.jpg', '2019-11-25 10:24:13', '2019-11-25 10:24:13');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_talleres`
--

INSERT INTO `vr_talleres` (`id`, `titulo`, `texto`, `imagen`, `created_at`, `updated_at`) VALUES
(7, 'Tanatologia', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.				\r\n			', 'bb858d8924b29ccc.jpg', '2019-11-25 10:25:11', '2019-11-25 10:25:11'),
(8, 'Inteligencia emocional', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.				\r\n			\r\n			', '13c2a2601e1d190d.jpg', '2019-11-25 10:25:42', '2019-11-25 10:25:42'),
(9, 'Resiliencia', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.\r\n			', 'b693f65b652cf491.jpg', '2019-11-25 10:26:14', '2019-11-25 10:26:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_testimonios`
--

DROP TABLE IF EXISTS `vr_testimonios`;
CREATE TABLE IF NOT EXISTS `vr_testimonios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `texto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_testimonios`
--

INSERT INTO `vr_testimonios` (`id`, `titulo`, `texto`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Paola', '18 años enferma. Mi experiencia ha sido dura ya que es muy triste tener la enfermedad.', 'b57d25634e0b338d.jpg', '2019-12-02 18:39:43', '2019-12-03 01:29:41'),
(3, 'Manuel', 'Descripción de testimonio', '93e7f18d9da71c36.jpg', '2019-12-03 03:48:02', '2019-12-03 03:48:02'),
(4, 'Maria', 'Descripción de testimonio', 'bf6c919d7f24863b.jpg', '2019-12-03 03:48:18', '2019-12-03 03:48:18'),
(5, 'Julia', 'Descripción de testimonio', '8122efadc62f7157.jpg', '2019-12-03 03:48:32', '2019-12-03 03:48:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_video_principal`
--

DROP TABLE IF EXISTS `vr_video_principal`;
CREATE TABLE IF NOT EXISTS `vr_video_principal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_video_principal`
--

INSERT INTO `vr_video_principal` (`id`, `video`, `created_at`, `updated_at`) VALUES
(1, '/public/uploads/b923c16f51abeeb8.mp4', '2019-12-01 23:46:37', '2019-12-02 23:13:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_video_testimonio`
--

DROP TABLE IF EXISTS `vr_video_testimonio`;
CREATE TABLE IF NOT EXISTS `vr_video_testimonio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_video_testimonio`
--

INSERT INTO `vr_video_testimonio` (`id`, `video`, `created_at`, `updated_at`) VALUES
(1, '/public/uploads/0332300f00a2e366.mp4', '2019-12-02 17:07:36', '2019-12-03 03:49:12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
