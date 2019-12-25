-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.16-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-03-06 23:17:04
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for auction
DROP DATABASE IF EXISTS `auction`;
CREATE DATABASE IF NOT EXISTS `auction` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `auction`;


-- Dumping structure for table auction.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table auction.category: ~10 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `title`) VALUES
	(1, 'Applicaties en software'),
	(2, 'Boten, schepen en vaartuigen'),
	(3, 'Deuren en afsluitmateriaal'),
	(4, 'Dieren'),
	(5, 'Electronica'),
	(6, 'Films en video'),
	(7, 'Garagebenodigdheden'),
	(8, 'Speelgoed'),
	(9, 'Spellen'),
	(10, 'Wapens');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Dumping structure for table auction.communication
CREATE TABLE IF NOT EXISTS `communication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) DEFAULT NULL,
  `reciever` int(11) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table auction.communication: ~7 rows (approximately)
/*!40000 ALTER TABLE `communication` DISABLE KEYS */;
INSERT INTO `communication` (`id`, `sender`, `reciever`, `message`) VALUES
	(1, 3, 6, 'Waarom zit je me steeds te stangen? Stop met dat irritante overbieden!'),
	(2, 6, 3, 'Ik weet niet, maar daarom heet dit een veiling, trut.'),
	(3, 3, 6, 'Ik krijg het lekker toch wel, irritant ventje.'),
	(4, 4, 10, 'Volgens mij heb jij en nep account, toch heb ik op je hamster geboden. Bots!'),
	(5, 10, 4, 'Jij dan, met je new kids account.'),
	(6, 4, 10, 'Maar ik zijt de èchte, kut!'),
	(7, 8, 6, 'Wil je alsjeblieft niet meer overbieden? Ik wil dat zwaard echt graag!');
/*!40000 ALTER TABLE `communication` ENABLE KEYS */;


-- Dumping structure for table auction.history
CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `offer` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Dumping data for table auction.history: ~28 rows (approximately)
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` (`id`, `user_id`, `item_id`, `date`, `time`, `offer`) VALUES
	(1, 6, 3, '2012-01-02', '14:32:12', 1.00),
	(2, 8, 3, '2012-01-02', '15:17:26', 1.00),
	(3, 6, 3, '2012-01-02', '16:12:08', 1.00),
	(4, 8, 3, '2012-01-02', '17:18:06', 1.00),
	(5, 9, 1, '2012-01-10', '19:20:06', 10.55),
	(6, 11, 2, '2012-01-06', '12:19:24', 99.99),
	(7, 5, 2, '2012-01-10', '15:47:31', 99.99),
	(8, 4, 4, '2012-01-02', '19:28:35', 5.13),
	(9, 7, 5, '2012-01-05', '10:22:16', 19.00),
	(10, 9, 5, '2012-01-05', '12:36:52', 19.25),
	(11, 9, 6, '2012-01-05', '12:40:12', 19.25),
	(12, 1, 7, '2012-01-05', '14:38:10', 20.00),
	(13, 2, 7, '2012-01-06', '03:04:33', 22.50),
	(14, 6, 8, '2012-01-04', '05:12:38', 40.00),
	(15, 3, 8, '2012-01-04', '08:36:29', 41.00),
	(16, 6, 8, '2012-01-04', '09:16:48', 41.35),
	(17, 3, 8, '2012-01-04', '10:54:56', 41.37),
	(18, 3, 9, '2012-01-06', '22:45:28', 80.00),
	(19, 6, 9, '2012-01-06', '23:14:57', 82.15),
	(20, 2, 10, '2012-01-08', '09:52:34', 15.00),
	(21, 9, 10, '2012-01-08', '10:33:10', 16.90),
	(22, 4, 10, '2012-01-08', '15:19:22', 16.93),
	(23, 5, 11, '2012-01-07', '20:15:30', 9.88),
	(24, 11, 12, '2012-01-10', '21:48:36', 30.00),
	(25, 8, 12, '2012-01-10', '22:53:15', 32.16),
	(26, 4, 13, '2012-01-09', '17:35:24', 11.60),
	(27, 7, 14, '2012-01-05', '16:30:10', 22.50),
	(28, 3, 14, '2012-01-05', '17:39:53', 23.46);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;


