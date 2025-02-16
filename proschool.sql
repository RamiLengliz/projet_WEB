-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 08:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proschool_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_student` varchar(20) NOT NULL,
  `date_hour` datetime NOT NULL,
  `id_teacher` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`id`, `name`, `id_student`, `date_hour`, `id_teacher`) VALUES
(32, 'sick', '71', '2024-05-16 07:00:00', '82'),
(33, 'Mohamed ali', '72', '2024-05-16 12:07:00', '82'),
(34, 'Mohamed ali', '70', '2024-05-16 10:08:00', '81'),
(35, 'mokdad', '86', '2024-05-21 10:47:00', '82'),
(36, 'mokdad', '86', '2024-05-16 10:48:00', '82');

-- --------------------------------------------------------

--
-- Table structure for table `billet`
--

CREATE TABLE `billet` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_student` int(50) NOT NULL,
  `date_hour` datetime NOT NULL,
  `class` varchar(20) NOT NULL,
  `id_abs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billet`
--

INSERT INTO `billet` (`id`, `name`, `id_student`, `date_hour`, `class`, `id_abs`) VALUES
(16, 'Sick', 71, '2024-05-19 06:23:00', '2A31', 32);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_reclamation` int(11) NOT NULL,
  `id_user_dest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `message`, `date`, `id_user`, `id_reclamation`, `id_user_dest`) VALUES
(113, 'Bonjour', '2024-05-21 19:07:57', 94, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Id`, `name`) VALUES
(1, '2A31'),
(2, '2A32'),
(8, '2A33'),
(9, '2A34');

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `idCours` int(11) NOT NULL,
  `nomCours` varchar(50) NOT NULL,
  `ressourceCours` varchar(255) DEFAULT NULL,
  `idSubject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`idCours`, `nomCours`, `ressourceCours`, `idSubject`) VALUES
(1, 'Probabilite', 'uploads/attestation-mohamed-MOKDAD.pdf', 4),
(4, 'Algebre', 'uploads/attestation-mohamed-MOKDAD.pdf', 4),
(5, 'Statistique', 'uploads/attestation-mohamed-MOKDAD.pdf', 4),
(12, 'Geo espace', 'uploads/attestation-mohamed-MOKDAD.pdf', 4),
(34, 'complexe', 'uploads/attestation-mohamed-MOKDAD.pdf', 4),
(47, 'Etude fonction', 'uploads/attestation-mohamed-MOKDAD.pdf', 4),
(48, 'Langue', 'uploads/attestation-mohamed-MOKDAD.pdf', 6),
(49, 'Grammaire', 'uploads/attestation-mohamed-MOKDAD.pdf', 6),
(50, 'Trigo', 'uploads/attestation-mohamed-MOKDAD.pdf', 4),
(51, 'science de l\'ingenieur', 'uploads/attestation-mohamed-MOKDAD.pdf', 16),
(52, 'Fonction', 'uploads/poster proschool.png', 9),
(53, 'chapitre 2', 'uploads/poster proschool.png', 17);

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_user` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id_user`, `id_subject`) VALUES
(81, 4),
(82, 4),
(87, 8);

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

CREATE TABLE `etudiants` (
  `Id_user` int(11) NOT NULL,
  `Id_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`Id_user`, `Id_class`) VALUES
(72, 1),
(86, 1),
(93, 1),
(94, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `prix` int(11) NOT NULL,
  `dispo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `titre`, `date`, `prix`, `dispo`) VALUES
(7, 'Samara', '2024-04-20', 50, 'non'),
(8, 'ALA', '2024-04-12', 15, 'oui'),
(9, 'Balti', '2024-04-24', 444, 'oui'),
(14, 'Armasta', '2024-05-03', 12, 'oui'),
(19, 'naqqa', '2024-05-17', 20, 'oui'),
(20, 'Jenjoon', '2024-05-22', 20, 'oui'),
(21, 'Martin Garrix', '2024-05-18', 20, 'oui');

-- --------------------------------------------------------

--
-- Table structure for table `examen`
--

CREATE TABLE `examen` (
  `id` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examen`
--

INSERT INTO `examen` (`id`, `id_subject`, `id_class`, `date`, `titre`) VALUES
(48, 4, 1, '2024-05-15 04:20:00', 'Math'),
(51, 6, 1, '2024-05-10 08:17:00', 'Francais'),
(53, 8, 2, '2024-06-20 12:31:00', 'Projet web');

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Subject` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reclamation`
--

INSERT INTO `reclamation` (`id`, `Type`, `Subject`, `description`, `id_user`) VALUES
(25, 'test', 6, 'qfsd', 1),
(26, 'loisir', 7, 'bonjour.', 86),
(27, 'loisir', 7, 'cq pqs bien', 94);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  `nb_place` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `id_etudiant`, `id_evenement`, `nb_place`) VALUES
(10, 70, 8, 4),
(11, 71, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `resultat`
--

CREATE TABLE `resultat` (
  `id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_examen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject_description` varchar(255) DEFAULT NULL,
  `depot_fichier_subject` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Id`, `name`, `subject_description`, `depot_fichier_subject`) VALUES
