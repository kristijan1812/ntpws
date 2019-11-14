-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2019 at 04:35 PM
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
(61, 38, 16, 1),
(62, 38, 15, -1),
(63, 36, 16, 1),
(64, 36, 17, 1),
(65, 40, 18, 1),
(66, 40, 15, -1),
(67, 40, 16, 1);

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
(15, 'In Cauda Venenum does thrill but largely disappoints. It\'s definitely better than Sorceress, reducing the wispy, inconsequential folk noodlings and adding genuine experimentation, but the results in terms of songwriting aren\'t up there with Pale Communion, which remains the one genuine gem in the band\'s post-death era. The two versions of the album, one sung in the band\'s native Swedish, one in English, seems an interesting move on the surface, yet unless you can speak both then it\'s impossible to really understand the difference, the nuances that will be plain to a Swede yet go over the heads of us Anglocentrists. And how many classic extreme metal albums have non-English lyrics, yet are wonderful works of art even without time spent with Google Translate? So although you can sense a slightly greater enthusiasm in Ã…kerfeldt\'s Swedish performance than his English one (and few would deny the man has become an excellent singer) there\'s not much difference really.', '2019-11-14 16:21:48', 'Opeth - In Cauda Venenum', 36),
(16, '1989â€™ is Taylor Swiftâ€™s radical reinvention: one to finally alienate her country audience and plant her flag firmly in pop soil. The lead single, â€˜Shake It Offâ€™, was no red herring. Swift produced â€˜1989â€™ with hitmaker Max Martin, the man behind Britney Spearsâ€™ â€˜â€¦Baby One More Timeâ€™, and her aim is fixed squarely on the pop throne recently vacated by the AWOL Rihanna.\n\nShe was made for it. The 24-year-old has sold over 30 million records worldwide; her last album, â€˜Redâ€™, sold 1.2 million in its first week, the highest US figures in a decade. Just last week her label mistakenly uploaded eight seconds of hissing noise billed as â€˜Track 3â€™ from â€˜1989â€™ and it shot straight to the top of the iTunes chart. Sheâ€™s outgrown her country roots (a process cemented by 2012 smash â€˜We Are Never Ever Getting Back Togetherâ€™), become tabloid fodder and parked her guitar in favour of breathless dance routines, as evidenced in the controversial â€˜Shake It Offâ€™ video. This record has a concept, too: â€˜1989â€™, she told Rolling Stone, is named after â€œa very experimental time in pop musicâ€. Itâ€™s also the year she was born.\n\nBut her fifth album isnâ€™t just a nostalgia trip. Itâ€™s possible to plunder the â€™80s and still sound fresher than Charli XCX, as Swift did on 2012 B-side â€˜I Wish You Wouldâ€™, which ripped boxy beats and thick synths from Fine Young Cannibalsâ€™ 1989 album â€˜The Raw & The Cookedâ€™. The chiming synths of â€˜All You Had To Do Was Stayâ€™ could be Phoenix; and â€˜Styleâ€™, so â€™80s-indebted with its thick piano-house and uplifting â€œTake me upâ€ coda, echoes the retro-modern atmosphere conjured by the slinky cool of Electric Youth and Blood Orange.\n\nUnlike them, though, Swift locates that sense of period without sacrificing the joy of the pop song: gloriously celebrating the Pennsylvania nativeâ€™s new hometown with OMD synth jabs on â€˜Welcome To New Yorkâ€™, working Beastie Boys beats into a bitter stomp on â€˜Bad Bloodâ€™ and shrugging off the paranoia of troubled love on the intense, Roxette-like chorus of â€˜Out Of The Woodsâ€™. Barring a late collapse into soft-rock mush on the drifting â€˜This Loveâ€™ and weepy â€˜Cleanâ€™, Swiftâ€™s plunge into pop is a success.', '2019-11-14 16:25:01', 'Taylor Swift\'s fifth album isnâ€™t just a nostalgia trip. It\'s a reinvention.', 38),
(17, 'If you saw Pink Floyd at Live8 and wondered what all the fuss was about, then your instincts were right. Pink Floyd are one of those bands that even their fans have to make excuses for. Pompous, self-important, joyless and big-selling, theyâ€™ve become shorthand for grumpy middle-aged bank manager rock. Most famous for â€˜The Dark Side Of The Moonâ€™ â€“ a record about half as clever as it likes to think it is â€“ Pink Floydâ€™s career is built on kiddy choirs, 30-year rows, giant polystyrene walls, inflatable pigs, interminable guitar solos and being Very Serious Indeed. Itâ€™s been successful â€“ theyâ€™ve sold 150 million albums â€“ but no person in their right mind would ever want to listen to one of those albums all the way through, especially if there are kitchen knives or open windows nearby.\n\nExcept this one. If you like the inflatable-pigs Floyd, then youâ€™re probably reading the wrong magazine. But if you fancy the idea of four young men making super-spooked-sounding music about space and creepy lullabies about sad scarecrows on recordings so raw that you can hear the strings buzzing and their breath on the microphones, then youâ€™re going to spend the rest of the year playing Pink Floydâ€™s first album over and over again.\n\n\nâ€˜The Piper At The Gates Of Dawnâ€™ has inspired plenty of people â€“ Blur, The Coral, Klaxons, The Horrors, Devendra Banhart, pretty much every Home Counties art-school band ever â€“ which makes it all the more ironic that one of the few bands that havenâ€™t copied it is Pink Floyd themselves. Itâ€™s down to one man, of course: before he lost his mind, Pink Floydâ€™s main songwriter was Syd Barrett, a sensitive, good-looking middle-class art student from Cambridge. His songs on â€˜The Piper At The Gates Of Dawnâ€™ assemble a cast of cats, silver shoes, unicorns, mice called Gerald, bikes, gnomes and the I Ching, and put them to some of the most inventive and surprising psychedelic music ever recorded.\n\nSome people find Barrett tunes like â€˜Bikeâ€™ (on which he trills â€œIâ€™ve got a bike/You can ride it if you likeâ€) insufferably twee, but even these whimsical moments are undercut with menace, while the camper songs are tempered by a genuinely spooked-sounding sensibility: fittingly for an album recorded late into the night.\n\nThe story, as we know, does not end particularly happily. By the end of 1967, Syd had become catatonic after daily LSD use â€“ a situation exacerbated by a tour of working menâ€™s clubs on which, by all accounts, Pink Floydâ€™s extreme volume, retina-melting lightshow and satin blouses caused enraged audiences of people that are probably now their fans to shower them with pint pots every night. In early 1968, Syd left Pink Floyd, making them a band for whom itâ€™s easy to rapidly become acquainted with the highlights of their catalogue: buy this album and forget that they ever made any others while youâ€™re being sucked into its wild little world.\n', '2019-11-14 16:29:23', 'Pink Floyd - The Piper At The Gates Of Dawn 9/10', 38),
(18, 'At this stage in her six-decade career, the usual rules donâ€™t apply to Cher, still the only performer to straddle a giant canon in a pop video the year after winning an Oscar. She evidently enjoyed chewing the Greek island scenery so much in Mamma Mia! Here We Go Again that her second album since 2001 should be a collection of Abba covers. But to be honest, if anyone out there objects to this marriage made in gay heaven, thereâ€™s only one legitimate response.\n\nObviously â€˜Dancing Queenâ€™ is camp â€“ how could Cher covering Abba not be? â€“ but itâ€™s also surprisingly poignant. Cherâ€™s voice has always been a triumph of sheer belting power over flexibility (a former colleague once described it, memorably, as sounding like an â€œempowered foghornâ€) but her rendition of â€˜One Of Usâ€™ quivers with genuine emotion. She also brings a tender maternal warmth to a flamenco-flecked â€˜Chiquititaâ€™, and captures the almost unbearable melancholy of â€˜The Winner Takes It Allâ€™, re-imagined here as a kind of spangly rave ballad.\n\nElsewhere, producer Mark Taylor (whoâ€™s been working with Cher since her big late-â€™90s comeback with â€˜Believeâ€™) stays relatively faithful to Abbaâ€™s original arrangements â€“ a shrewd move, as Benny Andersson and BjÃ¶rn Ulvaeus are master craftsmen whose music was deeply ingrained in the collective psyche long before Meryl Streep and Pierce Brosnan got hold of it. There are subtle updates: Cherâ€™s version of â€˜Gimme! Gimme! Gimme! (A Man After Midnight)â€™ deliberately imitates â€˜Hung Upâ€™, the Madonna song that samples Abbaâ€™s original, and â€˜Waterlooâ€™ kicks off with a stomping disco beat that recalls Amii Stewartâ€™s â€˜Knock On Woodâ€™. â€˜Dancing Queenâ€™ somehow sounds even glitzier than the deathless original.\n\nObviously â€˜Dancing Queenâ€™ is no forward-thinking pop opus â€“ try Christine and the Queensâ€™ awesome new one for that â€“ and itâ€™s also no flawless musical masterpiece. Her version of â€˜Mamma Mia!â€™ is sunk by production cheaper than the ropiest Cher impersonatorâ€™s wig, and Iâ€™m still sulking that she and Taylor didnâ€™t bosh out a poppers oâ€™clock cover of Abbaâ€™s great underrated banger â€˜Summer Night Cityâ€™.\n\nStill, this is an enormously enjoyable album that doesnâ€™t just deliver on its kitsch potential; it also makes you feel both moved and exhilarated. Then again, maybe we shouldnâ€™t over-analyse why it works too much â€“ the main reason is probably because sheâ€™s Cher,  the usual rules donâ€™t apply.', '2019-11-14 16:33:46', 'Cher â€“ â€˜Dancing Queenâ€™ review', 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(7) NOT NULL,
  `UserName` varchar(64) COLLATE utf8_croatian_ci NOT NULL,
  `Password` varchar(128) COLLATE utf8_croatian_ci NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `UserType` enum('user','admin') COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `Password`, `DateCreated`, `UserType`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-11-09 20:44:00', 'admin'),
(36, 'user1', '827ccb0eea8a706c4c34a16891f84e7b', '2019-11-14 16:17:49', 'user'),
(37, 'user2', '827ccb0eea8a706c4c34a16891f84e7b', '2019-11-14 16:17:58', 'user'),
(38, 'user3', '827ccb0eea8a706c4c34a16891f84e7b', '2019-11-14 16:18:07', 'user'),
(39, 'user4', '827ccb0eea8a706c4c34a16891f84e7b', '2019-11-14 16:18:16', 'user'),
(40, 'user5', '827ccb0eea8a706c4c34a16891f84e7b', '2019-11-14 16:18:26', 'user');

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
  MODIFY `LikeId` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostId` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`PostId`) REFERENCES `posts` (`PostId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
