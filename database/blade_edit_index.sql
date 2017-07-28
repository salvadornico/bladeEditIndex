-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2017 at 09:07 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blade_edit_index`
--

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flags`
--

INSERT INTO `flags` (`id`, `video_id`, `user_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Testing testing', 'pending', NULL, '2017-07-27 17:25:13'),
(2, 4, 2, 'Not #realblading', 'dismissed', NULL, '2017-07-27 17:27:13'),
(3, 9, 1, 'Not Brian Aragon', 'pending', '2017-07-27 17:53:49', '2017-07-27 17:53:49'),
(5, 11, 3, 'Vert is lame', 'pending', '2017-07-27 19:43:23', '2017-07-27 19:43:23');

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
(3, '2017_07_24_070957_create_videos_table', 1),
(4, '2017_07_24_072232_create_tags_table', 2),
(5, '2017_07_24_072411_createVideosTagsTable', 2),
(7, '2017_07_27_084030_CreateFlagsTable', 3);

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
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'Valo', NULL, NULL),
(2, 'Soichiro Kanashima', NULL, NULL),
(3, 'FISE', '2017-07-24 23:22:33', '2017-07-24 23:22:33'),
(5, 'Malaysia', '2017-07-24 23:40:38', '2017-07-24 23:40:38'),
(6, 'USD', '2017-07-24 23:40:44', '2017-07-24 23:40:44'),
(7, 'Wheel Love', '2017-07-24 23:41:21', '2017-07-24 23:41:21'),
(8, 'Richie Eisler', '2017-07-24 23:41:46', '2017-07-24 23:41:46'),
(9, 'Canada', '2017-07-24 23:41:53', '2017-07-24 23:41:53'),
(10, 'Danny Beer', '2017-07-24 23:53:11', '2017-07-24 23:53:11'),
(11, 'Japan', '2017-07-24 23:59:18', '2017-07-24 23:59:18'),
(12, 'Ivan Narez', '2017-07-25 00:02:30', '2017-07-25 00:02:30'),
(13, 'MFTBrand', '2017-07-25 00:08:58', '2017-07-25 00:08:58'),
(14, 'Main Dish', '2017-07-25 00:11:02', '2017-07-25 00:11:02'),
(17, 'Chihiro Azuma', '2017-07-26 20:59:56', '2017-07-26 20:59:56'),
(19, 'Alex Broskow', '2017-07-26 22:23:32', '2017-07-26 22:23:32'),
(20, 'NYC', '2017-07-26 22:23:38', '2017-07-26 22:23:38'),
(21, 'Vibralux', '2017-07-26 22:23:43', '2017-07-26 22:23:43'),
(22, 'Takeshi Yasutoko', '2017-07-26 23:24:46', '2017-07-26 23:24:46'),
(23, 'Create Originals', '2017-07-26 23:24:52', '2017-07-26 23:24:52'),
(25, 'X Games', '2017-07-26 23:25:22', '2017-07-26 23:25:22'),
(26, 'vert', '2017-07-26 23:25:28', '2017-07-26 23:25:28'),
(27, 'K2', '2017-07-27 17:17:29', '2017-07-27 17:17:29'),
(29, 'bladies', '2017-07-27 17:38:09', '2017-07-27 17:38:09'),
(30, 'Valo V', '2017-07-27 17:56:42', '2017-07-27 17:56:42'),
(31, 'Brandon Smith', '2017-07-27 17:56:46', '2017-07-27 17:56:46'),
(32, 'brown blades', '2017-07-27 17:57:38', '2017-07-27 17:57:38'),
(33, 'boot promo', '2017-07-27 17:58:15', '2017-07-27 17:58:15'),
(34, 'Adam Johnson', '2017-07-27 18:03:38', '2017-07-27 18:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nico', 'salvador.nico@gmail.com', '$2y$10$ZGuWm6tRdvFC3ONSSDSgRuAzwF2cJPM4OgXFdQROhtpVlFDD68Rye', 'admin', 'CXxp72LyEPgEO2wqNqWiNOdBpcBrPOhR8qOkQ6ob9yWYvxjdMho7BIzVUDkN', '2017-07-23 23:15:22', '2017-07-23 23:15:22'),
(2, 'Admin', 'admin@admin.com', '$2y$10$ddAL277dDW8UQukld7609u.7YyFTDpM4b1r8N/gF0C2NH28/ZfKeu', 'admin', 'VkX61scIS6tryaXfecytAcDe6ygDtpcef4YV6LAijCsWrORAvkq8mtkIg9i2', '2017-07-26 22:56:18', '2017-07-26 22:56:18'),
(3, 'Moderator', 'mod@moderator.com', '$2y$10$ZRE7ujw4rY.Pr2Kgrd4ddOV4Ulz.OsCDWhD1pTB.IP0j25BVqSK/2', 'moderator', '8AacZkJvks2k5YUWXgfclXdMXDByNy1zoKCooOkWtXpVhr1JDrCAAfV8ZtZY', '2017-07-26 22:57:48', '2017-07-26 22:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `platform`, `url`, `uploaded_by`, `created_at`, `updated_at`) VALUES
(1, 'Maindish Part 3 Soichiro Kanashima', 'Maindish Part 3 Soichiro Kanashima Music Infumiaikumiai \"Ichimoudajin\" www.Themgoods.com', 'YouTube', 'GS1Hr86sK5I', 1, NULL, NULL),
(2, 'MFTBRAND 2016.12.05 Soichiro Kanashima『 now thirtieth 』on Sellfy Teaser', 'MFTBRAND 2016.12.05 Soichiro Kanashima『 now thirtieth 』on Sellfy Teaser\nFeaturing\nSoichiro Kanashima (30 Years old)\n『MFTBRAND』\nmftbrand.com/\n『MFTBRAND Channels』\nvimeo.com/mftchannels', 'Vimeo', '193214598', 1, NULL, NULL),
(3, 'Richie Eisler in CANADA - USD Skates', 'Watch inline skating superstar Richie Eisler ride his new pro blades in Vancouver, Canada! The new USD Skate Richie Eisler Carbon Free is now available, worldwide! This is a limited edition skate - get yours while supplies last...\n\nCamera: Danny Beer\nEdit: Richie Eisler\nMusic: Andre 3000\n\nSee what happend after his time in Canada right here: https://www.youtube.com/watch?v=y70rl...\n\nRichie Eisler in CANADA - USD Skates\n\nhttp://www.usd-skate.com\nhttp://www.facebook.com/universalskat...\nhttp://www.instagram.com/reisler\nhttp://www.usdskate.tumblr.com', 'YouTube', 'PJ_fFrdSKlg', 1, NULL, NULL),
(4, '#WheelLoveMakanForce FISE Practice Session', 'The Wheel Love blade team getting warmed up on their FISE 2015 Langkawi competition course', 'Vimeo', '149507446', 1, NULL, NULL),
(6, 'MFTBRAND 2015.4.10 Chihiro Azuma', 'MFTBRAND 2015.4.10 Chihiro Azuma\r\n\r\n\r\nFeaturing\r\n\r\nChihiro Azuma (18 Years old)\r\n\r\n\r\n『MFTBRAND』\r\n mftbrand.com/\r\n\r\n『MFTBRAND Channels』\r\n vimeo.com/mftchannels', 'Vimeo', '123973196', 1, '2017-07-26 20:59:03', '2017-07-26 20:59:03'),
(8, 'Alex Broskow NYC', 'Support the creation of skate videos - \r\nwww.paypal.me/alexanderbroskow\r\n\r\nVibralux Denim is proud to present the first installment of our stand-alone VOD series. Alex Broskow went to New York City and skated it like only he can. Masterful full speed stylish moves were captured as he shredded some iconic NY spots as well as found some unseated territory. Initial split of the proceeds are 60% to the profiled skater, 20% to the filmed and editor, and 20% to the travel budget for the team video (up to $1,500 total) after costs (design, travel, music, etc.) We hope you choose to support your favorite skaters, support the projects we release, and keep videos like this coming out on the regular. The link to purchase is found below or you can click any of the photos. We hope you enjoy watching as much as we enjoyed making this.', 'YouTube', '3mocM4SzXM0', 1, '2017-07-26 22:22:48', '2017-07-26 22:22:48'),
(9, 'Chihiro Azuma 2016 Phone Edit', '説明Chihiro Azuma 2016 Phone Edit', 'YouTube', 'WZSiMyA9Xpg', 1, '2017-07-26 23:11:31', '2017-07-26 23:11:31'),
(10, 'Takeshi Yasutoko run in X GAMES 2003.', 'When I was 17years old.\r\nGood memory.\r\n\r\n2003年のX GAMESでの映像。個人的に気に入ってるランです。\r\n\r\nResult ↓\r\n1st Eito Yasutoko 97.25pt\r\n2nd Takeshi Yasutoko 95.25pt\r\n3rd Nel Martin', 'YouTube', '5M9uCKkbd3w', 1, '2017-07-26 23:18:05', '2017-07-26 23:18:05'),
(11, 'CREATE ORIGINALS™ Takeshi Yasutoko International Team Introduction', 'createoriginals.com ...100% Skater Owned... customshop.createoriginals.com\r\n\r\nTakeshi Yasutoko is the best vert skater in the world. He goes bigger than anyone else on a vert ramp with samurai like quickness and resilience. This world class skater, who hails from Kobe City Japan, has been in the forefront of vert skating for over a decade and he hasn\'t lost a contest since 2006.  Takeshi is simply the best at what he does and we are proud to have him as part of the C.O. family.\r\n\r\nCREATE ORIGINALS™ 2012 International Team: Marc Moreno, Gabriel Hyden, Takeshi Yasutoko\r\n\r\nFilmers: Kentaro Osato, Jun Miyahara\r\nLocations: Kobe-shi, Hyogo, Japan\r\nEditor: Kentaro Osato', 'YouTube', 'A2tnqgWOfbM', 1, '2017-07-26 23:21:45', '2017-07-26 23:21:45'),
(12, 'BS.1 Light Announcement', 'Introducing the BS.1 Light\r\nThe Brandon Smith Pro Model..\r\nAvailable June 2012\r\nshot and chopped by Ivan Narez', 'YouTube', 'izNZj5OFMN0', 3, '2017-07-27 17:56:10', '2017-07-27 19:31:09'),
(13, 'Valo V - Brandon Smith', 'Valo V chronicles three years in the ongoing history of rollerblading, from backyard bowls in Mexico to the architectural wonderland of Barcelona and along thousands of stateside miles to spare. V showcases the pioneering skaters of the Valo Brand who continue to revolutionize our sport, a tradition of Valo since it was founded in 2003. Celebrate a decade of Valo with Jon Julio, Alex Broskow, Erik Bailey, Brandon Smith, Victor Arias, Soichiro Kanashima, Cossimo Tassone, Gav Drumm, Ross Kuhn, Dean Coward, and the rest of the Valo family with V, a film by Ivan Narez.\r\n\r\nMusic: Ben Schwab\r\n\r\npurchase the entire film at\r\nhttps://itunes.apple.com/us/movie/valo-5/id689605408\r\n\r\nwww.valo-brand.com', 'YouTube', 'i2ut-OwxXX4', 3, '2017-07-27 17:56:32', '2017-07-27 17:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `videos_tags`
--

CREATE TABLE `videos_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `video_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos_tags`
--

INSERT INTO `videos_tags` (`id`, `video_id`, `tag_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, NULL, NULL),
(2, 1, 1, 1, NULL, NULL),
(3, 2, 1, 1, NULL, NULL),
(4, 2, 2, 1, NULL, NULL),
(6, 4, 3, 1, NULL, NULL),
(7, 4, 5, 1, NULL, NULL),
(8, 4, 6, 1, NULL, NULL),
(9, 4, 7, 1, NULL, NULL),
(10, 3, 8, 1, NULL, NULL),
(11, 3, 6, 1, NULL, NULL),
(12, 3, 9, 1, NULL, NULL),
(13, 3, 10, 1, NULL, NULL),
(14, 1, 11, 1, NULL, NULL),
(15, 1, 12, 1, NULL, NULL),
(16, 2, 11, 1, NULL, NULL),
(17, 2, 13, 1, NULL, NULL),
(18, 1, 14, 1, NULL, NULL),
(19, 1, 15, 1, NULL, NULL),
(20, 1, 16, 1, NULL, NULL),
(21, 6, 17, 1, NULL, NULL),
(22, 6, 11, 1, NULL, NULL),
(23, 6, 1, 1, NULL, NULL),
(24, 6, 13, 1, NULL, NULL),
(25, 7, 18, 1, NULL, NULL),
(26, 8, 19, 1, NULL, NULL),
(27, 8, 1, 1, NULL, NULL),
(28, 8, 20, 1, NULL, NULL),
(29, 8, 21, 1, NULL, NULL),
(30, 9, 17, 1, NULL, NULL),
(31, 9, 11, 1, NULL, NULL),
(32, 9, 1, 1, NULL, NULL),
(33, 9, 13, 1, NULL, NULL),
(34, 11, 22, 1, NULL, NULL),
(35, 11, 23, 1, NULL, NULL),
(36, 11, 11, 1, NULL, NULL),
(37, 11, 1, 1, NULL, NULL),
(38, 10, 22, 1, NULL, NULL),
(39, 10, 24, 1, NULL, NULL),
(40, 10, 25, 1, NULL, NULL),
(41, 10, 26, 1, NULL, NULL),
(42, 11, 26, 1, NULL, NULL),
(43, 10, 11, 1, NULL, NULL),
(44, 10, 27, 1, NULL, NULL),
(45, 11, 28, 1, NULL, NULL),
(46, 9, 29, 1, NULL, NULL),
(47, 13, 1, 3, NULL, NULL),
(48, 13, 30, 3, NULL, NULL),
(49, 13, 31, 3, NULL, NULL),
(50, 13, 12, 3, NULL, NULL),
(51, 12, 1, 3, NULL, NULL),
(52, 12, 31, 3, NULL, NULL),
(53, 12, 12, 3, NULL, NULL),
(54, 12, 32, 3, NULL, NULL),
(55, 3, 32, 3, NULL, NULL),
(56, 12, 33, 3, NULL, NULL),
(57, 3, 33, 3, NULL, NULL),
(58, 8, 23, 3, NULL, NULL),
(59, 8, 34, 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos_tags`
--
ALTER TABLE `videos_tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `videos_tags`
--
ALTER TABLE `videos_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
