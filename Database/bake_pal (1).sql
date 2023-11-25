-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 10:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bake_pal`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `image`, `total`) VALUES
(1, 'About Us', 'Welcome to Bake Pal! We are a team of passionate bakers dedicated to creating delicious pastries, cakes, and more. Our journey began in a small kitchen, and now we serve our delightful treats to customers all over the city. With quality ingredients and a sprinkle of love, we\'re committed to making every bite a delightful experience.', 'ezgif.com-webp-to-png.png', 0),
(2, 'Branches', 'We have now expanded to more branches', 'branches.png', 12),
(3, 'Profits', 'We make beyond what  we expected', 'profits.png', 230),
(4, 'Customers', 'We now have more customers', 'customers.png', 240);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 36, '2023-11-19 14:58:50', '2023-11-19 14:58:50'),
(5, 37, '2023-11-19 15:27:12', '2023-11-19 15:27:12'),
(6, 38, '2023-11-20 19:48:24', '2023-11-20 19:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `promotions_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `promotions_id`) VALUES
(18, 4, 1, 1, NULL),
(21, 5, 2, 1, NULL),
(22, 5, 3, 1, NULL),
(23, 6, 2, 3, NULL),
(24, 6, 3, 1, NULL),
(26, 6, 7, 1, NULL),
(27, 6, 11, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(12) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `service_name` varchar(100) DEFAULT NULL,
  `tracking_number` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `image`, `description`) VALUES
(1, 'Delivery Services', 'delivery.png', 'Fastest Delivery Within 30mins'),
(2, 'Payment Methods', 'digital-payment.webp', 'Payments at your Convience'),
(3, 'Know your Health', 'health2.jpg', 'Your Health at Hand');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(12) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `feedback_text` text DEFAULT NULL,
  `feedback_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_responses`
--

