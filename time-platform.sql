-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Gen 13, 2016 alle 14:12
-- Versione del server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `time-platform`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Matricola` int(4) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(35) NOT NULL,
  `Cf` varchar(16) NOT NULL,
  `Tel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `admin`
--

INSERT INTO `admin` (`Matricola`, `Password`, `Nome`, `Cognome`, `Cf`, `Tel`) VALUES
(1750, '12', 'mario', 'rossi', 'hc89c02b3yt0bth7', 2147483647);

-- --------------------------------------------------------

--
-- Struttura della tabella `autisti`
--

CREATE TABLE IF NOT EXISTS `autisti` (
  `Matricola` int(4) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(35) NOT NULL,
  `Cf` varchar(16) NOT NULL,
  `Cellulare` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `autisti`
--

INSERT INTO `autisti` (`Matricola`, `Password`, `Nome`, `Cognome`, `Cf`, `Cellulare`) VALUES
(1648, '123', 'pierino', 'bo', 'hu43ht28u5nch7tn', 675423),
(1655, '345', 'osvaldo', 'pagliaccietti', 'ht4uv289tn7598n7', 74238955);

-- --------------------------------------------------------

--
-- Struttura della tabella `avvisomalattia`
--

CREATE TABLE IF NOT EXISTS `avvisomalattia` (
`id` int(11) NOT NULL,
  `Data` varchar(30) NOT NULL,
  `Descrizione` varchar(100) NOT NULL,
  `MatricolaAut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `capofabbrica`
--

CREATE TABLE IF NOT EXISTS `capofabbrica` (
  `Matricola` int(4) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(35) NOT NULL,
  `Cf` varchar(16) NOT NULL,
  `Tel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `capofabbrica`
--

INSERT INTO `capofabbrica` (`Matricola`, `Password`, `Nome`, `Cognome`, `Cf`, `Tel`) VALUES
(1850, '123', 'Mariano', 'gay', 'nfuir3nfup9n3u9g', 2436532);

-- --------------------------------------------------------

--
-- Struttura della tabella `linee`
--

CREATE TABLE IF NOT EXISTS `linee` (
  `Linea` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `linee`
--

INSERT INTO `linee` (`Linea`) VALUES
('m33'),
('m5150');

-- --------------------------------------------------------

--
-- Struttura della tabella `rclinea`
--

CREATE TABLE IF NOT EXISTS `rclinea` (
  `id` int(5) NOT NULL,
  `descrizione` varchar(100) DEFAULT NULL,
  `Linea` varchar(5) DEFAULT NULL,
  `matricolaAut` int(4) NOT NULL,
  `idturno` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `rcorario`
--

CREATE TABLE IF NOT EXISTS `rcorario` (
  `id` int(5) NOT NULL,
  `descrizione` varchar(100) DEFAULT NULL,
  `oraInizio` time(6) DEFAULT NULL,
  `oraFine` time(6) DEFAULT NULL,
  `matricolaAut` int(4) NOT NULL,
  `idturno` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `rcturno`
--

CREATE TABLE IF NOT EXISTS `rcturno` (
  `id` int(5) NOT NULL,
  `descrizione` varchar(100) DEFAULT NULL,
  `oraInizio` time(6) DEFAULT NULL,
  `oraFine` time(6) DEFAULT NULL,
  `matricolaAut` int(4) NOT NULL,
  `idturno` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `rferie`
--

CREATE TABLE IF NOT EXISTS `rferie` (
  `id` int(5) NOT NULL,
  `dataInizio` date DEFAULT NULL,
  `dataFine` date DEFAULT NULL,
  `matricolaAut` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `rsos`
--

CREATE TABLE IF NOT EXISTS `rsos` (
  `id` int(5) NOT NULL,
  `descrizione` varchar(100) DEFAULT NULL,
  `datiGPS` varchar(50) DEFAULT NULL,
  `matricolaAut` int(4) NOT NULL,
  `CapoFabbricaMatricola` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `rstraordinario`
--

CREATE TABLE IF NOT EXISTS `rstraordinario` (
  `id` int(5) NOT NULL,
  `oraInizio` time(6) DEFAULT NULL,
  `oraFine` time(6) DEFAULT NULL,
  `matricolaAut` int(4) NOT NULL,
  `Data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
`id` int(5) NOT NULL,
  `start` varchar(30) NOT NULL,
  `end` varchar(30) NOT NULL,
  `idLinea` varchar(5) NOT NULL,
  `MatricolaAut` int(11) NOT NULL,
  `AdminMatricola` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `turno`
--

INSERT INTO `turno` (`id`, `start`, `end`, `idLinea`, `MatricolaAut`, `AdminMatricola`, `title`) VALUES
(2, '2015-12-02T09:30:00+02:00', '2015-12-02T10:30:00+02:00', 'm33', 1648, 1750, 'Linea m33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`Matricola`);

--
-- Indexes for table `autisti`
--
ALTER TABLE `autisti`
 ADD PRIMARY KEY (`Matricola`);

--
-- Indexes for table `avvisomalattia`
--
ALTER TABLE `avvisomalattia`
 ADD PRIMARY KEY (`id`), ADD KEY `MatricolaAut` (`MatricolaAut`);

--
-- Indexes for table `capofabbrica`
--
ALTER TABLE `capofabbrica`
 ADD PRIMARY KEY (`Matricola`);

--
-- Indexes for table `linee`
--
ALTER TABLE `linee`
 ADD PRIMARY KEY (`Linea`);

--
-- Indexes for table `rclinea`
--
ALTER TABLE `rclinea`
 ADD PRIMARY KEY (`id`), ADD KEY `matricolaAut` (`matricolaAut`), ADD KEY `idturno` (`idturno`);

--
-- Indexes for table `rcorario`
--
ALTER TABLE `rcorario`
 ADD PRIMARY KEY (`id`), ADD KEY `matricolaAut` (`matricolaAut`), ADD KEY `idturno` (`idturno`);

--
-- Indexes for table `rcturno`
--
ALTER TABLE `rcturno`
 ADD PRIMARY KEY (`id`), ADD KEY `matricolaAut` (`matricolaAut`), ADD KEY `idturno` (`idturno`);

--
-- Indexes for table `rferie`
--
ALTER TABLE `rferie`
 ADD PRIMARY KEY (`id`), ADD KEY `matricolaAut` (`matricolaAut`);

--
-- Indexes for table `rsos`
--
ALTER TABLE `rsos`
 ADD PRIMARY KEY (`id`), ADD KEY `matricolaAut` (`matricolaAut`), ADD KEY `CapoFabbricaMatricola` (`CapoFabbricaMatricola`);

--
-- Indexes for table `rstraordinario`
--
ALTER TABLE `rstraordinario`
 ADD PRIMARY KEY (`id`), ADD KEY `matricolaAut` (`matricolaAut`);

--
-- Indexes for table `turno`
--
ALTER TABLE `turno`
 ADD PRIMARY KEY (`id`), ADD KEY `idLinea` (`idLinea`), ADD KEY `MatricolaAut` (`MatricolaAut`), ADD KEY `AdminMatricola` (`AdminMatricola`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avvisomalattia`
--
ALTER TABLE `avvisomalattia`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `turno`
--
ALTER TABLE `turno`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `avvisomalattia`
--
ALTER TABLE `avvisomalattia`
ADD CONSTRAINT `avvisomalattia_ibfk_1` FOREIGN KEY (`MatricolaAut`) REFERENCES `autisti` (`Matricola`);

--
-- Limiti per la tabella `rclinea`
--
ALTER TABLE `rclinea`
ADD CONSTRAINT `rclinea_ibfk_1` FOREIGN KEY (`matricolaAut`) REFERENCES `autisti` (`Matricola`),
ADD CONSTRAINT `rclinea_ibfk_2` FOREIGN KEY (`idturno`) REFERENCES `turni` (`id`);

--
-- Limiti per la tabella `rcorario`
--
ALTER TABLE `rcorario`
ADD CONSTRAINT `rcorario_ibfk_1` FOREIGN KEY (`matricolaAut`) REFERENCES `autisti` (`Matricola`),
ADD CONSTRAINT `rcorario_ibfk_2` FOREIGN KEY (`idturno`) REFERENCES `turni` (`id`);

--
-- Limiti per la tabella `rcturno`
--
ALTER TABLE `rcturno`
ADD CONSTRAINT `rcturno_ibfk_1` FOREIGN KEY (`matricolaAut`) REFERENCES `autisti` (`Matricola`),
ADD CONSTRAINT `rcturno_ibfk_2` FOREIGN KEY (`idturno`) REFERENCES `turni` (`id`);

--
-- Limiti per la tabella `rferie`
--
ALTER TABLE `rferie`
ADD CONSTRAINT `rferie_ibfk_1` FOREIGN KEY (`matricolaAut`) REFERENCES `autisti` (`Matricola`);

--
-- Limiti per la tabella `rsos`
--
ALTER TABLE `rsos`
ADD CONSTRAINT `rsos_ibfk_1` FOREIGN KEY (`matricolaAut`) REFERENCES `autisti` (`Matricola`),
ADD CONSTRAINT `rsos_ibfk_2` FOREIGN KEY (`CapoFabbricaMatricola`) REFERENCES `capofabbrica` (`Matricola`);

--
-- Limiti per la tabella `rstraordinario`
--
ALTER TABLE `rstraordinario`
ADD CONSTRAINT `rstraordinario_ibfk_1` FOREIGN KEY (`matricolaAut`) REFERENCES `autisti` (`Matricola`);

--
-- Limiti per la tabella `turno`
--
ALTER TABLE `turno`
ADD CONSTRAINT `turno_ibfk_1` FOREIGN KEY (`idLinea`) REFERENCES `linee` (`Linea`),
ADD CONSTRAINT `turno_ibfk_2` FOREIGN KEY (`MatricolaAut`) REFERENCES `autisti` (`Matricola`),
ADD CONSTRAINT `turno_ibfk_3` FOREIGN KEY (`AdminMatricola`) REFERENCES `admin` (`Matricola`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
