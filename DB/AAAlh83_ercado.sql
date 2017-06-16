-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2017 at 12:36 AM
-- Server version: 5.1.67-community-log
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `AAAlh83_ercado`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `ans_id` int(4) NOT NULL AUTO_INCREMENT,
  `product_id` int(4) NOT NULL,
  `q_id` int(4) NOT NULL,
  `ans_value` text NOT NULL,
  `help` int(4) NOT NULL,
  `unhelp` int(4) NOT NULL,
  `ans_date` datetime NOT NULL,
  PRIMARY KEY (`ans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `product_id`, `q_id`, `ans_value`, `help`, `unhelp`, `ans_date`) VALUES
(1, 1, 1, 'Thank you for contacting The Body Shop. The microdermabrasion is an at-home expert exfoliator which removes dead skin cells, and should be added to your routine as a specialist exfoliating treatment up to 3 times a week. The Cleansing Polish is a daily facial wash suitable for daily use. Both are perfect for dull, tired skins. We hope this answer helps!', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text,
  `user_name` text,
  `message` text,
  `msg_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=569 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user_id`, `user_name`, `message`, `msg_time`) VALUES
(1, '1507112256007234', 'Guest user', 'asdad', '2017-06-07 01:06:18'),
(2, '1507112256007234', 'Guest user', 'afadf', '2017-06-07 01:06:32'),
(3, '1507112256007234', 'Rikin', 'sadas', '2017-06-07 01:06:30'),
(5, '1148028615273079', 'Pratik', 'Hello', '2017-06-07 05:06:49'),
(72, '1378853412191169', 'Nishant', 'jjj', '2017-06-07 14:06:29'),
(73, '1378853412191169', 'Nishant', 'test', '2017-06-07 14:06:08'),
(74, '1378853412191169', 'Nishant', '1', '2017-06-07 14:06:30'),
(75, '1378853412191169', 'Nishant', '2', '2017-06-07 14:06:30'),
(76, '1378853412191169', 'Nishant', '3', '2017-06-07 14:06:31'),
(77, '1378853412191169', 'Nishant', '', '2017-06-07 15:06:16'),
(78, '1378853412191169', 'Nishant', 'vitamin e', '2017-06-07 15:06:03'),
(79, '1378853412191169', 'Nishant', 'vitamin e', '2017-06-07 15:06:08'),
(140, '1148028615273079', 'Pratik', 'dehydration', '2017-06-08 03:06:46'),
(167, '1148028615273079', 'Pratik', 'dehydration', '2017-06-08 08:06:34'),
(168, '1148028615273079', 'Pratik', 'asd', '2017-06-08 08:06:25'),
(169, '1148028615273079', 'Pratik', 'dehydration', '2017-06-08 08:06:33'),
(170, '1148028615273079', 'Pratik', 'dehydration', '2017-06-08 08:06:21'),
(171, '1148028615273079', 'Pratik', 'asd', '2017-06-08 08:06:29'),
(172, '1148028615273079', 'Pratik', 'dehydration', '2017-06-08 08:06:14'),
(173, '1148028615273079', 'Pratik', 'dfs', '2017-06-08 08:06:45'),
(174, '1148028615273079', 'Pratik', 'dfg', '2017-06-08 08:06:45'),
(175, '1148028615273079', 'Pratik', 'dehydration', '2017-06-08 08:06:35'),
(176, '1148028615273079', 'Pratik', 'ad', '2017-06-08 08:06:12'),
(177, '1148028615273079', 'Pratik', 'asd', '2017-06-08 08:06:16'),
(178, '1148028615273079', 'Pratik', 'dehydration', '2017-06-08 08:06:12'),
(179, '1378853412191169', 'Nishant', 'hi', '2017-06-08 11:06:59'),
(180, '1378853412191169', 'Nishant', 'test', '2017-06-08 11:06:03'),
(181, '1378853412191169', 'Nishant', 'vitamin', '2017-06-08 11:06:08'),
(182, '1148028615273079', 'Pratik', 'vitamin', '2017-06-09 00:06:04'),
(183, '1148028615273079', 'Pratik', 'hi', '2017-06-09 00:06:33'),
(299, '1148028615273079', 'Pratik', 'hospital', '2017-06-09 08:06:16'),
(300, '1148028615273079', 'Pratik', 'dehydration', '2017-06-09 08:06:39'),
(304, '1148028615273079', 'Pratik', 'vitamin', '2017-06-09 09:06:21'),
(305, '1148028615273079', 'Pratik', 'vitamin dehydration', '2017-06-09 09:06:53'),
(306, '1148028615273079', 'Pratik', 'dehydration', '2017-06-09 09:06:02'),
(307, '1148028615273079', 'Pratik', 'vitamin', '2017-06-09 09:06:09'),
(308, '1148028615273079', 'Pratik', 'vitamin c', '2017-06-09 09:06:18'),
(309, '1148028615273079', 'Pratik', 'dehydration', '2017-06-09 09:06:01'),
(310, '1148028615273079', 'Pratik', 'vitamin', '2017-06-09 09:06:37'),
(311, '1148028615273079', 'Pratik', 'dehydration', '2017-06-09 09:06:58'),
(312, '1148028615273079', 'Pratik', 'vitamin', '2017-06-09 09:06:24'),
(313, '1148028615273079', 'Pratik', 'dehydration', '2017-06-09 09:06:30'),
(314, '10211259919047088', 'Chintan', 'vitamin', '2017-06-09 09:06:08'),
(315, '10211259919047088', 'Chintan', 'dehydration', '2017-06-09 09:06:30'),
(316, '10211259919047088', 'Chintan', 'hello', '2017-06-09 09:06:55'),
(317, '1148028615273079', 'Pratik', 'asdad', '2017-06-09 10:06:28'),
(318, '1378853412191169', 'Nishant', 'vitamin', '2017-06-09 11:06:25'),
(319, '1378853412191169', 'Nishant', 'vitamin c', '2017-06-09 11:06:33'),
(320, '1378853412191169', 'Nishant', 'daily', '2017-06-09 11:06:39'),
(321, '1378853412191169', 'Nishant', 'glow', '2017-06-09 11:06:49'),
(322, '1378853412191169', 'Nishant', 'too', '2017-06-09 14:06:06'),
(323, '1378853412191169', 'Nishant', 'OTC', '2017-06-09 14:06:13'),
(324, '1378853412191169', 'Nishant', 'vitamin', '2017-06-09 14:06:20'),
(325, '1378853412191169', 'Nishant', 'bikram', '2017-06-09 14:06:54'),
(326, '1378853412191169', 'Nishant', ' ', '2017-06-09 14:06:26'),
(327, '1378853412191169', 'Nishant', 'cognitive', '2017-06-09 14:06:01'),
(328, '1378853412191169', 'Nishant', 'vitamin ', '2017-06-09 14:06:54'),
(329, '1378853412191169', 'Nishant', 'OTC', '2017-06-09 14:06:25'),
(371, '1001', 'Guest', 'sa', '2017-06-10 03:06:15'),
(372, '1001', 'Guest', 'dehydration', '2017-06-10 03:06:24'),
(373, '1001', 'Guest', 'bikram', '2017-06-10 03:06:11'),
(374, '1001', 'Guest', 'DEHYDRATION ', '2017-06-10 03:06:52'),
(375, '1001', 'Guest', 'Feeling cold', '2017-06-10 03:06:08'),
(376, '1001', 'Guest', 'otc', '2017-06-10 03:06:23'),
(379, '1001', 'Guest', 'hi', '2017-06-11 13:06:04'),
(380, '1001', 'Guest', 'vitamin', '2017-06-11 13:06:07'),
(381, '1001', 'Guest', 'uk', '2017-06-11 13:06:34'),
(382, '1001', 'Guest', 'vitamin', '2017-06-11 13:06:39'),
(383, '1001', 'Guest', 'vitamin', '2017-06-11 13:06:39'),
(384, '1001', 'Guest', 'vitamin', '2017-06-11 13:06:04'),
(385, '1001', 'Guest', 'what the heck?', '2017-06-11 15:06:12'),
(386, '1001', 'Guest', 'eni mane', '2017-06-11 15:06:17'),
(387, '1001', 'Guest', 'suck', '2017-06-11 15:06:22'),
(388, '1001', 'Guest', 'fuck', '2017-06-11 15:06:24'),
(389, '1001', 'Guest', 'wow', '2017-06-11 15:06:31'),
(390, '1001', 'Guest', 'I have a headache. what to do?', '2017-06-11 15:06:46'),
(391, '1001', 'Guest', 'I want to be younger. what vitamin to take?', '2017-06-11 15:06:20'),
(392, '1001', 'Guest', 'no', '2017-06-11 15:06:42'),
(393, '1001', 'Guest', 'yes', '2017-06-11 15:06:44'),
(394, '1001', 'Guest', 'why', '2017-06-11 15:06:46'),
(395, '1001', 'Guest', '?', '2017-06-11 15:06:48'),
(396, '1001', 'Guest', 'improve health', '2017-06-11 15:06:55'),
(397, '1001', 'Guest', 'what to do to get better health?', '2017-06-11 15:06:07'),
(398, '1001', 'Guest', 'vitamin', '2017-06-11 17:06:37'),
(399, '1378853412191169', 'Nishant', 'OTC', '2017-06-11 19:06:14'),
(400, '1378853412191169', 'Nishant', 'vitamin', '2017-06-11 19:06:24'),
(401, '1148028615273079', 'Pratik', 'dehydration', '2017-06-12 02:06:50'),
(402, '1148028615273079', 'Pratik', 'dehydration', '2017-06-12 02:06:58'),
(403, '1148028615273079', 'Pratik', 'dehydration', '2017-06-12 02:06:12'),
(404, '1148028615273079', 'Pratik', 'dehydration', '2017-06-12 02:06:39'),
(494, '1378853412191169', 'Nishant', 'vitamin c', '2017-06-12 15:06:42'),
(509, '1001', 'Guest', 'hello', '2017-06-13 12:06:45'),
(510, '1001', 'Guest', 'vitamin', '2017-06-13 12:06:51'),
(511, '1378853412191169', 'Nishant', 'otc', '2017-06-13 13:06:51'),
(512, '1378853412191169', 'Nishant', 'vitamin c', '2017-06-13 13:06:36'),
(513, '1378853412191169', 'Nishant', 'test', '2017-06-13 16:06:35'),
(514, '1378853412191169', 'Nishant', 'one', '2017-06-13 16:06:38'),
(515, '1378853412191169', 'Nishant', 'two', '2017-06-13 16:06:41'),
(516, '1148028615273079', 'Pratik', 'vitamin', '2017-06-14 01:06:53'),
(517, '1001', 'Guest', 'dehydration', '2017-06-14 04:06:34'),
(518, '1001', 'Guest', 'vitami', '2017-06-14 04:06:51'),
(519, '1148028615273079', 'Pratik', 'ghj', '2017-06-14 06:06:08'),
(520, '1148028615273079', 'Pratik', 'vvv', '2017-06-14 08:06:46'),
(521, '1148028615273079', 'Pratik', 'dfss', '2017-06-14 08:06:03'),
(522, '1148028615273079', 'Pratik', 'dehydration', '2017-06-14 08:06:29'),
(523, '1148028615273079', 'Pratik', 'dehydration', '2017-06-14 08:06:45'),
(524, '1148028615273079', 'Pratik', 'dehydration', '2017-06-14 08:06:25'),
(525, '1148028615273079', 'Pratik', 'body', '2017-06-14 08:06:34'),
(527, '1378853412191169', 'Nishant', 'OTC', '2017-06-14 13:06:16'),
(528, '1378853412191169', 'Nishant', 'otc', '2017-06-14 13:06:47'),
(529, '1378853412191169', 'Nishant', 'vitamin c', '2017-06-14 13:06:52'),
(530, '1378853412191169', 'Nishant', 'vitamin', '2017-06-14 13:06:57'),
(531, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 05:06:13'),
(532, '1148028615273079', 'Pratik', 'ssadasd', '2017-06-15 05:06:00'),
(533, '1148028615273079', 'Pratik', 'sad', '2017-06-15 08:06:20'),
(534, '1148028615273079', 'Pratik', 'kmm', '2017-06-15 08:06:20'),
(535, '1148028615273079', 'Pratik', 'asdd', '2017-06-15 08:06:42'),
(536, '1148028615273079', 'Pratik', 'asdad', '2017-06-15 08:06:04'),
(537, '1148028615273079', 'Pratik', 'asd', '2017-06-15 08:06:39'),
(538, '1148028615273079', 'Pratik', 'asdad', '2017-06-15 08:06:46'),
(539, '1148028615273079', 'Pratik', 'asda', '2017-06-15 08:06:20'),
(540, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 08:06:37'),
(541, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 08:06:39'),
(542, '1148028615273079', 'Pratik', 'vitamin dehydration', '2017-06-15 08:06:47'),
(543, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 08:06:52'),
(544, '1148028615273079', 'Pratik', 'vitamin ', '2017-06-15 08:06:23'),
(545, '1148028615273079', 'Pratik', '', '2017-06-15 08:06:25'),
(546, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 08:06:37'),
(547, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 08:06:53'),
(548, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 08:06:53'),
(549, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 08:06:22'),
(550, '1148028615273079', 'Pratik', 'sadadas', '2017-06-15 09:06:23'),
(551, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 09:06:55'),
(552, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 09:06:35'),
(553, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 09:06:47'),
(554, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 09:06:02'),
(555, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 09:06:11'),
(556, '1148028615273079', 'Pratik', 'dehydration', '2017-06-15 09:06:27'),
(557, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 09:06:17'),
(558, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 09:06:41'),
(559, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 09:06:51'),
(560, '1148028615273079', 'Pratik', 'vitamin', '2017-06-15 09:06:33'),
(561, '10211259919047088', 'Chintan', 'hospital', '2017-06-15 10:06:19'),
(562, '10211259919047088', 'Chintan', 'vitamin', '2017-06-15 10:06:49'),
(563, '10211259919047088', 'Chintan', 'vitamin', '2017-06-15 10:06:14'),
(564, '1378853412191169', 'Nishant', 'vitamin', '2017-06-15 14:06:53'),
(565, '1378853412191169', 'Nishant', 'vitamin', '2017-06-15 14:06:02'),
(566, '1378853412191169', 'Nishant', 'vitamin', '2017-06-15 14:06:16'),
(567, '1001', 'Guest', 'vitamin', '2017-06-15 14:06:42'),
(568, '1001', 'Guest', 'vitamin', '2017-06-15 14:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `key_id` int(4) NOT NULL AUTO_INCREMENT,
  `colname` varchar(30) DEFAULT NULL,
  `titletag` text,
  `keywordtag` text,
  `descrtag` text,
  `alttag` text,
  `dateadded` date DEFAULT NULL,
  PRIMARY KEY (`key_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `descr` text,
  `news_txt` text,
  `date_added` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `ishome` int(4) NOT NULL,
  `issidebar` int(4) NOT NULL,
  `image_path` varchar(200) DEFAULT NULL,
  `image_thumb_path` varchar(200) DEFAULT NULL,
  `pagetitle` varchar(200) DEFAULT NULL,
  `titletag` text,
  `keywordtag` text,
  `descrtag` text,
  `alttag` text,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `descr`, `news_txt`, `date_added`, `status`, `ishome`, `issidebar`, `image_path`, `image_thumb_path`, `pagetitle`, `titletag`, `keywordtag`, `descrtag`, `alttag`) VALUES
