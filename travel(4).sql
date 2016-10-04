-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2016 at 02:48 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'info@kodiary.com');

-- --------------------------------------------------------

--
-- Table structure for table `iteniery`
--

CREATE TABLE IF NOT EXISTS `iteniery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=251 ;

--
-- Dumping data for table `iteniery`
--

INSERT INTO `iteniery` (`id`, `pid`, `day`, `description`, `title`) VALUES
(163, 1, '1', 'Begins with the early morning breakfast at 6:00 AM followed by bus trip from Kathmandu to Bigfig resort, Dhading. With a short rest the team gets ready with their rafting costumes and safety jacket. We let the team to get friendly with water and the rafting boat for some time and begin the thrill at 10:00 AM. Fighting with tides goes on for next 2 hrs and we end up at Narayanghat at 12:00PM noon. Lunch shall served at 1:00 PM at Narayani River side Restaurant. After short break for snap shots we get back to bus at 3:00PM. An hour of tea break will be enjoyed on the way to kathmandu at Naubise. Finally, we reach Kathmandu at 8:00PM.', '1 day'),
(164, 7, '1', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable.', '1 day'),
(176, 5, '1', 'Kathmandu - Barabise (870 m) (4 hrs bus ride) ', 'Day 1'),
(177, 5, '2', 'Barabise (870 m) - Jalbire (830 m) 8 hrs ', 'Day 2'),
(178, 5, '3', 'Jalbire (830 m) - Khobre (2435 m) 8 hrs ', 'Day 3'),
(179, 5, '4', 'Khobre (2435 m) - Pokhare Banjang (1575 m) 9 hrs ', 'Day 4'),
(180, 5, '5', 'Pokhare Banjang (1574 m) - Gyalthung (985 m) 2 hrs - bus ride to Kathmandu 4 hrs', 'Day 5'),
(181, 4, '1', 'An encounter with the Himalayas in our Ecureuil AS 350 B3e will be a life changing experience. In addition, we offer an opportunity to get a close panoramic view of the Himalayas at your own pace and comfort. Book a mountain flight with us to enjoy the beauty of Nepal in a luxurious way at attractive rates. ', 'Few Hours'),
(182, 6, '1', 'The standard paragliding flight takes off from Sarangkot (30 min. by jeep from Pokhara), floats above Sarangkot for a while, then heads over Pokhara before performing spiralling acrobatics (optional) on descent to Phewa Tal next to Lakeside.', '30mins - 1hr'),
(183, 8, '1', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable.', '1 day'),
(184, 3, '1', 'Seated high on the back of a trained elephant exploring the grasslands and core area of the park, you become an intergral part of the life of the Chitwan National Park. The elephant safari, though not the most comfortable rides, is an amazing experience. And it doesn’t take long to spot at least a rhino in these forests. The ride will be enjoyed of 2 hrs. The time can be chosen from 10:00AM to 4:00PM.', '1 Day safari'),
(240, 2, '1', 'Flight Kathmandu - Pokhara - drive to Nayapul (1 1/2 hrs) - trek to Ulleri (1940 m) 6 hrs', 'Ktm - Pok - Nayapul'),
(241, 2, '2', 'Ulleri (1940 m) - Ghorepani (2750 m) 5 hrs ', 'Begin your Trek'),
(242, 2, '3', 'Ghorepani (2750 m) - Poon Hill (3194 m). Get an early start to watch the sunrise over the Annapurnas from Poon Hill, then on to Tadapani (2590 m) 6 hrs', 'Start Climbing'),
(243, 2, '4', 'Tadapani (2590 m) - Chomrong (2210 m) 4 hrs ', 'Start Struggling'),
(244, 2, '5', 'Chomrong (2210 m) - Himalayan Hotel (2840 m) 7 hrs', 'Feel the Chill'),
(245, 2, '6', 'Himalayan Hotel (2840 m) - Machapuchare Base Camp (3700 m) 4 hrs', 'Experience the Altitude'),
(246, 2, '7', 'Machapuchare Base Camp (3700 m) - Annapurna Base Camp (4130 m) 3 hrs (1/2 day hike to glacier optional)', 'Forget your struggle with the beauty'),
(247, 2, '8', 'Annapurna Base Camp (4130 m) - Bamboo (2310 m) 7 hrs', 'Say Good Bye to the Base Camp'),
(248, 2, '9', 'Bamboo (2310 m) - Jhinu Danda (1780 m); visit hotsprings', 'Realize getting downhill is harder'),
(249, 2, '10', 'Jhinu Danda (1780 m) - Ghandruk (5 hrs)', 'Getting closer'),
(250, 2, '11', 'Ghandruk - Nayapul (5 hrs) and by bus/taxi to Pokhara (1 1/2 hrs)', 'Crave to see the road');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `added_on` date DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `start_point` varchar(255) DEFAULT NULL,
  `end_point` varchar(255) DEFAULT NULL,
  `route_map` varchar(255) DEFAULT NULL,
  `best_time` varchar(255) DEFAULT NULL,
  `cost_detail` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `cat_id`, `title`, `image`, `description`, `added_on`, `slug`, `grade`, `start_point`, `end_point`, `route_map`, `best_time`, `cost_detail`) VALUES
(1, 1, 'Trishuli Rafting from Big-fig', 'img588_2016_07_21_10_14_57.jpg', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', NULL, 'Trishuli-Rafting-from-Big-fig', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'Annapurna Base Camp - Trek', 'img63_2016_07_21_10_35_12.JPG', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', NULL, 'Annapurna-Base-Camp---Trek', 'Easy', 'Nayapul', 'Nayapul', '195770_856323.jpg', 'March-April and September-November', '<p><strong>Cost Includes</strong></p>\r\n\r\n<ul>\r\n	<li>All Airports pick up and drop.</li>\r\n	<li>3 nights&nbsp; standard hotel in Kathmandu with breakfast.</li>\r\n	<li>2 nights your standard hotel in Pokhara with BB.</li>\r\n	<li>Accommodation tea-houses in mountain during the trek</li>\r\n	<li>All 3 meals per day during the trek [B+L+D]</li>\r\n	<li>Tourist standard bus between Kathmandu / Pokhara / Kathmandu</li>\r\n	<li>An experienced English-speaking trekking guide, assistant trek guide as per bigger size of group of trekkers: (2 trekkers:1 porter) including their salary, insurance, equipment, food and lodging</li>\r\n	<li>Down jacket, sleeping bag, duffel bag, and trekking map (down jacket and sleeping bag are to be returned after trip completion)</li>\r\n	<li>All necessary paper work and permits (ACAP, TIMS )</li>\r\n	<li>A medical supplies (first aid kit will be available)</li>\r\n	<li>All government and local taxes</li>\r\n</ul>\r\n\r\n<p><strong>Cost excludes:</strong></p>\r\n\r\n<ul>\r\n	<li>Nepal Visa fee (Nepal provides on arrival visa in Immigration, bring accurate USD cash and two passport photographs,)</li>\r\n	<li>International airfare to and from Kathmandu</li>\r\n	<li>Meal city like Kathmandu and Pokhara.</li>\r\n	<li>Extra calculate for additional programs as per above itinerary.</li>\r\n	<li>Travel and rescue insurance.</li>\r\n	<li>Local donation &amp; Tips for guides and porters.</li>\r\n	<li>Personal expenses (Pot of tea, bar bills, battery recharge, extra porters, bottle or boiled water, shower etc)</li>\r\n</ul>\r\n'),
(3, 4, 'Chitwan Jungle Safari - Elephant Ride', 'img718_2016_07_21_10_24_47.jpg', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', NULL, 'Chitwan-Jungle-Safari---Elephant-Ride', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 12, 'Helicoptor/Aeroplane Mountain Sighting', 'img292_2016_07_21_10_31_31.jpg', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', NULL, 'Helicoptor-Aeroplane-Mountain-Sighting', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, 'Helambu Trek', 'img415_2016_07_21_10_43_31.jpg', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', NULL, 'Helambu-Trek', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 12, 'Paragliding Pokhara', 'img151_2016_07_21_11_29_19.jpg', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', NULL, 'Paragliding-Pokhara', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 'Canoeing Kaligandaki', 'img573_2016_07_21_11_36_38.jpg', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', NULL, 'Canoeing-Kaligandaki', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 13, 'Bunzy Jumping - Over Bhote Koshi', 'img269_2016_07_21_11_40_00.jpg', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', NULL, 'Bunzy-Jumping---Over-Bhote-Koshi', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `package_category`
--

CREATE TABLE IF NOT EXISTS `package_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `package_category`
--

