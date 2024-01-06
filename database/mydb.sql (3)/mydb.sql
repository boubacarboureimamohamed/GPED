-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 12 nov. 2018 à 09:12
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `code_action` varchar(2) NOT NULL,
  `libelle_action` char(50) NOT NULL,
  `code_programme` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `action`
--

INSERT INTO `action` (`code_action`, `libelle_action`, `code_programme`) VALUES
('10', 'Action Test', '100'),
('11', 'Action Essaie', '101'),
('12', 'Action Essaie', '102'),
('13', 'Action Test', '105'),
('15', 'Action Test', '125'),
('18', 'Fête', '180'),
('35', 'Essaie', '135'),
('50', 'Test', '150');

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `code_activite` varchar(2) NOT NULL,
  `libelle_activite` char(50) NOT NULL,
  `code_action` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`code_activite`, `libelle_activite`, `code_action`) VALUES
('10', 'Activité Test', '10'),
('11', 'Activité Essaie', '11'),
('12', 'Activité Essaie', '12'),
('13', 'Activité Test', '13'),
('18', 'Fête', '18'),
('20', 'Activité Test', '15'),
('35', 'Essaie', '35'),
('50', 'Test', '50');

-- --------------------------------------------------------

--
-- Structure de la table `bon_engagement`
--