(2, '9 WEIRD THINGS DEHYDRATION DOES TO YOUR BODY', 'I am convinced Bikram yoga would kill me. I''m just too sweaty.\r\n\r\nI can produce a puddle of sweat under a spin bike that a small child could swim in. I don''t wear gray. I was poked and prodded by doctors who thought there could be an underlying thyroid problem to explain my drenched T-shirts. But no, every expert came to the same nonmedical, totally unhelpful conclusion: I am a sweaty person.', 'It took me a while to be anything but embarrassed by my tendency (being bestowed the nickname "Sweats" by my soccer teammates certainly didn''t help). And before I had learned to just accept my sweatiness or risk never lifting my arms above my head again, things got a little scary.\r\n\r\nRelated: 20 Super-Healthy Smoothie Recipes\r\n\r\nThe first time I got seriously dehydrated, I was just trying to make varsity. A week of two-a-day high school soccer tryouts terminated in a scrimmage one particularly hot August afternoon, and by the end of the game I had stopped sweating and lost all the color in my usually flushed face. Eventually, my cramping legs buckled as I tried to get out of my dad''s car in our driveway.\r\n\r\nMix dehydration with high temps and you''ve got a pretty perfect recipe for heat illness, an experience I am eager not to repeat. I had to learn the signs my body''s water tank was running low: a scratchy, salty film that dries on my face; feeling cool in the middle of a 90-minute game in the summer. Seriously, I should buy stock in Gatorade.', '2017-06-07', 1, 1, 1, 'images/articles/blog_1.jpg', 'images/articles/blog_thumb_1.jpg', NULL, NULL, NULL, NULL, NULL),
(3, 'DEHYDRATION AFFECTING PERFORMANCE OF HOSPITAL CLINICIAN', 'The cognitive function of a “significant” number of hospital nurses may be impaired because they are turning up for work dehydrated or not taking on sufficient fluids during shifts, according to UK researchers.', 'The cognitive function of a “significant” number of hospital nurses may be impaired because they are turning up for work dehydrated or not taking on sufficient fluids during shifts, according to UK researchers.\r\n\r\n \r\n\r\nThe study authors noted that dehydration of as little 2% of total body weight may impair physical and cognitive performance.\r\n\r\n“A significant proportion of nurses and doctors were dehydrated at the start and end of medical and surgical shifts”\r\n\r\nStudy authors\r\nTheir study, published in the journal Clinical Nutrition, was to investigate the prevalence of dehydration at the start and end of shifts in nurses and doctors on-call.\r\n\r\nThe research involved 88 nurses and doctors working on medical and surgical admissions wards at Nottingham University Hospitals NHS Trust.\r\n\r\nParticipants arrived on the ward approximately 20 minutes before their shift and were asked to provide a urine sample. Height and weight were then measured.\r\n\r\nCognitive function was assessed using a series of computer-based tests including the Stroop Colour Naming Interference Test and Sternberg Memory Paradigm.\r\n\r\nParticipants then worked normally, but were asked to keep a fluid diary for the duration of their shift and fluid balance was estimated. The tests were then repeated at the end of the shift.\r\n\r\nThe researchers found 36% of participants were dehydrated at the start of the shift and 45% were dehydrated at the end of their shift.\r\n\r\nThey also found that single number and five-letter Sternberg short-term memory tests were significantly impaired in dehydrated participants.\r\n\r\n“This study highlights that a significant proportion of nurses and doctors were dehydrated at the start and end of medical and surgical shifts,” said the researchers in the journal Clinical Nutrition.\r\n\r\n“Dehydration was associated with some impairment of cognitive function,” they added the study authors who were led by Mr Ahmed El-Sharkawy from Nottingham University.\r\n\r\nStay Rehydrated with TRIORAL Oral Rehydration Salts.....  Natural Orange Flavor with Stevia Extract Coming Soon!!!', '2017-06-07', 1, 1, 1, 'images/articles/blog_1.jpg', 'images/articles/blog_thumb_1.jpg', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `upc` varchar(15) DEFAULT NULL,
  `pro_descr` text,
  `keywords` text NOT NULL,
  `ingredients` text NOT NULL,
  `howtouse` text NOT NULL,
  `image_path` text,
  `image_thumb_path` text,
  `price` float(5,2) DEFAULT NULL,
  `titletag` text,
  `keywordtag` text,
  `descrtag` text,
  `alttag` text,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `upc`, `pro_descr`, `keywords`, `ingredients`, `howtouse`, `image_path`, `image_thumb_path`, `price`, `titletag`, `keywordtag`, `descrtag`, `alttag`) VALUES
