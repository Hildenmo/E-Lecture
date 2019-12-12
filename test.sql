-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Dez 2019 um 09:44
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
  `id` int(2) NOT NULL,
  `kurs` text NOT NULL,
  `dozent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Kursliste';

--
-- Daten für Tabelle `kurse`
--

INSERT INTO `kurse` (`id`, `kurs`, `dozent`) VALUES
(1, 'Datenbanken', 'Kirchberg'),
(2, 'Webprogrammierung', 'Elmlinger'),
(3, 'ABAP', 'Appenmeier'),
(4, 'Investition', 'Henningsen');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `vorlesungen`
--

CREATE TABLE `vorlesungen` (
  `id` int(3) NOT NULL,
  `kurs_id` int(2) NOT NULL,
  `titel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Vorlesungen';

--
-- Daten für Tabelle `vorlesungen`
--

INSERT INTO `vorlesungen` (`id`, `kurs_id`, `titel`) VALUES
(1, 1, 'Vorlesung 1'),
(2, 1, 'Vorlesung 2'),
(3, 1, 'Vorlesung 3'),
(4, 1, 'Vorlesung 4'),
(5, 2, 'HTML');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `kurse`
--
ALTER TABLE `kurse`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `vorlesungen`
--
ALTER TABLE `vorlesungen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kurs_id` (`kurs_id`);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `vorlesungen`
--
ALTER TABLE `vorlesungen`
  ADD CONSTRAINT `vorlesungen_ibfk_1` FOREIGN KEY (`kurs_id`) REFERENCES `kurse` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
