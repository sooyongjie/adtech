-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 12:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billID` int(100) NOT NULL,
  `billDetails` varchar(100) NOT NULL,
  `paymentMethod` varchar(100) NOT NULL,
  `total` decimal(65,2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `reqID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `password`, `type`, `name`) VALUES
('1', 'poop', '1', 'Soo Yong Jie'),
('2', 'poop', '2', 'Project Manager'),
('3', 'poop', '3', 'Cork');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackNo` int(100) NOT NULL,
  `feedbackComment` varchar(100) NOT NULL,
  `feedbackRating` int(1) NOT NULL,
  `reqID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackNo`, `feedbackComment`, `feedbackRating`, `reqID`) VALUES
(10001, 'Doesn\'t smell like burnt plastic anymore', 5, 10001);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportNo` int(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `reqID` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `empID` int(100) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `dateOfCreation` datetime(6) NOT NULL,
  `dateOfCompletion` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`reqID`, `uid`, `empID`, `category`, `status`, `description`, `dateOfCreation`, `dateOfCompletion`) VALUES
(10001, 1, 3, 'Slowdown', 'Assigned', 'Slow like tortoise slow', '2020-10-12 13:17:06.000000', '0000-00-00 00:00:00.000000'),
(10002, 1, NULL, 'Epic', 'Pending', 'No', '2020-10-13 18:00:36.000000', NULL),
(10003, 1, NULL, 'General', 'Pending', 'Can\'t turn on', '2020-10-14 17:47:40.000000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `refNo` int(100) NOT NULL,
  `issueDate` date NOT NULL,
  `totalSalary` int(100) NOT NULL,
  `totalWorkingHours` time(6) NOT NULL,
  `totalOvertimeHours` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
