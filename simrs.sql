-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 01, 2016 at 08:26 
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsudapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_antrian`
--

CREATE TABLE `db_antrian` (
  `id_antrian` int(11) NOT NULL,
  `no_antri` int(11) NOT NULL,
  `loket` varchar(45) DEFAULT NULL,
  `tipe` enum('daftar','poli','bayar') NOT NULL,
  `id_poli` int(11) DEFAULT NULL,
  `id_lab` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_apotik_obat`
--

CREATE TABLE `db_apotik_obat` (
  `id_apotik_obat` int(11) NOT NULL,
  `kode_obat` varchar(45) DEFAULT NULL,
  `nama_obat` varchar(45) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `tgl_update` timestamp NULL DEFAULT NULL,
  `jenis_update` enum('masuk','keluar') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_apotik_obat`
--

INSERT INTO `db_apotik_obat` (`id_apotik_obat`, `kode_obat`, `nama_obat`, `qty`, `tgl_update`, `jenis_update`) VALUES
(1, 'OB1', 'Puyer', 100, NULL, 'masuk'),
(2, 'OB2', 'Antibiotik', 100, NULL, 'masuk'),
(3, 'OB3', 'Parasetamol', 100, NULL, 'masuk');

-- --------------------------------------------------------

--
-- Table structure for table `db_apotik_obat_keluar`
--

CREATE TABLE `db_apotik_obat_keluar` (
  `id_apotik_obat_keluar` int(11) NOT NULL,
  `id_apotik_obat` int(11) NOT NULL,
  `qty_keluar` int(11) DEFAULT NULL,
  `tgl_keluar` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_apotik_obat_masuk`
--

CREATE TABLE `db_apotik_obat_masuk` (
  `id_apotik_obat_masuk` int(11) NOT NULL,
  `id_apotik_obat` int(11) NOT NULL,
  `qty_masuk` int(11) NOT NULL,
  `tgl_masuk` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_bangsal`
--

CREATE TABLE `db_bangsal` (
  `id_bangsal` int(11) NOT NULL,
  `kode` varchar(45) DEFAULT NULL,
  `nama_bangsal` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_bangsal`
--

INSERT INTO `db_bangsal` (`id_bangsal`, `kode`, `nama_bangsal`) VALUES
(1, 'A001', 'Apotik'),
(2, 'A002', 'Kamar Mayat'),
(3, 'B001', 'Melati'),
(4, 'B002', 'Mawar');

-- --------------------------------------------------------

--
-- Table structure for table `db_detail_pasien`
--

CREATE TABLE `db_detail_pasien` (
  `id_detail_pasien` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `pembayaran` enum('Tunai','BPJS','Asuransi') DEFAULT NULL,
  `layanan` enum('Rawat Jalan','Rawat Inap') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_detail_pasien`
--

INSERT INTO `db_detail_pasien` (`id_detail_pasien`, `id_pasien`, `pembayaran`, `layanan`) VALUES
(1, 1, 'Tunai', 'Rawat Jalan');

-- --------------------------------------------------------

--
-- Table structure for table `db_hasil_lab`
--

CREATE TABLE `db_hasil_lab` (
  `id_hasil_lab` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `id_lab` int(11) NOT NULL,
  `tgl_periksa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_hasil_labdarah`
--

CREATE TABLE `db_hasil_labdarah` (
  `id_hasil_labdarah` int(11) NOT NULL,
  `id_hasil_lab` int(11) NOT NULL,
  `haemoglobin` varchar(45) DEFAULT NULL,
  `leucocyt` varchar(45) DEFAULT NULL,
  `difrential_count` varchar(45) DEFAULT NULL,
  `laju_endap_darah` varchar(45) DEFAULT NULL,
  `malaria_ddr` varchar(45) DEFAULT NULL,
  `masa_pendarahan` varchar(45) DEFAULT NULL,
  `masa_pembekuan` varchar(45) DEFAULT NULL,
  `golongan_darah` varchar(45) DEFAULT NULL,
  `thrombocyt` varchar(45) DEFAULT NULL,
  `haematocyt` varchar(45) DEFAULT NULL,
  `rumplead` varchar(45) DEFAULT NULL,
  `tgl_periksa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_hasil_labfeces`
--

CREATE TABLE `db_hasil_labfeces` (
  `id_hasil_labfeces` int(11) NOT NULL,
  `id_hasil_lab` int(11) NOT NULL,
  `warna` varchar(45) DEFAULT NULL,
  `konsistensi` enum('padat','lembek','cair') DEFAULT NULL,
  `lendir` varchar(45) DEFAULT NULL,
  `darah` varchar(45) DEFAULT NULL,
  `tc_askaris_lumbricoides` varchar(45) DEFAULT NULL,
  `tc_ankilostonum_duodenale` varchar(45) DEFAULT NULL,
  `tc_trikuris` varchar(45) DEFAULT NULL,
  `tc_stongiloides` varchar(45) DEFAULT NULL,
  `sel_eritrosit` varchar(45) DEFAULT NULL,
  `sel_lekosit` varchar(45) DEFAULT NULL,
  `sel_epitel` varchar(45) DEFAULT NULL,
  `parasit_entamuba_histolitica` varchar(45) DEFAULT NULL,
  `parasit_entamuba_coli` varchar(45) DEFAULT NULL,
  `parasit_basil_coli` varchar(45) DEFAULT NULL,
  `sm_serat_daging` varchar(45) DEFAULT NULL,
  `sm_sisa_tumbuhan` varchar(45) DEFAULT NULL,
  `sm_globul_lemak` varchar(45) DEFAULT NULL,
  `pemeriksa` varchar(100) NOT NULL,
  `tgl_periksa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `poli_ruang` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_hasil_labhematologi`
--

CREATE TABLE `db_hasil_labhematologi` (
  `id_hasil_labhematologi` int(11) NOT NULL,
  `id_hasil_lab` int(11) NOT NULL,
  `haemoglobin` varchar(45) DEFAULT NULL,
  `lekosit` varchar(45) DEFAULT NULL,
  `hjl_eosinofil` varchar(45) DEFAULT NULL,
  `hjl_basofil` varchar(45) DEFAULT NULL,
  `hjl_netrofil` varchar(45) DEFAULT NULL,
  `hjl_limfosit` varchar(45) DEFAULT NULL,
  `hjl_monosit` varchar(45) DEFAULT NULL,
  `trombosit` varchar(45) DEFAULT NULL,
  `led_jam` varchar(45) DEFAULT NULL,
  `bleeding_time` varchar(45) DEFAULT NULL,
  `clotting_time` varchar(45) DEFAULT NULL,
  `golongan_darah` varchar(45) DEFAULT NULL,
  `rhesus` varchar(45) DEFAULT NULL,
  `malaria_ddr` varchar(45) DEFAULT NULL,
  `pemeriksa` varchar(100) NOT NULL,
  `tgl_periksa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `poli_ruang` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_hasil_labklinis`
--

CREATE TABLE `db_hasil_labklinis` (
  `id_hasil_labklinis` int(11) NOT NULL,
  `id_hasil_lab` int(11) NOT NULL,
  `protein_total` varchar(45) NOT NULL,
  `albumin` varchar(45) NOT NULL,
  `bilirubin_total` varchar(45) NOT NULL,
  `bilirubin_direct` varchar(45) NOT NULL,
  `silirubin_indirect` varchar(45) NOT NULL,
  `sgot` varchar(45) NOT NULL,
  `sgpt` varchar(45) NOT NULL,
  `ureum` varchar(45) NOT NULL,
  `creatinin` varchar(45) NOT NULL,
  `glukosa_puasa` varchar(45) NOT NULL,
  `glukosa_2_jpp` varchar(45) NOT NULL,
  `glukosa_sewaktu` varchar(45) NOT NULL,
  `trigliseride` varchar(45) NOT NULL,
  `cholestrol_total` varchar(45) NOT NULL,
  `asam_urat` varchar(45) NOT NULL,
  `rheumatoid_factor` varchar(45) NOT NULL,
  `analisis_sperma` varchar(45) NOT NULL,
  `pemeriksa` varchar(100) NOT NULL,
  `tgl_pemeriksa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_hasil_laburine`
--

CREATE TABLE `db_hasil_laburine` (
  `id_hasil_laburine` int(11) NOT NULL,
  `id_hasil_lab` int(11) NOT NULL,
  `warna` varchar(45) DEFAULT NULL,
  `bj` varchar(45) DEFAULT NULL,
  `ph` varchar(45) DEFAULT NULL,
  `leukosit` varchar(45) DEFAULT NULL,
  `nitrite` varchar(45) DEFAULT NULL,
  `protein` varchar(45) DEFAULT NULL,
  `glucosa_reduksi` varchar(45) DEFAULT NULL,
  `keton` varchar(45) DEFAULT NULL,
  `urobilinogen` varchar(45) DEFAULT NULL,
  `bilirubin` varchar(45) DEFAULT NULL,
  `eritrosit_blood` varchar(45) DEFAULT NULL,
  `tes_kehamilan` varchar(45) DEFAULT NULL,
  `komentar` text,
  `sedimen_eritrosit` varchar(45) DEFAULT NULL,
  `sedimen_lekosit` varchar(45) DEFAULT NULL,
  `sedimen_epitel` varchar(45) DEFAULT NULL,
  `silinder_jenis` varchar(45) DEFAULT NULL,
  `kristal_asam_urat` varchar(45) DEFAULT NULL,
  `kristal_triple_po4` varchar(45) DEFAULT NULL,
  `kristal_ca_oksalat` varchar(45) DEFAULT NULL,
  `kristal_ca_co3` varchar(45) DEFAULT NULL,
  `kristal_ca_po4` varchar(45) DEFAULT NULL,
  `bakteri` varchar(45) DEFAULT NULL,
  `jamur` varchar(45) DEFAULT NULL,
  `pemeriksa` varchar(100) NOT NULL,
  `tgl_periksa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `poli_bangsal` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_jadwal_poli`
--

CREATE TABLE `db_jadwal_poli` (
  `id_jadwal_poli` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_jadwal_poli`
--

INSERT INTO `db_jadwal_poli` (`id_jadwal_poli`, `id_poli`, `id_user`, `bulan`, `tahun`) VALUES
(1, 1, 3, 1, 2015),
(2, 2, 5, 1, 2016),
(3, 3, 4, 1, 2016),
(4, 8, 6, 1, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `db_lab`
--

CREATE TABLE `db_lab` (
  `id_lab` int(11) NOT NULL,
  `kode` varchar(45) NOT NULL,
  `nama_lab` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_lab`
--

INSERT INTO `db_lab` (`id_lab`, `kode`, `nama_lab`) VALUES
(1, 'darah', 'Pemeriksaan Darah'),
(2, 'klinis', 'Klinis'),
(3, 'urine', 'Pemeriksaan Urine'),
(4, 'feces', 'Feces Rutin'),
(5, 'hematologi', 'Hematologi Manual');

-- --------------------------------------------------------

--
-- Table structure for table `db_level`
--

CREATE TABLE `db_level` (
  `id_level` int(11) NOT NULL,
  `kode_level` varchar(45) DEFAULT NULL,
  `nama_level` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_level`
--

INSERT INTO `db_level` (`id_level`, `kode_level`, `nama_level`) VALUES
(1, 'direktur', 'Direktur'),
(2, 'manager', 'Manager'),
(3, 'finance', 'Finance'),
(4, 'dr', 'Dokter'),
(5, 'staff_front', 'Staff Front Office'),
(6, 'staff_lab', 'Staff Laboratorium'),
(7, 'staff_bayar', 'Staff Loket Pembayaran'),
(8, 'apoteker', 'Staff Apotik');

-- --------------------------------------------------------

--
-- Table structure for table `db_pasien`
--

CREATE TABLE `db_pasien` (
  `id_pasien` int(11) NOT NULL,
  `norm` varchar(45) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tpt_lahir` varchar(45) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `jalan_1` varchar(100) DEFAULT NULL,
  `jalan_2` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_pasien`
--

INSERT INTO `db_pasien` (`id_pasien`, `norm`, `nama_lengkap`, `tpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `jalan_1`, `jalan_2`, `kelurahan`, `kecamatan`, `kota`) VALUES
(1, '000001', 'Andi Siswanto', 'Kebumen', '1992-06-02', 'L', 'Jalan Arcadia Atas', '', 'Larangan', 'Larangan', 'Kota Tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `db_pendaftaran`
--

CREATE TABLE `db_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `no_daftar` varchar(45) NOT NULL,
  `tujuan` enum('Poliklinik','UGD') NOT NULL,
  `id_poli` int(11) DEFAULT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_pendaftaran`
--

INSERT INTO `db_pendaftaran` (`id_pendaftaran`, `id_pasien`, `no_daftar`, `tujuan`, `id_poli`, `tgl_daftar`) VALUES
(1, 1, '000001', 'Poliklinik', 3, '2016-01-29 06:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `db_poli`
--

CREATE TABLE `db_poli` (
  `id_poli` int(11) NOT NULL,
  `kode` varchar(45) NOT NULL,
  `nama_poli` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_poli`
--

INSERT INTO `db_poli` (`id_poli`, `kode`, `nama_poli`) VALUES
(1, 'gigi', 'Poli Gigi'),
(2, 'mata', 'Poli Mata'),
(3, 'kulit', 'Poli Kulit'),
(4, 'bedah', 'Poli Bedah'),
(5, 'obgyn', 'Poli Obgyn'),
(6, 'anak', 'Poli Anak'),
(7, 'interna', 'Poli Interna'),
(8, 'umum', 'Poli Umum');

-- --------------------------------------------------------

--
-- Table structure for table `db_pulang`
--

CREATE TABLE `db_pulang` (
  `id_pulang` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `resep_dokter` enum('Ada','Tidak Ada') NOT NULL,
  `tgl_pulang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_pulang`
--

INSERT INTO `db_pulang` (`id_pulang`, `id_pendaftaran`, `id_pasien`, `resep_dokter`, `tgl_pulang`, `id_user`) VALUES
(1, 1, 1, 'Ada', '2016-01-28 09:52:02', 4);

-- --------------------------------------------------------

--
-- Table structure for table `db_rekam_medis`
--

CREATE TABLE `db_rekam_medis` (
  `id_rekam_medis` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `periksa` text,
  `diagnosa` text,
  `pesan` text NOT NULL,
  `tindakan` text,
  `obat` text,
  `biaya` text,
  `proses` text,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_pendaftaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_rekam_medis`
--

INSERT INTO `db_rekam_medis` (`id_rekam_medis`, `id_pasien`, `periksa`, `diagnosa`, `pesan`, `tindakan`, `obat`, `biaya`, `proses`, `tgl_input`, `id_pendaftaran`) VALUES
(1, 1, NULL, NULL, 'Pasien mendaftar dengan tujuan ke Poli Umum pada tanggal 2016-01-28 10:50:01', NULL, NULL, '0', 'Daftar->Poli Umum', '2016-01-28 09:50:01', 1),
(2, 1, 'Poli Umum: Periksa kulit', 'Poli Umum: Alergi', 'Pasien mendapat rujukan ke Poli Kulit oleh dr. Widiyanto Pratikto', 'Poli Umum: Dirujuk ke Poli Kulit', NULL, '10000', 'Daftar->Poli Umum->Poli Kulit', '2016-01-28 09:50:41', 1),
(3, 1, 'Poli Kulit: Pemeriksaan kulit', 'Poli Kulit: Alergi karena makanan berminyak', 'Pasien diizinkan pulang oleh dr. Meike,SP.KK dan didiagnosa Alergi karena makanan berminyak', 'Diizinkan pulang', NULL, NULL, NULL, '2016-01-28 09:52:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_role`
--

CREATE TABLE `db_role` (
  `id_role` int(11) NOT NULL,
  `kode_role` varchar(45) DEFAULT NULL,
  `nama_role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_role`
--

INSERT INTO `db_role` (`id_role`, `kode_role`, `nama_role`) VALUES
(1, 'admin', 'Administrator'),
(2, 'poli_gigi', 'Poli Gigi'),
(3, 'poli_mata', 'Poli Mata'),
(4, 'poli_kulit', 'Poli Kulit'),
(5, 'poli_bedah', 'Poli Bedah'),
(6, 'poli_obgyn', 'Poli Obgyn'),
(7, 'poli_anak', 'Poli Anak'),
(8, 'poli_interna', 'Poli Interna'),
(9, 'poli_umum', 'poli_Umum');

-- --------------------------------------------------------

--
-- Table structure for table `db_rujukan`
--

CREATE TABLE `db_rujukan` (
  `id_rujukan` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `id_poli_dari` int(11) DEFAULT NULL,
  `id_bangsal_dari` int(11) DEFAULT NULL,
  `id_poli_tujuan` int(11) DEFAULT NULL,
  `id_lab_tujuan` int(11) DEFAULT NULL,
  `tgl_rujukan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dicek` enum('Y','N') NOT NULL DEFAULT 'N',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_rujukan`
--

INSERT INTO `db_rujukan` (`id_rujukan`, `id_pasien`, `id_pendaftaran`, `id_poli_dari`, `id_bangsal_dari`, `id_poli_tujuan`, `id_lab_tujuan`, `tgl_rujukan`, `dicek`, `id_user`) VALUES
(1, 1, 1, 8, NULL, 3, NULL, '2016-01-28 09:50:41', 'N', 6);

-- --------------------------------------------------------

--
-- Table structure for table `db_tagihan`
--

CREATE TABLE `db_tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `guna` varchar(45) DEFAULT NULL,
  `biaya` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_tagihan`
--

INSERT INTO `db_tagihan` (`id_tagihan`, `id_pasien`, `id_pendaftaran`, `guna`, `biaya`) VALUES
(1, 1, 1, 'Biaya Poli Umum', '11000'),
(2, 1, 1, 'Biaya Poli Kulit', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `db_tagihan_resep`
--

CREATE TABLE `db_tagihan_resep` (
  `id_tagihan_resep` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `nama_obat` varchar(45) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_tagihan_resep`
--

INSERT INTO `db_tagihan_resep` (`id_tagihan_resep`, `id_pasien`, `id_pendaftaran`, `nama_obat`, `harga`) VALUES
(1, 1, 1, 'Puyer', 1000),
(2, 1, 1, 'Antibiotik', 5000),
(3, 1, 1, 'Salep', 15000),
(4, 1, 1, 'Paramex', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `db_total_tagihan`
--

CREATE TABLE `db_total_tagihan` (
  `id_total_tagihan` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `total` varchar(45) DEFAULT NULL,
  `status` enum('Lunas','Belum Dibayar') DEFAULT 'Belum Dibayar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_total_tagihan`
--

INSERT INTO `db_total_tagihan` (`id_total_tagihan`, `id_pasien`, `id_pendaftaran`, `total`, `status`) VALUES
(1, 1, 1, '43000', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `kode` varchar(45) DEFAULT NULL,
  `status` enum('active','block') NOT NULL DEFAULT 'active',
  `id_level` int(11) NOT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id_user`, `username`, `password`, `fullname`, `gender`, `phone`, `kode`, `status`, `id_level`, `id_role`) VALUES
(1, 'frontoffice', '827ccb0eea8a706c4c34a16891f84e7b', 'User Front Office', 'P', NULL, NULL, 'active', 5, NULL),
(2, 'userlab', '827ccb0eea8a706c4c34a16891f84e7b', 'User Laboratorium', 'L', NULL, NULL, 'active', 6, NULL),
(3, 'drgferry', '827ccb0eea8a706c4c34a16891f84e7b', 'drg. Ferry,SpBM', 'L', NULL, NULL, 'active', 4, NULL),
(4, 'drmeike', '827ccb0eea8a706c4c34a16891f84e7b', 'dr. Meike,SP.KK', 'P', NULL, NULL, 'active', 4, NULL),
(5, 'drsuhenni', '827ccb0eea8a706c4c34a16891f84e7b', 'dr. Suhenni,SpM', 'L', NULL, NULL, 'active', 4, NULL),
(6, 'drwidiyanto', '827ccb0eea8a706c4c34a16891f84e7b', 'dr. Widiyanto Pratikto', 'L', '081344084441', 'A', 'active', 4, NULL),
(7, 'userloket', '827ccb0eea8a706c4c34a16891f84e7b', 'User Loket Pembayaran', 'P', NULL, NULL, 'active', 7, NULL),
(8, 'apoteker', '827ccb0eea8a706c4c34a16891f84e7b', 'Staff Apotik', 'P', NULL, NULL, 'active', 8, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_antrian`
--
ALTER TABLE `db_antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `fk_db_antrian_db_poli1_idx` (`id_poli`),
  ADD KEY `fk_db_antrian_db_lab1_idx` (`id_lab`);

--
-- Indexes for table `db_apotik_obat`
--
ALTER TABLE `db_apotik_obat`
  ADD PRIMARY KEY (`id_apotik_obat`);

--
-- Indexes for table `db_apotik_obat_keluar`
--
ALTER TABLE `db_apotik_obat_keluar`
  ADD PRIMARY KEY (`id_apotik_obat_keluar`),
  ADD KEY `fk_db_obat_keluar_db_user1_idx` (`id_user`),
  ADD KEY `fk_db_apotik_obat_keluar_db_apotik_obat1_idx` (`id_apotik_obat`);

--
-- Indexes for table `db_apotik_obat_masuk`
--
ALTER TABLE `db_apotik_obat_masuk`
  ADD PRIMARY KEY (`id_apotik_obat_masuk`),
  ADD KEY `fk_db_obat_db_user1_idx` (`id_user`),
  ADD KEY `fk_db_apotik_obat_masuk_db_apotik_obat1_idx` (`id_apotik_obat`);

--
-- Indexes for table `db_bangsal`
--
ALTER TABLE `db_bangsal`
  ADD PRIMARY KEY (`id_bangsal`);

--
-- Indexes for table `db_detail_pasien`
--
ALTER TABLE `db_detail_pasien`
  ADD PRIMARY KEY (`id_detail_pasien`),
  ADD KEY `fk_db_detail_pasien_db_pasien1_idx` (`id_pasien`);

--
-- Indexes for table `db_hasil_lab`
--
ALTER TABLE `db_hasil_lab`
  ADD PRIMARY KEY (`id_hasil_lab`),
  ADD KEY `fk_db_hasil_lab_db_pasien1_idx` (`id_pasien`),
  ADD KEY `fk_db_hasil_lab_db_poli1_idx` (`id_poli`),
  ADD KEY `fk_db_hasil_lab_db_lab1_idx` (`id_lab`),
  ADD KEY `fk_db_hasil_lab_db_user1_idx` (`id_user`);

--
-- Indexes for table `db_hasil_labdarah`
--
ALTER TABLE `db_hasil_labdarah`
  ADD PRIMARY KEY (`id_hasil_labdarah`),
  ADD KEY `fk_db_hasil_labdarah_db_hasil_lab1_idx` (`id_hasil_lab`);

--
-- Indexes for table `db_hasil_labfeces`
--
ALTER TABLE `db_hasil_labfeces`
  ADD PRIMARY KEY (`id_hasil_labfeces`),
  ADD KEY `fk_db_hasil_labfeces_db_hasil_lab1_idx` (`id_hasil_lab`);

--
-- Indexes for table `db_hasil_labhematologi`
--
ALTER TABLE `db_hasil_labhematologi`
  ADD PRIMARY KEY (`id_hasil_labhematologi`),
  ADD KEY `fk_db_hasil_labhematologi_db_hasil_lab1_idx` (`id_hasil_lab`);

--
-- Indexes for table `db_hasil_labklinis`
--
ALTER TABLE `db_hasil_labklinis`
  ADD PRIMARY KEY (`id_hasil_labklinis`),
  ADD KEY `fk_db_hasil_labkilinis_db_hasil_lab1_idx` (`id_hasil_lab`);

--
-- Indexes for table `db_hasil_laburine`
--
ALTER TABLE `db_hasil_laburine`
  ADD PRIMARY KEY (`id_hasil_laburine`),
  ADD KEY `fk_db_hasil_laburine_db_hasil_lab1_idx` (`id_hasil_lab`);

--
-- Indexes for table `db_jadwal_poli`
--
ALTER TABLE `db_jadwal_poli`
  ADD PRIMARY KEY (`id_jadwal_poli`),
  ADD KEY `fk_db_jadwal_poli_db_poli1_idx` (`id_poli`),
  ADD KEY `fk_db_jadwal_poli_db_user1_idx` (`id_user`);

--
-- Indexes for table `db_lab`
--
ALTER TABLE `db_lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `db_level`
--
ALTER TABLE `db_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `db_pasien`
--
ALTER TABLE `db_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `db_pendaftaran`
--
ALTER TABLE `db_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `fk_db_pendaftaran_db_pasien1_idx` (`id_pasien`),
  ADD KEY `fk_db_pendaftaran_db_poli1_idx` (`id_poli`);

--
-- Indexes for table `db_poli`
--
ALTER TABLE `db_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `db_pulang`
--
ALTER TABLE `db_pulang`
  ADD PRIMARY KEY (`id_pulang`),
  ADD KEY `fk_db_pulang_db_pendaftaran1_idx` (`id_pendaftaran`),
  ADD KEY `fk_db_pulang_db_pasien1_idx` (`id_pasien`),
  ADD KEY `fk_db_pulang_db_user1_idx` (`id_user`);

--
-- Indexes for table `db_rekam_medis`
--
ALTER TABLE `db_rekam_medis`
  ADD PRIMARY KEY (`id_rekam_medis`),
  ADD KEY `fk_db_rekam_medik_db_pasien1_idx` (`id_pasien`),
  ADD KEY `fk_db_rekam_medik_db_pendaftaran1_idx` (`id_pendaftaran`);

--
-- Indexes for table `db_role`
--
ALTER TABLE `db_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `db_rujukan`
--
ALTER TABLE `db_rujukan`
  ADD PRIMARY KEY (`id_rujukan`),
  ADD KEY `fk_db_rujukan_db_pasien1_idx` (`id_pasien`),
  ADD KEY `fk_db_rujukan_db_poli1_idx` (`id_poli_dari`),
  ADD KEY `fk_db_rujukan_db_lab1_idx` (`id_lab_tujuan`),
  ADD KEY `fk_db_rujukan_db_user1_idx` (`id_user`),
  ADD KEY `fk_db_rujukan_db_pendaftaran1_idx` (`id_pendaftaran`),
  ADD KEY `fk_db_rujukan_db_bangsal1_idx` (`id_bangsal_dari`),
  ADD KEY `fk_db_rujukan_db_poli2_idx` (`id_poli_tujuan`);

--
-- Indexes for table `db_tagihan`
--
ALTER TABLE `db_tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `fk_db_tagihan_db_pendaftaran1_idx` (`id_pendaftaran`),
  ADD KEY `fk_db_tagihan_db_pasien1_idx` (`id_pasien`);

--
-- Indexes for table `db_tagihan_resep`
--
ALTER TABLE `db_tagihan_resep`
  ADD PRIMARY KEY (`id_tagihan_resep`),
  ADD KEY `fk_db_tagihan_resep_db_pasien1_idx` (`id_pasien`),
  ADD KEY `fk_db_tagihan_resep_db_pendaftaran1_idx` (`id_pendaftaran`);

--
-- Indexes for table `db_total_tagihan`
--
ALTER TABLE `db_total_tagihan`
  ADD PRIMARY KEY (`id_total_tagihan`),
  ADD KEY `fk_db_total_tagihan_db_pasien1_idx` (`id_pasien`),
  ADD KEY `fk_db_total_tagihan_db_pendaftaran1_idx` (`id_pendaftaran`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_db_user_db_role_idx` (`id_role`),
  ADD KEY `fk_db_user_db_level1_idx` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_antrian`
--
ALTER TABLE `db_antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_apotik_obat`
--
ALTER TABLE `db_apotik_obat`
  MODIFY `id_apotik_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `db_apotik_obat_keluar`
--
ALTER TABLE `db_apotik_obat_keluar`
  MODIFY `id_apotik_obat_keluar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_apotik_obat_masuk`
--
ALTER TABLE `db_apotik_obat_masuk`
  MODIFY `id_apotik_obat_masuk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_bangsal`
--
ALTER TABLE `db_bangsal`
  MODIFY `id_bangsal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `db_detail_pasien`
--
ALTER TABLE `db_detail_pasien`
  MODIFY `id_detail_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `db_hasil_lab`
--
ALTER TABLE `db_hasil_lab`
  MODIFY `id_hasil_lab` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_hasil_labdarah`
--
ALTER TABLE `db_hasil_labdarah`
  MODIFY `id_hasil_labdarah` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_hasil_labfeces`
--
ALTER TABLE `db_hasil_labfeces`
  MODIFY `id_hasil_labfeces` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_hasil_labhematologi`
--
ALTER TABLE `db_hasil_labhematologi`
  MODIFY `id_hasil_labhematologi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_hasil_labklinis`
--
ALTER TABLE `db_hasil_labklinis`
  MODIFY `id_hasil_labklinis` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_hasil_laburine`
--
ALTER TABLE `db_hasil_laburine`
  MODIFY `id_hasil_laburine` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_jadwal_poli`
--
ALTER TABLE `db_jadwal_poli`
  MODIFY `id_jadwal_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `db_lab`
--
ALTER TABLE `db_lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `db_level`
--
ALTER TABLE `db_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `db_pasien`
--
ALTER TABLE `db_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `db_pendaftaran`
--
ALTER TABLE `db_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `db_poli`
--
ALTER TABLE `db_poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `db_pulang`
--
ALTER TABLE `db_pulang`
  MODIFY `id_pulang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `db_rekam_medis`
--
ALTER TABLE `db_rekam_medis`
  MODIFY `id_rekam_medis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `db_role`
--
ALTER TABLE `db_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `db_rujukan`
--
ALTER TABLE `db_rujukan`
  MODIFY `id_rujukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `db_tagihan`
--
ALTER TABLE `db_tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `db_tagihan_resep`
--
ALTER TABLE `db_tagihan_resep`
  MODIFY `id_tagihan_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `db_total_tagihan`
--
ALTER TABLE `db_total_tagihan`
  MODIFY `id_total_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_antrian`
--
ALTER TABLE `db_antrian`
  ADD CONSTRAINT `fk_db_antrian_db_lab1` FOREIGN KEY (`id_lab`) REFERENCES `db_lab` (`id_lab`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_antrian_db_poli1` FOREIGN KEY (`id_poli`) REFERENCES `db_poli` (`id_poli`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_apotik_obat_keluar`
--
ALTER TABLE `db_apotik_obat_keluar`
  ADD CONSTRAINT `fk_db_apotik_obat_keluar_db_apotik_obat1` FOREIGN KEY (`id_apotik_obat`) REFERENCES `db_apotik_obat` (`id_apotik_obat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_obat_keluar_db_user1` FOREIGN KEY (`id_user`) REFERENCES `db_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_apotik_obat_masuk`
--
ALTER TABLE `db_apotik_obat_masuk`
  ADD CONSTRAINT `fk_db_apotik_obat_masuk_db_apotik_obat1` FOREIGN KEY (`id_apotik_obat`) REFERENCES `db_apotik_obat` (`id_apotik_obat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_obat_db_user1` FOREIGN KEY (`id_user`) REFERENCES `db_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_detail_pasien`
--
ALTER TABLE `db_detail_pasien`
  ADD CONSTRAINT `fk_db_detail_pasien_db_pasien1` FOREIGN KEY (`id_pasien`) REFERENCES `db_pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_hasil_lab`
--
ALTER TABLE `db_hasil_lab`
  ADD CONSTRAINT `fk_db_hasil_lab_db_lab1` FOREIGN KEY (`id_lab`) REFERENCES `db_lab` (`id_lab`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_hasil_lab_db_pasien1` FOREIGN KEY (`id_pasien`) REFERENCES `db_pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_hasil_lab_db_poli1` FOREIGN KEY (`id_poli`) REFERENCES `db_poli` (`id_poli`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_hasil_lab_db_user1` FOREIGN KEY (`id_user`) REFERENCES `db_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_hasil_labdarah`
--
ALTER TABLE `db_hasil_labdarah`
  ADD CONSTRAINT `fk_db_hasil_labdarah_db_hasil_lab1` FOREIGN KEY (`id_hasil_lab`) REFERENCES `db_hasil_lab` (`id_hasil_lab`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_hasil_labfeces`
--
ALTER TABLE `db_hasil_labfeces`
  ADD CONSTRAINT `fk_db_hasil_labfeces_db_hasil_lab1` FOREIGN KEY (`id_hasil_lab`) REFERENCES `db_hasil_lab` (`id_hasil_lab`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_hasil_labhematologi`
--
ALTER TABLE `db_hasil_labhematologi`
  ADD CONSTRAINT `fk_db_hasil_labhematologi_db_hasil_lab1` FOREIGN KEY (`id_hasil_lab`) REFERENCES `db_hasil_lab` (`id_hasil_lab`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_hasil_labklinis`
--
ALTER TABLE `db_hasil_labklinis`
  ADD CONSTRAINT `fk_db_hasil_labkilinis_db_hasil_lab1` FOREIGN KEY (`id_hasil_lab`) REFERENCES `db_hasil_lab` (`id_hasil_lab`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_hasil_laburine`
--
ALTER TABLE `db_hasil_laburine`
  ADD CONSTRAINT `fk_db_hasil_laburine_db_hasil_lab1` FOREIGN KEY (`id_hasil_lab`) REFERENCES `db_hasil_lab` (`id_hasil_lab`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_jadwal_poli`
--
ALTER TABLE `db_jadwal_poli`
  ADD CONSTRAINT `fk_db_jadwal_poli_db_poli1` FOREIGN KEY (`id_poli`) REFERENCES `db_poli` (`id_poli`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_jadwal_poli_db_user1` FOREIGN KEY (`id_user`) REFERENCES `db_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_pendaftaran`
--
ALTER TABLE `db_pendaftaran`
  ADD CONSTRAINT `fk_db_pendaftaran_db_pasien1` FOREIGN KEY (`id_pasien`) REFERENCES `db_pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_pendaftaran_db_poli1` FOREIGN KEY (`id_poli`) REFERENCES `db_poli` (`id_poli`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_pulang`
--
ALTER TABLE `db_pulang`
  ADD CONSTRAINT `fk_db_pulang_db_pasien1` FOREIGN KEY (`id_pasien`) REFERENCES `db_pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_pulang_db_pendaftaran1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `db_pendaftaran` (`id_pendaftaran`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_pulang_db_user1` FOREIGN KEY (`id_user`) REFERENCES `db_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_rekam_medis`
--
ALTER TABLE `db_rekam_medis`
  ADD CONSTRAINT `fk_db_rekam_medik_db_pasien1` FOREIGN KEY (`id_pasien`) REFERENCES `db_pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_rekam_medik_db_pendaftaran1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `db_pendaftaran` (`id_pendaftaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_rujukan`
--
ALTER TABLE `db_rujukan`
  ADD CONSTRAINT `fk_db_rujukan_db_bangsal1` FOREIGN KEY (`id_bangsal_dari`) REFERENCES `db_bangsal` (`id_bangsal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_rujukan_db_lab1` FOREIGN KEY (`id_lab_tujuan`) REFERENCES `db_lab` (`id_lab`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_rujukan_db_pasien1` FOREIGN KEY (`id_pasien`) REFERENCES `db_pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_rujukan_db_pendaftaran1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `db_pendaftaran` (`id_pendaftaran`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_rujukan_db_poli1` FOREIGN KEY (`id_poli_dari`) REFERENCES `db_poli` (`id_poli`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_rujukan_db_poli2` FOREIGN KEY (`id_poli_tujuan`) REFERENCES `db_poli` (`id_poli`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_rujukan_db_user1` FOREIGN KEY (`id_user`) REFERENCES `db_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_tagihan`
--
ALTER TABLE `db_tagihan`
  ADD CONSTRAINT `fk_db_tagihan_db_pasien1` FOREIGN KEY (`id_pasien`) REFERENCES `db_pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_tagihan_db_pendaftaran1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `db_pendaftaran` (`id_pendaftaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_tagihan_resep`
--
ALTER TABLE `db_tagihan_resep`
  ADD CONSTRAINT `fk_db_tagihan_resep_db_pasien1` FOREIGN KEY (`id_pasien`) REFERENCES `db_pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_tagihan_resep_db_pendaftaran1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `db_pendaftaran` (`id_pendaftaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_total_tagihan`
--
ALTER TABLE `db_total_tagihan`
  ADD CONSTRAINT `fk_db_total_tagihan_db_pasien1` FOREIGN KEY (`id_pasien`) REFERENCES `db_pasien` (`id_pasien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_total_tagihan_db_pendaftaran1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `db_pendaftaran` (`id_pendaftaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `db_user`
--
ALTER TABLE `db_user`
  ADD CONSTRAINT `fk_db_user_db_level1` FOREIGN KEY (`id_level`) REFERENCES `db_level` (`id_level`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_user_db_role` FOREIGN KEY (`id_role`) REFERENCES `db_role` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
