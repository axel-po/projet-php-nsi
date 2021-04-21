-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 21, 2021 at 03:45 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mediatheque`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom_categorie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Comédie'),
(2, 'Fantastique'),
(3, 'Aventure');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(255) DEFAULT NULL,
  `prenom_client` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `cp` varchar(11) DEFAULT NULL,
  `tel_client` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `adresse`, `ville`, `cp`, `tel_client`) VALUES
(1, 'MAINGOT', 'Gabriel', '45 rue de la Marne', 'Sainte-Menehould', '51 800', '06 78 45 10 20'),
(2, 'POINTUD', 'Axel', '45 rue des fleurs', 'Paris', '75 000', '07 35 51 71 65'),
(4, 'Doe', 'John', '3 rue des peuples', 'Marseille', '13 000', '06 78 65 45 65'),
(5, 'Billes', 'Manon', '34 rue des brics', 'Rennes', '35 000', '09 78 34 23 65 34'),
(8, 'Besson', 'Julie', '2 bis des Harches', 'Reims', '51 000', '06 68 63 44 61');

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_film` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_retour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emprunt`
--

INSERT INTO `emprunt` (`id_film`, `id_client`, `date_emprunt`, `date_retour`) VALUES
(1, 1, '2021-02-09', '2021-02-16'),
(3, 2, '2021-02-07', '2021-02-15'),
(4, 5, '2021-04-20', '2021-04-21'),
(4, 5, '2021-04-22', '2021-04-28'),
(4, 8, '2021-04-29', '2021-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `nom_film` varchar(255) NOT NULL,
  `annee_film` year(4) NOT NULL,
  `id_realisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `nom_film`, `annee_film`, `id_realisateur`, `id_categorie`, `image`) VALUES
(2, 'Les Enfants du temps', 2020, 2, 2, 'enfant-du-temps.jpeg'),
(3, 'Star Wars', 1975, 5, 2, 'star-wars.jpeg'),
(4, 'Taxi 5', 2018, 4, 1, 'taxi5.jpeg'),
(5, 'Jurassic Park', 1993, 3, 3, 'jurassic-park.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `realisateur`
--

CREATE TABLE `realisateur` (
  `id_realisateur` int(11) NOT NULL,
  `nom_realisateur` varchar(255) NOT NULL,
  `prenom_realisateur` varchar(255) NOT NULL,
  `nationalite_realisateur` varchar(255) NOT NULL,
  `annee_naissance` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `realisateur`
--

INSERT INTO `realisateur` (`id_realisateur`, `nom_realisateur`, `prenom_realisateur`, `nationalite_realisateur`, `annee_naissance`) VALUES
(1, 'Miller', 'George', 'Australien', 1945),
(2, 'Shinkai', 'Makoto', 'Japonais', 1973),
(3, 'Spielberg', 'Steven', 'Américain', 1946),
(4, 'Besson', 'Luc', 'Français', 1959),
(5, 'George', 'Lucas', 'Américain', 1944);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `id_realisateur` (`id_realisateur`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indexes for table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`id_realisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `realisateur`
--
ALTER TABLE `realisateur`
  MODIFY `id_realisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;