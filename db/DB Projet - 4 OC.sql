-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 22 Août 2017 à 19:41
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapter`
--

CREATE TABLE `chapter` (
  `chap_id` int(11) NOT NULL,
  `chap_title` varchar(50) NOT NULL,
  `chap_content` text NOT NULL,
  `chap_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chapter`
--

INSERT INTO `chapter` (`chap_id`, `chap_title`, `chap_content`, `chap_date`) VALUES
(1, 'Un écueil fuyant', '<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula magna a leo pulvinar, in vestibulum dui luctus. Aliquam non nulla laoreet, lacinia ipsum vitae, condimentum nisi. Proin viverra lorem vitae orci aliquam, ut viverra ex molestie. Ut mattis non quam eget posuere. Aliquam aliquam nec massa sit amet ornare. Maecenas elementum est nibh, nec lacinia sapien consequat vel. Donec laoreet nisi id justo sodales ultricies.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;">Nullam tempor venenatis ante, quis pretium lectus varius sit amet. Etiam in mi in sem tincidunt sodales eget eu eros. Mauris scelerisque felis est, at suscipit dolor porta vitae. Ut iaculis mauris non leo porta, eu euismod nisi interdum. Sed eu nibh turpis. Nam hendrerit porta convallis. Integer mauris lectus, malesuada sit amet odio non, iaculis tristique neque. Cras auctor, erat feugiat porta consequat, nibh nisi porttitor ex, et feugiat leo quam et risus. Vestibulum id pretium magna, nec pretium eros. Nullam non efficitur elit.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;">Sed elit lorem, luctus venenatis lectus quis, pharetra malesuada libero. Proin finibus pretium eleifend. Nullam vehicula est a quam pulvinar auctor. Aliquam eget eros a augue sagittis imperdiet porttitor eget mauris. Sed enim lorem, finibus a sem in, gravida porttitor nisi. Sed vulputate ante erat, eget tincidunt metus rutrum id. Suspendisse sapien nunc, tincidunt tempus arcu quis, consectetur mollis turpis. Morbi eget dolor quis neque cursus lobortis. Quisque tristique, erat a interdum ultricies, mi ante iaculis orci, quis tempus mauris arcu eget orci. Maecenas vitae tellus tortor. Mauris egestas, mauris ut porttitor mollis, tellus urna cursus urna, ut auctor ipsum elit eget diam. Nam pharetra nec tellus nec convallis. Integer eleifend accumsan lacus sit amet ullamcorper. Curabitur erat nunc, finibus non leo a, elementum semper libero. Nam in ex et libero vestibulum aliquet.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;">Sed sit amet purus sodales purus mattis sollicitudin. Aenean imperdiet blandit dolor vel porta. Quisque vehicula viverra accumsan. Donec tempor imperdiet sem. Maecenas sagittis ut velit sit amet pretium. Pellentesque condimentum neque eget aliquet tristique. In et libero bibendum, convallis nunc eu, pulvinar urna. Donec vitae urna rutrum, finibus tortor id, maximus dui. Suspendisse potenti. Vivamus eros diam, iaculis eu massa nec, porttitor consectetur quam. Etiam eu dui id tortor vulputate consequat a sit amet sapien.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;">Vivamus luctus, risus eu gravida porttitor, tellus massa accumsan tellus, non semper ligula felis id leo. Fusce non faucibus purus, volutpat consequat lacus. Aenean quis mauris at enim dignissim consequat aliquam consectetur diam. Nam ipsum erat, consectetur a lorem nec, mollis consectetur justo. Nam posuere felis in sapien dignissim vehicula. Mauris tristique ante urna, condimentum lacinia leo rhoncus in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed quis pretium velit. Etiam risus sapien, fringilla nec mattis in, lacinia a metus. Sed sem augue, gravida sit amet sollicitudin vitae, sodales ut magna. Sed feugiat, urna id vehicula pellentesque, justo quam bibendum dolor, quis imperdiet libero dolor quis sem. Maecenas aliquet dolor urna, non tristique est porttitor id. Phasellus eu lacus vitae velit faucibus pharetra. In aliquam luctus justo. Suspendisse eros mauris, condimentum luctus consequat sit amet, pellentesque eget felis. Mauris tincidunt nisi sit amet porta fermentum. Test fin de chapitre !</p>', '2017-08-22'),
(2, 'A l\'aventure !', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sed viverra sapien. Maecenas feugiat ipsum non tellus dictum, quis eleifend risus volutpat. Aliquam erat volutpat. Nunc id rhoncus nunc. Cras euismod volutpat orci eget condimentum. Nullam dapibus leo quis magna aliquet commodo. Phasellus congue non velit sit amet pellentesque. Quisque ut velit justo. In pharetra a nunc at iaculis. Duis sed magna at tortor ultrices rutrum nec at est. Mauris sodales imperdiet est a euismod. Praesent ornare lectus condimentum odio scelerisque tempus. Nulla facilisi.\r\n\r\nNullam ac gravida enim. Sed diam turpis, tempus et fringilla ut, finibus et arcu. Sed placerat dui et nunc rutrum fringilla. Morbi molestie lectus lorem, ac malesuada tortor tempor sed. Nam sed nulla vitae dolor efficitur rhoncus. Quisque aliquam nunc eget ornare gravida. Praesent at hendrerit nisl. Phasellus tincidunt sapien vel aliquam pretium. Sed eu ligula enim. Duis tempor eros nec pellentesque fermentum. Cras et risus vehicula, lacinia nibh maximus, pellentesque nunc. Mauris venenatis eget eros in vulputate. Pellentesque pulvinar dignissim massa, quis tempor lectus rutrum nec. Pellentesque felis odio, lacinia id lacinia lacinia, feugiat nec lacus. Nunc dapibus lectus vitae metus luctus, posuere semper enim accumsan. Proin aliquam ex a odio bibendum dictum nec in metus.\r\n\r\nSuspendisse justo neque, condimentum id lectus gravida, elementum rutrum massa. Sed est nibh, efficitur quis ante ac, lacinia tempor lacus. Integer porta tempus dolor, vitae sagittis massa condimentum non. In mattis felis id vulputate tempor. Sed eu commodo nibh. Cras ultrices quam tortor, sed fringilla sapien dictum vel. Donec eleifend quam vitae porttitor consectetur. Aenean eleifend lorem vel purus consequat porttitor.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem orci, gravida quis diam at, sollicitudin laoreet mauris. Phasellus a felis convallis, consectetur mauris sollicitudin, imperdiet eros. Sed vehicula semper augue, id vestibulum massa vulputate non. Vestibulum faucibus ipsum in est luctus fringilla. Curabitur lobortis suscipit mauris in pharetra. Phasellus id vulputate sem. Maecenas placerat nunc dictum, facilisis nisl eget, accumsan quam. Curabitur at quam ac justo varius condimentum. Quisque quis bibendum leo. Pellentesque consequat, justo dictum ullamcorper consectetur, massa nunc consectetur lorem, eget blandit urna enim et sapien.\r\n\r\nSed dapibus, erat id semper bibendum, orci enim dictum est, sed consequat ipsum turpis sit amet lectus. Morbi scelerisque ipsum non metus sodales, id aliquam libero bibendum. Vestibulum vestibulum dapibus lacinia. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi ornare porttitor iaculis. Fusce vitae metus venenatis, tristique neque ut, tincidunt dolor. Quisque in ipsum eget elit sollicitudin tristique lacinia ac mi. Sed sed nulla in ipsum euismod scelerisque sit amet et arcu. Duis laoreet hendrerit turpis, et porttitor nisl semper a.</p>', '2017-08-13');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `com_user` varchar(50) NOT NULL,
  `com_content` varchar(255) NOT NULL,
  `com_chap_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`com_id`, `com_user`, `com_content`, `com_chap_id`) VALUES
