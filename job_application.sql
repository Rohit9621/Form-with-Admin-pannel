-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 07:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `applied_post` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `husband_wife_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `caste_name` varchar(255) DEFAULT NULL,
  `caste_category` varchar(50) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `whatsapp_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `board_10th` varchar(255) DEFAULT NULL,
  `passing_year_10th` varchar(10) DEFAULT NULL,
  `roll_enrollment_10th` varchar(255) DEFAULT NULL,
  `result_division_10th` varchar(255) DEFAULT NULL,
  `percentage_10th` varchar(10) DEFAULT NULL,
  `marksheet_10th` varchar(255) DEFAULT NULL,
  `board_12th` varchar(255) DEFAULT NULL,
  `passing_year_12th` varchar(10) DEFAULT NULL,
  `roll_enrollment_12th` varchar(255) DEFAULT NULL,
  `result_division_12th` varchar(255) DEFAULT NULL,
  `percentage_12th` varchar(10) DEFAULT NULL,
  `marksheet_12th` varchar(255) DEFAULT NULL,
  `board_ug` varchar(255) DEFAULT NULL,
  `passing_year_ug` varchar(10) DEFAULT NULL,
  `roll_enrollment_ug` varchar(255) DEFAULT NULL,
  `result_division_ug` varchar(255) DEFAULT NULL,
  `percentage_ug` varchar(10) DEFAULT NULL,
  `marksheet_ug` varchar(255) DEFAULT NULL,
  `board_pg` varchar(255) DEFAULT NULL,
  `passing_year_pg` varchar(10) DEFAULT NULL,
  `roll_enrollment_pg` varchar(255) DEFAULT NULL,
  `result_division_pg` varchar(255) DEFAULT NULL,
  `percentage_pg` varchar(10) DEFAULT NULL,
  `marksheet_pg` varchar(255) DEFAULT NULL,
  `board_diploma` varchar(255) DEFAULT NULL,
  `passing_year_diploma` varchar(10) DEFAULT NULL,
  `roll_enrollment_diploma` varchar(255) DEFAULT NULL,
  `result_division_diploma` varchar(255) DEFAULT NULL,
  `percentage_diploma` varchar(10) DEFAULT NULL,
  `marksheet_diploma` varchar(255) DEFAULT NULL,
  `board_certificate` varchar(255) DEFAULT NULL,
  `passing_year_certificate` varchar(10) DEFAULT NULL,
  `roll_enrollment_certificate` varchar(255) DEFAULT NULL,
  `result_division_certificate` varchar(255) DEFAULT NULL,
  `percentage_certificate` varchar(10) DEFAULT NULL,
  `marksheet_certificate` varchar(255) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `signature_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `applied_post`, `name`, `father_name`, `mother_name`, `marital_status`, `husband_wife_name`, `dob`, `sex`, `caste_name`, `caste_category`, `religion`, `address`, `mobile`, `whatsapp_number`, `email`, `board_10th`, `passing_year_10th`, `roll_enrollment_10th`, `result_division_10th`, `percentage_10th`, `marksheet_10th`, `board_12th`, `passing_year_12th`, `roll_enrollment_12th`, `result_division_12th`, `percentage_12th`, `marksheet_12th`, `board_ug`, `passing_year_ug`, `roll_enrollment_ug`, `result_division_ug`, `percentage_ug`, `marksheet_ug`, `board_pg`, `passing_year_pg`, `roll_enrollment_pg`, `result_division_pg`, `percentage_pg`, `marksheet_pg`, `board_diploma`, `passing_year_diploma`, `roll_enrollment_diploma`, `result_division_diploma`, `percentage_diploma`, `marksheet_diploma`, `board_certificate`, `passing_year_certificate`, `roll_enrollment_certificate`, `result_division_certificate`, `percentage_certificate`, `marksheet_certificate`, `photo_path`, `signature_path`) VALUES
(1, 'Work ass', 'Rishabh Saini', 'ABC father', 'Test mother', 'Single', 'No', '2023-12-01', 'Male', 'test', 'OBC', 'test Rele', 'vill', '123123', '123123', 'test@gmail.com', 'testr', '2012', '121233', '3', '23%', '', 'testr', '2012', '1212343', '2', '23%', '', 'test3', '2012', '12312', '3', '23%', '', 'test5', '2012', '133223', '4', '23%', '', 'test6', '2012', '121342', '5', '26%', '', 'test8', '2012', '12123334', '6', '34%', '', '', ''),
(2, 'Work ass', 'Rishabh Saini', 'ABC father', 'Test mother', 'Single', 'No', '2023-12-01', 'Male', 'test', 'OBC', 'test Rele', 'vill', '123123', '123123', 'test@gmail.com', 'testr', '2012', '121233', '3', '23%', '', 'testr', '2012', '1212343', '2', '23%', '', 'test3', '2012', '12312', '3', '23%', '', 'test5', '2012', '133223', '4', '23%', '', 'test6', '2012', '121342', '5', '26%', '', 'test8', '2012', '12123334', '6', '34%', '', '', ''),
(3, 'Work ass', 'Rishabh Saini', 'ABC father', 'Test mother', 'Single', 'No', '2023-12-01', 'Male', 'test', 'OBC', 'test Rele', 'vill', '123123', '123123', 'test@gmail.com', 'testr', '2012', '121233', '3', '23%', '', 'testr', '2012', '1212343', '2', '23%', '', 'test3', '2012', '12312', '3', '23%', '', 'test5', '2012', '133223', '4', '23%', '', 'test6', '2012', '121342', '5', '26%', '', 'test8', '2012', '12123334', '6', '34%', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
