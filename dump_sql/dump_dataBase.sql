-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 18 Mai 2017 à 17:39
-- Version du serveur :  5.6.33
-- Version de PHP :  7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `espace_membre`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mot_passe` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `prenom`, `nom`, `mot_passe`) VALUES
(18, 'alexis', 'leleu', 'a85545d0c4c9db81d990593cc99c4a912e1f4f84');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `id_region` int(5) NOT NULL,
  `region` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `region`
--

INSERT INTO `region` (`id`, `id_region`, `region`) VALUES
(1, 1, 'île-de-france'),
(2, 2, 'bretagbe'),
(3, 3, 'alsace'),
(4, 4, 'PACA'),
(5, 5, 'aquitaine'),
(6, 6, 'centre');

-- --------------------------------------------------------

--
-- Structure de la table `revues`
--

CREATE TABLE `revues` (
  `id` int(11) NOT NULL,
  `num_revue` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `couverture` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `revues`
--

INSERT INTO `revues` (`id`, `num_revue`, `description`, `couverture`) VALUES
(19, 201, 'lorem', 'couv_201.jpg'),
(20, 202, 'lorem', 'couv_202.jpg'),
(21, 203, 'lorem', 'couv_203.jpg'),
(22, 204, 'lorem', 'couv_204.jpg'),
(23, 205, 'lorem', 'couv_205.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `revues/region`
--

CREATE TABLE `revues/region` (
  `id` int(11) NOT NULL,
  `num_revues` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `revues/region`
--

INSERT INTO `revues/region` (`id`, `num_revues`, `id_region`) VALUES
(1, 255, 1),
(2, 255, 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `revues`
--
ALTER TABLE `revues`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `revues/region`
--
ALTER TABLE `revues/region`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `revues`
--
ALTER TABLE `revues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `revues/region`
--
ALTER TABLE `revues/region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;