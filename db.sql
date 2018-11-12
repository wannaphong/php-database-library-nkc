CREATE TABLE database.`Students` ( 
    id INT(11) NOT NULL AUTO_INCREMENT , 
    Name TEXT NOT NULL , 
    Address TEXT NOT NULL , 
    DOB DATE NOT NULL , 
    Gender TEXT NOT NULL , 
    Phone VARCHAR(10) NOT NULL , 
    PRIMARY KEY (id));

CREATE TABLE `Librarian`( 
LibrarianId int(11) NOT NULL AUTO_INCREMENT,
 IDcard int NOT NULL,
 Name text NOT NULL,
 Address text, 
 PRIMARY KEY (LibrarianId)
 );

CREATE TABLE Borrow ( BorrowId int(11) NOT NULL AUTO_INCREMENT,
 Date_of_borrow date NOT NULL,
 Date_of_Return date NOT NULL,
 PRIMARY KEY (BorrowId) 
);

CREATE TABLE Books ( BookId int(11) NOT NULL AUTO_INCREMENT,
 Namebooks text NOT NULL,
 Author text NOT NULL,
 category text NOT NULL,
 Publisher text,
 PRIMARY KEY (BookId)
 );
 
CREATE TABLE Return ( ReturnId int(11) NOT NULL AUTO_INCREMENT,
BorrowId int,
LibrarianId int,
StudentId int,
Date_of_borrow date NOT NULL,
FOREIGN KEY (BorrowId) REFERENCES Borrow`(BorrowId`),
FOREIGN KEY (LibrarianId) REFERENCES Librarian`(LibrarianId`),
FOREIGN KEY (StudentId) REFERENCES Students`(StudentId`)
ON UPDATE CASCADE ON DELETE RESTRICT,
PRIMARY KEY (ReturnId)
);