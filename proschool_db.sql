-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 05:19 AM
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
(7, 'asdfv', '1233', '2024-04-18 03:09:00', '23456'),
(11, 'XBZKJ', '15', '2024-05-04 09:14:00', '145'),
(12, 'HDVB', '1234', '2024-04-27 10:34:00', '123456'),
(13, 'ramiii', '1505HJBDK', '2024-05-01 16:52:00', '1111');

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
(1, 'ahmd', 1233, '2024-04-22 23:36:00', '2A31', 9),
(2, 'Ahmed Lengliz', 1233, '2024-04-23 11:19:00', '2A32', 7),
(3, 'Ahmed Lengliz', 1233, '2024-05-13 16:54:00', '2A32', 7),
(5, 'RAMI', 111, '2024-05-02 09:42:00', '2A31', 13),
(6, '§§', 0, '2024-04-30 09:42:00', '2A31', 14);

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
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_user` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(71, 1),
(70, 1),
(68, 1),
(72, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `titre`, `date`, `prix`) VALUES
(7, 'ddd', '2024-04-03', 20),
(8, 'ddd', '2024-04-04', 20),
(9, 'ddd', '2024-04-04', 20),
(10, 'ddd', '2024-04-12', 20),
(11, 'ddd', '2024-04-04', 23),
(16, 'wissem123', '2024-04-13', 23);

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
(27, 6, 1, '2024-05-17 12:01:00', 'math'),
(29, 4, 1, '2024-05-16 12:01:00', 'Francais'),
(31, 6, 8, '2024-05-17 13:12:00', 'Projet web'),
(32, 4, 1, '2024-06-20 12:13:00', 'math'),
(33, 7, 1, '2024-05-21 12:13:00', 'englais'),
(34, 7, 2, '2024-06-02 13:12:00', 'englais'),
(35, 4, 1, '2024-05-13 12:13:00', 'Reseau'),
(36, 6, 1, '2024-05-08 12:13:00', 'scripting'),
(37, 6, 2, '2024-05-16 02:15:00', 'asdf'),
(38, 9, 1, '2024-05-09 06:44:00', 'scripting');

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Subject` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reclamation`
--

INSERT INTO `reclamation` (`id`, `Type`, `Subject`, `description`) VALUES
(5, 'loisir12', 6, 'asdf'),
(7, 'asdf', 6, 'asdf'),
(8, 'asdf', 6, 'asdfads');

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

--
-- Dumping data for table `resultat`
--

INSERT INTO `resultat` (`id`, `note`, `id_user`, `id_examen`) VALUES
(46, '12', 71, 27),
(47, '13', 70, 27),
(48, '14', 68, 27),
(49, '15', 72, 27),
(50, '6', 71, 29),
(51, '7', 70, 29),
(52, '4', 68, 29),
(53, '13', 72, 29);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Id`, `name`) VALUES
(4, 'math'),
(6, 'francais'),
(7, 'english'),
(8, 'projet web'),
(9, 'scripting'),
(10, 'programmation');

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
  `age` int(11) NOT NULL,
  `tel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `email`, `role`, `name`, `lastname`, `Password`, `status`, `age`, `tel`) VALUES
(1, 'mokdad@gmail.com', 1, 'Mohamed', 'Mokdad', '$2y$10$/ujlXfpNibxW3OhiIC81WOVHw7.svDgktftksuR21qvbKOqJA/OPi', 0, 0, '+21699137937'),
(68, 'mokdadmohamed10@gmail.com', 3, 'mokdad', 'mohamed', '$2y$10$FNFqsXigk6H7i41sR.aHRuBdZ0QYxvdIOqYnLi91b5mW8hZdqRg4u', 0, 20, '+21699137937'),
(69, 'mokdadmohamed10@hotmail.com', 3, 'mokdad', 'mohamed', '$2y$10$Wwn1iwO5Z0nuNCcb4IAbqu0tcKeREE9sGQPDv7d/CdSyNRquDFno6', 0, 20, '+21699137937'),
(70, 'mazhoud.nassim2003@gmail.com', 3, 'Mohamed ali', 'MOkdad', '$2y$10$ZET5lYTl2ipVPEQ9mFXb2uzqUfM//Jxxqu6Ersm2p63cEjsBAz3YC', 0, 23, '+21699137937'),
(71, 'farahhammami58@gmail.com', 3, 'Farah', 'Hammami', '$2y$10$sft8wxnPYE9Fjymu5kpyv.j1onENyYVWdi.P6parRyY6CSwO.yWsK', 0, 23, '+21699137937'),
(72, 'nijjer.gaiming@gmail.com', 3, 'Mezhoud', 'Nessim', '$2y$10$j/h.TPIMnv.aQcn9rW1wMuwnDMh2RQHCficQm7mUz1YnmzEIXlFc.', 0, 24, '+21699137937');

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
  ADD KEY `Subject` (`Subject`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `billet`
--
ALTER TABLE `billet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resultat`
--
ALTER TABLE `resultat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

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
  ADD CONSTRAINT `reclamation_ibfk_1` FOREIGN KEY (`Subject`) REFERENCES `subject` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
