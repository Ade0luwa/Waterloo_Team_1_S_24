-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 12:12 AM
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
-- Database: `eventdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `audience`
--

CREATE TABLE `audience` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `event_id` int(30) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= pending, 1 =Paid',
  `attendance_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1= present',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = for verification,  1 = confirmed,2= declined',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audience`
--

INSERT INTO `audience` (`id`, `name`, `contact`, `email`, `address`, `event_id`, `payment_status`, `attendance_status`, `status`, `date_created`) VALUES
(3, 'dhagash', '1234567890', 'dhagash1234@gmail.com', 'pratham residency', 1, 1, 0, 0, '2022-03-09 20:20:56'),
(9, 'vansh', '7383400827', 'vansh.palkhiwala09@gmail.com', 'dvddbbvdvdbe', 1, 0, 0, 1, '2022-03-31 16:28:25'),
(10, 'dhagash', '+91 8401188511', 'dhagash1234@gmail.com', 'B-201 Saransh Arth\r\nAhmedabad', 5, 0, 0, 0, '2022-04-04 17:47:09'),
(11, 'jeel', '8999067909', 'keval@gmail.com', 'A-8 Aashray Apartment\r\nAhmedabad\r\n', 1, 1, 0, 1, '2022-04-05 13:55:09'),
(12, 'hetvi', '+91 9426101002', 'hetvi123@gmail.com', 'B-104 Adhisthan Shreeya\r\nGandhinagar', 1, 0, 0, 1, '2022-04-05 13:57:13'),
(14, 'vansh', '1234567890', 'vansh@gmail.com', 'b-902 pratham society', 2, 0, 0, 0, '2022-04-22 11:39:37'),
(16, 'vansh', '7383400827', 'vansh@gmail.com', 'B-09 Pratham', 1, 0, 0, 0, '2022-04-22 12:50:07'),
(17, 'maryam', '1234567890', 'maryam@gmail.com', '123', 2, 1, 0, 1, '2024-06-04 16:51:38'),
(18, 'promila', '4378717099', 'ravala193@gmail.com', 'abc', 2, 0, 0, 1, '2024-06-04 17:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(8) NOT NULL,
  `name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'vansh', 'vansh1009', 'vansh@gmail.com', '$2y$10$QMJpE0mdzN8J085xUJG4necARu8fjRd4nnwkuvivw9MQglWafycfm'),