CREATE TABLE `feedback_responses` (
  `id` int(12) NOT NULL,
  `feedback_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `response_text` text DEFAULT NULL,
  `response_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `health_benefits`
--

CREATE TABLE `health_benefits` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `health_benefits`
--

INSERT INTO `health_benefits` (`id`, `name`, `description`) VALUES
(1, 'master', 'office l'),
(2, 'low fat', '235calories'),
(3, 'low diet', '453 calories');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `recipe_product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `ingredient_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `track_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `health_benefit_id` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `quantity`, `image`, `created_at`, `updated_at`, `health_benefit_id`, `discount`) VALUES
(1, 'Raspberry and custard muffins', 14, '3767868', 77, 'https://apipics.s3.amazonaws.com/cakes_api/1.jpg', '2023-11-12 17:56:29', '2023-11-19 16:19:55', 2, NULL),
(2, 'Lemon and blackberry stripe cake', 13, '3924277', 3, 'https://apipics.s3.amazonaws.com/cakes_api/2.jpg', '2023-11-12 17:56:29', '2023-11-19 16:19:43', 2, NULL),
(3, 'Paul Hollywood’s chocolate fudge cake', 26, '3534819', 5, 'https://apipics.s3.amazonaws.com/cakes_api/3.jpg', '2023-11-12 17:56:29', '2023-11-19 16:28:25', 1, NULL),
(4, 'Lemon and strawberry meringue cake', 127, '3242414', 7, 'https://apipics.s3.amazonaws.com/cakes_api/4.jpg', '2023-11-12 17:56:29', '2023-11-19 16:28:37', 1, NULL),
(5, 'Vegan chocolate cake', NULL, '1736571', 7, 'https://apipics.s3.amazonaws.com/cakes_api/5.jpg', '2023-11-12 17:56:30', '2023-11-12 17:56:30', NULL, NULL),
(6, 'Spiced plum cake with swiss meringue frosting', NULL, '4270492', 1, 'https://apipics.s3.amazonaws.com/cakes_api/6.jpg', '2023-11-12 17:56:30', '2023-11-12 17:56:30', NULL, NULL),
(7, 'Lemon and courgette cake with white chocolate cream cheese frosting', NULL, '4678713', 8, 'https://apipics.s3.amazonaws.com/cakes_api/7.jpg', '2023-11-12 17:56:30', '2023-11-12 17:56:30', NULL, NULL),
(8, 'Chocolate cake with caramel poached pears and chocolate buttercream', NULL, '502461', 9, 'https://apipics.s3.amazonaws.com/cakes_api/8.jpg', '2023-11-12 17:56:30', '2023-11-12 17:56:30', NULL, NULL),
(9, 'Rhubarb and custard layer cake', NULL, '4789438', 4, 'https://apipics.s3.amazonaws.com/cakes_api/9.jpg', '2023-11-12 17:56:30', '2023-11-12 17:56:30', NULL, NULL),
(10, 'Spring lamb cupcakes', NULL, '197200', 7, 'https://apipics.s3.amazonaws.com/cakes_api/10.jpg', '2023-11-12 17:56:30', '2023-11-12 17:56:30', NULL, NULL),
(11, 'Peanut butter drip cake', NULL, '3844807', 8, 'https://apipics.s3.amazonaws.com/cakes_api/11.jpg', '2023-11-12 17:56:30', '2023-11-12 17:56:30', NULL, NULL),
(12, 'Ginger drizzle traybake with cream cheese icing', NULL, '4896260', 8, 'https://apipics.s3.amazonaws.com/cakes_api/12.jpg', '2023-11-12 17:56:30', '2023-11-12 17:56:30', NULL, NULL),
(13, 'Baked lemon cheesecake with pineapple flowers', NULL, '3837939', 5, 'https://apipics.s3.amazonaws.com/cakes_api/13.jpg', '2023-11-12 17:56:30', '2023-11-12 17:56:30', NULL, NULL),
(14, 'Carrot and cheesecake layer cake', NULL, '1591035', 8, 'https://apipics.s3.amazonaws.com/cakes_api/14.jpg', '2023-11-12 17:56:30', '2023-11-12 17:56:30', NULL, NULL),
(15, 'Sugarplum fairy cakes', NULL, '2367248', 6, 'https://apipics.s3.amazonaws.com/cakes_api/15.jpg', '2023-11-12 17:56:30', '2023-11-12 17:56:30', NULL, NULL),
(16, 'Summer-cup bundt drizzle cake', NULL, '3711831', 6, 'https://apipics.s3.amazonaws.com/cakes_api/16.jpg', '2023-11-12 17:56:30', '2023-11-12 17:56:30', NULL, NULL),
(17, 'St Clement’s squares', NULL, '3045382', 10, 'https://apipics.s3.amazonaws.com/cakes_api/17.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(18, 'Caramelised white chocolate, burnt butter and tahini cake', NULL, '4546544', 9, 'https://apipics.s3.amazonaws.com/cakes_api/18.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(19, 'Eric Lanlard’s carrot and pumpkin celebration cake', NULL, '1857744', 6, 'https://apipics.s3.amazonaws.com/cakes_api/19.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(20, 'Tunnock’s teacake traybake', NULL, '754910', 7, 'https://apipics.s3.amazonaws.com/cakes_api/20.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(21, 'Easy butterfly cakes', NULL, '1131552', 3, 'https://apipics.s3.amazonaws.com/cakes_api/21.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(22, 'Chocolate cupcakes', NULL, '4191112', 1, 'https://apipics.s3.amazonaws.com/cakes_api/22.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(23, 'Orange blossom, lemon thyme and almond cake', NULL, '4651858', 9, 'https://apipics.s3.amazonaws.com/cakes_api/23.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(24, 'Eton mess traybake', NULL, '4673540', 1, 'https://apipics.s3.amazonaws.com/cakes_api/24.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(25, 'Nut-free carrot cupcakes', NULL, '1682968', 6, 'https://apipics.s3.amazonaws.com/cakes_api/25.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(26, 'Raspberry and lemon sponge cake', NULL, '4140698', 8, 'https://apipics.s3.amazonaws.com/cakes_api/26.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(27, 'Strawberry and rose victoria sponge sandwich', NULL, '3155182', 9, 'https://apipics.s3.amazonaws.com/cakes_api/27.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(28, 'Toffee ice-cream cake', NULL, '4425937', 7, 'https://apipics.s3.amazonaws.com/cakes_api/28.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(29, 'Easy flourless chocolate cake', NULL, '3173497', 5, 'https://apipics.s3.amazonaws.com/cakes_api/29.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(30, 'Sticky toffee pudding cake', NULL, '216460', 1, 'https://apipics.s3.amazonaws.com/cakes_api/30.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(31, 'Frozen lemon and blueberry mousse cake', NULL, '2737438', 4, 'https://apipics.s3.amazonaws.com/cakes_api/31.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(32, 'Secret-ingredient chocolate bundt cake', NULL, '4284380', 10, 'https://apipics.s3.amazonaws.com/cakes_api/32.jpg', '2023-11-12 17:56:31', '2023-11-12 17:56:31', NULL, NULL),
(33, 'White forest gateau', NULL, '158841', 1, 'https://apipics.s3.amazonaws.com/cakes_api/33.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(34, 'Ginger and honey biscuit cake with choc-orange icing', NULL, '392592', 1, 'https://apipics.s3.amazonaws.com/cakes_api/34.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(35, 'Giant Jaffa cake', NULL, '4749967', 7, 'https://apipics.s3.amazonaws.com/cakes_api/35.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(36, 'Eric Lanlard’s clementine and pomegranate cake (gluten-free)', NULL, '313232', 10, 'https://apipics.s3.amazonaws.com/cakes_api/36.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(37, 'Coconut and lime angel cake', NULL, '4288498', 10, 'https://apipics.s3.amazonaws.com/cakes_api/37.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(38, 'Daim bar layer cake', NULL, '1906410', 1, 'https://apipics.s3.amazonaws.com/cakes_api/38.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(39, 'Elderflower, lemon and cherry cream flourless cake', NULL, '1867285', 3, 'https://apipics.s3.amazonaws.com/cakes_api/39.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(40, 'Chetna Makan’s pistachio, cardamom and white chocolate cake', NULL, '1792212', 1, 'https://apipics.s3.amazonaws.com/cakes_api/40.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(41, 'Simple buttercream icing', NULL, '1753191', 1, 'https://apipics.s3.amazonaws.com/cakes_api/41.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(42, 'Chocolate porter cake', NULL, '1183328', 5, 'https://apipics.s3.amazonaws.com/cakes_api/42.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(43, 'Triple-chocolate layer cake', NULL, '1569304', 1, 'https://apipics.s3.amazonaws.com/cakes_api/43.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(44, 'Chocolate cola cake', NULL, '696212', 7, 'https://apipics.s3.amazonaws.com/cakes_api/44.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(45, 'Gluten-free chocolate cake with raspberries', NULL, '2686056', 5, 'https://apipics.s3.amazonaws.com/cakes_api/45.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(46, 'Pop cakes', NULL, '1795035', 10, 'https://apipics.s3.amazonaws.com/cakes_api/46.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(47, 'Mary Berry’s malted chocolate cake', NULL, '4534858', 6, 'https://apipics.s3.amazonaws.com/cakes_api/47.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(48, 'Chocolate celebration layer cake', NULL, '4642328', 2, 'https://apipics.s3.amazonaws.com/cakes_api/48.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(49, 'Apple caramel layer cake', NULL, '1493416', 3, 'https://apipics.s3.amazonaws.com/cakes_api/49.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(50, 'Red velvet cake', NULL, '2359426', 2, 'https://apipics.s3.amazonaws.com/cakes_api/50.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(51, 'Paul Hollywood’s ultimate carrot cake', NULL, '460752', 1, 'https://apipics.s3.amazonaws.com/cakes_api/51.jpg', '2023-11-12 17:56:32', '2023-11-12 17:56:32', NULL, NULL),
(52, 'Mary Berry’s very best chocolate and orange cake', NULL, '3386299', 8, 'https://apipics.s3.amazonaws.com/cakes_api/52.jpg', '2023-11-12 17:56:33', '2023-11-12 17:56:33', NULL, NULL),
(53, 'Classic sponge cake', 127, '585812', 1, 'https://apipics.s3.amazonaws.com/cakes_api/53.jpg', '2023-11-12 17:56:33', '2023-11-22 19:31:36', 1, NULL),
(54, 'Gluten-free birthday cake sponge', 26, '216071', 8, 'https://apipics.s3.amazonaws.com/cakes_api/54.jpg', '2023-11-12 17:56:33', '2023-11-22 19:31:18', 1, NULL),
(55, 'Ultimate chocolate mousse cake', 23, '3031589', 3, 'https://apipics.s3.amazonaws.com/cakes_api/55.jpg', '2023-11-12 17:56:33', '2023-11-22 19:31:05', 1, NULL),
(56, 'Lavender cupcakes', 23, '1797027', 5, 'https://apipics.s3.amazonaws.com/cakes_api/56.jpg', '2023-11-12 17:56:33', '2023-11-22 19:30:51', 1, NULL),
(57, 'Chocolate and berry traybake', 23, '539123', 6, 'https://apipics.s3.amazonaws.com/cakes_api/57.jpg', '2023-11-12 17:56:33', '2023-11-22 19:30:32', 1, NULL),
(58, 'Easy coconut and chocolate cake', 13, '4290635', 9, 'https://apipics.s3.amazonaws.com/cakes_api/58.jpg', '2023-11-12 17:56:33', '2023-11-22 19:30:05', 1, NULL),
(59, 'Lemon and coconut cake', 13, '675798', 8, 'https://apipics.s3.amazonaws.com/cakes_api/59.jpg', '2023-11-12 17:56:33', '2023-11-22 19:29:55', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(13, 'Cakes', 'black in color', 'chris.jpg', '2023-10-10 11:12:43', '2023-11-22 19:12:42'),
(14, 'Pizza', 'milk', 'pizza.jpg', '2023-10-10 11:19:02', '2023-11-22 19:13:42'),
(18, 'slices', 'slice', 'WeddingCakeSlice.jpg', '2023-10-11 08:01:14', '2023-11-22 18:58:58'),
(22, 'Scones', NULL, 'scones.jpg', '2023-10-17 13:28:10', '2023-11-22 19:17:49'),
(23, 'Cupcakes', NULL, 'cupcake.jpg', '2023-10-17 13:30:38', '2023-11-22 19:19:17'),
(24, 'Muffins', NULL, 'pumpkin-muffins-1200-60.jpg', '2023-10-20 14:13:05', '2023-11-22 19:21:19'),
(26, 'birthday cakes', NULL, '2.jpg', '2023-11-08 09:04:04', '2023-11-08 09:11:13'),
(27, 'buns', NULL, 'buns.jpg', '2023-11-08 09:05:24', '2023-11-08 09:11:34'),
(28, 'loaf of bread', NULL, 'bread.jpg', '2023-11-08 09:12:52', '2023-11-08 09:12:52'),
(124, 'Ice Cream', NULL, 'ice-Cream.jpg', '2023-11-16 10:02:24', '2023-11-22 18:43:43'),
(127, 'family cake', NULL, '5.jpg', '2023-11-16 10:11:07', '2023-11-20 20:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` decimal(3,2) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `rating_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `instructions` text DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `description`, `instructions`, `author`, `image`, `created_at`, `updated_at`) VALUES
(2, 'lenovo', 'Milk', 'sugar', 'Anita', 'bans.jpg', '2023-10-12 16:28:55', '2023-10-12 19:20:57'),
(3, 'cupcakes', 'white in color', 'wee', 'anna maria', 'cup.jpg', '2023-10-12 16:29:54', '2023-11-21 18:39:00'),
(5, 'k', 's', 's', 'm', NULL, '2023-10-17 10:30:08', '2023-10-17 10:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_product`
--

CREATE TABLE `recipe_product` (
  `recipe_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `rating_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `review_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(12) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `description`) VALUES
(3, 'Bread Varieties', 'bread.jpg', 'For salt,Milk,banana bread,we got you covered'),
(4, 'Delivery Services', 'delivery.png', 'Best Deliveries at your Service ,we have got better discounts'),
(5, 'Customer Orders', 'ezgif.com-gif-maker.png', 'Order at ypour convience ,from all aound the world .Please feel free to call us'),
(6, 'Pastries', 'cupcake.jpg', 'cupcxakes,daddies,cookies,biscuits'),
(7, 'Events', '9.jpg', 'For wedding cakes,birthdays,baby showers,graduation cakes we gat you covered'),
(8, 'Cakes', '11.jpg', 'wedding cakes,birthday cakes,graduation,cakes,baby shower cakes and moore');

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` int(12) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `start_time`, `end_time`, `description`, `created_at`, `updated_at`) VALUES
(1, '08:00:00', '03:00:00', 'Day Shift', '2023-10-12 14:52:58', '2023-10-12 14:58:06'),
(2, '04:00:00', '10:00:00', 'Evening', '2023-10-12 15:13:29', '2023-10-12 15:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_type_id` int(11) DEFAULT NULL,
  `pwd` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `created_at`, `updated_at`, `user_type_id`, `pwd`, `image`) VALUES
(31, 'Anita', 'Atim', 'anita5@gmail.com', '2023-11-02 21:00:52', '2023-11-02 21:00:52', 4, '$2y$10$KY1hyY2IQpFKlfZmYee4jeNpfZhW6LqwCe2Wy2r8JrW4sOmDvgsfO', NULL),
(32, 'Atim', 'Sarah', 'atim3@gmail.com', '2023-11-02 21:01:56', '2023-11-12 16:15:37', 4, '$2y$10$MDttlSWreZm4FJ1XHq9mQ.PUA..ArTJIeiEXPaAc7TPCah7hYzfAK', NULL),
(33, 'Anita', 'Nyinamasiko', 'anitan@gmail.com', '2023-11-03 05:41:35', '2023-11-03 05:41:35', 4, '$2y$10$KgNJAvCTgmUAceqovCccR.4TBMMbg7Yw4S5a51OEzWHuHDSll.3sW', NULL),
(34, 'atim', 'sam', 'sam@gmail.com', '2023-11-03 07:02:34', '2023-11-03 07:02:34', 4, '$2y$10$n9EHwR0FUZd1UepIfCufPuhqzottxtYlpZhhBzvrtkoucsyLT1Ox2', NULL),
(35, 'anita', 'sarah', 'anita12@gmail.com', '2023-11-12 16:16:52', '2023-11-12 16:17:28', 1, '$2y$10$qDnopKTy6l/gzW9ic/6ZqeAnt4Zp1l0/zuAps46dlrvuC0x0VtBfi', NULL),
(36, 'onen', 'sam', 'samonen@gmail.com', '2023-11-19 11:50:01', '2023-11-19 11:50:01', 4, '$2y$10$hO2oxZUdqLEGLkHVTZWRq.1a.sIs.M9aqo7NlDQnOcyAVsrrM5JLq', NULL),
(37, 'Isabelle', 'Conley', 'me@gmail.com', '2023-11-19 15:25:04', '2023-11-19 15:25:04', 4, '$2y$10$SFr4THp1WbmXuiVSPfl8OOlfBHPUasKyXNUMPi.zatY8EgcR3JCBK', NULL),
(38, 'sarah', 'woods', 'woods@gmail.com', '2023-11-20 14:32:55', '2023-11-20 14:32:55', 4, '$2y$10$F9g6AbWqW2fRteoUbq3Smu5WKe5pBByJtekpoe3YbgHcWmUSxa0c6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `user_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `user_type`) VALUES
(1, 'Admin'),
(2, 'baker'),
(3, 'cashier'),
(4, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback_responses`
--
ALTER TABLE `feedback_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_id` (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `health_benefits`
--
ALTER TABLE `health_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_product_id` (`recipe_product_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `ingredient_id` (`ingredient_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `delivery_id` (`delivery_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `health_benefit_id` (`health_benefit_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe_product`
--
ALTER TABLE `recipe_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_id` (`rating_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `shift_id` (`shift_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_type` (`user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_responses`
--
ALTER TABLE `feedback_responses`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `health_benefits`
--
ALTER TABLE `health_benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recipe_product`
--
ALTER TABLE `recipe_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_promotions_id` FOREIGN KEY (`promotions_id`) REFERENCES `promotions` (`id`);

--
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `feedback_responses`
--
ALTER TABLE `feedback_responses`
  ADD CONSTRAINT `feedback_responses_ibfk_1` FOREIGN KEY (`feedback_id`) REFERENCES `feedbacks` (`id`),
  ADD CONSTRAINT `feedback_responses_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`recipe_product_id`) REFERENCES `recipe_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `notifications_ibfk_3` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`health_benefit_id`) REFERENCES `health_benefits` (`id`);

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `recipe_product`
--
ALTER TABLE `recipe_product`
  ADD CONSTRAINT `recipe_product_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `recipe_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`rating_id`) REFERENCES `ratings` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
