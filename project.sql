-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2018 at 01:15 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `createdat` varchar(50) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT NULL,
  `updatedat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `user_id`, `createdat`, `status`, `updatedat`) VALUES
(3, 'Laptops', 1, '01/06/2018', 'Active', '01/11/2018'),
(2, 'Mobiles', 1, '01/03/2018', 'Active', '01/09/2018'),
(4, 'Watches', 2, '01/02/2018', 'Active', '01/09/2018'),
(5, 'Household', 2, '01/03/2018', 'Active', '01/10/2018');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `nextfollowupdate` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `createdat` varchar(100) DEFAULT NULL,
  `assigned` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `phone`, `email`, `product_id`, `message`, `nextfollowupdate`, `user_id`, `createdat`, `assigned`) VALUES
(1, 'Samsung', '155184554', 'utk@gmail.com', 1, 'enquiring', '01/16/2018', 2, '13/11/2017', 4),
(2, 'Spiderman', '12346798', 'utk@gmail.com', 4, 'requires 2000 pieces', '01/16/2018', 2, '01/04/2018', 1),
(6, 'Girish', '12345648', 'girish@gmail.com', 2, 'asd asd asd', '01/15/2018', 2, '01/04/2018', 1),
(18, 'asd', '5652', 'asd@dsasa', 3, 'asdasd', '01/11/2018', 2, '10/01/2018', 2),
(19, 'ABC', '46579123', 'abc@gmail.com', 6, 'require 10 days', '01/17/2018', 2, '15/01/2018', 2),
(12, 'Adarsh', '1234513', 'adaras@gmais.com', 3, 'require 20 oied', '01/16/2018', 1, '06/01/2018', 1),
(17, 'Girish', '2626', 'girish@gmail.com', 2, 'Asd', '01/10/2018', 2, '10/01/2018', 2),
(14, 'ABCD', '12345648', 'asasa@dads', 2, 'we require 20 pieces', '01/15/2018', 1, '09/01/2018', 4),
(15, 'Prach', '123456789', 'prach@gmail.com', 5, 'require 10 of them', '01/10/2018', 1, '09/01/2018', 2),
(16, 'asc', '2323213', 'asd@das', 3, 'asdasd', '01/15/2018', 1, '10/01/2018', 2);

-- --------------------------------------------------------

--
-- Table structure for table `followup`
--

CREATE TABLE IF NOT EXISTS `followup` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `enquiry_id` int(11) DEFAULT NULL,
  `client_message` varchar(500) DEFAULT NULL,
  `team_message` varchar(500) DEFAULT NULL,
  `transfer_id` int(11) DEFAULT NULL,
  `status` enum('Confirm','Reject','Continue') DEFAULT NULL,
  `onDate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enquiry_id` (`enquiry_id`),
  KEY `user_id` (`transfer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `followup`
--


-- --------------------------------------------------------

--
-- Table structure for table `messageref`
--

CREATE TABLE IF NOT EXISTS `messageref` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `enquiry_id` int(11) DEFAULT NULL,
  `client_message` varchar(200) DEFAULT NULL,
  `team_message` varchar(200) DEFAULT NULL,
  `transfer_id` int(3) DEFAULT NULL,
  `onDate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `messageref`
--

INSERT INTO `messageref` (`id`, `enquiry_id`, `client_message`, `team_message`, `transfer_id`, `onDate`) VALUES
(1, 19, 'a', 'b', 2, '01/15/2018 04:21:53pm'),
(2, 19, 'a', 'b', 2, '01/15/2018 04:23:08pm'),
(3, 12, '', '', 1, '01/15/2018 04:48:04pm');

-- --------------------------------------------------------

--
-- Table structure for table `myusers`
--

CREATE TABLE IF NOT EXISTS `myusers` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `number` varchar(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `category` enum('admin','adminstrator','SE') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `myusers`
--

INSERT INTO `myusers` (`id`, `name`, `number`, `email`, `password`, `category`) VALUES
(1, 'Sankalp', '123456789', 'sankalp@gmail.com', 'sankalp', 'admin'),
(2, 'Utkarsh', '12345745', 'utk@gmail.com', 'utk123', 'SE'),
(5, 'Utkarsh123', '456798132', 'utk123@gmail.com', 'utk123', 'SE'),
(4, 'Girish', '123456789', 'girish@gmail.com', 'girish', 'adminstrator');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `createdat` varchar(50) DEFAULT NULL,
  `status` enum('Active','InActive') DEFAULT NULL,
  `updatedat` varchar(50) DEFAULT NULL,
  `assigned` int(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `price`, `description`, `user_id`, `createdat`, `status`, `updatedat`, `assigned`) VALUES
(1, 2, 'ASUS', '9999', 'SMARTFONE', 1, '12/12/2017', 'Active', '1/1/2018', NULL),
(2, 3, 'Lenovo', '15000', 'Laptop', 2, '01/03/2018', 'Active', '01/11/2018', NULL),
(3, 5, 'Knife', '1000', 'Knife Household', 1, '01/03/2018', 'Active', '01/04/2018', NULL),
(4, 5, 'Plates', '150', 'Plates', 2, '01/06/2018', 'Active', '01/06/2018', NULL),
(5, 2, 'Motorola', '7000', 'Smart Fone', 2, '01/04/2018', 'Active', '01/04/2018', NULL),
(6, 2, 'Charger', '200', 'Smart Fone Charger', 1, '05/01/2018', 'Active', '05/01/2018', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `refrence`
--

CREATE TABLE IF NOT EXISTS `refrence` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `enquiry_id` int(11) DEFAULT NULL,
  `transfer_id` int(11) DEFAULT NULL,
  `onDate` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enquiry_id` (`enquiry_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `refrence`
--

