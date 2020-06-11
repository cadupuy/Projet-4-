-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 30, 2020 at 10:53 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Projet 4`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_billet`
--

CREATE TABLE `t_billet` (
  `BIL_ID` int(11) NOT NULL,
  `BIL_DATE` date NOT NULL,
  `BIL_TITRE` varchar(100) NOT NULL,
  `BIL_CONTENU` varchar(2000) NOT NULL,
  `BIL_DESC` varchar(100) NOT NULL,
  `BIL_IMGFOND` varchar(150) NOT NULL,
  `BIL_IMGACCUEIL` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_billet`
--

INSERT INTO `t_billet` (`BIL_ID`, `BIL_DATE`, `BIL_TITRE`, `BIL_CONTENU`, `BIL_DESC`, `BIL_IMGFOND`, `BIL_IMGACCUEIL`) VALUES
(1, '2020-04-22', 'Du bon denim brut pour les truands', 'Vous connaissez l’histoire. Un samedi après-midi, vous suivez un copain dans une friperie. Ça sent comme chez votre grand-père, la moitié des fringues ont des trous et vous avez un peu envie de sortir respirer l’air frais de la rue. Mais sur le chemin de la sortie, vous la voyez.\r\n\r\nLA veste en jean avec le délavage parfait. La patine est magnifique, les coudes pas trop usés. Le cœur battant, les joues rouges, vous vous dirigez vers la cabine d’essayage pour enfiler cette veste dont vous avez tant rêvé. Une manche, puis l’autre, vous levez doucement les yeux vers le miroir en essayant de prendre votre fameux regard suave et un duckface approximatif qui va sans aucun doute vous faire ressembler à Paul Newman. Et là, vous vous découvrez. Vous ne ressemblez … à rien du tout.\r\n\r\nLes épaules tombent, les manches sont bien trop larges, le col est jaune de la sueur d’un certain Jean-Guy des années 80, et les poches intérieures sont collantes, vous ne savez pas pourquoi et vous n’avez pas envie de savoir. \r\n\r\nEncore une belle déception dans votre quête de la veste en denim parfaite. \r\n\r\nC’est là qu’on intervient.', 'LA VESTE EN DENIM', 'https://cdn.shopify.com/s/files/1/1683/2271/articles/asphalte-article-la-veste-en-denim-V2-header.jpg?v=1582224049', 'https://cdn.shopify.com/s/files/1/1683/2271/files/asphalte-blog-89.jpg?v=11156359424939232458'),
(2, '2020-04-22', 'L\'irlande à vos pieds', 'On la connaît, cette paire de chaussures habillée qui traine en bas de votre armoire et que vous ne mettez qu’aux entretiens d’embauche ou aux mariages. Elles prennent la poussière et ce n’est jamais avec beaucoup de plaisir que vous les sortez. C’est vraiment juste parce que vous n’avez que celles-là. \r\n\r\nAlors on s’y est attaqués avec comme objectif de faire une paire de souliers basse en cuir que vous auriez envie de mettre tous les jours. \r\n\r\nVoilà toute l’histoire : \r\nD’abord, pour ceux qui n’ont pas le temps, petit résumé vidéo d’une minute :\r\n\r\n\r\nPour éviter ce genre de problème, une semelle de qualité, c’est la base. La nôtre est 100% caoutchouc. Et surtout elle est ', 'LES BELLES BROGUES', 'https://cdn.shopify.com/s/files/1/1683/2271/articles/asphalte-blog-header.jpg?v=1586452385', 'https://cdn.shopify.com/s/files/1/1683/2271/files/asphalte-blog-94.jpg?v=18284540115282515485'),
(3, '2020-04-22', 'Le Manteau Long en laine\r\n', 'Ça fait un bon moment qu\'on bosse sur ce manteau.\r\n\r\nÇa, vous commencez à le lire souvent, et c\'est parce que c\'est vrai. On est en train de vous sortir enfin les produits sur lesquels on a commencé à se prendre le chou il y a plus d\'un an. C\'est comme des accouchements successifs. C\'est pas évident, mais à la fin, c\'est cool. \r\n\r\nBref. Continuons.\r\n\r\nAujourd\'hui donc, on vous présente notre petit dernier.\r\n\r\nInitialement, on avait envisagé de le sortir l\'hiver dernier mais on voulait d\'abord s\'assurer de la qualité.\r\n\r\nAlors on a pris 12 mois de gestation, qui nous ont permis de faire tous les tests qu\'on s\'oblige à faire désormais sur tous nos tissus et vêtements. On vous raconte tout ça, en mots ou images, c\'est vous qui voyez.\r\nPour éviter ce genre de problème, une semelle de qualité, c’est la base. La nôtre est 100% caoutchouc. Et surtout elle est ', 'LE MANTEAU LONG', 'https://cdn.shopify.com/s/files/1/1683/2271/articles/asphalte-le-manteau-long-laine-header_33c856a9-08fa-4dd6-b9e0-0027c7489ad2.jpg?v=1570177917', 'https://cdn.shopify.com/s/files/1/1683/2271/files/asphalte-blog-77.jpg?v=5509749671927260049'),
(4, '2020-04-22', 'Chacun sa route, chacun son chemin...', 'Mais avant ça, une petite mise en situation s’impose avec un résumé express de nos deux premières années :\r\n\r\nMars 2016 :\r\n\r\nOn se dit : \"Bon les gars, si on lançait la marque de fringues dont on rêve ? Des beaux produits, fabriqués pour durer et qui ne coûtent pas une tonne ? Chauds.\"\r\n\r\nAvril 2016 :\r\n\r\nOn trouve la manière d\'y arriver, ce sera la précommande. On produit rien tant que c’est pas vendu. Pas d\'intermédiaires, pas de stocks, pas d\'invendus, le seul moyen pour vendre pas trop cher un produit quali et cher à fabriquer.\r\n\r\nNovembre 2016 :\r\n\r\nOn lance notre premier produit sur Ulule, le Pull Parfait. 2500 précommandes en un mois, on est sur le cul et bouillants pour démarrer cette histoire qui s\'annonce folle.\r\n\r\nMars 2017 :\r\n\r\nNotre second produit débarque, la Chemise Brute. Mais cette fois, en direct sur notre site fraîchement développé pour l’occasion. Résultat, 600 précommandes le premier jour. What da...?\r\nPour éviter ce genre de problème, une semelle de qualité, c’est la base. La nôtre est 100% caoutchouc. Et surtout elle est ', 'UN MOT DE L\'ÉQUIPE', 'https://cdn.shopify.com/s/files/1/1683/2271/articles/AsphalteChacunsaroutesonchemin-header.jpg?v=1553104985', 'https://cdn.shopify.com/s/files/1/1683/2271/files/asphalte-blog-64.jpg?v=8593439634207663037'),
(5, '2020-04-22', 'Le Chino Costaud qui tient dans le temps', 'La news du jour, c\'est que la Chemise Brute n\'était pas le dernier lancement avant de partir glander quelques jours au soleil.\r\n\r\nAvant ça, on veut vous parler d\'un pétard de chino qui sera votre meilleur pote pour l\'automne et l\'hiver prochain. C’est une image hein. On dit pas que vous n’avez pas de pote et qu’un pantalon fera l’affaire.\r\n\r\nDans les réponses au questionnaire qu\'on vous a envoyé il y a plusieurs semaines, force était de constater qu\'il y avait 3 trucs qui vous rendaient dingues avec vos chinos et sur lesquels il fallait qu\'on bosse.\r\n\r\nReportage.\r\nPour éviter ce genre de problème, une semelle de qualité, c’est la base. La nôtre est 100% caoutchouc. Et surtout elle est ', 'LE CHINO COSTAUD', 'https://cdn.shopify.com/s/files/1/1683/2271/articles/headerlechinoleger.jpg?v=1535359023', 'https://cdn.shopify.com/s/files/1/1683/2271/files/asphalte-blog-45.jpg?v=18021947167643887187'),
(6, '2020-04-22', 'La Veste de Travail', 'Imaginez-vous un week-end normal, en été. Un peu comme ce week-end par exemple. Vous avez une journée bien remplie qui vous attend, vous allez déjeuner avec José, vous balader avec Claudie et finir à l’anniversaire de Michel.\r\nPour éviter ce genre de problème, une semelle de qualité, c’est la base. La nôtre est 100% caoutchouc. Et surtout elle est ', 'LA VESTE DE TRAVAIL', 'https://cdn.shopify.com/s/files/1/1683/2271/articles/La-Veste-de-Travail-14_c2d84a5e-08ce-4027-a2c6-11b5ca6efa85.jpg?v=1530011630', 'https://cdn.shopify.com/s/files/1/1683/2271/files/asphalte-blog-40.jpg?v=15586462017589338696');

-- --------------------------------------------------------

--
-- Table structure for table `t_commentaire`
--

CREATE TABLE `t_commentaire` (
  `COM_ID` int(11) NOT NULL,
  `COM_DATE` datetime NOT NULL,
  `COM_AUTEUR` varchar(100) NOT NULL,
  `COM_CONTENU` varchar(200) NOT NULL,
  `BIL_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_commentaire`
--

INSERT INTO `t_commentaire` (`COM_ID`, `COM_DATE`, `COM_AUTEUR`, `COM_CONTENU`, `BIL_ID`) VALUES
(1, '2020-04-22 15:02:33', 'A. Nonyme', 'Bravo pour ce début', 1),
(2, '2020-04-22 15:02:41', 'Moi', 'Merci ! Je vais continuer sur ma lancée', 1),
(3, '2020-04-22 16:41:35', 'zdd', 'zdz', 1),
(4, '2020-05-12 16:14:54', 'zdzd', 'zdzdzdddzdzd', 1),
(5, '2020-05-12 16:34:41', 'rrgr', 'rgrgrgr', 2),
(6, '2020-05-12 16:34:48', 'charles', 'bonjour', 2),
(7, '2020-05-12 16:42:23', 'charles', 'ahfhfhf', 2),
(8, '2020-05-12 16:44:13', 'zzdzddz', 'zdzdzd', 2),
(9, '2020-05-12 16:55:21', 'zdihdzd', 'zdzdzddpzdpziehfgpiuzehfpuzhepf', 2),
(10, '2020-05-25 21:12:58', 'Charles', 'Essai', 2),
(11, '2020-05-27 16:35:48', 'Erik Labale', 'C\'est un excellent article ! ', 2),
(12, '2020-05-28 10:56:18', 'Jean', 'Magnifique ce chino ! ', 5),
(13, '2020-05-28 10:56:43', 'Michael', 'Je la veux !', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `pass`) VALUES
(1, 'cornelia', 'Ryuk2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_billet`
--
ALTER TABLE `t_billet`
  ADD UNIQUE KEY `BIL_ID` (`BIL_ID`);

--
-- Indexes for table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD UNIQUE KEY `COM_ID` (`COM_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_billet`
--
ALTER TABLE `t_billet`
  MODIFY `BIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
