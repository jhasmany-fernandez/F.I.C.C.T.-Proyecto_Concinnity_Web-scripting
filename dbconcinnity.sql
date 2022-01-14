-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2022 a las 13:19:44
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbconcinnity`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tabla` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_implicado` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idusuario` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Vestido'),
(2, 'Falda'),
(3, 'Blusa'),
(4, 'Short'),
(5, 'Top'),
(6, 'Enterizo'),
(7, 'Blazer'),
(8, 'Body'),
(9, 'Pantalon'),
(10, 'Accesorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `telefono`, `correo`) VALUES
(1, 'Melody Seña', '77652189', 'melodysena@gmail.com'),
(2, 'Tatiana Torrez', '75572341', 'TaatianaTorrez@gmail.com'),
(3, 'Yuliana Rodriguez', '77895621', 'YulianaRo@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallenotacompra`
--

CREATE TABLE `detallenotacompra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `costo` decimal(6,2) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `importe` decimal(7,2) NOT NULL,
  `idtallaproducto` bigint(20) UNSIGNED NOT NULL,
  `idnotacompra` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detallenotacompra`
--

INSERT INTO `detallenotacompra` (`id`, `costo`, `cantidad`, `importe`, `idtallaproducto`, `idnotacompra`, `created_at`, `updated_at`) VALUES
(1, '40.00', 2, '80.00', 7, 1, '2021-12-23 21:57:12', '2021-12-23 21:57:12'),
(2, '50.00', 5, '250.00', 7, 2, '2021-12-23 21:57:32', '2021-12-23 21:57:32'),
(3, '50.00', 2, '100.00', 7, 3, '2021-12-23 21:59:43', '2021-12-23 21:59:43'),
(4, '50.00', 5, '250.00', 7, 4, '2021-12-23 22:00:02', '2021-12-23 22:00:02'),
(5, '50.00', 2, '100.00', 7, 5, '2021-12-23 22:33:43', '2021-12-23 22:33:43'),
(6, '50.00', 2, '100.00', 7, 6, '2021-12-23 22:34:54', '2021-12-23 22:34:54'),
(7, '40.00', 2, '80.00', 7, 7, '2021-12-23 22:38:21', '2021-12-23 22:38:21'),
(8, '50.00', 2, '100.00', 7, 8, '2021-12-23 22:51:12', '2021-12-23 22:51:12'),
(9, '50.00', 5, '250.00', 7, 9, '2021-12-23 22:51:29', '2021-12-23 22:51:29'),
(10, '50.00', 2, '100.00', 7, 10, '2021-12-23 22:52:23', '2021-12-23 22:52:23'),
(11, '100.00', 2, '200.00', 10, 10, '2021-12-23 22:52:23', '2021-12-23 22:52:23'),
(12, '100.00', 5, '500.00', 10, 11, '2021-12-23 22:52:54', '2021-12-23 22:52:54'),
(13, '50.00', 5, '250.00', 7, 11, '2021-12-23 22:52:54', '2021-12-23 22:52:54'),
(14, '100.00', 5, '500.00', 11, 12, '2021-12-23 22:54:15', '2021-12-23 22:54:15'),
(15, '50.00', 2, '100.00', 7, 12, '2021-12-23 22:54:15', '2021-12-23 22:54:15'),
(16, '50.00', 2, '100.00', 7, 13, '2021-12-25 18:01:29', '2021-12-25 18:01:29'),
(17, '100.00', 3, '300.00', 9, 13, '2021-12-25 18:01:30', '2021-12-25 18:01:30'),
(18, '50.00', 5, '250.00', 7, 14, '2021-12-26 20:55:02', '2021-12-26 20:55:02'),
(19, '90.00', 5, '450.00', 10, 15, '2021-12-26 20:55:19', '2021-12-26 20:55:19'),
(20, '45.00', 5, '225.00', 1, 16, '2021-12-26 20:55:42', '2021-12-26 20:55:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallenotasalida`
--

CREATE TABLE `detallenotasalida` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `total` decimal(7,2) NOT NULL,
  `idtallaproducto` bigint(20) UNSIGNED NOT NULL,
  `idnotasalida` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detallenotasalida`
--

INSERT INTO `detallenotasalida` (`id`, `precio`, `cantidad`, `total`, `idtallaproducto`, `idnotasalida`, `created_at`, `updated_at`) VALUES
(3, '200.00', 2, '400.00', 8, 4, '2022-01-10 02:06:58', '2022-01-10 02:06:58'),
(4, '200.00', 1, '200.00', 13, 4, '2022-01-10 02:06:58', '2022-01-10 02:06:58'),
(5, '100.00', 2, '200.00', 7, 5, '2022-01-10 02:09:30', '2022-01-10 02:09:30'),
(6, '100.00', 1, '100.00', 7, 6, '2022-01-10 02:10:24', '2022-01-10 02:10:24'),
(7, '200.00', 1, '200.00', 8, 7, '2022-01-10 02:10:35', '2022-01-10 02:10:35'),
(8, '200.00', 1, '200.00', 13, 8, '2022-01-10 02:10:53', '2022-01-10 02:10:53'),
(9, '100.00', 1, '100.00', 7, 8, '2022-01-10 02:10:53', '2022-01-10 02:10:53'),
(10, '100.00', 1, '100.00', 7, 9, '2022-01-10 13:52:36', '2022-01-10 13:52:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallenotaventa`
--

CREATE TABLE `detallenotaventa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `total` decimal(7,2) NOT NULL,
  `idtallaproducto` bigint(20) UNSIGNED NOT NULL,
  `idnotaventa` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detallenotaventa`
--

INSERT INTO `detallenotaventa` (`id`, `precio`, `cantidad`, `total`, `idtallaproducto`, `idnotaventa`, `created_at`, `updated_at`) VALUES
(1, '100.00', 1, '100.00', 7, 1, '2021-12-24 16:01:17', '2021-12-24 16:01:17'),
(2, '200.00', 2, '400.00', 10, 1, '2021-12-24 16:01:17', '2021-12-24 16:01:17'),
(3, '100.00', 1, '100.00', 7, 2, '2021-12-24 23:57:23', '2021-12-24 23:57:23'),
(4, '100.00', 2, '200.00', 7, 3, '2021-12-25 18:02:45', '2021-12-25 18:02:45'),
(5, '200.00', 2, '400.00', 9, 3, '2021-12-25 18:02:45', '2021-12-25 18:02:45'),
(6, '100.00', 2, '200.00', 7, 4, '2021-12-26 20:56:32', '2021-12-26 20:56:32'),
(7, '200.00', 2, '400.00', 10, 4, '2021-12-26 20:56:32', '2021-12-26 20:56:32'),
(8, '100.00', 3, '300.00', 1, 5, '2021-12-26 20:56:55', '2021-12-26 20:56:55'),
(9, '200.00', 1, '200.00', 9, 6, '2021-12-26 20:57:13', '2021-12-26 20:57:13'),
(10, '200.00', 1, '200.00', 10, 7, '2021-12-26 21:57:21', '2021-12-26 21:57:21'),
(11, '200.00', 1, '200.00', 9, 7, '2021-12-26 21:57:21', '2021-12-26 21:57:21'),
(12, '100.00', 1, '100.00', 7, 8, '2022-01-03 01:16:32', '2022-01-03 01:16:32'),
(13, '200.00', 1, '200.00', 10, 8, '2022-01-03 01:16:32', '2022-01-03 01:16:32'),
(14, '100.00', 2, '200.00', 1, 9, '2022-01-03 01:17:40', '2022-01-03 01:17:40'),
(15, '100.00', 1, '100.00', 1, 10, '2022-01-07 02:03:06', '2022-01-07 02:03:06'),
(16, '200.00', 1, '200.00', 10, 11, '2022-01-07 02:03:21', '2022-01-07 02:03:21'),
(17, '100.00', 1, '100.00', 1, 12, '2022-01-07 02:03:35', '2022-01-07 02:03:35'),
(18, '100.00', 1, '100.00', 7, 12, '2022-01-07 02:03:35', '2022-01-07 02:03:35'),
(19, '100.00', 1, '100.00', 1, 13, '2022-01-07 22:50:48', '2022-01-07 22:50:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`) VALUES
(1, 'SHEIN'),
(2, 'FASHION NOVA'),
(3, 'COLORITTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id`, `nombre`) VALUES
(1, 'Algodón'),
(2, 'Cuero'),
(3, 'Satin'),
(4, 'Seda'),
(5, 'Jean');

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
(1, '2013_11_06_145825_create_rol_table', 1),
(2, '2013_11_06_151517_create_personal_table', 1),
(3, '2013_11_07_213851_create_cliente_table', 1),
(4, '2013_11_10_223744_create_marca_table', 1),
(5, '2013_11_10_233302_create_categoria_table', 1),
(6, '2013_11_11_022046_create_material_table', 1),
(7, '2013_11_11_024020_create_talla_table', 1),
(8, '2013_12_05_050114_create_producto_table', 1),
(9, '2013_12_05_143158_create_tallaproducto_table', 1),
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2021_11_13_235044_add_imagen_to_users_table', 1),
(15, '2021_12_05_050840_add_imagen_to_producto_table', 1),
(16, '2021_12_05_214537_add_condicion_to_tallaproducto_table', 1),
(17, '2021_12_11_125830_create_notaventa_table', 1),
(18, '2021_12_11_150717_create_detallenotaventa_table', 1),
(19, '2021_12_19_104723_create_proveedor_table', 1),
(20, '2021_12_19_125132_create_notacompra_table', 1),
(21, '2021_12_19_130023_create_detallenotacompra_table', 1),
(22, '2021_12_20_220849_create_notasalida_table', 1),
(23, '2021_12_20_220921_create_detallenotasalida_table', 1),
(24, '2021_12_22_184701_create_bitacora_table', 1),
(25, '2022_01_01_195014_create_permiso_table', 2),
(26, '2022_01_01_195329_create_rol_permiso_table', 2),
(27, '2022_01_09_213709_add_user_to_notasalida_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notacompra`
--

CREATE TABLE `notacompra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `monto_total` decimal(7,2) NOT NULL,
  `impuesto` smallint(6) NOT NULL,
  `idproveedor` bigint(20) UNSIGNED NOT NULL,
  `idusuario` bigint(20) UNSIGNED NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notacompra`
--

INSERT INTO `notacompra` (`id`, `monto_total`, `impuesto`, `idproveedor`, `idusuario`, `condicion`, `created_at`, `updated_at`) VALUES
(1, '80.00', 20, 2, 1, 0, '2021-12-23 21:57:12', '2021-12-23 21:57:57'),
(2, '250.00', 18, 2, 1, 0, '2021-12-23 21:57:32', '2021-12-23 21:57:44'),
(3, '100.00', 15, 1, 1, 0, '2021-12-23 21:59:43', '2021-12-23 22:00:22'),
(4, '250.00', 20, 2, 1, 0, '2021-12-23 22:00:02', '2021-12-23 22:00:47'),
(5, '100.00', 15, 1, 1, 0, '2021-12-23 22:33:43', '2021-12-23 22:34:07'),
(6, '100.00', 15, 3, 1, 0, '2021-12-23 22:34:54', '2021-12-23 22:37:27'),
(7, '80.00', 13, 3, 1, 0, '2021-12-23 22:38:21', '2021-12-23 22:50:39'),
(8, '100.00', 17, 2, 1, 0, '2021-12-23 22:51:12', '2021-12-23 22:52:03'),
(9, '250.00', 10, 3, 1, 0, '2021-12-23 22:51:29', '2021-12-23 22:51:46'),
(10, '300.00', 20, 3, 1, 1, '2021-12-23 22:52:23', '2021-12-23 22:52:23'),
(11, '750.00', 15, 2, 1, 0, '2021-12-23 22:52:54', '2021-12-23 22:53:07'),
(12, '600.00', 14, 3, 1, 0, '2021-12-23 22:54:14', '2021-12-23 22:55:37'),
(13, '400.00', 20, 3, 1, 1, '2021-12-25 18:01:29', '2021-12-25 18:01:30'),
(14, '250.00', 20, 3, 1, 1, '2021-12-26 20:55:02', '2021-12-26 20:55:02'),
(15, '450.00', 20, 1, 1, 1, '2021-12-26 20:55:19', '2021-12-26 20:55:20'),
(16, '225.00', 13, 2, 1, 1, '2021-12-26 20:55:42', '2021-12-26 20:55:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notasalida`
--

CREATE TABLE `notasalida` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perdida_total` decimal(7,2) NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idusuario` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notasalida`
--

INSERT INTO `notasalida` (`id`, `descripcion`, `perdida_total`, `condicion`, `created_at`, `updated_at`, `idusuario`) VALUES
(4, 'Por mal tiempo, está arruinado', '600.00', 1, '2022-01-10 02:06:58', '2022-01-10 02:06:58', 1),
(5, 'Regalo a Diego por muchas ventas en diciembre', '140.00', 0, '2022-01-10 02:09:30', '2022-01-10 02:09:56', 1),
(6, NULL, '70.00', 1, '2022-01-10 02:10:24', '2022-01-10 02:10:24', 1),
(7, NULL, '200.00', 1, '2022-01-10 02:10:35', '2022-01-10 02:10:35', 1),
(8, 'Por mal tiempo, está arruinado', '270.00', 1, '2022-01-10 02:10:53', '2022-01-10 02:10:53', 1),
(9, NULL, '70.00', 1, '2022-01-10 13:52:36', '2022-01-10 13:52:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notaventa`
--

CREATE TABLE `notaventa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `monto_pago` decimal(7,2) NOT NULL,
  `descuento` decimal(6,2) DEFAULT NULL,
  `monto_total` decimal(7,2) NOT NULL,
  `idcliente` bigint(20) UNSIGNED NOT NULL,
  `idusuario` bigint(20) UNSIGNED NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notaventa`
--

INSERT INTO `notaventa` (`id`, `monto_pago`, `descuento`, `monto_total`, `idcliente`, `idusuario`, `condicion`, `created_at`, `updated_at`) VALUES
(1, '470.00', '10.00', '460.00', 1, 2, 1, '2021-12-24 16:01:16', '2021-12-24 16:01:17'),
(2, '70.00', '5.00', '65.00', 1, 2, 1, '2021-12-24 23:57:23', '2021-12-24 23:57:23'),
(3, '540.00', '0.00', '540.00', 3, 2, 1, '2021-01-25 18:02:45', '2021-01-25 18:02:45'),
(4, '540.00', '5.00', '535.00', 3, 2, 1, '2021-12-26 20:56:32', '2021-12-26 20:56:32'),
(5, '210.00', '0.00', '210.00', 3, 2, 1, '2021-12-26 20:56:55', '2021-12-26 20:56:55'),
(6, '200.00', '5.00', '195.00', 3, 2, 0, '2021-12-26 20:57:13', '2021-12-26 21:03:14'),
(7, '400.00', '0.00', '400.00', 1, 2, 1, '2021-12-26 21:57:21', '2021-12-26 21:57:22'),
(8, '270.00', '10.00', '260.00', 3, 2, 1, '2022-01-03 01:16:32', '2022-01-03 01:16:32'),
(9, '140.00', '0.00', '140.00', 1, 2, 0, '2022-01-03 01:17:40', '2022-01-03 01:18:36'),
(10, '70.00', '10.00', '60.00', 1, 2, 1, '2022-01-07 02:03:06', '2022-01-07 02:03:06'),
(11, '200.00', '5.00', '195.00', 3, 2, 1, '2022-01-07 02:03:21', '2022-01-07 02:03:21'),
(12, '140.00', '10.00', '130.00', 1, 2, 0, '2022-01-07 02:03:35', '2022-01-07 02:04:09'),
(13, '70.00', '0.00', '70.00', 1, 2, 1, '2022-01-07 22:50:48', '2022-01-07 22:50:48');

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
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id`, `nombre`, `condicion`) VALUES
(1, 'Crear Marca', 1),
(2, 'Editar Marca', 1),
(3, 'Listar Marca', 1),
(4, 'Crear Categoría', 1),
(5, 'Editar Categoría', 1),
(6, 'Listar Categoría', 1),
(7, 'Crear Material', 1),
(8, 'Listar Material', 1),
(9, 'Editar Material', 1),
(10, 'Crear Talla', 1),
(11, 'Listar Talla', 1),
(12, 'Editar Talla', 1),
(13, 'Crear Producto', 1),
(14, 'Listar Producto', 1),
(15, 'Editar Producto', 1),
(16, 'Estado del Producto', 1),
(17, 'Ver Stock del Producto', 1),
(18, 'Agregar Talla del Producto', 1),
(19, 'Listar Stock del Producto', 1),
(20, 'Editar Stock del Producto', 1),
(21, 'Crear Proveedor', 1),
(22, 'Listar Proveedor', 1),
(23, 'Editar Proveedor', 1),
(24, 'Crear Nota de Compra', 1),
(25, 'Listar Nota de Compra', 1),
(26, 'Ver Nota de Compra', 1),
(27, 'Estado de la Nota de Compra', 1),
(28, 'Crear Cliente', 1),
(29, 'Listar Cliente', 1),
(30, 'Editar Cliente', 1),
(31, 'Crear Nota de Venta', 1),
(32, 'Listar Nota de Venta', 1),
(33, 'Ver Nota de Venta', 1),
(34, 'Estado de la Nota de Venta', 1),
(35, 'Generar Recibo de Venta', 1),
(36, 'Crear Nota de Salida', 1),
(37, 'Listar Nota de Salida', 1),
(38, 'Estado de la Nota de Salida', 1),
(39, 'Ver Nota de Salida', 1),
(40, 'Listar Reporte de Compra', 1),
(41, 'Ver Reporte de Compra', 1),
(42, 'Generar Excel del Reporte de Compra', 1),
(43, 'Listar Reporte de Venta', 1),
(44, 'Ver Reporte de Venta', 1),
(45, 'Generar Recibo de Reporte de Venta', 1),
(46, 'Generar Excel del Reporte de Venta', 1),
(47, 'Crear Rol', 1),
(48, 'Listar Rol', 1),
(49, 'Estado del Rol', 1),
(50, 'Editar Rol', 1),
(51, 'Ver Permisos del Rol', 1),
(52, 'Listar Permisos del Rol', 1),
(53, 'Agregar Permisos al Rol', 1),
(54, 'Crear Usuario', 1),
(55, 'Listar Usuario', 1),
(56, 'Estado del Usuario', 1),
(57, 'Editar Usuario', 1),
(58, 'Listar Bitácora', 1),
(59, 'Ver Escritorio 1', 1),
(60, 'Ver Escritorio 2', 1),
(61, 'Crear Permiso', 1),
(62, 'Listar Permiso', 1),
(63, 'Editar Permiso', 1),
(64, 'Eliminar Permiso', 1),
(65, 'Listar Reporte de Salida', 1),
(66, 'Ver Reporte de Salida', 1),
(67, 'Generar Excel de Reporte de Salida', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ci` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `ci`, `nombre`, `sexo`, `telefono`, `direccion`) VALUES
(1, '12414590', 'Jose Fernando', 'M', '75514328', 'Av. 7 calles'),
(2, '94512377', 'Diego Hurtado', 'M', '71310964', 'Av. El Trompillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `costo` decimal(6,2) NOT NULL,
  `oferta` decimal(6,2) DEFAULT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idcategoria` bigint(20) UNSIGNED NOT NULL,
  `idmaterial` bigint(20) UNSIGNED NOT NULL,
  `idmarca` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`, `costo`, `oferta`, `descripcion`, `condicion`, `created_at`, `updated_at`, `idcategoria`, `idmaterial`, `idmarca`, `imagen`) VALUES
(1, 'Cinturón', '100.00', '45.00', '0.30', 'Cinturón negro de cuero', 1, '2021-12-23 21:53:48', '2022-01-02 19:16:28', 10, 2, 1, 'productos/1640296429.jpg'),
(2, 'Vestido Otoñal', '200.00', '90.00', '0.00', 'Vestido corto con estampado de hojas', 1, '2021-12-23 21:54:24', '2021-12-26 20:55:19', 1, 1, 3, 'productos/1640296465.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `direccion`, `telefono`, `correo`, `created_at`, `updated_at`) VALUES
(1, 'SHEIN', 'China', '75456896', 'shain@gmail.com', '2021-12-23 21:55:25', '2021-12-23 21:55:25'),
(2, 'FASHION NOVA', 'EEUU', '69855221', 'fashionNova@gmail.com', '2021-12-23 21:55:43', '2021-12-23 21:55:43'),
(3, 'Lucrecia da Silva', 'Brasil/Río de Janeiro', '75455789', 'lucrecia2importa@gmail.com', '2021-12-23 21:56:14', '2021-12-23 21:56:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `condicion`) VALUES
(1, 'Administador', 1),
(2, 'Vendedor', 1),
(3, 'Almacenero', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_permiso`
--

CREATE TABLE `rol_permiso` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idrol` bigint(20) UNSIGNED NOT NULL,
  `idpermiso` bigint(20) UNSIGNED NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol_permiso`
--

INSERT INTO `rol_permiso` (`id`, `idrol`, `idpermiso`, `condicion`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 0),
(3, 1, 2, 1),
(4, 2, 2, 0),
(5, 1, 3, 1),
(6, 2, 3, 0),
(7, 1, 4, 1),
(8, 2, 4, 0),
(9, 1, 5, 1),
(10, 2, 5, 0),
(11, 1, 6, 1),
(12, 2, 6, 0),
(13, 1, 7, 1),
(14, 2, 7, 0),
(15, 1, 8, 1),
(16, 2, 8, 0),
(17, 1, 9, 1),
(18, 2, 9, 0),
(19, 1, 10, 1),
(20, 2, 10, 0),
(21, 1, 11, 1),
(22, 2, 11, 0),
(23, 1, 12, 1),
(24, 2, 12, 0),
(25, 1, 13, 1),
(26, 2, 13, 0),
(27, 1, 14, 1),
(28, 2, 14, 0),
(29, 1, 15, 1),
(30, 2, 15, 0),
(31, 1, 16, 1),
(32, 2, 16, 0),
(33, 1, 17, 1),
(34, 2, 17, 0),
(35, 1, 18, 1),
(36, 2, 18, 0),
(37, 1, 19, 1),
(38, 2, 19, 0),
(39, 1, 20, 1),
(40, 2, 20, 0),
(41, 1, 21, 1),
(42, 2, 21, 0),
(43, 1, 22, 1),
(44, 2, 22, 0),
(45, 1, 23, 1),
(46, 2, 23, 0),
(47, 1, 24, 1),
(48, 2, 24, 0),
(49, 1, 25, 1),
(50, 2, 25, 0),
(51, 1, 26, 1),
(52, 2, 26, 0),
(53, 1, 27, 1),
(54, 2, 27, 0),
(55, 1, 28, 0),
(56, 2, 28, 1),
(57, 1, 29, 0),
(58, 2, 29, 1),
(59, 1, 30, 0),
(60, 2, 30, 1),
(61, 1, 31, 0),
(62, 2, 31, 1),
(63, 1, 32, 0),
(64, 2, 32, 1),
(65, 1, 33, 0),
(66, 2, 33, 1),
(67, 1, 34, 0),
(68, 2, 34, 1),
(69, 1, 35, 0),
(70, 2, 35, 1),
(71, 1, 36, 1),
(72, 2, 36, 0),
(73, 1, 37, 1),
(74, 2, 37, 0),
(75, 1, 38, 1),
(76, 2, 38, 0),
(77, 1, 39, 1),
(78, 2, 39, 0),
(79, 1, 40, 1),
(80, 2, 40, 0),
(81, 1, 41, 1),
(82, 2, 41, 0),
(83, 1, 42, 1),
(84, 2, 42, 0),
(85, 1, 43, 1),
(86, 2, 43, 0),
(87, 1, 44, 1),
(88, 2, 44, 0),
(89, 1, 45, 1),
(90, 2, 45, 0),
(91, 1, 46, 1),
(92, 2, 46, 0),
(93, 1, 47, 1),
(94, 2, 47, 0),
(95, 1, 48, 1),
(96, 2, 48, 0),
(97, 1, 49, 1),
(98, 2, 49, 0),
(99, 1, 50, 1),
(100, 2, 50, 0),
(101, 1, 51, 1),
(102, 2, 51, 0),
(103, 1, 52, 1),
(104, 2, 52, 0),
(105, 1, 53, 1),
(106, 2, 53, 0),
(107, 1, 54, 1),
(108, 2, 54, 0),
(109, 1, 55, 1),
(110, 2, 55, 0),
(111, 1, 56, 1),
(112, 2, 56, 0),
(113, 1, 57, 1),
(114, 2, 57, 0),
(115, 1, 58, 1),
(116, 2, 58, 0),
(117, 1, 59, 1),
(118, 2, 59, 0),
(119, 1, 60, 0),
(120, 2, 60, 1),
(121, 1, 61, 1),
(122, 2, 61, 0),
(123, 1, 62, 1),
(124, 2, 62, 0),
(125, 1, 63, 1),
(126, 2, 63, 0),
(127, 1, 64, 1),
(128, 2, 64, 0),
(129, 3, 1, 0),
(130, 3, 2, 0),
(131, 3, 3, 0),
(132, 3, 4, 0),
(133, 3, 5, 0),
(134, 3, 6, 1),
(135, 3, 7, 0),
(136, 3, 8, 0),
(137, 3, 9, 0),
(138, 3, 10, 0),
(139, 3, 11, 0),
(140, 3, 12, 0),
(141, 3, 13, 0),
(142, 3, 14, 0),
(143, 3, 15, 0),
(144, 3, 16, 0),
(145, 3, 17, 0),
(146, 3, 18, 0),
(147, 3, 19, 0),
(148, 3, 20, 0),
(149, 3, 21, 1),
(150, 3, 22, 1),
(151, 3, 23, 1),
(152, 3, 24, 1),
(153, 3, 25, 1),
(154, 3, 26, 1),
(155, 3, 27, 1),
(156, 3, 28, 0),
(157, 3, 29, 0),
(158, 3, 30, 0),
(159, 3, 31, 0),
(160, 3, 32, 0),
(161, 3, 33, 0),
(162, 3, 34, 0),
(163, 3, 35, 0),
(164, 3, 36, 0),
(165, 3, 37, 0),
(166, 3, 38, 0),
(167, 3, 39, 0),
(168, 3, 40, 0),
(169, 3, 41, 0),
(170, 3, 42, 0),
(171, 3, 43, 0),
(172, 3, 44, 0),
(173, 3, 45, 0),
(174, 3, 46, 0),
(175, 3, 47, 0),
(176, 3, 48, 0),
(177, 3, 49, 0),
(178, 3, 50, 0),
(179, 3, 51, 0),
(180, 3, 52, 0),
(181, 3, 53, 0),
(182, 3, 54, 0),
(183, 3, 55, 0),
(184, 3, 56, 0),
(185, 3, 57, 0),
(186, 3, 58, 0),
(187, 3, 59, 0),
(188, 3, 60, 1),
(189, 3, 61, 0),
(190, 3, 62, 0),
(191, 3, 63, 0),
(192, 3, 64, 0),
(193, 1, 65, 1),
(194, 1, 66, 1),
(195, 1, 67, 1),
(196, 2, 65, 0),
(197, 2, 66, 0),
(198, 2, 67, 0),
(199, 3, 65, 0),
(200, 3, 66, 0),
(201, 3, 67, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`id`, `nombre`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL'),
(7, 'UNITALLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallaproducto`
--

CREATE TABLE `tallaproducto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idproducto` bigint(20) UNSIGNED NOT NULL,
  `idtalla` bigint(20) UNSIGNED NOT NULL,
  `stock` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tallaproducto`
--

INSERT INTO `tallaproducto` (`id`, `idproducto`, `idtalla`, `stock`, `created_at`, `updated_at`, `condicion`) VALUES
(1, 1, 1, 0, '2021-12-23 21:53:48', '2022-01-07 22:50:48', 1),
(2, 1, 2, 0, '2021-12-23 21:53:48', '2022-01-02 19:16:28', 1),
(3, 1, 3, 0, '2021-12-23 21:53:48', '2022-01-02 19:16:28', 1),
(4, 1, 4, 0, '2021-12-23 21:53:48', '2022-01-02 19:16:28', 1),
(5, 1, 5, 0, '2021-12-23 21:53:48', '2022-01-02 19:16:28', 1),
(6, 1, 6, 0, '2021-12-23 21:53:48', '2022-01-02 19:16:28', 1),
(7, 1, 7, 2, '2021-12-23 21:53:48', '2022-01-10 13:52:36', 1),
(8, 2, 1, 2, '2021-12-23 21:54:24', '2022-01-10 02:10:35', 1),
(9, 2, 2, 0, '2021-12-23 21:54:24', '2021-12-26 21:57:21', 1),
(10, 2, 3, 0, '2021-12-23 21:54:24', '2022-01-07 02:03:21', 1),
(11, 2, 4, 0, '2021-12-23 21:54:24', '2021-12-27 14:44:06', 1),
(12, 2, 5, 0, '2021-12-23 21:54:24', '2021-12-27 14:44:26', 1),
(13, 2, 6, 3, '2021-12-23 21:54:24', '2022-01-10 02:10:53', 1),
(14, 2, 7, 0, '2021-12-23 21:54:24', '2021-12-27 15:04:41', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idpersonal` bigint(20) UNSIGNED NOT NULL,
  `idrol` bigint(20) UNSIGNED NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `idpersonal`, `idrol`, `condicion`, `imagen`) VALUES
(1, 'jchilelaime@gmail.com', NULL, '$2y$10$jqR8FrL8wlm4dGYAYXnise6rKxWwqPn/9OgbMqPX/zXIHhthgNHBK', NULL, NULL, '2022-01-12 02:23:50', 1, 1, 1, 'users/1641763496.jpg'),
(2, 'diegohurtado@gmail.com', NULL, '$2y$10$lhbKdZuY9jgX971ZiCIsReXbcn9eWc4qngERanR/hRuvhPK3MFODe', NULL, '2021-12-24 14:16:13', '2022-01-05 00:44:54', 2, 2, 1, 'users/1640355373.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bitacora_idusuario_foreign` (`idusuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallenotacompra`
--
ALTER TABLE `detallenotacompra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detallenotacompra_idtallaproducto_foreign` (`idtallaproducto`),
  ADD KEY `detallenotacompra_idnotacompra_foreign` (`idnotacompra`);

--
-- Indices de la tabla `detallenotasalida`
--
ALTER TABLE `detallenotasalida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detallenotasalida_idtallaproducto_foreign` (`idtallaproducto`),
  ADD KEY `detallenotasalida_idnotasalida_foreign` (`idnotasalida`);

--
-- Indices de la tabla `detallenotaventa`
--
ALTER TABLE `detallenotaventa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detallenotaventa_idtallaproducto_foreign` (`idtallaproducto`),
  ADD KEY `detallenotaventa_idnotaventa_foreign` (`idnotaventa`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notacompra`
--
ALTER TABLE `notacompra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notacompra_idproveedor_foreign` (`idproveedor`),
  ADD KEY `notacompra_idusuario_foreign` (`idusuario`);

--
-- Indices de la tabla `notasalida`
--
ALTER TABLE `notasalida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notasalida_idusuario_foreign` (`idusuario`);

--
-- Indices de la tabla `notaventa`
--
ALTER TABLE `notaventa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notaventa_idcliente_foreign` (`idcliente`),
  ADD KEY `notaventa_idusuario_foreign` (`idusuario`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_ci_unique` (`ci`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_idcategoria_foreign` (`idcategoria`),
  ADD KEY `producto_idmaterial_foreign` (`idmaterial`),
  ADD KEY `producto_idmarca_foreign` (`idmarca`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rol_nombre_unique` (`nombre`);

--
-- Indices de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_permiso_idrol_foreign` (`idrol`),
  ADD KEY `rol_permiso_idpermiso_foreign` (`idpermiso`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tallaproducto`
--
ALTER TABLE `tallaproducto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tallaproducto_idproducto_foreign` (`idproducto`),
  ADD KEY `tallaproducto_idtalla_foreign` (`idtalla`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_idpersonal_foreign` (`idpersonal`),
  ADD KEY `users_idrol_foreign` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detallenotacompra`
--
ALTER TABLE `detallenotacompra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `detallenotasalida`
--
ALTER TABLE `detallenotasalida`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detallenotaventa`
--
ALTER TABLE `detallenotaventa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `notacompra`
--
ALTER TABLE `notacompra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `notasalida`
--
ALTER TABLE `notasalida`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `notaventa`
--
ALTER TABLE `notaventa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tallaproducto`
--
ALTER TABLE `tallaproducto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `detallenotacompra`
--
ALTER TABLE `detallenotacompra`
  ADD CONSTRAINT `detallenotacompra_idnotacompra_foreign` FOREIGN KEY (`idnotacompra`) REFERENCES `notacompra` (`id`),
  ADD CONSTRAINT `detallenotacompra_idtallaproducto_foreign` FOREIGN KEY (`idtallaproducto`) REFERENCES `tallaproducto` (`id`);

--
-- Filtros para la tabla `detallenotasalida`
--
ALTER TABLE `detallenotasalida`
  ADD CONSTRAINT `detallenotasalida_idnotasalida_foreign` FOREIGN KEY (`idnotasalida`) REFERENCES `notasalida` (`id`),
  ADD CONSTRAINT `detallenotasalida_idtallaproducto_foreign` FOREIGN KEY (`idtallaproducto`) REFERENCES `tallaproducto` (`id`);

--
-- Filtros para la tabla `detallenotaventa`
--
ALTER TABLE `detallenotaventa`
  ADD CONSTRAINT `detallenotaventa_idnotaventa_foreign` FOREIGN KEY (`idnotaventa`) REFERENCES `notaventa` (`id`),
  ADD CONSTRAINT `detallenotaventa_idtallaproducto_foreign` FOREIGN KEY (`idtallaproducto`) REFERENCES `tallaproducto` (`id`);

--
-- Filtros para la tabla `notacompra`
--
ALTER TABLE `notacompra`
  ADD CONSTRAINT `notacompra_idproveedor_foreign` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`id`),
  ADD CONSTRAINT `notacompra_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `notasalida`
--
ALTER TABLE `notasalida`
  ADD CONSTRAINT `notasalida_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `notaventa`
--
ALTER TABLE `notaventa`
  ADD CONSTRAINT `notaventa_idcliente_foreign` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `notaventa_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_idcategoria_foreign` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `producto_idmarca_foreign` FOREIGN KEY (`idmarca`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `producto_idmaterial_foreign` FOREIGN KEY (`idmaterial`) REFERENCES `material` (`id`);

--
-- Filtros para la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `rol_permiso_idpermiso_foreign` FOREIGN KEY (`idpermiso`) REFERENCES `permiso` (`id`),
  ADD CONSTRAINT `rol_permiso_idrol_foreign` FOREIGN KEY (`idrol`) REFERENCES `rol` (`id`);

--
-- Filtros para la tabla `tallaproducto`
--
ALTER TABLE `tallaproducto`
  ADD CONSTRAINT `tallaproducto_idproducto_foreign` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `tallaproducto_idtalla_foreign` FOREIGN KEY (`idtalla`) REFERENCES `talla` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_idpersonal_foreign` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`id`),
  ADD CONSTRAINT `users_idrol_foreign` FOREIGN KEY (`idrol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
