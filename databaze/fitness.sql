-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 21. úno 2017, 06:37
-- Verze serveru: 5.7.14
-- Verze PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `fitness`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `narodnosti`
--

CREATE TABLE `narodnosti` (
  `id` int(10) NOT NULL,
  `nazev` varchar(50) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `narodnosti`
--

INSERT INTO `narodnosti` (`id`, `nazev`) VALUES
(1, 'Česká republika'),
(2, 'Slovenská republika');

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `id` int(10) NOT NULL,
  `jmeno` varchar(254) COLLATE utf8_czech_ci DEFAULT NULL,
  `prijmeni` varchar(254) COLLATE utf8_czech_ci DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `email` varchar(254) COLLATE utf8_czech_ci NOT NULL,
  `heslo` char(50) COLLATE utf8_czech_ci NOT NULL,
  `tel` varchar(15) COLLATE utf8_czech_ci DEFAULT NULL,
  `pohlavi` tinyint(1) NOT NULL,
  `narodnost_id` int(5) NOT NULL,
  `info` varchar(500) COLLATE utf8_czech_ci DEFAULT NULL,
  `prava` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 je pro normálního uživatele 1 pro admina',
  `potvrzeni_pristupu` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 pro každého registrovaného '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `uzivatele`
--

INSERT INTO `uzivatele` (`id`, `jmeno`, `prijmeni`, `datum`, `email`, `heslo`, `tel`, `pohlavi`, `narodnost_id`, `info`, `prava`, `potvrzeni_pristupu`) VALUES
(1, 'Ondřej', 'Pišl', '1997-06-26', 'pisl.ondrej@gmail.com', '202cb962ac59075b964b07152d234b70', '775122082', 1, 1, 'ahoj, jsem ajťák!', 1, 1),
(2, 'Pavel', 'Pudil', '1997-01-01', 'pavel.pudil@gmail.com', '159', '789456123', 1, 1, 'Jmenuju se pavel', 0, 0);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `narodnosti`
--
ALTER TABLE `narodnosti`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `narodnosti`
--
ALTER TABLE `narodnosti`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
