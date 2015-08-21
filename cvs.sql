-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2015 at 09:48 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

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
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  PRIMARY KEY (`memberID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`memberID`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`) VALUES
(4, 'admin', '$2y$10$xTiVEyJ4JO1pPzL.QaiwaecRtfLP4lMse7L5vcWnprcUiwJu1jit2', 'admin@admin.com', 'Yes', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE IF NOT EXISTS `downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `size` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `url` varchar(2100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `name`, `size`, `type`, `url`) VALUES
(3, 'Departure.pdf', '145106', 'pdf', 'C:/xampp/htdocs/cms/upload/Departure.pdf'),
(4, '08152015101307_Departure.pdf', '145106', 'pdf', 'C:/xampp/htdocs/cms/upload/08152015101307_Departure.pdf'),
(5, '08152015101951_Departure.pdf', '145106', 'pdf', 'C:/xampp/htdocs/cms/upload/08152015101951_Departure.pdf'),
(6, '08152015101957_Departure.pdf', '145106', 'pdf', 'C:/xampp/htdocs/cms/upload/08152015101957_Departure.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_date` date NOT NULL,
  `description` varchar(1024) NOT NULL,
  `title` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_date`, `description`, `title`, `url`) VALUES
('2015-08-16', 'Lorem Ipsum', 'Event 1', 'event1'),
('2015-08-17', 'Lorem Ipsum', 'Event 2', 'event2');

-- --------------------------------------------------------

--
-- Table structure for table `footer_pages`
--

CREATE TABLE IF NOT EXISTS `footer_pages` (
  `num` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `size` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `url` varchar(2100) NOT NULL,
  `thumb_name_70` varchar(2048) NOT NULL,
  `thumb_name_263` varchar(2048) NOT NULL,
  `url_70` varchar(2100) NOT NULL,
  `url_263` varchar(2100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `size`, `type`, `url`, `thumb_name_70`, `thumb_name_263`, `url_70`, `url_263`) VALUES
(1, '15437.jpg', '42702', 'jpg', 'C:/xampp/htdocs/cms/gallery/15437.jpg', '15437.jpg', '15437.jpg', 'C:/xampp/htdocs/cms/gallery/thumb70/15437.jpg', 'C:/xampp/htdocs/cms/gallery/thumb263/15437.jpg'),
(2, '922469_362148963906202_985353833_o.jpg', '87062', 'jpg', 'C:/xampp/htdocs/cms/gallery/922469_362148963906202_985353833_o.jpg', '922469_362148963906202_985353833_o.jpg', '922469_362148963906202_985353833_o.jpg', 'C:/xampp/htdocs/cms/gallery/thumb70/922469_362148963906202_985353833_o.jpg', 'C:/xampp/htdocs/cms/gallery/thumb263/922469_362148963906202_985353833_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `imp_links`
--

CREATE TABLE IF NOT EXISTS `imp_links` (
  `title` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imp_links`
--

INSERT INTO `imp_links` (`title`, `url`) VALUES
('About', 'about'),
('Academics', 'academics'),
('Courses', 'courses'),
('Event 1', 'event1');

-- --------------------------------------------------------

--
-- Table structure for table `main_menu1`
--

CREATE TABLE IF NOT EXISTS `main_menu1` (
  `m_menu_id` int(2) NOT NULL AUTO_INCREMENT,
  `m_menu_name` varchar(20) NOT NULL,
  `m_menu_link` varchar(2100) NOT NULL,
  PRIMARY KEY (`m_menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `main_menu1`
--

INSERT INTO `main_menu1` (`m_menu_id`, `m_menu_name`, `m_menu_link`) VALUES
(1, 'About', '#'),
(2, 'Contact', 'contact'),
(3, 'Courses', 'courses'),
(4, 'Academics', 'academics'),
(5, 'Facilities', '#'),
(6, 'Admissions', '#'),
(7, 'New Menu', '#');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `description` varchar(2048) NOT NULL,
  `title` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `new` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`description`, `title`, `url`, `new`) VALUES
('Freshers Admission', 'About', 'about', 0),
('Lorem Ipsum News', 'News 1', 'news1', 0),
('Lorem Ipsum News', 'News 2', 'news2', 0),
('Lorem Ipsum News', 'News 3', 'news3', 0),
('asd', 'Event 2', 'event2', 1),
('dasas', 'Event 1', 'event1', 0),
('dask', 'Event 3', 'event3', 0),
('asda', 'Academics', 'academics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `occurrence`
--

CREATE TABLE IF NOT EXISTS `occurrence` (
  `occurrence_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `word_id` int(10) unsigned NOT NULL DEFAULT '0',
  `page_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`occurrence_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `occurrence`
--

INSERT INTO `occurrence` (`occurrence_id`, `word_id`, `page_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 2, 2),
(5, 4, 3),
(6, 2, 3),
(7, 5, 4),
(8, 5, 5),
(9, 6, 6),
(10, 6, 7),
(11, 6, 8),
(12, 7, 9),
(13, 8, 9),
(14, 7, 10),
(15, 7, 11),
(16, 8, 11),
(17, 9, 12),
(18, 10, 13),
(19, 11, 13);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `contents` text NOT NULL,
  `url` varchar(2100) NOT NULL,
  `Time` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `contents`, `url`, `Time`) VALUES
(1, 'About', '<p>Something About College</p>', 'about', '2015-08'),
(2, 'Academics', '<p>Something about Academics</p>', 'academics', '2015-08'),
(3, 'Contact', '<p>Something about Contact</p>', 'contact', '2015-08'),
(4, 'Courses', '<p>Courses</p>', 'courses', '2015-08'),
(5, 'B.Sc', '<p>Courses</p>', 'bsc', '2015-08'),
(6, 'Event 1', '<p>Event</p>', 'event1', '2015-08'),
(7, 'Event 2', '<p>Event 2</p>', 'event2', '2015-08'),
(8, 'Event 3', '<p>Event 3</p>', 'event3', '2015-08'),
(9, 'News 1', '<p>New News</p>', 'news1', '2015-08'),
(10, 'News 2', '<p>News News</p>', 'news2', '2015-08'),
(11, 'News 3', '<p>New News 234</p>', 'news3', '2015-08'),
(12, 'News 4', '<p>Newsadskj</p>', 'news4', '2015-08'),
(13, 'Fee', '<table style="height: 107px;" width="451">\r\n<tbody>\r\n<tr>\r\n<td>Admission Fee</td>\r\n<td>800</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'fee', '2015-08');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE IF NOT EXISTS `sub_menu` (
  `s_menu_id` int(2) NOT NULL AUTO_INCREMENT,
  `m_menu_id` int(2) NOT NULL,
  `s_menu_name` varchar(30) NOT NULL,
  `s_menu_link` varchar(2100) NOT NULL,
  PRIMARY KEY (`s_menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`s_menu_id`, `m_menu_id`, `s_menu_name`, `s_menu_link`) VALUES
(1, 1, 'About College', 'about'),
(2, 3, 'B.Sc', 'bsc');

-- --------------------------------------------------------

--
-- Table structure for table `word`
--

CREATE TABLE IF NOT EXISTS `word` (
  `word_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `word_word` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`word_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`word_id`, `word_word`) VALUES
(1, 'college'),
(2, 'something'),
(3, 'academics'),
(4, 'contact'),
(5, 'courses'),
(6, 'event'),
(7, 'news'),
(8, 'new'),
(9, 'newsadskj'),
(10, 'fee'),
(11, 'admission');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
