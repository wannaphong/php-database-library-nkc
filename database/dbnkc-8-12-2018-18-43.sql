-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2018 at 06:43 PM
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
  `Fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Bookreturn`
--

INSERT INTO `Bookreturn` (`ReturnId`, `BorrowId`, `Date_of_Return`, `Fine`) VALUES
(78526, 21313, '2018-12-07', 0),
(78536, 21456, '2018-12-07', 10),
(78542, 21897, '2018-12-07', 5);

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
(21313, 'แมงและแมลง', 'สตรีฟ พาร์กเกอร์', 'วิทยาศาสตร์', 'แพรวเยาวชน'),
(21456, 'สปีคอิงลิชนอกตำรา', 'นายทีมมี่ เวเลอร์', 'ภาษาศาสตร์', 'Get English'),
(21897, 'ผ่านฉลุย ตะลุย CU-TEP', 'วันวิชิต บูรณะสิทธิพร', 'ภาษาศาสตร์', 'ฟรีมายด์ พับลิชชิ่ง');

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

--
-- Dumping data for table `Borrow`
--

INSERT INTO `Borrow` (`BorrowId`, `LibrarianId`, `BookId`, `StudentId`, `Date_of_borrow`, `Deadlines`) VALUES
(21313, 234324, 21313, 36236, '2018-11-07', '2018-11-12'),
(21456, 234325, 21456, 36237, '2018-11-09', '2018-11-14'),
(21897, 234326, 21897, 36238, '2018-11-12', '2018-11-17'),
(21910, 234326, 21897, 36238, '2018-12-07', '2018-12-12');

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
  `status` varchar(5) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Librarian`
--

INSERT INTO `Librarian` (`LibrarianId`, `IDcard`, `username`, `password`, `Name`, `Address`, `status`, `Phone`, `Gender`) VALUES
(234324, '3414123124435', 'boonmee', '4895612', 'นางบุญมี  สีสหาย', '64/6 หมู่3 ต.หนองกอมเกาะ อ.เมือง จ.หนองคาย', 'admin', '0933641459', 'หญิง'),
(234325, '3418523145689', 'somchai', '1895466', 'นายสมชาย  แก้วชัย', '87/8 หมู่ 2 ต.หนองกอมเกาะ อ.เมือง จ.หนองคาย', 'user', '0894567894', 'ชาย'),
(234326, '3438587152696', 'sirintha', '2564894', 'นางสิรินทรา  ทองดี', '45/6 หมู่6 ต.หนองกอมเกาะ อ.เมือง จ.หนองคาย', 'user', '0874515562', 'หญิง');

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
(36236, 'นายสมชาย  บุญมี', '112 หมู่7 ต.หนองกอมเกาะ อ.เมือง จ.หนองคาย 43000', '2002-09-18', 'ชาย', '0936145689'),
(36237, 'นายสหาย  มีใจ', '78 หมู่5 ต.บ้านแจ้ง อ.เมือง จ.หนองคาย 43000', '2002-05-09', 'ชาย', '0854562578'),
(36238, 'นายสมดี   สีมา', '56 หมู่3 ต.หนองถิ่น อ.เมือง จ.หนองคาย 43000', '2018-06-07', 'ชาย', '0892654178');

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
  ADD KEY `BookId` (`BookId`),
  ADD KEY `LibrarianId` (`LibrarianId`);

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
  MODIFY `ReturnId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78543;
--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21898;
--
-- AUTO_INCREMENT for table `Borrow`
--
ALTER TABLE `Borrow`
  MODIFY `BorrowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21911;
--
-- AUTO_INCREMENT for table `Librarian`
--
ALTER TABLE `Librarian`
  MODIFY `LibrarianId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234327;
--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36239;
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
  ADD CONSTRAINT `LibrarianId` FOREIGN KEY (`LibrarianId`) REFERENCES `Librarian` (`LibrarianId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `StudentId` FOREIGN KEY (`StudentId`) REFERENCES `Students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
