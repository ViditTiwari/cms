-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2015 at 07:11 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cvs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`memberID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`memberID`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`) VALUES
(4, 'admin', '$2y$10$xTiVEyJ4JO1pPzL.QaiwaecRtfLP4lMse7L5vcWnprcUiwJu1jit2', 'admin@admin.com', 'Yes', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `main_menu1`
--

CREATE TABLE IF NOT EXISTS `main_menu1` (
`m_menu_id` int(2) NOT NULL,
  `m_menu_name` varchar(20) NOT NULL,
  `m_menu_link` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_menu1`
--

INSERT INTO `main_menu1` (`m_menu_id`, `m_menu_name`, `m_menu_link`) VALUES
(47, 'Facilities', ''),
(48, 'Contact Us', ''),
(49, 'Courses', ''),
(50, 'Admissions', ''),
(51, 'Something', '');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `contents` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `contents`) VALUES
(9, 'About Us', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and sum.</p>'),
(11, 'Department', '<ul style="list-style-type: square;">\r\n<li>BMS</li>\r\n<li>Mathematics</li>\r\n<li>Economics</li>\r\n<li>kuchbhi</li>\r\n</ul>'),
(12, 'Courses', '<p style="text-align: center;">BMS</p>\r\n<p style="text-align: center;">ENGLISH</p>\r\n<p style="text-align: center;">ECONOMICS</p>\r\n<p style="text-align: center;">HINDI</p>\r\n<p style="text-align: center;">BCOM</p>\r\n<h1 style="text-align: center;">&nbsp;</h1>'),
(13, 'introduction', '<p>kgvjfjwoefskdnf kfsd</p>\r\n<p>sdfsdfjsdf</p>\r\n<p>fsdfjsd</p>\r\n<p>sdfsdlf</p>');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE IF NOT EXISTS `sub_menu` (
`s_menu_id` int(2) NOT NULL,
  `m_menu_id` int(2) NOT NULL,
  `s_menu_name` varchar(20) NOT NULL,
  `s_menu_link` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`s_menu_id`, `m_menu_id`, `s_menu_name`, `s_menu_link`) VALUES
(18, 10, 'B.Com', 'http://www.google.com'),
(27, 15, 'Library', ''),
(28, 15, 'LAB', ''),
(29, 18, 'principal', ''),
(44, 36, 'Library', ''),
(46, 39, 'BMS', ''),
(48, 38, 'google', ''),
(49, 38, 'Library', ''),
(50, 41, 'Economics', ''),
(52, 43, 'BMS', ''),
(54, 50, 'Economics', ''),
(55, 50, 'BMS', ''),
(56, 0, 'google', ''),
(57, 51, 'somethingmore', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `main_menu1`
--
ALTER TABLE `main_menu1`
 ADD PRIMARY KEY (`m_menu_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
 ADD PRIMARY KEY (`s_menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `main_menu1`
--
ALTER TABLE `main_menu1`
MODIFY `m_menu_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
MODIFY `s_menu_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
