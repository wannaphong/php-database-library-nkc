-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2018 at 04:55 PM
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

--
-- Dumping data for table `Bookreturn`
--

INSERT INTO `Bookreturn` (`ReturnId`, `BorrowId`, `Date_of_Return`, `Damages`) VALUES
(9, 1, '2018-12-06', 5),
(10, 2, '2018-12-06', 0),
(11, 3, '2018-12-06', 0),
(12, 5, '2018-12-06', 0),
(13, 6, '2018-12-06', 0),
(14, 7, '2018-12-06', 0),
(15, 8, '2018-12-06', 0),
(16, 9, '2018-12-06', 0),
(17, 4, '2018-12-06', 0),
(18, 0, '2018-12-06', 0),
(19, 11, '2018-12-06', 0),
(20, 12, '2018-12-06', 0),
(21, 10, '2018-12-06', 0),
(22, 14, '2018-12-06', 0),
(23, 15, '2018-12-06', 0),
(24, 16, '2018-12-06', 0),
(25, 17, '2018-12-06', 25);

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

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`BookId`, `Namebooks`, `Author`, `category`, `Publisher`) VALUES
(1, 'ระบบฐานข้อมูล (Database Systems) ฉบับปรับปรุงเพิ่มเติม', 'โอภาส เอี่ยมสิริวงศ์', 'คอมพิวเตอร์', 'ซีเอ็ดยูเคชั่น, บมจ.'),
(3, 'ยอดหญิงเซียนเครื่องหอม เล่ม 3', 'อวี่จิ่วฮวา', 'นิยาย', 'แจ่มใส'),
(6, 'คู่มือฝึกพูดภาษาอังกฤษ ฉบับง่ายที่สุด', 'Tom,jack & Susan', 'ตำรา', 'ADJ');

-- --------------------------------------------------------

--
-- Table structure for table `Borrow`
--

CREATE TABLE `Borrow` (
  `BorrowId` int(11) NOT NULL,
  `LibrarianId` int(11) DEFAULT NULL,
  `BookId` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `Date_of_borrow` date NOT NULL,
  `Deadlines` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Borrow`
--

INSERT INTO `Borrow` (`BorrowId`, `LibrarianId`, `BookId`, `StudentId`, `Date_of_borrow`, `Deadlines`) VALUES
(1, 1, 0, 3, '2018-12-04', '2018-12-05'),
(2, 1, 3, 3, '2018-12-06', '2018-12-11'),
(3, 1, 1, 3, '2018-12-06', '2018-12-11'),
(4, 1, 3, 3, '2018-12-06', '2018-12-11'),
(5, 1, 3, 3, '2018-12-06', '2018-12-11'),
(6, 1, 1, 3, '2018-12-06', '2018-12-11'),
(7, 1, 3, 1, '2018-12-06', '2018-12-11'),
(8, 1, 1, 1, '2018-12-06', '2018-12-11'),
(9, 1, 6, 3, '2018-12-06', '2018-12-11'),
(10, 1, 3, 3, '2018-12-06', '2018-12-11'),
(11, 1, 3, 2, '2018-12-06', '2018-12-11'),
(12, 1, 3, 2, '2018-12-06', '2018-12-11'),
(13, 1, 1, 1, '2018-12-06', '2018-12-11'),
(14, 1, 1, 2, '2018-12-06', '2018-12-11'),
(15, 1, 6, 2, '2018-12-06', '2018-12-11'),
(16, 1, 6, 2, '2018-12-06', '2018-12-11'),
(17, 1, 3, 2, '2018-10-15', '2018-12-01');

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
  `Address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Librarian`
--

INSERT INTO `Librarian` (`LibrarianId`, `IDcard`, `username`, `password`, `Name`, `Address`) VALUES
(1, '1319800229201', 'tontan', '1234', 'วรรณพงษ์ ภัททิยไพบูลย์', NULL);

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
(1, 'นายสมชาย   บุญมี', '112 หมู่7 ต.หนองกอมเกาะ\r\n อ.เมือง จ.หนองคาย 43000', '2002-09-18', 'ชาย', '0936145689'),
(2, 'วรรณพงษ์ ภัททิยไพบูลย์', '112', '1998-06-08', 'ชาย', '0630463926'),
(3, 'วรรณพงษ์ ภัททิยไพบูลย์', '112', '2018-12-19', 'ชาย', '0630463926'),
(4, '', '', '0000-00-00', '', '');

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
  ADD PRIMARY KEY (`ReturnId`);

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
  MODIFY `ReturnId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Borrow`
--
ALTER TABLE `Borrow`
  MODIFY `BorrowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `Librarian`
--
ALTER TABLE `Librarian`
  MODIFY `LibrarianId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
