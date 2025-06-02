-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.39 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sistem_informasi_qurban
CREATE DATABASE IF NOT EXISTS `sistem_informasi_qurban` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sistem_informasi_qurban`;

-- Dumping structure for table sistem_informasi_qurban.distribusi
CREATE TABLE IF NOT EXISTS `distribusi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `jumlah_daging` int NOT NULL,
  `status_ambil` enum('belum','diambil') NOT NULL DEFAULT 'belum',
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`),
  CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sistem_informasi_qurban.distribusi: ~0 rows (approximately)
INSERT INTO `distribusi` (`id`, `user_id`, `jumlah_daging`, `status_ambil`, `token`, `created_at`) VALUES
	(1, 9, 6838, 'belum', 'dd7fef3617485853969a', NULL),
	(2, 10, 5128, 'belum', '72573b83c0ac4e8e81ea', NULL),
	(3, 11, 5128, 'belum', 'd2fdd8437ddf147c66e1', NULL),
	(4, 12, 5128, 'belum', 'ae40a4b92898cf9e3a48', NULL),
	(5, 13, 5128, 'belum', '72cebc0ad6d91280546e', NULL),
	(6, 14, 5128, 'belum', '94ecc88fb2f2e16612d8', NULL),
	(7, 15, 5128, 'belum', '3152e1a67a10b6f86693', NULL),
	(8, 16, 5128, 'belum', '826e23fc3705d6a168d5', NULL),
	(9, 17, 5128, 'belum', 'c46cabce4e8892efa637', NULL),
	(10, 18, 5128, 'belum', 'f4efc27a6a7096b0e6db', NULL),
	(11, 19, 5128, 'belum', '1246a0d042d31efd16b9', NULL),
	(12, 20, 5128, 'belum', 'a9c3cbaf8da1dcfdec23', NULL),
	(13, 21, 5128, 'belum', '0a9c6c3b33fa548927c0', NULL),
	(14, 22, 5128, 'belum', '7c7c6f97925a411ea855', NULL),
	(15, 23, 5128, 'belum', 'd1657a58fa4f95845bce', NULL),
	(16, 24, 5128, 'belum', '5cb309bf8896111f2536', NULL),
	(17, 25, 6838, 'belum', '6355685b5612a9ee64b9', NULL),
	(18, 26, 1709, 'belum', 'b7763281eec0addab817', NULL),
	(19, 27, 1709, 'belum', '29174cb543f5208d28b6', NULL),
	(20, 28, 1709, 'belum', 'f4dc6fce2b8c6a24be33', NULL),
	(21, 29, 6838, 'belum', 'bfc96960d0a6b83c51c1', NULL),
	(22, 30, 6838, 'belum', 'd332caed992ac1d8aea8', NULL),
	(23, 31, 1709, 'belum', '077729fe6f359e9b8f6b', NULL),
	(24, 32, 6838, 'belum', '85af53d4380c6a3ff6af', NULL),
	(25, 33, 1709, 'belum', 'aa602cacde3a8e7758fb', NULL),
	(26, 34, 1709, 'belum', '983012c7dd9ce2e5b021', NULL),
	(27, 35, 6838, 'belum', '88b7bbeffc3f962e2274', NULL),
	(28, 36, 1709, 'belum', '371697b162d4c0c40fb7', NULL),
	(29, 37, 1709, 'belum', '8100b71c54437dc926d0', NULL),
	(30, 38, 1709, 'belum', '182ea3ffff807c7de621', NULL),
	(31, 39, 1709, 'belum', '35bb04c45078152c79d8', NULL),
	(32, 40, 6838, 'belum', 'ba53f14d6afae3da6a06', NULL),
	(33, 41, 1709, 'belum', 'e1ff6c4411cb725e9167', NULL),
	(34, 42, 1709, 'belum', '6461bd28b730eafd9270', NULL),
	(35, 43, 1709, 'belum', '4869759bf1640c74be80', NULL),
	(36, 44, 1709, 'belum', '4bb70186ee4f26062cc6', NULL),
	(37, 45, 1709, 'belum', 'ef021b2c52b02a7af1f7', NULL),
	(38, 46, 1709, 'belum', '1bfb0e0b2b5d8c11eb81', NULL),
	(39, 47, 1709, 'belum', 'ce6bc0423247845bf749', NULL),
	(40, 48, 1709, 'belum', '03fe337eb1d767fdc46e', NULL),
	(41, 49, 1709, 'belum', '7246b483d712c820059a', NULL),
	(42, 50, 6838, 'belum', '47df0b1d3916f7f95b3c', NULL),
	(43, 51, 1709, 'belum', 'b94cb4bae1ad34fc16f6', NULL),
	(44, 52, 1709, 'belum', 'fe51159f80ceb4287279', NULL),
	(45, 53, 6838, 'belum', 'e409436661b79dd00a5e', NULL),
	(46, 54, 1709, 'belum', '2405a6a7ab741ce54c09', NULL),
	(47, 55, 1709, 'belum', '7805b3b49008822f7eab', NULL),
	(48, 56, 1709, 'belum', 'b12706d36570dd53e2c3', NULL),
	(49, 57, 1709, 'belum', '031563407989aa075695', NULL),
	(50, 58, 1709, 'belum', 'c93ff252e34675197693', NULL),
	(51, 59, 1709, 'belum', 'f554b4efcdac96f8dd91', NULL),
	(52, 60, 1709, 'belum', '247b0153d9ac52e50c61', NULL),
	(53, 61, 1709, 'belum', '70a8bcf4ab695bd7f6cf', NULL),
	(54, 62, 1709, 'belum', '9ef55a35da5587c418e4', NULL),
	(55, 63, 1709, 'belum', 'c07cbaabc206b7032f0e', NULL),
	(56, 64, 1709, 'belum', '48b60241f35a3075c886', NULL),
	(57, 65, 1709, 'belum', '05a52095093c5f3f5874', NULL),
	(58, 66, 1709, 'belum', '76c3aa495892f7bc0052', NULL),
	(59, 67, 1709, 'belum', '95f200625982669516a4', NULL),
	(60, 68, 1709, 'belum', '939edf4821ae6f8fc194', NULL);

-- Dumping structure for table sistem_informasi_qurban.hewans
CREATE TABLE IF NOT EXISTS `hewans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` enum('sapi','kambing') NOT NULL,
  `harga` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sistem_informasi_qurban.hewans: ~0 rows (approximately)
INSERT INTO `hewans` (`id`, `jenis`, `harga`, `created_at`) VALUES
	(1, 'sapi', 3000000, '2025-06-02 17:49:27'),
	(2, 'kambing', 2700000, '2025-06-02 17:50:06');

-- Dumping structure for table sistem_informasi_qurban.keuangan
CREATE TABLE IF NOT EXISTS `keuangan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipe` enum('masuk','keluar') NOT NULL,
  `kategori` varchar(50) NOT NULL DEFAULT '',
  `jumlah` int NOT NULL DEFAULT '0',
  `catatan` text NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sistem_informasi_qurban.keuangan: ~0 rows (approximately)

-- Dumping structure for table sistem_informasi_qurban.qurbans
CREATE TABLE IF NOT EXISTS `qurbans` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT '0',
  `hewan_id` int DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `status_bayar` enum('sudah','belum') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__users` (`user_id`),
  KEY `FK2_hewan` (`hewan_id`),
  CONSTRAINT `FK2_hewan` FOREIGN KEY (`hewan_id`) REFERENCES `hewans` (`id`),
  CONSTRAINT `FK__users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sistem_informasi_qurban.qurbans: ~9 rows (approximately)
INSERT INTO `qurbans` (`id`, `user_id`, `hewan_id`, `jumlah`, `status_bayar`, `created_at`) VALUES
	(4, 9, 1, 1, NULL, NULL),
	(5, 25, 1, 1, NULL, NULL),
	(6, 29, 1, 1, NULL, NULL),
	(7, 30, 2, 1, NULL, NULL),
	(8, 32, 1, 1, NULL, NULL),
	(9, 35, 1, 1, NULL, NULL),
	(10, 40, 1, 1, NULL, NULL),
	(11, 50, 2, 1, NULL, NULL),
	(12, 53, 1, 1, NULL, NULL);

-- Dumping structure for table sistem_informasi_qurban.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `role` enum('warga','panitia','berqurban','admin') NOT NULL DEFAULT 'warga',
  `nik` varchar(20) DEFAULT NULL,
  `alamat` text,
  `no_hp` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table sistem_informasi_qurban.users: ~61 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `nik`, `alamat`, `no_hp`, `created_at`) VALUES
	(8, 'Admin RT', 'adminrt', '$2y$10$BhnjfpnUcS6M7FR4wPPTcu2Rfsw5nsRydanZvfiUZKg53oLzbZUZm', 'admin', '3171020100000001', 'Jl. Mawar No. 1', '081234567890', NULL),
	(9, 'Budi Speed', 'budi', '$2y$10$2hoyZulDMK3Ta/EjCdvGiOTVZme4qpweoQqMz2V/edWlMqqnqfvmG', 'berqurban', '3171020100000002', 'Jl. Melati No. 2', '081234567891', NULL),
	(10, 'Siti Aminah', 'siti', '$2y$10$xtiu9K3pNrQ7Rv0WfObBF.xzhwZCJ1Y79oSQ.bXpQ9Joxa.su6s3G', 'panitia', '3171020100000003', 'Jl. Melati No. 3', 'Jl. Melati No. 3', NULL),
	(11, 'Rina Wulandari', 'rina', '$2y$10$Gqblv5yU9VrNWD0vOPKMN.Lcv8D7ee89FfroFmV53SM6DkuLXjDMu', 'panitia', '3171020100000004', 'Jl. Anggrek No. 1', '081234567893', NULL),
	(12, 'Doni Prasetyo', 'doni', '$2y$10$w2gAvR1IF6ZXl6h5OMYvY.KudaM1V4aH4GtYCU7cuB3SWgGQ4C/ya', 'panitia', '3171020100000005', 'Jl. Anggrek No. 2', '081234567894', NULL),
	(13, 'Hendra Saputra', 'hendra', '$2y$10$iEO64mOXINJyFHFbyeYA5OFEGjyT/9wpLwDa4FR54Yllo.otu6h/a', 'panitia', '3573052411850006', 'Jl. Dahlia No. 1', '081234567895', NULL),
	(14, 'Nia Kurniawati', 'nia', '$2y$10$kCNHjG7VoC1sGm1SmuLZB.a0zfYm8vOwzINH2vqmfdbzpEQRppjru', 'panitia', '3171020100000007', 'Jl. Dahlia No. 2', '081234567896', NULL),
	(15, 'Rudi Hartono', 'rudi', '$2y$10$47eXr3gLAn.ceUtY8TiLMehUSNmyD.iTNqqvfmJoqzjmqBYKTmteK', 'panitia', '3171020100000008', 'Jl. Sakura No. 3', '081234567897', NULL),
	(16, 'Dewi Lestari', 'dewi', '$2y$10$fDwnYcLWzKUpJ5JDr.apcOlpvcRtJZC.nh329KMbN8RLDPv/CBl1e', 'panitia', '3171020100000009', 'Jl. Sakura No. 2', '081234567898', NULL),
	(17, 'Yusuf Maulana', 'yusuf', '$2y$10$50L1XAK0Nb0oXfWXgbRCU.1/Dnn1LkQ7zJvsqJmMVkx.QZgy6WhXS', 'panitia', '3171020100000010', 'Jl. Kenanga No. 1', '081234567899', NULL),
	(18, 'Ahmad Fauzi', 'ahmad11', '$2y$10$zqUsxySK35kf3OYYtneGWO.6CRrp7vyNVNvVwXQ45l3spE9X1.0MK', 'panitia', '317102010000011', 'Jl. Kenanga No. 2', '081234567811', NULL),
	(19, 'Bella Putri', 'bella12', '$2y$10$CPBktKy2dB21R0akCw/DYey.FO2sCdIKWh6RTGULNODD44uaa8uN2', 'panitia', '317102010000012', 'Jl. Flamboyan No. 1', '081234567812', NULL),
	(20, 'Candra Wijaya', 'candra13', '$2y$10$oFxI2y.N9ovnUyBtRLYmc.K7UmfKO9iKk/qVszuYHHkU4.9H3XPTq', 'panitia', '317102010000013', 'Jl. Flamboyan No. 2', '081234567813', NULL),
	(21, 'Dina Marlina', 'dina14', '$2y$10$E5lkxSnGIeqyCTUPBx7auekYmGbpStOhN5b6w6yXoyrPkSoUdG9hq', 'panitia', '317102010000014', 'Jl. Flamboyan No. 3', '081234567814', NULL),
	(22, 'Eko Prasetyo', 'eko15', '$2y$10$oi2GjjLGGaqe0zW0vT9f4uxm0kcHr9VgEX45sDV9K2RnvkEE9YIhy', 'panitia', '317102010000015', 'Jl. Anggrek No. 4', '081234567815', NULL),
	(23, 'Fitriani', 'fitri16', '$2y$10$igxyFkn4rV9k49ZxA70yYOL.LtH1p/qjJcB8BNTD/gS.PZiqNm3Jy', 'panitia', '317102010000016', 'Jl. Anggrek No. 5', '081234567816', NULL),
	(24, 'Galih Permana', 'galih17', '$2y$10$NUycQrMY3P/KXvmMDHx6dOBt17pWqTHS3HCzThz4MBm91gGEFZT6i', 'panitia', '317102010000017', 'Jl. Mawar No. 6', '081234567817', NULL),
	(25, 'Hesti Rahayu', 'hesti18', '$2y$10$thZvV53KaCKkJWVUmzd9eugCNEZEWeWXZMG9vTk3.D5nIpvmV2FqG', 'berqurban', '317102010000018', 'Jl. Mawar No. 7', '081234567818', NULL),
	(26, 'Irfan Setiawan', 'irfan19', '$2y$10$5gqtrTGrid2EiSGcZvT4Le/kZ7jt/Lbhgf/..lCPLeg5QRAcM6Z5.', 'warga', '317102010000019', 'Jl. Melati No. 8', '081234567819', NULL),
	(27, 'Joko Susilo', 'joko', '$2y$10$hM91rzVR9rVRbWU496cQG.pqYGqNhxumD4ah1ECci1vy07R0xoesC', 'warga', '317102010000020', 'Jl. Melati No. 9', '081234567820', NULL),
	(28, 'Kurnia Dewi', 'kurnia21', '$2y$10$MzLmqK7/Tpz920GATdQPXu1dhl3EEZKTN3CwdUZsz/RlifesOKQW6', 'warga', '317102010000021', 'Jl. Dahlia No. 10', '081234567821', NULL),
	(29, 'Lina Handayani', 'lina22', '$2y$10$9pOfag8uubI4bAXD3xHUA.l1Iy9uhnEo1MSQD/vI1bbwhpk7fHg1a', 'berqurban', '317102010000022', 'Jl. Dahlia No. 11', '081234567822', NULL),
	(30, 'Maman Sutarman', 'maman23', '$2y$10$ebzmbnTfnDFMbarQn8qlsO3qXJOoxDzccK1Cy6V/JVy4Y605Bq7y2', 'berqurban', '317102010000023', 'Jl. Sakura No. 12', '081234567823', NULL),
	(31, 'Nia Kurniasih', 'nia24', '$2y$10$7armh0WXnHIq1Qkkr4/qj.oGdxdnBx2zpe8hH/qnnlgp8bTa4FgUK', 'warga', '317102010000024', 'Jl. Sakura No. 13', '081234567824', NULL),
	(32, 'Oki Setiawan', 'oki25', '$2y$10$EjaqblCVMz4L1SBJLGSRyOR8Pow4eVUFpra3ejkRaEmopYWpF6Q3K', 'berqurban', '317102010000025', 'Jl. Kenanga No. 14', '081234567825', NULL),
	(33, 'Putri Ayu', 'putri26', '$2y$10$eSdRjbRWrFXq9G2ZbN4lC.CVYYv5r4fqk3zgjg4CDsF4ou.Vxf6AC', 'warga', '317102010000026', 'Jl. Kenanga No. 15', '081234567826', NULL),
	(34, 'Rian Pratama', 'rian27', '$2y$10$PbGS0/q7fPdg5.a4b9aNFON.PjQDGNdGKpTuVhJp/avIAllz74Qfi', 'warga', '317102010000027', 'Jl. Flamboyan No. 16', '081234567827', NULL),
	(35, 'Santi Wijaya', 'santi28', '$2y$10$8m7K7OnxyRxOcYFyLVWrTOzCSKWdbC3rZHh3224U1hKiaBBbUr7ey', 'berqurban', '317102010000028', 'Jl. Flamboyan No. 17', '081234567828', NULL),
	(36, 'Tono Gunawan', 'tono29', '$2y$10$OPVTeXypMkOPg0nsmyXL/uUIPCAY/pn/Delj2B5/S9QWpTvSmHeI.', 'warga', '317102010000029', 'Jl. Anggrek No. 18', '081234567829', NULL),
	(37, 'Umi Kulsum', 'umi30', '$2y$10$dtB4i1T.3re2DV2ZDP8M8O56QU6JxuaozL5lKJFXpdcNTF3hrUjcC', 'warga', '317102010000030', 'Jl. Anggrek No. 19', '081234567830', NULL),
	(38, 'Vina Oktaviani', 'vina31', '$2y$10$5A0WBYP4fpmjF2Kg.nrHn.L.CfWMOk1PO11ag03vfAd8fScza6DUS', 'warga', '317102010000031', 'Jl. Mawar No. 20', '081234567831', NULL),
	(39, 'Wawan Kurniawan', 'wawan32', '$2y$10$XiufhxzfcSNDgzTs9isLHOfLU8FFFmEeN.Q9kT5lrGHP0alE1nw.q', 'warga', '317102010000032', 'Jl. Mawar No. 21', '081234567832', NULL),
	(40, 'Xena Valentina', 'xena33', '$2y$10$vvOtuzj42juXMFHSDHVufufGNCz7j6BmG0faF5mYFY450yb91zWaO', 'berqurban', '317102010000033', 'Jl. Melati No. 22', '081234567833', NULL),
	(41, 'Yudi Hermawan', 'yudi34', '$2y$10$AS3/MM.KkAB38VOohlbla.NOZI36pz7nPnGquxNGQplPmFSNkUkMu', 'warga', '317102010000034', 'Jl. Melati No. 23', '081234567834', NULL),
	(42, 'Zaskia Adya', 'zaskia35', '$2y$10$LsXUl7wXyaLKSEWIe75bhuWAnsJdelk0zxi5YfaxhFTpUMdNYhJ/.', 'warga', '317102010000035', 'Jl. Dahlia No. 24', '081234567835', NULL),
	(43, 'Arif Budiman', 'arif36', '$2y$10$/vytoGl6yz9qg0Ab/e.0GOlPBKOwfKZHNLcqiuNj0H715Hd16XsBW', 'warga', '317102010000036', 'Jl. Dahlia No. 25', '081234567836', NULL),
	(44, 'Bunga Citra', 'bunga37', '$2y$10$H4oCJE8qIxLVdfZca1ruLugX.BTaH.BMyrNqljLSWRY21oouk1cZ.', 'warga', '317102010000037', 'Jl. Sakura No. 26', '081234567837', NULL),
	(45, 'Cahyo Purnomo', 'cahyo38', '$2y$10$g9ugHkQ/9nIJhuBw04Rf/uQS02EjetpZZWBJIbBHkzVkCtN/B5JeK', 'warga', '317102010000038', 'Jl. Sakura No. 27', '081234567838', NULL),
	(46, 'Dedi Susanto', 'dedi39', '$2y$10$NKpB96B0mn/n7Mq6YvaHFe0OCghHqXG2vHkmbhIJL22XhhrMBRzJu', 'warga', '317102010000039', 'Jl. Kenanga No. 28', '081234567839', NULL),
	(47, 'Elsa Fitriani', 'elsa40', '$2y$10$kZuZhQrpcD/lVVXRCHRdo.B6yt7SA6vR6VzorgaFXXLJpPVrkZg0a', 'warga', '317102010000040', 'Jl. Kenanga No. 29', '081234567840', NULL),
	(48, 'Fajar Nugroho', 'fajar41', '$2y$10$uGwURcd4/eZXzrN9J29m7uzIyk7PHBip47/SFZ2jhQoW2u3pS5zmC', 'warga', '317102010000041', 'Jl. Flamboyan No. 30', '081234567841', NULL),
	(49, 'Gita Permata', 'gita42', '$2y$10$h5ECOCAVyAMpzQ2.FLkukuiHCcSKolJSJBw0Xmt5ZeT6pb03R.61G', 'warga', '317102010000042', 'Jl. Flamboyan No. 31', '081234567842', NULL),
	(50, 'Heru Santoso', 'heru43', '$2y$10$F8aT.kS6clNMDyJk/vs9W.D.BKHN7jsvBEarlwUbDM2Zy68FCucp.', 'berqurban', '317102010000043', 'Jl. Anggrek No. 32', '081234567843', NULL),
	(51, 'Intan Permata', 'intan44', '$2y$10$P.kJIxatVNRtYAnVCB/S4uKWsCP78Vt1kDVUJvB.152ho0K.qAP6i', 'warga', '317102010000044', 'Jl. Anggrek No. 33', '081234567844', NULL),
	(52, 'Jefri Alexander', 'jefri45', '$2y$10$swBlgtVtDYA9RCh1Mr20gePHqykmGQtKu7PRzA/WyAU5hJkWsniZm', 'warga', '317102010000045', 'Jl. Mawar No. 34', '081234567845', NULL),
	(53, 'Kiki Amalia', 'kiki46', '$2y$10$zK83tY6IIBoro2pnqT7CPOI84M7BWL2yK5Krm7AG4UkyAjKsvvggi', 'berqurban', '317102010000046', 'Jl. Mawar No. 35', '081234567846', NULL),
	(54, 'Luki Setiawan', 'luki47', '$2y$10$QSR7TnRdQzsS56EV2t/IMuFK72ybNa78Efut/VFvAWERlkC1ZZrpm', 'warga', '317102010000047', 'Jl. Melati No. 36', '081234567847', NULL),
	(55, 'Maya Sari', 'maya48', '$2y$10$9TUGJs8K0qxi/Z1YgQ.kgeQLIwoluQjXXzJPFySYLZVPDNc6uKARO', 'warga', '317102010000048', 'Jl. Melati No. 37', '081234567848', NULL),
	(56, 'Nando Pratama', 'nando49', '$2y$10$WawRkChoecUhhs7ip/HrZ.ccTk.Th.WgKOgPhlD5ARQ1WlglI7YOK', 'warga', '317102010000049', 'Jl. Dahlia No. 38', '081234567849', NULL),
	(57, 'Oki Maulana', 'oki50', '$2y$10$uGJlYY/JATeCDA40Vv.ceOGVL9bdXisoXfdZeiepP/JOp5oFVfPYG', 'warga', '317102010000050', 'Jl. Dahlia No. 39', '081234567850', NULL),
	(58, 'Putra Ramadhan', 'putra51', '$2y$10$IU24XfAcHESJm8kJLxzfi.CqK3dWE0PLABRurldjOVZLtrzdiGV5e', 'warga', '317102010000051', 'Jl. Sakura No. 40', '081234567851', NULL),
	(59, 'Queen Amelia', 'queen52', '$2y$10$44zdpGXNzHOeF3/xHJCx6.wpiv.bnn7xU83YlA9v24P.AzwxpppHC', 'warga', '317102010000052', 'Jl. Sakura No. 41', '081234567852', NULL),
	(60, 'Rizky Fadilah', 'rizky53', '$2y$10$XsW2NUmgUMEncNRhevWaAeKkaB2F5mUXk/IfAwi64JVHoK8sHKilq', 'warga', '317102010000053', 'Jl. Kenanga No. 42', '081234567853', NULL),
	(61, 'Siska Nurhayati', 'siska54', '$2y$10$4FV6RkZRCh8QCvZMNbl73ecV4sxvSgn/B3Bjay/Xwh8yFGTFD6Z22', 'warga', '317102010000054', 'Jl. Kenanga No. 43', '081234567854', NULL),
	(62, 'Taufik Hidayat', 'taufik55', '$2y$10$Isrg1i1fhNaTBeO5Wb7avOkfZiO/GIAfepKxFw8reuFklZWYxwa5C', 'warga', '317102010000055', 'Jl. Flamboyan No. 44', '081234567855', NULL),
	(63, 'Ujang Suryana', 'ujang56', '$2y$10$mFLIEXYxTZcULtk/GlTaUuIsmQUeOzavfCXTLiSys9y6YDzD0GO/m', 'warga', '317102010000056', 'Jl. Flamboyan No. 45', '081234567856', NULL),
	(64, 'Vino Bastian', 'vino57', '$2y$10$FCmSkznEiJfar6XacDDMdeRd8saU.qIR6Nt8pW94ugc.4v641Xqo.', 'warga', '317102010000057', 'Jl. Anggrek No. 46', '081234567857', NULL),
	(65, 'Wulan Dari', 'wulan58', '$2y$10$QCG.5sjNW2dAmVGcG7upxOSVjuqlXOnbzQDpExxAPmrjhAS9Exbly', 'warga', '317102010000058', 'Jl. Anggrek No. 47', '081234567858', NULL),
	(66, 'Yani Susanti', 'yani59', '$2y$10$86lW9j0IliIgmFrh7yf8luyMJxxZGTI0mGUldQEhmRoaA5QOZN1Q.', 'warga', '317102010000059', 'Jl. Mawar No. 48', '081234567859', NULL),
	(67, 'Zaki Ahmad', 'zaki60', '$2y$10$te7HIDJ1vh/XhpVmc9CI5eYD3eQaNxgRS20WTKuRod3XDLENHD.CO', 'warga', '317102010000060', 'Jl. Mawar No. 49', '081234567860', NULL),
	(68, 'Adi Nugroho', 'adi61', '$2y$10$Rtagkg9wwSx1zMLZ8lE4h.uhlEeRfnF2SGDNEpYnHR0Ue09I0qpnC', 'warga', '317102010000061', 'Jl. Melati No. 50', '081234567861', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
