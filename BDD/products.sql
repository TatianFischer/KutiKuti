-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Lun 03 Avril 2017 à 11:59
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kutikuti`
--

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `modele` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couleur` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `modele`, `couleur`, `price`, `photo`) VALUES
(1, 'LapiKuti', 'gris', 28, 'lapikuti_gris.png'),
(2, 'LapiKuti', 'parme', 28, 'lapikuti_parme.png'),
(3, 'Kuti1', 'gris', 8, 'kuti1_gris.png'),
(4, 'Kuti1', 'parme', 8, 'kuti1_parme.png'),
(5, 'Kuti3', 'gris', 8, 'kuti3_gris.png'),
(6, 'Kuti3', 'parme', 8, 'kuti3_parme.png'),
(7, 'Kuti5', 'gris', 8, 'kuti5_gris.png'),
(8, 'Kuti5', 'parme', 8, 'kuti5_parme.png');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
