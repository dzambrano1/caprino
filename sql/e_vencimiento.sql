-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2025 at 04:26 AM
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
-- Table structure for table `e_vencimiento`
--

CREATE TABLE `e_vencimiento` (
  `id` int(11) NOT NULL,
  `e_vencimiento_pesaje_animal` int(11) NOT NULL,
  `e_vencimiento_pesaje_leche` int(11) NOT NULL,
  `e_vencimiento_concentrado` int(11) NOT NULL,
  `e_vencimiento_melaza` int(11) NOT NULL,
  `e_vencimiento_sal` int(11) NOT NULL,
  `e_vencimiento_aftosa` int(11) NOT NULL,
  `e_vencimiento_brucelosis` int(11) NOT NULL,
  `e_vencimiento_ibr` int(11) NOT NULL,
  `e_vencimiento_cbr` int(11) NOT NULL,
  `e_vencimiento_inseminacion` int(11) NOT NULL,
  `e_vencimiento_carbunco` int(11) NOT NULL,
  `e_vencimiento_garrapatas` int(11) NOT NULL,
  `e_vencimiento_lombrices` int(11) NOT NULL,
  `e_vencimiento_parasitos` int(11) NOT NULL,
  `e_vencimiento_gestacion` int(11) NOT NULL,
  `e_vencimiento_parto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_vencimiento`
--

INSERT INTO `e_vencimiento` (`id`, `e_vencimiento_pesaje_animal`, `e_vencimiento_pesaje_leche`, `e_vencimiento_concentrado`, `e_vencimiento_melaza`, `e_vencimiento_sal`, `e_vencimiento_aftosa`, `e_vencimiento_brucelosis`, `e_vencimiento_ibr`, `e_vencimiento_cbr`, `e_vencimiento_inseminacion`, `e_vencimiento_carbunco`, `e_vencimiento_garrapatas`, `e_vencimiento_lombrices`, `e_vencimiento_parasitos`, `e_vencimiento_gestacion`, `e_vencimiento_parto`) VALUES
(1, 30, 30, 30, 30, 30, 180, 180, 180, 180, 30, 180, 90, 90, 90, 283, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `e_vencimiento`
--
ALTER TABLE `e_vencimiento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `e_vencimiento`
--
ALTER TABLE `e_vencimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
