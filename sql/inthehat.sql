-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 24. 07 2013 kl. 06:36:48
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

--
-- Data dump for tabellen `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `text`, `author`, `posted`) VALUES
(1, 'Awards?', 'awards', '<p>If it''s working, that''s nice.</p>', 1, '2013-07-15 11:27:28'),
(2, 'Again', 'again', '<p>Have to test the trackers</p>', 1, '2013-07-15 11:28:03'),
(3, 'a', 'a', '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat vitae justo eget rhoncus. Vestibulum sit amet lorem sit amet velit pulvinar molestie. Phasellus lobortis mattis magna at ullamcorper. Nam in ipsum et justo ullamcorper accumsan sed ac magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin ut tortor tempus, malesuada est sed, vulputate eros. Mauris risus tellus, sagittis vel felis non, lobortis consequat massa. Sed luctus nisl eu diam facilisis, ut feugiat odio cursus. In hac habitasse platea dictumst. Vivamus ullamcorper, purus quis consequat commodo, ipsum velit vestibulum sapien, sed tincidunt diam neque ut urna. Aliquam eu vulputate lorem.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque eget posuere eros. Nam nunc velit, placerat a scelerisque non, posuere at eros. Ut faucibus, lacus nec viverra hendrerit, mi libero vehicula massa, sed tempor metus eros quis ipsum. Donec nec risus malesuada, faucibus tellus eget, malesuada nulla. Fusce ac leo ac dui eleifend placerat vel id nulla. Vestibulum sit amet risus at ante tempus malesuada. Vivamus quis scelerisque tellus. Cras fermentum, elit eget aliquam feugiat, mauris lectus facilisis dolor, in euismod nisi enim ut tellus. In vitae aliquet diam. Pellentesque vitae risus eget enim rhoncus dictum. Proin rhoncus tellus ac tellus ornare, venenatis ultricies tortor posuere. Etiam mollis libero imperdiet, feugiat tellus vitae, pretium nulla. Integer ac felis ut sapien malesuada sollicitudin. In ac lorem iaculis, vehicula metus vitae, accumsan nunc.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque nec mauris ac sem porttitor pulvinar. Quisque ut ligula sit amet leo egestas tristique at placerat enim. Phasellus sit amet nulla elementum, egestas massa eget, semper tellus. Cras a egestas mauris, vel aliquet est. Suspendisse volutpat diam massa, sed ornare neque scelerisque tincidunt. Donec velit justo, eleifend ac justo quis, elementum ultricies orci. Vestibulum lacinia risus eu dolor pretium tincidunt. Nunc in ipsum id risus vestibulum convallis eget quis sapien.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Maecenas aliquam arcu et neque interdum ultricies. Praesent sagittis, libero tempor sagittis placerat, nisl quam interdum neque, quis molestie tortor dui ut nisi. Integer facilisis ante ut erat ultricies vestibulum. Duis ornare semper sapien. Aenean non ultrices dui, a faucibus purus. Praesent ultricies tellus at blandit adipiscing. Donec risus sapien, iaculis quis odio vitae, scelerisque auctor nisl. Donec adipiscing lectus sapien, feugiat hendrerit arcu bibendum ac.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Integer bibendum sem vel tincidunt semper. Quisque erat augue, convallis eu ultricies in, volutpat eget metus. Aliquam nec bibendum enim. Vivamus ultricies lacinia arcu et consectetur. Nulla hendrerit turpis sed ante semper, ac scelerisque velit eleifend. Nullam nulla tellus, sagittis in suscipit et, ultrices et quam. Proin tempus libero ut quam sodales egestas. Vivamus tincidunt id eros eu molestie. Nulla dui metus, laoreet id tincidunt quis, euismod ac lacus.</p>', 1, '2013-07-18 13:02:33'),
(4, '1', '1', '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat vitae justo eget rhoncus. Vestibulum sit amet lorem sit amet velit pulvinar molestie. Phasellus lobortis mattis magna at ullamcorper. Nam in ipsum et justo ullamcorper accumsan sed ac magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin ut tortor tempus, malesuada est sed, vulputate eros. Mauris risus tellus, sagittis vel felis non, lobortis consequat massa. Sed luctus nisl eu diam facilisis, ut feugiat odio cursus. In hac habitasse platea dictumst. Vivamus ullamcorper, purus quis consequat commodo, ipsum velit vestibulum sapien, sed tincidunt diam neque ut urna. Aliquam eu vulputate lorem.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque eget posuere eros. Nam nunc velit, placerat a scelerisque non, posuere at eros. Ut faucibus, lacus nec viverra hendrerit, mi libero vehicula massa, sed tempor metus eros quis ipsum. Donec nec risus malesuada, faucibus tellus eget, malesuada nulla. Fusce ac leo ac dui eleifend placerat vel id nulla. Vestibulum sit amet risus at ante tempus malesuada. Vivamus quis scelerisque tellus. Cras fermentum, elit eget aliquam feugiat, mauris lectus facilisis dolor, in euismod nisi enim ut tellus. In vitae aliquet diam. Pellentesque vitae risus eget enim rhoncus dictum. Proin rhoncus tellus ac tellus ornare, venenatis ultricies tortor posuere. Etiam mollis libero imperdiet, feugiat tellus vitae, pretium nulla. Integer ac felis ut sapien malesuada sollicitudin. In ac lorem iaculis, vehicula metus vitae, accumsan nunc.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque nec mauris ac sem porttitor pulvinar. Quisque ut ligula sit amet leo egestas tristique at placerat enim. Phasellus sit amet nulla elementum, egestas massa eget, semper tellus. Cras a egestas mauris, vel aliquet est. Suspendisse volutpat diam massa, sed ornare neque scelerisque tincidunt. Donec velit justo, eleifend ac justo quis, elementum ultricies orci. Vestibulum lacinia risus eu dolor pretium tincidunt. Nunc in ipsum id risus vestibulum convallis eget quis sapien.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Maecenas aliquam arcu et neque interdum ultricies. Praesent sagittis, libero tempor sagittis placerat, nisl quam interdum neque, quis molestie tortor dui ut nisi. Integer facilisis ante ut erat ultricies vestibulum. Duis ornare semper sapien. Aenean non ultrices dui, a faucibus purus. Praesent ultricies tellus at blandit adipiscing. Donec risus sapien, iaculis quis odio vitae, scelerisque auctor nisl. Donec adipiscing lectus sapien, feugiat hendrerit arcu bibendum ac.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Integer bibendum sem vel tincidunt semper. Quisque erat augue, convallis eu ultricies in, volutpat eget metus. Aliquam nec bibendum enim. Vivamus ultricies lacinia arcu et consectetur. Nulla hendrerit turpis sed ante semper, ac scelerisque velit eleifend. Nullam nulla tellus, sagittis in suscipit et, ultrices et quam. Proin tempus libero ut quam sodales egestas. Vivamus tincidunt id eros eu molestie. Nulla dui metus, laoreet id tincidunt quis, euismod ac lacus.</p>', 1, '2013-07-18 13:03:06'),
(5, '2', '2', '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat vitae justo eget rhoncus. Vestibulum sit amet lorem sit amet velit pulvinar molestie. Phasellus lobortis mattis magna at ullamcorper. Nam in ipsum et justo ullamcorper accumsan sed ac magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin ut tortor tempus, malesuada est sed, vulputate eros. Mauris risus tellus, sagittis vel felis non, lobortis consequat massa. Sed luctus nisl eu diam facilisis, ut feugiat odio cursus. In hac habitasse platea dictumst. Vivamus ullamcorper, purus quis consequat commodo, ipsum velit vestibulum sapien, sed tincidunt diam neque ut urna. Aliquam eu vulputate lorem.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque eget posuere eros. Nam nunc velit, placerat a scelerisque non, posuere at eros. Ut faucibus, lacus nec viverra hendrerit, mi libero vehicula massa, sed tempor metus eros quis ipsum. Donec nec risus malesuada, faucibus tellus eget, malesuada nulla. Fusce ac leo ac dui eleifend placerat vel id nulla. Vestibulum sit amet risus at ante tempus malesuada. Vivamus quis scelerisque tellus. Cras fermentum, elit eget aliquam feugiat, mauris lectus facilisis dolor, in euismod nisi enim ut tellus. In vitae aliquet diam. Pellentesque vitae risus eget enim rhoncus dictum. Proin rhoncus tellus ac tellus ornare, venenatis ultricies tortor posuere. Etiam mollis libero imperdiet, feugiat tellus vitae, pretium nulla. Integer ac felis ut sapien malesuada sollicitudin. In ac lorem iaculis, vehicula metus vitae, accumsan nunc.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque nec mauris ac sem porttitor pulvinar. Quisque ut ligula sit amet leo egestas tristique at placerat enim. Phasellus sit amet nulla elementum, egestas massa eget, semper tellus. Cras a egestas mauris, vel aliquet est. Suspendisse volutpat diam massa, sed ornare neque scelerisque tincidunt. Donec velit justo, eleifend ac justo quis, elementum ultricies orci. Vestibulum lacinia risus eu dolor pretium tincidunt. Nunc in ipsum id risus vestibulum convallis eget quis sapien.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Maecenas aliquam arcu et neque interdum ultricies. Praesent sagittis, libero tempor sagittis placerat, nisl quam interdum neque, quis molestie tortor dui ut nisi. Integer facilisis ante ut erat ultricies vestibulum. Duis ornare semper sapien. Aenean non ultrices dui, a faucibus purus. Praesent ultricies tellus at blandit adipiscing. Donec risus sapien, iaculis quis odio vitae, scelerisque auctor nisl. Donec adipiscing lectus sapien, feugiat hendrerit arcu bibendum ac.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Integer bibendum sem vel tincidunt semper. Quisque erat augue, convallis eu ultricies in, volutpat eget metus. Aliquam nec bibendum enim. Vivamus ultricies lacinia arcu et consectetur. Nulla hendrerit turpis sed ante semper, ac scelerisque velit eleifend. Nullam nulla tellus, sagittis in suscipit et, ultrices et quam. Proin tempus libero ut quam sodales egestas. Vivamus tincidunt id eros eu molestie. Nulla dui metus, laoreet id tincidunt quis, euismod ac lacus.</p>', 1, '2013-07-18 13:03:11'),
(6, '3', '3', '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat vitae justo eget rhoncus. Vestibulum sit amet lorem sit amet velit pulvinar molestie. Phasellus lobortis mattis magna at ullamcorper. Nam in ipsum et justo ullamcorper accumsan sed ac magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin ut tortor tempus, malesuada est sed, vulputate eros. Mauris risus tellus, sagittis vel felis non, lobortis consequat massa. Sed luctus nisl eu diam facilisis, ut feugiat odio cursus. In hac habitasse platea dictumst. Vivamus ullamcorper, purus quis consequat commodo, ipsum velit vestibulum sapien, sed tincidunt diam neque ut urna. Aliquam eu vulputate lorem.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque eget posuere eros. Nam nunc velit, placerat a scelerisque non, posuere at eros. Ut faucibus, lacus nec viverra hendrerit, mi libero vehicula massa, sed tempor metus eros quis ipsum. Donec nec risus malesuada, faucibus tellus eget, malesuada nulla. Fusce ac leo ac dui eleifend placerat vel id nulla. Vestibulum sit amet risus at ante tempus malesuada. Vivamus quis scelerisque tellus. Cras fermentum, elit eget aliquam feugiat, mauris lectus facilisis dolor, in euismod nisi enim ut tellus. In vitae aliquet diam. Pellentesque vitae risus eget enim rhoncus dictum. Proin rhoncus tellus ac tellus ornare, venenatis ultricies tortor posuere. Etiam mollis libero imperdiet, feugiat tellus vitae, pretium nulla. Integer ac felis ut sapien malesuada sollicitudin. In ac lorem iaculis, vehicula metus vitae, accumsan nunc.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque nec mauris ac sem porttitor pulvinar. Quisque ut ligula sit amet leo egestas tristique at placerat enim. Phasellus sit amet nulla elementum, egestas massa eget, semper tellus. Cras a egestas mauris, vel aliquet est. Suspendisse volutpat diam massa, sed ornare neque scelerisque tincidunt. Donec velit justo, eleifend ac justo quis, elementum ultricies orci. Vestibulum lacinia risus eu dolor pretium tincidunt. Nunc in ipsum id risus vestibulum convallis eget quis sapien.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Maecenas aliquam arcu et neque interdum ultricies. Praesent sagittis, libero tempor sagittis placerat, nisl quam interdum neque, quis molestie tortor dui ut nisi. Integer facilisis ante ut erat ultricies vestibulum. Duis ornare semper sapien. Aenean non ultrices dui, a faucibus purus. Praesent ultricies tellus at blandit adipiscing. Donec risus sapien, iaculis quis odio vitae, scelerisque auctor nisl. Donec adipiscing lectus sapien, feugiat hendrerit arcu bibendum ac.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Integer bibendum sem vel tincidunt semper. Quisque erat augue, convallis eu ultricies in, volutpat eget metus. Aliquam nec bibendum enim. Vivamus ultricies lacinia arcu et consectetur. Nulla hendrerit turpis sed ante semper, ac scelerisque velit eleifend. Nullam nulla tellus, sagittis in suscipit et, ultrices et quam. Proin tempus libero ut quam sodales egestas. Vivamus tincidunt id eros eu molestie. Nulla dui metus, laoreet id tincidunt quis, euismod ac lacus.</p>', 1, '2013-07-18 13:03:15'),
(7, '4', '4', '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat vitae justo eget rhoncus. Vestibulum sit amet lorem sit amet velit pulvinar molestie. Phasellus lobortis mattis magna at ullamcorper. Nam in ipsum et justo ullamcorper accumsan sed ac magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin ut tortor tempus, malesuada est sed, vulputate eros. Mauris risus tellus, sagittis vel felis non, lobortis consequat massa. Sed luctus nisl eu diam facilisis, ut feugiat odio cursus. In hac habitasse platea dictumst. Vivamus ullamcorper, purus quis consequat commodo, ipsum velit vestibulum sapien, sed tincidunt diam neque ut urna. Aliquam eu vulputate lorem.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque eget posuere eros. Nam nunc velit, placerat a scelerisque non, posuere at eros. Ut faucibus, lacus nec viverra hendrerit, mi libero vehicula massa, sed tempor metus eros quis ipsum. Donec nec risus malesuada, faucibus tellus eget, malesuada nulla. Fusce ac leo ac dui eleifend placerat vel id nulla. Vestibulum sit amet risus at ante tempus malesuada. Vivamus quis scelerisque tellus. Cras fermentum, elit eget aliquam feugiat, mauris lectus facilisis dolor, in euismod nisi enim ut tellus. In vitae aliquet diam. Pellentesque vitae risus eget enim rhoncus dictum. Proin rhoncus tellus ac tellus ornare, venenatis ultricies tortor posuere. Etiam mollis libero imperdiet, feugiat tellus vitae, pretium nulla. Integer ac felis ut sapien malesuada sollicitudin. In ac lorem iaculis, vehicula metus vitae, accumsan nunc.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque nec mauris ac sem porttitor pulvinar. Quisque ut ligula sit amet leo egestas tristique at placerat enim. Phasellus sit amet nulla elementum, egestas massa eget, semper tellus. Cras a egestas mauris, vel aliquet est. Suspendisse volutpat diam massa, sed ornare neque scelerisque tincidunt. Donec velit justo, eleifend ac justo quis, elementum ultricies orci. Vestibulum lacinia risus eu dolor pretium tincidunt. Nunc in ipsum id risus vestibulum convallis eget quis sapien.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Maecenas aliquam arcu et neque interdum ultricies. Praesent sagittis, libero tempor sagittis placerat, nisl quam interdum neque, quis molestie tortor dui ut nisi. Integer facilisis ante ut erat ultricies vestibulum. Duis ornare semper sapien. Aenean non ultrices dui, a faucibus purus. Praesent ultricies tellus at blandit adipiscing. Donec risus sapien, iaculis quis odio vitae, scelerisque auctor nisl. Donec adipiscing lectus sapien, feugiat hendrerit arcu bibendum ac.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Integer bibendum sem vel tincidunt semper. Quisque erat augue, convallis eu ultricies in, volutpat eget metus. Aliquam nec bibendum enim. Vivamus ultricies lacinia arcu et consectetur. Nulla hendrerit turpis sed ante semper, ac scelerisque velit eleifend. Nullam nulla tellus, sagittis in suscipit et, ultrices et quam. Proin tempus libero ut quam sodales egestas. Vivamus tincidunt id eros eu molestie. Nulla dui metus, laoreet id tincidunt quis, euismod ac lacus.</p>', 1, '2013-07-18 13:03:18'),
(8, '5', '5', '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat vitae justo eget rhoncus. Vestibulum sit amet lorem sit amet velit pulvinar molestie. Phasellus lobortis mattis magna at ullamcorper. Nam in ipsum et justo ullamcorper accumsan sed ac magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin ut tortor tempus, malesuada est sed, vulputate eros. Mauris risus tellus, sagittis vel felis non, lobortis consequat massa. Sed luctus nisl eu diam facilisis, ut feugiat odio cursus. In hac habitasse platea dictumst. Vivamus ullamcorper, purus quis consequat commodo, ipsum velit vestibulum sapien, sed tincidunt diam neque ut urna. Aliquam eu vulputate lorem.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque eget posuere eros. Nam nunc velit, placerat a scelerisque non, posuere at eros. Ut faucibus, lacus nec viverra hendrerit, mi libero vehicula massa, sed tempor metus eros quis ipsum. Donec nec risus malesuada, faucibus tellus eget, malesuada nulla. Fusce ac leo ac dui eleifend placerat vel id nulla. Vestibulum sit amet risus at ante tempus malesuada. Vivamus quis scelerisque tellus. Cras fermentum, elit eget aliquam feugiat, mauris lectus facilisis dolor, in euismod nisi enim ut tellus. In vitae aliquet diam. Pellentesque vitae risus eget enim rhoncus dictum. Proin rhoncus tellus ac tellus ornare, venenatis ultricies tortor posuere. Etiam mollis libero imperdiet, feugiat tellus vitae, pretium nulla. Integer ac felis ut sapien malesuada sollicitudin. In ac lorem iaculis, vehicula metus vitae, accumsan nunc.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque nec mauris ac sem porttitor pulvinar. Quisque ut ligula sit amet leo egestas tristique at placerat enim. Phasellus sit amet nulla elementum, egestas massa eget, semper tellus. Cras a egestas mauris, vel aliquet est. Suspendisse volutpat diam massa, sed ornare neque scelerisque tincidunt. Donec velit justo, eleifend ac justo quis, elementum ultricies orci. Vestibulum lacinia risus eu dolor pretium tincidunt. Nunc in ipsum id risus vestibulum convallis eget quis sapien.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Maecenas aliquam arcu et neque interdum ultricies. Praesent sagittis, libero tempor sagittis placerat, nisl quam interdum neque, quis molestie tortor dui ut nisi. Integer facilisis ante ut erat ultricies vestibulum. Duis ornare semper sapien. Aenean non ultrices dui, a faucibus purus. Praesent ultricies tellus at blandit adipiscing. Donec risus sapien, iaculis quis odio vitae, scelerisque auctor nisl. Donec adipiscing lectus sapien, feugiat hendrerit arcu bibendum ac.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Integer bibendum sem vel tincidunt semper. Quisque erat augue, convallis eu ultricies in, volutpat eget metus. Aliquam nec bibendum enim. Vivamus ultricies lacinia arcu et consectetur. Nulla hendrerit turpis sed ante semper, ac scelerisque velit eleifend. Nullam nulla tellus, sagittis in suscipit et, ultrices et quam. Proin tempus libero ut quam sodales egestas. Vivamus tincidunt id eros eu molestie. Nulla dui metus, laoreet id tincidunt quis, euismod ac lacus.</p>', 1, '2013-07-18 13:03:25'),
(9, '6', '6', '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat vitae justo eget rhoncus. Vestibulum sit amet lorem sit amet velit pulvinar molestie. Phasellus lobortis mattis magna at ullamcorper. Nam in ipsum et justo ullamcorper accumsan sed ac magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin ut tortor tempus, malesuada est sed, vulputate eros. Mauris risus tellus, sagittis vel felis non, lobortis consequat massa. Sed luctus nisl eu diam facilisis, ut feugiat odio cursus. In hac habitasse platea dictumst. Vivamus ullamcorper, purus quis consequat commodo, ipsum velit vestibulum sapien, sed tincidunt diam neque ut urna. Aliquam eu vulputate lorem.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque eget posuere eros. Nam nunc velit, placerat a scelerisque non, posuere at eros. Ut faucibus, lacus nec viverra hendrerit, mi libero vehicula massa, sed tempor metus eros quis ipsum. Donec nec risus malesuada, faucibus tellus eget, malesuada nulla. Fusce ac leo ac dui eleifend placerat vel id nulla. Vestibulum sit amet risus at ante tempus malesuada. Vivamus quis scelerisque tellus. Cras fermentum, elit eget aliquam feugiat, mauris lectus facilisis dolor, in euismod nisi enim ut tellus. In vitae aliquet diam. Pellentesque vitae risus eget enim rhoncus dictum. Proin rhoncus tellus ac tellus ornare, venenatis ultricies tortor posuere. Etiam mollis libero imperdiet, feugiat tellus vitae, pretium nulla. Integer ac felis ut sapien malesuada sollicitudin. In ac lorem iaculis, vehicula metus vitae, accumsan nunc.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque nec mauris ac sem porttitor pulvinar. Quisque ut ligula sit amet leo egestas tristique at placerat enim. Phasellus sit amet nulla elementum, egestas massa eget, semper tellus. Cras a egestas mauris, vel aliquet est. Suspendisse volutpat diam massa, sed ornare neque scelerisque tincidunt. Donec velit justo, eleifend ac justo quis, elementum ultricies orci. Vestibulum lacinia risus eu dolor pretium tincidunt. Nunc in ipsum id risus vestibulum convallis eget quis sapien.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Maecenas aliquam arcu et neque interdum ultricies. Praesent sagittis, libero tempor sagittis placerat, nisl quam interdum neque, quis molestie tortor dui ut nisi. Integer facilisis ante ut erat ultricies vestibulum. Duis ornare semper sapien. Aenean non ultrices dui, a faucibus purus. Praesent ultricies tellus at blandit adipiscing. Donec risus sapien, iaculis quis odio vitae, scelerisque auctor nisl. Donec adipiscing lectus sapien, feugiat hendrerit arcu bibendum ac.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Integer bibendum sem vel tincidunt semper. Quisque erat augue, convallis eu ultricies in, volutpat eget metus. Aliquam nec bibendum enim. Vivamus ultricies lacinia arcu et consectetur. Nulla hendrerit turpis sed ante semper, ac scelerisque velit eleifend. Nullam nulla tellus, sagittis in suscipit et, ultrices et quam. Proin tempus libero ut quam sodales egestas. Vivamus tincidunt id eros eu molestie. Nulla dui metus, laoreet id tincidunt quis, euismod ac lacus.</p>', 1, '2013-07-18 13:03:29'),
(10, '7', '7', '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat vitae justo eget rhoncus. Vestibulum sit amet lorem sit amet velit pulvinar molestie. Phasellus lobortis mattis magna at ullamcorper. Nam in ipsum et justo ullamcorper accumsan sed ac magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin ut tortor tempus, malesuada est sed, vulputate eros. Mauris risus tellus, sagittis vel felis non, lobortis consequat massa. Sed luctus nisl eu diam facilisis, ut feugiat odio cursus. In hac habitasse platea dictumst. Vivamus ullamcorper, purus quis consequat commodo, ipsum velit vestibulum sapien, sed tincidunt diam neque ut urna. Aliquam eu vulputate lorem.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque eget posuere eros. Nam nunc velit, placerat a scelerisque non, posuere at eros. Ut faucibus, lacus nec viverra hendrerit, mi libero vehicula massa, sed tempor metus eros quis ipsum. Donec nec risus malesuada, faucibus tellus eget, malesuada nulla. Fusce ac leo ac dui eleifend placerat vel id nulla. Vestibulum sit amet risus at ante tempus malesuada. Vivamus quis scelerisque tellus. Cras fermentum, elit eget aliquam feugiat, mauris lectus facilisis dolor, in euismod nisi enim ut tellus. In vitae aliquet diam. Pellentesque vitae risus eget enim rhoncus dictum. Proin rhoncus tellus ac tellus ornare, venenatis ultricies tortor posuere. Etiam mollis libero imperdiet, feugiat tellus vitae, pretium nulla. Integer ac felis ut sapien malesuada sollicitudin. In ac lorem iaculis, vehicula metus vitae, accumsan nunc.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque nec mauris ac sem porttitor pulvinar. Quisque ut ligula sit amet leo egestas tristique at placerat enim. Phasellus sit amet nulla elementum, egestas massa eget, semper tellus. Cras a egestas mauris, vel aliquet est. Suspendisse volutpat diam massa, sed ornare neque scelerisque tincidunt. Donec velit justo, eleifend ac justo quis, elementum ultricies orci. Vestibulum lacinia risus eu dolor pretium tincidunt. Nunc in ipsum id risus vestibulum convallis eget quis sapien.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Maecenas aliquam arcu et neque interdum ultricies. Praesent sagittis, libero tempor sagittis placerat, nisl quam interdum neque, quis molestie tortor dui ut nisi. Integer facilisis ante ut erat ultricies vestibulum. Duis ornare semper sapien. Aenean non ultrices dui, a faucibus purus. Praesent ultricies tellus at blandit adipiscing. Donec risus sapien, iaculis quis odio vitae, scelerisque auctor nisl. Donec adipiscing lectus sapien, feugiat hendrerit arcu bibendum ac.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Integer bibendum sem vel tincidunt semper. Quisque erat augue, convallis eu ultricies in, volutpat eget metus. Aliquam nec bibendum enim. Vivamus ultricies lacinia arcu et consectetur. Nulla hendrerit turpis sed ante semper, ac scelerisque velit eleifend. Nullam nulla tellus, sagittis in suscipit et, ultrices et quam. Proin tempus libero ut quam sodales egestas. Vivamus tincidunt id eros eu molestie. Nulla dui metus, laoreet id tincidunt quis, euismod ac lacus.</p>', 1, '2013-07-18 13:03:33'),
(11, '8', '8', '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat vitae justo eget rhoncus. Vestibulum sit amet lorem sit amet velit pulvinar molestie. Phasellus lobortis mattis magna at ullamcorper. Nam in ipsum et justo ullamcorper accumsan sed ac magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin ut tortor tempus, malesuada est sed, vulputate eros. Mauris risus tellus, sagittis vel felis non, lobortis consequat massa. Sed luctus nisl eu diam facilisis, ut feugiat odio cursus. In hac habitasse platea dictumst. Vivamus ullamcorper, purus quis consequat commodo, ipsum velit vestibulum sapien, sed tincidunt diam neque ut urna. Aliquam eu vulputate lorem.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque eget posuere eros. Nam nunc velit, placerat a scelerisque non, posuere at eros. Ut faucibus, lacus nec viverra hendrerit, mi libero vehicula massa, sed tempor metus eros quis ipsum. Donec nec risus malesuada, faucibus tellus eget, malesuada nulla. Fusce ac leo ac dui eleifend placerat vel id nulla. Vestibulum sit amet risus at ante tempus malesuada. Vivamus quis scelerisque tellus. Cras fermentum, elit eget aliquam feugiat, mauris lectus facilisis dolor, in euismod nisi enim ut tellus. In vitae aliquet diam. Pellentesque vitae risus eget enim rhoncus dictum. Proin rhoncus tellus ac tellus ornare, venenatis ultricies tortor posuere. Etiam mollis libero imperdiet, feugiat tellus vitae, pretium nulla. Integer ac felis ut sapien malesuada sollicitudin. In ac lorem iaculis, vehicula metus vitae, accumsan nunc.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque nec mauris ac sem porttitor pulvinar. Quisque ut ligula sit amet leo egestas tristique at placerat enim. Phasellus sit amet nulla elementum, egestas massa eget, semper tellus. Cras a egestas mauris, vel aliquet est. Suspendisse volutpat diam massa, sed ornare neque scelerisque tincidunt. Donec velit justo, eleifend ac justo quis, elementum ultricies orci. Vestibulum lacinia risus eu dolor pretium tincidunt. Nunc in ipsum id risus vestibulum convallis eget quis sapien.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Maecenas aliquam arcu et neque interdum ultricies. Praesent sagittis, libero tempor sagittis placerat, nisl quam interdum neque, quis molestie tortor dui ut nisi. Integer facilisis ante ut erat ultricies vestibulum. Duis ornare semper sapien. Aenean non ultrices dui, a faucibus purus. Praesent ultricies tellus at blandit adipiscing. Donec risus sapien, iaculis quis odio vitae, scelerisque auctor nisl. Donec adipiscing lectus sapien, feugiat hendrerit arcu bibendum ac.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Integer bibendum sem vel tincidunt semper. Quisque erat augue, convallis eu ultricies in, volutpat eget metus. Aliquam nec bibendum enim. Vivamus ultricies lacinia arcu et consectetur. Nulla hendrerit turpis sed ante semper, ac scelerisque velit eleifend. Nullam nulla tellus, sagittis in suscipit et, ultrices et quam. Proin tempus libero ut quam sodales egestas. Vivamus tincidunt id eros eu molestie. Nulla dui metus, laoreet id tincidunt quis, euismod ac lacus.</p>', 1, '2013-07-18 13:03:36'),
(12, '9', '9', '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat vitae justo eget rhoncus. Vestibulum sit amet lorem sit amet velit pulvinar molestie. Phasellus lobortis mattis magna at ullamcorper. Nam in ipsum et justo ullamcorper accumsan sed ac magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin ut tortor tempus, malesuada est sed, vulputate eros. Mauris risus tellus, sagittis vel felis non, lobortis consequat massa. Sed luctus nisl eu diam facilisis, ut feugiat odio cursus. In hac habitasse platea dictumst. Vivamus ullamcorper, purus quis consequat commodo, ipsum velit vestibulum sapien, sed tincidunt diam neque ut urna. Aliquam eu vulputate lorem.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque eget posuere eros. Nam nunc velit, placerat a scelerisque non, posuere at eros. Ut faucibus, lacus nec viverra hendrerit, mi libero vehicula massa, sed tempor metus eros quis ipsum. Donec nec risus malesuada, faucibus tellus eget, malesuada nulla. Fusce ac leo ac dui eleifend placerat vel id nulla. Vestibulum sit amet risus at ante tempus malesuada. Vivamus quis scelerisque tellus. Cras fermentum, elit eget aliquam feugiat, mauris lectus facilisis dolor, in euismod nisi enim ut tellus. In vitae aliquet diam. Pellentesque vitae risus eget enim rhoncus dictum. Proin rhoncus tellus ac tellus ornare, venenatis ultricies tortor posuere. Etiam mollis libero imperdiet, feugiat tellus vitae, pretium nulla. Integer ac felis ut sapien malesuada sollicitudin. In ac lorem iaculis, vehicula metus vitae, accumsan nunc.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque nec mauris ac sem porttitor pulvinar. Quisque ut ligula sit amet leo egestas tristique at placerat enim. Phasellus sit amet nulla elementum, egestas massa eget, semper tellus. Cras a egestas mauris, vel aliquet est. Suspendisse volutpat diam massa, sed ornare neque scelerisque tincidunt. Donec velit justo, eleifend ac justo quis, elementum ultricies orci. Vestibulum lacinia risus eu dolor pretium tincidunt. Nunc in ipsum id risus vestibulum convallis eget quis sapien.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Maecenas aliquam arcu et neque interdum ultricies. Praesent sagittis, libero tempor sagittis placerat, nisl quam interdum neque, quis molestie tortor dui ut nisi. Integer facilisis ante ut erat ultricies vestibulum. Duis ornare semper sapien. Aenean non ultrices dui, a faucibus purus. Praesent ultricies tellus at blandit adipiscing. Donec risus sapien, iaculis quis odio vitae, scelerisque auctor nisl. Donec adipiscing lectus sapien, feugiat hendrerit arcu bibendum ac.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Integer bibendum sem vel tincidunt semper. Quisque erat augue, convallis eu ultricies in, volutpat eget metus. Aliquam nec bibendum enim. Vivamus ultricies lacinia arcu et consectetur. Nulla hendrerit turpis sed ante semper, ac scelerisque velit eleifend. Nullam nulla tellus, sagittis in suscipit et, ultrices et quam. Proin tempus libero ut quam sodales egestas. Vivamus tincidunt id eros eu molestie. Nulla dui metus, laoreet id tincidunt quis, euismod ac lacus.</p>', 1, '2013-07-18 13:03:40'),
(13, '10', '10', '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat vitae justo eget rhoncus. Vestibulum sit amet lorem sit amet velit pulvinar molestie. Phasellus lobortis mattis magna at ullamcorper. Nam in ipsum et justo ullamcorper accumsan sed ac magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin ut tortor tempus, malesuada est sed, vulputate eros. Mauris risus tellus, sagittis vel felis non, lobortis consequat massa. Sed luctus nisl eu diam facilisis, ut feugiat odio cursus. In hac habitasse platea dictumst. Vivamus ullamcorper, purus quis consequat commodo, ipsum velit vestibulum sapien, sed tincidunt diam neque ut urna. Aliquam eu vulputate lorem.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque eget posuere eros. Nam nunc velit, placerat a scelerisque non, posuere at eros. Ut faucibus, lacus nec viverra hendrerit, mi libero vehicula massa, sed tempor metus eros quis ipsum. Donec nec risus malesuada, faucibus tellus eget, malesuada nulla. Fusce ac leo ac dui eleifend placerat vel id nulla. Vestibulum sit amet risus at ante tempus malesuada. Vivamus quis scelerisque tellus. Cras fermentum, elit eget aliquam feugiat, mauris lectus facilisis dolor, in euismod nisi enim ut tellus. In vitae aliquet diam. Pellentesque vitae risus eget enim rhoncus dictum. Proin rhoncus tellus ac tellus ornare, venenatis ultricies tortor posuere. Etiam mollis libero imperdiet, feugiat tellus vitae, pretium nulla. Integer ac felis ut sapien malesuada sollicitudin. In ac lorem iaculis, vehicula metus vitae, accumsan nunc.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque nec mauris ac sem porttitor pulvinar. Quisque ut ligula sit amet leo egestas tristique at placerat enim. Phasellus sit amet nulla elementum, egestas massa eget, semper tellus. Cras a egestas mauris, vel aliquet est. Suspendisse volutpat diam massa, sed ornare neque scelerisque tincidunt. Donec velit justo, eleifend ac justo quis, elementum ultricies orci. Vestibulum lacinia risus eu dolor pretium tincidunt. Nunc in ipsum id risus vestibulum convallis eget quis sapien.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Maecenas aliquam arcu et neque interdum ultricies. Praesent sagittis, libero tempor sagittis placerat, nisl quam interdum neque, quis molestie tortor dui ut nisi. Integer facilisis ante ut erat ultricies vestibulum. Duis ornare semper sapien. Aenean non ultrices dui, a faucibus purus. Praesent ultricies tellus at blandit adipiscing. Donec risus sapien, iaculis quis odio vitae, scelerisque auctor nisl. Donec adipiscing lectus sapien, feugiat hendrerit arcu bibendum ac.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Integer bibendum sem vel tincidunt semper. Quisque erat augue, convallis eu ultricies in, volutpat eget metus. Aliquam nec bibendum enim. Vivamus ultricies lacinia arcu et consectetur. Nulla hendrerit turpis sed ante semper, ac scelerisque velit eleifend. Nullam nulla tellus, sagittis in suscipit et, ultrices et quam. Proin tempus libero ut quam sodales egestas. Vivamus tincidunt id eros eu molestie. Nulla dui metus, laoreet id tincidunt quis, euismod ac lacus.</p>', 1, '2013-07-18 13:03:45'),
(14, '11', '11', '<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus volutpat vitae justo eget rhoncus. Vestibulum sit amet lorem sit amet velit pulvinar molestie. Phasellus lobortis mattis magna at ullamcorper. Nam in ipsum et justo ullamcorper accumsan sed ac magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin ut tortor tempus, malesuada est sed, vulputate eros. Mauris risus tellus, sagittis vel felis non, lobortis consequat massa. Sed luctus nisl eu diam facilisis, ut feugiat odio cursus. In hac habitasse platea dictumst. Vivamus ullamcorper, purus quis consequat commodo, ipsum velit vestibulum sapien, sed tincidunt diam neque ut urna. Aliquam eu vulputate lorem.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque eget posuere eros. Nam nunc velit, placerat a scelerisque non, posuere at eros. Ut faucibus, lacus nec viverra hendrerit, mi libero vehicula massa, sed tempor metus eros quis ipsum. Donec nec risus malesuada, faucibus tellus eget, malesuada nulla. Fusce ac leo ac dui eleifend placerat vel id nulla. Vestibulum sit amet risus at ante tempus malesuada. Vivamus quis scelerisque tellus. Cras fermentum, elit eget aliquam feugiat, mauris lectus facilisis dolor, in euismod nisi enim ut tellus. In vitae aliquet diam. Pellentesque vitae risus eget enim rhoncus dictum. Proin rhoncus tellus ac tellus ornare, venenatis ultricies tortor posuere. Etiam mollis libero imperdiet, feugiat tellus vitae, pretium nulla. Integer ac felis ut sapien malesuada sollicitudin. In ac lorem iaculis, vehicula metus vitae, accumsan nunc.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Pellentesque nec mauris ac sem porttitor pulvinar. Quisque ut ligula sit amet leo egestas tristique at placerat enim. Phasellus sit amet nulla elementum, egestas massa eget, semper tellus. Cras a egestas mauris, vel aliquet est. Suspendisse volutpat diam massa, sed ornare neque scelerisque tincidunt. Donec velit justo, eleifend ac justo quis, elementum ultricies orci. Vestibulum lacinia risus eu dolor pretium tincidunt. Nunc in ipsum id risus vestibulum convallis eget quis sapien.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Maecenas aliquam arcu et neque interdum ultricies. Praesent sagittis, libero tempor sagittis placerat, nisl quam interdum neque, quis molestie tortor dui ut nisi. Integer facilisis ante ut erat ultricies vestibulum. Duis ornare semper sapien. Aenean non ultrices dui, a faucibus purus. Praesent ultricies tellus at blandit adipiscing. Donec risus sapien, iaculis quis odio vitae, scelerisque auctor nisl. Donec adipiscing lectus sapien, feugiat hendrerit arcu bibendum ac.</p>\r\n<p style="text-align: justify; font-size: 11px; line-height: 14px; margin: 0px 0px 14px; padding: 0px; font-family: Arial, Helvetica, sans;">Integer bibendum sem vel tincidunt semper. Quisque erat augue, convallis eu ultricies in, volutpat eget metus. Aliquam nec bibendum enim. Vivamus ultricies lacinia arcu et consectetur. Nulla hendrerit turpis sed ante semper, ac scelerisque velit eleifend. Nullam nulla tellus, sagittis in suscipit et, ultrices et quam. Proin tempus libero ut quam sodales egestas. Vivamus tincidunt id eros eu molestie. Nulla dui metus, laoreet id tincidunt quis, euismod ac lacus.</p>', 1, '2013-07-18 13:03:49');

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

--
-- Data dump for tabellen `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('375783f20509ec5aea96ea9d5bc9c806', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.72 Safari/537.36', 1374613222, 'a:4:{s:5:"state";s:32:"d1181e1b03c0ea8d47a8f27734efd757";s:2:"id";s:1:"1";s:4:"name";s:12:"Arne Sostack";s:5:"image";s:98:"https://lh6.googleusercontent.com/-NBkAkb1DEg4/AAAAAAAAAAI/AAAAAAAAAIk/iXLA6cDzpJ4/photo.jpg?sz=50";}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Data dump for tabellen `image`
--

INSERT INTO `image` (`id`, `label`, `path`, `folderId`) VALUES
(1, 'Empty cup', 'empty_cup.png', 3),
(2, 'Coffee', 'coffee_cup.png', 3),
(3, 'Rock', '003.png', 2),
(4, 'Stick', '004.png', 2),
(5, 'Red pen', '001.png', 2),
(6, 'Black pen', '002.png', 2);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `image_folder`
--

CREATE TABLE IF NOT EXISTS `image_folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folderId` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Data dump for tabellen `image_folder`
--

INSERT INTO `image_folder` (`id`, `folderId`, `name`) VALUES
(1, 0, 'Objects'),
(2, 1, 'Basic four'),
(3, 1, 'Cups');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Data dump for tabellen `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(2, 'Dansk'),
(3, 'English'),
(4, 'Hungarian'),
(5, 'Español'),
(6, 'Nihongo'),
(7, 'Ho'),
(8, 'H'),
(9, 'Hollandish'),
(10, 'Dutch'),
(11, 'Flemish'),
(12, 'Lettish'),
(13, 'Greek'),
(14, 'Deutsch'),
(15, '["Dansk"]'),
(16, 'Esperanto'),
(17, 'Hindi'),
(18, 'Osmannic');

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

--
-- Data dump for tabellen `path`
--

INSERT INTO `path` (`id`, `name`, `language`, `owner`) VALUES
(1, 'Danish for beginners', 2, 1),
(2, 'The fast way to go', 2, 1);

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

--
-- Data dump for tabellen `path_ride`
--

INSERT INTO `path_ride` (`path`, `ride`, `next_ride`) VALUES
(1, 1, 9),
(1, 8, 0),
(1, 9, 8),
(2, 1, 0);

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

--
-- Data dump for tabellen `ride`
--

INSERT INTO `ride` (`id`, `name`, `language`, `description`, `author`) VALUES
(1, 'Hvad er det?', 2, '<p>Hvad er det?</p>\r\n<p>Det er en sten</p>\r\n<p>Hvad er det?</p>\r\n<p>Det er en pind</p>', 1),
(2, 'What is that?', 3, '<p>Coming up</p>', 1),
(3, 'Hungarian what is that?', 4, '<p>Can''t do that</p>', 1),
(4, 'Test ride', 3, '<p>Another ride</p>', 1),
(5, 'Test ride 2', 5, '<p>Omg! Do I get an award?</p>', 1),
(6, 'Test ride 3', 5, '<p>blah</p>', 1),
(7, 'Hindi test', 17, '<p>Test test</p>', 1),
(8, 'Hvis er det?', 2, '<pre>P1: Hvad er det?\r\nP2: Det er en sten\r\nP1: Hvis sten er det?\r\nP2: Det er din sten\r\nP1: Er det min sten?\r\nP2: Ja, det er din sten\r\n\r\nP1: Hvad er det?\r\nP2: Det er en bold\r\nP1: Hvis bold er det?\r\nP2: Det er min bold\r\nP1: Er det din bold?\r\nP2: Ja, det er min bold\r\n\r\nP1: Hvad er det?\r\nP2: Det er en r&oslash;d pen\r\nP1: Hvis r&oslash;de pen er det?\r\nP2: Det er min r&oslash;de pen\r\nP1: Er det din r&oslash;de pen?\r\nP2: Ja, det er min r&oslash;de pen\r\n\r\nP1: Hvad er det?\r\nP2: Det er en sort pen\r\nP1: Hvis sorte pen er det?\r\nP2: Det er din sorte pen\r\nP1: Er det min sorte pen?\r\nP2: Ja, det er din sorte pen\r\n\r\nP1: Hvad er det?\r\nP2: Det er din sten\r\nP1: Er det din sten?\r\nP2: Nej, det er ikke min sten, det er din sten\r\n\r\nP1: Hvad er det?\r\nP2: Det er min bold\r\nP1: Er det min bold?\r\nP2: Nej, det er ikke din bold, det er min bold\r\n\r\nP1: Hvad er det?\r\nP2: Det er min r&oslash;de pen\r\nP1: Er det min r&oslash;de pen?\r\nP2: Nej, det er ikke din r&oslash;de pen, det er min r&oslash;de pen\r\n\r\nP1: Hvad er det?\r\nP2: Det er din sorte pen\r\nP1: Er det din sorte pen?\r\nP2: Nej, det er ikke min sorte pen, det er din sorte pen</pre>', 1),
(9, 'Er det en ...?', 2, '<p>bla bla</p>', 1),
(10, 'Test adding', 18, '<p>Osmannic</p>', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=489 ;

--
-- Data dump for tabellen `session_log`
--

INSERT INTO `session_log` (`id`, `tableId`, `objectId`, `action`, `fromX`, `fromY`, `toX`, `toY`, `label`, `imageId`) VALUES
(1, 1, 1, 5, 0, 0, 0, 0, '', 0),
(2, 1, 1, 7, 0, 0, 4, 0, '', 0),
(3, 1, 1, 6, 0, 0, 0, 0, '', 0),
(4, 1, 1, 5, 0, 0, 0, 0, '', 0),
(5, 1, 1, 7, 0, 0, 1, 0, '', 0),
(6, 1, 1, 6, 0, 0, 0, 0, '', 0),
(7, 1, 1, 5, 0, 0, 0, 0, '', 0),
(8, 1, 1, 6, 0, 0, 0, 0, '', 0),
(9, 1, 1, 5, 0, 0, 0, 0, '', 0),
(10, 1, 1, 6, 0, 0, 0, 0, '', 0),
(11, 1, 1, 5, 0, 0, 0, 0, '', 0),
(12, 1, 1, 6, 0, 0, 0, 0, '', 0),
(13, 1, 1, 5, 0, 0, 0, 0, '', 0),
(14, 1, 1, 6, 0, 0, 0, 0, '', 0),
(15, 1, 1, 5, 0, 0, 0, 0, '', 0),
(16, 1, 1, 6, 0, 0, 0, 0, '', 0),
(17, 1, 1, 5, 0, 0, 0, 0, '', 0),
(18, 1, 1, 6, 0, 0, 0, 0, '', 0),
(19, 1, 1, 5, 0, 0, 0, 0, '', 0),
(20, 1, 1, 6, 0, 0, 0, 0, '', 0),
(21, 1, 1, 5, 0, 0, 0, 0, '', 0),
(22, 1, 1, 6, 0, 0, 0, 0, '', 0),
(23, 1, 1, 5, 0, 0, 0, 0, '', 0),
(24, 1, 1, 6, 0, 0, 0, 0, '', 0),
(25, 1, 1, 5, 0, 0, 0, 0, '', 0),
(26, 1, 1, 6, 0, 0, 0, 0, '', 0),
(27, 1, 1, 5, 0, 0, 0, 0, '', 0),
(28, 1, 1, 6, 0, 0, 0, 0, '', 0),
(29, 1, 1, 5, 0, 0, 0, 0, '', 0),
(30, 1, 1, 6, 0, 0, 0, 0, '', 0),
(31, 1, 1, 5, 0, 0, 0, 0, '', 0),
(32, 1, 1, 4, 0, 0, 506, 134, '0', 2),
(33, 1, 2, 4, 0, 0, 572, 248, '0', 1),
(34, 1, 3, 4, 0, 0, 655, 212, '0', 1),
(35, 1, 4, 4, 0, 0, 341, 87, '0', 1),
(36, 1, 1, 6, 0, 0, 0, 0, '', 0),
(37, 1, 1, 5, 0, 0, 0, 0, '', 0),
(38, 1, 1, 6, 0, 0, 0, 0, '', 0),
(39, 1, 1, 5, 0, 0, 0, 0, '', 0),
(40, 1, 1, 6, 0, 0, 0, 0, '', 0),
(41, 1, 1, 5, 0, 0, 0, 0, '', 0),
(42, 1, 1, 6, 0, 0, 0, 0, '', 0),
(43, 1, 1, 5, 0, 0, 0, 0, '', 0),
(44, 1, 1, 6, 0, 0, 0, 0, '', 0),
(45, 1, 1, 5, 0, 0, 0, 0, '', 0),
(46, 1, 1, 6, 0, 0, 0, 0, '', 0),
(47, 1, 1, 5, 0, 0, 0, 0, '', 0),
(48, 1, 1, 6, 0, 0, 0, 0, '', 0),
(49, 1, 1, 5, 0, 0, 0, 0, '', 0),
(50, 1, 1, 6, 0, 0, 0, 0, '', 0),
(51, 1, 1, 5, 0, 0, 0, 0, '', 0),
(52, 1, 1, 6, 0, 0, 0, 0, '', 0),
(53, 1, 1, 5, 0, 0, 0, 0, '', 0),
(54, 1, 1, 6, 0, 0, 0, 0, '', 0),
(55, 1, 1, 5, 0, 0, 0, 0, '', 0),
(56, 1, 1, 6, 0, 0, 0, 0, '', 0),
(57, 1, 1, 5, 0, 0, 0, 0, '', 0),
(58, 1, 1, 6, 0, 0, 0, 0, '', 0),
(59, 1, 1, 5, 0, 0, 0, 0, '', 0),
(60, 1, 1, 6, 0, 0, 0, 0, '', 0),
(61, 1, 1, 5, 0, 0, 0, 0, '', 0),
(62, 1, 5, 4, 0, 0, 449, 164, '0', 6),
(63, 1, 6, 4, 0, 0, 452, 121, '0', 6),
(64, 1, 1, 6, 0, 0, 0, 0, '', 0),
(65, 1, 1, 5, 0, 0, 0, 0, '', 0),
(66, 1, 1, 6, 0, 0, 0, 0, '', 0),
(67, 1, 1, 5, 0, 0, 0, 0, '', 0),
(68, 1, 7, 4, 0, 0, 387, 113, '0', 2),
(69, 1, 8, 4, 0, 0, 432, 70, '0', 1),
(70, 1, 1, 6, 0, 0, 0, 0, '', 0),
(71, 1, 1, 5, 0, 0, 0, 0, '', 0),
(72, 1, 9, 4, 0, 0, 495, 182, '0', 6),
(73, 1, 1, 6, 0, 0, 0, 0, '', 0),
(74, 1, 1, 5, 0, 0, 0, 0, '', 0),
(75, 1, 10, 4, 0, 0, 492, 141, '0', 6),
(76, 1, 11, 4, 0, 0, 569, 131, '0', 5),
(77, 1, 1, 6, 0, 0, 0, 0, '', 0),
(78, 1, 1, 5, 0, 0, 0, 0, '', 0),
(79, 1, 1, 6, 0, 0, 0, 0, '', 0),
(80, 1, 1, 5, 0, 0, 0, 0, '', 0),
(81, 1, 1, 6, 0, 0, 0, 0, '', 0),
(82, 1, 1, 5, 0, 0, 0, 0, '', 0),
(83, 1, 1, 6, 0, 0, 0, 0, '', 0),
(84, 1, 1, 5, 0, 0, 0, 0, '', 0),
(85, 1, 1, 6, 0, 0, 0, 0, '', 0),
(86, 1, 1, 5, 0, 0, 0, 0, '', 0),
(87, 1, 1, 6, 0, 0, 0, 0, '', 0),
(88, 1, 1, 5, 0, 0, 0, 0, '', 0),
(89, 1, 1, 6, 0, 0, 0, 0, '', 0),
(90, 1, 1, 5, 0, 0, 0, 0, '', 0),
(91, 1, 1, 6, 0, 0, 0, 0, '', 0),
(92, 1, 1, 5, 0, 0, 0, 0, '', 0),
(93, 1, 1, 6, 0, 0, 0, 0, '', 0),
(94, 1, 1, 5, 0, 0, 0, 0, '', 0),
(95, 1, 1, 6, 0, 0, 0, 0, '', 0),
(96, 1, 1, 5, 0, 0, 0, 0, '', 0),
(97, 1, 1, 6, 0, 0, 0, 0, '', 0),
(98, 1, 1, 5, 0, 0, 0, 0, '', 0),
(99, 1, 1, 6, 0, 0, 0, 0, '', 0),
(100, 1, 1, 5, 0, 0, 0, 0, '', 0),
(101, 1, 1, 7, 0, 0, 1, 0, '', 0),
(102, 1, 1, 6, 0, 0, 0, 0, '', 0),
(103, 1, 1, 5, 0, 0, 0, 0, '', 0),
(104, 1, 1, 7, 0, 0, 1, 0, '', 0),
(105, 1, 1, 6, 0, 0, 0, 0, '', 0),
(106, 1, 1, 5, 0, 0, 0, 0, '', 0),
(107, 1, 1, 7, 0, 0, 1, 0, '', 0),
(108, 1, 1, 6, 0, 0, 0, 0, '', 0),
(109, 1, 1, 5, 0, 0, 0, 0, '', 0),
(110, 1, 1, 6, 0, 0, 0, 0, '', 0),
(111, 1, 1, 5, 0, 0, 0, 0, '', 0),
(112, 1, 1, 7, 0, 0, 1, 0, '', 0),
(113, 1, 1, 7, 0, 0, 4, 0, '', 0),
(114, 1, 3, 3, 0, 0, 0, 0, '', 0),
(115, 1, 11, 3, 0, 0, 0, 0, '', 0),
(116, 1, 10, 3, 0, 0, 0, 0, '', 0),
(117, 1, 1, 3, 0, 0, 0, 0, '', 0),
(118, 1, 6, 3, 0, 0, 0, 0, '', 0),
(119, 1, 8, 3, 0, 0, 0, 0, '', 0),
(120, 1, 4, 3, 0, 0, 0, 0, '', 0),
(121, 1, 7, 3, 0, 0, 0, 0, '', 0),
(122, 1, 5, 3, 0, 0, 0, 0, '', 0),
(123, 1, 9, 3, 0, 0, 0, 0, '', 0),
(124, 1, 2, 3, 0, 0, 0, 0, '', 0),
(125, 1, 1, 6, 0, 0, 0, 0, '', 0),
(126, 1, 1, 5, 0, 0, 0, 0, '', 0),
(127, 1, 1, 6, 0, 0, 0, 0, '', 0),
(128, 1, 1, 5, 0, 0, 0, 0, '', 0),
(129, 1, 1, 6, 0, 0, 0, 0, '', 0),
(130, 1, 1, 5, 0, 0, 0, 0, '', 0),
(131, 1, 1, 6, 0, 0, 0, 0, '', 0),
(132, 1, 1, 5, 0, 0, 0, 0, '', 0),
(133, 1, 1, 6, 0, 0, 0, 0, '', 0),
(134, 1, 1, 5, 0, 0, 0, 0, '', 0),
(135, 1, 1, 6, 0, 0, 0, 0, '', 0),
(136, 1, 1, 5, 0, 0, 0, 0, '', 0),
(137, 1, 1, 6, 0, 0, 0, 0, '', 0),
(138, 1, 1, 5, 0, 0, 0, 0, '', 0),
(139, 1, 12, 4, 0, 0, 990, 160, '0', 6),
(140, 1, 13, 4, 0, 0, 772, 112, '0', 6),
(141, 1, 14, 4, 0, 0, 527, 167, '0', 6),
(142, 1, 1, 6, 0, 0, 0, 0, '', 0),
(143, 1, 1, 5, 0, 0, 0, 0, '', 0),
(144, 1, 14, 3, 0, 0, 0, 0, '', 0),
(145, 1, 1, 6, 0, 0, 0, 0, '', 0),
(146, 1, 1, 5, 0, 0, 0, 0, '', 0),
(147, 1, 1, 6, 0, 0, 0, 0, '', 0),
(148, 1, 1, 5, 0, 0, 0, 0, '', 0),
(149, 1, 1, 6, 0, 0, 0, 0, '', 0),
(150, 1, 1, 5, 0, 0, 0, 0, '', 0),
(151, 1, 1, 6, 0, 0, 0, 0, '', 0),
(152, 1, 1, 5, 0, 0, 0, 0, '', 0),
(153, 1, 1, 6, 0, 0, 0, 0, '', 0),
(154, 1, 1, 5, 0, 0, 0, 0, '', 0),
(155, 1, 1, 6, 0, 0, 0, 0, '', 0),
(156, 1, 1, 5, 0, 0, 0, 0, '', 0),
(157, 1, 1, 6, 0, 0, 0, 0, '', 0),
(158, 1, 1, 5, 0, 0, 0, 0, '', 0),
(159, 1, 13, 3, 0, 0, 0, 0, '', 0),
(160, 1, 1, 6, 0, 0, 0, 0, '', 0),
(161, 1, 1, 5, 0, 0, 0, 0, '', 0),
(162, 1, 12, 1, 990, 160, 610, 134, '', 0),
(163, 1, 12, 1, 610, 134, 790, 148, '', 0),
(164, 1, 1, 6, 0, 0, 0, 0, '', 0),
(165, 1, 1, 5, 0, 0, 0, 0, '', 0),
(166, 1, 12, 1, 790, 148, 544, 86, '', 0),
(167, 1, 12, 1, 544, 86, 780, 108, '', 0),
(168, 1, 12, 3, 0, 0, 0, 0, '', 0),
(169, 1, 1, 6, 0, 0, 0, 0, '', 0),
(170, 1, 1, 5, 0, 0, 0, 0, '', 0),
(171, 1, 1, 7, 0, 0, 1, 0, '', 0),
(172, 1, 1, 7, 0, 0, 2, 0, '', 0),
(173, 1, 1, 6, 0, 0, 0, 0, '', 0),
(174, 1, 1, 5, 0, 0, 0, 0, '', 0),
(175, 1, 1, 7, 0, 0, 2, 0, '', 0),
(176, 1, 1, 6, 0, 0, 0, 0, '', 0),
(177, 1, 1, 5, 0, 0, 0, 0, '', 0),
(178, 1, 1, 7, 0, 0, 2, 0, '', 0),
(179, 1, 1, 6, 0, 0, 0, 0, '', 0),
(180, 1, 1, 5, 0, 0, 0, 0, '', 0),
(181, 1, 1, 7, 0, 0, 1, 0, '', 0),
(182, 1, 1, 7, 0, 0, 2, 0, '', 0),
(183, 1, 1, 6, 0, 0, 0, 0, '', 0),
(184, 1, 1, 5, 0, 0, 0, 0, '', 0),
(185, 1, 1, 7, 0, 0, 2, 0, '', 0),
(186, 1, 1, 6, 0, 0, 0, 0, '', 0),
(187, 1, 1, 5, 0, 0, 0, 0, '', 0),
(188, 1, 1, 7, 0, 0, 2, 0, '', 0),
(189, 1, 0, 7, 0, 0, 1, 0, '', 0),
(190, 1, 0, 7, 0, 0, 1, 0, '', 0),
(191, 1, 0, 7, 0, 0, 1, 0, '', 0),
(192, 1, 1, 7, 0, 0, 1, 0, '', 0),
(193, 1, 1, 7, 0, 0, 1, 0, '', 0),
(194, 1, 1, 6, 0, 0, 0, 0, '', 0),
(195, 1, 1, 5, 0, 0, 0, 0, '', 0),
(196, 1, 1, 7, 0, 0, 1, 0, '', 0),
(197, 1, 1, 7, 0, 0, 3, 0, '', 0),
(198, 1, 1, 7, 0, 0, 4, 0, '', 0),
(199, 1, 1, 7, 0, 0, 3, 0, '', 0),
(200, 1, 1, 6, 0, 0, 0, 0, '', 0),
(201, 1, 1, 5, 0, 0, 0, 0, '', 0),
(202, 1, 1, 7, 0, 0, 1, 0, '', 0),
(203, 1, 1, 7, 0, 0, 2, 0, '', 0),
(204, 1, 1, 7, 0, 0, 4, 0, '', 0),
(205, 1, 1, 7, 0, 0, 3, 0, '', 0),
(206, 1, 1, 6, 0, 0, 0, 0, '', 0),
(207, 1, 1, 5, 0, 0, 0, 0, '', 0),
(208, 1, 1, 7, 0, 0, 2, 0, '', 0),
(209, 1, 1, 7, 0, 0, 1, 0, '', 0),
(210, 1, 1, 7, 0, 0, 4, 0, '', 0),
(211, 1, 1, 6, 0, 0, 0, 0, '', 0),
(212, 1, 1, 5, 0, 0, 0, 0, '', 0),
(213, 1, 1, 7, 0, 0, 0, 0, '', 0),
(214, 1, 1, 7, 0, 0, 0, 0, '', 0),
(215, 1, 1, 6, 0, 0, 0, 0, '', 0),
(216, 1, 1, 5, 0, 0, 0, 0, '', 0),
(217, 1, 1, 7, 0, 0, 2, 0, '', 0),
(218, 1, 1, 7, 0, 0, 1, 0, '', 0),
(219, 1, 1, 7, 0, 0, 2, 0, '', 0),
(220, 1, 1, 6, 0, 0, 0, 0, '', 0),
(221, 1, 1, 5, 0, 0, 0, 0, '', 0),
(222, 1, 1, 7, 0, 0, 2, 0, '', 0),
(223, 1, 1, 6, 0, 0, 0, 0, '', 0),
(224, 1, 1, 5, 0, 0, 0, 0, '', 0),
(225, 1, 1, 6, 0, 0, 0, 0, '', 0),
(226, 1, 1, 5, 0, 0, 0, 0, '', 0),
(227, 1, 1, 7, 0, 0, 2, 0, '', 0),
(228, 1, 1, 6, 0, 0, 0, 0, '', 0),
(229, 1, 1, 5, 0, 0, 0, 0, '', 0),
(230, 1, 1, 7, 0, 0, 2, 0, '', 0),
(231, 1, 1, 6, 0, 0, 0, 0, '', 0),
(232, 1, 1, 5, 0, 0, 0, 0, '', 0),
(233, 1, 1, 7, 0, 0, 2, 0, '', 0),
(234, 1, 1, 6, 0, 0, 0, 0, '', 0),
(235, 1, 1, 5, 0, 0, 0, 0, '', 0),
(236, 1, 1, 7, 0, 0, 2, 0, '', 0),
(237, 1, 1, 6, 0, 0, 0, 0, '', 0),
(238, 1, 1, 5, 0, 0, 0, 0, '', 0),
(239, 1, 1, 7, 0, 0, 2, 0, '', 0),
(240, 1, 1, 6, 0, 0, 0, 0, '', 0),
(241, 1, 1, 5, 0, 0, 0, 0, '', 0),
(242, 1, 1, 6, 0, 0, 0, 0, '', 0),
(243, 1, 1, 5, 0, 0, 0, 0, '', 0),
(244, 1, 1, 7, 0, 0, 2, 0, '', 0),
(245, 1, 1, 6, 0, 0, 0, 0, '', 0),
(246, 1, 1, 5, 0, 0, 0, 0, '', 0),
(247, 1, 1, 7, 0, 0, 2, 0, '', 0),
(248, 1, 1, 6, 0, 0, 0, 0, '', 0),
(249, 1, 1, 5, 0, 0, 0, 0, '', 0),
(250, 1, 1, 6, 0, 0, 0, 0, '', 0),
(251, 1, 1, 5, 0, 0, 0, 0, '', 0),
(252, 1, 1, 7, 0, 0, 2, 0, '', 0),
(253, 1, 1, 6, 0, 0, 0, 0, '', 0),
(254, 1, 1, 5, 0, 0, 0, 0, '', 0),
(255, 1, 1, 7, 0, 0, 2, 0, '', 0),
(256, 1, 1, 6, 0, 0, 0, 0, '', 0),
(257, 1, 1, 5, 0, 0, 0, 0, '', 0),
(258, 1, 1, 6, 0, 0, 0, 0, '', 0),
(259, 1, 1, 5, 0, 0, 0, 0, '', 0),
(260, 1, 1, 6, 0, 0, 0, 0, '', 0),
(261, 1, 1, 5, 0, 0, 0, 0, '', 0),
(262, 1, 1, 6, 0, 0, 0, 0, '', 0),
(263, 1, 1, 5, 0, 0, 0, 0, '', 0),
(264, 1, 1, 7, 0, 0, 2, 0, '', 0),
(265, 1, 1, 6, 0, 0, 0, 0, '', 0),
(266, 1, 1, 5, 0, 0, 0, 0, '', 0),
(267, 1, 1, 6, 0, 0, 0, 0, '', 0),
(268, 1, 1, 5, 0, 0, 0, 0, '', 0),
(269, 1, 1, 6, 0, 0, 0, 0, '', 0),
(270, 1, 1, 5, 0, 0, 0, 0, '', 0),
(271, 1, 1, 6, 0, 0, 0, 0, '', 0),
(272, 1, 1, 5, 0, 0, 0, 0, '', 0),
(273, 1, 1, 7, 0, 0, 2, 0, '', 0),
(274, 1, 1, 6, 0, 0, 0, 0, '', 0),
(275, 1, 1, 5, 0, 0, 0, 0, '', 0),
(276, 1, 1, 7, 0, 0, 2, 0, '', 0),
(277, 1, 1, 6, 0, 0, 0, 0, '', 0),
(278, 1, 1, 5, 0, 0, 0, 0, '', 0),
(279, 1, 1, 7, 0, 0, 2, 0, '', 0),
(280, 1, 1, 6, 0, 0, 0, 0, '', 0),
(281, 1, 1, 5, 0, 0, 0, 0, '', 0),
(282, 1, 1, 7, 0, 0, 2, 0, '', 0),
(283, 1, 1, 6, 0, 0, 0, 0, '', 0),
(284, 1, 1, 5, 0, 0, 0, 0, '', 0),
(285, 1, 1, 7, 0, 0, 2, 0, '', 0),
(286, 1, 1, 6, 0, 0, 0, 0, '', 0),
(287, 1, 1, 5, 0, 0, 0, 0, '', 0),
(288, 1, 1, 7, 0, 0, 2, 0, '', 0),
(289, 1, 1, 7, 0, 0, 1, 0, '', 0),
(290, 1, 1, 7, 0, 0, 1, 0, '', 0),
(291, 1, 1, 6, 0, 0, 0, 0, '', 0),
(292, 1, 1, 5, 0, 0, 0, 0, '', 0),
(293, 1, 1, 6, 0, 0, 0, 0, '', 0),
(294, 1, 1, 5, 0, 0, 0, 0, '', 0),
(295, 1, 1, 6, 0, 0, 0, 0, '', 0),
(296, 1, 1, 5, 0, 0, 0, 0, '', 0),
(297, 1, 1, 6, 0, 0, 0, 0, '', 0),
(298, 1, 1, 5, 0, 0, 0, 0, '', 0),
(299, 1, 1, 6, 0, 0, 0, 0, '', 0),
(300, 1, 1, 5, 0, 0, 0, 0, '', 0),
(301, 1, 1, 7, 0, 0, 1, 0, '', 0),
(302, 1, 1, 7, 0, 0, 2, 0, '', 0),
(303, 1, 1, 7, 0, 0, 4, 0, '', 0),
(304, 1, 1, 6, 0, 0, 0, 0, '', 0),
(305, 1, 1, 5, 0, 0, 0, 0, '', 0),
(306, 1, 1, 6, 0, 0, 0, 0, '', 0),
(307, 1, 1, 5, 0, 0, 0, 0, '', 0),
(308, 1, 1, 6, 0, 0, 0, 0, '', 0),
(309, 1, 1, 5, 0, 0, 0, 0, '', 0),
(310, 1, 1, 6, 0, 0, 0, 0, '', 0),
(311, 1, 1, 5, 0, 0, 0, 0, '', 0),
(312, 1, 1, 6, 0, 0, 0, 0, '', 0),
(313, 1, 1, 5, 0, 0, 0, 0, '', 0),
(314, 1, 1, 6, 0, 0, 0, 0, '', 0),
(315, 1, 1, 5, 0, 0, 0, 0, '', 0),
(316, 1, 1, 6, 0, 0, 0, 0, '', 0),
(317, 1, 1, 5, 0, 0, 0, 0, '', 0),
(318, 1, 1, 7, 0, 0, 4, 0, '', 0),
(319, 1, 1, 7, 0, 0, 4, 0, '', 0),
(320, 1, 1, 7, 0, 0, 2, 0, '', 0),
(321, 1, 1, 6, 0, 0, 0, 0, '', 0),
(322, 1, 1, 5, 0, 0, 0, 0, '', 0),
(323, 1, 1, 7, 0, 0, 2, 0, '', 0),
(324, 1, 1, 7, 0, 0, 4, 0, '', 0),
(325, 1, 1, 7, 0, 0, 3, 0, '', 0),
(326, 1, 1, 7, 0, 0, 1, 0, '', 0),
(327, 1, 1, 7, 0, 0, 3, 0, '', 0),
(328, 1, 1, 7, 0, 0, 2, 0, '', 0),
(329, 1, 1, 7, 0, 0, 4, 0, '', 0),
(330, 1, 1, 7, 0, 0, 0, 0, '', 0),
(331, 1, 1, 6, 0, 0, 0, 0, '', 0),
(332, 1, 1, 5, 0, 0, 0, 0, '', 0),
(333, 1, 1, 7, 0, 0, 0, 0, '', 0),
(334, 1, 1, 7, 0, 0, 4, 0, '', 0),
(335, 1, 1, 7, 0, 0, 0, 0, '', 0),
(336, 1, 1, 7, 0, 0, 4, 0, '', 0),
(337, 1, 1, 6, 0, 0, 0, 0, '', 0),
(338, 1, 1, 5, 0, 0, 0, 0, '', 0),
(339, 1, 1, 7, 0, 0, 1, 0, '', 0),
(340, 1, 1, 7, 0, 0, 4, 0, '', 0),
(341, 1, 1, 7, 0, 0, 0, 0, '', 0),
(342, 1, 15, 4, 0, 0, 611, 509, '0', 5),
(343, 1, 15, 1, 611, 509, 446, 301, '', 0),
(344, 1, 15, 1, 446, 301, 871, 212, '', 0),
(345, 1, 15, 1, 871, 212, 595, 334, '', 0),
(346, 1, 15, 3, 0, 0, 0, 0, '', 0),
(347, 1, 16, 4, 0, 0, 497, 443, '0', 6),
(348, 1, 17, 4, 0, 0, 390, 302, '0', 5),
(349, 1, 18, 4, 0, 0, 521, 302, '0', 3),
(350, 1, 17, 1, 390, 302, 395, 219, '', 0),
(351, 1, 18, 1, 521, 302, 756, 225, '', 0),
(352, 1, 18, 3, 0, 0, 0, 0, '', 0),
(353, 1, 17, 1, 395, 219, 441, 108, '', 0),
(354, 1, 17, 3, 0, 0, 0, 0, '', 0),
(355, 1, 16, 3, 0, 0, 0, 0, '', 0),
(356, 1, 1, 7, 0, 0, 4, 0, '', 0),
(357, 1, 1, 6, 0, 0, 0, 0, '', 0),
(358, 1, 1, 5, 0, 0, 0, 0, '', 0),
(359, 1, 1, 6, 0, 0, 0, 0, '', 0),
(360, 1, 1, 5, 0, 0, 0, 0, '', 0),
(361, 1, 1, 6, 0, 0, 0, 0, '', 0),
(362, 1, 1, 5, 0, 0, 0, 0, '', 0),
(363, 1, 1, 6, 0, 0, 0, 0, '', 0),
(364, 1, 1, 5, 0, 0, 0, 0, '', 0),
(365, 1, 1, 6, 0, 0, 0, 0, '', 0),
(366, 1, 1, 5, 0, 0, 0, 0, '', 0),
(367, 1, 1, 6, 0, 0, 0, 0, '', 0),
(368, 1, 1, 5, 0, 0, 0, 0, '', 0),
(369, 1, 1, 6, 0, 0, 0, 0, '', 0),
(370, 1, 1, 5, 0, 0, 0, 0, '', 0),
(371, 1, 1, 6, 0, 0, 0, 0, '', 0),
(372, 1, 1, 5, 0, 0, 0, 0, '', 0),
(373, 1, 1, 6, 0, 0, 0, 0, '', 0),
(374, 1, 1, 5, 0, 0, 0, 0, '', 0),
(375, 1, 1, 6, 0, 0, 0, 0, '', 0),
(376, 1, 1, 5, 0, 0, 0, 0, '', 0),
(377, 1, 1, 6, 0, 0, 0, 0, '', 0),
(378, 1, 1, 5, 0, 0, 0, 0, '', 0),
(379, 1, 1, 6, 0, 0, 0, 0, '', 0),
(380, 1, 1, 5, 0, 0, 0, 0, '', 0),
(381, 1, 1, 7, 0, 0, 1, 0, '', 0),
(382, 1, 1, 7, 0, 0, 1, 0, '', 0),
(383, 1, 1, 6, 0, 0, 0, 0, '', 0),
(384, 1, 1, 5, 0, 0, 0, 0, '', 0),
(385, 1, 1, 7, 0, 0, 1, 0, '', 0),
(386, 1, 1, 7, 0, 0, 3, 0, '', 0),
(387, 1, 1, 7, 0, 0, 4, 0, '', 0),
(388, 1, 1, 7, 0, 0, 2, 0, '', 0),
(389, 1, 1, 6, 0, 0, 0, 0, '', 0),
(390, 1, 1, 5, 0, 0, 0, 0, '', 0),
(391, 1, 19, 4, 0, 0, 578, 423, '0', 1),
(392, 1, 20, 4, 0, 0, 538, 372, '0', 2),
(393, 1, 21, 4, 0, 0, 359, 240, '0', 1),
(394, 1, 22, 4, 0, 0, 622, 248, '0', 2),
(395, 1, 1, 6, 0, 0, 0, 0, '', 0),
(396, 1, 1, 5, 0, 0, 0, 0, '', 0),
(397, 1, 22, 1, 622, 248, 670, 80, '', 0),
(398, 1, 21, 1, 359, 240, 518, 13, '', 0),
(399, 1, 20, 1, 538, 372, 575, 67, '', 0),
(400, 1, 19, 1, 578, 423, 665, 177, '', 0),
(401, 1, 22, 1, 670, 80, 746, 289, '', 0),
(402, 1, 1, 7, 0, 0, 4, 0, '', 0),
(403, 1, 19, 1, 665, 177, 1099, 139, '', 0),
(404, 1, 20, 1, 575, 67, 444, 145, '', 0),
(405, 1, 21, 1, 518, 13, 760, -26, '', 0),
(406, 1, 21, 1, 760, -26, 730, -26, '', 0),
(407, 1, 1, 6, 0, 0, 0, 0, '', 0),
(408, 1, 1, 5, 0, 0, 0, 0, '', 0),
(409, 1, 1, 7, 0, 0, 4, 0, '', 0),
(410, 1, 22, 1, 746, 289, 769, 284, '', 0),
(411, 1, 22, 2, 0, 0, 0, 0, '', 0),
(412, 1, 21, 1, 730, -26, 752, -26, '', 0),
(413, 1, 21, 2, 0, 0, 0, 0, '', 0),
(414, 1, 21, 2, 0, 0, 0, 0, '', 0),
(415, 1, 22, 1, 769, 284, 769, 296, '', 0),
(416, 1, 20, 1, 444, 145, 706, 297, '', 0),
(417, 1, 20, 1, 706, 297, 425, 121, '', 0),
(418, 1, 23, 4, 0, 0, 671, 317, '0', 6),
(419, 1, 23, 1, 671, 317, 626, 45, '', 0),
(420, 1, 23, 3, 0, 0, 0, 0, '', 0),
(421, 1, 1, 6, 0, 0, 0, 0, '', 0),
(422, 1, 1, 5, 0, 0, 0, 0, '', 0),
(423, 1, 1, 6, 0, 0, 0, 0, '', 0),
(424, 1, 1, 5, 0, 0, 0, 0, '', 0),
(425, 1, 1, 6, 0, 0, 0, 0, '', 0),
(426, 1, 1, 5, 0, 0, 0, 0, '', 0),
(427, 1, 24, 4, 0, 0, 665, 337, '0', 1),
(428, 1, 24, 1, 665, 337, 663, 68, '', 0),
(429, 1, 1, 6, 0, 0, 0, 0, '', 0),
(430, 1, 1, 5, 0, 0, 0, 0, '', 0),
(431, 1, 25, 4, 0, 0, 852, 348, '0', 5),
(432, 1, 1, 6, 0, 0, 0, 0, '', 0),
(433, 1, 1, 5, 0, 0, 0, 0, '', 0),
(434, 1, 20, 1, 425, 121, 499, 436, '', 0),
(435, 1, 21, 1, 752, -26, 634, 326, '', 0),
(436, 1, 24, 1, 663, 68, 514, 291, '', 0),
(437, 1, 19, 1, 1099, 139, 1028, 258, '', 0),
(438, 1, 1, 6, 0, 0, 0, 0, '', 0),
(439, 1, 1, 5, 0, 0, 0, 0, '', 0),
(440, 1, 26, 4, 0, 0, 658, 386, '0', 4),
(441, 1, 24, 3, 0, 0, 0, 0, '', 0),
(442, 1, 21, 3, 0, 0, 0, 0, '', 0),
(443, 1, 22, 3, 0, 0, 0, 0, '', 0),
(444, 1, 20, 3, 0, 0, 0, 0, '', 0),
(445, 1, 19, 3, 0, 0, 0, 0, '', 0),
(446, 1, 26, 1, 658, 386, 722, 458, '', 0),
(447, 1, 26, 3, 0, 0, 0, 0, '', 0),
(448, 1, 25, 3, 0, 0, 0, 0, '', 0),
(449, 1, 27, 4, 0, 0, 743, 348, '0', 3),
(450, 1, 28, 4, 0, 0, 663, 395, '0', 3),
(451, 1, 1, 6, 0, 0, 0, 0, '', 0),
(452, 1, 1, 5, 0, 0, 0, 0, '', 0),
(453, 1, 28, 3, 0, 0, 0, 0, '', 0),
(454, 1, 27, 1, 743, 348, 740, 347, '', 0),
(455, 1, 27, 3, 0, 0, 0, 0, '', 0),
(456, 1, 29, 4, 0, 0, 753, 407, '0', 1),
(457, 1, 1, 7, 0, 0, 4, 0, '', 0),
(458, 1, 1, 6, 0, 0, 0, 0, '', 0),
(459, 1, 1, 5, 0, 0, 0, 0, '', 0),
(460, 1, 1, 7, 0, 0, 4, 0, '', 0),
(461, 1, 29, 3, 0, 0, 0, 0, '', 0),
(462, 1, 30, 4, 0, 0, 780, 522, '0', 3),
(463, 1, 31, 4, 0, 0, 754, 217, '0', 4),
(464, 1, 1, 6, 0, 0, 0, 0, '', 0),
(465, 1, 1, 5, 0, 0, 0, 0, '', 0),
(466, 1, 1, 6, 0, 0, 0, 0, '', 0),
(467, 1, 1, 5, 0, 0, 0, 0, '', 0),
(468, 1, 30, 1, 780, 522, 765, 517, '', 0),
(469, 1, 1, 6, 0, 0, 0, 0, '', 0),
(470, 1, 1, 5, 0, 0, 0, 0, '', 0),
(471, 1, 30, 1, 765, 517, 698, 451, '', 0),
(472, 1, 30, 1, 698, 451, 759, 515, '', 0),
(473, 1, 32, 4, 0, 0, 391, 370, '0', 6),
(474, 1, 33, 4, 0, 0, 1130, 352, '0', 5),
(475, 1, 33, 1, 1130, 352, 1122, 376, '', 0),
(476, 1, 30, 1, 759, 515, 765, 532, '', 0),
(477, 1, 1, 7, 0, 0, 4, 0, '', 0),
(478, 2, 1, 5, 0, 0, 0, 0, '', 0),
(479, 2, 1, 6, 0, 0, 0, 0, '', 0),
(480, 1, 1, 6, 0, 0, 0, 0, '', 0),
(481, 2, 1, 5, 0, 0, 0, 0, '', 0),
(482, 2, 1, 6, 0, 0, 0, 0, '', 0),
(483, 1, 1, 5, 0, 0, 0, 0, '', 0),
(484, 1, 1, 6, 0, 0, 0, 0, '', 0),
(485, 2, 1, 5, 0, 0, 0, 0, '', 0),
(486, 2, 34, 4, 0, 0, 796, 349, '0', 6),
(487, 2, 35, 4, 0, 0, 916, 398, '0', 5),
(488, 2, 1, 6, 0, 0, 0, 0, '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=36 ;

--
-- Data dump for tabellen `session_object`
--

INSERT INTO `session_object` (`id`, `tableId`, `x`, `y`, `label`, `image`) VALUES
(30, 1, 765, 532, '0', 3),
(31, 1, 754, 217, '0', 4),
(32, 1, 391, 370, '0', 6),
(33, 1, 1122, 376, '0', 5),
(34, 2, 796, 349, '0', 6),
(35, 2, 916, 398, '0', 5);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Data dump for tabellen `session_table`
--

INSERT INTO `session_table` (`id`, `name`, `owner`, `language`) VALUES
(1, 'WAYK Table 1', 1, 2),
(2, 'Another wayk session', 1, 13);

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

--
-- Data dump for tabellen `user`
--

INSERT INTO `user` (`id`, `provider`, `uid`, `name`, `email`, `image`, `bio`) VALUES
(1, 'google', '108795734430870410103', 'Arne Sostack', 'arnesostack@gmail.com', 'https://lh6.googleusercontent.com/-NBkAkb1DEg4/AAAAAAAAAAI/AAAAAAAAAIk/iXLA6cDzpJ4/photo.jpg?sz=50', '<p>I''m a poor lonesome coding cowboy.</p>\r\n<p>&nbsp;</p>');

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

--
-- Data dump for tabellen `user_languages`
--

INSERT INTO `user_languages` (`user`, `language`, `level`, `type`) VALUES
(1, 2, 4, 1),
(1, 3, 4, 1),
(1, 4, 1, 1),
(1, 4, 1, 2),
(1, 5, 1, 2),
(1, 6, 1, 1),
(1, 9, 1, 1),
(1, 14, 3, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
