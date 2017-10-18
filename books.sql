-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2017 at 08:17 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--
-- --------------------------------------------------------

--
-- Table structure for table `bookdetails`
--
USE books;
CREATE TABLE `bookdetails` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `author` varchar(20) NOT NULL,
  `avail` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookdetails`
--

INSERT INTO `bookdetails` (`book_id`, `book_name`, `author`, `avail`) VALUES
(1, 'Intro to Algorithms', 'CLRS', 'YES'),
(2, 'C++ How To', 'Deitel', 'YES'),
(3, 'SAD', 'Awad', 'YES'),
(45, 'OOPD in C++', 'Lafore', 'YES'),
(23, 'EM', 'Cooper', 'YES');

-- --------------------------------------------------------

--
-- Stand-in structure for view `books_view`
-- (See below for the actual view)
--
CREATE TABLE `books_view` (
);

-- --------------------------------------------------------

--
-- Structure for view `books_view`
--
DROP TABLE IF EXISTS `books_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `books_view`  AS  select `bookdetails`.`book_id` AS `book_id`,`bookdetails`.`book_name` AS `book_name`,`bookdetails`.`author` AS `author`,`bookdetails`.`no_of_books` AS `no_of_books` from `bookdetails` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookdetails`
--
ALTER TABLE `bookdetails`
  ADD PRIMARY KEY (`book_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
