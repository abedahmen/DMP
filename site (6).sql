-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 mai 2024 à 21:19
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site`
--

-- --------------------------------------------------------

--
-- Structure de la table `analyse`
--

CREATE TABLE `analyse` (
  `id_analyse` int(11) NOT NULL,
  `nom_analyse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `analyse`
--

INSERT INTO `analyse` (`id_analyse`, `nom_analyse`) VALUES
(1, 'Hemogramme complet (NFS)'),
(2, 'Bilan lipidique'),
(3, 'Fonction renale'),
(4, 'Glycemie a jeun'),
(5, 'Analyse urine'),
(6, 'Dosage hormonal');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE `medicament` (
  `idmed` int(191) NOT NULL,
  `nom_medicament` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`idmed`, `nom_medicament`) VALUES
(1, 'Warfarine'),
(2, 'Insuline'),
(3, 'Paracétamol'),
(4, 'Ibuprofène'),
(5, 'Omeprazole');

-- --------------------------------------------------------

--
-- Structure de la table `médecin`
--

CREATE TABLE `médecin` (
  `id` int(191) NOT NULL,
  `nom` varchar(191) NOT NULL,
  `prenom` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `numtlf` varchar(10) NOT NULL,
  `genre` varchar(10) NOT NULL,
  `motdepasse` varchar(191) NOT NULL,
  `specialite` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `médecin`
--

INSERT INTO `médecin` (`id`, `nom`, `prenom`, `email`, `numtlf`, `genre`, `motdepasse`, `specialite`) VALUES
(1, 'amouri', 'abdou', 'amouri@gmail.com', '0552881221', 'home', '123456789', 'pidiater'),
(2, 'bouchikha', 'seif', 'seif@gmail.com', '0696566605', 'home', '123456789', 'pidiater');

-- --------------------------------------------------------

--
-- Structure de la table `ordonnance`
--

CREATE TABLE `ordonnance` (
  `id_ordonnance` int(191) NOT NULL,
  `idmed` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ordonnance`
--

INSERT INTO `ordonnance` (`id_ordonnance`, `idmed`, `patient_id`, `id`, `date`) VALUES
(1, 1, 1, 1, '2024-05-16T23:44:27.453Z'),
(2, 1, 1, 1, '2024-05-16T23:44:32.466Z'),
(3, 3, 1, 1, '2024-05-16T23:44:32.466Z'),
(4, 5, 1, 2, '2024-05-16T23:45:13.726Z'),
(5, 1, 2, 1, '2024-05-17T14:03:05.555Z'),
(6, 2, 2, 1, '2024-05-17T14:03:05.555Z'),
(7, 3, 4, 1, '2024-05-17T14:06:58.595Z'),
(8, 2, 4, 2, '2024-05-17T14:08:12.035Z'),
(9, 1, 4, 1, '2024-05-24T00:02:29.573Z'),
(10, 2, 4, 1, '2024-05-24T00:02:29.573Z'),
(11, 1, 5, 1, '2024-05-24T18:26:26.540Z'),
(12, 2, 5, 1, '2024-05-24T18:26:26.540Z'),
(13, 1, 7, 1, '2024-05-25T12:02:03.277Z'),
(14, 4, 7, 1, '2024-05-25T12:02:03.277Z'),
(15, 3, 7, 1, '2024-05-25T12:02:03.277Z'),
(16, 1, 7, 1, '2024-05-25T12:02:53.064Z'),
(17, 4, 7, 1, '2024-05-25T12:02:53.064Z'),
(18, 3, 7, 1, '2024-05-25T12:02:53.064Z'),
(19, 1, 7, 1, '2024-05-25T17:34:31.773Z'),
(20, 3, 7, 1, '2024-05-25T17:34:31.773Z'),
(21, 2, 7, 1, '2024-05-26T09:40:12.821Z'),
(22, 2, 7, 1, '2024-05-26T09:40:12.821Z'),
(23, 3, 5, 2, '2024-05-26T19:25:47.102Z'),
(24, 4, 5, 2, '2024-05-26T19:25:47.102Z'),
(25, 3, 4, 2, '2024-05-26T19:29:11.331Z'),
(26, 4, 4, 2, '2024-05-26T19:29:11.331Z'),
(27, 2, 7, 1, '2024-05-28T13:31:52.611Z'),
(28, 3, 7, 1, '2024-05-28T13:31:52.611Z'),
(29, 4, 5, 2, '2024-05-28T14:23:09.408Z'),
(30, 1, 5, 2, '2024-05-28T14:26:19.062Z'),
(31, 2, 5, 2, '2024-05-28T14:27:16.821Z'),
(32, 3, 5, 2, '2024-05-28T14:29:48.611Z'),
(33, 3, 5, 2, '2024-05-28T14:30:47.654Z'),
(34, 1, 5, 2, '2024-05-28T14:34:03.363Z'),
(35, 1, 5, 1, '2024-05-29T11:02:24.431Z'),
(36, 2, 5, 1, '2024-05-29T11:02:24.431Z'),
(37, 3, 5, 1, '2024-05-29T11:02:24.431Z'),
(38, 1, 7, 1, '2024-05-29T11:23:06.677Z'),
(39, 2, 7, 1, '2024-05-29T11:23:06.677Z'),
(40, 3, 7, 1, '2024-05-29T11:23:06.677Z'),
(41, 2, 5, 1, '2024-05-29T11:48:08.501Z'),
(42, 2, 7, 1, '2024-05-29T11:51:53.974Z'),
(43, 4, 5, 1, '2024-05-30T16:29:30.534Z'),
(44, 5, 5, 1, '2024-05-30T16:29:30.534Z');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(191) NOT NULL,
  `nom_p` varchar(191) NOT NULL,
  `prenom_p` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `datedenaissance` date NOT NULL,
  `genre` varchar(191) NOT NULL,
  `telephone` varchar(191) NOT NULL,
  `motdepasse` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`patient_id`, `nom_p`, `prenom_p`, `email`, `datedenaissance`, `genre`, `telephone`, `motdepasse`) VALUES
(1, 'joujou', 'ines', 'ines@gmail.com', '2000-12-16', 'femme', '0656661098', '123456789'),
(2, 'monsri', 'hatem', 'hatem@gmail.com', '2005-05-16', 'homme', '0756661098', '123456789'),
(4, 'bouhmila', 'ayoub', 'amirat@gmail.com', '2003-05-30', 'homme', '0765258423', '123456'),
(5, 'amirat', 'lokman', 'amirat@gmail.com', '2003-03-22', 'homme', '0672491422', '123456789'),
(7, 'sifo', 'mm', 'bouchikha@gmail.com', '2024-05-22', 'homme', '0765258423', '123');

-- --------------------------------------------------------

--
-- Structure de la table `radio`
--

CREATE TABLE `radio` (
  `id_radio` int(11) NOT NULL,
  `nom_radio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `radio`
--

INSERT INTO `radio` (`id_radio`, `nom_radio`) VALUES
(1, 'Radiographie thoracique '),
(2, 'Radiographie dentaire'),
(3, 'Radiographie osseuse'),
(4, 'Radiographie abdominale'),
(5, 'Radiographie abdominale'),
(6, 'Radiographie mammaire'),
(7, 'Radiographie du rachis'),
(8, 'Radiographie articulaire');

-- --------------------------------------------------------

--
-- Structure de la table `visite_analyse`
--

CREATE TABLE `visite_analyse` (
  `id_visite` int(11) NOT NULL,
  `id_analyse` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `visite_analyse`
--

INSERT INTO `visite_analyse` (`id_visite`, `id_analyse`, `patient_id`, `id`, `date`) VALUES
(31, 2, 2, 1, '2024-05-16T23:31:10.036Z'),
(32, 6, 1, 1, '2024-05-16T23:31:22.504Z'),
(33, 3, 1, 2, '2024-05-16T23:32:23.776Z'),
(34, 1, 1, 2, '2024-05-16T23:32:23.776Z'),
(35, 2, 2, 1, '2024-05-17T14:03:13.809Z'),
(36, 3, 2, 1, '2024-05-17T14:03:13.809Z'),
(37, 1, 5, 1, '2024-05-24T18:26:35.721Z'),
(38, 3, 5, 1, '2024-05-24T18:26:35.721Z'),
(39, 4, 4, 1, '2024-05-25T11:55:57.859Z'),
(40, 4, 7, 1, '2024-05-25T12:03:16.983Z'),
(41, 3, 7, 1, '2024-05-25T12:03:16.983Z'),
(42, 1, 7, 1, '2024-05-25T17:34:43.878Z'),
(43, 3, 7, 1, '2024-05-25T17:34:43.878Z'),
(44, 5, 7, 1, '2024-05-25T17:34:43.878Z'),
(45, 3, 7, 1, '2024-05-26T09:35:16.600Z'),
(46, 2, 7, 1, '2024-05-26T09:35:16.600Z'),
(47, 3, 7, 1, '2024-05-26T09:35:29.462Z'),
(48, 2, 7, 1, '2024-05-26T09:35:29.462Z'),
(49, 3, 5, 2, '2024-05-26T19:32:04.065Z'),
(50, 4, 5, 2, '2024-05-26T19:32:04.065Z'),
(51, 4, 7, 1, '2024-05-28T13:39:43.668Z'),
(52, 3, 7, 1, '2024-05-28T13:39:43.668Z'),
(53, 2, 7, 1, '2024-05-29T11:52:04.436Z');

-- --------------------------------------------------------

--
-- Structure de la table `visite_radio`
--

CREATE TABLE `visite_radio` (
  `id_visitee` int(11) NOT NULL,
  `id_radio` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `visite_radio`
--

INSERT INTO `visite_radio` (`id_visitee`, `id_radio`, `patient_id`, `id`, `date`) VALUES
(1, 1, 1, 1, '2024-05-16T23:41:05.705Z'),
(2, 3, 2, 1, '2024-05-17T14:03:22.291Z'),
(3, 4, 2, 1, '2024-05-17T14:03:22.291Z'),
(4, 2, 5, 1, '2024-05-24T18:26:45.269Z'),
(5, 3, 5, 1, '2024-05-24T18:26:45.269Z'),
(6, 4, 7, 1, '2024-05-25T12:03:42.067Z'),
(7, 3, 7, 1, '2024-05-25T12:03:42.067Z'),
(8, 4, 7, 1, '2024-05-25T12:04:03.691Z'),
(9, 3, 7, 1, '2024-05-25T12:04:03.691Z'),
(10, 2, 7, 1, '2024-05-25T17:34:52.422Z'),
(11, 3, 5, 2, '2024-05-28T13:57:31.016Z'),
(12, 6, 4, 2, '2024-05-28T13:59:08.158Z'),
(13, 2, 7, 1, '2024-05-29T11:52:16.501Z');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `analyse`
--
ALTER TABLE `analyse`
  ADD PRIMARY KEY (`id_analyse`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`idmed`);

--
-- Index pour la table `médecin`
--
ALTER TABLE `médecin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD PRIMARY KEY (`id_ordonnance`),
  ADD KEY `fk_ordonnance_patient` (`patient_id`),
  ADD KEY `fk_ordonnance_medecin` (`id`),
  ADD KEY `fk_ordonnance_medicament` (`idmed`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Index pour la table `radio`
--
ALTER TABLE `radio`
  ADD PRIMARY KEY (`id_radio`);

--
-- Index pour la table `visite_analyse`
--
ALTER TABLE `visite_analyse`
  ADD PRIMARY KEY (`id_visite`),
  ADD KEY `fk_visite_analyse_patient` (`patient_id`),
  ADD KEY `fk_visite_analyse_medecin` (`id`),
  ADD KEY `fk_visite_analyse_id_analyse` (`id_analyse`);

--
-- Index pour la table `visite_radio`
--
ALTER TABLE `visite_radio`
  ADD PRIMARY KEY (`id_visitee`),
  ADD KEY `fk_visite_analysee_patient` (`patient_id`),
  ADD KEY `fk_visite_analysee_medecin` (`id`),
  ADD KEY `fk_visite_analysee_id_radio` (`id_radio`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `analyse`
--
ALTER TABLE `analyse`
  MODIFY `id_analyse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `idmed` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `médecin`
--
ALTER TABLE `médecin`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  MODIFY `id_ordonnance` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `radio`
--
ALTER TABLE `radio`
  MODIFY `id_radio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `visite_analyse`
--
ALTER TABLE `visite_analyse`
  MODIFY `id_visite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `visite_radio`
--
ALTER TABLE `visite_radio`
  MODIFY `id_visitee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ordonnance`
--
ALTER TABLE `ordonnance`
  ADD CONSTRAINT `fk_ordonnance_medecin` FOREIGN KEY (`id`) REFERENCES `médecin` (`id`),
  ADD CONSTRAINT `fk_ordonnance_medicament` FOREIGN KEY (`idmed`) REFERENCES `medicament` (`idmed`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ordonnance_patient` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `visite_analyse`
--
ALTER TABLE `visite_analyse`
  ADD CONSTRAINT `fk_visite_analyse_id_analyse` FOREIGN KEY (`id_analyse`) REFERENCES `analyse` (`id_analyse`),
  ADD CONSTRAINT `fk_visite_analyse_medecin` FOREIGN KEY (`id`) REFERENCES `médecin` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_visite_analyse_patient` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `visite_radio`
--
ALTER TABLE `visite_radio`
  ADD CONSTRAINT `fk_visite_analysee_id_radio` FOREIGN KEY (`id_radio`) REFERENCES `radio` (`id_radio`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_visite_analysee_medecin` FOREIGN KEY (`id`) REFERENCES `médecin` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_visite_analysee_patient` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
