-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 08:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowtop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `short_title` varchar(250) NOT NULL,
  `long_title` varchar(250) NOT NULL,
  `short_description` text NOT NULL,
  `big_description` text NOT NULL,
  `our_mission` varchar(1000) NOT NULL,
  `our_vision` varchar(1000) NOT NULL,
  `additional_description` varchar(300) NOT NULL,
  `short_image_path` varchar(300) NOT NULL,
  `big_image_path` varchar(300) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `vision_image_path` varchar(300) NOT NULL,
  `mission_image_path` varchar(300) NOT NULL,
  `counter_1_title` varchar(250) NOT NULL,
  `counter_2_title` varchar(250) NOT NULL,
  `counter_3_title` varchar(250) NOT NULL,
  `counter_4_title` varchar(250) NOT NULL,
  `counter_1_value` varchar(10) NOT NULL,
  `counter_2_value` varchar(10) NOT NULL,
  `counter_3_value` varchar(10) NOT NULL,
  `counter_4_value` varchar(10) NOT NULL,
  `our_service_1_title` varchar(250) NOT NULL,
  `our_service_1_desc` varchar(500) NOT NULL,
  `our_service_2_title` varchar(250) NOT NULL,
  `our_service_2_desc` varchar(500) NOT NULL,
  `our_service_3_title` varchar(250) NOT NULL,
  `our_service_3_desc` varchar(500) NOT NULL,
  `our_service_4_title` varchar(250) NOT NULL,
  `our_service_4_desc` varchar(500) NOT NULL,
  `our_service_5_title` varchar(250) NOT NULL,
  `our_service_5_desc` varchar(500) NOT NULL,
  `our_service_6_title` varchar(250) NOT NULL,
  `our_service_6_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `short_title`, `long_title`, `short_description`, `big_description`, `our_mission`, `our_vision`, `additional_description`, `short_image_path`, `big_image_path`, `isDelete`, `isActive`, `vision_image_path`, `mission_image_path`, `counter_1_title`, `counter_2_title`, `counter_3_title`, `counter_4_title`, `counter_1_value`, `counter_2_value`, `counter_3_value`, `counter_4_value`, `our_service_1_title`, `our_service_1_desc`, `our_service_2_title`, `our_service_2_desc`, `our_service_3_title`, `our_service_3_desc`, `our_service_4_title`, `our_service_4_desc`, `our_service_5_title`, `our_service_5_desc`, `our_service_6_title`, `our_service_6_desc`) VALUES
(1, 'Our Story In Interior Industry', 'Why Choose Us', '&lt;p&gt;We would like to introduce ourselves as a leading manufacturer of High-Quality door closer, floor spring, glass door patch fittings. Our products adhere to International Standard. CHANAKYA ENGINEERING PRODUCTS. is located in RAJKOT GUJARAT .&lt;/p&gt;\r\n\r\n&lt;p&gt;We have been manufacturing these products since 1992. We have created a niche for ourselves in satisfying far end Clientele with at most care.CHANAKYA ENGINEERING PRODUCTS true to its name, stands for perfection in each and every product that leaves its factory premises because &amp;lsquo;quality is our first priority&amp;rsquo;.&lt;/p&gt;', '&lt;p&gt;To give you a home that lasts, we bring you only the best in everything &amp;mdash; quality raw materials, state-of-the-art manufacturing, rigorous quality checks, professional installations and transparent prices.&lt;/p&gt;', '&lt;p&gt;&lt;strong&gt;we believe that interior design is more than great functionality and&lt;br /&gt;\r\nbeautiful aesthetics.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;WThe aesthetics and functional aspects are the primary elements of a smart interior design. We as the prominent Interior Design Consultant in Noida keep these elements at our highest priority. We provide the best suggestions for Interior Designing of a given space&lt;/p&gt;', '&lt;p&gt;&lt;strong&gt;we believe that interior design is more than great functionality and&lt;br /&gt;\r\nbeautiful aesthetics.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;WThe aesthetics and functional aspects are the primary elements of a smart interior design. We as the prominent Interior Design Consultant in Noida keep these elements at our highest priority. We provide the best suggestions for Interior Designing of a given space&lt;/p&gt;', '&lt;p&gt;Gujrat Agro Exports aims to provide the best standards of organic dehydrated vegetables all around the globe with the widest range available. Our mission is to promote and provide a healthy diet for every individual and discover and come up with a variety of organic food for you to maintain', 'short_img_0f643c.jpg', 'big_img_0f6.jpg', 0, 1, 'vision_img_0f6.jpg', 'mission_img_0f6.jpg', 'Material Warranty', 'Homes Completed', 'Interior Designer', 'Project Delivery', '8 Years', '2500+', '200+', '45 Days', 'Office Interior', 'Lorem Ipsum is simply my text of the printing and Ipsum is the Ipsum is simply.', 'House Interior', 'Lorem Ipsum is simply my text of the printing and Ipsum is the Ipsum is simply.', 'Restaurant Interior', 'Lorem Ipsum is simply my text of the printing and Ipsum is the Ipsum is simply.', 'Hospital Interior', 'Lorem Ipsum is simply my text of the printing and Ipsum is the Ipsum is simply.', 'Appartment Interior', 'Lorem Ipsum is simply my text of the printing and Ipsum is the Ipsum is simply.', 'Hospitality Interior', 'Lorem Ipsum is simply my text of the printing and Ipsum is the Ipsum is simply.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `admin_type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image_path` text NOT NULL,
  `forgot_pass_string` text NOT NULL,
  `last_login` datetime NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `interest` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `about` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `admin_type`, `name`, `username`, `password`, `email`, `image_path`, `forgot_pass_string`, `last_login`, `mobile_no`, `interest`, `occupation`, `about`, `website`, `facebook`, `twitter`) VALUES
(1, 0, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '8', '', '2022-04-02 23:57:43', '123456789', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_type`
--

CREATE TABLE `admin_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `adate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_type`
--

INSERT INTO `admin_type` (`id`, `name`, `isDelete`, `adate`) VALUES
(0, 'Super Admin', 0, '2016-10-07 00:00:00'),
(1, 'Receptionist', 0, '2016-10-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `alt_img`
--

CREATE TABLE `alt_img` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(10) UNSIGNED NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `display_order` int(11) NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alt_img`
--

