-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2023 at 07:09 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksiegarnia`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `BookID` varchar(50) NOT NULL,
  `BookTitle` varchar(200) DEFAULT NULL,
  `ISBN` varchar(20) DEFAULT NULL,
  `Price` double(12,2) DEFAULT NULL,
  `Author` varchar(128) DEFAULT NULL,
  `Type` varchar(128) DEFAULT NULL,
  `Image` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`BookID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `BookTitle`, `ISBN`, `Price`, `Author`, `Type`, `Image`) VALUES
('B-001', 'Czysty kod. Podręcznik dobrego programisty', '123-456-789-1', 120.00, 'Robert C. Martin', 'Informatyka', 'image/inf1.jpg'),
('B-002', 'HTML i CSS. Zaprojektuj i zbuduj witrynę WWW. Podręcznik Front-End Developera', '123-456-789-2', 102.00, 'Jon Duckett', 'Informatyka', 'image/inf2.jpg'),
('B-003', 'Oficjalna biblioteka przewodnika certyfikacyjnego CCNA Routing i Switching 200-125', '123-456-789-3', 140.00, 'Cisco Press ', 'Technologia', 'image/technologyd.jpg'),
('B-004', 'Python. Wprowadzenie. Wydanie V', '123-456-789-4', 200.60, 'Mark Lutz', 'Informatyka', 'image/inf3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `CartID` int NOT NULL AUTO_INCREMENT,
  `CustomerID` int DEFAULT NULL,
  `BookID` varchar(50) DEFAULT NULL,
  `Price` double(12,2) DEFAULT NULL,
  `Quantity` int DEFAULT NULL,
  `TotalPrice` double(12,2) DEFAULT NULL,
  PRIMARY KEY (`CartID`),
  KEY `BookID` (`BookID`),
  KEY `CustomerID` (`CustomerID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` int NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(128) DEFAULT NULL,
  `CustomerPhone` varchar(12) DEFAULT NULL,
  `CustomerIC` varchar(14) DEFAULT NULL,
  `CustomerEmail` varchar(200) DEFAULT NULL,
  `CustomerAddress` varchar(200) DEFAULT NULL,
  `CustomerGender` varchar(10) DEFAULT NULL,
  `UserID` int DEFAULT NULL,
  PRIMARY KEY (`CustomerID`),
  KEY `UserID` (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `CustomerPhone`, `CustomerIC`, `CustomerEmail`, `CustomerAddress`, `CustomerGender`, `UserID`) VALUES
(1, 'sdfsdf', '123123123', '123456232333', 'pawel@gmail.com', 'dsfdsf', 'Mężczyzna', 1),
(2, 'wqeqwe', '3123212345', '412-24232-1231', 'pawel@gmail.com', '2/1', 'Kobieta', 2),
(3, 'asdsad', '3123212345', '412-24232-1231', 'asdsad@gmail.com', 'asdsad', 'Mężczyzna', 3);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `OrderID` int NOT NULL AUTO_INCREMENT,
  `CustomerID` int DEFAULT NULL,
  `BookID` varchar(50) DEFAULT NULL,
  `DatePurchase` datetime DEFAULT NULL,
  `Quantity` int DEFAULT NULL,
  `TotalPrice` double(12,2) DEFAULT NULL,
  `Status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `BookID` (`BookID`),
  KEY `CustomerID` (`CustomerID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderID`, `CustomerID`, `BookID`, `DatePurchase`, `Quantity`, `TotalPrice`, `Status`) VALUES
(1, 1, 'B-001', '2023-04-05 04:05:39', 1, 120.00, 'y'),


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `UserName` varchar(128) DEFAULT NULL,
  `Password` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`) VALUES
(1, 'sdfsdf', 'sdfsdf'),
(2, 'wqeqwe', 'wqeqwe'),
(3, 'asdsad', 'asdsad');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
