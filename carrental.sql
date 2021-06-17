-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 08:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars_info`
--

CREATE TABLE `cars_info` (
  `carId` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `seats` int(10) NOT NULL,
  `price` varchar(255) NOT NULL,
  `carimage` varchar(255) NOT NULL,
  `hired` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars_info`
--

INSERT INTO `cars_info` (`carId`, `name`, `model`, `seats`, `price`, `carimage`, `hired`) VALUES
(1, 'Tesla', 'gr 23', 2, '20000', '9aca795ead468089e873fc6a5334a1b0.png', 1),
(2, 'Lamborghini', 'forsennato', 2, '10000000', '89068db7664bf0143b62208c79d3afb7.png', 1),
(3, 'gt mn 2', 'Tesla', 4, '20000', '184328f502110d11a52f04af03f93d38.png', 0),
(4, 'anonymous 23', 'lamborghini', 2, '2000000', '5e2d46fac9f3289a7fc7c5ccb2912508.png', 0),
(5, 'Common y2x', 'jeep wrangler', 4, '20000000', '4006f8d35995de2a79c4966604361068.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `districtName` varchar(50) NOT NULL,
  `districtId` int(11) NOT NULL,
  `provinceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`districtName`, `districtId`, `provinceId`) VALUES
('Nyarugenge', 101, 1),
('Gasabo', 102, 1),
('Kicukiro', 103, 1),
('Nyanza', 201, 2),
('Gisagara', 202, 2),
('Nyaruguru', 203, 2),
('Huye', 204, 2),
('Nyamagabe', 205, 2),
('Ruhango', 206, 2),
('Muhanga', 207, 2),
('Kamonyi', 208, 2),
('Karongi', 301, 3),
('Rutsiro', 302, 3),
('Rubavu', 303, 3),
('Nyabihu', 304, 3),
('Ngororero', 305, 3),
('Rusizi', 306, 3),
('Nyamasheke', 307, 3),
('Rulindo', 401, 4),
('Gakenke', 402, 4),
('Musanze', 403, 4),
('Burera', 404, 4),
('Gicumbi', 405, 4),
('Rwamagana', 501, 5),
('Nyagatare', 502, 5),
('Gatsibo', 503, 5),
('Kayonza', 504, 5),
('Kirehe', 505, 5),
('Ngoma', 506, 5),
('Bugesera', 507, 5);

-- --------------------------------------------------------

--
-- Table structure for table `hiredcars`
--

CREATE TABLE `hiredcars` (
  `carId` int(10) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `hiretime` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiredcars`
--

INSERT INTO `hiredcars` (`carId`, `useremail`, `hiretime`) VALUES
(2, 'singizwanick19@gmail.com', '2021-06-15 19:02:01.576471'),
(1, 'singizwanick19@gmail.com', '2021-06-15 20:50:45.410058');

-- --------------------------------------------------------

--
-- Table structure for table `passwordresets`
--

CREATE TABLE `passwordresets` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `expires` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `provinceId` int(11) NOT NULL,
  `provinceName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`provinceId`, `provinceName`) VALUES
(1, 'KIGALI'),
(2, 'SOUTHERN'),
(3, 'WESTERN'),
(4, 'NORTHERN'),
(5, 'EASTERN');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `roleName`) VALUES
(1, 'Administrator'),
(2, 'standard user');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `sectorId` int(11) NOT NULL,
  `sectorName` varchar(300) NOT NULL,
  `districtId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`sectorId`, `sectorName`, `districtId`) VALUES
