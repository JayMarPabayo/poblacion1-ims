-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 10:40 PM
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
CREATE DATABASE IF NOT EXISTS `bpims_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bpims_db`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotters`
--

CREATE TABLE IF NOT EXISTS `tbl_blotters` (
  `blotter_id` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `blotter_updated_at` datetime NOT NULL,
  PRIMARY KEY (`blotter_id`),
  KEY `blotter_complainant` (`blotter_complainant`),
  KEY `blotter_respondent` (`blotter_respondent`),
  KEY `blotter_victim` (`blotter_victim`),
  KEY `blotter_incident` (`blotter_incident`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotter_complainants`
--

CREATE TABLE IF NOT EXISTS `tbl_blotter_complainants` (
  `complainants_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `complainants_blotter` bigint(20) NOT NULL,
  `complainants_resident` bigint(20) NOT NULL,
  PRIMARY KEY (`complainants_id`),
  KEY `complainants_blotter` (`complainants_blotter`),
  KEY `complainants_resident` (`complainants_resident`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotter_respondents`
--

CREATE TABLE IF NOT EXISTS `tbl_blotter_respondents` (
  `respondents_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `respondents_blotter` bigint(20) NOT NULL,
  `respondents_resident` bigint(20) NOT NULL,
  PRIMARY KEY (`respondents_id`),
  KEY `respondents_blotter` (`respondents_blotter`),
  KEY `respondents_resident` (`respondents_resident`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotter_victims`
--

CREATE TABLE IF NOT EXISTS `tbl_blotter_victims` (
  `victims_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `victims_blotter` bigint(11) NOT NULL,
  `victims_resident` bigint(11) NOT NULL,
  PRIMARY KEY (`victims_id`),
  KEY `victims_blotter` (`victims_blotter`),
  KEY `victims_resident` (`victims_resident`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_certificates_of_indigency`
--

CREATE TABLE IF NOT EXISTS `tbl_certificates_of_indigency` (
  `coi_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `coi_applicant` bigint(20) NOT NULL,
  `coi_purpose` varchar(255) NOT NULL,
  `coi_date_time` datetime NOT NULL,
  `coi_brgy_captain` varchar(100) NOT NULL,
  `coi_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `coi_created_by` bigint(20) NOT NULL,
  PRIMARY KEY (`coi_id`),
  KEY `coi_applicant` (`coi_applicant`),
  KEY `coi_created_by` (`coi_created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_certificates_of_residency`
--

CREATE TABLE IF NOT EXISTS `tbl_certificates_of_residency` (
  `cor_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cor_resident` bigint(20) NOT NULL,
  `cor_age` int(3) NOT NULL,
  `cor_date_time` datetime NOT NULL,
  `cor_brgy_captain` varchar(100) NOT NULL,
  `cor_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `cor_created_by` bigint(20) NOT NULL,
  PRIMARY KEY (`cor_id`),
  KEY `cor_resident` (`cor_resident`),
  KEY `cor_created_by` (`cor_created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_incidents`
--

CREATE TABLE IF NOT EXISTS `tbl_incidents` (
  `incident_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `incident_name` varchar(100) NOT NULL,
  `incident_description` varchar(255) NOT NULL,
  PRIMARY KEY (`incident_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE IF NOT EXISTS `tbl_officials` (
  `official_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `official_resident` bigint(20) NOT NULL,
  `official_position` varchar(255) NOT NULL,
  `official_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `official_updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`official_id`),
  KEY `officer_resident` (`official_resident`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_officials`
--

INSERT INTO `tbl_officials` (`official_id`, `official_resident`, `official_position`, `official_created_at`, `official_updated_at`) VALUES
(13, 2, 'Barangay Kagawad', '2024-01-15 09:09:42', '2024-01-15 09:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purok`
--

CREATE TABLE IF NOT EXISTS `tbl_purok` (
  `purok_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `purok_name` varchar(24) NOT NULL,
  PRIMARY KEY (`purok_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE IF NOT EXISTS `tbl_residents` (
  `resident_id` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `resident_updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`resident_id`),
  KEY `resident_purok` (`resident_purok`),
  KEY `resident_created_by` (`resident_created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_first_name` varchar(100) NOT NULL,
  `user_middle_name` varchar(100) DEFAULT NULL,
  `user_last_name` varchar(100) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(20) NOT NULL DEFAULT 'Employee',
  `user_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `user_last_logon` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_first_name`, `user_middle_name`, `user_last_name`, `user_email`, `user_username`, `user_password`, `user_role`, `user_created_at`, `user_updated_at`, `user_last_logon`) VALUES
(3, 'Maria', 'Dela', 'Santos', 'mariasantos@gmail.com', 'maria', '$2y$12$kZsiT1nmhhLiqDGtesP2fOIAE0zZUlqksTI01I4.KIfQBDdrjv4xi', 'Administrator', '2024-01-10 12:43:21', '2024-01-15 12:19:18', '2024-01-21 11:00:48'),
(4, 'Juan', 'Dela', 'Cruz', 'juandelacruz@gmail.com', 'juan', '$2y$12$tBeQB0ZMYk2I21SGR5nP7OyGHOW.Fs7aHKEwQuQc9IIjHeN4i.8Vq', 'Inactive', '2024-01-15 09:36:34', '2024-01-15 09:36:34', NULL),
(5, 'Jay Mar', 'Batas', 'Pabayo', 'jaymarpabayo@gmail.com', 'green17', '$2y$12$0QfhKXlgWRToW3zYeNmZv.mtdMLT8jtN8fujZVNwBwQARBf/XIDnq', 'Inactive', '2024-01-21 23:38:59', '2024-01-21 23:38:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_brgy_clearances`
--

CREATE TABLE IF NOT EXISTS `tb_brgy_clearances` (
  `bc_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bc_applicant` bigint(20) NOT NULL,
  `bc_purpose` varchar(255) NOT NULL,
  `bc_ctc` varchar(100) NOT NULL,
  `bc_issue_place` varchar(255) NOT NULL,
  `bc_date_time` datetime NOT NULL,
  `bc_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `bc_created_by` bigint(20) NOT NULL,
  PRIMARY KEY (`bc_id`),
  KEY `bc_applicant` (`bc_applicant`),
  KEY `bc_created_by` (`bc_created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Constraints for table `tbl_certificates_of_indigency`
--
ALTER TABLE `tbl_certificates_of_indigency`
  ADD CONSTRAINT `tbl_certificates_of_indigency_ibfk_1` FOREIGN KEY (`coi_applicant`) REFERENCES `tbl_residents` (`resident_id`),
  ADD CONSTRAINT `tbl_certificates_of_indigency_ibfk_2` FOREIGN KEY (`coi_created_by`) REFERENCES `tbl_users` (`user_id`);

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

--
-- Constraints for table `tb_brgy_clearances`
--
ALTER TABLE `tb_brgy_clearances`
  ADD CONSTRAINT `tb_brgy_clearances_ibfk_1` FOREIGN KEY (`bc_applicant`) REFERENCES `tbl_residents` (`resident_id`),
  ADD CONSTRAINT `tb_brgy_clearances_ibfk_2` FOREIGN KEY (`bc_created_by`) REFERENCES `tbl_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