(2, 'vansh', 'vansh1009+', 'vansh.palkhiwala09@gmail.com', '$2y$10$ADJtwEDnOG3E50I4pOp5aOmZdv.lyQQdzPGJtISBoBWQvasT0UDkC'),
(3, 'maryam', 'maryam1', 'maryam@gmail.com', '$2y$10$.Vuw5LpwBV7OFDnjIkokYefscuvPcH7XfLhsstN7z4QP4RFI0UHGi'),
(4, 'PROMILA', 'PRO', 'promila2@gmail.com', '$2y$10$2bd0m.zP7ZRkk1ouLtgGle2A20M.DMq7j26Bvw/dmjxa7gYponz0u'),
(5, 'Vansh Palkhiwala', 'Vansh123', 'vpalkhiwala1360@conestogac.on.ca', '$2y$10$TkGpJdhdyeuXL9gyj.pba.kA2c4AnTdtlYViT4BMbIHegYTTj9hAC'),
(6, 'Edikan Ekanem', 'didi', 'eekanem5146@conestogac.on.ca', '$2y$10$glxR9HbFnh3u4ZJ5O1kIAuqnNEPfKRFe47fa1rUXogN1pnkAYKZrG'),
(7, 'Adeoluwatomiwa Adegbesan', 'adeolu', 'aadegbesan5771@conestogac.on.ca', '$2y$10$AG/YnYrxQBTZEXzoXrCUXu.IUIAYqgY4F/1HkXLR6LdQlLEZPvNcy'),
(8, 'Test Boss', 'Test Boss', 'testboss@gmail.com', '$2y$10$Yfszs5Eil17yu/zu1ktpkun2anAP3aX4sPRHV4/XMnuiBSgS.akKe');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(30) NOT NULL,
  `venue_id` int(30) NOT NULL,
  `event` text NOT NULL,
  `description` text NOT NULL,
  `schedule` datetime NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Public, 2-Private',
  `audience_capacity` int(30) NOT NULL,
  `payment_type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Free,payable',
  `amount` double NOT NULL DEFAULT 0,
  `banner` text NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `venue_id`, `event`, `description`, `schedule`, `type`, `audience_capacity`, `payment_type`, `amount`, `banner`, `date_created`) VALUES
(1, 2, 'Sample Only', '&lt;b style=&quot;margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;=&quot;&quot; text-align:=&quot;&quot; justify;&quot;=&quot;&quot;&gt;Lorem Ipsum&lt;/b&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;=&quot;&quot; text-align:=&quot;&quot; justify;&quot;=&quot;&quot;&gt;&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&lt;/span&gt;', '2024-06-24 17:18:00', 1, 500, 2, 45, 'seminar.jpg', '0000-00-00 00:00:00'),
(2, 1, 'Event 2', 'Event description here......', '2024-06-27 14:38:00', 1, 500, 2, 35, '1646556540_workshop.jpg', '0000-00-00 00:00:00'),
(6, 3, 'Sample Private', 'A grand wedding', '2024-06-24 17:13:00', 2, 3000, 1, 250, '1649150760_2_1649053140_2_1648725060_2_1646561160_wedding.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Effortless Events', 'effortless_events@gmail.com', '+1 (437) 599 0837', '1649055720_bgimage.jpg', '&lt;p style=&quot;box-sizing: inherit; margin-bottom: 1.3em; color: rgb(11, 51, 84); font-family: -apple-system, system-ui, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;; font-size: 19px; overflow-wrap: break-word; padding: 0px; border: 0px;&quot;&gt;Effortless Events&lt;/p&gt;&lt;p style=&quot;box-sizing: inherit; margin-bottom: 1.3em; color: rgb(11, 51, 84); font-family: -apple-system, system-ui, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;; font-size: 19px; overflow-wrap: break-word; padding: 0px; border: 0px;&quot;&gt;&lt;span style=&quot;color: rgb(11, 51, 84); font-family: -apple-system, system-ui, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;; font-size: 19px;&quot;&gt;Effortless Events&amp;nbsp;&lt;/span&gt;is an honor-winning event arranging and setting firm. Our full services, all the way subtleties, and administrations make our studio the ideal beginning for everything party style. ​Through imaginative structure and immaculate execution, we create paramountly and one-of-a-kind events everything being equal, sizes and styles.&lt;/p&gt;&lt;p style=&quot;box-sizing: inherit; margin-bottom: 1.3em; color: rgb(11, 51, 84); font-family: -apple-system, system-ui, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;; font-size: 19px; overflow-wrap: break-word; padding: 0px; border: 0px;&quot;&gt;For a long time our capable, experienced group has aced incalculable festivals &ndash; weddings, corporate, occasions, birthday celebrations, meals and that&rsquo;s only the tip of the iceberg.&lt;/p&gt;&lt;p data-slot-rendered-dynamic=&quot;true&quot; style=&quot;box-sizing: inherit; margin-bottom: 1.3em; color: rgb(11, 51, 84); font-family: -apple-system, system-ui, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;; font-size: 19px; overflow-wrap: break-word; padding: 0px; border: 0px;&quot;&gt;&lt;span style=&quot;color: rgb(11, 51, 84); font-family: -apple-system, system-ui, BlinkMacSystemFont, &amp;quot;Segoe UI&amp;quot;, Helvetica, Arial, sans-serif, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;; font-size: 19px;&quot;&gt;Our events are totally altered, mirroring the brand identity of every customer. Regardless of whether we represent a family, an item, an organization, or a reason, our work grasps encounters that incorporate inventive plan with the best in wine and mixed drinks, eating, music, diversion, and&mdash;most vital of all&mdash;that immaterial component of shock.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Admin,2=Staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(6, 'vansh', 'vansh1009', '8c7a73363cc69c7eccbd9de7c1930508', 1);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(30) NOT NULL,
  `venue` text NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `venue`, `address`, `description`, `rate`) VALUES
(1, 'Venue 1', 'Sample Address', 'Sample description', 23.5),
(2, 'Venue 2', 'Sample', 'Sample only', 25),
(3, 'Venue 3', 'Address here', 'Sample Description', 28),
(4, 'Venue 4', 'Main Location', 'There will be an descprition here.....', 48);

-- --------------------------------------------------------

--
-- Table structure for table `venue_booking`
--

CREATE TABLE `venue_booking` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `venue_id` int(30) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-for verification,1=confirmed,2=canceled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue_booking`
--

INSERT INTO `venue_booking` (`id`, `name`, `address`, `email`, `contact`, `venue_id`, `duration`, `datetime`, `status`) VALUES
(6, 'vansh', 'address', 'vansh@gmail.in', '1234567890', 3, '24 hours', '2022-03-24 20:00:00', 1),
(13, 'vansh', 'D-601 pratham residency\r\nAhmedabad', 'vansh.palkhiwala09@gmail.com', '7383400827', 2, '2 hours', '2022-04-21 21:00:00', 2),
(15, 'vansh', 'B-604 Pratham', 'vansh@gmail.com', '7383400827', 3, 'abc', '2022-04-23 18:00:00', 0),
(16, 'maryam', '1232', 'maryam@gmail.com', '1234567890', 4, '4', '2024-06-05 09:00:00', 1),
(17, 'Adeoluwatomiwa', 'conestoga ', 'adetest@yopmail.com', '1111111111', 4, '2', '2024-07-23 15:00:00', 2),
(18, 'Adeoluwatomiwa Daniel Adegbesan', 'conestoga', 'adegbesanadeoluwatomiwa@gmail.com', '3334445567', 2, '3', '2024-07-26 19:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audience`
--
ALTER TABLE `audience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue_booking`
--
ALTER TABLE `venue_booking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audience`
--
ALTER TABLE `audience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `venue_booking`
--
ALTER TABLE `venue_booking`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
