-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2017 at 08:03 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `confirmation`
--

CREATE TABLE `confirmation` (
  `id_transaction` varchar(10) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirmation`
--

INSERT INTO `confirmation` (`id_transaction`, `bank`, `nama_pemilik`, `no_rekening`, `nominal`) VALUES
('12345001', 'BCA', 'anto', '1701333185', 1049061),
('12345001', 'BCA', 'daf', '123123123', 1049035),
('12345001', 'BCA', 'daf', '123123123', 1049035),
('12345001', 'BCA', 'asdas', '02121545', 1049061),
('12345001', 'BCA', 'asdas', '02121545', 1049061),
('12345002', 'BCA', 'Firly Anugrah', '123456789', 1009046),
('12345005', 'BCA', 'Firly Anugrah', '123123123', 509050);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id_transaction` varchar(8) NOT NULL,
  `status` enum('on process','on the way','delivered','none') NOT NULL DEFAULT 'none',
  `delivery_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id_transaction`, `status`, `delivery_date`) VALUES
('12345001', 'on process', '-'),
('12345002', 'none', '-'),
('12345003', 'none', '-'),
('12345005', 'none', '-'),
('12345006', 'none', '-'),
('54321001', 'on process', '-');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaction`
--

CREATE TABLE `header_transaction` (
  `id` varchar(10) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `jenis_barang` int(11) NOT NULL,
  `date_transaction` varchar(10) NOT NULL,
  `delivery_to` text NOT NULL,
  `delivery_city` varchar(50) NOT NULL,
  `delivery_fee` int(11) NOT NULL,
  `total_payment` int(11) NOT NULL,
  `status` enum('paid','unpaid','canceled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_transaction`
--

