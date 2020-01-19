-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2020 at 01:31 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_twm`
--

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `competition_id` int(11) NOT NULL,
  `competition_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competition`
--

INSERT INTO `competition` (`competition_id`, `competition_name`) VALUES
(101, 'Web Development'),
(102, 'Mobile App Development'),
(103, 'Speed Programming'),
(104, 'UI/UX Design'),
(105, 'Database Design');

-- --------------------------------------------------------

--
-- Table structure for table `compevent`
--

CREATE TABLE `compevent` (
  `compevent_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `winner_team_id` int(11) NOT NULL,
  `runner_up_team_id` int(11) NOT NULL,
  `head_nu_id` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`) VALUES
(101, 'Tech Cup');

-- --------------------------------------------------------

--
-- Table structure for table `event_team`
--

CREATE TABLE `event_team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leader`
--

CREATE TABLE `leader` (
  `nu_id` varchar(15) NOT NULL,
  `team_id` int(11) NOT NULL,
  `contact_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `nu_id` varchar(15) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nu_email` varchar(50) NOT NULL,
  `year_join` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `team_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`nu_id`, `full_name`, `gender`, `nu_email`, `year_join`, `username`, `password`, `team_id`, `role_id`) VALUES
('K173791', 'Ali Faisal', 'Male', 'K173791@nu.edu.pk', 2019, 'K173791', '7789', 107, 115),
('K173810', 'Aiman Siddiqui', 'Female', 'K173810@u.edu.pk', 2019, 'K173810', '7789', 106, 114),
('K173851', 'Shayan', 'Male', 'K173851@u.edu.pk', 2020, 'K173851', '7789', 107, 124);

-- --------------------------------------------------------

--
-- Table structure for table `mem_proj`
--

