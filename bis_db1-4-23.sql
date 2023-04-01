-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 04:26 AM
-- Server version: 5.7.14
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about_exchange_forum`
--

CREATE TABLE `tbl_about_exchange_forum` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_about_exchange_forum`
--

INSERT INTO `tbl_about_exchange_forum` (`id`, `image`, `description`, `status`, `created_on`) VALUES
(1, 'about_exchange_forum1680184529.jpg', 'm,zXC<Jbzjxcb z bjsb jsb bsjkbjsaklbcl', 'created', '2023-03-30 13:55:29'),
(2, 'about_exchange_forum1680184554.jpg', 'vvcxcc hhjschjash vhjsvchjvsahjvsftfh sgrgre rgerg ertgerg', 'created', '2023-03-30 13:55:54'),
(3, 'about_exchange_forum1680184581.jpg', 'dfh regrdegr wetweter twetewrtery dfh regrdegr wetweter twetewrtery dfh regrdegr wetweter twetewrtery dfh regrdegr wetweter twetewrtery dfh regrdegr wetweter twetewrtery dfh regrdegr wetweter twetewrtery dfh regrdegr wetweter twetewrtery dfh regrdegr wetw', 'created', '2023-03-30 13:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` bigint(20) NOT NULL,
  `user_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` smallint(1) NOT NULL COMMENT '1-active 0-inactive',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `post` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_type` int(2) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `user_uid`, `is_active`, `name`, `email_id`, `designation`, `branch`, `post`, `department`, `username`, `password`, `admin_type`, `created_on`, `modified_on`) VALUES
(1, '', 1, 'IT Services Department', 'its@bis.gov.in ', 'Head(ITSD)                                        ', 'BIS HQ', 'Super Admin', 'IT Services Department', 'its@bis.gov.in', 'Itsd@2023', 1, '2023-03-16 17:02:34', '2023-03-16 17:02:34'),
(25, '1800003549', 1, 'D K AGRAWAL', 'agrawal@bis.org.in', '', '', '', '', 'agrawal@bis.org.in', '12345678', 2, '2023-03-24 11:48:19', NULL),
(26, '1800003549', 1, 'Subadmin', 'subadmin@bis.org.in', '', '', '', '', 'subadmin@bis.org.in', '12345678', 3, '2023-03-24 12:34:42', NULL),
(27, '1800003549', 1, 'admin', 'admin@bis.org.in', '', '', '', '', 'admin@bis.org.in', '12345678', 2, '2023-03-29 23:06:48', NULL),
(28, '1800003549', 1, 'subadmin 2', 'subadmin2@bis.org.in', '', '', '', '', 'subadmin2@bis.org.in', '12345678', 3, '2023-03-29 23:21:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_img`
--

CREATE TABLE `tbl_banner_img` (
  `id` int(11) NOT NULL,
  `banner_images` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_banner_img`
--

INSERT INTO `tbl_banner_img` (`id`, `banner_images`, `caption`, `created_on`) VALUES
(1, 'bannerimg1679591821.jpg', 'asd', '2023-03-23 17:17:01'),
(2, 'bannerimg1680184448.jpg', 'New banner', '2023-03-30 13:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_by_the_mentors`
--

CREATE TABLE `tbl_by_the_mentors` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(10) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_by_the_mentors`
--

INSERT INTO `tbl_by_the_mentors` (`id`, `title`, `image`, `document`, `description`, `status`, `created_on`) VALUES
(18, 'dsad', 'btm_image1679991483.jpg', 'btm_document1679991483.pdf', 'khkjhk', 1, '2023-03-28 08:18:03'),
(16, 'title', 'btm_image1679933043.jpg', 'btm_document1679933043.pdf', 'description', 5, '2023-03-27 16:04:04'),
(17, 'ere', 'btm_image1679978298.jpg', 'btm_document1679978298.pdf', 'dfggf', 6, '2023-03-28 04:38:18'),
(19, 'title', 'btm_image1679992632.jpg', 'btm_document1679992632.pdf', 'khkjhhskjhs', 5, '2023-03-28 08:37:12'),
(20, 'akshay', 'btm_image1679993575.jpg', 'btm_document1679993575.pdf', 'kjhkjh', 1, '2023-03-28 08:52:55'),
(21, 'anis', 'btm_image1679993779.jpg', 'btm_document1679993779.pdf', 'jgjhg', 1, '2023-03-28 08:56:19'),
(22, 'Akshay', 'btm_image1680192687.jpg', 'btm_document1680192687.pdf', 'dfgfd  rtretre wetewte sefestet', 1, '2023-03-30 16:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us_detail`
--

CREATE TABLE `tbl_contact_us_detail` (
  `id` int(11) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `tele_fax` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_us_detail`
--

INSERT INTO `tbl_contact_us_detail` (`id`, `contact_no`, `address`, `email`, `location`, `tele_fax`, `created_on`) VALUES
(1, 8459506651, 'Shri Nagar, Barshi Road, Latur', 'sdnyanu22@gmail.com', '', '', '2023-03-24 10:09:32'),
(2, 8459506651, 'Shri Nagar, Barshi Road, Latur', 'sdnyanu22@gmail.com', 'latur', '100', '2023-03-24 10:10:18'),
(3, 8459506651, 'Shri Nagar, Barshi Road, Latur', 'sdnyanu22@gmail.com', 'latur', '100', '2023-03-27 04:48:03'),
(4, 8459506651, 'Shri Nagar, Barshi Road, Latur', 'sdnyanu22@gmail.com', 'SdADS', 'a', '2023-03-28 07:04:31'),
(5, 1234567890, 'kaur', 'sakhare.akshay51@gmail.com', 'url', '123', '2023-03-28 07:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follow_us_link`
--

CREATE TABLE `tbl_follow_us_link` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_follow_us_link`
--

INSERT INTO `tbl_follow_us_link` (`id`, `icon`, `title`, `link`, `created_on`) VALUES
(10, 'follow_us1679998855.jpg', 'lkkjijdsifji', 'kjjhjkhj', '2023-03-28 10:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_legel`
--

CREATE TABLE `tbl_legel` (
  `id` int(11) NOT NULL,
  `cap` text NOT NULL,
  `crp` text NOT NULL,
  `copyright_policy` text NOT NULL,
  `disclamer` text NOT NULL,
  `hlp` text NOT NULL,
  `policy_p` text NOT NULL,
  `tc` text NOT NULL,
  `cmap` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_legel`
--

INSERT INTO `tbl_legel` (`id`, `cap`, `crp`, `copyright_policy`, `disclamer`, `hlp`, `policy_p`, `tc`, `cmap`, `created_on`) VALUES
(1, '<p>The Guidelines for Indian Government Websites (GIGW) stipulate that expired contents must not be presented or flashed on the website. Therefore, as per the content archival policy adopted by this department, contents will be deleted from the site after its expiry date. Important data will be shifted to the archives page. Therefore, the content contributors should revalidate/modify the content periodically to ensure that expired data is not present/flashed in the site. Wherever contents are no longer needed to be displayed, suitable advice may be sent to the web information manager for their archival/deletion.</p>\r\n\r\n<p>Each of the content components is accompanied by metadata, source and validity date. For some of the components the validity date may not be known i.e., the content is stated to be perpetual. Under this scenario, the validity date should be Ten years.</p>\r\n\r\n<p>For few of the components like announcements, tenders, only the live content whose validity date is after the current date is shown on the Website. For other components like documents, schemes, services, forms, websites and contact directory there is a need for timely review of the same as per the Content Review Policy.</p>\r\n\r\n<p><strong>Thank You,</strong></p>\r\n\r\n<p>Bureau of Indian Standards<br />\r\nTelephone : 00000000000<br />\r\nEmail-Id : @gmail.com</p>\r\n', '<p>This PMRDA website is an important tool for disseminating the information to the masses being served by the organization. It is therefore required to keep the content on the Website current and up-to-date and hence there is a need for the Content Review Policy. Since the scope of the content is huge, different Review Policies are defined for the diverse content elements.</p>\r\n\r\n<p>The Review Policy is based on different type of content elements, its validity and relevance as well as the archival policy. The matrix below gives the Content Review Policy:</p>\r\n', '<p>This website is designed, developed, maintained and its content provided by Pune Metropolitan Region Development Authority (PMRDA).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Under no circumstances will this Department be liable for any expense, loss or damage including, without limitation, indirect or consequential loss or damage, or any expense, loss or damage whatsoever arising from use or loss of use of data, arising out of or in connection with the use of the contents of this website.</p>\r\n', '<p>This website is designed, developed, maintained and its content provided by Pune Metropolitan Region Development Authority (PMRDA).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Under no circumstances will this Department be liable for any expense, loss or damage including, without limitation, indirect or consequential loss or damage, or any expense, loss or damage whatsoever arising from use or loss of use of data, arising out of or in connection with the use of the contents of this website.</p>\r\n', '<h1><strong>Links to external websites/portals</strong></h1>\r\n\r\n<p>At many places in this website, you shall find links to other websites/portals. The links have been placed for your convenience. PMRDA is not responsible for the contents and reliability of the linked websites and does not necessarily endorse the views expressed in them. Mere presence of the link or its listing on this Portal should not be assumed as endorsement of any kind. We cannot guarantee that these links will work all the time and we have no control over availability of linked pages.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>When you select a link to an outside website, you are leaving the PMRDA website and are subject to the privacy and security policies of the owners/sponsors of the outside website. PMRDA cannot authorize the use of copyrighted materials contained in linked websites. Users are advised to request such authorization from the owner of the linked website. PMRDA does not guarantee that linked websites comply with Indian Government Web Guidelines.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<h2><strong>Site Visit Data</strong></h2>\r\n\r\n<p>BIS Website does not automatically capture any specific personal information from you, (like name, phone number or e-mail address), that allows us to identify you individually.</p>\r\n\r\n<p>This website records your visit and logs the following information for statistical purposes, such as Internet protocol (IP) addresses, domain name, server&#39;s address; name of the top-level domain from which you access the Internet (for example, .gov, .com, .in, etc.), browser type, operating system, the date and time of the visit, the pages you have accessed, the documents downloaded and the previous Internet address from which you linked directly to the site. We make no attempt to link these addresses with the identity of individuals visiting our site unless an attempt to damage the site has been detected. We will not identify users or their browsing activities, except when a law enforcement agency may exercise a warrant to inspect the service provider&#39;s logs.</p>\r\n\r\n<p>If the PMRDA Website requests you to provide personal information, you will be informed for the particular purposes for which the information is gathered and adequate security measures will be taken to protect your personal information. PMRDA does not sell or share any personally identifiable information volunteered on the PMRDA Website to any third party (public/private). Any information provided to this website will be protected from loss, misuse, unauthorized access or disclosure, alteration, or destruction.</p>\r\n\r\n<h2><strong>Cookies</strong></h2>\r\n\r\n<p>A cookie is a piece of software code that an Internet website sends to your browser when you access information in that site. This site does not use cookies.</p>\r\n\r\n<h2><strong>E-mail Management</strong></h2>\r\n\r\n<p>Your e-mail address will only be recorded if you choose to send a message. It will only be used for the purpose for which you have provided it and will not be added to a mailing list. Your e-mail address will not be used for any other purpose, and will not be disclosed without your consent.</p>\r\n\r\n<h2><strong>Collection of Personal Information</strong></h2>\r\n\r\n<p>If you are asked for any other Personal Information you will be informed how it will be used if you choose to give it. If at any time you believe the principles referred to in this privacy statement have not been followed, or have any other comments on these principles, please notify the Web Information Manager by sending email to comm[at]pmrda[dot]gov[dot]in.</p>\r\n\r\n<p>Note: The use of the term &quot;Personal Information&quot; in this privacy statement refers to any information from which your identity is apparent or can be reasonably ascertained.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Reasonable Security Practices</strong></h2>\r\n\r\n<p>Reasonable security measures such as administrative, technical, operational and physical controls have been implemented to ensure the security of personal information, if collected.</p>\r\n', '<p><strong>Anis</strong> This <strong>website </strong>is designed, developed, maintained and its content provided by Pune Metropolitan Region Development Authority (PMRDA).</p>\r\n\r\n<p>Under no circumstances will this Department be liable for any expense, loss or damage including, without limitation, indirect or consequential loss or damage,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>or any expense, loss or damage whatsoever arising from use or loss of use of data, arising out of or in connection with the use of the contents of this website.</p>\r\n', '<p>Content needs to be contributed by the authorized Content Owner &ndash; the respective deputy directorsfrom various wings of PMRDA in a consistent fashion to maintain uniformity and to bring in standardization along with associated metadata and keywords.</p>\r\n\r\n<p>The content on the portal goes through the entire life-cycle process, which consists of</p>\r\n\r\n<ul>\r\n	<li>Creation</li>\r\n	<li>Modification</li>\r\n	<li>Approval</li>\r\n	<li>Moderation</li>\r\n	<li>Publishing</li>\r\n	<li>Expiry</li>\r\n	<li>Archival</li>\r\n	<li><strong>Akshay</strong></li>\r\n</ul>\r\n\r\n<p>Once the content is contributed it needs to be approved and moderated prior to being published on the Website. The moderation could be multilevel and is role based. If the content is rejected at any level then it is reverted back to the originator of the content for modification.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2023-03-24 11:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_admin_role`
--

CREATE TABLE `tbl_mst_admin_role` (
  `id` int(11) NOT NULL,
  `admin_type` int(2) NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_mst_admin_role`
--

INSERT INTO `tbl_mst_admin_role` (`id`, `admin_type`, `role`) VALUES
(1, 1, 'Superadmin'),
(2, 2, 'Admin'),
(3, 3, 'Subadmin'),
(4, 4, 'Evaluatars'),
(5, 5, 'Editors');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_language`
--

CREATE TABLE `tbl_mst_language` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mst_language`
--

INSERT INTO `tbl_mst_language` (`id`, `title`) VALUES
(1, 'English'),
(2, 'Hindi'),
(3, 'Both');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_prizes`
--

CREATE TABLE `tbl_mst_prizes` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mst_prizes`
--

INSERT INTO `tbl_mst_prizes` (`id`, `title`) VALUES
(1, '1st Prize'),
(2, '2nd Prize'),
(3, '3rd Prize'),
(4, 'Consolation Prizes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_quiz_availability`
--

CREATE TABLE `tbl_mst_quiz_availability` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mst_quiz_availability`
--

INSERT INTO `tbl_mst_quiz_availability` (`id`, `title`) VALUES
(1, ' Standard Club Members'),
(2, 'Mentors'),
(3, 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_quiz_level`
--

CREATE TABLE `tbl_mst_quiz_level` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mst_quiz_level`
--

INSERT INTO `tbl_mst_quiz_level` (`id`, `title`) VALUES
(1, 'All India Level'),
(2, 'Regional Level'),
(3, 'Branch Level');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_status`
--

CREATE TABLE `tbl_mst_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mst_status`
--

INSERT INTO `tbl_mst_status` (`id`, `status_name`) VALUES
(1, 'Created'),
(2, 'Sent to admin for approval'),
(3, 'Approved'),
(4, 'Rejected'),
(5, 'Published'),
(6, 'UnPublished'),
(7, 'Closed'),
(8, 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mst_user_roles`
--

CREATE TABLE `tbl_mst_user_roles` (
  `id` int(11) NOT NULL,
  `user_role_id` smallint(6) NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_mst_user_roles`
--

INSERT INTO `tbl_mst_user_roles` (`id`, `user_role_id`, `role`) VALUES
(1, 0, 'Guest'),
(2, 1, 'BIS Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photos`
--

CREATE TABLE `tbl_photos` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_photos`
--

INSERT INTO `tbl_photos` (`id`, `image`, `title`, `created_on`) VALUES
(18, 'photos1679989207.jpg', 'sude', '2023-03-28 07:40:07'),
(16, 'photos1679988988.jpg', 'sdafdd', '2023-03-28 07:36:28'),
(17, 'photos1679989096.jpg', 'kjhjkh', '2023-03-28 07:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prizes`
--

CREATE TABLE `tbl_prizes` (
  `id` int(11) NOT NULL,
  `quiz_id` int(20) NOT NULL,
  `prize_id` varchar(100) NOT NULL,
  `no_of_prize` varchar(10) NOT NULL,
  `prize_details` varchar(500) NOT NULL,
  `prize_img` varchar(100) NOT NULL,
  `availability_id` int(5) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prizes`
--

INSERT INTO `tbl_prizes` (`id`, `quiz_id`, `prize_id`, `no_of_prize`, `prize_details`, `prize_img`, `availability_id`, `created_on`) VALUES
(1, 1, '1', '3', 'sdfdsf', 'uploads/prize_img/1680161265prize_imgrevised.jpg', 0, '2023-03-30 12:55:27'),
(2, 1, '2', '3', '3q3er32', 'uploads/prize_img/1680162129prize_img1- jpg50kb.jpg', 0, '2023-03-30 12:55:27'),
(3, 1, '3', '3', 'dsfdsf', 'uploads/prize_img/1680161265prize_imgra 1 inrer.jpg', 0, '2023-03-30 12:55:27'),
(4, 1, '4', '3', 'dsfdsf', 'NA', 0, '2023-03-30 12:55:27'),
(5, 2, '1', '3', '1st prize details', 'uploads/prize_img/1680189272prize_img1- jpg50kb.jpg', 0, '2023-03-30 20:44:32'),
(6, 2, '2', '4', 'wda', 'uploads/prize_img/1680189272prize_img1- jpg50kb.jpg', 0, '2023-03-30 20:44:32'),
(7, 2, '3', '10', 'dsfdsf', 'uploads/prize_img/1680189272prize_imgcurl error bis.jpg', 0, '2023-03-30 20:44:32'),
(8, 2, '4', '3', 'dsfdsf', 'NA', 0, '2023-03-30 20:44:32'),
(9, 3, '1', '2', 'Laptop', 'uploads/prize_img/1680250035prize_imgScreenshot (15).png', 0, '2023-03-31 13:37:15'),
(10, 3, '2', '3', 'Tv', 'uploads/prize_img/1680250035prize_imgScreenshot (15).png', 0, '2023-03-31 13:37:15'),
(11, 3, '3', '1', 'pen', 'uploads/prize_img/1680250035prize_imgScreenshot (8).png', 0, '2023-03-31 13:37:15'),
(12, 3, '4', '2', 'ball', 'NA', 0, '2023-03-31 13:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_que_bank`
--

CREATE TABLE `tbl_que_bank` (
  `que_bank_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_ques` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `language` smallint(6) NOT NULL,
  `is_active` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `rejection_reason` text COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` smallint(6) NOT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_que_bank`
--

INSERT INTO `tbl_que_bank` (`que_bank_id`, `title`, `no_of_ques`, `total_marks`, `language`, `is_active`, `status`, `rejection_reason`, `created_on`, `created_by`, `modified_by`, `modified_on`) VALUES
(1, 'hindi  quiz', 5, 5, 2, 1, 1, '', '2023-03-31 19:47:24', 26, 0, NULL),
(2, 'chgc', 5, 5, 1, 1, 1, '', '2023-03-31 20:09:29', 26, 0, NULL),
(3, 'fsdf', 10, 10, 2, 1, 1, '', '2023-03-31 20:17:59', 26, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_que_details`
--

CREATE TABLE `tbl_que_details` (
  `que_id` int(11) NOT NULL,
  `que_type` smallint(6) NOT NULL,
  `is_active` smallint(6) NOT NULL,
  `que_bank_id` int(11) NOT NULL,
  `que` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `que_h` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `no_of_options` smallint(6) NOT NULL,
  `opt1_e` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opt2_e` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opt3_e` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opt4_e` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opt5_e` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opt1_h` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opt2_h` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opt3_h` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opt4_h` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opt5_h` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `corr_opt_e` smallint(6) NOT NULL,
  `corr_opt_h` smallint(6) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_que_details`
--

INSERT INTO `tbl_que_details` (`que_id`, `que_type`, `is_active`, `que_bank_id`, `que`, `que_h`, `image`, `no_of_options`, `opt1_e`, `opt2_e`, `opt3_e`, `opt4_e`, `opt5_e`, `opt1_h`, `opt2_h`, `opt3_h`, `opt4_h`, `opt5_h`, `corr_opt_e`, `corr_opt_h`, `created_on`, `modified_on`, `created_by`) VALUES
(3, 1, 1, 1, '', 'केश्', '', 2, '', '', '', '', '', '', '', '', '', '', 1, 0, '2023-03-31 19:59:32', '0000-00-00 00:00:00', 26),
(4, 1, 1, 1, '', '', '', 4, '', '', '', '', '', '', '', '', '', '', 4, 0, '2023-03-31 19:59:59', '0000-00-00 00:00:00', 26),
(5, 1, 1, 1, '', '', '', 4, '', '', '', '', '', '', '', '', '', '', 3, 0, '2023-03-31 20:01:18', '0000-00-00 00:00:00', 26),
(6, 1, 1, 3, '', '', '', 3, '', '', '', '', '', '', '', '', '', '', 3, 0, '2023-03-31 20:19:38', '0000-00-00 00:00:00', 26);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_details`
--

CREATE TABLE `tbl_quiz_details` (
  `id` int(11) NOT NULL,
  `quiz_id` varchar(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `terms_conditions` varchar(3000) NOT NULL,
  `duration` int(10) NOT NULL,
  `total_question` int(10) NOT NULL,
  `total_mark` int(10) NOT NULL,
  `availability_id` int(1) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `quiz_level_id` varchar(10) NOT NULL,
  `que_bank_id` int(11) NOT NULL,
  `banner_img` varchar(100) NOT NULL,
  `language_id` varchar(10) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modify_by` int(11) NOT NULL,
  `modify_on` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_quiz_details`
--

INSERT INTO `tbl_quiz_details` (`id`, `quiz_id`, `title`, `description`, `terms_conditions`, `duration`, `total_question`, `total_mark`, `availability_id`, `created_on`, `start_date`, `end_date`, `start_time`, `end_time`, `quiz_level_id`, `que_bank_id`, `banner_img`, `language_id`, `remark`, `status`, `created_by`, `modify_by`, `modify_on`) VALUES
(1, '033023UBFT', 'xfbcxc', '<p>cv cvb</p>\r\n', '<p>cvbcvb</p>\r\n', 30, 30, 30, 1, '2023-03-30 12:55:27', '2023-03-23', '2023-03-29', '11:30:00', '17:52:00', '1', 1, 'uploads/quiz_img/1680161265quiz_banner_imgcurl error bis.jpg', '1', '', '5', 26, 26, '2023-03-30 : 01:23:44'),
(2, '0330233qWR', 'Gowardhan Quiz', '<p><strong>For me, my school is more than simply an educational institution; it is also my second family, which I established during my chil</strong>dhood. A family of wonderful friends, outstanding teachers, and fond school memories. I adore my school because it is where I learn how to be a good citizen and how to reach my goals.</p>\r\n', '<p><strong>For me, my school is more than simply an educational instit</strong>ution; it is also my second family, which I established during my childhood. A family of wonderful friends, outstanding teachers, and fond school memories. I adore my school because it is where I learn how to be a good citizen and how to reach my goals.</p>\r\n', 30, 30, 30, 1, '2023-03-30 20:44:32', '2023-03-30', '2023-03-24', '10:30:00', '10:30:00', '1', 2, 'uploads/quiz_img/1680189272quiz_banner_img1- jpg50kb.jpg', '1', '', '5', 26, 26, '2023-03-30 : 03:33:06'),
(3, '033123eKns', 'General Knowledge QUIz', '<p>This quiz is for gk quiz&nbsp;</p>\r\n', '<p>please participate into the quiz</p>\r\n', 5, 5, 5, 1, '2023-03-31 13:37:15', '2023-03-31', '2023-04-01', '15:25:00', '02:00:00', '2', 6, 'uploads/quiz_img/1680250035quiz_banner_img1344.png', '1', '', '6', 26, 26, '2023-03-31 : 08:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_result`
--

CREATE TABLE `tbl_quiz_result` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_quiz`
--

CREATE TABLE `tbl_user_quiz` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `selected_op` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_quiz`
--

INSERT INTO `tbl_user_quiz` (`id`, `user_id`, `quiz_id`, `ques_id`, `selected_op`) VALUES
(1, 1, 2, 3, 1),
(2, 1, 2, 2, 1),
(3, 1, 2, 4, 1),
(4, 1, 2, 3, 1),
(5, 1, 2, 2, 2),
(6, 1, 2, 4, 1),
(7, 1, 2, 7, 1),
(8, 1, 2, 6, 1),
(9, 1, 2, 8, 2),
(10, 1, 2, 4, 1),
(11, 1, 2, 5, 0),
(12, 1, 2, 6, 0),
(13, 1, 2, 7, 1),
(14, 1, 2, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_quiztime_details`
--

CREATE TABLE `tbl_user_quiztime_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_quiztime_details`
--

INSERT INTO `tbl_user_quiztime_details` (`id`, `user_id`, `quiz_id`, `start_time`, `end_time`, `created_on`) VALUES
(1, 1, 1, '02:12:56', '02:12:56', '2023-04-01 02:13:13'),
(2, 1, 1, '02:12:56', '02:12:56', '2023-04-01 02:14:30'),
(3, 1, 1, '02:12:56', '10:45:25', '2023-04-01 02:15:25'),
(4, 1, 1, '02:12:56', '02:15:57', '2023-04-01 02:15:57'),
(5, 1, 1, '02:12:56', '02:17:56', '2023-04-01 02:17:56'),
(6, 1, 1, '02:42:41', '02:43:18', '2023-04-01 02:43:18'),
(7, 1, 1, '02:42:41', '02:44:18', '2023-04-01 02:44:18'),
(8, 1, 1, '02:42:41', '02:44:42', '2023-04-01 02:44:42'),
(9, 1, 1, '02:42:41', '02:44:58', '2023-04-01 02:44:58'),
(10, 1, 1, '02:42:41', '02:45:04', '2023-04-01 02:45:04'),
(11, 1, 1, '02:42:41', '02:47:08', '2023-04-01 02:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_videos`
--

CREATE TABLE `tbl_videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wall_of_wisdom`
--

CREATE TABLE `tbl_wall_of_wisdom` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wall_of_wisdom`
--

INSERT INTO `tbl_wall_of_wisdom` (`id`, `title`, `description`, `image`, `status`) VALUES
(2, 'hgyjyg', 'hjgjhghj', '', 'created'),
(12, 'asdf', 'dzgdhf', '', 'created'),
(9, 'qwer', 'adsgadf', 'Admin_PIC_1679575475.jpg', 'created'),
(15, 'hjghj', 'jjhjmbn', 'Admin_PIC_1679985425.jpg', 'created'),
(7, 'fdsadf', 'asdfasdf', '', '5'),
(13, 'title', 'description', 'Admin_PIC_1679912406.jpg', '5'),
(17, 'created by subadmin', 'sdvcsdvsd', 'Admin_PIC_1680183040.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_your_wall`
--

CREATE TABLE `tbl_your_wall` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_your_wall`
--

INSERT INTO `tbl_your_wall` (`id`, `user_id`, `title`, `description`, `image`, `status`, `created_on`) VALUES
(13, 14, 'title', 'description CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web ...CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web ...CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web ...CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web ...CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web ...CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web ...CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web ...CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web ...', 'yourwall1679912624.jpg', '6', '2023-03-27 10:23:44'),
(15, 14, 'kjhjkhkjh', 'jjhghj', 'yourwall1679991581.jpg', '5', '2023-03-28 08:19:41'),
(14, 14, 'jhgjhg', 'zxvc', 'yourwall1679968423.jpg', '5', '2023-03-28 01:53:43'),
(16, 14, 'Akshay', 'alskshdgdyat', 'yourwall1679994034.jpg', '6', '2023-03-28 09:00:34'),
(17, 26, 'Anish', 'cfh ergre et ewtretyreetret ertretreterre  gfdhfdhfdhf dfgfdgfdhgfdg ', 'yourwall1680192131.jpg', '5', '2023-03-30 16:02:11'),
(18, 26, 'Akshay', 'xfbfdg rthtrjhtr rthtrj', 'yourwall1680192318.jpg', '5', '2023-03-30 16:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `useful_links`
--

CREATE TABLE `useful_links` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about_exchange_forum`
--
ALTER TABLE `tbl_about_exchange_forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `tbl_banner_img`
--
ALTER TABLE `tbl_banner_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_by_the_mentors`
--
ALTER TABLE `tbl_by_the_mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact_us_detail`
--
ALTER TABLE `tbl_contact_us_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_follow_us_link`
--
ALTER TABLE `tbl_follow_us_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_legel`
--
ALTER TABLE `tbl_legel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mst_admin_role`
--
ALTER TABLE `tbl_mst_admin_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_mst_language`
--
ALTER TABLE `tbl_mst_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mst_prizes`
--
ALTER TABLE `tbl_mst_prizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mst_quiz_availability`
--
ALTER TABLE `tbl_mst_quiz_availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mst_quiz_level`
--
ALTER TABLE `tbl_mst_quiz_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mst_status`
--
ALTER TABLE `tbl_mst_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mst_user_roles`
--
ALTER TABLE `tbl_mst_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_photos`
--
ALTER TABLE `tbl_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_prizes`
--
ALTER TABLE `tbl_prizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_que_bank`
--
ALTER TABLE `tbl_que_bank`
  ADD PRIMARY KEY (`que_bank_id`);

--
-- Indexes for table `tbl_que_details`
--
ALTER TABLE `tbl_que_details`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `tbl_quiz_details`
--
ALTER TABLE `tbl_quiz_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_quiz_result`
--
ALTER TABLE `tbl_quiz_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_quiz`
--
ALTER TABLE `tbl_user_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_quiztime_details`
--
ALTER TABLE `tbl_user_quiztime_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_videos`
--
ALTER TABLE `tbl_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wall_of_wisdom`
--
ALTER TABLE `tbl_wall_of_wisdom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_your_wall`
--
ALTER TABLE `tbl_your_wall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useful_links`
--
ALTER TABLE `useful_links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about_exchange_forum`
--
ALTER TABLE `tbl_about_exchange_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_banner_img`
--
ALTER TABLE `tbl_banner_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_by_the_mentors`
--
ALTER TABLE `tbl_by_the_mentors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_contact_us_detail`
--
ALTER TABLE `tbl_contact_us_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_follow_us_link`
--
ALTER TABLE `tbl_follow_us_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_legel`
--
ALTER TABLE `tbl_legel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_mst_admin_role`
--
ALTER TABLE `tbl_mst_admin_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_mst_language`
--
ALTER TABLE `tbl_mst_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_mst_prizes`
--
ALTER TABLE `tbl_mst_prizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_mst_quiz_availability`
--
ALTER TABLE `tbl_mst_quiz_availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_mst_quiz_level`
--
ALTER TABLE `tbl_mst_quiz_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_mst_status`
--
ALTER TABLE `tbl_mst_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_mst_user_roles`
--
ALTER TABLE `tbl_mst_user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_photos`
--
ALTER TABLE `tbl_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_prizes`
--
ALTER TABLE `tbl_prizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_que_bank`
--
ALTER TABLE `tbl_que_bank`
  MODIFY `que_bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_que_details`
--
ALTER TABLE `tbl_que_details`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_quiz_details`
--
ALTER TABLE `tbl_quiz_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_quiz_result`
--
ALTER TABLE `tbl_quiz_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user_quiz`
--
ALTER TABLE `tbl_user_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_user_quiztime_details`
--
ALTER TABLE `tbl_user_quiztime_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_videos`
--
ALTER TABLE `tbl_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_wall_of_wisdom`
--
ALTER TABLE `tbl_wall_of_wisdom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_your_wall`
--
ALTER TABLE `tbl_your_wall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `useful_links`
--
ALTER TABLE `useful_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
