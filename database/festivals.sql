-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 11, 2020 lúc 07:17 AM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.1.33

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
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name_book` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `price_book` int(11) NOT NULL,
  `des_book` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_book` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avata_book` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `inventory` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_posted` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `name_book`, `author`, `price_book`, `des_book`, `content_book`, `avata_book`, `inventory`, `id_category`, `id_user`, `date_posted`, `status`) VALUES
(28, 'The Heart of the Buddha Teaching: Transforming Suffering into Peace, Joy, and Liberation', 'Thich Nhat Hanh', 250000, 'With poetry and clarity, Thich Nhat Hanh imparts comforting wisdom about the nature of suffering and its role in creating compassion, love, and joy – all qualities of enlightenment.', '<p>In&nbsp;<em>The Heart of the Buddha&rsquo;s Teaching</em>, now revised with added material and new insights, Nhat Hanh introduces us to the core teachings of Buddhism and shows us that the Buddha&rsquo;s teachings are accessible and applicable to our daily lives.<br />\n<br />\nCovering such significant teachings as the Four Noble Truths, the Noble Eightfold Path, the Three Doors of Liberation, the Three Dharma Seals, and the Seven Factors of Awakening,&nbsp;<em>The Heart of the Buddha&rsquo;s Teaching</em>&nbsp;is a radiant beacon on Buddhist thought for the initiated and uninitiated alike.<br />\n<br />\n<strong>&ldquo;Thich Nhat Hanh shows us the connection between personal, inner peace, and peace on earth.&rdquo;<br />\n<strong>&ndash; His Holiness the Dalai Lama</strong></strong></p>', 'upload/books/15/28/28.jpg', 61, 15, 4, '2020-01-09 16:11:32', 1),
(29, 'Real Happiness: The Power of Meditation: A 28-Day Program', 'Sharon Salzberg', 200000, 'Thousands of years prove it, and Western science backs it: Meditation sharpens focus. Meditation lowers blood pressure, relieves chronic pain, reduces stress.', '<p>Thousands of years prove it, and Western science backs it: Meditation sharpens focus. Meditation lowers blood pressure, relieves chronic pain, reduces stress. Meditation helps us experience greater calm. Meditation connects us to our inner-most feelings and challenges our habits of self-judgment. Meditation helps protect&nbsp; the brain against aging and improves our capacity for learning new things. Meditation opens the door to real and accessible happiness.<br />\n<br />\nThere is no better person to show a beginner how to harness the power of meditation than Sharon Salzberg, one of the world&rsquo;s foremost meditation teachers and spiritual authors. Cofounder of the Insight Meditation Society, author of&nbsp;<em>Lovingkindness</em>,&nbsp;<em>Faith</em>, and other books, Ms. Salzberg distills 30 years of teaching meditation into a 28-day program that will change lives. It is not about Buddhism, it&rsquo;s not esoteric―it is closer to an exercise, like running or riding a bike. From the basics of posture, breathing, and the daily schedule to the finer points of calming the mind, distraction, dealing with specific problem areas (pain in the legs? falling asleep?) to the larger issues of compassion and awareness,&nbsp;<em>Real Happiness</em>&nbsp;is a complete guide. It explains how meditation works; why a daily meditation practice results in more resiliency, creativity, peace, clarity, and balance; and gives twelve meditation practices, including mindfulness meditation and walking meditation. An extensive selection of her students&rsquo; FAQs cover the most frequent concerns of beginners who meditate―&ldquo;Is meditation selfish?&rdquo; &ldquo;How do I know if I&rsquo;m doing it right?&rdquo; &ldquo;Can I use meditation to manage weight?&rdquo;</p>', 'upload/books/15/29/29.jpg', 100, 15, 4, '2020-01-09 19:01:00', 1),
(30, 'On the Path to Enlightenment: Heart Advice from the Great Tibetan Masters', 'Matthieu Ricard', 350000, 'Dilgo Khyentse Rinpoche inspired Matthieu Ricard to create this anthology', '<p>Dilgo Khyentse Rinpoche inspired Matthieu Ricard to create this anthology by telling him that &ldquo;when we come to appreciate the depth of the view of the eight great traditions [of Tibetan Buddhism] and also see that they all lead to the same goal without contradicting each other, we think, &lsquo;Only ignorance can lead us to adopt a sectarian view.&rsquo;&rdquo; Ricard has selected and translated some of the most profound and inspiring teachings from across these traditions.<br />\n<br />\nThe selected teachings are taken from the sources of the traditions, including the Buddha himself, Nagarjuna, Guru Rinpoche, Atisha, Shantideva, and Asanga; from great masters of the past, including Thogme Zangpo, the Fifth Dalai Lama, Milarepa, Longchenpa, and Sakya Pandita; and from contemporary masters, including the Fourteenth Dalai Lama and Mingyur Rinpoche. They address such topics as the nature of the mind; the foundations of taking refuge, generating altruistic compassion, acquiring merit, and following a teacher; view, meditation, and action; and how to remove obstacles and make progress on the path.</p>', 'upload/books/15/30/30.jpg', 100, 15, 4, '2020-01-09 19:04:16', 1),
(31, 'When Things Fall Apart: Heart Advice for Difficult Times (Shambhala Classics)', 'Pema Chodron', 390000, ' The book is a treasury of wisdom for going on living when we are overcome by pain and difficulties', '<p>The beautiful practicality of her teaching has made Pema Chödrön one of the most beloved of contemporary American spiritual authors among Buddhists and non-Buddhists alike. A collection of talks she gave between 1987 and 1994, the book is a treasury of wisdom for going on living when we are overcome by pain and difficulties. Chödrön discusses:<br />\n<br />\n<br />\n<br />\n&nbsp;&nbsp;&nbsp;&bull;&nbsp; Using painful emotions to cultivate wisdom, compassion, and courage<br />\n&nbsp;&nbsp;&nbsp;&bull;&nbsp; Communicating so as to encourage others to open up rather than shut down<br />\n&nbsp;&nbsp;&nbsp;&bull;&nbsp; Practices for reversing habitual patterns<br />\n&nbsp;&nbsp;&nbsp;&bull;&nbsp; Methods for working with chaotic situations<br />\n&nbsp;&nbsp;&nbsp;&bull;&nbsp; Ways for creating effective social action</p>', 'upload/books/15/31/31.jpg', 100, 15, 4, '2020-01-09 19:13:06', 1),
(32, 'Jesus Calling Gift Edition soft leather-look, gray', 'Sarah Young', 290000, 'An elegant-looking neutral-colored cover enfolding a popular classic! Savor the presence of the One who understands you perfectly and loves you eternally', '<p>An elegant-looking neutral-colored cover enfolding a popular classic! Savor the presence of the One who understands you perfectly and loves you eternally. Deepen your relationship with your Savior as you reflect upon these devotions, written as if the Lord himself were speaking directly to you. Scripture accompanies each entry for further meditation. 400 pages, textured gray imitation leather, ribbon bookmark, and presentation page, from Nelson.</p>', 'upload/books/16/32/32.jpg', 100, 16, 4, '2020-01-09 19:16:26', 1),
(33, 'KJV Compact Large Print Reference Bible, Bonded Leather Black', 'HENDRICKSON PUBLISHERS', 400000, 'A selection of useful study helps and references enhance this portable edition of the renowned King James Version (KJV) Bible.', '<p>A selection of useful study helps and references enhance this portable edition of the renowned King James Version (KJV) Bible. Easy-to-read type, a compact size, and affordability combine to make it the ideal Bible to carry in briefcase, purse, backpack, or tote bag&mdash;for both devotional and study purposes.</p>', 'upload/books/16/33/33.jpg', 100, 16, 4, '2020-01-09 19:18:25', 1),
(34, 'Overcomer, DVD', 'PROVIDENT FILMS', 398000, 'From the creators of War Room, Courageous and Fireproof. Basketball coach John Harrison high school team is crushed', '<p>From the creators of&nbsp;<em>War Room</em>,&nbsp;<em>Courageous</em>&nbsp;and&nbsp;<em>Fireproof</em>. Basketball coach John Harrison&#39;s high school team is crushed by the closing of the town&#39;s largest employer. Hundreds of families move, leaving him running a struggling cross-country program. But then he meets Hannah and begins helping this unlikely runner attempt the impossible in the year&#39;s biggest race. Starring Alex Kendrick, Priscilla Shirer, and Aryn Wright-Thompson. Rated PG. Dove approved (12+). Approx. 119 minutes.</p>', 'upload/books/16/34/34.jpg', 100, 16, 4, '2020-01-09 19:22:02', 1),
(35, 'The Story Bible, NIV', 'ZONDERVAN / 2011 / HARDCOVER', 386000, 'The Greatest Story Ever Told is more than just a cliché. God goes to great lengths to rescue lost and hurting people.', '<p>The &quot;Greatest Story Ever Told&quot; is more than just a cliché. God goes to great lengths to rescue lost and hurting people.<br />\nThat is what The Story is all about&mdash;the story of the Bible, God&rsquo;s great love affair with humanity.<br />\nCondensed into 31 accessible chapters, The Story sweeps you into the unfolding progression of Bible characters and events from Genesis to Revelation. Using the clear, accessible text of the NIV Bible, it allows the stories, poems, and teachings of the Bible to read like a novel.<br />\nAnd like any good story, The Story is filled with intrigue, drama, conflict, romance, and redemption&mdash;and this story&rsquo;s true! From the foreword by Max Lucado and Randy Frazee:</p>\n\n<blockquote>&quot;This book tells the grandest, most compelling story of all time: the story of a true God who loves his children, who established for them a way of salvation and provided a route to eternity. Each story in these 31 chapters reveals the God of grace&mdash;the God who speaks; the God who acts; the God who listens; the God whose love for his people culminated in his sacrifice of Jesus, his only Son, to atone for the sins of humanity.&quot;</blockquote>', 'upload/books/16/35/35.jpg', 100, 16, 4, '2020-01-09 19:23:42', 1),
(36, 'The Holy Geeta', 'Swami Chinmayananda', 399999, 'The Bhagavad Geeta is universally known and Swmi Chinmayananda during his life time had given a number of lectures on the Holy Book of Hindus', '<p>Swami Chinmayananda (May 8, 1916 - Aug 3, 1993) was born Balakrishna Menon (Balan) in Ernakulam, Kerala in a devout Hindu noble family called &quot;Poothampalli&quot;. Graduating from Lucknow University, he entered the field of journalism where he felt he could influence political, economic and social reform in India. But his life was changed when he met Swami Sivananda at Rishikesh and became interested in the Hindu spiritual path. [1] Balakrishna Menon took sanyas(monkhood) from Swami Sivananda and was given the name Swami Chinmayananda - the one who is saturated in Bliss and pure Consciousness. Swami Shivananda saw further potential in Swami Chinmayananda and sent him to study under a guru in the Himalayas - Swami Tapovan Maharaj under whom he studied for 8 years. Swami Tapovan maharaj was known for his rigid teaching style, to the point where he told Sw. Chinmayananda that he would only say everything once, and at anytime he would ask questions to him. Even with these extreme terms, Sw. Chinmayananda stayed with Tapovan maharaj until the very end of 8 years. Being a journalist at heart, Sw. Chinmayananda wanted to make this pure knowledge available to all people of all backgrounds, even though Tapovan Maharaj had advised against it. It was then that with Tapovan maharaj&#39;s blessings, he left the Himalayas to teach the world the knowledge of Vedanta throughout the world. During his forty years of travelling and teaching, Swami Chinmayananda opened numerous centres and ashrams worldwide, he also built many schools, hospitals, nursing homes and clinics. His interest in helping the villagers with basic necessities lead to the eventual creation of a rural development project, known as the Chinmaya Organization for Rural Development or CORD. It&#39;s Naitonal Director, Dr. Kshama Metre was recently awarded the Padma Shree National award in Social Work. Swami Chinmayananda passed away on 3 August 1993 in San Diego, California. His followers regard him as having attained Mahasamadhi at that point. His work has resulted in the creation of an international organization called Chinmaya Mission. This mission serves Swami Chinmayananda&#39;s vision of reinvigorating India&#39;s rich cultural heritage, and making Vedanta accessible to everybody regardless of age, nationality, or religious background.</p>', 'upload/books/17/36/36.jpg', 100, 17, 4, '2020-01-09 19:26:37', 1),
(37, 'How to Know God: The Yoga Aphorisms of Patanjali', 'Swami Prabhavananda', 300000, 'The Yoga Aphorisms of Patanjali is a major work on the practice of yoga and meditation.', '<p>A rendering at once lively and profoundly instructive of a world classic which ... remains as vividly topical, as realistically to the point, as when it first saw the light. --Aldous Huxley, author of Brave New World...The Soul does not love; It is Love Itself. It Does not Exist; It is Existence Itself. It does not Know; It is Knowledge Itself.--- Patanjali --Quoted by George Harrison in his final album. A beautiful translation, and our personal favorite by far. --Books for Inner Development<br />\n<br />\nNo matter what his religious belief, a person can only be the richer for having studied this translation of the famous Aphorisms of Patanjali. The language is simple so that anyone can read it and derive spiritual benefit from it if they are open-minded. I can recommend it both for the one who has become familiar with Hindu religion and philosophy and for the one who has not. For the first it is a new and fresh presentation of an old theme; for the second, it is dear, understandable and easy to grasp. It should do much to bring about a meeting of Eastern and Western thought.... There is much in this book to give food for thought and inspiration for spiritual practice. --The Awakener<br />\n<br />\nIt is in the fitness of things that one of the celebrated monks of the Ramakrishna Order in collaboration with the well-known writer Christopher Isherwood undertook the task of translating the Yoga-Sutras in English and also providing an illuminating commentary thereon, avoiding the technicalities of the system and putting it in a very lucid manner suited for the modern mind.... This makes the book eminently readable for the modern mind and thereby fulfills the great mission of interpreting the East to the West.... The book should be widely read by all spiritual seekers who want to know what yoga is, what its aims are, how it can be practiced, what powers can be attained by it and finally what liberation of the soul consists in. --Bulletin of the Ramakrishna Mission Institute of Culture</p>', 'upload/books/17/37/37.jpg', 100, 17, 4, '2020-01-09 19:27:42', 1),
(38, 'Meeting God: Elements of Hindu Devotion', 'Stephen Huyler', 390000, 'Documents the Hindu belief in the spiritual component of all human activity and looks at Hindu beliefs and practices, daily worship experiences, and ways of meeting God', '<p>&quot;This is a book that simply glows with light and life. The Hindu world that Stephen Huyler shows is luminous, suffused with spirituality, and deeply inspiring.&quot;Deepak Chopra &quot;A full color tour of India through the eyes and lens of a noted historian-photographer.&quot;Bill Broadway, Washington Post &quot;An engaging story book, an exquisite photo journey into the heart of India and especially, a superb overview of the ways and whys of Hindu worship.&quot;Hinduism Today</p>', 'upload/books/17/38/38.jpg', 99, 17, 4, '2020-01-09 19:28:44', 1),
(39, 'An Introduction to Hinduism 1ed (Introduction to Religion)', 'Gavin D Flood', 350000, 'This book provides a much-needed thematic and historical introduction to Hinduism', '<p>This new introduction to Hinduism is distinguished by exceptionally useful chapter divisions, good detail combined with ease of reading, and a particular focus on the integrated quality of the evolution of Hindu thought....The book&#39;s balance between scholarly detail and clear, readable elucidation of issues is commendable....In all, this is a valuable contribution to the undergraduate classroom. Libraries whose Hinduism holdings include other good introductions should, nonetheless, acquire this one.&quot; Choice<br />\n<br />\n&quot;Flood&#39;s book is a very welcome newcomer, comprehensive, detailed and judicious.&quot; Francis X. Clooney, S.J., Theological Studies<br />\n<br />\n&quot;...is one of the best and most informative intiations into Hinduism to date.&quot; Journal of Indo-European Studies<br />\n<br />\n&quot;An Introduction to Hinduism is a highly readable and authoritative conspectus on this great religion....An Introduction to Hinduism will surely find a much wider audience, for scholars of comparative religion, Indologists, and non-specialists in their distinctive ways will certainly find this handsome book well worth reading.&quot; David Hicks, Asian Thought and Society</p>', 'upload/books/17/39/39.jpg', 67, 17, 4, '2020-01-09 19:38:09', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_category`
--

CREATE TABLE `book_category` (
  `id` int(11) NOT NULL,
  `name_book_cate` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_cate_book_category` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `book_category`
--

INSERT INTO `book_category` (`id`, `name_book_cate`, `id_cate_book_category`, `status`) VALUES
(15, 'Buddhism Books', 78, 1),
(16, 'Christian Books', 79, 1),
(17, 'Hindu Books', 80, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_cate` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link_cate` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_parent` int(11) NOT NULL,
  `status_cate` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name_cate`, `link_cate`, `id_parent`, `status_cate`) VALUES
(1, 'HOME', 'index.php', 0, 1),
(2, 'RELIGIONS', 'religions.php', 0, 1),
(3, 'BOOKS', 'bookstore.php', 0, 1),
(4, 'ABOUT US', 'about.php', 0, 1),
(5, 'CONTACT US', 'contact.php', 0, 1),
(73, 'Christian', 'religions.php?f=90', 2, 1),
(74, 'Buddhism', 'religions.php?f=91', 2, 1),
(75, 'Islam', 'religions.php?f=92', 2, 1),
(76, 'Hindu', 'religions.php?f=93', 2, 1),
(78, 'Buddhism Books', 'bookstore.php?b=15', 3, 1),
(79, 'Christian Books', 'bookstore.php?b=16', 3, 1),
(80, 'Hindu Books', 'bookstore.php?b=17', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `address` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `phonenumber` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `email`, `phonenumber`) VALUES
(1, 'Festival1', '212 Nguyễn Đình Chiểu, P.6, Q.3, TPHCM', 'huynhcongphat2510@gmail.com', '0904667082');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `phonenumber` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL,
  `subject` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `message` text COLLATE utf8_vietnamese_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `fullname`, `email`, `phonenumber`, `subject`, `message`, `date`) VALUES
