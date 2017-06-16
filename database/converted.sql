-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2017 at 12:22 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `numconverter`
--

-- --------------------------------------------------------

--
-- Table structure for table `converted`
--

CREATE TABLE `converted` (
  `con_id` int(11) NOT NULL,
  `con_num` varchar(200) NOT NULL,
  `con_num_result` varchar(200) NOT NULL,
  `con_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `converted`
--

INSERT INTO `converted` (`con_id`, `con_num`, `con_num_result`, `con_date_time`) VALUES
(1, '20', 'XX', '2017-06-16 20:51:46'),
(2, '001', 'I', '2017-06-16 20:52:03'),
(3, '200', 'CC', '2017-06-16 20:52:20'),
(4, '34', 'XXXIV', '2017-06-16 20:52:53'),
(5, '10', 'X', '2017-06-16 20:53:45'),
(6, '2000', 'MM', '2017-06-16 20:54:04'),
(7, '100', 'C', '2017-06-16 20:54:10'),
(8, '13', 'XIII', '2017-06-16 20:54:14'),
(9, '234', 'CCXXXIV', '2017-06-16 20:54:19'),
(10, '250', 'CCL', '2017-06-16 20:54:24'),
(11, '270', 'CCLXX', '2017-06-16 20:54:31'),
(12, '111', 'CXI', '2017-06-16 20:54:35'),
(13, '300', 'CCC', '2017-06-16 20:55:09'),
(14, '450', 'CDL', '2017-06-16 20:55:17'),
(15, '32', 'XXXII', '2017-06-16 20:55:24'),
(16, '3999', 'MMMCMXCIX', '2017-06-16 21:32:43'),
(17, '3998', 'MMMCMXCVIII', '2017-06-16 21:34:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `converted`
--
ALTER TABLE `converted`
  ADD PRIMARY KEY (`con_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `converted`
--
ALTER TABLE `converted`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
