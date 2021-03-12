-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 24 nov. 2020 à 13:43
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `food`
--

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE `plats` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id`, `category`, `name`, `img`, `price`) VALUES
(1, 'meat', 'chicken-salad-grape', 'img/plats/chicken-salad-grape.jpg', 7.79),
(2, 'salad', 'Chef-Salad', 'img/plats/Chef-Salad-1.jpg', 5.79),
(3, 'meat', 'hotdogs', 'img/plats/hotdogs-1.jpg', 5.45),
(4, 'salad', 'baked spaghetti', 'img/plats/baked-spaghetti-.jpg', 8.23),
(5, 'meat', 'mini pizzas', 'img/plats/mini-pizzas.jpg', 6.43),
(6, 'salad', 'copycat panera macandcheese', 'img/plats/copycat-panera-macandcheese-.jpg', 6.34),
(7, 'meat', 'egg rolls', 'img/plats/egg-rolls.jpg', 5.43),
(8, 'salad', 'salade mixe', 'img/plats/salade-mixe.png', 9.55),
(9, 'meat', 'Mango Chicken Tacos', 'img/plats/Mango-Chicken-Tacos-.png', 4.34),
(10, 'salad', 'salade italic', 'img/plats/salade-italic.png', 10.36),
(11, 'meat', 'chicken with potatos', 'img/plats/cheken_with_potatos.png', 7.84),
(12, 'salad', 'chicken salad caesar salad chef salad', 'img/plats/wrap-chicken-salad-caesar.jpg', 5.88),
(13, 'meat', 'sadwich with potatos', 'img/plats/sadwich-with-potatos.png', 7.76),
(14, 'salad', 'salad vinaigrette healthy diet', 'img/plats/salad-vinaigrette-healthy-diet.jpg', 8.83);

-- --------------------------------------------------------

--
-- Structure de la table `users_commands`
--

CREATE TABLE `users_commands` (
  `id` int(11) NOT NULL,
  `prénom` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `telephone` float NOT NULL,
  `zone_de_livration` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users_commands`
--

INSERT INTO `users_commands` (`id`, `prénom`, `nom`, `telephone`, `zone_de_livration`, `date`) VALUES
(22, 'yasssine', 'aibi', 21269000000, 'agadir', '2020-11-24 10:57:56'),
(23, 'yasssine', 'aibi', 68969300, 'sdjmdslfjdfslmdf', '2020-11-24 11:19:36');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `plats`
--
ALTER TABLE `plats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_commands`
--
ALTER TABLE `users_commands`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `plats`
--
ALTER TABLE `plats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users_commands`
--
ALTER TABLE `users_commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