INSERT INTO `package_category` (`id`, `title`, `slug`) VALUES
(1, 'Rafting', 'rafting'),
(2, 'Trekking/Hiking', 'trekking-hiking'),
(3, 'Peak Climbing', 'peak-climbing'),
(4, 'Jungle Safari', 'jungle-safari'),
(12, 'Paragliding/Helicoptor', 'paragliding-helicoptor'),
(13, 'Bunzy Jumping', 'bunzy-jumping');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `cat_id`, `title`, `description`, `slug`) VALUES
(2, 2, 'Trekking and Hiking', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'trekking-and-hiking'),
(3, 3, 'Tibet Tour', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'tibet-tour'),
(4, 4, 'Introduction of Nepal', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p>\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'introduction-of-nepal'),
(5, 1, 'About Us', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 'about-us'),
(6, 1, 'Sample Page', '<p>this is sample paragraph. this is sample paragraph</p>\r\n\r\n<p>this is sample paragraph</p>\r\n\r\n<p>this is sample paragraph</p>\r\n\r\n<p>this is sample paragraph</p>\r\n\r\n<p>this is sample paragraph</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Sample-Page');

-- --------------------------------------------------------

--
-- Table structure for table `page_category`
--

CREATE TABLE IF NOT EXISTS `page_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `page_category`
--

INSERT INTO `page_category` (`id`, `title`, `slug`) VALUES
(1, 'Main Pages', 'main'),
(2, 'Travel Services In Nepal', 'travel-services-in-nepal'),
(3, 'Travel Services Out Of Nepal', 'travel-services-out-of-nepal'),
(4, 'Traveller''s Guide', 'travellers-guide');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `video_id`, `page_id`, `package_id`, `tour_id`) VALUES
(10, NULL, 2, 2, NULL),
(11, 5, NULL, 1, NULL),
(12, 6, NULL, 4, NULL),
(13, 7, NULL, 4, NULL),
(14, 8, NULL, 4, NULL),
(15, 9, NULL, 4, NULL),
(16, 10, NULL, 1, NULL),
(17, 11, NULL, 1, NULL),
(18, 12, NULL, 1, NULL),
(19, 13, NULL, 1, NULL),
(20, 14, NULL, 2, NULL),
(21, 15, NULL, 2, NULL),
(22, 16, NULL, 2, NULL),
(23, 17, NULL, 2, NULL),
(24, 18, NULL, 12, NULL),
(25, 19, NULL, 12, NULL),
(26, 20, NULL, 12, NULL),
(27, 21, NULL, 12, NULL),
(28, 22, NULL, 13, NULL),
(29, 23, NULL, 13, NULL),
(30, 24, NULL, 13, NULL),
(31, 25, NULL, 13, NULL),
(32, 26, NULL, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE IF NOT EXISTS `tours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `added_on` date DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `start_point` varchar(255) DEFAULT NULL,
  `end_point` varchar(255) DEFAULT NULL,
  `route_map` varchar(255) DEFAULT NULL,
  `best_time` varchar(255) DEFAULT NULL,
  `cost_detail` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `cat_id`, `title`, `image`, `description`, `added_on`, `slug`, `grade`, `start_point`, `end_point`, `route_map`, `best_time`, `cost_detail`) VALUES
(2, 6, 'test11111', '', '<p>t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', NULL, 'test11111-20160721120807', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 'test444444', '', '', NULL, 'test444444-20160721120757', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tour_category`
--

CREATE TABLE IF NOT EXISTS `tour_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tour_category`
--

INSERT INTO `tour_category` (`id`, `title`, `slug`) VALUES
(3, 'tset', 'tset'),
(6, 'asdsadsad', 'asdsadsad'),
(7, 'test2222222', 'test2222222');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
