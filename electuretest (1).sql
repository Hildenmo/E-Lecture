-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Dez 2019 um 13:48
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
('beispiel', NULL, NULL, NULL, NULL, '$2y$10$.isKHaiT9ZmIVB8i5cc9q.pJPW4NdIYbgmeau9G2mP4aS/6ev8BSq', 'beispiel@test.de'),
('fabrice', NULL, NULL, NULL, NULL, '$2y$10$hbHP.q0RuU/NOfioxqT1V.5XY.MP3cYALLR1Ib9JwNRG2LBuk6H2O', 'fabrice@test.de'),
('haha', NULL, NULL, NULL, NULL, '$2y$10$WcPbUzp4TQdpB8D3GG9A2uwT.jGBIID0zEjKckSKEeJDDELe.Bxwu', 'haha@test.de'),
('huhu', NULL, NULL, NULL, NULL, '$2y$10$4VhSaWdZIp1Nut4S60LMCOYiH0G1HelJzNgO.kTlHTHHPwueeaeX6', 'huhu@test.de'),
('lulu', NULL, NULL, NULL, NULL, '$2y$10$ashx59p8OV0iotMtPA79Ru29p4MsvhsBfVL6J5A5/imV1kctCwFJ2', 'lulu@test.de');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `studiengang`
--

CREATE TABLE `studiengang` (
  `Kuerzel` char(3) NOT NULL,
  `Bezeichnung` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `studiengang`
--

INSERT INTO `studiengang` (`Kuerzel`, `Bezeichnung`) VALUES
('INF', 'Informatik'),
('WWI', 'Wirtschaftsinformatik');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vorlesungen`
--

CREATE TABLE `vorlesungen` (
  `Vorlesungskuerzel` varchar(5) NOT NULL,
  `Bezeichnung` varchar(50) DEFAULT NULL,
  `Studiengangskuerzel` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `vorlesungen`
--

INSERT INTO `vorlesungen` (`Vorlesungskuerzel`, `Bezeichnung`, `Studiengangskuerzel`) VALUES
('BWL', 'Betriebswirtschaftslehre', 'WWI'),
('DATEN', 'Datenbanken', 'WWI'),
('STATI', 'Statistik', 'INF'),
('WEBPR', 'Webprogrammierung', 'WWI');

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
-- Indizes für die Tabelle `studiengang`
--
ALTER TABLE `studiengang`
  ADD PRIMARY KEY (`Kuerzel`);

--
-- Indizes für die Tabelle `vorlesungen`
--
ALTER TABLE `vorlesungen`
  ADD PRIMARY KEY (`Vorlesungskuerzel`),
  ADD KEY `Studiengangskuerzel` (`Studiengangskuerzel`);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD CONSTRAINT `nutzer_ibfk_1` FOREIGN KEY (`Studiengangskuerzel`) REFERENCES `studiengang` (`Kuerzel`);

--
-- Constraints der Tabelle `vorlesungen`
--
ALTER TABLE `vorlesungen`
  ADD CONSTRAINT `vorlesungen_ibfk_1` FOREIGN KEY (`Studiengangskuerzel`) REFERENCES `studiengang` (`Kuerzel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
