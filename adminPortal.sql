-- Adminer 4.8.1 MySQL 5.7.38-0ubuntu0.18.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) unsigned NOT NULL,
  `education_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `board` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `education` (`id`, `employee_id`, `education_name`, `percentage`, `year`, `board`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	1,	'ssc',	10,	2013,	'GSEB',	'2022-07-16 12:37:11',	'2022-07-16 12:37:11',	NULL),
(2,	1,	'graduation',	9,	2016,	'GTU',	'2022-07-16 12:37:11',	'2022-07-16 12:37:11',	NULL);

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `email`, `address`, `gender`, `age`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Manshi',	'Trivedi',	'manshi@gmail.com',	'Sola, Sciencity Road, Ahmedabad',	'female',	23,	'2022-07-16 12:37:11',	'2022-07-16 12:37:11',	NULL);

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) unsigned NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read` int(11) DEFAULT NULL,
  `write` int(11) DEFAULT NULL,
  `speak` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `language` (`id`, `employee_id`, `language`, `read`, `write`, `speak`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	1,	'hindi',	1,	1,	1,	'2022-07-16 12:37:11',	'2022-07-16 12:37:11',	NULL),
(2,	1,	'english',	1,	1,	1,	'2022-07-16 12:37:11',	'2022-07-16 12:37:11',	NULL),
(3,	1,	'gujarati',	1,	1,	1,	'2022-07-16 12:37:11',	'2022-07-16 12:37:11',	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10,	'2014_10_12_000000_create_users_table',	1),
(11,	'2014_10_12_100000_create_password_resets_table',	1),
(12,	'2019_08_19_000000_create_failed_jobs_table',	1),
(13,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(14,	'2022_07_15_160627_create_employee_table',	1),
(15,	'2022_07_15_164042_create_language_table',	1),
(16,	'2022_07_15_164141_create_education_table',	1),
(17,	'2022_07_15_164240_create_roles_table',	1),
(18,	'2022_07_15_164340_create_preference_table',	1),
(19,	'2022_07_15_164501_create_technical_experience_table',	1),
(20,	'2022_07_15_164617_create_work_experience_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `preference`;
CREATE TABLE `preference` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) unsigned NOT NULL,
  `prefered_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_ctc` int(11) DEFAULT NULL,
  `current_ctc` int(11) DEFAULT NULL,
  `notice_period` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `preference` (`id`, `employee_id`, `prefered_location`, `expected_ctc`, `current_ctc`, `notice_period`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	1,	'ahmedabad',	8,	3,	2,	'2022-07-16 12:37:12',	'2022-07-16 12:37:12',	NULL);

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'2022-07-16 05:28:23',	'2022-07-16 05:28:23'),
(2,	'employee',	'2022-07-16 05:28:23',	'2022-07-16 05:28:23');

DROP TABLE IF EXISTS `technical_experience`;
CREATE TABLE `technical_experience` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) unsigned NOT NULL,
  `language_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `technical_experience` (`id`, `employee_id`, `language_name`, `experience_level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	1,	'php',	'beginer',	'2022-07-16 12:37:11',	'2022-07-16 12:37:11',	NULL),
(2,	1,	'mysql',	'mediator',	'2022-07-16 12:37:12',	'2022-07-16 12:37:12',	NULL),
(3,	1,	'laravel',	'expert',	'2022-07-16 12:37:12',	'2022-07-16 12:37:12',	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'admin',	'admin@gmail.com',	NULL,	'$2y$10$4kKwch9arQSgS5A3e6sHb.yPViCLszgUUXV0FNUdGuAG4OGwm6xDS',	1,	NULL,	'2022-07-16 05:28:23',	'2022-07-16 05:28:23');

DROP TABLE IF EXISTS `work_experience`;
CREATE TABLE `work_experience` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) unsigned NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `work_experience` (`id`, `employee_id`, `company_name`, `designation`, `from_date`, `to_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	1,	'NeoGen infotech',	'Laravel Developer',	'2019-02-18',	'2021-02-18',	'2022-07-16 12:37:11',	'2022-07-16 12:37:31',	'2022-07-16 12:37:31'),
(2,	1,	'NeoGen infotech',	'Laravel Developer',	'2019-02-18',	'2021-02-18',	'2022-07-16 12:37:31',	'2022-07-16 12:37:31',	NULL);

-- 2022-07-16 18:08:10
