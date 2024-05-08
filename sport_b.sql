-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 12:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport_b`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_cus` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `address` text DEFAULT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cus`, `name`, `username`, `password`, `email`, `tel`, `address`, `type`) VALUES
(1, 'เก', 'game123', '87654321', 'kittiwat.mee@rmutto.ac.th', '0949642756', 'กิตติวัฒน์ผ้าม่าน 111/18 ม.1 ถ.ชัยพรวิธี เมืองพัทยา อำเภอบางละมุง ชลบุรี 20150', 'customer'),
(2, 'testcus', 'cus1', 'cus1', 'c@gmail.com', '0987827325', '', 'customer'),
(16, 'Wuttichai Maneemongkol', 'Ball2499', '12345678', 'ball2B@gmail.com', '0876543217', '', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id_emp` int(11) NOT NULL,
  `username` varchar(24) DEFAULT NULL,
  `password` varchar(24) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` varchar(24) NOT NULL,
  `status` varchar(24) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id_emp`, `username`, `password`, `name`, `tel`, `email`, `type`, `status`, `address`) VALUES
(1, 'tanapol', '12345', 'Tanapol Mahom', '0966903914', 'tanapol.mah@rmutto.ac.th', 'admin', 'working', 'Bangphra Sport & Store'),
(2, 'kotji', 'kotji', 'Nattawat Imthong', '0980939604', 'nattawat.imt@rmutto.ac.th', 'employee', 'working', '206 ม.8 ต.สองคลอง อ.บางปะกง จ.ฉะเชิงเทรา 24130'),
(3, 'tester', 'testtest', 'Test', '0999988822', 'tes@gmail.com', 'employee', 'working', 'sdasda'),
(4, 'nattawat', 'imthong123', 'kotji', '0976432541', 'jasidujasiu@gmail.com', 'employee', 'working', ''),
(5, 'nattawat123', 'qwertyuio', 'kotji', '0976432541', 'jasidujasiu@gmail.com', 'employee', 'working', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `product` text NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `note` text NOT NULL,
  `order_status` varchar(25) NOT NULL,
  `address_ship` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `type_payment` varchar(25) NOT NULL,
  `payment_doc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_cus`, `product`, `price`, `total_price`, `note`, `order_status`, `address_ship`, `contact`, `order_date`, `type_payment`, `payment_doc`) VALUES
