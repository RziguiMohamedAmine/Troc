-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 20 oct. 2023 à 19:32
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trocbd`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `icon`, `created_at`, `updated_at`) VALUES
(2, 'Bricolage', 'peint', 'lni-paint-roller', '2023-09-24 09:58:38', '2023-09-24 10:03:45'),
(3, 'Beauté Bien-être', 'béauté', 'lni-emoji-smile', '2023-09-24 10:02:34', '2023-09-24 10:02:45'),
(4, 'Cours', 'Cours', 'lni-graduation', '2023-09-24 10:04:11', '2023-09-24 10:04:11'),
(5, 'Loisirs', 'Loisirs', 'lni-basketball', '2023-09-24 10:04:32', '2023-09-24 10:04:32'),
(6, 'Maison', 'Maison', 'lni-home', '2023-09-24 10:04:46', '2023-09-24 10:04:46'),
(7, 'Mode', 'Mode', 'lni-tshirt', '2023-09-24 10:05:13', '2023-09-24 10:05:13');

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

CREATE TABLE `conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `last_time_message` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `sender_id`, `receiver_id`, `last_time_message`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-10-16 13:37:14', '2023-09-22 12:12:19', '2023-10-16 13:37:14'),
(4, 1, 5, '2023-10-20 14:47:17', '2023-10-17 06:23:28', '2023-10-20 14:47:17');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `read` tinyint(1) DEFAULT 0,
  `body` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `sender_id`, `receiver_id`, `read`, `body`, `type`, `created_at`, `updated_at`) VALUES
