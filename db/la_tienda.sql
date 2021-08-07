-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2021 a las 20:12:54
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

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
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id_carrito` int(10) UNSIGNED NOT NULL,
  `cervezas_id_cerveza` int(10) UNSIGNED NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cervezas`
--

CREATE TABLE `cervezas` (
  `id_cerveza` int(10) UNSIGNED NOT NULL,
  `usuarios_id_usuario` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `intro` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `alt_img` varchar(255) DEFAULT NULL,
  `precio` varchar(100) NOT NULL,
  `definicion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cervezas`
--

INSERT INTO `cervezas` (`id_cerveza`, `usuarios_id_usuario`, `title`, `intro`, `text`, `img`, `alt_img`, `precio`, `definicion`) VALUES
(1, 1, 'Torpedo IPA', 'Cerveza IPA Torpedo', 'La Torpedo Extra IPA es una cerveza agresiva aunque equilibrada, intensos aromas de lúpulo a cítricos, pinos y fruta tropical.', 'ipa-160x160-0001.jpg', 'Cerveza Artesanal Patagonica', '500', 'IBU 23 | 34'),
(2, 1, 'Pale APA v2', 'Cerveza Pale Ale', 'De cuerpo medio-liviano a medio. Carbonatación de moderada a alta. Acabado suave, sin astringencias, asociado a la alta tasa de lupulación.', 'rabieta-apa.jpg', 'Cerveza Artesanal Patagonica', '444', 'IBU 23 | 34'),
(3, 1, 'Scottish', 'Cerveza Tennent’s', 'Cerveza Tennent’s Extra Strong Scottish Lager de Tennent\'s España. Una cerveza con carácter al más puro estilo Stout, de contraste dulce y amargo en boca, gran aroma y aspecto.', 'scottish.jpg', 'Cerveza Artesanal Patagonica', '300', 'IBU 23 | 34'),
(5, 1, 'Blonde', 'Blonde española', 'La Blonde Ale de Espiga, destaca por su aroma intenso, con notas cítricas, fruta tropical, melón y uva. En boca destaca la fruta, con un amargor final que compensa la dulzura.', 'blonde-ale-0001.jpg', 'Cerveza Artesanal botella', '110', 'IBU 23 | 34'),
(6, 1, 'Stout', 'Cervezas Irish Stout', 'Tostado pronunciado, similar al café. El balance varia desde bastante uniforme a bastante amargo, la version más balanceada teniendo un poco de dulzor a malta y la version amargas siendo bastante secas.', '1627603805.jpg', 'Cerveza Artesanal botella 235ml', '250', 'IBU 23 | 34');

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
(2, 1),
(3, 1),
(5, 6),
(6, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_recuperar`
--

CREATE TABLE `password_recuperar` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `fecha_expiracion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` tinyint(3) UNSIGNED NOT NULL,
  `rol` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

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
(1, '10%'),
(2, '15%'),
(3, '20%'),
(4, '25%'),
(5, '30%'),
(6, '35%'),
(7, '40%'),
(8, '50%');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_rol` tinyint(3) UNSIGNED NOT NULL,
  `carritos_id_carrito` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `apodo` varchar(100) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `alt_img` varchar(255) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `carritos_id_carrito`, `email`, `password`, `nombre`, `apellido`, `apodo`, `img`, `alt_img`, `domicilio`) VALUES
(1, 1, 0, 'ser@ser.com.ar', '$2y$10$NouG05OFMdy12w2r/ASazevqsadOUqKtIevfF17zwRh1W7AszGQ5m', 'sebita', 'andreus', 'Admin', '1627866939.png', 'imagen del usuario', NULL),
(2, 2, 0, 'sebas@sebas.com.ar', '$2y$10$xWcbYGxLHRUUW7x1vmiQ2.7G97zIBjvAi29slSKgx.0Pz5/ceAIw2', 'sebastian', 'servente', 'sebita28', '1627444939.jpg', 'imagen hombre en la nieve', NULL),
(11, 2, 0, 'yu@yu.com.ar', '$2y$10$2TMsXjJaIPyTBbYh2WVSse.dpHP8FqW/FrKYczXEmpL3p3wLF.UGS', 'sebastian', 'andres', 'yuyo', '1627416953.jpg', 'imagen del usuario', NULL),
(29, 2, 0, 'lo@lo.com.ar', '$2y$10$I5kQbFICNB82BG5lDb4iceYlblWcDnZ2/JjBz.Vy8rdU9nnahAnw2', 'sebastian', 'servente', 'sersebas', '1628084702.jpg', 'imagen del usuario', NULL),
(30, 2, 0, 'clau@clau.com.ar', '$2y$10$p6/uj5wpTW8dYXZOap4.eeN9Pxemc.sfk3GfZDVy1d11R2VDzB8NW', 'claudia', 'gerban', 'Boquita', '1627917587.jpg', 'imagen hombre en la nieve', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `fk_carritos_cervezas1_idx` (`cervezas_id_cerveza`);

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
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

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
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_usuarios_roles1_idx` (`id_rol`),
  ADD KEY `fk_usuarios_carritos1_idx` (`carritos_id_carrito`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id_carrito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  MODIFY `id_cerveza` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `password_recuperar`
--
ALTER TABLE `password_recuperar`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tags` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `fk_carritos_cervezas1` FOREIGN KEY (`cervezas_id_cerveza`) REFERENCES `cervezas` (`id_cerveza`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `id_password_recuperar_usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_carritos1` FOREIGN KEY (`carritos_id_carrito`) REFERENCES `carritos` (`id_carrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_roles1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
