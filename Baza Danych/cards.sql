-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Sty 2023, 23:23
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cards`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `airattack`
--

CREATE TABLE `airattack` (
  `EnergyCost` int(25) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Description` int(25) NOT NULL,
  `Effect` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `airattack`
--

INSERT INTO `airattack` (`EnergyCost`, `Name`, `Description`, `Effect`) VALUES
(2, 'Air Slash', 4, 0),
(3, 'Air Cutter', 5, 0),
(3, 'Giga Impact', 6, 0),
(6, 'Dragon Ascent', 13, 0),
(2, 'Windy', 4, 0),
(1, 'Air Sway', 2, 0),
(8, 'Air Conditioning', 17, 0),
(1, 'Air Sandal', 8, 0),
(0, 'Air Punch', 2, 0),
(2, 'Fordewind', 4, 0),
(1, 'Kick', 2, 0),
(2, 'Tornado Kick', 6, 0),
(5, 'Blowing', 10, 0),
(3, 'Vacuum', 7, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `airdeff`
--

CREATE TABLE `airdeff` (
  `EnergyCost` int(25) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Description` int(25) NOT NULL,
  `Effect` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `airdeff`
--

INSERT INTO `airdeff` (`EnergyCost`, `Name`, `Description`, `Effect`) VALUES
(1, 'Dodge', 2, 1),
(3, 'air breath', 5, 2),
(2, 'Agility', 5, 1),
(4, 'Zone', 9, 1),
(3, 'Medic!', 3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `airspecial`
--

CREATE TABLE `airspecial` (
  `EnergyCost` int(25) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Description` int(25) NOT NULL,
  `Effect` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `airspecial`
--

INSERT INTO `airspecial` (`EnergyCost`, `Name`, `Description`, `Effect`) VALUES
(2, 'Quickly', 2, 1),
(3, 'Meditation', 6, 4),
(1, 'Sleep', 0, 2),
(1, 'Gimmie that!', 3, 1),
(2, 'Agile Paws', 5, 1),
(1, 'Fast Wind', 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `earthattack`
--

CREATE TABLE `earthattack` (
  `EnergyCost` int(25) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` int(25) NOT NULL,
  `Effect` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `earthattack`
--

INSERT INTO `earthattack` (`EnergyCost`, `Name`, `Description`, `Effect`) VALUES
(3, 'Earthquake', 6, 0),
(2, 'RockThrow', 4, 0),
(4, 'HardHitter', 8, 0),
(2, 'Seismic Shard', 5, 0),
(1, 'Ground Slam', 4, 0),
(9, 'Unstoppable Force', 15, 0),
(2, 'Nature\'s Grasp', 3, 0),
(0, 'Path Maker', 2, 0),
(2, 'Threaded Volley', 4, 0),
(5, 'Unraveled Earth', 11, 0),
(2, 'Weaver\'s Wall', 3, 0),
(7, 'All Out', 13, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `earthdeff`
--

CREATE TABLE `earthdeff` (
  `EnergyCost` int(25) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Description` int(25) NOT NULL,
  `Effect` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `earthdeff`
--

INSERT INTO `earthdeff` (`EnergyCost`, `Name`, `Description`, `Effect`) VALUES
(2, 'Granite Shield', 2, 1),
(4, 'Shield of Durand', 8, 1),
(2, 'ArmorUP', 7, 1),
(2, 'GreenTea', 3, 2),
(2, 'Sandwich', 3, 2),
(3, 'Bandage', 5, 2),
(2, 'Def Card.png', 3, 1),
(4, 'Tutel ', 8, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `earthspecial`
--

CREATE TABLE `earthspecial` (
  `EnergyCost` int(25) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Description` int(25) NOT NULL,
  `Effect` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `earthspecial`
--

INSERT INTO `earthspecial` (`EnergyCost`, `Name`, `Description`, `Effect`) VALUES
(1, 'BruteForce', 2, 1),
(2, 'Spirit Of Earth', 1, 3),
(2, 'Rock UP', 3, 4),
(4, 'Rushdown', 8, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `fireattack`
--

CREATE TABLE `fireattack` (
  `EnergyCost` int(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Description` int(10) NOT NULL,
  `Effect` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `fireattack`
--

INSERT INTO `fireattack` (`EnergyCost`, `Name`, `Description`, `Effect`) VALUES
(1, ' Fire Strike', 2, 0),
(3, 'Fire Ball', 5, 0),
(1, 'Burning Hands', 3, 0),
(3, 'Flaming Sphere', 5, 0),
(6, 'Rage', 10, 0),
(4, 'Blaze', 9, 0),
(7, 'Pillar of Flame', 16, 0),
(5, 'Pyroclasm', 12, 0),
(3, 'Disintegrate', 7, 0),
(5, 'Radiant Blast', 11, 0),
(6, 'Starfire Spellblade', 14, 0),
(2, 'Solar Flare', 5, 0),
(5, 'Fire Spit', 12, 0),
(8, 'Ignition', 18, 0),
(13, 'Cataclysm', 99, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `firedeff`
--

CREATE TABLE `firedeff` (
  `EnergyCost` int(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Description` int(10) NOT NULL,
  `Effect` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `firedeff`
--

INSERT INTO `firedeff` (`EnergyCost`, `Name`, `Description`, `Effect`) VALUES
(1, 'Fire Wall', 2, 1),
(3, 'Burning Passion', 4, 1),
(3, 'Rune Of Recovery', 2, 2),
(3, 'Fire Smoke', 6, 1),
(8, 'Last breath', 15, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `firespecial`
--

CREATE TABLE `firespecial` (
  `EnergyCost` int(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Description` int(10) NOT NULL,
  `Effect` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `firespecial`
--

INSERT INTO `firespecial` (`EnergyCost`, `Name`, `Description`, `Effect`) VALUES
(1, 'Fire lucky', 2, 1),
(2, 'High Noon', 2, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `waterattack`
--

CREATE TABLE `waterattack` (
  `EnergyCost` int(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Description` int(10) NOT NULL,
  `Effect` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `waterattack`
--

INSERT INTO `waterattack` (`EnergyCost`, `Name`, `Description`, `Effect`) VALUES
(1, 'Water Whip', 2, 0),
(2, 'Water Wave', 3, 0),
(3, 'Water Blade', 5, 0),
(4, 'Tsunami', 8, 0),
(5, 'Water octopus', 10, 0),
(1, 'Hlup', 2, 0),
(1, 'Bubbles', 4, 0),
(4, 'Aqua Jet', 7, 0),
(1, 'Aqua Ring', 1, 0),
(4, 'Bubble Beam', 8, 0),
(7, 'Liquidation', 12, 0),
(2, 'Whirlpool', 5, 0),
(6, 'Sparkling Water', 14, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `waterdeff`
--

CREATE TABLE `waterdeff` (
  `EnergyCost` int(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Description` int(10) NOT NULL,
  `Effect` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `waterdeff`
--

INSERT INTO `waterdeff` (`EnergyCost`, `Name`, `Description`, `Effect`) VALUES
(1, 'Water Wall', 2, 1),
(3, 'Water Shell', 10, 1),
(2, 'Holly Drop', 2, 2),
(3, 'Spirit Water', 4, 2),
(5, 'Water Mark', 10, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `waterspecial`
--

CREATE TABLE `waterspecial` (
  `EnergyCost` int(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Description` int(10) NOT NULL,
  `Effect` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `waterspecial`
--

INSERT INTO `waterspecial` (`EnergyCost`, `Name`, `Description`, `Effect`) VALUES
(2, 'the flow of water', 2, 1),
(3, 'Clear Mind', 5, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
