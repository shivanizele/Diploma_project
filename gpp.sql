-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 09:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_name` varchar(120) NOT NULL,
  `theory` tinyint(1) NOT NULL,
  `practical` tinyint(1) NOT NULL,
  `oral` tinyint(1) NOT NULL,
  `term_work` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_name`, `theory`, `practical`, `oral`, `term_work`) VALUES
(2, 'CM3103', 'Data Structure', 1, 1, 0, 1),
(3, 'IT3103', 'Data Communication and Networking', 1, 0, 1, 1),
(4, 'CM4105', 'Professional Practices-II', 0, 0, 0, 1),
(5, 'CM4106', 'Web Development Using JavaScript', 0, 1, 0, 1),
(6, 'MA4101', 'Entrepreneurship And Startups', 1, 0, 0, 0),
(7, 'CM5103', 'Programming Using PHP ', 1, 1, 0, 1),
(8, 'Cm3033', 'Php2', 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES
(14, 'admin', 'admin', 'admin'),
(17, '1907070', '123456', 'student'),
(18, '1907068', '123456', 'student'),
(19, '1907088', '123456', 'student'),
(20, '1907022', '123456', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `student_exam_form`
--

CREATE TABLE `student_exam_form` (
  `id` int(11) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_name` varchar(120) NOT NULL,
  `theory` tinyint(1) NOT NULL,
  `practical` tinyint(1) NOT NULL,
  `oral` tinyint(1) NOT NULL,
  `term_work` tinyint(1) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_exam_form`
--

INSERT INTO `student_exam_form` (`id`, `course_code`, `course_name`, `theory`, `practical`, `oral`, `term_work`, `student_id`) VALUES
(8, 'CM3102', 'Java Programming-I', 1, 1, 0, 1, 10),
(9, 'CM3103', 'Data Structure', 1, 1, 0, 1, 10),
(10, 'IT3103', 'Data Communication and Networking', 1, 0, 1, 1, 10),
(11, 'CM4105', 'Professional Practices-II', 0, 0, 0, 1, 10),
(12, 'CM4106', 'Web Development Using JavaScript', 0, 1, 0, 1, 10),
(13, 'MA4101', 'Entrepreneurship And Startups', 1, 0, 0, 0, 10),
(14, 'CM5103', 'Programming Using PHP ', 1, 1, 0, 1, 10),
(15, 'CM3102', 'Java Programming-I', 1, 1, 0, 1, 15),
(16, 'CM3103', 'Data Structure', 1, 1, 0, 1, 15),
(17, 'IT3103', 'Data Communication and Networking', 1, 0, 1, 1, 15),
(18, 'CM4105', 'Professional Practices-II', 0, 0, 0, 1, 15),
(19, 'CM4106', 'Web Development Using JavaScript', 0, 1, 0, 1, 15),
(20, 'MA4101', 'Entrepreneurship And Startups', 1, 0, 0, 0, 15),
(21, 'CM5103', 'Programming Using PHP ', 1, 1, 0, 1, 15),
(22, 'CM3102', 'Java Programming-I', 1, 1, 0, 1, 17),
(23, 'CM3103', 'Data Structure', 1, 1, 0, 1, 17),
(24, 'IT3103', 'Data Communication and Networking', 1, 0, 1, 1, 17),
(25, 'CM4105', 'Professional Practices-II', 0, 0, 0, 1, 17),
(26, 'CM4106', 'Web Development Using JavaScript', 0, 1, 0, 1, 17),
(27, 'MA4101', 'Entrepreneurship And Startups', 1, 0, 0, 0, 17),
(28, 'CM5103', 'Programming Using PHP ', 1, 1, 0, 1, 17),
(29, 'CM3102', 'Java Programming-I', 1, 1, 0, 1, 19),
(30, 'CM3103', 'Data Structure', 1, 1, 0, 1, 19),
(31, 'IT3103', 'Data Communication and Networking', 1, 0, 1, 1, 19),
(32, 'CM4105', 'Professional Practices-II', 0, 0, 0, 1, 19),
(33, 'CM4106', 'Web Development Using JavaScript', 0, 1, 0, 1, 19),
(34, 'MA4101', 'Entrepreneurship And Startups', 1, 0, 0, 0, 19),
(35, 'CM5103', 'Programming Using PHP ', 1, 1, 0, 1, 19),
(36, 'CM3102', 'Java Programming-I', 1, 1, 0, 1, 18),
(37, 'CM3103', 'Data Structure', 1, 1, 0, 1, 18),
(38, 'IT3103', 'Data Communication and Networking', 1, 0, 1, 1, 18),
(39, 'CM4105', 'Professional Practices-II', 0, 0, 0, 1, 18),
(40, 'CM4106', 'Web Development Using JavaScript', 0, 1, 0, 1, 18),
(41, 'MA4101', 'Entrepreneurship And Startups', 1, 0, 0, 0, 18),
(42, 'CM5103', 'Programming Using PHP ', 1, 1, 0, 1, 18),
(43, 'CM3102', 'Java Programming-I', 1, 1, 0, 1, 20),
(44, 'CM3103', 'Data Structure', 1, 1, 0, 1, 20),
(45, 'IT3103', 'Data Communication and Networking', 1, 0, 1, 1, 20),
(46, 'CM4105', 'Professional Practices-II', 0, 0, 0, 1, 20),
(47, 'CM4106', 'Web Development Using JavaScript', 0, 1, 0, 1, 20),
(48, 'MA4101', 'Entrepreneurship And Startups', 1, 0, 0, 0, 20),
(49, 'CM5103', 'Programming Using PHP ', 1, 1, 0, 1, 20),
(50, 'Cm3033', 'Php2', 1, 1, 0, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `enroll_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `first_name`, `last_name`, `email`, `enroll_number`) VALUES
(17, 'Sandhya', 'Zele', 'sandhya@gmail.com', '1907070'),
(18, 'Vijay', 'Shilekar', 'vijay@gmail.com', '1907068'),
(19, 'Swara', 'Zele', 'swarupazele@gmail.com', '1907088'),
(20, 'Mahima', 'shinde', 'mahima@gmail.com', '1907022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_exam_form`
--
ALTER TABLE `student_exam_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_exam_form`
--
ALTER TABLE `student_exam_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
