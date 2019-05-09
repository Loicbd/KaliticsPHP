-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 09 mai 2019 à 15:13
-- Version du serveur :  10.3.7-MariaDB
-- Version de PHP :  5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Kalitics`
--

-- --------------------------------------------------------

--
-- Structure de la table `Marque`
--

CREATE TABLE `Marque` (
  `idMarque` int(11) NOT NULL,
  `nomMarque` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Marque`
--

INSERT INTO `Marque` (`idMarque`, `nomMarque`) VALUES
(1, 'Renault'),
(2, 'Citroën');

-- --------------------------------------------------------

--
-- Structure de la table `Type`
--

CREATE TABLE `Type` (
  `idType` int(11) NOT NULL,
  `nomType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Type`
--

INSERT INTO `Type` (`idType`, `nomType`) VALUES
(1, 'Camion'),
(2, 'Voiture');

-- --------------------------------------------------------

--
-- Structure de la table `Vehicule`
--

CREATE TABLE `Vehicule` (
  `idVehicule` int(11) NOT NULL,
  `couleurVehicule` text NOT NULL,
  `idMarqueVehicule` int(11) NOT NULL,
  `idTypeVehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Vehicule`
--

INSERT INTO `Vehicule` (`idVehicule`, `couleurVehicule`, `idMarqueVehicule`, `idTypeVehicule`) VALUES
(1, 'Rouge', 1, 2),
(3, 'Orange', 2, 1),
(4, 'Gris', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `VehiculeType`
--

CREATE TABLE `VehiculeType` (
  `idVehiculeVT` int(11) NOT NULL,
  `idTypeVT` int(11) NOT NULL,
  `nombreRoueVT` int(11) DEFAULT NULL,
  `poidVT` int(11) DEFAULT NULL,
  `decapotableVT` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `VehiculeType`
--

INSERT INTO `VehiculeType` (`idVehiculeVT`, `idTypeVT`, `nombreRoueVT`, `poidVT`, `decapotableVT`) VALUES
(1, 2, NULL, NULL, 0),
(3, 1, 5, 500, 1),
(4, 1, 8, 4, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Marque`
--
ALTER TABLE `Marque`
  ADD PRIMARY KEY (`idMarque`);

--
-- Index pour la table `Type`
--
ALTER TABLE `Type`
  ADD PRIMARY KEY (`idType`);

--
-- Index pour la table `Vehicule`
--
ALTER TABLE `Vehicule`
  ADD PRIMARY KEY (`idVehicule`),
  ADD KEY `idMarqueVehicule` (`idMarqueVehicule`),
  ADD KEY `idTypeVehicule` (`idTypeVehicule`);

--
-- Index pour la table `VehiculeType`
--
ALTER TABLE `VehiculeType`
  ADD PRIMARY KEY (`idVehiculeVT`,`idTypeVT`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Marque`
--
ALTER TABLE `Marque`
  MODIFY `idMarque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Type`
--
ALTER TABLE `Type`
  MODIFY `idType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Vehicule`
--
ALTER TABLE `Vehicule`
  MODIFY `idVehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Vehicule`
--
ALTER TABLE `Vehicule`
  ADD CONSTRAINT `Vehicule_ibfk_1` FOREIGN KEY (`idMarqueVehicule`) REFERENCES `Marque` (`idMarque`),
  ADD CONSTRAINT `Vehicule_ibfk_2` FOREIGN KEY (`idTypeVehicule`) REFERENCES `Type` (`idType`);

--
-- Contraintes pour la table `VehiculeType`
--
ALTER TABLE `VehiculeType`
  ADD CONSTRAINT `VehiculeType_ibfk_1` FOREIGN KEY (`idVehiculeVT`) REFERENCES `Vehicule` (`idVehicule`),
  ADD CONSTRAINT `VehiculeType_ibfk_2` FOREIGN KEY (`idTypeVT`) REFERENCES `Type` (`idType`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
