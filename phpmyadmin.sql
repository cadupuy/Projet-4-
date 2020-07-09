-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 09, 2020 at 08:15 AM
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
  `BIL_CONTENU` varchar(3000) NOT NULL,
  `BIL_IMGACCUEIL` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_billet`
--

INSERT INTO `t_billet` (`BIL_ID`, `BIL_DATE`, `BIL_TITRE`, `BIL_CONTENU`, `BIL_IMGACCUEIL`) VALUES
(2, '2020-04-22', 'Lutter contre les conditions climatiques', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia similique dolorum aperiam nihil qui itaque, aut dolorem dignissimos possimus pariatur quasi deserunt odit unde laudantium est, recusandae non magnam consectetur animi? Culpa expedita aut, nesciunt, odio aspernatur animi est quasi sint doloremque aperiam soluta. Repellat modi quibusdam facere ipsum culpa, voluptatem commodi a possimus sint? Possimus quisquam at qui a ex obcaecati maxime animi, nobis provident nostrum mollitia ipsam, libero odit. Ut animi, beatae officia ea saepe tempora vero adipisci voluptatibus aspernatur consequuntur suscipit culpa at cupiditate fugit. Modi est cumque minus, blanditiis recusandae incidunt culpa sed dolore totam repudiandae.</p>', 'https://cdn.pixabay.com/photo/2018/02/13/11/20/the-pacific-ocean-3150525_1280.jpg'),
(3, '2020-04-22', 'Un souvenir inoubliable en compagnie de la nature', '<p>Quare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.</p>', 'https://cdn.pixabay.com/photo/2017/01/01/20/14/killer-whales-1945428_1280.jpg'),
(4, '2020-04-22', 'Un moment unique devant la voûte céleste ', '<p>Ils se regardaient tous deux, la mine d&eacute;confite et l\'air abattu de ceux qui s\'&eacute;lancent avec enthousiasme sur la route des vacances et qui tombent sur un bouchon de cinquante kilom&egrave;tres. \"Alaska\", r&eacute;p&eacute;ta Ka&euml;zar en &eacute;cho, le regard fix&eacute; sur le doigt de son comp&egrave;re, nich&eacute; sur le sommet d\'un globe terrestre. \"&Agrave; en juger ta tronche, c\'est pas bon signe.\" souffla une voix corpulente et adipeuse. Elle appartenait &agrave; Manou&euml;l, qui &agrave; cet instant aurait tout donn&eacute; pour renier la paternit&eacute; de ce doigt qui allait les envoyer pour les deux semaines &agrave; venir sur un endroit que jadis plusieurs individus sous influence psychotrope avaient nomm&eacute; la Terre du Soleil de Minuit.</p>', 'https://cdn.pixabay.com/photo/2016/02/05/14/00/aurora-borealis-1181004_1280.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `t_commentaire`
--

CREATE TABLE `t_commentaire` (
  `COM_ID` int(11) NOT NULL,
  `COM_DATE` datetime NOT NULL,
  `COM_AUTEUR` varchar(100) NOT NULL,
  `COM_CONTENU` varchar(400) NOT NULL,
  `COM_SIGNALE` tinyint(1) NOT NULL DEFAULT '0',
  `BIL_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_commentaire`
--

INSERT INTO `t_commentaire` (`COM_ID`, `COM_DATE`, `COM_AUTEUR`, `COM_CONTENU`, `COM_SIGNALE`, `BIL_ID`) VALUES
(60, '2020-06-19 14:40:42', 'Margot', 'Enjoyed this a lot and well done. We are an early stage digitally native vertical brand, making travel bags from recycled plastic and we are looking to do some brand exercises in the near future. This should help!', 0, 4),
(61, '2020-06-19 14:41:03', 'Justine', 'Enjoyed this a lot and well done. We are an early stage digitally native vertical brand, making travel bags from recycled plastic and we are looking to do some brand exercises in the near future. This should help!', 1, 4),
(62, '2020-07-02 12:03:53', 'gegeg', 'gge', 0, 3);

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
(5, 'toto', '$2y$10$M5ZIhvtdKVT46MTGSO8bieYLC.JB4.qYVqff3VJK3q9tB/woKVppu');

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
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
