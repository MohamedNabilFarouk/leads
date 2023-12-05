-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2023 at 09:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activites`
--

CREATE TABLE `activites` (
  `id` bigint UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `status` int DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activites`
--

INSERT INTO `activites` (`id`, `page_name`, `description`, `description_ar`, `status`, `link`, `created_at`, `updated_at`) VALUES
(1, 'employee', 'New Employee test sales Is Added.', 'موظف جديد test sales تم اضافته ', NULL, '/employees', '2023-11-23 12:34:48', '2023-11-23 12:34:48'),
(2, 'Project', 'COMP 1 created New Project test & Assign You ', 'COMP 1 created New Project test & Assign You ', NULL, '/project/eyJpdiI6Imd0Q0RhMlVuYjhwWVREeHI5WlNkdnc9PSIsInZhbHVlIjoiYjg1UlV5akE0aHc1c20vbE9pN1VPUT09IiwibWFjIjoiYzAzYzZjOWUyZTViMGQ4NzgyZDEyYWYxYmNhNWQ3YzA0MDlhYTYzOTc0OTQ1Nzc4NmRjNjg5Nzg1MzFjZTAyYiIsInRhZyI6IiJ9', '2023-11-27 10:44:51', '2023-11-27 10:44:51'),
(3, 'Project', 'COMP 1 created New Project test 2 & Assign You ', 'COMP 1 created New Project test 2 & Assign You ', NULL, '/project/eyJpdiI6ImtUSW9KZyt4UnA5V1lnQUdsaWRDRHc9PSIsInZhbHVlIjoieU5WU2IvTnpWZHZGWTFHcElZaGI2UT09IiwibWFjIjoiYjE4NmIxMjYyZTEyYTMzNDM2YTdiZWI4YWRhOTdjMmM2N2Y1YTY4YTBkNmQ2ODQwYzEwOTY4ZTZhZWM4NTBkOSIsInRhZyI6IiJ9', '2023-11-27 11:08:42', '2023-11-27 11:08:42'),
(4, 'Project', 'COMP 1 created New Project test 2 & Assign You ', 'COMP 1 created New Project test 2 & Assign You ', NULL, '/project/eyJpdiI6Imx6V1BMKzJ5WlNGcXZzN2pLQzhteGc9PSIsInZhbHVlIjoia0ZLN0VuVnd4bjBNcWExd1hrZnlIZz09IiwibWFjIjoiYjIyZDhiNTkwMWVlZjNlM2E0MjBkM2JkZGQwZThjN2IwZGI5YjljNmJhYzMxYzkyODNkNGMzZmY1NDU3YWZiNiIsInRhZyI6IiJ9', '2023-11-27 11:12:53', '2023-11-27 11:12:53'),
(11, 'Project', 'COMP 1 created New Project TEST22 & Assign You ', 'COMP 1 created New Project TEST22 & Assign You ', NULL, '/project/eyJpdiI6IkRVNFJ0NisxYnZqRDV2UXlNM1ZtS2c9PSIsInZhbHVlIjoieWFtYTNZRXN6dytpY0Fia0VNdDhPUT09IiwibWFjIjoiY2E5ZjIzY2YyMDA3N2M2OTcwNWM0YTFlOGQ1Y2Q5YjEwM2VlNmRjNGQwOTkwY2MyOWJlYTMxODQ3OTkyMTUwZiIsInRhZyI6IiJ9', '2023-11-27 11:35:35', '2023-11-27 11:35:35'),
(12, 'Project', 'COMP 1 created New Project test 33 & Assign You ', 'COMP 1 created New Project test 33 & Assign You ', NULL, '/project/eyJpdiI6IkhzMkF3cURRdnNGT0sveE9ocjZOa1E9PSIsInZhbHVlIjoiOUtUSHFXa2ZrRlc5SnR4ekhYYjZHdz09IiwibWFjIjoiNjdlNzkwODdlOWEwNThmMWZkNzQyOGY2Yzc0Njc5NzRhNzFhNmNhN2NjODA0NmU4M2Q3NzQ0OTM5Y2M2N2FkOCIsInRhZyI6IiJ9', '2023-11-27 11:39:04', '2023-11-27 11:39:04'),
(13, 'Project', 'COMP 1 Edit Project test update', 'COMP 1  Edit Project test update', NULL, '/project/eyJpdiI6IkpsWlJUZ1ZZek5iNXhjTElaRVRlb3c9PSIsInZhbHVlIjoiSVVhVC9GSXFOMWU3aTBrWkNtTmxaQT09IiwibWFjIjoiNjNjNjZkZjI5YjUxYzMzYTVhYWUyYmYyOWFkNzlhYjdmYzc1NmZjYzU4MDE4N2ZkMjA2ZjY5M2IwZmQyMThiMyIsInRhZyI6IiJ9', '2023-11-27 12:30:33', '2023-11-27 12:30:33'),
(14, 'Project', 'COMP 1 Edit Project test update', 'COMP 1  Edit Project test update', NULL, '/project/eyJpdiI6IndyOFlXWTFNYjVHS1NFb1ZrRWkvN1E9PSIsInZhbHVlIjoibHY4Zzc1VHN6WkI2VUZHbW5yRG5mZz09IiwibWFjIjoiNjY1NjJiMzE4YjEyOThmZWZiN2E4MTlmMGM5YjQxODhkYWFmZmY3OWQ0MDdmYzQwYmU1NTViZWY5ZWZmYmMwNCIsInRhZyI6IiJ9', '2023-11-27 12:37:50', '2023-11-27 12:37:50'),
(15, 'Project', 'COMP 1 Edit Project test update', 'COMP 1  Edit Project test update', NULL, '/project/eyJpdiI6ImcwYVpnZm5rb240ZTI4RjYxNFRpN1E9PSIsInZhbHVlIjoiT2o1d2hMSGFMRGpnL1gxVkNsb290QT09IiwibWFjIjoiNjBkN2Q5ZTAwNjUyNWFiYTVjNmE0N2RlOGNlY2NlZTQyMzJmOTUxOTdkNWZhMjZlODk2YjQ5MmZjODNkMWM4OCIsInRhZyI6IiJ9', '2023-11-27 12:38:07', '2023-11-27 12:38:07'),
(16, 'Project', 'COMP 1 Edit Project TEST22', 'COMP 1  Edit Project TEST22', NULL, '/project/eyJpdiI6IkFHMmJPTEdvVHpaTG1IZlY3NGlhbkE9PSIsInZhbHVlIjoiZXNkNkxsbkVPRXBOUFQ1dHhJaDlHUT09IiwibWFjIjoiZjA2M2FjY2YzODYzNTg2ZDJjYWVkMzFkYjIwNmQxOGRkZGJhYmY0ZTA1NWZlOGFhMjRhZWVmYWZjZDM4NGQ3YyIsInRhZyI6IiJ9', '2023-11-27 12:40:15', '2023-11-27 12:40:15'),
(17, 'Project', 'COMP 1 Edit Project TEST22', 'COMP 1  Edit Project TEST22', NULL, '/project/eyJpdiI6IlZpeXlia0k5bnNBeU9zVE1EdmFrbnc9PSIsInZhbHVlIjoiTHZ0anpZbmR2SndwK3B3OEFYaFFXQT09IiwibWFjIjoiY2U0MDIyMmExM2FmODg4MWMxNGE2ZTU5YmJkMGQ5ODJlOGFjYWQ0NzJkNDgwNmU4MGIyODA3NTA0NzM4YjFkYiIsInRhZyI6IiJ9', '2023-11-27 12:43:37', '2023-11-27 12:43:37'),
(19, 'Project', 'COMP 1 Edit Project TEST22', 'COMP 1  Edit Project TEST22', NULL, '/project/eyJpdiI6InFnNGxUdUZxSmtKOWdiUEVpUEloK2c9PSIsInZhbHVlIjoibmkrbGZ5VzZIbGV6NE1jTHBVMmpyZz09IiwibWFjIjoiMjU2NGM1NTUxYTU5MzJhYjc3NWUyNWMzZjg4NWE3MmU4YTAwNDg1ZWVlYTE4MjJlNjgxZWJjOGU3MmUxODViMiIsInRhZyI6IiJ9', '2023-11-27 12:59:03', '2023-11-27 12:59:03'),
(20, 'Project', 'COMP 1 Edit Project TEST22', 'COMP 1  Edit Project TEST22', NULL, '/project/eyJpdiI6ImFKUDN1TnB3MTNTc2lRa2J1dDh0WUE9PSIsInZhbHVlIjoiMlBidU1BRTNaRHN1NXc4OXlEdkhBUT09IiwibWFjIjoiMWVlNDAyMmVmNTgzNTU4OWE4YjA4YTcyZGZmMzRmZGMzYzY0ZTA4NjZlNDk4YWQ5MzVhNDdhMmEwYWMxN2E3NiIsInRhZyI6IiJ9', '2023-11-27 12:59:16', '2023-11-27 12:59:16'),
(21, 'Project', 'COMP 1 Edit Project TEST22', 'COMP 1  Edit Project TEST22', NULL, '/project/eyJpdiI6IlNveC8vRmtQQTlramZKN3E5dDBuN2c9PSIsInZhbHVlIjoidThTcTVSY1NsL2JlNDI0NzVSTUZKdz09IiwibWFjIjoiNjBkZDU4ZTkxNWRiY2FjNjk3ZDU2OTU4YzkzMjA0NTJjZWEzMzRkODU4NzY3OTljMmZmNDQ5YjI2MzEzOWY1YyIsInRhZyI6IiJ9', '2023-11-27 12:59:50', '2023-11-27 12:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `activity_users`
--

CREATE TABLE `activity_users` (
  `id` bigint UNSIGNED NOT NULL,
  `activity_id` int DEFAULT NULL,
  `send_id` int DEFAULT NULL,
  `receive_id` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_users`
--

INSERT INTO `activity_users` (`id`, `activity_id`, `send_id`, `receive_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 0, '2023-11-23 12:34:48', '2023-11-23 12:34:48'),
(2, 2, 1, 1, 0, '2023-11-27 10:44:51', '2023-11-27 10:44:51'),
(3, 2, 1, 4, 0, '2023-11-27 10:45:16', '2023-11-27 10:45:16'),
(4, 3, 1, 4, 0, '2023-11-27 11:08:42', '2023-11-27 11:08:42'),
(5, 4, 1, 4, 0, '2023-11-27 11:12:53', '2023-11-27 11:12:53'),
(12, 11, 1, 4, 0, '2023-11-27 11:35:35', '2023-11-27 11:35:35'),
(13, 12, 1, 4, 0, '2023-11-27 11:39:04', '2023-11-27 11:39:04'),
(14, 21, 1, 1, 0, '2023-11-27 12:59:50', '2023-11-27 12:59:50'),
(15, 21, 1, 4, 0, '2023-11-27 12:59:50', '2023-11-27 12:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint UNSIGNED NOT NULL,
  `asset_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_user` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `check_in` datetime DEFAULT NULL,
  `check_out` datetime DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_months`
--

CREATE TABLE `attendance_months` (
  `id` bigint UNSIGNED NOT NULL,
  `full_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_types`
--

CREATE TABLE `attendance_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abbreviation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `manager_id` int DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nfc_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `radius` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `device_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_port` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` int DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_clients`
--

CREATE TABLE `company_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_enName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_arName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_enNationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_arNationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_code`, `country_enName`, `country_arName`, `country_enNationality`, `country_arNationality`, `created_at`, `updated_at`) VALUES
('AD', 'Andorra', 'أندورا', 'Andorran', 'أندوري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AE', 'United Arab Emirates', 'الإمارات العربية المتحدة', 'Emirati', 'إماراتي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AF', 'Afghanistan', 'أفغانستان', 'Afghan', 'أفغانستاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AG', 'Antigua and Barbuda', 'أنتيغوا وبربودا', 'Antiguan', 'بربودي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AI', 'Anguilla', 'أنغويلا', 'Anguillan', 'أنغويلي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AL', 'Albania', 'ألبانيا', 'Albanian', 'ألباني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AM', 'Armenia', 'أرمينيا', 'Armenian', 'أرميني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AN', 'Netherlands Antilles', 'جزر الأنتيل الهولندي', 'Dutch Antilier', 'هولندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AO', 'Angola', 'أنغولا', 'Angolan', 'أنقولي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AQ', 'Antarctica', 'أنتاركتيكا', 'Antarctican', 'أنتاركتيكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AR', 'Argentina', 'الأرجنتين', 'Argentinian', 'أرجنتيني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AT', 'Austria', 'النمسا', 'Austrian', 'نمساوي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AU', 'Australia', 'أستراليا', 'Australian', 'أسترالي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AW', 'Aruba', 'أروبه', 'Aruban', 'أوروبهيني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AX', 'Aland Islands', 'جزر آلاند', 'Aland Islander', 'آلاندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('AZ', 'Azerbaijan', 'أذربيجان', 'Azerbaijani', 'أذربيجاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BA', 'Bosnia and Herzegovina', 'البوسنة و الهرسك', 'Bosnian \\/ Herzegovinian', 'بوسني\\/هرسكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BB', 'Barbados', 'بربادوس', 'Barbadian', 'بربادوسي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BD', 'Bangladesh', 'بنغلاديش', 'Bangladeshi', 'بنغلاديشي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BE', 'Belgium', 'بلجيكا', 'Belgian', 'بلجيكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BF', 'Burkina Faso', 'بوركينا فاسو', 'Burkinabe', 'بوركيني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BG', 'Bulgaria', 'بلغاريا', 'Bulgarian', 'بلغاري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BH', 'Bahrain', 'البحرين', 'Bahraini', 'بحريني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BI', 'Burundi', 'بوروندي', 'Burundian', 'بورونيدي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BJ', 'Benin', 'بنين', 'Beninese', 'بنيني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BL', 'Saint Barthelemy', 'سان بارتيلمي', 'Saint Barthelmian', 'سان بارتيلمي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BM', 'Bermuda', 'جزر برمودا', 'Bermudan', 'برمودي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BN', 'Brunei Darussalam', 'بروني', 'Bruneian', 'بروني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BO', 'Bolivia', 'بوليفيا', 'Bolivian', 'بوليفي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BR', 'Brazil', 'البرازيل', 'Brazilian', 'برازيلي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BS', 'Bahamas', 'الباهاماس', 'Bahamian', 'باهاميسي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BT', 'Bhutan', 'بوتان', 'Bhutanese', 'بوتاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BV', 'Bouvet Island', 'جزيرة بوفيه', 'Bouvetian', 'بوفيهي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BW', 'Botswana', 'بوتسوانا', 'Botswanan', 'بوتسواني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BY', 'Belarus', 'روسيا البيضاء', 'Belarusian', 'روسي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('BZ', 'Belize', 'بيليز', 'Belizean', 'بيليزي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CA', 'Canada', 'كندا', 'Canadian', 'كندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CC', 'Cocos (Keeling) Islands', 'جزر كوكوس', 'Cocos Islander', 'جزر كوكوس', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CF', 'Central African Republic', 'جمهورية أفريقيا الوسطى', 'Central African', 'أفريقي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CG', 'Congo', 'الكونغو', 'Congolese', 'كونغي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CH', 'Switzerland', 'سويسرا', 'Swiss', 'سويسري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CI', 'Ivory Coast', 'ساحل العاج', 'Ivory Coastian', 'ساحل العاج', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CK', 'Cook Islands', 'جزر كوك', 'Cook Islander', 'جزر كوك', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CL', 'Chile', 'شيلي', 'Chilean', 'شيلي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CM', 'Cameroon', 'كاميرون', 'Cameroonian', 'كاميروني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CN', 'China', 'الصين', 'Chinese', 'صيني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CR', 'Costa Rica', 'كوستاريكا', 'Costa Rican', 'كوستاريكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CU', 'Cuba', 'كوبا', 'Cuban', 'كوبي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CV', 'Cape Verde', 'الرأس الأخضر', 'Cape Verdean', 'الرأس الأخضر', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CW', 'Curaçao', 'كوراساو', 'Curacian', 'كوراساوي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CX', 'Christmas Island', 'جزيرة عيد الميلاد', 'Christmas Islander', 'جزيرة عيد الميلاد', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CY', 'Cyprus', 'قبرص', 'Cypriot', 'قبرصي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('CZ', 'Czech Republic', 'الجمهورية التشيكية', 'Czech', 'تشيكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('DE', 'Germany', 'ألمانيا', 'German', 'ألماني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('DJ', 'Djibouti', 'جيبوتي', 'Djiboutian', 'جيبوتي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('DK', 'Denmark', 'الدانمارك', 'Danish', 'دنماركي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('DM', 'Dominica', 'دومينيكا', 'Dominican', 'دومينيكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('DO', 'Dominican Republic', 'الجمهورية الدومينيكية', 'Dominican', 'دومينيكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('DZ', 'Algeria', 'الجزائر', 'Algerian', 'جزائري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('EC', 'Ecuador', 'إكوادور', 'Ecuadorian', 'إكوادوري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('EE', 'Estonia', 'استونيا', 'Estonian', 'استوني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('EG', 'Egypt', 'مصر', 'Egyptian', 'مصري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('EH', 'Western Sahara', 'الصحراء الغربية', 'Sahrawian', 'صحراوي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('ER', 'Eritrea', 'إريتريا', 'Eritrean', 'إريتيري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('ES', 'Spain', 'إسبانيا', 'Spanish', 'إسباني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('ET', 'Ethiopia', 'أثيوبيا', 'Ethiopian', 'أثيوبي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('FI', 'Finland', 'فنلندا', 'Finnish', 'فنلندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('FJ', 'Fiji', 'فيجي', 'Fijian', 'فيجي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('FK', 'Falkland Islands (Malvinas)', 'جزر فوكلاند', 'Falkland Islander', 'فوكلاندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('FM', 'Micronesia', 'مايكرونيزيا', 'Micronesian', 'مايكرونيزيي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('FO', 'Faroe Islands', 'جزر فارو', 'Faroese', 'جزر فارو', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('FR', 'France', 'فرنسا', 'French', 'فرنسي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GA', 'Gabon', 'الغابون', 'Gabonese', 'غابوني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GB', 'United Kingdom', 'المملكة المتحدة', 'British', 'بريطاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GD', 'Grenada', 'غرينادا', 'Grenadian', 'غرينادي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GE', 'Georgia', 'جيورجيا', 'Georgian', 'جيورجي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GF', 'French Guiana', 'غويانا الفرنسية', 'French Guianese', 'غويانا الفرنسية', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GG', 'Guernsey', 'غيرنزي', 'Guernsian', 'غيرنزي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GH', 'Ghana', 'غانا', 'Ghanaian', 'غاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GI', 'Gibraltar', 'جبل طارق', 'Gibraltar', 'جبل طارق', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GL', 'Greenland', 'جرينلاند', 'Greenlandic', 'جرينلاندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GM', 'Gambia', 'غامبيا', 'Gambian', 'غامبي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GN', 'Guinea', 'غينيا', 'Guinean', 'غيني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GP', 'Guadeloupe', 'جزر جوادلوب', 'Guadeloupe', 'جزر جوادلوب', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GQ', 'Equatorial Guinea', 'غينيا الاستوائي', 'Equatorial Guinean', 'غيني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GR', 'Greece', 'اليونان', 'Greek', 'يوناني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GS', 'South Georgia and the South Sandwich', 'المنطقة القطبية الجنوبية', 'South Georgia and the South Sandwich', 'لمنطقة القطبية الجنوبية', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GT', 'Guatemala', 'غواتيمال', 'Guatemalan', 'غواتيمالي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GU', 'Guam', 'جوام', 'Guamanian', 'جوامي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GW', 'Guinea-Bissau', 'غينيا-بيساو', 'Guinea-Bissauan', 'غيني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('GY', 'Guyana', 'غيانا', 'Guyanese', 'غياني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('HK', 'Hong Kong', 'هونغ كونغ', 'Hongkongese', 'هونغ كونغي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('HM', 'Heard and Mc Donald Islands', 'جزيرة هيرد وجزر ماكدونالد', 'Heard and Mc Donald Islanders', 'جزيرة هيرد وجزر ماكدونالد', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('HN', 'Honduras', 'هندوراس', 'Honduran', 'هندوراسي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('HR', 'Croatia', 'كرواتيا', 'Croatian', 'كوراتي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('HT', 'Haiti', 'هايتي', 'Haitian', 'هايتي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('HU', 'Hungary', 'المجر', 'Hungarian', 'مجري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('ID', 'Indonesia', 'أندونيسيا', 'Indonesian', 'أندونيسيي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('IE', 'Ireland', 'إيرلندا', 'Irish', 'إيرلندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('IL', 'Israel', 'إسرائيل', 'Israeli', 'إسرائيلي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('IM', 'Isle of Man', 'جزيرة مان', 'Manx', 'ماني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('IN', 'India', 'الهند', 'Indian', 'هندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('IO', 'British Indian Ocean Territory', 'إقليم المحيط الهندي البريطاني', 'British Indian Ocean Territory', 'إقليم المحيط الهندي البريطاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('IQ', 'Iraq', 'العراق', 'Iraqi', 'عراقي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('IR', 'Iran', 'إيران', 'Iranian', 'إيراني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('IS', 'Iceland', 'آيسلندا', 'Icelandic', 'آيسلندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('IT', 'Italy', 'إيطاليا', 'Italian', 'إيطالي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('JE', 'Jersey', 'جيرزي', 'Jersian', 'جيرزي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('JM', 'Jamaica', 'جمايكا', 'Jamaican', 'جمايكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('JO', 'Jordan', 'الأردن', 'Jordanian', 'أردني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('JP', 'Japan', 'اليابان', 'Japanese', 'ياباني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('KE', 'Kenya', 'كينيا', 'Kenyan', 'كيني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('KG', 'Kyrgyzstan', 'قيرغيزستان', 'Kyrgyzstani', 'قيرغيزستاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('KH', 'Cambodia', 'كمبوديا', 'Cambodian', 'كمبودي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('KI', 'Kiribati', 'كيريباتي', 'I-Kiribati', 'كيريباتي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('KM', 'Comoros', 'جزر القمر', 'Comorian', 'جزر القمر', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('KN', 'Saint Kitts and Nevis', 'سانت كيتس ونيفس,', 'Kittitian\\/Nevisian', 'سانت كيتس ونيفس', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('KP', 'Korea(North Korea)', 'كوريا الشمالية', 'North Korean', 'كوري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('KR', 'Korea(South Korea)', 'كوريا الجنوبية', 'South Korean', 'كوري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('KW', 'Kuwait', 'الكويت', 'Kuwaiti', 'كويتي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('KY', 'Cayman Islands', 'جزر كايمان', 'Caymanian', 'كايماني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('KZ', 'Kazakhstan', 'كازاخستان', 'Kazakh', 'كازاخستاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('LA', 'Lao PDR', 'لاوس', 'Laotian', 'لاوسي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('LB', 'Lebanon', 'لبنان', 'Lebanese', 'لبناني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('LC', 'Saint Pierre and Miquelon', 'سان بيير وميكلون', 'St. Pierre and Miquelon', 'سان بيير وميكلوني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('LI', 'Liechtenstein', 'ليختنشتين', 'Liechtenstein', 'ليختنشتيني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('LK', 'Sri Lanka', 'سريلانكا', 'Sri Lankian', 'سريلانكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('LR', 'Liberia', 'ليبيريا', 'Liberian', 'ليبيري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('LS', 'Lesotho', 'ليسوتو', 'Basotho', 'ليوسيتي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('LT', 'Lithuania', 'لتوانيا', 'Lithuanian', 'لتوانيي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('LU', 'Luxembourg', 'لوكسمبورغ', 'Luxembourger', 'لوكسمبورغي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('LV', 'Latvia', 'لاتفيا', 'Latvian', 'لاتيفي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('LY', 'Libya', 'ليبيا', 'Libyan', 'ليبي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MA', 'Morocco', 'المغرب', 'Moroccan', 'مغربي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MC', 'Monaco', 'موناكو', 'Monacan', 'مونيكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MD', 'Moldova', 'مولدافيا', 'Moldovan', 'مولديفي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('ME', 'Montenegro', 'الجبل الأسود', 'Montenegrin', 'الجبل الأسود', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MF', 'Saint Martin (French part)', 'ساينت مارتن فرنسي', 'St. Martian(French)', 'ساينت مارتني فرنسي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MG', 'Madagascar', 'مدغشقر', 'Malagasy', 'مدغشقري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MH', 'Marshall Islands', 'جزر مارشال', 'Marshallese', 'مارشالي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MK', 'Macedonia', 'مقدونيا', 'Macedonian', 'مقدوني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('ML', 'Mali', 'مالي', 'Malian', 'مالي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MM', 'Myanmar', 'ميانمار', 'Myanmarian', 'ميانماري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MN', 'Mongolia', 'منغوليا', 'Mongolian', 'منغولي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MO', 'Macau', 'ماكاو', 'Macanese', 'ماكاوي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MP', 'Northern Mariana Islands', 'جزر ماريانا الشمالية', 'Northern Marianan', 'ماريني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MQ', 'Martinique', 'مارتينيك', 'Martiniquais', 'مارتينيكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MR', 'Mauritania', 'موريتانيا', 'Mauritanian', 'موريتانيي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MS', 'Montserrat', 'مونتسيرات', 'Montserratian', 'مونتسيراتي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MT', 'Malta', 'مالطا', 'Maltese', 'مالطي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MU', 'Mauritius', 'موريشيوس', 'Mauritian', 'موريشيوسي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MV', 'Maldives', 'المالديف', 'Maldivian', 'مالديفي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MW', 'Malawi', 'مالاوي', 'Malawian', 'مالاوي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MX', 'Mexico', 'المكسيك', 'Mexican', 'مكسيكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MY', 'Malaysia', 'ماليزيا', 'Malaysian', 'ماليزي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('MZ', 'Mozambique', 'موزمبيق', 'Mozambican', 'موزمبيقي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('NA', 'Namibia', 'ناميبيا', 'Namibian', 'ناميبي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('NC', 'New Caledonia', 'كاليدونيا الجديدة', 'New Caledonian', 'كاليدوني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('NE', 'Niger', 'النيجر', 'Nigerien', 'نيجيري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('NF', 'Norfolk Island', 'جزيرة نورفولك', 'Norfolk Islander', 'نورفوليكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('NG', 'Nigeria', 'نيجيريا', 'Nigerian', 'نيجيري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('NI', 'Nicaragua', 'نيكاراجوا', 'Nicaraguan', 'نيكاراجوي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('NL', 'Netherlands', 'هولندا', 'Dutch', 'هولندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('NO', 'Norway', 'النرويج', 'Norwegian', 'نرويجي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('NP', 'Nepal', 'نيبال', 'Nepalese', 'نيبالي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('NR', 'Nauru', 'نورو', 'Nauruan', 'نوري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('NU', 'Niue', 'ني', 'Niuean', 'ني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('NZ', 'New Zealand', 'نيوزيلندا', 'New Zealander', 'نيوزيلندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('OM', 'Oman', 'عمان', 'Omani', 'عماني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('PA', 'Panama', 'بنما', 'Panamanian', 'بنمي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('PE', 'Peru', 'بيرو', 'Peruvian', 'بيري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('PF', 'French Polynesia', 'بولينيزيا الفرنسية', 'French Polynesian', 'بولينيزيي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('PG', 'Papua New Guinea', 'بابوا غينيا الجديدة', 'Papua New Guinean', 'بابوي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('PH', 'Philippines', 'الفليبين', 'Filipino', 'فلبيني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('PK', 'Pakistan', 'باكستان', 'Pakistani', 'باكستاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('PL', 'Poland', 'بولندا', 'Polish', 'بولندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('PN', 'Pitcairn', 'بيتكيرن', 'Pitcairn Islander', 'بيتكيرني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('PR', 'Puerto Rico', 'بورتو ريكو', 'Puerto Rican', 'بورتي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('PS', 'Palestine', 'فلسطين', 'Palestinian', 'فلسطيني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('PT', 'Portugal', 'البرتغال', 'Portuguese', 'برتغالي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('PW', 'Palau', 'بالاو', 'Palauan', 'بالاوي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('PY', 'Paraguay', 'باراغواي', 'Paraguayan', 'بارغاوي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('QA', 'Qatar', 'قطر', 'Qatari', 'قطري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('RE', 'Reunion Island', 'ريونيون', 'Reunionese', 'ريونيوني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('RO', 'Romania', 'رومانيا', 'Romanian', 'روماني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('RS', 'Serbia', 'صربيا', 'Serbian', 'صربي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('RU', 'Russian', 'روسيا', 'Russian', 'روسي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('RW', 'Rwanda', 'رواندا', 'Rwandan', 'رواندا', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SA', 'Saudi Arabia', 'المملكة العربية السعودية', 'Saudi Arabian', 'سعودي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SB', 'Solomon Islands', 'جزر سليمان', 'Solomon Island', 'جزر سليمان', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SC', 'Seychelles', 'سيشيل', 'Seychellois', 'سيشيلي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SD', 'Sudan', 'السودان', 'Sudanese', 'سوداني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SE', 'Sweden', 'السويد', 'Swedish', 'سويدي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SG', 'Singapore', 'سنغافورة', 'Singaporean', 'سنغافوري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SH', 'Saint Helena', 'سانت هيلانة', 'St. Helenian', 'هيلاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SI', 'Slovenia', 'سلوفينيا', 'Slovenian', 'سولفيني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SJ', 'Svalbard and Jan Mayen', 'سفالبارد ويان ماين', 'Svalbardian\\/Jan Mayenian', 'سفالبارد ويان ماين', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SK', 'Slovakia', 'سلوفاكيا', 'Slovak', 'سولفاكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SL', 'Sierra Leone', 'سيراليون', 'Sierra Leonean', 'سيراليوني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SM', 'San Marino', 'سان مارينو', 'Sammarinese', 'ماريني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SN', 'Senegal', 'السنغال', 'Senegalese', 'سنغالي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SO', 'Somalia', 'الصومال', 'Somali', 'صومالي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SR', 'Suriname', 'سورينام', 'Surinamese', 'سورينامي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SS', 'South Sudan', 'السودان الجنوبي', 'South Sudanese', 'سوادني جنوبي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('ST', 'Sao Tome and Principe', 'ساو تومي وبرينسيبي', 'Sao Tomean', 'ساو تومي وبرينسيبي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SV', 'El Salvador', 'إلسلفادور', 'Salvadoran', 'سلفادوري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SX', 'Sint Maarten (Dutch part)', 'ساينت مارتن هولندي', 'St. Martian(Dutch)', 'ساينت مارتني هولندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SY', 'Syria', 'سوريا', 'Syrian', 'سوري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('SZ', 'Swaziland', 'سوازيلند', 'Swazi', 'سوازيلندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TC', 'Turks and Caicos Islands', 'جزر توركس وكايكوس', 'Turks and Caicos Islands', 'جزر توركس وكايكوس', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TD', 'Chad', 'تشاد', 'Chadian', 'تشادي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TF', 'French Southern and Antarctic Lands', 'أراض فرنسية جنوبية وأنتارتيكية', 'French', 'أراض فرنسية جنوبية وأنتارتيكية', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TG', 'Togo', 'توغو', 'Togolese', 'توغي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TH', 'Thailand', 'تايلندا', 'Thai', 'تايلندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TJ', 'Tajikistan', 'طاجيكستان', 'Tajikistani', 'طاجيكستاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TK', 'Tokelau', 'توكيلاو', 'Tokelaian', 'توكيلاوي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TL', 'Timor-Leste', 'تيمور الشرقية', 'Timor-Lestian', 'تيموري', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TM', 'Turkmenistan', 'تركمانستان', 'Turkmen', 'تركمانستاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TN', 'Tunisia', 'تونس', 'Tunisian', 'تونسي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TO', 'Tonga', 'تونغا', 'Tongan', 'تونغي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TR', 'Turkey', 'تركيا', 'Turkish', 'تركي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TT', 'Trinidad and Tobago', 'ترينيداد وتوباغو', 'Trinidadian\\/Tobagonian', 'ترينيداد وتوباغو', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TV', 'Tuvalu', 'توفالو', 'Tuvaluan', 'توفالي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TW', 'Taiwan', 'تايوان', 'Taiwanese', 'تايواني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('TZ', 'Tanzania', 'تنزانيا', 'Tanzanian', 'تنزانيي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('UA', 'Ukraine', 'أوكرانيا', 'Ukrainian', 'أوكراني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('UG', 'Uganda', 'أوغندا', 'Ugandan', 'أوغندي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('UM', 'US Minor Outlying Islands', 'قائمة الولايات والمناطق الأمريكية', 'US Minor Outlying Islander', 'أمريكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('US', 'United States', 'الولايات المتحدة', 'American', 'أمريكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('UY', 'Uruguay', 'أورغواي', 'Uruguayan', 'أورغواي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('UZ', 'Uzbekistan', 'أوزباكستان', 'Uzbek', 'أوزباكستاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('VA', 'Vatican City', 'فنزويلا', 'Vatican', 'فاتيكاني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('VC', 'Saint Vincent and the Grenadines', 'سانت فنسنت وجزر غرينادين', 'Saint Vincent and the Grenadines', 'سانت فنسنت وجزر غرينادين', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('VE', 'Venezuela', 'فنزويلا', 'Venezuelan', 'فنزويلي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('VI', 'Virgin Islands (U.S.)', 'الجزر العذراء الأمريكي', 'American Virgin Islander', 'أمريكي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('VN', 'Vietnam', 'فيتنام', 'Vietnamese', 'فيتنامي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('VU', 'Vanuatu', 'فانواتو', 'Vanuatuan', 'فانواتي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('WF', 'Wallis and Futuna Islands', 'والس وفوتونا', 'Wallisian\\/Futunan', 'فوتوني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('WS', 'Samoa', 'ساموا', 'Samoan', 'ساموي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('XK', 'Kosovo', 'كوسوفو', 'Kosovar', 'كوسيفي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('YE', 'Yemen', 'اليمن', 'Yemeni', 'يمني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('YT', 'Mayotte', 'مايوت', 'Mahoran', 'مايوتي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('ZA', 'South Africa', 'جنوب أفريقيا', 'South African', 'أفريقي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('ZM', 'Zambia', 'زامبيا', 'Zambian', 'زامبياني', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
('ZW', 'Zimbabwe', 'زمبابوي', 'Zimbabwean', 'زمبابوي', '2023-11-22 14:03:10', '2023-11-22 14:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `deduction_limits`
--

CREATE TABLE `deduction_limits` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deduction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deduction_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `reason` text COLLATE utf8mb4_unicode_ci,
  `minutes` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demo_requests`
--

CREATE TABLE `demo_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_informations`
--

CREATE TABLE `education_informations` (
  `id` bigint UNSIGNED NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_date` date DEFAULT NULL,
  `complete_date` date DEFAULT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_configs`
--

CREATE TABLE `email_configs` (
  `id` bigint UNSIGNED NOT NULL,
  `email_from_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` int DEFAULT NULL,
  `smtp_security` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_authentication_domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenant_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_leave_settings`
--

CREATE TABLE `email_leave_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `type` int NOT NULL,
  `times` int NOT NULL,
  `more_than` int NOT NULL,
  `less_than` int NOT NULL,
  `percentage` int NOT NULL,
  `percentage_type` int NOT NULL,
  `message_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `period_form` date DEFAULT NULL,
  `period_to` date DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_informations`
--

CREATE TABLE `family_informations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `in_out_logs`
--

CREATE TABLE `in_out_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `time_calc` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `assign_staff` text COLLATE utf8mb4_general_ci,
  `project_id` bigint UNSIGNED DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `channel` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_general_ci,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `name`, `email`, `phone`, `assign_staff`, `project_id`, `created_by`, `channel`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TEST', 'ASDASDAS@asdsad.com', '023032034', '[\"1\",\"4\"]', NULL, 1, '3', NULL, 'New', '2023-11-28 08:45:19', '2023-11-28 08:45:19'),
(3, 'test 44', 'test44@asdasd.com', '12312312312', '[\"1\",\"4\"]', NULL, 1, NULL, NULL, 'Meeting', '2023-11-28 10:31:06', '2023-11-28 10:31:06'),
(4, 'mohamed', '', '1011941903', '[\"4\"]', NULL, 1, NULL, 'Test 1', NULL, '2023-11-28 12:35:33', '2023-11-28 12:47:11'),
(5, 'omar', '', '111748937', '[\"1\"]', NULL, 1, NULL, 'Test 2', NULL, '2023-11-28 12:35:33', '2023-11-28 12:45:35'),
(6, 'osama', '', '123374338', NULL, NULL, 1, NULL, 'Test 3', NULL, '2023-11-28 12:35:33', '2023-11-28 12:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `lead_activities`
--

CREATE TABLE `lead_activities` (
  `id` bigint UNSIGNED NOT NULL,
  `lead_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint UNSIGNED NOT NULL,
  `leave_type_id` int DEFAULT NULL,
  `period_from` date DEFAULT NULL,
  `period_to` date DEFAULT NULL,
  `work_Resume` date DEFAULT NULL,
  `dedcut_annual_vacation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_charges` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_needed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_sattus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_reason` text COLLATE utf8mb4_unicode_ci,
  `employee_replacement` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `approve_leave_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_by` int DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `salary_transportation` double(8,2) DEFAULT NULL,
  `cost_center` int DEFAULT NULL,
  `financial_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `replacement_approval` int DEFAULT NULL,
  `prescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves_custom_policies`
--

CREATE TABLE `leaves_custom_policies` (
  `id` bigint UNSIGNED NOT NULL,
  `setting_id` int DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_days` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_policies`
--

CREATE TABLE `leave_policies` (
  `id` bigint UNSIGNED NOT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_days` int DEFAULT NULL,
  `policy_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_settings`
--

CREATE TABLE `leave_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `leave_setting_id` int DEFAULT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carry_forward` int DEFAULT NULL,
  `carry_forward_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `earned_leave` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_setting_configs`
--

CREATE TABLE `leave_setting_configs` (
  `id` bigint UNSIGNED NOT NULL,
  `leave_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `common_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `carry_forward` int NOT NULL DEFAULT '0',
  `earned_leave` int NOT NULL DEFAULT '0',
  `custom_policy` int NOT NULL DEFAULT '0',
  `gender` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `loan_explication` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warrantor` int DEFAULT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_23_185057_create_zkteco_devices_table', 1),
(6, '2021_08_23_185624_create_in_out_logs_table', 1),
(7, '2022_12_06_074658_create_family_informations_table', 1),
(8, '2022_12_06_080247_create_education_informations_table', 1),
(9, '2022_12_06_081532_create_experiences_table', 1),
(10, '2022_12_07_133219_create_holidays_table', 1),
(11, '2022_12_09_225449_create_departments_table', 1),
(12, '2022_12_12_135454_create_leaves_table', 1),
(13, '2022_12_13_092507_create_leave_types_table', 1),
(14, '2022_12_14_075655_create_designations_table', 1),
(15, '2022_12_20_090708_create_attendances_table', 1),
(16, '2022_12_21_072042_create_attendance_months_table', 1),
(17, '2022_12_21_104902_create_leave_settings_table', 1),
(18, '2022_12_21_113648_create_leave_policies_table', 1),
(19, '2022_12_22_073135_create_overtimes_table', 1),
(20, '2022_12_22_074005_create_overtime_types_table', 1),
(21, '2022_12_26_113610_create_performances_table', 1),
(22, '2022_12_26_114452_create_user_performances_table', 1),
(23, '2022_12_27_121428_create_payrolls_table', 1),
(24, '2022_12_27_141343_create_promotions_table', 1),
(25, '2022_12_27_144817_create_resignations_table', 1),
(26, '2022_12_28_072806_create_terminations_table', 1),
(27, '2023_01_01_074310_create_modules_table', 1),
(28, '2023_01_02_081135_create_role_modules_table', 1),
(29, '2023_01_02_105923_create_module_permissions_table', 1),
(30, '2023_01_03_124542_create_permission_tables', 1),
(31, '2023_01_04_073444_create_sessions_table', 1),
(32, '2023_01_25_115758_create_companies_table', 1),
(33, '2023_01_29_081735_create_payroll_items_table', 1),
(34, '2023_01_30_144924_create_leaves_custom_policies_table', 1),
(35, '2023_01_31_072027_create_user_leaves_custom_policies_table', 1),
(36, '2023_01_31_150346_create_termination_types_table', 1),
(37, '2023_02_07_074113_create_activites_table', 1),
(38, '2023_02_12_073721_create_activity_users_table', 1),
(39, '2023_02_15_121858_create_leave_setting_configs_table', 1),
(40, '2023_05_23_135917_create_clients_table', 1),
(41, '2023_05_24_113243_create_attendance_types_table', 1),
(42, '2023_05_24_114724_create_countries_table', 1),
(43, '2023_05_24_123303_create_loans_table', 1),
(44, '2023_05_24_124224_create_pages_table', 1),
(45, '2023_05_24_131337_create_user_notifications_table', 1),
(46, '2023_05_24_132628_create_work_sheet_table', 1),
(47, '2023_05_29_153806_create_subscription_plans_table', 1),
(48, '2023_05_30_111719_create_transactions_table', 1),
(49, '2023_05_31_114053_create_demo_requests_table', 1),
(50, '2023_05_31_132210_create_subscribe_requests_table', 1),
(51, '2023_05_31_145119_create_contacts_table', 1),
(52, '2023_06_07_101510_create_user_subscribers_table', 1),
(53, '2023_07_10_120439_create_projects_table', 1),
(54, '2023_07_10_123907_create_project_teams_table', 1),
(55, '2023_07_13_141047_create_assets_table', 1),
(56, '2023_07_24_100704_create_tasks_table', 1),
(57, '2023_07_25_095152_create_task_activities_table', 1),
(58, '2023_07_25_155202_create_task_lists_table', 1),
(59, '2023_07_31_142354_create_sub_modules_table', 1),
(60, '2023_08_02_111541_company_clients', 1),
(61, '2023_08_02_1117078_tickets', 1),
(62, '2023_08_02_111723_ticket_activities', 1),
(63, '2023_08_09_104059_create_deduction__limits_table', 1),
(64, '2023_08_14_093613_create_email_configs_table', 1),
(65, '2023_08_24_123735_create_email_leave_settings_table', 1),
(66, '2023_09_13_134807_user_house_allawence', 1),
(67, '2023_09_13_134848_lead_activities', 1),
(68, '2023_09_13_134905_leads', 1),
(69, '2023_09_14_134905_branches', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'App\\Models\\User',
  `model_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`, `created_at`, `updated_at`) VALUES
(28, 'App\\Models\\User', 1, '2023-08-07 07:17:43', NULL),
(29, 'App\\Models\\User', 1, '2023-08-07 07:17:47', NULL),
(36, 'App\\Models\\User', 1, '2023-07-31 12:48:38', NULL),
(37, 'App\\Models\\User', 1, '2023-07-31 12:48:38', NULL),
(39, 'App\\Models\\User', 1, '2023-07-31 12:48:40', NULL),
(40, 'App\\Models\\User', 1, '2023-07-31 12:48:41', NULL),
(41, 'App\\Models\\User', 1, '2023-08-13 13:14:48', NULL),
(42, 'App\\Models\\User', 1, '2023-08-10 08:26:16', NULL),
(43, 'App\\Models\\User', 1, '2023-08-10 08:26:22', NULL),
(44, 'App\\Models\\User', 1, '2023-08-10 08:26:25', NULL),
(45, 'App\\Models\\User', 1, '2023-08-10 08:26:20', NULL),
(46, 'App\\Models\\User', 1, '2023-08-10 08:26:21', NULL),
(47, 'App\\Models\\User', 1, '2023-08-10 08:26:24', NULL),
(48, 'App\\Models\\User', 1, '2023-08-10 08:26:27', NULL),
(49, 'App\\Models\\User', 1, '2023-08-10 08:26:31', NULL),
(50, 'App\\Models\\User', 1, '2023-08-10 08:26:32', NULL),
(51, 'App\\Models\\User', 1, '2023-08-10 08:26:33', NULL),
(52, 'App\\Models\\User', 1, '2023-08-10 08:26:34', NULL),
(53, 'App\\Models\\User', 1, '2023-08-10 08:26:39', NULL),
(55, 'App\\Models\\User', 1, '2023-08-10 08:27:00', NULL),
(61, 'App\\Models\\User', 1, '2023-09-21 10:52:56', NULL),
(62, 'App\\Models\\User', 1, '2023-09-21 10:52:57', NULL),
(63, 'App\\Models\\User', 1, '2023-09-21 10:52:58', NULL),
(64, 'App\\Models\\User', 1, '2023-09-21 10:52:59', NULL),
(77, 'App\\Models\\User', 1, '2023-06-15 12:16:51', NULL),
(78, 'App\\Models\\User', 1, '2023-06-15 12:16:51', NULL),
(79, 'App\\Models\\User', 1, '2023-06-15 12:16:51', NULL),
(94, 'App\\Models\\User', 1, '2023-08-08 13:13:49', NULL),
(95, 'App\\Models\\User', 1, '2023-08-08 13:13:52', NULL),
(96, 'App\\Models\\User', 1, '2023-08-08 13:13:52', NULL),
(97, 'App\\Models\\User', 1, '2023-08-08 13:13:52', NULL),
(99, 'App\\Models\\User', 1, '2023-06-15 12:16:51', NULL),
(100, 'App\\Models\\User', 1, '2023-06-15 12:16:51', NULL),
(101, 'App\\Models\\User', 1, '2023-06-15 12:16:51', NULL),
(102, 'App\\Models\\User', 1, '2023-06-15 12:16:51', NULL),
(136, 'App\\Models\\User', 1, '2023-08-10 08:26:27', NULL),
(137, 'App\\Models\\User', 1, '2023-08-10 08:26:28', NULL),
(138, 'App\\Models\\User', 1, '2023-08-10 08:26:38', NULL),
(140, 'App\\Models\\User', 1, '2023-06-15 12:16:51', NULL),
(141, 'App\\Models\\User', 1, '2023-08-08 13:13:53', NULL),
(142, 'App\\Models\\User', 1, '2023-06-15 12:16:51', NULL),
(143, 'App\\Models\\User', 1, '2023-07-31 12:54:52', NULL),
(144, 'App\\Models\\User', 1, '2023-07-31 12:54:54', NULL),
(145, 'App\\Models\\User', 1, '2023-08-08 13:29:53', NULL),
(146, 'App\\Models\\User', 1, '2023-08-08 13:29:54', NULL),
(147, 'App\\Models\\User', 1, '2023-08-08 13:29:56', NULL),
(148, 'App\\Models\\User', 1, '2023-08-08 13:29:57', NULL),
(149, 'App\\Models\\User', 1, '2023-08-02 11:04:37', NULL),
(150, 'App\\Models\\User', 1, '2023-07-24 14:30:03', NULL),
(151, 'App\\Models\\User', 1, '2023-07-24 14:30:04', NULL),
(152, 'App\\Models\\User', 1, '2023-07-24 14:30:05', NULL),
(153, 'App\\Models\\User', 1, '2023-08-08 13:29:55', NULL),
(154, 'App\\Models\\User', 1, '2023-07-24 14:30:04', NULL),
(155, 'App\\Models\\User', 1, '2023-07-31 12:54:57', NULL),
(156, 'App\\Models\\User', 1, '2023-07-31 12:55:02', NULL),
(157, 'App\\Models\\User', 1, '2023-07-31 12:54:53', NULL),
(158, 'App\\Models\\User', 1, '2023-07-31 12:54:55', NULL),
(159, 'App\\Models\\User', 1, '2023-07-31 12:54:58', NULL),
(160, 'App\\Models\\User', 1, '2023-07-31 12:55:00', NULL),
(161, 'App\\Models\\User', 1, '2023-09-11 11:16:46', NULL),
(162, 'App\\Models\\User', 1, '2023-09-11 11:16:49', NULL),
(163, 'App\\Models\\User', 1, '2023-09-11 11:16:49', NULL),
(164, 'App\\Models\\User', 1, '2023-09-11 11:16:49', NULL),
(165, 'App\\Models\\User', 1, '2023-08-06 08:31:21', NULL),
(167, 'App\\Models\\User', 1, '2023-08-06 08:37:31', NULL),
(169, 'App\\Models\\User', 1, '2023-08-09 11:25:59', NULL),
(170, 'App\\Models\\User', 1, '2023-08-09 11:26:07', NULL),
(171, 'App\\Models\\User', 1, '2023-08-09 11:26:08', NULL),
(172, 'App\\Models\\User', 1, '2023-08-09 11:26:11', NULL),
(177, 'App\\Models\\User', 1, '2023-09-21 12:49:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 8),
(1, 'App\\Models\\User', 18),
(1, 'App\\Models\\User', 19),
(1, 'App\\Models\\User', 20),
(1, 'App\\Models\\User', 21),
(1, 'App\\Models\\User', 22),
(1, 'App\\Models\\User', 23),
(1, 'App\\Models\\User', 24),
(1, 'App\\Models\\User', 25),
(1, 'App\\Models\\User', 26),
(1, 'App\\Models\\User', 27),
(1, 'App\\Models\\User', 28),
(1, 'App\\Models\\User', 29),
(1, 'App\\Models\\User', 30),
(1, 'App\\Models\\User', 31),
(1, 'App\\Models\\User', 32),
(1, 'App\\Models\\User', 33),
(1, 'App\\Models\\User', 34),
(1, 'App\\Models\\User', 35),
(1, 'App\\Models\\User', 36),
(1, 'App\\Models\\User', 93),
(4, 'App\\Models\\User', 94),
(4, 'App\\Models\\User', 95),
(4, 'App\\Models\\User', 96),
(4, 'App\\Models\\User', 97),
(4, 'App\\Models\\User', 98),
(4, 'App\\Models\\User', 99),
(4, 'App\\Models\\User', 100),
(2, 'App\\Models\\User', 108),
(4, 'App\\Models\\User', 112),
(4, 'App\\Models\\User', 113),
(4, 'App\\Models\\User', 121),
(4, 'App\\Models\\User', 122);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint UNSIGNED NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(2, 'Employees', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(3, 'Holidays', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(4, 'Leaves', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(5, 'Attendance', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(6, 'Departments', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(7, 'Designations', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(8, 'Overtime', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(9, 'Performance', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(10, 'Payroll', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(11, 'Promotion', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(12, 'Resignation', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(13, 'Termination', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(14, 'Roles & Permissions', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(15, 'Projects', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(16, 'Assets', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(17, 'Loan', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(18, 'Client', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(19, 'Ticket', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(20, 'Company-Profile', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(21, 'Email Setting', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(41, 'Branches', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(42, 'Work-Sheet', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(43, 'Jobs', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(44, 'Leads', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(45, 'Deductions', '2023-11-22 14:03:10', '2023-11-22 14:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `overtimes`
--

CREATE TABLE `overtimes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `overtime_date` date DEFAULT NULL,
  `overtime_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overtime_type` int DEFAULT NULL,
  `overtime_description` text COLLATE utf8mb4_unicode_ci,
  `overtime_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overtime_approve_by` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `overtime_reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `overtime_types`
--

CREATE TABLE `overtime_types` (
  `id` bigint UNSIGNED NOT NULL,
  `overtime_type_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overtime_value` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `net_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_allowance` double(8,2) DEFAULT NULL,
  `transportation` double(8,2) DEFAULT NULL,
  `gosi` double(8,2) DEFAULT NULL,
  `food` double(8,2) DEFAULT NULL,
  `working_days` int DEFAULT NULL,
  `extra_days` int DEFAULT NULL,
  `evening_shift` double(8,2) DEFAULT NULL,
  `overtime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overtime_price` double DEFAULT NULL,
  `other_earning` double(8,2) DEFAULT NULL,
  `addition_payroll_item` text COLLATE utf8mb4_unicode_ci,
  `deduction` double(8,2) DEFAULT NULL,
  `month_absence` double DEFAULT NULL,
  `loan` double DEFAULT NULL,
  `other_deduction` double DEFAULT NULL,
  `deduction_payroll_item` text COLLATE utf8mb4_unicode_ci,
  `salary_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_addition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_deduction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_items`
--

CREATE TABLE `payroll_items` (
  `id` bigint UNSIGNED NOT NULL,
  `payroll_item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payroll_item_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payroll_item_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_calculation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performances`
--

CREATE TABLE `performances` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `performance_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(28, 'admin-dashboard-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(29, 'employee-dashboard-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(30, 'all-employees-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(36, 'holidays-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(37, 'holidays-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(39, 'holidays-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(40, 'holidays-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(41, 'leaves-(supervisior)-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(42, 'leaves-(supervisior)-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(43, 'leaves-(supervisior)-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(44, 'leaves-(supervisior)-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(45, 'leaves-(hr)-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(46, 'leaves-(hr)-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(47, 'leaves-(hr)-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(48, 'leaves-(hr)-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(49, 'leaves-(financial)-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(50, 'leaves-(financial)-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(51, 'leaves-(financial)-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(52, 'leaves-(financial)-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(53, 'leaves-(employee)-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(54, 'leaves-(employee)-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(55, 'leaves-(employee)-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(56, 'leaves-(employee)-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(57, 'leave-settings-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(59, 'attendance-(admin)-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(60, 'attendance-(employee)-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(61, 'departments-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(62, 'departments-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(63, 'departments-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(64, 'departments-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(65, 'designations-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(66, 'designations-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(67, 'designations-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(68, 'designations-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(69, 'overtime-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(70, 'overtime-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(71, 'overtime-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(72, 'overtime-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(73, 'add-performance-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(74, 'performance-appraisal-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(75, 'performance-(employee)-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(76, 'employee-salary-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(77, 'employee-salary-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(78, 'employee-salary-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(79, 'employee-salary-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(80, 'payslip-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(81, 'payroll-items-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(82, 'payroll-items-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(83, 'payroll-items-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(84, 'payroll-items-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(85, 'promotion-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(86, 'promotion-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(88, 'promotion-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(89, 'promotion-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(90, 'resignation-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(91, 'resignation-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(92, 'resignation-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(93, 'resignation-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(94, 'termination-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(95, 'termination-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(96, 'termination-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(97, 'termination-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(98, 'activities-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(99, 'users-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(100, 'users-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(101, 'users-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(102, 'users-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(103, 'company-settings-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(104, 'company-settings-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(105, 'localization-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(106, 'localization-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(107, 'theme-settings-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(108, 'theme-settings-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(109, 'roles-&-permissions-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(110, 'roles-&-permissions-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(111, 'roles-&-permissions-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(112, 'roles-&-permissions-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(113, 'salary-settings-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(114, 'salary-settings-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(115, 'notifications-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(116, 'change-password-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(117, 'change-password-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(118, 'leave-type-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(119, 'leave-type-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(121, 'leave-type-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(122, 'leave-type-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(123, 'employee-profile-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(124, 'employee-profile-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(125, 'employee-profile-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(126, 'employee-profile-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(127, 'all-employees-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(128, 'all-employees-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(129, 'all-employees-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(130, 'overtime-(supervisor)-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(131, 'overtime-(supervisor)-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(132, 'overtime-(supervisor)-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(134, 'leave-settings-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(135, 'leave-settings-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(136, 'leaves-(supervisior)-approve', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(137, 'leaves-(hr)-approve', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(138, 'leaves-(financial)-approve', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(139, 'overtime-(supervisor)-approve', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(140, 'resignation-approve', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(141, 'termination-approve', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(142, 'work-sheet-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(143, 'loan-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(144, 'loan-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(145, 'projects-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(146, 'projects-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(147, 'projects-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(148, 'projects-approve', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(149, 'assets-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(150, 'assets-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(151, 'assets-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(152, 'assets-approve', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(153, 'projects-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(154, 'assets-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(155, 'loan-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(156, 'loan-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(157, 'client-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(158, 'client-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(159, 'client-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(160, 'client-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(161, 'ticket-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(162, 'ticket-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(163, 'ticket-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(164, 'ticket-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(165, 'company-profile-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(166, 'company-profile-create', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(167, 'company-profile-write', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(168, 'company-profile-delete', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(169, 'resignation-read-all', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(170, 'resignation-write-all', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(171, 'resignation-create-all', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(172, 'resignation-delete-all', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(173, 'loan-delete-all', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(174, 'loan-read-all', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(175, 'loan-write-all', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(176, 'loan-create-all', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23'),
(177, 'leads-read', 'web', '2023-06-05 10:26:23', '2023-06-05 10:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `galary` text COLLATE utf8mb4_unicode_ci,
  `region` int DEFAULT NULL,
  `map` text COLLATE utf8mb4_unicode_ci,
  `video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `team_leader_id` int NOT NULL,
  `user_id` int DEFAULT NULL COMMENT 'user that create this project',
  `status` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `photo`, `galary`, `region`, `map`, `video`, `team_leader_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test update', 'test update des', NULL, NULL, 1, NULL, NULL, 1, 1, 'Inactive', '2023-11-27 10:44:51', '2023-11-27 12:38:07'),
(10, 'TEST22', 'ASDASD 233', NULL, NULL, 1, 'ASDASD', 'ASDSA', 4, 1, 'Active', '2023-11-27 11:35:35', '2023-11-27 12:59:50'),
(11, 'test 33', '', NULL, NULL, 2, '', '', 1, 1, 'Active', '2023-11-27 11:39:04', '2023-11-27 11:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` int NOT NULL,
  `project_id` int DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `file`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'photos/aHmaGTbM4V3yA0HvY5WixGInWTHqknkLYgvZ95tb.png', '0SB4V4lXKilDuED50rcNJBolPXFvpFyW7rv9Npnp.png', 1, '2023-11-27 10:45:16', '2023-11-27 10:45:16'),
(2, 1, 'photos/VPWLfLv4zDG88Ybk4KCKgDQ17WpfEWrr7PrkK0R2.png', '2QueXmhv83zJYSakYkimEpMpGkG23njgNowMSVfK.png', 1, '2023-11-27 10:45:16', '2023-11-27 10:45:16'),
(3, 1, 'photos/hmaeTvpXVkPM75KGRh6oFcrT5ZqDaLjNaSPkHY5d.png', '0as4V0YZXimlfFSWrkQed6ChEg67qAVWsKipR8rX.png', 1, '2023-11-27 10:45:16', '2023-11-27 10:45:16'),
(4, 1, 'photos/BX2bzXc9qD5IU2CZ25Rt24KeZJy7Qowp3jE98FUg.png', '2G1T9YYE9nmMgRvfCvnnIvySFKXTK4d3zwMXnJ5E.png', 1, '2023-11-27 10:45:16', '2023-11-27 10:45:16'),
(5, 10, 'photos/EynfvykRciKnDJgakucdVKw0DeumbmO9mCulxZBp.png', '0as4V0YZXimlfFSWrkQed6ChEg67qAVWsKipR8rX.png', 1, '2023-11-27 11:35:35', '2023-11-27 11:35:35'),
(6, 10, 'photos/rO5y4rZpWjGekbeKcZ73BAh8bSCmZPGHLJE2GD9C.png', '0SB4V4lXKilDuED50rcNJBolPXFvpFyW7rv9Npnp.png', 1, '2023-11-27 11:35:35', '2023-11-27 11:35:35'),
(7, 10, 'photos/cynJs5k3eODTsyJ91w0X3aoQBWU9tf7RPrbhlNpq.png', '3EFuaVHPu8cVXwK61SYrBKW8GpErVMxwuJ7mNUfz.png', 1, '2023-11-27 11:35:35', '2023-11-27 11:35:35'),
(8, 10, 'photos/abMoFQJwwSk7r84pwrOlJu12pYgIZxZAwNAOKfXg.png', '4dj8OewUPbzkwTSuoJyz7zizWOmBlln9otWavSZC.png', 1, '2023-11-27 11:35:35', '2023-11-27 11:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `project_teams`
--

CREATE TABLE `project_teams` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` int NOT NULL,
  `team_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_teams`
--

INSERT INTO `project_teams` (`id`, `project_id`, `team_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-11-27 10:44:51', '2023-11-27 10:44:51'),
(2, 1, 4, '2023-11-27 10:45:16', '2023-11-27 10:45:16'),
(3, 2, 4, '2023-11-27 11:08:42', '2023-11-27 11:08:42'),
(4, 3, 4, '2023-11-27 11:12:53', '2023-11-27 11:12:53'),
(11, 10, 4, '2023-11-27 11:35:35', '2023-11-27 11:35:35'),
(12, 11, 4, '2023-11-27 11:39:04', '2023-11-27 11:39:04'),
(13, 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint UNSIGNED NOT NULL,
  `promotion_for` int DEFAULT NULL,
  `promotion_from` int DEFAULT NULL,
  `promotion_to` int DEFAULT NULL,
  `promotion_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 'Nasr City', 'مدينة نصر', '2023-11-27 10:30:53', '2023-11-27 10:30:53'),
(2, 'New Cairo', 'القاهرة الجديدة', '2023-11-27 10:30:53', '2023-11-27 10:30:53'),
(3, 'Nozha', 'النزهة', '2023-11-27 14:37:12', '2023-11-27 14:37:12'),
(5, ' giza', 'الجيزة', '2023-11-27 14:43:35', '2023-11-27 15:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `resignations`
--

CREATE TABLE `resignations` (
  `id` bigint UNSIGNED NOT NULL,
  `resigning_employee` int DEFAULT NULL,
  `notice_date` date DEFAULT NULL,
  `resignation_date` date DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `approve_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  ` type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `name_ar`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'supervisor', 'مشرف', 'web', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(2, 'Sales Director', 'مدير مبيعات', 'web', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(4, 'Sales Rep\n', 'مبيعات', 'web', '2023-11-22 14:03:10', '2023-11-22 14:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(28, 1),
(29, 1),
(30, 1),
(36, 1),
(37, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(55, 1),
(57, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(167, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(177, 1),
(28, 2),
(29, 2),
(30, 2),
(36, 2),
(37, 2),
(39, 2),
(40, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(57, 2),
(59, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(85, 2),
(86, 2),
(88, 2),
(89, 2),
(90, 2),
(91, 2),
(92, 2),
(93, 2),
(94, 2),
(127, 2),
(128, 2),
(129, 2),
(134, 2),
(135, 2),
(137, 2),
(140, 2),
(145, 2),
(146, 2),
(147, 2),
(149, 2),
(151, 2),
(152, 2),
(29, 4),
(53, 4),
(55, 4),
(90, 4),
(91, 4),
(92, 4),
(93, 4),
(98, 4),
(116, 4),
(123, 4),
(124, 4),
(125, 4),
(126, 4),
(142, 4),
(143, 4),
(144, 4),
(155, 4),
(156, 4),
(157, 4),
(158, 4),
(159, 4),
(160, 4),
(169, 4),
(171, 4),
(173, 4),
(174, 4),
(175, 4),
(176, 4);

-- --------------------------------------------------------

--
-- Table structure for table `role_modules`
--

CREATE TABLE `role_modules` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` int DEFAULT NULL,
  `module_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_modules`
--

INSERT INTO `role_modules` (`id`, `role_id`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(2, 1, 6, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(3, 1, 7, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(4, 1, 8, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(5, 1, 9, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(6, 1, 10, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(7, 1, 11, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(8, 1, 12, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(9, 1, 13, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(10, 1, 14, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(11, 1, 15, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(12, 1, 22, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(13, 1, 23, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(14, 1, 24, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(15, 1, 25, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(16, 1, 26, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(17, 1, 27, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(18, 1, 28, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(19, 1, 29, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(20, 1, 30, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(21, 1, 31, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(22, 1, 32, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(23, 1, 33, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(24, 1, 34, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(25, 1, 3, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(26, 2, 23, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(27, 4, 2, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(28, 4, 11, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(29, 4, 8, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(30, 3, 2, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(31, 3, 3, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(32, 3, 4, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(33, 3, 7, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(34, 3, 18, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(35, 3, 20, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(36, 3, 30, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(37, 3, 34, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(38, 3, 23, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(39, 2, 6, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(40, 2, 8, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(41, 2, 16, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(42, 3, 22, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(43, 2, 24, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(44, 3, 1, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(45, 3, 11, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(46, 3, 14, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(47, 2, 9, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(48, 1, 35, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(49, 4, 17, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(50, 2, 11, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(51, 2, 10, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(52, 2, 2, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(53, 2, 22, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(54, 2, 25, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(55, 2, 1, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(56, 2, 3, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(57, 2, 4, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(58, 2, 5, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(59, 2, 7, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(60, 2, 12, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(61, 2, 13, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(62, 2, 15, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(63, 2, 17, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(64, 2, 18, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(65, 2, 20, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(66, 2, 29, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(67, 2, 32, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(68, 2, 33, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(69, 2, 34, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(70, 2, 35, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(71, 3, 5, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(72, 3, 6, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(73, 3, 8, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(74, 3, 9, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(75, 3, 10, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(76, 3, 12, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(77, 3, 13, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(78, 3, 16, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(79, 3, 17, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(80, 3, 24, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(81, 3, 25, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(82, 3, 29, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(83, 3, 32, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(84, 3, 33, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(85, 3, 35, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(86, 4, 1, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(87, 4, 3, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(88, 4, 4, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(89, 4, 5, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(90, 4, 6, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(91, 4, 7, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(92, 4, 9, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(93, 4, 10, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(94, 4, 12, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(95, 4, 13, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(96, 4, 15, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(97, 4, 16, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(98, 4, 18, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(99, 4, 22, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(100, 4, 23, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(101, 4, 24, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(102, 4, 25, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(103, 4, 32, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(104, 4, 33, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(105, 4, 34, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(106, 4, 35, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(107, 1, 36, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(108, 2, 36, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(109, 3, 36, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(110, 4, 36, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(111, 1, 37, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(112, 2, 37, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(113, 3, 37, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(114, 4, 37, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(115, 1, 38, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(116, 1, 20, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(117, 1, 16, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(118, 1, 1, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(119, 1, 17, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(120, 1, 18, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(121, 1, 2, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(122, 1, 4, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(123, 3, 15, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(124, 1, 41, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(125, 1, 42, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(126, 1, 43, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(127, 1, 19, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(128, 2, 42, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(129, 1, 44, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(130, 1, 21, '2023-11-22 14:03:10', '2023-11-22 14:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_requests`
--

CREATE TABLE `subscribe_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `frequency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trail_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_modules`
--

CREATE TABLE `sub_modules` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_modules`
--

INSERT INTO `sub_modules` (`id`, `name`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin Dashboard', 1, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(2, 'Employee Dashboard', 1, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(3, 'All Employees', 2, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(4, 'Holidays', 3, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(5, 'Leaves (Supervisior)', 4, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(6, 'Leaves (HR)', 4, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(7, 'Leaves (Financial)', 4, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(8, 'Leaves (Employee)', 4, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(9, 'Leave Type', 4, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(10, 'Leave Settings', 4, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(11, 'Attendance (Admin)', 5, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(12, 'Attendance (Employee)', 5, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(13, 'Departments', 6, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(14, 'Designations', 7, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(15, 'Overtime (Supervisor)', 8, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(16, 'Overtime', 8, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(17, 'Add Performance', 10, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(18, 'Performance Appraisal', 9, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(19, 'performance-(employee)', 9, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(20, 'Employee Salary', 10, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(21, 'Payslip', 10, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(22, 'Payroll Items', 10, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(23, 'Promotion', 11, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(24, 'Resignation', 12, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(25, 'Termination', 13, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(28, 'Roles & Permissions', 14, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(29, 'Projects', 15, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(30, 'Assets', 16, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(31, 'Loan', 17, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(32, 'Client', 18, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(33, 'Ticket', 19, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(34, 'Company-Profile', 20, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(35, 'Email Setting', 21, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(36, 'Branches', 41, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(37, 'Work-Sheet', 42, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(38, 'Jobs', 43, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(39, 'Job Categories', 43, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(40, 'Job Applicants', 43, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(41, 'Leads', 44, '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(42, 'Deductions', 45, '2023-11-22 14:03:10', '2023-11-22 14:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board_status` int DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` int DEFAULT NULL,
  `due_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `complete_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_activities`
--

CREATE TABLE `task_activities` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file` text COLLATE utf8mb4_unicode_ci,
  `filename` text COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_lists`
--

CREATE TABLE `task_lists` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terminations`
--

CREATE TABLE `terminations` (
  `id` bigint UNSIGNED NOT NULL,
  `terminated_employee` int DEFAULT NULL,
  `termination_type` int DEFAULT NULL,
  `termination_date` date DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci,
  `approve_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approve_by` int DEFAULT NULL,
  `notice_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `termination_types`
--

CREATE TABLE `termination_types` (
  `id` bigint UNSIGNED NOT NULL,
  `termination_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `termination_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `termination_types`
--

INSERT INTO `termination_types` (`id`, `termination_name`, `termination_name_ar`, `created_at`, `updated_at`) VALUES
(1, 'Interruption of work', 'الانقطاع عن العمل', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(2, 'health disability', 'العجز الصحي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(3, 'Disciplinary dismissal', 'الفصل التأديبي ', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(4, 'Dismissal in the public interest', 'الفصل للمصلحة العامة', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(5, 'Unfair dismissal', 'الفصل التعسفي', '2023-11-22 14:03:10', '2023-11-22 14:03:10'),
(6, 'the retirement', 'التقاعد', '2023-11-22 14:03:10', '2023-11-22 14:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_staff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `followers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client` bigint UNSIGNED DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `photo_name` text COLLATE utf8mb4_unicode_ci,
  `ticket_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_activities`
--

CREATE TABLE `ticket_activities` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ticket_id` bigint UNSIGNED DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci,
  `file_name` text COLLATE utf8mb4_unicode_ci,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` int NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `transaction_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_approve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residence_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `family_member` int DEFAULT NULL,
  `relative` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_starting_date` date DEFAULT NULL,
  `contract_expiration_date` date DEFAULT NULL,
  `starting_work_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resident_leave_non_saudi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_card_expiry_date_non_Saudi` date DEFAULT NULL,
  `department` int DEFAULT NULL,
  `Job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_salary` int DEFAULT NULL,
  `transport_allowance` int DEFAULT NULL,
  `housing_allowance` int DEFAULT NULL,
  `housing_allowance_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_allowance` int DEFAULT NULL,
  `night_work_allowance` int DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reports_to` int DEFAULT NULL,
  `passport_no` bigint DEFAULT NULL,
  `childern_no` int DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_no` bigint DEFAULT NULL,
  `ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_contact_relationship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_contact_phone` int DEFAULT NULL,
  `second_contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_contact_relationship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_contact_phone` int DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `annual_leave` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int DEFAULT NULL,
  `housing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `email`, `email_verified_at`, `password`, `photo`, `birthday`, `religion`, `nationality`, `residence_number`, `upload_proof`, `employee_id`, `phone_number`, `home_number`, `address`, `marital_status`, `family_member`, `relative`, `contract_starting_date`, `contract_expiration_date`, `starting_work_date`, `resident_leave_non_saudi`, `work_card_expiry_date_non_Saudi`, `department`, `Job_title`, `basic_salary`, `transport_allowance`, `housing_allowance`, `housing_allowance_type`, `food_allowance`, `night_work_allowance`, `gender`, `state`, `country`, `reports_to`, `passport_no`, `childern_no`, `bank_name`, `bank_account_no`, `ifsc_code`, `pan_no`, `first_contact_name`, `first_contact_relationship`, `first_contact_phone`, `second_contact_name`, `second_contact_relationship`, `second_contact_phone`, `role_id`, `annual_leave`, `shift_from`, `shift_to`, `shift_duration`, `lang`, `branch_id`, `housing`, `food`, `transport`, `remember_token`, `token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'COMP 1', 'COMP 1', 'COMP 1', 'admin@comp1.com', NULL, '$2y$10$5xP5H6G8O3tn9MLtgpFqw.LDFZ1nnhZS2VJ2OlMQfnCollB9mz0JS', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1012034883', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'en', NULL, NULL, NULL, NULL, NULL, 'RQ4ZVpNeQHBAMcUTAsSaa6ckECz6FilekF9zLt8YKFilySvBAvaxEjDg7bUm', '2023-11-22 14:03:10', '2023-11-28 11:51:29', NULL),
(4, 'test', 'sales1', 'test sales1', 'sales1@app.com', NULL, '$2y$10$5xP5H6G8O3tn9MLtgpFqw.LDFZ1nnhZS2VJ2OlMQfnCollB9mz0JS', 'photos/P4R1fMZqCA6Qbp2jwdHiMHg8EsdlqUb6CAEbPbOI.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '1011941903', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', NULL, 'egypt', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mr5K66mD3A6Jmbv5nmyy3El4Y6PGvU4AaEYhEtXxfOa0nBpI8B3hbd7DIiiF', '2023-11-23 12:34:48', '2023-11-23 13:07:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_house_allowance`
--

CREATE TABLE `user_house_allowance` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` double NOT NULL,
  `amount_paid` double NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_leaves_custom_policies`
--

CREATE TABLE `user_leaves_custom_policies` (
  `id` bigint UNSIGNED NOT NULL,
  `policy_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `notification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_performances`
--

CREATE TABLE `user_performances` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `date_performance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `performance_action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `production_self_score` int DEFAULT NULL,
  `production_ro_score` int DEFAULT NULL,
  `process_improvement_self_score` int DEFAULT NULL,
  `process_improvement_ro_score` int DEFAULT NULL,
  `team_management_self_score` int DEFAULT NULL,
  `team_management_ro_score` int DEFAULT NULL,
  `knowledge_sharing_self_score` int DEFAULT NULL,
  `knowledge_sharing_ro_score` int DEFAULT NULL,
  `reporting_communication_self_score` int DEFAULT NULL,
  `reporting_communication_ro_score` int DEFAULT NULL,
  `attendance_planned_unplanned_leaves_self_score` int DEFAULT NULL,
  `attendance_planned_unplanned_leaves_ro_score` int DEFAULT NULL,
  `attendance_time_consciousness_self_score` int DEFAULT NULL,
  `attendance_time_consciousness_ro_score` int DEFAULT NULL,
  `attitude_behavior_team_collaboration_self_score` int DEFAULT NULL,
  `attitude_behavior_team_collaboration_ro_score` int DEFAULT NULL,
  `attitude_behavior_professionalism_responsiveness_self_score` int DEFAULT NULL,
  `attitude_behavior_professionalism_responsiveness_ro_score` int DEFAULT NULL,
  `policy_procedures_self_score` int DEFAULT NULL,
  `policy_procedures_ro_score` int DEFAULT NULL,
  `initiatives_self_score` int DEFAULT NULL,
  `initiatives_ro_score` int DEFAULT NULL,
  `continuous_skill_improvement_self_score` int DEFAULT NULL,
  `continuous_skill_improvement_ro_score` int DEFAULT NULL,
  `employee_action` int DEFAULT NULL,
  `employee_objection` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_professional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_personal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_comment` text COLLATE utf8mb4_unicode_ci,
  `hr_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscribers`
--

CREATE TABLE `user_subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` int NOT NULL,
  `plan_id` int NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_paid` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_sheet`
--

CREATE TABLE `work_sheet` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int DEFAULT NULL,
  `attendance_type` text COLLATE utf8mb4_unicode_ci,
  `shift_from` text COLLATE utf8mb4_unicode_ci,
  `shift_to` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zkteco_devices`
--

CREATE TABLE `zkteco_devices` (
  `id` bigint UNSIGNED NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activites`
--
ALTER TABLE `activites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_users`
--
ALTER TABLE `activity_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_months`
--
ALTER TABLE `attendance_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_types`
--
ALTER TABLE `attendance_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_clients`
--
ALTER TABLE `company_clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_clients_email_unique` (`email`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_code`);

--
-- Indexes for table `deduction_limits`
--
ALTER TABLE `deduction_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo_requests`
--
ALTER TABLE `demo_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_informations`
--
ALTER TABLE `education_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_configs`
--
ALTER TABLE `email_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_leave_settings`
--
ALTER TABLE `email_leave_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `family_informations`
--
ALTER TABLE `family_informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_out_logs`
--
ALTER TABLE `in_out_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_activities`
--
ALTER TABLE `lead_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves_custom_policies`
--
ALTER TABLE `leaves_custom_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_policies`
--
ALTER TABLE `leave_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_settings`
--
ALTER TABLE `leave_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_setting_configs`
--
ALTER TABLE `leave_setting_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtime_types`
--
ALTER TABLE `overtime_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_items`
--
ALTER TABLE `payroll_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performances`
--
ALTER TABLE `performances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_teams`
--
ALTER TABLE `project_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resignations`
--
ALTER TABLE `resignations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_modules`
--
ALTER TABLE `role_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscribe_requests`
--
ALTER TABLE `subscribe_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_modules`
--
ALTER TABLE `sub_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_activities`
--
ALTER TABLE `task_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_lists`
--
ALTER TABLE `task_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminations`
--
ALTER TABLE `terminations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termination_types`
--
ALTER TABLE `termination_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_activities`
--
ALTER TABLE `ticket_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_house_allowance`
--
ALTER TABLE `user_house_allowance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_house_allowance_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_leaves_custom_policies`
--
ALTER TABLE `user_leaves_custom_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_performances`
--
ALTER TABLE `user_performances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_subscribers`
--
ALTER TABLE `user_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_sheet`
--
ALTER TABLE `work_sheet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zkteco_devices`
--
ALTER TABLE `zkteco_devices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activites`
--
ALTER TABLE `activites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `activity_users`
--
ALTER TABLE `activity_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_months`
--
ALTER TABLE `attendance_months`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_types`
--
ALTER TABLE `attendance_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_clients`
--
ALTER TABLE `company_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deduction_limits`
--
ALTER TABLE `deduction_limits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demo_requests`
--
ALTER TABLE `demo_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education_informations`
--
ALTER TABLE `education_informations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_configs`
--
ALTER TABLE `email_configs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_leave_settings`
--
ALTER TABLE `email_leave_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_informations`
--
ALTER TABLE `family_informations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `in_out_logs`
--
ALTER TABLE `in_out_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lead_activities`
--
ALTER TABLE `lead_activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves_custom_policies`
--
ALTER TABLE `leaves_custom_policies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_policies`
--
ALTER TABLE `leave_policies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_settings`
--
ALTER TABLE `leave_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_setting_configs`
--
ALTER TABLE `leave_setting_configs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `overtime_types`
--
ALTER TABLE `overtime_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_items`
--
ALTER TABLE `payroll_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performances`
--
ALTER TABLE `performances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_teams`
--
ALTER TABLE `project_teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resignations`
--
ALTER TABLE `resignations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_modules`
--
ALTER TABLE `role_modules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `subscribe_requests`
--
ALTER TABLE `subscribe_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_modules`
--
ALTER TABLE `sub_modules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_activities`
--
ALTER TABLE `task_activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_lists`
--
ALTER TABLE `task_lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terminations`
--
ALTER TABLE `terminations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `termination_types`
--
ALTER TABLE `termination_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_activities`
--
ALTER TABLE `ticket_activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_house_allowance`
--
ALTER TABLE `user_house_allowance`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_leaves_custom_policies`
--
ALTER TABLE `user_leaves_custom_policies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_performances`
--
ALTER TABLE `user_performances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_subscribers`
--
ALTER TABLE `user_subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_sheet`
--
ALTER TABLE `work_sheet`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zkteco_devices`
--
ALTER TABLE `zkteco_devices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_house_allowance`
--
ALTER TABLE `user_house_allowance`
  ADD CONSTRAINT `user_house_allowance_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
