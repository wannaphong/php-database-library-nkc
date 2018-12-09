CREATE TABLE `Students` ( 
    `StudentId` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Name` TEXT NOT NULL , 
    `Address` TEXT NOT NULL , 
    `DOB` DATE NOT NULL , 
    `Gender` TEXT NOT NULL , 
    `Phone` VARCHAR(10) NOT NULL
 );

CREATE TABLE `Librarian`( 
`LibrarianId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `IDcard` int NOT NULL,
 `username` text NOT NULL,
 `password` text NOT NULL,
 `Name` text NOT NULL,
 `Address` text,
 `status` text,
 `Phone` VARCHAR(10) NOT NULL,
 `Gender` text NOT NULL
 );

CREATE TABLE `Bookreturn` ( `ReturnId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`BorrowId` int references `Borrow`(`BorrowId`) ON UPDATE CASCADE ON DELETE CASCADE,
 `Date_of_Return` date NOT NULL,
`Fine` int
);

CREATE TABLE `Books` ( `BookId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `Namebooks` text NOT NULL,
 `Author` text NOT NULL,
 `category` text NOT NULL,
 `Publisher` text
 );

CREATE TABLE `Borrow` ( 
`BorrowId` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
`LibrarianId` int references `Librarian`(`LibrarianId`) ON UPDATE CASCADE ON DELETE RESTRICT,
`BookId` int references `Books`(`BookId`) ON UPDATE CASCADE ON DELETE CASCADE,
`StudentId` int REFERENCES `Students`(`StudentId`) ON UPDATE CASCADE ON DELETE CASCADE,
`Date_of_borrow` date NOT NULL,
`Deadlines` date NOT NULL
);

CREATE OR REPLACE VIEW student_not_return AS SELECT * FROM Borrow WHERE BorrowId NOT IN (SELECT BorrowId FROM Bookreturn);
