-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2023 at 10:04 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `amount_due` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(11) NOT NULL,
  `amenities` varchar(1000) NOT NULL,
  `daily_rate` int(11) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `images` longtext NOT NULL,
  `hotel_description` varchar(255) NOT NULL,
  `refund_avaialbility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `name`, `location`, `amenities`, `daily_rate`, `thumbnail`, `images`, `hotel_description`, `refund_avaialbility`) VALUES
(1, 'The Table Bay Hotel', 'Cape Town', 'free wifi,free parking,pool,laundry', 8557, 'https://images.trvl-media.com/lodging/1000000/380000/375700/375613/431e56f0.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'https://images.trvl-media.com/lodging/1000000/380000/375700/375613/431e56f0.jpg?impolicy=resizecrop&rw=1200&ra=fit,https://images.trvl-media.com/lodging/1000000/380000/375700/375613/0934eac4.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'Luxury hotel in Victoria and Alfred Waterfront with 3 restaurants and spa', 'no'),
(2, 'The Silo Hotel', 'Cape Town', 'free wifi,restuarant,pool', 113043, 'https://images.trvl-media.com/lodging/35000000/34760000/34757500/34757476/13ea5b36.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'https://images.trvl-media.com/lodging/35000000/34760000/34757500/34757476/13ea5b36.jpg?impolicy=resizecrop&rw=1200&ra=fit,https://images.trvl-media.com/lodging/35000000/34760000/34757500/34757476/df4b6a4a.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'Victoria and Alfred Waterfront hotel with spa and outdoor pool', 'yes'),
(3, '\r\nSleepy Lion', 'Cape Town', 'free wifi,pool', 2800, 'https://images.trvl-media.com/lodging/89000000/88950000/88941700/88941641/w2496h1657x0y0-23732030.jpg?impolicy=resizecrop&rw=1200&ra=fit', ' https://images.trvl-media.com/lodging/89000000/88950000/88941700/88941641/83cf81e2.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'Cape Town City Centre hotel', 'yes'),
(4, 'Protea Hotel by Marriott', 'Cape Town', 'free parking,free wifi', 4130, 'https://images.trvl-media.com/lodging/5000000/4430000/4423300/4423204/c3eb89d9.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'https://images.trvl-media.com/lodging/5000000/4430000/4423300/4423204/c3eb89d9.jpg?impolicy=resizecrop&rw=1200&ra=fit,https://images.trvl-media.com/lodging/5000000/4430000/4423300/4423204/79cb6e1b.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'Mountain hotel in Bellville with outdoor pool and restaurant', 'yes'),
(5, 'Silver Forest Boutique Hotel', 'Cape Town', 'free wifi,free parking', 4968, 'https://images.trvl-media.com/lodging/16000000/15990000/15988700/15988649/a81ea4d0.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'https://images.trvl-media.com/lodging/16000000/15990000/15988700/15988649/a81ea4d0.jpg?impolicy=resizecrop&rw=1200&ra=fit,https://images.trvl-media.com/lodging/16000000/15990000/15988700/15988649/bb6cdbd7.jpg?impolicy=resizecrop&rw=1200&ra=fit', '4-star hotel in Somerset West with 2 outdoor pools and spa', 'yes'),
(6, 'Mojo Hotel', 'Cape Town', 'free wifi,free parking,restuarant,laundry', 1517, 'https://images.trvl-media.com/lodging/14000000/13330000/13329300/13329270/f64ba8ef.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'https://images.trvl-media.com/lodging/14000000/13330000/13329300/13329270/f64ba8ef.jpg?impolicy=resizecrop&rw=1200&ra=fit,https://images.trvl-media.com/lodging/14000000/13330000/13329300/13329270/b33a719f.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'Sea Point beach hotel with 3 bars/lounges and restaurant', 'yes'),
(7, 'Lagoon Beach Hotel & Spa', 'Cape Town', 'free wifi,free parking,laundry', 2046, 'https://images.trvl-media.com/lodging/2000000/1330000/1320800/1320739/32dc38df.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'https://images.trvl-media.com/lodging/2000000/1330000/1320800/1320739/0b365d6d.jpg?impolicy=resizecrop&rw=1200&ra=fit,https://images.trvl-media.com/lodging/2000000/1330000/1320800/1320739/32dc38df.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'Milnerton beachfront hotel with 3 restaurants and bar/lounge', 'no'),
(8, 'DoubleTree by Hilton', 'Cape Town', 'laundry,free wifi,free parking,restuarant', 1035, 'https://images.trvl-media.com/lodging/4000000/3250000/3243100/3243015/f1e0dda2.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'https://images.trvl-media.com/lodging/4000000/3250000/3243100/3243015/075f9ae0.jpg?impolicy=resizecrop&rw=1200&ra=fit,https://images.trvl-media.com/lodging/4000000/3250000/3243100/3243015/f1e0dda2.jpg?impolicy=resizecrop&rw=1200&ra=fit', '4-star hotel in Salt River with restaurant and bar/lounge', 'yes'),
(9, 'Hotel Sky Sandton', 'Joburg', 'free wifi,laundry', 1550, 'https://images.trvl-media.com/lodging/50000000/49140000/49134100/49134016/5d70404e.jpg?impolicy=resizecrop&rw=1200&ra=fit', 'https://images.trvl-media.com/lodging/50000000/49140000/49134100/49134016/5d70404e.jpg?impolicy=resizecrop&rw=1200&ra=fit', '4 star hotel in Sandton', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Mamo', 'Moloi', 'mam111@gmail.com', 'MLXmam#11'),
(2, 'Mamo', 'Moloi', 'precc@gmail.com', 'MLXmam#111'),
(3, 'Mamo', 'Moloi', 'mam55@gmail.com', 'MLXmam#11'),
(4, 'Mamo', 'Moloi', 'mam88@gmail.com', 'MLXmam#11'),
(5, 'Mamo', 'Moloi', 'mamokgom@gmail.com', 'MLXmam#11'),
(6, 'Mamo', 'Moloi', 'mam5@gmail.com', 'MLXmam#11'),
(7, 'Mamo', 'Moloi', 'mam@gmail.com', 'MLXmam311'),
(8, 'Precious', 'Moloi', 'pree@gmail.com', 'MLXmam#11'),
(9, 'Precious', 'Moloi', 'prelo@gmail.com', 'MLXmam#11'),
(10, 'Mamo', 'Moloi', 'mamokkk@gmail.com', 'MLXmam#11'),
(11, 'Mamokgolwane', 'Moloi', 'mayy@gmail.com', 'MLXmam#11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
