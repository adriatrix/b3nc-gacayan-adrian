-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 11:59 PM
-- Server version: 10.1.30-MariaDB
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
-- Database: `popstopshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`) VALUES
(1, 'Marvel'),
(2, 'Disney'),
(3, 'DC'),
(4, 'Game of Thrones'),
(5, 'Stranger Things'),
(6, 'My Little Pony'),
(7, 'Ghostbusters'),
(8, 'Star Wars'),
(9, 'Walking Dead');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `discount` decimal(3,2) NOT NULL,
  `release_date` date NOT NULL,
  `item_status_id` int(11) NOT NULL,
  `rarity_id` int(11) NOT NULL,
  `serial_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `sub_brand_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `stock`, `image`, `price`, `discount`, `release_date`, `item_status_id`, `rarity_id`, `serial_id`, `brand_id`, `sub_brand_id`, `product_id`) VALUES
(2, 'Funko POP! Game of Thrones Jon Snow', 'Ahead of the highly anticipated return of season 7, Game of Thrones Pop! Jon Snow Vinyl Figure. Notable for the distinctive style and collectability, featuring a fearless Jon Snow prepared for battle.', 2, 'assets/img/items/funko-game-of-thrones-funko-pop-jon-snow.jpg', '650.00', '0.00', '2017-03-01', 4, 3, 6, 4, 1, 1),
(3, 'Deadpool Funko POP! Marvel Cable', 'Description coming soon... ', 2, 'assets/img/items/funko-marvel-deadpool-funko-pop-marvel-cable.jpg', '550.00', '0.00', '2018-05-09', 1, 3, 5, 1, 1, 1),
(4, 'Thor: Ragnarok Funko POP! Marvel Hela', 'Hela, Goddess of Death in the movie Thor Ragnarok. Thor imprisoned on the other side of the universe, now finds himself fighting against his Avengers teammate, the Hulk! ', 2, 'assets/img/items/funko-marvel-thor-funko-pop-marvel-hela.jpg', '550.00', '0.00', '2017-12-20', 3, 2, 5, 1, 5, 1),
(5, 'Funko POP! Marvel Daredevil (Red Suit)', '', 3, 'assets/img/items/funko-marvel-daredevil-funko-pop-marvel-daredevil-red-suit.jpg', '550.00', '0.00', '2017-02-15', 5, 1, 6, 1, 2, 1),
(6, 'Civil War Funko POP! Marvel Black Panther', '', 3, 'assets/img/items/funko-marvel-civil-war-funko-pop-marvel-black-panther.jpg', '850.00', '0.00', '2017-09-05', 4, 4, 5, 1, 4, 1),
(7, 'Daredevil Funko POP! Marvel Wilson Fisk', 'Wilson Fisk Funko Pop Vinyl Bobblehead figure! The Man Without Fear and his arch-enemy from the smash Netflix series become 3-3/4\" tall stylized vinyl figures of Daredevil! ', 3, 'assets/img/items/funko-marvel-daredevil-funko-pop-marvel-wilson-fisk.jpg', '550.00', '0.00', '2017-07-04', 5, 1, 6, 1, 2, 1),
(8, 'Captain America: The Winter Soldier Funko POP! Marvel Captain America', 'Your favorite Marvel super heroes available in POP form! ', 8, 'assets/img/items/funko-pop-marvel-captain-america-winter-soldier-captain-America.jpg', '4000.00', '0.00', '2014-03-02', 4, 5, 5, 1, 3, 1),
(9, 'Captain America: The Winter Soldier Funko POP! Marvel Winter Soldier', 'Your favorite Marvel super heroes available in POP form! ', 2, 'assets/img/items/funko-pop-marvel-winter-soldier-winter-soldier.jpg', '4500.00', '0.00', '2014-03-05', 4, 4, 5, 1, 3, 1),
(10, 'Civil War Funko POP! Marvel Iron Man Exclusive', '', 1, 'assets/img/items/funko-pop-marvel-captain-america-civil-war-iron-man.jpg', '1500.00', '0.00', '2015-03-18', 3, 5, 5, 1, 3, 1),
(11, 'Walking Dead Funko POP! TV Daryl Dixon', 'From AMC\'s Hit Television Show: The Walking Dead!', 2, 'assets/img/items/funko-walking-dead-daryl-dixon.jpg', '550.00', '0.00', '2015-03-17', 5, 1, 6, 9, 1, 1),
(12, 'Walking Dead Funko POP! TV Carl Grimes', '', 6, 'assets/img/items/funko-walking-dead-carl-grimes.jpg', '550.00', '0.00', '2016-01-07', 5, 1, 6, 9, 1, 1),
(14, 'DC The Dark Knight Returns Funko POP! Heroes Superman', '', 3, 'assets/img/items/funko-dc-batman-vs-superman-superman.jpg', '6500.00', '0.00', '2016-09-22', 4, 6, 5, 3, 6, 1),
(15, 'DC Justice League Movie Funko POP! Movies Wonder Woman', '', 2, 'assets/img/items/funko-dc-batman-vs-superman-wonder-woman.jpg', '550.00', '0.00', '2016-05-24', 5, 2, 5, 3, 7, 1),
(16, 'The Last Jedi Funko POP! Star Wars Rey', '', 8, 'assets/img/items/funko-star-wars-last-jedi-rey.jpg', '550.00', '0.00', '2017-07-12', 5, 1, 8, 8, 1, 1),
(17, 'The Last Jedi Funko POP! Star Wars Kylo Ren', '', 8, 'assets/img/items/funko-star-wars-last-jedi-kylo-ren.jpg', '550.00', '0.00', '2017-08-17', 5, 1, 8, 8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_status`
--

CREATE TABLE `item_status` (
  `id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_status`
--

INSERT INTO `item_status` (`id`, `status`) VALUES
(1, 'Pre-Order'),
(2, 'New Arrival'),
(3, 'Exclusive'),
(4, 'Limited Edition'),
(5, 'Stock');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `reference_num` varchar(255) NOT NULL,
  `order_status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(7,2) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `type`) VALUES
