-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2017 at 06:16 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_listings`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_list`
--

CREATE TABLE `home_list` (
  `LIST_ID` int(11) NOT NULL,
  `LIST_STREET` varchar(32) NOT NULL,
  `LIST_CITY` varchar(32) NOT NULL,
  `LIST_STATE` varchar(2) NOT NULL,
  `LIST_ZIP` int(11) NOT NULL,
  `TYPE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `home_type`
--

CREATE TABLE `home_type` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE_NAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_type`
--

INSERT INTO `home_type` (`TYPE_ID`, `TYPE_NAME`) VALUES
(4, 'Apartment'),
(5, 'House'),
(6, 'Trailer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_list`
--
ALTER TABLE `home_list`
  ADD PRIMARY KEY (`LIST_ID`),
  ADD KEY `FK_TYPE_ID` (`TYPE_ID`);

--
-- Indexes for table `home_type`
--
ALTER TABLE `home_type`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_list`
--
ALTER TABLE `home_list`
  MODIFY `LIST_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `home_type`
--
ALTER TABLE `home_type`
  MODIFY `TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `home_list`
--
ALTER TABLE `home_list`
  ADD CONSTRAINT `FK_TYPE_ID` FOREIGN KEY (`TYPE_ID`) REFERENCES `home_type` (`TYPE_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
