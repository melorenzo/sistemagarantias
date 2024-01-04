-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 03:59 PM
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
-- Database: `sistema_garantias`
--

-- --------------------------------------------------------

--
-- Table structure for table `garantias_cargadas`
--

CREATE TABLE `garantias_cargadas` (
  `Tipo_garantia` varchar(11) NOT NULL,
  `Proveedor` varchar(50) NOT NULL,
  `Compania_Aseguradora` varchar(50) NOT NULL,
  `Monto` varchar(50) NOT NULL,
  `Fecha_Carga` date NOT NULL,
  `Usuario_Carga` varchar(15) NOT NULL,
  `Proceso` varchar(50) NOT NULL,
  `Devuelta` text NOT NULL,
  `Nombre_Archivo` varchar(80) NOT NULL,
  `Ubicacion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garantias_cargadas`
--

INSERT INTO `garantias_cargadas` (`Tipo_garantia`, `Proveedor`, `Compania_Aseguradora`, `Monto`, `Fecha_Carga`, `Usuario_Carga`, `Proceso`, `Devuelta`, `Nombre_Archivo`, `Ubicacion`) VALUES
('0', '¨Poltotu', 'Halaamn', '12321', '2024-02-01', 'gblengio', '963/lpu', '', '', ''),
('0', 'ss', 'dsad', 'asda', '2024-02-01', 'gblengio', '963/lpu', '', '', ''),
('0', 'pipo', 'ppipo', '123', '2024-02-01', 'gblengio', '963/lpu', '', '', ''),
('Oferta', 'asdad', 'asdasd', 'asdasd', '2024-02-01', 'gblengio', '963/lpu', '', '', ''),
('Adjudicacio', 'asdad', 'adasd', 'asda', '2024-02-01', 'gblengio', '2424', '', '', ''),
('Oferta', 'sasd', 'asdas', '25000', '2024-02-01', 'gblengio', '2525', '', '', ''),
('Adjudicacio', 'pio', 'sdfs', '79', '2024-02-01', 'gblengio', '2626', '', '', ''),
('Adjudicacio', 'asdasd', 'asdasda', '565', '2024-02-01', 'gblengio', '2222', '', '', ''),
('Oferta', 'wear', 'wear', '123', '2024-02-22', 'gblengio', '2828', '', 'BD - U3.pdf', '/garantias/garantias/GarantiasDigitales/'),
('Oferta', 'LARRANGA', 'Gossssh333', '25000', '2024-02-04', 'gblengio', '2929', '', 'BD - U3.pdf', '/garantias/garantias/GarantiasDigitales/');

-- --------------------------------------------------------

--
-- Table structure for table `garantias_digitales`
--

CREATE TABLE `garantias_digitales` (
  `Usuario` varchar(50) NOT NULL,
  `Proceso` varchar(50) NOT NULL,
  `Nombre_Archivo` varchar(60) NOT NULL,
  `Ubucacion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garantias_digitales`
--

INSERT INTO `garantias_digitales` (`Usuario`, `Proceso`, `Nombre_Archivo`, `Ubucacion`) VALUES
('gblengio', '2626', 'C:xampphtdocsgarantias/GarantiasDigitales/archivoaa.pdf', ''),
('', '', 'garantiamas.pdf', 'C:xampphtdocsgarantias/GarantiasDigitales/garantiamas.pdf'),
('gblengio', '2828', 'garantiar.pdf', 'C:xampphtdocsgarantias/GarantiasDigitales/garantiar.pdf'),
('gblengio', '2828', 'BD - U3.pdf', 'C:xampphtdocsgarantiasxampphtdocsgarantiasGarantiasDigitalesBD - U3.pdf'),
('gblengio', '2828', 'BD - U3.pdf', 'C:xampphtdocsgarantias/garantias/GarantiasDigitales/BD - U3.pdf'),
('gblengio', '2828', 'BD - U3.pdf', '/garantias/GarantiasDigitales/BD - U3.pdf');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(35, 484, '54654654lpi', '2009-12-05', 'melorenzo'),
(36, 963, '963/lpu', '2024-01-02', 'gblengio'),
(37, 963, '963/lpu', '2024-01-02', 'gblengio'),
(38, 2323, '2424', '2024-02-01', 'gblengio'),
(39, 2323, '2424', '2024-02-01', 'gblengio'),
(40, 2525, '2525', '2024-02-01', 'gblengio'),
(41, 2525, '2525', '2024-02-01', 'gblengio'),
(42, 2626, '2626', '2024-02-01', 'gblengio'),
(43, 2626, '2626', '2024-02-01', 'gblengio'),
(44, 2222, '2222', '2024-02-01', 'gblengio'),
(45, 2222, '2222', '2024-02-01', 'gblengio'),
(46, 2828, '2828', '2024-02-01', 'gblengio'),
(47, 2828, '2828', '2024-02-01', 'gblengio'),
(48, 2655146, '2929', '2024-02-04', 'gblengio'),
(49, 2655146, '2929', '2024-02-04', 'gblengio');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Clave` varchar(80) NOT NULL,
  `Tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Usuario`, `Clave`, `Tipo`) VALUES
(4, 'gblengio', '$2y$10$Jgf5TEcKWEBhwEePE1gne.RGE2OYvv6.p.I9wbWRyIIB49PRYomSW', 'user'),
(5, 'mlorenzo', '$2y$10$yEF9akEDSSI/fZ6ecoOz2.thp6Diu9HJ9P5DtrF1e5tH9oUeLS5nO', 'admin');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
