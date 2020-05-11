-- create database
CREATE DATABASE [IF NOT EXISTS] tma2_part2;

-- create accounts table to facilitate login

CREATE TABLE accounts (
    ID int NOT NULL AUTO_INCREMENT,
    UserName varchar(255) NOT NULL,
    Password varchar(255) NOT NULL,
    Email varchar(255) NOT NULL,
    PRIMARY KEY (ID)
);