-- Dumping structure for table auction.item
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `added` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `current_offer` decimal(4,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table auction.item: ~14 rows (approximately)
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` (`id`, `title`, `description`, `added`, `start_time`, `current_offer`, `user_id`, `category_id`) VALUES
	(1, 'Technisch Lego', 'Gloedjenieuwe lego zo in originele doos.', '2012-01-10', '10:00:00', 10.55, 5, 8),
	(2, 'Bruine Labrador', 'Godnondenju een lieve hond, jonge!', '2012-01-05', '12:45:00', 99.99, 3, 4),
	(3, 'Samoerai zwaard', 'Een heel mooi samoerai zwaard uit 1280 uit Japan.', '2012-01-01', '18:30:00', 99.99, 11, 10),
	(4, 'Foeilelijke hamster', 'Een hamster uit een heel lelijk nest. Rode ogen, blauwe tanden en groen spul uit zijn oren.', '2012-01-01', '02:00:00', 5.13, 10, 4),
	(5, 'Avatar', 'Hele goede film over blauwe wezens die hun planeet beschermen.', '2012-01-05', '00:30:00', 19.25, 5, 6),
	(6, 'Avatar: The Game', 'Dit is het spel van de goede film.', '2012-01-05', '00:40:00', 19.25, 5, 9),
	(7, 'Avatar: The Game', 'Mijn spel is nieuw en nooit gebruikt.', '2012-01-05', '01:20:00', 22.50, 7, 9),
	(8, 'Gummiknuppel', 'Deze heb ik persoonlijk afgelopen voetbalwedstrijd van een wout afgepakt. Er zit nog een beetje bloed aan van de tand die ik eruit heb gemept. Bots!', '2012-01-02', '06:30:00', 41.37, 4, 10),
	(9, 'Voordeuren van voetbalstadion', 'Mooie originele voordeuren van het voetbalstadion in Maaskantje. Prijs is goedkoper als je de gummiknuppel erbij neemt!', '2012-01-02', '06:35:00', 82.15, 4, 3),
	(10, 'Crank 2', 'Geweldig leipe film over een gekke gozer.', '2012-01-08', '09:45:00', 16.93, 1, 6),
	(11, 'Gremlins', 'Geniaal bedachte film over leuke en gekke wezentjes.', '2012-01-06', '10:00:00', 9.88, 2, 6),
	(12, 'Moersleutelset', 'Een set met heel veel moersleutels', '2012-01-03', '11:22:00', 32.16, 9, 7),
	(13, 'Music Maker 17', 'Een Gouwe ouwe!', '2012-01-03', '14:15:00', 11.60, 7, 1),
	(14, 'Hangsloten', 'Een geweldige set hangsloten.', '2012-01-04', '16:30:00', 23.46, 5, 3);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;


-- Dumping structure for table auction.review
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table auction.review: ~2 rows (approximately)
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` (`id`, `user_id`, `item_id`, `date`, `time`, `message`) VALUES
	(1, 8, 3, '2012-01-02', '18:02:10', 'Echt een keimooi zwaard man! Het is zijn prijs zeker waard!'),
	(2, 3, 8, '2012-01-04', '12:23:43', 'Die knuppel is echt geweldig, alleen jammer genoeg staat er een serienummer op en stond die wout vanmiddag aan mijn deur om zijn knuppel op te halen. Hij mist zeker 4 tanden die gek!');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;


-- Dumping structure for table auction.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `emailaddress` varchar(100) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table auction.user: ~11 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `full_name`, `address`, `city`, `zipcode`, `emailaddress`, `phone`) VALUES
	(1, 'Techno55', 'Nontech7', 'Pascal van Dijk', 'Vliesendijk 69', 'Zierikzee', '4585OP', 'pvdijk@gmail.com', '31106129586'),
	(2, 'Chuw4g1rl', 'U4meno14u', 'Lilly Bergstoppel', 'Horsenzonde 3', 'Alblasserdam', '4578KL', 'lbergstoppel@gmail.com', '31786458576'),
	(3, 'Twirl_Freak', 'Kalumbo99', 'Sarah Hemelbreed', 'Plantageweg 8', 'Zwijndrecht', '3333TX', 'shemelbreed@gmail.com', '31786128594'),
	(4, 'BarryB', 'N3wk1dz', 'Barry Batsbak', 'Stoeplaan 29', 'Maaskantje', '9576LW', 'bbatsbak@gmail.com', '31106485756'),
	(5, 'Zwiber', 'D4tk4nn13t', 'Zerk Mimoen', 'Venuslaan 12', 'Vianen', '4673GN', 'zmimoen@gmail.com', '31648759434'),
	(6, 'Zonda', '4utofreak', 'Bart Pijpers', 'Nikkelrood 8', 'Utrecht', '9457RM', 'bpijpers@gmail.com', '31649758465'),
	(7, 'Yembah', 'Vr0ombats', 'Yerri Boomstam', 'Okenootweg 63', 'Ridderkerk', '3585IM', 'yboomstam@gmail.com', '31581246578'),
	(8, 'dddDomper', '5487575757', 'Dirk Deckers-Dijksma', 'Lelielaan 14', 'Lelystad', '1854PA', 'dddijksma@gmail.com', '31649578546'),
	(9, 'Draaideur', 'G3kkehuus', 'Jaap den Akker', 'Drachtenstraat 23', 'Drachten', '6654KE', 'jdakker@gmail.com', '31678456999'),
	(10, 'Lamsnikkel', 'D00perwt', 'Soeplepel van Soep', 'Soepkom 71', 'Soepjesstad', '1111AA', 'soepjesoep@soephuis.snel', '31123456789'),
	(11, 'Gertuss', 'Gr0enismooi', 'Gert Ussenweg', 'Rozenlaan 9', 'Rotterdam', '6352IO', 'gussenweg@gamil.com', '31645857695');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
