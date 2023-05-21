-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 09:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sorath_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `booking_type` varchar(100) DEFAULT NULL,
  `duration_type` varchar(100) DEFAULT NULL,
  `check_in_time` varchar(100) DEFAULT NULL,
  `check_out_time` varchar(100) DEFAULT NULL,
  `hold_for_days` varchar(10) DEFAULT NULL,
  `party_name_full` varchar(155) DEFAULT NULL,
  `party_contact_primary` varchar(100) DEFAULT NULL,
  `party_reference_by` varchar(155) DEFAULT NULL,
  `party_reference_contact` varchar(100) DEFAULT NULL,
  `total_days_of_final_booking` varchar(20) DEFAULT NULL,
  `sorath_contact_person` varchar(200) DEFAULT NULL,
  `internal_notes` varchar(1000) DEFAULT NULL,
  `party_payment_data` varchar(100) DEFAULT NULL,
  `party_token_data` varchar(100) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime DEFAULT NULL,
  `added_by` varchar(100) NOT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `color`, `start`, `end`, `amount`, `booking_type`, `duration_type`, `check_in_time`, `check_out_time`, `hold_for_days`, `party_name_full`, `party_contact_primary`, `party_reference_by`, `party_reference_contact`, `total_days_of_final_booking`, `sorath_contact_person`, `internal_notes`, `party_payment_data`, `party_token_data`, `date_added`, `date_modified`, `added_by`, `modified_by`, `is_deleted`) VALUES
