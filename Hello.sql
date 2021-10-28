-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `Hello-Design`
--

-- --------------------------------------------------------

--
-- Structure de la table `INSCRIPTION`
--

CREATE TABLE `INSCRIPTION` (
  `PSEUDO` varchar(15) NOT NULL,
  `MDP` varchar(30) NOT NULL,
  `ADDRESS_MAIL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `INSCRIPTION`
--

INSERT INTO `INSCRIPTION` (`PSEUDO`, `MDP`, `ADDRESS_MAIL`) VALUES
('salut', 'Uvuwxpauw5YU8uG99+nkvw==', 'test@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `INSCRIPTION`
--
ALTER TABLE `INSCRIPTION`
  ADD PRIMARY KEY (`PSEUDO`);
