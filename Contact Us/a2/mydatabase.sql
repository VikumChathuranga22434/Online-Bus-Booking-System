-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 04:41 PM
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
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `U_ID` char(10) DEFAULT NULL,
  `A_ID` char(10) NOT NULL,
  `Acc_Type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`U_ID`, `A_ID`, `Acc_Type`) VALUES
('UID000001', '000001', 'user'),
('UID000002', '000002', 'admin'),
('UID000003', '000003', 'admin'),
('UID000004', '000004', 'user'),
('UID000005', '000005', 'user'),
('UID000006', '000006', 'admin'),
('UID000007', '000007', 'user'),
('UID000008', '000008', 'admin'),
('UID000009', '000009', 'user'),
('UID000010', '000010', 'admin'),
('UID000011', '000011', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_ID` char(10) NOT NULL,
  `fulltime` int(11) DEFAULT NULL,
  `part_Time` int(11) DEFAULT NULL,
  `Working_Yrs` int(11) DEFAULT NULL,
  `bonus` decimal(18,2) DEFAULT NULL,
  `salary` decimal(18,2) DEFAULT NULL,
  `onsite` int(11) DEFAULT NULL,
  `remote` int(11) DEFAULT NULL,
  `hybrid` int(11) DEFAULT NULL,
  `U_ID` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_ID`, `fulltime`, `part_Time`, `Working_Yrs`, `bonus`, `salary`, `onsite`, `remote`, `hybrid`, `U_ID`) VALUES
('A0001', 1, 0, 15, 15000.00, 50000.00, 0, 0, 1, 'UID000002'),
('A0002', 0, 1, 5, 10000.00, 45000.00, 0, 1, 0, 'UID000003'),
('A0003', 1, 0, 1, 5000.00, 40000.00, 1, 0, 0, 'UID000006'),
('A0004', 0, 1, 3, 8000.00, 55000.00, 1, 0, 1, 'UID000008'),
('A0005', 1, 0, 2, 6000.00, 45000.00, 0, 1, 0, 'UID000010');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `B_No` char(10) NOT NULL,
  `number_plate` varchar(20) DEFAULT NULL,
  `main_Bus_Route` varchar(20) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`B_No`, `number_plate`, `main_Bus_Route`, `capacity`) VALUES
('00001', 'ND-4848', 'Colombo - Kandy', 54),
('00002', 'NB-7365', 'Colombo - Galle', 40),
('00003', 'NW-1234', 'Colombo - Jaffna', 50),
('00004', 'NA-5678', 'Colombo-Trincomalee', 45),
('00005', 'ND-9876', 'Colombo-Nuwara Eliya', 35),
('00006', 'NX-5432', 'Colombo-Anuradhapura', 60);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `C_ID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact number` int(11) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`C_ID`, `username`, `email`, `contact number`, `message`) VALUES
(1, 'BX123789', 'abc@gmail.com', 764649178, 'Bus available from Kandy to Jaffna?\r\n'),
(2, 'CX233445', 'def@gmail.com', 765678946, 'How to booking ticket online?');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `D_ID` char(10) NOT NULL,
  `D_Route` varchar(30) DEFAULT NULL,
  `D_Schedule` varchar(250) DEFAULT NULL,
  `License_No` varchar(10) DEFAULT NULL,
  `U_ID` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`D_ID`, `D_Route`, `D_Schedule`, `License_No`, `U_ID`) VALUES
('d10001', 'col-jaf', '(8.00am-5.00pm)', '1402523516', 'UID000001'),
('D10002', 'col-jaf', '(8.00am-5.00pm)', '1402523516', 'UID000002'),
('D10003', 'col-kandy', '(9.00am-6.00pm)', '1503523645', 'UID000003'),
('D10004', 'col-galle', '(10.00am-7.00pm)', '1604523789', 'UID000004'),
('D10005', 'col-neg', '(8.30am-5.30pm)', '1705523897', 'UID000005'),
('D10006', 'col-trinco', '(9.30am-6.30pm)', '1806523978', 'UID000006');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `M_ID` char(10) NOT NULL,
  `No_Of_TeamM` int(11) DEFAULT NULL,
  `U_ID` char(10) DEFAULT NULL,
  `A_ID` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`M_ID`, `No_Of_TeamM`, `U_ID`, `A_ID`) VALUES
('M0001', 5, 'UID000002', 'A0001'),
('M0002', 5, 'UID000006', 'A0003'),
('M0003', 5, 'UID000010', 'A0005');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `P_ID` char(10) NOT NULL,
  `P_TicketNo` int(11) DEFAULT NULL,
  `P_resSeatNo` int(11) DEFAULT NULL,
  `Boarding_St` varchar(30) DEFAULT NULL,
  `Des_station` varchar(30) DEFAULT NULL,
  `U_ID` char(10) DEFAULT NULL,
  `T_ID` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`P_ID`, `P_TicketNo`, `P_resSeatNo`, `Boarding_St`, `Des_station`, `U_ID`, `T_ID`) VALUES
('P001', 150, 1, 'Colombo', 'Jaffna', 'UID000001', 'T0000001'),
('P002', 151, 2, 'Kandy', 'Galle', 'UID000002', 'T0000002'),
('P003', 152, 3, 'Negombo', 'Trincomalee', 'UID000003', 'T0000003'),
('P004', 153, 4, 'Anuradhapura', 'Ella', 'UID000004', 'T0000004'),
('P005', 154, 5, 'Polonnaruwa', 'Sigiriya', 'UID000005', 'T0000005'),
('P006', 155, 6, 'Dambulla', 'Mirissa', 'UID000006', 'T0000006');

-- --------------------------------------------------------

--
-- Table structure for table `passengercontact`
--

CREATE TABLE `passengercontact` (
  `P_ID` char(10) NOT NULL,
  `contact_No` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passengercontact`
