-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 03:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



-- Database: `formulario`
--

USE `formulario`;

-- --------------------------------------------------------

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `edad` int(11) NOT NULL,
  `edo_civil` varchar(30) NOT NULL,
  `curp` varchar(30) NOT NULL,
  `nivel` varchar(25) NOT NULL,
  `grado` int(11) NOT NULL
);

--
-- Dumping data for table `solicitud`
--

INSERT INTO `solicitud` (`id`, `fecha`, `nombres`, `apellidoP`, `apellidoM`, `sexo`, `edad`, `edo_civil`, `curp`, `nivel`, `grado`) VALUES
(2, '2021-12-01', 'PABLO FERNANDO', 'FLORES', 'MAGANA', 'M', 24, 'CASADO(A)', 'FOMP960504HGTLGB08', 'LICENCIATURA', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

