-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2018 at 09:46 PM
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
-- Table structure for table `Bookreturn`
--

CREATE TABLE `Bookreturn` (
  `ReturnId` int(11) NOT NULL,
  `BorrowId` int(11) NOT NULL,
  `Date_of_Return` date NOT NULL,
  `Damages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `LibrarianId` int(11) DEFAULT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `Date_of_borrow` date NOT NULL,
  `Deadlines` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Librarian`
--

CREATE TABLE `Librarian` (
  `LibrarianId` int(11) NOT NULL,
  `IDcard` varchar(13) NOT NULL,
  `username` varchar(90) NOT NULL,
  `password` text NOT NULL,
  `Name` text NOT NULL,
  `Address` text,
  `status` varchar(5) NOT NULL
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

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_not_return`
-- (See below for the actual view)
--
CREATE TABLE `student_not_return` (
`BorrowId` int(11)
,`LibrarianId` int(11)
,`BookId` int(11)
,`StudentId` int(11)
,`Date_of_borrow` date
,`Deadlines` date
);

-- --------------------------------------------------------

--
-- Structure for view `student_not_return`
--
DROP TABLE IF EXISTS `student_not_return`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_not_return`  AS  select `Borrow`.`BorrowId` AS `BorrowId`,`Borrow`.`LibrarianId` AS `LibrarianId`,`Borrow`.`BookId` AS `BookId`,`Borrow`.`StudentId` AS `StudentId`,`Borrow`.`Date_of_borrow` AS `Date_of_borrow`,`Borrow`.`Deadlines` AS `Deadlines` from `Borrow` where (not(`Borrow`.`BorrowId` in (select `Bookreturn`.`BorrowId` from `Bookreturn`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bookreturn`
--
ALTER TABLE `Bookreturn`
  ADD PRIMARY KEY (`ReturnId`),
  ADD KEY `BorrowId` (`BorrowId`);

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `Borrow`
--
ALTER TABLE `Borrow`
  ADD PRIMARY KEY (`BorrowId`),
  ADD KEY `StudentId` (`StudentId`),
  ADD KEY `BookId` (`BookId`);

--
-- Indexes for table `Librarian`
--
ALTER TABLE `Librarian`
  ADD PRIMARY KEY (`LibrarianId`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bookreturn`
--
ALTER TABLE `Bookreturn`
  MODIFY `ReturnId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Borrow`
--
ALTER TABLE `Borrow`
  MODIFY `BorrowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Librarian`
--
ALTER TABLE `Librarian`
  MODIFY `LibrarianId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Bookreturn`
--
ALTER TABLE `Bookreturn`
  ADD CONSTRAINT `BorrowId` FOREIGN KEY (`BorrowId`) REFERENCES `Borrow` (`BorrowId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Borrow`
--
ALTER TABLE `Borrow`
  ADD CONSTRAINT `BookId` FOREIGN KEY (`BookId`) REFERENCES `Books` (`BookId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `StudentId` FOREIGN KEY (`StudentId`) REFERENCES `Students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
