-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Client :  leonardddub.mysql.db
-- Généré le :  Ven 18 Décembre 2015 à 00:35
-- Version du serveur :  5.5.46-0+deb7u1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `leonardddub`
--

-- --------------------------------------------------------

--
-- Structure de la table `quotes_data`
--

CREATE TABLE IF NOT EXISTS `quotes_data` (
  `id` int(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `quote_id` varchar(255) NOT NULL,
  `bestof` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `quotes_list`
--

CREATE TABLE IF NOT EXISTS `quotes_list` (
  `id` int(255) NOT NULL,
  `quote` varchar(255) NOT NULL,
  `theme` int(255) NOT NULL,
  `mini` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `trending` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `quotes_list`
--

INSERT INTO `quotes_list` (`id`, `quote`, `theme`, `mini`, `audio`, `duration`, `trending`) VALUES
(11, '"At last we will reveal ourselves..."', 1, 'img/t1.svg\n', 'audiodb/1/1.mp3', '0:07', 1),
(12, '"Everything is going as I hav forseen."', 1, 'img/t1.svg\n', 'audiodb/1/2.mp3', '0:04', 0),
(13, '"Everything is proceeding as I have foreseen."', 1, 'img/t1.svg\n', 'audiodb/1/3.mp3', '0:09', 1),
(14, '"Good. I can feel your anger. I am defenseless. Take your weapon. ..."', 1, 'img/t1.svg\n', 'audiodb/1/4.mp3', '0:20', 1),
(15, '"I assure you. We are quite safe from your friends here."', 1, 'img/t1.svg\n', 'audiodb/1/5.mp3', '0:06', 0),
(21, '"Aaaah! Jedi master, Yoda! You seek Yoda!"', 2, 'img/t9.svg\n', 'audiodb/2/1.mp3', '0:06', 1),
(22, '"Adventure, ha! Excitement, ha! A Jedi craves not these things."', 2, 'img/t9.svg\n', 'audiodb/2/2.mp3', '0:07', 1),
(23, '"Always two there are."', 2, 'img/t9.svg\n', 'audiodb/2/3.mp3', '0:05', 0),
(24, '"Away put your weapon, I mean you no harm."', 2, 'img/t9.svg\n', 'audiodb/2/4.mp3', '0:02', 0),
(25, '"Dangerous and disturbing..."', 2, 'img/t9.svg\n', 'audiodb/2/5.mp3', '0:03', 1),
(31, '"Anakin, my allegiance is to the Republic, to democracy!"', 3, 'img/t6.svg\n', 'audiodb/3/1.mp3', '0:10', 1),
(32, '"Goodbye, old friend. May the Force be with you."', 3, 'img/t6.svg\n', 'audiodb/3/2.mp3', '0:08', 0),
(33, '"I felt a great disturbance in the force. As if millions of voices suddenly cried out in terror and were suddenly silenced."', 3, 'img/t6.svg\n', 'audiodb/3/3.mp3', '0:08', 0),
(34, '"I have failed you, Anakin."', 3, 'img/t6.svg\n', 'audiodb/3/4.mp3', '0:08', 1),
(35, '"In my experience there is no such thing as ''luck''."', 3, 'img/t6.svg\n', 'audiodb/3/5.mp3', '0:03', 0),
(41, '"Don''t do that"', 4, 'img/t4.svg\r\n', 'audiodb/4/1.mp3', '0:01', 0),
(42, '"I am a Jedi"', 4, 'img/t4.svg\r\n', 'audiodb/4/2.mp3', '0:03', 1),
(43, '"I’m not afraid. Yoda You willl be.you will be."', 4, 'img/t4.svg\r\n', 'audiodb/4/3.mp3', '0:11', 0),
(51, '"I am becoming more powerful than any Jedi has ever dreamed of."', 5, 'img/t5.svg\r\n', 'audiodb/5/1.mp3', '0:10', 0),
(61, '"Army or not..."', 6, 'img/t3.svg\n', 'audiodb/6/1.mp3', '0:08', 0),
(62, '"General Kenobi. We''ve been waiting for you."', 6, 'img/t3.svg\n', 'audiodb/6/2.mp3', '0:10', 1),
(71, '"Chewy, give me the gun.No Wait!I thought you were blind"', 7, 'img/t7.svg\r\n', 'audiodb/7/1.mp3', '0:08', 0),
(72, '"Come on buddy. We''re not out of this yet."', 7, 'img/t7.svg\r\n', 'audiodb/7/2.mp3', '0:02', 1),
(73, '"Come on. Let''s keep a little optimism here."', 7, 'img/t7.svg\r\n', 'audiodb/7/3.mp3', '0:03', 0),
(74, '"Hey, your worship! I''m only trying to help!"', 7, 'img/t7.svg\r\n', 'audiodb/7/4.mp3', '0:04', 0),
(75, '"I decided to come and rescue you."', 7, 'img/t7.svg\r\n', 'audiodb/7/5.mp3', '0:04', 1),
(81, '"Commander, tear this ship apart until you''ve found those plans! And bring me the passengers, I want them alive!"', 8, 'img/t8.svg\r\n', 'audiodb/8/1.mp3', '0:06', 0),
(82, '"He will join us or die, master."', 8, 'img/t8.svg\r\n', 'audiodb/8/2.mp3', '0:05', 1),
(83, '"I find your lack of faith disturbing."', 8, 'img/t8.svg\r\n', 'audiodb/8/3.mp3', '0:04', 0),
(84, '"Obi-Wan has taught you well."', 8, 'img/t8.svg\r\n', 'audiodb/8/4.mp3', '0:04', 1),
(85, '"Perhaps I can find new ways to motivate them."', 8, 'img/t8.svg\r\n', 'audiodb/8/5.mp3', '0:04', 0),
(91, '"But it''s probably true."', 9, 'img/t2.svg\n', 'audiodb/9/1.mp3', '0:08', 0),
(92, '"Help me, Obi-Wan Kenobi, you''re my only hope"', 9, 'img/t2.svg\n', 'audiodb/9/2.mp3', '0:04', 0),
(93, '"Our people are dying."', 9, 'img/t2.svg\n', 'audiodb/9/3.mp3', '0:04', 0),
(94, '"Why you stuck up, half-witted, scruffy looking nerf-herder!"', 9, 'img/t2.svg\n', 'audiodb/9/4.mp3', '0:05', 0),
(95, '"Will somebody get this big walking carpet out of my way?"', 9, 'img/t2.svg\n', 'audiodb/9/5.mp3', '0:03', 0),
(101, '"Dig the force."', 10, 'img/t10.svg\r\n', 'audiodb/10/1.mp3', '0:03', 0),
(102, '"I’m betting a-heavily on Subulba!"', 10, 'img/t10.svg\r\n', 'audiodb/10/2.mp3', '0:03', 0),
(103, '"Imperial troops have entered the base! Imperial Troops have..."', 10, 'img/t10.svg\r\n', 'audiodb/10/3.mp3', '0:04', 0),
(104, '"Jabba the hut"', 10, 'img/t10.svg\r\n', 'audiodb/10/4.mp3', '0:04', 0),
(105, '"Look, sir, droids"', 10, 'img/t10.svg\r\n', 'audiodb/10/5.mp3', '0:01', 0);

-- --------------------------------------------------------

--
-- Structure de la table `themes_list`
--

CREATE TABLE IF NOT EXISTS `themes_list` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `themes_list`
--

INSERT INTO `themes_list` (`id`, `name`, `img`) VALUES
(1, 'Palapatine', 'img/t1.svg\n'),
(2, 'Yoda', 'img/t9.svg\n'),
(3, 'Obi-Wan', 'img/t6.svg\n'),
(4, 'Luke Skywalker', 'img/t4.svg\n'),
(5, 'Anakin Skywalker', 'img/t5.svg\n'),
(6, 'General Grievious', 'img/t3.svg\n'),
(7, 'Han Solo', 'img/t7.svg\r\n'),
(8, 'Dark Vador', 'img/t8.svg\r\n'),
(9, 'Leia', 'img/t2.svg\n'),
(10, 'Other', 'img/t10.svg\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `score` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `quotes_data`
--
ALTER TABLE `quotes_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `quotes_list`
--
ALTER TABLE `quotes_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `themes_list`
--
ALTER TABLE `themes_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `quotes_data`
--
ALTER TABLE `quotes_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `quotes_list`
--
ALTER TABLE `quotes_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT pour la table `themes_list`
--
ALTER TABLE `themes_list`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
