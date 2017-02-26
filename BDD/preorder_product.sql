-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Dim 26 Février 2017 à 11:36
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

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
-- Structure de la table `preorder_product`
--

CREATE TABLE `preorder_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `preorder_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `preorder_product`
--

INSERT INTO `preorder_product` (`id`, `preorder_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 1, 3, 1),
(3, 1, 5, 1),
(4, 1, 7, 1),
(5, 2, 2, 1),
(6, 2, 4, 2),
(7, 2, 6, 2),
(8, 2, 8, 1),
(9, 3, 1, 30),
(10, 3, 2, 30),
(11, 3, 3, 70),
(12, 3, 4, 70),
(13, 3, 5, 70),
(14, 3, 6, 70),
(15, 3, 7, 70),
(16, 3, 8, 70),
(17, 4, 2, 1),
(18, 4, 3, 2),
(19, 4, 7, 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `preorder_product`
--
ALTER TABLE `preorder_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preorder_product_preorder_id_foreign` (`preorder_id`),
  ADD KEY `preorder_product_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `preorder_product`
--
ALTER TABLE `preorder_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
