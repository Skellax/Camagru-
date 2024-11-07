-- Creation BDD

CREATE DATABASE IF NOT EXISTS `camagru`;
USE `camagru`;

-- CREATE table users 

CREATE TABLE IF NOT EXISTS `users` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(64) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `token` varchar(255) NOT NULL,
    `isValid` BOOLEAN NOT NULL,
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;