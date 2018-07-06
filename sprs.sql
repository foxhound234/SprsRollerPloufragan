-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 juil. 2018 à 11:56
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sprs`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `NOADHERENT` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(40) NOT NULL,
  `PRENOM` varchar(40) NOT NULL,
  `ADRESSE` varchar(128) DEFAULT NULL,
  `VILLE` varchar(40) DEFAULT NULL,
  `CODEPOSTAL` int(11) DEFAULT NULL,
  `EMAIL` varchar(38) NOT NULL,
  `MOTDEPASSE` varchar(30) NOT NULL,
  `PROFIL` varchar(30) NOT NULL,
  PRIMARY KEY (`NOADHERENT`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`NOADHERENT`, `NOM`, `PRENOM`, `ADRESSE`, `VILLE`, `CODEPOSTAL`, `EMAIL`, `MOTDEPASSE`, `PROFIL`) VALUES
(5, 'Leberre', 'Mathieu', '', 'saintbrieuc', 0, 'morganlb@hotmail.fr', 'Angetest', 'J'),
(2, 'Morin', 'jeanfrancois', '', 'ploufragan', 22440, 'morganlb@hotmail.fr', 'jeantest', 'C'),
(3, 'Le BERRE', 'Morgan', 'rue2', 'ploufragan', 22440, 'morganlb@protonmail.com', 'jeantest', 'A'),
(4, 'Le berre', 'Aurelie', '', 'brest', 0, 'morganlb@protonmail.com', 'sexion2424', 'S');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `NOCATEGORIE` int(11) NOT NULL AUTO_INCREMENT,
  `LIBELLE` varchar(50) NOT NULL,
  PRIMARY KEY (`NOCATEGORIE`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`NOCATEGORIE`, `LIBELLE`) VALUES
(1, 'vetement'),
(2, 'matériel');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `NOCOMMANDE` int(11) NOT NULL AUTO_INCREMENT,
  `NOADHERENT` int(11) NOT NULL,
  `DATECOMMANDE` datetime NOT NULL,
  `DATETRAITEMENT` datetime DEFAULT NULL,
  PRIMARY KEY (`NOCOMMANDE`),
  KEY `I_FK_COMMANDE_ADHERENT` (`NOADHERENT`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`NOCOMMANDE`, `NOADHERENT`, `DATECOMMANDE`, `DATETRAITEMENT`) VALUES
(1, 4, '2018-06-20 08:15:55', '2018-06-20 08:27:36'),
(2, 4, '2018-06-20 08:19:11', '2018-06-20 13:20:09'),
(3, 4, '2018-06-20 13:26:45', '2018-06-20 13:27:13'),
(4, 4, '2018-06-20 13:30:19', '2018-06-20 13:30:47'),
(5, 4, '2018-06-20 13:34:11', '2018-06-20 13:35:00'),
(6, 4, '2018-06-20 13:36:48', '2018-06-20 13:37:25'),
(7, 4, '2018-06-20 13:37:03', '2018-06-20 13:38:32'),
(8, 4, '2018-06-20 13:58:45', '2018-06-20 14:00:02');

-- --------------------------------------------------------

--
-- Structure de la table `disponible_taille`
--

DROP TABLE IF EXISTS `disponible_taille`;
CREATE TABLE IF NOT EXISTS `disponible_taille` (
  `NOTAILLE` int(11) NOT NULL,
  `NOPRODUIT` int(11) NOT NULL,
  PRIMARY KEY (`NOTAILLE`,`NOPRODUIT`),
  KEY `I_FK_DISPONIBLE_TAILLE_TAILLE` (`NOTAILLE`),
  KEY `I_FK_DISPONIBLE_TAILLE_PRODUIT` (`NOPRODUIT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `disponible_taille`
--

