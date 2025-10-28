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
-- Table structure for table `caprino`
--

CREATE TABLE `caprino` (
  `id` int(10) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `peso_nacimiento` double(5,2) NOT NULL,
  `especie` varchar(50) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `tagid` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `raza` varchar(50) DEFAULT NULL,
  `grupo` varchar(50) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `etapa` varchar(100) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `peso_compra` double(5,2) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `fecha_venta` date DEFAULT NULL,
  `peso_venta` double(5,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `deceso_causa` varchar(30) NOT NULL,
  `deceso_fecha` date DEFAULT NULL,
  `descarte_fecha` date DEFAULT NULL,
  `descarte_peso` decimal(10,2) DEFAULT NULL,
  `descarte_precio` decimal(10,2) DEFAULT NULL,
  `destete_fecha` date DEFAULT NULL,
  `destete_peso` decimal(10,2) NOT NULL,
  `fecha_publicacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caprino`
--

INSERT INTO `caprino` (`id`, `image`, `image2`, `image3`, `video`, `fecha_nacimiento`, `peso_nacimiento`, `especie`, `nombre`, `tagid`, `genero`, `raza`, `grupo`, `estatus`, `etapa`, `edad`, `fecha_compra`, `peso_compra`, `precio_compra`, `fecha_venta`, `peso_venta`, `precio_venta`, `deceso_causa`, `deceso_fecha`, `descarte_fecha`, `descarte_peso`, `descarte_precio`, `destete_fecha`, `destete_peso`, `fecha_publicacion`) VALUES
(600, 'uploads/68bc6d37c9da1_1757179191.jpeg', 'uploads/68bc6d37c9f41_1757179191.jpg', 'uploads/68bc6d37ca0c7_1757179191.jpg', 'uploads/videos/67faaa8d3a3d2_1744480909.mp4', '2023-08-12', 50.00, 'Vacuno', 'Lola', '3000', 'Hembra', 'Criolla', 'Sanos', 'Activo', 'Crecimiento (120–240 días)', 653, '0000-00-00', 200.00, 520.00, NULL, 0.00, 0.00, 'Rayo', '2025-04-30', '2025-05-02', 300.00, 900.00, NULL, 0.00, '2025-01-08'),
(602, 'uploads/68bc70526d4cf_1757179986.jpeg', 'uploads/68bc70526d61f_1757179986.jpeg', 'uploads/68bc70526d75a_1757179986.jpeg', 'uploads/videos/67fab7635f48b_1744484195.mp4', '2025-01-01', 50.00, 'Vacuno', 'Tomas', '5000', 'Macho', 'Saanen', 'Sanos', 'Activo', 'Crecimiento (120–240 días)', 150, '0000-00-00', 45.00, 350.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-02-04'),
(605, 'uploads/68bc7618bc739_1757181464.jpeg', 'uploads/68bc7618bc8dd_1757181464.jpeg', 'uploads/68bc7618bcaac_1757181464.jpeg', 'uploads/videos/67fac81e01cc7_1744488478.mp4', '2023-02-25', 50.00, 'Vacuno', 'Alegria', '9500', 'Hembra', 'Criolla', 'Sanos', 'Activo', 'Lactancia (0–60 días)', 821, '2025-04-12', 300.00, 500.00, '2025-06-01', 520.00, 500.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-02-04'),
(609, 'uploads/68bc74dfeb7c8_1757181151.jpeg', 'uploads/68bc74dfeb9af_1757181151.jpeg', 'uploads/68bc74dfebaf5_1757181151.jpeg', NULL, '2023-01-01', 55.00, 'Vacuno', 'Jeny', '8300', 'Hembra', 'Criolla', 'Sanos', 'Activo', 'Lactancia (0–60 días)', 877, '0000-00-00', 70.00, 180.00, '2025-06-01', 500.00, 1500.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-02-04'),
(621, 'uploads/68bc6a4c07cad_1757178444.png', 'uploads/68bc6a4c07e66_1757178444.jpg', 'uploads/68bc6a4c07ff3_1757178444.jpg', NULL, '2023-01-16', 56.00, 'Vacuno', 'Roky', '15500', 'Macho', 'Boer', 'Sanos', 'Activo', 'Crecimiento (120–240 días)', 862, '0000-00-00', 50.00, 250.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-02-04'),
(622, 'uploads/68bc6a7db3386_1757178493.png', 'uploads/68bc6a7db35fe_1757178493.png', 'uploads/68bc6a7db37d8_1757178493.jpg', NULL, '2023-01-01', 58.00, 'Vacuno', 'Domingo', '20000', 'Macho', 'Canaria', 'Sanos', 'Activo', 'Crecimiento (120–240 días)', 877, '0000-00-00', 100.00, 500.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-04-07'),
(624, 'uploads/68bc6bed3e68b_1757178861.jpg', 'uploads/68bc6bed3e8ed_1757178861.jpg', 'uploads/68bc6bed3ea38_1757178861.png', NULL, '2023-02-18', 50.00, 'Vacuno', 'Oscar', '23000', 'Macho', 'Saanen', 'Sanos', 'Activo', 'Lactancia (0–60 días)', 829, '0000-00-00', 30.00, 100.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-03-31'),
(625, 'uploads/68bc6e311e5d8_1757179441.jpeg', 'uploads/68bc6e311e78a_1757179441.jpg', 'uploads/68bc6e311e911_1757179441.jpg', NULL, '2023-01-04', 51.00, 'Vacuno', 'Lento', '33000', 'Macho', 'Nubian', 'Sanos', 'Activo', '', 874, '0000-00-00', 60.00, 180.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-02-04'),
(626, 'uploads/68bc6c259eb0d_1757178917.jpeg', 'uploads/68bc6c259ec89_1757178917.jpeg', 'uploads/68bc6c259ee01_1757178917.jpg', NULL, '2023-01-04', 53.00, 'Vacuno', 'Dinya', '23500', 'Hembra', 'Alpina', 'Sanos', 'Activo', 'Crecimiento (120–240 días)', 874, '2024-03-06', 60.00, 180.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-01-20'),
(627, 'uploads/68bc6cb2dd51d_1757179058.jpg', 'uploads/68bc6cb2dd6b4_1757179058.jpeg', 'uploads/68bc6cb2dd7eb_1757179058.jpeg', NULL, '2022-12-15', 52.00, 'Vacuno', 'Rosa', '24560', 'Hembra', 'Criolla', 'Sanos', 'Activo', 'Crecimiento (120–240 días)', 894, '2024-04-18', 80.00, 50.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-03-21'),
(628, 'uploads/68bc6cfa6964b_1757179130.jpg', 'uploads/68bc6cfa698b9_1757179130.jpg', 'uploads/68bc6cfa69a26_1757179130.png', NULL, '2022-06-01', 53.00, 'Vacuno', 'Humo', '27500', 'Macho', 'Nubian', 'Sanos', 'Activo', 'Reproduccion (240 días–1 año)', 1091, '2024-04-01', 200.00, 600.00, '2025-06-01', 500.00, 1000.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-02-10'),
(630, 'uploads/68bc746db9dd7_1757181037.jpeg', 'uploads/68bc746dba0d7_1757181037.jpeg', 'uploads/68bc746dba239_1757181037.jpeg', 'uploads/videos/68114c9bda356_1745964187.mp4', '2023-01-01', 60.00, 'Vacuno', 'Lester', '8210', 'Macho', 'Saanen', 'Sanos', 'Activo', 'Destete (60–120 días)', 873, '0000-00-00', 50.00, 150.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-03-06'),
(633, 'uploads/68bc6c6ea5ba5_1757178990.jpg', 'uploads/68bc6c6ea5db7_1757178990.png', 'uploads/68bc6c6ea5f1f_1757178990.jpg', NULL, '2023-01-02', 58.00, 'Vacuno', 'Blanca', '24200', 'Hembra', 'Toggenburg', 'Sanos', 'Activo', 'Crecimiento (120–240 días)', 876, '2024-04-19', 100.00, 300.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-05-08'),
(634, 'uploads/68bc6f8117e4f_1757179777.jpeg', 'uploads/68bc6f81180b4_1757179777.jpeg', 'uploads/68bc6f8118268_1757179777.jpeg', NULL, '2024-06-01', 50.00, 'Vacuno', 'Cantor', '45000', 'Macho', 'Nubian', 'Sanos', 'Activo', '', 360, '2023-06-01', 80.00, 300.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-02-01'),
(635, 'uploads/68bc735fed488_1757180767.jpeg', 'uploads/68bc735fed6b5_1757180767.jpeg', 'uploads/68bc735fed89a_1757180767.jpeg', NULL, '2024-06-01', 45.00, 'Vacuno', 'Pedro', '599', 'Macho', 'Boer', 'Sanos', 'Activo', 'Destete (60–120 días)', 360, '2023-06-30', 40.00, 180.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-04-01'),
(641, 'uploads/68bc6e9a35656_1757179546.jpg', 'uploads/68bc6e9a35827_1757179546.jpeg', 'uploads/68bc6e9a359fa_1757179546.jpeg', NULL, '2024-01-02', 46.00, 'Vacuno', 'Carla', '4001', 'Hembra', 'Criolla', 'Sanos', 'Activo', 'Crecimiento (120–240 días)', 511, '2024-11-30', 70.00, 210.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-01-01'),
(644, 'uploads/68bc6ad282b5d_1757178578.png', 'uploads/68bc6ad282e1c_1757178578.jpg', 'uploads/68bc6ad282fc1_1757178578.jpeg', NULL, '2025-01-01', 49.00, 'Vacuno', 'Blanquin', '21214', 'Macho', 'Criolla', 'Sanos', 'Activo', 'Destete (60–120 días)', 146, '2025-01-01', 180.00, 360.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-01-05'),
(645, 'uploads/68bc71010e6c8_1757180161.jpeg', 'uploads/68bc71010e8f0_1757180161.jpeg', 'uploads/68bc71010eaf7_1757180161.jpeg', NULL, '2024-01-01', 50.00, 'Vacuno', 'Asterisc', '5266', 'Hembra', 'Criolla', 'Sanos', 'Activo', 'Lactancia (0–60 días)', 512, '2024-01-01', 30.00, 120.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-04-05'),
(646, 'uploads/68bc758036e85_1757181312.jpeg', 'uploads/68bc75803702c_1757181312.jpeg', 'uploads/68bc758037136_1757181312.jpeg', NULL, '2024-02-01', 52.00, 'Vacuno', 'Cachitos', '8985', 'Hembra', 'Criolla', 'Sanos', 'Activo', 'Gestación', 481, '2024-02-01', 80.00, 400.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, '2025-02-28'),
(647, 'uploads/68bc6b7aad751_1757178746.jpeg', 'uploads/68bc6b7aad90e_1757178746.jpeg', 'uploads/68bc6b7aadaaa_1757178746.jpeg', 'uploads/6810938472a6c_vaca2-mobile-registroca.mp4', '2024-10-01', 49.00, 'Vacuno', 'Bob', '2222', 'Macho', 'Nubian', 'Sanos', 'Activo', 'Crecimiento (120–240 días)', 238, '2025-01-07', 300.00, 600.00, NULL, 0.00, 0.00, '', NULL, NULL, 0.00, NULL, NULL, 0.00, NULL),
(650, 'uploads/68bc6a0a82c75_1757178378.png', 'uploads/68bc6a0a82e51_1757178378.jpg', 'uploads/68bc6a0a82fe6_1757178378.jpg', 'uploads/6813d2c0931d0_nelore-pintado-video-mute-final.mp4', '2024-01-01', 48.00, 'Vacuno', 'Pintado', '12345', 'Macho', 'Alpina', 'Sanos', 'Activo', 'Destete (60–120 días)', 512, '2025-01-01', 50.00, 200.00, NULL, 0.00, 0.00, '', NULL, NULL, NULL, NULL, NULL, 0.00, NULL),
(651, 'uploads/68bc727c176b9_1757180540.jpeg', 'uploads/68bc727c1782d_1757180540.jpeg', 'uploads/68bc727c179d7_1757180540.jpeg', 'uploads/6813ec99591e1_jersey-becerro-video.mp4', '2025-02-01', 54.00, 'Vacuno', 'Bambi', '54321', 'Macho', 'Criolla', 'Sanos', 'Activo', 'Lactancia (0–60 días)', 115, '0000-00-00', 30.00, 100.00, NULL, 0.00, 0.00, '', NULL, NULL, NULL, NULL, NULL, 0.00, NULL),
(652, 'uploads/68bc73f644bb4_1757180918.jpeg', 'uploads/68bc73f644df1_1757180918.jpeg', 'uploads/68bc73f644f3b_1757180918.jpeg', 'uploads/videos/6823521c01fb7_1747145244.mp4', '2024-01-17', 46.00, 'Vacuno', 'Reina', '777', 'Hembra', 'Criolla', 'Sanos', 'Activo', 'Lactancia (0–60 días)', 496, '2025-01-01', 60.00, 180.00, NULL, 0.00, 0.00, '', NULL, NULL, NULL, NULL, NULL, 0.00, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caprino`
--
ALTER TABLE `caprino`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `tagid` (`tagid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caprino`
--
ALTER TABLE `caprino`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=653;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
