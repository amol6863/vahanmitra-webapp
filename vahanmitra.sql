-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2019 at 12:00 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vahanmitra`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `Badge_n` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `RTO` varchar(20) NOT NULL,
  `RTO code` varchar(10) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`Badge_n`, `Name`, `Email`, `Mobile`, `RTO`, `RTO code`, `Password`) VALUES
('1234', 'Ganraj Dol', 'ganraj022@gmail.com', '7972499061', 'karad', 'MH50', '00000000'),
('6863', 'amol bhulugade', 'a4amol6863@gmail.com', '9673414145', 'karad', 'MH50', 'amol@admin');

-- --------------------------------------------------------

--
-- Table structure for table `cop_details`
--

CREATE TABLE `cop_details` (
  `Badge` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `RTO` varchar(10) NOT NULL,
  `RTO code` varchar(10) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cop_details`
--

INSERT INTO `cop_details` (`Badge`, `Name`, `RTO`, `RTO code`, `Mobile`, `Email`, `Password`) VALUES
('1003', 'Atul Patil', 'Karad', 'MH50', '9146801807', 'atulpatil@gmail.com', 'atul@1003'),
('12345', 'Avadhut Patil', 'karad', 'MH50', '7972688151', 'patil.abp@gmail.com', 'abp@123'),
('2098', 'Rudra Bhulugade', 'Karad', 'MH50', '9673414145', 'a4amol6863@gmail.com', 'rudra@000'),
('4854', 'Bhakti Bhulugade', 'karad', 'MH50', '9673698676', 'bhakti.b@gmail.com', 'bhakti@b');

-- --------------------------------------------------------

--
-- Table structure for table `offences`
--

