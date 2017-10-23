-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2017 at 01:15 PM
-- Server version: 10.0.25-MariaDB-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cgusaindwebapp_cit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE IF NOT EXISTS `aboutus` (
  `aboutus_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(240) NOT NULL,
  `title1` varchar(240) NOT NULL,
  `aboutus_des` text NOT NULL,
  `aboutus_des1` text NOT NULL,
  `aboutus_image` varchar(100) NOT NULL,
  `meta_title` varchar(240) NOT NULL,
  `meta_des` text NOT NULL,
  PRIMARY KEY (`aboutus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`aboutus_id`, `title`, `title1`, `aboutus_des`, `aboutus_des1`, `aboutus_image`, `meta_title`, `meta_des`) VALUES
(1, 'About Our University', 'Chicago Institute of Technology', '<p>Chicago Institute of Technology is a leading online education and training platform for effective career building and growth, offering courses for the most in-demand skills in today''s competitive environment. We are pioneers for training, career transformation, and staffing. We have a vast community of individuals who have enhanced their skills to excel in careers they are passionate about with our help.</p>\r\n<p>Advanced knowledge and new skills makes an individual a more valuable asset, whether working for an organization, self-employed, or future employer. With todays corporate environment changing faster than ever, it is imperative that everyone stays current by updating existing skills and learning new ones to remain ahead of the curve at the workplace. Chicago Institute of Technology completely understands this need, and has made it easy for individuals to take their first step towards a better career.</p>\r\n<p>Whether you are starting a new business, seeking a new job, or want to become qualified for a promotion, Chicago Institute of Technology empowers you to equip yourself with the required talent and knowledge. &nbsp;We emphasize on practical processes and principles by designing courses that provide you with core skills and knowledge and the best industry practices needed to add value to your professional portfolio.</p>\r\n<p>Offering top-notch solutions designed to overcome real-world challenges, Chicago Institute of Technology has a reputation of bringing out the best in people, both on personal and professional levels. &nbsp;We enable you to leverage from the expertise and extensive experience of industry professionals who have joined our team of tutors and consultants to make contribution towards cultivating a better future for today&rsquo;s generation.</p>\r\n<p>We have a simple mission: to empower individuals through learning, help professionals to attain fulfilling careers, and mentor the next generation leaders with achieve the right skill set.</p>', '', '96d334b3ef2faa552fa5346d6291225b.jpg', 'About Us | Chicago Institute of Technology', 'Chicago Institute of Technology is a platform for professionals where individuals aspiring to learn new and enhance existing skills can make their wish come true.');

-- --------------------------------------------------------

--
-- Table structure for table `account_settings`
--

CREATE TABLE IF NOT EXISTS `account_settings` (
  `ac_id` int(8) NOT NULL,
  `title` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `facebook` varchar(240) NOT NULL,
  `twitter` varchar(240) NOT NULL,
  `linkedin` varchar(240) NOT NULL,
  `youtube` varchar(240) NOT NULL,
  `instagram` varchar(240) NOT NULL,
  `news` enum('yes','no') NOT NULL,
  `gallery` enum('yes','no') NOT NULL,
  `faculty` enum('yes','no') NOT NULL,
  `google` varchar(264) NOT NULL,
  PRIMARY KEY (`ac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_settings`
--

INSERT INTO `account_settings` (`ac_id`, `title`, `email`, `mobile`, `facebook`, `twitter`, `linkedin`, `youtube`, `instagram`, `news`, `gallery`, `faculty`, `google`) VALUES
(1, 'Chicago Institute Of Technology', 'info@chicagoinstituteoftechnology.com', '+1 630-237-4456', 'https://www.facebook.com/chicagoinstituteoftechnology', 'http://google.com', 'http://linkedin.com', 'http://youtube.com', '', 'no', 'no', 'no', 'https://plus.google.com/114235081290151489218');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `as_id` int(8) NOT NULL AUTO_INCREMENT,
  `as_question_id` int(8) NOT NULL,
  `as_userid` int(8) NOT NULL,
  `as_usertype` varchar(12) NOT NULL,
  `as_des` text NOT NULL,
  `as_date` date NOT NULL,
  `as_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`as_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`as_id`, `as_question_id`, `as_userid`, `as_usertype`, `as_des`, `as_date`, `as_status`) VALUES
(8, 5, 37, 'student', 'this is my first test ', '2016-11-28', 1),
(10, 5, 37, 'student', 'Pleas click on this link to Know More about the course http://chicagoinstituteoftechnology.com', '2016-11-28', 1),
(13, 10, 32, 'tutor', 'This is a Dummy Answer!', '2016-11-29', 1),
(14, 6, 37, 'student', 'Collections is Best word', '2016-11-30', 0),
(15, 13, 24, 'tutor', 'Dummy Course#2_GD_Answer_Test Data', '2016-12-01', 1),
(16, 13, 37, 'student', 'Thank You', '2016-12-01', 1),
(17, 14, 24, 'tutor', 'This is a dummy answer\r\nThis is a dummy answer\r\n\r\nThis is a dummy answer\r\n\r\nThis is a dummy answer\r\nThis is a dummy answer\r\nThis is a dummy answer\r\n\r\n\r\n\r\nThis is a dummy answer\r\nThis is a dummy answer\r\nThis is a dummy answer', '2017-01-17', 1),
(18, 14, 52, 'student', 'Dummy Answer from Student\r\nDummy Answer from Student\r\nDummy Answer from Student\r\nDummy Answer from Student\r\n\r\n\r\nDummy Answer from Student Dummy Answer from Student Dummy Answer from Student Dummy Answer from Student\r\n\r\n\r\nDummy Answer from Student\r\nDummy Answer from Student\r\nDummy Answer from Student', '2017-01-17', 1),
(19, 15, 17, 'student', 'sdadsaf', '2017-04-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(180) NOT NULL,
  `title` varchar(180) NOT NULL,
  `banner_image` varchar(84) NOT NULL,
  `banner_des` text NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `name`, `title`, `banner_image`, `banner_des`) VALUES
(1, 'slider1', 'Online Professional Training', '7ed7ee794420050d4f94456dadc26881.jpg', '<p>Learn New Talents and Enhance your Skill Set</p>'),
(2, 'slider2', 'Technology Courses', '9dc8c4896b58bcc295025b923a5a34fb.jpg', '<p>Get up to Speed with Cutting-edge Technology in your Industry</p>'),
(3, 'slider3', 'Digital Media Marketing', '050fa8aa422d172e4c9c3c291ca485fb.jpg', '<p>Gear yourself with Latest Digital Marketing Trends</p>');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blog_id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(240) NOT NULL,
  `blog_image` varchar(64) NOT NULL,
  `blog_des` text NOT NULL,
  `blog_date` varchar(24) NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `blog_image`, `blog_des`, `blog_date`) VALUES
(1, 'Lorem Lipsum Proin Gravide Nibh Vel Velit1', '66d0305345e548c962f43531e760fa13.jpg', '<p>Lorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel Velit1</p>', '11/15/2016'),
(2, 'Lorem Lipsum Proin Gravide Nibh Vel Velit1', '66d0305345e548c962f43531e760fa13.jpg', '<p>Lorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel Velit1</p>', '11/20/2016'),
(3, 'Lorem Lipsum Proin Gravide Nibh Vel Velit1', '66d0305345e548c962f43531e760fa13.jpg', '<p>Lorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel Velit1</p>', '11/20/2016'),
(4, 'Lorem Lipsum Proin Gravide Nibh Vel Velit1', '66d0305345e548c962f43531e760fa13.jpg', '<p>Lorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel Velit1</p>', '11/20/2016');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE IF NOT EXISTS `careers` (
  `careers_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(240) NOT NULL,
  `career_image` varchar(240) NOT NULL,
  `career_des` text NOT NULL,
  `meta_title` varchar(240) NOT NULL,
  `meta_des` text NOT NULL,
  `title1` varchar(260) NOT NULL,
  `title2` varchar(260) NOT NULL,
  PRIMARY KEY (`careers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`careers_id`, `title`, `career_image`, `career_des`, `meta_title`, `meta_des`, `title1`, `title2`) VALUES
(1, 'Careers', 'bddc3a5192ee6b599f2a2ff004c1b171.jpg', '<p>Organizations are always searching for cr&egrave;me de la cr&egrave;me candidates to fill in prominent positions. Since Chicago Institute of Technology is reputed to have a vast community of highly talented students, employers from diverse industries turn to our online platform to select candidates for major roles in their organization.</p>\r\n<p>Thanks to our team of highly qualified tutors and trainers that uses a combination of structure learning and practical application practices, we are able equip our students with essential and advanced knowledge and skills to excel in today''s competitive environment. This is what organizations look for in a candidate.</p>\r\n<p>Whether you are an executive looking for a management level job, or a highly skilled individual having firm grasp over networking, you can find a great job through our online job portal. From medium sized companies to enterprises, we have connections with hundreds of global organizations who trust us for supplying with potential candidates. They are well aware of our competent faculty and high standards of education and training, which is the reason why our students are able to secure a job at reputed companies.</p>\r\n<p>Students should regularly visit our Careers page, which is updated on a daily basis, to find a job where they can apply their existing and newly acquired skill set and knowledge. Moreover, when companies request a list of potential candidates for a particular job, we look through our student database to match with the job specifications. So make sure that you regularly update your student profile so that we are able to suggest you for different jobs that come in everyday.</p>', 'Careers | Chicago Institute of Technology', 'Discover why employers post jobs at Chicago Institute of Technology and how it can help you secure a great job in your field of expertise.', 'For more information', 'Contact our administration or send your detials through the inquiry from');

-- --------------------------------------------------------

--
-- Table structure for table `cartcms`
--

