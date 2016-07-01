-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 01 Juillet 2016 à 10:43
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
  `points` int(11) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pseudo`, `password`, `email`, `points`) VALUES
(1, 'Dupont', 'Daniel', 'Leinad93160', 'azerty', 't806@gmail.com', 1),
(2, 'Dupont', 'Daniel', 'Leinad93160', 'azerty', 't806@gmail.com', 0),
(3, 'Jean', 'Alain', 'jean63', '63', 'ok@gmail.com', 1),
(4, 'Dark', 'Vador', 'Vador45', 'hello', 'hello@gmail.com', 1),
(5, 'Clement', 'Lolo', 'IonicMan', 'io', 'IonicMan@gmail.com', 6),
(6, 'toto', 'tata', 'toto93', '$2y$10$dmsWd75BdO1kBT7vLRWZCerfgUuXNqJHOvKPVr2KFKU6neDaAXR92', 'toto93@gmail.com', 4),
(7, 'tata56', 'tata', 'tatay', '$2y$10$.fN2LD3B7kr9mpZd1XTQpOZy2BelstSiPa6sNMMF2mL88bOBs8chW', 'tatay@gmail.com', 0),
(8, 'monsieur', 'test', 'test', '$2y$10$49I8Y1o8AQhHrLV6yyUTfe8HVBNdI.Z5praVRzSTgy0/vgM92Q5XO', 'test@gmail.com', 0),
(9, 'utilisateur', 'monsieur', 'opeaaa', '$2y$10$ok1SwWsXduodJ3yWVHbyQ.okI5HhWf2lChbhBg4j2iY5pJ26q6.PO', 'aaaaa', 0),
(10, 'utilisateur', 'monsieur', 'opeaaa', '$2y$10$XQD0bfp/Owda.tid8Z65.OCzIuPFHgO2/PAQqHN.31qGbokf5w1V.', 'aaaaa', 0),
(11, 'sqdhjbjh', 'kbkbbb', 'azertya', '$2y$10$g.SZ3tNaDokHXO3kywStzOZo2FwDEwxYtjqh1DuPm.JwlU23gPu1i', 'opnsdknj', 0),
(12, 'uxdesigner', 'uidesigner', 'UiUx', '$2y$10$T24psqis.ecQZQcHzcv3k.TlPiuDIQq/hz22MZM6w5QgHoTApITXW', 'uxdesigner@gmail.com', 0),
(13, 'uxdesigner', 'uidesigner', 'UiUx', '$2y$10$uBJo5WiFMBsOjFO/.MOXUeSVfimOvmtgE2miutbmkxv5I64UvajWW', 'uxdesigner@gmail.com', 0),
(14, 'ksdfhbdskbkh', 'jhbjhbjhb', 'marcmarc', '$2y$10$jq1GVVgKGfb/7BG2j62V6unsvgSHvb2XxXeFkYEpGU7FkemBqR12C', 'marctata@gmail.com', 0);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `like_count` int(11) DEFAULT '0',
  `dislike_count` int(11) DEFAULT '0',
  `date_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `difference_like` int(11) NOT NULL DEFAULT '0',
  `nom_musique` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `video`
--

INSERT INTO `video` (`id`, `file`, `file_url`, `id_user`, `like_count`, `dislike_count`, `date_upload`, `difference_like`, `nom_musique`) VALUES
(18, 'The Saddest 10 Seconds Video Ever.mp4', 'assets/video/The Saddest 10 Seconds Video Ever.mp4', 1, 11, 0, '2016-06-28 14:09:33', 11, ''),
(19, 'vlc-record-2016-06-20-13h52m40s-z.mp4-.mp4', 'assets/video/vlc-record-2016-06-20-13h52m40s-z.mp4-.mp4', 3, 9, 1, '2016-06-28 14:13:32', 8, ''),
(20, '10 second scary video.mp4', 'assets/video/10 second scary video.mp4', 4, 4, 2, '2016-06-28 15:24:01', 2, ''),
(21, '8 second video of me with remote changing the color of a shoe.mp4', 'assets/video/8 second video of me with remote changing the color of a shoe.mp4', 5, 8, 0, '2016-06-28 15:44:11', 8, ''),
(22, 'The funniest 10 second video ever.mp4', 'assets/video/The funniest 10 second video ever.mp4', 6, 2, 0, '2016-06-29 13:08:28', 2, ''),
(28, 'The funniest 10 second video ever.mp4c36095d2d447ee8eeb296a9a19ece353', 'assets/video/The funniest 10 second video ever.mp4', 6, 0, 0, '2016-06-30 22:00:30', 0, 'sdsqd'),
(27, 'The Saddest 10 Seconds Video Ever.mp4', 'assets/video/The Saddest 10 Seconds Video Ever.mp4', 6, 0, 0, '2016-06-30 21:41:02', 0, 'Hello'),
(35, '1467364712268.webm', 'assets/video/1467364712268.webm', 6, 0, 0, '2016-07-01 09:18:32', 0, 'hqsdkjhqsdhq');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
