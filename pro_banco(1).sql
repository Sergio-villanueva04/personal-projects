-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 12:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro_banco`
--

-- --------------------------------------------------------

--
-- Table structure for table `banco`
--

CREATE TABLE `banco` (
  `ide_ban` int(11) NOT NULL,
  `nom_ban` varchar(35) NOT NULL,
  `cod_ban` int(3) NOT NULL,
  `est_ban` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cuenta_banco`
--

CREATE TABLE `cuenta_banco` (
  `ide_cue` int(11) NOT NULL,
  `ide_usu` int(11) NOT NULL,
  `tip_cue_ban` int(11) NOT NULL,
  `cod_cue_ban` varchar(13) NOT NULL,
  `sal_cue` float DEFAULT NULL,
  `est_cue` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `ide_inv` int(11) NOT NULL,
  `des_inv` varchar(50) NOT NULL,
  `ide_ban_inv` int(11) NOT NULL,
  `val_inv` float DEFAULT NULL,
  `est_inv` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `ide_mar` int(11) NOT NULL,
  `nom_mar` varchar(35) NOT NULL,
  `est_mar` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `presentacion`
--

CREATE TABLE `presentacion` (
  `ide_pre` int(11) NOT NULL,
  `ide_mar_pre` int(11) NOT NULL,
  `des_pre` varchar(30) NOT NULL,
  `est_pre` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_cuenta`
--

CREATE TABLE `tipo_cuenta` (
  `ide_tip_cue` int(11) NOT NULL,
  `tip_cue` varchar(25) NOT NULL,
  `cod_tip_cue` varchar(4) NOT NULL,
  `est_tip_cue` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaccion`
--

CREATE TABLE `transaccion` (
  `ide_tran` int(11) NOT NULL,
  `ide_cue_tran` int(11) NOT NULL,
  `des_tran` varchar(35) NOT NULL,
  `tip_tran` varchar(25) NOT NULL,
  `obj_tran` varchar(50) NOT NULL,
  `val_dep_tran` float DEFAULT NULL,
  `val_ret_tran` float DEFAULT NULL,
  `fec_tran` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `cod_usu` int(11) NOT NULL,
  `ide_ban_usu` int(11) NOT NULL,
  `ide_usu` varchar(12) NOT NULL,
  `raz_usu` varchar(35) NOT NULL,
  `dir_usu` varchar(55) NOT NULL,
  `ema_usu` varchar(40) NOT NULL,
  `tel_usu` varchar(12) NOT NULL,
  `est_usu` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`ide_ban`);

--
-- Indexes for table `cuenta_banco`
--
ALTER TABLE `cuenta_banco`
  ADD PRIMARY KEY (`ide_cue`),
  ADD KEY `ide_usu` (`ide_usu`),
  ADD KEY `tip_cue_ban` (`tip_cue_ban`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`ide_inv`),
  ADD KEY `ide_ban_inv` (`ide_ban_inv`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`ide_mar`),
  ADD UNIQUE KEY `unique` (`nom_mar`);

--
-- Indexes for table `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`ide_pre`),
  ADD KEY `ide_mar_pre` (`ide_mar_pre`);

--
-- Indexes for table `tipo_cuenta`
--
ALTER TABLE `tipo_cuenta`
  ADD PRIMARY KEY (`ide_tip_cue`),
  ADD UNIQUE KEY `unique` (`cod_tip_cue`);

--
-- Indexes for table `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`ide_tran`),
  ADD KEY `ide_cue_tran` (`ide_cue_tran`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usu`),
  ADD KEY `ide_ban` (`ide_ban_usu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banco`
--
ALTER TABLE `banco`
  MODIFY `ide_ban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cuenta_banco`
--
ALTER TABLE `cuenta_banco`
  MODIFY `ide_cue` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `ide_inv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `ide_mar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `ide_pre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_cuenta`
--
ALTER TABLE `tipo_cuenta`
  MODIFY `ide_tip_cue` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `ide_tran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuenta_banco`
--
ALTER TABLE `cuenta_banco`
  ADD CONSTRAINT `ide_usu` FOREIGN KEY (`ide_usu`) REFERENCES `usuario` (`cod_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tip_cue_ban` FOREIGN KEY (`tip_cue_ban`) REFERENCES `tipo_cuenta` (`ide_tip_cue`);

--
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `ide_ban_inv` FOREIGN KEY (`ide_ban_inv`) REFERENCES `banco` (`ide_ban`) ON UPDATE CASCADE;

--
-- Constraints for table `presentacion`
--
ALTER TABLE `presentacion`
  ADD CONSTRAINT `ide_mar_pre` FOREIGN KEY (`ide_mar_pre`) REFERENCES `marca` (`ide_mar`);

--
-- Constraints for table `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `ide_cue_tran` FOREIGN KEY (`ide_cue_tran`) REFERENCES `cuenta_banco` (`ide_cue`) ON UPDATE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `ide_ban` FOREIGN KEY (`ide_ban_usu`) REFERENCES `banco` (`ide_ban`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
