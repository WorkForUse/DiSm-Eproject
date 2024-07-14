-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 03:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_username`, `admin_password`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Picasso'),
(2, 'Ancients'),
(3, 'Greetingoosh'),
(4, 'Reponzal'),
(5, 'fireshot'),
(6, 'Loenmake'),
(7, 'andrade'),
(8, 'PinkIrish');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Greeting Cards'),
(3, 'Arts'),
(5, 'Gift Articles '),
(6, 'Dolls'),
(7, 'Hand Bags'),
(8, 'Beauty Items'),
(9, 'Files'),
(10, 'Wallets');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 2, 430720998, 7, 1, 'pending'),
(2, 2, 501162141, 2, 1, 'pending'),
(3, 2, 1293826517, 9, 3, 'pending'),
(4, 2, 1733377082, 5, 1, 'pending'),
(5, 2, 1260080933, 6, 1, 'pending'),
(6, 2, 1281163250, 9, 1, 'pending'),
(7, 2, 1422530168, 8, 1, 'pending'),
(8, 2, 837278653, 3, 1, 'pending'),
(9, 2, 1386497146, 6, 1, 'pending'),
(10, 2, 1187142030, 11, 1, 'pending'),
(11, 2, 561954039, 16, 1, 'pending'),
(12, 2, 402006924, 16, 1, 'pending'),
(13, 2, 676485215, 12, 1, 'pending'),
(14, 2, 1964526373, 17, 1, 'pending'),
(15, 2, 1806075945, 18, 1, 'pending'),
(16, 2, 2131705957, 14, 1, 'pending'),
(17, 2, 374998962, 16, 1, 'pending'),
(18, 2, 516138707, 12, 1, 'pending'),
(19, 2, 1912009808, 14, 1, 'pending'),
(20, 2, 503923492, 19, 1, 'pending'),
(21, 2, 1380459941, 15, 1, 'pending'),
(22, 2, 1959388374, 19, 1, 'pending'),
(23, 2, 1198410692, 18, 1, 'pending'),
(24, 2, 54236914, 15, 1, 'pending'),
(25, 2, 174753783, 18, 11, 'pending'),
(26, 2, 138454146, 18, 1, 'pending'),
(27, 2, 569799887, 18, 1, 'pending'),
(28, 2, 603276507, 15, 1, 'pending'),
(29, 2, 707021088, 19, 1, 'pending'),
(30, 2, 1809390124, 19, 1, 'pending'),
(31, 2, 931839714, 19, 1, 'pending'),
(32, 2, 320574499, 11, 1, 'pending'),
(33, 2, 1642619602, 16, 1, 'pending'),
(34, 2, 1569182600, 14, 1, 'pending'),
(35, 2, 1339626758, 19, 1, 'pending'),
(36, 2, 405603743, 20, 11, 'pending'),
(37, 2, 1601950460, 20, 1, 'pending'),
(38, 2, 1247452947, 15, 1, 'pending'),
(39, 2, 1623651832, 13, 1, 'pending'),
(40, 2, 350124254, 14, 1, 'pending'),
(41, 2, 2058636576, 20, 1, 'pending'),
(42, 2, 1104526073, 16, 1, 'pending'),
(43, 2, 878016972, 32, 1, 'pending'),
(44, 2, 991364568, 31, 1, 'pending'),
(45, 2, 1911547330, 25, 1, 'pending'),
(46, 2, 1397049476, 38, 1, 'pending'),
(47, 2, 1667771463, 38, 1, 'pending'),
(48, 2, 724542362, 44, 1, 'pending'),
(49, 2, 1047409260, 32, 1, 'pending'),
(50, 2, 1349704532, 39, 1, 'pending'),
(51, 2, 116244218, 44, 1, 'pending'),
(52, 2, 758542553, 24, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(21, 'Standard Cards', 'In this three cards collection we are providing you best standards first is blue and red second is cream color and last one is flower design.', 'greeting,cards,flower,festival,functions,events', 1, 3, 'blue.jpeg', 'creem.jpg', 'flower.jpeg', '500', '2024-02-24 22:28:41', 'true'),
(22, 'Wallets Premium Collection', 'In this wallets collections we are providing you best leather made cards with big space wallets', 'big,space,wallets,black,brown,leather', 10, 7, 'btwa_one.jpg', 'btwa_sixteen.jpeg', 'btwa_thirteen.jpeg', '3000', '2024-02-24 22:31:25', 'true'),
(23, 'Office Files Multicoloured', 'Our store providing you all types of files like office schools etc all types of files we have in our outlet', 'Multicoloured,office,files,stationary', 9, 5, 'file_fourteen.jpeg', 'file_thirteen.jpeg', 'file_one.jpeg', '300', '2024-02-24 22:37:38', 'true'),
(24, 'Lawyers files collections', 'In this collections we are providing you judges and lawyers files', 'lawyers,files', 9, 5, 'file_eleven.jpeg', 'file_nine.jpeg', 'file_eight.jpeg', '1000', '2024-02-24 22:39:36', 'true'),
(25, 'Assignment Files Collection', 'In this collection we are providing you normal stationary files like for the schools use for the teacher use or for your assignments.', 'assignment,resume,stationary,normal', 9, 5, 'file_ten.jpeg', 'file_fifteen.jpeg', 'file_eight.jpeg', '1000', '2024-02-24 22:42:05', 'true'),
(26, 'Light White Cards ', 'In this light pretty white cards collection we are providing you best creative designs of the cards', 'light,white,beautiful,pretty', 1, 3, 'lightpink.jpeg', 'whiteSilk.jpeg', 'reddra.jpeg', '1500', '2024-02-24 22:53:58', 'true'),
(27, 'Red Heart Cards', 'In this collection we are providing you first is heart card, second red flower and third is attractive card design', 'attractive,heart,card,pretty', 1, 3, 'white.jpeg', 'red.jpg', 'redMr.jpeg', '2500', '2024-02-24 22:55:40', 'true'),
(28, 'British Leather Wallets', 'this wallets are made in British England city sudbury all the wallets are leather made wallets.', 'leather,made,wallets', 10, 7, 'btwa_three.jpeg', 'btwa_seven.jpeg', 'btwa_nine.jpeg', '2000', '2024-02-24 22:58:58', 'true'),
(29, 'Irish Wallets', 'This Irish made wallets are made in dublin city of Ireland this company also making more stuff like hand bags and more.', 'Irish,wallets,dublin', 10, 7, 'btwa_fifteen.jpeg', 'btwa_seventeen.jpeg', 'btwa_eighteen.jpeg', '4000', '2024-02-24 23:02:25', 'true'),
(30, 'Crystal made Pieces', 'This collection we are providing you first is boat second is clock and the third is swan.', 'swan,clock,boat', 5, 2, 'clock.jpeg', 'boat.jpeg', 'swan.jpeg', '4000', '2024-02-24 23:05:18', 'true'),
(31, 'Crystal Cups', 'In this collection we are providing you crystal made cups and one plastic made dino ireland show piece', 'dino,ireland,Crystal,cups', 5, 2, 'crystalStyle.jpeg', 'cup.jpeg', 'dino.jpeg', '3500', '2024-02-24 23:07:10', 'true'),
(32, 'Wooden Show Pieces', 'In this collection first is boxwood designs second is horse and last one is elephant.', 'elephant,box,wood,horse', 5, 2, 'boxood.jpeg', 'elephant.jpeg', 'horse.jpeg', '5000', '2024-02-24 23:08:40', 'true'),
(33, 'Kids Makeup Kits', 'this makeup kits is only for kids not for adults and all the products are made by plastic.', 'kids,makeup,kits', 8, 8, 'item_two.jpeg', 'item_three.jpeg', 'item_fourteen.jpeg', '1000', '2024-02-24 23:16:11', 'true'),
(34, 'Parlour use Makeup Products', 'In this collection we are providing you all the items like brushes , eyelashes , maskhara , serum etc', 'serum,eyelashes,brushes ', 8, 8, 'item_fourteen.jpeg', 'item_seven.jpeg', 'item_four.jpeg', '10000', '2024-02-24 23:19:09', 'true'),
(35, 'Indigo Makeup Kit', 'In this makeup kit collection we are providing you all the stuff that you want to do makeup by self for all of your events.', 'events,makeup,kit', 8, 8, 'item_eight.jpeg', 'item_thirteen.jpeg', 'item_five.jpeg', '2000', '2024-02-24 23:25:27', 'true'),
(36, 'Dark Magnum', 'In this collection we are providing you magnum chocolate colour bag and two is British black colour bags. ', 'Dark,Magnum,hand,bags', 7, 6, 'blackHandBag.jpg', 'DarkyOne.jpg', 'DarkLeather.jpg', '4000', '2024-02-24 23:29:18', 'true'),
(37, 'Arabian Sand', 'In this collection we are providing you all the Imported made hand bags that first is light sand colour second is cream last is brown.', 'brown,cream,sand,light,hand,bags', 7, 6, 'SandHandbag.jpg', 'CreemHandbag.jpg', 'BrownHandbag.jpg', '3000', '2024-02-24 23:33:57', 'true'),
(38, 'Postman Bags', 'In this collection we have three colours types bags first one is navy blue second is light pink last is pista.', 'postman,hand,bags', 7, 6, 'BlueHandbag.jpg', 'PinkHandBag.jpg', 'pistachio.jpg', '4500', '2024-02-24 23:36:17', 'true'),
(39, 'Nebola Arts', 'In this three design collection artist mind go to galaxy and he found some random creativity and fill out here.', 'Nebola,arts', 3, 1, 'arts_nine.jpg', 'arts_five.jpg', 'arts_thirteen.jpg', '8700', '2024-02-24 23:39:17', 'true'),
(40, 'Lunatic Arts', 'In this collection of arts artist think some simple layout of colours to design to some ruff art works.', 'creativity,art,lunatic', 3, 1, 'arts_eleven.jpg', 'arts_fourteen.jpg', 'arts_twelve.jpg', '11000', '2024-02-24 23:41:43', 'true'),
(41, 'Street Profit Art', 'In this collection artist try to give you some street wall creativity designs and in second and third art he drop some water colours.', 'street,profit,art,creativity,design', 3, 1, 'arts_fifteen.jpg', 'arts_one.jpg', 'arts_three.jpg', '15000', '2024-02-24 23:45:08', 'true'),
(42, 'Reality Make Doll', 'In this three dolls we are providing you best premium brand dolls first two is premium and last one is Imported.', 'Dolls,barbie,reponzal', 6, 4, 'blue3.PNG', 'dollss3333.jpg', '3.jpg', '10000', '2024-02-25 00:50:49', 'true'),
(43, 'Mildred Kid Doll', 'In this collection we are providing you three types of kids dolls first two is red and last one is pink doll.', 'pink,red,kid,dolls,mildred', 6, 4, 'kiddoll3.jpg', 'kiddoll2.jpg', 'kiddoll.jpg', '3500', '2024-02-25 00:53:05', 'true'),
(44, 'Blue Sky Melody', 'A toy that looks like a small person, often a baby with two blues and last one is couples dolls.', 'Melody,Blue,Sky,dolls', 6, 4, 'blue2.jpg', 'blue1.jpg', 'dollssss.jpg', '3500', '2024-02-25 00:55:34', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 2, 1200, 1339626758, 1, '2024-02-24 06:09:28', 'Complete'),
(2, 2, 55000, 405603743, 1, '2024-02-24 06:10:07', 'Complete'),
(3, 2, 6000, 1601950460, 2, '2024-02-24 06:09:35', 'Complete'),
(4, 2, 1000, 1247452947, 1, '2024-02-24 06:24:21', 'Complete'),
(5, 2, 4000, 1623651832, 1, '2024-02-24 06:09:42', 'Complete'),
(6, 2, 8000, 350124254, 1, '2024-02-24 06:25:08', 'Complete'),
(7, 2, 5000, 2058636576, 1, '2024-02-24 06:25:36', 'Complete'),
(8, 2, 600, 1104526073, 1, '2024-02-25 00:00:58', 'Complete'),
(9, 2, 6000, 878016972, 2, '2024-02-25 00:01:25', 'Complete'),
(10, 2, 7500, 991364568, 2, '2024-03-05 18:23:56', 'Complete'),
(11, 2, 1000, 1911547330, 1, '2024-03-05 18:24:05', 'Complete'),
(12, 2, 4800, 1397049476, 2, '2024-03-05 18:27:28', 'Complete'),
(13, 2, 4500, 1667771463, 1, '2024-05-26 22:20:32', 'Complete'),
(14, 2, 7300, 724542362, 4, '2024-03-05 18:28:12', 'Complete'),
(15, 2, 8500, 1047409260, 2, '2024-03-05 18:14:16', 'pending'),
(16, 2, 17200, 1349704532, 3, '2024-03-05 18:14:58', 'pending'),
(17, 2, 9000, 116244218, 3, '2024-05-26 22:19:33', 'pending'),
(18, 2, 4000, 758542553, 2, '2024-05-30 06:05:53', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 8, 1104526073, 600, 'Select Payment Method', '2024-02-25 00:00:58'),
(2, 9, 878016972, 6000, 'Cash on Delivery', '2024-02-25 00:01:25'),
(3, 10, 991364568, 7500, 'Select Payment Method', '2024-03-05 18:23:56'),
(4, 11, 1911547330, 1000, 'Online NetBanking', '2024-03-05 18:24:05'),
(5, 12, 1397049476, 4800, 'Select Payment Method', '2024-03-05 18:27:28'),
(6, 14, 724542362, 7300, 'Online NetBanking', '2024-03-05 18:28:12'),
(7, 13, 1667771463, 4500, 'Select Payment Method', '2024-05-26 22:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'Ramzan', 'ramzanKhuram23@gmail.com', '$2y$10$cXS9Y.TyzPZkkJJsOvU7VeXhz9f8TPJlHv83LFb6OBieqHTfSjlua', 'male7.png', '::1', 'iqbal road saneha town karachi', '0345676566'),
(4, 'Sam', 'sam12@gmail.com', '$2y$10$KT3ICNH7q2tybmB40uDxyuRsQJ3sNVPdDO18BMXP9lKR8DvTsvw86', 'male9.jpeg', '::1', 'jinah town karachi', '0343905803'),
(5, 'alpha', 'a23@gmail.com', '$2y$10$2b1SzWEqq1C0J8tyAIpngefOjpxp94kUk10kFvflul/hL.wNY9hzG', 'male4.jpeg', '::1', 'alpha road 23', '03243908534'),
(7, 'Rizwan', 'rizwan435@gmail.com', '$2y$10$NLPpEkFEVPCoBJBEcqnq3OuzsYsutxnwH3qFuCt.OsFC0rOH4W4eW', 'male2.jpeg', '::1', 'bahria town islamabad', '03548345354'),
(8, 'Waseem', 'waseem23@gmail.com', '$2y$10$jKNU0Z8l88XeaJD426258.t0gRgLeGr6YLk6yDDJtL7uWfilADpdW', 'male8.jpeg', '::1', 'wazirabad 239 express city', '03485492433'),
(9, 'Arkham', 'arkham213@gmail.com', '$2y$10$b3N84gOss7H7.X9r.pe4Cuokn.kqlxgGg.6oSqDwIFvh6nK4Za6QW', 'male10.png', '::1', 'arkham city julia town ', '03456545655'),
(10, 'Sanobar', 'Sanobar23@gmail.com', '$2y$10$HayjMLqet5G2cDv5Sb6t1.PaQkJMAhUiSWBqvEr73cZCxQ/Tbxv7a', 'female5.jpg', '::1', 'ikhlaaas city lahore ', '034957434553'),
(11, 'Fahad', 'Fahad232@gmail.com', '$2y$10$SP9X3WH7AxMQa5YBnLHkfu8A2T30AuYZQ0T5.NJcoUZRvTmZa7YZ.', 'male5.jpeg', '::1', 'qaiser town karachi', '03485454344');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
