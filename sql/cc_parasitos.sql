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
-- Table structure for table `cc_parasitos`
--

CREATE TABLE `cc_parasitos` (
  `id` int(11) NOT NULL,
  `cc_parasitos_vacuna` varchar(30) NOT NULL,
  `cc_parasitos_dosis` decimal(10,2) NOT NULL,
  `cc_parasitos_costo` decimal(10,2) NOT NULL,
  `cc_parasitos_vigencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cc_parasitos`
--

INSERT INTO `cc_parasitos` (`id`, `cc_parasitos_vacuna`, `cc_parasitos_dosis`, `cc_parasitos_costo`, `cc_parasitos_vigencia`) VALUES
(1, 'Eprecis®', 2.00, 0.20, 180),
(2, 'Safeguard® / Panacur®	', 2.00, 0.80, 180),
(3, 'Valbazen', 2.00, 0.80, 180),
(4, 'Synanthic®', 2.00, 0.80, 180),
(5, 'Trivermax Gold® 3.15%', 2.00, 0.80, 180);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc_parasitos`
--
ALTER TABLE `cc_parasitos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cc_parasitos`
--
ALTER TABLE `cc_parasitos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
