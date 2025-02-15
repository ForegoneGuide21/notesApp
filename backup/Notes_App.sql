-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2025 at 06:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Notes_App`
--

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `idnotes` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `notescontent` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`idnotes`, `title`, `created`, `notescontent`) VALUES
(1, 'First Note', '2024-12-07 17:56:22', 'Today is dec 7, 10:56 AM in Colorado'),
(2, 'Boutta Break It', '2024-12-07 18:00:14', 'CREATE TABLE note (\r\n    idnotes      INTEGER NOT NULL,\r\n    title        VARCHAR(250) NOT NULL,\r\n    created      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,\r\n    notescontent VARCHAR(10000) \r\n);\r\n\r\nALTER TABLE note ADD CONSTRAINT note_pk PRIMARY KEY( idnotes );\r\n\r\nCREATE TABLE noteMng (\r\n    user_iduser  INTEGER NOT NULL,\r\n    note_idnotes INTEGER NOT NULL\r\n);\r\n\r\nCREATE TABLE userT (\r\n    iduser   INTEGER NOT NULL,\r\n    username VARCHAR(20) NOT NULL,\r\n    password VARCHAR(20) NOT NULL\r\n);\r\n\r\nALTER TABLE userT ADD CONSTRAINT user_pk PRIMARY KEY( iduser );\r\n\r\nALTER TABLE userT MODIFY iduser INTEGER AUTO_INCREMENT;\r\nALTER TABLE note MODIFY idnotes INTEGER AUTO_INCREMENT;\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_note_fk FOREIGN KEY ( note_idnotes )\r\n        REFERENCES note ( idnotes );\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_user_fk FOREIGN KEY ( user_iduser )\r\n        REFERENCES userT ( iduser );CREATE TABLE note (\r\n    idnotes      INTEGER NOT NULL,\r\n    title        VARCHAR(250) NOT NULL,\r\n    created      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,\r\n    notescontent VARCHAR(10000) \r\n);\r\n\r\nALTER TABLE note ADD CONSTRAINT note_pk PRIMARY KEY( idnotes );\r\n\r\nCREATE TABLE noteMng (\r\n    user_iduser  INTEGER NOT NULL,\r\n    note_idnotes INTEGER NOT NULL\r\n);\r\n\r\nCREATE TABLE userT (\r\n    iduser   INTEGER NOT NULL,\r\n    username VARCHAR(20) NOT NULL,\r\n    password VARCHAR(20) NOT NULL\r\n);\r\n\r\nALTER TABLE userT ADD CONSTRAINT user_pk PRIMARY KEY( iduser );\r\n\r\nALTER TABLE userT MODIFY iduser INTEGER AUTO_INCREMENT;\r\nALTER TABLE note MODIFY idnotes INTEGER AUTO_INCREMENT;\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_note_fk FOREIGN KEY ( note_idnotes )\r\n        REFERENCES note ( idnotes );\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_user_fk FOREIGN KEY ( user_iduser )\r\n        REFERENCES userT ( iduser );CREATE TABLE note (\r\n    idnotes      INTEGER NOT NULL,\r\n    title        VARCHAR(250) NOT NULL,\r\n    created      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,\r\n    notescontent VARCHAR(10000) \r\n);\r\n\r\nALTER TABLE note ADD CONSTRAINT note_pk PRIMARY KEY( idnotes );\r\n\r\nCREATE TABLE noteMng (\r\n    user_iduser  INTEGER NOT NULL,\r\n    note_idnotes INTEGER NOT NULL\r\n);\r\n\r\nCREATE TABLE userT (\r\n    iduser   INTEGER NOT NULL,\r\n    username VARCHAR(20) NOT NULL,\r\n    password VARCHAR(20) NOT NULL\r\n);\r\n\r\nALTER TABLE userT ADD CONSTRAINT user_pk PRIMARY KEY( iduser );\r\n\r\nALTER TABLE userT MODIFY iduser INTEGER AUTO_INCREMENT;\r\nALTER TABLE note MODIFY idnotes INTEGER AUTO_INCREMENT;\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_note_fk FOREIGN KEY ( note_idnotes )\r\n        REFERENCES note ( idnotes );\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_user_fk FOREIGN KEY ( user_iduser )\r\n        REFERENCES userT ( iduser );CREATE TABLE note (\r\n    idnotes      INTEGER NOT NULL,\r\n    title        VARCHAR(250) NOT NULL,\r\n    created      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,\r\n    notescontent VARCHAR(10000) \r\n);\r\n\r\nALTER TABLE note ADD CONSTRAINT note_pk PRIMARY KEY( idnotes );\r\n\r\nCREATE TABLE noteMng (\r\n    user_iduser  INTEGER NOT NULL,\r\n    note_idnotes INTEGER NOT NULL\r\n);\r\n\r\nCREATE TABLE userT (\r\n    iduser   INTEGER NOT NULL,\r\n    username VARCHAR(20) NOT NULL,\r\n    password VARCHAR(20) NOT NULL\r\n);\r\n\r\nALTER TABLE userT ADD CONSTRAINT user_pk PRIMARY KEY( iduser );\r\n\r\nALTER TABLE userT MODIFY iduser INTEGER AUTO_INCREMENT;\r\nALTER TABLE note MODIFY idnotes INTEGER AUTO_INCREMENT;\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_note_fk FOREIGN KEY ( note_idnotes )\r\n        REFERENCES note ( idnotes );\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_user_fk FOREIGN KEY ( user_iduser )\r\n        REFERENCES userT ( iduser );CREATE TABLE note (\r\n    idnotes      INTEGER NOT NULL,\r\n    title        VARCHAR(250) NOT NULL,\r\n    created      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,\r\n    notescontent VARCHAR(10000) \r\n);\r\n\r\nALTER TABLE note ADD CONSTRAINT note_pk PRIMARY KEY( idnotes );\r\n\r\nCREATE TABLE noteMng (\r\n    user_iduser  INTEGER NOT NULL,\r\n    note_idnotes INTEGER NOT NULL\r\n);\r\n\r\nCREATE TABLE userT (\r\n    iduser   INTEGER NOT NULL,\r\n    username VARCHAR(20) NOT NULL,\r\n    password VARCHAR(20) NOT NULL\r\n);\r\n\r\nALTER TABLE userT ADD CONSTRAINT user_pk PRIMARY KEY( iduser );\r\n\r\nALTER TABLE userT MODIFY iduser INTEGER AUTO_INCREMENT;\r\nALTER TABLE note MODIFY idnotes INTEGER AUTO_INCREMENT;\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_note_fk FOREIGN KEY ( note_idnotes )\r\n        REFERENCES note ( idnotes );\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_user_fk FOREIGN KEY ( user_iduser )\r\n        REFERENCES userT ( iduser );CREATE TABLE note (\r\n    idnotes      INTEGER NOT NULL,\r\n    title        VARCHAR(250) NOT NULL,\r\n    created      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,\r\n    notescontent VARCHAR(10000) \r\n);\r\n\r\nALTER TABLE note ADD CONSTRAINT note_pk PRIMARY KEY( idnotes );\r\n\r\nCREATE TABLE noteMng (\r\n    user_iduser  INTEGER NOT NULL,\r\n    note_idnotes INTEGER NOT NULL\r\n);\r\n\r\nCREATE TABLE userT (\r\n    iduser   INTEGER NOT NULL,\r\n    username VARCHAR(20) NOT NULL,\r\n    password VARCHAR(20) NOT NULL\r\n);\r\n\r\nALTER TABLE userT ADD CONSTRAINT user_pk PRIMARY KEY( iduser );\r\n\r\nALTER TABLE userT MODIFY iduser INTEGER AUTO_INCREMENT;\r\nALTER TABLE note MODIFY idnotes INTEGER AUTO_INCREMENT;\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_note_fk FOREIGN KEY ( note_idnotes )\r\n        REFERENCES note ( idnotes );\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_user_fk FOREIGN KEY ( user_iduser )\r\n        REFERENCES userT ( iduser );CREATE TABLE note (\r\n    idnotes      INTEGER NOT NULL,\r\n    title        VARCHAR(250) NOT NULL,\r\n    created      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,\r\n    notescontent VARCHAR(10000) \r\n);\r\n\r\nALTER TABLE note ADD CONSTRAINT note_pk PRIMARY KEY( idnotes );\r\n\r\nCREATE TABLE noteMng (\r\n    user_iduser  INTEGER NOT NULL,\r\n    note_idnotes INTEGER NOT NULL\r\n);\r\n\r\nCREATE TABLE userT (\r\n    iduser   INTEGER NOT NULL,\r\n    username VARCHAR(20) NOT NULL,\r\n    password VARCHAR(20) NOT NULL\r\n);\r\n\r\nALTER TABLE userT ADD CONSTRAINT user_pk PRIMARY KEY( iduser );\r\n\r\nALTER TABLE userT MODIFY iduser INTEGER AUTO_INCREMENT;\r\nALTER TABLE note MODIFY idnotes INTEGER AUTO_INCREMENT;\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_note_fk FOREIGN KEY ( note_idnotes )\r\n        REFERENCES note ( idnotes );\r\n\r\nALTER TABLE noteMng\r\n    ADD CONSTRAINT notemng_user_fk FOREIGN KEY ( user_iduser )\r\n        REFERENCES userT ( iduser );');

-- --------------------------------------------------------

--
-- Table structure for table `noteMng`
--

CREATE TABLE `noteMng` (
  `user_iduser` int(11) NOT NULL,
  `note_idnotes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `noteMng`
--

INSERT INTO `noteMng` (`user_iduser`, `note_idnotes`) VALUES
(1, 1),
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userT`
--

CREATE TABLE `userT` (
  `iduser` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userT`
--

INSERT INTO `userT` (`iduser`, `username`, `password`) VALUES
(1, 'Chill_Guy', 'ChillingLikeACoolGuy'),
(2, 'NotSoChillGuy', 'Password'),
(3, 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`idnotes`);

--
-- Indexes for table `noteMng`
--
ALTER TABLE `noteMng`
  ADD KEY `notemng_note_fk` (`note_idnotes`),
  ADD KEY `notemng_user_fk` (`user_iduser`);

--
-- Indexes for table `userT`
--
ALTER TABLE `userT`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `idnotes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userT`
--
ALTER TABLE `userT`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `noteMng`
--
ALTER TABLE `noteMng`
  ADD CONSTRAINT `notemng_note_fk` FOREIGN KEY (`note_idnotes`) REFERENCES `note` (`idnotes`),
  ADD CONSTRAINT `notemng_user_fk` FOREIGN KEY (`user_iduser`) REFERENCES `userT` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
