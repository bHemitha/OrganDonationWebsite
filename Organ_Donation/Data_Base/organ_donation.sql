-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 08:37 AM
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
-- Database: `organ_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `feedback_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `health_form`
--

CREATE TABLE `health_form` (
  `full_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `medical_conditions` varchar(255) DEFAULT NULL,
  `surgery` varchar(255) DEFAULT NULL,
  `family_history` varchar(255) DEFAULT NULL,
  `smoking` varchar(10) NOT NULL,
  `alcohol` varchar(10) NOT NULL,
  `allergies` varchar(255) DEFAULT NULL,
  `medications` varchar(255) DEFAULT NULL,
  `health_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mp1`
--

CREATE TABLE `mp1` (
  `mp1_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `mp1_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mp2`
--

CREATE TABLE `mp2` (
  `mp2_id` int(11) UNSIGNED NOT NULL,
  `temperature` float(4,2) DEFAULT NULL,
  `bp` varchar(20) DEFAULT NULL,
  `pulse` int(3) DEFAULT NULL,
  `respiratory` int(3) DEFAULT NULL,
  `height` float(4,2) DEFAULT NULL,
  `weight` float(4,2) DEFAULT NULL,
  `bloodType` varchar(5) DEFAULT NULL,
  `allergies` text DEFAULT NULL,
  `medications` text DEFAULT NULL,
  `medicalCondition` text DEFAULT NULL,
  `hospitalization` text DEFAULT NULL,
  `asthma` tinyint(1) DEFAULT NULL,
  `cardiovascular` tinyint(1) DEFAULT NULL,
  `diabetes` tinyint(1) DEFAULT NULL,
  `hypertension` tinyint(1) DEFAULT NULL,
  `tuberculosis` tinyint(1) DEFAULT NULL,
  `other` tinyint(1) DEFAULT NULL,
  `mp2_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mp3`
--

CREATE TABLE `mp3` (
  `registrationDate` date DEFAULT NULL,
  `organsDonated` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `confirmation` tinyint(1) DEFAULT NULL,
  `donationPermission` tinyint(1) DEFAULT NULL,
  `familyAcknowledgment` tinyint(1) DEFAULT NULL,
  `cardConfirmation` tinyint(1) DEFAULT NULL,
  `registryPermission` tinyint(1) DEFAULT NULL,
  `mp3_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signatures2`
--

CREATE TABLE `signatures2` (
  `id` int(11) NOT NULL,
  `donorSignature` varchar(255) DEFAULT NULL,
  `donorDate` date DEFAULT NULL,
  `witnessSignature` varchar(255) DEFAULT NULL,
  `witnessDate` date DEFAULT NULL,
  `doctorSignature` varchar(255) DEFAULT NULL,
  `doctorDate` date DEFAULT NULL,
  `mp4_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `fname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mp1`
--
ALTER TABLE `mp1`
  ADD PRIMARY KEY (`mp1_id`);

--
-- Indexes for table `mp2`
--
ALTER TABLE `mp2`
  ADD PRIMARY KEY (`mp2_id`);

--
-- Indexes for table `mp3`
--
ALTER TABLE `mp3`
  ADD PRIMARY KEY (`mp3_user_id`);

--
-- Indexes for table `signatures2`
--
ALTER TABLE `signatures2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mp1`
--
ALTER TABLE `mp1`
  MODIFY `mp1_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mp2`
--
ALTER TABLE `mp2`
  MODIFY `mp2_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mp3`
--
ALTER TABLE `mp3`
  MODIFY `mp3_user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signatures2`
--
ALTER TABLE `signatures2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;