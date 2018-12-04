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

CREATE TABLE `Return` ( `ReturnId` int(11) NOT NULL AUTO_INCREMENT,
 `Date_of_borrow` date NOT NULL,
 `Date_of_Return` date NOT NULL,
 PRIMARY KEY (`ReturnId`) 
);

CREATE TABLE `Books` ( `BookId` int(11) NOT NULL AUTO_INCREMENT,
 `Namebooks` text NOT NULL,
 `Author` text NOT NULL,
 `category` text NOT NULL,
 `Publisher` text,
 PRIMARY KEY (`BookId`)
 );

CREATE TABLE `Detail`(
`DetailID` int(11) NOT NULL AUTO_INCREMENT,
`BorrowId` int NOT NULL,
`BookId` int NOT NULL,
 PRIMARY KEY (`DetailID`),
FOREIGN KEY (`BorrowId`) REFERENCES Borrow(`BorrowId`)
);


CREATE TABLE `Borrow` ( 
`BorrowId` int NOT NULL AUTO_INCREMENT,
`ReturnId` int(11) references `Return`(`ReturnId`),
`LibrarianId` int references `Librarian`(`LibrarianId`),
`StudentId` int REFERENCES `Students`(`StudentId`) ON UPDATE CASCADE ON DELETE RESTRICT,
`Date_of_borrow` date NOT NULL,
PRIMARY KEY (`BorrowId`)
);
