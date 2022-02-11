-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Ağu 2021, 21:17:10
-- Sunucu sürümü: 10.4.20-MariaDB
-- PHP Sürümü: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kullanici`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `birey`
--

CREATE TABLE `birey` (
  `id` int(11) NOT NULL,
  `tc` varchar(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `dogumyili` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `birey`
--

INSERT INTO `birey` (`id`, `tc`, `ad`, `soyad`, `dogumyili`) VALUES
(13, '30554103438', 'Ufuk', 'Demirel', 1999),
(20, '30557103374', 'Gazi', 'Demirel', 1996);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failedlogs`
--

CREATE TABLE `failedlogs` (
  `id` int(11) NOT NULL,
  `tc` varchar(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `dogumyili` int(11) NOT NULL,
  `kayittarihi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip` varchar(55) DEFAULT NULL,
  `hata` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `failedlogs`
--

INSERT INTO `failedlogs` (`id`, `tc`, `ad`, `soyad`, `dogumyili`, `kayittarihi`, `ip`, `hata`) VALUES
(112, '30554103438', 'Ufuk', 'Acet', 1999, '2021-08-20 14:36:02', '127.0.0.1', 'WRONG TC'),
(113, '30554103438', 'Ufuk', 'Demirel', 1999, '2021-08-21 15:24:53', '127.0.0.1', 'DUPLICATE'),
(114, '30554103438', 'Ufuk', 'Demirel', 1999, '2021-08-27 18:18:01', '127.0.0.1', 'DUPLICATE'),
(115, '30554103438', 'Ufuk', 'Demirel', 1999, '2021-08-27 18:18:46', '127.0.0.1', 'DUPLICATE');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `birey`
--
ALTER TABLE `birey`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tc` (`tc`);

--
-- Tablo için indeksler `failedlogs`
--
ALTER TABLE `failedlogs`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `birey`
--
ALTER TABLE `birey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `failedlogs`
--
ALTER TABLE `failedlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
