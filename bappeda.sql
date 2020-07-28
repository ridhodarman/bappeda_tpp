-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2020 at 06:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bappeda`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_pengguna` varchar(40) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `nama_pengguna`, `role`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Super Admin', 'admin'),
('bendahara', 'c9ccd7f3c1145515a9d3f7415d5bcbea', 'IMELIA MUSTHAFA, S.Ip', 'bendahara'),
('sekretaris', 'ce1023b227de5c34b98c470cda4699bb', 'Alfian, SE', 'sekretaris');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_gol_pangkat` varchar(50) NOT NULL,
  `pajak` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nama_gol_pangkat`, `pajak`) VALUES
(1, '1a', 0),
(2, '1b', 0),
(3, '1c', 0),
(4, '1d', 0),
(5, '2a', 0),
(6, '2b', 0),
(7, '2c', 0),
(8, '2d', 0),
(9, '3a', 5),
(10, '3b', 5),
(11, 'III C / Penata', 5),
(12, 'III D / Penata Tingkat I', 5),
(13, 'IV A / Pembina', 15),
(14, 'IV B / Pembina Tingkat I', 15),
(15, 'IV C / Pembina Utama Muda', 15),
(16, 'IV D / Pembina Utama Madya', 15),
(19, 'IV E / Pembina Utama', 15),
(20, 'Dan lain-lain / PTT / PNPN', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(90) NOT NULL,
  `beban_kerja_skp` int(11) NOT NULL,
  `kehadiran` int(11) NOT NULL,
  `potongan_bpjs` double NOT NULL,
  `pertimbangan_objektif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `beban_kerja_skp`, `kehadiran`, `potongan_bpjs`, `pertimbangan_objektif`) VALUES
(1, 'KEPALA', 3250000, 3250000, 1, 2920000),
(2, 'Sekretaris', 2175000, 2175000, 1, 1200000),
(3, 'Kabid. Perencanaan, Pengendalian, dan Evaluasi Pembangunan Daerah\r\n', 2100000, 2100000, 1, 960000),
(4, 'Kabid. Perekonomian dan Sumber Daya Alam', 2100000, 2100000, 1, 960000),
(5, 'Kabid. Infrastruktur dan Kewilayahan', 2100000, 2100000, 1, 960000),
(6, 'Kabid. Pemerintahan dan Pembangunan Manusia', 2100000, 2100000, 1, 960000),
(7, 'Kabid. Penelitian dan Pengembangan', 2100000, 2100000, 1, 960000),
(8, 'Kasubag. Umum dan Kepegawaian', 1125000, 1125000, 1, 800000),
(9, 'Kasubag. Program', 1125000, 1125000, 1, 800000),
(10, 'Kasubag. Keuangan', 1125000, 1125000, 1, 800000),
(11, 'Kasubid. Pendidikan, Kebudayaan, Pariwisata, dan Pemuda Olah Raga\r\n', 1125000, 1125000, 1, 800000),
(12, 'Kasubid Perumahan, Pemukiman, Pertanahan dan lingkungan Hidup\r\n', 1125000, 1125000, 1, 800000),
(13, 'Kasubid Ekonomi dan Pembangunan', 1125000, 1125000, 1, 800000),
(14, 'Kasubid. Perencanaan dan Pendanaan', 1125000, 1125000, 1, 800000),
(15, 'Kasubid. Penanaman Modal, Kerjasama dan Keuangan', 1125000, 1125000, 1, 800000),
(16, 'Kasubid. Kesehatan, Kependudukan dan Keluarga Berencana\r\n', 1125000, 1125000, 1, 800000),
(17, 'Kasubid. Pemerintahan, Pemberdayaan,  Ketertiban Umum dan Sosial\r\n', 1125000, 1125000, 1, 800000),
(18, 'Kasubid. Tenaga Kerja, Perindustrian, Koperasi UMKM, dan Perdagangan\r\n', 1125000, 1125000, 1, 800000),
(19, 'Kasubid, Pekerjaan Umum dan Penataan Ruang', 1125000, 1125000, 1, 800000),
(20, 'Kasubid. Inovasi dan Teknologi', 1125000, 1125000, 1, 800000),
(21, 'Kasubid. Data dan Informasi', 1125000, 1125000, 1, 800000),
(22, 'Kasubid. Sosbud, Kependudukan dan Pemberdayaan Masyarakat\r\n', 1125000, 1125000, 1, 800000),
(23, 'Kasubid. Pengendalian, Evaluasi dan Pelaporan', 1125000, 1125000, 1, 800000),
(24, 'Kasubid. Kelautan, Perikanan, Pertanian dan Pangan', 1125000, 1125000, 1, 800000),
(25, 'Jabatan Fungsional Umum', 675000, 675000, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_rekening` varchar(15) NOT NULL,
  `id_golongan` int(11) DEFAULT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `no_rekening`, `id_golongan`, `id_jabatan`) VALUES
