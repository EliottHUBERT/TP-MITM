-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 08 avr. 2022 à 07:30
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mitm`
--

-- --------------------------------------------------------

--
-- Structure de la table `binome`
--

DROP TABLE IF EXISTS `binome`;
CREATE TABLE IF NOT EXISTS `binome` (
  `ID1` int(11) NOT NULL,
  `ID2` int(11) NOT NULL,
  UNIQUE KEY `login1` (`ID1`),
  UNIQUE KEY `login2` (`ID2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `binome`
--

INSERT INTO `binome` (`ID1`, `ID2`) VALUES
(36, 8);

-- --------------------------------------------------------

--
-- Structure de la table `table_utile`
--

DROP TABLE IF EXISTS `table_utile`;
CREATE TABLE IF NOT EXISTS `table_utile` (
  `Nom_utilisateur` text COLLATE utf8_unicode_ci NOT NULL,
  `IDUtil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEleve` varchar(16) NOT NULL,
  `login` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `idEleve`, `login`, `message`) VALUES
(10, 'I3U2C9JPLNM', 'qwerty', ''),
(8, '3VG?DLH8OKO', 'azerty', ''),
(36, 'P96GEVSKEP7', '', ''),
(35, 'TXVTHPU!O79', 'gaston', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
