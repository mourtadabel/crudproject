-- Ma base de donnée : 

CREATE DATABASE IF NOT EXISTS myapp;

USE myapp;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    UNIQUE KEY unique_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (name, email, password) VALUES 
('mourtada', 'mourtada@example.com', 'dfj32rFGZdfsf2j13djf'),
('Jack', 'jack@example.com', 'dfdl2Sfdfi4dgfeSE42ei');