--

INSERT INTO `passengercontact` (`P_ID`, `contact_No`) VALUES
('P001', '0712545371'),
('P002', '0771234567'),
('P003', '0719876543'),
('P004', '0763456789'),
('P005', '0702345678'),
('P006', '0728765432');

-- --------------------------------------------------------

--
-- Table structure for table `passengeremail`
--

CREATE TABLE `passengeremail` (
  `P_ID` char(10) NOT NULL,
  `P_Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passengeremail`
--

INSERT INTO `passengeremail` (`P_ID`, `P_Email`) VALUES
('P001', 'amal123@gmail.com'),
('P002', 'john.doe@example.com'),
('P003', 'emilysmith@hotmail.com'),
('P004', 'mohamed.ali@gmail.com'),
('P005', 'sophia.johnson@yahoo.com'),
('P006', 'alex.wilson@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Pay_ID` char(10) NOT NULL,
  `Pay_type` varchar(20) DEFAULT NULL,
  `amount` decimal(18,2) DEFAULT NULL,
  `Paid_Time` time DEFAULT NULL,
  `T_No` char(10) DEFAULT NULL,
  `Pay_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Pay_ID`, `Pay_type`, `amount`, `Paid_Time`, `T_No`, `Pay_Date`) VALUES
('P001', 'online', 250.00, '08:15:00', 'T0000001', '2023-02-18'),
('P002', 'credit card', 300.00, '09:30:00', 'T0000002', '2023-02-19'),
('P003', 'cash', 200.00, '10:45:00', 'T0000003', '2023-02-20'),
('P004', 'debit card', 350.00, '11:55:00', 'T0000004', '2023-02-21'),
('P005', 'online', 400.00, '13:10:00', 'T0000005', '2023-02-22'),
('P006', 'cheque', 250.00, '14:25:00', 'T0000006', '2023-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `Route_No` varchar(10) NOT NULL,
  `R_Name` varchar(30) DEFAULT NULL,
  `S_Point` varchar(30) DEFAULT NULL,
  `destination` varchar(30) DEFAULT NULL,
  `distance` varchar(30) DEFAULT NULL,
  `Time_Duration` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`Route_No`, `R_Name`, `S_Point`, `destination`, `distance`, `Time_Duration`) VALUES
('1', 'Colombo - Kandy', 'colombo_fort', 'kandy', '116km', '03:00:00'),
('2', 'Colombo - Galle', 'colombo_fort', 'galle', '120km', '03:30:00'),
('3', 'Colombo - Jaffna', 'colombo_fort', 'jaffna', '400km', '08:00:00'),
('34', 'Colombo - Trincomalee', 'colombo_fort', 'trincomalee', '265km', '06:30:00'),
('36', 'Colombo - Anuradhapura', 'colombo_fort', 'anuradhapura', '200km', '05:00:00'),
('43', 'Colombo - Nuwara Eliya', 'colombo_fort', 'nuwara_eliya', '180km', '04:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Sch_ID` char(10) NOT NULL,
  `Sch_Date` date DEFAULT NULL,
  `D_Time` time DEFAULT NULL,
  `A_Time` time DEFAULT NULL,
  `frequency` int(11) DEFAULT NULL,
  `R_ID` varchar(10) DEFAULT NULL,
  `B_ID` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`Sch_ID`, `Sch_Date`, `D_Time`, `A_Time`, `frequency`, `R_ID`, `B_ID`) VALUES
('S0001', '2022-05-30', '05:00:00', '08:30:00', 4, '1', '00001'),
('S0002', '2022-06-02', '08:00:00', '12:30:00', 5, '2', '00002'),
('S0003', '2022-06-05', '10:30:00', '15:00:00', 6, '3', '00003'),
('S0004', '2022-06-08', '13:00:00', '17:30:00', 1, '34', '00004'),
('S0005', '2022-06-11', '15:30:00', '20:00:00', 2, '43', '00005'),
('S0006', '2022-06-14', '18:00:00', '22:30:00', 3, '36', '00006');

-- --------------------------------------------------------

--
-- Table structure for table `support_team_leader`
--

CREATE TABLE `support_team_leader` (
  `S_ID` char(10) NOT NULL,
  `tamil` int(11) DEFAULT NULL,
  `english` int(11) DEFAULT NULL,
  `M_ID` char(10) DEFAULT NULL,
  `No_Of_SteamM` int(11) DEFAULT NULL,
  `M_Name` varchar(30) DEFAULT NULL,
  `U_ID` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support_team_leader`
--

INSERT INTO `support_team_leader` (`S_ID`, `tamil`, `english`, `M_ID`, `No_Of_SteamM`, `M_Name`, `U_ID`) VALUES
('S0001', 0, 1, 'M0002', 3, 'Alex', 'UID000006'),
('S0002', 1, 0, 'M0003', 4, 'Michael', 'UID000010');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `T_ID` char(10) NOT NULL,
  `T_No` int(11) DEFAULT NULL,
  `T_price` decimal(18,2) DEFAULT NULL,
  `DOP` date DEFAULT NULL,
  `T_ExpireD` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`T_ID`, `T_No`, `T_price`, `DOP`, `T_ExpireD`) VALUES
('T0000001', 150, 250.00, '2023-02-18', '2023-02-19'),
('T0000002', 151, 300.00, '2023-02-19', '2023-02-20'),
('T0000003', 152, 200.00, '2023-02-20', '2023-02-21'),
('T0000004', 153, 350.00, '2023-02-21', '2023-02-22'),
('T0000005', 154, 400.00, '2023-02-22', '2023-02-23'),
('T0000006', 155, 250.00, '2023-02-23', '2023-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `ticketseatno`
--

CREATE TABLE `ticketseatno` (
  `T_ID` char(10) NOT NULL,
  `T_SeatNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticketseatno`
--

INSERT INTO `ticketseatno` (`T_ID`, `T_SeatNo`) VALUES
('T0000001', 1),
('T0000002', 2),
('T0000003', 3),
('T0000004', 4),
('T0000005', 5),
('T0000006', 6);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `U_ID` char(10) NOT NULL,
  `F_name` varchar(30) DEFAULT NULL,
  `L_name` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `V_ID` char(12) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `houseNo` char(10) DEFAULT NULL,
  `streetName` varchar(10) DEFAULT NULL,
  `postalCode` int(11) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `ticket_No` int(11) DEFAULT NULL,
  `B_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`U_ID`, `F_name`, `L_name`, `username`, `password`, `V_ID`, `DOB`, `houseNo`, `streetName`, `postalCode`, `city`, `country`, `ticket_No`, `B_date`) VALUES
('UID000001', 'Amal', 'Dissanayaka', 'Amal@123', 'casncvuwehvnwoeh', '200208013264', '2002-03-12', '123/E', '35666', 11700, 'Srilanka', 'Gampaha', 10000001, '2015-03-20'),
('UID000002', 'John', 'Doe', 'johndoe', 'password123', '200305097812', '1990-07-15', '456/A', 'MainStreet', 12345, 'New York', 'United States', 10000002, '2018-05-10'),
('UID000003', 'Emily', 'Smith', 'emilys', 'abc@123', '200412009877', '1985-12-20', '789/B', 'OakAvenue', 54321, 'Los Angeles', 'United States', 10000003, '2010-09-28'),
('UID000004', 'Mohamed', 'Ali', 'mohal786', 'securepass', '200210015678', '1992-06-05', '321/C', 'PalmStreet', 98765, 'Dubai', 'United Arab Emirates', 10000004, '2016-11-15'),
('UID000005', 'Sophia', 'Johnson', 'sophiaj', 'pass123word', '200109035432', '1988-04-02', '654/D', 'CedarRoad', 13579, 'London', 'United Kingdom', 10000005, '2014-07-23'),
('UID000006', 'Alex', 'Wilson', 'alexw', 'mysecretpass', '200408026789', '1995-10-18', '987/E', 'MapleLane', 24680, 'Toronto', 'Canada', 10000006, '2019-02-05'),
('UID000007', 'Sarah', 'Fernandez', 'sarahf', 'password123', '200510037891', '1992-07-25', '456/F', 'RoseAvenue', 12345, 'Colombo', 'Sri Lanka', 10000007, '2018-09-15'),
('UID000008', 'Mohammed', 'Rahman', 'mrahman', 'securepass', '200602048975', '1988-12-03', '789/G', 'PalmStreet', 67890, 'Galle', 'Sri Lanka', 10000008, '2017-05-10'),
('UID000009', 'Lakshmi', 'Perera', 'lakshmip', 'mypassword', '200701057893', '1990-04-15', '654/H', 'LotusLane', 54321, 'Kandy', 'Sri Lanka', 10000009, '2016-08-20'),
('UID000010', 'Michael', 'Silva', 'michaels', 'pass1234', '200804069871', '1994-09-08', '321/K', 'OrchidRoad', 98765, 'Toronto', 'Canada', 10000010, '2015-11-25'),
('UID000011', 'Anjali', 'Fernando', 'anjalia', 'secure123', '200903071234', '1996-06-12', '987/J', 'LilyLane', 56789, 'Negombo', 'Sri Lanka', 10000011, '2014-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `useremail`
--

CREATE TABLE `useremail` (
  `U_ID` char(10) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useremail`
--

INSERT INTO `useremail` (`U_ID`, `email`) VALUES
('UID000001', 'amal123@gmail.com'),
('UID000002', 'john.doe@example.com'),
('UID000003', 'emilysmith@hotmail.com'),
('UID000004', 'mohamed.ali@gmail.com'),
('UID000005', 'sophia.johnson@yahoo.com'),
('UID000006', 'alex.wilson@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `userphoneno`
--

CREATE TABLE `userphoneno` (
  `U_ID` char(10) NOT NULL,
  `phoneNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userphoneno`
--

INSERT INTO `userphoneno` (`U_ID`, `phoneNo`) VALUES
('UID000001', '0711011568'),
('UID000002', '0787654321'),
('UID000003', '0754321098'),
('UID000004', '0723456789'),
('UID000005', '0798765432'),
('UID000006', '0765432109');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `account_FK` (`U_ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `Admin_FK` (`U_ID`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`B_No`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`D_ID`),
  ADD KEY `Driver_FK` (`U_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`M_ID`),
  ADD KEY `Manager_FK` (`U_ID`),
  ADD KEY `Manager_FK1` (`A_ID`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `passenger_FK1` (`U_ID`),
  ADD KEY `passenger_FK2` (`T_ID`);

--
-- Indexes for table `passengercontact`
--
ALTER TABLE `passengercontact`
  ADD PRIMARY KEY (`P_ID`,`contact_No`);

--
-- Indexes for table `passengeremail`
--
ALTER TABLE `passengeremail`
  ADD PRIMARY KEY (`P_ID`,`P_Email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Pay_ID`),
  ADD KEY `payment_FK` (`T_No`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`Route_No`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`Sch_ID`),
  ADD KEY `schedule_FK` (`R_ID`),
  ADD KEY `schedule_FK1` (`B_ID`);

--
-- Indexes for table `support_team_leader`
--
ALTER TABLE `support_team_leader`
  ADD PRIMARY KEY (`S_ID`),
  ADD KEY `support_team_leader_FK` (`U_ID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`T_ID`);

--
-- Indexes for table `ticketseatno`
--
ALTER TABLE `ticketseatno`
  ADD PRIMARY KEY (`T_ID`,`T_SeatNo`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`U_ID`);

--
-- Indexes for table `useremail`
--
ALTER TABLE `useremail`
  ADD PRIMARY KEY (`U_ID`,`email`);

--
-- Indexes for table `userphoneno`
--
ALTER TABLE `userphoneno`
  ADD PRIMARY KEY (`U_ID`,`phoneNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_FK` FOREIGN KEY (`U_ID`) REFERENCES `userdetails` (`U_ID`);

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `Admin_FK` FOREIGN KEY (`U_ID`) REFERENCES `userdetails` (`U_ID`);

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `Driver_FK` FOREIGN KEY (`U_ID`) REFERENCES `userdetails` (`U_ID`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `Manager_FK` FOREIGN KEY (`U_ID`) REFERENCES `userdetails` (`U_ID`),
  ADD CONSTRAINT `Manager_FK1` FOREIGN KEY (`A_ID`) REFERENCES `admin` (`A_ID`);

--
-- Constraints for table `passenger`
--
ALTER TABLE `passenger`
  ADD CONSTRAINT `passenger_FK1` FOREIGN KEY (`U_ID`) REFERENCES `userdetails` (`U_ID`),
  ADD CONSTRAINT `passenger_FK2` FOREIGN KEY (`T_ID`) REFERENCES `ticket` (`T_ID`);

--
-- Constraints for table `passengercontact`
--
ALTER TABLE `passengercontact`
  ADD CONSTRAINT `passengerContact_FK` FOREIGN KEY (`P_ID`) REFERENCES `passenger` (`P_ID`);

--
-- Constraints for table `passengeremail`
--
ALTER TABLE `passengeremail`
  ADD CONSTRAINT `passengerEmail_FK` FOREIGN KEY (`P_ID`) REFERENCES `passenger` (`P_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_FK` FOREIGN KEY (`T_No`) REFERENCES `ticket` (`T_ID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_FK` FOREIGN KEY (`R_ID`) REFERENCES `route` (`Route_No`),
  ADD CONSTRAINT `schedule_FK1` FOREIGN KEY (`B_ID`) REFERENCES `buses` (`B_No`);

--
-- Constraints for table `support_team_leader`
--
ALTER TABLE `support_team_leader`
  ADD CONSTRAINT `support_team_leader_FK` FOREIGN KEY (`U_ID`) REFERENCES `userdetails` (`U_ID`);

--
-- Constraints for table `ticketseatno`
--
ALTER TABLE `ticketseatno`
  ADD CONSTRAINT `ticketSeatNo_FK` FOREIGN KEY (`T_ID`) REFERENCES `ticket` (`T_ID`);

--
-- Constraints for table `useremail`
--
ALTER TABLE `useremail`
  ADD CONSTRAINT `userEmail_FK` FOREIGN KEY (`U_ID`) REFERENCES `userdetails` (`U_ID`);

--
-- Constraints for table `userphoneno`
--
ALTER TABLE `userphoneno`
  ADD CONSTRAINT `userPhoneNo_FK` FOREIGN KEY (`U_ID`) REFERENCES `userdetails` (`U_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
