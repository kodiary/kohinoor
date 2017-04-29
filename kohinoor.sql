-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2017 at 08:37 AM
-- Server version: 5.6.31
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kohinoor`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `slug`, `created_date`) VALUES
(2, '5 Must Do Experiences In Nepal', '<p>You simply can&rsquo;t go to Nepal and not <strong>take a scenic Everest Flight</strong>. These flights leave Kathmandu early in the morning and take a scenic route towards the highest mountain in the world. Flights do get postponed and cancelled due to bad weather, so we recommend leaving at least one extra day for this awesome flight before your rafting trip.</p>\r\n\r\n<p><strong>Take a few days at Bardia National Park</strong> in western Nepal for some wonderful wildlife viewing. Take a unique ride on an Asian Elephant through the wonderful jungle for chances to see asian rhinoceros, mugger crocodiles and even the elusive tiger. Conveniently located close the the take out of the Karnali River, a few days spent exploring and relaxing in this gorgeous park, is well worth the extra few days.</p>\r\n\r\n<p><strong>Explore the fascinating city of Kathmandu</strong>. Described by legendary New Zealand river runner, David Allardice, as the world&rsquo;s largest outdoor museum, you can easily spend 2-3 days exploring this fascinating city. A visit to Pashupatinath, Durbar Square and &lsquo;The Monkey Temple&rsquo; are fascinating parts of the city we share with all of our guests. If you are a retail therapist of note, you&rsquo;ll love shopping for Tibetan Art, woollen goods and may trinkets for your friends and family.</p>\r\n\r\n<p><strong>Enjoy a yoga retreat in Nepal</strong>. Step out of your busy routine and into the living Buddhist traditions of Nepal. You can take a few days out after your Sun Kosi rafting trip in one of the many retreats on offer around Kathmandu. There are also a range of meditation centres offering&nbsp;different dimensions of health-physical, sensorial, mental and spiritual.</p>\r\n\r\n<p>Last but certainly not least, <strong>take a river trip in this stunning land</strong>. My true passion for multi day rafting adventures came from running the incredible journeys on offer in Nepal in the 1990&rsquo;s. Each year we return to share these trips with our guests, with all of the trips offering something unique. If you are after a true adventure including a 4 day hike to the river and then running in excess of 140 rapids in 120 kilometres, then the Tamur River, should be your next adventure.</p>\r\n', '418457_738555.jpg', '5-Must-Do-Experiences-In-Nepal', '2016-08-28'),
(3, 'Rafting in Nepal:', '<p>Rafting in Nepal: The Trishuli is Nepal&rsquo;s most popular rafting river, impressive gorges, exciting rapids, some easier sections, and easily accessible from Kathmandu and Pokhara. The Trishuli white water trip exciting, fun and safe for all age groups. Our 2-day trips will overnight at Trishuli River Retreat our private camp with comfortable safari-tented accommodation set in private grounds with river views surrounded by forests. You can expect this to be the most memorable Rafting in Nepal.</p>\r\n\r\n<p>Recommended for intermediate Kayakers. The Trishuli rafting in Nepal can be easily combined with a trek out of Pokhara and/or a visit to Royal Chitwan National Park.</p>\r\n', '637512_709320.jpg', 'Rafting-in-Nepal-', '2016-08-28'),
(4, 'test blog', '<p>asd asdas das asd asdasd asdas dasdasd asd</p>\r\n', '837921_319519.jpg', 'test-blog', '2016-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL,
  `video_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `video_id`, `page_id`, `package_id`, `tour_id`, `blog_id`) VALUES
(12, 6, NULL, 4, NULL, NULL),
(13, 7, NULL, 4, NULL, NULL),
(14, 8, NULL, 4, NULL, NULL),
(15, 9, NULL, 4, NULL, NULL),
(16, 10, NULL, 1, NULL, NULL),
(17, 11, NULL, 1, NULL, NULL),
(18, 12, NULL, 1, NULL, NULL),
(19, 13, NULL, 1, NULL, NULL),
(20, 14, NULL, 2, NULL, NULL),
(21, 15, NULL, 2, NULL, NULL),
(22, 16, NULL, 2, NULL, NULL),
(23, 17, NULL, 2, NULL, NULL),
(24, 18, NULL, 12, NULL, NULL),
(25, 19, NULL, 12, NULL, NULL),
(26, 20, NULL, 12, NULL, NULL),
(27, 21, NULL, 12, NULL, NULL),
(28, 22, NULL, 13, NULL, NULL),
(29, 23, NULL, 13, NULL, NULL),
(30, 24, NULL, 13, NULL, NULL),
(31, 25, NULL, 13, NULL, NULL),
(32, 26, NULL, 13, NULL, NULL),
(41, 5, NULL, 1, NULL, NULL),
(43, NULL, 2, 2, NULL, NULL),
(44, NULL, 2, NULL, 7, NULL),
(48, NULL, NULL, 1, NULL, 1),
(49, NULL, NULL, 2, NULL, 1),
(50, NULL, NULL, 12, NULL, 1),
(54, NULL, NULL, 1, NULL, 3),
(55, NULL, NULL, 2, NULL, 4),
(56, NULL, NULL, 2, NULL, 5),
(57, NULL, NULL, 3, NULL, 5),
(58, NULL, NULL, 4, NULL, 5),
(60, NULL, 7, 1, NULL, NULL),
(62, NULL, NULL, 1, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `youtube`) VALUES
(5, NULL, 'https://www.youtube.com/watch?v=lk8BrdhxaVM'),
(6, NULL, 'https://www.youtube.com/watch?v=s4O6vU3RYAE'),
(7, NULL, 'https://www.youtube.com/watch?v=OtXKa-CNwrs'),
(8, NULL, 'https://www.youtube.com/watch?v=xhQnCde3ROw'),
(9, NULL, 'https://www.youtube.com/watch?v=1uAvWg5KRvs'),
(10, NULL, 'https://www.youtube.com/watch?v=YFvgCj3NtI4'),
(11, NULL, 'https://www.youtube.com/watch?v=GbmDVFgsYOY'),
(12, NULL, 'https://www.youtube.com/watch?v=eHFs2aSlfA0'),
(13, NULL, 'https://www.youtube.com/watch?v=YMthjGFhBBo'),
(14, NULL, 'https://www.youtube.com/watch?v=vPhMaL2NfCo'),
(15, NULL, 'https://www.youtube.com/watch?v=aRwW1tmj1Hc'),
(16, NULL, 'https://www.youtube.com/watch?v=c6STl40y50k'),
(17, NULL, 'https://www.youtube.com/watch?v=vntXFxsDpfQ'),
(18, NULL, 'https://www.youtube.com/watch?v=NSUEt2T2Bq4'),
(19, NULL, 'https://www.youtube.com/watch?v=L84C8jrD5dk'),
(20, NULL, 'https://www.youtube.com/watch?v=i_Qt_UFA-qU'),
(21, NULL, 'https://www.youtube.com/watch?v=c64zh0Bx_8M'),
(22, NULL, 'https://www.youtube.com/watch?v=yFOZHa2pn1g'),
(23, NULL, 'https://www.youtube.com/watch?v=VZ2CPdIPa30'),
(24, NULL, 'https://www.youtube.com/watch?v=-ougJbk-yhI'),
(25, NULL, 'https://www.youtube.com/watch?v=ZMepnXkqgqk'),
(26, NULL, 'https://www.youtube.com/watch?v=PZ-6qvJ8y3w');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
