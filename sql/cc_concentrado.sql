-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2025 at 02:46 AM
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
-- Table structure for table `cc_concentrado`
--

CREATE TABLE `cc_concentrado` (
  `id` int(11) NOT NULL,
  `cc_concentrado_nombre` varchar(30) NOT NULL,
  `cc_concentrado_etapa` varchar(30) NOT NULL,
  `cc_concentrado_racion` decimal(10,2) NOT NULL,
  `cc_concentrado_costo` decimal(10,2) NOT NULL,
  `cc_concentrado_vigencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cc_concentrado`
--

INSERT INTO `cc_concentrado` (`id`, `cc_concentrado_nombre`, `cc_concentrado_etapa`, `cc_concentrado_racion`, `cc_concentrado_costo`, `cc_concentrado_vigencia`) VALUES
(1, 'Corpoagro', 'Lactancia (Madres)', 1.53, 2.35, 30),
(3, 'Mersan', 'Crecimiento (120–240 días)', 0.90, 0.90, 32),
(5, 'Colaca', 'Gestación', 0.85, 0.65, 33),
(6, 'Agropecuaria La Montaña', 'Destete (60–120 días)', 0.85, 0.65, 33),
(7, 'NutriZulia', 'Reproduccion (240 días–1 año)', 0.85, 0.65, 33),
(8, 'Agropecuaria El Roble', 'Crecimiento (120–240 días)', 0.85, 0.65, 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc_concentrado`
--
ALTER TABLE `cc_concentrado`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cc_concentrado`
--
ALTER TABLE `cc_concentrado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
