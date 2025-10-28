-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2025 at 04:08 AM
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
-- Table structure for table `ch_deceso`
--

CREATE TABLE `ch_deceso` (
  `id` int(11) NOT NULL,
  `ch_deceso_tagid` varchar(10) NOT NULL,
  `ch_deceso_causa` varchar(50) NOT NULL,
  `ch_deceso_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ch_deceso`
--

INSERT INTO `ch_deceso` (`id`, `ch_deceso_tagid`, `ch_deceso_causa`, `ch_deceso_fecha`) VALUES
(2, '3000', 'Golpe', '2025-03-08'),
(4, '4000', 'Gusanos', '2025-03-16'),
(12, '599', 'Diarrea', '2025-03-17'),
(13, '4000', 'Fiebre', '2025-03-18'),
(14, '4000', 'Asfixia', '2025-03-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ch_deceso`
--
ALTER TABLE `ch_deceso`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ch_deceso`
--
ALTER TABLE `ch_deceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
