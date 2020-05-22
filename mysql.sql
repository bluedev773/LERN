-- create database
CREATE DATABASE [IF NOT EXISTS] tma2_part2;

-- create accounts table to facilitate login

CREATE TABLE IF NOT EXISTS accounts (
    ID int NOT NULL AUTO_INCREMENT,
    UserName varchar(255) NOT NULL,
    Password varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    PRIMARY KEY (ID)
);

--create tables to hold xml information

CREATE TABLE IF NOT EXISTS Course (
    CourseID INT NOT NULL,
    CourseName VARCHAR(50) NOT NULL,
    CourseDescription VARCHAR(255) NOT NULL,
    PRIMARY KEY (CourseID),
);


CREATE TABLE IF NOT EXISTS Assignment (
    AssignmentID INT NOT NULL,
    CourseID INT NOT NULL,
    CourseDescription VARCHAR(255) NOT NULL,
    PRIMARY KEY (AssignmentID),
    FOREIGN KEY (CourseID) REFERENCES course(CourseID)
);