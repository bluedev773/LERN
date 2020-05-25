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

--create tables to hold xml file information

CREATE TABLE IF NOT EXISTS Course (
    CourseID INT NOT NULL,
    CourseName VARCHAR(50) NOT NULL,
    CourseDescription VARCHAR(255) NOT NULL,
    PRIMARY KEY (CourseID),
);


CREATE TABLE IF NOT EXISTS Assignment (
    AssignmentID INT NOT NULL,
    CourseID INT NOT NULL,
    AssignmentDescription VARCHAR(255) NOT NULL,
    PRIMARY KEY (AssignmentID),
    FOREIGN KEY (CourseID) REFERENCES course(CourseID)
);

CREATE TABLE IF NOT EXISTS Unit (
    UnitID INT NOT NULL,
    CourseID INT NOT NULL,
    UnitName VARCHAR(50) NOT NULL,
    UnitDescription VARCHAR(255),
    PRIMARY KEY (UnitID),
    FOREIGN KEY (CourseID) REFERENCES course(CourseID)
);

CREATE TABLE IF NOT EXISTS Lesson (
    LessonID INT NOT NULL,
    UnitID INT NOT NULL,
    LessonName VARCHAR(50) NOT NULL,
    Introduction VARCHAR(255),
    Objective VARCHAR(255),
    KeyTerm VARCHAR(255),
    Reading VARCHAR(255),
    PRIMARY KEY (LessonID),
    FOREIGN KEY (UnitID) REFERENCES unit(UnitID)
);

CREATE TABLE IF NOT EXISTS Quiz (
    QuizID INT NOT NULL,
    UnitID INT NOT NULL,
    QuizName VARCHAR(50) NOT NULL,
    PRIMARY KEY (QuizID),
    FOREIGN KEY (UnitID) REFERENCES unit(UnitID)
);

CREATE TABLE IF NOT EXISTS Question (
    QuestionID INT NOT NULL,
    QuizID INT NOT NULL,
    QuestionText VARCHAR(255) NOT NULL,
    PRIMARY KEY (QuestionID),
    FOREIGN KEY (QuizID) REFERENCES quiz(QuizID)
);

CREATE TABLE IF NOT EXISTS Answer (
    AnswerID INT NOT NULL,
    QuestionID INT NOT NULL,
    AnswerText VARCHAR(50) NOT NULL,
    AnswerCorrect VARCHAR(50) NOT NULL,
    PRIMARY KEY (AnswerID),
    FOREIGN KEY (QuestionID) REFERENCES Question(QuestionID)
)