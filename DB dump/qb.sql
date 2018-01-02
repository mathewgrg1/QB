-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 04:36 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answerID` int(7) NOT NULL,
  `studentID` int(5) NOT NULL,
  `qpID` int(5) NOT NULL,
  `questionNo` tinyint(2) NOT NULL,
  `answer` text,
  `marks` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answerID`, `studentID`, `qpID`, `questionNo`, `answer`, `marks`) VALUES
(1, 0, 1, 1, 'test', 0),
(2, 0, 1, 2, 'test', 0),
(3, 0, 1, 3, '', 0),
(4, 0, 1, 4, 'test', 0),
(5, 0, 1, 5, '', 0),
(6, 0, 1, 6, '', 0),
(7, 0, 1, 7, '', 0),
(8, 0, 1, 8, '', 0),
(9, 0, 1, 9, '', 0),
(10, 0, 1, 10, '', 0),
(11, 0, 1, 1, 'fadas', 0),
(12, 0, 1, 2, 'asd', 0),
(13, 0, 1, 3, 'asd', 0),
(14, 0, 1, 4, 'sda', 0),
(15, 0, 1, 5, 'asdf', 0),
(16, 0, 1, 6, 'asd', 0),
(17, 0, 1, 7, 'asd', 0),
(18, 0, 1, 8, 'das', 0),
(19, 0, 1, 9, 'sad', 0),
(20, 0, 1, 10, 'das', 0),
(21, 0, 1, 1, 'sdasda', 0),
(22, 0, 1, 2, 'sdasda', 0),
(23, 0, 1, 3, 'sdasda', 0),
(24, 0, 1, 4, 'sdasda', 0),
(25, 0, 1, 5, 'sdasda', 0),
(26, 0, 1, 6, 'sdasda', 0),
(27, 0, 1, 7, 'sdasda', 0),
(28, 0, 1, 8, 'sdasda', 0),
(29, 0, 1, 9, 'sdasda', 0),
(30, 0, 1, 10, 'sdasda', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(3) NOT NULL,
  `courseName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseName`) VALUES
(1, 'MCA'),
(2, 'MCS');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `examID` int(5) NOT NULL,
  `courseID` int(5) NOT NULL,
  `subjectID` int(5) NOT NULL,
  `qpID` int(5) NOT NULL,
  `examDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`examID`, `courseID`, `subjectID`, `qpID`, `examDate`, `startTime`, `endTime`) VALUES
(8, 2, 2, 1, '2017-10-18', '14:00:00', '16:00:00'),
(9, 2, 2, 1, '2017-10-25', '14:00:00', '16:00:00'),
(10, 2, 2, 1, '2017-10-25', '14:00:00', '16:00:00'),
(11, 2, 2, 1, '2017-10-20', '14:22:00', '15:33:00'),
(12, 2, 2, 1, '2017-10-11', '13:00:00', '15:00:00'),
(13, 2, 2, 1, '2017-10-08', '00:00:00', '00:00:00'),
(14, 1, 1, 1, '2017-10-17', '11:11:00', '14:22:00'),
(16, 2, 2, 1, '2017-10-24', '14:22:00', '15:33:00'),
(17, 1, 1, 2, '2017-10-19', '14:22:00', '15:33:00'),
(18, 1, 1, 2, '2017-10-31', '11:11:00', '14:22:00'),
(19, 2, 2, 2, '2017-10-30', '11:11:00', '14:22:00'),
(20, 1, 1, 3, '2017-10-17', '09:11:00', '14:22:00'),
(21, 1, 1, 4, '2017-10-17', '10:00:00', '11:10:00'),
(22, 1, 1, 5, '2017-10-17', '11:11:00', '12:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `questionpapers`
--

CREATE TABLE `questionpapers` (
  `id` int(11) NOT NULL,
  `qpID` int(5) NOT NULL,
  `questionNo` tinyint(2) NOT NULL,
  `questionID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionpapers`
--

INSERT INTO `questionpapers` (`id`, `qpID`, `questionNo`, `questionID`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 3),
(3, 1, 3, 5),
(4, 1, 4, 7),
(5, 1, 5, 9),
(6, 1, 6, 11),
(7, 1, 7, 13),
(8, 1, 8, 15),
(9, 1, 9, 17),
(10, 1, 10, 19),
(11, 2, 1, 2),
(12, 2, 2, 3),
(13, 2, 3, 4),
(14, 2, 4, 6),
(15, 2, 5, 8),
(16, 2, 6, 11),
(17, 2, 7, 12),
(18, 2, 8, 13),
(19, 2, 9, 16),
(20, 2, 10, 18),
(21, 3, 1, 0),
(22, 3, 2, 1),
(23, 3, 3, 2),
(24, 3, 4, 4),
(25, 3, 5, 5),
(26, 3, 6, 12),
(27, 3, 7, 13),
(28, 3, 8, 14),
(29, 3, 9, 16),
(30, 3, 10, 19),
(31, 4, 1, 1),
(32, 4, 2, 3),
(33, 4, 3, 5),
(34, 4, 4, 9),
(35, 4, 5, 11),
(36, 4, 6, 13),
(37, 4, 7, 14),
(38, 4, 8, 15),
(39, 4, 9, 16),
(40, 4, 10, 18),
(41, 5, 1, 1),
(42, 5, 2, 2),
(43, 5, 3, 4),
(44, 5, 4, 5),
(45, 5, 5, 11),
(46, 5, 6, 12),
(47, 5, 7, 14),
(48, 5, 8, 17),
(49, 5, 9, 18),
(50, 5, 10, 19);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int(5) NOT NULL,
  `subjectID` int(3) NOT NULL,
  `question` text NOT NULL,
  `marks` int(2) NOT NULL,
  `unitNo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `subjectID`, `question`, `marks`, `unitNo`) VALUES
