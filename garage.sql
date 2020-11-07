-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 30 oct. 2020 à 16:28
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `garage`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message_contact` varchar(255) NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `email`, `sujet`, `message_contact`, `date_post`) VALUES
(1, 'ste.bco@gmail', 'Livraison', 'bonjour !!!', '2020-07-28 20:48:30'),
(2, 'ste.bco@gmail', 'Livraison', 'encore moi!', '2020-07-28 20:48:30'),
(3, 'ste.bco@gmail', 'Livraison', 'sur de sur', '2020-07-28 20:48:30'),
(4, 'steve.braco@gmail.com', 'Livraison', 'je maaaaaaarche!!!!!', '2020-07-28 20:48:30'),
(5, 'steve.braco@gmail.com', 'Livraison', 'posté le mardi à 22h49', '2020-07-28 20:49:20'),
(6, 'paolo@yahoo.fr', 'Livraison', 'coucou c\'est moi', '2020-10-20 11:35:24'),
(7, 'ava.braco@gmail.com', 'Devis', 'Bonjour, je serai interessé par un devis.\r\nAva', '2020-10-20 12:11:06'),
(8, 'test@test.com', 'Livraison', 'comment se passe la livraison svp ?', '2020-10-27 17:26:10'),
(9, 'test@test.com', 'livraison', 'bonjour comment se passe la livraison svp ?', '2020-10-30 12:07:08');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `creationtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `taxRate` float NOT NULL,
  `totalAmount` double DEFAULT NULL,
  `taxAmount` double DEFAULT NULL,
  `allTaxesIncluded` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `creationtimestamp`, `taxRate`, `totalAmount`, `taxAmount`, `allTaxesIncluded`) VALUES
(144, 115, '2020-10-30 15:23:00', 20, 65, 13, 78),
(145, 89, '2020-10-30 15:24:11', 20, 37, 7.4, 44.4),
(146, 89, '2020-10-30 15:37:31', 20, 45, 9, 54),
(147, 89, '2020-10-30 15:39:43', 20, 50, 10, 60),
(148, 89, '2020-10-30 15:51:29', 20, 45, 9, 54);

-- --------------------------------------------------------

--
-- Structure de la table `customerslines`
--

CREATE TABLE `customerslines` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shopping_id` int(11) NOT NULL,
  `quantityOrdered` int(4) NOT NULL,
  `priceEach` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customerslines`
--

