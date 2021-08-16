-- MySQL dump 10.19  Distrib 10.3.31-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pos
-- ------------------------------------------------------
-- Server version	10.3.31-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorias_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'CLASS AA','2021-08-11 16:22:03','2021-08-11 16:22:03'),(2,'CLASS A','2021-08-11 16:22:23','2021-08-11 16:22:23'),(3,'CLASS B','2021-08-11 16:22:45','2021-08-11 16:22:45');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empresa` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cedula` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_cliente` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_cedula_unique` (`cedula`),
  UNIQUE KEY `clientes_correo_unique` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'JUAN','DELA CRUZ','BROOKSIDE','123456','juandelacruz@gmail.com','0917895444','CLIENTE','Dau,','1','2021-08-11 16:54:08','2021-08-11 16:54:08'),(2,'JOSE','RIZAL','PFC','56789','joserizal@gmail.com','09237458974','CLIENTE',NULL,'1','2021-08-11 17:05:44','2021-08-11 17:05:44'),(5,'JOHN','DOE','PLDT','100001','johndoe@gmail.com','09789567498','CLIENTE','Tarlac','1','2021-08-13 14:00:35','2021-08-13 14:00:35'),(6,'TONY','STARK','NONE','100002','tonystark@gmail.com','09225648789','CLIENTE','Angeles City, Pampanga','1','2021-08-13 14:02:02','2021-08-13 14:02:02'),(7,'PETER','PARKER','CONVERGE ICT','100003','peterparker@gmail.com','09658945678','CLIENTE','Bataan','1','2021-08-13 14:03:57','2021-08-13 14:03:57');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_empresa` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moneda` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tributo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idioma` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'es',
  `recuperar_clave_login` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registro_usuario_login` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracion`
--

LOCK TABLES `configuracion` WRITE;
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
INSERT INTO `configuracion` VALUES (1,'EGG STORE','BUROT','Inventory, POS & Stock Control','1','000000000','eggstore@bfcgroup.org','PHP','Inactivo','en','off','off',NULL,NULL,NULL);
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `database_backups`
--

DROP TABLE IF EXISTS `database_backups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `database_backups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `database_backups`
--

LOCK TABLES `database_backups` WRITE;
/*!40000 ALTER TABLE `database_backups` DISABLE KEYS */;
/*!40000 ALTER TABLE `database_backups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleprocesos`
--

DROP TABLE IF EXISTS `detalleprocesos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleprocesos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_proceso` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proceso_id` int(10) unsigned DEFAULT NULL,
  `producto_id` int(10) unsigned DEFAULT NULL,
  `tributo_id` int(10) unsigned DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` double(30,2) NOT NULL,
  `costo_publico_vendido` double(30,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalleprocesos_proceso_id_foreign` (`proceso_id`),
  KEY `detalleprocesos_producto_id_foreign` (`producto_id`),
  KEY `detalleprocesos_tributo_id_foreign` (`tributo_id`),
  CONSTRAINT `detalleprocesos_proceso_id_foreign` FOREIGN KEY (`proceso_id`) REFERENCES `posprocesos` (`id`) ON DELETE SET NULL,
  CONSTRAINT `detalleprocesos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE SET NULL,
  CONSTRAINT `detalleprocesos_tributo_id_foreign` FOREIGN KEY (`tributo_id`) REFERENCES `tributos` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleprocesos`
--

