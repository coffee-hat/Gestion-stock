-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 31 mars 2022 à 11:09
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api_5hds_gestion_stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `token` varchar(100) NOT NULL,
  `prix` int(100) NOT NULL,
  `stock` int(100) NOT NULL,
  `reference` int(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `description`, `token`, `prix`, `stock`, `reference`, `created_at`, `updated_at`) VALUES
(3, 'patate', '00cfyerMXO', 50, 12, 996, '2022-03-31 11:52:20', '2022-03-31 11:52:20'),
(4, 'pomme de terre', 'Q2 dMIlobz', 5000, 50, 1000, '2022-03-31 11:52:56', '2022-03-31 11:52:56'),
(5, 'produit test', 'Xh1NFVzepo', 666, 100, 500, '2022-03-31 12:52:02', '2022-03-31 12:52:02');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Doe', 'john', '111', 'admin', '2022-03-31 11:12:43', '2022-03-31 11:12:43'),
(5, 'utilisateur test', 'test update', 'WiciW6EPES', 'beta tester', '2022-03-31 12:44:53', '2022-03-31 10:46:24'),
(4, 'michelle', 'michelle', '555', 'user', '2022-03-31 11:31:37', '2022-03-31 10:17:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
