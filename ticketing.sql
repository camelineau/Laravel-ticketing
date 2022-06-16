-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour ticketing
DROP DATABASE IF EXISTS `ticketing`;
CREATE DATABASE IF NOT EXISTS `ticketing` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `ticketing`;

-- Listage de la structure de la table ticketing. categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table ticketing.categories : ~4 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `parent_id`) VALUES
	(1, 'Matériel', NULL, NULL, 0),
	(2, 'Laravel', NULL, NULL, 0),
	(4, 'Clavier', '2022-06-14 19:46:00', '2022-06-14 19:46:00', 1),
	(5, 'Souris', '2022-06-14 19:57:42', '2022-06-14 19:57:42', 1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Listage de la structure de la table ticketing. comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table ticketing.comments : ~7 rows (environ)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `ticket_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'Hi', '2022-06-14 18:38:07', '2022-06-14 18:38:07'),
	(2, 2, 1, 'Bonsoir', '2022-06-14 18:51:54', '2022-06-14 18:51:54'),
	(3, 2, 1, 'Bonsoir', '2022-06-14 18:52:31', '2022-06-14 18:52:31'),
	(4, 1, 1, 'oui', '2022-06-14 18:52:50', '2022-06-14 18:52:50'),
	(5, 1, 2, 'Merci beaucoup', '2022-06-14 18:53:30', '2022-06-14 18:53:30'),
	(6, 2, 2, 'ok', '2022-06-14 18:53:54', '2022-06-14 18:53:54'),
	(7, 2, 12, 'Oui', '2022-06-16 16:35:28', '2022-06-16 16:35:28');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Listage de la structure de la table ticketing. migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table ticketing.migrations : ~6 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2022_06_14_180208_create_tickets_table', 1),
	(4, '2022_06_14_180220_create_comments_table', 1),
	(5, '2022_06_14_180231_create_categories_table', 1),
	(6, '2022_06_16_164654_create_projets_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Listage de la structure de la table ticketing. password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table ticketing.password_resets : ~1 rows (environ)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('clemenceamelineau@hotmail.fr', '$2y$10$xiqKPK4cQxC4HjZ4/OT/iOWaH0rtu.fLmNQd/hUKr2r.UHBlwufN6', '2022-06-14 18:38:25');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Listage de la structure de la table ticketing. projets
DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table ticketing.projets : ~1 rows (environ)
/*!40000 ALTER TABLE `projets` DISABLE KEYS */;
INSERT INTO `projets` (`id`, `titre`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Projet 1', 'Projet pour créer une appli web', 'Ouvert', '2022-06-16 17:13:42', '2022-06-16 17:13:42');
/*!40000 ALTER TABLE `projets` ENABLE KEYS */;

-- Listage de la structure de la table ticketing. tickets
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `ticket_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `projet_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tickets_ticket_id_unique` (`ticket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table ticketing.tickets : ~4 rows (environ)
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` (`id`, `user_id`, `category_id`, `ticket_id`, `title`, `priority`, `message`, `status`, `created_at`, `updated_at`, `projet_id`) VALUES
	(1, 2, 1, 'VRBAHWUXYG', 'Test', 'low', 'Oui', 'Fermé', '2022-06-14 18:27:13', '2022-06-14 18:39:08', 0),
	(2, 2, 1, 'BYG6UY7ZMQ', 'Test', 'low', 'oui', 'Ouvert', '2022-06-14 18:28:00', '2022-06-14 18:28:00', 0),
	(3, 2, 1, '43AXXKAQ7N', 'Non', 'low', 'Bonsoir', 'Ouvert', '2022-06-14 18:54:48', '2022-06-14 18:54:48', 0),
	(5, 2, 2, '6FQNEM6LJS', 'New ticket', 'medium', 'Y\'a des trucs qui marchent pas comme la suppression ou la modification', 'Ouvert', '2022-06-16 17:33:40', '2022-06-16 17:33:40', 1);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;

-- Listage de la structure de la table ticketing. users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(10) unsigned NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_dev` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table ticketing.users : ~3 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`, `is_dev`) VALUES
	(1, 'Admin', 'clemenceamelineau@hotmail.fr', '$2y$10$iaG2tYUMLi2idXIElxqVN.18ZTwu9KiBhVRghH4ed3xBoNLtfS1ta', 1, 'QpNNOVCiibU4HID7dkJQf6k6gW654yTJSqRbysfr7bsAup38D5lV6dMYwQy3', '2022-06-14 18:15:48', '2022-06-14 18:15:48', 0),
	(2, 'User', 'clemence.amelineau@grp-difference.com', '$2y$10$.cjr/kCBYrPY8NkeVRAtPuQ0ioENgWm2olOKlxDwohrkd64Hi3AKW', 0, 't4VvsHvoRUG9f4yvTW8M7tBsYwfiF0mxlqUoPyOstuwzP39i4ScXOB7Uton4', '2022-06-14 18:16:12', '2022-06-14 18:16:12', 0),
	(12, 'Dev', 'clemence.amelineau@etu.univ-nantes.fr', '$2y$10$rgVajaaHKVoq4d0Z1lZt1Oby4divV/BU2cWglZRd9VPUruTGtIkrm', 0, 'cphTMwWIfkwvSlw0xdUPOJB8oj99kwIQ8ph4KDvSxW99Jue4qyRLMCLEnYx8', '2022-06-16 15:42:25', '2022-06-16 15:42:25', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
