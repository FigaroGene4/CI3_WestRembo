-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 12:09 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spa2go`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `id` int(2) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'spa2goSU', 'admin', 'spa2go_admin'),
(2, 'spa2godev', 'spa2godev', 'SquareOne');

-- --------------------------------------------------------

--
-- Table structure for table `table_booking`
--

CREATE TABLE `table_booking` (
  `id_booking` int(10) NOT NULL,
  `id_client` int(10) NOT NULL,
  `id_employee` int(10) NOT NULL,
  `price_booking` int(5) NOT NULL,
  `type_booking` varchar(20) NOT NULL,
  `name_client` varchar(30) NOT NULL,
  `name_employee` varchar(30) NOT NULL,
  `address_client` varchar(50) NOT NULL,
  `id_service` int(10) NOT NULL,
  `date_booking` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_client`
--

CREATE TABLE `table_client` (
  `id_client` int(10) NOT NULL,
  `firstNameClient` varchar(20) NOT NULL,
  `lastNameClient` varchar(20) NOT NULL,
  `contactNumberClient` bigint(12) NOT NULL,
  `emailClient` varchar(50) NOT NULL,
  `passwordClient` varchar(20) NOT NULL,
  `addressClient` varchar(50) NOT NULL,
  `birthdateClient` date NOT NULL,
  `genderClient` varchar(20) NOT NULL,
  `joinDateClient` date NOT NULL,
  `userNameClient` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_client`
--

INSERT INTO `table_client` (`id_client`, `firstNameClient`, `lastNameClient`, `contactNumberClient`, `emailClient`, `passwordClient`, `addressClient`, `birthdateClient`, `genderClient`, `joinDateClient`, `userNameClient`) VALUES
(32, 'Jewel Mae', 'Dumayas', 9398952299, 'jeweldumayas@yahoo.com', 'password123', 'Taguig City', '2004-05-20', 'Female', '2022-04-01', 'jewel123'),
(34, 'Juan', 'Dela Cruz', 9312893218, 'jdcruz@gmail.com', 'password', 'Blk 31 Lot 1 Quiapo Manila', '1999-10-10', 'Male', '2022-01-09', 'jdelacruz01'),
(35, 'John Carlo', 'Baraceros', 931283812, 'jcbaraceros@gmail.com', 'password', 'Makati City', '2004-05-20', 'Male', '2022-04-01', 'jcbaraceros'),
(36, 'Mark Louie', 'Sorio', 9382983, 'soriomark@yahoo.com', 'pssword', 'Taguig City', '2000-12-30', 'Male', '2022-11-01', 'mrklouie'),
(37, 'John Lord ', 'Gano', 93128371278, 'jl14@gmail.com', 'password', 'Taguig City', '2001-06-14', 'Non Binary', '0000-00-00', 'jl14');

-- --------------------------------------------------------

--
-- Table structure for table `table_employee`
--

CREATE TABLE `table_employee` (
  `id_employee` int(10) NOT NULL,
  `firstNameEmployee` varchar(20) NOT NULL,
  `lastNameEmployee` varchar(20) NOT NULL,
  `usernameEmployee` varchar(50) NOT NULL,
  `contactNumberEmployee` bigint(11) NOT NULL,
  `emailEmployee` varchar(50) NOT NULL,
  `passwordEmployee` varchar(15) NOT NULL,
  `addressEmployee` varchar(50) NOT NULL,
  `birthdateEmployee` date NOT NULL,
  `genderEmployee` varchar(15) NOT NULL,
  `joinDateEmployee` date NOT NULL,
  `serviceOffered` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_employee`
--

INSERT INTO `table_employee` (`id_employee`, `firstNameEmployee`, `lastNameEmployee`, `usernameEmployee`, `contactNumberEmployee`, `emailEmployee`, `passwordEmployee`, `addressEmployee`, `birthdateEmployee`, `genderEmployee`, `joinDateEmployee`, `serviceOffered`) VALUES
(1, 'Gilroy', 'Vargass', 'Rudeus', 910230192313, 'gilvarg@yahoo.com', 'password123', 'Cembo Makati City', '2000-01-12', 'Male', '2022-01-04', 'Barber'),
(2, 'Erwin', 'Rosquilo', 'ejpokemons', 912390128, 'ejr@yahoo.com', '123123123', 'District 1 Makati City', '1999-02-12', 'Male', '0000-00-00', 'Massage'),
(3, 'Ramil', 'Mamaril', 'jaccirocha', 931232131, 'sinongnagawanito@yahoo.com', 'baronmuchacusen', 'Comembo Makati City', '2001-11-02', 'Male', '2021-01-04', 'Make up'),
(4, 'Touie', 'Guisler', 'perfectbrain', 931231289221, 'llr@gmail.com', 'shabashaba', 'Pembo Makati City', '1999-03-12', 'Male', '2021-01-04', 'Massage'),
(11, 'Richard', 'Cudias', 'Cudie', 91203123912, 'rc@yahoo.com', 'password', 'Makati City', '1999-01-01', 'Male', '2022-01-01', 'Make up'),
(12, 'Louie', 'Kaklase', 'tropangkaklase', 93128381298, 'ltk@yahoo.com', 'password', 'Makati City', '0000-00-00', 'Male', '0000-00-00', 'Pedicure'),
(13, 'Jassy', 'Rocha', 'nanananan', 931283812, 'jr@yahoo.com', 'qweqweqwe', 'Pembo Makati City', '2000-09-20', 'Female', '0000-00-00', 'Manicure'),
(45, 'Bonaface', 'Hidalgo', ' Tintangtula', 931283128938, 'bonbon@yahoo.com', 'ttula', 'Rizal Makati City', '0000-00-00', 'they/them', '0000-00-00', 'ewe'),
(46, 'Sheila', 'Mae', 'squishy', 93021223123, 'squisky@ytahoo.com', 'qweqweqwewqe', 'Bulacan', '0000-00-00', 'she/her', '0000-00-00', 'Marami'),
(51, 'George', 'Dumayas', 'jogojorj', 932828827217, 'jorj@yahoo.com', 'passwordnamalup', 'Taguig City', '2001-12-01', 'Male', '2022-01-11', 'Barbering'),
(52, 'George', 'Dumayas', 'jogojorj', 932828827217, 'jorj@yahoo.com', 'passwordnamalup', 'Taguig City', '2001-12-01', 'Male', '2022-01-11', 'Massage');

-- --------------------------------------------------------

--
-- Table structure for table `table_postservice`
--

CREATE TABLE `table_postservice` (
  `id_postservice` int(10) NOT NULL,
  `id_employee` int(10) NOT NULL,
  `name_employee` varchar(30) NOT NULL,
  `rating_postservice` int(1) NOT NULL,
  `comment_postservice` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `id_product` int(10) NOT NULL,
  `name_product` varchar(30) NOT NULL,
  `price_product` int(5) NOT NULL,
  `quantity_product` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_productorder`
--

CREATE TABLE `table_productorder` (
  `id_productOrder` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `id_client` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_service`
--

CREATE TABLE `table_service` (
  `id_service` int(10) NOT NULL,
  `typeOfService` varchar(20) NOT NULL,
  `price_service` int(5) NOT NULL,
  `id_employee` int(10) NOT NULL,
  `rating_employee` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `table_booking`
--
ALTER TABLE `table_booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_service` (`id_service`);

--
-- Indexes for table `table_client`
--
ALTER TABLE `table_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `table_employee`
--
ALTER TABLE `table_employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `table_postservice`
--
ALTER TABLE `table_postservice`
  ADD PRIMARY KEY (`id_postservice`),
  ADD KEY `id_employee` (`id_employee`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `table_productorder`
--
ALTER TABLE `table_productorder`
  ADD PRIMARY KEY (`id_productOrder`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `table_service`
--
ALTER TABLE `table_service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `id_employee` (`id_employee`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_booking`
--
ALTER TABLE `table_booking`
  MODIFY `id_booking` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_client`
--
ALTER TABLE `table_client`
  MODIFY `id_client` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `table_employee`
--
ALTER TABLE `table_employee`
  MODIFY `id_employee` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `table_postservice`
--
ALTER TABLE `table_postservice`
  MODIFY `id_postservice` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `id_product` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_productorder`
--
ALTER TABLE `table_productorder`
  MODIFY `id_productOrder` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_service`
--
ALTER TABLE `table_service`
  MODIFY `id_service` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_booking`
--
ALTER TABLE `table_booking`
  ADD CONSTRAINT `table_booking_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `table_client` (`id_client`),
  ADD CONSTRAINT `table_booking_ibfk_2` FOREIGN KEY (`id_employee`) REFERENCES `table_employee` (`id_employee`),
  ADD CONSTRAINT `table_booking_ibfk_3` FOREIGN KEY (`id_service`) REFERENCES `table_service` (`id_service`);

--
-- Constraints for table `table_postservice`
--
ALTER TABLE `table_postservice`
  ADD CONSTRAINT `table_postservice_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `table_employee` (`id_employee`);

--
-- Constraints for table `table_productorder`
--
ALTER TABLE `table_productorder`
  ADD CONSTRAINT `table_productorder_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `table_client` (`id_client`),
  ADD CONSTRAINT `table_productorder_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `table_product` (`id_product`);

--
-- Constraints for table `table_service`
--
ALTER TABLE `table_service`
  ADD CONSTRAINT `table_service_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `table_employee` (`id_employee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
