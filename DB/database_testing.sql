-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: St 11.Júl 2018, 19:57
-- Verzia serveru: 5.7.17
-- Verzia PHP: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `adamko_stranka`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `forum_comments`
--

CREATE TABLE `forum_comments` (
  `commentar_id` int(11) NOT NULL,
  `post_id_c` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(300) COLLATE utf8_slovak_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `forum_posts`
--

CREATE TABLE `forum_posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post` varchar(500) COLLATE utf8_slovak_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci ROW_FORMAT=COMPACT;

--
-- Sťahujem dáta pre tabuľku `forum_posts`
--

INSERT INTO `forum_posts` (`post_id`, `user_id`, `post`, `date`) VALUES
(1, 1, 'Co to tu take?', '2018-07-09 18:35:19'),
(2, 1, 'No neviem neviem', '2018-07-09 18:48:11'),
(3, 1, 'asdasdasdassd', '2018-07-10 18:59:59');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL COMMENT 'ID uzivatela ktory zaslal friend request',
  `id_recipient` int(11) NOT NULL COMMENT 'ID uzivatela ktory dostal friend request'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci COMMENT='Tabulka pre friend requesty';

--
-- Sťahujem dáta pre tabuľku `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `id_sender`, `id_recipient`) VALUES
(8, 2, 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `private_questions`
--

CREATE TABLE `private_questions` (
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci ROW_FORMAT=COMPACT;

--
-- Sťahujem dáta pre tabuľku `private_questions`
--

INSERT INTO `private_questions` (`question_id`, `user_id`, `question`, `date`) VALUES
(1, 1, 'Dosť tu toho chýba...', '2018-07-11 19:13:17'),
(2, 1, 'Nič nefunguje ako ma', '2018-07-11 19:15:00'),
(3, 1, 'dasdasdas', '2018-07-11 19:52:26');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'Id pouzivatela',
  `nick` varchar(10) COLLATE utf8_slovak_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_slovak_ci NOT NULL COMMENT 'Meno',
  `surname` varchar(50) COLLATE utf8_slovak_ci NOT NULL COMMENT 'Priezvisko',
  `ts_nick` varchar(30) COLLATE utf8_slovak_ci NOT NULL,
  `gender` varchar(2) COLLATE utf8_slovak_ci NOT NULL COMMENT 'm - male, f - female, o - other, n - not defined',
  `email` varchar(200) COLLATE utf8_slovak_ci NOT NULL,
  `reg_date` date NOT NULL COMMENT 'Datum registracie uzivatela',
  `last_login` datetime NOT NULL COMMENT 'Datum a cas posledneho loginu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci COMMENT='Vsetky informacie uzivatela';

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`user_id`, `nick`, `password`, `name`, `surname`, `ts_nick`, `gender`, `email`, `reg_date`, `last_login`) VALUES
(1, 'adamko', '$2y$10$3AM3J.BvGMY4hV91vnWK6uZsJzSCwSwkIGyn/pFppHiQussu1hSlG', 'Adam', 'Eksdi', 'Adamko', 'm', 'sromovskyadam@gmail.com', '2018-07-08', '2018-07-11 18:43:52'),
(2, 'erig', '$2y$10$oZ7R/9imXQZe3jGwpx/rUO6KgYkFkEMfQoYSZTQH35st0t0EngBTS', 'n', 'n', 'n', 'n', 'erig@gmail.com', '2018-07-08', '2018-07-10 21:20:32'),
(3, 'erika', '$2y$10$GTM0yVpwW7A/bbA6DajHOOUcPCD.Bc9Si5KzOgrrsxzs/ra2utAh2', 'n', 'n', 'n', 'n', 'erika@gmail.com', '2018-07-08', '0000-00-00 00:00:00');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD PRIMARY KEY (`commentar_id`);

--
-- Indexy pre tabuľku `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexy pre tabuľku `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `private_questions`
--
ALTER TABLE `private_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `forum_comments`
--
ALTER TABLE `forum_comments`
  MODIFY `commentar_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pre tabuľku `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pre tabuľku `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pre tabuľku `private_questions`
--
ALTER TABLE `private_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id pouzivatela', AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
