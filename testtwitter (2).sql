-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 26 mai 2023 à 19:06
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `testtwitter`
--

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

CREATE TABLE `tweet` (
  `id_tweet` int NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_heure_message` datetime NOT NULL,
  `type` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `image_chemin` varchar(260) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_users` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tweet`
--

INSERT INTO `tweet` (`id_tweet`, `message`, `date_heure_message`, `type`, `image_chemin`, `id_users`) VALUES
(67, 'Et vous ? pour ou contre le 49.3 ?', '2023-04-02 13:07:40', 'Politique', NULL, 28),
(68, 'J\'ai hâte que roland garros reprenne !', '2023-04-02 13:26:36', 'Sport', NULL, 30),
(69, 'Vous avez vu le nouveau Avatar 2 ? Moi toujours pas !', '2023-04-02 14:27:22', 'Cinéma', NULL, 27),
(70, 'J\'ai trop envie d\'aller au concert de Stromae en Juin !!! Mais les places sont toutes prises ...', '2023-04-02 14:28:02', 'Musique', NULL, 31),
(71, 'J\'ai une nouvelle recette de gateau que j\'ai trop envie de tester !!!', '2023-04-02 14:28:48', 'Cuisine', NULL, 31),
(72, 'Il y a une nouvelle exposition d\'art sur le theme de Marvel, j\'aimerai trop la voir !', '2023-04-02 14:29:33', 'Art', NULL, 31),
(76, 'coucou, j\'adore les manifs', '2023-04-07 20:48:14', 'Politique', NULL, 28),
(89, 'J\'adore regarder Les Reines du Shopping à la télé', '2023-04-09 19:53:42', 'Divertissement', NULL, 30),
(90, 'hate de retourner à disney', '2023-04-09 20:46:01', 'Divertissement', NULL, 36),
(253, 'J\'ai trop envie de retourner au Brésil l\'année prochaine !', '2023-05-01 21:36:32', 'Voyage', './stockfile/', 42),
(262, 'Vous connaissez ces bagues ? C\'est une merveille de la technologie ! ', '2023-05-07 17:58:14', 'Art', './stockfile/AEKLYS_BY_STARCK-2.png', 42),
(265, 'Eh les boys, j\'arrive sur Lotus. ', '2023-05-18 18:00:15', 'Divertissement', './stockfile/', 43),
(306, 'C\'est quoi votre type de musique préféré ??', '2023-05-26 15:57:59', 'Musique', './stockfile/', 47),
(310, 'Vous le saviez que Michael Jackson était un grand fan du cinéma ?', '2023-05-26 18:17:49', 'Cinéma', './stockfile/pochette forever Michael.png', 47);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `pseudo` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_photo` varchar(150) COLLATE utf8mb4_general_ci DEFAULT 'https://picsum.photos/100/100',
  `date_de_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `pseudo`, `prenom`, `nom`, `mail`, `mdp`, `user_photo`, `date_de_naissance`) VALUES
(24, 'Nono', 'Noah', 'Sfez', 'noah.sfez@icloud.com', '$2y$10$/YFu3cMHE4qelUNO.Z/EH.9SI2RBqlUJWj.Tt94BugZf.eaesvKUG', 'https://picsum.photos/100/100', '2004-04-26'),
(26, 'Phiale', 'Philippe', 'Alves', 'philippe.alves@edu.devinci.fr', '$2y$10$2S8xSzwR47.tYGtD.f920OaLYrXmyZnXbMA35WWVxi45CChNY4kTe', 'https://picsum.photos/100/100', '2004-12-13'),
(27, 'Garzra', 'Flavio', 'Leon', 'flavio.leon@edu.devinci.fr', '$2y$10$ix.yk5GxK/AmSJ79EBc7FOfNTwJWf/5c/P4WWI/5auG6ofa/id52.', 'https://picsum.photos/100/100', '2004-03-20'),
(28, 'Quentyn', 'Quentin', 'Dalat', 'quentin.dalat@gmail.com', '$2y$10$0DglFVi8svBB9n/9Hw8mtO5v.oO5umNb0/BgsOSA/bpkoT1U4W8Hu', 'https://picsum.photos/100/100', '2004-11-13'),
(29, 'Clemar', 'Clement', 'Batonnier', 'clement.batonnier@gmail.com', '$2y$10$02gvlgOEND.Vf2l3n6QvF.6yZ/AEBhkcO4yYSgzkXFwaGxLpZKFTK', 'https://picsum.photos/100/100', '2004-05-24'),
(30, 'Sissou', 'Annabel', 'Sfez', 'annabel.sfez@yahoo.fr', '$2y$10$sf/.M1TrFagFqTlti0dyROBnYMhRpqbrFd.Vy5HmZ4slqZhKohKW2', 'https://picsum.photos/100/100', '1970-09-06'),
(31, 'Benjos', 'Benjamin ', 'Bouilland', 'benjamin.bouilland@edu.devinci.fr', '$2y$10$q3ktEZbopSLiUHB3aDM6y.qpwzbGjsQhW52QtQVDoCUYkKcJDtmlG', 'https://picsum.photos/100/100', '2004-03-21'),
(32, 'JJ', 'Jean-Jacques', 'Zibi', 'jean-jacques.zibi@gmail.com', '$2y$10$OPKRPm5egbImRYnAkZ9kROXQHSl.rOegolIa6UhdnH2JINnfvXqfW', 'https://picsum.photos/100/100', '1955-09-07'),
(33, 'Annasfz78', 'Anna', 'Sfez', 'anna_gozlan@hotmail.com', '$2y$10$p4a4Mvz8kVdvnpDo9P0dhOCDFUUKPdKCXmgy5c6IeD.EJ.rp.7mE2', 'https://picsum.photos/100/100', '1978-07-13'),
(36, 'salomesfz', 'Salomé', 'Sfez', 'salomesfz01@gmail.com', '$2y$10$FLjuDoSR9Yf9B3U13qLrquREZBRAB1Y7ePoDtG8V4tPd2ROYko2bK', 'https://picsum.photos/100/100', '2002-01-28'),
(42, 'Carlita', 'Carla', 'De Siqueira', 'carla.desiqueira@gmail.com', '$2y$10$eF1jiOMM9ce28BmDnQBWGuppFV4ar5u2KTVHH1EOGl4WTlp9DXPqa', 'https://picsum.photos/100/100', '2004-05-06'),
(43, 'JoshGoz', 'Joshua', 'Gozlan', 'joshgoz@outlook.fr', '$2y$10$4WE8twSepHwMznjsE.NooO8KyGx/let76FM9hEWrN15X8abuhNK1i', 'https://picsum.photos/100/100', '2004-10-08'),
(44, 'Miko', 'Michael', 'Sfez', 'michael.sfez@gmail.com', '$2y$10$exm.Es7uLEuu2CghO.HS7.z4C0dbcb/CvVd9yNbh42EC.UJZtIRia', 'https://picsum.photos/100/100', '1974-05-09'),
(46, 'Clemar', 'Clement', 'Batonnier', 'clement.batonnier@gmail.com', '$2y$10$j1XgGcJHAMG5VvgMAi1EBOz7byekLkxh76dNd9CGVUkmJxNWPg6li', 'https://picsum.photos/100/100', '2004-05-24'),
(47, 'Nono', 'Noah', 'Sfez', 'sfz.noah@gmail.com', '$2y$10$K6jlQlBXPnLmQdF3C4ve/es6ntoGMmAPWzjhNPQFoISNweJBRtxW2', 'https://picsum.photos/100/100', '2004-04-26'),
(48, 'Nono', 'Noah', 'Sfez', 'sfz.noah@gmail.com', '$2y$10$NZNwpGPqL5borjR2um5BX.FHePaompN.ef2SUvj9aVtwBBsXYHwZi', 'https://picsum.photos/100/100', '2004-04-26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id_tweet`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id_tweet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
