-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 28 Octobre 2015 à 13:03
-- Version du serveur: 5.5.44
-- Version de PHP: 5.4.45-0+deb7u2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `e1595061`
--

-- --------------------------------------------------------

--
-- Structure de la table `tp2__answers`
--

CREATE TABLE IF NOT EXISTS `tp2__answers` (
  `answerID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `answer` varchar(250) NOT NULL,
  `questionID` int(11) NOT NULL,
  PRIMARY KEY (`answerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Contenu de la table `tp2__answers`
--

INSERT INTO `tp2__answers` (`answerID`, `answer`, `questionID`) VALUES
(1, 'IP', 1),
(2, 'TCP/IP', 1),
(3, 'HTTP', 1),
(4, 'MAILTO', 1),
(5, '24 KB', 2),
(6, '124 KB', 2),
(7, '1024 KB', 2),
(8, 'Acces Digital Sur Ligne', 3),
(9, 'Asymmetric Digital Subscriber Line', 3),
(10, 'Assemblee Des Surfeurs du Lac', 3),
(11, 'Vrai', 4),
(12, 'Faux', 4),
(13, 'FTP', 7),
(14, 'HTTP', 7),
(15, 'SNMP', 7),
(16, 'MAILTO', 7),
(17, 'Furteur', 6),
(18, 'Script', 6),
(19, 'FLOP total', 6),
(20, '192.68.20.50', 5),
(21, '67.71.157.151', 5),
(22, '055.17.257.139', 5),
(23, '127.0.0.1', 5),
(24, 'The World Wide Web Consortium', 8),
(25, 'Netscape', 8),
(26, 'Microsoft', 8),
(27, '<h6>', 9),
(28, '<head>', 9),
(29, '<heading>', 9),
(30, '<h1>', 9),
(31, 'Vrai', 10),
(32, 'Faux', 10),
(33, '<br>', 11),
(34, '<br />', 11),
(35, '<break>', 11),
(36, '<break />', 11),
(37, 'Hyperlinks and Text Markup Language', 12),
(38, 'Hyper Text Markup Language', 12),
(39, 'Home Tool Markup Language', 12),
(40, 'Ajoute un retrait de paragraphe', 13),
(41, 'Ajoute des guillements', 13),
(42, 'Aucune de ces reponses', 13),
(43, 'Cascading Style Sheets', 15),
(44, 'Computer Style Sheets', 15),
(45, 'Creative Style Sheets', 15),
(46, 'Colorful Style Sheets', 15),
(47, '<style src="mystyle.css" />', 18),
(48, '<link rel="stylesheet" type="text/css" href="mystyle.css" />', 18),
(49, '<stylesheet>mystyle.css</stylesheet>', 18),
(50, '<link rel="stylesheet" type="text/css" href="mystyle.css">', 18),
(51, '<style>', 16),
(52, '<script>', 16),
(53, '<css>', 16),
(54, 'Aucune de ces reponses', 16),
(55, 'A la fin du document.', 17),
(56, 'Dans l''element <head>.', 17),
(57, 'Au debut du document.', 17),
(58, 'Dans l''element <body>.', 17),
(59, 'Vrai', 14),
(60, 'Faux', 14);

-- --------------------------------------------------------

--
-- Structure de la table `tp2__categories`
--

CREATE TABLE IF NOT EXISTS `tp2__categories` (
  `categoryID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(40) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tp2__categories`
--

INSERT INTO `tp2__categories` (`categoryID`, `category`) VALUES
(1, 'Internet et Web'),
(2, 'XHTML'),
(3, 'CSS');

-- --------------------------------------------------------

--
-- Structure de la table `tp2__goodAnswers`
--

CREATE TABLE IF NOT EXISTS `tp2__goodAnswers` (
  `goodAnswerID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `questionID` int(11) NOT NULL,
  `answerID` tinyint(4) NOT NULL,
  PRIMARY KEY (`goodAnswerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `tp2__goodAnswers`
--

INSERT INTO `tp2__goodAnswers` (`goodAnswerID`, `questionID`, `answerID`) VALUES
(1, 1, 2),
(2, 2, 7),
(3, 3, 9),
(4, 4, 12),
(5, 5, 22),
(6, 6, 17),
(7, 7, 15),
(8, 8, 24),
(9, 9, 30),
(10, 10, 32),
(11, 11, 34),
(12, 12, 38),
(13, 13, 40),
(14, 14, 59),
(15, 15, 43),
(16, 16, 51),
(17, 17, 56),
(18, 18, 48);

-- --------------------------------------------------------

--
-- Structure de la table `tp2__questions`
--

CREATE TABLE IF NOT EXISTS `tp2__questions` (
  `questionID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(250) NOT NULL,
  `categoryID` int(11) NOT NULL,
  PRIMARY KEY (`questionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `tp2__questions`
--

INSERT INTO `tp2__questions` (`questionID`, `question`, `categoryID`) VALUES
(1, 'Quel est le protocole de communication de l''internet?', 1),
(2, 'Combien Vaut 1MB ?', 1),
(3, 'Que signifie ADSL ?', 1),
(4, 'L''internet et le web sont-ils la meme chose?', 1),
(5, 'Lequel parmi les adresses suivants n''est pas un adresse internet?', 1),
(6, 'Internet Explorer est un ...', 1),
(7, 'Lequel parmi les protocoles suivants n''est pas un protocole de communication du web?', 1),
(8, 'Quel organisme definit les normes pour le web?', 2),
(9, 'Quelle est la balise correcte pour le titre avec la taille de caractere la plus grande?', 2),
(10, 'Il existe une balise <forme> en XHTML', 2),
(11, 'Quelle est la balise correcte pour faire un saut de ligne?', 2),
(12, 'Que veut dire ''HTML''?', 2),
(13, 'Que fait la balise <blockquote> ?', 2),
(14, 'la balise <style> necessite une balise fermante', 3),
(15, 'Que veut dire ''CSS''?', 3),
(16, 'Quelle est la balise HTML pour definir une feuille de style interne?', 3),
(17, 'A quel endroit dans un fichier HTML faut-il faire référence a une feuille de style externe?', 3),
(18, 'Quel est le code correct pour associer une feuille de style externe dans un fichier HTML?', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
