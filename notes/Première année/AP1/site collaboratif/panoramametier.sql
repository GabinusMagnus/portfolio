-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 14 oct. 2021 à 07:18
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `panoramametier`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `ID_ART` int(11) NOT NULL AUTO_INCREMENT,
  `TITRE_ART` varchar(60) NOT NULL,
  `DESCR_ART` varchar(240) NOT NULL,
  `SALAIRE_ART` int(5) DEFAULT '0',
  `DATE_PROP_ART` date NOT NULL,
  `DATE_DERNIER_TT_ART` date DEFAULT NULL,
  `ID_CONT` int(5) NOT NULL,
  `ID_CAT` int(5) NOT NULL,
  `STATUS_ART` char(1) DEFAULT 'P',
  PRIMARY KEY (`ID_ART`),
  KEY `ID_CONT` (`ID_CONT`),
  KEY `ID_CAT` (`ID_CAT`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID_ART`, `TITRE_ART`, `DESCR_ART`, `SALAIRE_ART`, `DATE_PROP_ART`, `DATE_DERNIER_TT_ART`, `ID_CONT`, `ID_CAT`, `STATUS_ART`) VALUES
(1, 'Professeur Informatique', 'Enseignement des bases de l\'informatique jusqu\'aux notions les plus avancees', 1000, '2010-12-30', '2011-01-30', 2, 4, 'R'),
(2, 'developpeur fou', 'Il code, codait codera. Sa vie : coder', 10000, '2012-10-30', '2012-11-03', 3, 2, 'D'),
(3, 'devsecopps', 'Tous vos sites du sol au plafond : le contenu , la structure , l\'hebergement et la securite. Il fait absolument tout', 5000, '2020-10-30', '2020-09-30', 3, 3, 'A'),
(4, 'Referenceur', 'Sans son intervention, pas de visites sur le site et les ventes stagnent', 2000, '2020-09-30', '2021-09-29', 3, 2, 'R'),
(5, 'Directeur si', 'Cheef between the chief ! Au firmament de l\'organigramme. Apres des annees d\'experiences, une somme colossale de projets, des etudes de dingues, et le massacre de tous ses concurrents. Il s\'est taille la part du lion', 20000, '2020-09-09', '2021-09-29', 3, 4, 'A'),
(6, 'Data analyst', 'il fait parler les chiffres. Le poete du tableau de bord,le chercheur de correlation a tout crin', 30000, '2020-07-31', '2021-09-29', 2, 1, 'R'),
(7, 'developpeur android', 'sans lui pas d\'appli google sur vos bijoux de petits mobiles ', 10000, '2020-06-06', '2021-09-29', 2, 2, 'A'),
(8, 'developpeur full stack', 'En front ou en back i, il assure ', 10000, '2020-06-06', '2021-09-29', 2, 2, 'A');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ID_CAT` int(11) NOT NULL AUTO_INCREMENT,
  `LIBELLE_CATEG` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_CAT`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID_CAT`, `LIBELLE_CATEG`) VALUES
(1, 'reseau'),
(2, 'developpement'),
(3, 'cybersecurite'),
(4, 'jeux video');

-- --------------------------------------------------------

--
-- Structure de la table `internaute`
--

DROP TABLE IF EXISTS `internaute`;
CREATE TABLE IF NOT EXISTS `internaute` (
  `ID_UT` int(11) NOT NULL AUTO_INCREMENT,
  `COURRIEL_UT` varchar(50) NOT NULL,
  `MDP_UT` varchar(100) NOT NULL,
  `STATUS_UT` char(1) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`ID_UT`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `internaute`
--

INSERT INTO `internaute` (`ID_UT`, `COURRIEL_UT`, `MDP_UT`, `STATUS_UT`) VALUES
(1, 'alfred.pignon@gmail.com', 'Bulbes', 'a'),
(2, 'abignon.ledantec@gmail.com', 'Plantes', 'c'),
(3, 'lguibout.ledantec@gmail.com', 'arbres', 'c');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
