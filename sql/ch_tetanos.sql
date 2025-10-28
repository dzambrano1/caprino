-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2025 at 03:00 AM
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
-- Table structure for table `ch_tetanos`
--

CREATE TABLE `ch_tetanos` (
  `id` int(11) NOT NULL,
  `ch_tetanos_tagid` varchar(10) NOT NULL,
  `ch_tetanos_producto` varchar(50) NOT NULL,
  `ch_tetanos_dosis` decimal(10,2) NOT NULL,
  `ch_tetanos_costo` decimal(10,2) NOT NULL,
  `ch_tetanos_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ch_tetanos`
--

INSERT INTO `ch_tetanos` (`id`, `ch_tetanos_tagid`, `ch_tetanos_producto`, `ch_tetanos_dosis`, `ch_tetanos_costo`, `ch_tetanos_fecha`) VALUES
(1, '3000', 'Combibac r8', 1.50, 10.40, '2023-01-05'),
(2, '3000', 'Combibac r8', 1.55, 11.50, '2024-01-06'),
(4, '3000', 'Combibac r8', 1.55, 10.40, '2025-01-07'),
(6, '3000', 'Combibac r8', 1.50, 10.40, '2023-01-05'),
(7, '3000', 'Combibac r8', 3.00, 1.10, '2025-03-12'),
(8, '3000', 'Combibac r8', 1.00, 4.00, '2025-03-18'),
(10, '5266', 'Combibac r8', 2.00, 0.55, '2025-05-01'),
(12, '10000', 'Combibac r8', 2.00, 2.50, '2025-06-06'),
(13, '12345', 'Combibac r8', 3.00, 2.30, '2025-06-06'),
(14, '15500', 'Combibac r8', 3.00, 3.00, '2025-06-06'),
(15, '20000', 'Combibac r8', 3.00, 3.00, '2025-06-06'),
(16, '21214', 'Combibac r8', 3.00, 2.00, '2025-06-06'),
(17, '22000', 'Combibac r8', 3.00, 2.00, '2025-06-06'),
(18, '2222', 'Combibac r8', 3.00, 3.00, '2025-06-06'),
(19, '23000', 'Combibac r8', 3.00, 2.00, '2025-06-06'),
(20, '23500', 'Combibac r8', 3.00, 3.00, '2025-06-06'),
(21, '24200', 'Combibac r8', 3.00, 4.00, '2025-06-06'),
(22, '24560', 'Combibac r8', 4.00, 3.00, '2025-06-06'),
(23, '27500', 'Combibac r8', 4.00, 3.00, '2025-06-06'),
(24, '33000', 'Combibac r8', 4.00, 3.00, '2025-06-06'),
(25, '4001', 'Combibac r8', 2.00, 3.00, '2025-06-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ch_tetanos`
--
ALTER TABLE `ch_tetanos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ch_tetanos`
--
ALTER TABLE `ch_tetanos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
