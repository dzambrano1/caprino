-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2025 at 02:57 AM
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
-- Table structure for table `ch_parasitos`
--

CREATE TABLE `ch_parasitos` (
  `id` int(11) NOT NULL,
  `ch_parasitos_tagid` varchar(10) NOT NULL,
  `ch_parasitos_producto` varchar(50) NOT NULL,
  `ch_parasitos_dosis` decimal(10,2) NOT NULL,
  `ch_parasitos_costo` decimal(10,2) NOT NULL,
  `ch_parasitos_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ch_parasitos`
--

INSERT INTO `ch_parasitos` (`id`, `ch_parasitos_tagid`, `ch_parasitos_producto`, `ch_parasitos_dosis`, `ch_parasitos_costo`, `ch_parasitos_fecha`) VALUES
(1, '3000', 'Trivermax Gold® 3.15%', 1.10, 5.10, '2025-01-06'),
(3, '3000', 'Trivermax Gold® 3.15%', 1.11, 1.00, '2025-01-12'),
(6, '4000', 'Trivermax Gold® 3.15%', 2.00, 1.00, '2025-03-18'),
(7, '9500', 'Trivermax Gold® 3.15%', 1.00, 1.10, '2025-05-01'),
(8, '10000', 'Synanthic®', 5.00, 5.00, '2025-06-06'),
(9, '12345', 'Synanthic®', 5.00, 5.00, '2025-06-06'),
(10, '15500', 'Synanthic®', 5.00, 5.00, '2025-06-06'),
(11, '20000', 'Synanthic®', 4.00, 4.00, '2025-06-06'),
(12, '21214', 'Valbazen®	', 4.00, 5.00, '2025-06-06'),
(13, '22000', 'Valbazen®	', 5.00, 5.00, '2025-06-06'),
(14, '2222', 'Valbazen®	', 5.00, 5.00, '2025-06-06'),
(15, '4001', 'Valbazen®	', 5.00, 5.00, '2025-06-06'),
(16, '23500', 'Valbazen®	', 5.00, 5.00, '2025-06-06'),
(17, '599', 'Valbazen®	', 5.00, 5.00, '2025-06-06'),
(18, '33000', 'Valbazen®	', 5.00, 5.00, '2025-06-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ch_parasitos`
--
ALTER TABLE `ch_parasitos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ch_parasitos`
--
ALTER TABLE `ch_parasitos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
