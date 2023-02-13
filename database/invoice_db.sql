-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: Feb 13, 2023 at 06:30 AM
-- Server version: 10.5.17-MariaDB-1:10.5.17+maria~ubu2004
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` binary(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `street_address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `surname`, `company`, `street_address`, `city`, `state`, `phone`) VALUES
(0x38343731316362612d616163622d3131, 'name', 'surname', 'company', 'street_address', 'city', 'state', 222);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` binary(16) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL COMMENT 'FK-> customer id',
  `due_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice_number`, `customer_id`, `due_date`) VALUES
(0x62626635336636342d616166372d3131, 1, 936, '2022-12-02 12:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `description` longtext NOT NULL,
  `taxed` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `id` binary(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`description`, `taxed`, `amount`, `id`) VALUES
('xxxxxx', 1, 1200, 0x30000000000000000000000000000000),
('xxxxxx', 1, 2147483647, 0x30303631363732632d616139652d3131),
('xxxxxx', 1, 99999, 0x30373465383430322d616139392d3131),
('xxxxxx', 1, 1111, 0x31000000000000000000000000000000),
('xxxxxx', 1, 2147483647, 0x31643333333261302d616139642d3131),
('xxxxxx', 1, 99999, 0x32353138616463322d616139612d3131),
('xxxxxx', 1, 2147483647, 0x32666133326163342d616139612d3131),
('xxxxxx', 1, 2147483647, 0x34323166383133652d616139612d3131),
('xxxxxx', 1, 2147483647, 0x34353232643166342d616139632d3131),
('xxxxxx', 1, 2147483647, 0x35356330343038322d616139632d3131),
('xxxxxx', 1, 2147483647, 0x35383336303139362d616139612d3131),
('xxxxxx', 1, 99999, 0x35623837363133612d616139372d3131),
('xxxxxx', 1, 2147483647, 0x36396535346363362d616139612d3131),
('xxxxxx', 1, 99999, 0x37306665613861302d616139392d3131),
('xxxxxx', 1, 0, 0x38306266653064322d616162332d3131),
('xxxxxx', 1, 99999, 0x38336332343830322d616139392d3131),
('xxxxxx', 1, 2147483647, 0x38643039316463302d616139632d3131),
('xxxxxx', 1, 2147483647, 0x39363235396563342d616139632d3131),
('xxxxxx', 1, 2147483647, 0x39623366613838302d616139652d3131),
('xxxxxx', 1, 2147483647, 0x39653034333631652d616139632d3131),
('xxxxxx', 1, 2147483647, 0x61336533656564382d616139652d3131),
('xxxxxx', 1, 99999, 0x62633661303135652d616139392d3131),
('xxxxxx', 1, 99999, 0x63386265373534302d616139372d3131),
('xxxxxx', 1, 2147483647, 0x63643630653739612d616139632d3131),
('xxxxxx', 1, 2147483647, 0x65366330396438302d616161612d3131),
('xxxxxx', 1, 2147483647, 0x65393035386534632d616161362d3131),
('xxxxxx', 1, 2147483647, 0x65613032396533322d616139652d3131),
('xxxxxx', 1, 2147483647, 0x65636632633634612d616139642d3131),
('xxxxxx', 1, 2147483647, 0x65663763393234382d616139632d3131),
('xxxxxx', 1, 2147483647, 0x66353333633663612d616139632d3131);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_number` (`invoice_number`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
