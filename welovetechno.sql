-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 09, 2021 at 01:47 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `welovetechno`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Apple'),
(2, 'Huawei');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`, `product_quantity`) VALUES
(212, 13, 2, 5),
(213, 25, 2, 5),
(214, 12, 2, 2),
(215, 23, 2, 1),
(216, 8, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Smartphones'),
(2, 'Computers'),
(3, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `extra_img1` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `img_name`, `product_id`, `extra_img1`) VALUES
(1, '600941d4f0cba.jpg', 8, ''),
(3, '600951c9a8660.jpg', 11, ''),
(4, '6009520b24740.jpg', 12, ''),
(5, '600952287ad89.jpg', 13, ''),
(9, '600963a046384.jpeg', 20, ''),
(10, '600964bde69aa.jpg', 21, ''),
(11, '6009657ec9fb2.jpg', 22, ''),
(13, '600a88fae4a45.jpg', 23, ''),
(15, '60117367830c4.jpg', 25, '60117814a94ba.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` float NOT NULL,
  `product_stock` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `brand_id`, `product_name`, `product_description`, `product_price`, `product_stock`, `category_id`) VALUES
(8, 1, 'Macbook Pro', 'Macbook Pro description', 1499.99, 25, 2),
(11, 2, 'Mate40 Pro', 'Voyez au-delà des apparences.\r\nExplorez l\'inconnu et laissez libre cours à votre imagination.\r\nFaites le plein de puissance et de vitesse pour un bond dans le futur.\r\nPrenez un temps d\'avance sur la technologie avec le HUAWEI Mate 40 Pro.', 1099.99, 100, 1),
(12, 2, 'Huawei Matebook', 'Grâce à son très bel écran, cet ordinateur rend le visionnage de vidéo en plein écran très plaisant. Encore une fois, la lumière et les couleurs sont belles et la résolution est suffisamment élevée pour apprécier les détails.', 697.99, 30, 2),
(13, 1, 'Airpods 2', 'Vos écouteurs APPLE vous embarquent dans une tout autre dimension, grâce à une autonomie agrandie et un boitier de charge sans fil performant et facilement rechargeable. Les AirPods sont des écouteurs sans fil, qui se connectent simplement à l\'approche de votre oreille, et se déconnectent lorsque vous les rangez dans le boitier prévu à cet effet', 159.99, 22, 3),
(20, 1, 'Airpods Pro', 'Après le succès planétaire des AirPods, Apple revient avec une nouvelle version encore plus performante avec des fonctionnalités nouvelles comme la réduction de bruit, une égalisation adaptative et un nouveau design pour un meilleur soutien et un confort parfait.', 179.99, 0, 3),
(21, 2, 'Huawei P20 Pro', 'Huawei nous gratifie d\'un P20 Pro qui ne manque pas d\'arguments pour installer la marque sur un marché où elle reste numéro 3. Le P20 Pro adopte tous les codes marketing en vogue pour séduire : écran Oled 19:9 avec encoche, triple module photo ou encore intelligence artificielle. Un savant mélange qui fait entrer Huawei dans la cour des grands.', 210.99, 9, 1),
(22, 1, 'Black Magic Mouse 2', 'En plus de son nouveau design, la Magic Mouse 2 est maintenant rechargeable, ce qui vous évite d\'utiliser des piles. Avec sa batterie intégrée, son design optimisé et sa coque en une seule pièce, elle est plus légère et comprend moins de parties mobiles.', 89.99, 45, 3),
(23, 1, 'iPhone 12 Pro', 'Apple innove toujours plus et met aujourd\'hui entre vos mains l\'iPhone 12 Pro Max, dernier né le plus pointu de l\'écurie iPhone. Une expérience visuelle hors pair Avec son iPhone 12 Pro Max, Apple révolutionne votre idée d\'un smartphone. L\'écran HDR 6,7 pouces de l\'appareil dispose d\'une résolution inégalée de 2778 x 1284 pixels et vous offre une expérience visuelle stupéfiante.', 999.99, 70, 1),
(25, 2, 'Freebuds', 'Freebuds made by Huawei', 89.99, 35, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_content` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_valid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_content`, `product_id`, `user_id`, `is_valid`) VALUES
(11, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur maxime quo corrupti illum in. Possimus animi aperiam enim consectetur aut. Ad numquam laboriosam sed tenetur porro expedita nulla nesciunt, officia, animi itaque recusandae quasi facere quae assumenda illo quidem laborum praesentium! Consequatur rem quasi vel cumque commodi non sed iure!', 13, 2, 1),
(12, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur maxime quo corrupti illum in. Possimus animi aperiam enim consectetur aut. Ad numquam laboriosam sed tenetur porro expedita nulla nesciunt, officia, animi itaque recusandae quasi facere quae assumenda illo quidem laborum praesentium! Consequatur rem quasi vel cumque commodi non sed iure!', 20, 2, 1),
(13, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur maxime quo corrupti illum in. Possimus animi aperiam enim consectetur aut. Ad numquam laboriosam sed tenetur porro expedita nulla nesciunt, officia, animi itaque recusandae quasi facere quae assumenda illo quidem laborum praesentium! Consequatur rem quasi vel cumque commodi non sed iure!', 22, 2, 1),
(14, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur maxime quo corrupti illum in. Possimus animi aperiam enim consectetur aut. Ad numquam laboriosam sed tenetur porro expedita nulla nesciunt, officia, animi itaque recusandae quasi facere quae assumenda illo quidem laborum praesentium! Consequatur rem quasi vel cumque commodi non sed iure!', 12, 2, 1),
(15, 'What a perfect product ! Although expensive, I expect it to last longer than the Huawei I used to use.', 23, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 5),
(2, 'Guest', 'guest@gmail.com', 'guest', 1),
(3, 'Visitor', 'visitor@gmail.com', 'visitor', 1),
(5, 'Visitor2', 'visitor2@gmail.com', 'visitor2', 1),
(6, 'Visitor3', 'visitor3@gmail.com', 'visitor3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
