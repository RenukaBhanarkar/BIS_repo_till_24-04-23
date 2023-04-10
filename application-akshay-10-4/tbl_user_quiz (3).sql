-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 09:44 PM
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
-- Table structure for table `tbl_user_quiz`
--

CREATE TABLE `tbl_user_quiz` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `selected_op` int(11) DEFAULT NULL,
  `corr_opt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_quiz`
--

INSERT INTO `tbl_user_quiz` (`id`, `user_id`, `quiz_id`, `ques_id`, `selected_op`, `corr_opt`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 1, 1, 2, 2, 3),
(3, 1, 1, 7, 2, 3),
(4, 1, 1, 1, 0, 1),
(5, 1, 1, 2, 0, 3),
(6, 1, 1, 7, 0, 3),
(7, 1, 1, 2, 0, 3),
(8, 1, 1, 7, 0, 3),
(9, 1, 1, 1, 0, 1),
(10, 1, 1, 2, 0, 3),
(11, 1, 1, 7, 0, 3),
(12, 1, 1, 1, 0, 1),
(13, 1, 1, 7, 1, 3),
(14, 1, 1, 2, 1, 3),
(15, 1, 1, 1, 2, 1),
(16, 1, 2, 11, 1, 2),
(17, 1, 2, 10, 1, 1),
(18, 1, 1, 7, 1, 3),
(19, 1, 1, 1, 2, 1),
(20, 1, 1, 2, 2, 3),
(21, 1, 1, 1, 2, 1),
(22, 1, 1, 2, 1, 3),
(23, 1, 1, 7, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user_quiz`
--
ALTER TABLE `tbl_user_quiz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user_quiz`
--
ALTER TABLE `tbl_user_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
