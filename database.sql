-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: 10.169.0.138
-- Generation Time: May 16, 2017 at 07:55 AM
-- Server version: 5.7.16
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `readytoi_spider`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(3) NOT NULL,
  `client` varchar(50) NOT NULL,
  `rhEmail` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `region` varchar(20) NOT NULL,
  `lob` varchar(100) NOT NULL,
  `o1` int(1) NOT NULL,
  `o2` int(1) NOT NULL,
  `o3` int(1) NOT NULL,
  `o4` int(1) NOT NULL,
  `o5` int(1) NOT NULL,
  `d1` int(1) NOT NULL,
  `d2` int(1) NOT NULL,
  `d3` int(1) NOT NULL,
  `d4` int(1) NOT NULL,
  `d5` int(1) NOT NULL,
  `hash` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hash` (`hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
