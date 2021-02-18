-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2021 at 02:40 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arogyam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_db`
--

CREATE TABLE `admin_db` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `rights` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_db`
--

INSERT INTO `admin_db` (`id`, `user_name`, `passwd`, `rights`) VALUES
(1, '00001', 'KidneyCare@@1', 'Admin'),
(2, 'shivam', 'Shivam@123', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) UNSIGNED NOT NULL,
  `area` varchar(255) DEFAULT NULL,
  `st_code` text,
  `short_name` varchar(5) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `binary_income_details`
--

CREATE TABLE `binary_income_details` (
  `payout_id` int(30) NOT NULL,
  `itype` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `client_id` varchar(55) COLLATE latin1_general_ci DEFAULT NULL,
  `lft_ids` text COLLATE latin1_general_ci,
  `rgt_ids` text COLLATE latin1_general_ci,
  `left_leg_bv` decimal(9,2) NOT NULL DEFAULT '0.00',
  `right_leg_bv` decimal(9,2) NOT NULL DEFAULT '0.00',
  `left_pv` int(11) NOT NULL DEFAULT '0',
  `right_pv` int(11) NOT NULL DEFAULT '0',
  `cf_bv` decimal(9,2) NOT NULL DEFAULT '0.00',
  `cf_leg` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `total_current_pv` int(11) NOT NULL DEFAULT '0',
  `cur_point_value` decimal(9,2) NOT NULL DEFAULT '0.00',
  `pv_income` decimal(9,2) NOT NULL DEFAULT '0.00',
  `tds_charges` decimal(9,2) NOT NULL DEFAULT '0.00',
  `admin_charges` decimal(9,2) NOT NULL DEFAULT '0.00',
  `pay_income` decimal(9,2) NOT NULL DEFAULT '0.00',
  `payout_date` date NOT NULL DEFAULT '0000-00-00',
  `pay_status` int(1) NOT NULL DEFAULT '0',
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash_entry`
--

CREATE TABLE `cash_entry` (
  `c_id` int(11) UNSIGNED NOT NULL,
  `e_date` date DEFAULT '0000-00-00',
  `particulars` varchar(255) DEFAULT NULL,
  `dr_amt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `cr_amt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `remark` varchar(250) DEFAULT NULL,
  `deleted_record` int(1) NOT NULL DEFAULT '0',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_account_profile`
--

CREATE TABLE `client_account_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `client_intro_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `client_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_type` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'mlm',
  `parent_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `lft` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `rgt` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `position` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_by` varchar(20) COLLATE utf8_unicode_ci DEFAULT 'Signup',
  `blocked_status` int(1) NOT NULL DEFAULT '0',
  `new_user` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `client_entry_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_entry_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_pin` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_pin_cost` int(11) NOT NULL DEFAULT '0',
  `client_res_status` int(1) NOT NULL DEFAULT '1',
  `client_account_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repurchase_wallet` decimal(9,2) NOT NULL DEFAULT '0.00',
  `cash_back` decimal(9,2) NOT NULL DEFAULT '0.00',
  `activate_product_id` int(11) NOT NULL DEFAULT '0',
  `activate_package_id` int(2) NOT NULL DEFAULT '0',
  `cashback` decimal(9,2) NOT NULL DEFAULT '0.00',
  `join_date` date NOT NULL DEFAULT '0000-00-00',
  `level` int(11) NOT NULL DEFAULT '1',
  `AffiliateType` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_status` int(1) NOT NULL DEFAULT '0',
  `activation_date` date NOT NULL DEFAULT '0000-00-00',
  `activation_time` int(11) NOT NULL DEFAULT '0',
  `current_badge` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'STARTUP',
  `reward` int(11) NOT NULL DEFAULT '0',
  `club` int(11) NOT NULL DEFAULT '0',
  `active_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client_account_profile`
--

INSERT INTO `client_account_profile` (`id`, `role_id`, `client_intro_id`, `client_id`, `user_type`, `parent_id`, `lft`, `rgt`, `position`, `user_by`, `blocked_status`, `new_user`, `client_entry_name`, `client_entry_code`, `activated_pin`, `activated_pin_cost`, `client_res_status`, `client_account_code`, `repurchase_wallet`, `cash_back`, `activate_product_id`, `activate_package_id`, `cashback`, `join_date`, `level`, `AffiliateType`, `remember_token`, `entry_time`, `updated_at`, `activation_status`, `activation_date`, `activation_time`, `current_badge`, `reward`, `club`, `active_by`) VALUES
(1, 2, '0', '100111', 'mlm', '0', '41382', '0', '', 'Signup', 0, '0', 'arogyambharat', '333333', NULL, 0, 1, '987654', 0.00, 0.00, 0, 0, 0.00, '2019-04-20', 1, NULL, NULL, '2020-07-21 04:32:01', '2021-02-10 09:48:11', 1, '2020-07-21', 1595318513, 'STARTUP', 0, 0, 0),
(13, 2, '100111', '41382', 'mlm', '100111', '58273', '13754', 'lft', 'Signup', 0, '0', 'arogyamshimali', 'shimali@123', NULL, 0, 1, 'JRWKYTUE', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 09:48:11', '2021-02-10 10:48:19', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(14, 2, '41382', '58273', 'mlm', '41382', '71589', '0', 'lft', 'Signup', 0, '0', 'arogyamshashiji', 'shashi@123', NULL, 0, 1, 'RUEYTWJK', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 09:51:09', '2021-02-10 09:53:41', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(15, 2, '58273', '71589', 'mlm', '58273', '28765', '95128', 'lft', 'Signup', 0, '0', 'arogyamdeepak', 'deepak@123', NULL, 0, 1, 'KRYJETWU', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 09:53:41', '2021-02-10 10:15:50', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(16, 2, '71589', '28765', 'mlm', '71589', '74693', '47823', 'lft', 'Signup', 0, '0', 'arogyamvinod', 'vinod@123', NULL, 0, 1, 'WYUTKRJE', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 09:56:09', '2021-02-10 10:02:37', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(17, 2, '28765', '74693', 'mlm', '28765', '79652', '12639', 'lft', 'Signup', 0, '0', 'arogyamjitendra', 'jitendra@123', NULL, 0, 1, 'TUYWKRJE', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 09:57:53', '2021-02-10 10:13:06', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(18, 2, '28765', '47823', 'mlm', '28765', '37249', '0', 'rgt', 'Signup', 0, '0', 'arogyamritesh', 'ritesh@123', NULL, 0, 1, 'REWKYJTU', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 10:02:37', '2021-02-17 11:59:07', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(19, 2, '74693', '12639', 'mlm', '74693', '0', '62518', 'rgt', 'Signup', 0, '0', 'arogyamsarfaraz', 'sarfaraz@123', NULL, 0, 1, 'KJTWYRUE', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 10:07:55', '2021-02-17 11:03:32', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(20, 2, '74693', '79652', 'mlm', '74693', '93427', '0', 'lft', 'Signup', 0, '0', 'arogyamanil', 'anil@123', NULL, 0, 1, 'JUYKWTER', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 10:13:06', '2021-02-17 12:06:27', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(21, 2, '71589', '95128', 'mlm', '71589', '82149', '72835', 'rgt', 'Signup', 0, '0', 'arogyamshweta', 'shweta@123', NULL, 0, 1, 'JTEUKYRW', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 10:15:50', '2021-02-10 10:19:13', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(22, 2, '95128', '82149', 'mlm', '95128', '13652', '59186', 'lft', 'Signup', 0, '0', 'arogyamratnesh', 'ratnesh@123', NULL, 0, 1, 'YERWJKUT', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 10:17:33', '2021-02-10 11:07:23', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(23, 2, '95128', '72835', 'mlm', '95128', '0', '51824', 'rgt', 'Signup', 0, '0', 'arogyamroshini', 'roshini@123', NULL, 0, 1, 'EUKJYTRW', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 10:19:13', '2021-02-17 12:02:23', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(24, 2, '82149', '13652', 'mlm', '82149', '32751', '86145', 'lft', 'Signup', 0, '0', 'arogyamravi', 'ravi@123', NULL, 0, 1, 'JURWEYTK', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 10:21:36', '2021-02-10 10:28:11', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(25, 2, '13652', '32751', 'mlm', '13652', '57493', '0', 'lft', 'Signup', 0, '0', 'arogyamvishnu', 'vishnu@123', NULL, 0, 1, 'UWJKTYRE', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 10:24:33', '2021-02-16 10:22:07', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(26, 2, '13652', '86145', 'mlm', '13652', '28943', '45961', 'rgt', 'Signup', 0, '0', 'arogyamkishan', 'kishan@123', NULL, 0, 1, 'YKRJWUET', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 10:28:11', '2021-02-16 10:26:13', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(27, 2, '86145', '28943', 'mlm', '86145', '0', '0', 'lft', 'Signup', 0, '0', 'arogyamshivani', 'shivani@123', NULL, 0, 1, 'URTWYKJE', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 10:39:44', '2021-02-10 10:39:44', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(28, 2, '41382', '13754', 'mlm', '41382', '64789', '0', 'rgt', 'Signup', 0, '0', 'arogyamjankig', 'jankiG@123', NULL, 0, 1, 'JERYTKWU', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 10:48:19', '2021-02-10 10:55:25', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(29, 2, '13754', '64789', 'mlm', '13754', '24851', '67458', 'lft', 'Signup', 0, '0', 'utkarshji', 'Utkarsh@123', NULL, 0, 1, 'UEKWRTYJ', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 10:55:25', '2021-02-10 11:19:45', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(30, 2, '64789', '24851', 'mlm', '64789', '51874', '0', 'lft', 'Signup', 0, '0', 'tarunaji', 'Taruna@123', NULL, 0, 1, 'JRUYTKWE', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 10:57:42', '2021-02-10 11:07:09', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(31, 2, '24851', '51874', 'mlm', '24851', '64951', '0', 'lft', 'Signup', 0, '0', 'sumitji', 'Sumit@123', NULL, 0, 1, 'JRTKEUYW', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 11:07:09', '2021-02-18 06:42:38', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(32, 2, '82149', '59186', 'mlm', '82149', '53867', '83926', 'rgt', 'Signup', 0, '0', 'arogyamgaurav', 'gaurav@123', NULL, 0, 1, 'RJWUETYK', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 11:07:23', '2021-02-17 11:17:52', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(33, 2, '59186', '53867', 'mlm', '59186', '0', '0', 'lft', 'Signup', 0, '0', 'arogyammanish', 'manish@123', NULL, 0, 1, 'ETKWJURY', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 11:10:24', '2021-02-10 11:10:24', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(34, 2, '64789', '67458', 'mlm', '64789', '17829', '18275', 'rgt', 'Signup', 0, '0', 'someshji', 'Somesh@123', NULL, 0, 1, 'RWEYUTJK', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 11:19:45', '2021-02-10 12:17:12', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(35, 2, '67458', '17829', 'mlm', '67458', '97825', '0', 'lft', 'Signup', 0, '0', 'anoopji', 'Anoop@123', NULL, 0, 1, 'WERTJKUY', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 11:20:51', '2021-02-10 11:22:17', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(36, 2, '17829', '97825', 'mlm', '17829', '53628', '0', 'lft', 'Signup', 0, '0', 'shivamji', 'Shivam@123', NULL, 0, 1, 'WEJKUYTR', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 11:22:17', '2021-02-10 11:24:03', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(37, 2, '97825', '53628', 'mlm', '97825', '49623', '0', 'lft', 'Signup', 0, '0', 'shouryaji', 'Shourya@123', NULL, 0, 1, 'EJRUWKTY', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 11:24:03', '2021-02-10 11:25:50', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(38, 2, '53628', '49623', 'mlm', '53628', '0', '0', 'lft', 'Signup', 0, '0', 'omsrivastavaji', 'om@123', NULL, 0, 1, 'YWEKJURT', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 11:25:50', '2021-02-10 11:25:50', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(39, 2, '67458', '18275', 'mlm', '67458', '0', '0', 'rgt', 'Signup', 0, '0', 'rajnikantji', 'Rajnikant@123', NULL, 0, 1, 'YJWUKRTE', 0.00, 0.00, 0, 0, 0.00, '2021-02-10', 1, NULL, NULL, '2021-02-10 12:17:12', '2021-02-10 12:17:12', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(40, 2, '13652', '57493', 'mlm', '32751', '86753', '0', 'lft', 'Signup', 0, '0', 'arogyamraj', 'raj@123', NULL, 0, 1, 'RTKYJEUW', 0.00, 0.00, 0, 0, 0.00, '2021-02-16', 1, NULL, NULL, '2021-02-16 10:22:07', '2021-02-17 11:45:51', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(41, 2, '13652', '45961', 'mlm', '86145', '0', '0', 'rgt', 'Signup', 0, '0', 'arogyamavneet', 'avneet@123', NULL, 0, 1, 'KYREUWTJ', 0.00, 0.00, 0, 0, 0.00, '2021-02-16', 1, NULL, NULL, '2021-02-16 10:26:13', '2021-02-16 10:26:13', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(42, 2, '12639', '62518', 'mlm', '12639', '0', '0', 'rgt', 'Signup', 0, '0', 'manishpatel', 'patel@123', NULL, 0, 1, 'YURKEJWT', 0.00, 0.00, 0, 0, 0.00, '2021-02-17', 1, NULL, NULL, '2021-02-17 11:03:32', '2021-02-17 11:03:32', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(43, 2, '82149', '83926', 'mlm', '59186', '0', '49261', 'rgt', 'Signup', 0, '0', 'amarjeetpal', 'amarjeet@123', NULL, 0, 1, 'EJTRUYKW', 0.00, 0.00, 0, 0, 0.00, '2021-02-17', 1, NULL, NULL, '2021-02-17 11:17:52', '2021-02-17 11:22:52', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(44, 2, '82149', '49261', 'mlm', '83926', '0', '67598', 'rgt', 'Signup', 0, '0', 'ashishchand', 'ashish@123', NULL, 0, 1, 'RUKJWYET', 0.00, 0.00, 0, 0, 0.00, '2021-02-17', 1, NULL, NULL, '2021-02-17 11:22:52', '2021-02-17 11:38:13', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(45, 2, '82149', '67598', 'mlm', '49261', '0', '0', 'rgt', 'Signup', 0, '0', 'parveshmishra', 'parvesh@123', NULL, 0, 1, 'WKUYETRJ', 0.00, 0.00, 0, 0, 0.00, '2021-02-17', 1, NULL, NULL, '2021-02-17 11:38:13', '2021-02-17 11:38:13', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(46, 2, '13652', '86753', 'mlm', '57493', '47615', '59362', 'lft', 'Signup', 0, '0', 'haridwarsingh', 'haridwar@123', NULL, 0, 1, 'KWJUYTER', 0.00, 0.00, 0, 0, 0.00, '2021-02-17', 1, NULL, NULL, '2021-02-17 11:45:51', '2021-02-17 11:51:54', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(47, 2, '86753', '47615', 'mlm', '86753', '0', '0', 'lft', 'Signup', 0, '0', 'ramsakalverma', 'ramsakal@123', NULL, 0, 1, 'JEKTWURY', 0.00, 0.00, 0, 0, 0.00, '2021-02-17', 1, NULL, NULL, '2021-02-17 11:49:05', '2021-02-17 11:49:05', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(48, 2, '86753', '59362', 'mlm', '86753', '0', '0', 'rgt', 'Signup', 0, '0', 'kusummaurya', 'kusum@123', NULL, 0, 1, 'KTEYUWJR', 0.00, 0.00, 0, 0, 0.00, '2021-02-17', 1, NULL, NULL, '2021-02-17 11:51:54', '2021-02-17 11:51:54', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(49, 2, '47823', '37249', 'mlm', '47823', '0', '0', 'lft', 'Signup', 0, '0', 'sikandarnishad', 'nishad@123', NULL, 0, 1, 'EWTRUJYK', 0.00, 0.00, 0, 0, 0.00, '2021-02-17', 1, NULL, NULL, '2021-02-17 11:59:07', '2021-02-17 11:59:07', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(50, 2, '71589', '51824', 'mlm', '72835', '0', '0', 'rgt', 'Signup', 0, '0', 'princesingh', 'prince@123', NULL, 0, 1, 'KETUYRWJ', 0.00, 0.00, 0, 0, 0.00, '2021-02-17', 1, NULL, NULL, '2021-02-17 12:02:23', '2021-02-17 12:02:23', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(51, 2, '71589', '93427', 'mlm', '79652', '0', '0', 'lft', 'Signup', 0, '0', 'munnaprajapati', 'prajapati@123', NULL, 0, 1, 'TYKERJWU', 0.00, 0.00, 0, 0, 0.00, '2021-02-17', 1, NULL, NULL, '2021-02-17 12:06:27', '2021-02-17 12:06:27', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0),
(52, 2, '51874', '64951', 'mlm', '51874', '0', '0', 'lft', 'Signup', 0, '0', 'pramodji', 'Pramod@123', NULL, 0, 1, 'RUJKEYWT', 0.00, 0.00, 0, 0, 0.00, '2021-02-18', 1, NULL, NULL, '2021-02-18 06:42:38', '2021-02-18 06:42:38', 0, '0000-00-00', 0, 'STARTUP', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_achieve`
--

CREATE TABLE `client_achieve` (
  `aid` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL DEFAULT '0',
  `club_name` int(11) NOT NULL DEFAULT '0',
  `client_id` int(11) NOT NULL DEFAULT '0',
  `gen_date` date NOT NULL DEFAULT '0000-00-00',
  `entry_date` date NOT NULL DEFAULT '0000-00-00',
  `on_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_activation_request`
--

CREATE TABLE `client_activation_request` (
  `req_id` int(11) NOT NULL,
  `client_id` varchar(11) DEFAULT NULL,
  `invoice_no` varchar(30) DEFAULT NULL,
  `invoice_amt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `invoice_date` date NOT NULL DEFAULT '0000-00-00',
  `slip` text,
  `status` int(1) NOT NULL DEFAULT '0',
  `req_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_bonanza_achieve`
--

CREATE TABLE `client_bonanza_achieve` (
  `ac_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT '0',
  `bon_id` int(11) NOT NULL DEFAULT '0',
  `bon_date` date NOT NULL DEFAULT '0000-00-00',
  `amount` decimal(9,2) NOT NULL DEFAULT '0.00',
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_club_achieve`
--

CREATE TABLE `client_club_achieve` (
  `ac_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT '0',
  `bon_id` int(11) NOT NULL DEFAULT '0',
  `bon_date` date NOT NULL DEFAULT '0000-00-00',
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_gen_key_code`
--

CREATE TABLE `client_gen_key_code` (
  `keyid` int(11) NOT NULL,
  `user_id` varchar(155) DEFAULT NULL,
  `key_code` varchar(6) DEFAULT NULL,
  `entry_time` int(11) NOT NULL DEFAULT '0',
  `gen_date` date NOT NULL DEFAULT '0000-00-00',
  `purpose` varchar(50) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_invoices`
--

CREATE TABLE `client_invoices` (
  `id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `entry_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transfer_by` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `order_by` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'mlm',
  `invoice_fy` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_date` date DEFAULT '0000-00-00',
  `cust_code` int(11) NOT NULL DEFAULT '0',
  `client_id` varchar(55) COLLATE utf8_unicode_ci DEFAULT '0',
  `invoice_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shoppydiscount` decimal(9,2) NOT NULL DEFAULT '0.00',
  `total_amt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `total_bv` decimal(9,2) NOT NULL DEFAULT '0.00',
  `status` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `approve_date` date NOT NULL DEFAULT '0000-00-00',
  `v_status` int(1) NOT NULL DEFAULT '0',
  `voucher_date` date NOT NULL DEFAULT '0000-00-00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `invoice_token` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repurchase_generated` int(1) NOT NULL DEFAULT '0',
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_no` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `state` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` int(11) NOT NULL DEFAULT '0',
  `area` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wallet_amt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `coupon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `voucher` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_qty` int(11) NOT NULL DEFAULT '0',
  `min_order` double(9,2) NOT NULL DEFAULT '0.00',
  `shipping_charges` double(9,2) NOT NULL DEFAULT '0.00',
  `comments` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_level_commission`
--

CREATE TABLE `client_level_commission` (
  `lvl_id` int(11) NOT NULL,
  `client_id` varchar(55) DEFAULT NULL,
  `payout_date` date NOT NULL DEFAULT '0000-00-00',
  `level_commission` int(11) NOT NULL DEFAULT '0',
  `final_pay` decimal(9,2) NOT NULL DEFAULT '0.00',
  `client_intro_id` bigint(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `gen_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_personal_profile`
--

CREATE TABLE `client_personal_profile` (
  `auto_id` int(10) UNSIGNED NOT NULL,
  `client_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `m_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_father_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_pin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_dob` date DEFAULT '0000-00-00',
  `m_sex` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Acc_Holder` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_bank` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_bank_branch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_ac_no` text COLLATE utf8_unicode_ci,
  `ifsc_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_type` enum('current','saving') COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominee_relation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominee_age` int(11) NOT NULL DEFAULT '0',
  `nominee_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_pan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adhar_no` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paytm_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paytm_mobile` bigint(30) NOT NULL DEFAULT '0',
  `gpay_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gpay_mobile` bigint(10) NOT NULL DEFAULT '0',
  `join_date` date NOT NULL DEFAULT '0000-00-00',
  `m_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `pan_image` text COLLATE utf8_unicode_ci,
  `chk_img` text COLLATE utf8_unicode_ci,
  `adhaar_img` text COLLATE utf8_unicode_ci,
  `kyc_status` text COLLATE utf8_unicode_ci,
  `updation_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client_personal_profile`
--

INSERT INTO `client_personal_profile` (`auto_id`, `client_id`, `m_name`, `m_father_name`, `m_address`, `m_mobile`, `m_city`, `m_state`, `m_pin`, `m_dob`, `m_sex`, `m_country`, `Acc_Holder`, `m_email`, `m_bank`, `m_bank_branch`, `m_ac_no`, `ifsc_code`, `account_type`, `nominee`, `nominee_relation`, `nominee_age`, `nominee_number`, `m_pan`, `adhar_no`, `paytm_name`, `paytm_mobile`, `gpay_name`, `gpay_mobile`, `join_date`, `m_status`, `photo`, `pan_image`, `chk_img`, `adhaar_img`, `kyc_status`, `updation_status`, `created_at`, `updated_at`) VALUES
(1, '100111', 'AROGYAM BHARAT', '', 'Near Dhirendra Mahila PG College Village Karmajeetpur, Sundarpur, Varanasi 221005', '9161617272', 'Varanasi', 'Uttar Pradesh', '221005', '2000-03-21', '', 'india', 'na', 'bk@bkargyamhealthcare.com', 'na', 'na', '2312451234', 'na', NULL, 'Jyoti  Kesharwani', 'Mother', 48, '7348491136', 'HJTH890K', '345434564523', NULL, 0, NULL, 0, '2019-04-20', '', '', '161002432937581e92775d69807d5ce324d9a51dfb-700.jpg', '1610024329c1e000337f54faad027ee28557490fe5.jpg', '1610024329WhatsApp Image 2021-01-02 at 11.51.33 PM.jpeg', 'Approved', 0, '2020-07-21 04:32:01', '2021-02-05 10:11:43'),
(13, '41382', 'SHIMALI CHAURASIYA', NULL, NULL, '8318715403', 'Mirzapur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'shimalychaurasia@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 09:48:11', '2021-02-10 09:48:11'),
(14, '58273', 'SHASHI CHAURASIYA', NULL, NULL, '8299396036', 'Mirzapur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 09:51:09', '2021-02-10 09:51:09'),
(15, '71589', 'DEEPAK KUMAR SINGH', NULL, NULL, '8115688220', 'Varanasi', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'deepaksss1227@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 09:53:41', '2021-02-10 09:53:41'),
(16, '28765', 'VINOD CHAURASIYA', NULL, NULL, '9769904059', 'Mumbai', 'Maharashtra', NULL, '0000-00-00', NULL, NULL, NULL, 'vinodkumar.chaurasiya@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 09:56:09', '2021-02-10 09:56:09'),
(17, '74693', 'JITENDRA KUMAR TIWARI', NULL, NULL, '9026404069', 'Mughalsarai', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'tj21008@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 09:57:53', '2021-02-10 09:57:53'),
(18, '47823', 'RITESH CHAURASIYA', NULL, NULL, '8090387724', 'Mirzapur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'remercuras@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 10:02:37', '2021-02-10 10:02:37'),
(19, '12639', 'MOHD. SARFARAZ AHMED RAFIQUE', NULL, NULL, '9453481653', 'Mughalsarai', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'mohdsarfarazahmad047@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 10:07:55', '2021-02-10 10:07:55'),
(20, '79652', 'ANIL KUMAR RANJAN', NULL, NULL, '7071582651', 'Ghazipur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 10:13:06', '2021-02-10 10:13:06'),
(21, '95128', 'SHWETA CHAURASIYA ', NULL, NULL, '9696974720', 'Varanasi', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'bkarogyam090@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 10:15:50', '2021-02-10 10:15:50'),
(22, '82149', 'RATNESH KUMAR DUBEY', '', 'KODAILA ASHAPUR JAUNPUR', '9451646600', 'MANIYAHU', 'Uttar Pradesh', '222203', '1991-08-07', NULL, 'INDIA', 'RATNESH KUMAR DUBEY', 'DR.RATNESH1990@GMAIL.COM', 'SBI', 'MARYADPATTI', '20237239814', 'SBIN0016716', NULL, 'RANI DUBEY', 'Wife', 28, '8299778497', '', '', '', 0, '', 0, '2021-02-10', NULL, '', NULL, NULL, NULL, NULL, 0, '2021-02-10 10:17:33', '2021-02-11 09:35:18'),
(23, '72835', 'ROSHINI CHAURASIYA', NULL, NULL, '8887768301', 'Varanasi', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'anjalichaurasiyaanjalichaurasiya@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 10:19:13', '2021-02-10 10:19:13'),
(24, '13652', 'RAVI SHANKAR PANDEY', '', 'SH 15/163 A-1-S SHIVPUR', '9795512661', 'VARANASI', 'Uttar Pradesh', '221003', '1998-09-14', NULL, 'INDIA', 'RAVI SHANKER', 'RAVISHANKARBKAROGYAM@GMAIL.COM', 'PUNJAB NATIONAL BANK', 'ORDELY BAZAR', '4141001700008033', 'PUNB0414100', NULL, 'SUNITA PANDEY', 'Mother', 1, '7393911164', '', '', '', 0, '', 0, '2021-02-10', NULL, '', NULL, NULL, NULL, NULL, 0, '2021-02-10 10:21:36', '2021-02-16 10:34:06'),
(25, '32751', 'VISHNU DATT PATHAK', NULL, NULL, '6392053102', 'Ghazipur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'vishnu.bkarogyam@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 10:24:33', '2021-02-10 10:24:33'),
(26, '86145', 'KISHAN PRAJAPATI', NULL, NULL, '9519949711', 'Varanasi', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'kishu4him@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 10:28:11', '2021-02-10 10:28:11'),
(27, '28943', 'SHIVANI SHARMA', NULL, NULL, '9454091667', 'Varanasi', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'shivaniaarohi2207@gmailcom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 10:39:44', '2021-02-10 10:39:44'),
(28, '13754', 'DR. JANKI CHAURASIYA ', NULL, NULL, '8707059930', 'Mirzapur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 10:48:19', '2021-02-10 10:48:19'),
(29, '64789', 'UTKARSH KESHARWANI', NULL, NULL, '9984524896', 'Mirzapur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'utkarskkesharwani400@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 10:55:25', '2021-02-10 10:55:25'),
(30, '24851', 'TARUNA SHARMA ', NULL, NULL, '9140982160', 'Mirzapur ', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'tarunasharma8687@gmail.com ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 10:57:42', '2021-02-10 10:57:42'),
(31, '51874', 'SUMIT RANJAN ', NULL, NULL, '7827833514', 'Mirzapur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'sumitranjan883@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 11:07:09', '2021-02-10 11:07:09'),
(32, '59186', 'GAURAV PRAJAPATI', NULL, NULL, '7905521883', 'Varanasi', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'monty211993@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 11:07:23', '2021-02-10 11:07:23'),
(33, '53867', 'MANISH SONKAR', NULL, NULL, '8181878819', 'Varanasi', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'ashlermanishsonkar888@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 11:10:24', '2021-02-10 11:10:24'),
(34, '67458', 'SOMESH SRIVASTAV', NULL, NULL, '9919345646', 'Mirzapur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'someshbkarogyam@gmail.com ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 11:19:45', '2021-02-10 11:19:45'),
(35, '17829', 'ANOOP KUMAR ', NULL, NULL, '7015033790', 'Mirzapur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'agraharianoop10@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 11:20:51', '2021-02-10 11:20:51'),
(36, '97825', 'SHIVAM GUPTA ', NULL, NULL, '9369100980', 'Varanasi', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'gshivam112@gmail.com ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 11:22:17', '2021-02-10 11:22:17'),
(37, '53628', 'SHOURYA GUPTA ', NULL, NULL, '8318642577', 'Mirzapur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'shouryagupta5633@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 11:24:03', '2021-02-10 11:24:03'),
(38, '49623', 'OM SRIVASTAVA', NULL, NULL, '9125017994', 'Mirzapur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'omsrivastava394@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 11:25:50', '2021-02-10 11:25:50'),
(39, '18275', 'RAJNI KANT MISHRA ', NULL, NULL, '9586040605', 'Varanasi', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'mishra_rk05@yahoo.co.in', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-10 12:17:12', '2021-02-10 12:17:12'),
(40, '57493', 'RAJ PRATAP SINGH', NULL, NULL, '9519418019', 'Varanasi', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'rajpratapsingh222@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-16', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-16 10:22:07', '2021-02-16 10:22:07'),
(41, '45961', 'AVNEET SINGH', NULL, NULL, '9695398424', 'Mirzapur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'avneet972@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-16', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-16 10:26:13', '2021-02-16 10:26:13'),
(42, '62518', 'MANISH KUMAR PATEL', NULL, NULL, '7393002913', 'Robertsgganj', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'manishkumarpatel1945@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-17', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-17 11:03:32', '2021-02-17 11:03:32'),
(43, '83926', 'AMARJEET PAL', NULL, NULL, '7676014672', 'Mau', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'dr.amarpal07@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-17', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-17 11:17:52', '2021-02-17 11:17:52'),
(44, '49261', 'ASHISH CHAND', NULL, NULL, '7838569907', 'Bhadohi', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'ashishchand07@gmailcom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-17', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-17 11:22:52', '2021-02-17 11:22:52'),
(45, '67598', 'PARVESH MISHRA', NULL, NULL, '9956285380', 'Jaunpur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'drpraveshm@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-17', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-17 11:38:13', '2021-02-17 11:38:13'),
(46, '86753', 'HARIDWAR SINGH', NULL, NULL, '7398354044', 'Maddhupur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'dr.harisingh0611@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-17', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-17 11:45:51', '2021-02-17 11:45:51'),
(47, '47615', 'RAMSAKAL VERMA', NULL, NULL, '9565319084', 'Maddhupur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'jpsingh9579@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-17', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-17 11:49:05', '2021-02-17 11:49:05'),
(48, '59362', 'KUSUM KALA MAURYA', NULL, NULL, '6386823869', 'Maddhupur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'zkusummaurya@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-17', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-17 11:51:54', '2021-02-17 11:51:54'),
(49, '37249', 'SIKANDER NISHAD', NULL, NULL, '9026618031', 'Ghazipur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'sikandernishad78@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-17', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-17 11:59:07', '2021-02-17 11:59:07'),
(50, '51824', 'PRINCE KUMAR SINGH', NULL, NULL, '8887331182', 'Chunar', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'princesinghbhaktmahakal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-17', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-17 12:02:23', '2021-02-17 12:02:23'),
(51, '93427', 'MUNNA PRAJAPATI', NULL, NULL, '9839095035', 'Varanasi', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'monty211993@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-17', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-17 12:06:27', '2021-02-17 12:06:27'),
(52, '64951', 'PRAMOD KUMAR ', NULL, NULL, '8423530487', 'Mirzapur', 'Uttar Pradesh', NULL, '0000-00-00', NULL, NULL, NULL, 'pramodkumar1996mzp@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, '2021-02-18', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-02-18 06:42:38', '2021-02-18 06:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `closing_income_record`
--

CREATE TABLE `closing_income_record` (
  `cid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `client_id` int(11) NOT NULL DEFAULT '0',
  `total_income` decimal(9,2) DEFAULT '0.00',
  `tds` decimal(9,2) NOT NULL DEFAULT '0.00',
  `admin` decimal(9,2) NOT NULL DEFAULT '0.00',
  `pay_income` decimal(9,2) NOT NULL DEFAULT '0.00',
  `closing_date` date NOT NULL DEFAULT '0000-00-00',
  `entry_date` date NOT NULL DEFAULT '0000-00-00',
  `on_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `club_startup`
--

CREATE TABLE `club_startup` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `client_id` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `bv` decimal(9,2) NOT NULL DEFAULT '0.00',
  `upgrade_given` text COLLATE utf8_unicode_ci,
  `upgraded_wallet` int(11) NOT NULL DEFAULT '0',
  `withdrawal_wallet` int(11) NOT NULL DEFAULT '0',
  `shopping_wallet` int(11) NOT NULL DEFAULT '0',
  `company_wallet` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '1',
  `upcoming_club` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'club_silver',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activation_date` date NOT NULL DEFAULT '0000-00-00',
  `adjust_upgrade` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `mobile_number`, `address`, `created_at`) VALUES
(8, 'Dewey Frankfurter', 'dewey.frankfurter97@msn.com', '989 65 492', 'Hi,\r\n\r\nAre you presently operating Wordpress/Woocommerce or do you actually want to utilise it sometime soon ? We currently provide more than 5000 premium plugins but also themes to download : http://ipurl.website/yTazM\r\n\r\nCheers,\r\n\r\nDewey', '2021-02-01 16:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `auto_id` int(10) UNSIGNED NOT NULL,
  `client_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `client_intro_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_father_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_pin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_dob` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_sex` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Acc_Holder` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_bank` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_bank_branch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_ac_no` text COLLATE utf8_unicode_ci,
  `ifsc_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_type` enum('current','saving') COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominee_relation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominee_age` int(11) NOT NULL DEFAULT '0',
  `nominee_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_pan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adhar_no` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paytm_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paytm_mobile` bigint(30) NOT NULL DEFAULT '0',
  `gpay_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gpay_mobile` bigint(10) NOT NULL DEFAULT '0',
  `phonepe_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `phonepe_mobile` bigint(30) NOT NULL DEFAULT '0',
  `pan_img` text COLLATE utf8_unicode_ci,
  `adhaar_img` text COLLATE utf8_unicode_ci,
  `join_date` date NOT NULL DEFAULT '0000-00-00',
  `m_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `photo1` text COLLATE utf8_unicode_ci,
  `photo2` text COLLATE utf8_unicode_ci,
  `kyc_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_free_product_detail`
--

CREATE TABLE `customer_free_product_detail` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `voucher_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `invoice_id` text,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `client_id` varchar(55) NOT NULL DEFAULT '0',
  `product_name` varchar(50) DEFAULT NULL,
  `product_code` varchar(20) DEFAULT NULL,
  `product_qty` int(11) NOT NULL DEFAULT '0',
  `product_cost` varchar(50) DEFAULT NULL,
  `discount` decimal(9,2) NOT NULL DEFAULT '0.00',
  `product_gst` decimal(9,2) NOT NULL DEFAULT '0.00',
  `final_amt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `bv` decimal(9,2) NOT NULL DEFAULT '0.00',
  `be_per` decimal(9,2) NOT NULL DEFAULT '0.00',
  `invoice_date` timestamp NULL DEFAULT NULL,
  `order_type` varchar(50) DEFAULT NULL,
  `order_for` varchar(20) NOT NULL DEFAULT 'Purchase',
  `status` varchar(15) NOT NULL DEFAULT 'Pending',
  `approve_date` date NOT NULL DEFAULT '0000-00-00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_product_detail`
--

CREATE TABLE `customer_product_detail` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `voucher_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `invoice_id` int(8) UNSIGNED ZEROFILL NOT NULL DEFAULT '00000000',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `client_id` varchar(55) NOT NULL DEFAULT '0',
  `product_name` varchar(50) DEFAULT NULL,
  `product_code` varchar(20) DEFAULT NULL,
  `product_qty` int(11) NOT NULL DEFAULT '0',
  `product_cost` varchar(50) DEFAULT NULL,
  `discount` decimal(9,2) NOT NULL DEFAULT '0.00',
  `product_gst` decimal(9,2) NOT NULL DEFAULT '0.00',
  `final_amt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `bv` decimal(9,2) NOT NULL DEFAULT '0.00',
  `be_per` decimal(9,2) NOT NULL DEFAULT '0.00',
  `invoice_date` timestamp NULL DEFAULT NULL,
  `order_type` varchar(50) DEFAULT NULL,
  `order_for` varchar(20) NOT NULL DEFAULT 'Purchase',
  `status` varchar(15) NOT NULL DEFAULT 'Pending',
  `approve_date` date NOT NULL DEFAULT '0000-00-00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_product_rate_review`
--

CREATE TABLE `customer_product_rate_review` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `invoice_id` int(8) UNSIGNED ZEROFILL NOT NULL DEFAULT '00000000',
  `client_id` varchar(55) NOT NULL DEFAULT '0',
  `review` text,
  `rating` int(11) NOT NULL DEFAULT '0',
  `status` varchar(15) NOT NULL DEFAULT 'Pending',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approve_date` date NOT NULL DEFAULT '0000-00-00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `epin_request`
--

CREATE TABLE `epin_request` (
  `req_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile_no` bigint(10) NOT NULL DEFAULT '0',
  `prod_id` int(11) NOT NULL DEFAULT '0',
  `no_packages` int(11) DEFAULT '0',
  `u_name` varchar(20) DEFAULT NULL,
  `slip` text,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `on_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `epin_transfer`
--

CREATE TABLE `epin_transfer` (
  `t_id` int(11) UNSIGNED NOT NULL,
  `epin_id` int(11) NOT NULL DEFAULT '0',
  `trans_from` varchar(100) DEFAULT NULL,
  `transfer_to` varchar(100) DEFAULT NULL,
  `trans_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `descp` longtext,
  `event_type` varchar(50) DEFAULT NULL,
  `posted_by` varchar(100) DEFAULT NULL,
  `dated_on` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) NOT NULL DEFAULT '0',
  `feed_date` date NOT NULL DEFAULT '0000-00-00',
  `msg` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `franchise_htc`
--

CREATE TABLE `franchise_htc` (
  `id` int(11) NOT NULL,
  `form_name` varchar(255) NOT NULL,
  `form_phone` varchar(15) NOT NULL,
  `form_email` varchar(255) DEFAULT NULL,
  `aadhar_card` varchar(255) NOT NULL,
  `cwp` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `franchise_htc`
--

INSERT INTO `franchise_htc` (`id`, `form_name`, `form_phone`, `form_email`, `aadhar_card`, `cwp`, `address`, `create_at`, `status`) VALUES
(1, 'Shivam', '8527783512', 'gshivam112@gmail.com', 'dssdss', 'dgd', 'D 14/67 Tedhineem Varanasi', '2021-01-27 08:18:16', 1),
(2, 'Om', '9125017994', 'om.bkarogyam@gmail.com', 'practicedoctor', 'dgd', 'braundha', '2021-02-18 08:36:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `franchise_type`
--

CREATE TABLE `franchise_type` (
  `tid` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `commission` decimal(9,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `franchise_type`
--

INSERT INTO `franchise_type` (`tid`, `name`, `commission`) VALUES
(1, 'Cost and Freight (C&F)', 11.00),
(2, 'Deport(depo)', 8.00),
(3, 'Health Touch Center (HTC) ', 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `generate_coupans`
--

CREATE TABLE `generate_coupans` (
  `pin_id` int(11) UNSIGNED NOT NULL,
  `invoice_id` int(8) UNSIGNED ZEROFILL NOT NULL DEFAULT '00000000',
  `epin_type` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `epin_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `epin` varchar(11) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `epin_cost` int(9) DEFAULT '0',
  `gen_by` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Admin',
  `current_owner` varchar(20) DEFAULT NULL,
  `gen_date` date DEFAULT '0000-00-00',
  `current_status` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Unused',
  `used_date` date NOT NULL DEFAULT '0000-00-00',
  `used_by` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `up_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `generate_pin`
--

CREATE TABLE `generate_pin` (
  `pin_id` int(11) UNSIGNED NOT NULL,
  `epin_type` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `epin_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `epin` varchar(11) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `prod_id` int(11) DEFAULT '0',
  `epin_cost` int(9) DEFAULT '0',
  `epin_bv` int(11) DEFAULT '0',
  `gen_by` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Admin',
  `current_owner` varchar(20) DEFAULT NULL,
  `gen_date` date DEFAULT '0000-00-00',
  `current_status` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Unused',
  `used_date` date NOT NULL DEFAULT '0000-00-00',
  `used_by` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `up_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `global_settings`
--

CREATE TABLE `global_settings` (
  `id` int(11) NOT NULL,
  `logo` text,
  `favicon` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `protocol` set('http://','https://') NOT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` bigint(20) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `invoice_prefix` varchar(55) DEFAULT NULL,
  `invoice_fy` varchar(55) NOT NULL DEFAULT '0',
  `direct_income` int(11) NOT NULL DEFAULT '0',
  `roi_income` int(11) NOT NULL DEFAULT '0',
  `binary_income` int(11) NOT NULL DEFAULT '0',
  `admin_charge` int(11) NOT NULL DEFAULT '0',
  `tds_charge` int(11) NOT NULL DEFAULT '0',
  `currency` varchar(255) DEFAULT NULL,
  `formemail` varchar(255) DEFAULT NULL,
  `googlemap` longtext,
  `bonanza` text,
  `p_policies` text,
  `t_condition` text,
  `disclaimer` text,
  `dark_bg` varchar(55) DEFAULT NULL,
  `light_bg` varchar(55) DEFAULT NULL,
  `web_dark_bg` varchar(55) DEFAULT NULL,
  `web_light_bg` varchar(55) DEFAULT NULL,
  `web_font_color` varchar(55) DEFAULT NULL,
  `web_fonthover_color` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `global_settings`
--

INSERT INTO `global_settings` (`id`, `logo`, `favicon`, `name`, `protocol`, `domain`, `address`, `contact`, `email`, `invoice_prefix`, `invoice_fy`, `direct_income`, `roi_income`, `binary_income`, `admin_charge`, `tds_charge`, `currency`, `formemail`, `googlemap`, `bonanza`, `p_policies`, `t_condition`, `disclaimer`, `dark_bg`, `light_bg`, `web_dark_bg`, `web_light_bg`, `web_font_color`, `web_fonthover_color`) VALUES
(2, 'logo.png', 'favicon.png', 'Arogyam Bharat', 'https://', 'arogyambharat.com', 'Near Dhirendra Mahila PG College Village Karmajeetpur, Sundarpur, Varanasi 221005', 9161617272, 'bk@bkarogyamhealthcare.com', 'MA', '20-21', 1000, 40, 200, 5, 5, 'INR', 'bk@bkarogyamhealthcare.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.850534116323!2d82.97578991428132!3d25.275612933859772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcaedc787fd3494d4!2sDhirendra%20Mahila%20P.G.%20College!5e0!3m2!1sen!2sin!4v1609324396869!5m2!1sen!2sin', '', '', '', '', '032F54', '0E71C5', 'FFFFFF', 'FFFFFF', 'FFFFFF', 'FFFFFF');

-- --------------------------------------------------------

--
-- Table structure for table `income_cashback`
--

CREATE TABLE `income_cashback` (
  `id` int(11) NOT NULL,
  `level` int(1) NOT NULL DEFAULT '0',
  `client_id` varchar(20) DEFAULT NULL,
  `invoice_id` int(8) UNSIGNED ZEROFILL NOT NULL DEFAULT '00000000',
  `total_amt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `comp_turnover` decimal(9,2) NOT NULL DEFAULT '0.00',
  `distribution` decimal(9,2) NOT NULL DEFAULT '0.00',
  `cash_back` decimal(9,2) NOT NULL DEFAULT '0.00',
  `entry_date` date NOT NULL DEFAULT '0000-00-00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income_roi`
--

CREATE TABLE `income_roi` (
  `inc_id` int(11) NOT NULL,
  `booking_no` varchar(12) DEFAULT NULL,
  `roi_no` int(11) NOT NULL DEFAULT '0',
  `client_id` int(11) NOT NULL DEFAULT '0',
  `join_amt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `return_amt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `return_mode` varchar(20) NOT NULL DEFAULT 'monthly',
  `per` int(2) NOT NULL DEFAULT '0',
  `pay_date` date NOT NULL DEFAULT '0000-00-00',
  `gen_date` date NOT NULL DEFAULT '0000-00-00',
  `wallet_add_status` int(1) NOT NULL DEFAULT '0',
  `ref_id` int(11) NOT NULL DEFAULT '0',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `income_shopping`
--

CREATE TABLE `income_shopping` (
  `id` int(11) NOT NULL,
  `income_type` varchar(20) DEFAULT NULL,
  `user_id` int(10) DEFAULT '0',
  `ref_user_id` int(10) DEFAULT '0',
  `client_id` int(11) NOT NULL DEFAULT '0',
  `invoice_id` int(11) NOT NULL DEFAULT '0',
  `ref_client_id` int(11) NOT NULL DEFAULT '0',
  `total_amt` decimal(9,2) DEFAULT '0.00',
  `total_bv` decimal(9,2) DEFAULT '0.00',
  `bv_percentage` decimal(9,2) DEFAULT '0.00',
  `total_commission` decimal(9,2) DEFAULT '0.00',
  `tds_charges` decimal(9,2) DEFAULT '0.00',
  `admin_charges` decimal(9,2) DEFAULT '0.00',
  `payable_income` decimal(9,2) DEFAULT '0.00',
  `closing_month` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT '00',
  `payout_date` date DEFAULT '0000-00-00',
  `pay_status` int(11) NOT NULL DEFAULT '0',
  `entry_date` date DEFAULT '0000-00-00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reward_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail_communication`
--

CREATE TABLE `mail_communication` (
  `mail_id` int(11) NOT NULL,
  `query_no` varchar(6) DEFAULT NULL,
  `query_for` varchar(10) DEFAULT NULL,
  `cen_rply_ref_mail_id` int(11) NOT NULL DEFAULT '0',
  `cen_id` int(6) NOT NULL DEFAULT '0',
  `stu_id` int(11) NOT NULL DEFAULT '0',
  `admin_id` int(6) NOT NULL DEFAULT '0',
  `head_title` varchar(100) DEFAULT NULL,
  `comm_msg` varchar(255) DEFAULT NULL,
  `image` text,
  `add_date` date NOT NULL DEFAULT '0000-00-00',
  `status` int(1) NOT NULL DEFAULT '0',
  `r_status` varchar(15) DEFAULT NULL,
  `final_status` int(1) NOT NULL DEFAULT '0',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail_conversation`
--

CREATE TABLE `mail_conversation` (
  `con_id` int(11) NOT NULL,
  `query_no` int(8) NOT NULL DEFAULT '0',
  `query_for` varchar(10) DEFAULT NULL,
  `mail_id` int(11) NOT NULL DEFAULT '0',
  `reply_by` int(11) NOT NULL DEFAULT '0',
  `stu_id` int(11) NOT NULL DEFAULT '0',
  `msg` varchar(255) DEFAULT NULL,
  `image` text,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `next_date` date NOT NULL DEFAULT '0000-00-00',
  `final_status` int(1) NOT NULL DEFAULT '0',
  `admn_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_gallery_details`
--

CREATE TABLE `main_gallery_details` (
  `id` int(11) NOT NULL,
  `heading` varchar(25) DEFAULT NULL,
  `description` text,
  `image` text,
  `link` text,
  `posted_by` varchar(50) DEFAULT NULL,
  `cr_date` date NOT NULL DEFAULT '0000-00-00',
  `cr_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

CREATE TABLE `master_admin` (
  `aid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `last_name` varchar(50) NOT NULL DEFAULT '',
  `first_name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT 'NA',
  `mobile` varchar(255) NOT NULL DEFAULT 'NA',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `pre_type` varchar(50) DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_admin`
--

INSERT INTO `master_admin` (`aid`, `username`, `password`, `last_name`, `first_name`, `email`, `mobile`, `status`, `pre_type`, `update_date`, `date`) VALUES
(1, 'admin', '$2y$11$hfNWRLQioCZWODkOHB197u2pUWhQi2Iz/RdzwjBtz3bsrPxsIznn2', 'Admin', 'Admin', 'admin@admin.com', '9335266301', 1, 'Admin', '2021-02-03 05:19:57', '2010-12-01'),
(2, 'superadmin', '$2y$11$edtEcV4B16FgKwrUaNGKR.t1hPCUOFRfSSLeBWRAErWOEqR5hk6r.', 'Admin', 'Super', 'sotsskill@gmail.com', '9335266301', 1, 'Super Admin', '0000-00-00 00:00:00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `master_club`
--

CREATE TABLE `master_club` (
  `id` int(11) NOT NULL,
  `badge` varchar(100) DEFAULT NULL,
  `target` bigint(20) NOT NULL DEFAULT '0',
  `club_percentage` int(11) DEFAULT '0',
  `pay_limit` int(11) NOT NULL DEFAULT '0',
  `scheme` varchar(100) NOT NULL DEFAULT 'club'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_commission`
--

CREATE TABLE `master_commission` (
  `id` int(11) NOT NULL,
  `rank_name` varchar(255) NOT NULL DEFAULT '',
  `no_of_group` int(11) NOT NULL DEFAULT '0',
  `rank_income_pv` double(13,2) NOT NULL DEFAULT '0.00',
  `bonus_pv` double(13,2) NOT NULL DEFAULT '0.00',
  `bonus_pv_month` int(11) NOT NULL DEFAULT '0',
  `total_income_pv` double(13,2) NOT NULL DEFAULT '0.00',
  `reward` varchar(255) NOT NULL DEFAULT '',
  `repurchase_income` int(11) NOT NULL DEFAULT '0',
  `travel_fund_bv` double(9,2) NOT NULL DEFAULT '0.00',
  `travel_fund_bv_per` int(11) NOT NULL DEFAULT '0',
  `royality_bv` varchar(255) NOT NULL DEFAULT '',
  `on_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_countries`
--

CREATE TABLE `master_countries` (
  `id` int(11) NOT NULL,
  `co_name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `seq` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin2;

-- --------------------------------------------------------

--
-- Table structure for table `master_deals`
--

CREATE TABLE `master_deals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `prod_id` text,
  `entry_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_epin_type`
--

CREATE TABLE `master_epin_type` (
  `id` int(11) NOT NULL,
  `epin_name` varchar(255) DEFAULT NULL,
  `epin_profile` varchar(255) DEFAULT NULL,
  `epin_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_franchise`
--

CREATE TABLE `master_franchise` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fr_code` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `client_intro_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `client_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `client_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `m_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_username` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `m_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `m_gstin` varchar(155) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `m_father_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_pin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_smobile` int(20) NOT NULL DEFAULT '0',
  `m_landmark` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `m_dob` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_sex` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Acc_Holder` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_bank` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_bank_branch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_ac_no` text COLLATE utf8_unicode_ci,
  `ifsc_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_type` enum('current','saving') COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominee_relation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominee_age` int(11) NOT NULL DEFAULT '0',
  `nominee_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_pan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adhar_no` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paytm_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paytm_mobile` bigint(30) NOT NULL DEFAULT '0',
  `gpay_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gpay_mobile` bigint(10) NOT NULL DEFAULT '0',
  `join_date` date NOT NULL DEFAULT '0000-00-00',
  `m_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pan_img` text COLLATE utf8_unicode_ci,
  `adhar_img` text COLLATE utf8_unicode_ci,
  `gstn_img` text COLLATE utf8_unicode_ci,
  `photo` text COLLATE utf8_unicode_ci,
  `pan_image` text COLLATE utf8_unicode_ci,
  `payment_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '0',
  `kyc` tinyint(4) NOT NULL DEFAULT '0',
  `remark` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `enable_date` timestamp NULL DEFAULT NULL,
  `approved_status` tinyint(4) NOT NULL DEFAULT '0',
  `approved_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `master_franchise`
--

INSERT INTO `master_franchise` (`id`, `type`, `fr_code`, `client_intro_id`, `client_id`, `client_name`, `first_name`, `last_name`, `m_name`, `m_username`, `m_password`, `m_gstin`, `m_father_name`, `m_address`, `m_mobile`, `m_city`, `m_state`, `m_pin`, `m_smobile`, `m_landmark`, `m_dob`, `m_sex`, `m_country`, `Acc_Holder`, `m_email`, `m_bank`, `m_bank_branch`, `m_ac_no`, `ifsc_code`, `account_type`, `nominee`, `nominee_relation`, `nominee_age`, `nominee_number`, `m_pan`, `adhar_no`, `paytm_name`, `paytm_mobile`, `gpay_name`, `gpay_mobile`, `join_date`, `m_status`, `pan_img`, `adhar_img`, `gstn_img`, `photo`, `pan_image`, `payment_img`, `status`, `kyc`, `remark`, `created_at`, `updated_at`, `deleted_at`, `enable_date`, `approved_status`, `approved_date`) VALUES
(1, 'District Stock Point (DSP)', 'FR201001', '0', 'FR201001', '', 'B.K.Arogyam', 'Healthcare', 'B.K.Arogyam', 'Healthcare', '333333', '32145689', '', 'Dhirendra Mahila PG College Village Karmajeetpur, Sundarpur, Varanasi', '9161617272', 'Varanasi', 'Uttar Pradesh', '221005', 0, '', '2019-07-04', '', 'India', 'MMIS', 'support@missionarogyam.com ', 'test', 'test', '1111111111111', 'SS1111111', NULL, '', 'Select Relation', 0, '', '11111111', '4111111', '', 9999999999, '', 0, '2019-07-04', '', '', NULL, '', '1594998996WHM vector logo.jpg', NULL, '', 1, 0, '', '2019-07-04 16:58:02', '2020-12-31 10:23:01', NULL, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `master_franchise_accounts`
--

CREATE TABLE `master_franchise_accounts` (
  `id` int(11) NOT NULL,
  `franchise_id` int(11) NOT NULL DEFAULT '0',
  `amount` double(20,2) NOT NULL DEFAULT '0.00',
  `amount_type` varchar(55) NOT NULL DEFAULT 'credit',
  `mode` varchar(255) NOT NULL DEFAULT '',
  `invoice_id` int(8) UNSIGNED ZEROFILL NOT NULL DEFAULT '00000000',
  `challan_no` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `remark` text,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_franchise_product_qty`
--

CREATE TABLE `master_franchise_product_qty` (
  `id` int(11) NOT NULL,
  `franchise_id` int(11) NOT NULL DEFAULT '0',
  `prod_id` int(11) NOT NULL DEFAULT '0',
  `previous_qty` int(11) NOT NULL DEFAULT '0',
  `current_qty` int(11) NOT NULL DEFAULT '0',
  `added_from` varchar(50) DEFAULT NULL,
  `invoice_id` int(8) UNSIGNED ZEROFILL NOT NULL DEFAULT '00000000',
  `challan_no` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remark` text,
  `min_qty_rem` int(11) NOT NULL DEFAULT '0',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_franchise_product_request_qty`
--

CREATE TABLE `master_franchise_product_request_qty` (
  `id` int(11) NOT NULL,
  `franchise_id` int(11) NOT NULL DEFAULT '0',
  `prod_id` int(11) NOT NULL DEFAULT '0',
  `request_qty` int(11) NOT NULL DEFAULT '0',
  `added_from` enum('pending','approved','disapproved','notavailable') NOT NULL DEFAULT 'pending',
  `request_id` int(8) UNSIGNED ZEROFILL NOT NULL DEFAULT '00000000',
  `challan_no` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remark` text,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_orders`
--

CREATE TABLE `master_orders` (
  `id` int(11) NOT NULL,
  `order_fy` varchar(20) DEFAULT NULL,
  `order_no` varchar(155) DEFAULT NULL,
  `order_token` varchar(155) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `client_id` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(155) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `telephone` varchar(155) NOT NULL DEFAULT '',
  `address` text,
  `state` varchar(155) NOT NULL DEFAULT '',
  `city` varchar(155) NOT NULL DEFAULT '',
  `country` varchar(155) NOT NULL DEFAULT '',
  `postcode` int(11) NOT NULL DEFAULT '0',
  `payment_method` varchar(155) NOT NULL DEFAULT '',
  `wallet_amt` double(9,2) NOT NULL DEFAULT '0.00',
  `coupon` varchar(155) NOT NULL DEFAULT '',
  `voucher` varchar(155) NOT NULL DEFAULT '',
  `total_qty` int(11) NOT NULL DEFAULT '0',
  `total_amt` double(9,2) NOT NULL DEFAULT '0.00',
  `comments` text,
  `entry_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('success','failed','pending','canceled') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_orders_detail`
--

CREATE TABLE `master_orders_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `prod_id` int(11) NOT NULL DEFAULT '0',
  `prod_qty` int(11) NOT NULL DEFAULT '0',
  `prod_amt` double(9,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_product`
--

CREATE TABLE `master_product` (
  `prod_id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `fk_cid` int(11) DEFAULT '0',
  `fk_tid` int(11) NOT NULL DEFAULT '0',
  `product_name` varchar(100) DEFAULT NULL,
  `product_code` varchar(20) DEFAULT NULL,
  `amt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `qty` int(11) NOT NULL DEFAULT '0',
  `discount` decimal(9,2) NOT NULL DEFAULT '0.00',
  `bv` decimal(9,2) NOT NULL DEFAULT '0.00',
  `dp` decimal(9,2) NOT NULL DEFAULT '0.00',
  `master_coin` decimal(20,2) NOT NULL DEFAULT '0.00',
  `picup_mrp` decimal(9,2) NOT NULL DEFAULT '0.00',
  `shipping_charge` decimal(9,2) NOT NULL DEFAULT '0.00',
  `gst` int(2) DEFAULT '0',
  `p_image` text,
  `shopping_status` int(1) NOT NULL DEFAULT '0',
  `descp` text,
  `deals` int(11) NOT NULL DEFAULT '0',
  `deals_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `add_date` date NOT NULL DEFAULT '0000-00-00',
  `upload_by` varchar(20) DEFAULT NULL,
  `show_status` int(1) NOT NULL DEFAULT '0',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_product_attribute`
--

CREATE TABLE `master_product_attribute` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `is_option` varchar(55) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_product_attribute_values`
--

CREATE TABLE `master_product_attribute_values` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `attribute_value` varchar(255) NOT NULL DEFAULT '',
  `attribute_code` varchar(155) DEFAULT NULL,
  `attribute_sequence` int(11) NOT NULL DEFAULT '0',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_product_attribute_value_com`
--

CREATE TABLE `master_product_attribute_value_com` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_type_attribute_id` int(11) NOT NULL DEFAULT '0',
  `product_attribute_value_ids` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_product_category`
--

CREATE TABLE `master_product_category` (
  `cat_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `category` varchar(50) DEFAULT NULL,
  `icon` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '1',
  `up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_product_category`
--

INSERT INTO `master_product_category` (`cat_id`, `pid`, `category`, `icon`, `image`, `status`, `up`) VALUES
(1, 0, 'AROGYVEDA ', '', '', 1, '2021-02-08 10:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `master_product_images`
--

CREATE TABLE `master_product_images` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) DEFAULT '0',
  `prod_image` text,
  `status` int(1) NOT NULL DEFAULT '1',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_product_inventory`
--

CREATE TABLE `master_product_inventory` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL DEFAULT '0',
  `prod_name` varchar(255) NOT NULL DEFAULT '',
  `prod_varient` varchar(255) NOT NULL DEFAULT '',
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `vendor_name` varchar(255) NOT NULL DEFAULT '',
  `qty` int(11) NOT NULL DEFAULT '0',
  `dp` double(9,2) NOT NULL DEFAULT '0.00',
  `mrp` double(9,2) NOT NULL DEFAULT '0.00',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_product_qty`
--

CREATE TABLE `master_product_qty` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL DEFAULT '0',
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `previous_qty` int(11) NOT NULL DEFAULT '0',
  `current_qty` int(11) NOT NULL DEFAULT '0',
  `added_from` varchar(20) NOT NULL DEFAULT 'transfer',
  `invoice_id` int(11) NOT NULL DEFAULT '0',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_product_type`
--

CREATE TABLE `master_product_type` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL DEFAULT '0',
  `type_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '1',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_product_type_attribute`
--

CREATE TABLE `master_product_type_attribute` (
  `id` int(11) NOT NULL,
  `product_type_id` int(11) DEFAULT NULL,
  `product_attribute_ids` text,
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_reward`
--

CREATE TABLE `master_reward` (
  `id` int(11) NOT NULL,
  `badge` varchar(100) DEFAULT NULL,
  `target` bigint(20) NOT NULL DEFAULT '0',
  `reward` varchar(255) DEFAULT NULL,
  `scheme` varchar(100) NOT NULL DEFAULT 'rewards'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nutriveda`
--

CREATE TABLE `nutriveda` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nutriveda`
--

INSERT INTO `nutriveda` (`id`, `name`, `email`, `mobile_number`, `address`, `type`, `created_at`) VALUES
(11, 'shoiurya', 'shourya.bkarogyam@gmail.com', '08318642577', 'mirzapur', 'nutriveda', '2021-02-05 07:33:10'),
(10, 'sadw', 'admin@example.com', '08318642577', 'mirzapur', 'nutriveda', '2021-02-05 07:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `offer_activtion`
--

CREATE TABLE `offer_activtion` (
  `offer_id` int(11) NOT NULL,
  `offer_name` varchar(100) DEFAULT NULL,
  `prod_id` varchar(50) DEFAULT '0',
  `qty` int(11) DEFAULT '0',
  `active_bv` int(11) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL DEFAULT '0000-00-00',
  `end_date` date NOT NULL DEFAULT '0000-00-00',
  `amount` int(11) NOT NULL DEFAULT '0',
  `active_bv_club` int(11) NOT NULL DEFAULT '0',
  `no_month_req` int(11) NOT NULL DEFAULT '0',
  `on_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `old_record`
--

CREATE TABLE `old_record` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  `uname` varchar(50) DEFAULT NULL,
  `pw` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `mob` bigint(10) NOT NULL DEFAULT '0',
  `sid` int(11) NOT NULL DEFAULT '0',
  `pos` varchar(10) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `astatus` varchar(20) DEFAULT NULL,
  `adate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jdate` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payout_time`
--

CREATE TABLE `payout_time` (
  `id` int(11) NOT NULL,
  `payout_type` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `closing_ids` text COLLATE latin1_general_ci,
  `generation_time` int(51) NOT NULL DEFAULT '0',
  `closing_date` date DEFAULT NULL,
  `for_total_id` int(11) NOT NULL DEFAULT '0',
  `total_point` int(11) NOT NULL DEFAULT '0',
  `total_business` decimal(9,2) NOT NULL DEFAULT '0.00',
  `distribution` decimal(9,2) NOT NULL DEFAULT '0.00',
  `point_value` decimal(9,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `description` tinytext,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission_roles`
--

CREATE TABLE `permission_roles` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `razorpay_transaction`
--

CREATE TABLE `razorpay_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `client_id` int(11) NOT NULL DEFAULT '0',
  `amount` varchar(255) DEFAULT NULL,
  `txn_id` varchar(255) DEFAULT NULL,
  `type` varchar(155) NOT NULL DEFAULT '',
  `address` varchar(255) DEFAULT NULL,
  `confirms_needed` int(11) NOT NULL DEFAULT '0',
  `checkout_url` text,
  `status_url` text,
  `qrcode_url` text,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activated_by` varchar(155) NOT NULL DEFAULT '',
  `report` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `display_name` varchar(30) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE `roles_users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `details` varchar(255) DEFAULT NULL,
  `route_link` varchar(255) DEFAULT NULL,
  `route_url` varchar(255) DEFAULT NULL,
  `route_icon` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `share_purchase`
--

CREATE TABLE `share_purchase` (
  `req_id` int(11) NOT NULL,
  `request_code` varchar(12) DEFAULT NULL,
  `client_id` int(11) NOT NULL DEFAULT '0',
  `share_no` int(11) NOT NULL DEFAULT '0',
  `share_value` int(11) NOT NULL DEFAULT '0',
  `pay_mode` varchar(50) DEFAULT NULL,
  `slip` text,
  `remark` varchar(200) DEFAULT NULL,
  `req_date` date NOT NULL DEFAULT '0000-00-00',
  `approval_date` date NOT NULL DEFAULT '0000-00-00',
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `on_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `stf_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` bigint(10) NOT NULL DEFAULT '0',
  `join_date` date NOT NULL DEFAULT '0000-00-00',
  `salary` decimal(9,2) NOT NULL DEFAULT '0.00',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) UNSIGNED NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `st_code` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT '00',
  `short_name` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`, `st_code`, `short_name`) VALUES
(1, 'Tamilnadu', 22, 'TN'),
(2, 'Andhra Pradesh', 01, 'AP'),
(3, 'Arunachal Pradesh', 02, 'AN'),
(4, 'Assam', 03, 'AS'),
(5, 'Bihar', 04, 'BH'),
(6, 'Tripura', 23, 'TP'),
(7, 'Chattisgarh', 28, 'CG'),
(9, 'Telangana', 30, 'TG'),
(10, 'Delhi', 26, 'DL'),
(11, 'Goa', 05, 'GO'),
(12, 'Gujrat', 06, 'GJ'),
(13, 'Haryana', 07, 'HR'),
(14, 'Himachal Pradesh', 08, 'HP'),
(15, 'Jammu & Kashmir', 09, 'JK'),
(16, 'Jharkhand', 29, 'JH'),
(17, 'Karnataka', 10, 'KT'),
(18, 'Kerala', 11, 'KL'),
(19, 'Lakshdweep', 31, 'LD'),
(20, 'Madhya Pradesh', 12, 'MP'),
(21, 'Maharashtra', 13, 'MH'),
(22, 'Manipur', 14, 'MN'),
(23, 'Meghalaya', 15, 'MG'),
(24, 'Mizoram', 16, 'MZ'),
(25, 'Nagaland', 17, 'NG'),
(26, 'Orissa', 18, 'OR'),
(27, 'Pondichery', 32, 'PC'),
(28, 'Punjab', 19, 'PJ'),
(29, 'Rajasthan', 20, 'RJ'),
(30, 'Sikkim', 21, 'SK'),
(33, 'Uttar Pradesh', 24, 'UP'),
(34, 'Uttarakhand', 27, 'UK'),
(35, 'West Bengal', 25, 'WB'),
(36, 'Andaman and Nicobar', 33, 'AD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company` varchar(255) NOT NULL DEFAULT '',
  `img_size` varchar(155) NOT NULL DEFAULT '',
  `photo` varchar(255) NOT NULL DEFAULT '',
  `target_url` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupans`
--

CREATE TABLE `tbl_coupans` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(155) NOT NULL DEFAULT '',
  `amt` varchar(155) DEFAULT NULL,
  `code` varchar(155) DEFAULT NULL,
  `shopping_limit` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `expiry_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `m_type` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `m_slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `m_url_type` enum('category','custom') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'custom',
  `m_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `m_url_target` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `m_seq_no` int(11) NOT NULL DEFAULT '0',
  `m_status` int(11) NOT NULL DEFAULT '1',
  `m_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_display_as` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer_banner`
--

CREATE TABLE `tbl_offer_banner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` int(11) NOT NULL DEFAULT '0',
  `img_size` varchar(155) NOT NULL DEFAULT '',
  `photo` varchar(255) NOT NULL DEFAULT '',
  `target_url` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_type` enum('page','category') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'page',
  `category_ids` text COLLATE utf8mb4_unicode_ci,
  `p_title` mediumtext COLLATE utf8mb4_unicode_ci,
  `p_description` longtext COLLATE utf8mb4_unicode_ci,
  `p_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `p_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `p_meta_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `p_meta_desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `p_meta_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `featured` int(11) NOT NULL DEFAULT '0',
  `view_count` int(11) NOT NULL DEFAULT '0',
  `posted_by` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `entry_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL DEFAULT '',
  `designation` varchar(155) NOT NULL DEFAULT '',
  `testimonial` text,
  `post_date` date NOT NULL DEFAULT '0000-00-00',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `group_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `user_id_from` int(11) DEFAULT '0',
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wallet_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(9,2) DEFAULT '0.00',
  `amount_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'credited',
  `message` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_mode` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Auto',
  `recharge_id` int(11) DEFAULT '0',
  `invoice_token` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(155) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `code` varchar(6) DEFAULT NULL,
  `photo` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_login_activity`
--

CREATE TABLE `users_login_activity` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL DEFAULT '0',
  `ip_address` varchar(155) NOT NULL DEFAULT '',
  `user_agent` varchar(255) NOT NULL DEFAULT '',
  `browser` varchar(255) NOT NULL DEFAULT '',
  `platform` varchar(255) NOT NULL DEFAULT '',
  `message` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vendors_profile`
--

CREATE TABLE `vendors_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `m_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_company_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_pin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_dob` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_sex` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Acc_Holder` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_bank` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_bank_branch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_ac_no` text COLLATE utf8_unicode_ci,
  `ifsc_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_type` enum('current','saving') COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominee_relation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nominee_age` int(11) NOT NULL DEFAULT '0',
  `nominee_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_pan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adhar_no` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paytm_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paytm_mobile` bigint(30) NOT NULL DEFAULT '0',
  `gpay_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gpay_mobile` bigint(10) NOT NULL DEFAULT '0',
  `join_date` date NOT NULL DEFAULT '0000-00-00',
  `m_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `pan_image` text COLLATE utf8_unicode_ci,
  `updation_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_id` int(9) UNSIGNED ZEROFILL NOT NULL,
  `opr_id` int(1) DEFAULT '0',
  `branch_id` int(9) DEFAULT NULL,
  `ses_branch_id` int(9) DEFAULT NULL,
  `reciept_id` int(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `voucher_prefix` varchar(10) DEFAULT NULL,
  `voucher_no` int(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `agent_code` varchar(30) DEFAULT NULL,
  `agent_present_rank` int(3) DEFAULT NULL,
  `sale_amt` decimal(20,2) DEFAULT NULL,
  `customer_code` varchar(50) DEFAULT NULL,
  `payable_amt` decimal(9,2) DEFAULT NULL,
  `perctg` decimal(9,2) DEFAULT NULL,
  `paid_amt` decimal(9,2) DEFAULT NULL,
  `bde_perctg` decimal(9,2) DEFAULT NULL,
  `tds_amt` decimal(9,2) DEFAULT NULL,
  `admin_amt` decimal(9,2) DEFAULT NULL,
  `voucher_date` date DEFAULT NULL,
  `cal_month` tinyint(4) DEFAULT NULL,
  `cal_yr` smallint(6) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Unpaid',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_paid`
--

CREATE TABLE `voucher_paid` (
  `receipt_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `branch_id` int(9) DEFAULT NULL,
  `ses_branch_id` int(9) DEFAULT NULL,
  `opr_id` int(11) DEFAULT NULL,
  `receipt_date` date DEFAULT NULL,
  `voucher_no` int(9) UNSIGNED ZEROFILL DEFAULT NULL,
  `voucher_m_y` varchar(30) DEFAULT NULL,
  `agent_code` varchar(30) DEFAULT NULL,
  `payment_mode` varchar(50) DEFAULT NULL,
  `vou_amt` decimal(9,2) DEFAULT NULL,
  `spot_amt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `mba_amt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `other_paid` decimal(9,2) DEFAULT '0.00',
  `adv_deduction` decimal(9,2) DEFAULT NULL,
  `total_amt` decimal(9,2) DEFAULT NULL,
  `adv_amt` decimal(9,2) DEFAULT NULL,
  `payment_amount` decimal(9,2) DEFAULT NULL,
  `tds` decimal(5,2) DEFAULT NULL,
  `tds_amt` decimal(9,2) DEFAULT NULL,
  `chq_date` date DEFAULT NULL,
  `chq_no` varchar(11) DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Uncomplete',
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_trans` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `bank_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_no` text COLLATE utf8_unicode_ci,
  `ifsc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_type` enum('current','saving') COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT '0',
  `widthr_amt` decimal(9,2) DEFAULT '0.00',
  `tds_bank` decimal(9,2) DEFAULT '0.00',
  `tdr_bank` decimal(9,2) DEFAULT '0.00',
  `w_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `w_no` bigint(11) DEFAULT '0',
  `m_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_id` int(11) DEFAULT '0',
  `epin_qty` int(11) DEFAULT '0',
  `mo_no` bigint(11) DEFAULT '0',
  `fa_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fa_id` int(11) DEFAULT '0',
  `m_city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals_types`
--

CREATE TABLE `withdrawals_types` (
  `types_id` int(11) UNSIGNED NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `amount` decimal(9,0) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawals_types`
--

INSERT INTO `withdrawals_types` (`types_id`, `type`, `amount`, `status`) VALUES
(1, 'BANK', 500, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_db`
--
ALTER TABLE `admin_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binary_income_details`
--
ALTER TABLE `binary_income_details`
  ADD PRIMARY KEY (`payout_id`);

--
-- Indexes for table `cash_entry`
--
ALTER TABLE `cash_entry`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `client_account_profile`
--
ALTER TABLE `client_account_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_member_id_unique` (`client_id`);

--
-- Indexes for table `client_achieve`
--
ALTER TABLE `client_achieve`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `client_activation_request`
--
ALTER TABLE `client_activation_request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `client_bonanza_achieve`
--
ALTER TABLE `client_bonanza_achieve`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `client_club_achieve`
--
ALTER TABLE `client_club_achieve`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `client_gen_key_code`
--
ALTER TABLE `client_gen_key_code`
  ADD PRIMARY KEY (`keyid`);

--
-- Indexes for table `client_invoices`
--
ALTER TABLE `client_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_level_commission`
--
ALTER TABLE `client_level_commission`
  ADD PRIMARY KEY (`lvl_id`);

--
-- Indexes for table `client_personal_profile`
--
ALTER TABLE `client_personal_profile`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `closing_income_record`
--
ALTER TABLE `closing_income_record`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `club_startup`
--
ALTER TABLE `club_startup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `customer_free_product_detail`
--
ALTER TABLE `customer_free_product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_product_detail`
--
ALTER TABLE `customer_product_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_product_rate_review`
--
ALTER TABLE `customer_product_rate_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epin_request`
--
ALTER TABLE `epin_request`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `franchise_htc`
--
ALTER TABLE `franchise_htc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `franchise_type`
--
ALTER TABLE `franchise_type`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `generate_coupans`
--
ALTER TABLE `generate_coupans`
  ADD PRIMARY KEY (`pin_id`),
  ADD UNIQUE KEY `epin` (`epin`);

--
-- Indexes for table `generate_pin`
--
ALTER TABLE `generate_pin`
  ADD PRIMARY KEY (`pin_id`),
  ADD UNIQUE KEY `epin` (`epin`);

--
-- Indexes for table `global_settings`
--
ALTER TABLE `global_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_cashback`
--
ALTER TABLE `income_cashback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_roi`
--
ALTER TABLE `income_roi`
  ADD PRIMARY KEY (`inc_id`);

--
-- Indexes for table `income_shopping`
--
ALTER TABLE `income_shopping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_communication`
--
ALTER TABLE `mail_communication`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `mail_conversation`
--
ALTER TABLE `mail_conversation`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `main_gallery_details`
--
ALTER TABLE `main_gallery_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `master_club`
--
ALTER TABLE `master_club`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_commission`
--
ALTER TABLE `master_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_countries`
--
ALTER TABLE `master_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_deals`
--
ALTER TABLE `master_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_epin_type`
--
ALTER TABLE `master_epin_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_franchise`
--
ALTER TABLE `master_franchise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_franchise_accounts`
--
ALTER TABLE `master_franchise_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_franchise_product_qty`
--
ALTER TABLE `master_franchise_product_qty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_franchise_product_request_qty`
--
ALTER TABLE `master_franchise_product_request_qty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_orders`
--
ALTER TABLE `master_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_orders_detail`
--
ALTER TABLE `master_orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_product`
--
ALTER TABLE `master_product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `master_product_attribute`
--
ALTER TABLE `master_product_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_product_attribute_values`
--
ALTER TABLE `master_product_attribute_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_product_attribute_value_com`
--
ALTER TABLE `master_product_attribute_value_com`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_product_category`
--
ALTER TABLE `master_product_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `master_product_images`
--
ALTER TABLE `master_product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_product_inventory`
--
ALTER TABLE `master_product_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_product_qty`
--
ALTER TABLE `master_product_qty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_product_type`
--
ALTER TABLE `master_product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_product_type_attribute`
--
ALTER TABLE `master_product_type_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_reward`
--
ALTER TABLE `master_reward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutriveda`
--
ALTER TABLE `nutriveda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_activtion`
--
ALTER TABLE `offer_activtion`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `old_record`
--
ALTER TABLE `old_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout_time`
--
ALTER TABLE `payout_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `permission_roles`
--
ALTER TABLE `permission_roles`
  ADD PRIMARY KEY (`role_id`,`permission_id`);

--
-- Indexes for table `razorpay_transaction`
--
ALTER TABLE `razorpay_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_user_roles_role_Name` (`name`);

--
-- Indexes for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share_purchase`
--
ALTER TABLE `share_purchase`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`stf_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coupans`
--
ALTER TABLE `tbl_coupans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`m_slug`(191)),
  ADD KEY `name` (`m_name`(191));

--
-- Indexes for table `tbl_offer_banner`
--
ALTER TABLE `tbl_offer_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_name` (`p_url`(191)),
  ADD KEY `type_status_date` (`p_status`,`id`),
  ADD KEY `post_author` (`posted_by`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_login_activity`
--
ALTER TABLE `users_login_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors_profile`
--
ALTER TABLE `vendors_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `voucher_paid`
--
ALTER TABLE `voucher_paid`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals_types`
--
ALTER TABLE `withdrawals_types`
  ADD PRIMARY KEY (`types_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_db`
--
ALTER TABLE `admin_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `binary_income_details`
--
ALTER TABLE `binary_income_details`
  MODIFY `payout_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_entry`
--
ALTER TABLE `cash_entry`
  MODIFY `c_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_account_profile`
--
ALTER TABLE `client_account_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `client_achieve`
--
ALTER TABLE `client_achieve`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_activation_request`
--
ALTER TABLE `client_activation_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_bonanza_achieve`
--
ALTER TABLE `client_bonanza_achieve`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_club_achieve`
--
ALTER TABLE `client_club_achieve`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_gen_key_code`
--
ALTER TABLE `client_gen_key_code`
  MODIFY `keyid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_invoices`
--
ALTER TABLE `client_invoices`
  MODIFY `id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_level_commission`
--
ALTER TABLE `client_level_commission`
  MODIFY `lvl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `closing_income_record`
--
ALTER TABLE `closing_income_record`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club_startup`
--
ALTER TABLE `club_startup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `auto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_free_product_detail`
--
ALTER TABLE `customer_free_product_detail`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_product_detail`
--
ALTER TABLE `customer_product_detail`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_product_rate_review`
--
ALTER TABLE `customer_product_rate_review`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `epin_request`
--
ALTER TABLE `epin_request`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `franchise_htc`
--
ALTER TABLE `franchise_htc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `franchise_type`
--
ALTER TABLE `franchise_type`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `generate_coupans`
--
ALTER TABLE `generate_coupans`
  MODIFY `pin_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generate_pin`
--
ALTER TABLE `generate_pin`
  MODIFY `pin_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global_settings`
--
ALTER TABLE `global_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `income_cashback`
--
ALTER TABLE `income_cashback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_roi`
--
ALTER TABLE `income_roi`
  MODIFY `inc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_shopping`
--
ALTER TABLE `income_shopping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail_communication`
--
ALTER TABLE `mail_communication`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail_conversation`
--
ALTER TABLE `mail_conversation`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_gallery_details`
--
ALTER TABLE `main_gallery_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_club`
--
ALTER TABLE `master_club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_commission`
--
ALTER TABLE `master_commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_countries`
--
ALTER TABLE `master_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_deals`
--
ALTER TABLE `master_deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_epin_type`
--
ALTER TABLE `master_epin_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_franchise`
--
ALTER TABLE `master_franchise`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_franchise_accounts`
--
ALTER TABLE `master_franchise_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_franchise_product_qty`
--
ALTER TABLE `master_franchise_product_qty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_franchise_product_request_qty`
--
ALTER TABLE `master_franchise_product_request_qty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_orders`
--
ALTER TABLE `master_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_orders_detail`
--
ALTER TABLE `master_orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_product`
--
ALTER TABLE `master_product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_product_attribute`
--
ALTER TABLE `master_product_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_product_attribute_values`
--
ALTER TABLE `master_product_attribute_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_product_attribute_value_com`
--
ALTER TABLE `master_product_attribute_value_com`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_product_category`
--
ALTER TABLE `master_product_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_product_images`
--
ALTER TABLE `master_product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_product_inventory`
--
ALTER TABLE `master_product_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_product_qty`
--
ALTER TABLE `master_product_qty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_product_type`
--
ALTER TABLE `master_product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_product_type_attribute`
--
ALTER TABLE `master_product_type_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_reward`
--
ALTER TABLE `master_reward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nutriveda`
--
ALTER TABLE `nutriveda`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `offer_activtion`
--
ALTER TABLE `offer_activtion`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `old_record`
--
ALTER TABLE `old_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payout_time`
--
ALTER TABLE `payout_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `razorpay_transaction`
--
ALTER TABLE `razorpay_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `share_purchase`
--
ALTER TABLE `share_purchase`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_coupans`
--
ALTER TABLE `tbl_coupans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_offer_banner`
--
ALTER TABLE `tbl_offer_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_login_activity`
--
ALTER TABLE `users_login_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors_profile`
--
ALTER TABLE `vendors_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `voucher_id` int(9) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voucher_paid`
--
ALTER TABLE `voucher_paid`
  MODIFY `receipt_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdrawals_types`
--
ALTER TABLE `withdrawals_types`
  MODIFY `types_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
