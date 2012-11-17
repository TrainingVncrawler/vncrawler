-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2012 at 03:05 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vncrawler`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `ID` varchar(250) NOT NULL DEFAULT '',
  `TenSach` varchar(250) NOT NULL,
  `Anhdaidien` longtext NOT NULL,
  `Tacgia` varchar(250) NOT NULL,
  `Theloai` varchar(250) NOT NULL,
  `Identifier` varchar(500) NOT NULL,
  `Sku` int(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ID`, `TenSach`, `Anhdaidien`, `Tacgia`, `Theloai`, `Identifier`, `Sku`) VALUES
('6OopYbZDKX4', 'Khám phá thế giới tâm linh', 'http://alezaa.com/ebooks/data/urn-uuid-bbe5fd1c-b144-487a-808e-02c22edd8a9a/Images/cover.jpg', 'Gary Zukav', '', 'urn:uuid:bbe5fd1c-b144-487a-808e-02c22edd8a9a', 981),
('wvMMFRUjF0r', 'Steve Jobs - Thiên tài kinh doanh và Câu chuyện thần kỳ về quả táo', 'http://alezaa.com/ebooks/data/urn-uuid-5aa0ab54-8de0-497f-b446-851fd3f728e5/Images/cover.jpg', 'Leander Kahney', '', 'urn:uuid:5aa0ab54-8de0-497f-b446-851fd3f728e5', 786),
('CMO45YQoaCG', 'Mật mã Tây Tạng 7', 'http://alezaa.com/ebooks/data/urn-uuid-2d44968e-5b78-49ef-8347-1e948566a378/Images/cover.jpg', 'Hà Mã', '', 'urn:uuid:2d44968e-5b78-49ef-8347-1e948566a378', 920),
('BHWaGEaQUuV', 'Đối thoại với cái tôi của tuổi trẻ', 'http://alezaa.com/ebooks/data/urn-uuid-c15a48a0-6195-4931-8ea3-09f3026d7326/Images/cover.jpg', ' TS. Huỳnh Văn Sơn (chủ biên)', 'book', 'urn:uuid:c15a48a0-6195-4931-8ea3-09f3026d7326', 2201),
('CkO4omH0Pfa', 'Khởi nghiệp thành công', 'http://alezaa.com/ebooks/data/urn-uuid-fd0c5d61-ec60-44d2-b01a-79cb8bb01308/Images/cover.jpg', 'Michael Morris', 'book', 'urn:uuid:fd0c5d61-ec60-44d2-b01a-79cb8bb01308', 2218),
('oTdF4kf97Uu', 'M&A thông minh', 'http://alezaa.com/ebooks/data/urn-uuid-cf5422e3-21ca-4cc3-9e0a-fac165eab828/Images/cover.jpg', 'Scott Moeller và Chris Brady', 'book', 'urn:uuid:cf5422e3-21ca-4cc3-9e0a-fac165eab828', 2192),
('jjdF4M9LUHu', 'Tây du @ ký', 'http://alezaa.com/ebooks/data/urn-uuid-51c5e5da-53ac-430d-b745-c064bbc7d4b7/Images/cover.jpg', 'Thành Quân Ức', 'book', 'urn:uuid:51c5e5da-53ac-430d-b745-c064bbc7d4b7', 2214),
('nGJG3zW3Iem', 'Sao tôi không hạnh phúc', 'http://alezaa.com/ebooks/data/urn-uuid-3c22c539-807c-4a24-8a7e-9a395ddac21f/Images/cover.jpg', 'Philip Van Munching, Bernie Katz', 'book', 'urn:uuid:3c22c539-807c-4a24-8a7e-9a395ddac21f', 2215),
('fKt3pNvRBOJ', 'Chinh phục đỉnh Phú Sĩ', 'http://alezaa.com/ebooks/data/urn-uuid-96f41b8a-85ac-461a-8a89-ad9e6b42c44b/Images/cover.jpg', 'Quách Đức Anh', 'book', 'urn:uuid:96f41b8a-85ac-461a-8a89-ad9e6b42c44b', 2219),
('0yrTQNrZkjQ', 'Sách của bố - Để trở thành người bố tuyệt vời', 'http://alezaa.com/ebooks/data/urn-uuid-832734f1-af5a-41c2-906d-848d9b2e1487/Images/cover.jpg', 'Michael Heatley', 'book', 'urn:uuid:832734f1-af5a-41c2-906d-848d9b2e1487', 2127),
('3hAxr77R9Iq', 'Ngôi đền giữa biển', 'http://alezaa.com/ebooks/data/urn-uuid-a785b528-e999-4633-911c-5e00e9bbf3a1/Images/cover.jpg', 'Truyện dân gian Việt Nam', 'comic', 'urn:uuid:a785b528-e999-4633-911c-5e00e9bbf3a1', 1309),
('r7opR8Bc58c', 'Nghêu sò ốc hến', 'http://alezaa.com/ebooks/data/urn-uuid-df7cc91d-60fb-445f-bda4-7c1c4c39ce31/Images/cover.jpg', 'Cổ tích Việt Nam', 'comic', 'urn:uuid:df7cc91d-60fb-445f-bda4-7c1c4c39ce31', 1277);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
