-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-10-2021 a las 22:27:46
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

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
(36, 'Actividad 1', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.', '4a0c9a3eb30df233.jpg', '2019-11-25 10:20:25', '2019-12-03 22:52:47'),
(37, 'Actividad 2', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.', '4faaf61340e7ba5a.jpg', '2019-11-25 10:20:54', '2019-12-03 22:52:28'),
(38, 'Actividad 3', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.', '5f3f3752f17486b3.jpg', '2019-11-25 10:21:17', '2019-12-03 22:52:23');

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
-- Estructura de tabla para la tabla `vr_aliados`
--

DROP TABLE IF EXISTS `vr_aliados`;
CREATE TABLE IF NOT EXISTS `vr_aliados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_blog`
--

INSERT INTO `vr_blog` (`id`, `titulo`, `texto`, `texto_corto`, `autor`, `imagen`, `created_at`, `updated_at`) VALUES
(11, '12 Tips para mejorar tu estilo de vida', '<h3><strong>El pasaje estándar Lorem Ipsum, usado desde el año 1500.</strong></h3><p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><p><br data-cke-filler=\"true\"></p><h3><strong>Sección 1.10.32 de \"de Finibus Bonorum et Malorum\", escrito por Cicero en el 45 antes de Cristo</strong></h3><p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>', 'El pasaje estándar Lorem Ipsum, usado desde el año 1500.\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute', 'Fundacion S&C', '7b1340303910cf42.jpg', '2019-12-05 03:12:12', '2019-12-05 03:25:49'),
(12, 'Tu cuerpo, tu salud, tus riñones', '<p><br data-cke-filler=\"true\"></p><h3><strong>El pasaje estándar Lorem Ipsum, usado desde el año 1500.</strong></h3><p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><h3><strong>Sección 1.10.32 de \"de Finibus Bonorum et Malorum\", escrito por Cicero en el 45 antes de Cristo</strong></h3><p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p><p><br data-cke-filler=\"true\"></p>', 'El pasaje estándar Lorem Ipsum, usado desde el año 1500.\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute', 'Fundacion S&C', 'a937675d61b1f530.jpg', '2019-12-05 03:12:26', '2019-12-09 21:37:58'),
(13, '¿Que actividades son buenas para mi salud?', '<h3><strong>El pasaje estándar Lorem Ipsum, usado desde el año 1500.</strong></h3><p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><p><br data-cke-filler=\"true\"></p><h3><strong>Sección 1.10.32 de \"de Finibus Bonorum et Malorum\", escrito por Cicero en el 45 antes de Cristo</strong></h3><p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p>', 'El pasaje estándar Lorem Ipsum, usado desde el año 1500.\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute', 'Fundacion S&C', 'f2ae6bfd0ce86858.jpg', '2019-12-05 03:12:47', '2019-12-05 03:25:16'),
(14, '¿La importancia de cuidarme si tengo ERC?', '<p><br data-cke-filler=\"true\"></p><h3><strong>El pasaje estándar Lorem Ipsum, usado desde el año 1500.</strong></h3><p>\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><h3><strong>Sección 1.10.32 de \"de Finibus Bonorum et Malorum\", escrito por Cicero en el 45 antes de Cristo</strong></h3><p>\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p><p><br data-cke-filler=\"true\"></p>', 'El pasaje estándar Lorem Ipsum, usado desde el año 1500.\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute', 'Fundacion S&C', 'd90713073befe097.jpg', '2019-12-05 03:13:09', '2019-12-12 02:52:38'),
(15, '¿Como se si tengo ERC?', '<p><strong>texto de prueba de blog</strong></p>', 'texto de prueba de blog', 'Fundacion S&C', '2bdde1ddc6479fe2.jpg', '2019-12-05 03:13:22', '2019-12-09 20:47:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_conferencias`
--

DROP TABLE IF EXISTS `vr_conferencias`;
CREATE TABLE IF NOT EXISTS `vr_conferencias` (
  `id_conferencia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  `costo` double DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_conferencia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_egresos`
--

DROP TABLE IF EXISTS `vr_egresos`;
CREATE TABLE IF NOT EXISTS `vr_egresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  `tipo_consulta` varchar(120) DEFAULT NULL,
  `consulta_costo` double DEFAULT NULL,
  `taller` varchar(120) DEFAULT NULL,
  `costo_taller` double DEFAULT NULL,
  `insumos` varchar(120) DEFAULT NULL,
  `costo_insumos` double DEFAULT NULL,
  `medicamentos` varchar(120) DEFAULT NULL,
  `costo_medicamentos` double DEFAULT NULL,
  `laboratorios` varchar(120) DEFAULT NULL,
  `costo_laboratorios` double DEFAULT NULL,
  `conferencias` varchar(120) DEFAULT NULL,
  `costo_conferencias` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vr_egresos`
--

INSERT INTO `vr_egresos` (`id`, `nombre`, `tipo_consulta`, `consulta_costo`, `taller`, `costo_taller`, `insumos`, `costo_insumos`, `medicamentos`, `costo_medicamentos`, `laboratorios`, `costo_laboratorios`, `conferencias`, `costo_conferencias`, `created_at`, `updated_at`) VALUES
(1, 'Manuel Lizama', 'TIPO A', 800, 'Inteligencia emocional', 1200, NULL, NULL, NULL, NULL, 'Laboratorio A', 300, NULL, NULL, '2021-10-26 22:11:34', '2021-10-26 22:11:34');

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
-- Estructura de tabla para la tabla `vr_ingresos`
--

DROP TABLE IF EXISTS `vr_ingresos`;
CREATE TABLE IF NOT EXISTS `vr_ingresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  `tipo_donador` varchar(120) NOT NULL,
  `cantidad` double DEFAULT '0',
  `especie` text,
  `especie_cantidad` double DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vr_ingresos`
--

INSERT INTO `vr_ingresos` (`id`, `nombre`, `tipo_donador`, `cantidad`, `especie`, `especie_cantidad`, `created_at`, `updated_at`) VALUES
(1, 'manuel alejandro', '1', 200, NULL, 0, '2020-10-15 19:45:03', '2021-10-15 19:45:03'),
(2, 'Manuel', '4', 0, 'tipo 2', 234, '2021-10-15 19:53:19', '2021-10-15 19:53:19'),
(3, 'Manuel', '1', 200, NULL, 0, '2021-10-15 19:53:39', '2021-10-15 19:53:39'),
(4, 'Manuel', '4', 0, 'tipo 2', 234, '2021-10-15 19:53:56', '2021-10-15 19:53:56'),
(5, 'Manuel', '4', 0, 'tipo 2', 234, '2021-10-15 19:54:10', '2021-10-15 19:54:10'),
(6, 'Manuel', '2', 123, NULL, 0, '2021-10-15 19:55:43', '2021-10-15 19:55:43'),
(7, 'PRUEBA', '3', 1200, NULL, 0, '2021-10-20 17:04:35', '2021-10-20 17:04:35'),
(8, 'manuel alejandro2', '2', 20, NULL, 0, '2021-10-26 15:49:13', '2021-10-26 15:49:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_insumos`
--

DROP TABLE IF EXISTS `vr_insumos`;
CREATE TABLE IF NOT EXISTS `vr_insumos` (
  `id_insumo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  `costo` double DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_insumo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_laboratorios`
--

DROP TABLE IF EXISTS `vr_laboratorios`;
CREATE TABLE IF NOT EXISTS `vr_laboratorios` (
  `id_laboratorio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  `costo` double DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_laboratorio`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vr_laboratorios`
--

INSERT INTO `vr_laboratorios` (`id_laboratorio`, `nombre`, `costo`, `created_at`, `updated_at`) VALUES
(1, 'Laboratorio A', 0, '2021-10-26 15:44:48', '2021-10-26 15:44:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_medicamentos`
--

DROP TABLE IF EXISTS `vr_medicamentos`;
CREATE TABLE IF NOT EXISTS `vr_medicamentos` (
  `id_medicamentos` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `costo` int(11) DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_servicios`
--

DROP TABLE IF EXISTS `vr_servicios`;
CREATE TABLE IF NOT EXISTS `vr_servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_servicios`
--

INSERT INTO `vr_servicios` (`id`, `titulo`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Atención Médica', '5cb98ec5a8515cbf.jpg', '2019-12-03 15:33:06', '2019-12-03 23:19:03'),
(2, 'Medicamentos', 'a0beb339d2d91bbd.jpg', '2019-12-03 15:41:47', '2019-12-03 23:18:54'),
(3, 'Ayuda psicologica', '00bdb25ad76e6380.jpg', '2019-12-03 15:41:47', '2019-12-03 23:18:40'),
(4, 'Ayuda nutricional', '742cf70fb362f41b.jpg', '2019-12-03 15:42:15', '2019-12-03 23:18:33'),
(5, 'Estudios de laboratorio', '2cbc1733dab2d104.jpg', '2019-12-03 15:42:15', '2019-12-03 23:18:27');

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
(9, 'DUELO Y TANATOLOGÍA.', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.\r\n			', 'b693f65b652cf491.jpg', '2019-11-25 10:26:14', '2019-11-25 10:26:14');

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
-- Estructura de tabla para la tabla `vr_tipo_consulta`
--

DROP TABLE IF EXISTS `vr_tipo_consulta`;
CREATE TABLE IF NOT EXISTS `vr_tipo_consulta` (
  `id_tipo_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  `costo` double DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_tipo_consulta`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vr_tipo_consulta`
--

INSERT INTO `vr_tipo_consulta` (`id_tipo_consulta`, `nombre`, `costo`, `created_at`, `updated_at`) VALUES
(1, 'TIPO A', 200, '2021-10-26 15:37:17', '2021-10-26 15:37:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_tipo_donador`
--

DROP TABLE IF EXISTS `vr_tipo_donador`;
CREATE TABLE IF NOT EXISTS `vr_tipo_donador` (
  `id_tipo_donador` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(120) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tipo_donador`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vr_tipo_donador`
--

INSERT INTO `vr_tipo_donador` (`id_tipo_donador`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'Donador Persona Física', '2021-09-13 04:08:17', '2021-09-13 04:08:17'),
(2, 'Donador Empresas', '2021-10-04 01:18:08', '2021-10-04 01:18:08'),
(3, 'Donador Anónimo', '2021-10-04 01:18:30', '2021-10-04 01:18:30'),
(4, 'Donador en Especie', '2021-10-04 01:18:30', '2021-10-04 01:18:30');

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
(1, '/public/uploads/949f3d25380e89e1.mp4', '2019-12-01 23:46:37', '2021-08-31 03:50:42');

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
