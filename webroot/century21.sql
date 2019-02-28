-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2019 at 09:49 PM
-- Server version: 5.6.33-0ubuntu0.14.04.1
-- PHP Version: 7.2.15-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `century21`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `forgot_password_token` varchar(255) NOT NULL,
  `image_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role`, `name`, `email`, `password`, `forgot_password_token`, `image_id`, `created`, `modified`) VALUES
(1, 'Admin', 'Super Admin', 'admin@admin.com', '$2y$10$ynRitpfdXfgrb/wfua8Uze6ZrAJVc7By1a0oRJqtQSEhYz9G0jKLO', '', 5, '0000-00-00 00:00:00', '2019-02-23 06:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE IF NOT EXISTS `amenities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_code` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `apartment_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `small_thumb` varchar(255) NOT NULL,
  `medium_thumb` varchar(255) NOT NULL,
  `large_thumb` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `category`, `image`, `small_thumb`, `medium_thumb`, `large_thumb`, `created`, `modified`) VALUES
(4, 1, 'Admin Profile', 'files/images/5c70e492ea271.jpg', 'files/images/thumbs/small_5c70e492ea271.jpg', 'files/images/thumbs/medium_5c70e492ea271.jpg', 'files/images/thumbs/large_5c70e492ea271.jpg', '2019-02-23 06:13:39', '2019-02-23 06:13:39'),
(5, 1, 'Admin Profile', 'files/images/5c70e4a2237ba.jpg', 'files/images/thumbs/small_5c70e4a2237ba.jpg', 'files/images/thumbs/medium_5c70e4a2237ba.jpg', 'files/images/thumbs/large_5c70e4a2237ba.jpg', '2019-02-23 06:13:54', '2019-02-23 06:13:54'),
(6, 0, 'Image', 'files/images/5c72b99ba99b6.jpg', 'files/images/thumbs/small_5c72b99ba99b6.jpg', 'files/images/thumbs/medium_5c72b99ba99b6.jpg', 'files/images/thumbs/large_5c72b99ba99b6.jpg', '2019-02-24 15:34:51', '2019-02-24 15:34:51'),
(7, 0, 'Image', 'files/images/5c72b9cbe74d9.png', 'files/images/thumbs/small_5c72b9cbe74d9.png', 'files/images/thumbs/medium_5c72b9cbe74d9.png', 'files/images/thumbs/large_5c72b9cbe74d9.png', '2019-02-24 15:35:40', '2019-02-24 15:35:40'),
(8, 0, 'Image', 'files/images/5c72c16ec0a56.jpg', 'files/images/thumbs/small_5c72c16ec0a56.jpg', 'files/images/thumbs/medium_5c72c16ec0a56.jpg', 'files/images/thumbs/large_5c72c16ec0a56.jpg', '2019-02-24 16:08:14', '2019-02-24 16:08:14'),
(9, 0, 'Image', 'files/images/5c72c2016e07e.jpg', 'files/images/thumbs/small_5c72c2016e07e.jpg', 'files/images/thumbs/medium_5c72c2016e07e.jpg', 'files/images/thumbs/large_5c72c2016e07e.jpg', '2019-02-24 16:10:42', '2019-02-24 16:10:42'),
(10, 0, 'Image', 'files/images/5c72c3325f028.png', 'files/images/thumbs/small_5c72c3325f028.png', 'files/images/thumbs/medium_5c72c3325f028.png', 'files/images/thumbs/large_5c72c3325f028.png', '2019-02-24 16:15:46', '2019-02-24 16:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_category` varchar(255) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `option_value` text NOT NULL,
  `default_value` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modifieds` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_type` varchar(255) NOT NULL,
  `section_text` text NOT NULL,
  `image_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page`, `section_name`, `section_type`, `section_text`, `image_id`, `created`, `modified`) VALUES