(6, 1, 'FBT ไม้แบดมินตัน (คู่) (1)', 0, 290, '', 'Success', 'กิตติวัฒน์ผ้าม่าน 111/18 ม.1 ถ.ชัยพรวิธี เมืองพัทยา อำเภอบางละมุง ชลบุรี 20150', '0949642756', '2024-05-01 00:38:14', 'Cash', ''),
(7, 1, 'FBT ถุงมือประตูโกว์ฟุตบอล (2 ชิ้น)', 0, 450, 'ว้าวๆ ', 'Success', 'กิตติวัฒน์ผ้าม่าน 111/18 ม.1 ถ.ชัยพรวิธี เมืองพัทยา อำเภอบางละมุง ชลบุรี 20150', '0949642756', '2024-05-01 00:41:42', 'Cash', ''),
(8, 1, 'NEW STAR ลูกฟุตบอล หนังอัด (2 ชิ้น)', 0, 478, '', 'Success', 'กิตติวัฒน์ผ้าม่าน 111/18 ม.1 ถ.ชัยพรวิธี เมืองพัทยา อำเภอบางละมุง ชลบุรี 20150', '0949642756', '2024-05-01 00:42:56', 'Cash', ''),
(9, 1, 'SUPER STAR ฟุตซอล ซุปเปอร์สตาร์ (2 ชิ้น)', 0, 810, '', 'Success', 'กิตติวัฒน์ผ้าม่าน 111/18 ม.1 ถ.ชัยพรวิธี เมืองพัทยา อำเภอบางละมุง ชลบุรี 20150', '0949642756', '2024-05-01 00:46:56', 'transfer money', 'slip/66321609a07df_420507944_788959489802346_5450706599034602964_n.jpg'),
(10, 1, 'กางเกงวิ่งขาสั้นผู้ชาย (1 ชิ้น)', 0, 395, '', 'Success', 'กิตติวัฒน์ผ้าม่าน 111/18 ม.1 ถ.ชัยพรวิธี เมืองพัทยา อำเภอบางละมุง ชลบุรี 20150', '0949642756', '2024-05-01 00:50:21', 'transfer money', 'slip/transfer.jpg'),
(11, 1, 'FBT เสื้อโปโล (1 ชิ้น)', 0, 250, '', 'Success', 'กิตติวัฒน์ผ้าม่าน 111/18 ม.1 ถ.ชัยพรวิธี เมืองพัทยา อำเภอบางละมุง ชลบุรี 20150', '0949642756', '2024-05-01 01:12:53', 'Cash', ''),
(13, 1, 'FBT ถุงมือประตูโกว์ฟุตบอล (1 ชิ้น)', 225, 225, '', 'Waiting to check', 'กิตติวัฒน์ผ้าม่าน 111/18 ม.1 ถ.ชัยพรวิธี เมืองพัทยา อำเภอบางละมุง ชลบุรี 20150', '0949642756', '2024-05-03 22:05:35', 'Cash', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_pro` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descript` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `size_s` varchar(25) NOT NULL,
  `size_m` varchar(25) NOT NULL,
  `size_l` varchar(25) NOT NULL,
  `size_xl` varchar(25) NOT NULL,
  `size_2xl` varchar(25) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_pro`, `name`, `descript`, `category`, `type`, `brand`, `price`, `size_s`, `size_m`, `size_l`, `size_xl`, `size_2xl`, `img`, `status`, `created_date`, `updated_date`) VALUES
(1, 'NEW STAR ลูกฟุตบอล หนังอัด', 'NEW STAR ฟุตบอล นิวสตาร์ หนังอัด No.5 31372<br>ยี่ห้อ: NEW STAR<br>รหัส: 31372<br>วัสดุ: ผลิตจากหนังอัด PU คุณภาพสูง<br>ขนาด: 3-5<br>น้ำหนัก: 410-450กรัม<br>', 'Tools', 'Football', 'FBT', 239, 'เบอร์ 3', 'เบอร์ 4', 'เบอร์ 5', '0', '0', 'img\\FBT-ball.png', 'Out of Stock', '2024-04-12 11:38:05', '2024-05-08 17:35:36'),
(2, 'FBT ถุงมือประตูโกว์ฟุตบอล', 'FBT ถุงมือประตูโกว์ฟุตบอล รหัส 41336<br>-สินค้าลิขสิทธิ์แท้จาก FBT<br>-ผลิตจากวัสดุคุณภาพดี หนังดี ยางหนึบ<br>-ทนทาน ลายสวย<br> -ใส่แล้วกระชับมือ', 'Tools', 'G.Gloves', 'FBT', 225, 'เบอร์ 7 ', 'เบอร์ 8', 'เบอร์ 9', 'เบอร์ 10', 'เบอร์ 11', 'img/FBT-Glove.png', 'Ready to Sale', '2024-04-22 11:26:22', '2024-04-22 11:26:22'),
(3, 'FBT เสื้อโปโล', '', 'Shirt', 'Shirt', 'FBT', 250, 'S', 'M', 'L', 'XL', '2XL', 'img/FBT-polo.png', 'Ready to Sale', '2024-04-22 18:33:47', '2024-05-06 21:23:44'),
(4, 'FBT ไม้แบดมินตัน (คู่)', 'FBT ไม้แบดมินตัน FBT CLUB SPORTชุด 2ไม้ 51395\r\nไม้แบดขึ้นเอ็นพร้อมใช้งาน แถมปลอกครอบหัวไม้ สีสันสดใส<br>\r\n\r\nก้านและเฟรม ทำจาก เหล็ก<br>\r\nเฟรม ISOMETIC ทำให้มี Sweet spot ที่ใหญ่ขึ้น <br>ทำให้เล่นง่ายขึ้น<br>\r\nขึ้นเอ็นพร้อมใช้งาน<br>\r\nน้ำหนักกไม้+เอ็น 100 g<br>\r\nมีถุงใส่ไม้<br>\r\nก้านขนาด 7 มม<br>\r\nความยาว 66 ซม<br>\r\nเฟรมขนาด 20×5 ซม', 'Tools', 'Badminton', 'FBT', 290, '0', '0', '0', '0', '0', 'img\\FBT-Badmintons.png', 'Ready to Sale', '2024-04-28 09:06:02', '2024-04-28 09:06:02'),
(5, 'SUPER STAR ฟุตซอล ซุปเปอร์สตาร์', 'NEW STAR ฟุตซอล ซุปเปอร์สตาร์ หนังอัด<br>  ยี่ห้อ: NEW STAR<br>  รหัส: 31643<br>  สี: ส้ม-ดำ-เหลือง<br> วัสดุ: ผลิตจากหนังอัด PVC คุณภาพสูง<br>  ขนาด: FUTSAL (สูบลมเต็ม 68-70 ซม.)<br>  น้ำหนัก: 390-420 กรัม<br>  รายละเอียดเพิ่มเติม:  PVC คุณภาพสูง ไม่ดูดซับน้ำ 32 แผ่น ผลิตในประเทศไทย<br> จุ๊บยางสำหรับสูบลมมีวาวล์ปิด-เปิด โดยใช้เข็มสูบ เหมาะสำหรับ เตะบนพื้นสนามหญ้า<br> ฟุตบอลขนาดเบอร์ 5 สำหรับผู้ที่มีอายุตั้งแต่ 13 ปีขึ้นไป ใช้สำหรับฝึกซ้อม', 'Tools', 'Football', 'FBT', 405, '0', '0', '0', '0', '0', 'img/FBT-specialball.png', 'Not Sale', '2024-04-28 14:24:59', '2024-05-08 17:38:09'),
(6, 'IMANE โปโล เบสิค', 'สื้อโปโล รุ่น BASIC มีความ Smart ด้วยการตัดเย็บคอปกมีฐาน <br> ทำให้ผู้สวมใส่ดูสุภาพ เรียบร้อย  จึงทำให้ใส่ได้ทุกโอกาส ไม่ว่าจะเที่ยว เล่น หรือ ทำงาน <br> เพราะเนื้อผ้ามีการถักทอด้วยเส้นใย Micro Polyester ผสม เส้นใย Filament ทำให้เกิดความนุ่มสบาย และมีความมันเงา  แทรกอยู่ในเส้นใย<br> อีกทั้งเนื้อผ้ายังมีความแข็งแรง ไม่ขาดง่าย เหมาะกับเป็นเสื้อตัวโปรดของคุณ', 'Shirt', 'Shirt', 'IMANE', 338, 'S', 'M', 'L', 'XL', '2XL', 'img/imane-polo.png', 'Ready to Sale', '2024-04-28 14:48:37', '2024-04-28 14:48:37'),
(7, 'กางเกงวิ่งขาสั้นผู้ชาย', 'กางเกงลำลอง สำหรับทุกๆไลฟ์สไตล์ไม่ว่าจะใส่ออกกำลังกาย ใส่ไปเที่ยว ก็เท่ห์ ดูดี ทรงกระชับ เนื้อผ้าคอตต้อน 43% และ โพลีเอสเตอร์ 57% ใส่สบาย ทรงกระชับ ระบายอากาศดี<br>  คุณสมบัติ<br> ระบายอากาศดี<br> เนื้อผ้าเย็นสบาย<br> ความยืดหยุ่นสูง', 'Pant', 'Pant', 'WARRIX', 395, 'S', 'M', 'L', 'XL', '2Xl', 'img/662e0564bcfad_662e03b54e23d_wrx-pant.png', 'Ready to Sale', '2024-04-28 14:58:52', '2024-04-28 15:14:28'),
(8, 'FBT เสื้อฟุตบอลแขนสั้น', 'ผลิตจากผ้าไมโครโพลีเอสเตอร์ 100% <br> คุณสมบัติ: <br>✔ น้ำหนักเบา  สวมใส่สบาย ไม่ระคายเคือง ซับเหงื่อได้ดี  เนื้อผ้าบางเบาเหมาะสำหรับสภาพอากาศร้อนแบบประเทศไทย  <br>✔ ระบายอากาศได้ดีในการออกกำลังกาย หรือแม้กระทั่งสวมใส่ในชีวิตประจำวันเหมาะกับไลฟ์สไตล์ชีวิตในเมืองใหญ่ หรือ วันสบายๆ ท่ามกลางธรรมชาติได้เป็นอย่างดีของคุณอีกด้วย  <br>✔ รูปแบบการดีไซน์ที่ทันสมัย เหมาะกับการใส่ในทุกโอกาส', 'Shirt', 'Shirt', 'FBT', 329, 'S', 'M', 'L', 'XL', '2XL', 'img/FBT-shritball.png', 'Ready to Sale', '2024-04-28 15:03:17', '2024-05-06 21:22:28'),
(9, 'เสื้อกีฬาไอมาเน่ รุ่น PRIMEIRO', 'ชื่อสินค้า : เสื้อกีฬาไอมาเน่ รุ่น PRIMEIRO <br>  สี : White', 'Shirt', 'Shirt', 'IMANE', 399, 'S', 'M', 'L', 'XL', '2XL', 'img/6638df2fe1b3f_imane2.png', 'Ready to Sale', '2024-05-03 21:35:54', '2024-05-06 20:46:55'),
(10, 'FBT ถุงเท้าฟุตบอล', 'FBT ถุงเท้าฟุตบอล 82516  <br>วัสดุ : อะคริลิค + ไนล่อน <br>จุดเด่น : ง่ายต่อการทำความสะอาด แห้งไว คงรูป <br>ลักษณะ :  ✅ถุงเท้าสูงถึงเข่าสำหรับใส่เล่นฟุตบอล <br>✅หน้าแข้งทอโปรงเพื่อให้ระบายอากาศได้ดี สวมใส่กระชับและใส่สบาย <br>✅พื้นถุงเท้าทอหนาพิเศษเพื่อป้องกันการเสียดสีในขณะเล่น  <br>Free size: 36-42 (EU)', 'Sock', 'Sock', 'FBT', 79, '0', '0', '0', '0', '0', 'img/FBT-sock.png', 'Ready to Sale', '2024-05-06 20:50:23', '2024-05-06 20:50:23'),
(11, 'FBT ลูกแบดพลาสติก 1200 (แพค 6 ลูก)', 'ลูกแบดพลาสติก 1200 (แพค 6 ลูก)', 'Jipata', 'Badminton', 'FBT', 180, '0', '0', '0', '0', '0', 'img/FBT-Plastic.png', 'Ready to Sale', '2024-05-06 20:52:16', '2024-05-06 20:52:16'),
(12, 'FBT สนับแข้งฟุตบอลพลาสติก', 'FBT สนับแข้งฟุตบอลพลาสติก รุ่น MINI1 รหัส 48324 <br>สำหรับนักกีฬา ฟุตบอล <br>สินค้าใช้วัสดุคุณภาพดี มีความทนทานสูง <br>สามารถใช้ได้ทุกเพศทุกวัย ตั้งแต่อายุ 5 ปีขึ้นไป <br>ใช้สำหรับแข่งขัน หรือ ฝึกซ้อมได้ดี ', 'Tools', 'Gaiter', 'FBT', 149, '0', '0', '0', '0', '0', 'img/FBT-Knee.png', 'Ready to Sale', '2024-05-06 20:56:07', '2024-05-06 21:08:20'),
(13, 'tumblr WARRIX HYPERDRY SHORTS', 'กางเกง HYPERDRY SHORTS กางเกงลำลองขาสั้น ที่มาพร้อมการตัดต่อแบบขอบเอวยางยืด พร้อมเชือกรัดเอว <br>สกรีนตัวอักษร WARRIX เพื่อปรับความกระชับ กระเป๋าด้านข้างทั้งสองข้างแบบเจาะ ชายกางเกงด้านซ้ายสกรีนโลโก้ <br>WARRIX แบบ Reflextive สะท้อนแสงสวยงาม ขาด้านข้างตัดเย็บแบบเล่นระดับเพื่อความสวยงาม <br>เนื้อผ้าผลิตจากเส้นใย โพลีเอสเตอร์ แบบ TASLAN บางเบาเย็นสบาย ระบายอากาศได้ดี  <br>- เส้นใย Polyester 100% <br>- เชือกรัดเอวเพื่อปรับความกระชับ <br>- เนื้อผ้าเบาเย็นสบาย <br>- ระบายอากาศได้ดี', 'Pant', 'Pant', 'WARRIX', 490, 'S', 'M', 'L', 'XL', '2XL', 'img/wrx-pant2.jpg', 'Ready to Sale', '2024-05-06 20:59:50', '2024-05-06 20:59:50'),
(14, 'GOLD STAR ลูกฟุตบอล โกลด์สตาร์ FG-310', 'GOLD STAR ฟุตบอล โกลด์สตาร์ FG-310 No.3 31339  <br>ยี่ห้อ: GOLD STAR  <br>รหัส: 31339  <br>สี: ดำ-ขาว  <br>วัสดุ: ผลิตจากหนังอัด PU คุณภาพสูง  <br>ขนาด: เบอร์ 3 (เส้นผ่าศูนย์กลาง 23-24 นิ้ว)  <br>น้ำหนัก:  <br>รายละเอียดเพิ่มเติม:  <br>1. PU คุณภาพสูง <br>2. ผลิตในประเทศไทย <br>3. จุ๊บยางสำหรับสูบลมมีวาวล์ปิด-เปิด โดยใช้เข็มสูบ <br>4. เหมาะสำหรับ เตะบนพื้นสนามหญ้า <br>5. ฟุตบอลขนาดเบอร์ 3 สำหรับเด็ก อายุต่ำกว่า 7 ปี <br>6. ใช้สำหรับฝึกซ้อม', 'Tools', 'Football', 'FBT', 468, '0', '0', '0', '0', '0', 'img/FBT-Ball2.png', 'Ready to Sale', '2024-05-06 21:06:05', '2024-05-06 21:06:05'),
(15, 'FBT ไม้แบดมินตัน FBT POWER S', 'FBT ไม้แบดมินตัน FBT POWER S 51391 <br>ไม้แบดขึ้นเอ็นพร้อมใช้งาน แถมปลอกครอบหัวไม้ สีสันสดใส  <br>ก้านและเฟรม ทำจาก เหล็ก <br>เฟรม ISOMETIC ทำให้มี Sweet spot ที่ใหญ่ขึ้น ทำให้เล่นง่ายขึ้น <br>ขึ้นเอ็นพร้อมใช้งาน <br>น้ำหนักกไม้+เอ็น 100 g <br>มีถุงครอบแบบครอบเฟรม <br>ก้านขนาด 7 มม <br>ความยาว 66 ซม <br>เฟรมขนาด 20×5 ซม', 'Tools', 'Badminton', 'FBT', 144, '0', '0', '0', '0', '0', 'img/FBT-Badminton.png', 'Ready to Sale', '2024-05-06 21:10:07', '2024-05-06 21:10:07'),
(16, 'FBT กางเกงฟุตบอล', 'FBT กางเกงฟุตบอล C2B211  <br>จุดเด่นสินค้า :  ทรงขากระบอก <br>การดูแลรักษา :  ควรตากในที่ที่มีลมพัดผ่าน มีอากาศถ่ายเทสะดวก หรือแสงแดดส่องถึง', 'Pant', 'Pant', 'FBT', 117, 'S', 'M', 'L', 'XL', '2XL', 'img/FBT-plant.png', 'Ready to Sale', '2024-05-06 21:13:06', '2024-05-06 21:13:06'),
(17, 'FBT กางเกงฟุตบอลตัดต่อ', 'ผลิตจากผ้าไมโครโพลีเอสเตอร์ 100%  <br>คุณสมบัติ:  <br> น้ำหนักเบา  สวมใส่สบาย ไม่ระคายเคือง ซับเหงื่อได้ดี  เนื้อผ้าบางเบาเหมาะสำหรับสภาพอากาศร้อนแบบประเทศไทย  <br> ระบายอากาศได้ดีในการออกกำลังกาย หรือแม้กระทั่งสวมใส่ในชีวิตประจำวันเหมาะกับไลฟ์สไตล์ชีวิตในเมืองใหญ่ หรือ วันสบายๆ ท่ามกลางธรรมชาติได้เป็นอย่างดีของคุณอีกด้วย  <br> รูปแบบการดีไซน์ที่ทันสมัย เหมาะกับการใส่ในทุกโอกาส', 'Pant', 'Pant', 'FBT', 170, 'S', 'M', 'L', 'XL', '2XL', 'img/FBT-plant2.png', 'Ready to Sale', '2024-05-06 21:16:37', '2024-05-06 21:16:37'),
(18, 'FBT เสื้อฟุตบอลสีล้วน (Slim Fit)', '– สามารถใส่ลำลอง หรือ ใส่ออกกำลังกายได้<br> – ใช้นวัตกรรมการพิมพ์ลายลงบนใยผ้า ป้องกันลายแตกเมื่อต้องซัก <br>– สามารถซักและใส่ได้เลยโดยไม่ต้องรีด <br>– เนื้อผ้าระบายกาศได้อย่างดีเยี่ยม และไม่ทิ้งความอับชื้น เพิ่มความมั่นใจให้คุณใส่ได้ทั้งวัน<br> – น้ำหนักเบา สวมใส่สบาย พร้อมรองรับทุกการเคลื่อนไหวของคุณ  <br>วัสดุ   :100% โพลีเอสเตอร์ (ผ้าลื่น) <br>Material  : 100% Polyester', 'Shirt', 'Shirt', 'FBT', 180, 'S', 'M', 'L', 'XL', '2XL', 'img/fbtss.png', 'Ready to Sale', '2024-05-06 21:19:35', '2024-05-06 21:19:35'),
(19, 'FBT เสื้อโปโลชาย/หญิง (UNISEX)', 'รายละเอียดสินค้า <br>– เสื้อเป็นทรงตรง แขนปล่อย สามารถใส่ได้ทั้งชายและหญิง<br> – LOGO FBT เป็นการปักลงบนเนื้อผ้า <br>– ใช้นวัตกรรมการพิมพ์ลายลงบนใยผ้า ป้องกันลายแตกเมื่อต้องซัก<br> – สามารถซักและใส่ได้เลยโดยไม่ต้องรีด<br> – เนื้อผ้าระบายกาศได้อย่างดีเยี่ยม และไม่ทิ้งความอับชื้น เพิ่มความมั่นใจให้คุณใส่ได้ทั้งวัน <br>– น้ำหนักเบา สวมใส่สบาย พร้อมรองรับทุกการเคลื่อนไหวของคุณ<br> – สวมใส่ได้หลายโอกาส สามารถนำไปใช้งานได้หลายรูปแบบ ทั้งเป็นเสื้อยูนิฟอร์ม ชุดทำงาน สำหรับการเรียนการศึกษา ฯลฯ – สามารถที่จะนำมา mix and match แก่ชุดต่าง ๆ ได้หลายสไตล์', 'Shirt', 'Shirt', 'FBT', 325, 'S', 'M', 'L', 'XL', '2XL', 'img/6638e86441ca4_FBT-polo2.png', 'Ready to Sale', '2024-05-06 21:21:19', '2024-05-06 21:25:40'),
(20, 'WARRIX CHANGSUEK BUBBLE POLO', 'รายละเอียดสินค้า <br> ผลิตด้วยเนื้อผ้า 100% Polyester <br> วิธีการถักทอลาย บับเบิ้ล <br> ปักโลโก้ ช้างศึกที่หน้าอกซ้าย <br> ปักโลโก้ WARRIX <br> เย็นสบาย ระบายเหงื่อได้ดี <br> ผ้าไม่ยับง่าย', 'Shirt', 'Shirt', 'WARRIX', 499, 'S', 'M', 'L', 'XL', '2XL', 'img/waer.png', 'Ready to Sale', '2024-05-06 21:28:02', '2024-05-06 21:28:02'),
(21, 'เสื้อฟุตบอลคอกลมแขนสั้น', '<br>100% Polyester <br>ระบายอากาศได้ดี <br>ผ้าเย็นสบาย', 'Shirt', 'Shirt', 'WARRIX', 199, 'S', 'M', 'L', 'XL', '2XL', 'img/22.png', 'Ready to Sale', '2024-05-06 21:29:34', '2024-05-06 21:29:34'),
(22, 'กางเกงวอร์มขายาว', ' เนื้อผ้าวอร์ม 100% Polyester การถักทอแบบ Double Knit <br>สัมผัสนุ่มอุ่นสบาย ใส่สบายทุกการเคลื่อนไหว .<br> • เนื้อผ้า 100% Polyester <br>• ผ้าวอร์ม ใส่สบาย <br>• การถักแบบ Double Knit เนื้อผ้านุ่ม', 'Pant', 'Pant', 'WARRIX', 200, 'S', 'M', 'L', 'XL', '2XL', 'img/warm.png', 'Ready to Sale', '2024-05-06 21:34:51', '2024-05-06 21:34:51'),
(23, 'เสื้อโปโลชายแกรนด์สปอร์ต ', 'ประเภทสินค้า : เสื้อโปโลชายแกรนด์สปอร์ต <br>วัสดุ : 100% โพลีเอสเตอร์ <br>จุดเด่นสินค้า : - เสื้อโปโลปกผ้าในตัว ดีไซน์โดดเด่นด้วยงานพิมพ์ตรงตำแหน่งบ่าทั้ง2 ข้าง ดูเรียบ สวย ดูดี                         <br>- กระดุม 2 เม็ดที่สาบหน้า มีกระเป๋าอกซ้าย                          <br>- นุ่มสบายเมื่อได้สัมผัสกับผิวกาย ซึมซับเหงื่อและระบายอากาศได้ดี <br> - ปักโลโก้ GS  Dimond ที่หน้าอกด้านขวา<br>- เหมาะสำหรับสวมใส่ในทุกโอกาส    ', 'Shirt', 'Shirt', 'GRAND SPORT', 199, 'S', 'M', 'L', 'XL', '2XL', 'img/gs.png', 'Ready to Sale', '2024-05-06 21:37:41', '2024-05-06 21:37:41'),
(24, 'แกรนด์สปอร์ตเสื้อกีฬา GRAND PRO', 'ประเภทสินค้า   :      แกรนด์สปอร์ตเสื้อกีฬา GRAND PRO  Item <br>category  :GRAND SPORT GRAND PRO JERSEY  <br>วัสดุ  :100%  ( POLYESTER)  <br>Material : 100% POLYESTER   <br>คุณสมบัติของสินค้า :   - ออกแบบพิเศษ ใส่ลำลองได้ทุกโอกาส  <br>- ผลิตจากเส้นใยพิเศษ มีคุณสมบัติในการระบายความร้อนได้ดี  <br>- สกรีนโลโก้แกรนด์สปอร์ตอกด้านขวา ', 'Shirt', 'Shirt', 'GRAND SPORT', 413, 'S', 'M', 'L', 'XL', '2XL', 'img/gs2.png', 'Ready to Sale', '2024-05-06 21:40:14', '2024-05-06 21:40:14'),
(25, 'แกรนด์สปอร์ตเสื้อแจ็คเก็ต Thailand', 'ประเภทสินค้า :  แกรนด์สปอร์ตเสื้อแจ็คเก็ต Thailand       <br>Item category  :  Grand Sport Jacket Thailand        <br>วัสดุ   : 100% โพลีเอสเตอร์ (Micro Stretch)        <br>Material  : 100% Polyester (Micro Stretch)        <br>คุณสมบัติของสินค้า :            - เสื้อแจ็คเก็ต คอทอ ปลายแขนทอ  ดีไซน์ลายกราฟฟิกที่สวยงาม              <br> - เนื้อผ้าไมโครโพลีเอสเตอร์ ผสมสเปนเด็กซ์ นุ่ม ยืดหยุ่นได้ดี สวมใส่สบาย          <br> - ดีไซน์ แบบเรียบง่ายให้ ความสวยงาม ปลายแขน คอ ชายเสื้อขลิบด้วยลิปทอ        <br> - ด้านหน้าปักตัวอักษร V และ T  ส่วนตัว T สามารถเปลี่ยนได้ 2 แบบ  ด้านหลังปัก THAILAND และอักษร T ให้ความสวยงาม  ', 'Shirt', 'Shirt', 'GRAND SPORT', 845, 'S', 'M', 'L', 'XL', '2XL', 'img/gs3.png', 'Ready to Sale', '2024-05-06 21:42:37', '2024-05-06 21:42:37'),
(26, 'เสื้อแจ็คเก็ต(ชาย) แกรนด์สปอร์ต', 'ประเภทสินค้า : เสื้อแจ็คเก็ต(ชาย) แกรนด์สปอร์ต     <br> วัสดุ : 100% โพลีเอสเตอร์ (โพลีมายด์) <br>จุดเด่นสินค้า :  เสื้อแจ็คเก็ตแกรนด์สปอร์ตคอตั้งพิมพ์ลายกราฟฟิกที่ตำแหน่งไหล่ ทั้งสองข้าง <br>ตกแต่งด้วยเส้นกุ๊นตามแนวซิปด้านหน้าตัวเสื้อ มีซับในผ้าในล่อนสีตามตัวเสื้อ  เนื้อผ้าคงทน <br>สวมใส่สบายไม่ย้วยหรือหด  ซิปหน้ายาวสุดที่คอ มีซิปกระเป๋าด้านข้าง เหมาะสำหรับใส่ในงานที่เป็นทางการหรือใส่ลำลองแฟชั่น ', 'Shirt', 'Shirt', 'GRAND SPORT', 819, 'S', 'M', 'L', 'XL', '2XL', 'img/gs4.png', 'Ready to Sale', '2024-05-06 21:45:22', '2024-05-06 21:45:22'),
(27, 'กางเกงขาสั้นตัดต่อปลายขา', 'Item category : Grand Sport Shorts  <br>วัสดุ :Woven 100% โพลีเอสเตอร์ ( Taslan Soft )  <br>Material : Woven 100% Polyester ( Taslan Soft )    <br>จุดเด่นสินค้า : - กางเกงขาสั้นลำลอง ผลิตด้วยผ้า Taslon Soft <br> - เนื้อผ้านุ่ม น้ำหนักเบา ระบายอากาศได้ดี <br>- ตัดต่อผ้าสีแต่ง ช่วงปลายขาทั้ง 2 ข้าง <br>- ปักโลโก้แกรนด์สปอร์ต ตามสีชิ้นตัดต่อ ใต้กระเป๋าซ้าย <br>- ขอบเอวกางเกงเป็นยางยืด และมีเชือกผูกเพิ่มความกระชับได้<br> - มีกระเป๋า 2 ข้าง (แบบมีซิป) <br>- มีสีให้เลือกสวมใส่ 6 สี <br>- เหมาะสำหรับทุกเพศ', 'Pant', 'Pant', 'GRAND SPORT', 249, 'S', 'M', 'L', 'XL', '2XL', 'img/gs5.png', 'Ready to Sale', '2024-05-06 21:47:32', '2024-05-06 21:47:32'),
(28, 'กางเกงขาสามส่วน แกรนด์สปอร์ต', 'ประเภทสินค้า  :  กางเกงขาสามส่วน แกรนด์สปอร์ต  <br>Item category  : Grand Sport 3/4 Pants<br>  วัสดุ   : Woven 100% โพลีเอสเตอร์  ( Polymild M )  <br>Material : Woven 100% Polyester  ( POLYMILD M )                                                             <br>จุดเด่นสินค้า:                  <br>- กางเกงขาสามส่วน เนื้อผ้าให้ความรู้สึกเบา และสวมใส่สบาย<br> - ตกแต่งด้วยโลโก้แกรนด์สปอร์ต ที่ขาซ้าย <br>- ตัดต่อสี ด้านข้างช่วงปลาย ลวดลายคล้ายตัว S <br>- ขอบเอวกางเกงเป็นยางยืด และมีเชือกผูกเอว ตามสีโลโก้ <br>- มีกระเป๋า 2 ข้าง (มีซิป)<br> - สวมใส่ได้ทั้งผู้ชายและผู้หญิง <br>- มีสีให้เลือกสวมใส่ 3 สี  ', 'Pant', 'Pant', 'GRAND SPORT', 319, 'FreeSize', '0', '0', '0', '0', 'img/gs6.png', 'Ready to Sale', '2024-05-06 22:00:56', '2024-05-06 22:00:56'),
(29, 'แกรนด์สปอร์ตเสื้อคอปกทีมชาติไทย2022', 'ประเภทสินค้า : แกรนด์สปอร์ตเสื้อคอปกทีมชาติไทย2022                                                                        <br> วัสดุ : 100%Polyester                                                                   <br>  จุดขายเายด่นสินค้า :                                         เนื้อผ้าลายTwill ผลิตจากเส้นใยโพลีเอสเตอร์ เนื้อผ้าน้ำหนักเบา ระบอากาศได้ดี แห้งเร็ว สวมใสสบาย ดีไซน์เรียบง่าย ให้ความสวยงาม ปลายแขน ขลิบด้วยลิปทอธงชาติ  ที่แขนขวา พร้อมงานพิมพ์ธงชาติ อกซ้าย และพิมพ์THAILAND  ด้านหลัง  ออกแบบพิเศษสำหรับแฟนกีฬา <br>การดูแลรักษา :                                         ซักได้ในอุณหภูมิสูงสุด 40 องศา ตากในที่ร่ม หรืออากาศถ่ายเทสะดวก   ', 'Shirt', 'Shirt', 'GRAND SPROT', 295, '0', 'M', 'L', 'XL', '0', 'img/gs7.png', 'Ready to Sale', '2024-05-06 22:07:49', '2024-05-06 22:07:49'),
(30, 'IMANE ถุงเท้าสั้นนุ่มสบาย', 'ถุงเท้าสั้นพื้นหนา', 'Sock', 'Sock', 'IMANE', 40, '0', '0', '0', '0', '0', 'img/im1.png', 'Ready to Sale', '2024-05-06 22:13:41', '2024-05-06 22:13:41'),
(31, 'กางเกงฟุตบอลขาสั้น Imane', 'กางเกงฟุตบอลขาสั้น Imane', 'Pant', 'Pant', 'IMANE', 100, 'S', 'M', 'L', 'XL', '2XL', 'img/im2.png', 'Ready to Sale', '2024-05-06 22:16:51', '2024-05-06 22:16:51'),
(32, 'กางเกงวอร์ม EGO Sport', 'กางเกงวอร์ม EGO', 'Pant', 'Pant', 'EGO SPORT', 385, 'S', 'M', 'L', 'XL', '2XL', 'img/EG1.png', 'Ready to Sale', '2024-05-06 22:19:36', '2024-05-06 22:19:36'),
(33, 'เสื้อโปโลแขนสั้น ไหล่สโลป', 'เสื้อโปโลแขนสั้น ไหล่สโลป', 'Shirt', 'Shirt', 'EGO SPORT', 230, 'S', 'M', 'L', 'XL', '2XL', 'img/EG2.png', 'Ready to Sale', '2024-05-06 22:21:20', '2024-05-06 22:21:20'),
(34, 'เสื้อวอลเลย์บอลหญิง แขนสั้น', 'เสื้อวอลเลย์บอลหญิง แขนสั้น', 'Shirt', 'Shirt', 'EGO SPORT', 245, 'S', 'M', 'L', 'XL', '2XL', 'img/EG3.png', 'Ready to Sale', '2024-05-06 22:22:13', '2024-05-06 22:22:13'),
(35, 'กางเกงวอลเลย์บอลหญิงขาสั้น', 'กางเกงวอลเลย์บอลหญิงขาสั้น', 'Pant', 'Pant', 'EGO SPORT', 195, 'S', 'M', 'L', 'XL', '2XL', 'img/EG4.png', 'Ready to Sale', '2024-05-06 22:22:58', '2024-05-06 22:22:58'),
(36, 'H3 เสื้อโปโล รุ่น Pro-Tech', 'เสื้อโปโล รุ่น Pro-Tech เนื้อผ้าใส่สบาย แห้งไว งาน AMBOSS ', 'Shirt', 'Shirt', 'H3 SPORT', 238, 'S', 'M', 'L', 'XL', '2XL', 'img/h31.png', 'Ready to Sale', '2024-05-06 22:24:07', '2024-05-06 22:24:07'),
(37, 'H3 Sport กางเกงขาสั้น', 'H3 Sport กางเกงขาสั้น', 'Pant', 'Pant', 'H3 SPORT', 115, 'S', 'M', 'L', 'XL', '2XL', 'img/h32.png', 'Ready to Sale', '2024-05-06 22:24:53', '2024-05-06 22:24:53'),
(38, 'CADENZA CDL-11 New Collection เสื้อโปโลสปอร์ต ', 'CADENZA CDL-11 New Collection เสื้อโปโลสปอร์ต ', 'Shirt', 'Shirt', 'CADENZA', 229, 'S', 'M', 'L', 'XL', '2XL', 'img/cad1.png', 'Ready to Sale', '2024-05-06 22:25:56', '2024-05-06 22:25:56'),
(39, 'Cadenza เสื้อกีฬา คอกลม แขนสั้น', '?Made in Thailand เสื้อกีฬา Cadenza รุ่นCZ-24 (รุ่นปี 2021) <br>ผลิตจากผ้า Micro-Polyester 100% <br>เหมาะสำหรับใส่เล่นกีฬา ออกกำลังกาย หรือใส่เล่นทั่วไป <br>---------------------------------------- <br>✔️ เนื้อผ้า Micro-Polyester 100% มีความยืดหยุ่น สวมใส่สบาย ระบายอากาศและเหงื่อได้ดี <br>✔️ใช้การพิมพ์ลายบนผ้าด้วยเทคนิค Heat Transfer ทำให้ได้ลายสีสด ไม่ซีดแม้ซักหลายครั้ง <br>✔️ การตัดเย็บด้วยเครื่องจักรที่ทันสมัย ทำให้ได้เสื้อทรงสวย ทน ไม่ขาดง่าย', 'Shirt', 'Shirt', 'CADENZA', 179, 'S', 'M', 'L', 'XL', '2XL', 'img/cad2.png', 'Ready to Sale', '2024-05-06 22:27:34', '2024-05-06 22:27:34'),
(40, 'กางเกงฟุตบอลรุ่นCADENZA', 'Size M-2XL ราคา 129.-   <br>-โดดเด่นด้วยโลโก้สกรีนสีทองแดง  <br>- ผ้า MICRO POLYESTER 100%   <br>- น้ำหนักเบา ระบายอากาศได้ดี', 'Pant', 'Pant', 'CADENZA', 103, '0', 'M', 'L', 'XL', '2XL', 'img/cad3.png', 'Ready to Sale', '2024-05-06 22:29:45', '2024-05-08 17:33:26'),
(41, ' กางเกงกีฬา กางเกงฟุตบอล CADENZA', '⦿ ผลิตด้วยเส้นด้าย Micro Polyester 100%⦿ น้ำหนักเบา สวมใส่สบาย⦿ เนื้อผ้าแห้งไว ระบายอากาศได้ดี⦿ ดีไซน์เชือกแบบใหม่ เพิ่มดีเทลลาย 3 สี สไตล์คาเดนซ่า⦿ โลโก้ Reflective สะท้อนแสง⦿ ต่อแถบด้านข้างด้วยผ้าพิมพ์ลายโลโก้', 'Pant', 'Pant', 'CADENZA', 125, 'Freesize', '0', '0', '0', '0', 'img/cad4.png', 'Ready to Sale', '2024-05-08 17:32:09', '2024-05-08 17:32:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cus`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_orders_customer` (`id_cus`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_pro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_customer` FOREIGN KEY (`id_cus`) REFERENCES `customer` (`id_cus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
