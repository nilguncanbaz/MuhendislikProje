-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 22 Oca 2018, 09:18:53
-- Sunucu sürümü: 5.7.19
-- PHP Sürümü: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookName` varchar(255) NOT NULL,
  `bDate` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `contacts`
--

INSERT INTO `contacts` (`id`, `bookName`, `bDate`, `author`) VALUES
(1, 'Başlangıç', '2017', 'Dan Brown'),
(2, 'Yüreğim Seni Çok Sevdi', '2007', 'Canan Tan'),
(3, 'Agapi Ölümsüz Aşk', '2017', 'Sarah Joi'),
(4, 'Şeker Portakalı', '1983', 'Josê Mauro De Vasconcelos'),
(7, 'Cehennem', '2013', 'Dan Brown'),
(8, 'Kemik Bahçesi', '2007', 'Tess Gerritsen'),
(9, 'Dokuzuncu Hariciye Koğuşu', '1930', 'Peyami Safa'),
(11, 'Ayağın Nerede Oğul', '2010', 'Fazıl Yazıcı');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
