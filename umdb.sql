-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2012 at 12:31 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `uMScript`
--

-- --------------------------------------------------------



--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `site_url` varchar(85) NOT NULL,
  `site_email` varchar(85) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_url`, `site_email`) VALUES
('', 'localhost/specrep', 'test@localhost');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(8) NOT NULL,
  `password` varchar(32) NOT NULL,
  `temp_pass` varchar(32) NOT NULL,
  `temp_pass_active` int(1) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `supervisor` varchar(80),
  `phone` int(25) NOT NULL,
  `address` text NOT NULL,
  `postcode` varchar(80) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `institution` varchar(80) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `current_facilities` text NOT NULL,
  `active` int(1) NOT NULL,
  `level_access` int(1) NOT NULL,
  `act_key` varchar(80) NOT NULL,
  `reg_date` varchar(45) NOT NULL,
  `last_active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `temp_pass`, `temp_pass_active`, `first_name`, `last_name`, `email`, `phone`, `address`, `postcode`, `usertype`, `institution`, `group_name`,`current_facilities`, `active`, `level_access`, `act_key`,`reg_date`, `last_active`) VALUES
('', 'user1', '6c90b22e50c986116fff47d48ad9407d', 'd0ygOllq', 0, 'John', 'Doe', 'test@localhost', '',723456789, 'Kigali', 'Afghanistan', 'Academic', 'University of Manchester', 'chemistry', 'none', '1','2','','Wednesday, Sep 28, 2011, 8:47 am', ''),
('', 'admin', '317da97d438875c141a4b5f9f67dfdd0', '', 0, 'Site', 'Admin', 'admin@test.com', '',723456789, 'Kigali', 'Afghanistan', 'Academic', 'University of Manchester', 'chemistry', 'none', '1','1','','Wednesday, Sep 28, 2011, 8:47 am', '')
