-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2020 a las 19:04:09
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jaula112`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directos`
--

CREATE TABLE `directos` (
  `id` varchar(32) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `directos`
--

INSERT INTO `directos` (`id`, `usuario`, `titulo`, `fecha`) VALUES
('39da6189a175123b8492ab515de9452e', 'Angel', '', '2020-02-06 17:40:38'),
('da8e9cb81844ad1cfc79fdaada17398c', 'victor', 'Mi primer video', '2020-02-06 17:43:22'),
('624635529afdb73c2e850c10e023850c', 'victor2', 'El bromas', '2020-02-06 18:39:50'),
('ffd583960652065805eb71d8b92d5841', '', '', '2020-02-06 19:36:44'),
('ffd583960652065805eb71d8b92d5841', '', '', '2020-02-06 19:39:27'),
('ffd583960652065805eb71d8b92d5841', '', '', '2020-02-06 19:40:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `ruta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `pass`, `ruta`) VALUES
('', '7d5470832a56d63f9f98393e1a1bdc3d76dd1ed3', ''),
('victor', '0325a3153a4e4aacee4ebec9c060965426af74ce', 'victor'),
('victor2', '0325a3153a4e4aacee4ebec9c060965426af74ce', 'victor2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id`, `titulo`, `usuario`, `fecha`, `nombre`) VALUES
(2, 'Mi primer video', 'victor', '2020-02-06 19:16:49', 'Mi primer video.mp4'),
(4, 'zsdfsdg', 'victor2', '2020-02-06 19:18:59', 'zsdfsdg.mp4'),
(5, 'dsada', 'victor', '2020-02-12 16:17:26', 'dfd0b94c21934a5e27b25149b8599554.mp4'),
(6, 'fdsfdsf', 'victor', '2020-02-12 16:33:39', '3552658ec3f26680afc36a344a550e47.mp4');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