INSERT INTO `alt_img` (`id`, `pid`, `image_path`, `display_order`, `isDelete`, `isActive`, `adate`) VALUES
(1, 1, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(2, 2, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(3, 3, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(4, 4, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(5, 5, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(6, 6, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(7, 7, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(8, 8, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(9, 9, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(10, 10, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(11, 11, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(12, 12, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(13, 13, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(14, 14, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(15, 15, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(16, 16, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(17, 17, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(18, 18, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(19, 19, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(20, 20, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(21, 21, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(22, 22, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(23, 23, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(24, 24, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(25, 25, 'Untitled-1.png', 0, 0, 1, '2020-08-07 05:45:12'),
(26, 26, 'alter_img047fc2.jpg', 0, 0, 1, '2020-12-18 06:41:40'),
(27, 27, 'alter_imgcbbab9.jpg', 0, 0, 1, '2020-12-18 06:49:11'),
(28, 27, 'alter_imga389a2.png', 0, 0, 1, '2020-12-18 06:54:03'),
(29, 28, 'alter_img81506a.png', 0, 0, 1, '2020-12-18 06:56:51'),
(30, 28, 'alter_img377356.png', 0, 0, 1, '2020-12-18 06:57:29'),
(31, 29, 'alter_imgabaaf1.png', 0, 0, 1, '2020-12-18 07:00:30'),
(32, 29, 'alter_imgc8dab5.png', 0, 0, 1, '2020-12-18 07:01:14'),
(33, 30, 'alter_imgf9745e.png', 0, 0, 1, '2020-12-18 07:04:13'),
(34, 30, 'alter_img25640f.jpg', 0, 0, 1, '2020-12-18 07:05:08'),
(35, 30, 'alter_img3fb5f3.jpg', 0, 0, 1, '2020-12-18 07:05:48'),
(36, 31, 'alter_imgbc5723.png', 0, 0, 1, '2020-12-18 07:08:09'),
(37, 31, 'alter_img57b2be.png', 0, 0, 1, '2020-12-18 07:08:56'),
(38, 32, 'alter_imga10e45.png', 0, 0, 1, '2020-12-18 07:11:05'),
(39, 33, 'alter_img2c98e3.png', 0, 0, 1, '2020-12-18 07:14:24'),
(40, 33, 'alter_imged3f3e.jpg', 0, 0, 1, '2020-12-18 07:15:11'),
(41, 34, 'alter_img34dcde.png', 0, 0, 1, '2020-12-18 07:16:41'),
(42, 34, 'alter_img616655.jpg', 0, 0, 1, '2020-12-18 07:17:19'),
(43, 35, 'alter_imgf27f5a.png', 0, 0, 1, '2020-12-18 07:23:15'),
(44, 36, 'alter_imgc08d8f.png', 0, 0, 1, '2020-12-18 07:28:08'),
(45, 37, 'alter_img1c396a.png', 0, 0, 1, '2020-12-18 07:28:33'),
(46, 38, 'alter_imgcf98d6.png', 0, 0, 1, '2020-12-18 07:29:01'),
(47, 39, 'alter_imgfe78a3.png', 0, 0, 1, '2020-12-18 07:31:39'),
(48, 40, 'alter_imgb44c1b.png', 0, 0, 1, '2020-12-18 07:33:51'),
(49, 41, 'alter_imgb8ab75.png', 0, 0, 1, '2020-12-18 07:35:27'),
(50, 42, 'alter_imgb47a09.png', 0, 0, 1, '2020-12-18 07:38:22'),
(51, 43, 'alter_imgfcf1fc.png', 0, 0, 1, '2020-12-18 07:40:46'),
(52, 43, 'alter_img09d0f7.jpg', 0, 0, 1, '2020-12-19 01:11:24'),
(53, 43, 'alter_img546443.jpg', 0, 0, 1, '2020-12-19 01:13:01'),
(54, 42, 'alter_imgf1ee81.jpg', 0, 0, 1, '2020-12-19 01:15:55'),
(55, 42, 'alter_img5e8c85.jpg', 0, 0, 1, '2020-12-19 01:16:44'),
(56, 40, 'alter_img793d1e.jpg', 0, 0, 1, '2020-12-19 01:19:11'),
(57, 40, 'alter_imgc890e1.jpg', 0, 0, 1, '2020-12-19 01:19:47'),
(58, 39, 'alter_imgec2a57.png', 0, 0, 1, '2020-12-19 01:21:18'),
(59, 38, 'alter_img5e66b9.crdownload', 0, 0, 1, '2020-12-19 01:22:04'),
(61, 37, 'alter_imga806b5.jpg', 0, 0, 1, '2020-12-19 01:52:57'),
(62, 37, 'alter_imgc9e208.jpg', 0, 0, 1, '2020-12-19 01:56:03'),
(63, 36, 'alter_img238283.jpg', 0, 0, 1, '2020-12-19 01:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `api_key_table`
--

CREATE TABLE `api_key_table` (
  `id` int(11) NOT NULL,
  `api_key` text NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `adate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_key_table`
--

INSERT INTO `api_key_table` (`id`, `api_key`, `isDelete`, `adate`) VALUES
(1, '1226', 0, '2016-10-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `api_table`
--

CREATE TABLE `api_table` (
  `id` int(11) NOT NULL,
  `api_slug` varchar(100) NOT NULL,
  `api_title` varchar(100) NOT NULL,
  `api_description` text NOT NULL,
  `api_url` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `last_modification_date` datetime NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='// Contains Android and IOS JSON API Infromation ';

--
-- Dumping data for table `api_table`
--

INSERT INTO `api_table` (`id`, `api_slug`, `api_title`, `api_description`, `api_url`, `author`, `last_modification_date`, `isDelete`) VALUES
(1, 'user_login', 'user login', '<p>user login</p>', 'service_registration.php?key=1226&s=1&phone=9998563007&password=admin', 'kuldip', '1970-01-01 00:00:00', 0),
(2, 'user_register', 'user register', '<p>add user</p>', 'service_registration.php?key=1226&s=2&name=kuldip&password=admin&email=kuldipgalchar.cb@gmail.com&mobile_no=9998563007&address=Rajkot', 'kuldip', '0000-00-00 00:00:00', 0),
(3, 'user_update', 'user update', 'user update', 'service_registration.php?key=1226&s=3&id=1&name=kuldip&mobile_no=9998563007&email=bhavya@gmail.com&address=Rajkot', 'kuldip', '0000-00-00 00:00:00', 0),
(4, 'user_delete', 'user delete', '<p>user delete</p>', 'service_registration.php?key=1226&s=4&id=1', 'kuldip', '0000-00-00 00:00:00', 0),
(5, 'user_get_data', 'user get data', '<p>user get data</p>', 'service_registration.php?key=1226&s=5&id=1', 'kuldip', '0000-00-00 00:00:00', 0),
(6, 'slider_get_data', 'slider get data', '<p>slider get data</p>', 'service_registration.php?key=1226&s=6', 'kuldip', '0000-00-00 00:00:00', 0),
(7, 'category_get', 'category get', '<p>category get</p>', 'service_registration.php?key=1226&s=7', 'kuldip', '0000-00-00 00:00:00', 0),
(8, 'sub_category_get', 'sub category get', '<p>sub category get</p>', 'service_registration.php?key=1226&s=8', 'kuldip', '0000-00-00 00:00:00', 0),
(9, 'get_country', 'get country', '<p>&nbsp;get country</p>', 'service_registration.php?key=1226&s=9', 'dhaval', '0000-00-00 00:00:00', 0),
(10, 'get_state', 'get state', '<p>get state</p>', 'service_registration.php?key=1226&s=10&country_id=1', 'kuldip', '0000-00-00 00:00:00', 0),
(11, 'get_city', 'get city', '<p>get city</p>', 'service_registration.php?key=1226&s=11&state_id=1', 'kuldip', '0000-00-00 00:00:00', 0),
(12, 'contact_us', 'contact us', '<p>contact us</p>', 'service_registration.php?key=1226&s=12&name=kuldip&email=kuldipgalchar.cb@gmail.com&contact_number=9998563007&subject=no-subject&message=sdfhkjhfdsjkhkjsdhfkjhdshfjkshfkj', 'kuldip', '0000-00-00 00:00:00', 0),
(13, 'testimonial', 'testimonial', '<p>testimonial</p>', 'service_registration.php?key=1226&s=13&name=kuldip&designation=web_devloper&message=test message', 'kuldip', '0000-00-00 00:00:00', 0),
(14, 'product', 'product', '<p>product</p>', 'service_registration.php?key=1226&s=12&cid=1&sid=1&name=kuldip&description=test description&add_info=test add info&price=100', 'kuldip', '0000-00-00 00:00:00', 0),
(15, 'multi_category', 'multi category', '<p>multi category</p>', 'service_registration.php?key=1226&s=15', 'kuldip', '0000-00-00 00:00:00', 0),
(16, 'multi_state', 'multi state', '<p>multi state</p>', 'service_registration.php?key=1226&s=16', 'kuldip', '0000-00-00 00:00:00', 0),
(17, 'multi_product', 'multi product', '<p>multi product</p>', 'service_registration.php?key=1226&s=17', 'kuldip', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` datetime NOT NULL,
  `image_path` varchar(350) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `name`, `isDelete`, `isActive`, `adate`, `image_path`, `description`) VALUES
(1, 'application1', 0, 1, '2020-12-24 16:59:16', 'project_img1.jpg', ''),
(2, 'application2', 0, 1, '2020-12-24 16:59:39', 'project_img2.jpg', ''),
(3, 'application3', 0, 1, '2020-12-24 16:59:55', 'project_img3.jpg', ''),
(4, 'application4', 0, 1, '2020-12-24 17:00:40', 'project_img4.jpg', ''),
(5, 'application5', 0, 1, '2020-12-24 17:00:52', 'project_img5.jpg', ''),
(6, 'application6', 0, 1, '2020-12-24 17:01:05', 'project_img7.jpg', ''),
(7, 'application7', 0, 1, '2020-12-24 17:01:19', 'project_img7.jpg', ''),
(8, 'application8', 0, 1, '2020-12-24 17:01:34', 'project_img8.jpg', ''),
(9, 'application9', 0, 1, '2020-12-24 17:01:46', 'project_img9.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `publish_on` date NOT NULL,
  `target` varchar(20) NOT NULL DEFAULT '_SELF',
  `description` text NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `video_link` text NOT NULL,
  `project_link` varchar(500) NOT NULL,
  `display_order` int(10) UNSIGNED NOT NULL,
  `promo_type` tinyint(1) NOT NULL COMMENT '0=slideshow, 1=banner',
  `adate` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDelete` tinyint(1) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `url` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `publish_on`, `target`, `description`, `image_path`, `video_link`, `project_link`, `display_order`, `promo_type`, `adate`, `isDelete`, `isActive`, `url`) VALUES
(1, 'Solution for <br> Modern Kitchen', '0000-00-00', '', '<p>Since 1989, We inspired fragments of your life stories with the finest kitchens, wardrobes, bedroom sets and living &amp; dining</p>', '3.jpg', '', '', 0, 0, '2020-12-31 10:02:22', 0, 1, ''),
(2, 'Designs Benefitting <br> Your Persona', '0000-00-00', '', '<p>Since 1989, We inspired fragments of your life stories with the finest kitchens, wardrobes, bedroom sets and living &amp; dining.</p>', 'banner_image_2.jpg', '', '', 0, 0, '2020-12-31 10:04:23', 0, 1, ''),
(3, 'We make dream <br> home a reality', '0000-00-00', '', '<p>Since 1989, We inspired fragments of your life stories with the finest kitchens, wardrobes, bedroom sets and living &amp; dining.</p>', 'banner_image_1.jpg', '', '', 0, 0, '2020-12-31 10:05:16', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `blog_title` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `slug` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `display_order` int(11) NOT NULL,
  `description` mediumtext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `author_name` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `add_info` mediumtext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `image_path` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `cid`, `blog_title`, `slug`, `display_order`, `description`, `author_name`, `add_info`, `image_path`, `isDelete`, `isActive`, `adate`) VALUES
(17, 4, 'blog1', 'blog1', 0, '&lt;p&gt;&lt;span open=&quot;&quot; style=&quot;color: rgb(142, 141, 141); font-family: &quot;&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Getting the best liquid filling machine as per your business, sometimes, is a daunting task. And, if you are new to the beverage packaging business, this becomes more hectic. There are many factors and aspects that you must keep in mind before going for the most suitable liquid packaging machine for your business. And, with so many options with a different set of features, finding the best that suits your business requirements within the stipulated amount of money increases your worries a lot. However, you do not need to be worried when we are here to help you out in selecting the best and the most suitable liquid packaging machine as per your needs. Here, we have a list of some basic features and aspects you must consider before purchasing a liquid packaging machine.&lt;/p&gt;\r\n\r\n&lt;p&gt;What is Your Product Type?&lt;/p&gt;\r\n\r\n&lt;p&gt;When it comes to &amp;lsquo;liquid&amp;rsquo; packaging, you must keep in mind the type of beverage you are going to pack in the bags. The reason being is that the different types of liquid hold different viscosity and viscidness. Hence, you must go for the liquid filling machine that suits best for your products&amp;rsquo; viscosity values.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;What Kind of a Container or Bottle Will did You Use To Pack Your Product?&lt;/p&gt;\r\n\r\n&lt;p&gt;Your containers&amp;rsquo; physical properties play an important role when it comes to choosing the most suitable liquid filling machines. For instance, the overflow fillers are best suited for clear containers. Another important factor to keep in mind is that some can fillers grip the cans or containers from sides whereas some pull the cans from the top. The material of your containers also needs to be taken into consideration while selecting the liquid filling machines.&lt;/p&gt;\r\n\r\n&lt;p&gt;If you are new to the liquid filling industry, selecting the most suited liquid filling machine becomes very confusing, especially when you have so many options to choose from. Therefore, other than the factors mentioned above in the article, you must take your budget, possible business growth, the probability of introducing new products into consideration before buying a liquid packaging machine for your business.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span open=&quot;&quot; style=&quot;color: rgb(142, 141, 141); font-family: &quot;&gt;&lt;/span&gt;&lt;/p&gt;', 'MICHALE JOHN', '', 'blog_img_cf3e46.jpg', 0, 1, '2020-12-12 10:32:33'),
(18, 0, 'blog2', 'blog2', 0, '&lt;p&gt;&lt;span open=&quot;&quot; style=&quot;color: rgb(142, 141, 141); font-family: &quot;&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Getting the best liquid filling machine as per your business, sometimes, is a daunting task. And, if you are new to the beverage packaging business, this becomes more hectic. There are many factors and aspects that you must keep in mind before going for the most suitable liquid packaging machine for your business. And, with so many options with a different set of features, finding the best that suits your business requirements within the stipulated amount of money increases your worries a lot. However, you do not need to be worried when we are here to help you out in selecting the best and the most suitable liquid packaging machine as per your needs. Here, we have a list of some basic features and aspects you must consider before purchasing a liquid packaging machine.&lt;/p&gt;\r\n\r\n&lt;p&gt;What is Your Product Type?&lt;/p&gt;\r\n\r\n&lt;p&gt;When it comes to &amp;lsquo;liquid&amp;rsquo; packaging, you must keep in mind the type of beverage you are going to pack in the bags. The reason being is that the different types of liquid hold different viscosity and viscidness. Hence, you must go for the liquid filling machine that suits best for your products&amp;rsquo; viscosity values.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;What Kind of a Container or Bottle Will did You Use To Pack Your Product?&lt;/p&gt;\r\n\r\n&lt;p&gt;Your containers&amp;rsquo; physical properties play an important role when it comes to choosing the most suitable liquid filling machines. For instance, the overflow fillers are best suited for clear containers. Another important factor to keep in mind is that some can fillers grip the cans or containers from sides whereas some pull the cans from the top. The material of your containers also needs to be taken into consideration while selecting the liquid filling machines.&lt;/p&gt;\r\n\r\n&lt;p&gt;If you are new to the liquid filling industry, selecting the most suited liquid filling machine becomes very confusing, especially when you have so many options to choose from. Therefore, other than the factors mentioned above in the article, you must take your budget, possible business growth, the probability of introducing new products into consideration before buying a liquid packaging machine for your business.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;span open=&quot;&quot; style=&quot;color: rgb(142, 141, 141); font-family: &quot;&gt;&lt;/span&gt;&lt;/p&gt;', 'MICHALE JOHN', '', 'blog_img_13a338.jpg', 0, 1, '2020-12-12 10:32:51'),
(21, 5, 'blog3', 'blog3', 0, '&lt;p&gt;Getting the best liquid filling machine as per your business, sometimes, is a daunting task. And, if you are new to the beverage packaging business, this becomes more hectic. There are many factors and aspects that you must keep in mind before going for the most suitable liquid packaging machine for your business. And, with so many options with a different set of features, finding the best that suits your business requirements within the stipulated amount of money increases your worries a lot. However, you do not need to be worried when we are here to help you out in selecting the best and the most suitable liquid packaging machine as per your needs. Here, we have a list of some basic features and aspects you must consider before purchasing a liquid packaging machine.&lt;/p&gt;\r\n\r\n&lt;p&gt;What is Your Product Type?&lt;/p&gt;\r\n\r\n&lt;p&gt;When it comes to &amp;lsquo;liquid&amp;rsquo; packaging, you must keep in mind the type of beverage you are going to pack in the bags. The reason being is that the different types of liquid hold different viscosity and viscidness. Hence, you must go for the liquid filling machine that suits best for your products&amp;rsquo; viscosity values.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;What Kind of a Container or Bottle Will did You Use To Pack Your Product?&lt;/p&gt;\r\n\r\n&lt;p&gt;Your containers&amp;rsquo; physical properties play an important role when it comes to choosing the most suitable liquid filling machines. For instance, the overflow fillers are best suited for clear containers. Another important factor to keep in mind is that some can fillers grip the cans or containers from sides whereas some pull the cans from the top. The material of your containers also needs to be taken into consideration while selecting the liquid filling machines.&lt;/p&gt;\r\n\r\n&lt;p&gt;If you are new to the liquid filling industry, selecting the most suited liquid filling machine becomes very confusing, especially when you have so many options to choose from. Therefore, other than the factors mentioned above in the article, you must take your budget, possible business growth, the probability of introducing new products into consideration before buying a liquid packaging machine for your business.&lt;/p&gt;', 'smith', '', 'blog_img_e8c636.jpg', 0, 1, '2020-12-28 07:05:11'),
(22, 6, 'blog4', 'blog4', 0, '&lt;p&gt;Getting the best liquid filling machine as per your business, sometimes, is a daunting task. And, if you are new to the beverage packaging business, this becomes more hectic. There are many factors and aspects that you must keep in mind before going for the most suitable liquid packaging machine for your business. And, with so many options with a different set of features, finding the best that suits your business requirements within the stipulated amount of money increases your worries a lot. However, you do not need to be worried when we are here to help you out in selecting the best and the most suitable liquid packaging machine as per your needs. Here, we have a list of some basic features and aspects you must consider before purchasing a liquid packaging machine.&lt;/p&gt;\r\n\r\n&lt;p&gt;What is Your Product Type?&lt;/p&gt;\r\n\r\n&lt;p&gt;When it comes to &amp;lsquo;liquid&amp;rsquo; packaging, you must keep in mind the type of beverage you are going to pack in the bags. The reason being is that the different types of liquid hold different viscosity and viscidness. Hence, you must go for the liquid filling machine that suits best for your products&amp;rsquo; viscosity values.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;What Kind of a Container or Bottle Will did You Use To Pack Your Product?&lt;/p&gt;\r\n\r\n&lt;p&gt;Your containers&amp;rsquo; physical properties play an important role when it comes to choosing the most suitable liquid filling machines. For instance, the overflow fillers are best suited for clear containers. Another important factor to keep in mind is that some can fillers grip the cans or containers from sides whereas some pull the cans from the top. The material of your containers also needs to be taken into consideration while selecting the liquid filling machines.&lt;/p&gt;\r\n\r\n&lt;p&gt;If you are new to the liquid filling industry, selecting the most suited liquid filling machine becomes very confusing, especially when you have so many options to choose from. Therefore, other than the factors mentioned above in the article, you must take your budget, possible business growth, the probability of introducing new products into consideration before buying a liquid packaging machine for your business.&lt;/p&gt;', 'smith', '', 'blog_img_89575d.jpg', 0, 1, '2020-12-28 07:05:44'),
(23, 7, 'blog5', 'blog5', 0, '&lt;p&gt;Getting the best liquid filling machine as per your business, sometimes, is a daunting task. And, if you are new to the beverage packaging business, this becomes more hectic. There are many factors and aspects that you must keep in mind before going for the most suitable liquid packaging machine for your business. And, with so many options with a different set of features, finding the best that suits your business requirements within the stipulated amount of money increases your worries a lot. However, you do not need to be worried when we are here to help you out in selecting the best and the most suitable liquid packaging machine as per your needs. Here, we have a list of some basic features and aspects you must consider before purchasing a liquid packaging machine.&lt;/p&gt;\r\n\r\n&lt;p&gt;What is Your Product Type?&lt;/p&gt;\r\n\r\n&lt;p&gt;When it comes to &amp;lsquo;liquid&amp;rsquo; packaging, you must keep in mind the type of beverage you are going to pack in the bags. The reason being is that the different types of liquid hold different viscosity and viscidness. Hence, you must go for the liquid filling machine that suits best for your products&amp;rsquo; viscosity values.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;What Kind of a Container or Bottle Will did You Use To Pack Your Product?&lt;/p&gt;\r\n\r\n&lt;p&gt;Your containers&amp;rsquo; physical properties play an important role when it comes to choosing the most suitable liquid filling machines. For instance, the overflow fillers are best suited for clear containers. Another important factor to keep in mind is that some can fillers grip the cans or containers from sides whereas some pull the cans from the top. The material of your containers also needs to be taken into consideration while selecting the liquid filling machines.&lt;/p&gt;\r\n\r\n&lt;p&gt;If you are new to the liquid filling industry, selecting the most suited liquid filling machine becomes very confusing, especially when you have so many options to choose from. Therefore, other than the factors mentioned above in the article, you must take your budget, possible business growth, the probability of introducing new products into consideration before buying a liquid packaging machine for your business.&lt;/p&gt;', 'smith', '', 'blog_img_6ef3e9.jpg', 0, 1, '2020-12-28 07:06:06'),
(24, 3, 'blog6', 'blog6', 0, '&lt;p&gt;Getting the best liquid filling machine as per your business, sometimes, is a daunting task. And, if you are new to the beverage packaging business, this becomes more hectic. There are many factors and aspects that you must keep in mind before going for the most suitable liquid packaging machine for your business. And, with so many options with a different set of features, finding the best that suits your business requirements within the stipulated amount of money increases your worries a lot. However, you do not need to be worried when we are here to help you out in selecting the best and the most suitable liquid packaging machine as per your needs. Here, we have a list of some basic features and aspects you must consider before purchasing a liquid packaging machine.&lt;/p&gt;\r\n\r\n&lt;p&gt;What is Your Product Type?&lt;/p&gt;\r\n\r\n&lt;p&gt;When it comes to &amp;lsquo;liquid&amp;rsquo; packaging, you must keep in mind the type of beverage you are going to pack in the bags. The reason being is that the different types of liquid hold different viscosity and viscidness. Hence, you must go for the liquid filling machine that suits best for your products&amp;rsquo; viscosity values.&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;What Kind of a Container or Bottle Will did You Use To Pack Your Product?&lt;/p&gt;\r\n\r\n&lt;p&gt;Your containers&amp;rsquo; physical properties play an important role when it comes to choosing the most suitable liquid filling machines. For instance, the overflow fillers are best suited for clear containers. Another important factor to keep in mind is that some can fillers grip the cans or containers from sides whereas some pull the cans from the top. The material of your containers also needs to be taken into consideration while selecting the liquid filling machines.&lt;/p&gt;\r\n\r\n&lt;p&gt;If you are new to the liquid filling industry, selecting the most suited liquid filling machine becomes very confusing, especially when you have so many options to choose from. Therefore, other than the factors mentioned above in the article, you must take your budget, possible business growth, the probability of introducing new products into consideration before buying a liquid packaging machine for your business.&lt;/p&gt;', 'smith', '', 'blog_img_bacda1.jpg', 0, 1, '2020-12-28 07:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `email` varchar(150) NOT NULL,
  `website` varchar(250) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_id`, `name`, `contact_number`, `email`, `website`, `subject`, `message`, `isDelete`, `isActive`, `created_date`) VALUES
(1, 0, 'r', '', 'raj@gmail.com', '', '', 'hellow', 0, 1, '2020-12-30 04:14:34'),
(2, 22, 'a', '', 'a@gmail.com', '', '', 'a', 0, 1, '2020-12-30 04:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `book_appointment`
--

CREATE TABLE `book_appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `mobile_no` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `note` text NOT NULL,
  `appointment_date` datetime NOT NULL,
  `date` datetime NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_appointment`
--

INSERT INTO `book_appointment` (`id`, `name`, `mobile_no`, `email`, `note`, `appointment_date`, `date`, `isDelete`, `isActive`, `created_date`) VALUES
(1, 'yagnik joshi', '8758003578', 'yagnik@gmail.com', 'TESTSTSTTSTSTSTSTSTSTSTSTSTSTSTSTTS', '2020-04-10 17:00:00', '2020-04-10 16:00:00', 0, 1, '2020-04-10 11:26:23'),
(2, 'yagnik joshi', '8758003578', 'yagnik@gmail.com', 'TESTSTSTTSTSTSTSTSTSTSTSTSTSTSTSTTS', '2020-04-13 11:25:00', '2020-04-10 11:25:00', 0, 1, '2020-04-10 11:27:13'),
(3, 'TEST', '1111111111', 'test@gmail.com', 'TEST', '2020-04-10 19:29:00', '2020-04-10 19:29:00', 0, 1, '2020-04-10 19:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image_path` text NOT NULL,
  `old_image_path` text NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `adate` datetime NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `title`, `description`, `image_path`, `old_image_path`, `isActive`, `isDelete`, `adate`, `cid`) VALUES
(1, 'client 1', '', 'logo-8.png', '', 1, 0, '2020-05-29 12:07:15', 0),
(2, 'client 2', '', 'logo-9.png', '', 1, 0, '2020-06-05 15:42:30', 0),
(3, 'client 3', '', 'logo-10.png', '', 1, 0, '2020-06-05 15:44:46', 0),
(4, 'client 4', '', 'logo-11.png', '', 1, 0, '2020-07-27 12:28:44', 0),
(5, 'client 5', '', 'logo-12.png', '', 1, 0, '2020-07-27 12:29:03', 0),
(6, 'client 6', '', 'logo-13.png', '', 1, 0, '2020-07-27 12:29:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` int(20) NOT NULL,
  `message` text NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `product_id`, `name`, `email`, `mobile_no`, `message`, `isDelete`, `isActive`, `created_date`) VALUES
(1, 8, 'a', 'a', 0, 'a', 0, 1, '2020-12-31 01:18:51'),
(2, 8, 'a', 'a', 0, 'a', 0, 1, '2020-12-31 01:19:30'),
(3, 8, 'eee', 'eee@gmail.com', 0, 'aaaaaaarrrrrr', 0, 1, '2020-12-31 01:33:22'),
(4, 8, 'a', 'smit@gmail.com', 0, 'a', 0, 1, '2021-01-01 03:06:03'),
(5, 8, 'a', 'smit@gmail.com', 0, 'a', 0, 1, '2021-01-01 03:06:16'),
(6, 8, 'a', 'milan@gmail.com', 0, 'a', 0, 1, '2021-01-01 04:03:19'),
(7, 8, 'Milan', 'milan@gmail.com', 0, 'a', 0, 1, '2021-01-01 04:04:11'),
(8, 7, 'a', 'milan@gmail.com', 1111122222, 'a', 0, 1, '2021-01-01 04:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `display_order` int(11) NOT NULL,
  `meta_descr` varchar(250) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `display_order`, `meta_descr`, `image_path`, `description`, `isDelete`, `isActive`, `adate`) VALUES
(3, '3144', '3144', 2, '', '', '', 0, 1, '2020-12-18 12:29:33'),
(4, 'Econimic Model', 'econimic-model', 1, '', '', '', 0, 1, '2020-12-18 12:29:59'),
(5, 'Construction', 'construction', 0, '', '', '', 1, 1, '2020-12-18 12:30:34'),
(6, 'Chemical', 'chemical', 0, '', '', '', 1, 1, '2020-12-18 12:30:54'),
(7, 'Automotive', 'automotive', 0, '', '', '', 1, 1, '2020-12-18 12:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `center_of_excellence`
--

CREATE TABLE `center_of_excellence` (
  `id` int(11) NOT NULL,
  `short_title` varchar(250) NOT NULL,
  `long_title` varchar(250) NOT NULL,
  `short_description` text NOT NULL,
  `big_description` text NOT NULL,
  `our_mission` varchar(300) NOT NULL,
  `our_vision` varchar(300) NOT NULL,
  `short_image_path` varchar(300) NOT NULL,
  `big_image_path` varchar(300) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `year` varchar(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image_path` text NOT NULL,
  `old_image_path` text NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `adate` datetime NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `year`, `title`, `description`, `image_path`, `old_image_path`, `isActive`, `isDelete`, `adate`, `cid`) VALUES
(1, '', 'title', '<p>description</p>', 'e58361bb221911bc7bd89fd6a9d4ad9f.jpg', '', 1, 0, '2021-01-28 23:18:02', 0),
(2, '', 'Title', '<p>Description</p>', 'e58361bb221911bc7bd89fd6a9d4ad9f.jpg', '', 1, 0, '2021-01-28 23:18:44', 0),
(3, '', 'Title', '<p>Description</p>', 'e58361bb221911bc7bd89fd6a9d4ad9f.jpg', '', 1, 0, '2021-01-28 23:25:33', 0),
(4, '', 'Title', '<p>Description</p>', 'e58361bb221911bc7bd89fd6a9d4ad9f.jpg', '', 1, 0, '2021-01-28 23:25:51', 0),
(5, '', 'Title', '<p>Description</p>', 'e58361bb221911bc7bd89fd6a9d4ad9f.jpg', '', 1, 0, '2021-01-28 23:26:05', 0),
(6, '', 'Title', '<p>Description</p>', 'e58361bb221911bc7bd89fd6a9d4ad9f.jpg', '', 1, 0, '2021-01-28 23:26:18', 0),
(7, '', 'Title', '<p>Description</p>', 'e58361bb221911bc7bd89fd6a9d4ad9f.jpg', '', 1, 0, '2021-01-28 23:27:08', 0),
(8, '', 'Title', '<p>Description</p>', 'e58361bb221911bc7bd89fd6a9d4ad9f.jpg', '', 1, 0, '2021-01-29 21:32:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `state_id` int(11) NOT NULL DEFAULT 0,
  `isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `state_id`, `isDelete`) VALUES
(1, 'Mumbai', 15, 0),
(2, 'Delhi', 0, 0),
(3, 'Bengaluru', 12, 0),
(4, 'Ahmedabad', 1, 0),
(5, 'Hyderabad', 30, 0),
(6, 'Chennai', 24, 0),
(7, 'Kolkata', 28, 0),
(8, 'Pune', 15, 0),
(9, 'Jaipur', 22, 0),
(10, 'Surat', 1, 0),
(11, 'Lucknow', 26, 0),
(12, 'Kanpur', 26, 0),
(13, 'Nagpur', 15, 0),
(14, 'Patna', 4, 0),
(15, 'Indore', 14, 0),
(16, 'Thane', 15, 0),
(17, 'Bhopal', 14, 0),
(18, 'Visakhapatnam', 7, 0),
(19, 'Vadodara', 1, 0),
(20, 'Firozabad', 26, 0),
(21, 'Ludhiana', 21, 0),
(22, 'Rajkot', 1, 0),
(23, 'Agra', 26, 0),
(24, 'Siliguri', 28, 0),
(25, 'Nashik', 15, 0),
(26, 'Faridabad', 8, 0),
(27, 'Patiala', 21, 0),
(28, 'Meerut', 26, 0),
(29, 'Kalyan-Dombivali', 15, 0),
(30, 'Vasai-Virar', 15, 0),
(31, 'Varanasi', 26, 0),
(32, 'Srinagar', 10, 0),
(33, 'Dhanbad', 11, 0),
(34, 'Jodhpur', 22, 0),
(35, 'Amritsar', 21, 0),
(36, 'Raipur', 5, 0),
(37, 'Allahabad', 26, 0),
(38, 'Coimbatore', 24, 0),
(39, 'Jabalpur', 14, 0),
(40, 'Gwalior', 14, 0),
(41, 'Vijayawada', 7, 0),
(42, 'Madurai', 24, 0),
(43, 'Guwahati', 3, 0),
(44, 'Chandigarh', 0, 0),
(45, 'Hubli-Dharwad', 12, 0),
(46, 'Amroha', 26, 0),
(47, 'Moradabad', 26, 0),
(48, 'Gurgaon', 8, 0),
(49, 'Aligarh', 26, 0),
(50, 'Solapur', 15, 0),
(51, 'Ranchi', 11, 0),
(52, 'Jalandhar', 21, 0),
(53, 'Tiruchirappalli', 24, 0),
(54, 'Bhubaneswar', 20, 0),
(55, 'Salem', 24, 0),
(56, 'Warangal', 30, 0),
(57, 'Mira-Bhayandar', 15, 0),
(58, 'Thiruvananthapuram', 13, 0),
(59, 'Bhiwandi', 15, 0),
(60, 'Saharanpur', 26, 0),
(61, 'Guntur', 7, 0),
(62, 'Amravati', 15, 0),
(63, 'Bikaner', 22, 0),
(64, 'Noida', 26, 0),
(65, 'Jamshedpur', 11, 0),
(66, 'Bhilai Nagar', 5, 0),
(67, 'Cuttack', 20, 0),
(68, 'Kochi', 13, 0),
(69, 'Udaipur', 22, 0),
(70, 'Bhavnagar', 1, 0),
(71, 'Dehradun', 27, 0),
(72, 'Asansol', 28, 0),
(73, 'Nanded-Waghala', 15, 0),
(74, 'Ajmer', 22, 0),
(75, 'Jamnagar', 1, 0),
(76, 'Ujjain', 14, 0),
(77, 'Sangli', 15, 0),
(78, 'Loni', 26, 0),
(79, 'Jhansi', 26, 0),
(80, 'Pondicherry', 29, 0),
(81, 'Nellore', 7, 0),
(82, 'Jammu', 10, 0),
(83, 'Belagavi', 12, 0),
(84, 'Raurkela', 20, 0),
(85, 'Mangaluru', 12, 0),
(86, 'Tirunelveli', 24, 0),
(87, 'Malegaon', 15, 0),
(88, 'Gaya', 4, 0),
(89, 'Tiruppur', 24, 0),
(90, 'Davanagere', 12, 0),
(91, 'Kozhikode', 13, 0),
(92, 'Akola', 15, 0),
(93, 'Kurnool', 7, 0),
(94, 'Bokaro Steel City', 11, 0),
(95, 'Rajahmundry', 7, 0),
(96, 'Ballari', 12, 0),
(97, 'Agartala', 25, 0),
(98, 'Bhagalpur', 4, 0),
(99, 'Latur', 15, 0),
(100, 'Dhule', 15, 0),
(101, 'Korba', 5, 0),
(102, 'Bhilwara', 22, 0),
(103, 'Brahmapur', 20, 0),
(104, 'Mysore', 0, 0),
(105, 'Muzaffarpur', 4, 0),
(106, 'Ahmednagar', 15, 0),
(107, 'Kollam', 13, 0),
(108, 'Raghunathganj', 28, 0),
(109, 'Bilaspur', 5, 0),
(110, 'Shahjahanpur', 26, 0),
(111, 'Thrissur', 13, 0),
(112, 'Alwar', 22, 0),
(113, 'Kakinada', 7, 0),
(114, 'Nizamabad', 30, 0),
(115, 'Sagar', 14, 0),
(116, 'Tumkur', 12, 0),
(117, 'Hisar', 8, 0),
(118, 'Rohtak', 8, 0),
(119, 'Panipat', 8, 0),
(120, 'Darbhanga', 4, 0),
(121, 'Kharagpur', 28, 0),
(122, 'Aizawl', 18, 0),
(123, 'Ichalkaranji', 15, 0),
(124, 'Tirupati', 7, 0),
(125, 'Karnal', 8, 0),
(126, 'Bathinda', 21, 0),
(127, 'Rampur', 26, 0),
(128, 'Shivamogga', 12, 0),
(129, 'Ratlam', 14, 0),
(130, 'Modinagar', 26, 0),
(131, 'Durg', 5, 0),
(132, 'Shillong', 17, 0),
(133, 'Imphal', 16, 0),
(134, 'Hapur', 26, 0),
(135, 'Ranipet', 24, 0),
(136, 'Anantapur', 7, 0),
(137, 'Arrah', 4, 0),
(138, 'Karimnagar', 30, 0),
(139, 'Parbhani', 15, 0),
(140, 'Etawah', 26, 0),
(141, 'Bharatpur', 22, 0),
(142, 'Begusarai', 4, 0),
(143, 'New Delhi', 0, 0),
(144, 'Chhapra', 4, 0),
(145, 'Kadapa', 7, 0),
(146, 'Ramagundam', 30, 0),
(147, 'Pali', 22, 0),
(148, 'Satna', 14, 0),
(149, 'Vizianagaram', 7, 0),
(150, 'Katihar', 4, 0),
(151, 'Hardwar', 27, 0),
(152, 'Sonipat', 8, 0),
(153, 'Nagercoil', 24, 0),
(154, 'Thanjavur', 24, 0),
(155, 'Murwara (Katni)', 14, 0),
(156, 'Naihati', 28, 0),
(157, 'Sambhal', 26, 0),
(158, 'Nadiad', 1, 0),
(159, 'Yamunanagar', 8, 0),
(160, 'English Bazar', 28, 0),
(161, 'Eluru', 7, 0),
(162, 'Munger', 4, 0),
(163, 'Panchkula', 8, 0),
(164, 'Raayachuru', 12, 0),
(165, 'Panvel', 15, 0),
(166, 'Deoghar', 11, 0),
(167, 'Ongole', 7, 0),
(168, 'Nandyal', 7, 0),
(169, 'Morena', 14, 0),
(170, 'Bhiwani', 8, 0),
(171, 'Porbandar', 1, 0),
(172, 'Palakkad', 13, 0),
(173, 'Anand', 1, 0),
(174, 'Purnia', 4, 0),
(175, 'Baharampur', 28, 0),
(176, 'Barmer', 22, 0),
(177, 'Morbi', 1, 0),
(178, 'Orai', 26, 0),
(179, 'Bahraich', 26, 0),
(180, 'Sikar', 22, 0),
(181, 'Vellore', 24, 0),
(182, 'Singrauli', 14, 0),
(183, 'Khammam', 30, 0),
(184, 'Mahesana', 1, 0),
(185, 'Silchar', 3, 0),
(186, 'Sambalpur', 20, 0),
(187, 'Rewa', 14, 0),
(188, 'Unnao', 26, 0),
(189, 'Hugli-Chinsurah', 28, 0),
(190, 'Raiganj', 28, 0),
(191, 'Phusro', 11, 0),
(192, 'Adityapur', 11, 0),
(193, 'Alappuzha', 13, 0),
(194, 'Bahadurgarh', 8, 0),
(195, 'Machilipatnam', 7, 0),
(196, 'Rae Bareli', 26, 0),
(197, 'Jalpaiguri', 28, 0),
(198, 'Bharuch', 1, 0),
(199, 'Pathankot', 21, 0),
(200, 'Hoshiarpur', 21, 0),
(201, 'Baramula', 10, 0),
(202, 'Adoni', 7, 0),
(203, 'Jind', 8, 0),
(204, 'Tonk', 22, 0),
(205, 'Tenali', 7, 0),
(206, 'Kancheepuram', 24, 0),
(207, 'Vapi', 1, 0),
(208, 'Sirsa', 8, 0),
(209, 'Navsari', 1, 0),
(210, 'Mahbubnagar', 30, 0),
(211, 'Puri', 20, 0),
(212, 'Robertson Pet', 12, 0),
(213, 'Erode', 24, 0),
(214, 'Batala', 21, 0),
(215, 'Haldwani-cum-Kathgodam', 27, 0),
(216, 'Vidisha', 14, 0),
(217, 'Saharsa', 4, 0),
(218, 'Thanesar', 8, 0),
(219, 'Chittoor', 7, 0),
(220, 'Veraval', 1, 0),
(221, 'Lakhimpur', 26, 0),
(222, 'Sitapur', 26, 0),
(223, 'Hindupur', 7, 0),
(224, 'Santipur', 28, 0),
(225, 'Balurghat', 28, 0),
(226, 'Ganjbasoda', 14, 0),
(227, 'Moga', 21, 0),
(228, 'Proddatur', 7, 0),
(229, 'Srinagar', 27, 0),
(230, 'Medinipur', 28, 0),
(231, 'Habra', 28, 0),
(232, 'Sasaram', 4, 0),
(233, 'Hajipur', 4, 0),
(234, 'Bhuj', 1, 0),
(235, 'Shivpuri', 14, 0),
(236, 'Ranaghat', 28, 0),
(237, 'Shimla', 9, 0),
(238, 'Tiruvannamalai', 24, 0),
(239, 'Kaithal', 8, 0),
(240, 'Rajnandgaon', 5, 0),
(241, 'Godhra', 1, 0),
(242, 'Hazaribag', 11, 0),
(243, 'Bhimavaram', 7, 0),
(244, 'Mandsaur', 14, 0),
(245, 'Dibrugarh', 3, 0),
(246, 'Kolar', 12, 0),
(247, 'Bankura', 28, 0),
(248, 'Mandya', 12, 0),
(249, 'Dehri-on-Sone', 4, 0),
(250, 'Madanapalle', 7, 0),
(251, 'Malerkotla', 21, 0),
(252, 'Lalitpur', 26, 0),
(253, 'Bettiah', 4, 0),
(254, 'Pollachi', 24, 0),
(255, 'Khanna', 21, 0),
(256, 'Neemuch', 14, 0),
(257, 'Palwal', 8, 0),
(258, 'Palanpur', 1, 0),
(259, 'Guntakal', 7, 0),
(260, 'Nabadwip', 28, 0),
(261, 'Udupi', 12, 0),
(262, 'Jagdalpur', 5, 0),
(263, 'Motihari', 4, 0),
(264, 'Pilibhit', 26, 0),
(265, 'Dimapur', 19, 0),
(266, 'Mohali', 21, 0),
(267, 'Sadulpur', 22, 0),
(268, 'Rajapalayam', 24, 0),
(269, 'Dharmavaram', 7, 0),
(270, 'Kashipur', 27, 0),
(271, 'Sivakasi', 24, 0),
(272, 'Darjiling', 28, 0),
(273, 'Chikkamagaluru', 12, 0),
(274, 'Gudivada', 7, 0),
(275, 'Baleshwar Town', 20, 0),
(276, 'Mancherial', 30, 0),
(277, 'Srikakulam', 7, 0),
(278, 'Adilabad', 30, 0),
(279, 'Yavatmal', 15, 0),
(280, 'Barnala', 21, 0),
(281, 'Nagaon', 3, 0),
(282, 'Narasaraopet', 7, 0),
(283, 'Raigarh', 5, 0),
(284, 'Roorkee', 27, 0),
(285, 'Valsad', 1, 0),
(286, 'Ambikapur', 5, 0),
(287, 'Giridih', 11, 0),
(288, 'Chandausi', 26, 0),
(289, 'Purulia', 28, 0),
(290, 'Patan', 1, 0),
(291, 'Bagaha', 4, 0),
(292, 'Hardoi ', 26, 0),
(293, 'Achalpur', 15, 0),
(294, 'Osmanabad', 15, 0),
(295, 'Deesa', 1, 0),
(296, 'Nandurbar', 15, 0),
(297, 'Azamgarh', 26, 0),
(298, 'Ramgarh', 11, 0),
(299, 'Firozpur', 21, 0),
(300, 'Baripada Town', 20, 0),
(301, 'Karwar', 12, 0),
(302, 'Siwan', 4, 0),
(303, 'Rajampet', 7, 0),
(304, 'Pudukkottai', 24, 0),
(305, 'Anantnag', 10, 0),
(306, 'Tadpatri', 7, 0),
(307, 'Satara', 15, 0),
(308, 'Bhadrak', 20, 0),
(309, 'Kishanganj', 4, 0),
(310, 'Suryapet', 30, 0),
(311, 'Wardha', 15, 0),
(312, 'Ranebennuru', 12, 0),
(313, 'Amreli', 1, 0),
(314, 'Neyveli (TS)', 24, 0),
(315, 'Jamalpur', 4, 0),
(316, 'Marmagao', 6, 0),
(317, 'Udgir', 15, 0),
(318, 'Tadepalligudem', 7, 0),
(319, 'Nagapattinam', 24, 0),
(320, 'Buxar', 4, 0),
(321, 'Aurangabad', 15, 0),
(322, 'Jehanabad', 4, 0),
(323, 'Phagwara', 21, 0),
(324, 'Khair', 26, 0),
(325, 'Sawai Madhopur', 22, 0),
(326, 'Kapurthala', 21, 0),
(327, 'Chilakaluripet', 7, 0),
(328, 'Aurangabad', 4, 0),
(329, 'Malappuram', 13, 0),
(330, 'Rewari', 8, 0),
(331, 'Nagaur', 22, 0),
(332, 'Sultanpur', 26, 0),
(333, 'Nagda', 14, 0),
(334, 'Port Blair', 0, 0),
(335, 'Lakhisarai', 4, 0),
(336, 'Panaji', 6, 0),
(337, 'Tinsukia', 3, 0),
(338, 'Itarsi', 14, 0),
(339, 'Kohima', 19, 0),
(340, 'Balangir', 20, 0),
(341, 'Nawada', 4, 0),
(342, 'Jharsuguda', 20, 0),
(343, 'Jagtial', 30, 0),
(344, 'Viluppuram', 24, 0),
(345, 'Amalner', 15, 0),
(346, 'Zirakpur', 21, 0),
(347, 'Tanda', 26, 0),
(348, 'Tiruchengode', 24, 0),
(349, 'Nagina', 26, 0),
(350, 'Yemmiganur', 7, 0),
(351, 'Vaniyambadi', 24, 0),
(352, 'Sarni', 14, 0),
(353, 'Theni Allinagaram', 24, 0),
(354, 'Margao', 6, 0),
(355, 'Akot', 15, 0),
(356, 'Sehore', 14, 0),
(357, 'Mhow Cantonment', 14, 0),
(358, 'Kot Kapura', 21, 0),
(359, 'Makrana', 22, 0),
(360, 'Pandharpur', 15, 0),
(361, 'Miryalaguda', 30, 0),
(362, 'Shamli', 26, 0),
(363, 'Seoni', 14, 0),
(364, 'Ranibennur', 12, 0),
(365, 'Kadiri', 7, 0),
(366, 'Shrirampur', 15, 0),
(367, 'Rudrapur', 27, 0),
(368, 'Parli', 15, 0),
(369, 'Najibabad', 26, 0),
(370, 'Nirmal', 30, 0),
(371, 'Udhagamandalam', 24, 0),
(372, 'Shikohabad', 26, 0),
(373, 'Jhumri Tilaiya', 11, 0),
(374, 'Aruppukkottai', 24, 0),
(375, 'Ponnani', 13, 0),
(376, 'Jamui', 4, 0),
(377, 'Sitamarhi', 4, 0),
(378, 'Chirala', 7, 0),
(379, 'Anjar', 1, 0),
(380, 'Karaikal', 29, 0),
(381, 'Hansi', 8, 0),
(382, 'Anakapalle', 7, 0),
(383, 'Mahasamund', 5, 0),
(384, 'Faridkot', 21, 0),
(385, 'Saunda', 11, 0),
(386, 'Dhoraji', 1, 0),
(387, 'Paramakudi', 24, 0),
(388, 'Balaghat', 14, 0),
(389, 'Sujangarh', 22, 0),
(390, 'Khambhat', 1, 0),
(391, 'Muktsar', 21, 0),
(392, 'Rajpura', 21, 0),
(393, 'Kavali', 7, 0),
(394, 'Dhamtari', 5, 0),
(395, 'Ashok Nagar', 14, 0),
(396, 'Sardarshahar', 22, 0),
(397, 'Mahuva', 1, 0),
(398, 'Bargarh', 20, 0),
(399, 'Kamareddy', 30, 0),
(400, 'Sahibganj', 11, 0),
(401, 'Kothagudem', 30, 0),
(402, 'Ramanagaram', 12, 0),
(403, 'Gokak', 12, 0),
(404, 'Tikamgarh', 14, 0),
(405, 'Araria', 4, 0),
(406, 'Rishikesh', 27, 0),
(407, 'Shahdol', 14, 0),
(408, 'Medininagar (Daltonganj)', 11, 0),
(409, 'Arakkonam', 24, 0),
(410, 'Washim', 15, 0),
(411, 'Sangrur', 21, 0),
(412, 'Bodhan', 30, 0),
(413, 'Fazilka', 21, 0),
(414, 'Palacole', 7, 0),
(415, 'Keshod', 1, 0),
(416, 'Sullurpeta', 7, 0),
(417, 'Wadhwan', 1, 0),
(418, 'Gurdaspur', 21, 0),
(419, 'Vatakara', 13, 0),
(420, 'Tura', 17, 0),
(421, 'Narnaul', 8, 0),
(422, 'Kharar', 21, 0),
(423, 'Yadgir', 12, 0),
(424, 'Ambejogai', 15, 0),
(425, 'Ankleshwar', 1, 0),
(426, 'Savarkundla', 1, 0),
(427, 'Paradip', 20, 0),
(428, 'Virudhachalam', 24, 0),
(429, 'Kanhangad', 13, 0),
(430, 'Kadi', 1, 0),
(431, 'Srivilliputhur', 24, 0),
(432, 'Gobindgarh', 21, 0),
(433, 'Tindivanam', 24, 0),
(434, 'Mansa', 21, 0),
(435, 'Taliparamba', 13, 0),
(436, 'Manmad', 15, 0),
(437, 'Tanuku', 7, 0),
(438, 'Rayachoti', 7, 0),
(439, 'Virudhunagar', 24, 0),
(440, 'Koyilandy', 13, 0),
(441, 'Jorhat', 3, 0),
(442, 'Karur', 24, 0),
(443, 'Valparai', 24, 0),
(444, 'Srikalahasti', 7, 0),
(445, 'Neyyattinkara', 13, 0),
(446, 'Bapatla', 7, 0),
(447, 'Fatehabad', 8, 0),
(448, 'Malout', 21, 0),
(449, 'Sankarankovil', 24, 0),
(450, 'Tenkasi', 24, 0),
(451, 'Ratnagiri', 15, 0),
(452, 'Rabkavi Banhatti', 12, 0),
(453, 'Sikandrabad', 26, 0),
(454, 'Chaibasa', 11, 0),
(455, 'Chirmiri', 5, 0),
(456, 'Palwancha', 30, 0),
(457, 'Bhawanipatna', 20, 0),
(458, 'Kayamkulam', 13, 0),
(459, 'Pithampur', 14, 0),
(460, 'Nabha', 21, 0),
(461, 'Shahabad, Hardoi', 26, 0),
(462, 'Dhenkanal', 20, 0),
(463, 'Uran Islampur', 15, 0),
(464, 'Gopalganj', 4, 0),
(465, 'Bongaigaon City', 3, 0),
(466, 'Palani', 24, 0),
(467, 'Pusad', 15, 0),
(468, 'Sopore', 10, 0),
(469, 'Pilkhuwa', 26, 0),
(470, 'Tarn Taran', 21, 0),
(471, 'Renukoot', 26, 0),
(472, 'Mandamarri', 30, 0),
(473, 'Shahabad', 12, 0),
(474, 'Barbil', 20, 0),
(475, 'Koratla', 30, 0),
(476, 'Madhubani', 4, 0),
(477, 'Arambagh', 28, 0),
(478, 'Gohana', 8, 0),
(479, 'Ladnu', 22, 0),
(480, 'Pattukkottai', 24, 0),
(481, 'Sirsi', 12, 0),
(482, 'Sircilla', 30, 0),
(483, 'Tamluk', 28, 0),
(484, 'Jagraon', 21, 0),
(485, 'AlipurdUrban Agglomerationr', 28, 0),
(486, 'Alirajpur', 14, 0),
(487, 'Tandur', 30, 0),
(488, 'Naidupet', 7, 0),
(489, 'Tirupathur', 24, 0),
(490, 'Tohana', 8, 0),
(491, 'Ratangarh', 22, 0),
(492, 'Dhubri', 3, 0),
(493, 'Masaurhi', 4, 0),
(494, 'Visnagar', 1, 0),
(495, 'Vrindavan', 26, 0),
(496, 'Nokha', 22, 0),
(497, 'Nagari', 7, 0),
(498, 'Narwana', 8, 0),
(499, 'Ramanathapuram', 24, 0),
(500, 'Ujhani', 26, 0),
(501, 'Samastipur', 4, 0),
(502, 'Laharpur', 26, 0),
(503, 'Sangamner', 15, 0),
(504, 'Nimbahera', 22, 0),
(505, 'Siddipet', 30, 0),
(506, 'Suri', 28, 0),
(507, 'Diphu', 3, 0),
(508, 'Jhargram', 28, 0),
(509, 'Shirpur-Warwade', 15, 0),
(510, 'Tilhar', 26, 0),
(511, 'Sindhnur', 12, 0),
(512, 'Udumalaipettai', 24, 0),
(513, 'Malkapur', 15, 0),
(514, 'Wanaparthy', 30, 0),
(515, 'Gudur', 7, 0),
(516, 'Kendujhar', 20, 0),
(517, 'Mandla', 14, 0),
(518, 'Mandi', 9, 0),
(519, 'Nedumangad', 13, 0),
(520, 'North Lakhimpur', 3, 0),
(521, 'Vinukonda', 7, 0),
(522, 'Tiptur', 12, 0),
(523, 'Gobichettipalayam', 24, 0),
(524, 'Sunabeda', 20, 0),
(525, 'Wani', 15, 0),
(526, 'Upleta', 1, 0),
(527, 'Narasapuram', 7, 0),
(528, 'Nuzvid', 7, 0),
(529, 'Tezpur', 3, 0),
(530, 'Una', 1, 0),
(531, 'Markapur', 7, 0),
(532, 'Sheopur', 14, 0),
(533, 'Thiruvarur', 24, 0),
(534, 'Sidhpur', 1, 0),
(535, 'Sahaswan', 26, 0),
(536, 'Suratgarh', 22, 0),
(537, 'Shajapur', 14, 0),
(538, 'Rayagada', 20, 0),
(539, 'Lonavla', 15, 0),
(540, 'Ponnur', 7, 0),
(541, 'Kagaznagar', 30, 0),
(542, 'Gadwal', 30, 0),
(543, 'Bhatapara', 5, 0),
(544, 'Kandukur', 7, 0),
(545, 'Sangareddy', 30, 0),
(546, 'Unjha', 1, 0),
(547, 'Lunglei', 18, 0),
(548, 'Karimganj', 3, 0),
(549, 'Kannur', 13, 0),
(550, 'Bobbili', 7, 0),
(551, 'Mokameh', 4, 0),
(552, 'Talegaon Dabhade', 15, 0),
(553, 'Anjangaon', 15, 0),
(554, 'Mangrol', 1, 0),
(555, 'Sunam', 21, 0),
(556, 'Gangarampur', 28, 0),
(557, 'Thiruvallur', 24, 0),
(558, 'Tirur', 13, 0),
(559, 'Rath', 26, 0),
(560, 'Jatani', 20, 0),
(561, 'Viramgam', 1, 0),
(562, 'Rajsamand', 22, 0),
(563, 'Yanam', 29, 0),
(564, 'Kottayam', 13, 0),
(565, 'Panruti', 24, 0),
(566, 'Dhuri', 21, 0),
(567, 'Namakkal', 24, 0),
(568, 'Kasaragod', 13, 0),
(569, 'Modasa', 1, 0),
(570, 'Rayadurg', 7, 0),
(571, 'Supaul', 4, 0),
(572, 'Kunnamkulam', 13, 0),
(573, 'Umred', 15, 0),
(574, 'Bellampalle', 30, 0),
(575, 'Sibsagar', 3, 0),
(576, 'Mandi Dabwali', 8, 0),
(577, 'Ottappalam', 13, 0),
(578, 'Dumraon', 4, 0),
(579, 'Samalkot', 7, 0),
(580, 'Jaggaiahpet', 7, 0),
(581, '6lpara', 3, 0),
(582, 'Tuni', 7, 0),
(583, 'Lachhmangarh', 22, 0),
(584, 'Bhongir', 30, 0),
(585, 'Amalapuram', 7, 0),
(586, 'Firozpur Cantt.', 21, 0),
(587, 'Vikarabad', 30, 0),
(588, 'Thiruvalla', 13, 0),
(589, 'Sherkot', 26, 0),
(590, 'Palghar', 15, 0),
(591, 'Shegaon', 15, 0),
(592, 'Jangaon', 30, 0),
(593, 'Bheemunipatnam', 7, 0),
(594, 'Panna', 14, 0),
(595, 'Thodupuzha', 13, 0),
(596, 'KathUrban Agglomeration', 10, 0),
(597, 'Palitana', 1, 0),
(598, 'Arwal', 4, 0),
(599, 'Venkatagiri', 7, 0),
(600, 'Kalpi', 26, 0),
(601, 'Rajgarh (Churu)', 22, 0),
(602, 'Sattenapalle', 7, 0),
(603, 'Arsikere', 12, 0),
(604, 'Ozar', 15, 0),
(605, 'Thirumangalam', 24, 0),
(606, 'Petlad', 1, 0),
(607, 'Nasirabad', 22, 0),
(608, 'Phaltan', 15, 0),
(609, 'Rampurhat', 28, 0),
(610, 'Nanjangud', 12, 0),
(611, 'Forbesganj', 4, 0),
(612, 'Tundla', 26, 0),
(613, 'BhabUrban Agglomeration', 4, 0),
(614, 'Sagara', 12, 0),
(615, 'Pithapuram', 7, 0),
(616, 'Sira', 12, 0),
(617, 'Bhadrachalam', 30, 0),
(618, 'Charkhi Dadri', 8, 0),
(619, 'Chatra', 11, 0),
(620, 'Palasa Kasibugga', 7, 0),
(621, 'Nohar', 22, 0),
(622, 'Yevla', 15, 0),
(623, 'Sirhind Fatehgarh Sahib', 21, 0),
(624, 'Bhainsa', 30, 0),
(625, 'Parvathipuram', 7, 0),
(626, 'Shahade', 15, 0),
(627, 'Chalakudy', 13, 0),
(628, 'Narkatiaganj', 4, 0),
(629, 'Kapadvanj', 1, 0),
(630, 'Macherla', 7, 0),
(631, 'Raghogarh-Vijaypur', 14, 0),
(632, 'Rupnagar', 21, 0),
(633, 'Naugachhia', 4, 0),
(634, 'Sendhwa', 14, 0),
(635, 'Byasanagar', 20, 0),
(636, 'Sandila', 26, 0),
(637, 'Gooty', 7, 0),
(638, 'Salur', 7, 0),
(639, 'Nanpara', 26, 0),
(640, 'Sardhana', 26, 0),
(641, 'Vita', 15, 0),
(642, 'Gumia', 11, 0),
(643, 'Puttur', 12, 0),
(644, 'Jalandhar Cantt.', 21, 0),
(645, 'Nehtaur', 26, 0),
(646, 'Changanassery', 13, 0),
(647, 'Mandapeta', 7, 0),
(648, 'Dumka', 11, 0),
(649, 'Seohara', 26, 0),
(650, 'Umarkhed', 15, 0),
(651, 'Madhupur', 11, 0),
(652, 'Vikramasingapuram', 24, 0),
(653, 'Punalur', 13, 0),
(654, 'Kendrapara', 20, 0),
(655, 'Sihor', 1, 0),
(656, 'Nellikuppam', 24, 0),
(657, 'Samana', 21, 0),
(658, 'Warora', 15, 0),
(659, 'Nilambur', 13, 0),
(660, 'Rasipuram', 24, 0),
(661, 'Ramnagar', 27, 0),
(662, 'Jammalamadugu', 7, 0),
(663, 'Nawanshahr', 21, 0),
(664, 'Thoubal', 16, 0),
(665, 'Athni', 12, 0),
(666, 'Cherthala', 13, 0),
(667, 'Sidhi', 14, 0),
(668, 'Farooqnagar', 30, 0),
(669, 'Peddapuram', 7, 0),
(670, 'Chirkunda', 11, 0),
(671, 'Pachora', 15, 0),
(672, 'Madhepura', 4, 0),
(673, 'Pithoragarh', 27, 0),
(674, 'Tumsar', 15, 0),
(675, 'Phalodi', 22, 0),
(676, 'Tiruttani', 24, 0),
(677, 'Rampura Phul', 21, 0),
(678, 'Perinthalmanna', 13, 0),
(679, 'Padrauna', 26, 0),
(680, 'Pipariya', 14, 0),
(681, 'Dalli-Rajhara', 5, 0),
(682, 'Punganur', 7, 0),
(683, 'Mattannur', 13, 0),
(684, 'Mathura', 26, 0),
(685, 'Thakurdwara', 26, 0),
(686, 'Nandivaram-Guduvancheri', 24, 0),
(687, 'Mulbagal', 12, 0),
(688, 'Manjlegaon', 15, 0),
(689, 'Wankaner', 1, 0),
(690, 'Sillod', 15, 0),
(691, 'Nidadavole', 7, 0),
(692, 'Surapura', 12, 0),
(693, 'Rajagangapur', 20, 0),
(694, 'Sheikhpura', 4, 0),
(695, 'Parlakhemundi', 20, 0),
(696, 'Kalimpong', 28, 0),
(697, 'Siruguppa', 12, 0),
(698, 'Arvi', 15, 0),
(699, 'Limbdi', 1, 0),
(700, 'Barpeta', 3, 0),
(701, 'Manglaur', 27, 0),
(702, 'Repalle', 7, 0),
(703, 'Mudhol', 12, 0),
(704, 'Shujalpur', 14, 0),
(705, 'Mandvi', 1, 0),
(706, 'Thangadh', 1, 0),
(707, 'Sironj', 14, 0),
(708, 'Nandura', 15, 0),
(709, 'Shoranur', 13, 0),
(710, 'Nathdwara', 22, 0),
(711, 'Periyakulam', 24, 0),
(712, 'Sultanganj', 4, 0),
(713, 'Medak', 30, 0),
(714, 'Narayanpet', 30, 0),
(715, 'Raxaul Bazar', 4, 0),
(716, 'Rajauri', 10, 0),
(717, 'Pernampattu', 24, 0),
(718, 'Nainital', 27, 0),
(719, 'Ramachandrapuram', 7, 0),
(720, 'Vaijapur', 15, 0),
(721, 'Nangal', 21, 0),
(722, 'Sidlaghatta', 12, 0),
(723, 'Punch', 10, 0),
(724, 'Pandhurna', 14, 0),
(725, 'Wadgaon Road', 15, 0),
(726, 'Talcher', 20, 0),
(727, 'Varkala', 13, 0),
(728, 'Pilani', 22, 0),
(729, 'Nowgong', 14, 0),
(730, 'Naila Janjgir', 5, 0),
(731, 'Mapusa', 6, 0),
(732, 'Vellakoil', 24, 0),
(733, 'Merta City', 22, 0),
(734, 'Sivaganga', 24, 0),
(735, 'Mandideep', 14, 0),
(736, 'Sailu', 15, 0),
(737, 'Vyara', 1, 0),
(738, 'Kovvur', 7, 0),
(739, 'Vadalur', 24, 0),
(740, 'Nawabganj', 26, 0),
(741, 'Padra', 1, 0),
(742, 'Sainthia', 28, 0),
(743, 'Siana', 26, 0),
(744, 'Shahpur', 12, 0),
(745, 'Sojat', 22, 0),
(746, 'Noorpur', 26, 0),
(747, 'Paravoor', 13, 0),
(748, 'Murtijapur', 15, 0),
(749, 'Ramnagar', 4, 0),
(750, 'Sundargarh', 20, 0),
(751, 'Taki', 28, 0),
(752, 'Saundatti-Yellamma', 12, 0),
(753, 'Pathanamthitta', 13, 0),
(754, 'Wadi', 12, 0),
(755, 'Rameshwaram', 24, 0),
(756, 'Tasgaon', 15, 0),
(757, 'Sikandra Rao', 26, 0),
(758, 'Sihora', 14, 0),
(759, 'Tiruvethipuram', 24, 0),
(760, 'Tiruvuru', 7, 0),
(761, 'Mehkar', 15, 0),
(762, 'Peringathur', 13, 0),
(763, 'Perambalur', 24, 0),
(764, 'Manvi', 12, 0),
(765, 'Zunheboto', 19, 0),
(766, 'Mahnar Bazar', 4, 0),
(767, 'Attingal', 13, 0),
(768, 'Shahbad', 8, 0),
(769, 'Puranpur', 26, 0),
(770, 'Nelamangala', 12, 0),
(771, 'Nakodar', 21, 0),
(772, 'Lunawada', 1, 0),
(773, 'Murshidabad', 28, 0),
(774, 'Mahe', 29, 0),
(775, 'Lanka', 3, 0),
(776, 'Rudauli', 26, 0),
(777, 'Tuensang', 19, 0),
(778, 'Lakshmeshwar', 12, 0),
(779, 'Zira', 21, 0),
(780, 'Yawal', 15, 0),
(781, 'Thana Bhawan', 26, 0),
(782, 'Ramdurg', 12, 0),
(783, 'Pulgaon', 15, 0),
(784, 'Sadasivpet', 30, 0),
(785, 'Nargund', 12, 0),
(786, 'Neem-Ka-Thana', 22, 0),
(787, 'Memari', 28, 0),
(788, 'Nilanga', 15, 0),
(789, 'Naharlagun', 2, 0),
(790, 'Pakaur', 11, 0),
(791, 'Wai', 15, 0),
(792, 'Tarikere', 12, 0),
(793, 'Malavalli', 12, 0),
(794, 'Raisen', 14, 0),
(795, 'Lahar', 14, 0),
(796, 'Uravakonda', 7, 0),
(797, 'Savanur', 12, 0),
(798, 'Sirohi', 22, 0),
(799, 'Udhampur', 10, 0),
(800, 'Umarga', 15, 0),
(801, 'Pratapgarh', 22, 0),
(802, 'Lingsugur', 12, 0),
(803, 'Usilampatti', 24, 0),
(804, 'Palia Kalan', 26, 0),
(805, 'Wokha', 19, 0),
(806, 'Rajpipla', 1, 0),
(807, 'Vijayapura', 12, 0),
(808, 'Rawatbhata', 22, 0),
(809, 'Sangaria', 22, 0),
(810, 'Paithan', 15, 0),
(811, 'Rahuri', 15, 0),
(812, 'Patti', 21, 0),
(813, 'Zaidpur', 26, 0),
(814, 'Lalsot', 22, 0),
(815, 'Maihar', 14, 0),
(816, 'Vedaranyam', 24, 0),
(817, 'Nawapur', 15, 0),
(818, 'Solan', 9, 0),
(819, 'Vapi', 1, 0),
(820, 'Sanawad', 14, 0),
(821, 'Warisaliganj', 4, 0),
(822, 'Revelganj', 4, 0),
(823, 'Sabalgarh', 14, 0),
(824, 'Tuljapur', 15, 0),
(825, 'Simdega', 11, 0),
(826, 'Musabani', 11, 0),
(827, 'Kodungallur', 13, 0),
(828, 'Phulabani', 20, 0),
(829, 'Umreth', 1, 0),
(830, 'Narsipatnam', 7, 0),
(831, 'Nautanwa', 26, 0),
(832, 'Rajgir', 4, 0),
(833, 'Yellandu', 30, 0),
(834, 'Sathyamangalam', 24, 0),
(835, 'Pilibanga', 22, 0),
(836, 'Morshi', 15, 0),
(837, 'Pehowa', 8, 0),
(838, 'Sonepur', 4, 0),
(839, 'Pappinisseri', 13, 0),
(840, 'Zamania', 26, 0),
(841, 'Mihijam', 11, 0),
(842, 'Purna', 15, 0),
(843, 'Puliyankudi', 24, 0),
(844, 'Shikarpur, Bulandshahr', 26, 0),
(845, 'Umaria', 14, 0),
(846, 'Porsa', 14, 0),
(847, 'Naugawan Sadat', 26, 0),
(848, 'Fatehpur Sikri', 26, 0),
(849, 'Manuguru', 30, 0),
(850, 'Udaipur', 25, 0),
(851, 'Pipar City', 22, 0),
(852, 'Pattamundai', 20, 0),
(853, 'Nanjikottai', 24, 0),
(854, 'Taranagar', 22, 0),
(855, 'Yerraguntla', 7, 0),
(856, 'Satana', 15, 0),
(857, 'Sherghati', 4, 0),
(858, 'Sankeshwara', 12, 0),
(859, 'Madikeri', 12, 0),
(860, 'Thuraiyur', 24, 0),
(861, 'Sanand', 1, 0),
(862, 'Rajula', 1, 0),
(863, 'Kyathampalle', 30, 0),
(864, 'Shahabad, Rampur', 26, 0),
(865, 'Tilda Newra', 5, 0),
(866, 'Narsinghgarh', 14, 0),
(867, 'Chittur-Thathamangalam', 13, 0),
(868, 'Malaj Khand', 14, 0),
(869, 'Sarangpur', 14, 0),
(870, 'Robertsganj', 26, 0),
(871, 'Sirkali', 24, 0),
(872, 'Radhanpur', 1, 0),
(873, 'Tiruchendur', 24, 0),
(874, 'Utraula', 26, 0),
(875, 'Patratu', 11, 0),
(876, 'Vijainagar, Ajmer', 22, 0),
(877, 'Periyasemur', 24, 0),
(878, 'Pathri', 15, 0),
(879, 'Sadabad', 26, 0),
(880, 'Talikota', 12, 0),
(881, 'Sinnar', 15, 0),
(882, 'Mungeli', 5, 0),
(883, 'Sedam', 12, 0),
(884, 'Shikaripur', 12, 0),
(885, 'Sumerpur', 22, 0),
(886, 'Sattur', 24, 0),
(887, 'Sugauli', 4, 0),
(888, 'Lumding', 3, 0),
(889, 'Vandavasi', 24, 0),
(890, 'Titlagarh', 20, 0),
(891, 'Uchgaon', 15, 0),
(892, 'Mokokchung', 19, 0),
(893, 'Paschim Punropara', 28, 0),
(894, 'Sagwara', 22, 0),
(895, 'Ramganj Mandi', 22, 0),
(896, 'Tarakeswar', 28, 0),
(897, 'Mahalingapura', 12, 0),
(898, 'Dharmanagar', 25, 0),
(899, 'Mahemdabad', 1, 0),
(900, 'Manendragarh', 5, 0),
(901, 'Uran', 15, 0),
(902, 'Tharamangalam', 24, 0),
(903, 'Tirukkoyilur', 24, 0),
(904, 'Pen', 15, 0),
(905, 'Makhdumpur', 4, 0),
(906, 'Maner', 4, 0),
(907, 'Oddanchatram', 24, 0),
(908, 'Palladam', 24, 0),
(909, 'Mundi', 14, 0),
(910, 'Nabarangapur', 20, 0),
(911, 'Mudalagi', 12, 0),
(912, 'Samalkha', 8, 0),
(913, 'Nepanagar', 14, 0),
(914, 'Karjat', 15, 0),
(915, 'Ranavav', 1, 0),
(916, 'Pedana', 7, 0),
(917, 'Pinjore', 8, 0),
(918, 'Lakheri', 22, 0),
(919, 'Pasan', 14, 0),
(920, 'Puttur', 7, 0),
(921, 'Vadakkuvalliyur', 24, 0),
(922, 'Tirukalukundram', 24, 0),
(923, 'Mahidpur', 14, 0),
(924, 'Mussoorie', 27, 0),
(925, 'Muvattupuzha', 13, 0),
(926, 'Rasra', 26, 0),
(927, 'Udaipurwati', 22, 0),
(928, 'Manwath', 15, 0),
(929, 'Adoor', 13, 0),
(930, 'Uthamapalayam', 24, 0),
(931, 'Partur', 15, 0),
(932, 'Nahan', 9, 0),
(933, 'Ladwa', 8, 0),
(934, 'Mankachar', 3, 0),
(935, 'Nongstoin', 17, 0),
(936, 'Losal', 22, 0),
(937, 'Sri Madhopur', 22, 0),
(938, 'Ramngarh', 22, 0),
(939, 'Mavelikkara', 13, 0),
(940, 'Rawatsar', 22, 0),
(941, 'Rajakhera', 22, 0),
(942, 'Lar', 26, 0),
(943, 'Lal Gopalganj Nindaura', 26, 0),
(944, 'Muddebihal', 12, 0),
(945, 'Sirsaganj', 26, 0),
(946, 'Shahpura', 22, 0),
(947, 'Surandai', 24, 0),
(948, 'Sangole', 15, 0),
(949, 'Pavagada', 12, 0),
(950, 'Tharad', 1, 0),
(951, 'Mansa', 1, 0),
(952, 'Umbergaon', 1, 0),
(953, 'Mavoor', 13, 0),
(954, 'Nalbari', 3, 0),
(955, 'Talaja', 1, 0),
(956, 'Malur', 12, 0),
(957, 'Mangrulpir', 15, 0),
(958, 'Soro', 20, 0),
(959, 'Shahpura', 22, 0),
(960, 'Vadnagar', 1, 0),
(961, 'Raisinghnagar', 22, 0),
(962, 'Sindhagi', 12, 0),
(963, 'Sanduru', 12, 0),
(964, 'Sohna', 8, 0),
(965, 'Manavadar', 1, 0),
(966, 'Pihani', 26, 0),
(967, 'Safidon', 8, 0),
(968, 'Risod', 15, 0),
(969, 'Rosera', 4, 0),
(970, 'Sankari', 24, 0),
(971, 'Malpura', 22, 0),
(972, 'Sonamukhi', 28, 0),
(973, 'Shamsabad, Agra', 26, 0),
(974, 'Nokha', 4, 0),
(975, 'PandUrban Agglomeration', 28, 0),
(976, 'Mainaguri', 28, 0),
(977, 'Afzalpur', 12, 0),
(978, 'Shirur', 15, 0),
(979, 'Salaya', 1, 0),
(980, 'Shenkottai', 24, 0),
(981, 'Pratapgarh', 25, 0),
(982, 'Vadipatti', 24, 0),
(983, 'Nagarkurnool', 30, 0),
(984, 'Savner', 15, 0),
(985, 'Sasvad', 15, 0),
(986, 'Rudrapur', 26, 0),
(987, 'Soron', 26, 0),
(988, 'Sholingur', 24, 0),
(989, 'Pandharkaoda', 15, 0),
(990, 'Perumbavoor', 13, 0),
(991, 'Maddur', 12, 0),
(992, 'Nadbai', 22, 0),
(993, 'Talode', 15, 0),
(994, 'Shrigonda', 15, 0),
(995, 'Madhugiri', 12, 0),
(996, 'Tekkalakote', 12, 0),
(997, 'Seoni-Malwa', 14, 0),
(998, 'Shirdi', 15, 0),
(999, 'SUrban Agglomerationr', 26, 0),
(1000, 'Terdal', 12, 0),
(1001, 'Raver', 15, 0),
(1002, 'Tirupathur', 24, 0),
(1003, 'Taraori', 8, 0),
(1004, 'Mukhed', 15, 0),
(1005, 'Manachanallur', 24, 0),
(1006, 'Rehli', 14, 0),
(1007, 'Sanchore', 22, 0),
(1008, 'Rajura', 15, 0),
(1009, 'Piro', 4, 0),
(1010, 'Mudabidri', 12, 0),
(1011, 'Vadgaon Kasba', 15, 0),
(1012, 'Nagar', 22, 0),
(1013, 'Vijapur', 1, 0),
(1014, 'Viswanatham', 24, 0),
(1015, 'Polur', 24, 0),
(1016, 'Panagudi', 24, 0),
(1017, 'Manawar', 14, 0),
(1018, 'Tehri', 27, 0),
(1019, 'Samdhan', 26, 0),
(1020, 'Pardi', 1, 0),
(1021, 'Rahatgarh', 14, 0),
(1022, 'Panagar', 14, 0),
(1023, 'Uthiramerur', 24, 0),
(1024, 'Tirora', 15, 0),
(1025, 'Rangia', 3, 0),
(1026, 'Sahjanwa', 26, 0),
(1027, 'Wara Seoni', 14, 0),
(1028, 'Magadi', 12, 0),
(1029, 'Rajgarh (Alwar)', 22, 0),
(1030, 'Rafiganj', 4, 0),
(1031, 'Tarana', 14, 0),
(1032, 'Rampur Maniharan', 26, 0),
(1033, 'Sheoganj', 22, 0),
(1034, 'Raikot', 21, 0),
(1035, 'Pauri', 27, 0),
(1036, 'Sumerpur', 26, 0),
(1037, 'Navalgund', 12, 0),
(1038, 'Shahganj', 26, 0),
(1039, 'Marhaura', 4, 0),
(1040, 'Tulsipur', 26, 0),
(1041, 'Sadri', 22, 0),
(1042, 'Thiruthuraipoondi', 24, 0),
(1043, 'Shiggaon', 12, 0),
(1044, 'Pallapatti', 24, 0),
(1045, 'Mahendragarh', 8, 0),
(1046, 'Sausar', 14, 0),
(1047, 'Ponneri', 24, 0),
(1048, 'Mahad', 15, 0),
(1049, 'Lohardaga', 11, 0),
(1050, 'Tirwaganj', 26, 0),
(1051, 'Margherita', 3, 0),
(1052, 'Sundarnagar', 9, 0),
(1053, 'Rajgarh', 14, 0),
(1054, 'Mangaldoi', 3, 0),
(1055, 'Renigunta', 7, 0),
(1056, 'Longowal', 21, 0),
(1057, 'Ratia', 8, 0),
(1058, 'Lalgudi', 24, 0),
(1059, 'Shrirangapattana', 12, 0),
(1060, 'Niwari', 14, 0),
(1061, 'Natham', 24, 0),
(1062, 'Unnamalaikadai', 24, 0),
(1063, 'PurqUrban Agglomerationzi', 26, 0),
(1064, 'Shamsabad, Farrukhabad', 26, 0),
(1065, 'Mirganj', 4, 0),
(1066, 'Todaraisingh', 22, 0),
(1067, 'Warhapur', 26, 0),
(1068, 'Rajam', 7, 0),
(1069, 'Urmar Tanda', 21, 0),
(1070, 'Lonar', 15, 0),
(1071, 'Powayan', 26, 0),
(1072, 'P.N.Patti', 24, 0),
(1073, 'Palampur', 9, 0),
(1074, 'Srisailam Project (Right Flank Colony) Township', 7, 0),
(1075, 'Sindagi', 12, 0),
(1076, 'Sandi', 26, 0),
(1077, 'Vaikom', 13, 0),
(1078, 'Malda', 28, 0),
(1079, 'Tharangambadi', 24, 0),
(1080, 'Sakaleshapura', 12, 0),
(1081, 'Lalganj', 4, 0),
(1082, 'Malkangiri', 20, 0),
(1083, 'Rapar', 1, 0),
(1084, 'Mauganj', 14, 0),
(1085, 'Todabhim', 22, 0),
(1086, 'Srinivaspur', 12, 0),
(1087, 'Murliganj', 4, 0),
(1088, 'Reengus', 22, 0),
(1089, 'Sawantwadi', 15, 0),
(1090, 'Tittakudi', 24, 0),
(1091, 'Lilong', 16, 0),
(1092, 'Rajaldesar', 22, 0),
(1093, 'Pathardi', 15, 0),
(1094, 'Achhnera', 26, 0),
(1095, 'Pacode', 24, 0),
(1096, 'Naraura', 26, 0),
(1097, 'Nakur', 26, 0),
(1098, 'Palai', 13, 0),
(1099, 'Morinda, India', 21, 0),
(1100, 'Manasa', 14, 0),
(1101, 'Nainpur', 14, 0),
(1102, 'Sahaspur', 26, 0),
(1103, 'Pauni', 15, 0),
(1104, 'Prithvipur', 14, 0),
(1105, 'Ramtek', 15, 0),
(1106, 'Silapathar', 3, 0),
(1107, 'Songadh', 1, 0),
(1108, 'Safipur', 26, 0),
(1109, 'Sohagpur', 14, 0),
(1110, 'Mul', 15, 0),
(1111, 'Sadulshahar', 22, 0),
(1112, 'Phillaur', 21, 0),
(1113, 'Sambhar', 22, 0),
(1114, 'Prantij', 22, 0),
(1115, 'Nagla', 27, 0),
(1116, 'Pattran', 21, 0),
(1117, 'Mount Abu', 22, 0),
(1118, 'Reoti', 26, 0),
(1119, 'Tenu dam-cum-Kathhara', 11, 0),
(1120, 'Panchla', 28, 0),
(1121, 'Sitarganj', 27, 0),
(1122, 'Pasighat', 2, 0),
(1123, 'Motipur', 4, 0),
(1124, 'O\' Valley', 24, 0),
(1125, 'Raghunathpur', 28, 0),
(1126, 'Suriyampalayam', 24, 0),
(1127, 'Qadian', 21, 0),
(1128, 'Rairangpur', 20, 0),
(1129, 'Silvassa', 0, 0),
(1130, 'Nowrozabad (Khodargama)', 14, 0),
(1131, 'Mangrol', 22, 0),
(1132, 'Soyagaon', 15, 0),
(1133, 'Sujanpur', 21, 0),
(1134, 'Manihari', 4, 0),
(1135, 'Sikanderpur', 26, 0),
(1136, 'Mangalvedhe', 15, 0),
(1137, 'Phulera', 22, 0),
(1138, 'Ron', 12, 0),
(1139, 'Sholavandan', 24, 0),
(1140, 'Saidpur', 26, 0),
(1141, 'Shamgarh', 14, 0),
(1142, 'Thammampatti', 24, 0),
(1143, 'Maharajpur', 14, 0),
(1144, 'Multai', 14, 0),
(1145, 'Mukerian', 21, 0),
(1146, 'Sirsi', 26, 0),
(1147, 'Purwa', 26, 0),
(1148, 'Sheohar', 4, 0),
(1149, 'Namagiripettai', 24, 0),
(1150, 'Parasi', 26, 0),
(1151, 'Lathi', 1, 0),
(1152, 'Lalganj', 26, 0),
(1153, 'Narkhed', 15, 0),
(1154, 'Mathabhanga', 28, 0),
(1155, 'Shendurjana', 15, 0),
(1156, 'Peravurani', 24, 0),
(1157, 'Mariani', 3, 0),
(1158, 'Phulpur', 26, 0),
(1159, 'Rania', 8, 0),
(1160, 'Pali', 14, 0),
(1161, 'Pachore', 14, 0),
(1162, 'Parangipettai', 24, 0),
(1163, 'Pudupattinam', 24, 0),
(1164, 'Panniyannur', 13, 0),
(1165, 'Maharajganj', 4, 0),
(1166, 'Rau', 14, 0),
(1167, 'Monoharpur', 28, 0),
(1168, 'Mandawa', 22, 0),
(1169, 'Marigaon', 3, 0),
(1170, 'Pallikonda', 24, 0),
(1171, 'Pindwara', 22, 0),
(1172, 'Shishgarh', 26, 0),
(1173, 'Patur', 15, 0),
(1174, 'Mayang Imphal', 16, 0),
(1175, 'Mhowgaon', 14, 0),
(1176, 'Guruvayoor', 13, 0),
(1177, 'Mhaswad', 15, 0),
(1178, 'Sahawar', 26, 0),
(1179, 'Sivagiri', 24, 0),
(1180, 'Mundargi', 12, 0),
(1181, 'Punjaipugalur', 24, 0),
(1182, 'Kailasahar', 25, 0),
(1183, 'Samthar', 26, 0),
(1184, 'Sakti', 5, 0),
(1185, 'Sadalagi', 12, 0),
(1186, 'Silao', 4, 0),
(1187, 'Mandalgarh', 22, 0),
(1188, 'Loha', 15, 0),
(1189, 'Pukhrayan', 26, 0),
(1190, 'Padmanabhapuram', 24, 0),
(1191, 'Belonia', 25, 0),
(1192, 'Saiha', 18, 0),
(1193, 'Srirampore', 28, 0),
(1194, 'Talwara', 21, 0),
(1195, 'Puthuppally', 13, 0),
(1196, 'Khowai', 25, 0),
(1197, 'Vijaypur', 14, 0),
(1198, 'Takhatgarh', 22, 0),
(1199, 'Thirupuvanam', 24, 0),
(1200, 'Adra', 28, 0),
(1201, 'Piriyapatna', 12, 0),
(1202, 'Obra', 26, 0),
(1203, 'Adalaj', 1, 0),
(1204, 'Nandgaon', 15, 0),
(1205, 'Barh', 4, 0),
(1206, 'Chhapra', 1, 0),
(1207, 'Panamattom', 13, 0),
(1208, 'Niwai', 26, 0),
(1209, 'Bageshwar', 27, 0),
(1210, 'Tarbha', 20, 0),
(1211, 'Adyar', 12, 0),
(1212, 'Narsinghgarh', 14, 0),
(1213, 'Warud', 15, 0),
(1214, 'Asarganj', 4, 0),
(1215, 'Sarsod', 8, 0),
(1216, 'Junagadh', 1, 0),
(1217, 'Jasdan', 1, 0),
(1218, 'Dhari', 1, 0),
(1219, 'Talala', 1, 0),
(1220, 'Jamkandorna', 1, 0),
(1221, 'Kuvadva', 1, 0),
(1222, 'Chalala', 1, 0),
(1223, 'ATKOT', 1, 0),
(1224, 'GONDAL', 1, 0),
(1225, 'WAKANER', 1, 1),
(1226, 'GARIYADHAR', 1, 0),
(1227, 'SOMNATH', 1, 0),
(1228, 'JETPUR', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_slider`
--

CREATE TABLE `client_slider` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `meta_descr` text NOT NULL,
  `price` varchar(100) NOT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_slider`
--

INSERT INTO `client_slider` (`id`, `name`, `slug`, `description`, `image_path`, `meta_descr`, `price`, `isDelete`, `isActive`, `adate`) VALUES
(1, 'client1', 'client1', '', 'cl_logo1.png', '', '', 0, 1, '2019-11-25 11:25:05'),
(2, 'client2', 'client2', '', 'cl_logo2.png', '', '', 0, 1, '2019-11-25 11:25:20'),
(3, 'client3', 'client3', '', 'cl_logo3.png', '', '', 0, 1, '2019-11-25 11:25:33'),
(4, 'client4', 'client4', '', 'cl_logo4.png', '', '', 0, 1, '2019-11-25 11:25:44'),
(5, 'hfgh', 'hfgh', '', 'cl_logo5.png', '', '', 0, 1, '2019-11-26 05:19:32'),
(6, 'client6', 'client6', '', 'cl_logo6.png', '', '', 0, 1, '2019-11-26 09:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `company_overview`
--

CREATE TABLE `company_overview` (
  `id` int(11) NOT NULL,
  `short_title` varchar(250) NOT NULL,
  `long_title` varchar(250) NOT NULL,
  `short_description` text NOT NULL,
  `big_description` text NOT NULL,
  `our_mission` varchar(300) NOT NULL,
  `our_vision` varchar(300) NOT NULL,
  `short_image_path` varchar(300) NOT NULL,
  `big_image_path` varchar(300) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `special_request` text NOT NULL,
  `location` varchar(200) NOT NULL,
  `project` int(11) NOT NULL,
  `city` varchar(150) NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `contact_no`, `subject`, `message`, `company_name`, `product_name`, `special_request`, `location`, `project`, `city`, `isDelete`, `isActive`, `created_date`, `category_name`) VALUES
(1, 'raj', 'r@gmail.com', '87878787878', 'aaa', 'hellow', '', '', '', '', 0, '', 0, 1, '2020-12-30 12:39:04', ''),
(2, 'rajdip Gondalia', 'rajdip.gondalia99@gmail.com', '09727809298', '121', 'fdg', '', '', '', '', 0, '', 0, 1, '2021-01-31 04:57:14', ''),
(3, '', 'rajdip.gondalia99@gmail.com', '', '', '', '', '', '', '', 0, '', 0, 1, '2021-01-31 10:18:57', ''),
(4, 'hjgjh', 'hjhjh@hjgjh.co', 'jhkj', 'mnbmn', 'nbmnbnm', '', '', '', '', 0, '', 0, 1, '2022-03-19 02:13:24', ''),
(5, 'hjgjh', 'hjhjh@hjgjh.co', 'jhkj', 'mnbmn', 'nbmnbnm', '', '', '', '', 0, '', 0, 1, '2022-03-19 02:22:21', ''),
(6, 'test', 'dixitbhojani0@gmail.com', 'hghghj', 'hgjh', 'hjgjhg', '', '', '', '', 0, '', 0, 1, '2022-03-19 02:26:23', ''),
(7, 'thggjh', 'dixitpatel62222@gmail.com', '56465454', 'hgjhg', 'hgjhgjh', '', '', '', '', 0, '', 0, 1, '2022-03-19 02:34:57', ''),
(8, '', '', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-19 02:52:05', ''),
(10, '', '', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-19 02:53:32', ''),
(11, '', '', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-19 02:55:09', ''),
(12, '', '', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-19 02:59:09', ''),
(13, '', '', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:08:44', ''),
(14, '', '', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:11:14', ''),
(15, '', '', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:12:17', ''),
(16, 'hgjh', 'jhghj@hgjhgj.com', '546546545', 'ghfhfgf', 'hfhgfh', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:18:29', ''),
(17, 'jjh', 'hgjhgj@hjh.com', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:20:33', ''),
(18, 'nmnbm', '', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:21:16', ''),
(19, '', '', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:25:48', ''),
(20, 'hvgjhg', 'hgjgjh@hjhgjh.com', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:30:06', ''),
(21, 'jjhkjhj', 'jhkhjhj@jhhjgj.com', '5454655469', 'hjjgh', 'hgjhgj', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:30:58', ''),
(22, 'jhjhj', 'jjhhkj@hgjhj.com', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:36:35', ''),
(23, 'hgjhg', 'hgjhgj@gfhg.com', '5464565456', 'jhjk', 'jkhkjhk\r\n', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:38:17', ''),
(24, 'hjhgj', 'dixitbhojani0@gmail.com', '5454545454', 'jhhkjkj', '\r\njjhkjhkj', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:40:33', ''),
(25, 'hgh', 'jhjgjh@hgjhgj.com', '5454656545', 'hjhgjh', 'hghjgjgh', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:53:30', ''),
(26, 'hjhkj', 'jhkj@jhgjh.com', '5445556455', 'hgjhg', 'hgjhg', '', '', '', '', 0, '', 0, 1, '2022-03-19 03:54:30', ''),
(27, 'jhkh', 'jhkj@hgjh.c', '5465655256', 'hgjhgj', 'hjgjhgjh', '', '', '', '', 0, '', 0, 1, '2022-03-19 04:54:04', ''),
(28, 'test', 'dixitpatel62222@gmail.com', '5465465455', 'test', 'et', '', '', '', '', 0, '', 0, 1, '2022-03-19 04:55:33', ''),
(29, 'test', 'dixitpatel62222@gmail.com', '5465654565', 'hgjh', 'hgjh', '', '', '', '', 0, '', 0, 1, '2022-03-19 05:00:02', ''),
(30, 'hjhgh', 'dfs@dfs.com', '4578963210', 'hgjhg', 'hgjh', '', '', '', '', 0, '', 0, 1, '2022-03-19 05:01:25', ''),
(39, 'tst=1', 'test@gmail.com', '5478963211', 'test-sub', 'test-mes', '', '', '', '', 0, '', 0, 1, '2022-03-20 02:10:37', ''),
(40, 'test', 'dixitbhojani0@gmail.com', '4578447457', 'test', 'test', '', '', '', '', 0, '', 0, 1, '2022-03-21 08:35:24', ''),
(41, '', 'test5465@gmail.com', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:23:44', ''),
(42, 'test', 'teest@ggj.com', '5465465554', 'test', 'test', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:24:47', ''),
(43, '', 'hjgjh@jhgjh.com', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:29:39', ''),
(44, '', 'sdfsdf@jhgjh', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:34:42', ''),
(45, 'jjhgjh', 'jhghjh@jhgjhj.com', '5465654654', 'gfhgh', 'gfhfhg', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:37:22', ''),
(46, '', 'jkjhkj@jhgjh', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:38:21', ''),
(47, 'jhgjghj', 'jhgjggh@jhgjh.com', '6656565565', 'jhghjg', 'hjgjhgj', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:38:44', ''),
(48, '', 'ghfhfhg@jhhjgj', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:40:20', ''),
(49, 'hhjhgh', 'hgjhhj@hgjhgj.com', '5646546556', 'hjgjh', 'hjgjgjh', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:43:21', ''),
(50, 'jhgjh', 'hjgjhjg@hjjgjhgj.com', '5564654565', 'hgjh', 'jhgjg', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:43:48', ''),
(51, 'jjhkj', 'jhkjk@jhgjjh.co', '5465654554', 'yuytuy', 'ytuyty', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:46:15', ''),
(52, '', 'hjjgjh@hgjh', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:49:26', ''),
(53, 'jjhjkhkj', 'jkhkj@hgjhj.com', '5646545545', 'hgjhjg', 'hjgjhgjh', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:49:50', ''),
(54, 'hghjgjh', 'hgjh@hgjh.com', '5465564655', 'hjgh', 'jhgjhgjh', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:51:05', ''),
(55, 'hghjgjh', 'hgjh@hgjh.com', '5465564655', 'hjgh', 'jhgjhgjh', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:51:10', ''),
(56, 'jhhgjhg', 'jhgjhgj@hjjhg.com', '5654546555', 'jhhj', 'jhjhgj', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:57:40', ''),
(57, 'hjghjh', 'hjgjh@jhjhg.com', '5455545645', 'hjgjhg', 'jhgjhgjh', '', '', '', '', 0, '', 0, 1, '2022-03-23 01:12:47', ''),
(58, 'jhhgj', 'jhjhgjh@hjgjh.com', '5654654565', 'hjghj', 'hjgjhg', '', '', '', '', 0, '', 0, 1, '2022-03-23 01:18:37', ''),
(59, 'hjjghj', 'hgjjh@hjhjhgjh.com', '5465655455', 'hgjh', 'hjgjhgj', '', '', '', '', 0, '', 0, 1, '2022-03-23 01:19:14', ''),
(60, '', '', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-23 01:19:21', ''),
(61, 'jjhkjhkjh', 'kjhkhjk@hjgjhj.com', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-23 01:20:06', ''),
(62, 'hgjh', '', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-23 01:24:52', ''),
(63, 'jjgjhg', 'hjgjhgj@hjgjh.com', '5656565454', 'ghgfhgf', 'ghfhgfghh', '', '', '', '', 0, '', 0, 1, '2022-03-23 01:29:29', ''),
(64, 'hgjh', 'ghjgjh@hjgjh.com', '5465456545', 'hgjhh', 'hjghjg', '', '', '', '', 0, '', 0, 1, '2022-03-23 01:42:05', ''),
(65, '', 'hgjh@hjgjh', '', '', '', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:15:54', ''),
(66, 'hhg', 'hjgjhj@hhjgj.com', '4654654564', 'ghf', 'hgfgh', '', '', '', '', 0, '', 0, 1, '2022-03-23 12:17:41', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_info`
--

CREATE TABLE `contact_us_info` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `facebook_link` text NOT NULL,
  `google_links` text NOT NULL,
  `linkedin_link` text NOT NULL,
  `twitter_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us_info`
--

INSERT INTO `contact_us_info` (`id`, `address`, `phone`, `email`, `description`, `isDelete`, `isActive`, `facebook_link`, `google_links`, `linkedin_link`, `twitter_link`) VALUES
(1, '&lt;p&gt;Street No. 17,&lt;/p&gt;\r\n\r\n&lt;p&gt;Atika Industrial Area,&lt;/p&gt;\r\n\r\n&lt;p&gt;Near Patel Chowk Dhebar Road (south)&lt;/p&gt;\r\n\r\n&lt;p&gt;RAJKOT-360002, GUJRAT, INDIA&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '08048051486', 'dskathia@yahoo.com', '&lt;p&gt;&lt;span style=&quot;color: rgb(121, 121, 121); font-family: &amp;quot;Open Sans&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;color: rgb(121, 121, 121); font-family: &amp;quot;Open Sans&amp;quot;, sans-serif;&quot;&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;ul class=&quot;contact-info-list&quot; style=&quot;margin-right: 0px; margin-bottom: 45px; margin-left: 0px; padding: 0px; border: none; outline: none; font-size: 14px; list-style: none; position: relative; color: rgb(120, 120, 120); font-family: &amp;quot;Open Sans&amp;quot;, sans-serif;&quot;&gt;\r\n	&lt;li style=&quot;margin: 0px 0px 4px; padding: 0px; border: none; outline: none; font-size: 16px; list-style: none; position: relative; color: rgb(121, 121, 121); line-height: 2em;&quot;&gt;Monday &amp;ndash; Sunday&lt;br style=&quot;margin: 0px; padding: 0px; border: none; outline: none;&quot; /&gt;\r\n	8:00 AM &amp;ndash; 8:00 PM&lt;/li&gt;\r\n	&lt;li style=&quot;margin: 0px 0px 4px; padding: 0px; border: none; outline: none; font-size: 16px; list-style: none; position: relative; color: rgb(121, 121, 121); line-height: 2em;&quot;&gt;Wednesday - Closed&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;color: rgb(121, 121, 121); font-family: &amp;quot;Open Sans&amp;quot;, sans-serif;&quot;&gt;&lt;span style=&quot;color: rgb(121, 121, 121); font-family: &amp;quot;Open Sans&amp;quot;, sans-serif;&quot;&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;', 0, 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(10) NOT NULL,
  `code` varchar(3) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `name`, `isDelete`, `isActive`) VALUES
(1, 'IN', 'India', 0, 1),
(2, 'CA', 'Canada', 0, 1),
(3, 'AF', 'Afghanistan', 0, 1),
(4, 'AL', 'Albania', 0, 1),
(5, 'DZ', 'Algeria', 0, 1),
(6, 'DS', 'American Samoa', 0, 1),
(7, 'AD', 'Andorra', 0, 1),
(8, 'AO', 'Angola', 0, 1),
(9, 'AI', 'Anguilla', 0, 1),
(10, 'AQ', 'Antarctica', 0, 1),
(11, 'AG', 'Antigua and Barbuda', 0, 1),
(12, 'AR', 'Argentina', 0, 1),
(13, 'AM', 'Armenia', 0, 1),
(14, 'AW', 'Aruba', 0, 1),
(15, 'AU', 'Australia', 0, 1),
(16, 'AT', 'Austria', 0, 1),
(17, 'AZ', 'Azerbaijan', 0, 1),
(18, 'BS', 'Bahamas', 0, 1),
(19, 'BH', 'Bahrain', 0, 1),
(20, 'BD', 'Bangladesh', 0, 1),
(21, 'BB', 'Barbados', 0, 1),
(22, 'BY', 'Belarus', 0, 1),
(23, 'BE', 'Belgium', 0, 1),
(24, 'BZ', 'Belize', 0, 1),
(25, 'BJ', 'Benin', 0, 1),
(26, 'BM', 'Bermuda', 0, 1),
(27, 'BT', 'Bhutan', 0, 1),
(28, 'BO', 'Bolivia', 0, 1),
(29, 'BA', 'Bosnia and Herzegovina', 0, 1),
(30, 'BW', 'Botswana', 0, 1),
(31, 'BV', 'Bouvet Island', 0, 1),
(32, 'BR', 'Brazil', 0, 1),
(33, 'IO', 'British lndian Ocean Territory', 0, 1),
(34, 'BN', 'Brunei Darussalam', 0, 1),
(35, 'BG', 'Bulgaria', 0, 1),
(36, 'BF', 'Burkina Faso', 0, 1),
(37, 'BI', 'Burundi', 0, 1),
(38, 'KH', 'Cambodia', 0, 1),
(39, 'CM', 'Cameroon', 0, 1),
(40, 'CV', 'Cape Verde', 0, 1),
(41, 'KY', 'Cayman Islands', 0, 1),
(42, 'CF', 'Central African Republic', 0, 1),
(43, 'TD', 'Chad', 0, 1),
(44, 'CL', 'Chile', 0, 1),
(45, 'CN', 'China', 0, 1),
(46, 'CX', 'Christmas Island', 0, 1),
(47, 'CC', 'Cocos Islands', 0, 1),
(48, 'CO', 'Colombia', 0, 1),
(49, 'KM', 'Comoros', 0, 1),
(50, 'CG', 'Congo', 0, 1),
(51, 'CK', 'Cook Islands', 0, 1),
(52, 'CR', 'Costa Rica', 0, 1),
(53, 'HR', 'Croatia (Hrvatska)', 0, 1),
(54, 'CU', 'Cuba', 0, 1),
(55, 'CY', 'Cyprus', 0, 1),
(56, 'CZ', 'Czech Republic', 0, 1),
(57, 'DK', 'Denmark', 0, 1),
(58, 'DJ', 'Djibouti', 0, 1),
(59, 'DM', 'Dominica', 0, 1),
(60, 'DO', 'Dominican Republic', 0, 1),
(61, 'TP', 'East Timor', 0, 1),
(62, 'EC', 'Ecuador', 0, 1),
(63, 'EG', 'Egypt', 0, 1),
(64, 'SV', 'El Salvador', 0, 1),
(65, 'GQ', 'Equatorial Guinea', 0, 1),
(66, 'ER', 'Eritrea', 0, 1),
(67, 'EE', 'Estonia', 0, 1),
(68, 'ET', 'Ethiopia', 0, 1),
(69, 'FK', 'Falkland Islands (Malvinas)', 0, 1),
(70, 'FO', 'Faroe Islands', 0, 1),
(71, 'FJ', 'Fiji', 0, 1),
(72, 'FI', 'Finland', 0, 1),
(73, 'FR', 'France', 0, 1),
(74, 'FX', 'France, Metropolitan', 0, 1),
(75, 'GF', 'French Guiana', 0, 1),
(76, 'PF', 'French Polynesia', 0, 1),
(77, 'TF', 'French Southern Territories', 0, 1),
(78, 'GA', 'Gabon', 0, 1),
(79, 'GM', 'Gambia', 0, 1),
(80, 'GE', 'Georgia', 0, 1),
(81, 'DE', 'Germany', 0, 1),
(82, 'GH', 'Ghana', 0, 1),
(83, 'GI', 'Gibraltar', 0, 1),
(84, 'GR', 'Greece', 0, 1),
(85, 'GL', 'Greenland', 0, 1),
(86, 'GD', 'Grenada', 0, 1),
(87, 'GP', 'Guadeloupe', 0, 1),
(88, 'GU', 'Guam', 0, 1),
(89, 'GT', 'Guatemala', 0, 1),
(90, 'GN', 'Guinea', 0, 1),
(91, 'GW', 'Guinea-Bissau', 0, 1),
(92, 'GY', 'Guyana', 0, 1),
(93, 'HT', 'Haiti', 0, 1),
(94, 'HM', 'Heard and Mc Donald Islands', 0, 1),
(95, 'HN', 'Honduras', 0, 1),
(96, 'HK', 'Hong Kong', 0, 1),
(97, 'HU', 'Hungary', 0, 1),
(98, 'IS', 'Iceland', 0, 1),
(100, 'ID', 'Indonesia', 0, 1),
(101, 'IR', 'Iran', 0, 1),
(102, 'IQ', 'Iraq', 0, 1),
(103, 'IE', 'Ireland', 0, 1),
(104, 'IL', 'Israel', 0, 1),
(105, 'IT', 'Italy', 0, 1),
(106, 'CI', 'Ivory Coast', 0, 1),
(107, 'JM', 'Jamaica', 0, 1),
(108, 'JP', 'Japan', 0, 1),
(109, 'JO', 'Jordan', 0, 1),
(110, 'KZ', 'Kazakhstan', 0, 1),
(111, 'KE', 'Kenya', 0, 1),
(112, 'KI', 'Kiribati', 0, 1),
(113, 'KP', 'Korea, Democratic People\'s Republic of', 0, 1),
(114, 'KR', 'Korea, Republic of', 0, 1),
(115, 'XK', 'Kosovo', 0, 1),
(116, 'KW', 'Kuwait', 0, 1),
(117, 'KG', 'Kyrgyzstan', 0, 1),
(118, 'LA', 'Lao People\'s Democratic Republic', 0, 1),
(119, 'LV', 'Latvia', 0, 1),
(120, 'LB', 'Lebanon', 0, 1),
(121, 'LS', 'Lesotho', 0, 1),
(122, 'LR', 'Liberia', 0, 1),
(123, 'LY', 'Libyan Arab Jamahiriya', 0, 1),
(124, 'LI', 'Liechtenstein', 0, 1),
(125, 'LT', 'Lithuania', 0, 1),
(126, 'LU', 'Luxembourg', 0, 1),
(127, 'MO', 'Macau', 0, 1),
(128, 'MK', 'Macedonia', 0, 1),
(129, 'MG', 'Madagascar', 0, 1),
(130, 'MW', 'Malawi', 0, 1),
(131, 'MY', 'Malaysia', 0, 1),
(132, 'MV', 'Maldives', 0, 1),
(133, 'ML', 'Mali', 0, 1),
(134, 'MT', 'Malta', 0, 1),
(135, 'MH', 'Marshall Islands', 0, 1),
(136, 'MQ', 'Martinique', 0, 1),
(137, 'MR', 'Mauritania', 0, 1),
(138, 'MU', 'Mauritius', 0, 1),
(139, 'TY', 'Mayotte', 0, 1),
(140, 'MX', 'Mexico', 0, 1),
(141, 'FM', 'Micronesia, Federated States of', 0, 1),
(142, 'MD', 'Moldova, Republic of', 0, 1),
(143, 'MC', 'Monaco', 0, 1),
(144, 'MN', 'Mongolia', 0, 1),
(145, 'ME', 'Montenegro', 0, 1),
(146, 'MS', 'Montserrat', 0, 1),
(147, 'MA', 'Morocco', 0, 1),
(148, 'MZ', 'Mozambique', 0, 1),
(149, 'MM', 'Myanmar', 0, 1),
(150, 'NA', 'Namibia', 0, 1),
(151, 'NR', 'Nauru', 0, 1),
(152, 'NP', 'Nepal', 0, 1),
(153, 'NL', 'Netherlands', 0, 1),
(154, 'AN', 'Netherlands Antilles', 0, 1),
(155, 'NC', 'New Caledonia', 0, 1),
(156, 'NZ', 'New Zealand', 0, 1),
(157, 'NI', 'Nicaragua', 0, 1),
(158, 'NE', 'Niger', 0, 1),
(159, 'NG', 'Nigeria', 0, 1),
(160, 'NU', 'Niue', 0, 1),
(161, 'NF', 'Norfork Island', 0, 1),
(162, 'MP', 'Northern Mariana Islands', 0, 1),
(163, 'NO', 'Norway', 0, 1),
(164, 'OM', 'Oman', 0, 1),
(165, 'PK', 'Pakistan', 0, 1),
(166, 'PW', 'Palau', 0, 1),
(167, 'PA', 'Panama', 0, 1),
(168, 'PG', 'Papua New Guinea', 0, 1),
(169, 'PY', 'Paraguay', 0, 1),
(170, 'PE', 'Peru', 0, 1),
(171, 'PH', 'Philippines', 0, 1),
(172, 'PN', 'Pitcairn', 0, 1),
(173, 'PL', 'Poland', 0, 1),
(174, 'PT', 'Portugal', 0, 1),
(175, 'PR', 'Puerto Rico', 0, 1),
(176, 'QA', 'Qatar', 0, 1),
(177, 'RE', 'Reunion', 0, 1),
(178, 'RO', 'Romania', 0, 1),
(179, 'RU', 'Russian Federation', 0, 1),
(180, 'RW', 'Rwanda', 0, 1),
(181, 'KN', 'Saint Kitts and Nevis', 0, 1),
(182, 'LC', 'Saint Lucia', 0, 1),
(183, 'VC', 'Saint Vincent and the Grenadines', 0, 1),
(184, 'WS', 'Samoa', 0, 1),
(185, 'SM', 'San Marino', 0, 1),
(186, 'ST', 'Sao Tome and Principe', 0, 1),
(187, 'SA', 'Saudi Arabia', 0, 1),
(188, 'SN', 'Senegal', 0, 1),
(189, 'RS', 'Serbia', 0, 1),
(190, 'SC', 'Seychelles', 0, 1),
(191, 'SL', 'Sierra Leone', 0, 1),
(192, 'SG', 'Singapore', 0, 1),
(193, 'SK', 'Slovakia', 0, 1),
(194, 'SI', 'Slovenia', 0, 1),
(195, 'SB', 'Solomon Islands', 0, 1),
(196, 'SO', 'Somalia', 0, 1),
(197, 'ZA', 'South Africa', 0, 1),
(198, 'GS', 'South Georgia South Sandwich Islands', 0, 1),
(199, 'ES', 'Spain', 0, 1),
(200, 'LK', 'Sri Lanka', 0, 1),
(201, 'SH', 'St. Helena', 0, 1),
(202, 'PM', 'St. Pierre and Miquelon', 0, 1),
(203, 'SD', 'Sudan', 0, 1),
(204, 'SR', 'Suriname', 0, 1),
(205, 'SJ', 'Svalbarn and Jan Mayen Islands', 0, 1),
(206, 'SZ', 'Swaziland', 0, 1),
(207, 'SE', 'Sweden', 0, 1),
(208, 'CH', 'Switzerland', 0, 1),
(209, 'SY', 'Syrian Arab Republic', 0, 1),
(210, 'TW', 'Taiwan', 0, 1),
(211, 'TJ', 'Tajikistan', 0, 1),
(212, 'TZ', 'Tanzania, United Republic of', 0, 1),
(213, 'TH', 'Thailand', 0, 1),
(214, 'TG', 'Togo', 0, 1),
(215, 'TK', 'Tokelau', 0, 1),
(216, 'TO', 'Tonga', 0, 1),
(217, 'TT', 'Trinidad and Tobago', 0, 1),
(218, 'TN', 'Tunisia', 0, 1),
(219, 'TR', 'Turkey', 0, 1),
(220, 'TM', 'Turkmenistan', 0, 1),
(221, 'TC', 'Turks and Caicos Islands', 0, 1),
(222, 'TV', 'Tuvalu', 0, 1),
(223, 'UG', 'Uganda', 0, 1),
(224, 'UA', 'Ukraine', 0, 1),
(225, 'AE', 'United Arab Emirates', 0, 1),
(226, 'GB', 'United Kingdom', 0, 1),
(227, 'UM', 'United States', 0, 1),
(228, 'UY', 'Uruguay', 0, 1),
(229, 'UZ', 'Uzbekistan', 0, 1),
(230, 'VU', 'Vanuatu', 0, 1),
(231, 'VA', 'Vatican City State', 0, 1),
(232, 'VE', 'Venezuela', 0, 1),
(233, 'VN', 'Vietnam', 0, 1),
(234, 'VG', 'Virgin Islands (British)', 0, 1),
(235, 'VI', 'Virgin Islands (U.S.)', 0, 1),
(236, 'WF', 'Wallis and Futuna Islands', 0, 1),
(237, 'EH', 'Western Sahara', 0, 1),
(238, 'YE', 'Yemen', 0, 1),
(239, 'YU', 'Yugoslavia', 0, 1),
(240, 'ZR', 'Zaire', 0, 1),
(241, 'ZM', 'Zambia', 0, 1),
(242, 'ZW', 'Zimbabwe', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `current_openings`
--

CREATE TABLE `current_openings` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_openings`
--

INSERT INTO `current_openings` (`id`, `name`, `slug`, `message`, `isDelete`, `isActive`, `adate`) VALUES
(1, 'SEO Analyst', 'seo-analyst', '&lt;p&gt;&lt;span style=&quot;color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 14px;&quot;&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using&lt;/span&gt;&lt;/p&gt;', 0, 1, '2020-07-31 11:33:01'),
(2, 'Data Entry Operator', 'data-entry-operator', '&lt;p&gt;&lt;span style=&quot;color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 14px;&quot;&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using&lt;/span&gt;&lt;/p&gt;', 0, 1, '2020-07-31 11:33:11'),
(3, 'Business Analyst', 'business-analyst', '&lt;p&gt;&lt;span style=&quot;color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 14px;&quot;&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using&lt;/span&gt;&lt;/p&gt;', 0, 1, '2020-07-31 11:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `dbbackup`
--

CREATE TABLE `dbbackup` (
  `id` int(10) NOT NULL,
  `createDate` datetime NOT NULL,
  `fileUrl` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_by_type` int(11) NOT NULL,
  `modified_by` text NOT NULL,
  `modified_by_type` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `id` int(11) NOT NULL,
  `dealer` varchar(250) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(7) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile_no` varchar(13) NOT NULL,
  `website` text NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `adate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `video_url` varchar(250) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `adate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `export_country`
--

CREATE TABLE `export_country` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `display_order` int(10) UNSIGNED NOT NULL,
  `adate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isDelete` tinyint(1) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `front_popup_image`
--

CREATE TABLE `front_popup_image` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image_path` text NOT NULL,
  `old_image_path` text NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `adate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image_path` text NOT NULL,
  `old_image_path` text NOT NULL,
  `youtube_link` varchar(500) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `adate` datetime NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `image_path`, `old_image_path`, `youtube_link`, `isActive`, `isDelete`, `adate`, `cid`) VALUES
(1, 'Paris', '<p>Paris</p>', 'g1.jpg', '', '', 1, 1, '2021-01-28 22:50:58', 0),
(2, 'Bankok', '<p>Bankok</p>', 'g2.jpg', '', '', 1, 1, '2021-01-28 22:51:36', 0),
(3, 'Maldives', '<p>Maldives</p>', 'g3.jpg', '', '', 1, 1, '2021-01-28 22:52:06', 0),
(4, 'KDC-ECO', '<p>KDC ECO</p>', 'KDC-eco.jpeg', '', '', 1, 0, '2021-01-28 22:52:29', 0),
(5, 'KDC-500', '<p>KDC 500</p>', 'KDC_500.jpeg', '', '', 1, 0, '2021-01-28 22:52:57', 0),
(6, 'KDC-300', '<p>KDC 300</p>', 'KDC_300.jpeg', '', '', 1, 0, '2021-01-28 22:53:30', 0),
(7, 'KDC-200', '<p>KDC 200</p>', 'kdc_200.jpeg', '', '', 1, 0, '2021-01-28 22:54:11', 0),
(8, 'KDC-100', '<p>KDC 100</p>', 'KDC_100.jpeg', '', '', 1, 0, '2021-01-28 22:54:35', 0),
(9, 'KCDC - 500', '<p>KCDC 500</p>', 'KCDC_500.jpeg', '', '', 1, 0, '2021-01-28 22:54:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `google_analytic`
--

CREATE TABLE `google_analytic` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `infra_structure`
--

CREATE TABLE `infra_structure` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image_path` text NOT NULL,
  `old_image_path` text NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `adate` datetime NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infra_structure`
--

INSERT INTO `infra_structure` (`id`, `title`, `description`, `image_path`, `old_image_path`, `isActive`, `isDelete`, `adate`, `cid`) VALUES
(1, 'Gallery', '', 'history1.jpg', '', 1, 0, '2020-04-09 19:41:29', 0),
(2, 'gallery 2', '', '', '', 1, 0, '2020-04-09 19:41:46', 0),
(3, 'Gallery 3', '', 'avatar-6.jpg', '', 1, 0, '2020-04-09 19:41:59', 0),
(4, 'DR. NANDANI', '<p>testing purpose</p>', 'time-line-2.png', '', 1, 0, '2020-04-10 19:08:59', 0),
(5, 'DR. NANDANI', '', 'WhatsApp Image 2020-04-04 at 9.35.03 AM.jpeg', '', 1, 1, '2020-04-10 19:09:34', 0),
(6, 'AAA', '', 'single-img-ten.png', '', 1, 1, '2020-04-10 19:16:41', 0),
(7, 'DR. NANDANI', '', 'WhatsApp Image 2020-04-04 at 9.37.35 AM.jpeg', '', 1, 1, '2020-04-10 19:16:54', 0),
(8, 'BBB', '', 'single-img-one.jpg', '', 1, 1, '2020-04-10 19:26:23', 0),
(9, 'TEST', '', 'single-img-seven.jpg', '', 1, 1, '2020-04-10 19:31:09', 0),
(10, 'DDD', '', 'single-img-eleven.jpg', '', 1, 1, '2020-04-10 19:36:07', 0),
(11, 'Yagnik', '', 'single-img-four.jpg', '', 1, 1, '2020-04-10 19:42:41', 0),
(12, 'DR. NANDANI LABORATORY STAFF', '', 'about1.jpg', '', 1, 0, '2020-04-11 10:38:44', 0),
(13, 'DR,SAMEER NANDANI', '', 'WhatsApp Image 2020-04-11 at 11.42.21 AM.jpeg', '', 1, 1, '2020-04-11 11:44:20', 0),
(14, 'shyam infra', '<p>infra descrip</p>', '', '', 1, 0, '2020-05-08 17:20:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_form`
--

CREATE TABLE `inquiry_form` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(400) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry_form`
--

INSERT INTO `inquiry_form` (`id`, `name`, `email`, `subject`, `message`, `created_date`, `isDelete`, `isActive`) VALUES
(1, 'raj', '', 'a', 'a', '2020-12-03 09:27:20', 0, 1),
(2, 'rajdip', 'rajdip@gmail.com', 'a', 'b', '2020-12-03 09:29:26', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `join_our_team`
--

CREATE TABLE `join_our_team` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` text NOT NULL,
  `possition` varchar(250) NOT NULL,
  `location` varchar(200) NOT NULL,
  `project` int(11) NOT NULL,
  `city` varchar(150) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `join_our_team`
--

INSERT INTO `join_our_team` (`id`, `name`, `company_name`, `designation`, `email`, `contact_no`, `possition`, `location`, `project`, `city`, `subject`, `message`, `isDelete`, `isActive`, `created_date`, `category_name`) VALUES
(1, 'test', 'test company', 'test designation', 'test@email.com', '7894561230', '2', 'test location', 0, '', '', 'test msg', 0, 1, '2020-07-30 19:42:01', ''),
(2, 'ravi', 'craftbox technology', 'ceo', 'info@craftbox.com', '8866987878', '1', '', 0, '', '', 'test desc', 0, 1, '2020-07-30 19:55:25', ''),
(3, 'test', 'test', 'test', 'test@test.test', '7894561230', '1', '', 0, '', '', 'test', 0, 1, '2020-07-31 12:36:43', ''),
(4, 'test', 'test', 'test', 'test@test.test', '7894561230', '1', '', 0, '', '', 'test', 0, 1, '2020-07-31 12:37:50', ''),
(5, 'test', 'test', 'test', 'test@test.test', '7894561230', '1', '', 0, '', '', 'test', 0, 1, '2020-07-31 12:45:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `ext` varchar(150) NOT NULL,
  `media_type` varchar(150) NOT NULL COMMENT '0=image,1=audio,2=video,3=file',
  `reference_type` varchar(50) NOT NULL COMMENT 'admin_profile_picture,admin_cover',
  `reference_type1` varchar(200) NOT NULL DEFAULT 'image',
  `reference_id` int(11) NOT NULL,
  `reference_column` varchar(150) NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL,
  `adate` datetime NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `created_by_type` int(11) NOT NULL DEFAULT 0,
  `modified_by` text NOT NULL,
  `modified_by_type` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `url`, `ext`, `media_type`, `reference_type`, `reference_type1`, `reference_id`, `reference_column`, `isDelete`, `isActive`, `adate`, `created_by`, `created_by_type`, `modified_by`, `modified_by_type`, `created_date`, `modified_date`) VALUES
(1, '', 'default_user1540821822.jpg', '', '0', 'user_profile_picture', 'image', 1, '', 0, 0, '2018-10-29 19:33:42', 1, 0, '', '', '0000-00-00 00:00:00', ''),
(2, '', 'default_user1540821828.jpg', '', '0', 'user_profile_picture', 'image', 1, '', 0, 0, '2018-10-29 19:33:48', 1, 0, '', '', '0000-00-00 00:00:00', ''),
(3, '', 'default_user1540821835.jpg', '', '0', 'user_profile_picture', 'image', 1, '', 0, 0, '2018-10-29 19:33:55', 1, 0, '', '', '0000-00-00 00:00:00', ''),
(4, '', 'default_user1540821861.jpg', '', '0', 'user_profile_picture', 'image', 1, '', 0, 0, '2018-10-29 19:34:21', 1, 0, '', '', '0000-00-00 00:00:00', ''),
(5, '', 'default_user1540821882.jpg', '', '0', 'user_profile_picture', 'image', 1, '', 0, 0, '2018-10-29 19:34:42', 1, 0, '', '', '0000-00-00 00:00:00', ''),
(6, '', 'default_user1540822157.jpg', '', '0', 'user_profile_picture', 'image', 1, '', 0, 0, '2018-10-29 19:39:17', 1, 0, '', '', '0000-00-00 00:00:00', ''),
(7, '', 'default_user1540822881.jpg', '', '0', 'user_profile_picture', 'image', 1, '', 0, 0, '2018-10-29 19:51:21', 1, 0, '', '', '0000-00-00 00:00:00', ''),
(8, '', 'default_user1542453113.png', '', '0', 'user_profile_picture', 'image', 1, '', 0, 0, '2018-11-17 16:41:53', 1, 0, '', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_contact_us`
--

CREATE TABLE `monthly_contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `description` varchar(100) NOT NULL,
  `news_date` datetime NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `display_order` int(10) UNSIGNED NOT NULL,
  `adate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isDelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `description`, `news_date`, `image_path`, `display_order`, `adate`, `isDelete`) VALUES
(1, 'Got A Dream And We Just Know Now We\\\'re Gonna Make', 'got-a-dream-and-we-just-know-now-we-re-gonna-make', '<p>It also aims to raise awareness among designers and to provide them with the appropriate experien', '2018-10-10 00:00:00', 'b2.jpg', 0, '0000-00-00 00:00:00', 0),
(2, 'The Ship Set Ground On The Shore Of This Uncharted Desert', 'the-ship-set-ground-on-the-shore-of-this-uncharted-desert', '<p>These men promptly escaped frotm maximum security stockade to the underground. The Brady Bunch th', '2018-10-14 00:00:00', 'b3.jpg', 0, '0000-00-00 00:00:00', 0),
(3, 'Take A Step That Is Ne We\\\'ve A Loveable Space That Needs', 'take-a-step-that-is-ne-we-ve-a-loveable-space-that-needs', '<p>It also aims to raise awareness among designers and to provide them with the appropriate experien', '2018-10-17 00:00:00', 'b4.jpg', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `unique_code` varchar(100) NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `name`, `email`, `unique_code`, `isDelete`, `isActive`, `adate`) VALUES
(3, '', 'test@gmail.com1', '', 0, 1, '2020-04-10 19:31:19'),
(4, '', 'aaa@gmail.com', '', 0, 1, '2020-07-28 13:28:24'),
(5, '', 'gm@dipson.com', '', 0, 1, '2020-07-28 13:30:33'),
(6, '', 'test@gmail.com', '', 0, 1, '2020-07-28 13:30:45'),
(7, '', 'bbb@gmail.com', '', 0, 1, '2020-07-30 12:14:19'),
(8, '', 'yagnik@gmail.com', '', 0, 1, '2020-07-30 12:14:51'),
(9, '', 'test@fjfh.com', '', 0, 1, '2020-08-05 16:02:43'),
(10, '', 'kk@j.kk', '', 0, 1, '2020-08-05 16:05:59'),
(11, '', 'testtst@gmail.ocm', '', 0, 1, '2020-08-06 14:05:57'),
(12, '', 'janki@gmail.com', '', 0, 1, '2020-08-07 11:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `our_team`
--

CREATE TABLE `our_team` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `designation` varchar(250) NOT NULL,
  `experiance` varchar(150) NOT NULL,
  `education_training` text NOT NULL,
  `fb_link` varchar(300) NOT NULL,
  `twitter_link` varchar(300) NOT NULL,
  `insta_link` varchar(300) NOT NULL,
  `linkedin_link` varchar(300) NOT NULL,
  `google_link` varchar(300) NOT NULL,
  `image_path` text NOT NULL,
  `old_image_path` text NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `adate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `our_team`
--

INSERT INTO `our_team` (`id`, `name`, `description`, `designation`, `experiance`, `education_training`, `fb_link`, `twitter_link`, `insta_link`, `linkedin_link`, `google_link`, `image_path`, `old_image_path`, `isActive`, `isDelete`, `adate`) VALUES
(1, 'Roseen', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in eratinterdum,euismod mauris aliquam.</p>', 'Executive Officer', '', '', '', '', '', '', '', 'team-4.jpg', '', 1, 0, '2021-01-28 22:23:26'),
(2, 'Merry Desulva', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in erat interdum,euismod mauris aliquam.</p>', 'Financial Officer', '', '', '', '', '', '', '', 'team-3.jpg', '', 1, 0, '2021-01-28 22:24:30'),
(3, 'Roseen', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in erat in terdum, euismod mauris aliquam.</p>', 'HR Manager', '', '', '', '', '', '', '', 'team-2.jpg', '', 1, 0, '2021-01-28 22:25:28'),
(4, 'Merry Desulva', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in erati nterdum,euismod mauris aliquam.</p>', 'Customer Care', '', '', '', '', '', '', '', 'team-1.jpg', '', 1, 0, '2021-01-28 22:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `page_admin_right`
--

CREATE TABLE `page_admin_right` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `view_flag` int(11) NOT NULL,
  `insert_flag` int(11) NOT NULL,
  `update_flag` int(11) NOT NULL,
  `delete_flag` int(11) NOT NULL,
  `isDelete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_admin_right`
--

INSERT INTO `page_admin_right` (`id`, `page_id`, `admin_id`, `view_flag`, `insert_flag`, `update_flag`, `delete_flag`, `isDelete`) VALUES
(34, 2, 1, 1, 1, 0, 0, 0),
(35, 2, 0, 1, 1, 1, 1, 0),
(36, 7, 0, 1, 1, 1, 1, 0),
(40, 3, 1, 1, 1, 1, 0, 0),
(41, 8, 2, 1, 0, 1, 0, 0),
(42, 8, 1, 1, 1, 0, 0, 0),
(43, 7, 1, 1, 1, 1, 1, 0),
(44, 5903, 3, 1, 1, 1, 1, 0),
(45, 5904, 3, 1, 0, 0, 0, 0),
(46, 5902, 3, 1, 1, 0, 0, 0),
(47, 5900, 3, 1, 1, 0, 0, 0),
(48, 5901, 3, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_table`
--

CREATE TABLE `page_table` (
  `id` int(11) NOT NULL,
  `page_title` varchar(1000) NOT NULL,
  `page_slug` varchar(100) NOT NULL,
  `page_count` int(11) NOT NULL,
  `page_urls` text NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `adate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_table`
--

INSERT INTO `page_table` (`id`, `page_title`, `page_slug`, `page_count`, `page_urls`, `isActive`, `isDelete`, `adate`) VALUES
(400, 'Dashboard Page', 'dashboard', 0, 'manage_customer.php', 1, 0, '0000-00-00 00:00:00'),
(401, 'My Account Page', 'my_account', 1, 'my_account.php', 0, 0, '0000-00-00 00:00:00'),
(402, 'Login Page', 'login', 1, 'index.php', 1, 0, '0000-00-00 00:00:00'),
(403, 'Logout Page', 'logout', 1, 'logout.php', 1, 0, '0000-00-00 00:00:00'),
(404, '(Special Page) Add Right to Admin Type Page', 'manage_admin_type', 1, 'manage_admin_type.php', 1, 0, '0000-00-00 00:00:00'),
(405, 'Pages', 'app_pages', 3, 'manage_page_table.php,ajax_get_page_table.php,add_page_table.php', 1, 0, '2016-10-24 00:00:00'),
(406, 'Admins', 'page_admin', 3, 'manage_falando.php,ajax_get_falando.php,add_falando.php', 1, 0, '2016-10-26 00:00:00'),
(501, 'APIs', 'page_apis', 4, 'api_manage.php', 1, 0, '2016-11-05 16:04:05'),
(502, 'Sub Category', 'page_sub_category', 4, 'add_sub_category.php,manage_sub_category.php,ajax_get_sub_category.php', 1, 0, '2016-11-05 16:04:05'),
(503, 'Sub to sub Category', 'page_sub_sub_category', 3, 'ajax_get_sub_sub_category.php,add_sub_sub_category.php,manage_sub_sub_category.php', 1, 0, '2016-11-21 09:48:13'),
(504, 'Product Page', 'page_product', 3, 'manage_product.php,ajax_get_product.php,add_product.php', 1, 0, '2016-11-22 09:26:49'),
(505, 'Attribute Page', 'page_attribute', 0, 'add_attribute.php,ajax_get_attribute.php,ajax_get_attribute_value.php,manage_attribute.php', 1, 0, '2016-11-23 10:36:00'),
(506, 'Brand Page', 'page_brand', 3, 'manage_brand.php,ajax_get_brand.php,add_brand.php', 1, 0, '2016-11-23 03:00:00'),
(507, 'User Page', 'page_user', 2, 'manage_user.php,ajax_get_user.php', 1, 0, '2016-11-24 10:10:00'),
(508, 'Android Home', 'android_home', 3, 'manage_android_home.php,add_android_home.php,ajax_get_android_home.php', 1, 0, '2016-11-24 15:25:59'),
(509, 'Delivery Pincode Page', 'page_delivery_pincode', 3, 'manage_delivery_pincode.php,ajax_get_delivery_pincode.php,add_delivery_pincode.php', 1, 0, '2016-11-24 03:43:00'),
(510, 'Coupon Code Page', 'page_coupon_code', 0, 'manage_coupon_code.php,ajax_get_coupon_code.php\r\n', 1, 0, '2016-11-24 04:58:00'),
(511, 'Advertise', 'page_advertise', 3, 'manage_advertise.php,ajax_get_advertise.php,add_advertise.php', 1, 0, '2016-11-26 16:28:25'),
(512, 'Order', 'page_order', 3, 'manage_order.php,ajax_get_order.php,add_order.php', 1, 0, '2016-11-29 14:51:54'),
(513, 'Bus Pages', 'page_bus', 3, 'bus_crud.php,bus_ajax_function.php,bus_manage.php', 1, 0, '2017-02-18 14:57:02'),
(514, 'Bus stop Pages', 'page_bus stop', 3, 'bus stop_crud.php,bus stop_ajax_function.php,bus stop_manage.php', 1, 0, '2017-02-18 17:01:04'),
(515, 'User pages', 'page_user', 3, 'user_manage.php,user_get_ajax.php,user_crud.php', 1, 0, '2017-02-18 17:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `project_type` int(11) NOT NULL COMMENT '1=>under_devlopment,2=>upcoming,3=>complete',
  `name` varchar(250) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `display_order` int(11) NOT NULL,
  `description` text NOT NULL,
  `add_info` text NOT NULL,
  `video_url` varchar(250) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `amenity_image_path` varchar(150) NOT NULL,
  `utility_image_path` varchar(150) NOT NULL,
  `meta_descr` text NOT NULL,
  `phone` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(300) NOT NULL,
  `google_map` text NOT NULL,
  `product_pdf` text NOT NULL,
  `price` varchar(100) NOT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` timestamp NOT NULL DEFAULT current_timestamp(),
  `advantage` varchar(250) NOT NULL,
  `brochure` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cid`, `sid`, `project_type`, `name`, `product_code`, `slug`, `display_order`, `description`, `add_info`, `video_url`, `image_path`, `amenity_image_path`, `utility_image_path`, `meta_descr`, `phone`, `email`, `address`, `google_map`, `product_pdf`, `price`, `isDelete`, `isActive`, `adate`, `advantage`, `brochure`) VALUES
(1, 3, 1, 0, 'product1', '', 'product1', 0, '&lt;p class=&quot;mbot25&quot; color:=&quot;&quot; line-height:=&quot;&quot; open=&quot;&quot; padding:=&quot;&quot; style=&quot;margin-bottom: 25px; font-family: &quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&lt;/p&gt;\r\n\r\n&lt;p color:=&quot;&quot; line-height:=&quot;&quot; open=&quot;&quot; padding:=&quot;&quot; style=&quot;margin-bottom: 0px; font-family: &quot;&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/p&gt;', '&lt;p&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', 'https://www.youtube.com/embed/HhjHYkPQ8F0', 'product_img_de54f3.jpg', '', '', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt.', '', '', '', '', '', '', 1, 1, '2020-12-24 04:12:29', '', ''),
(2, 4, 3, 0, 'product2', '', 'product2', 0, '&lt;p class=&quot;mbot25&quot; color:=&quot;&quot; line-height:=&quot;&quot; open=&quot;&quot; padding:=&quot;&quot; style=&quot;margin-bottom: 25px; font-family: &quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&lt;/p&gt;\r\n\r\n&lt;p color:=&quot;&quot; line-height:=&quot;&quot; open=&quot;&quot; padding:=&quot;&quot; style=&quot;margin-bottom: 0px; font-family: &quot;&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/p&gt;', '&lt;p&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', 'https://www.youtube.com/embed/HhjHYkPQ8F0', 'product_img_2eb937.jpg', '', '', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt.', '', '', '', '', '', '', 1, 1, '2020-12-24 04:14:48', '', ''),
(3, 5, 0, 0, 'product3', '', 'product3', 0, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&lt;/p&gt;\r\n\r\n&lt;p&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/p&gt;', '&lt;p&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', 'https://www.youtube.com/embed/HhjHYkPQ8F0', 'product_img_8053c3.jpg', '', '', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt.', '', '', '', '', '', '', 1, 1, '2020-12-24 04:15:55', '', ''),
(4, 6, 0, 0, 'product4', '', 'product4', 0, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&lt;/p&gt;\r\n\r\n&lt;p&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/p&gt;', '&lt;p&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', 'https://www.youtube.com/embed/HhjHYkPQ8F0', 'product_img_0b13b2.jpg', '', '', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt.', '', '', '', '', '', '', 1, 1, '2020-12-24 04:16:34', '', ''),
(5, 3, 0, 0, 'product5', '', 'product5', 4, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&lt;/p&gt;\r\n\r\n&lt;p&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/p&gt;', '&lt;p&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', 'https://www.youtube.com/embed/HhjHYkPQ8F0', 'product_img_945232.jpg', '', '', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt.', '', '', '', '', '', '', 1, 1, '2020-12-24 04:17:11', '', ''),
(6, 3, 0, 0, 'product6', '', 'product6', 0, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.&lt;/p&gt;\r\n\r\n&lt;p&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/p&gt;', '&lt;p&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', 'https://www.youtube.com/embed/HhjHYkPQ8F0', 'product_img_0cc549.jpg', '', '', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt.', '', '', '', '', '', '', 1, 1, '2020-12-24 04:18:31', '', ''),
(7, 4, 0, 0, 'KFS-100 80kg. Floor Spring', '', 'kfs-100-80kg-floor-spring', 3, '&lt;p&gt;The KFS-100 80kg. Floor Spring is a highly adaptable floor spring suitable for all standard single-, and double-action doors with widths up to 1100 mm, with its closing force individually regulated by means of an adjustment screw.&lt;/p&gt;', '&lt;p&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', '', 'product_img_cc99d9.jpg', '', '', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt.', '', '', '', '', '', '3550', 0, 1, '2020-12-24 04:19:16', '', ''),
(8, 4, 0, 0, 'KFS-200 Double Cylinder Floor Spring', '', 'kfs-200-double-cylinder-floor-spring', 2, '&lt;p&gt;It is our ECONOMIC or BASIC MODEL of hydraulic door closer.&lt;/p&gt;', '&lt;p&gt;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/p&gt;', '', 'product_img_d210c0.jpg', '', '', '', '', '', '', '', '', '4350', 0, 1, '2020-12-24 04:22:22', '', ''),
(9, 4, 0, 0, 'ECO', '', 'eco', 1, '&lt;p&gt;It is our ECONOMIC or BASIC MODEL of hydraulic door closer.&lt;/p&gt;', '', '', 'product_img_3f001e.jpg', '', '', 'pro', '', '', '', '', '', '1249', 0, 1, '2021-01-30 16:44:38', '', ''),
(10, 3, 0, 0, 'KFS-ECO Floor Spring Economic', '', 'kfs-eco-floor-spring-economic', 4, '&lt;p&gt;We are renowned as the noteworthy manufacturer, exporter, supplier of Floor spring in India . These Floor spring&amp;#39;s are suitable to left &amp;amp; right handed doors. We manufacture these Floor spring&amp;#39;s with precision by utilizing best quality of material in accordance with the set norms. As well, our quality controllers inspected the offered Floor spring&amp;#39;s against well defined parameters so as to make certain their flawlessness. Features: Fine finish Long life Resistance against corrosion&lt;/p&gt;', '', '', 'product_img_99da0a.jpg', '', '', '', '', '', '', '', '', '3144', 0, 1, '2022-04-02 18:39:10', '', ''),
(11, 3, 0, 0, 'product-101', '', 'product-101', 5, '', '', '', 'product_img_cb98db.jpg', '', '', '', '', '', '', '', '', '100', 0, 1, '2022-04-02 19:15:56', '', ''),
(12, 4, 0, 0, 'product 102', '', 'product-102', 6, '', '', '', 'product_img_9ff7d8.jpg', '', '', '', '', '', '', '', '', '1000', 0, 1, '2022-04-02 19:16:15', '', ''),
(13, 4, 0, 0, 'product 103', '', 'product-103', 7, '&lt;p&gt;test1&lt;/p&gt;', '', '', 'product_img_323367.jpg', '', '', '', '', '', '', '', '', '1000', 0, 1, '2022-04-02 19:16:34', '', ''),
(14, 3, 0, 0, 'product 104', '', 'product-104', 8, '', '', '', 'product_img_067a67.jpg', '', '', '', '', '', '', '', '', '1004', 0, 1, '2022-04-02 19:16:49', '', ''),
(15, 3, 0, 0, 'product 105', '', 'product-105', 9, '', '', '', 'product_img_205cd2.jpg', '', '', '', '', '', '', '', '', '1005', 0, 1, '2022-04-02 19:17:04', '', ''),
(16, 4, 0, 0, 'product 106', '', 'product-106', 10, '', '', '', 'product_img_87fe29.jpg', '', '', '', '', '', '', '', '', '1006', 0, 1, '2022-04-02 19:17:25', '', ''),
(17, 3, 0, 0, 'product 107', '', 'product-107', 11, '', '', '', 'product_img_e80824.jpg', '', '', '', '', '', '', '', '', '1007', 0, 1, '2022-04-02 19:17:43', '', ''),
(18, 3, 0, 0, 'product 108', '', 'product-108', 12, '', '', '', 'product_img_ea1123.jpg', '', '', '', '', '', '', '', '', '1008', 0, 1, '2022-04-02 19:18:00', '', ''),
(19, 3, 0, 0, 'product 110', '', 'product-110', 13, '', '', '', 'product_img_03183e.jpg', '', '', '', '', '', '', '', '', '1100', 0, 1, '2022-04-02 19:18:19', '', ''),
(20, 3, 0, 0, 'product 111', '', 'product-111', 14, '', '', '', 'product_img_c14545.jpg', '', '', '', '', '', '', '', '', '1110', 0, 1, '2022-04-02 19:18:38', '', ''),
(21, 3, 0, 0, 'product 112', '', 'product-112', 15, '', '', '', 'product_img_ff77ac.jpg', '', '', '', '', '', '', '', '', '1120', 0, 1, '2022-04-02 19:19:04', '', ''),
(22, 4, 0, 0, 'product 113', '', 'product-113', 16, '', '', '', 'product_img_4d9bea.jpg', '', '', '', '', '', '', '', '', '1130', 0, 1, '2022-04-02 19:19:25', '', ''),
(23, 4, 0, 0, 'product 114', '', 'product-114', 17, '', '', '', 'product_img_bd1a56.jpg', '', '', '', '', '', '', '', '', '1140', 0, 1, '2022-04-02 19:19:45', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_inquiry`
--

CREATE TABLE `product_inquiry` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` text NOT NULL,
  `location` varchar(200) NOT NULL,
  `project` int(11) NOT NULL,
  `city` varchar(150) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `p_qty` int(11) NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_inquiry`
--

INSERT INTO `product_inquiry` (`id`, `product_id`, `product_name`, `name`, `company_name`, `designation`, `email`, `contact_no`, `location`, `project`, `city`, `subject`, `message`, `p_qty`, `isDelete`, `isActive`, `created_date`) VALUES
(1, 6, '', 'raj', '', '', 'r@gmail.com', '1245612354', '', 0, '', '', 'hellow', 4, 0, 1, '2020-12-30 01:28:09'),
(2, 0, '', 'r', '', '', 'r@gmail.com', '111111111111', '', 0, '', '', '11', 1, 0, 1, '2021-01-30 10:41:21'),
(3, 0, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '11', 1, 0, 1, '2021-01-30 10:41:48'),
(4, 0, '', 'a', '', '', 'Abc@gmail.com', '09727809298', '', 0, '', '', 'aa', 1, 0, 1, '2021-01-30 10:48:42'),
(5, 0, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '1', 1, 0, 1, '2021-01-30 10:50:23'),
(6, 0, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '1', 1, 0, 1, '2021-01-30 10:50:40'),
(7, 0, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '11', 1, 0, 1, '2021-01-30 10:52:32'),
(8, 0, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '11', 1, 0, 1, '2021-01-30 10:55:59'),
(9, 0, '', 'a', '', '', 'a@gmail.com', '09727809298', '', 0, '', '', '11', 1, 0, 1, '2021-01-31 11:31:01'),
(10, 0, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '1', 1, 0, 1, '2021-01-31 11:32:43'),
(11, 6, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '21', 2, 0, 1, '2021-01-31 05:04:51'),
(12, 7, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '11', 1, 0, 1, '2021-02-02 09:38:48'),
(13, 1, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '11', 1, 0, 1, '2021-02-02 09:53:52'),
(14, 1, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '1', 1, 0, 1, '2021-02-02 09:57:40'),
(15, 1, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '1', 1, 0, 1, '2021-02-02 10:16:46'),
(16, 1, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '1', 1, 0, 1, '2021-02-02 10:24:46'),
(17, 1, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '1', 1, 0, 1, '2021-02-02 10:45:41'),
(18, 1, '', 'rajdip Gondalia', '', '', 'rajdip.gondalia99@gmail.com', '09727809298', '', 0, '', '', '1', 1, 0, 1, '2021-02-02 11:06:41'),
(19, 0, '', 'hjjhg', '', '', 'hgjhj@hjgjh.ci', '54654564555', '', 0, '', '', 'ghfhg', 5, 0, 1, '2022-03-19 11:32:02'),
(20, 0, '', 'hjjgjhg', '', '', 'hgjhgj@hjgjh.com', '5465465465', '', 0, '', '', 'jhgjhj', 5, 0, 1, '2022-03-19 11:33:27'),
(21, 0, '', 'hgjh', '', '', 'hgjh@jhfjh.co', '54646554554', '', 0, '', '', 'ujjhk', 4, 0, 1, '2022-03-20 01:15:06'),
(22, 0, '', 'hgjh', '', '', 'hgjh@jhfjh.co', '54646554554', '', 0, '', '', 'ujjhk', 4, 0, 1, '2022-03-20 01:17:23'),
(23, 0, '', 'jjhgjhg', '', '', 'hjgj@hjhgh.co', '54654645465', '', 0, '', '', 'hnhhjg', 5, 0, 1, '2022-03-20 01:20:07'),
(24, 0, '', 'hjgjh', '', '', 'hjgjh@hjghj.uc', '566565564565', '', 0, '', '', 'jkjhj', 21, 0, 1, '2022-03-20 01:22:31'),
(25, 0, '', 'jhkjh', '', '', 'jkhkjk@hjgjh.cp', '54654656546', '', 0, '', '', '54', 2, 0, 1, '2022-03-20 01:25:13'),
(26, 8, '', 'hjjh', '', '', 'gjhgjhgj@jhgjhg.co', '54566546546', '', 0, '', '', 'hjgjhgjh', 2, 0, 1, '2022-03-23 12:39:16'),
(27, 8, '', 'hjgjhg', '', '', 'jhgjgjh@hjgjhgj.com', '65465654655', '', 0, '', '', 'hghgjh', 5, 0, 1, '2022-03-23 12:40:42'),
(28, 7, '', 'jkhkjh', '', '', 'kjkjhjk@jjkhjk.cj', '5465566545', '', 0, '', '', 'hjgjh', 5, 0, 1, '2022-03-23 12:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `comment` text NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `name`, `email`, `title`, `comment`, `isDelete`, `isActive`, `created_date`) VALUES
(1, 8, 'a', 'a', 'a', 'a', 0, 1, '2020-12-31 01:18:51'),
(2, 8, 'a', 'a', 'a', 'a', 0, 1, '2020-12-31 01:19:30'),
(3, 8, 'eee', 'eee@gmail.com', 'aaaaaa', 'aaaaaaarrrrrr', 0, 1, '2020-12-31 01:33:22'),
(4, 6, 'a', 'a@gmail.com', 'a', 'a', 0, 1, '2021-01-01 03:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `project_contact_us`
--

CREATE TABLE `project_contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `project_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_contact_us`
--

INSERT INTO `project_contact_us` (`id`, `name`, `email`, `subject`, `project_id`, `message`, `isDelete`, `isActive`, `created_date`, `contact_number`, `category_name`) VALUES
(1, 'yagnik', 'yagnik@gmail.com', 'dfsafsfd', 23, 'fsfsfsfsdfs', 0, 1, '2020-05-29 12:33:05', '8758003574', ''),
(2, 'yagnik', 'yagnik@gmail.com', 'dfsafsfd', 23, 'fsfsfsfsdfs', 0, 1, '2020-05-29 12:33:38', '8758003574', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `image_path` text NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `adate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request_for_demo`
--

CREATE TABLE `request_for_demo` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_no` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `product` varchar(250) NOT NULL,
  `application` varchar(250) NOT NULL,
  `special_request` varchar(250) NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_for_demo`
--

INSERT INTO `request_for_demo` (`id`, `name`, `mobile_no`, `email`, `product`, `application`, `special_request`, `isDelete`, `isActive`, `created_date`) VALUES
(1, 'Raj', 2147483647, 'Raj@gmail.com', '25', '4', 'Hii..!!', 0, 1, '2020-12-16 02:58:46'),
(2, 'vishal', 1234567890, 'kajad@sf.srg', '20', '1', 'est', 0, 1, '2020-12-16 03:28:15'),
(3, 'q', 1236547893, 'q@g', '13', '1', '', 0, 1, '2020-12-17 10:41:01'),
(4, 'w', 2147483647, 'w@gmail.com', '13', '1', 'w', 0, 1, '2020-12-17 10:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `mobile_no` varchar(250) NOT NULL,
  `resume_path` varchar(250) NOT NULL,
  `apply_for` text NOT NULL,
  `message` text NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`id`, `name`, `slug`, `email`, `subject`, `mobile_no`, `resume_path`, `apply_for`, `message`, `isDelete`, `isActive`, `adate`) VALUES
(1, 'Milan', '', 'smit@gmail.com', 'Good Site', '4445556667', 'resumed03e1f.pdf', 'egweg', 'a', 0, 1, '2021-01-01 04:38:07'),
(2, 'Milan', '', 'smit@gmail.com', 'egeg', '4445556667', 'resumeefa96c.pdf', 'gg', 'okok', 0, 1, '2021-01-01 04:38:58'),
(3, 'a', '', 'vish11@gmail.com', 'hindi', '7777878674', 'resume35e83e.pdf', 'xfbfxcnd', 'a', 0, 1, '2021-01-02 02:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `scheme`
--

CREATE TABLE `scheme` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `meta_descr` varchar(250) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id` int(11) NOT NULL,
  `ip` varchar(14) NOT NULL,
  `ltime` datetime NOT NULL,
  `attempts` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `adate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `meta_descr` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `additional_description` text NOT NULL,
  `why_us` text NOT NULL,
  `image_path` varchar(250) DEFAULT NULL,
  `icon_image_path` varchar(250) NOT NULL,
  `display_order` int(11) NOT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `cid`, `name`, `slug`, `meta_descr`, `description`, `additional_description`, `why_us`, `image_path`, `icon_image_path`, `display_order`, `isDelete`, `isActive`, `adate`) VALUES
(1, 2, 'Data Conversion Services', 'data-conversion-services', 'Empowering the ranking of your WebSite', '&lt;p&gt;&lt;br /&gt;\r\nVencon Solutions creates measurable marketing campaigns to track each and every click, each and every call, each and every lead to make you aware that your investment over SEO services are working hard to move forward the position of your business in the industry.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nOur cutting-edge SEO services and solutions help you to attract the right customers from the right crowd to transform more and more leads to expand your business. Vencon Solution works to customize the best mix of online marketing services ranging from the PPC campaign to email marketing campaigns and SEO-based responsiveness within your websites to move the needle and furnish the best results.&lt;/p&gt;', '&lt;p&gt;&lt;span style=&quot;color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 19.2px; letter-spacing: -0.96px;&quot;&gt;We formulate astonishing and amazing websites. We run content marketing campaigns. We design and develop creative videos. We specialize in creating an inbound focused strategy to get the best digital marketing solutions for tangible results for your business from Vencon Solutions - The Best Digital Marketing Solution Provider.&lt;/span&gt;&lt;br style=&quot;color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 19.2px; letter-spacing: -0.96px;&quot; /&gt;\r\n&lt;br style=&quot;color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 19.2px; letter-spacing: -0.96px;&quot; /&gt;\r\n&lt;span style=&quot;color: rgb(119, 119, 119); font-family: Poppins, sans-serif; font-size: 19.2px; letter-spacing: -0.96px;&quot;&gt;Do not wait anymore for the organically engaged audience in their day to day routine by collaborating with us.&lt;/span&gt;&lt;/p&gt;', '&lt;h4 class=&quot;font-weight-bold line-height-3 custom-font-size-1 mb-1&quot; style=&quot;margin-top: 0px; color: rgb(33, 37, 41); letter-spacing: -0.05em; margin-right: 0px; margin-left: 0px; -webkit-font-smoothing: antialiased; font-family: Poppins, sans-serif; margin-bottom: 0.25rem !important; line-height: 1.3 !important; font-size: 1.3em !important;&quot;&gt;Boosting Organic Traffic&lt;/h4&gt;\r\n\r\n&lt;p class=&quot;mb-0&quot; style=&quot;color: rgb(119, 119, 119); line-height: 26px; font-family: Poppins, sans-serif; font-size: 14px; margin-bottom: 0px !important;&quot;&gt;We are here to optimize business efforts by forming online visibility. Team Vencon works vigorously to offer you the most magnificent results by generating and increasing organic traffic at a gradual and continuous pace.&lt;/p&gt;\r\n\r\n&lt;p class=&quot;mb-0&quot; style=&quot;color: rgb(119, 119, 119); line-height: 26px; font-family: Poppins, sans-serif; font-size: 14px; margin-bottom: 0px !important;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h4 class=&quot;font-weight-bold line-height-3 custom-font-size-1 mb-1&quot; style=&quot;margin-top: 0px; color: rgb(33, 37, 41); letter-spacing: -0.05em; margin-right: 0px; margin-left: 0px; -webkit-font-smoothing: antialiased; font-family: Poppins, sans-serif; margin-bottom: 0.25rem !important; line-height: 1.3 !important; font-size: 1.3em !important;&quot;&gt;Regenerate The Ranking Chart&lt;/h4&gt;\r\n\r\n&lt;p class=&quot;mb-0&quot; style=&quot;color: rgb(119, 119, 119); line-height: 26px; font-family: Poppins, sans-serif; font-size: 14px; margin-bottom: 0px !important;&quot;&gt;When you are at the peak of the sales charts, there is no need to allot any advertisement budget or no need to pay per click. We tend to work strenuously with expert SEO Consultants to make sure your web site experiences unlimited organic appearance and exposure.&lt;/p&gt;\r\n\r\n&lt;p class=&quot;mb-0&quot; style=&quot;color: rgb(119, 119, 119); line-height: 26px; font-family: Poppins, sans-serif; font-size: 14px; margin-bottom: 0px !important;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h4 class=&quot;font-weight-bold line-height-3 custom-font-size-1 mb-1&quot; style=&quot;margin-top: 0px; color: rgb(33, 37, 41); letter-spacing: -0.05em; margin-right: 0px; margin-left: 0px; -webkit-font-smoothing: antialiased; font-family: Poppins, sans-serif; margin-bottom: 0.25rem !important; line-height: 1.3 !important; font-size: 1.3em !important;&quot;&gt;Business At Its Next Level&lt;/h4&gt;\r\n\r\n&lt;p class=&quot;mb-0&quot; style=&quot;color: rgb(119, 119, 119); line-height: 26px; font-family: Poppins, sans-serif; font-size: 14px; margin-bottom: 0px !important;&quot;&gt;The SEO services offered by Vencon Solutions will boost the count of visitors from hundreds to thousands for your organization. That will rank up the position of your organization in a very dynamic way preparing for the most prominent opportunity to accommodate immense organic traffic.&lt;/p&gt;\r\n\r\n&lt;p class=&quot;mb-0&quot; style=&quot;color: rgb(119, 119, 119); line-height: 26px; font-family: Poppins, sans-serif; font-size: 14px; margin-bottom: 0px !important;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h4 class=&quot;font-weight-bold line-height-3 custom-font-size-1 mb-1&quot; style=&quot;margin-top: 0px; color: rgb(33, 37, 41); letter-spacing: -0.05em; margin-right: 0px; margin-left: 0px; -webkit-font-smoothing: antialiased; font-family: Poppins, sans-serif; margin-bottom: 0.25rem !important; line-height: 1.3 !important; font-size: 1.3em !important;&quot;&gt;Trustworthiness With Credibility&lt;/h4&gt;\r\n\r\n&lt;p class=&quot;mb-0&quot; style=&quot;color: rgb(119, 119, 119); line-height: 26px; font-family: Poppins, sans-serif; font-size: 14px; margin-bottom: 0px !important;&quot;&gt;Nowadays, hundreds and thousands of people uncover what they&amp;#39;re looking for daily. By topping the charts and ranking high with various search engines, your business can intensify the Trust, Integrity, Loyalty, and Credibility of your clientele.&lt;/p&gt;', 'service_img_c2ffd1.png', 'services_icon_7e6977.png', 0, 0, 1, '2020-07-28 14:17:15'),
(2, 0, 'Process Outsourcing Services', 'process-outsourcing-services', 'Empowering the ranking of your WebSite', '&lt;p&gt;&lt;br /&gt;\r\nVencon Solutions creates measurable marketing campaigns to track each and every click, each and every call, each and every lead to make you aware that your investment over SEO services are working hard to move forward the position of your business in the industry.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nOur cutting-edge SEO services and solutions help you to attract the right customers from the right crowd to transform more and more leads to expand your business. Vencon Solution works to customize the best mix of online marketing services ranging from the PPC campaign to email marketing campaigns and SEO-based responsiveness within your websites to move the needle and furnish the best results.&lt;/p&gt;', '', '', 'service_img_fae57b.png', 'services_icon_b232be.png', 0, 0, 1, '2020-07-29 05:58:39'),
(3, 0, 'Data Processing Services', 'data-processing-services', 'Empowering the ranking of your WebSite', '&lt;p&gt;&lt;br /&gt;\r\nVencon Solutions creates measurable marketing campaigns to track each and every click, each and every call, each and every lead to make you aware that your investment over SEO services are working hard to move forward the position of your business in the industry.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nOur cutting-edge SEO services and solutions help you to attract the right customers from the right crowd to transform more and more leads to expand your business. Vencon Solution works to customize the best mix of online marketing services ranging from the PPC campaign to email marketing campaigns and SEO-based responsiveness within your websites to move the needle and furnish the best results.&lt;/p&gt;', '', '', 'service_img_91d3ea.png', 'services_icon_471a82.png', 0, 0, 1, '2020-07-29 05:59:11'),
(4, 0, 'Mobile App Development', 'mobile-app-development', 'Empowering the ranking of your WebSite', '&lt;p&gt;&lt;br /&gt;\r\nVencon Solutions creates measurable marketing campaigns to track each and every click, each and every call, each and every lead to make you aware that your investment over SEO services are working hard to move forward the position of your business in the industry.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nOur cutting-edge SEO services and solutions help you to attract the right customers from the right crowd to transform more and more leads to expand your business. Vencon Solution works to customize the best mix of online marketing services ranging from the PPC campaign to email marketing campaigns and SEO-based responsiveness within your websites to move the needle and furnish the best results.&lt;/p&gt;', '', '', 'service_img_be8213.png', 'services_icon_66a53c.png', 0, 0, 1, '2020-07-29 05:59:36'),
(5, 0, 'Web Development', 'web-development', 'Empowering the ranking of your WebSite', '&lt;p&gt;&lt;br /&gt;\r\nVencon Solutions creates measurable marketing campaigns to track each and every click, each and every call, each and every lead to make you aware that your investment over SEO services are working hard to move forward the position of your business in the industry.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nOur cutting-edge SEO services and solutions help you to attract the right customers from the right crowd to transform more and more leads to expand your business. Vencon Solution works to customize the best mix of online marketing services ranging from the PPC campaign to email marketing campaigns and SEO-based responsiveness within your websites to move the needle and furnish the best results.&lt;/p&gt;', '', '', 'service_img_f66894.png', 'services_icon_66a903.png', 0, 0, 1, '2020-07-29 06:00:52'),
(6, 0, 'Cloud Integration', 'cloud-integration', 'Empowering the ranking of your WebSite', '&lt;p&gt;&lt;br /&gt;\r\nVencon Solutions creates measurable marketing campaigns to track each and every click, each and every call, each and every lead to make you aware that your investment over SEO services are working hard to move forward the position of your business in the industry.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nOur cutting-edge SEO services and solutions help you to attract the right customers from the right crowd to transform more and more leads to expand your business. Vencon Solution works to customize the best mix of online marketing services ranging from the PPC campaign to email marketing campaigns and SEO-based responsiveness within your websites to move the needle and furnish the best results.&lt;/p&gt;', '', '', 'service_img_8df118.png', 'services_icon_2a54a3.png', 0, 0, 1, '2020-07-29 06:01:27'),
(7, 2, 'SEO services', 'seo-services', 'Empowering the ranking of your WebSite', '&lt;p&gt;&lt;br /&gt;\r\nVencon Solutions creates measurable marketing campaigns to track each and every click, each and every call, each and every lead to make you aware that your investment over SEO services are working hard to move forward the position of your business in the industry.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nOur cutting-edge SEO services and solutions help you to attract the right customers from the right crowd to transform more and more leads to expand your business. Vencon Solution works to customize the best mix of online marketing services ranging from the PPC campaign to email marketing campaigns and SEO-based responsiveness within your websites to move the needle and furnish the best results.&lt;/p&gt;', '', '', 'service_img_3046f2.png', 'services_icon_7bde8e.png', 0, 0, 1, '2020-07-29 06:01:52'),
(8, 1, 'Enterprice Content Management', 'enterprice-content-management', 'Empowering the ranking of your WebSite', '&lt;p&gt;&lt;br /&gt;\r\nVencon Solutions creates measurable marketing campaigns to track each and every click, each and every call, each and every lead to make you aware that your investment over SEO services are working hard to move forward the position of your business in the industry.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nOur cutting-edge SEO services and solutions help you to attract the right customers from the right crowd to transform more and more leads to expand your business. Vencon Solution works to customize the best mix of online marketing services ranging from the PPC campaign to email marketing campaigns and SEO-based responsiveness within your websites to move the needle and furnish the best results.&lt;/p&gt;', '', '', 'service_img_0e2956.png', 'services_icon_7ca7e1.png', 0, 0, 1, '2020-07-29 06:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `display_order` int(11) NOT NULL,
  `meta_descr` varchar(250) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`id`, `name`, `slug`, `display_order`, `meta_descr`, `image_path`, `description`, `isDelete`, `isActive`, `adate`) VALUES
(1, 'Data Entry Services', 'data-entry-services', 0, '', 'category_img_1aa3a8.png', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.&lt;/p&gt;', 0, 1, '2020-07-25 07:20:14'),
(2, 'Data Conversion Services', 'data-conversion-services', 0, '', 'category_img_590aab.png', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.&lt;/p&gt;', 0, 1, '2020-07-25 07:20:28'),
(3, 'Process Outsourcing Services', 'process-outsourcing-services', 0, '', 'category_img_0fdd7e.png', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.&lt;/p&gt;', 0, 1, '2020-07-25 07:20:41'),
(4, 'Data Processing Services', 'data-processing-services', 0, '', 'category_img_28a13d.png', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.&lt;/p&gt;', 0, 1, '2020-07-25 07:20:56'),
(5, 'Mobile App Development', 'mobile-app-development', 0, '', 'category_img_38cf69.png', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.&lt;/p&gt;', 0, 1, '2020-07-25 07:21:11'),
(6, 'Web Development', 'web-development', 0, '', 'category_img_ef0333.png', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.&lt;/p&gt;', 0, 1, '2020-07-25 07:21:26'),
(7, 'Cloud Integration', 'cloud-integration', 0, '', 'category_img_6664bd.png', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.&lt;/p&gt;', 0, 1, '2020-07-25 07:21:41'),
(8, 'SEO services', 'seo-services', 1, '', 'category_img_d66848.png', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.&lt;/p&gt;', 0, 1, '2020-07-25 07:21:58'),
(9, 'Enterprice Content Management', 'enterprice-content-management', 0, '', 'category_img_a30377.png', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.&lt;/p&gt;', 0, 1, '2020-07-25 07:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `service_inquiry`
--

CREATE TABLE `service_inquiry` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_name` varchar(80) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` text NOT NULL,
  `location` varchar(200) NOT NULL,
  `project` int(11) NOT NULL,
  `city` varchar(150) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `isDelete` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_inquiry`
--

INSERT INTO `service_inquiry` (`id`, `service_id`, `service_name`, `name`, `company_name`, `designation`, `email`, `contact_no`, `location`, `project`, `city`, `subject`, `message`, `isDelete`, `isActive`, `created_date`) VALUES
(1, 1, 'Data Conversion Services', 'yagnik', '', '', 'yagnik@gmail.com', '8758003578', '', 0, '', 'tesdt', 'dfasdfsdfsfdsdfsf', 0, 1, '2020-07-30 12:56:58'),
(2, 1, 'Data Conversion Services', 'yagnik', '', '', 'yagnik@gmail.com', '8758003578', '', 0, '', 'tesdt', 'dfasdfsdfsfdsdfsf', 0, 1, '2020-07-30 12:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `country_id` int(11) NOT NULL DEFAULT 0,
  `isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `country_id`, `isDelete`) VALUES
(1, 'Gujarat', 1, 0),
(2, 'Arunachal Pradesh', 1, 1),
(3, 'Assam', 1, 0),
(4, 'Bihar', 1, 0),
(5, 'Chhattisgarh', 1, 0),
(6, 'Goa', 1, 0),
(7, 'Andhra Pradesh', 1, 0),
(8, 'Haryana', 1, 0),
(9, 'Himachal Pradesh', 1, 0),
(10, 'Jammu and Kashmir', 1, 0),
(11, 'Jharkhand', 1, 0),
(12, 'Karnataka', 1, 0),
(13, 'Kerala', 1, 0),
(14, 'Madhya Pradesh', 1, 0),
(15, 'Maharashtra', 1, 0),
(16, 'Manipur', 1, 0),
(17, 'Meghalaya', 1, 0),
(18, 'Mizoram', 1, 0),
(19, 'Nagaland', 1, 0),
(20, 'Odisha(Orissa)', 1, 0),
(21, 'Punjab', 1, 0),
(22, 'Rajasthan', 1, 0),
(23, 'Sikkim', 1, 0),
(24, 'Tamil Nadu', 1, 0),
(25, 'Tripura', 1, 0),
(26, 'Uttar Pradesh', 1, 0),
(27, 'Uttarakhand', 1, 0),
(28, 'West Bengal', 1, 0),
(29, 'zxczcx', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `display_order` int(11) NOT NULL,
  `meta_descr` varchar(250) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `cid`, `name`, `slug`, `display_order`, `meta_descr`, `image_path`, `description`, `isDelete`, `isActive`, `adate`) VALUES
(1, 3, 'sub-energy', 'sub-energy', 1, '', '', '', 1, 1, '0000-00-00 00:00:00'),
(2, 3, 'Hedge cutter', 'hedge-cutter', 2, '', '', '', 1, 1, '0000-00-00 00:00:00'),
(3, 4, 'Ride-on Movers', 'ride-on-movers', 3, '', '', '', 0, 1, '0000-00-00 00:00:00'),
(4, 7, 'Water pumps', 'water-pumps', 4, '', '', '', 0, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

CREATE TABLE `testimony` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `designation` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimony`
--

INSERT INTO `testimony` (`id`, `name`, `slug`, `designation`, `message`, `image_path`, `isDelete`, `isActive`, `adate`) VALUES
(1, 'John Martin', 'john-martin', 'Main Turner', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry.&lt;/p&gt;', 't1.jpg', 1, 1, '2020-12-30 16:39:10'),
(2, 'jenna martin', 'jenna-martin', 'CEO', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry.&lt;/p&gt;', 'author-2.jpg', 0, 1, '2020-12-30 16:40:17'),
(3, 'sandy', 'sandy', 'Worker', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry.&lt;/p&gt;', 'author-1.jpg', 0, 1, '2020-12-30 16:40:55'),
(4, 'swidy', 'swidy', 'Manager', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry.&lt;/p&gt;', 'author-2.jpg', 0, 1, '2020-12-30 16:41:40'),
(5, 'swin', 'swin', 'Worker', '&lt;p&gt;Lorem Ipsum is simply dummy text of the printing and typesetting industry.&lt;/p&gt;', 'author-1.jpg', 0, 1, '2020-12-30 16:42:06'),
(6, 'test', 'test', 'test', '', 'slidegeeks_logo.png', 1, 0, '2022-03-13 18:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `veterinary`
--

CREATE TABLE `veterinary` (
  `id` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `product_code` varchar(250) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `display_order` int(11) NOT NULL,
  `packing` text NOT NULL,
  `description` text NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `old_file_upload` varchar(250) NOT NULL,
  `icon_image_path` text NOT NULL,
  `file_upload` text NOT NULL,
  `price` varchar(100) NOT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `adate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vision_and_mission`
--

CREATE TABLE `vision_and_mission` (
  `id` int(11) NOT NULL,
  `short_title` varchar(250) NOT NULL,
  `long_title` varchar(250) NOT NULL,
  `short_description` text NOT NULL,
  `big_description` text NOT NULL,
  `our_mission` varchar(300) NOT NULL,
  `our_vision` varchar(300) NOT NULL,
  `short_image_path` varchar(300) NOT NULL,
  `big_image_path` varchar(300) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_type`
--
ALTER TABLE `admin_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alt_img`
--
ALTER TABLE `alt_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_key_table`
--
ALTER TABLE `api_key_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_table`
--
ALTER TABLE `api_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `name` (`blog_title`(255));

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_appointment`
--
ALTER TABLE `book_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `isActive` (`isDelete`);

--
-- Indexes for table `center_of_excellence`
--
ALTER TABLE `center_of_excellence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_slider`
--
ALTER TABLE `client_slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `company_overview`
--
ALTER TABLE `company_overview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_info`
--
ALTER TABLE `contact_us_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_openings`
--
ALTER TABLE `current_openings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbbackup`
--
ALTER TABLE `dbbackup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `export_country`
--
ALTER TABLE `export_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_popup_image`
--
ALTER TABLE `front_popup_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_analytic`
--
ALTER TABLE `google_analytic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infra_structure`
--
ALTER TABLE `infra_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry_form`
--
ALTER TABLE `inquiry_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_our_team`
--
ALTER TABLE `join_our_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_contact_us`
--
ALTER TABLE `monthly_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_team`
--
ALTER TABLE `our_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_admin_right`
--
ALTER TABLE `page_admin_right`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_table`
--
ALTER TABLE `page_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `product_inquiry`
--
ALTER TABLE `product_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_contact_us`
--
ALTER TABLE `project_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_for_demo`
--
ALTER TABLE `request_for_demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheme`
--
ALTER TABLE `scheme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `isActive` (`isDelete`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ip` (`ip`),
  ADD KEY `attemps` (`attempts`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `isActive` (`isDelete`);

--
-- Indexes for table `service_inquiry`
--
ALTER TABLE `service_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `isActive` (`isDelete`);

--
-- Indexes for table `testimony`
--
ALTER TABLE `testimony`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veterinary`
--
ALTER TABLE `veterinary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `vision_and_mission`
--
ALTER TABLE `vision_and_mission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_type`
--
ALTER TABLE `admin_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alt_img`
--
ALTER TABLE `alt_img`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `api_key_table`
--
ALTER TABLE `api_key_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api_table`
--
ALTER TABLE `api_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_appointment`
--
ALTER TABLE `book_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `center_of_excellence`
--
ALTER TABLE `center_of_excellence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1229;

--
-- AUTO_INCREMENT for table `client_slider`
--
ALTER TABLE `client_slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_overview`
--
ALTER TABLE `company_overview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `contact_us_info`
--
ALTER TABLE `contact_us_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `current_openings`
--
ALTER TABLE `current_openings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dbbackup`
--
ALTER TABLE `dbbackup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `export_country`
--
ALTER TABLE `export_country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_popup_image`
--
ALTER TABLE `front_popup_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `google_analytic`
--
ALTER TABLE `google_analytic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infra_structure`
--
ALTER TABLE `infra_structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiry_form`
--
ALTER TABLE `inquiry_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `join_our_team`
--
ALTER TABLE `join_our_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `monthly_contact_us`
--
ALTER TABLE `monthly_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `our_team`
--
ALTER TABLE `our_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_admin_right`
--
ALTER TABLE `page_admin_right`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `page_table`
--
ALTER TABLE `page_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_inquiry`
--
ALTER TABLE `product_inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_contact_us`
--
ALTER TABLE `project_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_for_demo`
--
ALTER TABLE `request_for_demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scheme`
--
ALTER TABLE `scheme`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_inquiry`
--
ALTER TABLE `service_inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimony`
--
ALTER TABLE `testimony`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vision_and_mission`
--
ALTER TABLE `vision_and_mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
