-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 12, 2018 at 09:58 PM
-- Server version: 10.1.23-MariaDB-9+deb9u1
-- PHP Version: 7.0.30-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbnkc`
--

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `BookId` int(11) NOT NULL,
  `Namebooks` text NOT NULL,
  `Author` text NOT NULL,
  `category` text NOT NULL,
  `Publisher` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Borrow`
--

CREATE TABLE `Borrow` (
  `BorrowId` int(11) NOT NULL,
  `ReturnId` int(11) DEFAULT NULL,
  `LibrarianId` int(11) DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `Date_of_borrow` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Detail`
--

CREATE TABLE `Detail` (
  `DetailID` int(11) NOT NULL,
  `BorrowId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Librarian`
--

CREATE TABLE `Librarian` (
  `LibrarianId` int(11) NOT NULL,
  `IDcard` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Return`
--

CREATE TABLE `Return` (
  `ReturnId` int(11) NOT NULL,
  `Date_of_borrow` date NOT NULL,
  `Date_of_Return` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE `Students` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Address` text NOT NULL,
  `DOB` date NOT NULL,
  `Gender` text NOT NULL,
  `Phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`id`, `Name`, `Address`, `DOB`, `Gender`, `Phone`) VALUES
(1, 'นายสมชาย   บุญมี', '112 หมู่7 ต.หนองกอมเกาะ\r\n อ.เมือง จ.หนองคาย 43000', '2002-09-18', 'ชาย', '0936145689');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `Borrow`
--
ALTER TABLE `Borrow`
  ADD PRIMARY KEY (`BorrowId`);

--
-- Indexes for table `Detail`
--
ALTER TABLE `Detail`
  ADD PRIMARY KEY (`DetailID`),
  ADD KEY `BorrowId` (`BorrowId`);

--
-- Indexes for table `Librarian`
--
ALTER TABLE `Librarian`
  ADD PRIMARY KEY (`LibrarianId`);

--
-- Indexes for table `Return`
--
ALTER TABLE `Return`
  ADD PRIMARY KEY (`ReturnId`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Borrow`
--
ALTER TABLE `Borrow`
  MODIFY `BorrowId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Detail`
--
ALTER TABLE `Detail`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Librarian`
--
ALTER TABLE `Librarian`
  MODIFY `LibrarianId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Return`
--
ALTER TABLE `Return`
  MODIFY `ReturnId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Detail`
--
ALTER TABLE `Detail`
  ADD CONSTRAINT `Detail_ibfk_1` FOREIGN KEY (`BorrowId`) REFERENCES `Borrow` (`BorrowId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
