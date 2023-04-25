-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Kwi 2023, 11:26
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id_gitary` int(11) NOT NULL,
  `tytul` text COLLATE utf8_polish_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `grafika` text COLLATE utf8_polish_ci NOT NULL,
  `ilosc` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `koszyk`
--

INSERT INTO `koszyk` (`id_gitary`, `tytul`, `cena`, `grafika`, `ilosc`, `email`) VALUES
(24, 'Jackson RRX24', 3499, 'https://images.static-thomann.de/pics/bdb/458254/18059057_800.jpg', 1, 'admin@admin'),
(25, 'ESP LTD MH-100', 1179, 'https://images.static-thomann.de/pics/bdb/431911/17812318_800.jpg', 1, 'admin@admin'),
(36, 'ESP LTD MH-100', 1179, 'https://images.static-thomann.de/pics/bdb/431911/17812318_800.jpg', 1, 'admin@admin.pl'),
(37, 'Fender CD-60SCE Blk WN', 1255, 'https://images.static-thomann.de/pics/bdb/447683/17585645_800.jpg', 4, 'admin@admin.pl'),
(38, 'Epiphone Slash Les Paul Appetite Burst', 2799, 'https://images.static-thomann.de/pics/bdb/518602/16635131_800.jpg', 1, 'admin@admin.pl'),
(39, 'Jackson RRX24', 3666, 'https://images.static-thomann.de/pics/bdb/473110/14556828_800.jpg', 2, 'test@pl'),
(40, 'Takamine P3FCN', 5699, 'https://images.static-thomann.de/pics/bdb/295067/8007952_800.jpg', 1, 'test@pl'),
(41, 'ESP Snakebyte BLKS James Hetfield', 25590, 'https://images.static-thomann.de/pics/bdb/392913/11733785_800.jpg', 1, 'test@pl'),
(42, 'Cordoba GK Studio', 2999, 'https://images.static-thomann.de/pics/bdb/290001/8343779_800.jpg', 1, 'test@pl'),
(43, 'ESP LTD MH-100', 1179, 'https://images.static-thomann.de/pics/bdb/431911/17812318_800.jpg', 1, 'test@pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order`
--

CREATE TABLE `order` (
  `ID_order` int(11) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `number` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `method` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `flat` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `street` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `city` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `state` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `country` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `pin_code` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `total_products` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `order`
--

INSERT INTO `order` (`ID_order`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`) VALUES
(9, 'Hubert Potomski', 23, 'admin@admin.pl', 'Karta kredytowa', '9', 'Jana Bosco', 'Przytoczna', 'Lubuskie', 'Polska', '66-340', 'Jackson RRX24 (2) , ESP LTD MH-100 (1) , Gibson 1952 J-185 Antique Natural (1) ', 27867),
(10, 'Hubert Potomski', 23, 'admin@admin.pl', 'Karta kredytowa', '9', 'Jana Bosco', 'Przytoczna', 'Lubuskie', 'Polska', '66-340', 'Jackson RRX24 (2) , ESP LTD MH-100 (1) , Gibson 1952 J-185 Antique Natural (1) ', 27867),
(11, 'test', 4234, 'admin@admin', 'Karta kredytowa', '9', 'Jana Bosco', 'Przytoczna', 'Lubuskie', 'Polska', '66-340', 'Jackson RRX24 (2) , Jackson RRX24 (1) , ESP LTD MH-100 (1) , Gibson J-45 Standard VS LH (1) , Fender CD-60SCE Nat WN (1) , Evh Frankie Striped MN Relic R/W/B (1) , Harley Benton HBO-850 Classic Blue (1) , Takamine P3FCN (1) ', 37407);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_gitary` int(11) NOT NULL,
  `tytul` text COLLATE utf8_polish_ci NOT NULL,
  `cena` text COLLATE utf8_polish_ci NOT NULL,
  `grafika` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_gitary`, `tytul`, `cena`, `grafika`) VALUES
(1, 'Jackson RRX24', '3666', 'https://images.static-thomann.de/pics/bdb/473110/14556828_800.jpg'),
(2, 'ESP LTD MH-100', '1179', 'https://images.static-thomann.de/pics/bdb/431911/17812318_800.jpg'),
(3, 'Cordoba GK Studio', '2999', 'https://images.static-thomann.de/pics/bdb/290001/8343779_800.jpg'),
(4, 'Fender CD-60SCE Nat WN', '1245', 'https://images.static-thomann.de/pics/bdb/461836/14428359_800.jpg'),
(5, 'Gibson 1952 J-185 Antique Natural', '19690', 'https://images.static-thomann.de/pics/bdb/484549/15496835_800.jpg'),
(36, 'Thomann Classic Guitar S 4/4', '939', 'https://images.static-thomann.de/pics/bdb/130180/17136473_800.jpg'),
(37, 'Harley Benton HBO-850 Classic Blue', '598', 'https://images.static-thomann.de/pics/bdb/410214/14965495_800.jpg'),
(38, 'Takamine P3FCN', '5699', 'https://images.static-thomann.de/pics/bdb/295067/8007952_800.jpg'),
(39, 'Yamaha C40 II', '759', 'https://images.static-thomann.de/pics/bdb/280523/8738326_800.jpg'),
(40, 'Evh Frankie Striped MN Relic R/W/B', '6599', 'https://images.static-thomann.de/pics/bdb/483564/16815041_800.jpg'),
(41, 'Epiphone Slash Les Paul Appetite Burst', '2799', 'https://images.static-thomann.de/pics/bdb/518602/16635131_800.jpg'),
(42, 'ESP Snakebyte BLKS James Hetfield', '25590', 'https://images.static-thomann.de/pics/bdb/392913/11733785_800.jpg'),
(43, 'DAngelico Premier Bowery ANM', '1158', 'https://images.static-thomann.de/pics/bdb/467202/14316528_800.jpg'),
(44, 'Fender CD-60SCE Blk WN', '1255', 'https://images.static-thomann.de/pics/bdb/447683/17585645_800.jpg'),
(45, 'Gibson J-45 Standard VS LH', '11590', 'https://images.static-thomann.de/pics/bdb/441819/13534676_800.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nazwa` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `passwordhash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `nazwa`, `email`, `passwordhash`) VALUES
(1, 'admin', 'admin@admin.pl', 'ZAQ!2wsx'),
(15, 'admin', 'admin@admin', 'admin'),
(17, 'has', 'hehe', '123'),
(25, 'test', 'test@pl', '123'),
(47, '1', '1', '1'),
(54, 'test', 'user3', '123'),
(56, '', '', 'entyjebrtyhw4ty2brhfghsfghbsf');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id_gitary`);

--
-- Indeksy dla tabeli `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID_order`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_gitary`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id_gitary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT dla tabeli `order`
--
ALTER TABLE `order`
  MODIFY `ID_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_gitary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
