-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-06-2020 a las 06:30:05
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `la_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cervezas`
--

CREATE TABLE `cervezas` (
  `id_cerveza` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `alt_img` varchar(255) DEFAULT NULL,
  `precio` varchar(100) NOT NULL,
  `definicion` varchar(100) NOT NULL,
  `usuarios_id_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cervezas`
--

INSERT INTO `cervezas` (`id_cerveza`, `title`, `intro`, `text`, `img`, `alt_img`, `precio`, `definicion`, `usuarios_id_usuario`) VALUES
(1, 'Torpedo IPA', 'Cerveza IPA Torpedo', 'La Torpedo Extra IPA es una cerveza agresiva aunque equilibrada, intensos aromas de lúpulo a cítricos, pinos y fruta tropical.', 'ipa-160x160-0001.jpg', 'Cerveza Artesanal Patagonica', '130', 'IBU 23 | 34', 1),
(2, 'Pale APA', 'Cerveza Pale Ale', 'De cuerpo medio-liviano a medio. Carbonatación de moderada a alta. Acabado suave, sin astringencias, asociado a la alta tasa de lupulación.', 'rabieta-apa.jpg', 'Cerveza Artesanal Patagonica', '115', 'IBU 23 | 34', 1),
(3, 'Scottish', '\nCerveza Tennent’s', 'Cerveza Tennent’s Extra Strong Scottish Lager de Tennent\'s España. Una cerveza con carácter al más puro estilo Stout, de contraste dulce y amargo en boca, gran aroma y aspecto.', 'scottish.jpg', 'Cerveza Artesanal Patagonica', '120', 'IBU 23 | 34', 1),
(5, 'Blonde', 'Blonde', 'La Blonde Ale de Espiga, destaca por su aroma intenso, con notas cítricas, fruta tropical, melón y uva. En boca destaca la fruta, con un amargor final que compensa la dulzura.', 'blonde-ale-0001.jpg', 'Cerveza Artesanal botella', '110', 'IBU 23 | 34', 1),
(6, 'Stout', '\nCervezas Irish Stout', 'Tostado pronunciado, similar al café. El balance varia desde bastante uniforme a bastante amargo, la version más balanceada teniendo un poco de dulzor a malta y la version amargas siendo bastante secas.', 'stout.jpg', 'Cerveza Artesanal botella 235ml', '120', 'IBU 23 | 34', 1),
(7, 'India Pale', 'Cerveza Pale Ale', 'Es un estilo de cerveza de tradición inglesa que se caracteriza como una ale pálida y espumosa con un alto nivel de alcohol y de lúpulo.', 'india-pale.jpg', 'Cerveza Artesanal botella 235ml', '113', 'IBU 23 | 34', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cervezas_has_tags`
--

CREATE TABLE `cervezas_has_tags` (
  `cervezas_id_cerveza` int(10) UNSIGNED NOT NULL,
  `tags_id_tags` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cervezas_has_tags`
--

INSERT INTO `cervezas_has_tags` (`cervezas_id_cerveza`, `tags_id_tags`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 4),
(3, 5),
(5, 6),
(5, 7),
(6, 3),
(6, 8),
(7, 3),
(7, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_recuperar`
--

CREATE TABLE `password_recuperar` (
  `id_usario` int(10) UNSIGNED NOT NULL,
  `toker` varchar(100) NOT NULL,
  `fecha_expiracion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id_tags` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id_tags`, `nombre`) VALUES
(1, 'enero'),
(2, 'febrero'),
(3, 'marzo'),
(4, 'abril'),
(5, 'mayo'),
(6, 'pascuas'),
(7, 'dia del padre'),
(8, 'carnaval');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `password`, `nombre`, `apellido`) VALUES
(1, 'ser@ser.com.ar', '$2y$10$L8Uw37w/F1n.dheSc/9bI.jOUZRBYdg5JQxU.bSz.KG/FbIaAmWXS', 'sebastian', 'andres');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  ADD PRIMARY KEY (`id_cerveza`),
  ADD KEY `title_index` (`title`),
  ADD KEY `fk_cervezas_usuarios_idx` (`usuarios_id_usuario`);

--
-- Indices de la tabla `cervezas_has_tags`
--
ALTER TABLE `cervezas_has_tags`
  ADD PRIMARY KEY (`cervezas_id_cerveza`,`tags_id_tags`),
  ADD KEY `fk_cervezas_has_tags_tags1_idx` (`tags_id_tags`),
  ADD KEY `fk_cervezas_has_tags_cervezas1_idx` (`cervezas_id_cerveza`);

--
-- Indices de la tabla `password_recuperar`
--
ALTER TABLE `password_recuperar`
  ADD PRIMARY KEY (`id_usario`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tags`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  MODIFY `id_cerveza` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tags` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cervezas`
--
ALTER TABLE `cervezas`
  ADD CONSTRAINT `fk_cervezas_usuarios` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cervezas_has_tags`
--
ALTER TABLE `cervezas_has_tags`
  ADD CONSTRAINT `fk_cervezas_has_tags_cervezas1` FOREIGN KEY (`cervezas_id_cerveza`) REFERENCES `cervezas` (`id_cerveza`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cervezas_has_tags_tags1` FOREIGN KEY (`tags_id_tags`) REFERENCES `tags` (`id_tags`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `password_recuperar`
--
ALTER TABLE `password_recuperar`
  ADD CONSTRAINT `id_password_recuperar_usuario1` FOREIGN KEY (`id_usario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
