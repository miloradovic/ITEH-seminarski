-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2020 at 02:48 PM
-- Server version: 5.7.29
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminarski`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(6) NOT NULL,
  `ime_prezime` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifra` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_uloga` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime_prezime`, `email`, `sifra`, `id_uloga`) VALUES
(1, 'Darko Miloradovic', 'darko@gmail.com', 'darko', 1),
(2, 'Drago Milic', 'drago@gmail.com', 'drago', 1),
(3, 'Bane Avramovic', 'bane.avramovic@gmail.com', 'bane', 2),
(4, 'Teodora Acimov', 'teodora.acimov@gmail.com', 'teodora', 2),
(5, 'Momcilo Bogojevic', 'momcilo.bogojevic@gmail.com', 'momcilo', 2),
(6, 'Jovan Bubonja', 'jovan.bubonja@gmail.com', 'jovan', 2),
(7, 'Katarina Bradic', 'katarina.bradic@gmail.com', 'katarina', 2),
(8, 'Dusan Vasic', 'dusan.vasic@gmail.com', 'dusan', 2),
(9, 'Dragana Vincic', 'dragana.vincic@yahoo.com', 'dragana', 2),
(10, 'Vanja Vlahovic', 'vanja.vlahovic@gmail.com', 'vanja', 2),
(11, 'Pavle Vojvodic', 'pavle.vojvodic@hotmail.com', 'pavle', 2),
(12, 'Milica Vulic', 'milica.vulic@gmail.com', 'milica', 2),
(13, 'Stanka Vucetic', 'stanka.vucetic@gmail.com', 'stanka', 2),
(14, 'Filip Gligorijevic', 'filip.gligorijevic@gmail.com', 'filip', 2),
(15, 'Lazar Dimitrijevic', 'lazar.dimitrijevic@gmail.com', 'lazar', 2),
(16, 'Tijana Drobnjak', 'tijana.drobnjak@gmail.com', 'tijana', 2),
(17, 'Mirko Djuric', 'mirko.d@gmail.com', 'mirko', 2),
(18, 'Jovana Eric', 'jovana.eric@gmail.com', 'jovana', 2),
(19, 'Dragan Jaksic', 'dragan.jaksic@gmail.com', 'dragan', 2),
(20, 'Nikola Jokic', 'nikola.jokic@gmail.com', 'nikola', 2),
(21, 'Petar Joksimovic', 'petar.joksimovic@gmail.com', 'petar', 2),
(22, 'Marko Katic', 'marko.katic@outlook.com', 'marko', 2),
(23, 'Aleksa Lazic', 'aleksa.lazic@gmail.com', 'aleksa', 2),
(24, 'Bojan Lalic', 'bojan.lalic@gmail.com', 'bojan', 2),
(25, 'Nikola Madic', 'nikola.madic@gmail.com', 'nikola', 2),
(26, 'Nemanja Mandic', 'nemanja.mandic@gmail.com', 'nemanja', 2),
(27, 'Milos Markovic', 'milos.markovic@gmai.com', 'milos', 2),
(28, 'Monika Milenkovic', 'monika.milenkovic@gmail.com', 'monika', 2),
(29, 'Veljko Milosevic', 'veljko.m@gmail.com', 'veljko', 2),
(30, 'Dalibor Mitic', 'dalibor.mitic@gmail.com', 'dalibor', 2),
(31, 'Blagoje Stevic', 'blagoje.stevic@gmail.com', 'blagoje', 2),
(32, 'Boban Pajic', 'boban.pajic@gmail.com', 'boban', 2),
(33, 'Biljana Peric', 'biljana.peric@gmail.com', 'biljana', 2),
(34, 'Stefan Radovic', 'stefan.radovic@gmail.com', 'stefan', 2),
(35, 'Sergej Savic', 'sergej.savic@gmail.com', 'sergej', 2),
(36, 'Vuk Stefanovic', 'vuk.stefanovic@gmail.com', 'vuk', 2),
(37, 'Kristina Stupar', 'kristina.stupar@gmail.com', 'kristina', 2),
(38, 'Ivan Filipovic', 'ivan.filipovic@gmail.com', 'ivan', 2),
(39, 'Milutin Mrkonjic', 'mrka@gmail.com', 'mrka', 2),
(40, 'Tihomir Stojkovic', 'tika.spic@gmail.com', 'tika', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tablica`
--

CREATE TABLE `tablica` (
  `id` int(6) NOT NULL,
  `id_vlasnik` int(6) NOT NULL,
  `id_kontrolor` int(6) NOT NULL,
  `id_vozilo` int(6) NOT NULL,
  `tablica` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `cena` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tablica`
--

INSERT INTO `tablica` (`id`, `id_vlasnik`, `id_kontrolor`, `id_vozilo`, `tablica`, `datum`, `cena`) VALUES
(1, 32, 1, 42, 'NS-351-SA', '2020-06-09', 2631),
(2, 33, 1, 19, 'BG-001-SA', '2020-06-18', 2193),
(3, 9, 1, 5, 'BG-001-DF', '2020-06-18', 2193),
(4, 30, 2, 44, 'BG-003-JK', '2020-04-18', 2193),
(5, 19, 2, 50, 'BG-003-JM', '2020-06-18', 2193),
(6, 19, 2, 50, 'BG-003-JM', '2020-06-18', 2193),
(7, 7, 2, 11, 'BG-003-JP', '2020-06-18', 2193),
(8, 7, 2, 11, 'BG-003-JP', '2020-06-18', 2193),
(9, 7, 2, 11, 'BG-003-JP', '2020-06-18', 2193),
(10, 3, 1, 6, 'BG-002-DD', '2020-06-18', 2193),
(11, 22, 1, 8, 'BG-002-DA', '2020-06-18', 2193),
(12, 22, 1, 8, 'BG-002-DA', '2020-06-18', 2193),
(13, 22, 1, 14, 'BG-002-DE', '2020-06-18', 2193),
(14, 22, 1, 14, 'BG-020-DE', '2020-06-18', 2193),
(15, 22, 1, 14, 'BG-002-DE', '2020-06-18', 2193),
(16, 18, 1, 41, 'BG-002-DO', '2020-06-18', 2193),
(17, 18, 1, 41, 'BG-002-DO', '2020-06-18', 2193),
(18, 18, 1, 41, 'BG-002-DO', '2020-06-18', 2193),
(19, 18, 1, 41, 'BG-002-DO', '2020-05-18', 2193),
(20, 11, 1, 26, 'BG-002-DI', '2020-06-18', 2193),
(21, 11, 1, 26, 'BG-002-DI', '2020-06-18', 2193),
(22, 11, 1, 26, 'BG-002-DI', '2020-06-18', 2193),
(23, 11, 1, 26, 'BG-002-DI', '2020-06-18', 2193),
(24, 11, 1, 26, 'BG-002-DI', '2020-06-18', 2193),
(25, 39, 1, 15, 'BG-002-PS', '2020-06-18', 87532),
(26, 39, 1, 15, 'BG-002-PS', '2018-01-18', 87532),
(27, 39, 1, 15, 'BG-002-PS', '2019-01-18', 87532),
(28, 39, 1, 15, 'BG-002-PS', '2020-06-18', 87532),
(29, 39, 1, 15, 'BG-002-PS', '2020-09-18', 87532),
(30, 39, 1, 15, 'BG-002-PS', '2020-06-18', 87532),
(31, 35, 1, 49, 'BG-002-SP', '2020-06-18', 2193),
(32, 35, 1, 49, 'BG-002-SP', '2020-06-18', 2193),
(33, 35, 1, 49, 'BG-002-SP', '2020-06-18', 2193),
(34, 35, 1, 49, 'BG-002-SP', '2020-06-18', 2193),
(35, 35, 1, 49, 'BG-002-SP', '2020-06-18', 2193),
(36, 35, 1, 49, 'BG-002-SP', '2020-06-18', 2193),
(37, 35, 1, 49, 'BG-002-SP', '2020-06-18', 2193),
(38, 32, 1, 4, 'NS-002-SP', '2020-06-18', 2193),
(39, 32, 1, 4, 'NS-002-SP', '2020-06-18', 2193),
(40, 32, 1, 4, 'NS-002-SP', '2020-06-18', 2193),
(41, 32, 1, 4, 'NS-002-SP', '2020-06-18', 2193),
(42, 32, 1, 4, 'NS-002-SP', '2020-06-18', 2193),
(43, 32, 1, 4, 'NS-002-SP', '2020-06-18', 2193),
(44, 32, 1, 4, 'NS-002-SP', '2020-06-18', 2193),
(45, 32, 1, 4, 'NS-002-SP', '2020-06-18', 2193),
(46, 32, 1, 3, 'NS-002-SE', '2020-06-18', 2193),
(47, 32, 1, 3, 'NS-002-SE', '2020-06-18', 2193),
(48, 32, 1, 3, 'NS-002-SE', '2020-06-18', 2193),
(49, 32, 1, 3, 'NS-002-SE', '2020-06-18', 2193),
(50, 32, 1, 3, 'NS-002-SE', '2020-06-18', 2193),
(51, 32, 1, 3, 'NS-002-SE', '2020-02-18', 2193),
(52, 32, 1, 3, 'NS-002-SE', '2019-06-18', 2193),
(53, 32, 1, 3, 'NS-002-SE', '2020-06-18', 2193),
(54, 32, 1, 3, 'NS-002-SE', '2020-06-18', 2193),
(55, 32, 1, 45, 'NS-002-SI', '2020-06-18', 2193),
(56, 32, 1, 45, 'NS-002-SI', '2020-06-18', 2193),
(57, 32, 1, 45, 'NS-002-SI', '2020-06-18', 2193),
(58, 32, 1, 45, 'NS-002-SI', '2020-06-18', 2193),
(59, 32, 1, 45, 'NS-002-SI', '2020-06-18', 2193),
(60, 32, 1, 45, 'NS-002-SI', '2020-06-18', 2193),
(61, 32, 1, 45, 'NS-002-SI', '2020-06-18', 2193),
(62, 32, 1, 45, 'NS-002-SI', '2020-06-18', 2193),
(63, 32, 1, 45, 'NS-002-SI', '2019-06-18', 2193),
(64, 32, 1, 45, 'NS-002-SI', '2020-06-18', 2193),
(66, 32, 1, 18, 'NS-002-EE', '2020-06-18', 2193),
(68, 32, 1, 18, 'NS-002-EE', '2020-06-18', 2193),
(70, 32, 1, 18, 'NS-002-EE', '2020-06-18', 2193),
(72, 32, 1, 18, 'NS-002-EE', '2020-06-18', 2193),
(73, 32, 1, 18, 'NS-002-EE', '2018-06-18', 2193),
(74, 32, 1, 18, 'NS-002-EE', '2019-06-18', 2193),
(75, 6, 1, 9, 'JA-023-TX', '2020-06-19', 2193);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id` int(6) NOT NULL,
  `naziv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id`, `naziv`) VALUES
(1, 'kontrolor'),
(2, 'vlasnik'),
(3, 'pravnik');

-- --------------------------------------------------------

--
-- Table structure for table `vozilo`
--

CREATE TABLE `vozilo` (
  `id` int(6) NOT NULL,
  `marka` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vozilo`
--

INSERT INTO `vozilo` (`id`, `marka`, `model`) VALUES
(1, 'VW', 'Golf'),
(2, 'VW', 'Polo'),
(3, 'Skoda', 'Superb'),
(4, 'Skoda', 'Octavia'),
(5, 'Audi', 'A4'),
(6, 'Audi', 'A6'),
(7, 'Audi', 'A8'),
(8, 'Audi', 'Q5'),
(9, 'Audi', 'Q7'),
(10, 'Audi', 'Q8'),
(11, 'Mercedes', 'A Class'),
(12, 'Mercedes', 'B Class'),
(13, 'Mercedes', 'C Class'),
(14, 'Mercedes', 'E Class'),
(15, 'Mercedes', 'S Class'),
(16, 'Mazda', '2'),
(17, 'Mazda', '3'),
(18, 'Mazda', '6'),
(19, 'Ford', 'Ka'),
(20, 'Ford', 'Fiesta'),
(21, 'Ford', 'Focus'),
(22, 'Ford', 'Mondeo'),
(23, 'Ford', 'Ranger'),
(24, 'Toyota', 'Yaris'),
(25, 'Toyota', 'Corolla'),
(26, 'Toyota', 'Camry'),
(27, 'Toyota', 'CHR'),
(28, 'Toyota', 'RAV4'),
(29, 'Toyota', 'Hilux'),
(30, 'Toyota', 'Highlander'),
(31, 'VW', 'Up!'),
(32, 'VW', 'Passat'),
(33, 'VW', 'Jetta'),
(34, 'VW', 'Arteon'),
(35, 'VW', 'T-Cross'),
(36, 'VW', 'T-Roc'),
(37, 'VW', 'Tiguan'),
(38, 'VW', 'Touran'),
(39, 'VW', 'Touareg'),
(40, 'Skoda', 'Fabia'),
(41, 'Skoda', 'Scala'),
(42, 'Skoda', 'Rapid'),
(43, 'Skoda', 'CitiGo'),
(44, 'Skoda', 'Karoq'),
(45, 'Skoda', 'Kamiq'),
(46, 'Skoda', 'Kodiaq'),
(47, 'VW', 'Amarok'),
(48, 'Honda', 'Civic'),
(49, 'Honda', 'Accord'),
(50, 'Honda', 'HRV'),
(51, 'Honda', 'CRV');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `uloga_fk` (`id_uloga`);

--
-- Indexes for table `tablica`
--
ALTER TABLE `tablica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kontrolor_fk` (`id_kontrolor`),
  ADD KEY `vlasnik_fk` (`id_vlasnik`),
  ADD KEY `vozilo_fk` (`id_vozilo`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tablica`
--
ALTER TABLE `tablica`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vozilo`
--
ALTER TABLE `vozilo`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `uloga_fk` FOREIGN KEY (`id_uloga`) REFERENCES `uloga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tablica`
--
ALTER TABLE `tablica`
  ADD CONSTRAINT `kontrolor_fk` FOREIGN KEY (`id_kontrolor`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `vlasnik_fk` FOREIGN KEY (`id_vlasnik`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `vozilo_fk` FOREIGN KEY (`id_vozilo`) REFERENCES `vozilo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
