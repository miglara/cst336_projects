-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: us-cdbr-iron-east-05.cleardb.net
-- Generation Time: Oct 29, 2018 at 05:33 AM
-- Server version: 5.6.40-log
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heroku_7c4fa413429fa60`
--

-- --------------------------------------------------------

--
-- Table structure for table `p1_quotes`
--

CREATE TABLE `p1_quotes` (
  `quoteId` int(11) NOT NULL,
  `quote` varchar(1500) NOT NULL,
  `author` varchar(40) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p1_quotes`
--

INSERT INTO `p1_quotes` (`quoteId`, `quote`, `author`, `category`) VALUES
(1, 'Be less curious about people and more curious about ideas.', 'Marie Curie', 'Reflection'),
(3, 'Tell me and I forget. Teach me and I remember. Involve me and I learn.', 'Benjamin Franklin', 'Philosophy'),
(5, 'Look up at the stars and not down at your feet. Try to make sense of what you see, and wonder about what makes the universe exist. Be curious.', 'Stephen Hawking', 'Motivation'),
(6, 'The past, like the future, is indefinite and exists only as a spectrum of possibilities.', 'Stephen Hawking', 'Philosophy'),
(7, 'We are all born ignorant, but one must work hard to remain stupid.', 'Benjamin Franklin', 'Humor'),
(8, 'Great spirits have always encountered violent opposition from mediocre minds.', 'Albert Einstein', 'Philosophy'),
(9, 'Two things are infinite: the universe and human stupidity; and I\'m not sure about the universe.', 'Albert Einstein', 'Humor'),
(11, 'Live as if you were to die tomorrow. Learn as if you were to live forever.', 'Mahatma Gandhi', 'Motivation'),
(14, 'All that I am, or hope to be, I owe to my angel mother.', 'Abraham Lincoln', 'Life'),
(16, 'The weak can never forgive. Forgiveness is the attribute of the strong.', 'Mahatma Gandhi', 'Reflection'),
(17, 'Imagination is more important than knowledge', 'Albert Einstein', 'Reflection'),
(18, 'You cannot escape the responsibility of tomorrow by evading it today.', 'Abraham Lincoln', 'Reflection'),
(19, 'Where there is love, there is life', 'Mahatma Gandhi', 'Life'),
(21, 'Everybody is a genius. But if you judge a fish by its ability to climb a tree, it will live its whole life believing that it is stupid.', 'Albert Einstein', 'Reflection'),
(22, 'Good advice is always certain to be ignored, but that\'s no reason not to give it.', 'Agatha Christie', 'Philosophy'),
(23, 'Nothing in life is feared, it is only to be understood. Now is the time to understand more, so that we may fear less.\r\n', 'Marie Curie', 'Motivation'),
(25, 'Keep your face to the sunshine and you cannot see the shadows.', 'Helen Keller', 'Reflection'),
(26, 'All my life through, the new sights of Nature made me rejoice like a child.', 'Marie Curie', 'Life'),
(27, 'Science is not only a disciple of reason but, also, one of romance and passion.', 'Stephen Hawking', 'Philosophy'),
(28, 'One never notices what has been done; one can only see what remains to be done.', 'Marie Curie', 'Motivation'),
(29, 'In a gentle way, you can shake the world ', 'Mahatma Gandhi', 'Motivation'),
(30, 'There are sadistic scientists who hurry to hunt down errors instead of establishing the truth.', 'Marie Curie', 'Philosophy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p1_quotes`
--
ALTER TABLE `p1_quotes`
  ADD PRIMARY KEY (`quoteId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