INSERT INTO `customerslines` (`id`, `customer_id`, `shopping_id`, `quantityOrdered`, `priceEach`) VALUES
(69, 52, 55, 2, 20),
(71, 53, 52, 1, 25),
(73, 54, 52, 1, 25),
(75, 55, 52, 1, 25),
(76, 55, 44, 1, 10),
(77, 55, 45, 1, 35),
(78, 55, 46, 1, 7),
(80, 56, 52, 1, 25),
(81, 56, 44, 1, 10),
(82, 56, 45, 1, 35),
(83, 56, 46, 1, 7),
(84, 57, 50, 2, 30),
(85, 58, 55, 1, 20),
(87, 58, 50, 1, 30),
(88, 58, 51, 1, 70),
(89, 59, 55, 1, 20),
(91, 59, 50, 1, 30),
(92, 59, 51, 1, 70),
(93, 60, 55, 1, 20),
(95, 60, 50, 1, 30),
(96, 60, 51, 1, 70),
(97, 61, 55, 1, 20),
(99, 61, 50, 1, 30),
(100, 61, 51, 1, 70),
(101, 62, 55, 1, 20),
(103, 62, 50, 1, 30),
(104, 62, 51, 1, 70),
(105, 63, 55, 1, 20),
(107, 63, 50, 1, 30),
(108, 63, 51, 1, 70),
(109, 64, 55, 1, 20),
(111, 64, 50, 1, 30),
(112, 64, 51, 1, 70),
(113, 65, 55, 1, 20),
(115, 65, 50, 1, 30),
(116, 65, 51, 1, 70),
(117, 66, 55, 1, 20),
(119, 66, 50, 1, 30),
(120, 66, 51, 1, 70),
(121, 67, 55, 1, 20),
(123, 67, 50, 1, 30),
(124, 67, 51, 1, 70),
(125, 68, 55, 1, 20),
(127, 68, 50, 1, 30),
(128, 68, 51, 1, 70),
(129, 69, 55, 1, 20),
(131, 69, 50, 1, 30),
(132, 69, 51, 1, 70),
(133, 70, 55, 1, 20),
(135, 70, 50, 1, 30),
(136, 70, 51, 1, 70),
(137, 71, 55, 1, 20),
(139, 71, 50, 1, 30),
(140, 71, 51, 1, 70),
(141, 72, 55, 1, 20),
(143, 72, 50, 1, 30),
(144, 72, 51, 1, 70),
(145, 73, 55, 1, 20),
(147, 73, 50, 1, 30),
(148, 73, 51, 1, 70),
(149, 74, 55, 1, 20),
(151, 74, 50, 1, 30),
(152, 74, 51, 1, 70),
(153, 75, 55, 1, 20),
(155, 75, 50, 1, 30),
(156, 75, 51, 1, 70),
(157, 76, 55, 1, 20),
(159, 76, 50, 1, 30),
(160, 76, 51, 1, 70),
(161, 77, 55, 1, 20),
(163, 77, 50, 1, 30),
(164, 77, 51, 1, 70),
(165, 78, 55, 1, 20),
(167, 78, 50, 1, 30),
(168, 78, 51, 1, 70),
(169, 79, 55, 1, 20),
(171, 79, 50, 1, 30),
(172, 79, 51, 1, 70),
(173, 80, 55, 1, 20),
(175, 80, 50, 1, 30),
(176, 80, 51, 1, 70),
(177, 81, 55, 1, 20),
(179, 81, 50, 1, 30),
(180, 81, 51, 1, 70),
(181, 82, 55, 1, 20),
(183, 82, 50, 1, 30),
(184, 82, 51, 1, 70),
(185, 83, 55, 1, 20),
(187, 83, 50, 1, 30),
(188, 83, 51, 1, 70),
(189, 84, 55, 1, 20),
(191, 84, 50, 1, 30),
(192, 84, 51, 1, 70),
(193, 85, 55, 1, 20),
(195, 85, 50, 1, 30),
(196, 85, 51, 1, 70),
(197, 86, 55, 1, 20),
(199, 86, 50, 1, 30),
(200, 86, 51, 1, 70),
(201, 87, 50, 1, 30),
(202, 87, 51, 1, 70),
(203, 88, 51, 1, 70),
(204, 89, 40, 1, 35),
(205, 90, 40, 1, 35),
(206, 91, 40, 1, 35),
(207, 91, 54, 1, 25),
(208, 91, 53, 1, 20),
(209, 91, 50, 1, 30),
(210, 92, 40, 1, 35),
(211, 92, 54, 1, 25),
(212, 92, 53, 1, 20),
(213, 92, 50, 3, 30),
(214, 93, 53, 1, 20),
(215, 93, 52, 1, 25),
(216, 94, 54, 1, 25),
(217, 94, 53, 1, 20),
(218, 95, 52, 3, 25),
(219, 96, 51, 1, 70),
(220, 96, 50, 1, 30),
(221, 96, 48, 1, 3),
(222, 96, 47, 1, 20),
(223, 97, 54, 1, 25),
(224, 98, 40, 1, 35),
(225, 99, 53, 1, 20),
(226, 99, 54, 1, 25),
(227, 100, 53, 1, 20),
(228, 100, 54, 1, 25),
(229, 100, 52, 1, 25),
(230, 101, 53, 1, 20),
(231, 101, 54, 1, 25),
(232, 101, 55, 1, 20),
(233, 101, 52, 1, 25),
(234, 101, 48, 8, 3),
(235, 102, 52, 1, 25),
(236, 102, 53, 1, 20),
(237, 102, 54, 2, 25),
(238, 103, 53, 1, 20),
(239, 103, 52, 2, 25),
(240, 103, 48, 1, 3),
(241, 104, 52, 1, 25),
(242, 105, 52, 1, 25),
(243, 108, 53, 1, 20),
(244, 108, 52, 1, 25),
(245, 109, 54, 2, 25),
(246, 110, 53, 1, 20),
(247, 110, 52, 1, 25),
(248, 110, 50, 1, 30),
(249, 110, 45, 1, 35),
(250, 111, 53, 1, 20),
(251, 111, 52, 1, 25),
(252, 111, 54, 1, 25),
(253, 112, 54, 1, 25),
(254, 112, 40, 1, 35),
(255, 112, 42, 1, 30),
(256, 113, 54, 1, 25),
(257, 113, 53, 1, 20),
(258, 113, 52, 1, 25),
(259, 114, 54, 1, 25),
(260, 114, 53, 1, 20),
(261, 114, 52, 1, 25),
(262, 115, 54, 1, 25),
(263, 115, 53, 1, 20),
(264, 116, 54, 1, 25),
(265, 116, 53, 1, 20),
(266, 117, 53, 1, 20),
(267, 128, 52, 1, 25),
(268, 128, 53, 1, 20),
(269, 129, 53, 1, 20),
(270, 129, 52, 1, 25),
(271, 130, 52, 1, 25),
(272, 131, 53, 1, 20),
(273, 132, 54, 1, 25),
(274, 132, 53, 1, 20),
(275, 133, 53, 1, 20),
(276, 134, 52, 1, 25),
(277, 135, 53, 1, 20),
(278, 135, 55, 1, 20),
(279, 135, 54, 1, 25),
(280, 136, 52, 2, 25),
(281, 136, 54, 1, 25),
(300, 144, 53, 2, 20),
(301, 144, 52, 1, 25),
(302, 145, 53, 1, 20),
(303, 145, 44, 1, 10),
(304, 145, 46, 1, 7),
(305, 146, 54, 1, 25),
(306, 146, 53, 1, 20),
(307, 147, 52, 1, 25),
(308, 147, 54, 1, 25),
(309, 148, 54, 1, 25),
(310, 148, 53, 1, 20);

