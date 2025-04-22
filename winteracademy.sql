-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 09:54 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `winteracademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `timing` varchar(200) NOT NULL,
  `capacity` int(11) NOT NULL,
  `num_of_enrolled_students` int(11) NOT NULL,
  `is_closed` tinyint(1) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `prerequisite` varchar(100) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `timing`, `capacity`, `num_of_enrolled_students`, `is_closed`, `instructor_id`, `prerequisite`, `sport`, `level`) VALUES
(1, 'Mon & Wed - 10:00 AM to 12:00 PM', 20, 20, 0, 1, 'none', 'skiing', 'beginner'),
(2, 'Sat - 2:00 PM to 4:00 PM', 20, 10, 0, 1, 'none', 'skiing', 'beginner'),
(5, 'Tue & Thu - 11:00 AM to 1:00 PM', 15, 2, 0, 2, 'beginner in skiing', 'skiing', 'intermediate'),
(6, 'Sun - 3:00 PM to 5:00 PM ', 15, 6, 0, 2, 'beginner in skiing', 'skiing', 'intermediate'),
(18, 'Sun - 10:00 AM to 12:00 PM ', 30, 24, 0, 0, 'beginner in snowboarding', 'snowboarding', 'intermediate'),
(17, 'Tue & Thu - 9:00 AM to 11:00 AM', 25, 24, 0, 0, 'beginner in snowboarding', 'snowboarding', 'intermediate'),
(9, 'Fri - 9:00 AM to 12:00 PM', 10, 5, 0, 0, 'intermediate in skiing', 'skiing', 'expert'),
(10, 'Sun - 10:00 AM to 1:00 PM', 15, 11, 0, 0, 'intermediate in skiing', 'skiing', 'expert'),
(19, 'Fri - 11:00 AM to 1:00 PM', 10, 7, 0, 0, 'intermediate in snowboarding', 'snowboarding', 'expert'),
(13, 'Mon & Wed - 12:00 PM to 2:00 PM', 25, 20, 0, 0, 'none', 'snowboarding', 'beginner'),
(14, 'Sat - 10:00 AM to 12:00 PM', 20, 16, 0, 0, 'none', 'snowboarding', 'beginner'),
(20, 'Sun - 12:00 PM to 2:00 PM ', 15, 9, 0, 0, 'intermediate in snowboarding', 'snowboarding', 'expert'),
(21, 'Daily - 10:00 AM to 4:00 PM', 30, 27, 0, 0, 'none', 'sledding', 'beginner'),
(22, 'Daily - 10:00 AM to 5:00 PM', 25, 24, 0, 0, 'beginner in sledding', 'sledding', 'intermediate'),
(23, 'Weekends - 10:00 AM to 6:00 PM', 20, 14, 0, 0, 'intermediate in sledding', 'sledding', 'expert'),
(24, 'Saturdays - 9:00 AM to 12:00 PM', 15, 12, 0, 0, 'none', 'ice climbing', 'beginner'),
(25, 'Sundays - 9:00 AM to 2:00 PM', 10, 5, 0, 0, 'beginner in ice climbing', 'ice climbing', 'intermediate'),
(26, 'Weekends by appointment', 5, 0, 0, 0, 'intermediate in ice climbing', 'ice climbing', 'expert');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `size` varchar(20) NOT NULL,
  `num_avaliable` int(11) NOT NULL,
  `total_owned` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `type`, `sport`, `size`, `num_avaliable`, `total_owned`) VALUES
(1, 'ski boots', 'skiing', '', 150, 200),
(2, 'skiis', 'skiing', '', 150, 200),
(3, 'ski poles', 'skiing', '', 150, 200),
(4, 'ski helmets', 'skiing', '', 140, 150),
(5, 'snowboard', 'snowboarding', '', 100, 200),
(6, 'snowboard bindings', 'snowboarding', '', 100, 200),
(7, 'snowboard boots', 'snowboarding', '', 100, 200),
(8, 'helmet', 'snowboarding', '', 70, 100),
(9, 'sled', 'sledding', '', 150, 300),
(10, 'helmet', 'ice climbing', '', 66, 100),
(11, 'harness', 'ice climbing', '', 40, 100),
(12, 'boots', 'ice climbing', '', 40, 100),
(13, 'crampons', 'ice climbing', '', 40, 100),
(14, 'ice tools', 'ice climbing', '', 40, 100),
(15, 'rope', 'ice climbing', '', 40, 100),
(16, 'belay device', 'ice climbing', '', 40, 100),
(17, 'ice climbing rack', 'ice climbing ', '', 40, 100);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_course`
--

CREATE TABLE `equipment_course` (
  `equipment_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Emergency_Contact_Number` varchar(15) NOT NULL,
  `Height` int(11) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Level` varchar(15) NOT NULL,
  `Disabilities` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_course`
--
ALTER TABLE `equipment_course`
  ADD PRIMARY KEY (`equipment_id`,`course_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`student_id`,`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-------------------------------------------
-----Table structure for contacts : 
CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  subject VARCHAR(255),
  message TEXT
);
