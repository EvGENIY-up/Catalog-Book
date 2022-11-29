-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 29, 2022 at 11:23 AM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalog_book`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `fullname`, `country`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Александр Сергеевич Пушкин', 'Россия', NULL, NULL, NULL),
(2, 'Сергей Александрович Есенин', 'Россия', NULL, NULL, NULL),
(3, 'Фёдор Михайлович Достоевский', 'Россия', NULL, NULL, NULL),
(4, 'Лев Николаевич Толстой', 'Россия', NULL, NULL, NULL),
(5, 'Михаил Юрьевич Лермонтов', 'Россия', NULL, NULL, NULL),
(6, 'Иван Сергеевич Тургенев', 'Россия', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` smallint NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `author_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `year`, `description`, `img`, `author_id`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Идиот', 1869, 'Действие первой части происходит на протяжении одного дня, 27 ноября. 26-летний князь Лев Николаевич Мышкин возвращается из Швейцарии, где провёл несколько лет, лечась от эпилепсии. Князь предстаёт человеком искренним и невинным, хотя и прилично разбирающимся в отношениях между людьми.', NULL, 3, 1, 1, NULL, NULL),
(2, 'Война и мир', 1867, 'Важнейшее значение в романе имеют философские взгляды писателя. Публицистические главы предваряют и объясняют художественное описание событий. Фатализм Толстого связан с его пониманием стихийности истории как «бессознательной, общей, роевой жизни человечества».', NULL, 4, 1, 2, NULL, NULL),
(3, 'Я её только что создал', 2022, 'Ну здесь вообщем, надо что-то написать, какой-либо текст, который описывает вашу книгу. В целом это очень интересная книга, придумал во время теста, написал книгу за 0.00001 мс', NULL, 3, 3, 3, '2022-11-28 09:02:28', '2022-11-28 09:02:28'),
(4, 'Какая-то книга', 2022, 'Крутая книг просто класс я бы сказал вау', NULL, 2, 2, 3, '2022-11-28 09:03:31', '2022-11-28 09:03:31'),
(5, 'Какая-то книга3', 2020, 'Крутая книг просто класс я бы сказал вау супер', NULL, 6, 2, 3, '2022-11-28 09:04:34', '2022-11-28 14:40:49'),
(7, 'Какая-то книга25', 2021, 'Крутая книг просто класс я бы сказал вау', NULL, 6, 3, 3, '2022-11-28 09:05:26', '2022-11-28 09:05:26'),
(8, 'Какая-то книга21', 2021, 'Крутая книг просто класс я бы сказал вау', NULL, 2, 4, 3, '2022-11-28 09:05:39', '2022-11-28 09:05:39'),
(9, 'Какая-то книга23', 2021, 'Крутая книг просто класс я бы сказал вауагва', NULL, 3, 4, 3, '2022-11-28 09:06:35', '2022-11-28 09:06:35'),
(10, 'Какая-то книга454', 2021, 'Крутая книг просто класс я бы сказал вауагвапа', NULL, 5, 4, 3, '2022-11-28 09:06:52', '2022-11-28 09:06:52'),
(11, 'Какая-то книга4543', 2002, 'Крутая книг просто класс я бы сказал вауагвапа', NULL, 1, 4, 3, '2022-11-28 09:07:06', '2022-11-28 09:07:06'),
(12, 'Какая-то книга45434', 2001, 'Крутая книг просто класс я бы сказал вауагвапа', NULL, 1, 2, 3, '2022-11-28 09:07:31', '2022-11-28 09:07:31'),
(13, 'Какая-то книга45434', 1824, 'Любовь', NULL, 1, 1, 3, '2022-11-28 09:07:55', '2022-11-28 09:07:55'),
(14, 'Смерть поэта', 1832, 'Пушкин умер(', NULL, 5, 2, 3, '2022-11-28 09:08:56', '2022-11-28 09:08:56'),
(15, 'книгаа 44', 1871, 'Крутая книга да', NULL, 3, 3, 3, '2022-11-28 15:00:00', '2022-11-28 15:00:00'),
(16, '3321', 1432, 'Новое описание', NULL, 3, 3, 4, '2022-11-29 04:36:58', '2022-11-29 04:36:58'),
(17, '342', 1432, 'Новая книга', NULL, 2, 3, 4, '2022-11-29 04:41:24', '2022-11-29 04:41:24'),
(18, '32', 1342, 'Ещё одно написание', NULL, 3, 4, 4, '2022-11-29 04:44:19', '2022-11-29 04:44:19'),
(19, 'Книга500', 1843, '132', NULL, 3, 4, 4, '2022-11-29 04:45:38', '2022-11-29 04:45:38'),
(20, '321', 1837, 'Тестовая книга', NULL, 5, 3, 4, '2022-11-29 04:53:56', '2022-11-29 04:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Роман', 'Роман', NULL, NULL),
(2, 'Рассказ', 'Рассказ', NULL, NULL),
(3, 'Повесть', 'Повесть', NULL, NULL),
(4, 'Пьеса', 'Пьеса', NULL, NULL),
(5, 'Драма', 'Жанр вызывающий волнующие чувства', '2022-11-28 19:13:50', '2022-11-28 19:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_24_065229_create_authors_table', 1),
(6, '2022_11_24_065503_create_categories_table', 1),
(7, '2022_11_24_065558_create_books_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '121212', 1, NULL, NULL, NULL),
(2, 'user', 'user@gmail.com', NULL, '131313', 0, NULL, NULL, NULL),
(3, 'endfor', 'unforu0@gmail.com', NULL, '$2y$10$peMfe3UWSPbIsy1iewk4xOixeV7hNHMGTHnbYxJixhf7EHgGlmP0a', 0, NULL, '2022-11-27 11:01:17', '2022-11-27 11:01:17'),
(4, 'titles', 'unforu0@mail.com', NULL, '$2y$10$18en6Rmjlx8JmpJujD.hvewfNlbrXK.rFBI0ESbtBKkB9bgq4PJXK', 1, NULL, '2022-11-28 16:50:03', '2022-11-28 16:50:03');

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
  ADD KEY `books_author_id_foreign` (`author_id`),
  ADD KEY `books_category_id_foreign` (`category_id`),
  ADD KEY `books_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
