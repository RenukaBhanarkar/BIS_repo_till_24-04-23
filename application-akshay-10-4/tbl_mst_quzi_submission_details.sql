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
-- Table structure for table `tbl_mst_quzi_submission_details`
--

CREATE TABLE `tbl_mst_quzi_submission_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `total_question` int(11) NOT NULL,
  `total_mark` int(11) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL,
  `correct_ques` int(11) NOT NULL,
  `wrong_ques` int(11) NOT NULL,
  `not_ans_ques` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mst_quzi_submission_details`
--

INSERT INTO `tbl_mst_quzi_submission_details` (`id`, `user_id`, `quiz_id`, `total_question`, `total_mark`, `start_time`, `end_time`, `correct_ques`, `wrong_ques`, `not_ans_ques`, `score`, `created_on`) VALUES
(1, 1, 1, 3, 6, '12:22:36', '12:22:52', 3, 0, 0, 2, '2023-04-02 00:22:52'),
(2, 1, 1, 3, 6, '12:34:33', '12:34:42', 1, 5, 3, 2, '2023-04-02 00:34:42'),
(3, 1, 1, 3, 6, '01:01:01', '01:01:46', 1, 8, 6, 2, '2023-04-02 01:01:46'),
(4, 1, 1, 3, 6, '01:01:51', '01:01:54', 1, 11, 9, 2, '2023-04-02 01:01:54'),
(5, 1, 1, 3, 6, '11:43:34', '11:43:51', 1, 14, 9, 2, '2023-04-02 11:43:51'),
(6, 1, 2, 2, 10, '12:10:22', '12:10:40', 1, 1, 0, 5, '2023-04-02 12:10:40'),
(7, 1, 1, 3, 6, '02:37:53', '02:38:02', 1, 17, 9, 2, '2023-04-05 02:38:02'),
(8, 1, 1, 3, 6, '02:46:44', '02:46:59', 2, 19, 9, 4, '2023-04-05 02:46:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_mst_quzi_submission_details`
--
ALTER TABLE `tbl_mst_quzi_submission_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_mst_quzi_submission_details`
--
ALTER TABLE `tbl_mst_quzi_submission_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
