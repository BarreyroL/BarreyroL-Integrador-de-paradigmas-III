-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2025 a las 21:11:04
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u225558532_bglegal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `consulta_id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` text DEFAULT NULL,
  `asunto` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `metodo_pago` varchar(20) NOT NULL COMMENT 'transferencia, efectivo',
  `total` decimal(10,2) NOT NULL,
  `estado` varchar(20) DEFAULT 'pendiente' COMMENT 'pendiente, en_proceso, completada, cancelada',
  `fecha_consulta` timestamp NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` timestamp NULL DEFAULT current_timestamp(),
  `notas_admin` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `tarifa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `area`, `descripcion`, `tarifa`) VALUES
(1, 'Asesoramiento en Derecho Civil', 'Derecho Civil', 'Contratos, obligaciones, responsabilidad civil y derechos reales. Asesoramiento integral en todas las ramas del derecho civil.', 15000),
(2, 'Divorcios y Separaciones', 'Divorcios y Separaciones', 'Divorcios consensuados y contenciosos, convenio regulador, liquidación de bienes gananciales.', 15000),
(3, 'Régimen de Visitas', 'Régimen de Visitas', 'Regulación de visitas, tenencia de hijos menores, reintegro familiar y comunicación.', 15000),
(4, 'Cuotas Alimentarias', 'Cuotas Alimentarias', 'Fijación, aumento, disminución y ejecución de cuotas alimentarias para hijos menores.', 15000),
(5, 'Despidos Laborales', 'Despidos Laborales', 'Reclamos por despido injustificado, indemnizaciones, liquidaciones finales y diferencias salariales.', 15000),
(6, 'Accidentes Laborales', 'Accidentes Laborales', 'Reclamos ART, enfermedades profesionales, determinación de incapacidades y compensaciones.', 15000),
(7, 'Constitución de Sociedades', 'Constitución de Sociedades', 'SRL, SA, Sociedades por acciones simplificadas. Constitución, modificación y disolución.', 20000),
(8, 'Contratos Comerciales', 'Contratos Comerciales', 'Redacción, revisión y negociación de contratos empresariales y comerciales.', 15000),
(9, 'Sucesiones', 'Sucesiones', 'Declaratoria de herederos, testamentos, particiones hereditarias y liquidaciones.', 19000),
(10, 'Defensa Penal', 'Defensa Penal', 'Defensa en causas penales, querellas, denuncias y asesoramiento en procesos penales.', 22000),
(11, 'Asesoramiento Internacional', 'Asesoramiento Internacional', 'Tratados, convenios internacionales, operaciones transfronterizas y derecho comparado.', 25000),
(12, 'Violencia de Género', 'Violencia de Género', 'Medidas de protección, denuncias, asesoramiento integral y seguimiento del caso.', 15000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  `ultimo_acceso` timestamp NULL DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `password`, `fecha_registro`, `ultimo_acceso`, `estado`) VALUES
(1, 'admin', 'barreyroluciano@gmail.com', '15421lucianO', '2025-11-18 19:42:33', '2025-11-18 19:42:33', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultas_index_3` (`consulta_id`),
  ADD KEY `consultas_index_4` (`email`),
  ADD KEY `consultas_index_5` (`fecha_consulta`),
  ADD KEY `consultas_index_6` (`estado`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicios_index_7` (`area`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `usuarios_index_0` (`email`),
  ADD KEY `usuarios_index_1` (`fecha_registro`),
  ADD KEY `usuarios_index_2` (`ultimo_acceso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`consulta_id`) REFERENCES `servicios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
