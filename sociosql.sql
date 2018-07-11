CREATE DATABASE  IF NOT EXISTS `sociodb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sociodb`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sociodb
-- ------------------------------------------------------
-- Server version	5.7.22-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Politics','2018-05-27 05:04:37','2018-05-27 05:04:37'),(2,'Banking','2018-05-27 05:04:41','2018-05-27 05:04:41'),(3,'Weekend','2018-05-27 05:04:46','2018-05-27 05:04:46'),(4,'Soccer','2018-05-27 05:04:50','2018-05-27 05:04:50'),(5,'Christianity','2018-05-27 05:05:03','2018-05-27 05:05:03'),(6,'Family','2018-05-27 05:05:10','2018-05-27 05:05:10'),(7,'Education','2018-05-27 05:05:18','2018-05-27 05:05:18'),(8,'Vacation','2018-05-27 05:05:24','2018-05-27 05:05:24'),(9,'City','2018-05-27 05:05:32','2018-05-27 05:05:32'),(10,'Nature','2018-05-27 05:05:39','2018-05-27 05:05:39'),(11,'Children','2018-05-28 20:29:03','2018-05-28 20:29:03'),(12,'Automotive','2018-05-30 02:56:26','2018-05-30 02:56:26');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `textpost_id` int(10) unsigned DEFAULT NULL,
  `picture_id` int(10) unsigned DEFAULT NULL,
  `video_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_textpost_id_foreign` (`textpost_id`),
  KEY `comments_picture_id_foreign` (`picture_id`),
  KEY `comments_video_id_foreign` (`video_id`),
  CONSTRAINT `comments_picture_id_foreign` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_textpost_id_foreign` FOREIGN KEY (`textpost_id`) REFERENCES `textposts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'2018-05-28 04:55:50','2018-05-30 03:23:28','Victory.. you are a gen. Othniel is BEST',2,NULL,NULL,10),(9,'2018-05-29 19:44:07','2018-05-29 20:23:42','..I found out the issue again. It is now FIXED',1,2,NULL,NULL),(10,'2018-05-29 19:45:53','2018-05-29 20:20:50','This is fantastic, and it is very fantastic',1,2,NULL,NULL),(11,'2018-05-29 20:26:14','2018-05-29 20:26:26','I hope all is Good NOW',1,2,NULL,NULL),(12,'2018-05-29 20:27:18','2018-05-29 20:27:18','This is the BEST Laravel app',1,2,NULL,NULL),(13,'2018-05-29 23:09:44','2018-05-29 23:09:44','The purpose of jQuery is to make it much easier to use JavaScript on your website.\r\n\r\njQuery takes a lot of common tasks that require many lines of JavaScript code to accomplish, and wraps them into methods that you can call with a single line of code.',1,2,NULL,NULL),(14,'2018-05-29 23:45:30','2018-05-29 23:45:30','It seems the authorization check is working',2,5,NULL,NULL),(15,'2018-05-30 01:03:02','2018-05-30 01:03:02','this is awesome',1,NULL,8,NULL),(16,'2018-05-30 01:03:13','2018-05-30 01:03:13','I love this app',1,NULL,8,NULL),(17,'2018-05-30 01:03:32','2018-05-30 01:03:32','keep up with the great job',1,NULL,NULL,9),(18,'2018-05-30 08:02:25','2018-05-30 08:02:25','I am posting and commenting',2,2,NULL,NULL),(19,'2018-05-30 08:13:23','2018-05-30 08:13:23','....this is funny',1,6,NULL,NULL),(20,'2018-05-30 08:16:42','2018-05-30 08:16:42','I don\'t understand',3,7,NULL,NULL),(21,'2018-05-30 08:16:54','2018-05-30 08:16:54','I prefer winter',3,6,NULL,NULL),(22,'2018-05-30 08:17:07','2018-05-30 08:17:07','Where is this from??',3,NULL,NULL,11),(23,'2018-05-30 08:17:28','2018-05-30 08:17:28','I can\'t recall the last cinema visit',3,NULL,NULL,10),(24,'2018-05-30 08:17:46','2018-05-30 08:17:46','The trial of Menka',3,NULL,NULL,9);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_05_23_015051_create_roles_table',1),(4,'2016_07_23_015518_create_role_user_table',1),(5,'2017_05_22_220138_create_categories_table',1),(6,'2018_05_22_213312_create_textposts_table',1),(7,'2018_05_25_002903_create_videos_table',1),(8,'2018_05_25_211550_create_pictures_table',1),(9,'2018_05_26_001304_create_comments_table',1);
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
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pictures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pictures_user_id_foreign` (`user_id`),
  KEY `pictures_category_id_foreign` (`category_id`),
  CONSTRAINT `pictures_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pictures_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