CREATE TABLE `offences` (
  `ID` int(10) NOT NULL,
  `Raised_By` varchar(50) NOT NULL,
  `Badge` varchar(30) NOT NULL,
  `Owner` varchar(50) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `Vehicle` varchar(50) NOT NULL,
  `Registration` varchar(10) NOT NULL,
  `Registration_Authority` varchar(20) NOT NULL,
  `offence_Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Offence Category` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  `Location` text NOT NULL,
  `Img` varchar(50) NOT NULL,
  `Evidence` longblob NOT NULL,
  `Status` varchar(30) DEFAULT NULL,
  `Transaction_ID` varchar(50) DEFAULT 'NA',
  `Challan` varchar(50) NOT NULL DEFAULT 'NA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offences`
--

INSERT INTO `offences` (`ID`, `Raised_By`, `Badge`, `Owner`, `Contact`, `Vehicle`, `Registration`, `Registration_Authority`, `offence_Date`, `Offence Category`, `Description`, `Location`, `Img`, `Evidence`, `Status`, `Transaction_ID`, `Challan`) VALUES
(41, 'Avadhut Patil', '12345', 'GANRAJ DOL', '8149483859', 'TVS MOTOR COMPANY LTD, TVS JUPITER ZX (BS IV)', 'MH50P8349', 'KARAD,MAHARASHTRA', '2019-01-18 11:46:27', 'Parking Offences', 'parked in no parking zone', 'krishna hospital', '20151031175826.jpg', 0x45766964616e63652f32303135313033313137353832362e6a7067, 'Closed (admin)', 'NA', 'NA'),
(42, 'Rudra Bhulugade', '2098', 'AMOL BHULUGADE', '9146801807', 'TVS MOTOR COMPANY LTD/TVS APACHE RTR 160RD RG', 'MH50J2098', 'KARAD,MAHARASHTRA', '2019-01-18 16:58:27', 'Driving Offences', 'Disobeying traffic signal', 'bheda hospital', '20151105121732.jpg', 0x45766964616e63652f32303135313130353132313733322e6a7067, 'Closed', 'NA', 'NA'),
(43, 'Avadhut Patil', '12345', 'UMESH BHULUGADE', '9673414145', 'MARUTI SUZUKI INDIA LTD/SWIFT DEZIRE VXI BSIV', 'MH50A4854', 'KARAD,MAHARASHTRA', '2019-01-18 17:03:02', 'Driving Restrictions', 'missing rear number plate', 'malkapur karad', '20160112195137.jpg', 0x45766964616e63652f32303136303131323139353133372e6a7067, 'Closed', 'NA', 'NA'),
(44, 'Avadhut Patil', '12345', 'GANRAJ DOL', '8149483859', 'TVS MOTOR COMPANY LTD, TVS JUPITER ZX (BS IV)', 'MH50P8349', 'KARAD,MAHARASHTRA', '2019-01-18 17:06:41', 'Pollution Offences', 'Silencer/muffler making noise', 'bharati vidyapeeth', '20160128195437.jpg', 0x45766964616e63652f32303136303132383139353433372e6a7067, 'Closed (admin)', 'NA', 'NA'),
(45, 'Rudra Bhulugade', '2098', 'GANRAJ DOL', '8149483859', 'TVS MOTOR COMPANY LTD, TVS JUPITER ZX (BS IV)', 'MH50P8349', 'KARAD,MAHARASHTRA', '2019-01-19 15:33:39', 'Parking Offences', 'no parking', 'bharati vidyapeeth malkapur', 'IMG_20190119_105642.jpg', 0x45766964616e63652f494d475f32303139303131395f3130353634322e6a7067, 'Closed', 'NA', 'NA'),
(46, 'Avadhut Patil', '12345', 'AMOL BHULUGADE', '9146801807', 'TVS MOTOR COMPANY LTD/TVS APACHE RTR 160RD RG', 'MH50J2098', 'KARAD,MAHARASHTRA', '2019-01-20 17:15:21', 'Pollution Offences', 'noisy exhaust', 'talmavale', '20160514071306.jpg', 0x45766964616e63652f32303136303531343037313330362e6a7067, 'Closed (admin)', 'NA', 'NA'),
(47, 'Avadhut Patil', '12345', 'GANRAJ DOL', '8149483859', 'TVS MOTOR COMPANY LTD, TVS JUPITER ZX (BS IV)', 'MH50P8349', 'KARAD,MAHARASHTRA', '2019-01-23 19:26:50', 'Licence Offences', 'expired licence', 'patan', '20160924230514.jpg', 0x45766964616e63652f32303136303932343233303531342e6a7067, 'Closed (admin)', 'NA', 'NA'),
(48, 'Atul Patil', '1003', 'AMOL BHULUGADE', '9146801807', 'TVS MOTOR COMPANY LTD/TVS APACHE RTR 160RD RG', 'MH50J2098', 'KARAD,MAHARASHTRA', '2019-02-08 22:43:25', 'Parking Offences', 'no parking', 'malharprth', 'IMG_20160908_110826.jpg', 0x45766964616e63652f494d475f32303136303930385f3131303832362e6a7067, 'Closed', 'NA', 'NA'),
(49, 'Rudra Bhulugade', '2098', 'GANRAJ DOL', '8149483859', 'TVS MOTOR COMPANY LTD, TVS JUPITER ZX (BS IV)', 'MH50P8349', 'KARAD,MAHARASHTRA', '2019-02-16 15:29:00', 'Driving Offences', 'triple seat', 'bheda hospital', 'IMG20170615150812.jpg', 0x45766964616e63652f494d4732303137303631353135303831322e6a7067, 'Closed (admin)', 'NA', 'NA'),
(50, 'Atul Patil', '1003', 'GANRAJ DOL', '8149483859', 'TVS MOTOR COMPANY LTD, TVS JUPITER ZX (BS IV)', 'MH50P8349', 'KARAD,MAHARASHTRA', '2019-02-19 16:14:25', 'Driving Offences', 'no helmet', 'sangam hotel', 'IMG_20180929_213136_393.jpg', 0x45766964616e63652f494d475f32303138303932395f3231333133365f3339332e6a7067, 'Closed (admin)', 'NA', 'NA'),
(51, 'Atul Patil', '1003', 'UMESH BHULUGADE', '9673414145', 'MARUTI SUZUKI INDIA LTD/SWIFT DEZIRE VXI BSIV', 'MH50A4854', 'KARAD,MAHARASHTRA', '2019-02-19 16:22:48', 'Driving Offences', 'no seatbelts', 'talmavale', 'IMG_20160326_105333.jpg', 0x45766964616e63652f494d475f32303136303332365f3130353333332e6a7067, 'Active', 'NA', 'NA'),
(52, 'Rudra Bhulugade', '2098', 'GANAPATI PATIL', '7972222749', 'HYUNDAI MOTOR INDIA LTD / VERNA CRDI SX(O) 1.6 ', 'MH09DA6632', 'KOLHAPUR,MAHARASHTRA', '2019-03-01 17:19:34', 'Licence Offences', 'no licence', 'karve naka', 'thumb14827314299744.jpg.png', 0x45766964616e63652f7468756d6231343832373331343239393734342e6a70672e706e67, 'Active', 'NA', 'NA'),
(53, 'Atul Patil', '1003', 'AMOL BHULUGADE', '9146801807', 'TVS MOTOR COMPANY LTD/TVS APACHE RTR 160RD RG', 'MH50J2098', 'KARAD,MAHARASHTRA', '2019-03-01 18:01:14', 'Parking Offences', 'no parking', 'ogalewadi', 'imgonline-com-ua-resize-jVwQA5KpqE8ZAPPT.png', 0x45766964616e63652f696d676f6e6c696e652d636f6d2d75612d726573697a652d6a56775141354b707145385a415050542e706e67, 'Active', 'NA', 'NA'),
(54, 'Atul Patil', '1003', 'UMESH BHULUGADE', '9673414145', 'MARUTI SUZUKI INDIA LTD/SWIFT DEZIRE VXI BSIV', 'MH50A4854', 'KARAD,MAHARASHTRA', '2019-03-01 18:03:52', 'Pollution Offences', 'no puc', 'talmavale', 'wolf (Custom).jpg', 0x45766964616e63652f776f6c662028437573746f6d292e6a7067, 'Active', 'NA', 'NA'),
(55, 'Rudra Bhulugade', '2098', 'GANRAJ DOL', '8149483859', 'TVS MOTOR COMPANY LTD, TVS JUPITER ZX (BS IV)', 'MH50P8349', 'KARAD,MAHARASHTRA', '2019-03-07 18:16:28', 'Licence Offences', 'insurence expired', 'town hall', '030309_1709.jpg', 0x45766964616e63652f3033303330395f313730392e6a7067, 'Closed (admin)', '', '1101'),
(56, 'Avadhut Patil', '12345', 'UMESH BHULUGADE', '9673414145', 'MARUTI SUZUKI INDIA LTD/SWIFT DEZIRE VXI BSIV', 'MH50A4854', 'KARAD,MAHARASHTRA', '2019-03-07 18:20:10', 'Parking Offences', 'parked in no parking', 'ggm college karad', 'offence mark.jpg', 0x45766964616e63652f6f6666656e6365206d61726b2e6a7067, 'Closed (admin)', '20190307111212800110168124600306925', ''),
(57, 'Avadhut Patil', '12345', 'UMESH BHULUGADE', '9673414145', 'MARUTI SUZUKI INDIA LTD/SWIFT DEZIRE VXI BSIV', 'MH50A4854', 'KARAD,MAHARASHTRA', '2019-03-10 17:43:20', 'Driving Offences', 'fancy number plate', 'market yard karad', 'logo.jpg', 0x45766964616e63652f6c6f676f2e6a7067, 'Closed (admin)', '20190310111212800110168281900317192', ''),
(58, 'Atul Patil', '1003', 'AMOL BHULUGADE', '9146801807', 'TVS MOTOR COMPANY LTD/TVS APACHE RTR 160RD RG', 'MH50J2098', 'KARAD,MAHARASHTRA', '2019-03-10 17:52:02', 'Driving Offences', 'fancy number plate', 'natraj cinema', 'user.png', 0x45766964616e63652f757365722e706e67, 'Active', '', '1020'),
(59, 'Rudra Bhulugade', '2098', 'AMOL BHULUGADE', '9146801807', 'TVS MOTOR COMPANY LTD/TVS APACHE RTR 160RD RG', 'MH50J2098', 'KARAD,MAHARASHTRA', '2019-03-10 18:01:48', 'Licence Offences', 'licence expired', 'saidapur', 'shield-cross.png', 0x45766964616e63652f736869656c642d63726f73732e706e67, 'Closed (admin)', '', '1021');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `Owner` varchar(50) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Vehicle` varchar(50) NOT NULL,
  `Registration` varchar(30) NOT NULL,
  `Registration_Authority` varchar(30) NOT NULL,
  `Registration Date` varchar(10) NOT NULL,
  `Vehicle Class` varchar(20) NOT NULL,
  `Fuel Type` varchar(10) NOT NULL,
  `Chessis No.` varchar(30) NOT NULL,
  `Engine No.` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`Owner`, `Mobile`, `Vehicle`, `Registration`, `Registration_Authority`, `Registration Date`, `Vehicle Class`, `Fuel Type`, `Chessis No.`, `Engine No.`) VALUES
('GANAPATI PATIL', '7972222749', 'HYUNDAI MOTOR INDIA LTD / VERNA CRDI SX(O) 1.6 ', 'MH09DA6632', 'KOLHAPUR,MAHARASHTRA', '19/07/2014', 'MOTOR CAR(LMV)', 'DIESEL', 'MALCU41ULEM1****6', 'D4FBDU3****0'),
('UMESH BHULUGADE', '9673414145', 'MARUTI SUZUKI INDIA LTD/SWIFT DEZIRE VXI BSIV', 'MH50A4854', 'KARAD,MAHARASHTRA', '04/08/2015', 'MOTOR CAR(LMV)', 'PETROL', 'MA3EEJKD1S00786XXXXX', 'K12MN16XXXXX'),
('AMOL BHULUGADE', '9146801807', 'TVS MOTOR COMPANY LTD/TVS APACHE RTR 160RD RG', 'MH50J2098', 'KARAD,MAHARASHTRA', '21/06/2016', 'M-CYCLE/SCOOTER(2WN)', 'PETROL', 'MD634KE44B2DXXXXX', '0E4DG29XXXXX'),
('GANRAJ DOL', '8149483859', 'TVS MOTOR COMPANY LTD, TVS JUPITER ZX (BS IV)', 'MH50P8349', 'KARAD,MAHARASHTRA', '24/07/2018', 'M-CYCLE/SCOOTER', 'PETROL', 'MD626EG48J1FXXXXX', 'EG4FJ16XXXXX');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`Badge_n`);

--
-- Indexes for table `cop_details`
--
ALTER TABLE `cop_details`
  ADD PRIMARY KEY (`Badge`);

--
-- Indexes for table `offences`
--
ALTER TABLE `offences`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`Registration`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offences`
--
ALTER TABLE `offences`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
