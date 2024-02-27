-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 10:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone`) VALUES
(1, 'admin', 'hashu@gmail.com', 'Yb2ifh43@5rPEd6d', '9160293602');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`) VALUES
(1, 'Gayle Laakmaan McDowell'),
(2, 'George Orwell'),
(3, 'J.K. Rowling'),
(4, 'Harper Lee'),
(5, 'F. Scott Fitzgerald'),
(6, 'Jane Austen'),
(7, 'Dan Brown'),
(8, 'Dale Carnegie'),
(9, 'Stephen R. Covey'),
(10, 'Charles Duhigg'),
(11, 'Don Norman'),
(12, 'Thomas H. Cormen'),
(13, 'Brian W. Kernighan'),
(14, 'Robert Sedgewick'),
(15, 'Jon Duckett'),
(16, 'Andrew S. Tanenbaum');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `book_price` int(11) DEFAULT NULL,
  `isbn` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `author_id`, `category_id`, `book_price`, `isbn`) VALUES
(1, 'Cracking the Coding Interview', 1, 5, 399, '9780984782857'),
(2, '1984', 2, 1, 999, '9780451524935'),
(3, 'Animal Farm', 2, 1, 800, '9780451526342'),
(4, 'Harry Potter and the Philosopher\'s Stone', 3, 2, 1299, '9780747532699'),
(5, 'Harry Potter and the Chamber of Secrets', 3, 2, 1299, '9780439064873'),
(6, 'To Kill a Mockingbird', 4, 4, 999, '9780446310789'),
(7, 'The Great Gatsby', 5, 1, 899, '9780743273565'),
(8, 'Pride and Prejudice', 6, 2, 899, '9780486284736'),
(9, 'The Da Vinci Code', 7, 2, 1299, '9780307474278'),
(10, 'How to Win Friends and Influence People', 8, 3, 1150, '9780671027032'),
(11, 'The 7 Habits of Highly Effective People', 9, 3, 1500, '9780743269513'),
(12, 'The Power of Habit', 10, 3, 1300, '9780812981605'),
(13, 'The Design of Everyday Things', 11, 5, 1500, '9780465050659'),
(14, 'Introduction to Algorithms', 12, 5, 6500, '9780262033848'),
(15, 'C Programming Language', 13, 5, 2899, '9780131103627'),
(16, 'Algorithms', 14, 5, 6150, '9780321573513'),
(17, 'HTML and CSS: Design and Build Websites', 15, 5, 2000, '9781118008188'),
(18, 'Computer Networks', 16, 5, 4999, '9780132126953');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Fiction'),
(2, 'Novel'),
(3, 'Motivation'),
(4, 'Story'),
(5, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `s_no` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `book_author` varchar(255) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `issue_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`s_no`, `book_id`, `book_name`, `book_author`, `student_id`, `status`, `issue_date`) VALUES
(1, 1, 'Cracking the Coding Interview', 'Gayle Laakmaan McDowell', 10, 'returned', '2023-05-01'),
(2, 14, 'Introduction to Algorithms', 'Thomas H. Cormen', 11, 'not returned', '2023-04-29'),
(3, 13, 'The Design of Everyday Things', 'Don Norman', 12, 'returned', '2023-04-30'),
(12, 18, 'Computer Networks', 'Andrew S. Tanenbaum', 11, 'not returned', '2023-05-11'),
(13, 15, 'C Programming Language', 'Brian W. Kernighan', 12, 'not returned', '2023-05-11'),
(14, 15, 'C Programming Language', 'Brian W. Kernighan', 13, 'returned', '2023-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`) VALUES
(10, 'Hashu', 'hashu@gmail.com', 'hashu007', '9160293602'),
(11, 'Hazash', 'hazash@gmail.com', 'h@z@sh11', '9160293602'),
(12, 'Zahash', 'zahash.z@gmail.com', 'zahash123', '9182653327'),
(13, 'Sudharshan', 'muthukurusudharshan@gmail.com', '16Jan2002', '8328351273');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`s_no`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD CONSTRAINT `issued_books_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `issued_books_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
