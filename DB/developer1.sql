-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31-Mar-2018 às 06:17
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developer1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'C',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Claudinei de Lima', 'claudineiarneckedelima@gmail.com', '$2y$10$O3i3oON7aGVGnzsHVnrdNu9UnPUbc2Xewbqe1rJiz4v7lItikv2bC', 'A', 'KUn9KDitEMwYk4NPK4uiFz99pDkc7jPMz6AcKACMqofIMvHApvE58QwzWhzr', '2018-03-30 20:08:31', '2018-03-30 20:08:31'),
(2, 'sdfgsdfg', 'claudsdfgsdfineiarneckedelima@gmail.com', '$2y$10$M4wW3.x5g0yyWFG2WBz.de/TW8EQBA7a1Vh3NeykhTPNBcIALeFC2', 'C', NULL, '2018-03-30 20:12:50', '2018-03-30 20:12:50'),
(3, 'aaaaa', 'claudsdfasdfadsfdasfgsdfineiarneckedelima@gmail.com', '$2y$10$p/ohaeQUqJhBFFJvMhbb2.NnqIzRJYmTSaW2HOoijL5mSiPVy8qIO', 'A', NULL, '2018-03-30 20:19:41', '2018-03-30 20:19:41'),
(4, 'claudinei de lima claudineiasdfadsf', 'claaaaaudineiarneckedelima@gmail.com', '$2y$10$2svEKi4TzwdwD.mB7HYzf.6ScEg2LP9xi1vgIPTcTnPIMLWDRMnKm', 'A', NULL, '2018-03-30 20:23:24', '2018-03-30 20:23:24'),
(5, 'asasasasAAAAAAAAAAAAACCCC', 'claudsddfgsfdgsfasdfadsfdasfgsdfineiarneckedelima@gmail.com', '$2y$10$VB6u7pElIfApH7OtCLZjY.iJYKCrBh2IpevDxjRstqOut4LaFFCy.', 'A', 'cvqV149b5e1gtDwcEHYYQAAyqrumzYJ2axFhJTDesYZiu4wjUGOFDag67Vrr', '2018-03-31 06:20:42', '2018-03-31 07:17:11');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
