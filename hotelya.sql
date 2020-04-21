-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2019 a las 17:16:35
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotelya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `idhabitaciones` int(10) UNSIGNED NOT NULL,
  `numeroHabitacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `estado` enum('libre','ocupado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('ventilador','aire') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hoteles_idhoteles` int(10) UNSIGNED NOT NULL,
  `numeroCamas` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `idhoteles` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroHabitaciones` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `telefono` varbinary(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`idhoteles`, `nombre`, `direccion`, `ciudad`, `departamento`, `numeroHabitaciones`, `created_at`, `updated_at`, `user_id`, `telefono`) VALUES
(4, 'bu', 'ca', 'Bucaramanga', 'Santander', 3, NULL, NULL, 4, 0x32111232);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idimagen` int(11) NOT NULL,
  `nombre` varchar(535) COLLATE utf8_spanish_ci NOT NULL,
  `id_hotel` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`idimagen`, `nombre`, `id_hotel`) VALUES
(12, '1546120451bucarica.jpg', 4),
(13, '1546117429bucarica2.jpg', 4),
(15, '1546460438WhatsApp Image 2018-11-28 at 6.53.16 PM.jpeg', 5),
(16, '1547404720bucarica.jpg', 4),
(17, '1549507142avatar.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_01_103445_create_hoteles_table', 1),
(4, '2018_08_01_111857_create_habitaciones_table', 1),
(5, '2018_08_01_113329_create_clientes_table', 1),
(6, '2018_08_01_114536_create_reservas_table', 1),
(7, '2018_08_01_122153_create_pagos_table', 1),
(8, '2018_08_01_161157_create_registro_huespedes_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoshuespedes`
--

CREATE TABLE `pagoshuespedes` (
  `idpagos` int(10) NOT NULL,
  `total` int(11) NOT NULL,
  `numero_habitacion` int(10) DEFAULT NULL,
  `id_registro_huespedes` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pagoshuespedes`
--

INSERT INTO `pagoshuespedes` (`idpagos`, `total`, `numero_habitacion`, `id_registro_huespedes`, `created_at`, `updated_at`) VALUES
(6, 12000, 0, 8, '2018-10-05 02:40:30', '2018-10-05 02:40:30'),
(7, 23234, 0, 9, '2018-10-05 02:42:42', '2018-10-05 02:42:42'),
(8, 23234, 0, 10, '2018-10-05 02:43:30', '2018-10-05 02:43:30'),
(9, 323111, 101, 11, '2018-10-10 04:04:03', '2018-10-10 04:04:03'),
(10, 54566, 101, 12, '2018-10-10 04:43:52', '2018-10-10 04:43:52'),
(11, 3456, 101, 13, '2018-10-10 04:46:24', '2018-10-10 04:46:24'),
(12, 45556, 103, 14, '2018-10-10 04:50:32', '2018-10-10 04:50:32'),
(13, 2332, 101, 15, '2018-10-10 04:52:45', '2018-10-10 04:52:45'),
(14, 323, 101, 19, '2018-10-10 06:52:57', '2018-10-10 06:52:57'),
(15, 12000, 101, 20, '2018-10-17 05:19:21', '2018-10-17 05:19:21'),
(16, 123444, 101, 21, '2018-10-17 05:21:46', '2018-10-17 05:21:46'),
(17, 12000, 101, 22, '2018-10-31 00:58:29', '2018-10-31 00:58:29'),
(18, 15000, 103, 23, '2018-10-31 01:26:38', '2018-10-31 01:26:38'),
(19, 1121, 101, 24, '2018-10-31 05:25:05', '2018-10-31 05:25:05'),
(20, 15000, 101, 25, '2018-11-30 03:30:14', '2018-11-30 03:30:14'),
(21, 132333, 101, 26, '2019-01-03 02:51:44', '2019-01-03 02:51:44'),
(22, 48000, 101, 27, '2019-01-08 21:52:40', '2019-01-08 21:52:40'),
(23, 13232, 101, 28, '2019-01-09 22:18:50', '2019-01-09 22:18:50'),
(24, 122223, 103, 29, '2019-01-09 22:21:46', '2019-01-09 22:21:46'),
(25, 1212, 105, 30, '2019-01-09 23:14:26', '2019-01-09 23:14:26'),
(26, 132, 0, 31, '2019-01-09 23:14:58', '2019-01-09 23:14:58'),
(27, 1323, 0, 32, '2019-01-09 23:16:17', '2019-01-09 23:16:17'),
(28, 213232, 0, 33, '2019-01-09 23:16:51', '2019-01-09 23:16:51'),
(29, 12232, 101, 34, '2019-01-14 00:33:02', '2019-01-14 00:33:02'),
(30, 243214, 101, 35, '2019-01-31 10:48:44', '2019-01-31 10:48:44'),
(31, 3434, 103, 36, '2019-01-31 10:50:09', '2019-01-31 10:50:09'),
(32, 546546, 105, 37, '2019-01-31 10:51:30', '2019-01-31 10:51:30'),
(33, 1112, 101, 38, '2019-02-06 08:18:32', '2019-02-06 08:18:32'),
(34, 1212, 105, 39, '2019-02-06 09:38:56', '2019-02-06 09:38:56'),
(35, 12000, 101, 40, '2019-02-07 07:34:08', '2019-02-07 07:34:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagosreservas`
--

CREATE TABLE `pagosreservas` (
  `idpagoreserva` int(10) NOT NULL,
  `pago` int(11) DEFAULT NULL,
  `id_reserva` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagosreservas`
--

INSERT INTO `pagosreservas` (`idpagoreserva`, `pago`, `id_reserva`, `created_at`, `updated_at`) VALUES
(13, 14200, 9, '2018-10-05 02:50:41', '2018-10-05 02:50:41'),
(14, 150000, 10, '2018-10-09 01:56:53', '2018-10-09 01:56:53'),
(15, 12323, 9, '2018-10-08 22:16:23', '2018-10-11 22:16:23'),
(16, 31234, 9, '2018-10-12 04:53:39', '2018-10-12 04:53:39'),
(17, 24000, 1, '2019-01-03 02:36:06', '2019-01-03 02:36:06'),
(18, 123333, 2, '2019-01-14 00:59:58', '2019-01-14 00:59:58'),
(19, 12223, 3, '2019-01-14 01:00:18', '2019-01-14 01:00:18'),
(20, 23232, 4, '2019-01-29 09:20:43', '2019-01-29 09:20:43'),
(21, 3232323, 5, '2019-01-31 11:00:43', '2019-01-31 11:00:43'),
(22, 12000, 5, '2019-02-06 08:53:26', '2019-02-06 08:53:26'),
(23, 4433, 6, '2019-02-07 07:34:38', '2019-02-07 07:34:38'),
(24, 44330, 7, '2019-02-07 07:34:38', '2019-02-07 07:34:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_huespedes`
--

CREATE TABLE `registro_huespedes` (
  `id` int(10) UNSIGNED NOT NULL,
  `documento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidadPersonas` int(11) NOT NULL,
  `tipohabitacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaSalida` date NOT NULL,
  `numero_habitacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombres` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registro_huespedes`
--

INSERT INTO `registro_huespedes` (`id`, `documento`, `cantidadPersonas`, `tipohabitacion`, `fechaIngreso`, `fechaSalida`, `numero_habitacion`, `nombres`, `apellidos`, `user_id`) VALUES
(8, '2332', 4, 'ventilador', '2018-10-04', '2018-10-04', '0', 'gg', 'ddd', NULL),
(9, '234334', 2, 'ventilador', '2018-10-04', '2018-10-04', '0', 'fdfdf', 'sdafsd', NULL),
(10, '234334', 2, 'ventilador', '2018-10-04', '2018-10-04', '0', 'rtrtrt', 'sdafsd', 4),
(11, '32', 1, 'ventilador', '2018-10-09', '2018-10-10', '101', 'ab', '', 4),
(12, '56', 1, 'ventilador', '2018-10-09', '2018-10-01', '101', 'a', 'f', 4),
(13, '323', 1, 'ventilador', '2018-10-09', '2018-10-10', '101', 'ab', '', 4),
(14, '788', 1, 'ventilador', '2018-10-09', '2018-10-09', '103', 'a', 'g', 4),
(15, '12313', 1, 'ventilador', '2018-10-01', '2018-10-09', '101', 'a', 'n', 4),
(16, '23', 1, 'ventilador', '2018-10-01', '2018-10-09', '101', 'ab', '', 4),
(17, '23', 1, 'ventilador', '2018-10-01', '2018-10-09', '101', 'ab', 'rer', 4),
(18, '232323', 1, 'ventilador', '2018-10-01', '2018-10-09', '101', 'ab', 'rer', 4),
(19, '232', 2, 'ventilador', '2018-10-09', '2018-10-09', '101', 'asadsdsad', 'dsafds', 4),
(20, '232', 1, 'ventilador', '2018-10-16', '2018-10-17', '101', 'sdsasad', 'dsdd233', 4),
(21, '1212', 1, 'ventilador', '2018-10-16', '2018-10-16', '101', 'asdas', 'dsas', 4),
(22, '3232', 2, 'ventilador', '2018-10-30', '2018-10-31', '101', 'ver', 'add', 4),
(23, '12343', 1, 'ventilador', '2018-10-30', '2018-10-30', '103', 'sada', 'dsad', 4),
(24, '111', 1, 'ventilador', '2018-10-30', '2018-10-30', '101', 'qwqeqqwe', 'qweqweqwe', 4),
(25, '232', 1, 'ventilador', '2018-11-29', '2018-11-29', '101', 'carlos', 'perez', 4),
(26, '22', 3, 'ventilador', '2019-01-02', '2019-01-03', '101', 'q', 'w', 3),
(27, '1232423', 4, 'ventilador', '2019-01-08', '2019-01-09', '101', 'aquaman', 'eww', 4),
(28, '12312', 1, 'ventilador', '2019-01-09', '2019-01-09', '101', 'qqq', 'qqq', 4),
(29, '12323', 1, 'ventilador', '2019-01-09', '2019-01-09', '103', 'ZZ', 'qq', 4),
(30, '121', 1, 'ventilador', '2019-01-09', '2019-01-09', '105', 'As', 'ZZ', 4),
(31, '1322', 1, 'ventilador', '2019-01-09', '2019-01-09', '0', 'sQ', 'SS', 4),
(32, '132', 1, 'ventilador', '2019-01-09', '2019-01-10', '0', 'ss', 'ss', 4),
(33, '13232', 4, 'ventilador', '2019-01-09', '2019-01-09', '0', 'Qs', 'Sq', 4),
(34, '1232', 3, 'ventilador', '2019-01-13', '2019-01-14', '101', 'qq', 'qqw', 4),
(35, '434', 3, 'aire', '2019-01-30', '2019-01-31', '101', 'fdgfd', 'dsfs', 4),
(36, '132', 2, 'ventilador', '2019-01-31', '2019-01-31', '103', 'gfdsg', 'sfdsgf', 4),
(37, '324', 2, 'ventilador', '2019-01-31', '2019-01-31', '105', 'sdf', 'dfds', 4),
(38, '1212', 4, 'aire', '2019-02-05', '2019-02-05', '101', 'qqq', 'qqq', 4),
(39, '12', 2, 'ventilador', '2019-02-04', '2019-02-07', '105', 'qwq', 'qwqwe', 4),
(40, '121', 2, 'aire', '2019-02-06', '2019-02-07', '101', 'asa', 'asas', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `idreservas` int(10) UNSIGNED NOT NULL,
  `cantidadPersonas` int(11) NOT NULL,
  `tipohabitacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaSalida` date NOT NULL,
  `nombres` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nacionalidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmacion` int(1) DEFAULT NULL,
  `idhoteles` int(11) DEFAULT NULL,
  `visible` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`idreservas`, `cantidadPersonas`, `tipohabitacion`, `fechaIngreso`, `fechaSalida`, `nombres`, `apellidos`, `nacionalidad`, `documento`, `confirmacion`, `idhoteles`, `visible`) VALUES
(1, 3, 'cama doble una persona', '2019-01-02', '2019-01-03', 'heyner', 'becerra', 'local', '1234', 1, 4, 1),
(2, 4, 'cama doble una persona', '2019-01-09', '2019-01-10', 'qqww', 'carmenlita', 'local', '1323', 1, 4, 1),
(3, 3, 'cama doble una persona', '2019-01-09', '2019-01-09', 'qq', 'qqq', 'local', '12', 1, 4, 1),
(4, 2, 'cama doble dos personas', '2019-01-28', '2019-01-29', 'hjhj', 'vghghg', 'venezuela', '23334', 1, 4, 1),
(5, 1, 'cama doble una persona', '2019-02-06', '2019-02-07', 'qqw', 'qqw', 'local', '2', 1, 4, 1),
(6, 12, 'cama doble una persona', '2019-02-06', '2019-02-06', 'q', 'q', 'local', '12212', 1, 4, 1),
(7, 1, 'cama doble una persona', '2019-01-16', '2019-01-18', 'q', 'q', 'local', '12212', 1, 4, 1),
(8, 2, 'cama doble dos personas', '2019-02-07', '2019-02-08', 'leonel', 'ramirez', 'veneco', '121212', 0, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `wifi` enum('si','no') COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_hotel` int(11) UNSIGNED NOT NULL,
  `parqueadero` enum('si','no') COLLATE utf8_spanish_ci DEFAULT NULL,
  `camadoble1persona` int(11) DEFAULT NULL,
  `camadoble2persona` int(11) DEFAULT NULL,
  `camarote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `wifi`, `id_hotel`, `parqueadero`, `camadoble1persona`, `camadoble2persona`, `camarote`) VALUES
(6, 'si', 4, 'no', 121, 1212, 2323);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'pk autoincrementakl',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nombre de usuario',
  `cargo` enum('administrador','recepcionista') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'cargo',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'correo',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'contrasena',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'token de laravel',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'auditoria',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'auditoria',
  `user_role` int(2) DEFAULT '1' COMMENT 'llave de rol',
  `email_activation` int(2) DEFAULT '0' COMMENT 'estado de cuenta',
  `user_state` int(2) DEFAULT '1' COMMENT 'estado de usuario',
  `create_hotel_state` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `cargo`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `user_role`, `email_activation`, `user_state`, `create_hotel_state`) VALUES
(1, 'jose', 'administrador', 'jose@gmail.com', '', NULL, '2018-08-09 03:19:54', '2018-08-09 03:19:54', 1, 1, 1, 0),
(3, 'miguel', 'recepcionista', 'lanh03@hotmail.com', '$2y$10$X2SnRjhsEFGV8mGDXJulzum3rr6kDRRnKWwX09X5hHX5rdHS0VHnC', 'LUbwIrrDBTwv2l6HmtW3gcNlOGWVDPueTvzGr5G5KZJuw2QKnCfxq5knTH13', NULL, NULL, 0, 1, 1, 0),
(4, 'heyner', 'recepcionista', 'heynerlbr@gmail.com', '$2y$10$vvjQnyF3kyGufaXcAgy.ruoFyHhK8SjCVQlR2FNpz/4wqAWur8Zk6', 'KAPenXMBmhSlyE68LXkOhQbOfS1LlvPFf11PVXQowI1HTguimRrEpt8o030D', NULL, NULL, 0, 1, 1, 1),
(5, 'miguel', 'administrador', 'lanho3@hotmail.com', '$2y$10$vvjQnyF3kyGufaXcAgy.ruoFyHhK8SjCVQlR2FNpz/4wqAWur8Zk6', 'EGCBknGQ065dd91RcJnNkId59E1ccj86R4SarznUWh9rP2MCvfI7nZ5wIL33', NULL, NULL, 1, 1, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`idhabitaciones`),
  ADD KEY `habitaciones_hoteles_idhoteles_foreign` (`hoteles_idhoteles`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`idhoteles`),
  ADD KEY `hoteles_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD UNIQUE KEY `idimagen` (`idimagen`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagoshuespedes`
--
ALTER TABLE `pagoshuespedes`
  ADD PRIMARY KEY (`idpagos`);

--
-- Indices de la tabla `pagosreservas`
--
ALTER TABLE `pagosreservas`
  ADD PRIMARY KEY (`idpagoreserva`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `registro_huespedes`
--
ALTER TABLE `registro_huespedes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idreservas`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `idhabitaciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  MODIFY `idhoteles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idimagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pagoshuespedes`
--
ALTER TABLE `pagoshuespedes`
  MODIFY `idpagos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `pagosreservas`
--
ALTER TABLE `pagosreservas`
  MODIFY `idpagoreserva` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `registro_huespedes`
--
ALTER TABLE `registro_huespedes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idreservas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'pk autoincrementakl', AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `habitaciones_hoteles_idhoteles_foreign` FOREIGN KEY (`hoteles_idhoteles`) REFERENCES `hoteles` (`idhoteles`) ON DELETE CASCADE;

--
-- Filtros para la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD CONSTRAINT `hoteles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
