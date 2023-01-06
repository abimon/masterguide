-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2023 at 01:07 PM
-- Server version: 10.5.18-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ausaaken_arkcherubs`
--

-- --------------------------------------------------------

--
-- Table structure for table `repositories`
--

CREATE TABLE `repositories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `category` varchar(11) NOT NULL,
  `isRes` tinyint(1) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `repositories`
--

INSERT INTO `repositories` (`id`, `user_id`, `file_name`, `category`, `isRes`, `path`, `created_at`, `updated_at`) VALUES
(5, 1, 'Application Form', 'others', 1, 'Application Form1664719044.pdf', '2022-10-02 10:57:24', '2022-10-02 10:57:24'),
(6, 1, 'Resumption Letter', 'others', 1, 'Resumption Letter1664719642.pdf', '2022-10-02 11:07:22', '2022-10-02 11:07:22'),
(7, 1, 'Pathfinder Assessment Sheet', 'pf', 1, 'Pathfinder Assessment Sheet1664720218.pdf', '2022-10-02 11:16:59', '2022-10-02 11:16:59'),
(8, 1, 'Drills and Marching', 'pf', 1, 'Drills and Marching1664720384.pdf', '2022-10-02 11:19:44', '2022-10-02 11:19:44'),
(9, 1, 'Master Guide Curriculum', 'mg', 1, 'Master Guide Curriculum1664720533.pdf', '2022-10-02 11:22:14', '2022-10-02 11:22:14'),
(10, 1, 'Adventurer Assessment Sheet', 'adv', 1, 'Adventurer Assessment Sheet1664720646.pdf', '2022-10-02 11:24:06', '2022-10-02 11:24:06'),
(11, 1, 'Temperament Assessment sheet', 'others', 1, 'Temperament Assessment sheet1664722660.pdf', '2022-10-02 11:57:40', '2022-10-02 11:57:40'),
(12, 34, 'Pathfinder Club Basics', 'pf', 0, 'Pathfinder Club Basics1664731638.pdf', '2022-10-02 14:27:18', '2022-10-02 14:27:18'),
(13, 1, 'Adventurers Director\'s Manual', 'adv', 1, 'Adventurers Director\'s Manual1667322281.pdf', '2022-11-01 14:04:47', '2022-11-01 14:04:47'),
(14, 1, 'Adventurer pledge law song', 'adv', 1, 'Adventurer pledge law song1667322539.pdf', '2022-11-01 14:08:59', '2022-11-01 14:08:59'),
(15, 1, 'Adventurer award book', 'adv', 1, 'Adventurer award book1667323876.pdf', '2022-11-01 14:31:21', '2022-11-01 14:31:21'),
(16, 1, 'Busy Bee Awards', 'adv', 1, 'Busy Bee Awards1667459932.pdf', '2022-11-03 04:18:53', '2022-11-03 04:18:53'),
(17, 1, 'Busy Bee Record Book', 'adv', 1, 'Busy Bee Record Book1667459990.pdf', '2022-11-03 04:19:55', '2022-11-03 04:19:55'),
(18, 1, 'Early Bird Awards', 'adv', 1, 'Early Bird Awards1667460043.pdf', '2022-11-03 04:20:43', '2022-11-03 04:20:43'),
(19, 1, 'Little Lambs Awards', 'adv', 1, 'Little Lamb Awards1667460069.pdf', '2022-11-03 04:21:10', '2022-11-03 04:21:10'),
(21, 1, 'Early Bird Record Book', 'adv', 1, 'Early Bird Record Book1667461541.pdf', '2022-11-03 04:45:42', '2022-11-03 04:45:42'),
(23, 1, 'Early Bird Checklist', 'adv', 1, 'Early Bird Checklist1667461628.pdf', '2022-11-03 04:47:08', '2022-11-03 04:47:08'),
(24, 1, 'Little Lamb Record Book', 'adv', 1, 'Little Lamb Record Book1667461672.pdf', '2022-11-03 04:47:56', '2022-11-03 04:47:56'),
(25, 1, 'Little Lamb Checklist', 'adv', 1, 'Little Lamb Checklist1667462037.pdf', '2022-11-03 04:53:57', '2022-11-03 04:53:57'),
(26, 1, 'Sunbeam Checklist', 'adv', 1, 'Sunbeam Checklist1667464051.pdf', '2022-11-03 05:27:31', '2022-11-03 05:27:31'),
(27, 1, 'Sunbeam Record Book', 'adv', 1, 'Sunbeam Record Book1667465034.pdf', '2022-11-03 05:43:55', '2022-11-03 05:43:55'),
(28, 1, 'Sunbeam Awards', 'adv', 1, 'Sunbeam Awards1667465061.pdf', '2022-11-03 05:44:21', '2022-11-03 05:44:21'),
(29, 1, 'Builder Checklist', 'adv', 1, 'Builder Checklist1667465471.pdf', '2022-11-03 05:51:11', '2022-11-03 05:51:11'),
(30, 1, 'Builder Awards', 'adv', 1, 'Builder Awards1667465493.pdf', '2022-11-03 05:51:33', '2022-11-03 05:51:33'),
(31, 1, 'Builder Record Book', 'adv', 1, 'Builder Record Book1667465521.pdf', '2022-11-03 05:52:02', '2022-11-03 05:52:02'),
(32, 1, 'Helping Hand Awards', '', 1, 'Helping Hand Awards1667465811.pdf', '2022-11-03 05:56:51', '2022-11-03 05:56:51'),
(33, 1, 'Helping Hand Checklist', '', 1, 'Helping Hand Checklist1667466102.pdf', '2022-11-03 06:01:42', '2022-11-03 06:01:42'),
(34, 1, 'Helping Hand Record Book', '', 1, 'Helping Hand Record Book1667466136.pdf', '2022-11-03 06:02:17', '2022-11-03 06:02:17'),
(35, 1, 'Bible Truth Manual', 'mg', 1, 'Bible Truth Manual1667467911.pdf', '2022-11-03 06:31:51', '2022-11-03 06:31:51'),
(36, 1, 'Church Heritage Manual', 'mg', 1, 'Church Heritage Manual1667467946.pdf', '2022-11-03 06:32:26', '2022-11-03 06:32:26'),
(37, 17, 'MASTERGUIDE NOTES', 'mg', 0, 'MASTERGUIDE NOTES1668321820.pdf', '2022-11-13 03:43:41', '2022-11-13 03:43:41'),
(38, 34, 'Curriculum', 'mg', 0, 'Curriculum1671781480.pdf', '2022-12-23 04:44:41', '2022-12-23 04:44:41'),
(39, 34, 'Bible truths', 'mg', 0, 'Bible truths1671781517.pdf', '2022-12-23 04:45:17', '2022-12-23 04:45:17'),
(40, 34, 'Temparament', 'mg', 0, 'Temparament1671781574.pdf', '2022-12-23 04:46:14', '2022-12-23 04:46:14'),
(41, 34, 'Visual media critique', 'mg', 0, 'Visual media critique1671781649.pdf', '2022-12-23 04:47:30', '2022-12-23 04:47:30'),
(42, 34, 'Redumption letter', 'mg', 0, 'Redumption letter1671781684.pdf', '2022-12-23 04:48:04', '2022-12-23 04:48:04'),
(43, 34, 'Heritage', 'mg', 0, 'Heritage1671781744.pdf', '2022-12-23 04:49:04', '2022-12-23 04:49:04'),
(44, 34, 'Church Heritage Manual', 'mg', 0, 'Church Heritage Manual1671782356.pdf', '2022-12-23 04:59:16', '2022-12-23 04:59:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `repositories`
--
ALTER TABLE `repositories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `repositories`
--
ALTER TABLE `repositories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