(10101, 'Gitega', 101),
(10102, 'Kanyinya', 101),
(10103, 'Kigali', 101),
(10104, 'Kimisagara', 101),
(10105, 'Mageragere', 101),
(10106, 'Muhima', 101),
(10107, 'Nyakabanda', 101),
(10108, 'Nyamirambo', 101),
(10109, 'Nyarugenge', 101),
(10110, 'Rwezamenyo', 101),
(10201, 'Bumbogo', 102),
(10202, 'Gatsata', 102),
(10203, 'Gikomero', 102),
(10204, 'Gisozi', 102),
(10205, 'Jabana', 102),
(10206, 'Jali', 102),
(10207, 'Kacyiru', 102),
(10208, 'Kimihurura', 102),
(10209, 'Kimironko', 102),
(10210, 'Kinyinya', 102),
(10211, 'Ndera', 102),
(10212, 'Nduba', 102),
(10213, 'Remera', 102),
(10214, 'Rusororo', 102),
(10215, 'Rutunga', 102),
(10301, 'Gahanga', 103),
(10302, 'Gatenga', 103),
(10303, 'Gikondo', 103),
(10304, 'Kagarama', 103),
(10305, 'Kanombe', 103),
(10306, 'Kicukiro', 103),
(10307, 'Kigarama', 103),
(10308, 'Masaka', 103),
(10309, 'Niboye', 103),
(10310, 'Nyarugunga', 103),
(20101, 'Busasamana', 201),
(20102, 'Busoro', 201),
(20103, 'Cyabakamyi', 201),
(20104, 'Kibilizi', 201),
(20105, 'Kigoma', 201),
(20106, 'Mukingo', 201),
(20107, 'Muyira', 201),
(20108, 'Ntyazo', 201),
(20109, 'Nyagisozi', 201),
(20110, 'Rwabicuma', 201),
(20201, 'Gikonko', 202),
(20202, 'Gishubi', 202),
(20203, 'Kansi', 202),
(20204, 'Kibirizi', 202),
(20205, 'Kigembe', 202),
(20206, 'Mamba', 202),
(20207, 'Muganza', 202),
(20208, 'Mugombwa', 202),
(20209, 'Mukindo', 202),
(20210, 'Musha', 202),
(20211, 'Ndora', 202),
(20212, 'Nyanza', 202),
(20213, 'Save', 202),
(20301, 'Busanze', 203),
(20302, 'Cyahinda', 203),
(20303, 'Kibeho', 203),
(20304, 'Kivu', 203),
(20305, 'Mata', 203),
(20306, 'Muganza', 203),
(20307, 'Munini', 203),
(20308, 'Ngera', 203),
(20309, 'Ngoma', 203),
(20310, 'Nyabimata', 203),
(20311, 'Nyagisozi', 203),
(20312, 'Ruheru', 203),
(20313, 'Ruramba', 203),
(20314, 'Rusenge', 203),
(20401, 'Gishamvu', 204),
(20402, 'Huye', 204),
(20403, 'Karama', 204),
(20404, 'Kigoma', 204),
(20405, 'Kinazi', 204),
(20406, 'Maraba', 204),
(20407, 'Mbazi', 204),
(20408, 'Mukura', 204),
(20409, 'Ngoma', 204),
(20410, 'Ruhashya', 204),
(20411, 'Rusatira', 204),
(20412, 'Rwaniro', 204),
(20413, 'Simbi', 204),
(20414, 'Tumba', 204),
(20501, 'Buruhukiro', 205),
(20502, 'Cyanika', 205),
(20503, 'Gasaka', 205),
(20504, 'Gatare', 205),
(20505, 'Kaduha', 205),
(20506, 'Kamegeri', 205),
(20507, 'Kibirizi', 205),
(20508, 'Kibumbwe', 205),
(20509, 'Kitabi', 205),
(20510, 'Mbazi', 205),
(20511, 'Mugano', 205),
(20512, 'Musange', 205),
(20513, 'Musebeya', 205),
(20514, 'Mushubi', 205),
(20515, 'Nkomane', 205),
(20516, 'Tare', 205),
(20517, 'Uwinkingi', 205),
(20601, 'Bweramana', 206),
(20602, 'Byimana', 206),
(20603, 'Kabagali', 206),
(20604, 'Kinazi', 206),
(20605, 'Kinihira', 206),
(20606, 'Mbuye', 206),
(20607, 'Mwendo', 206),
(20608, 'Ntongwe', 206),
(20609, 'Ruhango', 206),
(20701, 'Cyeza', 207),
(20702, 'Kabacuzi', 207),
(20703, 'Kibangu', 207),
(20704, 'Kiyumba', 207),
(20705, 'Muhanga', 207),
(20706, 'Mushishiro', 207),
(20707, 'Nyabinoni', 207),
(20708, 'Nyamabuye', 207),
(20709, 'Nyarusange', 207),
(20710, 'Rongi', 207),
(20711, 'Rugendabari', 207),
(20712, 'Shyogwe', 207),
(20801, 'Gacurabwenge', 208),
(20802, 'Karama', 208),
(20803, 'Kayenzi', 208),
(20804, 'Kayumbu', 208),
(20805, 'Mugina', 208),
(20806, 'Musambira', 208),
(20807, 'Ngamba', 208),
(20808, 'Nyamiyaga', 208),
(20809, 'Nyarubaka', 208),
(20810, 'Rugarika', 208),
(20811, 'Rukoma', 208),
(20812, 'Runda', 208),
(30101, 'Bwishyura', 301),
(30102, 'Gashari', 301),
(30103, 'Gishyita', 301),
(30104, 'Gitesi', 301),
(30105, 'Mubuga', 301),
(30106, 'Murambi', 301),
(30107, 'Murundi', 301),
(30108, 'Mutuntu', 301),
(30109, 'Rubengera', 301),
(30110, 'Rugabano', 301),
(30111, 'Ruganda', 301),
(30112, 'Rwankuba', 301),
(30113, 'Twumba', 301),
(30201, 'Boneza', 302),
(30202, 'Gihango', 302),
(30203, 'Kigeyo', 302),
(30204, 'Kivumu', 302),
(30205, 'Manihira', 302),
(30206, 'Mukura', 302),
(30207, 'Murunda', 302),
(30208, 'Musasa', 302),
(30209, 'Mushonyi', 302),
(30210, 'Mushubati', 302),
(30211, 'Nyabirasi', 302),
(30212, 'Ruhango', 302),
(30213, 'Rusebeya', 302),
(30301, 'Bugeshi', 303),
(30302, 'Busasamana', 303),
(30303, 'Cyanzarwe', 303),
(30304, 'Gisenyi', 303),
(30305, 'Kanama', 303),
(30306, 'Kanzenze', 303),
(30307, 'Mudende', 303),
(30308, 'Nyakiriba', 303),
(30309, 'Nyamyumba', 303),
(30310, 'Nyundo', 303),
(30311, 'Rubavu', 303),
(30312, 'Rugerero', 303),
(30401, 'Bigogwe', 304),
(30402, 'Jenda', 304),
(30403, 'Jomba', 304),
(30404, 'Kabatwa', 304),
(30405, 'Karago', 304),
(30406, 'Kintobo', 304),
(30407, 'Mukamira', 304),
(30408, 'Muringa', 304),
(30409, 'Rambura', 304),
(30410, 'Rugera', 304),
(30411, 'Rurembo', 304),
(30412, 'Shyira', 304),
(30501, 'BWIRA', 305),
(30502, 'GATUMBA', 305),
(30503, 'HINDIRO', 305),
(30504, 'KABAYA', 305),
(30505, 'KAGEYO', 305),
(30506, 'KAVUMU', 305),
(30507, 'MATYAZO', 305),
(30508, 'MUHANDA', 305),
(30509, 'MUHORORO', 305),
(30510, 'NDARO', 305),
(30511, 'NGORORERO', 305),
(30512, 'NYANGE', 305),
(30513, 'SOVU', 305),
(30601, 'Bugarama', 306),
(30602, 'Butare', 306),
(30603, 'Bweyeye', 306),
(30604, 'Gashonga', 306),
(30605, 'Giheke', 306),
(30606, 'Gihundwe', 306),
(30607, 'Gikundamvura', 306),
(30608, 'Gitambi', 306),
(30609, 'Kamembe', 306),
(30610, 'Muganza', 306),
(30611, 'Mururu', 306),
(30612, 'Nkanka', 306),
(30613, 'Nkombo', 306),
(30614, 'Nkungu', 306),
(30615, 'Nyakabuye', 306),
(30616, 'Nyakarenzo', 306),
(30617, 'Nzahaha', 306),
(30618, 'Rwimbogo', 306),
(30701, 'Bushekeri', 307),
(30702, 'Bushenge', 307),
(30703, 'Cyato', 307),
(30704, 'Gihombo', 307),
(30705, 'Kagano', 307),
(30706, 'Kanjongo', 307),
(30707, 'Karambi', 307),
(30708, 'Karengera', 307),
(30709, 'Kirimbi', 307),
(30710, 'Macuba', 307),
(30711, 'Mahembe', 307),
(30712, 'Nyabitekeri', 307),
(30713, 'Rangiro', 307),
(30714, 'Ruharambuga', 307),
(30715, 'Shangi', 307),
(40101, 'BASE', 401),
(40102, 'BUREGA', 401),
(40103, 'BUSHOKI', 401),
(40104, 'BUYOGA', 401),
(40105, 'CYINZUZI', 401),
(40106, 'CYUNGO', 401),
(40107, 'KINIHIRA', 401),
(40108, 'KISARO', 401),
(40109, 'MASORO', 401),
(40110, 'MBOGO', 401),
(40111, 'MURAMBI', 401),
(40112, 'NGOMA', 401),
(40113, 'NTARABANA', 401),
(40114, 'RUKOZO', 401),
(40115, 'RUSIGA', 401),
(40116, 'SHYORONGI', 401),
(40117, 'TUMBA', 401),
(40201, 'Busengo', 402),
(40202, 'Coko', 402),
(40203, 'Cyabingo', 402),
(40204, 'Gakenke', 402),
(40205, 'Gashenyi', 402),
(40206, 'Janja', 402),
(40207, 'Kamubuga', 402),
(40208, 'Karambo', 402),
(40209, 'Kivuruga', 402),
(40210, 'Mataba', 402),
(40211, 'Minazi', 402),
(40212, 'Mugunga', 402),
(40213, 'Muhondo', 402),
(40214, 'Muyongwe', 402),
(40215, 'Muzo', 402),
(40216, 'Nemba', 402),
(40217, 'Ruli', 402),
(40218, 'Rusasa', 402),
(40219, 'Rushashi', 402),
(40301, 'Busogo', 403),
(40302, 'Cyuve', 403),
(40303, 'Gacaca', 403),
(40304, 'Gashaki', 403),
(40305, 'Gataraga', 403),
(40306, 'Kimonyi', 403),
(40307, 'Kinigi', 403),
(40308, 'Muhoza', 403),
(40309, 'Muko', 403),
(40310, 'Musanze', 403),
(40311, 'Nkotsi', 403),
(40312, 'Nyange', 403),
(40313, 'Remera', 403),
(40314, 'Rwaza', 403),
(40315, 'Shingiro', 403),
(40401, 'Bungwe', 404),
(40402, 'Butaro', 404),
(40403, 'Cyanika', 404),
(40404, 'Cyeru', 404),
(40405, 'Gahunga', 404),
(40406, 'Gatebe', 404),
(40407, 'Gitovu', 404),
(40408, 'Kagogo', 404),
(40409, 'Kinoni', 404),
(40410, 'Kinyababa', 404),
(40411, 'Kivuye', 404),
(40412, 'Nemba', 404),
(40413, 'Rugarama', 404),
(40414, 'Rugengabari', 404),
(40415, 'Ruhunde', 404),
(40416, 'Rusarabuye', 404),
(40417, 'Rwerere', 404),
(40501, 'Bukure', 405),
(40502, 'Bwisige', 405),
(40503, 'Byumba', 405),
(40504, 'Cyumba', 405),
(40505, 'Giti', 405),
(40506, 'Kageyo', 405),
(40507, 'Kaniga', 405),
(40508, 'Manyagiro', 405),
(40509, 'Miyove', 405),
(40510, 'Mukarange', 405),
(40511, 'Muko', 405),
(40512, 'Mutete', 405),
(40513, 'Nyamiyaga', 405),
(40514, 'Nyankenke', 405),
(40515, 'Rubaya', 405),
(40516, 'Rukomo', 405),
(40517, 'Rushaki', 405),
(40518, 'Rutare', 405),
(40519, 'Ruvune', 405),
(40520, 'Rwamiko', 405),
(40521, 'Shangasha', 405),
(50101, 'Fumbwe', 501),
(50102, 'Gahengeri', 501),
(50103, 'Gishali', 501),
(50104, 'Karenge', 501),
(50105, 'Kigabiro', 501),
(50106, 'Muhazi', 501),
(50107, 'Munyaga', 501),
(50108, 'Munyiginya', 501),
(50109, 'Musha', 501),
(50110, 'Muyumbu', 501),
(50111, 'Mwulire', 501),
(50112, 'Nyakaliro', 501),
(50113, 'Nzige', 501),
(50114, 'Rubona', 501),
(50201, 'GATUNDA', 502),
(50202, 'KARAMA', 502),
(50203, 'KARANGAZI', 502),
(50204, 'KATABAGEMU', 502),
(50205, 'KIYOMBE', 502),
(50206, 'MATIMBA', 502),
(50207, 'MIMURI', 502),
(50208, 'MUKAMA', 502),
(50209, 'MUSHERI', 502),
(50210, 'NYAGATARE', 502),
(50211, 'RUKOMO', 502),
(50212, 'RWEMPASHA', 502),
(50213, 'RWIMIYAGA', 502),
(50214, 'TABAGWE', 502),
(50301, 'Gasange', 503),
(50302, 'Gatsibo', 503),
(50303, 'Gitoki', 503),
(50304, 'Kabarore', 503),
(50305, 'Kageyo', 503),
(50306, 'Kiramuruzi', 503),
(50307, 'Kiziguro', 503),
(50308, 'Muhura', 503),
(50309, 'Murambi', 503),
(50310, 'Ngarama', 503),
(50311, 'Nyagihanga', 503),
(50312, 'Remera', 503),
(50313, 'Rugarama', 503),
(50314, 'Rwimbogo', 503),
(50401, 'Gahini', 504),
(50402, 'Kabare', 504),
(50403, 'Kabarondo', 504),
(50404, 'Mukarange', 504),
(50405, 'Murama', 504),
(50406, 'Murundi', 504),
(50407, 'Mwiri', 504),
(50408, 'Ndego', 504),
(50409, 'Nyamirama', 504),
(50410, 'Rukara', 504),
(50411, 'Ruramira', 504),
(50412, 'Rwinkwavu', 504),
(50501, 'Gahara', 505),
(50502, 'Gatore', 505),
(50503, 'Kigarama', 505),
(50504, 'Kigina', 505),
(50505, 'Kirehe', 505),
(50506, 'Mahama', 505),
(50507, 'Mpanga', 505),
(50508, 'Musaza', 505),
(50509, 'Mushikiri', 505),
(50510, 'Nasho', 505),
(50511, 'Nyamugari', 505),
(50512, 'Nyarubuye', 505),
(50601, 'Gashanda', 506),
(50602, 'Jarama', 506),
(50603, 'Karembo', 506),
(50604, 'Kazo', 506),
(50605, 'Kibungo', 506),
(50606, 'Mugesera', 506),
(50607, 'Murama', 506),
(50608, 'Mutenderi', 506),
(50609, 'Remera', 506),
(50610, 'Rukira', 506),
(50611, 'Rukumberi', 506),
(50612, 'Rurenge', 506),
(50613, 'Sake', 506),
(50614, 'Zaza', 506),
(50701, 'Gashora', 507),
(50702, 'Juru', 507),
(50703, 'Kamabuye', 507),
(50704, 'Mareba', 507),
(50705, 'Mayange', 507),
(50706, 'Musenyi', 507),
(50707, 'Mwogo', 507),
(50708, 'Ngeruka', 507),
(50709, 'Ntarama', 507),
(50710, 'Nyamata', 507),
(50711, 'Nyarugenge', 507),
(50712, 'Ririma', 507),
(50713, 'Ruhuha', 507),
(50714, 'Rweru', 507),
(50715, 'Shyara', 507);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(240) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `username` varchar(35) NOT NULL,
  `userId` int(11) NOT NULL,
  `roleId` int(11) DEFAULT 2,
  `districtId` int(11) NOT NULL,
  `sectorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `phone`, `password`, `username`, `userId`, `roleId`, `districtId`, `sectorId`) VALUES
('NickS', 'singizwanick19@gmail.com', '0788888888', 'cc2c68b6e4c7d25c1066e33d7e0ea1861fd1d7083a7e26912f09170e84904f84508cd6eb9e4e2cae20e5e454c273bf4947cfe56e1398a9269105580c3ee78313', 'nicks', 1, 1, 207, 20708);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars_info`
--
ALTER TABLE `cars_info`
  ADD PRIMARY KEY (`carId`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`districtId`),
  ADD KEY `provinceId` (`provinceId`);

--
-- Indexes for table `passwordresets`
--
ALTER TABLE `passwordresets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`provinceId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`sectorId`),
  ADD KEY `districtId` (`districtId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `roleId` (`roleId`),
  ADD KEY `districtId` (`districtId`),
  ADD KEY `sectorId` (`sectorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars_info`
--
ALTER TABLE `cars_info`
  MODIFY `carId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `passwordresets`
--
ALTER TABLE `passwordresets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`provinceId`) REFERENCES `provinces` (`provinceId`);

--
-- Constraints for table `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `sectors_ibfk_1` FOREIGN KEY (`districtId`) REFERENCES `districts` (`districtId`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `roles` (`roleId`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`districtId`) REFERENCES `districts` (`districtId`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`sectorId`) REFERENCES `sectors` (`sectorId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
