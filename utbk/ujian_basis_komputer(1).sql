-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2020 pada 08.25
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian_basis_komputer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_hp` varchar(14) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_status` enum('0','1') NOT NULL COMMENT '0. tidak aktif     1. aktif',
  `login` enum('0','1') NOT NULL COMMENT '0. tidak login      1. sedang login'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_username`, `admin_email`, `admin_hp`, `admin_password`, `admin_status`, `login`) VALUES
(1, 'taufik', 'taufikkamil522@gmail.com', '082258515288', 'd4305d7ed2ec97107cd6eb8dd4b6f6b7', '1', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_harga`
--

CREATE TABLE `tb_harga` (
  `harga_id` int(11) NOT NULL,
  `harga_jumlah` int(100) NOT NULL,
  `harga_start_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_harga`
--

INSERT INTO `tb_harga` (`harga_id`, `harga_jumlah`, `harga_start_date`) VALUES
(1, 50000, '2020-01-01 00:00:00'),
(2, 0, '2020-01-01 04:01:40'),
(3, 500001, '2020-01-01 04:01:40'),
(4, 500002, '2020-01-01 05:01:37'),
(5, 500003, '2020-01-01 05:01:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_harga_discount`
--

CREATE TABLE `tb_harga_discount` (
  `harga_dicount_id` int(11) NOT NULL,
  `harga_dicount_kode` varchar(150) NOT NULL,
  `harga_dicount_keterangan` varchar(255) NOT NULL,
  `harga_dicount_jumlah` int(100) NOT NULL,
  `harga_dicount_tipe` enum('RUPIAH','PERSENT') NOT NULL,
  `harga_dicount_date_start` datetime NOT NULL,
  `harga_dicount_date_finnish` datetime NOT NULL,
  `harga_dicount_limit` int(11) NOT NULL,
  `harga_dicount_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `harga_dicount_sisa_limit` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_harga_discount`
--

INSERT INTO `tb_harga_discount` (`harga_dicount_id`, `harga_dicount_kode`, `harga_dicount_keterangan`, `harga_dicount_jumlah`, `harga_dicount_tipe`, `harga_dicount_date_start`, `harga_dicount_date_finnish`, `harga_dicount_limit`, `harga_dicount_update`, `harga_dicount_sisa_limit`) VALUES
(4, '12345', 'test', 30000, 'RUPIAH', '2020-01-03 00:00:00', '2020-01-04 00:00:00', 5, '2020-01-03 19:13:51', 0),
(5, '54321', 'diskon daftar pertama', 10, 'PERSENT', '2020-01-03 00:00:00', '2020-01-04 00:00:00', 5, '2020-01-03 17:05:03', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_harga_peserta`
--

CREATE TABLE `tb_harga_peserta` (
  `harga_peserta_id` int(11) NOT NULL,
  `harga_id` int(11) NOT NULL,
  `dicount_id` int(11) NOT NULL,
  `harga_peserta_total` int(100) NOT NULL,
  `harga_peserta_status` enum('0','1') NOT NULL,
  `harga_peserta_tgl_bayar` datetime NOT NULL,
  `harga_peserta_id_admin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban_essay`
--

CREATE TABLE `tb_jawaban_essay` (
  `essay_id` int(11) NOT NULL,
  `essay_isi` text NOT NULL,
  `essay_bobot` int(25) NOT NULL,
  `soal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban_pg`
--

CREATE TABLE `tb_jawaban_pg` (
  `pg_id` varchar(11) NOT NULL,
  `pg_isi` text NOT NULL,
  `pg_urut` int(11) NOT NULL,
  `pg_bobot` int(25) NOT NULL,
  `soal_id` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jawaban_pg`
--

INSERT INTO `tb_jawaban_pg` (`pg_id`, `pg_isi`, `pg_urut`, `pg_bobot`, `soal_id`) VALUES
('1512190001', '1a', 1, 0, '1512190001'),
('1512190002', '3c', 2, 1, '1512190001'),
('1512190003', '5d', 3, 3, '1512190001'),
('1512190004', '1a', 1, 0, '1512190002'),
('1512190005', '4c', 2, 1, '1512190002'),
('1512190006', '5d', 3, 4, '1512190002'),
('1512190007', '1a', 4, 1, '1512190002'),
('1512190008', '12c', 2, 12, '1512190003'),
('1512190009', '21d', 1, 21, '1512190003'),
('2812190010', '1', 1, 1, '2147483647'),
('2812190011', '3', 2, 3, '2147483647'),
('2812190012', '0', 3, 0, '2147483647'),
('2812190013', '0', 4, 0, '2147483647'),
('2912190014', 'Pada t = 0,75 detik benda berhenti', 1, 0, '2912190001'),
('2912190015', 'Sebelum t = 0,75 detik benda mengalami perlambatan sampai berhenti sesaat.', 2, 0, '2912190001'),
('2912190016', 'Setelah t = 0,75 detik benda mengalami percepatan kemudian bergerak konstan.', 3, 0, '2912190001'),
('2912190017', 'Setelah t = 0,75 detik benda mengalami perlambatan kemudian bergerak\r\nkonstan', 4, 0, '2912190001'),
('2912190018', 'Setelah t = 0,75 detik benda diperlambat sampai berhenti sesaat kemudian\r\ndipercepat', 5, 1, '2912190001'),
('2912190019', 'H=O= berfungsi sebagai oksidator', 1, 1, '2912190002'),
('2912190020', 'destruksi merupakan reaksi reduksi besi(III) dalam darah', 2, 0, '2912190002'),
('2912190021', 'asam berfungsi sebagai elektrolit', 3, 0, '2912190002'),
('2912190022', 'oksidasi 1 mol Fe=Bsetara dengan oksidasi 1 mol hemoglobin', 4, 0, '2912190002'),
('2912190023', 'reaksi dapat berlangsung tanpa katalis', 5, 0, '2912190002'),
('2912190024', '8', 1, 0, '2912190003'),
('2912190025', '27', 2, 0, '2912190003'),
('2912190026', '64', 3, 1, '2912190003'),
('2912190027', '81', 4, 0, '2912190003'),
('2912190028', '100', 5, 0, '2912190003'),
('2912190029', 'sosial-politik', 1, 0, '2912190004'),
('2912190030', 'sosial-ekonomi', 2, 1, '2912190004'),
('2912190031', 'kebudayaan', 3, 0, '2912190004'),
('2912190032', 'ekonomi-politik', 4, 0, '2912190004'),
('2912190033', 'sosial-budaya', 5, 0, '2912190004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_option`
--

CREATE TABLE `tb_option` (
  `option_id` int(11) NOT NULL,
  `room_id` text NOT NULL,
  `option_acak` enum('on','off') NOT NULL COMMENT '0. tidak acak      1.acak soal',
  `option_show_kunci_jawaban` enum('on','off') NOT NULL COMMENT '0. tidak tampilkan kuci jawaban           2.tampilkan kuc jawaban',
  `option_jenis_jawaban` enum('1','2','3') NOT NULL COMMENT '1.  pg    2. essay   3.campuran',
  `option_ujian_jawaban` enum('1','2','3') NOT NULL COMMENT '1.  saintek    2. shosum   3.campuran'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_option`
--

INSERT INTO `tb_option` (`option_id`, `room_id`, `option_acak`, `option_show_kunci_jawaban`, `option_jenis_jawaban`, `option_ujian_jawaban`) VALUES
(17, 'RM00000001', 'on', '', '1', '1'),
(18, 'RM00000002', 'on', 'on', '3', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `peserta_id` int(11) NOT NULL,
  `peserta_username` varchar(155) NOT NULL,
  `peserta_nomor` varchar(15) NOT NULL,
  `peserta_password` varchar(255) NOT NULL,
  `peserta_password_ret` varchar(255) NOT NULL,
  `room_id` varchar(15) NOT NULL,
  `peserta_token` varchar(15) NOT NULL,
  `peserta_date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_ujian` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_peserta`
--

INSERT INTO `tb_peserta` (`peserta_id`, `peserta_username`, `peserta_nomor`, `peserta_password`, `peserta_password_ret`, `room_id`, `peserta_token`, `peserta_date_create`, `status_ujian`) VALUES
(1, '1', '281219-1-165940', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'RM00000001', '1eWoAP0', '2019-12-28 21:39:59', 3),
(2, '3', '281219-2-216403', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '3', 'RM00000001', '2TQfgLq', '2019-12-28 09:32:38', 0),
(3, '1', '281219-3-395247', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'RM00000001', '3nwajHx', '2019-12-28 09:33:49', 0),
(4, '3', '281219-4-424639', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '3', 'RM00000001', '4Io2MlC', '2019-12-28 09:33:49', 0),
(7, '5', '281219-7-792576', 'e4da3b7fbbce2345d7772b0674a318d5', '5', 'RM00000001', '7kl85cv', '2019-12-28 09:51:17', 0),
(8, '5', '281219-8-897362', 'e4da3b7fbbce2345d7772b0674a318d5', '5', 'RM00000001', '8JXHOFu', '2019-12-28 21:11:15', 2),
(9, '6', '281219-9-972905', '1679091c5a880faf6fb5e6087eb1b2dc', '6', 'RM00000001', '9xUmJaX', '2019-12-28 09:51:42', 0),
(10, '7', '281219-10-10246', '8f14e45fceea167a5a36dedd4bea2543', '7', 'RM00000001', '10ZRg5df', '2019-12-28 19:57:16', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peserta_biodata`
--

CREATE TABLE `tb_peserta_biodata` (
  `peserta_biodata_id` int(11) NOT NULL,
  `peserta_biodata_nisn` varchar(100) NOT NULL,
  `peserta_biodata_npsn` varchar(100) NOT NULL,
  `peserta_biodata_tgl_lahir` date NOT NULL,
  `peserta_biodata_email` varchar(150) NOT NULL,
  `peserta_biodata_password` varchar(255) NOT NULL,
  `peserta_biodata_konf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peserta_dari_sekolah`
--

CREATE TABLE `tb_peserta_dari_sekolah` (
  `peserta_dari_sekolah_id` int(11) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `sekolah_peserta_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_peserta_dari_sekolah`
--

INSERT INTO `tb_peserta_dari_sekolah` (`peserta_dari_sekolah_id`, `peserta_id`, `sekolah_peserta_id`) VALUES
(1, 1, '2147483647'),
(2, 3, '2812190001'),
(3, 4, '2812190001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peserta_relasi`
--

CREATE TABLE `tb_peserta_relasi` (
  `peserta_relasi_id` int(11) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_room`
--

CREATE TABLE `tb_room` (
  `room_id` varchar(15) NOT NULL,
  `room_nama` varchar(100) NOT NULL,
  `room_total_waktu` time NOT NULL,
  `room_time_start` time NOT NULL,
  `room_date` date NOT NULL,
  `room_date_finish` date NOT NULL,
  `room_jumlah_soal` int(100) NOT NULL,
  `room_keterangan` varchar(255) NOT NULL,
  `room_token_mulai` varchar(15) NOT NULL,
  `room_token_selesai` varchar(15) NOT NULL,
  `room_date_token_mulai` datetime NOT NULL,
  `room_date_token_selesai` datetime NOT NULL,
  `room_no_soal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_room`
--

INSERT INTO `tb_room` (`room_id`, `room_nama`, `room_total_waktu`, `room_time_start`, `room_date`, `room_date_finish`, `room_jumlah_soal`, `room_keterangan`, `room_token_mulai`, `room_token_selesai`, `room_date_token_mulai`, `room_date_token_selesai`, `room_no_soal`) VALUES
('RM00000001', '3', '03:03:00', '03:03:00', '0333-03-03', '0003-03-03', 5, '', '708463', '013456', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
('RM00000002', 'utbk sesi 2', '02:02:00', '02:02:00', '0002-02-02', '0002-02-02', 2, '', '843019', '869517', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sekolah`
--

CREATE TABLE `tb_sekolah` (
  `sekolah_id` int(11) NOT NULL,
  `sekolah_nama` varchar(255) NOT NULL,
  `sekolah_email` varchar(150) NOT NULL,
  `sekolah_hp` varchar(15) NOT NULL,
  `sekolah_alamat` varchar(255) NOT NULL,
  `sekolah_password` varchar(255) NOT NULL,
  `sekolah_status` enum('0','1') NOT NULL COMMENT '0. tidak aktive      1. aktive',
  `sekolah_login` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sekolah`
--

INSERT INTO `tb_sekolah` (`sekolah_id`, `sekolah_nama`, `sekolah_email`, `sekolah_hp`, `sekolah_alamat`, `sekolah_password`, `sekolah_status`, `sekolah_login`) VALUES
(8, 'sekolah bersama kami', 'sekolahkamil@mail.com', '1231231231', 'jl. in aja terus', '827ccb0eea8a706c4c34a16891f84e7b', '1', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sekolah_peserta`
--

CREATE TABLE `tb_sekolah_peserta` (
  `sekolah_peserta_id` varchar(15) NOT NULL,
  `room_id` varchar(15) NOT NULL,
  `sekolah_id` int(11) NOT NULL,
  `sekolah_peserta_date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sekolah_peserta`
--

INSERT INTO `tb_sekolah_peserta` (`sekolah_peserta_id`, `room_id`, `sekolah_id`, `sekolah_peserta_date_create`) VALUES
('2812190001', 'RM00000001', 8, '2019-12-28 07:45:51'),
('2812190002', 'RM00000002', 8, '2019-12-28 10:38:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `siswa_id` int(15) NOT NULL,
  `siswa_nama` varchar(100) NOT NULL,
  `siswa_nisn` int(12) NOT NULL,
  `siswa_email` varchar(255) NOT NULL,
  `siswa_hp` varchar(14) NOT NULL,
  `sekolah_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`siswa_id`, `siswa_nama`, `siswa_nisn`, `siswa_email`, `siswa_hp`, `sekolah_id`) VALUES
(8, 'kamil', 123, 'butet@mail.com', '0812341234', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal`
--

CREATE TABLE `tb_soal` (
  `soal_id` varchar(13) NOT NULL,
  `soal_mapel_id` int(11) NOT NULL,
  `soal_isi` text NOT NULL,
  `soal_waktu` time NOT NULL,
  `soal_type_jawaban` enum('1','2') NOT NULL COMMENT '1. pg    2. essay',
  `soal_tanggal_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_soal`
--

INSERT INTO `tb_soal` (`soal_id`, `soal_mapel_id`, `soal_isi`, `soal_waktu`, `soal_type_jawaban`, `soal_tanggal_create`) VALUES
('2912190001', 4, '<p>Sebuah benda bergerak sepanjang sumbu x dengan percepatan a(t) = -4t + 3. Mulamula<br />\r\nbenda bergerak ke arah sumbu x positif dari keadaan diam. Manakah pernyataan berikut yang benar?</p>\r\n', '03:00:00', '1', '2019-12-28 17:04:05'),
('2912190002', 5, '<p>Informasi berikut digunakan untuk menjawab soal nomor 1 dan 2. Kadar ion besi dalam darah dapat ditentukan dengan metode destruksi menggunakan H=O= dalam suasana asam. Reaksi yang terjadi adalah sebagai berikut</p>\r\n\r\n<p>2Fe=B(????????) + H=O=(????????) + 2HB(????????) &rarr; 2FeGB(????????) + 2H=O(????)</p>\r\n\r\n<p>Satu molekul hemoglobin mengandung 4 ion besi.</p>\r\n\r\n<p>Pernyataan yang benar untuk reaksi di atas adalah &hellip;.</p>\r\n', '00:03:00', '1', '2019-12-28 17:06:27'),
('2912190003', 6, '<p>Bilangan berikut yang merupakan bilangan kuadrat dan sekaligus bilangan pangkat<br />\r\ntiga adalah &hellip;.</p>\r\n', '00:03:00', '1', '2019-12-28 17:08:32'),
('2912190004', 7, '<p>Pembuatan periodisasi pada masa praaksara seperti masa berburu dan meramu, masa bercocok tanam dan menetap, masa perundagian, dan seterusnya, didasarkan pada perkembangan aspek ....</p>\r\n', '13:09:00', '1', '2019-12-28 17:11:35'),
('2912190005', 1, '<p><object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0\"><param name=\"allowFullScreen\" value=\"true\" /><param name=\"quality\" value=\"high\" /><param name=\"movie\" value=\"/utbk/assets/admin/plugins/editorku/kcfinder/upload/files/audio-lovebird-kusumo-ngetrik.mp3\" /><embed allowfullscreen=\"true\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" quality=\"high\" src=\"/utbk/assets/admin/plugins/editorku/kcfinder/upload/files/audio-lovebird-kusumo-ngetrik.mp3\" type=\"application/x-shockwave-flash\"></embed></object></p>\r\n', '00:00:00', '', '2019-12-28 19:48:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_audio`
--

CREATE TABLE `tb_soal_audio` (
  `utbk_soal_audio_id` int(11) NOT NULL,
  `utbk_soal_audio_alamat` varchar(255) NOT NULL,
  `utbk_soal_soal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_jurusan`
--

CREATE TABLE `tb_soal_jurusan` (
  `jurusan_id` int(11) NOT NULL,
  `jurusan_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_soal_jurusan`
--

INSERT INTO `tb_soal_jurusan` (`jurusan_id`, `jurusan_nama`) VALUES
(1, 'Saintek'),
(2, 'Soshum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_mapel`
--

CREATE TABLE `tb_soal_mapel` (
  `mapel_id` int(11) NOT NULL,
  `mapel_nama` varchar(255) NOT NULL,
  `jurusan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_soal_mapel`
--

INSERT INTO `tb_soal_mapel` (`mapel_id`, `mapel_nama`, `jurusan_id`) VALUES
(1, 'Ilmu Pengetahuan Alam', 1),
(2, 'Matematika', 1),
(3, 'Biologi', 2),
(4, 'Fisika', 1),
(5, 'KIMIA', 1),
(6, 'Pengetahuan Kuantitatif', 2),
(7, 'Sejarah', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ujian`
--

CREATE TABLE `tb_ujian` (
  `ujian_id` int(50) NOT NULL,
  `peserta_id` int(11) NOT NULL,
  `ujian_list_soal` text NOT NULL,
  `ujian_list_soal_dijawab` text NOT NULL COMMENT 'soal_id',
  `ujian_list_jawaban` text NOT NULL COMMENT 'pg_id',
  `ujian_list_ragu_ragu` text NOT NULL,
  `ujian_jumlah_benar` int(100) NOT NULL,
  `ujian_nilai` int(100) NOT NULL,
  `ujian_waktu_mulai` datetime NOT NULL,
  `ujian_waktu_selesai` datetime NOT NULL,
  `ujian_jumlah_soal` int(11) NOT NULL,
  `ujian_status` enum('0','1') NOT NULL COMMENT '0. sedang ujian     1. selesai ujian'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ujian`
--

INSERT INTO `tb_ujian` (`ujian_id`, `peserta_id`, `ujian_list_soal`, `ujian_list_soal_dijawab`, `ujian_list_jawaban`, `ujian_list_ragu_ragu`, `ujian_jumlah_benar`, `ujian_nilai`, `ujian_waktu_mulai`, `ujian_waktu_selesai`, `ujian_jumlah_soal`, `ujian_status`) VALUES
(1, 10, '2912190005#####2912190004#####2912190002#####2912190001#####2912190003#####', '', '', '', 0, 0, '2019-12-29 02:57:16', '2019-12-29 06:00:16', 5, '0'),
(2, 8, '2912190004#####2912190001#####2912190002#####2912190003#####2912190005#####', '2912190004#####2912190002#####2912190001#####', '2912190029#####2912190019#####2912190018#####', '', 0, 2, '2019-12-29 04:11:15', '2019-12-29 07:14:15', 5, '1'),
(3, 1, '2912190005#####2912190002#####2912190001#####', '', '', '', 0, 0, '2019-12-29 04:39:59', '2019-12-29 07:42:59', 3, '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tb_harga`
--
ALTER TABLE `tb_harga`
  ADD PRIMARY KEY (`harga_id`);

--
-- Indeks untuk tabel `tb_harga_discount`
--
ALTER TABLE `tb_harga_discount`
  ADD PRIMARY KEY (`harga_dicount_id`);

--
-- Indeks untuk tabel `tb_harga_peserta`
--
ALTER TABLE `tb_harga_peserta`
  ADD PRIMARY KEY (`harga_peserta_id`);

--
-- Indeks untuk tabel `tb_jawaban_essay`
--
ALTER TABLE `tb_jawaban_essay`
  ADD PRIMARY KEY (`essay_id`);

--
-- Indeks untuk tabel `tb_jawaban_pg`
--
ALTER TABLE `tb_jawaban_pg`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indeks untuk tabel `tb_option`
--
ALTER TABLE `tb_option`
  ADD PRIMARY KEY (`option_id`);

--
-- Indeks untuk tabel `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`peserta_id`);

--
-- Indeks untuk tabel `tb_peserta_biodata`
--
ALTER TABLE `tb_peserta_biodata`
  ADD PRIMARY KEY (`peserta_biodata_id`);

--
-- Indeks untuk tabel `tb_peserta_dari_sekolah`
--
ALTER TABLE `tb_peserta_dari_sekolah`
  ADD PRIMARY KEY (`peserta_dari_sekolah_id`);

--
-- Indeks untuk tabel `tb_peserta_relasi`
--
ALTER TABLE `tb_peserta_relasi`
  ADD PRIMARY KEY (`peserta_relasi_id`);

--
-- Indeks untuk tabel `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indeks untuk tabel `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  ADD PRIMARY KEY (`sekolah_id`);

--
-- Indeks untuk tabel `tb_sekolah_peserta`
--
ALTER TABLE `tb_sekolah_peserta`
  ADD PRIMARY KEY (`sekolah_peserta_id`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indeks untuk tabel `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`soal_id`);

--
-- Indeks untuk tabel `tb_soal_audio`
--
ALTER TABLE `tb_soal_audio`
  ADD PRIMARY KEY (`utbk_soal_audio_id`);

--
-- Indeks untuk tabel `tb_soal_jurusan`
--
ALTER TABLE `tb_soal_jurusan`
  ADD PRIMARY KEY (`jurusan_id`);

--
-- Indeks untuk tabel `tb_soal_mapel`
--
ALTER TABLE `tb_soal_mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indeks untuk tabel `tb_ujian`
--
ALTER TABLE `tb_ujian`
  ADD PRIMARY KEY (`ujian_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_harga`
--
ALTER TABLE `tb_harga`
  MODIFY `harga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_harga_discount`
--
ALTER TABLE `tb_harga_discount`
  MODIFY `harga_dicount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_harga_peserta`
--
ALTER TABLE `tb_harga_peserta`
  MODIFY `harga_peserta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban_essay`
--
ALTER TABLE `tb_jawaban_essay`
  MODIFY `essay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_option`
--
ALTER TABLE `tb_option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_peserta`
--
ALTER TABLE `tb_peserta`
  MODIFY `peserta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_peserta_biodata`
--
ALTER TABLE `tb_peserta_biodata`
  MODIFY `peserta_biodata_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_peserta_dari_sekolah`
--
ALTER TABLE `tb_peserta_dari_sekolah`
  MODIFY `peserta_dari_sekolah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_peserta_relasi`
--
ALTER TABLE `tb_peserta_relasi`
  MODIFY `peserta_relasi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_sekolah`
--
ALTER TABLE `tb_sekolah`
  MODIFY `sekolah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `siswa_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_audio`
--
ALTER TABLE `tb_soal_audio`
  MODIFY `utbk_soal_audio_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_jurusan`
--
ALTER TABLE `tb_soal_jurusan`
  MODIFY `jurusan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_mapel`
--
ALTER TABLE `tb_soal_mapel`
  MODIFY `mapel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
