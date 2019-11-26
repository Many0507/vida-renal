-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2019 a las 06:21:45
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
(36, 'Actividad 1', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.', '4a0c9a3eb30df233.jpg', '2019-11-25 10:20:25', '2019-11-25 10:20:25'),
(37, 'Actividad 2', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.', '2ed4bf4e9680b686.jpg', '2019-11-25 10:20:54', '2019-11-25 10:20:54'),
(38, 'Actividad 3', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.', 'f61610e195bb1c31.jpg', '2019-11-25 10:21:17', '2019-11-25 10:21:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_admin`
--

CREATE TABLE `vr_admin` (
  `id` int(11) NOT NULL,
  `user` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Volcado de datos para la tabla `vr_admin`
--

INSERT INTO `vr_admin` (`id`, `user`, `pass`, `created_at`, `updated_at`) VALUES
(1, 'admin01', '$2y$10$rgz2VY3vg1YI9wq4guFjuuEml59yaJ5pOtqDH81CrU./xStOlLKdW', '2019-11-18 01:27:16', '2019-11-18 01:27:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_blog`
--

CREATE TABLE `vr_blog` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `texto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `texto_corto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `autor` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
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
(7, '¿Como se si tengo ERC?', '<p><br data-cke-filler=\"true\"></p><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?</p><p><br data-cke-filler=\"true\"></p>', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Temporibus autem, id animi, veniam exercitationem quaerat debitis expedita necessitatibus explicabo deserunt rem, dicta laboriosam. Temporibus tenetur deserunt laborum, saepe earum aspernatur?', 'Fundacion S&C', '/public/img/blog5.jpg', '2019-10-31 21:31:40', '2019-11-25 09:37:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_eventos`
--

CREATE TABLE `vr_eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `texto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_eventos`
--

INSERT INTO `vr_eventos` (`id`, `titulo`, `texto`, `imagen`, `created_at`, `updated_at`) VALUES
(8, 'Evento 1', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.', '1f865a8605ea5bc5.jpg', '2019-11-25 10:22:08', '2019-11-25 10:22:08'),
(9, 'Evento 2', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.', '58b5b79073e4dcd5.jpg', '2019-11-25 10:22:40', '2019-11-25 10:22:40'),
(10, 'Evento 3', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.\r\n			', '6c1cededdbfa8c23.jpg', '2019-11-25 10:24:13', '2019-11-25 10:24:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vr_talleres`
--

CREATE TABLE `vr_talleres` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `texto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vr_talleres`
--

INSERT INTO `vr_talleres` (`id`, `titulo`, `texto`, `imagen`, `created_at`, `updated_at`) VALUES
(7, 'Tanatologia', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.				\r\n			', 'bb858d8924b29ccc.jpg', '2019-11-25 10:25:11', '2019-11-25 10:25:11'),
(8, 'Inteligencia emocional', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.				\r\n			\r\n			', '13c2a2601e1d190d.jpg', '2019-11-25 10:25:42', '2019-11-25 10:25:42'),
(9, 'Resiliencia', 'lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus, aliquid eligendi modi dolorem sapiente explicabo quo officia numquam distinctio. Sunt dicta qui rem voluptatum veritatis autem adipisci exercitationem inventore atque.\r\n			', 'b693f65b652cf491.jpg', '2019-11-25 10:26:14', '2019-11-25 10:26:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vr_actividades`
--
ALTER TABLE `vr_actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vr_admin`
--
ALTER TABLE `vr_admin`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `vr_admin`
--
ALTER TABLE `vr_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vr_blog`
--
ALTER TABLE `vr_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `vr_eventos`
--
ALTER TABLE `vr_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `vr_talleres`
--
ALTER TABLE `vr_talleres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