INSERT INTO `header_transaction` (`id`, `jumlah_barang`, `jenis_barang`, `date_transaction`, `delivery_to`, `delivery_city`, `delivery_fee`, `total_payment`, `status`) VALUES
('12345001', 2, 2, '01-07-2017', 'sdasdad', 'Jakarta Barat', 9000, 1040000, 'paid'),
('12345002', 2, 1, '03-07-2017', 'Jalan Warakas 5 gang 6 no 96', 'Jakarta Barat', 9000, 1000000, 'unpaid'),
('12345003', 0, 0, '14-07-2017', '', 'Jakarta Pusat', 9000, 0, 'unpaid'),
('12345005', 1, 1, '20-07-2017', 'Jalan Warakas 5 gang 6 no 96', 'Jakarta Barat', 9000, 500000, 'unpaid'),
('12345006', 1, 1, '27-07-2017', 'JL. WARAKAS V GG VI 096', 'Jakarta Pusat', 9000, 500000, 'unpaid'),
('54321001', 1, 1, '02-07-2017', 'jasjsad', 'Jakarta Selatan', 0, 352000, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `ms_brand`
--

CREATE TABLE `ms_brand` (
  `id` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `featured` enum('Y','N') NOT NULL DEFAULT 'N',
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ms_brand`
--

INSERT INTO `ms_brand` (`id`, `name`, `image`, `featured`, `status`) VALUES
('001', 'BSN', 'common\\images\\bsn.PNG', 'Y', 0),
('002', 'Cellucor', 'common\\images\\cellucor.PNG', 'Y', 0),
('003', 'Cobra Labs', 'common\\images\\cobralabs.PNG', 'Y', 0),
('004', 'Evolution Nutrition', 'common\\images\\evolutionnutrition.PNG', 'Y', 0),
('005', 'Muscle Pharam', 'common\\images\\musclepharam.PNG', 'Y', 0),
('006', 'Muscletech', 'common\\images\\muscletech.PNG', 'Y', 0),
('007', 'Optimum Nutrition', 'common\\images\\optimumnutrition.PNG', 'Y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ms_city`
--

CREATE TABLE `ms_city` (
  `name` varchar(50) NOT NULL,
  `fee` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_city`
--

INSERT INTO `ms_city` (`name`, `fee`, `status`) VALUES
('Jakarta Barat', 9000, 1),
('Jakarta Pusat', 9000, 1),
('Jakarta Selatan', 9000, 1),
('Jakarta Timur', 9000, 1),
('Jakarta Utara', 9000, 1),
('Pilih Kota', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ms_product`
--

CREATE TABLE `ms_product` (
  `id` varchar(10) NOT NULL,
  `id_brand` varchar(3) NOT NULL,
  `id_type` varchar(3) NOT NULL,
  `id_product` varchar(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `description_small` text NOT NULL,
  `nutri_fact` text NOT NULL,
  `image` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `rating` decimal(10,1) NOT NULL DEFAULT '0.0',
  `review` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ms_product`
--

INSERT INTO `ms_product` (`id`, `id_brand`, `id_type`, `id_product`, `name`, `brand`, `type`, `description`, `description_small`, `nutri_fact`, `image`, `quantity`, `price`, `rating`, `review`, `status`) VALUES
('0010010001', '001', '001', '0001', 'TRUE-MASS ®', 'BSN', 'Gainer', '<p align=\"justify\">TRUE-MASS ® adalah susu protein penambah berat ultra-premium, dirancang untuk meningkatkan pertumbuhan otot. Ini merupakan formula protein ultra-premium dari BSN ® untuk memberi asupan nutrisi protein yang penting untuk otot seorang atlet. Campuran karbohidrat yang unik memberikan dukungan kalori dibutuhkan oleh aktivitas fisik yang ekstrim, membantu tubuh mempersiapkan dan memberikan dukungan pemulihan dari pelatihan intensif. Pasokan lemak sehat untuk bahan bakar pertumbuhan otot memenuhi kebutuhan energi atlet yang gemar berlatih. Dan semua bahan berkualitas tinggi diberikan oleh BSN ®. Teknologi rasa eksklusif, menghasilkan salah satu susu protein penambah berat badan dengan rasa yang paling lezat di pasaran. Komposisi yang seimbang dari TRUE-MASS ® menjadikan sumber nutrisi bergizi yang memberi dukungan kalori dan berguna sebagai pengganti makan yang sehat sebagai bagian dari rencana diet seimbang. perpaduan protein ultra-premium, karbohidrat dan lemak sehat mendukung peningkatan massa otot. Dan dengan rasa yang tidak dapat ditandingi, ketika susu protein penambah berat badan, TRUE-MASS ® punya kelas tersendiri.</p><br>\n<br>\n<span>Manfaat :</span>\n<ul style=\"padding-left:40px\">\n <li style=\"list-style-type: circle\">Menambah berat badan tanpa lemak</li>\n <li style=\"list-style-type: circle\">Mempercepat pemulihan otot</li>\n <li style=\"list-style-type: circle\">Menambah & membentuk otot lebih tebal</li>\n <li style=\"list-style-type: circle\">Asupan nutrisi vitamin & mineral</li>\n</ul><br>\n<span>Keunggulan</span>\n<ul style=\"padding-left:40px\">\n <li style=\"list-style-type: circle\">Rasa yang lezat</li>\n <li style=\"list-style-type: circle\">Tinggi BCAA dan Glutamine untuk mempercepat pemulihan otot</li>\n <li style=\"list-style-type: circle\">Gainer berkualitas tinggi dengan rasa yang lezat</li>\n <li style=\"list-style-type: circle\">Tanapa gula tambahan & bebas aspartam</li>\n</ul><br>', 'TRUE-MASS ® adalah susu protein penambah berat ultra-premium, dirancang untuk meningkatkan pertumbuhan otot. Ini merupakan formula protein ultra-premium dari BSN ® untuk memberi asupan nutrisi protein yang penting untuk otot seorang atlet.', 'common\\images\\product_img\\nutri_fact\\Nutrition facts True mass.PNG', 'common\\images\\product_img\\BSN True Mass.PNG', 100, 500000, '2.1', 0, 1),
('0010020005', '001', '002', '0005', 'SYNTHA-6® ISOLATE', 'BSN', 'Whey', 'SYNTHA-6 ™ Isolate adalah pengembangan baru dari BSN untuk minuman serbuk berprotein yang dibuat dengan 100% protein ‘isolate’. Formula kombinasinya memberikan gabungan dari protein cepat serap dan lambat serap sehingga mendorong asupan asam amino untuk otot anda. SYNTHA-6 ™ Isolate dengan rasa yang sangat lezat dan enak yang tidak bisa ditandingi suplemen lainnya.\r\nManfaat: \r\n•	Pertumbuhan otot\r\n•	Sintesa protein\r\n•	Pemulihan\r\n•	Pengaturan berat badan dan nutrisi yang seimbang\r\n\r\nKeunggulan:\r\n•	Formula unik ‘ISOLAST’ – campuran 50:50 dari protein isolate dan protein isolate susu yang memberikan gabungan dari protein cepat dan lambat serap.\r\n•	Kandungan karbohidrat dan lemak yang sangat rendah\r\n•	Rasa yang sangat lezat dan enak, sehingga cocok dikonsumsi kapan saja anda\r\nmembutuhkan tambahan protein isolate yang berkualitas tinggi.', 'SYNTHA-6 ™ Isolate adalah pengembangan baru dari BSN untuk minuman serbuk berprotein yang dibuat dengan 100% protein ‘isolate’.', 'common\\images\\product_img\\nutri_fact\\Nutritionfacts Syntha 6.PNG', 'common\\images\\product_img\\SYNTHA-6.PNG', 100, 540000, '2.8', 4, 1),
('0020010003', '002', '001', '0003', 'Cellucor Gainer', 'Cellucor', 'Gainer', 'Dengan rincian makronutrien mengandung protein, lemak dan karbohidrat berkualitas. Kinerja Gainer akan membantu pembentukan otot dan pemulihan setelah latihan.\r\n\r\nManfaat: 	\r\n-	Meningkatkan power\r\n-	Membantu pertumbuhan otot\r\n-	Menambah massa otot\r\n\r\nKeunggulan:\r\n-	Mengandung BCAA dan Monohydrate Creatine sebagai peningkat performa latihan\r\n-	Mengandung 60g Protein, 5G Monohydrate Creatine, 80g Karbohidrat, dan Enzim pencernaan\r\n', 'Dengan rincian makronutrien mengandung protein, lemak dan karbohidrat berkualitas. Kinerja Gainer akan membantu pembentukan otot dan pemulihan setelah latihan.', 'common\\images\\product_img\\nutri_fact\\Nutrifact Cellucor gainer.PNG', 'common\\images\\product_img\\Gainer.PNG', 50, 352000, '4.5', 15, 1),
('0020030002', '002', '003', '0002', 'Cellulor Creatine V2', 'Cellucor', 'Creatine', '<p align=\"justify\">COR-Performance Creatine mengandung 5g creatine monohydrate \'micronized\' per scoop. Micronizing Creatine Monohydrate memecahnya menjadi molekul yang lebih kecil, yang membantu meningkatkan kecepatan pencernaan.\r\nCreatine Monohydrate adalah ramuan legendaris yang memiliki banyak studi klinis yang mendukung penggunaannya dan efeknya. Creatine ditemukan di banyak makanan yang berbeda termasuk daging merah dan ikan, dan karena manfaat pembentukan ototnya, penambahan Creatine tambahan ke dalam makanan Anda dapat mendukung tujuan body building Anda.</p>\r\n\r\n<span>Manfaat:</span>\r\n-	Menambah power\r\n-	Membantu membangun massa otot tanpa lemak\r\n-	Mengoptimalkan penyerapanan nutrisi\r\nKeunggulan: \r\n-	Mengandung Micronized Creatine yang dapat memecahkan molekul nutrisi sehingga penyerapan nutrisi lebih baik', 'COR-Performance Creatine mengandung 5g creatine monohydrate \'micronized\' per scoop. Micronizing Creatine Monohydrate memecahnya menjadi molekul yang lebih kecil, yang membantu meningkatkan kecepatan pencernaan.', 'common\\images\\product_img\\nutri_fact\\Nutrifact Cellucor Creatine.PNG', 'common\\images\\product_img\\Cellucor Creatine.PNG', 100, 340000, '5.0', 1, 1),
('0040010004', '004', '001', '0004', 'Stacked Protein Gainer', 'Evolution Nutrition', 'Gainer', '', 'Stacked Protein Gainer adalah produk Evlution Nutrition yang memiliki komposisi 50g protein kompleks artinya kandungan tiap sajian mengandung protein cepat dan lambat serap. Selain itu memiliki kandungan 10g Glutamine yang membantu memperkuat sistem kekebalan tubuh, produk ini juga dilengkapi dengan 10g BCAA yang dapat membantu mempercepat proses pemulihan setelah latihan.', 'common\\images\\product_img\\nutri_fact\\Nutiritionfact Stacked Protein Gainer.PNG', 'common\\images\\product_img\\Stacked Protein Gainer.PNG', 25, 450000, '3.4', 0, 1),
('0050010006', '005', '001', '0006', 'MP Combat XL Gainer', 'Muscle Pharam', 'Gainer', 'MusclePharm® Combat XL adalah suplemen penambah berat badan revolusioner yang diformulasikan dengan kalori padat dan fungsional serta nutrisi penting yang partisi secara tepat untuk menciptakan pembentukan otot yang sempurna.\r\nManfaat:\r\n-	Menambah berat badan bagi orang yang underweight\r\n-	Menambah power saat latihan\r\n\r\nKeunggulan:\r\n-	Mengandung 1270 kalori persaji\r\n-	50g protein pembangun otot\r\n-	252g karbohidrat\r\n-	Mengandung MCT (minyak kelapa) yang berfungsi mengontrol berat badan, flax yang berfungsi menambah nutrisi bagi tubuh Karena mengandung omega3, serat dan lainnya', 'MusclePharm® Combat XL adalah suplemen penambah berat badan revolusioner yang diformulasikan dengan kalori padat dan fungsional serta nutrisi penting yang partisi secara tepat untuk menciptakan pembentukan otot yang sempurna.', 'common\\images\\product_img\\nutri_fact\\Nutrifact Musclepharm Gainer.PNG', 'common\\images\\product_img\\Musclepharm gainer.PNG', 20, 450000, '4.0', 4, 1),
('0060010007', '006', '001', '0007', 'MASS-TECH', 'Muscletech', 'Gainer', 'MASS-TECH adalah gainer canggih yang dirancang untuk setiap individu yang memiliki waktu yang sulit menambahkan berat badan dalam fase bulking mereka dan  ingin menerobos batas kekuatan mereka saat latihan\r\nManfaat:\r\n-	Meningkatkan kekuatan saat latihan \r\n-	Membantu proses metabolisme tubuh lebih baik\r\n-	Meningkatkan sinstesis protein\r\n-	Menambah massa otot\r\n\r\nKeunggulan:\r\n-	Mengandung 63g protein persaji \r\n-	Mengandug 840 kalori persaji\r\n-	Mengandug 13g BCAA', 'MASS-TECH adalah gainer canggih yang dirancang untuk setiap individu yang memiliki waktu yang sulit menambahkan berat badan dalam fase bulking mereka dan  ingin menerobos batas kekuatan mereka saat latihan', 'common\\images\\product_img\\nutri_fact\\Nutritionfact Mass-tech.PNG', 'common\\images\\product_img\\Mass-tech.PNG', 100, 540000, '4.6', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ms_typeproduct`
--

CREATE TABLE `ms_typeproduct` (
  `id` varchar(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ms_typeproduct`
--

INSERT INTO `ms_typeproduct` (`id`, `name`, `description`, `status`) VALUES
('001', 'Gainer', 'Mass atau Weight Gainer adalah susu yang memiliki tinggi Kalori dan tinggi Protein, biasanya terdapat sekitar 1000 kalori dan 50gr protein lebih per sajinya. Fungsi utama dari Gainer adalah menambah berat badan dari terbentuknya Massa Otot, agar tubuh terlihat padat, tebal, dan berisi.', 0),
('002', 'Whey', 'Pembentukan otot sangat membutuhkan nutrisi yang dalam jumlah yang tinggi dan salah satu nutrisi yang harus Anda penuhi adalah protein. Whey protein merupakan suplemen fitness paling utama, karena protein merupakan kebutuhan nomor satu dalam membentuk otot.', 0),
('003', 'Creatine', 'Creatine adalah sebuah asam organik bernitrogen yang berasal dari asam amino arginine, glycine dan methionine. Creatine adalah jenis suplemen fitness yang paling efektif untuk meningkatkan performa anaerobik sekaligus meningkatkan massa tubuh (lean) dan ukuran serat otot.', 0),
('004', 'Amino', 'Multivitamin adalah substansi natural yang dibutuhkan tubuh untuk bertumbuh, berkembang dan berfungsi normal. Multivitamin berisi nutrisi esensial dan non-esensial bagi tubuh, berfungsi mencegah kekurangan vitamin dan mineral tubuh. Multivitamin berisi  Vitamin A, Vitamin B-complex mencakup thiamine, riboflavin, niacin, vitamin B6, folate, vitamin B12, pantothenic acid, dan biotin, Vitamin C, Vitamin D, Vitamin E, Vitamin K, Calcium, Magnesium, Zinc, Iodine, Selenium, Copper, Manganese, Chromium, Molybdenum.', 0),
('005', 'BCAA', 'BCAA adalah singkatan dari Branch Chain Amino Acids. Suplemen yang berperan penting dalam membangun massa otot dan meningkatkan kinerja serta performa fisik bagi siapapun yang mengonsumsinya. BCAA adalah asam amino sederhana yang digunakan untuk membentuk jaringan otot. 35% dari otot kita dibentuk oleh BCAA dan BCAA harus selalu ada dalam tubuh untuk membantu pertumbuhan otot.', 0),
('006', 'Pre-Workout', 'Pre Workout adalah suplemen yang diformulasikan khusus untuk mendapatkan hasil maksimal dari latihan. Biasanya komposisi bahan mengandung semacam kombinasi creatine, oksida nitrat, kafein, asam amino, BCAA, karbohidrat dan nutrisi lain untuk mendorong latihan Anda ke tingkat berikutnya.', 0),
('007', 'Aksesoris', 'Alat tambahan untuk membantu anda dalam berlatih', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ms_user`
--

CREATE TABLE `ms_user` (
  `id` varchar(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` text,
  `city` varchar(50) DEFAULT NULL,
  `postal_code` varchar(5) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `join_date` varchar(10) NOT NULL,
  `transaction_count` int(11) NOT NULL DEFAULT '1',
  `level` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`id`, `first_name`, `last_name`, `username`, `password`, `address`, `city`, `postal_code`, `phone`, `join_date`, `transaction_count`, `level`, `status`) VALUES
('12345', 'Firly', 'Firdaus', 'firlyanugrah@gmail.com', 'xperiax8!', 'Jl. Haji Senin II, Binus Syahdan', 'Jakarta Barat', '14340', '+6287876977135', '', 7, 1, 1),
('54321', 'Firly', 'Anugrah', 'firlyanugrahf@gmail.com', '123456', '-', 'Jakarta Utara', '14340', '+6287876977135', '', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_transaction`
--

CREATE TABLE `product_transaction` (
  `id_transaction` varchar(10) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `product_transaction`
--

INSERT INTO `product_transaction` (`id_transaction`, `customer`, `product_code`, `jumlah`, `payment`) VALUES
('12345001', 'firlyanugrah@gmail.com', '0010020005', 1, 540000),
('12345001', 'firlyanugrah@gmail.com', '0010010001', 1, 500000),
('54321001', 'firlyanugrahf@gmail.com', '0020010003', 1, 352000),
('12345002', 'firlyanugrah@gmail.com', '0010010001', 2, 1000000),
('12345005', 'firlyanugrah@gmail.com', '0010010001', 1, 500000),
('12345006', 'firlyanugrah@gmail.com', '0010010001', 1, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` varchar(7) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `product_code`, `username`, `review`, `rating`) VALUES
('1234567', '0010010001', 'firlyanugrah@gmail.com', 'Barang bagus gan', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD KEY `id_transaction` (`id_transaction`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD UNIQUE KEY `id_transaction` (`id_transaction`);

--
-- Indexes for table `header_transaction`
--
ALTER TABLE `header_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_city` (`delivery_city`);

--
-- Indexes for table `ms_brand`
--
ALTER TABLE `ms_brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `ms_city`
--
ALTER TABLE `ms_city`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `ms_product`
--
ALTER TABLE `ms_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_product_2` (`id_product`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `type` (`type`),
  ADD KEY `brand` (`brand`);

--
-- Indexes for table `ms_typeproduct`
--
ALTER TABLE `ms_typeproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `ms_user`
--
ALTER TABLE `ms_user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `city` (`city`);

--
-- Indexes for table `product_transaction`
--
ALTER TABLE `product_transaction`
  ADD KEY `customer` (`customer`),
  ADD KEY `id_transaction` (`id_transaction`),
  ADD KEY `product_code` (`product_code`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `product_code` (`product_code`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD CONSTRAINT `confirmation_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `header_transaction` (`id`);

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`id_transaction`) REFERENCES `header_transaction` (`id`);

--
-- Constraints for table `header_transaction`
--
ALTER TABLE `header_transaction`
  ADD CONSTRAINT `header_transaction_ibfk_1` FOREIGN KEY (`delivery_city`) REFERENCES `ms_city` (`name`);

--
-- Constraints for table `ms_product`
--
ALTER TABLE `ms_product`
  ADD CONSTRAINT `ms_product_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `ms_brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ms_product_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `ms_typeproduct` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ms_product_ibfk_3` FOREIGN KEY (`type`) REFERENCES `ms_typeproduct` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ms_product_ibfk_4` FOREIGN KEY (`brand`) REFERENCES `ms_brand` (`name`);

--
-- Constraints for table `ms_user`
--
ALTER TABLE `ms_user`
  ADD CONSTRAINT `ms_user_ibfk_1` FOREIGN KEY (`city`) REFERENCES `ms_city` (`name`);

--
-- Constraints for table `product_transaction`
--
ALTER TABLE `product_transaction`
  ADD CONSTRAINT `product_transaction_ibfk_2` FOREIGN KEY (`customer`) REFERENCES `ms_user` (`username`),
  ADD CONSTRAINT `product_transaction_ibfk_5` FOREIGN KEY (`id_transaction`) REFERENCES `header_transaction` (`id`),
  ADD CONSTRAINT `product_transaction_ibfk_6` FOREIGN KEY (`product_code`) REFERENCES `ms_product` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_code`) REFERENCES `ms_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`username`) REFERENCES `ms_user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
