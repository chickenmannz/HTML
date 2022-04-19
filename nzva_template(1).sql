-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2019 at 09:57 AM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nzva_template`
--

-- --------------------------------------------------------

--
-- Table structure for table `AirlineFlightSchedules`
--

CREATE TABLE `AirlineFlightSchedules` (
  `id` int(11) NOT NULL,
  `actual_ident` text NOT NULL,
  `aircrafttype` text NOT NULL,
  `arrivaltime` int(11) NOT NULL,
  `departuretime` int(11) NOT NULL,
  `destination` text NOT NULL,
  `ident` text NOT NULL,
  `meal_service` text NOT NULL,
  `origin` text NOT NULL,
  `seats_cabin_business` int(3) NOT NULL,
  `seats_cabin_coach` int(3) NOT NULL,
  `seats_cabin_first` int(3) NOT NULL,
  `importime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` int(10) UNSIGNED NOT NULL,
  `flight_number` varchar(9) NOT NULL,
  `dep_icao` varchar(4) NOT NULL,
  `arr_icao` varchar(4) NOT NULL,
  `dep_time` time NOT NULL,
  `arr_time` time NOT NULL,
  `duration` time NOT NULL,
  `aircraft` varchar(10) NOT NULL,
  `mon` int(1) DEFAULT '0',
  `tue` int(1) DEFAULT '0',
  `wed` int(1) DEFAULT '0',
  `thu` int(1) DEFAULT '0',
  `fri` int(1) DEFAULT '0',
  `sat` int(1) DEFAULT '0',
  `sun` int(1) DEFAULT '0',
  `charter` int(4) DEFAULT '0',
  `event` int(4) DEFAULT '0',
  `active` int(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `code` varchar(4) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `iata_code` varchar(3) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lon` float DEFAULT NULL,
  `altLight` varchar(4) DEFAULT NULL,
  `altMedium` varchar(4) DEFAULT NULL,
  `altHeavy` varchar(4) DEFAULT NULL,
  `aip` varchar(255) DEFAULT NULL,
  `country` varchar(2) DEFAULT NULL,
  `timezone` varchar(128) DEFAULT NULL,
  `location` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AirlineFlightSchedules`
--
ALTER TABLE `AirlineFlightSchedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AirlineFlightSchedules`
--
ALTER TABLE `AirlineFlightSchedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
