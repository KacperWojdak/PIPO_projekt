-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Sty 2023, 19:35
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

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
-- Struktura tabeli dla tabeli `fireattack`
--

CREATE TABLE `fireattack` (
  `EnergyCost` int(10) NOT NULL,
  `Name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
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
(6, 'Rage', 10, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `firedeff`
--

CREATE TABLE `firedeff` (
  `EnergyCost` int(10) NOT NULL,
  `Name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
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
  `Name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
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
  `Name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
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
(5, 'Water octopus', 10, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `waterdeff`
--

CREATE TABLE `waterdeff` (
  `EnergyCost` int(10) NOT NULL,
  `Name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
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
  `Name` varchar(25) COLLATE utf8_polish_ci NOT NULL,
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
