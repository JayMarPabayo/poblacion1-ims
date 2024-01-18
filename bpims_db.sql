-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 09:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotters`
--

CREATE TABLE `tbl_blotters` (
  `blotter_id` bigint(20) NOT NULL,
  `blotter_case_number` varchar(255) NOT NULL,
  `blotter_complainant` bigint(20) NOT NULL,
  `blotter_respondent` bigint(20) NOT NULL,
  `blotter_victim` bigint(20) NOT NULL,
  `blotter_chairman` varchar(255) NOT NULL,
  `blotter_date` date NOT NULL DEFAULT current_timestamp(),
  `blotter_time` time NOT NULL,
  `blotter_incident` bigint(20) NOT NULL,
  `blotter_status` varchar(40) NOT NULL DEFAULT 'Scheduled',
  `blotter_notes` varchar(255) NOT NULL,
  `blotter_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `blotter_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotter_complainants`
--

CREATE TABLE `tbl_blotter_complainants` (
  `complainants_id` bigint(20) NOT NULL,
  `complainants_blotter` bigint(20) NOT NULL,
  `complainants_resident` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotter_respondents`
--

CREATE TABLE `tbl_blotter_respondents` (
  `respondents_id` bigint(20) NOT NULL,
  `respondents_blotter` bigint(20) NOT NULL,
  `respondents_resident` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotter_victims`
--

CREATE TABLE `tbl_blotter_victims` (
  `victims_id` bigint(11) NOT NULL,
  `victims_blotter` bigint(11) NOT NULL,
  `victims_resident` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_certificates_of_residency`
--

CREATE TABLE `tbl_certificates_of_residency` (
  `cor_id` bigint(20) NOT NULL,
  `cor_resident` bigint(20) NOT NULL,
  `cor_age` int(3) NOT NULL,
  `cor_date_time` datetime NOT NULL,
  `cor_brgy_captain` varchar(100) NOT NULL,
  `cor_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `cor_created_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_certificates_of_residency`
--

INSERT INTO `tbl_certificates_of_residency` (`cor_id`, `cor_resident`, `cor_age`, `cor_date_time`, `cor_brgy_captain`, `cor_created_at`, `cor_created_by`) VALUES
(1, 1, 38, '2024-01-18 19:27:18', 'Jose Jalapan Abejo ', '2024-01-18 19:27:18', 3),
(2, 3, 41, '2024-01-18 19:28:19', 'Jose Jalapan Abejo ', '2024-01-18 19:28:19', 3),
(3, 1, 38, '2024-01-19 00:46:45', 'Jose Jalapan Abejo ', '2024-01-19 00:46:45', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_incidents`
--

CREATE TABLE `tbl_incidents` (
  `incident_id` bigint(11) NOT NULL,
  `incident_name` varchar(100) NOT NULL,
  `incident_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_incidents`
--

INSERT INTO `tbl_incidents` (`incident_id`, `incident_name`, `incident_description`) VALUES
(1, 'Theft', 'Shoplifting/Vehicle theft/Burglary'),
(2, 'Assault', 'Physical assault/Verbal assault/Aggravated assault/Sexual assault'),
(3, 'Vandalism', 'Graffiti/Property damage/Destruction of public or private property'),
(4, 'Robbery', 'Armed robbery/Unarmed robbery'),
(5, 'Burglary', 'Residential burglary/Commercial burglary'),
(6, 'Fraud', 'Identity theft/Credit card fraud/Scams'),
(7, 'Domestic Violence', 'Physical abuse/Emotional abuse/Harassment'),
(8, 'Missing Person', 'Runaway/Abduction/Disappearance'),
(9, 'Traffic Incidents', 'Accidents/Hit and run/Reckless driving'),
(10, 'Disorderly Conduct', 'Public disturbances/Disturbing the peace'),
(11, 'Homicide', 'Murder/Manslaughter'),
(12, 'Kidnapping', 'Abduction/Hostage situations'),
(13, 'Cybercrime', 'Hacking/Online scams/Cyberbullying'),
(14, 'Harassment', 'Stalking/Threats/Intimidation/Sexual harassment'),
(15, 'Drug Offenses', 'Possession/Distribution/Manufacturing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_officials`
--

CREATE TABLE `tbl_officials` (
  `official_id` bigint(20) NOT NULL,
  `official_resident` bigint(20) NOT NULL,
  `official_position` varchar(255) NOT NULL,
  `official_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `official_updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_officials`
--

INSERT INTO `tbl_officials` (`official_id`, `official_resident`, `official_position`, `official_created_at`, `official_updated_at`) VALUES
(13, 2, 'Barangay Kagawad', '2024-01-15 09:09:42', '2024-01-15 09:09:42'),
(14, 3, 'Punong Barangay', '2024-01-15 09:10:00', '2024-01-15 09:10:00'),
(15, 1, 'Barangay Kagawad', '2024-01-15 09:10:05', '2024-01-15 09:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purok`
--

CREATE TABLE `tbl_purok` (
  `purok_id` bigint(11) NOT NULL,
  `purok_name` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_purok`
--

INSERT INTO `tbl_purok` (`purok_id`, `purok_name`) VALUES
(1, 'Purok Alubijid'),
(2, 'Tuburan 1-A'),
(3, 'Tuburan 1-B'),
(4, 'Silao 1-A'),
(5, 'Silao 1-B'),
(6, 'Silao 2'),
(7, 'Seaside');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_residents`
--

CREATE TABLE `tbl_residents` (
  `resident_id` bigint(20) NOT NULL,
  `resident_purok` bigint(20) NOT NULL,
  `resident_first_name` varchar(100) NOT NULL,
  `resident_middle_name` varchar(100) NOT NULL,
  `resident_last_name` varchar(100) NOT NULL,
  `resident_suffix` varchar(10) DEFAULT NULL,
  `resident_birthdate` date NOT NULL,
  `resident_gender` varchar(12) NOT NULL,
  `resident_email` varchar(100) DEFAULT NULL,
  `resident_contact` varchar(50) DEFAULT NULL,
  `resident_civil_status` varchar(10) NOT NULL,
  `resident_voter_status` tinyint(1) NOT NULL DEFAULT 0,
  `resident_religion` varchar(20) DEFAULT NULL,
  `resident_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `resident_created_by` bigint(20) NOT NULL,
  `resident_updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_residents`
--

INSERT INTO `tbl_residents` (`resident_id`, `resident_purok`, `resident_first_name`, `resident_middle_name`, `resident_last_name`, `resident_suffix`, `resident_birthdate`, `resident_gender`, `resident_email`, `resident_contact`, `resident_civil_status`, `resident_voter_status`, `resident_religion`, `resident_created_at`, `resident_created_by`, `resident_updated_at`) VALUES
(1, 1, 'Maria', 'Del', 'Santos', '', '1985-06-06', 'Male', '', '', 'Single', 1, 'Roman Catholic', '0000-00-00 00:00:00', 3, '2024-01-15 06:57:19'),
(2, 3, 'Juan', 'Dela', 'Cruz', 'Sr.', '1992-10-01', 'Male', 'juandelacruz@gmail.com', '', 'Single', 1, 'Islam', '2024-01-10 18:10:08', 3, '2024-01-15 04:27:46'),
(3, 1, 'Jose', 'Jalapan', 'Abejo', '', '1983-01-01', 'Male', '', '', 'Married', 1, 'Roman Catholic', '2024-01-10 18:54:54', 3, '2024-01-15 04:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` bigint(20) NOT NULL,
  `user_first_name` varchar(100) NOT NULL,
  `user_middle_name` varchar(100) DEFAULT NULL,
  `user_last_name` varchar(100) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(20) NOT NULL DEFAULT 'Employee',
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_last_logon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_first_name`, `user_middle_name`, `user_last_name`, `user_email`, `user_username`, `user_password`, `user_role`, `user_created_at`, `user_updated_at`, `user_last_logon`) VALUES
(3, 'Maria', 'Dela', 'Santos', 'mariasantos@gmail.com', 'maria', '$2y$12$kZsiT1nmhhLiqDGtesP2fOIAE0zZUlqksTI01I4.KIfQBDdrjv4xi', 'Administrator', '2024-01-10 12:43:21', '2024-01-15 12:19:18', '2024-01-19 03:55:29'),
(4, 'Juan', 'Dela', 'Cruz', 'juandelacruz@gmail.com', 'juan', '$2y$12$tBeQB0ZMYk2I21SGR5nP7OyGHOW.Fs7aHKEwQuQc9IIjHeN4i.8Vq', 'Inactive', '2024-01-15 09:36:34', '2024-01-15 09:36:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blotters`
--
ALTER TABLE `tbl_blotters`
  ADD PRIMARY KEY (`blotter_id`),
  ADD KEY `blotter_complainant` (`blotter_complainant`),
  ADD KEY `blotter_respondent` (`blotter_respondent`),
  ADD KEY `blotter_victim` (`blotter_victim`),
  ADD KEY `blotter_incident` (`blotter_incident`);

--
-- Indexes for table `tbl_blotter_complainants`
--
ALTER TABLE `tbl_blotter_complainants`
  ADD PRIMARY KEY (`complainants_id`),
  ADD KEY `complainants_blotter` (`complainants_blotter`),
  ADD KEY `complainants_resident` (`complainants_resident`);

--
-- Indexes for table `tbl_blotter_respondents`
--
ALTER TABLE `tbl_blotter_respondents`
  ADD PRIMARY KEY (`respondents_id`),
  ADD KEY `respondents_blotter` (`respondents_blotter`),
  ADD KEY `respondents_resident` (`respondents_resident`);

--
-- Indexes for table `tbl_blotter_victims`
--
ALTER TABLE `tbl_blotter_victims`
  ADD PRIMARY KEY (`victims_id`),
  ADD KEY `victims_blotter` (`victims_blotter`),
  ADD KEY `victims_resident` (`victims_resident`);

--
-- Indexes for table `tbl_certificates_of_residency`
--
ALTER TABLE `tbl_certificates_of_residency`
  ADD PRIMARY KEY (`cor_id`),
  ADD KEY `cor_resident` (`cor_resident`),
  ADD KEY `cor_created_by` (`cor_created_by`);

--
-- Indexes for table `tbl_incidents`
--
ALTER TABLE `tbl_incidents`
  ADD PRIMARY KEY (`incident_id`);

--
-- Indexes for table `tbl_officials`
--
ALTER TABLE `tbl_officials`
  ADD PRIMARY KEY (`official_id`),
  ADD KEY `officer_resident` (`official_resident`);

--
-- Indexes for table `tbl_purok`
--
ALTER TABLE `tbl_purok`
  ADD PRIMARY KEY (`purok_id`);

--
-- Indexes for table `tbl_residents`
--
ALTER TABLE `tbl_residents`
  ADD PRIMARY KEY (`resident_id`),
  ADD KEY `resident_purok` (`resident_purok`),
  ADD KEY `resident_created_by` (`resident_created_by`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blotters`
--
ALTER TABLE `tbl_blotters`
  MODIFY `blotter_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blotter_complainants`
--
ALTER TABLE `tbl_blotter_complainants`
  MODIFY `complainants_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blotter_respondents`
--
ALTER TABLE `tbl_blotter_respondents`
  MODIFY `respondents_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blotter_victims`
--
ALTER TABLE `tbl_blotter_victims`
  MODIFY `victims_id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_certificates_of_residency`
--
ALTER TABLE `tbl_certificates_of_residency`
  MODIFY `cor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_incidents`
--
ALTER TABLE `tbl_incidents`
  MODIFY `incident_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_officials`
--
ALTER TABLE `tbl_officials`
  MODIFY `official_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_purok`
--
ALTER TABLE `tbl_purok`
  MODIFY `purok_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_residents`
--
ALTER TABLE `tbl_residents`
  MODIFY `resident_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_blotters`
--
ALTER TABLE `tbl_blotters`
  ADD CONSTRAINT `tbl_blotters_ibfk_1` FOREIGN KEY (`blotter_complainant`) REFERENCES `tbl_blotter_complainants` (`complainants_id`),
  ADD CONSTRAINT `tbl_blotters_ibfk_2` FOREIGN KEY (`blotter_respondent`) REFERENCES `tbl_blotter_respondents` (`respondents_id`),
  ADD CONSTRAINT `tbl_blotters_ibfk_3` FOREIGN KEY (`blotter_victim`) REFERENCES `tbl_blotter_victims` (`victims_id`),
  ADD CONSTRAINT `tbl_blotters_ibfk_4` FOREIGN KEY (`blotter_incident`) REFERENCES `tbl_incidents` (`incident_id`);

--
-- Constraints for table `tbl_blotter_complainants`
--
ALTER TABLE `tbl_blotter_complainants`
  ADD CONSTRAINT `tbl_blotter_complainants_ibfk_1` FOREIGN KEY (`complainants_blotter`) REFERENCES `tbl_blotters` (`blotter_id`),
  ADD CONSTRAINT `tbl_blotter_complainants_ibfk_2` FOREIGN KEY (`complainants_resident`) REFERENCES `tbl_residents` (`resident_id`);

--
-- Constraints for table `tbl_blotter_respondents`
--
ALTER TABLE `tbl_blotter_respondents`
  ADD CONSTRAINT `tbl_blotter_respondents_ibfk_1` FOREIGN KEY (`respondents_blotter`) REFERENCES `tbl_blotters` (`blotter_id`),
  ADD CONSTRAINT `tbl_blotter_respondents_ibfk_2` FOREIGN KEY (`respondents_resident`) REFERENCES `tbl_residents` (`resident_id`);

--
-- Constraints for table `tbl_blotter_victims`
--
ALTER TABLE `tbl_blotter_victims`
  ADD CONSTRAINT `tbl_blotter_victims_ibfk_1` FOREIGN KEY (`victims_blotter`) REFERENCES `tbl_blotters` (`blotter_id`),
  ADD CONSTRAINT `tbl_blotter_victims_ibfk_2` FOREIGN KEY (`victims_resident`) REFERENCES `tbl_residents` (`resident_id`);

--
-- Constraints for table `tbl_certificates_of_residency`
--
ALTER TABLE `tbl_certificates_of_residency`
  ADD CONSTRAINT `tbl_certificates_of_residency_ibfk_1` FOREIGN KEY (`cor_resident`) REFERENCES `tbl_residents` (`resident_id`),
  ADD CONSTRAINT `tbl_certificates_of_residency_ibfk_2` FOREIGN KEY (`cor_created_by`) REFERENCES `tbl_residents` (`resident_id`);

--
-- Constraints for table `tbl_officials`
--
ALTER TABLE `tbl_officials`
  ADD CONSTRAINT `tbl_officials_ibfk_1` FOREIGN KEY (`official_resident`) REFERENCES `tbl_residents` (`resident_id`);

--
-- Constraints for table `tbl_residents`
--
ALTER TABLE `tbl_residents`
  ADD CONSTRAINT `tbl_residents_ibfk_1` FOREIGN KEY (`resident_purok`) REFERENCES `tbl_purok` (`purok_id`),
  ADD CONSTRAINT `tbl_residents_ibfk_2` FOREIGN KEY (`resident_created_by`) REFERENCES `tbl_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
