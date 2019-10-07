-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 okt 2019 om 12:59
-- Serverversie: 10.1.30-MariaDB
-- PHP-versie: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gameplayparty`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bioscopen`
--

CREATE TABLE `bioscopen` (
  `biosID` int(11) NOT NULL,
  `biosnaam` text,
  `biosadres` text,
  `biospostcode` text,
  `biosplaats` text,
  `biosprovincie` text,
  `omschrijving` text,
  `aantal_zalen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `bioscopen`
--

INSERT INTO `bioscopen` (`biosID`, `biosnaam`, `biosadres`, `biospostcode`, `biosplaats`, `biosprovincie`, `omschrijving`, `aantal_zalen`) VALUES
(1, 'Kinepolis Jaarbeurs Utrecht', 'Jaarbeursboulevard 300', '3521 BC', 'Utrecht', 'Utrecht', 'Met Kinepolis Jaarbeurs (14 zalen, 3.010 stoelen) heeft Utrecht eindelijk een moderne megabioscoop in de binnenstad: de grootste bioscoop van Utrecht, en een van de grootste bioscopen van Nederland. \r\n\r\nKinepolis Jaarbeurs biedt elke filmbezoeker the ultimate cinema experience: ruime en comfortabele stoelen, royale beenruimte, en beeld en geluid van het allerhoogste niveau. Alle zalen zijn voorzien van laserprojectie. Voor een nog intensere bioscoopervaring kijk je een film in Laser ULTRA, met haarscherp laserbeeld en het ruimtelijke geluid van Dolby Atmos.\r\n\r\nKinepolis Jaarbeurs ligt op slechts een paar minuten loopafstand van het Centraal Station van Utrecht, tegen de Jaarbeurshallen aan. Een hapje eten of borrelen voor of na de film? Dat kan bij de naastgelegen foodcourt Speys.', 10),
(2, 'Kinepolis Almere', 'Forum 16', '1315 TH', 'Almere', 'Flevoland', 'Kinepolis Almere is sinds 2004 gevestigd in het levendige centrum van Almere. Het ontwerp van het imposante gebouw is van de bekroonde architect Rem Koolhaas. De megabioscoop telt 8 zalen met in totaal 2137 comfortabele stoelen. \r\n\r\nBij binnenkomst is de trap die diagonaal door het gebouw loopt, de eerste blikvanger. Kinepolis Almere is sinds november 2017 verbouwd om meer aan te sluiten bij de look-and-feel van Kinepolis. Dit betekent dat alle zetels zijn vernieuwd,  dat er automatische ticket machines (ATMs) op de trap zijn geplaatst en er een volledige nieuwe shop met een ruimer assortiment is gekomen.', 10),
(3, 'Kinepolis Den Helder\r\n', 'Willemsoord 51', '1781 AS', 'Den Helder', 'Noord-Holland', 'Kinepolis Den Helder opende in 2003 haar deuren in gebouw 51 op Willemsoord, de voormalige scheeps- en onderhoudswerf voor de Koninklijke Marine.\r\n\r\nVerschillende details van de Oude Rijkswerf zijn intact gelaten; twee van de zalen zijn nieuw tegen de Scheepswerkerplaats aangebouwd.\r\n\r\nDe bioscoop in de kop van Noord-Holland heeft in totaal 6 moderne bioscoopzalen en 776 stoelen.', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `consoles`
--

CREATE TABLE `consoles` (
  `console_id` int(11) NOT NULL,
  `console` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `consoles`
--

INSERT INTO `consoles` (`console_id`, `console`) VALUES
(1, 'Xbox One'),
(2, 'Nintendo Switch'),
(3, 'PlayStation 4');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contentmanagement`
--

CREATE TABLE `contentmanagement` (
  `paginaID` int(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `biosID` int(11) DEFAULT NULL,
  `pagina` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `contentmanagement`
--

INSERT INTO `contentmanagement` (`paginaID`, `owner`, `biosID`, `pagina`, `content`, `image`) VALUES
(1, 'beheer', NULL, 'footerContent', '<p>ok</p>\r\n<p><img src=\"assets/img/uploadvintage-pizza-drawing-hand-drawn-vector-16085839.jpg\" alt=\"\" width=\"50\" height=\"34\" /></p>', ''),
(2, 'beheer', NULL, 'Home', '<p>Breng jouw spel naar het volgende niveau op het grote scherm! Met een prive-theater dat speciaal voor jou en je crew is gereserveerd, heb je nog nooit eerder zo gespeeld. Maak er een toernooi van! Neem je eigen favoriete Xbox One-spellen mee of kies uit het aanbod van je theater.</p>', './assets/img/hero/internationaal-eclairgame-01.jpg'),
(3, 'beheer', NULL, 'contact', 'Title\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mollis nunc sit amet ultrices congue. Cras nibh ipsum, varius ac imperdiet at, convallis volutpat nibh. Sed iaculis condimentum sem, at finibus nibh. Curabitur aliquet odio nec purus congue, in accumsan diam ultricies. Morbi tincidunt metus non vulputate egestas. Donec eu ligula et sem malesuada efficitur a id arcu. Duis eu orci nisi. Quisque est nibh, tincidunt ut turpis id, varius feugiat erat.\r\n\r\nMeedoen?\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mollis nunc sit amet ultrices congue. Cras nibh ipsum, varius ac imperdiet at, convallis volutpat nibh. Sed iaculis condimentum sem, at finibus nibh. Curabitur aliquet odio nec purus congue, in accumsan diam ultricies. Morbi tincidunt metus non vulputate egestas. Donec eu ligula et sem malesuada efficitur a id arcu. Duis eu orci nisi. Quisque est nibh, tincidunt ut turpis id, varius feugiat erat.', ''),
(5, 'beheer', 1, 'Kinepolis Jaarbeurs Utrecht', '<p>Met Kinepolis Jaarbeurs (14 zalen, 3.010 stoelen) heeft Utrecht eindelijk een moderne megabioscoop in de binnenstad: de grootste bioscoop van Utrecht, en een van de grootste bioscopen van Nederland.&nbsp;</p>\r\n<p>Kinepolis Jaarbeurs biedt elke filmbezoeker the ultimate cinema experience: ruime en comfortabele stoelen, royale beenruimte, en beeld en geluid van het allerhoogste niveau. Alle zalen zijn voorzien van laserprojectie. Voor een nog intensere bioscoopervaring kijk je een film in Laser ULTRA, met haarscherp laserbeeld en het ruimtelijke geluid van Dolby Atmos.</p>\r\n<p>Kinepolis Jaarbeurs ligt op slechts een paar minuten loopafstand van het Centraal Station van Utrecht, tegen de Jaarbeurshallen aan. Een hapje eten of borrelen voor of na de film? Dat kan bij de naastgelegen foodcourt Speys.</p>', ''),
(6, 'beheer', 2, 'Kinepolis Almere', '<p>Kinepolis Almere is sinds 2004 gevestigd in het levendige centrum van Almere. Het ontwerp van het imposante gebouw is van de bekroonde architect Rem Koolhaas. De megabioscoop telt 8 zalen met in totaal 2137 comfortabele stoelen.&nbsp;</p>\r\n<p>Bij binnenkomst is de trap die diagonaal door het gebouw loopt, de eerste blikvanger. Kinepolis Almere is sinds november 2017 verbouwd om meer aan te sluiten bij de look-and-feel van Kinepolis. Dit betekent dat alle zetels zijn vernieuwd,&nbsp; dat er automatische ticket machines (ATMs) op de trap zijn geplaatst en er een volledige nieuwe shop met een ruimer assortiment is gekomen.</p>', ''),
(7, 'beheer', 3, 'Kinepolis Den Helder', '<p>Kinepolis Den Helder opende in 2003 haar deuren in gebouw 51 op Willemsoord, de voormalige scheeps- en onderhoudswerf voor de Koninklijke Marine.</p>\r\n<p>Verschillende details van de Oude Rijkswerf zijn intact gelaten; twee van de zalen zijn nieuw tegen de Scheepswerkerplaats aangebouwd.</p>\r\n<p>De bioscoop in de kop van Noord-Holland heeft in totaal 6 moderne bioscoopzalen en 776 stoelen.</p>', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `diensten`
--

CREATE TABLE `diensten` (
  `dienstID` int(11) NOT NULL,
  `dienst` text,
  `tarief` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `diensten`
--

INSERT INTO `diensten` (`dienstID`, `dienst`, `tarief`) VALUES
(1, 'Kinderen GamePlayParty\r\n', '€20,00'),
(2, 'GamePlayParty\r\n', '€25,00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `info_dienst`
--

CREATE TABLE `info_dienst` (
  `reserveringsID` int(11) DEFAULT NULL,
  `dienstID` int(11) DEFAULT NULL,
  `aantal` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `klantID` int(11) NOT NULL,
  `klantnaam` text,
  `klant adres` text,
  `klant postcode` text,
  `klant provincie` text,
  `klant telefoon` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringen`
--

CREATE TABLE `reserveringen` (
  `reserveringsID` int(11) NOT NULL,
  `biosID` int(11) DEFAULT NULL,
  `klantID` int(11) DEFAULT NULL,
  `reserveringsdatum` date DEFAULT NULL,
  `reservering_begin_tijd` time DEFAULT NULL,
  `reservering_eind_tijd` time NOT NULL,
  `zaal_id` int(11) NOT NULL,
  `console_id` int(11) NOT NULL,
  `reeds voldaan` text,
  `nog  te voldoen` text,
  `betalingen` text,
  `gereserveerd` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `reserveringen`
--

INSERT INTO `reserveringen` (`reserveringsID`, `biosID`, `klantID`, `reserveringsdatum`, `reservering_begin_tijd`, `reservering_eind_tijd`, `zaal_id`, `console_id`, `reeds voldaan`, `nog  te voldoen`, `betalingen`, `gereserveerd`) VALUES
(1, 1, NULL, '2019-10-31', '11:28:00', '16:00:00', 1, 1, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `wachtwoord` longtext NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `wachtwoord`, `rol`) VALUES
(1, 'jjoonjjoon', 'jimmyqsaid@gmail.com', '123456789', 0),
(2, 'lazyduck408', 'jack.jones@gameplayparty.nl', 'jokers', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `zalen`
--

CREATE TABLE `zalen` (
  `zaal_id` int(11) NOT NULL,
  `bios_id` int(11) NOT NULL,
  `zaal` int(11) NOT NULL,
  `aantal_stoelen` int(11) NOT NULL,
  `rolstoelplaatsen` int(11) NOT NULL,
  `schermgrootte` varchar(255) NOT NULL,
  `faciliteiten` varchar(255) NOT NULL,
  `versies` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `zalen`
--

INSERT INTO `zalen` (`zaal_id`, `bios_id`, `zaal`, `aantal_stoelen`, `rolstoelplaatsen`, `schermgrootte`, `faciliteiten`, `versies`) VALUES
(1, 1, 1, 102, 2, '11.20m x 4.68m', 'toegankelijk voor andersvaliden', 'Laser\r\nDolby 7.1');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bioscopen`
--
ALTER TABLE `bioscopen`
  ADD PRIMARY KEY (`biosID`);

--
-- Indexen voor tabel `consoles`
--
ALTER TABLE `consoles`
  ADD PRIMARY KEY (`console_id`);

--
-- Indexen voor tabel `contentmanagement`
--
ALTER TABLE `contentmanagement`
  ADD PRIMARY KEY (`paginaID`),
  ADD KEY `biosID` (`biosID`);

--
-- Indexen voor tabel `diensten`
--
ALTER TABLE `diensten`
  ADD PRIMARY KEY (`dienstID`);

--
-- Indexen voor tabel `info_dienst`
--
ALTER TABLE `info_dienst`
  ADD KEY `FK` (`reserveringsID`,`dienstID`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klantID`);

--
-- Indexen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`reserveringsID`),
  ADD KEY `FK` (`biosID`,`klantID`),
  ADD KEY `klantID` (`klantID`),
  ADD KEY `zaal` (`zaal_id`),
  ADD KEY `console_id` (`console_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexen voor tabel `zalen`
--
ALTER TABLE `zalen`
  ADD PRIMARY KEY (`zaal_id`),
  ADD KEY `bios_id` (`bios_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `consoles`
--
ALTER TABLE `consoles`
  MODIFY `console_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `contentmanagement`
--
ALTER TABLE `contentmanagement`
  MODIFY `paginaID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `reserveringsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `zalen`
--
ALTER TABLE `zalen`
  MODIFY `zaal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `contentmanagement`
--
ALTER TABLE `contentmanagement`
  ADD CONSTRAINT `contentmanagement_ibfk_1` FOREIGN KEY (`biosID`) REFERENCES `bioscopen` (`biosID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD CONSTRAINT `reserveringen_ibfk_1` FOREIGN KEY (`klantID`) REFERENCES `klanten` (`klantID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserveringen_ibfk_2` FOREIGN KEY (`biosID`) REFERENCES `bioscopen` (`biosID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserveringen_ibfk_3` FOREIGN KEY (`zaal_id`) REFERENCES `zalen` (`zaal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserveringen_ibfk_4` FOREIGN KEY (`console_id`) REFERENCES `consoles` (`console_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `zalen`
--
ALTER TABLE `zalen`
  ADD CONSTRAINT `zalen_ibfk_1` FOREIGN KEY (`bios_id`) REFERENCES `bioscopen` (`biosID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
