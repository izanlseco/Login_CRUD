CREATE DATABASE testing;
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);
INSERT INTO users (name, password) VALUE ('admin', '12345');
CREATE TABLE `available_cars` ( `license_plate` VARCHAR(10) NOT NULL ,
`brand` VARCHAR(100) NOT NULL ,
`model` VARCHAR(100) NOT NULL ,
`color` VARCHAR(50) NOT NULL ,
`kilometers` INT(10) NOT NULL ,
 PRIMARY KEY (`license_plate`))
