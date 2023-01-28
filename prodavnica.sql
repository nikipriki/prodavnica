-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 10:22 PM
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
-- Database: `prodavnica`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorije` (
  `id` int(11) NOT NULL,
  `naziv` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorije` (`id`, `naziv`) VALUES
(0, 'voće'),
(1, 'voće'),
(2, 'povrće');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id` int(11) NOT NULL,
  `naziv` varchar(12) NOT NULL,
  `cat_ID` int(11) NOT NULL,
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`id`, `naziv`, `cat_ID`) VALUES
(1, 'banane', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_ID` (`cat_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
