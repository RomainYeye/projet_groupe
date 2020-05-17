-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 20 Avril 2020 à 16:07
-- Version du serveur :  10.3.22-MariaDB-0+deb10u1
-- Version de PHP :  7.3.14-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `adopteunanimal`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id_actualite` int(11) NOT NULL,
  `date_ajout_actualite` date NOT NULL,
  `photo_actualite` text NOT NULL,
  `nom_actualite` varchar(250) NOT NULL,
  `texte_actualite` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `actualite`
--

INSERT INTO `actualite` (`id_actualite`, `date_ajout_actualite`, `photo_actualite`, `nom_actualite`, `texte_actualite`) VALUES
(1, '2020-02-24', 'IMG/slide1.jpg', 'La saison des PUCES/TIQUES reviens', 'ATTENTION !!! ça y est c\'est le printemps et les puces reviennent. Pensez à bien protéger vos animaux avant de les laisser sortir.'),
(2, '2020-02-24', 'IMG/slide2.jpg', 'Une santé à toute epreuves', 'Pour que votre amis à quatre pates soit en bonne santée n\'oubliez pas qu\'en plus d\'une bonne alimentaiton celui ci a besoin d\'exercices quotidiens'),
(4, '2020-02-24', 'IMG/slide4.jpg', 'La sterelisation', 'On ne le dira jamais assez mais STERILISEZ vos animaux reste la meilleure facon de luter contre l\'afflu massif de chatons et chiots dans les refuges'),
(6, '2020-02-24', 'IMG/slide3.jpg', 'L\'identification', 'Pensez à faire pucer vos chat, c\'est la meilleur facon d\'assurer leurs securité et de pouvoir les retrouver s\'ils se perdent !!!!');

-- --------------------------------------------------------

--
-- Structure de la table `adoption`
--

CREATE TABLE `adoption` (
  `id_animal` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_adoption` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `id_animal` int(11) NOT NULL,
  `nom_animal` varchar(25) NOT NULL,
  `photo_animal` text NOT NULL,
  `date_naissance_animal` date NOT NULL,
  `age_animal` float NOT NULL,
  `sexe_animal` varchar(25) NOT NULL,
  `description_animal` varchar(250) NOT NULL,
  `handicap_animal` int(11) NOT NULL,
  `urgence_animal` int(11) NOT NULL,
  `date_entree` date NOT NULL,
  `id_race` int(11) DEFAULT NULL,
  `id_refuge` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `animal`
--