CREATE TABLE `mem_proj` (
  `nu_id` varchar(15) NOT NULL,
  `proj_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `nu_id` varchar(15) NOT NULL,
  `nu_mail` int(100) NOT NULL,
  `full_name` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `proj_id` int(11) NOT NULL,
  `proj_name` varchar(100) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(101, 'Faculty Head'),
(102, 'Co-Faculty Head'),
(103, 'President'),
(104, 'Vice President'),
(105, 'General Secretary'),
(106, 'Head Front End Development'),
(107, 'Head Back End Development'),
(108, 'Head Mobile App Development'),
(109, 'Head Mentorship'),
(110, 'Head Media and Promotions'),
(111, 'Head Desgin'),
(112, 'Head Content'),
(113, 'Head Event Management'),
(114, 'Co-Head Front End Development'),
(115, 'Co-Head Back End Development'),
(116, 'Co-Head Mobile App Development'),
(117, 'Co-Head Mentorship'),
(118, 'Co-Head Media and Promotions'),
(119, 'Co-Head Desgin Team'),
(120, 'Co-Head Content Team'),
(121, 'Co-Head Event Management'),
(122, 'Project Manager'),
(123, 'Front End Developer'),
(124, 'Back End Developer'),
(125, 'Mobile App Developer'),
(126, 'Mentor'),
(127, 'Media and Promotions'),
(128, 'Designer'),
(129, 'Content Writer'),
(130, 'Event Manager'),
(131, 'Learner');

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `round_id` int(11) NOT NULL,
  `round_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `round`
--

INSERT INTO `round` (`round_id`, `round_name`) VALUES
(101, 'Round 1'),
(102, 'Qualifier 1'),
(103, 'Qualifier 2');

-- --------------------------------------------------------

--
-- Table structure for table `roundscore`
--

CREATE TABLE `roundscore` (
  `solved_prob` int(11) NOT NULL DEFAULT 0,
  `total_prob` int(11) NOT NULL DEFAULT 0,
  `round_id` int(11) NOT NULL,
  `compevent_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `nu_id` varchar(15) NOT NULL,
  `comm_skill` float NOT NULL,
  `tech_skill` float NOT NULL,
  `mng_skill` float NOT NULL,
  `team_player` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `twm_team`
--

CREATE TABLE `twm_team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `team_details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `twm_team`
--

INSERT INTO `twm_team` (`team_id`, `team_name`, `team_details`) VALUES
(101, 'Web Development', 'Detail: Web Development'),
(102, 'Mobile App Development', 'Detail: Mobile App Development'),
(103, 'Speed Programming', 'Detail: Speed Programming'),
(104, 'UI/UX Design', 'Detail: UI/UX Design'),
(105, 'Database Design', 'Detail: Database Design'),
(106, 'Front End Team', 'Detail: Front End Team'),
(107, 'Back End Team', 'Detail: Back End Team'),
(108, 'Media and Promotions Team', 'Detail: Media and Promotions Team'),
(109, 'Design Team', 'Detail: Design Team'),
(110, 'Content Team', 'Detail: Content Team'),
(111, 'Mentorship Team', 'Detail: Mentorship Team'),
(112, 'Event Management Team', 'Detail: Event Management Team');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`competition_id`);

--
-- Indexes for table `compevent`
--
ALTER TABLE `compevent`
  ADD PRIMARY KEY (`compevent_id`),
  ADD KEY `ce_compid` (`comp_id`),
  ADD KEY `ce_eventid` (`event_id`),
  ADD KEY `ce_headid` (`head_nu_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_team`
--
ALTER TABLE `event_team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `leader`
--
ALTER TABLE `leader`
  ADD PRIMARY KEY (`nu_id`,`team_id`),
  ADD KEY `l_teamid` (`team_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`nu_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `mem_proj`
--
ALTER TABLE `mem_proj`
  ADD PRIMARY KEY (`nu_id`,`proj_id`),
  ADD KEY `proj_id` (`proj_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`nu_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`proj_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `round`
--
ALTER TABLE `round`
  ADD PRIMARY KEY (`round_id`);

--
-- Indexes for table `roundscore`
--
ALTER TABLE `roundscore`
  ADD PRIMARY KEY (`round_id`,`compevent_id`,`team_id`),
  ADD KEY `rs_compeventid` (`compevent_id`),
  ADD KEY `rs_teamid` (`team_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD UNIQUE KEY `nu_id` (`nu_id`);

--
-- Indexes for table `twm_team`
--
ALTER TABLE `twm_team`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compevent`
--
ALTER TABLE `compevent`
  MODIFY `compevent_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_team`
--
ALTER TABLE `event_team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `compevent`
--
ALTER TABLE `compevent`
  ADD CONSTRAINT `ce_compid` FOREIGN KEY (`comp_id`) REFERENCES `competition` (`competition_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ce_eventid` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ce_headid` FOREIGN KEY (`head_nu_id`) REFERENCES `member` (`nu_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `leader`
--
ALTER TABLE `leader`
  ADD CONSTRAINT `l_nuid` FOREIGN KEY (`nu_id`) REFERENCES `participants` (`nu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `l_teamid` FOREIGN KEY (`team_id`) REFERENCES `event_team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `twm_team` (`team_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `mem_proj`
--
ALTER TABLE `mem_proj`
  ADD CONSTRAINT `mem_proj_ibfk_1` FOREIGN KEY (`nu_id`) REFERENCES `member` (`nu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mem_proj_ibfk_2` FOREIGN KEY (`proj_id`) REFERENCES `project` (`proj_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mem_proj_ibfk_3` FOREIGN KEY (`nu_id`) REFERENCES `member` (`nu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roundscore`
--
ALTER TABLE `roundscore`
  ADD CONSTRAINT `rs_compeventid` FOREIGN KEY (`compevent_id`) REFERENCES `compevent` (`compevent_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rs_roundid` FOREIGN KEY (`round_id`) REFERENCES `round` (`round_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rs_teamid` FOREIGN KEY (`team_id`) REFERENCES `event_team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `skill_ibfk_1` FOREIGN KEY (`nu_id`) REFERENCES `member` (`nu_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
