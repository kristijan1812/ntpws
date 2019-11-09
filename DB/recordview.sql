-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 06:58 PM
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
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `LikeId` int(7) NOT NULL,
  `UserId` int(7) NOT NULL,
  `PostId` int(7) NOT NULL,
  `LikeValue` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`LikeId`, `UserId`, `PostId`, `LikeValue`) VALUES
(1, 2, 39, -1),
(6, 1, 39, -1),
(8, 6, 3, 1),
(9, 45, 3, 1),
(10, 2, 117, 1),
(99, 1, 3, 1);

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
(3, 'In Cauda Venenum is not mere background music either. This record gets better with every listen because it commands undivided attention. The record is clear success, leading with better songwriting than Opeth has offered in a decade; yet for a band with the prowess of Opeth, it is lonely at the top of a category they created themselves.  Choices and chances taken in In Cauda Venenum are not the kind of thing you hear often in most varieties of metal-leaning music. So, if youï¿½re looking for a brutal metal album, it\'s not here. Soft, dreamy excerpts from songs like ï¿½Lovelorn Crimeï¿½ arenï¿½t aggressive or metal at allï¿½though still a beautiful song, it leaves the listener waiting for the same sense of awe they felt when they heard Damnation for the first time. While In Cauda Venenum delivers on some immediately gratifying moments, the record is still a very slow burn.', '2019-10-27 02:17:08', 'OPETH In Cauda Venenum', 1),
(39, 'awrg', '2019-10-29 20:27:09', 'asdf', 1),
(73, 'CHANGED TEXT TO MAKE MORE SENSE FOR READERS\n new line\nnewline again', '2019-11-02 15:23:32', 'CHANGED TITLE', 1),
(86, 'jwsjw46j', '2019-11-02 15:57:51', 'ertje', 1),
(90, 'waeg', '2019-11-02 16:02:35', 'aweg', 1),
(93, 'Editing \ntext \nfor php\n\nntpws2019\nsad bi moralo proÄ‡\n\nTEST NAKON F5\nNEW LINES', '2019-11-02 16:08:11', 'test edit 2', 1),
(104, 'PROMJENA', '2019-11-03 15:19:35', 'PROMJENA', 1),
(105, 'Bas je dobar, \nobozavam pjesmu 3\n\nÅ½epik Nikola', '2019-11-03 15:21:03', 'nova guÅ¾va u 16ercu, 2019', 2),
(106, 'oubgae\neht\nsrtjn\nsrzn\nwrn', '2019-11-03 15:21:50', 'uihaiudhwiu', 2),
(107, 'arh\n\n\naeh\naet\n\n\n', '2019-11-03 15:22:19', 'aeht', 2),
(108, 'setj\nwth\nwr\nzj\n\n\nw4zj', '2019-11-03 15:22:35', 'rth', 2),
(109, 'eau5u5e \nerg \ne \neg \n\n', '2019-11-03 15:23:47', 'eu5', 2),
(114, '\naaaaaaaaaaaaaaa\n\n\naaaaaaaaaaaaaaa\naaaaaaaaaaaaaaa\naaaaaaaaaaaaaaa\n\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\naaaaaaaaaaaaaaa\naaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2019-11-07 23:22:49', 'aaaaaaaaaaaaaaaa', 2),
(117, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2019-11-08 22:38:43', 'aaaaaaaaaaaaa', 2),
(118, 'word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;word-wrap: break-word;', '2019-11-08 22:39:40', 'aaaaaaa', 2),
(123, '\nasvd<sfvybybfakfbaiebriub\nasvd<sfvybybfakfbaiebriub\nasvd<sfvybybfakfbaiebriub\nasvd<sfvybybfakfbaiebriub\nasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriubasvd<sfvybybfakfbaiebriub', '2019-11-09 18:54:00', 'arhsehtseh', 1),
(124, 'asvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriubasvdsfvybybfakfbaiebriub', '2019-11-09 18:54:12', 'fvybybfakfbaiebriub', 1);

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
(2, 'Nikola', '5bc558836d17a4681c999de94afbc038', '2019-10-22 23:30:41'),
(5, 'Terezija', 'cbbd0fb3a559efd3768a48b44b39cfb2', '2019-11-06 19:03:02'),
(6, 'Kristijan', '1e5c2776cf544e213c3d279c40719643', '2019-11-06 19:03:43'),
(45, 'Luka', '040b7cf4a55014e185813e0644502ea9', '2019-11-08 16:24:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`LikeId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `PostId` (`PostId`);

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
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `LikeId` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostId` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`PostId`) REFERENCES `posts` (`PostId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
