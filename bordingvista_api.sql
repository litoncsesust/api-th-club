-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: mysql5.gigahost.dk
-- Generation Time: Sep 20, 2019 at 05:33 AM
-- Server version: 5.7.16
-- PHP Version: 5.6.27-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bordingvista_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Serviceydelse', NULL, '2019-07-19 14:07:49'),
(2, 'Underholdning', NULL, NULL),
(3, 'Interiør', NULL, NULL),
(7, 'Sun', '2019-07-19 14:08:01', '2019-07-22 05:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `post_code`, `city`, `email`, `telephone`, `mobile`, `address`, `contact_person`, `short_description`, `created_at`, `updated_at`) VALUES
(1, 'Club 1', '8000', 'Århus', 'test@test.com', '22334455', '22334455', 'Adresse 123', 'Klaus Thomsen', 'Tekst', NULL, '2019-08-16 11:55:59'),
(2, 'Club 2', '1230', 'dhaka', 'test1@test.com', '0900909099', '0900909099', 'Dhaka-1230', 'Mads', 'Hello Bangaldesh', NULL, '2019-07-18 05:14:59'),
(5, 'Sharks Pool Hall', '8000', 'Aarhus C', 'mail@sharks.dk', '86 18 09 90', '86 18 09 90', 'Frederiksgade 25', 'John Doe', 'Sharks Pool Hall', '2019-07-19 07:40:32', '2019-07-19 07:40:32'),
(6, 'Rosborg Møbler', '8000', 'Aarhus C', 'info@rosborg-moebler.dk', '86989322', '86989322', 'Åboulevarden 70', 'Michael Mikkelsen', 'Rosborg Møbler', '2019-07-19 07:49:27', '2019-08-16 11:57:48'),
(7, 'Århus Håndbold', '8000', 'Aarhus C', 'info@aarhushaandbold.dk', '70 20 31 81', '70 20 31 81', 'Idrættens Hus Vest\r\nStadion Allé 70', 'Bente Svejstrup Sørensen', 'Århus Håndbold', '2019-07-19 07:54:58', '2019-07-19 07:54:58'),
(8, 'Miljørent', '8230', 'Åbyhøj', 'salg@miljorent.dk', '86 15 78 55', '86 15 78 55', 'Yrsavej 34-36 st.', 'Jane Doe', 'Miljørent', '2019-07-19 08:00:30', '2019-07-19 08:00:30'),
(9, 'Århus Charter', '8000', 'Aarhus C', 'info@aarhuscharter.dk', '86 20 29 00', '86 20 29 00', 'Marselisborg Havnevej 36', 'Fornavn Efternavn', 'Århus Charter', '2019-08-20 07:35:28', '2019-08-20 07:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `product_id`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 9, 'products/1560869527.jpg', NULL, NULL),
(2, 10, 'products/product-1560869574.jpg', NULL, NULL),
(3, 4, 'products/product-1560869721.jpg', NULL, NULL),
(4, 4, 'products/product-1560869722.png', NULL, NULL),
(5, 11, 'products/product-1560869722.jpg', NULL, NULL),
(13, 4, 'products/product-01560934711.jpg', NULL, NULL),
(14, 4, 'products/product-11560934711.jpg', NULL, NULL),
(15, 4, 'products/product-21560934711.jpg', NULL, NULL),
(18, 12, 'products/product-01560937521.jpg', NULL, NULL),
(19, 12, 'products/product-11560937522.jpg', NULL, NULL),
(20, 5, 'products/product-01560939313.jpg', NULL, NULL),
(21, 5, 'products/product-01560939342.jpg', NULL, NULL),
(22, 5, 'products/product-11560939342.jpg', NULL, NULL),
(25, 12, 'products/product-01560945753.jpg', NULL, NULL),
(26, 12, 'products/product-11560945753.jpg', NULL, NULL),
(27, 13, 'products/product-01561014787.jpg', NULL, NULL),
(28, 13, 'products/product-11561014787.jpg', NULL, NULL),
(29, 14, 'products/product-01561016358.jpg', NULL, NULL),
(30, 14, 'products/product-11561016358.jpg', NULL, NULL),
(31, 15, 'products/product-01561016373.png', NULL, NULL),
(32, 15, 'products/product-11561016373.png', NULL, NULL),
(33, 16, 'products/product-01561016382.png', NULL, NULL),
(34, 16, 'products/product-11561016382.jpg', NULL, NULL),
(35, 17, 'products/product-01561016644.jpg', NULL, NULL),
(36, 17, 'products/product-11561016644.jpg', NULL, NULL),
(37, 18, 'products/product-01561016653.png', NULL, NULL),
(39, 19, 'products/product-01561016856.png', NULL, NULL),
(40, 19, 'products/product-11561016857.jpg', NULL, NULL),
(47, 16, 'products/product-11561365660.jpg', NULL, NULL),
(48, 22, 'products/product-01561634139.jpg', NULL, NULL),
(49, 23, 'products/product-01561637186.jpg', NULL, NULL),
(50, 23, 'products/product-11561637186.jpg', NULL, NULL),
(53, 23, 'products/product-11561637480.jpg', NULL, NULL),
(54, 23, 'products/product-01561637755.jpg', NULL, NULL),
(55, 24, 'products/product-01562058895.jpg', NULL, NULL),
(56, 25, 'products/product-01562059649.jpg', NULL, NULL),
(58, 25, 'products/product-01562062361.jpg', NULL, NULL),
(59, 26, 'products/product-01562063198.jpg', NULL, NULL),
(60, 27, 'products/product-01562065072.jpg', NULL, NULL),
(62, 29, 'products/15529482831272_1563278843.jpg', NULL, NULL),
(63, 29, 'products/53279051_2012646965449664_4301053487996731392_n_1563278843.jpg', NULL, NULL),
(64, 30, 'products/AQUA_930x180_186790_v1_1563364656.jpg', NULL, NULL),
(65, 31, 'products/product-01563373207.jpg', NULL, NULL),
(66, 31, 'products/product-01563373497.jpg', NULL, NULL),
(67, 32, 'products/product-01563374040.jpg', NULL, NULL),
(68, 32, 'products/product-11563374040.jpg', NULL, NULL),
(69, 33, 'products/product-01563374442.png', NULL, NULL),
(70, 34, 'products/product-01563375167.png', NULL, NULL),
(71, 34, 'products/product-11563375212.png', NULL, NULL),
(72, 35, 'products/product-01563375933.png', NULL, NULL),
(73, 35, 'products/product-11563375933.png', NULL, NULL),
(74, 36, 'products/product-01563376156.png', NULL, NULL),
(75, 37, 'products/product-01563376971.png', NULL, NULL),
(76, 38, 'products/product-01563377110.jpg', NULL, NULL),
(77, 39, 'products/product-01563377578.jpg', NULL, NULL),
(78, 40, 'products/product-01563378062.jpg', NULL, NULL),
(82, 41, 'products/product-01563519504.jpg', NULL, NULL),
(86, 44, 'products/Topbanner-2018_1563523013.jpg', NULL, NULL),
(93, 28, 'products/product-01565952841.jpg', NULL, NULL),
(94, 28, 'products/product-01565952860.jpg', NULL, NULL),
(97, 42, 'products/product-01566197010.jpg', NULL, NULL),
(99, 51, 'products/product-01566198673.jpg', NULL, NULL),
(100, 52, 'products/product-01568794414.jpg', NULL, NULL),
(101, 52, 'products/product-11568794414.jpg', NULL, NULL),
(102, 53, 'products/product-01568794534.png', NULL, NULL),
(103, 53, 'products/product-11568794534.jpg', NULL, NULL);

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
(3, '2019_05_28_103145_create_shoppings_table', 1),
(4, '2019_05_28_103845_create_profiles_table', 1),
(5, '2019_05_28_103918_create_subscriptions_table', 1),
(6, '2019_05_28_103934_create_products_table', 1),
(7, '2019_05_28_103950_create_product_invetories_table', 1),
(8, '2019_05_28_104012_create_customers_table', 1),
(9, '2019_05_28_104031_create_sponsors_table', 1),
(10, '2019_05_28_104052_create_user_sponsors_table', 1),
(11, '2019_05_28_110938_add_api_token_user_table', 1),
(12, '2019_06_03_124034_create_categories_table', 1),
(13, '2019_06_03_130727_create_files_table', 1),
(14, '2019_06_03_130812_create_sales_table', 1),
(15, '2019_06_03_130833_create_clubs_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `sku` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `club_id` int(11) NOT NULL,
  `location` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `post_code` int(11) NOT NULL,
  `city` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `expire_date` date NOT NULL,
  `offer_date` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_by_date` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_number` int(11) NOT NULL,
  `initial_point` int(11) NOT NULL,
  `organizer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `headline` varchar(256) CHARACTER SET utf8 NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `purchase_notice` text COLLATE utf8_unicode_ci,
  `seller_club` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_address` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_postcode` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_city` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_person` varchar(256) CHARACTER SET utf8 NOT NULL,
  `seller_email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_telephone` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seller_description` text COLLATE utf8_unicode_ci,
  `isFeatured` tinyint(2) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `sku`, `user_id`, `category_id`, `club_id`, `location`, `address`, `post_code`, `city`, `expire_date`, `offer_date`, `book_by_date`, `total_number`, `initial_point`, `organizer`, `headline`, `description`, `short_description`, `purchase_notice`, `seller_club`, `seller_address`, `seller_postcode`, `seller_city`, `contact_person`, `seller_email`, `seller_telephone`, `seller_description`, `isFeatured`, `created_at`, `updated_at`) VALUES
(28, 'Feriegavekort – uge 43-50 – for 2 personer', 825569, 13, 1, 1, 'Århus Charter', 'Marselisborg Havnevej 36', 8000, 'Aarhus C', '2019-10-22', NULL, NULL, 10, 10000, 'Århus Charter', '', 'Ta’ med Århus Charter på en uges forkælelsesferie i efteråret. Lad de mørke og våde dage ligge bag dig og nyd det lune, sene efterår i syden. Vi har pakket ture til alle vores destination for 2. Resten er op til jer. Test', 'Ta’ med Århus Charter på en uges forkælelsesferie i efteråret. Lad de mørke og våde dage ligge bag dig og nyd det lune, sene efterår i syden. Vi har pakket ture til alle vores destination for 2. Resten er op til jer.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla elit metus, fermentum in auctor non, aliquet a metus. Curabitur sit amet libero in massa volutpat gravida vel eget libero.', 'Århus Charter', 'adresse 123', '8000', 'aarhus c', '', 'mail@mail.com', '12345678', 'beskrivelse osv.', 0, NULL, '2019-09-18 10:38:00'),
(41, '10 timers forårsrengøring edited text', 746492, 14, 1, 1, 'Din virksomhed edited text', 'Yrsavej 34-36 st. edited text', 8230, 'Åbyhøj edited text', '2019-10-20', NULL, NULL, 10, 5000, 'Miljørent edited text', '', 'BESKRIVENDE TEKST', 'Kom i bund med rengøringen derhjemme og glæd dig til de lyse timer. Få vores professionelle rengøringsassistenter ud i samlet 10 timer.\r\n\r\nedited text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla elit metus, fermentum in auctor non, aliquet a metus. Curabitur sit amet libero in massa volutpat gravida vel eget libero.', 'Miljørent A/S edited text', 'Yrsavej 34-36 st. edited text', '8230', 'Åbyhøj edited text', '', 'salg@miljorent.dk', '86 15 78 55', 'Tekst edited text', 0, NULL, '2019-09-18 09:30:42'),
(42, 'Montana free reolsystem', 964488, 17, 3, 6, 'Rosborg Møbler', 'Åboulevarden 70', 8000, 'Aarhus C', '2019-08-08', NULL, NULL, 5, 8000, 'Rosborg Møbler', '', 'Vælge mellem 11 moduler og 4 farver. Få model 5220. Spar 30%', 'Vælge mellem 11 moduler og 4 farver. Få model 5220. Spar 30%', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla elit metus, fermentum in auctor non, aliquet a metus. Curabitur sit amet libero in massa volutpat gravida vel eget libero.', 'Rosborg Møbler', 'Åboulevarden 70', '8000', 'Aarhus C', '', 'info@rosborg-moebler.dk', '86989322', NULL, 1, NULL, '2019-08-20 07:36:20'),
(44, 'Medarbejderdag (10 personer)', 1369, 13, 1, 1, 'Din virksomhed og Ceres Park', 'Stadion Allé 70', 8000, 'Aarhus C', '2019-09-09', NULL, NULL, 30, 3000, 'Århus Håndbold', '', NULL, 'Giv dine medarbejdere en dag, der både udvikler, overrasker og underholder. Dagen indledes hos jer, hvor vores trænerstab giver gruppen 2 timers indflyvning og en række teamopgaver, der skal løses, inden vi mødes til kampoptakt i Ceres Park. Her er medarbejderne med omkring ligaholdets forberedelser. Inden kampen er der spisning og prematch i VIP. Derefter reserverede pladser i Arenaen.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla elit metus, fermentum in auctor non, aliquet a metus. Curabitur sit amet libero in massa volutpat gravida vel eget libero.', 'Århus Håndbold', 'Stadion Allé 70', '8000', 'Aarhus C', '', 'info@aarhushaandbold.dk', '70 20 31 81', NULL, 0, NULL, '2019-09-20 05:09:58'),
(51, '2 * Burgermenu og 1 times pool, inkl 2 øl', 431205, 13, 1, 1, 'Sharks Pool Hall', 'Frederiksgade 25', 8000, 'Aarhus C', '2019-10-10', NULL, NULL, 15, 2000, 'Sharks Pool Hall', '', NULL, 'Vælg jeres favoritburger og få en velskænket øl eller vand efter jeres valg, serveret i Sharks Diner. Efterfulgt af 1 times pool.', 'Afhentes i Sharks Pool Hall.', 'Sharks Pool Hall', 'Frederiksgade 25', '8000', 'Aarhus C', '', 'mail@sharks.dk', '22334455', 'Info om sælger', 1, NULL, '2019-09-20 05:09:49'),
(52, 'Ringsted Festival edited', 570389, 13, 1, 1, 'Dhaka', 'Gunnar Clausens Vej 36 - DK-8260 Viby J', 8260, 'Viby', '2019-09-20', NULL, NULL, 200000, 1000, 'BV', '', NULL, 'BESKRIVENDE TEKST', 'BESKRIVENDE TEKST', 'dfg', 'Dhaka', '345', 'dfg', '', 'mlm@bordingvista.com', '343423423', 'description', 0, NULL, '2019-09-18 10:04:39'),
(53, 'What is Lorem Ipsum?', 594237, 13, 3, 7, 'Dhaka', '35, Rampura,.', 1219, 'Dhaka', '2019-09-28', NULL, NULL, 23432423, 700, 'Mohammad Liton', '', NULL, 'description', 'description', 'AC Milan', 'Dhaka', '1219', 'Dhaka', '', 'litu_cse06@yahoo.com', NULL, 'description', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_invetories`
--

CREATE TABLE `product_invetories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvr_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `point_expire_date` date DEFAULT NULL,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `telephone`, `cvr_number`, `address`, `post_code`, `city`, `point`, `point_expire_date`, `profile_picture`, `short_description`, `created_at`, `updated_at`) VALUES
(1, 1, '2323432', '234', '35, Rampura,.', '1219', 'Dhaka', 2700, '0000-00-00', 'uploads/1560865093.jpg', 'sdfds', '2019-06-14 14:29:12', '2019-06-19 12:08:11'),
(2, 2, '01680269641', NULL, 'Uttara', '1230', 'Dhaka', 500, '0000-00-00', NULL, NULL, '2019-06-14 16:18:38', '2019-06-14 16:18:38'),
(3, 3, '01677994205', '4444', 'FLAT 1A, HOUSE 15, ROAD 05', '1230', 'DHAKA', 900, '0000-00-00', 'uploads/1560863838.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tortor augue, tincidunt et feugiat quis, feugiat sit amet velit. In hac habitasse platea dictumst. Ut bibendum tristique ante, ut pulvinar leo cursus sed. Vivamus sit amet orci tristique, dictum felis eget, rutrum lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer molestie nibh quis turpis finibus elementum. Pellentesque sit amet purus molestie, ullamcorper ante sed, aliquam sem. Duis ut orci gravida lacus placerat interdum. Cras tristique finibus ornare. Ut finibus ex scelerisque justo porttitor viverra. Fusce in pulvinar mauris, nec aliquet sapien. Proin tincidunt venenatis elit id egestas.', '2019-06-17 05:22:21', '2019-06-19 12:04:01'),
(5, 6, '23432', '32432', '23432', '4234', 'sdf', 1500, '0000-00-00', 'uploads/1560847384.jpg', 'test', '2019-06-18 08:43:04', '2019-06-18 08:43:04'),
(6, 7, 'E 159357', 'E EN101', 'E Old traford', 'E1230', 'E Manchester', 10000, '0000-00-00', 'uploads/1560865810.jpg', 'Eoin Joseph Gerard Morgan (born 10 September 1986) is an Irish-born cricketer who captains the England cricket team in limited overs cricket.', '2019-06-18 13:19:38', '2019-09-10 11:32:04'),
(7, 8, '159357', 'EN102', 'Old traford', '1230', 'Dhaka', 20000, '0000-00-00', 'uploads/1560865765.jpg', 'test data', '2019-06-18 13:39:34', '2019-06-18 13:49:45'),
(8, 9, '01717209396', 'C147', 'Lucky Villa, Kolabagan', '3900', 'FENI', 1000, '0000-00-00', 'uploads/1561011610.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae arcu maximus, iaculis diam a, laoreet ligula. Integer vulputate diam quis justo vestibulum, ac ullamcorper massa lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse viverra urna posuere nibh tincidunt pulvinar. Pellentesque elementum tempor massa a elementum. Integer mollis id sapien at viverra. Vestibulum aliquam vehicula ultrices.', '2019-06-20 06:20:10', '2019-06-20 06:20:10'),
(9, 10, '01680269641', '5555', 'FLAT 1A, HOUSE 15, ROAD 05', '1100', 'Sydney', 1000, '0000-00-00', 'uploads/1561013977.jpg', 'Hello', '2019-06-20 06:52:56', '2019-06-20 07:09:01'),
(10, 11, '234234', '23432', 'asw', '334', 'as', 5000, '0000-00-00', 'uploads/1561015375.png', 'sdf', '2019-06-20 07:22:55', '2019-08-19 08:51:19'),
(11, 12, '2332', NULL, '35, Rampura,.', '1219', 'Dhaka', 1500, '0000-00-00', 'uploads/1561015494.jpg', 'sdf', '2019-06-20 07:24:54', '2019-06-20 07:59:26'),
(12, 13, '01918267699', NULL, '35, Rampura,.', '1219', 'Dhaka', 2000, '2019-09-30', 'uploads/1561016115.jpg', 'test', '2019-06-20 07:35:15', '2019-09-19 07:01:55'),
(13, 14, '01680269641', '1111', 'FLAT 1A, HOUSE 15, ROAD 05', '1230', 'DHAKA', 239900, '0000-00-00', 'uploads/1561016162.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in ornare risus. Fusce in finibus nisi, sed ultrices libero. Pellentesque sit amet nisi et tortor aliquam eleifend. Donec tempus diam suscipit lectus semper, in luctus risus iaculis. Donec auctor elit ac lacus euismod convallis. Donec pharetra iaculis metus. Nunc ornare nunc sit amet porttitor tincidunt. Nunc tincidunt ultricies nisi, ac cursus felis consequat nec. Duis porttitor enim in tempus rutrum. Sed et turpis et ipsum porttitor placerat. Sed ac risus nec elit lobortis facilisis feugiat vitae erat. Vivamus maximus sollicitudin enim id rutrum. Nunc ac eros purus. Aliquam sed elit molestie, vehicula risus et, ultrices lectus. Sed interdum tincidunt eros at tempus. Fusce sed arcu nec ante condimentum facilisis.', '2019-06-20 07:36:02', '2019-09-12 09:59:03'),
(14, 15, '01929290000', '12345', 'Dhaka Bangladesh', '1230', 'Dhaka', 1500, '0000-00-00', 'uploads/1561016163.png', 'sdsfdfsf', '2019-06-20 07:36:03', '2019-06-20 07:51:25'),
(15, 16, '32244222', '23003844', 'TURBINEVEJ 7', '2860', 'Søborg', 50000, '0000-00-00', 'uploads/1561022126.png', 'fdfderevv', '2019-06-20 09:14:08', '2019-06-20 09:30:55'),
(16, 17, '40591789', '39821222', 'Mariane Thomsensgade 6, st. 2', '8000', 'Åarhus C', 10000, '0000-00-00', 'uploads/1561466370.png', 'Thomsen & Co ligger i Aarhus', '2019-06-24 11:45:10', '2019-09-10 10:59:58'),
(17, 18, '5555555', NULL, 'dhaka, bangladesh', NULL, '1230', NULL, '0000-00-00', NULL, NULL, '2019-07-17 11:49:14', '2019-07-17 11:49:14'),
(18, 19, '0099887766', '231456', 'FENI MAIN POST OFFICE, FENI SADAR,', '3900', 'FENI', 500, '0000-00-00', 'uploads/1563426685.png', 'This is a customer', '2019-07-18 05:11:25', '2019-07-18 05:11:25'),
(19, 20, '99008800', '54321', 'FLAT 1A, HOUSE 15, ROAD 05', '1230', 'SECTOR 13, UTTARA, DHAKA', 1000, '0000-00-00', 'uploads/1563426978.jpg', 'This is club admin', '2019-07-18 05:16:18', '2019-07-18 05:16:18'),
(20, 21, '34543', '4354', 'dhaka', '345', 'dfg', 2500, '0000-00-00', NULL, NULL, '2019-08-09 13:45:18', '2019-08-09 13:45:18'),
(21, 22, '34543', '4354', 'dhaka', '345', 'dfg', 12000, '0000-00-00', NULL, NULL, '2019-08-09 13:47:44', '2019-08-20 09:44:43'),
(22, 23, '565654', '345', '35, Rampura,.', '1219', 'Dhaka', 706000, '0000-00-00', 'uploads/1566208522.png', 'test om os', NULL, '2019-08-20 13:19:36'),
(23, 24, '22636028', '1234678', 'Adresse 123', '8000', 'Aarhus Ø', 6000, '0000-00-00', 'uploads/1566378016.png', 'Test konto', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_point` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=onhold,2=processing,3=cancel,4=completed,5=refund',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `user_name`, `total_quantity`, `total_point`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'The', 3, 2200, 0, '2019-06-19 11:10:27', '2019-06-19 11:10:27'),
(2, 1, 'The', 3, 2200, 0, '2019-06-19 11:13:08', '2019-06-19 11:13:08'),
(3, 3, 'Vista', 1, 100, 0, '2019-06-19 12:04:01', '2019-06-19 12:04:01'),
(4, 1, 'The', 1, 100, 0, '2019-06-19 12:08:11', '2019-06-19 12:08:11'),
(5, 14, 'Hasan Mahamud Rana', 1, 100, 0, '2019-06-20 07:50:19', '2019-06-20 07:50:19'),
(6, 13, 'Liton', 1, 100, 0, '2019-06-20 07:50:45', '2019-06-20 07:50:45'),
(7, 15, 'Faysal', 1, 1000, 0, '2019-06-20 07:51:25', '2019-06-20 07:51:25'),
(8, 13, 'Liton', 1, 500, 0, '2019-06-20 07:55:41', '2019-06-20 07:55:41'),
(9, 12, 'wsd', 1, 500, 0, '2019-06-20 07:59:26', '2019-06-20 07:59:26'),
(10, 11, 'smith', 1, 500, 0, '2019-06-20 08:04:10', '2019-06-20 08:04:10'),
(11, 11, 'smith', 1, 500, 5, '2019-06-20 08:04:21', '2019-07-23 05:56:24'),
(12, 11, 'smith', 1, 500, 4, '2019-06-20 08:04:48', '2019-07-23 05:56:11'),
(13, 11, 'smith', 1, 500, 3, '2019-06-20 08:05:40', '2019-07-23 05:56:08'),
(14, 14, 'Hasan Mahamud Rana', 1, 100, 2, '2019-06-20 08:06:57', '2019-07-23 05:56:06'),
(15, 16, 'Bording Danmark', 1, 500, 1, '2019-06-20 09:30:55', '2019-07-23 05:55:43'),
(16, 13, 'Liton', 4, 4000, 0, '2019-07-17 08:35:30', '2019-07-23 05:56:53'),
(17, 17, 'Thomsen&Co', 1, 500, 0, '2019-08-09 11:16:58', '2019-08-09 11:16:58'),
(18, 17, 'Thomsen&Co', 2, 0, 0, '2019-08-16 10:36:41', '2019-08-16 10:36:41'),
(19, 22, 'Liton', 1, 60, 0, '2019-08-19 06:42:13', '2019-08-19 06:42:13'),
(20, 22, 'Liton', 1, 60, 0, '2019-08-19 06:44:51', '2019-08-19 06:44:51'),
(21, 22, 'Liton', 1, 60, 0, '2019-08-19 07:56:50', '2019-08-19 07:56:50'),
(22, 22, 'Liton', 1, 60, 0, '2019-08-19 08:02:10', '2019-08-19 08:02:10'),
(23, 22, 'Liton', 1, 60, 0, '2019-08-19 08:03:24', '2019-08-19 08:03:24'),
(24, 22, 'Liton', 1, 60, 0, '2019-08-19 08:03:55', '2019-08-19 08:03:55'),
(25, 22, 'Liton', 1, 60, 0, '2019-08-19 08:07:04', '2019-08-19 08:07:04'),
(26, 22, 'Liton', 1, 60, 0, '2019-08-19 08:07:55', '2019-08-19 08:07:55'),
(27, 22, 'Liton', 1, 600, 0, '2019-08-19 12:44:41', '2019-08-19 12:44:41'),
(28, 22, 'Liton', 1, 600, 0, '2019-08-19 12:45:45', '2019-08-19 12:45:45'),
(29, 22, 'Liton', 1, 600, 0, '2019-08-19 12:46:14', '2019-08-19 12:46:14'),
(30, 22, 'Liton', 1, 600, 0, '2019-08-19 12:52:31', '2019-08-19 12:52:31'),
(31, 22, 'Liton', 1, 600, 0, '2019-08-19 12:56:13', '2019-08-19 12:56:13'),
(32, 22, 'Liton', 2, 2600, 0, '2019-08-20 09:21:51', '2019-08-20 09:21:51'),
(33, 22, 'Liton', 2, 2600, 0, '2019-08-20 09:27:44', '2019-08-20 09:27:44'),
(34, 22, 'Liton', 2, 2600, 0, '2019-08-20 09:40:34', '2019-08-20 09:40:34'),
(35, 22, 'Liton', 2, 2600, 0, '2019-08-20 09:43:02', '2019-08-20 09:43:02'),
(36, 22, 'Liton', 2, 2600, 0, '2019-08-20 09:44:43', '2019-08-20 09:44:43'),
(37, 23, 'AC Milan', 1, 2000, 0, '2019-08-20 10:04:21', '2019-08-20 10:04:21'),
(38, 23, 'AC Milan', 2, 10000, 0, '2019-08-20 11:50:40', '2019-08-20 11:50:40'),
(39, 23, 'AC Milan', 2, 10000, 0, '2019-08-20 11:52:13', '2019-08-20 11:52:13'),
(40, 23, 'AC Milan', 2, 10000, 0, '2019-08-20 11:55:05', '2019-08-20 11:55:05'),
(41, 23, 'AC Milan', 2, 10000, 0, '2019-08-20 11:55:26', '2019-08-20 11:55:26'),
(42, 23, 'AC Milan', 0, 0, 0, '2019-08-20 11:58:55', '2019-08-20 11:58:55'),
(43, 23, 'AC Milan', 5, 28000, 0, '2019-08-20 11:59:41', '2019-08-20 11:59:41'),
(44, 23, 'AC Milan', 1, 2000, 0, '2019-08-20 12:29:25', '2019-08-20 12:29:25'),
(45, 23, 'AC Milan', 2, 10000, 0, '2019-08-20 12:31:29', '2019-08-20 12:31:29'),
(46, 23, 'AC Milan', 1, 2000, 0, '2019-08-20 12:37:31', '2019-08-20 12:37:31'),
(47, 23, 'AC Milan', 1, 8000, 0, '2019-08-20 12:41:30', '2019-08-20 12:41:30'),
(48, 23, 'AC Milan', 2, 10000, 0, '2019-08-20 12:46:19', '2019-08-20 12:46:19'),
(49, 23, 'AC Milan', 1, 8000, 0, '2019-08-20 12:49:30', '2019-08-20 12:49:30'),
(50, 23, 'AC Milan', 1, 2000, 0, '2019-08-20 12:52:07', '2019-08-20 12:52:07'),
(51, 23, 'AC Milan', 1, 2000, 0, '2019-08-20 12:54:52', '2019-08-20 12:54:52'),
(52, 23, 'AC Milan', 1, 2000, 0, '2019-08-20 12:56:16', '2019-08-20 12:56:16'),
(53, 23, 'AC Milan', 1, 8000, 0, '2019-08-20 12:57:50', '2019-08-20 12:57:50'),
(54, 23, 'AC Milan', 1, 8000, 0, '2019-08-20 12:59:48', '2019-08-20 12:59:48'),
(55, 23, 'AC Milan', 1, 8000, 0, '2019-08-20 13:01:24', '2019-08-20 13:01:24'),
(56, 23, 'AC Milan', 1, 8000, 0, '2019-08-20 13:04:23', '2019-08-20 13:04:23'),
(57, 23, 'AC Milan', 1, 8000, 0, '2019-08-20 13:05:58', '2019-08-20 13:05:58'),
(58, 23, 'AC Milan', 2, 10000, 0, '2019-08-20 13:07:28', '2019-08-20 13:07:28'),
(59, 23, 'AC Milan', 2, 10000, 0, '2019-08-20 13:09:31', '2019-08-20 13:09:31'),
(60, 23, 'AC Milan', 2, 10000, 0, '2019-08-20 13:12:48', '2019-08-20 13:12:48'),
(61, 23, 'AC Milan', 1, 8000, 0, '2019-08-20 13:19:36', '2019-08-20 13:19:36'),
(62, 17, 'Thomsen&Co', 1, 2000, 0, '2019-08-21 09:05:35', '2019-08-21 09:05:35'),
(63, 7, 'E Archer', 1, 2000, 0, '2019-09-09 12:34:45', '2019-09-09 12:34:45'),
(64, 14, 'Hasan Mahamud Rana', 1, 10000, 0, '2019-09-12 09:59:02', '2019-09-12 09:59:02'),
(65, 13, 'Liton', 2, 6000, 0, '2019-09-19 06:30:51', '2019-09-19 06:30:51'),
(66, 13, 'Liton', 1, 1000, 0, '2019-09-19 06:34:59', '2019-09-19 06:34:59'),
(67, 13, 'Liton', 2, 4000, 0, '2019-09-19 06:39:55', '2019-09-19 06:39:55'),
(68, 13, 'Liton', 2, 8000, 0, '2019-09-19 07:01:55', '2019-09-19 07:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `sku` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`id`, `sale_id`, `user_id`, `club_id`, `sku`, `quantity`, `point`, `product_name`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 879744, 1, 100, 'Test Pro', 3, NULL, NULL),
(2, 1, 1, 2, 360247, 1, 2000, 'Testing', 4, NULL, NULL),
(3, 1, 1, 1, 123456, 1, 100, 'Product Test', 1, NULL, NULL),
(4, 2, 1, 1, 879744, 1, 100, 'Test Pro', 3, NULL, NULL),
(5, 2, 1, 2, 360247, 1, 2000, 'Testing', 4, NULL, NULL),
(6, 2, 1, 1, 123456, 1, 100, 'Product Test', 1, NULL, NULL),
(7, 3, 3, 1, 123456, 1, 100, 'Product Test', 1, NULL, NULL),
(8, 4, 1, 1, 64454, 1, 100, 'Product', 2, NULL, NULL),
(9, 5, 14, 1, 123456, 1, 100, 'Product Test', 1, NULL, NULL),
(10, 6, 13, 1, 123456, 1, 100, 'Product Test', 1, NULL, NULL),
(11, 7, 15, 2, 3777, 1, 1000, 'Faysal Test', 15, NULL, NULL),
(12, 8, 13, 1, 699245, 1, 500, 'Fashion House', 18, NULL, NULL),
(13, 9, 12, 1, 690766, 1, 500, 'Mountain Dew', 6, NULL, NULL),
(14, 10, 11, 2, 572575, 1, 500, 'Product 1', 12, NULL, NULL),
(15, 11, 11, 2, 572575, 1, 500, 'Product 1', 12, NULL, NULL),
(16, 12, 11, 2, 572575, 1, 500, 'Product 1', 12, NULL, NULL),
(17, 13, 11, 2, 572575, 1, 500, 'Product 1', 12, NULL, NULL),
(18, 14, 14, 1, 123456, 1, 100, 'Product Test', 1, NULL, NULL),
(19, 15, 16, 1, 699245, 1, 500, 'Fashion House', 18, NULL, NULL),
(20, 16, 13, 2, 206473, 1, 2000, 'Real Madrid', 16, NULL, NULL),
(21, 16, 13, 2, 687251, 1, 1000, 'Mountain Dew', 5, NULL, NULL),
(22, 16, 13, 1, 690766, 1, 500, 'Mountain Dew', 6, NULL, NULL),
(23, 16, 13, 1, 855264, 1, 1500, 'E Hasan 1', 14, NULL, NULL),
(24, 17, 17, 1, 690766, 1, 500, 'Mountain Dew', 6, NULL, NULL),
(25, 18, 17, 1, 502668, 2, 0, '2xburgermenu og 1 times pool, inkl 2x2 øl.', 43, NULL, NULL),
(26, 19, 22, 6, 44782, 1, 60, 'test product', 50, NULL, NULL),
(27, 20, 22, 6, 44782, 1, 60, 'test product', 50, NULL, NULL),
(28, 21, 22, 6, 44782, 1, 60, 'test product', 50, NULL, NULL),
(29, 22, 22, 6, 44782, 1, 60, 'test product', 50, NULL, NULL),
(30, 23, 22, 6, 44782, 1, 60, 'test product', 50, NULL, NULL),
(31, 24, 22, 6, 44782, 1, 60, 'test product', 50, NULL, NULL),
(32, 25, 22, 6, 44782, 1, 60, 'test product', 50, NULL, NULL),
(33, 26, 22, 6, 44782, 1, 60, 'test product', 50, NULL, NULL),
(34, 27, 22, 1, 44782, 1, 600, 'test product', 50, NULL, NULL),
(35, 28, 22, 1, 44782, 1, 600, 'test product', 50, NULL, NULL),
(36, 29, 22, 1, 44782, 1, 600, 'test product', 50, NULL, NULL),
(37, 30, 22, 1, 44782, 1, 600, 'test product', 50, NULL, NULL),
(38, 31, 22, 1, 44782, 1, 600, 'test product', 50, NULL, NULL),
(39, 32, 22, 1, 44782, 1, 600, 'test product', 50, NULL, NULL),
(40, 32, 22, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(41, 33, 22, 1, 44782, 1, 600, 'test product', 50, NULL, NULL),
(42, 33, 22, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(43, 34, 22, 1, 44782, 1, 600, 'test product', 50, NULL, NULL),
(44, 34, 22, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(45, 35, 22, 1, 44782, 1, 600, 'test product', 50, NULL, NULL),
(46, 35, 22, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(47, 36, 22, 1, 44782, 1, 600, 'test product', 50, NULL, NULL),
(48, 36, 22, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(49, 37, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(50, 38, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(51, 38, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(52, 39, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(53, 39, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(54, 40, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(55, 40, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(56, 41, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(57, 41, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(58, 43, 23, 6, 964488, 3, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(59, 43, 23, 5, 60940, 2, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(60, 44, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(61, 45, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(62, 45, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(63, 46, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(64, 47, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(65, 48, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(66, 48, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(67, 49, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(68, 50, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(69, 51, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(70, 52, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(71, 53, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(72, 54, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(73, 55, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(74, 56, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(75, 57, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(76, 58, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(77, 58, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(78, 59, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(79, 59, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(80, 60, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(81, 60, 23, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(82, 61, 23, 6, 964488, 1, 8000, 'Montana free reolsystem', 42, NULL, NULL),
(83, 62, 17, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(84, 63, 7, 5, 60940, 1, 2000, '2 * Burgermenu og 1 times pool, inkl 2 øl', 51, NULL, NULL),
(85, 64, 14, 9, 808914, 1, 10000, 'Feriegavekort – uge 43-50 – for 2 personer', 28, NULL, NULL),
(86, 65, 13, 1, 126923, 2, 3000, 'Medarbejderdag (10 personer)', 44, NULL, NULL),
(87, 68, 13, 1, 126923, 1, 3000, 'Medarbejderdag (10 personer)', 44, NULL, NULL),
(88, 68, 13, 1, 746492, 1, 5000, '10 timers forårsrengøring edited text', 41, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shoppings`
--

CREATE TABLE `shoppings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '3=super admin, 2=customer,1=club admin',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `type`, `password`, `remember_token`, `created_at`, `updated_at`, `api_token`) VALUES
(1, 'Liton', 'l@g.com', NULL, 2, '$2y$10$TFj2ciRB8MICav4E1rB/C.8p9nAkEhUUFSiT.CY6wo7gjcnw7a/cS', NULL, NULL, '2019-08-19 08:55:00', 'ZEtBc24xREdSZFY2Y2xPREpBWkRVZVlmMHVldGtycmdrSHJLRWNva1MydFNWaDQ4RHF3V0M0S1lpOTk15d5a63e34b681'),
(2, 'Rana', 'ham@c.com', NULL, 1, '$2y$10$4XbBJuMXBOT4u8i./XPzeeRv5YZAYbh/kHE5PbgPmQpus1x55Snw.', NULL, NULL, NULL, 'Z1FyaFZGVjBJQTJaZ2plUmRxTTltMXVFem5Wa0Uxcm1GUHRQWEdmZk9kWXJEbnNCWVFiZWliak9vR0JH5d03c8de907eb'),
(3, 'Vista', 'ham@ft.com', NULL, 1, '$2y$10$QgTI7pmcMxVkKa.2vQMNhOiL1O2XFbAsEvSLxHqvE1zeSaZqAWcby', NULL, NULL, '2019-06-19 10:14:12', 'bHVoZ2lpUTkyVmpIY3pTWkFlT09jTXBKVU1RcUlKRkZBbjUzdWtvQUk4SzJaSU1uZnp6NTFobmVDd2tR5d0a0af43b579'),
(6, 'test', 'b@g.com', NULL, 1, '$2y$10$i1l5BLuDBqs2/oX8BTNJE.t0ewsVCoHcXcNLYQkCqfkmmeQS9jUSm', NULL, NULL, NULL, 'REhkZlA5NTZ1TkszTHRNSjNQYjh6MDRGejNWQmpJRjZlU1hzZkxlTXZWc0k2ajdYcHFnT0k0MDBwRFpw5d08a417ac8fc'),
(7, 'E Archer', 'm@y.com', NULL, 2, '$2y$10$AM551bUFW4t.yr1qo4lX9O3BDllCiz8MBo8nR/lmuwUXsCsU8OS52', NULL, NULL, '2019-09-10 11:32:04', 'Y2JQZkZJREJPSVFVWEI3RnU0Z3c5TGh2VThFdmlkWFNjYjVSeG11Z2xabG1OZ2VKeXZpN1NnTnJYU0dr5d7788361c954'),
(8, 'Ali', 's@g.com', NULL, 1, '$2y$10$X6A17z8jv/0qRTISAObMo.OadgHhptelzIvKZ3.8TKH7WIX0kqxTG', NULL, NULL, '2019-06-18 13:49:45', 'bUQyTEVFNkNZOTIzb2FROTM5YkN4eEJ5Q09MNmJyWVJnaW4yNHBzNGdJSHZsQTdIcWVxendNWG1OYXRw5d08e995cfdb4'),
(9, 'Hasan', 'r@y.com', NULL, 1, '$2y$10$3nuhpyfNMIVyf6QRfU72nOFcs15dAruPJuU8JoBWzhkC9ZY0ndKZG', NULL, NULL, '2019-09-12 07:53:03', 'YUh6b05vVnpheWppbmpjR2thU0FtWFk1QWhubWllQ2Ntb3hzQktMc05FbU5hOFFUek9FaEk0UGpINHls5d79f95e3e5f6'),
(10, 'Argentina', 'aus@y.com', NULL, 1, '$2y$10$wnfEnWHyMi1qS9S2vxXnXuefT.AJriQG/YY3x3gD1vw0hyKsoJDl2', NULL, NULL, '2019-06-20 07:09:01', 'Q2hhUk1vejNMUnFaRHNiUEdIeDYwY2RvRWNHdDhyR0xIZk9sNThQeGdrWmVaaVB1RTR0Y2Z2Rm11RmZt5d0b2d479a041'),
(11, 'smith', 's@y.com', NULL, 1, '$2y$10$zGvg7YlDfNGDsKR.LvJkKuf96fzngL0fliw.p.RFmQRri1UNVof0q', NULL, NULL, '2019-08-19 08:51:19', 'Y3QxUmtPYkhBcFVVbkxuNkV2cHFtS3hoNDdxeG5vckxIWVBvRHVwY0ExdTdaa0prOGFIYzZCRjBXZVFI5d0b344d98162'),
(12, 'wsd', 'w@g.com', NULL, 1, '$2y$10$IdqZdnV0PwDiyyXJ2NAhB.IENvh/Na75NhmzPl.ZD1xrlL8iWObXe', NULL, NULL, NULL, 'OGVSeEkyQ0ZNVDQ2RTFHRkoxVElzWVZxWVhjR3RPZHVXYTllWkJIWlFIaWVrU1ZhRUlFVkhSbURYOVdG5d0b34c66d93b'),
(13, 'Liton', 'litoncse@gmail.com', NULL, 1, '$2y$10$yhioOW0RdS/Q4aJ4JE/sg.rGakfJ91l24NVh4qoX4f03uRskbHaqq', NULL, NULL, '2019-09-19 10:47:42', 'UmR5TFdVVG54TWx1MVZSU09vWDhLSDgycExSNmxFUWJqRXVJMjRwUTg2R09RTmh0d1FuY1JpWktvRjJ25d835ccca4c29'),
(14, 'Hasan Mahamud Rana', 'ham@fiftytwo.com', NULL, 3, '$2y$10$uJxCQiLCHQUfWiEHC/J/PeqmCYHvwPA56iyzxDOIV1XkqpaL4qaZi', NULL, NULL, '2019-09-12 09:58:43', 'cWxFSnNtYzJSZTQ4T3hmRWFzZWNrYjRoZG9tVlhJa0d0MW5VYjFFTnJKdmY5Z094eTZlSUxOb3NKT3VG5d7a16d2b154b'),
(15, 'Faysal', 'faysal.turjo@gmail.com', NULL, 1, '$2y$10$mtaNkrJyW0CS54uUtTK4AeN1/XsTN1IbP90/YCsilqo0IPjvQ56b6', NULL, NULL, '2019-06-20 07:49:08', 'TGtGbm4xaEJmOTJTTnFvbnV2ZG8xV09DTzVYRERSSk9zVG1Kak4yUWc1QUVGbEFOaDE3RThnV0tqQTFn5d0b3a7475123'),
(16, 'Bording Danmark', 'mbo@bording.dk', NULL, 1, '$2y$10$jBE/JMu0iCdte.rXavRIY.Fk2xXNtS7M8kpZNqH5YOGRZyug1HmMG', NULL, NULL, '2019-06-20 09:32:20', 'c3R1MHMxT1JiTENGWHZoQU04NjU0cGoxRm01V3lzTzJmbmNpTlo3VGozT3Bwb0pUaDkxZGppSFAzaWZC5d0b52a3a6b79'),
(17, 'Thomsen&Co', 'klaus@thomsenogco.dk', NULL, 3, '$2y$10$0ryGwxZNzu54Gl8dJ9i/2e9Pvac0pDxrHsZl1umzAbNKaOUhwEmH.', '5tuQZ31MNQtP200Op4HdYiNGVMoaTWx2vHx7EOEbntVQikPCXKT1Jo940xz1', NULL, '2019-09-12 07:28:04', 'bHdCZEE3cmg2cEhLR2liTTdzZTlYTk5hU0VtYWdWcGpXbXQzeVF3MXlnVTg4blhFQ0I4TkQ4N2VOeGl55d79f3841f93f'),
(18, 'chanchal', 'cho@bordingvista.com', NULL, 1, '$2y$10$/GsfIedBrCqZO5Fcx2fB9.mJ/qj15smXgFED.4/uBnD46gHPTOHD6', NULL, NULL, NULL, 'UDJvUmE0SUZ3d3psbzloR2dScEFXTksxY0VYQkNQRHQ5ekpHd2NxckhNMmo4QzFaSWZIa3I0WWFjeTB05d2f0b3ab1e4f'),
(19, 'Customer', 'c@y.com', NULL, 2, '$2y$10$dybsOXBA/0ETldBkzQz9jeTEEiODYfeyYBBAhJDA.EonaFhdL16BK', NULL, NULL, NULL, 'T3dYS0dFWkpEeFhLV0hMMGV1V3A2YWJjeFQ4ZVN5eFFpeFRwRW9VV3lxSXByblc4c1doR3F5TUxRQnRK5d2fff7d51e5c'),
(20, 'clubadmin', 'ca@y.com', NULL, 1, '$2y$10$4BGxtdqZigtXTBv7z9qPDOGnCr835GZ592C3M.psAeNS/Q07Y/7Yy', NULL, NULL, '2019-07-18 05:17:35', 'VFZjN1VKZ20zRDh2T2NRMWdlUUdoQXdxQlM5Yk5YT0FQZnJUb09MVjdHYXE1aW55WjdoeFA1cnZmSk1I5d3000ef168fc'),
(21, 'Liton', 'mlm@bording.com', NULL, 2, '$2y$10$Ecdd1hzXXsQ9nLZtY.GciuyPueerzMcJoGjow.xfA/AjIGor/0jCW', NULL, NULL, NULL, 'VUxid2l2eDZNQm91ck5yUkFlbkJIZ1p1ZUJ4S3FIQ1hDRzBldU1sMlpGaXhWYnluM1BGNldicnFLR2hT5d4d78eddb062'),
(22, 'Liton', 'm@bording.com', NULL, 1, '$2y$10$N5OM9aYmxWXm8m6DqlhRXOc.IrskU5KK4EhxtPBDdZQ/m/v3fTUYO', NULL, NULL, '2019-08-20 09:21:35', 'a3l2aXBTU21OMFBsTmI2cXBOcXBCOHhDWGRSakF3dkpxaFV3QlBJdkw4SnRkQjR0d2FldlRqdVVocWI55d5bbb9fa9136'),
(23, 'AC Milan', 'litoncsesust@gmail.com', NULL, 2, '$2y$10$N5OM9aYmxWXm8m6DqlhRXOc.IrskU5KK4EhxtPBDdZQ/m/v3fTUYO', NULL, NULL, '2019-08-20 10:04:00', 'QlRkWFJQdHd2aDQ5UUxmTTZabG1Kem1QMG9NRVBPSG1xN1hDZ0FjbVNLTXNxaGlHRzVTZFRIdXBUeTdD5d5bc59038158'),
(24, 'Mads', 'mads@thomsenogco.dk', NULL, 2, '$2y$10$S8UtvMUCDE7LasxdPpoi8e4q9Cy39gMwZhT6xlU5TpF7I5d.38Zpq', NULL, NULL, NULL, 'TVRKRlhoZ01zQlMzZ2JtZEVnOGxlT3gwbUhQY0VHVWZxYlhLSkduRVBMSFVLcG5GZ0lGbHBaeUtKMHQw5d5d082047df8');

-- --------------------------------------------------------

--
-- Table structure for table `user_sponsors`
--

CREATE TABLE `user_sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_invetories`
--
ALTER TABLE `product_invetories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppings`
--
ALTER TABLE `shoppings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- Indexes for table `user_sponsors`
--
ALTER TABLE `user_sponsors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `product_invetories`
--
ALTER TABLE `product_invetories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `shoppings`
--
ALTER TABLE `shoppings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_sponsors`
--
ALTER TABLE `user_sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