(14, 1, 1, 2, 1, 'Hello', NULL, '2023-09-23 14:40:50', '2023-09-23 14:40:50'),
(93, 1, 2, 1, 1, 'This message has been deleted by admin', NULL, '2023-09-23 14:40:51', '2023-10-17 08:11:37'),
(94, 1, 1, 2, 1, 'How are you ?', NULL, '2023-10-16 13:36:36', '2023-10-17 06:23:42'),
(95, 1, 1, 2, 1, 'https://res.cloudinary.com/dp42cajy0/image/upload/v1697470625/znszlfmjeay0jqp0ofwc.jpg', NULL, '2023-10-16 13:37:07', '2023-10-17 06:23:42'),
(96, 1, 1, 2, 1, 'Scan this to purchase ', NULL, '2023-10-16 13:37:14', '2023-10-17 06:23:42'),
(97, 4, 4, 5, 1, 'Hello, I am interested in your product.', NULL, '2023-10-17 06:23:28', '2023-10-17 06:23:33'),
(98, 4, 1, 5, 1, 'hey', NULL, '2023-10-20 14:47:17', '2023-10-20 15:18:57');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_16_152953_create_sessions_table', 1),
(7, '2023_09_19_094114_create_permission_tables', 1),
(10, '2023_09_23_090545_create_categories_table', 2),
(11, '2023_09_23_090551_create_subcategories_table', 2),
(13, '2023_09_27_090921_create_products_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `lu` tinyint(1) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `created_at`, `message`, `user_id`, `updated_at`, `lu`, `product_id`) VALUES
(3, '2023-10-20 11:02:38', 'Vous avez reçu une offre pour votre produit rgrgreee', 1, '2023-10-20 10:02:38', 1, 8);

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id`, `product_id`, `value`, `description`, `user_id`, `image`, `updated_at`, `created_at`) VALUES
(15, 8, 'ezfezfzefzefzef', 'ffffzefzefzefzef', 1, '1697796985.png', '2023-10-20 09:16:25', '2023-10-20 09:16:25');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@example.com', '$2y$10$VpO8VlIlEwFbLnmXoiIUIucEYlfp4vhgbF/wy3mx7xRCwaZDYMxZG', '2023-09-19 13:20:43'),
('rziguiamino12@gmail.com', '$2y$10$S9jilVTiutFGYgQPfeEBbedNeAt9zC95qHPY1.xTXJfvqHbQiq5RG', '2023-09-21 10:43:19');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `is_offering` tinyint(1) NOT NULL DEFAULT 1,
  `exchange_for` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `user_id`, `type`, `subcategory_id`, `is_offering`, `exchange_for`, `created_at`, `updated_at`) VALUES
(1, 'rhryyh', 'rhrrrrrrrrrrrrrrrrrrr', 88.00, '1695815910.PNG', 4, 'product', 5, 1, NULL, '2023-09-27 10:58:30', '2023-09-29 09:23:29'),
(4, 'uptodate', 'updateeeeeeeeeeeeee', 23.00, '1695981760.png', 2, 'product', 9, 0, NULL, '2023-09-27 11:08:10', '2023-09-29 09:07:38'),
(7, 'rgrgr', 'rrrrrrrrrrrrrrrrrrrrrrr', 44.00, '1695817623.PNG', 2, 'product', 13, 1, NULL, '2023-09-27 11:27:03', '2023-09-27 11:27:03'),
(8, 'rgrgreee', 'rrrrrrrrrrrrrrrrrrrrrrr', NULL, '1695817646.PNG', 2, 'service', 2, 0, 'feef', '2023-09-27 11:27:26', '2023-09-27 11:27:26'),
(10, 'jouets', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id magnam quibusdam hic voluptates \n      voluptate distinctio aut voluptatum maxime quo, nam perferendis sit. Incidunt, \n      illum ea. Modi doloremque voluptatem error itaque?', 42.00, '1695820771.PNG', 1, 'product', 12, 1, NULL, '2023-09-27 20:56:54', '2023-09-27 20:56:54'),
(11, 'Fifa23', 'fifaaaaaaaaaaaa', 124.00, '1696068404.jpg', 1, 'product', 14, 1, NULL, '2023-09-30 09:06:44', '2023-09-30 09:06:44'),
(13, 'dssd', 'zaaaaaafezfe\"f', 96223.00, '1697686606.png', 1, 'service', 5, 1, NULL, '2023-10-19 02:36:46', '2023-10-19 02:36:46'),
(14, 'dssd', 'trhrthrthrthrth', 100.00, '1697818962.png', 1, 'service', 9, 1, NULL, '2023-10-20 15:22:42', '2023-10-20 15:22:42');

-- --------------------------------------------------------

--
-- Structure de la table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `message_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reports`
--

INSERT INTO `reports` (`id`, `created_at`, `updated_at`, `message_id`) VALUES
(1, '2023-10-20 15:19:06', '2023-10-20 15:19:06', 97);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2023-09-19 09:46:12', '2023-09-19 09:46:12'),
(2, 'user', 'web', '2023-09-19 09:46:12', '2023-09-19 09:46:12');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('nbWPdVuL50ZnaZb6tfmOiozRsYZYvWW6AYJXLNl7', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUHJrOHdueWdWa1pQSTVjc01tRnRhOWJaVjNZNkdFT0txbXRHV0dTRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkSFpGQXd2T3ppT3Z3NHhvdGJMRjFBdXdnakNMbkF3R1VWcnNDcG5BOUhoSEY4eDNhbTBBRmkiO30=', 1697818962);

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Coiffure', 3, '2023-09-24 10:05:57', '2023-09-24 10:05:57'),
(2, 'Yoga', 3, '2023-09-24 10:06:28', '2023-09-24 10:06:28'),
(3, 'Massage', 3, '2023-09-24 10:06:40', '2023-09-24 10:06:40'),
(4, 'Electricité', 2, '2023-09-24 10:07:02', '2023-09-24 10:07:02'),
(5, 'Menuiserie', 2, '2023-09-24 10:07:18', '2023-09-24 10:07:18'),
(6, 'Maçonnerie', 2, '2023-09-24 10:07:36', '2023-09-24 10:07:36'),
(7, 'Français', 4, '2023-09-24 10:08:04', '2023-09-24 10:08:04'),
(8, 'Informatique', 4, '2023-09-24 10:08:21', '2023-09-24 10:08:21'),
(9, 'Langues étrangères', 4, '2023-09-24 10:08:31', '2023-09-24 10:08:31'),
(10, 'Maths', 4, '2023-09-24 10:08:44', '2023-09-24 10:08:44'),
(11, 'Instruments de musique', 5, '2023-09-24 10:10:42', '2023-09-24 10:10:42'),
(12, 'Jeux & jouets', 5, '2023-09-24 10:10:56', '2023-09-24 10:10:56'),
(13, 'Livres', 5, '2023-09-24 10:11:05', '2023-09-24 10:11:05'),
(14, 'DVD et CD', 5, '2023-09-24 10:13:12', '2023-09-24 10:13:12'),
(15, 'Accessoires & Bagagerie', 7, '2023-09-24 10:13:50', '2023-09-24 10:13:50'),
(16, 'Bébé & Enfant', 7, '2023-09-24 10:14:02', '2023-09-24 10:14:02'),
(17, 'Chaussures', 7, '2023-09-24 10:14:20', '2023-09-24 10:14:20'),
(18, 'Montres & Bijoux', 7, '2023-09-24 10:14:29', '2023-09-24 10:14:29'),
(19, 'Vêtements', 7, '2023-09-24 10:14:41', '2023-09-24 10:14:41');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', '2023-09-19 09:46:12', '$2y$10$HZFAwvOziOvw4xotbLF1AuwgjCLnAwGUVrsCpnA9HhHF8x3am0AFi', NULL, NULL, NULL, 'v1zqgNRZRCdCndj2KnAmzNZ8KTkeHoKPHG0OdD3WCOLgWPZGfbokViUUEli9', NULL, 'profile-photos/XlnmXX0VgAQRl118nFCz0Xqhtu0OpuKu7p7m0t9W.jpg', '2023-09-19 09:46:12', '2023-09-27 20:57:40'),
(2, 'Mohamed Amine', 'mohamedamine.rzigui@esprit.tn', '2023-09-19 09:52:59', '$2y$10$I643.oiMjgju3G9xAkzmMud1d/w04MxGsDC2Mz8kEllnDaGDCaCka', NULL, NULL, NULL, 'NaPE5BMXaYPdHvas2tIemBvGxoY6ZfMsSEN0Ld4pM890MnYuGyduvPrdmMYB', NULL, 'profile-photos/i8XHaU8wDuot1KJukKkjBuIhfjfKrOwC9You3HGI.jpg', '2023-09-19 09:52:47', '2023-09-27 14:32:48'),
(3, 'rer', 'jobquestnextec@gmail.com', '2023-09-21 07:52:43', '$2y$10$avYYoA3QnugjcDiE2Vyrle36ua.A6mHqRZsTf3r2FzJnRPa9c7FcO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-21 07:51:54', '2023-09-21 07:52:43'),
(4, 'temptest', 'rziguiamino12@gmail.com', '2023-09-06 11:29:22', '$2y$10$9dDGCIsg2sezB3xRkCJtOuuTXtO2BLNdhE9Wse6GGdfFR2Cvhgioa', NULL, NULL, NULL, 'qBsaRT60XOm9OQggP17oS0eeYXowKxFUk6M7XGaRGV0DsDGmsVfJ7n45vYQM', NULL, NULL, '2023-09-21 10:25:25', '2023-09-21 10:25:25'),
(5, 'almabrouk.zied@gmail.com', 'almabrouk.zied@gmail.com', NULL, '$2y$10$DxSDIkqclF888w.0SoWVJeWhbtYnutpPY6//nZ3xGGcIoixNTUtlm', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-01 16:49:47', '2023-10-01 16:49:47');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversations_sender_id_foreign` (`sender_id`),
  ADD KEY `conversations_receiver_id_foreign` (`receiver_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_conversation_id_foreign` (`conversation_id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regergerdf` (`user_id`),
  ADD KEY `fezfgzegv` (`product_id`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regerger` (`product_id`),
  ADD KEY `nyhjtyjt` (`user_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Index pour la table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_message_id_foreign` (`message_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Index pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `conversations_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fezfgzegv` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `regergerdf` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `offres`
--
ALTER TABLE `offres`
  ADD CONSTRAINT `nyhjtyjt` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `regerger` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
