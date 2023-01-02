-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 02 jan. 2023 à 13:22
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sezhair`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `username`, `mdp`, `prenom`, `nom`, `admin`) VALUES
(1, 'ersiiyn', '$2y$10$sLUl6QL1Svl7/5ACHSGYFOrggqfbq1dr0ei4YeCqWPeL8JNh4ujM2', 'Kevin', 'Bil', 'ADMIN');

-- --------------------------------------------------------

--
-- Structure de la table `bloc`
--

DROP TABLE IF EXISTS `bloc`;
CREATE TABLE IF NOT EXISTS `bloc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `id_page` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_page_bloc` (`id_page`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bloc`
--

INSERT INTO `bloc` (`id`, `nom`, `id_page`) VALUES
(1, 'services', 1),
(2, 'lavages 1 ', 1),
(3, 'lavages 2', 1),
(4, 'lavages 3', 1),
(5, 'sezhair', 1),
(6, 'presentation', 1),
(7, 'produits', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(255) NOT NULL,
  `image_categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_categorie`, `image_categorie`) VALUES
(1, 'prestations', 'prestations.png'),
(2, 'medias', 'medias.png'),
(3, 'contact', 'contact.png'),
(4, 'produits', 'produits.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id`, `nom`, `prenom`, `pseudo`, `mdp`, `email`, `numero`) VALUES
(1, 'BIL', 'Kévin', 'ersiiyn', '$2y$10$8xzQWLbRl5B7HAUfV6bjRu8N/ZmanNA5GJt/zGHThsD4MNASqswcC', 'ersiiyn@outlook.fr', 781607280),
(2, 'Lel', 'Cedric', 'Cece57', '$2y$10$mHGC9JHCHw34lSVOF2o36OtT8nbpeNQoXKMgW9N61xzOuXNcQqR56', 'ersiiyn@outlook.fr', 781607280),
(4, 'Bil', 'mehmet', 'mehmet57', '$2y$10$iy9iIhbql0uis0oPB2hhROJVQaPkhAZBHFp5Of63nSEgMyriwo8UK', 'ersiiyn@outlook.fr', 781607280),
(5, 'Lavoh', 'Dider', 'didi57', '$2y$10$4GFdoXp8poz4sg9NZIbFruMiMYS.coTN9XS3fD95iQpL4YBZymK9a', 'didier@outlook.fr', 781606060),
(6, 'dcdvc', 'fdvfv', 'fdvdfv', '$2y$10$LsrUaSp1hnlioioK2PoG0eLbunnBqWcEoJDst.cdB/pNIzUM/XNMy', 'cdffever@vrgege.fr', 707070707),
(7, 'fbdfb', 'dfbdfb', 'dfbdfbdf', '$2y$10$XpO3iYYqyAymhi7MqDYdj.aoShVnfnSt6xgDH0oufmfbEVYNhQwQ2', 'test@kaka.fr', 708090405),
(8, 'Test', 'Fonction', 'fontion57', '$2y$10$VbogDdZ14RsYN.fCf/GQauA.SqhDp9wGakg60JAG9UHPuiPITYl8e', 'test@fonction.fr', 704010508),
(9, 'BIL', 'Kévin', 'ersiiyn57', '$2y$10$MVF80uaCAh9GyYzoYqzHnuyMPTu3hwpawOiNO8e8vNNa6StZJP9kq', 'ersiiyn@outlook.fr', 781607280);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `num` varchar(255) NOT NULL,
  `num2` varchar(255) NOT NULL,
  `horaire` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categorie_contact` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `id_categorie`, `num`, `num2`, `horaire`, `adresse`, `ville`) VALUES
(1, 3, '09 54 42 38 11', '07 55 32 24 60', 'Mardi - Samedi 9H00 - 19H00', '28 Rue Maréchal Foch', '57440 ALGRANGE');

-- --------------------------------------------------------

--
-- Structure de la table `contacter`
--

DROP TABLE IF EXISTS `contacter`;
CREATE TABLE IF NOT EXISTS `contacter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacter`
--

INSERT INTO `contacter` (`id`, `nom`, `email`, `mot`) VALUES
(10, 'BIL', 'ersiiyn@outlook.fr', 'essaie 1'),
(11, 'BIL', 'ersiiyn@outlook.fr', 'test message'),
(13, 'ersin', 'lala@efef', 'je test'),
(14, 'BIL', 'ersiiyn@outlook.fr', 'thgeqgerg'),
(15, 'thth', 'thth@rgrg', 'thth'),
(16, 'BIL', 'ersiiyn@outlook.fr', 'test'),
(17, 'BI', 'ersiiyn@outlook.fr', 'dfdfdf'),
(18, 'kevin', 'ersiiyn@outlook.fr', 'test404'),
(19, 'kevin', 'ersiiyn@outlook.fr', 'test408'),
(21, 'dididi', 'testmessage@gmail.com', 'test nouveau dossier'),
(22, 'dididi', 'testmessage@gmail.com', 'test nouveau dossier'),
(23, 'dididi', 'testmessage@gmail.com', 'test nouveau dossier'),
(24, 'dididi', 'testmessage@gmail.com', 'test nouveau dossier'),
(25, 'dididi', 'rgfreger@hotmil.fr', 'test fonction');

-- --------------------------------------------------------

--
-- Structure de la table `element`
--

DROP TABLE IF EXISTS `element`;
CREATE TABLE IF NOT EXISTS `element` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bloc` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bloc_element` (`id_bloc`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `element`
--

INSERT INTO `element` (`id`, `id_bloc`, `nom`, `contenu`) VALUES
(1, 1, 'toilette', 'Toilletage pour hommes'),
(2, 1, 'services', 'services'),
(3, 2, 'image 1', './img/accueil/icon2.png'),
(4, 2, 'titre1', 'Couper et Tailler'),
(5, 2, 'texte1', 'Experts en matière de coupe de cheveux. \nIls sont rapides mais soigneux et vous font de jolies coupes.'),
(6, 3, 'image2', './img/accueil/icon1.png'),
(7, 3, 'titre2', 'Lavage & Séchage'),
(8, 3, 'texte2', 'Prenez place dans nos fauteuils en cuir fin, adossez-vous et laissez-nous vous faire mousser une tête fraîche de manière luxueuse.'),
(9, 4, 'image3', './img/accueil/icon3.png'),
(10, 4, 'titre3', 'Barbe Soignée'),
(11, 4, 'texte3', 'Domptez les poils de barbe emmêlés et désordonnés comme un gentleman avec les services de nettoyage de barbe.'),
(12, 5, 'image', './img/accueil/salon.jpg'),
(13, 5, 'titre', 'faites nous confiance !'),
(14, 5, 'texte 1', 'La coiffure est notre passion, faire de votre instant coiffure un moment de détente pour vous, une véritable pause, afin de vous rendre unique.'),
(15, 6, 'equipe', 'Notre équipe'),
(16, 6, 'titre', 'Présentation'),
(17, 7, 'texte', 'Entretien régulier'),
(18, 7, 'image', './img/accueil/bros.jpg'),
(19, 5, 'texte2', 'Nous attachons le plus grand soin à la qualité de nos services, nous prenons le temps de vous écouter afin de vous proposer ce qu’il vous conviendra le mieux en respectant votre personnalité.'),
(20, 5, 'texte 3', 'Faites confiance à nos coiffeurs certifiés pour révéler la beauté de vos cheveux et mettre en valeur votre capital séduction. '),
(21, 5, 'texte 4', 'Nous aimerions avoir l\'opportunité d\'être votre barbier de choix à Algrange.'),
(22, 7, 'texte 1', 'En dehors des services de Sezhair, nous sommes conscients que vous avez besoin d’avoir une jolie coiffure et une belle barbe soignée en permanence. C’est pourquoi, nous vous proposons différents produits accessibles et de qualité pour un entretien au quotidien de vos cheveux et de votre barbe.\r\n'),
(23, 7, 'texte 2', 'N’attendez plus pour prendre soin de votre coiffure, de votre barbe ou de votre visage en rendant visite à votre coiffeur.  ');

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

DROP TABLE IF EXISTS `medias`;
CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `medias`
--

INSERT INTO `medias` (`id`, `photo`) VALUES
(8, 'coupe2.jpg'),
(9, 'coupe4.jpg'),
(11, 'coupe3.jpg'),
(12, 'coupe5.jpg'),
(13, 'coupe6.jpg'),
(14, 'coupe8.jpg'),
(16, 'coupe10.jpg'),
(17, 'coupe11.jpg'),
(18, 'coupe12.jpg'),
(22, 'coupe13.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `nom`) VALUES
(1, 'accueil');

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
CREATE TABLE IF NOT EXISTS `presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descriptions` varchar(400) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `presentation`
--

INSERT INTO `presentation` (`id`, `descriptions`, `photo`, `nom`) VALUES
(1, 'Gérant du salon de coiffure.\r\nA vos cotés depuis 30 ans pour des coupes soigneusement coiffé et rapide', 'sezgin-photo.jpg', 'Sezgin'),
(2, 'Employé du salon de coiffure.\r\n8 ans d\'expérience', 'hassan.jpg', 'Devran'),
(3, 'Stagiaire du salon de coiffure.', 'ekin.jpg', 'Mehmet');

-- --------------------------------------------------------

--
-- Structure de la table `prestations`
--

DROP TABLE IF EXISTS `prestations`;
CREATE TABLE IF NOT EXISTS `prestations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sous_categorie` int(11) NOT NULL,
  `formule` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_SC_prestations` (`id_sous_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prestations`
--

INSERT INTO `prestations` (`id`, `id_sous_categorie`, `formule`, `prix`) VALUES
(5, 1, 'Shampoing - Coupe', 14),
(6, 1, 'Shampoing - Coupe - Barbe', 24),
(7, 1, 'Coupe Enfants', 13),
(9, 2, 'Barbe Classique', 10),
(10, 2, 'Taille De Barbe Dégradé', 12),
(13, 3, 'Epilation A La Cire', 3),
(14, 3, 'Masque Au Visage Classique', 12),
(15, 3, 'Soin Du Visage,Soin Serviette Chaude', 20),
(16, 1, 'Coupe Enfants Dégradé à Blanc', 15),
(17, 3, 'Epilation Sourcils Au Fil', 8),
(18, 2, 'Shampoing Barbe Brushing', 15);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sous_categorie` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `prix` float NOT NULL,
  `photo` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_souscat_produits` (`id_sous_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `id_sous_categorie`, `nom`, `descriptions`, `prix`, `photo`, `statut`) VALUES
(1, 1, 'Fiber gum', 'Hair gel - Noir- Extrem look', 10, 'gel-ultra-noir.jpg', 'disponible'),
(2, 1, 'Ultra strong argan', 'Hair gel - Vert- Extrem look', 10, 'gel-ultra-vert.jpg', 'disponible'),
(3, 1, 'Ultra strong keratin', 'Hair gel - Bleu - Extrem look', 10, 'gel-ultra-bleu.jpg', 'disponible'),
(4, 1, 'Aqua 5 max', 'Bleu', 5, 'gel-bleu.jpg', 'disponible'),
(6, 2, 'Cologne - Exclusive', 'Rouge', 6, 'after-rouge.jpg', 'disponible'),
(7, 2, 'Cologne - Lemon', 'Jaune', 5, 'after-jaune.jpg', 'disponible'),
(8, 1, 'Aqua 3 max ', 'Blanc', 5, 'gel-blanc3.jpg', 'disponible'),
(9, 1, 'Aqua 8 max', 'Noir', 5, 'gel-noir.jpg', 'disponible'),
(10, 1, 'Aqua 6 max', 'Gris', 5, 'gel-gris.jpg', 'disponible'),
(11, 1, 'Aqua 7 max', 'Cire capillaire pour un coiffage parfait - \r\n Différentes variétés avec échelle de force -\r\n Parfums fruités', 5.6, 'gel-rouge.jpg', 'disponible'),
(12, 2, 'Cologne - Ultimate', 'Vert', 6, 'after-vert.jpg', 'disponible'),
(13, 1, 'Aqua 4 max', 'Orange', 5, 'gel-orange.jpg', 'disponible'),
(14, 1, 'Matte wax', 'Maximum hold - Vert ', 6, 'gel-vert.jpg', 'disponible'),
(17, 7, 'Beard mustache oil', '30ml', 12, 'huile-barbe.jpg', 'disponible'),
(21, 1, 'Forming aqua gel', 'Immortal men power system - Hair wax forming aqua gel provocative shapes', 5, 'immortal-rouge.jpg', 'disponible'),
(23, 1, 'Red one wax ', 'Cire coiffante forte tenue 150ml est une cire coiffante riche en vitamine et minéraux. Pour tous types de cheveux, elle est parfaite pour coiffer les cheveux crépus, frisés et bouclés et maitrise parfaitement les cheveux rebelles et les petits cheveux du bord (babyhair). Sa texture non grasse s\'applique facilement et plaque parfaitement les cheveux et laisse un fini brillant aux cheveux. Cire coiffante forte tenue 150m laisse un parfum frais de pastèque. *Tenue longue durée *Application facile *Fini brillant *Senteur pastèque *Texture non grasse *Grand format 150 ml', 8, 'red-rouge.jpg', 'disponible'),
(24, 1, 'Red One Full Force Blue', 'Vous cherchez une cire pour plaquer les cheveux, les ébouriffer ou créer une coupe sur mesure ?  Un produit qui offre une longue durée maintenue toute la journée ? Une pâte qui vous apporte un parfum fruité ? Il vous faut la cire Red One Full Force Blue 150 ml. Cette cire coiffante Full Force est validée par une majorité de coiffeurs/barber et de nombreux clients. Retrouvez dans notre boutique en ligne Fstyles une variété de Cire Red One.', 10, 'redone-bleu.jpg', 'disponible'),
(25, 6, 'Rasoir Point Platinum Pt5177', 'Description du moteur AC (linéaire): Moteur durable AC (linéaire) Moteur rapide et puissant. Il est fabriqué en acier japonais 10000 tr/min. La durée de vie est de 5 ans. Fonctionnement silencieux. Description de la batterie : Batterie ICR Lithium Ion d\'une capacité de 2200 mAh. Temps de charge : 70 minutes / Temps de travail : 120 minutes. Il peut être rechargé 1500 fois. Protection contre les surcharges. Utilisation filaire et sans fil Description des lames de coupe : Japon 440C, lames en acier inoxydable à haute teneur en carbone. Dureté Rockwell 62-63 degrés pour une clarté maximale et une durée de vie plus longue. Matériau inoxydable. Longueur de coupe réglable de 0,3 à 3 mm Lames fixes de 45 mm de large Autre descriptif : Adaptateur câble rond souple 3 m ou sans fil, fonction d\'utilisation. Peigne en 5 tailles différentes + Brosse de nettoyage + Bouteille d\'huile 100-240V, 50-60Hz Sortie : 5V 2A Taille du produit (L/l/H) 154 X 48 X 52 mm Poids : 330 gr\r\nUn maximum de 5 pièces de ce produit peut être commandé. Trendyol se réserve le droit d\'annuler les commandes de plus de 5 unités.\r\nPlus de 10 titres sont proposés à la vente au prix de la campagne.\r\nLe prix de vente du produit que vous avez examiné est déterminé par le vendeur.\r\nUn produit peut être vendu par plusieurs vendeurs. Les vendeurs de produits proposés à la vente par plusieurs vendeurs sont répertoriés en fonction du prix qu\'ils ont fixé pour le produit, des évaluations du vendeur, de l\'état de la livraison, des promotions sur les produits, que la cargaison soit gratuite ou non, que les produits puissent être livrés rapidement livraison, ainsi que le stock et les catégories de produits.\r\n', 70, 'rasoir-platinum.jpg', 'disponible');

-- --------------------------------------------------------

--
-- Structure de la table `souscat_produits`
--

DROP TABLE IF EXISTS `souscat_produits`;
CREATE TABLE IF NOT EXISTS `souscat_produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cat_prod` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `souscat_produits`
--

INSERT INTO `souscat_produits` (`id`, `id_categorie`, `nom`) VALUES
(1, 4, 'Les gels'),
(2, 4, 'Après shampoing'),
(3, 4, 'Hair spray'),
(4, 4, 'Cream cologne'),
(5, 4, 'Laque'),
(6, 4, 'Tondeuse/Lame'),
(7, 4, 'Huile barbe');

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

DROP TABLE IF EXISTS `sous_categorie`;
CREATE TABLE IF NOT EXISTS `sous_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `nom_sous_categorie` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cat_souscat` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`id`, `id_categorie`, `nom_sous_categorie`, `image`) VALUES
(1, 1, 'Présentation coiffure', './img/prestation/benchmark.png'),
(2, 1, 'Présentation barbier', './img/prestation/echec.png'),
(3, 1, 'Soins et relaxations', './img/prestation/haricuts.png');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bloc`
--
ALTER TABLE `bloc`
  ADD CONSTRAINT `fk_page_bloc` FOREIGN KEY (`id_page`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_categorie_contact` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `element`
--
ALTER TABLE `element`
  ADD CONSTRAINT `fk_bloc_element` FOREIGN KEY (`id_bloc`) REFERENCES `bloc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prestations`
--
ALTER TABLE `prestations`
  ADD CONSTRAINT `fk_SC_prestations` FOREIGN KEY (`id_sous_categorie`) REFERENCES `sous_categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `fk_souscat_produits` FOREIGN KEY (`id_sous_categorie`) REFERENCES `souscat_produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `souscat_produits`
--
ALTER TABLE `souscat_produits`
  ADD CONSTRAINT `fk_cat_prod` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD CONSTRAINT `fk_cat_souscat` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