(42, 'marriage', 'NA', '#008000', '2023-01-31 00:00:00', '2023-02-01 00:00:00', '0', 'final_booking', 'full_day', '0800', '0600', '2', 'riddhi', '345345345345', 'iam', '3423234234', '44', 'mkD', 'this is internal note', 'yes', 'yes', '2023-01-28 00:00:00', '2023-01-28 23:03:22', 'jay', 'tj', 0),
(43, 'anniversary ', 'NA', '#40E0D0', '2023-01-28 00:00:00', '2023-01-29 00:00:00', '0', 'final_booking', 'full_day', '0800', '0600', '5.5', 'First Party4', '6546456456', 'Jay', '1234234234', '444', 'gddfdf', 'Some internal Note 2', 'no', 'no', '2023-01-28 00:00:00', '0000-00-00 00:00:00', 'jay', '', 0),
(44, 'meeting', 'NA', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 'other', 'half_day', '0800', '0600', '22', 'Iris Valdez', 'Error et quaerat aut', 'Tempora laudantium', 'Sit at tenetur repu', '14', 'Consequat Distincti', 'Ad aut laudantium o', 'no', 'no', '2023-01-28 00:00:00', '0000-00-00 00:00:00', 'jay', '', 0),
(45, 'birthday', 'NA', '#FF0000', '2023-01-25 00:00:00', '2023-01-27 00:00:00', '0', 'final_booking', 'full_day', '0800', '0600', '1', 'j party', '345345345', 'd party', '45645645645645', '2', 'KDF', '45645645 internal', 'no', 'yes', '2023-01-28 00:00:00', '2023-01-30 00:59:39', 'jay', 'j2', 0),
(46, 'meeting', 'NA', '#0071c5', '2023-01-26 00:00:00', '2023-01-27 00:00:00', '0', 'on_hold', 'half_day', '0800', '0600', '5', '6', '7', '8', '9', '4', 'fghfgh', 'fgrtyrt', 'yes', 'no', '0000-00-00 00:00:00', '2023-01-28 01:05:03', 'jay', 'tj', 1),
(47, 'birthday', 'NA', '#FF8C00', '2023-01-24 00:00:00', '2023-01-25 00:00:00', '0', 'other', 'full_day', '1600', '1400', '4', 'fghj', 'dfgh', 'dfgh', 'dfg', '4345', 'dfghdfghdfg', 'dfghdfgh', 'no', 'no', '0000-00-00 00:00:00', '2023-01-30 00:58:11', 'jay', 'j2', 0),
(48, 'janoi', 'NA', '#000', '2023-01-31 00:00:00', '2023-02-01 00:00:00', '0', 'final_booking', 'half_day', '1600', '1400', '1', 'Caesar Everett', 'Laborum sed sint cor', 'Est ipsum nisi dolor', 'Sunt voluptatem Mi', '6', 'In culpa lorem quod', 'Amet a ratione saep', 'no', 'yes', '0000-00-00 00:00:00', '2023-01-28 22:59:21', 'jay', 'tj', 0),
(49, 'meeting', 'NA', '#FF8C00', '2023-02-03 00:00:00', '2023-02-04 00:00:00', '0', 'final_booking', 'full_day', '0800', '0600', '7', 'Hermione Nunez', 'Velit animi adipisi', 'Voluptas ullamco non', 'Soluta incidunt do', '13', 'Iste voluptas libero', 'Ipsam ad aspernatur', 'no', 'no', '0000-00-00 00:00:00', '2023-01-28 23:05:11', 'jay', 'tj', 1),
(50, 'other', 'NA', '#40E0D0', '2023-01-31 00:00:00', '2023-02-01 00:00:00', '0', 'final_booking', 'full_day', '1600', '0600', '15', 'Cheyenne Turner', 'Aute pariatur Facer', 'Ut sit error molest', 'At pariatur Soluta', '8', 'Quas totam non conse', 'Ipsa eius consequat', 'yes', 'yes', '2023-01-28 00:59:40', NULL, 'jay', NULL, 0),
(51, 'meeting', 'NA', '#008000', '2023-01-11 00:00:00', '2023-01-12 00:00:00', '0', 'on_hold', 'full_day', '1600', '1400', '4', 'paltryyyyyy', '234234', 'jv', '234234', '3', 'DDD', 'dsfgdfg', 'no', 'yes', '2023-01-29 01:08:20', '2023-01-29 01:09:28', 'j2', 'jay', 1),
(52, 'meeting', 'NA', '#FF0000', '2023-01-11 00:00:00', '2023-01-12 00:00:00', '0', 'final_booking', 'full_day', '1600', '0600', '5', 'Jv phone', '736352663', 'Dv', '7362562633', '4', 'Hdychdndx', 'Bdyjekfc', 'yes', 'no', '2023-01-29 23:33:24', NULL, 'jay', NULL, 0),
(53, 'janoi', 'NA', '#FFD700', '2023-02-02 00:00:00', '2023-02-03 00:00:00', '0', 'on_hold', 'half_day', '0800', '0600', '3', 'new party 5', '234234234', 'GR', '345345345', '54', 'MDK', '345345', 'no', 'yes', '2023-01-30 01:14:25', '2023-01-28 00:00:00', 'j2', 'j2', 1),
(54, 'engagement', 'NA', '#FF8C00', '2023-01-13 00:00:00', '2023-01-14 00:00:00', '0', 'other', 'full_day', '0800', '1400', '54', 'First Party 666', '09426554474', 'd party', '09426554474', '6', 'Jayvardhan Trivedi', 'fgfgg', 'yes', 'no', '2023-01-30 01:16:28', '2023-01-30 01:17:03', 'j2', 'j2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `can_edit` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `can_add` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `date_added`, `is_admin`, `can_edit`, `is_deleted`, `can_add`) VALUES
(15, 'jay', 'jay@jay.com', '*', '+1 (804) 726-3572', NULL, 0, 0, 0, 0),
(16, 'j2', 'j2@j2.com', '*', '+1 (681) 264-1854', '2023-01-29 22:08:30', 1, 0, 0, 0),
(34, 'notedit', 'notedit@notedit.com', '*', '345345345', '2023-01-29 04:28:11', 0, 0, 0, 1),
(39, 'can_edit', 'canedit@canedit.com', '*', '234234234', '2023-01-29 06:17:54', 0, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
