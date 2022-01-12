-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2021 at 10:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mathare`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` varchar(200) NOT NULL DEFAULT 'Opened',
  `addedby` varchar(200) NOT NULL,
  `clientname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `type`, `description`, `created`, `active`, `addedby`, `clientname`) VALUES
(11, '', '', '2021-08-12 22:07:42', '0', '', ''),
(13, '', 'uyyyuuiyiyyuyuyuuiuiyyui', '2021-08-12 22:08:56', '0', '', ''),
(15, '', 'stole everything ik had', '2021-08-12 22:09:33', '0', '', ''),
(23, 'Other', '23345', '2021-08-12 22:37:49', '0', '', ''),
(24, 'Other', 'hggyuyuyu', '2021-08-12 22:39:21', '0', '', ''),
(25, 'Other', '23345', '2021-08-12 22:39:38', '0', '', ''),
(26, 'Other', 'dedsddsdsddsdsd', '2021-08-13 06:09:36', '0', '', ''),
(27, 'Other', 'dedsddsdsddsdsd', '2021-08-13 06:09:59', '0', '', ''),
(28, 'Other', 'dsddsddsddsdsdss', '2021-08-13 06:45:16', 'Closed', 'sam', ''),
(29, 'Theft', 'sddsdsdsddsdsdss', '2021-08-13 07:16:06', 'Closed', 'sam', 'samwel k'),
(30, 'Theft', 'Stole phone', '2021-08-13 07:28:59', 'Opened', 'sam', 'test case name'),
(31, 'Theft', 'sddsdsdsdsds', '2021-08-13 07:49:04', 'Opened', 'test', 'test client'),
(32, 'Other', 'sdsdsddsds', '2021-08-13 08:07:36', 'Opened', 'test', 'sk');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `telephone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `account` varchar(200) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `username`, `password`, `created_at`, `telephone`, `address`, `town`, `account`) VALUES
(15, 'sam', '$2y$10$Ed7Z1XQ2DbDIivCQia02XeDrzwvFG8li3I2lhguT6E94FjgfTChK2', '2021-08-13 00:26:28', '078676906', 'dssdsds', 'dssdsds', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `telephone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `account` varchar(200) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `created_at`, `telephone`, `address`, `type`, `account`) VALUES
(4, 'sam', '$2y$10$MerPjQ8m853dko24YDxFJOAlD4HtdF8S0fgJvlynx55QKWlSdiUpO', '2021-08-13 10:00:09', '078676906', 'kajiado', 'Admin', 'active'),
(5, 'test', '$2y$10$X15SgWtnBW.fQNAHjvl/C.wBm43ECAslu5xKF.kyE7YA8N.9szMxS', '2021-08-13 10:47:19', '078676906', 'dssddsd', 'Staff', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
