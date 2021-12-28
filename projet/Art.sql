-- phpMyAdmin SQL Dump
-- version 5.2.0-dev+20210926.4834c5fe7d
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2021 at 11:58 PM
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
  `mot_de_passe` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
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
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `email`, `mot_de_passe`, `civilite`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `pays`, `telephone`, `img_client`) VALUES
(2, 'maximelim@laposte.net', 'mdp', 'M', 'lim', 'maxime', '18 Grande Rue', 77230, 'Dammartin', 'France', 1020304, 'images/default_logo_user.png');

-- --------------------------------------------------------

--
-- Table structure for table `Commande`
--

CREATE TABLE `Commande` (
  `id_commande` int NOT NULL,
  `id_client` int NOT NULL,
  `prix_total` decimal(10,0) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Compositeur`
--

CREATE TABLE `Compositeur` (
  `id_compositeur` int NOT NULL,
  `nom` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Compositeur`
--

INSERT INTO `Compositeur` (`id_compositeur`, `nom`) VALUES
(1, 'Mozart'),
(2, 'Bach'),
(3, 'Vivaldi'),
(4, 'Paganini'),
(5, 'Beethoven');

-- --------------------------------------------------------

--
-- Table structure for table `Musique`
--

CREATE TABLE `Musique` (
  `id_musique` int NOT NULL,
  `designation` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_compositeur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Musique`
--

INSERT INTO `Musique` (`id_musique`, `designation`, `id_compositeur`) VALUES
(1, 'Requiem', 1),
(2, 'Don Giovanni', 1),
(3, 'Jésus que ma joie demeure', 2),
(4, 'Passion selon saint Matthieu', 2),
(5, 'Les Quatre Saisons', 3),
(6, 'Argippo', 3),
(7, 'La Campanella-Violon', 4),
(8, 'Vingt-quatre caprices', 4),
(9, 'La Lettre à Élise', 5),
(10, 'Symphonie no 1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Spectacle`
--

CREATE TABLE `Spectacle` (
  `id_spectacle` int NOT NULL,
  `Titre` varchar(128) NOT NULL,
  `date` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `heure` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Lieu` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img_Lieu` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `musique` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Spectacle`
--

INSERT INTO `Spectacle` (`id_spectacle`, `Titre`, `date`, `heure`, `Lieu`, `img_Lieu`, `prix`, `musique`) VALUES
(1, 'VIVALDI : LES QUATRE SAISONS', '', '', 'Eglise Saint Germain des Près - PARIS', '', '50', 5),
(2, 'TCHAIKOVSKI BEETHOVEN OFFENBACH VIOLONCELLE ET PIANO', '', '17:30', 'Eglise Saint-emphrem Paris', 'tmp', '17', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `Compositeur`
--
ALTER TABLE `Compositeur`
  ADD PRIMARY KEY (`id_compositeur`);

--
-- Indexes for table `Musique`
--
ALTER TABLE `Musique`
  ADD PRIMARY KEY (`id_musique`),
  ADD KEY `id_musicien` (`id_compositeur`);

--
-- Indexes for table `Spectacle`
--
ALTER TABLE `Spectacle`
  ADD PRIMARY KEY (`id_spectacle`),
  ADD KEY `musique` (`musique`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `id_commande` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Compositeur`
--
ALTER TABLE `Compositeur`
  MODIFY `id_compositeur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Musique`
--
ALTER TABLE `Musique`
  MODIFY `id_musique` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Spectacle`
--
ALTER TABLE `Spectacle`
  MODIFY `id_spectacle` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Musique`
--
ALTER TABLE `Musique`
  ADD CONSTRAINT `Musique_ibfk_1` FOREIGN KEY (`id_compositeur`) REFERENCES `Compositeur` (`id_compositeur`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `Spectacle`
--
ALTER TABLE `Spectacle`
  ADD CONSTRAINT `Spectacle_ibfk_1` FOREIGN KEY (`musique`) REFERENCES `Musique` (`id_musique`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
