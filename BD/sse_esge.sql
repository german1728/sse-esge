-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.13-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla sse_esge.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_correo_unique` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.admins: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `correo`, `nombre`, `password`, `habilitado`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'esge@unjbg.edu.pe', 'Administrador', '$2y$10$NCFdXSmDfYAFz9RVkFhxJeyo9vc93TpNR61ObzBY4a7zTWMDm93jS', 1, NULL , NULL, '2020-12-16 23:15:48');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Volcando estructura para tabla sse_esge.contacto
CREATE TABLE IF NOT EXISTS `contacto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puesto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.contacto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;

-- Volcando estructura para tabla sse_esge.doctorado
CREATE TABLE IF NOT EXISTS `doctorado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anio_obtencion` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `preparacion_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctorado_preparacion_id_foreign` (`preparacion_id`),
  CONSTRAINT `doctorado_preparacion_id_foreign` FOREIGN KEY (`preparacion_id`) REFERENCES `preparacion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.doctorado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `doctorado` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctorado` ENABLE KEYS */;

-- Volcando estructura para tabla sse_esge.egresado
CREATE TABLE IF NOT EXISTS `egresado` (
  `matricula` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_paterno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_materno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` enum('Masculino','Femenino') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` enum('Peruana','Otra') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugar_origen` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_actual` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `preparacion_id` int(10) unsigned DEFAULT NULL,
  `primer_empleo_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`matricula`),
  KEY `egresado_preparacion_id_foreign` (`preparacion_id`),
  KEY `egresado_primer_empleo_id_foreign` (`primer_empleo_id`),
  CONSTRAINT `egresado_preparacion_id_foreign` FOREIGN KEY (`preparacion_id`) REFERENCES `preparacion` (`id`),
  CONSTRAINT `egresado_primer_empleo_id_foreign` FOREIGN KEY (`primer_empleo_id`) REFERENCES `primerempleo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.egresado: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `egresado` DISABLE KEYS */;
/*!40000 ALTER TABLE `egresado` ENABLE KEYS */;

-- Volcando estructura para tabla sse_esge.empleo
CREATE TABLE IF NOT EXISTS `empleo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empresa` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puesto_inicial` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puesto_final` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funciones` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `antiguedad` int(11) NOT NULL,
  `unidad_tiempo` enum('meses','años') COLLATE utf8mb4_unicode_ci NOT NULL,
  `egresado_matricula` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empleo_egresado_matricula_foreign` (`egresado_matricula`),
  CONSTRAINT `empleo_egresado_matricula_foreign` FOREIGN KEY (`egresado_matricula`) REFERENCES `egresado` (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.empleo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `empleo` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleo` ENABLE KEYS */;

-- Volcando estructura para tabla sse_esge.empresa
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruc` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` enum('Pública','Privada','Propia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `giro` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `distrito` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_postal` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagina_web` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `habilitada` tinyint(1) NOT NULL,
  `motivo_no_contratacion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recomendaciones` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empresa_contacto_id_foreign` (`contacto_id`),
  CONSTRAINT `empresa_contacto_id_foreign` FOREIGN KEY (`contacto_id`) REFERENCES `contacto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.empresa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Volcando estructura para tabla sse_esge.maestria
CREATE TABLE IF NOT EXISTS `maestria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anio_obtencion` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `preparacion_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `maestria_preparacion_id_foreign` (`preparacion_id`),
  CONSTRAINT `maestria_preparacion_id_foreign` FOREIGN KEY (`preparacion_id`) REFERENCES `preparacion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.maestria: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `maestria` DISABLE KEYS */;
/*!40000 ALTER TABLE `maestria` ENABLE KEYS */;

-- Volcando estructura para tabla sse_esge.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.migrations: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla sse_esge.oferta
CREATE TABLE IF NOT EXISTS `oferta` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo_empleo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrera` int(11) NOT NULL,
  `experiencia` int(11) NOT NULL,
  `salario` int(11) NOT NULL,
  `status` enum('Vacante','Ocupada','Cancelada') COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oferta_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `oferta_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.oferta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `oferta` DISABLE KEYS */;
/*!40000 ALTER TABLE `oferta` ENABLE KEYS */;

-- Volcando estructura para tabla sse_esge.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `correo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_correo_index` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla sse_esge.preparacion
CREATE TABLE IF NOT EXISTS `preparacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `carrera` int(11) NOT NULL,
  `generacion` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `promedio` double(8,2) DEFAULT NULL,
  `forma_titulacion` enum('Tesis','Artículo científico','No titulado') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_titulo` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.preparacion: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `preparacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `preparacion` ENABLE KEYS */;

-- Volcando estructura para tabla sse_esge.primerempleo
CREATE TABLE IF NOT EXISTS `primerempleo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tiempo_sin_empleo` enum('< a 6 meses','De 6 a 9 meses','De 10 a 12 meses','> a 1 año','No cuento con empleo aún') COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_empresa` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sector` enum('Pública','Privada','Propia') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `puesto_inicial` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puesto_final` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jornada` enum('Completo','Medio','Horas') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contrato` enum('Indeterminado','Eventual','Honorarios') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ingreso_mensual` enum('Menor a 1,000.00','De 1,001.00 a 2,500.00','De 2,501.00 a 5,000.00','Mayor a 5,000.00') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actividad_laboral` int(11) DEFAULT NULL,
  `factores_contratacion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carencias_basicas` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carencias_areas` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivo_no_posgrado` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recomendaciones` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.primerempleo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `primerempleo` DISABLE KEYS */;
/*!40000 ALTER TABLE `primerempleo` ENABLE KEYS */;

-- Volcando estructura para tabla sse_esge.ranking
CREATE TABLE IF NOT EXISTS `ranking` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `calificacion` int(11) NOT NULL,
  `comentario` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `egresado_matricula` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ranking_egresado_matricula_foreign` (`egresado_matricula`),
  KEY `ranking_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `ranking_egresado_matricula_foreign` FOREIGN KEY (`egresado_matricula`) REFERENCES `egresado` (`matricula`),
  CONSTRAINT `ranking_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.ranking: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `ranking` DISABLE KEYS */;
/*!40000 ALTER TABLE `ranking` ENABLE KEYS */;

-- Volcando estructura para tabla sse_esge.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `egresado_matricula` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_correo_unique` (`correo`),
  KEY `users_egresado_matricula_foreign` (`egresado_matricula`),
  CONSTRAINT `users_egresado_matricula_foreign` FOREIGN KEY (`egresado_matricula`) REFERENCES `egresado` (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sse_esge.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
