-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 22, 2021 at 06:03 AM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountants`
--

DROP TABLE IF EXISTS `accountants`;
CREATE TABLE IF NOT EXISTS `accountants` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accountants_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accountants`
--

INSERT INTO `accountants` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(2, 3, '2021-06-22 00:32:35', '2021-06-22 00:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accounts_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'HMS Debit Account', 1, 'This is the savings account', 1, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(2, 'HMS Credit Account', 2, 'This is the current account', 1, '2021-06-22 00:32:35', '2021-06-22 00:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL,
  `owner_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advanced_payments`
--

DROP TABLE IF EXISTS `advanced_payments`;
CREATE TABLE IF NOT EXISTS `advanced_payments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `receipt_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `advanced_payments_patient_id_foreign` (`patient_id`),
  KEY `advanced_payments_amount_index` (`amount`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advanced_payments`
--

INSERT INTO `advanced_payments` (`id`, `patient_id`, `receipt_no`, `amount`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 'VR5IRZML', 1000, '2021-06-22', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 2, 'EYCY1D5P', 1500, '2021-06-22', '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `ambulances`
--

DROP TABLE IF EXISTS `ambulances`;
CREATE TABLE IF NOT EXISTS `ambulances` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehicle_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_made` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_license` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `vehicle_type` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ambulances_vehicle_number_index` (`vehicle_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_calls`
--

DROP TABLE IF EXISTS `ambulance_calls`;
CREATE TABLE IF NOT EXISTS `ambulance_calls` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `ambulance_id` int(10) UNSIGNED NOT NULL,
  `driver_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ambulance_calls_patient_id_foreign` (`patient_id`),
  KEY `ambulance_calls_ambulance_id_foreign` (`ambulance_id`),
  KEY `ambulance_calls_date_index` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `opd_date` datetime NOT NULL,
  `problem` text COLLATE utf8mb4_unicode_ci,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_doctor_id_foreign` (`doctor_id`),
  KEY `appointments_opd_date_index` (`opd_date`),
  KEY `appointments_patient_id_foreign` (`patient_id`),
  KEY `appointments_department_id_foreign` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

DROP TABLE IF EXISTS `beds`;
CREATE TABLE IF NOT EXISTS `beds` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bed_type` int(10) UNSIGNED NOT NULL,
  `bed_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `charge` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `beds_bed_type_foreign` (`bed_type`),
  KEY `beds_is_available_index` (`is_available`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`id`, `bed_type`, `bed_id`, `name`, `description`, `charge`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 1, 'FPOBNABV', 'Bed 1', 'This is the VIP Ward bed', 50, 0, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 2, '4YEW7MVX', 'Bed 2', 'This is the Private Ward bed', 100, 0, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(3, 3, 'M7TO84YO', 'Bed 3', 'This is the VIP Ward bed', 100, 1, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `bed_assigns`
--

DROP TABLE IF EXISTS `bed_assigns`;
CREATE TABLE IF NOT EXISTS `bed_assigns` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bed_id` int(10) UNSIGNED NOT NULL,
  `ipd_patient_department_id` int(10) UNSIGNED DEFAULT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `case_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign_date` datetime NOT NULL,
  `discharge_date` datetime DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bed_assigns_bed_id_foreign` (`bed_id`),
  KEY `bed_assigns_patient_id_foreign` (`patient_id`),
  KEY `bed_assigns_created_at_assign_date_index` (`created_at`,`assign_date`),
  KEY `bed_assigns_ipd_patient_department_id_foreign` (`ipd_patient_department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bed_assigns`
--

INSERT INTO `bed_assigns` (`id`, `bed_id`, `ipd_patient_department_id`, `patient_id`, `case_id`, `assign_date`, `discharge_date`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, '7BL6KZRA', '2021-06-22 06:02:37', '2021-06-25 06:02:37', NULL, 1, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 2, NULL, 2, 'ADLXURND', '2021-06-22 06:02:37', '2021-06-26 06:02:37', NULL, 1, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `bed_types`
--

DROP TABLE IF EXISTS `bed_types`;
CREATE TABLE IF NOT EXISTS `bed_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bed_types_title_index` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bed_types`
--

INSERT INTO `bed_types` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ICU', 'This is the ICU bed', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'NICU', 'This is the NICU bed', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(3, 'VIP Ward', 'This is the VIP Ward bed', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(4, 'Private Ward', 'This is the Private Ward bed', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(5, 'General Ward Female', 'This is the General Ward Female bed', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(6, 'General Ward Male', 'General Ward Male', '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `bill_date` datetime NOT NULL,
  `amount` decimal(16,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `patient_admission_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bills_patient_id_foreign` (`patient_id`),
  KEY `bills_bill_date_index` (`bill_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_items`
--

DROP TABLE IF EXISTS `bill_items`;
CREATE TABLE IF NOT EXISTS `bill_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_id` int(10) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `amount` decimal(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bill_items_bill_id_foreign` (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `birth_reports`
--

DROP TABLE IF EXISTS `birth_reports`;
CREATE TABLE IF NOT EXISTS `birth_reports` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `case_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `birth_reports_patient_id_foreign` (`patient_id`),
  KEY `birth_reports_doctor_id_foreign` (`doctor_id`),
  KEY `birth_reports_date_index` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_banks`
--

DROP TABLE IF EXISTS `blood_banks`;
CREATE TABLE IF NOT EXISTS `blood_banks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remained_bags` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blood_banks_remained_bags_index` (`remained_bags`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_banks`
--

INSERT INTO `blood_banks` (`id`, `blood_group`, `remained_bags`, `created_at`, `updated_at`) VALUES
(1, 'A+', 0, '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(2, 'A-', 0, '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(3, 'B+', 0, '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(4, 'B-', 0, '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(5, 'AB+', 0, '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(6, 'AB-', 0, '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(7, 'O+', 0, '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(8, 'O-', 0, '2021-06-22 00:32:34', '2021-06-22 00:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donations`
--

DROP TABLE IF EXISTS `blood_donations`;
CREATE TABLE IF NOT EXISTS `blood_donations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blood_donor_id` int(10) UNSIGNED NOT NULL,
  `bags` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blood_donations_blood_donor_id_foreign` (`blood_donor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_donors`
--

DROP TABLE IF EXISTS `blood_donors`;
CREATE TABLE IF NOT EXISTS `blood_donors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_donate_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blood_donors_created_at_last_donate_date_index` (`created_at`,`last_donate_date`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_donors`
--

INSERT INTO `blood_donors` (`id`, `name`, `age`, `gender`, `blood_group`, `last_donate_date`, `created_at`, `updated_at`) VALUES
(1, 'Jenil Savani', 20, 0, 'B+', '2021-06-18 06:02:37', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'Vishal Ribadiya', 20, 0, 'AB+', '2021-06-18 06:02:37', '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `blood_issues`
--

DROP TABLE IF EXISTS `blood_issues`;
CREATE TABLE IF NOT EXISTS `blood_issues` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `issue_date` datetime NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `donor_id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blood_issues_doctor_id_foreign` (`doctor_id`),
  KEY `blood_issues_donor_id_foreign` (`donor_id`),
  KEY `blood_issues_patient_id_foreign` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `brands_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Atcuron', NULL, NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(2, 'Benadryl', NULL, NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(3, 'Calbeta', NULL, NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(4, 'Supradyn', NULL, NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(5, 'Tolol-H', NULL, NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `call_logs`
--

DROP TABLE IF EXISTS `call_logs`;
CREATE TABLE IF NOT EXISTS `call_logs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `follow_up_date` date DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `call_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_handlers`
--

DROP TABLE IF EXISTS `case_handlers`;
CREATE TABLE IF NOT EXISTS `case_handlers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `case_handlers_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `case_handlers`
--

INSERT INTO `case_handlers` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 20, '2021-06-22 00:32:36', '2021-06-22 00:32:36'),
(2, 21, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Antipyretics', 1, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(2, 'Analgesics', 1, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(3, 'Antimalarial', 1, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(4, 'Antibiotics', 1, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(5, 'Antiseptics', 1, '2021-06-22 00:32:35', '2021-06-22 00:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

DROP TABLE IF EXISTS `charges`;
CREATE TABLE IF NOT EXISTS `charges` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `charge_type` int(11) NOT NULL,
  `charge_category_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `standard_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `charges_charge_category_id_foreign` (`charge_category_id`),
  KEY `charges_code_index` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `charge_type`, `charge_category_id`, `code`, `standard_charge`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Ang1', '40', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 2, 2, 'oxg1', '20', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `charge_categories`
--

DROP TABLE IF EXISTS `charge_categories`;
CREATE TABLE IF NOT EXISTS `charge_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `charge_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `charge_categories_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charge_categories`
--

INSERT INTO `charge_categories` (`id`, `name`, `description`, `charge_type`, `created_at`, `updated_at`) VALUES
(1, 'Blood pressure check', 'BP', 1, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'Valvular surgery', 'Valvular surgery', 2, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `death_reports`
--

DROP TABLE IF EXISTS `death_reports`;
CREATE TABLE IF NOT EXISTS `death_reports` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `case_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `death_reports_patient_id_foreign` (`patient_id`),
  KEY `death_reports_doctor_id_foreign` (`doctor_id`),
  KEY `death_reports_date_index` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `is_active`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(2, 'Doctor', 1, 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(3, 'Patient', 1, 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(4, 'Nurse', 1, 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(5, 'Receptionist', 1, 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(6, 'Pharmacist', 1, 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(7, 'Accountant', 1, 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(8, 'Case Manager', 1, 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(9, 'Lab Technician', 1, 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_categories`
--

DROP TABLE IF EXISTS `diagnosis_categories`;
CREATE TABLE IF NOT EXISTS `diagnosis_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `diagnosis_categories_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosis_categories`
--

INSERT INTO `diagnosis_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Nervous System', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'Eye', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(3, 'Ear, Nose, Mouth, And Throat', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(4, 'Respiratory System', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(5, 'Circulatory System', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(6, 'Digestive System', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(7, 'Hepatobiliary System and Pancreas', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(8, 'Musculoskeletal System and Connective Tissue', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(9, 'Skin, Subcutaneous Tissue, and Breast', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(10, 'Endocrine, Nutritional, and Metabolic System', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(11, 'Kidney and Urinary Tract', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(12, 'Male Reproductive System', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(13, 'Female Reproductive System', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(14, 'Pregnancy, Childbirth, and Puerperium', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(15, 'Newborn and Other Neonates (Perinatal Period)', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(16, 'Blood and Blood Forming Organs and Immunological Disorders', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(17, 'Myeloproliferative Diseases and Disorders (Poorly Differentiated Neoplasms)', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(18, 'Infectious and Parasitic Diseases and Disorders', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(19, 'Mental Diseases and Disorders', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(20, 'Alcohol/Drug Use or Induced Mental Disorders', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(21, 'Injuries, Poison, and Toxic Effect of Drugs', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(22, 'Burns', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(23, 'Factors Influencing Health Status', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(24, 'Multiple Significant Trauma', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(25, 'Human Immunodeficiency Virus (HIV) Infection', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_department_id` bigint(20) UNSIGNED NOT NULL,
  `specialist` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctors_user_id_foreign` (`user_id`),
  KEY `doctors_doctor_department_id_foreign` (`doctor_department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `doctor_department_id`, `specialist`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Heart', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(2, 5, 2, 'Liver', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(3, 6, 3, 'Lungs', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(4, 7, 4, 'Brain', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(5, 8, 5, 'Kidney', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(6, 9, 6, 'Bones', '2021-06-22 00:32:35', '2021-06-22 00:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_departments`
--

DROP TABLE IF EXISTS `doctor_departments`;
CREATE TABLE IF NOT EXISTS `doctor_departments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_departments_title_index` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_departments`
--

INSERT INTO `doctor_departments` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Cardiologists', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(2, 'Endocrinologists', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(3, 'Allergists', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(4, 'Dermatologists', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(5, 'Ophthalmologists', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(6, 'Nephrologists', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_opd_charges`
--

DROP TABLE IF EXISTS `doctor_opd_charges`;
CREATE TABLE IF NOT EXISTS `doctor_opd_charges` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `standard_charge` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_opd_charges_doctor_id_foreign` (`doctor_id`),
  KEY `doctor_opd_charges_created_at_index` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `uploaded_by` bigint(20) UNSIGNED NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `documents_uploaded_by_foreign` (`uploaded_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

DROP TABLE IF EXISTS `document_types`;
CREATE TABLE IF NOT EXISTS `document_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `document_types_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Adhar card', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(2, 'PAN card', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(3, 'Passport', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(4, 'Light Bill', '2021-06-22 00:32:34', '2021-06-22 00:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee_payrolls`
--

DROP TABLE IF EXISTS `employee_payrolls`;
CREATE TABLE IF NOT EXISTS `employee_payrolls` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sr_no` bigint(20) NOT NULL,
  `payroll_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `net_salary` double NOT NULL,
  `status` int(11) NOT NULL,
  `basic_salary` double NOT NULL,
  `allowance` double NOT NULL,
  `deductions` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_payrolls_id_sr_no_index` (`id`,`sr_no`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_payrolls`
--

INSERT INTO `employee_payrolls` (`id`, `sr_no`, `payroll_id`, `type`, `owner_id`, `owner_type`, `month`, `year`, `net_salary`, `status`, `basic_salary`, `allowance`, `deductions`, `created_at`, `updated_at`) VALUES
(1, 1, '0DFIN88O', 2, 1, 'App\\Models\\Doctor', 'January', 2020, 1000, 1, 900, 200, 100, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 2, 'M0VHGSD0', 1, 1, 'App\\Models\\Nurse', 'January', 2020, 1000, 1, 900, 200, 100, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

DROP TABLE IF EXISTS `enquiries`;
CREATE TABLE IF NOT EXISTS `enquiries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enquiries_viewed_by_foreign` (`viewed_by`),
  KEY `enquiries_created_at_index` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `expense_head` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `amount` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expenses_date_index` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_head`, `name`, `invoice_number`, `date`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Whoop Vega', 'TDX124', '2021-06-22 06:02:37', 2131, 'Building Rent', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 2, 'Voluptatem rerum mol', 'RXA526', '2021-06-23 06:02:37', 2135, 'Equipments', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(3, 3, 'Ut nostrud dolore do', 'QAL951', '2021-06-24 06:02:37', 3453, 'Electricity Bill', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(4, 4, 'Quo atque nisi minim', 'UGI845', '2021-06-25 06:02:37', 3543, 'Telephone Bill', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(5, 5, 'A consectetur in co', 'OUZ891', '2021-06-26 06:02:37', 6876, 'Power Generator Fuel Charge', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(6, 6, 'Cumque et labore dol', 'TUC851', '2021-06-27 06:02:37', 8796, 'Tea Expense', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(7, 1, 'Dolorem sed id odit', 'OGB981', '2021-06-28 06:02:37', 9786, 'Building Rent', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(8, 2, 'Ut et nostrum beatae', 'OGB981', '2021-06-29 06:02:37', 3213, 'Equipments', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(9, 3, 'Omnis et vero ipsam ', 'IYF984', '2021-06-30 06:02:37', 3126, 'Electricity Bill', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(10, 4, 'At mollit laboriosam', 'IYC685', '2021-07-01 06:02:37', 3455, 'Telephone Bill', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(11, 5, 'Ratione Nam doloribu', 'OGB981', '2021-07-02 06:02:37', 3546, 'Power Generator Fuel Charge', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(12, 6, 'Minim sit ea eligend', 'OGB981', '2021-06-24 06:02:37', 4563, 'Tea Expense', '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `front_settings`
--

DROP TABLE IF EXISTS `front_settings`;
CREATE TABLE IF NOT EXISTS `front_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_settings`
--

INSERT INTO `front_settings` (`id`, `key`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'about_us_title', 'About For HMS', '1', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(2, 'about_us_description', 'HMS will teach physicians and nurses from around the world the principles of blood management, as well as how to manage their own blood conservation programs. The hospital was chosen based on the reputation its bloodless program has established in the medical community and because of its nationally recognized results.\r\n\r\nWe are a group of creative nerds making awesome stuff for Web and Mobile. We just love to contribute to open source technologies. We always try to build something which helps developers to save their time. so they can spend a bit more time with their friends And family.', '1', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(3, 'about_us_description', 'HMS will teach physicians and nurses from around the world the principles of blood management, as well as how to manage their own blood conservation programs. The hospital was chosen based on the reputation its bloodless program has established in the medical community and because of its nationally recognized results.\r\n\r\nWe are a group of creative nerds making awesome stuff for Web and Mobile. We just love to contribute to open source technologies. We always try to build something which helps developers to save their time. so they can spend a bit more time with their friends And family.', '1', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(4, 'about_us_mission', 'We are providing advanced emergency services. We have well-equipped emergency and trauma center with facilities.', '1', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(5, 'about_us_image', 'http://hms.com/assets/img/default_image.jpg', '1', '2021-06-22 00:32:38', '2021-06-22 00:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

DROP TABLE IF EXISTS `incomes`;
CREATE TABLE IF NOT EXISTS `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `income_head` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `amount` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `incomes_date_index` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `income_head`, `name`, `invoice_number`, `date`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Whoop Vega', 'TDX124', '2021-06-22 06:02:37', 9815, 'Receive Hospital Charges income', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 2, 'Voluptatem rerum mol', 'RXA526', '2021-06-23 06:02:37', 4534, 'Receive Hospital Charges income', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(3, 3, 'Ut nostrud dolore do', 'QAL951', '2021-06-24 06:02:37', 4534, 'Receive Special Campaign income', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(4, 4, 'Quo atque nisi minim', 'UGI845', '2021-06-25 06:02:37', 2563, 'Receive Canteen Rent income', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(5, 1, 'A consectetur in co', 'OUZ891', '2021-06-26 06:02:37', 3465, 'Receive Hospital Charges income', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(6, 2, 'Cumque et labore dol', 'TUC851', '2021-06-27 06:02:37', 6246, 'Receive Hospital Charges income', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(7, 3, 'Dolorem sed id odit', 'OGB981', '2021-06-28 06:02:37', 6245, 'Receive Special Campaign income', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(8, 4, 'Ut et nostrum beatae', 'OGB981', '2021-06-29 06:02:37', 5646, 'Receive Canteen Rent income', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(9, 1, 'Omnis et vero ipsam ', 'IYF984', '2021-06-30 06:02:37', 5627, 'Receive Hospital Charges income', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(10, 2, 'At mollit laboriosam', 'IYC685', '2021-07-01 06:02:37', 8968, 'Receive Hospital Charges income', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(11, 3, 'Ratione Nam doloribu', 'OGB981', '2021-07-02 06:02:37', 8758, 'Receive Special Campaign income', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(12, 4, 'Minim sit ea eligend', 'OGB981', '2021-06-24 06:02:37', 9678, 'Receive Canteen Rent income', '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

DROP TABLE IF EXISTS `insurances`;
CREATE TABLE IF NOT EXISTS `insurances` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_tax` double NOT NULL,
  `discount` double DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `insurance_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_rate` double NOT NULL,
  `total` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `insurances_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurances`
--

INSERT INTO `insurances` (`id`, `name`, `service_tax`, `discount`, `remark`, `insurance_no`, `insurance_code`, `hospital_rate`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Senior Citizen Health Insurance', 10, NULL, NULL, 'INS-1', 'INSC-1', 1000, 1410, 1, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'Critical Illness Insurance', 20, NULL, NULL, 'INS-2', 'INSC-2', 1000, 1620, 1, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_diseases`
--

DROP TABLE IF EXISTS `insurance_diseases`;
CREATE TABLE IF NOT EXISTS `insurance_diseases` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `insurance_id` int(10) UNSIGNED NOT NULL,
  `disease_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disease_charge` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `insurance_diseases_insurance_id_foreign` (`insurance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurance_diseases`
--

INSERT INTO `insurance_diseases` (`id`, `insurance_id`, `disease_name`, `disease_charge`, `created_at`, `updated_at`) VALUES
(1, 1, 'Heart Disease', 100, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 1, 'Infectious Diseases', 300, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(3, 2, 'Liver Disease', 200, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(4, 2, 'Celiac Disease', 400, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_reports`
--

DROP TABLE IF EXISTS `investigation_reports`;
CREATE TABLE IF NOT EXISTS `investigation_reports` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `investigation_reports_patient_id_foreign` (`patient_id`),
  KEY `investigation_reports_doctor_id_foreign` (`doctor_id`),
  KEY `investigation_reports_date_index` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_patient_id_foreign` (`patient_id`),
  KEY `invoices_invoice_date_index` (`invoice_date`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_id`, `patient_id`, `invoice_date`, `amount`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'D5TXXR', 1, '2021-06-22', 80.00, 10.00, 1, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'D2MBSE', 2, '2021-06-22', 140.00, 11.00, 1, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE IF NOT EXISTS `invoice_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_items_account_id_foreign` (`account_id`),
  KEY `invoice_items_invoice_id_foreign` (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `account_id`, `invoice_id`, `description`, `quantity`, `price`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'item description', 2, 10.00, 20.00, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 2, 1, 'item description', 3, 20.00, 60.00, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(3, 1, 2, 'item description', 4, 10.00, 40.00, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(4, 2, 2, 'item description', 5, 20.00, 100.00, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `ipd_bills`
--

DROP TABLE IF EXISTS `ipd_bills`;
CREATE TABLE IF NOT EXISTS `ipd_bills` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `total_charges` int(11) NOT NULL,
  `total_payments` int(11) NOT NULL,
  `gross_total` int(11) NOT NULL,
  `discount_in_percentage` int(11) NOT NULL,
  `tax_in_percentage` int(11) NOT NULL,
  `other_charges` int(11) NOT NULL,
  `net_payable_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ipd_bills_ipd_patient_department_id_foreign` (`ipd_patient_department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_charges`
--

DROP TABLE IF EXISTS `ipd_charges`;
CREATE TABLE IF NOT EXISTS `ipd_charges` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `charge_type_id` int(11) NOT NULL,
  `charge_category_id` int(10) UNSIGNED NOT NULL,
  `charge_id` int(10) UNSIGNED NOT NULL,
  `standard_charge` int(11) DEFAULT NULL,
  `applied_charge` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ipd_charges_ipd_patient_department_id_foreign` (`ipd_patient_department_id`),
  KEY `ipd_charges_charge_category_id_foreign` (`charge_category_id`),
  KEY `ipd_charges_charge_id_foreign` (`charge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_consultant_registers`
--

DROP TABLE IF EXISTS `ipd_consultant_registers`;
CREATE TABLE IF NOT EXISTS `ipd_consultant_registers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `applied_date` datetime NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `instruction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ipd_consultant_registers_ipd_patient_department_id_foreign` (`ipd_patient_department_id`),
  KEY `ipd_consultant_registers_doctor_id_foreign` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_diagnoses`
--

DROP TABLE IF EXISTS `ipd_diagnoses`;
CREATE TABLE IF NOT EXISTS `ipd_diagnoses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `report_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_date` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ipd_diagnoses_ipd_patient_department_id_foreign` (`ipd_patient_department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_patient_departments`
--

DROP TABLE IF EXISTS `ipd_patient_departments`;
CREATE TABLE IF NOT EXISTS `ipd_patient_departments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `ipd_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symptoms` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `admission_date` datetime NOT NULL,
  `case_id` int(10) UNSIGNED NOT NULL,
  `is_old_patient` tinyint(1) DEFAULT '0',
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bed_type_id` int(10) UNSIGNED DEFAULT NULL,
  `bed_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bill_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ipd_patient_departments_ipd_number_unique` (`ipd_number`),
  KEY `ipd_patient_departments_patient_id_foreign` (`patient_id`),
  KEY `ipd_patient_departments_case_id_foreign` (`case_id`),
  KEY `ipd_patient_departments_doctor_id_foreign` (`doctor_id`),
  KEY `ipd_patient_departments_bed_type_id_foreign` (`bed_type_id`),
  KEY `ipd_patient_departments_bed_id_foreign` (`bed_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_payments`
--

DROP TABLE IF EXISTS `ipd_payments`;
CREATE TABLE IF NOT EXISTS `ipd_payments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment_mode` tinyint(4) NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `transaction_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ipd_payments_ipd_patient_department_id_foreign` (`ipd_patient_department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_prescriptions`
--

DROP TABLE IF EXISTS `ipd_prescriptions`;
CREATE TABLE IF NOT EXISTS `ipd_prescriptions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `header_note` text COLLATE utf8mb4_unicode_ci,
  `footer_note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ipd_prescriptions_ipd_patient_department_id_foreign` (`ipd_patient_department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_prescription_items`
--

DROP TABLE IF EXISTS `ipd_prescription_items`;
CREATE TABLE IF NOT EXISTS `ipd_prescription_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ipd_prescription_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `medicine_id` int(10) UNSIGNED NOT NULL,
  `dosage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ipd_prescription_items_ipd_prescription_id_foreign` (`ipd_prescription_id`),
  KEY `ipd_prescription_items_category_id_foreign` (`category_id`),
  KEY `ipd_prescription_items_medicine_id_foreign` (`medicine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ipd_timelines`
--

DROP TABLE IF EXISTS `ipd_timelines`;
CREATE TABLE IF NOT EXISTS `ipd_timelines` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ipd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `visible_to_person` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ipd_timelines_ipd_patient_department_id_foreign` (`ipd_patient_department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issued_items`
--

DROP TABLE IF EXISTS `issued_items`;
CREATE TABLE IF NOT EXISTS `issued_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `issued_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issued_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `item_category_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `issued_items_department_id_foreign` (`department_id`),
  KEY `issued_items_user_id_foreign` (`user_id`),
  KEY `issued_items_item_category_id_foreign` (`item_category_id`),
  KEY `issued_items_item_id_foreign` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_category_id` int(10) UNSIGNED NOT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `available_quantity` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `items_item_category_id_foreign` (`item_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

DROP TABLE IF EXISTS `item_categories`;
CREATE TABLE IF NOT EXISTS `item_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_categories_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_stocks`
--

DROP TABLE IF EXISTS `item_stocks`;
CREATE TABLE IF NOT EXISTS `item_stocks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_category_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_price` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_stocks_item_category_id_foreign` (`item_category_id`),
  KEY `item_stocks_item_id_foreign` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab_technicians`
--

DROP TABLE IF EXISTS `lab_technicians`;
CREATE TABLE IF NOT EXISTS `lab_technicians` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lab_technicians_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab_technicians`
--

INSERT INTO `lab_technicians` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 18, '2021-06-22 00:32:36', '2021-06-22 00:32:36'),
(2, 19, '2021-06-22 00:32:36', '2021-06-22 00:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `live_consultations`
--

DROP TABLE IF EXISTS `live_consultations`;
CREATE TABLE IF NOT EXISTS `live_consultations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `consultation_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consultation_date` datetime NOT NULL,
  `host_video` tinyint(1) NOT NULL,
  `participant_video` tinyint(1) NOT NULL,
  `consultation_duration_minutes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `meeting_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `time_zone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `live_consultations_doctor_id_foreign` (`doctor_id`),
  KEY `live_consultations_patient_id_foreign` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_meetings`
--

DROP TABLE IF EXISTS `live_meetings`;
CREATE TABLE IF NOT EXISTS `live_meetings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `consultation_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consultation_date` datetime NOT NULL,
  `consultation_duration_minutes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `host_video` tinyint(1) NOT NULL,
  `participant_video` tinyint(1) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `meeting_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_zone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_meetings_candidates`
--

DROP TABLE IF EXISTS `live_meetings_candidates`;
CREATE TABLE IF NOT EXISTS `live_meetings_candidates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `live_meeting_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

DROP TABLE IF EXISTS `mails`;
CREATE TABLE IF NOT EXISTS `mails` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachments` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mails_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generated_conversions` json NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

DROP TABLE IF EXISTS `medicines`;
CREATE TABLE IF NOT EXISTS `medicines` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `salt_composition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `side_effects` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `medicines_category_id_foreign` (`category_id`),
  KEY `medicines_brand_id_foreign` (`brand_id`),
  KEY `medicines_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `category_id`, `brand_id`, `name`, `selling_price`, `buying_price`, `salt_composition`, `description`, `side_effects`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Aciclovir', 90, 120, 'aciclovir', 'It\'s a Anti-viral tablets.', 'As directed by the Physician', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(2, 2, 2, 'Atenolol', 190, 220, 'atenolol', 'It\'s a hypertension and angina and in stable heart attack patients to prevent death.', 'As directed by the Physician', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(3, 3, 3, 'Amlodipine Olmesartan', 30, 70, 'amlodipine olmesartan', 'It\'s a combination medicine used to treat high blood pressure (hypertension).', 'As directed by the Physician', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(4, 4, 4, 'Camylofin', 50, 90, 'camylofin', 'It\'s an antimuscarinic drug that also causes direct smooth muscle relaxation.', 'As directed by the Physician', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(5, 5, 5, 'Unidex', 120, 160, 'unidex', 'It\'s a drug which is used at the time of depression.', 'As directed by the Physician', '2021-06-22 00:32:35', '2021-06-22 00:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_03_000001_create_customer_columns', 1),
(4, '2019_05_03_000002_create_subscriptions_table', 1),
(5, '2019_05_03_000003_create_subscription_items_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_02_06_031618_create_categories_table', 1),
(8, '2020_02_12_053840_create_doctor_departments_table', 1),
(9, '2020_02_12_053932_create_departments_table', 1),
(10, '2020_02_13_042835_create_brands_table', 1),
(11, '2020_02_13_053840_create_doctors_table', 1),
(12, '2020_02_13_054103_create_patients_table', 1),
(13, '2020_02_13_094724_create_bills_table', 1),
(14, '2020_02_13_095024_create_medicines_table', 1),
(15, '2020_02_13_095125_create_bill_items_table', 1),
(16, '2020_02_13_111857_create_nurses_table', 1),
(17, '2020_02_13_125601_create_addresses_table', 1),
(18, '2020_02_13_141104_create_media_table', 1),
(19, '2020_02_14_051650_create_lab_technicians_table', 1),
(20, '2020_02_14_055353_create_appointments_table', 1),
(21, '2020_02_14_091441_create_receptionists_table', 1),
(22, '2020_02_14_093246_create_pharmacists_table', 1),
(23, '2020_02_17_053450_create_accountants_table', 1),
(24, '2020_02_17_080856_create_bed_types_table', 1),
(25, '2020_02_17_092326_create_blood_banks_table', 1),
(26, '2020_02_17_105627_create_beds_table', 1),
(27, '2020_02_17_110620_create_blood_donors_table', 1),
(28, '2020_02_17_135716_create_permission_tables', 1),
(29, '2020_02_18_042327_create_notice_boards_table', 1),
(30, '2020_02_18_042442_create_document_types_table', 1),
(31, '2020_02_18_060222_create_patient_cases_table', 1),
(32, '2020_02_18_060223_create_operation_reports_table', 1),
(33, '2020_02_18_064953_create_bed_assigns_table', 1),
(34, '2020_02_18_092202_create_documents_table', 1),
(35, '2020_02_18_094758_create_birth_reports_table', 1),
(36, '2020_02_18_111020_create_death_reports_table', 1),
(37, '2020_02_19_080336_create_employee_payrolls_table', 1),
(38, '2020_02_19_134502_create_settings_table', 1),
(39, '2020_02_21_090236_create_investigation_reports_table', 1),
(40, '2020_02_21_095439_create_accounts_table', 1),
(41, '2020_02_22_070658_create_payments_table', 1),
(42, '2020_02_22_090112_create_insurances_table', 1),
(43, '2020_02_22_091537_create_insurance_disease_table', 1),
(44, '2020_02_24_055136_create_invoices_table', 1),
(45, '2020_02_24_055518_create_schedules_table', 1),
(46, '2020_02_24_055702_create_invoice_items_table', 1),
(47, '2020_02_25_105042_create_services_table', 1),
(48, '2020_02_25_131030_create_packages_table', 1),
(49, '2020_02_25_131108_create_package_services_table', 1),
(50, '2020_02_27_120948_create_patient_admissions_table', 1),
(51, '2020_02_28_031410_create_case_handlers_table', 1),
(52, '2020_03_02_043813_create_advanced_payments_table', 1),
(53, '2020_03_02_065845_add_patient_admission_id_to_bills', 1),
(54, '2020_03_03_062243_add_patient_id_to_bills', 1),
(55, '2020_03_03_113334_create_schedule_day_table', 1),
(56, '2020_03_26_052336_create_ambulances_table', 1),
(57, '2020_03_26_081157_create_mails_table', 1),
(58, '2020_03_27_061641_create_enquiries_table', 1),
(59, '2020_03_27_063148_create_ambulance_calls_table', 1),
(60, '2020_03_31_122219_create_prescriptions_table', 1),
(61, '2020_04_11_052629_create_charge_categories_table', 1),
(62, '2020_04_11_053929_create_pathology_categories_table', 1),
(63, '2020_04_11_070859_create_radiology_categories_table', 1),
(64, '2020_04_11_090903_create_charges_table', 1),
(65, '2020_04_13_050643_create_radiology_tests_table', 1),
(66, '2020_04_14_093339_create_pathology_tests_table', 1),
(67, '2020_04_24_111205_create_doctor_opd_charge_table', 1),
(68, '2020_04_28_094118_create_expenses_table', 1),
(69, '2020_05_01_055137_create_incomes_table', 1),
(70, '2020_05_11_083050_add_notes_documents_table', 1),
(71, '2020_05_12_075825_create_sms_table', 1),
(72, '2020_06_22_071531_add_index_to_accounts_table', 1),
(73, '2020_06_22_071943_add_index_to_doctor_opd_charges_table', 1),
(74, '2020_06_22_072921_add_index_to_bed_assigns_table', 1),
(75, '2020_06_22_073042_add_index_to_medicines_table', 1),
(76, '2020_06_22_073457_add_index_to_employee_payrolls_table', 1),
(77, '2020_06_22_074937_add_index_to_notice_boards_table', 1),
(78, '2020_06_22_075222_add_index_to_blood_donors_table', 1),
(79, '2020_06_22_075359_add_index_to_packages_table', 1),
(80, '2020_06_22_075506_add_index_to_bed_types_table', 1),
(81, '2020_06_22_075725_add_index_to_services_table', 1),
(82, '2020_06_22_080944_add_index_to_invoices_table', 1),
(83, '2020_06_22_081601_add_index_to_payments_table', 1),
(84, '2020_06_22_081802_add_index_to_advanced_payments_table', 1),
(85, '2020_06_22_081909_add_index_to_bills_table', 1),
(86, '2020_06_22_082548_add_index_to_beds_table', 1),
(87, '2020_06_22_082942_add_index_to_blood_banks_table', 1),
(88, '2020_06_22_083511_add_index_to_users_table', 1),
(89, '2020_06_22_084750_add_index_to_patient_cases_table', 1),
(90, '2020_06_22_084912_add_index_to_patient_admissions_table', 1),
(91, '2020_06_22_085036_add_index_to_document_types_table', 1),
(92, '2020_06_22_085128_add_index_to_insurances_table', 1),
(93, '2020_06_22_085317_add_index_to_ambulances_table', 1),
(94, '2020_06_22_090509_add_index_to_ambulance_calls_table', 1),
(95, '2020_06_22_091253_add_index_to_doctor_departments_table', 1),
(96, '2020_06_22_091455_add_index_to_appointments_table', 1),
(97, '2020_06_22_091617_add_index_to_birth_reports_table', 1),
(98, '2020_06_22_091632_add_index_to_death_reports_table', 1),
(99, '2020_06_22_091651_add_index_to_investigation_reports_table', 1),
(100, '2020_06_22_091828_add_index_to_operation_reports_table', 1),
(101, '2020_06_22_092018_add_index_to_categories_table', 1),
(102, '2020_06_22_092149_add_index_to_brands_table', 1),
(103, '2020_06_22_092324_add_index_to_pathology_tests_table', 1),
(104, '2020_06_22_092338_add_index_to_pathology_categories_table', 1),
(105, '2020_06_22_092347_add_index_to_radiology_tests_table', 1),
(106, '2020_06_22_092357_add_index_to_radiology_categories_table', 1),
(107, '2020_06_22_092651_add_index_to_expenses_table', 1),
(108, '2020_06_22_092702_add_index_to_incomes_table', 1),
(109, '2020_06_22_092855_add_index_to_charges_table', 1),
(110, '2020_06_22_092905_add_index_to_charge_categories_table', 1),
(111, '2020_06_22_093234_add_index_to_enquiries_table', 1),
(112, '2020_06_24_044648_create_diagnosis_categories_table', 1),
(113, '2020_06_25_080242_create_patient_diagnosis_tests_table', 1),
(114, '2020_06_26_054352_create_patient_diagnosis_properties_table', 1),
(115, '2020_07_15_044653_remove_serial_visibility_from_schedules_table', 1),
(116, '2020_07_15_121336_change_ambulances_table_column', 1),
(117, '2020_07_22_052934_change_bed_assigns_table_column', 1),
(118, '2020_07_29_095430_change_invoice_items_table_column', 1),
(119, '2020_08_26_081235_create_item_categories_table', 1),
(120, '2020_08_26_101134_create_items_table', 1),
(121, '2020_08_26_125032_create_item_stocks_table', 1),
(122, '2020_08_27_141547_create_issued_items_table', 1),
(123, '2020_09_08_064222_create_ipd_patient_departments_table', 1),
(124, '2020_09_08_114627_create_ipd_diagnoses_table', 1),
(125, '2020_09_09_065624_create_ipd_consultant_registers_table', 1),
(126, '2020_09_09_135505_create_ipd_charges_table', 1),
(127, '2020_09_10_112306_create_ipd_prescriptions_table', 1),
(128, '2020_09_10_114203_create_ipd_prescription_items_table', 1),
(129, '2020_09_11_045308_create_modules_table', 1),
(130, '2020_09_12_050715_create_ipd_payments_table', 1),
(131, '2020_09_12_071821_create_ipd_timelines_table', 1),
(132, '2020_09_12_103003_create_ipd_bills_table', 1),
(133, '2020_09_14_083759_create_opd_patient_departments_table', 1),
(134, '2020_09_14_144731_add_ipd_patient_department_id_to_bed_assigns_table', 1),
(135, '2020_09_15_064044_create_transactions_table', 1),
(136, '2020_09_16_103204_create_opd_diagnoses_table', 1),
(137, '2020_09_16_114031_create_opd_timelines_table', 1),
(138, '2020_09_23_045100_change_patient_diagnosis_properties_table', 1),
(139, '2020_09_24_053229_add_ipd_bill_column_in_ipd_patient_departments_table', 1),
(140, '2020_10_09_085838_create_call_logs_table', 1),
(141, '2020_10_12_125133_create_visitors_table', 1),
(142, '2020_10_14_044134_create_postals_table', 1),
(143, '2020_10_30_043500_add_route_in_modules_table', 1),
(144, '2020_10_31_062448_add_complete_in_appointments_table', 1),
(145, '2020_11_02_050736_create_testimonials_table', 1),
(146, '2020_11_07_121633_add_region_code_in_sms_table', 1),
(147, '2020_11_19_093810_create_blood_donations_table', 1),
(148, '2020_11_20_113830_create_blood_issues_table', 1),
(149, '2020_11_24_131253_create_notifications_table', 1),
(150, '2020_12_28_131351_create_live_consultations_table', 1),
(151, '2020_12_31_062506_create_live_meetings_table', 1),
(152, '2020_12_31_091242_create_live_meetings_candidates_table', 1),
(153, '2021_01_05_100425_create_user_zoom_credential_table', 1),
(154, '2021_01_06_105407_add_metting_id_to_live_meetings_table', 1),
(155, '2021_02_23_065200_create_vaccinations_table', 1),
(156, '2021_02_23_065252_create_vaccinated_patients_table', 1),
(157, '2021_04_05_085646_create_front_settings_table', 1),
(158, '2021_05_10_000000_add_uuid_to_failed_jobs_table', 1),
(159, '2021_05_29_103036_add_conversions_disk_column_in_media_table', 1),
(160, '2021_06_07_104022_change_patient_foreign_key_type_in_appointments_table', 1),
(161, '2021_06_08_073918_change_department_foreign_key_in_appointments_table', 1),
(162, '2021_06_21_082754_update_amount_datatype_in_bills_table', 1),
(163, '2021_06_21_082845_update_amount_datatype_in_bill_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 2),
(7, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(5, 'App\\Models\\User', 14),
(5, 'App\\Models\\User', 15),
(6, 'App\\Models\\User', 16),
(6, 'App\\Models\\User', 17),
(9, 'App\\Models\\User', 18),
(9, 'App\\Models\\User', 19),
(8, 'App\\Models\\User', 20),
(8, 'App\\Models\\User', 21);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `is_active`, `route`, `created_at`, `updated_at`) VALUES
(1, 'Patients', 1, 'patients.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'Doctors', 1, 'doctors.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(3, 'Accountants', 1, 'accountants.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(4, 'Medicines', 1, 'medicines.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(5, 'Nurses', 1, 'nurses.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(6, 'Receptionists', 1, 'receptionists.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(7, 'Lab Technicians', 1, 'lab-technicians.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(8, 'Pharmacists', 1, 'pharmacists.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(9, 'Birth Reports', 1, 'birth-reports.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(10, 'Death Reports', 1, 'death-reports.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(11, 'Investigation Reports', 1, 'investigation-reports.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(12, 'Operation Reports', 1, 'operation-reports.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(13, 'Income', 1, 'incomes.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(14, 'Expense', 1, 'expenses.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(15, 'SMS', 1, 'sms.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(16, 'IPD Patients', 1, 'ipd.patient.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(17, 'OPD Patients', 1, 'opd.patient.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(18, 'Accounts', 1, 'accounts.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(19, 'Employee Payrolls', 1, 'employee-payrolls.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(20, 'Invoices', 1, 'invoices.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(21, 'Payments', 1, 'payments.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(22, 'Payment Reports', 1, 'payment.reports', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(23, 'Advance Payments', 1, 'advanced-payments.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(24, 'Bills', 1, 'bills.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(25, 'Bed Types', 1, 'bed-types.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(26, 'Beds', 1, 'beds.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(27, 'Bed Assigns', 1, 'bed-assigns.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(28, 'Blood Banks', 1, 'blood-banks.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(29, 'Blood Donors', 1, 'blood-donors.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(30, 'Documents', 1, 'documents.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(31, 'Document Types', 1, 'document-types.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(32, 'Services', 1, 'services.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(33, 'Insurances', 1, 'insurances.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(34, 'Packages', 1, 'packages.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(35, 'Ambulances', 1, 'ambulances.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(36, 'Ambulances Calls', 1, 'ambulance-calls.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(37, 'Appointments', 1, 'appointments.index', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(38, 'Call Logs', 1, 'call_logs.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(39, 'Visitors', 1, 'visitors.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(40, 'Postal Receive', 1, 'receives.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(41, 'Postal Dispatch', 1, 'dispatches.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(42, 'Notice Boards', 1, 'noticeboard', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(43, 'Mail', 1, 'mail', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(44, 'Enquires', 1, 'enquiries', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(45, 'Charge Categories', 1, 'charge-categories.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(46, 'Charges', 1, 'charges.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(47, 'Doctor OPD Charges', 1, 'doctor-opd-charges.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(48, 'Items Categories', 1, 'item-categories.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(49, 'Items', 1, 'items.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(50, 'Item Stocks', 1, 'item.stock.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(51, 'Issued Items', 1, 'issued.item.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(52, 'Diagnosis Categories', 1, 'diagnosis.category.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(53, 'Diagnosis Tests', 1, 'patient.diagnosis.test.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(54, 'Pathology Categories', 1, 'pathology.category.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(55, 'Pathology Tests', 1, 'pathology.test.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(56, 'Radiology Categories', 1, 'radiology.category.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(57, 'Radiology Tests', 1, 'radiology.test.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(58, 'Medicine Categories', 1, 'categories.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(59, 'Medicine Brands', 1, 'brands.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(60, 'Doctor Departments', 1, 'doctor-departments.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(61, 'Schedules', 1, 'schedules.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(62, 'Prescriptions', 1, 'prescriptions.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(63, 'Cases', 1, 'patient-cases.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(64, 'Case Handlers', 1, 'case-handlers.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(65, 'Patient Admissions', 1, 'patient-admissions.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(66, 'My Payrolls', 1, 'payroll', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(67, 'Patient Cases', 1, 'patients.cases', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(68, 'Testimonial', 1, 'testimonials.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(69, 'Blood Donations', 1, 'blood-donations.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(70, 'Blood Issues', 1, 'blood-issues.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(71, 'Live Consultations', 1, 'live.consultation.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(72, 'Live Meetings', 1, 'live.meeting.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(73, 'Vaccinations', 1, 'vaccinations.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38'),
(74, 'Vaccinated Patients', 1, 'vaccinated-patients.index', '2021-06-22 00:32:38', '2021-06-22 00:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `notice_boards`
--

DROP TABLE IF EXISTS `notice_boards`;
CREATE TABLE IF NOT EXISTS `notice_boards` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notice_boards_created_at_id_index` (`created_at`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `notification_for` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

DROP TABLE IF EXISTS `nurses`;
CREATE TABLE IF NOT EXISTS `nurses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nurses_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 10, '2021-06-22 00:32:36', '2021-06-22 00:32:36'),
(2, 11, '2021-06-22 00:32:36', '2021-06-22 00:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `opd_diagnoses`
--

DROP TABLE IF EXISTS `opd_diagnoses`;
CREATE TABLE IF NOT EXISTS `opd_diagnoses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `opd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `report_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_date` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `opd_diagnoses_opd_patient_department_id_foreign` (`opd_patient_department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opd_patient_departments`
--

DROP TABLE IF EXISTS `opd_patient_departments`;
CREATE TABLE IF NOT EXISTS `opd_patient_departments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `opd_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symptoms` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `appointment_date` datetime NOT NULL,
  `case_id` int(10) UNSIGNED DEFAULT NULL,
  `is_old_patient` tinyint(1) DEFAULT '0',
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `standard_charge` double NOT NULL,
  `payment_mode` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `opd_patient_departments_opd_number_unique` (`opd_number`),
  KEY `opd_patient_departments_patient_id_foreign` (`patient_id`),
  KEY `opd_patient_departments_case_id_foreign` (`case_id`),
  KEY `opd_patient_departments_doctor_id_foreign` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opd_timelines`
--

DROP TABLE IF EXISTS `opd_timelines`;
CREATE TABLE IF NOT EXISTS `opd_timelines` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `opd_patient_department_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `visible_to_person` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `opd_timelines_opd_patient_department_id_foreign` (`opd_patient_department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operation_reports`
--

DROP TABLE IF EXISTS `operation_reports`;
CREATE TABLE IF NOT EXISTS `operation_reports` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `case_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operation_reports_doctor_id_foreign` (`doctor_id`),
  KEY `operation_reports_patient_id_foreign` (`patient_id`),
  KEY `operation_reports_date_index` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `discount` double NOT NULL,
  `total_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `packages_created_at_name_index` (`created_at`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `discount`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 'Package 1', NULL, 10, 72, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'Package 2', NULL, 20, 928, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `package_services`
--

DROP TABLE IF EXISTS `package_services`;
CREATE TABLE IF NOT EXISTS `package_services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `package_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `quantity` double NOT NULL,
  `rate` double NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `package_services_package_id_foreign` (`package_id`),
  KEY `package_services_service_id_foreign` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_services`
--

INSERT INTO `package_services` (`id`, `package_id`, `service_id`, `quantity`, `rate`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 10, 20, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 1, 2, 3, 20, 60, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(3, 2, 1, 5, 100, 500, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(4, 2, 2, 6, 110, 660, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pathology_categories`
--

DROP TABLE IF EXISTS `pathology_categories`;
CREATE TABLE IF NOT EXISTS `pathology_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pathology_categories_name_unique` (`name`),
  KEY `pathology_categories_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathology_categories`
--

INSERT INTO `pathology_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Clinical Microbiology', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'Clinical Chemistry', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(3, 'Hematology', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(4, 'Molecular Diagnostics', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(5, 'Reproductive Biology', '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `pathology_tests`
--

DROP TABLE IF EXISTS `pathology_tests`;
CREATE TABLE IF NOT EXISTS `pathology_tests` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `test_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `unit` int(11) DEFAULT NULL,
  `subcategory` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_days` int(11) DEFAULT NULL,
  `charge_category_id` int(10) UNSIGNED NOT NULL,
  `standard_charge` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pathology_tests_category_id_foreign` (`category_id`),
  KEY `pathology_tests_charge_category_id_foreign` (`charge_category_id`),
  KEY `pathology_tests_test_name_index` (`test_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pathology_tests`
--

INSERT INTO `pathology_tests` (`id`, `test_name`, `short_name`, `test_type`, `category_id`, `unit`, `subcategory`, `method`, `report_days`, `charge_category_id`, `standard_charge`, `created_at`, `updated_at`) VALUES
(1, 'Exercise EKG (stress test)', 'EEST', 'EEST', 1, 3, NULL, NULL, 1, 1, 40, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'Lungs X-rays', 'L', 'L', 2, 9, NULL, NULL, 2, 2, 20, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patients_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 12, '2021-06-22 00:32:36', '2021-06-22 00:32:36'),
(2, 13, '2021-06-22 00:32:36', '2021-06-22 00:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `patient_admissions`
--

DROP TABLE IF EXISTS `patient_admissions`;
CREATE TABLE IF NOT EXISTS `patient_admissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_admission_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `admission_date` datetime NOT NULL,
  `discharge_date` datetime DEFAULT NULL,
  `package_id` int(10) UNSIGNED DEFAULT NULL,
  `insurance_id` int(10) UNSIGNED DEFAULT NULL,
  `bed_id` int(10) UNSIGNED DEFAULT NULL,
  `policy_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_relation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `patient_admissions_patient_admission_id_unique` (`patient_admission_id`),
  KEY `patient_admissions_patient_id_foreign` (`patient_id`),
  KEY `patient_admissions_doctor_id_foreign` (`doctor_id`),
  KEY `patient_admissions_package_id_foreign` (`package_id`),
  KEY `patient_admissions_insurance_id_foreign` (`insurance_id`),
  KEY `patient_admissions_bed_id_foreign` (`bed_id`),
  KEY `patient_admissions_admission_date_index` (`admission_date`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_admissions`
--

INSERT INTO `patient_admissions` (`id`, `patient_admission_id`, `patient_id`, `doctor_id`, `admission_date`, `discharge_date`, `package_id`, `insurance_id`, `bed_id`, `policy_no`, `agent_name`, `guardian_name`, `guardian_relation`, `guardian_contact`, `guardian_address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'F9BHNFTJ', 1, 1, '2021-06-22 06:02:37', '2021-06-26 06:02:37', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'ONMNGVO5', 2, 2, '2021-06-22 06:02:37', '2021-06-27 06:02:37', 2, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `patient_cases`
--

DROP TABLE IF EXISTS `patient_cases`;
CREATE TABLE IF NOT EXISTS `patient_cases` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `case_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `fee` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `patient_cases_case_id_unique` (`case_id`),
  KEY `patient_cases_patient_id_foreign` (`patient_id`),
  KEY `patient_cases_doctor_id_foreign` (`doctor_id`),
  KEY `patient_cases_date_index` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_cases`
--

INSERT INTO `patient_cases` (`id`, `case_id`, `patient_id`, `phone`, `doctor_id`, `date`, `fee`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, '7BL6KZRA', 1, NULL, 1, '2021-06-22 06:02:37', 100, 1, NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'ADLXURND', 1, NULL, 2, '2021-06-22 06:02:37', 100, 1, NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `patient_diagnosis_properties`
--

DROP TABLE IF EXISTS `patient_diagnosis_properties`;
CREATE TABLE IF NOT EXISTS `patient_diagnosis_properties` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_diagnosis_id` bigint(20) UNSIGNED NOT NULL,
  `property_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_value` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_diagnosis_properties_created_at_index` (`created_at`),
  KEY `patient_diagnosis_properties_patient_diagnosis_id_foreign` (`patient_diagnosis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_diagnosis_tests`
--

DROP TABLE IF EXISTS `patient_diagnosis_tests`;
CREATE TABLE IF NOT EXISTS `patient_diagnosis_tests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `report_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_diagnosis_tests_created_at_index` (`created_at`),
  KEY `patient_diagnosis_tests_patient_id_foreign` (`patient_id`),
  KEY `patient_diagnosis_tests_doctor_id_foreign` (`doctor_id`),
  KEY `patient_diagnosis_tests_category_id_foreign` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_date` date NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `pay_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_account_id_foreign` (`account_id`),
  KEY `payments_payment_date_index` (`payment_date`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_date`, `account_id`, `pay_to`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, '2021-06-22', 1, 'Pranami Labs', 1000, 'This is the payment to Pranami Labs', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, '2021-06-22', 2, 'Prakash Labs', 2000, 'This is the payment Prakash Labs', '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage_users', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(2, 'manage_beds', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(3, 'manage_wards', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(4, 'manage_appointments', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(5, 'manage_prescriptions', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(6, 'manage_patients', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(7, 'manage_blood_bank', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(8, 'manage_reports', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(9, 'manage_payrolls', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(10, 'manage_settings', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(11, 'manage_notice_board', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(12, 'manage_doctors', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(13, 'manage_nurses', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(14, 'manage_receptionists', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(15, 'manage_pharmacists', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(16, 'manage_accountants', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(17, 'manage_invoices', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(18, 'manage_operations_history', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(19, 'manage_admit_history', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(20, 'manage_blood_donor', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(21, 'manage_medicines', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(22, 'manage_department', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(23, 'manage_doctor_departments', 'web', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(24, 'manage_lab_technicians', 'web', '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacists`
--

DROP TABLE IF EXISTS `pharmacists`;
CREATE TABLE IF NOT EXISTS `pharmacists` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pharmacists_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pharmacists`
--

INSERT INTO `pharmacists` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 16, '2021-06-22 00:32:36', '2021-06-22 00:32:36'),
(2, 17, '2021-06-22 00:32:36', '2021-06-22 00:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `postals`
--

DROP TABLE IF EXISTS `postals`;
CREATE TABLE IF NOT EXISTS `postals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `from_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE IF NOT EXISTS `prescriptions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `food_allergies` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tendency_bleed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heart_disease` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `high_blood_pressure` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diabetic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surgery` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accident` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_history` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_medication` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `female_pregnancy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breast_feeding` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `health_insurance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `low_income` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prescriptions_patient_id_foreign` (`patient_id`),
  KEY `prescriptions_doctor_id_foreign` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `radiology_categories`
--

DROP TABLE IF EXISTS `radiology_categories`;
CREATE TABLE IF NOT EXISTS `radiology_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `radiology_categories_name_unique` (`name`),
  KEY `radiology_categories_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radiology_categories`
--

INSERT INTO `radiology_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'X-Ray', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'Sonography', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(3, 'CT Scan', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(4, 'MRI', '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(5, 'ECG', '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `radiology_tests`
--

DROP TABLE IF EXISTS `radiology_tests`;
CREATE TABLE IF NOT EXISTS `radiology_tests` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `test_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `subcategory` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_days` int(11) DEFAULT NULL,
  `charge_category_id` int(10) UNSIGNED NOT NULL,
  `standard_charge` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `radiology_tests_category_id_foreign` (`category_id`),
  KEY `radiology_tests_charge_category_id_foreign` (`charge_category_id`),
  KEY `radiology_tests_test_name_index` (`test_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radiology_tests`
--

INSERT INTO `radiology_tests` (`id`, `test_name`, `short_name`, `test_type`, `category_id`, `subcategory`, `report_days`, `charge_category_id`, `standard_charge`, `created_at`, `updated_at`) VALUES
(1, 'Magnetic Resonance Angiography', 'MRA', 'MRA', 1, NULL, 1, 1, 40, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'Exercise EKG (stress test)', 'EEST', 'EEST', 2, NULL, 2, 2, 20, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

DROP TABLE IF EXISTS `receptionists`;
CREATE TABLE IF NOT EXISTS `receptionists` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `receptionists_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 14, '2021-06-22 00:32:36', '2021-06-22 00:32:36'),
(2, 15, '2021-06-22 00:32:36', '2021-06-22 00:32:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
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
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(18, 2),
(20, 2),
(21, 2),
(22, 2),
(4, 3),
(5, 3),
(7, 3),
(8, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(19, 3),
(21, 3),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(18, 4),
(20, 4),
(21, 4),
(22, 4),
(2, 5),
(3, 5),
(4, 5),
(6, 5),
(7, 5),
(8, 5),
(11, 5),
(12, 5),
(13, 5),
(14, 5),
(15, 5),
(18, 5),
(19, 5),
(20, 5),
(22, 5),
(24, 5),
(11, 6),
(15, 6),
(21, 6),
(11, 7),
(15, 7),
(21, 7);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `per_patient_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedules_doctor_id_foreign` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_days`
--

DROP TABLE IF EXISTS `schedule_days`;
CREATE TABLE IF NOT EXISTS `schedule_days` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` int(10) UNSIGNED NOT NULL,
  `available_on` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_from` time NOT NULL,
  `available_to` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedule_days_doctor_id_foreign` (`doctor_id`),
  KEY `schedule_days_schedule_id_foreign` (`schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `quantity`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'service 1', NULL, 2, 10, 1, '2021-06-22 00:32:37', '2021-06-22 00:32:37'),
(2, 'service 2', NULL, 3, 20, 0, '2021-06-22 00:32:37', '2021-06-22 00:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'HMS', '2021-06-22 00:32:34', '2021-06-22 00:32:34'),
(2, 'app_logo', 'http://hms.com/default-images/logo.png', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(3, 'company_name', 'InfyOmLabs', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(4, 'current_currency', 'inr', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(5, 'hospital_address', '16/A saint Joseph Park', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(6, 'hospital_email', 'cityhospital@gmail.com', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(7, 'hospital_phone', '1234567890', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(8, 'hospital_from_day', 'Mon to Fri', '2021-06-22 00:32:35', '2021-06-22 00:32:35'),
(9, 'hospital_from_time', '9 AM to 9 PM', '2021-06-22 00:32:35', '2021-06-22 00:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

DROP TABLE IF EXISTS `sms`;
CREATE TABLE IF NOT EXISTS `sms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `send_to` bigint(20) UNSIGNED DEFAULT NULL,
  `region_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `send_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sms_send_to_foreign` (`send_to`),
  KEY `sms_send_by_foreign` (`send_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

DROP TABLE IF EXISTS `subscription_items`;
CREATE TABLE IF NOT EXISTS `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  KEY `subscription_items_stripe_id_index` (`stripe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stripe_transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `qualification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `owner_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_stripe_id_index` (`stripe_id`),
  KEY `users_first_name_index` (`first_name`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `department_id`, `first_name`, `last_name`, `email`, `password`, `designation`, `phone`, `gender`, `qualification`, `blood_group`, `dob`, `email_verified_at`, `owner_id`, `owner_type`, `status`, `language`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES
(1, 1, 'Super', 'Admin', 'admin@hms.com', '$2y$10$FqpZU1sgwwAcef4tqdSHeOmKMNakGRfVKKP.dTfVTyYA409nDiGWa', NULL, '7878454512', 1, NULL, 'B+', '1994-12-12', '2021-06-22 00:32:34', NULL, NULL, 1, 'en', NULL, '2021-06-22 00:32:34', '2021-06-22 00:32:34', NULL, NULL, NULL, NULL),
(2, 7, 'Ekta', 'Malviya', 'ekta@gmail.com', '$2y$10$FtrGMoSNsa9H8NeYexGawuJlxIu957W6rHkhtW.g2euw6Zw.G5vrq', NULL, NULL, 0, NULL, NULL, NULL, '2021-06-22 00:32:35', 1, 'App\\Models\\Accountant', 1, 'en', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35', NULL, NULL, NULL, NULL),
(3, 7, 'Bhumi', 'Khimani', 'bhumi@gmail.com', '$2y$10$eqJacGj6HM2yQNZJ3rniF.7cvC6lGSqfElkuN19g1iVaHA58bjRNS', NULL, NULL, 0, NULL, NULL, NULL, '2021-06-22 00:32:35', 2, 'App\\Models\\Accountant', 1, 'en', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35', NULL, NULL, NULL, NULL),
(4, 2, 'Monika', 'Vagasiya', 'monika@gmail.com', '$2y$10$9LQZxzspRvAjbrv/XorTr.nalje3hlJLSzorj/0qclgup/K/Sz/ky', 'Doctor', NULL, 0, 'MBBS', NULL, NULL, '2021-06-22 00:32:35', 1, 'App\\Models\\Doctor', 1, 'en', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35', NULL, NULL, NULL, NULL),
(5, 2, 'Vatsal', 'Sakariya', 'vatsal@gmail.com', '$2y$10$bcoKsrVsJBpzrZG8ImU7hONj8cRRwJzcMOR4NKB.S1cFJXcazNFvW', 'Doctor', NULL, 0, 'MBBS', NULL, NULL, '2021-06-22 00:32:35', 2, 'App\\Models\\Doctor', 1, 'en', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35', NULL, NULL, NULL, NULL),
(6, 2, 'Vikas', 'Patil', 'vikas@gmail.com', '$2y$10$W2vSc01c7vOaRI/O4vYi3eiYu9XD2xbk9f.6RhIcYDUz9uuaNCKai', 'Doctor', NULL, 0, 'MBBS', NULL, NULL, '2021-06-22 00:32:35', 3, 'App\\Models\\Doctor', 1, 'en', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35', NULL, NULL, NULL, NULL),
(7, 2, 'Urvisha', 'Desai', 'urvisha@gmail.com', '$2y$10$/SnfUCEwuf4L44OLYD8C9u1WlTcRb/VsPWVEL8VIoz6bwp5t7stDi', 'Doctor', NULL, 0, 'MBBS', NULL, NULL, '2021-06-22 00:32:35', 4, 'App\\Models\\Doctor', 1, 'en', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35', NULL, NULL, NULL, NULL),
(8, 2, 'Parth', 'Patel', 'parth@gmail.com', '$2y$10$AK/COo71ib7OYYKDsl/EWeV3wxISSyoYVl4zown3m6wAZdZcBzULu', 'Doctor', NULL, 0, 'MBBS', NULL, NULL, '2021-06-22 00:32:35', 5, 'App\\Models\\Doctor', 1, 'en', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35', NULL, NULL, NULL, NULL),
(9, 2, 'Dhaval', 'Naik', 'dhaval@gmail.com', '$2y$10$6RwB3DjiyJeJZkq97FFn/OZcL4PHUQ3LO9XOPGddwOVgbPlf.dFDe', 'Doctor', NULL, 0, 'MBBS', NULL, NULL, '2021-06-22 00:32:35', 6, 'App\\Models\\Doctor', 1, 'en', NULL, '2021-06-22 00:32:35', '2021-06-22 00:32:35', NULL, NULL, NULL, NULL),
(10, 4, 'Pravina', 'Makvana', 'pravina@gmail.com', '$2y$10$91H3I2Cq.ha3cZLeYozezuiMbGRQJIU4UqNPI8Qoetg2q6srZZ/Jy', 'Nurse', NULL, 1, 'BCom', NULL, NULL, '2021-06-22 00:32:35', 1, 'App\\Models\\Nurse', 1, 'en', NULL, '2021-06-22 00:32:36', '2021-06-22 00:32:36', NULL, NULL, NULL, NULL),
(11, 4, 'Priti', 'Lad', 'priti@gmail.com', '$2y$10$VWPbiKo2pSIN4xUb/gSktOmSmagR4biacM4WjC.H5GgrP1RpvJCpu', 'Nurse', NULL, 1, 'BCom', NULL, NULL, '2021-06-22 00:32:35', 2, 'App\\Models\\Nurse', 1, 'en', NULL, '2021-06-22 00:32:36', '2021-06-22 00:32:36', NULL, NULL, NULL, NULL),
(12, 3, 'Tirth', 'Patil', 'tirth@gmail.com', '$2y$10$rAQscITEHKOCNue.5JycAOuQ4P1YLkjaDyI7oZf7/6PN4FiFh4Zgi', NULL, NULL, 0, NULL, NULL, NULL, '2021-06-22 00:32:36', 1, 'App\\Models\\Patient', 1, 'en', NULL, '2021-06-22 00:32:36', '2021-06-22 00:32:36', NULL, NULL, NULL, NULL),
(13, 3, 'Pravin', 'Parekh', 'pravin@gmail.com', '$2y$10$AitvUIKel6fgovahbSoHM.RW82Qr83O.ghKYaqHc8dLGXjJmC0WDq', NULL, NULL, 0, NULL, NULL, NULL, '2021-06-22 00:32:36', 2, 'App\\Models\\Patient', 1, 'en', NULL, '2021-06-22 00:32:36', '2021-06-22 00:32:36', NULL, NULL, NULL, NULL),
(14, 5, 'Ashok', 'Patel', 'ashok@gmail.com', '$2y$10$1zH1WTfKPrKOTtlC4RA4XuQLr2tc66WL.f8stvMB5KSDcKb79CHGi', 'Receptionist', NULL, 0, 'MCom', NULL, NULL, '2021-06-22 00:32:36', 1, 'App\\Models\\Receptionist', 1, 'en', NULL, '2021-06-22 00:32:36', '2021-06-22 00:32:36', NULL, NULL, NULL, NULL),
(15, 5, 'Khushboo', 'Naik', 'khushboo@gmail.com', '$2y$10$KxvqCTHjpt8P4SuIz2c0Q.lcap0WSDIntRBJyuBqG5DiekPLWrg4.', 'Receptionist', NULL, 0, 'MCom', NULL, NULL, '2021-06-22 00:32:36', 2, 'App\\Models\\Receptionist', 1, 'en', NULL, '2021-06-22 00:32:36', '2021-06-22 00:32:36', NULL, NULL, NULL, NULL),
(16, 6, 'Akash', 'Dhimmar', 'akash@gmail.com', '$2y$10$huYCdXiKU1tlUDBYYDjsdeTGITve7ammxyd3ZVL1TfENalDFHh4BC', NULL, NULL, 0, NULL, NULL, NULL, '2021-06-22 00:32:36', 1, 'App\\Models\\Pharmacist', 1, 'en', NULL, '2021-06-22 00:32:36', '2021-06-22 00:32:36', NULL, NULL, NULL, NULL),
(17, 6, 'Shaliesh', 'Ladhumar', 'shaliesh@gmail.com', '$2y$10$Jbn9K9P/Q82hu3JeJ0x4kOtjs6p0MXagKJVBs.ya7dmr86rckLQ9u', NULL, NULL, 0, NULL, NULL, NULL, '2021-06-22 00:32:36', 2, 'App\\Models\\Pharmacist', 1, 'en', NULL, '2021-06-22 00:32:36', '2021-06-22 00:32:36', NULL, NULL, NULL, NULL),
(18, 9, 'Hiren', 'Prajapati', 'hiren@gmail.com', '$2y$10$kdvC/2CiOqFgIZM9eeLRGeNFYq7mTipclJfoAbJ00ozs2GIBzgO5C', 'Lab Technician', NULL, 0, 'BSc', NULL, NULL, '2021-06-22 00:32:36', 1, 'App\\Models\\LabTechnician', 1, 'en', NULL, '2021-06-22 00:32:36', '2021-06-22 00:32:36', NULL, NULL, NULL, NULL),
(19, 9, 'Vivek', 'Beladia', 'vivek@gmail.com', '$2y$10$xu2KoKe1oHbR9Wy99i6EDeltQSRiDT2ZV2fl9C9iKDb6icDh52A3W', 'Lab Technician', NULL, 0, 'BSc', NULL, NULL, '2021-06-22 00:32:36', 2, 'App\\Models\\LabTechnician', 1, 'en', NULL, '2021-06-22 00:32:36', '2021-06-22 00:32:36', NULL, NULL, NULL, NULL),
(20, 8, 'Ashish', 'Nakrani', 'ashish@gmail.com', '$2y$10$lflZcEv3yp58t6aXcTqujOmAwt4h9fJ8hR06ZOxIFFik/wA3y/rdG', 'Case Handler', NULL, 0, 'LLB', NULL, NULL, '2021-06-22 00:32:36', 1, 'App\\Models\\CaseHandler', 1, 'en', NULL, '2021-06-22 00:32:36', '2021-06-22 00:32:36', NULL, NULL, NULL, NULL),
(21, 8, 'Ajay', 'Makwana', 'ajay@gmail.com', '$2y$10$mr.Rfwl6YeDeTnNvHrFah.L1j/49pNC/M8gxHgtwB5mPr/k/C54cS', 'Case Handler', NULL, 0, 'LLB', NULL, NULL, '2021-06-22 00:32:36', 2, 'App\\Models\\CaseHandler', 1, 'en', NULL, '2021-06-22 00:32:37', '2021-06-22 00:32:37', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_zoom_credential`
--

DROP TABLE IF EXISTS `user_zoom_credential`;
CREATE TABLE IF NOT EXISTS `user_zoom_credential` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `zoom_api_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zoom_api_secret` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_zoom_credential_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccinated_patients`
--

DROP TABLE IF EXISTS `vaccinated_patients`;
CREATE TABLE IF NOT EXISTS `vaccinated_patients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `vaccination_id` int(10) UNSIGNED NOT NULL,
  `vaccination_serial_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dose_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dose_given_date` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vaccinated_patients_id_index` (`id`),
  KEY `vaccinated_patients_patient_id_index` (`patient_id`),
  KEY `vaccinated_patients_vaccination_id_index` (`vaccination_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vaccinations`
--

DROP TABLE IF EXISTS `vaccinations`;
CREATE TABLE IF NOT EXISTS `vaccinations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufactured_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vaccinations_id_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `purpose` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountants`
--
ALTER TABLE `accountants`
  ADD CONSTRAINT `accountants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `advanced_payments`
--
ALTER TABLE `advanced_payments`
  ADD CONSTRAINT `advanced_payments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ambulance_calls`
--
ALTER TABLE `ambulance_calls`
  ADD CONSTRAINT `ambulance_calls_ambulance_id_foreign` FOREIGN KEY (`ambulance_id`) REFERENCES `ambulances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ambulance_calls_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `doctor_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `beds`
--
ALTER TABLE `beds`
  ADD CONSTRAINT `beds_bed_type_foreign` FOREIGN KEY (`bed_type`) REFERENCES `bed_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bed_assigns`
--
ALTER TABLE `bed_assigns`
  ADD CONSTRAINT `bed_assigns_bed_id_foreign` FOREIGN KEY (`bed_id`) REFERENCES `beds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bed_assigns_ipd_patient_department_id_foreign` FOREIGN KEY (`ipd_patient_department_id`) REFERENCES `ipd_patient_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bed_assigns_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bill_items`
--
ALTER TABLE `bill_items`
  ADD CONSTRAINT `bill_items_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `birth_reports`
--
ALTER TABLE `birth_reports`
  ADD CONSTRAINT `birth_reports_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `birth_reports_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_donations`
--
ALTER TABLE `blood_donations`
  ADD CONSTRAINT `blood_donations_blood_donor_id_foreign` FOREIGN KEY (`blood_donor_id`) REFERENCES `blood_donors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blood_issues`
--
ALTER TABLE `blood_issues`
  ADD CONSTRAINT `blood_issues_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blood_issues_donor_id_foreign` FOREIGN KEY (`donor_id`) REFERENCES `blood_donors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blood_issues_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `case_handlers`
--
ALTER TABLE `case_handlers`
  ADD CONSTRAINT `case_handlers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `charges`
--
ALTER TABLE `charges`
  ADD CONSTRAINT `charges_charge_category_id_foreign` FOREIGN KEY (`charge_category_id`) REFERENCES `charge_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `death_reports`
--
ALTER TABLE `death_reports`
  ADD CONSTRAINT `death_reports_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `death_reports_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_doctor_department_id_foreign` FOREIGN KEY (`doctor_department_id`) REFERENCES `doctor_departments` (`id`),
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_opd_charges`
--
ALTER TABLE `doctor_opd_charges`
  ADD CONSTRAINT `doctor_opd_charges_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD CONSTRAINT `enquiries_viewed_by_foreign` FOREIGN KEY (`viewed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `insurance_diseases`
--
ALTER TABLE `insurance_diseases`
  ADD CONSTRAINT `insurance_diseases_insurance_id_foreign` FOREIGN KEY (`insurance_id`) REFERENCES `insurances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `investigation_reports`
--
ALTER TABLE `investigation_reports`
  ADD CONSTRAINT `investigation_reports_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `investigation_reports_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD CONSTRAINT `invoice_items_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ipd_bills`
--
ALTER TABLE `ipd_bills`
  ADD CONSTRAINT `ipd_bills_ipd_patient_department_id_foreign` FOREIGN KEY (`ipd_patient_department_id`) REFERENCES `ipd_patient_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ipd_charges`
--
ALTER TABLE `ipd_charges`
  ADD CONSTRAINT `ipd_charges_charge_category_id_foreign` FOREIGN KEY (`charge_category_id`) REFERENCES `charge_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipd_charges_charge_id_foreign` FOREIGN KEY (`charge_id`) REFERENCES `charges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipd_charges_ipd_patient_department_id_foreign` FOREIGN KEY (`ipd_patient_department_id`) REFERENCES `ipd_patient_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ipd_consultant_registers`
--
ALTER TABLE `ipd_consultant_registers`
  ADD CONSTRAINT `ipd_consultant_registers_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipd_consultant_registers_ipd_patient_department_id_foreign` FOREIGN KEY (`ipd_patient_department_id`) REFERENCES `ipd_patient_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ipd_diagnoses`
--
ALTER TABLE `ipd_diagnoses`
  ADD CONSTRAINT `ipd_diagnoses_ipd_patient_department_id_foreign` FOREIGN KEY (`ipd_patient_department_id`) REFERENCES `ipd_patient_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ipd_patient_departments`
--
ALTER TABLE `ipd_patient_departments`
  ADD CONSTRAINT `ipd_patient_departments_bed_id_foreign` FOREIGN KEY (`bed_id`) REFERENCES `beds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipd_patient_departments_bed_type_id_foreign` FOREIGN KEY (`bed_type_id`) REFERENCES `bed_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipd_patient_departments_case_id_foreign` FOREIGN KEY (`case_id`) REFERENCES `patient_cases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipd_patient_departments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipd_patient_departments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ipd_payments`
--
ALTER TABLE `ipd_payments`
  ADD CONSTRAINT `ipd_payments_ipd_patient_department_id_foreign` FOREIGN KEY (`ipd_patient_department_id`) REFERENCES `ipd_patient_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ipd_prescriptions`
--
ALTER TABLE `ipd_prescriptions`
  ADD CONSTRAINT `ipd_prescriptions_ipd_patient_department_id_foreign` FOREIGN KEY (`ipd_patient_department_id`) REFERENCES `ipd_patient_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ipd_prescription_items`
--
ALTER TABLE `ipd_prescription_items`
  ADD CONSTRAINT `ipd_prescription_items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipd_prescription_items_ipd_prescription_id_foreign` FOREIGN KEY (`ipd_prescription_id`) REFERENCES `ipd_prescriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipd_prescription_items_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ipd_timelines`
--
ALTER TABLE `ipd_timelines`
  ADD CONSTRAINT `ipd_timelines_ipd_patient_department_id_foreign` FOREIGN KEY (`ipd_patient_department_id`) REFERENCES `ipd_patient_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issued_items`
--
ALTER TABLE `issued_items`
  ADD CONSTRAINT `issued_items_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issued_items_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `item_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issued_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issued_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `item_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_stocks`
--
ALTER TABLE `item_stocks`
  ADD CONSTRAINT `item_stocks_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `item_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_stocks_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lab_technicians`
--
ALTER TABLE `lab_technicians`
  ADD CONSTRAINT `lab_technicians_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `live_consultations`
--
ALTER TABLE `live_consultations`
  ADD CONSTRAINT `live_consultations_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `live_consultations_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mails`
--
ALTER TABLE `mails`
  ADD CONSTRAINT `mails_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicines`
--
ALTER TABLE `medicines`
  ADD CONSTRAINT `medicines_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `medicines_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nurses`
--
ALTER TABLE `nurses`
  ADD CONSTRAINT `nurses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opd_diagnoses`
--
ALTER TABLE `opd_diagnoses`
  ADD CONSTRAINT `opd_diagnoses_opd_patient_department_id_foreign` FOREIGN KEY (`opd_patient_department_id`) REFERENCES `opd_patient_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opd_patient_departments`
--
ALTER TABLE `opd_patient_departments`
  ADD CONSTRAINT `opd_patient_departments_case_id_foreign` FOREIGN KEY (`case_id`) REFERENCES `patient_cases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opd_patient_departments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opd_patient_departments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opd_timelines`
--
ALTER TABLE `opd_timelines`
  ADD CONSTRAINT `opd_timelines_opd_patient_department_id_foreign` FOREIGN KEY (`opd_patient_department_id`) REFERENCES `opd_patient_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `operation_reports`
--
ALTER TABLE `operation_reports`
  ADD CONSTRAINT `operation_reports_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operation_reports_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package_services`
--
ALTER TABLE `package_services`
  ADD CONSTRAINT `package_services_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `package_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pathology_tests`
--
ALTER TABLE `pathology_tests`
  ADD CONSTRAINT `pathology_tests_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `pathology_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pathology_tests_charge_category_id_foreign` FOREIGN KEY (`charge_category_id`) REFERENCES `charge_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_admissions`
--
ALTER TABLE `patient_admissions`
  ADD CONSTRAINT `patient_admissions_bed_id_foreign` FOREIGN KEY (`bed_id`) REFERENCES `beds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_admissions_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_admissions_insurance_id_foreign` FOREIGN KEY (`insurance_id`) REFERENCES `insurances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_admissions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_admissions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_cases`
--
ALTER TABLE `patient_cases`
  ADD CONSTRAINT `patient_cases_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_cases_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_diagnosis_properties`
--
ALTER TABLE `patient_diagnosis_properties`
  ADD CONSTRAINT `patient_diagnosis_properties_patient_diagnosis_id_foreign` FOREIGN KEY (`patient_diagnosis_id`) REFERENCES `patient_diagnosis_tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_diagnosis_tests`
--
ALTER TABLE `patient_diagnosis_tests`
  ADD CONSTRAINT `patient_diagnosis_tests_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `diagnosis_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_diagnosis_tests_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_diagnosis_tests_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pharmacists`
--
ALTER TABLE `pharmacists`
  ADD CONSTRAINT `pharmacists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescriptions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `radiology_tests`
--
ALTER TABLE `radiology_tests`
  ADD CONSTRAINT `radiology_tests_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `radiology_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `radiology_tests_charge_category_id_foreign` FOREIGN KEY (`charge_category_id`) REFERENCES `charge_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD CONSTRAINT `receptionists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule_days`
--
ALTER TABLE `schedule_days`
  ADD CONSTRAINT `schedule_days_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_days_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sms`
--
ALTER TABLE `sms`
  ADD CONSTRAINT `sms_send_by_foreign` FOREIGN KEY (`send_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sms_send_to_foreign` FOREIGN KEY (`send_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_zoom_credential`
--
ALTER TABLE `user_zoom_credential`
  ADD CONSTRAINT `user_zoom_credential_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaccinated_patients`
--
ALTER TABLE `vaccinated_patients`
  ADD CONSTRAINT `vaccinated_patients_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaccinated_patients_vaccination_id_foreign` FOREIGN KEY (`vaccination_id`) REFERENCES `vaccinations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
