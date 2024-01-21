-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 06:09 AM
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
-- Table structure for table `tb_brgy_clearances`
--

CREATE TABLE IF NOT EXISTS `tb_brgy_clearances` (
  `bc_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bc_applicant` bigint(20) NOT NULL,
  `bc_purpose` varchar(255) NOT NULL,
  `bc_ctc` varchar(100) NOT NULL,
  `bc_issue_place` int(11) NOT NULL,
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
-- Constraints for table `tb_brgy_clearances`
--
ALTER TABLE `tb_brgy_clearances`
  ADD CONSTRAINT `tb_brgy_clearances_ibfk_1` FOREIGN KEY (`bc_applicant`) REFERENCES `tbl_residents` (`resident_id`),
  ADD CONSTRAINT `tb_brgy_clearances_ibfk_2` FOREIGN KEY (`bc_created_by`) REFERENCES `tbl_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