INSERT INTO `disponible_taille` (`NOTAILLE`, `NOPRODUIT`) VALUES
(3, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `NOEQUIPE` int(11) NOT NULL AUTO_INCREMENT,
  `NOLIGUE` int(11) NOT NULL,
  `NOADHERENT` int(11) NOT NULL,
  `NOMEQUIPE` varchar(50) NOT NULL,
  `IMAGE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NOEQUIPE`),
  KEY `I_FK_EQUIPE_LIGUE` (`NOLIGUE`),
  KEY `I_FK_EQUIPE_ADHERENT` (`NOADHERENT`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`NOEQUIPE`, `NOLIGUE`, `NOADHERENT`, `NOMEQUIPE`, `IMAGE`) VALUES
(1, 2, 2, 'SeniorM1', 'N1.jpg'),
(2, 4, 2, 'SeniorM2', 'n3.jpg'),
(3, 1, 2, 'SeniorM3', 'seniorM3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `NOEVENEMENT` int(11) NOT NULL AUTO_INCREMENT,
  `DATEEVENEMENT` datetime NOT NULL,
  `NOEQUIPE` int(11) NOT NULL,
  `NOMEVENEMENT` varchar(50) NOT NULL,
  `DETAILEVENEMENT` varchar(255) NOT NULL,
  `NOMIMAGE` varchar(50) DEFAULT NULL,
  `LIEN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`NOEVENEMENT`,`DATEEVENEMENT`),
  KEY `I_FK_EVENEMENT_EQUIPE` (`NOEQUIPE`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`NOEVENEMENT`, `DATEEVENEMENT`, `NOEQUIPE`, `NOMEVENEMENT`, `DETAILEVENEMENT`, `NOMIMAGE`, `LIEN`) VALUES
(1, '2018-05-06 00:00:00', 1, 'Ploufragan   Lyon le debrief ', 'Le Ploufraganais David Abreu (à gauche) a marqué par trois fois contre Lyon', 'plouf-lyon.jpg', 'https://www.letelegramme.fr/rink-hockey/ploufragan-s-en-sort-06-05-2018-11950291.php'),
(2, '2018-07-02 00:00:00', 1, 'Nantes   Ploufragan', 'Patricio Joao en action pour Ploufragan.Toujours en lice pour une qualification européenne, les protégés de Jean-François Morin se déplacent, ce week-end, en terre nantaise. Au classement, les Costarmoricains devancent les Ligériens d\'un petit point en mi', 'patricio-joar-en-action-pour-ploufragan.jpg', 'http://www.rollersprs.fr/index.php?option=com_content&view=article&id=226:nantes-sprs-2017-2018&cati'),
(3, '2018-07-02 00:00:00', 1, 'un catalan en renfort a Ploufragan ', 'Le nouveau président Yves Marie Donval (à gauche) commence bien son nouveau mandat\r\n\r\nLe Catalan Edgar Peralta Taboada encadré du nouveau et de l\'ancien président vient de poser ses valises à Ploufragan.\r\n\r\nAprès les départs de l\'Argentin Federico Bocchi ', 'Edgar Peralta Taboada.jpg', 'https://www.letelegramme.fr/rink-hockey/un-catalan-en-renfort-a-ploufragan-02-07-2018-12014258.php');

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

DROP TABLE IF EXISTS `jouer`;
CREATE TABLE IF NOT EXISTS `jouer` (
  `NOJOUEUR` int(11) NOT NULL,
  `NOEQUIPE` int(11) NOT NULL,
  PRIMARY KEY (`NOJOUEUR`,`NOEQUIPE`),
  KEY `I_FK_JOUER_JOUEUR` (`NOJOUEUR`),
  KEY `I_FK_JOUER_EQUIPE` (`NOEQUIPE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jouer`
--

INSERT INTO `jouer` (`NOJOUEUR`, `NOEQUIPE`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `NOJOUEUR` int(11) NOT NULL AUTO_INCREMENT,
  `NOADHERENT` int(11) NOT NULL,
  `BIOGRAPHIE` varchar(255) DEFAULT NULL,
  `IMAGEJOUEUR` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NOJOUEUR`),
  UNIQUE KEY `I_FK_JOUEUR_ADHERENT` (`NOADHERENT`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`NOJOUEUR`, `NOADHERENT`, `BIOGRAPHIE`, `IMAGEJOUEUR`) VALUES
