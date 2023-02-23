-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 12:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brainser_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `surname` varchar(32) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `surname`, `bio`, `is_deleted`) VALUES
(12, 'Rick', 'Sekuloski', 'Riste aka Rick Sekuloski is a web designer/developer since 2010. He is currently working on creating courses, books and content for his students on multiple platforms like Udemy.', 0),
(13, 'Cooper', 'Alvin', 'Cooper Alvin was born in New York, USA in 1988. He developed a deep understanding an passion around computers as a kid. This went as far as getting a Degree on IT one of the best technology schools on the world, the Massachusetts Institute of Technology. He developed his skills as a computer programmer working for many Fortune 500 companies designing systems, and also spent 2 years working in CyberSecurity on one of the most-known e-commerce companies around. He recently started to work as a freelancer on his own personal projects, and writes about his passion on his free time.', 0),
(14, 'Code', 'Quickly', 'Group of masterminds, wanting to teach the generations about programming through books, videos and audio books. ', 0),
(15, 'Ivelin', 'Demirov', 'Ivelin Demirov is a Canadian serial entrepreneur, best selling author, investor and the founder and CEO of River Cleaner. Ivelin started his career as an industrial design engineer, a profession he abandoned for his love of entrepreneurship, initially selling on eBay and then moved to Amazon.', 0),
(16, 'Andy', 'Williams', 'After graduating from Hull University (North Humberside, UK), I went on to do a Ph.D. at Cardiff University where I studied endocrinology in fish. After working as a research associate at Cardiff University I decided I wanted to be a teacher, so went back to University (this time Birmingham) to study for a teaching certificate.\r\nOn a day to day basis, I write \"How To\" books and create courses related to websites, SEO and other topics of interest to anyone running a website.', 0),
(17, 'Joe', 'Attardi', 'Software Engineer with 18+ years of experience specializing in all things front-end. Author and freelance writer. Geek at heart. Massachusetts, USAjoeattardi.dev', 0),
(18, 'Jon', 'Duckett', 'Jon Duckett Jon Duckett has been helping companies create innovative digital solutions for over 15 years, designing and delivering web and mobile projects for small businesses and tech startups through to global brands like Diesel, Philips, Nike, Wrangler, and Xerox.', 0),
(19, 'Bintu', 'Harwani', 'B.M.Harwani is founder and owner of Microchip Computer Education (MCE), based in Ajmer, India that provides computer education in all programming and web developing platforms. He graduated with a BE in computer engineering from the University of Pune, and also has a \'C\' Level (master\'s diploma in computer technology) from DOEACC, Government Of India. Being involved in teaching field for over 18 years, he has developed the art of explaining even the most complicated topics in a straightforward way.', 0),
(20, 'Benjamin', 'Jakobus', 'Benjamin Jakobus graduated with a BSc in Computer Science from University College Cork and obtained an MSc in Advanced Computing from Imperial College London. As a software engineer, he has worked on various web-development projects across Europe and Brazil.', 0),
(21, 'Daniel', 'Foreman', 'Daniel Foreman Professional eLearning developer, with multiple courses taught from primary to university level! An expert in front-end web technologies, HTML 5.2, CSS 3, ES6 (JavaScript) and Bootstrap 5.', 0),
(22, 'Martin', 'MG', 'MG Martin has been working in the IT industry for several years and has gained knowledge and experience through his passion for anything innovative and fresh. \r\nWith his knowledge and expertise in this specific field, he has made it his purpose to share and educate his readers with by equipping them with the latest trends in IT starting from the fundamentals going to the complex theories and programs', 0),
(23, 'Andy', 'Vickler', 'Andy Vickler, the author of Web Development. ', 0),
(24, 'Dennis', 'Hutten', 'Dennis Hutten has written 19 books for the IT field. \r\nMost popular book is AWS: Amazon Web Services Tutorial The Ultimate Beginners.', 0),
(25, 'Jesper', 'Wisborg Krogh', 'Jesper Wisborg Krogh has worked with MySQL databases since 2006 both as an SQL developer, a database administrator, and for more than eight years as part of the Oracle MySQL Support team. He currently works as a database reliability engineer for Okta. He has spoken at MySQL Connect and Oracle OpenWorld on several occasions, and addition to his books, he regularly blogs on MySQL topics and has authored around 800 documents in the Oracle Knowledge Base. He has contributed to the sys schema and four Oracle Certified Professional (OCP) exams for MySQL 5.6 to 8.0.', 0),
(26, 'Daniel', 'Correa', 'Daniel Correa is a researcher and has been a software developer for several years. Daniel has a Ph.D. in Computer Science. He is a professor at Universidad EAFIT in Colombia. He is interested in software architectures, frameworks (such as Laravel, Django, Express, Vue, React, Angular, and many more), web development, and clean code.', 0),
(27, 'AndrÃ©s', 'Cruz', 'AndrÃ©s Crus specializes in Laravel, CodeIgniter, Django, Flask and Vue. \r\nHe also teaches on Udemy and YouTube.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(32) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `publish_year` int(11) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `publish_year`, `pages`, `img`, `category_id`, `is_deleted`) VALUES
(18, 'Web Design with HTML5', 12, 2021, 217, 'https://m.media-amazon.com/images/I/41to1kzuF3S.jpg', 24, 0),
(19, 'Learn HTML and CSS', 13, 2018, 113, 'https://m.media-amazon.com/images/I/41mGtsjz9IL.jpg', 24, 0),
(20, 'Learn JavaScript Quickly', 14, 2020, 176, 'https://m.media-amazon.com/images/I/51F8Q2HHw-L.jpg', 25, 0),
(21, 'Learn JavaScript VISUALLY', 15, 2014, 164, 'https://m.media-amazon.com/images/I/51H98Em70ZL.jpg', 25, 0),
(22, 'CSS for Beginners', 16, 2013, 171, 'https://m.media-amazon.com/images/I/414zYx1SEoL.jpg', 26, 0),
(23, 'Modern CSS', 17, 2020, 192, 'https://m.media-amazon.com/images/I/41HUNvW3OBL.jpg', 26, 0),
(24, 'JS and jQuery', 18, 2014, 1152, 'https://m.media-amazon.com/images/I/41X2i47NXUL._SX435_BO1,204,203,200_.jpg', 27, 0),
(25, 'jQuery Recipes', 19, 2021, 340, 'https://m.media-amazon.com/images/I/41qje4wsZ-L.jpg', 27, 0),
(26, 'Bootstrap 4', 20, 2018, 354, 'https://m.media-amazon.com/images/I/51t76oG19tL.jpg', 28, 0),
(27, 'Bootstrap 5', 21, 2021, 173, 'https://m.media-amazon.com/images/I/418kT4nOzdS.jpg', 28, 0),
(28, 'PHP:Guide for Beginners', 22, 2019, 238, 'https://m.media-amazon.com/images/I/41LRdjcEhnL._SX331_BO1,204,203,200_.jpg', 29, 0),
(29, 'PHP: 3 books in 1', 23, 2022, 515, 'https://m.media-amazon.com/images/I/41Jq8qqjZpL.jpg', 29, 0),
(30, 'MySQL for Beginners', 24, 2018, 122, 'https://m.media-amazon.com/images/I/41599FpEzVL.jpg', 30, 0),
(31, 'MySQL 8 Query', 25, 2020, 263, 'https://m.media-amazon.com/images/I/41xF18XHE5L.jpg', 30, 0),
(32, 'Practical Laravel', 26, 2022, 244, 'https://m.media-amazon.com/images/I/41ZngZbsD1L.jpg', 31, 0),
(33, 'Laravel Inertia', 27, 2022, 354, 'https://m.media-amazon.com/images/I/31LuixgERwL.jpg', 31, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `category` varchar(32) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `is_deleted`) VALUES
(24, 'HTML5', 0),
(25, 'JavaScript', 0),
(26, 'CSS', 0),
(27, 'jQuery', 0),
(28, 'Bootstrap', 0),
(29, 'PHP', 0),
(30, 'MySQL', 0),
(31, 'Laravel', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT 0,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `book_id`, `approved`, `comment`) VALUES
(58, 32, 18, 1, 'This books has helped me to regain my creativity back with experimenting with patterns. '),
(59, 32, 19, 1, 'This is a very unique book. I recommend it to anyone who wants to get creative in development.'),
(60, 32, 20, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(61, 32, 21, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(62, 32, 22, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(63, 32, 23, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(64, 32, 24, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(65, 32, 25, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(66, 32, 26, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(67, 32, 27, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(68, 32, 28, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(69, 32, 29, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(70, 32, 30, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(71, 32, 31, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(72, 32, 32, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(73, 32, 33, 1, 'I recommend this book to anyone who wants to learn about the basics.'),
(74, 33, 32, 0, 'Daniel is a great author! I enjoyed how he can explain even the most complicated topics in easy way.');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `note`, `book_id`, `user_id`) VALUES
(73, 'I have finished this book. \nThis is a reminder to check the other ones from Rick.', 18, 32);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$RY8kG4N6mbcnlaIPT9kHLeXNXXxCN3M4Dl7.d4YW6uKFLn2M0GWnW', 1),
(32, 'Ana', 'ana@example.com', '$2y$10$JXcGfg33V9do6XPt/.3W0uK21G7ebNiaW4rMe35vKjApYDLvG8zDq', 2),
(33, 'Kate', 'kate@example.com', '$2y$10$zbV9JbmaK2W8CBYKw0zaOeEMol1a4LYuCzeUCj2PN/.XqkBQLPgoy', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
