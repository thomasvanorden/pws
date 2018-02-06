-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 07 feb 2018 om 00:27
-- Serverversie: 10.1.28-MariaDB
-- PHP-versie: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pws`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pws_client`
--

CREATE TABLE `pws_client` (
  `voornaam` varchar(64) NOT NULL,
  `tussenvoegsel` varchar(32) NOT NULL,
  `achternaam` varchar(64) NOT NULL,
  `geboortedatum` date NOT NULL,
  `client_code` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pws_gebruiker`
--

CREATE TABLE `pws_gebruiker` (
  `gebruikersnaam` varchar(128) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `voornaam` varchar(64) NOT NULL,
  `tussenvoegsel` varchar(32) NOT NULL,
  `achternaam` varchar(64) NOT NULL,
  `geboortedatum` date NOT NULL,
  `client_code` int(128) NOT NULL,
  `isverzorger` tinyint(1) NOT NULL,
  `profielfoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pws_notificaties`
--

CREATE TABLE `pws_notificaties` (
  `id` int(11) NOT NULL,
  `client_code` int(11) NOT NULL,
  `client_notificatie_id` int(11) NOT NULL,
  `tijd` datetime NOT NULL,
  `pictogram` varchar(255) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `inhoud` text NOT NULL,
  `afzender_gebruikersnaam` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `pws_client`
--
ALTER TABLE `pws_client`
  ADD PRIMARY KEY (`client_code`);

--
-- Indexen voor tabel `pws_gebruiker`
--
ALTER TABLE `pws_gebruiker`
  ADD PRIMARY KEY (`gebruikersnaam`),
  ADD UNIQUE KEY `gebruikersnaam` (`gebruikersnaam`);

--
-- Indexen voor tabel `pws_notificaties`
--
ALTER TABLE `pws_notificaties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `pws_notificaties`
--
ALTER TABLE `pws_notificaties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
