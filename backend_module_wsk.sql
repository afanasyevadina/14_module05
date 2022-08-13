-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 13 2022 г., 09:36
-- Версия сервера: 8.0.29
-- Версия PHP: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `backend_module_wsk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate_id` int DEFAULT NULL,
  `job_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id`, `candidate_id`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2022-08-13 02:46:15', '2022-08-13 02:46:15'),
(2, 1, 3, '2022-08-13 03:32:35', '2022-08-13 03:32:35'),
(3, 2, 3, '2022-08-13 03:34:09', '2022-08-13 03:34:09');

-- --------------------------------------------------------

--
-- Структура таблицы `application_competences`
--

CREATE TABLE `application_competences` (
  `id` bigint UNSIGNED NOT NULL,
  `application_id` int DEFAULT NULL,
  `competence_id` int DEFAULT NULL,
  `level_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `application_competences`
--

INSERT INTO `application_competences` (`id`, `application_id`, `competence_id`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 1, 68, 1, '2022-08-13 02:46:15', '2022-08-13 02:46:15'),
(2, 1, 69, 2, '2022-08-13 02:46:15', '2022-08-13 02:46:15'),
(3, 1, 70, 3, '2022-08-13 02:46:15', '2022-08-13 02:46:15'),
(4, 1, 71, 4, '2022-08-13 02:46:15', '2022-08-13 02:46:15'),
(5, 2, 72, 2, '2022-08-13 03:32:35', '2022-08-13 03:32:35'),
(6, 2, 73, 3, '2022-08-13 03:32:35', '2022-08-13 03:32:35'),
(7, 2, 74, 4, '2022-08-13 03:32:35', '2022-08-13 03:32:35'),
(8, 3, 72, 1, '2022-08-13 03:34:09', '2022-08-13 03:34:09'),
(9, 3, 73, 3, '2022-08-13 03:34:09', '2022-08-13 03:34:09'),
(10, 3, 74, 1, '2022-08-13 03:34:09', '2022-08-13 03:34:09');

-- --------------------------------------------------------

--
-- Структура таблицы `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `candidates`
--

INSERT INTO `candidates` (`id`, `email`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'daa@aaa.aaa', 'Dina A', '35345345', '2022-08-13 02:46:15', '2022-08-13 02:46:15'),
(2, 'fff@fff.fff', 'werwerwer', 'rewr', '2022-08-13 03:34:09', '2022-08-13 03:34:09');

-- --------------------------------------------------------

--
-- Структура таблицы `competences`
--

CREATE TABLE `competences` (
  `id` int NOT NULL,
  `competence` varchar(8000) NOT NULL,
  `height` int NOT NULL,
  `job_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `competences`
--

INSERT INTO `competences` (`id`, `competence`, `height`, `job_id`) VALUES
(1, 'HTML', 10, 1),
(2, 'CSS', 10, 1),
(3, 'Javascript', 20, 1),
(4, 'Angular framework', 30, 1),
(5, 'Automated Tests', 20, 1),
(6, 'Work in groups', 5, 1),
(67, 'Work with Agile Methods', 5, 1),
(68, 'SQL Language', 30, 2),
(69, 'Microsoft SQL Server', 10, 2),
(70, 'Oracle', 50, 2),
(71, 'MySQL', 10, 2),
(72, 'A', 35, 3),
(73, 'B', 35, 3),
(74, 'B', 30, 3),
(75, 'a', 100, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` int NOT NULL,
  `job` varchar(8000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `jobs`
--

INSERT INTO `jobs` (`id`, `job`) VALUES
(1, 'Web Designer'),
(2, 'Data Base Administrator'),
(3, 'Frontend Devloper'),
(4, 'Honone');

-- --------------------------------------------------------

--
-- Структура таблицы `levels`
--

CREATE TABLE `levels` (
  `id` int NOT NULL,
  `level` varchar(8000) NOT NULL,
  `factor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `levels`
--

INSERT INTO `levels` (`id`, `level`, `factor`) VALUES
(1, 'No knowledge', '0.00'),
(2, 'Beginner ', '0.33'),
(3, 'Full', '0.66'),
(4, 'Expert ', '1.00');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_08_13_041616_create_candidates_table', 1),
(3, '2022_08_13_041626_create_applications_table', 1),
(4, '2022_08_13_041633_create_application_competences_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
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

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `application_competences`
--
ALTER TABLE `application_competences`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `application_competences`
--
ALTER TABLE `application_competences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `competences_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
