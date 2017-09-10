-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2016 at 02:19 AM
-- Server version: 10.0.26-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `democmst_wp_3dprinting`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

DROP TABLE IF EXISTS `wp_commentmeta`;
CREATE TABLE IF NOT EXISTS `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `wp_commentmeta`
--

INSERT INTO `wp_commentmeta` (`meta_id`, `comment_id`, `meta_key`, `meta_value`) VALUES
(7, 4, 'rating', '1'),
(8, 4, 'verified', '0');

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

DROP TABLE IF EXISTS `wp_comments`;
CREATE TABLE IF NOT EXISTS `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(4, 168, 'admin', 'admin@gmail.com', '', '192.168.1.90', '2016-04-19 01:17:24', '2016-04-19 01:17:24', 'New Product', 0, '1', '', '', 0, 1),
(5, 262, 'LEONA DAISY', 'ngocchaucit@gmail.com', '', '192.168.1.90', '2016-05-16 01:15:18', '2016-05-16 01:15:18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '', 0, 0),
(7, 262, 'LEONA DAISY', 'admin@gmail.com', '', '192.168.1.90', '2016-05-17 02:40:04', '2016-05-17 02:40:04', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

DROP TABLE IF EXISTS `wp_links`;
CREATE TABLE IF NOT EXISTS `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_newsletter`
--

DROP TABLE IF EXISTS `wp_newsletter`;
CREATE TABLE IF NOT EXISTS `wp_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `surname` varchar(100) NOT NULL DEFAULT '',
  `sex` char(1) NOT NULL DEFAULT 'n',
  `status` char(1) NOT NULL DEFAULT 'S',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(50) NOT NULL DEFAULT '',
  `feed` tinyint(4) NOT NULL DEFAULT '0',
  `feed_time` bigint(20) NOT NULL DEFAULT '0',
  `country` varchar(4) NOT NULL DEFAULT '',
  `list_1` tinyint(4) NOT NULL DEFAULT '0',
  `list_2` tinyint(4) NOT NULL DEFAULT '0',
  `list_3` tinyint(4) NOT NULL DEFAULT '0',
  `list_4` tinyint(4) NOT NULL DEFAULT '0',
  `list_5` tinyint(4) NOT NULL DEFAULT '0',
  `list_6` tinyint(4) NOT NULL DEFAULT '0',
  `list_7` tinyint(4) NOT NULL DEFAULT '0',
  `list_8` tinyint(4) NOT NULL DEFAULT '0',
  `list_9` tinyint(4) NOT NULL DEFAULT '0',
  `list_10` tinyint(4) NOT NULL DEFAULT '0',
  `list_11` tinyint(4) NOT NULL DEFAULT '0',
  `list_12` tinyint(4) NOT NULL DEFAULT '0',
  `list_13` tinyint(4) NOT NULL DEFAULT '0',
  `list_14` tinyint(4) NOT NULL DEFAULT '0',
  `list_15` tinyint(4) NOT NULL DEFAULT '0',
  `list_16` tinyint(4) NOT NULL DEFAULT '0',
  `list_17` tinyint(4) NOT NULL DEFAULT '0',
  `list_18` tinyint(4) NOT NULL DEFAULT '0',
  `list_19` tinyint(4) NOT NULL DEFAULT '0',
  `list_20` tinyint(4) NOT NULL DEFAULT '0',
  `profile_1` varchar(255) NOT NULL DEFAULT '',
  `profile_2` varchar(255) NOT NULL DEFAULT '',
  `profile_3` varchar(255) NOT NULL DEFAULT '',
  `profile_4` varchar(255) NOT NULL DEFAULT '',
  `profile_5` varchar(255) NOT NULL DEFAULT '',
  `profile_6` varchar(255) NOT NULL DEFAULT '',
  `profile_7` varchar(255) NOT NULL DEFAULT '',
  `profile_8` varchar(255) NOT NULL DEFAULT '',
  `profile_9` varchar(255) NOT NULL DEFAULT '',
  `profile_10` varchar(255) NOT NULL DEFAULT '',
  `profile_11` varchar(255) NOT NULL DEFAULT '',
  `profile_12` varchar(255) NOT NULL DEFAULT '',
  `profile_13` varchar(255) NOT NULL DEFAULT '',
  `profile_14` varchar(255) NOT NULL DEFAULT '',
  `profile_15` varchar(255) NOT NULL DEFAULT '',
  `profile_16` varchar(255) NOT NULL DEFAULT '',
  `profile_17` varchar(255) NOT NULL DEFAULT '',
  `profile_18` varchar(255) NOT NULL DEFAULT '',
  `profile_19` varchar(255) NOT NULL DEFAULT '',
  `profile_20` varchar(255) NOT NULL DEFAULT '',
  `referrer` varchar(50) NOT NULL DEFAULT '',
  `http_referer` varchar(255) NOT NULL DEFAULT '',
  `wp_user_id` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `test` tinyint(4) NOT NULL DEFAULT '0',
  `flow` tinyint(4) NOT NULL DEFAULT '0',
  `unsub_email_id` int(11) NOT NULL DEFAULT '0',
  `unsub_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_newsletter_emails`
--

DROP TABLE IF EXISTS `wp_newsletter_emails`;
CREATE TABLE IF NOT EXISTS `wp_newsletter_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `message_text` longtext COLLATE utf8mb4_unicode_ci,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('new','sending','sent','paused') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `total` int(11) NOT NULL DEFAULT '0',
  `last_id` int(11) NOT NULL DEFAULT '0',
  `sent` int(11) NOT NULL DEFAULT '0',
  `send_on` int(11) NOT NULL DEFAULT '0',
  `track` tinyint(4) NOT NULL DEFAULT '0',
  `editor` tinyint(4) NOT NULL DEFAULT '0',
  `sex` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `query` longtext COLLATE utf8mb4_unicode_ci,
  `preferences` longtext COLLATE utf8mb4_unicode_ci,
  `options` longtext COLLATE utf8mb4_unicode_ci,
  `token` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `private` tinyint(1) NOT NULL DEFAULT '0',
  `open_count` int(10) unsigned NOT NULL DEFAULT '0',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_newsletter_sent`
--

DROP TABLE IF EXISTS `wp_newsletter_sent`;
CREATE TABLE IF NOT EXISTS `wp_newsletter_sent` (
  `email_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `open` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `error` varchar(100) NOT NULL DEFAULT '',
  `ip` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`email_id`,`user_id`),
  KEY `user_id` (`user_id`),
  KEY `email_id` (`email_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wp_newsletter_stats`
--

DROP TABLE IF EXISTS `wp_newsletter_stats`;
CREATE TABLE IF NOT EXISTS `wp_newsletter_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `email_id` int(11) NOT NULL DEFAULT '0',
  `link_id` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `anchor` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `country` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `email_id` (`email_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

DROP TABLE IF EXISTS `wp_options`;
CREATE TABLE IF NOT EXISTS `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8510 ;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://demo.cms-theme.net/wordpress/3dprinting', 'yes'),
(2, 'home', 'http://demo.cms-theme.net/wordpress/3dprinting', 'yes'),
(3, 'blogname', '3D Printing', 'yes'),
(4, 'blogdescription', '3D Print &amp; Scan Technology', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'admin@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '0', 'yes'),
(22, 'posts_per_page', '6', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:312:{s:24:"^wc-auth/v([1]{1})/(.*)?";s:63:"index.php?wc-auth-version=$matches[1]&wc-auth-route=$matches[2]";s:22:"^wc-api/v([1-3]{1})/?$";s:51:"index.php?wc-api-version=$matches[1]&wc-api-route=/";s:24:"^wc-api/v([1-3]{1})(.*)?";s:61:"index.php?wc-api-version=$matches[1]&wc-api-route=$matches[2]";s:7:"shop/?$";s:27:"index.php?post_type=product";s:37:"shop/feed/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?post_type=product&feed=$matches[1]";s:32:"shop/(feed|rdf|rss|rss2|atom)/?$";s:44:"index.php?post_type=product&feed=$matches[1]";s:24:"shop/page/([0-9]{1,})/?$";s:45:"index.php?post_type=product&paged=$matches[1]";s:11:"^wp-json/?$";s:22:"index.php?rest_route=/";s:14:"^wp-json/(.*)?";s:33:"index.php?rest_route=/$matches[1]";s:47:"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:42:"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?category_name=$matches[1]&feed=$matches[2]";s:23:"category/(.+?)/embed/?$";s:46:"index.php?category_name=$matches[1]&embed=true";s:35:"category/(.+?)/page/?([0-9]{1,})/?$";s:53:"index.php?category_name=$matches[1]&paged=$matches[2]";s:32:"category/(.+?)/wc-api(/(.*))?/?$";s:54:"index.php?category_name=$matches[1]&wc-api=$matches[3]";s:17:"category/(.+?)/?$";s:35:"index.php?category_name=$matches[1]";s:44:"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:39:"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?tag=$matches[1]&feed=$matches[2]";s:20:"tag/([^/]+)/embed/?$";s:36:"index.php?tag=$matches[1]&embed=true";s:32:"tag/([^/]+)/page/?([0-9]{1,})/?$";s:43:"index.php?tag=$matches[1]&paged=$matches[2]";s:29:"tag/([^/]+)/wc-api(/(.*))?/?$";s:44:"index.php?tag=$matches[1]&wc-api=$matches[3]";s:14:"tag/([^/]+)/?$";s:25:"index.php?tag=$matches[1]";s:45:"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:40:"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?post_format=$matches[1]&feed=$matches[2]";s:21:"type/([^/]+)/embed/?$";s:44:"index.php?post_format=$matches[1]&embed=true";s:33:"type/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?post_format=$matches[1]&paged=$matches[2]";s:15:"type/([^/]+)/?$";s:33:"index.php?post_format=$matches[1]";s:55:"product-category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?product_cat=$matches[1]&feed=$matches[2]";s:50:"product-category/(.+?)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?product_cat=$matches[1]&feed=$matches[2]";s:31:"product-category/(.+?)/embed/?$";s:44:"index.php?product_cat=$matches[1]&embed=true";s:43:"product-category/(.+?)/page/?([0-9]{1,})/?$";s:51:"index.php?product_cat=$matches[1]&paged=$matches[2]";s:25:"product-category/(.+?)/?$";s:33:"index.php?product_cat=$matches[1]";s:52:"product-tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?product_tag=$matches[1]&feed=$matches[2]";s:47:"product-tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?product_tag=$matches[1]&feed=$matches[2]";s:28:"product-tag/([^/]+)/embed/?$";s:44:"index.php?product_tag=$matches[1]&embed=true";s:40:"product-tag/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?product_tag=$matches[1]&paged=$matches[2]";s:22:"product-tag/([^/]+)/?$";s:33:"index.php?product_tag=$matches[1]";s:35:"product/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"product/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"product/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"product/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"product/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"product/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:24:"product/([^/]+)/embed/?$";s:40:"index.php?product=$matches[1]&embed=true";s:28:"product/([^/]+)/trackback/?$";s:34:"index.php?product=$matches[1]&tb=1";s:48:"product/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?product=$matches[1]&feed=$matches[2]";s:43:"product/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:46:"index.php?product=$matches[1]&feed=$matches[2]";s:36:"product/([^/]+)/page/?([0-9]{1,})/?$";s:47:"index.php?product=$matches[1]&paged=$matches[2]";s:43:"product/([^/]+)/comment-page-([0-9]{1,})/?$";s:47:"index.php?product=$matches[1]&cpage=$matches[2]";s:33:"product/([^/]+)/wc-api(/(.*))?/?$";s:48:"index.php?product=$matches[1]&wc-api=$matches[3]";s:39:"product/[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:50:"product/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:32:"product/([^/]+)(?:/([0-9]+))?/?$";s:46:"index.php?product=$matches[1]&page=$matches[2]";s:24:"product/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:34:"product/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:54:"product/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:49:"product/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:49:"product/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:30:"product/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:45:"product_variation/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:55:"product_variation/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:75:"product_variation/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:70:"product_variation/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:70:"product_variation/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:51:"product_variation/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:34:"product_variation/([^/]+)/embed/?$";s:50:"index.php?product_variation=$matches[1]&embed=true";s:38:"product_variation/([^/]+)/trackback/?$";s:44:"index.php?product_variation=$matches[1]&tb=1";s:46:"product_variation/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?product_variation=$matches[1]&paged=$matches[2]";s:53:"product_variation/([^/]+)/comment-page-([0-9]{1,})/?$";s:57:"index.php?product_variation=$matches[1]&cpage=$matches[2]";s:43:"product_variation/([^/]+)/wc-api(/(.*))?/?$";s:58:"index.php?product_variation=$matches[1]&wc-api=$matches[3]";s:49:"product_variation/[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:60:"product_variation/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:42:"product_variation/([^/]+)(?:/([0-9]+))?/?$";s:56:"index.php?product_variation=$matches[1]&page=$matches[2]";s:34:"product_variation/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:44:"product_variation/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:64:"product_variation/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:59:"product_variation/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:59:"product_variation/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:40:"product_variation/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:45:"shop_order_refund/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:55:"shop_order_refund/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:75:"shop_order_refund/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:70:"shop_order_refund/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:70:"shop_order_refund/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:51:"shop_order_refund/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:34:"shop_order_refund/([^/]+)/embed/?$";s:50:"index.php?shop_order_refund=$matches[1]&embed=true";s:38:"shop_order_refund/([^/]+)/trackback/?$";s:44:"index.php?shop_order_refund=$matches[1]&tb=1";s:46:"shop_order_refund/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?shop_order_refund=$matches[1]&paged=$matches[2]";s:53:"shop_order_refund/([^/]+)/comment-page-([0-9]{1,})/?$";s:57:"index.php?shop_order_refund=$matches[1]&cpage=$matches[2]";s:43:"shop_order_refund/([^/]+)/wc-api(/(.*))?/?$";s:58:"index.php?shop_order_refund=$matches[1]&wc-api=$matches[3]";s:49:"shop_order_refund/[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:60:"shop_order_refund/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:42:"shop_order_refund/([^/]+)(?:/([0-9]+))?/?$";s:56:"index.php?shop_order_refund=$matches[1]&page=$matches[2]";s:34:"shop_order_refund/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:44:"shop_order_refund/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:64:"shop_order_refund/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:59:"shop_order_refund/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:59:"shop_order_refund/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:40:"shop_order_refund/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:61:"testimonial-category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:59:"index.php?testimonial-category=$matches[1]&feed=$matches[2]";s:56:"testimonial-category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:59:"index.php?testimonial-category=$matches[1]&feed=$matches[2]";s:37:"testimonial-category/([^/]+)/embed/?$";s:53:"index.php?testimonial-category=$matches[1]&embed=true";s:49:"testimonial-category/([^/]+)/page/?([0-9]{1,})/?$";s:60:"index.php?testimonial-category=$matches[1]&paged=$matches[2]";s:31:"testimonial-category/([^/]+)/?$";s:42:"index.php?testimonial-category=$matches[1]";s:58:"services-category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?services-category=$matches[1]&feed=$matches[2]";s:53:"services-category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:56:"index.php?services-category=$matches[1]&feed=$matches[2]";s:34:"services-category/([^/]+)/embed/?$";s:50:"index.php?services-category=$matches[1]&embed=true";s:46:"services-category/([^/]+)/page/?([0-9]{1,})/?$";s:57:"index.php?services-category=$matches[1]&paged=$matches[2]";s:28:"services-category/([^/]+)/?$";s:39:"index.php?services-category=$matches[1]";s:54:"team-category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?team-category=$matches[1]&feed=$matches[2]";s:49:"team-category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:52:"index.php?team-category=$matches[1]&feed=$matches[2]";s:30:"team-category/([^/]+)/embed/?$";s:46:"index.php?team-category=$matches[1]&embed=true";s:42:"team-category/([^/]+)/page/?([0-9]{1,})/?$";s:53:"index.php?team-category=$matches[1]&paged=$matches[2]";s:24:"team-category/([^/]+)/?$";s:35:"index.php?team-category=$matches[1]";s:59:"portfolio-category/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:57:"index.php?portfolio-category=$matches[1]&feed=$matches[2]";s:54:"portfolio-category/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:57:"index.php?portfolio-category=$matches[1]&feed=$matches[2]";s:35:"portfolio-category/([^/]+)/embed/?$";s:51:"index.php?portfolio-category=$matches[1]&embed=true";s:47:"portfolio-category/([^/]+)/page/?([0-9]{1,})/?$";s:58:"index.php?portfolio-category=$matches[1]&paged=$matches[2]";s:29:"portfolio-category/([^/]+)/?$";s:40:"index.php?portfolio-category=$matches[1]";s:39:"testimonial/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:49:"testimonial/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:69:"testimonial/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"testimonial/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:64:"testimonial/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:45:"testimonial/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:28:"testimonial/([^/]+)/embed/?$";s:44:"index.php?testimonial=$matches[1]&embed=true";s:32:"testimonial/([^/]+)/trackback/?$";s:38:"index.php?testimonial=$matches[1]&tb=1";s:40:"testimonial/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?testimonial=$matches[1]&paged=$matches[2]";s:47:"testimonial/([^/]+)/comment-page-([0-9]{1,})/?$";s:51:"index.php?testimonial=$matches[1]&cpage=$matches[2]";s:37:"testimonial/([^/]+)/wc-api(/(.*))?/?$";s:52:"index.php?testimonial=$matches[1]&wc-api=$matches[3]";s:43:"testimonial/[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:54:"testimonial/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:36:"testimonial/([^/]+)(?:/([0-9]+))?/?$";s:50:"index.php?testimonial=$matches[1]&page=$matches[2]";s:28:"testimonial/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:38:"testimonial/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:58:"testimonial/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"testimonial/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:53:"testimonial/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:34:"testimonial/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:32:"team/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:42:"team/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:62:"team/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:57:"team/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:57:"team/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:38:"team/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:21:"team/([^/]+)/embed/?$";s:37:"index.php?team=$matches[1]&embed=true";s:25:"team/([^/]+)/trackback/?$";s:31:"index.php?team=$matches[1]&tb=1";s:33:"team/([^/]+)/page/?([0-9]{1,})/?$";s:44:"index.php?team=$matches[1]&paged=$matches[2]";s:40:"team/([^/]+)/comment-page-([0-9]{1,})/?$";s:44:"index.php?team=$matches[1]&cpage=$matches[2]";s:30:"team/([^/]+)/wc-api(/(.*))?/?$";s:45:"index.php?team=$matches[1]&wc-api=$matches[3]";s:36:"team/[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:47:"team/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:29:"team/([^/]+)(?:/([0-9]+))?/?$";s:43:"index.php?team=$matches[1]&page=$matches[2]";s:21:"team/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:31:"team/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:51:"team/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:46:"team/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:46:"team/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:27:"team/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:37:"portfolio/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:47:"portfolio/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:67:"portfolio/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:62:"portfolio/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:62:"portfolio/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:43:"portfolio/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:26:"portfolio/([^/]+)/embed/?$";s:42:"index.php?portfolio=$matches[1]&embed=true";s:30:"portfolio/([^/]+)/trackback/?$";s:36:"index.php?portfolio=$matches[1]&tb=1";s:38:"portfolio/([^/]+)/page/?([0-9]{1,})/?$";s:49:"index.php?portfolio=$matches[1]&paged=$matches[2]";s:45:"portfolio/([^/]+)/comment-page-([0-9]{1,})/?$";s:49:"index.php?portfolio=$matches[1]&cpage=$matches[2]";s:35:"portfolio/([^/]+)/wc-api(/(.*))?/?$";s:50:"index.php?portfolio=$matches[1]&wc-api=$matches[3]";s:41:"portfolio/[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:52:"portfolio/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:34:"portfolio/([^/]+)(?:/([0-9]+))?/?$";s:48:"index.php?portfolio=$matches[1]&page=$matches[2]";s:26:"portfolio/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:36:"portfolio/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:56:"portfolio/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:51:"portfolio/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:51:"portfolio/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:32:"portfolio/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:35:"service/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:45:"service/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:65:"service/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"service/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:60:"service/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:41:"service/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:24:"service/([^/]+)/embed/?$";s:40:"index.php?service=$matches[1]&embed=true";s:28:"service/([^/]+)/trackback/?$";s:34:"index.php?service=$matches[1]&tb=1";s:36:"service/([^/]+)/page/?([0-9]{1,})/?$";s:47:"index.php?service=$matches[1]&paged=$matches[2]";s:43:"service/([^/]+)/comment-page-([0-9]{1,})/?$";s:47:"index.php?service=$matches[1]&cpage=$matches[2]";s:33:"service/([^/]+)/wc-api(/(.*))?/?$";s:48:"index.php?service=$matches[1]&wc-api=$matches[3]";s:39:"service/[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:50:"service/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:32:"service/([^/]+)(?:/([0-9]+))?/?$";s:46:"index.php?service=$matches[1]&page=$matches[2]";s:24:"service/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:34:"service/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:54:"service/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:49:"service/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:49:"service/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:30:"service/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:40:"vc_grid_item/[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:50:"vc_grid_item/[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:70:"vc_grid_item/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"vc_grid_item/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:65:"vc_grid_item/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:46:"vc_grid_item/[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:29:"vc_grid_item/([^/]+)/embed/?$";s:45:"index.php?vc_grid_item=$matches[1]&embed=true";s:33:"vc_grid_item/([^/]+)/trackback/?$";s:39:"index.php?vc_grid_item=$matches[1]&tb=1";s:41:"vc_grid_item/([^/]+)/page/?([0-9]{1,})/?$";s:52:"index.php?vc_grid_item=$matches[1]&paged=$matches[2]";s:48:"vc_grid_item/([^/]+)/comment-page-([0-9]{1,})/?$";s:52:"index.php?vc_grid_item=$matches[1]&cpage=$matches[2]";s:38:"vc_grid_item/([^/]+)/wc-api(/(.*))?/?$";s:53:"index.php?vc_grid_item=$matches[1]&wc-api=$matches[3]";s:44:"vc_grid_item/[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:55:"vc_grid_item/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:37:"vc_grid_item/([^/]+)(?:/([0-9]+))?/?$";s:51:"index.php?vc_grid_item=$matches[1]&page=$matches[2]";s:29:"vc_grid_item/[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:39:"vc_grid_item/[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:59:"vc_grid_item/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"vc_grid_item/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:54:"vc_grid_item/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:35:"vc_grid_item/[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:48:".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$";s:18:"index.php?feed=old";s:20:".*wp-app\\.php(/.*)?$";s:19:"index.php?error=403";s:18:".*wp-register.php$";s:23:"index.php?register=true";s:32:"feed/(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:27:"(feed|rdf|rss|rss2|atom)/?$";s:27:"index.php?&feed=$matches[1]";s:8:"embed/?$";s:21:"index.php?&embed=true";s:20:"page/?([0-9]{1,})/?$";s:28:"index.php?&paged=$matches[1]";s:27:"comment-page-([0-9]{1,})/?$";s:38:"index.php?&page_id=4&cpage=$matches[1]";s:17:"wc-api(/(.*))?/?$";s:29:"index.php?&wc-api=$matches[2]";s:41:"comments/feed/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:36:"comments/(feed|rdf|rss|rss2|atom)/?$";s:42:"index.php?&feed=$matches[1]&withcomments=1";s:17:"comments/embed/?$";s:21:"index.php?&embed=true";s:26:"comments/wc-api(/(.*))?/?$";s:29:"index.php?&wc-api=$matches[2]";s:44:"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:39:"search/(.+)/(feed|rdf|rss|rss2|atom)/?$";s:40:"index.php?s=$matches[1]&feed=$matches[2]";s:20:"search/(.+)/embed/?$";s:34:"index.php?s=$matches[1]&embed=true";s:32:"search/(.+)/page/?([0-9]{1,})/?$";s:41:"index.php?s=$matches[1]&paged=$matches[2]";s:29:"search/(.+)/wc-api(/(.*))?/?$";s:42:"index.php?s=$matches[1]&wc-api=$matches[3]";s:14:"search/(.+)/?$";s:23:"index.php?s=$matches[1]";s:47:"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:42:"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:50:"index.php?author_name=$matches[1]&feed=$matches[2]";s:23:"author/([^/]+)/embed/?$";s:44:"index.php?author_name=$matches[1]&embed=true";s:35:"author/([^/]+)/page/?([0-9]{1,})/?$";s:51:"index.php?author_name=$matches[1]&paged=$matches[2]";s:32:"author/([^/]+)/wc-api(/(.*))?/?$";s:52:"index.php?author_name=$matches[1]&wc-api=$matches[3]";s:17:"author/([^/]+)/?$";s:33:"index.php?author_name=$matches[1]";s:69:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:64:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:80:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]";s:45:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$";s:74:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true";s:57:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:81:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]";s:54:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/wc-api(/(.*))?/?$";s:82:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&wc-api=$matches[5]";s:39:"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$";s:63:"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]";s:56:"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:51:"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$";s:64:"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]";s:32:"([0-9]{4})/([0-9]{1,2})/embed/?$";s:58:"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true";s:44:"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$";s:65:"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]";s:41:"([0-9]{4})/([0-9]{1,2})/wc-api(/(.*))?/?$";s:66:"index.php?year=$matches[1]&monthnum=$matches[2]&wc-api=$matches[4]";s:26:"([0-9]{4})/([0-9]{1,2})/?$";s:47:"index.php?year=$matches[1]&monthnum=$matches[2]";s:43:"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:38:"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?year=$matches[1]&feed=$matches[2]";s:19:"([0-9]{4})/embed/?$";s:37:"index.php?year=$matches[1]&embed=true";s:31:"([0-9]{4})/page/?([0-9]{1,})/?$";s:44:"index.php?year=$matches[1]&paged=$matches[2]";s:28:"([0-9]{4})/wc-api(/(.*))?/?$";s:45:"index.php?year=$matches[1]&wc-api=$matches[3]";s:13:"([0-9]{4})/?$";s:26:"index.php?year=$matches[1]";s:27:".?.+?/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:".?.+?/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:".?.+?/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"(.?.+?)/embed/?$";s:41:"index.php?pagename=$matches[1]&embed=true";s:20:"(.?.+?)/trackback/?$";s:35:"index.php?pagename=$matches[1]&tb=1";s:40:"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:35:"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$";s:47:"index.php?pagename=$matches[1]&feed=$matches[2]";s:28:"(.?.+?)/page/?([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&paged=$matches[2]";s:35:"(.?.+?)/comment-page-([0-9]{1,})/?$";s:48:"index.php?pagename=$matches[1]&cpage=$matches[2]";s:25:"(.?.+?)/wc-api(/(.*))?/?$";s:49:"index.php?pagename=$matches[1]&wc-api=$matches[3]";s:28:"(.?.+?)/order-pay(/(.*))?/?$";s:52:"index.php?pagename=$matches[1]&order-pay=$matches[3]";s:33:"(.?.+?)/order-received(/(.*))?/?$";s:57:"index.php?pagename=$matches[1]&order-received=$matches[3]";s:25:"(.?.+?)/orders(/(.*))?/?$";s:49:"index.php?pagename=$matches[1]&orders=$matches[3]";s:29:"(.?.+?)/view-order(/(.*))?/?$";s:53:"index.php?pagename=$matches[1]&view-order=$matches[3]";s:28:"(.?.+?)/downloads(/(.*))?/?$";s:52:"index.php?pagename=$matches[1]&downloads=$matches[3]";s:31:"(.?.+?)/edit-account(/(.*))?/?$";s:55:"index.php?pagename=$matches[1]&edit-account=$matches[3]";s:31:"(.?.+?)/edit-address(/(.*))?/?$";s:55:"index.php?pagename=$matches[1]&edit-address=$matches[3]";s:34:"(.?.+?)/payment-methods(/(.*))?/?$";s:58:"index.php?pagename=$matches[1]&payment-methods=$matches[3]";s:32:"(.?.+?)/lost-password(/(.*))?/?$";s:56:"index.php?pagename=$matches[1]&lost-password=$matches[3]";s:34:"(.?.+?)/customer-logout(/(.*))?/?$";s:58:"index.php?pagename=$matches[1]&customer-logout=$matches[3]";s:37:"(.?.+?)/add-payment-method(/(.*))?/?$";s:61:"index.php?pagename=$matches[1]&add-payment-method=$matches[3]";s:40:"(.?.+?)/delete-payment-method(/(.*))?/?$";s:64:"index.php?pagename=$matches[1]&delete-payment-method=$matches[3]";s:45:"(.?.+?)/set-default-payment-method(/(.*))?/?$";s:69:"index.php?pagename=$matches[1]&set-default-payment-method=$matches[3]";s:31:".?.+?/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:42:".?.+?/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:24:"(.?.+?)(?:/([0-9]+))?/?$";s:47:"index.php?pagename=$matches[1]&page=$matches[2]";s:27:"[^/]+/attachment/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:37:"[^/]+/attachment/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:57:"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:52:"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:33:"[^/]+/attachment/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";s:16:"([^/]+)/embed/?$";s:37:"index.php?name=$matches[1]&embed=true";s:20:"([^/]+)/trackback/?$";s:31:"index.php?name=$matches[1]&tb=1";s:40:"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:35:"([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:43:"index.php?name=$matches[1]&feed=$matches[2]";s:28:"([^/]+)/page/?([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&paged=$matches[2]";s:35:"([^/]+)/comment-page-([0-9]{1,})/?$";s:44:"index.php?name=$matches[1]&cpage=$matches[2]";s:25:"([^/]+)/wc-api(/(.*))?/?$";s:45:"index.php?name=$matches[1]&wc-api=$matches[3]";s:31:"[^/]+/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:42:"[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$";s:51:"index.php?attachment=$matches[1]&wc-api=$matches[3]";s:24:"([^/]+)(?:/([0-9]+))?/?$";s:43:"index.php?name=$matches[1]&page=$matches[2]";s:16:"[^/]+/([^/]+)/?$";s:32:"index.php?attachment=$matches[1]";s:26:"[^/]+/([^/]+)/trackback/?$";s:37:"index.php?attachment=$matches[1]&tb=1";s:46:"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$";s:49:"index.php?attachment=$matches[1]&feed=$matches[2]";s:41:"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$";s:50:"index.php?attachment=$matches[1]&cpage=$matches[2]";s:22:"[^/]+/([^/]+)/embed/?$";s:43:"index.php?attachment=$matches[1]&embed=true";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:9:{i:0;s:35:"redux-framework/redux-framework.php";i:1;s:21:"cmstheme/cmstheme.php";i:2;s:36:"contact-form-7/wp-contact-form-7.php";i:3;s:43:"custom-post-type-ui/custom-post-type-ui.php";i:5;s:27:"js_composer/js_composer.php";i:6;s:21:"newsletter/plugin.php";i:7;s:23:"revslider/revslider.php";i:8;s:27:"woocommerce/woocommerce.php";i:9;s:41:"wordpress-importer/wordpress-importer.php";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', '3d-printing', 'yes'),
(41, 'stylesheet', '3d-printing', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '36686', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '0', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'page', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(79, 'widget_text', 'a:7:{i:2;a:3:{s:5:"title";s:10:"CONTACT US";s:4:"text";s:316:"<ul class="footer-bottom-contact">\r\n<li><i class="fa fa-map-marker"></i>\r\n<span>201 Main Design Street West Valley\r\nCity, New York, United State</span></li>\r\n<li><i class="fa fa-phone"></i>\r\n<span>+00 12345 12 11</span> </li>\r\n<li><i class="fa fa-envelope-o"></i>\r\n<a href="#">support@3dprinting.com</a> </li>\r\n</ul>";s:6:"filter";b:0;}i:3;a:3:{s:5:"title";s:0:"";s:4:"text";s:583:"<figure class="wpb_wrapper vc_figure" style="text-align:center">\r\n			<a href="#" target="_blank" class="vc_single_image-wrapper   vc_box_border_grey"><img width="270" height="320" src="http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/banner.jpg" class="vc_single_image-img attachment-full" alt="banner" srcset="http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/banner-253x300.jpg 253w, http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/banner.jpg 270w" sizes="(max-width: 270px) 100vw, 270px"></a>\r\n		</figure>";s:6:"filter";b:0;}i:4;a:3:{s:5:"title";s:15:"LEAVE A MESSAGE";s:4:"text";s:49:"[contact-form-7 id="272" title="Contact Product"]";s:6:"filter";b:0;}i:5;a:3:{s:5:"title";s:0:"";s:4:"text";s:583:"<figure class="wpb_wrapper vc_figure" style="text-align:center">\r\n			<a href="#" target="_blank" class="vc_single_image-wrapper   vc_box_border_grey"><img width="270" height="320" src="http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/banner.jpg" class="vc_single_image-img attachment-full" alt="banner" srcset="http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/banner-253x300.jpg 253w, http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/banner.jpg 270w" sizes="(max-width: 270px) 100vw, 270px"></a>\r\n		</figure>";s:6:"filter";b:0;}i:6;a:3:{s:5:"title";s:0:"";s:4:"text";s:57:"<h2>Newsletter Signup <i class="fa fa-envelope"></i></h2>";s:6:"filter";b:0;}i:7;a:3:{s:5:"title";s:18:"3D PRINTED PRODUCT";s:4:"text";s:250:"<div class="clearfix">[zo_grid col_xs="3" col_sm="3" col_md="3" col_lg="3" image_size="custom" image_width="100" image_height="100" title_link="1" source="size:6|order_by:date|post_type:product|tax_query:15" zo_template="zo_grid--products.php"]</div>";s:6:"filter";b:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(80, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:"_multiwidget";i:1;}', 'yes'),
(81, 'uninstall_plugins', 'a:0:{}', 'no'),
(82, 'timezone_string', '', 'yes'),
(83, 'page_for_posts', '48', 'yes'),
(84, 'page_on_front', '4', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'initial_db_version', '36686', 'yes'),
(92, 'wp_user_roles', 'a:7:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:140:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;s:18:"manage_woocommerce";b:1;s:24:"view_woocommerce_reports";b:1;s:12:"edit_product";b:1;s:12:"read_product";b:1;s:14:"delete_product";b:1;s:13:"edit_products";b:1;s:20:"edit_others_products";b:1;s:16:"publish_products";b:1;s:21:"read_private_products";b:1;s:15:"delete_products";b:1;s:23:"delete_private_products";b:1;s:25:"delete_published_products";b:1;s:22:"delete_others_products";b:1;s:21:"edit_private_products";b:1;s:23:"edit_published_products";b:1;s:20:"manage_product_terms";b:1;s:18:"edit_product_terms";b:1;s:20:"delete_product_terms";b:1;s:20:"assign_product_terms";b:1;s:15:"edit_shop_order";b:1;s:15:"read_shop_order";b:1;s:17:"delete_shop_order";b:1;s:16:"edit_shop_orders";b:1;s:23:"edit_others_shop_orders";b:1;s:19:"publish_shop_orders";b:1;s:24:"read_private_shop_orders";b:1;s:18:"delete_shop_orders";b:1;s:26:"delete_private_shop_orders";b:1;s:28:"delete_published_shop_orders";b:1;s:25:"delete_others_shop_orders";b:1;s:24:"edit_private_shop_orders";b:1;s:26:"edit_published_shop_orders";b:1;s:23:"manage_shop_order_terms";b:1;s:21:"edit_shop_order_terms";b:1;s:23:"delete_shop_order_terms";b:1;s:23:"assign_shop_order_terms";b:1;s:16:"edit_shop_coupon";b:1;s:16:"read_shop_coupon";b:1;s:18:"delete_shop_coupon";b:1;s:17:"edit_shop_coupons";b:1;s:24:"edit_others_shop_coupons";b:1;s:20:"publish_shop_coupons";b:1;s:25:"read_private_shop_coupons";b:1;s:19:"delete_shop_coupons";b:1;s:27:"delete_private_shop_coupons";b:1;s:29:"delete_published_shop_coupons";b:1;s:26:"delete_others_shop_coupons";b:1;s:25:"edit_private_shop_coupons";b:1;s:27:"edit_published_shop_coupons";b:1;s:24:"manage_shop_coupon_terms";b:1;s:22:"edit_shop_coupon_terms";b:1;s:24:"delete_shop_coupon_terms";b:1;s:24:"assign_shop_coupon_terms";b:1;s:17:"edit_shop_webhook";b:1;s:17:"read_shop_webhook";b:1;s:19:"delete_shop_webhook";b:1;s:18:"edit_shop_webhooks";b:1;s:25:"edit_others_shop_webhooks";b:1;s:21:"publish_shop_webhooks";b:1;s:26:"read_private_shop_webhooks";b:1;s:20:"delete_shop_webhooks";b:1;s:28:"delete_private_shop_webhooks";b:1;s:30:"delete_published_shop_webhooks";b:1;s:27:"delete_others_shop_webhooks";b:1;s:26:"edit_private_shop_webhooks";b:1;s:28:"edit_published_shop_webhooks";b:1;s:25:"manage_shop_webhook_terms";b:1;s:23:"edit_shop_webhook_terms";b:1;s:25:"delete_shop_webhook_terms";b:1;s:25:"assign_shop_webhook_terms";b:1;s:26:"vc_access_rules_post_types";b:1;s:30:"vc_access_rules_backend_editor";b:1;s:31:"vc_access_rules_frontend_editor";b:1;s:29:"vc_access_rules_post_settings";b:1;s:24:"vc_access_rules_settings";b:1;s:25:"vc_access_rules_templates";b:1;s:26:"vc_access_rules_shortcodes";b:1;s:28:"vc_access_rules_grid_builder";b:1;s:23:"vc_access_rules_presets";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:44:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:31:"vc_access_rules_post_types/page";b:1;s:36:"vc_access_rules_post_types/portfolio";b:1;s:26:"vc_access_rules_post_types";s:6:"custom";s:30:"vc_access_rules_backend_editor";b:1;s:31:"vc_access_rules_frontend_editor";b:1;s:29:"vc_access_rules_post_settings";b:1;s:25:"vc_access_rules_templates";b:1;s:26:"vc_access_rules_shortcodes";b:1;s:28:"vc_access_rules_grid_builder";b:1;s:23:"vc_access_rules_presets";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:18:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;s:26:"vc_access_rules_post_types";b:1;s:30:"vc_access_rules_backend_editor";b:1;s:31:"vc_access_rules_frontend_editor";b:1;s:29:"vc_access_rules_post_settings";b:1;s:25:"vc_access_rules_templates";b:1;s:26:"vc_access_rules_shortcodes";b:1;s:28:"vc_access_rules_grid_builder";b:1;s:23:"vc_access_rules_presets";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:13:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:26:"vc_access_rules_post_types";b:1;s:30:"vc_access_rules_backend_editor";b:1;s:31:"vc_access_rules_frontend_editor";b:1;s:29:"vc_access_rules_post_settings";b:1;s:25:"vc_access_rules_templates";b:1;s:26:"vc_access_rules_shortcodes";b:1;s:28:"vc_access_rules_grid_builder";b:1;s:23:"vc_access_rules_presets";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}s:8:"customer";a:2:{s:4:"name";s:8:"Customer";s:12:"capabilities";a:1:{s:4:"read";b:1;}}s:12:"shop_manager";a:2:{s:4:"name";s:12:"Shop Manager";s:12:"capabilities";a:118:{s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:4:"read";b:1;s:18:"read_private_pages";b:1;s:18:"read_private_posts";b:1;s:10:"edit_users";b:1;s:10:"edit_posts";b:1;s:10:"edit_pages";b:1;s:20:"edit_published_posts";b:1;s:20:"edit_published_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"edit_private_posts";b:1;s:17:"edit_others_posts";b:1;s:17:"edit_others_pages";b:1;s:13:"publish_posts";b:1;s:13:"publish_pages";b:1;s:12:"delete_posts";b:1;s:12:"delete_pages";b:1;s:20:"delete_private_pages";b:1;s:20:"delete_private_posts";b:1;s:22:"delete_published_pages";b:1;s:22:"delete_published_posts";b:1;s:19:"delete_others_posts";b:1;s:19:"delete_others_pages";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:17:"moderate_comments";b:1;s:15:"unfiltered_html";b:1;s:12:"upload_files";b:1;s:6:"export";b:1;s:6:"import";b:1;s:10:"list_users";b:1;s:18:"manage_woocommerce";b:1;s:24:"view_woocommerce_reports";b:1;s:12:"edit_product";b:1;s:12:"read_product";b:1;s:14:"delete_product";b:1;s:13:"edit_products";b:1;s:20:"edit_others_products";b:1;s:16:"publish_products";b:1;s:21:"read_private_products";b:1;s:15:"delete_products";b:1;s:23:"delete_private_products";b:1;s:25:"delete_published_products";b:1;s:22:"delete_others_products";b:1;s:21:"edit_private_products";b:1;s:23:"edit_published_products";b:1;s:20:"manage_product_terms";b:1;s:18:"edit_product_terms";b:1;s:20:"delete_product_terms";b:1;s:20:"assign_product_terms";b:1;s:15:"edit_shop_order";b:1;s:15:"read_shop_order";b:1;s:17:"delete_shop_order";b:1;s:16:"edit_shop_orders";b:1;s:23:"edit_others_shop_orders";b:1;s:19:"publish_shop_orders";b:1;s:24:"read_private_shop_orders";b:1;s:18:"delete_shop_orders";b:1;s:26:"delete_private_shop_orders";b:1;s:28:"delete_published_shop_orders";b:1;s:25:"delete_others_shop_orders";b:1;s:24:"edit_private_shop_orders";b:1;s:26:"edit_published_shop_orders";b:1;s:23:"manage_shop_order_terms";b:1;s:21:"edit_shop_order_terms";b:1;s:23:"delete_shop_order_terms";b:1;s:23:"assign_shop_order_terms";b:1;s:16:"edit_shop_coupon";b:1;s:16:"read_shop_coupon";b:1;s:18:"delete_shop_coupon";b:1;s:17:"edit_shop_coupons";b:1;s:24:"edit_others_shop_coupons";b:1;s:20:"publish_shop_coupons";b:1;s:25:"read_private_shop_coupons";b:1;s:19:"delete_shop_coupons";b:1;s:27:"delete_private_shop_coupons";b:1;s:29:"delete_published_shop_coupons";b:1;s:26:"delete_others_shop_coupons";b:1;s:25:"edit_private_shop_coupons";b:1;s:27:"edit_published_shop_coupons";b:1;s:24:"manage_shop_coupon_terms";b:1;s:22:"edit_shop_coupon_terms";b:1;s:24:"delete_shop_coupon_terms";b:1;s:24:"assign_shop_coupon_terms";b:1;s:17:"edit_shop_webhook";b:1;s:17:"read_shop_webhook";b:1;s:19:"delete_shop_webhook";b:1;s:18:"edit_shop_webhooks";b:1;s:25:"edit_others_shop_webhooks";b:1;s:21:"publish_shop_webhooks";b:1;s:26:"read_private_shop_webhooks";b:1;s:20:"delete_shop_webhooks";b:1;s:28:"delete_private_shop_webhooks";b:1;s:30:"delete_published_shop_webhooks";b:1;s:27:"delete_others_shop_webhooks";b:1;s:26:"edit_private_shop_webhooks";b:1;s:28:"edit_published_shop_webhooks";b:1;s:25:"manage_shop_webhook_terms";b:1;s:23:"edit_shop_webhook_terms";b:1;s:25:"delete_shop_webhook_terms";b:1;s:25:"assign_shop_webhook_terms";b:1;s:26:"vc_access_rules_post_types";b:1;s:30:"vc_access_rules_backend_editor";b:1;s:31:"vc_access_rules_frontend_editor";b:1;s:29:"vc_access_rules_post_settings";b:1;s:25:"vc_access_rules_templates";b:1;s:26:"vc_access_rules_shortcodes";b:1;s:28:"vc_access_rules_grid_builder";b:1;s:23:"vc_access_rules_presets";b:1;}}}', 'yes'),
(93, 'widget_search', 'a:3:{i:2;a:1:{s:5:"title";s:0:"";}i:3;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(94, 'widget_recent-posts', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(95, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(96, 'widget_archives', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes'),
(97, 'widget_meta', 'a:1:{s:12:"_multiwidget";i:1;}', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

DROP TABLE IF EXISTS `wp_postmeta`;
CREATE TABLE IF NOT EXISTS `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5265 ;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 4, '_edit_last', '1'),
(3, 4, '_edit_lock', '1470284030:1'),
(4, 4, '_wp_page_template', 'default'),
(5, 4, '_zo_meta_data', '{"_zo_page_layout":"0","_zo_page_body_bg_color":"","_zo_page_body_bg_image":"","_zo_page_body_bg_position":"","_zo_page_body_bg_attachment":"","_zo_page_body_bg_size":"","_zo_page_body_bg_repeat":"","_zo_page_boxed_bg_color":"","_zo_page_boxed_image":"","_zo_header_layout":"default","_zo_header_width":"","_zo_header_transparent":"","_zo_header_bg_color":"","_zo_header_bg_image":"","_zo_header_bg_position":"","_zo_header_bg_attachment":"","_zo_header_bg_size":"","_zo_header_logo":"","_zo_primary":"","_zo_header_menu_color":"","_zo_header_menu_color_hover":"","_zo_header_menu_color_active":"","_zo_header_sub_menu_color":"","_zo_header_sub_menu_color_hover":"","_zo_page_title":"off","_zo_page_title_width":"default","_zo_page_title_height":"","_zo_page_title_mobile_height":"","_zo_page_title_bg_color":"","_zo_page_title_bg_image":"","_zo_page_title_bg_position":"","_zo_page_title_bg_attachment":"","_zo_page_title_bg_size":"","_zo_page_title_text_bar":"on","_zo_page_title_text_alignment":"default","_zo_page_title_text_horizontal_alignment":"default","_zo_page_title_text_padding_top":"","_zo_page_title_text_padding_bottom":"","_zo_page_title_text":"","_zo_page_title_sub_text":"","_zo_page_title_breadcrumb_display":"default","_zo_page_title_breadcrumb_position":"default","_zo_footer_layout":"","_zo_footer_width":"","_zo_footer_widget":"","_zo_footer_bg_color":"","_zo_footer_bg_image":"","_zo_footer_bg_position":"","_zo_footer_bg_attachment":"","_zo_footer_bg_size":"","_zo_footer_copyright":"","_zo_footer_copyright_bg_color":""}'),
(6, 6, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(7, 6, '_form', '<div class="page-contact">\n<p class="contact-name">[text* name class:name placeholder "Name*"]</p>\n<p class="contact-email-phone">[email* email class:email placeholder "Email*"][text* phone min:9 max:15 class:phone placeholder "Phone*"]</p>\n<p class="contact-message">[textarea* message class:message placeholder "Message*"]</p>\n<p class="contact-send">[submit class:send "Send Message"]</p>\n</div>'),
(8, 6, '_mail', 'a:8:{s:7:"subject";s:28:"3D Printing "[your-subject]"";s:6:"sender";s:38:"[your-name] <wordpress@dn.joomexp.com>";s:4:"body";s:195:"From: [your-name] <[your-email]>\nSubject: [your-subject]\n\nMessage Body:\n[your-message]\n\n--\nThis e-mail was sent from a contact form on 3D Printing (http://demo.cms-theme.net/wordpress/3dprinting)";s:9:"recipient";s:15:"admin@gmail.com";s:18:"additional_headers";s:22:"Reply-To: [your-email]";s:11:"attachments";s:0:"";s:8:"use_html";b:0;s:13:"exclude_blank";b:0;}'),
(9, 6, '_mail_2', 'a:9:{s:6:"active";b:0;s:7:"subject";s:28:"3D Printing "[your-subject]"";s:6:"sender";s:38:"3D Printing <wordpress@dn.joomexp.com>";s:4:"body";s:137:"Message Body:\n[your-message]\n\n--\nThis e-mail was sent from a contact form on 3D Printing (http://demo.cms-theme.net/wordpress/3dprinting)";s:9:"recipient";s:12:"[your-email]";s:18:"additional_headers";s:25:"Reply-To: admin@gmail.com";s:11:"attachments";s:0:"";s:8:"use_html";b:0;s:13:"exclude_blank";b:0;}'),
(10, 6, '_messages', 'a:23:{s:12:"mail_sent_ok";s:45:"Thank you for your message. It has been sent.";s:12:"mail_sent_ng";s:71:"There was an error trying to send your message. Please try again later.";s:16:"validation_error";s:61:"One or more fields have an error. Please check and try again.";s:4:"spam";s:71:"There was an error trying to send your message. Please try again later.";s:12:"accept_terms";s:69:"You must accept the terms and conditions before sending your message.";s:16:"invalid_required";s:22:"The field is required.";s:16:"invalid_too_long";s:22:"The field is too long.";s:17:"invalid_too_short";s:23:"The field is too short.";s:12:"invalid_date";s:29:"The date format is incorrect.";s:14:"date_too_early";s:44:"The date is before the earliest one allowed.";s:13:"date_too_late";s:41:"The date is after the latest one allowed.";s:13:"upload_failed";s:46:"There was an unknown error uploading the file.";s:24:"upload_file_type_invalid";s:49:"You are not allowed to upload files of this type.";s:21:"upload_file_too_large";s:20:"The file is too big.";s:23:"upload_failed_php_error";s:38:"There was an error uploading the file.";s:14:"invalid_number";s:29:"The number format is invalid.";s:16:"number_too_small";s:47:"The number is smaller than the minimum allowed.";s:16:"number_too_large";s:46:"The number is larger than the maximum allowed.";s:23:"quiz_answer_not_correct";s:36:"The answer to the quiz is incorrect.";s:17:"captcha_not_match";s:31:"Your entered code is incorrect.";s:13:"invalid_email";s:38:"The e-mail address entered is invalid.";s:11:"invalid_url";s:19:"The URL is invalid.";s:11:"invalid_tel";s:32:"The telephone number is invalid.";}'),
(11, 6, '_additional_settings', ''),
(12, 6, '_locale', 'en_US'),
(13, 7, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(14, 7, '_edit_last', '1'),
(15, 7, '_edit_lock', '1469159682:1'),
(16, 7, '_wp_page_template', 'default'),
(17, 7, 'slide_template', 'default'),
(18, 7, '_zo_meta_data', '{"_zo_page_layout":"0","_zo_page_body_bg_color":"","_zo_page_body_bg_image":"","_zo_page_body_bg_position":"","_zo_page_body_bg_attachment":"","_zo_page_body_bg_size":"","_zo_page_body_bg_repeat":"","_zo_page_boxed_bg_color":"","_zo_page_boxed_image":"","_zo_header_layout":"2","_zo_header_width":"","_zo_header_transparent":"","_zo_header_bg_color":"","_zo_header_bg_image":"","_zo_header_bg_position":"","_zo_header_bg_attachment":"","_zo_header_bg_size":"","_zo_header_logo":"","_zo_primary":"","_zo_header_menu_color":"","_zo_header_menu_color_hover":"","_zo_header_menu_color_active":"","_zo_header_sub_menu_color":"","_zo_header_sub_menu_color_hover":"","_zo_page_title":"off","_zo_page_title_width":"default","_zo_page_title_height":"","_zo_page_title_mobile_height":"","_zo_page_title_bg_color":"","_zo_page_title_bg_image":"","_zo_page_title_bg_position":"","_zo_page_title_bg_attachment":"","_zo_page_title_bg_size":"","_zo_page_title_text_bar":"on","_zo_page_title_text_alignment":"default","_zo_page_title_text_horizontal_alignment":"default","_zo_page_title_text_padding_top":"","_zo_page_title_text_padding_bottom":"","_zo_page_title_text":"","_zo_page_title_sub_text":"","_zo_page_title_breadcrumb_display":"default","_zo_page_title_breadcrumb_position":"default","_zo_footer_layout":"","_zo_footer_width":"","_zo_footer_widget":"","_zo_footer_bg_color":"","_zo_footer_bg_image":"","_zo_footer_bg_position":"","_zo_footer_bg_attachment":"","_zo_footer_bg_size":"","_zo_footer_copyright":"","_zo_footer_copyright_bg_color":""}'),
(19, 7, '_wpb_vc_js_status', 'true'),
(20, 8, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(21, 8, '_edit_last', '1'),
(22, 8, '_edit_lock', '1467017566:1'),
(23, 8, '_wp_page_template', 'default'),
(24, 8, 'slide_template', 'default'),
(25, 8, '_zo_meta_data', '{"_zo_page_layout":"0","_zo_page_body_bg_color":"","_zo_page_body_bg_image":"","_zo_page_body_bg_position":"","_zo_page_body_bg_attachment":"","_zo_page_body_bg_size":"","_zo_page_body_bg_repeat":"","_zo_page_boxed_bg_color":"","_zo_page_boxed_image":"","_zo_header_layout":"","_zo_header_width":"","_zo_header_transparent":"","_zo_header_bg_color":"","_zo_header_bg_image":"","_zo_header_bg_position":"","_zo_header_bg_attachment":"","_zo_header_bg_size":"","_zo_header_logo":"","_zo_primary":"","_zo_header_menu_color":"","_zo_header_menu_color_hover":"","_zo_header_menu_color_active":"","_zo_header_sub_menu_color":"","_zo_header_sub_menu_color_hover":"","_zo_page_title":"on","_zo_page_title_width":"default","_zo_page_title_height":"","_zo_page_title_mobile_height":"","_zo_page_title_bg_color":"","_zo_page_title_bg_image":"","_zo_page_title_bg_position":"","_zo_page_title_bg_attachment":"","_zo_page_title_bg_size":"","_zo_page_title_text_bar":"on","_zo_page_title_text_alignment":"default","_zo_page_title_text_horizontal_alignment":"default","_zo_page_title_text_padding_top":"","_zo_page_title_text_padding_bottom":"","_zo_page_title_text":"","_zo_page_title_sub_text":"","_zo_page_title_breadcrumb_display":"default","_zo_page_title_breadcrumb_position":"default","_zo_footer_layout":"","_zo_footer_width":"","_zo_footer_widget":"","_zo_footer_bg_color":"","_zo_footer_bg_image":"","_zo_footer_bg_position":"","_zo_footer_bg_attachment":"","_zo_footer_bg_size":"","_zo_footer_copyright":"","_zo_footer_copyright_bg_color":""}'),
(26, 8, '_wpb_vc_js_status', 'true'),
(27, 9, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(28, 9, '_edit_last', '1'),
(29, 9, '_wp_page_template', 'default'),
(30, 9, 'slide_template', 'default'),
(31, 9, '_zo_meta_data', '{"_zo_page_layout":"0","_zo_page_body_bg_color":"","_zo_page_body_bg_image":"","_zo_page_body_bg_position":"","_zo_page_body_bg_attachment":"","_zo_page_body_bg_size":"","_zo_page_body_bg_repeat":"","_zo_page_boxed_bg_color":"","_zo_page_boxed_image":"","_zo_header_layout":"","_zo_header_width":"","_zo_header_transparent":"","_zo_header_bg_color":"","_zo_header_bg_image":"","_zo_header_bg_position":"","_zo_header_bg_attachment":"","_zo_header_bg_size":"","_zo_header_logo":"","_zo_primary":"","_zo_header_menu_color":"","_zo_header_menu_color_hover":"","_zo_header_menu_color_active":"","_zo_header_sub_menu_color":"","_zo_header_sub_menu_color_hover":"","_zo_page_title":"on","_zo_page_title_width":"default","_zo_page_title_height":"","_zo_page_title_mobile_height":"","_zo_page_title_bg_color":"","_zo_page_title_bg_image":"","_zo_page_title_bg_position":"","_zo_page_title_bg_attachment":"","_zo_page_title_bg_size":"","_zo_page_title_text_bar":"on","_zo_page_title_text_alignment":"default","_zo_page_title_text_horizontal_alignment":"default","_zo_page_title_text_padding_top":"","_zo_page_title_text_padding_bottom":"","_zo_page_title_text":"","_zo_page_title_sub_text":"","_zo_page_title_breadcrumb_display":"default","_zo_page_title_breadcrumb_position":"default","_zo_footer_layout":"","_zo_footer_width":"","_zo_footer_widget":"","_zo_footer_bg_color":"","_zo_footer_bg_image":"","_zo_footer_bg_position":"","_zo_footer_bg_attachment":"","_zo_footer_bg_size":"","_zo_footer_copyright":"","_zo_footer_copyright_bg_color":""}'),
(32, 9, '_wpb_vc_js_status', 'true'),
(33, 9, '_edit_lock', '1463106363:1'),
(34, 10, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(35, 10, '_edit_last', '1'),
(36, 10, '_wp_page_template', 'default'),
(37, 10, 'slide_template', 'default'),
(38, 10, '_zo_meta_data', '{"_zo_page_layout":"0","_zo_page_body_bg_color":"","_zo_page_body_bg_image":"","_zo_page_body_bg_position":"","_zo_page_body_bg_attachment":"","_zo_page_body_bg_size":"","_zo_page_body_bg_repeat":"","_zo_page_boxed_bg_color":"","_zo_page_boxed_image":"","_zo_header_layout":"","_zo_header_width":"","_zo_header_transparent":"","_zo_header_bg_color":"","_zo_header_bg_image":"","_zo_header_bg_position":"","_zo_header_bg_attachment":"","_zo_header_bg_size":"","_zo_header_logo":"","_zo_primary":"","_zo_header_menu_color":"","_zo_header_menu_color_hover":"","_zo_header_menu_color_active":"","_zo_header_sub_menu_color":"","_zo_header_sub_menu_color_hover":"","_zo_page_title":"on","_zo_page_title_width":"default","_zo_page_title_height":"","_zo_page_title_mobile_height":"","_zo_page_title_bg_color":"","_zo_page_title_bg_image":"606","_zo_page_title_bg_position":"center center","_zo_page_title_bg_attachment":"","_zo_page_title_bg_size":"contain","_zo_page_title_text_bar":"on","_zo_page_title_text_alignment":"default","_zo_page_title_text_horizontal_alignment":"default","_zo_page_title_text_padding_top":"","_zo_page_title_text_padding_bottom":"","_zo_page_title_text":"","_zo_page_title_sub_text":"","_zo_page_title_breadcrumb_display":"default","_zo_page_title_breadcrumb_position":"default","_zo_footer_layout":"","_zo_footer_width":"","_zo_footer_widget":"","_zo_footer_bg_color":"","_zo_footer_bg_image":"","_zo_footer_bg_position":"","_zo_footer_bg_attachment":"","_zo_footer_bg_size":"","_zo_footer_copyright":"","_zo_footer_copyright_bg_color":""}'),
(39, 10, '_wpb_vc_js_status', 'true'),
(40, 10, '_edit_lock', '1464060859:1'),
(42, 12, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(43, 12, '_menu_item_type', 'post_type'),
(44, 12, '_menu_item_menu_item_parent', '13'),
(45, 12, '_menu_item_object_id', '7'),
(46, 12, '_menu_item_object', 'page'),
(47, 12, '_menu_item_target', ''),
(48, 12, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(49, 12, '_menu_item_xfn', ''),
(50, 12, '_menu_item_url', ''),
(52, 12, '_menu_item_submenu_type', ''),
(53, 12, '_menu_item_dropdown', ''),
(54, 12, '_menu_item_widget_area', ''),
(55, 12, '_menu_item_column_width', ''),
(56, 12, '_menu_item_group', 'no_group'),
(57, 12, '_menu_item_hide_link', '0'),
(58, 12, '_menu_item_bg_image', ''),
(59, 12, '_menu_item_bg_image_attachment', ''),
(60, 12, '_menu_item_bg_image_size', ''),
(61, 12, '_menu_item_bg_image_position', ''),
(62, 12, '_menu_item_bg_image_repeat', ''),
(63, 12, '_menu_item_bg_color', ''),
(64, 12, '_menu_item_menu_icon', ''),
(65, 12, '_menu_item_el_class', ''),
(66, 13, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(67, 13, '_menu_item_type', 'post_type'),
(68, 13, '_menu_item_menu_item_parent', '0'),
(69, 13, '_menu_item_object_id', '4'),
(70, 13, '_menu_item_object', 'page'),
(71, 13, '_menu_item_target', ''),
(72, 13, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(73, 13, '_menu_item_xfn', ''),
(74, 13, '_menu_item_url', ''),
(76, 13, '_menu_item_submenu_type', 'standard'),
(77, 13, '_menu_item_dropdown', 'autodrop_submenu'),
(78, 13, '_menu_item_widget_area', ''),
(79, 13, '_menu_item_column_width', ''),
(80, 13, '_menu_item_group', 'no_group'),
(81, 13, '_menu_item_hide_link', ''),
(82, 13, '_menu_item_bg_image', ''),
(83, 13, '_menu_item_bg_image_attachment', 'scroll'),
(84, 13, '_menu_item_bg_image_size', 'auto'),
(85, 13, '_menu_item_bg_image_position', 'center'),
(86, 13, '_menu_item_bg_image_repeat', 'repeat'),
(87, 13, '_menu_item_bg_color', ''),
(88, 13, '_menu_item_menu_icon', ''),
(89, 13, '_menu_item_el_class', ''),
(90, 14, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(91, 14, '_menu_item_type', 'post_type'),
(92, 14, '_menu_item_menu_item_parent', '13'),
(93, 14, '_menu_item_object_id', '4'),
(94, 14, '_menu_item_object', 'page'),
(95, 14, '_menu_item_target', ''),
(96, 14, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(97, 14, '_menu_item_xfn', ''),
(98, 14, '_menu_item_url', ''),
(100, 14, '_menu_item_submenu_type', ''),
(101, 14, '_menu_item_dropdown', ''),
(102, 14, '_menu_item_widget_area', ''),
(103, 14, '_menu_item_column_width', ''),
(104, 14, '_menu_item_group', 'no_group'),
(105, 14, '_menu_item_hide_link', '0'),
(106, 14, '_menu_item_bg_image', ''),
(107, 14, '_menu_item_bg_image_attachment', ''),
(108, 14, '_menu_item_bg_image_size', ''),
(109, 14, '_menu_item_bg_image_position', ''),
(110, 14, '_menu_item_bg_image_repeat', ''),
(111, 14, '_menu_item_bg_color', ''),
(112, 14, '_menu_item_menu_icon', ''),
(113, 14, '_menu_item_el_class', ''),
(114, 15, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(115, 15, '_menu_item_type', 'post_type'),
(116, 15, '_menu_item_menu_item_parent', '0'),
(117, 15, '_menu_item_object_id', '8'),
(118, 15, '_menu_item_object', 'page'),
(119, 15, '_menu_item_target', ''),
(120, 15, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(121, 15, '_menu_item_xfn', ''),
(122, 15, '_menu_item_url', ''),
(124, 15, '_menu_item_submenu_type', 'standard'),
(125, 15, '_menu_item_dropdown', 'autodrop_submenu'),
(126, 15, '_menu_item_widget_area', ''),
(127, 15, '_menu_item_column_width', ''),
(128, 15, '_menu_item_group', 'no_group'),
(129, 15, '_menu_item_hide_link', ''),
(130, 15, '_menu_item_bg_image', ''),
(131, 15, '_menu_item_bg_image_attachment', 'scroll'),
(132, 15, '_menu_item_bg_image_size', 'auto'),
(133, 15, '_menu_item_bg_image_position', 'center'),
(134, 15, '_menu_item_bg_image_repeat', 'repeat'),
(135, 15, '_menu_item_bg_color', ''),
(136, 15, '_menu_item_menu_icon', ''),
(137, 15, '_menu_item_el_class', ''),
(138, 16, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(139, 16, '_menu_item_type', 'post_type'),
(140, 16, '_menu_item_menu_item_parent', '0'),
(141, 16, '_menu_item_object_id', '10'),
(142, 16, '_menu_item_object', 'page'),
(143, 16, '_menu_item_target', ''),
(144, 16, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(145, 16, '_menu_item_xfn', ''),
(146, 16, '_menu_item_url', ''),
(148, 16, '_menu_item_submenu_type', 'standard'),
(149, 16, '_menu_item_dropdown', 'autodrop_submenu'),
(150, 16, '_menu_item_widget_area', ''),
(151, 16, '_menu_item_column_width', ''),
(152, 16, '_menu_item_group', 'no_group'),
(153, 16, '_menu_item_hide_link', ''),
(154, 16, '_menu_item_bg_image', ''),
(155, 16, '_menu_item_bg_image_attachment', 'scroll'),
(156, 16, '_menu_item_bg_image_size', 'auto'),
(157, 16, '_menu_item_bg_image_position', 'center'),
(158, 16, '_menu_item_bg_image_repeat', 'repeat'),
(159, 16, '_menu_item_bg_color', ''),
(160, 16, '_menu_item_menu_icon', ''),
(161, 16, '_menu_item_el_class', ''),
(162, 17, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(163, 17, '_edit_last', '1'),
(164, 17, '_edit_lock', '1469172552:1'),
(165, 17, '_wp_page_template', 'default'),
(166, 17, 'slide_template', 'default'),
(167, 17, '_zo_meta_data', '{"_zo_page_layout":"0","_zo_page_body_bg_color":"","_zo_page_body_bg_image":"","_zo_page_body_bg_position":"","_zo_page_body_bg_attachment":"","_zo_page_body_bg_size":"","_zo_page_body_bg_repeat":"","_zo_page_boxed_bg_color":"","_zo_page_boxed_image":"","_zo_header_layout":"","_zo_header_width":"","_zo_header_transparent":"","_zo_header_bg_color":"","_zo_header_bg_image":"","_zo_header_bg_position":"","_zo_header_bg_attachment":"","_zo_header_bg_size":"","_zo_header_logo":"","_zo_primary":"","_zo_header_menu_color":"","_zo_header_menu_color_hover":"","_zo_header_menu_color_active":"","_zo_header_sub_menu_color":"","_zo_header_sub_menu_color_hover":"","_zo_page_title":"on","_zo_page_title_width":"default","_zo_page_title_height":"","_zo_page_title_mobile_height":"","_zo_page_title_bg_color":"","_zo_page_title_bg_image":"608","_zo_page_title_bg_position":"center bottom","_zo_page_title_bg_attachment":"","_zo_page_title_bg_size":"contain","_zo_page_title_text_bar":"on","_zo_page_title_text_alignment":"default","_zo_page_title_text_horizontal_alignment":"default","_zo_page_title_text_padding_top":"","_zo_page_title_text_padding_bottom":"","_zo_page_title_text":"","_zo_page_title_sub_text":"","_zo_page_title_breadcrumb_display":"default","_zo_page_title_breadcrumb_position":"default","_zo_footer_layout":"","_zo_footer_width":"","_zo_footer_widget":"","_zo_footer_bg_color":"","_zo_footer_bg_image":"","_zo_footer_bg_position":"","_zo_footer_bg_attachment":"","_zo_footer_bg_size":"","_zo_footer_copyright":"","_zo_footer_copyright_bg_color":""}'),
(168, 17, '_wpb_vc_js_status', 'true'),
(169, 18, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(170, 18, '_menu_item_type', 'post_type'),
(171, 18, '_menu_item_menu_item_parent', '0'),
(172, 18, '_menu_item_object_id', '17'),
(173, 18, '_menu_item_object', 'page'),
(174, 18, '_menu_item_target', ''),
(175, 18, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(176, 18, '_menu_item_xfn', ''),
(177, 18, '_menu_item_url', ''),
(179, 18, '_menu_item_submenu_type', 'standard'),
(180, 18, '_menu_item_dropdown', 'autodrop_submenu'),
(181, 18, '_menu_item_widget_area', ''),
(182, 18, '_menu_item_column_width', ''),
(183, 18, '_menu_item_group', 'no_group'),
(184, 18, '_menu_item_hide_link', ''),
(185, 18, '_menu_item_bg_image', ''),
(186, 18, '_menu_item_bg_image_attachment', 'scroll'),
(187, 18, '_menu_item_bg_image_size', 'auto'),
(188, 18, '_menu_item_bg_image_position', 'center'),
(189, 18, '_menu_item_bg_image_repeat', 'repeat'),
(190, 18, '_menu_item_bg_color', ''),
(191, 18, '_menu_item_menu_icon', ''),
(192, 18, '_menu_item_el_class', ''),
(217, 20, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(218, 20, '_edit_last', '1'),
(219, 20, '_edit_lock', '1464061032:1'),
(220, 20, '_wp_page_template', 'default'),
(221, 20, 'slide_template', 'default'),
(222, 20, '_zo_meta_data', '{"_zo_page_layout":"0","_zo_page_body_bg_color":"","_zo_page_body_bg_image":"","_zo_page_body_bg_position":"","_zo_page_body_bg_attachment":"","_zo_page_body_bg_size":"","_zo_page_body_bg_repeat":"","_zo_page_boxed_bg_color":"","_zo_page_boxed_image":"","_zo_header_layout":"","_zo_header_width":"","_zo_header_transparent":"","_zo_header_bg_color":"","_zo_header_bg_image":"","_zo_header_bg_position":"","_zo_header_bg_attachment":"","_zo_header_bg_size":"","_zo_header_logo":"","_zo_primary":"","_zo_header_menu_color":"","_zo_header_menu_color_hover":"","_zo_header_menu_color_active":"","_zo_header_sub_menu_color":"","_zo_header_sub_menu_color_hover":"","_zo_page_title":"on","_zo_page_title_width":"default","_zo_page_title_height":"","_zo_page_title_mobile_height":"","_zo_page_title_bg_color":"","_zo_page_title_bg_image":"607","_zo_page_title_bg_position":"center center","_zo_page_title_bg_attachment":"","_zo_page_title_bg_size":"contain","_zo_page_title_text_bar":"on","_zo_page_title_text_alignment":"default","_zo_page_title_text_horizontal_alignment":"default","_zo_page_title_text_padding_top":"","_zo_page_title_text_padding_bottom":"","_zo_page_title_text":"","_zo_page_title_sub_text":"","_zo_page_title_breadcrumb_display":"default","_zo_page_title_breadcrumb_position":"default","_zo_footer_layout":"","_zo_footer_width":"","_zo_footer_widget":"","_zo_footer_bg_color":"","_zo_footer_bg_image":"","_zo_footer_bg_position":"","_zo_footer_bg_attachment":"","_zo_footer_bg_size":"","_zo_footer_copyright":"","_zo_footer_copyright_bg_color":""}'),
(223, 20, '_wpb_vc_js_status', 'true'),
(224, 21, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(225, 21, '_menu_item_type', 'post_type'),
(226, 21, '_menu_item_menu_item_parent', '0'),
(227, 21, '_menu_item_object_id', '20'),
(228, 21, '_menu_item_object', 'page'),
(229, 21, '_menu_item_target', ''),
(230, 21, '_menu_item_classes', 'a:1:{i:0;s:0:"";}'),
(231, 21, '_menu_item_xfn', ''),
(232, 21, '_menu_item_url', ''),
(234, 21, '_menu_item_submenu_type', 'standard'),
(235, 21, '_menu_item_dropdown', 'autodrop_submenu'),
(236, 21, '_menu_item_widget_area', ''),
(237, 21, '_menu_item_column_width', ''),
(238, 21, '_menu_item_group', 'no_group'),
(239, 21, '_menu_item_hide_link', ''),
(240, 21, '_menu_item_bg_image', ''),
(241, 21, '_menu_item_bg_image_attachment', 'scroll'),
(242, 21, '_menu_item_bg_image_size', 'auto'),
(243, 21, '_menu_item_bg_image_position', 'center'),
(244, 21, '_menu_item_bg_image_repeat', 'repeat'),
(245, 21, '_menu_item_bg_color', ''),
(246, 21, '_menu_item_menu_icon', ''),
(247, 21, '_menu_item_el_class', ''),
(248, 22, '_wp_attached_file', 'revslider/slide-home/slide-1.jpg'),
(249, 22, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1600;s:6:"height";i:800;s:4:"file";s:32:"revslider/slide-home/slide-1.jpg";s:5:"sizes";a:12:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"slide-1-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:19:"slide-1-300x150.jpg";s:5:"width";i:300;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:19:"slide-1-768x384.jpg";s:5:"width";i:768;s:6:"height";i:384;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:20:"slide-1-1024x512.jpg";s:5:"width";i:1024;s:6:"height";i:512;s:9:"mime-type";s:10:"image/jpeg";}s:11:"thumb-small";a:4:{s:4:"file";s:19:"slide-1-200x200.jpg";s:5:"width";i:200;s:6:"height";i:200;s:9:"mime-type";s:10:"image/jpeg";}s:12:"thumb-medium";a:4:{s:4:"file";s:19:"slide-1-540x270.jpg";s:5:"width";i:540;s:6:"height";i:270;s:9:"mime-type";s:10:"image/jpeg";}s:11:"thumb-large";a:4:{s:4:"file";s:19:"slide-1-720x360.jpg";s:5:"width";i:720;s:6:"height";i:360;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:19:"slide-1-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}s:12:"shop_catalog";a:4:{s:4:"file";s:19:"slide-1-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:11:"shop_single";a:4:{s:4:"file";s:19:"slide-1-600x600.jpg";s:5:"width";i:600;s:6:"height";i:600;s:9:"mime-type";s:10:"image/jpeg";}s:14:"zo-blog-medium";a:4:{s:4:"file";s:19:"slide-1-480x330.jpg";s:5:"width";i:480;s:6:"height";i:330;s:9:"mime-type";s:10:"image/jpeg";}s:14:"post-thumbnail";a:4:{s:4:"file";s:19:"slide-1-624x312.jpg";s:5:"width";i:624;s:6:"height";i:312;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(250, 23, '_wp_attached_file', 'revslider/slide-home/3dprinting-icon-down.png'),
(251, 23, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:26;s:6:"height";i:36;s:4:"file";s:45:"revslider/slide-home/3dprinting-icon-down.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(252, 24, '_wp_attached_file', 'revslider/slide-home/slide-2.jpg'),
(253, 24, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1600;s:6:"height";i:800;s:4:"file";s:32:"revslider/slide-home/slide-2.jpg";s:5:"sizes";a:12:{s:9:"thumbnail";a:4:{s:4:"file";s:19:"slide-2-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:19:"slide-2-300x150.jpg";s:5:"width";i:300;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:19:"slide-2-768x384.jpg";s:5:"width";i:768;s:6:"height";i:384;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:20:"slide-2-1024x512.jpg";s:5:"width";i:1024;s:6:"height";i:512;s:9:"mime-type";s:10:"image/jpeg";}s:11:"thumb-small";a:4:{s:4:"file";s:19:"slide-2-200x200.jpg";s:5:"width";i:200;s:6:"height";i:200;s:9:"mime-type";s:10:"image/jpeg";}s:12:"thumb-medium";a:4:{s:4:"file";s:19:"slide-2-540x270.jpg";s:5:"width";i:540;s:6:"height";i:270;s:9:"mime-type";s:10:"image/jpeg";}s:11:"thumb-large";a:4:{s:4:"file";s:19:"slide-2-720x360.jpg";s:5:"width";i:720;s:6:"height";i:360;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:19:"slide-2-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}s:12:"shop_catalog";a:4:{s:4:"file";s:19:"slide-2-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:11:"shop_single";a:4:{s:4:"file";s:19:"slide-2-600x600.jpg";s:5:"width";i:600;s:6:"height";i:600;s:9:"mime-type";s:10:"image/jpeg";}s:14:"zo-blog-medium";a:4:{s:4:"file";s:19:"slide-2-480x330.jpg";s:5:"width";i:480;s:6:"height";i:330;s:9:"mime-type";s:10:"image/jpeg";}s:14:"post-thumbnail";a:4:{s:4:"file";s:19:"slide-2-624x312.jpg";s:5:"width";i:624;s:6:"height";i:312;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(254, 4, 'slide_template', 'default'),
(255, 4, '_wpb_vc_js_status', 'false'),
(256, 4, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(257, 4, '_wpb_shortcodes_custom_css', '.vc_custom_1459909151042{padding-top: 100px !important;padding-bottom: 80px !important;}.vc_custom_1464060240116{background-image: url(http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/3d-service-home1.jpg?id=604) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1462844239534{padding-top: 100px !important;padding-bottom: 85px !important;}.vc_custom_1459909151042{padding-top: 100px !important;padding-bottom: 80px !important;}.vc_custom_1464849887590{padding-top: 100px !important;padding-bottom: 80px !important;background-image: url(http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/3d-printing-testimonial-1.jpg?id=634) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1459909151042{padding-top: 100px !important;padding-bottom: 80px !important;}.vc_custom_1464058448084{padding-top: 80px !important;padding-right: 15px !important;padding-bottom: 60px !important;padding-left: 15px !important;}.vc_custom_1462957417940{margin-top: -80px !important;margin-bottom: -150px !important;padding-right: -30px !important;}.vc_custom_1461572574898{margin-top: 35px !important;margin-bottom: 30px !important;}.vc_custom_1459912325528{margin-bottom: 15px !important;}.vc_custom_1462246585194{margin-bottom: 100px !important;}.vc_custom_1462961099854{margin-top: 70px !important;}'),
(258, 25, '_wp_attached_file', '2016/05/3d-printer-service-home.jpg'),
(259, 25, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1920;s:6:"height";i:1067;s:4:"file";s:35:"2016/05/3d-printer-service-home.jpg";s:5:"sizes";a:12:{s:9:"thumbnail";a:4:{s:4:"file";s:35:"3d-printer-service-home-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:35:"3d-printer-service-home-300x167.jpg";s:5:"width";i:300;s:6:"height";i:167;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:35:"3d-printer-service-home-768x427.jpg";s:5:"width";i:768;s:6:"height";i:427;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:36:"3d-printer-service-home-1024x569.jpg";s:5:"width";i:1024;s:6:"height";i:569;s:9:"mime-type";s:10:"image/jpeg";}s:11:"thumb-small";a:4:{s:4:"file";s:35:"3d-printer-service-home-200x200.jpg";s:5:"width";i:200;s:6:"height";i:200;s:9:"mime-type";s:10:"image/jpeg";}s:12:"thumb-medium";a:4:{s:4:"file";s:35:"3d-printer-service-home-540x300.jpg";s:5:"width";i:540;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:11:"thumb-large";a:4:{s:4:"file";s:35:"3d-printer-service-home-720x400.jpg";s:5:"width";i:720;s:6:"height";i:400;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:35:"3d-printer-service-home-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}s:12:"shop_catalog";a:4:{s:4:"file";s:35:"3d-printer-service-home-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:11:"shop_single";a:4:{s:4:"file";s:35:"3d-printer-service-home-600x600.jpg";s:5:"width";i:600;s:6:"height";i:600;s:9:"mime-type";s:10:"image/jpeg";}s:14:"zo-blog-medium";a:4:{s:4:"file";s:35:"3d-printer-service-home-480x330.jpg";s:5:"width";i:480;s:6:"height";i:330;s:9:"mime-type";s:10:"image/jpeg";}s:14:"post-thumbnail";a:4:{s:4:"file";s:35:"3d-printer-service-home-624x347.jpg";s:5:"width";i:624;s:6:"height";i:347;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(260, 26, '_wp_attached_file', '2016/05/3dprinting-home1.png'),
(261, 26, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:707;s:6:"height";i:794;s:4:"file";s:28:"2016/05/3dprinting-home1.png";s:5:"sizes";a:10:{s:9:"thumbnail";a:4:{s:4:"file";s:28:"3dprinting-home1-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:28:"3dprinting-home1-267x300.png";s:5:"width";i:267;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:11:"thumb-small";a:4:{s:4:"file";s:28:"3dprinting-home1-200x200.png";s:5:"width";i:200;s:6:"height";i:200;s:9:"mime-type";s:9:"image/png";}s:12:"thumb-medium";a:4:{s:4:"file";s:28:"3dprinting-home1-540x606.png";s:5:"width";i:540;s:6:"height";i:606;s:9:"mime-type";s:9:"image/png";}s:11:"thumb-large";a:4:{s:4:"file";s:28:"3dprinting-home1-481x540.png";s:5:"width";i:481;s:6:"height";i:540;s:9:"mime-type";s:9:"image/png";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:28:"3dprinting-home1-180x180.png";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:9:"image/png";}s:12:"shop_catalog";a:4:{s:4:"file";s:28:"3dprinting-home1-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:11:"shop_single";a:4:{s:4:"file";s:28:"3dprinting-home1-600x600.png";s:5:"width";i:600;s:6:"height";i:600;s:9:"mime-type";s:9:"image/png";}s:14:"zo-blog-medium";a:4:{s:4:"file";s:28:"3dprinting-home1-480x330.png";s:5:"width";i:480;s:6:"height";i:330;s:9:"mime-type";s:9:"image/png";}s:14:"post-thumbnail";a:4:{s:4:"file";s:28:"3dprinting-home1-624x701.png";s:5:"width";i:624;s:6:"height";i:701;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(262, 27, '_wp_attached_file', '2016/05/3dprinting-home-quote-image.png'),
(263, 27, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:574;s:6:"height";i:711;s:4:"file";s:39:"2016/05/3dprinting-home-quote-image.png";s:5:"sizes";a:9:{s:9:"thumbnail";a:4:{s:4:"file";s:39:"3dprinting-home-quote-image-150x150.png";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:9:"image/png";}s:6:"medium";a:4:{s:4:"file";s:39:"3dprinting-home-quote-image-242x300.png";s:5:"width";i:242;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:11:"thumb-small";a:4:{s:4:"file";s:39:"3dprinting-home-quote-image-200x200.png";s:5:"width";i:200;s:6:"height";i:200;s:9:"mime-type";s:9:"image/png";}s:12:"thumb-medium";a:4:{s:4:"file";s:39:"3dprinting-home-quote-image-540x669.png";s:5:"width";i:540;s:6:"height";i:669;s:9:"mime-type";s:9:"image/png";}s:11:"thumb-large";a:4:{s:4:"file";s:39:"3dprinting-home-quote-image-436x540.png";s:5:"width";i:436;s:6:"height";i:540;s:9:"mime-type";s:9:"image/png";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:39:"3dprinting-home-quote-image-180x180.png";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:9:"image/png";}s:12:"shop_catalog";a:4:{s:4:"file";s:39:"3dprinting-home-quote-image-300x300.png";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:9:"image/png";}s:11:"shop_single";a:4:{s:4:"file";s:39:"3dprinting-home-quote-image-574x600.png";s:5:"width";i:574;s:6:"height";i:600;s:9:"mime-type";s:9:"image/png";}s:14:"zo-blog-medium";a:4:{s:4:"file";s:39:"3dprinting-home-quote-image-480x330.png";s:5:"width";i:480;s:6:"height";i:330;s:9:"mime-type";s:9:"image/png";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(264, 29, '_wp_attached_file', '2016/05/3dprinting-video-image.jpg'),
(265, 29, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:1920;s:6:"height";i:500;s:4:"file";s:34:"2016/05/3dprinting-video-image.jpg";s:5:"sizes";a:12:{s:9:"thumbnail";a:4:{s:4:"file";s:34:"3dprinting-video-image-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:33:"3dprinting-video-image-300x78.jpg";s:5:"width";i:300;s:6:"height";i:78;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:34:"3dprinting-video-image-768x200.jpg";s:5:"width";i:768;s:6:"height";i:200;s:9:"mime-type";s:10:"image/jpeg";}s:5:"large";a:4:{s:4:"file";s:35:"3dprinting-video-image-1024x267.jpg";s:5:"width";i:1024;s:6:"height";i:267;s:9:"mime-type";s:10:"image/jpeg";}s:11:"thumb-small";a:4:{s:4:"file";s:34:"3dprinting-video-image-200x200.jpg";s:5:"width";i:200;s:6:"height";i:200;s:9:"mime-type";s:10:"image/jpeg";}s:12:"thumb-medium";a:4:{s:4:"file";s:34:"3dprinting-video-image-540x141.jpg";s:5:"width";i:540;s:6:"height";i:141;s:9:"mime-type";s:10:"image/jpeg";}s:11:"thumb-large";a:4:{s:4:"file";s:34:"3dprinting-video-image-720x188.jpg";s:5:"width";i:720;s:6:"height";i:188;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:34:"3dprinting-video-image-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}s:12:"shop_catalog";a:4:{s:4:"file";s:34:"3dprinting-video-image-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:11:"shop_single";a:4:{s:4:"file";s:34:"3dprinting-video-image-600x500.jpg";s:5:"width";i:600;s:6:"height";i:500;s:9:"mime-type";s:10:"image/jpeg";}s:14:"zo-blog-medium";a:4:{s:4:"file";s:34:"3dprinting-video-image-480x330.jpg";s:5:"width";i:480;s:6:"height";i:330;s:9:"mime-type";s:10:"image/jpeg";}s:14:"post-thumbnail";a:4:{s:4:"file";s:34:"3dprinting-video-image-624x163.jpg";s:5:"width";i:624;s:6:"height";i:163;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"1";s:8:"keywords";a:0:{}}}'),
(266, 30, '_wp_attached_file', '2016/05/process-icon-3.png'),
(267, 30, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:58;s:6:"height";i:61;s:4:"file";s:26:"2016/05/process-icon-3.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(268, 31, '_wp_attached_file', '2016/05/process-icon-4.png'),
(269, 31, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:65;s:6:"height";i:63;s:4:"file";s:26:"2016/05/process-icon-4.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(270, 32, '_wp_attached_file', '2016/05/process-icon-1.png'),
(271, 32, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:63;s:6:"height";i:52;s:4:"file";s:26:"2016/05/process-icon-1.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(272, 33, '_wp_attached_file', '2016/05/process-icon-2.png'),
(273, 33, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:77;s:6:"height";i:46;s:4:"file";s:26:"2016/05/process-icon-2.png";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(274, 34, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(275, 34, '_form', '<div class="home-contact-form">\n<p>[text* first-name class:first-name placeholder "First Name *"]</p>\n<p>[text* last-name class:last-name placeholder "Last Name *"]</p>\n<p>[email* email class:email placeholder "Email *"]</p>\n<p>[text* phone-number min:9 max:20 class:phone placeholder "Phone Number *"]</p>\n<p>[text* company class:company placeholder "Company *"]</p>\n<p>[select* industry class:industry "Industry*""Computer" "Construction" "Travel" "Education" "Fashion" "Entertainment & Recreation"]</p>\n<p>[select* Country class:country "Country *" "Afghanistan" "Albania" "Algeria" "Andorra" "Angola" "Antigua and Barbuda" "Argentina" "Armenia" "Aruba" "Australia" "Austria" "Azerbaijan" "Bahamas, The" "Bahrain" "Bangladesh" "Barbados" "Belarus" "Belgium" "Belize" "Benin" "Bhutan" "Bolivia" "Bosnia and Herzegovina" "Botswana" "Brazil" "Brunei" "Bulgaria" "Burkina Faso" "Burma" "Burundi" "Cambodia" "Cameroon" "Canada" "Cape Verde" "Central African Republic" "Chad" "Chile" "China" "Colombia" "Comoros" "Congo, Democratic Republic of the" "Congo, Republic of the" "Costa Rica" "Cote d''Ivoire" "Croatia" "Cuba" "Curacao" "Cyprus" "Czech Republic"]</p>\n<p>[text* state class:city placeholder "State/Province *"]</p>\n<p>[text* city class:city placeholder "City *"]</p>\n<p>[text* zipcode class:zipcode placeholder "Zip Code"]</p>\n<p>[select* PrintQuantity class:print-quantity "Print Quantity" "low" "medium" "hight"]</p>\n<p>[select* ForWork class:for-work "For Work" "Monday" "Tuesday" "Wednesday" "Thursday" "Friday" "Saturday" "Sunday"]</p>\n<p class="textarea-print">[textarea* textarea-print class:textarea-print placeholder "What would you like to print?"]</p>\n<p class="checkbox-singup">\n[checkbox checkbox class:checkbox "Sign up to receive updates from 3D Printing"]\n</p>\n<p class="submit">[submit class:submit "Submit"]</p>\n</div>'),
(276, 34, '_mail', 'a:8:{s:7:"subject";s:28:"3D Printing "[your-subject]"";s:6:"sender";s:38:"[your-name] <wordpress@dn.joomexp.com>";s:4:"body";s:195:"From: [your-name] <[your-email]>\nSubject: [your-subject]\n\nMessage Body:\n[your-message]\n\n--\nThis e-mail was sent from a contact form on 3D Printing (http://demo.cms-theme.net/wordpress/3dprinting)";s:9:"recipient";s:15:"admin@gmail.com";s:18:"additional_headers";s:22:"Reply-To: [your-email]";s:11:"attachments";s:0:"";s:8:"use_html";b:0;s:13:"exclude_blank";b:0;}'),
(277, 34, '_mail_2', 'a:9:{s:6:"active";b:0;s:7:"subject";s:28:"3D Printing "[your-subject]"";s:6:"sender";s:38:"3D Printing <wordpress@dn.joomexp.com>";s:4:"body";s:137:"Message Body:\n[your-message]\n\n--\nThis e-mail was sent from a contact form on 3D Printing (http://demo.cms-theme.net/wordpress/3dprinting)";s:9:"recipient";s:12:"[your-email]";s:18:"additional_headers";s:25:"Reply-To: admin@gmail.com";s:11:"attachments";s:0:"";s:8:"use_html";b:0;s:13:"exclude_blank";b:0;}'),
(278, 34, '_messages', 'a:23:{s:12:"mail_sent_ok";s:45:"Thank you for your message. It has been sent.";s:12:"mail_sent_ng";s:71:"There was an error trying to send your message. Please try again later.";s:16:"validation_error";s:61:"One or more fields have an error. Please check and try again.";s:4:"spam";s:71:"There was an error trying to send your message. Please try again later.";s:12:"accept_terms";s:69:"You must accept the terms and conditions before sending your message.";s:16:"invalid_required";s:22:"The field is required.";s:16:"invalid_too_long";s:22:"The field is too long.";s:17:"invalid_too_short";s:23:"The field is too short.";s:12:"invalid_date";s:29:"The date format is incorrect.";s:14:"date_too_early";s:44:"The date is before the earliest one allowed.";s:13:"date_too_late";s:41:"The date is after the latest one allowed.";s:13:"upload_failed";s:46:"There was an unknown error uploading the file.";s:24:"upload_file_type_invalid";s:49:"You are not allowed to upload files of this type.";s:21:"upload_file_too_large";s:20:"The file is too big.";s:23:"upload_failed_php_error";s:38:"There was an error uploading the file.";s:14:"invalid_number";s:29:"The number format is invalid.";s:16:"number_too_small";s:47:"The number is smaller than the minimum allowed.";s:16:"number_too_large";s:46:"The number is larger than the maximum allowed.";s:23:"quiz_answer_not_correct";s:36:"The answer to the quiz is incorrect.";s:17:"captcha_not_match";s:31:"Your entered code is incorrect.";s:13:"invalid_email";s:38:"The e-mail address entered is invalid.";s:11:"invalid_url";s:19:"The URL is invalid.";s:11:"invalid_tel";s:32:"The telephone number is invalid.";}'),
(279, 34, '_additional_settings', ''),
(280, 34, '_locale', 'en_US'),
(284, 36, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(285, 36, '_edit_last', '1'),
(286, 36, '_edit_lock', '1463014756:1'),
(287, 37, '_wp_attached_file', '2016/05/3dprinting-testimonial-01.jpg'),
(288, 37, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:60;s:6:"height";i:60;s:4:"file";s:37:"2016/05/3dprinting-testimonial-01.jpg";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(289, 38, '_wp_attached_file', '2016/05/3dprinting-testimonial-4.jpg'),
(290, 38, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:70;s:6:"height";i:70;s:4:"file";s:36:"2016/05/3dprinting-testimonial-4.jpg";s:5:"sizes";a:0:{}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(292, 36, '_thumbnail_id', '38'),
(293, 36, 'slide_template', 'default'),
(294, 36, '_zo_meta_data', '{"_zo_testimonial_position":"","_zo_testimonial_country":""}'),
(295, 39, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(296, 39, '_edit_last', '1'),
(297, 39, '_edit_lock', '1463014799:1'),
(298, 39, '_thumbnail_id', '37'),
(299, 39, 'slide_template', 'default'),
(300, 39, '_zo_meta_data', '{"_zo_testimonial_position":"","_zo_testimonial_country":""}'),
(301, 40, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(302, 40, '_edit_last', '1'),
(303, 40, '_edit_lock', '1464677125:1'),
(304, 41, '_wp_attached_file', '2016/05/3dprinting-history.jpg'),
(305, 41, '_wp_attachment_metadata', 'a:5:{s:5:"width";i:913;s:6:"height";i:447;s:4:"file";s:30:"2016/05/3dprinting-history.jpg";s:5:"sizes";a:11:{s:9:"thumbnail";a:4:{s:4:"file";s:30:"3dprinting-history-150x150.jpg";s:5:"width";i:150;s:6:"height";i:150;s:9:"mime-type";s:10:"image/jpeg";}s:6:"medium";a:4:{s:4:"file";s:30:"3dprinting-history-300x147.jpg";s:5:"width";i:300;s:6:"height";i:147;s:9:"mime-type";s:10:"image/jpeg";}s:12:"medium_large";a:4:{s:4:"file";s:30:"3dprinting-history-768x376.jpg";s:5:"width";i:768;s:6:"height";i:376;s:9:"mime-type";s:10:"image/jpeg";}s:11:"thumb-small";a:4:{s:4:"file";s:30:"3dprinting-history-200x200.jpg";s:5:"width";i:200;s:6:"height";i:200;s:9:"mime-type";s:10:"image/jpeg";}s:12:"thumb-medium";a:4:{s:4:"file";s:30:"3dprinting-history-540x264.jpg";s:5:"width";i:540;s:6:"height";i:264;s:9:"mime-type";s:10:"image/jpeg";}s:11:"thumb-large";a:4:{s:4:"file";s:30:"3dprinting-history-720x353.jpg";s:5:"width";i:720;s:6:"height";i:353;s:9:"mime-type";s:10:"image/jpeg";}s:14:"shop_thumbnail";a:4:{s:4:"file";s:30:"3dprinting-history-180x180.jpg";s:5:"width";i:180;s:6:"height";i:180;s:9:"mime-type";s:10:"image/jpeg";}s:12:"shop_catalog";a:4:{s:4:"file";s:30:"3dprinting-history-300x300.jpg";s:5:"width";i:300;s:6:"height";i:300;s:9:"mime-type";s:10:"image/jpeg";}s:11:"shop_single";a:4:{s:4:"file";s:30:"3dprinting-history-600x447.jpg";s:5:"width";i:600;s:6:"height";i:447;s:9:"mime-type";s:10:"image/jpeg";}s:14:"zo-blog-medium";a:4:{s:4:"file";s:30:"3dprinting-history-480x330.jpg";s:5:"width";i:480;s:6:"height";i:330;s:9:"mime-type";s:10:"image/jpeg";}s:14:"post-thumbnail";a:4:{s:4:"file";s:30:"3dprinting-history-624x306.jpg";s:5:"width";i:624;s:6:"height";i:306;s:9:"mime-type";s:10:"image/jpeg";}}s:10:"image_meta";a:12:{s:8:"aperture";s:1:"0";s:6:"credit";s:0:"";s:6:"camera";s:0:"";s:7:"caption";s:0:"";s:17:"created_timestamp";s:1:"0";s:9:"copyright";s:0:"";s:12:"focal_length";s:1:"0";s:3:"iso";s:1:"0";s:13:"shutter_speed";s:1:"0";s:5:"title";s:0:"";s:11:"orientation";s:1:"0";s:8:"keywords";a:0:{}}}'),
(307, 40, 'slide_template', 'default'),
(308, 40, 'enclosure', 'http://demo.zotheme.com/wordpress/zap/wp-content/uploads/2015/08/audio.mp3\r\n3799040\r\naudio/mpeg\r\n'),
(309, 42, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(310, 42, '_edit_last', '1'),
(311, 42, '_edit_lock', '1464677484:1'),
(314, 42, 'slide_template', 'default'),
(315, 43, '_vc_post_settings', 'a:1:{s:10:"vc_grid_id";a:0:{}}'),
(316, 43, '_edit_last', '1'),
(317, 43, '_edit_lock', '1464681571:1'),
(318, 43, '_thumbnail_id', '41'),
(319, 44, '_wp_attached_file', '2016/05/3dprinting-construction.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

DROP TABLE IF EXISTS `wp_posts`;
CREATE TABLE IF NOT EXISTS `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=651 ;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(2, 1, '2016-05-10 10:04:41', '2016-05-10 10:04:41', '[vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1469173637257{margin-top: -60px !important;margin-right: 30px !important;margin-bottom: 20px !important;margin-left: 30px !important;}"][vc_column][zo_masonry col_xs="1" col_sm="12" col_md="12" col_lg="12" filter="0" margin="20" ratio="0.5" source="size:12|order_by:title|order:ASC|post_type:portfolio" zo_template="zo_masonry--portfolio.php"][/vc_column][/vc_row]', 'Drag & Drop Masonry 03', '', 'publish', 'closed', 'open', '', 'drag-drop-masonry-03', '', '', '2016-07-25 02:36:05', '2016-07-25 02:36:05', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?page_id=2', 0, 'page', '', 0),
(4, 1, '2016-05-11 06:14:17', '2016-05-11 06:14:17', '[vc_row full_width="stretch_row_content_no_spaces"][vc_column][rev_slider alias="slide-home"][/vc_column][/vc_row][vc_row css=".vc_custom_1459909151042{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column][zo_heading text="DO YOU KNOW ABOUT US?" align="center" is_sub="yes" sub_text="Bring your brand to life with 3D printing. Contact with us now!" sub_element="p" sub_align="center" zo_template="zo_heading.php"][vc_row_inner][vc_column_inner width="1/3"][zo_fancybox_single icon_type="upload" image_size="large" title_item="3D PRINTING IN CONSTRUCTION" link_url="#" link_text="" link_title="yes" zo_template="zo_fancybox_single--services_horizontal.php" content_item="Through a partnership between Dubai and Winsun Global, a Chinese 3D printing technology company, Dubai is set to build the..." image="416"][/vc_column_inner][vc_column_inner width="1/3"][zo_fancybox_single icon_type="upload" image_size="large" title_item="3D PRINTING IN FASHION" link_url="#" link_text="" link_title="yes" zo_template="zo_fancybox_single--services_horizontal.php" content_item="3D printing technology is slowly entering the world of fashion. Big brands such as Nike and Adidas are experimenting with..." image="417"][/vc_column_inner][vc_column_inner width="1/3"][zo_fancybox_single icon_type="upload" image_size="large" title_item="3D PRINTING IN PRODUCING FURNITURE" link_url="#" link_text="" link_title="yes" zo_template="zo_fancybox_single--services_horizontal.php" content_item="This is a customizable furniture riser block I made. There are a few others on thingiverse, but they have sharp..." image="418"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" overlay_row="yes" background_position="center center" background_attachment="fixed" css=".vc_custom_1464060240116{background-image: url(http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/3d-service-home1.jpg?id=604) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" overlay_color="rgba(0,0,0,0.8)"][vc_column offset="vc_col-lg-5 vc_col-md-5 vc_hidden-xs"][vc_single_image image="26" img_size="full" alignment="right" css_animation="top-to-bottom" css=".vc_custom_1462957417940{margin-top: -80px !important;margin-bottom: -150px !important;padding-right: -30px !important;}"][/vc_column][vc_column css=".vc_custom_1464058448084{padding-top: 80px !important;padding-right: 15px !important;padding-bottom: 60px !important;padding-left: 15px !important;}" offset="vc_col-lg-7 vc_col-md-7"][zo_heading class="printing-border-left-white" text="OUR SERVICES" is_sub="yes" sub_text="The World''s Leading 3D Printing Service &amp; Marketplace!" sub_element="p" zo_template="zo_heading.php"][vc_row_inner css=".vc_custom_1461572574898{margin-top: 35px !important;margin-bottom: 30px !important;}"][vc_column_inner el_class="print-top" width="1/2"][zo_fancybox_single class="fancyicon-transform-rotate" icon_fontawesome="fa fa-calendar-minus-o" title_item="3D Printing" link_url="http://demo.cms-theme.net/wordpress/3dprinting/?services=3d-printing" link_text="`{`read more`}`" link_title="yes" link_content="yes" link_align="right" button_link="http://demo.cms-theme.net/wordpress/3dprinting/archives/services/3d-printing-p" zo_template="zo_fancybox_single--services.php" content_item="3D Printing is an online 3D printing service for all people with an eye for design.."][/vc_column_inner][vc_column_inner el_class="print-top" width="1/2"][zo_fancybox_single class="fancyicon-transform-rotate" icon_fontawesome="fa fa-archive" title_item="3D scanning" link_url="http://demo.cms-theme.net/wordpress/3dprinting/?services=3d-scanning" link_text="`{`read more`}`" link_title="yes" link_content="yes" link_align="right" button_link="http://demo.cms-theme.net/wordpress/3dprinting/archives/services/3d-scanning" content_item="The process of converting physical objects into precise digital models, enables..." zo_template="zo_fancybox_single--services.php"][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1459912325528{margin-bottom: 15px !important;}"][vc_column_inner width="1/2"][zo_fancybox_single class="fancyicon-transform-rotate" icon_fontawesome="fa fa-calendar-times-o" title_item="3D design" link_url="http://demo.cms-theme.net/wordpress/3dprinting/?services=3d-design" link_text="`{`read more`}`" link_title="yes" link_content="yes" link_align="right" button_link="http://demo.cms-theme.net/wordpress/3dprinting/archives/services/3d-design" content_item="If you’re not that much of a designer, you’re able to use the creation corner..." zo_template="zo_fancybox_single--services.php"][/vc_column_inner][vc_column_inner width="1/2"][zo_fancybox_single class="fancyicon-transform-rotate" icon_fontawesome="fa fa-calendar" title_item="education" link_url="http://demo.cms-theme.net/wordpress/3dprinting/?services=education" link_text="`{`read more`}`" link_title="yes" link_content="yes" link_align="right" button_link="http://demo.cms-theme.net/wordpress/3dprinting/archives/services/education" content_item="Using a unique apprenticeship program to help train underserved communities..." zo_template="zo_fancybox_single--services.php"][/vc_column_inner][/vc_row_inner][vc_column_text]<a class="printing-viewmore-white" title="3D Printing Services" href="http://demo.cms-theme.net/wordpress/3dprinting/?page_id=22">MORE SERVICES</a>[/vc_column_text][/vc_column][/vc_row][vc_row css=".vc_custom_1462844239534{padding-top: 100px !important;padding-bottom: 85px !important;}"][vc_column][zo_heading text="FEATURE WORKS" align="center" is_sub="yes" sub_text="Choose a design – Stream the file – Print your products!" sub_element="p" sub_align="center" zo_template="zo_heading.php"][zo_masonry col_xs="1" col_sm="12" col_md="12" col_lg="12" filter="0" margin="10" ratio="0.5" zo_title_size="h3" source="size:10|order_by:date|post_type:portfolio" zo_template="zo_masonry--portfolio.php"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces"][vc_column][zo_video video_url="https://youtu.be/UaUvln2vIRk" thumbnail_custom="enable" video_control="enable" video_autoplay="enable" thumbnail_url="29" zo_template="zo_video.php"][/vc_column][/vc_row][vc_row css=".vc_custom_1459909151042{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column][zo_heading text="3D PRINTING PROCESS" align="center" is_sub="yes" sub_text="Bring your brand to life with 3D printing. Contact with us now!" sub_element="p" sub_align="center" zo_template="zo_heading.php" link="||"][vc_row_inner css=".vc_custom_1462246585194{margin-bottom: 100px !important;}"][vc_column_inner width="1/4"][zo_fancybox_single class="box-1" icon_type="upload" icon_align="center" title_item="1" zo_template="zo_fancybox_single--process.php" image="32" content_item="3D PRINTING"][/vc_column_inner][vc_column_inner width="1/4"][zo_fancybox_single class="box-2" icon_type="upload" icon_align="center" title_item="2" zo_template="zo_fancybox_single--process.php" image="33" content_item="3D DESIGN"][/vc_column_inner][vc_column_inner width="1/4"][zo_fancybox_single class="box-3" icon_type="upload" icon_align="center" title_item="3" zo_template="zo_fancybox_single--process.php" image="30" content_item="3D PRINTER"][/vc_column_inner][vc_column_inner width="1/4"][zo_fancybox_single class="zo-no-line box-4" icon_type="upload" icon_align="center" title_item="4" zo_template="zo_fancybox_single--process.php" image="31" content_item="3D PRINTED PRODUCT"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="7/12" offset="vc_col-xs-12"][zo_heading class="printing-border-left" text="REQUEST A QUOTE" zo_template="zo_heading.php" link="||"][contact-form-7 id="34"][/vc_column_inner][vc_column_inner width="5/12" offset="vc_col-xs-12"][vc_single_image image="27" img_size="full" alignment="center" css=".vc_custom_1462961099854{margin-top: 70px !important;}"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row background_position="center center" background_attachment="fixed" css=".vc_custom_1464849887590{padding-top: 100px !important;padding-bottom: 80px !important;background-image: url(http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/3d-printing-testimonial-1.jpg?id=634) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" el_class="background-primary"][vc_column][zo_heading class="printing-border-center-white" text="OUR CLIENTS SAYS" align="center" zo_template="zo_heading.php"][zo_carousel xsmall_items="1" small_items="1" medium_items="1" large_items="1" loop="1" mousedrag="1" touchdrag="1" nav="1" dots="1" center="0" autoplay="1" left_arrow="fa fa-angle-left" right_arrow="fa fa-angle-right" source="size:3|order_by:date|post_type:testimonial" zo_template="zo_carousel--testimonial.php"][/vc_column][/vc_row][vc_row css=".vc_custom_1459909151042{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column][zo_heading text="LATEST POSTS" align="center" is_sub="yes" sub_text="Bring your brand to life with 3D printing. Contact with us now!" sub_element="p" sub_align="center" zo_template="zo_heading.php"][zo_grid col_xs="1" col_sm="2" col_md="2" col_lg="2" image_size="custom" image_width="600" image_height="400" title_link="1" num_words="31" source="size:2|order_by:date|order:DESC|post_type:post" zo_template="zo_grid--posts.php"][/vc_column][/vc_row]', 'Home Style 01', '', 'publish', 'closed', 'closed', '', 'home-style-01', '', '', '2016-08-04 04:05:48', '2016-08-04 04:05:48', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?page_id=4', 0, 'page', '', 0),
(6, 1, '2016-05-11 06:23:29', '2016-05-11 06:23:29', '<div class="page-contact">\r\n<p class="contact-name">[text* name class:name placeholder "Name*"]</p>\r\n<p class="contact-email-phone">[email* email class:email placeholder "Email*"][text* phone min:9 max:15 class:phone placeholder "Phone*"]</p>\r\n<p class="contact-message">[textarea* message class:message placeholder "Message*"]</p>\r\n<p class="contact-send">[submit class:send "Send Message"]</p>\r\n</div>\n3D Printing "[your-subject]"\n[your-name] <wordpress@dn.joomexp.com>\nFrom: [your-name] <[your-email]>\r\nSubject: [your-subject]\r\n\r\nMessage Body:\r\n[your-message]\r\n\r\n--\r\nThis e-mail was sent from a contact form on 3D Printing (http://demo.cms-theme.net/wordpress/3dprinting)\nadmin@gmail.com\nReply-To: [your-email]\n\n\n\n\n3D Printing "[your-subject]"\n3D Printing <wordpress@dn.joomexp.com>\nMessage Body:\r\n[your-message]\r\n\r\n--\r\nThis e-mail was sent from a contact form on 3D Printing (http://demo.cms-theme.net/wordpress/3dprinting)\n[your-email]\nReply-To: admin@gmail.com\n\n\n\nThank you for your message. It has been sent.\nThere was an error trying to send your message. Please try again later.\nOne or more fields have an error. Please check and try again.\nThere was an error trying to send your message. Please try again later.\nYou must accept the terms and conditions before sending your message.\nThe field is required.\nThe field is too long.\nThe field is too short.\nThe date format is incorrect.\nThe date is before the earliest one allowed.\nThe date is after the latest one allowed.\nThere was an unknown error uploading the file.\nYou are not allowed to upload files of this type.\nThe file is too big.\nThere was an error uploading the file.\nThe number format is invalid.\nThe number is smaller than the minimum allowed.\nThe number is larger than the maximum allowed.\nThe answer to the quiz is incorrect.\nYour entered code is incorrect.\nThe e-mail address entered is invalid.\nThe URL is invalid.\nThe telephone number is invalid.', 'Contact form 1', '', 'publish', 'closed', 'closed', '', 'contact-form-1', '', '', '2016-05-17 02:13:09', '2016-05-17 02:13:09', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?post_type=wpcf7_contact_form&#038;p=6', 0, 'wpcf7_contact_form', '', 0),
(7, 1, '2016-05-11 06:32:32', '2016-05-11 06:32:32', '[vc_row full_width="stretch_row_content_no_spaces"][vc_column][rev_slider alias="home2"][/vc_column][/vc_row][vc_row css=".vc_custom_1459909151042{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column width="1/2"][vc_single_image image="51" img_size="full"][/vc_column][vc_column width="1/2"][vc_tta_accordion][vc_tta_section title="What is 3D Printing?" tab_id="what"][vc_column_text]3D printing is a prototyping process whereby an real object is created from a 3D design. The digital 3D-model is saved in STL format and then sent to a 3D printer.[/vc_column_text][/vc_tta_section][vc_tta_section title="How much price for 3D Printer?" tab_id="how"][vc_column_text]3D printing is a prototyping process whereby an real object is created from a 3D design. The digital 3D-model is saved in STL format and then sent to a 3D printer.[/vc_column_text][/vc_tta_section][vc_tta_section title="What are the materials for 3D Printing?" tab_id="materials"][vc_column_text]\r\n<div class="faq">\r\n\r\n3D printing is a prototyping process whereby an real object is created from a 3D design. The digital 3D-model is saved in STL format and then sent to a 3D printer.\r\n\r\n</div>\r\n[/vc_column_text][/vc_tta_section][vc_tta_section title="What 3D software for design?" tab_id="software"][vc_column_text]\r\n<div class="faq">\r\n\r\n3D printing is a prototyping process whereby an real object is created from a 3D design. The digital 3D-model is saved in STL format and then sent to a 3D printer.\r\n\r\n</div>\r\n[/vc_column_text][/vc_tta_section][/vc_tta_accordion][/vc_column][/vc_row][vc_row overlay_row="yes" background_position="center center" background_attachment="fixed" css=".vc_custom_1464833555605{padding-top: 100px !important;padding-bottom: 80px !important;background-image: url(http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/3dprinting-service-home2.jpg?id=633) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" el_class="background-primary"][vc_column][zo_heading class="printing-border-center-white" text="OUR SERVICES" align="center" is_sub="yes" sub_text="The World''s Leading 3D Printing Service &amp; Marketplace!" sub_element="p" sub_align="center" zo_template="zo_heading.php" link="||"][vc_row_inner el_class="inner-row-no-padding-column" css=".vc_custom_1462763752426{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column_inner offset="vc_col-lg-6 vc_col-md-6 vc_col-xs-12" css=".vc_custom_1462529302154{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;}"][zo_fancybox_single icon_type="upload" title_item="3D PRINTING" link_url="http://demo.cms-theme.net/wordpress/3dprinting/?services=3d-printing" link_text="`{`read more`}`" link_content="yes" link_align="right" image="58" content_item="3D Printing is an online 3D printing service for all people with an eye for design…" zo_template="zo_fancybox_single--service-horizontal-images.php"][/vc_column_inner][vc_column_inner offset="vc_col-lg-6 vc_col-md-6 vc_col-xs-12" css=".vc_custom_1462529331463{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;}"][zo_fancybox_single icon_type="upload" title_item="3D SCANNING" link_url="http://demo.cms-theme.net/wordpress/3dprinting/?services=3d-scanning" link_text="`{`read more`}`" link_content="yes" link_align="right" image="57" content_item="3D Printing is an online 3D printing service for all people with an eye for design…" zo_template="zo_fancybox_single--service-horizontal-images.php"][/vc_column_inner][/vc_row_inner][vc_row_inner el_class="inner-row-no-padding-column" css=".vc_custom_1462763737384{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_column_inner offset="vc_col-lg-6 vc_col-md-6 vc_col-xs-12" css=".vc_custom_1462763768858{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;}"][zo_fancybox_single class="service-image-left" icon_type="upload" title_item="3D DESIGN" link_url="http://demo.cms-theme.net/wordpress/3dprinting/?services=3d-design" link_text="`{`read more`}`" link_content="yes" link_align="right" image="54" content_item="3D Printing is an online 3D printing service for all people with an eye for design…" zo_template="zo_fancybox_single--service-horizontal-images.php"][/vc_column_inner][vc_column_inner offset="vc_col-lg-6 vc_col-md-6 vc_col-xs-12" css=".vc_custom_1462529457688{margin-top: 0px !important;margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;}"][zo_fancybox_single class="service-image-left" icon_type="upload" title_item="EDUCATION" link_url="http://demo.cms-theme.net/wordpress/3dprinting/?services=education" link_text="`{`read more`}`" link_content="yes" link_align="right" image="52" content_item="3D Printing is an online 3D printing service for all people with an eye for design…" zo_template="zo_fancybox_single--service-horizontal-images.php"][/vc_column_inner][/vc_row_inner][vc_empty_space height="50px"][zo_button text="ALL SERVICE" class="btn-primary" zo_template="zo_button.php" link="url:http%3A%2F%2Fdemo.cms-theme.net%2Fwordpress%2F3dprinting%2F%3Fpage_id%3D22|title:ALL%20SERVICES|target:%20_blank"][/vc_column][/vc_row][vc_row css=".vc_custom_1459909151042{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column][zo_heading text="FEATURE PRODUCTS" align="center" is_sub="yes" sub_text="Bring your brand to life with 3D printing. Contact with us now!" sub_element="p" sub_align="center" zo_template="zo_heading.php" link="||"][zo_carousel xsmall_items="1" small_items="2" medium_items="3" large_items="3" image_size="custom" image_width="600" image_height="400" title_link="1" margin="20" loop="1" mousedrag="1" touchdrag="1" nav="1" dots="0" center="0" autoplay="1" source="size:8|order_by:date|post_type:product" zo_template="zo_carousel--products.php"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces"][vc_column][zo_video video_url="https://youtu.be/UaUvln2vIRk" thumbnail_custom="enable" video_control="enable" video_autoplay="enable" thumbnail_url="29" zo_template="zo_video.php"][/vc_column][/vc_row][vc_row css=".vc_custom_1459909151042{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column][zo_heading text="3D PRINTING PROCESS" align="center" is_sub="yes" sub_text="Bring your brand to life with 3D printing. Contact with us now!" sub_element="p" sub_align="center" zo_template="zo_heading.php" link="||"][vc_row_inner css=".vc_custom_1462246585194{margin-bottom: 100px !important;}"][vc_column_inner width="1/4"][zo_fancybox_single class="box-1" icon_type="upload" icon_align="center" title_item="1" zo_template="zo_fancybox_single--process.php" image="32" content_item="3D PRINTING"][/vc_column_inner][vc_column_inner width="1/4"][zo_fancybox_single class="box-2" icon_type="upload" icon_align="center" title_item="2" zo_template="zo_fancybox_single--process.php" image="33" content_item="3D DESIGN"][/vc_column_inner][vc_column_inner width="1/4"][zo_fancybox_single class="box-3" icon_type="upload" icon_align="center" title_item="3" zo_template="zo_fancybox_single--process.php" image="30" content_item="3D PRINTER"][/vc_column_inner][vc_column_inner width="1/4"][zo_fancybox_single class="zo-no-line box-4" icon_type="upload" icon_align="center" title_item="4" zo_template="zo_fancybox_single--process.php" image="31" content_item="3D PRINTED PRODUCT"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="7/12" offset="vc_col-xs-12"][zo_heading class="printing-border-left" text="REQUEST A QUOTE" zo_template="zo_heading.php" link="||"][contact-form-7 id="34"][/vc_column_inner][vc_column_inner width="5/12" offset="vc_col-xs-12"][vc_single_image image="27" img_size="full" alignment="center" css=".vc_custom_1462961099854{margin-top: 70px !important;}"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row background_position="center center" background_attachment="fixed" css=".vc_custom_1464849988383{padding-top: 100px !important;padding-bottom: 80px !important;background-image: url(http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/3d-printing-testimonial-1.jpg?id=634) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" el_class="background-primary"][vc_column][zo_heading class="printing-border-center-white" text="OUR CLIENTS SAYS" align="center" zo_template="zo_heading.php"][zo_carousel xsmall_items="1" small_items="1" medium_items="1" large_items="1" loop="1" mousedrag="1" touchdrag="1" nav="1" dots="1" center="0" autoplay="1" left_arrow="fa fa-angle-left" right_arrow="fa fa-angle-right" source="size:3|order_by:date|post_type:testimonial" zo_template="zo_carousel--testimonial.php"][/vc_column][/vc_row][vc_row css=".vc_custom_1459909151042{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column][zo_heading text="LATEST POSTS" align="center" is_sub="yes" sub_text="Bring your brand to life with 3D printing. Contact with us now!" sub_element="p" sub_align="center" zo_template="zo_heading.php"][zo_grid col_xs="1" col_sm="2" col_md="2" col_lg="2" title_link="1" num_words="31" source="size:2|order_by:date|order:DESC|post_type:post" zo_template="zo_grid--posts.php"][zo_button text="VIEW ALL POSTS" class="btn-primary" zo_template="zo_button.php" link="url:http%3A%2F%2Fdemo.cms-theme.net%2Fwordpress%2F3dprinting%2Fout-blog%2F||"][/vc_column][/vc_row]', 'Home Style 02', '', 'publish', 'closed', 'closed', '', 'home-style-02', '', '', '2016-07-22 03:56:02', '2016-07-22 03:56:02', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?page_id=7', 0, 'page', '', 0),
(8, 1, '2016-05-11 06:35:20', '2016-05-11 06:35:20', '[vc_row el_class="home-about-us" css=".vc_custom_1460001547360{margin-bottom: 80px !important;}"][vc_column width="1/2" el_class="video-application"][zo_heading class="printing-border-left" text="3D PRINTING APPLICATION" zo_template="zo_heading.php"][zo_video video_url="https://youtu.be/TbqusJclko8" thumbnail_custom="enable" video_info="enable" video_autoplay="enable" zo_template="zo_video.php" thumbnail_url="290"][vc_column_text css=".vc_custom_1463540590193{padding-top: 10px !important;padding-bottom: 20px !important;}"]Nowadays almost everything from aerospace components to toys are getting built with the help of 3D printers. One of the most important applications of 3D printing is in the medical industry...[/vc_column_text][/vc_column][vc_column width="1/2"][zo_heading class="printing-border-left" text="3D PRINTING BASIC" zo_template="zo_heading.php"][vc_tta_accordion][vc_tta_section title="What is 3D Printing?" tab_id="what"][vc_column_text]3D printing is a prototyping process whereby an real object is created from a 3D design. The digital 3D-model is saved in STL format and then sent to a 3D printer.[/vc_column_text][/vc_tta_section][vc_tta_section title="How much price for 3D Printer?" tab_id="how"][vc_column_text]3D printing is a prototyping process whereby an real object is created from a 3D design. The digital 3D-model is saved in STL format and then sent to a 3D printer.[/vc_column_text][/vc_tta_section][vc_tta_section title="What are the materials for 3D Printing?" tab_id="materials"][vc_column_text]\r\n<div class="faq">\r\n\r\n3D printing is a prototyping process whereby an real object is created from a 3D design. The digital 3D-model is saved in STL format and then sent to a 3D printer.\r\n\r\n</div>\r\n[/vc_column_text][/vc_tta_section][vc_tta_section title="What 3D software for design?" tab_id="software"][vc_column_text]\r\n<div class="faq">\r\n\r\n3D printing is a prototyping process whereby an real object is created from a 3D design. The digital 3D-model is saved in STL format and then sent to a 3D printer.\r\n\r\n</div>\r\n[/vc_column_text][/vc_tta_section][/vc_tta_accordion][/vc_column][/vc_row][vc_row equal_height="yes" content_placement="middle" css=".vc_custom_1463040608435{padding-top: 0px !important;padding-bottom: 0px !important;background-image: url(http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/3dprinting-about-bg.jpg?id=196) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" el_class="fullrow-max-md"][vc_column width="2/3" css=".vc_custom_1460002686972{padding-top: 90px !important;padding-bottom: 70px !important;}"][zo_heading class="printing-border-left-white" text="HOW WE WORK?" zo_template="zo_heading.php"][vc_column_text]\r\n<p style="color: #fff;">Not everybody can afford or is willing to buy their own 3D printer. Does this mean you cannot enjoy the possibilities of 3D printing? No, not to worry. Because we are here to help you bring your brand to life with 3D printing. When, for instance, you have an architecture practice and you need to build model scales, it is very time consuming doing this the old fashioned way...</p>\r\n[/vc_column_text][vc_empty_space height="25px"][zo_button text="Know More" align="left" padding_right="50" padding_left="50" class="btn-primary" zo_template="zo_button.php" link="||"][/vc_column][vc_column width="1/3" offset="vc_col-xs-12"][vc_single_image image="191" img_size="full" alignment="center" el_class="about-whoweare-img" css=".vc_custom_1463039683726{margin-top: -80px !important;margin-bottom: 0px !important;}"][/vc_column][/vc_row][vc_row el_class="fullrow-max-md" css=".vc_custom_1460003165037{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column offset="vc_col-lg-6 vc_col-md-6 vc_col-xs-12"][zo_heading class="printing-border-left" text="WHO WE ARE?" zo_template="zo_heading.php"][vc_images_carousel images="192" img_size="530 x 250" onclick="link_no" autoplay="yes" hide_pagination_control="yes" wrap="yes"][vc_column_text css=".vc_custom_1463540737284{margin-top: 25px !important;margin-bottom: 30px !important;}"]It all starts with making a virtual design of the object you want to create. This virtual design is made in a CAD (Computer Aided Design) file using a 3D modeling program (for the creation of a totally new object)...[/vc_column_text][/vc_column][vc_column offset="vc_col-lg-6 vc_col-md-6 vc_col-xs-12"][zo_heading class="printing-border-left" text="WHY WE''RE EXPERT?" zo_template="zo_heading.php"][vc_column_text css=".vc_custom_1463540532277{margin-bottom: 25px !important;}"]If you have great idea for 3d printing, but don’t know how to design, or you have interesting 3d design but no way to print it... we’ll make it for you! In addition to 25 years of experience with 3D printing and its related software, and a flexible team dedicated entirely to you, 3D PRINTING also has:[/vc_column_text][zo_progressbar item_title="3D Designer" value="52" bg_color="" color="" width="100%" height="7px" zo_template="zo_progressbar.php" zo_progress_text_for_progress_bar="52"][zo_progressbar item_title="3D Printing" value="80" bg_color="" color="" width="100%" height="7px" zo_template="zo_progressbar.php" zo_progress_text_for_progress_bar="52"][zo_progressbar item_title="Completed project " value="96" bg_color="" color="" width="100%" height="7px" zo_template="zo_progressbar.php" zo_progress_text_for_progress_bar="52"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" equal_height="yes" content_placement="middle" css=".vc_custom_1463740866375{background-color: #186ebb !important;}"][vc_column width="1/2" css=".vc_custom_1463740786907{padding-top: 80px !important;padding-bottom: 80px !important;padding-left: 25px !important;}" offset="vc_col-xs-12"][zo_heading class="printing-border-left-white" text="OUR SERVICES?" is_sub="yes" sub_text="The World’s Leading 3D Printing Service &amp; Marketplace!" zo_template="zo_heading.php"][vc_row_inner css=".vc_custom_1460011329531{margin-top: 40px !important;margin-bottom: 20px !important;}"][vc_column_inner width="1/2" css=".vc_custom_1459493113091{padding-right: 0px !important;padding-left: 0px !important;}"][zo_fancybox_single class="layout-page-about fancyicon-transform-rotate" icon_type="upload" title_item="3D Printing" link_text="" content_item="3D Printing is an online 3D printing service for all people " zo_template="zo_fancybox_single--services.php" image="214"][/vc_column_inner][vc_column_inner width="1/2" css=".vc_custom_1459493107540{padding-right: 0px !important;padding-left: 0px !important;}"][zo_fancybox_single class="layout-page-about fancyicon-transform-rotate" icon_type="upload" title_item="3D scanning" link_text="" content_item="The process of converting physi- cal objects into precise digital" zo_template="zo_fancybox_single--services.php" image="215"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/2" css=".vc_custom_1459493103192{padding-right: 0px !important;padding-left: 0px !important;}"][zo_fancybox_single class="layout-page-about fancyicon-transform-rotate" icon_type="upload" title_item="3D design" link_text="" link_title="yes" content_item="If you’re not that much of a designer, you’re able to use the" zo_template="zo_fancybox_single--services.php" image="212"][/vc_column_inner][vc_column_inner width="1/2" css=".vc_custom_1459493097785{padding-right: 0px !important;padding-left: 0px !important;}"][zo_fancybox_single class="layout-page-about fancyicon-transform-rotate" icon_type="upload" title_item="education" link_text="" content_item="Using a unique apprenticeship program to help train underserved" zo_template="zo_fancybox_single--services.php" image="213"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2" css=".vc_custom_1463740722492{padding-top: 250px !important;padding-bottom: 250px !important;background-image: url(http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/3dprinting-ImageService.jpg?id=488) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" offset="vc_col-xs-12"][/vc_column][/vc_row][vc_row css=".vc_custom_1460010456364{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column][zo_heading text="OUR TEAMS?" align="center" is_sub="yes" sub_text="24/24 Support – Always friendly &amp; professional – Contact with us now!" sub_element="p" sub_align="center" zo_template="zo_heading.php"][zo_grid col_xs="1" col_sm="2" col_md="4" col_lg="4" title_element="h2" title_link="0" source="size:4|order_by:date|order:ASC|post_type:team" zo_template="zo_grid--team.php"][/vc_column][/vc_row][vc_row background_position="center center" background_attachment="fixed" css=".vc_custom_1467017177212{padding-top: 100px !important;padding-bottom: 80px !important;background-image: url(http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/3d-printing-testimonial-1.jpg?id=634) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" el_class="background-primary"][vc_column][zo_carousel xsmall_items="1" small_items="1" medium_items="1" large_items="1" loop="1" mousedrag="1" touchdrag="1" nav="1" dots="1" center="0" autoplay="1" left_arrow="fa fa-angle-left" right_arrow="fa fa-angle-right" testimonial_layout="layout-1" source="size:2|order_by:date|post_type:testimonial" zo_template="zo_carousel--testimonial.php"][/vc_column][/vc_row][vc_row css=".vc_custom_1460010446004{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column][zo_heading text="CLIENTS &amp; PARTNERS" align="center" is_sub="yes" sub_text="Bring your brand to life with 3D printing. Contact with us now!" sub_element="p" sub_align="center" zo_template="zo_heading.php"][vc_row_inner][vc_column_inner el_class="border-right border-bottom client-partners" width="1/3"][vc_single_image image="206" img_size="full" alignment="center"][/vc_column_inner][vc_column_inner el_class="border-right border-bottom client-partners" width="1/3"][vc_single_image image="207" img_size="full" alignment="center"][/vc_column_inner][vc_column_inner el_class="border-bottom client-partners" width="1/3"][vc_single_image image="208" img_size="full" alignment="center"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner el_class="border-right client-partners" width="1/3"][vc_single_image image="209" img_size="full" alignment="center"][/vc_column_inner][vc_column_inner el_class="border-right client-partners" width="1/3"][vc_single_image image="210" img_size="full" alignment="center"][/vc_column_inner][vc_column_inner el_class="client-partners" width="1/3"][vc_single_image image="211" img_size="full" alignment="center"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]', 'About Us', '', 'publish', 'closed', 'closed', '', 'about-us', '', '', '2016-06-27 08:35:41', '2016-06-27 08:35:41', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?page_id=8', 0, 'page', '', 0),
(9, 1, '2016-05-11 06:36:51', '2016-05-11 06:36:51', '[vc_row][vc_column width="1/4"][vc_wp_custommenu nav_menu="30"][vc_column_text el_class="printing-contact-sidebar"]\r\n<h2>HOW CAN WE HELP</h2>\r\nSend me a message if you have any question or call us on 00 12345 12 11 to ...\r\n\r\n<a class="btn btn-primary" title="Contact" href="#">Contact</a>[/vc_column_text][zo_carousel xsmall_items="1" small_items="1" medium_items="1" large_items="1" title_link="1" loop="1" mousedrag="1" touchdrag="1" nav="0" dots="0" center="0" autoplay="0" source="size:2|order_by:date|post_type:testimonial" zo_template="zo_carousel--testimonial_sidebar.php"][/vc_column][vc_column width="3/4" el_class="printing-p-justify"][vc_row_inner css=".vc_custom_1460087962258{margin-right: 0px !important;margin-bottom: 40px !important;margin-left: 0px !important;padding-top: 0px !important;padding-bottom: 0px !important;}"][vc_column_inner css=".vc_custom_1460087913880{padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}"][vc_single_image image="254" img_size="full"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner][zo_heading class="printing-border-left" text="CAREERS" zo_template="zo_heading.php"][vc_column_text]Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n<div class="quoteblock-01">\r\n\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.\r\n<h2>J.K Martin</h2>\r\nArt Director\r\n\r\n</div>\r\nNemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.[/vc_column_text][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1460097799224{margin-top: 30px !important;}"][vc_column_inner][zo_heading class="printing-border-left" text="3D PRINTING BASIC" zo_template="zo_heading.php"][/vc_column_inner][/vc_row_inner][vc_tta_accordion active_section="1" css=".vc_custom_1460097827502{margin-bottom: 80px !important;}"][vc_tta_section title="What is 3D Printing?" tab_id="what"][vc_column_text]3D printing is a prototyping process whereby an real object is created from a 3D design. The digital 3D-model is saved in STL format and then sent to a 3D printer.[/vc_column_text][/vc_tta_section][vc_tta_section title="How much price for 3D Printer?" tab_id="how"][vc_column_text]3D printing is a prototyping process whereby an real object is created from a 3D design. The digital 3D-model is saved in STL format and then sent to a 3D printer.[/vc_column_text][/vc_tta_section][vc_tta_section title="What are the materials for 3D Printing?" tab_id="materials"][vc_column_text]\r\n<div class="faq">\r\n\r\n3D printing is a prototyping process whereby an real object is created from a 3D design. The digital 3D-model is saved in STL format and then sent to a 3D printer.\r\n\r\n</div>\r\n[/vc_column_text][/vc_tta_section][vc_tta_section title="What 3D software for design?" tab_id="software"][vc_column_text]\r\n<div class="faq">\r\n\r\n3D printing is a prototyping process whereby an real object is created from a 3D design. The digital 3D-model is saved in STL format and then sent to a 3D printer.\r\n\r\n</div>\r\n[/vc_column_text][/vc_tta_section][/vc_tta_accordion][/vc_column][/vc_row]', 'Careers', '', 'publish', 'closed', 'closed', '', 'careers', '', '', '2016-05-13 02:26:03', '2016-05-13 02:26:03', '', 8, 'http://demo.cms-theme.net/wordpress/3dprinting/?page_id=9', 0, 'page', '', 0),
(10, 1, '2016-05-11 06:38:21', '2016-05-11 06:38:21', '[vc_row][vc_column][zo_grid col_xs="1" col_sm="2" col_md="3" col_lg="3" image_size="full" title_link="1" num_words="31" source="size:6|order_by:date|order:ASC|post_type:service" zo_template="zo_grid.php"][/vc_column][/vc_row][vc_row overlay_row="yes" background_attachment="fixed" css=".vc_custom_1463729820959{padding-top: 150px !important;padding-bottom: 130px !important;background-image: url(http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/servicebackground.jpg?id=260) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" overlay_color="rgba(0,0,0,0.31)"][vc_column width="1/4"][zo_counter_single title="3D MODELS" icon_type="linearicons" icon_linearicons="lnr-diamond" digit="1536" zo_template="zo_counter_single.php"][/vc_column][vc_column width="1/4"][zo_counter_single title="WORKING DAYS" icon_type="linearicons" icon_linearicons="lnr-rocket" digit="986" zo_template="zo_counter_single.php"][/vc_column][vc_column width="1/4"][zo_counter_single title="HAPPY CLIENTS" icon_type="linearicons" icon_linearicons="lnr-heart" digit="580" zo_template="zo_counter_single.php"][/vc_column][vc_column width="1/4"][zo_counter_single title="TEAM MEMBERS" icon_type="linearicons" icon_linearicons="lnr-users" digit="120" zo_template="zo_counter_single.php"][/vc_column][/vc_row][vc_row css=".vc_custom_1463729745431{padding-top: 100px !important;padding-bottom: 80px !important;}"][vc_column][zo_heading text="3D PRINTING PROCESS" align="center" is_sub="yes" sub_text="Bring your brand to life with 3D printing. Contact with us now!" sub_element="p" sub_align="center" zo_template="zo_heading.php" link="||"][vc_row_inner css=".vc_custom_1462246585194{margin-bottom: 100px !important;}"][vc_column_inner width="1/4"][zo_fancybox_single class="box-1" icon_type="upload" icon_align="center" title_item="1" zo_template="zo_fancybox_single--process.php" image="32" content_item="3D PRINTING"][/vc_column_inner][vc_column_inner width="1/4"][zo_fancybox_single class="box-2" icon_type="upload" icon_align="center" title_item="2" zo_template="zo_fancybox_single--process.php" image="33" content_item="3D DESIGN"][/vc_column_inner][vc_column_inner width="1/4"][zo_fancybox_single class="box-3" icon_type="upload" icon_align="center" title_item="3" zo_template="zo_fancybox_single--process.php" image="30" content_item="3D PRINTER"][/vc_column_inner][vc_column_inner width="1/4"][zo_fancybox_single class="zo-no-line box-4" icon_type="upload" icon_align="center" title_item="4" zo_template="zo_fancybox_single--process.php" image="31" content_item="3D PRINTED PRODUCT"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="7/12" offset="vc_col-xs-12"][zo_heading class="printing-border-left" text="REQUEST A QUOTE" zo_template="zo_heading.php" link="||"][contact-form-7 id="34"][/vc_column_inner][vc_column_inner width="5/12" offset="vc_col-xs-12"][vc_single_image image="27" img_size="full" alignment="center" css=".vc_custom_1462961099854{margin-top: 70px !important;}"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]', 'Services', '', 'publish', 'closed', 'closed', '', 'services', '', '', '2016-05-24 03:28:40', '2016-05-24 03:28:40', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?page_id=10', 0, 'page', '', 0),
(12, 1, '2016-05-11 06:47:21', '2016-05-11 06:47:21', ' ', '', '', 'publish', 'closed', 'closed', '', '12', '', '', '2016-07-26 03:29:01', '2016-07-26 03:29:01', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?p=12', 3, 'nav_menu_item', '', 0),
(13, 1, '2016-05-11 06:47:21', '2016-05-11 06:47:21', '', 'Home', '', 'publish', 'closed', 'closed', '', 'home', '', '', '2016-07-26 03:29:01', '2016-07-26 03:29:01', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?p=13', 1, 'nav_menu_item', '', 0),
(14, 1, '2016-05-11 06:48:00', '2016-05-11 06:48:00', ' ', '', '', 'publish', 'closed', 'closed', '', '14', '', '', '2016-07-26 03:29:01', '2016-07-26 03:29:01', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?p=14', 2, 'nav_menu_item', '', 0),
(15, 1, '2016-05-11 06:48:28', '2016-05-11 06:48:28', ' ', '', '', 'publish', 'closed', 'closed', '', '15', '', '', '2016-07-26 03:29:01', '2016-07-26 03:29:01', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?p=15', 6, 'nav_menu_item', '', 0),
(16, 1, '2016-05-11 06:49:51', '2016-05-11 06:49:51', ' ', '', '', 'publish', 'closed', 'closed', '', '16', '', '', '2016-07-26 03:29:01', '2016-07-26 03:29:01', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?p=16', 12, 'nav_menu_item', '', 0),
(17, 1, '2016-05-11 06:52:06', '2016-05-11 06:52:06', '[vc_row css=".vc_custom_1469173223744{margin-bottom: 80px !important;}"][vc_column][zo_masonry col_xs="1" col_sm="12" col_md="12" col_lg="12" filter="1" margin="10" ratio="0.5" source="size:12|order_by:date|post_type:portfolio" zo_template="zo_masonry.php"][/vc_column][/vc_row]', 'Drag & Drop Masonry Style 01', '', 'publish', 'closed', 'closed', '', 'drag-drop-masonry-style-01', '', '', '2016-07-22 07:30:42', '2016-07-22 07:30:42', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?page_id=17', 0, 'page', '', 0),
(18, 1, '2016-05-11 06:53:37', '2016-05-11 06:53:37', '', 'Portfolios', '', 'publish', 'closed', 'closed', '', '18', '', '', '2016-07-26 03:29:02', '2016-07-26 03:29:02', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?p=18', 19, 'nav_menu_item', '', 0),
(20, 1, '2016-05-11 06:54:55', '2016-05-11 06:54:55', '[vc_row el_class="page-contact"][vc_column width="1/2"][zo_heading class="printing-border-left" text="GET IN TOUCH" zo_template="zo_heading.php"][vc_empty_space height="21px"][vc_column_text]\r\n<p class="p-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>\r\n[/vc_column_text][vc_empty_space height="22px"][zo_fancybox_single icon_fontawesome="fa fa-home" title_item="ADDRESS" content_item="201 Main Design Street West Valley City, New York, United State" zo_template="zo_fancybox_single--contact_horizontal.php"][zo_fancybox_single icon_fontawesome="fa fa-phone" title_item=" PHONE" content_item="+00 12345 12 11" zo_template="zo_fancybox_single--contact_horizontal.php"][zo_fancybox_single icon_fontawesome="fa fa-envelope" title_item=" EMAIL" content_item="201 Main Design Street West Valley City, New York, United State" zo_template="zo_fancybox_single--contact_horizontal.php"][vc_widget_sidebar sidebar_id="contact_social" el_class="social-contact"][/vc_column][vc_column width="1/2"][zo_heading class="printing-border-left" text="CONTACT FORM" zo_template="zo_heading.php"][vc_empty_space height="27px"][contact-form-7 id="6"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1461402438228{padding-top: 100px !important;}"][vc_column][zo_googlemap height="500px" zoomcontrol="1"][/zo_googlemap][/vc_column][/vc_row]', 'Contact', '', 'publish', 'closed', 'closed', '', 'contact', '', '', '2016-05-24 03:37:18', '2016-05-24 03:37:18', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?page_id=20', 0, 'page', '', 0),
(21, 1, '2016-05-11 06:55:45', '2016-05-11 06:55:45', ' ', '', '', 'publish', 'closed', 'closed', '', '21', '', '', '2016-07-26 03:29:02', '2016-07-26 03:29:02', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/?p=21', 41, 'nav_menu_item', '', 0),
(22, 1, '2016-05-11 08:19:14', '2016-05-11 08:19:14', '', 'slide-1.jpg', '', 'inherit', 'closed', 'closed', '', 'slide-1-jpg', '', '', '2016-05-11 08:19:14', '2016-05-11 08:19:14', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/revslider/slide-home/slide-1.jpg', 0, 'attachment', 'image/jpeg', 0),
(23, 1, '2016-05-11 08:19:14', '2016-05-11 08:19:14', '', '3dprinting-icon-down.png', '', 'inherit', 'closed', 'closed', '', '3dprinting-icon-down-png', '', '', '2016-05-11 08:19:14', '2016-05-11 08:19:14', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/revslider/slide-home/3dprinting-icon-down.png', 0, 'attachment', 'image/png', 0),
(24, 1, '2016-05-11 08:19:14', '2016-05-11 08:19:14', '', 'slide-2.jpg', '', 'inherit', 'closed', 'closed', '', 'slide-2-jpg', '', '', '2016-05-11 08:19:14', '2016-05-11 08:19:14', '', 0, 'http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/revslider/slide-home/slide-2.jpg', 0, 'attachment', 'image/jpeg', 0),
(25, 1, '2016-05-11 08:27:39', '2016-05-11 08:27:39', '', '3d-printer-service-home', '', 'inherit', 'open', 'closed', '', '3d-printer-service-home', '', '', '2016-05-11 08:27:39', '2016-05-11 08:27:39', '', 4, 'http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/3d-printer-service-home.jpg', 0, 'attachment', 'image/jpeg', 0),
(26, 1, '2016-05-11 08:55:07', '2016-05-11 08:55:07', '', '3dprinting-home1', '', 'inherit', 'open', 'closed', '', '3dprinting-home1', '', '', '2016-05-11 08:55:07', '2016-05-11 08:55:07', '', 4, 'http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/3dprinting-home1.png', 0, 'attachment', 'image/png', 0),
(27, 1, '2016-05-11 09:10:20', '2016-05-11 09:10:20', '', '3dprinting-home-quote-image', '', 'inherit', 'open', 'closed', '', '3dprinting-home-quote-image', '', '', '2016-05-11 09:10:20', '2016-05-11 09:10:20', '', 4, 'http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/3dprinting-home-quote-image.png', 0, 'attachment', 'image/png', 0),
(29, 1, '2016-05-11 09:22:24', '2016-05-11 09:22:24', '', '3dprinting-video-image', '', 'inherit', 'open', 'closed', '', '3dprinting-video-image', '', '', '2016-05-11 09:22:24', '2016-05-11 09:22:24', '', 4, 'http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/3dprinting-video-image.jpg', 0, 'attachment', 'image/jpeg', 0),
(30, 1, '2016-05-11 09:23:21', '2016-05-11 09:23:21', '', 'process-icon-3', '', 'inherit', 'open', 'closed', '', 'process-icon-3', '', '', '2016-05-11 09:23:21', '2016-05-11 09:23:21', '', 4, 'http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/process-icon-3.png', 0, 'attachment', 'image/png', 0),
(31, 1, '2016-05-11 09:23:23', '2016-05-11 09:23:23', '', 'process-icon-4', '', 'inherit', 'open', 'closed', '', 'process-icon-4', '', '', '2016-05-11 09:23:23', '2016-05-11 09:23:23', '', 4, 'http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/process-icon-4.png', 0, 'attachment', 'image/png', 0),
(32, 1, '2016-05-11 09:23:25', '2016-05-11 09:23:25', '', 'process-icon-1', '', 'inherit', 'open', 'closed', '', 'process-icon-1', '', '', '2016-05-11 09:23:25', '2016-05-11 09:23:25', '', 4, 'http://demo.cms-theme.net/wordpress/3dprinting/wp-content/uploads/2016/05/process-icon-1.png', 0, 'attachment', 'image/png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_css`
--

DROP TABLE IF EXISTS `wp_revslider_css`;
CREATE TABLE IF NOT EXISTS `wp_revslider_css` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `handle` text NOT NULL,
  `settings` longtext,
  `hover` longtext,
  `params` text NOT NULL,
  `advanced` longtext,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `wp_revslider_css`
--

INSERT INTO `wp_revslider_css` (`id`, `handle`, `settings`, `hover`, `params`, `advanced`) VALUES
(1, '.tp-caption.medium_grey', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#fff","font-weight":"700","font-size":"20px","line-height":"20px","font-family":"Arial","padding":"2px 4px","border-width":"0px","border-style":"none","background-color":"#888"}', '{"idle":{"position":"absolute","text-shadow":"0px 2px 5px rgba(0, 0, 0, 0.5)","margin":"0px","white-space":"nowrap"},"hover":""}'),
(2, '.tp-caption.small_text', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#fff","font-weight":"700","font-size":"14px","line-height":"20px","font-family":"Arial","border-width":"0px","border-style":"none"}', '{"idle":{"position":"absolute","text-shadow":"0px 2px 5px rgba(0, 0, 0, 0.5)","margin":"0px","white-space":"nowrap"},"hover":""}'),
(3, '.tp-caption.medium_text', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#fff","font-weight":"700","font-size":"20px","line-height":"20px","font-family":"Arial","border-width":"0px","border-style":"none"}', '{"idle":{"position":"absolute","text-shadow":"0px 2px 5px rgba(0, 0, 0, 0.5)","margin":"0px","white-space":"nowrap"},"hover":""}'),
(4, '.tp-caption.large_text', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#fff","font-weight":"700","font-size":"40px","line-height":"40px","font-family":"Arial","border-width":"0px","border-style":"none"}', '{"idle":{"position":"absolute","text-shadow":"0px 2px 5px rgba(0, 0, 0, 0.5)","margin":"0px","white-space":"nowrap"},"hover":""}'),
(5, '.tp-caption.very_large_text', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#fff","font-weight":"700","font-size":"60px","line-height":"60px","font-family":"Arial","border-width":"0px","border-style":"none"}', '{"idle":{"position":"absolute","text-shadow":"0px 2px 5px rgba(0, 0, 0, 0.5)","margin":"0px","white-space":"nowrap","letter-spacing":"-2px"},"hover":""}'),
(6, '.tp-caption.very_big_white', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#fff","font-weight":"800","font-size":"60px","line-height":"60px","font-family":"Arial","border-width":"0px","border-style":"none","padding":"0px 4px","background-color":"#000"}', '{"idle":{"position":"absolute","text-shadow":"none","margin":"0px","white-space":"nowrap","padding-top":"1px"},"hover":""}'),
(7, '.tp-caption.very_big_black', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#000","font-weight":"700","font-size":"60px","line-height":"60px","font-family":"Arial","border-width":"0px","border-style":"none","padding":"0px 4px","background-color":"#fff"}', '{"idle":{"position":"absolute","text-shadow":"none","margin":"0px","white-space":"nowrap","padding-top":"1px"},"hover":""}'),
(8, '.tp-caption.modern_medium_fat', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#000","font-weight":"800","font-size":"24px","line-height":"20px","font-family":"\\"Open Sans\\", sans-serif","border-width":"0px","border-style":"none"}', '{"idle":{"position":"absolute","text-shadow":"none","margin":"0px","white-space":"nowrap"},"hover":""}'),
(9, '.tp-caption.modern_medium_fat_white', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#fff","font-weight":"800","font-size":"24px","line-height":"20px","font-family":"\\"Open Sans\\", sans-serif","border-width":"0px","border-style":"none"}', '{"idle":{"position":"absolute","text-shadow":"none","margin":"0px","white-space":"nowrap"},"hover":""}'),
(10, '.tp-caption.modern_medium_light', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#000","font-weight":"300","font-size":"24px","line-height":"20px","font-family":"\\"Open Sans\\", sans-serif","border-width":"0px","border-style":"none"}', '{"idle":{"position":"absolute","text-shadow":"none","margin":"0px","white-space":"nowrap"},"hover":""}'),
(11, '.tp-caption.modern_big_bluebg', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#fff","font-weight":"800","font-size":"30px","line-height":"36px","font-family":"\\"Open Sans\\", sans-serif","padding":"3px 10px","border-width":"0px","border-style":"none","background-color":"#4e5b6c"}', '{"idle":{"position":"absolute","text-shadow":"none","margin":"0px","letter-spacing":"0"},"hover":""}'),
(12, '.tp-caption.modern_big_redbg', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#fff","font-weight":"300","font-size":"30px","line-height":"36px","font-family":"\\"Open Sans\\", sans-serif","padding":"3px 10px","border-width":"0px","border-style":"none","background-color":"#de543e"}', '{"idle":{"position":"absolute","text-shadow":"none","padding-top":"1px","margin":"0px","letter-spacing":"0"},"hover":""}'),
(13, '.tp-caption.modern_small_text_dark', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#555","font-size":"14px","line-height":"22px","font-family":"Arial","border-width":"0px","border-style":"none"}', '{"idle":{"position":"absolute","text-shadow":"none","margin":"0px","white-space":"nowrap"},"hover":""}'),
(14, '.tp-caption.boxshadow', '{"translated":5,"type":"text","version":"4"}', 'null', '[]', '{"idle":{"-moz-box-shadow":"0px 0px 20px rgba(0, 0, 0, 0.5)","-webkit-box-shadow":"0px 0px 20px rgba(0, 0, 0, 0.5)","box-shadow":"0px 0px 20px rgba(0, 0, 0, 0.5)"},"hover":""}'),
(15, '.tp-caption.black', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#000"}', '{"idle":{"text-shadow":"none"},"hover":""}'),
(16, '.tp-caption.noshadow', '{"translated":5,"type":"text","version":"4"}', 'null', '[]', '{"idle":{"text-shadow":"none"},"hover":""}'),
(17, '.tp-caption.thinheadline_dark', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"rgba(0,0,0,0.85)","font-weight":"300","font-size":"30px","line-height":"30px","font-family":"\\"Open Sans\\"","background-color":"transparent"}', '{"idle":{"position":"absolute","text-shadow":"none"},"hover":""}'),
(18, '.tp-caption.thintext_dark', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"rgba(0,0,0,0.85)","font-weight":"300","font-size":"16px","line-height":"26px","font-family":"\\"Open Sans\\"","background-color":"transparent"}', '{"idle":{"position":"absolute","text-shadow":"none"},"hover":""}'),
(19, '.tp-caption.largeblackbg', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#fff","font-weight":"300","font-size":"50px","line-height":"70px","font-family":"\\"Open Sans\\"","background-color":"#000","padding":"0px 20px","border-radius":"0px"}', '{"idle":{"position":"absolute","text-shadow":"none","-webkit-border-radius":"0px","-moz-border-radius":"0px"},"hover":""}'),
(20, '.tp-caption.largepinkbg', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#fff","font-weight":"300","font-size":"50px","line-height":"70px","font-family":"\\"Open Sans\\"","background-color":"#db4360","padding":"0px 20px","border-radius":"0px"}', '{"idle":{"position":"absolute","text-shadow":"none","-webkit-border-radius":"0px","-moz-border-radius":"0px"},"hover":""}'),
(21, '.tp-caption.largewhitebg', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#000","font-weight":"300","font-size":"50px","line-height":"70px","font-family":"\\"Open Sans\\"","background-color":"#fff","padding":"0px 20px","border-radius":"0px"}', '{"idle":{"position":"absolute","text-shadow":"none","-webkit-border-radius":"0px","-moz-border-radius":"0px"},"hover":""}'),
(22, '.tp-caption.largegreenbg', '{"translated":5,"type":"text","version":"4"}', 'null', '{"color":"#fff","font-weight":"300","font-size":"50px","line-height":"70px","font-family":"\\"Open Sans\\"","background-color":"#67ae73","padding":"0px 20px","border-radius":"0px"}', '{"idle":{"position":"absolute","text-shadow":"none","-webkit-border-radius":"0px","-moz-border-radius":"0px"},"hover":""}'),
(23, '.tp-caption.excerpt', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"36px","line-height":"36px","font-weight":"700","font-family":"Arial","color":"#ffffff","text-decoration":"none","background-color":"rgba(0, 0, 0, 1)","padding":"1px 4px 0px 4px","border-width":"0px","border-color":"rgb(255, 255, 255)","border-style":"none"}', '{"idle":{"text-shadow":"none","margin":"0px","letter-spacing":"-1.5px","width":"150px","white-space":"normal !important","height":"auto"},"hover":""}'),
(24, '.tp-caption.large_bold_grey', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"60px","line-height":"60px","font-weight":"800","font-family":"\\"Open Sans\\"","color":"rgb(102, 102, 102)","text-decoration":"none","background-color":"transparent","padding":"1px 4px 0px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":{"text-shadow":"none","margin":"0px"},"hover":""}'),
(25, '.tp-caption.medium_thin_grey', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"34px","line-height":"30px","font-weight":"300","font-family":"\\"Open Sans\\"","color":"rgb(102, 102, 102)","text-decoration":"none","background-color":"transparent","padding":"1px 4px 0px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":{"text-shadow":"none","margin":"0px"},"hover":""}'),
(26, '.tp-caption.small_thin_grey', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"18px","line-height":"26px","font-weight":"300","font-family":"\\"Open Sans\\"","color":"rgb(117, 117, 117)","text-decoration":"none","background-color":"transparent","padding":"1px 4px 0px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":{"text-shadow":"none","margin":"0px"},"hover":""}'),
(27, '.tp-caption.lightgrey_divider', '{"translated":5,"type":"text","version":"4"}', 'null', '{"text-decoration":"none","background-color":"rgba(235, 235, 235, 1)","border-width":"0px","border-color":"rgb(34, 34, 34)","border-style":"none"}', '{"idle":{"width":"370px","height":"3px","background-position":"initial initial","background-repeat":"initial initial"},"hover":""}'),
(28, '.tp-caption.large_bold_darkblue', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"58px","line-height":"60px","font-weight":"800","font-family":"\\"Open Sans\\"","color":"rgb(52, 73, 94)","text-decoration":"none","background-color":"transparent","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(29, '.tp-caption.medium_bg_darkblue', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"20px","line-height":"20px","font-weight":"800","font-family":"\\"Open Sans\\"","color":"rgb(255, 255, 255)","text-decoration":"none","background-color":"rgb(52, 73, 94)","padding":"10px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(30, '.tp-caption.medium_bold_red', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"24px","line-height":"30px","font-weight":"800","font-family":"\\"Open Sans\\"","color":"rgb(227, 58, 12)","text-decoration":"none","background-color":"transparent","padding":"0px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(31, '.tp-caption.medium_light_red', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"21px","line-height":"26px","font-weight":"300","font-family":"\\"Open Sans\\"","color":"rgb(227, 58, 12)","text-decoration":"none","background-color":"transparent","padding":"0px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(32, '.tp-caption.medium_bg_red', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"20px","line-height":"20px","font-weight":"800","font-family":"\\"Open Sans\\"","color":"rgb(255, 255, 255)","text-decoration":"none","background-color":"rgb(227, 58, 12)","padding":"10px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(33, '.tp-caption.medium_bold_orange', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"24px","line-height":"30px","font-weight":"800","font-family":"\\"Open Sans\\"","color":"rgb(243, 156, 18)","text-decoration":"none","background-color":"transparent","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(34, '.tp-caption.medium_bg_orange', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"20px","line-height":"20px","font-weight":"800","font-family":"\\"Open Sans\\"","color":"rgb(255, 255, 255)","text-decoration":"none","background-color":"rgb(243, 156, 18)","padding":"10px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(35, '.tp-caption.grassfloor', '{"translated":5,"type":"text","version":"4"}', 'null', '{"text-decoration":"none","background-color":"rgba(160, 179, 151, 1)","border-width":"0px","border-color":"rgb(34, 34, 34)","border-style":"none"}', '{"idle":{"width":"4000px","height":"150px"},"hover":""}'),
(36, '.tp-caption.large_bold_white', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"58px","line-height":"60px","font-weight":"800","font-family":"\\"Open Sans\\"","color":"rgb(255, 255, 255)","text-decoration":"none","background-color":"transparent","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(37, '.tp-caption.medium_light_white', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"30px","line-height":"36px","font-weight":"300","font-family":"\\"Open Sans\\"","color":"rgb(255, 255, 255)","text-decoration":"none","background-color":"transparent","padding":"0px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(38, '.tp-caption.mediumlarge_light_white', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"34px","line-height":"40px","font-weight":"300","font-family":"\\"Open Sans\\"","color":"rgb(255, 255, 255)","text-decoration":"none","background-color":"transparent","padding":"0px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(39, '.tp-caption.mediumlarge_light_white_center', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"34px","line-height":"40px","font-weight":"300","font-family":"\\"Open Sans\\"","color":"#ffffff","text-decoration":"none","background-color":"transparent","padding":"0px 0px 0px 0px","text-align":"center","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(40, '.tp-caption.medium_bg_asbestos', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"20px","line-height":"20px","font-weight":"800","font-family":"\\"Open Sans\\"","color":"rgb(255, 255, 255)","text-decoration":"none","background-color":"rgb(127, 140, 141)","padding":"10px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(41, '.tp-caption.medium_light_black', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"30px","line-height":"36px","font-weight":"300","font-family":"\\"Open Sans\\"","color":"rgb(0, 0, 0)","text-decoration":"none","background-color":"transparent","padding":"0px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(42, '.tp-caption.large_bold_black', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"58px","line-height":"60px","font-weight":"800","font-family":"\\"Open Sans\\"","color":"rgb(0, 0, 0)","text-decoration":"none","background-color":"transparent","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(43, '.tp-caption.mediumlarge_light_darkblue', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"34px","line-height":"40px","font-weight":"300","font-family":"\\"Open Sans\\"","color":"rgb(52, 73, 94)","text-decoration":"none","background-color":"transparent","padding":"0px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(44, '.tp-caption.small_light_white', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"17px","line-height":"28px","font-weight":"300","font-family":"\\"Open Sans\\"","color":"rgb(255, 255, 255)","text-decoration":"none","background-color":"transparent","padding":"0px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(45, '.tp-caption.roundedimage', '{"translated":5,"type":"text","version":"4"}', 'null', '{"border-width":"0px","border-color":"rgb(34, 34, 34)","border-style":"none"}', '{"idle":[],"hover":""}'),
(46, '.tp-caption.large_bg_black', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"40px","line-height":"40px","font-weight":"800","font-family":"\\"Open Sans\\"","color":"rgb(255, 255, 255)","text-decoration":"none","background-color":"rgb(0, 0, 0)","padding":"10px 20px 15px","border-width":"0px","border-color":"rgb(255, 214, 88)","border-style":"none"}', '{"idle":[],"hover":""}'),
(47, '.tp-caption.mediumwhitebg', '{"translated":5,"type":"text","version":"4"}', 'null', '{"font-size":"30px","line-height":"30px","font-weight":"300","font-family":"\\"Open Sans\\"","color":"rgb(0, 0, 0)","text-decoration":"none","background-color":"rgb(255, 255, 255)","padding":"5px 15px 10px","border-width":"0px","border-color":"rgb(0, 0, 0)","border-style":"none"}', '{"idle":{"text-shadow":"none"},"hover":""}'),
(48, '.tp-caption.MarkerDisplay', '{"translated":5,"type":"text","version":"5.0"}', '{"color":"#ff0000","text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-style":"none","border-width":"0","border-radius":["0px","0px","0px","0px"],"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0"}', '{"font-style":"normal","font-family":"Permanent Marker","padding":"0px 0px 0px 0px","text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"#000000","border-style":"none","border-width":"0px","border-radius":"0px 0px 0px 0px","z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"text-shadow":"none"},"hover":""}'),
(49, '.tp-caption.Restaurant-Display', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0"}', '{"color":"#ffffff","font-size":"120px","line-height":"120px","font-weight":"700","font-style":"normal","font-family":"Roboto","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":"","hover":""}'),
(50, '.tp-caption.Restaurant-Cursive', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0"}', '{"color":"#ffffff","font-size":"30px","line-height":"30px","font-weight":"400","font-style":"normal","font-family":"Nothing you could do","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"2px"},"hover":""}'),
(51, '.tp-caption.Restaurant-ScrollDownText', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0"}', '{"color":"#ffffff","font-size":"17px","line-height":"17px","font-weight":"400","font-style":"normal","font-family":"Roboto","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"2px"},"hover":""}'),
(52, '.tp-caption.Restaurant-Description', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0"}', '{"color":"#ffffff","font-size":"20px","line-height":"30px","font-weight":"300","font-style":"normal","font-family":"Roboto","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"3px"},"hover":""}'),
(53, '.tp-caption.Restaurant-Price', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0"}', '{"color":"#ffffff","font-size":"30px","line-height":"30px","font-weight":"300","font-style":"normal","font-family":"Roboto","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"3px"},"hover":""}'),
(54, '.tp-caption.Restaurant-Menuitem', '{"hover":"false","type":"text","version":"5.0","translated":"5"}', '{"color":"#000000","color-transparency":"1","text-decoration":"none","background-color":"#ffffff","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","css_cursor":"pointer","speed":"500","easing":"Power2.easeInOut"}', '{"color":"#ffffff","color-transparency":"1","font-size":"17px","line-height":"17px","font-weight":"400","font-style":"normal","font-family":"Roboto","padding":["10px","30px","10px","30px"],"text-decoration":"none","text-align":"left","background-color":"#000000","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600","corner_left":"nothing","corner_right":"nothing","parallax":"-"}', '{"idle":{"letter-spacing":"2px"},"hover":""}'),
(55, '.tp-caption.Furniture-LogoText', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#e6cfa3","color-transparency":"1","font-size":"160px","line-height":"150px","font-weight":"300","font-style":"normal","font-family":"\\"Raleway\\"","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"text-shadow":"none"},"hover":""}'),
(56, '.tp-caption.Furniture-Plus', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"#000000","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["30px","30px","30px","30px"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0.5","easing":"Linear.easeNone"}', '{"color":"#e6cfa3","color-transparency":"1","font-size":"20","line-height":"20px","font-weight":"400","font-style":"normal","font-family":"\\"Raleway\\"","padding":["6px","7px","4px","7px"],"text-decoration":"none","background-color":"#ffffff","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["30px","30px","30px","30px"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"text-shadow":"none","box-shadow":"rgba(0,0,0,0.1) 0 1px 3px"},"hover":""}'),
(57, '.tp-caption.Furniture-Title', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#000000","color-transparency":"1","font-size":"20px","line-height":"20px","font-weight":"700","font-style":"normal","font-family":"\\"Raleway\\"","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"text-shadow":"none","letter-spacing":"3px"},"hover":""}'),
(58, '.tp-caption.Furniture-Subtitle', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#000000","color-transparency":"1","font-size":"17px","line-height":"20px","font-weight":"300","font-style":"normal","font-family":"\\"Raleway\\"","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"text-shadow":"none"},"hover":""}'),
(59, '.tp-caption.Gym-Display', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#ffffff","color-transparency":"1","font-size":"80px","line-height":"70px","font-weight":"900","font-style":"normal","font-family":"Raleway","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":"","hover":""}'),
(60, '.tp-caption.Gym-Subline', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#ffffff","color-transparency":"1","font-size":"30px","line-height":"30px","font-weight":"100","font-style":"normal","font-family":"Raleway","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"5px"},"hover":""}'),
(61, '.tp-caption.Gym-SmallText', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#ffffff","color-transparency":"1","font-size":"17px","line-height":"22","font-weight":"300","font-style":"normal","font-family":"Raleway","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"text-shadow":"none"},"hover":""}'),
(62, '.tp-caption.Fashion-SmallText', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#ffffff","color-transparency":"1","font-size":"12px","line-height":"20px","font-weight":"600","font-style":"normal","font-family":"Raleway","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"2px"},"hover":""}'),
(63, '.tp-caption.Fashion-BigDisplay', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#000000","color-transparency":"1","font-size":"60px","line-height":"60px","font-weight":"900","font-style":"normal","font-family":"Raleway","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"2px"},"hover":""}'),
(64, '.tp-caption.Fashion-TextBlock', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#000000","color-transparency":"1","font-size":"20px","line-height":"40px","font-weight":"400","font-style":"normal","font-family":"Raleway","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"2px"},"hover":""}'),
(65, '.tp-caption.Sports-Display', '{"translated":5,"type":"text","version":"5.0"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#ffffff","color-transparency":"1","font-size":"130px","line-height":"130px","font-weight":"100","font-style":"normal","font-family":"\\"Raleway\\"","padding":"0 0 0 0","text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":"0 0 0 0","z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"13px"},"hover":""}'),
(66, '.tp-caption.Sports-DisplayFat', '{"translated":5,"type":"text","version":"5.0"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#ffffff","color-transparency":"1","font-size":"130px","line-height":"130px","font-weight":"900","font-style":"normal","font-family":"\\"Raleway\\"","padding":"0 0 0 0","text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":"0 0 0 0","z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":[""],"hover":""}'),
(67, '.tp-caption.Sports-Subline', '{"translated":5,"type":"text","version":"5.0"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#000000","color-transparency":"1","font-size":"32px","line-height":"32px","font-weight":"400","font-style":"normal","font-family":"\\"Raleway\\"","padding":"0 0 0 0","text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":"0 0 0 0","z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"4px"},"hover":""}'),
(68, '.tp-caption.Instagram-Caption', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#ffffff","color-transparency":"1","font-size":"20px","line-height":"20px","font-weight":"900","font-style":"normal","font-family":"Roboto","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":"","hover":""}'),
(69, '.tp-caption.News-Title', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#ffffff","color-transparency":"1","font-size":"70px","line-height":"60px","font-weight":"400","font-style":"normal","font-family":"Roboto Slab","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":"","hover":""}'),
(70, '.tp-caption.News-Subtitle', '{"hover":"true","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"0.65","text-decoration":"none","background-color":"#ffffff","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"solid","border-width":"0px","border-radius":["0","0","0px","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"300","easing":"Power3.easeInOut"}', '{"color":"#ffffff","color-transparency":"1","font-size":"15px","line-height":"24px","font-weight":"300","font-style":"normal","font-family":"Roboto Slab","padding":["0","0","0","0"],"text-decoration":"none","background-color":"#ffffff","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":"","hover":""}'),
(71, '.tp-caption.Photography-Display', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#ffffff","color-transparency":"1","font-size":"80px","line-height":"70px","font-weight":"100","font-style":"normal","font-family":"Raleway","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"5px"},"hover":""}'),
(72, '.tp-caption.Photography-Subline', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#777777","color-transparency":"1","font-size":"20px","line-height":"30px","font-weight":"300","font-style":"normal","font-family":"Raleway","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"3px"},"hover":""}'),
(73, '.tp-caption.Photography-ImageHover', '{"hover":"true","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"0.5","scalex":"0.8","scaley":"0.8","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"1000","easing":"Power3.easeInOut"}', '{"color":"#ffffff","color-transparency":"1","font-size":"20","line-height":"22","font-weight":"400","font-style":"normal","font-family":"","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"#ffffff","border-transparency":"0","border-style":"none","border-width":"0px","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":"","hover":""}'),
(74, '.tp-caption.Photography-Menuitem', '{"hover":"true","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"#00ffde","background-transparency":"0.65","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","css_cursor":"pointer","speed":"200","easing":"Linear.easeNone"}', '{"color":"#ffffff","color-transparency":"1","font-size":"20px","line-height":"20px","font-weight":"300","font-style":"normal","font-family":"Raleway","padding":["3px","5px","3px","8px"],"text-decoration":"none","background-color":"#000000","background-transparency":"0.65","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"2px"},"hover":""}'),
(75, '.tp-caption.Photography-Textblock', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","speed":"0","easing":"Linear.easeNone"}', '{"color":"#fff","color-transparency":"1","font-size":"17px","line-height":"30px","font-weight":"300","font-style":"normal","font-family":"Raleway","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"2px"},"hover":""}'),
(76, '.tp-caption.Photography-Subline-2', '{"hover":"false","version":"5.0","translated":"5"}', '{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"opacity":"1","scalex":"1","scaley":"1","skewx":"0","skewy":"0","xrotate":"0","yrotate":"0","2d_rotation":"0","css_cursor":"auto","speed":"0","easing":"Linear.easeNone"}', '{"color":"#ffffff","color-transparency":"0.35","font-size":"20px","line-height":"30px","font-weight":"300","font-style":"normal","font-family":"Raleway","padding":["0","0","0","0"],"text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"z":"0","skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":"0","yrotate":"0","2d_rotation":"0","2d_origin_x":"50","2d_origin_y":"50","pers":"600"}', '{"idle":{"letter-spacing":"3px"},"hover":""}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_layer_animations`
--

DROP TABLE IF EXISTS `wp_revslider_layer_animations`;
CREATE TABLE IF NOT EXISTS `wp_revslider_layer_animations` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `handle` text NOT NULL,
  `params` text NOT NULL,
  `settings` text,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_navigations`
--

DROP TABLE IF EXISTS `wp_revslider_navigations`;
CREATE TABLE IF NOT EXISTS `wp_revslider_navigations` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `handle` varchar(191) NOT NULL,
  `css` longtext NOT NULL,
  `markup` longtext NOT NULL,
  `settings` longtext,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_sliders`
--

DROP TABLE IF EXISTS `wp_revslider_sliders`;
CREATE TABLE IF NOT EXISTS `wp_revslider_sliders` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `title` tinytext NOT NULL,
  `alias` tinytext,
  `params` longtext NOT NULL,
  `settings` text,
  `type` varchar(191) NOT NULL DEFAULT '',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wp_revslider_sliders`
--

INSERT INTO `wp_revslider_sliders` (`id`, `title`, `alias`, `params`, `settings`, `type`) VALUES
(1, 'slide-home', 'slide-home', '{"hero_active":"-1","source_type":"gallery","instagram-count":"","instagram-transient":"1200","instagram-access-token":"","instagram-type":"user","instagram-user-id":"","instagram-hash-tag":"","flickr-count":"","flickr-transient":"1200","flickr-api-key":"","flickr-type":"publicphotos","flickr-user-url":"","flickr-photoset":"","flickr-photoset-select":"","flickr-gallery-url":"","flickr-group-url":"","facebook-count":"","facebook-transient":"1200","facebook-page-url":"","facebook-type-source":"album","facebook-album":"","facebook-album-select":"","facebook-app-id":"","facebook-app-secret":"","twitter-count":"","twitter-transient":"1200","twitter-user-id":"","twitter-image-only":"off","twitter-include-retweets":"off","twitter-exclude-replies":"off","twitter-consumer-key":"","twitter-consumer-secret":"","twitter-access-token":"","twitter-access-secret":"","youtube-count":"","youtube-transient":"1200","youtube-api":"","youtube-channel-id":"","youtube-type-source":"channel","youtube-playlist":"","youtube-playlist-select":"","vimeo-count":"","vimeo-transient":"1200","vimeo-type-source":"user","vimeo-username":"","vimeo-groupname":"","vimeo-albumid":"","vimeo-channelname":"","product_types":"product","product_category":"","posts_list":"","fetch_type":"cat_tag","post_types":"post","post_category":"","product_sortby":"ID","product_sort_direction":"DESC","max_slider_products":"30","excerpt_limit_product":"55","reg_price_from":"","reg_price_to":"","sale_price_from":"","sale_price_to":"","instock_only":"off","featured_only":"off","post_sortby":"ID","posts_sort_direction":"DESC","max_slider_posts":"30","excerpt_limit":"55","title":"slide-home","alias":"slide-home","shortcode":"[rev_slider alias=\\\\\\"slide-home\\\\\\"]","slider-type":"standard","slider_type":"auto","width":"1170","height":"700","width_notebook":"1024","height_notebook":"768","enable_custom_size_notebook":"on","width_tablet":"778","height_tablet":"960","enable_custom_size_tablet":"on","width_mobile":"480","height_mobile":"720","enable_custom_size_iphone":"on","full_screen_align_force":"off","fullscreen_min_height":"","autowidth_force":"off","fullscreen_offset_container":"","fullscreen_offset_size":"","main_overflow_hidden":"off","auto_height":"off","min_height":"","max_width":"","force_full_width":"off","next_slide_on_window_focus":"off","disable_focus_listener":"off","def-layer_selection":"off","slider_id":"","delay":"12000","start_js_after_delay":"0","def-slide_transition":"fade","def-transition_duration":"300","def-image_source_type":"full","def-background_fit":"cover","def-bg_fit_x":"100","def-bg_fit_y":"100","def-bg_position":"center center","def-bg_position_x":"0","def-bg_position_y":"0","def-bg_repeat":"no-repeat","def-kenburn_effect":"off","def-kb_start_fit":"100","def-kb_easing":"Linear.easeNone","def-kb_end_fit":"100","def-kb_start_offset_x":"0","def-kb_start_offset_y":"0","def-kb_end_offset_x":"0","def-kb_end_offset_y":"0","def-kb_start_rotate":"0","def-kb_end_rotate":"0","def-kb_duration":"10000","0":"Clear","start_with_slide_enable":"off","start_with_slide":"1","first_transition_active":"off","first_transition_type":"fade","first_transition_duration":"300","first_transition_slot_amount":"7","stop_on_hover":"on","stop_slider":"off","stop_after_loops":"0","stop_at_slide":"2","shuffle":"off","loop_slide":"on","label_viewport":"off","viewport_start":"wait","viewport_area":"80","waitforinit":"off","enable_progressbar":"on","show_timerbar":"bottom","progress_height":"5","progress_opa":"15","progressbar_color":"#000000","disable_on_mobile":"off","disable_kenburns_on_mobile":"off","hide_slider_under":"0","hide_defined_layers_under":"0","hide_all_layers_under":"0","shadow_type":"0","background_dotted_overlay":"none","background_color":"transparent","padding":"0","show_background_image":"off","background_image":"http:\\/\\/demo.cms-theme.net\\/wordpress\\/3dprinting\\/wp-content\\/","bg_fit":"cover","bg_repeat":"no-repeat","bg_position":"center center","position":"center","margin_top":"0","margin_bottom":"0","margin_left":"0","margin_right":"0","use_spinner":"4","spinner_color":"#FFFFFF","enable_arrows":"on","rtl_arrows":"off","navigation_arrow_style":"round","navigation_arrows_preset":"default","ph-round-arrows-hover-bg-color-color-rgba-def":"off","ph-round-arrows-hover-bg-color-color-rgba":"#000000","ph-round-arrows-arrow-size-custom-def":"off","ph-round-arrows-arrow-size-custom":"20","ph-round-arrows-arrow-color-color-def":"off","ph-round-arrows-arrow-color-color":"#ffffff","ph-round-arrows-bg-size-custom-def":"off","ph-round-arrows-bg-size-custom":"40","ph-round-arrows-bg-color-custom-def":"off","ph-round-arrows-bg-color-custom":"0,0,0,0.5","arrows_always_on":"false","hide_arrows":"200","hide_arrows_mobile":"1200","hide_arrows_on_mobile":"off","arrows_under_hidden":"0","hide_arrows_over":"off","arrows_over_hidden":"0","leftarrow_align_hor":"left","leftarrow_align_vert":"center","leftarrow_offset_hor":"20","leftarrow_offset_vert":"0","leftarrow_position":"slider","rightarrow_align_hor":"right","rightarrow_align_vert":"center","rightarrow_offset_hor":"20","rightarrow_offset_vert":"0","rightarrow_position":"slider","enable_bullets":"off","rtl_bullets":"off","navigation_bullets_style":"round","navigation_bullets_preset":"default","ph-round-bullets-hover-bullet-bg-color-def":"off","ph-round-bullets-hover-bullet-bg-color":"#666666","ph-round-bullets-border-size-custom-def":"off","ph-round-bullets-border-size-custom":"3","ph-round-bullets-border-color-color-def":"off","ph-round-bullets-border-color-color":"#e5e5e5","ph-round-bullets-bullet-bg-bottom-color-def":"off","ph-round-bullets-bullet-bg-bottom-color":"#e1e1e1","ph-round-bullets-bullet-bg-top-color-def":"off","ph-round-bullets-bullet-bg-top-color":"#999999","ph-round-bullets-bullet-size-custom-def":"off","ph-round-bullets-bullet-size-custom":"12","bullets_space":"5","bullets_direction":"horizontal","bullets_always_on":"false","hide_bullets":"200","hide_bullets_mobile":"1200","hide_bullets_on_mobile":"off","bullets_under_hidden":"0","hide_bullets_over":"off","bullets_over_hidden":"0","bullets_align_hor":"center","bullets_align_vert":"bottom","bullets_offset_hor":"0","bullets_offset_vert":"20","bullets_position":"slider","enable_thumbnails":"off","rtl_thumbnails":"off","thumbnails_padding":"5","span_thumbnails_wrapper":"off","thumbnails_wrapper_color":"transparent","thumbnails_wrapper_opacity":"100","thumbnails_style":"round","navigation_thumbs_preset":"default","ph-round-thumbs-title-font-size-custom-def":"off","ph-round-thumbs-title-font-size-custom":"12","ph-round-thumbs-title-color-color-rgba-def":"off","ph-round-thumbs-title-color-color-rgba":"#ffffff","ph-round-thumbs-title-bg-color-rgba-def":"off","ph-round-thumbs-title-bg-color-rgba":"rgba(0,0,0,0.85)","thumb_amount":"5","thumbnails_space":"5","thumbnail_direction":"horizontal","thumb_width":"100","thumb_height":"50","thumb_width_min":"100","thumbs_always_on":"false","hide_thumbs":"200","hide_thumbs_mobile":"1200","hide_thumbs_on_mobile":"off","thumbs_under_hidden":"0","hide_thumbs_over":"off","thumbs_over_hidden":"0","thumbnails_inner_outer":"inner","thumbnails_align_hor":"center","thumbnails_align_vert":"bottom","thumbnails_offset_hor":"0","thumbnails_offset_vert":"20","thumbnails_position":"slider","enable_tabs":"off","rtl_tabs":"off","tabs_padding":"5","span_tabs_wrapper":"off","tabs_wrapper_color":"transparent","tabs_wrapper_opacity":"5","tabs_style":"round","navigation_tabs_preset":"default","ph-round-tabs-param2-size-custom-def":"off","ph-round-tabs-param2-size-custom":"14","ph-round-tabs-param2-color-color-rgba-def":"off","ph-round-tabs-param2-color-color-rgba":"0,0,0,0","ph-round-tabs-contentcolor-color-rgba-def":"off","ph-round-tabs-contentcolor-color-rgba":"#333333","ph-round-tabs-bgcolor-color-rgba-def":"off","ph-round-tabs-bgcolor-color-rgba":"rgba(0,0,0,0)","ph-round-tabs-hover-bg-color-color-rgba-def":"off","ph-round-tabs-hover-bg-color-color-rgba":"#eeeeee","ph-round-tabs-param1-size-custom-def":"off","ph-round-tabs-param1-size-custom":"12","ph-round-tabs-param1-color-color-rgba-def":"off","ph-round-tabs-param1-color-color-rgba":"rgba(51,51,51,0.5)","ph-round-tabs-image-size-custom-def":"off","ph-round-tabs-image-size-custom":"60","ph-round-tabs-border-size-custom-def":"off","ph-round-tabs-border-size-custom":"1","ph-round-tabs-border-color-color-rgba-def":"off","ph-round-tabs-border-color-color-rgba":"#e5e5e5","ph-round-tabs-font-family-font_family-def":"off","ph-round-tabs-font-family-font_family":"Roboto","tabs_amount":"5","tabs_space":"5","tabs_direction":"horizontal","tabs_width":"100","tabs_height":"50","tabs_width_min":"100","tabs_always_on":"false","hide_tabs":"200","hide_tabs_mobile":"1200","hide_tabs_on_mobile":"off","tabs_under_hidden":"0","hide_tabs_over":"off","tabs_over_hidden":"0","tabs_inner_outer":"inner","tabs_align_hor":"center","tabs_align_vert":"bottom","tabs_offset_hor":"0","tabs_offset_vert":"20","tabs_position":"slider","touchenabled":"on","drag_block_vertical":"off","swipe_velocity":"75","swipe_min_touches":"50","swipe_direction":"horizontal","keyboard_navigation":"off","keyboard_direction":"horizontal","mousescroll_navigation":"off","mousescroll_navigation_reverse":"default","previewimage_width":"100","previewimage_height":"50","carousel_infinity":"off","carousel_space":"0","carousel_borderr":"0","carousel_borderr_unit":"px","carousel_padding_top":"0","carousel_padding_bottom":"0","carousel_maxitems":"3","carousel_stretch":"off","carousel_fadeout":"on","carousel_varyfade":"off","carousel_rotation":"off","carousel_varyrotate":"off","carousel_maxrotation":"0","carousel_scale":"off","carousel_varyscale":"off","carousel_scaledown":"50","carousel_hposition":"center","carousel_vposition":"center","use_parallax":"off","disable_parallax_mobile":"off","ddd_parallax":"off","ddd_parallax_shadow":"off","ddd_parallax_bgfreeze":"off","ddd_parallax_overflow":"off","ddd_parallax_layer_overflow":"off","ddd_parallax_zcorrection":"65","parallax_type":"mouse","parallax_origo":"enterpoint","parallax_speed":"400","parallax_level_16":"55","parallax_level_1":"5","parallax_level_2":"10","parallax_level_3":"15","parallax_level_4":"20","parallax_level_5":"25","parallax_level_6":"30","parallax_level_7":"35","parallax_level_8":"40","parallax_level_9":"45","parallax_level_10":"46","parallax_level_11":"47","parallax_level_12":"48","parallax_level_13":"49","parallax_level_14":"50","parallax_level_15":"51","lazy_load_type":"none","simplify_ie8_ios4":"off","show_alternative_type":"off","show_alternate_image":"","jquery_noconflict":"off","js_to_body":"false","output_type":"none","jquery_debugmode":"off","custom_css":"","custom_javascript":""}', '{"version":5}', ''),
(2, 'home2', 'home2', '{"hero_active":"-1","source_type":"gallery","instagram-count":"","instagram-transient":"1200","instagram-access-token":"","instagram-type":"user","instagram-user-id":"","instagram-hash-tag":"","flickr-count":"","flickr-transient":"1200","flickr-api-key":"","flickr-type":"publicphotos","flickr-user-url":"","flickr-photoset":"","flickr-photoset-select":"","flickr-gallery-url":"","flickr-group-url":"","facebook-count":"","facebook-transient":"1200","facebook-page-url":"","facebook-type-source":"album","facebook-album":"","facebook-album-select":"","facebook-app-id":"","facebook-app-secret":"","twitter-count":"","twitter-transient":"1200","twitter-user-id":"","twitter-image-only":"off","twitter-include-retweets":"off","twitter-exclude-replies":"off","twitter-consumer-key":"","twitter-consumer-secret":"","twitter-access-token":"","twitter-access-secret":"","youtube-count":"","youtube-transient":"1200","youtube-api":"","youtube-channel-id":"","youtube-type-source":"channel","youtube-playlist":"","youtube-playlist-select":"","vimeo-count":"","vimeo-transient":"1200","vimeo-type-source":"user","vimeo-username":"","vimeo-groupname":"","vimeo-albumid":"","vimeo-channelname":"","product_types":"product","product_category":"","posts_list":"","fetch_type":"cat_tag","post_types":"post","post_category":"","product_sortby":"ID","product_sort_direction":"DESC","max_slider_products":"30","excerpt_limit_product":"55","reg_price_from":"","reg_price_to":"","sale_price_from":"","sale_price_to":"","instock_only":"off","featured_only":"off","post_sortby":"ID","posts_sort_direction":"DESC","max_slider_posts":"30","excerpt_limit":"55","title":"home2","alias":"home2","shortcode":"[rev_slider alias=\\\\\\"home2\\\\\\"]","slider-type":"standard","slider_type":"auto","width":"1170","height":"700","width_notebook":"1024","height_notebook":"768","enable_custom_size_notebook":"on","width_tablet":"778","height_tablet":"960","enable_custom_size_tablet":"on","width_mobile":"480","height_mobile":"720","enable_custom_size_iphone":"on","full_screen_align_force":"off","fullscreen_min_height":"","autowidth_force":"off","fullscreen_offset_container":"","fullscreen_offset_size":"","main_overflow_hidden":"off","auto_height":"off","min_height":"","max_width":"","force_full_width":"off","next_slide_on_window_focus":"off","disable_focus_listener":"off","def-layer_selection":"off","slider_id":"","delay":"12000","start_js_after_delay":"0","def-slide_transition":"fade","def-transition_duration":"300","def-image_source_type":"full","def-background_fit":"cover","def-bg_fit_x":"100","def-bg_fit_y":"100","def-bg_position":"center center","def-bg_position_x":"0","def-bg_position_y":"0","def-bg_repeat":"no-repeat","def-kenburn_effect":"off","def-kb_start_fit":"100","def-kb_easing":"Linear.easeNone","def-kb_end_fit":"100","def-kb_start_offset_x":"0","def-kb_start_offset_y":"0","def-kb_end_offset_x":"0","def-kb_end_offset_y":"0","def-kb_start_rotate":"0","def-kb_end_rotate":"0","def-kb_duration":"10000","0":"blank","start_with_slide_enable":"off","start_with_slide":"1","first_transition_active":"off","first_transition_type":"fade","first_transition_duration":"300","first_transition_slot_amount":"7","stop_on_hover":"on","stop_slider":"off","stop_after_loops":"0","stop_at_slide":"2","shuffle":"off","loop_slide":"on","label_viewport":"off","viewport_start":"wait","viewport_area":"80","waitforinit":"off","enable_progressbar":"on","show_timerbar":"bottom","progress_height":"5","progress_opa":"15","progressbar_color":"#000000","disable_on_mobile":"off","disable_kenburns_on_mobile":"off","hide_slider_under":"0","hide_defined_layers_under":"0","hide_all_layers_under":"0","shadow_type":"0","background_dotted_overlay":"none","background_color":"transparent","padding":"0","show_background_image":"off","background_image":"http:\\/\\/demo.cms-theme.net\\/wordpress\\/3dprinting\\/wp-content\\/","bg_fit":"cover","bg_repeat":"no-repeat","bg_position":"center center","position":"center","margin_top":"0","margin_bottom":"0","margin_left":"0","margin_right":"0","use_spinner":"4","spinner_color":"#FFFFFF","enable_arrows":"on","rtl_arrows":"off","navigation_arrow_style":"custom","navigation_arrows_preset":"default","arrows_always_on":"false","hide_arrows":"200","hide_arrows_mobile":"1200","hide_arrows_on_mobile":"off","arrows_under_hidden":"0","hide_arrows_over":"off","arrows_over_hidden":"0","leftarrow_align_hor":"left","leftarrow_align_vert":"center","leftarrow_offset_hor":"20","leftarrow_offset_vert":"0","leftarrow_position":"slider","rightarrow_align_hor":"right","rightarrow_align_vert":"center","rightarrow_offset_hor":"20","rightarrow_offset_vert":"0","rightarrow_position":"slider","enable_bullets":"off","rtl_bullets":"off","navigation_bullets_style":"round","navigation_bullets_preset":"default","ph-round-bullets-hover-bullet-bg-color-def":"off","ph-round-bullets-hover-bullet-bg-color":"#666666","ph-round-bullets-border-size-custom-def":"off","ph-round-bullets-border-size-custom":"3","ph-round-bullets-border-color-color-def":"off","ph-round-bullets-border-color-color":"#e5e5e5","ph-round-bullets-bullet-bg-bottom-color-def":"off","ph-round-bullets-bullet-bg-bottom-color":"#e1e1e1","ph-round-bullets-bullet-bg-top-color-def":"off","ph-round-bullets-bullet-bg-top-color":"#999999","ph-round-bullets-bullet-size-custom-def":"off","ph-round-bullets-bullet-size-custom":"12","bullets_space":"5","bullets_direction":"horizontal","bullets_always_on":"false","hide_bullets":"200","hide_bullets_mobile":"1200","hide_bullets_on_mobile":"off","bullets_under_hidden":"0","hide_bullets_over":"off","bullets_over_hidden":"0","bullets_align_hor":"center","bullets_align_vert":"bottom","bullets_offset_hor":"0","bullets_offset_vert":"20","bullets_position":"slider","enable_thumbnails":"off","rtl_thumbnails":"off","thumbnails_padding":"5","span_thumbnails_wrapper":"off","thumbnails_wrapper_color":"transparent","thumbnails_wrapper_opacity":"100","thumbnails_style":"round","navigation_thumbs_preset":"default","ph-round-thumbs-title-font-size-custom-def":"off","ph-round-thumbs-title-font-size-custom":"12","ph-round-thumbs-title-color-color-rgba-def":"off","ph-round-thumbs-title-color-color-rgba":"#ffffff","ph-round-thumbs-title-bg-color-rgba-def":"off","ph-round-thumbs-title-bg-color-rgba":"rgba(0,0,0,0.85)","thumb_amount":"5","thumbnails_space":"5","thumbnail_direction":"horizontal","thumb_width":"100","thumb_height":"50","thumb_width_min":"100","thumbs_always_on":"false","hide_thumbs":"200","hide_thumbs_mobile":"1200","hide_thumbs_on_mobile":"off","thumbs_under_hidden":"0","hide_thumbs_over":"off","thumbs_over_hidden":"0","thumbnails_inner_outer":"inner","thumbnails_align_hor":"center","thumbnails_align_vert":"bottom","thumbnails_offset_hor":"0","thumbnails_offset_vert":"20","thumbnails_position":"slider","enable_tabs":"off","rtl_tabs":"off","tabs_padding":"5","span_tabs_wrapper":"off","tabs_wrapper_color":"transparent","tabs_wrapper_opacity":"5","tabs_style":"round","navigation_tabs_preset":"default","ph-round-tabs-param2-size-custom-def":"off","ph-round-tabs-param2-size-custom":"14","ph-round-tabs-param2-color-color-rgba-def":"off","ph-round-tabs-param2-color-color-rgba":"0,0,0,0","ph-round-tabs-contentcolor-color-rgba-def":"off","ph-round-tabs-contentcolor-color-rgba":"#333333","ph-round-tabs-bgcolor-color-rgba-def":"off","ph-round-tabs-bgcolor-color-rgba":"rgba(0,0,0,0)","ph-round-tabs-hover-bg-color-color-rgba-def":"off","ph-round-tabs-hover-bg-color-color-rgba":"#eeeeee","ph-round-tabs-param1-size-custom-def":"off","ph-round-tabs-param1-size-custom":"12","ph-round-tabs-param1-color-color-rgba-def":"off","ph-round-tabs-param1-color-color-rgba":"rgba(51,51,51,0.5)","ph-round-tabs-image-size-custom-def":"off","ph-round-tabs-image-size-custom":"60","ph-round-tabs-border-size-custom-def":"off","ph-round-tabs-border-size-custom":"1","ph-round-tabs-border-color-color-rgba-def":"off","ph-round-tabs-border-color-color-rgba":"#e5e5e5","ph-round-tabs-font-family-font_family-def":"off","ph-round-tabs-font-family-font_family":"Roboto","tabs_amount":"5","tabs_space":"5","tabs_direction":"horizontal","tabs_width":"100","tabs_height":"50","tabs_width_min":"100","tabs_always_on":"false","hide_tabs":"200","hide_tabs_mobile":"1200","hide_tabs_on_mobile":"off","tabs_under_hidden":"0","hide_tabs_over":"off","tabs_over_hidden":"0","tabs_inner_outer":"inner","tabs_align_hor":"center","tabs_align_vert":"bottom","tabs_offset_hor":"0","tabs_offset_vert":"20","tabs_position":"slider","touchenabled":"on","drag_block_vertical":"off","swipe_velocity":"75","swipe_min_touches":"50","swipe_direction":"horizontal","keyboard_navigation":"off","keyboard_direction":"horizontal","mousescroll_navigation":"off","mousescroll_navigation_reverse":"default","previewimage_width":"100","previewimage_height":"50","carousel_infinity":"off","carousel_space":"0","carousel_borderr":"0","carousel_borderr_unit":"px","carousel_padding_top":"0","carousel_padding_bottom":"0","carousel_maxitems":"3","carousel_stretch":"off","carousel_fadeout":"on","carousel_varyfade":"off","carousel_rotation":"off","carousel_varyrotate":"off","carousel_maxrotation":"0","carousel_scale":"off","carousel_varyscale":"off","carousel_scaledown":"50","carousel_hposition":"center","carousel_vposition":"center","use_parallax":"off","disable_parallax_mobile":"off","ddd_parallax":"off","ddd_parallax_shadow":"off","ddd_parallax_bgfreeze":"off","ddd_parallax_overflow":"off","ddd_parallax_layer_overflow":"off","ddd_parallax_zcorrection":"65","parallax_type":"mouse","parallax_origo":"enterpoint","parallax_speed":"400","parallax_level_16":"55","parallax_level_1":"5","parallax_level_2":"10","parallax_level_3":"15","parallax_level_4":"20","parallax_level_5":"25","parallax_level_6":"30","parallax_level_7":"35","parallax_level_8":"40","parallax_level_9":"45","parallax_level_10":"46","parallax_level_11":"47","parallax_level_12":"48","parallax_level_13":"49","parallax_level_14":"50","parallax_level_15":"51","lazy_load_type":"none","simplify_ie8_ios4":"off","show_alternative_type":"off","show_alternate_image":"","jquery_noconflict":"off","js_to_body":"false","output_type":"none","jquery_debugmode":"off","custom_css":"","custom_javascript":""}', '{"version":5}', '');

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_slides`
--

DROP TABLE IF EXISTS `wp_revslider_slides`;
CREATE TABLE IF NOT EXISTS `wp_revslider_slides` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `slider_id` int(9) NOT NULL,
  `slide_order` int(11) NOT NULL,
  `params` longtext NOT NULL,
  `layers` longtext NOT NULL,
  `settings` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `wp_revslider_slides`
--

INSERT INTO `wp_revslider_slides` (`id`, `slider_id`, `slide_order`, `params`, `layers`, `settings`) VALUES
(1, 1, 2, '{"background_type":"image","rs-gallery-type":"gallery","bg_external":"","bg_color":"#E7E7E7","0":"Clear","slide_bg_youtube":"","slide_bg_vimeo":"","slide_bg_html_mpeg":"","slide_bg_html_webm":"","slide_bg_html_ogv":"","image_source_type":"full","alt_option":"media_library","alt_attr":"","ext_width":"1920","ext_height":"1080","video_force_cover":"on","video_dotted_overlay":"none","video_ratio":"16:9","video_start_at":"","video_end_at":"","video_loop":"none","video_nextslide":"off","video_force_rewind":"on","video_mute":"on","video_volume":"","video_speed":"1","video_arguments":"hd=1&wmode=opaque&showinfo=0&rel=0;","video_arguments_vim":"title=0&byline=0&portrait=0&api=1","bg_fit":"cover","bg_fit_x":"100","bg_fit_y":"100","bg_position":"center center","bg_position_x":"0","bg_position_y":"0","bg_repeat":"no-repeat","kenburn_effect":"off","kb_start_fit":"100","kb_end_fit":"100","kb_start_offset_x":"0","kb_end_offset_x":"0","kb_start_offset_y":"0","kb_end_offset_y":"0","kb_start_rotate":"0","kb_end_rotate":"0","kb_easing":"Linear.easeNone","kb_duration":"10000","title":"Slide","delay":"","state":"published","hideslideafter":"0","date_from":"","date_to":"","save_performance":"off","slide_thumb":"http:\\/\\/demo.cms-theme.net\\/wordpress\\/3dprinting\\/wp-content\\/","thumb_dimension":"slider","thumb_for_admin":"off","slide_transition":["fade"],"slot_amount":["default"],"transition_rotation":["0"],"transition_duration":["300"],"transition_ease_in":["default"],"transition_ease_out":["default"],"params_1":"","params_1_chars":"10","params_2":"","params_2_chars":"10","params_3":"","params_3_chars":"10","params_4":"","params_4_chars":"10","params_5":"","params_5_chars":"10","params_6":"","params_6_chars":"10","params_7":"","params_7_chars":"10","params_8":"","params_8_chars":"10","params_9":"","params_9_chars":"10","params_10":"","params_10_chars":"10","slide_description":"","class_attr":"","id_attr":"","data_attr":"","enable_link":"false","link_type":"regular","link":"","link_open_in":"same","slide_link":"nothing","link_pos":"front","slide_bg_color":"#E7E7E7","slide_bg_external":"","image":"http:\\/\\/demo.cms-theme.net\\/wordpress\\/3dprinting\\/wp-content\\/uploads\\/2016\\/06\\/3dprinting-slider-home1.jpg","title_option":"media_library","title_attr":"","stoponpurpose":"false","invisibleslide":"false","hideslideonmobile":"off","ph-round-arrows-bg-color-custom-slide":"off","ph-round-arrows-bg-color-custom":"0,0,0,0.5","ph-round-arrows-bg-size-custom-slide":"off","ph-round-arrows-bg-size-custom":"40","ph-round-arrows-arrow-color-color-slide":"off","ph-round-arrows-arrow-color-color":"#ffffff","ph-round-arrows-arrow-size-custom-slide":"off","ph-round-arrows-arrow-size-custom":"20","ph-round-arrows-hover-bg-color-color-rgba-slide":"off","ph-round-arrows-hover-bg-color-color-rgba":"#000000","ph-round-bullets-bullet-size-custom-slide":"off","ph-round-bullets-bullet-size-custom":"12","ph-round-bullets-bullet-bg-top-color-slide":"off","ph-round-bullets-bullet-bg-top-color":"#999999","ph-round-bullets-bullet-bg-bottom-color-slide":"off","ph-round-bullets-bullet-bg-bottom-color":"#e1e1e1","ph-round-bullets-border-color-color-slide":"off","ph-round-bullets-border-color-color":"#e5e5e5","ph-round-bullets-border-size-custom-slide":"off","ph-round-bullets-border-size-custom":"3","ph-round-bullets-hover-bullet-bg-color-slide":"off","ph-round-bullets-hover-bullet-bg-color":"#666666","ph-round-tabs-font-family-font_family-slide":"off","ph-round-tabs-font-family-font_family":"Roboto","ph-round-tabs-border-color-color-rgba-slide":"off","ph-round-tabs-border-color-color-rgba":"#e5e5e5","ph-round-tabs-border-size-custom-slide":"off","ph-round-tabs-border-size-custom":"1","ph-round-tabs-image-size-custom-slide":"off","ph-round-tabs-image-size-custom":"60","ph-round-tabs-param1-color-color-rgba-slide":"off","ph-round-tabs-param1-color-color-rgba":"rgba(51,51,51,0.5)","ph-round-tabs-param1-size-custom-slide":"off","ph-round-tabs-param1-size-custom":"12","ph-round-tabs-hover-bg-color-color-rgba-slide":"off","ph-round-tabs-hover-bg-color-color-rgba":"#eeeeee","ph-round-tabs-bgcolor-color-rgba-slide":"off","ph-round-tabs-bgcolor-color-rgba":"rgba(0,0,0,0)","ph-round-tabs-contentcolor-color-rgba-slide":"off","ph-round-tabs-contentcolor-color-rgba":"#333333","ph-round-tabs-param2-color-color-rgba-slide":"off","ph-round-tabs-param2-color-color-rgba":"0,0,0,0","ph-round-tabs-param2-size-custom-slide":"off","ph-round-tabs-param2-size-custom":"14","ph-round-thumbs-title-bg-color-rgba-slide":"off","ph-round-thumbs-title-bg-color-rgba":"rgba(0,0,0,0.85)","ph-round-thumbs-title-color-color-rgba-slide":"off","ph-round-thumbs-title-color-color-rgba":"#ffffff","ph-round-thumbs-title-font-size-custom-slide":"off","ph-round-thumbs-title-font-size-custom":"12","image_id":"631","0":"Clear"}', '[{"text":"WE ARE HERE","type":"text","special_type":null,"subtype":"","specialsettings":{},"unique_id":1,"left":{"desktop":0,"mobile":0},"top":{"desktop":235,"mobile":200},"internal_class":"","hover":false,"alias":"We Are Here","loop_animation":"none","loop_easing":"linearEaseNone","loop_speed":"2","loop_startdeg":-20,"loop_enddeg":20,"loop_xorigin":50,"loop_yorigin":50,"loop_xstart":0,"loop_xend":0,"loop_ystart":0,"loop_yend":0,"loop_zoomstart":"1","loop_zoomend":"1","loop_angle":"0","loop_radius":"10","html_tag":"div","mask_start":true,"mask_end":false,"x_start_reverse":false,"y_start_reverse":false,"x_end_reverse":false,"y_end_reverse":false,"x_rotate_start_reverse":false,"y_rotate_start_reverse":false,"z_rotate_start_reverse":false,"x_rotate_end_reverse":false,"y_rotate_end_reverse":false,"z_rotate_end_reverse":false,"scale_x_start_reverse":false,"scale_y_start_reverse":false,"scale_x_end_reverse":false,"scale_y_end_reverse":false,"skew_x_start_reverse":false,"skew_y_start_reverse":false,"skew_x_end_reverse":false,"skew_y_end_reverse":false,"mask_x_start_reverse":false,"mask_y_start_reverse":false,"mask_x_end_reverse":false,"mask_y_end_reverse":false,"mask_x_start":"0px","mask_y_start":"0px","mask_x_end":"0","mask_y_end":"0","mask_speed_end":"inherit","mask_ease_end":"inherit","alt_option":"media_library","alt":"","animation":"SlideMaskFromLeft","easing":"Power3.easeInOut","split":"none","endsplit":"none","splitdelay":"10","endsplitdelay":"10","max_height":{"desktop":"auto","mobile":"auto"},"max_width":{"desktop":"auto","mobile":"auto"},"video_width":{"desktop":"480","mobile":"480"},"video_height":{"desktop":"360","mobile":"360"},"2d_origin_x":50,"2d_origin_y":50,"whitespace":{"desktop":"nowrap","mobile":"nowrap"},"static_end":"last","speed":1500,"align_hor":{"desktop":"center","mobile":"center"},"align_vert":{"desktop":"top","mobile":"top"},"hiddenunder":false,"resizeme":true,"seo-optimized":false,"link_slide":"nothing","scrollunder_offset":"","style":"","visible-desktop":true,"visible-notebook":true,"visible-tablet":true,"visible-mobile":true,"resize-full":true,"show-on-hover":false,"basealign":"grid","responsive_offset":true,"lazy-load":"auto","image-size":"auto","time":0,"endspeed":500,"endtime":12500,"endanimation":"fadeout","endeasing":"Back.easeIn","width":188,"height":22,"cover_mode":"custom","static_styles":{"font-size":{"desktop":"30px","mobile":"30px"},"line-height":{"desktop":"30px","mobile":"30px"},"font-weight":{"desktop":"400","mobile":"400"},"color":{"desktop":"#ffffff","mobile":"#ffffff"}},"x_start":"[-100%]","y_start":"inherit","z_start":"0","x_end":"inherit","y_end":"inherit","z_end":"inherit","opacity_start":"inherit","opacity_end":"0","x_rotate_start":"0deg","y_rotate_start":"0","z_rotate_start":"0","x_rotate_end":"inherit","y_rotate_end":"inherit","z_rotate_end":"inherit","scale_x_start":"1","scale_y_start":"1","scale_x_end":"inherit","scale_y_end":"inherit","skew_x_start":"0","skew_y_start":"0","skew_x_end":"inherit","skew_y_end":"inherit","x_origin_start":"50","y_origin_start":"50","x_origin_end":"50","y_origin_end":"50","deformation":{"font-family":"","padding":["0","0","0","0"],"font-style":"normal","color-transparency":"1","text-decoration":"none","text-align":"left","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"x":0,"y":0,"z":0,"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":0,"yrotate":0,"2d_origin_x":"50","2d_origin_y":"50","pers":"600","corner_left":"nothing","corner_right":"nothing","text-transform":"none","parallax":"-"},"2d_rotation":0,"deformation-hover":{"color":"#000000","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0px","0px","0px","0px"],"x":0,"y":0,"z":0,"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":0,"yrotate":0,"2d_rotation":0,"2d_origin_x":50,"2d_origin_y":50,"speed":"0","easing":"Linear.easeNone","css_cursor":"auto"},"visible":true,"animation_overwrite":"wait","trigger_memory":"keep","serial":0,"endWithSlide":true,"toggle":false,"toggle_use_hover":false,"texttoggle":"","scaleX":{"desktop":"","mobile":""},"scaleY":{"desktop":"","mobile":""},"autolinebreak":false,"scaleProportional":false,"attrID":"","attrClasses":"zo-extra-font2","attrTitle":"","attrRel":"","layer-selectable":"default","svg":{"svgstroke-color":"transparent","svgstroke-transparency":"1","svgstroke-dasharray":"0","svgstroke-dashoffset":"0","svgstroke-width":"0","svgstroke-hover-color":"transparent","svgstroke-hover-transparency":"1","svgstroke-hover-dasharray":"0","svgstroke-hover-dashoffset":"0","svgstroke-hover-width":"0"},"split_in_extratime":-10,"split_out_extratime":-10,"inline":{"idle":{"letter-spacing":"0.1em"}},"static_start":"1","layer_action":{"tooltip_event":[],"action":[],"image_link":[],"link_open_in":[],"jump_to_slide":[],"scrollunder_offset":[],"actioncallback":[],"layer_target":[],"link_type":[],"action_delay":[],"toggle_layer_type":[],"toggle_class":[]},"parallax_layer_ddd_zlevel":"front","mask_speed_start":"inherit","mask_ease_start":"inherit","link":"","link_open_in":"same","pers_start":"inherit","pers_end":"inherit"},{"text":"TO MAKE ANYTHING YOU WANT","type":"text","special_type":null,"subtype":"","specialsettings":{},"unique_id":2,"left":{"desktop":0,"mobile":0},"top":{"desktop":295,"mobile":260},"internal_class":"","hover":false,"alias":"to make anything you...","loop_animation":"none","loop_easing":"linearEaseNone","loop_speed":"2","loop_startdeg":-20,"loop_enddeg":20,"loop_xorigin":50,"loop_yorigin":50,"loop_xstart":0,"loop_xend":0,"loop_ystart":0,"loop_yend":0,"loop_zoomstart":"1","loop_zoomend":"1","loop_angle":"0","loop_radius":"10","html_tag":"div","mask_start":true,"mask_end":false,"x_start_reverse":false,"y_start_reverse":false,"x_end_reverse":false,"y_end_reverse":false,"x_rotate_start_reverse":false,"y_rotate_start_reverse":false,"z_rotate_start_reverse":false,"x_rotate_end_reverse":false,"y_rotate_end_reverse":false,"z_rotate_end_reverse":false,"scale_x_start_reverse":false,"scale_y_start_reverse":false,"scale_x_end_reverse":false,"scale_y_end_reverse":false,"skew_x_start_reverse":false,"skew_y_start_reverse":false,"skew_x_end_reverse":false,"skew_y_end_reverse":false,"mask_x_start_reverse":false,"mask_y_start_reverse":false,"mask_x_end_reverse":false,"mask_y_end_reverse":false,"mask_x_start":"0px","mask_y_start":"0px","mask_x_end":"0","mask_y_end":"0","mask_speed_end":"inherit","mask_ease_end":"inherit","alt_option":"media_library","alt":"","animation":"SlideMaskFromRight","easing":"Power3.easeInOut","split":"none","endsplit":"none","splitdelay":"10","endsplitdelay":"10","max_height":{"desktop":"auto","mobile":"auto"},"max_width":{"desktop":"1170px","mobile":"450px"},"video_width":{"desktop":"480","mobile":"480"},"video_height":{"desktop":"360","mobile":"360"},"2d_origin_x":50,"2d_origin_y":50,"whitespace":{"desktop":"normal","mobile":"normal"},"static_end":"last","speed":1500,"align_hor":{"desktop":"center","mobile":"center"},"align_vert":{"desktop":"top","mobile":"top"},"hiddenunder":false,"resizeme":true,"seo-optimized":false,"link_slide":"nothing","scrollunder_offset":"","style":"","visible-desktop":true,"visible-notebook":true,"visible-tablet":true,"visible-mobile":true,"resize-full":true,"show-on-hover":false,"basealign":"grid","responsive_offset":true,"lazy-load":"auto","image-size":"auto","time":0,"endspeed":500,"endtime":12500,"endanimation":"fadeout","endeasing":"nothing","width":1170,"height":50,"cover_mode":"custom","static_styles":{"font-size":{"desktop":"50px","mobile":"35px"},"line-height":{"desktop":"50px","mobile":"35px"},"font-weight":{"desktop":"400","mobile":"400"},"color":{"desktop":"#ffffff","mobile":"#ffffff"}},"x_start":"[100%]","y_start":"inherit","z_start":"0","x_end":"inherit","y_end":"inherit","z_end":"inherit","opacity_start":"inherit","opacity_end":"0","x_rotate_start":"0deg","y_rotate_start":"0","z_rotate_start":"0","x_rotate_end":"inherit","y_rotate_end":"inherit","z_rotate_end":"inherit","scale_x_start":"1","scale_y_start":"1","scale_x_end":"inherit","scale_y_end":"inherit","skew_x_start":"0","skew_y_start":"0","skew_x_end":"inherit","skew_y_end":"inherit","x_origin_start":"50","y_origin_start":"50","x_origin_end":"50","y_origin_end":"50","deformation":{"font-family":"","padding":["0","0","0","0"],"font-style":"normal","color-transparency":"1","text-decoration":"none","text-align":"center","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"x":0,"y":0,"z":0,"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":0,"yrotate":0,"2d_origin_x":"50","2d_origin_y":"50","pers":"600","corner_left":"nothing","corner_right":"nothing","text-transform":"none"},"2d_rotation":0,"deformation-hover":{"color":"#000000","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0px","0px","0px","0px"],"x":0,"y":0,"z":0,"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":0,"yrotate":0,"2d_rotation":0,"2d_origin_x":50,"2d_origin_y":50,"speed":"0","easing":"Linear.easeNone","css_cursor":"auto"},"visible":true,"animation_overwrite":"wait","trigger_memory":"keep","serial":1,"endWithSlide":true,"toggle":false,"toggle_use_hover":false,"texttoggle":"","scaleX":{"desktop":"","mobile":""},"scaleY":{"desktop":"","mobile":""},"autolinebreak":true,"scaleProportional":false,"attrID":"","attrClasses":"zo-extra-font2","attrTitle":"","attrRel":"","layer-selectable":"default","svg":{"svgstroke-color":"transparent","svgstroke-transparency":"1","svgstroke-dasharray":"0","svgstroke-dashoffset":"0","svgstroke-width":"0","svgstroke-hover-color":"transparent","svgstroke-hover-transparency":"1","svgstroke-hover-dasharray":"0","svgstroke-hover-dashoffset":"0","svgstroke-hover-width":"0"},"split_in_extratime":-10,"split_out_extratime":-10,"inline":{"idle":{"letter-spacing":"0.1em"}},"static_start":"1","layer_action":{"tooltip_event":[],"action":[],"image_link":[],"link_open_in":[],"jump_to_slide":[],"scrollunder_offset":[],"actioncallback":[],"layer_target":[],"link_type":[],"action_delay":[],"toggle_layer_type":[],"toggle_class":[]}},{"style":"","text":"Image 6","type":"image","image_url":"http:\\/\\/demo.cms-theme.net\\/wordpress\\/3dprinting\\/wp-content\\/uploads\\/revslider\\/slide-home\\/3dprinting-icon-down.png","scaleX":{"desktop":"26px","mobile":"26px"},"scaleY":{"desktop":"36px","mobile":"36px"},"originalWidth":26,"originalHeight":36,"special_type":null,"subtype":"","specialsettings":{},"unique_id":6,"left":{"desktop":0,"mobile":0},"top":{"desktop":581,"mobile":581},"internal_class":"","hover":false,"alias":"image 6","loop_animation":"none","loop_easing":"linearEaseNone","loop_speed":"2","loop_startdeg":-20,"loop_enddeg":20,"loop_xorigin":50,"loop_yorigin":50,"loop_xstart":0,"loop_xend":0,"loop_ystart":0,"loop_yend":0,"loop_zoomstart":"1","loop_zoomend":"1","loop_angle":"0","loop_radius":"10","html_tag":"div","mask_start":false,"mask_end":false,"x_start_reverse":false,"y_start_reverse":false,"x_end_reverse":false,"y_end_reverse":false,"x_rotate_start_reverse":false,"y_rotate_start_reverse":false,"z_rotate_start_reverse":false,"x_rotate_end_reverse":false,"y_rotate_end_reverse":false,"z_rotate_end_reverse":false,"scale_x_start_reverse":false,"scale_y_start_reverse":false,"scale_x_end_reverse":false,"scale_y_end_reverse":false,"skew_x_start_reverse":false,"skew_y_start_reverse":false,"skew_x_end_reverse":false,"skew_y_end_reverse":false,"mask_x_start_reverse":false,"mask_y_start_reverse":false,"mask_x_end_reverse":false,"mask_y_end_reverse":false,"mask_x_start":"0","mask_y_start":"0","mask_x_end":"0","mask_y_end":"0","mask_speed_end":"inherit","mask_ease_end":"inherit","alt_option":"media_library","alt":"","animation":"sfb","easing":"Power2.easeInOut","split":"none","endsplit":"none","splitdelay":"10","endsplitdelay":"10","max_height":{"desktop":"auto","mobile":"auto"},"max_width":{"desktop":"auto","mobile":"auto"},"video_width":{"desktop":"480","mobile":"480"},"video_height":{"desktop":"360","mobile":"360"},"2d_origin_x":50,"2d_origin_y":50,"whitespace":{"desktop":"nowrap","mobile":"nowrap"},"static_start":"1","static_end":"last","speed":500,"align_hor":{"desktop":"center","mobile":"center"},"align_vert":{"desktop":"top","mobile":"top"},"hiddenunder":false,"resizeme":true,"seo-optimized":false,"link_slide":"nothing","scrollunder_offset":"","visible-desktop":true,"visible-notebook":true,"visible-tablet":true,"visible-mobile":true,"resize-full":true,"show-on-hover":false,"basealign":"grid","responsive_offset":true,"lazy-load":"auto","image-size":"auto","time":0,"endspeed":300,"endtime":12300,"endanimation":"fadeout","endeasing":"nothing","width":26,"height":36,"cover_mode":"custom","static_styles":{"font-size":{"desktop":"20","mobile":"20"},"line-height":{"desktop":"22","mobile":"22"},"font-weight":{"desktop":"400","mobile":"400"},"color":{"desktop":"#ffffff","mobile":"#ffffff"}},"x_start":"inherit","y_start":"50px","z_start":"inherit","x_end":"inherit","y_end":"inherit","z_end":"inherit","opacity_start":"0","opacity_end":"0","x_rotate_start":"inherit","y_rotate_start":"inherit","z_rotate_start":"inherit","x_rotate_end":"inherit","y_rotate_end":"inherit","z_rotate_end":"inherit","scale_x_start":"inherit","scale_y_start":"inherit","scale_x_end":"inherit","scale_y_end":"inherit","skew_x_start":"inherit","skew_y_start":"inherit","skew_x_end":"inherit","skew_y_end":"inherit","x_origin_start":"50","y_origin_start":"50","x_origin_end":"50","y_origin_end":"50","deformation":{"font-family":"","padding":["0","0","0","0"],"font-style":"normal","color-transparency":"1","text-decoration":"none","text-align":"left","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"x":0,"y":0,"z":0,"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":0,"yrotate":0,"2d_origin_x":"50","2d_origin_y":"50","pers":"600","corner_left":"nothing","corner_right":"nothing","text-transform":"none","parallax":"-"},"2d_rotation":0,"deformation-hover":{"color":"#ffffff","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"0","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"x":0,"y":0,"z":0,"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":0,"yrotate":0,"2d_rotation":0,"2d_origin_x":50,"2d_origin_y":50,"speed":"0","easing":"Linear.easeNone","css_cursor":"auto"},"visible":true,"animation_overwrite":"wait","trigger_memory":"keep","serial":2,"endWithSlide":true,"toggle":false,"toggle_use_hover":false,"texttoggle":"","autolinebreak":false,"scaleProportional":false,"attrID":"","attrClasses":"","attrTitle":"","attrRel":"","layer-selectable":"default","svg":{"svgstroke-color":"transparent","svgstroke-transparency":"1","svgstroke-dasharray":"0","svgstroke-dashoffset":"0","svgstroke-width":"0","svgstroke-hover-color":"transparent","svgstroke-hover-transparency":"1","svgstroke-hover-dasharray":"0","svgstroke-hover-dashoffset":"0","svgstroke-hover-width":"0"},"split_in_extratime":-10,"split_out_extratime":-10,"layer_action":{"tooltip_event":[],"action":[],"image_link":[],"link_open_in":[],"jump_to_slide":[],"scrollunder_offset":[],"actioncallback":[],"layer_target":[],"link_type":[],"action_delay":[],"toggle_layer_type":[],"toggle_class":[]},"parallax_layer_ddd_zlevel":"front","mask_speed_start":"inherit","mask_ease_start":"inherit","link":"","link_open_in":"same","pers_start":"inherit","pers_end":"inherit"},{"text":"REQUEST A QUOTE","type":"text","special_type":null,"subtype":"","specialsettings":{},"unique_id":7,"left":{"desktop":-100,"mobile":-90},"top":{"desktop":400,"mobile":400},"internal_class":"","hover":false,"alias":"REQUEST A QUOTE","loop_animation":"none","loop_easing":"linearEaseNone","loop_speed":"2","loop_startdeg":-20,"loop_enddeg":20,"loop_xorigin":50,"loop_yorigin":50,"loop_xstart":0,"loop_xend":0,"loop_ystart":0,"loop_yend":0,"loop_zoomstart":"1","loop_zoomend":"1","loop_angle":"0","loop_radius":"10","html_tag":"div","mask_start":false,"mask_end":false,"x_start_reverse":false,"y_start_reverse":false,"x_end_reverse":false,"y_end_reverse":false,"x_rotate_start_reverse":false,"y_rotate_start_reverse":false,"z_rotate_start_reverse":false,"x_rotate_end_reverse":false,"y_rotate_end_reverse":false,"z_rotate_end_reverse":false,"scale_x_start_reverse":false,"scale_y_start_reverse":false,"scale_x_end_reverse":false,"scale_y_end_reverse":false,"skew_x_start_reverse":false,"skew_y_start_reverse":false,"skew_x_end_reverse":false,"skew_y_end_reverse":false,"mask_x_start_reverse":false,"mask_y_start_reverse":false,"mask_x_end_reverse":false,"mask_y_end_reverse":false,"mask_x_start":"0","mask_y_start":"0","mask_x_end":"0","mask_y_end":"0","mask_speed_end":"inherit","mask_ease_end":"inherit","alt_option":"media_library","alt":"","animation":"tp-fade","easing":"Power2.easeInOut","split":"none","endsplit":"none","splitdelay":"10","endsplitdelay":"10","max_height":{"desktop":"auto","mobile":"auto"},"max_width":{"desktop":"170px","mobile":"160px"},"video_width":{"desktop":"480","mobile":"480"},"video_height":{"desktop":"360","mobile":"360"},"2d_rotation":0,"2d_origin_x":50,"2d_origin_y":50,"whitespace":{"desktop":"normal","mobile":"normal"},"static_end":"last","speed":300,"align_hor":{"desktop":"center","mobile":"center"},"align_vert":{"desktop":"top","mobile":"top"},"hiddenunder":false,"resizeme":true,"seo-optimized":false,"link_slide":"nothing","scrollunder_offset":"","style":"","visible-desktop":true,"visible-notebook":true,"visible-tablet":true,"visible-mobile":true,"resize-full":true,"show-on-hover":false,"basealign":"grid","responsive_offset":true,"lazy-load":"auto","image-size":"auto","time":500,"endspeed":300,"endtime":12300,"endanimation":"fadeout","endeasing":"nothing","width":-1,"height":-1,"cover_mode":"custom","static_styles":{"font-size":{"desktop":"16px","mobile":"16px"},"line-height":{"desktop":"39px","mobile":"39px"},"font-weight":{"desktop":"400","mobile":"400"},"color":{"desktop":"#ffffff","mobile":"#ffffff"}},"x_start":"inherit","y_start":"inherit","z_start":"inherit","x_end":"inherit","y_end":"inherit","z_end":"inherit","opacity_start":"0","opacity_end":"0","x_rotate_start":"inherit","y_rotate_start":"inherit","z_rotate_start":"inherit","x_rotate_end":"inherit","y_rotate_end":"inherit","z_rotate_end":"inherit","scale_x_start":"inherit","scale_y_start":"inherit","scale_x_end":"inherit","scale_y_end":"inherit","skew_x_start":"inherit","skew_y_start":"inherit","skew_x_end":"inherit","skew_y_end":"inherit","deformation":{"font-family":"","padding":["0","0","0","0"],"font-style":"normal","color-transparency":"1","text-decoration":"none","text-align":"center","text-transform":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"x":0,"y":0,"z":0,"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":0,"yrotate":0,"2d_origin_x":"50","2d_origin_y":"50","pers":"600","corner_left":"nothing","corner_right":"nothing","parallax":"-"},"svg":{"svgstroke-color":"transparent","svgstroke-transparency":"1","svgstroke-dasharray":"0","svgstroke-dashoffset":"0","svgstroke-width":"0","svgstroke-hover-color":"transparent","svgstroke-hover-transparency":"1","svgstroke-hover-dasharray":"0","svgstroke-hover-dashoffset":"0","svgstroke-hover-width":"0"},"deformation-hover":{"color":"#000000","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0px","0px","0px","0px"],"x":0,"y":0,"z":0,"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":0,"yrotate":0,"2d_rotation":0,"2d_origin_x":50,"2d_origin_y":50,"speed":"0","easing":"Linear.easeNone","css_cursor":"auto"},"visible":true,"animation_overwrite":"wait","trigger_memory":"keep","serial":3,"split_in_extratime":-10,"split_out_extratime":-10,"endWithSlide":true,"toggle":false,"toggle_use_hover":false,"texttoggle":"","scaleX":{"desktop":"","mobile":""},"scaleY":{"desktop":"","mobile":""},"autolinebreak":true,"scaleProportional":false,"attrID":"","attrClasses":"btn btn-white","attrTitle":"","attrRel":"","layer-selectable":"default","static_start":"1","layer_action":{"tooltip_event":["click"],"action":["link"],"image_link":["#"],"link_open_in":["_self"],"jump_to_slide":["6"],"scrollunder_offset":[""],"actioncallback":[""],"layer_target":["backgroundvideo"],"link_type":["jquery"],"action_delay":["",""],"toggle_layer_type":["visible"],"toggle_class":[""]},"parallax_layer_ddd_zlevel":"front","mask_speed_start":"inherit","mask_ease_start":"inherit","link":"","link_open_in":"same","pers_start":"inherit","pers_end":"inherit"},{"text":"SEE OUR WORK","type":"text","special_type":null,"subtype":"","specialsettings":{},"unique_id":8,"left":{"desktop":100,"mobile":90},"top":{"desktop":400,"mobile":400},"internal_class":"","hover":false,"alias":"SEE OUR WORK","loop_animation":"none","loop_easing":"linearEaseNone","loop_speed":"2","loop_startdeg":-20,"loop_enddeg":20,"loop_xorigin":50,"loop_yorigin":50,"loop_xstart":0,"loop_xend":0,"loop_ystart":0,"loop_yend":0,"loop_zoomstart":"1","loop_zoomend":"1","loop_angle":"0","loop_radius":"10","html_tag":"div","mask_start":false,"mask_end":false,"x_start_reverse":false,"y_start_reverse":false,"x_end_reverse":false,"y_end_reverse":false,"x_rotate_start_reverse":false,"y_rotate_start_reverse":false,"z_rotate_start_reverse":false,"x_rotate_end_reverse":false,"y_rotate_end_reverse":false,"z_rotate_end_reverse":false,"scale_x_start_reverse":false,"scale_y_start_reverse":false,"scale_x_end_reverse":false,"scale_y_end_reverse":false,"skew_x_start_reverse":false,"skew_y_start_reverse":false,"skew_x_end_reverse":false,"skew_y_end_reverse":false,"mask_x_start_reverse":false,"mask_y_start_reverse":false,"mask_x_end_reverse":false,"mask_y_end_reverse":false,"mask_x_start":"0","mask_y_start":"0","mask_x_end":"0","mask_y_end":"0","mask_speed_end":"inherit","mask_ease_end":"inherit","alt_option":"media_library","alt":"","animation":"tp-fade","easing":"Power2.easeInOut","split":"none","endsplit":"none","splitdelay":"10","endsplitdelay":"10","max_height":{"desktop":"auto","mobile":"auto"},"max_width":{"desktop":"170px","mobile":"160px"},"video_width":{"desktop":"480","mobile":"480"},"video_height":{"desktop":"360","mobile":"360"},"2d_rotation":0,"2d_origin_x":50,"2d_origin_y":50,"whitespace":{"desktop":"normal","mobile":"normal"},"static_end":"last","speed":300,"align_hor":{"desktop":"center","mobile":"center"},"align_vert":{"desktop":"top","mobile":"top"},"hiddenunder":false,"resizeme":true,"seo-optimized":false,"link_slide":"nothing","scrollunder_offset":"","style":"","visible-desktop":true,"visible-notebook":true,"visible-tablet":true,"visible-mobile":true,"resize-full":true,"show-on-hover":false,"basealign":"grid","responsive_offset":true,"lazy-load":"auto","image-size":"auto","time":500,"endspeed":300,"endtime":"12300","endanimation":"fadeout","endeasing":"nothing","width":-1,"height":-1,"cover_mode":"custom","static_styles":{"font-size":{"desktop":"16px","mobile":"16px"},"line-height":{"desktop":"39px","mobile":"39px"},"font-weight":{"desktop":"400","mobile":"400"},"color":{"desktop":"#ffffff","mobile":"#ffffff"}},"x_start":"inherit","y_start":"inherit","z_start":"inherit","x_end":"inherit","y_end":"inherit","z_end":"inherit","opacity_start":"0","opacity_end":"0","x_rotate_start":"inherit","y_rotate_start":"inherit","z_rotate_start":"inherit","x_rotate_end":"inherit","y_rotate_end":"inherit","z_rotate_end":"inherit","scale_x_start":"inherit","scale_y_start":"inherit","scale_x_end":"inherit","scale_y_end":"inherit","skew_x_start":"inherit","skew_y_start":"inherit","skew_x_end":"inherit","skew_y_end":"inherit","deformation":{"font-family":"","padding":["0px","0px","0px","0px"],"font-style":"normal","color-transparency":"1","text-decoration":"none","text-align":"center","text-transform":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0","0","0","0"],"x":0,"y":0,"z":0,"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":0,"yrotate":0,"2d_origin_x":"50","2d_origin_y":"50","pers":"600","corner_left":"nothing","corner_right":"nothing","parallax":"-"},"svg":{"svgstroke-color":"transparent","svgstroke-transparency":"1","svgstroke-dasharray":"0","svgstroke-dashoffset":"0","svgstroke-width":"0","svgstroke-hover-color":"transparent","svgstroke-hover-transparency":"1","svgstroke-hover-dasharray":"0","svgstroke-hover-dashoffset":"0","svgstroke-hover-width":"0"},"deformation-hover":{"color":"#000000","color-transparency":"1","text-decoration":"none","background-color":"transparent","background-transparency":"1","border-color":"transparent","border-transparency":"1","border-style":"none","border-width":"0","border-radius":["0px","0px","0px","0px"],"x":0,"y":0,"z":0,"skewx":"0","skewy":"0","scalex":"1","scaley":"1","opacity":"1","xrotate":0,"yrotate":0,"2d_rotation":0,"2d_origin_x":50,"2d_origin_y":50,"speed":"0","easing":"Linear.easeNone","css_cursor":"auto"},"visible":true,"animation_overwrite":"wait","trigger_memory":"keep","serial":4,"split_in_extratime":-10,"split_out_extratime":-10,"endWithSlide":true,"toggle":false,"toggle_use_hover":false,"texttoggle":"","scaleX":{"desktop":"","mobile":""},"scaleY":{"desktop":"","mobile":""},"autolinebreak":true,"scaleProportional":false,"attrID":"","attrClasses":"btn btn-primary no-padding","attrTitle":"","attrRel":"","layer-selectable":"default","static_start":"1","layer_action":{"tooltip_event":["click"],"action":["link"],"image_link":["#"],"link_open_in":["_self"],"jump_to_slide":["6"],"scrollunder_offset":[""],"actioncallback":[""],"layer_target":["backgroundvideo"],"link_type":["jquery"],"action_delay":["",""],"toggle_layer_type":["visible"],"toggle_class":[""]},"parallax_layer_ddd_zlevel":"front","mask_speed_start":"inherit","mask_ease_start":"inherit","link":"","link_open_in":"same","pers_start":"inherit","pers_end":"inherit"}]', '{"hor_lines":["275.333px","549.333px","561.333px","568.333px","561.333px"]}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_revslider_static_slides`
--

DROP TABLE IF EXISTS `wp_revslider_static_slides`;
CREATE TABLE IF NOT EXISTS `wp_revslider_static_slides` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `slider_id` int(9) NOT NULL,
  `params` longtext NOT NULL,
  `layers` longtext NOT NULL,
  `settings` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

DROP TABLE IF EXISTS `wp_termmeta`;
CREATE TABLE IF NOT EXISTS `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `wp_termmeta`
--

INSERT INTO `wp_termmeta` (`meta_id`, `term_id`, `meta_key`, `meta_value`) VALUES
(1, 15, 'order', '0'),
(2, 16, 'order', '0'),
(3, 17, 'order', '0'),
(4, 20, 'order', '0'),
(5, 23, 'order', '0'),
(6, 15, 'product_count_product_cat', '12'),
(7, 16, 'product_count_product_cat', '12'),
(8, 17, 'product_count_product_cat', '5'),
(9, 20, 'product_count_product_cat', '9'),
(10, 23, 'product_count_product_cat', '5'),
(11, 16, 'display_type', ''),
(12, 16, 'thumbnail_id', '0'),
(13, 23, 'display_type', ''),
(14, 23, 'thumbnail_id', '0'),
(15, 20, 'display_type', ''),
(16, 20, 'thumbnail_id', '0'),
(17, 17, 'display_type', ''),
(18, 17, 'thumbnail_id', '0');

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

DROP TABLE IF EXISTS `wp_terms`;
CREATE TABLE IF NOT EXISTS `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'simple', 'simple', 0),
(3, 'grouped', 'grouped', 0),
(4, 'variable', 'variable', 0),
(5, 'external', 'external', 0),
(6, 'Main Menu', 'main-menu', 0),
(7, '3D Printing', '3d-printing', 0),
(8, 'printing', 'printing', 0),
(9, 'post-format-gallery', 'post-format-gallery', 0),
(10, 'post-format-video', 'post-format-video', 0),
(11, 'post-format-quote', 'post-format-quote', 0),
(12, 'education', 'education', 0),
(13, 'scanning', 'scanning', 0),
(14, 'post-format-audio', 'post-format-audio', 0),
(15, '3D Printed Products', '3d-printed-products', 0),
(16, '3D Printer', '3d-printer', 0),
(17, 'Materials', 'materials', 0),
(18, 'Samsung', 'samsung', 0),
(19, 'Ultimaker 2 extended', 'ultimaker-2-extended', 0),
(20, '3D Scanner', '3d-scanner', 0),
(21, 'Canon', 'canon', 0),
(22, 'Mitsubishi', 'mitsubishi', 0),
(23, 'Software &amp; App', 'software-and-app', 0),
(24, '1.76 pounds', '1-76-pounds', 0),
(25, '23261507', '23261507', 0),
(26, '8718836370618', '8718836370618', 0),
(27, 'Made in USA and Imported', 'made-in-usa-and-imported', 0),
(28, 'UM2E', 'um2e', 0),
(29, 'Sevices', 'sevices', 0),
(30, 'About Menu', 'about-menu', 0),
(31, 'Art &amp; Sculpture', 'art-sculpture', 0),
(32, 'Food', 'food', 0),
(33, 'Entertainment', 'entertainment', 0),
(34, '3D Scanning', '3d-scanning', 0),
(35, '3D Model', '3d-model', 0),
(36, '3D Education', '3d-education', 0),
(37, '3D Machine', '3d-machine', 0),
(38, 'technology', 'technology', 0),
(39, 'application', 'application', 0),
(40, 'machine', 'machine', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

DROP TABLE IF EXISTS `wp_term_relationships`;
CREATE TABLE IF NOT EXISTS `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(12, 6, 0),
(13, 6, 0),
(14, 6, 0),
(15, 6, 0),
(16, 6, 0),
(18, 6, 0),
(21, 6, 0),
(40, 7, 0),
(40, 8, 0),
(40, 12, 0),
(40, 14, 0),
(40, 34, 0),
(40, 37, 0),
(42, 7, 0),
(42, 8, 0),
(42, 11, 0),
(42, 12, 0),
(42, 13, 0),
(43, 7, 0),
(43, 9, 0),
(47, 7, 0),
(47, 8, 0),
(47, 10, 0),
(49, 6, 0),
(68, 31, 0),
(70, 31, 0),
(70, 33, 0),
(132, 2, 0),
(132, 16, 0),
(135, 2, 0),
(135, 16, 0),
(135, 18, 0),
(135, 19, 0),
(168, 2, 0),
(168, 16, 0),
(168, 19, 0),
(168, 22, 0),
(168, 24, 0),
(168, 25, 0),
(168, 26, 0),
(168, 27, 0),
(168, 28, 0),
(183, 32, 0),
(188, 32, 0),
(188, 33, 0),
(229, 29, 0),
(230, 29, 0),
(231, 29, 0),
(232, 29, 0),
(233, 29, 0),
(234, 29, 0),
(239, 6, 0),
(240, 6, 0),
(241, 6, 0),
(242, 6, 0),
(243, 6, 0),
(244, 30, 0),
(245, 30, 0),
(246, 30, 0),
(247, 30, 0),
(248, 30, 0),
(262, 7, 0),
(262, 8, 0),
(262, 34, 0),
(275, 6, 0),
(276, 6, 0),
(277, 6, 0),
(278, 6, 0),
(279, 6, 0),
(281, 33, 0),
(284, 6, 0),
(285, 6, 0),
(291, 6, 0),
(292, 6, 0),
(293, 6, 0),
(294, 6, 0),
(295, 6, 0),
(296, 6, 0),
(297, 6, 0),
(298, 6, 0),
(299, 6, 0),
(301, 6, 0),
(302, 6, 0),
(303, 6, 0),
(304, 6, 0),
(305, 6, 0),
(306, 6, 0),
(314, 2, 0),
(314, 16, 0),
(317, 2, 0),
(317, 16, 0),
(319, 2, 0),
(319, 16, 0),
(321, 2, 0),
(321, 16, 0),
(323, 2, 0),
(323, 16, 0),
(327, 2, 0),
(327, 16, 0),
(329, 2, 0),
(329, 16, 0),
(331, 2, 0),
(331, 16, 0),
(333, 2, 0),
(333, 16, 0),
(335, 36, 0),
(335, 37, 0),
(338, 2, 0),
(338, 15, 0),
(340, 2, 0),
(340, 15, 0),
(342, 2, 0),
(342, 15, 0),
(344, 2, 0),
(344, 15, 0),
(351, 2, 0),
(351, 15, 0),
(357, 7, 0),
(361, 7, 0),
(373, 2, 0),
(373, 23, 0),
(378, 7, 0),
(378, 35, 0),
(380, 35, 0),
(380, 36, 0),
(384, 2, 0),
(384, 20, 0),
(390, 2, 0),
(390, 20, 0),
(479, 2, 0),
(479, 15, 0),
(481, 33, 0),
(483, 31, 0),
(485, 33, 0),
(496, 2, 0),
(496, 17, 0),
(498, 2, 0),
(498, 17, 0),
(501, 2, 0),
(501, 17, 0),
(503, 2, 0),
(503, 17, 0),
(505, 2, 0),
(505, 17, 0),
(516, 2, 0),
(516, 15, 0),
(518, 2, 0),
(518, 15, 0),
(520, 2, 0),
(520, 15, 0),
(523, 2, 0),
(523, 15, 0),
(526, 2, 0),
(526, 15, 0),
(528, 2, 0),
(528, 15, 0),
(533, 2, 0),
(533, 23, 0),
(535, 2, 0),
(535, 23, 0),
(537, 2, 0),
(537, 23, 0),
(539, 2, 0),
(539, 23, 0),
(545, 2, 0),
(545, 20, 0),
(547, 2, 0),
(547, 20, 0),
(549, 2, 0),
(549, 20, 0),
(551, 2, 0),
(551, 20, 0),
(553, 2, 0),
(553, 20, 0),
(555, 2, 0),
(555, 20, 0),
(557, 2, 0),
(557, 20, 0),
(575, 7, 0),
(575, 35, 0),
(629, 6, 0),
(630, 6, 0),
(644, 6, 0),
(646, 6, 0),
(647, 6, 0),
(648, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

DROP TABLE IF EXISTS `wp_term_taxonomy`;
CREATE TABLE IF NOT EXISTS `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 0),
(2, 2, 'product_type', '', 0, 43),
(3, 3, 'product_type', '', 0, 0),
(4, 4, 'product_type', '', 0, 0),
(5, 5, 'product_type', '', 0, 0),
(6, 6, 'nav_menu', '', 0, 41),
(7, 7, 'category', '', 0, 9),
(8, 8, 'post_tag', '', 0, 4),
(9, 9, 'post_format', '', 0, 1),
(10, 10, 'post_format', '', 0, 1),
(11, 11, 'post_format', '', 0, 1),
(12, 12, 'post_tag', '', 0, 2),
(13, 13, 'post_tag', '', 0, 1),
(14, 14, 'post_format', '', 0, 1),
(15, 15, 'product_cat', '', 0, 12),
(16, 16, 'product_cat', '', 0, 12),
(17, 17, 'product_cat', 'From Metals to Porcelain, Plastics to Sandstone, and everything in-between.\r\n\r\nEach material offers a unique combination of practical and aesthetic properties to suit a variety of products.', 0, 5),
(18, 18, 'pa_brand', '', 0, 1),
(19, 19, 'pa_brand', '', 0, 2),
(20, 20, 'product_cat', 'Scan real-world forms anywhere and instantly convert them into 3D files. Modify and print them on your 3D printer with 3D Systems'' fully integrated scan to print experience. Which scanner is right for you?', 0, 9),
(21, 21, 'pa_brand', '', 0, 0),
(22, 22, 'pa_brand', '', 0, 1),
(23, 23, 'product_cat', 'Brings simplicity to turning digital designs into perfect 3D prints – it’s an all-in-one 3D printing software platform that includes all the tools you need to turn your design into reality.', 0, 5),
(24, 24, 'pa_item-weight', '', 0, 1),
(25, 25, 'pa_unspsc', '', 0, 1),
(26, 26, 'pa_part-number', '', 0, 1),
(27, 27, 'pa_import-designation', '', 0, 1),
(28, 28, 'pa_ean', '', 0, 1),
(29, 29, 'nav_menu', '', 0, 6),
(30, 30, 'nav_menu', '', 0, 5),
(31, 31, 'portfolio-category', '', 0, 3),
(32, 32, 'portfolio-category', '', 0, 2),
(33, 33, 'portfolio-category', '', 0, 5),
(34, 34, 'category', '', 0, 2),
(35, 35, 'category', '', 0, 3),
(36, 36, 'category', '', 0, 2),
(37, 37, 'category', '', 0, 2),
(38, 38, 'post_tag', '', 0, 0),
(39, 39, 'post_tag', '', 0, 0),
(40, 40, 'post_tag', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

DROP TABLE IF EXISTS `wp_usermeta`;
CREATE TABLE IF NOT EXISTS `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}'),
(11, 1, 'wp_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', 'vc_pointers_backend_editor'),
(13, 1, 'show_welcome_panel', '1'),
(14, 1, 'session_tokens', 'a:4:{s:64:"94db32bb6392675a22ffd0c0782691b2c042e119204bb18a6551fe3785108a70";a:4:{s:10:"expiration";i:1470455794;s:2:"ip";s:12:"192.168.1.90";s:2:"ua";s:72:"Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0";s:5:"login";i:1470282994;}s:64:"c8005b8c2d9ad99cb3ecebbe1c8cce73aa795f131b577ddc16b9bffc1501d2ad";a:4:{s:10:"expiration";i:1470455844;s:2:"ip";s:12:"192.168.1.90";s:2:"ua";s:82:"Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:47.0) Gecko/20100101 Firefox/47.0";s:5:"login";i:1470283044;}s:64:"cc4c3dad0ab89574519e45102851370954a21aa5d2956727f325beb848a3b5a6";a:4:{s:10:"expiration";i:1470619355;s:2:"ip";s:12:"192.168.1.90";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36";s:5:"login";i:1470446555;}s:64:"81b3dcca7d34e749f1139c4b5dcae57781450a514d056b99571a2f754ab256fd";a:4:{s:10:"expiration";i:1470622628;s:2:"ip";s:14:"108.162.222.25";s:2:"ua";s:109:"Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36";s:5:"login";i:1470449828;}}'),
(15, 1, 'wp_dashboard_quick_press_last_post_id', '650'),
(16, 1, 'manageedit-shop_ordercolumnshidden', 'a:1:{i:0;s:15:"billing_address";}'),
(17, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:"link-target";i:1;s:11:"css-classes";i:2;s:3:"xfn";i:3;s:11:"description";i:4;s:15:"title-attribute";}'),
(18, 1, 'metaboxhidden_nav-menus', 'a:6:{i:0;s:30:"woocommerce_endpoints_nav_link";i:1;s:21:"add-post-type-product";i:2;s:12:"add-post_tag";i:3;s:15:"add-post_format";i:4;s:15:"add-product_cat";i:5;s:15:"add-product_tag";}'),
(19, 1, 'nav_menu_recently_edited', '6'),
(20, 1, 'wp_user-settings', 'editor=tinymce&libraryContent=browse&edit_element_vcUIPanelWidth=650&edit_element_vcUIPanelLeft=411px&edit_element_vcUIPanelTop=109px'),
(21, 1, 'wp_user-settings-time', '1463977322'),
(22, 1, 'closedpostboxes_testimonial', 'a:1:{i:0;s:23:"_zo_testimonial_options";}'),
(23, 1, 'metaboxhidden_testimonial', 'a:1:{i:0;s:7:"slugdiv";}'),
(24, 1, 'twitter', 'https://twitter.com'),
(25, 1, 'facebook', 'https://facebook.com'),
(26, 1, 'linkedin', 'https://linkedin.com'),
(27, 1, 'google', 'https://google.com'),
(28, 1, 'billing_first_name', ''),
(29, 1, 'billing_last_name', ''),
(30, 1, 'billing_company', ''),
(31, 1, 'billing_address_1', ''),
(32, 1, 'billing_address_2', ''),
(33, 1, 'billing_city', ''),
(34, 1, 'billing_postcode', ''),
(35, 1, 'billing_country', ''),
(36, 1, 'billing_state', ''),
(37, 1, 'billing_phone', ''),
(38, 1, 'billing_email', ''),
(39, 1, 'shipping_first_name', ''),
(40, 1, 'shipping_last_name', ''),
(41, 1, 'shipping_company', ''),
(42, 1, 'shipping_address_1', ''),
(43, 1, 'shipping_address_2', ''),
(44, 1, 'shipping_city', ''),
(45, 1, 'shipping_postcode', ''),
(46, 1, 'shipping_country', ''),
(47, 1, 'shipping_state', ''),
(48, 1, '_woocommerce_persistent_cart', 'a:1:{s:4:"cart";a:2:{s:32:"7f1de29e6da19d22b51c68001e7e0e54";a:9:{s:10:"product_id";i:135;s:12:"variation_id";i:0;s:9:"variation";a:0:{}s:8:"quantity";i:1;s:10:"line_total";d:1185;s:8:"line_tax";i:0;s:13:"line_subtotal";d:1185;s:17:"line_subtotal_tax";i:0;s:13:"line_tax_data";a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}}s:32:"310dcbbf4cce62f762a2aaa148d556bd";a:9:{s:10:"product_id";i:333;s:12:"variation_id";i:0;s:9:"variation";a:0:{}s:8:"quantity";i:1;s:10:"line_total";d:980;s:8:"line_tax";i:0;s:13:"line_subtotal";i:980;s:17:"line_subtotal_tax";i:0;s:13:"line_tax_data";a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}}}}'),
(49, 1, 'meta-box-order_page', 'a:3:{s:4:"side";s:36:"submitdiv,pageparentdiv,postimagediv";s:6:"normal";s:99:"wpb_visual_composer,postcustom,commentstatusdiv,commentsdiv,slugdiv,authordiv,mymetabox_revslider_0";s:8:"advanced";s:25:"_zo_template_page_options";}'),
(50, 1, 'screen_layout_page', '2'),
(51, 1, 'closedpostboxes_portfolio', 'a:0:{}'),
(52, 1, 'metaboxhidden_portfolio', 'a:1:{i:0;s:7:"slugdiv";}'),
(53, 1, 'closedpostboxes_product', 'a:1:{i:0;s:11:"commentsdiv";}'),
(54, 1, 'metaboxhidden_product', 'a:2:{i:0;s:10:"postcustom";i:1;s:7:"slugdiv";}'),
(55, 1, 'wp_r_tru_u_x', 'a:2:{s:2:"id";s:0:"";s:7:"expires";i:86400;}');

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_api_keys`
--

DROP TABLE IF EXISTS `wp_woocommerce_api_keys`;
CREATE TABLE IF NOT EXISTS `wp_woocommerce_api_keys` (
  `key_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `permissions` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consumer_key` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consumer_secret` char(43) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nonces` longtext COLLATE utf8mb4_unicode_ci,
  `truncated_key` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_access` datetime DEFAULT NULL,
  PRIMARY KEY (`key_id`),
  KEY `consumer_key` (`consumer_key`),
  KEY `consumer_secret` (`consumer_secret`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_attribute_taxonomies`
--

DROP TABLE IF EXISTS `wp_woocommerce_attribute_taxonomies`;
CREATE TABLE IF NOT EXISTS `wp_woocommerce_attribute_taxonomies` (
  `attribute_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `attribute_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_label` longtext COLLATE utf8mb4_unicode_ci,
  `attribute_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_orderby` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_public` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`attribute_id`),
  KEY `attribute_name` (`attribute_name`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `wp_woocommerce_attribute_taxonomies`
--

INSERT INTO `wp_woocommerce_attribute_taxonomies` (`attribute_id`, `attribute_name`, `attribute_label`, `attribute_type`, `attribute_orderby`, `attribute_public`) VALUES
(1, 'brand', 'brand', 'select', 'menu_order', 0),
(2, 'item-weight', 'item-weight', 'select', 'menu_order', 0),
(3, 'unspsc', 'unspsc', 'select', 'menu_order', 0),
(4, 'part-number', 'part-number', 'select', 'menu_order', 0),
(5, 'import-designation', 'import-designation', 'select', 'menu_order', 0),
(6, 'ean', 'ean', 'select', 'menu_order', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_downloadable_product_permissions`
--

DROP TABLE IF EXISTS `wp_woocommerce_downloadable_product_permissions`;
CREATE TABLE IF NOT EXISTS `wp_woocommerce_downloadable_product_permissions` (
  `permission_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `download_id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL DEFAULT '0',
  `order_key` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `downloads_remaining` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_granted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access_expires` datetime DEFAULT NULL,
  `download_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`permission_id`),
  KEY `download_order_key_product` (`product_id`,`order_id`,`order_key`(191),`download_id`),
  KEY `download_order_product` (`download_id`,`order_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_order_itemmeta`
--

DROP TABLE IF EXISTS `wp_woocommerce_order_itemmeta`;
CREATE TABLE IF NOT EXISTS `wp_woocommerce_order_itemmeta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_item_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `order_item_id` (`order_item_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_order_items`
--

DROP TABLE IF EXISTS `wp_woocommerce_order_items`;
CREATE TABLE IF NOT EXISTS `wp_woocommerce_order_items` (
  `order_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_item_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_item_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `order_id` bigint(20) NOT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_payment_tokenmeta`
--

DROP TABLE IF EXISTS `wp_woocommerce_payment_tokenmeta`;
CREATE TABLE IF NOT EXISTS `wp_woocommerce_payment_tokenmeta` (
  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `payment_token_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`meta_id`),
  KEY `payment_token_id` (`payment_token_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_payment_tokens`
--

DROP TABLE IF EXISTS `wp_woocommerce_payment_tokens`;
CREATE TABLE IF NOT EXISTS `wp_woocommerce_payment_tokens` (
  `token_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gateway_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`token_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_sessions`
--

DROP TABLE IF EXISTS `wp_woocommerce_sessions`;
CREATE TABLE IF NOT EXISTS `wp_woocommerce_sessions` (
  `session_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `session_key` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_expiry` bigint(20) NOT NULL,
  PRIMARY KEY (`session_key`),
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_shipping_zones`
--

DROP TABLE IF EXISTS `wp_woocommerce_shipping_zones`;
CREATE TABLE IF NOT EXISTS `wp_woocommerce_shipping_zones` (
  `zone_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_order` bigint(20) NOT NULL,
  PRIMARY KEY (`zone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_shipping_zone_locations`
--

DROP TABLE IF EXISTS `wp_woocommerce_shipping_zone_locations`;
CREATE TABLE IF NOT EXISTS `wp_woocommerce_shipping_zone_locations` (
  `location_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `zone_id` bigint(20) NOT NULL,
  `location_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`location_id`),
  KEY `location_id` (`location_id`),
  KEY `location_type` (`location_type`),
  KEY `location_type_code` (`location_type`,`location_code`(90))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_shipping_zone_methods`
--

DROP TABLE IF EXISTS `wp_woocommerce_shipping_zone_methods`;
CREATE TABLE IF NOT EXISTS `wp_woocommerce_shipping_zone_methods` (
  `zone_id` bigint(20) NOT NULL,
  `instance_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `method_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_order` bigint(20) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`instance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_tax_rates`
--

DROP TABLE IF EXISTS `wp_woocommerce_tax_rates`;
CREATE TABLE IF NOT EXISTS `wp_woocommerce_tax_rates` (
  `tax_rate_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tax_rate_country` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_state` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tax_rate_priority` bigint(20) NOT NULL,
  `tax_rate_compound` int(1) NOT NULL DEFAULT '0',
  `tax_rate_shipping` int(1) NOT NULL DEFAULT '1',
  `tax_rate_order` bigint(20) NOT NULL,
  `tax_rate_class` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`tax_rate_id`),
  KEY `tax_rate_country` (`tax_rate_country`(191)),
  KEY `tax_rate_state` (`tax_rate_state`(191)),
  KEY `tax_rate_class` (`tax_rate_class`(191)),
  KEY `tax_rate_priority` (`tax_rate_priority`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wp_woocommerce_tax_rate_locations`
--

DROP TABLE IF EXISTS `wp_woocommerce_tax_rate_locations`;
CREATE TABLE IF NOT EXISTS `wp_woocommerce_tax_rate_locations` (
  `location_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `location_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_rate_id` bigint(20) NOT NULL,
  `location_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`location_id`),
  KEY `tax_rate_id` (`tax_rate_id`),
  KEY `location_type` (`location_type`),
  KEY `location_type_code` (`location_type`,`location_code`(90))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
