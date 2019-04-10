-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2019 at 06:02 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forensic`
--

-- --------------------------------------------------------

--
-- Table structure for table `membership_grouppermissions`
--

CREATE TABLE `membership_grouppermissions` (
  `permissionID` int(10) UNSIGNED NOT NULL,
  `groupID` int(10) UNSIGNED DEFAULT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) NOT NULL DEFAULT '0',
  `allowView` tinyint(4) NOT NULL DEFAULT '0',
  `allowEdit` tinyint(4) NOT NULL DEFAULT '0',
  `allowDelete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_grouppermissions`
--

INSERT INTO `membership_grouppermissions` (`permissionID`, `groupID`, `tableName`, `allowInsert`, `allowView`, `allowEdit`, `allowDelete`) VALUES
(1, 2, 'users', 1, 3, 3, 3),
(2, 3, 'users', 0, 0, 0, 0),
(10, 2, 'Possible_Attacks', 1, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `membership_groups`
--

CREATE TABLE `membership_groups` (
  `groupID` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `allowSignup` tinyint(4) DEFAULT NULL,
  `needsApproval` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_groups`
--

INSERT INTO `membership_groups` (`groupID`, `name`, `description`, `allowSignup`, `needsApproval`) VALUES
(1, 'anonymous', 'Anonymous group created automatically on 2019-04-07', 0, 0),
(2, 'Admins', 'Admin group created automatically on 2019-04-07', 0, 1),
(3, 'Testers', 'testers geoup', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_userpermissions`
--

CREATE TABLE `membership_userpermissions` (
  `permissionID` int(10) UNSIGNED NOT NULL,
  `memberID` varchar(100) NOT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `allowInsert` tinyint(4) NOT NULL DEFAULT '0',
  `allowView` tinyint(4) NOT NULL DEFAULT '0',
  `allowEdit` tinyint(4) NOT NULL DEFAULT '0',
  `allowDelete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_userpermissions`
--

INSERT INTO `membership_userpermissions` (`permissionID`, `memberID`, `tableName`, `allowInsert`, `allowView`, `allowEdit`, `allowDelete`) VALUES
(1, 'jack', 'users', 1, 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_userrecords`
--

CREATE TABLE `membership_userrecords` (
  `recID` bigint(20) UNSIGNED NOT NULL,
  `tableName` varchar(100) DEFAULT NULL,
  `pkValue` varchar(255) DEFAULT NULL,
  `memberID` varchar(100) DEFAULT NULL,
  `dateAdded` bigint(20) UNSIGNED DEFAULT NULL,
  `dateUpdated` bigint(20) UNSIGNED DEFAULT NULL,
  `groupID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_userrecords`
--

INSERT INTO `membership_userrecords` (`recID`, `tableName`, `pkValue`, `memberID`, `dateAdded`, `dateUpdated`, `groupID`) VALUES
(1, 'users', '1', 'admin', 1554626343, 1554626343, 2),
(2, 'Possible_Attacks', '1', 'admin', 1554647635, 1554647733, 2);

-- --------------------------------------------------------

--
-- Table structure for table `membership_users`
--

CREATE TABLE `membership_users` (
  `memberID` varchar(100) NOT NULL,
  `passMD5` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `signupDate` date DEFAULT NULL,
  `groupID` int(10) UNSIGNED DEFAULT NULL,
  `isBanned` tinyint(4) DEFAULT NULL,
  `isApproved` tinyint(4) DEFAULT NULL,
  `custom1` text,
  `custom2` text,
  `custom3` text,
  `custom4` text,
  `comments` text,
  `pass_reset_key` varchar(100) DEFAULT NULL,
  `pass_reset_expiry` int(10) UNSIGNED DEFAULT NULL,
  `flags` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_users`
--

INSERT INTO `membership_users` (`memberID`, `passMD5`, `email`, `signupDate`, `groupID`, `isBanned`, `isApproved`, `custom1`, `custom2`, `custom3`, `custom4`, `comments`, `pass_reset_key`, `pass_reset_expiry`, `flags`) VALUES
('admin', '$2y$10$N8ok/BxpRuB7FBRzeYj1TuZv5jCqEOszPGGiBeTCR2GE/Z5CxVyru', 'jaymoorestah@gmail.com', '2019-04-07', 2, 0, 1, NULL, NULL, NULL, NULL, 'Admin member created automatically on 2019-04-07\nRecord updated automatically on 2019-04-07', NULL, NULL, NULL),
('guest', NULL, NULL, '2019-04-07', 1, 0, 1, NULL, NULL, NULL, NULL, 'Anonymous member created automatically on 2019-04-07', NULL, NULL, NULL),
('jack', '$2y$10$WapQ11EUPtNR.JEHsmjT6uPLxKIfKibvgR75kKHBKDKZRHRLeALE2', 'jack@gmail.com', '2019-04-07', 3, 0, 1, 'Jack', 'Thika, Thika', 'Nairobi', 'kiambu', 'member signed up through the registration form.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membership_usersessions`
--

CREATE TABLE `membership_usersessions` (
  `memberID` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `agent` varchar(100) NOT NULL,
  `expiry_ts` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `possible_attacks`
--

CREATE TABLE `possible_attacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `possible_attacks`
--

INSERT INTO `possible_attacks` (`id`, `title`, `description`) VALUES
(1, 'sql injection', '<font color=\"#000033\">try limiting the access level for the uploads</font>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `country`) VALUES
(1, 'james mutahi', 'jaymoorestah@gmail.com', 'Thika, Thika', 'Kenya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  ADD PRIMARY KEY (`permissionID`),
  ADD UNIQUE KEY `groupID_tableName` (`groupID`,`tableName`);

--
-- Indexes for table `membership_groups`
--
ALTER TABLE `membership_groups`
  ADD PRIMARY KEY (`groupID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `membership_userpermissions`
--
ALTER TABLE `membership_userpermissions`
  ADD PRIMARY KEY (`permissionID`),
  ADD UNIQUE KEY `memberID_tableName` (`memberID`,`tableName`);

--
-- Indexes for table `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  ADD PRIMARY KEY (`recID`),
  ADD UNIQUE KEY `tableName_pkValue` (`tableName`,`pkValue`(150)),
  ADD KEY `pkValue` (`pkValue`),
  ADD KEY `tableName` (`tableName`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `membership_users`
--
ALTER TABLE `membership_users`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `membership_usersessions`
--
ALTER TABLE `membership_usersessions`
  ADD UNIQUE KEY `memberID_token_agent` (`memberID`,`token`,`agent`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `expiry_ts` (`expiry_ts`);

--
-- Indexes for table `possible_attacks`
--
ALTER TABLE `possible_attacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `membership_grouppermissions`
--
ALTER TABLE `membership_grouppermissions`
  MODIFY `permissionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `membership_groups`
--
ALTER TABLE `membership_groups`
  MODIFY `groupID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `membership_userpermissions`
--
ALTER TABLE `membership_userpermissions`
  MODIFY `permissionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `membership_userrecords`
--
ALTER TABLE `membership_userrecords`
  MODIFY `recID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `possible_attacks`
--
ALTER TABLE `possible_attacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
