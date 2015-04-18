-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2015 at 12:41 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brend`
--

CREATE TABLE IF NOT EXISTS `brend` (
`idBrend` mediumint(8) NOT NULL,
  `idSlika` mediumint(8) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brend`
--

INSERT INTO `brend` (`idBrend`, `idSlika`, `naziv`, `status`) VALUES
(1, 1, 'brend', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cena`
--

CREATE TABLE IF NOT EXISTS `cena` (
`idCena` mediumint(8) NOT NULL,
  `idZapis` mediumint(8) DEFAULT NULL,
  `idProizvod` mediumint(8) NOT NULL,
  `idNabavka` mediumint(8) NOT NULL,
  `nabavnaKolicina` double NOT NULL,
  `nabavnaCena` decimal(10,2) NOT NULL,
  `datumCenaOd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `datumCenaDo` timestamp NULL DEFAULT NULL,
  `trenutnaKolicina` double NOT NULL,
  `prodajnaCena` decimal(10,2) NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cena`
--

INSERT INTO `cena` (`idCena`, `idZapis`, `idProizvod`, `idNabavka`, `nabavnaKolicina`, `nabavnaCena`, `datumCenaOd`, `datumCenaDo`, `trenutnaKolicina`, `prodajnaCena`, `status`) VALUES
(1, NULL, 1, 1, 5, '5.00', '2015-04-17 21:17:03', NULL, 5, '56.00', 1),
(2, 1, 1, 1, 45, '45.00', '2015-04-17 21:18:07', NULL, 3, '45.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `conf_shop`
--

CREATE TABLE IF NOT EXISTS `conf_shop` (
  `idGrad` mediumint(8) NOT NULL,
  `idValuta` mediumint(8) NOT NULL,
  `nazivProdavnica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pdv` double NOT NULL,
  `statusPrikazCena` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conf_shop`
--

INSERT INTO `conf_shop` (`idGrad`, `idValuta`, `nazivProdavnica`, `email`, `adresa`, `telefon`, `pdv`, `statusPrikazCena`) VALUES
(1, 2, 'Shop Prodavnica', 'bla@gmail.com', 'adresa 1', '123/123123-123', 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dobavljac`
--

CREATE TABLE IF NOT EXISTS `dobavljac` (
`idDobavljac` mediumint(8) NOT NULL,
  `idGrad` mediumint(8) NOT NULL,
  `idTipPlacanja` mediumint(8) NOT NULL,
  `nazivDobavljaca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maticniBroj` mediumint(8) NOT NULL,
  `pib` int(9) NOT NULL,
  `telefon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tekuciRacun` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` mediumint(8) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dobavljac`
--

INSERT INTO `dobavljac` (`idDobavljac`, `idGrad`, `idTipPlacanja`, `nazivDobavljaca`, `maticniBroj`, `pib`, `telefon`, `adresa`, `tekuciRacun`, `status`) VALUES
(1, 1, 1, 'dobavljac 1', 8388607, 123123123, '123/123123', 'adresa dob1', '123/123123123/12312', 00000001),
(2, 1, 1, 'dobavljac 1', 1231231, 123123123, '123/123123', 'adresa dob1', '123/123123123/12312', 00000001);

-- --------------------------------------------------------

--
-- Table structure for table `drzava`
--

CREATE TABLE IF NOT EXISTS `drzava` (
`idDrzava` mediumint(8) NOT NULL,
  `nazivDrzava` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drzava`
--

INSERT INTO `drzava` (`idDrzava`, `nazivDrzava`, `status`) VALUES
(1, 'srbija', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE IF NOT EXISTS `grad` (
`idGrad` mediumint(8) NOT NULL,
  `idDrzava` mediumint(8) NOT NULL,
  `nazivGrad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postBroj` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`idGrad`, `idDrzava`, `nazivGrad`, `postBroj`, `status`) VALUES
(1, 1, 'bg', '11000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grupa`
--

CREATE TABLE IF NOT EXISTS `grupa` (
`idGrupa` mediumint(8) NOT NULL,
  `nazivGrupa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idSlika` mediumint(8) NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grupa`
--

INSERT INTO `grupa` (`idGrupa`, `nazivGrupa`, `title`, `description`, `idSlika`, `status`) VALUES
(1, 'grupa1', 'grp1 title', 'grp2 desc', 1, 1),
(2, 'grupa1', 'title grupa1', 'desc grupa1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE IF NOT EXISTS `kategorija` (
`idKategorija` mediumint(8) NOT NULL,
  `idNadKategorija` mediumint(8) DEFAULT NULL,
  `idSlika` mediumint(8) NOT NULL,
  `nazivKategorija` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sortOrder` mediumint(8) NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idKategorija`, `idNadKategorija`, `idSlika`, `nazivKategorija`, `title`, `description`, `sortOrder`, `status`) VALUES
(1, NULL, 1, 'kategorija', 'kategorija title', 'kategorija desc', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
`idKomentar` mediumint(8) NOT NULL,
  `idKorisnik` mediumint(8) NOT NULL,
  `idProizvod` mediumint(8) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sadrzaj` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idKomentar`, `idKorisnik`, `idProizvod`, `datum`, `sadrzaj`, `status`) VALUES
(1, 1, 1, '2015-04-10 14:11:47', 'tekst komentara', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
`idKorisnik` mediumint(8) NOT NULL,
  `idUloga` mediumint(8) NOT NULL,
  `idGrad` mediumint(8) NOT NULL,
  `aktivacioniKod` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `datumKreiranja` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `datumRodjenja` timestamp NULL DEFAULT NULL,
  `ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datumPosLog` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `idUloga`, `idGrad`, `aktivacioniKod`, `datumKreiranja`, `datumRodjenja`, `ime`, `prezime`, `adresa`, `telefon`, `email`, `status`, `password`, `datumPosLog`) VALUES
(1, 1, 1, '123123123123', '2015-04-10 14:07:20', '2014-04-16 22:00:00', 'Biljana', 'Domcic', 'lestane 2', 'fiksni', 'bilja@bla.com', 1, 'e36f9b10672fab98f504ac6438368edf', '2015-04-17 12:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE IF NOT EXISTS `kurir` (
`idKurir` mediumint(8) NOT NULL,
  `idTipPlacanja` mediumint(8) NOT NULL,
  `nazivKurir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pib` int(9) NOT NULL,
  `telefon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idGrad` mediumint(8) NOT NULL,
  `tekuciRacun` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maticniBroj` bigint(13) NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`idKurir`, `idTipPlacanja`, `nazivKurir`, `pib`, `telefon`, `adresa`, `idGrad`, `tekuciRacun`, `maticniBroj`, `status`) VALUES
(1, 1, 'kurir 1', 123123123, '011/123123123', 'adresa kurira 1', 1, '123-123123123-123123', 1231231231123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE IF NOT EXISTS `meni` (
`idMeni` mediumint(8) NOT NULL,
  `idNadMeni` mediumint(8) DEFAULT NULL,
  `nazivMeni` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anchor` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privilegija` mediumint(8) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `prioritetLink` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idMeni`, `idNadMeni`, `nazivMeni`, `url`, `anchor`, `target`, `privilegija`, `status`, `prioritetLink`) VALUES
(2, NULL, 'glavni meni', NULL, NULL, NULL, 0, 1, NULL),
(3, 2, NULL, 'link1', 'anchor1', 'tar1', 0, 1, 1),
(4, 2, NULL, 'link2', 'anch2', 'tar2', 0, 1, 2),
(5, NULL, 'footer meni', NULL, NULL, NULL, 0, 1, NULL),
(6, 5, 'fMeni1', NULL, NULL, NULL, 0, 1, NULL),
(7, 5, 'fMeni2', NULL, NULL, NULL, 0, 1, NULL),
(8, 6, NULL, 'fLink1', 'anch1', 'tar1', 0, 1, 1),
(9, 6, NULL, 'fLink2', 'anch2', 'tar2', 0, 1, 2),
(10, 7, NULL, 'fLink3', 'anch3', 'tar3', 0, 1, 1),
(11, 7, NULL, 'fLink4', 'anch4', 'tar4', 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nabavka`
--

CREATE TABLE IF NOT EXISTS `nabavka` (
`idNabavka` mediumint(8) NOT NULL,
  `idDobavljac` mediumint(8) NOT NULL,
  `idProizvod` mediumint(8) NOT NULL,
  `kolicina` double NOT NULL,
  `datumNabavke` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `datumDostave` timestamp NULL DEFAULT NULL,
  `cenaKomad` decimal(10,2) NOT NULL,
  `statusPlaceno` tinyint(1) unsigned zerofill NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nabavka`
--

INSERT INTO `nabavka` (`idNabavka`, `idDobavljac`, `idProizvod`, `kolicina`, `datumNabavke`, `datumDostave`, `cenaKomad`, `statusPlaceno`, `status`) VALUES
(1, 2, 2, 5, '2015-04-17 21:16:16', NULL, '58.00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nacin_isporuke`
--

CREATE TABLE IF NOT EXISTS `nacin_isporuke` (
`idNacinIsporuke` mediumint(8) NOT NULL,
  `idKurir` mediumint(8) NOT NULL,
  `nazivIsporuke` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nacin_isporuke`
--

INSERT INTO `nacin_isporuke` (`idNacinIsporuke`, `idKurir`, `nazivIsporuke`, `status`) VALUES
(1, 1, 'naziv isporuke 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nacin_kurir_placanje`
--

CREATE TABLE IF NOT EXISTS `nacin_kurir_placanje` (
`idNacinKurirPlacanje` mediumint(8) NOT NULL,
  `nazivNacinKurirPlacanje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nacin_kurir_placanje`
--

INSERT INTO `nacin_kurir_placanje` (`idNacinKurirPlacanje`, `nazivNacinKurirPlacanje`, `status`) VALUES
(1, 'posle 60 dana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nacin_placanja`
--

CREATE TABLE IF NOT EXISTS `nacin_placanja` (
`idNacinPlacanja` mediumint(8) NOT NULL,
  `nazivPlacanje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nacin_placanja`
--

INSERT INTO `nacin_placanja` (`idNacinPlacanja`, `nazivPlacanje`, `status`) VALUES
(1, 'nacin placanja 1', 0),
(2, 'naziv lacanje 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opcija`
--

CREATE TABLE IF NOT EXISTS `opcija` (
`idOpcija` mediumint(8) NOT NULL,
  `nazivOpcija` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opisOpcija` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkOpcija` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `opcija`
--

INSERT INTO `opcija` (`idOpcija`, `nazivOpcija`, `opisOpcija`, `linkOpcija`) VALUES
(1, 'opcija1', 'opis opc 1', 'link opc 1'),
(2, 'pocija 2', 'opis opc 2', 'link opc 2');

-- --------------------------------------------------------

--
-- Table structure for table `opcija_uloga`
--

CREATE TABLE IF NOT EXISTS `opcija_uloga` (
  `idUloga` mediumint(8) NOT NULL,
  `idOpcija` mediumint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `opcija_uloga`
--

INSERT INTO `opcija_uloga` (`idUloga`, `idOpcija`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `osobina`
--

CREATE TABLE IF NOT EXISTS `osobina` (
`idOsobina` mediumint(8) NOT NULL,
  `nazivOsobina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jedinica` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `osobina`
--

INSERT INTO `osobina` (`idOsobina`, `nazivOsobina`, `jedinica`, `status`) VALUES
(1, 'boja', NULL, 1),
(2, 'visina', 'cm', 1),
(3, 'sirina', 'cm', 1),
(4, 'duzina', 'cm', 1),
(5, 'tezina', 'kg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `popust`
--

CREATE TABLE IF NOT EXISTS `popust` (
`idPopust` mediumint(8) NOT NULL,
  `idTipPopust` mediumint(8) NOT NULL,
  `nazivPopust` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iznos` double NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `popust`
--

INSERT INTO `popust` (`idPopust`, `idTipPopust`, `nazivPopust`, `iznos`, `status`) VALUES
(1, 1, 'popust 1', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `porudzbina`
--

CREATE TABLE IF NOT EXISTS `porudzbina` (
`idPorudzbina` mediumint(8) NOT NULL,
  `idKorisnik` mediumint(8) NOT NULL,
  `idNacinPlacanja` mediumint(8) NOT NULL,
  `idNacinIsporuke` mediumint(8) NOT NULL,
  `datumPorudzbina` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cena` decimal(10,2) NOT NULL,
  `statusIsporuka` tinyint(1) unsigned zerofill NOT NULL,
  `statusPlaceno` tinyint(1) unsigned zerofill NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `porudzbina`
--

INSERT INTO `porudzbina` (`idPorudzbina`, `idKorisnik`, `idNacinPlacanja`, `idNacinIsporuke`, `datumPorudzbina`, `cena`, `statusIsporuka`, `statusPlaceno`, `status`) VALUES
(1, 1, 2, 1, '2015-04-17 13:16:32', '2000.00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pretplata`
--

CREATE TABLE IF NOT EXISTS `pretplata` (
`idPretplata` mediumint(8) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE IF NOT EXISTS `proizvod` (
`idProizvod` mediumint(8) NOT NULL,
  `idTipProizvod` mediumint(8) NOT NULL,
  `idBrend` mediumint(8) NOT NULL,
  `idKategorija` mediumint(8) NOT NULL,
  `idSlika` mediumint(8) NOT NULL,
  `datumKreiranja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `barkod` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modelOpis` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `opis` text COLLATE utf8_unicode_ci,
  `osobine` text COLLATE utf8_unicode_ci,
  `statusKolicinaVidljivost` tinyint(1) unsigned zerofill NOT NULL,
  `statusPopust` tinyint(1) unsigned zerofill NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `cena` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`idProizvod`, `idTipProizvod`, `idBrend`, `idKategorija`, `idSlika`, `datumKreiranja`, `barkod`, `title`, `description`, `modelOpis`, `opis`, `osobine`, `statusKolicinaVidljivost`, `statusPopust`, `status`, `cena`) VALUES
(1, 1, 1, 1, 1, '2015-04-17 20:22:53', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'model opis', 'neki veci opis', 'boja|zuta|*visina|15|cm*sirina|45|cm*duzina|67|cm*tezina|100|kg*', 1, 1, 1, '300.00'),
(2, 1, 1, 1, 1, '2015-04-16 22:03:04', 'barkod 2', 'title', 'description', 'model opis2', 'opis proizvoda pretraga karakteristika osobine funkcionalnosti', '', 2, 2, 1, '150.00'),
(4, 1, 1, 1, 1, '2015-04-07 16:26:35', 'barkod 3', 'title', 'description', 'model opis2', 'neki veci opis 3', '', 2, 2, 1, '150.00'),
(5, 1, 1, 1, 1, '2015-04-16 22:03:45', 'barkod 4', 'title', 'description', 'model opis2', 'opis proizvoda pretraga karakteristika osobine funkcionalnosti i jos po nesto sto nema u prvom pretraga pregled', '', 2, 2, 1, '150.00');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod_grupa`
--

CREATE TABLE IF NOT EXISTS `proizvod_grupa` (
  `idProizvod` mediumint(8) NOT NULL,
  `idGrupa` mediumint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvod_grupa`
--

INSERT INTO `proizvod_grupa` (`idProizvod`, `idGrupa`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `proizvod_popust`
--

CREATE TABLE IF NOT EXISTS `proizvod_popust` (
  `idProizvod` mediumint(8) NOT NULL,
  `idPopust` mediumint(8) NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvod_popust`
--

INSERT INTO `proizvod_popust` (`idProizvod`, `idPopust`, `status`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `proizvod_porudzbina`
--

CREATE TABLE IF NOT EXISTS `proizvod_porudzbina` (
  `idProizvod` mediumint(8) NOT NULL,
  `idPorudzbina` mediumint(8) NOT NULL,
  `kolicinaProizvod` double NOT NULL,
  `cenaPJK` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvod_porudzbina`
--

INSERT INTO `proizvod_porudzbina` (`idProizvod`, `idPorudzbina`, `kolicinaProizvod`, `cenaPJK`) VALUES
(1, 1, 2, '20.00'),
(2, 1, 3, '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod_relacija`
--

CREATE TABLE IF NOT EXISTS `proizvod_relacija` (
  `idProizvod` mediumint(8) NOT NULL,
  `idTipRelacija` mediumint(8) NOT NULL,
  `idSlicanProizvod` mediumint(8) NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvod_relacija`
--

INSERT INTO `proizvod_relacija` (`idProizvod`, `idTipRelacija`, `idSlicanProizvod`, `status`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slajder`
--

CREATE TABLE IF NOT EXISTS `slajder` (
`idSlajder` mediumint(8) NOT NULL,
  `nazivSlajder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slajder`
--

INSERT INTO `slajder` (`idSlajder`, `nazivSlajder`, `status`) VALUES
(1, 'slajder1', 1),
(2, 'slajder2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slajder_slika`
--

CREATE TABLE IF NOT EXISTS `slajder_slika` (
`idSlajderSlika` mediumint(8) NOT NULL,
  `putanjaSlika` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slajder_slika`
--

INSERT INTO `slajder_slika` (`idSlajderSlika`, `putanjaSlika`, `url`, `title`, `status`) VALUES
(1, 'url slika 1', 'action slika1', 'title1', 1),
(2, 'url slika 2', 'action slika 2', 'title2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slajder_slika_veza`
--

CREATE TABLE IF NOT EXISTS `slajder_slika_veza` (
  `idSlajderSlika` mediumint(8) NOT NULL,
  `idSlajder` mediumint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slajder_slika_veza`
--

INSERT INTO `slajder_slika_veza` (`idSlajderSlika`, `idSlajder`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

CREATE TABLE IF NOT EXISTS `slika` (
`idSlika` mediumint(8) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slika`
--

INSERT INTO `slika` (`idSlika`, `url`, `alt`, `title`, `status`) VALUES
(1, 'url slike', 'alt slike', 'title slike', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stranica`
--

CREATE TABLE IF NOT EXISTS `stranica` (
`idStranica` mediumint(8) NOT NULL,
  `nazivStranica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sadrzaj` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stranica`
--

INSERT INTO `stranica` (`idStranica`, `nazivStranica`, `title`, `description`, `keywords`, `url`, `sadrzaj`, `status`) VALUES
(1, 'naziv stranica', 'title stranica', 'desc stranica', 'key sstranica', 'url stranica', 'teasdasd asfkj ;lfkja sdklfj ;asdkfj asdklfj a;sdklfj ;adf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tip_osobina`
--

CREATE TABLE IF NOT EXISTS `tip_osobina` (
  `idTip` mediumint(8) NOT NULL,
  `idOsobina` mediumint(8) NOT NULL,
  `defaultVrednost` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prioritet` mediumint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip_osobina`
--

INSERT INTO `tip_osobina` (`idTip`, `idOsobina`, `defaultVrednost`, `prioritet`) VALUES
(1, 1, 'proba default vrednost', 1),
(1, 2, '', 2),
(1, 3, '', 3),
(1, 4, '', 4),
(1, 5, '', 5),
(2, 1, '', 6),
(2, 2, '', 7),
(2, 3, '', 8),
(2, 4, '', 9),
(2, 5, '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tip_popust`
--

CREATE TABLE IF NOT EXISTS `tip_popust` (
`idTipPopust` mediumint(8) NOT NULL,
  `nazivTipPopust` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip_popust`
--

INSERT INTO `tip_popust` (`idTipPopust`, `nazivTipPopust`, `status`) VALUES
(1, 'tip popusta 1', 1),
(2, 'tip popusta 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tip_proizvoda`
--

CREATE TABLE IF NOT EXISTS `tip_proizvoda` (
`idTipProizvod` mediumint(8) NOT NULL,
  `nazivTip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip_proizvoda`
--

INSERT INTO `tip_proizvoda` (`idTipProizvod`, `nazivTip`, `status`) VALUES
(1, 'ves masina', 1),
(2, 'mikser', 1),
(3, 'graficka', 1),
(4, 'procesor', 1),
(5, 'napajanje', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tip_relacija`
--

CREATE TABLE IF NOT EXISTS `tip_relacija` (
`idTipRelacija` mediumint(8) NOT NULL,
  `nazivTipRelacija` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip_relacija`
--

INSERT INTO `tip_relacija` (`idTipRelacija`, `nazivTipRelacija`, `status`) VALUES
(1, 'privezak', 1),
(2, 'slicno je', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE IF NOT EXISTS `uloga` (
`idUloga` mediumint(8) NOT NULL,
  `nazivUloga` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`idUloga`, `nazivUloga`, `status`) VALUES
(1, 'korisnikUloga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `valuta`
--

CREATE TABLE IF NOT EXISTS `valuta` (
`idValuta` mediumint(8) NOT NULL,
  `idDrzava` mediumint(8) NOT NULL,
  `nazivValuta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skracenicaValuta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `valuta`
--

INSERT INTO `valuta` (`idValuta`, `idDrzava`, `nazivValuta`, `skracenicaValuta`, `status`) VALUES
(1, 1, 'Dinar', 'RSD', 0),
(2, 1, 'Dinar', 'RSD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vrednost`
--

CREATE TABLE IF NOT EXISTS `vrednost` (
`idVrednost` mediumint(8) NOT NULL,
  `nazivVrednost` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vrednost`
--

INSERT INTO `vrednost` (`idVrednost`, `nazivVrednost`) VALUES
(1, 'bela'),
(2, 'zuta'),
(3, 'plava'),
(4, '12'),
(5, '15'),
(6, '45'),
(7, '50'),
(8, '67'),
(9, '70'),
(10, '100');

-- --------------------------------------------------------

--
-- Table structure for table `vrednost_proizvod_osobina`
--

CREATE TABLE IF NOT EXISTS `vrednost_proizvod_osobina` (
  `idVrednost` mediumint(8) NOT NULL,
  `idOsobina` mediumint(8) NOT NULL,
  `idProizvod` mediumint(8) NOT NULL,
  `status` tinyint(1) unsigned zerofill NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vrednost_proizvod_osobina`
--

INSERT INTO `vrednost_proizvod_osobina` (`idVrednost`, `idOsobina`, `idProizvod`, `status`) VALUES
(2, 1, 1, 1),
(5, 2, 1, 1),
(6, 3, 1, 1),
(8, 4, 1, 1),
(10, 5, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brend`
--
ALTER TABLE `brend`
 ADD PRIMARY KEY (`idBrend`), ADD UNIQUE KEY `naziv_UNIQUE` (`naziv`), ADD KEY `fk_brend_slika1_idx` (`idSlika`);

--
-- Indexes for table `cena`
--
ALTER TABLE `cena`
 ADD PRIMARY KEY (`idCena`), ADD KEY `fk_cena_cena1_idx` (`idZapis`), ADD KEY `fk_cena_nabavka1_idx` (`idNabavka`), ADD KEY `fk_cena_proizvod1_idx` (`idProizvod`);

--
-- Indexes for table `conf_shop`
--
ALTER TABLE `conf_shop`
 ADD UNIQUE KEY `email_UNIQUE` (`email`), ADD KEY `fk_conf_shop_grad1_idx` (`idGrad`), ADD KEY `fk_conf_shop_valuta1_idx` (`idValuta`);

--
-- Indexes for table `dobavljac`
--
ALTER TABLE `dobavljac`
 ADD PRIMARY KEY (`idDobavljac`), ADD UNIQUE KEY `pib` (`pib`,`tekuciRacun`,`maticniBroj`), ADD KEY `fk_dobavljac_grad1_idx` (`idGrad`), ADD KEY `fk_dobavljac_placanje` (`idTipPlacanja`);

--
-- Indexes for table `drzava`
--
ALTER TABLE `drzava`
 ADD PRIMARY KEY (`idDrzava`), ADD UNIQUE KEY `naziv_UNIQUE` (`nazivDrzava`);

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
 ADD PRIMARY KEY (`idGrad`), ADD KEY `fk_grad_drzava1_idx` (`idDrzava`);

--
-- Indexes for table `grupa`
--
ALTER TABLE `grupa`
 ADD PRIMARY KEY (`idGrupa`), ADD KEY `fk_grupa_slika` (`idSlika`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
 ADD PRIMARY KEY (`idKategorija`), ADD UNIQUE KEY `sortOrder` (`sortOrder`), ADD UNIQUE KEY `nazivKategorija_UNIQUE` (`nazivKategorija`), ADD KEY `fk_kategorija_kategorija1_idx` (`idNadKategorija`), ADD KEY `fk_kategorija_slika1_idx` (`idSlika`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
 ADD PRIMARY KEY (`idKomentar`), ADD KEY `fk_komentar_korisnik1_idx` (`idKorisnik`), ADD KEY `fk_komentar_proizvod1_idx` (`idProizvod`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
 ADD PRIMARY KEY (`idKorisnik`), ADD UNIQUE KEY `email` (`email`,`aktivacioniKod`), ADD UNIQUE KEY `email_UNIQUE` (`email`), ADD KEY `fk_korisnik_uloga1_idx` (`idUloga`), ADD KEY `fk_korisnik_grad1_idx` (`idGrad`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
 ADD PRIMARY KEY (`idKurir`), ADD UNIQUE KEY `pib` (`pib`,`tekuciRacun`,`maticniBroj`), ADD KEY `fk_kurir_nacin_kurir_placanje1_idx` (`idTipPlacanja`), ADD KEY `fk_kurir_grad` (`idGrad`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
 ADD PRIMARY KEY (`idMeni`), ADD UNIQUE KEY `nazivMeni_UNIQUE` (`nazivMeni`), ADD KEY `fk_nadmeni` (`idNadMeni`);

--
-- Indexes for table `nabavka`
--
ALTER TABLE `nabavka`
 ADD PRIMARY KEY (`idNabavka`), ADD KEY `fk_nabavka_dobavljac1_idx` (`idDobavljac`), ADD KEY `fk_nabavka_proizvod1_idx` (`idProizvod`);

--
-- Indexes for table `nacin_isporuke`
--
ALTER TABLE `nacin_isporuke`
 ADD PRIMARY KEY (`idNacinIsporuke`), ADD KEY `fk_nacinIsporuke_kurir` (`idKurir`);

--
-- Indexes for table `nacin_kurir_placanje`
--
ALTER TABLE `nacin_kurir_placanje`
 ADD PRIMARY KEY (`idNacinKurirPlacanje`), ADD UNIQUE KEY `nazivNacinKurirPlacanje_UNIQUE` (`nazivNacinKurirPlacanje`);

--
-- Indexes for table `nacin_placanja`
--
ALTER TABLE `nacin_placanja`
 ADD PRIMARY KEY (`idNacinPlacanja`);

--
-- Indexes for table `opcija`
--
ALTER TABLE `opcija`
 ADD PRIMARY KEY (`idOpcija`);

--
-- Indexes for table `opcija_uloga`
--
ALTER TABLE `opcija_uloga`
 ADD KEY `fk_opcija_uloga_uloga` (`idUloga`), ADD KEY `fk_opcija_uloga_opcija` (`idOpcija`);

--
-- Indexes for table `osobina`
--
ALTER TABLE `osobina`
 ADD PRIMARY KEY (`idOsobina`);

--
-- Indexes for table `popust`
--
ALTER TABLE `popust`
 ADD PRIMARY KEY (`idPopust`), ADD KEY `fk_popust_tip_popust1_idx` (`idTipPopust`);

--
-- Indexes for table `porudzbina`
--
ALTER TABLE `porudzbina`
 ADD PRIMARY KEY (`idPorudzbina`), ADD KEY `fk_porudzbina_korisnik1_idx` (`idKorisnik`), ADD KEY `fk_porudzbina_nacin_placanja1_idx` (`idNacinPlacanja`), ADD KEY `fk_porudzbina_nacin_isporuke1_idx` (`idNacinIsporuke`);

--
-- Indexes for table `pretplata`
--
ALTER TABLE `pretplata`
 ADD PRIMARY KEY (`idPretplata`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
 ADD PRIMARY KEY (`idProizvod`), ADD UNIQUE KEY `barkod` (`barkod`), ADD KEY `fk_proizvod_kategorija_idx` (`idKategorija`), ADD KEY `fk_proizvod_brend1_idx` (`idBrend`), ADD KEY `fk_proizvod_tipProizvoda1_idx` (`idTipProizvod`), ADD KEY `fk_proizvod_slika1_idx` (`idSlika`);

--
-- Indexes for table `proizvod_grupa`
--
ALTER TABLE `proizvod_grupa`
 ADD PRIMARY KEY (`idProizvod`,`idGrupa`), ADD KEY `fk_proizvod_grupa_grupa1_idx` (`idGrupa`), ADD KEY `fk_proizvod_grupa_proizvod1_idx` (`idProizvod`);

--
-- Indexes for table `proizvod_popust`
--
ALTER TABLE `proizvod_popust`
 ADD PRIMARY KEY (`idProizvod`,`idPopust`), ADD KEY `fk_proizvod_popust_popust1_idx` (`idPopust`), ADD KEY `fk_proizvod_popust_proizvod1_idx` (`idProizvod`);

--
-- Indexes for table `proizvod_porudzbina`
--
ALTER TABLE `proizvod_porudzbina`
 ADD PRIMARY KEY (`idPorudzbina`,`idProizvod`), ADD KEY `fk_proizvod_porudzbina_proizvod1_idx` (`idProizvod`);

--
-- Indexes for table `proizvod_relacija`
--
ALTER TABLE `proizvod_relacija`
 ADD PRIMARY KEY (`idProizvod`,`idTipRelacija`,`idSlicanProizvod`), ADD KEY `fk_proizvod_relacija_proizvod1_idx` (`idProizvod`), ADD KEY `fk_proizvod_relacija_proizvod_relacija1` (`idSlicanProizvod`), ADD KEY `fk_proizvod_relacija_tip_relacija1` (`idTipRelacija`);

--
-- Indexes for table `slajder`
--
ALTER TABLE `slajder`
 ADD PRIMARY KEY (`idSlajder`);

--
-- Indexes for table `slajder_slika`
--
ALTER TABLE `slajder_slika`
 ADD PRIMARY KEY (`idSlajderSlika`);

--
-- Indexes for table `slajder_slika_veza`
--
ALTER TABLE `slajder_slika_veza`
 ADD PRIMARY KEY (`idSlajderSlika`,`idSlajder`), ADD KEY `fk_slajder_slika_veza_slajder1_idx` (`idSlajder`);

--
-- Indexes for table `slika`
--
ALTER TABLE `slika`
 ADD PRIMARY KEY (`idSlika`);

--
-- Indexes for table `stranica`
--
ALTER TABLE `stranica`
 ADD PRIMARY KEY (`idStranica`);

--
-- Indexes for table `tip_osobina`
--
ALTER TABLE `tip_osobina`
 ADD PRIMARY KEY (`idTip`,`idOsobina`), ADD UNIQUE KEY `prioritet` (`prioritet`), ADD KEY `fk_tip_osobina_tipProizvoda1_idx` (`idTip`), ADD KEY `fk_tip_osobina_osobina1_idx` (`idOsobina`);

--
-- Indexes for table `tip_popust`
--
ALTER TABLE `tip_popust`
 ADD PRIMARY KEY (`idTipPopust`);

--
-- Indexes for table `tip_proizvoda`
--
ALTER TABLE `tip_proizvoda`
 ADD PRIMARY KEY (`idTipProizvod`), ADD UNIQUE KEY `nazivTip_UNIQUE` (`nazivTip`);

--
-- Indexes for table `tip_relacija`
--
ALTER TABLE `tip_relacija`
 ADD PRIMARY KEY (`idTipRelacija`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
 ADD PRIMARY KEY (`idUloga`), ADD UNIQUE KEY `nazivUloga_UNIQUE` (`nazivUloga`);

--
-- Indexes for table `valuta`
--
ALTER TABLE `valuta`
 ADD PRIMARY KEY (`idValuta`), ADD KEY `fk_valuta_drzava1_idx` (`idDrzava`);

--
-- Indexes for table `vrednost`
--
ALTER TABLE `vrednost`
 ADD PRIMARY KEY (`idVrednost`);

--
-- Indexes for table `vrednost_proizvod_osobina`
--
ALTER TABLE `vrednost_proizvod_osobina`
 ADD PRIMARY KEY (`idVrednost`,`idOsobina`,`idProizvod`), ADD KEY `fk_proizvodVrednost_osobina1_idx` (`idOsobina`), ADD KEY `fk_vrednost_proizvod_osobina_proizvod1_idx` (`idProizvod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brend`
--
ALTER TABLE `brend`
MODIFY `idBrend` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cena`
--
ALTER TABLE `cena`
MODIFY `idCena` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dobavljac`
--
ALTER TABLE `dobavljac`
MODIFY `idDobavljac` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `drzava`
--
ALTER TABLE `drzava`
MODIFY `idDrzava` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
MODIFY `idGrad` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grupa`
--
ALTER TABLE `grupa`
MODIFY `idGrupa` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
MODIFY `idKategorija` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
MODIFY `idKomentar` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
MODIFY `idKorisnik` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
MODIFY `idKurir` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
MODIFY `idMeni` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `nabavka`
--
ALTER TABLE `nabavka`
MODIFY `idNabavka` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nacin_isporuke`
--
ALTER TABLE `nacin_isporuke`
MODIFY `idNacinIsporuke` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nacin_kurir_placanje`
--
ALTER TABLE `nacin_kurir_placanje`
MODIFY `idNacinKurirPlacanje` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nacin_placanja`
--
ALTER TABLE `nacin_placanja`
MODIFY `idNacinPlacanja` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `opcija`
--
ALTER TABLE `opcija`
MODIFY `idOpcija` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `osobina`
--
ALTER TABLE `osobina`
MODIFY `idOsobina` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `popust`
--
ALTER TABLE `popust`
MODIFY `idPopust` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `porudzbina`
--
ALTER TABLE `porudzbina`
MODIFY `idPorudzbina` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pretplata`
--
ALTER TABLE `pretplata`
MODIFY `idPretplata` mediumint(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
MODIFY `idProizvod` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `slajder`
--
ALTER TABLE `slajder`
MODIFY `idSlajder` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slajder_slika`
--
ALTER TABLE `slajder_slika`
MODIFY `idSlajderSlika` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slika`
--
ALTER TABLE `slika`
MODIFY `idSlika` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stranica`
--
ALTER TABLE `stranica`
MODIFY `idStranica` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tip_popust`
--
ALTER TABLE `tip_popust`
MODIFY `idTipPopust` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tip_proizvoda`
--
ALTER TABLE `tip_proizvoda`
MODIFY `idTipProizvod` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tip_relacija`
--
ALTER TABLE `tip_relacija`
MODIFY `idTipRelacija` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
MODIFY `idUloga` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `valuta`
--
ALTER TABLE `valuta`
MODIFY `idValuta` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vrednost`
--
ALTER TABLE `vrednost`
MODIFY `idVrednost` mediumint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `brend`
--
ALTER TABLE `brend`
ADD CONSTRAINT `fk_brend_slika1` FOREIGN KEY (`idSlika`) REFERENCES `slika` (`idSlika`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cena`
--
ALTER TABLE `cena`
ADD CONSTRAINT `fk_cena_cena1` FOREIGN KEY (`idZapis`) REFERENCES `cena` (`idCena`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cena_nabavka` FOREIGN KEY (`idNabavka`) REFERENCES `nabavka` (`idNabavka`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cena_nabavka1` FOREIGN KEY (`idNabavka`) REFERENCES `nabavka` (`idNabavka`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cena_proizvod1` FOREIGN KEY (`idProizvod`) REFERENCES `proizvod` (`idProizvod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `conf_shop`
--
ALTER TABLE `conf_shop`
ADD CONSTRAINT `fk_conf_shop_grad1` FOREIGN KEY (`idGrad`) REFERENCES `grad` (`idGrad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_conf_shop_valuta1` FOREIGN KEY (`idValuta`) REFERENCES `valuta` (`idValuta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dobavljac`
--
ALTER TABLE `dobavljac`
ADD CONSTRAINT `fk_dobavljac_grad1` FOREIGN KEY (`idGrad`) REFERENCES `grad` (`idGrad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_dobavljac_placanje` FOREIGN KEY (`idTipPlacanja`) REFERENCES `nacin_kurir_placanje` (`idNacinKurirPlacanje`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `grad`
--
ALTER TABLE `grad`
ADD CONSTRAINT `fk_grad_drzava1` FOREIGN KEY (`idDrzava`) REFERENCES `drzava` (`idDrzava`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `grupa`
--
ALTER TABLE `grupa`
ADD CONSTRAINT `fk_grupa_slika` FOREIGN KEY (`idSlika`) REFERENCES `slika` (`idSlika`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kategorija`
--
ALTER TABLE `kategorija`
ADD CONSTRAINT `fk_kategorija_kategorija1` FOREIGN KEY (`idNadKategorija`) REFERENCES `kategorija` (`idKategorija`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_kategorija_slika1` FOREIGN KEY (`idSlika`) REFERENCES `slika` (`idSlika`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
ADD CONSTRAINT `fk_komentar_korisnik1` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_komentar_proizvod1` FOREIGN KEY (`idProizvod`) REFERENCES `proizvod` (`idProizvod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
ADD CONSTRAINT `fk_korisnik_grad1` FOREIGN KEY (`idGrad`) REFERENCES `grad` (`idGrad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_korisnik_uloga1` FOREIGN KEY (`idUloga`) REFERENCES `uloga` (`idUloga`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kurir`
--
ALTER TABLE `kurir`
ADD CONSTRAINT `fk_kurir_grad` FOREIGN KEY (`idGrad`) REFERENCES `grad` (`idGrad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_kurir_nacin_kurir_placanje1` FOREIGN KEY (`idTipPlacanja`) REFERENCES `nacin_kurir_placanje` (`idNacinKurirPlacanje`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `meni`
--
ALTER TABLE `meni`
ADD CONSTRAINT `fk_nadmeni` FOREIGN KEY (`idNadMeni`) REFERENCES `meni` (`idMeni`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nabavka`
--
ALTER TABLE `nabavka`
ADD CONSTRAINT `fk_nabavka_dobavljac1` FOREIGN KEY (`idDobavljac`) REFERENCES `dobavljac` (`idDobavljac`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_nabavka_proizvod1` FOREIGN KEY (`idProizvod`) REFERENCES `proizvod` (`idProizvod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nacin_isporuke`
--
ALTER TABLE `nacin_isporuke`
ADD CONSTRAINT `fk_nacinIsporuke_kurir` FOREIGN KEY (`idKurir`) REFERENCES `kurir` (`idKurir`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `opcija_uloga`
--
ALTER TABLE `opcija_uloga`
ADD CONSTRAINT `fk_opcija_uloga_opcija` FOREIGN KEY (`idOpcija`) REFERENCES `opcija` (`idOpcija`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_opcija_uloga_uloga` FOREIGN KEY (`idUloga`) REFERENCES `uloga` (`idUloga`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `popust`
--
ALTER TABLE `popust`
ADD CONSTRAINT `fk_popust_tip_popust1` FOREIGN KEY (`idTipPopust`) REFERENCES `tip_popust` (`idTipPopust`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `porudzbina`
--
ALTER TABLE `porudzbina`
ADD CONSTRAINT `fk_porudzbina_korisnik1` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnik` (`idKorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_porudzbina_nacin_isporuke1` FOREIGN KEY (`idNacinIsporuke`) REFERENCES `nacin_isporuke` (`idNacinIsporuke`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_porudzbina_nacin_placanja1` FOREIGN KEY (`idNacinPlacanja`) REFERENCES `nacin_placanja` (`idNacinPlacanja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
ADD CONSTRAINT `fk_proizvod_brend1` FOREIGN KEY (`idBrend`) REFERENCES `brend` (`idBrend`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_proizvod_kategorija` FOREIGN KEY (`idKategorija`) REFERENCES `kategorija` (`idKategorija`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_proizvod_slika1` FOREIGN KEY (`idSlika`) REFERENCES `slika` (`idSlika`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_proizvod_tipProizvoda1` FOREIGN KEY (`idTipProizvod`) REFERENCES `tip_proizvoda` (`idTipProizvod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proizvod_grupa`
--
ALTER TABLE `proizvod_grupa`
ADD CONSTRAINT `fk_proizvod_grupa_grupa1` FOREIGN KEY (`idGrupa`) REFERENCES `grupa` (`idGrupa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_proizvod_grupa_proizvod1` FOREIGN KEY (`idProizvod`) REFERENCES `proizvod` (`idProizvod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proizvod_popust`
--
ALTER TABLE `proizvod_popust`
ADD CONSTRAINT `fk_proizvod_popust_popust1` FOREIGN KEY (`idPopust`) REFERENCES `popust` (`idPopust`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_proizvod_popust_proizvod1` FOREIGN KEY (`idProizvod`) REFERENCES `proizvod` (`idProizvod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proizvod_porudzbina`
--
ALTER TABLE `proizvod_porudzbina`
ADD CONSTRAINT `fk_proizvod_porudzbina_porudzbina1` FOREIGN KEY (`idPorudzbina`) REFERENCES `porudzbina` (`idPorudzbina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_proizvod_porudzbina_proizvod1` FOREIGN KEY (`idProizvod`) REFERENCES `proizvod` (`idProizvod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proizvod_relacija`
--
ALTER TABLE `proizvod_relacija`
ADD CONSTRAINT `fk_proizvod_relacija_proizvod1` FOREIGN KEY (`idProizvod`) REFERENCES `proizvod` (`idProizvod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_proizvod_relacija_proizvod_relacija1` FOREIGN KEY (`idSlicanProizvod`) REFERENCES `proizvod_relacija` (`idProizvod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_proizvod_relacija_tip_relacija1` FOREIGN KEY (`idTipRelacija`) REFERENCES `tip_relacija` (`idTipRelacija`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `slajder_slika_veza`
--
ALTER TABLE `slajder_slika_veza`
ADD CONSTRAINT `fk_slajder_slika_veza_slajder1` FOREIGN KEY (`idSlajder`) REFERENCES `slajder` (`idSlajder`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_slajder_slika_veza_slajder_slika1` FOREIGN KEY (`idSlajderSlika`) REFERENCES `slajder_slika` (`idSlajderSlika`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tip_osobina`
--
ALTER TABLE `tip_osobina`
ADD CONSTRAINT `fk_tip_osobina_osobina1` FOREIGN KEY (`idOsobina`) REFERENCES `osobina` (`idOsobina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tip_osobina_tipProizvoda1` FOREIGN KEY (`idTip`) REFERENCES `tip_proizvoda` (`idTipProizvod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `valuta`
--
ALTER TABLE `valuta`
ADD CONSTRAINT `fk_valuta_drzava1` FOREIGN KEY (`idDrzava`) REFERENCES `drzava` (`idDrzava`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vrednost_proizvod_osobina`
--
ALTER TABLE `vrednost_proizvod_osobina`
ADD CONSTRAINT `fk_proizvodVrednost_osobina1` FOREIGN KEY (`idOsobina`) REFERENCES `osobina` (`idOsobina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_proizvodVrednost_vrednost1` FOREIGN KEY (`idVrednost`) REFERENCES `vrednost` (`idVrednost`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_vrednost_proizvod_osobina_proizvod1` FOREIGN KEY (`idProizvod`) REFERENCES `proizvod` (`idProizvod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
