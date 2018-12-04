-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 04:46 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `microfinance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(30) NOT NULL,
  `Sex` char(1) NOT NULL,
  `Phn_no` int(13) NOT NULL,
  `AdminID` int(11) NOT NULL,
  `Password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Sex`, `Phn_no`, `AdminID`, `Password`) VALUES
('admin', 'M', 1950958001, 1, 12345);

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `NID` int(25) NOT NULL,
  `Asset` varchar(100) NOT NULL,
  `TypesofBusiness` varchar(25) NOT NULL,
  `LoanType` varchar(10) NOT NULL,
  `Amount` int(11) NOT NULL,
  `LoanID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`NID`, `Asset`, `TypesofBusiness`, `LoanType`, `Amount`, `LoanID`) VALUES
(2587899, 'Cricketer', 'Bat', 'Dabi', 100000, 1000000002),
(755775, 'House and A pond', 'Fish Firm', 'Dabi', 100000, 1000000003),
(852741, 'Has a lot of Money', 'Web Developer', 'Progoti', 0, 2000000001);

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `LoanID` int(10) NOT NULL,
  `LoanDate` date NOT NULL,
  `LoanLength` int(3) NOT NULL,
  `Interest` float NOT NULL,
  `Creditpoint` int(5) NOT NULL,
  `AdminID` int(11) NOT NULL,
  `TypeID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`LoanID`, `LoanDate`, `LoanLength`, `Interest`, `Creditpoint`, `AdminID`, `TypeID`) VALUES
(1000000002, '2018-11-28', 1, 15, 3, 1, 1),
(1000000003, '2018-12-01', 2, 25, 0, 1, 1),
(2000000001, '2018-11-28', 1, 15, 6, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `loan type`
--

CREATE TABLE `loan type` (
  `Type ID` int(1) NOT NULL,
  `Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan type`
--

INSERT INTO `loan type` (`Type ID`, `Type`) VALUES
(1, 'Dabi'),
(2, 'Pragati');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `LoanID` int(10) NOT NULL,
  `Amount` int(8) NOT NULL,
  `Date` date NOT NULL,
  `PID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`LoanID`, `Amount`, `Date`, `PID`) VALUES
(2000000001, 10, '2018-11-28', 1),
(1000000002, 1000, '2018-11-12', 2),
(2000000001, 2000, '2018-12-01', 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `FName` varchar(10) NOT NULL,
  `LName` varchar(10) NOT NULL,
  `Sex` char(1) NOT NULL,
  `Phn_no` int(13) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `E_mail` varchar(20) NOT NULL,
  `NID` int(25) NOT NULL,
  `Password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`FName`, `LName`, `Sex`, `Phn_no`, `Address`, `E_mail`, `NID`, `Password`) VALUES
('Shakib Al ', 'Hasan', 'M', 2147483647, 'Norail', 'shakib.al@gmail.com', 755775, 577),
('admin', 'Islam', 'M', 2147483647, '144East Jurain', 'nnahid878@gmail.com', 852741, 125),
('Moyinul', 'Islam', 'M', 1756758975, '1452', 'ngfhr@gmail.com', 2587411, 1445),
('Rubel', 'Hossain', 'M', 1950958002, '144East Jurain', 'rubel@gmail.com', 2587899, 321),
('Sabina', 'Alam', 'F', 1958034975, '1452', 'ngkjhr@gmail.com', 6285525, 145),
('Mushfiq', 'Islam', 'M', 1950958001, '144', 'nnahid878@gmail.com', 2147483647, 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`LoanID`),
  ADD KEY `NID` (`NID`);

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`LoanID`),
  ADD KEY `TypeID` (`TypeID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `loan type`
--
ALTER TABLE `loan type`
  ADD PRIMARY KEY (`Type ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `LoanID` (`LoanID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`NID`) REFERENCES `user` (`NID`) ON UPDATE CASCADE;

--
-- Constraints for table `borrower`
--
ALTER TABLE `borrower`
  ADD CONSTRAINT `borrower_ibfk_1` FOREIGN KEY (`LoanID`) REFERENCES `applicant` (`LoanID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `borrower_ibfk_2` FOREIGN KEY (`TypeID`) REFERENCES `loan type` (`Type ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `borrower_ibfk_3` FOREIGN KEY (`AdminID`) REFERENCES `admin` (`AdminID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`LoanID`) REFERENCES `borrower` (`LoanID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
