-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 dec 2022 om 13:38
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autovoorraad`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `autos`
--

CREATE TABLE `autos` (
  `id` int(9) NOT NULL,
  `model` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `kleur` varchar(255) NOT NULL,
  `gewicht` int(9) NOT NULL,
  `prijs` int(9) NOT NULL,
  `voorraad` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `autos`
--

INSERT INTO `autos` (`id`, `model`, `type`, `kleur`, `gewicht`, `prijs`, `voorraad`) VALUES
(1, 'volkswagen', 'up', 'blauw', 945, 18140, 3),
(2, 'porsche', '911', 'wit', 1075, 123396, 2),
(3, 'volkswagen', 'tiguan', 'zilver', 1510, 36635, 4);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `autos`
--
ALTER TABLE `autos`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
