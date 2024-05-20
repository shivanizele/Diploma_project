-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 02:47 PM
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
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(50) NOT NULL,
  `messages` varchar(500) NOT NULL,
  `response` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `messages`, `response`) VALUES
(1, 'my account is down', 'We are currently carrying out  routine maintenace.'),
(3, 'Hello', 'Hey there, How can I help you?'),
(32, 'Hi', 'Hello, welcome to Government Polytechnic pune. How can i help you?');

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
(30, 'CM4104', 'Project', 0, 1, 1, 1),
(31, 'CM1234', 'Cloud Technologies', 1, 0, 1, 1),
(32, 'IT5555', 'Software Testiong', 1, 1, 0, 1),
(33, 'CM5105', 'GGT', 1, 0, 1, 1),
(34, 'IT4135', 'Ethical Hacking', 1, 1, 0, 1);

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
(27, '1907070', 'mahi', 'student'),
(29, '1907069', '12345', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `url`) VALUES
(23, 'nn', 'uploads/2_MAd_prints.docx'),
(24, 'is_chapter1', 'uploads/23_IS_6th_chapter.pdf'),
(25, 'Software Testing unit_2', 'uploads/24_Pr.docx');

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
(50, 'Cm3033', 'Php2', 1, 1, 0, 1, 20),
(51, 'CM3103', 'Data Structure', 1, 1, 0, 1, 21),
(52, 'IT3103', 'Data Communication and Networking', 1, 0, 1, 1, 21),
(53, 'CM4105', 'Professional Practices-II', 0, 0, 0, 1, 21),
(54, 'CM4106', 'Web Development Using JavaScript', 0, 1, 0, 1, 21),
(55, 'MA4101', 'Entrepreneurship And Startups', 1, 0, 0, 0, 21),
(56, 'CM5103', 'Programming Using PHP ', 1, 1, 0, 1, 21),
(57, 'CM3103', 'Data Structure', 1, 1, 0, 0, 22),
(58, 'IT3103', 'Data Communication and Networking', 0, 0, 0, 0, 22),
(59, 'CM4105', 'Professional Practices-II', 0, 0, 0, 0, 22),
(60, 'CM4106', 'Web Development Using JavaScript', 0, 0, 0, 0, 22),
(61, 'MA4101', 'Entrepreneurship And Startups', 0, 0, 0, 0, 22),
(62, 'CM5103', 'Programming Using PHP ', 0, 0, 0, 0, 22),
(63, 'Cs2101', 'cs', 0, 0, 0, 0, 22),
(64, 'CM3103', 'Data Structure', 1, 1, 0, 0, 25),
(65, 'IT3103', 'Data Communication and Networking', 0, 0, 0, 0, 25),
(66, 'CM4105', 'Professional Practices-II', 0, 0, 0, 0, 25),
(67, 'CM4106', 'Web Development Using JavaScript', 0, 1, 0, 0, 25),
(68, 'MA4101', 'Entrepreneurship And Startups', 0, 0, 0, 0, 25),
(69, 'CM5103', 'Programming Using PHP ', 1, 0, 0, 0, 25),
(70, 'Cs2101', 'cs', 1, 0, 0, 0, 25),
(71, 'IT4104', 'Jp', 1, 1, 0, 0, 25),
(72, 'IT3103', 'Data Communication and Networking', 0, 0, 0, 0, 26),
(73, 'CM4105', 'Professional Practices-II', 0, 0, 0, 1, 26),
(74, 'CM4106', 'Web Development Using JavaScript', 0, 1, 0, 0, 26),
(75, 'MA4101', 'Entrepreneurship And Startups', 1, 0, 0, 0, 26),
(76, 'CM5103', 'Programming Using PHP ', 0, 0, 0, 0, 26),
(77, 'IT4104', 'IS', 1, 0, 1, 1, 26),
(78, 'IT3103', 'Data Communication and Networking', 1, 0, 1, 1, 27),
(79, 'CM4105', 'Professional Practices-II', 0, 0, 0, 1, 27),
(80, 'CM4106', 'Web Development Using JavaScript', 0, 0, 0, 0, 27),
(81, 'CM5103', 'Programming Using PHP ', 1, 1, 0, 1, 27),
(82, 'IT4104', 'IS', 1, 0, 1, 1, 27),
(83, 'IT5104', 'MAD', 0, 1, 1, 1, 27),
(84, 'CM4104', 'Project', 0, 1, 1, 0, 28),
(85, 'CM1234', 'Cloud Technologies', 1, 0, 1, 1, 28),
(86, 'IT5555', 'Software Testiong', 1, 1, 0, 1, 28),
(87, 'CM5105', 'GGT', 1, 0, 1, 0, 28);

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
(27, 'Mahima', 'Shinde', 'mahima@5002@gmail.com', '1907070'),
(29, 'Shivani', 'Zele', 'shivanizele16@gmail.com', '1907069');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notes`
--
ALTER TABLE `notes`
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
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student_exam_form`
--
ALTER TABLE `student_exam_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
