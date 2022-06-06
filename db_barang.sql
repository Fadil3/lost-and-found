-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 08:00 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`) VALUES
(11001, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(5) NOT NULL,
  `id_korban` int(5) DEFAULT NULL,
  `id_penemu` int(5) DEFAULT NULL,
  `kd_hilang` varchar(5) NOT NULL,
  `kd_approve` varchar(5) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `kategori_barang` varchar(256) NOT NULL,
  `waktu_barang` date NOT NULL,
  `lokasi_barang` varchar(256) NOT NULL,
  `deskripsi_barang` varchar(256) NOT NULL,
  `foto_barang` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_korban`, `id_penemu`, `kd_hilang`, `kd_approve`, `nama_barang`, `kategori_barang`, `waktu_barang`, `lokasi_barang`, `deskripsi_barang`, `foto_barang`) VALUES
(50058, 10013, NULL, 'ST-00', 'AP-01', 'HP Zenfone Max Pro', 'Elektronik', '2021-05-03', 'Di dekat perpustakaan diktat upi', 'Warna hape belakang biru, sediki retak pada layar, tombol kunci hilang.', '1620210948_ba3b282a62fbfe6484ce.jpg'),
(50059, 10020, NULL, 'ST-00', 'AP-01', 'Laptop Biru Terang', 'Elektronik', '2021-05-05', 'Di halaman SMAN 40 Bandung', 'Laptop berwarna biru, keyboard hitam, pelindung anti gores sudah mulai terkelupas', '1620369951_f79c9f477cae371b5938.jpg'),
(50061, NULL, 30009, 'ST-01', 'AP-01', 'Akta kelahiran', 'Dokumen', '2021-05-09', 'Di dekat fotokopian cempaka', 'Akta baru selesai dilaminating, orangnya memakai baju biru dongker', '1620654345_8737aaa3539df06ea008.jpg'),
(50062, NULL, 30009, 'ST-00', 'AP-01', 'KTM', 'Dokumen', '2021-05-25', 'di sekitar jalan setiabudhi', 'Sesuai pada gambar', '1622443400_bd4ec3c66ed2af57c795.png'),
(50063, NULL, 30011, 'ST-00', 'AP-01', 'HP Indomie', 'Elektronik', '2021-05-24', 'Di masjid Al Furqon', 'Layar HP sudah retak, Casing HP berwarna merah', '1622452897_76668c3b210c7fce824c.jpg'),
(50064, NULL, 30009, 'ST-00', 'AP-01', 'IJazah', 'Dokumen', '2022-06-06', 'FPMIPA', 'ijazah atas nama fadil', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `korban`
--

CREATE TABLE `korban` (
  `id_korban` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nama_user` varchar(256) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korban`
--

INSERT INTO `korban` (`id_korban`, `id_user`, `nama_user`, `no_telepon`, `img`) VALUES
(10013, 19092, 'jontakpor', '+628212996944', 'default-profile.png'),
(10020, 19097, 'Rayhan', '2147483647', '1621303441_ab0b58d976fd53412a06.jpg'),
(10021, 19095, 'Deden', '+628990662464', '1622444219_d9b8e730b68f984c24c9.jpg'),
(19100, 19101, 'Michael', '+628217878909', '1621434745_280dc5fddb3d4d38df36.jpg'),
(19102, 19103, 'fadil', '+622423424', '');

-- --------------------------------------------------------

--
-- Table structure for table `penemu`
--

CREATE TABLE `penemu` (
  `id_penemu` int(5) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(256) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penemu`
--

INSERT INTO `penemu` (`id_penemu`, `id_user`, `nama_user`, `no_telepon`, `img`) VALUES
(30009, 19092, 'jontakpor', '+62821299694', 'default-profile.png'),
(30010, 19097, 'Rayhan', '2147483647', '1621303441_ab0b58d976fd53412a06.jpg'),
(30011, 19095, 'Deden', '+62899066246', '1622444219_d9b8e730b68f984c24c9.jpg'),
(30015, 19101, 'Michael', '+62821787890', '1621434745_280dc5fddb3d4d38df36.jpg'),
(30017, 19103, 'fadil', '+622423424', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_barang`
--

CREATE TABLE `pengajuan_barang` (
  `id_pengajuan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_korban` int(11) DEFAULT NULL,
  `id_penemu` int(11) DEFAULT NULL,
  `konfirmasi_pengajuan` tinyint(1) NOT NULL DEFAULT 0,
  `waktu_diajukan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_barang`
--

INSERT INTO `pengajuan_barang` (`id_pengajuan`, `id_barang`, `id_korban`, `id_penemu`, `konfirmasi_pengajuan`, `waktu_diajukan`) VALUES
(123043, 50058, 10013, 30015, 0, '2021-05-19 14:32:33'),
(123045, 50062, 10021, 30009, 0, '2021-05-31 09:34:17'),
(123046, 50058, 10013, 30011, 0, '2021-05-31 09:34:25'),
(123047, 50064, 19102, 30009, 0, '2022-06-06 05:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `status_barang`
--

CREATE TABLE `status_barang` (
  `kd_status` varchar(10) NOT NULL,
  `keterangan_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_barang`
--

INSERT INTO `status_barang` (`kd_status`, `keterangan_status`) VALUES
('AP-00', 'Barang belum diapprove admin'),
('AP-01', 'Barang sudah diapprove admin'),
('ST-00', 'Barang belum ditemukan'),
('ST-01', 'Barang sudah ditemukan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_no_telepon` varchar(20) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_instagram` varchar(256) NOT NULL,
  `user_facebook` varchar(256) NOT NULL,
  `user_alamat` varchar(256) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 1,
  `user_img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_no_telepon`, `user_created_at`, `user_instagram`, `user_facebook`, `user_alamat`, `user_role`, `user_img`) VALUES
(19089, 'Fadil', 'Fadilfadil@gmail.com', '$2y$10$oncsI/69RWYEnoM1E2MFS.HHBjH9AmpwUccSg21zqdFpnWXWCmS9q', '2147483647', '2021-04-21 00:47:47', 'fadilIG', 'fadilFB', 'Jl.Fadil', 0, ''),
(19092, 'jontakpor', 'jontakpor@rocketmail.com', '$2y$10$rGKbnEp9l9ZS9Gb70efMB.mpNO4zLdLTwLp.ZhGQ3fbZH0qC1KFF6', '+6282129969447', '2021-04-21 08:06:35', 'illialam', 'jontakporFB', 'Jl.Kircon', 1, 'default-profile.png'),
(19094, 'fadhlirrahman', 'fadh@fadh.com', '$2y$10$QaLQDgYfUhh0.Tghsq8dGOb.OD3JxSsAQPhhBBP9bc53thGYXaWSC', '12345', '2021-04-28 15:11:35', 'fadhIG', 'fadhFB', 'Jl.Buahbatu', 1, ''),
(19095, 'Deden', 'Deden@rocketmail.com', '$2y$10$gGPeafQ8jWXoQcwz1AX.lejNIIU/utShLGp3EBw60EQ3R1vjeLa2a', '+628990662464', '2021-04-28 15:20:36', 'dedenIG', 'dedenFB', 'Jl.Ganteng Pisan', 1, '1622444219_d9b8e730b68f984c24c9.jpg'),
(19097, 'Rayhan', 'Rayhan@mail.com', '$2y$10$ZMuB7Dhbwa.1RgMJkYJuzuK4Flenbd1Yx1wXVhWS7O.Ed1icmoh1m', '2147483647', '2021-05-07 06:40:44', 'rayhanIG', 'rayhanFB', 'Jl. Antapani No.17', 1, '1621303441_ab0b58d976fd53412a06.jpg'),
(19101, 'Michael', 'mikel@mikel.com', '$2y$10$2JXJmOFr0/HmVKJVSUoPj.jtKAmCa0i5KA0SFNyy62FAVUlK6zTYq', '+628217878909', '2021-05-15 08:55:18', 'mikelIG', 'mikelFB', 'Jl. Pondok Indah No.5', 1, '1621434745_280dc5fddb3d4d38df36.jpg'),
(19103, 'fadil', 'fadil@mail.com', '$2y$10$b/ZL.3vvOUEL32rafVoddumYGDcbwMDamSoVOW2cyI4kXCoJZXfRK', '+622423424', '2022-06-06 05:56:56', 'aa', 'vv', 'bekasi', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_korban_in_barang` (`id_korban`),
  ADD KEY `id_penemu_in_barang` (`id_penemu`),
  ADD KEY `kd_hilang_in_barang` (`kd_hilang`),
  ADD KEY `kd_approve_in_barang` (`kd_approve`);

--
-- Indexes for table `korban`
--
ALTER TABLE `korban`
  ADD PRIMARY KEY (`id_korban`),
  ADD KEY `id_user_in_korban` (`id_user`);

--
-- Indexes for table `penemu`
--
ALTER TABLE `penemu`
  ADD PRIMARY KEY (`id_penemu`),
  ADD KEY `id_user_in_tpenemu` (`id_user`);

--
-- Indexes for table `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_penemu_in_pengajuan_barang` (`id_penemu`),
  ADD KEY `id_korban_in_pengajuan_barang` (`id_korban`),
  ADD KEY `id_barang_in_pengajuan_barang` (`id_barang`);

--
-- Indexes for table `status_barang`
--
ALTER TABLE `status_barang`
  ADD PRIMARY KEY (`kd_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50065;

--
-- AUTO_INCREMENT for table `korban`
--
ALTER TABLE `korban`
  MODIFY `id_korban` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19103;

--
-- AUTO_INCREMENT for table `penemu`
--
ALTER TABLE `penemu`
  MODIFY `id_penemu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30018;

--
-- AUTO_INCREMENT for table `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123048;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `id_korban_in_barang` FOREIGN KEY (`id_korban`) REFERENCES `korban` (`id_korban`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_penemu_in_barang` FOREIGN KEY (`id_penemu`) REFERENCES `penemu` (`id_penemu`) ON DELETE CASCADE,
  ADD CONSTRAINT `kd_approve_in_barang` FOREIGN KEY (`kd_approve`) REFERENCES `status_barang` (`kd_status`),
  ADD CONSTRAINT `kd_hilang_in_barang` FOREIGN KEY (`kd_hilang`) REFERENCES `status_barang` (`kd_status`);

--
-- Constraints for table `korban`
--
ALTER TABLE `korban`
  ADD CONSTRAINT `id_user_in_korban` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `penemu`
--
ALTER TABLE `penemu`
  ADD CONSTRAINT `id_user_in_tpenemu` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  ADD CONSTRAINT `id_barang_in_pengajuan_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_korban_in_pengajuan_barang` FOREIGN KEY (`id_korban`) REFERENCES `korban` (`id_korban`),
  ADD CONSTRAINT `id_penemu_in_pengajuan_barang` FOREIGN KEY (`id_penemu`) REFERENCES `penemu` (`id_penemu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
