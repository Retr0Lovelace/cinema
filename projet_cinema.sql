-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 05 mai 2021 à 01:20
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `api_id` int NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `api_id` (`api_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `api_id`) VALUES
(15, 9312),
(8, 38700),
(11, 283566),
(17, 299534),
(16, 299536),
(13, 384018),
(14, 475557),
(9, 495764),
(6, 508442),
(18, 524251),
(3, 527774),
(10, 592350),
(5, 602269),
(2, 615457),
(4, 635302),
(7, 649087),
(1, 791373),
(12, 796849);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id` int NOT NULL AUTO_INCREMENT,
  `api_id` int NOT NULL,
  `capacité` int NOT NULL,
  `h_entree` time NOT NULL,
  `h_sorti` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_api_id` (`api_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `api_id`, `capacité`, `h_entree`, `h_sorti`) VALUES
(1, 475557, 100, '22:39:13', '22:59:13'),
(2, 38700, 100, '09:51:28', '09:53:30');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(0, 'aze', 'aze@mail.fr', '$2y$10$ql2yiQpXErzABt7EVS6pLOLrScTh6t0vSQ9fOZrbdSNf1lKBDZRKK', 1),
(6, 'az', 'az@az.az', '$2y$10$JiX0VxXbOKMWPY7nLFtyluGprwy/nbrsiggruVQgLuzIPWjBeTw9O', 2);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `fk_api_id` FOREIGN KEY (`api_id`) REFERENCES `film` (`api_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
