-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 09:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `tbl_inconversation_with_expert`
--

CREATE TABLE `tbl_inconversation_with_expert` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `video_thumbnail` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_on` varchar(100) NOT NULL,
  `updated_on` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inconversation_with_expert`
--

INSERT INTO `tbl_inconversation_with_expert` (`id`, `title`, `description`, `video_thumbnail`, `video`, `status`, `created_on`, `updated_on`) VALUES
(5, 'test', 'test', 'uploads/conversation_form/video_thumbnail/1681031492video_thumbnailc1.jpg', 'uploads/conversation_form/video/1681031257videoc2.jpg', 5, '2023-04-09', NULL),
(6, 'tewt', 'rewr', 'uploads/conversation_form/video_thumbnail/1681037003video_thumbnailabout.jpg', 'uploads/conversation_form/video/1681037003video❤Sweet_Feeling_Love_Status_Video❤(720p).mp4', 5, '2023-04-09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_inconversation_with_expert`
--
ALTER TABLE `tbl_inconversation_with_expert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_inconversation_with_expert`
--
ALTER TABLE `tbl_inconversation_with_expert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
