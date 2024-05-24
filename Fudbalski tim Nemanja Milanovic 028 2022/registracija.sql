-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 04:34 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registracija`
--
ALTER TABLE `registracija`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registracija`
--
ALTER TABLE `registracija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
