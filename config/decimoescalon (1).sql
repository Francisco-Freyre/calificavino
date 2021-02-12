-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2021 a las 19:57:37
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catas`
--

CREATE TABLE `catas` (
  `id` int(10) NOT NULL,
  `id_vino` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `aromatica`
--
ALTER TABLE `aromatica`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catas`
--
ALTER TABLE `catas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gustativo`
--
ALTER TABLE `gustativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vinos`
--
ALTER TABLE `vinos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `visual`
--
ALTER TABLE `visual`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
