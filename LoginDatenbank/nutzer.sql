-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Dez 2019 um 12:19
-- Server-Version: 10.4.10-MariaDB
-- PHP-Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `electuretest`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzer`
--

CREATE TABLE `nutzer` (
  `Benutzername` varchar(50) NOT NULL,
  `Vorname` varchar(50) DEFAULT NULL,
  `Nachname` varchar(50) DEFAULT NULL,
  `Typ` char(1) DEFAULT NULL,
  `Studiengangskuerzel` char(3) DEFAULT NULL,
  `Passwort` varchar(255) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `nutzer`
--

INSERT INTO `nutzer` (`Benutzername`, `Vorname`, `Nachname`, `Typ`, `Studiengangskuerzel`, `Passwort`, `Email`) VALUES
('', NULL, NULL, NULL, NULL, '$2y$10$Hr0WfV0VUjoLXX0lekvJFuKDPmya1p9.Mka.0H.0.OKu09qTfRzv.', NULL),
('beispiel', NULL, NULL, NULL, NULL, '$2y$10$.isKHaiT9ZmIVB8i5cc9q.pJPW4NdIYbgmeau9G2mP4aS/6ev8BSq', 'beispiel@test.de'),
('Benutzername', NULL, NULL, NULL, NULL, '$2y$10$8BnJiP0iGGfyudXKErr1leZP/Omu.y3VD6WblEpUL7c', 'email@electure.de'),
('haha', NULL, NULL, NULL, NULL, '$2y$10$WcPbUzp4TQdpB8D3GG9A2uwT.jGBIID0zEjKckSKEeJDDELe.Bxwu', 'haha@test.de'),
('langm', 'Moritz', 'Lang', 'S', 'WWI', 'test', 'langm@electure.de'),
('lulu', NULL, NULL, NULL, NULL, '$2y$10$ashx59p8OV0iotMtPA79Ru29p4MsvhsBfVL6J5A5/imV1kctCwFJ2', 'lulu@test.de'),
('Max', NULL, NULL, NULL, NULL, '$2y$10$mQKM0NqjUZcq1V7mXEqB5.WVZ6OZqueNER/xfdLdK7s', 'Mustermann@test.de'),
('test', NULL, NULL, NULL, NULL, '$2y$10$qTCSEs./U4yGdebYfT5Y8.BdfHNpbPhylDWpwOOz/2o7tFf4PIlca', 'test2@test.de'),
('testlogin', 'testvor', 'testnach', 'S', 'INF', 'test', 'test@test.de');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD PRIMARY KEY (`Benutzername`),
  ADD KEY `Studiengangskuerzel` (`Studiengangskuerzel`);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD CONSTRAINT `nutzer_ibfk_1` FOREIGN KEY (`Studiengangskuerzel`) REFERENCES `studiengang` (`Kuerzel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
