-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 03:55 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `administrator_id` bigint(20) NOT NULL,
  `administrator_name` varchar(100) NOT NULL,
  `administrator_role` varchar(100) NOT NULL,
  `administrator_phone` varchar(100) NOT NULL,
  `administrator_img` varchar(200) NOT NULL,
  `administrator_email` varchar(200) NOT NULL,
  `administrator_hash` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`administrator_id`, `administrator_name`, `administrator_role`, `administrator_phone`, `administrator_img`, `administrator_email`, `administrator_hash`) VALUES
(1, 'Alex', 'owner', '0543064544', '5abe1e9471fcf4.53333223.jpg', 'owner@school.com', '$2y$07$3TLZqJHyLJLJqJfSfD1dbOFco.3pBat8zOIMHPfXMTBfCc4ETi3I6'),
(2, 'Sasha', 'manager', '093333333', '1.png', 'test@test.com', '$2y$07$eUrh7EkAyD6edUlDf3OtAeHv3PgcQ7ePMkcKf30psvc5.4amKR9f6'),
(3, 'Avi T', 'sale', '093333330', '2.png', 'test3@test.com', '$2y$07$VXJusgync8MbaMorv/snWurh64BeKP5Ya1tMSA4Ic8G3gwFj4j7yu'),
(4, 't', 'sale', '0545201562', '', 't@t.com', '$2y$07$y2Rr2hkCck9AESgYZAtS7OSm/bwvVKQrDsd5kd166k6ariqLDYfpa'),
(5, 'bz', 'manager', '0545201562', '', 'owner@school.comz', '$2y$07$mJvKJ10oKkD1hhfnteeq3OcAMfRZWhUBcqwVeJQPRKOSvU3oPSjku');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` bigint(20) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_description` varchar(1000) NOT NULL,
  `course_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_description`, `course_img`) VALUES
(1, 'PHP in Action', 'PHP is a programming language that can do all sorts of things: evaluate form data sent from a browser, build custom web content to serve the browser, talk to a database, and even send and receive cookies (little packets of data that your browser uses to.', '5ac71e01076235.97017592.png'),
(7, '	Introduction to Computer Science for Multidisciplinary Studies I', 'Introduction to problem solving, analysis and design of small-scale computational systems and implementation using a procedural programming language. For students wishing to combine studies in computer science with studies in other disciplines.', '5ac82444b6f7a6.37383368.png'),
(8, 'Introduction to Problem Solving using Application Software', 'Introduction to computer fundamentals; contemporary topics, such as security and privacy, and the Internet and World Wide Web. Problem solving, analysis and design using application software such as spreadsheets.\r\n\r\nCourse Hours:\r\n3 units; H(4-0)\r\n\r\nAntirequisite(s):\r\nNot open to Computer Science majors.\r\n\r\nNotes:\r\nBasic familiarity with personal computers and commonly used software, including word processors, electronic mail and web browsers, will be assumed.', '5ac71e811c31c0.25084243.png'),
(9, 'Introduction to Computer Science for Multidisciplinary Studies II', 'Continuation of Introduction to Computer Science for Multidisciplinary Studies I. Emphasis on object oriented analysis and design of small-scale computational systems and implementation using an object oriented language. Issues of design, modularization and programming style will be emphasized.', '5ac71dd27f3ed4.62011171.png'),
(10, 'Introduction to Computer Science for Computer Science Majors I', 'Introduction to problem solving, the analysis and design of small-scale computational systems, and implementation using a procedural programming language. For computer science majors.', '5ac71ec2761a03.08979638.png'),
(11, 'Advanced Introduction to Computer Science', 'An accelerated introduction to problem solving, the analysis and design of small-scale computational systems and implementation using both procedural and object oriented programming languages. Issues of design, modularization, and programming style will be emphasized.', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` bigint(20) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_phone` varchar(100) NOT NULL,
  `student_email` varchar(1000) NOT NULL,
  `student_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_phone`, `student_email`, `student_img`) VALUES
(2, 'Alex', '0543064544', 'a@g.com', '5abf4ecd9f6463.12342797.jpg'),
(4, 'Moshe Moshe', '0543064544', 'q@q.commm', '5ac82460e4d823.06935248.jpg'),
(5, 'Avi Tueta', '0543064544', 'sa@daknma.com', ''),
(7, 'Yaniv', '0543064544', 'c@c.com', '5ac8248f7f9736.53996906.jpg'),
(8, 'z', '0543064544', 'z@z.com', '5ac5e81cdfe182.80845398.jpg'),
(9, 'TT', '0543064544', 'admin@gmail.comkl', '5ac5e82c614ef3.54327980.jpg'),
(10, 'a', '0543064544', 'q@q.commma', '5ac6c363d2e473.19312934.jpg'),
(11, 'test', '0543064544', 'ttt@g.com', '5ac71f1fb84226.81946149.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `student_courses_id` bigint(20) NOT NULL,
  `courses_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`student_courses_id`, `courses_id`, `student_id`) VALUES
(148, 1, 11),
(149, 7, 11),
(150, 8, 11),
(151, 10, 11),
(152, 11, 11),
(153, 1, 5),
(154, 7, 5),
(155, 8, 5),
(156, 10, 5),
(157, 11, 5),
(161, 11, 10),
(162, 1, 2),
(163, 8, 2),
(164, 11, 2),
(165, 10, 4),
(168, 10, 7),
(169, 11, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`administrator_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`student_courses_id`),
  ADD KEY `Student Courses_fk0` (`courses_id`),
  ADD KEY `Student Courses_fk1` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `administrator_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `student_courses_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD CONSTRAINT `Student Courses_fk0` FOREIGN KEY (`courses_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `Student Courses_fk1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
