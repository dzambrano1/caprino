-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2025 at 02:51 AM
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
-- Table structure for table `cc_tetanos`
--

CREATE TABLE `cc_tetanos` (
  `id` int(11) NOT NULL,
  `cc_tetanos_vacuna` varchar(30) NOT NULL,
  `cc_tetanos_dosis` decimal(10,2) NOT NULL,
  `cc_tetanos_costo` decimal(10,2) NOT NULL,
  `cc_tetanos_vigencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cc_tetanos`
--

INSERT INTO `cc_tetanos` (`id`, `cc_tetanos_vacuna`, `cc_tetanos_dosis`, `cc_tetanos_costo`, `cc_tetanos_vigencia`) VALUES
(1, 'Combibac r8', 2.00, 0.80, 180);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc_tetanos`
--
ALTER TABLE `cc_tetanos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cc_tetanos`
--
ALTER TABLE `cc_tetanos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
