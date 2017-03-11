-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2017 at 01:18 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `narodnosti`
--

CREATE TABLE `narodnosti` (
  `id` int(10) NOT NULL,
  `nazev` varchar(50) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `narodnosti`
--

INSERT INTO `narodnosti` (`id`, `nazev`) VALUES
(1, 'Česká republika'),
(2, 'Slovenská republika');

-- --------------------------------------------------------

--
-- Table structure for table `uzivatele`
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
-- Dumping data for table `uzivatele`
--

INSERT INTO `uzivatele` (`id`, `jmeno`, `prijmeni`, `datum`, `email`, `heslo`, `tel`, `pohlavi`, `narodnost_id`, `info`, `prava`, `potvrzeni_pristupu`) VALUES
(1, 'Ondřej', 'Pišl', '1997-06-26', 'pisl.ondrej@gmail.com', '202cb962ac59075b964b07152d234b70', '775122082', 1, 1, 'ahoj, jsem ajťák!', 1, 1),
(2, 'Pavel', 'Pudil', '1997-01-01', 'pavel.pudil@gmail.com', '159', '789456123', 1, 1, 'Jmenuju se pavel', 0, 1),
(3, 'Petr', 'Pisl', '2011-11-11', 'petrpisl@gmail.com', '140f6969d5213fd0ece03148e62e461e', '+420777471259', 1, 1, 'Jem otec Ond5eje Pi3la a tot8lne m', 0, 1),
(5, 'Ondy', 'Pisl', '2011-11-11', 'ondy@gmail.com', '202cb962ac59075b964b07152d234b70', '777 777 777', 1, 2, 'asdasd', 0, 1),
(6, 'tomas', 'kokos', '1592-11-11', 'tomaskokos@gmail.com', '202cb962ac59075b964b07152d234b70', '777 755 455', 1, 1, 'asdasd', 0, 1),
(9, 'kolo', 'obecne', '1111-11-11', 'koloobecne', '202cb962ac59075b964b07152d234b70', '7777777777', 1, 1, 'asdasd', 0, 0),
(10, 'asdasd', 'asdasda', '1111-11-11', 'dfdfg', 'd58e3582afa99040e27b92b13c8f2280', 'dfgdfg', 1, 1, 'dfgdfg', 0, 0),
(11, 'asdasd', 'asdasda', '1111-11-11', 'dfdfg', 'd58e3582afa99040e27b92b13c8f2280', 'dfgdfg', 1, 1, 'dfgdfg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vahy`
--

CREATE TABLE `vahy` (
  `uzivatele_id` int(10) NOT NULL,
  `vaha` float NOT NULL,
  `datum` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vahy`
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
(1, 74, '2017-01-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `narodnosti`
--
ALTER TABLE `narodnosti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `narodnosti`
--
ALTER TABLE `narodnosti`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
