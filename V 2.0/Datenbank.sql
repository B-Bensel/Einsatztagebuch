-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 30. Mai 2017 um 23:17
-- Server-Version: 5.5.55-0+deb7u1
-- PHP-Version: 5.4.45-0+deb7u8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `ELW`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Einsatz`
--

CREATE TABLE IF NOT EXISTS `Einsatz` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Einsatzleiter` text NOT NULL,
  `Aktiv` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Eintrag`
--

CREATE TABLE IF NOT EXISTS `Eintrag` (
  `ID` int(11) NOT NULL,
  `Einsatz_ID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Eintragtext` text NOT NULL,
  `Zeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Fahrzeuge`
--

CREATE TABLE IF NOT EXISTS `Fahrzeuge` (
  `ID` int(11) NOT NULL,
  `Einsatz_ID` int(11) NOT NULL,
  `Funkrufname` text NOT NULL,
  `Fahrzeug` text NOT NULL,
  `Staerke_1` int(11) NOT NULL,
  `Staerke_2` int(11) NOT NULL,
  `Staerke_3` int(11) NOT NULL,
  `PA` int(11) NOT NULL,
  `Alarmiert` datetime NOT NULL,
  `Ausgerueckt` datetime NOT NULL,
  `Bereitstellung` datetime NOT NULL,
  `Einsatzstelle` datetime NOT NULL,
  `EAb` datetime NOT NULL,
  `Landkreis` text NOT NULL,
  `Gemeinde` text NOT NULL,
  `Ortsteil` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Fahrzeugvorlage`
--

CREATE TABLE IF NOT EXISTS `Fahrzeugvorlage` (
  `ID` int(11) NOT NULL,
  `Funkrufname` text,
  `Fahrzeug` text,
  `Landkreis` text,
  `Gemeinde` text,
  `Ortsteil` text,
  `Erstauswahl` int(11) DEFAULT NULL,
  `Funktion` text
) ENGINE=MyISAM AUTO_INCREMENT=677 DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Einsatz`
--
ALTER TABLE `Einsatz`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`);

--
-- Indizes für die Tabelle `Eintrag`
--
ALTER TABLE `Eintrag`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `Fahrzeuge`
--
ALTER TABLE `Fahrzeuge`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`);

--
-- Indizes für die Tabelle `Fahrzeugvorlage`
--
ALTER TABLE `Fahrzeugvorlage`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Einsatz`
--
ALTER TABLE `Einsatz`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `Eintrag`
--
ALTER TABLE `Eintrag`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT für Tabelle `Fahrzeuge`
--
ALTER TABLE `Fahrzeuge`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT für Tabelle `Fahrzeugvorlage`
--
ALTER TABLE `Fahrzeugvorlage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=677;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
