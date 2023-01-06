-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 05, 2023 at 02:25 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'PHP'),
(16, 'css'),
(17, 'html');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(3) NOT NULL AUTO_INCREMENT,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_content` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(15, 43, 'jumaa', 'jumaa.almarzouk@gmail.com', 'my comment', 'approved', '2022-09-18 22:00:00'),
(16, 44, 'jumaa', 'jumaa.almarzouk@gmail.com', 'asd', 'approved', '2023-01-05 14:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(3) NOT NULL AUTO_INCREMENT,
  `post_cat_id` int(3) NOT NULL,
  `post_title` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `post_author` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `post_user` varchar(11) COLLATE utf32_unicode_ci NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text COLLATE utf32_unicode_ci NOT NULL,
  `post_content` text COLLATE utf32_unicode_ci NOT NULL,
  `post_tags` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `post_comment_count` int(11) NOT NULL DEFAULT '0',
  `post_status` varchar(255) COLLATE utf32_unicode_ci NOT NULL DEFAULT 'draft',
  `post_view_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_cat_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_view_count`) VALUES
(41, 1, 'Top 8 Practical Applications of PHP and Steps to Carve a Career in the Field', NULL, 'jm', '2022-09-19', 'unnamed.jpg', '<p><span style=\"color: rgb(81, 86, 94); font-family: Helvetica;\">PHP is a server-side scripting language that is widely used for web development and business application. The open-source tools and high running speed make PHP one of the most preferred languages for creating interactive websites and web applications. Some of the biggest web platforms of today, including Facebook, Flickr, Yahoo, MailChimp, and Wikipedia, to name a few, use PHP in their end-to-end computing infrastructure.&nbsp;</span><br></p>', 'By Matthew David', 0, 'published', 1),
(43, 1, 'asd', NULL, 're', '2003-01-23', '325-3251632_when-you-need-facts-man-reading-book-png.png', '<p><span style=\"color: rgb(81, 86, 94); font-family: Roboto, sans-serif;\">A web page or web application is required to offer high levels of customization, a very interactive user interface and should be able to perform online transactions and integrate with database systems. PHP ensures all these features are achieved through its three-tiered architecture that works in a linear fashion on browser, server, and database systems. This explains why more than 82% of websites use PHP for server-side programming. Numerous web-based applications and Facebook apps are scripted in PHP too.</span><br></p>', 'php', 0, 'draft', 7),
(44, 1, 'new title', NULL, 're', '2003-01-23', 'Content-management-systems-CMS.jpg', '<p><span style=\"color: rgb(81, 86, 94); font-family: Roboto, sans-serif;\">PHP supports various databases like Oracle, MySQL, and MS Access and is designed to interact with other services using protocols such as HTTP, LDAP, POP3, IMAP, NNTP, SNM, and COM. Many PHP frameworks offer templates, libraries through which developers can manage and manipulate the content of a website. Thus, PHP is used to create small static websites as well as large content-based sites. Some of the best Web Content Management Systems (CMS) managed by PHP are WordPress and its plugins, user interface of Drupal, Joomla, Facebook, MediaWiki, Silverstripe, and Digg, among others.Â </span><br></p>', 'php', 0, 'published', 0),
(46, 1, 'Image Processing and Graphic Designasd asd', NULL, 'qwe', '2005-01-23', 'computer-monitor-graphic-animator-creating-video-game-modeling-motion-processing-video-file-using-professional-editor-vector-illustration-graphic-design-art-designer-workplace-concept_74855-13038.jpg', '<p><span style=\"color: rgb(81, 86, 94); font-family: Roboto, sans-serif;\">Also prominent among applications of <b>PHP </b>is its use to manipulate images. Various image processing libraries like Imagine, GD library, and ImageMagick can be integrated with PHP applications to allow a wide range of image processing features, including rotating, cropping, resizing, adding watermarks, creating thumbnail pictures, and generating output images in many formats. The different formats of output images can be jpeg, gif, wbmp, xpm, and png. This is an essential prerequisite for creating robust websites and web applications.</span><br></p>', 'Image Processing and Graphic Design', 0, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `user_firstname` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `user_lastname` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `user_image` text COLLATE utf32_unicode_ci,
  `user_role` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`) VALUES
(19, 'qwe', '$2y$10$ng5fGXedbc9ioGazOwZf3..tmXgRcSw415ay31QTVJt12S5GkSeCK', 'qwe', '', 'jumaa.almarzouk@gmail.com', NULL, 'admin'),
(20, 'asd', '$2y$10$MYekBO0ZzdvkjXeA4tDwj.WMC35gFL9u64QUDUxKP6q4n5lvi52AS', 'asda', '', 'jumaa.almarzouk@gmail.com', NULL, 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
