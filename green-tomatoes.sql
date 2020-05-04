-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2020 at 05:38 AM
-- Server version: 5.6.47-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `green-tomatoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `COTTAGE`
--

CREATE TABLE `COTTAGE` (
  `cottageID` int(10) NOT NULL,
  `lastStayDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `customerID` int(11) NOT NULL,
  `name` varchar(24) NOT NULL,
  `emailAddress` varchar(30) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` char(2) NOT NULL,
  `zip` int(5) NOT NULL,
  `checkedIn` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `LOGIN`
--

CREATE TABLE `LOGIN` (
  `emailAddress` varchar(30) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `RESERVATION`
--

CREATE TABLE `RESERVATION` (
  `reservationID` int(10) NOT NULL,
  `customerID` int(10) NOT NULL,
  `cottageID` int(10) NOT NULL,
  `transactionID` int(10) NOT NULL,
  `stayLogID` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `STAYLOG`
--

CREATE TABLE `STAYLOG` (
  `stayLogID` int(10) NOT NULL,
  `customerID` int(10) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TRANSACTIONINFO`
--

CREATE TABLE `TRANSACTIONINFO` (
  `transactionID` int(10) NOT NULL,
  `customerID` int(10) NOT NULL,
  `amountPaid` float(6,2) NOT NULL,
  `datePaid` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `COTTAGE`
--
ALTER TABLE `COTTAGE`
  ADD PRIMARY KEY (`cottageID`);

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `customerAK1` (`emailAddress`);

--
-- Indexes for table `LOGIN`
--
ALTER TABLE `LOGIN`
  ADD PRIMARY KEY (`emailAddress`);

--
-- Indexes for table `RESERVATION`
--
ALTER TABLE `RESERVATION`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `reservationFK` (`customerID`),
  ADD KEY `reservationFK2` (`transactionID`),
  ADD KEY `reservationFK3` (`cottageID`);

--
-- Indexes for table `STAYLOG`
--
ALTER TABLE `STAYLOG`
  ADD PRIMARY KEY (`stayLogID`);

--
-- Indexes for table `TRANSACTIONINFO`
--
ALTER TABLE `TRANSACTIONINFO`
  ADD PRIMARY KEY (`transactionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `COTTAGE`
--
ALTER TABLE `COTTAGE`
  MODIFY `cottageID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `RESERVATION`
--
ALTER TABLE `RESERVATION`
  MODIFY `reservationID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `STAYLOG`
--
ALTER TABLE `STAYLOG`
  MODIFY `stayLogID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `TRANSACTIONINFO`
--
ALTER TABLE `TRANSACTIONINFO`
  MODIFY `transactionID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
