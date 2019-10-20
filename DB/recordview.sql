-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2019 at 05:15 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `recordview`
--
CREATE DATABASE IF NOT EXISTS `recordview` DEFAULT CHARACTER SET utf8 COLLATE utf8_croatian_ci;
USE `recordview`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `CommentId` int(7) NOT NULL AUTO_INCREMENT,
  `CommentText` text COLLATE utf8_croatian_ci NOT NULL,
  `CommentDate` datetime NOT NULL,
  PRIMARY KEY (`CommentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentId`, `CommentText`, `CommentDate`) VALUES
(1, 'Testiram komentar', '0000-00-00 00:00:00'),
(2, '', '0000-00-00 00:00:00'),
(3, 'Test 2', '0000-00-00 00:00:00'),
(4, 'Test 23', '0000-00-00 00:00:00'),
(5, 'Test 23545', '0000-00-00 00:00:00'),
(6, 'asdwr32rfsfwf', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(7) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `Password` varchar(128) COLLATE utf8_croatian_ci NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `Password`, `DateCreated`) VALUES
(1, 'Tomo', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-10-17 18:10:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
