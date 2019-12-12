-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Dez 2019 um 14:30
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
-- Datenbank: `test`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kurse`
--

CREATE TABLE `kurse` (
  `id` int(3) NOT NULL,
  `beschreibung` varchar(255) NOT NULL,
  `dozent` varchar(255) NOT NULL,
  `kuerzel_sg` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Kursliste';

--
-- Daten für Tabelle `kurse`
--

INSERT INTO `kurse` (`id`, `beschreibung`, `dozent`, `kuerzel_sg`) VALUES
(1, 'Datenbanken', 'Kirchberg', 'WWI'),
(2, 'ERP-Entwicklung', 'Appenmeier', 'WWI'),
(3, 'Webprogrammierung', 'Elmlinger', 'WWI'),
(4, 'Volkswirtschaftslehre', 'Zipfel', 'WWI'),
(5, 'Investition', 'Henningsen', 'WWI');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nutzer`
--

CREATE TABLE `nutzer` (
  `id` int(3) NOT NULL,
  `benutzername` varchar(255) NOT NULL,
  `passwort` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `vorname` varchar(255) DEFAULT NULL,
  `nachname` varchar(255) DEFAULT NULL,
  `kuerzel_sg` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Nutzertabelle';

--
-- Daten für Tabelle `nutzer`
--

INSERT INTO `nutzer` (`id`, `benutzername`, `passwort`, `email`, `vorname`, `nachname`, `kuerzel_sg`) VALUES
(8, 'MaxMustermann', '$2y$10$Xqh6H3gb0T60RWwxSbqqru9C6UOpg4DWC5gjWAht9k.Pfcz1j3wre', 'max@test.de', 'Max', 'Mustermann', 'WWI'),
(9, 'Moritz', '$2y$10$1bHu2hYlfvf2b9D9H8lROO8jjMtToELgCe087Bon/Y1k0MXHa3u3i', 'moritz@test.de', 'Moritz', 'Lang', 'WWI'),
(10, 'Lukas', '$2y$10$uIs.BJxj5MSa3hCcpfQUx.rYmmsaeJ6Z.wiERV9cgEK9mIsLvElt6', 'lukas@test.de', 'Lukas', 'Beuscher', 'WWI'),
(11, 'Marco', '$2y$10$DJxqtQfN.OEy/OIoHlctb.XqnTBU.cAZ/cKzZAtvBUXM4V9u3MFI.', 'marco@test.de', 'Marco', 'Hildenbrand', 'WWI');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `studiengang`
--

CREATE TABLE `studiengang` (
  `kuerzel` varchar(3) NOT NULL,
  `beschreibung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Studiengänge';

--
-- Daten für Tabelle `studiengang`
--

INSERT INTO `studiengang` (`kuerzel`, `beschreibung`) VALUES
('WWI', 'Wirtschaftsinformatik');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vorlesungen`
--

CREATE TABLE `vorlesungen` (
  `id` int(3) NOT NULL,
  `kurs_id` int(3) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Vorlesungen';

--
-- Daten für Tabelle `vorlesungen`
--

INSERT INTO `vorlesungen` (`id`, `kurs_id`, `titel`, `video`) VALUES
(1, 1, 'Entity Relationship Model', 'https://www.youtube.com/embed/F5rTvnbjPq8'),
(2, 1, 'Mehrdimensionale Suchstrukturen', 'https://www.youtube.com/embed/07JC4ItHIlo'),
(3, 1, 'Logische Datenstrukturen', 'https://www.youtube.com/embed/NU0VfqBhA5w'),
(4, 2, 'Grundlagen ABAP-Programmierung', 'https://www.youtube.com/embed/N5qkuh7UbKI'),
(5, 2, 'Datenbanken und Dictionary', 'https://www.youtube.com/embed/K4OAZxW05zE'),
(6, 3, 'Grundlagen Webprogrammierung', 'https://www.youtube.com/embed/j9CNWBAjO2A'),
(7, 3, 'HTTP-Requests und Webserver', 'https://www.youtube.com/embed/QYmvV4msjEY'),
(8, 3, 'Datenbanken mit JPA', 'https://www.youtube.com/embed/Tvz2dt6ZnQs'),
(9, 3, 'Java Server Pages (JSP)', 'https://www.youtube.com/embed/BVW8ehthGJU'),
(10, 4, 'Einführung in die BWL', 'https://www.youtube.com/embed/x7RaFZqNjI0'),
(11, 5, 'Investitionsarten', 'https://www.youtube.com/embed/Me9Wkuef4Ag'),
(12, 5, 'Kapitalwertmethode', 'https://www.youtube.com/embed/eP1qOB-aTjM');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `kurse`
--
ALTER TABLE `kurse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuerzel_sg` (`kuerzel_sg`);

--
-- Indizes für die Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuerzel_sg` (`kuerzel_sg`);

--
-- Indizes für die Tabelle `studiengang`
--
ALTER TABLE `studiengang`
  ADD PRIMARY KEY (`kuerzel`);

--
-- Indizes für die Tabelle `vorlesungen`
--
ALTER TABLE `vorlesungen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `kurse`
--
ALTER TABLE `kurse`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `vorlesungen`
--
ALTER TABLE `vorlesungen`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `kurse`
--
ALTER TABLE `kurse`
  ADD CONSTRAINT `kurse_ibfk_1` FOREIGN KEY (`kuerzel_sg`) REFERENCES `studiengang` (`kuerzel`);

--
-- Constraints der Tabelle `nutzer`
--
ALTER TABLE `nutzer`
  ADD CONSTRAINT `nutzer_ibfk_1` FOREIGN KEY (`kuerzel_sg`) REFERENCES `studiengang` (`kuerzel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
