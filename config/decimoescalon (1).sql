-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2021 a las 20:16:17
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `decimoescalon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apreciacion_personal`
--

CREATE TABLE `apreciacion_personal` (
  `id` int(10) NOT NULL,
  `id_cata` int(10) NOT NULL,
  `comentario` text NOT NULL,
  `meridaje` text NOT NULL,
  `calificacion` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `apreciacion_personal`
--

INSERT INTO `apreciacion_personal` (`id`, `id_cata`, `comentario`, `meridaje`, `calificacion`) VALUES
(22, 16, 'Muy buen vino', 'Corte new york', '3.00'),
(23, 17, 'Excelente vino', 'Cualquier corte de carne', '4.00'),
(24, 18, 'No hay', 'carne rica', '0.20'),
(25, 19, 'Buena persona', 'no lo se', '4.00'),
(26, 19, 'Buena persona', 'no lo se', '4.00'),
(27, 20, 'Esta muy guapa', 'Desnuda', '4.00'),
(28, 21, 'adsfa', 'adsfadsf', '3.70'),
(29, 22, 'Soy un hombre muy guapo, que se considera muy buena persona', 'Una buena mujer siempre se puede comer desnunda, o tambien en tanguita, baby doll,', '4.00'),
(30, 23, 'Muy buen vino, muy suave y calido', 'Se puede acompañar con un buen corte de carne', '2.00'),
(31, 24, 'cccccccccccccccc', 'ddddddddddddddddddd', '2.00'),
(32, 25, 'el retrogusto sigue mal', 'algo buenote', '2.00'),
(33, 30, 'La verdad para mi no es un buen vino', 'Hasta con un lonche, se puede usar de refresco de lo malo que es', '1.00'),
(34, 31, 'ta bien gacho', 'tripas', '3.40'),
(35, 32, 'a', 'a', '2.00'),
(36, 33, 'a', 'a', '2.00'),
(37, 34, 'asd', 'asd', '2.00'),
(38, 35, 'a', 'a', '2.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aromatica`
--

CREATE TABLE `aromatica` (
  `id` int(10) NOT NULL,
  `id_cata` int(10) NOT NULL,
  `intensidad` varchar(100) NOT NULL,
  `complejidad` varchar(100) NOT NULL,
  `aromas` text NOT NULL,
  `calificacion` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aromatica`
--

INSERT INTO `aromatica` (`id`, `id_cata`, `intensidad`, `complejidad`, `aromas`, `calificacion`) VALUES
(27, 16, 'media-alta', 'media', 'Madera', '1.50'),
(28, 17, 'media-alta', 'media-alta', 'aromas fuertes', '2.00'),
(29, 18, 'alta', 'media', 'Madera', '1.50'),
(30, 19, 'baja', 'media-alta', 'Mesa', '1.60'),
(31, 19, 'baja', 'media-alta', 'Mesa', '1.60'),
(32, 20, 'media-alta', 'media-alta', 'Pez', '2.00'),
(33, 21, 'media-alta', 'media-alta', 'adaf', '1.60'),
(34, 22, 'media-alta', 'media-alta', 'Alcohol, notas, laptop, bubis, vaginas, nalgas, que ricas viejas me encantan bien machin, me gustan mucho la vdd', '2.00'),
(35, 23, 'media-alta', 'media-alta', 'Mango, fresa, madera', '1.00'),
(36, 24, 'media-alta', 'media-alta', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '1.00'),
(37, 25, 'media-alta', 'media-alta', 'pepe, pepe, pepe,', '1.00'),
(38, 30, 'baja', 'baja', 'madera, mango', '0.50'),
(39, 31, 'media-alta', 'media-alta', 'madera', '1.00'),
(40, 32, 'media-alta', 'media-alta', 'a', '1.00'),
(41, 33, 'media-alta', 'media-alta', 'a', '1.00'),
(42, 34, 'media-alta', 'media-alta', 'a', '1.00'),
(43, 35, 'media-alta', 'media-alta', 's', '1.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catas`
--

CREATE TABLE `catas` (
  `id` int(10) NOT NULL,
  `id_vino` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `calificacion` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catas`
--

INSERT INTO `catas` (`id`, `id_vino`, `id_user`, `calificacion`) VALUES
(18, 31, 37, '5.00'),
(21, 34, 38, '5.00'),
(32, 46, 36, '5.00'),
(33, 47, 36, '5.00'),
(34, 48, 36, '5.00'),
(35, 49, 36, '5.00'),
(36, 50, 36, '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gustativo`
--

CREATE TABLE `gustativo` (
  `id` int(11) NOT NULL,
  `id_cata` int(11) NOT NULL,
  `dulce` varchar(100) NOT NULL,
  `acidez` varchar(100) NOT NULL,
  `tanino` varchar(100) NOT NULL,
  `alcohol` varchar(100) NOT NULL,
  `cuerpo` varchar(100) NOT NULL,
  `permanencia` varchar(100) NOT NULL,
  `retrogusto` text NOT NULL,
  `calificacion` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gustativo`
--

INSERT INTO `gustativo` (`id`, `id_cata`, `dulce`, `acidez`, `tanino`, `alcohol`, `cuerpo`, `permanencia`, `retrogusto`, `calificacion`) VALUES
(23, 16, 'semiseco', 'media', 'bajo', 'bajo', 'media', 'media', 'Frutos rojos', '2.10'),
(24, 17, 'semidulce', 'media-alta', 'medio', 'medio', 'media-alta', 'media-alta', 'gustos muy fuertes', '3.00'),
(25, 18, 'semiseco', 'media-alta', 'bajo', 'medio', 'media', 'media-alta', 'Frutillas verdes', '0.30'),
(26, 19, 'semidulce', 'media-alta', 'medio', 'medio', 'media-alta', 'media', 'mango', '2.60'),
(27, 19, 'semidulce', 'media-alta', 'medio', 'medio', 'media-alta', 'media', 'mango', '2.60'),
(28, 20, 'semidulce', 'media-alta', 'medio', 'medio', 'media-alta', 'media-alta', 'Pez', '3.00'),
(29, 21, 'semidulce', 'media-alta', 'medio', 'medio', 'media-alta', 'media-alta', 'afadsfa', '2.70'),
(30, 22, 'muy dulce', 'media-alta', 'medio-alto', 'medio', 'media-alta', 'media-alta', 'Todos los sabores de las mujeres me encatan esta mas que deliciosas', '3.00'),
(31, 23, 'semidulce', 'media-alta', 'medio', 'medio', 'media-alta', 'media-alta', 'mango, fresa, madera', '1.50'),
(32, 24, 'semidulce', 'media-alta', 'medio', 'medio', 'media-alta', 'media-alta', 'bbbbbbbbbbbbbbbbbbbbb', '1.50'),
(33, 25, 'semidulce', 'media-alta', 'medio', 'medio', 'media-alta', 'media-alta', 'mango, fresa, madera', '1.50'),
(34, 30, 'semiseco', 'baja', 'bajo', 'alto', 'media', 'media', 'Mango, frutos verdes', '0.70'),
(35, 31, 'semidulce', 'media-alta', 'medio', 'medio', 'media-alta', 'media-alta', 'mango', '1.50'),
(36, 32, 'semidulce', 'media-alta', 'medio', 'medio', 'media-alta', 'media-alta', 'a', '1.50'),
(37, 33, 'semidulce', 'media-alta', 'medio', 'medio', 'media-alta', 'media-alta', 'a', '1.50'),
(38, 34, 'semidulce', 'media-alta', 'medio', 'medio', 'media-alta', 'media-alta', 'a', '1.50'),
(39, 35, 'semidulce', 'media-alta', 'medio', 'medio', 'media-alta', 'media-alta', 'a', '1.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinos`
--

CREATE TABLE `vinos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `uva` text NOT NULL,
  `productor` varchar(100) NOT NULL,
  `cosecha` varchar(15) NOT NULL,
  `alcohol` decimal(10,2) NOT NULL,
  `url_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vinos`
--

INSERT INTO `vinos` (`id`, `nombre`, `region`, `pais`, `uva`, `productor`, `cosecha`, `alcohol`, `url_img`) VALUES
(31, 'Prueba', 'Otro', 'Con', 'Usuario', 'Diferente', '2020', '13.50', 'uploads/images/2.jpg'),
(34, 'aaa', 'VALLE DE UCO', 'ESTADOS UNIDOS', 'RIESLING', 'aa', '2020', '9.99', 'uploads/images/2.jpg'),
(43, 'oooooo', 'Mexiquillo', 'mexico', 'Una rara', 'Bithives', '2019', '100.00', 'uploads/images/3.jpg'),
(46, 'aaaa', 'ZACATECAS', 'MEXICO', 'MERLOT', 'Nadie', '2020', '18.00', 'uploads/images/CCMERLOTGE.jpg'),
(47, 'Prueba dimension', 'ZACATECAS', 'MEXICO', 'MERLOT', 'Durango', '2020', '13.00', 'uploads/images/8.jpg'),
(48, 'otra prueba', 'VALLE DE UCO', 'ARGENTINA', 'CHARDONNAY', 'no se', '2020', '10.00', 'uploads/images/2.jpg'),
(49, 'otra nueva prueba', 'ZACATECAS', 'MEXICO', 'CARMENERE', 'save', '2020', '13.00', 'uploads/images/10.jpg'),
(50, 'Pruebilla', 'RIVERLAND', 'ALEMANIA', 'MERLOT', 'lucas', '2020', '15.00', 'uploads/images/9.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visual`
--

CREATE TABLE `visual` (
  `id` int(10) NOT NULL,
  `id_cata` int(10) NOT NULL,
  `capa` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `brillo` varchar(100) NOT NULL,
  `viscosidad` varchar(100) NOT NULL,
  `calificacion` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visual`
--

INSERT INTO `visual` (`id`, `id_cata`, `capa`, `color`, `brillo`, `viscosidad`, `calificacion`) VALUES
(28, 16, 'media', 'Violaceo', 'muy brilla', 'muy concis', '0.70'),
(29, 17, 'media-alta', 'Violaceo', 'brillante', 'muy concistente', '1.00'),
(30, 18, 'escaso', 'Amarillo p', '0', 'muy concis', '0.10'),
(31, 19, 'media', 'Perlado fino', 'brillante', 'fluido', '0.90'),
(32, 19, 'media', 'Perlado fino', 'brillante', 'fluido', '0.90'),
(33, 20, 'media', 'Dorado', 'brillante', 'concistent', '0.90'),
(34, 21, 'media', 'Grosella', 'brillante', 'concistent', '0.70'),
(35, 22, 'media-alta', 'Granate', 'muy brillante', 'muy concistente', '1.00'),
(36, 23, 'media-alta', 'Frambuesa', 'brillante', 'concistente', '0.50'),
(37, 24, 'media-alta', 'Amarillo verdozo', 'brillante', 'concistente', '0.50'),
(38, 25, 'media-alta', 'Grosella', 'brillante', 'concistente', '0.50'),
(39, 30, 'baja', 'Amarillointenso', 'escaso', 'fluido', '0.80'),
(40, 31, 'media', 'Frambuesa', 'brillante', 'concistente', '0.50'),
(41, 32, 'media-alta', 'Rosario lineal', 'brillante', 'concistente', '0.50'),
(42, 33, 'media-alta', 'Rosario ondulado', 'brillante', 'concistente', '0.50'),
(43, 34, 'media-alta', 'Amarillo verdozo', 'brillante', 'concistente', '0.50'),
(44, 35, 'media-alta', 'Rosario lineal', 'brillante', 'concistente', '0.50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apreciacion_personal`
--
ALTER TABLE `apreciacion_personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aromatica`
--
ALTER TABLE `aromatica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catas`
--
ALTER TABLE `catas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gustativo`
--
ALTER TABLE `gustativo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vinos`
--
ALTER TABLE `vinos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visual`
--
ALTER TABLE `visual`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apreciacion_personal`
--
ALTER TABLE `apreciacion_personal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `aromatica`
--
ALTER TABLE `aromatica`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `catas`
--
ALTER TABLE `catas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `gustativo`
--
ALTER TABLE `gustativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `vinos`
--
ALTER TABLE `vinos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `visual`
--
ALTER TABLE `visual`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
