-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 03:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pamo`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `message_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `message_status` varchar(100) NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`message_id`, `name`, `email`, `message`, `date`, `message_status`) VALUES
(1, 'Taylor Alison Swift', 'tswift@gmail.com', 'Hello!', '2023-07-30 03:44:21', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `m-naujan`
--

CREATE TABLE `m-naujan` (
  `nau_id` int(10) NOT NULL,
  `brgy_nau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m-naujan`
--

INSERT INTO `m-naujan` (`nau_id`, `brgy_nau`) VALUES
(1, 'Adrialuna'),
(2, 'Antipolo'),
(3, 'Apitong');

-- --------------------------------------------------------

--
-- Table structure for table `m-pola`
--

CREATE TABLE `m-pola` (
  `pol_id` int(10) NOT NULL,
  `brgy_pol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m-socorro`
--

CREATE TABLE `m-socorro` (
  `soc_id` int(10) NOT NULL,
  `brgy_soc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m-victoria`
--

CREATE TABLE `m-victoria` (
  `vic_id` int(10) NOT NULL,
  `brgy_vic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `notif_id` int(50) NOT NULL,
  `notif_description` varchar(255) NOT NULL,
  `user_id` int(50) NOT NULL,
  `notif_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `notif_date` datetime NOT NULL DEFAULT current_timestamp(),
  `author` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`notif_id`, `notif_description`, `user_id`, `notif_status`, `notif_date`, `author`) VALUES
(71, 'New User', 17, 'Pending', '2023-06-28 00:00:00', 17),
(72, 'New Permit Application', 14, 'Pending', '2023-06-29 21:34:12', 14),
(73, 'New Permit Application', 17, 'Pending', '2023-07-25 09:34:57', 12),
(74, 'New User', 18, 'Pending', '2023-07-26 00:01:21', 18),
(75, 'New Permit Application', 18, 'Pending', '2023-07-26 00:02:54', 18),
(76, 'New User', 19, 'Pending', '2023-07-26 21:28:56', 19),
(77, 'New Permit Application', 19, 'Pending', '2023-07-26 21:33:27', 19);

--
-- Triggers `notif`
--
DELIMITER $$
CREATE TRIGGER `account_update_trigger` AFTER UPDATE ON `notif` FOR EACH ROW BEGIN
  IF NEW.notif_description = 'New User' THEN
    INSERT INTO notif_user (notif_description, user_id, notif_date, notif_status) 
    VALUES ('Account Activated', new.user_id, now(), 'Pending');
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `permit_approve_trigger` AFTER UPDATE ON `notif` FOR EACH ROW BEGIN
  IF NEW.notif_description = 'New Permit Application' THEN
    INSERT INTO notif_user (notif_description, user_id, notif_date, notif_status) 
    VALUES ('Permit Approved', new.user_id, now(), 'Pending');
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notif_user`
--

CREATE TABLE `notif_user` (
  `notif_id` int(10) NOT NULL,
  `notif_description` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `notif_date` datetime NOT NULL,
  `notif_status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notif_user`
--

INSERT INTO `notif_user` (`notif_id`, `notif_description`, `user_id`, `notif_date`, `notif_status`) VALUES
(66, 'Permit Application Approved', 18, '2023-07-28 22:38:58', 'Pending'),
(67, 'Permit Application Approved', 17, '2023-07-28 22:39:05', 'Pending'),
(68, 'Permit Application Approved', 19, '2023-07-28 22:39:39', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `permit`
--

CREATE TABLE `permit` (
  `permit_id` int(10) NOT NULL,
  `permit_num` varchar(11) NOT NULL DEFAULT 'M-YYYY-0000',
  `permit_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `sitio` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `contact_num` text NOT NULL,
  `religion` varchar(255) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `contact_person_num` varchar(255) NOT NULL,
  `reg_type` varchar(255) NOT NULL,
  `vessel_type` varchar(255) NOT NULL,
  `vessel_use` varchar(255) NOT NULL,
  `vessel_material` varchar(255) NOT NULL,
  `fishing_gear_used` varchar(255) NOT NULL,
  `vessel_length` varchar(255) NOT NULL,
  `vessel_breadth` varchar(255) NOT NULL,
  `gross_tonnage` varchar(255) NOT NULL,
  `net_tonnage` varchar(255) NOT NULL,
  `horsepower` varchar(255) NOT NULL,
  `speed` varchar(255) NOT NULL,
  `engine_make` varchar(255) NOT NULL DEFAULT 'NONE',
  `serial_num` varchar(255) NOT NULL DEFAULT 'N/A',
  `curregdate` date NOT NULL,
  `curregexp` date NOT NULL,
  `curregissuance` varchar(255) NOT NULL DEFAULT 'N/A',
  `coastguardregnum` varchar(255) NOT NULL DEFAULT 'N/A',
  `permit_num1` varchar(1) NOT NULL DEFAULT 'M',
  `permit_num2` year(4) NOT NULL DEFAULT 0000,
  `permit_num3` varchar(4) NOT NULL DEFAULT '0000',
  `appl_date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(50) NOT NULL,
  `approved_date` date NOT NULL,
  `id_status` varchar(50) NOT NULL DEFAULT 'Unreleased'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permit`
--

INSERT INTO `permit` (`permit_id`, `permit_num`, `permit_status`, `lname`, `fname`, `mname`, `municipality`, `barangay`, `sitio`, `dob`, `age`, `sex`, `status`, `contact_num`, `religion`, `citizenship`, `contact_person`, `relationship`, `contact_person_num`, `reg_type`, `vessel_type`, `vessel_use`, `vessel_material`, `fishing_gear_used`, `vessel_length`, `vessel_breadth`, `gross_tonnage`, `net_tonnage`, `horsepower`, `speed`, `engine_make`, `serial_num`, `curregdate`, `curregexp`, `curregissuance`, `coastguardregnum`, `permit_num1`, `permit_num2`, `permit_num3`, `appl_date`, `user_id`, `approved_date`, `id_status`) VALUES
(1, 'N-2022-0001', 'Expired', 'Mazon', 'Abu', 'Labay', 'Naujan', 'Sampaguita', 'Uno', '1992-05-12', 31, 'Male', 'Single', '09391391685', 'Roman Catholic', 'Filipino', 'Chuchay Mazon', 'Mother', '09278278819', 'New', 'Non-Motorized', 'Fishing', 'Wood', 'Net, Hook', '0', '0', '0', '0', '0', '0', 'NONE', 'N/A', '2022-05-20', '2023-05-20', 'CENR Office, Pasi II, Socorro', '6458398985', 'M', '2023', '0001', '2022-05-20', 2, '2022-05-20', 'Released'),
(14, 'N-2023-0001', 'Approved', 'Mazon', 'Abu', 'Labay', 'Naujan', 'Sampaguita', 'Uno', '1992-05-12', 31, 'Male', 'Single', '09391391685', 'Roman Catholic', 'Filipino', 'Chuchay Mazon', 'Mother', '09278278819', 'Renewal', 'Motorized', 'Fishing', 'Wood', 'Net, Hook', '0', '0', '0', '0', '0', '0', 'NONE', 'N/A', '2022-05-20', '2023-05-20', 'CENR Office, Pasi II, Socorro', '79487990083', 'N', '2023', '0001', '2023-05-27', 2, '2022-05-20', 'Released'),
(17, 'P-2023-0001', 'Approved', 'Manalo', 'Lhieny Mae', 'Dinglasan', 'Pola', 'Bacungan', 'Uno', '1993-01-12', 30, 'Male', 'Single', '0939239286', 'Roman Catholic', 'Filipino', 'Steven Manalo', 'Son', '09278278810', 'New', 'Motorized', 'Fishing', 'Wood', 'Fish Hook, Net', '8.60', '0.80', '1.17', '0.80', '15.0 HP', '20', 'SUMO', 'A2012010236', '2023-07-25', '2024-07-25', 'CENR Office, Pasi II, Socorro', '56785889076', 'P', '2023', '0001', '2023-07-25', 12, '2023-07-25', 'Released'),
(18, 'N-2023-0002', 'Approved', 'Mendoza', 'John Eric', 'Cabrera', 'Naujan', 'Poblacion I', 'Looban', '1993-12-22', 30, 'Male', 'Single', '09398758649', 'Roman Catholic', 'Filipino', 'Krystene Mendoza', 'Spouse', '09278278810', 'New', 'Motorized', 'Fishing', 'Wood', 'Lambat, Kawil', '8.60', '0.80', '1.17', '0.80', '15.0 HP', '20', 'Honda', 'A763874653', '2023-07-25', '2024-07-25', 'CENR Office, Pasi II, Socorro', '', 'N', '2023', '0002', '2023-07-26', 18, '2023-07-25', 'Released'),
(19, 'V-2023-0001', 'Approved', 'Dela Cruz', 'Nico', 'Rojas', 'Victoria', 'San Antonio', 'Bayan', '1995-03-01', 28, 'Male', 'Single', '09286754631', 'Roman Catholic', 'Filipino', 'Evangeline Dela Cruz', 'Spouse', '09278278810', 'New', 'Non-Motorized', 'Transport', 'Wood', 'None', '6.3', '0.6', '1.17', '0.80', 'NA', 'NA', 'None', 'NA', '2023-07-28', '2024-07-28', 'kjiu97665iug', '', 'V', '2023', '0001', '2023-07-26', 19, '2023-07-28', 'Released');

--
-- Triggers `permit`
--
DELIMITER $$
CREATE TRIGGER `new_permit` AFTER INSERT ON `permit` FOR EACH ROW insert into notif (notif_description, user_id, author)
values ('New Permit Application', new.permit_id, new.user_id)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `permit` AFTER UPDATE ON `permit` FOR EACH ROW insert into notif_user (notif_description, user_id, notif_date)
values ('Permit Application Approved', new.permit_id, now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(10) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `setting_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `item_name`, `setting_value`) VALUES
(1, 'carousel1', 'Banner_World-Environment-DayEnvironment-Month_2023.jpg'),
(2, 'carousel2', 'Banner_June-8-as-World-Oceans-Day-2023-web.jpg'),
(3, 'carousel3', 'Banner_June_9_as_Coral_Traingle_Day2023.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `sp_id` int(10) NOT NULL,
  `eng_name` varchar(255) NOT NULL,
  `local_name` varchar(255) NOT NULL,
  `sc_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `searca_1997` varchar(255) NOT NULL,
  `villamor_2006` varchar(255) NOT NULL,
  `mbcfi_2011` varchar(255) NOT NULL,
  `photo_credit` varchar(255) NOT NULL,
  `conservation_status` varchar(255) NOT NULL,
  `residency_status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`sp_id`, `eng_name`, `local_name`, `sc_name`, `category`, `searca_1997`, `villamor_2006`, `mbcfi_2011`, `photo_credit`, `conservation_status`, `residency_status`, `image`) VALUES
(1, 'Grey Heron', 'Tagak', 'Ardea cinerea', 'Bird', '-', '-', '7', 'DG Tabaranza', 'Least Concern', 'Migrant', 'Grey Heron_2016Jan21_DGTabaranza.jpg'),
(2, 'Purple Heron', '', 'Ardea purpurea', 'Bird', '', '', '', 'DG Tabaranza', '', '', 'Ardea purpurea.jpg'),
(3, 'Great-billed Heron', '', 'Ardea sumatrana', 'Bird', '', '11', '', 'ebird.org', 'Least Concern', 'Resident', 'Great-billed Heron.jpg'),
(4, 'Great Egret', '', 'Egretta alba', 'Bird', 'X', '38', '43', 'Alex Lamoreaux', 'Least Concern', 'Migrant', 'Great-Egret.jpg'),
(5, 'Milk Fish', 'Bangus', 'Chanos chanos', 'Fishes', '', '', '', 'Ramon F Velasquez/via Wikimedia Commons - CC BY-SA 3.0', '', '', 'Chanos-chanos.jpg'),
(6, 'Asian Palm Swift', '', 'Cypsiurus balasiensis', 'Birds', 'X', '', '', 'P. B. Samkumar', 'Least Concern; New island record for verification', 'Resident', 'asian-palm-swift.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `sur_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `respondent` varchar(255) NOT NULL,
  `sp_id` int(10) NOT NULL,
  `qty` varchar(50) NOT NULL DEFAULT '0',
  `place` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`sur_id`, `date`, `respondent`, `sp_id`, `qty`, `place`, `note`) VALUES
(1, '2023-05-31', 'rg mazon', 1, '12', 'Naujan Lake', 'none.'),
(2, '2023-06-01', 'rg mazon', 2, '1', 'Naujan Lake', 'none.'),
(3, '2023-05-31', 'Liza Soberano', 3, '23', 'Naujan Lake', 'none.'),
(4, '2023-05-31', 'Camilla Cabello', 6, '3', 'Naujan Lake', 'none.'),
(5, '2023-06-06', 'Taylor Swift', 6, '14', 'Naujan Lake (Victoria)', ''),
(6, '2023-04-17', 'Steven Hernandez', 2, '10', 'Naujan Lake (Pasi II, Socorro)', ''),
(7, '2023-05-12', 'Rezzie Jane Lopez', 1, '45', 'Naujan Lake (Pola)', ''),
(8, '2023-07-30', 'Taylor Alison Swift', 4, '5', 'Highway - Pasi II, Socorro', 'The birds are seen near a carabao.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `account_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `sitio` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `contact_num` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `account_status`, `lname`, `fname`, `mname`, `dob`, `age`, `gender`, `municipality`, `sitio`, `barangay`, `status`, `religion`, `citizenship`, `contact_num`, `email`, `username`, `password`, `image`, `date_added`) VALUES
(1, 'admin', 'Active', '', '', '', '0000-00-00', '', '', 'Naujan', '', '', '', '', '', '', '', 'admin', '1234', 'rg.jpg', '2023-05-19 16:00:00'),
(2, 'user', 'Active', 'Mazon', 'Abu', 'Labay', '1992-05-12', '31', 'Male', 'Naujan', '', 'Sampaguita', 'Single', 'Roman Catholic', 'Filipino', '09391391685', 'abu@gmail.com', 'abu', '1234', 'abu.jpg', '2023-05-20 14:55:09'),
(12, 'user', 'Active', 'Manalo', 'Lhieny Mae', 'Dinglasan', '1993-01-12', '30', 'Female', 'Pola', 'Uno', 'Bacungan', 'Single', 'Roman Catholic', 'Filipino', '0939239286', 'lm@gmail.com', 'lhieny', '1234', 'vector-users.jpg', '2023-06-18 03:32:58'),
(13, 'user', 'Active', 'Pahibo', 'Rinniel', 'Hernandez', '1993-05-12', '30', 'Male', 'Naujan', 'Uno', 'Sampaguita', 'Single', 'Roman Catholic', 'Filipino', '0939239286', 'rinniel@gmail.com', 'rinniel', '1234', 'vector-users.jpg', '2023-06-18 03:35:45'),
(18, 'user', 'Active', 'Mendoza', 'John Eric', 'Cabrera', '1993-12-22', '30', 'Male', 'Naujan', 'Looban', 'Poblacion I', 'Single', 'Roman Catholic', 'Filipino', '09398758649', 'je@gmail.com', 'johneric', '1234', 'vector-users.jpg', '2023-07-25 16:01:21'),
(19, 'user', 'Active', 'Dela Cruz', 'Nico', 'Rojas', '1995-03-01', '28', 'Male', 'Victoria', 'Bayan', 'San Antonio', 'Married', 'Roman Catholic', 'Filipino', '09286754631', 'nico@gmail.com', 'nico', '1234', 'vector-users.jpg', '2023-07-26 13:28:56');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `new_user` AFTER INSERT ON `users` FOR EACH ROW insert into notif (notif_description, user_id, author)
values ('New User', new.id, new.id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE `violations` (
  `v_id` int(50) NOT NULL,
  `permit_id` int(11) NOT NULL,
  `vcat_id` int(50) NOT NULL,
  `user` int(10) NOT NULL,
  `date` date NOT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_amt` varchar(255) DEFAULT NULL,
  `recieved_from` varchar(255) DEFAULT NULL,
  `receipt_num` varchar(255) DEFAULT NULL,
  `viol_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `violations`
--

INSERT INTO `violations` (`v_id`, `permit_id`, `vcat_id`, `user`, `date`, `payment_date`, `payment_amt`, `recieved_from`, `receipt_num`, `viol_status`, `details`) VALUES
(1, 1, 1, 0, '2023-05-20', '2023-05-25', '300', 'Abu Mazon', 'gfhr5675', 'Settled', ''),
(2, 1, 2, 0, '2023-05-21', '2023-05-27', '1000.00', 'Abu Mazon', 'gurt57', 'Settled', '');

-- --------------------------------------------------------

--
-- Table structure for table `violations2`
--

CREATE TABLE `violations2` (
  `v_id` int(10) NOT NULL,
  `vcat_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `payment_date` date DEFAULT NULL,
  `recieved_from` varchar(255) DEFAULT NULL,
  `receipt_num` varchar(255) DEFAULT NULL,
  `viol_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `violations2`
--

INSERT INTO `violations2` (`v_id`, `vcat_id`, `name`, `address`, `date`, `payment_date`, `recieved_from`, `receipt_num`, `viol_status`, `details`) VALUES
(1, 1, 'Amore Hernandez', 'Brgy. Parang, Calapan City, Oriental Mindoro', '2023-06-15', NULL, NULL, NULL, 'Pending', ''),
(9, 3, 'Taylor Swift', 'SILONAY, CALAPAN CITY, ORIENTAL MINDORO', '2023-06-17', '2023-06-17', 'Taylor Swift', 'sgsrt4yy64', 'Settled', ''),
(10, 2, 'Lhieny Mae Manalo', 'Parang, Calapan City, oriental Mindoro', '2023-06-16', NULL, NULL, NULL, 'Pending', ''),
(11, 3, 'Steven H. Pahibo', 'Guinobatan, Calapan City, Oriental Mindoro', '2023-06-17', NULL, NULL, NULL, 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `violation_category`
--

CREATE TABLE `violation_category` (
  `vcat_id` int(50) NOT NULL,
  `v_name` varchar(255) NOT NULL,
  `v_details` varchar(255) NOT NULL,
  `penalty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `violation_category`
--

INSERT INTO `violation_category` (`vcat_id`, `v_name`, `v_details`, `penalty`) VALUES
(1, 'Fishing Permit Fee', 'Mandatory payment collected for applying fishing permit fee.', '300.00'),
(2, 'Fishing Without Fishing Permit', 'The fisherfolk, PAMB/NLNP-PAMO member or not, caught fishing within the NLNP without active fishing permit.', 'Php1,000.00/Denial of Fishing Permit Application.'),
(3, 'Killing of Critically Endangered Species', 'Fisherfolk, with Fishing Permit or without, is caught and/or reported and proved to have killed a critically endangered species.', 'Jail term of 6 years and 1 day to 12 years and/or payment of fine ranging from P100,000 to P1 million.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `m-naujan`
--
ALTER TABLE `m-naujan`
  ADD PRIMARY KEY (`nau_id`);

--
-- Indexes for table `m-pola`
--
ALTER TABLE `m-pola`
  ADD PRIMARY KEY (`pol_id`);

--
-- Indexes for table `m-socorro`
--
ALTER TABLE `m-socorro`
  ADD PRIMARY KEY (`soc_id`);

--
-- Indexes for table `m-victoria`
--
ALTER TABLE `m-victoria`
  ADD PRIMARY KEY (`vic_id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `notif_user`
--
ALTER TABLE `notif_user`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `permit`
--
ALTER TABLE `permit`
  ADD PRIMARY KEY (`permit_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`sur_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `violations2`
--
ALTER TABLE `violations2`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `violation_category`
--
ALTER TABLE `violation_category`
  ADD PRIMARY KEY (`vcat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `message_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m-naujan`
--
ALTER TABLE `m-naujan`
  MODIFY `nau_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m-pola`
--
ALTER TABLE `m-pola`
  MODIFY `pol_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m-socorro`
--
ALTER TABLE `m-socorro`
  MODIFY `soc_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m-victoria`
--
ALTER TABLE `m-victoria`
  MODIFY `vic_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `notif_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `notif_user`
--
ALTER TABLE `notif_user`
  MODIFY `notif_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `permit`
--
ALTER TABLE `permit`
  MODIFY `permit_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `sp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `sur_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `v_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `violations2`
--
ALTER TABLE `violations2`
  MODIFY `v_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `violation_category`
--
ALTER TABLE `violation_category`
  MODIFY `vcat_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
