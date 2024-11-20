-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 12:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', '', '2024-11-20 19:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `f_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `fr_name` varchar(222) DEFAULT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `frm_name` varchar(222) DEFAULT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`f_id`, `c_id`, `fr_name`, `email`, `phone`, `frm_name`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(1, 1, 'Juan Dela Cruz', 'juan@mail.com', '3547854700', 'Green Fields Farm', '8am', '8pm', 'Mon-Sat', 'Barangay San Isidro, Rodriguez, Rizal, 1860, Philippines', 'farm1.jpg', '2024-11-08 21:43:16'),
(2, 2, 'Pedro Santos', 'pedro@gmail.com', '0557426406', 'Sunny Meadows Organic Farm', '11am', '9pm', 'Mon-Sat', 'Purok 3, Barangay Longos, Tarlac City, 2300, Philippines', 'farm2.jpg', '2024-11-11 17:55:10'),
(3, 3, 'Jose Ramirez', 'jose@mail.com', '1458745855', 'Hilltop Farms', '9am', '8pm', 'Mon-Sat', 'Sitio Balete, Barangay San Juan, Batangas, 4200, Philippines', 'farm3.jpg', '2024-11-03 17:14:50'),
(4, 4, 'Maria Lopez', 'maria@mail.com', '6545687458', 'Fresh Harvest Farm', '7am', '8pm', 'Mon-Fri', 'Barangay Subangdaku, Mandaue City, Cebu, 6014, Philippines', 'farm4.jpg', '2024-11-15 18:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `c_name` varchar(222) DEFAULT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `c_id`, `c_name`, `title`, `slogan`, `price`, `img`) VALUES
(1, 1, NULL, 'Avocado', 'Natures creamy superfruit for a healthy twist.', 100.00, 'avocado.jpg'),
(2, 1, NULL, 'Apple', 'Crisp, juicy, and packed with wholesome goodness.', 150.00, 'apple.jpg'),
(3, 2, NULL, 'Broccoli', 'Your green powerhouse for vitality and health.', 160.00, 'broccoli.jpg'),
(4, 1, NULL, 'Lemon', 'Zesty citrus that brightens your meals and day.', 90.00, 'lemon.jpg'),
(5, 2, NULL, 'Tomato', 'Bursting with flavor, ripe for every recipe.', 50.00, 'tomato.jpg'),
(6, 2, NULL, 'Carrot', 'Crunchy, sweet, and full of vibrant nutrition.', 60.00, 'carrot.jpg'),
(7, 2, NULL, 'Pumpkin', 'Rich, hearty, and perfect for every season.', 30.00, 'pumpkin.jpg'),
(8, 1, '1', 'Papaya', 'Tropical sweetness with a touch of sunshine', 40.00, 'papaya.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`c_id`, `c_name`, `date`) VALUES
(1, 'Fruits', '2024-11-08 21:43:16'),
(2, 'Vegetables', '2024-11-11 17:55:10'),
(3, 'Grains', '2024-11-03 17:14:50'),
(4, 'Livestock', '2024-11-15 18:01:27'),
(5, 'Poultry', '2024-11-20 19:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(1, 'john_doe', 'John', 'Doe', 'john.doe@example.com', '123-456-7890', 'password123', '123 Main St, Sample City', 1, '2024-11-20 19:55:09'),
(2, 'jane_smith', 'Jane', 'Smith', 'jane.smith@example.com', '987-654-3210', '96b33694c4bb7dbd07391e0be54745fb', '456 Elm St, Sample Town', 1, '2024-11-20 19:56:31');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(27, 1, 'Avocado', 2, 999.00, 'in process', '2024-11-20 20:16:47'),
(28, 2, 'Papaya', 1, 999.00, 'closed', '2024-11-20 20:16:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;


