-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 04:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fudbalski_tim`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `godina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `naslov`, `autor`, `godina`) VALUES
(1, 'Knjiga1', 'Autor1', 1999);

-- --------------------------------------------------------

--
-- Table structure for table `igraci`
--

CREATE TABLE `igraci` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `id_tima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `igraci`
--

INSERT INTO `igraci` (`id`, `ime`, `prezime`, `id_tima`) VALUES
(4, 'Petarr', 'Petrovic', 1),
(5, 'Pavle', 'Pavlovic', 2);

-- --------------------------------------------------------

--
-- Table structure for table `registracija`
--

CREATE TABLE `registracija` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `sifra` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registracija`
--

INSERT INTO `registracija` (`id`, `ime`, `prezime`, `sifra`, `username`) VALUES
(1, 'mika', 'mikic', 'sifra123', 'mikam'),
(2, 'wadwa', 'dwa', 'dwawa', 'wwa'),
(4, 'peric', 'peric', 'peric', 'pera'),
(5, 'ddd', 'ddd', 'ddd', 'ddd'),
(6, '2eq2qe', '2eqe2q', '2eq2qe', 'qe2qe2'),
(7, 'adsasd', 'asdsad', 'asdads', 'asd12'),
(8, 'adsasd', 'asdsad', 'asdads', 'asd12'),
(9, 'asd', 'asdads', 'asdsad', 'asd12'),
(10, 'asdfghj', 'asdfghj', 'asdfghj', 'asdfghj'),
(11, 'qwer', 'qwer', 'qwer', 'qwer'),
(12, 'daw', 'adw', 'adw', 'wad'),
(13, 'kk', 'kk', 'k', 'jjj'),
(14, 'iyu', 'yi', 'iy', 'yui');

-- --------------------------------------------------------

--
-- Table structure for table `timovi`
--

CREATE TABLE `timovi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `grad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timovi`
--

INSERT INTO `timovi` (`id`, `naziv`, `grad`) VALUES
(1, 'Partizan', 'Beograd'),
(3, 'Radnicki', 'Kragujevac'),
(4, 'Crvena zvezda', 'Beograd'),
(5, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transferi`
--

CREATE TABLE `transferi` (
  `id` int(11) NOT NULL,
  `id_igraca` int(11) NOT NULL,
  `id_tima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utakmice`
--

CREATE TABLE `utakmice` (
  `id` int(11) NOT NULL,
  `id_tima_1` int(11) NOT NULL,
  `id_tima_2` int(11) NOT NULL,
  `golovi_1` int(11) NOT NULL,
  `golovi_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utakmice`
--

INSERT INTO `utakmice` (`id`, `id_tima_1`, `id_tima_2`, `golovi_1`, `golovi_2`) VALUES
(1, 1, 4, 3, 3),
(2, 4, 1, 1, 1),
(7, 1, 4, 11, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `igraci`
--
ALTER TABLE `igraci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registracija`
--
ALTER TABLE `registracija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timovi`
--
ALTER TABLE `timovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utakmice`
--
ALTER TABLE `utakmice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `igraci`
--
ALTER TABLE `igraci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registracija`
--
ALTER TABLE `registracija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `timovi`
--
ALTER TABLE `timovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utakmice`
--
ALTER TABLE `utakmice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
