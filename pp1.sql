-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 04:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `aperturas`
--

CREATE TABLE `aperturas` (
  `ID` int(11) NOT NULL,
  `Hora` datetime NOT NULL DEFAULT current_timestamp(),
  `Nombre Inquilino` varchar(30) NOT NULL,
  `Edificio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aperturas`
--

INSERT INTO `aperturas` (`ID`, `Hora`, `Nombre Inquilino`, `Edificio`) VALUES
(1, '2022-11-14 03:35:01', 'Felipe', '1'),
(2, '0000-00-00 00:00:00', 'Felipe', '1'),
(3, '2022-11-16 00:03:06', 'Felipe', '1'),
(4, '2022-11-16 00:19:48', 'Joaquin Ferreyra', '2'),
(5, '2022-11-16 00:43:39', 'Felipe', '2');

-- --------------------------------------------------------

--
-- Table structure for table `edificio`
--

CREATE TABLE `edificio` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `Gerente` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `edificio`
--

INSERT INTO `edificio` (`ID`, `Nombre`, `Direccion`, `Gerente`) VALUES
(1, 'Aguas Dulces', 'Gurruchaga 524', 'Leonardo'),
(2, 'Aguas Termas', 'La Plata 1586', 'Leonardo');

-- --------------------------------------------------------

--
-- Table structure for table `inquilinos`
--

CREATE TABLE `inquilinos` (
  `ID Inquilino` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Departamento` varchar(30) NOT NULL,
  `Edificio` varchar(30) NOT NULL,
  `Contraseña` varchar(30) NOT NULL,
  `IP` varchar(16) NOT NULL,
  `Online` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquilinos`
--

INSERT INTO `inquilinos` (`ID Inquilino`, `Nombre`, `Departamento`, `Edificio`, `Contraseña`, `IP`, `Online`) VALUES
(1, 'Felipe', '2 B', 'Gurruchaga 524', '123', '::1', 0),
(2, 'Julieta', '1 C', 'Gurruchaga 524', '123', '', 0),
(3, 'Ruben Enriquez', '1 C', 'La Plata 1586', '123', '', 0),
(4, 'Joaquin Ferreyra', '1 C', 'La Plata 1586', '123', '::1', 0),
(5, 'Felipe', '1 C', 'La Plata 1586', '123', '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `Nombre` varchar(40) NOT NULL,
  `IP` varchar(16) NOT NULL,
  `Es Admin?` tinyint(1) NOT NULL,
  `ID Usuario` int(11) NOT NULL,
  `Contraseña` varchar(30) NOT NULL,
  `Online` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`Nombre`, `IP`, `Es Admin?`, `ID Usuario`, `Contraseña`, `Online`) VALUES
('Admin', '::1', 1, 1, 'Admin', 0),
('Leonardo', '::1', 0, 2, '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aperturas`
--
ALTER TABLE `aperturas`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `inquilinos`
--
ALTER TABLE `inquilinos`
  ADD PRIMARY KEY (`ID Inquilino`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID Usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aperturas`
--
ALTER TABLE `aperturas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `edificio`
--
ALTER TABLE `edificio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inquilinos`
--
ALTER TABLE `inquilinos`
  MODIFY `ID Inquilino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
