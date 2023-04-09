-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 03:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quadex`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(100) NOT NULL,
  `questions_no` int(100) NOT NULL,
  `question` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `opt1` varchar(250) NOT NULL,
  `opt2` varchar(250) NOT NULL,
  `opt3` varchar(250) NOT NULL,
  `opt4` text NOT NULL,
  `category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `questions_no`, `question`, `answer`, `opt1`, `opt2`, `opt3`, `opt4`, `category`) VALUES
(4, 1, '<p>3</p>\r\n', '<p>3</p>\r\n', '<p>3</p>\r\n', '<p>3</p>\r\n', '<p>3</p>\r\n', '<p>3</p>\r\n', 'Diagnostic'),
(5, 1, '<p>33</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', 'Diagnostic'),
(6, 2, '<p>33</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', 'Diagnostic'),
(7, 3, '<p>33</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', 'Diagnostic'),
(8, 4, '<p>33</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', 'Diagnostic'),
(9, 5, '<p>33</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', 'Diagnostic'),
(10, 6, '<p>33</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', 'Diagnostic'),
(11, 7, '<p>33</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', '<p>1</p>\r\n', 'Diagnostic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
