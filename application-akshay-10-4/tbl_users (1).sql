-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 09:45 PM
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
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `emp_no` varchar(100) NOT NULL,
  `emp_desi_id` varchar(100) NOT NULL,
  `emp_desi` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_title` varchar(50) NOT NULL,
  `user_doc_no` varchar(100) NOT NULL,
  `date_of_birth` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_mobile` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `member_id` varchar(100) NOT NULL,
  `standard_club_id` varchar(10) NOT NULL,
  `standard_club_name` varchar(100) NOT NULL,
  `standard_club_branch_id` varchar(10) NOT NULL,
  `standard_club_dept_id` varchar(10) NOT NULL,
  `standard_club_region` varchar(10) NOT NULL,
  `assigned_comm` varchar(100) NOT NULL,
  `comm_id` varchar(10) NOT NULL,
  `comm_name` varchar(100) NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_id`, `emp_no`, `emp_desi_id`, `emp_desi`, `user_name`, `user_title`, `user_doc_no`, `date_of_birth`, `email`, `user_mobile`, `role`, `user_type`, `member_id`, `standard_club_id`, `standard_club_name`, `standard_club_branch_id`, `standard_club_dept_id`, `standard_club_region`, `assigned_comm`, `comm_id`, `comm_name`, `created_on`) VALUES
(1, '1', 'mdlfsd132sd', '1321', 'Developer', 'Govardhan Jangale', 'Mr.', '2', '01-10-1994', 'govardhan@gmail.com', '8007803727', '4', '4', '231', '1', 'Public', '1', '12', '21', '12', '32', 'vdv', '2023-04-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
