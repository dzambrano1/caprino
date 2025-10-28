-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2025 at 04:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ganagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `ch_descarte`
--

CREATE TABLE `ch_descarte` (
  `id` int(11) NOT NULL,
  `ch_descarte_tagid` varchar(10) NOT NULL,
  `ch_descarte_peso` decimal(10,2) NOT NULL,
  `ch_descarte_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ch_descarte`
--

INSERT INTO `ch_descarte` (`id`, `ch_descarte_tagid`, `ch_descarte_peso`, `ch_descarte_fecha`) VALUES
(3, '3000', 300.00, '2025-02-04'),
(6, '3000', 250.00, '2025-03-16'),
(7, '4000', 333.00, '2025-03-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ch_descarte`
--
ALTER TABLE `ch_descarte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ch_descarte`
--
ALTER TABLE `ch_descarte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
