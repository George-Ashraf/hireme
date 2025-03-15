-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: hireme
-- ------------------------------------------------------
-- Server version	8.0.41-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('Pending','Approved') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `job_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `job_id` (`job_id`),
  CONSTRAINT `application_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `application_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applications`
--

LOCK TABLES `applications` WRITE;
/*!40000 ALTER TABLE `applications` DISABLE KEYS */;
INSERT INTO `applications` VALUES (1,'Pending',1,4,'2025-03-13 12:40:35','2025-03-13 12:40:35'),(2,'Approved',2,5,'2025-03-13 12:40:35','2025-03-13 12:40:35'),(3,'Pending',1,6,'2025-03-13 12:40:35','2025-03-13 12:40:35'),(4,'Approved',2,7,'2025-03-13 12:40:35','2025-03-13 12:40:35'),(5,'Pending',1,8,'2025-03-13 12:40:35','2025-03-13 12:40:35'),(6,'Approved',2,12,'2025-03-13 12:40:35','2025-03-13 12:40:35'),(7,'Pending',1,13,'2025-03-13 12:40:35','2025-03-13 12:40:35'),(8,'Approved',2,1,'2025-03-13 12:40:35','2025-03-13 12:40:35'),(9,'Pending',1,9,'2025-03-13 12:40:35','2025-03-13 12:40:35'),(10,'Approved',2,10,'2025-03-13 12:40:35','2025-03-13 12:40:35');
/*!40000 ALTER TABLE `applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('iman.elsebei@gmail.com|127.0.0.1','i:1;',1741733964),('iman.elsebei@gmail.com|127.0.0.1:timer','i:1741733964;',1741733964);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Customer Services','fa-solid fa-headset','2025-03-11 20:42:48','2025-03-12 15:34:21'),(2,'Marketing','fa-solid fa-shop','2025-03-11 20:42:58','2025-03-12 15:29:18'),(3,'Business Development','fa-solid fa-laptop-code','2025-03-11 20:43:23','2025-03-12 15:32:36');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'heyyyyyyyyyyyyyy from comment',5,'App\\Models\\Post',1,'2025-03-11 20:11:14','2025-03-11 20:11:14'),(2,'heyyyyyyyyyyyyyy from comment',5,'App\\Models\\Post',1,'2025-03-11 20:11:56','2025-03-11 20:11:56'),(3,'heyyy',7,'App\\Models\\Post',1,'2025-03-11 20:53:54','2025-03-11 20:53:54'),(4,'hey',1,'App\\Models\\Post',4,'2025-03-12 01:23:08','2025-03-12 01:23:08'),(5,'ana mesh iman',1,'App\\Models\\Post',4,'2025-03-12 02:08:38','2025-03-12 02:08:38'),(6,'ana mohamed',11,'App\\Models\\Post',4,'2025-03-12 02:09:21','2025-03-12 02:09:21'),(7,'wallahy ana mohamed',7,'App\\Models\\Post',4,'2025-03-12 02:10:55','2025-03-12 02:10:55'),(8,'hey i am omar i want to apply',7,'App\\Models\\Post',2,'2025-03-12 14:01:34','2025-03-12 14:01:34'),(9,'omer benim adim',12,'App\\Models\\Post',2,'2025-03-12 15:08:47','2025-03-12 15:08:47'),(10,'tamam omar',12,'App\\Models\\Post',1,'2025-03-12 15:17:36','2025-03-12 15:17:36'),(11,'aaaaaaaaaaaaaa',1,'App\\Models\\Post',2,'2025-03-13 11:49:12','2025-03-13 11:49:12'),(12,'heyyyyyy',11,'App\\Models\\Post',5,'2025-03-13 11:56:19','2025-03-13 11:56:19');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_03_09_214816_create_applications_table',1),(5,'2025_03_09_214816_create_categories_table',1),(6,'2025_03_09_214816_create_posts_table',1),(7,'2025_03_09_214819_add_foreign_keys_to_applications_table',1),(8,'2025_03_09_214819_add_foreign_keys_to_posts_table',1),(9,'2025_03_11_214636_create_comments_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `skills` text COLLATE utf8mb4_unicode_ci,
  `salary` decimal(10,2) DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_type` enum('Remote','Hybrid','Onsite') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Pending','Published') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsibility` text COLLATE utf8mb4_unicode_ci,
  `qualification` text COLLATE utf8mb4_unicode_ci,
  `benefits` text COLLATE utf8mb4_unicode_ci,
  `experience_level` enum('Junior','Mid_level','Senior') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closed_date` date DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Marketing Manager Marketing Manager Marketing Manager Marketing Manager Marketing Manager',450000.00,'Marketing Manager','Cairo, Egypt','Onsite','Marketing Manager Marketing Manager Marketing Manager Marketing Manager','Published','posts/QUOIqJWmiS8DxnwKeAM95IVvtDtiycWBhsNWNjc1.jpg','Marketing Manager Marketing Manager Marketing Manager Marketing Manager Marketing Manager','Marketing Manager Marketing Manager Marketing Manager Marketing Manager Marketing Manager Marketing Manager','Marketing Manager Marketing Manager Marketing Manager','Mid_level','2025-03-29',2,1,'2025-03-11 18:51:01','2025-03-12 15:56:57'),(2,'Wordpress Developer\r\n Wordpress Developer',260000.00,'Wordpress Developer','New Yourk, America','Remote','Wordpress Developer Wordpress Developer Wordpress Developer Wordpress Developer','Published','posts/jDqG3AANZ0hXvFLmiQkajEnpIq6IwO069jvr3cWI.jpg','Wordpress Developer\r\n Wordpress Developer\r\n Wordpress Developer','Wordpress Developer\r\n Wordpress Developer\r\n Wordpress Developer','Wordpress Developer\r\n Wordpress Developer\r\n Wordpress Developer','Junior','2025-03-21',3,1,'2025-03-11 19:08:29','2025-03-12 15:56:57'),(4,'</x-app-layout>',12000.00,'Teacher','Alex, Egypt','Hybrid','company company company company','Published','posts/hqwBDMfOWN9i8P5bn0kco7u7mORp8Jjpnf4rgCp1.jpg','</x-app-layout>','</x-app-layout>','</x-app-layout>','Junior','2025-03-22',1,1,'2025-03-11 19:42:10','2025-03-12 15:56:57'),(5,'Teacher1, Teacher1, Teacher1, Teacher1, Teacher1,Teacher1',122222.00,'Teacher1','Alex, Egypt','Hybrid','Teacher1','Published','posts/rcTsKRJjMK3e9yoydrEHWc5DO2R1Flca4deSczW4.jpg','Teacher1Teacher1Teacher1Teacher1Teacher1Teacher1Teacher1','Teacher1Teacher1Teacher1Teacher1Teacher1Teacher1','Teacher1Teacher1Teacher1','Senior','2025-03-27',1,1,'2025-03-11 20:06:55','2025-03-12 15:56:57'),(6,'return to_route(\"post.show\",[\"post\"=>$post]);',1234.00,'Teacher2','Alex, Egypt','Hybrid','Teacher2','Published','posts/ODQ3rmTK8sxWYrrt9XHY0Lt831VlKytPnVFjPOhZ.jpg','return to_route(\"post.show\",[\"post\"=>$post]);','return to_route(\"post.show\",[\"post\"=>$post]);\r\n        return to_route(\"post.show\",[\"post\"=>$post]);','return to_route(\"post.show\",[\"post\"=>$post]);','Mid_level','2025-03-20',1,1,'2025-03-11 20:45:35','2025-03-12 15:56:57'),(7,'Teacher33333333333',120000.00,'Instructor','Alex, Egypt','Remote','Teacher33333333333','Published','posts/fm7XOq5Ke0a8BNAcb4uSxo0IrrvOVHgd18GMZQgD.jpg','Teacher33333333333','Teacher33333333333','Teacher33333333333','Mid_level','2025-03-28',1,1,'2025-03-11 20:49:19','2025-03-12 15:19:36'),(8,'Teacher2222',12345.00,'Teacher2222','New Yourk, America','Remote','Teacher2222','Published','posts/cPgtHZ5SK64fXRN8vciyreP0FUlOBf7l6qrdXxDK.jpg','Teacher2222','Teacher2222','Teacher2222','Junior','2025-03-29',1,1,'2025-03-11 20:51:06','2025-03-12 15:56:57'),(9,'Teacher25555 Teacher25555 Teacher25555',30000.00,'Teacher25555','Teacher25555','Remote','Teacher25555','Published','posts/N7q83S1yMUYqC2woCWh3nmW5NvCx852DbNb7HJ8u.jpg','Teacher25555 Teacher25555 Teacher25555','Teacher25555, Teacher25555, Teacher25555,','Teacher25555, Teacher25555','Junior','2025-03-14',2,1,'2025-03-11 21:03:15','2025-03-12 15:56:57'),(10,'Asperiores rerum iru',12000.00,'Teacher2333344','At dolore ratione ut','Hybrid','Teacher2333344','Published','posts/dzWHGCNkoymeIainbreSaIIZ4LoVIafAWDXJ06S6.jpg','Dolorum architecto c','Occaecat numquam ali','Temporibus excepturi','Mid_level','2025-12-19',2,1,'2025-03-12 01:42:52','2025-03-12 15:56:57'),(11,'Eum et dolorem enim',9900.00,'Dolore est sunt et','Minus adipisicing es','Onsite','Dolore ipsa minim v','Published',NULL,'Magnam cupidatat pra','Culpa fugiat exerc','Quod numquam quisqua','Senior','2025-11-19',3,4,'2025-03-12 01:44:10','2025-03-12 15:56:57'),(12,'Debitis facere quod',45.00,'Sed tempor deserunt','Voluptate velit exce','Hybrid','Totam iusto quasi il','Published','posts/tPRxAT5s9gRElp11gcnJfkpjA10N50JDjnFxxbXq.jpg','Cum autem reprehende','Illo beatae laudanti','Sequi quia ullam min','Senior','2026-11-13',1,4,'2025-03-12 01:46:42','2025-03-12 15:56:57'),(13,'new job,new job,new job,new job',3400.00,'new job','New Yourk, America','Remote','new job new job new job new jobnew job new job','Pending','posts/LE0hkBhQP60Rz2ODP8xeFok35aT1GA37KaiZnZXk.jpg','new job new job new job new job new job new job','new job new job new job','new job new job','Senior','2025-03-21',1,1,'2025-03-12 14:05:56','2025-03-12 14:05:56');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('wO4iKIA1bnnNeiEyDlQ08Q8o7ynp3IO3egvpE48A',5,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaHl3dlVDWm01ZG81TTNDVGliMkJPNFdGMzdQQUdjV0VOdVZjaVdWOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wb3N0LzExIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9',1741874180);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','employer','candidate') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'candidate',
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'iman','iman@gmail.com',NULL,'$2y$12$lAft7.UW/Aa2iz5v9LeRJeFWBE8YyCMUH11zK0QnX/8gOARgCkE2a','ITI',NULL,'employer','0101234567',NULL,NULL,'2025-03-11 18:31:51','2025-03-11 18:31:51'),(2,'Omar mohamed Sallam','omar@gmail.com',NULL,'$2y$12$kI2O4gKkBBbC/L0oJwO2CuELMoVEs9t2l/bFe5a9W9fRZqKJ3d7Pq',NULL,'profiles/xuCaBWy1fdBLbGG5lOYr06bn87vjFWWc8pWjFXA8.jpg','candidate','01012345678',NULL,NULL,'2025-03-11 21:27:01','2025-03-11 21:27:01'),(3,'Ahmed Ali','ahmed@gmail.com',NULL,'$2y$12$J3/0w8RD/L7yaTxlIbwADuuSwKi7MAsarglvhSEn.rmhA1LE1m1Ka',NULL,'profiles/9V4YOb08SnawMlAADAs8b4aGIn2vWrHOC18nVOvQ.jpg','candidate','010123456789',NULL,NULL,'2025-03-11 23:13:02','2025-03-11 23:13:02'),(4,'mohamed','mohamed@gmail.com',NULL,'$2y$12$fIlA9CoRG44wMlZeaM4szeVAKcJiwAHwabFmZ9HRovjARwFjmNzre','Nile','profiles/0mIytVpyuDpav6NVF7QuMpnTmhJiljcDAqQZOBkD.jpg','employer','010123456',NULL,NULL,'2025-03-12 00:30:28','2025-03-12 00:30:28'),(5,'farah','farah@gmail.com',NULL,'$2y$12$poV8.8Yf.iT.PCkw56V08uaDDKO7u.FVH/1G3qU3Hk6P.NfxX4fyS',NULL,'profiles/VaCRWtSypvqn5ij0H9dMg3TRh6kxDRvUAEpwFuyY.jpg','candidate','01011111111111','resumes/GbudUpXDj9Jzj1ImoDBo58krQtxswcAkLcPW5oxr.pdf',NULL,'2025-03-13 11:55:01','2025-03-13 11:55:01');
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

-- Dump completed on 2025-03-13 15:59:22
