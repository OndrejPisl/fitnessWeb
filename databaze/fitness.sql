-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 04. dub 2017, 04:28
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
  `vyska` float NOT NULL,
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

INSERT INTO `uzivatele` (`id`, `jmeno`, `prijmeni`, `datum`, `vyska`, `email`, `heslo`, `tel`, `pohlavi`, `narodnost_id`, `info`, `prava`, `potvrzeni_pristupu`) VALUES
(1, 'admin', 'admin', '1111-11-11', 1.72, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '777777777', 1, 1, 'Jsem admin.', 1, 1),
(2, 'user', 'user', '1111-11-11', 1.9, 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', '666666666', 2, 2, 'Jsem user.', 0, 1),
(3, 'Nuser', 'Nuser', '1111-11-11', 1.65, 'nuser@nuser.com', 'f30863ba7ee94163fa00e6a54a86b5aa', '555555555', 2, 1, 'Nejsem přijatý uživatel.', 0, 0),
(11, 'Suser', 'Suser', '1997-02-01', 1.82, 'suser@suser.com', '515483996667424e5eae87559fb6f67a', '444 444 444', 1, 2, 'Smazání uživatele.', 0, 0),
(12, 'Puser', 'Puser', '1987-12-04', 1.55, 'puser@puser.com', '8cb1ecc05c0b32c2235046b0d9f23bea', '333 333 333', 1, 1, 'Přijetí uživatele.', 0, 0),
(13, 'Ondřej', 'Pišl', '1997-06-26', 1.78, 'pisl.ondrej@gmail.com', '202cb962ac59075b964b07152d234b70', '777777777', 1, 1, ' ahojo', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `vahy`
--

CREATE TABLE `vahy` (
  `uzivatele_id` int(10) NOT NULL,
  `vaha` float NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `vahy`
--

INSERT INTO `vahy` (`uzivatele_id`, `vaha`, `datum`) VALUES
(1, 75, '2017-02-01'),
(1, 80.5, '2017-03-01'),
(1, 76.2, '2017-03-02'),
(1, 85.6, '2017-02-12'),
(1, 65.9, '2017-02-18'),
(1, 58, '2016-02-18'),
(1, 72.5, '2017-03-06'),
(1, 82.6, '2016-12-12'),
(1, 74, '2017-01-12'),
(1, 77, '2017-03-12'),
(2, 90, '2017-03-18'),
(2, 95, '2017-03-10'),
(2, 85, '2017-03-03'),
(2, 87, '2017-03-01'),
(2, 89, '2017-02-26'),
(2, 90, '2017-02-23'),
(2, 102, '2017-02-03'),
(2, 99, '2017-02-10'),
(2, 87, '2017-02-16'),
(2, 90, '2016-12-15'),
(2, 95, '2016-11-15'),
(2, 88, '2016-10-15'),
(2, 88, '2015-06-15'),
(2, 95, '2014-06-15'),
(2, 90, '2013-06-15'),
(2, 82, '2012-06-15'),
(2, 79, '2011-06-15'),
(2, 81, '2010-06-15'),
(2, 81, '2016-11-15'),
(2, 85, '2016-10-15'),
(2, 87, '2016-09-15'),
(2, 90, '2016-08-15'),
(2, 83, '2016-07-15'),
(2, 79, '2016-06-15'),
(2, 80, '2016-05-15'),
(2, 76, '2016-04-15'),
(2, 92, '2017-03-19');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `narodnost_id` (`narodnost_id`);

--
-- Klíče pro tabulku `vahy`
--
ALTER TABLE `vahy`
  ADD KEY `uzivatele_id` (`uzivatele_id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `narodnosti`
--
ALTER TABLE `narodnosti`
  ADD CONSTRAINT `narodnosti_ibfk_1` FOREIGN KEY (`id`) REFERENCES `uzivatele` (`narodnost_id`);

--
-- Omezení pro tabulku `vahy`
--
ALTER TABLE `vahy`
  ADD CONSTRAINT `vahy_ibfk_1` FOREIGN KEY (`uzivatele_id`) REFERENCES `uzivatele` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
