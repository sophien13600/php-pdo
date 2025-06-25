CREATE DATABASE php_pdo;

USE php_pdo;

CREATE TABLE utilisateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30) UNIQUE,
    password VARCHAR(256),
    nom VARCHAR(30)
);

INSERT INTO utilisateurs (username, password, nom) VALUES
("Wick", "wick", "John Wick"),
("Dalton", "dalton", "Jack Dalton"),
("Maggio", "maggio", "Maggio Sophie");

SELECT * FROM utilisateurs;CREATE DATABASE php_pdo;

use php_pdo;

CREATE TABLE utilisateurs (
    id int PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30) UNIQUE,
    password VARCHAR(256) UNIQUE,
    nom VARCHAR(30) ,
);

INSERT INTO utilisateurs(username, password, nom) VALUES
("Wick", "wick", "John Wick"),
("Dalton", "dalton", "Jack Dalton"),
("Maggio", "maggio", "Maggio Sophie"),

SELECT * FROM utilisateurs;