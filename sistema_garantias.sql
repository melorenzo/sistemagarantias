-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 09:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_garantias`
--

-- --------------------------------------------------------

--
-- Table structure for table `garantias`
--
-- Error reading structure for table sistema_garantias.garantias: #1932 - Table 'sistema_garantias.garantias' doesn't exist in engine
-- Error reading data for table sistema_garantias.garantias: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `sistema_garantias`.`garantias`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `procesos`
--

CREATE TABLE `procesos` (
  `Id` int(11) NOT NULL,
  `Nro_Expediente` int(10) NOT NULL,
  `Nro_Proceso` varchar(50) NOT NULL,
  `Fecha_Carga` date NOT NULL,
  `Usuario_Carga` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procesos`
--

INSERT INTO `procesos` (`Id`, `Nro_Expediente`, `Nro_Proceso`, `Fecha_Carga`, `Usuario_Carga`) VALUES
(1, 5465465, '654654lpi', '2024-12-18', 'mlorenzo'),
(2, 5898549, '516565opio', '2024-12-18', 'poip'),
(3, 5898549, '516565opro', '2024-12-18', 'poipee'),
(4, 78945, '45894/LIP', '2024-12-18', 'melorenzo'),
(5, 78945, '45894/LIP', '2024-12-18', 'melorenzo'),
(6, 484, '546sda', '2024-12-18', 'melorenzo'),
(7, 484, '546sda', '2024-12-18', 'melorenzo'),
(8, 484, '45894/LIP', '2021-12-15', 'melorenzo'),
(9, 484, '45894/LIP', '2021-12-15', 'melorenzo'),
(10, 484, '54654654lpi', '2024-12-24', 'melorenzo'),
(11, 484, '54654654lpi', '2024-12-24', 'melorenzo'),
(12, 0, '', '0000-00-00', 'melorenzo'),
(13, 0, '', '0000-00-00', 'melorenzo'),
(14, 3456, '3457/piu', '2024-12-18', 'melorenzo'),
(15, 3456, '3457/piu', '2024-12-18', 'melorenzo'),
(16, 3456, '54654654lpi', '2023-12-18', 'melorenzo'),
(17, 3456, '54654654lpi', '2023-12-18', 'melorenzo'),
(18, 3456, '54654654lpi', '2023-12-18', 'melorenzo'),
(19, 3456, '54654654lpi', '2023-12-18', 'melorenzo'),
(20, 987, '965SAS', '2023-12-18', 'melorenzo'),
(21, 987, '965SAS', '2023-12-18', 'melorenzo'),
(22, 987, '546sda', '2023-12-17', 'melorenzo'),
(23, 987, '546sda', '2023-12-17', 'melorenzo'),
(24, 987, '546sda', '2023-12-17', 'melorenzo'),
(25, 987, '546sda', '2023-12-17', 'melorenzo'),
(26, 987, '45894/LIP', '2023-12-15', 'melorenzo'),
(27, 987, '45894/LIP', '2023-12-15', 'melorenzo'),
(28, 78945, '45894/LIP', '4222-12-05', 'melorenzo'),
(29, 78945, '45894/LIP', '4222-12-05', 'melorenzo'),
(30, 3456, '54654654lpi', '2025-12-25', 'melorenzo'),
(31, 3456, '54654654lpi', '2025-12-25', 'melorenzo'),
(32, 51616516, '16516/LÑOS', '2024-12-15', 'melorenzo'),
(33, 51616516, '16516/LÑOS', '2024-12-15', 'melorenzo'),
(34, 484, '54654654lpi', '2009-12-05', 'melorenzo'),
(35, 484, '54654654lpi', '2009-12-05', 'melorenzo');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Clave` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Usuario`, `Clave`) VALUES
(1, 'mlorenzo', 'Depinfo136');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `procesos`
--
ALTER TABLE `procesos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `procesos`
--
ALTER TABLE `procesos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
