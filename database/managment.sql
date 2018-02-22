-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2018 at 12:41 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `articleId` int(5) NOT NULL AUTO_INCREMENT,
  `articleName` varchar(200) NOT NULL,
  `articleContent` text NOT NULL,
  `publishDate` varchar(40) NOT NULL,
  `categoryId` int(5) DEFAULT NULL,
  `user_name` varchar(33) DEFAULT NULL,
  PRIMARY KEY (`articleId`),
  KEY `categoryId` (`categoryId`),
  KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`articleId`, `articleName`, `articleContent`, `publishDate`, `categoryId`, `user_name`) VALUES
(3, 'What is Lorem Ipsum?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sed dictum dui. Pellentesque mollis tincidunt arcu at fringilla. Suspendisse potenti. In interdum suscipit nulla volutpat venenatis. Vivamus sit amet congue quam, id lacinia metus. Nunc vitae venenatis metus. Quisque convallis in odio a dictum. Mauris sit amet fringilla enim. Aliquam pellentesque, eros non elementum mattis, dolor metus efficitur tortor, in scelerisque quam nulla sed velit. Mauris pharetra massa maximus dui posuere, vitae laoreet mi laoreet. Proin ut ex vitae magna ultricies ullamcorper sed eleifend orci. Suspendisse pharetra faucibus risus at ultricies. Aenean dictum tincidunt lacus, sit amet condimentum ligula convallis a. Integer elementum pharetra viverra.\r\n\r\nMaecenas consectetur nec quam non tincidunt. Nullam tempus lorem ac nisl malesuada sollicitudin. Nulla et accumsan velit, sit amet porttitor felis. Donec eu mauris accumsan leo placerat fringilla ac sodales neque. Donec feugiat fringilla felis, rutrum consequat orci. Proin orci dolor, mattis nec justo eu, finibus hendrerit ligula. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nInteger fringilla imperdiet pharetra. Quisque pulvinar finibus justo, id imperdiet urna tempus ut. Curabitur vestibulum massa nisl, nec commodo urna euismod eu. Fusce convallis mauris vel dui consequat, sollicitudin vulputate dolor sagittis. Donec porta ornare viverra. Etiam cursus augue consequat mauris condimentum, eu pretium massa elementum. Suspendisse potenti. Mauris auctor malesuada sapien, quis lobortis libero semper a. Ut quis eros erat. Praesent non elit sed velit congue lobortis. Cras non aliquam est.\r\n\r\nMorbi nec velit sed est imperdiet ullamcorper. Sed tempor porta tristique. Integer at pretium felis, at ultrices felis. Nulla quis tincidunt ligula. Fusce malesuada neque eget quam efficitur, quis aliquam quam mattis. Fusce condimentum gravida gravida. Aenean dapibus tortor eget sagittis semper.\r\n\r\nMorbi quis ultrices erat. Aenean fringilla condimentum elit eget bibendum. Fusce tristique dictum tempor. Etiam pharetra sem elit, id tempus arcu cursus nec. Aliquam et quam tortor. Sed ultrices turpis a ligula pharetra tempus. Nullam non mi neque. Vestibulum lacinia eros a lorem consectetur, at aliquam lacus sodales. Sed lorem nunc, aliquam eleifend elit in, vestibulum eleifend mi. Phasellus nec posuere erat. Etiam varius varius leo a sollicitudin.', 'Sun:Feb:2018 11:16:38', 1, 'iftikhar');

-- --------------------------------------------------------

--
-- Table structure for table `categroy`
--

DROP TABLE IF EXISTS `categroy`;
CREATE TABLE IF NOT EXISTS `categroy` (
  `categoryId` int(5) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(33) NOT NULL,
  `user_name` varchar(33) DEFAULT NULL,
  PRIMARY KEY (`categoryId`),
  KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categroy`
--

INSERT INTO `categroy` (`categoryId`, `categoryName`, `user_name`) VALUES
(1, 'wise', 'waqar');

-- --------------------------------------------------------

--
-- Table structure for table `mgt_comment`
--

DROP TABLE IF EXISTS `mgt_comment`;
CREATE TABLE IF NOT EXISTS `mgt_comment` (
  `commentId` int(10) NOT NULL AUTO_INCREMENT,
  `commentContent` text NOT NULL,
  `publishedDate` varchar(40) NOT NULL,
  `articleId` int(5) DEFAULT NULL,
  `user_name` varchar(33) DEFAULT NULL,
  PRIMARY KEY (`commentId`),
  KEY `articleId` (`articleId`),
  KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mgt_comment`
--

INSERT INTO `mgt_comment` (`commentId`, `commentContent`, `publishedDate`, `articleId`, `user_name`) VALUES
(1, 'ok', 'Mon:Feb:2018 04:57:43', 3, 'waqar');

-- --------------------------------------------------------

--
-- Table structure for table `mgt_user`
--

DROP TABLE IF EXISTS `mgt_user`;
CREATE TABLE IF NOT EXISTS `mgt_user` (
  `user_name` varchar(33) NOT NULL,
  `first_name` varchar(33) NOT NULL,
  `last_name` varchar(33) NOT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `confirm_user_password` varchar(33) DEFAULT NULL,
  `profile_picture` varchar(1000) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mgt_user`
--

INSERT INTO `mgt_user` (`user_name`, `first_name`, `last_name`, `user_email`, `confirm_user_password`, `profile_picture`) VALUES
('waqar', 'Waqar', 'Hussain', 'waqar2390@gmail.com', '3c785841d2572d9db0c4c003898b98a1', 'http://images.clipartpanda.com/default-clipart-acspike_male_user_icon.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
