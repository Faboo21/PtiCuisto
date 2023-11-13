-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql.info.unicaen.fr:3306
-- Généré le : lun. 13 nov. 2023 à 17:55
-- Version du serveur :  10.5.11-MariaDB-1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `leroy223_2`
--

-- --------------------------------------------------------

--
-- Structure de la table `PC_CATEGORIE`
--

CREATE TABLE `PC_CATEGORIE` (
  `CAT_Id` int(11) NOT NULL,
  `CAT_Intitule` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `PC_CATEGORIE`
--

INSERT INTO `PC_CATEGORIE` (`CAT_Id`, `CAT_Intitule`) VALUES
(1, 'entree'),
(2, 'plat'),
(3, 'dessert');

-- --------------------------------------------------------

--
-- Structure de la table `PC_COMMENTAIRE`
--

CREATE TABLE `PC_COMMENTAIRE` (
  `COM_Id` int(11) NOT NULL,
  `UTI_Id` int(11) DEFAULT NULL,
  `COM_Message` varchar(255) NOT NULL,
  `COM_Etat` int(11) DEFAULT 1,
  `REC_Id` int(11) DEFAULT NULL,
  `COM_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `PC_INGREDIENT`
--

CREATE TABLE `PC_INGREDIENT` (
  `ING_Id` int(11) NOT NULL,
  `ING_Intitule` varchar(255) NOT NULL,
  `ING_Statut` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `PC_RECETTE`
--

CREATE TABLE `PC_RECETTE` (
  `REC_Id` int(11) NOT NULL,
  `REC_Titre` varchar(255) NOT NULL,
  `REC_Contenu` text NOT NULL,
  `REC_Resum` text DEFAULT NULL,
  `CAT_Id` int(11) DEFAULT NULL,
  `REC_Image` varchar(500) DEFAULT NULL,
  `REC_DateCreation` date NOT NULL,
  `REC_DateModification` date DEFAULT NULL,
  `UTI_Id` int(11) DEFAULT NULL,
  `REC_Statut` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `PC_RECETTE_INGREDIENT`
--

CREATE TABLE `PC_RECETTE_INGREDIENT` (
  `REC_Id` int(11) NOT NULL,
  `ING_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Structure de la table `PC_RECETTE_TAG`
--

CREATE TABLE `PC_RECETTE_TAG` (
  `REC_Id` int(11) NOT NULL,
  `TAG_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Structure de la table `PC_TAG`
--

CREATE TABLE `PC_TAG` (
  `TAG_Id` int(11) NOT NULL,
  `TAG_Intitule` varchar(255) NOT NULL,
  `TAG_Statut` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `PC_UTILISATEUR`
--

CREATE TABLE `PC_UTILISATEUR` (
  `UTI_Id` int(11) NOT NULL,
  `UTI_Pseudo` varchar(255) NOT NULL,
  `UTI_Mail` varchar(255) NOT NULL,
  `UTI_Prenom` varchar(255) DEFAULT NULL,
  `UTI_Nom` varchar(255) DEFAULT NULL,
  `UTI_DateInscription` date NOT NULL,
  `UTI_TypeUser` int(11) DEFAULT NULL,
  `UTI_Statut` int(11) DEFAULT NULL,
  `uti_mdp` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Index pour la table `PC_CATEGORIE`
--
ALTER TABLE `PC_CATEGORIE`
  ADD PRIMARY KEY (`CAT_Id`);

--
-- Index pour la table `PC_COMMENTAIRE`
--
ALTER TABLE `PC_COMMENTAIRE`
  ADD PRIMARY KEY (`COM_Id`),
  ADD KEY `REC_Id` (`REC_Id`),
  ADD KEY `UTI_Id` (`UTI_Id`);

--
-- Index pour la table `PC_INGREDIENT`
--
ALTER TABLE `PC_INGREDIENT`
  ADD PRIMARY KEY (`ING_Id`);

--
-- Index pour la table `PC_RECETTE`
--
ALTER TABLE `PC_RECETTE`
  ADD PRIMARY KEY (`REC_Id`),
  ADD KEY `CAT_Id` (`CAT_Id`),
  ADD KEY `fk_recette_uti` (`UTI_Id`);

--
-- Index pour la table `PC_RECETTE_INGREDIENT`
--
ALTER TABLE `PC_RECETTE_INGREDIENT`
  ADD PRIMARY KEY (`REC_Id`,`ING_Id`),
  ADD KEY `ING_Id` (`ING_Id`);

--
-- Index pour la table `PC_RECETTE_TAG`
--
ALTER TABLE `PC_RECETTE_TAG`
  ADD PRIMARY KEY (`REC_Id`,`TAG_Id`),
  ADD KEY `TAG_Id` (`TAG_Id`);

--
-- Index pour la table `PC_TAG`
--
ALTER TABLE `PC_TAG`
  ADD PRIMARY KEY (`TAG_Id`);

--
-- Index pour la table `PC_UTILISATEUR`
--
ALTER TABLE `PC_UTILISATEUR`
  ADD PRIMARY KEY (`UTI_Id`),
  ADD UNIQUE KEY `UTI_Pseudo` (`UTI_Pseudo`),
  ADD UNIQUE KEY `UTI_Mail` (`UTI_Mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `PC_CATEGORIE`
--
ALTER TABLE `PC_CATEGORIE`
  MODIFY `CAT_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `PC_COMMENTAIRE`
--
ALTER TABLE `PC_COMMENTAIRE`
  MODIFY `COM_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `PC_INGREDIENT`
--
ALTER TABLE `PC_INGREDIENT`
  MODIFY `ING_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT pour la table `PC_RECETTE`
--
ALTER TABLE `PC_RECETTE`
  MODIFY `REC_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `PC_TAG`
--
ALTER TABLE `PC_TAG`
  MODIFY `TAG_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `PC_UTILISATEUR`
--
ALTER TABLE `PC_UTILISATEUR`
  MODIFY `UTI_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `PC_COMMENTAIRE`
--
ALTER TABLE `PC_COMMENTAIRE`
  ADD CONSTRAINT `PC_COMMENTAIRE_ibfk_1` FOREIGN KEY (`REC_Id`) REFERENCES `PC_RECETTE` (`REC_Id`),
  ADD CONSTRAINT `PC_COMMENTAIRE_ibfk_2` FOREIGN KEY (`UTI_Id`) REFERENCES `PC_UTILISATEUR` (`UTI_Id`);

--
-- Contraintes pour la table `PC_RECETTE`
--
ALTER TABLE `PC_RECETTE`
  ADD CONSTRAINT `PC_RECETTE_ibfk_1` FOREIGN KEY (`CAT_Id`) REFERENCES `PC_CATEGORIE` (`CAT_Id`),
  ADD CONSTRAINT `PC_RECETTE_ibfk_2` FOREIGN KEY (`UTI_Id`) REFERENCES `PC_UTILISATEUR` (`UTI_Id`),
  ADD CONSTRAINT `fk_recette_uti` FOREIGN KEY (`UTI_Id`) REFERENCES `PC_UTILISATEUR` (`UTI_Id`);

--
-- Contraintes pour la table `PC_RECETTE_INGREDIENT`
--
ALTER TABLE `PC_RECETTE_INGREDIENT`
  ADD CONSTRAINT `PC_RECETTE_INGREDIENT_ibfk_1` FOREIGN KEY (`REC_Id`) REFERENCES `PC_RECETTE` (`REC_Id`),
  ADD CONSTRAINT `PC_RECETTE_INGREDIENT_ibfk_2` FOREIGN KEY (`ING_Id`) REFERENCES `PC_INGREDIENT` (`ING_Id`);

--
-- Contraintes pour la table `PC_RECETTE_TAG`
--
ALTER TABLE `PC_RECETTE_TAG`
  ADD CONSTRAINT `PC_RECETTE_TAG_ibfk_1` FOREIGN KEY (`REC_Id`) REFERENCES `PC_RECETTE` (`REC_Id`),
  ADD CONSTRAINT `PC_RECETTE_TAG_ibfk_2` FOREIGN KEY (`TAG_Id`) REFERENCES `PC_TAG` (`TAG_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
