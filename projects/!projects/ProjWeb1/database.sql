
CREATE TABLE IF NOT EXISTS `n31__specialites_CDJ` (
  `id` int(11) NOT NULL,
  `id_specialites` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_specialites`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `n31__specialites_CDJ`
--

INSERT INTO `n31__specialites_CDJ` (`id`, `id_specialites`) VALUES
(1, 2),
(2, 2),
(4, 6),
(4, 8),
(6, 7),
(8, 3),
(13, 8),
(13, 10),
(14, 2),
(14, 3),
(14, 8),
(14, 9),
(14, 10),
(14, 11),
(14, 14),
(14, 15),
(14, 16),
(22, 7),
(22, 8),
(22, 11);


CREATE TABLE IF NOT EXISTS `n31__specialites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `n31__specialites`
--

INSERT INTO `n31__specialites` (`id`, `nom`) VALUES
(1, 'Baignade'),
(2, 'Escalade'),
(3, 'Badminton'),
(4, 'Basketball'),
(5, 'Danse'),
(6, 'Multisport'),
(7, 'Soccer'),
(8, 'Tennis'),
(9, 'Vélo de montagne'),
(10, 'Volleyball'),
(11, 'Art visuel'),
(13, 'Photographie'),
(14, 'Théâtre'),
(15, 'Art visuel'),
(16, 'Arts plastiques');


CREATE TABLE IF NOT EXISTS `n31__service_de_garde` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prix` int(11) NOT NULL,
  `id_CDJ` int(11) NOT NULL,
  `debut` varchar(5) CHARACTER SET utf8 NOT NULL,
  `fin` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `n31__service_de_garde`
--

INSERT INTO `n31__service_de_garde` (`id`, `prix`, `id_CDJ`, `debut`, `fin`) VALUES
(2, 11, 2, '7:00', '18:30'),
(6, 233, 1, '12', '13'),
(7, 12, 3, '6:30', '121'),
(8, 32, 12, 'dasda', 'dasda');


CREATE TABLE IF NOT EXISTS `n31__menu_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET latin1 NOT NULL,
  `lien` varchar(150) CHARACTER SET latin1 NOT NULL,
  `tableau` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ordre` int(11) NOT NULL,
  `requete` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `n31__menu_admin`
--

INSERT INTO `n31__menu_admin` (`id`, `nom`, `lien`, `tableau`, `ordre`, `requete`) VALUES
(1, 'Arrondissements', 'index.php?page=list', 'n31__arrondissements', 5, 'select id , nom as Arrondissement from n31__arrondissements'),
(2, 'Type de CDJ', 'index.php?page=list', 'n31__types_CDJ', 7, 'select id, nom as "Type CDJ" from n31__types_CDJ'),
(3, 'Activites', 'index.php?page=list', 'n31__specialites', 10, 'select id, nom as Activites from n31__specialites'),
(4, 'Camps de Jour', 'index.php?page=list', 'n31__coordonnees_CDJ', 1, 'select t1.id as id, t1.nom_CDJ as "Nom CDJ", t2.nom as Arrondissement, t3.nom as "Type de CDJ"\r\nfrom n31__coordonnees_CDJ as t1\r\ninner join n31__arrondissements as t2\r\non t1.id_arrondissement=t2.id\r\ninner join n31__types_CDJ as t3\r\non t1.id_type=t3.id\r\norder by t1.nom_CDJ , t2.nom, t3.nom'),
(8, 'Service de garde', 'index.php?page=list', 'n31__service_de_garde', 3, 'select t4.id as id, t1.nom_CDJ as "Nom CDJ", t2.nom as Arrondissement, t3.nom as "Type de CDJ"\r\nfrom n31__coordonnees_CDJ as t1\r\ninner join n31__arrondissements as t2\r\non t1.id_arrondissement=t2.id\r\ninner join n31__types_CDJ as t3\r\non t1.id_type=t3.id\r\ninner join n31__service_de_garde as t4\r\non t4.id_CDJ=t1.id\r\norder by t1.nom_CDJ , t2.nom, t3.nom'),
(9, 'Commentaire', 'index.php?page=list', 'n31__commentaires', 3, 'select t4.id as id , t1.nom_CDJ  as "Nom CDJ", t2.nom as Arrondissement, t3.nom as "Type de CDJ",  t4.nom as Nom, t4.date as Date\r\nfrom n31__coordonnees_CDJ as t1\r\ninner join n31__arrondissements as t2\r\non t1.id_arrondissement=t2.id\r\ninner join n31__types_CDJ as t3\r\non t1.id_type=t3.id\r\ninner join n31__commentaires as t4\r\non t4.id_CDJ=t1.id\r\norder by t1.nom_CDJ, t2.nom,t3.nom ');


CREATE TABLE IF NOT EXISTS `n31__groupe_CDJ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `age_min` int(11) NOT NULL,
  `age_max` int(11) NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `prix_CDJ` int(11) NOT NULL,
  `id_coordonnees_CDJ` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `n31__groupe_CDJ`
--

INSERT INTO `n31__groupe_CDJ` (`id`, `debut`, `fin`, `age_min`, `age_max`, `description`, `prix_CDJ`, `id_coordonnees_CDJ`) VALUES
(1, '2015-06-22', '2015-08-21', 10, 17, 'Depuis 2007, le camp phot', 220, 1),
(2, '2015-06-29', '2015-08-21', 4, 17, 'Camp Ecolart offre une va', 965, 2),
(3, '2015-06-22', '2015-08-14', 6, 15, 'L’exposition de l’artiste', 200, 3),
(4, '0000-00-00', '0000-00-00', 12, 13, '12', 2, 3),
(13, '0000-00-00', '0000-00-00', 4, 12, '343243 3432', 233, 7),
(14, '0000-00-00', '0000-00-00', 2, 22, 'dfsdf sds\r\nfdsfsd \r\nouiouiouio', 452, 7),
(19, '0000-00-00', '0000-00-00', 33, 3, 'dsdasd', 22312, 12),
(20, '0000-00-00', '0000-00-00', 6, 11, 'sdasdasdasdasdasdsdsad', 2121, 12),
(21, '0000-00-00', '0000-00-00', 32, 32, '2312', 2323, 13),
(22, '0000-00-00', '0000-00-00', 23, 12, 'sdsad', 1212, 2);


CREATE TABLE IF NOT EXISTS `n31__coordonnees_CDJ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_CDJ` varchar(150) NOT NULL,
  `nom_Contacts` varchar(150) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `courriel` varchar(150) DEFAULT NULL,
  `adresse_site` varchar(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `id_arrondissement` int(11) DEFAULT NULL,
  `description_CDJ` text NOT NULL,
  `id_type` int(5) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `n31__coordonnees_CDJ`
--

INSERT INTO `n31__coordonnees_CDJ` (`id`, `nom_CDJ`, `nom_Contacts`, `adresse`, `telephone`, `courriel`, `adresse_site`, `image`, `id_arrondissement`, `description_CDJ`, `id_type`, `debut`, `fin`) VALUES
(1, 'photo ado Entrequatreyeux Vieux-Montréal', 'Éric Bergevin', '218 Notre-Dame Ouest, Qc, H2Y1T3', '514-567-3225', 'info@entrequatreyeux.com', 'http://www.entrequatreyeux.com', '../images_BD/adoEntrequatreyeux.jpg', 12, 'Depuis 2007, le camp photo Entrequatreyeux est un camp spécialisé qui se consacre uniquement à la photographie.  Il s?adresse aux pré-ados et ados qui profiteront d''équipements et d''installations professionnelles au coeur du Vieux-Montréal. Les participants peuvent emporter leur propre appareil photo et auront aussi accès à notre équipement (nous prêtons des appareils à ceux qui n''en n''ont pas). Idéalement situé, nous profitons du fabuleux décors du Vieux-Montréal pour exercer nos talents.\r\n', 1, '2015-06-22', '2015-08-21'),
(2, 'Camp Écolart   ', 'Mariano Liu', '21,275 Lakeshore Rd. H9X 3L9', '855-326-5278', 'info@ecolart.ca', 'http://www.ecolart.ca', '../images_BD/ecolar.jpg', 7, 'Camp Ecolart offre une variété de programmes différents d''été et d''hiver pour les garçons et les filles âgés de 4 à 17 ans de partout dans le monde. Nous vous offrons: - Camp Relâche (ski et snowboard). - Camp d''hiver (ski et snowboard). - Camp de jour d''été (15 programmes différents). - Camp des Vacances d''été (15 programmes différents).\r\n', 2, '2015-06-29', '2015-08-21'),
(3, 'Musée d''art contemporain de Mtl', 'Luc Guillemette', '185, rue Sainte-Catherine Ouest', '514-847-6266 ', 'camp@macm.org', 'http://www.macm.org/camps', '../images_BD/musee_de_art.jpg', 7, 'L’exposition de l’artiste québécois de renommée internationale David Altmejd sera au cœur de la programmation du Camp de jour. À travers des œuvres spectaculaires conçues avec de multiples matériaux, vous découvrirez un éventail de médiums et de techniques inusités : peinture, dessin, sculpture, sérigraphie sur T-shirt, art numérique et plus encore ! Accompagnés d’une équipe d’animateurs passionnés, vous vivrez un séjour rempli de surprises. Jeux coopératifs, personnages, humour et pique-niques au Jardin de sculptures seront au rendez-vous. Votre passage sera souligné par un vernissage monstre, où vos invités admireront vos nombreuses créations.\r\n', 1, '2015-06-22', '2015-08-14');


CREATE TABLE IF NOT EXISTS `n31__commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `commentaire` text NOT NULL,
  `note` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_CDJ` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `n31__commentaires`
--

INSERT INTO `n31__commentaires` (`id`, `nom`, `commentaire`, `note`, `date`, `id_CDJ`) VALUES
(1, 'SSSS SSSS', 'sdasdasd sdasdasdasdasdasdasdasasdasdasdas', 3, '2015-08-21 04:00:00', 3),
(3, 'sdsad', 'sdasds\n\nasdasdasd', 3, '2015-08-25 21:47:34', 0),
(4, 'sdsad', 'sdasds\r\nasdasdasd', 3, '2015-08-25 21:50:09', 0),
(5, 'sdsad', 'sdasds\r\nasdasdasd', 3, '2015-08-25 21:50:09', 0),
(6, 'sdsad', 'sdasds\r\nasdasdasd', 3, '2015-08-25 21:51:48', 2),
(7, 'sdsad', 'sdasds\r\nasdasdasd', 3, '2015-08-25 21:51:48', 2),
(8, 'dasdas', 'sdsadsdwerqweqeqweqweqweqweqweqweqwqs', 3, '2015-08-25 21:55:25', 2),
(9, 'dasdas', 'sdsadsdwerqweqeqweqweqweqweqweqweqwqs', 3, '2015-08-25 21:55:25', 2),
(10, 'dasdas', 'sdsadsdwerqweqeqweqweqweqweqweqweqwqs', 3, '2015-08-25 21:59:19', 2),
(11, 'dasdas', 'sdsadsdwerqweqeqweqweqweqweqweqweqwqs', 3, '2015-08-25 21:59:19', 2),
(12, 'dasdas', 'sdsadsdwerqweqeqweqweqweqweqweqweqwqs', 3, '2015-08-25 22:06:31', 2),
(13, 'dasdas', 'sdsadsdwerqweqeqweqweqweqweqweqweqwqs', 3, '2015-08-25 22:06:33', 2),
(14, 'ddasdasd', 'erwerwedasdasdasd\r\nsdsdasdas', 3, '2015-08-27 02:18:37', 1),
(19, 'fsdfsd', 'fsdfsdf', 4, '2015-08-30 22:07:59', 1),
(20, 'fsdfsd', 'fsdfsdf', 4, '2015-08-30 22:08:06', 1),
(21, 'fsdfsd', 'fsdfsdf', 4, '2015-08-30 22:10:21', 1);



CREATE TABLE IF NOT EXISTS `n31__arrondissements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `n31__arrondissements`
--

INSERT INTO `n31__arrondissements` (`id`, `nom`) VALUES
(1, 'Rosemont'),
(2, 'Ahuntsic-Cartierville'),
(3, 'Verdun'),
(4, 'Outremont	'),
(5, 'La Salle'),
(7, ' Sainte-Anne-de-Bellevue'),
(12, 'Montréal');


CREATE TABLE IF NOT EXISTS `n31__types_CDJ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `n31__types_CDJ`
--

INSERT INTO `n31__types_CDJ` (`id`, `nom`) VALUES
(1, 'thématique'),
(2, 'régulier'),
(3, 'spécialisées ');


CREATE TABLE IF NOT EXISTS `n31__admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courriel` varchar(150) CHARACTER SET latin1 NOT NULL,
  `passwd` varchar(150) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `n31__admin`
--

INSERT INTO `n31__admin` (`id`, `courriel`, `passwd`) VALUES
(1, 'admin', '$1$3fKvIWZI$duVxk/Pm4AEvr4AFI3obJ.');
