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

--
-- Database: `winteracademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` ( 
  `id` int NOT NULL AUTO_INCREMENT,
  `timing` varchar(200) NOT NULL,
  `capacity` int NOT NULL,
  `num_of_enrolled_students` int NOT NULL,
  `is_closed` tinyint(1) NOT NULL,
  `instructor_id` int NOT NULL,
  `prerequisite` varchar(100) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `timing`, `capacity`, `num_of_enrolled_students`, `is_closed`, `instructor_id`, `prerequisite`, `sport`, `level`) VALUES
(1, 'Mon & Wed - 10:00 AM to 12:00 PM', 20, 20, 0, 1, 'none', 'skiing', 'beginner'),
(2, 'Sat - 2:00 PM to 4:00 PM', 20, 10, 0, 1, 'none', 'skiing', 'beginner'),
(5, 'Tue & Thu - 11:00 AM to 1:00 PM', 15, 2, 0, 2, 'beginner in skiing', 'skiing', 'intermediate'),
(6, 'Sun - 3:00 PM to 5:00 PM ', 15, 6, 0, 2, 'beginner in skiing', 'skiing', 'intermediate'),
(7, 'Daily - 10:00 AM to 4:00 PM', 30, 20, 0, 3, 'none', 'sledding', 'beginner'),
(8, 'Daily - 10:00 AM to 5:00 PM', 20, 10, 0, 4, 'beginner in sledding', 'sledding', 'intermediate');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `size` varchar(20) NOT NULL,
  `num_avaliable` int NOT NULL,
  `total_owned` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `type`, `sport`, `size`, `num_avaliable`, `total_owned`) VALUES
(1, 'ski boots', 'skiing', '', 150, 200),
(2, 'skiis', 'skiing', '', 150, 200),
(3, 'ski poles', 'skiing', '', 150, 200),
(4, 'ski helmets', 'skiing', '', 140, 150);

-- --------------------------------------------------------

--
-- Table structure for table `equipment_course`
--

DROP TABLE IF EXISTS `equipment_course`;
CREATE TABLE IF NOT EXISTS `equipment_course` (
  `equipment_id` int NOT NULL,
  `course_id` int NOT NULL,
  PRIMARY KEY (`equipment_id`,`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Fname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Lname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(320) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Emergency_Contact_Number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `Height` int NOT NULL,
  `Weight` int NOT NULL,
  `Level` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `Disabilities` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

DROP TABLE IF EXISTS `student_course`;
CREATE TABLE IF NOT EXISTS `student_course` (
  `student_id` int NOT NULL,
  `course_id` int NOT NULL,
  PRIMARY KEY (`student_id`,`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
