-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2024 at 05:51 AM
-- Server version: 10.6.18-MariaDB-cll-lve-log
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmclplvx_cleaning`
--

-- --------------------------------------------------------

--
-- Table structure for table `addvances`
--

CREATE TABLE `addvances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deposit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` double NOT NULL,
  `materials` double NOT NULL,
  `discount` double NOT NULL,
  `subtotal` double NOT NULL,
  `paid_amount` double NOT NULL,
  `payment` smallint(6) NOT NULL DEFAULT 0 COMMENT '0=>cash,1=>card',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ref_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cleaners_count` smallint(6) NOT NULL DEFAULT 1,
  `cleaners_assign` smallint(6) NOT NULL DEFAULT 0,
  `hours` smallint(6) NOT NULL DEFAULT 0,
  `days` smallint(6) NOT NULL DEFAULT 0,
  `months` smallint(6) NOT NULL DEFAULT 0,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `hours_cost` double NOT NULL DEFAULT 0,
  `days_cost` double NOT NULL DEFAULT 0,
  `month_cost` double NOT NULL DEFAULT 0,
  `material_cost` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL DEFAULT 0,
  `total` double NOT NULL DEFAULT 0,
  `status` smallint(6) NOT NULL DEFAULT 0 COMMENT '0=>new,1=>approved,2=>in Schedule, 3=>completed, 4=>rejected\r\n',
  `payment` smallint(6) NOT NULL DEFAULT 0 COMMENT '0=>cash,1=>card',
  `paid_amount` double NOT NULL DEFAULT 0,
  `type` smallint(6) NOT NULL DEFAULT 0 COMMENT '0=>booking, 1=>Hiring',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `service_id`, `ref_no`, `address`, `cleaners_count`, `cleaners_assign`, `hours`, `days`, `months`, `start_date`, `end_date`, `start_time`, `end_time`, `hours_cost`, `days_cost`, `month_cost`, `material_cost`, `discount`, `total`, `status`, `payment`, `paid_amount`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 24, 10, 'JM20240613200815', 'Al Nahda\r\nAbdulahzis A2', 2, 2, 8, 0, 0, '2024-06-14 08:00:00', '2024-06-14 16:00:00', NULL, NULL, 560, 0, 0, 80, 0, 640, 2, 0, 0, 0, '2024-06-14 00:08:15', '2024-06-14 00:15:45', NULL),