-- --------------------------------------------------------

--
-- Structure de la table `shopping`
--

CREATE TABLE `shopping` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `price` double NOT NULL,
  `creationtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `shopping`
--

INSERT INTO `shopping` (`id`, `name`, `picture`, `description`, `quantity`, `price`, `creationtime`) VALUES
(39, 'Désodorisant Arbre Magique', '81fEAeWVBTL._AC_SL1500_.jpg', 'Parfum fraise.\r\nLe grand classique qui désodorise et donne une touche originale à votre habitacle !\r\n', 20, 30, '2020-10-04 22:30:06'),
(40, 'DIsque Apprenti Conducteur', 'apprenti.jpg', 'Disque A Magnétique Jeune Conducteur Adhésif\r\nParfait pour la Sécurité de Conduite', 40, 35, '2020-10-04 22:31:49'),
(42, 'Balais d\'essuie-Glace Avant', 'balai-dessuie-glace.png', ' Jeu de 2 balais d\'essuie-Glace Avant. Type: Plats, raclettes. Accrochage en U. (65cm-60cm)', 40, 30, '2020-10-04 22:33:50'),
(43, 'Stickers Bébé à Bord ', 'bébéabord.png', 'Stickers Bébé à Bord Dark Vador', 20, 25, '2020-10-04 22:35:15'),
(44, 'Disque de stationnement ', 'disquestra.jpg', 'Disque de stationnement pour zone bleue gratuite\r\nObligatoire dans tout véhicule pour stationnement en zone bleue', 15, 10, '2020-10-04 22:36:41'),
(45, 'Kit d\'Urgence Auto', 'kitgilet.jpg', '3 accessoires inclus: triangle de signalisation, veste et gilet haute visibilité, gants.', 10, 35, '2020-10-04 22:38:17'),
(46, 'Raclette Anti-givre', 'raclette.jpg', 'Solide: lame en polycarbonate\r\nEfficace: largeur 10cm + griffes\r\nConfort d\'utilisation: manche enrobé de mousse\r\nPratique: se range facilement dans la boîte à gants', 5, 7, '2020-10-04 22:39:30'),
(47, 'Tapis de Voiture Universel', 'tapis-voiture.jpg', 'Tapis de sol universels pour véhicules à conduite à droite, Talon soudé, Coutures de couleur Noir', 32, 20, '2020-10-04 22:40:53'),
(48, 'Autocollant Plume ', 'autocollant-plume.jpg', ' 6 * 10 4 Cm Plume Vinyle Car-Styling Autocollants De Voiture', 5, 3, '2020-10-04 22:42:38'),
(50, 'Couvre-volant', 'Chaud-volant.jpg', 'Couvre-volant de Voiture Laine 36-38cm', 40, 30, '2020-10-04 22:44:54'),
(51, 'Organisateur de Voiture', 'organisateur-de-voiture.jpg', 'Organisateur de Voiture Imperméable Protecteur de Siège avec Plateau,', 50, 70, '2020-10-04 22:46:20'),
(52, 'Pare-Soleil Spiderman rouge', 'paresoleilspiderman.png', ' Protection Pare Brise Voiture Anti UV Pluie Givre Tous Les Saisons, 160x86CM', 40, 25, '2020-10-04 22:47:24'),
(53, 'Sac de Transport', 'sacdetransport.jpg', 'Sac de transport Organisateur stockage double couche autocollant téléphone Coin clés et petits', 15, 20, '2020-10-04 22:48:47'),
(54, 'Support Tablette', 'support-tablette.jpg', 'Porte Tablette Téléphone Voiture pour Appui-tête Universel Rotation 360°', 10, 25, '2020-10-04 22:50:22'),
(55, 'Support Telephone', 'support-tel.jpg', ' Support Téléphone Voiture Rotation à 360 Degrés Tableau de Bord Pare-Brise Support Portable Voiture pour tout téléphone', 5, 20, '2020-10-04 22:51:37');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(5) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `creationtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `address`, `zipcode`, `city`, `country`, `phone`, `creationtime`, `role`) VALUES
(80, 'lildurk@gmail.cim', '$2y$11$cbf5bd51728451983e9f0uzzTYA2.gaGCsUuc5TrV5ei2mFWllz06', 'lil', 'durk', 'chitown', '30611', 'chicago', 'states', '06154029475', '2020-10-03 14:51:38', 'USER'),
(81, 'jeangabin@gmail.com', '$2y$11$1c5a9ec72a6fc333d50a5uaN4v3EUnXt89UyaetWuDoptricoPUh.', 'jean', 'gabin', '93 rue du vingt', '93020', 'Alofirt', 'Serbie', '0545028472', '2020-10-09 13:08:04', 'USER'),
(82, 'ava.braco@gmail.com', '$2y$11$c549178c827b8d07fb3faugWHKaEt9ZB.3Eokr2Syyq6sjJhRDOgW', 'ava', 'bracoo', '112 avenue des champs élysées', '75020', 'PARIS', 'France', '0616564138', '2020-10-09 21:25:05', 'USER'),
(89, 'jeanmouloud@live.fr', '$2y$11$09386001eeb393d72aa7euxbFPBhNI.h3as9gllKfXjMdERymmkqC', 'jacquy-chan', 'dupont', '112 avenue des champs élysées', '75020', 'PARIS', 'France', '0616564138', '2020-10-09 21:56:26', 'USER'),
(94, 'rinceeeee@live.fr', '$2y$11$6efe3056c1398c4481173O0W1uCxnIxRYt9pTm9EuBSy7BD5OsJeK', 'jacquy-chan', 'dupont', '112 avenue des champs élysées', '75020', 'PARIS', 'France', '0616564138', '2020-10-23 23:15:33', 'USER'),
(115, 'test@test.com', '$2y$11$0b9a79bcd7444df75355eOH26OYApYewT3BxPW6lKNqQKtD9zIBUe', 'steve', 'braco', '118 Boulevard Bessières', '75017', 'paris', 'France', '0616564127', '2020-10-28 07:13:55', 'ADMIN'),
(140, 'admin@admin.com', '$2y$11$96745a3728bba0a10fbcbOec.ziBRL5F736wWnFiD/NhGUu5H/sS.', 'Admin', 'admin', 'admin', 'admin', 'admin', 'admin', '0616264123', '2020-10-30 15:52:50', 'ADMIN');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `customerslines`
--
ALTER TABLE `customerslines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `shopping_id` (`shopping_id`);

--
-- Index pour la table `shopping`
--
ALTER TABLE `shopping`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT pour la table `customerslines`
--
ALTER TABLE `customerslines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT pour la table `shopping`
--
ALTER TABLE `shopping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `customerslines`
--
ALTER TABLE `customerslines`
  ADD CONSTRAINT `customerslines_ibfk_1` FOREIGN KEY (`shopping_id`) REFERENCES `shopping` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
