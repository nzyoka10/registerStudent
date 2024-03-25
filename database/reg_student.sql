-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 10:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reg_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `course` varchar(50) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `dob`, `gender`, `address`, `telephone`, `email`, `course`, `registration_date`) VALUES
(5, 'Kiko Musau', '1980-01-10', 'male', 'Kinoo', '+1 (357) 393-1721', 'ruva@mailinator.com', 'Science', '2024-03-25 09:17:44'),
(6, 'Ori Black', '1980-01-10', 'male', 'Kiambu, DCI Rd', '+1 (357) 393-1721', 'ruva@mailinator.com', 'Science', '2024-03-25 09:23:02'),
(7, 'Levi Hicks', '2000-10-13', 'other', 'Lumbumba drive', '+1 (468) 579-8993', 'midesymyci@mailinator.com', 'Science', '2024-03-25 09:23:06'),
(8, 'Levi Hicks', '1998-02-13', 'other', 'Machakos lane', '+1 (468) 579-8993', 'midesymyci@mailinator.com', 'History', '2024-03-25 09:23:47'),
(9, 'Dante Simpson', '1994-12-29', 'other', 'Dolor recusandae Qu', '+1 (821) 412-2144', 'hyguwyvere@mailinator.com', 'History', '2024-03-25 09:23:50'),
(10, 'Dante Simpson', '1994-12-29', 'other', 'Dolor recusandae Qu', '+1 (821) 412-2144', 'hyguwyvere@mailinator.com', 'History', '2024-03-25 09:25:42'),
(11, 'Rama Pittman', '1970-05-20', 'female', 'Repudiandae id eaqu', '+1 (981) 115-3466', 'qetavylom@mailinator.com', 'History', '2024-03-25 09:25:46'),
(12, 'Dante Armstrong', '2020-01-21', 'other', 'Dignissimos itaque a', '+1 (884) 138-6484', 'ruvohin@mailinator.com', 'Math', '2024-03-25 09:37:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