CREATE TABLE `bon_engagement` (
  `num_bon` int(3) NOT NULL,
  `date_bon` date NOT NULL,
  `code_imputation` int(6) NOT NULL,
  `ref_piece` varchar(30) NOT NULL,
  `nature_depense` text NOT NULL,
  `credit_disponible` int(15) NOT NULL,
  `montant_total` int(15) NOT NULL,
  `montant_engage` int(15) NOT NULL,
  `disponible_apres` int(15) NOT NULL,
  `quantite` int(15) NOT NULL,
  `code_programme` varchar(3) NOT NULL,
  `nif_frs` varchar(7) NOT NULL,
  `id_gestion` int(2) NOT NULL,
  `id_type` int(2) NOT NULL,
  `id_etat` int(2) NOT NULL,
  `code_compte` int(5) NOT NULL,
  `code_categorie` int(1) NOT NULL,
  `code_section` varchar(2) NOT NULL,
  `code_service` varchar(2) NOT NULL,
  `code_reglement` varchar(1) NOT NULL,
  `code_depense` varchar(1) NOT NULL,
  `code_action` varchar(2) NOT NULL,
  `code_activite` varchar(2) NOT NULL,
  `code_tache` varchar(2) NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0',
  `date_valide` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bon_engagement`
--

INSERT INTO `bon_engagement` (`num_bon`, `date_bon`, `code_imputation`, `ref_piece`, `nature_depense`, `credit_disponible`, `montant_total`, `montant_engage`, `disponible_apres`, `quantite`, `code_programme`, `nif_frs`, `id_gestion`, `id_type`, `id_etat`, `code_compte`, `code_categorie`, `code_section`, `code_service`, `code_reglement`, `code_depense`, `code_action`, `code_activite`, `code_tache`, `etat`, `date_valide`) VALUES
(1, '2017-10-11', 152482, '125/CT', 'Essaie d\'insertion', 10000, 5000, 5000, 5000, 5, '101', '75120/T', 1, 2, 0, 12512, 0, '64', '6', '1', '1', '12', '12', '12', 1, '2018-11-14'),
(2, '2018-09-14', 150642, '125/CT', 'Test', 5000, 200, 200, 4800, 2, '150', '75120/T', 2, 1, 0, 15014, 0, '17', '1', '1', '2', '50', '50', '50', 0, '2018-11-07'),
(3, '2017-09-27', 135143, '125/CT', 'Essaie', 10000, 450, 450, 9550, 3, '135', '97914/T', 1, 2, 0, 13549, 0, '1', '0', '0', '1', '35', '35', '35', 1, '2017-10-14'),
(4, '2018-12-18', 180052, '125/CT', 'Fête', 5000, 1000, 1000, 4000, 2, '180', '62434/T', 2, 1, 0, 18055, 0, '5', '0', '1', '2', '18', '18', '18', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `code_categorie` varchar(1) NOT NULL,
  `libelle_categorie` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `code_compte` int(5) NOT NULL,
  `intitule` char(50) NOT NULL,
  `pu` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`code_compte`, `intitule`, `pu`) VALUES
(12510, 'Compte Test', 1000),
(12511, 'Compte Essaie', 2000),
(12512, 'Compte Test', 3000),
(13549, 'Essaie', 150),
(15014, 'Test', 100),
(17509, 'Compte Test', 100),
(18055, 'Fête', 500);

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

CREATE TABLE `depense` (
  `code_depense` varchar(1) NOT NULL,
  `libelle_depense` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `depense`
--

INSERT INTO `depense` (`code_depense`, `libelle_depense`) VALUES
('1', 'Dépense Éventuelle (1)'),
('2', 'Marché Dépense Permanente (2)');

-- --------------------------------------------------------

--
-- Structure de la table `etat_bon_engagement`
--

CREATE TABLE `etat_bon_engagement` (
  `id_etat` int(2) NOT NULL,
  `etat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `nif_frs` varchar(7) NOT NULL,
  `nom` char(50) NOT NULL,
  `prenom` char(25) NOT NULL,
  `ville` char(15) NOT NULL,
  `pays` char(15) NOT NULL,
  `adresse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`nif_frs`, `nom`, `prenom`, `ville`, `pays`, `adresse`) VALUES
('14097/T', 'Goma', 'Djibrine', 'Niamey', 'Niamey', 'Boukoki'),
('30917/T', 'Ali Gambo', 'Laouali', 'Maradi', 'Niger', 'Zaman Lafia'),
('62434/T', 'Boubacar Boureima', 'Mohamed', 'Otawa', 'Canada', '13émeRue'),
('75120/T', 'Stephen', 'James', 'Lebron', 'USA', 'United Kingdom'),
('97914/T', 'Hamidou Douma', 'Redwan', 'Niamey', 'Niger', 'Commune 5');

-- --------------------------------------------------------

--
-- Structure de la table `gestion`
--

CREATE TABLE `gestion` (
  `id_gestion` int(2) NOT NULL,
  `gestion` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gestion`
--

INSERT INTO `gestion` (`id_gestion`, `gestion`) VALUES
(1, '2017'),
(2, '2018'),
(3, '2019'),
(4, '2020');

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

CREATE TABLE `programme` (
  `code_programme` varchar(3) NOT NULL,
  `libelle_programme` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `programme`
--

INSERT INTO `programme` (`code_programme`, `libelle_programme`) VALUES
('100', 'Programme Test'),
('101', 'Programme Essaie'),
('102', 'Programme Essaie'),
('105', 'Programme Test'),
('125', 'Programme Test'),
('135', 'Essaie'),
('150', 'Test'),
('180', 'Programme Fête');

-- --------------------------------------------------------

--
-- Structure de la table `reglement`
--

CREATE TABLE `reglement` (
  `code_reglement` varchar(1) NOT NULL,
  `libelle_reglement` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reglement`
--

INSERT INTO `reglement` (`code_reglement`, `libelle_reglement`) VALUES
('0', 'Règlement Immédiat (0)'),
('1', 'Règlement Unique (1)'),
('2', 'Règlement Fractionné ou Échelonné (2)');

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE `section` (
  `code_section` varchar(2) NOT NULL,
  `libelle_section` char(50) NOT NULL,
  `code_service` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `section`
--

INSERT INTO `section` (`code_section`, `libelle_section`, `code_service`) VALUES
('0', 'COURS SUPREME', ''),
('1', 'ASSEMBLEE NATIONALE', ''),
('12', 'MINISTERE DES AFFAIRES ETRANGERES', ''),
('15', 'MINISTERE DE LA DEFENSE NATIONALE', ''),
('17', 'MINISTERE DE LA JUSTICE', ''),
('2', 'CONSEIL SUPERIEUR DE LA COMMUNICATION', ''),
('3', 'CABINET DU PREMIER MINISTRE', ''),
('4', 'GRANDE CHANCELLERIE', ''),
('41', 'MINISTERE DE LA FONCTION PUBLIQUE', ''),
('47', 'MINISTERE DES FINANCES', ''),
('49', 'MINISTERE DES MINES ET DE L\'ENERGIE', ''),
('5', 'PRESIDENCE DE LA REPUBLIQUE', ''),
('6', 'MINISTERE DES ENSEIGNEMENTS SECONDAIRE ET SUPERIEU', ''),
('61', 'MINISTERE DE L\'EDUCATION NATIONALE', ''),
('64', 'MINISTERE DE LA SANTE PUBLIQUE', ''),
('7', 'COURS CONSTITUTIONNELLE', ''),
('8', 'MINISTERE DES TRANSPORTS ET DE LA COMMUNICATION', ''),
('9', 'MINISTERE DES SPORTS ET DE LA CULTURE', '');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `code_service` varchar(2) NOT NULL,
  `libelle_service` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`code_service`, `libelle_service`) VALUES
('0', 'SERVICE DE SOUVERAINETE'),
('1', 'DEFENSE, ORDRE ET SECURITE'),
('3', 'ADMINISTRATION GENERALE ET FINANCIERE'),
('4', 'ENSEIGNEMENT, FORMATION ET RECHERCHE'),
('5', 'CULTURE, SPORTS ET LOISIRS'),
('6', 'SANTE ET ACTIVITE SOCIALE'),
('7', 'ADMINISTRATION ET DEVELOPPEMENT DES INFRASTRUCTURE'),
('8', 'PRODUCTION ET COMMERCE'),
('9', 'AUTRES DESTINATIONS');

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `code_tache` varchar(2) NOT NULL,
  `libelle_tache` char(50) NOT NULL,
  `code_activite` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`code_tache`, `libelle_tache`, `code_activite`) VALUES
('10', 'Tache Essaie', '10'),
('11', 'Tache Test', '11'),
('12', 'Tache Essaie', '12'),
('13', 'Tâche Test', '13'),
('18', 'Fête', '18'),
('35', 'Essaie', '35'),
('41', 'Tache Test', '20'),
('50', 'Tache Essaie', '50');

-- --------------------------------------------------------

--
-- Structure de la table `type_bon_engagement`
--

CREATE TABLE `type_bon_engagement` (
  `id_type` int(2) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_bon_engagement`
--

INSERT INTO `type_bon_engagement` (`id_type`, `type`) VALUES
(1, 'MARCHE'),
(2, 'ORDINAIRE');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL,
  `statut` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `statut`) VALUES
(1, 'Admin@db', 'rootroot', 'Administrateur'),
(2, 'User02@DIF', 'Only02DIF', 'Chef de Service'),
(3, 'User03@DIF', 'Only03DIF', 'Sécrétaire'),
(4, 'User04@DIF', 'Only04DIF', 'DERIT'),
(5, 'AbdoulayeSofiani05@DIF', 'Only05DIF', 'D E');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`code_action`);

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`code_activite`);

--
-- Index pour la table `bon_engagement`
--
ALTER TABLE `bon_engagement`
  ADD PRIMARY KEY (`num_bon`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`code_categorie`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`code_compte`);

--
-- Index pour la table `depense`
--
ALTER TABLE `depense`
  ADD PRIMARY KEY (`code_depense`);

--
-- Index pour la table `etat_bon_engagement`
--
ALTER TABLE `etat_bon_engagement`
  ADD PRIMARY KEY (`id_etat`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`nif_frs`);

--
-- Index pour la table `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`id_gestion`);

--
-- Index pour la table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`code_programme`);

--
-- Index pour la table `reglement`
--
ALTER TABLE `reglement`
  ADD PRIMARY KEY (`code_reglement`);

--
-- Index pour la table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`code_section`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`code_service`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`code_tache`);

--
-- Index pour la table `type_bon_engagement`
--
ALTER TABLE `type_bon_engagement`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bon_engagement`
--
ALTER TABLE `bon_engagement`
  MODIFY `num_bon` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `gestion`
--
ALTER TABLE `gestion`
  MODIFY `id_gestion` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
