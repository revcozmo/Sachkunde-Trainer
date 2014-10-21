-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2014 at 01:12 PM
-- Server version: 5.5.40
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sachkundetrainer`
--

-- --------------------------------------------------------

--
-- Table structure for table `answere`
--

DROP TABLE IF EXISTS `answere`;
CREATE TABLE IF NOT EXISTS `answere` (
  `question_id` int(11) NOT NULL,
  `answere_id` int(11) NOT NULL,
  `answere` text NOT NULL,
  `correct` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
`question_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `count_wrong` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=859 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answere`
--
ALTER TABLE `answere`
 ADD UNIQUE KEY `question_id` (`question_id`,`answere_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`question_id`);
