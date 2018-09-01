-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2018 at 10:35 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scarlet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE `app_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `desitnation` varchar(40) NOT NULL,
  `field_of_study` varchar(100) NOT NULL,
  `profession` varchar(200) NOT NULL,
  `comments` text NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='users query will store here';

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `user_name`, `email`, `phone`, `desitnation`, `field_of_study`, `profession`, `comments`, `created_date`) VALUES
(1, 'Chiranjit Jana', 'chiranjit.jana@gmail.com', '7845123648', 'Dubai', 'IT', 'SE', 'We need to travels dubai', '2018-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `cover_image` text NOT NULL,
  `gallery_type` varchar(1) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_type`
--

CREATE TABLE `gallery_type` (
  `type` varchar(2) NOT NULL,
  `description` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_type`
--

INSERT INTO `gallery_type` (`type`, `description`) VALUES
('N', 'NATIONAL'),
('I', 'INTERNATIONAL');

-- --------------------------------------------------------

--
-- Table structure for table `home_offers`
--

CREATE TABLE `home_offers` (
  `offer_id` int(11) NOT NULL,
  `image_path` text NOT NULL,
  `description` varchar(400) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_date` date NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `slider_id` int(11) NOT NULL,
  `image_path` text NOT NULL,
  `description` varchar(400) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('098e43e268a370b6c864d1422a0e85b5428f5ec554476ef6f2186d8e31ad8bbbab394be882331e25', 1, 1, 'MyApp', '[]', 0, '2018-08-28 13:28:02', '2018-08-28 13:28:02', '2019-08-28 18:58:02'),
('0c8dc5e8776d9faeede324a84b11b41fdf76659175f788dce32dd811f712b3f8438d1643f25ba4ea', 1, 1, 'MyApp', '[]', 0, '2018-08-28 13:36:15', '2018-08-28 13:36:15', '2019-08-28 19:06:15'),
('25a60c401e259c7c3f8db9d394a89a8270f63dab8e1a0f409f9c69a9749366799fddf8b68d738c2e', 1, 1, 'MyApp', '[]', 0, '2018-08-29 11:08:55', '2018-08-29 11:08:55', '2019-08-29 16:38:55'),
('2c86daac838c5684b34e1b077824166cf2f83789abf4853b86403f6c67ef8c536cc7e5765a2fc2a6', 1, 1, 'MyApp', '[]', 0, '2018-08-30 13:17:49', '2018-08-30 13:17:49', '2019-08-30 18:47:49'),
('305e22a0eb2c7f4a31f9dc88176dfe44a52b2595a74d3bd2d5b0dd22ab9582f1378d2abb0fd199e0', 1, 1, 'MyApp', '[]', 0, '2018-08-30 13:14:46', '2018-08-30 13:14:46', '2019-08-30 18:44:46'),
('36c8e5648401488a8e871db9b0d97e762d835e08411e71f3fd3bfdfcf6f70a7fff1f285d44348bf8', 1, 1, 'MyApp', '[]', 0, '2018-08-30 13:14:49', '2018-08-30 13:14:49', '2019-08-30 18:44:49'),
('417a17235192387b9a9697afe46dff9d6d5aaffbd26ec487ed5ded814d51b9dbe98f533e96b611c9', 1, 1, 'MyApp', '[]', 0, '2018-08-27 13:03:11', '2018-08-27 13:03:11', '2019-08-27 18:33:11'),
('57b057accf8aabe8c3c6572a2801d3ffe7fc2e173863f45c0ebd21c6c991a9262504d6d4daab5b43', 1, 1, 'MyApp', '[]', 0, '2018-08-28 13:54:04', '2018-08-28 13:54:04', '2019-08-28 19:24:04'),
('5e78f08c1d2868a541d9ee504123c5b6c53932448aae63845f7130755076813bfcbfffcdd0d83370', 1, 1, 'MyApp', '[]', 0, '2018-08-30 13:14:13', '2018-08-30 13:14:13', '2019-08-30 18:44:13'),
('601c224a4150489393bc9fe8d599f7c98cc67235095a7fcb2461281f724cebcf922d2129b3426b66', 1, 1, 'MyApp', '[]', 0, '2018-08-30 13:14:44', '2018-08-30 13:14:44', '2019-08-30 18:44:44'),
('62383d24d6e3f39b26190a673d4f0942d2ca33bc748ecf61fe2da9701aabb59bc4f83069d100dab1', 1, 1, 'MyApp', '[]', 0, '2018-08-28 13:43:40', '2018-08-28 13:43:40', '2019-08-28 19:13:40'),
('6df4b72c77f1330ecc026ea43f6d62d6a0bb8b711c3566ee95bd8654f2e65cab8eb0b82d2321aec9', 1, 1, 'MyApp', '[]', 0, '2018-08-27 13:04:52', '2018-08-27 13:04:52', '2019-08-27 18:34:52'),
('8a9ea400b2e0eb2bf8043c57df8d92406568a0c225f94af697e078d297c08ac8d1a64fbce8e62adf', 1, 1, 'MyApp', '[]', 0, '2018-08-30 13:14:19', '2018-08-30 13:14:19', '2019-08-30 18:44:19'),
('961fe7dcfd0d2737cb00d35daae1fcb4729055d588df2b826646ee7341fbdb63d6661f47912efe90', 1, 1, 'MyApp', '[]', 0, '2018-08-30 13:14:51', '2018-08-30 13:14:51', '2019-08-30 18:44:51'),
('a432d1858a7c700bc9622f25e3d8e11d83b405afca96146e78a26b9a0a976ab86fb172d05c6d66d0', 1, 1, 'MyApp', '[]', 0, '2018-08-28 13:31:17', '2018-08-28 13:31:17', '2019-08-28 19:01:17'),
('a6984f9be3434fb6439608d86324165f99b4ef2fd197467d1068e6ff3be99d78fabeff5368a5cd2d', 1, 1, 'MyApp', '[]', 0, '2018-08-28 13:15:04', '2018-08-28 13:15:04', '2019-08-28 18:45:04'),
('b5b13362af4e7696cc399aa4fd899a2f6c31cacd5f4fbb976f9a9f99551682ed7b775256dcda1101', 1, 1, 'MyApp', '[]', 0, '2018-08-28 14:04:36', '2018-08-28 14:04:36', '2019-08-28 19:34:36'),
('c49be439b752963114eb7315dda702133e47aa4f54c23c6de358ce93a35f1baec8e2678ff10f51f3', 1, 1, 'MyApp', '[]', 0, '2018-08-28 13:25:47', '2018-08-28 13:25:47', '2019-08-28 18:55:47'),
('f32ba8b74461aeee979280bbcfc8c60e7bca4ffc13bb04c8b9d566f278351b176d6c9ebb239b43ad', 1, 1, 'MyApp', '[]', 0, '2018-08-28 13:34:25', '2018-08-28 13:34:25', '2019-08-28 19:04:25'),
('f93b9e4415340cb6fc8de9f2ee6f57d7710d7fbfebf6463eee36aa85a321b73659ce1b07be36bc18', 1, 1, 'MyApp', '[]', 0, '2018-08-28 13:37:28', '2018-08-28 13:37:28', '2019-08-28 19:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'TbV61Um3orCPKw6xD9wUDfe3xbLK293kEvDL3I7A', 'http://localhost', 1, 0, 0, '2018-08-27 12:43:42', '2018-08-27 12:43:42'),
(2, NULL, 'Laravel Password Grant Client', 'xbNFWKCTAt4MDTC7ZjQjOtj1xYlgMAuK4EzVnWaW', 'http://localhost', 0, 1, 0, '2018-08-27 12:43:42', '2018-08-27 12:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-08-27 12:43:42', '2018-08-27 12:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonial_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `avtar` text NOT NULL,
  `rating` int(11) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tourlist`
--

CREATE TABLE `tourlist` (
  `tour_list_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `tour_nationality` varchar(2) NOT NULL COMMENT 'I=INTERNATIONAL ; N=NATIONAL',
  `tour_place_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `cover_image` text NOT NULL,
  `created_date` date NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='will store all tour ';

-- --------------------------------------------------------

--
-- Table structure for table `touroverview`
--

CREATE TABLE `touroverview` (
  `tour_ov_id` int(11) NOT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `cover_image` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='will store tour list page over view text';

-- --------------------------------------------------------

--
-- Table structure for table `tourtopic`
--

CREATE TABLE `tourtopic` (
  `tour_id` int(11) NOT NULL,
  `tour_type` varchar(2) NOT NULL COMMENT 'is family tour or educational tour',
  `topic_name` varchar(200) NOT NULL,
  `cover_image` text NOT NULL,
  `created_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='will store all tour topics';

-- --------------------------------------------------------

--
-- Table structure for table `tour_type`
--

CREATE TABLE `tour_type` (
  `TYPE` varchar(2) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_type`
--

INSERT INTO `tour_type` (`TYPE`, `description`) VALUES
('E', 'EDUCATIONAL'),
('F', 'FAMILY');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'chiranjit jana', 'chiranjit.jana19@gmail.com', '$2y$10$6y9TfHhHUSvgWtpHCo2OiumxKUC8ZLv0VdOdCNW4KWLL28msAI/Pu', NULL, '2018-08-27 13:03:09', '2018-08-27 13:03:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `home_offers`
--
ALTER TABLE `home_offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `tourlist`
--
ALTER TABLE `tourlist`
  ADD PRIMARY KEY (`tour_list_id`);

--
-- Indexes for table `touroverview`
--
ALTER TABLE `touroverview`
  ADD PRIMARY KEY (`tour_ov_id`);

--
-- Indexes for table `tourtopic`
--
ALTER TABLE `tourtopic`
  ADD PRIMARY KEY (`tour_id`);

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
-- AUTO_INCREMENT for table `app_user`
--
ALTER TABLE `app_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `home_offers`
--
ALTER TABLE `home_offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tourlist`
--
ALTER TABLE `tourlist`
  MODIFY `tour_list_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `touroverview`
--
ALTER TABLE `touroverview`
  MODIFY `tour_ov_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tourtopic`
--
ALTER TABLE `tourtopic`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