(5, 25, 10, 'JM20240613202234', 'Al muteena', 3, 3, 10, 0, 0, '2024-06-14 08:00:00', '2024-06-14 18:00:00', NULL, NULL, 1050, 0, 0, 150, 0, 1200, 2, 0, 0, 0, '2024-06-14 00:22:34', '2024-06-14 23:15:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction` text NOT NULL,
  `deposit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`id`, `transaction`, `deposit`, `credit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test deposit', 1000, 0, '2024-05-25 20:32:04', '2024-05-25 20:32:04', NULL),
(2, 'LOAD', 50, 0, '2024-06-05 01:07:34', '2024-06-05 01:07:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cleaners_schedule`
--

CREATE TABLE `cleaners_schedule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_job` timestamp NULL DEFAULT NULL,
  `end_job` timestamp NULL DEFAULT NULL,
  `type` smallint(6) NOT NULL DEFAULT 1 COMMENT '1=>booking,2=>dayoff,3=>permission',
  `leave_id` bigint(20) DEFAULT NULL,
  `booking_id` bigint(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cleaners_schedule`
--

INSERT INTO `cleaners_schedule` (`id`, `user_id`, `start_job`, `end_job`, `type`, `leave_id`, `booking_id`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 18, '2024-06-14 08:00:00', '2024-06-14 16:00:00', 5, NULL, 4, 'Booking No.JM20240613200815', '2024-06-14 00:15:45', '2024-06-14 00:15:45', NULL),
(2, 23, '2024-06-14 08:00:00', '2024-06-14 16:00:00', 5, NULL, 4, 'Booking No.JM20240613200815', '2024-06-14 00:15:45', '2024-06-14 00:15:45', NULL),
(3, 23, '2024-06-14 08:00:00', '2024-06-14 18:00:00', 5, NULL, 5, 'Booking No.JM20240613202234', '2024-06-14 23:15:54', '2024-06-14 23:15:54', NULL),
(4, 20, '2024-06-14 08:00:00', '2024-06-14 18:00:00', 5, NULL, 5, 'Booking No.JM20240613202234', '2024-06-14 23:15:54', '2024-06-14 23:15:54', NULL),
(5, 21, '2024-06-14 08:00:00', '2024-06-14 18:00:00', 5, NULL, 5, 'Booking No.JM20240613202234', '2024-06-14 23:15:54', '2024-06-14 23:15:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `added_by` smallint(6) NOT NULL DEFAULT 0 COMMENT '0=>registration, 1=>admin',
  `last_booking` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `address_sec` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `added_by`, `last_booking`, `address`, `address_sec`, `notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 24, 0, '13-06-2024', 'Al Nahda\r\nAbdulahzis A2', NULL, NULL, '2024-06-14 00:08:14', '2024-06-14 00:08:15', NULL),
(5, 25, 0, '13-06-2024', 'Al muteena', NULL, NULL, '2024-06-14 00:22:33', '2024-06-14 00:22:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nationality_id` bigint(20) UNSIGNED NOT NULL,
  `code` bigint(20) NOT NULL,
  `position` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `join_date` varchar(255) DEFAULT NULL,
  `gender` smallint(6) NOT NULL DEFAULT 0 COMMENT '0=female, 1=male',
  `passport_no` varchar(255) DEFAULT NULL,
  `passport_expired_date` varchar(255) DEFAULT NULL,
  `em_id` varchar(255) DEFAULT NULL,
  `em_id_expired_date` varchar(255) DEFAULT NULL,
  `salary_bank_account` varchar(255) DEFAULT NULL,
  `salary` double NOT NULL DEFAULT 0,
  `overtime` double NOT NULL DEFAULT 0,
  `allowance` double NOT NULL DEFAULT 0,
  `status` smallint(6) NOT NULL DEFAULT 0 COMMENT '0=inactive, 1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `nationality_id`, `code`, `position`, `birth_date`, `join_date`, `gender`, `passport_no`, `passport_expired_date`, `em_id`, `em_id_expired_date`, `salary_bank_account`, `salary`, `overtime`, `allowance`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 16, 1, 16, 'Cleaner', '1997-08-09 13:49:51', '2024-05-30 13:49:51', 0, 'P8773755B', '2032-01-25 13:49:51', NULL, NULL, NULL, 0, 0, 0, 1, '2024-06-05 21:25:46', '2024-06-12 17:49:51', NULL),
(15, 17, 1, 17, 'Cleaner', '1993-03-01 13:50:43', '2024-05-30 13:50:43', 0, 'P8708625B', '2032-01-16 13:50:43', NULL, NULL, NULL, 0, 0, 0, 1, '2024-06-12 17:45:55', '2024-06-12 17:52:11', NULL),
(16, 18, 1, 18, 'Cleaner', '1996-03-28 14:42:44', '2024-05-30 14:42:44', 0, 'P0213038B', '2029-01-11 14:42:44', NULL, NULL, NULL, 0, 0, 0, 1, '2024-06-12 18:42:44', '2024-06-12 18:43:24', NULL),
(17, 19, 1, 19, 'Cleaner', '1989-02-25 14:46:17', '2024-06-04 14:46:17', 0, 'P5111533B', '2030-03-11 14:46:17', NULL, NULL, NULL, 0, 0, 0, 1, '2024-06-12 18:46:17', '2024-06-12 18:46:37', NULL),
(18, 20, 1, 20, 'Cleaner', '1995-06-01 14:49:02', '2024-06-04 14:49:02', 0, 'P8796002A', '2028-09-18 14:49:02', NULL, NULL, NULL, 0, 0, 0, 1, '2024-06-12 18:49:02', '2024-06-12 19:18:34', NULL),
(19, 21, 1, 21, 'Cleaner', '1992-10-20 15:18:22', '2024-06-07 15:18:22', 0, 'P8422529B', '2031-12-08 15:18:22', NULL, NULL, NULL, 0, 0, 0, 1, '2024-06-12 19:18:22', '2024-06-12 19:18:43', NULL),
(20, 22, 1, 22, 'Cleaner', '1982-09-21 14:14:22', '2024-06-09 14:14:22', 0, 'P0149860C', '2032-05-18 14:14:22', NULL, NULL, NULL, 0, 0, 0, 1, '2024-06-13 17:40:23', '2024-06-13 18:14:35', NULL),
(21, 23, 1, 23, 'Cleaner', '2024-06-13 15:13:07', '2024-06-04 15:13:07', 0, 'P3507197C', '2033-03-08 15:13:07', NULL, NULL, NULL, 0, 0, 0, 1, '2024-06-13 19:13:07', '2024-06-13 19:13:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees_accounts`
--

CREATE TABLE `employees_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deposit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees_history`
--

CREATE TABLE `employees_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `action` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_history`
--

INSERT INTO `employees_history` (`id`, `employee_id`, `user_id`, `action`, `created_at`, `updated_at`, `deleted_at`) VALUES
(29, 14, 1, 'Update  Employee Information By Developer', '2024-06-10 23:28:51', '2024-06-10 23:28:51', NULL),
(30, 14, 1, 'Update  Employee Information By Developer', '2024-06-10 23:49:08', '2024-06-10 23:49:08', NULL),
(57, 16, 1, 'Submit Booking NO.JM20240613200815 By Developer', '2024-06-14 00:15:45', '2024-06-14 00:15:45', NULL),
(58, 21, 1, 'Submit Booking NO.JM20240613200815 By Developer', '2024-06-14 00:15:45', '2024-06-14 00:15:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` smallint(6) NOT NULL DEFAULT 1 COMMENT '1=>Annual Leave,2=>Sick Leave,3=>permission,4=>offday',
  `start_at` varchar(255) NOT NULL,
  `end_at` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_24_184054_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(7, 'App\\Models\\User', 16),
(7, 'App\\Models\\User', 17),
(7, 'App\\Models\\User', 18),
(7, 'App\\Models\\User', 19),
(7, 'App\\Models\\User', 20),
(7, 'App\\Models\\User', 21),
(7, 'App\\Models\\User', 22),
(7, 'App\\Models\\User', 23),
(8, 'App\\Models\\User', 7),
(8, 'App\\Models\\User', 9),
(8, 'App\\Models\\User', 14),
(8, 'App\\Models\\User', 24),
(8, 'App\\Models\\User', 25);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0 COMMENT '0=inactive, 1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name_en`, `name_ar`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Philippines', 'فيلبيني', 1, '2024-05-28 16:54:36', '2024-05-28 17:02:05', NULL),
(2, 'Nepal', 'نيبال', 0, '2024-05-28 16:54:58', '2024-05-28 16:54:58', NULL),
(3, 'Sri Lanka', 'سيريلانكا', 0, '2024-05-28 16:55:34', '2024-05-28 16:55:34', NULL),
(4, 'Indonesia', 'إندونيسيا', 0, '2024-05-28 16:57:38', '2024-05-28 17:01:57', NULL),
(5, 'Miyanmar', 'ميانمار', 0, '2024-05-28 16:58:30', '2024-05-28 16:58:30', NULL),
(6, 'Indian', 'هندي', 0, '2024-05-28 20:22:08', '2024-05-28 20:22:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities_history`
--

CREATE TABLE `nationalities_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nationality_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `action` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_employees_transactions`
--

CREATE TABLE `other_employees_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deposit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `over_times`
--

CREATE TABLE `over_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deposit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2024-05-25 05:00:49', '2024-05-25 05:00:49'),
(2, 'role-create', 'web', '2024-05-25 05:00:49', '2024-05-25 05:00:49'),
(3, 'role-edit', 'web', '2024-05-25 05:00:49', '2024-05-25 05:00:49'),
(4, 'role-delete', 'web', '2024-05-25 05:00:49', '2024-05-25 05:00:49'),
(5, 'product-list', 'web', '2024-05-25 05:00:49', '2024-05-25 05:00:49'),
(6, 'product-create', 'web', '2024-05-25 05:00:49', '2024-05-25 05:00:49'),
(7, 'product-edit', 'web', '2024-05-25 05:00:49', '2024-05-25 05:00:49'),
(8, 'product-delete', 'web', '2024-05-25 05:00:50', '2024-05-25 05:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Owner', 'web', '2024-05-25 05:00:50', '2024-05-25 05:00:50'),
(2, 'Admin', 'web', '2024-05-25 05:00:51', '2024-05-25 05:00:51'),
(3, 'HR', 'web', '2024-05-25 05:00:51', '2024-05-25 05:00:51'),
(4, 'Accountant', 'web', '2024-05-25 05:00:51', '2024-05-25 05:00:51'),
(5, 'Booking', 'web', '2024-05-25 05:00:51', '2024-05-25 05:00:51'),
(6, 'Marketing', 'web', '2024-05-25 05:00:51', '2024-05-25 05:00:51'),
(7, 'Cleaner', 'web', '2024-05-25 05:00:52', '2024-05-25 05:00:52'),
(8, 'Customer', 'web', '2024-05-25 05:00:52', '2024-05-25 05:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deposit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `m_price` double NOT NULL DEFAULT 0,
  `d_price` double NOT NULL DEFAULT 0,
  `h_price` double NOT NULL DEFAULT 0,
  `status` smallint(6) NOT NULL DEFAULT 0 COMMENT '0=inactive, 1=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name_en`, `name_ar`, `m_price`, `d_price`, `h_price`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'House Care', 'العناية بالمنزل', 7280, 280, 35, 1, '2024-05-27 12:07:12', '2024-05-28 16:52:36', NULL),
(2, 'Maid Training', 'تدريب الخادمة', 7280, 280, 35, 1, '2024-05-27 12:08:49', '2024-05-28 16:52:00', NULL),
(3, 'Deep Cleaning', 'تنظيف عميق', 7280, 280, 35, 1, '2024-05-27 12:09:24', '2024-05-28 16:51:19', NULL),
(4, 'Dog Servant', 'خادم الكلب', 7280, 280, 35, 1, '2024-05-27 12:09:56', '2024-05-28 16:50:33', NULL),
(5, 'Hotel Child Care', 'رعاية الأطفال بالفندق', 7280, 280, 35, 1, '2024-05-27 12:10:30', '2024-05-28 16:49:46', NULL),
(6, 'Office Care', 'العناية بالمكتب', 7280, 280, 35, 1, '2024-05-27 12:10:51', '2024-05-28 16:48:50', NULL),
(7, 'Office Boy', 'مكتب الصبي', 7280, 280, 35, 1, '2024-05-27 12:11:36', '2024-06-05 00:30:01', NULL),
(8, 'House Cleaning', 'تنظيف المنزل', 7280, 2580, 35, 1, '2024-05-27 12:11:59', '2024-05-28 16:47:34', NULL),
(9, 'Flats Cleaning', 'تنظيف الشقق', 7280, 2580, 35, 1, '2024-05-27 12:12:19', '2024-06-05 00:53:59', NULL),
(10, 'Apartment Cleaning', 'تنظيف الشقة', 7280, 280, 35, 1, '2024-05-27 12:12:51', '2024-05-28 17:00:30', NULL),
(11, 'Office Cleaning', 'تنظيف مكاتب', 7280, 2580, 35, 1, '2024-05-27 12:13:23', '2024-05-28 16:37:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_history`
--

CREATE TABLE `services_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `action` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_history`
--

INSERT INTO `services_history` (`id`, `service_id`, `user_id`, `action`, `created_at`, `updated_at`, `deleted_at`) VALUES
(31, 11, 1, 'Updated  By Developer', '2024-05-28 16:37:14', '2024-05-28 16:37:14', NULL),
(32, 11, 1, 'Updated  By Developer', '2024-05-28 16:37:29', '2024-05-28 16:37:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name_en`, `name_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Communication', 'تواصل', '2024-05-27 18:51:34', '2024-06-06 14:51:45', NULL),
(2, 'MOP', 'ممسحة', '2024-05-27 18:52:08', '2024-06-06 14:51:10', NULL),
(3, 'DUSTING', 'الغبار', '2024-05-27 18:52:15', '2024-06-06 14:50:37', NULL),
(4, 'SERVICES', 'خدمات', '2024-05-27 18:52:33', '2024-06-06 14:50:12', NULL),
(5, 'HOUSEKEEPING', 'التدبير المنزلي', '2024-05-27 18:52:42', '2024-06-06 14:49:45', NULL),
(6, 'TIME MANAGEMENT', 'إدارة الوقت', '2024-05-27 18:52:53', '2024-06-06 14:49:10', NULL),
(7, 'CLEANING EXPERIENCE', 'تجربة التنظيف', '2024-05-27 18:59:25', '2024-06-06 14:48:37', NULL),
(8, 'ATTENTION TO DETAILS', 'الاهتمام بالتفاصيل', '2024-05-27 18:59:48', '2024-06-06 14:47:46', NULL),
(9, 'DETAILS ORIENTED', 'التفاصيل الموجهة', '2024-05-27 18:59:58', '2024-06-06 14:46:07', NULL),
(10, 'ABILITY TO WORK AUTONOMOUSLY', 'القدرة على العمل بشكل مستقل', '2024-05-27 19:00:31', '2024-06-06 14:33:00', NULL),
(11, 'FITNESS', 'لياقة بدنية', '2024-05-27 19:00:42', '2024-06-06 14:31:34', NULL),
(12, 'VACUM CLEANER', 'مكنسة كهربائية', '2024-05-27 19:00:49', '2024-06-06 14:30:40', NULL),
(13, 'DISINFECTANT', 'مطهر', '2024-05-27 19:01:36', '2024-06-06 14:29:49', NULL),
(14, 'BILINGUAL', 'ثنائي اللغة', '2024-05-27 19:02:00', '2024-06-06 14:29:04', NULL),
(15, 'FURNITURE', 'أثاث', '2024-05-27 19:03:22', '2024-06-06 14:25:36', NULL),
(16, 'SWEEPING', 'كنس', '2024-05-27 19:03:31', '2024-06-06 14:24:30', NULL),
(17, 'CARPET', 'سجادة', '2024-05-27 19:03:48', '2024-06-06 14:22:37', NULL),
(18, 'TECHNICAL CLEANING', NULL, '2024-05-27 19:04:21', '2024-05-27 21:51:25', '2024-05-27 21:51:25'),
(19, 'TECHNICAL  CLEANING', 'التنظيف الفني', '2024-05-27 19:05:28', '2024-06-05 00:46:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills_history`
--

CREATE TABLE `skills_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `action` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `passport_copy` varchar(255) DEFAULT NULL,
  `em_copy` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `role_name`, `photo`, `passport_copy`, `em_copy`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 'info@smart-solutions.live', '0502516985', NULL, '$2y$10$9VPAVEOUb2WwFNoxe9F87e3QbfdaTyrrlhwOnDtwRjYf18Kv0dhiy', 'Owner', NULL, NULL, NULL, 1, NULL, '2024-05-25 05:00:50', '2024-05-25 05:00:50'),
(7, 'paloma', 'rosietomas95@Gmail.com', '0564312249', NULL, '$2y$10$buklazwCZjsZeJFkr1UxAuBB3WatRP6XfUqmLEbepTb/DcfyISiX.', 'Customer', NULL, NULL, NULL, 1, NULL, '2024-06-04 22:22:34', '2024-06-04 22:22:34'),
(9, 'mmmmmm', NULL, '05030870011', NULL, '$2y$10$4X1I2zpVAwE2hH3tCsEMu.AMMbP7FBxdZ0l9lWhpGjgwqYGlC7Pee', 'Customer', NULL, NULL, NULL, 1, NULL, '2024-06-05 00:34:47', '2024-06-05 00:34:47'),
(14, 'ED3R34543', 'nanzFD@jmcleaningserv.net', 'O502145577878', NULL, '$2y$10$UdCTye8l/y42PDMQp1kpp./gLsaJZ58sI0q.j4ei8rWiMrQM.74WO', 'Customer', NULL, NULL, NULL, 1, NULL, '2024-06-05 01:57:02', '2024-06-05 01:57:32'),
(16, 'Joan Maro', 'joancmaro09@gmail.com', '054444134', NULL, '$2y$10$MOp8XBfi10DjpCPAk47kGOmEA5MwAl4Xv0zha5Irha5uSFeWFttVG', 'Cleaner', '1718276245.jpeg', NULL, NULL, 0, NULL, '2024-06-05 21:25:46', '2024-06-13 18:57:25'),
(17, 'Lyka Cabase', 'cabaselyka2@gmail.com', '0551089764', NULL, '$2y$10$oG9/PkA8Df64EY5QTWMIp.UGickHnMHIn8RrhNFzKAP7zpQh.6Wcy', 'Cleaner', '1718276225.jpeg', NULL, NULL, 0, NULL, '2024-06-12 17:45:55', '2024-06-13 18:57:05'),
(18, 'Willyne Gie Hemoroz', 'Hemorozliamgie@gmail.com', '0565925389', NULL, '$2y$10$H1TIYxDyUYSsNkDeD93ImOSeFGJ.5oWDt27DOSpzwihfF9PaU1oMG', 'Cleaner', '1718276207.jpeg', NULL, NULL, 0, NULL, '2024-06-12 18:42:44', '2024-06-13 18:56:47'),
(19, 'Amal Amerol', 'amalamerol34@gmail.com', '0509151105', NULL, '$2y$10$fMtXomcmFRfHqUaZQVv0RuFo5aI2gbL6hB88Tbm46EEfrQYLm8UYW', 'Cleaner', '1718276181.jpeg', NULL, NULL, 0, NULL, '2024-06-12 18:46:17', '2024-06-13 18:56:21'),
(20, 'Joanna Marie Abarquez', 'abarquezjoannamarie143@gmail.com', '0528391848', NULL, '$2y$10$9UhyxKN.QeF4/zHb8p6ChezLXpy/G9y/yrhGUkI.xvo5zQx1elXxy', 'Cleaner', NULL, NULL, NULL, 0, NULL, '2024-06-12 18:49:02', '2024-06-12 18:49:02'),
(21, 'Krizel Rosales', 'krizelrosales92@gmail.com', '0509700767', NULL, '$2y$10$sbDGVRoe.iGx3dIqh8vreOF3p1PSnh5epcSi8EbTc289syWcUUYgG', 'Cleaner', '1718276268.jpeg', NULL, NULL, 0, NULL, '2024-06-12 19:18:22', '2024-06-13 18:57:48'),
(22, 'Ana Gayramon Bacot', 'anabacot5@gmail.com', '0563368939', NULL, '$2y$10$UOZFppaKrU.s5aZWuJ3zruuobbZ3ncRG5Nc7KMW3UEBa.vYSQu6r2', 'Cleaner', NULL, NULL, NULL, 0, NULL, '2024-06-13 17:40:23', '2024-06-13 17:40:23'),
(23, 'Crismae Faith Agomoo', 'crismaefaithagomoo@gmail.com', '0581184891', NULL, '$2y$10$d5gShSefNzfBmCkU4.I9FOiUxWjHyN4EulFMDj2EVQGk2ZFbKiOQ.', 'Cleaner', '1718277212.jpeg', NULL, NULL, 0, NULL, '2024-06-13 19:13:07', '2024-06-13 19:13:32'),
(24, 'Chancy supsup', 'rachojn214@gmail.com', '0561069053', NULL, '$2y$10$WFPeD4HWzq72mvl04Cm7FucugW2ppE7r7r/MSDg.m.W4v6D.Er3P.', 'Customer', NULL, NULL, NULL, 1, NULL, '2024-06-14 00:08:14', '2024-06-14 00:08:14'),
(25, 'Jenny', 'eddrojas199229@gmail.com', '+971555409808', NULL, '$2y$10$AaqYPCTAJnL50NSX/gQds.irK3QPpji8fdpJ6/AxY.MKxmm30SMGO', 'Customer', NULL, NULL, NULL, 1, NULL, '2024-06-14 00:22:33', '2024-06-14 00:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `users_activities`
--

CREATE TABLE `users_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `action` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_activities`
--

INSERT INTO `users_activities` (`id`, `user_id`, `action`, `created_at`, `updated_at`, `deleted_at`) VALUES
(51, 1, 'Update Service Office Cleaning', '2024-05-28 16:37:14', '2024-05-28 16:37:14', NULL),
(52, 1, 'Update Service Office Cleaning', '2024-05-28 16:37:29', '2024-05-28 16:37:29', NULL),
(84, 1, 'Update Information For Employee Alex', '2024-05-30 22:13:31', '2024-05-30 22:13:31', NULL),
(85, 1, 'Update Information For Employee Alex', '2024-05-30 22:13:56', '2024-05-30 22:13:56', NULL),
(86, 1, 'Update Information For Employee Rose', '2024-05-30 22:14:30', '2024-05-30 22:14:30', NULL),
(87, 1, 'Register Employee for test mail', '2024-06-01 18:57:17', '2024-06-01 18:57:17', NULL),
(88, 1, 'Register Employee for test mail', '2024-06-01 19:03:23', '2024-06-01 19:03:23', NULL),
(89, 1, 'Register Employee test  mail', '2024-06-01 19:11:10', '2024-06-01 19:11:10', NULL),
(115, 1, 'Deleted Information For Employee ueujehyeb for test', '2024-06-05 17:57:52', '2024-06-05 17:57:52', NULL),
(116, 1, 'Deleted Information For Employee gghdffgew', '2024-06-05 17:58:02', '2024-06-05 17:58:02', NULL),
(168, 1, 'Deleted Information For Employee MERABELLE NOVICIO RAMIREZ', '2024-06-06 20:51:02', '2024-06-06 20:51:02', NULL),
(169, 1, 'Deleted Information For Employee MERABELLE NOVICIO RAMIREZ', '2024-06-06 20:51:08', '2024-06-06 20:51:08', NULL),
(170, 1, 'Update and Approve Booking NoJM2024-06-04 20:34:47', '2024-06-08 00:41:00', '2024-06-08 00:41:00', NULL),
(171, 1, 'Update Information For Employee JOAN', '2024-06-10 23:28:51', '2024-06-10 23:28:51', NULL),
(172, 1, 'Update Information For Employee JOAN', '2024-06-10 23:49:08', '2024-06-10 23:49:08', NULL),
(199, 1, 'Update and Approve Booking NoJM20240613200815', '2024-06-14 00:15:41', '2024-06-14 00:15:41', NULL),
(200, 1, 'Assign Booing NOJM20240613200815 To Cleaner Code 18', '2024-06-14 00:15:45', '2024-06-14 00:15:45', NULL),
(201, 1, 'Assign Booing NOJM20240613200815 To Cleaner Code 23', '2024-06-14 00:15:45', '2024-06-14 00:15:45', NULL),
(207, 1, 'Trash Information For Employee Rose', '2024-06-26 01:59:50', '2024-06-26 01:59:50', NULL),
(208, 1, 'Trash Information For Employee NANCY', '2024-06-26 01:59:59', '2024-06-26 01:59:59', NULL),
(209, 1, 'Trash Information For Employee Alex', '2024-06-26 02:00:06', '2024-06-26 02:00:06', NULL),
(210, 1, 'Trash Information For Employee AYESHA SHAIROZ', '2024-06-26 02:00:14', '2024-06-26 02:00:14', NULL),
(211, 1, 'Deleted Information For Employee NANCY', '2024-06-26 02:00:38', '2024-06-26 02:00:38', NULL),
(212, 1, 'Deleted Information For Employee AYESHA SHAIROZ', '2024-06-26 02:00:44', '2024-06-26 02:00:44', NULL),
(213, 1, 'Deleted Information For Employee Rose', '2024-06-26 02:00:54', '2024-06-26 02:00:54', NULL),
(214, 1, 'Deleted Information For Employee Alex', '2024-06-26 02:01:00', '2024-06-26 02:01:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_has_bookings`
--

CREATE TABLE `users_has_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_has_bookings`
--

INSERT INTO `users_has_bookings` (`id`, `user_id`, `booking_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 23, 4, NULL, NULL, NULL),
(5, 21, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_skills`
--

CREATE TABLE `user_has_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_has_skills`
--

INSERT INTO `user_has_skills` (`id`, `user_id`, `skill_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(37, 16, 10, NULL, NULL, NULL),
(38, 16, 8, NULL, NULL, NULL),
(39, 16, 14, NULL, NULL, NULL),
(40, 16, 17, NULL, NULL, NULL),
(41, 16, 7, NULL, NULL, NULL),
(42, 16, 1, NULL, NULL, NULL),
(43, 16, 9, NULL, NULL, NULL),
(44, 16, 13, NULL, NULL, NULL),
(45, 16, 3, NULL, NULL, NULL),
(46, 16, 11, NULL, NULL, NULL),
(47, 16, 15, NULL, NULL, NULL),
(48, 16, 5, NULL, NULL, NULL),
(49, 16, 2, NULL, NULL, NULL),
(50, 16, 4, NULL, NULL, NULL),
(51, 16, 16, NULL, NULL, NULL),
(52, 16, 19, NULL, NULL, NULL),
(53, 16, 6, NULL, NULL, NULL),
(54, 16, 12, NULL, NULL, NULL),
(55, 23, 10, NULL, NULL, NULL),
(56, 23, 8, NULL, NULL, NULL),
(57, 23, 14, NULL, NULL, NULL),
(58, 23, 17, NULL, NULL, NULL),
(59, 23, 7, NULL, NULL, NULL),
(60, 23, 1, NULL, NULL, NULL),
(61, 23, 9, NULL, NULL, NULL),
(62, 23, 13, NULL, NULL, NULL),
(63, 23, 3, NULL, NULL, NULL),
(64, 23, 11, NULL, NULL, NULL),
(65, 23, 15, NULL, NULL, NULL),
(66, 23, 5, NULL, NULL, NULL),
(67, 23, 2, NULL, NULL, NULL),
(68, 23, 4, NULL, NULL, NULL),
(69, 23, 16, NULL, NULL, NULL),
(70, 23, 19, NULL, NULL, NULL),
(71, 23, 6, NULL, NULL, NULL),
(72, 23, 12, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addvances`
--
ALTER TABLE `addvances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addvances_user_id_foreign` (`user_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_booking_id_foreign` (`booking_id`),
  ADD KEY `bills_user_id_foreign` (`user_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_user_id_foreign` (`user_id`),
  ADD KEY `booking_service_id_foreign` (`service_id`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleaners_schedule`
--
ALTER TABLE `cleaners_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cleaners_schedule_user_id_foreign` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_user_id_foreign` (`user_id`),
  ADD KEY `employees_nationality_id_foreign` (`nationality_id`);

--
-- Indexes for table `employees_accounts`
--
ALTER TABLE `employees_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `employees_history`
--
ALTER TABLE `employees_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_history_employee_id_foreign` (`employee_id`),
  ADD KEY `employees_history_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_user_id_foreign` (`user_id`);

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
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nationalities_history`
--
ALTER TABLE `nationalities_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nationalities_history_nationality_id_foreign` (`nationality_id`),
  ADD KEY `nationalities_history_user_id_foreign` (`user_id`);

--
-- Indexes for table `other_employees_transactions`
--
ALTER TABLE `other_employees_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_employees_transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `over_times`
--
ALTER TABLE `over_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `over_times_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_user_id_foreign` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_history`
--
ALTER TABLE `services_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_history_service_id_foreign` (`service_id`),
  ADD KEY `services_history_user_id_foreign` (`user_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills_history`
--
ALTER TABLE `skills_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_history_skill_id_foreign` (`skill_id`),
  ADD KEY `skills_history_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `users_activities`
--
ALTER TABLE `users_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_activities_user_id_foreign` (`user_id`);

--
-- Indexes for table `users_has_bookings`
--
ALTER TABLE `users_has_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_has_bookings_user_id_foreign` (`user_id`),
  ADD KEY `users_has_bookings_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `user_has_skills`
--
ALTER TABLE `user_has_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_has_skills_user_id_foreign` (`user_id`),
  ADD KEY `user_has_skills_skill_id_foreign` (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addvances`
--
ALTER TABLE `addvances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cleaners_schedule`
--
ALTER TABLE `cleaners_schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `employees_accounts`
--
ALTER TABLE `employees_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees_history`
--
ALTER TABLE `employees_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nationalities_history`
--
ALTER TABLE `nationalities_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `other_employees_transactions`
--
ALTER TABLE `other_employees_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `over_times`
--
ALTER TABLE `over_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `services_history`
--
ALTER TABLE `services_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `skills_history`
--
ALTER TABLE `skills_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users_activities`
--
ALTER TABLE `users_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `users_has_bookings`
--
ALTER TABLE `users_has_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_has_skills`
--
ALTER TABLE `user_has_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addvances`
--
ALTER TABLE `addvances`
  ADD CONSTRAINT `addvances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cleaners_schedule`
--
ALTER TABLE `cleaners_schedule`
  ADD CONSTRAINT `cleaners_schedule_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees_accounts`
--
ALTER TABLE `employees_accounts`
  ADD CONSTRAINT `employees_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees_history`
--
ALTER TABLE `employees_history`
  ADD CONSTRAINT `employees_history_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nationalities_history`
--
ALTER TABLE `nationalities_history`
  ADD CONSTRAINT `nationalities_history_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nationalities_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other_employees_transactions`
--
ALTER TABLE `other_employees_transactions`
  ADD CONSTRAINT `other_employees_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `over_times`
--
ALTER TABLE `over_times`
  ADD CONSTRAINT `over_times_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services_history`
--
ALTER TABLE `services_history`
  ADD CONSTRAINT `services_history_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `services_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills_history`
--
ALTER TABLE `skills_history`
  ADD CONSTRAINT `skills_history_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skills_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_activities`
--
ALTER TABLE `users_activities`
  ADD CONSTRAINT `users_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_has_bookings`
--
ALTER TABLE `users_has_bookings`
  ADD CONSTRAINT `users_has_bookings_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_has_bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_has_skills`
--
ALTER TABLE `user_has_skills`
  ADD CONSTRAINT `user_has_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_has_skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
