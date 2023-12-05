-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2023 at 09:06 AM
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
-- Database: `general_lead`
--

-- --------------------------------------------------------

--
-- Table structure for table `activites`
--

CREATE TABLE `activites` (
  `id` bigint UNSIGNED NOT NULL,
  `page_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` int DEFAULT '0',
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_users`
--

CREATE TABLE `activity_users` (
  `id` bigint UNSIGNED NOT NULL,
  `activity_id` int NOT NULL,
  `send_id` int NOT NULL,
  `receive_id` int NOT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL DEFAULT '0',
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `radius` double DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nfc_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tenants_id` int DEFAULT NULL,
  `theme_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employees_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company_business` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `business_registration_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `slug`, `email`, `phone`, `password`, `active`, `lat`, `lng`, `radius`, `photo`, `nfc_id`, `tenants_id`, `theme_color`, `email_verified_at`, `verification_token`, `created_at`, `updated_at`, `employees_number`, `company_business`, `company_name`, `currency`, `country`, `business_registration_number`) VALUES
(1, 'COMP 1', 'COMPANY1', 'admin@comp1.com', '01012034883', '$2y$10$TyFYk7UgHmw1.DY/AnQJfumEVyuZoLGqodFvfn.8PKtz8wxRg8cIW', 1, 12, 52, 22, NULL, NULL, 126, '', '2023-11-22 14:03:47', NULL, '2023-11-22 14:03:07', '2023-11-22 14:03:47', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `name_ar`, `created_at`, `updated_at`) VALUES
(1, 'Human Resources', 'الموارد بشرية', NULL, '2023-06-06 17:25:17'),
(2, 'Software Development', 'قسم التطوير والبرمجيات', '2023-06-06 17:23:52', '2023-06-06 17:23:52'),
(3, 'Sales', 'المبيعات', '2023-06-06 17:24:07', '2023-06-06 17:24:07'),
(4, 'Content Managment & E-Marketing ', 'اداره المحتوي والتسويق الالكتروني', '2023-06-06 17:26:20', '2023-06-06 17:26:20'),
(5, 'System Adminstration', 'اداره النظم', '2023-06-08 13:03:56', '2023-06-08 13:04:04'),
(6, 'Media Production & Web Development', 'المحتوي المرئي وتصميم المواقع', '2023-06-08 13:06:39', '2023-06-08 13:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead-activities`
--

CREATE TABLE `lead-activities` (
  `id` int NOT NULL,
  `lead_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `activity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `assign_staff` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `project_id` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'New',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int NOT NULL,
  `module_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', '2023-06-05 07:26:22', '2023-06-05 07:26:22'),
(2, 'Employees', '2023-06-05 07:26:22', '2023-06-05 07:26:22'),
(3, 'Holidays', '2023-06-05 07:26:22', '2023-06-05 07:26:22'),
(4, 'Leaves', '2023-06-05 07:26:22', '2023-06-05 07:26:22'),
(5, 'Attendance', '2023-06-05 07:26:22', '2023-06-05 07:26:22'),
(6, 'Departments', '2023-06-05 07:26:23', '2023-06-05 07:26:23'),
(7, 'Designations', '2023-06-05 07:26:23', '2023-06-05 07:26:23'),
(8, 'Overtime', '2023-06-05 07:26:23', '2023-06-05 07:26:23'),
(9, 'Performance', '2023-06-05 07:26:23', '2023-06-05 07:26:23'),
(10, 'Payroll', '2023-06-05 07:26:23', '2023-06-05 07:26:23'),
(11, 'Promotion', '2023-06-05 07:26:23', '2023-06-05 07:26:23'),
(12, 'Resignation', '2023-06-05 07:26:23', '2023-06-05 07:26:23'),
(13, 'Termination', '2023-06-05 07:26:23', '2023-06-05 07:26:23'),
(14, 'Roles & Permissions', '2023-06-05 07:26:23', '2023-06-05 07:26:23'),
(15, 'Projects', '2023-06-05 07:26:23', NULL),
(16, 'Assets', '2023-06-05 07:26:23', NULL),
(17, 'Loan', '2023-07-31 11:42:31', NULL),
(18, 'Client', '2023-07-31 11:42:31', NULL),
(19, 'Ticket', '2023-07-31 11:42:31', NULL),
(20, 'Company-Profile', '0000-00-00 00:00:00', NULL),
(21, 'Email Setting', '0000-00-00 00:00:00', NULL),
(41, 'Branches', '2023-06-05 07:26:22', '2023-06-05 07:26:22'),
(42, 'Work-Sheet', '2023-06-05 07:26:22', '2023-06-05 07:26:22'),
(43, 'Jobs', '2023-06-05 07:26:22', '2023-06-05 07:26:22'),
(44, 'Leads', '2023-06-05 07:26:22', '2023-06-05 07:26:22'),
(45, 'Deductions', '2023-06-05 07:26:22', '2023-06-05 07:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `description_en` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description_ar` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `description_en`, `description_ar`, `created_at`, `updated_at`) VALUES
(1, '<h2>Privacy Policy</h2><p>Our company is committed to protecting your privacy. This policy explains how we collect, use, and share your personal information.</p><h2>Information we collect</h2><p>We collect information that you provide to us, such as your name, email address, and phone number. We also collect information about how you use our website or mobile app, including the pages you visit and the links you click.</p><h2>How we use your information</h2><p>We use your information to provide you with our services, to communicate with you, and to improve our products and services. We may also use your information for marketing purposes, but only if you have given us your consent.</p><h2>Information we share</h2><p>We do not share your personal information with third parties, except as required by law or as necessary to provide you with our services.</p><h2>Cookies</h2><p>We use cookies to improve your experience on our website. You can disable cookies in your browser settings if you prefer not to receive them.</p><h2>Security</h2><p>We take the security of your personal information seriously and have measures in place to protect it from unauthorized access or disclosure.</p><h2>Changes to this policy</h2><p>We may update this policy from time to time. If we make significant changes, we will notify you by email or by posting a notice on our website.</p>', '<p><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel sodales mauris. Nunc accumsan mi massa, ut maximus magna ultricies et:</p><ol><li>Integer quam odio, ullamcorper id diam in, accumsan convallis libero. Duis at lacinia urna.</li><li>Mauris eget turpis sit amet purus pulvinar facilisis at sed lacus.</li><li>Quisque malesuada volutpat orci, accumsan scelerisque lorem pulvinar vitae.</li><li>Vestibulum sit amet sem aliquam, vestibulum nisi sed, sodales libero.</li></ol><h4>Aenean accumsan aliquam justo, et rhoncus est ullamcorper at</h4><p>Donec posuere dictum enim, vel sollicitudin orci tincidunt ac. Maecenas mattis ex eu elit tincidunt egestas. Vivamus posuere nunc vel metus bibendum varius. Vestibulum suscipit lacinia eros a aliquam. Sed dapibus arcu eget egestas hendrerit.</p><p>Vivamus consectetur metus at nulla efficitur mattis. Aenean egestas eu odio vestibulum vestibulum. Duis nulla lectus, lacinia vitae nibh vitae, sagittis interdum lacus. Mauris lacinia leo odio, eget finibus lectus pharetra ut. Nullam in semper enim, id gravida nulla.</p><p>Fusce gravida auctor justo, vel lobortis sem efficitur id. Cras eu eros vitae justo dictum tempor.</p><h4>Etiam sed fermentum lectus. Quisque vitae ipsum libero</h4><p>Phasellus sit amet vehicula arcu. Etiam pulvinar dui libero, vitae fringilla nulla convallis in. Fusce sagittis cursus nisl, at consectetur elit vestibulum vestibulum:</p><ul><li>Nunc pulvinar efficitur interdum.</li><li>Donec feugiat feugiat pulvinar.</li><li>Suspendisse eu risus feugiat, pellentesque arcu eu, molestie lorem.</li><li>Duis non leo commodo, euismod ipsum a, feugiat libero.</li></ul><h4>pulvinar</h4><p>Sed sollicitudin, diam nec tristique tincidunt, nulla ligula facilisis nunc, non condimentum tortor leo id ex.</p><p>Vivamus consectetur metus at nulla efficitur mattis. Aenean egestas eu odio vestibulum vestibulum. Duis nulla lectus, lacinia vitae nibh vitae, sagittis interdum lacus. Mauris lacinia leo odio, eget finibus lectus pharetra ut. Nullam in semper enim, id gravida nulla.</p><p>Donec posuere dictum enim, vel sollicitudin orci tincidunt ac. Maecenas mattis ex eu elit tincidunt egestas. Vivamus posuere nunc vel metus bibendum varius. Vestibulum suscipit lacinia eros a aliquam. Sed dapibus arcu eget egestas hendrerit.Donec posuere dictum enim, vel sollicitudin orci tincidunt ac. Maecenas mattis ex eu elit tincidunt egestas. Vivamus posuere nunc vel metus bibendum varius. Vestibulum suscipit lacinia eros a aliquam. Sed dapibus arcu eget egestas hendrerit.</p><h4>efficitur</h4><p>Fusce gravida auctor justo, vel lobortis sem efficitur id. Cras eu eros vitae justo dictum tempor.</p><p><strong>Vivamus posuere nunc vel metus bibendum varius. Vestibulum suscipit lacinia eros a aliquam. Sed dapibus arcu eget egestas hendrerit.Donec posuere dictum enim, vel sollicitudin orci tincidunt ac.</strong></p>', '2023-04-30 13:22:48', '2023-11-22 15:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `start_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_leader` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` int DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `project_teams`
--

CREATE TABLE `project_teams` (
  `id` int NOT NULL,
  `project_id` int DEFAULT NULL,
  `team_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` int NOT NULL,
  `name_en` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `frequency` varchar(255) DEFAULT NULL,
  `trail_days` varchar(255) DEFAULT NULL,
  `permission_id` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `name_en`, `name_ar`, `currency`, `price`, `frequency`, `trail_days`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 'test plan', 'plan', 'sar', 10000, 'Year', '14', '[\"1\",\"2\",\"6\",\"8\",\"15\",\"18\",\"19\",\"44\",\"20\"]', '2023-11-22 15:45:42', '2023-11-22 15:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `sub_modules`
--

CREATE TABLE `sub_modules` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_modules`
--

INSERT INTO `sub_modules` (`id`, `name`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 'Admin Dashboard', 1, '2023-07-31 12:44:57', NULL),
(2, 'Employee Dashboard', 1, '2023-07-31 12:44:57', NULL),
(3, 'All Employees', 2, '2023-07-31 12:44:57', NULL),
(4, 'Holidays', 3, '2023-07-31 12:44:57', NULL),
(5, 'Leaves (Supervisior)', 4, '2023-07-31 12:44:57', NULL),
(6, 'Leaves (HR)', 4, '2023-07-31 12:44:57', NULL),
(7, 'Leaves (Financial)', 4, '2023-07-31 12:44:57', NULL),
(8, 'Leaves (Employee)', 4, '2023-07-31 12:44:57', NULL),
(9, 'Leave Type', 4, '2023-07-31 12:44:57', NULL),
(10, 'Leave Settings', 4, '2023-07-31 12:44:57', NULL),
(11, 'Attendance (Admin)', 5, '2023-07-31 12:44:57', NULL),
(12, 'Attendance (Employee)', 5, '2023-07-31 12:44:57', NULL),
(13, 'Departments', 6, '2023-07-31 12:44:57', NULL),
(14, 'Designations', 7, '2023-07-31 12:44:57', NULL),
(15, 'Overtime (Supervisor)', 8, '2023-07-31 12:44:57', NULL),
(16, 'Overtime', 8, '2023-07-31 12:44:57', NULL),
(17, 'Add Performance', 10, '2023-07-31 12:44:57', NULL),
(18, 'Performance Appraisal', 9, '2023-07-31 12:44:57', NULL),
(19, 'performance-(employee)', 9, '2023-07-31 12:44:57', NULL),
(20, 'Employee Salary', 10, '2023-07-31 12:44:57', NULL),
(21, 'Payslip', 10, '2023-07-31 12:44:57', NULL),
(22, 'Payroll Items', 10, '2023-07-31 12:44:57', NULL),
(23, 'Promotion', 11, '2023-07-31 12:44:57', NULL),
(24, 'Resignation', 12, '2023-07-31 12:44:57', NULL),
(25, 'Termination', 13, '2023-07-31 12:44:57', NULL),
(28, 'Roles & Permissions', 14, '2023-07-31 12:44:57', NULL),
(29, 'Projects', 15, '2023-07-31 12:44:57', NULL),
(30, 'Assets', 16, '2023-07-31 12:44:57', NULL),
(31, 'Loan', 17, '2023-07-31 12:44:57', NULL),
(32, 'Client', 18, '2023-07-31 12:44:57', NULL),
(33, 'Ticket', 19, '2023-07-31 12:44:57', NULL),
(34, 'Company-Profile', 20, '2023-08-07 10:52:50', NULL),
(35, 'Email Setting', 21, '2023-07-31 12:44:57', NULL),
(36, 'Branches', 41, '2023-07-31 12:44:57', NULL),
(37, 'Work-Sheet', 42, '2023-07-31 12:44:57', NULL),
(38, 'Jobs', 43, '2023-07-31 12:44:57', NULL),
(39, 'Job Categories', 43, '2023-07-31 12:44:57', NULL),
(40, 'Job Applicants', 43, '2023-07-31 12:44:57', NULL),
(41, 'Leads', 44, '2023-07-31 12:44:57', NULL),
(42, 'Deductions', 45, '2023-07-31 12:44:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `employee_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `birthday` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nationality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `residence_number` bigint DEFAULT NULL,
  `upload_proof` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `home_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `marital_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `family_member` int DEFAULT NULL,
  `relative` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contract_starting_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contract_expiration_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `starting_work_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `resident_leave_non_saudi` int DEFAULT NULL,
  `work_card_expiry_date_non_Saudi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department` int DEFAULT NULL,
  `Job_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `basic_salary` int DEFAULT NULL,
  `transport_allowance` int DEFAULT '0',
  `housing_allowance` int DEFAULT '0',
  `food_allowance` int DEFAULT '0',
  `night_work_allowance` int DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reports_to` int DEFAULT NULL,
  `passport_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `childern_no` int DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bank_account_no` bigint DEFAULT NULL,
  `ifsc_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pan_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `first_contact_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `first_contact_relationship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `first_contact_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `second_contact_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `second_contact_relationship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `second_contact_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role_id` int NOT NULL DEFAULT '0',
  `annual_leave` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `shift_from` time DEFAULT NULL,
  `shift_to` time DEFAULT NULL,
  `shift_duration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '8',
  `lang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customer_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `email`, `email_verified_at`, `employee_id`, `password`, `photo`, `birthday`, `religion`, `nationality`, `residence_number`, `upload_proof`, `phone_number`, `home_number`, `address`, `marital_status`, `family_member`, `relative`, `contract_starting_date`, `contract_expiration_date`, `starting_work_date`, `resident_leave_non_saudi`, `work_card_expiry_date_non_Saudi`, `department`, `Job_title`, `basic_salary`, `transport_allowance`, `housing_allowance`, `food_allowance`, `night_work_allowance`, `gender`, `state`, `country`, `reports_to`, `passport_no`, `childern_no`, `bank_name`, `bank_account_no`, `ifsc_code`, `pan_no`, `first_contact_name`, `first_contact_relationship`, `first_contact_phone`, `second_contact_name`, `second_contact_relationship`, `second_contact_phone`, `role_id`, `annual_leave`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `shift_from`, `shift_to`, `shift_duration`, `lang`, `company_name`, `customer_code`, `token`) VALUES
(1, 'super', 'admin', 'Lead Super-Admin', 'admin@app.com', NULL, NULL, '$2y$10$yStk5RmeQVf74Yy2WRlp/Oh0DEI94tRhOwbKNyvnIVwk6OYeNtKDO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-11-29 08:49:19', NULL, NULL, NULL, '8', 'en', NULL, NULL, 'Vdm8Exl3wXjRjIwIBeDRvd5yIVOqWHzQAe2EtFwEyhG8074f8RCavAak4QW8');

-- --------------------------------------------------------

--
-- Table structure for table `user_subscribers`
--

CREATE TABLE `user_subscribers` (
  `id` int NOT NULL,
  `client_id` int NOT NULL,
  `plan_id` int NOT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `starting_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `end_date` timestamp NOT NULL,
  `is_paid` int NOT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trans_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_subscribers`
--

INSERT INTO `user_subscribers` (`id`, `client_id`, `plan_id`, `payment_status`, `starting_date`, `end_date`, `is_paid`, `total`, `created_at`, `updated_at`, `trans_id`, `order_id`) VALUES
(1, 15, 1, '1', '1-1-2022', '2025-08-13 21:00:00', 1, 1000, '2023-06-20 11:30:31', NULL, NULL, NULL),
(7, 26, 1, '1', '1-1-2022', '2023-10-26 10:29:30', 1, 6000, '2023-06-20 11:30:31', NULL, NULL, NULL),
(8, 14, 1, '1', '1-1-2022', '2023-07-26 10:29:30', 1, 1000, '2023-06-20 11:30:31', NULL, NULL, NULL),
(9, 14, 1, '1', '1-1-2022', '2023-07-11 13:16:22', 1, 1000, '2023-06-20 11:30:31', NULL, NULL, NULL),
(34, 1, 1, NULL, '2023-08-17 12:22:33', '2023-09-17 09:22:33', 0, 20, '2023-08-17 10:22:33', NULL, NULL, NULL),
(35, 1, 1, NULL, '2023-08-17 12:23:13', '2023-09-17 09:23:13', 0, 20, '2023-08-17 10:23:13', NULL, NULL, NULL),
(36, 1, 1, NULL, '2023-08-17 12:27:04', '2023-09-17 09:27:04', 0, 20, '2023-08-17 10:27:04', NULL, NULL, NULL),
(37, 1, 1, NULL, '2023-08-17 12:33:47', '2023-09-17 09:33:47', 0, 20, '2023-08-17 10:33:47', NULL, NULL, NULL),
(38, 1, 1, NULL, '2023-08-17 12:38:01', '2023-09-17 09:38:01', 0, 20, '2023-08-17 10:38:01', NULL, NULL, NULL),
(39, 1, 1, NULL, '2023-08-17 12:39:43', '2023-09-17 09:39:43', 0, 20, '2023-08-17 10:39:43', NULL, NULL, NULL),
(40, 1, 1, NULL, '2023-08-17 12:41:32', '2023-09-17 09:41:32', 1, 20, '2023-08-17 10:41:32', NULL, '126225030', NULL),
(41, 1, 1, NULL, '2023-08-17 12:52:47', '2023-09-17 09:52:47', 1, 20, '2023-08-17 10:52:47', NULL, '126226721', NULL),
(44, 15, 1, NULL, '2023-08-17 13:15:22', '2023-09-17 10:15:22', 0, 20, '2023-08-17 11:15:22', NULL, NULL, NULL),
(45, 15, 1, NULL, '2023-08-17 13:42:31', '2023-09-17 10:42:31', 0, 20, '2023-08-17 11:42:31', NULL, NULL, NULL),
(46, 15, 1, 'Approved', '2023-08-20 09:08:07', '2023-09-20 06:08:07', 1, 20, '2023-08-20 07:08:07', NULL, '126809473', NULL),
(47, 15, 1, NULL, '2023-08-24 10:30:26', '2023-09-24 07:30:26', 0, 20, '2023-08-24 08:30:26', NULL, NULL, NULL),
(48, 15, 1, 'Approved', '2023-08-24 10:30:45', '2023-09-24 07:30:45', 1, 20, '2023-08-24 08:30:45', NULL, '127619612', NULL),
(49, 15, 1, 'Approved', '2023-08-24 10:33:20', '2023-09-24 07:33:20', 1, 20, '2023-08-24 08:33:20', NULL, '127619932', NULL),
(53, 15, 6, NULL, '2023-08-24 14:36:35', '2023-09-24 11:36:35', 0, 120, '2023-08-24 12:36:35', NULL, NULL, NULL),
(54, 15, 3, NULL, '2023-08-24 14:39:54', '2024-08-24 11:39:54', 0, 800, '2023-08-24 12:39:54', NULL, NULL, NULL),
(55, 15, 1, 'Approved', '2023-08-24 10:33:20', '2023-09-14 07:48:13', 1, 20, '2023-08-24 08:33:20', NULL, '127619932', NULL),
(56, 64, 6, NULL, '2023-09-14 12:35:08', '2023-10-14 09:35:08', 0, 120, '2023-09-14 10:35:08', NULL, NULL, NULL),
(57, 64, 6, NULL, '2023-09-14 12:35:34', '2023-10-14 09:35:34', 0, 120, '2023-09-14 10:35:34', NULL, NULL, NULL),
(58, 64, 3, NULL, '2023-09-14 15:31:24', '2024-09-14 12:31:24', 0, 800, '2023-09-14 13:31:24', NULL, NULL, NULL),
(59, 64, 3, NULL, '2023-09-14 15:35:49', '2024-09-14 12:35:49', 0, NULL, '2023-09-14 12:35:49', '2023-09-14 12:35:49', NULL, NULL),
(60, 64, 3, NULL, '2023-09-14 16:09:40', '2024-09-14 13:09:40', 0, NULL, '2023-09-14 13:09:40', '2023-09-14 13:09:40', NULL, NULL),
(61, 64, 1, NULL, '2023-09-14 16:15:25', '2023-10-14 13:15:25', 0, NULL, '2023-09-14 13:15:25', '2023-09-14 13:15:25', NULL, NULL),
(62, 64, 3, NULL, '2023-09-14 16:16:59', '2024-09-14 13:16:59', 0, NULL, '2023-09-14 13:16:59', '2023-09-14 13:16:59', NULL, NULL),
(63, 64, 3, 'Approved', '2023-09-14 16:19:48', '2024-09-14 13:19:48', 1, NULL, '2023-09-14 13:19:48', '2023-09-14 13:19:48', '132065233', '150522163');

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
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lead-activities`
--
ALTER TABLE `lead-activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_subscribers`
--
ALTER TABLE `user_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activites`
--
ALTER TABLE `activites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_users`
--
ALTER TABLE `activity_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lead-activities`
--
ALTER TABLE `lead-activities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_teams`
--
ALTER TABLE `project_teams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_modules`
--
ALTER TABLE `sub_modules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_subscribers`
--
ALTER TABLE `user_subscribers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