(1, 'Vitamin C Daily Glow Cleansing Polish', '7915285901', '<p>This daily radiance-revealing facial wash cleanses and exfoliates skin in one step to reveal fresh glowing skin.</p>\r\n\r\n<ul>\r\n	<li>Best for dull skin and those in need of a daily facial cleansing wash</li>\r\n	<li>Contains camu camu berry with 20x more Vitamin C than an orange</li>\r\n	<li>For a concentrated skin treatment after washing, pair with Drops of Youth Concentrate</li>\r\n</ul>\r\n', 'Helped to reduce fever\r\nProtect skin from the effects of aging\r\nHelped to grow and strengthen hair\r\n& other uses', 'Aqua/Water/Eau, Glycerin, Cocamidopropyl Betaine, Coco-Glucoside, Sodium Laureth Sulfate, Polylactic Acid, Sodium Chloride, Acrylates/C10-30 Alkyl Acrylate Crosspolymer, Phenoxyethanol, Benzyl Alcohol, Xanthan Gum, Magnesium Ascorbyl Phosphate, Jojoba Esters, Sodium Benzoate, Sodium Hydroxide, Parfum/Fragrance, Sodium Citrate, Sodium Gluconate, Disodium EDTA, Linalool, Limonene, Benzyl Benzoate, Aloe Barbadensis Leaf Juice, Myrciaria Dubia Fruit Extract, Phosphoric Acid, CI 77492/Iron Oxides, CI 73360/Red 30.', 'Wet the face and neck with clean water. Massage over the face and neck using light circular motions. Rinse off with clean water and pat skin dry.', 'product_3_0.jpg,product_3_1.jpg,product_3_2.jpg,product_3_3.jpg,', 'thumb_product_3_0.jpg,thumb_product_3_1.jpg,thumb_product_3_2.jpg,thumb_product_3_3.jpg,', 16.00, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `q_id` int(4) NOT NULL AUTO_INCREMENT,
  `product_id` int(4) NOT NULL,
  `q_value` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `q_help` int(11) NOT NULL,
  `q_unhelp` int(11) NOT NULL,
  `q_date` datetime NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `product_id`, `q_value`, `author`, `q_help`, `q_unhelp`, `q_date`) VALUES