(1, 'Home Header', 'Top Left Logo', 'image', '', 7, '2019-02-24 15:38:28', '2019-02-24 15:38:28'),
(2, 'Home Header', 'Top Left Name', 'heading', 'Priten Singh', 0, '2019-02-24 16:04:14', '2019-02-24 17:27:25'),
(3, 'Home Header', 'Top Right Phone Number', 'heading', '+1 (647)-297-7179 ', 0, '2019-02-24 16:06:12', '2019-02-24 16:06:12'),
(4, 'Home', 'Banner Preffrence Video / Image', 'heading', 'image', 0, '2019-02-24 16:09:44', '2019-02-24 16:09:44'),
(5, 'Home', 'Banner Image', 'image', '', 8, '2019-02-24 16:08:23', '2019-02-24 16:08:23'),
(6, 'Home', 'Banner Video', 'video', 'Please enter video URL', 0, '2019-02-24 16:09:17', '2019-02-24 16:09:17'),
(8, 'Home', 'My Image', 'image', '', 9, '2019-02-24 16:10:49', '2019-02-24 16:10:49'),
(9, 'Home', 'My Name', 'heading', 'Priten Shah', 0, '2019-02-24 16:11:51', '2019-02-24 16:11:51'),
(10, 'Home', 'My Designation', 'heading', 'Sales Representative', 0, '2019-02-24 16:13:08', '2019-02-24 16:13:08'),
(11, 'Home', 'My Phone Number', 'heading', 'My Phone Number', 0, '2019-02-24 16:13:29', '2019-02-24 16:13:29'),
(12, 'Home', 'Investing in real estate heading', 'heading', 'INVESTING IN REAL ESTATE?', 0, '2019-02-24 16:14:15', '2019-02-24 16:14:15'),
(13, 'Home', 'Investing in real estate content', 'content', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. ', 0, '2019-02-24 16:14:42', '2019-02-24 16:14:42'),
(14, 'Home Footer', 'Footer Left Logo', 'image', '', 10, '2019-02-24 16:15:52', '2019-02-24 16:15:52'),
(15, 'Home Footer', 'Contact Us Phone Number', 'heading', '+1(647)2977179', 0, '2019-02-24 16:20:50', '2019-02-24 16:20:50'),
(16, 'Home Footer', 'Locate Us Address', 'content', ' 10473 & 10459 Islington Avenue Islington Avenue, Kleinburg, Ontario, L0J 1C0 ', 0, '2019-02-24 16:21:30', '2019-02-24 16:21:30'),
(17, 'Home Footer', 'Facebook Page Url', 'heading', '', 0, '2019-02-24 16:21:54', '2019-02-24 16:21:54'),
(18, 'Home Footer', 'Twitter Page Url', 'heading', '', 0, '2019-02-24 16:21:54', '2019-02-24 16:21:54'),
(19, 'Home Footer', 'Instagram Page Url', 'heading', '', 0, '2019-02-24 16:21:54', '2019-02-24 16:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20190223052732, 'CreateAdmins', '2019-02-23 13:28:49', '2019-02-23 13:28:49', 0),
(20190223052740, 'CreateUsers', '2019-02-23 13:28:49', '2019-02-23 13:28:50', 0),
(20190223052748, 'CreateProperties', '2019-02-23 13:28:50', '2019-02-23 13:28:50', 0),
(20190223052755, 'CreateAmenities', '2019-02-23 13:28:50', '2019-02-23 13:28:50', 0),
(20190223052759, 'CreatePropertyAmenities', '2019-02-23 13:28:50', '2019-02-23 13:28:50', 0),
(20190223052803, 'CreateImages', '2019-02-23 13:28:50', '2019-02-23 13:28:51', 0),
(20190223052809, 'CreateApartmentImages', '2019-02-23 13:28:51', '2019-02-23 13:28:51', 0),
(20190223052814, 'CreateStates', '2019-02-23 13:28:51', '2019-02-23 13:28:51', 0),
(20190223052819, 'CreateCities', '2019-02-23 13:28:51', '2019-02-23 13:28:52', 0),
(20190223052824, 'CreateContacts', '2019-02-23 13:28:52', '2019-02-23 13:28:52', 0),
(20190223052829, 'CreatePages', '2019-02-23 13:28:52', '2019-02-23 13:28:52', 0),
(20190223052834, 'CreateTestimonials', '2019-02-23 13:28:52', '2019-02-23 13:28:52', 0),
(20190223062329, 'CreateOptions', '2019-02-23 14:23:41', '2019-02-23 14:23:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `image_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_premium` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `last_searched_at` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities`
--

CREATE TABLE IF NOT EXISTS `property_amenities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` bigint(20) NOT NULL,
  `amenity_id` bigint(20) NOT NULL,
  `amenity_value` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE IF NOT EXISTS `property_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` bigint(20) NOT NULL,
  `image_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `image_id` bigint(20) NOT NULL,
  `testimonial` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `reporting_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `forgot_password_token` varchar(255) NOT NULL,
  `image_id` bigint(20) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
