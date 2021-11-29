DROP DATABASE IF EXISTS ChurchofGoddb;
CREATE DATABASE ChurchofGoddb;
USE ChurchofGoddb;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
    `id` INT unsigned AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL ,
    `password` VARCHAR(255) NOT NULL ,
    `date_created` DATETIME NOT NULL ,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

INSERT INTO `user` VALUES('id', 'testuserusername', 'password123', SYSDATE());

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
    `id` INT unsigned AUTO_INCREMENT,
    `firstname` VARCHAR(255) NOT NULL ,
    `lasttname` VARCHAR(255) NOT NULL ,
    `age` INT(3) NOT NULL ,
    `gender` VARCHAR(8) NOT NULL ,
    `position` VARCHAR(255) NOT NULL ,
    `home_address` VARCHAR(255) NOT NULL ,
    `email` VARCHAR(50) NOT NULL ,
    `phonenumber` INT(50) NOT NULL ,
    `date_of_birth` DATETIME NOT NULL ,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `priority1`;
CREATE TABLE `priority1` (
    `id` INT(11) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL ,
    `lasttname` VARCHAR(255) NOT NULL ,
    `position` VARCHAR(50) NOT NULL ,
    `priority` VARCHAR(12) NOT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `priority2`;
CREATE TABLE `priority2` (
    `id` INT(11) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL ,
    `lasttname` VARCHAR(255) NOT NULL ,
    `position` VARCHAR(50) NOT NULL ,
    `priority` VARCHAR(12) NOT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
    `id` INT(11) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL ,
    `lasttname` VARCHAR(255) NOT NULL ,
    `date` DATETIME NOT NULL ,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/* GRANT ALL PRIVILEGES ON user.* TO 'new_user'@'localhost'IDENTIFIED BY 'password123';*/
/* GRANT ALL PRIVILEGES ON churchofgoddb.* TO 'new_user'@'localhost'IDENTIFIED BY 'password123';*/