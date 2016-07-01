-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 30 Juin 2016 à 22:49
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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `video`
--

INSERT INTO `video` (`id`, `file`, `file_url`, `id_user`, `like_count`, `dislike_count`, `date_upload`, `difference_like`, `nom_musique`) VALUES
(18, 'The Saddest 10 Seconds Video Ever.mp4', 'assets/video/The Saddest 10 Seconds Video Ever.mp4', 1, 11, 0, '2016-06-28 14:09:33', 11, ''),
(19, 'vlc-record-2016-06-20-13h52m40s-z.mp4-.mp4', 'assets/video/vlc-record-2016-06-20-13h52m40s-z.mp4-.mp4', 3, 9, 1, '2016-06-28 14:13:32', 8, ''),
(20, '10 second scary video.mp4', 'assets/video/10 second scary video.mp4', 4, 3, 2, '2016-06-28 15:24:01', 1, ''),
(21, '8 second video of me with remote changing the color of a shoe.mp4', 'assets/video/8 second video of me with remote changing the color of a shoe.mp4', 5, 8, 0, '2016-06-28 15:44:11', 8, ''),
(22, 'The funniest 10 second video ever.mp4', 'assets/video/The funniest 10 second video ever.mp4', 6, 2, 0, '2016-06-29 13:08:28', 2, ''),
(28, 'The funniest 10 second video ever.mp4c36095d2d447ee8eeb296a9a19ece353', 'assets/video/The funniest 10 second video ever.mp4', 6, 0, 0, '2016-06-30 22:00:30', 0, 'sdsqd'),
(27, 'The Saddest 10 Seconds Video Ever.mp4', 'assets/video/The Saddest 10 Seconds Video Ever.mp4', 6, 0, 0, '2016-06-30 21:41:02', 0, 'Hello');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
