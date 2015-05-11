-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2015 a las 16:09:09
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ofigres`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Gerente', '6', 1426887860),
('Gerente', '7', 1427598765);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Administrador', 1, NULL, NULL, NULL, 1426885370, 1426885370),
('Gerente', 1, NULL, NULL, NULL, 1426885370, 1426885370),
('secretaria', 1, NULL, NULL, NULL, 1426885370, 1426885370);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Gerente', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
`id` bigint(20) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `cuerpo` varchar(1000) NOT NULL,
  `urlimg` varchar(100) NOT NULL,
  `piedefoto` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `cuerpo`, `urlimg`, `piedefoto`, `fecha`, `estado`) VALUES
(1, ' Corte en pleno exige renuncia inmediata a Pretelt', 'La Sala Plena de la Corte Constitucional le exigió por unanimidad al magistrado Jorge Ignacio Pretelt Chaljub que renuncie de manera inmediata y de manera irrevocable al cargo ante el escándalo de corrupción que lo sacude. Lo más grave es que la Sala Plena suspendió la sesión que tenía para este miércoles a fin que Pretelt se pronuncie. \r\n\r\nAsí lo anunció la presidenta encargada de la Corte, María Victoria Calle, al estimar que "nuestra petición no es un juicio sobre la responsabilidad del doctor Pretelt Chaljub en los hechos que se le imputan, pues definir este aspecto le corresponde a su juez natural. Sin embargo, estimamos que estos principios no se verán sacrificados cuando ejerza su derecho de defensa al margen de la Corporación". ', 'uploads/noticias/img1218.jpg', 'pie de foto 1', '2015-04-13', 1),
(2, ' Senado negó la licencia al magistrado Pretelt', 'Tras las expectativa que se generó por la suerte que tendría la petición del magistrado de la Corte Constitucional Jorge Ignacio Pretelt Chaljub de buscar una licencia para defenderse de los cargos de corrupción y de cobro de comisión por tramitar fallos de tutela, la plenaria del Senado le negó en la noche de este martes esa posibilidad. \r\n\r\nEn una decisión que se tomó rápidamente, la plenaria negó con 42 votos contra 34 esa petición. Los votos que no le concedieron el permiso estuvieron especialmente en las bancadas Liberal, La U, Cambio Radical, el Polo y la Alianza Verde, en tanto que los conservadores y el uribismo sí le dieron el apoyo. ', 'uploads/noticias/img2961.jpg', 'pie de foto 2', '2015-03-02', 1),
(3, ' Netanyahu codo a codo con Herzog, según sondeos de comicios israelíes', 'El primer ministro conservador israelí Benjamin Netanyahu se declaró vencedor este martes de unos apretados comicios legislativos, que según los sondeos lo dejaban codo a codo con su rival laborista Isaac Herzog.\r\n\r\nLa cadena televisiva pública Canal 1 y el privado Canal 10 le daban al Likud conservador 27 escaños en el parlamento, de 120 asientos, e igual número para la opositora Unión Sionista.\r\n\r\nUn tercer sondeo, del privado Canal 2 le dio al Likud un escaño de avance, lo que significaría ocupar 28 curules.\r\n\r\nPero según los analistas Netanyahu partía con ventaja, teniendo en cuenta la aparente distribución de escaños, para forjar una nueva coalición que le permitiría convertirse de nuevo en jefe de gobierno, lo que prolongaría los seis años que ya lleva en el poder.', 'uploads/noticias/img332.jpg', 'pie de foto 3', '2015-04-21', 1),
(4, ' Con Ejército y Policía despejarán vías bloqueadas por paro', 'Con la adopción de un nuevo paquete de medidas, que en su mayoría son de índole judicial, el Gobierno nacional garantizó, en la tarde del martes, que se podrá hacer la protesta social de los camioneros, pero no permitirá el cierre o bloqueos parciales de vías o la imposibilidad de permitir la movilización de vehículos. \r\n\r\nLa decisión fue anunciada por el Alto Gobierno, en cabeza del ministro de la Presidencia, Néstor Humberto Martínez; del Interior, Juan Fernando Cristo; Agricultura, Aurelio Iragorri; Transporte, Natalia Abello; y el fiscal General de la Nación, Eduardo Montealegre. \r\n\r\nEsa declaración dada en la Casa de Nariño, se conoció minutos después de que los camioneros se volvieran a levantar de la mesa de negociación, sin permitir que se continuara la interlocución con el Gobierno. \r\n', 'uploads/noticias/img4545.jpg', 'pie de foto 4', '2015-04-27', 1),
(5, ' 2O millones de recompensa por denunciar a instigadores violentos en paros', '\r\nBOGOTÁ | 14 DE MARZO DE 2015\r\n\r\nEn rueda de prensa el Ministerio de Transporte, la Policía y la Fiscalía lanzaron una advertencia sobre procesos penales en contra de los que se excedan en el paro programado para este lunes. \r\nEn rueda de prensa el Ministerio de Transporte, la Policía y la Fiscalía lanzaron una advertencia sobre procesos penales en contra de los que se excedan en el paro programado para este lunes.\r\n\r\nEste sábado en rueda de prensa conjunta del comandante de la Policía, general Rodolfo Palomino, el fiscal general, Luis Eduardo Montealegre y Natalia Abello, ministra de Transporte se anunció una recompensa de hasta 20 millones para quienes informen o pongan en evidencia a los instigadores de hechos violentos, ataques o bloqueos en las vías del país durante el paro camionero, que ya completa 20 días.\r\nLa recompensa también aplica durante el cese de actividades que anunciaron algunos taxistas para este lunes.', 'uploads/noticias/img5946.jpg', 'pie de foto 5', '2015-04-22', 1),
(6, ' Santos destacó solidez de la economía colombiana', 'Con optimismo recibió el presidente de la República, Juan Manuel Santos, el anuncio de la Departamento Administrativo Nacional de Estadística (Dane) acerca del crecimiento de la economía en 2014. \r\n\r\nEn un primer pronunciamiento, el Jefe del Estado sostuvo que “crecimiento de 4,6% en 2014, el más alto en América Latina y séptimo en el mundo, muestra la solidez económica de Colombia”. \r\n\r\nEn la mañana el director del Dane, Mauricio Perfetti, informó que el año pasado la economía colombiana progresó 4,6%, cifra menor a la registrada en 2013, cuando fue de 4,9%. El sector que tuvo la mayor expansión fue la construcción, con 9,9%. ', 'uploads/noticias/img6552.jpg', 'pie de foto 6', '2015-04-26', 1),
(7, ' Bunbury y Calamaro rinden tributo a Cerati al unirse para cantar ‘Crimen’', 'Enrique Bunbury Andrés Calamaro, figuras del rock en español, unieron sus voces en un gran homenaje al desaparecido Gustavo Cerati al interpretar en vivo ‘Crimen”, del artista argentino que falleció el año pasado tras cinco años en coma.\r\n\r\n“Elegimos ‘Crimen’, una canción atípica dentro del repertorio de Gustavo Cerati; asimismo un himno contemporáneo, una canción de orfebre, de interesantes armonías, profunda melodía y letra de adulto confesional”, expresó el cantautor de Argentina Calamaro.\r\n\r\nAmbos artistas hicieron un alto en las giras de presentación de sus respectivos últimos discos, ‘Palosanto’ (Bunbury) y ‘Bohemio’ (Calamaro). Esta gira se desarrolló únicamente por el país centroamericano.', 'uploads/noticias/arbol sumergido438.jpg', 'pie de foto 7', '2015-04-28', 0),
(8, ' Investigan caso de abuso a niña de 2 años en hogar del Icbf en Pereira', 'Menor de 2 años habría sido víctima agresiones sexuales. Las autoridades investigan quien fue el agresor y si el caso ocurrió en un hogar comunitario.\r\n\r\nLas autoridades y el Instituto Colombiano de Bienestar Familiar investigan un caso de abuso sexual contra una niña de 2 años que habría ocurrido-según señala la madre de la menor- en un hogar comunitario en el barrio Los Naranjos de Dosquebradas.\r\n\r\nLa mamá de la niña sostiene que las agresiones sexuales ocurrieron el lunes de la semana pasada y describió que ese día a las 8:30 a.m., llevó a la pequeña de dos años recién bañada y peinada al hogar y que a las 2:30 p.m., recibió una llamada de la profesora, quien le dijo que recogiera a la niña que estaba muy mal. La madre asegura que tenía sangrado y flujos.', 'uploads/noticias/img7444.jpg', 'pie de foto 8', '2015-04-29', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`id` bigint(20) NOT NULL,
  `descripicion` varchar(100) NOT NULL,
  `medida` varchar(100) NOT NULL,
  `nota` varchar(100) NOT NULL,
  `urlimg` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `descripicion`, `medida`, `nota`, `urlimg`, `estado`) VALUES
(2, 'La descripcion del producto del lunes', '23 * 23 mm', '', 'uploads/productos/cafe295.png', 1),
(3, 'esta es la desripcion del producto creado', '34 * 34 mm', 'no aplican notas', 'uploads/productos/comida32.jpg', 1),
(4, 'esta es la desripcion del producto creado numero 3', 'este producto no contiene medidas de relacion', 'no se aplican notas', 'uploads/productos/deccir que si407.jpg', 1),
(5, 'La descripcion del proucto', '34 * 34 mm', 'no se aplican notas para este producto por el momento', 'uploads/productos/lunes863.jpg', 1),
(6, 'producto 5', '', '', 'uploads/productos/buenos dias975.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` bigint(20) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(40) DEFAULT 'No Aplica',
  `password` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `authKey` varchar(250) DEFAULT NULL,
  `access_token` varchar(250) DEFAULT NULL,
  `password_reset_token` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombres`, `apellidos`, `email`, `password`, `username`, `authKey`, `access_token`, `password_reset_token`) VALUES
(7, 'Andres', 'Rodriguez', 'andres@mail.com', '$2y$13$UZjLbHYwq8znHazGoCS4Ge801o4OTScErwS5/7ftrh01yoWC4.0k.', NULL, 'fplg-73LOpKLtEpqN5B7x1NSiMdXnBz-', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
 ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
 ADD PRIMARY KEY (`name`), ADD KEY `rule_name` (`rule_name`), ADD KEY `type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
 ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
 ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username_UNIQUE` (`username`), ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
