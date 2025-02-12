-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 12 fév. 2025 à 21:33
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

CREATE TABLE `abonnements` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prix` decimal(10,2) NOT NULL DEFAULT 0.00,
  `max_livres` int(11) NOT NULL,
  `duree_emprunt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`id`, `nom`, `prix`, `max_livres`, `duree_emprunt`) VALUES
(1, 'Gratuit', 0.00, 2, 7),
(2, 'Premium', 9.99, 5, 14),
(3, 'VIP', 19.99, 10, 30);

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `annee_publication` year(4) NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `titre`, `auteur`, `annee_publication`, `genre`, `disponible`) VALUES
(1, 'Sous l\'orage', 'Saidou Badian', '2015', 'science fiction', 1),
(2, 'L\'etranger', 'Albert Camus', '2014', 'science fiction', 1),
(3, 'HARRY POTTER', 'J.k Rowling', '1998', 'fiction', 1),
(4, 'la nuit etrange', 'massahoud', '2024', 'science fiction', 0),
(5, 'Le prince de sang mele', 'J.k Rowling', '1998', 'science fiction', 1);

-- --------------------------------------------------------

--
-- Structure de la table `emprunts`
--

CREATE TABLE `emprunts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_emprunt` datetime DEFAULT current_timestamp(),
  `date_retour_prevu` datetime NOT NULL,
  `date_retour_effectif` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `historique_emprunts`
--

CREATE TABLE `historique_emprunts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date_emprunt` datetime NOT NULL,
  `date_retour` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `abonnement_id` int(11) NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `date_paiement` timestamp NOT NULL DEFAULT current_timestamp(),
  `transaction_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `abonnement_id` int(11) DEFAULT 1,
  `date_inscription` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`, `abonnement_id`, `date_inscription`) VALUES
(1, 'Massahoud', 'kombassere', 'massahoudkombassere8@gmail.com', '$2y$10$eHTgPqLvbMgyuO6q6CmBHOojjTDPOpUvFKoSDcUlcNHDZpJlrxObe', 1, '2025-02-05 19:06:20'),
(2, 'Massahoud', 'kombassere', 'sahoudmassahoud@gmail.com', '$2y$10$sDTrrS46awu0JGYxHpqc/ODje4mU8ojzO80f/n5LTT9rnUEciVlz.', 1, '2025-02-09 17:54:23'),
(3, 'root', 'yameogo', 'root@gmail.com', '$2y$10$M4IMQwFirjwGG/tbf6LCdeIRC4Rn50fSIxdkdN5voS8rOUc/Uz8vq', 1, '2025-02-11 21:04:26');

-- --------------------------------------------------------

--
-- Structure de la table `user_abonnement`
--

CREATE TABLE `user_abonnement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `abonnement_id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_abonnement`
--

INSERT INTO `user_abonnement` (`id`, `user_id`, `abonnement_id`, `date_debut`, `date_fin`) VALUES
(3, 1, 1, '2025-02-05', '2025-02-12');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Index pour la table `historique_emprunts`
--
ALTER TABLE `historique_emprunts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `abonnement_id` (`abonnement_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `abonnement_id` (`abonnement_id`);

--
-- Index pour la table `user_abonnement`
--
ALTER TABLE `user_abonnement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `abonnement_id` (`abonnement_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `emprunts`
--
ALTER TABLE `emprunts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `historique_emprunts`
--
ALTER TABLE `historique_emprunts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user_abonnement`
--
ALTER TABLE `user_abonnement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD CONSTRAINT `emprunts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `emprunts_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `historique_emprunts`
--
ALTER TABLE `historique_emprunts`
  ADD CONSTRAINT `historique_emprunts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `historique_emprunts_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Contraintes pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `paiements_ibfk_2` FOREIGN KEY (`abonnement_id`) REFERENCES `abonnements` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`abonnement_id`) REFERENCES `abonnements` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `user_abonnement`
--
ALTER TABLE `user_abonnement`
  ADD CONSTRAINT `user_abonnement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_abonnement_ibfk_2` FOREIGN KEY (`abonnement_id`) REFERENCES `abonnements` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