(1, 'Bobble Head'),
(2, 'Vinyl Figure'),
(3, 'Action Figure');

-- --------------------------------------------------------

--
-- Table structure for table `rarities`
--

CREATE TABLE `rarities` (
  `id` int(11) NOT NULL,
  `rarity` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rarities`
--

INSERT INTO `rarities` (`id`, `rarity`) VALUES
(1, 'Common'),
(2, 'Uncommon'),
(3, 'Rare'),
(4, 'Ultra Rare'),
(5, 'Super Rare'),
(6, 'Retired');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'seller'),
(3, 'buyer');

-- --------------------------------------------------------

--
-- Table structure for table `serials`
--

CREATE TABLE `serials` (
  `id` int(11) NOT NULL,
  `series` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serials`
--

INSERT INTO `serials` (`id`, `series`) VALUES
(1, 'Funko POP! Disney'),
(2, 'Funko POP! Games'),
(3, 'Funko POP! Anime'),
(4, 'Funko POP! Heroes'),
(5, 'Funko POP! Movies'),
(6, 'Funko POP! TV'),
(7, 'Funko POP! Sports'),
(8, 'Funko POP! Star Wars');

-- --------------------------------------------------------

--
-- Table structure for table `sub_brands`
--

CREATE TABLE `sub_brands` (
  `id` int(11) NOT NULL,
  `sub_brand` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_brands`
--

INSERT INTO `sub_brands` (`id`, `sub_brand`) VALUES
(1, 'None'),
(2, 'Daredevil'),
(3, 'Captain America'),
(4, 'Black Panther'),
(5, 'Thor'),
(6, 'Superman'),
(7, 'Batman'),
(8, 'Suicide Squad'),
(9, 'Avengers');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `address1`, `address2`, `city`, `contact_num`, `role_id`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Adrian', 'Gacayan', 'adrian@gacayan.com', 'Ballesteros Street, New Zaniga', '', 'Mandaluyong', '4771319', 1),
(2, 'user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', '', '', 'user1@email.com', '', '', '', '', 3),
(6, 'rachel', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', 'rachel@email.com', '', '', '', '', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `items_fk0` (`item_status_id`),
  ADD KEY `items_fk1` (`rarity_id`),
  ADD KEY `items_fk2` (`serial_id`),
  ADD KEY `items_fk3` (`brand_id`),
  ADD KEY `items_fk4` (`sub_brand_id`),
  ADD KEY `items_fk5` (`product_id`);

--
-- Indexes for table `item_status`
--
ALTER TABLE `item_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_num` (`reference_num`),
  ADD KEY `orders_fk0` (`order_status_id`),
  ADD KEY `orders_fk1` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_fk0` (`order_id`),
  ADD KEY `order_details_fk1` (`item_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rarities`
--
ALTER TABLE `rarities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serials`
--
ALTER TABLE `serials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_brands`
--
ALTER TABLE `sub_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `users_fk0` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `item_status`
--
ALTER TABLE `item_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rarities`
--
ALTER TABLE `rarities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `serials`
--
ALTER TABLE `serials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_brands`
--
ALTER TABLE `sub_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_fk0` FOREIGN KEY (`item_status_id`) REFERENCES `item_status` (`id`),
  ADD CONSTRAINT `items_fk1` FOREIGN KEY (`rarity_id`) REFERENCES `rarities` (`id`),
  ADD CONSTRAINT `items_fk2` FOREIGN KEY (`serial_id`) REFERENCES `serials` (`id`),
  ADD CONSTRAINT `items_fk3` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `items_fk4` FOREIGN KEY (`sub_brand_id`) REFERENCES `sub_brands` (`id`),
  ADD CONSTRAINT `items_fk5` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`order_status_id`) REFERENCES `order_status` (`id`),
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_fk0` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_fk1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
