-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 11. 08 2013 kl. 21:41:07
-- Serverversion: 5.6.12-log
-- PHP-version: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
-- Struktur-dump for tabellen `feed`
--

CREATE TABLE IF NOT EXISTS `feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `action` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

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
-- Struktur-dump for tabellen `kaizen`
--

CREATE TABLE IF NOT EXISTS `kaizen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ride` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `alias_for` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `local_login`
--

CREATE TABLE IF NOT EXISTS `local_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varbinary(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=674 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `tank_login_attempts`
--

CREATE TABLE IF NOT EXISTS `tank_login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `tank_users`
--

CREATE TABLE IF NOT EXISTS `tank_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `tank_user_autologin`
--

CREATE TABLE IF NOT EXISTS `tank_user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `tank_user_profiles`
--

CREATE TABLE IF NOT EXISTS `tank_user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `image` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

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
-- Struktur-dump for tabellen `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider` varchar(200) NOT NULL,
  `uid` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
