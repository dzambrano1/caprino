-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2025 at 02:49 AM
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
-- Table structure for table `cc_melaza`
--

CREATE TABLE `cc_melaza` (
  `id` int(11) NOT NULL,
  `cc_melaza_nombre` varchar(30) NOT NULL,
  `cc_melaza_etapa` varchar(30) NOT NULL,
  `cc_melaza_racion` decimal(10,2) NOT NULL,
  `cc_melaza_costo` decimal(10,2) NOT NULL,
  `cc_melaza_vigencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cc_melaza`
--

INSERT INTO `cc_melaza` (`id`, `cc_melaza_nombre`, `cc_melaza_etapa`, `cc_melaza_racion`, `cc_melaza_costo`, `cc_melaza_vigencia`) VALUES
(1, 'Central Portuguesa', 'Lactancia (0–60 días)', 1.53, 2.35, 30),
(3, 'La Blanquita', 'Gestación', 0.90, 0.90, 32),
(5, 'Minferca', 'Crecimiento (120–240 días)', 0.85, 0.65, 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc_melaza`
--
ALTER TABLE `cc_melaza`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cc_melaza`
--
ALTER TABLE `cc_melaza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