('19621026 198903 2 ', 'ROZANA, SE', '1001021004044', 12, 10),
('19651014 198601 1', 'ALFIAN, SE', '10010203021172', 14, 2),
('19680106 199308 2 ', 'RITA ENGLENI, SH, MSi', '10010210052772', 13, 3),
('19681213 198903 1 ', 'DESFI HENDRI, SE.,M.Ec.Dev', '10010203005322', 13, 7),
('19701128 199003 1 ', 'Drs. SYAHENDRI BARKAH', '10010210034356', 13, 4),
('19730724 200212 1 ', 'RAF INDRIA, ST, MT', '10010203001298', 13, 5),
('197405111995011001', 'Drs. MAIHENDRIZON M, MT', '10010203039946', 13, 6),
('19750502 199903 1 ', 'H. MEDI ISWANDI, ST, MM', '10000210346862', 15, 1),
('19760610 200501 2 ', 'WIWI NELZA, ST, MT', '10010210025653', 12, 8),
('19780302 201001 2 ', 'SILMI KHAIRIYA, SE. Akt, M.Si', '10010210033042', 11, 9),
('19800124 200501 1 ', 'INDRA SAPUTRA, ST, MT, M. Sc', '10010210039688', 12, 14),
('19830425 201001 1 ', 'DAVID FERDINAND, SH, MH', '10050213010017', 12, 17),
('nip_13', 'FERRID SYAF PUTRA, ST, ME', '10000210039193', 12, 18),
('nip_15', 'NUR HAKIM, S.ST, MT', '10010210016895', 11, 12),
('nip_16', 'WIDIAWATY LIVIA, SE', '10010203002655', 11, 13),
('nip_17', 'JACKY MARKLIN, SE. Akt, M.Si', '10010203005954', 11, 15),
('nip_18', 'DEFI LORA, ST, M.Si', '10010207029874', 11, 16),
('nip_19', 'LILI RAHMAINI , ST', '21040207080595', 11, 19),
('nip_20', 'ADE WINATA ZAIMARDI, S.Si, MM', '10140210034772', 11, 21),
('nip_21', 'ELVIA SISKHA SARI, S.T', '10010210017531', 11, 22),
('nip_22', 'RULLI SAPUTRA, SST, M.Si', '21030210000783', 11, 23),
('nip_23', 'HALIMAH TUSA\'DIAH, S.E, M.Si', '10010210024520', 11, 24),
('nip_24', 'DEWI PRATIKA SARI, S.Kom, M. Cio', '10150210002506', 10, 20),
('nip_25', 'GUSNENI, S. Sos?', '10010210033339', 12, 25),
('nip_26', 'ZULRAIDA', '1001021005406-2', 10, 25),
('nip_27', 'NURDIAN, S.Kom?', '10010210021234', 12, 25),
('nip_28', 'ROSLINDA, SE?', '10010203000129', 12, 25),
('nip_29', 'YUZMEIHARMI, SE?', '10010210010339', 12, 25),
('nip_30', 'IMELIA MUSTHAFA, S.IP?', '10150210002488', 7, 25),
('nip_31', 'DEVI, S. Sos?', '10010203048176', 12, 25),
('nip_32', 'CHALIDIN, ST?', '10130213006710', 7, 25),
('nip_33', 'Dr. ANTONI TSAPUTRA, SS, Msi', '10010213000667', 7, 25),
('nip_34', 'SYIRNAWATI, S.Sos?', '10010210037564', 7, 25),
('nip_35', 'PUTRI HANNY, SH?', '10140210004007', 10, 25),
('nip_36', 'SUNARNI NINGSIH, S.Sos?', '10010210002513', 9, 25),
('nip_37', 'CEMPAKA RIZKI AMBARSARI, S.Kom?', '10000210169041', 9, 25),
('nip_38', 'RINENTIS , S. Sos?', '10010210013894', 9, 25),
('nip_39', 'ONI RISA?', '10010210003335', 7, 25),
('nip_40', 'ARDI SASMITA', '10010207046407', 8, 25),
('nip_41', 'ZULKIFLI?', '10130207008328', 7, 25),
('nip_42', 'YUNITA AZMI, A.Md', '21020210296101', 7, 25),
('nip_8', 'FERRY YUNALDI, SE. MT', '10150210003389', 13, 11);

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id_periode` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `pemotongan_kehadiran` double NOT NULL,
  `skp` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id_periode`, `nip`, `pemotongan_kehadiran`, `skp`) VALUES
