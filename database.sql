create database aics;

use aics;

CREATE TABLE `tbl_book` (
  `id` int(11) NOT NULL auto_increment,
  `bookTitle` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Publisher` varchar(100) NOT NULL,
  `yearPublished` int(4) NOT NULL,
  PRIMARY KEY  (`id`)
);