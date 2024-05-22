-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2024 a las 09:20:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectointegrador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aerolineas`
--

CREATE TABLE `aerolineas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `codigo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aerolineas`
--

INSERT INTO `aerolineas` (`id`, `nombre`, `codigo`) VALUES
(1, 'American Airlines', 'AA'),
(2, 'Delta Airlines', 'DL'),
(3, 'United Airlines', 'UA'),
(4, 'Avianca', 'AC'),
(5, 'AereoMexico', 'AM'),
(6, 'Volaris', 'VL'),
(10, 'Latam', 'LT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajeros`
--

CREATE TABLE `pasajeros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `id_vuelo` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pasajeros`
--

INSERT INTO `pasajeros` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `fecha_nacimiento`, `id_vuelo`, `id_usuario`) VALUES
(12, 'Carlos', 'Angulo', 'mari@gmail.com', '3164535667', '2024-05-22', 7, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `contraseña`, `id_rol`) VALUES
(30, 'admin', 'admin', 'admin@gmail.com', '$2y$10$nPxlQR6gD3Nnf2dj2XVJi.519fHP1ENmqiWD0WoexboWf/pOOp3ia', 1),
(31, 'Juan ', 'España', 'juanespana113@gmail.com', '$2y$10$RsNuPCIPliyEhXHXhC8Jz.waf00tfJsrafxDsiP4mfhpKVO2IQmkK', 2),
(32, 'emmanuel', 'murcia', 'murciaguerreroemmanuel@gmail.com', '$2y$10$J7Y9WI70H5Iv2mUoopE6dufEGVsGmtHCSHQ6m1ZIhrRoS/2BDKVLO', 2),
(35, 'Jimmy', 'Angulo', 'jimmy113@gmail.com', '$2y$10$iiVwSSF8WIjG4nctbvD/COyPZuBE8LU1Iko/4Lc6aewe2tWEtSYZq', 2),
(36, 'Marisol', 'Rivas', 'mari@gmail.com', '$2y$10$IvP5unr4gd.dTcuw4e5YS.tfT98fXfaH4.LlCBVcnklY8BEK32O32', 2),
(37, 'Pepito', 'Perez', 'pepitoperez@gmail.com', '$2y$10$98fvxFMKqzKKaaGTJ.qV5OvnqC85Ds4yIgiiCSLiw2ELA7jl3NQLS', 2),
(38, 'Miguelon', 'Londoño', 'miguelon@gmail.com', '$2y$10$3JRs/onk6pbWC87xia7t4.72MQ/fcVZCpb71zBuFUaw68En1ftc3u', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `id` int(11) NOT NULL,
  `numero_vuelo` varchar(20) NOT NULL,
  `id_aerolinea` int(11) NOT NULL,
  `origen` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_salida` time NOT NULL,
  `fecha_llegada` date NOT NULL,
  `hora_llegada` time NOT NULL,
  `estado` enum('Programado','En vuelo','Aterrizado','Cancelado','Retrasado') NOT NULL DEFAULT 'Programado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`id`, `numero_vuelo`, `id_aerolinea`, `origen`, `destino`, `fecha_salida`, `hora_salida`, `fecha_llegada`, `hora_llegada`, `estado`) VALUES
(4, '23455', 10, 'Bogota', 'Cali', '2024-05-21', '21:27:00', '2024-05-21', '21:27:00', 'En vuelo'),
(5, '5432', 6, 'Pereira', 'Medellin', '2024-05-22', '22:31:00', '2024-05-22', '21:33:00', 'Programado'),
(7, '12345', 5, 'Colombia', 'Mexico', '2024-05-22', '23:21:00', '2024-05-23', '12:21:00', 'Programado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aerolineas`
--
ALTER TABLE `aerolineas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pasajeros`
--
ALTER TABLE `pasajeros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vuelo` (`id_vuelo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aerolinea` (`id_aerolinea`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aerolineas`
--
ALTER TABLE `aerolineas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pasajeros`
--
ALTER TABLE `pasajeros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pasajeros`
--
ALTER TABLE `pasajeros`
  ADD CONSTRAINT `pasajeros_ibfk_1` FOREIGN KEY (`id_vuelo`) REFERENCES `vuelos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD CONSTRAINT `fk_aerolinea` FOREIGN KEY (`id_aerolinea`) REFERENCES `aerolineas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
