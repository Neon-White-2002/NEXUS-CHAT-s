-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 09:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neeku_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MSG_ID` int(11) NOT NULL,
  `IN_COMING_MSG_ID` int(255) NOT NULL,
  `OUT_GOING_MSG_ID` int(255) NOT NULL,
  `MSG` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MSG_ID`, `IN_COMING_MSG_ID`, `OUT_GOING_MSG_ID`, `MSG`) VALUES
(13, 57577587, 1042740954, 'Hey, Shourya...'),
(14, 1042740954, 57577587, 'Hey...'),
(15, 1042740954, 57577587, 'What\'s Up...'),
(16, 57577587, 1042740954, 'Hey... What\'s Up'),
(17, 57577587, 1042740954, 'Welcome...'),
(18, 1042740954, 57577587, 'Welcome, to NEXUS-CHAT'),
(19, 57577587, 1042740954, 'Hello, Good evening... Bro'),
(20, 57577587, 1042740954, 'What\'s Up'),
(21, 57577587, 1042740954, 'How u doing...'),
(22, 1042740954, 57577587, 'Hey, Bro'),
(23, 1042740954, 57577587, 'What\'s Up...'),
(24, 1042740954, 57577587, 'Good Evening...'),
(25, 57577587, 1042740954, 'Hey, Bro...'),
(26, 57577587, 1042740954, 'What\'s Up...'),
(27, 1042740954, 57577587, 'Hey, How u doing...'),
(28, 57577587, 1042740954, 'Fine, What about u???'),
(29, 1042740954, 57577587, 'Fine...'),
(30, 57577587, 1042740954, '#Welcome to, NEXUS-CHAT\'s...'),
(31, 1042740954, 57577587, 'Thank You...'),
(32, 57577587, 1042740954, 'Your, Welcome...');

-- --------------------------------------------------------

--
-- Table structure for table `nexus_user`
--

CREATE TABLE `nexus_user` (
  `USER_ID` int(11) NOT NULL,
  `UNIQUE_ID` int(200) NOT NULL,
  `USER_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `JOB` varchar(255) NOT NULL,
  `PROFILE` varchar(255) NOT NULL,
  `STATUS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nexus_user`
--

INSERT INTO `nexus_user` (`USER_ID`, `UNIQUE_ID`, `USER_NAME`, `EMAIL`, `PASSWORD`, `JOB`, `PROFILE`, `STATUS`) VALUES
(1, 1042740954, 'Neeku_2002', 'neeku_2002@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Web-Developer', 'WhatsApp Image 2023-05-09 at 19.42.25.jpg', 'Offline'),
(2, 57577587, 'Shourya_2010', 'shourya_2010@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'App-Developer', '2016-05-07 20.20.03-1.jpg', 'Offline'),
(3, 728451439, 'Emma_13', 'emma_13@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Software-Developer', 'PIC_THREE.PNG', 'Offline'),
(4, 523819128, 'Jennifer', 'jennifer_stone@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Web-Developer', 'PIC_FOUR.PNG', 'Offline'),
(5, 880281920, 'Jhon Deo', 'jhon_deo10@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'App-Developer', 'PIC_ONE.PNG', 'Offline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MSG_ID`);

--
-- Indexes for table `nexus_user`
--
ALTER TABLE `nexus_user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MSG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `nexus_user`
--
ALTER TABLE `nexus_user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