(1, 5, '', 'mathieu.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `ligne`
--

DROP TABLE IF EXISTS `ligne`;
CREATE TABLE IF NOT EXISTS `ligne` (
  `NOCOMMANDE` int(11) NOT NULL,
  `NOPRODUIT` int(11) NOT NULL,
  `QUANTITECOMMANDEE` double(13,2) NOT NULL,
  PRIMARY KEY (`NOCOMMANDE`,`NOPRODUIT`),
  KEY `I_FK_LIGNE_COMMANDE` (`NOCOMMANDE`),
  KEY `I_FK_LIGNE_PRODUIT` (`NOPRODUIT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligne`
--

INSERT INTO `ligne` (`NOCOMMANDE`, `NOPRODUIT`, `QUANTITECOMMANDEE`) VALUES
(7, 1, 1.00),
(6, 1, 1.00),
(5, 1, 1.00),
(4, 1, 1.00),
(3, 1, 1.00),
(2, 1, 1.00),
(1, 1, 1.00),
(8, 1, 1.00);

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

DROP TABLE IF EXISTS `ligue`;
CREATE TABLE IF NOT EXISTS `ligue` (
  `NOLIGUE` int(11) NOT NULL AUTO_INCREMENT,
  `NOMLIGUE` varchar(50) NOT NULL,
  PRIMARY KEY (`NOLIGUE`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligue`
--

INSERT INTO `ligue` (`NOLIGUE`, `NOMLIGUE`) VALUES
(1, 'u18'),
(2, 'N1'),
(3, 'N2'),
(4, 'N3'),
(5, 'u20'),
(6, 'Prenational'),
(7, 'u16'),
(8, 'u14'),
(9, 'u12');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `NOPRODUIT` int(11) NOT NULL AUTO_INCREMENT,
  `NOCATEGORIE` int(11) NOT NULL,
  `LIBELLE` varchar(128) NOT NULL,
  `DETAIL` varchar(255) NOT NULL,
  `PRIXHT` decimal(10,2) NOT NULL,
  `TAUXTVA` decimal(10,2) NOT NULL,
  `NOMIMAGE` varchar(50) DEFAULT NULL,
  `QUANTITEENSTOCK` double(13,2) NOT NULL,
  `DATEAJOUT` date NOT NULL,
  `DISPONIBLE` tinyint(1) NOT NULL,
  PRIMARY KEY (`NOPRODUIT`),
  KEY `I_FK_PRODUIT_CATEGORIE` (`NOCATEGORIE`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`NOPRODUIT`, `NOCATEGORIE`, `LIBELLE`, `DETAIL`, `PRIXHT`, `TAUXTVA`, `NOMIMAGE`, `QUANTITEENSTOCK`, `DATEAJOUT`, `DISPONIBLE`) VALUES
(4, 2, 'cross', 'c\'est la cross parfaite pour des match', '20.00', '20.00', 'crossrinkhockey.jpg', 10.00, '2018-06-27', 1),
(5, 2, 'cross  de gardien', 'Crosse en bois ultra léger renforcé par de la fibre de carbone. ', '12.00', '20.00', 'crosses-hockey-gardien.jpg', 12.00, '2018-06-28', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
CREATE TABLE IF NOT EXISTS `sponsor` (
  `NOSPONSOR` int(11) NOT NULL AUTO_INCREMENT,
  `NOMSPONSOR` varchar(50) NOT NULL,
  `IMAGE` varchar(50) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `SITEWEB` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`NOSPONSOR`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sponsor`
--

INSERT INTO `sponsor` (`NOSPONSOR`, `NOMSPONSOR`, `IMAGE`, `EMAIL`, `SITEWEB`) VALUES
(1, 'HarmonieMutuelle', 'Harmonie.jpg', 'test@gmail.fr', 'https://www.harmonie-mutuelle.fr/web/tout-harmonie'),
(2, 'breizhcola', 'LogobreizhCola.png', 'test@hotmail.fr', 'http://www.breizhcola.fr/'),
(3, 'groupama', 'Groupama.jpg', 'test@gmail.fr', 'https://www.groupama.fr/'),
(4, 'Decathlon', 'decathlon.jpg', 'test@gmail.fr', 'https://www.decathlon.fr/'),
(5, 'Geant casino', 'geant-casino.jpg', 'test@gmail.fr', 'https://www.geantcasino.fr/'),
(6, 'Awel', 'AWEL.JPG', 'test@hotmail.fr', 'http://www.awelinterim.com/'),
(7, 'ELECLERC', 'logo-e.leclerc.png', 'test@gmail.fr', 'http://www.e-leclerc.com/'),
(8, 'Joueclub ', 'JouéClub.jpg', 'test@gmail.fr', 'https://www.joueclub.fr/'),
(9, 'ALLIANZ ', 'allianza.jpg', 'test@gmail.fr', 'https://www.allianz.fr/'),
(10, 'IXINA', '1256_logo_ixina_cuisine.jpg', 'test@gmail.fr', 'https://www.ixina.fr/'),
(11, 'TELEGRAMME', 'logo-telegramme.jpg', 'test@gmail.fr', 'https://www.letelegramme.fr/'),
(12, 'SCHMIDT', 'schmidtjpg.jpg', 'test@gmail.fr', 'https://www.home-design.schmidt/fr-fr'),
(13, 'ELLEDOG', 'logo-elle-dog.jpg', 'test@gmail.fr', 'http://www.ploufragan.fr/service/elledog'),
(14, ' PlaneteScoot ', 'planete-scoot.jpg', 'test@gmail.fr', 'https://www.le-site-de.com/mbk-planete-scoot-concess.-ploufragan_203527.html'),
(15, 'carpontoptique', 'carpontoptique.jpg', 'test@gmail.fr', 'https://www.citymalin.com/carpont_optique_ploufragan_22440.html'),
(16, 'CreditAgricole', 'logoCreditAgricole.jpg', 'test@gmail.fr', 'https://www.credit-agricole.fr/'),
(17, 'LDCouverture ', 'ldcouverture.jpg', 'test@gmail.fr', 'http://www.ld-couverture.com/'),
(18, 'rioche peinture', 'logo-patin-carrosserie.jpg', 'test@gmail.fr', 'http://www.ploufragan.fr/service/rioche-peinture'),
(19, 'BODEMERAUTO', 'bodemerauto.jpg', 'test@gmail.fr', 'https://www.bodemerauto.com/'),
(20, 'Discom', 'discom_0001.jpg', 'test@gmail.fr', 'https://www.pagesjaunes.fr/pros/08371636'),
(21, 'Garage de la LOGE', 'image1.jpg', 'test@gmail.fr', 'http://www.garage-delaloge.fr/contact/');

-- --------------------------------------------------------

--
-- Structure de la table `sponsorise`
--

DROP TABLE IF EXISTS `sponsorise`;
CREATE TABLE IF NOT EXISTS `sponsorise` (
  `NOSPONSOR` int(11) NOT NULL,
  `NOEVENEMENT` int(11) NOT NULL,
  `DATEEVENEMENT` datetime NOT NULL,
  PRIMARY KEY (`NOSPONSOR`,`NOEVENEMENT`,`DATEEVENEMENT`),
  KEY `I_FK_SPONSORISE_SPONSOR` (`NOSPONSOR`),
  KEY `I_FK_SPONSORISE_EVENEMENT` (`NOEVENEMENT`,`DATEEVENEMENT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `taille`
--

DROP TABLE IF EXISTS `taille`;
CREATE TABLE IF NOT EXISTS `taille` (
  `NOTAILLE` int(11) NOT NULL AUTO_INCREMENT,
  `NOMTAILLE` varchar(50) NOT NULL,
  PRIMARY KEY (`NOTAILLE`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `taille`
--

INSERT INTO `taille` (`NOTAILLE`, `NOMTAILLE`) VALUES
(1, 'XL'),
(3, 'aucune'),
(4, 'L'),
(5, 'M'),
(6, 'S');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
