-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 06. Mrz 2019 um 23:16
-- Server-Version: 5.5.57-MariaDB
-- PHP-Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ETB`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Einsatz`
--

CREATE TABLE `Einsatz` (
  `id` int(11) NOT NULL,
  `Name` mediumtext,
  `Aktiv` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Einsatz`
--

INSERT INTO `Einsatz` (`id`, `Name`, `Aktiv`) VALUES
(1, '06.03.2019 - GroÃŸeinsatz', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Fahrzeuge`
--

CREATE TABLE `Fahrzeuge` (
  `id` int(11) NOT NULL,
  `EinsatzID` int(11) DEFAULT NULL,
  `Funkrufname` text NOT NULL,
  `Fahrzeug` text NOT NULL,
  `Staerke_1` int(11) DEFAULT NULL,
  `Staerke_2` int(11) DEFAULT NULL,
  `Staerke_3` int(11) DEFAULT NULL,
  `PA` int(11) DEFAULT NULL,
  `Alarmiert` datetime DEFAULT NULL,
  `Ausgerueckt` datetime DEFAULT NULL,
  `Bereitstellung` datetime DEFAULT NULL,
  `EAn` datetime DEFAULT NULL,
  `EAb` datetime DEFAULT NULL,
  `Aktualisierung` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktiv` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Fahrzeuge`
--

INSERT INTO `Fahrzeuge` (`id`, `EinsatzID`, `Funkrufname`, `Fahrzeug`, `Staerke_1`, `Staerke_2`, `Staerke_3`, `PA`, `Alarmiert`, `Ausgerueckt`, `Bereitstellung`, `EAn`, `EAb`, `Aktualisierung`, `aktiv`) VALUES
(1, 1, 'Florian LanggÃ¶ns 1/11', 'ELW 1', 1, 0, 2, 0, '2019-03-06 23:12:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2019-03-06 22:12:49', 1),
(2, 1, 'Florian LanggÃ¶ns 5/43', 'LF 10G', 0, 0, 0, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2019-03-06 22:12:32', 1),
(3, 1, 'Florian LanggÃ¶ns 3/48', 'TSF-W', 0, 1, 5, 4, '2019-03-06 23:13:00', '2019-03-06 23:15:00', '1970-01-01 00:00:00', '2019-03-06 23:17:00', '1970-01-01 00:00:00', '2019-03-06 22:13:47', 1),
(4, 1, 'Florian LanggÃ¶ns 2/43', 'HLF 10', 0, 0, 0, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2019-03-06 22:12:32', 1),
(5, 1, 'Florian LanggÃ¶ns 4/47', 'TSF', 0, 0, 0, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2019-03-06 22:12:32', 1),
(6, 1, 'Florian LanggÃ¶ns 6/43', 'LF 10 KatS', 0, 0, 0, 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '2019-03-06 22:12:32', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Fahrzeugvorlage`
--

CREATE TABLE `Fahrzeugvorlage` (
  `id` int(11) NOT NULL,
  `Funkrufname` mediumtext,
  `Fahrzeug` mediumtext,
  `Funktion` mediumtext,
  `Ort` int(11) DEFAULT NULL,
  `Erstauswahl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Fahrzeugvorlage`
--

INSERT INTO `Fahrzeugvorlage` (`id`, `Funkrufname`, `Fahrzeug`, `Funktion`, `Ort`, `Erstauswahl`) VALUES
(1, 'Florian LanggÃ¶ns 1/11', 'ELW 1', 'FW', 1, 1),
(2, 'Florian LanggÃ¶ns 5/43', 'LF 10G', 'FW', 3, 1),
(3, 'Florian LanggÃ¶ns 3/48', 'TSF-W', 'FW', 4, 1),
(4, 'Florian LanggÃ¶ns 2/43', 'HLF 10', 'FW', 5, 1),
(5, 'Florian LanggÃ¶ns 4/47', 'TSF', 'FW', 6, 1),
(6, 'Florian LanggÃ¶ns 6/43', 'LF 10 KatS', 'FW', 2, 1),
(7, 'Gisela 10/01', 'FustW', 'Pol', 7, 0),
(8, 'Akkon GieÃŸen 12/83/1', 'RTW', 'Kats', 8, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Lagemeldungen`
--

CREATE TABLE `Lagemeldungen` (
  `messageId` int(11) NOT NULL,
  `Einsatz` int(11) DEFAULT NULL,
  `username` mediumtext,
  `text` mediumtext,
  `insertDate` timestamp NULL DEFAULT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Lagemeldungen`
--

INSERT INTO `Lagemeldungen` (`messageId`, `Einsatz`, `username`, `text`, `insertDate`, `Status`) VALUES
(1, 1, 'Einsatzleiter', 'Der Einsatz wurde um 23:12 Uhr von Einsatzleiter angelegt.', '2019-03-06 22:12:32', 1),
(2, 1, 'Einsatzleiter', 'Das Fahrzeug: ELW 1 - Florian LanggÃ¶ns 1/11 ist mit 1/0/2 (0 PA) um 23:12 alarmiert worden, um 00:00 ausgerÃ¼ckt, um 00:00 in Bereitstellung und um 00:00 an der Einsatzstelle eingetroffen und hat um 00:00 die Einsatzstelle verlassen.', '2019-03-06 22:12:49', 1),
(3, 1, 'Einsatzleiter', 'Das Fahrzeug: TSF-W - Florian LanggÃ¶ns 3/48 ist mit 0/1/5 (4 PA) um 23:13 alarmiert worden, um 23:15 ausgerÃ¼ckt, um 23:13 in Bereitstellung und um 23:17 an der Einsatzstelle eingetroffen und hat um 00:00 die Einsatzstelle verlassen.', '2019-03-06 22:13:28', 1),
(4, 1, 'Einsatzleiter', 'Das Fahrzeug: TSF-W - Florian LanggÃ¶ns 3/48 ist mit 0/1/5 (4 PA) um 23:13 alarmiert worden, um 23:15 ausgerÃ¼ckt, um 00:00 in Bereitstellung und um 23:17 an der Einsatzstelle eingetroffen und hat um 00:00 die Einsatzstelle verlassen.', '2019-03-06 22:13:47', 1),
(5, 1, 'Einsatzleiter', 'Florian LanggÃ¶ns 3/48 - bestÃ¤tigtes Feuer, GroÃŸalarm auslÃ¶sen', '2019-03-06 22:14:33', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Orte`
--

CREATE TABLE `Orte` (
  `id` int(11) NOT NULL,
  `Landkreis` mediumtext,
  `Gemeinde` mediumtext,
  `Ortsteil` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `Orte`
--

INSERT INTO `Orte` (`id`, `Landkreis`, `Gemeinde`, `Ortsteil`) VALUES
(1, 'GieÃŸen', 'LanggÃ¶ns', 'Lang-GÃ¶ns'),
(2, 'GieÃŸen', 'LanggÃ¶ns', 'Oberkleen'),
(3, 'GieÃŸen', 'LanggÃ¶ns', 'Niederkleen'),
(4, 'GieÃŸen', 'LanggÃ¶ns', 'Dornholzhausen'),
(5, 'GieÃŸen', 'LanggÃ¶ns', 'Cleeberg'),
(6, 'GieÃŸen', 'LanggÃ¶ns', 'Espa'),
(7, 'GieÃŸen', 'GieÃŸen', 'GieÃŸen'),
(8, 'GieÃŸen', 'GieÃŸen', 'Linden');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Einsatz`
--
ALTER TABLE `Einsatz`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `Fahrzeuge`
--
ALTER TABLE `Fahrzeuge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EinsatzID` (`EinsatzID`);

--
-- Indizes für die Tabelle `Fahrzeugvorlage`
--
ALTER TABLE `Fahrzeugvorlage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Ort` (`Ort`);

--
-- Indizes für die Tabelle `Lagemeldungen`
--
ALTER TABLE `Lagemeldungen`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `Einsatz` (`Einsatz`);

--
-- Indizes für die Tabelle `Orte`
--
ALTER TABLE `Orte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Einsatz`
--
ALTER TABLE `Einsatz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `Fahrzeuge`
--
ALTER TABLE `Fahrzeuge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `Fahrzeugvorlage`
--
ALTER TABLE `Fahrzeugvorlage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `Lagemeldungen`
--
ALTER TABLE `Lagemeldungen`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `Orte`
--
ALTER TABLE `Orte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `Fahrzeuge`
--
ALTER TABLE `Fahrzeuge`
  ADD CONSTRAINT `Fahrzeuge_ibfk_1` FOREIGN KEY (`EinsatzID`) REFERENCES `Einsatz` (`id`);

--
-- Constraints der Tabelle `Fahrzeugvorlage`
--
ALTER TABLE `Fahrzeugvorlage`
  ADD CONSTRAINT `Fahrzeugvorlage_ibfk_1` FOREIGN KEY (`Ort`) REFERENCES `Orte` (`id`);

--
-- Constraints der Tabelle `Lagemeldungen`
--
ALTER TABLE `Lagemeldungen`
  ADD CONSTRAINT `Lagemeldungen_ibfk_1` FOREIGN KEY (`Einsatz`) REFERENCES `Einsatz` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