(12, 'Huynh Cong Phat', 'huynhcongphat2510@gmail.com', '0904667082', 'Hơn 170 người thiệt mạng sau khi máy bay', 'Chiếc Boeing 737 chở hơn 170 người rơi không lâu sau khi cất cánh từ sân bay Imam Khomeini của Tehran trên đường tới Ukraine.', '2020-01-08 14:34:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`id`, `img`, `status`) VALUES
(1, 'upload/gallery/1.jpg', 1),
(3, 'upload/gallery/3.jpg', 1),
(4, 'upload/gallery/4.jpg', 1),
(5, 'upload/gallery/5.jpg', 1),
(12, 'upload/gallery/12.jpg', 1),
(14, 'upload/gallery/14.jpg', 1),
(15, 'upload/gallery/15.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_payment_method` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `handle` int(11) NOT NULL DEFAULT 0,
  `id_user_buy` int(11) NOT NULL,
  `admin_check` int(11) NOT NULL DEFAULT 0,
  `time_delivery` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice`
--

INSERT INTO `invoice` (`id`, `date`, `id_payment_method`, `total`, `handle`, `id_user_buy`, `admin_check`, `time_delivery`) VALUES
(2167718, '2020-01-09 16:23:59', 1, 15588, 3, 4, 1, '2020-01-09 16:59:02'),
(2498086, '2020-01-10 11:04:29', 1, 370000, 3, 4, 1, '2020-01-10 11:07:53'),
(2853011, '2020-01-10 14:09:24', 2, 390000, 0, 4, 0, '0000-00-00 00:00:00'),
(3742865, '2020-01-09 16:38:47', 1, 15588, 2, 4, 1, '2020-01-09 16:58:45'),
(4877806, '2020-01-09 16:24:59', 2, 1299, 1, 4, 1, '0000-00-00 00:00:00'),
(6061306, '2020-01-10 14:07:56', 1, 370000, 0, 4, 1, '0000-00-00 00:00:00'),
(6529172, '2020-01-09 16:35:46', 1, 1299, 0, 4, 1, '0000-00-00 00:00:00'),
(7941327, '2020-01-09 17:03:14', 1, 1299, 1, 4, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id_invoice` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice_details`
--

INSERT INTO `invoice_details` (`id_invoice`, `id_book`, `quantity`) VALUES
(2167718, 28, 12),
(4877806, 28, 1),
(6529172, 28, 1),
(3742865, 28, 12),
(7941327, 28, 1),
(2498086, 39, 1),
(6061306, 39, 1),
(2853011, 38, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `itemfestivals`
--

CREATE TABLE `itemfestivals` (
  `id` int(11) NOT NULL,
  `id_reli` int(11) NOT NULL,
  `name_festival` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avata_festival` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_the_festival` date NOT NULL,
  `place_festival` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `des_festival` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_festival` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `highlight` int(11) NOT NULL DEFAULT 0,
  `the_best` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `itemfestivals`
--

INSERT INTO `itemfestivals` (`id`, `id_reli`, `name_festival`, `avata_festival`, `date_of_the_festival`, `place_festival`, `des_festival`, `content_festival`, `highlight`, `the_best`, `status`, `id_user`) VALUES
(135, 90, 'Christmas tree lighting', 'upload/religions/90/135/135.jpg', '2020-12-24', 'Bethlehem, Palestine', 'What is a better place to witness the celebration of the birthday of Jesus rather than in his very own birth city? The lightning of the Christmas tree is a huge event where the Christian Palestinians count down in the Arabic language for midnight to light up the tree.', '<p>What is a better place to witness the celebration of the birthday of Jesus rather than in his very own birth city? The lightning of the Christmas tree is a huge event where the Christian Palestinians count down in the Arabic language for midnight to light up the tree.</p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/phat/aa_picture_20151205_6985394_high.jpg\" style=\"height:800px; width:1200px\" /></p>\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/phat/001_2.jpg\" style=\"height:667px; width:1000px\" /></p>\n\n<p>&nbsp;</p>', 1, 1, 1, 4),
(136, 90, 'Day of the dead', 'upload/religions/90/136/136.jpg', '2019-12-24', 'Bethlehem, Palestine', 'What is a better place to witness the celebration of the birthday of Jesus rather than in his very own birth city? The lightning of the Christmas tree is a huge event where the Christian Palestinians count down in the Arabic language for midnight to light up the tree.', '<p><img alt=\"Image of people gathering at the cemetary on Day of the Dead\" src=\"https://dayofthedead.holiday/static/b5a77a717a90acca9f4d74e0d0785753/8a760/peopleAtCemetary.jpg\" /></p>\n\n<p>A dedication to the deceased</p>\n\n<p>Day of the Dead (Dia De Los Muertos) is a two day holiday that reunites the living and dead. Families create ofrendas (Offerings) to honor their departed family members that have passed. These altars are decorated with bright yellow marigold flowers, photos of the departed, and the favorite foods and drinks of the one being honored. The offerings are believed to encourage visits from the land of the dead as the departed souls hear their prayers, smell their foods and join in the celebrations!</p>\n\n<p>Day of the Dead is a rare holiday for celebrating death and life. It is unlike any holiday where mourning is exchanged for celebration.</p>\n\n<p><img alt=\"Image of gravesite during Dia De Los Meurtos\" src=\"https://dayofthedead.holiday/static/773d896e910e94db71155dd3a0b90875/8a760/gravesite2.jpg\" /></p>', 1, 1, 1, 4),
(137, 90, 'Semana Santa', 'upload/religions/90/137/137.jpg', '2020-04-05', ': Granada, Spain', 'I have witnessed this festival myself. Large parades with people dressed like something coming from the Ku Klux Klan or the inquisition. However, this ceremony is held to repent for the sins you have forsaken the last year and to acknowledge the sacrifice of Jesus. Many people would exhaust themselves and walk it every day bare footed', '<p>&nbsp;</p>\n\n<h2>When and where Is Semana Santa?</h2>\n\n<p>The dates of the celebration vary on a yearly basis, given that the feast is not attached to a specific date but rather to a cosmic phenomenon. Linked ever since the Roman emperor Constantine the Great called the Council of Nicaea in 325 A.D. to the first Sunday after the full moon following the vernal equinox in the northern hemisphere, Easter can never be celebrated before March 22 (the day after the vernal equinox) or after April 25. Therefore, you can roughly plan on early spring to see Spain&#39;s famous processions, but you should check your calendar before making any definite plans.</p>\n\n<p>Cities, towns, and villages across all of Spain come to life during Semana Santa. While each city has its own unique Holy Week celebrations, tag sunny Seville as your main destination for an experience that will leave you absolutely speechless.</p>\n\n<p><img alt=\"Semana Santa\" src=\"https://www.enforex.com/img/semana-santa-1.jpg\" style=\"height:140px; width:200px\" /></p>\n\n<p><img alt=\"Semana Santa Outfit\" src=\"https://www.enforex.com/img/semana-santa-2.jpg\" style=\"height:140px; width:200px\" /></p>\n\n<h2>Semana Santa Traditions</h2>\n\n<p>The holiday, jubilant in Seville and Andalucía and solemn elsewhere in Spain, is practically defined by its stunning processions. Each of these processions typically boasts two intensely adorned floats, one of the Virgin and the other of a scene from Christ&#39;s Passion. Take in the lavish decoration of these incredible creations as they slowly pass before you accompanied by the music of coronets and drums; its hard to do without getting chills. Underneath each float, you&#39;ll just barely be able to make out rows and rows of feet. There are up to forty men, called&nbsp;<em>costaleros</em>, who haul the float on shoulders and control its swaying motion. In fact, they practice so much and are so in sync with each other that the realistic figures on top look eerily as if they were walking along to the music.</p>\n\n<p>Impossible to miss are the seemingly endless rows of&nbsp;<em>nazarenos</em>, or penitents, who walk along with the float.. You may even see many&nbsp;<em>nazarenos</em>&nbsp;walking barefoot, which is pretty impressive, considering some of the processions last up to 14 hours! Oh, and don&#39;t be thrown off by the resemblance between the pointy hoods and long robes of the&nbsp;<em>nazarenos</em>&nbsp;and those of the Ku Klux Klan: it&#39;s coincidental and completely unrelated.</p>\n\n<p>Don&#39;t be surprised to see how nicely the people dress to watch the processions, especially during the second half of the week. Women often dress to the nines while many men brave the sun in full suits. Of course not everybody dresses up so much, but, basically, if you want to fit in watching the processions, just leave the t-shirt you wore to paint your garage behind.</p>', 0, 0, 1, 4),
(138, 90, 'Ash ceremony', 'upload/religions/90/138/138.jpg', '2020-02-26', 'Church of Christian', 'Ash Wednesday falls on a different day each year, because it is dependent on the date of Easter. It can occur as early as Feb. 4 or as late as March 10.', '<p>Ash Wednesday falls on a different day each year, because it is dependent on the date of Easter. It can occur as early as Feb.&nbsp;4 or as late as March 10.</p>\n\n<p>This year, Ash Wednesday &nbsp;is Wednesday, March 6.</p>\n\n<p>Ash Wednesday&nbsp;is one of the most important on the Christian calendar, because it marks the start of Lent.</p>\n\n<p>Lent is a six-week period of fasting, self-sacrifice and prayer observed by Christians each&nbsp;year to prepare for the celebration of Easter, when they believe Christ rose from the dead to sit at the right hand of God, his father.</p>\n\n<p>Lent is celebrated over 46 days. It includes 40 days of fasting and six Sundays, on which fasting is not&nbsp;practiced.&nbsp;</p>\n\n<p>The 40-day period has a special significance in the Old and New Testaments. For instance, Moses spent 40 days and nights with God on Mount Sinai in preparation to receive the Ten Commandments. Jesus also is depicted as being led into the wilderness to be tempted by the devil for 40 days.</p>', 1, 1, 1, 4),
(139, 91, 'Lumbini Festival', 'upload/religions/91/139/139.jpg', '2020-10-07', 'Nagarjuna Sagar', 'The Buddhist culture, tradition, art and religion are the main attractions of this festival.', '<p>The three day long Lumbini Festival is an annual festival organized at Nagarjuna Sagar in the state of Andhra Pradesh. The Festival is very popular in the entire state and gives a platform to celebrate the heritage and commemorate the religion of Buddhism in the state. The festival is named after the place Lumbini, which is considered the birth place of Gautam Buddha who was the Guru behind Buddhism. The Lumbini festival organized by the Andhra Pradesh Tourism Development Corporation not only boosts tourism in the state, but also looks after the celebration, activities, events and other arrangements as thousands of tourists as well as pilgrims gather here during the festival. The Festival marks the importance of Buddhism as a religion in Andhra Pradesh, as 2000 years ago Buddhism was the only prevailing religion in the state.</p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/5db00249babbc-Lumbini%20Festival%20Trip.jpg\" style=\"height:394px; width:700px\" />The Lumbini festival throws light on the rich culture and heritage of Buddhism. The festival is a three day long festival, relished with grandeur and fun, recollecting the teachings of Gautam Buddha in different forms and activities. The Lumbini festival usually begins on the second Friday in the month of December and goes on for three days. The festivities enfold with charm in the entire state of Andhra Pradesh. People from all across the country and the world come to join in this festival. This festival provides a large medium for local painters, artisans and sculptors to demonstrate their talent and also earn some revenue.</p>', 1, 1, 1, 4),
(140, 91, 'Magha Puja', 'upload/religions/91/140/140.jpg', '2020-02-08', 'Pagoda', 'This festival is also known as fourfold Sangha day. According to the legendaries, the first Sangha indicates that all the 1250 Buddhists were arahants.', '<p>This festival is also known as fourfold Sangha day. According to the legendaries, the first Sangha indicates that all the 1250 Buddhists were arahants. The second Sangha says Buddha ordained all the 1250 Buddhists. Thirdly all the Buddhist followers gathered on their own to conduct Puja to honour Lord Buddha even Buddha did not invite them. Lastly, the fourth fold Sangha explains that all the 1250 Buddhist followers gathered on full moon day in the Magha month and celebrated Puja to Buddha. Hence Magha Puja has been celebrating the month of Magha.</p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/phat/GettyImages-109272459-56a0c56c3df78cafdaa4e018.jpg\" style=\"height:504px; width:768px\" /></p>\n\n<p>The Buddhists celebrate the Magha Puja with a lot of pomp. It is a very significant festival to the Buddhist community. Especially the festival honours the Sangha and Buddhist community. The Sangh plays an important role in embodies the tradition, culture and the rules of Buddhist life and protects the principles of Dhamma.<br />\nOn the day of Magha Puja, the devotees meet jointly and read the teachings of Lord Buddha. Later they discuss the theme of the of Dhammapada. In the middle of the discussion, the senior devotees or monks deliver their speeches about the importance of Dhammapada and Sangh. Everyone wants to lead their lives in the service of Lord Buddha. Later these discussions, the devotees exchange the gifts among them and lighting the oil lamps.</p>', 0, 0, 1, 4),
(141, 91, 'Buddha', 'upload/religions/91/141/141.jpg', '2020-04-15', 'Pagoda', 'Buddha Purnima festival is celebrated to mark the birth of Lord Buddha. Buddha Purnima or Buddha Jayanti is celebrated with traditional religious fervor. Buddha Purnima falls on the full moon day in the Hindu month of Vaisakh (April/May).', '<p>Buddha Purnima festival is celebrated to mark the birth of Lord Buddha. Buddha Purnima or Buddha Jayanti is celebrated with traditional religious fervor. Buddha Purnima falls on the full moon day in the Hindu month of Vaisakh (April/May). Lord Buddha was born on the Full Moon day in the month of Vaisakh in 563 BC. Here, it is interesting to note that Buddha achieved enlightenment and nirvana (salvation) on the same day (the Full Moon day). Thus, Buddha Purnima also marks the death anniversary of Gautam Buddha. Sarnath holds an important place in Buddhism as Gautam Buddha gave his first sermon at Sarnath. On the occasion of Buddha Jayanti, a large fair is held at Sarnath and the relics of the Buddha are taken out for public display in a procession.</p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/phat/t%E1%BA%A3i%20xu%E1%BB%91ng.jpg\" style=\"height:163px; width:310px\" /></p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/bussshisttemples.jpg\" style=\"height:396px; width:700px\" />Besides Sarnath, the Buddha Purnima is also celebrated with religious fervor at Gaya and Kushinagar and other parts of India and the world. The Buddha Purnima celebrations at Sarnath attract large Buddhist crowds as Buddhists offer prayers in different Buddhist temples at Sarnath on this day. Prayers, sermons, recitation of Buddhist scriptures are other important religious activities performed by the Buddhists at Sarnath. Monks and devotees meditate and worship the statue of Gautam Buddha. The Buddhist devotees also offer fruits, flowers, candles etc to statues of Lord Buddha.</p>', 1, 1, 1, 4),
(142, 91, 'Ullambana', 'upload/religions/91/142/142.jpg', '2020-08-15', 'China', 'Ullambana is celebrated on 15th day of the seventh month as per the Chinese lunisolar calendar. The date of observance of the festival varies each year.', '<p>According to the ancient Buddhist scriptures, the word Ullambana has been derived by combining two Sanskrit words &ndash; Ullam and Bana. In Sanskrit Ullam&nbsp;means to hang upside down and Bana means to rescue. Ullambana therefore means to rescue form being hanged upside down or a great suffering. In present context it is a festival to rescue one&rsquo;s ancestors from hell and liberate their souls.</p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/sang/ullambana-festival.jpg\" style=\"height:450px; width:750px\" /></p>\n\n<p><strong>LEGEND OF ULLAMBANA</strong></p>\n\n<p>The legend of the Ghost Festival is associated with Gautam Buddha and one of his closest disciples, Maudgalyayana. The latter was a Brahmin youth from India who later became one of Buddha&nbsp;chief disciples. When Maudgalyayana attained higher knowledge, including extra sensory abilities; he started searching for his deceased parents.</p>', 1, 1, 1, 4),
(143, 92, 'Bishwa ijtema,Dhaka', 'upload/religions/92/143/143.jpg', '2020-01-10', 'Dhaka, Bangladesh', 'Directly translated to World Conference, this is truly an international Muslim gathering with over 5 million participants every year, making it another of the largest annual gatherings in the world. ', '<p>Directly translated to World Conference, this is truly an international Muslim gathering with over 5 million participants every year, making it another of the largest annual gatherings in the world. The small suburb city, Tongi, the streets will be filled with people praying all together as one. Not only the streets but also the rooftops and basically everywhere is occupied by worshipers praying for 3 days, reciting Quran and having preaches about the meaning of the Quranic verses. The final congregational prayer on the last day will be for wishing for world peace..</p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/sang/Bishwa-Ijtema-1191251.jpg\" style=\"height:393px; width:590px\" /></p>', 1, 1, 1, 4),
(144, 92, 'Chechen Zikr', 'upload/religions/92/144/144.png', '2020-04-01', 'Grozny, Russia', ': Any Thursday or Friday, but best at major Islamic holidays. The distinct Chechen Zikr is a one of the most fascinating Sufi ceremonies in the world. The circular dances, the rhythm, stamping and the prayers are simply so hypnotizing that just by observing it you can induce in a trance.', '<p>Any Thursday or Friday, but best at major Islamic holidays.<br />\nThe distinct Chechen Zikr is a one of the most fascinating Sufi ceremonies in the world. The circular dances, the rhythm, stamping and the prayers are simply so hypnotizing that just by observing it you can induce in a trance.</p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/sang/Caucasus-1340-1024x684.jpg\" style=\"height:684px; width:1024px\" /></p>\n\n<p>The Zikr was in danger of being extinct due to atheistic rule enforcement by the Soviet/Russian authorities, who sees these ceremonies as a threat to them. Also Saudi Arabian Wahabi groups have several times attacked those Sufi orders. Now however, the Chechen Zikr is facing a renaissance and can be witnessed many places in Grozny, also in the Akhmad Kadyrov Mosque. Try to visit during the Islamic Ramadan, Eid or Mawlid to catch a larger gathering of worshipers performing this ritual.</p>', 1, 1, 1, 4),
(145, 92, 'Hajj', 'upload/religions/92/145/145.jpg', '2020-07-28', ' Mecca, Saudi Arabia', 'This one is undisputedly the most famous and important festival of the year in the Islamic world. Every Muslim is required to do a pilgrimage to Mecca once in his or hers lifetime.', '<p>This one is undisputedly the most famous and important festival of the year in the Islamic world. Every Muslim is required to do a pilgrimage to Mecca once in his or hers lifetime. The pilgrimage consists of few rituals that traces back to Abraham who built the Kaaba, which is the most holy building in Islam.</p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/sang/7723DA9D-8823-436F-8526-C3879EDC1234_cx0_cy4_cw0_w1023_r1_s.jpg\" style=\"height:575px; width:1023px\" /></p>\n\n<p>Every year millions of Muslims from all kinds of nations and races gather here, strip themselves of all symbols of status, wealth and pride and they put on the same white garments. All as one they walk around the Kaaba seven times, they face while praying in a circle and they perform all kinds of other interesting rituals and prayers that makes them forget all about their earthly desires, their race and nation and just feel one with their fellow believers.Unfortunately, this festival is closed for non-muslims, so only a muslim (traveller) will be able to witness it in person. However, you can enjoy the rest of the festivals on this list</p>', 1, 1, 1, 4),
(146, 92, 'Mawlid', 'upload/religions/92/146/146.jpg', '2020-10-28', 'Khartoum, Sudan', 'The mawlid is the celebration of the birthday of Prophet Muhammad. This festival is celebrated all over the muslim world, officially except of Saudi Arabia and Qatar, where it is forbidden, however, even there you can experience people celebrating it despite the law. ', '<p>The mawlid is the celebration of the birthday of Prophet Muhammad. This festival is celebrated all over the muslim world, officially except of Saudi Arabia and Qatar, where it is forbidden, however, even there you can experience people celebrating it despite the law.</p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/sang/2820-2-580x330.jpg\" style=\"height:330px; width:580px\" /></p>', 1, 1, 1, 4),
(147, 93, 'Diwali', 'upload/religions/93/147/147.jpg', '2020-11-14', 'India', 'Diwali, Divali, Deepavali, or Deepawali is the Hindu festival of lights, usually lasting five days and celebrated during the Hindu Lunisolar month Kartika (between mid-October and mid-November).', '<h2>What is Diwali?</h2>\n\n<p>Diwali, also known as Deepavali or Dipavali, comes from the Sanksrit word dipalavi<em> </em>meaning row or series of lights.</p>\n\n<p><img alt=\"Diwali celebrations 2017\" src=\"https://static.independent.co.uk/s3fs-public/thumbnails/image/2017/10/19/10/diwali-celebrations-2017.jpg?width=1000&amp;height=614&amp;fit=bounds&amp;format=pjpg&amp;auto=webp&amp;quality=70&amp;crop=16:9,offset-y0.5\" /></p>\n\n<p><img alt=\"Diwali celebrations 2017\" src=\"https://static.independent.co.uk/s3fs-public/thumbnails/image/2017/10/19/09/diwali-2017-celebrations-3.jpg\" /></p>\n\n<p><img alt=\"Diwali celebrations 2017\" src=\"https://static.independent.co.uk/s3fs-public/thumbnails/image/2017/10/19/09/diwali-2017-celebrations-7.jpg\" /></p>\n\n<p><img alt=\"Diwali celebrations 2017\" src=\"https://static.independent.co.uk/s3fs-public/thumbnails/image/2017/10/19/10/diwali-celebrations.jpg\" /></p>\n\n<p>Rajnish Kashyap, general secretary and director of Hindu Council UK, explains that the festival, which is one of the most significant for those of the Hindu faith,&nbsp;can trace its origins back to ancient times when the end of the summer harvest season was celebrated with much pomp and splendour.</p>\n\n<p>It signifies the triumph of light over darkness and good over evil and sees millions of lamps lit at homes, temples, shops and public buildings across the world, Mr Kashyap tells The Independent.</p>\n\n<p>To illuminate the path through which they return and in order to guide them home,&nbsp;(clay lamps) are lit everywhere and the world is bathed in golden hues of light,&nbsp;Mr Kashyap explains.</p>\n\n<p>Lakshmi, the Hindu goddess of wealth, fortune and prosperity, is also celebrated in Hindu households during the festival.</p>\n\n<p>Diwali coincides with the Sikh celebration of Bandi Chhor Divas, a religious holiday that commemorates the release of Sikh Guru Hargobind Ji from the Gwalior Fort in India in the 17th century.</p>\n\n<p>The Guru, who was imprisoned by the Mughal Emperor Jahangir, was standing against the emperor&nbsp;regime&nbsp;oppression of the Indian people,&nbsp;says Gurmel Singh, CEO of Sikh Community and Youth Services and secretary general of the Sikh Council UK.</p>', 1, 1, 1, 4),
(148, 93, 'Ow Hindus Across India ', 'upload/religions/93/148/148.jpg', '2020-08-10', 'internal', 'Save to Wishlist The Krishna Janmashtami festival, popularly known as Janmashtami, is celebrated across India and marks the birth of revered Hindu deity Krishna, the eighth incarnation of Lord Vishnu.', '<p>Save to Wishlist</p>\n\n<p>The Krishna Janmashtami festival, popularly known as Janmashtami, is celebrated across India and marks the birth of revered Hindu deity Krishna, the eighth incarnation of Lord Vishnu.</p>\n\n<p>Conforming to the Hindu lunar calendar, Janmashtami is observed on the eighth day (Ashtami) of Krishna Paksha, or the waning moon, which usually falls in August or September. It is celebrated across the country, but the festivities in Maharashtra, Gujarat and Uttar Pradesh (especially Mathura and Vrindavan) are particularly grand.</p>\n\n<p>Celebrations include dance-drama enactments of the life of Lord Krishna, prayers, night vigils and fasting. The gaiety of the festival is accompanied by cultural events and competitions, the most interesting being<a href=\"https://theculturetrip.com/asia/india/articles/the-human-pyramids-of-janmashtami-festival/\">&nbsp;Dahi Handi</a>&nbsp;(breaking a pot filled with yoghurt).</p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/sang/148.jpg\" style=\"height:435px; width:700px\" /></p>\n\n<p>The legend surrounding Janmashtami</p>\n\n<p>Like every other festival in India, the origin of Janmashtami is associated with a famous legend. According to myth, there was a time when Hindu deity Bhumi Devi (the goddess of earth) prayed to Lord Vishnu to help rid her of evil rulers. One of them was Kansa (in Mathura). Vishnu promised Bhumi Devi that he would reincarnate himself in human form to destroy those inflicting pain upon her and others.</p>\n\n<p>Kansa had a sister named Devaki, who was married to Vasudeva. The day they got married, a heavenly voice predicted that the eighth son of Devaki would kill Kansa. Frightened by this ominous prophecy, Kansa imprisoned the couple and killed six of their children. The seventh child (named Balrama), however, was saved due to divine intervention.</p>\n\n<p>And when the eighth child &ndash; Krishna&ndash; was born, he was believed to be an avatar of Lord Vishnu (the preserver and protector of the universe). The doors to the prison opened and Vasudeva&rsquo;s chains fell off magically. In order to protect his son, he gave him to Nanda, his friend who lived in Gokul. From that point onward, Krishna was raised by his foster parents, Yashoda and Nanda. Years later, Lord Krishna killed Kansa and the other evil kings. Janmashtami is a celebration of this legend and marks the victory of good and the destruction of all things bad.</p>', 1, 1, 1, 4),
(149, 93, 'Maha Shivaratri', 'upload/religions/93/149/149.jpg', '2020-02-21', 'India', 'Shiva is the foremost deity in the Hindu pantheon and regarded as the destroyer. Maha Shivaratri, or ‘the great night of Shiva’, commemorates the supremacy of Shiva. People refrain from sleeping and instead pray to the great lord. ', '<p>Shiva is the foremost deity in the Hindu pantheon and regarded as the destroyer. Maha Shivaratri, or &lsquo;the great night of Shiva&rsquo;, commemorates the supremacy of Shiva. People refrain from sleeping and instead pray to the great lord. Most dedicated disciples of Lord Shiva celebrate Maha Shivaratri by fasting and chanting the hymns to Tandava, a dance performed by Lord Shiva.</p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/sang/mahashivaratri2_sm_pilgrims.jpg\" style=\"height:385px; width:684px\" /></p>', 1, 1, 1, 4),
(150, 93, 'Makar Sankranti', 'upload/religions/93/150/150.jpeg', '2020-01-15', 'India', 'Makar Sankranti is one of the most propitious days for Hindus, and is distinguished in almost all parts of India in countless cultural forms, with immense devotion, gaiety and fervor. This article deals with the Makar Sankranti festival, significance, importance, history etc.', '<h1>Why Makar Sankranti is celebrated?</h1>\n\n<p><strong>Makar Sankranti is one of the most propitious days for Hindus, and is distinguished in almost all parts of India in countless cultural forms, with immense devotion, gaiety and fervor. This article deals with the Makar Sankranti festival, significance, importance, history etc.</strong></p>\n\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/sang/Lohri-festival.jpg\" /></p>\n\n<p><em>Why Makar Sankranti festival is celebrated?</em></p>\n\n<p>Makar Sankranti is one of the most propitious days for the Hindus, and is distinguished in almost all parts of India in countless cultural forms, with immense devotion, gaiety and fervour. It is the main festival of Hindus and is dedicated to Lord Sun. It also refers to a specific solar day in the Hindu calendar. On this auspicious day, the sun enters the zodiac sign of Capricorn or Makar which marks the end of winter month and start of longer days. This is the beginning of the month of Magh. To recompense for the distinction that happens due to the revolution around the sun, every 80 years the day of Sankranti is deferred by one day. Makar Sankranti generally falls on January 14th. From the day of Makar Sankranti, the sun begins its northward journey or Uttarayan journey. Therefore, this festival is also known as Uttarayan.<br />\n<strong>History of Makar Sankranti</strong><br />\nSankranti is deemed a Deity. As per the legend Sankranti killed a devil named Sankarasur. The day next to Makar Sankrant is called Karidin or Kinkrant. On this day, Devi slayed the devil Kinkarasur.The information of Makar Sankranti is available in Panchang. The Panchang is the Hindu Almanac that provides information on the age, form, clothing, direction and movement of Sankranti<br />\nAccording to the scriptures, Dakshinayan symbolizes as the night of god or the sign of negativity and Uttarayan is considered as a symbol of day of Gods or a sign of positivity. Since on this day sun starts its journey towards the north so, people take a holy dip in Ganga, Godavari, Krishna, Yamuna River at holy places, chant mantras etc. Normally the sun affects all the zodiac signs, but it is said that the entry of the sun in the zodiac sign of Cancer and Capricorn religiously is very fruitful.<br />\nBefore Makar Sankranti, the sun is in the Southern Hemisphere. For this reason, in India, in winter nights are longer and days are smaller. But with the Makar Sankranti, sun starts its journey towards Northern Hemisphere and so, days will be longer and nights smaller.<br />\nOn the occasion of Makar Sankranti, people express their gratitude towards the people of India throughout the year by worshiping the sun God in various forms. Any meritorious deeds or donation during this period establishes more fruitful.<br />\nPerforming haldi kumkum ceremony in a way that invokes the waves of quiescent Adi Shakti in the Universe to get triggered. This helps in generating impression of Sagun devotion on the mind of a person enhances the Spiritual emotion to God.<br />\n<strong>In different regions of the country, Makar Sankranti is celebrated by different names</strong><br />\n<strong>Lohri</strong>: One day before Makar Sankranti, on 13th January, Lohri is celebrated . At night, people gather around the bonfire and throw til, puffed ricepopcorns into the flames of the bonfire. Prayers are offered to the bonfire seeking abundanceprosperity.</p>', 1, 1, 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `name_payment` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `payment_method`
--

INSERT INTO `payment_method` (`id`, `name_payment`, `status`) VALUES
(1, 'Pay To Cash', 1),
(2, 'Visa/MasterCard', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `religions`
--

CREATE TABLE `religions` (
  `id` int(11) NOT NULL,
  `name_religion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avata_religion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cate_religion` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `religions`
--

INSERT INTO `religions` (`id`, `name_religion`, `avata_religion`, `id_cate_religion`, `status`) VALUES
(90, 'Christian', 'upload/religions/90/90.jpg', 73, 1),
(91, 'Buddhism', 'upload/religions/91/91.jpg', 74, 1),
(92, 'Islam', 'upload/religions/92/92.jpg', 75, 1),
(93, 'Hindu', 'upload/religions/93/93.jpg', 76, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name_role` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name_role`) VALUES
(1, 'Administrator'),
(2, 'Staff'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT 3,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `phonenumber`, `address`, `id_role`, `status`) VALUES
(4, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'huynhcongphat2510@gmail.com', '0904667081', 'Truong Sa1', 1, 1),
(5, 'admin1', '202cb962ac59075b964b07152d234b70', 'Manage', 'huynhcongphat@gmail.com', '0904667092', 'HN', 3, 1),
(6, 'congphat', '202cb962ac59075b964b07152d234b70', 'Congphat', 'huynhcongphat@gmail.com', '0904667021', 'hcm', 3, 1),
(7, 'congphat1', '202cb962ac59075b964b07152d234b70', 'phat', 'phat@gmail.com', '0904670822', 'hcm', 2, 0),
(8, 'congphat123', '202cb962ac59075b964b07152d234b70', 'Phat', 'huynhcongphat2510@gmail.com', '0904667082', 'hn', 3, 0),
(9, 'admin2', '202cb962ac59075b964b07152d234b70', 'Cong Phat', 'huynhcongphat@gmail.com', '0904667082', 'HCM', 2, 1),
(10, '123213444423213', '202cb962ac59075b964b07152d234b70', '44444', '123213213@gmail.com', '0904667081', '123213213123', 2, 1),
(11, 'Sang', '202cb962ac59075b964b07152d234b70', 'Nguyen Huu Sang', 'sangolariel14@gmail.com', '0522582475', 'Ho Chi Minh', 3, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cate_book` (`id_cate_book_category`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_buy` (`id_user_buy`),
  ADD KEY `id_payment_method` (`id_payment_method`);

--
-- Chỉ mục cho bảng `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_book` (`id_book`);

--
-- Chỉ mục cho bảng `itemfestivals`
--
ALTER TABLE `itemfestivals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reli` (`id_reli`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cate_religion` (`id_cate_religion`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `itemfestivals`
--
ALTER TABLE `itemfestivals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `religions`
--
ALTER TABLE `religions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `book_category` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `book_category`
--
ALTER TABLE `book_category`
  ADD CONSTRAINT `book_category_ibfk_1` FOREIGN KEY (`id_cate_book_category`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_user_buy`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`id_payment_method`) REFERENCES `payment_method` (`id`);

--
-- Các ràng buộc cho bảng `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`id_invoice`) REFERENCES `invoice` (`id`),
  ADD CONSTRAINT `invoice_details_ibfk_2` FOREIGN KEY (`id_book`) REFERENCES `books` (`id`);

--
-- Các ràng buộc cho bảng `itemfestivals`
--
ALTER TABLE `itemfestivals`
  ADD CONSTRAINT `itemfestivals_ibfk_1` FOREIGN KEY (`id_reli`) REFERENCES `religions` (`id`),
  ADD CONSTRAINT `itemfestivals_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `religions`
--
ALTER TABLE `religions`
  ADD CONSTRAINT `religions_ibfk_1` FOREIGN KEY (`id_cate_religion`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