INSERT INTO `animal` (`id_animal`, `nom_animal`, `photo_animal`, `date_naissance_animal`, `age_animal`, `sexe_animal`, `description_animal`, `handicap_animal`, `urgence_animal`, `date_entree`, `id_race`, `id_refuge`) VALUES
(1, 'Gizmo', 'IMG/gizmo.png', '2020-02-01', 0, 'M', 'Ne pas le mouiller ni le nourir apres 23h', 0, 1, '2020-02-01', 1, 0),
(2, 'rodolph', 'IMG/slide1.jpg', '2018-02-05', 2, 'm', 'aime faire ses griffres partout', 0, 1, '2020-02-01', 1, 0),
(3, 'rodolph2', 'IMG/slide2.jpg', '2008-02-05', 2, 'm', 'aime faire ses griffres partout lol', 0, 1, '2020-01-01', 1, 0),
(4, 'rodolph5', 'IMG/slide3.jpg', '2009-02-05', 2, 'm', 'aime faire ses griffr lol', 0, 1, '2019-01-01', 1, 0),
(5, 'Rex', 'IMG/slide2.jpg', '2008-02-05', 2, 'm', 'aime les longues promenades en foret', 0, 1, '2020-01-01', 1, 0),
(6, 'minouche', 'IMG/slide3.jpg', '2019-12-21', 1, 'm', 'en recherche de calins', 0, 1, '2020-01-01', 1, 0),
(7, 'minouche', 'IMG/gizmo.png', '2019-12-21', 1, 'm', 'ne pas nourir n\'impoorte comment', 0, 1, '2020-01-01', 1, 0),
(8, 'gretta', 'IMG/gizmo.png', '2019-12-21', 1, 'm', 'ne pas nourir n\'impoorte comment', 0, 1, '2020-01-01', 1, 0),
(9, 'mohawk', 'IMG/gizmo.png', '2019-12-21', 1, 'm', 'ne pas nourir n\'impoorte comment', 0, 1, '2020-01-01', 1, 0),
(10, 'stripe', 'IMG/gizmo.png', '2019-12-21', 1, 'm', 'ne pas nourir n\'impoorte comment', 0, 1, '2020-01-01', 1, 0),
(11, 'lol1', 'IMG/slide1.jpg', '2018-02-05', 0, 'M', 's,nxtjs', 0, 1, '2020-02-21', 1, 0),
(12, 'lol2', 'IMG/slide1.jpg', '2018-02-05', 0, 'M', 's,nxtjs', 0, 1, '2020-02-21', 1, 0),
(13, 'lol3', 'IMG/slide1.jpg', '2018-02-05', 0, 'M', 's,nxtjs', 0, 1, '2020-02-21', 1, 0),
(14, 'lol4', 'IMG/slide1.jpg', '2018-02-05', 0, 'M', 's,nxtjs', 0, 1, '2020-02-21', 1, 0),
(15, 'lol5', 'IMG/slide1.jpg', '2018-02-05', 0, 'M', 's,nxtjs', 0, 1, '2020-02-21', 1, 0),
(16, 'lol6', 'IMG/slide1.jpg', '2018-02-05', 0, 'M', 's,nxtjs', 0, 1, '2020-02-21', 1, 0),
(18, 'lol', 'IMG/slide1.jpg', '2018-01-05', 0, 'M', 's,nxtjs', 0, 1, '2020-02-21', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `espece`
--

CREATE TABLE `espece` (
  `id_espece` int(11) NOT NULL,
  `espece` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `espece`
--

INSERT INTO `espece` (`id_espece`, `espece`) VALUES
(1, 'chat'),
(2, 'chien'),
(3, 'furet'),
(4, 'rat'),
(5, 'cochon d\'inde'),
(6, 'Hmster'),
(7, 'chinchilla'),
(8, 'dégue du chili'),
(9, 'gerbille'),
(10, 'lapin domestique'),
(11, 'lapin nain'),
(12, 'Alpaga'),
(13, 'Cheval'),
(14, 'Ane'),
(15, 'Chèvre naine'),
(16, 'Cochon vietnamien'),
(17, 'Serin'),
(18, 'Diamant'),
(19, 'Verdier'),
(20, 'Mainate'),
(21, 'Perruche'),
(22, 'Perroquet'),
(23, 'Cacatoès'),
(24, 'Lézard'),
(25, 'Serpent'),
(26, 'Tortue');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id_animal` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `prevention`
--

CREATE TABLE `prevention` (
  `id_prevention` int(11) NOT NULL,
  `date_ajout_prevention` date NOT NULL,
  `nom_prevention` varchar(250) NOT NULL,
  `photo_prevention` text NOT NULL,
  `texte_prevention` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `prevention`
--

INSERT INTO `prevention` (`id_prevention`, `date_ajout_prevention`, `nom_prevention`, `photo_prevention`, `texte_prevention`) VALUES
(1, '2020-02-24', 'La saison des PUCES/TIQUES reviens', 'IMG/slide1.jpg', 'ATTENTION !!! ça y est c\'est le printemps et les puces reviennent. Pensez à bien protéger vos animaux avant de les laisser sortir.'),
(2, '2020-02-24', 'Une santé à toute epreuves', 'IMG/slide2.jpg', 'Pour que votre amis à quatre pates soit en bonne santée n\'oubliez pas qu\'en plus d\'une bonne alimentaiton celui ci a besoin d\'exercices quotidiens'),
(4, '2020-02-24', 'La sterelisation', 'IMG/slide4.jpg', 'On ne le dira jamais assez mais STERILISEZ vos animaux reste la meilleure facon de luter contre l\'afflu massif de chatons et chiots dans les refuges'),
(6, '2020-02-24', 'L\'identification', 'IMG/slide3.jpg', 'Pensez à faire pucer vos chat, c\'est la meilleur facon d\'assurer leurs securité et de pouvoir les retrouver s\'ils se perdent !!!!');

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE `race` (
  `id_race` int(11) NOT NULL,
  `race` varchar(250) NOT NULL,
  `id_espece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `race`
--

INSERT INTO `race` (`id_race`, `race`, `id_espece`) VALUES
(1, 'europ', 1),
(4, 'Abyssin', 1),
(5, 'Abyssin', 1),
(6, 'American curl', 1),
(7, 'American Shorthair', 1),
(8, 'American whireHair', 1),
(9, 'Anatoli', 1),
(10, 'Angora', 1),
(11, 'Asian', 1),
(12, 'Brume australienne', 1),
(13, 'Balinais', 1),
(14, 'Bengal', 1),
(15, 'Bleu russe', 1),
(16, 'Bobtail americain', 1),
(17, 'Bobtail japonais', 1),
(18, 'Bombay', 1),
(19, 'Brazilian Shorthair', 1),
(20, 'British ShortHair', 1),
(21, 'Burmese', 1),
(22, 'Burmilla', 1),
(23, 'Basset d\'artois', 2),
(24, 'beagle', 2),
(25, 'Berger bekge', 2),
(26, 'Bichon Yorkie', 2),
(27, 'Caniche', 2),
(28, 'Colley', 2),
(29, 'Epagneul français', 2),
(30, 'Fox Terrier', 2),
(31, 'Golden Retiever', 2),
(32, 'Husky de Sakhaline', 2),
(33, 'Jack Russel Terrier', 2),
(34, 'Labradoodle', 2),
(35, 'Lévrier Rampur', 2),
(36, 'Laïka de Sibérie Orientale', 2),
(37, 'Mastif', 2),
(38, 'Papillon', 2),
(39, 'Pit Bull', 2),
(40, 'Pomsky', 2),
(41, 'Sain Bernard', 2),
(42, 'Shih Tzu', 2),
(43, 'Chies d\'sus', 2),
(44, 'inconnu', 3),
(45, 'inconnu2', 3),
(46, 'inconnu', 4),
(47, 'inconnu2', 4),
(48, 'inconnu', 5),
(49, 'inconnu2', 5),
(50, 'inconnu', 6),
(51, 'inconnu2', 6),
(52, 'inconnu', 7),
(53, 'inconnu2', 7),
(54, 'inconnu', 8),
(55, 'inconnu2', 8),
(56, 'inconnu', 9),
(57, 'inconnu2', 9),
(58, 'inconnu', 10),
(59, 'inconnu2', 10),
(60, 'inconnu', 11),
(61, 'inconnu2', 11),
(62, 'inconnu', 12),
(63, 'inconnu2', 12),
(64, 'inconnu', 13),
(65, 'inconnu2', 13),
(66, 'inconnu', 14),
(67, 'inconnu2', 14),
(68, 'inconnu', 15),
(69, 'inconnu2', 15),
(70, 'inconnu', 16),
(71, 'inconnu2', 16),
(72, 'inconnu', 17),
(73, 'inconnu2', 17),
(74, 'inconnu', 18),
(75, 'inconnu2', 18),
(76, 'inconnu', 19),
(77, 'inconnu2', 19),
(78, 'inconnu', 20),
(79, 'inconnu2', 20),
(80, 'inconnu', 21),
(81, 'inconnu2', 21),
(82, 'inconnu', 22),
(83, 'inconnu2', 22),
(84, 'inconnu', 23),
(85, 'inconnu2', 23),
(86, 'inconnu', 24),
(87, 'inconnu2', 24),
(88, 'inconnu', 25),
(89, 'inconnu2', 25);

-- --------------------------------------------------------

--
-- Structure de la table `refuge`
--

CREATE TABLE `refuge` (
  `id_refuge` int(11) NOT NULL,
  `nom_refuge` varchar(50) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `rue` varchar(150) NOT NULL,
  `CP` varchar(20) NOT NULL,
  `ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `statistique`
--

CREATE TABLE `statistique` (
  `id_statistique` int(11) NOT NULL,
  `derniere_edition_statistique` date NOT NULL,
  `nom_statistique` varchar(250) NOT NULL,
  `chiffres_statistique` float NOT NULL,
  `type_gestion_statistique` int(11) NOT NULL,
  `afficher_statistique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `statistique`
--

INSERT INTO `statistique` (`id_statistique`, `derniere_edition_statistique`, `nom_statistique`, `chiffres_statistique`, `type_gestion_statistique`, `afficher_statistique`) VALUES
(1, '2020-02-25', 'Animaux abandonnés chaque années.', 100000, 1, 1),
(2, '2020-02-25', 'Animaux animaux recueillis dans nos refuges.', 200, 0, 1),
(3, '2020-02-25', 'Adhérents à l\'association.', 60, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `temoignage`
--

CREATE TABLE `temoignage` (
  `id_temoignage` int(11) NOT NULL,
  `date_adoption` date NOT NULL,
  `nom_animal_temoignage` varchar(25) NOT NULL,
  `photo_animal` text NOT NULL,
  `message_temoignage` varchar(1500) NOT NULL,
  `afficher` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `temoignage`
--

INSERT INTO `temoignage` (`id_temoignage`, `date_adoption`, `nom_animal_temoignage`, `photo_animal`, `message_temoignage`, `afficher`, `id_utilisateur`) VALUES
(1, '2020-02-13', 'gizmo', 'IMG/gizmo.png', 'on fait bien attention a ne pas le mouiller, chante super bien', 1, 0),
(2, '2020-02-03', 'minouche', 'IMG/slide4.jpg', 'il s\'amuse a courrir partout sans arret', 1, 0),
(3, '2020-02-03', 'Mirza', 'IMG/slide3.jpg', 'il s\'amuse a courrir partout sans arret', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `ville` varchar(250) NOT NULL,
  `codePostal` varchar(10) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `benevole` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id_actualite`);

--
-- Index pour la table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`id_animal`,`id_utilisateur`),
  ADD KEY `adoption_utilisateur0_FK` (`id_utilisateur`);

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `animal_race_FK` (`id_race`);

--
-- Index pour la table `espece`
--
ALTER TABLE `espece`
  ADD PRIMARY KEY (`id_espece`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id_animal`,`id_utilisateur`),
  ADD KEY `favoris_utilisateur0_FK` (`id_utilisateur`);

--
-- Index pour la table `prevention`
--
ALTER TABLE `prevention`
  ADD PRIMARY KEY (`id_prevention`);

--
-- Index pour la table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id_race`),
  ADD KEY `race_espece_FK` (`id_espece`);

--
-- Index pour la table `refuge`
--
ALTER TABLE `refuge`
  ADD PRIMARY KEY (`id_refuge`);

--
-- Index pour la table `statistique`
--
ALTER TABLE `statistique`
  ADD PRIMARY KEY (`id_statistique`);

--
-- Index pour la table `temoignage`
--
ALTER TABLE `temoignage`
  ADD PRIMARY KEY (`id_temoignage`),
  ADD KEY `temoignage_utilisateur_FK` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id_actualite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `espece`
--
ALTER TABLE `espece`
  MODIFY `id_espece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `prevention`
--
ALTER TABLE `prevention`
  MODIFY `id_prevention` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `race`
--
ALTER TABLE `race`
  MODIFY `id_race` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT pour la table `refuge`
--
ALTER TABLE `refuge`
  MODIFY `id_refuge` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `statistique`
--
ALTER TABLE `statistique`
  MODIFY `id_statistique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT pour la table `temoignage`
--
ALTER TABLE `temoignage`
  MODIFY `id_temoignage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_animal_FK` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`),
  ADD CONSTRAINT `adoption_utilisateur0_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `FK_race` FOREIGN KEY (`id_race`) REFERENCES `race` (`id_race`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_animal_FK` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id_animal`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoris_utilisateur0_FK` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE;

--
-- Contraintes pour la table `race`
--
ALTER TABLE `race`
  ADD CONSTRAINT `FK_espece` FOREIGN KEY (`id_espece`) REFERENCES `espece` (`id_espece`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
