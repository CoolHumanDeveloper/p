-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2017 at 11:25 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `909638`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `parent` int(8) DEFAULT NULL,
  `usest` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `usest`) VALUES
(1, 'web', 0, NULL),
(2, 'mobile', 0, NULL),
(3, 'game', 0, NULL),
(4, 'Landing Pages', 1, NULL),
(5, 'Coming Soon', 4, NULL),
(6, 'Launch', 4, NULL),
(7, 'Campaign', 4, NULL),
(8, 'Creative Arts', 1, NULL),
(9, 'Business', 1, NULL),
(10, 'Online Store', 1, NULL),
(11, 'Photography', 1, NULL),
(12, 'Music', 1, NULL),
(13, 'Design', 1, NULL),
(14, 'Restaurant & Food', 1, NULL),
(15, 'Accommodation', 1, NULL),
(16, 'Events', 1, NULL),
(17, 'Portfolio & CV', 1, NULL),
(18, 'Blog', 1, NULL),
(19, 'Health & Wellness', 1, NULL),
(20, 'Fashion & Beauty', 1, NULL),
(21, 'Community & Education', 1, NULL),
(22, 'Consulting & Coaching', 9, NULL),
(23, 'Services & Maintenance', 9, NULL),
(24, 'Advertising & Marketing', 9, NULL),
(25, 'Automotive & Cars', 9, NULL),
(26, 'Real Estate', 9, NULL),
(27, 'Finance & Law', 9, NULL),
(28, 'Technologe & Apps', 9, NULL),
(29, 'Pets & Animals', 9, NULL),
(30, 'Clothing & Accessories', 10, NULL),
(31, 'Health & Beauty', 10, NULL),
(32, 'Home & Electronics', 10, NULL),
(33, 'Events & Portraits', 11, NULL),
(34, 'Commercial & Editorial', 11, NULL),
(35, 'Travel & Documentary', 11, NULL),
(36, 'Solo Artist', 12, NULL),
(37, 'Band', 12, NULL),
(38, 'DJ', 12, NULL),
(39, 'Music Industry', 12, NULL),
(40, 'Designer', 13, NULL),
(41, 'Agency', 13, NULL),
(42, 'Portfolio', 13, NULL),
(43, 'Restaurant', 14, NULL),
(44, 'Cafe & Bakery', 14, NULL),
(45, 'Bar & Club', 14, NULL),
(46, 'Catering & Chef', 14, NULL),
(47, 'Food & Drinks', 14, NULL),
(48, 'Hotels', 15, NULL),
(49, 'Vacation Rentals', 15, NULL),
(50, 'B&B', 15, NULL),
(51, 'Camping & Hostels', 15, NULL),
(52, 'Travel', 15, NULL),
(53, 'Weddings & Celebrations', 16, NULL),
(54, 'Event Production', 16, NULL),
(55, 'Performance & Shows', 16, NULL),
(56, 'Parties & Festivals', 16, NULL),
(57, 'Portfolios', 17, NULL),
(58, 'Resumes & CVs', 17, NULL),
(59, 'Personal', 17, NULL),
(60, 'Health', 19, NULL),
(61, 'Wellness', 19, NULL),
(62, 'Sport & Recreation', 19, NULL),
(63, 'Hair & Beauty', 20, NULL),
(64, 'Fashion & Accessories', 20, NULL),
(65, 'Community', 21, NULL),
(66, 'Education', 21, NULL),
(67, 'Religion & Non Profit', 21, NULL),
(68, 'Painters & Illustrators', 8, NULL),
(69, 'Performing', 8, NULL),
(70, 'Writers', 8, NULL),
(71, 'Entertainment', 8, NULL),
(72, 'Dating', 1, NULL),
(73, 'Text Chating', 72, NULL),
(74, 'Voice Chating', 72, NULL),
(75, 'Video Chating', 72, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hashurl`
--

DROP TABLE IF EXISTS `hashurl`;
CREATE TABLE IF NOT EXISTS `hashurl` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `src` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hashurl` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `hashurl`
--

INSERT INTO `hashurl` (`id`, `src`, `hashurl`) VALUES
(1, 'Mario Gomez/1/v/1', 'KTBBNFZK9A3IRAVF'),
(2, 'Mario Gomez/1/ms/2', 'AJWHQ3YBWTOT6PQS'),
(3, 'Mario Gomez/1/ws/1', 'X5ERL5DBUWEFAB2I'),
(4, 'Mario Gomez/1/v/2', 'QF1DVFU1VT8JCR62'),
(5, 'Mario Gomez/1/v/3', 'V0PTWWV3DC3QUU7D'),
(6, 'Eduardo Alfonzo/3/v/4', 'XLNHLHL2ZHCY4FJL'),
(7, 'Eduardo Alfonzo/3/v/3', '9O9YIKKOMPPCQP7W'),
(8, 'Eduardo Alfonzo/3/v/2', 'Y2WEWDKA2WVOE56U'),
(9, 'Eduardo Alfonzo/3/v/1', 'MIAXSDTCHL7M6H2W'),
(10, 'Eduardo Alfonzo/3/s/codeigniter', 'UHEAGRT52ZC4A8G6'),
(11, 'Eduardo Alfonzo/3/ws/1', '8OWCDLH1FMUU6P1C'),
(12, 'Mario Gomez/1/v/4', 'PKAOR1VBC1Q6TGSA'),
(13, 'Mario Gomez/1/v/5', '0R9PTL3U3YVM6QT8'),
(14, 'Eduardo Alfonzo/3/v/5', 'YA1Z2PC8CZ68TXQE'),
(15, 'Mario Gomez/1/ws/4', 'WCIWD4C9TBX1VLJE'),
(16, 'Mario Gomez/1/ws/8', 'GTOR8PBKCC8B7SAQ'),
(17, 'Mario Gomez/1/ws/9', 'TPVNDTJL597MFRUZ'),
(18, 'Mario Gomez/1/ws/10', 'LHN4TA21CMA56QHN'),
(19, 'Mario Gomez/1/ws/17', 'YA25RUFEIK1O808H'),
(20, 'Mario Gomez/1/ws/14', 'EIXUCZ1B1FCRQAAM'),
(21, 'Mario Gomez/1/v/6', 'H4VT7LZXYTBN5810'),
(22, 'Mario Gomez/1/v/7', 'L046MCMX94XYM4AX'),
(23, 'Mario Gomez/1/v/8', 'UHPUV4QYUI2Z7SBS'),
(24, 'Mario Gomez/1/v/9', '1LBT4J88FX8EPIB7'),
(25, 'Mario Gomez/1/gs/3', '9OUKAO9R6IQBDCOJ'),
(26, 'David Beckham/5/v/9', 'XQAA2F3PMDDRMQ64'),
(27, 'David Beckham/5/v/8', 'CNMSJ0PBAYCT6KEY'),
(28, 'David Beckham/5/v/7', 'XF3B61U6M6QUSIQ9'),
(29, 'David Beckham/5/v/6', 'TKOHWAJZD8XLO111'),
(30, 'David Beckham/5/v/5', 'P0UIQA82EA4K4UMS'),
(31, 'David Beckham/5/v/3', 'JTNKVDS8KBQCAA1N'),
(32, 'David Beckham/5/v/2', 'E08QCKBW536BUFMU'),
(33, 'David Beckham/5/v/1', 'ZITQFI2VA3OXWI5S'),
(34, 'David Beckham/5/ws/1', '0116YQHGLEBABTZ7'),
(35, 'Georg Munz/2/v/9', '7X5OFDV7E4EQN9PS'),
(36, 'Georg Munz/2/v/8', 'SQWDQWSOL288X2BB'),
(37, 'Georg Munz/2/v/7', 'JK2T9BMG0CCRHDU0'),
(38, 'Georg Munz/2/v/6', 'O860TZKDMVXE3MA7'),
(39, 'Georg Munz/2/v/5', 'DMHCLEGKV5TLIX07'),
(40, 'Georg Munz/2/v/3', 'P2G3NOPU7TIW8WV2'),
(41, 'Georg Munz/2/v/2', 'MPAARPX1DNDK1CIS'),
(42, 'Georg Munz/2/v/1', 'ORZO64OASNKY0CIO'),
(43, 'Georg Munz/2/ws/1', 'WG6J8TJRYGIWFXGD'),
(44, 'Eduardo Alfonzo/3/v/9', 'IJDVX9N8IZVS9IEW'),
(45, 'Eduardo Alfonzo/3/v/8', 'WDX1HUQJ0DAGX63D'),
(46, 'Eduardo Alfonzo/3/v/7', 'KJZQDF0R3W2MGYV0'),
(47, 'Eduardo Alfonzo/3/v/6', 'T7ZS8AYIZSS88C7T'),
(48, 'Eric Durbin/6/v/9', 'X9TIAU0M9498PK84'),
(49, 'Eric Durbin/6/v/8', 'KMU41JNS5RWEDDC7'),
(50, 'Eric Durbin/6/v/7', 'FLCVFSYMNWKWJ3DP'),
(51, 'Eric Durbin/6/v/6', 'D4MQ7A5XGVCCFKJB'),
(52, 'Eric Durbin/6/v/5', 'VWN3SKDPWDDYCPS6'),
(53, 'Eric Durbin/6/v/3', '88H4Q7MV9F6MQGPD'),
(54, 'Eric Durbin/6/v/2', 'Q11KLDWSJ0TP7SBK'),
(55, 'Eric Durbin/6/v/1', 'XDEDO7ZSKPH8S7NG'),
(56, 'Eric Durbin/6/ws/1', 'Z81714JVBPKI75YX'),
(57, 'Boris Antonov/7/v/9', 'OANAT6WCNEDPMVT1'),
(58, 'Boris Antonov/7/v/8', 'CCZRJ3QB8B2VPNWH'),
(59, 'Boris Antonov/7/v/7', 'X7H7G54BZBD43LYB'),
(60, 'Boris Antonov/7/v/6', '3TXDXZNMSOVSCTT9'),
(61, 'Boris Antonov/7/v/5', 'QGQVZTKRZQLZMSPY'),
(62, 'Boris Antonov/7/v/3', 'G0PZOZWM6Y3QG0BR'),
(63, 'Boris Antonov/7/v/2', 'SM0DUUN53FRHVXII'),
(64, 'Boris Antonov/7/v/1', 'C010RFGYJAWY1CNG'),
(65, 'Boris Antonov/7/ws/1', 'NKGEORBLRO8BSO7Y'),
(66, 'Georg Munz/2/s/wordpress', 'CJYR0CUCVO9B6Y9Z'),
(67, 'Eduardo Alfonzo/3/s/wordpress', '8Z95TD8HBUOFE49S'),
(68, 'Eduardo Alfonzo/3/s/joomla', 'KNUXMAI9ULH6TUT3'),
(69, 'Eduardo Alfonzo/3/s/laravel', 'PT6M9QOM7FVDYA1O'),
(70, 'Boris Antonov/7/s/codeigniter', 'NA9FY65W7HLEWRVQ'),
(71, 'Hans Albert/8/v/9', 'PURWNZ1580DX1Q9W'),
(72, 'Hans Albert/8/v/8', 'A0SQMPUJTZLUX82E'),
(73, 'Hans Albert/8/v/7', 'P35XDPESXFVURMZA'),
(74, 'Hans Albert/8/v/6', '4M7Q1XR8ILAK8Q5O'),
(75, 'Hans Albert/8/v/5', '9TNUWF3FOS0S4LQQ'),
(76, 'Hans Albert/8/v/3', 'QX6RQ5TURHWOMESS'),
(77, 'Hans Albert/8/v/2', 'S0B8MDUYA5EJX5CI'),
(78, 'Hans Albert/8/v/1', '1A4KNEO6QOZZQL5T'),
(79, 'Hans Albert/8/ws/1', 'LIQ4XDK79NEDQI1G'),
(80, 'Jean Holmen/9/v/9', 'M0LEWSUCBY533LZD'),
(81, 'Jean Holmen/9/v/8', 'LJUVP5KFFV9LVSCL'),
(82, 'Jean Holmen/9/v/7', '661DVURIF0HZ6IUL'),
(83, 'Jean Holmen/9/v/6', 'JDUHLULTC2O85565'),
(84, 'Jean Holmen/9/v/5', 'S2NTPUMZULCH83Z3'),
(85, 'Jean Holmen/9/v/3', '2182W68C58R53QD1'),
(86, 'Jean Holmen/9/v/2', 'FSO1MVY9C5N8ENS7'),
(87, 'Jean Holmen/9/v/1', '3AENN8AH6RPONCHY'),
(88, 'Jean Holmen/9/ws/1', 'B8WDFTF31CD5XZOD'),
(89, 'Scott/10/v/9', 'XDW7TPUA0J2GRKTE'),
(90, 'Scott/10/v/8', 'AAAIMQWFH1PGLLNV'),
(91, 'Scott/10/v/7', 'RHAZBEZH4169CWWZ'),
(92, 'Scott/10/v/6', 'SJXZIC7YAKTD27OL'),
(93, 'Scott/10/v/5', 'IPVUBDPWZ6979GR8'),
(94, 'Scott/10/v/3', '0AID09KOVSGPQEUM'),
(95, 'Scott/10/v/2', '7RNB29L34AEKMVRV'),
(96, 'Scott/10/v/1', 'C8R70JFK4SKMT83K'),
(97, 'Scott/10/ws/1', 'ZHLD209EP3D8OZTF'),
(98, 'Scott/10/s/codeigniter', 'KW5BJYJS0GDJHDO9'),
(99, 'Scott/10/s/wordpress', 'SLWM8KCOLJPPAU37'),
(100, 'Eduardo Alfonzo/3/ms/2', '109IPGV1N6CXCISZ'),
(101, 'Eduardo Alfonzo/3/gs/3', 'ICE5HGYJ39Z34TFO'),
(102, 'Boris Antonov/7/ws/4', '77G78OQY69L5TNO1'),
(103, 'Boris Antonov/7/ms/2', 'ICQWQJP2BZKACKM6'),
(104, 'Boris Antonov/7/gs/3', 'M4WTT17VKFZW08ET');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `subject` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `previmg` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cprivate` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cpublic` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `category` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `subject`, `previmg`, `cprivate`, `cpublic`, `category`) VALUES
(1, 'Dating site', '1455069332_1.png', 'Codeigniter, php, mysql, LAMP\r\ntext chating, video/audio chating', '<p><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455069111_1.png" style="width: 773px;"><br></p>', '1'),
(2, 'Safe travles', '1455077224_1.png', 'Wordpress\r\nmobile\r\ntext chating\r\nhttp://www.safetravels.com/', '<p><a href="http://www.safetravels.com/" target="_blank"><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455076913_1.png" style="width: 880px;"></a></p><p><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455076944_1.png" style="width: 724px;"></p><p><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455077005_1.png" style="width: 300px;"><br></p>', '35,52,73'),
(3, 'Restaurant Site', '1455079782_1.png', 'Laravel, jquery, liveChat', '<p><a href="http://garagedoorsfl.com/" target="_blank"><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455079604_1.png" style="width: 1032px;"></a><br></p>', '43,73'),
(5, 'dleeventgroup', '1455086139_1.png', 'codeigniter, jquery, vimeo\r\nevent, advertising', '<p><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455085778_1.png" style="width: 1099px;"></p><p><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455085870_1.png" style="width: 1092px;"></p><p><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455085934_1.png" style="width: 1093px;"></p><p><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455085995_1.png" style="width: 1092px;"><br></p>', '24,33,53'),
(6, 'Models', '1455088286_1.png', 'cakePHP, jquery', '<p><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455088216_1.png" style="width: 952px;"></p><p><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455088247_1.png" style="width: 950px;"><br></p>', '24,30,31,42,54'),
(7, 'pelit Games', '1455090078_1.png', 'wordpress, jquery, youtube', '<p><a href="http://www.pelit.fi" target="_blank"><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455089914_1.png" style="width: 1042px;"></a><br></p>', '24,40,3'),
(8, 'BaseAndCo', '1455090684_1.png', 'wordpress, jquery', '<p><a href="http://www.baseandco.com/" target="_blank"><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455090395_1.png" style="width: 1074px;"></a><br></p>', '24,31,64'),
(9, 'Car Advertising', '1455092200_1.png', 'jquery', '<p><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455091939_1.png" style="width: 1090px;"></p><p><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455092021_1.png" style="width: 553px;"><img class="fr-dib" src="http://georg.ueuo.com/p/files/img/1455092073_1.png" style="width: 553px;"><br></p>', '24,25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `userpass` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `user_id`, `userpass`) VALUES
(1, 'Mario Gomez', 'mario', '*3246E403923D158A60D1411AF75ED8044E4174CA'),
(2, 'Georg Munz', 'georgmunz', '*2E9BD3C1F2F07AEC86E20D1FC531ABA7546836F1'),
(3, 'Eduardo Alfonzo', 'eduardoalfonzo', '*2E9BD3C1F2F07AEC86E20D1FC531ABA7546836F1'),
(4, 'Mobile Elite', 'mobile_toprate', '*910B7631C84FE17C0226E10EF6F2273BF120FC0A'),
(5, 'David Beckham', 'davidbeckham', '*2E9BD3C1F2F07AEC86E20D1FC531ABA7546836F1'),
(6, 'Eric Durbin', 'ericdurbin', '*2E9BD3C1F2F07AEC86E20D1FC531ABA7546836F1'),
(7, 'Boris Antonov', 'borisantonov', '*2E9BD3C1F2F07AEC86E20D1FC531ABA7546836F1'),
(8, 'Hans Albert', 'hansalbert', '*2E9BD3C1F2F07AEC86E20D1FC531ABA7546836F1'),
(9, 'Jean Holmen', 'jeanholmen', '*2E9BD3C1F2F07AEC86E20D1FC531ABA7546836F1'),
(10, 'Scott', 'scott', '*2E9BD3C1F2F07AEC86E20D1FC531ABA7546836F1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
