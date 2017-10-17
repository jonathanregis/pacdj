-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 10, 2017 at 05:25 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perez_cells_db`
--
CREATE DATABASE IF NOT EXISTS `perez_cells_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `perez_cells_db`;

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `actionId` bigint(20) NOT NULL AUTO_INCREMENT,
  `action_name` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `note` text,
  `date_reg` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`actionId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE IF NOT EXISTS `assign` (
  `assignId` int(11) NOT NULL AUTO_INCREMENT,
  `visitorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `assign_date` date DEFAULT NULL,
  `session` text COMMENT '1st service or 2nd / 1session or 2nd/3rd',
  `report` text,
  `status` varchar(200) DEFAULT 'active',
  `date_reg` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`assignId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cells`
--

CREATE TABLE IF NOT EXISTS `cells` (
  `cellId` int(11) NOT NULL AUTO_INCREMENT,
  `areaId` int(200) DEFAULT NULL,
  `cell_name` text,
  `cell_desc` text,
  `status` varchar(200) DEFAULT 'active',
  `date_reg` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cellId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cells`
--

INSERT INTO `cells` (`cellId`, `areaId`, `cell_name`, `cell_desc`, `status`, `date_reg`) VALUES
(4, 5, 'compassion du christ', '', 'active', '2017-09-24 11:12:53'),
(5, 5, 'victory bible', '', 'active', '2017-09-24 11:23:31'),
(6, 5, 'impact center', '', 'active', '2017-09-24 11:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `cell_areas`
--

CREATE TABLE IF NOT EXISTS `cell_areas` (
  `areaId` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(200) DEFAULT NULL,
  `area_city` varchar(200) DEFAULT NULL,
  `area_desc` text NOT NULL,
  `status` varchar(200) DEFAULT 'active',
  `date_reg` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`areaId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cell_areas`
--

INSERT INTO `cell_areas` (`areaId`, `area_name`, `area_city`, `area_desc`, `status`, `date_reg`) VALUES
(5, 'race course', 'accra', 'where', 'active', '2017-09-24 11:22:12'),
(6, 'Teshie', 'accra', 'fffffffffff', 'active', '2017-10-01 07:00:39'),
(7, 'lapaz', 'accra', 'cccccccccccccccccccccc', 'active', '2017-10-01 07:03:16'),
(8, 'Akwateman', 'accra', 'geerer', 'active', '2017-10-01 07:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `reportId` int(11) NOT NULL AUTO_INCREMENT,
  `report_date` date DEFAULT NULL,
  `report_title` text,
  `report_desc` text,
  `report_status` varchar(200) DEFAULT 'active',
  `date_reg` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`reportId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `smsId` int(11) NOT NULL AUTO_INCREMENT,
  `sms_title` text,
  `sms_content` text,
  `sms_status` varchar(200) DEFAULT NULL,
  `date_reg` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`smsId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `cellId` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `photo` text,
  `address` varchar(200) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT 'active',
  `date_reg` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `cellId`, `username`, `password`, `firstname`, `lastname`, `photo`, `address`, `role`, `phone`, `email`, `status`, `date_reg`) VALUES
(3, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
  `visitorId` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `dob` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL,
  `location` text COMMENT 'Any prominent feature to help us locate your house/office',
  `postal_address` varchar(200) DEFAULT NULL,
  `workplace` varchar(200) DEFAULT NULL COMMENT 'school / workplace',
  `belong_church` varchar(50) DEFAULT NULL COMMENT 'Do yoou belong to any church? yes or no',
  `belong_yes` text COMMENT 'If yes, name of the church',
  `department` varchar(200) DEFAULT NULL COMMENT 'which department are you interested in ?',
  `issue` text COMMENT 'any important issue you want the church to pray on ?',
  `decision` text COMMENT 'just accepted Christ/rededication/wants to be member/just came to visit',
  `invited_by` text,
  `invited_by_phone` text,
  `status` varchar(200) DEFAULT 'active',
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`visitorId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitorId`, `name`, `dob`, `gender`, `phone`, `email`, `area`, `location`, `postal_address`, `workplace`, `belong_church`, `belong_yes`, `department`, `issue`, `decision`, `invited_by`, `invited_by_phone`, `status`, `date_reg`) VALUES
(1, 'Alfonse Mulari', '2017-10-17', 'Male', '242066415317', 'saintavel@yahoo.fr', 'teshie', 'wwewe', 'asasasa', 'sasasasasas', 'Yes', NULL, 'aasass', 'asasasasas', 'Just accepted christ', 'fffff', '43423232323232', 'assign', '2017-10-06 23:46:50'),
(2, 'Dominique Lio', '2017-10-17', 'Male', '242066415317', 'saintavel@yahoo.fr', 'lapaz', 'wwewe', 'asasasa', 'sasasasasas', 'Yes', NULL, 'aasass', 'asasasasas', 'Just accepted christ', 'fffff', '43423232323232', 'active', '2017-10-06 22:10:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
