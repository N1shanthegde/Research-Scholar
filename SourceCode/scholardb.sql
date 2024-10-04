-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 02:53 PM
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
-- Database: `scholardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `sl_no` int(11) NOT NULL,
  `sid` varchar(15) DEFAULT NULL,
  `conference_name` varchar(35) DEFAULT NULL,
  `c_place` varchar(25) DEFAULT NULL,
  `c_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conference`
--

INSERT INTO `conference` (`sl_no`, `sid`, `conference_name`, `c_place`, `c_date`) VALUES
(0, '1JB21IS073', 'java', 'bengaluru', '2024-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(35) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `message` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guide`
--

CREATE TABLE `guide` (
  `guide_id` varchar(15) NOT NULL,
  `guide_name` varchar(20) DEFAULT NULL,
  `institution` varchar(50) DEFAULT NULL,
  `post` varchar(30) DEFAULT NULL,
  `sid` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guide`
--

INSERT INTO `guide` (`guide_id`, `guide_name`, `institution`, `post`, `sid`) VALUES
('1', 'nishant', 'sjbit', 'assistant professor', '1JB21IS073'),
('3', 'manoj', 'SJBIT', 'assistant professor', '1rc21bc143');

-- --------------------------------------------------------

--
-- Table structure for table `progress_report`
--

CREATE TABLE `progress_report` (
  `sl_no` int(11) NOT NULL,
  `sid` varchar(15) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `details` varchar(150) DEFAULT NULL,
  `report_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress_report`
--

INSERT INTO `progress_report` (`sl_no`, `sid`, `status`, `details`, `report_date`) VALUES
(14, '1JB21IS073', 'awarded', 'mnbjsdgfwvkhg', '2024-02-29'),
(15, '1rc21bc143', 'awarded', 'mnbjsdgfwvkhg', '2024-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `sl_no` int(11) NOT NULL,
  `sid` varchar(15) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `pub_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`sl_no`, `sid`, `title`, `pub_date`) VALUES
(14, '1JB21IS073', 'python', '2024-02-26'),
(15, '1rc21bc143', 'aiml', '2024-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `research_scholar`
--

CREATE TABLE `research_scholar` (
  `sid` varchar(15) NOT NULL,
  `s_name` varchar(20) DEFAULT NULL,
  `research_title` varchar(70) NOT NULL,
  `designation` varchar(25) DEFAULT NULL,
  `center` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `guide_id` varchar(15) DEFAULT NULL,
  `mobile` int(10) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_scholar`
--

INSERT INTO `research_scholar` (`sid`, `s_name`, `research_title`, `designation`, `center`, `address`, `guide_id`, `mobile`, `email`) VALUES
('1JB21IS073', 'arjun', 'java', 'student', 'sjbit', 'bengaluru', '1', 1234567890, 'check@gmail.com'),
('1rc21bc143', 'medini', 'java', 'asst. professor', 'sjbit', 'bengaluru', '3', 1234567890, 'check@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `scholar`
--

CREATE TABLE `scholar` (
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `sid` varchar(15) NOT NULL,
  `password` varchar(16) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholar`
--

INSERT INTO `scholar` (`name`, `email`, `phone`, `sid`, `password`, `date`) VALUES
('NISHANT MANJUNATH HEGDE', 'check@gmail.com', 1234567890, '1JB21IS073', '123', '2024-03-07'),
('medini', 'check@gmail.com', 1234567890, '1rc21bc143', '123', '2024-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `phone` int(15) DEFAULT NULL,
  `usertype` varchar(15) DEFAULT NULL,
  `password` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`sl_no`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`guide_id`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `progress_report`
--
ALTER TABLE `progress_report`
  ADD PRIMARY KEY (`sl_no`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`sl_no`,`title`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `research_scholar`
--
ALTER TABLE `research_scholar`
  ADD PRIMARY KEY (`sid`,`research_title`),
  ADD KEY `guide_id` (`guide_id`);

--
-- Indexes for table `scholar`
--
ALTER TABLE `scholar`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `progress_report`
--
ALTER TABLE `progress_report`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `conference_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `scholar` (`sid`) ON DELETE CASCADE;

--
-- Constraints for table `guide`
--
ALTER TABLE `guide`
  ADD CONSTRAINT `guide_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `scholar` (`sid`) ON DELETE CASCADE;

--
-- Constraints for table `progress_report`
--
ALTER TABLE `progress_report`
  ADD CONSTRAINT `progress_report_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `scholar` (`sid`) ON DELETE CASCADE;

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `scholar` (`sid`) ON DELETE CASCADE;

--
-- Constraints for table `research_scholar`
--
ALTER TABLE `research_scholar`
  ADD CONSTRAINT `research_scholar_ibfk_1` FOREIGN KEY (`guide_id`) REFERENCES `guide` (`guide_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `research_scholar_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `scholar` (`sid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