LOCK TABLES `detalleprocesos` WRITE;
/*!40000 ALTER TABLE `detalleprocesos` DISABLE KEYS */;
INSERT INTO `detalleprocesos` VALUES (1,'202108-1',1,3,1,6,900.00,150.00,'2021-08-12 17:21:16','2021-08-12 17:21:16'),(2,'202108-1',1,1,1,1,1200.00,1200.00,'2021-08-12 17:21:16','2021-08-12 17:21:16'),(3,'202108-1',1,2,1,1,5100.00,5100.00,'2021-08-12 17:21:16','2021-08-12 17:21:16'),(4,'202108-2',2,3,1,4,600.00,150.00,'2021-08-13 10:36:00','2021-08-13 10:36:00'),(5,'202108-3',3,3,1,5,750.00,150.00,'2021-08-13 10:53:41','2021-08-13 10:53:41'),(6,'202108-4',4,9,1,5,450.00,90.00,'2021-08-13 14:17:25','2021-08-13 14:17:25'),(7,'202108-5',5,3,1,5,750.00,150.00,'2021-08-16 08:50:11','2021-08-16 08:50:11');
/*!40000 ALTER TABLE `detalleprocesos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gastos`
--

DROP TABLE IF EXISTS `gastos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gastos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `monto` double(30,2) NOT NULL,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `codigo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `concepto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gastos_usuario_id_foreign` (`usuario_id`),
  CONSTRAINT `gastos_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gastos`
--

LOCK TABLES `gastos` WRITE;
/*!40000 ALTER TABLE `gastos` DISABLE KEYS */;
/*!40000 ALTER TABLE `gastos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_identification` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'Poultry Pure Corporation Egg Room','PFCER',NULL,NULL,1,'2021-08-16 13:11:02','2021-08-16 13:11:02'),(2,'Hatchery Farm','HATFARM',NULL,NULL,1,'2021-08-16 13:11:24','2021-08-16 13:11:24');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2017_10_30_172246_create_roles_table',1),(3,'2017_10_30_1727700_create_users_table',1),(4,'2018_01_12_155600_create_configuracion_table',1),(5,'2018_01_12_161354_create_permisos_table',1),(6,'2018_09_29_163518_create_resetpassword_table',1),(7,'2018_12_30_231947_create_categorias_table',1),(8,'2018_12_31_155629_create_subcategorias_table',1),(9,'2019_01_01_145654_create_tributos_table',1),(10,'2019_01_01_152127_create_clientes_table',1),(11,'2019_01_03_145311_create_unit_of_measurements_table',1),(12,'2019_01_03_145312_create_productos_table',1),(13,'2019_01_06_172327_create_posprocesos_table',1),(14,'2019_01_06_194705_create_detalleprocesos_table',1),(15,'2019_01_11_021339_create_temporales_table',1),(16,'2019_02_04_210017_create_gastos_table',1),(17,'2019_08_19_000000_create_failed_jobs_table',1),(18,'2021_08_09_085832_create_locations_table',1),(19,'2021_08_09_090110_create_transfers_table',1),(20,'2021_08_12_154248_create_database_backups_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catego_i` int(11) NOT NULL DEFAULT 0,
  `catego_r` int(11) NOT NULL DEFAULT 0,
  `catego_e` int(11) NOT NULL DEFAULT 0,
  `catego_b` int(11) NOT NULL DEFAULT 0,
  `subcatego_i` int(11) NOT NULL DEFAULT 0,
  `subcatego_r` int(11) NOT NULL DEFAULT 0,
  `subcatego_e` int(11) NOT NULL DEFAULT 0,
  `subcatego_b` int(11) NOT NULL DEFAULT 0,
  `producto_i` int(11) NOT NULL DEFAULT 0,
  `producto_r` int(11) NOT NULL DEFAULT 0,
  `producto_e` int(11) NOT NULL DEFAULT 0,
  `producto_b` int(11) NOT NULL DEFAULT 0,
  `gasto_i` int(11) NOT NULL DEFAULT 0,
  `gasto_r` int(11) NOT NULL DEFAULT 0,
  `gasto_e` int(11) NOT NULL DEFAULT 0,
  `gasto_b` int(11) NOT NULL DEFAULT 0,
  `kardex_i` int(11) NOT NULL DEFAULT 0,
  `venta_i` int(11) NOT NULL DEFAULT 0,
  `venta_r` int(11) NOT NULL DEFAULT 0,
  `compra_i` int(11) NOT NULL DEFAULT 0,
  `compra_r` int(11) NOT NULL DEFAULT 0,
  `persona_i` int(11) NOT NULL DEFAULT 0,
  `reporte_i` int(11) NOT NULL DEFAULT 0,
  `rol_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permisos_rol_id_foreign` (`rol_id`),
  CONSTRAINT `permisos_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,NULL,NULL),(2,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,NULL,NULL),(3,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,3,NULL,NULL);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posprocesos`
--

DROP TABLE IF EXISTS `posprocesos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posprocesos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_proceso` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_id` int(10) unsigned DEFAULT NULL,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `subtotal` double(30,2) NOT NULL,
  `descuento` int(11) NOT NULL,
  `total` double(30,2) NOT NULL,
  `tipo_pago` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items_totales` int(11) NOT NULL,
  `registros_totales` int(11) NOT NULL,
  `comentario` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_proceso` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivo_rechazo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posprocesos_cliente_id_foreign` (`cliente_id`),
  KEY `posprocesos_usuario_id_foreign` (`usuario_id`),
  CONSTRAINT `posprocesos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `posprocesos_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posprocesos`
--

LOCK TABLES `posprocesos` WRITE;
/*!40000 ALTER TABLE `posprocesos` DISABLE KEYS */;
INSERT INTO `posprocesos` VALUES (1,'202108-1',1,2,7200.00,0,7200.00,'cash',8,3,'Sales completed.','Sales',NULL,'2','2021-08-12 17:21:16','2021-08-12 17:21:16'),(2,'202108-2',1,2,600.00,0,600.00,'cash',4,1,NULL,'Sales',NULL,'2','2021-08-13 10:36:00','2021-08-13 10:36:00'),(3,'202108-3',2,2,750.00,0,750.00,'cash',5,1,NULL,'Sales',NULL,'2','2021-08-13 10:53:41','2021-08-13 10:53:41'),(4,'202108-4',7,2,450.00,0,450.00,'debit_card',5,1,'No cash available on hand.','Sales',NULL,'2','2021-08-13 14:17:25','2021-08-13 14:17:25'),(5,'202108-5',5,2,750.00,0,750.00,'cash',5,1,'Cash payment.','Sales',NULL,'2','2021-08-16 08:50:11','2021-08-16 08:50:11');
/*!40000 ALTER TABLE `posprocesos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` int(10) unsigned DEFAULT NULL,
  `subcategoria_id` int(10) unsigned DEFAULT NULL,
  `unit_of_measurement_id` bigint(20) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio_costo` double(30,2) DEFAULT NULL,
  `precio_publico` double(30,2) DEFAULT NULL,
  `tributo_id` int(10) unsigned DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `productos_codigo_unique` (`codigo`),
  KEY `productos_categoria_id_foreign` (`categoria_id`),
  KEY `productos_subcategoria_id_foreign` (`subcategoria_id`),
  KEY `productos_tributo_id_foreign` (`tributo_id`),
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE SET NULL,
  CONSTRAINT `productos_subcategoria_id_foreign` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategorias` (`id`) ON DELETE SET NULL,
  CONSTRAINT `productos_tributo_id_foreign` FOREIGN KEY (`tributo_id`) REFERENCES `tributos` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'WHITE EGG','000001',1,1,1,4,'Description',1200.00,1200.00,1,'1','611602b6ab451.png','2021-08-11 16:25:09','2021-08-13 13:27:18'),(2,'WHITE EGG','000002',2,2,2,0,'Description',5000.00,5100.00,1,'1','','2021-08-11 16:27:30','2021-08-12 17:21:16'),(3,'WHITE EGG','000003',3,3,1,80,NULL,150.00,150.00,1,'1','','2021-08-12 09:44:54','2021-08-16 08:50:11'),(8,'WHITE CLASS B MEDIUM SIZE EGG','000004',3,15,2,650,'Description',105.00,105.00,1,'1','','2021-08-13 13:52:53','2021-08-16 13:19:12'),(9,'WHITE CLASS B SMALL SIZE EGG','000005',3,16,2,30,'Description',90.00,90.00,1,'1','','2021-08-13 14:11:06','2021-08-13 14:17:25');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resetpassword`
--

DROP TABLE IF EXISTS `resetpassword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resetpassword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `correo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resetpassword_user_id_foreign` (`user_id`),
  CONSTRAINT `resetpassword_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resetpassword`
--

LOCK TABLES `resetpassword` WRITE;
/*!40000 ALTER TABLE `resetpassword` DISABLE KEYS */;
/*!40000 ALTER TABLE `resetpassword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'SUPERADMIN','1',NULL,NULL),(2,'ADMINISTRADOR','1',NULL,NULL),(3,'User','1',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategorias`
--

DROP TABLE IF EXISTS `subcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` int(10) unsigned DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategorias_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `subcategorias_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategorias`
--

LOCK TABLES `subcategorias` WRITE;
/*!40000 ALTER TABLE `subcategorias` DISABLE KEYS */;
INSERT INTO `subcategorias` VALUES (1,1,'EXTRA LARGE','2021-08-11 16:23:20','2021-08-11 16:23:20'),(2,2,'EXTRA LARGE','2021-08-11 16:23:32','2021-08-11 16:23:32'),(3,3,'EXTRA LARGE','2021-08-11 16:23:51','2021-08-11 16:23:51'),(7,1,'JUMBO','2021-08-13 13:31:00','2021-08-13 13:31:00'),(8,1,'LARGE','2021-08-13 13:31:09','2021-08-13 13:31:09'),(9,1,'MEDIUM','2021-08-13 13:31:20','2021-08-13 13:31:20'),(10,1,'SMALL','2021-08-13 13:33:31','2021-08-13 13:33:31'),(11,2,'SMALL','2021-08-13 13:33:45','2021-08-13 13:33:45'),(12,2,'EXTRA SMALL','2021-08-13 13:34:01','2021-08-13 13:34:01'),(13,3,'JUMBO','2021-08-13 13:34:46','2021-08-13 13:34:46'),(14,3,'LARGE','2021-08-13 13:35:42','2021-08-13 13:35:42'),(15,3,'MEDIUM','2021-08-13 13:38:01','2021-08-13 13:38:01'),(16,3,'SMALL','2021-08-13 13:38:09','2021-08-13 13:38:09'),(17,3,'PEWEE','2021-08-13 13:38:25','2021-08-13 13:38:25');
/*!40000 ALTER TABLE `subcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporales`
--

DROP TABLE IF EXISTS `temporales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temporales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` int(10) unsigned DEFAULT NULL,
  `tributo_id` int(10) unsigned DEFAULT NULL,
  `usuario_id` int(10) unsigned DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subtotal` double(30,2) DEFAULT NULL,
  `tipo_proceso` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `temporales_usuario_id_foreign` (`usuario_id`),
  KEY `temporales_producto_id_foreign` (`producto_id`),
  KEY `temporales_tributo_id_foreign` (`tributo_id`),
  CONSTRAINT `temporales_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE SET NULL,
  CONSTRAINT `temporales_tributo_id_foreign` FOREIGN KEY (`tributo_id`) REFERENCES `tributos` (`id`) ON DELETE SET NULL,
  CONSTRAINT `temporales_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporales`
--

LOCK TABLES `temporales` WRITE;
/*!40000 ALTER TABLE `temporales` DISABLE KEYS */;
INSERT INTO `temporales` VALUES (13,3,1,1,1,150.00,'Sales','2021-08-16 13:33:12','2021-08-16 13:33:12');
/*!40000 ALTER TABLE `temporales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfers`
--

DROP TABLE IF EXISTS `transfers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `reference_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_by` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfers`
--

LOCK TABLES `transfers` WRITE;
/*!40000 ALTER TABLE `transfers` DISABLE KEYS */;
INSERT INTO `transfers` VALUES (1,1,8,500,'0821-00001','2021-08-16',NULL,'Delivery',NULL,NULL,'2021-08-16 13:12:28','2021-08-16 13:12:28'),(2,1,8,100,'0821-00002','2021-08-16',NULL,NULL,NULL,NULL,'2021-08-16 13:19:12','2021-08-16 13:19:12');
/*!40000 ALTER TABLE `transfers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tributos`
--

DROP TABLE IF EXISTS `tributos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tributos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PORCENTAJE',
  `monto` double(30,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tributos`
--

LOCK TABLES `tributos` WRITE;
/*!40000 ALTER TABLE `tributos` DISABLE KEYS */;
INSERT INTO `tributos` VALUES (1,'Tax Free','Percentage',0.00,NULL,NULL);
/*!40000 ALTER TABLE `tributos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit_of_measurements`
--

DROP TABLE IF EXISTS `unit_of_measurements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit_of_measurements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unit_of_measurements_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit_of_measurements`
--

LOCK TABLES `unit_of_measurements` WRITE;
/*!40000 ALTER TABLE `unit_of_measurements` DISABLE KEYS */;
INSERT INTO `unit_of_measurements` VALUES (1,'TRAY','TRAY','30 pcs = 1 Tray',1,NULL,NULL),(2,'CASE','CASE','12 Tray = 1 Case',1,NULL,NULL),(3,'DOZEN','DOZEN','12 pcs = 1 Dozen',1,NULL,NULL),(4,'Piece(s)','PCS','1 Egg',1,NULL,NULL);
/*!40000 ALTER TABLE `unit_of_measurements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol_id` int(10) unsigned DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_cedula_unique` (`cedula`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_rol_id_foreign` (`rol_id`),
  CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Adam','Super Admin','12345678','adam@adam.com','M','+000000000','SUPER ADMIN',NULL,1,'1','$2y$10$8oADbPzUsLKgGf3CUCE9Eu3MPTLoiaiqnvW3C6Kh7QBCI.fFH17ju',NULL,NULL,NULL),(2,'ADMIN','ADMIN','00000000','admin@admin.com','M','0000','0000',NULL,2,'1','$2y$10$TkV859PVXn0ackIw/hikEOEqUu7Jlk7yNRQmdEhI9UlPm1uppdig.',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-16 15:44:50
