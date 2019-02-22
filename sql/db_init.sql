CREATE DATABASE cars;
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);
INSERT INTO users (name, password) VALUE ('admin', '12345');
CREATE TABLE `cars`.`available_cars` ( `id` INT NOT NULL AUTO_INCREMENT ,
 `license_plate` VARCHAR(10) NOT NULL ,
  `brand` VARCHAR(30) NOT NULL ,
   `model` VARCHAR(30) NOT NULL ,
    `color` VARCHAR(30) NOT NULL ,
     `kilometers` INT(10) NOT NULL ,
      PRIMARY KEY (`id`));