(1, 1, 'Explain the underlying assumption about intelligence in detail.', 12, 1),
(2, 1, 'What are the two ways in which domain specific knowledge can be incorporated into rule based search procedure?', 10, 1),
(3, 1, 'What is an AI technique? What are the properties associated with knowledge and how should it be represented?', 10, 1),
(4, 1, 'Write the algorithm for Breadth first search.', 10, 1),
(5, 1, 'State and Explain the observations made out of A* algorithm in detail.', 10, 2),
(6, 1, 'In simulated annealing, the annealing schedule consists of \"T\"value. Explain T with state space.', 10, 2),
(7, 1, 'How does Best first search derive as a combination of BFS and DFS? Explain using water jug problem as an example.', 10, 2),
(8, 1, 'What are the differences between simulated annealing and hill climbing techniques?', 10, 2),
(9, 1, 'Write a short note on Modus Tollens inference rule with an example.', 10, 3),
(10, 1, 'Explain the working of inference cycle using the inference engine architecture with a neat diagram.', 10, 3),
(11, 1, 'Explain backward chaining algorithm in detail.', 10, 3),
(12, 1, 'What is a Most General Unifier(MGU) in resolution refutation procedure? Explain with an example.', 10, 3),
(13, 1, 'Demonstrate the implementation of Alpha-Beta search procedure to play Tic Tac Toe.', 10, 4),
(14, 1, 'What is goal stack planning? Explain.', 10, 4),
(15, 1, 'Is the Minimax game playing procedure a Depth first search or a breadth first search- Justify.', 10, 4),
(16, 1, 'Comment on \"Global database\" necessity in a planning system.', 10, 4),
(17, 1, 'Explain Discourse integration with an example.', 10, 5),
(18, 1, 'What is semantic grammar? Explain its advantages.', 10, 5),
(19, 1, 'Explain Augmented Transition Networks with an example. How is it different from RTN? Explain.', 10, 5),
(20, 1, 'Write a short note on sentence level processing.', 10, 5),
(21, 1, 'Test', 10, 2),
(22, 0, 'What is Machine Learning?', 10, 1),
(23, 4, 'What is Data analytics', 10, 1),
(24, 2, 'what is machine learning', 10, 1),
(25, 3, 'what is cloud', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studID` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `courseID` int(3) NOT NULL DEFAULT '1',
  `userID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studID`, `name`, `courseID`, `userID`) VALUES
(1701, 'Mathew George', 1, 2),
(1702, 'Treesa Basil', 2, 3),
(1703, 'Pricy Jain', 1, 4),
(1708, 'Treesa', 2, 5),
(1709, 'pricy', 1, 6),
(1710, 'mathew', 2, 7),
(1711, 'Matehw', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectID` int(3) NOT NULL,
  `subjectName` varchar(30) NOT NULL,
  `courseID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectID`, `subjectName`, `courseID`) VALUES
(1, 'Artificial Intelligence', 1),
(2, 'Machine Learning', 2),
(3, 'Cloud Computing', 1),
(4, 'Data Analytics', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `userType` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `userType`) VALUES
(1, 'admin', 'admin', 0),
(2, '1547231', '1547231', 1),
(3, '1547265', '1547265', 1),
(4, '1547236', '1547236', 1),
(6, '1708', '1708', 1),
(7, '1710', '1710', 1),
(8, '1711', '1711', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answerID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`examID`),
  ADD KEY `qpID` (`qpID`);

--
-- Indexes for table `questionpapers`
--
ALTER TABLE `questionpapers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`),
  ADD KEY `subjectID` (`subjectID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answerID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `examID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `questionpapers`
--
ALTER TABLE `questionpapers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1712;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
