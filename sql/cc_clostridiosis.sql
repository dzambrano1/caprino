-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2025 at 02:45 AM
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
-- Table structure for table `cc_clostridiosis`
--

CREATE TABLE `cc_clostridiosis` (
  `id` int(11) NOT NULL,
  `cc_clostridiosis_vacuna` varchar(30) NOT NULL,
  `cc_clostridiosis_dosis` decimal(10,2) NOT NULL,
  `cc_clostridiosis_costo` decimal(10,2) NOT NULL,
  `cc_clostridiosis_vigencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cc_clostridiosis`
--

INSERT INTO `cc_clostridiosis` (`id`, `cc_clostridiosis_vacuna`, `cc_clostridiosis_dosis`, `cc_clostridiosis_costo`, `cc_clostridiosis_vigencia`) VALUES
(1, 'Clostri FORTE 10', 2.00, 0.94, 180);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc_clostridiosis`
--
ALTER TABLE `cc_clostridiosis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cc_clostridiosis`
--
ALTER TABLE `cc_clostridiosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
