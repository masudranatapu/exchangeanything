-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 03:19 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exchangeanything`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_ads`
--

CREATE TABLE `admin_ads` (
  `id` int(11) NOT NULL,
  `ads_name` varchar(255) DEFAULT NULL,
  `ads_link` varchar(255) DEFAULT NULL,
  `ads_img` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=inactive, 1 = active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_ads`
--

INSERT INTO `admin_ads` (`id`, `ads_name`, `ads_link`, `ads_img`, `status`, `created_at`, `created_by`) VALUES
(7, 'Pirate wallet', 'https://coinmarketcap.com/currencies/pirate-chain/', 'media/adminads/ads-image-635e78646c2e9.jpg', 1, '2022-07-18 11:56:40', NULL),
(8, 'Pirate', 'https://coinmarketcap.com/currencies/pirate-chain/', 'media/adminads/ads-image-635e79053ceeb.jpg', 1, '2022-07-18 11:57:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `town_id` bigint(20) UNSIGNED DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` enum('used','new') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authenticity` enum('original','refurbished') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `negotiable` tinyint(1) NOT NULL DEFAULT 0,
  `price` double(8,2) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number_showing_permission` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','expired','pending','declined') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `total_reports` int(11) NOT NULL DEFAULT 0,
  `total_views` int(11) NOT NULL DEFAULT 0,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `estimate_calling_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drafted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `slug`, `customer_id`, `category_id`, `subcategory_id`, `brand_id`, `city_id`, `town_id`, `area_id`, `model`, `condition`, `authenticity`, `negotiable`, `price`, `description`, `phone`, `phone_2`, `web`, `phone_number_showing_permission`, `thumbnail`, `status`, `featured`, `total_reports`, `total_views`, `is_blocked`, `estimate_calling_time`, `drafted_at`, `created_at`, `updated_at`) VALUES
(24, 'best bucket of fish you ever did see', 'best-bucket-of-fish-you-ever-did-see', 47, 5, 25, 1, 193, 11, NULL, 'TVS', 'new', 'original', 0, 25.00, '<p>fresh fish where\'s the chipsfresh fish where\'s the chipsfresh fish where\'s the chipsfresh fish where\'s the chipsfresh fish where\'s the chipsfresh fish where\'s the chips</p>', '44+447552168658', NULL, NULL, 1, 'uploads/addss\\bpjCDE8XP5gVyGTbDzShZbMetJvL7cTglduMIdct.jpg', 'active', 1, 0, 27, 0, 'Any', NULL, '2022-07-09 23:21:46', '2022-11-14 05:18:28'),
(25, 'pease and carrots carrots and peas', 'pease-and-carrots-carrots-and-peas', 47, 5, 29, 1, 193, 11, NULL, 'ss', 'new', 'original', 0, 8.00, '<p>how many peas weigh the same as a carrot ? how many peas weigh the same as a carrot ? how many peas weigh the same as a carrot ? how many peas weigh the same as a carrot ?</p>', '44+447552168658', NULL, NULL, 1, 'uploads/addss\\vsM5sKqFZPb5CkSB1XUFAsgzK2JTgtQzsIvViAwn.jpg', 'active', 1, 0, 25, 0, 'Morning', NULL, '2022-07-09 23:28:38', '2022-11-05 04:54:59'),
(26, 'football crazy football mad up the arsenal', 'football-crazy-football-mad-up-the-arsenal', 51, 6, 30, 1, 194, 61, NULL, 'New', 'new', 'original', 0, 10.00, '<p>Jesus saves but George Best scores on the rebound!!! Jesus saves but George Best scores on the rebound!!! Jesus saves but George Best scores on the rebound!!!</p>', '447552168658', NULL, NULL, 1, 'uploads/addss\\902UnvXCscTkYrBxREolzCVCcRn9Lpu1jzkvrg6H.jpg', 'active', 0, 0, 12, 0, 'Any', NULL, '2022-07-09 23:34:19', '2022-10-30 06:53:48'),
(27, 'football crazy football mad up the a', 'football-crazy-football-mad-up-the-a', 52, 5, 29, 10, 16, 274, NULL, '33', 'new', 'original', 1, 55.00, '<p>THE BROOKLYN BRIDGE IS FOR SALE THE BROOKLYN BRIDGE IS FOR SALE THE BROOKLYN BRIDGE IS FOR SALE THE BROOKLYN BRIDGE IS FOR SALE THE BROOKLYN BRIDGE IS FOR SALE</p>', '44+447552168658', NULL, NULL, 1, 'uploads/addss\\5FftNK0LyR7H93oZGEQDCdZc5AFPAmSe2gS9wmW4.jpg', 'active', 1, 0, 30, 0, 'Morning', NULL, '2022-07-10 01:10:55', '2022-10-30 06:53:09'),
(28, 'hot pants and leg warmers are cool', 'hot-pants-and-leg-warmers-are-cool', 47, 2, 5, 1, 9, 116, 1, 'New', 'new', 'original', 0, 5.00, '<p>n fafjkvnfdjknv;afdvna;fdokvn;sfdakjlvn;fjkvn;okfjvnafj n;lkfjn ;lkjafdn ;fjvn;ofvnofvivnav o;favnaofvn;f nsd;kvn;sfdlk vnsdfok nfdal;kn fsknv;afsdnvoasfdinv\'asd</p>', '44+447552168658', NULL, NULL, 1, 'uploads/addss\\o67xmn7EP7v1fUUaUFuLW7IjLIcAl2DMHEhaeDD8.jpg', 'active', 0, 0, 16, 0, 'Evening', NULL, '2022-07-10 20:17:46', '2022-11-14 08:17:25'),
(29, 'Hp Elitebook Core i5 8Gb-Ram 256-SSD', 'hp-elitebook-core-i5-8gb-ram-256-ssd', 30, 5, 29, 1, 11, 191, NULL, 'New', 'new', 'original', 0, 250.00, '<p>Description Processor Intel ® Core i5 ★ RAM – 8GB DDR4 PC3L ★ SSD – 256GB M.2 ★ Intel ® HD Graphics share 4 GB. ★ Display ultra 14.1″ Ful HD (1920×1080) ★ Battery standby 100% 4 hours+ ★ Backlit keyboard, full HD display (1920×1080), dual hardix storage, Dual Ram slot.</p>', '0124578457', NULL, NULL, 0, 'uploads/addss\\evJBFRmw9EmsyG2mCfDk4CFczZB9Xn8pK2ptOKUM.jpg', 'active', 0, 0, 16, 0, 'Evening', NULL, '2022-07-17 20:33:01', '2022-11-01 07:52:59'),
(31, 'Hp core-i3 6th gen,4GB Ram 1000GB Hdd', 'hp-core-i3-6th-gen4gb-ram-1000gb-hdd', 57, 4, 19, 1, 193, 11, NULL, 'new', 'new', 'original', 0, 350.00, '<p>আসসালামুআলাইকুম____ 🟥🟧🟨A-R laptop Zone এ আপনাকে স্বাগতম 》》আগেই বলি, আমরা কোনো সারভিসিং করা এবং রিফারবিসড মাল বিক্রি করি না। আমাদের সব ল্যাপটপ বিদেশ থেকে সরাসরি ইমপোট করা ফ্রেশ ল্যাপটপ। ধন্যবাদ। 🟥✔️✔️1 Year Service Warranty --------------------------------------------------- ✅Processor: Core-i3 6th genaretion🔥 ✅Ram: 4 GB Ram ddr4 ✅HDD: 1000 GB HDD ✅Display: 14\" HD Display ✅Graphics: Intel Hd Series 4Gb Graphics. ✅Battery with 2/3 hour ✅Others: Windows 10 installed, HD Webcame For Zoom Class</p>', '01990572321', NULL, NULL, 1, 'uploads/addss\\YAjrYeMdqTdATrwdBT4VmLKenflWkatttRu6MrOC.jpg', 'active', 0, 0, 18, 0, 'Evening', NULL, '2022-07-19 09:31:29', '2022-10-30 07:23:13'),
(32, 'Nail polish of the highest quality', 'nail-polish-of-the-highest-quality', 62, 2, 8, 1, 11, 191, NULL, 'New', 'new', 'original', 0, 19.99, '<p>jjjjjjjjjjjjjjjjjjjjdddddddddddddpppppppppppppppppppprrrrrrrrrrrrrrrrrriiiiiiiiiiiiiiiiiiiiiiiiiddddddddddddddddddddddddddllllllllllllllleeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee</p>', '+447552168658', NULL, 'www.exchangeanything.com', 1, 'uploads/addss\\qCmDnxWkO9r9p0VbXFZB1OWRQhI4RzX8B5ltsx61.jpg', 'active', 1, 0, 12, 0, 'Evening', NULL, '2022-07-20 16:56:01', '2022-11-03 03:02:50'),
(33, 'Plenty of fish to shoot in this barrel!', 'plenty-of-fish-to-shoot-in-this-barrel', 62, 4, NULL, NULL, 193, 2, NULL, NULL, 'new', NULL, 1, 63.25, 'HaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddockHaddock', '+447552168658', NULL, NULL, 1, 'uploads/addss\\Wl4hgF9RxoyLzvRNgpBLjCFbu0nxLuxGCvs35ieH.jpg', 'active', 1, 0, 12, 0, 'Evening', NULL, '2022-07-20 17:11:12', '2022-11-01 07:52:50'),
(34, 'Continental drift is the best beach front', 'continental-drift-is-the-best-beach-front', 56, 3, 18, 1, 130, 3, NULL, 'New', 'new', 'original', 1, 50000.00, '<p>Top speed 290 mphTop speed 290 mphTop speed 290 mphTop speed 290 mphTop speed 290 mphTop speed 290 mphTop speed 290 mphTop speed 290 mphTop speed 290 mphTop speed 290 mphTop speed 290 mphTop speed 290 mphTop speed 290 mphTop speed 290 mphTop speed 290 mphTop speed 290 mph</p>', '0124578457', NULL, NULL, 0, 'uploads/addss\\Wl4hgF9RxoyLzvRNgpBLjCFbu0nxLuxGCvs35ieH.jpg', 'active', 1, 0, 7, 0, 'Evening', NULL, '2022-07-21 16:15:00', '2022-11-14 05:17:51'),
(35, 'Bank Used Core2dou Pc 250gb HDD & 2gb Ram', 'bank-used-core2dou-pc-250gb-hdd-2gb-ram', 63, 4, 19, 1, 21, 111, NULL, 'New', 'new', 'original', 0, 250.00, '<p>Condition: Used Brand: Dell Model: Core2dou Description Dell Bank Used Brand pc with 2gb Ram, 250gb Harddisk, Intel Core2dou Processor. Integrated Speaker.</p>', '0124578457', NULL, NULL, 0, 'uploads/addss\\naMc6pZOXTmrbJAFWyi62ivSyisdoWGI91k2LpJ4.jpg', 'active', 1, 0, 13, 0, 'Evening', NULL, '2022-07-22 20:39:43', '2022-11-14 04:26:16'),
(36, 'Lorem Ipsum is simply dummy text', 'lorem-ipsum-is-simply-dummy-text', 68, 2, 5, 1, 8, 139, NULL, 'New', 'new', 'original', 1, 333.00, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '0124578457', NULL, NULL, 0, 'uploads/addss\\CnQDHfqispp8xuJOAvvBMguhv3lpff3aharu6Xby.jpg', 'active', 1, 0, 8, 0, 'Evening', NULL, '2022-07-24 21:44:15', '2022-11-01 05:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `ad_features`
--

CREATE TABLE `ad_features` (
  `id` bigint(20) NOT NULL,
  `ad_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_features`
--

INSERT INTO `ad_features` (`id`, `ad_id`, `name`, `created_at`, `updated_at`) VALUES
(6, 9, 'gdf', '2022-05-08 10:23:20', '2022-05-08 10:23:20'),
(7, 10, 'Features One', '2022-07-01 21:25:33', '2022-07-01 21:25:33'),
(8, 10, 'Features Two', '2022-07-01 21:25:33', '2022-07-01 21:25:33'),
(9, 14, 'ORGANIC', '2022-07-03 15:55:13', '2022-07-03 15:55:13'),
(11, 15, 'sweet smoke', '2022-07-05 16:12:31', '2022-07-05 16:12:31'),
(15, 16, 'Good Cover', '2022-07-05 20:24:02', '2022-07-05 20:24:02'),
(16, 18, 'Good Cover', '2022-07-05 21:17:12', '2022-07-05 21:17:12'),
(17, 20, 'new', '2022-07-06 08:56:15', '2022-07-06 08:56:15'),
(20, 21, 'demo', '2022-07-06 23:42:36', '2022-07-06 23:42:36'),
(21, 22, 'new', '2022-07-07 14:31:01', '2022-07-07 14:31:01'),
(23, 23, 'Large middle', '2022-07-07 18:36:33', '2022-07-07 18:36:33'),
(29, 30, 'hand crafted', '2022-07-18 16:51:21', '2022-07-18 16:51:21'),
(33, 33, 'scaly', '2022-07-20 17:11:12', '2022-07-20 17:11:12'),
(35, 25, 'pods and skins', '2022-10-30 06:52:50', '2022-10-30 06:52:50'),
(37, 26, 'a puncture', '2022-10-30 06:53:48', '2022-10-30 06:53:48'),
(38, 32, 'fbsa', '2022-10-30 06:55:06', '2022-10-30 06:55:06'),
(39, 27, 'Bricks', '2022-10-30 07:03:21', '2022-10-30 07:03:21'),
(40, 24, 'scales', '2022-10-30 07:16:57', '2022-10-30 07:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `ad_galleries`
--

CREATE TABLE `ad_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_galleries`
--

INSERT INTO `ad_galleries` (`id`, `ad_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/ad_multiple\\XQJ5dw8shNWTVHgW6XvJAnkLfkL05XAXehc7NT57.jpg', '2022-04-06 02:53:20', '2022-04-06 02:53:20'),
(2, 1, 'uploads/ad_multiple\\LlIqIMnkKg4WX2cSXZrYFpd3y8mPWcZFMbVNXO24.jpg', '2022-04-06 02:53:20', '2022-04-06 02:53:20'),
(3, 2, 'uploads/ad_multiple\\8Prlk5anA3F7ugFrWSIUXVkzluKI8OuuMNuwurtb.jpg', '2022-04-06 03:05:37', '2022-04-06 03:05:37'),
(4, 2, 'uploads/ad_multiple\\CwpNnourvwFpLWbEUI3fAKrvAr0EgMkKD1csIyqD.jpg', '2022-04-06 03:05:37', '2022-04-06 03:05:37'),
(5, 2, 'uploads/ad_multiple\\ZDC9EfvTWxndXK5dgaMYt8S1WNXZQAkCCv4WiPI5.jpg', '2022-04-06 03:05:37', '2022-04-06 03:05:37'),
(6, 3, 'uploads/ad_multiple\\8megxqgpW8G26toTi2aR7zjmEeLhp7YJG8LgfuiL.jpg', '2022-04-06 03:09:00', '2022-04-06 03:09:00'),
(7, 3, 'uploads/ad_multiple\\9iz4FkwO9CsHJKWQfzNZ9x3bPWE2iRRnECz87Vj6.jpg', '2022-04-06 03:09:01', '2022-04-06 03:09:01'),
(8, 4, 'uploads/ad_multiple\\B5jB3Xn0ozaTpQzXkYVHOwVwYQDMk7Wr6CgtcY7D.jpg', '2022-04-06 03:12:46', '2022-04-06 03:12:46'),
(12, 5, 'uploads/ad_multiple\\t8NkOTc8XJGUQdQ2A0y0nrchLSjsUqZ5ylyfUYdi.jpg', '2022-04-06 03:26:40', '2022-04-06 03:26:40'),
(13, 5, 'uploads/ad_multiple\\46Tn5D1xmWe4MOh5TQ7lGdZN8wZVjH6522NZRcJz.jpg', '2022-04-06 03:26:40', '2022-04-06 03:26:40'),
(14, 5, 'uploads/ad_multiple\\P9CfvvsXEvqjjlD6igERjDvvMKnbr0JtjOOhRtRE.jpg', '2022-04-06 03:26:40', '2022-04-06 03:26:40'),
(18, 7, 'uploads/adds_multiple\\LetZEez9cBmenDZ6XYmis45zndSvrvygwO1PNcoq.jpg', '2022-04-11 02:31:43', '2022-04-11 02:31:43'),
(19, 7, 'uploads/adds_multiple\\sJUcQQwFvrngngUsPlRUC1DuztlAUNfxYifUjew7.jpg', '2022-04-11 02:31:43', '2022-04-11 02:31:43'),
(20, 7, 'uploads/adds_multiple\\C76g50kfX9rOgtMbRxp6fQDo90AzmKxx81nqRhIz.jpg', '2022-04-11 02:31:44', '2022-04-11 02:31:44'),
(21, 7, 'uploads/adds_multiple\\AkHRoEShuFE78S1ubkBklV1u9ABDgoRuEpszzF0U.jpg', '2022-04-11 02:31:44', '2022-04-11 02:31:44'),
(22, 8, 'uploads/adds_multiple\\CTDWxQtireBWJgDhwQ9upCi1EOwvfglFAwvc7oYN.jpg', '2022-04-11 03:11:23', '2022-04-11 03:11:23'),
(23, 8, 'uploads/adds_multiple\\xEC3jAO17OM6W2VHMcQT9R0VHqLFgcBqN62ukpt8.jpg', '2022-04-11 03:11:23', '2022-04-11 03:11:23'),
(24, 6, 'uploads/adds_multiple\\ppthiN3XCwBlGNgbqz4TEWVTAKoNLWNq4KnXbWpO.jpg', '2022-04-14 06:12:02', '2022-04-14 06:12:02'),
(25, 9, 'uploads/adds_multiple\\hGNb5a6oFUH7kLXwGdL1jpzspTHfAdIouWghr1XF.jpg', '2022-05-08 10:23:20', '2022-05-08 10:23:20'),
(26, 9, 'uploads/adds_multiple\\F87IUvqH92aF6kIMihb0WWWwTnnWxiGJQQq5S1BD.jpg', '2022-05-08 10:23:20', '2022-05-08 10:23:20'),
(27, 6, 'uploads/adds_multiple/AAUZH5qQ9rgCNQUmHQ53ojS2gmGPnzyXAr8tjGZs.jpg', '2022-06-08 09:29:36', '2022-06-08 09:29:36'),
(28, 6, 'uploads/adds_multiple/DuTSeOlNMcooCVS9XwXXQSPlWEyw8ZMrGYtvsECo.jpg', '2022-06-08 09:29:36', '2022-06-08 09:29:36'),
(29, 6, 'uploads/adds_multiple/Naf5T2ddzjhyMtIu65hPT33Ga0MaXbyNlNTiA7bO.jpg', '2022-06-08 09:29:36', '2022-06-08 09:29:36'),
(35, 6, 'uploads/adds_multiple\\FFKKHfuTdNCSItw9jLKr8mWfvFewhUHK0fxZy5t7.jpg', '2022-06-08 10:15:42', '2022-06-08 10:15:42'),
(37, 4, 'uploads/adds_multiple/EaOnxi2xGs1dKx5OrzFv6dYWVo6Fcg6SgbxIg66B.jpg', '2022-06-29 12:51:08', '2022-06-29 12:51:08'),
(38, 3, 'uploads/adds_multiple/nL6e6Yz81lD0ocg8JeLzbehRaEuLjaqy2ORw7sgH.webp', '2022-07-01 09:25:37', '2022-07-01 09:25:37'),
(39, 3, 'uploads/adds_multiple/5otNk1Ao3fDYQljBGeEk8ZO1AvX9O3pcEqeVGeHF.webp', '2022-07-01 09:25:37', '2022-07-01 09:25:37'),
(40, 3, 'uploads/adds_multiple/u04gYq9H4RY4o6nXeotiWTUivfFE98gQWQqs3p1J.webp', '2022-07-01 09:25:37', '2022-07-01 09:25:37'),
(41, 9, 'uploads/adds_multiple/jdmvdtBjvq6c0qTqGMGJQcGKOhIJLYqx7okCDLjK.jpg', '2022-07-01 18:13:27', '2022-07-01 18:13:27'),
(42, 9, 'uploads/adds_multiple/vjh6SK3du01EgwsXYxztZis3lKNOU60Q2Fzn1oqo.jpg', '2022-07-01 18:13:27', '2022-07-01 18:13:27'),
(43, 9, 'uploads/adds_multiple/WFlOkkreOsGzYm1BkkMOQVZbKy4Rptjh1xa0Ezta.jpg', '2022-07-01 20:32:33', '2022-07-01 20:32:33'),
(44, 9, 'uploads/adds_multiple/cowM2Q8MYgUBn5LBLNbX0DMU9RIFXoWeMPs8BSHY.jpg', '2022-07-01 20:32:33', '2022-07-01 20:32:33'),
(45, 11, 'uploads/adds_multiple/kEa1EvJ826FTONJDS3zlnQA3YA04TgbPExuWrkHP.jpg', '2022-07-02 22:47:54', '2022-07-02 22:47:54'),
(46, 12, 'uploads/adds_multiple/vGYTQKz2hHIPY0kyp7w4KRGj6EnseaHj1vYHZDXb.jpg', '2022-07-02 22:49:40', '2022-07-02 22:49:40'),
(47, 13, 'uploads/adds_multiple/g16gM8gKd7JINbgrwDmSoX4HrpbzW8oPAwYaLpUH.jpg', '2022-07-02 23:54:03', '2022-07-02 23:54:03'),
(48, 17, 'uploads/adds_multiple/zacdQJGnW9UynBW8Hc7IrTaRmT74DJBaMWLJc8o6.jpg', '2022-07-05 21:12:28', '2022-07-05 21:12:28'),
(49, 18, 'uploads/adds_multiple/Oo47aEJluyugBitbZ6MYaru0c0VW0SRPKkBcdMLs.jpg', '2022-07-05 21:17:12', '2022-07-05 21:17:12'),
(50, 18, 'uploads/adds_multiple/0RemOUQNQx2v3OSti6BLaYTaIVem77pgEaAZhNIx.jpg', '2022-07-05 21:17:12', '2022-07-05 21:17:12'),
(51, 18, 'uploads/adds_multiple/A2gi7dEpNNeMKLCaKHx0oKWp5DPMtynLwDceQJ1T.jpg', '2022-07-05 21:17:12', '2022-07-05 21:17:12'),
(57, 21, 'uploads/adds_multiple/yKZEMBvnmzcr3v6gCqSJcVLaqKODRh95eXPYuDh6.jpg', '2022-07-06 23:42:36', '2022-07-06 23:42:36'),
(58, 23, 'uploads/adds_multiple/vMRl8HiQl6m9Lhdi8I3c9cTj7CjAwXAe0AhcOuye.jpg', '2022-07-07 18:36:33', '2022-07-07 18:36:33'),
(59, 32, 'uploads/adds_multiple/qTH1d8ua5b4DidN07qD6xOu0JOpixeX3O4JalBia.jpg', '2022-07-20 16:58:52', '2022-07-20 16:58:52'),
(60, 32, 'uploads/adds_multiple/esBlqcnWFsyn2hnnE9H03rZumKKUNEoXjx3Q9VNW.jpg', '2022-07-20 17:01:04', '2022-07-20 17:01:04'),
(61, 35, 'uploads/adds_multiple/3xUNxZmahQAX9ufH1ajg2ZN2jA1ciSKRBSIaZN0d.jpg', '2022-07-22 20:39:43', '2022-07-22 20:39:43'),
(62, 36, 'uploads/adds_multiple/HN8iCUTYf58JI3ktGvp0sQdJ7Xnrnu4vx5SJsyhm.jpg', '2022-07-24 21:44:15', '2022-07-24 21:44:15'),
(63, 36, 'uploads/adds_multiple/vR4jvyxRknwIXwlDqGxou2BoFvcirFn750xioasL.jpg', '2022-07-24 21:44:15', '2022-07-24 21:44:15'),
(64, 31, 'uploads/adds_multiple\\NqKAYq8szzBvwrweIB84eUzX54PWZJ7dLgOual8r.jpg', '2022-10-30 07:03:51', '2022-10-30 07:03:51'),
(65, 31, 'uploads/adds_multiple\\1hi6DSnDjfWJW1NOHWx8yzH8k2vbih6g6wMRu0F9.jpg', '2022-10-30 07:03:51', '2022-10-30 07:03:51'),
(66, 31, 'uploads/adds_multiple\\UG0rygLcxg2Uny79jJl0qBAiOIgFez6BwvracntN.jpg', '2022-10-30 07:03:51', '2022-10-30 07:03:51'),
(67, 31, 'uploads/adds_multiple\\pvc3l8ZBx6sXhKHlsyC8gGnIELWqkNScz9Orio3r.jpg', '2022-10-30 07:03:51', '2022-10-30 07:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `country_id`, `state_id`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 9, 116, 'Best City', '2022-11-14 03:29:08', NULL),
(3, 9, 119, 'New', '2022-11-14 03:40:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `comment_id`, `post_id`, `name`, `email`, `body`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 1, 'user', 'user@gmail.com', ' Dicta. Nam Id Omnis Veniam Placeat Voluptas Vero. Enim Consequatur Voluptate Eaque. Sed Adipisci Corporis Optio', 1, 1, '2022-04-11 03:22:02', '2022-07-10 15:29:57'),
(3, 2, 1, 'Admin', 'admin@gmail.com', 'nice', 0, 1, '2022-07-01 08:43:43', NULL),
(4, 1, 1, 'Admin', 'admin@gmail.com', 'thanks', 0, 1, '2022-07-01 08:45:58', NULL),
(5, 1, 1, 'Admin', 'admin@gmail.com', 'very good', 0, 1, '2022-07-01 08:46:13', NULL),
(7, 6, 1, 'Admin', 'admin@gmail.com', 'Nice', 0, 1, '2022-07-01 08:52:27', NULL),
(9, 8, 1, 'Admin', 'admin@gmail.com', 'Thank you so much. Touch with us', 0, 1, '2022-07-01 15:55:27', NULL),
(13, 2, 1, 'Admin', 'help@exchangeanything.com', 'Well said!', 0, 1, '2022-07-10 14:57:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'ACER', 'acer', '2022-04-06 01:44:41', '2022-04-06 01:44:41'),
(2, 'Apple', 'apple', '2022-04-06 01:44:48', '2022-04-06 01:44:48'),
(3, 'Samsung', 'samsung', '2022-04-06 01:44:52', '2022-04-06 01:45:01'),
(5, 'Sony', 'sony', '2022-04-06 01:45:11', '2022-04-06 01:45:11'),
(6, 'HTC', 'htc', '2022-04-06 01:45:16', '2022-04-06 01:45:16'),
(7, 'LG', 'lg', '2022-04-06 01:45:19', '2022-04-06 01:45:19'),
(8, 'Micromax', 'micromax', '2022-04-06 01:45:23', '2022-04-06 01:45:23'),
(9, 'Nokia', 'nokia', '2022-04-06 01:45:27', '2022-04-06 01:45:27'),
(10, 'OnePlus', 'oneplus', '2022-04-06 01:45:30', '2022-04-06 01:45:30'),
(11, 'OPPO', 'oppo', '2022-04-06 01:45:35', '2022-04-06 01:45:35'),
(12, 'None', 'none', '2022-07-01 22:23:17', '2022-07-01 22:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `slug`, `icon`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mobile Phone', 'uploads/category/ekFMedBgnbtC9fX92kYWaZDsHhHVpMw6VM5FilCs.jpg', 'mobile-phone', 'fas fa-mobile-alt', 3, 1, '2022-04-06 01:12:22', '2022-07-01 09:29:29'),
(2, 'Fashion', 'uploads/category\\72FI55dWySOtlHL3Z9UL04rnlq83Qs1luvuB5TYy.jpg', 'fashion', 'fas fa-tshirt', 5, 1, '2022-04-06 01:15:37', '2022-04-06 01:15:37'),
(3, 'Vehicles', 'uploads/category\\GRIXHpvh6GMBz4Omz20xPMS4cbWc3s0U2nb7jolk.png', 'vehicles', 'fas fa-car', 6, 1, '2022-04-06 01:16:19', '2022-04-06 01:16:19'),
(4, 'Electronics', 'uploads/category\\ILZZaLPlXTEakYyYziHtQZ6MpFbnRviUgpubnPYX.jpg', 'electronics', 'fas fa-tv', 2, 1, '2022-04-06 01:16:56', '2022-07-01 09:28:33'),
(5, 'Essentials', 'uploads/category\\ylK1bqPBibwWMgPEoRR4md0WJ0SdX5pDhoPqT7PD.png', 'essentials', 'fas fa-gift', 7, 1, '2022-04-06 01:17:55', '2022-04-06 01:17:55'),
(6, 'Sports & Kids', 'uploads/category\\slTWGWyX19yYWMiiVcxBEMzGmfeaRwioXZS4X51a.jpg', 'sports-kids', 'fas fa-futbol', 8, 1, '2022-04-06 01:18:32', '2022-04-06 01:18:32'),
(7, 'Education', 'uploads/category\\mwybJ8WrOjSxmRi8d0O3nsF13SBOjr6AhHOgPmdv.jpg', 'education', 'fas fa-book-reader', 9, 1, '2022-04-09 12:01:27', '2022-04-09 12:01:27'),
(8, 'Games', 'uploads/category\\ZCW8PSpJGhZRovq3aIX9kthkN4lsCw1yVB3r2Vpn.jpg', 'games', 'fas fa-football-ball', 10, 1, '2022-04-09 12:01:59', '2022-04-09 12:01:59'),
(9, 'Property', 'uploads/category\\WpzW74uOkPWdEmvbtkfDfH2ikVAwa8WJGwU3Xkd8.jpg', 'property', 'fas fa-home', 10, 1, '2022-04-09 12:02:36', '2022-04-09 12:02:36'),
(10, 'Agriculture', 'uploads/category\\Pt7IFWSlQHJQEXWhJhNrHSmCzEv8ryrUySI0LgbW.jpg', 'agriculture', 'fas fa-tree', 10, 1, '2022-04-09 12:02:57', '2022-04-09 12:02:57'),
(11, 'Jobs', 'uploads/category/HF8DrS17VxBLX1OPKxfBI5LkU1H8uaXlRCeeLkvj.png', 'jobs', 'fas fa-thumbs-up', 4, 1, '2022-04-09 12:03:36', '2022-06-18 18:49:28'),
(12, 'Services', 'uploads/category\\FtEUEIgmf2qilc83uFe5dz9mCqFwG6RjVn1MYwF4.jpg', 'services', 'fab fa-servicestack', 1, 1, '2022-04-09 12:04:25', '2022-07-01 22:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(8, 'Afghanistan', 'uploads/city/oF3wtgr30m1LcOvPsnB3a2vr7rl3FDaoxRXBI8CZ.png', '2022-06-24 14:46:08', '2022-06-29 01:07:41'),
(9, 'Albania', 'uploads/city/QKcjzCN7RuyPNMUTRfRMzMoTgzcTYdluFyW3g7HF.png', '2022-06-24 14:47:17', '2022-06-29 01:17:18'),
(10, 'Algeria', 'uploads/city/7hTK4QnvGcQSyZ6MlyV6geAjewMfiaIDPN6RKS2n.png', '2022-06-24 14:48:04', '2022-06-29 20:12:02'),
(11, 'Andorra', 'uploads/city/RvjEopBdftUVamwp05QrkgD6fW8c39YCtG2oNqBC.png', '2022-06-24 14:48:16', '2022-06-29 20:10:10'),
(12, 'Angola', 'uploads/city/r69v0hUobVQijTXNFNsEWwjPomG539Hrh5Ki0Cbl.png', '2022-06-24 14:48:28', '2022-06-29 20:09:14'),
(13, 'Antigua and Barbuda', 'uploads/city/qnFmG5whOoRGAvjRgNTvGLsvzo8GYBp0RNW1gZjq.png', '2022-06-24 14:48:43', '2022-06-29 20:08:39'),
(14, 'Argentina', 'uploads/city/xzmu1E4inUP4iDXcvaGdEb5jQxpQTk3SDXoS9e88.png', '2022-06-24 14:49:00', '2022-06-29 01:16:45'),
(15, 'Armenia', 'uploads/city/Z9V1wJuqZKPAW3kbueKF2GjVV4svFbexnaUHmBrc.png', '2022-06-24 14:49:12', '2022-06-29 20:07:44'),
(16, 'Australia', 'uploads/city/H2gDRNxNPq36dBlAPzBVGdRKs4OrE5Vr29UpFSfm.png', '2022-06-24 14:49:37', '2022-06-29 20:06:51'),
(17, 'Austria', 'uploads/city/30R8QgYSDJwoPl77IPVqdIa1JMQdmTpr8jZXuDUT.png', '2022-06-24 14:49:49', '2022-07-02 21:43:21'),
(18, 'Azerbaijan', 'uploads/city/dybjb7PXb1Cyhj50IbcC70bJlF5W1QjLAlf4lPeQ.png', '2022-06-24 14:50:03', '2022-07-02 21:42:40'),
(19, 'Bahamas', 'uploads/city/leteJyMIiZiCUO4gEB7uei7rCvpgnYQMANA01DXN.jpg', '2022-06-24 14:50:15', '2022-07-02 21:42:13'),
(20, 'Bahrain', 'uploads/city/jLQKW7l4jAFTOrUGy3TW80JTfYzHiIVUHPWPs2CB.png', '2022-06-24 14:50:28', '2022-07-02 21:41:03'),
(21, 'Bangladesh', 'uploads/city/slXgkmAJm7g3RNUfZUjgXOwtfeWXo6zVDYMqf3H9.png', '2022-06-24 14:50:41', '2022-07-02 21:40:41'),
(22, 'Barbados', 'uploads/city/L1rioSQXCSBquzb8XmJdJ7N4dh8kiB6kGJzNHThH.png', '2022-06-24 14:50:51', '2022-07-02 21:40:17'),
(23, 'Belarus', 'uploads/city/jsOs2jdojS66lxHCzCn7VhzL2jKF0bDr0lrDHa3n.png', '2022-06-24 14:51:00', '2022-07-02 21:39:42'),
(24, 'Belgium', 'uploads/city/9LXg0FE7U18ImnixRJxnrRwjY4sW51xq3CdHO1ZS.png', '2022-06-24 14:51:09', '2022-07-02 21:39:03'),
(25, 'Belize', 'uploads/city/y2Tx3PO1fr28yXHScGAwfYK78HzRw6ydahZZN9Ev.png', '2022-06-24 14:51:24', '2022-07-02 21:38:29'),
(26, 'Benin', 'uploads/city/S9SLGSyIH0iiYmsnWeGuL68gjqucLQcAGY1zCIVO.png', '2022-06-24 14:51:34', '2022-07-02 21:37:49'),
(27, 'Bhutan', 'uploads/city/4QZv8veI1UHlgF5BZSn2GvT1Xf6HRszKz5T6qv3y.png', '2022-06-24 14:51:43', '2022-07-02 21:37:18'),
(28, 'Bolivia', 'uploads/city/r9nccSUYqjbaNwm78qbHri4VzsuHP8Es0dfxnizX.png', '2022-06-24 14:51:55', '2022-07-02 21:36:36'),
(29, 'Bosnia and Herzegovina', 'uploads/city/L7tokINTW2RRkunYMqM3tuh5SasaHuu9qHiMnBaL.png', '2022-06-24 14:52:10', '2022-07-02 21:36:09'),
(30, 'Botswana', 'uploads/city/NvR7ChKcDL2iNNqTmergcP87sfrEGWVc8u6bOvDp.png', '2022-06-24 14:52:20', '2022-07-02 21:35:38'),
(31, 'Brazil', 'uploads/city/V6IL4F58VYA8epeqhbRI2WsJm28brGf8MqB1ix9D.png', '2022-06-24 14:52:30', '2022-07-02 21:35:03'),
(32, 'Brunei', 'uploads/city/eVnJkdZYWpsRL4pKkOrexXaW6riki0MKvIapD6GJ.png', '2022-06-24 14:52:41', '2022-07-02 21:34:44'),
(33, 'Bulgaria', 'uploads/city/295dvFHItV9V0EK3h0HMaGzp0f66V6sQ9KROuBM5.png', '2022-06-24 14:52:50', '2022-07-02 21:34:14'),
(34, 'Burkina Faso', 'uploads/city/72VOpX7dbeazLtRbBA98MEEoI9KOMRZFWnK9RoUe.png', '2022-06-24 14:53:00', '2022-07-02 21:33:35'),
(35, 'Burundi', 'uploads/city/dVC1nNV2XBH0xLNOOTDjaftB9OO96jU76KqhAeE6.png', '2022-06-24 14:53:10', '2022-07-02 21:33:05'),
(36, 'Côte d\'Ivoire', 'uploads/city/eHrtWtlIwYIhUwjcezlCv0x4u6BnPlatu8ljdJqE.png', '2022-06-24 14:53:19', '2022-07-02 21:32:19'),
(37, 'Cabo Verde', 'uploads/city/28PULischLATKwVBdKibNdgt0WbqyR54mJJf6f8u.jpg', '2022-06-24 14:53:28', '2022-07-02 21:31:28'),
(38, 'Cambodia', 'uploads/city/RewE4Ff84hUpfUgvgW3lztUg4xaRXnRRkmKTfOQv.jpg', '2022-06-24 14:53:46', '2022-07-02 21:30:23'),
(39, 'Cameroon', 'uploads/city/XvaWJbNuTQkXh7MY5ybKAXKiOjpHOkky58G3XLaK.png', '2022-06-24 14:53:57', '2022-07-02 21:29:19'),
(40, 'Canada', 'uploads/city/Sc9luCdBOzPXbxfJMoDER6ByRs84aLvSitxpjuZk.png', '2022-06-24 14:54:11', '2022-07-02 21:28:27'),
(41, 'Central African Republic', 'uploads/city/FdvLKR70SMms8q3AKzqd3m5J8sEtsj8pGdSzc6hl.png', '2022-06-24 14:54:22', '2022-07-02 21:28:02'),
(42, 'Chad', 'uploads/city/0yVn4ktdiCVVQ2an1iYA5bMIksnnd5bCvtpgKw8f.jpg', '2022-06-24 14:54:33', '2022-07-02 21:27:21'),
(43, 'Chile', 'uploads/city/GHOaQtRaap5zi7txYhl6UnQls5qE2rmdBISaKuJJ.png', '2022-06-24 14:54:41', '2022-07-02 21:26:22'),
(44, 'China', 'uploads/city/DRu4ni0Er2cXUxc2YqFqdnqymRDXSkGBQTI8nhUw.png', '2022-06-24 14:54:51', '2022-07-02 21:25:51'),
(45, 'Colombia', 'uploads/city/uFjg6SeTVWn3arVYpHwVAYECBq0LjPk8pjzZt9KH.png', '2022-06-24 14:55:09', '2022-07-02 21:25:24'),
(46, 'Comoros', 'uploads/city/tEpUzvefr2uMI36hMfSFwdeym12jdE3M1ApHTxPh.jpg', '2022-06-24 14:55:20', '2022-07-02 21:24:49'),
(47, 'Congo (Congo-Brazzaville)', 'uploads/city/JNQx5KoLKJLLU8MO8cZ3gayyvK1xPSeo7kzN6gtV.png', '2022-06-24 14:55:29', '2022-07-02 21:23:58'),
(48, 'Costa Rica', 'uploads/city/d7Ftd9FC216vW7IYOyHEgkVDobYbnOzBOYi6BxNV.png', '2022-06-24 14:55:40', '2022-07-02 21:23:19'),
(49, 'Croatia', 'uploads/city/2AZvjJnBedhua3FdkIrGaE6az6TZBGc05s9Y3Azt.jpg', '2022-06-24 14:56:01', '2022-07-02 21:22:44'),
(50, 'Cuba', 'uploads/city/hvgI8H06sEitPBiQ9HRey5KcongOqzgECTbCk4ah.png', '2022-06-24 14:56:11', '2022-07-02 21:21:42'),
(51, 'Cyprus', 'uploads/city/UazLwqOD417VraJgeWTi3n8r4gWZvlqSrFPjRxGX.png', '2022-06-24 14:56:23', '2022-07-02 21:21:13'),
(52, 'Czechia (Czech Republic)', 'uploads/city/VKDnP9pxjZVi1M6xFfFo8NtAj0xRN819lyWtefMX.png', '2022-06-24 14:56:34', '2022-07-02 21:20:45'),
(53, 'Democratic Republic of the Congo', 'uploads/city/QaFljVkvRhoWBxXOEHoxlhCedvFGmRZu0AEgYMnc.jpg', '2022-06-24 14:56:47', '2022-07-02 21:19:42'),
(54, 'Denmark', 'uploads/city/rNMv5N9wfrt8xRmHqn8nBBusPubFUQtrBNrXIi1r.png', '2022-06-24 14:56:56', '2022-07-02 21:18:22'),
(55, 'Djibouti', 'uploads/city/NFKPnVV6xUbtwyQjB3bNTMipYNaU3CUSVNOmpugF.png', '2022-06-24 14:57:06', '2022-07-02 21:17:56'),
(56, 'Dominica', 'uploads/city/IHTwWqhmu3OCyC6dUbuMoeCNXizIZxvgo6UuLASj.png', '2022-06-24 14:57:20', '2022-07-02 21:17:17'),
(57, 'Dominican Republic', 'uploads/city/MSRhcFD3IiMYQp2J1VPYn6B2UNyKw5VJceBBu6uk.png', '2022-06-24 14:57:30', '2022-07-02 21:16:38'),
(58, 'Ecuador', 'uploads/city/mKNCiBw1MsJ0Ms71kZa079uCRBaQ993AFbzWiQE7.png', '2022-06-24 14:57:39', '2022-07-02 21:16:00'),
(59, 'Egypt', 'uploads/city/QjISMPDgsPsWO3SPnadwPy4QtfcO0m0JbgIzFtJb.png', '2022-06-24 14:57:47', '2022-07-02 21:15:32'),
(60, 'El Salvador', 'uploads/city/MzEcSSTHKtQjmDfz7HZseecyssCtv1S6lmvhG2eF.jpg', '2022-06-24 14:58:01', '2022-07-02 21:14:59'),
(61, 'Equatorial Guinea', 'uploads/city/ceIAc1OKcqYtIXTEvOmiO2khuRLW8lmouPMA7xZN.jpg', '2022-06-24 14:58:15', '2022-07-02 21:13:51'),
(62, 'Eritrea', 'uploads/city/9UNMiZIi0G8nEmnk3QiwQnCy8LpfiVfekE4UsNap.png', '2022-06-24 14:58:28', '2022-07-02 21:12:35'),
(63, 'Estonia', 'uploads/city/jP5RunXn91XwekTyYDzWG9t28p2HqNWcmIBEiSLb.png', '2022-06-24 14:58:36', '2022-07-02 21:10:12'),
(64, 'Eswatini (fmr. \"Swaziland\")', 'uploads/city/jblwanlOy2uMBjpEnFq7cBnwWv4BRipaPnbgURkJ.png', '2022-06-24 14:58:46', '2022-07-02 21:09:30'),
(65, 'Ethiopia', 'uploads/city/Wj1SYm71BZ0DyYG2fAhsKtk9Qq3p5Gp7Zl3iwY0X.png', '2022-06-24 14:58:54', '2022-07-02 21:07:42'),
(66, 'Fiji', 'uploads/city/ddTp8AFCavWGkJRAtnzR4deXqQEw8PCEU5oAlExP.png', '2022-06-24 14:59:12', '2022-07-02 21:06:36'),
(67, 'Finland', 'uploads/city/KivBK5LQGcu76xZMR5g4VUCWTg246DXo7Ky89XTa.png', '2022-06-24 14:59:24', '2022-07-02 21:06:05'),
(68, 'France', 'uploads/city/8xLpmGsgp9DMHVcs9yZfD0j8D0cGtTeMn0hNLLAM.png', '2022-06-24 14:59:45', '2022-07-02 21:05:34'),
(69, 'Gabon', 'uploads/city/VpXWkzcav9lKT2Ae32B1OS933DAFO96weafKTkCM.png', '2022-06-24 15:00:00', '2022-07-02 21:05:11'),
(70, 'Gambia', 'uploads/city/1SRwhdWGk50sIn3Ohq78KTJmjRppR45Gff2M9eIK.png', '2022-06-24 15:00:10', '2022-07-02 21:04:34'),
(71, 'Georgia', 'uploads/city/AF9pdx8Y66aUDWEC2ruJyGs385Qmd1r5YkUTrJft.png', '2022-06-24 15:00:19', '2022-07-02 21:03:57'),
(72, 'Germany', 'uploads/city/ETkoDgHluKxQXDaekg9vwJtR34jrylA0YJiyQHRE.jpg', '2022-06-24 15:00:30', '2022-07-02 21:03:26'),
(73, 'Ghana', 'uploads/city/NET5uzH1dyQ9ym0MW5TXYC2FJCAbCWYntiTF1Bwh.png', '2022-06-24 15:00:49', '2022-07-02 21:01:37'),
(74, 'Greece', 'uploads/city/xCOlq0L4113L3NFIBUFc1BPpARS7vozhMF6T3Za7.png', '2022-06-24 15:00:59', '2022-07-02 21:01:05'),
(75, 'Grenada', 'uploads/city/6usFz8rBROywCGD9Dz1zsVrSAmTmmS9eBIktuKTZ.png', '2022-06-24 15:01:09', '2022-07-02 21:00:29'),
(76, 'Guatemala', 'uploads/city/ET5z87xjmyuBG4rqFqjX2b299LjMluC4kInBxSZw.png', '2022-06-24 15:01:22', '2022-07-02 20:59:39'),
(77, 'Guinea', 'uploads/city/dMH7BavQudf60PFEAFkfxdFZUPXhYYsf4TdNKCyg.png', '2022-06-24 15:01:32', '2022-07-02 20:59:11'),
(78, 'Guinea-Bissau', 'uploads/city/2MsVMPPmalrzE95xGVfBYnPRBIF3qykvmdXpcGpy.png', '2022-06-24 15:01:49', '2022-07-02 20:58:43'),
(79, 'Guyana', 'uploads/city/SFw4RSFjlvoq6nXhSO99NFSSt56xvZKiyrNOaYM1.png', '2022-06-24 15:01:58', '2022-07-02 20:57:50'),
(80, 'Haiti', 'uploads/city/8YHh5Bf2fY4vvcFNfFQGXRkvaBQQq8aKTwRnl4kx.png', '2022-06-24 15:02:09', '2022-07-02 20:57:19'),
(81, 'Holy See/Vatican', 'uploads/city/WLQm8igJTvh2IOR0BEu8OUIsGXC4xopRZvJu0pxS.png', '2022-06-24 15:02:31', '2022-07-02 20:56:18'),
(82, 'Honduras', 'uploads/city/ZJLTGKXADH5jgrHve9Rc3MS1yOFUFarJ6xxsWuSa.png', '2022-06-24 15:02:40', '2022-07-02 20:55:02'),
(83, 'Hungary', 'uploads/city/2vSHgLY493gWfl0ZX7YRTRzK6VaNkMZz9v4MJ3HW.png', '2022-06-24 15:02:51', '2022-07-02 20:54:06'),
(84, 'Iceland', 'uploads/city/huRtGbLfjCjs1CMVCnn0qcbZTNtnK8YpuG7U365k.png', '2022-06-24 15:03:00', '2022-07-02 20:52:52'),
(85, 'India', 'uploads/city/1gBrF8MH01oijVJS4rCBEEQCvKpbYVFk2BNnMi02.png', '2022-06-24 15:03:09', '2022-07-02 20:52:02'),
(86, 'Indonesia', 'uploads/city/iFMNwY9YPJpuAaJliaC2ViKXcQ4hCziiygK5QUV5.png', '2022-06-24 15:03:19', '2022-07-02 20:51:30'),
(87, 'Iran', 'uploads/city/OzGnuWaZ9pgHkSLk78zTp5nnkP8Xd7wdRc29vx0F.png', '2022-06-24 15:03:32', '2022-07-02 20:51:01'),
(88, 'Iraq', 'uploads/city/cazov80WeDfEBbUY48UFxjgM44Z083zYVc9izkkU.png', '2022-06-24 15:03:42', '2022-07-02 20:50:26'),
(89, 'Ireland', 'uploads/city/3Y0JGLpnF1Yy66wMvAIq6bXtGLNZIckgCO0dJxlu.png', '2022-06-24 15:03:51', '2022-07-02 20:38:52'),
(90, 'Israel', 'uploads/city/b14f63GVOHr5kJbT9IFNBiTlefRqxvenk7VzIvFj.png', '2022-06-24 15:03:59', '2022-07-02 20:38:16'),
(91, 'Italy', 'uploads/city/1OmSgLDmkfELHxLmDEQ4neQLviXKgbnOIGoTRBWP.png', '2022-06-24 15:04:08', '2022-07-02 20:37:53'),
(92, 'Jamaica', 'uploads/city/rbrQ8GFOFl9bNCu9lmwaEjGZGk7D3DxhwPmibWu3.png', '2022-06-24 15:04:20', '2022-07-02 20:37:17'),
(93, 'Japan', 'uploads/city/2HL5T5U0Cmsvshd0IJtJE3uyEvsjqvoQUmBOgfR9.png', '2022-06-24 15:04:32', '2022-07-02 20:36:20'),
(94, 'Jordan', 'uploads/city/UuSzTM4bfHBgnCu4xIMHKWzTHl8yUBEJZ0CXWypJ.png', '2022-06-24 15:04:43', '2022-07-02 20:35:37'),
(95, 'Kazakhstan', 'uploads/city/t319TKRMATmIXghgjRXCfJbTtOpat9JHKvcq5vtO.png', '2022-06-24 15:05:42', '2022-07-02 20:34:12'),
(96, 'Kenya', 'uploads/city/yGPZ8H1VPKKQh5TwIekdnYW3JanpZB6gGmlKcYod.png', '2022-06-24 15:05:52', '2022-07-02 20:33:14'),
(97, 'Kiribati', 'uploads/city/Dt1sT7qca9f63LFDtB0sMeZaKuAXn5g3vTDUprqp.png', '2022-06-24 15:06:10', '2022-07-02 20:32:29'),
(98, 'Kuwait', 'uploads/city/5kDuMmSnQiGsl8n1KS8MYnZzWdcBQ19a5D4IUagj.png', '2022-06-24 15:06:19', '2022-07-02 20:31:38'),
(99, 'Kyrgyzstan', 'uploads/city/vyEloPkvqqU9z2YfQSbpbZTFMKysJqRfD2IYUzx4.png', '2022-06-24 15:06:31', '2022-07-02 20:30:51'),
(100, 'Laos', 'uploads/city/LZdsGJhcymyfReYUfoKGGMvWYCzrNVRN4IwgmTuL.png', '2022-06-24 15:06:45', '2022-07-02 20:29:20'),
(101, 'Latvia', 'uploads/city/LsZUCazK1RD94QyFNOrcaxOIwhAoLegijnIBvxZ4.png', '2022-06-24 15:06:54', '2022-07-02 20:28:05'),
(102, 'Lebanon', 'uploads/city/VK8MMvTdoNRjeiKc6KtUO3PqEbF2nHTzjYUV15mK.png', '2022-06-24 15:07:03', '2022-07-02 20:27:13'),
(103, 'Lesotho', 'uploads/city/4OPSiv9HRE2p6ygAJhTFuw6d7bFmoTeRz58KfYaA.png', '2022-06-24 15:07:13', '2022-07-02 20:26:32'),
(104, 'Liberia', 'uploads/city/uWxz0F0AMrgEh8yrRNWAaMiLRgtQNMisth9KU1Mt.png', '2022-06-24 15:07:30', '2022-07-02 20:25:40'),
(105, 'Libya', 'uploads/city/Vfu1SeafymRS8banWTXPfOpJf4TgTKOeY6Ikeoxf.png', '2022-06-24 15:07:40', '2022-07-02 20:25:15'),
(106, 'Liechtenstein', 'uploads/city/M4W7nC0l5Rbp36OedfEJvQV9V3w1eRSwHt5GFLWg.png', '2022-06-24 15:07:49', '2022-07-02 20:24:39'),
(107, 'Lithuania', 'uploads/city/E9L4N9s1UXflkbtzx2BteUntC2J1j1j0TOMp17cl.png', '2022-06-24 15:07:57', '2022-07-02 20:24:12'),
(108, 'Luxembourg', 'uploads/city/Ul0nflys0jqQ9rLGjK9jP0XsBWdRJhl8r3G7fSCa.png', '2022-06-24 15:08:05', '2022-07-02 20:23:42'),
(109, 'Madagascar', 'uploads/city/gOHMW0p4nubBXGPWbcD0CeFkK01I8snQxW2rHonm.jpg', '2022-06-24 15:08:19', '2022-07-02 20:22:51'),
(110, 'Malawi', 'uploads/city/5JNqTXj7XQdKjwniaTOeuBX189LCZNyFUMkdySjD.png', '2022-06-24 15:08:33', '2022-07-02 20:21:35'),
(111, 'Malaysia', 'uploads/city/3KZ1gnIEbJxN67hzpDq1Km7araEjiPU9G5BRzy2V.png', '2022-06-24 15:08:51', '2022-07-02 20:21:13'),
(112, 'Maldives', 'uploads/city/sMAYmID3Wa336I9CeAmIEEHrvJp8LHhUgcO5MYYm.png', '2022-06-24 15:09:08', '2022-07-02 20:20:32'),
(113, 'Mali', 'uploads/city/sWD2OSOrfKw3u3WQejY6VYxCLSPLDTG7WLcvO2bD.png', '2022-06-24 15:09:17', '2022-07-02 20:19:27'),
(114, 'Malta', 'uploads/city/iEoVjMnmrmHf8OQZo0Gj290dmsILYEZWX5UjiPws.png', '2022-06-24 15:09:30', '2022-07-02 20:19:00'),
(115, 'Marshall Islands', 'uploads/city/a5xUTnuydndmYGBbxTOTivhHEYXMcxBmcjfsMph2.png', '2022-06-24 15:09:40', '2022-07-02 20:18:17'),
(116, 'Mauritania', 'uploads/city/vR7KzUm40RNb0F5hqYHZOLF5BCJ9gDNFm5gxH7e1.png', '2022-06-24 15:09:55', '2022-07-02 20:17:45'),
(117, 'Mauritius', 'uploads/city/rGvjlCGcql0XA0Lo9ghOwsUI2jX3X3a7CNY2ZKkb.png', '2022-06-24 15:10:08', '2022-07-02 20:17:21'),
(118, 'Mexico', 'uploads/city/N6Hy3DzDjUpsqODIn3CT2J9VUiqsVrPaZfbpHYy8.png', '2022-06-24 15:10:21', '2022-07-02 20:16:25'),
(119, 'Micronesia', 'uploads/city/qEQROgojhNdk0cgEudDtz6eSZM1Hp9d8sFvIojZA.jpg', '2022-06-24 15:10:33', '2022-07-02 20:15:33'),
(120, 'Moldova', 'uploads/city/wAfvA6vs8ADqZEs1Z4DRBxsnzLj2NRTnvmVAzpSr.png', '2022-06-24 15:10:45', '2022-07-02 20:14:28'),
(121, 'Monaco', 'uploads/city/jIOnt77MgaUO9j4imYSBOK5FoYYVeU8Rrs85GpOS.png', '2022-06-24 15:10:53', '2022-07-02 20:14:02'),
(122, 'Mongolia', 'uploads/city/oSOWLbgGDYU4ZYHJxpyiCIG0LabI2p2C1ZEMRbCk.png', '2022-06-24 15:11:05', '2022-07-02 20:13:38'),
(123, 'Montenegro', 'uploads/city/mqTmLto5nTCOC9uADDiq3eOCMjtV9JKwcAiG5e7i.png', '2022-06-24 15:11:14', '2022-07-02 20:13:05'),
(124, 'Morocco', 'uploads/city/zGrLzKk1KRlxuG0ImoBgQNWyE1K8MQ46P6Fi9GBm.png', '2022-06-24 15:11:24', '2022-07-02 20:12:41'),
(125, 'Mozambique', 'uploads/city/ubKhI5NVtPxFCDTt1ZAcNyi2JTlE0ErSZUVr70D3.png', '2022-06-24 15:11:34', '2022-07-02 20:12:07'),
(126, 'Myanmar (formerly Burma)', 'uploads/city/8i35ZvpePFKVfIqFdm6vdLwfpfUodrsj2grea0G4.png', '2022-06-24 15:11:46', '2022-07-02 20:11:38'),
(127, 'Namibia', 'uploads/city/usjG30vTlkDgnVePqoUEhs8pbWanp67A8M3YYo5P.png', '2022-06-24 15:11:59', '2022-07-02 20:11:08'),
(128, 'Nauru', 'uploads/city/7U3jeEDxSgIed0xkfDcdQcIHSGEI0SJNADOFKLuy.png', '2022-06-24 15:12:10', '2022-07-02 20:10:31'),
(129, 'Nepal', 'uploads/city/wxvTYyLjiVjE6UsV0Hhwe1YanjPqBLobrbH4mdMl.png', '2022-06-24 15:12:20', '2022-07-02 20:09:58'),
(130, 'Netherlands', 'uploads/city/T62ZaHo0dB3l8b4O1FRbPWMOrd0bp45PO723Wiu3.png', '2022-06-24 15:12:29', '2022-07-02 20:09:23'),
(131, 'New Zealand', 'uploads/city/d1ec2BTI6nBeiNtT7dkh3qXasoHJxItlwHfy6a7X.png', '2022-06-24 15:12:41', '2022-07-02 20:08:56'),
(132, 'Nicaragua', 'uploads/city/4ZVmolcH3nYeHVDFpAGd5TAZlD4fG3kYf9jOxdzi.png', '2022-06-24 15:12:56', '2022-07-02 20:08:23'),
(133, 'Niger', 'uploads/city/d7kbLyxdAmFqvs15n48aQaXEqTKiFioJ1gNRTNUI.png', '2022-06-24 15:13:13', '2022-07-02 19:47:36'),
(134, 'Nigeria', 'uploads/city/IR8BAr0m8R9RZwfFeabd54PnWBGSF3oKf1nRe4xq.png', '2022-06-24 15:13:26', '2022-07-02 19:47:12'),
(135, 'North Korea', 'uploads/city/1XiGDPyH76GZjcJzK9NfL8nEdbrBkirN2tA0IXvE.png', '2022-06-24 15:13:41', '2022-07-02 19:46:34'),
(136, 'North Macedonia', 'uploads/city/3sEhAVdU2K4ZASHfk2iSw2EyZu9KIMOcE4OqbEBe.png', '2022-06-24 15:13:54', '2022-07-02 19:45:11'),
(137, 'Norway', 'uploads/city/NwZ9NLn2a7LPBOfeyFb3OAYYfJ47KaXUAryRZydD.png', '2022-06-24 15:14:07', '2022-07-02 19:43:01'),
(138, 'Oman', 'uploads/city/BO5Bz1Ri0aC62dcfbAwxfsuC25S4U8ryBxxC3jm3.png', '2022-06-24 15:14:16', '2022-07-02 19:42:39'),
(139, 'Pakistan', 'uploads/city/R7pWyTQJFEGGh0zNQpHDfeyrtNRoVqmczghR46VD.png', '2022-06-24 15:14:28', '2022-07-02 19:42:12'),
(140, 'Palau', 'uploads/city/08isJwsArTuJOacIDsC1lUNQjc1qHciRmWjSIXnL.png', '2022-06-24 15:14:41', '2022-07-02 19:41:42'),
(141, 'Palestine', 'uploads/city/7T0zm3EMzne1CKe31SntL8BVSmZjdQJIG8CtTXEA.png', '2022-06-24 15:14:56', '2022-07-02 19:41:05'),
(142, 'Panama', 'uploads/city/cMfOUyxmYEJxexNYlF7Fapi4H5dbJ0dHg59o6ag5.png', '2022-06-24 15:15:05', '2022-07-02 19:40:07'),
(143, 'Papua New Guinea', 'uploads/city/6t99OZFMCVVSLjOGXRcsU9mb29ok1LHjsi55wvAd.png', '2022-06-24 15:15:16', '2022-07-02 19:38:29'),
(144, 'Paraguay', 'uploads/city/4LfLxwi3ohM79frgYw8Rbk0jOzpNdoYLYdDelMVI.png', '2022-06-24 15:15:26', '2022-07-02 19:37:47'),
(145, 'Peru', 'uploads/city/sfn5XhIXwKutGQkBIlRz1sUXnRVljxCHDAEPcXbs.png', '2022-06-24 15:15:35', '2022-07-02 19:36:41'),
(146, 'Philippines', 'uploads/city/22aqhSdbIqLWa4aLmWWcQz2RuBRhHGHbbEMESKIE.png', '2022-06-24 15:15:44', '2022-07-02 19:35:56'),
(147, 'Poland', 'uploads/city/OdH1gJlUofzCaUHtqbe8ldRmAsahyXpyF0SiqBNb.png', '2022-06-24 15:15:54', '2022-07-02 19:35:23'),
(148, 'Portugal', 'uploads/city/H4bQEqcVhyXKWoOejAO61WvFHgi2Us7LCCVXuz7T.png', '2022-06-24 15:16:04', '2022-07-02 19:34:45'),
(149, 'Qatar', 'uploads/city/LYJnRKxlz2Jd9HVSHdWuMH5FdjIRB25GiNSYdRm2.png', '2022-06-24 15:16:15', '2022-07-02 19:34:20'),
(150, 'Romania', 'uploads/city/AN6oTyQU61aPKJpsCuwqbywrc9Zq7raeclNEjhp9.png', '2022-06-24 15:16:24', '2022-07-02 19:33:59'),
(151, 'Russia', 'uploads/city/ZTwde1lWMog2g86vReN2Dh6prJzyh550zVxPVGgi.png', '2022-06-24 15:16:33', '2022-07-02 19:33:41'),
(152, 'Rwanda', 'uploads/city/acKjErkaZtPQwEv1FfJDR7v3vYIGquC5m4ybX20h.png', '2022-06-24 15:16:48', '2022-07-02 19:32:56'),
(153, 'Saint Kitts and Nevis', 'uploads/city/VtfvYx494M7vjoGx9BOoWcHetlZuY3opPAAUAjR0.png', '2022-06-24 15:16:58', '2022-07-02 19:31:54'),
(154, 'Saint Lucia', 'uploads/city/iwxmkDq1dGCFn4vPVsTzjKNpsNACg67qT4pG0Rv4.png', '2022-06-24 15:17:14', '2022-07-02 19:30:45'),
(155, 'Saint Vincent and the Grenadines', 'uploads/city/PyVGCsajwoLWa89mQdo32oyycW8UprYGpxOSymIn.png', '2022-06-24 15:17:25', '2022-07-02 19:29:38'),
(156, 'Samoa', 'uploads/city/GELTq5BYgtgjGpupOrjn0ipRCAmySMFDtI7S6UHg.png', '2022-06-24 15:17:36', '2022-07-02 19:27:44'),
(157, 'San Marino', 'uploads/city/xnfPTBfxSQuQFsLSNEWzeDDQ140RsQl18fRzye61.png', '2022-06-24 15:17:47', '2022-07-02 19:25:40'),
(158, 'Sao Tome and Principe', 'uploads/city/QMIcVst5WBHucZyZTjPV462r9OzXVB9WfpedDq3A.png', '2022-06-24 15:18:00', '2022-07-02 19:25:03'),
(159, 'Saudi Arabia', 'uploads/city/TZLsoAuRv0DYzyRzQAIK8lzDngV6j7phwqArsfRG.png', '2022-06-24 15:18:15', '2022-07-02 19:24:28'),
(160, 'Senegal', 'uploads/city/7LkCwBwmlEdu6F4FiQ6uwSytzd4p6aCh1YSiyzP8.png', '2022-06-24 15:18:26', '2022-07-02 19:23:45'),
(161, 'Serbia', 'uploads/city/z0Rn3V08t64S8KLQmfjn8VJFeAq2kKauUW11eBFV.png', '2022-06-24 15:18:37', '2022-07-02 19:23:02'),
(162, 'Seychelles', 'uploads/city/fRLilXXLyH8WANSQ4Ok3nYvD9u7mjpMlAV7KUq17.png', '2022-06-24 15:18:45', '2022-07-02 19:17:41'),
(163, 'Sierra Leone', 'uploads/city/3uKJd1pxhMkFjgnxiHjNmD9bGzFFAHR86hzTpZ6y.png', '2022-06-24 15:18:58', '2022-06-29 20:06:20'),
(164, 'Singapore', 'uploads/city/C0HtlArbXmItiMwwFM6ATQAjiX9A3ANXVqlQPYSI.png', '2022-06-24 15:19:07', '2022-06-29 20:05:37'),
(165, 'Slovakia', 'uploads/city/ziFlQ5QR6Xfu1hLZCQ23XnvFyxMiGYXG396SKaVm.png', '2022-06-24 15:19:16', '2022-06-29 20:05:03'),
(166, 'Slovenia', 'uploads/city/ShxiLsE3RyYP4PxLdTbebLoqWkhwtk7qIPdwqI6t.png', '2022-06-24 15:19:24', '2022-06-29 20:03:55'),
(167, 'Solomon Islands', 'uploads/city/ZfjqgRe11Y7kW1nf3v6JDTxMm5IJINa1RQUGmHTZ.png', '2022-06-24 15:19:34', '2022-06-29 20:02:36'),
(168, 'Somalia', 'uploads/city/sRci6b2kxZmXYULAKbes2ZDoecYymBEhzonIMSoL.png', '2022-06-24 15:19:43', '2022-06-29 20:01:40'),
(169, 'South Africa', 'uploads/city/9wUMvzSvsJKNBRW9Gv0u8ZcrzB7pH9cktb32vXu6.png', '2022-06-24 15:20:18', '2022-06-29 20:00:58'),
(170, 'South Korea', 'uploads/city/vBttU7RRaPuZnhZ28HQFcos5uQTESmTIpOjQaASj.png', '2022-06-24 15:20:28', '2022-06-29 19:57:22'),
(171, 'South Sudan', 'uploads/city/HACVRmuTUlMovbA2cLDQk8e66GW9SNOY2PVSrcPS.png', '2022-06-24 15:20:40', '2022-06-29 19:55:50'),
(172, 'Spain', 'uploads/city/Q6ry8JIUxNsIUBVcrHYLYHUWrkht8U2W0wfvUVLQ.png', '2022-06-24 15:20:51', '2022-06-29 19:54:59'),
(173, 'Sri Lanka', 'uploads/city/Ja10dzWfHc7VIXXRhkIJK3b8Md5mPUXdWTeQbtp1.png', '2022-06-24 15:21:01', '2022-06-29 19:54:12'),
(174, 'Sudan', 'uploads/city/xHD5hcgDsC2BkipMmfdR9UaxzsyyJoikrGRP4eDg.png', '2022-06-24 15:21:23', '2022-06-29 19:52:11'),
(175, 'Suriname', 'uploads/city/I6TU9R7kH8YQvThy9QTRYZXoe74aSbA0F5VoLx5l.png', '2022-06-24 15:21:32', '2022-06-29 19:51:09'),
(176, 'Sweden', 'uploads/city/U6lXk2HI6CRSKsWt0eQ3TvMUrrEkVw3qqh9pP9PZ.png', '2022-06-24 15:21:40', '2022-06-29 19:50:20'),
(177, 'Switzerland', 'uploads/city/UAbJwscTZjcuS4Dx8VvHjUT1FY5QWAXZKAF3miAw.png', '2022-06-24 15:21:48', '2022-06-29 19:49:37'),
(178, 'Syria', 'uploads/city/lm7s1PjNA3QzKovfIZLoMbboLOh7NBZ46DtC0RJe.png', '2022-06-24 15:21:57', '2022-06-29 19:47:29'),
(179, 'Tajikistan', 'uploads/city/ehgKMQF9Avpg5Ux2MxEDnlR2BdvzDp1bbz21zB0P.png', '2022-06-24 15:22:08', '2022-06-29 19:46:54'),
(180, 'Tanzania', 'uploads/city/6FwCvxRo8DgZASH5aCrXZSpwaG8QxI0B2G0jesDy.png', '2022-06-24 15:22:18', '2022-06-29 19:46:17'),
(181, 'Thailand', 'uploads/city/umvhN0jchrMubVT3uGyxpeGsQ4VKxsDxIk2OIiSV.png', '2022-06-24 15:22:25', '2022-06-29 19:45:40'),
(182, 'Timor-Leste', 'uploads/city/0R6qjrYzBhkcOGIyB2lRMLt72bNwAwQx7Gibs7GT.png', '2022-06-24 15:22:38', '2022-06-29 19:45:12'),
(183, 'Togo', 'uploads/city/Cvv1k0he83g2vGP094nl0teVleAfKBZdCx465TC0.png', '2022-06-24 15:22:47', '2022-06-29 19:44:47'),
(184, 'Tonga', 'uploads/city/reeKVUufOxC9HeXtfRz7uPheDKn5qDmNGvVBR970.png', '2022-06-24 15:22:57', '2022-06-29 19:42:56'),
(185, 'Trinidad and Tobago', 'uploads/city/o3PR63tmsBBeMitfhNAa3dVi1F290guHUGQcXMVC.png', '2022-06-24 15:23:07', '2022-06-29 19:42:17'),
(186, 'Tunisia', 'uploads/city/SIes2F8Fby0Cy4yDaq267lOMArytw7iEYC6uR4u8.png', '2022-06-24 15:23:20', '2022-06-29 19:41:28'),
(187, 'Turkey', 'uploads/city/B3Y7iUc9Hn4VwqWZvVbWxsAFuxzfKlfl8NrkuP8t.png', '2022-06-24 15:23:31', '2022-06-29 19:30:25'),
(188, 'Turkmenistan', 'uploads/city/UrNm2eEWTu8HTG7lrzhw21jiXJInur6R8VbCAPoN.png', '2022-06-24 15:23:40', '2022-06-29 19:25:44'),
(189, 'Tuvalu', 'uploads/city/orQeIuPHwGTggNwskAYGxN6orxm28f45VvTNghmy.png', '2022-06-24 15:23:51', '2022-06-29 19:24:42'),
(190, 'Uganda', 'uploads/city/wZ54bFJhl5PUZQSLmwAOeLSVNaHkzvygH4g7EjGt.png', '2022-06-24 15:24:05', '2022-06-29 19:18:22'),
(191, 'Ukraine', 'uploads/city/0LIHYFYxTNphDqC3cvd4wLhEfWVRBrT0IHP89uQW.png', '2022-06-24 15:24:15', '2022-06-29 19:10:05'),
(192, 'United Arab Emirates', 'uploads/city/ol0KYx2OyOvEHoTTQEyoEET5PWcqjZ5O6e2VehXR.png', '2022-06-24 15:24:28', '2022-06-29 19:17:33'),
(193, 'United Kingdom', 'uploads/city/U1gozM4BbnApLtioy4hwnQzKKyUck24Mi7qJOVZi.png', '2022-06-24 15:24:43', '2022-06-29 19:11:16'),
(194, 'United States of America', 'uploads/city/9See9Z5VHfKzSkDKB7IxziICF5OCyBGuUQgmF5Rm.png', '2022-06-24 15:24:58', '2022-06-29 01:15:31'),
(195, 'Uruguay', 'uploads/city/HrHq78cZQgP7a2WXPr1FfxawhQIgZHodcy5Wyyr9.png', '2022-06-24 15:25:11', '2022-06-29 01:15:06'),
(196, 'Uzbekistan', 'uploads/city/ifxtnW5LVMjCEarRZgjn91aWvz6LfuBzigy9J4Th.png', '2022-06-24 15:25:20', '2022-06-29 01:14:34'),
(197, 'Vanuatu', 'uploads/city/cfuPR2o8mtdGuebzawAT8IslbaT3uu1n7qZHd5mK.png', '2022-06-24 15:25:30', '2022-06-29 01:14:11'),
(198, 'Venezuela', 'uploads/city/CAq3fCWwUm7SwFozcwWlgrmVB28bXsJ3xugT0ENA.png', '2022-06-24 15:25:41', '2022-06-29 01:13:22'),
(199, 'Vietnam', 'uploads/city/WX0dpajVUIyILJ4F9yTVUnMSbakha0Gs6XMNLrte.png', '2022-06-24 15:25:50', '2022-06-29 01:12:08'),
(200, 'Yemen', 'uploads/city/xjks4zYmVxcTla9QHfYkHF76Ie9lRBnywjUhoSCG.png', '2022-06-24 15:25:59', '2022-06-29 01:11:27'),
(201, 'Zambia', 'uploads/city/GnOXNgH6U3tq9vRSEp2CbM90kdVo4bHW2gLuTRc0.png', '2022-06-24 15:26:09', '2022-06-29 01:10:57'),
(202, 'Zimbabwe', 'uploads/city/3B82yXIRJFoyJqerXMUtGYxeEo1aw8Wg0Wd0pffl.png', '2022-06-24 15:26:21', '2022-06-29 01:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `index1_main_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index1_counter_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index1_mobile_app_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index2_search_filter_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index2_get_membership_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index3_search_filter_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index1_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index3_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index3_short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `index1_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_app` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newsletter_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_ads` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_earning` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_video_thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cookie_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cookie_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_membership_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_membership_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pricing_plan_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard_messenger_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard_favorite_ads_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manage_ads_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chat_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_user_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard_overview_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard_post_ads_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard_my_ads_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard_plan_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dashboard_account_setting_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posting_rules_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posting_rules_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `index1_main_banner`, `index1_counter_background`, `index1_mobile_app_banner`, `index2_search_filter_background`, `index2_get_membership_background`, `index3_search_filter_background`, `index1_title`, `index3_title`, `index3_short_title`, `index1_description`, `download_app`, `newsletter_content`, `membership_content`, `create_account`, `post_ads`, `start_earning`, `terms_background`, `terms_body`, `about_heading`, `about_video_thumb`, `about_background`, `about_body`, `privacy_background`, `privacy_body`, `cookie_body`, `cookie_background`, `contact_background`, `get_membership_background`, `get_membership_image`, `pricing_plan_background`, `faq_background`, `ads_background`, `blog_background`, `dashboard_messenger_background`, `dashboard_favorite_ads_background`, `faq_content`, `manage_ads_content`, `chat_content`, `verified_user_content`, `dashboard_overview_background`, `dashboard_post_ads_background`, `dashboard_my_ads_background`, `dashboard_plan_background`, `dashboard_account_setting_background`, `posting_rules_background`, `posting_rules_body`, `created_at`, `updated_at`) VALUES
(1, 'uploads/banners\\COKktanu1DW77InNKh5hyqNUOg2826YGlXrmZP3q.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Exchangeanything is the Largest Classifieds Portal', '<p>Sell/Buy Used anything here</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p><strong>Terms &amp; Condition</strong></p><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>&nbsp;</p><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br>&nbsp;</p><p>&nbsp;</p><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br>&nbsp;</p><p><br>&nbsp;</p>', 'About Us', 'https://youtu.be/s7wmiS2mSXY', 'uploads/banners/TpgdLdHrdRiNKGkq9GwlvAfJnI7QCPhRBZiifVGh.jpg', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br>&nbsp;</p><p>&nbsp;</p><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br>&nbsp;</p><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br>&nbsp;</p>', NULL, '<p><strong>Privacy Policy</strong></p><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>&nbsp;</p><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br>&nbsp;</p><p>&nbsp;</p><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br>&nbsp;</p><p><br>&nbsp;</p>', '<p><strong>Cookie Policy</strong></p><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>&nbsp;</p><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br>&nbsp;</p><p>&nbsp;</p><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br>&nbsp;</p><p><br>&nbsp;</p>', '', NULL, 'uploads/banners/nua8bMvP7I9NAlVqjnDb6p7MRRAg9Sxjf3e3gzem.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'You can solve most problems instantly by using our online help system. \r\n\r\nIf you cannot find the answer here, please use the contact form.', 'To place and manage adverts or contact fellow Pirates, you must become a member of Exchangeanything. Please choose the appropriate package to suit your needs. \r\nBeware of scammers, do your business locally if possible.', 'Send messages to sellers and negotiate your deal. For totally anonymous messaging, use your Pirate wallet memo field.  Do not send ARRR unless you completely trust your counterpart. A Exchangeanything escrow service for safe long distance trading is comin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br>&nbsp;</p><p>&nbsp;</p>', '2022-04-02 06:06:48', '2022-11-01 07:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(6, 'Masud ', 'masud@gmail.com', 'This is personal', 'Hi all. I am new', '2022-07-01 16:46:01', '2022-07-01 16:46:01'),
(7, 'Rony', 'ronymia.tech@gmail.com', 'Hello World', 'Testing Message', '2022-07-01 20:53:06', '2022-07-01 20:53:06'),
(12, 'Rony', 'ronymia.tech@gmail.com', 'Hello', 'I am from contact form', '2022-07-03 00:11:49', '2022-07-03 00:11:49'),
(14, 'Mahfuz', 'mahfujkhan017@gmail.com', 'Test Subject', 'This mesaage is for testing', '2022-07-05 19:31:45', '2022-07-05 19:31:45'),
(15, 'Jon', 'jdpriddle@gmail.com', 'Exercise bike', 'howdy doody', '2022-07-06 16:51:04', '2022-07-06 16:51:04'),
(16, 'Rony', 'ronymia22@gmail.com', 'Hello Exchangeanything', 'This is test mail from exchangeanything contact form ', '2022-07-06 18:47:56', '2022-07-06 18:47:56'),
(17, 'Jonathan Priddle', 'jdpriddle@gmail.com', 'Membership', 'Please can you tell me about business membership', '2022-07-08 13:24:58', '2022-07-08 13:24:58'),
(18, 'Jon', 'jdpriddle@gmail.com', 'Email forwarding', 'Where does this go?', '2022-07-10 14:08:51', '2022-07-10 14:08:51'),
(19, 'Jon', 'jdpriddle@gmail.com', 'try again', 'where do you go now?', '2022-07-10 15:22:39', '2022-07-10 15:22:39'),
(20, 'Jonathan Priddle', 'japers@protonmail.com', 'test', 'test test test', '2022-07-10 15:59:09', '2022-07-10 15:59:09'),
(21, 'hell boy', 'japers@protonmail.com', 'raising hell', 'gonna grip it and rip it', '2022-07-10 16:36:33', '2022-07-10 16:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'left',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `symbol`, `symbol_position`, `created_at`, `updated_at`) VALUES
(1, 'United State Dollar', 'USD', '$', 'left', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(2, 'Euro', 'EUR', '€', 'left', '2022-04-02 06:06:48', '2022-04-02 06:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso2` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) DEFAULT NULL,
  `region_id` int(10) DEFAULT NULL,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backend/image/default.png',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscribe` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_purcase_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `username`, `email`, `iso2`, `country_code`, `phone`, `country_id`, `region_id`, `web`, `email_verified_at`, `password`, `image`, `token`, `last_seen`, `remember_token`, `created_at`, `updated_at`, `provider`, `provider_id`, `code`, `subscribe`, `plan_purcase_image`, `payment_note`) VALUES
(24, 'Julfikar', 'julfikar', 'julfikar@gmail.com', NULL, NULL, '01990572321', NULL, NULL, NULL, NULL, '$2y$10$mr9JLEaSt.btuDikG8LTo.7vAvlmP4HWxKzfsr2Hikpk/bY68nk.e', 'backend/image/default.png', NULL, '2022-06-13 10:28:24', NULL, '2022-06-13 13:09:18', '2022-06-13 14:28:24', NULL, NULL, '22000021', NULL, NULL, 'i have paid'),
(25, 'Rony', 'ronymia22', 'ronymia.tech22@gmail.com', NULL, NULL, '01990572321', NULL, NULL, NULL, NULL, '$2y$10$unbe.DmLZxNm25nPULBPzubTWE9QmWK1E6yumR/NdZ0TavqZhYcLq', 'uploads/customer/pPrNMdOaYrdD6HGtaiQ9FQzyYQBoAqrU6TnsBjRY.jpg', NULL, '2022-11-14 13:13:55', NULL, '2022-06-16 20:54:14', '2022-11-14 07:13:55', NULL, NULL, NULL, '1', NULL, 'Hello'),
(30, 'Rony', 'ronymia', 'ronymia.tech@gmail.com', NULL, NULL, '01990572321', NULL, NULL, 'webdevs4u.com', NULL, '$2y$10$RGKXEzEJdTBSbgLyTcGnMexjx/WFDYUzknY.wuzzu.v87XtSA7QXG', 'backend/image/default.png', NULL, '2022-11-05 10:56:52', NULL, '2022-06-28 13:42:03', '2022-11-05 04:56:52', NULL, NULL, '22000005', '1', NULL, NULL),
(31, 'Rakib', 'rakib', 'ronymia2211@gmail.com', NULL, NULL, '01990572321', NULL, NULL, 'https://webdevs4u.com/', NULL, '$2y$10$rw5mcnqN3t54P/YLXrIDJO1VYHjsJjvXOUoXAVNUSWZQOW7xOlb0W', 'backend/image/default.png', NULL, '2022-10-30 10:17:43', NULL, '2022-06-28 23:03:41', '2022-10-30 04:17:43', NULL, NULL, '22000006', NULL, NULL, NULL),
(34, 'Rony', 'ronymia33', 'asiaphtlbd@gmail.com', NULL, NULL, '88001990572321', NULL, NULL, NULL, NULL, '$2y$10$lIrquVhpMSR/XqMPaACQ2uJbXAAAyp7HZUVU6zDcvhCsD0Av0U0ci', 'backend/image/default.png', NULL, '2022-06-30 06:46:31', NULL, '2022-06-30 10:34:19', '2022-06-30 10:46:31', NULL, NULL, '22000008', NULL, NULL, NULL),
(35, 'Md Omit Hasan', 'omit', 'omithasan4524@gmail.com', NULL, NULL, '8801916962118', NULL, NULL, 'omithasan.com', NULL, '$2y$10$I7BQTSHmN/UYlitrepUVy.TxCf5oL5cjMh0TvG6OrJTLYyEl3KS/y', 'backend/image/default.png', NULL, '2022-07-19 18:11:14', NULL, '2022-06-30 10:36:21', '2022-07-19 22:11:14', NULL, NULL, '22000009', NULL, NULL, NULL),
(36, 'Rony', 'ronymia2', 'ronymia111333@gmail.com', NULL, NULL, '88001990572321', NULL, NULL, NULL, NULL, '$2y$10$unbe.DmLZxNm25nPULBPzubTWE9QmWK1E6yumR/NdZ0TavqZhYcLq', 'backend/image/default.png', NULL, '2022-11-14 13:19:10', NULL, '2022-06-30 10:46:01', '2022-11-14 07:19:10', NULL, NULL, '22000010', NULL, NULL, NULL),
(39, 'd', 'admin@gmail.com', 'rabinmiaddd7578@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$V/Ytc7lcKk5S4giXh5DbguiD3JvJ0pD11TUGl/eih20O3UIaNmT1q', 'uploads/customer/5XskgyOXpxr7OaXIskzGwCuBuZe7cF3K8Q26x8nq.jpg', NULL, NULL, NULL, '2022-07-01 09:42:54', '2022-07-01 09:42:54', NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Masud', 'masud', 'jdpriddle1@gmail.com', NULL, NULL, '101626058189', NULL, NULL, NULL, NULL, '$2y$10$unbe.DmLZxNm25nPULBPzubTWE9QmWK1E6yumR/NdZ0TavqZhYcLq', 'backend/image/default.png', NULL, '2022-11-14 13:50:23', NULL, '2022-07-01 16:51:33', '2022-11-14 07:50:23', NULL, NULL, '22000014', NULL, NULL, NULL),
(42, 'Babu', 'babu', 'webdevsforu@gmail.com', NULL, NULL, '019905722321', NULL, NULL, 'https:://webdevs4u.com', NULL, '$2y$10$2pOF/grGnITNXKnLpIlIheauq.GODQ6Ff1X4ScoYyx4Su1yzZ1ZLa', 'backend/image/default.png', NULL, '2022-07-04 08:30:58', NULL, '2022-07-01 21:02:15', '2022-07-04 12:30:58', NULL, NULL, '22000015', NULL, NULL, NULL),
(44, 'Mahfuzur Rahman', 'mahfuzur_rahman', 'mahfujkhan017@gmail.com', NULL, NULL, '88001728103477', NULL, NULL, NULL, NULL, '$2y$10$fBJ78r1oL0oz/Wmqqr8E5OEN4LJE0sAw/a2YKsYH78suwpOmbXhHy', 'uploads/customer/9yH9OX6ZqPr58GzpGvPwo48axE8buP2cWFWcn4LB.png', NULL, '2022-07-05 17:19:49', NULL, '2022-07-05 14:29:10', '2022-07-05 21:19:49', NULL, NULL, '22000016', '1', NULL, NULL),
(47, 'Jonathan Priddle', 'Japers', 'masud@gmail.com', NULL, NULL, '44+447552168658', NULL, NULL, 'www.exchangeanything.com', NULL, '$2y$10$unbe.DmLZxNm25nPULBPzubTWE9QmWK1E6yumR/NdZ0TavqZhYcLq', 'backend/image/default.png', NULL, '2022-11-14 14:18:21', NULL, '2022-07-05 17:11:52', '2022-11-14 08:18:21', NULL, NULL, '22000013', NULL, NULL, NULL),
(48, 'rabinDep', 'rabinDep', 'rabinDep@gmail.com', NULL, NULL, '101984594919', NULL, NULL, NULL, NULL, '$2y$10$6MGlqps7Bek3oYnqc1OD9uqoaozMcqB2BgHr8NtTJYEGGnzJKZ.mq', 'backend/image/default.png', NULL, '2022-07-06 05:00:46', NULL, '2022-07-06 06:40:46', '2022-07-06 09:00:46', NULL, NULL, '22000014', NULL, NULL, NULL),
(49, 'Tim Goodey', 'tinyboytim', 'tgoodey@gmail.com', NULL, NULL, '4407777654136', NULL, NULL, NULL, NULL, '$2y$10$4SwwPcpF29NubYfo9k9gWO8rZuSB1EUHMei/uERs/Z7sRvY/SOLIi', 'backend/image/default.png', NULL, '2022-07-07 19:22:27', NULL, '2022-07-06 18:02:18', '2022-07-07 23:22:27', NULL, NULL, '22000015', NULL, NULL, NULL),
(50, 'rajon', 'rajon', 'rajon@gmail.com', NULL, NULL, 'rajon@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$/S51hfd5vImHlfutXwItvuevYxNULSkIaFMdrFiEJ9fkTLUoyhzwO', 'backend/image/default.png', NULL, '2022-07-07 10:55:24', NULL, '2022-07-07 14:21:16', '2022-07-07 14:55:24', NULL, NULL, '22000016', NULL, NULL, NULL),
(51, 'joe blogs', 'jonquajon', 'jonquajon@tutanota.com', NULL, NULL, '447552168658', NULL, NULL, 'www.exchangeanything.com', NULL, '$2y$10$9vWL7eAGUAqo.7ZsEK7xvu1uYMz7YMtECqKHUk6FUDsBI9TkqrE3K', 'backend/image/default.png', NULL, '2022-07-23 10:56:51', NULL, '2022-07-07 19:17:28', '2022-07-23 14:56:51', NULL, NULL, '22000017', NULL, NULL, NULL),
(52, 'Jonathan Priddle', 'tuto', 'japers@protonmail.com', NULL, NULL, '44+447552168658', NULL, NULL, NULL, NULL, '$2y$10$UT7smaHsbSgruo.dXLUBfeOLrEu3h6SqRA9LxtYlMOBDEg4xEVt4W', 'backend/image/default.png', NULL, '2022-07-24 09:22:49', NULL, '2022-07-09 23:38:32', '2022-07-24 13:22:49', NULL, NULL, '22000017', NULL, NULL, NULL),
(54, 'JP', 'EXCHANGEANYTHINGER', 'exchangeanything@protonmail.com', NULL, NULL, '4407552168658', NULL, NULL, 'www.exchangeanything.com', NULL, '$2y$10$XqCE9EXi7VYRPPPdc/XOSumc6H/VBo2n1rtJWycf7lHm34DnINgS6', 'backend/image/default.png', NULL, '2022-07-24 12:23:53', NULL, '2022-07-11 01:56:59', '2022-07-24 16:23:53', NULL, NULL, '22000019', NULL, NULL, NULL),
(55, 'Phil McKraken', 'Bendoon', 'philocifer@gmail.com', NULL, NULL, '4407552168658', NULL, NULL, NULL, NULL, '$2y$10$BEzezHGWr9GCQT2yvJwwXutgU6Y0SDGXTmIj2o6XngUlGKX1uclYu', 'backend/image/default.png', NULL, '2022-07-21 12:18:05', NULL, '2022-07-16 00:09:29', '2022-07-21 16:18:05', NULL, NULL, '22000020', NULL, NULL, NULL),
(56, 'Jon P', 'QuarterMaster', 'jonathanpriddle@gmail.com', NULL, NULL, '4407552168658', NULL, NULL, 'WWW.SAFEGUARRRD.COM', NULL, '$2y$10$VYLdw4HbjJTOnZRezO6TBu4KX7jWezV8rsPaj3Tf9FUMdMSqzRwhS', 'backend/image/default.png', NULL, '2022-07-24 12:23:12', NULL, '2022-07-16 19:09:58', '2022-07-24 16:23:12', NULL, NULL, '22000020', NULL, NULL, NULL),
(57, 'yeasin', 'yeasin', 'yeasin@gmail.com', 'bd', '880', '01990572321', NULL, NULL, 'https://webdevs4u.com/', NULL, '$2y$10$0TJ.jUPqtR.D2OtIuMKzx.ZwIPD9CCu3UxKkeff57YWyso3MylfKy', 'backend/image/default.png', NULL, '2022-11-05 10:59:00', NULL, '2022-07-19 09:29:41', '2022-11-05 04:59:00', NULL, NULL, '22000021', NULL, NULL, NULL),
(58, 'Sufi', 'sufi', 'sufi@gmail.com', 'bd', '880', '01990572321', NULL, NULL, 'https://webdevs4u.com/', NULL, '$2y$10$Zk1.lRiJNArPVquk9/Ca0OG9glsLm8K1oLD6UysHm553LIjDBVMO.', 'backend/image/default.png', NULL, '2022-11-05 10:58:36', NULL, '2022-07-19 09:35:19', '2022-11-05 04:58:36', NULL, NULL, '22000022', NULL, NULL, NULL),
(59, 'rabin mia', 'rabin', 'rabinmia@gmail.com', NULL, NULL, '01984594919', NULL, NULL, NULL, NULL, '$2y$10$xEF6xkiFKRdvOkX7Zgmx0Odx6xuDkivGbASvCkFQAkX0mNgi/.AWK', 'backend/image/default.png', NULL, '2022-07-19 16:45:48', NULL, '2022-07-19 20:43:47', '2022-07-19 20:45:48', NULL, NULL, '22000023', NULL, NULL, NULL),
(62, 'Jonathan Priddle', 'even more testing', 'jonphilosopher@gmail.com', 'gb', '44', '+447552168658', NULL, NULL, NULL, NULL, '$2y$10$ZGe7dU4aBrXKA6ig6tyQpeZURXbo1GCW9NvmXF/jAzR7ObkpNai.i', 'backend/image/default.png', NULL, '2022-07-25 11:13:41', NULL, '2022-07-20 16:22:10', '2022-07-25 15:13:41', NULL, NULL, '22000024', NULL, NULL, NULL),
(63, 'Rajib Khan', 'rajib', 'rajib@gmail.com', 'bd', '880', '01990572321', 21, 111, 'https://webdevs4u.com/', NULL, '$2y$10$i1D5Dlu0jTAqI6gJoXUt3OmEdgeC/alAjyaDLmFVltcyPQ5Pgu4Uq', 'backend/image/default.png', NULL, '2022-11-05 10:54:42', NULL, '2022-07-22 20:36:59', '2022-11-05 04:54:42', NULL, NULL, '2200063', NULL, NULL, NULL),
(67, 'user4', 'user4', 'user4@gmail.com', 'us', '1', '01990572321', 23, 411, NULL, NULL, '$2y$10$TqRYZ0CgS1To/yhrG5MmvOozxPiOKAPMDtgN/K1r2hGJd1xw5I.Ni', 'backend/image/default.png', NULL, '2022-07-24 09:16:38', NULL, '2022-07-24 13:09:49', '2022-07-24 13:16:38', NULL, NULL, '2200064', NULL, NULL, NULL),
(68, 'user5', 'rabinuser5', 'user5@gmail.com', 'us', '1', '01984594919', 8, 139, NULL, NULL, '$2y$10$k1.BM4GO1Ee2GTx003d6l.QRBCRRlo2wrqPev8Lar3Hfh0vP348im', 'backend/image/default.png', NULL, '2022-07-24 17:55:19', NULL, '2022-07-24 21:21:01', '2022-07-24 21:55:19', NULL, NULL, '2200068', NULL, NULL, NULL),
(69, 'Lamya', 'lami', 'lami@gmial.com', 'bd', '880', '01665875412', 21, 111, NULL, NULL, '$2y$10$4DR.OpYLxRxeJ59KGr3siuFBAiaZxZiBGef.GDaVIVERS5PJl9IgC', 'backend/image/default.png', NULL, '2022-11-05 11:05:35', NULL, '2022-11-05 05:01:45', '2022-11-05 05:05:35', NULL, NULL, '2200069', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`, `created_at`, `updated_at`) VALUES
(4, 'jonquajon@tutanota.com', '2022-06-29 11:25:31', '2022-06-29 11:25:31'),
(5, 'exchangeanything@protonmail.com', '2022-06-29 12:59:39', '2022-06-29 12:59:39'),
(6, 'rabinmia7578@gmail.com', '2022-07-01 08:40:52', '2022-07-01 08:40:52'),
(7, 'ronymia.tech@gmail.com', '2022-07-01 20:50:30', '2022-07-01 20:50:30'),
(8, 'japers@protonmail.com', '2022-07-02 00:39:02', '2022-07-02 00:39:02'),
(9, 'mahfujkhan017@gmail.com', '2022-07-05 19:32:12', '2022-07-05 19:32:12'),
(10, 'Khan@gmail.com', '2022-11-03 03:02:20', '2022-11-03 03:02:20'),
(11, 'lami@gmial.com', '2022-11-05 05:01:45', '2022-11-05 05:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) NOT NULL,
  `faq_category_id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_category_id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 'What is Lorem Ipsum?', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br>&nbsp;</p>', '2022-04-06 01:26:44', '2022-04-06 01:26:44'),
(3, 2, 'What is Lorem Ipsum?', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><br>&nbsp;</p>', '2022-04-06 01:29:58', '2022-04-06 01:29:58'),
(4, 2, 'Why do we use it?', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2022-04-06 01:30:07', '2022-04-06 01:30:07'),
(5, 3, 'Where does it come from?', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p><br>&nbsp;</p>', '2022-04-06 01:30:15', '2022-04-06 01:30:15'),
(6, 3, 'Where can I get some?', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p><br>&nbsp;</p>', '2022-04-06 01:30:26', '2022-04-06 01:30:26'),
(7, 5, 'What is Lorem Ipsum?', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p><br>&nbsp;</p>', '2022-04-06 01:30:50', '2022-04-06 01:30:50'),
(8, 5, 'Why do we use it?', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.</p>', '2022-04-06 01:31:05', '2022-04-06 01:31:05'),
(9, 6, 'test', '<p>setes</p>', '2022-06-27 00:01:58', '2022-06-27 00:01:58'),
(10, 6, 'estest', '<p>sfds</p>', '2022-06-27 00:02:24', '2022-06-27 00:02:24'),
(11, 5, 'tes', '<p>sfdsf</p>', '2022-06-28 13:17:03', '2022-06-28 13:17:03'),
(15, 9, 'Question One', '<p>hello</p>', '2022-07-01 22:39:42', '2022-07-01 22:39:42'),
(16, 14, 'How to post an ads', '<p>You need to create an account Firstly.</p>', '2022-11-01 07:48:44', '2022-11-01 07:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `name`, `slug`, `icon`, `order`, `created_at`, `updated_at`) VALUES
(12, 'Searching', 'searching', 'far fa-question-circle', 5, '2022-06-28 21:30:22', '2022-06-28 21:30:22'),
(13, 'Email Subscriptions', 'email-subscriptions', 'far fa-question-circle', 6, '2022-06-28 21:30:46', '2022-07-01 09:55:27'),
(14, 'Problems', 'problems', 'far fa-question-circle', 7, '2022-06-28 21:31:08', '2022-06-28 21:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ltr',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `icon`, `direction`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'flag-icon-gb', 'ltr', '2022-04-02 06:06:48', '2022-04-02 06:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `messengers`
--

CREATE TABLE `messengers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_id` bigint(20) UNSIGNED NOT NULL,
  `to_id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_id` int(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messengers`
--

INSERT INTO `messengers` (`id`, `from_id`, `to_id`, `body`, `ad_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 58, 47, '.', 28, 1, '2022-07-19 21:39:25', '2022-07-20 17:34:06'),
(3, 58, 47, 'hi japers', 28, 1, '2022-07-19 21:40:07', '2022-07-20 17:34:06'),
(4, 35, 30, '.', 29, 1, '2022-07-19 22:09:52', '2022-07-19 22:59:17'),
(5, 35, 30, 'hello', 29, 1, '2022-07-19 22:10:12', '2022-07-19 22:59:17'),
(6, 30, 35, 'hello omit', 29, 1, '2022-07-19 22:10:12', '2022-07-19 22:11:14'),
(7, 58, 30, '.', 29, 1, '2022-07-19 22:40:51', '2022-11-01 07:54:24'),
(8, 58, 30, 'hello rony, i am sufi', 29, 1, '2022-07-19 22:41:01', '2022-11-01 07:54:24'),
(9, 30, 58, 'yes, sufi, i am rony', 29, 1, '2022-07-19 22:41:21', '2022-07-19 23:54:12'),
(10, 58, 30, 'hi, thanks, ronymia', 29, 1, '2022-07-19 22:42:20', '2022-11-01 07:54:24'),
(11, 30, 58, 'you are welcome, rony', 29, 1, '2022-07-19 22:42:41', '2022-07-19 23:54:12'),
(12, 30, 58, 'hello sufi, thanks', 29, 1, '2022-07-19 22:43:40', '2022-07-19 23:54:12'),
(13, 30, 58, 'hello sufi,nice to meet you', 29, 1, '2022-07-19 22:53:12', '2022-07-19 23:54:12'),
(14, 58, 30, 'oh no what happend', 29, 1, '2022-07-19 22:53:58', '2022-11-01 07:54:24'),
(15, 58, 30, 'hello bro', 29, 1, '2022-07-19 22:54:22', '2022-11-01 07:54:24'),
(16, 30, 58, 'hey what\'s up', 29, 1, '2022-07-19 22:54:54', '2022-07-19 23:54:12'),
(17, 58, 30, 'hello rony what up', 29, 1, '2022-07-19 22:57:07', '2022-11-01 07:54:24'),
(18, 30, 58, 'i am fine.what\'s about you', 29, 1, '2022-07-19 22:57:47', '2022-07-19 23:54:12'),
(19, 58, 30, 'hlw, i am sufi', 29, 1, '2022-07-19 22:58:49', '2022-11-01 07:54:24'),
(20, 30, 58, 'hlw', 29, 1, '2022-07-19 22:59:17', '2022-07-19 23:54:12'),
(21, 58, 30, 'hi', 29, 1, '2022-07-19 22:59:52', '2022-11-01 07:54:24'),
(22, 62, 47, '.', 28, 1, '2022-07-20 17:19:43', '2022-07-24 16:42:33'),
(23, 62, 47, 'Hi Japers', 28, 1, '2022-07-20 17:22:20', '2022-07-24 16:42:33'),
(24, 47, 62, 'Hi can I help you?', 28, 1, '2022-07-20 17:32:53', '2022-07-20 18:00:52'),
(25, 47, 62, 'yes', 28, 1, '2022-07-20 17:33:27', '2022-07-20 18:00:52'),
(26, 47, 62, 'next', 28, 1, '2022-07-20 17:33:37', '2022-07-20 18:00:52'),
(27, 47, 62, 'hello', 28, 1, '2022-07-20 17:33:47', '2022-07-20 18:00:52'),
(28, 47, 62, 'one after', 28, 1, '2022-07-20 17:34:06', '2022-07-20 18:00:52'),
(29, 54, 51, '.', 26, 1, '2022-07-23 02:48:16', '2022-07-23 14:55:06'),
(30, 54, 51, 'heloo exchangeanythinger This is Joe. Are you thre?', 26, 1, '2022-07-23 02:48:59', '2022-07-23 14:55:06'),
(31, 51, 54, 'I am. How they hanging?', 26, 0, '2022-07-23 14:55:04', '2022-07-23 14:55:04'),
(32, 52, 47, '.', 25, 1, '2022-07-24 13:18:26', '2022-07-24 16:42:37'),
(33, 52, 47, 'hello', 25, 1, '2022-07-24 13:18:37', '2022-07-24 16:42:37'),
(34, 52, 47, 'd', 25, 1, '2022-07-24 13:18:48', '2022-07-24 16:42:37'),
(35, 52, 47, 'a', 25, 1, '2022-07-24 13:18:51', '2022-07-24 16:42:37'),
(36, 52, 47, 'd', 25, 1, '2022-07-24 13:18:55', '2022-07-24 16:42:37'),
(37, 52, 47, 'a', 25, 1, '2022-07-24 13:18:58', '2022-07-24 16:42:37'),
(38, 47, 62, '.', 32, 0, '2022-07-24 16:42:14', '2022-07-24 16:42:14'),
(39, 68, 63, '.', 35, 1, '2022-07-24 21:22:29', '2022-11-05 04:53:54'),
(40, 68, 63, 'hlw', 35, 1, '2022-07-24 21:22:44', '2022-11-05 04:53:54'),
(41, 68, 63, '.', 35, 1, '2022-07-24 21:38:21', '2022-11-05 04:53:54'),
(42, 68, 30, '.', 29, 1, '2022-07-24 21:38:37', '2022-07-24 21:52:46'),
(43, 68, 30, 'hlw', 29, 1, '2022-07-24 21:38:54', '2022-07-24 21:52:46'),
(44, 30, 68, '.', 36, 0, '2022-07-24 21:51:32', '2022-07-24 21:51:32'),
(45, 30, 68, '.', 36, 0, '2022-07-24 21:52:07', '2022-07-24 21:52:07'),
(46, 30, 68, 'hi', 29, 0, '2022-07-24 21:52:45', '2022-07-24 21:52:45'),
(47, 63, 68, 'good', 35, 0, '2022-11-05 04:53:36', '2022-11-05 04:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_super_admins_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_12_184107_create_permission_tables', 1),
(5, '2020_12_20_161857_create_brands_table', 1),
(6, '2020_12_23_122556_create_contacts_table', 1),
(7, '2021_02_17_110211_create_testimonials_table', 1),
(8, '2021_07_07_125145_create_themes_table', 1),
(9, '2021_07_13_121453_create_cities_table', 1),
(10, '2021_07_13_121502_create_towns_table', 1),
(11, '2021_08_21_174451_create_customers_table', 1),
(12, '2021_08_22_051131_create_categories_table', 1),
(13, '2021_08_22_051134_create_sub_categories_table', 1),
(14, '2021_08_22_051135_create_ads_table', 1),
(15, '2021_08_22_051198_create_post_categories_table', 1),
(16, '2021_08_22_051199_create_posts_table', 1),
(17, '2021_08_23_115402_create_settings_table', 1),
(18, '2021_08_25_061331_create_languages_table', 1),
(19, '2021_09_04_105120_create_blog_comments_table', 1),
(20, '2021_09_05_120235_create_ad_features_table', 1),
(21, '2021_09_05_120248_create_ad_galleries_table', 1),
(22, '2021_09_19_141812_create_plans_table', 1),
(23, '2021_09_19_152529_create_faq_categories_table', 1),
(24, '2021_11_13_114825_create_messengers_table', 1),
(25, '2021_11_14_093821_create_notifications_table', 1),
(26, '2021_11_14_095846_create_jobs_table', 1),
(27, '2021_11_15_112417_create_user_plans_table', 1),
(28, '2021_11_15_112949_create_transactions_table', 1),
(29, '2021_11_18_102445_add_fields_to_settings_table', 1),
(30, '2021_11_23_112531_add_fields_to_customers_table', 1),
(31, '2021_12_14_142236_create_emails_table', 1),
(32, '2021_12_14_142427_create_orders_table', 1),
(33, '2021_12_15_161624_create_module_settings_table', 1),
(34, '2021_12_18_134032_add_seo_fields_to_settings_table', 1),
(35, '2021_12_18_141044_add_socialite_column_to_customers_table', 1),
(36, '2021_12_18_153602_create_social_settings_table', 1),
(37, '2021_12_19_101413_create_cms_table', 1),
(38, '2021_12_19_113555_remove_fields_from_settings_table', 1),
(39, '2021_12_19_115130_create_payment_settings_table', 1),
(40, '2021_12_20_104309_add_fields_to_cms_table', 1),
(41, '2021_12_21_105713_create_faqs_table', 1),
(42, '2022_02_06_123859_add_token_to_customers_table', 1),
(43, '2022_02_16_152704_add_loader_fields_to_settings_table', 1),
(44, '2022_03_01_110707_create_timezones_table', 1),
(45, '2022_03_05_125615_create_currencies_table', 1),
(46, '2022_03_08_110749_add_website_configuration_to_settings_table', 1),
(47, '2022_07_14_151623_create_wishlists_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\SuperAdmin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_settings`
--

CREATE TABLE `module_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog` tinyint(1) NOT NULL DEFAULT 1,
  `newsletter` tinyint(1) NOT NULL DEFAULT 1,
  `language` tinyint(1) NOT NULL DEFAULT 1,
  `contact` tinyint(1) NOT NULL DEFAULT 1,
  `faq` tinyint(1) NOT NULL DEFAULT 1,
  `testimonial` tinyint(1) NOT NULL DEFAULT 1,
  `price_plan` tinyint(1) NOT NULL DEFAULT 1,
  `appearance` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module_settings`
--

INSERT INTO `module_settings` (`id`, `blog`, `newsletter`, `language`, `contact`, `faq`, `testimonial`, `price_plan`, `appearance`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('060f6f8d-4967-4d4e-9c27-084e3e9570ee', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 3, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/ad\\/details\\/mitsubishi-pajero-sports-diesel-sunroof-2010\"}', NULL, '2022-04-11 02:31:57', '2022-04-11 02:31:57'),
('10b2e40d-57c6-4fe6-baa5-c56fcca2e884', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-09 04:02:32', '2022-05-09 04:02:32'),
('139c572d-0d5a-4450-bdd3-acde9c93e231', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-09 08:07:52', '2022-05-09 08:07:52'),
('178bd9d4-c0f3-4747-9cc8-3c6e62b025f8', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 3, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/ad\\/details\\/bajaj-discover-110cc-cbs\"}', NULL, '2022-04-11 03:19:03', '2022-04-11 03:19:03'),
('2b161a47-2eeb-42f9-99a4-8738b6ed4f36', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-08 11:36:40', '2022-05-08 11:36:40'),
('372824e2-5587-4a21-b3ad-d2affa96e60c', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-09 05:28:31', '2022-05-09 05:28:31'),
('44de96bc-baab-429a-bce3-9f3c04952353', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 1, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-04-14 06:14:47', '2022-04-14 06:14:47'),
('4ed66b58-8bff-406a-bae5-c89fc8d9f3e0', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 1, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-04-14 07:09:07', '2022-04-14 07:09:07'),
('539dc87c-7e6d-4af8-a504-d217c2d4fcd5', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-09 03:17:03', '2022-05-09 03:17:03'),
('5ade2359-ae4f-4eba-8348-b65b333b4dd8', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-09 09:42:34', '2022-05-09 09:42:34'),
('5ceaa577-9038-4223-9021-b9ac187abedc', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-08 10:20:21', '2022-05-08 10:20:21'),
('6127b14f-e5a6-4b47-9f7d-ed1491dcb0aa', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-08 10:12:14', '2022-05-08 10:12:14'),
('6158285a-507f-4382-ab47-995c4eecf4ee', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-08 10:51:26', '2022-05-08 10:51:26'),
('6259a21a-6199-4a89-ac90-b01204101f34', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 3, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/ad\\/details\\/bajaj-discover-110cc-cbs\"}', NULL, '2022-04-11 03:11:28', '2022-04-11 03:11:28'),
('714ce5cd-1dff-4a3f-b83d-45bc0bd46e0c', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-09 03:33:15', '2022-05-09 03:33:15'),
('750db2ba-a80c-4279-9b5f-2cc3bf44228c', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-11 22:26:52', '2022-05-11 22:26:52'),
('7741d96d-b56a-4229-b65b-51507252772e', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-08 10:57:41', '2022-05-08 10:57:41'),
('786aba75-6b8d-4ec9-947a-5f90c23bc0ac', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 1, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-04-06 11:34:01', '2022-04-06 11:34:01'),
('7cd9f47a-6198-41d6-8234-949e25e44ae7', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 1, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-04-14 06:09:02', '2022-04-14 06:09:02'),
('7de32c25-87aa-417f-950a-9298c7eead17', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-09 05:21:30', '2022-05-09 05:21:30'),
('80f0f705-c521-4a17-94e4-426a57162b06', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-09 03:38:01', '2022-05-09 03:38:01'),
('8d5e8b09-661d-4f49-9d33-f49f55c95dd7', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 3, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/ad\\/details\\/bajaj-discover-110cc-cbs\"}', NULL, '2022-04-11 03:18:35', '2022-04-11 03:18:35'),
('9282ed9a-6222-4200-b54a-17e67a7bb40a', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-09 05:28:18', '2022-05-09 05:28:18'),
('94dde290-f4ab-4d16-89ab-e6683b384a92', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-11 22:24:09', '2022-05-11 22:24:09'),
('9bc2fb5c-249d-40d5-85b7-705be552ab09', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 6, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-08 09:57:38', '2022-05-08 09:57:38'),
('a27f939d-1684-4550-8594-acee38ec14c6', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-11 22:26:16', '2022-05-11 22:26:16'),
('a6031a0e-87e3-4d1d-ba65-78385049bdff', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-08 11:04:10', '2022-05-08 11:04:10'),
('ad18738a-84ee-4e77-87d6-c55e429444d2', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-08 12:02:15', '2022-05-08 12:02:15'),
('b1aef487-6ac3-4275-9168-09442aa81f57', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 4, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-08 09:31:49', '2022-05-08 09:31:49'),
('b2aecd4c-9cf7-48f2-ad93-0cd2d9a40440', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-11 22:24:24', '2022-05-11 22:24:24'),
('b2efd472-c47b-41e5-b8ba-8263591e2139', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-08 11:03:20', '2022-05-08 11:03:20'),
('b7795b57-1235-40e6-a1c2-8360f821bd66', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 12, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-09 11:16:47', '2022-05-09 11:16:47'),
('b8e39646-a234-40a3-a921-d06d964e203d', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-11 22:23:37', '2022-05-11 22:23:37'),
('bb540381-38fc-46b5-8cd7-a7390adeb85c', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-09 03:33:25', '2022-05-09 03:33:25'),
('bfccbdb8-673e-48fe-86c3-e9e6d5fab943', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-08 10:40:49', '2022-05-08 10:40:49'),
('cf3acccc-fa04-4450-99e0-f60ad613b408', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 1, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-04-11 07:22:44', '2022-04-11 07:22:44'),
('d44420ff-496a-4321-9c8f-0c6ccd68bb97', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-11 22:26:31', '2022-05-11 22:26:31'),
('d711ffb2-0246-48e8-8e75-adb42a9d70a0', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-09 03:32:39', '2022-05-09 03:32:39'),
('fa18559a-f1fa-4079-a426-5f6d741d9e58', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-08 10:49:10', '2022-05-08 10:49:10'),
('f0fde9d3-2374-4f20-930e-a2a832fe9fc7', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 23, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-16 09:19:01', '2022-05-16 09:19:01'),
('32a23111-31c2-4241-b205-6cdbf31d6372', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 23, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-16 09:19:09', '2022-05-16 09:19:09'),
('1ae76c25-f860-4aad-8d39-a161958deb63', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 23, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-16 09:46:11', '2022-05-16 09:46:11'),
('d46e1572-4b69-4d5f-9207-630028d997bd', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 23, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-16 22:16:47', '2022-05-16 22:16:47'),
('3372b215-5d35-4eec-99ac-a57c0b85d1b6', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 23, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-16 22:46:58', '2022-05-16 22:46:58'),
('f298eadf-df48-4422-ba81-6c98e0239edc', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 24, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-16 22:51:27', '2022-05-16 22:51:27'),
('4875c0e3-63e9-4263-a210-b6ecc7178e52', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 25, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-16 22:53:16', '2022-05-16 22:53:16'),
('285c83de-4a2a-4153-8f25-ae83423735da', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 26, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-16 23:01:28', '2022-05-16 23:01:28'),
('7a2187c1-4193-4017-8fa1-395786b87b62', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 27, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-16 23:14:04', '2022-05-16 23:14:04'),
('190b9f92-acc5-4c34-b2ca-50a8e34839fa', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 28, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-16 23:17:57', '2022-05-16 23:17:57'),
('1cc5359f-9ff8-4644-8251-2c7a9a1882f3', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 5, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-21 13:15:59', '2022-05-21 13:15:59'),
('72606620-e7fa-4cbb-9249-2bc77c57cb47', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 6, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-21 13:24:30', '2022-05-21 13:24:30'),
('4174977b-aa5d-4b60-961c-f95cec562d46', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 1, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-21 13:24:35', '2022-05-21 13:24:35'),
('12c87965-6596-43c0-91ee-28ccd9845689', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 4, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-21 13:25:09', '2022-05-21 13:25:09'),
('53ba25fb-56de-4b15-82eb-57f1957ab230', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 7, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-21 22:32:25', '2022-05-21 22:32:25'),
('5eddaff8-a736-48b8-a2f5-23d46aed4f25', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 10, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-22 00:34:28', '2022-05-22 00:34:28'),
('7102fcad-545f-48e6-8557-ebcb98b471fa', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 1, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-22 07:48:25', '2022-05-22 07:48:25'),
('b9a29825-66da-4e84-9ade-f7c06fcaf877', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 18, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-22 10:33:31', '2022-05-22 10:33:31'),
('b170e0be-b43e-4cc2-ae2a-f9e23d21128b', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 3, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-25 12:45:16', '2022-05-25 12:45:16'),
('e1052ffb-4332-4ce1-b04f-6f48aacbce58', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 19, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-28 10:42:21', '2022-05-28 10:42:21'),
('640295ce-b6f7-4729-89eb-e6f2de802a59', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 19, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-28 11:56:47', '2022-05-28 11:56:47'),
('32050453-2906-4dcb-939e-dd0eb8f5b311', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 19, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-29 01:53:19', '2022-05-29 01:53:19'),
('f063a195-4eec-46b4-95a8-7c98a580b67f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 19, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-29 10:05:03', '2022-05-29 10:05:03'),
('81f3e6ee-6c88-44ae-92e9-30d922941e8a', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 19, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-30 04:18:14', '2022-05-30 04:18:14'),
('eb7e2a07-7c56-420c-8bb2-ef732c3586a3', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 19, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-30 10:43:03', '2022-05-30 10:43:03'),
('3e84c0f2-d53c-4ac6-b3e9-3b9afc3bf5e8', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 19, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-31 04:10:11', '2022-05-31 04:10:11'),
('44cfb5b2-905c-4210-ac1e-fcca614b6e7a', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 19, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-05-31 04:30:09', '2022-05-31 04:30:09'),
('40846772-0927-4196-9356-404d9a5e13b3', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 19, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-31 04:34:40', '2022-05-31 04:34:40'),
('e925a5b5-cd95-415a-9d11-4ee68d7ece9a', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 19, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-05-31 08:57:44', '2022-05-31 08:57:44'),
('9486ab7e-3b81-4494-a5cc-4ddfc59c79fe', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 1, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-08 05:46:35', '2022-06-08 05:46:35'),
('4f015f54-217d-46e6-a309-b72409796247', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 1, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"http:\\/\\/localhost:8000\\/ad\\/details\\/dell-latitude-e7490-core-i5-8th-gen-16gb-512gb-nvme\"}', NULL, '2022-06-08 09:29:47', '2022-06-08 09:29:47'),
('048aaa4a-af83-4248-87d0-568937a6a192', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 1, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-08 23:27:27', '2022-06-08 23:27:27'),
('7fe331ce-5e28-4a7a-93f6-ee13e3acd4a2', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 1, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-09 00:53:24', '2022-06-09 00:53:24'),
('048ef3ad-32cb-4073-ac04-2d0aa3fcd239', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 1, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"http:\\/\\/localhost:8000\\/ad\\/details\\/test-addtest-addtest-addtest-add\"}', NULL, '2022-06-09 03:42:22', '2022-06-09 03:42:22'),
('7e6b41f0-ecb3-432a-a79a-e2a52ab9425d', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-06-10 05:06:07', '2022-06-10 05:06:07'),
('ce8e8135-0d8e-48f7-8714-d654cae06e96', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-10 05:06:20', '2022-06-10 05:06:20'),
('0bcca754-a61d-4c4a-9e4b-7d4a180202c2', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 21, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-06-11 23:42:47', '2022-06-11 23:42:47'),
('d511fab7-7d75-4dd8-b95e-20d069b02e09', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-11 23:43:27', '2022-06-11 23:43:27'),
('55166cc2-fb54-4e0a-b6d7-c00ceaa05078', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-06-11 23:43:45', '2022-06-11 23:43:45'),
('910a8815-7589-408b-8958-fde1599114d9', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-12 00:18:22', '2022-06-12 00:18:22'),
('14bb638e-2251-4820-bc28-648e4f006ca9', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-06-12 00:33:23', '2022-06-12 00:33:23'),
('23dcd24b-b6b1-4e5a-8e6e-450f14e64861', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-13 01:45:07', '2022-06-13 01:45:07'),
('effd3e0a-5fef-4913-bf19-01ffb61f01f3', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-06-13 01:49:02', '2022-06-13 01:49:02'),
('2f939277-d4a8-4c03-91f8-f7f49d7afdb8', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-13 01:49:27', '2022-06-13 01:49:27'),
('54f377fd-ba20-4ab8-90c9-0a409f21d990', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-13 20:56:17', '2022-06-13 20:56:17'),
('7906471b-9f0b-46d6-8f82-396785d08ab2', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-14 14:42:38', '2022-06-14 14:42:38'),
('d3f94566-026b-4a1b-a164-96c0b88d3d2a', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 25, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-16 20:56:40', '2022-06-16 20:56:40'),
('6ccd02db-89ae-4b5b-b3c3-c78909f1e2f3', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-17 19:07:43', '2022-06-17 19:07:43'),
('2a08a290-a909-4518-ad68-876aa4576bee', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-17 19:44:55', '2022-06-17 19:44:55'),
('e3c30ec4-caf4-4417-baee-9f66ee26a68c', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 20, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-18 17:27:13', '2022-06-18 17:27:13'),
('f61d431e-e6e6-4334-b27e-6780353878e3', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-25 17:43:01', '2022-06-25 17:43:01'),
('00483918-9f63-4d58-b48e-34c422746dbc', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-25 20:12:54', '2022-06-25 20:12:54'),
('a389dc37-1f00-487f-99bd-e09f2addf414', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-25 20:28:13', '2022-06-25 20:28:13'),
('7bb8ba02-a89b-4081-81ee-6c47a6c7a131', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-26 04:21:34', '2022-06-26 04:21:34'),
('51ba8b47-f6d5-4895-8a89-26de3ad043b7', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-26 16:09:47', '2022-06-26 16:09:47'),
('388a3257-53a8-4d48-b176-d0ea9007536b', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-26 17:22:03', '2022-06-26 17:22:03'),
('8d4dff3b-309e-4c9d-a99f-2ca2b339eb7e', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-28 01:09:01', '2022-06-28 01:09:01'),
('4e36581a-bf3c-403b-a623-74c86d1c6441', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-28 20:21:53', '2022-06-28 20:21:53'),
('fe16991b-b62a-4add-945b-c07c77df9d95', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-28 20:54:48', '2022-06-28 20:54:48'),
('edce5df1-59c4-43e0-ba23-18f612b9f85d', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-28 21:41:36', '2022-06-28 21:41:36'),
('4917301b-ce09-4791-8458-e9a845524bc8', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-28 21:43:15', '2022-06-28 21:43:15'),
('1d2b3d83-851d-4632-864b-e593cd4818eb', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-28 22:03:13', '2022-06-28 22:03:13'),
('7b836024-f21f-4588-90f5-5d82c0a59814', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-28 22:40:44', '2022-06-28 22:40:44'),
('efe2246f-b2c9-4d0a-bf64-61c4f2a21d3c', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-06-28 23:00:39', '2022-06-28 23:00:39'),
('939c2e24-a4ea-4f66-9dbe-8b72fa636f9d', 'App\\Notifications\\AdPendingNotification', 'App\\Models\\Customer', 31, '{\"msg\":\"Ad pending\",\"type\":\"adpending\"}', NULL, '2022-06-28 23:05:53', '2022-06-28 23:05:53'),
('2951ad14-9596-40cc-b3d8-bb9187e9042e', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-29 00:50:26', '2022-06-29 00:50:26'),
('1d0c716d-caec-461f-9c0c-487aa91b5d55', 'App\\Notifications\\AdApprovedNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"Ad Approved\",\"type\":\"adapproved\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/cannabis-leaf-pendant-on-leather-thong\"}', NULL, '2022-06-29 01:22:10', '2022-06-29 01:22:10'),
('e07a5bb2-2f35-4cd1-a040-eae63bfcf904', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/cannabis-leaf-pendant-on-leather-thong\"}', NULL, '2022-06-29 01:22:10', '2022-06-29 01:22:10'),
('6017d87e-c4c5-4cd6-9f95-e41e1843f2be', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-29 01:22:47', '2022-06-29 01:22:47'),
('420406ee-8479-4247-a3b4-bb24d8471252', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-29 03:06:15', '2022-06-29 03:06:15'),
('5a896d93-00b8-4162-bf8d-fb2535ba108f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-29 03:15:26', '2022-06-29 03:15:26'),
('db2070db-594b-4b14-a2b6-82e6d64e28af', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-29 03:52:20', '2022-06-29 03:52:20'),
('4ea9daa1-165b-4137-b4aa-af79ad5026e1', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-29 11:49:36', '2022-06-29 11:49:36'),
('6e3fbce2-02b6-4892-a1f1-84ce9cd98a07', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-06-29 12:26:28', '2022-06-29 12:26:28'),
('c870db89-3999-4f1e-8c17-db6058ac0c0d', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-29 12:26:41', '2022-06-29 12:26:41'),
('b801556b-8834-4079-bf35-07664365dcf4', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-06-29 12:31:35', '2022-06-29 12:31:35'),
('515cf0aa-43a4-4b42-b048-7d052d4ea3a8', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-29 12:33:31', '2022-06-29 12:33:31'),
('693a069b-ed82-4563-a301-bdeea862f789', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-06-29 12:35:53', '2022-06-29 12:35:53'),
('4375051f-d571-4d7e-ac94-76284f4995ff', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-29 12:42:38', '2022-06-29 12:42:38'),
('60aa8f00-239e-45b2-9eb5-e50cf8e70df6', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-06-29 12:43:45', '2022-06-29 12:43:45'),
('353fdcc0-c765-4746-935b-e3d32e1bc062', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-29 12:44:07', '2022-06-29 12:44:07'),
('68949baf-3203-4011-88b0-a4a1417b90f1', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-06-29 12:58:59', '2022-06-29 12:58:59'),
('cb21e37f-7447-4257-8659-3404a9446729', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-29 13:06:30', '2022-06-29 13:06:30'),
('42ca7e19-77b0-4d5b-82bf-9c35809c5908', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-06-29 15:06:49', '2022-06-29 15:06:49'),
('4a76896e-dbe1-4240-8070-32dd4f7263fc', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-29 15:07:01', '2022-06-29 15:07:01'),
('adb25772-5a40-4e7e-8f4b-c0e368a4e5f0', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 36, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/cctv-camara-complete-package-04-pcs-excellent-product\"}', NULL, '2022-06-30 10:51:07', '2022-06-30 10:51:07'),
('4d7d95ec-709c-4cc5-8067-2a38f1692985', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-30 13:53:24', '2022-06-30 13:53:24'),
('198656d3-ccbd-4ea9-b21e-979025e54a1e', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 36, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-30 13:53:34', '2022-06-30 13:53:34'),
('070bd807-2144-4743-b2c7-146b00bb76b6', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-06-30 17:02:35', '2022-06-30 17:02:35'),
('1bbef9a7-da2f-408e-86e5-13ce99fb0cc4', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-01 00:10:39', '2022-07-01 00:10:39'),
('d7e00b9f-2098-47c5-b80a-8abbd3e13c8d', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-01 01:37:15', '2022-07-01 01:37:15'),
('e08461f7-442c-47de-b6cf-a2fd6f980c08', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-01 01:38:10', '2022-07-01 01:38:10'),
('9518f4ec-039f-4fd3-9417-92157e19dd27', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-01 01:38:21', '2022-07-01 01:38:21'),
('f1a2942f-2300-46fd-be72-37ab53bdba7b', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-01 14:02:03', '2022-07-01 14:02:03'),
('0cd9c24f-a06b-4ef4-bcec-372b4e323f59', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-01 19:38:22', '2022-07-01 19:38:22'),
('6f01d2d8-8cf3-4cfe-8099-3c34b600f4ed', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-01 19:48:04', '2022-07-01 19:48:04'),
('639e6896-ab38-4e80-92ae-9c6744dde3fc', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 41, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-01 20:39:37', '2022-07-01 20:39:37'),
('fd0eef29-54ae-420d-808d-6d5ab3dc9f7e', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/urgent-almost-new-monitor-sell\"}', NULL, '2022-07-01 21:25:33', '2022-07-01 21:25:33'),
('3c440aa0-1ad5-4929-9dca-371de091b577', 'App\\Notifications\\AdWishlistNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"Added a ad to favourite list\",\"type\":\"added_to_favourite\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/urgent-almost-new-monitor-sell\"}', NULL, '2022-07-01 21:35:33', '2022-07-01 21:35:33'),
('e363e507-3fdb-4823-8a3c-b2e97fdb4a11', 'App\\Notifications\\AdWishlistNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"Removed a ad from favourite list\",\"type\":\"added_to_favourite\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/urgent-almost-new-monitor-sell\"}', NULL, '2022-07-01 21:35:38', '2022-07-01 21:35:38'),
('2b776022-6a62-4172-b81d-e66d6385caf6', 'App\\Notifications\\AdWishlistNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"Added a ad to favourite list\",\"type\":\"added_to_favourite\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/urgent-almost-new-monitor-sell\"}', NULL, '2022-07-01 21:35:41', '2022-07-01 21:35:41'),
('d8794c34-2a5c-4cc2-b521-1e55be41bf5a', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 36, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-01 21:39:54', '2022-07-01 21:39:54'),
('21468c2d-dd99-44d3-b9cd-1a8985b13451', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-02 12:34:59', '2022-07-02 12:34:59'),
('2d967782-dfec-415e-bbde-ca430ccf6d3f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 43, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-02 17:51:49', '2022-07-02 17:51:49'),
('83568cd3-3a6f-4e42-ac24-29f463cf423e', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 43, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-02 17:54:14', '2022-07-02 17:54:14'),
('c308b1fc-2433-4b50-888d-5607601cf54f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-02 17:54:55', '2022-07-02 17:54:55'),
('042693d9-aa3f-4a05-b312-5d3da12fcda5', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-02 22:22:59', '2022-07-02 22:22:59'),
('5e1d0de1-55e6-446e-b625-e4ac694fc87a', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/roommate-needed-roommate-needed\"}', NULL, '2022-07-02 22:43:17', '2022-07-02 22:43:17'),
('70a7f2fa-9bf6-41d6-94f0-cfe46f4a1d1d', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/roommate-needed-roommate-needed\"}', NULL, '2022-07-02 22:47:54', '2022-07-02 22:47:54'),
('13b8bf58-03cc-446f-828c-124bd60e13cd', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/roommate-needed-roommate-needed2\"}', NULL, '2022-07-02 22:49:40', '2022-07-02 22:49:40'),
('542c2afe-fd73-4c2e-820a-638c27d64055', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-02 23:46:12', '2022-07-02 23:46:12'),
('d21574ed-f8c4-4f90-b8e2-d8d2df7f79cf', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-02 23:46:29', '2022-07-02 23:46:29'),
('25eb7883-b2bf-481c-8b43-42cf23ac150a', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-02 23:46:39', '2022-07-02 23:46:39'),
('d6055a5f-f1ce-4b86-94bf-46f28a15c1f1', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/roommate-needed-roommate-needed2\"}', NULL, '2022-07-02 23:50:28', '2022-07-02 23:50:28'),
('3656d512-f283-437f-a96d-9faab040d9c4', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/razer-kraken-tournament-edition-fully-intake\"}', NULL, '2022-07-02 23:54:03', '2022-07-02 23:54:03'),
('0fffaf91-d7cd-4a47-9acc-b5a025c514ae', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/razer-kraken-tournament-edition-fully-intake\"}', NULL, '2022-07-02 23:55:04', '2022-07-02 23:55:04'),
('70528fb0-1b34-4218-a8dd-eee982c12562', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-03 15:44:50', '2022-07-03 15:44:50'),
('7e7c1ab8-217a-42c6-9480-ef091fd1b08e', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/cabbage-cauliflower-peas-and-carrots\"}', NULL, '2022-07-03 15:55:14', '2022-07-03 15:55:14'),
('28693b87-6006-4014-8f31-2bfd697ea1b3', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-03 16:22:31', '2022-07-03 16:22:31'),
('f522dff5-0eea-4345-8b7b-3c66d8c5012b', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-03 16:22:51', '2022-07-03 16:22:51'),
('a7ee3561-94c2-4ab5-81db-b7483ada4ca2', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-03 16:31:07', '2022-07-03 16:31:07'),
('b4202961-45be-43b8-a8c2-9c3533a98a61', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-03 16:31:14', '2022-07-03 16:31:14'),
('22ab77b8-2410-48ef-ab63-84a008240dc4', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-03 16:32:18', '2022-07-03 16:32:18'),
('74dea44d-a3c4-4e1d-a30a-5af60fbbb768', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-03 16:32:25', '2022-07-03 16:32:25'),
('e3989f69-e7f1-47b0-b362-ce7bd6a31f68', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 42, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-04 12:29:16', '2022-07-04 12:29:16'),
('17e8a372-5d0b-4bde-8602-ab98b1e37ecb', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 12:51:42', '2022-07-05 12:51:42'),
('1c2af3d3-a904-4b20-bede-b5b4bff0512c', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 15:22:37', '2022-07-05 15:22:37'),
('a67cc7bc-563b-4d85-af0d-1d9aaf7eb0d0', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-05 15:44:49', '2022-07-05 15:44:49'),
('df616899-6ec7-412c-8609-8eeba7bd194b', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 43, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 15:44:57', '2022-07-05 15:44:57'),
('081ed30d-000c-4641-be1e-a8c19718b987', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 43, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-05 15:47:15', '2022-07-05 15:47:15'),
('5e8628f6-2955-475a-a5d3-964e8464f97f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 15:47:21', '2022-07-05 15:47:21'),
('394836f6-abab-4579-bd48-5a829c9bc05e', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 15:58:07', '2022-07-05 15:58:07'),
('b9bac3bf-b518-4223-8128-b492122dd46e', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-05 16:01:10', '2022-07-05 16:01:10'),
('88a756b8-aa5b-4499-a36e-b3141f43694b', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 16:03:03', '2022-07-05 16:03:03'),
('61c780da-159c-463c-b0b6-57af5baf8903', 'App\\Notifications\\AdDeleteNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re just deleted a ad\",\"type\":\"addelete\"}', NULL, '2022-07-05 16:03:14', '2022-07-05 16:03:14'),
('93398d4b-f405-4e1e-b1f1-629ee4692e5a', 'App\\Notifications\\AdDeleteNotification', 'App\\Models\\Customer', 29, '{\"msg\":\"You\'re just deleted a ad\",\"type\":\"addelete\"}', NULL, '2022-07-05 16:03:21', '2022-07-05 16:03:21'),
('92a7ec8b-1140-4035-bf55-008780fa8f25', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 43, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 16:04:31', '2022-07-05 16:04:31'),
('9844c794-1a7b-408e-9a99-6db7ee3caa39', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 43, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/hemp-necklace-with-real-leather-thong\"}', NULL, '2022-07-05 16:11:09', '2022-07-05 16:11:09'),
('8229afed-8ccf-4117-823e-99c7918ff9dc', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 43, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/hemp-necklace-with-real-leather-thong\"}', NULL, '2022-07-05 16:12:31', '2022-07-05 16:12:31'),
('54a5f4e2-7bac-497a-b0c8-c33461b0cca5', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 43, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-05 16:12:58', '2022-07-05 16:12:58'),
('e0177037-9f15-40ef-ab1e-0bda36ed2493', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 45, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-05 16:17:41', '2022-07-05 16:17:41'),
('85b94a05-fcab-4c6c-b29c-974c53ba249e', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 43, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 16:28:00', '2022-07-05 16:28:00'),
('b790ad5b-0c02-4e19-85c0-0353f02462f4', 'App\\Notifications\\AdDeleteNotification', 'App\\Models\\Customer', 43, '{\"msg\":\"You\'re just deleted a ad\",\"type\":\"addelete\"}', NULL, '2022-07-05 16:28:18', '2022-07-05 16:28:18'),
('ce642be2-522a-4b0e-8c67-8bcacce7b6ef', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 33, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 16:28:45', '2022-07-05 16:28:45'),
('b4847529-9584-4b58-a6a8-f114c3c85f85', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 46, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 16:38:11', '2022-07-05 16:38:11'),
('725ad53b-ceae-4d87-a492-9fb14fb3b67f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 32, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 16:50:18', '2022-07-05 16:50:18'),
('70ad3e22-fd49-4e0d-a87a-609a6b77ec0d', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 18:09:01', '2022-07-05 18:09:01'),
('4a6f252f-57fb-4022-9ea7-b86cf27f4e9f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 18:16:27', '2022-07-05 18:16:27'),
('e7985631-ef42-4348-aabe-e6bb7cd72a4f', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-05 18:17:04', '2022-07-05 18:17:04'),
('fd4b286d-f4b7-4fd7-ac1b-3a18ce450b9f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 18:17:14', '2022-07-05 18:17:14'),
('3227eff6-840a-4635-bb72-16ccf6a5c79f', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-05 18:17:43', '2022-07-05 18:17:43'),
('8364659a-6676-41a6-b87c-e79dced1b017', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 18:18:00', '2022-07-05 18:18:00'),
('fd07dfab-3f8a-49e7-a712-a7a9b4e368b3', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-05 18:18:58', '2022-07-05 18:18:58'),
('812e8670-db3f-4e82-9c73-885ad6f59288', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 18:19:06', '2022-07-05 18:19:06'),
('ad442cff-a841-42b4-bab2-175def9cdfa7', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-05 18:19:57', '2022-07-05 18:19:57'),
('0ee9fcc3-a7bb-4d2a-9952-140cd26e1a9f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 18:22:13', '2022-07-05 18:22:13'),
('1be19e0d-5238-48e6-bf14-475dc66fadce', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-05 18:22:25', '2022-07-05 18:22:25'),
('5e612034-f983-4295-9bff-cd1bd9e8852b', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 18:22:40', '2022-07-05 18:22:40'),
('278ff8c9-1283-4300-8516-10e8a2bfece3', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-05 18:22:55', '2022-07-05 18:22:55'),
('c65b5189-ce55-4732-9395-10cd11871f3d', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 18:23:12', '2022-07-05 18:23:12'),
('4c611146-6d3d-4067-98d7-fa01e1a0974f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 18:24:12', '2022-07-05 18:24:12'),
('44e85eb3-1f78-4fff-9f11-d933e92c9fbe', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/book-about-internet-service-provider\"}', NULL, '2022-07-05 19:49:14', '2022-07-05 19:49:14'),
('5b65a01b-5784-4eb0-90b0-42772e3107a8', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/book-about-internet-service-provider\"}', NULL, '2022-07-05 20:18:27', '2022-07-05 20:18:27'),
('1f1e29f1-3bc3-45d6-8b29-3b7d44602b81', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/book-about-internet-service-provider\"}', NULL, '2022-07-05 20:23:16', '2022-07-05 20:23:16'),
('176a22cf-2ea0-4aff-b217-d54da2516b6a', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/book-about-internet-service-provider\"}', NULL, '2022-07-05 20:24:02', '2022-07-05 20:24:02');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('050e9b46-8938-4ed2-92ab-8c0f10b57912', 'App\\Notifications\\AdWishlistNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"Added a ad to favourite list\",\"type\":\"added_to_favourite\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/razer-kraken-tournament-edition-fully-intake\"}', NULL, '2022-07-05 20:31:11', '2022-07-05 20:31:11'),
('7e4e466a-693f-4ad5-9eaa-25b9e23ee7dd', 'App\\Notifications\\AdWishlistNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"Removed a ad from favourite list\",\"type\":\"added_to_favourite\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/razer-kraken-tournament-edition-fully-intake\"}', NULL, '2022-07-05 20:32:23', '2022-07-05 20:32:23'),
('dff7cfc4-a96e-41e9-b3de-68460c990c67', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/bprime-business-and-corporate-html-template\"}', NULL, '2022-07-05 21:12:28', '2022-07-05 21:12:28'),
('d579e07f-1682-4a87-b462-77392fe8f963', 'App\\Notifications\\AdDeleteNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re just deleted a ad\",\"type\":\"addelete\"}', NULL, '2022-07-05 21:12:55', '2022-07-05 21:12:55'),
('c7bbc321-9768-4079-b032-73c946cbea41', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/bprime-business-and-corporate-html-template\"}', NULL, '2022-07-05 21:17:12', '2022-07-05 21:17:12'),
('19587db4-1d93-447e-84d3-7bac5330dee4', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-05 21:18:57', '2022-07-05 21:18:57'),
('8c16a2de-93bb-4dce-8628-d90cd09bd959', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 44, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-05 21:19:05', '2022-07-05 21:19:05'),
('271f86e1-3807-4be6-81e8-9aa4e1f7d630', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 37, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-06 06:54:20', '2022-07-06 06:54:20'),
('db033bf1-5283-417f-b2e6-75f97d9daba8', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 37, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-06 06:54:52', '2022-07-06 06:54:52'),
('322e5385-c901-4f2a-bb0f-0a368e83ff87', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 37, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-06 06:54:59', '2022-07-06 06:54:59'),
('db56a52c-4c69-4927-9430-fde8d25e1e47', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 37, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-06 06:56:26', '2022-07-06 06:56:26'),
('0f03d072-e015-4031-bff4-8ed5368b7318', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 37, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-06 06:57:58', '2022-07-06 06:57:58'),
('ca16034f-cb7a-48a0-b236-19b21659609c', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 37, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-06 08:35:33', '2022-07-06 08:35:33'),
('1c52f093-f359-4756-a7d2-d660346b3a45', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 37, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-06 08:35:49', '2022-07-06 08:35:49'),
('cb562dd4-9982-42c5-abbf-f8ce053d414c', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 48, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/lorem-ipsum-is-simply-dummy-text\"}', NULL, '2022-07-06 08:44:01', '2022-07-06 08:44:01'),
('7bf5ab3a-a13a-4edd-a9e5-1007e8ab9b6b', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 48, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/lorem-ipsum-is-simply-dummy-text-of-the-printing\"}', NULL, '2022-07-06 08:56:15', '2022-07-06 08:56:15'),
('3aa99c04-babd-487c-ab0e-8496ace19e00', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 37, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-06 11:53:17', '2022-07-06 11:53:17'),
('dba9dc64-f310-4499-85e7-2d3452d660d9', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 35, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-06 22:36:35', '2022-07-06 22:36:35'),
('c56f3d3f-2306-43aa-9ce3-3bb8e03934ed', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 35, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-06 22:37:43', '2022-07-06 22:37:43'),
('22dae919-f7c5-4e00-83bd-68f4745db75f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 35, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-06 23:24:12', '2022-07-06 23:24:12'),
('21d5f247-8a4b-4d99-9033-26f76b72d1f0', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 35, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/realme-c25s-12-realme-c25s-12-g\"}', NULL, '2022-07-06 23:33:27', '2022-07-06 23:33:27'),
('e6c4ee1a-4109-4a80-a051-1864afbaf06c', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 35, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/realme-c25s-12-realme-c25s-12-g\"}', NULL, '2022-07-06 23:41:40', '2022-07-06 23:41:40'),
('6bd84fe2-b4fd-4f9c-8339-fb5a7f16baf6', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 35, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/realme-c25s-12-realme-c25s-12-g\"}', NULL, '2022-07-06 23:42:37', '2022-07-06 23:42:37'),
('b79ce8fe-8324-4b74-b134-5b430d463b32', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 35, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-06 23:44:29', '2022-07-06 23:44:29'),
('4d19e87e-240c-4673-b67f-9f58baa161be', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-07 01:02:05', '2022-07-07 01:02:05'),
('ccd3cf4e-5998-4f78-8e9e-79a1144c014c', 'App\\Notifications\\AdWishlistNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"Added a ad to favourite list\",\"type\":\"added_to_favourite\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/bprime-business-and-corporate-html-template\"}', NULL, '2022-07-07 01:11:40', '2022-07-07 01:11:40'),
('fa1f2709-5a94-42ee-bb6f-82f20e476510', 'App\\Notifications\\AdWishlistNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"Removed a ad from favourite list\",\"type\":\"added_to_favourite\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/bprime-business-and-corporate-html-template\"}', NULL, '2022-07-07 01:11:56', '2022-07-07 01:11:56'),
('148d42ed-962c-4097-9e0f-ce1bda26ebae', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 50, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/contrary-to-popular-belief-lorem-ipsum\"}', NULL, '2022-07-07 14:29:50', '2022-07-07 14:29:50'),
('6da97c23-a80f-4988-94ba-c00aad4465ae', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 50, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/contrary-to-popular-belief-lorem-ipsum\"}', NULL, '2022-07-07 14:31:02', '2022-07-07 14:31:02'),
('dfbd4c63-ffd1-4bc0-85ea-357a5ef43487', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-07 18:24:56', '2022-07-07 18:24:56'),
('7d8c3340-fbf0-42d8-a933-96ac491a7d40', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/cricket-bat-made-by-ton-this-premiun-willow-bat-will-knock-it-for-six\"}', NULL, '2022-07-07 18:33:15', '2022-07-07 18:33:15'),
('f856e242-4a5f-489e-8fb0-6b2761e38526', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/cricket-bat-made-by-ton-this-premiun-willow-bat-will-knock-it-for-six\"}', NULL, '2022-07-07 18:36:33', '2022-07-07 18:36:33'),
('5a46b873-f59d-4ba2-8980-268e71fc8680', 'App\\Notifications\\AdWishlistNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"Added a ad to favourite list\",\"type\":\"added_to_favourite\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/cricket-bat-made-by-ton-this-premiun-willow-bat-will-knock-it-for-six\"}', NULL, '2022-07-07 18:37:53', '2022-07-07 18:37:53'),
('7882d580-2383-4dc9-838f-66eb433ad850', 'App\\Notifications\\AdWishlistNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"Removed a ad from favourite list\",\"type\":\"added_to_favourite\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/cricket-bat-made-by-ton-this-premiun-willow-bat-will-knock-it-for-six\"}', NULL, '2022-07-07 18:38:10', '2022-07-07 18:38:10'),
('f4106bd8-c7f9-48bc-891e-2b00ed18201f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-07 19:11:33', '2022-07-07 19:11:33'),
('1b369750-d3dd-4d69-a843-764d7918e943', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-07 19:15:22', '2022-07-07 19:15:22'),
('f657fc0e-a759-41e2-901a-1431297bcf6e', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 51, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-07 19:30:24', '2022-07-07 19:30:24'),
('04f036c3-253c-48e8-a68e-e199243b3fe9', 'App\\Notifications\\AdWishlistNotification', 'App\\Models\\Customer', 51, '{\"msg\":\"Added a ad to favourite list\",\"type\":\"added_to_favourite\",\"url\":\"https:\\/\\/exchangeanything.com\\/ad\\/details\\/free-fo-cust-and-other-ads-work\"}', NULL, '2022-07-07 19:51:36', '2022-07-07 19:51:36'),
('1e200beb-8c2a-4b86-b3f5-be1c9bf8e402', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 51, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-07 20:24:03', '2022-07-07 20:24:03'),
('9cb8b13c-e6db-4b6b-9b7a-9965b44ea22a', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 49, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-07 23:22:12', '2022-07-07 23:22:12'),
('178b2eab-5796-4141-b28f-0e8066bfc46e', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-08 00:29:52', '2022-07-08 00:29:52'),
('b4c0801f-68a1-48cc-89c9-af725d2ffeef', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-08 00:31:36', '2022-07-08 00:31:36'),
('bce298c2-0ae4-499e-9129-b51dda6651c5', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-09 23:16:08', '2022-07-09 23:16:08'),
('3c8c7b96-224a-4485-9300-c2277ad9732a', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/best-bucket-of-fish-you-ever-did-see\"}', NULL, '2022-07-09 23:21:47', '2022-07-09 23:21:47'),
('40d277c9-e8e8-4413-85bf-acb6cc87087c', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/pease-and-carrots-carrots-and-peas\"}', NULL, '2022-07-09 23:28:38', '2022-07-09 23:28:38'),
('c7ffd642-b318-4465-a2a6-5086968748cb', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-09 23:30:14', '2022-07-09 23:30:14'),
('9bdef55f-131c-401d-a01c-ec43e3f01f9f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 51, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-09 23:30:26', '2022-07-09 23:30:26'),
('293829b3-5576-437b-b4ff-8d0f73ae4fcd', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 51, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/football-crazy-football-mad-up-the-arsenal\"}', NULL, '2022-07-09 23:34:19', '2022-07-09 23:34:19'),
('104313d3-ce83-4885-9dec-581e79ef2d31', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 51, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-09 23:35:54', '2022-07-09 23:35:54'),
('ca11f119-9704-423c-8edc-5f34d3b71d43', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 52, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-09 23:39:04', '2022-07-09 23:39:04'),
('466c22a6-9a77-444b-a18c-184bf5b13e72', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 52, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-09 23:41:12', '2022-07-09 23:41:12'),
('eae8ebaa-a66c-4452-9e34-4fb626a253f2', 'App\\Notifications\\AdWishlistNotification', 'App\\Models\\Customer', 52, '{\"msg\":\"Added a ad to favourite list\",\"type\":\"added_to_favourite\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/pease-and-carrots-carrots-and-peas\"}', NULL, '2022-07-09 23:43:14', '2022-07-09 23:43:14'),
('61200336-9476-477f-a0f2-f985d22c67bb', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 52, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/tutotutotutottotutotutttttttttt\"}', NULL, '2022-07-10 01:10:55', '2022-07-10 01:10:55'),
('66a40488-86b1-4184-b787-2b79c76032e0', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-10 13:46:21', '2022-07-10 13:46:21'),
('03d3d17d-8635-4f90-9622-5ad2646cf770', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-10 14:38:36', '2022-07-10 14:38:36'),
('3a93c5aa-83b2-461b-91e2-1448102a8bf2', 'App\\Notifications\\AdUpdateNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re just updated a ad\",\"type\":\"adupdate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/pease-and-carrots-carrots-and-peas\"}', NULL, '2022-07-10 14:39:47', '2022-07-10 14:39:47'),
('d8195633-0a73-489d-922d-8a136435bc4a', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-10 14:40:28', '2022-07-10 14:40:28'),
('e4072669-fa56-4fde-9d15-76f787715ea2', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 53, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-10 17:50:22', '2022-07-10 17:50:22'),
('bbe59328-0570-4d71-a0c0-1810101d42ff', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 53, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-10 18:17:52', '2022-07-10 18:17:52'),
('07e2245a-2c73-4353-a7d6-461a9219b3b3', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-10 18:25:57', '2022-07-10 18:25:57'),
('1676f143-fd74-4d3b-8031-3a82a6a0d0ed', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-10 18:35:26', '2022-07-10 18:35:26'),
('e02fa92d-3ae7-46f7-a5a3-f922b510ef29', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-10 18:49:15', '2022-07-10 18:49:15'),
('8226a0c9-cfb8-46a7-9f56-0df83a5104f9', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/hot-pants-and-leg-warmers-are-cool\"}', NULL, '2022-07-10 20:17:47', '2022-07-10 20:17:47'),
('b9010b3c-a501-44e8-80c3-a0d86c643f6c', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-11 01:59:59', '2022-07-11 01:59:59'),
('f15279ba-8c68-4d41-ba6c-07a1be67285e', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-11 02:00:50', '2022-07-11 02:00:50'),
('5711388b-bfd7-4837-aafb-e40668727b34', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-11 02:01:00', '2022-07-11 02:01:00'),
('814ebf5b-cb20-4162-957e-e61bfe304655', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-11 02:09:02', '2022-07-11 02:09:02'),
('d9928ba7-caf8-4688-8549-0abeff5e9fe0', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 52, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-11 02:09:53', '2022-07-11 02:09:53'),
('55cca2a3-0bdb-4e3b-9e92-6008029886ac', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-11 16:58:39', '2022-07-11 16:58:39'),
('8f2408ed-f1b5-4ebd-8cdb-b450d64972f2', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-12 17:16:11', '2022-07-12 17:16:11'),
('6efa3571-5e8e-4969-a9a1-022f0fafc9e0', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 53, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-15 05:32:02', '2022-07-15 05:32:02'),
('90df0f9c-468d-4e01-9c2f-51620dfbabce', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-15 14:56:09', '2022-07-15 14:56:09'),
('28185aa8-7096-4e29-a5de-90fb4a95a50c', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-15 15:16:47', '2022-07-15 15:16:47'),
('d643ebd2-033e-467f-9cd3-4b280b3a4d85', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-15 15:18:24', '2022-07-15 15:18:24'),
('9445b551-96d7-48f5-8d5a-5104128bb720', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-15 18:33:26', '2022-07-15 18:33:26'),
('98ea178c-429f-4731-8787-74870a9f9642', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-15 18:35:13', '2022-07-15 18:35:13'),
('04b94d73-64ba-4783-8a80-a3107214c92d', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 52, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-15 18:35:48', '2022-07-15 18:35:48'),
('720c6508-b807-4f38-82e1-957c357e9efd', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 52, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-15 18:37:36', '2022-07-15 18:37:36'),
('cdf5f4ea-f3b4-426f-89cc-6bbfd2beeadf', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-15 18:58:48', '2022-07-15 18:58:48'),
('f8309762-b382-4ab1-b280-c3241a4c76f4', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-15 18:59:38', '2022-07-15 18:59:38'),
('6151bc91-f087-4f6d-9e30-92b6d48796a5', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 25, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-15 18:59:53', '2022-07-15 18:59:53'),
('ff1143d8-ec56-4ddc-8103-5053856913e3', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 25, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-15 19:00:00', '2022-07-15 19:00:00'),
('32b23ed3-29e1-400a-ada9-e4253dea34f6', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-15 19:00:14', '2022-07-15 19:00:14'),
('85032edf-a320-45a2-a2d7-ee8340860bfc', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 51, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-16 00:00:49', '2022-07-16 00:00:49'),
('318707d7-1612-4664-86d1-bd6259a4c742', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 51, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-16 00:07:35', '2022-07-16 00:07:35'),
('ec24f143-b877-4dbc-a58a-7334921c3e6c', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 55, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-16 00:14:12', '2022-07-16 00:14:12'),
('4585ac83-94fd-4d50-80b9-1d7b88569fda', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-16 14:44:44', '2022-07-16 14:44:44'),
('96d37151-6b18-4ce3-b86d-a3f9f503461e', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-16 14:48:58', '2022-07-16 14:48:58'),
('0bc98dc2-5c4e-46ab-8944-a92ff03bef05', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 53, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-16 18:32:39', '2022-07-16 18:32:39'),
('62ab81d7-4ac8-4d4d-9d60-f1c412afb174', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 55, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-17 14:10:19', '2022-07-17 14:10:19'),
('918a6ad9-15a8-4ba9-b9ae-a5afbb69ac76', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 55, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-17 14:10:49', '2022-07-17 14:10:49'),
('c1a29828-e7cf-4777-a87e-0d3276aff36d', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-17 14:10:59', '2022-07-17 14:10:59'),
('21746378-c45d-4239-89b3-26e72b33867b', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-17 20:30:20', '2022-07-17 20:30:20'),
('af949907-8f85-4866-ade2-7ffd19799f84', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 25, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-17 20:30:42', '2022-07-17 20:30:42'),
('ef978920-9814-4fc5-a240-3fb814e9c515', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-18 15:26:29', '2022-07-18 15:26:29'),
('07089964-12f0-496e-aa57-68a43cb18e21', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-18 15:26:36', '2022-07-18 15:26:36'),
('cc365987-55ad-4eb7-a71b-e22472d91c1b', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 55, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-18 15:26:49', '2022-07-18 15:26:49'),
('a213c3fc-c2a3-440f-bd02-8a6a7fcbf0d9', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 55, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-18 15:26:58', '2022-07-18 15:26:58'),
('f8d3192a-b4fa-4e4c-9943-a7f9c236b654', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-18 15:27:20', '2022-07-18 15:27:20'),
('f60de850-a79e-4b26-a41f-18b394d6792b', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-18 15:28:02', '2022-07-18 15:28:02'),
('dd5affd3-a92d-45b8-a8bd-9ad4bdd83be9', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 56, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-18 15:28:25', '2022-07-18 15:28:25'),
('b59ffc4d-97d1-455f-9e1a-0cadb32cb608', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-19 20:16:49', '2022-07-19 20:16:49'),
('3dad7fbb-3ebf-4bd7-b45e-37bdd1955f16', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 58, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-19 20:17:07', '2022-07-19 20:17:07'),
('70f2dba9-feec-44d4-9ce9-4130fc40a362', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 59, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-19 20:44:59', '2022-07-19 20:44:59'),
('e9bd2293-799e-4fb2-bc09-89a8c9031f43', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 58, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-19 21:08:30', '2022-07-19 21:08:30'),
('ebe1abed-fcb1-47a1-90fd-e5b3631910bc', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 35, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-19 21:37:51', '2022-07-19 21:37:51'),
('a6d12cbe-afb1-4298-b37d-bb68e1209bf8', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 58, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-19 22:38:12', '2022-07-19 22:38:12'),
('ececad85-c8d1-4d5d-bc81-3d60a1726f82', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-19 22:39:50', '2022-07-19 22:39:50'),
('f19f1420-1c2f-4a7d-81d6-1566708e503a', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-19 22:40:38', '2022-07-19 22:40:38'),
('952d1076-9dd7-4319-aee5-71f2d9c0a9ee', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 58, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-19 22:40:44', '2022-07-19 22:40:44'),
('f0057898-d006-4c7e-af78-ef726f66ec62', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-19 22:52:41', '2022-07-19 22:52:41'),
('bf1f42d0-01e7-4845-b7b9-bf4b549fc8d9', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 58, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-19 22:59:39', '2022-07-19 22:59:39'),
('f9f8a6c0-d425-4b4c-815a-9af9ab35c580', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 60, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-20 16:16:11', '2022-07-20 16:16:11'),
('ee5eb181-b3ad-4ca8-8bd9-0d2243f65e7d', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 62, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-20 16:32:58', '2022-07-20 16:32:58'),
('016c78ad-9619-4d8c-83e4-70b2438aa457', 'App\\Notifications\\AdWishlistNotification', 'App\\Models\\Customer', 62, '{\"msg\":\"Added a ad to favourite list\",\"type\":\"added_to_favourite\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/hp-elitebook-core-i5-8gb-ram-256-ssd\"}', NULL, '2022-07-20 16:33:15', '2022-07-20 16:33:15'),
('a66206a9-0cb3-4640-bce1-788e60a3048f', 'App\\Notifications\\AdWishlistNotification', 'App\\Models\\Customer', 62, '{\"msg\":\"Removed a ad from favourite list\",\"type\":\"added_to_favourite\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/hp-elitebook-core-i5-8gb-ram-256-ssd\"}', NULL, '2022-07-20 16:34:56', '2022-07-20 16:34:56'),
('6201ee3b-a1bf-4a9f-9f33-54bb8826f36f', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 62, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-20 17:22:47', '2022-07-20 17:22:47'),
('7004795f-2a88-4cf3-8aa4-6543536b05c9', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-20 17:22:58', '2022-07-20 17:22:58'),
('b7323f6e-3100-4537-9695-eedd2bcc6ea3', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-20 17:39:13', '2022-07-20 17:39:13'),
('0939418b-ff95-48f7-809e-5aad6e22cf7e', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 62, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-20 17:42:32', '2022-07-20 17:42:32'),
('3d0adb99-b465-42c4-adb2-e17e89b288b1', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 62, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-20 18:00:15', '2022-07-20 18:00:15'),
('a1cedf57-4ef5-4627-a08c-1df6c96aff5c', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-20 22:44:49', '2022-07-20 22:44:49'),
('7ec22c96-2184-4a56-b972-20bfb7a31a07', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 56, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-21 16:09:36', '2022-07-21 16:09:36'),
('37420db2-df86-40e9-bf63-ea44f929cbbb', 'App\\Notifications\\AdPendingNotification', 'App\\Models\\Customer', 56, '{\"msg\":\"Ad pending\",\"type\":\"adpending\"}', NULL, '2022-07-21 16:15:34', '2022-07-21 16:15:34'),
('d4960693-05d9-44cb-8f95-043f85587b69', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 56, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-21 16:16:05', '2022-07-21 16:16:05'),
('074a61ca-ff17-4cbf-909a-87e32a7ba4cb', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 55, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-21 16:17:22', '2022-07-21 16:17:22'),
('c358ee9f-0020-43cf-94cf-6a82a593bb92', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 55, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-21 16:18:05', '2022-07-21 16:18:05'),
('6a1b570c-0d23-4d2c-9a26-49ea45d2b45f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-21 16:18:21', '2022-07-21 16:18:21'),
('209cb64f-2f24-4118-a859-b2506b92c913', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-21 16:18:41', '2022-07-21 16:18:41'),
('1a567cdf-1b47-4cfa-9e01-64bcd9c1dbe6', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-21 16:18:49', '2022-07-21 16:18:49'),
('baedd63d-0131-4e23-8424-437baaa327b3', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-21 16:18:55', '2022-07-21 16:18:55'),
('94e5708a-afa9-4c59-b047-0931377a0234', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 52, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-21 16:19:05', '2022-07-21 16:19:05'),
('a7012e4d-dec0-4065-8177-e725e91d6d45', 'App\\Notifications\\AdApprovedNotification', 'App\\Models\\Customer', 56, '{\"msg\":\"Ad Approved\",\"type\":\"adapproved\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/continental-drift-is-the-best-beach-front\"}', NULL, '2022-07-21 16:23:10', '2022-07-21 16:23:10'),
('a88ffb0d-2c87-4744-864e-871277f3de67', 'App\\Notifications\\AdCreateNotification', 'App\\Models\\Customer', 56, '{\"msg\":\"You\'re just created a ad\",\"type\":\"adcreate\",\"url\":\"https:\\/\\/www.exchangeanything.com\\/ad\\/details\\/continental-drift-is-the-best-beach-front\"}', NULL, '2022-07-21 16:23:10', '2022-07-21 16:23:10'),
('91663f91-a1b7-434b-916c-6686c9669947', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-23 02:47:35', '2022-07-23 02:47:35'),
('6b3f02fd-dd29-4dc0-a1e2-42dbf7798600', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-23 02:49:38', '2022-07-23 02:49:38'),
('66e64dc2-1433-4776-b2a8-4f554882e0e4', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 51, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-23 02:49:46', '2022-07-23 02:49:46'),
('cbde5cd2-e6b0-42a8-bfb0-4325fbeee20c', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 51, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-23 14:54:25', '2022-07-23 14:54:25'),
('f97779ad-2b74-498e-8901-43551a126618', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 51, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-23 14:56:51', '2022-07-23 14:56:51'),
('ed33d382-533f-4a47-bda7-51782c93318b', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-23 14:57:04', '2022-07-23 14:57:04'),
('a4541abe-30b2-4ad3-91be-7ed5fac816ac', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-23 16:17:45', '2022-07-23 16:17:45'),
('1e46ff80-0cea-4d24-831a-e40023652e68', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 56, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-23 16:18:03', '2022-07-23 16:18:03'),
('c6ac3c28-33de-48ae-bd0d-d55d395a15f9', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-24 12:48:01', '2022-07-24 12:48:01'),
('6796e6c9-638b-4708-b0b4-73c1d6bc9351', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-24 13:02:57', '2022-07-24 13:02:57'),
('aa58aa38-0c36-4e46-931d-5ea17d020967', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-24 13:03:01', '2022-07-24 13:03:01'),
('d675ac41-4a0c-4c3a-92d3-1dcb26b94bf0', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 67, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-24 13:16:38', '2022-07-24 13:16:38'),
('7637901d-670c-4010-b807-ab0645751c07', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 52, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-24 13:16:47', '2022-07-24 13:16:47'),
('4ddfe993-e911-4aec-a100-7f3a869b6220', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 52, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-24 13:22:49', '2022-07-24 13:22:49'),
('79643f6d-3c14-47f5-b335-ca3274d8880a', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 56, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-24 16:22:55', '2022-07-24 16:22:55'),
('d737966c-5169-4f72-8a4b-947f6866e5f4', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 56, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-24 16:23:12', '2022-07-24 16:23:12'),
('8ff104ff-6ada-4ef0-91a1-7a368769a6fb', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-24 16:23:19', '2022-07-24 16:23:19'),
('e077c3e2-f40f-46b7-864b-f189564dc5b6', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 54, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-24 16:23:53', '2022-07-24 16:23:53'),
('5c44decd-6224-4efe-8420-11a2afa95fdc', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-24 16:24:41', '2022-07-24 16:24:41'),
('9844c2bb-9c05-4274-b4d4-e66d10e58ffd', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-24 16:41:25', '2022-07-24 16:41:25'),
('9a7dd218-3f07-4a60-a0e6-117c25db0ba0', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-24 20:50:39', '2022-07-24 20:50:39'),
('075c2088-50f3-4f92-8e5e-a67e5a9b597a', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-24 21:18:29', '2022-07-24 21:18:29'),
('f8d37eb5-4d86-4697-a42b-a9d076a5dedb', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 68, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-24 21:40:59', '2022-07-24 21:40:59'),
('0755f64c-db94-4345-bc3b-6906f06baac6', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 63, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-24 21:41:10', '2022-07-24 21:41:10'),
('7045c6f9-a34f-4f14-8874-14859b180a0c', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 63, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-24 21:42:24', '2022-07-24 21:42:24'),
('b1ae8fa4-3070-42ae-9802-1c55d45efb46', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 68, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-24 21:43:28', '2022-07-24 21:43:28'),
('ea25d174-6a44-4389-a768-47eec48568ea', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 68, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-24 21:44:50', '2022-07-24 21:44:50'),
('4c7e9208-6e88-4058-858e-46f39d9a01ff', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-24 21:44:57', '2022-07-24 21:44:57'),
('769f7430-754b-490a-b351-8ff1a2a8f4cd', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-24 21:46:25', '2022-07-24 21:46:25'),
('7d7c1541-30b8-4fb1-bdd3-bd7d7a1dbe5a', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 68, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-24 21:47:41', '2022-07-24 21:47:41'),
('a74dcaa3-bd8a-43f7-a77d-2fc10a32faac', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 68, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-07-24 21:49:01', '2022-07-24 21:49:01'),
('7953f21f-d069-46ba-aa59-1f9de28efd5a', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-24 21:49:06', '2022-07-24 21:49:06'),
('eb0370c0-ac9c-40f2-ad6f-dc6e75f6ba97', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 68, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-24 21:53:03', '2022-07-24 21:53:03'),
('55c28346-8b80-4001-943b-a045efd6fb9f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 62, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-07-25 14:51:22', '2022-07-25 14:51:22'),
('692685dd-f100-4d74-9af8-d26160ef280a', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-10-30 02:38:51', '2022-10-30 02:38:51'),
('a225b394-94d1-4d06-b38e-f4f8e72992c7', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 31, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-10-30 04:13:54', '2022-10-30 04:13:54'),
('b17c0d1e-2f97-4f5b-8535-f1ebf160cbf0', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 25, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-10-30 04:40:54', '2022-10-30 04:40:54'),
('0a3f771b-f36f-4f90-9640-0a919a0cff90', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-10-30 07:23:12', '2022-10-30 07:23:12'),
('18e41570-5191-42ab-9a3a-2176d19d3191', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-11-01 06:04:30', '2022-11-01 06:04:30'),
('e59487dc-d587-43c2-8e13-5e466e694591', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-11-01 07:54:49', '2022-11-01 07:54:49'),
('9f0d9862-6ae3-46c7-a0f1-90f1c5349fc6', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-11-05 04:50:03', '2022-11-05 04:50:03'),
('82bbbd8c-af78-4494-b8e9-ef3b3946d44f', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 63, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-11-05 04:50:41', '2022-11-05 04:50:41'),
('5fbcd9ca-35e3-44da-ac41-1e92871ec8c4', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 63, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-11-05 04:54:42', '2022-11-05 04:54:42'),
('df3d970f-dcac-4592-b146-470231c85030', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-11-05 04:55:43', '2022-11-05 04:55:43'),
('e1e09d1f-5ff3-42fd-8735-a3f8876744f9', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 30, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-11-05 04:56:52', '2022-11-05 04:56:52'),
('db6b231c-f277-47e6-a1a3-24c5c316fcd4', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 58, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-11-05 04:57:15', '2022-11-05 04:57:15'),
('306cdcf9-1e13-44f7-9a8d-f0622f5af0a8', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 58, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-11-05 04:58:36', '2022-11-05 04:58:36'),
('7a5440be-c896-4aa4-8e4e-c8b238c4c0dd', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 57, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-11-05 04:58:44', '2022-11-05 04:58:44'),
('ba728ec1-6070-4ba8-8de5-e32d988a3838', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 57, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-11-05 04:59:00', '2022-11-05 04:59:00'),
('8eae5e3e-8abe-43cd-9c6d-50835cae49a7', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 41, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-11-14 03:49:05', '2022-11-14 03:49:05'),
('c40a6b6c-de9a-435d-9f3f-bec5062f577f', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 41, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-11-14 05:47:59', '2022-11-14 05:47:59'),
('c07051d5-3392-44ad-bdce-8bbc65f42d06', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 25, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-11-14 05:52:27', '2022-11-14 05:52:27'),
('4786373d-d576-4409-8a78-fddf6494d0af', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 25, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-11-14 07:13:55', '2022-11-14 07:13:55'),
('ec1c38c3-7f31-4f6d-9cce-75a366b9d848', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 36, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-11-14 07:14:05', '2022-11-14 07:14:05'),
('6c5e7f5f-a5b9-47d3-a5e3-cf751b8f8004', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 36, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-11-14 07:19:10', '2022-11-14 07:19:10'),
('7e98c7b2-079d-4224-9c09-ae5ab9b165cc', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 41, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-11-14 07:19:28', '2022-11-14 07:19:28'),
('ecc4b163-e68c-4a5c-9710-de3fdaa6e918', 'App\\Notifications\\LogoutNotification', 'App\\Models\\Customer', 41, '{\"msg\":\"You\'re loggedout successfully\",\"type\":\"loggedout\"}', NULL, '2022-11-14 07:50:23', '2022-11-14 07:50:23'),
('bae8d385-7589-4328-a78d-97a433bdd113', 'App\\Notifications\\LoginNotification', 'App\\Models\\Customer', 47, '{\"msg\":\"You\'re loggedin successfully\",\"type\":\"loggedin\"}', NULL, '2022-11-14 07:51:32', '2022-11-14 07:51:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` int(11) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jdpriddle@gmail.com', '$2y$10$0PLRNYrTkseWv5iZB7PwCuTwsddMw7pMFb3HeG9AHYyQS9fzlZAN.', '2022-07-20 17:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paypal` tinyint(1) NOT NULL DEFAULT 1,
  `paypal_live_mode` tinyint(1) NOT NULL DEFAULT 0,
  `stripe` tinyint(1) NOT NULL DEFAULT 1,
  `razorpay` tinyint(1) NOT NULL DEFAULT 1,
  `paystack` tinyint(1) NOT NULL DEFAULT 1,
  `ssl_commerz` tinyint(1) NOT NULL DEFAULT 1,
  `pay_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_settings`
--

INSERT INTO `payment_settings` (`id`, `paypal`, `paypal_live_mode`, `stripe`, `razorpay`, `paystack`, `ssl_commerz`, `pay_to`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 1, 0, 0, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.create', 'super_admin', 'admin', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(2, 'admin.view', 'super_admin', 'admin', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(3, 'admin.update', 'super_admin', 'admin', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(4, 'admin.delete', 'super_admin', 'admin', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(5, 'role.create', 'super_admin', 'role', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(6, 'role.view', 'super_admin', 'role', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(7, 'role.update', 'super_admin', 'role', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(8, 'role.delete', 'super_admin', 'role', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(9, 'ad.create', 'super_admin', 'ad', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(10, 'ad.view', 'super_admin', 'ad', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(11, 'ad.update', 'super_admin', 'ad', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(12, 'ad.delete', 'super_admin', 'ad', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(13, 'category.create', 'super_admin', 'category', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(14, 'category.view', 'super_admin', 'category', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(15, 'category.update', 'super_admin', 'category', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(16, 'category.delete', 'super_admin', 'category', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(17, 'subcategory.create', 'super_admin', 'category', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(18, 'subcategory.view', 'super_admin', 'category', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(19, 'subcategory.update', 'super_admin', 'category', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(20, 'subcategory.delete', 'super_admin', 'category', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(21, 'newsletter.view', 'super_admin', 'newsletter', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(22, 'newsletter.mailsend', 'super_admin', 'newsletter', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(23, 'newsletter.delete', 'super_admin', 'newsletter', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(24, 'brand.create', 'super_admin', 'brand', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(25, 'brand.view', 'super_admin', 'brand', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(26, 'brand.update', 'super_admin', 'brand', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(27, 'brand.delete', 'super_admin', 'brand', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(28, 'city.create', 'super_admin', 'Location', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(29, 'city.view', 'super_admin', 'Location', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(30, 'city.update', 'super_admin', 'Location', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(31, 'city.delete', 'super_admin', 'Location', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(32, 'town.create', 'super_admin', 'Location', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(33, 'town.view', 'super_admin', 'Location', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(34, 'town.update', 'super_admin', 'Location', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(35, 'town.delete', 'super_admin', 'Location', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(36, 'plan.create', 'super_admin', 'plan', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(37, 'plan.view', 'super_admin', 'plan', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(38, 'plan.update', 'super_admin', 'plan', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(39, 'plan.delete', 'super_admin', 'plan', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(40, 'postcategory.create', 'super_admin', 'Blog', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(41, 'postcategory.view', 'super_admin', 'Blog', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(42, 'postcategory.update', 'super_admin', 'Blog', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(43, 'postcategory.delete', 'super_admin', 'Blog', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(44, 'post.create', 'super_admin', 'Blog', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(45, 'post.view', 'super_admin', 'Blog', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(46, 'post.update', 'super_admin', 'Blog', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(47, 'post.delete', 'super_admin', 'Blog', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(48, 'tag.create', 'super_admin', 'Blog', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(49, 'tag.view', 'super_admin', 'Blog', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(50, 'tag.update', 'super_admin', 'Blog', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(51, 'tag.delete', 'super_admin', 'Blog', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(52, 'testimonial.create', 'super_admin', 'testimonial', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(53, 'testimonial.view', 'super_admin', 'testimonial', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(54, 'testimonial.update', 'super_admin', 'testimonial', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(55, 'testimonial.delete', 'super_admin', 'testimonial', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(56, 'faqcategory.create', 'super_admin', 'faq', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(57, 'faqcategory.view', 'super_admin', 'faq', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(58, 'faqcategory.update', 'super_admin', 'faq', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(59, 'faqcategory.delete', 'super_admin', 'faq', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(60, 'faq.create', 'super_admin', 'faq', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(61, 'faq.view', 'super_admin', 'faq', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(62, 'faq.update', 'super_admin', 'faq', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(63, 'faq.delete', 'super_admin', 'faq', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(64, 'customer.view', 'super_admin', 'others', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(65, 'setting.view', 'super_admin', 'others', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(66, 'setting.update', 'super_admin', 'others', '2022-04-02 06:06:48', '2022-04-02 06:06:48'),
(67, 'contact.view', 'super_admin', 'others', '2022-04-02 06:06:48', '2022-04-02 06:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `ad_limit` int(11) NOT NULL,
  `featured_limit` int(11) DEFAULT NULL,
  `customer_support` tinyint(1) DEFAULT NULL,
  `multiple_image` tinyint(1) NOT NULL DEFAULT 1,
  `badge` tinyint(1) DEFAULT NULL,
  `join_community_chat` tinyint(1) DEFAULT 0,
  `immediate_access_to_new_ads` tinyint(1) NOT NULL DEFAULT 0,
  `priority_situation` tinyint(1) NOT NULL DEFAULT 0,
  `embed_yt_video_and_links` tinyint(1) NOT NULL DEFAULT 0,
  `browse_without_banner_ads` int(1) NOT NULL DEFAULT 0,
  `recommended` tinyint(1) NOT NULL DEFAULT 0,
  `package_duration` int(11) DEFAULT NULL COMMENT '1 = lifetime, 2 = annuyally, 3 = monthly ',
  `new_featured` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `label`, `price`, `ad_limit`, `featured_limit`, `customer_support`, `multiple_image`, `badge`, `join_community_chat`, `immediate_access_to_new_ads`, `priority_situation`, `embed_yt_video_and_links`, `browse_without_banner_ads`, `recommended`, `package_duration`, `new_featured`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 0.00, 10, 999, 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, '[]', 1, NULL, '2022-11-05 04:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `author_id`, `title`, `slug`, `image`, `short_description`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Pirate Chain - The Ultimate Privacy Coin', 'pirate-chain-the-ultimate-privacy-coin', 'uploads/post/TibWH8WXaCx1cP3EgiWSj8ueSUDZtHAvDIXe3K5W.png', 'Pirate Chain is a digital privacy currency created in August 29th 2018.', '<h3><strong>What is Pirate Chain?</strong></h3><p>The goal was simple: to create a completely anonymous cryptocurrency that is secure, untraceable and keep the identity of those who transact with it anonymous. Developers of various cryptocurrencies came together to create Pirate Chain to show the world that it’s not only possible, but also necessary. It has been proven by government agencies and chain analysts that Bitcoin, as well as all of the other “privacy” cryptocurrencies, can be traced and data can be taken from them in order to find out who uses these currencies, how much they spend and who they transact with. Pirate Chain, on the other hand, has none of these issues, as it uses military grade encryption and delayed proof of work to make it the most secure and anonymous cryptocurrency in the world!How Pirate Chain Works</p><p>Written in the code of Pirate Chain is a vast treasure chest (pun intended) of cryptocurrency firsts, along with a secure way to prevent hostile attacks on the chain and keep user’s transaction data private. Pirate Chain does not leak any transaction meta data, allowing every transaction to stay private. Proof of this is given on the block explorer (the place where you can see the transactions that occur. All cryptocurrencies have one). When you view the block explorer, you will notice that transactions occur, but the addresses they are sent from are not there, the addresses they are sent to are not there, and the amount transacted is not shown, only the transaction fee. This is one of many proofs that show users that their data is safe and private.</p><p>Mining Pirate Chain works very similarly to how Bitcoin mining works (which was talked about in Part II of this series). The key difference between them is that Pirate Chain mining is private, not allowing anyone to see how much was mined per address on the block explorer. This allows users to feel confident that whether they are transacting with others, mining or purchasing things, no data is compromised. Nobody is able to see how much you have in your wallet or trace anything back to you. Simply put, it works exactly how privacy should work, what’s your is yours and not visible to anyone but you.</p><h3>Who Created Pirate Chain?</h3><p>Pirate Chain was created and is continuously developed by many people, including the lead developer of the Komodo Platform, Bitcoin contributors, ZCash developers and way more. All of which have contributed to Pirate Chain on their own time without any financial incentive aside from building the world’s most private and secure cryptocurrency. They believe that financial privacy is a human right that should not be infringed on. In fact, this message is so powerful and resonates among so many people, Pirate Chain has various developers of a wide variety of backgrounds (web developers, app developers, writers, store owners, streamers, etc) to help with adoption and bringing it to the mainstream.</p><p>&nbsp;</p><h3><strong>Why Do I Need Financial Privacy?</strong></h3><p>Financial privacy has been constantly chipped away over the years, to a point where someone always knows how much money you have, what you spend it on, where you shop and so much more it makes you shudder just thinking about it. Even if you try to transact only in cash, you need a bank account to store it (unless you feel safe carrying all of your money with you, which is most likely not the case). Your right to privacy with these institutions is completely gone and your data is sold to the highest bidder.&nbsp;</p><h2><strong>Pirate Chain vs Bitcoin</strong></h2><p>Bitcoin, while used as a store of value, underperforms Pirate Chain in many aspects. First, Bitcoin uses a public ledger. This allows everyone to see who you transact with, how much you sent/received and when the transaction happened.&nbsp;Pirate Chain removes this information and doesn’t allow anyone to see it. Bitcoin is slow and can take hours to confirm, while Pirate takes a very small fraction of that time. Bitcoin has a large barrier of entry if you try to mine it; Pirate has a low bar of entry and you can even earn some if you tweet about them, help develop the ecosystem and take part in the community!</p><p>&nbsp;</p><h3><strong>Can I actually use Pirate Chain to buy things?</strong></h3><p>Of course! There are many shops that already accept Pirate Chain as a form of payment, from Art, Services and Gift Cards, to Clothes, Software and more by the day! Various streamers, youtubers, and other social media users/content providers are accepting Pirate Chain as tips, donations and payments! Pirate Chain has laid down a massive foundation for it’s success and adoption, and as time goes on and people start realizing that their own financial privacy is more important than they thought, the more stores/services and people adopt Pirate Chain!</p>', '2022-06-29 03:30:38', '2022-06-29 03:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Cryptocurrency', 'cryptocurrency', 'uploads/post/category/xua9fa58U1awI0cY6SyLnPrX66xiMsqorgENu06O.png', '2022-06-29 03:26:38', '2022-06-29 03:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_from_id` bigint(20) UNSIGNED NOT NULL,
  `report_to_id` bigint(20) UNSIGNED NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `report_from_id`, `report_to_id`, `reason`, `created_at`, `updated_at`) VALUES
(1, 41, 47, 'sdfasd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stars` int(11) NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `stars`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 5, 'sdfafdsajfsdkfj asdf', 1, NULL, NULL),
(2, 41, 4, 'sdfasd', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'super_admin', '2022-04-02 06:06:47', '2022-04-02 06:06:47'),
(2, 'Admin', 'super_admin', '2022-07-01 22:40:41', '2022-07-01 22:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(21, 1),
(22, 1),
(23, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkdin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `android` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ios` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discord` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_css` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_script` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_script` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free_featured_ad_limit` int(11) NOT NULL DEFAULT 3,
  `regular_ads_homepage` tinyint(1) NOT NULL DEFAULT 0,
  `featured_ads_homepage` tinyint(1) NOT NULL DEFAULT 1,
  `customer_email_verification` tinyint(1) NOT NULL DEFAULT 0,
  `ads_admin_approval` tinyint(1) NOT NULL DEFAULT 0,
  `free_ad_limit` int(11) NOT NULL DEFAULT 5,
  `sidebar_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nav_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `default_layout` tinyint(1) NOT NULL DEFAULT 1,
  `website_loader` tinyint(1) NOT NULL DEFAULT 1,
  `loader_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seo_meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_expire_day` int(11) DEFAULT NULL,
  `ads_expire_notify` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `map_address`, `facebook`, `twitter`, `instagram`, `youtube`, `telegam`, `linkdin`, `android`, `ios`, `discord`, `whatsapp`, `logo_image`, `logo_image2`, `favicon_image`, `header_css`, `header_script`, `body_script`, `free_featured_ad_limit`, `regular_ads_homepage`, `featured_ads_homepage`, `customer_email_verification`, `ads_admin_approval`, `free_ad_limit`, `sidebar_color`, `nav_color`, `dark_mode`, `default_layout`, `website_loader`, `loader_image`, `created_at`, `updated_at`, `seo_meta_title`, `seo_meta_description`, `seo_meta_keywords`, `ads_expire_day`, `ads_expire_notify`) VALUES
(1, 'info@exchangeanything.com', 'no phone', 'no address', 'no map', 'https://facebook.com', 'https://twitter.com', NULL, 'https://www.youtube.com', NULL, NULL, 'https://play.google.com/store/apps/details?id=com.zakirsoft', 'https://play.google.com/store/apps/details?id=com.zakirsoft', NULL, NULL, 'uploads/website\\Ohgw8gqIcxG6e06XLTJpu689SnblOexzY7UY7nlf.png', 'uploads/website\\2zvQj73RDHSOImsKDUTiqpVTlFJ8XgcUHDRLhFGQ.png', 'uploads/website\\UMx4UYOpcPh1imctJwDOPyFDl532lZE06VDNBL8h.png', NULL, NULL, NULL, 1, 0, 1, 0, 0, 3, 'rgba(14, 3, 41, 1)', 'rgba(255, 255, 255, 1)', 0, 1, 0, NULL, '2022-04-02 06:06:48', '2022-10-29 22:27:21', 'test', 'set', 'est', 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_settings`
--

CREATE TABLE `social_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google` tinyint(1) NOT NULL DEFAULT 1,
  `facebook` tinyint(1) NOT NULL DEFAULT 1,
  `twitter` tinyint(1) NOT NULL DEFAULT 1,
  `linkedin` tinyint(1) NOT NULL DEFAULT 1,
  `github` tinyint(1) NOT NULL DEFAULT 1,
  `gitlab` tinyint(1) NOT NULL DEFAULT 1,
  `bitbucket` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_settings`
--

INSERT INTO `social_settings` (`id`, `google`, `facebook`, `twitter`, `linkedin`, `github`, `gitlab`, `bitbucket`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, '2022-04-02 06:06:48', '2022-04-02 06:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'SIM Cards', 'sim-cards', 1, '2022-04-06 01:35:44', '2022-06-08 07:38:46'),
(2, 1, 'Mobile Phones', 'mobile-phones', 1, '2022-04-06 01:35:49', '2022-04-06 01:37:11'),
(3, 1, 'Wearables', 'wearables', 1, '2022-04-06 01:35:59', '2022-04-06 01:37:20'),
(4, 1, 'Mobile Phone Services', 'mobile-phone-services', 1, '2022-04-06 01:36:08', '2022-04-06 01:37:45'),
(5, 2, 'Watches', 'watches', 1, '2022-04-06 01:38:12', '2022-04-06 01:38:12'),
(6, 2, 'Footwear', 'footwear', 1, '2022-04-06 01:38:18', '2022-04-06 01:38:18'),
(7, 2, 'Grooming & Bodycare', 'grooming-bodycare', 1, '2022-04-06 01:38:24', '2022-04-06 01:38:24'),
(8, 2, 'Bags & Accessories', 'bags-accessories', 1, '2022-04-06 01:38:30', '2022-04-06 01:38:30'),
(9, 2, 'Traditional Clothing', 'traditional-clothing', 1, '2022-04-06 01:38:36', '2022-04-06 01:38:36'),
(10, 2, 'Shirts & T-Shirts', 'shirts-t-shirts', 1, '2022-04-06 01:38:42', '2022-04-06 01:38:42'),
(11, 2, 'Wholesale - Bulk', 'wholesale-bulk', 1, '2022-04-06 01:38:54', '2022-04-06 01:38:54'),
(12, 3, 'Motorbikes', 'motorbikes', 1, '2022-04-06 01:39:16', '2022-04-06 01:39:16'),
(13, 3, 'Cars', 'cars', 1, '2022-04-06 01:39:22', '2022-04-06 01:39:22'),
(14, 3, 'Bicycles', 'bicycles', 1, '2022-04-06 01:39:28', '2022-04-06 01:39:28'),
(15, 3, 'Auto Parts & Accessories', 'auto-parts-accessories', 1, '2022-04-06 01:39:37', '2022-04-06 01:39:37'),
(17, 3, 'Water Transport', 'water-transport', 1, '2022-04-06 01:39:50', '2022-04-06 01:39:50'),
(18, 3, 'Buses', 'buses', 1, '2022-04-06 01:39:56', '2022-04-06 01:39:56'),
(19, 4, 'Laptops', 'laptops', 1, '2022-04-06 01:40:09', '2022-04-06 01:40:09'),
(20, 4, 'Desktop Computers', 'desktop-computers', 1, '2022-04-06 01:40:15', '2022-04-06 01:40:15'),
(21, 4, 'TVs', 'tvs', 1, '2022-04-06 01:40:24', '2022-04-06 01:40:24'),
(22, 4, 'Audio & Sound Systems', 'audio-sound-systems', 1, '2022-04-06 01:40:31', '2022-07-01 20:51:23'),
(23, 4, 'Cameras, Camcorders & Accessories', 'cameras-camcorders-accessories', 1, '2022-04-06 01:40:37', '2022-04-06 01:40:37'),
(24, 4, 'Other Electronics', 'other-electronics', 1, '2022-04-06 01:40:43', '2022-04-06 01:40:43'),
(25, 5, 'Grocery', 'grocery', 1, '2022-04-06 01:41:07', '2022-04-06 01:41:07'),
(26, 5, 'Healthcare', 'healthcare', 1, '2022-04-06 01:41:14', '2022-04-06 01:41:14'),
(27, 5, 'Fruits & Vegetables', 'fruits-vegetables', 1, '2022-04-06 01:41:19', '2022-04-06 01:41:19'),
(28, 5, 'Other Essentials', 'other-essentials', 1, '2022-04-06 01:41:25', '2022-04-06 01:41:25'),
(29, 5, 'Meat & Seafood', 'meat-seafood', 1, '2022-04-06 01:41:32', '2022-04-06 01:41:32'),
(30, 6, 'Musical Instruments', 'musical-instruments', 1, '2022-04-06 01:41:41', '2022-04-06 01:41:41'),
(31, 6, 'Fitness & Gym', 'fitness-gym', 1, '2022-04-06 01:41:47', '2022-04-06 01:41:47'),
(32, 6, 'Sports', 'sports', 1, '2022-04-06 01:41:56', '2022-04-06 01:41:56'),
(33, 6, 'Other Hobby, Sport & Kids items', 'other-hobby-sport-kids-items', 1, '2022-04-06 01:42:06', '2022-04-06 01:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `super_admins`
--

CREATE TABLE `super_admins` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backend/image/default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_admins`
--

INSERT INTO `super_admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2022-04-02 06:06:48', '$2y$10$lvuKcw/YJBHfsyzvPgjPa.hgijcwFMLnobD4FELsjyO/.nqrkcq9e', 'uploads/user\\gq2slWOxn0HYo8e8isVvg6QLnGncNle1N4VJs8JP.png', 'WCq50ds05cU3yJFkBawOzPr2fmlJbBIvWWtmUuajOvpCAJUtuSTB1v5ZnsKQ', '2022-04-02 06:06:48', '2022-07-06 18:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stars` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_page` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `home_page`, `created_at`, `updated_at`) VALUES
(1, 3, '2022-04-02 06:06:48', '2022-04-09 10:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`id`, `value`) VALUES
(1, 'Africa/Abidjan'),
(2, 'Africa/Accra'),
(3, 'Africa/Addis_Ababa'),
(4, 'Africa/Algiers'),
(5, 'Africa/Asmara'),
(6, 'Africa/Bamako'),
(7, 'Africa/Bangui'),
(8, 'Africa/Banjul'),
(9, 'Africa/Bissau'),
(10, 'Africa/Blantyre'),
(11, 'Africa/Brazzaville'),
(12, 'Africa/Bujumbura'),
(13, 'Africa/Cairo'),
(14, 'Africa/Casablanca'),
(15, 'Africa/Ceuta'),
(16, 'Africa/Conakry'),
(17, 'Africa/Dakar'),
(18, 'Africa/Dar_es_Salaam'),
(19, 'Africa/Djibouti'),
(20, 'Africa/Douala'),
(21, 'Africa/El_Aaiun'),
(22, 'Africa/Freetown'),
(23, 'Africa/Gaborone'),
(24, 'Africa/Harare'),
(25, 'Africa/Johannesburg'),
(26, 'Africa/Juba'),
(27, 'Africa/Kampala'),
(28, 'Africa/Khartoum'),
(29, 'Africa/Kigali'),
(30, 'Africa/Kinshasa'),
(31, 'Africa/Lagos'),
(32, 'Africa/Libreville'),
(33, 'Africa/Lome'),
(34, 'Africa/Luanda'),
(35, 'Africa/Lubumbashi'),
(36, 'Africa/Lusaka'),
(37, 'Africa/Malabo'),
(38, 'Africa/Maputo'),
(39, 'Africa/Maseru'),
(40, 'Africa/Mbabane'),
(41, 'Africa/Mogadishu'),
(42, 'Africa/Monrovia'),
(43, 'Africa/Nairobi'),
(44, 'Africa/Ndjamena'),
(45, 'Africa/Niamey'),
(46, 'Africa/Nouakchott'),
(47, 'Africa/Ouagadougou'),
(48, 'Africa/Porto-Novo'),
(49, 'Africa/Sao_Tome'),
(50, 'Africa/Tripoli'),
(51, 'Africa/Tunis'),
(52, 'Africa/Windhoek'),
(53, 'America/Adak'),
(54, 'America/Anchorage'),
(55, 'America/Anguilla'),
(56, 'America/Antigua'),
(57, 'America/Araguaina'),
(58, 'America/Argentina/Buenos_Aires'),
(59, 'America/Argentina/Catamarca'),
(60, 'America/Argentina/Cordoba'),
(61, 'America/Argentina/Jujuy'),
(62, 'America/Argentina/La_Rioja'),
(63, 'America/Argentina/Mendoza'),
(64, 'America/Argentina/Rio_Gallegos'),
(65, 'America/Argentina/Salta'),
(66, 'America/Argentina/San_Juan'),
(67, 'America/Argentina/San_Luis'),
(68, 'America/Argentina/Tucuman'),
(69, 'America/Argentina/Ushuaia'),
(70, 'America/Aruba'),
(71, 'America/Asuncion'),
(72, 'America/Atikokan'),
(73, 'America/Bahia'),
(74, 'America/Bahia_Banderas'),
(75, 'America/Barbados'),
(76, 'America/Belem'),
(77, 'America/Belize'),
(78, 'America/Blanc-Sablon'),
(79, 'America/Boa_Vista'),
(80, 'America/Bogota'),
(81, 'America/Boise'),
(82, 'America/Cambridge_Bay'),
(83, 'America/Campo_Grande'),
(84, 'America/Cancun'),
(85, 'America/Caracas'),
(86, 'America/Cayenne'),
(87, 'America/Cayman'),
(88, 'America/Chicago'),
(89, 'America/Chihuahua'),
(90, 'America/Costa_Rica'),
(91, 'America/Creston'),
(92, 'America/Cuiaba'),
(93, 'America/Curacao'),
(94, 'America/Danmarkshavn'),
(95, 'America/Dawson'),
(96, 'America/Dawson_Creek'),
(97, 'America/Denver'),
(98, 'America/Detroit'),
(99, 'America/Dominica'),
(100, 'America/Edmonton'),
(101, 'America/Eirunepe'),
(102, 'America/El_Salvador'),
(103, 'America/Fort_Nelson'),
(104, 'America/Fortaleza'),
(105, 'America/Glace_Bay'),
(106, 'America/Goose_Bay'),
(107, 'America/Grand_Turk'),
(108, 'America/Grenada'),
(109, 'America/Guadeloupe'),
(110, 'America/Guatemala'),
(111, 'America/Guayaquil'),
(112, 'America/Guyana'),
(113, 'America/Halifax'),
(114, 'America/Havana'),
(115, 'America/Hermosillo'),
(116, 'America/Indiana/Indianapolis'),
(117, 'America/Indiana/Knox'),
(118, 'America/Indiana/Marengo'),
(119, 'America/Indiana/Petersburg'),
(120, 'America/Indiana/Tell_City'),
(121, 'America/Indiana/Vevay'),
(122, 'America/Indiana/Vincennes'),
(123, 'America/Indiana/Winamac'),
(124, 'America/Inuvik'),
(125, 'America/Iqaluit'),
(126, 'America/Jamaica'),
(127, 'America/Juneau'),
(128, 'America/Kentucky/Louisville'),
(129, 'America/Kentucky/Monticello'),
(130, 'America/Kralendijk'),
(131, 'America/La_Paz'),
(132, 'America/Lima'),
(133, 'America/Los_Angeles'),
(134, 'America/Lower_Princes'),
(135, 'America/Maceio'),
(136, 'America/Managua'),
(137, 'America/Manaus'),
(138, 'America/Marigot'),
(139, 'America/Martinique'),
(140, 'America/Matamoros'),
(141, 'America/Mazatlan'),
(142, 'America/Menominee'),
(143, 'America/Merida'),
(144, 'America/Metlakatla'),
(145, 'America/Mexico_City'),
(146, 'America/Miquelon'),
(147, 'America/Moncton'),
(148, 'America/Monterrey'),
(149, 'America/Montevideo'),
(150, 'America/Montserrat'),
(151, 'America/Nassau'),
(152, 'America/New_York'),
(153, 'America/Nipigon'),
(154, 'America/Nome'),
(155, 'America/Noronha'),
(156, 'America/North_Dakota/Beulah'),
(157, 'America/North_Dakota/Center'),
(158, 'America/North_Dakota/New_Salem'),
(159, 'America/Nuuk'),
(160, 'America/Ojinaga'),
(161, 'America/Panama'),
(162, 'America/Pangnirtung'),
(163, 'America/Paramaribo'),
(164, 'America/Phoenix'),
(165, 'America/Port-au-Prince'),
(166, 'America/Port_of_Spain'),
(167, 'America/Porto_Velho'),
(168, 'America/Puerto_Rico'),
(169, 'America/Punta_Arenas'),
(170, 'America/Rainy_River'),
(171, 'America/Rankin_Inlet'),
(172, 'America/Recife'),
(173, 'America/Regina'),
(174, 'America/Resolute'),
(175, 'America/Rio_Branco'),
(176, 'America/Santarem'),
(177, 'America/Santiago'),
(178, 'America/Santo_Domingo'),
(179, 'America/Sao_Paulo'),
(180, 'America/Scoresbysund'),
(181, 'America/Sitka'),
(182, 'America/St_Barthelemy'),
(183, 'America/St_Johns'),
(184, 'America/St_Kitts'),
(185, 'America/St_Lucia'),
(186, 'America/St_Thomas'),
(187, 'America/St_Vincent'),
(188, 'America/Swift_Current'),
(189, 'America/Tegucigalpa'),
(190, 'America/Thule'),
(191, 'America/Thunder_Bay'),
(192, 'America/Tijuana'),
(193, 'America/Toronto'),
(194, 'America/Tortola'),
(195, 'America/Vancouver'),
(196, 'America/Whitehorse'),
(197, 'America/Winnipeg'),
(198, 'America/Yakutat'),
(199, 'America/Yellowknife'),
(200, 'Antarctica/Casey'),
(201, 'Antarctica/Davis'),
(202, 'Antarctica/DumontDUrville'),
(203, 'Antarctica/Macquarie'),
(204, 'Antarctica/Mawson'),
(205, 'Antarctica/McMurdo'),
(206, 'Antarctica/Palmer'),
(207, 'Antarctica/Rothera'),
(208, 'Antarctica/Syowa'),
(209, 'Antarctica/Troll'),
(210, 'Antarctica/Vostok'),
(211, 'Arctic/Longyearbyen'),
(212, 'Asia/Aden'),
(213, 'Asia/Almaty'),
(214, 'Asia/Amman'),
(215, 'Asia/Anadyr'),
(216, 'Asia/Aqtau'),
(217, 'Asia/Aqtobe'),
(218, 'Asia/Ashgabat'),
(219, 'Asia/Atyrau'),
(220, 'Asia/Baghdad'),
(221, 'Asia/Bahrain'),
(222, 'Asia/Baku'),
(223, 'Asia/Bangkok'),
(224, 'Asia/Barnaul'),
(225, 'Asia/Beirut'),
(226, 'Asia/Bishkek'),
(227, 'Asia/Brunei'),
(228, 'Asia/Chita'),
(229, 'Asia/Choibalsan'),
(230, 'Asia/Colombo'),
(231, 'Asia/Damascus'),
(232, 'Asia/Dhaka'),
(233, 'Asia/Dili'),
(234, 'Asia/Dubai'),
(235, 'Asia/Dushanbe'),
(236, 'Asia/Famagusta'),
(237, 'Asia/Gaza'),
(238, 'Asia/Hebron'),
(239, 'Asia/Ho_Chi_Minh'),
(240, 'Asia/Hong_Kong'),
(241, 'Asia/Hovd'),
(242, 'Asia/Irkutsk'),
(243, 'Asia/Jakarta'),
(244, 'Asia/Jayapura'),
(245, 'Asia/Jerusalem'),
(246, 'Asia/Kabul'),
(247, 'Asia/Kamchatka'),
(248, 'Asia/Karachi'),
(249, 'Asia/Kathmandu'),
(250, 'Asia/Khandyga'),
(251, 'Asia/Kolkata'),
(252, 'Asia/Krasnoyarsk'),
(253, 'Asia/Kuala_Lumpur'),
(254, 'Asia/Kuching'),
(255, 'Asia/Kuwait'),
(256, 'Asia/Macau'),
(257, 'Asia/Magadan'),
(258, 'Asia/Makassar'),
(259, 'Asia/Manila'),
(260, 'Asia/Muscat'),
(261, 'Asia/Nicosia'),
(262, 'Asia/Novokuznetsk'),
(263, 'Asia/Novosibirsk'),
(264, 'Asia/Omsk'),
(265, 'Asia/Oral'),
(266, 'Asia/Phnom_Penh'),
(267, 'Asia/Pontianak'),
(268, 'Asia/Pyongyang'),
(269, 'Asia/Qatar'),
(270, 'Asia/Qostanay'),
(271, 'Asia/Qyzylorda'),
(272, 'Asia/Riyadh'),
(273, 'Asia/Sakhalin'),
(274, 'Asia/Samarkand'),
(275, 'Asia/Seoul'),
(276, 'Asia/Shanghai'),
(277, 'Asia/Singapore'),
(278, 'Asia/Srednekolymsk'),
(279, 'Asia/Taipei'),
(280, 'Asia/Tashkent'),
(281, 'Asia/Tbilisi'),
(282, 'Asia/Tehran'),
(283, 'Asia/Thimphu'),
(284, 'Asia/Tokyo'),
(285, 'Asia/Tomsk'),
(286, 'Asia/Ulaanbaatar'),
(287, 'Asia/Urumqi'),
(288, 'Asia/Ust-Nera'),
(289, 'Asia/Vientiane'),
(290, 'Asia/Vladivostok'),
(291, 'Asia/Yakutsk'),
(292, 'Asia/Yangon'),
(293, 'Asia/Yekaterinburg'),
(294, 'Asia/Yerevan'),
(295, 'Atlantic/Azores'),
(296, 'Atlantic/Bermuda'),
(297, 'Atlantic/Canary'),
(298, 'Atlantic/Cape_Verde'),
(299, 'Atlantic/Faroe'),
(300, 'Atlantic/Madeira'),
(301, 'Atlantic/Reykjavik'),
(302, 'Atlantic/South_Georgia'),
(303, 'Atlantic/St_Helena'),
(304, 'Atlantic/Stanley'),
(305, 'Australia/Adelaide'),
(306, 'Australia/Brisbane'),
(307, 'Australia/Broken_Hill'),
(308, 'Australia/Darwin'),
(309, 'Australia/Eucla'),
(310, 'Australia/Hobart'),
(311, 'Australia/Lindeman'),
(312, 'Australia/Lord_Howe'),
(313, 'Australia/Melbourne'),
(314, 'Australia/Perth'),
(315, 'Australia/Sydney'),
(316, 'Europe/Amsterdam'),
(317, 'Europe/Andorra'),
(318, 'Europe/Astrakhan'),
(319, 'Europe/Athens'),
(320, 'Europe/Belgrade'),
(321, 'Europe/Berlin'),
(322, 'Europe/Bratislava'),
(323, 'Europe/Brussels'),
(324, 'Europe/Bucharest'),
(325, 'Europe/Budapest'),
(326, 'Europe/Busingen'),
(327, 'Europe/Chisinau'),
(328, 'Europe/Copenhagen'),
(329, 'Europe/Dublin'),
(330, 'Europe/Gibraltar'),
(331, 'Europe/Guernsey'),
(332, 'Europe/Helsinki'),
(333, 'Europe/Isle_of_Man'),
(334, 'Europe/Istanbul'),
(335, 'Europe/Jersey'),
(336, 'Europe/Kaliningrad'),
(337, 'Europe/Kiev'),
(338, 'Europe/Kirov'),
(339, 'Europe/Lisbon'),
(340, 'Europe/Ljubljana'),
(341, 'Europe/London'),
(342, 'Europe/Luxembourg'),
(343, 'Europe/Madrid'),
(344, 'Europe/Malta'),
(345, 'Europe/Mariehamn'),
(346, 'Europe/Minsk'),
(347, 'Europe/Monaco'),
(348, 'Europe/Moscow'),
(349, 'Europe/Oslo'),
(350, 'Europe/Paris'),
(351, 'Europe/Podgorica'),
(352, 'Europe/Prague'),
(353, 'Europe/Riga'),
(354, 'Europe/Rome'),
(355, 'Europe/Samara'),
(356, 'Europe/San_Marino'),
(357, 'Europe/Sarajevo'),
(358, 'Europe/Saratov'),
(359, 'Europe/Simferopol'),
(360, 'Europe/Skopje'),
(361, 'Europe/Sofia'),
(362, 'Europe/Stockholm'),
(363, 'Europe/Tallinn'),
(364, 'Europe/Tirane'),
(365, 'Europe/Ulyanovsk'),
(366, 'Europe/Uzhgorod'),
(367, 'Europe/Vaduz'),
(368, 'Europe/Vatican'),
(369, 'Europe/Vienna'),
(370, 'Europe/Vilnius'),
(371, 'Europe/Volgograd'),
(372, 'Europe/Warsaw'),
(373, 'Europe/Zagreb'),
(374, 'Europe/Zaporozhye'),
(375, 'Europe/Zurich'),
(376, 'Indian/Antananarivo'),
(377, 'Indian/Chagos'),
(378, 'Indian/Christmas'),
(379, 'Indian/Cocos'),
(380, 'Indian/Comoro'),
(381, 'Indian/Kerguelen'),
(382, 'Indian/Mahe'),
(383, 'Indian/Maldives'),
(384, 'Indian/Mauritius'),
(385, 'Indian/Mayotte'),
(386, 'Indian/Reunion'),
(387, 'Pacific/Apia'),
(388, 'Pacific/Auckland'),
(389, 'Pacific/Bougainville'),
(390, 'Pacific/Chatham'),
(391, 'Pacific/Chuuk'),
(392, 'Pacific/Easter'),
(393, 'Pacific/Efate'),
(394, 'Pacific/Fakaofo'),
(395, 'Pacific/Fiji'),
(396, 'Pacific/Funafuti'),
(397, 'Pacific/Galapagos'),
(398, 'Pacific/Gambier'),
(399, 'Pacific/Guadalcanal'),
(400, 'Pacific/Guam'),
(401, 'Pacific/Honolulu'),
(402, 'Pacific/Kanton'),
(403, 'Pacific/Kiritimati'),
(404, 'Pacific/Kosrae'),
(405, 'Pacific/Kwajalein'),
(406, 'Pacific/Majuro'),
(407, 'Pacific/Marquesas'),
(408, 'Pacific/Midway'),
(409, 'Pacific/Nauru'),
(410, 'Pacific/Niue'),
(411, 'Pacific/Norfolk'),
(412, 'Pacific/Noumea'),
(413, 'Pacific/Pago_Pago'),
(414, 'Pacific/Palau'),
(415, 'Pacific/Pitcairn'),
(416, 'Pacific/Pohnpei'),
(417, 'Pacific/Port_Moresby'),
(418, 'Pacific/Rarotonga'),
(419, 'Pacific/Saipan'),
(420, 'Pacific/Tahiti'),
(421, 'Pacific/Tarawa'),
(422, 'Pacific/Tongatapu'),
(423, 'Pacific/Wake'),
(424, 'Pacific/Wallis'),
(425, 'UTC');

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE `towns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `towns`
--

INSERT INTO `towns` (`id`, `city_id`, `name`, `created_at`, `updated_at`) VALUES
(11, 193, 'Bath and North East Somerset', '2022-06-24 19:12:37', '2022-06-24 19:12:37'),
(12, 193, 'Bedfordshire', '2022-06-24 19:13:07', '2022-06-24 19:13:07'),
(13, 193, 'Berkshire', '2022-06-24 19:13:43', '2022-06-24 19:13:43'),
(14, 193, 'Bristol', '2022-06-24 19:14:06', '2022-06-24 19:14:06'),
(15, 193, 'Buckinghamshire', '2022-06-24 19:14:31', '2022-06-24 19:14:31'),
(16, 193, 'Cambridgeshire', '2022-06-24 19:20:41', '2022-06-24 19:20:41'),
(17, 193, 'Cheshire', '2022-06-24 19:22:26', '2022-06-24 19:22:26'),
(18, 193, 'Cornwall', '2022-06-24 19:22:53', '2022-06-24 19:22:53'),
(19, 193, 'County Durham', '2022-06-24 19:24:08', '2022-06-24 19:24:08'),
(20, 193, 'Cumbria', '2022-06-24 19:26:15', '2022-06-24 19:26:15'),
(21, 193, 'Derbyshire', '2022-06-24 19:26:44', '2022-06-24 19:26:44'),
(22, 193, 'Devon', '2022-06-24 19:28:59', '2022-06-24 19:28:59'),
(23, 193, 'Dorset', '2022-06-24 19:29:34', '2022-06-24 19:29:34'),
(24, 193, 'East Riding of Yorkshire', '2022-06-24 19:31:52', '2022-06-24 19:31:52'),
(25, 193, 'East Sussex', '2022-06-24 19:36:16', '2022-06-24 19:36:16'),
(26, 193, 'Essex', '2022-06-24 19:36:41', '2022-06-24 19:36:41'),
(27, 193, 'Gloucestershire', '2022-06-24 19:37:03', '2022-06-24 19:37:03'),
(28, 193, 'Greater London', '2022-06-24 19:37:31', '2022-06-24 19:37:31'),
(29, 193, 'Greater Manchester', '2022-06-24 19:38:17', '2022-06-24 19:38:17'),
(30, 193, 'Hampshire', '2022-06-24 19:38:36', '2022-06-24 19:38:36'),
(31, 193, 'Herefordshire', '2022-06-24 19:39:36', '2022-06-24 19:39:36'),
(32, 193, 'Hertfordshire', '2022-06-24 19:41:34', '2022-06-24 19:41:34'),
(33, 193, 'Isle of Wight', '2022-06-24 19:41:56', '2022-06-24 19:41:56'),
(34, 193, 'Isles of Scilly', '2022-06-24 19:42:20', '2022-06-24 19:42:20'),
(35, 193, 'Kent', '2022-06-24 19:42:40', '2022-06-24 19:42:40'),
(36, 193, 'Lancashire', '2022-06-24 19:42:58', '2022-06-24 19:42:58'),
(37, 193, 'Leicestershire', '2022-06-24 19:43:16', '2022-06-24 19:43:16'),
(38, 193, 'Lincolnshire', '2022-06-24 19:44:20', '2022-06-24 19:44:20'),
(39, 193, 'Merseyside', '2022-06-24 19:44:43', '2022-06-24 19:44:43'),
(40, 193, 'Norfolk', '2022-06-24 19:45:03', '2022-06-24 19:45:03'),
(41, 193, 'North Somerset', '2022-06-24 19:45:25', '2022-06-24 19:45:25'),
(42, 193, 'North Yorkshire', '2022-06-24 19:45:43', '2022-06-24 19:45:43'),
(43, 193, 'Northamptonshire', '2022-06-24 19:46:03', '2022-06-24 19:46:03'),
(44, 193, 'Northumberland', '2022-06-24 19:46:24', '2022-06-24 19:46:24'),
(45, 193, 'Nottinghamshire', '2022-06-24 19:46:44', '2022-06-24 19:46:44'),
(46, 193, 'Oxfordshire', '2022-06-24 19:47:04', '2022-06-24 19:47:04'),
(47, 193, 'Rutland', '2022-06-24 19:47:40', '2022-06-24 19:47:40'),
(48, 193, 'Shropshire', '2022-06-24 19:48:09', '2022-06-24 19:48:09'),
(49, 193, 'South Gloucestershire', '2022-06-24 19:49:01', '2022-06-24 19:49:01'),
(50, 193, 'South Yorkshire', '2022-06-24 19:49:20', '2022-06-24 19:49:20'),
(51, 193, 'Staffordshire', '2022-06-24 19:49:37', '2022-06-24 19:49:37'),
(52, 193, 'Suffolk', '2022-06-24 19:49:59', '2022-06-24 19:49:59'),
(53, 193, 'Surrey', '2022-06-24 19:50:23', '2022-06-24 19:50:23'),
(54, 193, 'Tyne & Wear', '2022-06-24 19:50:54', '2022-06-24 19:50:54'),
(55, 193, 'Warwickshire', '2022-06-24 19:51:38', '2022-06-24 19:51:38'),
(56, 193, 'West Midlands', '2022-06-24 19:52:04', '2022-06-24 19:52:04'),
(57, 193, 'West Sussex', '2022-06-24 19:52:29', '2022-06-24 19:52:29'),
(58, 193, 'West Yorkshire', '2022-06-24 19:52:54', '2022-06-24 19:52:54'),
(59, 193, 'Wiltshire', '2022-06-24 19:53:13', '2022-06-24 19:53:13'),
(60, 193, 'Worcestershire', '2022-06-24 19:53:33', '2022-06-24 19:53:33'),
(61, 194, 'Alabama', '2022-06-29 01:29:11', '2022-06-29 01:29:11'),
(62, 194, 'Alaska', '2022-06-29 01:29:31', '2022-06-29 01:29:31'),
(63, 194, 'Arizona', '2022-06-29 01:30:00', '2022-06-29 01:30:00'),
(64, 194, 'Arkansas', '2022-06-29 01:30:16', '2022-06-29 01:30:16'),
(65, 194, 'California', '2022-06-29 01:30:34', '2022-06-29 01:30:34'),
(66, 194, 'Colorado', '2022-06-29 01:30:53', '2022-06-29 01:30:53'),
(67, 194, 'Connecticut', '2022-06-29 01:31:13', '2022-06-29 01:31:13'),
(68, 194, 'Delaware', '2022-06-29 01:31:38', '2022-06-29 01:31:38'),
(69, 194, 'Florida', '2022-06-29 01:32:09', '2022-06-29 01:32:09'),
(70, 194, 'Georgia', '2022-06-29 01:32:26', '2022-06-29 01:32:26'),
(71, 194, 'Hawaii', '2022-06-29 01:32:43', '2022-06-29 01:32:43'),
(72, 194, 'Idaho', '2022-06-29 01:33:24', '2022-06-29 01:33:24'),
(73, 194, 'Illinois', '2022-06-29 01:33:42', '2022-06-29 01:33:42'),
(74, 194, 'Indiana', '2022-06-29 01:35:21', '2022-06-29 01:35:21'),
(75, 194, 'Iowa', '2022-06-29 01:35:41', '2022-06-29 01:35:41'),
(76, 194, 'Kansas', '2022-06-29 01:36:01', '2022-06-29 01:36:01'),
(77, 194, 'Kentucky', '2022-06-29 01:36:16', '2022-06-29 01:36:16'),
(78, 194, 'Louisiana', '2022-06-29 01:36:34', '2022-06-29 01:36:34'),
(79, 194, 'Maine', '2022-06-29 01:36:49', '2022-06-29 01:36:49'),
(80, 194, 'Maryland', '2022-06-29 01:37:05', '2022-06-29 01:37:05'),
(81, 194, 'Massachusetts', '2022-06-29 01:37:22', '2022-06-29 01:37:22'),
(82, 194, 'Michigan', '2022-06-29 01:37:40', '2022-06-29 01:37:40'),
(83, 194, 'Minnesota', '2022-06-29 01:37:55', '2022-06-29 01:37:55'),
(84, 194, 'Mississippi', '2022-06-29 01:38:16', '2022-06-29 01:38:16'),
(85, 194, 'Missouri', '2022-06-29 01:38:30', '2022-06-29 01:38:30'),
(86, 194, 'Montana', '2022-06-29 01:38:47', '2022-06-29 01:38:47'),
(87, 194, 'Nebraska', '2022-06-29 01:39:09', '2022-06-29 01:39:09'),
(88, 194, 'Nevada', '2022-06-29 01:39:31', '2022-06-29 01:39:31'),
(89, 194, 'New Hampshire', '2022-06-29 01:39:51', '2022-06-29 01:39:51'),
(90, 194, 'New Jersey', '2022-06-29 01:40:08', '2022-06-29 01:40:08'),
(91, 194, 'New Mexico', '2022-06-29 01:40:25', '2022-06-29 01:40:25'),
(92, 194, 'New York', '2022-06-29 01:40:44', '2022-06-29 01:40:44'),
(93, 194, 'North Carolina', '2022-06-29 01:41:02', '2022-06-29 01:41:02'),
(94, 194, 'North Dakota', '2022-06-29 01:41:19', '2022-06-29 01:41:19'),
(95, 194, 'Ohio', '2022-06-29 01:41:34', '2022-06-29 01:41:34'),
(96, 194, 'Oklahoma', '2022-06-29 01:42:10', '2022-06-29 01:42:10'),
(97, 194, 'Oregon', '2022-06-29 01:42:28', '2022-06-29 01:42:28'),
(98, 194, 'Pennsylvania', '2022-06-29 01:42:45', '2022-06-29 01:42:45'),
(99, 194, 'Rhode Island', '2022-06-29 01:43:18', '2022-06-29 01:43:18'),
(100, 194, 'South Carolina', '2022-06-29 01:43:35', '2022-06-29 01:43:35'),
(101, 194, 'South Dakota', '2022-06-29 01:44:06', '2022-06-29 01:44:06'),
(102, 194, 'Tennessee', '2022-06-29 01:44:25', '2022-06-29 01:44:25'),
(103, 194, 'Texas', '2022-06-29 01:44:43', '2022-06-29 01:44:43'),
(104, 194, 'Utah', '2022-06-29 01:45:00', '2022-06-29 01:45:00'),
(105, 194, 'Vermont', '2022-06-29 01:45:55', '2022-06-29 01:45:55'),
(106, 194, 'Virginia', '2022-06-29 01:46:20', '2022-06-29 01:46:20'),
(107, 194, 'Washington', '2022-06-29 01:46:41', '2022-06-29 01:46:41'),
(108, 194, 'West Virginia', '2022-06-29 01:46:58', '2022-06-29 01:46:58'),
(109, 194, 'Wisconsin', '2022-06-29 01:47:17', '2022-06-29 01:47:17'),
(110, 194, 'Wyoming', '2022-06-29 01:47:34', '2022-06-29 01:47:34'),
(111, 21, 'Dhaka', '2022-06-30 10:53:55', '2022-06-30 10:53:55'),
(113, 9, 'Berat', '2022-07-02 22:30:08', '2022-07-02 22:30:08'),
(114, 9, 'Dibër', '2022-07-02 22:30:38', '2022-07-02 22:30:38'),
(115, 9, 'Durrës', '2022-07-02 22:31:03', '2022-07-02 22:31:03'),
(116, 9, 'Elbasan', '2022-07-02 22:31:28', '2022-07-02 22:31:28'),
(117, 9, 'Fier', '2022-07-02 22:31:45', '2022-07-02 22:31:45'),
(118, 9, 'Gjirokastër', '2022-07-02 22:32:08', '2022-07-02 22:32:08'),
(119, 9, 'Korçë', '2022-07-02 22:32:29', '2022-07-02 22:32:29'),
(120, 9, 'Kukës', '2022-07-02 22:32:42', '2022-07-02 22:32:42'),
(121, 9, 'Lezhë', '2022-07-02 22:32:57', '2022-07-02 22:32:57'),
(122, 9, 'Shkodër', '2022-07-02 22:33:09', '2022-07-02 22:33:09'),
(123, 9, 'Tirana', '2022-07-02 22:33:21', '2022-07-02 22:33:21'),
(124, 9, 'Vlorë', '2022-07-02 22:33:33', '2022-07-02 22:33:33'),
(125, 8, 'Badakhshan', '2022-07-02 22:38:32', '2022-07-02 22:38:32'),
(126, 8, 'Baghlan', '2022-07-02 22:38:46', '2022-07-02 22:38:46'),
(127, 8, 'Kunduz', '2022-07-02 22:39:05', '2022-07-02 22:39:05'),
(128, 8, 'Takhar', '2022-07-02 22:39:18', '2022-07-02 22:39:18'),
(129, 8, 'Balkh', '2022-07-02 22:40:28', '2022-07-02 22:40:28'),
(130, 8, 'Faryab', '2022-07-02 22:40:41', '2022-07-02 22:40:41'),
(131, 8, 'Jowzjan', '2022-07-02 22:40:55', '2022-07-02 22:40:55'),
(132, 8, 'Samangan', '2022-07-02 22:41:07', '2022-07-02 22:41:07'),
(133, 8, 'Sar-e Pol', '2022-07-02 22:41:20', '2022-07-02 22:41:20'),
(134, 8, 'Kunar', '2022-07-02 22:41:37', '2022-07-02 22:41:37'),
(135, 8, 'Laghman', '2022-07-02 22:41:49', '2022-07-02 22:41:49'),
(136, 8, 'Nangarhar', '2022-07-02 22:42:01', '2022-07-02 22:42:01'),
(137, 8, 'Nuristan', '2022-07-02 22:42:14', '2022-07-02 22:42:14'),
(138, 8, 'Kabul', '2022-07-02 22:42:49', '2022-07-02 22:42:49'),
(139, 8, 'Kapisa', '2022-07-02 22:43:00', '2022-07-02 22:43:00'),
(140, 8, 'Logar', '2022-07-02 22:43:11', '2022-07-02 22:43:11'),
(141, 8, 'Panjshir', '2022-07-02 22:43:24', '2022-07-02 22:43:24'),
(142, 8, 'Parwan', '2022-07-02 22:43:37', '2022-07-02 22:43:37'),
(143, 8, 'Wardak', '2022-07-02 22:43:50', '2022-07-02 22:43:50'),
(144, 8, 'Badghis', '2022-07-02 22:44:12', '2022-07-02 22:44:12'),
(145, 8, 'Bamyan', '2022-07-02 22:44:26', '2022-07-02 22:44:26'),
(146, 8, 'Farah', '2022-07-02 22:44:37', '2022-07-02 22:44:37'),
(147, 8, 'Ghor', '2022-07-02 22:44:47', '2022-07-02 22:44:47'),
(148, 8, 'Herat', '2022-07-02 22:44:57', '2022-07-02 22:44:57'),
(149, 8, 'Ghazni', '2022-07-02 22:45:21', '2022-07-02 22:45:21'),
(150, 8, 'Khost', '2022-07-02 22:45:32', '2022-07-02 22:45:32'),
(151, 8, 'Paktia', '2022-07-02 22:45:44', '2022-07-02 22:45:44'),
(152, 8, 'Paktika', '2022-07-02 22:45:56', '2022-07-02 22:45:56'),
(153, 8, 'Daykundi', '2022-07-02 22:46:13', '2022-07-02 22:46:13'),
(154, 8, 'Helmand', '2022-07-02 22:46:24', '2022-07-02 22:46:24'),
(155, 8, 'Kandahar', '2022-07-02 22:46:34', '2022-07-02 22:46:34'),
(156, 8, 'Nimruz', '2022-07-02 22:46:51', '2022-07-02 22:46:51'),
(157, 8, 'Uruzgan', '2022-07-02 22:47:05', '2022-07-02 22:47:05'),
(158, 8, 'Zabul', '2022-07-02 22:47:18', '2022-07-02 22:47:18'),
(159, 10, 'Algérois', '2022-07-02 22:48:36', '2022-07-02 22:48:36'),
(160, 10, 'Aurès Mountains', '2022-07-02 22:49:31', '2022-07-02 22:49:31'),
(161, 10, 'Constantinois', '2022-07-02 22:49:44', '2022-07-02 22:49:44'),
(162, 10, 'Gourara', '2022-07-02 22:50:02', '2022-07-02 22:50:02'),
(163, 10, 'Hautes Plaines', '2022-07-02 22:50:14', '2022-07-02 22:50:14'),
(164, 10, 'Hodna', '2022-07-02 22:50:27', '2022-07-02 22:50:27'),
(165, 10, 'Hoggar Mountains', '2022-07-02 22:50:38', '2022-07-02 22:50:38'),
(166, 10, 'Grande Kabylie', '2022-07-02 22:50:51', '2022-07-02 22:50:51'),
(167, 10, 'Petite Kabylie', '2022-07-02 22:51:04', '2022-07-02 22:51:04'),
(168, 10, 'Basse Kabylie', '2022-07-02 22:51:21', '2022-07-02 22:51:21'),
(169, 10, 'Eastern Kabylie', '2022-07-02 22:51:38', '2022-07-02 22:51:38'),
(170, 10, 'The M\'zab', '2022-07-02 22:51:51', '2022-07-02 22:51:51'),
(171, 10, 'Mitidja', '2022-07-02 22:52:12', '2022-07-02 22:52:12'),
(172, 10, 'Annaba region', '2022-07-02 22:52:32', '2022-07-02 22:52:32'),
(173, 10, 'The Saoura', '2022-07-02 22:52:49', '2022-07-02 22:52:49'),
(174, 10, 'Titteri', '2022-07-02 22:53:09', '2022-07-02 22:53:09'),
(175, 10, 'The Tell', '2022-07-02 22:53:28', '2022-07-02 22:53:28'),
(176, 10, 'Tidikelt', '2022-07-02 22:53:40', '2022-07-02 22:53:40'),
(177, 10, 'Trara Mountains', '2022-07-02 22:53:52', '2022-07-02 22:53:52'),
(178, 10, 'Touat', '2022-07-02 22:54:07', '2022-07-02 22:54:07'),
(179, 10, 'Oranie', '2022-07-02 22:54:24', '2022-07-02 22:54:24'),
(180, 10, 'South Oranie', '2022-07-02 22:54:48', '2022-07-02 22:54:48'),
(181, 10, 'Chelif River valley', '2022-07-02 22:55:10', '2022-07-02 22:55:10'),
(182, 10, 'The Dahra Range', '2022-07-02 22:55:24', '2022-07-02 22:55:24'),
(183, 10, 'The Ouarsenis', '2022-07-02 22:55:35', '2022-07-02 22:55:35'),
(184, 10, 'The Zibans', '2022-07-02 22:55:47', '2022-07-02 22:55:47'),
(185, 10, 'The Algerian Sahara', '2022-07-02 22:55:59', '2022-07-02 22:55:59'),
(186, 10, 'Grand Erg Oriental', '2022-07-02 22:56:15', '2022-07-02 22:56:15'),
(187, 10, 'Grand Erg Occidental', '2022-07-02 22:56:28', '2022-07-02 22:56:28'),
(188, 10, 'Souf', '2022-07-02 22:56:39', '2022-07-02 22:56:39'),
(189, 10, 'Tassill n\'Ajjer', '2022-07-02 22:56:50', '2022-07-02 22:56:50'),
(190, 10, 'Tanezrouft', '2022-07-02 22:57:00', '2022-07-02 22:57:00'),
(191, 11, 'Andorra la Vella', '2022-07-02 22:58:08', '2022-07-02 22:58:08'),
(192, 11, 'Canillo', '2022-07-02 22:58:18', '2022-07-02 22:58:18'),
(193, 11, 'Encamp', '2022-07-02 22:58:28', '2022-07-02 22:58:28'),
(194, 11, 'Escaldes-Engordany', '2022-07-02 22:58:41', '2022-07-02 22:58:41'),
(195, 11, 'Massana', '2022-07-02 22:58:53', '2022-07-02 22:58:53'),
(196, 11, 'Ordino', '2022-07-02 22:59:05', '2022-07-02 22:59:05'),
(197, 11, 'Sant Julià de Lòria', '2022-07-02 22:59:17', '2022-07-02 22:59:17'),
(198, 12, 'Bengo', '2022-07-02 23:01:12', '2022-07-02 23:01:12'),
(199, 12, 'Benguela', '2022-07-02 23:01:23', '2022-07-02 23:01:23'),
(200, 12, 'Bié', '2022-07-02 23:01:36', '2022-07-02 23:01:36'),
(201, 12, 'Cabinda', '2022-07-02 23:01:46', '2022-07-02 23:01:46'),
(202, 12, 'Cuando Cubango', '2022-07-02 23:02:02', '2022-07-02 23:02:02'),
(203, 12, 'Cuanza Norte', '2022-07-02 23:02:15', '2022-07-02 23:02:15'),
(204, 12, 'Cuanza Sul', '2022-07-02 23:02:28', '2022-07-02 23:02:28'),
(205, 12, 'Cunene', '2022-07-02 23:02:37', '2022-07-02 23:02:37'),
(206, 12, 'Huambo', '2022-07-02 23:02:46', '2022-07-02 23:02:46'),
(207, 12, 'Huíla', '2022-07-02 23:02:55', '2022-07-02 23:02:55'),
(208, 12, 'Luanda', '2022-07-02 23:03:08', '2022-07-02 23:03:08'),
(209, 12, 'Lunda Norte', '2022-07-02 23:03:20', '2022-07-02 23:03:20'),
(210, 12, 'Lunda Sul', '2022-07-02 23:03:30', '2022-07-02 23:03:30'),
(211, 12, 'Malanje', '2022-07-02 23:03:41', '2022-07-02 23:03:41'),
(212, 12, 'Moxico', '2022-07-02 23:03:54', '2022-07-02 23:03:54'),
(213, 12, 'Namibe', '2022-07-02 23:04:04', '2022-07-02 23:04:04'),
(214, 12, 'Uíge', '2022-07-02 23:04:19', '2022-07-02 23:04:19'),
(215, 12, 'Zaire', '2022-07-02 23:04:30', '2022-07-02 23:04:30'),
(216, 13, 'Saint George', '2022-07-02 23:13:56', '2022-07-02 23:13:56'),
(217, 13, 'Saint John', '2022-07-02 23:14:07', '2022-07-02 23:14:07'),
(218, 13, 'Saint Peter', '2022-07-02 23:14:23', '2022-07-02 23:14:23'),
(219, 13, 'Saint Paul', '2022-07-02 23:14:37', '2022-07-02 23:14:37'),
(220, 13, 'Saint Mary', '2022-07-02 23:14:49', '2022-07-02 23:14:49'),
(221, 13, 'Saint Philip', '2022-07-02 23:15:18', '2022-07-02 23:15:18'),
(222, 13, 'Barbuda', '2022-07-02 23:15:29', '2022-07-02 23:15:29'),
(223, 13, 'Redonda', '2022-07-02 23:15:49', '2022-07-02 23:15:49'),
(224, 14, 'Argentine Northwest:', '2022-07-02 23:19:08', '2022-07-02 23:19:08'),
(225, 14, 'Gran Chaco', '2022-07-02 23:19:36', '2022-07-02 23:19:36'),
(226, 14, 'Mesopotamia', '2022-07-02 23:19:48', '2022-07-02 23:19:48'),
(227, 14, 'Cuyo', '2022-07-02 23:20:03', '2022-07-02 23:20:03'),
(228, 14, 'Pampas', '2022-07-02 23:20:21', '2022-07-02 23:20:21'),
(229, 14, 'Patagonia', '2022-07-02 23:20:33', '2022-07-02 23:20:33'),
(230, 15, 'Aragatsotn', '2022-07-02 23:22:20', '2022-07-02 23:22:20'),
(231, 15, 'Ararat', '2022-07-02 23:22:42', '2022-07-02 23:22:42'),
(232, 15, 'Armavir', '2022-07-02 23:22:58', '2022-07-02 23:22:58'),
(233, 15, 'Gegharkunik', '2022-07-02 23:23:14', '2022-07-02 23:23:14'),
(234, 15, 'Kotayk', '2022-07-02 23:23:28', '2022-07-02 23:23:28'),
(235, 15, 'Lori', '2022-07-02 23:23:45', '2022-07-02 23:23:45'),
(236, 15, 'Shirak', '2022-07-02 23:23:56', '2022-07-02 23:23:56'),
(237, 15, 'Syunik', '2022-07-02 23:24:11', '2022-07-02 23:24:11'),
(238, 15, 'Tavush', '2022-07-02 23:24:26', '2022-07-02 23:24:26'),
(239, 15, 'Vayots Dzor', '2022-07-02 23:24:44', '2022-07-02 23:24:44'),
(240, 15, 'Yerevan', '2022-07-02 23:24:58', '2022-07-02 23:24:58'),
(241, 85, 'Kalkata', '2022-07-02 23:50:15', '2022-07-02 23:50:15'),
(242, 193, 'Somerset', '2022-07-07 18:47:29', '2022-07-07 18:47:29'),
(243, 63, 'Harju', '2022-07-08 21:17:48', '2022-07-08 21:17:48'),
(244, 63, 'Hiiu', '2022-07-08 21:22:32', '2022-07-08 21:22:32'),
(245, 63, 'Ida-Viru', '2022-07-08 21:23:05', '2022-07-08 21:23:05'),
(246, 63, 'Jõgeva', '2022-07-08 21:23:27', '2022-07-08 21:23:27'),
(247, 63, 'Järva', '2022-07-08 21:23:56', '2022-07-08 21:23:56'),
(248, 63, 'Lääne', '2022-07-08 21:24:42', '2022-07-08 21:24:42'),
(249, 63, 'Lääne-Viru', '2022-07-08 21:25:03', '2022-07-08 21:25:03'),
(250, 63, 'Põlva', '2022-07-08 21:25:28', '2022-07-08 21:25:28'),
(251, 63, 'Pärnu', '2022-07-08 21:25:45', '2022-07-08 21:25:45'),
(252, 63, 'Rapla', '2022-07-08 21:25:58', '2022-07-08 21:25:58'),
(253, 63, 'Saare', '2022-07-08 21:26:16', '2022-07-08 21:26:16'),
(254, 63, 'Tartu', '2022-07-08 21:26:39', '2022-07-08 21:26:39'),
(255, 63, 'Valga', '2022-07-08 21:26:54', '2022-07-08 21:26:54'),
(256, 63, 'Viljandi', '2022-07-08 21:27:07', '2022-07-08 21:27:07'),
(257, 63, 'Võru', '2022-07-08 21:27:20', '2022-07-08 21:27:20'),
(258, 72, 'Baden-Württemberg', '2022-07-08 21:29:51', '2022-07-08 21:29:51'),
(259, 72, 'Bavaria', '2022-07-08 21:30:17', '2022-07-08 21:30:17'),
(260, 72, 'Berlin', '2022-07-08 21:30:39', '2022-07-08 21:30:39'),
(261, 72, 'Brandenburg', '2022-07-08 21:30:56', '2022-07-08 21:30:56'),
(262, 72, 'Bremen', '2022-07-08 21:31:10', '2022-07-08 21:31:10'),
(263, 72, 'Hamburg', '2022-07-08 21:31:25', '2022-07-08 21:31:25'),
(264, 72, 'Hesse', '2022-07-08 21:31:37', '2022-07-08 21:31:37'),
(265, 72, 'Lower Saxony', '2022-07-08 21:31:48', '2022-07-08 21:31:48'),
(266, 72, 'Mecklenburg-Vorpommern', '2022-07-08 21:32:02', '2022-07-08 21:32:02'),
(267, 72, 'North Rhine-Westphalia', '2022-07-08 21:32:14', '2022-07-08 21:32:14'),
(268, 72, 'Rhineland-Palatinate', '2022-07-08 21:32:30', '2022-07-08 21:32:30'),
(269, 72, 'Saarland', '2022-07-08 21:32:43', '2022-07-08 21:32:43'),
(270, 72, 'Saxony', '2022-07-08 21:33:02', '2022-07-08 21:33:02'),
(271, 72, 'Saxony-Anhalt', '2022-07-08 21:33:16', '2022-07-08 21:33:16'),
(272, 72, 'Schleswig-Holstein', '2022-07-08 21:33:29', '2022-07-08 21:33:29'),
(273, 72, 'Thuringia', '2022-07-08 21:33:41', '2022-07-08 21:33:41'),
(274, 16, 'The Kimberley', '2022-07-08 22:39:03', '2022-07-08 22:39:03'),
(275, 16, 'The Pilbara', '2022-07-08 22:39:27', '2022-07-08 22:39:27'),
(276, 16, 'The Gascoyne', '2022-07-08 22:39:42', '2022-07-08 22:39:42'),
(277, 16, 'The Mid West', '2022-07-08 22:39:57', '2022-07-08 22:39:57'),
(278, 16, 'The Goldfields and Esperance', '2022-07-08 22:40:11', '2022-07-08 22:40:11'),
(279, 16, 'The Wheatbelt', '2022-07-08 22:40:22', '2022-07-08 22:40:22'),
(280, 16, 'Perth and Peel', '2022-07-08 22:40:37', '2022-07-08 22:40:37'),
(281, 16, 'The South West', '2022-07-08 22:40:47', '2022-07-08 22:40:47'),
(282, 16, 'The Great Southern', '2022-07-08 22:40:59', '2022-07-08 22:40:59'),
(283, 16, 'Kakadu and Arnhem Land', '2022-07-08 22:41:23', '2022-07-08 22:41:23'),
(284, 16, 'Darwin', '2022-07-08 22:41:35', '2022-07-08 22:41:35'),
(285, 16, 'Katherine', '2022-07-08 22:41:47', '2022-07-08 22:41:47'),
(286, 16, 'Tennant Creek', '2022-07-08 22:41:57', '2022-07-08 22:41:57'),
(287, 16, 'Alice Springs and Uluru', '2022-07-08 22:42:10', '2022-07-08 22:42:10'),
(288, 16, 'The Outback and Flinders Ranges', '2022-07-08 22:42:31', '2022-07-08 22:42:31'),
(289, 16, 'The Eyre Peninsula', '2022-07-08 22:42:45', '2022-07-08 22:42:45'),
(290, 16, 'Yorke Peninsula', '2022-07-08 22:42:58', '2022-07-08 22:42:58'),
(291, 16, 'Clare Valley', '2022-07-08 22:43:19', '2022-07-08 22:43:19'),
(292, 16, 'Kangaroo Island and Fleurieu Peninsula', '2022-07-08 22:43:33', '2022-07-08 22:43:33'),
(293, 16, 'Adelaide', '2022-07-08 22:43:49', '2022-07-08 22:43:49'),
(294, 16, 'The Murray', '2022-07-08 22:44:02', '2022-07-08 22:44:02'),
(295, 16, 'The Limestone Coast', '2022-07-08 22:44:16', '2022-07-08 22:44:16'),
(296, 16, 'The High Country', '2022-07-08 22:44:35', '2022-07-08 22:44:35'),
(297, 16, 'Gippsland', '2022-07-08 22:44:47', '2022-07-08 22:44:47'),
(298, 16, 'The Grampions', '2022-07-08 22:44:59', '2022-07-08 22:44:59'),
(299, 16, 'Melbourne', '2022-07-08 22:45:10', '2022-07-08 22:45:10'),
(300, 16, 'The Great Ocean Road', '2022-07-08 22:45:23', '2022-07-08 22:45:23'),
(301, 16, 'The Far North', '2022-07-08 23:18:39', '2022-07-08 23:18:39'),
(302, 16, 'The North West', '2022-07-08 23:18:53', '2022-07-08 23:18:53'),
(303, 16, 'The Northern', '2022-07-08 23:19:10', '2022-07-08 23:19:10'),
(304, 16, 'Mackay', '2022-07-08 23:19:32', '2022-07-08 23:19:32'),
(305, 16, 'The Central West', '2022-07-08 23:19:53', '2022-07-08 23:19:53'),
(306, 16, 'Fitzroy', '2022-07-08 23:20:30', '2022-07-08 23:20:30'),
(307, 16, 'The South West QLD', '2022-07-08 23:21:11', '2022-07-08 23:21:11'),
(308, 16, 'The Darling Downs', '2022-07-08 23:21:25', '2022-07-08 23:21:25'),
(309, 16, 'Wide Bay and Burnett', '2022-07-08 23:21:36', '2022-07-08 23:21:36'),
(310, 16, 'Brisbane and Moreton', '2022-07-08 23:21:48', '2022-07-08 23:21:48'),
(311, 16, 'The Far West', '2022-07-08 23:22:27', '2022-07-08 23:22:27'),
(312, 16, 'Orana', '2022-07-08 23:22:40', '2022-07-08 23:22:40'),
(313, 16, 'The North and North West', '2022-07-08 23:22:55', '2022-07-08 23:22:55'),
(315, 16, 'The Far North NSW', '2022-07-08 23:24:44', '2022-07-08 23:24:44'),
(316, 16, 'Clarence River and Coffs Harbour', '2022-07-08 23:24:59', '2022-07-08 23:24:59'),
(317, 16, 'The Hunter Valley', '2022-07-08 23:25:12', '2022-07-08 23:25:12'),
(318, 16, 'The Central Coast', '2022-07-08 23:25:25', '2022-07-08 23:25:25'),
(319, 16, 'The Riverina', '2022-07-08 23:25:36', '2022-07-08 23:25:36'),
(320, 16, 'The Central West NSW', '2022-07-08 23:26:01', '2022-07-08 23:26:01'),
(321, 16, 'The South West Slopes', '2022-07-08 23:26:17', '2022-07-08 23:26:17'),
(322, 16, 'Albury', '2022-07-08 23:26:29', '2022-07-08 23:26:29'),
(323, 16, 'Sydney and The Blue Mountains', '2022-07-08 23:26:44', '2022-07-08 23:26:44'),
(324, 16, 'The Southern Tablelands', '2022-07-08 23:26:56', '2022-07-08 23:26:56'),
(325, 16, 'The Far South Coast and Monaro', '2022-07-08 23:27:09', '2022-07-08 23:27:09'),
(326, 16, 'The North West TAS', '2022-07-08 23:27:27', '2022-07-08 23:27:27'),
(327, 16, 'Launceston and The North', '2022-07-08 23:27:40', '2022-07-08 23:27:40'),
(328, 16, 'The East Coast', '2022-07-08 23:27:51', '2022-07-08 23:27:51'),
(329, 16, 'The South West Wilderness', '2022-07-08 23:28:02', '2022-07-08 23:28:02'),
(330, 16, 'Hobart', '2022-07-08 23:28:14', '2022-07-08 23:28:14'),
(331, 17, 'Vienna', '2022-07-09 15:55:50', '2022-07-09 15:55:50'),
(332, 17, 'Lower Austria', '2022-07-09 15:56:09', '2022-07-09 15:56:09'),
(333, 17, 'Upper Austria', '2022-07-09 15:56:21', '2022-07-09 15:56:21'),
(334, 17, 'Styria', '2022-07-09 15:56:31', '2022-07-09 15:56:31'),
(335, 17, 'Tyrol', '2022-07-09 15:56:41', '2022-07-09 15:56:41'),
(336, 17, 'Carinthia', '2022-07-09 15:56:51', '2022-07-09 15:56:51'),
(337, 17, 'Salzburg', '2022-07-09 15:57:01', '2022-07-09 15:57:01'),
(338, 17, 'Vorarlberg', '2022-07-09 15:57:13', '2022-07-09 15:57:13'),
(339, 17, 'Burgenland', '2022-07-09 15:57:29', '2022-07-09 15:57:29'),
(340, 18, 'Baku', '2022-07-09 15:59:16', '2022-07-09 15:59:16'),
(341, 18, 'Absheron-Khizi', '2022-07-09 15:59:31', '2022-07-09 15:59:31'),
(342, 18, 'Ganja-Dashkasan', '2022-07-09 15:59:48', '2022-07-09 15:59:48'),
(343, 18, 'Shaki-Zagatala', '2022-07-09 16:00:01', '2022-07-09 16:00:01'),
(344, 18, 'Lankaran-Astara', '2022-07-09 16:00:22', '2022-07-09 16:00:22'),
(345, 18, 'Guba-Khachmaz', '2022-07-09 16:00:39', '2022-07-09 16:00:39'),
(346, 18, 'Central Aran', '2022-07-09 16:00:50', '2022-07-09 16:00:50'),
(347, 18, 'Karabakh', '2022-07-09 16:01:03', '2022-07-09 16:01:03'),
(348, 18, 'East Zangezur', '2022-07-09 16:01:13', '2022-07-09 16:01:13'),
(349, 18, 'Mountainous Shirvan', '2022-07-09 16:01:26', '2022-07-09 16:01:26'),
(350, 18, 'Nakhchivan', '2022-07-09 16:01:38', '2022-07-09 16:01:38'),
(351, 18, 'Gazakh-Tovuz', '2022-07-09 16:01:56', '2022-07-09 16:01:56'),
(352, 18, 'Mil-Mughan', '2022-07-09 16:02:05', '2022-07-09 16:02:05'),
(353, 18, 'Shirvan-Salyan', '2022-07-09 16:02:18', '2022-07-09 16:02:18'),
(354, 19, 'Acklins', '2022-07-09 16:07:51', '2022-07-09 16:07:51'),
(355, 19, 'Berry Islands', '2022-07-09 16:08:01', '2022-07-09 16:08:01'),
(356, 19, 'Bimini', '2022-07-09 16:08:11', '2022-07-09 16:08:11'),
(357, 19, 'Black Point (Exuma)', '2022-07-09 16:08:23', '2022-07-09 16:08:23'),
(358, 19, 'Cat Island', '2022-07-09 16:08:33', '2022-07-09 16:08:33'),
(359, 19, 'Central Abaco', '2022-07-09 16:08:47', '2022-07-09 16:08:47'),
(360, 19, 'Central Andros', '2022-07-09 16:08:56', '2022-07-09 16:08:56'),
(361, 19, 'Central Eleuthera', '2022-07-09 16:09:08', '2022-07-09 16:09:08'),
(362, 19, 'City of Freeport', '2022-07-09 16:11:04', '2022-07-09 16:11:04'),
(363, 19, 'Crooked Island', '2022-07-09 16:11:15', '2022-07-09 16:11:15'),
(364, 19, 'East Grand Bahama', '2022-07-09 16:11:32', '2022-07-09 16:11:32'),
(365, 19, 'Exuma', '2022-07-09 16:11:41', '2022-07-09 16:11:41'),
(366, 19, 'Grand Cay (Abaco)', '2022-07-09 16:11:55', '2022-07-09 16:11:55'),
(367, 19, 'Harbour Island (Eleuthera)', '2022-07-09 16:12:08', '2022-07-09 16:12:08'),
(368, 19, 'Hope Town (Abaco)', '2022-07-09 16:12:18', '2022-07-09 16:12:18'),
(369, 19, 'Inagua', '2022-07-09 16:12:27', '2022-07-09 16:12:27'),
(370, 19, 'Long Island', '2022-07-09 16:12:36', '2022-07-09 16:12:36'),
(371, 19, 'Mangrove Cay (Andros)', '2022-07-09 16:12:47', '2022-07-09 16:12:47'),
(372, 19, 'Mayaguana', '2022-07-09 16:12:59', '2022-07-09 16:12:59'),
(373, 19, 'Moore\'s Island (Abaco)', '2022-07-09 16:13:08', '2022-07-09 16:13:08'),
(374, 19, 'New Providence', '2022-07-09 16:13:17', '2022-07-09 16:13:17'),
(375, 19, 'North Abaco', '2022-07-09 16:13:37', '2022-07-09 16:13:37'),
(376, 19, 'North Andros', '2022-07-09 16:13:48', '2022-07-09 16:13:48'),
(377, 19, 'North Eleuthera', '2022-07-09 16:13:59', '2022-07-09 16:13:59'),
(378, 19, 'Ragged Island', '2022-07-09 16:14:08', '2022-07-09 16:14:08'),
(379, 19, 'Rum Cay', '2022-07-09 16:14:17', '2022-07-09 16:14:17'),
(380, 19, 'San Salvador', '2022-07-09 16:14:26', '2022-07-09 16:14:26'),
(381, 19, 'South Abaco', '2022-07-09 16:14:35', '2022-07-09 16:14:35'),
(382, 19, 'South Andros', '2022-07-09 16:14:45', '2022-07-09 16:14:45'),
(383, 19, 'South Eleuthera', '2022-07-09 16:14:55', '2022-07-09 16:14:55'),
(384, 19, 'Spanish Wells (Eleuthera)', '2022-07-09 16:15:05', '2022-07-09 16:15:05'),
(385, 19, 'West Grand Bahama', '2022-07-09 16:15:15', '2022-07-09 16:15:15'),
(386, 20, 'Capital', '2022-07-09 16:17:32', '2022-07-09 16:17:32'),
(387, 20, 'Northern', '2022-07-09 16:17:44', '2022-07-09 16:17:44'),
(388, 20, 'Southern', '2022-07-09 16:17:55', '2022-07-09 16:17:55'),
(389, 20, 'Muharraq', '2022-07-09 16:18:05', '2022-07-09 16:18:05'),
(390, 21, 'Barisal', '2022-07-09 16:19:19', '2022-07-09 16:19:19'),
(391, 21, 'Chittagong', '2022-07-09 16:19:30', '2022-07-09 16:19:30'),
(392, 21, 'Khulna', '2022-07-09 16:19:54', '2022-07-09 16:19:54'),
(393, 21, 'Mymensingh', '2022-07-09 16:20:06', '2022-07-09 16:20:06'),
(394, 21, 'Rajshahi', '2022-07-09 16:20:15', '2022-07-09 16:20:15'),
(395, 21, 'Rangpur', '2022-07-09 16:20:25', '2022-07-09 16:20:25'),
(396, 21, 'Sylhet', '2022-07-09 16:20:37', '2022-07-09 16:20:37'),
(397, 22, 'Christ Church', '2022-07-09 16:22:10', '2022-07-09 16:22:10'),
(398, 22, 'St. Andrew', '2022-07-09 16:22:21', '2022-07-09 16:22:21'),
(399, 22, 'St. George', '2022-07-09 16:22:34', '2022-07-09 16:22:34'),
(400, 22, 'St. James', '2022-07-09 16:22:44', '2022-07-09 16:22:44'),
(401, 22, 'St. John', '2022-07-09 16:22:54', '2022-07-09 16:22:54'),
(402, 22, 'St. Joseph', '2022-07-09 16:23:07', '2022-07-09 16:23:07'),
(403, 22, 'St. Lucy', '2022-07-09 16:23:16', '2022-07-09 16:23:16'),
(404, 22, 'St. Michael', '2022-07-09 16:23:28', '2022-07-09 16:23:28'),
(405, 22, 'St. Peter', '2022-07-09 16:23:43', '2022-07-09 16:23:43'),
(406, 22, 'St. Philip', '2022-07-09 16:23:53', '2022-07-09 16:23:53'),
(407, 22, 'St. Thomas', '2022-07-09 16:24:05', '2022-07-09 16:24:05'),
(408, 23, 'Vitebsk', '2022-07-09 16:25:53', '2022-07-09 16:25:53'),
(409, 23, 'Minsk', '2022-07-09 16:26:02', '2022-07-09 16:26:02'),
(410, 23, 'Mogilev', '2022-07-09 16:26:11', '2022-07-09 16:26:11'),
(411, 23, 'Grodno', '2022-07-09 16:26:19', '2022-07-09 16:26:19'),
(412, 23, 'Gomel', '2022-07-09 16:26:31', '2022-07-09 16:26:31'),
(413, 23, 'Brest', '2022-07-09 16:26:41', '2022-07-09 16:26:41'),
(414, 24, 'Antwerp', '2022-07-09 16:28:59', '2022-07-09 16:28:59'),
(415, 24, 'Limburg', '2022-07-09 16:29:10', '2022-07-09 16:29:10'),
(416, 24, 'Flemish Brabant', '2022-07-09 16:29:21', '2022-07-09 16:29:21'),
(417, 24, 'East Flanders', '2022-07-09 16:29:37', '2022-07-09 16:29:37'),
(418, 24, 'West Flanders', '2022-07-09 16:29:47', '2022-07-09 16:29:47'),
(419, 24, 'Hainaut', '2022-07-09 16:29:58', '2022-07-09 16:29:58'),
(420, 24, 'Walloon Brabant', '2022-07-09 16:30:12', '2022-07-09 16:30:12'),
(421, 24, 'Namur', '2022-07-09 16:30:22', '2022-07-09 16:30:22'),
(422, 24, 'Liège', '2022-07-09 16:30:34', '2022-07-09 16:30:34'),
(423, 24, 'Luxembourg', '2022-07-09 16:31:41', '2022-07-09 16:31:41'),
(424, 24, 'BRU', '2022-07-09 16:31:51', '2022-07-09 16:31:51'),
(425, 25, 'Belize', '2022-07-09 16:35:27', '2022-07-09 16:35:27'),
(426, 25, 'Cayo', '2022-07-09 16:35:40', '2022-07-09 16:35:40'),
(427, 25, 'Corozal', '2022-07-09 16:36:11', '2022-07-09 16:36:11'),
(428, 25, 'Orange Walk', '2022-07-09 16:36:29', '2022-07-09 16:36:29'),
(429, 25, 'Stann Creek', '2022-07-09 16:36:42', '2022-07-09 16:36:42'),
(430, 25, 'Toledo', '2022-07-09 16:36:58', '2022-07-09 16:36:58'),
(431, 26, 'Alibori', '2022-07-09 16:37:55', '2022-07-09 16:37:55'),
(432, 26, 'Atakora', '2022-07-09 16:38:06', '2022-07-09 16:38:06'),
(433, 26, 'Atlantique', '2022-07-09 16:38:22', '2022-07-09 16:38:22'),
(434, 26, 'Borgou', '2022-07-09 16:38:33', '2022-07-09 16:38:33'),
(435, 26, 'Collines', '2022-07-09 16:38:44', '2022-07-09 16:38:44'),
(436, 26, 'Kouffo', '2022-07-09 16:38:58', '2022-07-09 16:38:58'),
(437, 26, 'Donga', '2022-07-09 16:39:15', '2022-07-09 16:39:15'),
(438, 26, 'Littoral', '2022-07-09 16:39:26', '2022-07-09 16:39:26'),
(439, 26, 'Mono', '2022-07-09 16:39:37', '2022-07-09 16:39:37'),
(440, 26, 'Ouémé', '2022-07-09 16:39:52', '2022-07-09 16:39:52'),
(441, 26, 'Plateau', '2022-07-09 16:40:05', '2022-07-09 16:40:05'),
(442, 26, 'Zou', '2022-07-09 16:40:16', '2022-07-09 16:40:16'),
(443, 27, 'Bumthang', '2022-07-09 16:41:58', '2022-07-09 16:41:58'),
(444, 27, 'Chukha', '2022-07-09 16:42:18', '2022-07-09 16:42:18'),
(445, 27, 'Dagana', '2022-07-09 16:42:41', '2022-07-09 16:42:41'),
(446, 27, 'Gasa', '2022-07-09 16:43:10', '2022-07-09 16:43:10'),
(447, 27, 'Haa', '2022-07-09 16:43:22', '2022-07-09 16:43:22'),
(448, 27, 'Lhuntse', '2022-07-09 16:43:37', '2022-07-09 16:43:37'),
(449, 27, 'Mongar', '2022-07-09 16:43:57', '2022-07-09 16:43:57'),
(450, 27, 'Paro', '2022-07-09 16:44:10', '2022-07-09 16:44:10'),
(451, 27, 'Pemagatshel', '2022-07-09 16:44:29', '2022-07-09 16:44:29'),
(452, 27, 'Punakha', '2022-07-09 16:44:44', '2022-07-09 16:44:44'),
(453, 27, 'Samdrup Jongkhar', '2022-07-09 16:44:59', '2022-07-09 16:44:59'),
(454, 27, 'Samtse', '2022-07-09 16:45:14', '2022-07-09 16:45:14'),
(455, 27, 'Sarpang', '2022-07-09 16:45:29', '2022-07-09 16:45:29'),
(456, 27, 'Thimphu', '2022-07-09 16:45:41', '2022-07-09 16:45:41'),
(457, 27, 'Trashigang', '2022-07-09 16:45:56', '2022-07-09 16:45:56'),
(458, 27, 'Trashiyangtse', '2022-07-09 16:46:10', '2022-07-09 16:46:10'),
(459, 27, 'Trongsa', '2022-07-09 16:46:22', '2022-07-09 16:46:22'),
(460, 27, 'Tsirang', '2022-07-09 16:46:33', '2022-07-09 16:46:33'),
(461, 27, 'Wangdue Phodrang', '2022-07-09 16:46:49', '2022-07-09 16:46:49'),
(462, 27, 'Zhemgang', '2022-07-09 16:47:03', '2022-07-09 16:47:03'),
(463, 28, 'Pando', '2022-07-09 16:48:37', '2022-07-09 16:48:37'),
(464, 28, 'La Paz', '2022-07-09 16:48:47', '2022-07-09 16:48:47'),
(465, 28, 'Beni', '2022-07-09 16:48:59', '2022-07-09 16:48:59'),
(466, 28, 'Oruro', '2022-07-09 16:49:19', '2022-07-09 16:49:19'),
(467, 28, 'Cochabamba', '2022-07-09 16:49:30', '2022-07-09 16:49:30'),
(468, 28, 'Santa Cruz', '2022-07-09 16:49:41', '2022-07-09 16:49:41'),
(469, 28, 'Potosí', '2022-07-09 16:49:52', '2022-07-09 16:49:52'),
(470, 28, 'Chuquisaca', '2022-07-09 16:50:03', '2022-07-09 16:50:03'),
(471, 28, 'Tarija', '2022-07-09 16:50:13', '2022-07-09 16:50:13'),
(472, 29, 'Federation of BiH', '2022-07-09 16:52:42', '2022-07-09 16:52:42'),
(473, 29, 'Republika Srpska', '2022-07-09 16:52:54', '2022-07-09 16:52:54'),
(474, 29, 'Brčko District', '2022-07-09 16:53:11', '2022-07-09 16:53:11'),
(475, 30, 'Gaborone', '2022-07-09 16:54:40', '2022-07-09 16:54:40'),
(476, 30, 'Francistown', '2022-07-09 16:55:03', '2022-07-09 16:55:03'),
(477, 30, 'Lobatse', '2022-07-09 16:55:15', '2022-07-09 16:55:15'),
(478, 30, 'Selebi-Phikwe', '2022-07-09 16:55:30', '2022-07-09 16:55:30'),
(479, 30, 'Jwaneng', '2022-07-09 16:55:49', '2022-07-09 16:55:49'),
(480, 30, 'Orapa', '2022-07-09 16:56:00', '2022-07-09 16:56:00'),
(481, 30, 'Sowa', '2022-07-09 16:56:13', '2022-07-09 16:56:13'),
(482, 30, 'Southern District', '2022-07-09 16:56:24', '2022-07-09 16:56:24'),
(483, 30, 'South-East District', '2022-07-09 16:56:40', '2022-07-09 16:56:40'),
(484, 30, 'Kweneng', '2022-07-09 16:56:56', '2022-07-09 16:56:56'),
(485, 30, 'Kgatleng', '2022-07-09 16:57:07', '2022-07-09 16:57:07'),
(486, 30, 'Central District', '2022-07-09 16:57:28', '2022-07-09 16:57:28'),
(487, 30, 'North-East District', '2022-07-09 16:57:42', '2022-07-09 16:57:42'),
(488, 30, 'Ngamiland', '2022-07-09 16:57:57', '2022-07-09 16:57:57'),
(489, 30, 'Chobe', '2022-07-09 16:58:09', '2022-07-09 16:58:09'),
(490, 30, 'Ghanzi', '2022-07-09 16:58:25', '2022-07-09 16:58:25'),
(491, 30, 'Kgalagadi', '2022-07-09 16:58:37', '2022-07-09 16:58:37'),
(492, 31, 'Acre', '2022-07-09 17:00:34', '2022-07-09 17:00:34'),
(493, 31, 'Alagoas', '2022-07-09 17:00:44', '2022-07-09 17:00:44'),
(494, 31, 'Amapá', '2022-07-09 17:00:55', '2022-07-09 17:00:55'),
(495, 31, 'Amazonas', '2022-07-09 17:01:05', '2022-07-09 17:01:05'),
(496, 31, 'Bahia', '2022-07-09 17:01:18', '2022-07-09 17:01:18'),
(497, 31, 'Ceará', '2022-07-09 17:01:27', '2022-07-09 17:01:27'),
(498, 31, 'Distrito Federal', '2022-07-09 17:01:42', '2022-07-09 17:01:42'),
(499, 31, 'Espírito Santo', '2022-07-09 17:01:58', '2022-07-09 17:01:58'),
(500, 31, 'Goiás', '2022-07-09 17:02:10', '2022-07-09 17:02:10'),
(501, 31, 'Maranhão', '2022-07-09 17:02:25', '2022-07-09 17:02:25'),
(502, 31, 'Mato Grosso', '2022-07-09 17:02:35', '2022-07-09 17:02:35'),
(503, 31, 'Mato Grosso do Sul', '2022-07-09 17:02:55', '2022-07-09 17:02:55'),
(504, 31, 'Minas Gerais', '2022-07-09 17:03:10', '2022-07-09 17:03:10'),
(505, 31, 'Pará', '2022-07-09 17:03:21', '2022-07-09 17:03:21'),
(506, 31, 'Paraíba', '2022-07-09 17:03:33', '2022-07-09 17:03:33'),
(507, 31, 'Paraná', '2022-07-09 17:03:45', '2022-07-09 17:03:45'),
(508, 31, 'Pernambuco', '2022-07-09 17:03:57', '2022-07-09 17:03:57'),
(509, 31, 'Piauí', '2022-07-09 17:04:16', '2022-07-09 17:04:16'),
(510, 31, 'Rio de Janeiro', '2022-07-09 17:04:27', '2022-07-09 17:04:27'),
(511, 31, 'Rio Grande do Norte', '2022-07-09 17:04:37', '2022-07-09 17:04:37'),
(512, 31, 'Rio Grande do Sul', '2022-07-09 17:04:47', '2022-07-09 17:04:47'),
(513, 31, 'Rondônia', '2022-07-09 17:04:59', '2022-07-09 17:04:59'),
(514, 31, 'Roraima', '2022-07-09 17:05:22', '2022-07-09 17:05:22'),
(515, 31, 'Santa Catarina', '2022-07-09 17:05:37', '2022-07-09 17:05:37'),
(516, 31, 'São Paulo', '2022-07-09 17:05:49', '2022-07-09 17:05:49'),
(517, 31, 'Sergipe', '2022-07-09 17:06:05', '2022-07-09 17:06:05'),
(518, 31, 'Tocantins', '2022-07-09 17:06:19', '2022-07-09 17:06:19'),
(519, 32, 'Brunei-Muara', '2022-07-09 17:08:25', '2022-07-09 17:08:25'),
(520, 32, 'Belait', '2022-07-09 17:08:38', '2022-07-09 17:08:38'),
(521, 32, 'Tutong', '2022-07-09 17:08:50', '2022-07-09 17:08:50'),
(522, 32, 'Temburong', '2022-07-09 17:09:05', '2022-07-09 17:09:05'),
(523, 33, 'Blagoevgrad', '2022-07-09 17:10:39', '2022-07-09 17:10:39'),
(524, 33, 'Burgas', '2022-07-09 17:10:55', '2022-07-09 17:10:55'),
(525, 33, 'Dobrich', '2022-07-09 17:11:06', '2022-07-09 17:11:06'),
(526, 33, 'Gabrovo', '2022-07-09 17:11:16', '2022-07-09 17:11:16'),
(527, 33, 'Haskovo', '2022-07-09 17:11:26', '2022-07-09 17:11:26'),
(528, 33, 'Kardzhali', '2022-07-09 17:11:40', '2022-07-09 17:11:40'),
(529, 33, 'Kyustendil', '2022-07-09 17:11:50', '2022-07-09 17:11:50'),
(530, 33, 'Lovech', '2022-07-09 17:12:02', '2022-07-09 17:12:02'),
(531, 33, 'Montana Bg', '2022-07-09 17:12:54', '2022-07-09 17:12:54'),
(532, 33, 'Pazardzhik', '2022-07-09 17:13:09', '2022-07-09 17:13:09'),
(533, 33, 'Pernik', '2022-07-09 17:13:23', '2022-07-09 17:13:23'),
(534, 33, 'Pleven', '2022-07-09 17:13:36', '2022-07-09 17:13:36'),
(535, 33, 'Plovdiv', '2022-07-09 17:13:50', '2022-07-09 17:13:50'),
(536, 33, 'Razgrad', '2022-07-09 17:13:59', '2022-07-09 17:13:59'),
(537, 33, 'Ruse', '2022-07-09 17:14:09', '2022-07-09 17:14:09'),
(538, 33, 'Shumen', '2022-07-09 17:14:19', '2022-07-09 17:14:19'),
(539, 33, 'Silistra', '2022-07-09 17:14:33', '2022-07-09 17:14:33'),
(540, 33, 'Sliven', '2022-07-09 17:14:45', '2022-07-09 17:14:45'),
(541, 33, 'Smolyan', '2022-07-09 17:14:57', '2022-07-09 17:14:57'),
(542, 33, 'Sofia City', '2022-07-09 17:15:07', '2022-07-09 17:15:07'),
(543, 33, 'Sofia (province)', '2022-07-09 17:15:27', '2022-07-09 17:15:27'),
(544, 33, 'Stara Zagora', '2022-07-09 17:15:38', '2022-07-09 17:15:38'),
(545, 33, 'Targovishte', '2022-07-09 17:15:51', '2022-07-09 17:15:51'),
(546, 33, 'Varna', '2022-07-09 17:16:03', '2022-07-09 17:16:03'),
(547, 33, 'Veliko Tarnovo', '2022-07-09 17:16:14', '2022-07-09 17:16:14'),
(548, 33, 'Vidin', '2022-07-09 17:16:25', '2022-07-09 17:16:25'),
(549, 33, 'Vratsa', '2022-07-09 17:16:36', '2022-07-09 17:16:36'),
(550, 33, 'Yambol', '2022-07-09 17:16:47', '2022-07-09 17:16:47'),
(551, 34, 'Central BF', '2022-07-09 17:18:36', '2022-07-09 17:18:36'),
(552, 34, 'Eastern BF', '2022-07-09 17:18:57', '2022-07-09 17:18:57'),
(553, 34, 'Northern BF', '2022-07-09 17:19:35', '2022-07-09 17:19:35'),
(554, 34, 'Southern BF', '2022-07-09 17:19:59', '2022-07-09 17:19:59'),
(555, 34, 'Western BF', '2022-07-09 17:20:16', '2022-07-09 17:20:16'),
(556, 35, 'Eastern Burundi', '2022-07-09 17:21:10', '2022-07-09 17:21:10'),
(557, 35, 'Northern Burundi', '2022-07-09 17:21:24', '2022-07-09 17:21:24'),
(558, 35, 'Southern Burundi', '2022-07-09 17:21:36', '2022-07-09 17:21:36'),
(559, 35, 'Western Burundi', '2022-07-09 17:21:50', '2022-07-09 17:21:50'),
(560, 36, 'Abidjan', '2022-07-09 21:59:22', '2022-07-09 21:59:22'),
(561, 36, 'Bas-Sassandra', '2022-07-09 21:59:36', '2022-07-09 21:59:36'),
(562, 36, 'Comoé', '2022-07-09 21:59:50', '2022-07-09 21:59:50'),
(563, 36, 'Denguélé', '2022-07-09 22:00:07', '2022-07-09 22:00:07'),
(564, 36, 'Gôh-Djiboua', '2022-07-09 22:00:26', '2022-07-09 22:00:26'),
(565, 36, 'Lacs', '2022-07-09 22:00:36', '2022-07-09 22:00:36'),
(566, 36, 'Lagunes', '2022-07-09 22:00:47', '2022-07-09 22:00:47'),
(567, 36, 'Montagnes', '2022-07-09 22:01:00', '2022-07-09 22:01:00'),
(568, 36, 'Sassandra-Marahoué', '2022-07-09 22:01:15', '2022-07-09 22:01:15'),
(569, 36, 'Savanes', '2022-07-09 22:01:29', '2022-07-09 22:01:29'),
(570, 36, 'Vallée du Bandama', '2022-07-09 22:01:42', '2022-07-09 22:01:42'),
(571, 36, 'Woroba', '2022-07-09 22:01:57', '2022-07-09 22:01:57'),
(572, 36, 'Yamoussoukro', '2022-07-09 22:02:09', '2022-07-09 22:02:09'),
(573, 36, 'Zanzan', '2022-07-09 22:02:26', '2022-07-09 22:02:26'),
(574, 37, 'Tarrafal', '2022-07-09 22:03:34', '2022-07-09 22:03:34'),
(575, 37, 'São Miguel', '2022-07-09 22:03:46', '2022-07-09 22:03:46'),
(576, 37, 'São Salvador do Mundo', '2022-07-09 22:04:02', '2022-07-09 22:04:02'),
(577, 37, 'Santa Cruz CV', '2022-07-09 22:04:38', '2022-07-09 22:04:38'),
(578, 37, 'São Domingos', '2022-07-09 22:04:59', '2022-07-09 22:04:59'),
(579, 37, 'Praia', '2022-07-09 22:05:18', '2022-07-09 22:05:18'),
(580, 37, 'Ribeira Grande de Santiago', '2022-07-09 22:05:33', '2022-07-09 22:05:33'),
(581, 37, 'São Lourenço dos Órgãos', '2022-07-09 22:05:43', '2022-07-09 22:05:43'),
(582, 37, 'Santa Catarina cv', '2022-07-09 22:06:12', '2022-07-09 22:06:12'),
(583, 37, 'Brava', '2022-07-09 22:06:26', '2022-07-09 22:06:26'),
(584, 37, 'São Filipe', '2022-07-09 22:07:06', '2022-07-09 22:07:06'),
(585, 37, 'Santa Catarina do Fogo', '2022-07-09 22:07:19', '2022-07-09 22:07:19'),
(586, 37, 'Mosteiros', '2022-07-09 22:07:30', '2022-07-09 22:07:30'),
(587, 37, 'Maio', '2022-07-09 22:07:45', '2022-07-09 22:07:45'),
(588, 37, 'Boa Vista', '2022-07-09 22:07:56', '2022-07-09 22:07:56'),
(589, 37, 'Sal', '2022-07-09 22:08:08', '2022-07-09 22:08:08'),
(590, 37, 'Ribeira Brava', '2022-07-09 22:08:22', '2022-07-09 22:08:22'),
(591, 37, 'Tarrafal de São Nicolau', '2022-07-09 22:08:35', '2022-07-09 22:08:35'),
(592, 37, 'São Vicente', '2022-07-09 22:08:52', '2022-07-09 22:08:52'),
(593, 37, 'Porto Novo', '2022-07-09 22:09:03', '2022-07-09 22:09:03'),
(594, 37, 'Ribeira Grande', '2022-07-09 22:09:18', '2022-07-09 22:09:18'),
(595, 37, 'Paul', '2022-07-09 22:09:29', '2022-07-09 22:09:29'),
(596, 68, 'Auvergne-Rhône-Alpes', '2022-07-21 02:50:46', '2022-07-21 02:50:46'),
(597, 68, 'Bourgogne-Franche-Comté', '2022-07-21 02:51:10', '2022-07-21 02:51:10'),
(598, 68, 'Bretagne', '2022-07-21 02:51:40', '2022-07-21 02:51:40'),
(599, 68, 'Centre-Val de Loire', '2022-07-21 02:52:00', '2022-07-21 02:52:00'),
(600, 68, 'Corse', '2022-07-21 02:52:36', '2022-07-21 02:52:36'),
(601, 68, 'Grand Est', '2022-07-21 02:52:49', '2022-07-21 02:52:49'),
(602, 68, 'Hauts-de-France', '2022-07-21 02:53:04', '2022-07-21 02:53:04'),
(603, 68, 'le-de-France', '2022-07-21 02:53:28', '2022-07-21 02:53:28'),
(604, 68, 'Normandie', '2022-07-21 02:53:42', '2022-07-21 02:53:42'),
(605, 68, 'Nouvelle-Aquitaine', '2022-07-21 02:53:56', '2022-07-21 02:53:56'),
(606, 68, 'Occitanie', '2022-07-21 02:54:21', '2022-07-21 02:54:21'),
(607, 68, 'Pays de la Loire', '2022-07-21 02:54:33', '2022-07-21 02:54:33'),
(608, 68, 'Provence-Alpes-Côte d\'Azur', '2022-07-21 02:54:46', '2022-07-21 02:54:46'),
(609, 91, 'Abruzzo', '2022-07-21 03:03:03', '2022-07-21 03:03:03'),
(610, 91, 'Aosta Valley', '2022-07-21 03:03:21', '2022-07-21 03:03:21'),
(611, 91, 'Apulia', '2022-07-21 03:03:35', '2022-07-21 03:03:35'),
(612, 91, 'Basilicata', '2022-07-21 03:04:25', '2022-07-21 03:04:25'),
(613, 91, 'Calabria', '2022-07-21 03:04:40', '2022-07-21 03:04:40'),
(614, 91, 'Campania', '2022-07-21 03:04:55', '2022-07-21 03:04:55'),
(615, 91, 'Emilia-Romagna', '2022-07-21 03:05:12', '2022-07-21 03:05:12'),
(616, 91, 'Friuli Venezia Giulia', '2022-07-21 03:05:26', '2022-07-21 03:05:26'),
(617, 91, 'Lazio', '2022-07-21 03:05:37', '2022-07-21 03:05:37'),
(618, 91, 'Liguria', '2022-07-21 03:05:49', '2022-07-21 03:05:49'),
(619, 91, 'Lombardy', '2022-07-21 03:05:59', '2022-07-21 03:05:59'),
(620, 91, 'Marche', '2022-07-21 03:06:20', '2022-07-21 03:06:20'),
(621, 91, 'Molise', '2022-07-21 03:06:44', '2022-07-21 03:06:44'),
(622, 91, 'Piedmont', '2022-07-21 03:06:56', '2022-07-21 03:06:56'),
(623, 91, 'Sardinia', '2022-07-21 03:07:10', '2022-07-21 03:07:10'),
(624, 91, 'Sicily', '2022-07-21 03:07:42', '2022-07-21 03:07:42'),
(625, 91, 'Trentino-South Tyrol', '2022-07-21 03:07:56', '2022-07-21 03:07:56'),
(626, 91, 'Tuscany', '2022-07-21 03:08:09', '2022-07-21 03:08:09'),
(627, 91, 'Umbria', '2022-07-21 03:08:23', '2022-07-21 03:08:23'),
(628, 91, 'Veneto', '2022-07-21 03:08:41', '2022-07-21 03:08:41'),
(629, 172, 'Andalusia', '2022-07-21 03:12:09', '2022-07-21 03:12:09'),
(630, 172, 'Aragon', '2022-07-21 03:12:34', '2022-07-21 03:12:34'),
(631, 172, 'Asturias', '2022-07-21 03:12:47', '2022-07-21 03:12:47'),
(632, 172, 'Balearic Islands', '2022-07-21 03:13:10', '2022-07-21 03:13:10'),
(633, 172, 'Basque Country', '2022-07-21 03:13:25', '2022-07-21 03:13:25'),
(634, 172, 'Canary Islands', '2022-07-21 03:13:48', '2022-07-21 03:13:48'),
(635, 172, 'Cantabria', '2022-07-21 03:14:04', '2022-07-21 03:14:04'),
(636, 172, 'Castile and León', '2022-07-21 03:14:15', '2022-07-21 03:14:15'),
(637, 172, 'Castilla–La Mancha', '2022-07-21 03:14:54', '2022-07-21 03:14:54'),
(638, 172, 'Catalonia', '2022-07-21 03:15:10', '2022-07-21 03:15:10'),
(639, 172, 'Community of Madrid', '2022-07-21 03:15:22', '2022-07-21 03:15:22'),
(640, 172, 'Extremadura', '2022-07-21 03:15:34', '2022-07-21 03:15:34'),
(641, 172, 'Galicia', '2022-07-21 03:15:46', '2022-07-21 03:15:46'),
(642, 172, 'La Rioja', '2022-07-21 03:15:57', '2022-07-21 03:15:57'),
(643, 172, 'Navarre', '2022-07-21 03:16:08', '2022-07-21 03:16:08'),
(644, 172, 'Region of Murcia', '2022-07-21 03:16:25', '2022-07-21 03:16:25'),
(645, 172, 'Valencian Community', '2022-07-21 03:16:38', '2022-07-21 03:16:38'),
(646, 130, 'Groningen', '2022-07-21 03:23:24', '2022-07-21 03:23:24'),
(647, 130, 'Friesland', '2022-07-21 03:23:47', '2022-07-21 03:23:47'),
(648, 130, 'Drenthe', '2022-07-21 03:24:01', '2022-07-21 03:24:01'),
(649, 130, 'Overijssel', '2022-07-21 03:24:22', '2022-07-21 03:24:22'),
(650, 130, 'Gelderland', '2022-07-21 03:24:35', '2022-07-21 03:24:35'),
(651, 130, 'Flevoland', '2022-07-21 03:24:49', '2022-07-21 03:24:49'),
(652, 130, 'Utrecht', '2022-07-21 03:25:02', '2022-07-21 03:25:02'),
(653, 130, 'North Holland', '2022-07-21 03:25:15', '2022-07-21 03:25:15'),
(654, 130, 'South Holland', '2022-07-21 03:25:28', '2022-07-21 03:25:28'),
(655, 130, 'Zeeland Region', '2022-07-21 03:25:44', '2022-07-21 03:25:44'),
(656, 130, 'North Brabant', '2022-07-21 03:26:01', '2022-07-21 03:26:01'),
(657, 130, 'Limburg NL', '2022-07-21 03:29:50', '2022-07-21 03:29:50'),
(658, 191, 'Cherkasy', '2022-07-24 01:04:43', '2022-07-24 01:04:43'),
(659, 191, 'Chernihiv', '2022-07-24 01:04:55', '2022-07-24 01:04:55'),
(660, 191, 'Chernivtsi', '2022-07-24 01:05:07', '2022-07-24 01:05:07'),
(661, 191, 'Dnipropetrovsk', '2022-07-24 01:05:20', '2022-07-24 01:05:20'),
(662, 191, 'Donetsk', '2022-07-24 01:05:35', '2022-07-24 01:05:35'),
(663, 191, 'Ivano-Frankivsk', '2022-07-24 01:05:49', '2022-07-24 01:05:49'),
(664, 191, 'Kharkiv', '2022-07-24 01:06:02', '2022-07-24 01:06:02'),
(665, 191, 'Kherson', '2022-07-24 01:06:13', '2022-07-24 01:06:13'),
(666, 191, 'Khmelnytskyi', '2022-07-24 01:06:25', '2022-07-24 01:06:25'),
(667, 191, 'Kyiv', '2022-07-24 01:06:38', '2022-07-24 01:06:38'),
(668, 191, 'Kirovohrad', '2022-07-24 01:06:50', '2022-07-24 01:06:50'),
(669, 191, 'Luhansk', '2022-07-24 01:07:01', '2022-07-24 01:07:01'),
(670, 191, 'Lviv', '2022-07-24 01:07:14', '2022-07-24 01:07:14'),
(671, 191, 'Mykolaiv', '2022-07-24 01:07:24', '2022-07-24 01:07:24'),
(672, 191, 'Odessa', '2022-07-24 01:08:01', '2022-07-24 01:08:01'),
(673, 191, 'Poltava', '2022-07-24 01:08:14', '2022-07-24 01:08:14'),
(674, 191, 'Rivne', '2022-07-24 01:08:25', '2022-07-24 01:08:25'),
(675, 191, 'Sumy', '2022-07-24 01:08:41', '2022-07-24 01:08:41'),
(676, 191, 'Ternopil', '2022-07-24 01:08:53', '2022-07-24 01:08:53'),
(677, 191, 'Vinnytsia', '2022-07-24 01:09:05', '2022-07-24 01:09:05'),
(678, 191, 'Volyn', '2022-07-24 01:09:16', '2022-07-24 01:09:16'),
(679, 191, 'Zakarpattia', '2022-07-24 01:09:28', '2022-07-24 01:09:28'),
(680, 191, 'Zaporizhzhia', '2022-07-24 01:09:38', '2022-07-24 01:09:38'),
(681, 191, 'Zhytomyr', '2022-07-24 01:09:50', '2022-07-24 01:09:50'),
(682, 187, 'Izmir', '2022-07-24 01:11:54', '2022-07-24 01:11:54'),
(683, 187, 'Trabzon', '2022-07-24 01:12:13', '2022-07-24 01:12:13'),
(684, 187, 'Ankara', '2022-07-24 01:12:26', '2022-07-24 01:12:26'),
(685, 187, 'Van', '2022-07-24 01:12:38', '2022-07-24 01:12:38'),
(686, 187, 'Istanbul', '2022-07-24 01:12:50', '2022-07-24 01:12:50'),
(687, 187, 'Antalya', '2022-07-24 01:13:03', '2022-07-24 01:13:03'),
(688, 187, 'Sanliurfa', '2022-07-24 01:13:14', '2022-07-24 01:13:14'),
(689, 176, 'Blekinge', '2022-07-24 01:14:19', '2022-07-24 01:14:19'),
(690, 176, 'Dalarna', '2022-07-24 01:14:30', '2022-07-24 01:14:30'),
(691, 176, 'Gotland', '2022-07-24 01:14:42', '2022-07-24 01:14:42'),
(692, 176, 'Gävleborg', '2022-07-24 01:14:53', '2022-07-24 01:14:53'),
(693, 176, 'Halland', '2022-07-24 01:15:07', '2022-07-24 01:15:07'),
(694, 176, 'Jämtland', '2022-07-24 01:15:17', '2022-07-24 01:15:17'),
(695, 176, 'Jönköping', '2022-07-24 01:15:34', '2022-07-24 01:15:34'),
(696, 176, 'Kalmar', '2022-07-24 01:15:44', '2022-07-24 01:15:44'),
(697, 176, 'Kronoberg', '2022-07-24 01:15:54', '2022-07-24 01:15:54'),
(698, 176, 'Norrbotten', '2022-07-24 01:16:05', '2022-07-24 01:16:05'),
(699, 176, 'Skåne', '2022-07-24 01:16:29', '2022-07-24 01:16:29'),
(700, 176, 'Stockholm', '2022-07-24 01:16:41', '2022-07-24 01:16:41'),
(701, 176, 'Södermanland', '2022-07-24 01:17:09', '2022-07-24 01:17:09'),
(702, 176, 'Uppsala', '2022-07-24 01:17:19', '2022-07-24 01:17:19'),
(703, 176, 'Värmland', '2022-07-24 01:17:29', '2022-07-24 01:17:29'),
(704, 176, 'Västerbotten', '2022-07-24 01:17:41', '2022-07-24 01:17:41'),
(705, 176, 'Västernorrland', '2022-07-24 01:17:56', '2022-07-24 01:17:56'),
(706, 176, 'Västmanland', '2022-07-24 01:18:08', '2022-07-24 01:18:08'),
(707, 176, 'Västra Götaland', '2022-07-24 01:18:22', '2022-07-24 01:18:22'),
(708, 176, 'Örebro', '2022-07-24 01:18:31', '2022-07-24 01:18:31'),
(709, 176, 'Östergötland', '2022-07-24 01:18:41', '2022-07-24 01:18:41'),
(710, 161, 'Northern Serbia', '2022-07-24 01:22:16', '2022-07-24 01:22:16'),
(711, 161, 'Western Serbia', '2022-07-24 01:22:30', '2022-07-24 01:22:30'),
(712, 161, 'Central Serbia', '2022-07-24 01:22:45', '2022-07-24 01:22:45'),
(713, 161, 'Eastern Serbia', '2022-07-24 01:23:00', '2022-07-24 01:23:00'),
(714, 161, 'South-Western Serbia', '2022-07-24 01:23:17', '2022-07-24 01:23:17'),
(715, 161, 'Southern Serbia', '2022-07-24 01:23:34', '2022-07-24 01:23:34'),
(716, 161, 'Kosovo', '2022-07-24 01:23:46', '2022-07-24 01:23:46'),
(717, 151, 'Adygea,', '2022-07-24 01:28:01', '2022-07-24 01:28:01'),
(718, 151, 'Bashkortostan', '2022-07-24 01:28:21', '2022-07-24 01:28:21'),
(719, 151, 'Buryatia', '2022-07-24 01:28:33', '2022-07-24 01:28:33'),
(720, 151, 'Altai', '2022-07-24 01:28:50', '2022-07-24 01:28:50'),
(721, 151, 'Dagestan', '2022-07-24 01:29:03', '2022-07-24 01:29:03'),
(722, 151, 'Ingushetia', '2022-07-24 01:29:20', '2022-07-24 01:29:20'),
(723, 151, 'Kabardino-Balkar', '2022-07-24 01:29:40', '2022-07-24 01:29:40'),
(724, 151, 'Kalmykia', '2022-07-24 01:29:52', '2022-07-24 01:29:52'),
(725, 151, 'Karachay-Cherkess', '2022-07-24 01:30:04', '2022-07-24 01:30:04'),
(726, 151, 'Karelia', '2022-07-24 01:30:15', '2022-07-24 01:30:15'),
(727, 151, 'Komi', '2022-07-24 01:30:27', '2022-07-24 01:30:27'),
(728, 151, 'Mari El', '2022-07-24 01:30:39', '2022-07-24 01:30:39'),
(729, 151, 'Mordovia', '2022-07-24 01:31:02', '2022-07-24 01:31:02'),
(730, 151, 'Sakha (Yakutia)', '2022-07-24 01:31:19', '2022-07-24 01:31:19'),
(731, 151, 'North Ossetia-Alania', '2022-07-24 01:31:37', '2022-07-24 01:31:37'),
(732, 151, 'Tatarstan', '2022-07-24 01:31:53', '2022-07-24 01:31:53');
INSERT INTO `towns` (`id`, `city_id`, `name`, `created_at`, `updated_at`) VALUES
(733, 151, 'Tuva', '2022-07-24 01:32:11', '2022-07-24 01:32:11'),
(734, 151, 'Udmurt', '2022-07-24 01:32:25', '2022-07-24 01:32:25'),
(735, 151, 'Khakassia', '2022-07-24 01:32:37', '2022-07-24 01:32:37'),
(736, 151, 'Chechen', '2022-07-24 01:32:48', '2022-07-24 01:32:48'),
(737, 151, 'Chuvash', '2022-07-24 01:32:59', '2022-07-24 01:32:59'),
(738, 151, 'Altai Krai', '2022-07-24 01:33:11', '2022-07-24 01:33:11'),
(739, 151, 'Krasnodar', '2022-07-24 01:33:34', '2022-07-24 01:33:34'),
(740, 151, 'Krasnoyarsk', '2022-07-24 01:33:50', '2022-07-24 01:33:50'),
(741, 151, 'Primorsky', '2022-07-24 01:34:02', '2022-07-24 01:34:02'),
(742, 151, 'Stavropol', '2022-07-24 01:34:15', '2022-07-24 01:34:15'),
(743, 151, 'Khabarovsk', '2022-07-24 01:34:28', '2022-07-24 01:34:28'),
(744, 151, 'Amur', '2022-07-24 01:34:43', '2022-07-24 01:34:43'),
(745, 151, 'Arkhangelsk', '2022-07-24 01:34:55', '2022-07-24 01:34:55'),
(746, 151, 'Astrakhan', '2022-07-24 01:35:06', '2022-07-24 01:35:06'),
(747, 151, 'Belgorod', '2022-07-24 01:35:17', '2022-07-24 01:35:17'),
(748, 151, 'Bryansk', '2022-07-24 01:35:28', '2022-07-24 01:35:28'),
(749, 151, 'Vladimir', '2022-07-24 01:35:39', '2022-07-24 01:35:39'),
(750, 151, 'Volgograd', '2022-07-24 01:35:50', '2022-07-24 01:35:50'),
(751, 151, 'Vologda', '2022-07-24 01:36:01', '2022-07-24 01:36:01'),
(752, 151, 'Voronezh', '2022-07-24 01:36:19', '2022-07-24 01:36:19'),
(753, 151, 'Ivanovo', '2022-07-24 01:36:30', '2022-07-24 01:36:30'),
(754, 151, 'Irkutsk', '2022-07-24 01:36:41', '2022-07-24 01:36:41'),
(755, 151, 'Kaliningrad', '2022-07-24 01:36:51', '2022-07-24 01:36:51'),
(756, 151, 'Kaluga', '2022-07-24 01:37:01', '2022-07-24 01:37:01'),
(757, 151, 'Kamchatka', '2022-07-24 01:37:11', '2022-07-24 01:37:11'),
(758, 151, 'Kemerovo', '2022-07-24 01:37:21', '2022-07-24 01:37:21'),
(759, 151, 'Kirov', '2022-07-24 01:37:33', '2022-07-24 01:37:33'),
(760, 151, 'Kostroma', '2022-07-24 01:37:46', '2022-07-24 01:37:46'),
(761, 151, 'Kurgan', '2022-07-24 01:37:58', '2022-07-24 01:37:58'),
(762, 151, 'Kursk', '2022-07-24 01:38:08', '2022-07-24 01:38:08'),
(763, 151, 'Leningrad', '2022-07-24 01:38:17', '2022-07-24 01:38:17'),
(764, 151, 'Lipetsk', '2022-07-24 01:38:27', '2022-07-24 01:38:27'),
(765, 151, 'Magadan', '2022-07-24 01:38:38', '2022-07-24 01:38:38'),
(766, 151, 'Moscow', '2022-07-24 01:38:48', '2022-07-24 01:38:48'),
(767, 151, 'Moscow Oblast', '2022-07-24 01:39:15', '2022-07-24 01:39:15'),
(768, 151, 'Murmansk', '2022-07-24 01:39:28', '2022-07-24 01:39:28'),
(769, 151, 'Nizhny Novgorod', '2022-07-24 01:39:40', '2022-07-24 01:39:40'),
(770, 151, 'Novgorod', '2022-07-24 01:39:50', '2022-07-24 01:39:50'),
(771, 151, 'Novosibirsk', '2022-07-24 01:39:59', '2022-07-24 01:39:59'),
(772, 151, 'Omsk', '2022-07-24 01:40:10', '2022-07-24 01:40:10'),
(773, 151, 'Orenburg', '2022-07-24 01:40:25', '2022-07-24 01:40:25'),
(774, 151, 'Oryol', '2022-07-24 01:40:36', '2022-07-24 01:40:36'),
(775, 151, 'Penza', '2022-07-24 01:40:47', '2022-07-24 01:40:47'),
(776, 151, 'Perm', '2022-07-24 01:40:58', '2022-07-24 01:40:58'),
(777, 151, 'Pskov', '2022-07-24 01:41:17', '2022-07-24 01:41:17'),
(778, 151, 'Rostov', '2022-07-24 01:41:28', '2022-07-24 01:41:28'),
(779, 151, 'Ryazan', '2022-07-24 01:41:39', '2022-07-24 01:41:39'),
(780, 151, 'Samara', '2022-07-24 01:41:51', '2022-07-24 01:41:51'),
(781, 151, 'Saratov', '2022-07-24 01:42:12', '2022-07-24 01:42:12'),
(782, 151, 'Sakhalin', '2022-07-24 01:42:23', '2022-07-24 01:42:23'),
(783, 151, 'Sverdlovsk', '2022-07-24 01:42:37', '2022-07-24 01:42:37'),
(784, 151, 'Smolensk', '2022-07-24 01:42:46', '2022-07-24 01:42:46'),
(785, 151, 'Tambov', '2022-07-24 01:43:00', '2022-07-24 01:43:00'),
(786, 151, 'Tver', '2022-07-24 01:43:12', '2022-07-24 01:43:12'),
(787, 151, 'Tomsk', '2022-07-24 01:43:22', '2022-07-24 01:43:22'),
(788, 151, 'Tula', '2022-07-24 01:43:31', '2022-07-24 01:43:31'),
(789, 151, 'Tyumen', '2022-07-24 01:43:40', '2022-07-24 01:43:40'),
(790, 151, 'Ulyanovsk', '2022-07-24 01:43:50', '2022-07-24 01:43:50'),
(791, 151, 'Chelyabinsk', '2022-07-24 01:44:00', '2022-07-24 01:44:00'),
(792, 151, 'Zabaykalsky', '2022-07-24 01:44:10', '2022-07-24 01:44:10'),
(793, 151, 'Yaroslavl', '2022-07-24 01:44:19', '2022-07-24 01:44:19'),
(794, 151, 'Moscow City', '2022-07-24 01:45:29', '2022-07-24 01:45:29'),
(795, 151, 'Saint Petersburg', '2022-07-24 01:45:39', '2022-07-24 01:45:39'),
(796, 151, 'Birobidzhan', '2022-07-24 01:45:49', '2022-07-24 01:45:49'),
(797, 151, 'Nenets', '2022-07-24 01:46:12', '2022-07-24 01:46:12'),
(798, 151, 'Khanty–Mansi', '2022-07-24 01:46:24', '2022-07-24 01:46:24'),
(799, 151, 'Chukotka', '2022-07-24 01:46:34', '2022-07-24 01:46:34'),
(800, 151, 'Yamalo-Nenets', '2022-07-24 01:46:45', '2022-07-24 01:46:45'),
(801, 151, 'Crimea', '2022-07-24 01:47:05', '2022-07-24 01:47:05'),
(802, 151, 'Sevastopol', '2022-07-24 01:47:18', '2022-07-24 01:47:18'),
(803, 150, 'Macroregiunea', '2022-07-24 01:49:20', '2022-07-24 01:49:20'),
(804, 150, 'Nord-Vest', '2022-07-24 01:50:05', '2022-07-24 01:50:05'),
(805, 150, 'Centru', '2022-07-24 01:50:16', '2022-07-24 01:50:16'),
(806, 150, 'Nord-Est', '2022-07-24 01:50:26', '2022-07-24 01:50:26'),
(807, 150, 'Sud-Est', '2022-07-24 01:50:38', '2022-07-24 01:50:38'),
(808, 150, 'Sud - Muntenia', '2022-07-24 01:50:48', '2022-07-24 01:50:48'),
(809, 150, 'București - Ilfov', '2022-07-24 01:50:59', '2022-07-24 01:50:59'),
(810, 150, 'Sud-Vest Oltenia', '2022-07-24 01:51:11', '2022-07-24 01:51:11'),
(811, 150, 'Vest', '2022-07-24 01:51:21', '2022-07-24 01:51:21'),
(812, 148, 'Lisbon', '2022-07-24 01:52:36', '2022-07-24 01:52:36'),
(813, 148, 'Leiria', '2022-07-24 01:52:47', '2022-07-24 01:52:47'),
(814, 148, 'Santarém', '2022-07-24 01:52:59', '2022-07-24 01:52:59'),
(815, 148, 'Setúbal', '2022-07-24 01:53:10', '2022-07-24 01:53:10'),
(816, 148, 'Beja', '2022-07-24 01:53:25', '2022-07-24 01:53:25'),
(817, 148, 'Faro', '2022-07-24 01:53:36', '2022-07-24 01:53:36'),
(818, 148, 'Évora', '2022-07-24 01:53:46', '2022-07-24 01:53:46'),
(819, 148, 'Portalegre', '2022-07-24 01:54:17', '2022-07-24 01:54:17'),
(820, 148, 'Castelo Branco', '2022-07-24 01:54:31', '2022-07-24 01:54:31'),
(821, 148, 'Guarda', '2022-07-24 01:54:46', '2022-07-24 01:54:46'),
(822, 148, 'Coimbra', '2022-07-24 01:54:57', '2022-07-24 01:54:57'),
(823, 148, 'Aveiro', '2022-07-24 01:55:09', '2022-07-24 01:55:09'),
(824, 148, 'Viseu', '2022-07-24 01:55:20', '2022-07-24 01:55:20'),
(825, 148, 'Bragança', '2022-07-24 01:55:31', '2022-07-24 01:55:31'),
(826, 148, 'Vila Real', '2022-07-24 01:55:43', '2022-07-24 01:55:43'),
(827, 148, 'Porto', '2022-07-24 01:55:53', '2022-07-24 01:55:53'),
(828, 148, 'Braga', '2022-07-24 01:56:03', '2022-07-24 01:56:03'),
(829, 148, 'Viana do Castelo', '2022-07-24 01:56:17', '2022-07-24 01:56:17'),
(830, 147, 'Masovia', '2022-07-25 02:28:27', '2022-07-25 02:28:27'),
(831, 147, 'Lower Silesia', '2022-07-25 02:28:38', '2022-07-25 02:28:38'),
(832, 147, 'Greater Poland', '2022-07-25 02:28:48', '2022-07-25 02:28:48'),
(833, 147, 'Silesia', '2022-07-25 02:28:58', '2022-07-25 02:28:58'),
(834, 147, 'Pomerania', '2022-07-25 02:29:09', '2022-07-25 02:29:09'),
(835, 147, 'Łódź', '2022-07-25 02:29:21', '2022-07-25 02:29:21'),
(836, 147, 'Lesser Poland', '2022-07-25 02:29:44', '2022-07-25 02:29:44'),
(837, 147, 'West Pomerania', '2022-07-25 02:29:55', '2022-07-25 02:29:55'),
(838, 147, 'Lubusz', '2022-07-25 02:30:06', '2022-07-25 02:30:06'),
(839, 147, 'Kujawy-Pomerania', '2022-07-25 02:30:16', '2022-07-25 02:30:16'),
(840, 147, 'Opole', '2022-07-25 02:30:27', '2022-07-25 02:30:27'),
(841, 147, 'Świętokrzyskie', '2022-07-25 02:30:37', '2022-07-25 02:30:37'),
(842, 147, 'Warmia-Masuria', '2022-07-25 02:30:48', '2022-07-25 02:30:48'),
(843, 147, 'Podlaskie', '2022-07-25 02:31:00', '2022-07-25 02:31:00'),
(844, 147, 'Subcarpathian', '2022-07-25 02:31:11', '2022-07-25 02:31:11'),
(845, 147, 'Lublin', '2022-07-25 02:31:24', '2022-07-25 02:31:24'),
(846, 170, 'Seoul', '2022-07-25 02:40:24', '2022-07-25 02:40:24'),
(847, 170, 'Busan', '2022-07-25 02:40:40', '2022-07-25 02:40:40'),
(848, 170, 'Incheon', '2022-07-25 02:40:59', '2022-07-25 02:40:59'),
(849, 170, 'Daegu', '2022-07-25 02:41:15', '2022-07-25 02:41:15'),
(850, 170, 'Gwangju', '2022-07-25 02:41:38', '2022-07-25 02:41:38'),
(851, 170, 'Daejeon', '2022-07-25 02:41:53', '2022-07-25 02:41:53'),
(852, 170, 'Ulsan', '2022-07-25 02:42:06', '2022-07-25 02:42:06'),
(853, 170, 'Sejong', '2022-07-25 02:42:23', '2022-07-25 02:42:23'),
(854, 170, 'Gyeonggi', '2022-07-25 02:42:39', '2022-07-25 02:42:39'),
(855, 170, 'Gangwon', '2022-07-25 02:42:53', '2022-07-25 02:42:53'),
(856, 170, 'North Chungcheong', '2022-07-25 02:43:08', '2022-07-25 02:43:08'),
(857, 170, 'South Chungcheong', '2022-07-25 02:43:29', '2022-07-25 02:43:29'),
(858, 170, 'North Jeolla', '2022-07-25 02:43:46', '2022-07-25 02:43:46'),
(859, 170, 'South Jeolla', '2022-07-25 02:44:00', '2022-07-25 02:44:00'),
(860, 170, 'North Gyeongsang', '2022-07-25 02:44:16', '2022-07-25 02:44:16'),
(861, 170, 'South Gyeongsang', '2022-07-25 02:44:33', '2022-07-25 02:44:33'),
(862, 170, 'Jeju', '2022-07-25 02:44:50', '2022-07-25 02:44:50'),
(863, 86, 'Aceh', '2022-07-25 02:50:20', '2022-07-25 02:50:20'),
(864, 86, 'Bali', '2022-07-25 02:50:30', '2022-07-25 02:50:30'),
(865, 86, 'Bangka Belitung Islands', '2022-07-25 02:50:43', '2022-07-25 02:50:43'),
(866, 86, 'Banten', '2022-07-25 02:50:54', '2022-07-25 02:50:54'),
(867, 86, 'Bengkulu', '2022-07-25 02:51:06', '2022-07-25 02:51:06'),
(868, 86, 'Central Java', '2022-07-25 02:51:21', '2022-07-25 02:51:21'),
(869, 86, 'Central Kalimantan', '2022-07-25 02:51:34', '2022-07-25 02:51:34'),
(870, 86, 'Central Papua', '2022-07-25 02:51:45', '2022-07-25 02:51:45'),
(871, 86, 'Central Sulawesi', '2022-07-25 02:51:55', '2022-07-25 02:51:55'),
(872, 86, 'East Java', '2022-07-25 02:52:05', '2022-07-25 02:52:05'),
(873, 86, 'East Kalimantan', '2022-07-25 02:52:21', '2022-07-25 02:52:21'),
(874, 86, 'East Nusa Tenggara', '2022-07-25 02:52:31', '2022-07-25 02:52:31'),
(875, 86, 'Gorontalo', '2022-07-25 02:52:41', '2022-07-25 02:52:41'),
(876, 86, 'Highland Papua', '2022-07-25 02:52:52', '2022-07-25 02:52:52'),
(877, 86, 'Special Capital Region of Jakarta', '2022-07-25 02:53:08', '2022-07-25 02:53:08'),
(878, 86, 'Jambi', '2022-07-25 02:53:19', '2022-07-25 02:53:19'),
(879, 86, 'Lampung', '2022-07-25 02:53:31', '2022-07-25 02:53:31'),
(880, 86, 'Maluku', '2022-07-25 02:53:48', '2022-07-25 02:53:48'),
(881, 86, 'North Kalimantan', '2022-07-25 02:54:03', '2022-07-25 02:54:03'),
(882, 86, 'North Maluku', '2022-07-25 02:54:16', '2022-07-25 02:54:16'),
(883, 86, 'North Sulawesi', '2022-07-25 02:54:28', '2022-07-25 02:54:28'),
(884, 86, 'North Sumatra', '2022-07-25 02:54:39', '2022-07-25 02:54:39'),
(885, 86, 'Papua', '2022-07-25 02:54:50', '2022-07-25 02:54:50'),
(886, 86, 'Riau', '2022-07-25 02:55:06', '2022-07-25 02:55:06'),
(887, 86, 'Riau Islands', '2022-07-25 02:55:16', '2022-07-25 02:55:16'),
(888, 86, 'Southeast Sulawesi', '2022-07-25 02:55:30', '2022-07-25 02:55:30'),
(889, 86, 'South Kalimantan', '2022-07-25 02:55:39', '2022-07-25 02:55:39'),
(890, 86, 'South Papua', '2022-07-25 02:55:51', '2022-07-25 02:55:51'),
(891, 86, 'South Sulawesi', '2022-07-25 02:56:02', '2022-07-25 02:56:02'),
(892, 86, 'South Sumatra', '2022-07-25 02:56:17', '2022-07-25 02:56:17'),
(893, 86, 'West Java', '2022-07-25 02:56:28', '2022-07-25 02:56:28'),
(894, 86, 'West Kalimantan', '2022-07-25 02:56:41', '2022-07-25 02:56:41'),
(895, 86, 'West Nusa Tenggara', '2022-07-25 02:56:53', '2022-07-25 02:56:53'),
(896, 86, 'West Papua', '2022-07-25 02:57:03', '2022-07-25 02:57:03'),
(897, 86, 'West Sulawesi', '2022-07-25 02:57:14', '2022-07-25 02:57:14'),
(898, 86, 'West Sumatra', '2022-07-25 02:57:28', '2022-07-25 02:57:28'),
(899, 86, 'Special Region of Yogyakarta', '2022-07-25 02:57:48', '2022-07-25 02:57:48'),
(900, 67, 'Lapland', '2022-07-25 03:00:17', '2022-07-25 03:00:17'),
(901, 67, 'North Ostrobothnia', '2022-07-25 03:00:30', '2022-07-25 03:00:30'),
(902, 67, 'Kainuu', '2022-07-25 03:00:40', '2022-07-25 03:00:40'),
(903, 67, 'North Karelia', '2022-07-25 03:00:51', '2022-07-25 03:00:51'),
(904, 67, 'North Savo', '2022-07-25 03:01:03', '2022-07-25 03:01:03'),
(905, 67, 'South Savo', '2022-07-25 03:01:16', '2022-07-25 03:01:16'),
(906, 67, 'South Karelia', '2022-07-25 03:01:26', '2022-07-25 03:01:26'),
(907, 67, 'Central Finland', '2022-07-25 03:01:37', '2022-07-25 03:01:37'),
(908, 67, 'South Ostrobothnia', '2022-07-25 03:01:49', '2022-07-25 03:01:49'),
(909, 67, 'Ostrobothnia', '2022-07-25 03:01:59', '2022-07-25 03:01:59'),
(910, 67, 'Central Ostrobothnia', '2022-07-25 03:02:15', '2022-07-25 03:02:15'),
(911, 67, 'Pirkanmaa', '2022-07-25 03:02:25', '2022-07-25 03:02:25'),
(912, 67, 'Satakunta', '2022-07-25 03:02:36', '2022-07-25 03:02:36'),
(913, 67, 'Päijät-Häme', '2022-07-25 03:02:45', '2022-07-25 03:02:45'),
(914, 67, 'Kanta-Häme', '2022-07-25 03:02:57', '2022-07-25 03:02:57'),
(915, 67, 'Kymenlaakso', '2022-07-25 03:03:09', '2022-07-25 03:03:09'),
(916, 67, 'Uusimaa', '2022-07-25 03:03:21', '2022-07-25 03:03:21'),
(917, 67, 'Southwest Finland', '2022-07-25 03:03:32', '2022-07-25 03:03:32'),
(918, 67, 'Åland', '2022-07-25 03:03:41', '2022-07-25 03:03:41'),
(919, 49, 'Banovina', '2022-07-25 03:06:06', '2022-07-25 03:06:06'),
(920, 49, 'Baranja', '2022-07-25 03:06:22', '2022-07-25 03:06:22'),
(921, 49, 'Croatian Littoral', '2022-07-25 03:06:34', '2022-07-25 03:06:34'),
(922, 49, 'Gorski kotar', '2022-07-25 03:06:43', '2022-07-25 03:06:43'),
(923, 49, 'Konavle', '2022-07-25 03:06:53', '2022-07-25 03:06:53'),
(924, 49, 'Kordun', '2022-07-25 03:07:07', '2022-07-25 03:07:07'),
(925, 49, 'Lika', '2022-07-25 03:07:15', '2022-07-25 03:07:15'),
(926, 49, 'Međimurje', '2022-07-25 03:07:31', '2022-07-25 03:07:31'),
(927, 49, 'Moslavina', '2022-07-25 03:07:42', '2022-07-25 03:07:42'),
(928, 49, 'Podravina', '2022-07-25 03:07:53', '2022-07-25 03:07:53'),
(929, 49, 'Podunavlje', '2022-07-25 03:08:05', '2022-07-25 03:08:05'),
(930, 49, 'Posavina', '2022-07-25 03:08:14', '2022-07-25 03:08:14'),
(931, 49, 'Prigorje', '2022-07-25 03:08:24', '2022-07-25 03:08:24'),
(932, 49, 'Syrmia', '2022-07-25 03:08:54', '2022-07-25 03:08:54'),
(933, 49, 'Turopolje', '2022-07-25 03:09:04', '2022-07-25 03:09:04'),
(934, 49, 'Hrvatsko Zagorje', '2022-07-25 03:09:14', '2022-07-25 03:09:14'),
(935, 49, 'Dalmatinska Zagora', '2022-07-25 03:09:30', '2022-07-25 03:09:30'),
(936, 44, 'Beijing', '2022-07-25 03:11:49', '2022-07-25 03:11:49'),
(937, 44, 'Tianjin', '2022-07-25 03:12:04', '2022-07-25 03:12:04'),
(938, 44, 'Hebei', '2022-07-25 03:12:14', '2022-07-25 03:12:14'),
(939, 44, 'Shanxi', '2022-07-25 03:12:30', '2022-07-25 03:12:30'),
(940, 44, 'Inner Mongolia', '2022-07-25 03:12:56', '2022-07-25 03:12:56'),
(941, 44, 'Liaoning', '2022-07-25 03:13:47', '2022-07-25 03:13:47'),
(942, 44, 'Eastern Inner Mongolia', '2022-07-25 03:14:17', '2022-07-25 03:14:17'),
(943, 44, 'Henan', '2022-07-25 03:14:56', '2022-07-25 03:14:56'),
(944, 44, 'Hubei', '2022-07-25 03:15:12', '2022-07-25 03:15:12'),
(945, 44, 'Hunan', '2022-07-25 03:15:32', '2022-07-25 03:15:32'),
(946, 44, 'Guangdong', '2022-07-25 03:15:48', '2022-07-25 03:15:48'),
(947, 44, 'Guangxi', '2022-07-25 03:16:07', '2022-07-25 03:16:07'),
(948, 44, 'Hainan', '2022-07-25 03:16:21', '2022-07-25 03:16:21'),
(949, 44, 'Hong Kong', '2022-07-25 03:16:36', '2022-07-25 03:16:36'),
(950, 44, 'Macau', '2022-07-25 03:16:48', '2022-07-25 03:16:48'),
(951, 44, 'Chongqing', '2022-07-25 03:17:14', '2022-07-25 03:17:14'),
(952, 44, 'Sichuan', '2022-07-25 03:17:33', '2022-07-25 03:17:33'),
(953, 44, 'Guizhou', '2022-07-25 03:17:50', '2022-07-25 03:17:50'),
(954, 44, 'Yunnan', '2022-07-25 03:18:07', '2022-07-25 03:18:07'),
(955, 44, 'Tibet', '2022-07-25 03:18:20', '2022-07-25 03:18:20'),
(956, 44, 'Shaanxi', '2022-07-25 03:18:34', '2022-07-25 03:18:34'),
(957, 44, 'Gansu', '2022-07-25 03:18:48', '2022-07-25 03:18:48'),
(958, 44, 'Qinghai', '2022-07-25 03:19:01', '2022-07-25 03:19:01'),
(959, 44, 'Ningxia', '2022-07-25 03:19:18', '2022-07-25 03:19:18'),
(960, 44, 'Xinjiang', '2022-07-25 03:19:36', '2022-07-25 03:19:36'),
(961, 177, 'Zürich', '2022-07-25 15:16:07', '2022-07-25 15:16:07'),
(962, 177, 'Berne', '2022-07-25 15:16:23', '2022-07-25 15:16:23'),
(963, 177, 'Luzern', '2022-07-25 15:16:34', '2022-07-25 15:16:34'),
(964, 177, 'Uri', '2022-07-25 15:16:49', '2022-07-25 15:16:49'),
(965, 177, 'Schwyz', '2022-07-25 15:16:59', '2022-07-25 15:16:59'),
(966, 177, 'Obwalden', '2022-07-25 15:17:19', '2022-07-25 15:17:19'),
(967, 177, 'Nidwalden', '2022-07-25 15:17:36', '2022-07-25 15:17:36'),
(968, 177, 'Glarus', '2022-07-25 15:17:46', '2022-07-25 15:17:46'),
(969, 177, 'Zug', '2022-07-25 15:17:57', '2022-07-25 15:17:57'),
(970, 177, 'Freiburg', '2022-07-25 15:18:10', '2022-07-25 15:18:10'),
(971, 177, 'Solothurn', '2022-07-25 15:18:20', '2022-07-25 15:18:20'),
(972, 177, 'Basel-Stadt', '2022-07-25 15:18:29', '2022-07-25 15:18:29'),
(973, 177, 'Basel-Landschaft', '2022-07-25 15:18:42', '2022-07-25 15:18:42'),
(974, 177, 'Schaffhausen', '2022-07-25 15:18:52', '2022-07-25 15:18:52'),
(975, 177, 'Appenzell Ausserrhoden', '2022-07-25 15:19:04', '2022-07-25 15:19:04'),
(976, 177, 'Appenzell Innerrhoden', '2022-07-25 15:19:15', '2022-07-25 15:19:15'),
(977, 177, 'St. Gallen', '2022-07-25 15:19:26', '2022-07-25 15:19:26'),
(978, 177, 'Grischun', '2022-07-25 15:19:53', '2022-07-25 15:19:53'),
(979, 177, 'Aargau', '2022-07-25 15:20:03', '2022-07-25 15:20:03'),
(980, 177, 'Thurgau', '2022-07-25 15:20:12', '2022-07-25 15:20:12'),
(981, 177, 'Ticino', '2022-07-25 15:20:24', '2022-07-25 15:20:24'),
(982, 177, 'Vaud', '2022-07-25 15:20:49', '2022-07-25 15:20:49'),
(983, 177, 'Wallis', '2022-07-25 15:21:00', '2022-07-25 15:21:00'),
(984, 177, 'Neuchâtel', '2022-07-25 15:21:10', '2022-07-25 15:21:10'),
(985, 177, 'Genève', '2022-07-25 15:21:20', '2022-07-25 15:21:20'),
(986, 177, 'Jura', '2022-07-25 15:21:29', '2022-07-25 15:21:29'),
(987, 54, 'Hovedstaden', '2022-07-25 15:24:18', '2022-07-25 15:24:18'),
(988, 54, 'Midtjylland', '2022-07-25 15:24:35', '2022-07-25 15:24:35'),
(989, 54, 'Nordjylland', '2022-07-25 15:24:49', '2022-07-25 15:24:49'),
(990, 54, 'Sjælland', '2022-07-25 15:25:08', '2022-07-25 15:25:08'),
(991, 54, 'Syddanmark', '2022-07-25 15:25:29', '2022-07-25 15:25:29'),
(992, 40, 'British Columbia', '2022-07-25 15:28:12', '2022-07-25 15:28:12'),
(993, 40, 'Alberta', '2022-07-25 15:28:23', '2022-07-25 15:28:23'),
(994, 40, 'Saskatchewan', '2022-07-25 15:28:33', '2022-07-25 15:28:33'),
(995, 40, 'Manitoba', '2022-07-25 15:28:46', '2022-07-25 15:28:46'),
(996, 40, 'Ontario', '2022-07-25 15:29:00', '2022-07-25 15:29:00'),
(997, 40, 'Quebec', '2022-07-25 15:29:10', '2022-07-25 15:29:10'),
(998, 40, 'New Brunswick', '2022-07-25 15:29:19', '2022-07-25 15:29:19'),
(999, 40, 'Prince Edward Island', '2022-07-25 15:29:31', '2022-07-25 15:29:31'),
(1000, 40, 'Nova Scotia', '2022-07-25 15:29:44', '2022-07-25 15:29:44'),
(1001, 40, 'Newfoundland and Labrador', '2022-07-25 15:29:54', '2022-07-25 15:29:54'),
(1002, 40, 'Yukon', '2022-07-25 15:30:03', '2022-07-25 15:30:03'),
(1003, 40, 'Northwest Territories', '2022-07-25 15:30:13', '2022-07-25 15:30:13'),
(1004, 38, 'Banteay Meanchey', '2022-07-25 15:32:31', '2022-07-25 15:32:31'),
(1005, 40, 'Nunavut', '2022-07-25 15:32:43', '2022-07-25 15:32:43'),
(1006, 38, 'Battambang', '2022-07-25 15:33:00', '2022-07-25 15:33:00'),
(1007, 38, 'Kampong Cham', '2022-07-25 15:33:11', '2022-07-25 15:33:11'),
(1008, 38, 'Kampong Chhnang', '2022-07-25 15:33:30', '2022-07-25 15:33:30'),
(1009, 38, 'Kampong Speu', '2022-07-25 15:33:48', '2022-07-25 15:33:48'),
(1010, 38, 'Kampong Thom', '2022-07-25 15:33:58', '2022-07-25 15:33:58'),
(1011, 38, 'Kampot', '2022-07-25 15:34:07', '2022-07-25 15:34:07'),
(1012, 38, 'Kandal', '2022-07-25 15:34:16', '2022-07-25 15:34:16'),
(1013, 38, 'Koh Kong', '2022-07-25 15:34:26', '2022-07-25 15:34:26'),
(1014, 38, 'Kratié', '2022-07-25 15:34:39', '2022-07-25 15:34:39'),
(1015, 38, 'Mondulkiri', '2022-07-25 15:34:48', '2022-07-25 15:34:48'),
(1016, 38, 'Phnom Penh', '2022-07-25 15:35:00', '2022-07-25 15:35:00'),
(1017, 38, 'Preah Vihear', '2022-07-25 15:35:09', '2022-07-25 15:35:09'),
(1018, 38, 'Prey Veng', '2022-07-25 15:35:20', '2022-07-25 15:35:20'),
(1019, 38, 'Pursat', '2022-07-25 15:35:31', '2022-07-25 15:35:31'),
(1020, 38, 'Ratanakiri', '2022-07-25 15:35:52', '2022-07-25 15:35:52'),
(1021, 38, 'Siem Reap', '2022-07-25 15:36:06', '2022-07-25 15:36:06'),
(1022, 38, 'Preah Sihanouk', '2022-07-25 15:36:18', '2022-07-25 15:36:18'),
(1023, 38, 'Stung Treng', '2022-07-25 15:36:30', '2022-07-25 15:36:30'),
(1024, 38, 'Svay Rieng', '2022-07-25 15:36:41', '2022-07-25 15:36:41'),
(1025, 38, 'Takéo', '2022-07-25 15:37:07', '2022-07-25 15:37:07'),
(1026, 38, 'Oddar Meanchey', '2022-07-25 15:37:18', '2022-07-25 15:37:18'),
(1027, 38, 'Kep', '2022-07-25 15:37:26', '2022-07-25 15:37:26'),
(1028, 38, 'Pailin', '2022-07-25 15:37:35', '2022-07-25 15:37:35'),
(1029, 38, 'Tboung Khmum', '2022-07-25 15:37:44', '2022-07-25 15:37:44'),
(1030, 39, 'Adamawa', '2022-07-25 15:39:29', '2022-07-25 15:39:29'),
(1031, 39, 'Central', '2022-07-25 15:39:44', '2022-07-25 15:39:44'),
(1032, 39, 'East', '2022-07-25 15:40:03', '2022-07-25 15:40:03'),
(1033, 39, 'Far North', '2022-07-25 15:40:30', '2022-07-25 15:40:30'),
(1034, 39, 'Littoral  Cameroon', '2022-07-25 15:41:06', '2022-07-25 15:41:06'),
(1035, 39, 'North', '2022-07-25 15:41:18', '2022-07-25 15:41:18'),
(1036, 39, 'Northwest', '2022-07-25 15:41:36', '2022-07-25 15:41:36'),
(1037, 39, 'South', '2022-07-25 15:41:54', '2022-07-25 15:41:54'),
(1038, 39, 'Southwest', '2022-07-25 15:42:08', '2022-07-25 15:42:08'),
(1039, 39, 'West', '2022-07-25 15:42:20', '2022-07-25 15:42:20'),
(1040, 43, 'Arica and Parinacota', '2022-07-25 15:49:01', '2022-07-25 15:49:01'),
(1041, 43, 'Tarapacá', '2022-07-25 15:49:18', '2022-07-25 15:49:18'),
(1042, 43, 'Antofagasta', '2022-07-25 15:49:30', '2022-07-25 15:49:30'),
(1043, 43, 'Atacama', '2022-07-25 15:49:40', '2022-07-25 15:49:40'),
(1044, 43, 'Coquimbo', '2022-07-25 15:49:49', '2022-07-25 15:49:49'),
(1045, 43, 'Valparaíso', '2022-07-25 15:49:59', '2022-07-25 15:49:59'),
(1046, 43, 'Metropolitan', '2022-07-25 15:50:16', '2022-07-25 15:50:16'),
(1047, 43, 'O\'Higgins', '2022-07-25 15:50:25', '2022-07-25 15:50:25'),
(1048, 43, 'Maule', '2022-07-25 15:50:34', '2022-07-25 15:50:34'),
(1049, 43, 'Ñuble', '2022-07-25 15:50:46', '2022-07-25 15:50:46'),
(1050, 43, 'Biobío', '2022-07-25 15:50:55', '2022-07-25 15:50:55'),
(1051, 43, 'Araucanía', '2022-07-25 15:51:08', '2022-07-25 15:51:08'),
(1052, 43, 'Los Ríos', '2022-07-25 15:51:18', '2022-07-25 15:51:18'),
(1053, 43, 'Los Lagos', '2022-07-25 15:51:28', '2022-07-25 15:51:28'),
(1054, 43, 'Aysén', '2022-07-25 15:51:38', '2022-07-25 15:51:38'),
(1055, 43, 'Magallanes', '2022-07-25 15:51:47', '2022-07-25 15:51:47'),
(1056, 45, 'Antioquia', '2022-07-25 15:53:01', '2022-07-25 15:53:01'),
(1057, 45, 'Atlantico', '2022-07-25 15:53:15', '2022-07-25 15:53:15'),
(1058, 45, 'Bolívar', '2022-07-25 15:53:28', '2022-07-25 15:53:28'),
(1059, 45, 'Boyacá', '2022-07-25 15:53:41', '2022-07-25 15:53:41'),
(1060, 45, 'Caldas', '2022-07-25 15:53:55', '2022-07-25 15:53:55'),
(1061, 45, 'Cauca', '2022-07-25 15:54:12', '2022-07-25 15:54:12'),
(1062, 45, 'Chocó', '2022-07-25 15:54:24', '2022-07-25 15:54:24'),
(1063, 45, 'Cordoba', '2022-07-25 15:54:37', '2022-07-25 15:54:37'),
(1064, 45, 'Cundinamarca', '2022-07-25 15:54:56', '2022-07-25 15:54:56'),
(1065, 45, 'Huila Colombia', '2022-07-25 15:55:42', '2022-07-25 15:55:42'),
(1066, 45, 'La Guajira', '2022-07-25 15:55:56', '2022-07-25 15:55:56'),
(1067, 45, 'Meta', '2022-07-25 15:56:07', '2022-07-25 15:56:07'),
(1068, 45, 'Nariño', '2022-07-25 15:56:17', '2022-07-25 15:56:17'),
(1069, 45, 'Norte de Santander', '2022-07-25 15:56:30', '2022-07-25 15:56:30'),
(1070, 45, 'Santander', '2022-07-25 15:56:41', '2022-07-25 15:56:41'),
(1071, 45, 'Sucre', '2022-07-25 15:56:52', '2022-07-25 15:56:52'),
(1072, 45, 'Tolima', '2022-07-25 15:57:04', '2022-07-25 15:57:04'),
(1073, 45, 'Valle del Cauca', '2022-07-25 15:57:16', '2022-07-25 15:57:16'),
(1074, 48, 'Alajuela', '2022-07-25 15:57:59', '2022-07-25 15:57:59'),
(1075, 48, 'Cartago', '2022-07-25 15:58:12', '2022-07-25 15:58:12'),
(1076, 48, 'Guanacaste', '2022-07-25 15:58:23', '2022-07-25 15:58:23'),
(1077, 48, 'Heredia', '2022-07-25 15:58:32', '2022-07-25 15:58:32'),
(1078, 48, 'Limón', '2022-07-25 15:58:41', '2022-07-25 15:58:41'),
(1079, 48, 'Puntarenas', '2022-07-25 15:58:53', '2022-07-25 15:58:53'),
(1080, 48, 'San José', '2022-07-25 15:59:07', '2022-07-25 15:59:07'),
(1081, 51, 'Famagusta', '2022-07-25 15:59:55', '2022-07-25 15:59:55'),
(1082, 51, 'Kyrenia', '2022-07-25 16:00:05', '2022-07-25 16:00:05'),
(1083, 51, 'Larnaca', '2022-07-25 16:00:14', '2022-07-25 16:00:14'),
(1084, 51, 'Limassol', '2022-07-25 16:00:23', '2022-07-25 16:00:23'),
(1085, 51, 'Nicosia', '2022-07-25 16:00:32', '2022-07-25 16:00:32'),
(1086, 51, 'Paphos', '2022-07-25 16:00:44', '2022-07-25 16:00:44'),
(1087, 52, 'Prague', '2022-07-25 16:01:32', '2022-07-25 16:01:32'),
(1088, 52, 'Central Bohemian', '2022-07-25 16:01:43', '2022-07-25 16:01:43'),
(1089, 52, 'South Bohemian', '2022-07-25 16:02:02', '2022-07-25 16:02:02'),
(1090, 52, 'Plzeň', '2022-07-25 16:02:12', '2022-07-25 16:02:12'),
(1091, 52, 'Karlovy Vary', '2022-07-25 16:02:22', '2022-07-25 16:02:22'),
(1092, 52, 'Ústí nad Labem', '2022-07-25 16:02:40', '2022-07-25 16:02:40'),
(1093, 52, 'Liberec', '2022-07-25 16:02:49', '2022-07-25 16:02:49'),
(1094, 52, 'Hradec Králové', '2022-07-25 16:02:58', '2022-07-25 16:02:58'),
(1095, 52, 'Pardubice', '2022-07-25 16:03:07', '2022-07-25 16:03:07'),
(1096, 52, 'Vysočina', '2022-07-25 16:03:19', '2022-07-25 16:03:19'),
(1097, 52, 'South Moravian', '2022-07-25 16:03:29', '2022-07-25 16:03:29'),
(1098, 52, 'Olomouc', '2022-07-25 16:03:38', '2022-07-25 16:03:38'),
(1099, 52, 'Zlín', '2022-07-25 16:03:48', '2022-07-25 16:03:48'),
(1100, 52, 'Moravian-Silesian', '2022-07-25 16:04:01', '2022-07-25 16:04:01'),
(1101, 58, 'Azuay', '2022-07-25 16:04:58', '2022-07-25 16:04:58'),
(1102, 58, 'Bolívar Ecuador', '2022-07-25 16:05:22', '2022-07-25 16:05:22'),
(1103, 58, 'Cañar', '2022-07-25 16:05:32', '2022-07-25 16:05:32'),
(1104, 58, 'Carchi', '2022-07-25 16:05:39', '2022-07-25 16:05:39'),
(1105, 58, 'Chimborazo', '2022-07-25 16:05:54', '2022-07-25 16:05:54'),
(1106, 58, 'Cotopaxi', '2022-07-25 16:06:03', '2022-07-25 16:06:03'),
(1107, 58, 'El Oro', '2022-07-25 16:06:14', '2022-07-25 16:06:14'),
(1108, 58, 'Esmeraldas', '2022-07-25 16:06:26', '2022-07-25 16:06:26'),
(1109, 58, 'Galápagos', '2022-07-25 16:06:38', '2022-07-25 16:06:38'),
(1110, 58, 'Guayas', '2022-07-25 16:06:48', '2022-07-25 16:06:48'),
(1111, 58, 'Imbabura', '2022-07-25 16:06:55', '2022-07-25 16:06:55'),
(1112, 58, 'Loja', '2022-07-25 16:07:05', '2022-07-25 16:07:05'),
(1113, 58, 'Los Ríos Ecuador', '2022-07-25 16:07:26', '2022-07-25 16:07:26'),
(1114, 58, 'Manabí', '2022-07-25 16:07:36', '2022-07-25 16:07:36'),
(1115, 58, 'Morona Santiago', '2022-07-25 16:07:46', '2022-07-25 16:07:46'),
(1116, 58, 'Napo', '2022-07-25 16:07:55', '2022-07-25 16:07:55'),
(1117, 58, 'Orellana', '2022-07-25 16:08:03', '2022-07-25 16:08:03'),
(1118, 58, 'Pastaza', '2022-07-25 16:08:21', '2022-07-25 16:08:21'),
(1119, 58, 'Pichincha', '2022-07-25 16:08:29', '2022-07-25 16:08:29'),
(1120, 58, 'Santa Elena', '2022-07-25 16:08:38', '2022-07-25 16:08:38'),
(1121, 58, 'Santo Domingo de los Tsáchilas', '2022-07-25 16:08:50', '2022-07-25 16:08:50'),
(1122, 58, 'Sucumbíos', '2022-07-25 16:08:59', '2022-07-25 16:08:59'),
(1123, 58, 'Tungurahua', '2022-07-25 16:09:10', '2022-07-25 16:09:10'),
(1124, 58, 'Zamora Chinchipe', '2022-07-25 16:09:20', '2022-07-25 16:09:20'),
(1125, 59, 'Greater Cairo Region', '2022-07-25 16:10:09', '2022-07-25 16:10:09'),
(1126, 59, 'Alexandria', '2022-07-25 16:10:28', '2022-07-25 16:10:28'),
(1127, 59, 'Delta', '2022-07-25 16:10:37', '2022-07-25 16:10:37'),
(1128, 59, 'Suez Canal', '2022-07-25 16:10:47', '2022-07-25 16:10:47'),
(1129, 59, 'North Upper Egypt', '2022-07-25 16:10:58', '2022-07-25 16:10:58'),
(1130, 59, 'Central Upper Egypt', '2022-07-25 16:11:09', '2022-07-25 16:11:09'),
(1131, 59, 'Southern Upper Egypt', '2022-07-25 16:11:19', '2022-07-25 16:11:19'),
(1132, 60, 'Ahuachapán', '2022-07-25 16:12:08', '2022-07-25 16:12:08'),
(1133, 60, 'Cabañas', '2022-07-25 16:12:17', '2022-07-25 16:12:17'),
(1134, 60, 'Chalatenango', '2022-07-25 16:12:29', '2022-07-25 16:12:29'),
(1135, 60, 'Cuscatlán', '2022-07-25 16:12:38', '2022-07-25 16:12:38'),
(1136, 60, 'La Libertad', '2022-07-25 16:12:52', '2022-07-25 16:12:52'),
(1137, 60, 'La Paz El Salvador', '2022-07-25 16:13:15', '2022-07-25 16:13:15'),
(1138, 60, 'La Unión', '2022-07-25 16:13:24', '2022-07-25 16:13:24'),
(1139, 60, 'Morazán', '2022-07-25 16:13:36', '2022-07-25 16:13:36'),
(1140, 60, 'San Miguel', '2022-07-25 16:13:48', '2022-07-25 16:13:48'),
(1141, 60, 'San Salvador El Salvador', '2022-07-25 16:14:24', '2022-07-25 16:14:24'),
(1142, 60, 'San Vicente', '2022-07-25 16:14:35', '2022-07-25 16:14:35'),
(1143, 60, 'Santa Ana', '2022-07-25 16:14:46', '2022-07-25 16:14:46'),
(1144, 60, 'Sonsonate', '2022-07-25 16:14:56', '2022-07-25 16:14:56'),
(1145, 60, 'Usulután', '2022-07-25 16:15:03', '2022-07-25 16:15:03'),
(1146, 74, 'Attica', '2022-07-25 16:16:08', '2022-07-25 16:16:08'),
(1147, 74, 'Central Greece', '2022-07-25 16:16:18', '2022-07-25 16:16:18'),
(1148, 74, 'Central Macedonia', '2022-07-25 16:16:27', '2022-07-25 16:16:27'),
(1149, 74, 'Crete', '2022-07-25 16:16:35', '2022-07-25 16:16:35'),
(1150, 74, 'Eastern Macedonia and Thrace', '2022-07-25 16:16:45', '2022-07-25 16:16:45'),
(1151, 74, 'Epirus', '2022-07-25 16:16:53', '2022-07-25 16:16:53'),
(1152, 74, 'Ionian Islands', '2022-07-25 16:17:03', '2022-07-25 16:17:03'),
(1153, 74, 'North Aegean', '2022-07-25 16:17:11', '2022-07-25 16:17:11'),
(1154, 74, 'Peloponnese', '2022-07-25 16:17:22', '2022-07-25 16:17:22'),
(1155, 74, 'South Aegean', '2022-07-25 16:17:38', '2022-07-25 16:17:38'),
(1156, 74, 'Thessaly', '2022-07-25 16:17:49', '2022-07-25 16:17:49'),
(1157, 74, 'Western Greece', '2022-07-25 16:17:59', '2022-07-25 16:17:59'),
(1158, 74, 'Western Macedonia', '2022-07-25 16:18:08', '2022-07-25 16:18:08'),
(1159, 74, 'Mount Athos', '2022-07-25 16:18:18', '2022-07-25 16:18:18'),
(1160, 76, 'Guatemala city', '2022-07-25 16:19:27', '2022-07-25 16:19:27'),
(1161, 76, 'Alta Verapaz', '2022-07-25 16:19:38', '2022-07-25 16:19:38'),
(1162, 76, 'Baja Verapaz', '2022-07-25 16:19:51', '2022-07-25 16:19:51'),
(1163, 76, 'Chiquimula', '2022-07-25 16:20:01', '2022-07-25 16:20:01'),
(1164, 76, 'El Progreso', '2022-07-25 16:20:10', '2022-07-25 16:20:10'),
(1165, 76, 'Izabal', '2022-07-25 16:20:19', '2022-07-25 16:20:19'),
(1166, 76, 'Zacapa', '2022-07-25 16:20:29', '2022-07-25 16:20:29'),
(1167, 76, 'Jutiapa', '2022-07-25 16:20:43', '2022-07-25 16:20:43'),
(1168, 76, 'Jalapa', '2022-07-25 16:20:58', '2022-07-25 16:20:58'),
(1169, 76, 'Santa Rosa', '2022-07-25 16:21:11', '2022-07-25 16:21:11'),
(1170, 76, 'Chimaltenango', '2022-07-25 16:21:20', '2022-07-25 16:21:20'),
(1171, 76, 'Sacatepéquez', '2022-07-25 16:21:29', '2022-07-25 16:21:29'),
(1172, 76, 'Escuintla', '2022-07-25 16:21:38', '2022-07-25 16:21:38'),
(1173, 76, 'Quetzaltenango', '2022-07-25 16:21:48', '2022-07-25 16:21:48'),
(1174, 76, 'Retalhuleu', '2022-07-25 16:21:58', '2022-07-25 16:21:58'),
(1175, 76, 'San Marcos', '2022-07-25 16:22:06', '2022-07-25 16:22:06'),
(1176, 76, 'Suchitepéquez', '2022-07-25 16:22:15', '2022-07-25 16:22:15'),
(1177, 76, 'Sololá', '2022-07-25 16:22:24', '2022-07-25 16:22:24'),
(1178, 76, 'Totonicapán', '2022-07-25 16:22:33', '2022-07-25 16:22:33'),
(1179, 76, 'Huehuetenango', '2022-07-25 16:22:44', '2022-07-25 16:22:44'),
(1180, 76, 'Quiché', '2022-07-25 16:22:53', '2022-07-25 16:22:53'),
(1181, 76, 'Petén', '2022-07-25 16:23:02', '2022-07-25 16:23:02'),
(1182, 82, 'Atlántida', '2022-07-25 16:25:24', '2022-07-25 16:25:24'),
(1183, 82, 'Choluteca', '2022-07-25 16:25:40', '2022-07-25 16:25:40'),
(1184, 82, 'Colón', '2022-07-25 16:25:50', '2022-07-25 16:25:50'),
(1185, 82, 'Comayagua', '2022-07-25 16:26:00', '2022-07-25 16:26:00'),
(1186, 82, 'Copán', '2022-07-25 16:26:09', '2022-07-25 16:26:09'),
(1187, 82, 'Cortés', '2022-07-25 16:26:17', '2022-07-25 16:26:17'),
(1188, 82, 'El Paraíso', '2022-07-25 16:26:27', '2022-07-25 16:26:27'),
(1189, 82, 'Francisco Morazán', '2022-07-25 16:26:43', '2022-07-25 16:26:43'),
(1190, 82, 'Gracias a Dios', '2022-07-25 16:26:53', '2022-07-25 16:26:53'),
(1191, 82, 'Intibucá', '2022-07-25 16:27:08', '2022-07-25 16:27:08'),
(1192, 82, 'Islas de la Bahía', '2022-07-25 16:27:22', '2022-07-25 16:27:22'),
(1193, 82, 'La Paz Honduras', '2022-07-25 16:27:37', '2022-07-25 16:27:37'),
(1194, 82, 'Lempira', '2022-07-25 16:27:47', '2022-07-25 16:27:47'),
(1195, 82, 'Ocotepeque', '2022-07-25 16:27:58', '2022-07-25 16:27:58'),
(1196, 82, 'Olancho', '2022-07-25 16:28:08', '2022-07-25 16:28:08'),
(1197, 82, 'Santa Bárbara', '2022-07-25 16:28:17', '2022-07-25 16:28:17'),
(1198, 82, 'Valle', '2022-07-25 16:28:26', '2022-07-25 16:28:26'),
(1199, 82, 'Yoro', '2022-07-25 16:28:34', '2022-07-25 16:28:34'),
(1200, 83, 'Észak-Magyaroszág', '2022-07-25 16:29:29', '2022-07-25 16:29:29'),
(1201, 83, 'Észak-Alföld', '2022-07-25 16:29:40', '2022-07-25 16:29:40'),
(1202, 83, 'Dél-Alföld', '2022-07-25 16:29:51', '2022-07-25 16:29:51'),
(1203, 83, 'Közép-Magyarország', '2022-07-25 16:30:02', '2022-07-25 16:30:02'),
(1204, 83, 'Közép-Dunántúl', '2022-07-25 16:30:12', '2022-07-25 16:30:12'),
(1205, 83, 'Nyugat-Dunántúl', '2022-07-25 16:30:26', '2022-07-25 16:30:26'),
(1206, 83, 'Dél-Dunántúl', '2022-07-25 16:30:36', '2022-07-25 16:30:36'),
(1207, 84, 'Höfuðborgarsvæðið', '2022-07-25 16:31:19', '2022-07-25 16:31:19'),
(1208, 84, 'Suðurnes', '2022-07-25 16:31:29', '2022-07-25 16:31:29'),
(1209, 84, 'Vesturland', '2022-07-25 16:31:39', '2022-07-25 16:31:39'),
(1210, 84, 'Vestfirðir', '2022-07-25 16:31:47', '2022-07-25 16:31:47'),
(1211, 84, 'Norðurland vestra', '2022-07-25 16:32:26', '2022-07-25 16:32:26'),
(1212, 84, 'Norðurland eystra', '2022-07-25 16:32:53', '2022-07-25 16:32:53'),
(1213, 84, 'Austurland', '2022-07-25 16:33:03', '2022-07-25 16:33:03'),
(1214, 84, 'Suðurland', '2022-07-25 16:33:11', '2022-07-25 16:33:11'),
(1215, 85, 'Andhra Pradesh', '2022-07-25 16:37:02', '2022-07-25 16:37:02'),
(1216, 85, 'Arunachal Pradesh', '2022-07-25 16:37:16', '2022-07-25 16:37:16'),
(1217, 85, 'Assam', '2022-07-25 16:37:24', '2022-07-25 16:37:24'),
(1218, 85, 'Bihar', '2022-07-25 16:37:33', '2022-07-25 16:37:33'),
(1219, 85, 'Chhattisgarh', '2022-07-25 16:37:42', '2022-07-25 16:37:42'),
(1220, 85, 'Goa', '2022-07-25 16:37:53', '2022-07-25 16:37:53'),
(1221, 85, 'Gujarat', '2022-07-25 16:38:02', '2022-07-25 16:38:02'),
(1222, 85, 'Haryana', '2022-07-25 16:38:16', '2022-07-25 16:38:16'),
(1223, 85, 'Himachal Pradesh', '2022-07-25 16:38:33', '2022-07-25 16:38:33'),
(1224, 85, 'Telangana', '2022-07-25 16:38:46', '2022-07-25 16:38:46'),
(1225, 85, 'Jharkhand', '2022-07-25 16:39:03', '2022-07-25 16:39:03'),
(1226, 85, 'Karnataka', '2022-07-25 16:39:14', '2022-07-25 16:39:14'),
(1227, 85, 'Kerala', '2022-07-25 16:39:31', '2022-07-25 16:39:31'),
(1228, 85, 'Madhya Pradesh', '2022-07-25 16:39:45', '2022-07-25 16:39:45'),
(1229, 85, 'Maharashtra', '2022-07-25 16:39:56', '2022-07-25 16:39:56'),
(1230, 85, 'Manipur', '2022-07-25 16:40:05', '2022-07-25 16:40:05'),
(1231, 85, 'Meghalaya', '2022-07-25 16:40:18', '2022-07-25 16:40:18'),
(1232, 85, 'Mizoram', '2022-07-25 16:40:32', '2022-07-25 16:40:32'),
(1233, 85, 'Nagaland', '2022-07-25 16:40:43', '2022-07-25 16:40:43'),
(1234, 85, 'Odisha', '2022-07-25 16:40:52', '2022-07-25 16:40:52'),
(1235, 85, 'Punjab', '2022-07-25 16:41:03', '2022-07-25 16:41:03'),
(1236, 85, 'Rajasthan', '2022-07-25 16:41:12', '2022-07-25 16:41:12'),
(1237, 85, 'Sikkim', '2022-07-25 16:41:21', '2022-07-25 16:41:21'),
(1238, 85, 'Tamil Nadu', '2022-07-25 16:41:30', '2022-07-25 16:41:30'),
(1239, 85, 'Tripura', '2022-07-25 16:41:39', '2022-07-25 16:41:39'),
(1240, 85, 'Uttar Pradesh', '2022-07-25 16:41:47', '2022-07-25 16:41:47'),
(1241, 85, 'Uttarakhand', '2022-07-25 16:41:55', '2022-07-25 16:41:55'),
(1242, 85, 'West Bengal', '2022-07-25 16:42:04', '2022-07-25 16:42:04'),
(1243, 85, 'Andaman and Nicobar Islands', '2022-07-25 16:42:15', '2022-07-25 16:42:15'),
(1244, 85, 'Chandigarh', '2022-07-25 16:42:24', '2022-07-25 16:42:24'),
(1245, 85, 'Dadra and Nagar Haveli and Daman and Diu', '2022-07-25 16:42:34', '2022-07-25 16:42:34'),
(1246, 85, 'Jammu and Kashmir', '2022-07-25 16:42:45', '2022-07-25 16:42:45'),
(1247, 85, 'Lakshadweep', '2022-07-25 16:42:54', '2022-07-25 16:42:54'),
(1248, 85, 'Delhi', '2022-07-25 16:43:02', '2022-07-25 16:43:02'),
(1249, 85, 'Puducherry', '2022-07-25 16:43:10', '2022-07-25 16:43:10'),
(1250, 85, 'Ladakh', '2022-07-25 16:43:18', '2022-07-25 16:43:18'),
(1251, 93, 'Hokkaido', '2022-07-25 16:45:16', '2022-07-25 16:45:16'),
(1252, 93, 'Tohoku', '2022-07-25 16:45:33', '2022-07-25 16:45:33'),
(1253, 93, 'Kanto', '2022-07-25 16:45:45', '2022-07-25 16:45:45'),
(1254, 93, 'Chubu', '2022-07-25 16:45:57', '2022-07-25 16:45:57'),
(1255, 93, 'Kansai', '2022-07-25 16:46:09', '2022-07-25 16:46:09'),
(1256, 93, 'Chugoku', '2022-07-25 16:46:19', '2022-07-25 16:46:19'),
(1257, 93, 'Shikoku', '2022-07-25 16:46:33', '2022-07-25 16:46:33'),
(1258, 93, 'Kyushu', '2022-07-25 16:46:46', '2022-07-25 16:46:46'),
(1259, 87, 'Tehran', '2022-07-25 16:49:14', '2022-07-25 16:49:14'),
(1260, 87, 'Isfahan', '2022-07-25 16:49:26', '2022-07-25 16:49:26'),
(1261, 87, 'Tabriz', '2022-07-25 16:49:37', '2022-07-25 16:49:37'),
(1262, 87, 'Kermanshah', '2022-07-25 16:49:47', '2022-07-25 16:49:47'),
(1263, 87, 'Mashhad', '2022-07-25 16:49:57', '2022-07-25 16:49:57'),
(1264, 22, 'North Barbados', '2022-07-25 16:51:39', '2022-07-25 16:51:39'),
(1265, 22, 'South Barbados', '2022-07-25 16:51:52', '2022-07-25 16:51:52'),
(1266, 22, 'Bridgetown', '2022-07-25 16:52:11', '2022-07-25 16:52:11'),
(1267, 89, 'Antrim', '2022-07-25 16:55:57', '2022-07-25 16:55:57'),
(1268, 89, 'Armagh', '2022-07-25 16:56:14', '2022-07-25 16:56:14'),
(1269, 89, 'Carlow', '2022-07-25 16:56:28', '2022-07-25 16:56:28'),
(1270, 89, 'Cavan', '2022-07-25 16:56:38', '2022-07-25 16:56:38'),
(1271, 89, 'Clare', '2022-07-25 16:56:50', '2022-07-25 16:56:50'),
(1272, 89, 'Cork', '2022-07-25 16:56:59', '2022-07-25 16:56:59'),
(1273, 89, 'Donegal', '2022-07-25 16:57:10', '2022-07-25 16:57:10'),
(1274, 89, 'Down', '2022-07-25 16:57:22', '2022-07-25 16:57:22'),
(1275, 89, 'Dublin', '2022-07-25 16:57:33', '2022-07-25 16:57:33'),
(1276, 89, 'Dún Laoghaire–Rathdown', '2022-07-25 16:57:45', '2022-07-25 16:57:45'),
(1277, 89, 'Fingal', '2022-07-25 16:57:59', '2022-07-25 16:57:59'),
(1278, 89, 'South Dublin', '2022-07-25 16:58:10', '2022-07-25 16:58:10'),
(1279, 89, 'Fermanagh', '2022-07-25 16:58:21', '2022-07-25 16:58:21'),
(1280, 89, 'Galway', '2022-07-25 16:58:30', '2022-07-25 16:58:30'),
(1281, 89, 'Kerry', '2022-07-25 16:58:39', '2022-07-25 16:58:39'),
(1282, 89, 'Kildare', '2022-07-25 16:58:48', '2022-07-25 16:58:48'),
(1283, 89, 'Kilkenny', '2022-07-25 16:58:58', '2022-07-25 16:58:58'),
(1284, 89, 'Laois', '2022-07-25 16:59:13', '2022-07-25 16:59:13'),
(1285, 89, 'Leitrim', '2022-07-25 16:59:23', '2022-07-25 16:59:23'),
(1286, 89, 'Limerick', '2022-07-25 16:59:35', '2022-07-25 16:59:35'),
(1287, 89, 'Londonderry', '2022-07-25 16:59:47', '2022-07-25 16:59:47'),
(1288, 89, 'Longford', '2022-07-25 16:59:59', '2022-07-25 16:59:59'),
(1289, 89, 'Louth', '2022-07-25 17:00:10', '2022-07-25 17:00:10'),
(1290, 89, 'Mayo', '2022-07-25 17:00:20', '2022-07-25 17:00:20'),
(1291, 89, 'Meath', '2022-07-25 17:00:35', '2022-07-25 17:00:35'),
(1292, 89, 'Monaghan', '2022-07-25 17:00:46', '2022-07-25 17:00:46'),
(1293, 89, 'Offaly', '2022-07-25 17:00:55', '2022-07-25 17:00:55'),
(1294, 89, 'Roscommon', '2022-07-25 17:01:12', '2022-07-25 17:01:12'),
(1295, 89, 'Sligo', '2022-07-25 17:01:26', '2022-07-25 17:01:26'),
(1296, 89, 'Tipperary', '2022-07-25 17:01:38', '2022-07-25 17:01:38'),
(1297, 89, 'Tyrone', '2022-07-25 17:01:47', '2022-07-25 17:01:47'),
(1298, 89, 'Waterford', '2022-07-25 17:01:59', '2022-07-25 17:01:59'),
(1299, 89, 'Westmeath', '2022-07-25 17:02:10', '2022-07-25 17:02:10'),
(1300, 89, 'Wexford', '2022-07-25 17:02:19', '2022-07-25 17:02:19'),
(1301, 89, 'Wicklow', '2022-07-25 17:02:27', '2022-07-25 17:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `payment_id`, `payment_type`, `plan_id`, `customer_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, '1', 'Manual', 1, 30, '10.00', '2022-06-28 21:00:38', '2022-06-28 21:00:38'),
(2, '1', 'Manual', 1, 30, '10.00', '2022-06-28 21:00:44', '2022-06-28 21:00:44'),
(3, '1', 'Manual', 6, 31, '20.00', '2022-06-28 23:03:52', '2022-06-28 23:03:52'),
(4, '1', 'Manual', 1, 31, '10.00', '2022-06-28 23:12:58', '2022-06-28 23:12:58'),
(5, '1', 'Manual', 1, 28, '10.00', '2022-06-29 01:25:36', '2022-06-29 01:25:36'),
(6, '1', 'Manual', 1, 32, '10.00', '2022-06-29 03:05:49', '2022-06-29 03:05:49'),
(7, '1', 'Manual', 2, 33, '20.00', '2022-06-29 03:51:57', '2022-06-29 03:51:57'),
(8, '1', 'Manual', 2, 36, '20.00', '2022-06-30 10:46:40', '2022-06-30 10:46:40'),
(9, '1', 'Manual', 2, 32, '20.00', '2022-07-01 01:36:34', '2022-07-01 01:36:34'),
(10, '1', 'Manual', 1, 41, '10.00', '2022-07-01 16:54:11', '2022-07-01 16:54:11'),
(11, '1', 'Manual', 2, 41, '20.00', '2022-07-01 18:03:18', '2022-07-01 18:03:18'),
(12, '1', 'Manual', 6, 41, '20.00', '2022-07-01 20:00:15', '2022-07-01 20:00:15'),
(13, '1', 'Manual', 1, 42, '10.00', '2022-07-01 21:13:13', '2022-07-01 21:13:13'),
(14, '1', 'Manual', 2, 42, '20.00', '2022-07-01 21:52:51', '2022-07-01 21:52:51'),
(15, '1', 'Manual', 2, 43, '20.00', '2022-07-02 17:23:31', '2022-07-02 17:23:31'),
(16, '1', 'Manual', 2, 45, '20.00', '2022-07-05 16:19:05', '2022-07-05 16:19:05'),
(17, '1', 'Manual', 2, 46, '20.00', '2022-07-05 16:37:54', '2022-07-05 16:37:54'),
(18, '1', 'Manual', 2, 47, '20.00', '2022-07-05 17:28:26', '2022-07-05 17:28:26'),
(19, '1', 'Manual', 2, 44, '20.00', '2022-07-05 18:02:42', '2022-07-05 18:02:42'),
(20, '1', 'Manual', 1, 44, '10.00', '2022-07-05 20:40:25', '2022-07-05 20:40:25'),
(21, '1', 'Manual', 6, 44, '30.00', '2022-07-05 21:13:45', '2022-07-05 21:13:45'),
(22, '1', 'Manual', 2, 48, '20.00', '2022-07-06 06:41:50', '2022-07-06 06:41:50'),
(23, '1', 'Manual', 2, 36, '20.00', '2022-07-06 18:49:15', '2022-07-06 18:49:15'),
(24, '1', 'Manual', 2, 36, '20.00', '2022-07-06 18:49:20', '2022-07-06 18:49:20'),
(25, '1', 'Manual', 2, 36, '20.00', '2022-07-06 18:50:17', '2022-07-06 18:50:17'),
(26, '1', 'Manual', 2, 36, '20.00', '2022-07-06 18:50:22', '2022-07-06 18:50:22'),
(27, '1', 'Manual', 2, 35, '20.00', '2022-07-06 23:22:32', '2022-07-06 23:22:32'),
(28, '1', 'Manual', 6, 35, '30.00', '2022-07-06 23:46:39', '2022-07-06 23:46:39'),
(29, '1', 'Manual', 2, 50, '20.00', '2022-07-07 14:26:03', '2022-07-07 14:26:03'),
(30, '1', 'Manual', 1, 49, '10.00', '2022-07-07 18:48:17', '2022-07-07 18:48:17'),
(31, '1', 'Manual', 1, 51, '10.00', '2022-07-07 19:28:53', '2022-07-07 19:28:53'),
(32, '1', 'Manual', 6, 52, '30.00', '2022-07-09 23:39:29', '2022-07-09 23:39:29'),
(33, '1', 'Manual', 1, 53, '10.00', '2022-07-10 17:50:04', '2022-07-10 17:50:04'),
(34, '1', 'Manual', 6, 54, '30.00', '2022-07-11 01:58:52', '2022-07-11 01:58:52'),
(35, '1', 'Manual', 1, 56, '10.00', '2022-07-16 19:17:15', '2022-07-16 19:17:15'),
(36, '1', 'Manual', 6, 55, '30.00', '2022-07-18 17:33:14', '2022-07-18 17:33:14'),
(37, '1', 'Manual', 2, 57, '20.00', '2022-07-19 09:30:07', '2022-07-19 09:30:07'),
(38, '1', 'Manual', 6, 58, '30.00', '2022-07-19 09:35:26', '2022-07-19 09:35:26'),
(39, '1', 'Manual', 2, 59, '20.00', '2022-07-19 20:44:51', '2022-07-19 20:44:51'),
(40, '1', 'Manual', 6, 62, '30.00', '2022-07-20 16:23:39', '2022-07-20 16:23:39'),
(41, '1', 'Manual', 6, 63, '30.00', '2022-07-22 20:37:45', '2022-07-22 20:37:45'),
(42, '1', 'Manual', 1, 67, '10.00', '2022-07-24 13:10:54', '2022-07-24 13:10:54'),
(43, '1', 'Manual', 6, 68, '30.00', '2022-07-24 21:22:03', '2022-07-24 21:22:03'),
(44, '1', 'Manual', 6, 68, '30.00', '2022-07-24 21:48:51', '2022-07-24 21:48:51'),
(45, '1', 'Manual', 6, 30, '30.00', '2022-07-24 21:51:22', '2022-07-24 21:51:22'),
(46, '1', 'Manual', 1, 69, '0', '2022-11-05 05:04:48', '2022-11-05 05:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_plans`
--

CREATE TABLE `user_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plans_id` int(11) DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `ad_limit` bigint(20) UNSIGNED NOT NULL DEFAULT 3,
  `featured_limit` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `customer_support` tinyint(1) NOT NULL DEFAULT 0,
  `multiple_image` tinyint(1) NOT NULL DEFAULT 1,
  `badge` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(4) NOT NULL DEFAULT 3 COMMENT '0 =pending, 1 = active, 2 = reject, 3 = default',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_plans`
--

INSERT INTO `user_plans` (`id`, `plans_id`, `customer_id`, `ad_limit`, `featured_limit`, `customer_support`, `multiple_image`, `badge`, `is_active`, `created_at`, `updated_at`) VALUES
(50, 1, 24, 400, 150, 1, 1, 0, 1, '2022-06-13 13:09:18', '2022-06-13 13:10:35'),
(51, 1, 25, 0, 150, 1, 1, 0, 1, '2022-06-16 20:54:14', '2022-06-16 20:56:20'),
(54, 1, 28, 0, 1998, 1, 0, 0, 2, '2022-06-18 16:42:12', '2022-06-29 01:25:36'),
(55, 1, 29, 0, 1998, 1, 0, 0, 1, '2022-06-25 17:20:43', '2022-06-25 17:42:31'),
(56, 1, 30, 0, 10, 1, 1, 1, 1, '2022-06-28 13:42:03', '2022-07-24 21:51:22'),
(57, 1, 31, 0, 0, 1, 1, 1, 1, '2022-06-28 23:03:41', '2022-06-28 23:12:58'),
(58, 1, 32, 0, 0, 1, 1, 0, 1, '2022-06-29 02:16:30', '2022-07-01 01:36:34'),
(59, 1, 33, 0, 0, 1, 1, 0, 1, '2022-06-29 03:51:06', '2022-06-29 03:51:57'),
(60, 1, 34, 0, 0, 1, 1, 0, 3, '2022-06-30 10:34:19', '2022-06-30 10:34:19'),
(61, 1, 35, 0, 10, 1, 1, 1, 1, '2022-06-30 10:36:21', '2022-07-06 23:46:39'),
(62, 1, 36, 0, 0, 1, 1, 0, 1, '2022-06-30 10:46:01', '2022-07-06 18:50:22'),
(63, 1, 37, 0, 0, 1, 1, 0, 3, '2022-06-30 14:58:22', '2022-06-30 14:58:22'),
(64, 1, 38, 0, 0, 1, 1, 0, 0, '2022-06-30 20:41:20', '2022-06-30 20:41:24'),
(65, 1, 41, 3, 10, 1, 1, 1, 1, '2022-11-18 16:51:33', '2023-09-13 20:00:15'),
(66, 1, 42, 0, 0, 1, 1, 0, 1, '2022-07-01 21:02:15', '2022-07-01 21:52:51'),
(67, 1, 43, 0, 0, 1, 1, 0, 1, '2022-07-02 17:20:50', '2022-07-02 17:23:31'),
(68, 1, 44, 5, 9, 1, 1, 1, 1, '2022-07-05 14:29:10', '2022-07-05 21:17:13'),
(69, 1, 45, 0, 0, 1, 1, 0, 2, '2022-07-05 16:15:16', '2022-07-05 16:19:05'),
(70, 1, 46, 0, 0, 1, 1, 0, 1, '2022-07-05 16:35:38', '2022-07-05 16:37:54'),
(71, 1, 47, 5, 7, 1, 1, 0, 1, '2022-11-02 17:11:52', '2023-07-13 17:28:26'),
(72, 1, 48, 0, 0, 1, 1, 0, 1, '2022-07-06 06:40:46', '2022-07-06 06:41:50'),
(73, 1, 49, 0, 0, 1, 0, 0, 1, '2022-07-06 18:02:18', '2022-07-07 18:48:17'),
(74, 1, 50, 0, 0, 1, 1, 0, 1, '2022-07-07 14:21:16', '2022-07-07 14:26:03'),
(75, 1, 51, 0, 0, 1, 0, 0, 1, '2022-07-07 19:17:28', '2022-07-07 19:28:53'),
(76, 1, 52, 0, 19, 1, 1, 1, 1, '2022-07-09 23:38:32', '2022-07-10 01:10:55'),
(77, 1, 53, 0, 0, 1, 0, 0, 1, '2022-07-10 17:07:38', '2022-07-10 17:50:04'),
(78, 1, 54, 0, 20, 1, 1, 1, 1, '2022-07-11 01:56:59', '2022-07-11 01:58:52'),
(79, 1, 55, 0, 20, 1, 1, 1, 1, '2022-07-16 00:09:29', '2022-07-18 17:33:14'),
(80, 1, 56, 0, 0, 1, 0, 0, 1, '2022-07-16 19:09:58', '2022-07-16 19:17:15'),
(81, 1, 57, 0, 0, 1, 1, 0, 1, '2022-07-19 09:29:41', '2022-07-19 09:30:07'),
(82, 1, 58, 0, 10, 1, 1, 1, 1, '2022-07-19 09:35:19', '2022-07-19 09:35:26'),
(83, 1, 59, 0, 0, 1, 1, 0, 1, '2022-07-19 20:43:47', '2022-07-19 20:44:51'),
(84, 1, 60, 0, 0, 1, 0, 0, 0, '2022-07-20 16:14:48', '2022-07-20 16:15:24'),
(85, 1, 61, 0, 0, 1, 1, 0, 0, '2022-07-20 16:18:31', '2022-07-20 16:19:13'),
(86, 1, 62, 0, 19, 1, 1, 1, 1, '2022-07-20 16:22:10', '2022-07-20 17:11:12'),
(87, 1, 63, 0, 20, 1, 1, 1, 1, '2022-07-22 20:36:59', '2022-07-22 20:37:45'),
(88, 1, 64, 0, 10, 1, 1, 1, 3, '2022-07-23 22:59:10', '2022-07-23 22:59:10'),
(89, 1, 65, 0, 0, 1, 0, 0, 0, '2022-07-23 23:31:17', '2022-07-23 23:31:21'),
(90, 1, 66, 0, 0, 1, 0, 0, 0, '2022-07-24 13:07:44', '2022-07-24 13:07:53'),
(91, 1, 67, 0, 0, 1, 0, 0, 1, '2022-07-24 13:09:49', '2022-07-24 13:10:54'),
(92, 1, 68, 0, 30, 1, 1, 1, 1, '2022-07-24 21:21:01', '2022-07-24 21:48:51'),
(93, 1, 69, 20, 0, 1, 0, 0, 1, '2022-11-05 05:01:45', '2022-11-05 05:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) NOT NULL,
  `ad_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `ad_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(2, 10, 42, '2022-07-01 21:35:41', '2022-07-01 21:35:41'),
(6, 8, 51, '2022-07-07 19:51:36', '2022-07-07 19:51:36'),
(7, 25, 52, '2022-07-09 23:43:14', '2022-07-09 23:43:14'),
(9, 27, 30, '2022-07-24 12:48:12', '2022-07-24 12:48:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_ads`
--
ALTER TABLE `admin_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_customer_id_foreign` (`customer_id`),
  ADD KEY `ads_category_id_foreign` (`category_id`),
  ADD KEY `ads_brand_id_foreign` (`brand_id`),
  ADD KEY `ads_city_id_foreign` (`city_id`),
  ADD KEY `ads_town_id_foreign` (`town_id`);

--
-- Indexes for table `ad_features`
--
ALTER TABLE `ad_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ad_features_ad_id_foreign` (`ad_id`);

--
-- Indexes for table `ad_galleries`
--
ALTER TABLE `ad_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messengers`
--
ALTER TABLE `messengers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_report_from_id_foreign` (`report_from_id`),
  ADD KEY `reports_report_to_id_foreign` (`report_to_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admins`
--
ALTER TABLE `super_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_plans`
--
ALTER TABLE `user_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_ads`
--
ALTER TABLE `admin_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ad_features`
--
ALTER TABLE `ad_features`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `ad_galleries`
--
ALTER TABLE `ad_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messengers`
--
ALTER TABLE `messengers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `super_admins`
--
ALTER TABLE `super_admins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `towns`
--
ALTER TABLE `towns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1302;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_plans`
--
ALTER TABLE `user_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
