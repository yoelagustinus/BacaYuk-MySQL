-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 04:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bacayuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(6) NOT NULL,
  `category_name` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `commentId` int(11) NOT NULL,
  `ArticleName` varchar(100) NOT NULL,
  `NameVisitor` varchar(100) NOT NULL,
  `EmailVisitor` varchar(100) NOT NULL,
  `IsiCommentVisitor` longtext DEFAULT NULL,
  `CommentStatus` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`commentId`, `ArticleName`, `NameVisitor`, `EmailVisitor`, `IsiCommentVisitor`, `CommentStatus`) VALUES
(1, 'Artikel 1', 'Yoel Agustinus', 'test@gmail.com', 'THis is so good', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

CREATE TABLE `tbl_content` (
  `content_id` int(6) NOT NULL,
  `content_title` varchar(500) DEFAULT NULL,
  `the_content` longtext DEFAULT NULL,
  `content_category` varchar(100) DEFAULT NULL,
  `content_excerpt` varchar(200) DEFAULT NULL,
  `youtube_link` varchar(200) DEFAULT NULL,
  `name_file` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` (`content_id`, `content_title`, `the_content`, `content_category`, `content_excerpt`, `youtube_link`, `name_file`) VALUES
(1, 'Pentingnya Menjaga Kesehatan Bayi', 'Sistem kekebalan bayi yang baru lahir masih berkembang. Jadi, mereka berisiko lebih tinggi mengalami komplikasi serius akibat penyakit. Kuman dan bakteri yang tidak berbahaya bagi orang dewasa, bisa menjadi sangat serius bagi bayi. <br><br>\r\n\r\n\r\n\r\nSelain itu, anggota keluarga, teman-teman, bahkan orang asing yang tertarik untuk menyentuh dan menggendong bayi yang baru lahir, bisa membuat bayi terpapar lebih banyak kuman dan virus daripada yang biasanya dialami ketika hanya berada dengan orangtuanya.<br><br>\r\n\r\n\r\n\r\nCara Menjaga Kesehatan Bayi<br>\r\nBerikut ini cara yang bisa dilakukan orangtua untuk menjaga kesehatan bayi yang baru lahir:<br><br>\r\n\r\nVaksinasi<br>\r\nBukan hanya bayi saja yang perlu mendapatkan vaksin, orang-orang dewasa yang berada di sekitarnya juga perlu divaksin.<br><br>\r\n\r\n\r\n\r\nBayi baru lahir hanya akan menerima vaksinasi hepatitis B saat lahir, dan sisanya diberikan pada jarak waktu tertentu selama 4 tahun pertama kehidupan mereka.<br><br>\r\n\r\n\r\n\r\nItulah mengapa semua orang dewasa yang berada di dekat bayi, seperti pengasuh dan keluarga perlu mendapatkan vaksin sesuai yang direkomendasikan dokter agar tidak menularkan virus penyakit pada bayi.<br><br>\r\n\r\n\r\n\r\nKenakan Pakaian yang Tepat pada Bayi<br>\r\nPastikan bayi berpakaian hangat, yang mungkin sedikit lebih hangat dari ibu. Namun, hindari juga memakaikannya berlapis-lapis pakaian, karena bisa membuat bayi kepanasan dan terlalu banyak berkeringat yang bisa menyebabkan dehidrasi dan meningkatkan risikonya untuk jatuh sakit.<br><br>\r\n\r\n\r\n\r\nBiasakan Orang Rumah Rajin Mencuci Tangan<br><br>\r\nMintalah anggota keluarga, teman dan siapapun yang berkunjung ke rumah untuk mencuci tangan terlebih dahulu dengan sabun antibakteri dan air sebelum menggendong bayi. Pasalnya, mereka bisa saja menularkan atau menyebarkan kuman berbahaya meskipun mereka tidak terlihat sakit.<br><br>\r\n\r\n\r\n\r\nPemberian ASI Eksklusif Dianjurkan, tapi Bukan Satu-satunya Pilihan<br><br>\r\nOrganisasi Kesehatan Dunia (WHO) merekomendasikan agar Air Susu Ibu (ASI) menjadi makanan utama untuk bayi hingga usia 6 bulan bila memungkinkan. ASI bisa mendukung kesehatan bayi, memberikan bayi antibodi dari ibu dan memiliki tingkat kekebalan yang lebih tinggi.<br><br>\r\n\r\n\r\n\r\nNamun, tidak semua ibu bisa memberikan ASI eksklusif pada bayinya karena memiliki kondisi tertentu. Meskipun tidak ada perdebatan mengenai pemberian susu formula pada bayi, ibu dianjurkan untuk membicarakannya pada dokter mengenai makanan apa yang tepat bagi bayi.<br><br>\r\n\r\n\r\n\r\nBimbing Anak untuk Menerapkan Praktik Kebersihan<br>\r\nAjari anak yang lebih tua dan setiap anak yang berkunjung untuk melakukan praktik kebersihan dasar, seperti mencuci tangan sebelum menggendong bayi, menutupi mulut dan hidung saat batuk dan bersin, serta membuang tisu setelah membuang ingus.<br><br>\r\n\r\n\r\n\r\nPastikan Bayi Terhidrasi dengan Baik<br>\r\nPerhatikan kadar hidrasi bayi. Hidrasi bisa mendukung kerja selaput lendir dan saluran pernapasan, yang penting untuk kesehatan bayi. Berikan ASI atau susu formula secara teratur agar bayi tetap terhidrasi dengan baik. Pedoman umum menganjurkan agar bayi setidaknya membasahi 4-6 popok sehari.<br><br>\r\n\r\n\r\n\r\nHindari Mengenakan Sepatu di dalam Rumah<br>\r\nMintalah setiap orang di rumah untuk melepas sepatu mereka sebelum masuk ke dalam rumah. Sepatu membawa kotoran, racun, dan polusi dari luar, dan bayi yang sudah bisa merangkak bisa terpapar racun tersebut di lantai.<br><br>\r\n\r\n\r\n\r\nBahkan sekalipun bayi belum bisa merangkak, ketika ibu membaringkan bayi di lantai untuk waktu latihan tengkurap atau bermain, ia bisa terkena kuman dari lantai. Jadi, penting untuk menjaga kebersihan lantai.<br><br>\r\n\r\n\r\n\r\nBersihkan Gigi Bayi<br><br>\r\nKebersihan gigi yang baik bisa mendukung kesehatan yang baik. Hal itu juga berlaku bagi bayi. Karena itu, penting bagi orangtua untuk mulai menyikat gigi bayi segera setelah giginya mulai tumbuh.<br><br>\r\n', 'Kesehatan', 'Sistem kekebalan bayi yang baru lahir masih berkembang. Jadi, mereka berisiko lebih tinggi mengalami komplikasi serius akibat penyakit. Kuman dan bakteri yang tidak berbahaya bagi orang dewasa, bisa m', '', 'istockphoto-517188688-612x612.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD PRIMARY KEY (`content_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_content`
--
ALTER TABLE `tbl_content`
  MODIFY `content_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
