-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 04:40 AM
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
  `modified_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `color`, `start`, `end`, `amount`, `booking_type`, `duration_type`, `check_in_time`, `check_out_time`, `hold_for_days`, `party_name_full`, `party_contact_primary`, `party_reference_by`, `party_reference_contact`, `total_days_of_final_booking`, `sorath_contact_person`, `internal_notes`, `party_payment_data`, `party_token_data`, `date_added`, `date_modified`, `added_by`, `modified_by`) VALUES
(41, 'janoi', 'NA', '#FFD700', '2023-01-25 00:00:00', '2023-01-26 00:00:00', '0', 'on_hold', 'half_day', '0800', '1400', '55', 'jayv', '+919426554474', 'divyang', '+919426554474', '66', 'miliond', 'internal note', 'no', 'yes', '2023-01-28 00:00:00', '0000-00-00 00:00:00', 'jay', ''),
(42, 'marriage', 'NA', '#008000', '2023-01-26 00:00:00', '2023-01-27 00:00:00', '0', 'final_booking', 'full_day', '0800', '0600', '2', 'riddhi', '345345345345', 'iam', '3423234234', '44', 'mkD', 'this is internal note', 'yes', 'no', '2023-01-28 00:00:00', '0000-00-00 00:00:00', 'jay', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
