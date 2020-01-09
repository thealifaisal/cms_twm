-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2020 at 02:07 PM
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
  `competition_name` varchar(100) NOT NULL,
  `head_nu_id` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comp_event`
--

CREATE TABLE `comp_event` (
  `competition_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `winner_team_id` int(11) DEFAULT NULL,
  `runnerup_team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_team`
--

CREATE TABLE `event_team` (
  `team_name` varchar(100) NOT NULL,
  `round_name` varchar(50) DEFAULT NULL,
  `competition_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leader`
--

CREATE TABLE `leader` (
  `nu_id` varchar(15) NOT NULL,
  `contact_no` varchar(20) NOT NULL
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
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `nu_id` varchar(15) NOT NULL,
  `nu_mail` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `team_name` varchar(100) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `round_name` varchar(50) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `year` int(11) NOT NULL
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
  `team_details` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`competition_id`),
  ADD KEY `head_nu_id` (`head_nu_id`);

--
-- Indexes for table `comp_event`
--
ALTER TABLE `comp_event`
  ADD PRIMARY KEY (`competition_id`,`event_id`,`year`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `year` (`year`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_team`
--
ALTER TABLE `event_team`
  ADD PRIMARY KEY (`team_name`),
  ADD KEY `round_name` (`round_name`),
  ADD KEY `competition_id` (`competition_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `year` (`year`);

--
-- Indexes for table `leader`
--
ALTER TABLE `leader`
  ADD PRIMARY KEY (`nu_id`);

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
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`nu_id`),
  ADD KEY `team_name` (`team_name`);

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
  ADD PRIMARY KEY (`round_name`,`event_id`,`year`,`competition_id`),
  ADD KEY `competition_id` (`competition_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `year` (`year`);

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
-- Constraints for dumped tables
--

--
-- Constraints for table `competition`
--
ALTER TABLE `competition`
  ADD CONSTRAINT `competition_ibfk_1` FOREIGN KEY (`head_nu_id`) REFERENCES `member` (`nu_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `comp_event`
--
ALTER TABLE `comp_event`
  ADD CONSTRAINT `comp_event_ibfk_1` FOREIGN KEY (`competition_id`) REFERENCES `competition` (`competition_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comp_event_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event_team`
--
ALTER TABLE `event_team`
  ADD CONSTRAINT `event_team_ibfk_1` FOREIGN KEY (`round_name`) REFERENCES `round` (`round_name`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `event_team_ibfk_2` FOREIGN KEY (`competition_id`) REFERENCES `round` (`competition_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `event_team_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `round` (`event_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `event_team_ibfk_4` FOREIGN KEY (`year`) REFERENCES `round` (`year`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `leader`
--
ALTER TABLE `leader`
  ADD CONSTRAINT `leader_ibfk_1` FOREIGN KEY (`nu_id`) REFERENCES `participant` (`nu_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`team_name`) REFERENCES `event_team` (`team_name`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `round`
--
ALTER TABLE `round`
  ADD CONSTRAINT `round_ibfk_1` FOREIGN KEY (`competition_id`) REFERENCES `comp_event` (`competition_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `round_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `comp_event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `round_ibfk_3` FOREIGN KEY (`year`) REFERENCES `comp_event` (`year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `skill_ibfk_1` FOREIGN KEY (`nu_id`) REFERENCES `member` (`nu_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
