-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 11:01 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recordview`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `PostId` int(7) NOT NULL,
  `PostText` longtext COLLATE utf8_croatian_ci NOT NULL,
  `PostDate` datetime NOT NULL,
  `PostTitle` text COLLATE utf8_croatian_ci NOT NULL,
  `UserId` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PostId`, `PostText`, `PostDate`, `PostTitle`, `UserId`) VALUES
(1, 'Testiram komentar koji mora biti malo dulji tako da se može slagati dobar css oko toga.\r\nTekstovi su podijeljeni prema vrsti jezika koji se koristi, prema korištenju teksta i prema publici teksta, koja se određuje prema formalnosti i izboru pojmova.\r\n\r\nPodjela temeljem jezika, tekst može biti:\r\n\r\n    Novinarstvo\r\n    Književnost\r\n    Znanstvena literatura\r\n    Upravni i pravni tekst\r\n    Oglašavanje\r\n\r\nZaključak it ak\r\n', '2019-10-28 06:14:08', 'a', 2),
(3, 'In Cauda Venenum is not mere background music either. This record gets better with every listen because it commands undivided attention. The record is clear success, leading with better songwriting than Opeth has offered in a decade; yet for a band with the prowess of Opeth, it is lonely at the top of a category they created themselves.  Choices and chances taken in In Cauda Venenum are not the kind of thing you hear often in most varieties of metal-leaning music. So, if you’re looking for a brutal metal album, it\'s not here. Soft, dreamy excerpts from songs like “Lovelorn Crime” aren’t aggressive or metal at all—though still a beautiful song, it leaves the listener waiting for the same sense of awe they felt when they heard Damnation for the first time. While In Cauda Venenum delivers on some immediately gratifying moments, the record is still a very slow burn.', '2019-10-27 02:17:08', 'OPETH In Cauda Venenum', 1),
(38, 'tjnrtjmr', '2019-10-29 20:26:49', 'earhbestdh', 1),
(39, 'awrg', '2019-10-29 20:27:09', 'asdf', 1),
(40, 'Bas je super svida mi se posebno druga pjesma.\nGraveyard je awesome.', '2019-10-29 22:16:26', 'Novi Halsey album', 1),
(41, 'Bas je super svida mi se posebno druga pjesma.\nGraveyard je awesome.', '2019-10-29 22:16:31', 'Novi Halsey album', 1),
(42, 'Ovaj tekst mora doÄ‡i na poÄetak.\n\nDa se odma vidi Äim se submita.', '2019-10-29 22:34:05', 'test prepend', 1),
(43, 'owingwrh\nWGINWRI\nwgoiwgoehgipsheiuhwigh<Å¡wghaipehgaiuwhfiuwaehcfiuawhvfiawivaw\neaoguiaehiu', '2019-10-29 22:37:15', 'test prepend + hide', 1),
(44, 'jdrzmj\neth\n\njw\nrj\nw5zj', '2019-10-29 22:39:20', 'aehea', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(7) NOT NULL,
  `UserName` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `Password` varchar(128) COLLATE utf8_croatian_ci NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `Password`, `DateCreated`) VALUES
(1, 'Tomo', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-10-17 18:10:37'),
(2, 'Nikola', '5bc558836d17a4681c999de94afbc038', '2019-10-22 23:30:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostId` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
