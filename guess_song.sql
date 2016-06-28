-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 28 Juin 2016 à 20:33
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `guess_song`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pseudo`, `password`, `email`) VALUES
(1, 'Dupont', 'Daniel', 'Leinad93160', 'azerty', 't806@gmail.com'),
(2, 'Dupont', 'Daniel', 'Leinad93160', 'azerty', 't806@gmail.com'),
(3, 'Jean', 'Alain', 'jean63', '63', 'ok@gmail.com'),
(4, 'Dark', 'Vador', 'Vador45', 'hello', 'hello@gmail.com'),
(5, 'Clement', 'Lolo', 'IonicMan', 'io', 'IonicMan@gmail.com'),
(6, 'toto', 'tata', 'toto93', '$2y$10$dmsWd75BdO1kBT7vLRWZCerfgUuXNqJHOvKPVr2KFKU6neDaAXR92', 'toto93@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_file` int(11) NOT NULL,
  `like_count` int(11) DEFAULT '0',
  `dislike_count` int(11) DEFAULT '0',
  `date_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `difference_like` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `video`
--

INSERT INTO `video` (`id`, `file`, `file_url`, `id_file`, `like_count`, `dislike_count`, `date_upload`, `difference_like`) VALUES
(20, '10 second scary video.mp4', 'assets/video/10 second scary video.mp4', 4, 0, 0, '2016-06-28 15:24:01', 0),
(18, 'The Saddest 10 Seconds Video Ever.mp4', 'assets/video/The Saddest 10 Seconds Video Ever.mp4', 1, 0, 0, '2016-06-28 14:09:33', 0),
(19, 'vlc-record-2016-06-20-13h52m40s-z.mp4-.mp4', 'assets/video/vlc-record-2016-06-20-13h52m40s-z.mp4-.mp4', 3, 0, 0, '2016-06-28 14:13:32', 0),
(21, '8 second video of me with remote changing the color of a shoe.mp4', 'assets/video/8 second video of me with remote changing the color of a shoe.mp4', 5, 0, 0, '2016-06-28 15:44:11', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
