-- phpMyAdmin SQL Dump
-- version 5.2.0-dev+20210926.4834c5fe7d
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2021 at 06:16 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Art`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int NOT NULL,
  `email` varchar(64) NOT NULL DEFAULT '',
  `mot_de_passe` varchar(32) NOT NULL DEFAULT '',
  `civilite` varchar(32) NOT NULL DEFAULT '',
  `nom` varchar(64) NOT NULL DEFAULT '',
  `prenom` varchar(64) NOT NULL DEFAULT '',
  `adresse` varchar(255) NOT NULL DEFAULT '',
  `code_postal` int NOT NULL DEFAULT '0',
  `ville` varchar(64) NOT NULL DEFAULT '',
  `pays` varchar(32) NOT NULL DEFAULT '',
  `telephone` int NOT NULL DEFAULT '0',
  `img_client` varchar(64) NOT NULL DEFAULT 'images/default_logo_user.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