(28, '1', 'Commentaire test du chapitre 1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL,
  `usr_pseudo` varchar(255) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `usr_salt` varchar(255) NOT NULL,
  `usr_role` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`usr_id`, `usr_pseudo`, `usr_password`, `usr_salt`, `usr_role`) VALUES
(1, 'Ghya', '$2y$13$NMEfaUmKoYiW7TfhxU/hUucetHKpyFr1/eHxwt45UIfQAZtHtrV3O', 'dhMTBkzwDKxnD;4KNs,4ENy', 'ROLE_ADMIN'),
(2, 'admin', '$2y$13$A8MQM2ZNOi99EW.ML7srhOJsCaybSbexAj/0yXrJs4gQ/2BqMMW2K', 'EDDsl&fBCJB|a5XUtAlnQN8', 'ROLE_ADMIN'),
(3, 'keydonn', '$2y$13$1ICMTmqERee987QUyiRHhOTDvPmVUfR46lcoNk5pPet7jHa1hur/q', '81d9cd31a7b35daefc56ce8', 'ROLE_USER'),
(12, 'test', '$2y$13$fW4yexB0o1Dge18PLizBvuNe6O22lS1f2fGOJf3OVFhLfbxhHryvq', '395bf44b52f54601acb320a', 'ROLE_USER'),
(10, 'tam', '$2y$13$AM2FBCO86svBTvUsJgsS8.ZmwgQ5nL0itCAwpSi0istLeGswWPeGK', 'a71406e0a2e98b02c1d0a9b', 'ROLE_USER'),
(13, 'test1', '$2y$13$ZMA1y4VRpxvriG8OOGMDE.PYxTFG5lB8wYXtc0O.00hzdIrGX2xLW', '781c0c6f0d58e992235f2e1', 'ROLE_USER'),
(19, 'Jean', '$2y$13$z/2E4k.FbgQ.z.GAPOTOFuhfrjkELQ8Sz6FIQqUmG.pTcnyf2Q8VK', '237bf28c662502fec07b2e2', 'ROLE_USER'),
(18, 'Yst08', '$2y$13$R5XTfc7M1migNR.2kikUFesg34tW1kWxNBjsG3oRbdANFN9xTgn7m', 'cbfece026444b05ac416bb2', 'ROLE_USER');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chap_id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
