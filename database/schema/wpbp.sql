-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql_db
-- Generation Time: Dec 23, 2023 at 01:14 PM
-- Server version: 11.2.2-MariaDB-1:11.2.2+maria~ubu2204
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelbp`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` char(36) NOT NULL,
  `variant_id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `electric_transaction_details`
--

CREATE TABLE `electric_transaction_details` (
  `transaction_id` char(36) NOT NULL,
  `electric_token` char(36) NOT NULL,
  `subscription_number` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `flash_sale_products`
--

CREATE TABLE `flash_sale_products` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `product_id` char(36) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flash_sale_products`
--

INSERT INTO `flash_sale_products` (`id`, `product_id`, `discount`, `created_at`, `updated_at`) VALUES
('d15f0354-a194-11ee-933c-0242c0a86002', 'd884b273-4def-463c-96b1-32116edd40b3', 79, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('d160170e-a194-11ee-933c-0242c0a86002', '8bb577c8-9434-466d-8b85-a9a5801b29c6', 77, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('d16137fb-a194-11ee-933c-0242c0a86002', '32534c19-3b39-49e8-9e16-d872fc725ba3', 88, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('d16357b0-a194-11ee-933c-0242c0a86002', 'aa3a2926-ec16-4d95-ae60-2563b5297629', 90, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('d16496d0-a194-11ee-933c-0242c0a86002', '9a59dd59-ba0e-4462-85fc-697fd42eecc2', 74, '2023-12-23 13:11:43', '2023-12-23 13:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT '',
  `postal_code` varchar(255) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `locationable_id` char(36) NOT NULL,
  `locationable_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `city`, `country`, `address`, `notes`, `postal_code`, `latitude`, `longitude`, `locationable_id`, `locationable_type`, `created_at`, `updated_at`) VALUES
('ae2cc72f-a194-11ee-933c-0242c0a86002', 'Lysannehaven', 'Marshall Islands', '5677 Kemmer Meadow Suite 481\nSouth Madonna, LA 80644-2221', 'fort', '57309', -24.1446, -152.250347, '1d598636-a32f-41ab-9545-4c9f99708579', 'App\\Models\\User', '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('ae2ddee3-a194-11ee-933c-0242c0a86002', 'East Cleve', 'El Salvador', '7121 Harber Harbor\nLakinland, LA 46804-5268', 'stad', '34056', 56.111265, 112.585478, 'adcb5358-4f08-4f25-84f4-fdfb4dd4c6b4', 'App\\Models\\User', '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('ae2ec9ea-a194-11ee-933c-0242c0a86002', 'Cronatown', 'Azerbaijan', '557 Schmidt Knolls Suite 153\nEast Celiaberg, MO 58201-3224', 'stad', '47097-5463', 8.428515, -93.869705, '2ddd497c-9bf5-4168-8453-7fe119948941', 'App\\Models\\User', '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('ae2f8042-a194-11ee-933c-0242c0a86002', 'East Tristian', 'Korea', '89234 Rowena Squares Apt. 711\nEast Lavada, NC 92423-7484', 'ton', '52102-1533', 26.246592, -71.185912, 'd0553bfa-0753-4403-a5e9-ae27899a924e', 'App\\Models\\User', '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('ae306cf8-a194-11ee-933c-0242c0a86002', 'Anastacioport', 'Equatorial Guinea', '40031 Roman Ramp\nLake Biankachester, ND 89946-8425', 'ton', '71483', 52.534267, 128.150961, '8ce20a66-fab3-4a17-9acc-ff01e696c7ff', 'App\\Models\\User', '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('ae311b44-a194-11ee-933c-0242c0a86002', 'Madysonside', 'Hungary', '297 Halie Way Apt. 536\nNicolasbury, VA 10446-9270', 'borough', '10910', 31.672967, -81.992896, '48409782-3be1-461b-85c6-e8e49567a766', 'App\\Models\\User', '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('ae31cd78-a194-11ee-933c-0242c0a86002', 'New Shany', 'Maldives', '382 Howe Meadows Suite 502\nLake Ryanburgh, NE 31165-5659', 'land', '96454', -3.617894, 176.267563, '7d75d8f8-6a04-4126-91ab-9e13cf5b8a06', 'App\\Models\\User', '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('ae32815b-a194-11ee-933c-0242c0a86002', 'New Terrenceport', 'Eritrea', '51729 McKenzie Gardens Apt. 559\nPhyllischester, MO 00264-6918', 'town', '64640-5794', 53.86816, -22.26412, 'd42760da-c2dc-43c3-b439-00af012c142a', 'App\\Models\\User', '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('ae3335f3-a194-11ee-933c-0242c0a86002', 'North Aurelieshire', 'Haiti', '4687 Amina Lodge\nPort Omari, NH 38186', 'furt', '27998-8620', -50.036338, 155.039194, 'e9ced7d6-c2fc-44a1-a8ec-5d3793e0bd05', 'App\\Models\\User', '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('ae33f1dd-a194-11ee-933c-0242c0a86002', 'Verlieborough', 'Hong Kong', '78690 Reinhold Pass Apt. 252\nEdwardburgh, KY 16894', 'land', '08420-8501', -5.850456, -16.689236, 'c1873582-d819-4da7-ae9e-656c2867e586', 'App\\Models\\User', '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('b1d32a53-a194-11ee-933c-0242c0a86002', 'South Jimmie', 'Poland', '629 Carleton Hills Apt. 034\nLake Eldora, VA 48438-4133', 'borough', '29594-9642', 43.97655, 82.60188, '18c4e9f7-5169-4184-89f9-6efdb4c68866', 'App\\Models\\Merchant', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('b1d3d20a-a194-11ee-933c-0242c0a86002', 'Eladioview', 'Bangladesh', '581 Bayer Springs\nPort Feliciahaven, NC 73365', 'borough', '76955-5871', -19.358245, -23.652947, '24d77a37-3fc6-403e-958c-07fb8e54148c', 'App\\Models\\Merchant', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('b1d4648e-a194-11ee-933c-0242c0a86002', 'New Craig', 'Spain', '8166 Maegan Mountain Apt. 108\nPort Jaquelin, WI 45174-1365', 'town', '41139', -26.840102, -39.79563, '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', 'App\\Models\\Merchant', '2023-12-23 13:10:50', '2023-12-23 13:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Online',
  `catch_phrase` varchar(255) NOT NULL DEFAULT '',
  `process_time` varchar(255) NOT NULL DEFAULT '3 hours',
  `operational_time` varchar(255) NOT NULL DEFAULT '24 hours',
  `banner_image` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `full_description` text NOT NULL DEFAULT '',
  `image` varchar(255) DEFAULT NULL,
  `user_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `name`, `phone`, `status`, `catch_phrase`, `process_time`, `operational_time`, `banner_image`, `description`, `full_description`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
('18c4e9f7-5169-4184-89f9-6efdb4c68866', 'Ms. Joanie Nikolaus Jr.', '731-275-7144', 'Online', 'Eos magnam tempore sint quam excepturi molestias facilis et dolorem.', '3 hours', '24 hours', 'https://images.unsplash.com/photo-1701086292958-f753f3bb5d27?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA0Ng&ixlib=rb-4.0.3&q=80&w=1080', 'Animi magni ex velit eos.', 'Cupiditate facilis possimus ad ratione facere illo quia. Neque reiciendis est aut. Exercitationem animi sunt iusto recusandae beatae. Molestiae iste ut sed autem ipsa. Aut fuga illo tenetur quia fugiat laborum temporibus. Repudiandae ab eum id omnis aut. Facilis voluptatum architecto dolor ad. Qui aperiam eum rerum sunt sint fugiat sit. Porro delectus est ut voluptatem in totam velit qui. Facilis ea harum veritatis ipsa numquam doloremque. Eos eos officiis sed excepturi. Recusandae reiciendis cum rerum enim accusamus voluptas. Tempora non illum qui rerum exercitationem ratione ducimus. Blanditiis sed quia vel vel sequi. Voluptatem reprehenderit ut vel quisquam. Harum hic magni dolorem facilis delectus quasi illo repellat. Blanditiis neque est sed adipisci. Quidem ut mollitia est consequatur qui asperiores dicta.', 'https://images.unsplash.com/photo-1702476320482-0736c4b962f5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA0NQ&ixlib=rb-4.0.3&q=80&w=1080', '8ce20a66-fab3-4a17-9acc-ff01e696c7ff', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', 'Dr. Marian Jast DVM', '(509) 482-9710', 'Online', 'Vel deserunt alias animi est sunt ut.', '3 hours', '24 hours', 'https://images.unsplash.com/photo-1703127198588-aaf66f344c77?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA1MA&ixlib=rb-4.0.3&q=80&w=1080', 'Fuga illum doloribus commodi odit pariatur ab ut.', 'Delectus quaerat autem iste qui dolor architecto. Aut provident labore ipsum occaecati. Laboriosam voluptatibus debitis dolorum nihil ab. Consequatur odio autem facilis totam. Voluptatum consequuntur et vitae deserunt. Culpa a rerum doloremque praesentium dolor explicabo voluptatem eum. Sit autem dicta deserunt in voluptas. Accusantium fuga doloremque fugiat soluta illo. Ut blanditiis quia voluptas sit libero atque. Similique doloribus ad qui doloremque ipsam consectetur. Qui dolorum fugit ea non. Delectus sequi necessitatibus excepturi voluptates aut amet vel. Omnis et asperiores neque neque. Culpa molestias recusandae reprehenderit. Sunt occaecati aliquam dicta maiores voluptatem culpa. Delectus autem sed qui maxime ut saepe. Magnam nulla aut consequuntur sed perspiciatis. Dolores vitae non qui tempore occaecati et.', 'https://images.unsplash.com/photo-1701432925081-9ccb2455c44c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA0OQ&ixlib=rb-4.0.3&q=80&w=1080', 'adcb5358-4f08-4f25-84f4-fdfb4dd4c6b4', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('24d77a37-3fc6-403e-958c-07fb8e54148c', 'Ms. Addie Dach DVM', '+1-704-805-5001', 'Online', 'Placeat minus quod animi nam mollitia pariatur.', '3 hours', '24 hours', 'https://images.unsplash.com/photo-1700884946166-52d042940b04?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA0OA&ixlib=rb-4.0.3&q=80&w=1080', 'Non debitis veniam omnis tenetur aut autem.', 'Ab est fugit explicabo exercitationem aspernatur facere. Sint porro ut qui doloribus. Id voluptate vel quo quam soluta dolorem illum. Non sed nobis praesentium rerum sint tempora rerum. Maxime in similique est omnis est sint et. Rerum esse id voluptatem odio quisquam nesciunt quia. Unde vitae odit voluptas. Aut ut praesentium optio laboriosam necessitatibus qui. Enim qui qui fuga quis vitae ut. Temporibus quis earum sunt provident corrupti expedita necessitatibus. Earum explicabo sint sunt sed earum. Quo et ullam ad maiores provident esse. Ut repellendus est ab totam iste quo et. Odio ut voluptatem placeat facilis dolor in. Repellat dolorem suscipit quo exercitationem voluptas quaerat tempore. Aut sit magni expedita dolor. Eius sit et nihil et fugiat. Aut est aut aut non magnam beatae reprehenderit.', 'https://images.unsplash.com/photo-1701743805124-dde90e4df301?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA0Nw&ixlib=rb-4.0.3&q=80&w=1080', 'adcb5358-4f08-4f25-84f4-fdfb4dd4c6b4', '2023-12-23 13:10:50', '2023-12-23 13:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_followers`
--

CREATE TABLE `merchant_followers` (
  `id` char(36) NOT NULL,
  `merchant_id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` char(36) NOT NULL,
  `message` varchar(255) NOT NULL,
  `room_id` char(36) NOT NULL,
  `messageable_id` char(36) NOT NULL,
  `messageable_type` varchar(255) NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_00_00_000000_create_websockets_statistics_entries_table', 1),
(2, '2013_11_08_000523_create_locations_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_01_03_143400_create_shipments_table', 1),
(8, '2023_10_31_123308_create_merchants_table', 1),
(9, '2023_10_31_125521_create_product_categories_table', 1),
(10, '2023_10_31_125522_create_products_table', 1),
(11, '2023_10_31_131051_create_rooms_table', 1),
(12, '2023_10_31_131052_create_roomables_table', 1),
(13, '2023_11_01_012023_create_payment_methods_table', 1),
(14, '2023_11_01_050708_create_messages_table', 1),
(15, '2023_11_10_013638_create_promos_table', 1),
(16, '2023_11_12_030346_create_flash_sale_products_table', 1),
(17, '2023_11_12_055057_create_product_variants_table', 1),
(18, '2023_11_12_055119_create_product_images_table', 1),
(19, '2023_11_12_055120_create_carts_table', 1),
(20, '2023_12_05_104027_create_product_promos', 1),
(21, '2023_12_07_022154_create_transaction_headers_table', 1),
(22, '2023_12_07_045123_create_transaction_details_table', 1),
(23, '2023_12_07_061520_create_reviews_table', 1),
(24, '2023_12_07_115226_create_electric_transaction_details_table', 1),
(25, '2023_12_08_163825_create_review_images_table', 1),
(26, '2023_12_08_165016_create_review_videos_table', 1),
(27, '2023_12_08_170329_create_review_replies_table', 1),
(28, '2023_12_17_135621_create_merchant_followers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `condition` varchar(255) NOT NULL,
  `merchant_id` char(36) NOT NULL,
  `product_category_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `condition`, `merchant_id`, `product_category_id`, `created_at`, `updated_at`) VALUES
('14de4403-c101-4459-8e04-0cd128753b81', 'Incredible Aluminum Bottle', 'King, \'or I\'ll have you executed.\' The miserable Hatter dropped his teacup and bread-and-butter, and then I\'ll tell you just now what the moral of that dark hall, and wander about among those beds.', 'New', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', '09c253db-907d-4d9c-8279-7422d748d7f4', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('187278d7-5f68-4bb1-ae92-7681453adbcd', 'Fantastic Concrete Keyboard', 'But here, to Alice\'s great surprise, the Duchess\'s cook. She carried the pepper-box in her head, she tried the little golden key, and unlocking the door with his tea spoon at the moment, \'My dear! I.', 'New', '24d77a37-3fc6-403e-958c-07fb8e54148c', 'd40f0a4f-fd5e-4f9f-a97f-54a05f087a3b', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('2a43a3ce-28a9-467a-95c3-7ac963c20813', 'Lightweight Rubber Bench', 'Hatter. \'You MUST remember,\' remarked the King, \'that only makes the matter on, What would become of me? They\'re dreadfully fond of pretending to be two people! Why, there\'s hardly room for YOU, and.', 'Used', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', 'a1455751-fef0-4e74-9b8a-566e6e9129c1', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('31769a3b-4a59-4468-8123-4819cdefa5c8', 'Mediocre Concrete Chair', 'Suppress him! Pinch him! Off with his head!\' or \'Off with his nose Trims his belt and his buttons, and turns out his toes.\' [later editions continued as follows The Panther took pie-crust, and.', 'Used', '18c4e9f7-5169-4184-89f9-6efdb4c68866', '73205f43-3aac-4448-bce4-c8c63f60927c', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('32534c19-3b39-49e8-9e16-d872fc725ba3', 'Incredible Copper Clock', 'WHAT?\' said the Caterpillar. Alice thought to herself. \'Shy, they seem to dry me at all.\' \'In that case,\' said the Hatter; \'so I should think you\'ll feel it a violent shake at the end of the.', 'New', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', '7b66004e-ade7-46ec-8e38-682125a729cd', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('4e5fcd03-3036-473f-8732-d1c1b701fcc6', 'Small Cotton Computer', 'Alice did not come the same thing with you,\' said Alice, \'how am I to get in at all?\' said the Dodo, pointing to the shore, and then she walked off, leaving Alice alone with the next moment she.', 'New', '18c4e9f7-5169-4184-89f9-6efdb4c68866', '08bd5a8d-3852-4425-9e3a-059f1083bf9f', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('52389d03-8489-49cc-851e-b7fa767c2870', 'Intelligent Wooden Shirt', 'Alice panted as she could, for the moment she quite forgot how to get into the book her sister on the door opened inwards, and Alice\'s first thought was that you think you\'re changed, do you?\' \'I\'m.', 'New', '24d77a37-3fc6-403e-958c-07fb8e54148c', '08bd5a8d-3852-4425-9e3a-059f1083bf9f', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('5c817971-6be2-456f-96b2-0691b74c0060', 'Awesome Plastic Computer', 'I can\'t take LESS,\' said the Cat. \'I\'d nearly forgotten to ask.\' \'It turned into a large piece out of its right ear and left off sneezing by this very sudden change, but very glad to get to,\' said.', 'Used', '24d77a37-3fc6-403e-958c-07fb8e54148c', 'dae5258b-6c82-444e-b4fd-85c2dd888ebb', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('6bd66071-43e5-46b1-b8da-e92141933fe0', 'Enormous Linen Bag', 'Caucus-race.\' \'What IS a long way. So she began looking at everything that Alice could see it trying in a more subdued tone, and she had found the fan and gloves, and, as the doubled-up soldiers.', 'Used', '24d77a37-3fc6-403e-958c-07fb8e54148c', '7b66004e-ade7-46ec-8e38-682125a729cd', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('6cc609b8-7a88-4e77-9e59-f6999a9b2f3a', 'Awesome Wool Shirt', 'Mock Turtle went on, very much at this, she noticed that the cause of this remark, and thought it over afterwards, it occurred to her great disappointment it was sneezing and howling alternately.', 'Used', '18c4e9f7-5169-4184-89f9-6efdb4c68866', 'd40f0a4f-fd5e-4f9f-a97f-54a05f087a3b', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('6cc610b0-5e16-467a-b705-253899f0a0bb', 'Practical Linen Plate', 'And yet I wish I hadn\'t quite finished my tea when I learn music.\' \'Ah! that accounts for it,\' said Alice, quite forgetting her promise. \'Treacle,\' said the Caterpillar took the watch and looked at.', 'New', '18c4e9f7-5169-4184-89f9-6efdb4c68866', 'af055516-c1da-49ab-bdcf-2f2a2cad093b', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('6f7bf341-2903-4d73-a42c-c1a2efb31193', 'Incredible Wool Bag', 'By the time when she turned away. \'Come back!\' the Caterpillar contemptuously. \'Who are YOU?\' Which brought them back again to the Dormouse, and repeated her question. \'Why did they draw the treacle.', 'New', '24d77a37-3fc6-403e-958c-07fb8e54148c', '794c2045-d084-4708-8329-d2ebe6a279c6', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('8765cffd-4237-475a-8834-60552fcbfc58', 'Awesome Iron Clock', 'I beat him when he pleases!\' CHORUS. \'Wow! wow! wow!\' While the Owl had the best plan.\' It sounded an excellent opportunity for making her escape; so she took courage, and went down on their throne.', 'New', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', '3572b885-bf6a-49ef-84ca-11f1ce1c3c55', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('889bc1cb-3909-4c9d-85ef-8fab44e98566', 'Lightweight Cotton Watch', 'WOULD put their heads downward! The Antipathies, I think--\' (she was so ordered about in all directions, \'just like a thunderstorm. \'A fine day, your Majesty!\' the soldiers remaining behind to.', 'Used', '18c4e9f7-5169-4184-89f9-6efdb4c68866', '794c2045-d084-4708-8329-d2ebe6a279c6', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('8bb577c8-9434-466d-8b85-a9a5801b29c6', 'Mediocre Wool Plate', 'Gryphon is, look at me like that!\' He got behind him, and said \'What else have you executed.\' The miserable Hatter dropped his teacup and bread-and-butter, and then unrolled the parchment scroll.', 'Used', '24d77a37-3fc6-403e-958c-07fb8e54148c', 'cbb8bc3c-f4a6-489d-aeda-40753b4ea2ba', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('940debdf-3d60-47f5-8a4e-b23822d9e4a7', 'Fantastic Cotton Clock', 'She had not long to doubt, for the Dormouse,\' thought Alice; \'only, as it\'s asleep, I suppose Dinah\'ll be sending me on messages next!\' And she went back to the shore, and then added them up, and.', 'New', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', 'a2763cd2-26ee-4cd0-bfb9-8f1b8a0019f7', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('9a59dd59-ba0e-4462-85fc-697fd42eecc2', 'Durable Steel Pants', 'Alice\'s first thought was that she remained the same words as before, \'It\'s all about for some time without hearing anything more: at last in the flurry of the teacups as the other.\' As soon as the.', 'Used', '18c4e9f7-5169-4184-89f9-6efdb4c68866', '08bd5a8d-3852-4425-9e3a-059f1083bf9f', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('9dcd1635-8654-41dc-968f-8db140351923', 'Enormous Plastic Coat', 'Alice, \'we learned French and music.\' \'And washing?\' said the King; and the fan, and skurried away into the roof of the jurymen. \'It isn\'t directed at all,\' said Alice: \'three inches is such a thing.', 'New', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', 'dae5258b-6c82-444e-b4fd-85c2dd888ebb', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('a3e9f776-54a4-494d-b137-9b057c050b1a', 'Small Concrete Computer', 'Seven looked up eagerly, half hoping that they must needs come wriggling down from the Gryphon, and all the rest, Between yourself and me.\' \'That\'s the most important piece of evidence we\'ve heard.', 'New', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', '73205f43-3aac-4448-bce4-c8c63f60927c', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('a98309dc-0d3f-4149-8844-848ae070eb12', 'Small Cotton Keyboard', 'WAS a curious dream!\' said Alice, \'because I\'m not particular as to bring but one; Bill\'s got to the dance. Would not, could not, could not, would not, could not, would not, could not, could not.', 'New', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', 'dae5258b-6c82-444e-b4fd-85c2dd888ebb', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('aa3a2926-ec16-4d95-ae60-2563b5297629', 'Intelligent Linen Clock', 'King said to the jury, and the other queer noises, would change (she knew) to the beginning of the evening, beautiful Soup! \'Beautiful Soup! Who cares for fish, Game, or any other dish? Who would.', 'New', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', '794c2045-d084-4708-8329-d2ebe6a279c6', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('ac86192a-6cdf-4efc-b644-53d636874e81', 'Heavy Duty Marble Clock', 'O Mouse!\' (Alice thought this a very difficult question. However, at last in the air. Even the Duchess asked, with another hedgehog, which seemed to follow, except a tiny golden key, and when she.', 'New', '18c4e9f7-5169-4184-89f9-6efdb4c68866', 'a1455751-fef0-4e74-9b8a-566e6e9129c1', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('af7c654a-1d4d-400e-b885-c4a9adc42ce3', 'Heavy Duty Wooden Coat', 'Caterpillar sternly. \'Explain yourself!\' \'I can\'t help it,\' said Alice indignantly. \'Ah! then yours wasn\'t a really good school,\' said the Gryphon. \'I\'ve forgotten the little magic bottle had now.', 'Used', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', '2b2b9fa5-ab10-4953-9c3c-8dd2e1d595da', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('cee5f22a-33a6-4539-95b6-efbb08e1c608', 'Intelligent Aluminum Shoes', 'Besides, SHE\'S she, and I\'m sure I have to ask help of any one; so, when the Rabbit coming to look at it!\' This speech caused a remarkable sensation among the leaves, which she had expected: before.', 'Used', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', 'a1455751-fef0-4e74-9b8a-566e6e9129c1', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('d501c9b7-d57c-49d6-879f-6eb411f309ca', 'Heavy Duty Rubber Lamp', 'King was the first really clever thing the King hastily said, and went on all the rest, Between yourself and me.\' \'That\'s the reason so many out-of-the-way things to happen, that it signifies much,\'.', 'New', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', 'dae5258b-6c82-444e-b4fd-85c2dd888ebb', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('d884b273-4def-463c-96b1-32116edd40b3', 'Small Wooden Pants', 'Alice with one finger for the next thing was waving its tail about in all directions, tumbling up against each other; however, they got their tails in their mouths. So they got thrown out to be.', 'New', '18c4e9f7-5169-4184-89f9-6efdb4c68866', 'a24281a4-c254-4f48-bea3-19aed072b72c', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('e242da39-6c25-4055-8c63-bdc8d28cb3b9', 'Rustic Iron Bench', 'Then came a rumbling of little cartwheels, and the roof was thatched with fur. It was the first witness,\' said the Cat. \'I\'d nearly forgotten that I\'ve got to go nearer till she too began dreaming.', 'New', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', '08bd5a8d-3852-4425-9e3a-059f1083bf9f', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('e553f442-52f6-47d5-b09c-5022b9455e7e', 'Aerodynamic Linen Keyboard', 'Hatter. Alice felt so desperate that she began again: \'Ou est ma chatte?\' which was the Cat in a low, timid voice, \'If you didn\'t like cats.\' \'Not like cats!\' cried the Mouse, frowning, but very.', 'New', '24d77a37-3fc6-403e-958c-07fb8e54148c', 'a2763cd2-26ee-4cd0-bfb9-8f1b8a0019f7', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('e569c59d-62ac-44cb-96f3-a580c7e68330', 'Enormous Rubber Knife', 'Mouse to tell its age, there was a little of the Queen\'s ears--\' the Rabbit whispered in a soothing tone: \'don\'t be angry about it. And yet I wish you wouldn\'t have come here.\' Alice didn\'t think.', 'Used', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', 'cbb8bc3c-f4a6-489d-aeda-40753b4ea2ba', '2023-12-23 13:10:50', '2023-12-23 13:10:50'),
('fbe899ba-5904-4ac3-a148-d1f148e53d35', 'Fantastic Paper Shoes', 'I could shut up like a serpent. She had quite a new idea to Alice, she went on so long since she had plenty of time as she wandered about in the last few minutes, and she soon found out that part.\'.', 'Used', '1bf04e34-4b15-4ed5-a91d-1e0a2f295b9b', '794c2045-d084-4708-8329-d2ebe6a279c6', '2023-12-23 13:10:50', '2023-12-23 13:10:50');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
('05bd84fc-e742-4c8a-ad19-be6de3b28880', 'Hoodie', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('08bd5a8d-3852-4425-9e3a-059f1083bf9f', 'Living Room', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('09c253db-907d-4d9c-8279-7422d748d7f4', 'Books', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('1580615d-0856-452f-b8ab-7fa29408bd24', 'Toys', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('2b2b9fa5-ab10-4953-9c3c-8dd2e1d595da', 'Jeans', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('3572b885-bf6a-49ef-84ca-11f1ce1c3c55', 'Laptop', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('51a4633e-fe7b-443e-8cf1-05db0239f6d7', 'TV', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('73205f43-3aac-4448-bce4-c8c63f60927c', 'Phone', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('794c2045-d084-4708-8329-d2ebe6a279c6', 'Smart Watch', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('7b66004e-ade7-46ec-8e38-682125a729cd', 'Dress', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('8546f2ad-a951-455c-b254-2349360ed55a', 'Shoes', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('92918630-a612-4d72-8cd3-547323afaaee', 'Kitchen', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('a1455751-fef0-4e74-9b8a-566e6e9129c1', 'Pants', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('a24281a4-c254-4f48-bea3-19aed072b72c', 'Family Room', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('a2763cd2-26ee-4cd0-bfb9-8f1b8a0019f7', 'Bed Room', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('af055516-c1da-49ab-bdcf-2f2a2cad093b', 'Home Appliances', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('cbb8bc3c-f4a6-489d-aeda-40753b4ea2ba', 'Jacket', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('cc33b038-eac7-4551-b032-7cbf0e0a6bf0', 'Scarf', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('d40f0a4f-fd5e-4f9f-a97f-54a05f087a3b', 'Shirts', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('dae5258b-6c82-444e-b4fd-85c2dd888ebb', 'Hat', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('e60d8f9d-0d51-4618-8deb-80068ae89a1f', 'Monitor', '2023-12-23 13:10:33', '2023-12-23 13:10:33'),
('fe215ce9-0403-43e7-a75a-970ca7b1881a', 'T-Shirt', '2023-12-23 13:10:33', '2023-12-23 13:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` char(36) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
('00657a04-c706-45a1-8305-a98d1902932e', 'https://plus.unsplash.com/premium_photo-1687710306899-10a3bfcacf9b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA5Ng&ixlib=rb-4.0.3&q=80&w=1080', 'e569c59d-62ac-44cb-96f3-a580c7e68330', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('0664a7d6-7374-4d86-bade-9318c66b6666', 'https://plus.unsplash.com/premium_photo-1678189527655-49bf461ce525?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzEwMQ&ixlib=rb-4.0.3&q=80&w=1080', '2a43a3ce-28a9-467a-95c3-7ac963c20813', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('09f8d59f-312f-490c-865c-7760497176ff', 'https://plus.unsplash.com/premium_photo-1700012853644-e09bf0a02806?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA4Mw&ixlib=rb-4.0.3&q=80&w=1080', '52389d03-8489-49cc-851e-b7fa767c2870', '2023-12-23 13:11:23', '2023-12-23 13:11:23'),
('0ec37a79-c4bb-4e6f-975d-3f829a973c19', 'https://images.unsplash.com/photo-1702243491015-75e7cf174c09?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA3MA&ixlib=rb-4.0.3&q=80&w=1080', 'ac86192a-6cdf-4efc-b644-53d636874e81', '2023-12-23 13:11:10', '2023-12-23 13:11:10'),
('107d9338-c136-4a25-874a-4db0bd61d361', 'https://images.unsplash.com/photo-1702165637236-46169676d7ac?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA1Mw&ixlib=rb-4.0.3&q=80&w=1080', 'e242da39-6c25-4055-8c63-bdc8d28cb3b9', '2023-12-23 13:10:53', '2023-12-23 13:10:53'),
('1275ac6a-0a1c-465a-a615-096ce1f39483', 'https://images.unsplash.com/photo-1701770497977-04991d6f1371?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA2NA&ixlib=rb-4.0.3&q=80&w=1080', '8765cffd-4237-475a-8834-60552fcbfc58', '2023-12-23 13:11:04', '2023-12-23 13:11:04'),
('1308b5b5-3e43-4c9d-8dca-8d1ed82301ed', 'https://images.unsplash.com/photo-1702452782235-9b850b9255c2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA5Nw&ixlib=rb-4.0.3&q=80&w=1080', '9dcd1635-8654-41dc-968f-8db140351923', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('1bd1652a-1f34-404c-ac7b-93835a1ef0fe', 'https://images.unsplash.com/photo-1702629072725-6898c08c4caf?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA1NA&ixlib=rb-4.0.3&q=80&w=1080', '14de4403-c101-4459-8e04-0cd128753b81', '2023-12-23 13:10:54', '2023-12-23 13:10:54'),
('211e5616-d354-4ac0-8102-eea1942141a3', 'https://plus.unsplash.com/premium_photo-1701180889629-51ae1aba1a70?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA2Nw&ixlib=rb-4.0.3&q=80&w=1080', '940debdf-3d60-47f5-8a4e-b23822d9e4a7', '2023-12-23 13:11:07', '2023-12-23 13:11:07'),
('2466a315-a36f-4a90-93e7-64f2ef1dec4f', 'https://images.unsplash.com/photo-1700508317396-e343a69ac72f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA1MQ&ixlib=rb-4.0.3&q=80&w=1080', '6bd66071-43e5-46b1-b8da-e92141933fe0', '2023-12-23 13:10:51', '2023-12-23 13:10:51'),
('2f1bbd0b-d019-4f77-8f78-9b46b376013f', 'https://images.unsplash.com/photo-1702009757735-3b26c92ba8b8?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA4Ng&ixlib=rb-4.0.3&q=80&w=1080', 'ac86192a-6cdf-4efc-b644-53d636874e81', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('389e689d-5d87-485a-94c8-3ae0ecace192', 'https://plus.unsplash.com/premium_photo-1702531818663-ae7db6d59788?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA4NQ&ixlib=rb-4.0.3&q=80&w=1080', 'd884b273-4def-463c-96b1-32116edd40b3', '2023-12-23 13:11:25', '2023-12-23 13:11:25'),
('3a3c746c-88b7-4481-bae3-2251eda2a4db', 'https://images.unsplash.com/photo-1700771266232-7a31af68eb31?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA2Ng&ixlib=rb-4.0.3&q=80&w=1080', '31769a3b-4a59-4468-8123-4819cdefa5c8', '2023-12-23 13:11:06', '2023-12-23 13:11:06'),
('4bc9ef91-453b-4dbc-af6e-4c6b2ceb36ae', 'https://plus.unsplash.com/premium_photo-1700996706236-05a3afabe6ed?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA3Nw&ixlib=rb-4.0.3&q=80&w=1080', '6f7bf341-2903-4d73-a42c-c1a2efb31193', '2023-12-23 13:11:17', '2023-12-23 13:11:17'),
('55f2cadf-6936-4c0f-8a17-a76ddf914e95', 'https://images.unsplash.com/photo-1703243373837-9f96a7d565d1?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA2NQ&ixlib=rb-4.0.3&q=80&w=1080', '889bc1cb-3909-4c9d-85ef-8fab44e98566', '2023-12-23 13:11:05', '2023-12-23 13:11:05'),
('5c4333cf-c827-41d3-a07b-f70074e99939', 'https://images.unsplash.com/photo-1701964619678-36b35865e238?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA5NA&ixlib=rb-4.0.3&q=80&w=1080', 'fbe899ba-5904-4ac3-a148-d1f148e53d35', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('5e8c021f-f646-4510-9132-9b9740bd8e15', 'https://plus.unsplash.com/premium_photo-1671288795359-5a505b9c6663?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA1OQ&ixlib=rb-4.0.3&q=80&w=1080', '8bb577c8-9434-466d-8b85-a9a5801b29c6', '2023-12-23 13:11:03', '2023-12-23 13:11:03'),
('649925d7-58b4-4a68-92fd-1c6652a26bf9', 'https://plus.unsplash.com/premium_photo-1696495683055-dae4291351f6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA1NQ&ixlib=rb-4.0.3&q=80&w=1080', '5c817971-6be2-456f-96b2-0691b74c0060', '2023-12-23 13:10:55', '2023-12-23 13:10:55'),
('69bf1390-9d10-4286-9cf9-7984c5d8c877', 'https://plus.unsplash.com/premium_photo-1663840075261-29da753918a0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzEwMA&ixlib=rb-4.0.3&q=80&w=1080', '187278d7-5f68-4bb1-ae92-7681453adbcd', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('6ab841ea-6cf0-4ace-b88f-ee0178e758c0', 'https://plus.unsplash.com/premium_photo-1695559212601-f799f6cc0f8b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA5Mw&ixlib=rb-4.0.3&q=80&w=1080', 'e569c59d-62ac-44cb-96f3-a580c7e68330', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('7c3816e3-ffa9-46cc-ad8b-e978a116fca7', 'https://plus.unsplash.com/premium_photo-1666557390408-54d218815a4d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA3OA&ixlib=rb-4.0.3&q=80&w=1080', '9dcd1635-8654-41dc-968f-8db140351923', '2023-12-23 13:11:18', '2023-12-23 13:11:18'),
('7e4d6617-c892-47cf-b621-acbc3a7fc0ea', 'https://images.unsplash.com/photo-1702211898194-1bf701f35b59?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA3MQ&ixlib=rb-4.0.3&q=80&w=1080', '32534c19-3b39-49e8-9e16-d872fc725ba3', '2023-12-23 13:11:11', '2023-12-23 13:11:11'),
('80357121-ed16-4d40-8577-fac27b2a56b7', 'https://images.unsplash.com/photo-1702998033114-c01f9b2dea5b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA4OQ&ixlib=rb-4.0.3&q=80&w=1080', '9dcd1635-8654-41dc-968f-8db140351923', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('97570c02-320f-43f8-b443-b11c23c96cc1', 'https://plus.unsplash.com/premium_photo-1701190544179-70809748783c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA4OA&ixlib=rb-4.0.3&q=80&w=1080', '6f7bf341-2903-4d73-a42c-c1a2efb31193', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('a3b4a77d-4b10-4e21-ba23-49d1e20a382e', 'https://images.unsplash.com/photo-1700778236011-805a724369bb?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA1Nw&ixlib=rb-4.0.3&q=80&w=1080', 'cee5f22a-33a6-4539-95b6-efbb08e1c608', '2023-12-23 13:10:58', '2023-12-23 13:10:58'),
('ab1d2c0b-c6f3-4963-8181-08f41f86f4d1', 'https://plus.unsplash.com/premium_photo-1661757801000-aafebf8fbac2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA4Nw&ixlib=rb-4.0.3&q=80&w=1080', '6bd66071-43e5-46b1-b8da-e92141933fe0', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('ab3f337b-baaf-4415-b07a-739ad929d01d', 'https://plus.unsplash.com/premium_photo-1667587245482-60a612c40a88?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA2OQ&ixlib=rb-4.0.3&q=80&w=1080', '6cc609b8-7a88-4e77-9e59-f6999a9b2f3a', '2023-12-23 13:11:09', '2023-12-23 13:11:09'),
('b893226e-c6d5-4301-ab85-ac252dd271bf', 'https://images.unsplash.com/photo-1702213403689-5fcbb4efbd3b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA2OA&ixlib=rb-4.0.3&q=80&w=1080', 'af7c654a-1d4d-400e-b885-c4a9adc42ce3', '2023-12-23 13:11:08', '2023-12-23 13:11:08'),
('ba1a8ee8-a31e-414b-b2df-61770ad70c99', 'https://plus.unsplash.com/premium_photo-1665929003668-20b38a235ce0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA5NQ&ixlib=rb-4.0.3&q=80&w=1080', 'a98309dc-0d3f-4149-8844-848ae070eb12', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('bf1abd71-6662-4f2e-9496-29ca9a645df4', 'https://plus.unsplash.com/premium_photo-1700391373027-e0ba6c3da990?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA3NA&ixlib=rb-4.0.3&q=80&w=1080', 'aa3a2926-ec16-4d95-ae60-2563b5297629', '2023-12-23 13:11:14', '2023-12-23 13:11:14'),
('c34c93fc-82a4-4c6b-99ec-85c3be2151c5', 'https://plus.unsplash.com/premium_photo-1696863126083-00f45d5f9112?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA1Ng&ixlib=rb-4.0.3&q=80&w=1080', '187278d7-5f68-4bb1-ae92-7681453adbcd', '2023-12-23 13:10:56', '2023-12-23 13:10:56'),
('c72ca067-04b0-4451-ae70-88e859d93a9b', 'https://plus.unsplash.com/premium_photo-1701151540988-5a8486eec099?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA3Mg&ixlib=rb-4.0.3&q=80&w=1080', '2a43a3ce-28a9-467a-95c3-7ac963c20813', '2023-12-23 13:11:12', '2023-12-23 13:11:12'),
('c823e75d-c90a-4ed2-a6db-706dddc7b2da', 'https://images.unsplash.com/photo-1699614614445-cec735a6c27d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA4MA&ixlib=rb-4.0.3&q=80&w=1080', 'e569c59d-62ac-44cb-96f3-a580c7e68330', '2023-12-23 13:11:21', '2023-12-23 13:11:21'),
('cf5bdb5e-2270-4c4f-8f97-51db73409d2a', 'https://plus.unsplash.com/premium_photo-1674674467164-e9d6821a3b4e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA5Mg&ixlib=rb-4.0.3&q=80&w=1080', '9dcd1635-8654-41dc-968f-8db140351923', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('d88a1553-185f-4c9e-8daf-c8e6f6faefca', 'https://images.unsplash.com/photo-1700159915754-2b4ba5b2e3be?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA3Mw&ixlib=rb-4.0.3&q=80&w=1080', '9a59dd59-ba0e-4462-85fc-697fd42eecc2', '2023-12-23 13:11:13', '2023-12-23 13:11:13'),
('e00409ad-7aee-4ff8-bb0b-36315a8c5b45', 'https://plus.unsplash.com/premium_photo-1700583711364-ad77a9eba0b6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA5OQ&ixlib=rb-4.0.3&q=80&w=1080', '5c817971-6be2-456f-96b2-0691b74c0060', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('e0134e8f-f3df-499a-aa3c-04919f88ed86', 'https://plus.unsplash.com/premium_photo-1702058276326-f811ee015ae7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA5MQ&ixlib=rb-4.0.3&q=80&w=1080', '9a59dd59-ba0e-4462-85fc-697fd42eecc2', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('eb659547-9a4b-439a-8646-8f3deed0ecb3', 'https://images.unsplash.com/photo-1703023583529-d64a19bbba16?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA3Ng&ixlib=rb-4.0.3&q=80&w=1080', 'a98309dc-0d3f-4149-8844-848ae070eb12', '2023-12-23 13:11:16', '2023-12-23 13:11:16'),
('ec4e6d55-bda2-4b2c-bece-a67ab9a3aa86', 'https://plus.unsplash.com/premium_photo-1667861383621-4ebdc0a93a5e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA3OQ&ixlib=rb-4.0.3&q=80&w=1080', 'd501c9b7-d57c-49d6-879f-6eb411f309ca', '2023-12-23 13:11:20', '2023-12-23 13:11:20'),
('eeac3447-8d75-4cda-ba69-be8ab287209d', 'https://images.unsplash.com/photo-1702336467664-18469b8f4ecf?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA1OA&ixlib=rb-4.0.3&q=80&w=1080', 'fbe899ba-5904-4ac3-a148-d1f148e53d35', '2023-12-23 13:10:59', '2023-12-23 13:10:59'),
('f6b85b77-33cb-484f-8479-29872dfa2b7c', 'https://images.unsplash.com/photo-1571053748382-141b7de59b88?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA5MA&ixlib=rb-4.0.3&q=80&w=1080', '32534c19-3b39-49e8-9e16-d872fc725ba3', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('f82b55cf-8109-46dc-a84f-d0a81b45d6c4', 'https://plus.unsplash.com/premium_photo-1700685893346-8893f0616e88?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA4NA&ixlib=rb-4.0.3&q=80&w=1080', '6cc610b0-5e16-467a-b705-253899f0a0bb', '2023-12-23 13:11:24', '2023-12-23 13:11:24'),
('fb5e4976-d4a9-4f7b-a4ea-053834bd6d12', 'https://images.unsplash.com/photo-1700513971603-eda40374ba0a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA3NQ&ixlib=rb-4.0.3&q=80&w=1080', 'e553f442-52f6-47d5-b09c-5022b9455e7e', '2023-12-23 13:11:15', '2023-12-23 13:11:15'),
('fbf14220-5b07-4d24-a3ae-8bb488071db1', 'https://images.unsplash.com/photo-1635439030842-babc7a7d2a4a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA4Mg&ixlib=rb-4.0.3&q=80&w=1080', '4e5fcd03-3036-473f-8732-d1c1b701fcc6', '2023-12-23 13:11:22', '2023-12-23 13:11:22'),
('fe0dec1c-35f0-46e1-ae94-b34d808b5f49', 'https://images.unsplash.com/photo-1701274101625-d1328ac138dd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA1Mg&ixlib=rb-4.0.3&q=80&w=1080', 'a3e9f776-54a4-494d-b137-9b057c050b1a', '2023-12-23 13:10:52', '2023-12-23 13:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_promos`
--

CREATE TABLE `product_promos` (
  `id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `promo_id` char(36) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_promos`
--

INSERT INTO `product_promos` (`id`, `product_id`, `promo_id`, `discount`, `created_at`, `updated_at`) VALUES
('583fb4d4-c4e3-44c7-8075-d7dce9c5141c', '2a43a3ce-28a9-467a-95c3-7ac963c20813', 'fa55402a-9e7f-4e71-9e21-bce9cae8d16c', 27, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('0f37ae8c-9663-4f7d-aa96-d3855d07789b', '8bb577c8-9434-466d-8b85-a9a5801b29c6', 'fa55402a-9e7f-4e71-9e21-bce9cae8d16c', 26, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('bde84032-5e4b-47ec-857a-58e250e222ed', '6cc609b8-7a88-4e77-9e59-f6999a9b2f3a', 'fa55402a-9e7f-4e71-9e21-bce9cae8d16c', 26, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('e75ed2f1-d568-4be2-8ae5-7135147c7794', 'ac86192a-6cdf-4efc-b644-53d636874e81', 'fa55402a-9e7f-4e71-9e21-bce9cae8d16c', 38, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('9d87f172-821d-4278-8aa5-9eea89e21c40', 'd884b273-4def-463c-96b1-32116edd40b3', 'fa55402a-9e7f-4e71-9e21-bce9cae8d16c', 30, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('9be40734-ccb2-4067-9333-67f154a71527', '4e5fcd03-3036-473f-8732-d1c1b701fcc6', '8dd19576-f251-47a1-9a6e-ae85c9d6a625', 25, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('1bc1b04a-a54b-4bdf-b30b-cf9622ffad9f', 'd501c9b7-d57c-49d6-879f-6eb411f309ca', '8dd19576-f251-47a1-9a6e-ae85c9d6a625', 35, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('6db907c2-f380-47c3-b7a2-92faeeec2f8c', '8bb577c8-9434-466d-8b85-a9a5801b29c6', '8dd19576-f251-47a1-9a6e-ae85c9d6a625', 40, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('97d236ad-090f-4ab0-b3d0-22e79d6d3a70', 'cee5f22a-33a6-4539-95b6-efbb08e1c608', '8dd19576-f251-47a1-9a6e-ae85c9d6a625', 33, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('0b7653e2-36fe-4559-b8c8-bbb1c5a6beba', 'd884b273-4def-463c-96b1-32116edd40b3', '8dd19576-f251-47a1-9a6e-ae85c9d6a625', 31, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('4a471bb3-64e7-4ad4-9bbd-87cf42da5998', 'cee5f22a-33a6-4539-95b6-efbb08e1c608', '9ef2a0c6-119a-499c-b7ca-55f74694fbf1', 35, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('66203799-c9fd-4d12-ac9a-b65a63211583', '14de4403-c101-4459-8e04-0cd128753b81', '9ef2a0c6-119a-499c-b7ca-55f74694fbf1', 25, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('21226982-9f8d-4d02-a623-4162a023a287', '4e5fcd03-3036-473f-8732-d1c1b701fcc6', '9ef2a0c6-119a-499c-b7ca-55f74694fbf1', 28, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('7e62be23-7727-4429-a011-1afd5e1f905f', 'e242da39-6c25-4055-8c63-bdc8d28cb3b9', '9ef2a0c6-119a-499c-b7ca-55f74694fbf1', 40, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('eb45e149-b641-41c9-a619-b51b43cb6837', '187278d7-5f68-4bb1-ae92-7681453adbcd', '9ef2a0c6-119a-499c-b7ca-55f74694fbf1', 31, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('8e76e3c8-be84-4b4f-b463-b93fad2af70c', 'ac86192a-6cdf-4efc-b644-53d636874e81', 'e69ad258-70fa-4794-991a-387838da7802', 32, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('b241bbd5-b8b5-4133-9731-db8e12119e3b', 'e569c59d-62ac-44cb-96f3-a580c7e68330', 'e69ad258-70fa-4794-991a-387838da7802', 36, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('d32243f5-1211-4618-b46c-5dcb2923a791', 'ac86192a-6cdf-4efc-b644-53d636874e81', 'e69ad258-70fa-4794-991a-387838da7802', 25, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('294e07e9-bb97-4e03-aadc-cf8d3182af6a', '9dcd1635-8654-41dc-968f-8db140351923', 'e69ad258-70fa-4794-991a-387838da7802', 30, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('3c2b6278-fb92-4e78-9b2f-1813e3d6f76f', 'a98309dc-0d3f-4149-8844-848ae070eb12', 'e69ad258-70fa-4794-991a-387838da7802', 26, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('08bdd9c4-3bab-4d62-b046-251de07d6996', '2a43a3ce-28a9-467a-95c3-7ac963c20813', 'c5bad9bb-eca4-466c-84f4-b2b3986b920b', 26, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('e40f3774-ee26-4c86-a435-3ad3320041c8', 'a98309dc-0d3f-4149-8844-848ae070eb12', 'c5bad9bb-eca4-466c-84f4-b2b3986b920b', 39, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('4d272329-510f-4439-a3d3-b290a27dd366', '6cc610b0-5e16-467a-b705-253899f0a0bb', 'c5bad9bb-eca4-466c-84f4-b2b3986b920b', 33, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('f6dfdacd-31e7-4cd5-b6b3-cd45406153af', '4e5fcd03-3036-473f-8732-d1c1b701fcc6', 'c5bad9bb-eca4-466c-84f4-b2b3986b920b', 31, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('a0a600a9-0bf4-478e-b7d5-c7bde90416f0', '6cc609b8-7a88-4e77-9e59-f6999a9b2f3a', 'c5bad9bb-eca4-466c-84f4-b2b3986b920b', 37, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('02fa835e-85e7-443b-8ca9-79edf1a5abd3', '52389d03-8489-49cc-851e-b7fa767c2870', '8dd19576-f251-47a1-9a6e-ae85c9d6a625', 39, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('7aaa8ca2-170b-4bba-bdce-9053340da8d6', '8765cffd-4237-475a-8834-60552fcbfc58', 'e69ad258-70fa-4794-991a-387838da7802', 59, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('9d2c83f4-1462-4246-bb58-91af4bf36979', 'ac86192a-6cdf-4efc-b644-53d636874e81', 'fa55402a-9e7f-4e71-9e21-bce9cae8d16c', 46, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('ddaa55db-52d2-4817-8728-207d1f1c5c3b', '5c817971-6be2-456f-96b2-0691b74c0060', 'c5bad9bb-eca4-466c-84f4-b2b3986b920b', 38, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('8204c39e-f86e-456f-858c-8cc44b1f4c51', '6f7bf341-2903-4d73-a42c-c1a2efb31193', 'e69ad258-70fa-4794-991a-387838da7802', 57, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('0cda4a9f-d076-4167-b6db-cee05b931e15', '32534c19-3b39-49e8-9e16-d872fc725ba3', '9ef2a0c6-119a-499c-b7ca-55f74694fbf1', 39, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('ed561315-6688-4368-a092-084cc1b8b5ac', 'fbe899ba-5904-4ac3-a148-d1f148e53d35', 'fa55402a-9e7f-4e71-9e21-bce9cae8d16c', 74, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('374f2c1e-e73a-4360-8168-b5f2526dfa59', '9a59dd59-ba0e-4462-85fc-697fd42eecc2', '8dd19576-f251-47a1-9a6e-ae85c9d6a625', 62, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('acde8896-9ec2-484f-ba72-14e208035041', 'e569c59d-62ac-44cb-96f3-a580c7e68330', '8dd19576-f251-47a1-9a6e-ae85c9d6a625', 73, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('0f9ecebd-bab0-4d58-a0ed-9030163c2ab0', '889bc1cb-3909-4c9d-85ef-8fab44e98566', '9ef2a0c6-119a-499c-b7ca-55f74694fbf1', 45, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('4693ab3c-4754-45bb-ba95-1b7edf2487ad', '9dcd1635-8654-41dc-968f-8db140351923', 'fa55402a-9e7f-4e71-9e21-bce9cae8d16c', 46, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('ebbb5874-f206-4ec2-a2ae-d0fd0002fc8a', '6cc610b0-5e16-467a-b705-253899f0a0bb', 'c5bad9bb-eca4-466c-84f4-b2b3986b920b', 74, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('1773e273-e31f-4f72-a098-69143341ff20', 'ac86192a-6cdf-4efc-b644-53d636874e81', 'c5bad9bb-eca4-466c-84f4-b2b3986b920b', 74, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('0d5d6873-7f58-4792-a156-0f7ae1fcb3cb', '8bb577c8-9434-466d-8b85-a9a5801b29c6', '9ef2a0c6-119a-499c-b7ca-55f74694fbf1', 52, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('735a3343-03d4-4a70-b03e-ae77f9b70f81', '9a59dd59-ba0e-4462-85fc-697fd42eecc2', 'e69ad258-70fa-4794-991a-387838da7802', 38, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('46242bc6-caf5-4f0c-ba33-71d192ddcb22', 'd884b273-4def-463c-96b1-32116edd40b3', 'c5bad9bb-eca4-466c-84f4-b2b3986b920b', 68, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('67ece9f2-39a4-44c6-8852-791401bba910', '32534c19-3b39-49e8-9e16-d872fc725ba3', 'fa55402a-9e7f-4e71-9e21-bce9cae8d16c', 31, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('eaac0688-fe4d-49d5-a7a4-c4407b0b55ba', '2a43a3ce-28a9-467a-95c3-7ac963c20813', 'fa55402a-9e7f-4e71-9e21-bce9cae8d16c', 59, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('7dba0c02-d277-4034-9ccf-90915a691d39', 'cee5f22a-33a6-4539-95b6-efbb08e1c608', '8dd19576-f251-47a1-9a6e-ae85c9d6a625', 44, '2023-12-23 13:11:43', '2023-12-23 13:11:43'),
('7fc6c739-de00-4c02-958b-74651cb537fe', 'e569c59d-62ac-44cb-96f3-a580c7e68330', 'c5bad9bb-eca4-466c-84f4-b2b3986b920b', 70, '2023-12-23 13:11:43', '2023-12-23 13:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` char(36) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `name`, `product_id`, `stock`, `price`, `created_at`, `updated_at`) VALUES
('014bbafe-e883-42ef-bda4-caa07d5b4910', 'soluta', 'd501c9b7-d57c-49d6-879f-6eb411f309ca', 15, 86286, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('0893468a-05d8-446d-9955-bc59be459939', 'est', 'e553f442-52f6-47d5-b09c-5022b9455e7e', 14, 9492, '2023-12-23 13:11:15', '2023-12-23 13:11:15'),
('1011d937-1d72-4070-be13-d814b2713bf8', 'consequatur', '5c817971-6be2-456f-96b2-0691b74c0060', 1, 22729, '2023-12-23 13:10:55', '2023-12-23 13:10:55'),
('121067e9-c21d-4883-af1a-f76e5f7f3a8e', 'eius', '31769a3b-4a59-4468-8123-4819cdefa5c8', 16, 97508, '2023-12-23 13:11:06', '2023-12-23 13:11:06'),
('16e0eec7-b7e6-4b17-ae7b-c4b785230428', 'neque', 'e242da39-6c25-4055-8c63-bdc8d28cb3b9', 10, 56175, '2023-12-23 13:10:53', '2023-12-23 13:10:53'),
('1c30083b-b636-47b6-8c5f-2c60faa5d5d2', 'non', '889bc1cb-3909-4c9d-85ef-8fab44e98566', 20, 87779, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('1e7bcd83-f2ce-4f27-9d12-e59b45822668', 'ea', 'd884b273-4def-463c-96b1-32116edd40b3', 4, 52190, '2023-12-23 13:11:25', '2023-12-23 13:11:25'),
('22b54593-7d78-4be9-a02f-de1c355e4603', 'consequatur', 'af7c654a-1d4d-400e-b885-c4a9adc42ce3', 1, 58188, '2023-12-23 13:11:08', '2023-12-23 13:11:08'),
('28fc619d-5c95-4101-9975-877bdc258411', 'dolorem', '940debdf-3d60-47f5-8a4e-b23822d9e4a7', 15, 22055, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('2b1ae186-9224-462e-a805-1bb7d2f87d2f', 'tenetur', '5c817971-6be2-456f-96b2-0691b74c0060', 13, 57846, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('2be22612-0693-4fe3-a9c7-19965f9c6478', 'qui', '940debdf-3d60-47f5-8a4e-b23822d9e4a7', 14, 18526, '2023-12-23 13:11:07', '2023-12-23 13:11:07'),
('2ccfdcbf-5a90-4740-8ef7-14a099494a3e', 'ducimus', '32534c19-3b39-49e8-9e16-d872fc725ba3', 12, 53114, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('2f285a20-7120-4ac5-8655-46a6eaf040a3', 'iure', 'ac86192a-6cdf-4efc-b644-53d636874e81', 18, 30668, '2023-12-23 13:11:10', '2023-12-23 13:11:10'),
('3420d648-7b4f-4c14-9b77-a6d1d5ba23f7', 'error', 'aa3a2926-ec16-4d95-ae60-2563b5297629', 12, 63942, '2023-12-23 13:11:14', '2023-12-23 13:11:14'),
('3b0ecb7b-884e-48c1-9157-a2147cb4285e', 'nemo', 'a98309dc-0d3f-4149-8844-848ae070eb12', 4, 53654, '2023-12-23 13:11:16', '2023-12-23 13:11:16'),
('3ca6ce27-0943-4b82-b796-fe5d7503e454', 'minima', '6bd66071-43e5-46b1-b8da-e92141933fe0', 0, 54951, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('5023085d-4050-4381-8811-dbda317b72a6', 'in', '6f7bf341-2903-4d73-a42c-c1a2efb31193', 11, 68252, '2023-12-23 13:11:17', '2023-12-23 13:11:17'),
('57bfe0b4-17b3-4b2a-aaab-aa67558c395b', 'odit', '9a59dd59-ba0e-4462-85fc-697fd42eecc2', 11, 90473, '2023-12-23 13:11:13', '2023-12-23 13:11:13'),
('6119a0cb-6f2c-49cb-8f31-55f7ab5dd1e6', 'officia', '8bb577c8-9434-466d-8b85-a9a5801b29c6', 17, 29946, '2023-12-23 13:11:03', '2023-12-23 13:11:03'),
('68a35296-c6aa-47bb-ae27-85432f23d537', 'debitis', 'd501c9b7-d57c-49d6-879f-6eb411f309ca', 2, 96471, '2023-12-23 13:11:20', '2023-12-23 13:11:20'),
('6e75a4c3-7bc7-4cd2-8ddc-91ecc6f5bb8e', 'sit', 'e569c59d-62ac-44cb-96f3-a580c7e68330', 16, 13365, '2023-12-23 13:11:21', '2023-12-23 13:11:21'),
('719caa30-302c-4fee-821d-8d86238b0da0', 'labore', 'cee5f22a-33a6-4539-95b6-efbb08e1c608', 18, 86335, '2023-12-23 13:10:58', '2023-12-23 13:10:58'),
('7bda7793-d29f-4fe8-88ac-4f4fad23d117', 'laudantium', '6f7bf341-2903-4d73-a42c-c1a2efb31193', 1, 83282, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('851f065f-0f4a-4ace-9a13-dc9ca2e18e3e', 'rem', '6cc610b0-5e16-467a-b705-253899f0a0bb', 10, 21850, '2023-12-23 13:11:24', '2023-12-23 13:11:24'),
('90105275-5fd3-4ea0-bc03-68a811870038', 'quod', '2a43a3ce-28a9-467a-95c3-7ac963c20813', 16, 90088, '2023-12-23 13:11:12', '2023-12-23 13:11:12'),
('945dffed-d4ae-4f48-af3f-9e1e9ab7c3c6', 'quaerat', '32534c19-3b39-49e8-9e16-d872fc725ba3', 7, 61669, '2023-12-23 13:11:11', '2023-12-23 13:11:11'),
('95cb239a-572c-4229-9576-b90299dfd769', 'laborum', '2a43a3ce-28a9-467a-95c3-7ac963c20813', 9, 49203, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('9bb441a4-d415-49c4-8564-105469257d9a', 'esse', '8765cffd-4237-475a-8834-60552fcbfc58', 1, 60639, '2023-12-23 13:11:04', '2023-12-23 13:11:04'),
('a8f1d979-6741-4475-9ee2-2a65010e9e9e', 'est', 'a3e9f776-54a4-494d-b137-9b057c050b1a', 16, 39842, '2023-12-23 13:10:52', '2023-12-23 13:10:52'),
('b21b57d2-ad86-4bb6-b0d6-0d2b689f0e8e', 'in', '940debdf-3d60-47f5-8a4e-b23822d9e4a7', 19, 69010, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('b719c5b0-9fa7-4624-8098-40108856abdd', 'quis', '52389d03-8489-49cc-851e-b7fa767c2870', 17, 41271, '2023-12-23 13:11:23', '2023-12-23 13:11:23'),
('ba08c121-aa18-469f-bda8-643c82d152d2', 'in', '8bb577c8-9434-466d-8b85-a9a5801b29c6', 15, 42033, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('c4fc39d5-31fa-4ee0-ad2d-eb2c24c62216', 'temporibus', '14de4403-c101-4459-8e04-0cd128753b81', 15, 82473, '2023-12-23 13:10:54', '2023-12-23 13:10:54'),
('cf56e17f-45fc-45d9-a9fb-aa1fd6bb76ea', 'inventore', 'd501c9b7-d57c-49d6-879f-6eb411f309ca', 5, 73290, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('d08a6994-5605-44b8-a7e3-ce01c97a1f0e', 'libero', '4e5fcd03-3036-473f-8732-d1c1b701fcc6', 15, 54176, '2023-12-23 13:11:22', '2023-12-23 13:11:22'),
('d122cd48-83e4-45a6-9d81-0a9585b45f7e', 'quidem', '9a59dd59-ba0e-4462-85fc-697fd42eecc2', 1, 85022, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('d1a7310a-dc66-4635-b8a3-f69ff47b431b', 'a', '6cc609b8-7a88-4e77-9e59-f6999a9b2f3a', 20, 87406, '2023-12-23 13:11:09', '2023-12-23 13:11:09'),
('d7216a29-3afc-4871-9299-5c9647fe089f', 'earum', '889bc1cb-3909-4c9d-85ef-8fab44e98566', 19, 57567, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('e0bcaf14-75f2-42ff-bf53-f296b787e4d4', 'possimus', '6bd66071-43e5-46b1-b8da-e92141933fe0', 7, 6710, '2023-12-23 13:10:51', '2023-12-23 13:10:51'),
('e0f9fd52-6e72-45ce-9304-1df96aef9b23', 'non', 'aa3a2926-ec16-4d95-ae60-2563b5297629', 0, 29056, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('e88edc67-9a55-4d5d-beda-5f4ff8520ccc', 'dolorem', '9dcd1635-8654-41dc-968f-8db140351923', 11, 77129, '2023-12-23 13:11:18', '2023-12-23 13:11:18'),
('f15b0f46-fc41-4da7-82aa-575696c1ce84', 'ab', '889bc1cb-3909-4c9d-85ef-8fab44e98566', 7, 24099, '2023-12-23 13:11:05', '2023-12-23 13:11:05'),
('f2dd6cad-4d5b-4e64-a488-7a900308e696', 'facilis', 'fbe899ba-5904-4ac3-a148-d1f148e53d35', 6, 79970, '2023-12-23 13:10:59', '2023-12-23 13:10:59'),
('f4b367d8-b1b4-493f-a376-cd199524ff45', 'id', '187278d7-5f68-4bb1-ae92-7681453adbcd', 12, 92291, '2023-12-23 13:10:56', '2023-12-23 13:10:56'),
('f82a653b-b390-4fad-a061-26a11f6c113f', 'omnis', 'd884b273-4def-463c-96b1-32116edd40b3', 2, 37417, '2023-12-23 13:11:42', '2023-12-23 13:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `promo_name` varchar(255) NOT NULL,
  `promo_image` varchar(255) NOT NULL,
  `promo_description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promos`
--

INSERT INTO `promos` (`id`, `promo_name`, `promo_image`, `promo_description`, `created_at`, `updated_at`) VALUES
('8dd19576-f251-47a1-9a6e-ae85c9d6a625', 'Santa\'s Surprise', 'https://img.freepik.com/premium-vector/christmas-sale-vector-banner-design-christmas-promo-text-red-ribbon-space-with-xmas-elements_572288-2958.jpg', 'Christmas Sale up to 50% off. Sale ends at 31th December.', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('9ef2a0c6-119a-499c-b7ca-55f74694fbf1', 'Driver\'s Night', 'https://img.mensxp.com/media/content/2014/Oct/reasonswhyalatenightdriveismostawesomethingeverh_1412682663.jpg', 'Sale on driving products.', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('c5bad9bb-eca4-466c-84f4-b2b3986b920b', 'PB\'s Magical Blessing', 'https://firebasestorage.googleapis.com/v0/b/myhospital-2c105.appspot.com/o/made-this-anime-banner-in-pixlr-v0-eni9yujjzvxa1.jpg?alt=media&token=7e3b6eca-71e3-4c17-bb42-c845036f55ac', 'Up to 100% off.', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('e69ad258-70fa-4794-991a-387838da7802', 'Super Sale', 'https://img.freepik.com/free-vector/flat-sale-banner-with-photo_23-2149026968.jpg', 'Sale up to 75% off, limited time only.', '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('fa55402a-9e7f-4e71-9e21-bce9cae8d16c', 'New Year\'s Sale', 'https://img.freepik.com/free-vector/realistic-year-end-sale-banner-template_52683-100314.jpg', 'New Year\'s Sale up to 70% off. Sale ends at 4th January.', '2023-12-23 13:11:42', '2023-12-23 13:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `transaction_id` char(36) NOT NULL,
  `variant_bought` varchar(255) NOT NULL,
  `product_id` char(36) NOT NULL,
  `review` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_images`
--

CREATE TABLE `review_images` (
  `id` char(36) NOT NULL,
  `review_id` char(36) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_replies`
--

CREATE TABLE `review_replies` (
  `id` char(36) NOT NULL,
  `review_id` char(36) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_videos`
--

CREATE TABLE `review_videos` (
  `id` char(36) NOT NULL,
  `review_id` char(36) NOT NULL,
  `video` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roomables`
--

CREATE TABLE `roomables` (
  `room_id` char(36) NOT NULL,
  `roomable_id` char(36) NOT NULL,
  `roomable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `base_price` int(11) NOT NULL,
  `variable_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `name`, `base_price`, `variable_price`, `created_at`, `updated_at`) VALUES
('5a7e5a4e-4393-48cb-a84a-22d03aaeec82', 'Cargo', 5000, 10000, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('7b1116f4-359d-45ef-9f32-b6fdfcb025ee', 'Next Day', 30000, 50000, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('86878d98-3213-41e9-a492-f9629bcad611', 'Instant 3 Jam', 100000, 500000, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('928a93cb-ac94-4d45-b3bc-50ea79fdbcdf', 'Same Day', 50000, 100000, '2023-12-23 13:11:42', '2023-12-23 13:11:42'),
('ba9b9d5a-38ae-42b7-8b09-ebb946c29679', 'Regular', 10000, 20000, '2023-12-23 13:11:42', '2023-12-23 13:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `transaction_id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `variant_id` char(36) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `shipment_id` char(36) NOT NULL,
  `promo_name` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `total_paid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_headers`
--

CREATE TABLE `transaction_headers` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `date` timestamp NOT NULL,
  `location_id` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL DEFAULT uuid(),
  `username` varchar(255) NOT NULL DEFAULT 'Aniyah Rau',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT 'assets/logo/user.png',
  `google_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `phone`, `dob`, `gender`, `image`, `google_id`, `created_at`, `updated_at`) VALUES
('1d598636-a32f-41ab-9545-4c9f99708579', 'Dr. Zula Romaguera V', 'lakin.jaime@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '', 'https://images.unsplash.com/photo-1700497233171-3b1c5e50a81a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzAzNA&ixlib=rb-4.0.3&q=80&w=1080', NULL, '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('2ddd497c-9bf5-4168-8453-7fe119948941', 'Annamae Reilly', 'haley88@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '', 'https://plus.unsplash.com/premium_photo-1699536524247-0ced31b6b5d8?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzAzNg&ixlib=rb-4.0.3&q=80&w=1080', NULL, '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('48409782-3be1-461b-85c6-e8e49567a766', 'Kallie Casper', 'ubernhard@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '', 'https://images.unsplash.com/photo-1701244450186-cf76378d4c65?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzAzOQ&ixlib=rb-4.0.3&q=80&w=1080', NULL, '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('7d75d8f8-6a04-4126-91ab-9e13cf5b8a06', 'Waylon Corwin', 'rkub@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '', 'https://plus.unsplash.com/premium_photo-1701185652357-e9632c2b5969?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA0MA&ixlib=rb-4.0.3&q=80&w=1080', NULL, '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('8ce20a66-fab3-4a17-9acc-ff01e696c7ff', 'Marc Bogisich', 'rodriguez.bernita@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '', 'https://images.unsplash.com/photo-1701797345356-19e7990ab43d?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzAzOA&ixlib=rb-4.0.3&q=80&w=1080', NULL, '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('adcb5358-4f08-4f25-84f4-fdfb4dd4c6b4', 'Prof. Connor Ryan', 'sonia.nolan@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '', 'https://images.unsplash.com/photo-1702541539418-9308b59cbc58?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzAzNQ&ixlib=rb-4.0.3&q=80&w=1080', NULL, '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('c1873582-d819-4da7-ae9e-656c2867e586', 'Demetris Lueilwitz MD', 'evans53@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '', 'https://images.unsplash.com/photo-1701762292610-3323efd62273?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA0NA&ixlib=rb-4.0.3&q=80&w=1080', NULL, '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('d0553bfa-0753-4403-a5e9-ae27899a924e', 'Napoleon Mayer', 'rath.maximillian@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '', 'https://images.unsplash.com/photo-1702234844718-5f4f77a93baa?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzAzNw&ixlib=rb-4.0.3&q=80&w=1080', NULL, '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('d42760da-c2dc-43c3-b439-00af012c142a', 'Donna Price', 'bulah.hermiston@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '', 'https://plus.unsplash.com/premium_photo-1669411189410-79c07111cf8a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA0MQ&ixlib=rb-4.0.3&q=80&w=1080', NULL, '2023-12-23 13:10:44', '2023-12-23 13:10:44'),
('e9ced7d6-c2fc-44a1-a8ec-5d3793e0bd05', 'Barry Koch', 'dereck.feil@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, '', 'https://images.unsplash.com/photo-1701198067358-dbe0ac58a2c2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8fHx8fHx8MTcwMzMzNzA0Mw&ixlib=rb-4.0.3&q=80&w=1080', NULL, '2023-12-23 13:10:44', '2023-12-23 13:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`user_id`,`product_id`,`variant_id`),
  ADD KEY `carts_variant_id_foreign` (`variant_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `electric_transaction_details`
--
ALTER TABLE `electric_transaction_details`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flash_sale_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `merchants_name_unique` (`name`),
  ADD KEY `merchants_user_id_foreign` (`user_id`);

--
-- Indexes for table `merchant_followers`
--
ALTER TABLE `merchant_followers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `merchant_followers_merchant_id_user_id_unique` (`merchant_id`,`user_id`),
  ADD KEY `merchant_followers_user_id_foreign` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_room_id_foreign` (`room_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_merchant_id_foreign` (`merchant_id`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_promos`
--
ALTER TABLE `product_promos`
  ADD KEY `product_promos_promo_id_foreign` (`promo_id`),
  ADD KEY `product_promos_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `review_images`
--
ALTER TABLE `review_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_images_review_id_foreign` (`review_id`);

--
-- Indexes for table `review_replies`
--
ALTER TABLE `review_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_replies_review_id_foreign` (`review_id`);

--
-- Indexes for table `review_videos`
--
ALTER TABLE `review_videos`
  ADD KEY `review_videos_review_id_foreign` (`review_id`);

--
-- Indexes for table `roomables`
--
ALTER TABLE `roomables`
  ADD KEY `roomables_room_id_foreign` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`transaction_id`,`product_id`,`variant_id`),
  ADD KEY `transaction_details_product_id_foreign` (`product_id`),
  ADD KEY `transaction_details_variant_id_foreign` (`variant_id`),
  ADD KEY `transaction_details_shipment_id_foreign` (`shipment_id`);

--
-- Indexes for table `transaction_headers`
--
ALTER TABLE `transaction_headers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_headers_user_id_foreign` (`user_id`),
  ADD KEY `transaction_headers_location_id_foreign` (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `electric_transaction_details`
--
ALTER TABLE `electric_transaction_details`
  ADD CONSTRAINT `electric_transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction_headers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flash_sale_products`
--
ALTER TABLE `flash_sale_products`
  ADD CONSTRAINT `flash_sale_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `merchants`
--
ALTER TABLE `merchants`
  ADD CONSTRAINT `merchants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `merchant_followers`
--
ALTER TABLE `merchant_followers`
  ADD CONSTRAINT `merchant_followers_merchant_id_foreign` FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `merchant_followers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_merchant_id_foreign` FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_promos`
--
ALTER TABLE `product_promos`
  ADD CONSTRAINT `product_promos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_promos_promo_id_foreign` FOREIGN KEY (`promo_id`) REFERENCES `promos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction_headers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review_images`
--
ALTER TABLE `review_images`
  ADD CONSTRAINT `review_images_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review_replies`
--
ALTER TABLE `review_replies`
  ADD CONSTRAINT `review_replies_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review_videos`
--
ALTER TABLE `review_videos`
  ADD CONSTRAINT `review_videos_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roomables`
--
ALTER TABLE `roomables`
  ADD CONSTRAINT `roomables_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_details_shipment_id_foreign` FOREIGN KEY (`shipment_id`) REFERENCES `shipments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction_headers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_details_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_headers`
--
ALTER TABLE `transaction_headers`
  ADD CONSTRAINT `transaction_headers_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_headers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
