-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2025 at 03:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--


-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--


-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--


-- --------------------------------------------------------

--
-- Table structure for table `groups`
--


--
-- Dumping data for table `groups`
--

INSERT IGNORE INTO `groups` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2025-05-20 11:57:47', '2025-05-20 11:57:47', 'Teste'),
(2, '2025-05-20 11:58:51', '2025-05-20 11:58:51', '1 de junho'),
(3, '2025-05-20 11:59:49', '2025-05-20 11:59:49', 'Final do ano'),
(4, '2025-05-22 08:30:09', '2025-05-22 08:30:09', 'Teste'),
(5, '2025-05-22 11:15:45', '2025-05-22 11:15:45', 'grupo SD');

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--


--
-- Dumping data for table `group_user`
--

INSERT IGNORE INTO `group_user` (`id`, `group_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 3, 1, NULL, NULL),
(6, 3, 5, NULL, NULL),
(7, 3, 6, NULL, NULL),
(8, 4, 1, NULL, NULL),
(9, 4, 2, NULL, NULL),
(10, 4, 3, NULL, NULL),
(11, 4, 6, NULL, NULL),
(12, 5, 7, NULL, NULL),
(13, 5, 1, NULL, NULL),
(14, 5, 2, NULL, NULL),
(15, 5, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--


-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--


-- --------------------------------------------------------

--
-- Table structure for table `messages`
--


--
-- Dumping data for table `messages`
--

INSERT IGNORE INTO `messages` (`id`, `created_at`, `updated_at`, `sender_id`, `receiver_id`, `group_id`, `body`) VALUES
(133, '2025-05-22 11:18:27', '2025-05-22 11:18:27', 7, 2, NULL, 'Boa tarde'),
(145, '2025-05-28 13:47:04', '2025-05-28 13:47:04', 1, NULL, 3, 'Final de ano'),
(152, '2025-05-29 08:47:03', '2025-05-29 08:47:03', 1, 2, NULL, 'Bonjour'),
(183, '2025-05-30 13:40:27', '2025-05-30 13:40:27', 2, 1, NULL, 'Bom dia!'),
(184, '2025-05-30 13:41:10', '2025-05-30 13:41:10', 1, 2, NULL, 'Como estão?'),
(185, '2025-05-30 13:42:02', '2025-05-30 13:42:02', 2, 1, NULL, 'Estamos bem, e do vocês?'),
(186, '2025-05-30 15:38:38', '2025-05-30 15:38:38', 1, NULL, 4, 'Grupo de teste'),
(187, '2025-05-30 18:17:43', '2025-05-30 18:17:43', 2, 1, NULL, '????'),
(188, '2025-05-30 18:18:06', '2025-05-30 18:18:06', 1, 2, NULL, 'Também.'),
(189, '2025-05-30 18:23:07', '2025-05-30 18:23:07', 2, 6, NULL, 'Oi Pedrito.');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--


--
-- Dumping data for table `migrations`
--

INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_08_084650_create_messages_table', 1),
(5, '2025_05_08_084726_create_groups_table', 1),
(8, '2025_05_08_084850_create_group_user_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--


--
-- Dumping data for table `password_reset_tokens`
--

INSERT IGNORE INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('wilmamoamba@gmail.com', '$2y$12$F1gjGBPHrULgF4otEoqk4eFXh8vFJDNwaXVt6nTxixT.NirzarQW2', '2025-05-22 11:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--


--
-- Dumping data for table `sessions`
--

INSERT IGNORE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('14wO62mYNJ74tg0CFEGIMVbUzSroGbtaHVhMwHS9', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicElMQktQVFp4d0N2ckdBdkZYeDZGbjczZEN6clYzN0lUMWFOams4ZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1748629441),
('1D4CmwXJfIxMAfGUseEXfb030xJXoGE7BQsOJH6P', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaWozbThNR2lrSDBOS05JR0NoWjM1N0pOM0xRZjN1Y2pUclAxVDA4VyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGF0L21lc3NhZ2VzL3VzZXIvNiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1748629412),
('cWvvZ0wCY5KAHbnR5Ovx8fojazZaYhu7V6HOu2wf', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTUM4NTJxOEhhUHo1UHdEUDI5SUVXNmdZYjd4eE1RTE16U1hweTczVSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvY2hhdC9ncnVwby8yL3VzdWFyaW9zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1748623550);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--


--
-- Dumping data for table `users`
--

INSERT IGNORE INTO `users` (`id`, `name`, `email`, `last_seen`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_picture`) VALUES
(1, 'Wilma Moamba', 'wilmamoamba@gmail.com', '2025-05-30 20:18:07', NULL, '$2y$12$GJLvGpmfo3PHgg4kxIfKAOcf4cTuBKp7SJ4286/XTnwlgVyL0MCeq', NULL, '2025-05-09 09:43:10', '2025-05-30 18:18:07', 'profile_pictures/Myn9JxyeGZbAc440D7jns6Tb9ii4lnUW9ZrLkdjs.jpg'),
(2, 'Clara Arlindo', 'claraarlindo@gmail.com', '2025-05-30 20:23:32', NULL, '$2y$12$SpNADrPZrWgj8SCeHFS6P.ioi8isccw0sEUdxEGSYHbhnZmPj8ywK', NULL, '2025-05-09 10:33:09', '2025-05-30 18:23:32', 'profile_pictures/HaKaJlkaNxfgnAQAWu1E2JKjZaEOvMydxW5STZT7.jpg'),
(3, 'Clara Moamba', 'claramoamba@gmail.com', NULL, NULL, '$2y$12$5KE11SM.SDWip/VExxC4/eiJ1XacTNnaiPk8MFaEKMOb77Um..X0u', NULL, '2025-05-10 05:31:44', '2025-05-20 06:36:24', 'profile_pictures/d9FqT7tInhEv87ZFO6c9PWuOsvb9j2mczHIibxBu.jpg'),
(4, 'Celma Moamba', 'celmamoamba@gmail.com', NULL, NULL, '$2y$12$2IeadQ3d8bTbwMNRJVIzq.zvDuZ12wEC8aQ79YXwTDO.6wfFBE2Y.', NULL, '2025-05-19 16:48:57', '2025-05-20 06:28:24', 'profile_pictures/OVVkHgezhSw3Rkzv1QOXaxldtBhpuA3FjBHl5ZXj.jpg'),
(5, 'Catia Antonio', 'catia@gmail.com', NULL, NULL, '$2y$12$EW9X3pmNxYpHwQhLL.6hpuR0olC9.xihfvRJM6Xj/9dAgO8gkKYDa', NULL, '2025-05-19 16:57:53', '2025-05-20 06:25:49', 'profile_pictures/636bclfsnQPKBL3n2IuMuCjZWMibgInG7P4mChIz.jpg'),
(6, 'Lucas Pedro', 'lucas@gmail.com', NULL, NULL, '$2y$12$CVDcWhSbCJrMZ/5TXV0TreeocAnJyp5i/GslPxK.8RAl1Vy/9qWYC', NULL, '2025-05-19 17:12:26', '2025-05-20 06:33:03', 'profile_pictures/yn3I9H8zij0jXhHF3trt5o5yl52n4RqGUSxthM5O.jpg'),
(7, 'Nomo Nome', 'nome@gmail.com', NULL, NULL, '$2y$12$79uc292uQbHTucE0KLu/fubRVi4h5/CL6wBCHR8aF37NI3kKburUq', NULL, '2025-05-22 11:13:38', '2025-05-22 11:14:48', 'profile_pictures/vFDaAFDseEWeHtNu7YabS7VdEMB26fOanGMeLMsb.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--

--
-- Indexes for table `cache_locks`
--

--
-- Indexes for table `failed_jobs`
--

--
-- Indexes for table `groups`
--

--
-- Indexes for table `group_user`
--

--
-- Indexes for table `jobs`
--

--
-- Indexes for table `job_batches`
--

--
-- Indexes for table `messages`
--

--
-- Indexes for table `migrations`
--

--
-- Indexes for table `password_reset_tokens`
--

--
-- Indexes for table `sessions`
--

--
-- Indexes for table `users`
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--

--
-- AUTO_INCREMENT for table `groups`
--

--
-- AUTO_INCREMENT for table `group_user`
--

--
-- AUTO_INCREMENT for table `jobs`
--

--
-- AUTO_INCREMENT for table `messages`
--

--
-- AUTO_INCREMENT for table `migrations`
--

--
-- AUTO_INCREMENT for table `users`
--

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_user`
--

--
-- Constraints for table `messages`
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
