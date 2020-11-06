-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 06, 2020 at 03:54 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ZZe8GUsMe0`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billID` int(100) NOT NULL,
  `billDetails` varchar(100) NULL,
  `paymentMethod` varchar(100) NULL,
  `total` decimal(65,2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `reqID` int(100) NOT NULL,
  `url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billID`, `billDetails`, `paymentMethod`, `total`, `status`, `reqID`, `url`) VALUES
(1, 'ABC123', 'Bank Transfer', '80.00', 'Paid', 10004, 'receipt1.jpg'),
(2, NULL, NULL, '160.00', 'Pending', 10002, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` int(100) NOT NULL,
  `clientName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `clientName`, `password`, `status`) VALUES
(10001, 'sooyongjie', '351e229dc7063eee0a898d74b0a935d7', 1),
(10002, 'lilpimp', '351e229dc7063eee0a898d74b0a935d7', 1),
(10003, 'Alicia', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `password`, `type`, `empName`, `status`) VALUES
(80001, '351e229dc7063eee0a898d74b0a935d7', '1', 'Peter Lim', 1),
(80002, '351e229dc7063eee0a898d74b0a935d7', '2', 'Never Wong', 1),
(80003, '351e229dc7063eee0a898d74b0a935d7', '3', 'Hao Niu Bi', 1),
(80004, '351e229dc7063eee0a898d74b0a935d7', '3', 'Wong Fok Hing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackNo` int(100) NOT NULL,
  `feedbackComment` varchar(100) NOT NULL,
  `feedbackRating` int(1) NOT NULL,
  `date` date NOT NULL,
  `reqID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackNo`, `feedbackComment`, `feedbackRating`, `date`, `reqID`) VALUES
(1, 'Fast service', 5, '2020-11-06', 10004);

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id` int(100) NOT NULL,
  `empID` int(100) NOT NULL,
  `date` date NOT NULL,
  `hours` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id`, `empID`, `date`, `hours`) VALUES
(1, 80003, '2020-11-06', 1),
(2, 80004, '2020-11-07', 2);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportNo` int(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportNo`, `date`) VALUES
(1, '2020-11-06 13:45:12'),
(2, '2020-11-06 15:41:44'),
(3, '2020-11-06 15:42:22'),
(4, '2020-11-06 15:45:06'),
(5, '2020-11-06 15:45:37'),
(6, '2020-11-06 15:46:35'),
(7, '2020-11-06 15:48:16'),
(8, '2020-11-06 15:49:41'),
(9, '2020-11-06 15:49:53'),
(10, '2020-11-06 16:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `reqID` int(100) NOT NULL,
  `uid` int(100) DEFAULT NULL,
  `empID` int(100) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `dateOfCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateOfCompletion` datetime(6) DEFAULT NULL,
  `billID` int(100) DEFAULT NULL,
  `feedbackStatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`reqID`, `uid`, `empID`, `category`, `status`, `description`, `dateOfCompletion`, `billID`, `feedbackStatus`) VALUES
(10001, 10001, 80003, 'Hardware', 'Assigned', 'My son wants 32gb RAM for Fortnite', '2020-11-06 14:29:24.000000', NULL, NULL),
(10002, 10001, 80004, 'Software', 'Completed', 'Problem installing Fortnite 101', '2020-11-06 16:19:23.000000', NULL, NULL),
(10003, 10002, NULL, 'General', 'Pending', 'Cannot access my work folder', NULL, NULL, NULL),
(10004, 10003, 80004, 'Software', 'Paid', 'I can not open the software', '2020-11-06 14:13:57.000000', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billID`),
  ADD KEY `reqID` (`reqID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackNo`),
  ADD KEY `reqID` (`reqID`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id_fk_2` (`empID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportNo`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`reqID`),
  ADD KEY `bill_id_fk_1` (`billID`),
  ADD KEY `emp_id_fk_1` (`empID`),
  ADD KEY `client_id_fk_1` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `billID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80005;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackNo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportNo` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `reqID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`reqID`) REFERENCES `request` (`reqid`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`reqID`) REFERENCES `request` (`reqid`);

--
-- Constraints for table `overtime`
--
ALTER TABLE `overtime`
  ADD CONSTRAINT `emp_id_fk_2` FOREIGN KEY (`empID`) REFERENCES `employee` (`empid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `bill_id_fk_1` FOREIGN KEY (`billID`) REFERENCES `bill` (`billid`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `client_id_fk_1` FOREIGN KEY (`uid`) REFERENCES `client` (`clientid`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `emp_id_fk_1` FOREIGN KEY (`empID`) REFERENCES `employee` (`empid`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
