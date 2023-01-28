-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 07:08 PM
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
(42, 'marriage', 'NA', '#008000', '2023-01-26 00:00:00', '2023-01-27 00:00:00', '0', 'final_booking', 'full_day', '0800', '0600', '2', 'riddhi', '345345345345', 'iam', '3423234234', '44', 'mkD', 'this is internal note', 'yes', 'yes', '2023-01-28 00:00:00', '2023-01-28 23:03:22', 'jay', 'tj'),
(43, 'anniversary ', 'NA', '#40E0D0', '2023-01-28 00:00:00', '2023-01-29 00:00:00', '0', 'final_booking', 'full_day', '0800', '0600', '5.5', 'First Party4', '6546456456', 'Jay', '1234234234', '444', 'gddfdf', 'Some internal Note 2', 'no', 'no', '2023-01-28 00:00:00', '0000-00-00 00:00:00', 'jay', ''),
(44, 'meeting', 'NA', '#0071c5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 'other', 'half_day', '0800', '0600', '22', 'Iris Valdez', 'Error et quaerat aut', 'Tempora laudantium', 'Sit at tenetur repu', '14', 'Consequat Distincti', 'Ad aut laudantium o', 'no', 'no', '2023-01-28 00:00:00', '0000-00-00 00:00:00', 'jay', ''),
(45, 'birthday', 'NA', '#008000', '2023-01-25 00:00:00', '2023-01-26 00:00:00', '0', 'final_booking', 'half_day', '1600', '1400', '1', 'j party', '345345345', 'd party', '45645645645645', '2', 'KDF', '45645645 internal', 'no', 'no', '2023-01-28 00:00:00', NULL, 'jay', NULL),
(46, 'meeting', 'NA', '#0071c5', '2023-01-27 00:00:00', '2023-01-28 00:00:00', '0', 'on_hold', 'half_day', '0800', '0600', '5', '6', '7', '8', '9', '4', 'fghfgh', 'fgrtyrt', 'yes', 'no', '0000-00-00 00:00:00', '2023-01-28 01:05:03', 'jay', 'tj'),
(47, 'birthday', 'NA', '#FF8C00', '2023-01-24 00:00:00', '2023-01-25 00:00:00', '0', 'other', 'full_day', '1600', '1400', '4', 'fghj', 'dfgh', 'dfgh', 'dfg', '4345', 'dfghdfghdfg', 'dfghdfgh', 'no', 'no', '0000-00-00 00:00:00', '2023-01-28 01:04:38', 'jay', 'tj'),
(48, 'janoi', 'NA', '#000', '2023-01-31 00:00:00', '2023-02-01 00:00:00', '0', 'final_booking', 'half_day', '1600', '1400', '1', 'Caesar Everett', 'Laborum sed sint cor', 'Est ipsum nisi dolor', 'Sunt voluptatem Mi', '6', 'In culpa lorem quod', 'Amet a ratione saep', 'no', 'yes', '0000-00-00 00:00:00', '2023-01-28 22:59:21', 'jay', 'tj'),
(49, 'meeting', 'NA', '#FF8C00', '2023-01-31 00:00:00', '2023-02-01 00:00:00', '0', 'final_booking', 'full_day', '0800', '0600', '7', 'Hermione Nunez', 'Velit animi adipisi', 'Voluptas ullamco non', 'Soluta incidunt do', '13', 'Iste voluptas libero', 'Ipsam ad aspernatur', 'no', 'no', '0000-00-00 00:00:00', '2023-01-28 23:05:11', 'jay', 'tj'),
(50, 'other', 'NA', '#40E0D0', '2023-01-31 00:00:00', '2023-02-01 00:00:00', '0', 'final_booking', 'full_day', '1600', '0600', '15', 'Cheyenne Turner', 'Aute pariatur Facer', 'Ut sit error molest', 'At pariatur Soluta', '8', 'Quas totam non conse', 'Ipsa eius consequat', 'yes', 'yes', '2023-01-28 00:59:40', NULL, 'jay', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`) VALUES
(15, 'jay', 'jay@jay.com', '*B4F905776A4FA15AD76BC3223AAA21020C2950DC', '+1 (804) 726-3572'),
(16, 'j2', 'j2@j2.com', '*8B4ECB6865732AD1A7ACFD8B77C0601C4579865B', '+1 (681) 264-1854');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
