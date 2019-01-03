-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2015 at 03:48 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `pkadmin` int(11) NOT NULL,
  `usern` varchar(255) NOT NULL,
  `passd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`pkadmin`, `usern`, `passd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `fkstaff` int(11) NOT NULL,
  `pkparking` int(11) NOT NULL,
  `cartype` varchar(255) NOT NULL,
  `carmodel` varchar(255) NOT NULL,
  `carplat` varchar(255) NOT NULL,
  `lot` varchar(255) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `days` varchar(255) NOT NULL,
  `fine` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `calc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`fkstaff`, `pkparking`, `cartype`, `carmodel`, `carplat`, `lot`, `date_from`, `date_to`, `days`, `fine`, `total`, `calc`) VALUES
(1, 21, 'Motorcycle', 'sad', 'asd', 'asd', '2015-12-07', '2015-12-10', '3', '', '50', 1),
(1, 23, 'MPV', 'dsad', 'sad', 'asd', '2015-12-08', '2015-12-10', '2', '', '125', 1),
(1, 24, 'MPV', 'dsad', 'sad', 'asdsa', '2015-12-06', '2015-12-10', '4', '', '125', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `fkadmin` int(11) NOT NULL,
  `pkstaff` int(11) NOT NULL,
  `usern` varchar(255) NOT NULL,
  `passd` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ic` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `tel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`fkadmin`, `pkstaff`, `usern`, `passd`, `name`, `ic`, `address`, `tel`) VALUES
(1, 1, 'admin', 'admin', 'Redzwan', '950630015653', 'ldmasl;mdsa;dm ', '4541');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`pkadmin`);

--
-- Indexes for table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`pkparking`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`pkstaff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `pkadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parking`
--
ALTER TABLE `parking`
  MODIFY `pkparking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `pkstaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
