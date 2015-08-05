-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2015 at 09:03 AM
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
-- Table structure for table `downloads`
--

CREATE TABLE IF NOT EXISTS `downloads` (
`id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `size` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `url` varchar(2100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_menu1`
--

CREATE TABLE IF NOT EXISTS `main_menu1` (
`m_menu_id` int(2) NOT NULL,
  `m_menu_name` varchar(20) NOT NULL,
  `m_menu_link` varchar(2100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_menu1`
--

INSERT INTO `main_menu1` (`m_menu_id`, `m_menu_name`, `m_menu_link`) VALUES
(57, 'courses', ''),
(58, 'Admissions', ''),
(59, 'Facilities', ''),
(60, 'Contact Us', ''),
(61, 'About Us', '');

-- --------------------------------------------------------

--
-- Table structure for table `occurrence`
--

CREATE TABLE IF NOT EXISTS `occurrence` (
`occurrence_id` int(10) unsigned NOT NULL,
  `word_id` int(10) unsigned NOT NULL DEFAULT '0',
  `page_id` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=310 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occurrence`
--

INSERT INTO `occurrence` (`occurrence_id`, `word_id`, `page_id`) VALUES
(1, 1, 23),
(2, 2, 23),
(3, 3, 23),
(4, 4, 23),
(5, 5, 23),
(6, 6, 23),
(7, 7, 23),
(8, 8, 23),
(9, 9, 23),
(10, 10, 23),
(11, 11, 23),
(12, 12, 23),
(13, 13, 23),
(14, 14, 23),
(15, 15, 23),
(16, 16, 23),
(17, 17, 23),
(18, 18, 23),
(19, 19, 23),
(20, 20, 23),
(21, 21, 23),
(22, 22, 23),
(23, 23, 23),
(24, 24, 23),
(25, 25, 23),
(26, 26, 23),
(27, 27, 23),
(28, 28, 23),
(29, 29, 23),
(30, 30, 23),
(31, 31, 23),
(32, 32, 23),
(33, 33, 23),
(34, 34, 23),
(35, 35, 23),
(36, 36, 23),
(37, 37, 23),
(38, 38, 23),
(39, 39, 23),
(40, 40, 23),
(41, 41, 23),
(42, 42, 23),
(43, 43, 23),
(44, 44, 23),
(45, 45, 23),
(46, 46, 23),
(47, 47, 23),
(48, 48, 23),
(49, 49, 23),
(50, 50, 23),
(51, 51, 23),
(52, 52, 23),
(53, 53, 23),
(54, 54, 23),
(55, 55, 23),
(56, 56, 23),
(57, 57, 23),
(58, 58, 23),
(59, 59, 23),
(60, 60, 23),
(61, 56, 24),
(62, 1, 24),
(63, 48, 24),
(64, 61, 24),
(65, 50, 24),
(66, 62, 24),
(67, 63, 24),
(68, 64, 24),
(69, 65, 24),
(70, 66, 24),
(71, 67, 24),
(72, 68, 24),
(73, 69, 24),
(74, 70, 24),
(75, 71, 24),
(76, 72, 24),
(77, 73, 24),
(78, 74, 24),
(79, 31, 24),
(80, 75, 24),
(81, 76, 24),
(82, 77, 24),
(83, 78, 24),
(84, 79, 24),
(85, 80, 24),
(86, 81, 24),
(87, 82, 24),
(88, 83, 24),
(89, 47, 24),
(90, 84, 24),
(91, 85, 24),
(92, 4, 24),
(93, 86, 24),
(94, 87, 24),
(95, 88, 24),
(96, 2, 24),
(97, 89, 24),
(98, 90, 24),
(99, 91, 24),
(100, 28, 24),
(101, 92, 24),
(102, 93, 24),
(103, 94, 24),
(104, 95, 24),
(105, 96, 24),
(106, 97, 24),
(107, 1, 25),
(108, 48, 25),
(109, 6, 25),
(110, 65, 25),
(111, 74, 25),
(112, 22, 25),
(113, 89, 25),
(114, 98, 25),
(115, 99, 25),
(116, 84, 25),
(117, 100, 25),
(118, 101, 25),
(119, 102, 25),
(120, 103, 25),
(121, 61, 25),
(122, 80, 25),
(123, 23, 25),
(124, 12, 25),
(125, 104, 25),
(126, 105, 25),
(127, 106, 25),
(128, 58, 25),
(129, 107, 25),
(130, 108, 25),
(131, 109, 25),
(132, 110, 25),
(133, 111, 25),
(134, 8, 25),
(135, 112, 25),
(136, 113, 25),
(137, 114, 25),
(138, 115, 25),
(139, 62, 25),
(140, 56, 25),
(141, 116, 25),
(142, 117, 25),
(143, 118, 25),
(144, 119, 25),
(145, 120, 25),
(146, 121, 25),
(147, 122, 25),
(148, 82, 25),
(149, 63, 25),
(150, 123, 25),
(151, 3, 25),
(152, 124, 25),
(153, 97, 25),
(154, 125, 25),
(155, 126, 25),
(156, 127, 25),
(157, 128, 25),
(158, 129, 25),
(159, 50, 25),
(160, 130, 25),
(161, 131, 25),
(162, 132, 25),
(163, 9, 25),
(164, 1, 25),
(165, 48, 25),
(166, 6, 25),
(167, 65, 25),
(168, 74, 25),
(169, 22, 25),
(170, 89, 25),
(171, 98, 25),
(172, 99, 25),
(173, 84, 25),
(174, 100, 25),
(175, 101, 25),
(176, 102, 25),
(177, 103, 25),
(178, 61, 25),
(179, 80, 25),
(180, 23, 25),
(181, 12, 25),
(182, 104, 25),
(183, 105, 25),
(184, 106, 25),
(185, 58, 25),
(186, 107, 25),
(187, 108, 25),
(188, 109, 25),
(189, 110, 25),
(190, 111, 25),
(191, 8, 25),
(192, 112, 25),
(193, 113, 25),
(194, 114, 25),
(195, 115, 25),
(196, 62, 25),
(197, 56, 25),
(198, 116, 25),
(199, 117, 25),
(200, 118, 25),
(201, 119, 25),
(202, 120, 25),
(203, 121, 25),
(204, 122, 25),
(205, 82, 25),
(206, 63, 25),
(207, 123, 25),
(208, 3, 25),
(209, 124, 25),
(210, 97, 25),
(211, 125, 25),
(212, 126, 25),
(213, 127, 25),
(214, 128, 25),
(215, 129, 25),
(216, 50, 25),
(217, 130, 25),
(218, 131, 25),
(219, 132, 25),
(220, 9, 25),
(221, 1, 25),
(222, 48, 25),
(223, 6, 25),
(224, 65, 25),
(225, 74, 25),
(226, 22, 25),
(227, 89, 25),
(228, 98, 25),
(229, 99, 25),
(230, 84, 25),
(231, 100, 25),
(232, 101, 25),
(233, 102, 25),
(234, 103, 25),
(235, 61, 25),
(236, 80, 25),
(237, 23, 25),
(238, 12, 25),
(239, 104, 25),
(240, 105, 25),
(241, 106, 25),
(242, 58, 25),
(243, 107, 25),
(244, 108, 25),
(245, 109, 25),
(246, 110, 25),
(247, 111, 25),
(248, 8, 25),
(249, 112, 25),
(250, 113, 25),
(251, 114, 25),
(252, 115, 25),
(253, 62, 25),
(254, 56, 25),
(255, 116, 25),
(256, 117, 25),
(257, 118, 25),
(258, 119, 25),
(259, 120, 25),
(260, 121, 25),
(261, 122, 25),
(262, 82, 25),
(263, 63, 25),
(264, 123, 25),
(265, 3, 25),
(266, 124, 25),
(267, 97, 25),
(268, 125, 25),
(269, 126, 25),
(270, 127, 25),
(271, 128, 25),
(272, 129, 25),
(273, 50, 25),
(274, 130, 25),
(275, 131, 25),
(276, 132, 25),
(277, 9, 25),
(278, 133, 26),
(279, 134, 26),
(280, 135, 26),
(281, 136, 26),
(282, 137, 26),
(283, 138, 26),
(284, 139, 26),
(285, 140, 26),
(286, 141, 26),
(287, 142, 26),
(288, 143, 26),
(289, 144, 26),
(290, 145, 26),
(291, 146, 26),
(292, 147, 26),
(293, 148, 26),
(294, 149, 26),
(295, 150, 26),
(296, 151, 26),
(297, 152, 26),
(298, 153, 26),
(299, 154, 26),
(300, 155, 26),
(301, 156, 26),
(302, 157, 26),
(303, 158, 26),
(304, 82, 26),
(305, 2, 26),
(306, 159, 26),
(307, 130, 26),
(308, 160, 26),
(309, 161, 26);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `contents` text NOT NULL,
  `url` varchar(2100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `contents`, `url`) VALUES
(23, 'About cvs', '<p>Kit is seriously hurt but begins to make a good recovery. Tim decides to intervene in her life and does so by preventing her from meeting her boyfriend, Jimmy (<a title="Tom Hughes (actor)" href="https://en.wikipedia.org/wiki/Tom_Hughes_(actor)">Tom Hughes</a>). When he returns to the present time, he finds Posy has never been born and that he has a son instead. His father explains that travelling back to change things before his children were born would mean those children would not be born. Thus, any events that occurred before Posy''s birth cannot be changed, and Tim must accept the consequences as a normal person would. Tim accepts he cannot change Kit''s life by changing her past but he and Mary help her to change her life in the present. She settles down with an old friend of Tim''s and has a child of her own. Tim and Mary have another child, a boy.</p>', ''),
(24, 'Library', '<p>Tim learns that his father has terminal cancer and that time travel cannot change it. His father has known for quite some time, but kept travelling back in time to effectively extend his life and spend more time with his family. He tells Tim to live each day twice in order to be truly happy: the first time, live it as normal, and the second time, live every day again almost exactly the same. The first time with all the tensions and worries that stop us noticing how sweet the world can be, but the second time noticing. Tim follows this advice and also travels back into the past to visit his father whenever he misses him.</p>', ''),
(25, 'Music', '<p>Mary tells Tim she wants a third child. He is reluctant at first because he will not be able to visit his father after the baby is born but agrees. After visiting his father for the following nine months, Tim tells his father that he cannot visit any more. They travel back to when Tim was a small boy, reliving a fond memory of them playing on the beach, and after have a heartfelt, tearful goodbye. Mary gives birth to another baby boy and Tim knows he can never see his father again. After reliving each day, Tim comes to realise that it is better to live each day once, and appreciate everything as if he is living it for the second time. The film ends with Tim leaving Mary in bed and getting his three children ready for school.</p>', ''),
(26, 'Introduction', '<p>The College Of Vocational Studies, a maintained institution of Delhi University, was founded in 1972. It makes a small beginning in a great change in the field of higher education making it more meaningful and diversified. Through this experiment, we seek to break new ground by bridging the gap between static university education and the social environment.</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE IF NOT EXISTS `sub_menu` (
`s_menu_id` int(2) NOT NULL,
  `m_menu_id` int(2) NOT NULL,
  `s_menu_name` varchar(30) NOT NULL,
  `s_menu_link` varchar(2100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`s_menu_id`, `m_menu_id`, `s_menu_name`, `s_menu_link`) VALUES
(63, 57, 'BMS', ''),
(64, 57, 'English', ''),
(65, 57, 'B.Com', ''),
(66, 57, 'Hindi', ''),
(67, 57, 'Mathematics', ''),
(68, 58, 'Procedures', ''),
(69, 58, 'Quota', ''),
(70, 58, 'Fees', ''),
(71, 58, 'Information Bulletin', ''),
(72, 59, 'College Library', ''),
(74, 59, 'Scholarships', ''),
(76, 59, 'Other Facilites', ''),
(77, 59, 'socities & Association', '');

-- --------------------------------------------------------

--
-- Table structure for table `word`
--

CREATE TABLE IF NOT EXISTS `word` (
`word_id` int(10) unsigned NOT NULL,
  `word_word` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`word_id`, `word_word`) VALUES
(1, 'tim'),
(2, 'change'),
(3, 'born'),
(4, 'life'),
(5, 'before'),
(6, 'mary'),
(7, 'present'),
(8, 'children'),
(9, 'child'),
(10, 'thus'),
(11, 'accept'),
(12, 'birth'),
(13, 'consequences'),
(14, 'events'),
(15, 'occurred'),
(16, 'posy''s'),
(17, 'changed'),
(18, 'kit''s'),
(19, 'friend'),
(20, 'old'),
(21, 'tim''s'),
(22, 'boy'),
(23, 'another'),
(24, 'down'),
(25, 'settles'),
(26, 'accepts'),
(27, 'person'),
(28, 'normal'),
(29, 'changing'),
(30, 'help'),
(31, 'past'),
(32, 'explains'),
(33, 'intervene'),
(34, 'preventing'),
(35, 'boyfriend'),
(36, 'meeting'),
(37, 'decides'),
(38, 'recovery'),
(39, 'seriously'),
(40, 'kit'),
(41, 'hurt'),
(42, 'begins'),
(43, 'good'),
(44, 'make'),
(45, 'jimmy'),
(46, 'tom'),
(47, 'travelling'),
(48, 'father'),
(49, 'instead'),
(50, 'back'),
(51, 'things'),
(52, 'mean'),
(53, 'son'),
(54, 'returns'),
(55, 'hughes'),
(56, 'time'),
(57, 'finds'),
(58, 'never'),
(59, 'posy'),
(60, 'those'),
(61, 'live'),
(62, 'second'),
(63, 'first'),
(64, 'noticing'),
(65, 'day'),
(66, 'stop'),
(67, 'learns'),
(68, 'sweet'),
(69, 'worries'),
(70, 'tensions'),
(71, 'exactly'),
(72, 'same'),
(73, 'world'),
(74, 'visit'),
(75, 'whenever'),
(76, 'misses'),
(77, 'travels'),
(78, 'follows'),
(79, 'advice'),
(80, 'again'),
(81, 'known'),
(82, 'more'),
(83, 'family'),
(84, 'tells'),
(85, 'spend'),
(86, 'quite'),
(87, 'effectively'),
(88, 'extend'),
(89, 'each'),
(90, 'terminal'),
(91, 'cancer'),
(92, 'kept'),
(93, 'happy'),
(94, 'truly'),
(95, 'twice'),
(96, 'order'),
(97, 'travel'),
(98, 'baby'),
(99, 'reliving'),
(100, 'realise'),
(101, 'comes'),
(102, 'better'),
(103, 'once'),
(104, 'gives'),
(105, 'knows'),
(106, 'see'),
(107, 'appreciate'),
(108, 'everything'),
(109, 'getting'),
(110, 'bed'),
(111, 'three'),
(112, 'school'),
(113, 'ready'),
(114, 'leaving'),
(115, 'living'),
(116, 'ends'),
(117, 'film'),
(118, 'goodbye'),
(119, 'tearful'),
(120, 'months'),
(121, 'nine'),
(122, 'following'),
(123, 'visiting'),
(124, 'agrees'),
(125, 'playing'),
(126, 'beach'),
(127, 'third'),
(128, 'heartfelt'),
(129, 'memory'),
(130, 'small'),
(131, 'reluctant'),
(132, 'fond'),
(133, 'university'),
(134, 'education'),
(135, 'diversified'),
(136, 'seek'),
(137, 'through'),
(138, 'experiment'),
(139, 'ground'),
(140, 'static'),
(141, 'social'),
(142, 'environment'),
(143, 'between'),
(144, 'gap'),
(145, 'new'),
(146, 'bridging'),
(147, 'break'),
(148, 'higher'),
(149, 'institution'),
(150, 'delhi'),
(151, 'maintained'),
(152, 'studies'),
(153, 'college'),
(154, 'vocational'),
(155, 'founded'),
(156, 'makes'),
(157, 'field'),
(158, 'making'),
(159, 'great'),
(160, 'beginning'),
(161, 'meaningful');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menu1`
--
ALTER TABLE `main_menu1`
 ADD PRIMARY KEY (`m_menu_id`);

--
-- Indexes for table `occurrence`
--
ALTER TABLE `occurrence`
 ADD PRIMARY KEY (`occurrence_id`);

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
-- Indexes for table `word`
--
ALTER TABLE `word`
 ADD PRIMARY KEY (`word_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `main_menu1`
--
ALTER TABLE `main_menu1`
MODIFY `m_menu_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `occurrence`
--
ALTER TABLE `occurrence`
MODIFY `occurrence_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=310;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
MODIFY `s_menu_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
MODIFY `word_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=162;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
