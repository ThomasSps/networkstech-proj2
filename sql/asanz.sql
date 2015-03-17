-- phpMyAdmin SQL Dump
-- version 4.2.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2015 at 11:17 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `asanz`
--
CREATE DATABASE IF NOT EXISTS `asanz` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `asanz`;

-- --------------------------------------------------------

--
-- Table structure for table `comm`
--

DROP TABLE IF EXISTS `comm`;
CREATE TABLE IF NOT EXISTS `comm` (
`id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` text COLLATE utf8_bin NOT NULL,
  `ans_to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `comm_like`
--

DROP TABLE IF EXISTS `comm_like`;
CREATE TABLE IF NOT EXISTS `comm_like` (
  `c_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `u_id` int(11) NOT NULL,
`id` int(11) NOT NULL COMMENT 'Post ID',
  `title` varchar(64) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

DROP TABLE IF EXISTS `post_like`;
CREATE TABLE IF NOT EXISTS `post_like` (
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `uname` varchar(20) COLLATE utf8_bin NOT NULL,
  `pass` varchar(255) COLLATE utf8_bin NOT NULL,
  `since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comm`
--
ALTER TABLE `comm`
 ADD PRIMARY KEY (`id`), ADD KEY `u_id` (`u_id`,`p_id`), ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `comm_like`
--
ALTER TABLE `comm_like`
 ADD PRIMARY KEY (`c_id`,`u_id`), ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
 ADD PRIMARY KEY (`p_id`,`u_id`), ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comm`
--
ALTER TABLE `comm`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Post ID',AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comm`
--
ALTER TABLE `comm`
ADD CONSTRAINT `comm_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comm_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comm_like`
--
ALTER TABLE `comm_like`
ADD CONSTRAINT `comm_like_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `comm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comm_like_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_like`
--
ALTER TABLE `post_like`
ADD CONSTRAINT `post_like_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `post_like_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
