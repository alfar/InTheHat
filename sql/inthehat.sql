-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 27. 07 2013 kl. 17:36:06
-- Serverversion: 5.6.12-log
-- PHP-version: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inthehat`
--
CREATE DATABASE IF NOT EXISTS `inthehat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inthehat`;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `slug` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `author` int(11) NOT NULL,
  `posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `folderId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `image_folder`
--

CREATE TABLE IF NOT EXISTS `image_folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folderId` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `path`
--

CREATE TABLE IF NOT EXISTS `path` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `language` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `path_ride`
--

CREATE TABLE IF NOT EXISTS `path_ride` (
  `path` int(11) NOT NULL,
  `ride` int(11) NOT NULL,
  `next_ride` int(11) NOT NULL,
  PRIMARY KEY (`path`,`ride`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `ride`
--

CREATE TABLE IF NOT EXISTS `ride` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `language` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `session_log`
--

CREATE TABLE IF NOT EXISTS `session_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tableId` int(11) NOT NULL,
  `objectId` int(11) NOT NULL,
  `action` int(11) NOT NULL,
  `fromX` int(11) NOT NULL,
  `fromY` int(11) NOT NULL,
  `toX` int(11) NOT NULL,
  `toY` int(11) NOT NULL,
  `label` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `imageId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=574 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `session_object`
--

CREATE TABLE IF NOT EXISTS `session_object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tableId` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `label` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `session_participant`
--

CREATE TABLE IF NOT EXISTS `session_participant` (
  `tableId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  PRIMARY KEY (`tableId`,`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `session_table`
--

CREATE TABLE IF NOT EXISTS `session_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `owner` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `provider` varchar(200) CHARACTER SET latin1 NOT NULL,
  `uid` varchar(200) CHARACTER SET latin1 NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `image` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `provider_uid` (`provider`,`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user_languages`
--

CREATE TABLE IF NOT EXISTS `user_languages` (
  `user` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  PRIMARY KEY (`user`,`language`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user_ride`
--

CREATE TABLE IF NOT EXISTS `user_ride` (
  `user` int(11) NOT NULL,
  `ride` int(11) NOT NULL,
  `signee` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user`,`ride`,`signee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
