-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2021 at 07:55 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liquidhug`
--

-- --------------------------------------------------------

--
-- Table structure for table `mesajecontact`
--

CREATE TABLE `mesajecontact` (
  `idmesaj` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mesaj` varchar(300) NOT NULL,
  `subiect` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mesajecontact`
--

INSERT INTO `mesajecontact` (`idmesaj`, `nume`, `email`, `mesaj`, `subiect`) VALUES
(1, 'Bacila Dan', 'test@gmail.com', 'Mesajul Meu', 'Livrare');

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `idprodus` int(11) NOT NULL,
  `denumire` varchar(25) NOT NULL,
  `imagine` varchar(300) NOT NULL,
  `descriere` varchar(200) NOT NULL,
  `pret` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`idprodus`, `denumire`, `imagine`, `descriere`, `pret`) VALUES
(14, 'Home Blend', './imaginiproduse/home.jpeg', 'Home Blend Clasic', '25'),
(15, 'Sacred Blend', './imaginiproduse/sacred.jpeg', 'Sacred Blend Clasic', '25'),
(16, 'Coffee Passion', './imaginiproduse/passion.jpeg', 'Profil aromatic Passion Fruit', '50'),
(17, 'Winter Blend', './imaginiproduse/winter.jpeg', 'Gust fin de portocale', '30'),
(18, 'Ethiopia', './imaginiproduse/ethiopia.jpeg', 'Note puternice de ciocolata neagra', '30'),
(19, 'Guatemala', './imaginiproduse/guatemala.jpeg', 'Note fine de ciocolata alba', '30'),
(20, 'Amaretto', './imaginiproduse/amaretto.jpeg', 'Gust clasic amar', '45'),
(21, 'Hawaiian Blend', './imaginiproduse/hawaiian.jpeg', 'Note tropicale', '30'),
(22, 'Organic Peru', './imaginiproduse/organic.jpeg', 'Note fine de menta', '45'),
(23, 'Costa Rica', './imaginiproduse/costarica.jpeg', 'Gust puternic de lichior', '45'),
(24, 'Dark', './imaginiproduse/dark.jpeg', 'Aroma puternica de ciocolata neagra si nuci', '45'),
(26, 'Rapper\'s Delight', './imaginiproduse/rappers.jpeg', 'Tente fine de tutun', '90'),
(27, 'Off the dome', './imaginiproduse/offthedome.jpeg', 'Acest blend este o surpriza', '90'),
(28, 'Freestyle', './imaginiproduse/freestyle.jpeg', 'Amestecul perfect pentru cafea Americano', '30'),
(29, 'Brazil', './imaginiproduse/brazil.jpeg', 'Note dulci si amarui', '45'),
(30, 'Coconut', './imaginiproduse/coconut.jpeg', 'Note puternice de cocos si lapte', '45'),
(31, 'Strawberry', './imaginiproduse/strawberry.jpeg', 'Note fine de capsuni', '45'),
(32, 'Summer Blend', './imaginiproduse/summer.jpeg', 'Note de fructe proaspete', '45'),
(33, 'Lemon Haze', './imaginiproduse/lemonhaze.jpeg', 'Note puternice de citrice', '80'),
(34, 'OG Kush', './imaginiproduse/ogkush.jpeg', 'Amestecul nostru preferat', '90');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_products`
--

CREATE TABLE `purchased_products` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE `utilizatori` (
  `idutilizator` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `parola` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`idutilizator`, `nume`, `prenume`, `email`, `telefon`, `parola`) VALUES
(1, 'Dan', 'Bacila', 'baciladan0@gmail.com', '0726275662', '$2y$10$uHZ4vwoLsnSfzCK.TOTK8eH6LWeKt9MX0FPwmZnd6Kl8bunQSVAt6'),
(2, 'Razvan', 'Bacila', 'bacilarazvan0@gmail.com', '0726275663', '$2y$10$eCwhbbs6sZnOKcTTkjDZSuYhctOtMirsLlZuCiTvx5p8iuvnbMnb2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mesajecontact`
--
ALTER TABLE `mesajecontact`
  ADD PRIMARY KEY (`idmesaj`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`idprodus`);

--
-- Indexes for table `purchased_products`
--
ALTER TABLE `purchased_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`idutilizator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mesajecontact`
--
ALTER TABLE `mesajecontact`
  MODIFY `idmesaj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `idprodus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `purchased_products`
--
ALTER TABLE `purchased_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `idutilizator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
