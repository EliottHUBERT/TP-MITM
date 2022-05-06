-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 15 avr. 2022 à 07:30
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
-- Structure de la table `action`
--

DROP TABLE IF EXISTS `action`;
CREATE TABLE IF NOT EXISTS `action` (
  `ACTIONId` int(11) NOT NULL AUTO_INCREMENT,
  `ACTIONCommunication` boolean NOT NULL,
  `UTILId` int(11) NOT NULL,
  `PHASEId` int(11) NOT NULL,
  PRIMARY KEY (`ACTIONId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `binome`
--

DROP TABLE IF EXISTS `binome`;
CREATE TABLE IF NOT EXISTS `binome` (
  `UTILId1` int(11) NOT NULL,
  `UTILId2` int(11) NOT NULL,
  UNIQUE KEY `login1` (`UTILId1`),
  UNIQUE KEY `login2` (`UTILId2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `binome`
--

INSERT INTO `binome` (`UTILId1`, `UTILId2`) VALUES
(62, 8),
(63, 62);

-- --------------------------------------------------------

--
-- Structure de la table `communication`
--

DROP TABLE IF EXISTS `communication`;
CREATE TABLE IF NOT EXISTS `communication` (
  `COMMID` int(11) NOT NULL AUTO_INCREMENT,
  `UTILIdEleve1` varchar(16) NOT NULL,
  `UTILIdEleve2` varchar(16) NOT NULL,
  `PHASEId` int(11) NOT NULL,
  PRIMARY KEY (`COMMID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ecoute`
--

DROP TABLE IF EXISTS `ecoute`;
CREATE TABLE IF NOT EXISTS `ecoute` (
  `UTILId1` int(11) NOT NULL,
  `UTILId2` int(11) NOT NULL,
  `PHASEId` int(11) NOT NULL,
  PRIMARY KEY (`UTILId1`,`UTILId2`,`PHASEId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `phase`
--

DROP TABLE IF EXISTS `phase`;
CREATE TABLE IF NOT EXISTS `phase` (
  `PHASEId` int(11) NOT NULL AUTO_INCREMENT,
  `PHASEEtat` boolean COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`PHASEId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `UTILId` int(11) NOT NULL AUTO_INCREMENT,
  `UTILIdEleve` varchar(16) NOT NULL,
  `UTILLogin` varchar(20) NOT NULL,
  `UTILMotDePasse` varchar(255) NOT NULL,
  PRIMARY KEY (`UTILId`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `MESId` int(11) NOT NULL AUTO_INCREMENT,
  `MESEnvoyeur` varchar(32) NOT NULL,
  `MESDestinataire` varchar(32) NOT NULL,
  `MESContenu` varchar(255) NOT NULL,
  PRIMARY KEY (`MESId`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`UTILId`, `UTILIdEleve`, `UTILLogin`, `UTILMotDePasse`) VALUES
(NULL, '3VG?DLH8OKO', 'Eliott', 'test'),
(NULL, 'MFD217C8RX1', 'Adrien ', 'test2'),
(NULL, 'T2NFOEWU8VA', 'Gaston', 'test3'),
(NULL, '9LEWQMJXPRN', 'LePatron', 'test4');
COMMIT;


INSERT INTO `phase` (`PHASEId`, `PHASEEtat`) VALUES ('0', '1');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


