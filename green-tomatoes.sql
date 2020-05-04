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

--
-- Dumping data for table `COTTAGE`
--

INSERT INTO `COTTAGE` (`cottageID`, `lastStayDate`) VALUES
(1, '1970-01-01'),
(2, '3000-02-01'),
(3, '2031-01-01'),
(4, '2021-12-01'),
(5, '2021-03-01');

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

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`customerID`, `name`, `emailAddress`, `phoneNumber`, `address`, `city`, `state`, `zip`, `checkedIn`) VALUES
(7, 'AAAAAAAAAA', '1234@test.test', '1234567890', '1234 Test Drive', 'Test', 'AZ', 72911, 0),
(5, 'test user', 'test4@test.com', '1234567891', '825 East O', 'Russellville', 'AR', 72801, 0),
(6, 'test usertwo', 'test5@test.com', '5015817997', '825 East O', 'Russellville', 'AR', 72801, 0),
(15, 'foo', 'foobar@email.com', '1231231231', '123123', 'Russelville', 'AR', 72801, 0),
(8, 'foobar', 'foo@bar.com', '1231231234', '12345', 'cit y', 'ar', 12345, 0),
(9, 'Random User', 'randomUser@randomemail.com', '1111111111', '111 Main St.', 'Russellville', 'AR', 72801, 0),
(14, 'jimbob', 'foobar@atu.edu', '4795555555', '123', 'farming city', 'ar', 72701, 0),
(11, 'asd', '123@123.com', '7777777777', '888 sdf sadfa', 'russellville', 'ar', 72801, 0),
(12, 'joseph', 'farmerjoe@email.com', '1231231234', 'addr', 'city', 'ar', 38273, 0),
(13, 'User', 'user@email.com', '1111111111', '111 Main St.', 'Russellville', 'AR', 72801, 0);

-- --------------------------------------------------------

--
-- Table structure for table `LOGIN`
--

CREATE TABLE `LOGIN` (
  `emailAddress` varchar(30) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LOGIN`
--

INSERT INTO `LOGIN` (`emailAddress`, `isAdmin`, `password`) VALUES
('test4@test.com', 0, 'test'),
('pmickey3@atu.edu', 0, 'paul'),
('foobar@atu.edu', 0, '123'),
('admin@admin.com', 1, 'admin1'),
('paul2@gmail.com', 0, 'paul2'),
('paul@mail.com', 0, 'paul'),
('paulmickey@paulmickey.com', 0, 'paul'),
('test5@test.com', 0, 'test'),
('1234@test.test', 0, '1234'),
('randomUser@randomemail.com', 0, 'test'),
('foobar@email.com', 0, 'asdf'),
('foo@bar.com', 0, 'baz'),
('josh.chrestman@yahoo.com', 0, 'test'),
('123@123.com', 0, '123'),
('farmerjoe@email.com', 0, 'asdf'),
('test101@atu.edu', 0, 'Mike01');

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

--
-- Dumping data for table `RESERVATION`
--

INSERT INTO `RESERVATION` (`reservationID`, `customerID`, `cottageID`, `transactionID`, `stayLogID`) VALUES
(1, 6, 5, 1, 1),
(10, 11, 5, 8, 10),
(8, 6, 1, 6, 8),
(6, 9, 1, 4, 6),
(11, 13, 4, 9, 11),
(12, 0, 1, 10, 12),
(18, 15, 1, 16, 18),
(17, 7, 1, 15, 17);

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

--
-- Dumping data for table `STAYLOG`
--

INSERT INTO `STAYLOG` (`stayLogID`, `customerID`, `startDate`, `endDate`) VALUES
(1, 6, '2020-04-27', '2020-05-27'),
(10, 11, '2020-08-20', '2020-09-20'),
(8, 6, '2021-01-25', '2021-01-27'),
(6, 9, '2020-11-02', '2020-11-03'),
(12, 0, '2020-05-28', '2020-06-28');

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
-- Dumping data for table `TRANSACTIONINFO`
--

INSERT INTO `TRANSACTIONINFO` (`transactionID`, `customerID`, `amountPaid`, `datePaid`) VALUES
(1, 6, 20.00, '2020-04-27'),
(6, 6, 20.00, '2020-04-28'),
(4, 9, 20.00, '2020-04-27'),
(8, 11, 20.00, '2020-04-30'),
(9, 13, 20.00, '2020-04-30'),
(10, 0, 20.00, '2020-04-30'),
(16, 15, 20.00, '2020-05-04'),
(15, 7, 20.00, '2020-05-02');

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
