-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 13 Septembre 2016 à 22:55
-- Version du serveur: 5.5.47
-- Version de PHP: 5.4.45-0+deb7u4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `e1595060`
--

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE IF NOT EXISTS `livres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) DEFAULT NULL,
  `auteur` varchar(100) DEFAULT NULL,
  `annee` int(4) DEFAULT NULL,
  `isbn` varchar(10) NOT NULL,
  `editeur` varchar(200) DEFAULT NULL,
  `evaluation` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `auteur`, `annee`, `isbn`, `editeur`, `evaluation`) VALUES
(2, 'Saccage ce carnet', 'Keri Smith', 2019, '9780399162', 'Perige', 16),
(3, 'Love,style,life', 'GARANCE DORE', 2007, '9782081376', 'Flammarion', 46),
(4, 'Liste,la', 'JEREMY DEMAY', 2019, '9782892258', 'Monde different', 14),
(5, 'Madame america:100 cles pour percer le mystere hillary', 'RICHARD HETU', 2020, '9782897053', 'La presse', 24),
(6, 'Naufrage', 'BIZ', 2016, '9782760947', 'Lemeac', 18),
(7, 'Renverse,la', 'OLIVIER ADAM', 2016, '978208137', 'Flammarion', 29),
(16, 'Solange te parle', 'Solange', 2016, '9782228914', 'Payot', 3),
(17, 'Le petit livre des gros calins', 'Katleen Keeting', 2013, '9782757802', 'POINTS', 2),
(21, 'Dossier 64', 'Jussi Adler-Olsen', 2017, '9782253095', 'Le livre de poche', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
