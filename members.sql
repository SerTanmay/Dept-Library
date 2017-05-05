-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 02:14 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `members`
--

-- --------------------------------------------------------

--
-- Table structure for table `memdetails`
--

CREATE TABLE `memdetails` (
  `mem_id` int(11) NOT NULL,
  `mem_name` varchar(20) NOT NULL,
  `books_issued` int(11) DEFAULT NULL,
  `bid1` int(11) DEFAULT NULL,
  `bid2` int(11) DEFAULT NULL,
  `bid3` int(11) DEFAULT NULL,
  `bid4` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memdetails`
--

INSERT INTO `memdetails` (`mem_id`, `mem_name`, `books_issued`, `bid1`, `bid2`, `bid3`, `bid4`) VALUES
(59, 'Tanmay', 4, 45, 3, 1, 2),
(9, 'Shalakha', 0, NULL, NULL, NULL, NULL),
(58, 'Pratik', 1, 45, NULL, NULL, NULL),
(67, 'Rajiv', 1, 45, NULL, NULL, NULL),
(2, 'Melwyn', 1, 45, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `memdetails`
--
ALTER TABLE `memdetails`
  ADD PRIMARY KEY (`mem_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
