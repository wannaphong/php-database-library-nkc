CREATE TABLE `Students` ( 
    `id` INT(11) NOT NULL AUTO_INCREMENT , 
    `Name` TEXT NOT NULL , 
    `Address` TEXT NOT NULL , 
    `DOB` DATE NOT NULL , 
    `Gender` TEXT NOT NULL , 
    `Phone` VARCHAR(10) NOT NULL , 
    PRIMARY KEY (`id`));

CREATE TABLE `Librarian`( 
`LibrarianId` int(11) NOT NULL AUTO_INCREMENT,
 `IDcard` int NOT NULL,
 `username` text NOT NULL,
 `password` text NOT NULL,
 `Name` text NOT NULL,
 `Address` text, 
 PRIMARY KEY (`LibrarianId`)
 );

CREATE TABLE `Bookreturn` ( `ReturnId` int(11) NOT NULL AUTO_INCREMENT,
`BorrowId` int references `Borrow`(`BorrowId`) ON UPDATE CASCADE ON DELETE CASCADE,
 `Date_of_Return` date NOT NULL,
`Damages` int,
 PRIMARY KEY (`ReturnId`) 
);

CREATE TABLE `Books` ( `BookId` int(11) NOT NULL AUTO_INCREMENT,
 `Namebooks` text NOT NULL,
 `Author` text NOT NULL,
 `category` text NOT NULL,
 `Publisher` text,
 PRIMARY KEY (`BookId`)
 );

CREATE TABLE `Borrow` ( 
`BorrowId` int NOT NULL AUTO_INCREMENT,
`LibrarianId` int references `Librarian`(`LibrarianId`) ON UPDATE CASCADE ON DELETE RESTRICT,
`BookId` int references `Books`(`BookId`) ON UPDATE CASCADE ON DELETE CASCADE,
`StudentId` int REFERENCES `Students`(`StudentId`) ON UPDATE CASCADE ON DELETE CASCADE,
`Date_of_borrow` date NOT NULL,
`Deadlines` date NOT NULL,
PRIMARY KEY (`BorrowId`)
);
