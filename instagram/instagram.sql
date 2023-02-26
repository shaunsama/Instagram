-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Şub 2023, 13:34:26
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `instagram`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bookmark`
--

CREATE TABLE `bookmark` (
  `bookmark_id` int(11) NOT NULL,
  `bookmark_post_id` int(11) NOT NULL,
  `bookmark_user_nickname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `bookmark_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_user_nickname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `comment_desc` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `follow`
--

CREATE TABLE `follow` (
  `follow_id` int(11) NOT NULL,
  `followed_nickname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `following_nickname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `follow_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `like_post`
--

CREATE TABLE `like_post` (
  `like_id` int(11) NOT NULL,
  `like_post_id` int(11) NOT NULL,
  `like_user_nickname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `like_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_sender_nickname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `message_receiver_nickname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `message_desc` varchar(2000) COLLATE utf8_turkish_ci NOT NULL,
  `message_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_user_nickname_seo` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `post_user_id` int(11) NOT NULL,
  `post_image` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `post_description` varchar(2200) CHARACTER SET utf8mb4 NOT NULL,
  `post_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `user_gsm` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `user_avatar` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'images/dimg/user.jpg',
  `user_verified_state` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `user_verified_img` varchar(100) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'images/dimg/verified.png',
  `user_nickname_seo` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `user_password` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `user_gender` varchar(75) COLLATE utf8_turkish_ci NOT NULL,
  `user_fullname` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `user_website` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `user_bio` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `user_proposition` enum('false','true') COLLATE utf8_turkish_ci DEFAULT 'false',
  `user_ip` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `user_registration_time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_last_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Tablo için indeksler `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Tablo için indeksler `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`follow_id`);

--
-- Tablo için indeksler `like_post`
--
ALTER TABLE `like_post`
  ADD PRIMARY KEY (`like_id`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Tablo için indeksler `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Tablo için AUTO_INCREMENT değeri `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- Tablo için AUTO_INCREMENT değeri `follow`
--
ALTER TABLE `follow`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- Tablo için AUTO_INCREMENT değeri `like_post`
--
ALTER TABLE `like_post`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- Tablo için AUTO_INCREMENT değeri `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
