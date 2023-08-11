-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 11:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_count` int(11) NOT NULL DEFAULT 0,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `popularity` int(11) NOT NULL,
  `book_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `category_name`, `book_count`, `description`, `popularity`, `book_file`, `book_cover`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'The Driver In the Dark', 'Comedy', 87, 'popol kupry siuu lololo siuu', 15, 'book_files/1772014901590708.pdf', 'upload/1772106632136825.png', 'the-driver-in-the-dark', 2, NULL, '2023-07-22 04:20:43'),
(2, 'Book Title', 'Horror', 99, 'popox kurapp', 10, 'book_files/1772021769208707.pdf', 'upload/1772106746822064.jpg', 'book-title', 1, NULL, '2023-07-22 00:58:10'),
(4, 'Purpose', 'Comedy', 76, 'We use cookies to help our website function. If you consent, we’ll also use cookies to measure & improve the site, personalise content & ads, and interact with social media. We’ll share information with our social media, advertising & analytics partners. If you don’t want these cookies, click manage my cookies. You can also read our cookie policy', 4, 'book_files/1772023357757980.pdf', 'upload/1772107091614471.jpg', 'purpose', 2, NULL, '2023-07-22 01:03:39'),
(6, 'Dog', 'Comedy', 66, 'popo kecoa', 21, 'book_files/1772051499918233.pdf', 'upload/1772107020308356.jpg', 'dog', 2, NULL, '2023-07-22 01:02:31'),
(7, 'Cinta Sunset', 'Romance', 23, 'lololo', 19, 'book_files/1772106952245970.pdf', 'book_covers/1772106952324996.jpg', 'cinta-tak-pandang-apapun', 4, NULL, NULL),
(8, 'Can You Hear Me ?', 'Horror', 12, 'xxixixi siuu', 11, 'book_files/1772108360629736.pdf', 'book_covers/1772108362352997.jpg', 'can-you-hear-me-?', 1, NULL, NULL),
(10, 'kolo muani', 'Comedy', 11, 'popow', 8, 'book_files/1772196392722480.pdf', 'book_covers/1772196392819740.jpeg', 'kolo-muani', 2, NULL, NULL),
(13, 'kuku', 'Religi', 90, 'kiki', 92, 'book_files/1772200168323160.pdf', 'book_covers/1772200168433468.jpg', 'kuku', 5, NULL, NULL),
(14, 'chinoo', 'Romance', 77, 'lololo gk bahaya tah ?', 0, 'book_files/1772200221410267.pdf', 'book_covers/1772200221847193.jpg', 'chinoo', 4, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
