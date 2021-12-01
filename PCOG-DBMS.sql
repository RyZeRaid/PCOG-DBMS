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
    `age` INT(3),
    `gender` VARCHAR(8) NOT NULL ,
    `position` VARCHAR(255) NOT NULL ,
    `home_address` VARCHAR(255) NOT NULL ,
    `email` VARCHAR(50) NOT NULL ,
    `phonenumber` BIGINT(50),
    `date_of_birth` DATE NOT NULL ,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8;

INSERT INTO `member` VALUES(0,'testfirstname', 'testlastname', 20, 'Male', 'member', '8 myadress avenue kingston 10 St. andrew','myemail.address@gmail.com', 87682384521, DATE('2001-03-20')),
(1,'Khan', 'Yunis',20, 'Male', 'member', '8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com', 87682384521, DATE('2001-03-20')),
(2,'Kyle', 'Pottinger',20, 'Male','member', '8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87696754521, DATE('2001-03-20')),
(3,'Ajani', 'Lewise',20, 'Male', 'member', '8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87609094521, DATE('2001-03-20')),
(4,'Onandi', 'Skeen',20, 'Male', 'member','8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87607074521,DATE('2001-03-20')),
(5,'Jamaal', 'Henry',20, 'Male', 'member','8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87667454521, DATE('2001-03-20')),
(6,'Nikaylia', 'Gayle',20, 'Female',  'member', '8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87655794521, DATE('2001-03-20')),
(7,'Sudhish', 'Sepaul',20, 'Male', 'memebr', '8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87688644521, DATE('2001-03-20')),
(8,'Carl', 'Heron',20, 'Male', 'member','8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87680968521, DATE('2001-03-20')),
(9,'Chris', 'Green',20, 'Male', 'member', '8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',8769278521, DATE('2001-03-20')),
(10,'Anthony', 'James',20, 'Male', 'member', '8 myadress avenue kingston 10 St. andrew','myemail.address@gmail.com',87643814521, DATE('2001-03-20')),
(11,'Angela', 'James',20, 'Female', 'member', '8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87676214521, DATE('2001-03-20')),
(12,'Ryan', 'Ebanks',20, 'Male', 'member','8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87676494521, DATE('2001-03-20')),
(13,'Jet', 'Blevins',20, 'Male', 'member','8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87612424521, DATE('2001-03-20')),
(14,'Ramon', 'Cheesom',20, 'Male', 'member', '8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87688764921, DATE('2001-03-20')),
(15,'Quintin', 'Wu',20, 'Male', 'member', '8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87656729521,DATE('2001-03-20')),
(16,'Joshua', 'Dixon',20, 'Male', 'member','8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87632144521, DATE('2001-03-20')),
(17,'UI', 'Lewise',20, 'female', 'member','8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',87667894221, DATE('2001-03-20')),
(18,'Carl-Christopher', 'Blane',20, 'Male', 'member', '8 myadress avenue kingston 10 St. catherine', 'myemail.address@gmail.com',87687592521,DATE('2001-03-20')),
(19,'Sydeon', 'Brown',20, 'Female', 'member', '8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',8768749521, DATE('2001-03-20')),
(20,'Sarah', 'Allen',20, 'Female', 'member', '8 myadress avenue kingston 10 St. andrew', 'myemail.address@gmail.com',8768749521, DATE('2001-03-20'));

DROP TABLE IF EXISTS `priority1`;
CREATE TABLE `priority1` (
    `id` INT(11) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL ,
    `lasttname` VARCHAR(255) NOT NULL ,
    `position` VARCHAR(50) NOT NULL ,
    `priority` INT(11) NOT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `priority1` VALUES(0,'testfirstname', 'testlastname', 'member', 0),
(1,'Khan', 'Yunis', 'member', 0),
(2,'Kyle', 'Pottinger', 'member', 0),
(3,'Ajani', 'Lewise', 'member', 0),
(4,'Onandi', 'Skeen', 'member', 0),
(5,'Jamaal', 'Henry', 'member', 0),
(6,'Nikaylia', 'Gayle', 'member', 0),
(7,'Sudhish', 'Sepaul', 'memebr', 0),
(8,'Carl', 'Heron', 'member', 0),
(9,'Chris', 'Green', 'member', 0),
(10,'Anthony', 'James', 'member', 0),
(11,'Angela', 'James', 'member', 0),
(12,'Ryan', 'Ebanks', 'member', 0),
(13,'Jet', 'Blevins', 'member', 0),
(14,'Ramon', 'Cheesom', 'member', 0),
(15,'Quintin', 'Wu', 'member', 0),
(16,'Joshua', 'Dixon', 'member', 0),
(17,'UI', 'Lewise', 'member', 0),
(18,'Carl-Christopher', 'Blane', 'member', 0),
(19,'Sydeon', 'Brown', 'member', 0),
(20,'Sarah', 'Allen', 'member', 0);

DROP TABLE IF EXISTS `attendeelist`;
CREATE TABLE `confirmed` (
    `id` INT(11) NOT NULL,
    `firstname` VARCHAR(255) NOT NULL ,
    `lasttname` VARCHAR(255) NOT NULL ,
    `position` VARCHAR(50) NOT NULL ,
    `priority` INT(11) NOT NULL,
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