CREATE TABLE IF NOT EXISTS `cartcms` (
  `cartcms_id` int(4) NOT NULL,
  `title1` varchar(240) NOT NULL,
  `title2` varchar(240) NOT NULL,
  `title3` varchar(240) NOT NULL,
  `title4` varchar(240) NOT NULL,
  `title5` varchar(240) NOT NULL,
  `title6` varchar(240) NOT NULL,
  `title7` varchar(240) NOT NULL,
  `title8` varchar(240) NOT NULL,
  `title9` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartcms`
--

INSERT INTO `cartcms` (`cartcms_id`, `title1`, `title2`, `title3`, `title4`, `title5`, `title6`, `title7`, `title8`, `title9`) VALUES
(1, 'Start Learning Right Away !', 'Post-enrolment you will have immediate access to', 'Learning management system', 'Videos of previous class recordings', 'Assignments and Projects', 'Lifetime Access to Session Videos ', '24X7 Expert Technical Support', 'Need help?', '+1 630-237-4960');

-- --------------------------------------------------------

--
-- Table structure for table `cb_coun`
--

CREATE TABLE IF NOT EXISTS `cb_coun` (
  `cb_coun_id` int(8) NOT NULL AUTO_INCREMENT,
  `cb_coun_batchid` int(8) NOT NULL,
  `cb_coun_countryid` int(8) NOT NULL,
  PRIMARY KEY (`cb_coun_id`),
  KEY `cb_coun_batchid` (`cb_coun_batchid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `cb_coun`
--

INSERT INTO `cb_coun` (`cb_coun_id`, `cb_coun_batchid`, `cb_coun_countryid`) VALUES
(11, 24, 6),
(15, 23, 4),
(16, 23, 6),
(17, 23, 7),
(25, 25, 4),
(26, 25, 6),
(27, 25, 7),
(29, 26, 4),
(30, 27, 6),
(31, 28, 4),
(32, 22, 6),
(33, 22, 7),
(34, 21, 6),
(35, 21, 7),
(38, 19, 6),
(39, 19, 7),
(40, 18, 6),
(41, 18, 7),
(42, 17, 6),
(43, 17, 7),
(44, 16, 6),
(45, 16, 7),
(46, 15, 6),
(47, 15, 7),
(50, 29, 4),
(51, 30, 4),
(54, 33, 4),
(55, 34, 4),
(56, 35, 4),
(57, 36, 4),
(58, 37, 4),
(59, 32, 4),
(60, 31, 4),
(61, 14, 6),
(62, 14, 7),
(63, 20, 6),
(64, 20, 7),
(65, 38, 6),
(66, 38, 7),
(68, 39, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cb_type`
--

CREATE TABLE IF NOT EXISTS `cb_type` (
  `cbtype_id` int(8) NOT NULL AUTO_INCREMENT,
  `cbtype_batch_id` int(8) NOT NULL,
  `cbtype_name` varchar(12) NOT NULL,
  PRIMARY KEY (`cbtype_id`),
  KEY `cbtype_batch_id` (`cbtype_batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `cb_type`
--

INSERT INTO `cb_type` (`cbtype_id`, `cbtype_batch_id`, `cbtype_name`) VALUES
(11, 24, 'online'),
(13, 23, 'online'),
(17, 25, 'oncampus'),
(19, 26, 'online'),
(20, 27, 'online'),
(21, 28, 'oncampus'),
(22, 22, 'oncampus'),
(23, 21, 'oncampus'),
(25, 19, 'online'),
(26, 18, 'online'),
(27, 17, 'online'),
(28, 16, 'online'),
(29, 15, 'online'),
(31, 29, 'oncampus'),
(32, 30, 'oncampus'),
(35, 33, 'online'),
(36, 34, 'online'),
(37, 35, 'online'),
(38, 36, 'online'),
(39, 37, 'online'),
(40, 32, 'online'),
(41, 31, 'oncampus'),
(42, 14, 'online'),
(43, 20, 'oncampus'),
(44, 38, 'online'),
(46, 39, 'online');

-- --------------------------------------------------------

--
-- Table structure for table `ci_cookies`
--

CREATE TABLE IF NOT EXISTS `ci_cookies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie_id` varchar(255) DEFAULT NULL,
  `netid` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `orig_page_requested` varchar(120) DEFAULT NULL,
  `php_session_id` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0f231318eb4f5224dd04e7d726e90728', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.10.2704.63 Safari/537.36', 1477369201, ''),
('a17f18ee3a4429171d5388bda6d1035f', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.10.2704.63 Safari/537.36', 1477128377, 'a:7:{s:9:"user_data";s:0:"";s:9:"user_name";s:5:"admin";s:12:"is_logged_in";b:1;s:20:"manufacture_selected";N;s:22:"search_string_selected";N;s:5:"order";N;s:10:"order_type";N;}');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE IF NOT EXISTS `contact_form` (
  `cf_id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(120) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `subject` varchar(120) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`cf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`cf_id`, `name`, `email`, `mobile`, `subject`, `message`) VALUES
(3, 'test', 'srinivas@thecolourmoon.com', '1234567890', 'testing', 'testing'),
(4, 'srinu', 'sd@gmail.com', '1234567890', 'course details', 'Testing from admin'),
(5, 'test2', 'test2@test2.com', '456125852', 'TEST_Nov23_Contact Us', 'TEST_Nov23_Contact Us'),
(6, 'test2', 'test2@test2.com', '456125852', 'TEST_Nov23_Contact Us', 'TEST_Nov23_Contact Us'),
(7, 'Vijay', 'vijay@thecolourmoon.com', '9966123456', 'Test', 'Testing'),
(8, 'krystle Riggs', 'krystleriggs.mkt@gmail.com', '800-589-0416', 'Increase traffic to your website', 'Hi, \r\n\r\nWe are interested to increase traffic to your website, please get back to us in order to discuss the possibility in further detail.\r\n\r\nThank You'),
(9, 'Andrea Hauger - Owen Wagener & C', 'ahauger@owenwagener.com', '847-706-7153', 'Available Office Space', 'Ranjit,\r\nI had stopped in your office last month and you had mentioned you would be needing additional space.\r\nI am a commercial Real Estate Broker and can help you in locating another property if interested.  Please give me a call to discuss.  Thank You.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE IF NOT EXISTS `contact_info` (
  `contact_info_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(120) NOT NULL,
  `email2` varchar(120) NOT NULL,
  `phone` varchar(15) NOT NULL,
  PRIMARY KEY (`contact_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`contact_info_id`, `address`, `email`, `email2`, `phone`) VALUES
(1, '<p><strong>Chicago Institute of Technology</strong></p>\r\n<p>109 Fairfield Way, Suite 303</p>\r\n<p>Bloomingdale, IL 60108</p>', 'info@chicagoinstituteoftechnology.com', 'trainings@chicagoinstituteoftechnology.com', '+1 630-237-4456');

-- --------------------------------------------------------

--
-- Table structure for table `content_pages`
--

CREATE TABLE IF NOT EXISTS `content_pages` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(240) NOT NULL,
  `page_heading` varchar(240) NOT NULL,
  `page_des` text NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `content_pages`
--

INSERT INTO `content_pages` (`p_id`, `page_name`, `page_heading`, `page_des`) VALUES
(1, 'Home Page', 'Home page Heading', '<p>Home Page description for update</p>'),
(2, 'About us', 'About Us heading', '<p>Adbout us Page Description here.....</p>'),
(3, 'Contact Us', 'Contact  Info', '<div class="contact_heading">\r\n<h4>CONTACT INFO</h4>\r\n</div>\r\n<ul class="contact_meta plml">\r\n<li><strong>Chicago Institute Of Technology</strong>, <br />113 Fairfield Way, Suite 204,<br />Bloomingdale,<br />IL 60108</li>\r\n<li><a href="http://demo.org.in/html/chicago4/contactus.php">+1 630-237-4960</a></li>\r\n<li><a href="http://demo.org.in/html/chicago4/contactus.php">Info@Chicagoinstituteoftechnology.Com</a><br /><a href="http://demo.org.in/html/chicago4/contactus.php">Trainings@Chicagoinstituteoftechnology.Com</a></li>\r\n</ul>\r\n<div class="contact_heading social">&nbsp;</div>'),
(4, 'Terms and Conditions', 'Terms and Conditions', '<h4>Terms of Use</h4>\r\n<p>Please carefully read this agreement ("Agreement") before accessing or using this Internet Web site ("Web Site"). When you access or use the Web Site, you are agreeing to be bound by this Agreement, including the liability disclaimers contained below. If you do not agree to the terms contained herein, do not use this Web Site or download any information from it. Materials on this Web Site may be accessed, downloaded and printed only for personal and non-commercial use. By using this Web Site, you agree that you will not use any materials or information found on this Web Site for any purpose that is unlawful or prohibited by this Agreement, including, but not limited to, the use of this Web Site from locations outside of the United States of America or if you are under 18 years of age. Your permission to use the Web Site is automatically terminated if you violate any of the terms contained in this Agreement.</p>\r\n<h4>Copyright and Trademark Rights</h4>\r\n<p>The contents of this Web Site are owned and copyrighted by DigiTek IT Inc. DBA Chicago Institute of Technology and are protected by the laws of the United States, its treaty countries and other jurisdictions. All rights are reserved and no reproduction, distribution, or transmission of the copyrighted materials at this Web Site is permitted without the written permission of DigiTek IT Inc. DBA Chicago Institute of Technology. All trademarks, logos and service marks are the property of DigiTek IT Inc. DBA Chicago Institute of Technology.</p>\r\n<h4>Consent</h4>\r\n<p>You hereby understand and agree that by using this Web Site, you automatically and without any further action have established a business relationship between you and DigiTek IT Inc. DBA Chicago Institute of Technology. As a result you agree to allow DigiTek IT Inc. DBA Chicago Institute of Technology to contact you about its business via telephone, e-mail and /or standard mail using the contact information you have provided. You hereby consent to such contact even if your phone number is on any Do Not Call list.</p>\r\n<h4>Liability Disclaimer</h4>\r\n<p>DigiTek IT Inc. DBA Chicago Institute of Technology strives to make sure that the information on its web site is accurate, but inaccuracies or errors can occur. You use this web site at your own risk. DigiTek IT Inc. DBA Chicago Institute of Technology reserves the right to change or modify the content of its web site at any time with or without notice. Your continued use of the web site constitutes your acceptance of such modified terms. This web site and all of the information contained therein are provided "as is." DigiTek IT Inc. DBA Chicago Institute of Technology disclaims any and all warranties of any kind, whether express or implied, as to anything whatsoever relating to this web site and any information provided herein, including without limitation the implied warranties of merchantability, fitness for a particular purpose, title, and non-infringement. DigiTek IT Inc. DBA Chicago Institute of Technology is not liable for any direct, indirect, special, punitive, incidental or consequential damages caused by the use of this web site and/or the content located thereon, whether resulting in whole or in part, from breach of contract, tortious conduct, negligence, strict liability or any other cause of action because some jurisdictions do not allow the exclusion of implied warranties, the above exclusion may not apply to you.</p>\r\n<h4>Indemnification/Legal Relief</h4>\r\n<p>You agree to indemnify and hold DigiTek IT Inc. DBA Chicago Institute of Technology harmless from and against any and all loss, cost, damage, or expense including, but not limited to, reasonable attorneys'' fees incurred by DigiTek IT Inc. DBA Chicago Institute of Technology arising out of any action at law or other proceeding necessary to enforce any of the terms, covenants or conditions of the Agreement or due to your breach of this Agreement.</p>\r\n<h4>Governing Law and Venue</h4>\r\n<p>This Agreement shall be governed by the laws of the State of Illinois. You hereby consent and voluntarily submit to personal jurisdiction in the State of Illinois, in and by the courts of the State of Illinois in DuPage County, in any action in which a claim is brought with respect to this Agreement and you agree that it may be served with process in any such action by hand delivery, courier, overnight delivery service, or certified or registered mail, return receipt requested. You irrevocably and unconditionally waive and agree not to plead, to the fullest extent permitted by law, any objection that it may now or hereafter have to the laying of venue or the convenience of the forum of any action or claim with respect to this Agreement brought in the United States District Court for the State of Illinois or the courts of DuPage County.</p>\r\n<h4>Miscellaneous</h4>\r\n<p>This Agreement embodies the entire agreement between the parties and may not be amended, modified, altered or changed in any respect whatsoever except by writing duly executed by the parties hereto. This Agreement supersedes any and all prior and contemporaneous oral or written agreements or understandings between you and DigiTek IT Inc. DBA Chicago Institute of Technology. No representation, promise, inducement or statement of intention has been made by you and DigiTek IT Inc. DBA Chicago Institute of Technology that is not embodied in this Agreement. You and DigiTek IT Inc. DBA Chicago Institute of Technology shall not be bound by, or liable for, any alleged representation, promise, inducement, or statement of intention not contained in this Agreement. A printed version of this Agreement shall be admissible in judicial or administrative proceedings based upon or relating to this Agreement to the same extent and subject to the same conditions as other business documents and records originally generated and maintained in printed form. You agree that each provision to this Agreement shall be construed independent of any other provision of this Agreement. The invalidity or unenforceability of any particular provision of this Agreement shall not affect the other provisions hereof. In the event any provision of this Agreement is deemed unenforceable, including, but not limited to, the liability disclaimers above, the unenforceable provision shall be replaced with an enforceable provision that most closely reflects the intent of the original provision.</p>'),
(5, 'REFUND POLICY', 'REFUND POLICY', '<p>DigiTek IT Inc. DBA Chicago Institute of Technology is founded with the vision to provide best-in-class software development and quality assurance services to a diverse set of customers. DigiTek IT Inc. DBA Chicago Institute of Technology is a leader in consulting, technology and outsourcing solutions. We help enterprises transform and thrive in a changing world through strategic consulting, operational leadership and the co-creation of breakthrough solutions, including those in mobility, sustainability, big data and cloud computing. Our holistic approach to pro-active customer service has helped us carve a niche for ourselves in the industry. Thank you for buying our courses. We want to make sure that our users have a rewarding experience while they are discovering information, assessing, and purchasing our training courses, whether it may be for online or classroom training courses. As with any online and on telephone or in person purchase experience, the below are the terms and conditions that govern the Refund Policy. When you enrol a training course from the DigiTek IT Inc. DBA Chicago Institute of Technology, you agree to our Privacy Policy, Terms of Use and the points below.</p>\r\n<h4>Cancellation &amp; Refunds Classroom Training/Instructor led Online Training :</h4>\r\n<p>DigiTek IT Inc. DBA Chicago Institute of Technology, reserves the right to postpone/cancel an event, or change the location of an event because of insufficient enrolment, instructor illness or force-majeure events (like floods, earthquakes, political instability, etc.)</p>\r\n<ul>\r\n<li>In case DigiTek IT Inc. DBA Chicago Institute of Technology cancels an event, 100% refund will be paid to the delegate.</li>\r\n<li>If a cancellation is done by a delegate 7 days or more, prior to the event, 10% of total paid fee will be deducted and the remaining amount will be refunded back to the delegate.</li>\r\n<li>If a cancellation is done by a delegate 7 days or less, prior to the event, no refunds will be made.</li>\r\n</ul>\r\n<h4>Cancellation &amp; Refunds: Online Training:</h4>\r\n<ul>\r\n<li>If the cancellation is done by the delegate within 48 hours of subscribing, 10% of total paid fee will be deducted as administration fee.</li>\r\n<li>If the cancellation is done by the delegate after 48 hours of subscribing then 50% refund will be made.</li>\r\n<li>No refund will be made to the delegate after 72 hours of subscribing to the course.</li>\r\n</ul>\r\n<h4>Refunds: Duplicate payment</h4>\r\n<p>Refund of the duplicate payment made by the delegate will be processed via same source (original method of payment) within 5 to 7 working days after intimation by the customer.</p>\r\n<p>Change is inevitable, making it appropriate to include a clause that informs students of possible modifications due to unforeseen events, such as "The instructor reserves the right to make changes to the syllabus, including project due dates and test dates (excluding the officially scheduled final examination), when unforeseen circumstances occur. These changes will be announced as early as possible so that students can adjust their schedules."</p>\r\n<p><strong>NOTE: All refunds will be processed within 30 days of receipt of the refund request.</strong></p>'),
(6, 'PRIVACY STATEMENT', 'PRIVACY STATEMENT', '<p>This privacy notice discloses the privacy practices for DigiTek IT Inc. DBA Chicago Institute of Technology. This privacy notice applies solely to information collected by this web site. It will notify you of the following:</p>\r\n<ol>\r\n<li>1. What personally identifiable information is collected from you through the web site, how it is and with whom it may be shared.</li>\r\n<li>2. What choices are available to you regarding the use of your data?</li>\r\n<li>3. The security procedures in place to protect the misuse of your information.</li>\r\n<li>4. How you can correct any inaccuracies in the information?</li>\r\n</ol>\r\n<h4>Information Collection, Use, and Sharing</h4>\r\n<p>We are the sole owners of the information collected on this site. We only have access to/collect information that you voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.</p>\r\n<p>We will use your information to respond to you, regarding the reason you contacted us. We will not share your information with any third party outside of our organization, other than as necessary to fulfil your request, e.g. to ship an order.</p>\r\n<p>Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy.</p>\r\n<h4>Your Access to and Control Over Information</h4>\r\n<p>You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the email address or phone number given on our website:</p>\r\n<ul>\r\n<li>See what data we have about you, if any.</li>\r\n<li>Change/correct any data we have about you.</li>\r\n<li>Have us delete any data we have about you.</li>\r\n<li>Express any concern you have about our use of your data.</li>\r\n</ul>\r\n<h4>Security</h4>\r\n<p>We take precautions to protect your information. When you submit sensitive information via the website, your information is protected both online and offline.</p>\r\n<p>Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way. You can verify this by looking for a closed lock icon at the bottom of your web browser, or looking for "https" at the beginning of the address of the web page.</p>\r\n<p>While we use encryption to protect sensitive information transmitted online, we also protect your information offline. Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information. The computers/servers in which we store personally identifiable information are kept in a secure environment.</p>\r\n<p>If you feel that we are not abiding by this privacy policy, you should contact us immediately <a href="../../../contact_us">here</a>.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `corporate_services`
--

CREATE TABLE IF NOT EXISTS `corporate_services` (
  `corporate_services_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(240) NOT NULL,
  `corporate_services_image` varchar(64) NOT NULL,
  `corporate_services_des` text NOT NULL,
  `meta_title` varchar(240) NOT NULL,
  `meta_des` text NOT NULL,
  `title1` varchar(260) NOT NULL,
  `title2` varchar(260) NOT NULL,
  PRIMARY KEY (`corporate_services_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `corporate_services`
--

INSERT INTO `corporate_services` (`corporate_services_id`, `title`, `corporate_services_image`, `corporate_services_des`, `meta_title`, `meta_des`, `title1`, `title2`) VALUES
(1, 'CORPORATE TRAINING', '928724e6babf4ecbafce325ee73ca2b3.jpg', '<p>At Chicago Institute of Technology, we offer a wide range of corporate training and service courses, carefully designed to help organizations improve their employees'' performance and enhance their skills. When employees opt for our online training programs, they become more competent at their current job, and develop a skill set that makes them eligible for higher level jobs, which increases their value within their organization. They are able to align their individual visions, values, and missions, with their company''s strategic goals, and hone their abilities to derive performance with the help of our highly effective corporate training and service programs.</p>\r\n<p>The tutors and consultants at Chicago Institute of Technology are experienced individuals who are at prominent management positions in various industries and have practical knowledge of different business and management applications. Their expertise and command over different subject matters will help your employees to reap maximum benefit by bridging skill gaps from our training courses.</p>\r\n<p>We believe that structured learning is an effective and viable option for skill and competency development. Our tutors and trainers create an educational environment for employees that foster support and development through multidimensional solutions and cutting-edge approaches. Our learning model couples structured learning with talent management, performance support, social networking and collaboration, knowledge management, and understanding of technical intricacies to reinforce the effectiveness of corporate training and service programs.</p>\r\n<p>When your employees complete our training course, we ensure that they are capable of applying their knowledge on their job, which will lead to improved performance. We provide direct access to refresher tutorials, expert colleagues, job aids, and many other things to ensure that your employees know when and how to apply their newly developed skills. Combining training and performance support ensures effective knowledge transfer and enhanced productive efficiency.</p>', 'Corporate Training | Chicago Institute of Technology', 'Discover how Chicago Institute of Technology helps companies in training their employees and enhancing their skill set to achieve their organizational goals.', 'If you are interested in enrolling a single executive or a batch of employees', 'To one of our online corporate training and service programs, contact Chicago Institute of Technology to request a quote.');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(120) NOT NULL,
  `country_image` varchar(240) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `country_image`) VALUES
(4, 'India', '2dd2f418a0b1b1cc8f01d420e82b9cb9.jpg'),
(6, 'United States', '129c72c5b769cbea13dad317bfddb596.jpg'),
(7, 'Canada', 'a18a07079feb313ac13ebbd64eb5c3b4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(240) NOT NULL,
  `course_country` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `course_image` varchar(240) NOT NULL,
  `course_des` text NOT NULL,
  `course_tags` varchar(240) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_country`, `cat_id`, `course_image`, `course_des`, `course_tags`) VALUES
(11, 'Core Java', 6, 2, '', '<p>This course is designed to be 100% compliant with Oracle Certified Java Professional Exam. You can easily score above 90% after completing this course successfully. Complete Core Java is covered in this course. After Completing Core Java Training at Chicago Institute of Technology you will be able to develop any APIs with proper design methodologies.</p>', 'software development, programming, java, beginners,'),
(13, 'Advanced Java', 6, 2, '', '<p>This course is designed to bring you to industry expectations. After finishing advanced Java Training you will be able to work like a professional in any company. Moreover it will help you to crack any Java Interview. In this training you will get exposure to many APIs which are widely used in industry.</p>', 'Java, Software Development, Programming, Advanced Java, J2EE'),
(14, 'Java Frameworks', 6, 2, '', '<p>This course aims at helping students advance their expertise in Java. In this course you will learn the frameworks that drive the backend of a Java applications.</p>', 'Java, Software Development, Programming, Frameworks, Spring, Hibernate, JDBC, JMS, JSP, MVC'),
(15, 'Selenium Testing', 6, 3, '', '<p>This course will help individuals to meet the growing demands in the market of selenium testing.</p>', 'Testing, Automation Testing, Java Testing, IDE, Selenium, Quality Engineering'),
(16, 'Manual Testing', 6, 3, '', '<p>This course helps people involved in manual testing to enhance their skills and learn how to get better, more accurate results.</p>', 'Testing, Software Testing, Manual Testing, QC, QualityCenter, HP, ALM, Jira, Agile, SDLC'),
(17, 'QuickTest Professional', 6, 3, '', '<p>This course introduces you to one of the most popular automation testing tool QTP</p>', 'QTP, Testing, Automation Testing, HP, Quality Engineering'),
(24, 'Test', 0, 13, '', '<p>Test</p>\r\n<p>Test</p>\r\n<p>&nbsp;</p>\r\n<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>\r\n<p>Test</p>', ''),
(25, 'QTP', 0, 14, '', '<p>Sample Course</p>', 'QA, Testing, SQA'),
(26, 'TEST@2', 0, 3, '', '<p>TEST</p>', 'TEST2');

-- --------------------------------------------------------

--
-- Table structure for table `course_batches`
--

CREATE TABLE IF NOT EXISTS `course_batches` (
  `batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `cb_batchname` varchar(120) NOT NULL,
  `cb_course_type` varchar(120) NOT NULL,
  `cb_tutor_id` int(11) NOT NULL,
  `cb_course_id` int(11) NOT NULL,
  `cb_cat_id` int(11) NOT NULL,
  `cb_country` varchar(120) NOT NULL,
  `cb_image` varchar(84) NOT NULL,
  `cb_price` double NOT NULL,
  `cb_price_rs` double NOT NULL,
  `cb_time` smallint(4) NOT NULL,
  `cb_duration` smallint(4) NOT NULL,
  `cb_rating` tinyint(1) NOT NULL,
  `cb_start_date` date NOT NULL,
  `cb_end_date` date NOT NULL,
  `cb_course_shortdes` text NOT NULL,
  `cb_course_des` text NOT NULL,
  `cb_day_table` text NOT NULL,
  `lesson_name` text NOT NULL,
  `lesson_time` text NOT NULL,
  `cb_course_curr` varchar(120) NOT NULL,
  `cb_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `course_batches`
--

INSERT INTO `course_batches` (`batch_id`, `cb_batchname`, `cb_course_type`, `cb_tutor_id`, `cb_course_id`, `cb_cat_id`, `cb_country`, `cb_image`, `cb_price`, `cb_price_rs`, `cb_time`, `cb_duration`, `cb_rating`, `cb_start_date`, `cb_end_date`, `cb_course_shortdes`, `cb_course_des`, `cb_day_table`, `lesson_name`, `lesson_time`, `cb_course_curr`, `cb_status`) VALUES
(14, 'Core Java_Batch#1', 'a:1:{i:0;s:6:"online";}', 13, 11, 2, 'a:2:{i:0;s:1:"6";i:1;s:1:"7";}', '', 599, 0, 60, 30, 4, '2016-11-28', '2017-01-06', '<p>Complete Core Java is covered in this course. After Completing Core Java Training at Chicago Institute of Technology you will be able to develop any APIs with proper design methodologies.</p>', '<p>Complete Core Java is covered in this course. You will be able to develop desktop applications using swings. This acts as foundation for your development career. Syllabus is designed with the best interest of Industry requirement.</p>', '{"batch_days":["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"8:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"10:00am","day_time_close3":"9:00am","day_time_close4":"10:00am","day_time_close5":"10:30am","day_time_close6":"10:00am","day_time_close7":"11:00am"}', 'a:10:{i:0;s:17:"Java Introduction";i:1;s:6:"Basics";i:2;s:12:"Java Objects";i:3;s:39:"Comparisons And Flow Control Structures";i:4;s:22:"Arrays and Collections";i:5;s:11:"Inheritance";i:6;s:10:"Interfaces";i:7;s:30:"Exception handling and Logging";i:8;s:24:"Generics and Collections";i:9;s:13:"Inner Classes";}', 'a:10:{i:0;s:7:"2 Hours";i:1;s:7:"2 Hours";i:2;s:7:"2 Hours";i:3;s:7:"2 Hours";i:4;s:7:"2 Hours";i:5;s:7:"2 Hours";i:6;s:7:"2 Hours";i:7;s:7:"2 Hours";i:8;s:7:"2 Hours";i:9;s:7:"2 Hours";}', '00dc86a80dcce71b97d063741c0f369a.pdf', 0),
(15, 'Advanced Java_Batch#1', 'a:1:{i:0;s:6:"online";}', 13, 13, 2, 'a:2:{i:0;s:1:"6";i:1;s:1:"7";}', '', 699, 0, 60, 30, 5, '2016-11-28', '2017-01-06', '<p>This course is designed to bring you to industry expectations. After finishing advanced Java Training you will be able to work like a professional in any company. Moreover it will help you to crack any Java Interview. In this training you will get exposure to many APIs which are widely used in industry.</p>', '<p>Advance Java training is intended on developing software using the Java 2 Platform, Standard Edition, or J2SE. It is focused and much concentrated for those with solid experience in structured and object-oriented Java programming, JSP training, including use of the Collections API and exception handling. If you are an experienced Java programmer, able to build, test, and debug complex applications using structured and object- oriented code designs, and familiar with the Collections API and Java exception-handling Advance Java online training is best for you.</p>', '{"batch_days":["Monday","Tuesday","Wednesday","Thursday","Friday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"8:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"10:00am","day_time_close3":"9:00am","day_time_close4":"10:00am","day_time_close5":"10:30am","day_time_close6":"10:00am","day_time_close7":"11:00am"}', 'a:8:{i:0;s:20:"Database Programming";i:1;s:37:"Getting Started with Web Applications";i:2;s:23:"Java Servlet Technology";i:3;s:28:"Java Server Pages Technology";i:4;s:38:"Java Server Pages Standard Tag Library";i:5;s:21:"Enterprise JAVA Beans";i:6;s:28:"JAVA Messaging Service (JMS)";i:7;s:20:"Message-Driven Beans";}', 'a:8:{i:0;s:7:"2 Hours";i:1;s:7:"4 Hours";i:2;s:7:"4 Hours";i:3;s:7:"4 Hours";i:4;s:7:"2 Hours";i:5;s:7:"4 Hours";i:6;s:7:"4 Hours";i:7;s:7:"2 Hours";}', 'b073bad51e840e1af76210799ea45aff.pdf', 0),
(16, 'Java Frameworks_Batch#1', 'a:1:{i:0;s:6:"online";}', 13, 14, 2, 'a:2:{i:0;s:1:"6";i:1;s:1:"7";}', '', 500, 0, 80, 40, 5, '2016-11-28', '2017-01-06', '<p>This course introduces you to Java Frameworks</p>', '<p>This course is intended for students and professionals who have strong knowledge and programming experience in Core and Advanced Java. In this course, you will learn about Java Frameworks such as Spring and Hibernate that drive the backend of a Java application.</p>', '{"batch_days":["Monday","Tuesday","Wednesday","Thursday","Friday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"8:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"10:00am","day_time_close3":"9:00am","day_time_close4":"10:00am","day_time_close5":"10:30am","day_time_close6":"10:00am","day_time_close7":"11:00am"}', 'a:2:{i:0;s:16:"Spring Framework";i:1;s:9:"Hibernate";}', 'a:2:{i:0;s:7:"5 Weeks";i:1;s:7:"3 Weeks";}', '242891e2fc89deac0c3e0adbb37aa84c.pdf', 0),
(17, 'Selenium Testing_Batch#1', 'a:1:{i:0;s:6:"online";}', 15, 15, 3, 'a:2:{i:0;s:1:"6";i:1;s:1:"7";}', '', 550, 0, 60, 30, 5, '2016-11-28', '2017-01-06', '<p>This course will help individuals to meet the growing demands in the market of selenium testing.</p>', '<p>Selenium is the most popular automation testing tool mainly used for testing Java applications. In this course you will be introduced to different flavours of Selinum and other build tools.</p>\r\n<p>Students and professionals with good knowlege and programming skills in Core and Advanced Java can apply for this course.</p>', '{"batch_days":["Monday","Tuesday","Wednesday","Thursday","Friday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"8:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"10:00am","day_time_close3":"9:00am","day_time_close4":"10:00am","day_time_close5":"10:30am","day_time_close6":"10:00am","day_time_close7":"11:00am"}', 'a:11:{i:0;s:12:"Introduction";i:1;s:30:"Different Flavours in Selenium";i:2;s:12:"Selenium IDE";i:3;s:32:"Locators & Object Identification";i:4;s:15:"JUnit Framework";i:5;s:16:"TestNG Framework";i:6;s:19:"Selenium WEB-DRIVER";i:7;s:30:"Working with Multiple Browsers";i:8;s:41:"Build Configuration Tool – Apache Maven";i:9;s:31:"Version Controlling Tool GITHUB";i:10;s:25:"Automation Test Framework";}', 'a:11:{i:0;s:7:"1 Hours";i:1;s:7:"2 Hours";i:2;s:7:"2 Hours";i:3;s:7:"4 Hours";i:4;s:7:"4 Hours";i:5;s:7:"4 Hours";i:6;s:7:"2 Hours";i:7;s:6:"1 Hour";i:8;s:7:"2 Hours";i:9;s:6:"1 Hour";i:10;s:6:"1 Hour";}', '90ed838dc015d0366c395b71bd736f65.pdf', 0),
(18, 'Manual Testing_Batch#1', 'a:1:{i:0;s:6:"online";}', 15, 16, 3, 'a:2:{i:0;s:1:"6";i:1;s:1:"7";}', '', 499, 0, 30, 15, 5, '2016-11-28', '2017-01-06', '<p>This course helps people involved in manual testing to enhance their skills and learn how to get better, more accurate results</p>', '<p>The Manual Testing course will combine the fundamental software testing and related program analysis techniques. The course will include concepts of Test generation, Test oracles, Test coverage, Regression, Mutation testing, Program Analysis, etc.</p>', '{"batch_days":["Monday","Tuesday","Wednesday","Thursday","Friday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"8:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"10:00am","day_time_close3":"9:00am","day_time_close4":"10:00am","day_time_close5":"10:30am","day_time_close6":"10:00am","day_time_close7":"11:00am"}', 'a:11:{i:0;s:23:"Fundamentals of Testing";i:1;s:42:"Testing Throughout the Software Life Cycle";i:2;s:17:"Static Techniques";i:3;s:22:"Test Design Techniques";i:4;s:15:"Test Management";i:5;s:19:"Other Testing Types";i:6;s:26:"Quality Center (QC)/HP ALM";i:7;s:4:"JIRA";i:8;s:17:"Agile Methodology";i:9;s:31:"Structured Query Language (SQL)";i:10;s:19:"UNIX/Linux Commands";}', 'a:11:{i:0;s:6:"1 Hour";i:1;s:6:"1 Hour";i:2;s:10:"30 Minutes";i:3;s:7:"2 Hours";i:4;s:6:"1 Hour";i:5;s:6:"1 Hour";i:6;s:7:"2 Hours";i:7;s:6:"1 Hour";i:8;s:6:"1 Hour";i:9;s:10:"30 Minutes";i:10;s:10:"30 Minutes";}', '296be278417c8479edf3d8d1457bbe8f.pdf', 0),
(19, 'QTP_Batch#1', 'a:1:{i:0;s:6:"online";}', 15, 17, 3, 'a:2:{i:0;s:1:"6";i:1;s:1:"7";}', '', 499, 0, 30, 15, 5, '2016-11-28', '2017-01-06', '<p>This course introduces you to one of the most popular automation testing tools QTP.</p>', '<p>HP Quick Test Professional (QTP) is an industry leading Functional &amp; Regression test automation tool for software applications &amp; environments. QTP can perform functional and regression testing through GUI or web interface. It works by identifying the objects in the application under test (AUT) or a web page and performing desired operations. HP Quick Test Professional uses a VBScript scripting language to specify the test procedure and to manipulate the objects and controls of the application under test.</p>\r\n<p>QTP supports test automation frameworks &amp; supports a number of technologies such as, Web, Java, .Net, WPF, SAP, Oracle, Siebel, PeopleSoft, Delphi, Power Builder, Stingray 1, Terminal Emulator, Flex, Web Services, Windows Mobile, Visual Edge, SOAP, Mainframe terminal emulators.</p>', '{"batch_days":["Monday","Tuesday","Wednesday","Thursday","Friday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"8:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"10:00am","day_time_close3":"9:00am","day_time_close4":"10:00am","day_time_close5":"10:30am","day_time_close6":"10:00am","day_time_close7":"11:00am"}', 'a:7:{i:0;s:45:"Introduction to QTP, Creating Your First Test";i:1;s:49:"Object Repository, Functions & Function Libraries";i:2;s:35:"Creating, Running & Analyzing Tests";i:3;s:11:"Checkpoints";i:4;s:22:"Parameterization Tests";i:5;s:17:"Outputting Values";i:6;s:37:"Defining and Using Recovery Scenarios";}', 'a:7:{i:0;s:7:"2 Hours";i:1;s:6:"1 Hour";i:2;s:6:"1 Hour";i:3;s:6:"1 Hour";i:4;s:7:"2 Hours";i:5;s:6:"1 Hour";i:6;s:7:"2 Hours";}', '09a896cc09b4f7220235dd08e591f60d.pdf', 0),
(20, 'Core Java_OC#1', 'a:1:{i:0;s:8:"oncampus";}', 13, 11, 2, 'a:2:{i:0;s:1:"6";i:1;s:1:"7";}', '', 750, 0, 60, 30, 5, '2016-11-28', '2017-01-06', '<p>Complete Core Java is covered in this course. After Completing Core Java Training at Chicago Institute of Technology you will be able to develop any APIs with proper design methodologies.</p>', '<p>Complete Core Java is covered in this course. You will be able to develop desktop applications using swings. This acts as foundation for your development career. Syllabus is designed with the best interest of Industry requirement.</p>', '{"batch_days":["Monday","Tuesday","Wednesday","Thursday","Friday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"8:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"10:00am","day_time_close3":"9:00am","day_time_close4":"10:00am","day_time_close5":"10:30am","day_time_close6":"10:00am","day_time_close7":"11:00am"}', 'a:10:{i:0;s:17:"Java Introduction";i:1;s:6:"Basics";i:2;s:12:"Java Objects";i:3;s:39:"Comparisons and Flow Control Structures";i:4;s:22:"Arrays and Collections";i:5;s:11:"Inheritance";i:6;s:10:"Interfaces";i:7;s:30:"Exception Handling and Logging";i:8;s:24:"Generics and Collections";i:9;s:13:"Inner Classes";}', 'a:10:{i:0;s:7:"2 Hours";i:1;s:7:"2 Hours";i:2;s:7:"2 Hours";i:3;s:7:"2 Hours";i:4;s:7:"2 Hours";i:5;s:7:"2 Hours";i:6;s:7:"2 Hours";i:7;s:7:"2 Hours";i:8;s:7:"2 Hours";i:9;s:7:"2 Hours";}', '466623b399753ce88a0aa7637b1e30f5.pdf', 0),
(21, 'Advanced Java_OC#1', 'a:1:{i:0;s:8:"oncampus";}', 13, 13, 2, 'a:2:{i:0;s:1:"6";i:1;s:1:"7";}', '', 799, 0, 60, 30, 5, '2016-11-28', '2017-01-06', '<p>This course is designed to bring you to industry expectations. After finishing advanced Java Training you will be able to work like a professional in any company. Moreover it will help you to crack any Java Interview. In this training you will get exposure to many APIs which are widely used in industry.</p>', '<p>Advance Java training is intended on developing software using the Java 2 Platform, Standard Edition, or J2SE. It is focused and much concentrated for those with solid experience in structured and object-oriented Java programming, JSP training, including use of the Collections API and exception handling. If you are an experienced Java programmer, able to build, test, and debug complex applications using structured and object- oriented code designs, and familiar with the Collections API and Java exception-handling Advance Java online training is best for you.</p>', '{"batch_days":["Monday","Tuesday","Wednesday","Thursday","Friday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"8:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"10:00am","day_time_close3":"9:00am","day_time_close4":"10:00am","day_time_close5":"10:30am","day_time_close6":"10:00am","day_time_close7":"11:00am"}', 'a:8:{i:0;s:20:"Database Programming";i:1;s:37:"Getting Started with Web Applications";i:2;s:23:"Java Servlet Technology";i:3;s:28:"Java Server Pages Technology";i:4;s:38:"Java Server Pages Standard Tag Library";i:5;s:21:"Enterprise JAVA Beans";i:6;s:28:"JAVA Messaging Service (JMS)";i:7;s:20:"Message-Driven Beans";}', 'a:8:{i:0;s:7:"2 Hours";i:1;s:7:"2 Hours";i:2;s:7:"2 Hours";i:3;s:7:"2 Hours";i:4;s:7:"2 Hours";i:5;s:7:"2 Hours";i:6;s:7:"2 Hours";i:7;s:7:"2 Hours";}', 'ff9362d72de8b6f1c3d8b2dd762c76fe.pdf', 0),
(22, 'Java Frameworks_OC#1', 'a:1:{i:0;s:8:"oncampus";}', 13, 14, 2, 'a:2:{i:0;s:1:"6";i:1;s:1:"7";}', '', 780, 0, 80, 40, 5, '2016-11-28', '2017-01-06', '<p>This course introduces you to Java Frameworks</p>', '<p>This course is intended for students and professionals who have strong knowledge and programming experience in Core and Advanced Java. In this course, you will learn about Java Frameworks such as Spring and Hibernate that drive the backend of a Java application.</p>', '{"batch_days":["Monday","Tuesday","Wednesday","Thursday","Friday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"8:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"10:00am","day_time_close3":"9:00am","day_time_close4":"10:00am","day_time_close5":"10:30am","day_time_close6":"10:00am","day_time_close7":"11:00am"}', 'a:2:{i:0;s:16:"Spring Framework";i:1;s:9:"Hibernate";}', 'a:2:{i:0;s:7:"5 Weeks";i:1;s:7:"3 Weeks";}', '57c14df3ae3fb57e8da0c545e4dad522.pdf', 0),
(29, 'Java Frameworks_OCI-1', 'a:1:{i:0;s:8:"oncampus";}', 13, 14, 2, 'a:1:{i:0;s:1:"4";}', '', 262, 17900, 80, 40, 0, '2016-12-05', '2017-01-28', '<p>This course introduces you to Java Frameworks</p>', '<p>This course is intended for students and professionals who have strong knowledge and programming experience in Core and Advanced Java. In this course, you will learn about Java Frameworks such as Spring and Hibernate that drive the backend of a Java application.</p>', '{"batch_days":["Monday","Tuesday","Thursday","Friday","Saturday"],"day_time_open1":"9:00am","day_time_open2":"11:00am","day_time_open3":"11:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"4:00pm","day_time_close1":"9:00am","day_time_close2":"1:00pm","day_time_close3":"1:00pm","day_time_close4":"9:00am","day_time_close5":"11:00am","day_time_close6":"11:00am","day_time_close7":"6:00pm"}', 'a:2:{i:0;s:16:"Spring Framework";i:1;s:9:"Hibernate";}', 'a:2:{i:0;s:7:"5 Weeks";i:1;s:7:"3 Weeks";}', '4dca5172c11a80a72a8e5ec9b2555ff6.pdf', 0),
(30, 'Advanced Java_OCI-1', 'a:1:{i:0;s:8:"oncampus";}', 13, 13, 2, 'a:1:{i:0;s:1:"4";}', '', 264, 18000, 60, 30, 0, '2016-12-05', '2017-01-27', '<p>This course is designed to bring you to industry expectations. After finishing advanced Java Training you will be able to work like a professional in any company. Moreover it will help you to crack any Java Interview. In this training you will get exposure to many APIs which are widely used in industry.</p>', '<p>Advance Java training is intended on developing software using the Java 2 Platform, Standard Edition, or J2SE. It is focused and much concentrated for those with solid experience in structured and object-oriented Java programming, JSP training, including use of the Collections API and exception handling. If you are an experienced Java programmer, able to build, test, and debug complex applications using structured and object- oriented code designs, and familiar with the Collections API and Java exception-handling Advance Java online training is best for you.</p>', '{"batch_days":["Sunday","Monday","Tuesday","Wednesday","Friday","Saturday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"9:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"9:00am","day_time_close3":"9:00am","day_time_close4":"9:00am","day_time_close5":"9:00am","day_time_close6":"9:00am","day_time_close7":"9:00am"}', 'a:8:{i:0;s:20:"Database Programming";i:1;s:37:"Getting Started with Web Applications";i:2;s:23:"Java Servlet Technology";i:3;s:28:"Java Server Pages Technology";i:4;s:38:"Java Server Pages Standard Tag Library";i:5;s:21:"Enterprise JAVA Beans";i:6;s:28:"JAVA Messaging Service (JMS)";i:7;s:20:"Message-Driven Beans";}', 'a:8:{i:0;s:6:"1 Hour";i:1;s:7:"2 Hours";i:2;s:7:"2 Hours";i:3;s:7:"2 Hours";i:4;s:7:"2 Hours";i:5;s:7:"2 Hours";i:6;s:7:"2 Hours";i:7;s:7:"2 Hours";}', '56c62e7ab7931c5159ccd1f900ae9a96.pdf', 0),
(31, 'Core Java_OCI-1', 'a:1:{i:0;s:8:"oncampus";}', 13, 11, 2, 'a:1:{i:0;s:1:"4";}', '', 261, 17800, 60, 30, 0, '2016-12-05', '2017-01-28', '<p>Complete Core Java is covered in this course. After Completing Core Java Training at Chicago Institute of Technology you will be able to develop any APIs with proper design methodologies.</p>', '<p>Complete Core Java is covered in this course. You will be able to develop desktop applications using swings. This acts as foundation for your development career. Syllabus is designed with the best interest of Industry requirement.</p>', '{"batch_days":["Monday","Tuesday","Wednesday","Thursday","Friday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"9:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"9:00am","day_time_close3":"9:00am","day_time_close4":"9:00am","day_time_close5":"9:00am","day_time_close6":"9:00am","day_time_close7":"9:00am"}', 'a:10:{i:0;s:17:"Java Introduction";i:1;s:6:"Basics";i:2;s:12:"Java Objects";i:3;s:39:"Comparisons And Flow Control Structures";i:4;s:22:"Arrays and Collections";i:5;s:11:"Inheritance";i:6;s:10:"Interfaces";i:7;s:30:"Exception Handling and Logging";i:8;s:24:"Generics and Collections";i:9;s:13:"Inner Classes";}', 'a:10:{i:0;s:6:"1 Hour";i:1;s:7:"2 Hours";i:2;s:7:"2 Hours";i:3;s:7:"4 Hours";i:4;s:7:"4 Hours";i:5;s:7:"2 Hours";i:6;s:7:"2 Hours";i:7;s:7:"2 Hours";i:8;s:7:"2 Hours";i:9;s:7:"2 Hours";}', 'b0229f4c20cc536e811953e97548f4d6.pdf', 0),
(32, 'Core Java_Ind-1', 'a:1:{i:0;s:6:"online";}', 13, 11, 2, 'a:1:{i:0;s:1:"4";}', '', 176, 12000, 60, 30, 0, '2016-12-05', '2017-01-28', '<p>Complete Core Java is covered in this course. After Completing Core Java Training at Chicago Institute of Technology you will be able to develop any APIs with proper design methodologies.</p>', '<p>Complete Core Java is covered in this course. You will be able to develop desktop applications using swings. This acts as foundation for your development career. Syllabus is designed with the best interest of Industry requirement.</p>', '{"batch_days":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"9:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"9:00am","day_time_close3":"9:00am","day_time_close4":"9:00am","day_time_close5":"9:00am","day_time_close6":"9:00am","day_time_close7":"9:00am"}', 'a:10:{i:0;s:17:"Java Introduction";i:1;s:6:"Basics";i:2;s:12:"Java Objects";i:3;s:39:"Comparisons And Flow Control Structures";i:4;s:22:"Arrays and Collections";i:5;s:11:"Inheritance";i:6;s:10:"Interfaces";i:7;s:30:"Exception Handling and Logging";i:8;s:24:"Generics and Collections";i:9;s:13:"Inner Classes";}', 'a:10:{i:0;s:6:"1 Hour";i:1;s:7:"2 Hours";i:2;s:7:"2 Hours";i:3;s:7:"2 Hours";i:4;s:7:"2 Hours";i:5;s:7:"2 Hours";i:6;s:7:"2 Hours";i:7;s:7:"2 Hours";i:8;s:7:"2 Hours";i:9;s:7:"2 Hours";}', 'be090ea165614bb26a543c59990dfe4f.pdf', 0),
(33, 'Advanced Java_Ind-1', 'a:1:{i:0;s:6:"online";}', 13, 13, 2, 'a:1:{i:0;s:1:"4";}', '', 205, 14000, 60, 30, 0, '2016-12-05', '2017-01-23', '<p>This course is designed to bring you to industry expectations. After finishing advanced Java Training you will be able to work like a professional in any company. Moreover it will help you to crack any Java Interview. In this training you will get exposure to many APIs which are widely used in industry.</p>', '<p>Advance Java training is intended on developing software using the Java 2 Platform, Standard Edition, or J2SE. It is focused and much concentrated for those with solid experience in structured and object-oriented Java programming, JSP training, including use of the Collections API and exception handling. If you are an experienced Java programmer, able to build, test, and debug complex applications using structured and object- oriented code designs, and familiar with the Collections API and Java exception-handling Advance Java online training is best for you.</p>', '{"batch_days":["Monday","Tuesday","Wednesday","Thursday","Friday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"9:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"9:00am","day_time_close3":"9:00am","day_time_close4":"9:00am","day_time_close5":"9:00am","day_time_close6":"9:00am","day_time_close7":"9:00am"}', 'a:8:{i:0;s:20:"Database Programming";i:1;s:37:"Getting Started with Web Applications";i:2;s:23:"Java Servlet Technology";i:3;s:28:"Java Server Pages Technology";i:4;s:38:"Java Server Pages Standard Tag Library";i:5;s:21:"Enterprise JAVA Beans";i:6;s:28:"JAVA Messaging Service (JMS)";i:7;s:20:"Message-Driven Beans";}', 'a:8:{i:0;s:6:"1 Hour";i:1;s:7:"2 Hours";i:2;s:7:"4 Hours";i:3;s:7:"4 Hours";i:4;s:7:"2 Hours";i:5;s:7:"4 Hours";i:6;s:7:"4 Hours";i:7;s:7:"2 Hours";}', '023c081e4212a8443fb046a63743f597.pdf', 0),
(34, 'Java Frameworks_Ind-1', 'a:1:{i:0;s:6:"online";}', 13, 14, 2, 'a:1:{i:0;s:1:"4";}', '', 183, 12500, 80, 40, 0, '2016-12-06', '2017-01-31', '<p>This course introduces you to Java Frameworks</p>', '<p>This course is intended for students and professionals who have strong knowledge and programming experience in Core and Advanced Java. In this course, you will learn about Java Frameworks such as Spring and Hibernate that drive the backend of a Java application.</p>', '{"batch_days":["Sunday","Tuesday","Wednesday","Thursday","Saturday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"9:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"9:00am","day_time_close3":"9:00am","day_time_close4":"9:00am","day_time_close5":"9:00am","day_time_close6":"9:00am","day_time_close7":"9:00am"}', 'a:2:{i:0;s:16:"Spring Framework";i:1;s:9:"Hibernate";}', 'a:2:{i:0;s:7:"5 Weeks";i:1;s:7:"3 Weeks";}', '3fc073ab42b7ea4aa0fa5fa0bb41346b.pdf', 0),
(35, 'Manual Testing_Ind-1', 'a:1:{i:0;s:6:"online";}', 15, 16, 3, 'a:1:{i:0;s:1:"4";}', '', 147, 10000, 30, 15, 0, '2016-12-12', '2017-01-06', '<p>This course helps people involved in manual testing to enhance their skills and learn how to get better, more accurate results.</p>', '<p>The Manual Testing course will combine the fundamental software testing and related program analysis techniques. The course will include concepts of Test generation, Test oracles, Test coverage, Regression, Mutation testing, Program Analysis, etc.</p>', '{"batch_days":["Monday","Tuesday","Thursday","Saturday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"9:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"9:00am","day_time_close3":"9:00am","day_time_close4":"9:00am","day_time_close5":"9:00am","day_time_close6":"9:00am","day_time_close7":"9:00am"}', 'a:10:{i:0;s:23:"Fundamentals of Testing";i:1;s:42:"Testing Throughout the Software Life Cycle";i:2;s:17:"Static Techniques";i:3;s:22:"Test Design Techniques";i:4;s:15:"Test Management";i:5;s:19:"Other Testing Types";i:6;s:26:"Quality Center (QC)/HP ALM";i:7;s:4:"JIRA";i:8;s:17:"Agile Methodology";i:9;s:31:"Structured Query Language (SQL)";}', 'a:10:{i:0;s:6:"1 Hour";i:1;s:6:"1 Hour";i:2;s:6:"1 Hour";i:3;s:6:"1 Hour";i:4;s:6:"1 Hour";i:5;s:10:"30 Minutes";i:6;s:7:"3 Hours";i:7;s:6:"1 Hour";i:8;s:10:"30 Minutes";i:9;s:10:"30 Minutes";}', '8611746c8df0387423de84a32310cba6.pdf', 0),
(36, 'QTP_Ind-1', 'a:1:{i:0;s:6:"online";}', 15, 17, 3, 'a:1:{i:0;s:1:"4";}', '', 183, 12500, 30, 15, 0, '2016-12-04', '2017-01-12', '<p>HP Quick Test Professional (QTP) is an industry leading Functional &amp; Regression test automation tool for software applications &amp; environments.</p>', '<p>QTP can perform functional and regression testing through GUI or web interface. It works by identifying the objects in the application under test (AUT) or a web page and performing desired operations. HP Quick Test Professional uses a VBScript scripting language to specify the test procedure and to manipulate the objects and controls of the application under test.</p>', '{"batch_days":["Sunday","Monday","Tuesday","Wednesday","Thursday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"9:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"9:00am","day_time_close3":"9:00am","day_time_close4":"9:00am","day_time_close5":"9:00am","day_time_close6":"9:00am","day_time_close7":"9:00am"}', 'a:7:{i:0;s:45:"Introduction to QTP, Creating Your First Test";i:1;s:49:"Object Repository, Functions & Function Libraries";i:2;s:35:"Creating, Running & Analyzing Tests";i:3;s:11:"Checkpoints";i:4;s:22:"Parameterization Tests";i:5;s:17:"Outputting Values";i:6;s:37:"Defining and Using Recovery Scenarios";}', 'a:7:{i:0;s:6:"1 Hour";i:1;s:6:"1 Hour";i:2;s:6:"1 Hour";i:3;s:6:"1 Hour";i:4;s:6:"1 Hour";i:5;s:6:"1 Hour";i:6;s:6:"1 Hour";}', 'e5eb1ccbe1ed7ab1426b2fdd999ad54a.pdf', 0),
(37, 'Selenium Testing_Ind-1', 'a:1:{i:0;s:6:"online";}', 13, 15, 3, 'a:1:{i:0;s:1:"4";}', '', 188, 12800, 40, 20, 0, '2016-12-06', '2017-01-20', '<p>This course will help individuals to meet the growing demands in the market of selenium testing.</p>', '<p>Selenium is a portable software testing framework for web applications. Selenium provides a record/playback tool for authoring tests without learning a test scripting language (Selenium IDE). It also provides a test domain-specific language (Selenese) to write tests in a number of popular programming languages, including Java, C#, Groovy, Perl, PHP, Python and Ruby. The tests can then be run against most modern web browsers. Selenium deploys on Windows, Linux, and Macintosh platforms.</p>', '{"batch_days":["Tuesday","Wednesday","Thursday","Friday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"9:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"9:00am","day_time_close3":"9:00am","day_time_close4":"9:00am","day_time_close5":"9:00am","day_time_close6":"9:00am","day_time_close7":"9:00am"}', 'a:10:{i:0;s:12:"Introduction";i:1;s:30:"Different Flavours in Selenium";i:2;s:12:"Selenium IDE";i:3;s:32:"Locators & Object Identification";i:4;s:15:"Junit Framework";i:5;s:16:"TestNG Framework";i:6;s:19:"Selenium WEB-DRIVER";i:7;s:30:"Working with Multiple Browsers";i:8;s:41:"Build Configuration Tool – Apache Maven";i:9;s:31:"Version Controlling Tool GITHUB";}', 'a:10:{i:0;s:6:"1 Hour";i:1;s:6:"1 Hour";i:2;s:6:"1 Hour";i:3;s:6:"1 Hour";i:4;s:6:"1 Hour";i:5;s:6:"1 Hour";i:6;s:6:"1 Hour";i:7;s:6:"1 Hour";i:8;s:10:"30 Minutes";i:9;s:10:"30 Minutes";}', 'ea8f41cbb1516c3af5c2fc3d9930ba21.pdf', 0),
(38, 'Test-1', 'a:1:{i:0;s:6:"online";}', 13, 24, 13, 'a:2:{i:0;s:1:"6";i:1;s:1:"7";}', '', 25, 0, 20, 0, 0, '2016-12-29', '2016-12-30', '<p>TEST</p>\r\n<p>TEST</p>\r\n<p>TEST</p>', '<p>TEST</p>\r\n<p>TEST</p>\r\n<p>TEST</p>\r\n<p>&nbsp;</p>', '{"batch_days":["Monday","Tuesday","Wednesday","Thursday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"9:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"9:00am","day_time_close2":"11:35am","day_time_close3":"11:10am","day_time_close4":"11:55am","day_time_close5":"11:45am","day_time_close6":"9:00am","day_time_close7":"9:00am"}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', '', 0),
(39, 'Test-1_Ind', 'a:1:{i:0;s:6:"online";}', 13, 24, 13, 'a:1:{i:0;s:1:"4";}', '', 15, 500, 20, 0, 0, '2016-12-30', '2016-12-31', '<p>TEST</p>\r\n<p>TEST</p>\r\n<p>&nbsp;</p>\r\n<p>TEST TEST TEST TEST TEST</p>\r\n<p>&nbsp;</p>\r\n<p>TEST TEST TEST TEST TEST</p>\r\n<p>&nbsp;</p>\r\n<p>TEST TEST TEST TEST TEST</p>\r\n<p>&nbsp;</p>', '<p>TEST</p>\r\n<p>TEST</p>\r\n<p>TEST</p>', '{"batch_days":["Sunday","Monday"],"day_time_open1":"9:00am","day_time_open2":"9:00am","day_time_open3":"9:00am","day_time_open4":"9:00am","day_time_open5":"9:00am","day_time_open6":"9:00am","day_time_open7":"9:00am","day_time_close1":"10:45am","day_time_close2":"11:00am","day_time_close3":"9:00am","day_time_close4":"9:00am","day_time_close5":"9:00am","day_time_close6":"9:00am","day_time_close7":"9:00am"}', 'a:1:{i:0;s:0:"";}', 'a:1:{i:0;s:0:"";}', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE IF NOT EXISTS `course_categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(240) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`cat_id`, `cat_name`) VALUES
(2, 'Web Application Development'),
(3, 'Software Testing'),
(4, 'Digital Marketing'),
(8, 'Quality Management'),
(10, 'Programming'),
(13, 'Test'),
(14, 'Software QA');

-- --------------------------------------------------------

--
-- Table structure for table `course_contact`
--

CREATE TABLE IF NOT EXISTS `course_contact` (
  `cc_id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(120) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `course_name` varchar(32) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`cc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `course_contact`
--

INSERT INTO `course_contact` (`cc_id`, `name`, `email`, `mobile`, `course_name`, `message`) VALUES
(6, 'srinug', 'srinivas@thecolourmoon.com', '1234567890', 'Business Courses', 'testing from dev'),
(7, 'srinu', 'srinivas@thecolourmoon.com', '1234567890', 'Technology Courses', 'testing'),
(8, 'subbu', 'thecolourmoon@gmail.com', '9885281291', 'Business Courses', 'More Details sdsddsdsds'),
(9, 'TEST2', 'test2@test2.com', '123456789', 'Network Courses', 'TEST2_Nov23'),
(10, 'Shubham Suresh chavan', 'Chavanshubham918@gmail.com', '8155960122', 'Manual Testing', 'I would like to learn advance automobile corse'),
(11, 'Shubham Suresh chavan', 'Chavanshubham918@gmail.com', '8155960122', 'Manual Testing', 'I would like to learn advance automobile corse');

-- --------------------------------------------------------

--
-- Table structure for table `course_inquiry_form`
--

CREATE TABLE IF NOT EXISTS `course_inquiry_form` (
  `cd_id` int(11) NOT NULL AUTO_INCREMENT,
  `cd_name` varchar(32) NOT NULL,
  `cd_email` varchar(124) NOT NULL,
  `cd_phone` varchar(16) NOT NULL,
  `cd_des` text NOT NULL,
  PRIMARY KEY (`cd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `course_inquiry_form`
--

INSERT INTO `course_inquiry_form` (`cd_id`, `cd_name`, `cd_email`, `cd_phone`, `cd_des`) VALUES
(3, 'srinug', 'srinivas@thecolourmoon.com', '1234567890', 'testing message'),
(4, 'digitek', 'digitek@123.com', '1548898532', 'test test test'),
(5, 'Rina', 'rinapatel2@gmail.com', '6308547252', 'We can get any Placement after we complete this course?'),
(6, 'akash', 'akash@digitekitinc.com', '2245428968', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `course_orders`
--

CREATE TABLE IF NOT EXISTS `course_orders` (
  `co_id` int(11) NOT NULL AUTO_INCREMENT,
  `std_user_id` int(11) NOT NULL,
  `co_course` int(8) NOT NULL,
  `co_course_id` int(11) NOT NULL,
  `co_trans_id` int(11) NOT NULL,
  `co_order_id` int(11) NOT NULL,
  `co_amount` double(8,1) NOT NULL,
  `co_name` varchar(64) NOT NULL,
  `co_email` varchar(160) NOT NULL,
  `co_mobile` varchar(16) NOT NULL,
  `co_date_time` datetime NOT NULL,
  `co_payment_status` varchar(32) NOT NULL,
  `co_exp_date` varchar(32) NOT NULL,
  `co_payvia` enum('online','manual') NOT NULL,
  `co_coursetype` enum('oncampus','online') NOT NULL,
  `co_country` int(8) NOT NULL,
  `co_coursestatus` enum('registered','ongoing','completed','cancelled') NOT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `course_orders`
--

INSERT INTO `course_orders` (`co_id`, `std_user_id`, `co_course`, `co_course_id`, `co_trans_id`, `co_order_id`, `co_amount`, `co_name`, `co_email`, `co_mobile`, `co_date_time`, `co_payment_status`, `co_exp_date`, `co_payvia`, `co_coursetype`, `co_country`, `co_coursestatus`) VALUES
(40, 37, 11, 14, 0, 0, 599.0, '', '', '', '0000-00-00 00:00:00', 'success', '1483660800', 'manual', 'online', 6, 'registered'),
(43, 17, 0, 32, 0, 2147483647, 0.0, '', '', '', '2016-12-02 10:27:04', 'pending', '', 'online', 'oncampus', 0, 'registered'),
(44, 17, 0, 32, 0, 2147483647, 0.0, '', '', '', '2016-12-04 05:44:47', 'pending', '', 'online', 'oncampus', 0, 'registered'),
(45, 17, 0, 14, 0, 2147483647, 0.0, '', '', '', '2016-12-04 05:56:40', 'pending', '', 'online', 'oncampus', 0, 'registered'),
(46, 17, 0, 20, 0, 1318949816, 0.0, '', '', '', '2016-12-09 12:55:27', 'pending', '', 'online', 'oncampus', 0, 'registered'),
(47, 17, 0, 16, 0, 2147483647, 0.0, '', '', '', '2016-12-28 06:27:34', 'pending', '', 'online', 'oncampus', 0, 'registered'),
(48, 51, 0, 38, 0, 2147483647, 0.0, '', '', '', '2016-12-29 04:17:43', 'pending', '', 'online', 'oncampus', 0, 'registered'),
(49, 51, 0, 39, 0, 2147483647, 0.0, '', '', '', '2016-12-29 04:21:18', 'pending', '', 'online', 'oncampus', 0, 'registered'),
(50, 17, 24, 39, 0, 0, 15.0, '', '', '', '0000-00-00 00:00:00', 'success', '1483142400', 'manual', 'online', 4, 'registered'),
(51, 1, 0, 32, 0, 2147483647, 0.0, '', '', '', '2016-12-30 12:53:08', 'pending', '', 'online', 'oncampus', 0, 'registered'),
(52, 52, 0, 32, 0, 2147483647, 0.0, '', '', '', '2017-01-12 03:52:59', 'pending', '', 'online', 'oncampus', 0, 'registered'),
(53, 52, 0, 32, 0, 2147483647, 0.0, '', '', '', '2017-01-12 03:53:23', 'pending', '', 'online', 'oncampus', 0, 'registered'),
(54, 52, 0, 32, 0, 2147483647, 0.0, '', '', '', '2017-01-12 03:54:59', 'pending', '', 'online', 'oncampus', 0, 'registered'),
(55, 52, 24, 39, 1484232911, 0, 15.0, '', '', '', '2017-01-12 08:55:11', 'success', '1483164000', 'manual', 'online', 4, 'registered'),
(56, 51, 24, 38, 1484319925, 0, 25.0, '', '', '', '2017-01-13 09:05:25', 'success', '1483077600', 'manual', 'online', 6, 'registered'),
(57, 53, 24, 39, 1484672271, 0, 15.0, '', '', '', '2017-01-17 10:57:51', 'success', '1483164000', 'manual', 'online', 4, 'registered'),
(58, 53, 0, 39, 0, 2147483647, 0.0, '', '', '', '2017-02-07 09:38:32', 'pending', '', 'online', 'oncampus', 0, 'registered'),
(59, 17, 0, 39, 0, 2147483647, 0.0, '', '', '', '2017-04-12 09:54:30', 'pending', '', 'online', 'oncampus', 0, 'registered'),
(60, 63, 24, 39, 1492009125, 0, 15.0, '', '', '', '2017-04-12 09:58:45', 'success', '1483164000', 'manual', 'online', 4, 'registered'),
(61, 17, 0, 34, 0, 2147483647, 0.0, '', '', '', '2017-10-12 01:41:47', 'pending', '', 'online', 'oncampus', 0, 'registered');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `ex_id` int(11) NOT NULL AUTO_INCREMENT,
  `ex_qz_id` int(11) NOT NULL,
  `ex_user_id` int(11) NOT NULL,
  `ex_course_id` int(11) NOT NULL,
  `ex_batch_id` int(11) NOT NULL,
  `ex_file` varchar(120) NOT NULL,
  `ex_status` varchar(16) NOT NULL,
  `ex_marks` varchar(8) NOT NULL,
  `ex_date` date NOT NULL,
  PRIMARY KEY (`ex_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`ex_id`, `ex_qz_id`, `ex_user_id`, `ex_course_id`, `ex_batch_id`, `ex_file`, `ex_status`, `ex_marks`, `ex_date`) VALUES
(3, 4, 1, 6, 1, '024a8d68ea4d00aa2c2b0a123a01b02d.docx', 'Write again', '60/100', '2016-11-16'),
(4, 7, 17, 24, 39, 'f6de40153cb7130e6afa9a1c7d745c9b.docx', 'exam written', '', '2017-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(240) NOT NULL,
  `faculty_image` varchar(64) NOT NULL,
  `faculty_des` text NOT NULL,
  `designation` varchar(32) NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `title`, `faculty_image`, `faculty_des`, `designation`) VALUES
(1, 'Danny Awesome', '8e8c8a74be3f625ffbc0c726f7fdb8cf.jpg', '<p>This is Photoshop''s version of Lorem Ipsum. Proin gravida nibh </p>', 'Manager'),
(2, 'Kimberly Richiez', 'd2c876c714f09ab40e6baf4d3ffe60e5.jpg', '<p>This is Photoshop''s version of Lorem Ipsum. Proin gravida nibh...</p>', 'Russian Teacher'),
(3, 'Dylan Taylor', '8fb53f71c2e61ef5ad357fc978cda4cb.jpg', '<p>This is Photoshop''s version of Lorem Ipsum. Proin gravida nibh...</p>', 'English Teacher'),
(4, 'Simon Grishabe', 'bdc4d4323ca23e3a7cb6c2d67849941a.jpg', '<p>This is Photoshop''s version of Lorem Ipsum. Proin gravida nibh..</p>', 'Health Teacher'),
(5, 'Simon Grishabe', '2a954e45c59bcd5dd7d0bff0a10e3a59.jpg', '<p>This is Photoshop''s version of Lorem Ipsum. Proin gravida nibh..</p>', 'Health Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_name` varchar(240) NOT NULL,
  `faq_des` text NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faq_id`, `faq_name`, `faq_des`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `homecategory`
--

CREATE TABLE IF NOT EXISTS `homecategory` (
  `hc_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(240) NOT NULL,
  `cat_des` text NOT NULL,
  `cat_fa` varchar(32) NOT NULL,
  PRIMARY KEY (`hc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `homecategory`
--

INSERT INTO `homecategory` (`hc_id`, `name`, `cat_des`, `cat_fa`) VALUES
(1, 'BUSINESS COURSES1', '<p>Business Trends changing with latest courses are available with us.<strong>doo1</strong></p>', 'icon-statistics'),
(2, 'Technology Courses', '<p>Latest technologies online courses are available with new courses.</p>', 'fa fa-desktop'),
(3, 'Creative Courses', '<p>Latest technologies online courses are available with new courses.</p>', 'fa fa-lightbulb-o'),
(4, 'online marketing Courses', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>', 'fa fa-bullhorn'),
(5, 'NETWORK Courses', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', 'fa fa-cogs'),
(6, 'FAST TRACK Courses', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>', 'fa fa-line-chart');

-- --------------------------------------------------------

--
-- Table structure for table `homecourse`
--

CREATE TABLE IF NOT EXISTS `homecourse` (
  `homecourse_id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(240) NOT NULL,
  `tname` varchar(240) NOT NULL,
  `cdate` varchar(32) NOT NULL,
  `des` varchar(240) NOT NULL,
  `clink` varchar(240) NOT NULL,
  `h_image` varchar(120) NOT NULL,
  `cdisplay` varchar(8) NOT NULL,
  `bg_image` varchar(36) NOT NULL,
  PRIMARY KEY (`homecourse_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `homecourse`
--

INSERT INTO `homecourse` (`homecourse_id`, `title`, `tname`, `cdate`, `des`, `clink`, `h_image`, `cdisplay`, `bg_image`) VALUES
(1, 'Java Devlopment', '', '02/20/2017', 'It’s limited Seating! Hurry up', 'http://chicagoinstituteoftechnology.com/courses/details/24', 'c34ee4d31ca13525cd919e3b54a34afd.png', 'yes', 'cfa7946fa5619165fd2188ed43e74d60.jpg'),
(2, 'Web Design for Startups', 'subbu', '12/05/2016', 'It’s limited Seating! Hurry up', 'http://chicagoinstituteoftechnology.com/courses/details/24', 'c34ee4d31ca13525cd919e3b54a34afd.png', 'no', 'cfa7946fa5619165fd2188ed43e74d60.jpg'),
(3, 'Software Engineering', 'Rammy', '12/05/2016', 'It’s limited Seating! Hurry up', 'http://chicagoinstituteoftechnology.com/courses/details/24', 'c34ee4d31ca13525cd919e3b54a34afd.png', 'no', 'cfa7946fa5619165fd2188ed43e74d60.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `homefollow`
--

CREATE TABLE IF NOT EXISTS `homefollow` (
  `homefollow_id` int(4) NOT NULL AUTO_INCREMENT,
  `title1` varchar(64) NOT NULL,
  `ff_count` varchar(32) NOT NULL,
  `title2` varchar(64) NOT NULL,
  `cc_count` varchar(32) NOT NULL,
  `title3` varchar(64) NOT NULL,
  `se_count` varchar(32) NOT NULL,
  `title4` varchar(64) NOT NULL,
  `ct_count` varchar(32) NOT NULL,
  PRIMARY KEY (`homefollow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `homefollow`
--

INSERT INTO `homefollow` (`homefollow_id`, `title1`, `ff_count`, `title2`, `cc_count`, `title3`, `se_count`, `title4`, `ct_count`) VALUES
(1, 'FOREIGN FOLLOWERS', '2500', 'CLASSES COMPLETE', '100', 'STUDENTS ENROLLED', '5000', 'CERTIFIED TEACHERS', '25');

-- --------------------------------------------------------

--
-- Table structure for table `homeimage`
--

CREATE TABLE IF NOT EXISTS `homeimage` (
  `homeimage_id` int(1) NOT NULL,
  `title` varchar(240) NOT NULL,
  `homeimage_des` text NOT NULL,
  `homeimage_image` varchar(64) NOT NULL,
  `meta_title` varchar(240) NOT NULL,
  `meta_des` text NOT NULL,
  PRIMARY KEY (`homeimage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homeimage`
--

INSERT INTO `homeimage` (`homeimage_id`, `title`, `homeimage_des`, `homeimage_image`, `meta_title`, `meta_des`) VALUES
(1, 'Welcome to  Chicago <br>Institute of technology', '<p>Chicago Institute of Technology offers a broad range of online courses in a variety of fields that are taught by industry experts and experienced professionals. If you have a passion to gain practical knowledge about a specific segment of a field or want to develop a talent to complement your skill set, you can learn it from some of the brightest minds gathered under one roof at Chicago Institute of Technology. We provide high-level education and training in Big Data and Analytics, Digital Marketing, IT Service and Architecture, Agile and Scrum Certification, Quality Management, and Finance Management.</p>\r\n<p>At Chicago Institute of Technology, we don&rsquo;t only focus on learning; our courses are designed in a way to ensure that our students are able to practically apply their knowledge. You can leverage from our continuously growing list of online courses and freely available reading material on a vast range of topics. We have a highly organized system through which students can manage their courses and related activities from anywhere, and interact with their tutors and other students.</p>\r\n<p>Our online learning programs are aimed at providing you with resources to develop a wide range of social and technical skills that make you essential for your organization. We have an outstanding IT infrastructure and the contents of each course are continuously modified based on trending industry requirements. You get the benefit of learning from thought leaders and get the opportunity to meet inspiring colleagues from different regions of the world.</p>\r\n<p>When you register to Chicago Institute of Technology, you will see that each online course can be customized to fit your individual needs. We offer flexible weekly schedules that you can adjust as per your free time. You also get the opportunity to engage in discussions with tutors and other students in a seamless virtual learning environment.</p>\r\n<p>Browse through our online portal and find the courses that can enhance your skill set and help you grow both professionally and personally<strong>.</strong></p>', '', 'Home | Chicago Institute of technology', 'Chicago Institute of Technology offers a wide range of online courses in advanced level learning to people interested in expanding their skill set.');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` text NOT NULL,
  `caption` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file`, `caption`, `description`) VALUES
(10, 'uploads/home-gallery11.jpg', 'LOREM IPSUM PROIN', 'Convocation....'),
(11, 'uploads/home-gallery2.jpg', 'LOREM IPSUM PROIN', 'Convocation'),
(12, 'uploads/home-gallery3.jpg', 'LOREM IPSUM PROIN', 'Convocation'),
(14, 'uploads/home-gallery4.jpg', 'LOREM IPSUM PROIN', 'Convocation'),
(15, 'uploads/home-gallery5.jpg', 'LOREM IPSUM PROIN', 'Convocation'),
(16, 'uploads/home-gallery6.jpg', 'LOREM IPSUM PROIN', 'Convocation'),
(17, 'uploads/home-gallery7.jpg', 'LOREM IPSUM PROIN', 'Convocation'),
(18, 'uploads/home-gallery32.jpg', 'LOREM IPSUM PROIN', 'Convocation');

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE IF NOT EXISTS `internship` (
  `internship_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(240) NOT NULL,
  `internship_image` varchar(100) NOT NULL,
  `internship_des` text NOT NULL,
  `meta_title` varchar(240) NOT NULL,
  `meta_des` text NOT NULL,
  `title1` varchar(260) NOT NULL,
  `title2` varchar(260) NOT NULL,
  PRIMARY KEY (`internship_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`internship_id`, `title`, `internship_image`, `internship_des`, `meta_title`, `meta_des`, `title1`, `title2`) VALUES
(1, 'INTERNSHIP', '26b8ffa684ba1edcb1442f6e43705a72.jpg', '<p>At Chicago Institute of Technology, we have special summer projects and internships for students who want to equip themselves with basic and advanced knowledge and skills. These programs are specially designed while keeping college students and people between jobs in mind. When you opt for one of our internships in a specific field, we offer several courses that have a relatively shorter duration than most of our online training programs. This allows our students to make good use of the time they have until their summer break is over or they find a new job in their respective field.</p>\r\n<p>Since our tutors impart practical knowledge through structured learning, our students stand out in terms of knowledge and superior talent. They are able to outshine their competition and get recommended for higher positions. The courses included in our internship program are tailored according to the academic background of the students and their understanding of the subject matter. Our tutors strive to make learning as easy and interesting as possible to ensure that the students are able to firmly grasp all the concepts.</p>\r\n<p>Most of the internship programs are completed within 10-12 weeks. However, if you have less time on your hands, you shouldn''t worry as we have flexible schedules that make it easy to manage studies and job at the same time. Our course curriculum is updated with the most recent developments to ensure that our students are equipped with the most in-demand skill set.</p>\r\n<p>If you want to make the most of your free time, you should consider doing an internship at Chicago Institute of Technology. For more information about our internship program, contact us today.</p>', 'Internship | Chicago Institute of Technology', 'Chicago Institute of Technology offers special internship programs for students who want to take short courses to develop new skills.', 'For more information about our internship program', 'Contact us today to get more information.');

-- --------------------------------------------------------

--
-- Table structure for table `live_projects`
--

CREATE TABLE IF NOT EXISTS `live_projects` (
  `live_projects_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(240) NOT NULL,
  `live_project_image` varchar(240) NOT NULL,
  `live_project_des` text NOT NULL,
  `meta_title` varchar(240) NOT NULL,
  `meta_des` text NOT NULL,
  `title1` varchar(260) NOT NULL,
  `title2` varchar(260) NOT NULL,
  PRIMARY KEY (`live_projects_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `live_projects`
--

INSERT INTO `live_projects` (`live_projects_id`, `title`, `live_project_image`, `live_project_des`, `meta_title`, `meta_des`, `title1`, `title2`) VALUES
(1, 'LIVE PROJECTS', '84d7ec204df59477496c13c1863542a8.jpg', '<p>At Chicago Institute of Technology, we offer our students a great opportunity to apply their knowledge and gain hands-on experience in their relative field. Live projects allow you to work with industry experts in ongoing projects, and gain insights on how things actually work. By doing so, you are able to get first-hand experience in practically applying your newly acquired skill set and knowledge to get a better understanding of the coursework.</p>\r\n<p>We offer a broad range of online courses in a variety of fields, including in Big Data and Analytics, Digital Marketing, IT Service and Architecture, Agile and Scrum Certification, Quality Management, and Finance Management. After you complete a training course, you are given an opportunity to work side by side with professionals in a respective live project that allows you to implement what you have learned in a highly organized manner.</p>\r\n<p>At Chicago Institute of Technology, we make sure that our students are ready for the industry. We allow them to work with us for several hours per week in their free time on a specific platform. The only requirement is to have relevant skill set and background knowledge of the live project. Job responsibilities and project details are determined based on your capability.</p>', 'Live Projects | Chicago Institute of Technology', 'Chicago Institute of Technology offers aspiring individuals a great opportunity to participate in live projects for practical learning and experience.', 'If you are interested in taking part in our live projects', 'Contact us today to get more information.');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_addres` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `pass_word` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `first_name`, `last_name`, `email_addres`, `user_name`, `pass_word`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '25a41cec631264f04815eda23dc6edd9');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(240) NOT NULL,
  `news_date` varchar(32) NOT NULL,
  `news_image` varchar(64) NOT NULL,
  `news_des` text NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `news_date`, `news_image`, `news_des`) VALUES
(4, 'Lorem Lipsum Proin Gravide Nibh Vel Velit', '11/16/2016', 'd91814f94f8cc6fcdbe2ea50308298bb.jpg', '<p>Lorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel Velit</p>'),
(5, 'Lorem Lipsum Proin Gravide Nibh Vel Velit', '11/17/2016', 'e45afcc4d3930e5919b188bac8250553.jpg', '<p>Lorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel Velit</p>'),
(6, 'Lorem Lipsum Proin Gravide Nibh Vel Velit', '11/18/2016', '0edcfa0490d125f85755e28c57708ccb.jpg', '<p>Lorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel Velit</p>'),
(10, 'Lorem Lipsum Proin Gravide Nibh Vel Velit', '11/19/2016', '77be1eb44bb2e07fe5d0a0ee29b9fbf1.jpg', '<p>Lorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel VelitLorem Lipsum Proin Gravide Nibh Vel Velit</p>');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
  `nl_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(240) NOT NULL,
  PRIMARY KEY (`nl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`nl_id`, `email`) VALUES
(8, 'info@chicagoinstituteoftechnology.com'),
(9, 'noreplay@chicagoinstituteoftechnology.com'),
(10, 'test@gmail.com'),
(11, 'carbafos68@mail.ru'),
(12, 'jparsons@blogpros.com');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(8) NOT NULL AUTO_INCREMENT,
  `qs_userid` int(8) NOT NULL,
  `qs_usertype` varchar(12) NOT NULL,
  `qs_title` varchar(240) NOT NULL,
  `qs_des` text NOT NULL,
  `qs_course_id` int(8) NOT NULL,
  `qs_batch_id` int(8) NOT NULL,
  `qs_status` tinyint(1) NOT NULL,
  `qs_date` date NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `qs_userid`, `qs_usertype`, `qs_title`, `qs_des`, `qs_course_id`, `qs_batch_id`, `qs_status`, `qs_date`) VALUES
(4, 36, 'student', 'Test Question1', 'Java Threads', 13, 15, 1, '2016-11-27'),
(5, 37, 'student', 'What is Core Jave I need More Details ', 'I Dont Know about Jave Can Some one give me a Brief ', 11, 23, 1, '2016-11-28'),
(6, 37, 'student', 'What is Collections', 'what is collections', 11, 23, 1, '2016-11-28'),
(7, 37, 'student', 'What is Collections', 'what is collections', 11, 23, 1, '2016-11-28'),
(8, 37, 'student', 'Srinu Question - I have Doubt', 'Srinu Question - I have Doubt Srinu Question - I have DoubtSrinu Question - I have DoubtSrinu Question - I have Doubt', 11, 23, 1, '2016-11-28'),
(10, 37, 'student', 'DUMMY GD Question', 'This is a Dummy GD Question', 11, 23, 1, '2016-11-29'),
(12, 37, 'student', 'Onlince Payment Gatway how will work ', 'Online Payment Gateway how will work ', 11, 23, 1, '2016-11-30'),
(13, 37, 'student', 'Dummy Course#2_ GD_Test Data', 'Dummy Course#2_GD_Test Data', 23, 27, 1, '2016-12-01'),
(14, 53, 'student', 'What is Collections in Java', 'What is Collections in Java\r\nWhat is Collections in Java\r\nWhat is Collections in Java\r\nWhat is Collections in Java\r\nWhat is Collections in Java\r\nWhat is Collections in Java\r\nWhat is Collections in Java\r\nWhat is Collections in Java\r\n\r\nWhat is Collections in JavaWhat is Collections in Java\r\n\r\nWhat is Collections in JavaWhat is Collections in Java\r\n\r\n\r\n\r\nWhat is Collections in JavaWhat is Collections in JavaWhat is Collections in JavaWhat is Collections in Java\r\n\r\nWhat is Collections in Java', 24, 39, 2, '2017-01-17'),
(15, 17, 'student', 'What is Java', 'What is Java', 24, 39, 1, '2017-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `quick_inquiry`
--

CREATE TABLE IF NOT EXISTS `quick_inquiry` (
  `qi_id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(120) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `message` text NOT NULL,
  `pagename` varchar(24) NOT NULL,
  PRIMARY KEY (`qi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `quick_inquiry`
--

INSERT INTO `quick_inquiry` (`qi_id`, `name`, `email`, `mobile`, `message`, `pagename`) VALUES
(6, 'srinu', 'srinivas@thecolourmoon.com', '01234567890', 'testing from admin', 'live_projects'),
(7, 'Test2', 'test2@test2.com', '123456789', 'Test_Nov23_CT_QI', 'corporate_training'),
(8, 'test2', 'test2@test2.com', '123456789', 'Test_Nov23_Careers_QI', 'careers'),
(9, 'test2', 'test2@test2.com', '9876543210', 'Test_Nov23_LP_QI', 'live_projects'),
(10, 'test2', 'test2@test2.com', '9876543210', 'Test_Nov23_LP_QI', 'live_projects'),
(11, 'test2', 'test2@test2.com', '85216479', 'Test_Nov23_Int_QI', 'internship');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `qz_id` int(11) NOT NULL AUTO_INCREMENT,
  `qz_user_id` int(11) NOT NULL,
  `qz_name` varchar(120) NOT NULL,
  `qz_filename` varchar(120) NOT NULL,
  `qz_course_id` int(11) NOT NULL,
  `qz_batch_id` int(11) NOT NULL,
  `qz_status` tinyint(1) NOT NULL,
  `qz_date` date NOT NULL,
  PRIMARY KEY (`qz_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`qz_id`, `qz_user_id`, `qz_name`, `qz_filename`, `qz_course_id`, `qz_batch_id`, `qz_status`, `qz_date`) VALUES
(4, 4, 'Core java quiz1', '071b68b791136514e0415e33eef7a80d.docx', 6, 1, 0, '2016-11-16'),
(5, 4, 'quiz selenium 1', 'ab530bf7b182de1c8b4048227a6975bd.docx', 10, 6, 0, '2016-11-16'),
(6, 4, 'Advance java quiz1', 'ee0f5a7d6716f361da70cc486e8fa04a.docx', 6, 1, 0, '2016-11-16'),
(7, 24, 'Sample Test', 'd631c30cd28bf5a997327d92358cbe23.pdf', 24, 39, 0, '2017-02-07'),
(8, 24, 'Sample Test-1', '506253b08c077e7436ce78edb5ce81ba.pdf', 24, 39, 0, '2017-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `students_tbl`
--

CREATE TABLE IF NOT EXISTS `students_tbl` (
  `std_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `std_username` varchar(64) NOT NULL,
  `std_email` varchar(240) NOT NULL,
  `std_mobile` varchar(16) NOT NULL,
  `std_pwd` varchar(64) NOT NULL,
  `std_name` varchar(32) NOT NULL,
  `std_gender` char(2) NOT NULL,
  `std_city` varchar(32) NOT NULL,
  `std_dob` varchar(16) NOT NULL,
  `std_education` varchar(24) NOT NULL,
  `std_status` tinyint(1) NOT NULL,
  `std_image` varchar(120) NOT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `students_tbl`
--

INSERT INTO `students_tbl` (`std_id`, `user_id`, `std_username`, `std_email`, `std_mobile`, `std_pwd`, `std_name`, `std_gender`, `std_city`, `std_dob`, `std_education`, `std_status`, `std_image`) VALUES
(1, 1, 'srinug', 'srinivas@thecolourmoon.com', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 'srinug', 'M', 'BZA', '1986-04-07', 'MCA', 0, 'afce9614910bf156d9735cd9f6129ca1.jpg'),
(4, 10, 'Digitek', 'digitekitinc@gmail.com', '2243392120', '37d13c274006f5b02675c6f477900f46', 'Digitek', '', '', '', '', 0, ''),
(6, 14, 'teststudent', 'sriwert@thecolourmoon.com', '1234567890', '069ae83556606e8c409e6204cb1a436d', 'teststudent', '', '', '', '', 0, ''),
(7, 15, 'test123', 'test@test123.com', '1234567890', 'cc03e747a6afbbcbf8be7668acfebee5', 'test123', '', '', '', '', 0, ''),
(8, 17, 'st1', 'st1@st1.com', '1234567890', 'e2b136987034c1b57b7ccd643f9191ed', 'st1', '', '', '', '', 0, 'b6be4893155848d4464ae57b0db012e0.png'),
(9, 18, 'st2', 'st2@st2.com', '1234567890', 'bda19044a51868d1bff500d9ce5082d8', 'st2', 'M', 'IL', '11/11/1990', 'MS', 0, ''),
(10, 20, 'thecolourmoon', 'thecolourmoon@gmail.com', '9885281291', '25a41cec631264f04815eda23dc6edd9', 'thecolourmoon', '', '', '', '', 0, ''),
(11, 21, 'akashpatel', 'akashnpatel@hotmail.com', '2245428968', 'a50fc842fb875fa2ac9270ca1ce8f21a', 'akashpatel', '', '', '', '', 0, ''),
(22, 36, 'TestUser1', 'rpentapati@gmail.com', '8471111456', 'acae618dc1ec967872777ef3eefacc4e', 'Test1', '', '', '', '', 0, ''),
(23, 37, 'mintu', 'mintu.subbu@gmail.com', '9885281291', '25a41cec631264f04815eda23dc6edd9', 'Mintu', '', '', '', '', 0, 'ef262cf883f1b588d4a8ef56180ac40d.jpg'),
(26, 40, 'Prabhdeepkaur', 'gurjot_phagura@yahoo.com', '8474715648', 'c0feb37daa6a61f51350ec47cd33d16e', 'Mandeep kaur', '', '', '', '', 0, ''),
(28, 42, 'Mandeep81', 'gurjot_phagura@yahoo.com', '8474715648', 'b8c754bc7f455c7364578a46aeb10ef2', 'Mandeep Kaur', '', '', '', '', 0, ''),
(31, 45, 'noskynomoon', 'noskynomoon@gmail.com', '8886888621', '6c4a3d93429d7cbc4a1f5581da5c3417', 'Swrna', '', '', '', '', 0, ''),
(37, 51, 'swapnilnpatel', 'akash@digitekitinc.com', '2245428968', 'd617c20c49c90f27e01c102874086381', 'swapnil patel', '', '', '', '', 0, ''),
(38, 52, 'Test', 'rno41840@dsiay.com', '1234567890', '25f9e794323b453885f5181f1b624d0b', 'Test', '', '', '', '', 0, ''),
(39, 53, 'sun', 'sunil_7g@yahoo.com', '9876543210', '41bde5a23e6a8c67a65785ca0a41bc98', 'Sun', 'M', '', '', 'B.E', 0, '185b0cf981eb80caaf7e3b406b633026.jpg'),
(40, 54, 'Yaakbari', 'yaakbari@gmail.com', '7143003627', 'e924ce701935562a0465833489fdd3c3', 'Yatin akbari', '', '', '', '', 0, ''),
(41, 55, 'chakoo35', 'chakoo35@gmail.com', '630-246-0801', 'a53f5dfa25317382e265385a612490db', 'Urvashi B Patel', '', '', '', '', 0, ''),
(42, 56, 'pinkalpatel', 'pinkalpatel187@gmail.com', '224 716 3228', '4885ca8a78210aee388215bbbe23e556', 'Pinkal', '', '', '', '', 0, ''),
(43, 57, 'Manisha', 'mansha510@gmail.com', '5714893380', '', 'Mansha Patel', '', '', '', '', 0, ''),
(44, 58, 'parekhp1986', 'pausof86@gmail.com', '6302514503', 'a5ecd7412326dc827684913e0c9d99c3', 'Paulomi Parekh', '', '', '', '', 0, ''),
(45, 59, 'Pankaj.sonani', 'pankaj.sonani@gmail.com', '6302729749', '3e729576563c1cc7cfc85684c60365e3', 'Pankaj Sonani', '', '', '', '', 0, ''),
(46, 60, 'phagura79', 'phagura79@gmail.com', '847415648', '0c524fb451ba008b2042d7b4c8453d1c', 'Mandeep Kaur', '', '', '', '', 0, ''),
(47, 61, 'patel11', 'info@digitekitinc.com', '2245428968', '26a991ce0d465e436476785a8a254a6b', 'akash', '', '', '', '', 0, ''),
(48, 62, 'dhaval.rana', 'dhaval.rana75@gmail.com', '9012922956', 'd06ab49fb83d6a75068cea0ab5667f8c', 'Dhaval', '', '', '', '', 0, ''),
(49, 63, 'abc', 'abc@abc.com', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', 'abc', '', '', '', '', 0, ''),
(50, 64, 'dhaval_rana', 'dhaval.rana@yahoo.com', '9012922956', 'd06ab49fb83d6a75068cea0ab5667f8c', 'dhaval', '', '', '', '', 0, ''),
(51, 65, 'bandana', 'bandana0103@gmail.com', '6308155854', 'e22ec12d34fc4d024fd6f2ba331123be', 'Bandana Kumar', '', '', '', '', 0, ''),
(52, 66, 'vijay@thecolourmoon.com', 'vijay@thecolourmoon.com', '9966123456', 'e10adc3949ba59abbe56e057f20f883e', 'Vijay', '', '', '', '', 0, ''),
(53, 67, 'Komzptl', 'komal.u.patel@gmail.com', '7176451720', '4d3858a4b79a9f430c5e59ac9c120bf5', 'Komal', '', '', '', '', 0, ''),
(54, 68, 'Kosha', 'koshapatel1012@gmail.com', '3176660108', '006c2295521bf4734acfd7a29fa3b395', 'Kosha Patel', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_contact`
--

CREATE TABLE IF NOT EXISTS `student_contact` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `message` text NOT NULL,
  `contact_type` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `student_contact`
--

INSERT INTO `student_contact` (`id`, `username`, `subject`, `message`, `contact_type`) VALUES
(2, 'srinug', 'Core java details', 'Please provide code java Fee details and tutorials', 'A Request'),
(3, 'st2', 'Test', 'Test', 'Others'),
(4, 'srinug', 'testing', 'Testing from admin', 'A Request'),
(5, 'st1', 'TEST_ST1_Contact Admin', 'TEST_ST1_Contact Admin', 'A Request'),
(6, 'sun', 'Add to Test Batch', 'Please add me to the Test Batch', 'A Request'),
(7, 'st1', 'adfdsaffd', 'asdfaf\r\n\r\nasdf', 'Complaint');

-- --------------------------------------------------------

--
-- Table structure for table `student_ebooks`
--

CREATE TABLE IF NOT EXISTS `student_ebooks` (
  `se_id` int(11) NOT NULL AUTO_INCREMENT,
  `se_course_id` int(8) NOT NULL,
  `se_batch_id` int(8) NOT NULL,
  `se_title` varchar(120) NOT NULL,
  `se_image` varchar(64) NOT NULL,
  `se_pdf` varchar(120) NOT NULL,
  `se_author` varchar(64) NOT NULL,
  `se_page_no` smallint(8) NOT NULL,
  PRIMARY KEY (`se_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `student_ebooks`
--

INSERT INTO `student_ebooks` (`se_id`, `se_course_id`, `se_batch_id`, `se_title`, `se_image`, `se_pdf`, `se_author`, `se_page_no`) VALUES
(1, 6, 1, 'Advanced Java', '6dee6e14f3044f1fad4100fdf2ab8389.jpg', '6693121eea4cc76c108e80c4716136d0.pdf', 'Scott', 99),
(2, 9, 5, 'Manual testing', 'c9520c65940ff5c5f78bd37463c1d93b.jpg', 'e46168b4c2779a86a50c95afb509df7b.pdf', 'Peter', 188),
(3, 7, 8, 'Java Frame works', 'dbb91b47638b9f5a329954804cf4799e.jpg', '72733b35023cf944adff1f5b891626c9.pdf', 'Peter', 188),
(4, 24, 39, 'Sample_TEST', '', 'f0df520986af8b9db645b5e17cd727b4.pdf', 'DigiTek', 7),
(5, 24, 39, 'Sample-2_Test', '', '9291afef43d467af69a0184933e69ac0.pdf', 'DigiTek', 5);

-- --------------------------------------------------------

--
-- Table structure for table `student_notifications`
--

CREATE TABLE IF NOT EXISTS `student_notifications` (
  `sn_id` int(8) NOT NULL AUTO_INCREMENT,
  `sn_course_id` int(8) NOT NULL,
  `sn_batch_id` int(8) NOT NULL,
  `sn_title` varchar(240) NOT NULL,
  `sn_des` text NOT NULL,
  `sn_date` date NOT NULL,
  PRIMARY KEY (`sn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `student_notifications`
--

INSERT INTO `student_notifications` (`sn_id`, `sn_course_id`, `sn_batch_id`, `sn_title`, `sn_des`, `sn_date`) VALUES
(1, 8, 10, 'Notification Title', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>', '2016-11-14'),
(2, 10, 6, 'Notification Title for selenium testing', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>\r\n<p>for selenium testing</p>', '2016-11-14'),
(3, 0, 4, 'Notification Title', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>', '2016-11-14'),
(4, 10, 6, 'Notification Title', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>', '2016-11-14'),
(5, 9, 5, 'Notification Title', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>', '2016-11-14'),
(6, 8, 4, 'Notification Title', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>', '2016-11-14'),
(7, 7, 2, 'Notification Title', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>', '2016-11-14'),
(8, 24, 39, 'Notification Title for java frame works', '<p>Notification Title for java frame works</p>', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `student_notifications1`
--

CREATE TABLE IF NOT EXISTS `student_notifications1` (
  `sg_id` int(8) NOT NULL AUTO_INCREMENT,
  `sg_course_id` int(8) NOT NULL,
  `sg_batch_id` int(8) NOT NULL,
  `sg_student` text NOT NULL,
  `sg_title` varchar(160) NOT NULL,
  `sg_des` text NOT NULL,
  `sg_date` date NOT NULL,
  `sg_str` text NOT NULL,
  UNIQUE KEY `sg_id` (`sg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `student_notifications1`
--

INSERT INTO `student_notifications1` (`sg_id`, `sg_course_id`, `sg_batch_id`, `sg_student`, `sg_title`, `sg_des`, `sg_date`, `sg_str`) VALUES
(5, 11, 14, 'a:1:{i:0;s:2:"37";}', 'Lorem Lipsum Proin Gravide Nibh Vel Velit', '<p>Lorem Lipsum Proin Gravide Nibh Vel Velit&nbsp;Lorem Lipsum Proin Gravide Nibh Vel Velit&nbsp;Lorem Lipsum Proin Gravide Nibh Vel Velit&nbsp;Lorem Lipsum Proin Gravide Nibh Vel Velit&nbsp;Lorem Lipsum Proin Gravide Nibh Vel Velit&nbsp;Lorem Lipsum Proin Gravide Nibh Vel Velit&nbsp;Lorem Lipsum Proin Gravide Nibh Vel Velit.</p>', '2016-12-20', '37');

-- --------------------------------------------------------

--
-- Table structure for table `student_videos`
--

CREATE TABLE IF NOT EXISTS `student_videos` (
  `sv_id` int(11) NOT NULL AUTO_INCREMENT,
  `sv_course_id` int(8) NOT NULL,
  `sv_batch_id` int(8) NOT NULL,
  `sv_title` varchar(64) NOT NULL,
  `sv_link` text NOT NULL,
  `sv_image` varchar(64) NOT NULL,
  PRIMARY KEY (`sv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student_videos`
--

INSERT INTO `student_videos` (`sv_id`, `sv_course_id`, `sv_batch_id`, `sv_title`, `sv_link`, `sv_image`) VALUES
(1, 6, 1, 'Advance Java', 'https://www.youtube.com/watch?v=ZdP0KM49IVk', '3c01051d6668b857fffb3150289827bb.jpg'),
(2, 6, 9, 'Core Java', 'https://www.youtube.com/watch?v=ZdP0KM49IVk', 'c133fd7c4f2e9fa8a1fdf7468da87a9d.jpg'),
(3, 9, 5, 'Manual testing', 'https://www.youtube.com/watch?v=Bi-v6M4fGbA', '2e9f8fda6fdaf09bbcd73c1b04d1c772.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(4) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(128) NOT NULL,
  `admin_email` varchar(64) NOT NULL,
  `admin_password` varchar(64) NOT NULL,
  `admin_role` int(2) NOT NULL,
  `admin_status` int(1) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_role`, `admin_status`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin_123', 1, 0),
(13, 'super', 'super', 'super_123', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_username` varchar(180) NOT NULL,
  `usr_pwd` varchar(180) NOT NULL,
  `usr_usertype` enum('student','tutor') NOT NULL,
  `usr_date_time` varchar(24) NOT NULL,
  `usr_sn_id` varchar(120) NOT NULL,
  `usr_from` varchar(16) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`usr_id`, `usr_username`, `usr_pwd`, `usr_usertype`, `usr_date_time`, `usr_sn_id`, `usr_from`) VALUES
(1, 'srinug', 'e10adc3949ba59abbe56e057f20f883e', 'student', '2016-12-30 00:52:53', '', ''),
(10, 'Digitek', '37d13c274006f5b02675c6f477900f46', 'student', '', '', ''),
(14, 'teststudent', '069ae83556606e8c409e6204cb1a436d', 'student', '2016-11-24 13:55:54', '', ''),
(15, 'test123', 'cc03e747a6afbbcbf8be7668acfebee5', 'student', '', '', ''),
(17, 'st1', 'e2b136987034c1b57b7ccd643f9191ed', 'student', '2017-10-12 01:36:31', '', ''),
(18, 'st2', 'bda19044a51868d1bff500d9ce5082d8', 'student', '', '', ''),
(20, 'thecolourmoon', '25a41cec631264f04815eda23dc6edd9', 'student', '', '', ''),
(21, 'akashpatel', 'a50fc842fb875fa2ac9270ca1ce8f21a', 'student', '2016-11-18 14:56:46', '', ''),
(23, 'srinivasv', 'dd7932f5fe58cfed7cd669ecd13c75e1', 'student', '', '', ''),
(24, 'tutor1', '0b2f99d74e41e808a5e3c0c50223ae7f', 'tutor', '2017-09-20 08:42:01', '', ''),
(25, 'peterg', 'e10adc3949ba59abbe56e057f20f883e', 'tutor', '2016-11-24 07:32:09', '', ''),
(32, 'tutor2', 'eb007e610d25769d69f081ebbb337b13', 'tutor', '2016-11-29 10:37:11', '', ''),
(36, 'TestUser1', 'acae618dc1ec967872777ef3eefacc4e', 'student', '2016-11-27 09:03:54', '', ''),
(37, 'mintu', '5151d92e23889564623a29b431f66e24', 'student', '2016-12-01 13:05:41', '', ''),
(40, 'Prabhdeepkaur', 'c0feb37daa6a61f51350ec47cd33d16e', 'student', '', '', ''),
(42, 'Mandeep81', 'b8c754bc7f455c7364578a46aeb10ef2', 'student', '2016-11-29 22:21:05', '', ''),
(45, 'noskynomoon', '6c4a3d93429d7cbc4a1f5581da5c3417', 'student', '', '', ''),
(51, 'swapnilnpatel', 'a50fc842fb875fa2ac9270ca1ce8f21a', 'student', '2017-01-13 09:03:34', '', ''),
(52, 'Test', '25f9e794323b453885f5181f1b624d0b', 'student', '2017-01-17 11:38:45', '', ''),
(53, 'sun', '41bde5a23e6a8c67a65785ca0a41bc98', 'student', '2017-02-07 09:11:10', '', ''),
(54, 'Yaakbari', 'e924ce701935562a0465833489fdd3c3', 'student', '2017-03-09 23:18:51', '', ''),
(55, 'chakoo35', 'a53f5dfa25317382e265385a612490db', 'student', '2017-03-08 09:35:10', '', ''),
(56, 'pinkalpatel', '4885ca8a78210aee388215bbbe23e556', 'student', '2017-03-09 11:29:38', '', ''),
(57, 'Manisha', 'bdf3fd65c81469f9b74cedd497f2f9ce', 'student', '', '109182483935631471094', ''),
(58, 'parekhp1986', 'a5ecd7412326dc827684913e0c9d99c3', 'student', '', '', ''),
(59, 'Pankaj.sonani', '3e729576563c1cc7cfc85684c60365e3', 'student', '2017-03-08 12:12:21', '', ''),
(60, 'phagura79', '0c524fb451ba008b2042d7b4c8453d1c', 'student', '', '', ''),
(61, 'patel11', '26a991ce0d465e436476785a8a254a6b', 'student', '2017-03-09 08:51:23', '', ''),
(62, 'dhaval.rana', 'd06ab49fb83d6a75068cea0ab5667f8c', 'student', '', '', ''),
(63, 'abc', 'e10adc3949ba59abbe56e057f20f883e', 'student', '', '', ''),
(64, 'dhaval_rana', 'd06ab49fb83d6a75068cea0ab5667f8c', 'student', '', '', ''),
(65, 'bandana', 'e22ec12d34fc4d024fd6f2ba331123be', 'student', '', '', ''),
(66, 'vijay@thecolourmoon.com', 'e10adc3949ba59abbe56e057f20f883e', 'student', '', '', ''),
(67, 'Komzptl', '4d3858a4b79a9f430c5e59ac9c120bf5', 'student', '', '', ''),
(68, 'Kosha', '006c2295521bf4734acfd7a29fa3b395', 'student', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `testimonial_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `designation` varchar(32) NOT NULL,
  `testimonial_des` text NOT NULL,
  `testimonial_image` varchar(64) NOT NULL,
  PRIMARY KEY (`testimonial_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonial_id`, `name`, `designation`, `testimonial_des`, `testimonial_image`) VALUES
(1, 'Erin', ' Network & System Administrator', '<p>Thanks to the well-structured learning modules and practical training sessions, I am able to develop a better understanding of advanced network management and complex frameworks. My instructor is quite knowledgeable and has a great teaching style. Will definitely recommend Chicago Institute of Technology to my colleagues and friends.</p>', '72863663c48934ae1b3f18b661d39e7c.jpg'),
(2, 'Daniel', 'Marketing Officer', '<p>"One of the best things about Chicago Institute of Technology is they provide high flexibility in managing courses. I have a full-time job and a family to look after, but I can easily take my courses in my free time."</p>', 'a240966e4a71cd9f69d22ea809a8c3f9.jpg'),
(3, 'Mui Jing', 'Technical Project Manager', '<p>Agile and Scrum Certification has really helped me move forward in my career. I got a promotion shortly after completing the certification, and the future looks quite bright to me now.</p>', '70ae05c313f9258f7a2610786e70b549.jpg'),
(4, 'Ramesh Mehta', 'Business owner', '<p>Thank you Chicago Institute of Technology for such a great experience. The English language course was simply awesome. The modules were easy to understand and my course teacher was very friendly and made learning English hassle-free.</p>', '40ea520a8de13f60477fe418af41f906.jpg'),
(5, 'Robert', 'Marketing Assistant', '<p>There is so much more to Digital Marketing than I thought. Thanks to my tutor, I was able to explore the many aspects of Digital Marketing. Now that I have developed a good understanding of the dynamics of this field, I can move on to take specialization courses.</p>', '7f671cc1bdfa5806f44f2ed764165075.jpg'),
(6, 'Harold', 'CEO', '<p>After taking a set of Business and Management courses, my employees&rsquo; productivity levels are off the charts. I am surprised to see such level of transformation. Going to enroll my other employees to the same corporate training program.</p>', 'aa6024f70bd9699be427c2091c7ebcf6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE IF NOT EXISTS `tutors` (
  `tutor_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tutor_name` varchar(32) NOT NULL,
  `tutor_email` varchar(64) NOT NULL,
  `tutor_mobile` varchar(14) NOT NULL,
  `tutor_username` varchar(64) NOT NULL,
  `tutor_pwd` varchar(64) NOT NULL,
  `tutor_image` varchar(64) NOT NULL,
  `tutor_des` text NOT NULL,
  `tutor_rating` smallint(4) NOT NULL,
  `tutor_courses_id` text NOT NULL,
  `tutor_city` varchar(32) NOT NULL,
  `tutor_gender` char(2) NOT NULL,
  `tutor_education` varchar(32) NOT NULL,
  `tutor_dob` varchar(16) NOT NULL,
  PRIMARY KEY (`tutor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutor_id`, `user_id`, `tutor_name`, `tutor_email`, `tutor_mobile`, `tutor_username`, `tutor_pwd`, `tutor_image`, `tutor_des`, `tutor_rating`, `tutor_courses_id`, `tutor_city`, `tutor_gender`, `tutor_education`, `tutor_dob`) VALUES
(13, 24, 'Tutor-1', 'tutor@tutor.com', '785412', 'tutor1', '0b2f99d74e41e808a5e3c0c50223ae7f', '2389018b8fa020ef3b9d061e89a461cd.jpg', '<p>Having 10+ years of experience in Application Development and Testing</p>\r\n<p>4+ years experience in corporate training</p>', 5, 'a:1:{i:0;s:2:"11";}', 'chicago', '', '', ''),
(14, 25, 'Peter', 'srinivas@thecolourmoon.com', '01234567890', 'peterg', 'e10adc3949ba59abbe56e057f20f883e', 'f2a53de4158331c1ac742d9400afc4dd.jpg', '<p>This Core java Tutor, 15 yrs exp</p>', 3, 'a:1:{i:0;s:2:"11";}', '', '', '', ''),
(15, 32, 'Tutor-2', 'tutor2@tutor2.com', '9876543210', 'tutor2', 'eb007e610d25769d69f081ebbb337b13', '', '<p>Has 15+ years of experience in application development and testing</p>\r\n<p>Has 8 years of teaching experience in Softfare Testing</p>', 5, 'a:3:{i:0;s:2:"15";i:1;s:2:"16";i:2;s:2:"17";}', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_contact`
--

CREATE TABLE IF NOT EXISTS `tutor_contact` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `contact_type` varchar(64) NOT NULL,
  `subject` varchar(64) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tutor_contact`
--

INSERT INTO `tutor_contact` (`id`, `username`, `contact_type`, `subject`, `message`) VALUES
(5, 'tutor1', 'A Request', 'Testing sree', 'testing from dev'),
(6, 'tutor1', 'A Request', 'testing', 'testing....');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_notifications`
--

CREATE TABLE IF NOT EXISTS `tutor_notifications` (
  `tn_id` int(8) NOT NULL AUTO_INCREMENT,
  `tn_title` varchar(240) NOT NULL,
  `tn_des` text NOT NULL,
  `tn_date` date NOT NULL,
  PRIMARY KEY (`tn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tutor_notifications`
--

INSERT INTO `tutor_notifications` (`tn_id`, `tn_title`, `tn_des`, `tn_date`) VALUES
(9, 'this is Dummy Notfifcations', '<p>this is Dummy Notfifcations</p>', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
