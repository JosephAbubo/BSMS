-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 03:13 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notifications`
--

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `invoiceid` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `prodname` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `status1` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`invoiceid`, `name`, `prodname`, `price`, `status1`, `id`, `date`, `type`, `message`, `status`) VALUES
('Agsirb-E-0000001', 'John Lester Mendoza', 'Baccuit Norte. BLU', 'Barangay Indigency Cert', 'pending', 5, '0000-00-00', '', '', ''),
('Agsirb-E-0000001', 'John Lester Mendoza', 'Baccuit Norte. BLU', 'Barangay Indigency Cert', 'pending', 6, '0000-00-00', '', '', ''),
('Agsirb-E-0000002', 'joseph abubo', 'City of San Fernando, La Union', 'Barangay Indigency Cert', 'pending', 7, '0000-00-00', '', '', ''),
('Agsirb-E-0000003', 'John Lester Mendoza', 'Baccuit Norte. BLU', 'Barangay Indigency Cert', 'pending', 8, '0000-00-00', '', '', ''),
('Agsirb-E-0000003', 'John Lester Mendoza', 'Baccuit Norte. BLU', 'Barangay Indigency Cert', 'pending', 9, '0000-00-00', '', '', ''),
('Agsirb-E-0000004', 'joseph abubo', 'Baccuit Norte. BLU', 'Barangay Indigency Cert', 'pending', 10, '0000-00-00', '', '', ''),
('Agsirb-E-0000005', 'John Lester Mendoza', 'Baccuit Norte. BLU', 'Barangay Indigency Cert', 'pending', 11, '0000-00-00', '', '', ''),
('Agsirb-E-0000006', 'joseph abubo', 'Baccuit Norte. BLU', 'Barangay Residency Cert', 'pending', 12, '0000-00-00', '', '', ''),
('Agsirb-E-0000007', 'John Lester Mendoza', 'City of San Fernando, La Union', 'Barangay Indigency Cert', 'pending', 13, '0000-00-00', '', '', ''),
('Agsirb-E-0000008', 'John Lester Mendoza', 'joseph', 'Barangay Indigency Cert', 'pending', 14, '0000-00-00', '', '', ''),
('Agsirb-E-0000009', 'John Lester Mendoza', 'City of San Fernando, La Union', 'Barangay Indigency Cert', 'pending', 15, '0000-00-00', '', '', ''),
('Agsirb-E-0000010', 'John Lester Mendoza', 'City of San Fernando, La Union', 'Barangay Indigency Cert', 'pending', 16, '0000-00-00', '', '', ''),
('Agsirb-E-0000011', 'John Lester Mendoza', 'City of San Fernando, La Union', 'Barangay Indigency Cert', 'pending', 17, '0000-00-00', '', '', ''),
('Agsirb-E-0000012', 'John Lester Mendoza', 'City of San Fernando, La Union', 'Barangay Indigency Cert', 'pending', 18, '0000-00-00', '', '', ''),
('Agsirb-E-0000013', 'joseph abubo', 'Baccuit Norte. BLU', 'Barangay Indigency Cert', 'pending', 19, '0000-00-00', '', '', ''),
('Agsirb-E-0000014', 'John Lester Mendoza', 'Baccuit Norte. BLU', 'Barangay Residency Cert', 'pending', 20, '0000-00-00', '', '', ''),
('Agsirb-E-0000015', 'Jessa Santos', 'City of San Fernando, La Union', 'Barangay Indigency Cert', 'pending', 21, '0000-00-00', '', '', ''),
('Agsirb-E-0000016', 'Joseph Caluza Abubo', 'City of San Fernando, La Union', 'Barangay Indigency Cert', 'pending', 22, '0000-00-00', '', '', ''),
('Agsirb-E-0000017', 'John Lester Mendoza', 'City of San Fernando, La Union', 'Barangay Indigency Cert', 'pending', 23, '0000-00-00', '', '', ''),
('Agsirb-E-0000018', 'John Lester Mendoza', 'City of San Fernando, La Union', 'Barangay Indigency Cert', 'pending', 24, '0000-00-00', '', '', ''),
('Agsirb-E-0000018', 'John Lester Mendoza', 'City of San Fernando, La Union', 'Barangay Indigency Cert', 'pending', 25, '0000-00-00', '', '', ''),
('Agsirb-E-0000019', 'John Lester Mendoza', 'City of San Fernando, La Union', 'Barangay Indigency Cert', 'pending', 26, '0000-00-00', '', '', ''),
('Agsirb-E-0000020', 'John Lester Mendoza', 'City of San Fernando, La Union', 'Barangay Indigency Cert', 'pending', 27, '0000-00-00', '', '', ''),
('Agsirb-E-0000021', 'ssaAS', 'ASs', 'Barangay Indigency Cert', 'pending', 28, '0000-00-00', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