INSERT INTO `pictures` VALUES (8,'2018-05-29 11:03:17','2018-05-29 11:04:18','Mexico took our jobs/macron','1527577458.jpg',1,1),(9,'2018-05-30 01:25:35','2018-05-30 01:25:35','You understand politics','1527629135.jpg',1,7),(10,'2018-05-30 07:24:19','2018-05-30 07:24:19','from soccer to Lead the nation','1527650658.jpg',2,8),(11,'2018-05-30 08:03:29','2018-05-30 08:03:29','Our man in Kabul','1527653009.jpg',2,1),(12,'2018-05-30 08:16:14','2018-05-30 08:16:14','Its good to be boss','1527653773.jpeg',3,7),(13,'2018-05-30 08:19:04','2018-05-30 08:19:04','This is what africa need','1527653944.jpg',3,3);
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,'2018-05-27 00:45:00','2018-05-27 00:49:00'),(2,2,1,'2018-05-27 00:46:00','2018-05-27 00:55:00');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'ROLE_ADMIN','Admin privilege','2018-05-27 00:00:00','2018-05-27 00:30:30'),(2,'ROLE_SUPERADMIN','The super admin privilege','2018-05-27 00:10:00','2018-05-27 00:55:50');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `textposts`
--

DROP TABLE IF EXISTS `textposts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `textposts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `textposts_user_id_foreign` (`user_id`),
  KEY `textposts_category_id_foreign` (`category_id`),
  CONSTRAINT `textposts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `textposts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `textposts`
--

LOCK TABLES `textposts` WRITE;
/*!40000 ALTER TABLE `textposts` DISABLE KEYS */;
INSERT INTO `textposts` VALUES (2,'Win the next general elections in Canada, 2018','Can the libearl survive at the Federal and provincial elections?',1,6,'2018-05-27 05:07:56','2018-05-29 18:39:04'),(4,'my vid 1','http://127.0.0.1:8000/textpost',1,8,'2018-05-29 23:20:01','2018-05-29 23:20:01'),(5,'Moscow Boss 2','Will be ready today',1,10,'2018-05-29 23:20:24','2018-05-29 23:20:24'),(6,'I am chilling this summer','Your inline script tag where you call jQuery(document).ready is loaded as the page renders, therefore executed before the app.js has been loaded. Hence the error, since jQuery is not yet loaded at that time.',2,6,'2018-05-30 07:27:49','2018-05-30 07:27:49'),(7,'What is happening with edge??','?????????Your inline script tag where you call jQuery(document).ready is loaded as the page renders, therefore executed before the app.js has been loaded. Hence the error, since jQuery is not yet loaded at that time.',1,1,'2018-05-30 07:29:42','2018-05-30 07:29:42');
/*!40000 ALTER TABLE `textposts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Victory','Khan','1527382746.jpg','nkwetikhan','nkwetikhan@gmail.com','$2y$10$c9AMv4CGlMh75AlF2cVaQeA4oeKSpFF6A1qhLXJ.FWyOJGsF5RfeC','za989JvWoacEv50qNYJTcC7zuDH6YIZdqLi51NGVorkq9s6jhxSQyPwhg7HA','2018-05-27 04:58:50','2018-05-27 04:59:06'),(2,'Nathan','Achu','1527387523.jpg','nathanachu','nathan@trios.com','$2y$10$mfFGQFR0AQPQ4y4GfsZ1ReSzoc3JtBHrwxqiBkvN1To8984XOvmye','kgNTavFOPKkXKQqjV0PUbgBpueRGQDjJq3Xsu7WZ8e4inKlAkdQWnF9FcU9v','2018-05-27 06:18:32','2018-05-27 06:18:43'),(3,'George','Weah','1527653740.jpg','gweah','gweah@liberia.lb','$2y$10$0ZbFjkr3N2AZR7yvrqT1MeGDtIRCDjV4dvSiw0yq/Tpon5TKA6ore','M1OcbJZsmyxqVa8tRsbW90Yri605cl3wrfVXgnKrFtFeF3qk9f1exhNQAQ5T','2018-05-30 08:15:27','2018-05-30 08:15:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `myvid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `videos_user_id_foreign` (`user_id`),
  KEY `videos_category_id_foreign` (`category_id`),
  CONSTRAINT `videos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (9,'2018-05-28 04:52:14','2018-05-28 04:52:14','trial','1527468734.mp4',2,3),(10,'2018-05-28 04:55:32','2018-05-28 04:55:32','my vid 3','1527468932.mp4',2,1),(11,'2018-05-30 02:24:51','2018-05-30 02:35:19','Certify the chevy Malibu today and now|||','1527633319.mp4',1,11);
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-04 23:54:06
