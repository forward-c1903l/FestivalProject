-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 17, 2019 lúc 06:20 AM
-- Phiên bản máy phục vụ: 5.7.26
-- Phiên bản PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `festivals`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `itemfestivals`
--

DROP TABLE IF EXISTS `itemfestivals`;
CREATE TABLE IF NOT EXISTS `itemfestivals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_reli` int(11) NOT NULL,
  `name_festival` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avata_festival` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_the_festival` date NOT NULL,
  `place_festival` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des_festival` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_festival` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `highlight` int(11) NOT NULL DEFAULT '0',
  `the_best` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_reli` (`id_reli`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `itemfestivals`
--

INSERT INTO `itemfestivals` (`id`, `id_reli`, `name_festival`, `avata_festival`, `date_of_the_festival`, `place_festival`, `des_festival`, `content_festival`, `highlight`, `the_best`, `status`, `id_user`) VALUES
(1, 3, 'Bishwa ijtema,Dhaka', 'upload/images_festival/3/1/bishwa.jpg', '2020-10-01', 'Dhaka, Bangladesh', 'The 37th Annual Art Under the Oaks will take place Saturday, January 18, 2020, from 9 a.m. to 4 p.m. Held on the grounds of San Pedro Church at m...', 'Directly translated to “World Conference”, this is truly an international Muslim gathering with over 5 million participants every year, making it another of the largest annual gatherings in the world. The small suburb city, Tongi, the streets will be filled with people praying all together as one. Not only the streets but also the rooftops and basically everywhere is occupied by worshipers praying for 3 days, reciting Quran and having preaches about the meaning of the Quranic verses. The final congregational prayer on the last day will be for wishing for world peace. ', 1, 1, 1, 0),
(2, 3, 'Hajj', 'upload/images_festival/3/2/hajj.jpg', '2020-07-28', 'Mecca, Saudi Arabia', 'The 3th Annual Art Under the Oaks will take place Saturday, January 18, 2020, from 9 a.m. to 4 p.m. Held on the grounds of San Pedro Church at m...', 'This one is undisputedly the most famous and important festival of the year in the Islamic world. Every Muslim is required to do a pilgrimage to Mecca once in his or hers lifetime. The pilgrimage consists of few rituals that traces back to Abraham who built the Kaaba, which is the most holy building in Islam.Every year millions of Muslims from all kinds of nations and races gather here, strip themselves of all symbols of status, wealth and pride and they put on the same white garments. All as one they walk around the Kaaba seven times, they face while praying in a circle and they perform all kinds of other interesting rituals and prayers that makes them forget all about their earthly desires, their race and nation and just feel one with their fellow believers.Unfortunately, this festival is closed for non-muslims, so only a muslim (traveller) will be able to witness it in person. However, you can enjoy the rest of the festivals on this list. ', 0, 0, 1, 0),
(3, 3, 'Mawlid', 'upload/images_festival/3/3/mawlid.jpg', '2020-10-28', 'Khartoum, Sudan', 'The 3th Annual Art Under the Oaks will take place Saturday, January 18, 2020, from 9 a.m. to 4 p.m. Held on the grounds of San Pedro Church at m...', 'The mawlid is the celebration of the birthday of Prophet Muhammad. This festival is celebrated all over the muslim world, officially except of Saudi Arabia and Qatar, where it is forbidden, however, even there you can experience people celebrating it despite the law. However, if you want the best of all festivals, you should visit a strong Sufi dominated area. I can strongly recommend the Khalifa House Square in Khartoum. On the day, you will see Sudanese from all over the country arriving by foot and putting up a great festival in this square with lots of songs, dances, food and religious speeches. Every Sufi Tarika (Meaning “way of practice”) have their own tent and their own way of celebrating. Walk from place to place and participate in the event.', 0, 0, 1, 0),
(4, 3, 'Tabuik', 'upload/images_festival/3/4/tabuik.jpg', '2020-08-20', 'Pariaman, Sumatra, Indonesia', 'The 3th Annual Art Under the Oaks will take place Saturday, January 18, 2020, from 9 a.m. to 4 p.m. Held on the grounds of San Pedro Church at m...', 'This festival is very closely connected to the Ashura and Arbaeen, as it also commemorate the Battle of Karbalaa and Imam Hussein’s sacrifice for the religion. This ceremony however is very different in execution, as it is held by predominately Sunni Indonesian Muslims rather than Shia Iraqi ones. Here they prepare tall funeral biers made of bamboo and send them into the sea. Then people would swim after them. The whole festival is filled with sport activities like swimming and kite running and also plays are performed.', 1, 1, 1, 0),
(5, 1, 'Christmas', 'upload/images_festival/1/5/xmas.jpg', '2019-12-24', 'Bethlehem, Palestine', 'What is a better place to witness the celebration of the birthday of Jesus rather than in his very own birth city? The lightning of the Christmas tree is a huge event where the Christian Palestinians count down in the Arabic language for midnight to light up the tree.', 'What is a better place to witness the celebration of the birthday of Jesus rather than in his very own birth city? The lightning of the Christmas tree is a huge event where the Christian Palestinians count down in the Arabic language for midnight to light up the tree.', 1, 1, 1, 1),
(6, 1, 'Day of the Dead', 'upload/images_festival/1/6/Day-of-the-Dead.jpg', '2019-11-02', 'Janitzio Island, Mexico', 'This is actually a very interesting festival mixing Christianity with native Indian religion. It is celebrated in most places in Mexico but should be most original on the above mentioned island.', 'This is actually a very interesting festival mixing Christianity with native Indian religion. It is celebrated in most places in Mexico but should be most original on the above mentioned island.', 1, 1, 1, 1),
(7, 1, 'Semana Santa', 'upload/images_festival/1/7/semana-santa.jpg', '2020-04-14', 'Granada, Spain', 'I have witnessed this festival myself. Large parades with people dressed like something coming from the Ku Klux Klan or the inquisition. However, this ceremony is held to repent for the sins you have forsaken the last year and to acknowledge the sacrifice of Jesus. Many people would exhaust...', 'I have witnessed this festival myself. Large parades with people dressed like something coming from the Ku Klux Klan or the inquisition. However, this ceremony is held to repent for the sins you have forsaken the last year and to acknowledge the sacrifice of Jesus. Many people would exhaust themselves and walk it every day bare footed. The festival is best celebrated in Granada, but most Spanish and specially Andalucian cities will have it as well.', 1, 1, 1, 1),
(8, 1, 'Semana Santa1', 'upload/images_festival/1/7/semana-santa.jpg', '2020-04-14', 'Granada, Spain', 'I have witnessed this festival myself. Large parades with people dressed like something coming from the Ku Klux Klan or the inquisition. However, this ceremony is held to repent for the sins you have forsaken the last year and to acknowledge the sacrifice of Jesus. Many people would exhaust...', 'I have witnessed this festival myself. Large parades with people dressed like something coming from the Ku Klux Klan or the inquisition. However, this ceremony is held to repent for the sins you have forsaken the last year and to acknowledge the sacrifice of Jesus. Many people would exhaust themselves and walk it every day bare footed. The festival is best celebrated in Granada, but most Spanish and specially Andalucian cities will have it as well.', 1, 0, 1, 1),
(9, 1, 'Day of the Dead1', 'upload/images_festival/1/6/Day-of-the-Dead.jpg', '2019-11-02', 'Janitzio Island, Mexico', 'This is actually a very interesting festival mixing Christianity with native Indian religion. It is celebrated in most places in Mexico but should be most original on the above mentioned island.', 'This is actually a very interesting festival mixing Christianity with native Indian religion. It is celebrated in most places in Mexico but should be most original on the above mentioned island.', 0, 0, 1, 1),
(10, 1, 'Christmas1', 'upload/images_festival/1/5/xmas.jpg', '2019-12-24', 'Bethlehem, Palestine', 'What is a better place to witness the celebration of the birthday of Jesus rather than in his very own birth city? The lightning of the Christmas tree is a huge event where the Christian Palestinians count down in the Arabic language for midnight to light up the tree.', 'What is a better place to witness the celebration of the birthday of Jesus rather than in his very own birth city? The lightning of the Christmas tree is a huge event where the Christian Palestinians count down in the Arabic language for midnight to light up the tree.', 1, 0, 1, 1),
(11, 3, 'Tabuik1', 'upload/images_festival/3/4/tabuik.jpg', '2020-08-20', 'Pariaman, Sumatra, Indonesia', 'The 3th Annual Art Under the Oaks will take place Saturday, January 18, 2020, from 9 a.m. to 4 p.m. Held on the grounds of San Pedro Church at m...', 'This festival is very closely connected to the Ashura and Arbaeen, as it also commemorate the Battle of Karbalaa and Imam Hussein’s sacrifice for the religion. This ceremony however is very different in execution, as it is held by predominately Sunni Indonesian Muslims rather than Shia Iraqi ones. Here they prepare tall funeral biers made of bamboo and send them into the sea. Then people would swim after them. The whole festival is filled with sport activities like swimming and kite running and also plays are performed.', 1, 0, 1, 0),
(12, 3, 'Mawlid1', 'upload/images_festival/3/3/mawlid.jpg', '2020-10-28', 'Khartoum, Sudan', 'The 3th Annual Art Under the Oaks will take place Saturday, January 18, 2020, from 9 a.m. to 4 p.m. Held on the grounds of San Pedro Church at m...', 'The mawlid is the celebration of the birthday of Prophet Muhammad. This festival is celebrated all over the muslim world, officially except of Saudi Arabia and Qatar, where it is forbidden, however, even there you can experience people celebrating it despite the law. However, if you want the best of all festivals, you should visit a strong Sufi dominated area. I can strongly recommend the Khalifa House Square in Khartoum. On the day, you will see Sudanese from all over the country arriving by foot and putting up a great festival in this square with lots of songs, dances, food and religious speeches. Every Sufi Tarika (Meaning “way of practice”) have their own tent and their own way of celebrating. Walk from place to place and participate in the event.', 0, 0, 1, 0),
(13, 3, 'Bishwa ijtema,Dhaka1', 'upload/images_festival/3/1/bishwa.jpg', '2020-10-01', 'Dhaka, Bangladesh', 'The 37th Annual Art Under the Oaks will take place Saturday, January 18, 2020, from 9 a.m. to 4 p.m. Held on the grounds of San Pedro Church at m...', 'Directly translated to “World Conference”, this is truly an international Muslim gathering with over 5 million participants every year, making it another of the largest annual gatherings in the world. The small suburb city, Tongi, the streets will be filled with people praying all together as one. Not only the streets but also the rooftops and basically everywhere is occupied by worshipers praying for 3 days, reciting Quran and having preaches about the meaning of the Quranic verses. The final congregational prayer on the last day will be for wishing for world peace. ', 1, 0, 1, 0),
(14, 3, 'Hajj1', 'upload/images_festival/3/2/hajj.jpg', '2020-07-28', 'Mecca, Saudi Arabia', 'The 3th Annual Art Under the Oaks will take place Saturday, January 18, 2020, from 9 a.m. to 4 p.m. Held on the grounds of San Pedro Church at m...', 'This one is undisputedly the most famous and important festival of the year in the Islamic world. Every Muslim is required to do a pilgrimage to Mecca once in his or hers lifetime. The pilgrimage consists of few rituals that traces back to Abraham who built the Kaaba, which is the most holy building in Islam.Every year millions of Muslims from all kinds of nations and races gather here, strip themselves of all symbols of status, wealth and pride and they put on the same white garments. All as one they walk around the Kaaba seven times, they face while praying in a circle and they perform all kinds of other interesting rituals and prayers that makes them forget all about their earthly desires, their race and nation and just feel one with their fellow believers.Unfortunately, this festival is closed for non-muslims, so only a muslim (traveller) will be able to witness it in person. However, you can enjoy the rest of the festivals on this list. ', 1, 0, 1, 0),
(15, 1, 'Christmas2', 'upload/images_festival/1/5/xmas.jpg', '2019-12-24', 'Bethlehem, Palestine', 'What is a better place to witness the celebration of the birthday of Jesus rather than in his very own birth city? The lightning of the Christmas tree is a huge event where the Christian Palestinians count down in the Arabic language for midnight to light up the tree.', 'What is a better place to witness the celebration of the birthday of Jesus rather than in his very own birth city? The lightning of the Christmas tree is a huge event where the Christian Palestinians count down in the Arabic language for midnight to light up the tree.', 1, 0, 1, 1),
(16, 1, 'Christmas3', 'upload/images_festival/1/5/xmas.jpg', '2019-12-24', 'Bethlehem, Palestine', 'What is a better place to witness the celebration of the birthday of Jesus rather than in his very own birth city? The lightning of the Christmas tree is a huge event where the Christian Palestinians count down in the Arabic language for midnight to light up the tree.', 'What is a better place to witness the celebration of the birthday of Jesus rather than in his very own birth city? The lightning of the Christmas tree is a huge event where the Christian Palestinians count down in the Arabic language for midnight to light up the tree.', 1, 0, 1, 1),
(17, 1, 'Day of the Dead2', 'upload/images_festival/1/6/Day-of-the-Dead.jpg', '2019-11-02', 'Janitzio Island, Mexico', 'This is actually a very interesting festival mixing Christianity with native Indian religion. It is celebrated in most places in Mexico but should be most original on the above mentioned island.', 'This is actually a very interesting festival mixing Christianity with native Indian religion. It is celebrated in most places in Mexico but should be most original on the above mentioned island.', 1, 0, 1, 1),
(18, 1, 'Semana Santa5', 'upload/images_festival/1/7/semana-santa.jpg', '2020-04-14', 'Granada, Spain', 'I have witnessed this festival myself. Large parades with people dressed like something coming from the Ku Klux Klan or the inquisition. However, this ceremony is held to repent for the sins you have forsaken the last year and to acknowledge the sacrifice of Jesus. Many people would exhaust...', 'I have witnessed this festival myself. Large parades with people dressed like something coming from the Ku Klux Klan or the inquisition. However, this ceremony is held to repent for the sins you have forsaken the last year and to acknowledge the sacrifice of Jesus. Many people would exhaust themselves and walk it every day bare footed. The festival is best celebrated in Granada, but most Spanish and specially Andalucian cities will have it as well.', 1, 0, 1, 1),
(19, 1, 'Day of the Dead28', 'upload/images_festival/1/6/Day-of-the-Dead.jpg', '2019-11-02', 'Janitzio Island, Mexico', 'This is actually a very interesting festival mixing Christianity with native Indian religion. It is celebrated in most places in Mexico but should be most original on the above mentioned island.', 'This is actually a very interesting festival mixing Christianity with native Indian religion. It is celebrated in most places in Mexico but should be most original on the above mentioned island.', 1, 0, 1, 1),
(20, 1, 'Christmas14', 'upload/images_festival/1/5/xmas.jpg', '2019-12-24', 'Bethlehem, Palestine', 'What is a better place to witness the celebration of the birthday of Jesus rather than in his very own birth city? The lightning of the Christmas tree is a huge event where the Christian Palestinians count down in the Arabic language for midnight to light up the tree.', 'What is a better place to witness the celebration of the birthday of Jesus rather than in his very own birth city? The lightning of the Christmas tree is a huge event where the Christian Palestinians count down in the Arabic language for midnight to light up the tree.', 1, 0, 1, 1),
(21, 3, 'Bishwa ijtema,Dhaka1234', 'upload/images_festival/3/1/bishwa.jpg', '2020-10-01', 'Dhaka, Bangladesh', 'The 37th Annual Art Under the Oaks will take place Saturday, January 18, 2020, from 9 a.m. to 4 p.m. Held on the grounds of San Pedro Church at m...', 'Directly translated to “World Conference”, this is truly an international Muslim gathering with over 5 million participants every year, making it another of the largest annual gatherings in the world. The small suburb city, Tongi, the streets will be filled with people praying all together as one. Not only the streets but also the rooftops and basically everywhere is occupied by worshipers praying for 3 days, reciting Quran and having preaches about the meaning of the Quranic verses. The final congregational prayer on the last day will be for wishing for world peace. ', 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `religions`
--

DROP TABLE IF EXISTS `religions`;
CREATE TABLE IF NOT EXISTS `religions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_religion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des_religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `religions`
--

INSERT INTO `religions` (`id`, `name_religion`, `des_religion`, `status`) VALUES
(1, 'Christian', 'Christian day', 1),
(2, 'Buddhism', 'Buddhism day', 1),
(3, 'Islamic', 'Islamic day', 1),
(4, 'Hindu', 'Hindu day', 1);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `itemfestivals`
--
ALTER TABLE `itemfestivals`
  ADD CONSTRAINT `itemfestivals_ibfk_1` FOREIGN KEY (`id_reli`) REFERENCES `religions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