(1, '19621026 198903 2 ', 0, 50),
(1, '19651014 198601 1', 0, 50),
(1, '19680106 199308 2 ', 0, 50),
(1, '19681213 198903 1 ', 0, 50),
(1, '19701128 199003 1 ', 0, 50),
(1, '19730724 200212 1 ', 0, 50),
(1, '197405111995011001', 0, 50),
(1, '19750502 199903 1 ', 0, 50),
(1, '19760610 200501 2 ', 0, 50),
(1, '19780302 201001 2 ', 0, 50),
(1, '19800124 200501 1 ', 0, 50),
(1, '19830425 201001 1 ', 0, 50),
(1, 'nip_13', 0, 50),
(1, 'nip_15', 0, 50),
(1, 'nip_16', 0, 50),
(1, 'nip_17', 0, 50),
(1, 'nip_18', 0, 50),
(1, 'nip_19', 0, 50),
(1, 'nip_20', 0, 50),
(1, 'nip_21', 0, 50),
(1, 'nip_22', 0, 50),
(1, 'nip_23', 0, 50),
(1, 'nip_24', 0, 50),
(1, 'nip_25', 0, 50),
(1, 'nip_26', 0, 50),
(1, 'nip_27', 0, 50),
(1, 'nip_28', 0, 50),
(1, 'nip_29', 0, 50),
(1, 'nip_30', 0, 50),
(1, 'nip_31', 0, 50),
(1, 'nip_32', 0, 50),
(1, 'nip_33', 0, 50),
(1, 'nip_34', 0, 50),
(1, 'nip_35', 0, 50),
(1, 'nip_36', 0, 50),
(1, 'nip_37', 0, 50),
(1, 'nip_38', 0, 50),
(1, 'nip_39', 0, 50),
(1, 'nip_40', 0, 50),
(1, 'nip_41', 0, 50),
(1, 'nip_42', 0, 50),
(1, 'nip_8', 0, 50);

-- --------------------------------------------------------

--
-- Table structure for table `periode_penerimaan`
--

CREATE TABLE `periode_penerimaan` (
  `id_periode` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode_penerimaan`
--

INSERT INTO `periode_penerimaan` (`id_periode`, `tanggal`) VALUES
(1, '2020-04-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_golongan` (`id_golongan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id_periode`,`nip`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `periode_penerimaan`
--
ALTER TABLE `periode_penerimaan`
  ADD PRIMARY KEY (`id_periode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `periode_penerimaan`
--
ALTER TABLE `periode_penerimaan`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD CONSTRAINT `penerimaan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penerimaan_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode_penerimaan` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
