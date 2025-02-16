-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 06:01 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

Create database if not exists `student_project_detail`;
use `student_project_detail`;
DROP TABLE IF EXISTS users;



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_project_detail`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `row_id` text NOT NULL,
  `roll` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `title` text NOT NULL,
  `domain` text NOT NULL,
  `fmentor` text NOT NULL,
  `indmentor` text NOT NULL,
  `ppt` text NOT NULL,
  `presentation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `row_id`, `roll`, `name`, `email`, `phone`, `title`, `domain`, `fmentor`, `indmentor`, `ppt`, `presentation`) VALUES 
(1, 'ghjffdzdnbs', '101', 'Code With Mark', 'mark@codewithmark.com', '1234567890', 'Developer', 'Web', 'John Doe', 'Jane Doe', 'Yes', 'Final'),
(2, '6dnbivsj1l5', '102', 'May Johnson', 'mary@gmail.com', '9876543210', 'Designer', 'Graphics', 'Alice', 'Bob', 'No', 'Pending'),
(3, 'u0i4121mkd', '103', 'John Doe', 'john@yahoo.com', '1122334455', 'Engineer', 'Software', 'Eve', 'Charlie', 'Yes', 'Completed'),
(4, 'sz8br0v17s7', '104', 'Julie Smith', 'julie@gmail.com', '6677889900', 'Manager', 'HR', 'Mike', 'Sara', 'No', 'Not Started');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