(4, 'math', 'fdsafasfdasfasdfsa', 'uploads/Mohamed Mokdad CV.pdf'),
(6, 'francais', 'asdfasdfas', 'uploads/attestation-mohamed-MOKDAD.pdf'),
(7, 'english', '', ''),
(8, 'projet web', '', ''),
(9, 'scripting', '', ''),
(14, 'spring boot', 'iiii', 'yassine.png'),
(15, 'Aasdfasdf', 'Aasfdasdfasdfasdf', 'uploads/Mohamed Mokdad CV.pdf'),
(16, 'Business', 'c\'est une subject tres magnifique', 'uploads/Mohamed Mokdad CV.pdf'),
(17, 'Prog', 'Programmation c la vie', 'uploads/11.wav');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `email`, `role`, `name`, `lastname`, `Password`, `status`, `age`, `tel`) VALUES
(1, 'mokdad@gmail.com', 1, 'Mohamed', 'Mokdad', '$2y$10$svCdFWat5qdP.Jhcky4MoOfWBKPJTPM4K6VcwDaZnCZ419WApmNA.', 0, 0, '+21699137937'),
(72, 'nijjer.gaiming@gmail.com', 3, 'Mezhoud', 'Nessim', '$2y$10$j/h.TPIMnv.aQcn9rW1wMuwnDMh2RQHCficQm7mUz1YnmzEIXlFc.', 0, 24, '+21653768551'),
(81, 'mokdadmohamed10@yahoo.com', 2, 'mokdad', 'mohamed', '$2y$10$dgj1qdihtOlrNuiJNVjbj.pohroQPo7/wRHgNIKee.L4qROwK91mC', 0, NULL, '+21699137937'),
(82, 'mokdadmohamed10@hotmail.com', 2, 'Mohamed ali', 'MOkdad', '$2y$10$2/mrVW1qCIBGNxTWyBbqkuZrCKmYpMHyIFDkHzdyVknb97a1AmoZW', 0, NULL, '+21699137937'),
(86, 'mokdadmohamed10@gmail.com', 3, 'Mokdad', 'Mohamed', '$2y$10$R1ZeMo6Bo/JfO/2B/g0ZJuuiVMpG2SiseIFGVs2/FvV/EJcy6KmbS', 0, NULL, '+21699137937'),
(87, 'badiaa.bouhdid@esprit.tn', 2, 'badiaa', 'Bouhdid', '$2y$10$8lHqHyT3ncyTZQRKvkbe1uvXT9eXuh3Vdb2D8CqD74ZZunSSPfWQ6', 0, NULL, '21692236925'),
(93, 'farahhammami58@gmail.com', 3, 'Farah', 'Hammami', '$2y$10$lUvEYbF4x27MGpyQfNW0iueYRmFKe3uT9GW6sQYPERIHqSamjVEl.', 0, NULL, '++21650695595'),
(94, 'mazhoud.nassim2003@gmail.com', 3, 'Nessim', 'Mezhoud', '$2y$10$qSl/aLkTbJZInsVCcTqPleDGiMosBDFDoGc3Smw03m3b6rL7uqEBO', 0, NULL, '++21653768551');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_reclamation` (`id_reclamation`),
  ADD KEY `id_user_dest` (`id_user_dest`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idCours`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Indexes for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD KEY `Id_user` (`Id_user`),
  ADD KEY `Id_class` (`Id_class`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class` (`id_class`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Indexes for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Subject` (`Subject`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resultat`
--
ALTER TABLE `resultat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_examen` (`id_examen`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `billet`
--
ALTER TABLE `billet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `idCours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `resultat`
--
ALTER TABLE `resultat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`id_reclamation`) REFERENCES `reclamation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_3` FOREIGN KEY (`id_user_dest`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `enseignant_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enseignant_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_ibfk_1` FOREIGN KEY (`Id_class`) REFERENCES `class` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etudiants_ibfk_2` FOREIGN KEY (`Id_user`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `class` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `examen_ibfk_2` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `reclamation_ibfk_1` FOREIGN KEY (`Subject`) REFERENCES `subject` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reclamation_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resultat`
--
ALTER TABLE `resultat`
  ADD CONSTRAINT `resultat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resultat_ibfk_2` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