(1, 1, 'How is this different from the glow boosting microdermabrasion exfoliator?', '', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(1) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keywords` text NOT NULL,
  `seo_description` text NOT NULL,
  `site_template` varchar(100) NOT NULL,
  `direct_links` int(1) NOT NULL,
  `new_items_number` int(2) NOT NULL,
  `top_hits_items_number` int(2) NOT NULL,
  `category_items_number` int(2) NOT NULL,
  `ad_slot_728` text NOT NULL,
  `ad_slot_300` text NOT NULL,
  `friendly_urls` int(1) NOT NULL,
  `pagination_style` int(1) NOT NULL,
  `display_rss` int(1) NOT NULL,
  `display_category_rss` int(1) NOT NULL,
  `rss_items_number` int(4) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `display_calendar` int(1) NOT NULL,
  `google_analytics` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sysadmin`
--

CREATE TABLE IF NOT EXISTS `sysadmin` (
  `sysadmin_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `isactive` int(2) DEFAULT '1',
  `email` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`sysadmin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sysadmin`
--

INSERT INTO `sysadmin` (`sysadmin_id`, `name`, `username`, `password`, `isactive`, `email`) VALUES
(1, 'Ercado Inc.', 'ercado', 'a1012b4779da6148d3d23ea5c4cb62bb', 1, 'chintan@ercado.com');

-- --------------------------------------------------------

--
-- Table structure for table `transection`
--

CREATE TABLE IF NOT EXISTS `transection` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text,
  `product_id` text,
  `unit` int(11) DEFAULT NULL,
  `delivery_type` text NOT NULL,
  `status` text,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `transection`
--

INSERT INTO `transection` (`trans_id`, `user_id`, `product_id`, `unit`, `delivery_type`, `status`) VALUES
(4, '', '', 0, '', 'cart added'),
(5, '', 'temporary', 0, '', 'cart added'),
(6, '', 'temporary', 0, '', 'cart added'),
(7, 'Pratik', '', 0, '0-days', 'cart added'),
(8, '1148028615273079', '1', 1, '2-days', 'cart added'),
(9, '1148028615273079', '1', 4, '2-days', 'cart added'),
(10, '1148028615273079', '1', 1, '2-days', 'cart added'),
(11, '1148028615273079', '1', 1, '', 'cart added'),
(12, '1148028615273079', '1', 1, '2-days', 'cart added'),
(13, '1148028615273079', '1', 1, '', 'cart added');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(1, 'facebook', '1303806699665113', 'Ashvin', 'Parmar', 'ashvin.parmar16@yahoo.com', 'male', 'en_US', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/13240053_1084899218222530_6308417072573423023_n.jpg?oh=704ec3d7c0fff257479306be4ed3b238&oe=59E02F26', 'https://www.facebook.com/app_scoped_user_id/1303806699665113/', '2017-06-06 10:16:33', '2017-06-12 07:25:57'),
(2, 'facebook', '1507112256007234', 'Rikin', 'Bhavsar', 'riki0388@gmail.com', 'male', 'en_GB', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/12809798_1089973641054433_5819858207097047925_n.jpg?oh=625a5bc838b5abeb51e5bb17b77277ff&oe=59D48FA8', 'https://www.facebook.com/app_scoped_user_id/1507112256007234/', '2017-06-07 00:55:36', '2017-06-10 02:04:51'),
(3, 'facebook', '1148028615273079', 'Pratik', 'Patel', 'ppratik2410@gmail.com', 'male', 'en_GB', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c0.0.50.50/p50x50/14606325_1102800433129231_180185075500000271_n.jpg?oh=4c769e52eb67bbe7dc26541cfe619236&oe=59E9B72D', 'https://www.facebook.com/app_scoped_user_id/1148028615273079/', '2017-06-07 00:58:51', '2017-06-15 10:15:21'),
(4, 'facebook', '1378853412191169', 'Nishant', 'Vyas', 'nishantvyas@gmail.com', 'male', 'en_US', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/11217664_882563808486801_3828505759910077439_n.jpg?oh=37a019b975c1293ccd5383bc7cd09451&oe=59A1713E', 'https://www.facebook.com/app_scoped_user_id/1378853412191169/', '2017-06-07 14:18:09', '2017-06-15 15:45:25'),
(5, 'facebook', '10211259919047088', 'Chintan', 'Trivedi', 'chintanhtrivedi@gmail.com', 'male', 'en_US', 'https://scontent.xx.fbcdn.net/v/t1.0-1/c7.0.50.50/p50x50/11917490_10206238254428611_6072101548164282654_n.jpg?oh=37c2b1b14bfba6c0b7fc227735d4fe36&oe=59D06F0D', 'https://www.facebook.com/app_scoped_user_id/10211259919047088/', '2017-06-09 09:44:27', '2017-06-15 10:20:42');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
