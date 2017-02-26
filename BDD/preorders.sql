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
-- Structure de la table `preorders`
--

CREATE TABLE `preorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `preorders`
--

INSERT INTO `preorders` (`id`, `firstname`, `lastname`, `email`, `address`, `city`, `cp`, `total`, `created_at`, `updated_at`) VALUES
(1, 'Tatiana', 'Fischer', 'tatianaflo@hotmail.fr', '82 avenue Denfert Rochereau', 'Paris', 75014, 52, '2017-02-25 16:05:24', '2017-02-25 16:05:24'),
(2, 'Alice', 'Merveilles', 'alice.merveilles@miroir.fr', 'Chez le Chapelier Fou', 'Wonderland', 0, 68, '2017-02-25 16:07:54', '2017-02-25 16:07:54'),
(3, 'Najat', 'Vallaud-Belkacem', 'ministre@education.fr', 'rue de Grenelle', 'Paris', 75007, 5040, '2017-02-26 11:12:15', '2017-02-26 11:12:15'),
(4, 'Maman', 'Ours', 'miel@pyrennées.net', 'rue du bois', 'Laruns', 64440, 60, '2017-02-26 11:33:13', '2017-02-26 11:33:13');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `preorders`
--
ALTER TABLE `preorders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `preorders_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `preorders`
--
ALTER TABLE `preorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
